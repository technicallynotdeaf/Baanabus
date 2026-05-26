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
// Small helpers
const b64 = bytes => btoa(String.fromCharCode(...new Uint8Array(bytes)));

async function loginWithPasskey() {
  const status = document.getElementById('status');
  status.textContent = 'Preparing login…';

  try {
    // 1) Get auth options
    const optRes = await fetch('auth-challenge.php', { method: 'POST' });
    const optionsWrapper = await optRes.json();               // { publicKey: {...} }
    if (!optionsWrapper.publicKey) throw new Error('Bad challenge payload');

    // 2) Request assertion
    const assertion = await navigator.credentials.get(optionsWrapper);

    // 3) Encode for server
    const payload = {
      id: assertion.id,
      type: assertion.type,
      rawId: b64(assertion.rawId),
      response: {
        clientDataJSON: b64(assertion.response.clientDataJSON),
        authenticatorData: b64(assertion.response.authenticatorData),
        signature: b64(assertion.response.signature),
        userHandle: assertion.response.userHandle ? b64(assertion.response.userHandle) : null
      }
    };

    status.textContent = 'Verifying…';

    // 4) Send to server
    const verifyRes = await fetch('auth-response.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ credential: payload })
    });

    const result = await verifyRes.json();
    if (result.success) {
      status.textContent = '✅ Logged in. Loading…';
      location.href = 'index.php';
    } else {
      status.textContent = '❌ ' + (result.message || 'Login failed');
    }
  } catch (e) {
    console.error(e);
    document.getElementById('status').textContent = '❌ ' + e.message;
  }
}

document.getElementById('btn-login').addEventListener('click', loginWithPasskey);
</script>

<?php require_once __DIR__ . '/footer.php'; ?>

