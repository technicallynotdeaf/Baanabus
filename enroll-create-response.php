<?php
// enroll-create-response.php — verify a newly-created credential and create its vault PRF wrap.
// The credential is saved to data/creds/ and the DEK is wrapped using the PRF output if present.
// If the authenticator supports PRF but didn't return a result during create (rare), responds with
// needsPrfAuth=true so the client can do a follow-up credentials.get() via enroll-response.php.
session_start();
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_dec_ecr(string $s): string {
    $s = strtr($s, '-_', '+/');
    return base64_decode($s . str_repeat('=', (4 - strlen($s) % 4) % 4));
}
function respond_ecr(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}

function cbor_decode_ecr(string $data, int &$pos = 0): mixed {
    if ($pos >= strlen($data)) throw new Exception('CBOR: unexpected end');
    $byte  = ord($data[$pos++]);
    $major = $byte >> 5;
    $info  = $byte & 0x1f;
    if      ($info < 24)     $len = $info;
    elseif  ($info === 24)   $len = ord($data[$pos++]);
    elseif  ($info === 25) { $len = (ord($data[$pos]) << 8) | ord($data[$pos+1]); $pos += 2; }
    elseif  ($info === 26) { $len = unpack('N', substr($data, $pos, 4))[1]; $pos += 4; }
    else throw new Exception("CBOR: unsupported info $info");
    switch ($major) {
        case 0: return $len;
        case 1: return -1 - $len;
        case 2: $v = substr($data, $pos, $len); $pos += $len; return $v;
        case 3: $v = substr($data, $pos, $len); $pos += $len; return $v;
        case 4: $a = []; for ($i = 0; $i < $len; $i++) $a[] = cbor_decode_ecr($data, $pos); return $a;
        case 5:
            $m = [];
            for ($i = 0; $i < $len; $i++) { $k = cbor_decode_ecr($data, $pos); $m[$k] = cbor_decode_ecr($data, $pos); }
            return $m;
        default: throw new Exception("CBOR: unsupported major $major");
    }
}

function extract_public_key_pem_ecr(string $authData): string {
    if (strlen($authData) < 55) throw new Exception('authData too short');
    if (!(ord($authData[32]) & 0x40)) throw new Exception('No attested credential data');
    $credIdLen = (ord($authData[53]) << 8) | ord($authData[54]);
    $pos = 55 + $credIdLen;
    $key = cbor_decode_ecr($authData, $pos);
    if (!is_array($key) || ($key[1] ?? null) !== 2 || ($key[3] ?? null) !== -7) {
        throw new Exception('Only ES256 (P-256) supported');
    }
    $x = $key[-2] ?? ''; $y = $key[-3] ?? '';
    if (strlen($x) !== 32 || strlen($y) !== 32) throw new Exception('Invalid P-256 coordinates');
    $der = "\x30\x59\x30\x13"
         . "\x06\x07\x2a\x86\x48\xce\x3d\x02\x01"
         . "\x06\x08\x2a\x86\x48\xce\x3d\x03\x01\x07"
         . "\x03\x42\x00\x04" . $x . $y;
    return "-----BEGIN PUBLIC KEY-----\n" . chunk_split(base64_encode($der), 64, "\n") . "-----END PUBLIC KEY-----\n";
}

if (empty($_SESSION['is_authenticated'])) respond_ecr(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond_ecr(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') respond_ecr(['error' => 'POST only'], 405);

$expected = $_SESSION['enroll_create_challenge'] ?? null;
if (!$expected) respond_ecr(['error' => 'No challenge in session — start again'], 400);
unset($_SESSION['enroll_create_challenge']);

$in = json_decode(file_get_contents('php://input'), true);
if (!$in) respond_ecr(['error' => 'Invalid JSON'], 400);

$attestationB64u = $in['response']['attestationObject'] ?? '';
$clientDataB64u  = $in['response']['clientDataJSON']    ?? '';
$credIdB64u      = $in['id']         ?? '';
$prfResultB64u   = $in['prfResult']  ?? null;
$prfEnabled      = (bool)($in['prfEnabled'] ?? false);

if (!$attestationB64u || !$clientDataB64u || !$credIdB64u) {
    respond_ecr(['error' => 'Missing registration data'], 400);
}

// Verify challenge
$clientData = json_decode(b64u_dec_ecr($clientDataB64u), true);
if (($clientData['type'] ?? '') !== 'webauthn.create') respond_ecr(['error' => 'Bad clientData type'], 400);
$got = b64u_dec_ecr($clientData['challenge'] ?? '');
$exp = b64u_dec_ecr($expected);
if (!hash_equals($exp, $got)) respond_ecr(['error' => 'Challenge mismatch'], 400);

// Extract public key from attestation
try {
    $pos      = 0;
    $att      = cbor_decode_ecr(b64u_dec_ecr($attestationB64u), $pos);
    $authData = $att['authData'] ?? '';
    if (!$authData) throw new Exception('No authData in attestation');
    $publicKeyPem = extract_public_key_pem_ecr($authData);
} catch (Throwable $e) {
    respond_ecr(['error' => 'Key extraction failed: ' . $e->getMessage()], 400);
}

// Save credential record (linked to the existing user)
$userId   = $_SESSION['user_id'] ?? 'default';
$username = $_SESSION['username'] ?? 'user';
$credSafe = preg_replace('/[^A-Za-z0-9_\-]/', '_', $credIdB64u);
$credsDir = __DIR__ . '/data/creds';
@mkdir($credsDir, 0700, true);
$credPath = "$credsDir/$credSafe.json";
if (!is_file($credPath)) {
    file_put_contents($credPath, json_encode([
        'credentialId' => $credIdB64u,
        'userId'       => $userId,
        'username'     => $username,
        'publicKeyPem' => $publicKeyPem,
        'counter'      => 0,
        'transports'   => $in['response']['transports'] ?? [],
        'createdAt'    => date('c'),
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), LOCK_EX);
}

// Vault wrap using PRF output returned during create (most Android + Chrome passkeys do this)
if ($prfResultB64u) {
    $paths = getConfigPaths();
    $dek   = b64u_dec_ecr($_SESSION['DEK']);
    wrapDekWithPrf($dek, $prfResultB64u, $paths, $credIdB64u);
    error_log('EnrollCreate: vault wrap created for credId=' . substr($credIdB64u, 0, 12) . '… user=' . $userId);
    respond_ecr(['ok' => true, 'enrolled' => true]);
}

// PRF is supported but wasn't evaluated during create — need one more authentication touch
if ($prfEnabled) {
    error_log('EnrollCreate: credential saved, awaiting PRF auth for credId=' . substr($credIdB64u, 0, 12) . '…');
    respond_ecr(['ok' => true, 'needsPrfAuth' => true, 'credentialId' => $credIdB64u]);
}

// No PRF support at all — roll back the credential we just saved so it doesn't
// block future attempts via excludeCredentials. The passkey on the device is harmless
// (it just can't unlock the vault) but the server record would cause "credential
// manager" errors on retry if left in place.
if (is_file($credPath)) @unlink($credPath);
error_log('EnrollCreate: rolled back credential (no PRF) for user=' . $userId);
respond_ecr(['error' => 'This passkey does not support vault encryption (PRF extension not available). On Android this usually means Google Play Services is too old or sandboxed. Your YubiKey via NFC is the reliable unlock path for now.'], 422);
