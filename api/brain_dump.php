<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function respond_bd(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}

if (empty($_SESSION['is_authenticated'])) respond_bd(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond_bd(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') respond_bd(['error' => 'POST required'], 405);

$body    = json_decode(file_get_contents('php://input'), true);
$content = trim($body['content'] ?? '');
if ($content === '') respond_bd(['error' => 'Content is empty'], 400);

try {
    $inbox = addToInbox($content);
    respond_bd(['ok' => true, 'count' => count($inbox['items'] ?? [])]);
} catch (Throwable $e) {
    respond_bd(['error' => $e->getMessage()], 500);
}
