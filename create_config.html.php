<?php
require_once __DIR__ . '/header.php';

if (empty($_SESSION['credential_id'])) {
  header('Location: unauthorised.php'); exit;
}
$credId = preg_replace('/[^A-Za-z0-9_\-]/', '', $_SESSION['credential_id']);
$configDir = __DIR__ . '/configs';
$encPath  = "$configDir/$credId.json.enc";
$metaPath = "$configDir/$credId.meta.json";

$error = '';
$ok = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!function_exists('sodium_crypto_aead_xchacha20poly1305_ietf_encrypt')) {
    $error = 'libsodium not available on this PHP install.';
  } else {
    $sqlitePath = trim($_POST['sqlite_path'] ?? '');
    $pass1 = $_POST['passphrase'] ?? '';
    $pass2 = $_POST['confirm'] ?? '';

    if ($sqlitePath === '' || $pass1 === '') {
      $error = 'Please enter a database path and a passphrase.';
    } elseif ($pass1 !== $pass2) {
      $error = 'Passphrases do not match.';
    } else {
      @mkdir($configDir, 0700, true);

      $plain = json_encode([
        'username'     => $_SESSION['username'] ?? 'user',
        'credentialId' => $credId,
        'sqlite_path'  => $sqlitePath,
        'settings'     => []
      ], JSON_UNESCAPED_SLASHES);

      $salt  = random_bytes(SODIUM_CRYPTO_PWHASH_SALTBYTES);
      $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
      $ad    = "baanabus|$credId|v1";

      $key = sodium_crypto_pwhash(
        SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_KEYBYTES,
        $pass1, $salt,
        SODIUM_CRYPTO_PWHASH_OPSLIMIT_SENSITIVE,
        SODIUM_CRYPTO_PWHASH_MEMLIMIT_SENSITIVE,
        SODIUM_CRYPTO_PWHASH_ALG_DEFAULT
      );

      $cipher = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($plain, $ad, $nonce, $key);

      file_put_contents($encPath, $cipher);
      file_put_contents($metaPath, json_encode([
        'salt'  => base64_encode($salt),
        'nonce' => base64_encode($nonce),
        'ad'    => $ad
      ], JSON_PRETTY_PRINT));

      $ok = true;
      // Optional: remove any old plain stub
      $stub = "$configDir/$credId.json";
      if (file_exists($stub)) @unlink($stub);

      // Ready to use; redirect to index (which will detect unlocked state later)
      header('Location: index.php'); exit;
    }
  }
}
?>

<div class="container">
  <h2>🔐 Create Your Encrypted Config</h2>
  <p>Passkey: <code><?= htmlspecialchars($credId) ?></code></p>

  <?php if ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form method="post">
    <label>SQLite database path</label><br>
    <input class="form-input" name="sqlite_path" placeholder="/var/www/baanabus/data/baanabus.sqlite3" required><br><br>

    <label>Choose a passphrase</label><br>
    <input class="form-input" type="password" name="passphrase" required><br><br>

    <label>Confirm passphrase</label><br>
    <input class="form-input" type="password" name="confirm" required><br><br>

    <button class="form-button" type="submit">Create Encrypted Config</button>
  </form>

  <p class="hint">Tip: Make sure PHP has the libsodium extension enabled.</p>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>

