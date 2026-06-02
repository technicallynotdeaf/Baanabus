<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) json_response(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST required'], 405);

$body = json_decode(file_get_contents('php://input'), true);
$tz   = trim($body['timezone'] ?? '');

if ($tz === '' || !in_array($tz, DateTimeZone::listIdentifiers(), true)) {
    json_response(['error' => 'Invalid timezone'], 400);
}

try {
    $cfg = getConfig() ?? [];
    $cfg['preferences']['timezone'] = $tz;
    saveConfig($cfg);
    $_SESSION['user_timezone'] = $tz;
    date_default_timezone_set($tz);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
