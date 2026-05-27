<?php
#error_reporting(E_ALL);
#ini_set('display_errors', 1);

require_once __DIR__ . '/header.php';

/**
 * index.php
 * Main entry point for Baanabus.
 * Routes users based on authentication and config state.
 */

// --- Step 1: Require login (passkey) ---
if (empty($_SESSION['credential_id'])) {
    header("Location: unauthorised.php");
    exit;
}

// --- Step 2: Check config state for this credential --

/*
$credId = $_SESSION['credential_id'];
$configDir = __DIR__ . '/configs';
$cfgPlain = "$configDir/$credId.json";
$cfgEnc   = "$configDir/$credId.json.enc";

if (!file_exists($cfgPlain) && !file_exists($cfgEnc)) {
    echo '<div class="container"><p>🔐 You’re signed in but don’t have a config yet.</p>';
    echo '<p><a class="action-button" href="#" id="openCreateConfig">Create Config</a></p></div>';
    require_once __DIR__ . '/footer.php';
    exit;
} **/

require_once __DIR__.'/config_helper.php';

$s = vaultStatus();

if (!$s['authenticated']) { header('Location: unauthorised.php'); exit; }

if (!$s['exists'] || !$s['unlocked']) {
  // Vault not ready — suppress auto-loaded speech bubble until vault is open
  echo '<script>window.BAANABUS_SUPPRESS_BUBBLE = true;</script>';
  echo '<div class="container" style="max-width:680px;margin:2rem auto;padding:1rem;">';
  echo '<div class="card" style="padding:1.5rem;">';
  echo '<h2>Tap your key to continue</h2>';
  echo '<p class="muted">Your vault needs to be unlocked. Touch your security key to continue.</p>';
  echo '<button id="btnVaultUnlock" class="btn" style="margin-top:0.75rem;">Touch Key</button>';
  echo '<p id="authStatus" class="muted" style="margin-top:0.5rem;"></p>';
  echo '</div></div>';
  echo '<script>
document.getElementById("btnVaultUnlock").addEventListener("click", async function() {
  this.disabled = true;
  try {
    const result = await BaanabusAuth.signInPasskey();
    if (result && result.vaultReady) { location.reload(); }
  } catch(_) { this.disabled = false; }
});
</script>';

} elseif (!$s['onboarding_complete']) {
  // Vault unlocked but onboarding not done — show scene behind wizard overlay
  echo '<script>window.BAANABUS_ONBOARDING = true;</script>';
  include __DIR__ . '/scene.php';
  echo '<script>
document.addEventListener("DOMContentLoaded", function() {
  loadOverlay("welcome.php");
  var closeBtn = document.getElementById("close-overlay");
  if (closeBtn) closeBtn.style.display = "none";
});
</script>';

} else {
  // All good — show the scene
  include __DIR__ . '/scene.php';
}


?>


<?php
require_once __DIR__ . '/footer.php';

?>
