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

if (!$s['exists']) {
  echo '<div class="container" style="max-width:680px;margin:2rem auto;padding:1rem;">';
  echo '<div class="card" style="padding:1.5rem;">';
  echo '<h2>🔐 Create Your Config</h2>';
  echo '<p>You\'re signed in but don\'t have a config yet. Create an encrypted config to get started.</p>';
  echo '<p><a href="#" id="openCreateConfig" class="btn" style="display:inline-block;margin-top:0.5rem;">Create Config</a></p>';
  echo '</div></div>';
} elseif (!$s['unlocked']) {
  echo '<div class="container" style="max-width:680px;margin:2rem auto;padding:1rem;">';
  echo '<div class="card" style="padding:1.5rem;">';
  echo '<h2>🔒 Vault Locked</h2>';
  echo '<p>Your config exists but is locked. <a href="onboarding.php" class="btn" style="display:inline-block;margin-top:0.5rem;">Unlock Now</a></p>';
  echo '</div></div>';
} else {
  // Config exists and is unlocked - show the scene
	#=============================
	#     Main Scene
	#============================== -->
	include __DIR__ . '/scene.php';
} 


?>


<?php
require_once __DIR__ . '/footer.php';

?>
