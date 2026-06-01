<?php
// Temporary diagnostic — REMOVE after debugging
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
require_once __DIR__ . '/habitica_helper.php';
header('Content-Type: application/json; charset=utf-8');

$auth  = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$token = strncmp($auth, 'Bearer ', 7) === 0 ? trim(substr($auth, 7)) : '';
if (!$token || !authenticateAgentKey($token)) {
    json_response(['error' => 'Unauthorized'], 401);
}

$cass   = getCassowary();
$userId = $cass['habitica']['user_id'] ?? '';
$apiKey = $cass['habitica']['api_key'] ?? '';
if (!$userId || !$apiKey) json_response(['error' => 'No Habitica creds'], 400);

$todos  = habiticaRequest('GET', '/tasks/user?type=todos', $userId, $apiKey);
$result = [];
foreach ($todos as $todo) {
    if ($todo['completed'] ?? false) continue;
    $cl = $todo['checklist'] ?? [];
    $incomplete = array_values(array_filter($cl, fn($i) => !($i['completed'] ?? false)));
    if (count($cl) > 0 || count($incomplete) > 0) {
        $result[] = [
            'id'               => $todo['id'],
            'title'            => $todo['text'],
            'total_items'      => count($cl),
            'incomplete_items' => count($incomplete),
            'sample'           => array_map(fn($i) => $i['text'], array_slice($incomplete, 0, 3)),
        ];
    }
}
json_response(['todos_with_checklists' => count($result), 'detail' => $result]);
