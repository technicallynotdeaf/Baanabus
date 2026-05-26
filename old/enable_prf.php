<?php
// enable_prf.php — one‑user setup page to enable WebAuthn PRF and wrap your DB Encryption Key (DEK)
// Drop this alongside your existing auth endpoints. It will:
//  1) Ask your authenticator for PRF output via navigator.credentials.get() with extensions.prf
//  2) Generate a DEK (32 bytes), generate per‑user salt, derive KEK = HKDF(PRF, salt, info="baanabus-dek-kek")
//  3) Encrypt DEK with KEK (AES‑256‑GCM) and store to secrets/encrypted_dek.json
//  4) Provide a "Verify" step that re‑derives KEK and decrypts to confirm
// This page assumes a single user (you). No DB rows; it stores to a JSON file on disk.

session_start();
header('Cache-Control: no-store');

$tz = new DateTimeZone('Australia/Melbourne');
$logDir = __DIR__ . '/logs'; if (!is_dir($logDir)) { @mkdir($logDir, 0775, true); }
$secDir = __DIR__ . '/secrets'; if (!is_dir($secDir)) { @mkdir($secDir, 0770, true); }
$store  = $secDir . '/encrypted_dek.json';
$log    = $logDir . '/enable_prf-' . (new DateTime('now',$tz))->format('Ymd') . '.log';

function mlog($msg, $ctx=[]) {
  global $log; $ts = (new DateTime('now', new DateTimeZone('Australia/Melbourne')))->format('Y-m-d H:i:s');
  $ua = $_SERVER['HTTP_USER_AGENT'] ?? '-'; $ip = $_SERVER['REMOTE_ADDR'] ?? '-';
  $line = '['.$ts."] [$ip] $msg ".(!empty($ctx)?json_encode($ctx):'')."\n"; @file_put_contents($log, $line, FILE_APPEND);
}
function b64u_dec($s){ $s=strtr($s,'-_','+/'); return base64_decode($s.str_repeat('=',(4-strlen($s)%4)%4)); }
function b64u_enc($bin){ return rtrim(strtr(base64_encode($bin),'+/','-_'),'='); }
function hkdf_sha256($ikm,$len,$info,$salt){ return hash_hkdf('sha256',$ikm,$len,$info,$salt,true); }

// API: client -> server log sink
if (($_SERVER['REQUEST_METHOD']??'')==='POST' && isset($_GET['log'])) {
  $raw=file_get_contents('php://input'); $j=json_decode($raw,true);
  mlog('CLIENT', $j?:['raw'=>$raw]); header('Content-Type: application/json'); echo json_encode(['ok'=>true]); exit;
}

// API: wrap — receives PRF result (b64url), creates/stores enc DEK
if (($_SERVER['REQUEST_METHOD']??'')==='POST' && isset($_GET['wrap'])) {
  header('Content-Type: application/json');
  $in = json_decode(file_get_contents('php://input'), true) ?: [];
  $prfFirstB64u = $in['prf_first'] ?? null;
  if (!$prfFirstB64u) { http_response_code(400); echo json_encode(['ok'=>false,'err'=>'missing_prf']); exit; }

  $prf = b64u_dec($prfFirstB64u);                // bytes from authenticator
  $salt = random_bytes(32);                      // per-user salt
  $kek  = hkdf_sha256($prf, 32, 'baanabus-dek-kek', $salt);

  $dek  = random_bytes(32);                      // your real DB key (keep ONLY in RAM)
  $iv   = random_bytes(12);
  $tag  = '';
  $enc  = openssl_encrypt($dek, 'aes-256-gcm', $kek, OPENSSL_RAW_DATA, $iv, $tag);
  if ($enc===false) { http_response_code(500); echo json_encode(['ok'=>false,'err'=>'encrypt_failed']); exit; }

  $payload = [
    'created_at' => (new DateTime('now',$tz))->format(DateTime::ATOM),
    'salt_b64u'  => b64u_enc($salt),
    'nonce_b64u' => b64u_enc($iv),
    'tag_b64u'   => b64u_enc($tag),
    'enc_b64u'   => b64u_enc($enc),
    // Optional: store a checksum to validate unwrap later (SHA256 of DEK)
    'dek_sha256_b64u' => b64u_enc(hash('sha256', $dek, true))
  ];
  if (@file_put_contents($store, json_encode($payload, JSON_PRETTY_PRINT))===false) {
    http_response_code(500); echo json_encode(['ok'=>false,'err'=>'store_failed']); exit;
  }
  mlog('WRAP_OK', ['size'=>strlen($enc)]);
  echo json_encode(['ok'=>true]);
  exit;
}

