<?php
session_start();
header('Content-Type: application/json');

// --- Check we actually have a pending challenge ---
if (empty($_SESSION['register_challenge']) || empty($_SESSION['pending_username'])) {
    echo json_encode(['success' => false, 'message' => 'No active registration session']);
    exit;
}

// --- Read input ---
$input = json_decode(file_get_contents('php://input'), true);
$username   = trim($input['username'] ?? '');
$credential = $input['credential'] ?? null;

if (!$credential || empty($credential['id'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid credential data']);
    exit;
}

// --- Pull session values ---
$credentialId = preg_replace('/[^A-Za-z0-9_\-]/', '', $credential['id']);
$userId       = $_SESSION['pending_userid'] ?? base64_encode(random_bytes(16));
$storedUsername = $_SESSION['pending_username'];

// --- Make sure configs folder exists ---
$configDir = __DIR__ . '/configs';
if (!is_dir($configDir)) {
    mkdir($configDir, 0700, true);
}

// --- Build stub config file path ---
$configPath = "$configDir/$credentialId.json";

// --- Create a new blank (unencrypted) config stub ---
if (file_exists($configPath)) {
    echo json_encode(['success' => false, 'message' => 'Credential already registered']);
    exit;
}

$configData = [
    'username'     => $storedUsername,
    'userHandle'   => $userId,
    'credentialId' => $credentialId,
    'createdAt'    => date('c'),
    // these will be filled later by create_config.php / unlock.php
    'sqlite_path'  => '',
    'settings'     => []
];

file_put_contents($configPath, json_encode($configData, JSON_PRETTY_PRINT));

// --- Update session to mark logged in ---
$_SESSION['credential_id'] = $credentialId;
$_SESSION['username']      = $storedUsername;

// --- Clean up registration temp data ---
unset($_SESSION['register_challenge'], $_SESSION['pending_username'], $_SESSION['pending_userid']);

echo json_encode([
    'success' => true,
    'message' => 'Registered successfully',
    'credential_id' => $credentialId
]);

