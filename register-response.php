<?php
session_start();
@include_once __DIR__ . '/cassowary.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_dec_rr(string $s): string {
    $s = strtr($s, '-_', '+/');
    return base64_decode($s . str_repeat('=', (4 - strlen($s) % 4) % 4));
}
function respond_rr(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}

function cbor_decode(string $data, int &$pos = 0): mixed {
    if ($pos >= strlen($data)) throw new Exception('CBOR: unexpected end');
    $byte  = ord($data[$pos++]);
    $major = $byte >> 5;
    $info  = $byte & 0x1f;
    if      ($info < 24)       $len = $info;
    elseif  ($info === 24)     $len = ord($data[$pos++]);
    elseif  ($info === 25)   { $len = (ord($data[$pos]) << 8) | ord($data[$pos+1]); $pos += 2; }
    elseif  ($info === 26)   { $len = unpack('N', substr($data, $pos, 4))[1]; $pos += 4; }
    else throw new Exception("CBOR: unsupported additional info $info");
    switch ($major) {
        case 0: return $len;
        case 1: return -1 - $len;
        case 2: $v = substr($data, $pos, $len); $pos += $len; return $v;
        case 3: $v = substr($data, $pos, $len); $pos += $len; return $v;
        case 4: $a = []; for ($i = 0; $i < $len; $i++) $a[] = cbor_decode($data, $pos); return $a;
        case 5:
            $m = [];
            for ($i = 0; $i < $len; $i++) { $k = cbor_decode($data, $pos); $m[$k] = cbor_decode($data, $pos); }
            return $m;
        default: throw new Exception("CBOR: unsupported major type $major");
    }
}

function extract_public_key_pem(string $authData): string {
    if (strlen($authData) < 55) throw new Exception('authData too short');
    if (!(ord($authData[32]) & 0x40)) throw new Exception('No attested credential data in authData');
    $credIdLen = (ord($authData[53]) << 8) | ord($authData[54]);
    $pos = 55 + $credIdLen;
    $key = cbor_decode($authData, $pos);
    if (!is_array($key) || ($key[1] ?? null) !== 2 || ($key[3] ?? null) !== -7) {
        throw new Exception('Only ES256 (P-256) keys are supported');
    }
    $x = $key[-2] ?? '';
    $y = $key[-3] ?? '';
    if (strlen($x) !== 32 || strlen($y) !== 32) throw new Exception('Invalid P-256 key coordinates');
    // DER SubjectPublicKeyInfo for P-256 uncompressed point
    $der = "\x30\x59\x30\x13"
         . "\x06\x07\x2a\x86\x48\xce\x3d\x02\x01"      // OID ecPublicKey
         . "\x06\x08\x2a\x86\x48\xce\x3d\x03\x01\x07"  // OID P-256
         . "\x03\x42\x00\x04" . $x . $y;
    return "-----BEGIN PUBLIC KEY-----\n" . chunk_split(base64_encode($der), 64, "\n") . "-----END PUBLIC KEY-----\n";
}

// Guard: valid session + invite code re-check
if (empty($_SESSION['register_challenge']) || empty($_SESSION['pending_username']) || empty($_SESSION['pending_userid'])) {
    respond_rr(['error' => 'No active registration session'], 400);
}
$validCodes  = defined('INVITE_CODES') ? INVITE_CODES : [];
$pendingCode = $_SESSION['pending_invite'] ?? '';
if (!in_array($pendingCode, $validCodes, true)) {
    respond_rr(['error' => 'Invalid invite code'], 403);
}

$in = json_decode(file_get_contents('php://input'), true);
if (!$in) respond_rr(['error' => 'Invalid JSON'], 400);

$attestationB64u = $in['response']['attestationObject'] ?? '';
$clientDataB64u  = $in['response']['clientDataJSON']    ?? '';
$credIdB64u      = $in['id']                            ?? '';
if (!$attestationB64u || !$clientDataB64u || !$credIdB64u) {
    respond_rr(['error' => 'Missing registration data'], 400);
}

// Verify clientData challenge
$clientData = json_decode(b64u_dec_rr($clientDataB64u), true);
if (($clientData['type'] ?? '') !== 'webauthn.create') respond_rr(['error' => 'Bad clientData type'], 400);
$expected = b64u_dec_rr($_SESSION['register_challenge']);
$got      = b64u_dec_rr($clientData['challenge'] ?? '');
if (!hash_equals($expected, $got)) respond_rr(['error' => 'Challenge mismatch'], 400);

// Parse attestation → extract public key
try {
    $pos = 0;
    $att      = cbor_decode(b64u_dec_rr($attestationB64u), $pos);
    $authData = $att['authData'] ?? '';
    if (!$authData) throw new Exception('No authData in attestation object');
    $publicKeyPem = extract_public_key_pem($authData);
} catch (Throwable $e) {
    respond_rr(['error' => 'Failed to extract public key: ' . $e->getMessage()], 400);
}

$userId   = $_SESSION['pending_userid'];
$username = $_SESSION['pending_username'];
$credSafe = preg_replace('/[^A-Za-z0-9_\-]/', '_', $credIdB64u);

// Save user record (idempotent — existing users adding a new key skip this)
$usersDir = __DIR__ . '/data/users';
@mkdir($usersDir, 0700, true);
$userPath = "$usersDir/$userId.json";
if (!is_file($userPath)) {
    file_put_contents($userPath, json_encode([
        'userId'      => $userId,
        'username'    => $username,
        'displayName' => $username,
        'createdAt'   => date('c'),
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), LOCK_EX);
}

// Save credential record
$credsDir = __DIR__ . '/data/creds';
@mkdir($credsDir, 0700, true);
$credPath = "$credsDir/$credSafe.json";
if (is_file($credPath)) respond_rr(['error' => 'Credential already registered'], 409);

file_put_contents($credPath, json_encode([
    'credentialId' => $credIdB64u,
    'userId'       => $userId,
    'username'     => $username,
    'publicKeyPem' => $publicKeyPem,
    'counter'      => 0,
    'transports'   => $in['response']['transports'] ?? [],
    'createdAt'    => date('c'),
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), LOCK_EX);

$_SESSION['is_authenticated'] = true;
$_SESSION['logged_in']        = true;
$_SESSION['user_id']          = $userId;
$_SESSION['credential_id']    = $credIdB64u;
$_SESSION['username']         = $username;
unset($_SESSION['register_challenge'], $_SESSION['pending_username'], $_SESSION['pending_userid'], $_SESSION['pending_invite']);

respond_rr(['ok' => true, 'success' => true]);
