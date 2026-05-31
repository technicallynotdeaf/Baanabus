<?php
// enroll-create-challenge.php — WebAuthn CREATE challenge for adding a brand-new passkey to an
// existing vault-unlocked account. Accepts {"type":"platform"|"cross-platform"} to steer the
// browser toward a device passkey or a hardware key respectively.
session_start();
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_ecc(string $bin): string {
    return rtrim(strtr(base64_encode($bin), '+/', '-_'), '=');
}
function respond_ecc(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}

if (empty($_SESSION['is_authenticated'])) respond_ecc(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond_ecc(['error' => 'Vault locked — sign in from a working device first'], 423);

$input = json_decode(file_get_contents('php://input'), true) ?: [];
$type  = ($input['type'] ?? '') === 'cross-platform' ? 'cross-platform' : 'platform';

$userId   = $_SESSION['user_id'] ?? 'default';
$username = $_SESSION['username'] ?? 'user';
$rpId     = preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'baanabus.app');
$prfSalt  = b64u_ecc(hash('sha256', 'baanabus-vault-v1', true));

// Exclude credentials already registered to this user so the browser won't try to re-register them
$exclude  = [];
$credsDir = __DIR__ . '/data/creds';
if (is_dir($credsDir)) {
    foreach (glob("$credsDir/*.json") ?: [] as $f) {
        $c = json_decode(file_get_contents($f), true);
        if (($c['userId'] ?? '') === $userId && !empty($c['credentialId'])) {
            $exclude[] = ['type' => 'public-key', 'id' => $c['credentialId']];
        }
    }
}

$challenge = random_bytes(32);
$_SESSION['enroll_create_challenge'] = b64u_ecc($challenge);

$options = [
    'challenge'        => b64u_ecc($challenge),
    'rp'               => ['name' => 'Baanabus', 'id' => $rpId],
    'user'             => [
        'id'          => b64u_ecc(hash('sha256', $userId, true)),
        'name'        => $username,
        'displayName' => $username,
    ],
    'pubKeyCredParams'       => [['type' => 'public-key', 'alg' => -7]],
    'timeout'                => 60000,
    'attestation'            => 'none',
    'authenticatorSelection' => [
        'authenticatorAttachment' => $type,
        'residentKey'             => 'discouraged',  // 'preferred' forces synced/Google creds on Android
        'requireResidentKey'      => false,
        'userVerification'        => 'preferred',
    ],
    'extensions'         => ['prf' => ['eval' => ['first' => $prfSalt]]],
    'excludeCredentials' => $exclude,
];

respond_ecc(['publicKey' => $options]);
