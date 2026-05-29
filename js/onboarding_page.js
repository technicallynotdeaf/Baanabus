(function () {
  const $ = (q) => document.querySelector(q);

  function handleAuthSuccess(result) {
    if (result && result.vaultReady) {
      location.href = 'index.php';
    } else {
      const s = $('#authStatus');
      if (s) { s.textContent = 'Signed in but vault could not be unlocked.'; s.style.color = 'crimson'; }
    }
  }

  $('#btnRegister').addEventListener('click', async (e) => {
    e.preventDefault();
    const u    = ($('#username')?.value || '').trim();
    const code = ($('#inviteCode')?.value || '').trim();
    if (!u) { const s=$('#authStatus'); if(s){s.textContent='Please enter a username.'; s.style.color='crimson';} return; }
    try {
      await BaanabusAuth.registerPasskey(u, code);
      say('Registered! Signing in to unlock vault…');
      handleAuthSuccess(await BaanabusAuth.signInPasskey(u));
    } catch (_) {}
  });

  $('#btnSignIn').addEventListener('click', async (e) => {
    e.preventDefault();
    const u = ($('#username')?.value || '').trim() || null;
    try { handleAuthSuccess(await BaanabusAuth.signInPasskey(u)); } catch (_) {}
  });
})();
