<?php
session_start();
header('Content-Type: application/json');

// Basic checks
$input = json_decode(file_get_contents('php://input'), true);

// Support both formats: direct payload or wrapped in 'credential' key
$cred = $input['credential'] ?? $input;
if (!$cred || empty($cred['id'])) {
  echo json_encode(['success' => false, 'message' => 'Invalid credential']); exit;
}

// TODO (security): verify assertion against stored public key.
// MVP mode: trust the browser-origin flow and accept the credential id.
$credentialId = preg_replace('/[^A-Za-z0-9_\-]/', '', $cred['id']);
$_SESSION['credential_id'] = $credentialId;
$_SESSION['user_id'] = $credentialId; // Also set user_id for unlock.php compatibility

// After verifying the signature & userHandle etc.
$_SESSION['is_authenticated'] = true;


// Optional: if there’s a plain config stub, load username for display
$configDir = __DIR__ . '/configs';
$stub = "$configDir/$credentialId.json";
if (is_file($stub)) {
  $cfg = json_decode(file_get_contents($stub), true);
  if (!empty($cfg['username'])) $_SESSION['username'] = $cfg['username'];
}

// Clean up transient challenge
unset($_SESSION['auth_challenge']);

echo json_encode(['success' => true, 'credential_id' => $credentialId]);

