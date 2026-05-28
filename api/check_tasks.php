<?php
/**
 * api/check_tasks.php — task vault inspection for agent use
 * Auth: Authorization: Bearer bsk_... header
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

$auth  = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$token = strncmp($auth, 'Bearer ', 7) === 0 ? trim(substr($auth, 7)) : '';
if (!$token || !authenticateAgentKey($token)) {
    json_response(['error' => 'Unauthorized — provide a valid bsk_ key'], 401);
}

$data  = getTasks();
$tasks = $data['tasks'];

$byStatus   = [];
$byType     = [];
$byUrgency  = [];
$withPrereq = [];
$withTags   = [];
$withPerson = [];
$snoozed    = [];

foreach ($tasks as $t) {
    $status  = $t['status']    ?? 'unknown';
    $type    = $t['task_type'] ?? 'null';
    $urgency = $t['urgency']   ?? 'null';

    $byStatus[$status]   = ($byStatus[$status]   ?? 0) + 1;
    $byType[$type]       = ($byType[$type]       ?? 0) + 1;
    $byUrgency[$urgency] = ($byUrgency[$urgency] ?? 0) + 1;

    if (!empty($t['prereq_tasks'])) $withPrereq[] = ['id' => $t['id'], 'title' => $t['title'], 'prereq_tasks' => $t['prereq_tasks']];
    if (!empty($t['tags']))         $withTags[]   = ['id' => $t['id'], 'title' => $t['title'], 'tags' => $t['tags']];
    if (!empty($t['person_id']))    $withPerson[] = ['id' => $t['id'], 'title' => $t['title'], 'person_id' => $t['person_id']];
    if (!empty($t['snoozed_until']) && ($t['status'] ?? '') === 'active')
        $snoozed[] = ['id' => $t['id'], 'title' => $t['title'], 'snoozed_until' => $t['snoozed_until']];
}

json_response([
    'total'      => count($tasks),
    'next_id'    => $data['next_id'] ?? null,
    'by_status'  => $byStatus,
    'by_type'    => $byType,
    'by_urgency' => $byUrgency,
    'with_prereq_tasks' => $withPrereq,
    'with_tags'         => $withTags,
    'with_person_id'    => count($withPerson),
    'snoozed_active'    => $snoozed,
]);
