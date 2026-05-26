<?php
// mobileauth.php — Mobile-focused WebAuthn authentication with granular debug logging
// Place this file alongside your existing auth-challenge.php and auth-response.php
// Assumes those endpoints return/accept JSON compatible with your desktop flow.

// ---------- PHP bootstrap ----------
\session_start();
\header('X-Frame-Options: SAMEORIGIN');
\header('Referrer-Policy: no-referrer');
\header('Cross-Origin-Opener-Policy: same-origin');
\header('Cross-Origin-Embedder-Policy: require-corp');
\header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
\header('Pragma: no-cache');

$tz = new DateTimeZone('Australia/Melbourne');
$now = new DateTime('now', $tz);

$logDir = __DIR__ . '/logs';
if (!is_dir($logDir)) { @mkdir($logDir, 0775, true); }
$logFile = $logDir . '/auth-mobile-' . $now->format('Ymd') . '.log';

function mlog($msg, $context = []) {
    global $logFile, $now, $tz;
    $ts = (new DateTime('now', $tz))->format('Y-m-d H:i:s.v');
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '-';
    $ip = $_SERVER['REMOTE_ADDR'] ?? '-';
    $line = sprintf('[%s] [%s] [%s] %s', $ts, $ip, $ua, $msg);
    if (!empty($context)) {
        $json = json_encode($context, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        $line .= ' ' . $json;
    }
    $line .= "\n";
    @file_put_contents($logFile, $line, FILE_APPEND);
    // Also echo to PHP error log for server visibility if desired
    // error_log($line);
}

// ---------- Lightweight log sink for client JS ----------
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_GET['log'])) {
    $raw = file_get_contents('php://input');
    $payload = json_decode($raw, true);
    mlog('CLIENT', $payload ?: ['raw'=>$raw]);
    \header('Content-Type: application/json');
    echo json_encode(['ok' => true]);
    exit;
}

// ---------- Simple health probe ----------
if (isset($_GET['ping'])) {
    \header('Content-Type: application/json');
    echo json_encode(['ok'=>true,'time'=>$now->format(DateTime::ATOM)]);
    exit;
}

