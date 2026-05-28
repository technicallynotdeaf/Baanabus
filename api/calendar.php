<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$month = $_GET['month'] ?? date('Y-m');
if (!preg_match('/^\d{4}-\d{2}$/', $month)) json_response(['error' => 'Invalid month'], 400);

try {
    $all   = getTasks()['tasks'];
    $tasks = array_values(array_filter($all, fn($t) =>
        $t['status'] !== 'deleted' &&
        !empty($t['scheduled_date']) &&
        str_starts_with($t['scheduled_date'], $month)
    ));
    $tasks = array_map(fn($t) => [
        'id'             => (int)$t['id'],
        'title'          => $t['title'],
        'scheduled_date' => $t['scheduled_date'],
        'urgency'        => $t['urgency'] ?? null,
        'status'         => $t['status'],
    ], $tasks);
    json_response(['ok' => true, 'month' => $month, 'tasks' => $tasks]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
