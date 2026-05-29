window.initSettings = function() {
  const nicknameForm = document.getElementById('nickname-form');
  if (!nicknameForm) return;

  nicknameForm.addEventListener('submit', async function(e) {
    e.preventDefault();
    const statusEl = document.getElementById('nicknameStatus');
    statusEl.style.color = '';
    statusEl.textContent = 'Saving…';
    try {
      const resp = await fetch('api/nickname.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ nickname: document.getElementById('nickname-input').value.trim() })
      });
      const result = await resp.json();
      if (result.ok) {
        statusEl.textContent = 'Saved.';
      } else {
        throw new Error(result.error || 'Save failed');
      }
    } catch(e) {
      statusEl.textContent = e.message;
      statusEl.style.color = 'crimson';
    }
  });

  document.getElementById('btn-enroll').addEventListener('click', async function() {
    const statusEl = document.getElementById('enrollStatus');
    this.disabled = true;
    statusEl.style.color = '';
    try {
      await BaanabusAuth.enrollPasskey();
      statusEl.textContent = 'Key enrolled — it can now unlock your vault.';
    } catch(e) {
      statusEl.textContent = e.message;
      statusEl.style.color = 'crimson';
      this.disabled = false;
    }
  });

  document.getElementById('habitica-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const statusEl = document.getElementById('habStatus');
    statusEl.textContent = 'Saving…';
    try {
      const resp = await fetch('api/integrations.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
          habitica: {
            user_id: document.getElementById('hab-user').value.trim(),
            api_key:  document.getElementById('hab-key').value.trim()
          }
        })
      });
      const result = await resp.json();
      if (result.ok) {
        statusEl.textContent = 'Saved.';
      } else {
        throw new Error(result.error || 'Save failed');
      }
    } catch(e) {
      statusEl.textContent = e.message;
      statusEl.style.color = 'crimson';
    }
  });

  document.getElementById('gen-key-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const statusEl = document.getElementById('gen-key-status');
    const resultEl = document.getElementById('new-key-result');
    statusEl.textContent = 'Generating...';
    resultEl.style.display = 'none';
    try {
      const resp = await fetch('api/generate_api_key.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ label: document.getElementById('key-label').value.trim() || 'Agent key' })
      });
      const data = await resp.json();
      if (!data.ok) throw new Error(data.error || 'Failed');
      document.getElementById('new-key-value').value = data.token;
      resultEl.style.display = 'block';
      document.getElementById('new-key-value').select();
      statusEl.textContent = '';
      const list = document.getElementById('api-key-list') || (() => {
        const d = document.createElement('div');
        d.id = 'api-key-list';
        d.style.marginBottom = '0.75rem';
        document.getElementById('gen-key-form').before(d);
        return d;
      })();
      const row = document.createElement('div');
      row.className = 'api-key-row';
      row.dataset.kid = data.key_id;
      row.style.cssText = 'display:flex;align-items:center;justify-content:space-between;padding:6px 0;border-bottom:1px solid #f0f0f0;gap:8px;';
      row.innerHTML = `<div><span style="font-size:0.9em;font-weight:500;">${esc(data.label)}</span><span class="muted" style="font-size:0.8em;margin-left:6px;">${new Date().toISOString().slice(0,10)}</span></div><button class="btn-revoke action-button delete-link" data-kid="${esc(data.key_id)}" style="font-size:0.78em;padding:4px 10px;min-height:30px;">Revoke</button>`;
      list.appendChild(row);
    } catch(e) {
      statusEl.textContent = e.message;
      statusEl.style.color = 'crimson';
    }
  });

  document.getElementById('btn-copy-key').addEventListener('click', function() {
    const input = document.getElementById('new-key-value');
    input.select();
    navigator.clipboard.writeText(input.value).then(() => {
      document.getElementById('copy-status').textContent = 'Copied.';
    }).catch(() => {
      document.getElementById('copy-status').textContent = 'Select and copy manually.';
    });
  });

  document.addEventListener('click', async function(e) {
    if (!e.target.classList.contains('btn-revoke')) return;
    const keyId = e.target.dataset.kid;
    if (!keyId) return;
    if (!confirm('Revoke this key? Any agent using it will lose access immediately.')) return;
    e.target.disabled = true;
    try {
      const resp = await fetch('api/revoke_api_key.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ key_id: keyId })
      });
      const data = await resp.json();
      if (data.ok) e.target.closest('.api-key-row').remove();
      else throw new Error(data.error || 'Revoke failed');
    } catch(e) {
      alert(e.message);
      e.target.disabled = false;
    }
  });

  document.getElementById('csv-probe-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const file   = document.getElementById('csv-file').files[0];
    const status = document.getElementById('csv-status');
    const result = document.getElementById('csv-result');
    if (!file) { status.textContent = 'Choose a CSV file first.'; return; }
    status.textContent = 'Reading…';
    result.style.display = 'none';
    const fd = new FormData();
    fd.append('csvfile', file);
    try {
      const resp = await fetch('api/csv_probe.php', { method: 'POST', body: fd });
      const data = await resp.json();
      if (!data.ok) throw new Error(data.error || 'Failed');
      status.textContent = `${data.rows} rows, ${data.fields.length} fields.`;
      const fieldHtml = data.fields.map((f, i) => {
        const sample = data.sample[i] !== undefined ? `<span class="muted"> — e.g. ${esc(String(data.sample[i]).substring(0,40))}</span>` : '';
        return `<li style="padding:3px 0;font-size:0.88em;"><code>${esc(f)}</code>${sample}</li>`;
      }).join('');
      result.innerHTML = `<ul style="margin:0;padding-left:1.2rem;line-height:1.7;">${fieldHtml}</ul>`;
      result.style.display = 'block';
    } catch(e) {
      status.textContent = e.message;
      status.style.color = 'crimson';
    }
  });

  function esc(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }
};
