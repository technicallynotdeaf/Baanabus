<?php
session_start();
$isAuthed = !empty($_SESSION['logged_in']);
?>
  <script>
  // --- tiny helpers (base64url + buffer) ---
  function b64ToArrayBuffer(b64){let s=b64.replace(/-/g,'+').replace(/_/g,'/');const p=s.length%4;if(p)s+='='.repeat(4-p);const b=atob(s);const u=new Uint8Array(b.length);for(let i=0;i<b.length;i++)u[i]=b.charCodeAt(i);return u.buffer;}
  function arrayBufferToB64url(buf){const u=new Uint8Array(buf);let b='';for(let i=0;i<u.length;i++)b+=String.fromCharCode(u[i]);return btoa(b).replace(/\+/g,'-').replace(/\//g,'_').replace(/=+$/,'');}
  function fixupPublicKeyOptions(pk){
    const out={...pk};
    if (typeof out.challenge==='string') out.challenge=b64ToArrayBuffer(out.challenge);
    if (Array.isArray(out.allowCredentials)) out.allowCredentials=out.allowCredentials.map(c=>({...c,id:typeof c.id==='string'?b64ToArrayBuffer(c.id):c.id}));
    return out;
  }
  function credToPlain(cred){
    const r=cred.response, out={id:cred.id,type:cred.type,rawId:arrayBufferToB64url(cred.rawId),response:{}};
    if(r.clientDataJSON)out.response.clientDataJSON=arrayBufferToB64url(r.clientDataJSON);
    if(r.authenticatorData)out.response.authenticatorData=arrayBufferToB64url(r.authenticatorData);
    if(r.signature)out.response.signature=arrayBufferToB64url(r.signature);
    if(r.userHandle)out.response.userHandle=arrayBufferToB64url(r.userHandle);
    return out;
  }
  async function getJSON(u){const r=await fetch(u,{credentials:'include'});if(!r.ok)throw new Error('GET '+u+' '+r.status);return r.json();}
  async function postJSON(u,b){const r=await fetch(u,{method:'POST',credentials:'include',headers:{'Content-Type':'application/json'},body:JSON.stringify(b)});const t=await r.text();let j={};try{j=JSON.parse(t||'{}')}catch{}if(!r.ok)throw new Error('POST '+u+' '+r.status+': '+t);return j;}

  async function tryAutoLogin(){
    // already authed? server rendered welcome.
    if (<?php echo $isAuthed ? 'true' : 'false'; ?>) return;

    if (!window.isSecureContext || !navigator.credentials || !window.PublicKeyCredential) {
      loadUnauth(); return;
    }
    try {
      // 1) get auth options
      const opts = await getJSON('/auth-challenge.php');
      // 2) convert IDs to ArrayBuffers
      const publicKey = fixupPublicKeyOptions(opts);
      // 3) get assertion from authenticator
      const assertion = await navigator.credentials.get({ publicKey });
      // 4) send to server
      const result = await postJSON('/auth-response.php', (function(a){return credToPlain(a)})(assertion));
      if (result.success) {
        // reload to show the authed view (or just swap DOM text)
        location.reload();
      } else {
        loadUnauth();
      }
    } catch (e) {
      console.warn('Auto-login failed:', e);
      loadUnauth();
    }
  }
  async function loadUnauth(){
    const host = document.getElementById('app');
    try {
      const html = await fetch('/unauthenticated.html',{credentials:'include'}).then(r=>r.text());
      host.innerHTML = html;
    } catch {
      host.innerHTML = '<p>Sign-in required.</p>';
    }
  }
  window.addEventListener('DOMContentLoaded', tryAutoLogin);
  </script>
