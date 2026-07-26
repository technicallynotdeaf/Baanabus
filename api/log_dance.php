<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body    = json_decode(file_get_contents('php://input'), true) ?? [];
$seconds = max(0, (int)($body['seconds'] ?? 0));
if ($seconds === 0) json_response(['error' => 'no seconds'], 400);

try {
    $cfg   = getConfig() ?? [];
    $today = date('Y-m-d');
    $cfg['dance_log']         = $cfg['dance_log'] ?? [];
    $cfg['dance_log'][$today] = ($cfg['dance_log'][$today] ?? 0) + $seconds;
    saveConfig($cfg);

    json_response(['ok' => true, 'today_total' => $cfg['dance_log'][$today]]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
