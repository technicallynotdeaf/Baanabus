<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body  = json_decode(file_get_contents('php://input'), true) ?? [];
$keyId = preg_replace('/[^A-Za-z0-9]/', '', $body['key_id'] ?? '');
if (!$keyId) json_response(['error' => 'Missing key_id'], 400);

$uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');

// Remove wrapped DEK file
$wrapPath = __DIR__ . "/../config/$uid/apikeys/$keyId.json";
@unlink($wrapPath);

// Remove from global index
$indexPath = __DIR__ . '/../data/apikeys.json';
if (file_exists($indexPath)) {
    $index = json_decode(file_get_contents($indexPath), true) ?? [];
    $index = array_filter($index, fn($v) => $v['key_id'] !== $keyId);
    file_put_contents($indexPath, json_encode($index, JSON_UNESCAPED_SLASHES), LOCK_EX);
}

// Remove from cassowary metadata
$cass = getCassowary();
unset($cass['api_keys'][$keyId]);
saveCassowary($cass);

json_response(['ok' => true]);
