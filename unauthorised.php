<?php require_once __DIR__ . '/header.php'; ?>
<div class="container unauthorised">
  <div class="hero">
	<img id="hero-avatar" src="avatars/Baanabus.png" alt="Baanabus avatar"
     style="display:block;width:160px;max-width:40vw;height:auto;margin:20px auto;">

    <h2>Welcome to <span class="highlight">Baanabus</span></h2>
    <p>Please log in with your passkey or get started with a new account.</p>

    <div class="actions">
      <button id="btn-login" class="action-button">🔑 Log In</button>
      <a href="onboarding.php" class="secondary-button">🚀 Get Started</a>
    </div>

    <p id="status" class="status"></p>
  </div>
</div>

<script>
// BaanabusAuth is loaded globally by header.php (js/auth.js)
document.getElementById('btn-login').addEventListener('click', async function () {
  this.disabled = true;
  try {
    const result = await BaanabusAuth.signInPasskey();
    if (result && result.vaultReady) {
      location.href = 'index.php';
    } else {
      document.getElementById('status').textContent = '⚠️ Signed in but vault could not be unlocked.';
      document.getElementById('status').style.color = 'crimson';
      this.disabled = false;
    }
  } catch (_) {
    this.disabled = false;
  }
});
</script>

<?php require_once __DIR__ . '/footer.php'; ?>

