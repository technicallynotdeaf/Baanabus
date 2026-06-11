<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST required'], 405);

$body  = json_decode(file_get_contents('php://input'), true) ?? [];
$label = trim($body['label'] ?? '');
if ($label === '')          json_response(['error' => 'Label is required'], 400);
if (mb_strlen($label) > 200) json_response(['error' => 'Label too long'], 400);

try {
    $data       = addPhysicalObject($label);
    $unresolved = count(array_filter($data['objects'], fn($o) => $o['status'] === 'out'));
    json_response(['ok' => true, 'count' => $unresolved]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
