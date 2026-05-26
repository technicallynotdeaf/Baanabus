<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

// Build a WebAuthn assertion (get) challenge
$challenge = random_bytes(32);
$_SESSION['auth_challenge'] = base64_encode($challenge);

$rpId = $_SERVER['HTTP_HOST']; // good enough for MVP on one host

// Load all registered credential IDs from configs directory
$configDir = __DIR__ . '/configs';
$allowCredentials = [];

if (is_dir($configDir)) {
  $files = glob("$configDir/*.json");
  if ($files) {
    foreach ($files as $file) {
      $data = json_decode(file_get_contents($file), true);
      if ($data && !empty($data['credentialId'])) {
        // Credential ID should already be in base64url format from registration
        $credId = trim($data['credentialId']);
        // Make sure it's a valid base64url string (at least 16 chars, typical credential IDs are longer)
        if (preg_match('/^[A-Za-z0-9_-]+$/', $credId) && strlen($credId) >= 16) {
          $allowCredentials[] = [
            'type' => 'public-key',
            'id' => $credId,
            'transports' => ['usb', 'ble', 'nfc', 'internal', 'hybrid']
          ];
        }
      }
    }
  }
}

$options = [
  'challenge' => base64_encode($challenge),
  'rpId' => $rpId,
  'timeout' => 60000,
  'userVerification' => 'preferred',
];

// Include allowCredentials if we have registered credentials
// This is required for non-discoverable credentials like some YubiKeys
// However, if allowCredentials is provided but empty or doesn't match, the browser won't show any credentials
// So we only include it if we have valid credentials
if (!empty($allowCredentials) && count($allowCredentials) > 0) {
  $options['allowCredentials'] = $allowCredentials;
}
// If no credentials registered or list is empty, omit allowCredentials to allow discoverable credentials
// This allows both discoverable and non-discoverable credentials to work

// Wrap for navigator.credentials.get
echo json_encode(['publicKey' => $options], JSON_UNESCAPED_SLASHES);

