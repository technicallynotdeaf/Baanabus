<?php
// create_config.php
session_start();
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) { 
  http_response_code(401); 
  die('Not authorised'); 
}
if (!extension_loaded('sodium')) { 
  http_response_code(500); 
  die('libsodium required'); 
}

// Ensure user_id is set (fallback to credential_id)
if (empty($_SESSION['user_id']) && !empty($_SESSION['credential_id'])) {
  $_SESSION['user_id'] = $_SESSION['credential_id'];
}

$ok = false; 
$msg = ''; 
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $pass = trim($_POST['passphrase'] ?? '');
    if ($pass === '') {
      throw new Exception('Passphrase is required.');
    }

    // Get config paths using the helper
    $paths = getConfigPaths();
    
    // Check if config already exists
    if (file_exists($paths['enc'])) {
      throw new Exception('Config already exists. Please unlock it instead.');
    }

    // Create initial config data
    $plainConfig = [
      'appName' => 'Baanabus',
      'owner' => $_SESSION['username'] ?? $_SESSION['user_id'] ?? 'owner',
      'createdAt' => gmdate('c'),
      'sqlite_path' => '', // Will be set later if needed
    ];

    // Generate DEK (Data Encryption Key)
    $dek = random_bytes(32);
    
    // Encrypt the config with DEK
    $nonceCfg = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $plain = json_encode($plainConfig, JSON_UNESCAPED_SLASHES);
    $ctCfg = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($plain, '', $nonceCfg, $dek);
    $configEnc = [
      'nonce' => base64_encode($nonceCfg), 
      'ct' => base64_encode($ctCfg)
    ];

    // Wrap DEK with passphrase (for passphrase unlock)
    $salt = random_bytes(SODIUM_CRYPTO_PWHASH_SALTBYTES);
    $kek = sodium_crypto_pwhash(
      32, $pass, $salt,
      SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE,
      SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE,
      SODIUM_CRYPTO_PWHASH_ALG_DEFAULT
    );
    $nonceWrap = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ctWrap = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($dek, '', $nonceWrap, $kek);
    
    $wrappedDek = [
      'alg' => 'xchacha20',
      'kdf' => 'argon2id',
      'salt' => base64_encode($salt),
      'nonce' => base64_encode($nonceWrap),
      'ct' => base64_encode($ctWrap),
    ];

    // Write encrypted config
    if (!file_put_contents($paths['enc'], json_encode($configEnc, JSON_UNESCAPED_SLASHES), LOCK_EX)) {
      throw new Exception('Failed to write config.enc');
    }
    @chmod($paths['enc'], 0600);

    // Write passphrase wrap
    if (!file_put_contents($paths['pass'], json_encode($wrappedDek, JSON_UNESCAPED_SLASHES), LOCK_EX)) {
      throw new Exception('Failed to write passphrase wrap');
    }
    @chmod($paths['pass'], 0600);

    $ok = true; 
    $msg = '✅ Encrypted config created. You can now unlock with your passphrase.';
  } catch (Throwable $e) {
    $err = '❌ ' . $e->getMessage();
  }
}

$isPartial = (isset($_GET['partial']) && $_GET['partial']=='1') ||
             (($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest');

if ($isPartial) {
  // -------- fragment for overlay --------
  ?>
  <div class="overlay-header">
    <h2>Create encrypted config</h2>
    <button class="overlay-close" title="Close">×</button>
  </div>
  <div class="overlay-content">
    <?php if ($msg): ?><p style="color:green;" data-cfg-created="<?php echo $ok? '1':'0'; ?>"><?php echo htmlspecialchars($msg); ?></p><?php endif; ?>
    <?php if ($err): ?><p style="color:crimson;"><?php echo htmlspecialchars($err); ?></p><?php endif; ?>

    <?php if (!$ok): ?>
      <form id="createConfigForm">
        <label for="passphrase">Set a passphrase:</label>
        <input id="passphrase" name="passphrase" type="password" required
               style="width:100%;padding:.6rem;margin:.5rem 0;border:1px solid #ccc;border-radius:8px;" />
        <button class="btn">Create encrypted config</button>
        <p id="createCfgStatus" class="muted" style="margin-top:.5rem;"></p>
      </form>
    <?php endif; ?>
  </div>
  <?php
  exit;
}

// -------- full-page fallback (direct visit) --------
require __DIR__ . '/header.php';
?>
<div class="container" style="max-width:640px;margin:2rem auto;">
  <h1>Create encrypted config</h1>
  <?php if ($msg): ?><p style="color:green;"><?php echo htmlspecialchars($msg); ?></p><?php endif; ?>
  <?php if ($err): ?><p style="color:crimson;"><?php echo htmlspecialchars($err); ?></p><?php endif; ?>
  <?php if (!$ok): ?>
    <form method="post">
      <label for="passphrase">Set a passphrase:</label>
      <input id="passphrase" name="passphrase" type="password" required
             style="width:100%;padding:.6rem;margin:.5rem 0;border:1px solid #ccc;border-radius:8px;" />
      <button class="btn">Create encrypted config</button>
    </form>
  <?php endif; ?>
  <p class="muted" style="margin-top:1rem;"><a href="onboarding.php">Back</a></p>
</div>
<?php require __DIR__ . '/footer.php'; ?>

