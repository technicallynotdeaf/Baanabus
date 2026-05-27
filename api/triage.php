<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$input  = json_decode(file_get_contents('php://input'), true);
$taskId = (int)($input['task_id'] ?? 0);
$action = $input['action'] ?? '';

if (!$taskId || !in_array($action, ['next_action', 'someday', 'delete'], true)) {
    json_response(['error' => 'Invalid input'], 400);
}

try {
    $data = getTasks();
    $task = null;
    foreach ($data['tasks'] as $t) {
        if ((int)$t['id'] === $taskId) { $task = $t; break; }
    }
    if (!$task) json_response(['error' => 'Task not found'], 404);

    if ($action === 'delete') {
        vaultUpdateTask($taskId, ['status' => 'deleted', 'deleted_at' => date('c')]);
    } else {
        vaultUpdateTask($taskId, ['task_type' => $action]);
    }

    // Tag in Habitica when marked as next_action
    if ($action === 'next_action' && !empty($task['habitica_id'])) {
        try {
            require_once __DIR__ . '/habitica_helper.php';
            $cass   = getCassowary();
            $userId = $cass['habitica']['user_id'] ?? '';
            $apiKey = $cass['habitica']['api_key']  ?? '';
            if ($userId && $apiKey) {
                $tagId = $cass['habitica_tags']['next_action_id'] ?? null;
                if (!$tagId) {
                    $tagId = habiticaGetOrCreateTag('next-action', $userId, $apiKey);
                    $cass['habitica_tags']['next_action_id'] = $tagId;
                    saveCassowary($cass);
                }
                habiticaRequest('POST', "/tasks/{$task['habitica_id']}/tags/{$tagId}", $userId, $apiKey);
            }
        } catch (Throwable $e) {
            error_log('Habitica tag failed: ' . $e->getMessage());
            // non-fatal — triage result is already saved to vault
        }
    }

    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
