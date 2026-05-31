<?php
// enroll-challenge.php — WebAuthn challenge for enrolling an additional passkey into the vault.
// Requires an active, vault-unlocked session. The caller taps a key; enroll-response.php
// creates a PRF wrap for it so that key can unlock the vault independently.
session_start();
require_once __DIR__ . '/init.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_en(string $bin): string {
    return rtrim(strtr(base64_encode($bin), '+/', '-_'), '=');
}
function respond_en(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}

if (empty($_SESSION['is_authenticated'])) respond_en(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond_en(['error' => 'Vault locked — sign in from a working device first'], 423);

$input = json_decode(file_get_contents('php://input'), true) ?: [];
$_SESSION['enroll_label']     = substr(trim($input['label'] ?? ''), 0, 60) ?: '';

$challenge = random_bytes(32);
$_SESSION['enroll_challenge'] = base64_encode($challenge);

$rpId = preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'baanabus.app');

$credsDir = __DIR__ . '/data/creds';
$allowCredentials = [];
if (is_dir($credsDir)) {
    foreach (glob("$credsDir/*.json") ?: [] as $file) {
        $rec = json_decode(file_get_contents($file), true);
        if (!empty($rec['credentialId'])) {
            $credId = trim($rec['credentialId']);
            if (preg_match('/^[A-Za-z0-9_\-]+$/', $credId) && strlen($credId) >= 16) {
                $allowCredentials[] = [
                    'type'       => 'public-key',
                    'id'         => $credId,
                    'transports' => $rec['transports'] ?? ['usb', 'nfc'],
                ];
            }
        }
    }
}

$prfSalt = b64u_en(hash('sha256', 'baanabus-vault-v1', true));

$options = [
    'challenge'        => base64_encode($challenge),
    'rpId'             => $rpId,
    'timeout'          => 60000,
    'userVerification' => 'preferred',
    'extensions'       => ['prf' => ['eval' => ['first' => $prfSalt]]],
];
if (!empty($allowCredentials)) {
    $options['allowCredentials'] = $allowCredentials;
}

respond_en(['publicKey' => $options]);
