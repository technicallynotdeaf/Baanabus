<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$input = json_decode(file_get_contents('php://input'), true);
if (!isset($input['schedule']) || !is_array($input['schedule'])) {
    json_response(['error' => 'Missing schedule'], 400);
}

// Validate: keys 0-6, values null or 1-5
$clean = [];
foreach (range(0, 6) as $dow) {
    $v = $input['schedule'][$dow] ?? null;
    $clean[$dow] = ($v !== null && $v !== '' && in_array((int)$v, [1,2,3,4,5], true)) ? (int)$v : null;
}

try {
    $cfg = getConfig() ?? [];
    $cfg['weekly_schedule'] = $clean;
    saveConfig($cfg);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
