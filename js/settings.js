window.initSettings = function() {
  if (!document.getElementById('nickname-form') && !document.querySelector('.settings-tab')) return;

  // ── Tab switching ──────────────────────────────────────────────────
  document.querySelectorAll('.settings-tab').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.settings-tab').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.settings-panel').forEach(p => p.hidden = true);
      btn.classList.add('active');
      const panel = document.getElementById('tab-' + btn.dataset.tab);
      if (panel) panel.hidden = false;
    });
  });

  // ── Account: Nickname ──────────────────────────────────────────────
  const nicknameForm = document.getElementById('nickname-form');
  if (nicknameForm) {
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
        if (result.ok) { statusEl.textContent = 'Saved.'; }
        else { throw new Error(result.error || 'Save failed'); }
      } catch(e) {
        statusEl.textContent = e.message;
        statusEl.style.color = 'crimson';
      }
    });
  }

  // ── Account: Passkey enroll ────────────────────────────────────────
  function enrollLabel() {
    return document.getElementById('enroll-label-input')?.value?.trim() || '';
  }
  async function runEnroll(fn) {
    const label   = enrollLabel();
    const statusEl = document.getElementById('enrollStatus');
    if (!label) {
      statusEl.style.color = 'crimson';
      statusEl.textContent = 'Give this key a name first.';
      document.getElementById('enroll-label-input')?.focus();
      return;
    }
    const allBtns = [document.getElementById('btn-enroll-device'), document.getElementById('btn-enroll-key')].filter(Boolean);
    allBtns.forEach(b => b.disabled = true);
    statusEl.style.color = '';
    statusEl.textContent = '';
    try {
      await fn(label);
      statusEl.textContent = 'Enrolled. Reload the page to see the updated key list.';
    } catch(e) {
      statusEl.textContent = e.message;
      statusEl.style.color = 'crimson';
      allBtns.forEach(b => b.disabled = false);
    }
  }
  const btnDevice = document.getElementById('btn-enroll-device');
  if (btnDevice) btnDevice.addEventListener('click', () => runEnroll(label => BaanabusAuth.enrollNewPasskey('platform', label)));
  const btnKey = document.getElementById('btn-enroll-key');
  if (btnKey) btnKey.addEventListener('click', () => runEnroll(label => BaanabusAuth.enrollNewPasskey('cross-platform', label)));

  // ── Account: Passkey revoke ────────────────────────────────────────
  document.querySelectorAll('[data-revoke]').forEach(btn => {
    btn.addEventListener('click', async function() {
      const credId = this.dataset.revoke;
      const label  = this.dataset.label;
      if (!confirm(`Revoke "${label}"? You will no longer be able to unlock the vault with this key.`)) return;
      this.disabled = true;
      try {
        const r = await fetch('api/revoke_passkey.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ credId })
        });
        const data = await r.json();
        if (data.ok) {
          this.closest('div[style]').remove();
        } else {
          alert(data.error || 'Revoke failed.');
          this.disabled = false;
        }
      } catch(e) {
        alert('Network error.');
        this.disabled = false;
      }
    });
  });

  // ── Account: Agent API keys ────────────────────────────────────────
  const genKeyForm = document.getElementById('gen-key-form');
  if (genKeyForm) {
    genKeyForm.addEventListener('submit', async function(e) {
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
          genKeyForm.before(d);
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
  }

  const copyKeyBtn = document.getElementById('btn-copy-key');
  if (copyKeyBtn) {
    copyKeyBtn.addEventListener('click', function() {
      const input = document.getElementById('new-key-value');
      input.select();
      navigator.clipboard.writeText(input.value).then(() => {
        document.getElementById('copy-status').textContent = 'Copied.';
      }).catch(() => {
        document.getElementById('copy-status').textContent = 'Select and copy manually.';
      });
    });
  }

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

  // ── Account: Habitica ──────────────────────────────────────────────
  const habForm = document.getElementById('habitica-form');
  if (habForm) {
    habForm.addEventListener('submit', async function(e) {
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
        if (result.ok) { statusEl.textContent = 'Saved.'; }
        else { throw new Error(result.error || 'Save failed'); }
      } catch(e) {
        statusEl.textContent = e.message;
        statusEl.style.color = 'crimson';
      }
    });
  }

  // ── Account: CSV probe ─────────────────────────────────────────────
  const csvForm = document.getElementById('csv-probe-form');
  if (csvForm) {
    csvForm.addEventListener('submit', async function(e) {
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
  }

  // ── Games: toggles ────────────────────────────────────────────────
  let gameSaveTimer = null;
  function saveGamePrefs() {
    clearTimeout(gameSaveTimer);
    gameSaveTimer = setTimeout(async () => {
      const statusEl = document.getElementById('games-status');
      const enabled  = document.getElementById('games-enabled')?.checked ?? true;
      const minigames = {};
      document.querySelectorAll('.game-toggle').forEach(cb => {
        minigames[cb.dataset.game] = cb.checked;
      });
      try {
        const resp = await fetch('api/save_game_prefs.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ enabled, minigames })
        });
        const data = await resp.json();
        if (data.ok && statusEl) { statusEl.textContent = 'Saved.'; setTimeout(() => { if (statusEl) statusEl.textContent = ''; }, 2000); }
      } catch(e) {}
    }, 400);
  }

  const gamesEnabled = document.getElementById('games-enabled');
  if (gamesEnabled) {
    gamesEnabled.addEventListener('change', function() {
      const gameList = document.getElementById('game-list');
      if (gameList) {
        gameList.style.opacity = this.checked ? '' : '0.4';
        gameList.style.pointerEvents = this.checked ? '' : 'none';
      }
      saveGamePrefs();
    });
  }
  document.querySelectorAll('.game-toggle').forEach(cb => {
    cb.addEventListener('change', saveGamePrefs);
  });

  // ── Wellness: check-in toggle ──────────────────────────────────────
  const checkinToggle = document.getElementById('checkin-enabled');
  if (checkinToggle) {
    checkinToggle.addEventListener('change', async function() {
      const statusEl = document.getElementById('checkin-status');
      try {
        const resp = await fetch('api/save_wellness_pref.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ checkin_enabled: this.checked })
        });
        const data = await resp.json();
        if (data.ok && statusEl) { statusEl.textContent = 'Saved.'; setTimeout(() => { if (statusEl) statusEl.textContent = ''; }, 2000); }
      } catch(e) {}
    });
  }

  // ── Trivia: unlock topic ───────────────────────────────────────────
  document.querySelectorAll('[data-unlock-topic]').forEach(btn => {
    btn.addEventListener('click', async function() {
      const topic = this.dataset.unlockTopic;
      const statusEl = document.getElementById('topic-unlock-status');
      this.disabled = true;
      if (statusEl) statusEl.textContent = 'Unlocking ' + topic + '...';
      try {
        const r = await fetch('api/unlock_trivia_topic.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({topic}),
        });
        const data = await r.json();
        if (data.ok) {
          this.remove();
          if (statusEl) statusEl.textContent = topic + ' unlocked — questions added to rotation.';
        } else {
          if (statusEl) statusEl.textContent = data.error || 'Something went wrong.';
          this.disabled = false;
        }
      } catch(e) {
        if (statusEl) statusEl.textContent = 'Network error.';
        this.disabled = false;
      }
    });
  });

  function esc(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }
};
