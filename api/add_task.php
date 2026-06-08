<?php
/**
 * api/add_task.php — add a task to the vault
 * POST { title, urgency?: 'low'|'medium'|'high', context?: string, location?: string, task_type?: string }
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body  = json_decode(file_get_contents('php://input'), true) ?? [];
$title = trim($body['title'] ?? '');
if ($title === '') json_response(['error' => 'Title required'], 400);
if (mb_strlen($title) > 300) json_response(['error' => 'Title too long'], 400);

$urgency   = in_array($body['urgency']   ?? '', ['low','medium','high'], true) ? $body['urgency']   : 'medium';
$taskType  = in_array($body['task_type'] ?? '', ['next_action','someday','inbox'], true) ? $body['task_type'] : 'next_action';
$context   = trim($body['context']  ?? '') ?: null;
$location  = trim($body['location'] ?? '') ?: null;
$personId  = isset($body['person_id']) && is_int($body['person_id']) ? $body['person_id'] : null;

try {
    $data   = getTasks();
    $taskId = (int)($data['next_id'] ?? 1);
    $data['tasks'][] = [
        'id'           => $taskId,
        'title'        => $title,
        'task_type'    => $taskType,
        'urgency'      => $urgency,
        'energy'       => 'medium',
        'status'       => 'active',
        'context'      => $context,
        'location'     => $location,
        'created_at'   => date('c'),
        'snoozed_until'=> null,
        'parent_id'    => null,
        'person_id'    => $personId,
        'deadline'     => null,
        'tags'         => null,
        'description'  => null,
    ];
    $data['next_id'] = $taskId + 1;
    saveTasks($data);
    json_response(['ok' => true, 'task_id' => $taskId]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
