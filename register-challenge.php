<?php
session_start();
require_once __DIR__ . '/init.php';
@include_once __DIR__ . '/cassowary.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_rc(string $bin): string {
    return rtrim(strtr(base64_encode($bin), '+/', '-_'), '=');
}
function respond_rc(array $data, int $code = 200): void {
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}
function uuid4(): string {
    $b = random_bytes(16);
    $b[6] = chr((ord($b[6]) & 0x0f) | 0x40);
    $b[8] = chr((ord($b[8]) & 0x3f) | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($b), 4));
}

$input      = json_decode(file_get_contents('php://input'), true);
$username   = trim($input['username']   ?? '');
$inviteCode = trim($input['inviteCode'] ?? '');

if ($username === '') respond_rc(['error' => 'Username required'], 400);

// Invite code gate — codes defined in cassowary.php (gitignored)
$validCodes = defined('INVITE_CODES') ? INVITE_CODES : [];
if (!in_array($inviteCode, $validCodes, true)) {
    respond_rc(['error' => 'Invalid invite code'], 403);
}

// Find existing user by username, or prepare a new userId
$usersDir = __DIR__ . '/data/users';
$credsDir = __DIR__ . '/data/creds';
$userId   = null;
$exclude  = [];

if (is_dir($usersDir)) {
    foreach (glob("$usersDir/*.json") ?: [] as $f) {
        $u = json_decode(file_get_contents($f), true);
        if (($u['username'] ?? '') === $username) {
            $userId = $u['userId'];
            break;
        }
    }
}
if (!$userId) $userId = uuid4();

// Exclude credentials already registered to this userId
if (is_dir($credsDir)) {
    foreach (glob("$credsDir/*.json") ?: [] as $f) {
        $c = json_decode(file_get_contents($f), true);
        if (($c['userId'] ?? '') === $userId && !empty($c['credentialId'])) {
            $exclude[] = ['type' => 'public-key', 'id' => $c['credentialId']];
        }
    }
}

$challenge = random_bytes(32);
$_SESSION['register_challenge'] = b64u_rc($challenge);
$_SESSION['pending_username']   = $username;
$_SESSION['pending_userid']     = $userId;
$_SESSION['pending_invite']     = $inviteCode;

$rpId    = preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'baanabus.app');
$prfSalt = b64u_rc(hash('sha256', 'baanabus-vault-v1', true));

$options = [
    'challenge' => b64u_rc($challenge),
    'rp'        => ['name' => 'Baanabus', 'id' => $rpId],
    'user'      => [
        'id'          => b64u_rc(hash('sha256', $userId, true)),
        'name'        => $username,
        'displayName' => $username,
    ],
    'pubKeyCredParams' => [
        ['type' => 'public-key', 'alg' => -7],  // ES256 only — PRF requires CTAP2
    ],
    'timeout'     => 60000,
    'attestation' => 'none',
    'authenticatorSelection' => [
        'residentKey'        => 'preferred',
        'requireResidentKey' => false,
        'userVerification'   => 'preferred',
    ],
    'excludeCredentials' => $exclude,
    'extensions' => ['prf' => ['eval' => ['first' => $prfSalt]]],
];

respond_rc(['publicKey' => $options]);
