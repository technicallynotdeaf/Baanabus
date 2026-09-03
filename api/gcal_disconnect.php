<?php
// Clears the Google Calendar refresh token and disables gcal integration.
// POST (no body required).
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) json_response(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST required'], 405);

try {
    $cass = getCassowary();
    unset($cass['google']['refresh_token']);
    saveCassowary($cass);

    $cfg = getConfig() ?? [];
    $cfg['preferences']['uses_gcal'] = false;
    unset($cfg['gcal_sync_date']);
    saveConfig($cfg);

    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
