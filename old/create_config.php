<?php
session_start();

// Basic safety: only allow if user is logged in with passkey
if (empty($_SESSION['username'])) {
    die("You must be logged in first.");
}

$user = preg_replace('/[^a-z0-9_\-]/i', '', $_SESSION['username']);
$configFile = __DIR__ . "/config.json";
$encFile = __DIR__ . "/configs/{$user}.json.enc";
$metaFile = __DIR__ . "/configs/{$user}.meta.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $passphrase = $_POST['passphrase'] ?? '';

    if (!file_exists($configFile)) {
        die("config.json not found.");
    }
    if ($passphrase === '') {
        die("Missing passphrase.");
    }

    $plain = file_get_contents($configFile);
    $salt = random_bytes(SODIUM_CRYPTO_PWHASH_SALTBYTES);
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ad = "baanabus|{$user}|v1";

    $key = sodium_crypto_pwhash(
        SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_KEYBYTES,
        $passphrase,
        $salt,
        SODIUM_CRYPTO_PWHASH_OPSLIMIT_SENSITIVE,
        SODIUM_CRYPTO_PWHASH_MEMLIMIT_SENSITIVE,
        SODIUM_CRYPTO_PWHASH_ALG_DEFAULT
    );

    $cipher = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($plain, $ad, $nonce, $key);

    file_put_contents($encFile, $cipher);
    file_put_contents($metaFile, json_encode([
        'salt' => base64_encode($salt),
        'nonce' => base64_encode($nonce),
        'ad' => $ad
    ], JSON_PRETTY_PRINT));

    echo "<p>✅ Encrypted config saved as {$user}.json.enc</p>";
    echo "<p>You can now delete or move config.json somewhere safe.</p>";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>Create Encrypted Config</title></head>
<body>
<h2>Create Encrypted Config</h2>
<form method="post">
  <label>Passphrase (remember this!):</label><br>
  <input type="password" name="passphrase" required><br><br>
  <button type="submit">Encrypt config.json</button>
</form>
</body>
</html>

