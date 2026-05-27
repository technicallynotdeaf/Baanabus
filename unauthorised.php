<?php
// If already authenticated, send straight to index.php — no point showing the login page
require_once __DIR__ . '/init.php';
if (!empty($_SESSION['credential_id'])) {
    header('Location: index.php');
    exit;
}
require_once __DIR__ . '/header.php';
?>
<script>window.BAANABUS_SUPPRESS_BUBBLE = true;</script>
<div class="container unauthorised">
  <div class="hero">
    <img id="hero-avatar" src="avatars/Baanabus.png" alt="Baanabus avatar"
     style="display:block;width:160px;max-width:40vw;height:auto;margin:20px auto;">

    <h2>Welcome to <span class="highlight">Baanabus</span></h2>
    <p>Please log in with your passkey or get started with a new account.</p>

    <div class="actions">
      <button id="btn-login" class="action-button">Log In</button>
      <a href="onboarding.php" class="secondary-button">Get Started</a>
    </div>

    <p id="status" class="status"></p>
  </div>
</div>

<script>
document.getElementById('btn-login').addEventListener('click', async function () {
  this.disabled = true;
  try {
    const result = await BaanabusAuth.signInPasskey();
    if (result && result.ok) {
      // Auth succeeded — index.php handles vault-locked vs vault-open state
      location.href = 'index.php';
    } else {
      this.disabled = false;
    }
  } catch (_) {
    this.disabled = false;
  }
});
</script>

<?php require_once __DIR__ . '/footer.php'; ?>
