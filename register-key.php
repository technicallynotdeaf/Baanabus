<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Register Passkey</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <style>body{font-family:system-ui,Segoe UI,Arial,sans-serif;margin:2rem}label,input,button{font-size:1rem}</style>
  <script>
  // helpers reused
  function b64ToArrayBuffer(b64){let s=b64.replace(/-/g,'+').replace(/_/g,'/');const p=s.length%4;if(p)s+='='.repeat(4-p);const b=atob(s);const u=new Uint8Array(b.length);for(let i=0;i<b.length;i++)u[i]=b.charCodeAt(i);return u.buffer;}
  function arrayBufferToB64url(buf){const u=new Uint8Array(buf);let b='';for(let i=0;i<u.length;i++)b+=String.fromCharCode(u[i]);return btoa(b).replace(/\+/g,'-').replace(/\//g,'_').replace(/=+$/,'');}
  function fixupPublicKeyOptions(pk){
    const out={...pk};
    if (typeof out.challenge==='string') out.challenge=b64ToArrayBuffer(out.challenge);
    if (out.user && typeof out.user.id==='string') out.user.id=b64ToArrayBuffer(out.user.id);
    if (Array.isArray(out.excludeCredentials)) out.excludeCredentials=out.excludeCredentials.map(c=>({...c,id:typeof c.id==='string'?b64ToArrayBuffer(c.id):c.id}));
    return out;
  }
  function credToPlain(cred){
    const r=cred.response, out={id:cred.id,type:cred.type,rawId:arrayBufferToB64url(cred.rawId),response:{}};
    if(r.clientDataJSON)out.response.clientDataJSON=arrayBufferToB64url(r.clientDataJSON);
    if(r.attestationObject)out.response.attestationObject=arrayBufferToB64url(r.attestationObject);
    // try to include SPKI if browser provides it
    if (typeof r.getPublicKey==='function') {
      try{ const pk=r.getPublicKey(); if(pk) out.publicKey=arrayBufferToB64url(pk);}catch{}
    }
    if (typeof r.getPublicKeyAlgorithm==='function') {
      try{ out.publicKeyAlgorithm=r.getPublicKeyAlgorithm(); }catch{}
    }
    if (typeof r.getTransports==='function') {
      try{ out.transports=r.getTransports(); }catch{}
    }
    return out;
  }
  async function postJSON(u,b){const r=await fetch(u,{method:'POST',credentials:'include',headers:{'Content-Type':'application/json'},body:JSON.stringify(b)});const t=await r.text();let j={};try{j=JSON.parse(t||'{}')}catch{}if(!r.ok)throw new Error('POST '+u+' '+r.status+': '+t);return j;}
  async function getJSON(u){const r=await fetch(u,{credentials:'include'});if(!r.ok)throw new Error('GET '+u+' '+r.status);return r.json();}

  async function doRegister(ev){
    ev.preventDefault();
    const userId = document.getElementById('uid').value.trim();
    if (!userId) { alert('Please enter a User ID (email/username)'); return; }

    // Ask server for registration options (passing userId)
    const params = new URLSearchParams({ userId });
    const opts = await getJSON('/register-challenge.php?'+params.toString());

    const publicKey = fixupPublicKeyOptions(opts);
    const cred = await navigator.credentials.create({ publicKey });

    const payload = credToPlain(cred);
    const result  = await postJSON('/register-response.php', payload);

    if (result.success) {
      alert('Passkey registered for: ' + userId);
      location.href = '/index.php';
    } else {
      alert('Registration failed: ' + (result.message||'unknown'));
    }
  }
  </script>
</head>
<body>
  <h1>Register a Passkey</h1>
  <form onsubmit="doRegister(event)">
    <label for="uid">User ID (email or username):</label><br/>
    <input id="uid" name="uid" autocomplete="username webauthn" style="min-width:22rem" required />
    <div style="margin-top:1rem">
      <button type="submit">Create Passkey</button>
    </div>
  </form>
</body>
</html>

