<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$in = json_decode(file_get_contents('php://input'), true) ?: [];

try {
    $cfg = getConfig() ?? [];
    if (array_key_exists('checkin_enabled', $in)) {
        $cfg['checkin_enabled'] = (bool)$in['checkin_enabled'];
    }
    saveConfig($cfg);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
