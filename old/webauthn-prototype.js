// webauthn-prototype.debug.js

// ---- helpers ----
function b64ToArrayBuffer(b64) {
  let s = b64.replace(/-/g, '+').replace(/_/g, '/');
  const pad = s.length % 4; if (pad) s += '='.repeat(4 - pad);
  const bin = atob(s);
  const buf = new Uint8Array(bin.length);
  for (let i = 0; i < bin.length; i++) buf[i] = bin.charCodeAt(i);
  return buf.buffer;
}
function arrayBufferToB64url(buf) {
  const bytes = new Uint8Array(buf);
  let bin = ''; for (let i = 0; i < bytes.length; i++) bin += String.fromCharCode(bytes[i]);
  return btoa(bin).replace(/\+/g,'-').replace(/\//g,'_').replace(/=+$/,'');
}
function fixupPublicKeyOptions(pk) {
  pk = structuredClone(pk);
  if (pk.challenge && typeof pk.challenge === 'string') pk.challenge = b64ToArrayBuffer(pk.challenge);
  if (pk.user && typeof pk.user.id === 'string') pk.user.id = b64ToArrayBuffer(pk.user.id);
  if (Array.isArray(pk.allowCredentials)) {
    pk.allowCredentials = pk.allowCredentials.map(c => ({...c, id: typeof c.id === 'string' ? b64ToArrayBuffer(c.id) : c.id}));
  }
  if (Array.isArray(pk.excludeCredentials)) {
    pk.excludeCredentials = pk.excludeCredentials.map(c => ({...c, id: typeof c.id === 'string' ? b64ToArrayBuffer(c.id) : c.id}));
  }
  return pk;
}
function credToJSON(cred) {
  if (cred && typeof cred.toJSON === 'function') return cred.toJSON();
  return {
    id: cred.id,
    type: cred.type,
    rawId: arrayBufferToB64url(cred.rawId),
    response: {
      clientDataJSON: arrayBufferToB64url(cred.response.clientDataJSON),
      attestationObject: cred.response.attestationObject ? arrayBufferToB64url(cred.response.attestationObject) : undefined,
      authenticatorData: cred.response.authenticatorData ? arrayBufferToB64url(cred.response.authenticatorData) : undefined,
      signature: cred.response.signature ? arrayBufferToB64url(cred.response.signature) : undefined,
      userHandle: cred.response.userHandle ? arrayBufferToB64url(cred.response.userHandle) : undefined,
    },
    clientExtensionResults: cred.getClientExtensionResults?.()
  };
}
async function getJSON(url) {
  const r = await fetch(url, { credentials: 'include' });
  if (!r.ok) throw new Error(`GET ${url} ${r.status}`);
  return r.json();
}
async function postJSON(url, body) {
  const r = await fetch(url, {
    method: 'POST',
    credentials: 'include', // send PHPSESSID cookie
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(body)
  });
  const text = await r.text().catch(()=> '');
  let json;
  try { json = JSON.parse(text || '{}'); } catch { /* leave undefined */ }
  if (!r.ok) {
    console.error('[postJSON] HTTP error', r.status, text);
    throw new Error(`POST ${url} ${r.status}: ${text}`);
  }
  return json ?? {};
}

// ---- environment sanity check (common silent killers) ----
(function sanity() {
  if (location.protocol !== 'https:' && location.hostname !== 'localhost') {
    console.warn('WebAuthn requires HTTPS (or localhost). Current:', location.protocol, location.hostname);
  }
})();

// ---- actions ----
async function registerUser() {
  console.log('[register] start');
  try {
    const opts = await getJSON('/register-challenge.php');
    console.log('[register] server options:', opts);

    const publicKey = fixupPublicKeyOptions(opts);
    console.log('[register] fixed publicKey', publicKey);

    // If this throws, the POST will never run
    const cred = await navigator.credentials.create({ publicKey });
    console.log('[register] credential created', cred);

    const payload = credToJSON(cred);
    console.log('[register] payload', payload);

    const result = await postJSON('/register-response.php', payload);
    console.log('[register] server result', result);

    if (result.success) {
      alert('Registration Successful!');
    } else {
      alert('Registration Failed: ' + (result.message || 'unknown'));
    }
  } catch (err) {
    console.error('[register] error:', err, 'name:', err?.name, 'message:', err?.message);
    // Show *why* it failed
    alert(`Registration Failed: ${err?.name || 'Error'} — ${err?.message || err}`);
  }
}

async function authenticateUser() {
  console.log('[auth] start');
  try {
    const opts = await getJSON('/auth-challenge.php');
    console.log('[auth] server options:', opts);

    const publicKey = fixupPublicKeyOptions(opts);
    console.log('[auth] fixed publicKey', publicKey);

    const assertion = await navigator.credentials.get({ publicKey });
    console.log('[auth] assertion', assertion);

    const payload = credToJSON(assertion);
    console.log('[auth] payload', payload);

    const result = await postJSON('/auth-response.php', payload);
    console.log('[auth] server result', result);

    if (result.success) {
      alert('Authentication Successful!');
    } else {
      alert('Authentication Failed: ' + (result.message || 'unknown'));
    }
  } catch (err) {
    console.error('[auth] error:', err, 'name:', err?.name, 'message:', err?.message);
    alert(`Authentication Failed: ${err?.name || 'Error'} — ${err?.message || err}`);
  }
}

// ---- UI wiring ----
(function attachButtons() {
  const container = document.createElement('div');
  container.style.display = 'flex';
  container.style.flexDirection = 'column';
  container.style.gap = '10px';

  const registerButton = document.createElement('button');
  registerButton.textContent = 'Register with FIDO Key';
  registerButton.onclick = registerUser;

  const authenticateButton = document.createElement('button');
  authenticateButton.textContent = 'Authenticate with FIDO Key';
  authenticateButton.onclick = authenticateUser;

  container.appendChild(registerButton);
  container.appendChild(authenticateButton);
  (document.currentScript?.parentNode || document.body).appendChild(container);
})();

