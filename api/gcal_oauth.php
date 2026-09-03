<?php
// Starts the Google OAuth2 web flow. Requires an authenticated, vault-unlocked
// session and client_id already saved in cassowary.enc.
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) {
    echo '<!DOCTYPE html><html><body><p>Not authenticated. <a href="/">Sign in</a></p></body></html>';
    exit;
}
if (empty($_SESSION['DEK'])) {
    echo '<!DOCTYPE html><html><body><p>Vault locked. Please sign in again.</p></body></html>';
    exit;
}

$cass     = getCassowary();
$clientId = $cass['google']['client_id'] ?? '';

if (!$clientId) {
    // No client_id saved yet — bounce back to settings
    header('Location: ../scene.php');
    exit;
}

$state = bin2hex(random_bytes(16));
$_SESSION['gcal_oauth_state'] = $state;

$scheme      = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host        = $_SERVER['HTTP_HOST'];
$redirectUri = $scheme . '://' . $host . '/api/gcal_oauth_callback.php';

$authUrl = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
    'client_id'     => $clientId,
    'redirect_uri'  => $redirectUri,
    'response_type' => 'code',
    'scope'         => 'https://www.googleapis.com/auth/calendar.events',
    'access_type'   => 'offline',
    'prompt'        => 'consent',
    'state'         => $state,
]);

header('Location: ' . $authUrl);
exit;
