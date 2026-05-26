<?php
// onboarding.php — registration, sign-in, then vault unlock
require_once __DIR__ . '/header.php'; // starts session, loads layout

$isAuthed = !empty($_SESSION['is_authenticated']);      // set by auth-response.php
$hasDek   = !empty($_SESSION['DEK']);                   // set by unlock.php
if ($isAuthed && $hasDek) {
    header('Location: index.php');
    exit;
}
?>
<div class="container" style="max-width:680px;margin:2rem auto;">
<div width="90%" style="margin:5px 20px 5px 5px">
  <h1>👋 Welcome to Baanabus</h1>

  <?php if (!$isAuthed): ?>
    <!-- Sign up / Sign in -->
    <!-- <section class="card" style="padding:1rem;margin-top:1rem;"> -->
      <h2>Create your account or sign in</h2>
      <label for="username" class="sr-only">Username</label>
      <input id="username" type="text" placeholder="Pick a username"
             style="width:100%;padding:.6rem;margin:.5rem 0;border:1px solid #ccc;border-radius:8px;" />

      <div style="display:flex;gap:.5rem;flex-wrap:wrap;margin:.5rem 0;">
        <button id="btnRegister" class="btn">Register Security Key</button>
        <button id="btnSignIn" class="btn btn-secondary">Sign in with Passkey</button>
      </div>

      <p id="authStatus" class="muted"></p>
      <p class="hint muted" style="margin-top:.5rem;">
        Tip: “Sign in” works with passkeys already registered on this device.
      </p>
    <!-- </section> -->
  <?php endif; ?>

  <!-- Unlock vault (shown after auth, or immediately if already authed but not unlocked) -->
  <section id="vaultUnlock" class="card" style="padding:1rem;margin-top:1.25rem;<?php echo ($isAuthed && !$hasDek) ? '' : 'display:none;'; ?>">
    <h2>🔐 Unlock your vault</h2>
    <p id="unlockHint" class="muted">Enter your passphrase to unlock your vault.</p>

    <div style="display:flex;gap:.5rem;align-items:center;margin:.5rem 0;">
      <input id="vaultPass" type="password" placeholder="Passphrase"
             style="flex:1;padding:.6rem;border:1px solid #ccc;border-radius:8px;" />
      <button id="btnUnlock" class="btn">Unlock</button>
    </div>
    <p id="unlockStatus" class="muted"></p>
  </section>
</div>

<script src="js/app.js"></script>
<script src="js/auth.js"></script>
<script>
// Small helpers
const $ = (q) => document.querySelector(q);
function showUnlock() { $('#vaultUnlock').style.display = ''; }
function sayUnlock(msg, isErr=false){ const n=$('#unlockStatus'); if(!n) return; n.textContent=msg; n.style.color=isErr?'crimson':''; }

// Helper to convert ArrayBuffer to base64url
function bufToB64url(buf) {
  const bytes = new Uint8Array(buf);
  let bin = '';
  for (let i = 0; i < bytes.length; i++) bin += String.fromCharCode(bytes[i]);
  return btoa(bin).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/,'');
}

// Helper to convert base64url to ArrayBuffer
function b64urlToBuf(s) {
  s = s.replace(/-/g, '+').replace(/_/g, '/');
  const pad = s.length % 4 ? '='.repeat(4 - (s.length % 4)) : '';
  const str = atob(s + pad);
  const bytes = new Uint8Array(str.length);
  for (let i = 0; i < str.length; i++) bytes[i] = str.charCodeAt(i);
  return bytes.buffer;
}

// Attempt to unlock with PRF
async function tryPrfUnlock() {
  try {
    sayUnlock('Unlocking with passkey…');
    
    // Get a challenge for PRF
    const challengeResp = await fetch('auth-challenge.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json'}
    });
    const challengeData = await challengeResp.json();
    if (!challengeResp.ok || !challengeData.publicKey) {
      throw new Error('Failed to get challenge');
    }

    // Prepare options with PRF extension
    const pk = challengeData.publicKey;
    pk.challenge = b64urlToBuf(pk.challenge);
    if (pk.allowCredentials) {
      pk.allowCredentials = pk.allowCredentials.map(c => ({
        ...c,
        id: b64urlToBuf(c.id)
      }));
    }
    
    // Request PRF from the passkey
    const tempSalt = new Uint8Array(32); // Temporary salt for PRF evaluation
    crypto.getRandomValues(tempSalt);
    pk.extensions = {...(pk.extensions || {}), prf: { eval: { first: tempSalt.buffer } }};

    let assertion;
    try {
      assertion = await navigator.credentials.get({ publicKey: pk });
    } catch (e) {
      // User cancelled or error occurred
      if (e.name === 'NotAllowedError' || e.name === 'AbortError') {
        return false;
      }
      throw e;
    }
    
    // Extract PRF result
    const exts = assertion.getClientExtensionResults();
    const prfFirst = exts?.prf?.results?.first;
    if (!prfFirst) {
      // PRF not available from this passkey - silently fail, will fall back to password
      return false;
    }

    // Convert PRF result to base64url
    const prfKeyB64u = bufToB64url(prfFirst);

    // Try to unlock with PRF
    const unlockResp = await fetch('unlock.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json'},
      body: JSON.stringify({ prfKey: prfKeyB64u })
    });
    const unlockData = await unlockResp.json();
    
    if (unlockResp.ok && unlockData.ok) {
      sayUnlock('✅ Unlocked successfully');
      setTimeout(() => window.location.href = 'index.php', 350);
      return true;
    } else {
      // PRF unlock failed - fall back to password
      return false;
    }
  } catch (e) {
    // Silently fail - will fall back to password prompt
    console.log('PRF unlock attempt failed:', e);
    return false;
  }
}

