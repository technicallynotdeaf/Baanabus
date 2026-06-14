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

    // Build set of all Habitica todo IDs (complete + incomplete) for deletion detection
    $habiticaIdSet = [];
    foreach ($todos as $todo) {
        if (!empty($todo['id'])) $habiticaIdSet[(string)$todo['id']] = true;
    }

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
                'energy'        => null,
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

    // Detect parent todos deleted from Habitica and soft-delete locally
    $deleted = 0;
    $deletedBaanabusIds = [];
    foreach ($data['tasks'] as &$task) {
        if (empty($task['habitica_id']) || !empty($task['habitica_item_id'])) continue;
        if (($task['status'] ?? '') !== 'active') continue;
        if (!isset($habiticaIdSet[(string)$task['habitica_id']])) {
            $task['status'] = 'deleted';
            $deletedBaanabusIds[(int)$task['id']] = true;
            $deleted++;
        }
    }
    unset($task);

    // Cascade: soft-delete active children of deleted parents
    foreach ($data['tasks'] as &$task) {
        if (($task['status'] ?? '') !== 'active') continue;
        if (!empty($task['parent_id']) && isset($deletedBaanabusIds[(int)$task['parent_id']])) {
            $task['status'] = 'deleted';
            $deleted++;
        }
    }
    unset($task);

    if ($synced > 0 || $deleted > 0) saveTasks($data);

    $cfg['habitica_sync_date'] = $today;
    $cfg['habitica_sync_last_count'] = $synced;
    saveConfig($cfg);

    // --- Sync daily definitions into dailies.enc ---
    $habiticaDailies = habiticaRequest('GET', '/tasks/user?type=dailys', $userId, $apiKey);
    $dailyData       = getDailies();

    // Build lookup index: habitica_id => array index in items
    $dailyHabIndex = [];
    foreach ($dailyData['items'] as $k => $item) {
        if (!empty($item['habitica_id'])) $dailyHabIndex[$item['habitica_id']] = $k;
    }

    $dailySynced = 0;
    $habiticaDailyIds = [];
    foreach ($habiticaDailies as $d) {
        $habId = $d['id'] ?? null;
        if (!$habId) continue;
        $habiticaDailyIds[] = $habId;
        $def = [
            'habitica_id' => $habId,
            'title'       => $d['text']      ?? '',
            'notes'       => $d['notes']     ?? '',
            'checklist'   => array_values(array_map(fn($ci) => [
                'id'   => $ci['id']   ?? '',
                'text' => $ci['text'] ?? '',
            ], $d['checklist'] ?? [])),
            'frequency'   => $d['frequency'] ?? 'daily',
            'repeat'      => $d['repeat']    ?? [],
            'everyX'      => (int)($d['everyX'] ?? 1),
            'start_date'  => substr($d['startDate'] ?? $today, 0, 10),
            'is_active'   => true,
        ];
        if (isset($dailyHabIndex[$habId])) {
            $k        = $dailyHabIndex[$habId];
            $existing = $dailyData['items'][$k];
            $def['id']    = $existing['id'];
            $def['order'] = $existing['order'] ?? 0;
            // Preserve fields the user can set in Baanabus that Habitica doesn't know about
            foreach (['horizon', 'location', 'relevant_after', 'irrelevant_after', 'is_active'] as $f) {
                if (array_key_exists($f, $existing)) $def[$f] = $existing[$f];
            }
            $dailyData['items'][$k] = $def;
        } else {
            $def['id']    = $dailyData['next_id']++;
            $def['order'] = count($dailyData['items']);
            $dailyData['items'][] = $def;
            $dailySynced++;
        }
    }

    // Deactivate Habitica dailies no longer returned by the API
    foreach ($dailyData['items'] as &$item) {
        if (!empty($item['habitica_id']) && !in_array($item['habitica_id'], $habiticaDailyIds, true)) {
            $item['is_active'] = false;
        }
    }
    unset($item);

    $dailyData['sync_date'] = $today;
    saveDailies($dailyData);

    json_response(['synced' => $synced, 'deleted' => $deleted, 'daily_synced' => $dailySynced,
                   'parents' => count($existingParents), 'items_checked' => count($existingItems)]);

} catch (Throwable $e) {
    error_log('Habitica sync error: ' . $e->getMessage());
    json_response(['error' => $e->getMessage()], 500);
}
