<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) {
    http_response_code(403);
    echo '<p class="muted">Not authenticated.</p>';
    exit;
}
if (empty($_SESSION['DEK'])) {
    http_response_code(423);
    echo '<p class="muted">Vault is locked — unlock it to capture notes.</p>';
    exit;
}
?>
<div>
  <h2 style="margin-bottom:0.75rem;">Quick capture</h2>
  <p class="muted" style="margin-bottom:1rem;">Brain dump — write it down so you can stop thinking about it.</p>

  <form id="brain-dump-form">
    <textarea
      id="brain-dump-text"
      name="content"
      rows="5"
      placeholder="What's on your mind?"
      style="width:100%;box-sizing:border-box;resize:vertical;font-size:1rem;padding:0.6rem 0.75rem;border:1px solid #ccc;border-radius:6px;font-family:inherit;"
      autofocus
    ></textarea>
    <div style="display:flex;gap:0.75rem;align-items:center;margin-top:0.75rem;flex-wrap:wrap;">
      <button type="submit" class="btn">Save</button>
      <p id="dump-status" class="muted" style="margin:0;min-height:1.4em;"></p>
    </div>
  </form>
</div>

<script>
(function() {
  const form   = document.getElementById('brain-dump-form');
  const text   = document.getElementById('brain-dump-text');
  const status = document.getElementById('dump-status');

  form.addEventListener('submit', async function(e) {
    e.preventDefault();
    const content = text.value.trim();
    if (!content) { text.focus(); return; }

    const btn = form.querySelector('button[type="submit"]');
    btn.disabled = true;
    status.textContent = 'Saving…';
    status.style.color = '';

    try {
      const resp = await fetch('api/brain_dump.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ content }),
        credentials: 'same-origin'
      });
      const data = await resp.json();
      if (data.ok) {
        text.value = '';
        status.textContent = 'Saved.';
        text.focus();
      } else {
        throw new Error(data.error || 'Save failed');
      }
    } catch(err) {
      status.textContent = err.message;
      status.style.color = 'crimson';
    } finally {
      btn.disabled = false;
    }
  });

  // Ctrl+Enter submits
  text.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
      form.dispatchEvent(new Event('submit', { cancelable: true }));
    }
  });
})();
</script>
