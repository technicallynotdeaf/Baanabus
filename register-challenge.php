<?php
// register-challenge.php
// Returns PublicKeyCredentialCreationOptions for WebAuthn registration.
// IMPORTANT: Do not include any HTML templates here.

session_start();
require_once __DIR__ . '/init.php'; // logic/bootstrap only (NO header.php)

// Helpers
function b64url(string $bin): string {
    return rtrim(strtr(base64_encode($bin), '+/', '-_'), '=');
}
function respond_json($data, int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

// Read input
$input = json_decode(file_get_contents('php://input'), true);
$username = trim($input['username'] ?? '');

// Validate
if ($username === '') {
    respond_json(['error' => 'Username required'], 400);
}

// Generate challenge & user id
$challenge = random_bytes(32);
$userId    = random_bytes(16);

// Persist to session for the response step
$_SESSION['register_challenge'] = b64url($challenge);
$_SESSION['pending_username']   = $username;

// rp.id must be your effective domain (no port)
$host = $_SERVER['HTTP_HOST'] ?? '';
$rpId = preg_replace('/:\d+$/', '', $host);

// (Optional) exclude existing credential IDs for this username if you have a DB.
// Example placeholder:
// $exclude = array_map(fn($id) => ['type'=>'public-key','id'=>b64url($id)], getCredentialIdsForUser($username));
$exclude = []; // leave empty if you don’t have this yet

// Build options (binary fields are base64url strings; client will convert to ArrayBuffer)
$options = [
    'challenge' => b64url($challenge),
    'rp' => [
        'name' => 'Baanabus',
        'id'   => $rpId,
    ],
    'user' => [
        'id'          => b64url($userId),
        'name'        => $username,
        'displayName' => $username,
    ],
    'pubKeyCredParams' => [
        ['type' => 'public-key', 'alg' => -7],    // ES256
        ['type' => 'public-key', 'alg' => -257],  // RS256
    ],
    'timeout' => 60000,
    'attestation' => 'none',
    'authenticatorSelection' => [
        'residentKey'       => 'preferred',
        'requireResidentKey'=> false,
        'userVerification'  => 'preferred',
    ],
    'excludeCredentials' => $exclude,
];

// Done
respond_json(['publicKey' => $options]);

