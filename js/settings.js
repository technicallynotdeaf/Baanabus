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

  // Activate a specific tab if requested (e.g. ?tab=wellness from scene click)
  const _root       = document.querySelector('[data-init="initSettings"]');
  const _defaultTab = _root && _root.dataset.defaultTab;
  if (_defaultTab && _defaultTab !== 'account') {
    const _btn = document.querySelector('.settings-tab[data-tab="' + _defaultTab + '"]');
    if (_btn) _btn.click();
  }

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

  // ── Account: Timezone ─────────────────────────────────────────────
  const tzSelect    = document.getElementById('timezone-select');
  const tzSaveBtn   = document.getElementById('btn-save-timezone');
  const tzStatus    = document.getElementById('timezoneStatus');
  const tzBrowserRow = document.getElementById('browser-tz-row');
  const tzBrowserName = document.getElementById('browser-tz-name');
  const tzUseBrowserBtn = document.getElementById('btn-use-browser-tz');

  if (tzSelect) {
    const browserTz = Intl.DateTimeFormat().resolvedOptions().timeZone;

    if (browserTz && tzBrowserRow && tzBrowserName) {
      tzBrowserName.textContent = browserTz;
      tzBrowserRow.style.display = 'flex';
      // Pre-select browser timezone in dropdown if it's in the list
      const opt = [...tzSelect.options].find(o => o.value === browserTz);
      if (opt) opt.selected = true;
    }

    async function saveTz(tz) {
      if (tzStatus) { tzStatus.style.color = ''; tzStatus.textContent = 'Saving…'; }
      try {
        const resp = await fetch('api/save_timezone.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ timezone: tz })
        });
        const result = await resp.json();
        if (result.ok) {
          if (tzStatus) tzStatus.textContent = 'Saved.';
        } else {
          throw new Error(result.error || 'Save failed');
        }
      } catch(e) {
        if (tzStatus) { tzStatus.style.color = 'crimson'; tzStatus.textContent = e.message; }
      }
    }

    if (tzSaveBtn) tzSaveBtn.addEventListener('click', () => saveTz(tzSelect.value));

    if (tzUseBrowserBtn) {
      tzUseBrowserBtn.addEventListener('click', () => {
        const opt = [...tzSelect.options].find(o => o.value === browserTz);
        if (opt) opt.selected = true;
        saveTz(browserTz);
      });
    }
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

  // ── Wellness: cycle dial ──────────────────────────────────────────
  document.querySelectorAll('#tab-wellness canvas[data-cycle-dial]').forEach(function (c) {
    if (typeof drawCycleDial === 'function') {
      drawCycleDial(c, parseInt(c.dataset.day, 10), parseInt(c.dataset.cycle, 10), JSON.parse(c.dataset.phases));
    }
  });

  // ── Wellness: typical week schedule ───────────────────────────────
  const saveWeekBtn = document.getElementById('save-weekly-schedule');
  if (saveWeekBtn) {
    saveWeekBtn.addEventListener('click', async function() {
      const statusEl = document.getElementById('weekly-schedule-status');
      const schedule = {};
      [0,1,2,3,4,5,6].forEach(dow => {
        const sel = document.getElementById('week-' + dow);
        schedule[dow] = sel && sel.value !== '' ? parseInt(sel.value) : null;
      });
      try {
        const resp = await fetch('api/save_weekly_schedule.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ schedule })
        });
        const data = await resp.json();
        if (data.ok) {
          window._weeklySchedule = schedule;
          if (statusEl) { statusEl.textContent = 'Saved.'; setTimeout(() => { if (statusEl) statusEl.textContent = ''; }, 2000); }
        }
      } catch(e) { if (statusEl) statusEl.textContent = 'Save failed.'; }
    });
  }

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

  // ── Wellness: period tracking ──────────────────────────────────────
  const periodToggle   = document.getElementById('period-tracking-enabled');
  const periodFields   = document.getElementById('period-fields');
  const periodStatus   = document.getElementById('period-status');
  const periodLmp      = document.getElementById('period-lmp');
  const periodCycleMin = document.getElementById('period-cycle-min');
  const periodCycleMax = document.getElementById('period-cycle-max');

  async function savePeriodPref(payload) {
    try {
      const resp = await fetch('api/save_period_pref.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload)
      });
      const data = await resp.json();
      if (data.ok && periodStatus) {
        periodStatus.textContent = 'Saved.';
        setTimeout(() => { if (periodStatus) periodStatus.textContent = ''; }, 2000);
      }
    } catch(e) {}
  }

  if (periodToggle) {
    periodToggle.addEventListener('change', function() {
      if (periodFields) periodFields.hidden = !this.checked;
      savePeriodPref({ enabled: this.checked });
    });
  }

  if (periodLmp) {
    periodLmp.addEventListener('change', () => savePeriodPref({ lmp: periodLmp.value }));
  }

  let periodCycleTimer = null;
  function savePeriodCycle() {
    clearTimeout(periodCycleTimer);
    periodCycleTimer = setTimeout(() => {
      const min = parseInt(periodCycleMin.value, 10);
      const max = parseInt(periodCycleMax.value, 10);
      if (min > 0 && max >= min) savePeriodPref({ cycle_min: min, cycle_max: max });
    }, 600);
  }
  if (periodCycleMin) periodCycleMin.addEventListener('input', savePeriodCycle);
  if (periodCycleMax) periodCycleMax.addEventListener('input', savePeriodCycle);

  // ── Trivia: import study questions ────────────────────────────────
  const impBtn = document.getElementById('imp-btn');
  if (impBtn) {
    impBtn.addEventListener('click', async function() {
      const csv     = document.getElementById('imp-csv').value.trim();
      const setName = document.getElementById('imp-setname').value.trim();
      const qType   = document.getElementById('imp-type').value;
      const status  = document.getElementById('imp-status');
      if (!csv) { status.textContent = 'Paste some CSV first.'; return; }
      impBtn.disabled = true;
      status.textContent = 'Importing…';
      try {
        const r = await fetch('api/upload_questions.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ csv, set_name: setName, q_type: qType }),
        });
        const d = await r.json();
        if (d.ok) {
          const errs = d.errors.length ? ` (${d.errors.length} skipped)` : '';
          status.textContent = `Imported ${d.inserted} question${d.inserted !== 1 ? 's' : ''}${errs}.`;
          if (!d.errors.length) document.getElementById('imp-csv').value = '';
        } else {
          status.textContent = d.error || 'Import failed.';
        }
      } catch(e) {
        status.textContent = 'Network error.';
      }
      impBtn.disabled = false;
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

  // ── Wellness: grounding prompts ────────────────────────────────────
  const regStatus = document.getElementById('reg-status');
  function regMsg(msg, isErr) {
    if (!regStatus) return;
    regStatus.textContent = msg;
    regStatus.style.color = isErr ? 'crimson' : '';
    if (!isErr) setTimeout(() => { if (regStatus) regStatus.textContent = ''; }, 2000);
  }

  // Toggle default prompts on/off
  document.querySelectorAll('.reg-default-toggle').forEach(cb => {
    cb.addEventListener('change', async function() {
      const id = parseInt(this.dataset.id);
      const action = this.checked ? 'enable' : 'disable';
      const label = this.closest('label');
      const span  = label ? label.querySelector('span') : null;
      try {
        const r = await fetch('api/regulation_prompt.php', {
          method: 'POST', headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({action, id})
        });
        const d = await r.json();
        if (!d.ok) throw new Error(d.error || 'Failed');
        if (span) span.style.color = this.checked ? '' : '#bbb';
      } catch(e) {
        this.checked = !this.checked; // revert
        regMsg(e.message, true);
      }
    });
  });

  // Delete custom prompt
  document.querySelectorAll('.reg-delete-custom').forEach(btn => {
    btn.addEventListener('click', async function() {
      const id = parseInt(this.dataset.id);
      try {
        const r = await fetch('api/regulation_prompt.php', {
          method: 'POST', headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({action: 'delete_custom', id})
        });
        const d = await r.json();
        if (!d.ok) throw new Error(d.error || 'Failed');
        this.closest('div').remove();
        regMsg('Removed.');
      } catch(e) { regMsg(e.message, true); }
    });
  });

  // Add custom prompt
  const regAddBtn = document.getElementById('reg-add-custom');
  if (regAddBtn) {
    regAddBtn.addEventListener('click', async function() {
      const ta   = document.getElementById('reg-custom-text');
      const text = ta ? ta.value.trim() : '';
      if (!text) { regMsg('Enter some text first.', true); return; }
      try {
        const r = await fetch('api/regulation_prompt.php', {
          method: 'POST', headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({action: 'add_custom', text})
        });
        const d = await r.json();
        if (!d.ok) throw new Error(d.error || 'Failed');
        if (ta) ta.value = '';
        regMsg('Added — it will appear in your rotation.');
        // Insert a row dynamically so user sees it immediately
        const container = regAddBtn.closest('.card');
        let yourSection = container ? container.querySelector('[data-reg-custom-list]') : null;
        if (!yourSection && container) {
          const hdr = document.createElement('div');
          hdr.style.cssText = 'margin-top:0.75rem;';
          hdr.setAttribute('data-reg-custom-list', '1');
          hdr.innerHTML = '<div style="font-size:0.85em;font-weight:600;color:#5a4a1e;margin-bottom:0.4rem;">Your own</div>';
          regAddBtn.parentElement.before(hdr);
          yourSection = hdr;
        }
        if (yourSection) {
          const row = document.createElement('div');
          row.style.cssText = 'display:flex;align-items:flex-start;gap:8px;padding:5px 0;border-bottom:1px solid #f5f0e8;';
          row.innerHTML = `<span style="flex:1;font-size:0.85em;line-height:1.45;">${esc(text)}</span><button class="reg-delete-custom" data-id="${d.id}" style="font-size:0.75em;color:#c06060;background:none;border:none;cursor:pointer;padding:0 2px;flex-shrink:0;">Remove</button>`;
          row.querySelector('.reg-delete-custom').addEventListener('click', async function() {
            const cid = parseInt(this.dataset.id);
            const r2 = await fetch('api/regulation_prompt.php', {method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({action:'delete_custom', id: cid})});
            const d2 = await r2.json();
            if (d2.ok) { this.closest('div').remove(); regMsg('Removed.'); }
          });
          yourSection.appendChild(row);
        }
      } catch(e) { regMsg(e.message, true); }
    });
  }

  // Reset all defaults
  const regResetBtn = document.getElementById('reg-reset-defaults');
  if (regResetBtn) {
    regResetBtn.addEventListener('click', async function() {
      try {
        const r = await fetch('api/regulation_prompt.php', {
          method: 'POST', headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({action: 'reset'})
        });
        const d = await r.json();
        if (!d.ok) throw new Error(d.error || 'Failed');
        document.querySelectorAll('.reg-default-toggle').forEach(cb => {
          cb.checked = true;
          const span = cb.closest('label')?.querySelector('span');
          if (span) span.style.color = '';
        });
        regMsg('All defaults re-enabled.');
      } catch(e) { regMsg(e.message, true); }
    });
  }
};
