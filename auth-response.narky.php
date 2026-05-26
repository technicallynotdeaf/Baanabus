<?php
// auth-response.php — verify assertion, log user in (per-credentialId JSON store)
session_start();
require_once __DIR__ . '/init.php';
header('Content-Type: application/json; charset=utf-8');

/* ---- helpers ---- */
function b64u_dec(string $s): string {
  $s = strtr($s, '-_', '+/'); return base64_decode($s . str_repeat('=', (4 - strlen($s) % 4) % 4));
}
function respond($data, int $code=200){ http_response_code($code); echo json_encode($data, JSON_UNESCAPED_SLASHES); exit; }
function rp_id(): string { return preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'localhost'); }
function origin(): string {
  $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
  $isLocal = preg_match('/^(localhost|127\.0\.0\.1|::1)/', $host);
  $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : ($isLocal ? 'http' : 'https');
  return $scheme.'://'.$host;
}
function cred_path_from_id(string $credIdB64u): string {
  $safe = preg_replace('/[^A-Za-z0-9_\-]/','_', $credIdB64u);
  $dir  = __DIR__ . '/data/creds'; @mkdir($dir, 0700, true);
  return $dir . '/' . $safe . '.json';
}

/* ---- input ---- */
$in = json_decode(file_get_contents('php://input'), true);
if (!$in) respond(['error'=>'Invalid JSON'], 400);
if (($in['type'] ?? '') !== 'public-key') respond(['error'=>'Bad type'], 400);

$credId_b64u = $in['id']   ?? '';
$rawId_b64u  = $in['rawId']?? '';
$r           = $in['response'] ?? [];
$clientDataJSON    = b64u_dec($r['clientDataJSON'] ?? '');
$authenticatorData = b64u_dec($r['authenticatorData'] ?? '');
$signature         = b64u_dec($r['signature'] ?? '');
$userHandle        = isset($r['userHandle']) && $r['userHandle'] !== null ? b64u_dec($r['userHandle']) : null;
if ($clientDataJSON==='' || $authenticatorData==='' || $signature==='') respond(['error'=>'Missing assertion parts'], 400);

/* ---- expected values ---- */
$expectedChallenge = $_SESSION['auth_challenge'] ?? $_SESSION['assertion_challenge'] ?? null;
if (!$expectedChallenge) respond(['error'=>'No challenge in session'], 400);
$expectedOrigin = origin();
$expectedRpId   = rp_id();

/* ---- clientData checks ---- */
$cd = json_decode($clientDataJSON, true);
if (!is_array($cd) || ($cd['type'] ?? '') !== 'webauthn.get') respond(['error'=>'Bad clientData'], 400);
$cd_chal_raw = b64u_dec($cd['challenge'] ?? '');
$exp_raw     = b64u_dec($expectedChallenge);
if ($cd_chal_raw === '' || $exp_raw === '' || !hash_equals($exp_raw, $cd_chal_raw)) respond(['error'=>'Challenge mismatch'], 400);
if (!hash_equals($expectedOrigin, $cd['origin'] ?? '')) respond(['error'=>'Origin mismatch'], 400);

/* ---- authenticatorData checks ---- */
if (strlen($authenticatorData) < 37) respond(['error'=>'Auth data too short'], 400);
$rpIdHash = substr($authenticatorData, 0, 32);
$flags    = ord($authenticatorData[32]); // could enforce UV (0x04) if you want
$signCnt  = unpack('N', substr($authenticatorData, 33, 4))[1];
if (!hash_equals(hash('sha256', $expectedRpId, true), $rpIdHash)) respond(['error'=>'RP ID hash mismatch'], 400);

/* ---- load stored credential (per-file) ---- */
$path = cred_path_from_id($credId_b64u);
if (!is_file($path)) respond(['error'=>'Unknown credential'], 400);
$rec = json_decode(file_get_contents($path), true) ?: [];
$publicKeyPem = $rec['publicKeyPem'] ?? null;
$username     = $rec['username']     ?? null;
$prevCounter  = (int)($rec['counter'] ?? 0);
if (!$publicKeyPem) respond(['error'=>'Stored public key missing'], 500);

/* ---- verify signature ---- */
$clientHash = hash('sha256', $clientDataJSON, true);
$signedData = $authenticatorData . $clientHash;
$ok = openssl_verify($signedData, $signature, $publicKeyPem, OPENSSL_ALGO_SHA256);
if ($ok !== 1) respond(['error'=>'Signature verification failed'], 400);

/* ---- counter monotonicity (best-effort; some authenticators always report 0) ---- */
if ($signCnt > 0) {
  if ($prevCounter > 0 && $signCnt <= $prevCounter) respond(['error'=>'Sign counter did not increase'], 400);
  $rec['counter'] = $signCnt;
  file_put_contents($path, json_encode($rec, JSON_UNESCAPED_SLASHES), LOCK_EX);
}

/* ---- success: mark session ---- */
$_SESSION['is_authenticated'] = true;
$_SESSION['user_id'] = $credId_b64u;         // your primary handle if you key everything by credential id
if ($username) $_SESSION['username'] = $username;
// Optional: if you persist per-credential config, you can also set a helper:
$_SESSION['config_file'] = $path;            // or a separate path if you prefer

unset($_SESSION['auth_challenge'], $_SESSION['assertion_challenge']);

respond(['ok'=>true, 'user_id'=>$credId_b64u, 'username'=>$username ?? null]);

