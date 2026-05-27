<?php
require_once __DIR__ . '/../init.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) json_response(['error' => 'Not authenticated'], 401);

$input = json_decode(file_get_contents('php://input'), true) ?? [];
$field = $input['field'] ?? '';
$value = $input['value'] ?? null;

if (!in_array($field, ['energy_level', 'day_type'], true)) {
    json_response(['error' => 'Invalid field'], 400);
}
if ($value === null || !is_numeric($value)) {
    json_response(['error' => 'Invalid value'], 400);
}

$value = (int) $value;
$today = date('Y-m-d');
$col   = $field; // already validated against whitelist

try {
    if (!$database) throw new Exception('Database unavailable');
    $database->prepare(
        "INSERT INTO diary (date, $col) VALUES (?, ?)
         ON CONFLICT(date) DO UPDATE SET $col = excluded.$col"
    )->execute([$today, $value]);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
