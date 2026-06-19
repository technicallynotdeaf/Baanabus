<?php
require_once '../init.php';
requireAuth();

$body    = json_decode(file_get_contents('php://input'), true);
$seconds = max(0, (int)($body['seconds'] ?? 0));
if ($seconds === 0) json_response(['error' => 'no seconds'], 400);

$cfg   = getConfig();
$today = date('Y-m-d');
$cfg['dance_log']         = $cfg['dance_log'] ?? [];
$cfg['dance_log'][$today] = ($cfg['dance_log'][$today] ?? 0) + $seconds;
saveConfig($cfg);

json_response(['today_total' => $cfg['dance_log'][$today]]);
