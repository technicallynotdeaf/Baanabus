<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

// Only bounce away if fully ready — auth AND vault open — otherwise show sign-in
if (isAuthenticated() && isUnlocked()) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/header.php';
?>
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

<script src="js/unauthorised.js"></script>

<?php require_once __DIR__ . '/footer.php'; ?>
