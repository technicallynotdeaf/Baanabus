<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$input = json_decode(file_get_contents('php://input'), true) ?? [];
$field = $input['field'] ?? '';
$value = $input['value'] ?? null;

if (!in_array($field, ['energy_level', 'day_type'], true)) {
    json_response(['error' => 'Invalid field'], 400);
}
if ($value === null || !is_numeric($value)) {
    json_response(['error' => 'Invalid value'], 400);
}

try {
    saveDiaryEntry(date('Y-m-d'), [$field => (int)$value]);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
