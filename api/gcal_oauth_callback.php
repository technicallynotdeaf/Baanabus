<?php
// Handles the redirect back from Google after the user grants Calendar access.
// Exchanges the auth code for tokens and saves the refresh_token to cassowary.enc.
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

function gcalOauthError(string $msg): void {
    echo '<!DOCTYPE html><html><head><title>Google Calendar</title></head><body>';
    echo '<p style="color:#c0392b;font-family:system-ui,sans-serif;padding:2rem;">';
    echo htmlspecialchars($msg);
    echo '</p><p style="font-family:system-ui,sans-serif;padding:0 2rem;">';
    echo '<a href="/scene.php">Back to Baanabus</a></p></body></html>';
    exit;
}

if (empty($_SESSION['is_authenticated'])) gcalOauthError('Session expired. Please sign in again.');
if (empty($_SESSION['DEK']))              gcalOauthError('Vault locked. Please sign in again.');

// CSRF check
$expectedState = $_SESSION['gcal_oauth_state'] ?? '';
$receivedState = $_GET['state'] ?? '';
if (!$expectedState || !hash_equals($expectedState, $receivedState)) {
    gcalOauthError('State mismatch — please try connecting again from Settings.');
}
unset($_SESSION['gcal_oauth_state']);

// Check for user denial
if (!empty($_GET['error'])) {
    gcalOauthError('Google authorization declined: ' . $_GET['error']);
}

$code = $_GET['code'] ?? '';
if (!$code) gcalOauthError('No authorization code received from Google.');

$cass         = getCassowary();
$clientId     = $cass['google']['client_id']     ?? '';
$clientSecret = $cass['google']['client_secret'] ?? '';

if (!$clientId || !$clientSecret) {
    gcalOauthError('Client credentials missing — please re-enter them in Settings.');
}

$scheme      = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host        = $_SERVER['HTTP_HOST'];
$redirectUri = $scheme . '://' . $host . '/api/gcal_oauth_callback.php';

// Exchange auth code for access + refresh tokens
$ch = curl_init('https://oauth2.googleapis.com/token');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query([
        'code'          => $code,
        'client_id'     => $clientId,
        'client_secret' => $clientSecret,
        'redirect_uri'  => $redirectUri,
        'grant_type'    => 'authorization_code',
    ]),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 20,
]);
$raw       = curl_exec($ch);
curl_close($ch);
$tokenData = json_decode($raw, true) ?? [];

if (!empty($tokenData['error'])) {
    gcalOauthError('Token exchange failed: ' . ($tokenData['error_description'] ?? $tokenData['error']));
}

$refreshToken = $tokenData['refresh_token'] ?? '';
if (!$refreshToken) {
    gcalOauthError(
        'No refresh token received from Google. Please go to your Google Account > Security > ' .
        'Third-party apps with account access, remove Baanabus, then try connecting again.'
    );
}

// Save refresh token and enable gcal
$cass['google']['refresh_token'] = $refreshToken;
saveCassowary($cass);

$cfg = getConfig() ?? [];
$cfg['preferences']['uses_gcal'] = true;
saveConfig($cfg);

// Redirect back to the app — settings card will show "Connected"
header('Location: /scene.php');
exit;
