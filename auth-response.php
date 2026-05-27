<?php
session_start();
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_dec_ar(string $s): string {
    $s = strtr($s, '-_', '+/');
    return base64_decode($s . str_repeat('=', (4 - strlen($s) % 4) % 4));
}
function respond(array $data, int $code = 200): void {
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_SLASHES);
    exit;
}
function rp_id(): string {
    return preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'baanabus.app');
}
function origin(): string {
    $host = $_SERVER['HTTP_HOST'] ?? 'baanabus.app';
    $isLocal = (bool) preg_match('/^(localhost|127\.0\.0\.1|::1)/', $host);
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : ($isLocal ? 'http' : 'https');
    return $scheme . '://' . $host;
}
function cred_path(string $credIdB64u): string {
    $safe = preg_replace('/[^A-Za-z0-9_\-]/', '_', $credIdB64u);
    $dir  = __DIR__ . '/data/creds';
    @mkdir($dir, 0700, true);
    return $dir . '/' . $safe . '.json';
}

$in = json_decode(file_get_contents('php://input'), true);
if (!$in) respond(['error' => 'Invalid JSON'], 400);
if (($in['type'] ?? '') !== 'public-key') respond(['error' => 'Bad type'], 400);

$credId_b64u       = $in['id'] ?? '';
$r                 = $in['response'] ?? [];
$clientDataJSON    = b64u_dec_ar($r['clientDataJSON'] ?? '');
$authenticatorData = b64u_dec_ar($r['authenticatorData'] ?? '');
$signature         = b64u_dec_ar($r['signature'] ?? '');
$prfResultB64u     = $in['prfResult'] ?? null;

if ($clientDataJSON === '' || $authenticatorData === '' || $signature === '') {
    respond(['error' => 'Missing assertion parts'], 400);
}

// Verify challenge
$expectedChallenge = $_SESSION['auth_challenge'] ?? $_SESSION['assertion_challenge'] ?? null;
if (!$expectedChallenge) respond(['error' => 'No challenge in session'], 400);

$cd = json_decode($clientDataJSON, true);
if (!is_array($cd) || ($cd['type'] ?? '') !== 'webauthn.get') respond(['error' => 'Bad clientData'], 400);

$cd_chal_raw = b64u_dec_ar($cd['challenge'] ?? '');
$exp_raw     = base64_decode($expectedChallenge);
if ($cd_chal_raw === '' || $exp_raw === '' || !hash_equals($exp_raw, $cd_chal_raw)) {
    respond(['error' => 'Challenge mismatch'], 400);
}
if (!hash_equals(origin(), $cd['origin'] ?? '')) respond(['error' => 'Origin mismatch'], 400);

// Verify authenticatorData
if (strlen($authenticatorData) < 37) respond(['error' => 'Auth data too short'], 400);
$rpIdHash = substr($authenticatorData, 0, 32);
$signCnt  = unpack('N', substr($authenticatorData, 33, 4))[1];
if (!hash_equals(hash('sha256', rp_id(), true), $rpIdHash)) respond(['error' => 'RP ID hash mismatch'], 400);

// Load credential record + verify signature
$path = cred_path($credId_b64u);
if (!is_file($path)) respond(['error' => 'Unknown credential'], 400);

$rec = json_decode(file_get_contents($path), true) ?: [];
$publicKeyPem = $rec['publicKeyPem'] ?? null;
if (!$publicKeyPem) respond(['error' => 'Stored public key missing'], 500);

$clientHash = hash('sha256', $clientDataJSON, true);
$signedData = $authenticatorData . $clientHash;
if (openssl_verify($signedData, $signature, $publicKeyPem, OPENSSL_ALGO_SHA256) !== 1) {
    respond(['error' => 'Signature verification failed'], 400);
}

// Update sign counter
if ($signCnt > 0) {
    $prev = (int)($rec['counter'] ?? 0);
    if ($prev > 0 && $signCnt <= $prev) respond(['error' => 'Sign counter did not increase'], 400);
    $rec['counter'] = $signCnt;
    file_put_contents($path, json_encode($rec, JSON_UNESCAPED_SLASHES), LOCK_EX);
}

// Gate 1 passed — set session
$_SESSION['is_authenticated'] = true;
$_SESSION['logged_in']        = true;
$_SESSION['user_id']          = $rec['userId'] ?? $credId_b64u;  // stable per-person, not per-key
$_SESSION['credential_id']    = $credId_b64u;
if (!empty($rec['username'])) $_SESSION['username'] = $rec['username'];
unset($_SESSION['auth_challenge'], $_SESSION['assertion_challenge']);

// Gate 2 — unlock or bootstrap vault with PRF key from YubiKey tap
$vaultReady = false;
if ($prfResultB64u) {
    try {
        $paths = getConfigPaths();
        if (!is_file($paths['enc'])) {
            bootstrapVaultWithPrf($prfResultB64u, $paths);
        } else {
            unlockWithPrf($prfResultB64u, $paths);
        }
        $vaultReady = true;
    } catch (Throwable $e) {
        error_log('Vault unlock failed: ' . $e->getMessage());
    }
}

respond(['ok' => true, 'success' => true, 'vaultReady' => $vaultReady]);
