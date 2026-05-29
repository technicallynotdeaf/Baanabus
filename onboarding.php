<?php
// onboarding.php — registration and sign-in
require_once __DIR__ . '/header.php';

$isAuthed = !empty($_SESSION['is_authenticated']);
require_once __DIR__ . '/config_helper.php';
$vaultReady = $isAuthed && vaultExists() && isUnlocked();
if ($vaultReady) {
    header('Location: index.php');
    exit;
}
?>
<div class="container" style="max-width:680px;margin:2rem auto;">
<div style="margin:5px 20px 5px 5px">
  <h1>Welcome to Baanabus</h1>

  <h2>Create your account or sign in</h2>

  <input id="username" type="text" placeholder="Username"
         style="width:100%;padding:.6rem;margin:.5rem 0;border:1px solid #ccc;border-radius:8px;" />

  <input id="inviteCode" type="text" placeholder="Invite code (new accounts only)"
         style="width:100%;padding:.6rem;margin:.5rem 0;border:1px solid #ccc;border-radius:8px;" />

  <div style="display:flex;gap:.5rem;flex-wrap:wrap;margin:.5rem 0;">
    <button id="btnRegister" class="btn">Register Security Key</button>
    <button id="btnSignIn" class="btn btn-secondary">Sign in with Passkey</button>
  </div>

  <p id="authStatus" class="muted"></p>
  <p class="hint muted" style="margin-top:.5rem;">
    Tip: "Sign in" works with passkeys already registered on this device.
  </p>
</div>
</div>

<script src="js/app.js"></script>
<script src="js/auth.js"></script>
<script src="js/onboarding_page.js"></script>
<?php require_once __DIR__ . '/footer.php'; ?>
