<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'],      423);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$taskId = preg_replace('/[^a-z_]/', '', strtolower($body['task_id'] ?? ''));
if (!$taskId) json_response(['error' => 'task_id required'], 400);

try {
    $cfg   = getConfig() ?? [];
    $today = date('Y-m-d');
    $seen  = $cfg['house_tasks_seen'] ?? [];
    $seen[$today][$taskId][] = time();
    // Prune entries older than 7 days
    $cutoff = date('Y-m-d', strtotime('-7 days'));
    foreach (array_keys($seen) as $d) {
        if ($d < $cutoff) unset($seen[$d]);
    }
    $cfg['house_tasks_seen'] = $seen;
    saveConfig($cfg);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
