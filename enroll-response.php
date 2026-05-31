<?php
// enroll-response.php — verify assertion and create a PRF vault-wrap for the enrolled credential.
// Does NOT change the active session — caller stays logged in as their current credential.
session_start();
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_dec_ev(string $s): string {
    $s = strtr($s, '-_', '+/');
    return base64_decode($s . str_repeat('=', (4 - strlen($s) % 4) % 4));
}
function respond_ev(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}
function origin_ev(): string {
    $host    = $_SERVER['HTTP_HOST'] ?? 'baanabus.app';
    $isLocal = (bool) preg_match('/^(localhost|127\.0\.0\.1|::1)/', $host);
    $scheme  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : ($isLocal ? 'http' : 'https');
    return $scheme . '://' . $host;
}
function rp_id_ev(): string {
    return preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'baanabus.app');
}

if (empty($_SESSION['is_authenticated'])) respond_ev(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond_ev(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') respond_ev(['error' => 'POST only'], 405);

$in = json_decode(file_get_contents('php://input'), true);
if (!$in) respond_ev(['error' => 'Invalid JSON'], 400);

$credId_b64u       = $in['id'] ?? '';
$r                 = $in['response'] ?? [];
$clientDataJSON    = b64u_dec_ev($r['clientDataJSON']    ?? '');
$authenticatorData = b64u_dec_ev($r['authenticatorData'] ?? '');
$signature         = b64u_dec_ev($r['signature']         ?? '');
$prfResultB64u     = $in['prfResult'] ?? null;

if (!$prfResultB64u) respond_ev(['error' => 'No PRF result — this key may not support vault access'], 422);
if ($clientDataJSON === '' || $authenticatorData === '' || $signature === '') {
    respond_ev(['error' => 'Missing assertion parts'], 400);
}

// Verify enroll challenge
$expected = $_SESSION['enroll_challenge'] ?? null;
if (!$expected) respond_ev(['error' => 'No enroll challenge in session'], 400);
unset($_SESSION['enroll_challenge']);

$cd = json_decode($clientDataJSON, true);
if (!is_array($cd) || ($cd['type'] ?? '') !== 'webauthn.get') respond_ev(['error' => 'Bad clientData'], 400);

$cd_raw  = b64u_dec_ev($cd['challenge'] ?? '');
$exp_raw = base64_decode($expected);
if (!hash_equals($exp_raw, $cd_raw)) respond_ev(['error' => 'Challenge mismatch'], 400);
if (!hash_equals(origin_ev(), $cd['origin'] ?? '')) respond_ev(['error' => 'Origin mismatch'], 400);

// Verify RP ID hash
if (strlen($authenticatorData) < 37) respond_ev(['error' => 'Auth data too short'], 400);
$rpIdHash = substr($authenticatorData, 0, 32);
if (!hash_equals(hash('sha256', rp_id_ev(), true), $rpIdHash)) respond_ev(['error' => 'RP ID hash mismatch'], 400);

// Load credential record and verify signature
$credSafe = preg_replace('/[^A-Za-z0-9_\-]/', '_', $credId_b64u);
$credPath = __DIR__ . "/data/creds/$credSafe.json";
if (!is_file($credPath)) respond_ev(['error' => 'Unknown credential'], 400);

$rec = json_decode(file_get_contents($credPath), true) ?: [];
$publicKeyPem = $rec['publicKeyPem'] ?? null;
if (!$publicKeyPem) respond_ev(['error' => 'Stored public key missing'], 500);

$clientHash = hash('sha256', $clientDataJSON, true);
$signedData = $authenticatorData . $clientHash;
if (openssl_verify($signedData, $signature, $publicKeyPem, OPENSSL_ALGO_SHA256) !== 1) {
    respond_ev(['error' => 'Signature verification failed'], 400);
}

// All good — create vault wrap for the enrolled credential using the current session's DEK
$paths = getConfigPaths();  // uses current session's user_id
$dek   = b64u_dec_ev($_SESSION['DEK']);
wrapDekWithPrf($dek, $prfResultB64u, $paths, $credId_b64u);

// Save label to credential record if provided
$label = trim($_SESSION['enroll_label'] ?? '');
unset($_SESSION['enroll_label']);
if ($label !== '' && is_file($credPath)) {
    $rec['label'] = $label;
    file_put_contents($credPath, json_encode($rec, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), LOCK_EX);
}

error_log('Enroll: created PRF wrap for credId=' . substr($credId_b64u, 0, 12) . '… by user=' . ($_SESSION['user_id'] ?? 'unknown'));

respond_ev(['ok' => true, 'enrolled' => true]);
