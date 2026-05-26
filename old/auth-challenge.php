<?php
session_start();
header('Content-Type: application/json');

// Base64URL helper
function b64url_encode($bin) {
    return rtrim(strtr(base64_encode($bin), '+/', '-_'), '=');
}

// Load saved credentials
$storePath = __DIR__ . '/credentials.json';
$all = file_exists($storePath) ? (json_decode(file_get_contents($storePath), true) ?: []) : [];

// Build allowCredentials from saved IDs
$allow = [];
foreach ($all as $rec) {
    if (!empty($rec['credentialId'])) {
        $allow[] = [
            'type' => 'public-key',
            'id' => $rec['credentialId'], // already stored as base64url
            'transports' => ['usb','ble','nfc','internal'] // optional hints
        ];
    }
}

$challenge = random_bytes(32);
$_SESSION['auth_challenge'] = $challenge;

$response = [
    'challenge' => base64_encode($challenge),   // JS accepts standard base64
    'rpId' => $_SERVER['HTTP_HOST'] ?? 'localhost',
    'timeout' => 60000,
    'userVerification' => 'preferred',
    'allowCredentials' => $allow,              // 👈 critical for non-discoverable creds
];

echo json_encode($response);