// ---------- Initial server-side context dump ----------
mlog('PAGE_OPEN', [
    'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
    'host'   => $_SERVER['HTTP_HOST'] ?? '',
    'uri'    => $_SERVER['REQUEST_URI'] ?? '',
    'origin' => ($_SERVER['HTTP_ORIGIN'] ?? ''),
    'referer'=> ($_SERVER['HTTP_REFERER'] ?? ''),
]);

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <title>Baanabus • Mobile Passkey Sign‑in (Debug)</title>
  <style>
    :root { color-scheme: light dark; }
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, 'Fira Sans', 'Droid Sans', 'Helvetica Neue', Arial, sans-serif; margin: 0; padding: 0; }
    header { position: sticky; top: 0; padding: 12px 16px; background: color-mix(in lab, Canvas 85%, Highlight 15%); border-bottom: 1px solid color-mix(in lab, CanvasText 20%, Canvas 80%); }
    main { padding: 16px; }
    button { display: inline-flex; align-items: center; gap: .5rem; padding: 12px 14px; border-radius: 12px; border: 1px solid color-mix(in lab, CanvasText 25%, Canvas 75%); background: color-mix(in lab, Canvas 95%, Highlight 5%); font-weight: 600; }
    button:active { transform: translateY(1px); }
    #log { white-space: pre-wrap; font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; background: color-mix(in lab, Canvas 94%, Highlight 6%); border-top: 1px solid color-mix(in lab, CanvasText 20%, Canvas 80%); padding: 12px 16px; min-height: 30vh; }
    .muted { opacity: .7; }
    .row { display: flex; flex-wrap: wrap; gap: 8px; margin: 8px 0 16px; }
    .ok { color: #2e7d32; }
    .warn { color: #e65100; }
    .err { color: #b00020; }
    .kv { display: grid; grid-template-columns: max-content 1fr; gap: 6px 12px; margin: 12px 0; }
    .kv div { padding: 4px 0; border-bottom: 1px dashed color-mix(in lab, CanvasText 15%, Canvas 85%); }
  </style>
</head>
<body>
  <header>
    <div><strong>Mobile Passkey Sign‑in (Debug)</strong></div>
    <div class="muted" id="ctx"></div>
  </header>
  <main>
    <section class="kv" id="env"></section>
    <div class="row">
      <button id="check">1) Check device support</button>
      <button id="start">2) Start sign‑in with passkey</button>
      <button id="retry" style="display:none;">Retry</button>
      <button id="clear">Clear log</button>
    </div>
    <div id="log" aria-live="polite"></div>
  </main>

<script>
(function(){
  const ctxEl = document.getElementById('ctx');
  const envEl = document.getElementById('env');
  const logEl = document.getElementById('log');
  const btnCheck = document.getElementById('check');
  const btnStart = document.getElementById('start');
  const btnRetry = document.getElementById('retry');
  const btnClear = document.getElementById('clear');

  const state = { startTs: performance.now(), lastStep: null };

  const sink = (event, data={}) => fetch('mobileauth.php?log=1', {
    method: 'POST', headers: {'Content-Type':'application/json'}, credentials: 'include',
    body: JSON.stringify({event, data, t: Date.now()})
  }).catch(()=>{});

  const log = (msg, cls='') => {
    const ts = new Date().toISOString();
    const line = `[${ts}] ${msg}`;
    const div = document.createElement('div');
    if (cls) div.className = cls;
    div.textContent = line;
    logEl.appendChild(div);
    logEl.scrollTop = logEl.scrollHeight;
    sink('LOG', {msg});
  };

  const kvRow = (k,v) => {
    const kdiv = document.createElement('div');
    kdiv.textContent = k;
    const vdiv = document.createElement('div');
    vdiv.textContent = v;
    envEl.appendChild(kdiv); envEl.appendChild(vdiv);
  };

  // Display basic context
  ctxEl.textContent = location.origin + location.pathname;
  kvRow('Secure Context', String(window.isSecureContext));
  kvRow('UA', navigator.userAgent);
  kvRow('Platform', navigator.platform || '');
  kvRow('Hostname', location.hostname);

  // Base64url helpers
  const b64urlToBuf = (b64url) => {
    const pad = '='.repeat((4 - (b64url.length % 4)) % 4);
    const b64 = (b64url.replace(/-/g, '+').replace(/_/g, '/')) + pad;
    const str = atob(b64);
    const bytes = new Uint8Array(str.length);
    for (let i=0; i<str.length; i++) bytes[i] = str.charCodeAt(i);
    return bytes.buffer;
  };
  const bufToB64url = (buf) => {
    const bytes = new Uint8Array(buf);
    let str = '';
    for (let i=0; i<bytes.byteLength; i++) str += String.fromCharCode(bytes[i]);
    return btoa(str).replace(/\+/g,'-').replace(/\//g,'_').replace(/=+$/,'');
  };

  async function checkSupport(){
    log('Checking WebAuthn support...');
    const support = {
      PublicKeyCredential: !!window.PublicKeyCredential,
      credentials: !!navigator.credentials,
      isSecureContext: !!window.isSecureContext,
      conditional: false,
      platform: false,
    };
    try {
      support.conditional = ('isConditionalMediationAvailable' in PublicKeyCredential) ?
        await PublicKeyCredential.isConditionalMediationAvailable() : false;
    } catch(e){ support.conditional = false; }
    try {
      support.platform = ('isUserVerifyingPlatformAuthenticatorAvailable' in PublicKeyCredential) ?
        await PublicKeyCredential.isUserVerifyingPlatformAuthenticatorAvailable() : false;
    } catch(e){ support.platform = false; }

    kvRow('PublicKeyCredential', String(support.PublicKeyCredential));
    kvRow('navigator.credentials', String(support.credentials));
    kvRow('Conditional Mediation', String(support.conditional));
    kvRow('Platform Authenticator', String(support.platform));

    if (!support.isSecureContext) log('Not a secure context (https). WebAuthn will fail.', 'err');
    if (!support.PublicKeyCredential) log('PublicKeyCredential missing.', 'err');
    if (!support.credentials) log('navigator.credentials missing.', 'err');
    if (support.platform) log('Device has a platform authenticator ✅', 'ok');
    else log('No platform authenticator reported (may still work with external keys).', 'warn');

    sink('SUPPORT', support);
    return support;
  }

  async function startAuth(){
    try {
      btnRetry.style.display = 'none';
      state.lastStep = 'fetch-challenge';
      log('Requesting challenge from server...');

      const res = await fetch('auth-challenge.php', { method:'POST', credentials:'include' });
      const contentType = res.headers.get('content-type') || '';
      if (!res.ok) throw new Error('Challenge HTTP ' + res.status);
      if (!contentType.includes('application/json')) log('Warning: challenge response is not JSON.', 'warn');
      const json = await res.json();
      sink('CHALLENGE_RX', {keys: Object.keys(json)});

      // Expect { publicKey: {...} }
      const options = json.publicKey || json;
      if (!options || !options.challenge) throw new Error('Malformed challenge: missing challenge');

      // Convert base64url fields to ArrayBuffers
      options.challenge = b64urlToBuf(options.challenge);
      if (Array.isArray(options.allowCredentials)) {
        options.allowCredentials = options.allowCredentials.map(cred => ({
          ...cred,
          id: b64urlToBuf(cred.id)
        }));
      }

      log('Calling navigator.credentials.get(...)');
      state.lastStep = 'webauthn-get';

      const cred = await navigator.credentials.get({ publicKey: options, mediation: 'required' });
      if (!cred) throw new Error('No credential returned.');

      sink('CRED_OBTAINED', { id: cred.id, type: cred.type });
      log('Credential obtained ✅', 'ok');

      const authData = cred.response;
      const payload = {
        id: cred.id,
        rawId: bufToB64url(cred.rawId),
        type: cred.type,
        response: {
          clientDataJSON: bufToB64url(authData.clientDataJSON),
          authenticatorData: bufToB64url(authData.authenticatorData),
          signature: bufToB64url(authData.signature),
          userHandle: authData.userHandle ? bufToB64url(authData.userHandle) : null
        },
        // Optional debug context sent to server
        debug: {
          ua: navigator.userAgent,
          platform: navigator.platform || null,
          href: location.href,
        }
      };

      state.lastStep = 'send-response';
      log('Sending assertion to server...');

      const verify = await fetch('auth-response.php', {
        method: 'POST', credentials: 'include',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });

      const vtext = await verify.text();
      let vjson = null;
      try { vjson = JSON.parse(vtext); } catch {}
      sink('VERIFY_RX', { ok: verify.ok, body: vjson || vtext.slice(0,300) });

      if (!verify.ok) throw new Error('Verify HTTP ' + verify.status + ' ' + vtext);

      if (vjson && (vjson.ok || vjson.authenticated || vjson.success)) {
        log('Server verified assertion ✅ Logged in.', 'ok');
        // Optionally redirect after short delay
        setTimeout(()=>{ location.href = 'index.php'; }, 800);
      } else {
        log('Server response did not indicate success. See logs.', 'warn');
        btnRetry.style.display = '';
      }

    } catch (err) {
      sink('ERROR', { step: state.lastStep, message: String(err), stack: String(err?.stack||'') });
      log('ERROR at step ' + state.lastStep + ': ' + err, 'err');
      btnRetry.style.display = '';
    }
  }

  // Wire up UI
  btnCheck.addEventListener('click', checkSupport, { once: false });
  btnStart.addEventListener('click', () => { checkSupport().then(startAuth); });
  btnRetry.addEventListener('click', () => { startAuth(); });
  btnClear.addEventListener('click', () => { logEl.textContent = ''; sink('CLEAR'); });

  // Auto-run capability probe for convenience
  checkSupport();
})();
</script>
</body>
</html>

