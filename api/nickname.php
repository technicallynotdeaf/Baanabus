<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function respond_nn(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}

if (empty($_SESSION['is_authenticated'])) respond_nn(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond_nn(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') respond_nn(['error' => 'POST required'], 405);

$body     = json_decode(file_get_contents('php://input'), true);
$nickname = trim($body['nickname'] ?? '');
if ($nickname === '')       respond_nn(['error' => 'Nickname is empty'], 400);
if (mb_strlen($nickname) > 50) respond_nn(['error' => 'Nickname too long (50 chars max)'], 400);

try {
    $cfg             = getConfig() ?? [];
    $cfg['nickname'] = $nickname;
    saveConfig($cfg);
    respond_nn(['ok' => true]);
} catch (Throwable $e) {
    respond_nn(['error' => $e->getMessage()], 500);
}
