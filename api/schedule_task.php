<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$input  = json_decode(file_get_contents('php://input'), true);
$taskId = (int)($input['task_id'] ?? 0);
$date   = $input['scheduled_date'] ?? null; // null = unschedule

if (!$taskId) json_response(['error' => 'Missing task_id'], 400);
if ($date !== null && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    json_response(['error' => 'Invalid date format'], 400);
}

try {
    if ($date !== null) {
        // Enforce 3-task cap
        $all      = getTasks()['tasks'];
        $dayCount = count(array_filter($all, fn($t) =>
            ($t['scheduled_date'] ?? '') === $date &&
            (int)$t['id'] !== $taskId &&
            $t['status'] !== 'deleted'
        ));
        if ($dayCount >= 3) json_response(['error' => 'Day is full (3 tasks max)'], 409);
    }
    $updates = ['scheduled_date' => $date];
    if ($date !== null) $updates['woke_date'] = null;
    vaultUpdateTask($taskId, $updates);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
