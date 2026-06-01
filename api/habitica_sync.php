<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
require_once __DIR__ . '/habitica_helper.php';
header('Content-Type: application/json; charset=utf-8');

// Accept BSK token for agent-triggered force sync
$bskAuth = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$bskToken = strncmp($bskAuth, 'Bearer ', 7) === 0 ? trim(substr($bskAuth, 7)) : '';
if ($bskToken && authenticateAgentKey($bskToken)) {
    // agent-key path: vault is unlocked by authenticateAgentKey
} else {
    if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
    if (!isUnlocked())      json_response(['error' => 'Vault locked'],      423);
}

try {
    $cfg   = getConfig() ?? [];
    $prefs = $cfg['preferences'] ?? [];

    if (empty($prefs['uses_habitica'])) {
        json_response(['skipped' => true, 'reason' => 'not_configured']);
    }

    $today = date('Y-m-d');
    $force = !empty($_GET['force']) && ($bskToken || isAuthenticated());
    if (!$force && ($cfg['habitica_sync_date'] ?? '') === $today) {
        json_response(['already_ran' => true]);
    }

    $cass   = getCassowary();
    $userId = $cass['habitica']['user_id'] ?? '';
    $apiKey = $cass['habitica']['api_key'] ?? '';
    if (!$userId || !$apiKey) {
        json_response(['skipped' => true, 'reason' => 'no_credentials']);
    }

    $todos = habiticaRequest('GET', '/tasks/user?type=todos', $userId, $apiKey);
    $data  = getTasks();
    $now   = date('c');

    // Index existing Habitica tasks to avoid duplicates
    // existingParents: habitica_id => baanabus task id (parent todos)
    // existingItems:   "habitica_id:item_id" => true  (checklist subtasks)
    $existingParents = [];
    $existingItems   = [];
    foreach ($data['tasks'] as $t) {
        if (empty($t['habitica_id'])) continue;
        if (empty($t['habitica_item_id'])) {
            $existingParents[$t['habitica_id']] = (int)$t['id'];
        } else {
            $existingItems[$t['habitica_id'] . ':' . $t['habitica_item_id']] = true;
        }
    }

    $synced = 0;

    foreach ($todos as $todo) {
        if ($todo['completed'] ?? false) continue;
        $todoId = $todo['id'];

        // Import parent todo if not already present
        if (!isset($existingParents[$todoId])) {
            $task = [
                'id'            => $data['next_id']++,
                'title'         => $todo['text'],
                'task_type'     => 'inbox',
                'urgency'       => 'low',
                'energy'        => 'low',
                'status'        => 'active',
                'snoozed_until' => null,
                'created_at'    => $now,
                'habitica_id'   => $todoId,
            ];
            $existingParents[$todoId] = $task['id'];
            $data['tasks'][]          = $task;
            $synced++;
        }

        $parentBaanabusId = $existingParents[$todoId];

        // Import each incomplete checklist item as a child task
        foreach (($todo['checklist'] ?? []) as $item) {
            if ($item['completed'] ?? false) continue;
            $key = $todoId . ':' . $item['id'];
            if (isset($existingItems[$key])) continue;

            $data['tasks'][] = [
                'id'               => $data['next_id']++,
                'title'            => $item['text'],
                'task_type'        => 'inbox',
                'urgency'          => 'low',
                'energy'           => 'low',
                'status'           => 'active',
                'snoozed_until'    => null,
                'created_at'       => $now,
                'habitica_id'      => $todoId,
                'habitica_item_id' => $item['id'],
                'parent_id'        => $parentBaanabusId,
            ];
            $existingItems[$key] = true;
            $synced++;
        }
    }

    if ($synced > 0) saveTasks($data);

    $cfg['habitica_sync_date'] = $today;
    $cfg['habitica_sync_last_count'] = $synced;
    saveConfig($cfg);

    json_response(['synced' => $synced, 'parents' => count($existingParents), 'items_checked' => count($existingItems)]);

} catch (Throwable $e) {
    error_log('Habitica sync error: ' . $e->getMessage());
    json_response(['error' => $e->getMessage()], 500);
}
