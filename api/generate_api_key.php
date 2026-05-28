<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body  = json_decode(file_get_contents('php://input'), true) ?? [];
$label = trim($body['label'] ?? 'Agent key');
if ($label === '') $label = 'Agent key';
if (mb_strlen($label) > 60) json_response(['error' => 'Label too long'], 400);

if (!extension_loaded('sodium')) json_response(['error' => 'libsodium missing'], 500);

// Generate token and derive KEK
$token = 'bsk_' . bin2hex(random_bytes(32));
$kek   = substr(hash('sha256', $token, true), 0, 32);

// Wrap current DEK with KEK
$dek   = b64u_dec($_SESSION['DEK']);
$nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
$ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($dek, '', $nonce, $kek);

$keyId  = bin2hex(random_bytes(8));
$uid    = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');

// Store wrapped DEK
$wrapDir = __DIR__ . "/../config/$uid/apikeys";
@mkdir($wrapDir, 0700, true);
file_put_contents("$wrapDir/$keyId.json", json_encode([
    'nonce' => base64_encode($nonce),
    'ct'    => base64_encode($ct),
], JSON_UNESCAPED_SLASHES), LOCK_EX);

// Update global index (token hashes only — not sensitive)
$indexPath = __DIR__ . '/../data/apikeys.json';
$index = file_exists($indexPath) ? (json_decode(file_get_contents($indexPath), true) ?? []) : [];
$index[hash('sha256', $token)] = [
    'user_id' => $_SESSION['user_id'] ?? 'default',
    'key_id'  => $keyId,
];
file_put_contents($indexPath, json_encode($index, JSON_UNESCAPED_SLASHES), LOCK_EX);

// Store display metadata in cassowary
$cass = getCassowary();
$cass['api_keys'][$keyId] = ['label' => $label, 'created_at' => date('c')];
saveCassowary($cass);

json_response(['ok' => true, 'token' => $token, 'key_id' => $keyId, 'label' => $label]);
