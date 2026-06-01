<?php
/**
 * api/add_person.php — add a contact to the vault
 * POST { name, circles?: string }
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body = json_decode(file_get_contents('php://input'), true) ?? [];
$name = trim($body['name'] ?? '');
if ($name === '')             json_response(['error' => 'Name required'], 400);
if (mb_strlen($name) > 200)  json_response(['error' => 'Name too long'], 400);

$circles = trim($body['circles'] ?? '') ?: null;

try {
    $data     = getPeople();
    $personId = (int)($data['next_id'] ?? 1);
    $data['people'][] = [
        'person_id'       => $personId,
        'name'            => $name,
        'circles'         => $circles,
        'context'         => null,
        'next_review'     => null,
        'review_interval' => 30,
        'is_active'       => 1,
        'created_at'      => date('c'),
    ];
    $data['next_id'] = $personId + 1;
    savePeople($data);
    json_response(['ok' => true, 'person_id' => $personId, 'name' => $name, 'circles' => $circles]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
