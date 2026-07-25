<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

try {
    $pip = awardPip();
    json_response(array_merge(['ok' => true], $pip));
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
