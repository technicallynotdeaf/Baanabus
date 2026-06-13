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
    $pt  = $cfg['period_tracking'] ?? [];

    if (array_key_exists('enabled', $in))
        $pt['enabled'] = (bool)$in['enabled'];
    if (array_key_exists('lmp', $in))
        $pt['lmp'] = preg_match('/^\d{4}-\d{2}-\d{2}$/', (string)$in['lmp']) ? $in['lmp'] : ($pt['lmp'] ?? null);
    if (array_key_exists('cycle_min', $in))
        $pt['cycle_min'] = max(14, min(60, (int)$in['cycle_min']));
    if (array_key_exists('cycle_max', $in))
        $pt['cycle_max'] = max(14, min(60, (int)$in['cycle_max']));

    $cfg['period_tracking'] = $pt;
    saveConfig($cfg);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