// API: unwrap — receives PRF, re-derives KEK, unwraps and returns checksum
if (($_SERVER['REQUEST_METHOD']??'')==='POST' && isset($_GET['unwrap'])) {
  header('Content-Type: application/json');
  if (!is_file($store)) { http_response_code(404); echo json_encode(['ok'=>false,'err'=>'no_store']); exit; }
  $data = json_decode(file_get_contents($store), true) ?: [];
  $in   = json_decode(file_get_contents('php://input'), true) ?: [];
  $prfFirstB64u = $in['prf_first'] ?? null; if (!$prfFirstB64u){ http_response_code(400); echo json_encode(['ok'=>false,'err'=>'missing_prf']); exit; }

  $salt = b64u_dec($data['salt_b64u']); $iv=b64u_dec($data['nonce_b64u']); $tag=b64u_dec($data['tag_b64u']); $enc=b64u_dec($data['enc_b64u']);
  $prf  = b64u_dec($prfFirstB64u);
  $kek  = hkdf_sha256($prf, 32, 'baanabus-dek-kek', $salt);
  $dek  = openssl_decrypt($enc, 'aes-256-gcm', $kek, OPENSSL_RAW_DATA, $iv, $tag);
  if ($dek===false){ http_response_code(400); echo json_encode(['ok'=>false,'err'=>'unwrap_failed']); exit; }
  $chk  = b64u_enc(hash('sha256',$dek,true));
  echo json_encode(['ok'=>true,'dek_sha256_b64u'=>$chk]);
  exit;
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Enable PRF • Wrap DEK</title>
<style>
  :root{color-scheme:light dark}
  body{font-family:system-ui,Segoe UI,Roboto,sans-serif;margin:0}
  header{padding:12px 16px;border-bottom:1px solid color-mix(in lab,CanvasText 20%,Canvas 80%)}
  main{padding:16px}
  button{padding:10px 14px;border-radius:10px;border:1px solid color-mix(in lab,CanvasText 25%,Canvas 75%)}
  #log{white-space:pre-wrap;font-family:ui-monospace,monospace;background:color-mix(in lab,Canvas 94%,Highlight 6%);padding:12px;margin-top:12px}
  .row{display:flex;flex-wrap:wrap;gap:8px;margin:8px 0}
</style>
</head>
<body>
<header>
  <strong>Enable PRF & Wrap DEK</strong>
  <div id="ctx" class="muted"></div>
</header>
<main>
  <div class="row">
    <button id="btnTryAuth">1) Authenticate with PRF</button>
    <button id="btnWrap" disabled>2) Wrap & Store DEK</button>
    <button id="btnVerify" disabled>3) Verify Unwrap</button>
  </div>
  <div id="status"></div>
  <div id="log"></div>
