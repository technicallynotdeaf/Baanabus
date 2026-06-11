window.initBrainDump = function() {
  const form   = document.getElementById('brain-dump-form');
  if (!form) return;
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

  text.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
      form.dispatchEvent(new Event('submit', { cancelable: true }));
    }
  });

  const objForm   = document.getElementById('object-dump-form');
  const objText   = document.getElementById('object-dump-text');
  const objStatus = document.getElementById('object-status');

  if (objForm) {
    objForm.addEventListener('submit', async function(e) {
      e.preventDefault();
      const label = objText.value.trim();
      if (!label) { objText.focus(); return; }

      const btn = objForm.querySelector('button[type="submit"]');
      btn.disabled = true;
      objStatus.textContent = 'Saving…';
      objStatus.style.color = '';

      try {
        const resp = await fetch('api/add_physical_object.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ label }),
          credentials: 'same-origin'
        });
        const data = await resp.json();
        if (data.ok) {
          objText.value = '';
          objStatus.textContent = 'Logged.';
          objText.focus();
        } else {
          throw new Error(data.error || 'Save failed');
        }
      } catch(err) {
        objStatus.textContent = err.message;
        objStatus.style.color = 'crimson';
      } finally {
        btn.disabled = false;
      }
    });
  }
};
