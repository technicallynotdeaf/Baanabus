window.initDailiesList = function() {};

window._dailyDone = function(btn, id) {
  btn.disabled = true;
  const row = btn.closest('.daily-list-row');
  fetch('api/score_daily.php', {
    method:  'POST',
    headers: {'Content-Type': 'application/json'},
    body:    JSON.stringify({id}),
  })
  .then(r => r.json())
  .then(data => {
    if (data.ok) {
      row.querySelector('.dlr-dot').style.background = '#4caf50';
      row.querySelector('.dlr-title').classList.add('dlr-done');
      btn.remove();
    } else {
      btn.disabled = false;
    }
  })
  .catch(() => { btn.disabled = false; });
};

window.initDailyDetail = function() {
  const root = document.querySelector('[data-init="initDailyDetail"]');
  if (!root) return;
  const dailyId  = parseInt(root.dataset.dailyId, 10);
  const status   = document.getElementById('dd-status');
  const freqSel  = document.getElementById('dd-frequency');
  const daysWrap = document.getElementById('dd-days-wrap');
  const everyxWrap = document.getElementById('dd-everyx-wrap');

  freqSel.addEventListener('change', function() {
    daysWrap.style.display   = this.value === 'weekly' ? '' : 'none';
    everyxWrap.style.display = this.value === 'daily'  ? '' : 'none';
  });

  function setStatus(msg, color) {
    status.textContent = msg;
    status.style.color = color || '';
  }

  document.getElementById('dd-save-btn').addEventListener('click', function() {
    const btn  = this;
    btn.disabled = true;
    setStatus('Saving…');

    const freq   = freqSel.value;
    const repeat = {};
    document.querySelectorAll('[data-day]').forEach(cb => {
      repeat[cb.dataset.day] = cb.checked;
    });

    const raVal = document.getElementById('dd-relevant-after').value;
    const iaVal = document.getElementById('dd-irrelevant-after').value;

    fetch('api/daily_action.php', {
      method:  'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({
        daily_id:         dailyId,
        action:           'update',
        horizon:          document.getElementById('dd-horizon').value,
        frequency:        freq,
        everyX:           parseInt(document.getElementById('dd-everyx').value, 10) || 1,
        repeat:           freq === 'weekly' ? repeat : undefined,
        location:         document.getElementById('dd-location').value,
        relevant_after:   raVal || null,
        irrelevant_after: iaVal || null,
      }),
    })
    .then(r => r.json())
    .then(d => {
      if (d.ok) {
        setStatus('Saved.');
        setTimeout(() => setStatus(''), 2000);
      } else {
        setStatus(d.error || 'Could not save.', 'crimson');
      }
      btn.disabled = false;
    })
    .catch(() => {
      setStatus('Network error.', 'crimson');
      btn.disabled = false;
    });
  });

  document.getElementById('dd-active-btn').addEventListener('click', function() {
    const btn = this;
    btn.disabled = true;
    setStatus('Saving…');
    fetch('api/daily_action.php', {
      method:  'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ daily_id: dailyId, action: 'toggle_active' }),
    })
    .then(r => r.json())
    .then(d => {
      if (d.ok) {
        btn.textContent      = d.is_active ? 'Deactivate' : 'Reactivate';
        btn.style.background = d.is_active ? '#888' : '#2d8c5a';
        setStatus(d.is_active ? 'Reactivated.' : 'Deactivated.');
        setTimeout(() => setStatus(''), 2000);
      } else {
        setStatus(d.error || 'Could not save.', 'crimson');
      }
      btn.disabled = false;
    })
    .catch(() => {
      setStatus('Network error.', 'crimson');
      btn.disabled = false;
    });
  });
};
