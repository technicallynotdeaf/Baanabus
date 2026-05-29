(function () {
  document.getElementById('btn-login').addEventListener('click', async function () {
    this.disabled = true;
    try {
      const result = await BaanabusAuth.signInPasskey();
      if (result && result.ok) {
        location.href = 'index.php';
      } else {
        this.disabled = false;
      }
    } catch (_) {
      this.disabled = false;
    }
  });
})();
