// webauthn-prototype.safe.js

// --- helpers ---
function b64ToArrayBuffer(b64) {
  let s = b64.replace(/-/g, '+').replace(/_/g, '/');
  const pad = s.length % 4; if (pad) s += '='.repeat(4 - pad);
  const bin = window.atob(s);
  const bytes = new Uint8Array(bin.length);
  for (let i = 0; i < bin.length; i++) bytes[i] = bin.charCodeAt(i);
  return bytes.buffer;
}
function arrayBufferToB64url(buf) {
  const bytes = new Uint8Array(buf);
  let bin = '';
  for (let i = 0; i < bytes.length; i++) bin += String.fromCharCode(bytes[i]);
  return window.btoa(bin).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/g, '');
}

// Avoid structuredClone; copy what we need and convert strings -> ArrayBuffer
function fixupPublicKeyOptions(src) {
  const pk = {};
  // shallow copy primitives/objects we expect
  for (const k of Object.keys(src)) pk[k] = src[k];

  if (typeof pk.challenge === 'string') pk.challenge = b64ToArrayBuffer(pk.challenge);

  if (pk.user) {
    pk.user = { ...pk.user };
    if (typeof pk.user.id === 'string') pk.user.id = b64ToArrayBuffer(pk.user.id);
  }

  if (Array.isArray(pk.allowCredentials)) {
    pk.allowCredentials = pk.allowCredentials.map(c => {
      const out = { ...c };
      if (typeof out.id === 'string') out.id = b64ToArrayBuffer(out.id);
      return out;
    });
  }

  if (Array.isArray(pk.excludeCredentials)) {
    pk.excludeCredentials = pk.excludeCredentials.map(c => {
      const out = { ...c };
      if (typeof out.id === 'string') out.id = b64ToArrayBuffer(out.id);
      return out;
    });
  }

  return pk;
}

// Always do manual serialization; don't rely on cred.toJSON()
function credToPlain(cred) {
  const out = {
    id: cred.id,
    type: cred.type,
    rawId: arrayBufferToB64url(cred.rawId),
    response: {}
  };
  const r = cred.response;
  if (r) {
    if (r.clientDataJSON)     out.response.clientDataJSON     = arrayBufferToB64url(r.clientDataJSON);
    if (r.attestationObject)  out.response.attestationObject  = arrayBufferToB64url(r.attestationObject);
    if (r.authenticatorData)  out.response.authenticatorData  = arrayBufferToB64url(r.authenticatorData);
    if (r.signature)          out.response.signature          = arrayBufferToB64url(r.signature);
    if (r.userHandle)         out.response.userHandle         = arrayBufferToB64url(r.userHandle);
  }

  // keep extension results, but don't call the method indirectly
  if (typeof cred.getClientExtensionResults === 'function') {
    try { out.clientExtensionResults = cred.getClientExtensionResults(); } catch {}
  }

  // add inside credToPlain(cred) after building `out`:
  if (typeof cred.response?.getPublicKey === 'function') {
    try {
      const pkBuf = cred.response.getPublicKey(); // ArrayBuffer (SPKI DER)
      if (pkBuf) out.publicKey = arrayBufferToB64url(pkBuf);
    } catch (e) { /* ignore */ }
  }
  if (typeof cred.response?.getPublicKeyAlgorithm === 'function') {
    try { out.publicKeyAlgorithm = cred.response.getPublicKeyAlgorithm(); } catch {}
  }
  if (typeof cred.response?.getTransports === 'function') {
    try { out.transports = cred.response.getTransports(); } catch {}
  }


  return out;
}

// --- fetch helpers ---
async function getJSON(url) {
  const res = await fetch(url, { credentials: 'include' });
  if (!res.ok) throw new Error(`GET ${url} ${res.status}`);
  return res.json();
}
async function postJSON(url, body) {
  const res = await fetch(url, {
    method: 'POST',
    credentials: 'include',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(body)
  });
  const text = await res.text().catch(()=> '');
  let json; try { json = JSON.parse(text || '{}'); } catch {}
  if (!res.ok) throw new Error(`POST ${url} ${res.status}: ${text}`);
  return json ?? {};
}

// --- sanity guard so we fail with a readable reason ---
function assertWebAuthnAvailable() {
  if (!window.isSecureContext) throw new Error('WebAuthn needs HTTPS (or localhost).');
  if (!navigator.credentials) throw new Error('navigator.credentials unavailable (Permissions-Policy or browser).');
  if (!navigator.credentials.create) throw new Error('navigator.credentials.create unavailable.');
  if (!window.PublicKeyCredential) throw new Error('PublicKeyCredential unavailable.');
}

// --- actions ---
async function registerUser() {
  try {
    assertWebAuthnAvailable();

    const serverOpts = await getJSON('/register-challenge.php');
    const publicKey  = fixupPublicKeyOptions(serverOpts);

    // Call directly on the object (no indirection) to avoid binding issues
    const cred = await navigator.credentials.create({ publicKey });

    const payload = credToPlain(cred);
    const result  = await postJSON('/register-response.php', payload);

    if (result.success) alert('Registration Successful!');
    else alert('Registration Failed: ' + (result.message || 'unknown'));
  } catch (err) {
    console.error('[register] error', err);
    alert(`Registration Failed: ${err?.name || 'Error'} — ${err?.message || err}`);
  }
}

async function authenticateUser() {
  try {
    assertWebAuthnAvailable();

    const serverOpts = await getJSON('/auth-challenge.php');
    const publicKey  = fixupPublicKeyOptions(serverOpts);

    const assertion = await navigator.credentials.get({ publicKey });

    const payload = credToPlain(assertion);
    const result  = await postJSON('/auth-response.php', payload);

    if (result.success) alert('Authentication Successful!');
    else alert('Authentication Failed: ' + (result.message || 'unknown'));
  } catch (err) {
    console.error('[auth] error', err);
    alert(`Authentication Failed: ${err?.name || 'Error'} — ${err?.message || err}`);
  }
}

// --- buttons ---
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

