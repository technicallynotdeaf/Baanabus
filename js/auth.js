// auth.js — WebAuthn register + authenticate (no UI clutter)

// ---------- small DOM helpers ----------
function el(q) { return document.querySelector(q); }
function say(msg, isError=false) {
  const n = el('#authStatus') || el('.auth-status') || el('#status');
  if (n) { n.textContent = msg; n.style.color = isError ? 'crimson' : ''; }
  console[(isError?'error':'log')](msg);
}

// ---------- base64url helpers ----------
function b64urlToBuf(s) {
  s = s.replace(/-/g, '+').replace(/_/g, '/');
  const pad = s.length % 4 ? '='.repeat(4 - (s.length % 4)) : '';
  const str = atob(s + pad);
  const bytes = new Uint8Array(str.length);
  for (let i = 0; i < str.length; i++) bytes[i] = str.charCodeAt(i);
  return bytes.buffer;
}
function bufToB64url(buf) {
  const bytes = new Uint8Array(buf);
  let bin = '';
  for (let i = 0; i < bytes.length; i++) bin += String.fromCharCode(bytes[i]);
  return btoa(bin).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/,'');
}

// ---------- option preparation ----------
function prepCreateOptions(opts) {
  opts.challenge = b64urlToBuf(opts.challenge);
  opts.user.id   = b64urlToBuf(opts.user.id);
  if (opts.excludeCredentials) {
    opts.excludeCredentials = opts.excludeCredentials.map(c => ({...c, id: b64urlToBuf(c.id)}));
  }
  return opts;
}
function prepGetOptions(opts) {
  opts.challenge = b64urlToBuf(opts.challenge);
  if (opts.allowCredentials) {
    opts.allowCredentials = opts.allowCredentials.map(c => ({...c, id: b64urlToBuf(c.id)}));
  }
  if (opts.extensions?.prf?.eval?.first) {
    opts.extensions.prf.eval.first = b64urlToBuf(opts.extensions.prf.eval.first);
  }
  return opts;
}

// ---------- main flows ----------
async function registerPasskey(username, inviteCode='') {
  try {
    say('Requesting registration challenge…');
    const resp = await fetch('register-challenge.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json'},
      body: JSON.stringify({ username: username.trim(), inviteCode })
    });
    const data = await resp.json();
    if (!resp.ok || data.error) throw new Error(data.error || 'Challenge error');

    const credential = await navigator.credentials.create({
      publicKey: prepCreateOptions(data.publicKey)
    });

    const payload = {
      id: credential.id,
      rawId: bufToB64url(credential.rawId),
      type: credential.type,
      response: {
        attestationObject: bufToB64url(credential.response.attestationObject),
        clientDataJSON:    bufToB64url(credential.response.clientDataJSON)
      }
    };

    const verify = await fetch('register-response.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json'},
      body: JSON.stringify(payload)
    });
    const result = await verify.json();
    if (!verify.ok || result.error) throw new Error(result.error || 'Register failed');

    say('✅ Registered! You can now sign in.');
    return result;
  } catch (e) {
    say(`❌ Register error: ${e.message}`, true);
    throw e;
  }
}

async function signInPasskey(hintUsername=null) {
  try {
    say('Requesting authentication challenge…');
    const resp = await fetch('auth-challenge.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json'},
      body: JSON.stringify({ username: hintUsername || null })
    });
    const data = await resp.json();
    if (!resp.ok || data.error) throw new Error(data.error || 'Challenge error');

    // ✅ Guard: ensure binary fields exist before WebAuthn call
    const pk = data.publicKey || {};
    if (!pk.challenge || (pk.allowCredentials && !Array.isArray(pk.allowCredentials))) {
      say('Session expired — please refresh and try again.', true);
      return;
    }

    const assertion = await navigator.credentials.get({
      publicKey: prepGetOptions(data.publicKey)
    });

    const payload = {
      id: assertion.id,
      rawId: bufToB64url(assertion.rawId),
      type: assertion.type,
      response: {
        authenticatorData: bufToB64url(assertion.response.authenticatorData),
        clientDataJSON:    bufToB64url(assertion.response.clientDataJSON),
        signature:         bufToB64url(assertion.response.signature),
        userHandle:        assertion.response.userHandle ? bufToB64url(assertion.response.userHandle) : null
      }
    };

    // Include PRF result if the authenticator returned one — used for vault unlock server-side
    const extResults = assertion.getClientExtensionResults();
    console.log('[Auth] extension results:', JSON.stringify(extResults, (k,v) => v instanceof ArrayBuffer ? '(ArrayBuffer)' : v));
    const prfFirst = extResults?.prf?.results?.first;
    if (prfFirst) payload.prfResult = bufToB64url(prfFirst);

    say('Verifying assertion…');
    const verify = await fetch('auth-response.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json'},
      body: JSON.stringify(payload)
    });
    const result = await verify.json();
    if (!verify.ok || result.error) throw new Error(result.error || 'Auth failed');

    say('✅ Signed in!');
    return result;
  } catch (e) {
    say(`❌ Sign-in error: ${e.message}`, true);
    throw e;
  }
}

// ---------- enroll a passkey into the vault (called while vault is already open) ----------
async function enrollPasskey() {
  try {
    say('Touch the key you want to enroll…');
    const resp = await fetch('enroll-challenge.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: '{}'
    });
    const data = await resp.json();
    if (!resp.ok || data.error) throw new Error(data.error || 'Challenge error');

    const assertion = await navigator.credentials.get({
      publicKey: prepGetOptions(data.publicKey)
    });

    const extResults = assertion.getClientExtensionResults();
    console.log('[Enroll] extension results:', JSON.stringify(extResults, (k,v) => v instanceof ArrayBuffer ? '(ArrayBuffer)' : v));
    const prfFirst = extResults?.prf?.results?.first;
    if (!prfFirst) throw new Error('This key did not return a PRF result — it may need to be re-registered to support vault access.');

    const payload = {
      id:      assertion.id,
      rawId:   bufToB64url(assertion.rawId),
      type:    assertion.type,
      response: {
        authenticatorData: bufToB64url(assertion.response.authenticatorData),
        clientDataJSON:    bufToB64url(assertion.response.clientDataJSON),
        signature:         bufToB64url(assertion.response.signature),
      },
      prfResult: bufToB64url(prfFirst)
    };

    say('Enrolling…');
    const verify = await fetch('enroll-response.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify(payload)
    });
    const result = await verify.json();
    if (!verify.ok || result.error) throw new Error(result.error || 'Enroll failed');

    say('✅ Key enrolled — it can now unlock your vault.');
    return result;
  } catch(e) {
    say(`❌ ${e.message}`, true);
    throw e;
  }
}

// ---------- export ----------
window.BaanabusAuth = { registerPasskey, signInPasskey, enrollPasskey };
// registerPasskey(username, inviteCode) — inviteCode required for new accounts

