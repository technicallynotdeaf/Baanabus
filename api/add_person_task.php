<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }
if (empty($_SESSION['DEK']))              { json_response(['error' => 'Vault locked'], 423); }

$body     = json_decode(file_get_contents('php://input'), true) ?? [];
$title    = trim($body['title'] ?? '');
$personId = (int)($body['person_id'] ?? 0);

if (!$title)    json_response(['error' => 'title is required'], 400);
if (!$personId) json_response(['error' => 'person_id is required'], 400);

$data = getTasks();
$id   = $data['next_id'];

$data['tasks'][] = [
    'id'                => $id,
    'title'             => $title,
    'task_type'         => 'next_action',
    'status'            => 'active',
    'person_id'         => $personId,
    'urgency'           => null,
    'energy'            => null,
    'time'              => null,
    'triage_actionable' => true,
    'location'          => null,
    'context'           => null,
    'stuck'             => false,
    'snoozed_until'     => null,
    'created_at'        => date('Y-m-d H:i:s'),
];
$data['next_id']++;
saveTasks($data);

json_response(['ok' => true, 'task_id' => $id]);