</main>
<script>
(function(){
  const logEl = document.getElementById('log');
  const statusEl = document.getElementById('status');
  const btnTryAuth = document.getElementById('btnTryAuth');
  const btnWrap = document.getElementById('btnWrap');
  const btnVerify = document.getElementById('btnVerify');

  let lastPrfB64u = null;  // holds PRF result from device
  let lastSaltB64u = null; // we will get this from server only after WRAP (stored on disk)

  const sink = (event, data={}) => fetch('enable_prf.php?log=1',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({event,data,t:Date.now()})}).catch(()=>{});
  const log = (msg) => { const d=document.createElement('div'); d.textContent=`[${new Date().toISOString()}] ${msg}`; logEl.appendChild(d); logEl.scrollTop=logEl.scrollHeight; sink('LOG',{msg}); };

  function b64uToBytes(s){ s=s.replace(/-/g,'+').replace(/_/g,'/'); s+="=".repeat((4-(s.length%4))%4); const bin=atob(s); const u=new Uint8Array(bin.length); for(let i=0;i<bin.length;i++)u[i]=bin.charCodeAt(i); return u; }

  async function tryAuthWithPRF(){
    try {
      log('Fetching challenge from auth-challenge.php …');
      const res = await fetch('auth-challenge.php',{method:'POST',credentials:'include'});
      if(!res.ok) throw new Error('challenge HTTP '+res.status);
      const j = await res.json();
      const pk = j.publicKey || j; // server may wrap it either way

      // Convert base64url → ArrayBuffer fields
      const toBuf = (b64u)=>{ const s=b64u.replace(/-/g,'+').replace(/_/g,'/'); const pad='='.repeat((4-(s.length%4))%4); const bin=atob(s+pad); const u=new Uint8Array(bin.length); for(let i=0;i<bin.length;i++)u[i]=bin.charCodeAt(i); return u.buffer; };
      pk.challenge = toBuf(pk.challenge);
      if(Array.isArray(pk.allowCredentials)) pk.allowCredentials = pk.allowCredentials.map(c=>({...c,id:toBuf(c.id)}));

      // Ask for PRF output using a temporary salt this first round; server will store its own on wrap
      const tempSalt = crypto.getRandomValues(new Uint8Array(32));
      pk.extensions = {...(pk.extensions||{}), prf: { eval: { first: tempSalt.buffer } } };

      log('Calling navigator.credentials.get with PRF …');
      const cred = await navigator.credentials.get({ publicKey: pk, mediation: 'required' });
      const exts = cred.getClientExtensionResults ? cred.getClientExtensionResults() : {};
      const prfFirst = exts?.prf?.results?.first || null;
      if(!prfFirst) { log('PRF not available on this credential/device.'); alert('PRF not available. You may need to register a new passkey on this device.'); return; }

      // Convert PRF ArrayBuffer -> b64url
      const bytes = new Uint8Array(prfFirst); let bin=''; for(let i=0;i<bytes.length;i++) bin+=String.fromCharCode(bytes[i]);
      lastPrfB64u = btoa(bin).replace(/\+/g,'-').replace(/\//g,'_').replace(/=+$/,'');

      log('Got PRF result ✅');
      statusEl.textContent = 'PRF ready. You can now wrap the DEK.';
      btnWrap.disabled = false;
    } catch (err) {
      log('ERROR tryAuthWithPRF: '+err);
      alert('Auth with PRF failed: '+(err?.message||err));
    }
  }

  async function wrap(){
    try {
      if(!lastPrfB64u) { alert('No PRF yet. Run step 1.'); return; }
      log('Sending PRF to server to wrap & store DEK …');
      const r = await fetch('enable_prf.php?wrap=1', { method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify({ prf_first: lastPrfB64u }) });
      const j = await r.json(); if(!j.ok) throw new Error(j.err||'wrap_failed');
      log('Wrap stored ✅  (secrets/encrypted_dek.json)');
      statusEl.textContent = 'Wrapped DEK stored. You can verify unwrap now.';
      btnVerify.disabled = false;
    } catch (err) { log('ERROR wrap: '+err); alert('Wrap failed: '+(err?.message||err)); }
  }

  async function verify(){
    try {
      log('Re-auth to fetch PRF for unwrap …');
      await tryAuthWithPRF();
      if(!lastPrfB64u) throw new Error('no_prf_after_verify_auth');
      const r = await fetch('enable_prf.php?unwrap=1', { method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify({ prf_first: lastPrfB64u }) });
      const j = await r.json(); if(!j.ok) throw new Error(j.err||'unwrap_failed');
      log('Unwrap OK ✅  DEK checksum: '+j.dek_sha256_b64u);
      alert('PRF verified and DEK unwrapped successfully.');
    } catch (err) { log('ERROR verify: '+err); alert('Verify failed: '+(err?.message||err)); }
  }

  btnTryAuth.addEventListener('click', tryAuthWithPRF);
  btnWrap.addEventListener('click', wrap);
  btnVerify.addEventListener('click', verify);
})();
</script>
</body>
</html>