// If user signs in or registers successfully, try PRF unlock first, then show password prompt
(function wireFlows(){
  const regBtn = $('#btnRegister');
  const inBtn  = $('#btnSignIn');
  const userEl = $('#username');

  async function handleAuthSuccess() {
    showUnlock();
    
    // Check if PRF wrap exists on server before trying PRF
    try {
      const statusResp = await fetch('vault-status.php');
      if (statusResp.ok) {
        const status = await statusResp.json();
        if (status.hasPrf) {
          // PRF wrap exists, try PRF unlock
          sayUnlock('Attempting to unlock with passkey…');
          const prfSuccess = await tryPrfUnlock();
          if (!prfSuccess) {
            // PRF failed or not available from this device
            sayUnlock('Please enter your passphrase to unlock.', false);
            $('#unlockHint').textContent = 'Enter your passphrase to unlock your vault.';
          }
        } else {
          // No PRF wrap, just show password prompt
          sayUnlock('Please enter your passphrase to unlock.', false);
          $('#unlockHint').textContent = 'Enter your passphrase to unlock your vault.';
        }
      } else {
        // Fallback: show password prompt
        sayUnlock('Please enter your passphrase to unlock.', false);
        $('#unlockHint').textContent = 'Enter your passphrase to unlock your vault.';
      }
    } catch (e) {
      // On error, just show password prompt
      sayUnlock('Please enter your passphrase to unlock.', false);
      $('#unlockHint').textContent = 'Enter your passphrase to unlock your vault.';
    }
  }

  if (regBtn) regBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    const u = (userEl?.value || '').trim();
    if (!u) { const s=$('#authStatus'); if(s){s.textContent='Please enter a username.'; s.style.color='crimson';} return; }
    try {
      await BaanabusAuth.registerPasskey(u);
      await handleAuthSuccess();
    } catch (_) {}
  });

  if (inBtn) inBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    const u = (userEl?.value || '').trim() || null; // optional hint
    try {
      await BaanabusAuth.signInPasskey(u);
      await handleAuthSuccess();
    } catch (_) {}
  });

  // Enter key convenience on passphrase
  const passEl = $('#vaultPass');
  if (passEl) passEl.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') $('#btnUnlock')?.click();
  });

  // If already authenticated but not unlocked, don't auto-try PRF
  // Let user manually unlock with password (or they can try PRF if they want)
  <?php if ($isAuthed && !$hasDek): ?>
  // Just show the unlock form - user can enter password
  <?php endif; ?>
})();

// Unlock handler
(function wireUnlock(){
  const btn = document.getElementById('btnUnlock');
  if (!btn) return;
  btn.addEventListener('click', async () => {
    const pass = (document.getElementById('vaultPass')?.value || '');
    if (!pass) {
      sayUnlock('Please enter a passphrase', true);
      return;
    }
    sayUnlock('Unlocking…');
    try {
      const r = await fetch('unlock.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({ passphrase: pass })
      });
      
      // Check if response is ok and has content
      if (!r.ok) {
        const text = await r.text();
        let errorMsg = 'Unlock failed';
        try {
          const json = JSON.parse(text);
          errorMsg = json.error || errorMsg;
        } catch {
          errorMsg = text || `Server error: ${r.status}`;
        }
        throw new Error(errorMsg);
      }
      
      const text = await r.text();
      if (!text) {
        throw new Error('Empty response from server');
      }
      
      let j;
      try {
        j = JSON.parse(text);
      } catch (e) {
        console.error('Response text:', text);
        throw new Error('Invalid response from server. Check console for details.');
      }
      
      if (j.error) {
        throw new Error(j.error);
      }
      
      if (j.ok) {
        sayUnlock('✅ Unlocked');
        // give UI a tick to show success
        setTimeout(() => window.location.href = 'index.php', 350);
      } else {
        throw new Error('Unlock failed');
      }
    } catch (e) {
      sayUnlock(`❌ ${e.message}`, true);
    }
  });
})();
</script>
<?php
require_once __DIR__ . '/footer.php';
?>
