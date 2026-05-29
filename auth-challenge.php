<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

$challenge = random_bytes(32);
$_SESSION['auth_challenge'] = base64_encode($challenge);

$rpId = preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'baanabus.app');

// Load registered credentials from data/creds/
$credsDir = __DIR__ . '/data/creds';
$allowCredentials = [];

if (is_dir($credsDir)) {
    foreach (glob("$credsDir/*.json") ?: [] as $file) {
        $rec = json_decode(file_get_contents($file), true);
        if (!empty($rec['credentialId'])) {
            $credId = trim($rec['credentialId']);
            if (preg_match('/^[A-Za-z0-9_\-]+$/', $credId) && strlen($credId) >= 16) {
                $allowCredentials[] = [
                    'type' => 'public-key',
                    'id'   => $credId,
                    // No transports hint — stored transports reflect registration method
                    // (e.g. 'usb' only) but the key supports NFC too. Sending a narrow
                    // hint causes GrapheneOS Credential Manager to reject NFC assertions.
                ];
            }
        }
    }
}

// Fixed PRF eval input — deterministic so the YubiKey always derives the same vault key
$prfSalt = rtrim(strtr(base64_encode(hash('sha256', 'baanabus-vault-v1', true)), '+/', '-_'), '=');

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

echo json_encode(['publicKey' => $options], JSON_UNESCAPED_SLASHES);
