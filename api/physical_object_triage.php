<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST required'], 405);

$body     = json_decode(file_get_contents('php://input'), true) ?? [];
$objectId = (int)($body['object_id'] ?? 0);
$action   = $body['action'] ?? '';

if (!$objectId) json_response(['error' => 'Missing object_id'], 400);
if (!in_array($action, ['link_task', 'find_home', 'put_away'], true)) {
    json_response(['error' => "Unknown action '$action'"], 400);
}

try {
    $data    = getPhysicalObjects();
    $objIdx  = null;
    foreach ($data['objects'] as $i => $o) {
        if ((int)$o['id'] === $objectId) { $objIdx = $i; break; }
    }
    if ($objIdx === null) json_response(['error' => 'Object not found'], 404);

    $label = $data['objects'][$objIdx]['label'];

    if ($action === 'put_away') {
        $data['objects'][$objIdx]['status']      = 'resolved';
        $data['objects'][$objIdx]['resolved_at'] = date('c');
        savePhysicalObjects($data);
        try { creditTop3Progress('object_resolve', 1); } catch (Throwable $e) {}
        json_response(['ok' => true, 'top3_completed' => top3DrainCompleted()]);
    }

    // find_home / link_task hand the object off to a task, but the object is still
    // physically out until that task is actually completed — status stays 'out' so it
    // keeps showing as outstanding (just no longer re-prompted, since task_id is set).
    // vaultMarkComplete() resolves it for real when the linked task is finished.
    if ($action === 'find_home') {
        $taskData = getTasks();
        $taskId   = (int)($taskData['next_id'] ?? 1);
        $taskData['tasks'][] = [
            'id'            => $taskId,
            'title'         => "Find a home for: $label",
            'task_type'     => 'next_action',
            'urgency'       => 'low',
            'energy'        => 'low',
            'time'          => 15,
            'status'        => 'active',
            'context'       => null,
            'created_at'    => date('c'),
            'snoozed_until' => null,
            'stuck'         => false,
            'parent_id'     => null,
            'person_id'     => null,
            'deadline'      => null,
            'tags'          => null,
            'description'   => null,
        ];
        $taskData['next_id'] = $taskId + 1;
        saveTasks($taskData);
        $data['objects'][$objIdx]['task_id'] = $taskId;
        savePhysicalObjects($data);
        try { creditTop3Progress('object_resolve', 1); } catch (Throwable $e) {}
        json_response(['ok' => true, 'task_id' => $taskId, 'top3_completed' => top3DrainCompleted()]);
    }

    if ($action === 'link_task') {
        $existingTaskId = (int)($body['task_id'] ?? 0);
        $taskTitle      = trim($body['task_title'] ?? '');

        if ($existingTaskId) {
            $data['objects'][$objIdx]['task_id'] = $existingTaskId;
            savePhysicalObjects($data);
            try { creditTop3Progress('object_resolve', 1); } catch (Throwable $e) {}
            json_response(['ok' => true, 'task_id' => $existingTaskId, 'top3_completed' => top3DrainCompleted()]);
        } elseif ($taskTitle !== '') {
            $taskData = getTasks();
            $taskId   = (int)($taskData['next_id'] ?? 1);
            $taskData['tasks'][] = [
                'id'            => $taskId,
                'title'         => $taskTitle,
                'task_type'     => 'next_action',
                'urgency'       => 'medium',
                'energy'        => 'medium',
                'time'          => null,
                'status'        => 'active',
                'context'       => null,
                'created_at'    => date('c'),
                'snoozed_until' => null,
                'stuck'         => false,
                'parent_id'     => null,
                'person_id'     => null,
                'deadline'      => null,
                'tags'          => null,
                'description'   => null,
            ];
            $taskData['next_id'] = $taskId + 1;
            saveTasks($taskData);
            $data['objects'][$objIdx]['task_id'] = $taskId;
            savePhysicalObjects($data);
            try { creditTop3Progress('object_resolve', 1); } catch (Throwable $e) {}
            json_response(['ok' => true, 'task_id' => $taskId, 'top3_completed' => top3DrainCompleted()]);
        } else {
            json_response(['error' => 'Provide task_id or task_title'], 400);
        }
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
