<?php
/**
 * api/triage.php — process an inbox triage decision
 * POST {
 *   task_id,
 *   action: 'next_action'|'someday'|'waiting'|'project'|'delete',
 *   title?: string,            // rename the task
 *   urgency?: 'low'|'medium'|'high',
 *   scheduled_date?: 'YYYY-MM-DD',  // next_action only
 *   first_step?: string,            // project only — title of first subtask
 * }
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$taskId = (int)($body['task_id'] ?? 0);
$action = $body['action'] ?? '';

if (!$taskId) json_response(['error' => 'Missing task_id'], 400);

$allowed = ['next_action', 'someday', 'waiting', 'project', 'delete'];
if (!in_array($action, $allowed, true)) {
    json_response(['error' => "Unknown action '$action'"], 400);
}

// Optional shared fields
$newTitle = trim($body['title'] ?? '');
$urgency  = in_array($body['urgency'] ?? '', ['low', 'medium', 'high'], true) ? $body['urgency'] : null;

try {
    if ($action === 'delete') {
        $fields = ['status' => 'deleted'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency']  = $urgency;
        vaultUpdateTask($taskId, $fields);

    } elseif ($action === 'someday') {
        $fields = ['task_type' => 'someday'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency']  = $urgency;
        vaultUpdateTask($taskId, $fields);

    } elseif ($action === 'waiting') {
        $fields = ['task_type' => 'waiting'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency']  = $urgency;
        vaultUpdateTask($taskId, $fields);

    } elseif ($action === 'next_action') {
        $fields = ['task_type' => 'next_action'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency']  = $urgency;
        $date = trim($body['scheduled_date'] ?? '');
        if ($date && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            if ($date > date('Y-m-d')) {
                $fields['snoozed_until'] = $date . 'T08:00:00+00:00';
            }
        }
        vaultUpdateTask($taskId, $fields);

    } elseif ($action === 'project') {
        $fields = ['task_type' => 'project'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency']  = $urgency;
        vaultUpdateTask($taskId, $fields);

        $firstStep = trim($body['first_step'] ?? '');
        if ($firstStep !== '' && mb_strlen($firstStep) <= 300) {
            $data   = getTasks();
            $stepId = (int)($data['next_id'] ?? 1);
            $data['tasks'][] = [
                'id'            => $stepId,
                'title'         => $firstStep,
                'task_type'     => 'next_action',
                'urgency'       => $urgency ?? 'medium',
                'energy'        => 'medium',
                'status'        => 'active',
                'context'       => null,
                'created_at'    => date('c'),
                'snoozed_until' => null,
                'parent_id'     => $taskId,
                'person_id'     => null,
                'deadline'      => null,
                'tags'          => null,
                'description'   => null,
            ];
            $data['next_id'] = $stepId + 1;
            saveTasks($data);
        }
    }

    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
