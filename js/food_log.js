window.initFoodLog = function () {
  const root    = document.getElementById('food-log-root');
  if (!root) return;

  const today   = new Date().toISOString().slice(0, 10);
  let selectedFood = null; // {food_id, name, serving_id, unit_label, weight_g}

  // ── Food search autocomplete ───────────────────────────────────────────────
  const searchEl  = document.getElementById('fl-search');
  const suggestEl = document.getElementById('fl-suggestions');
  const servingEl = document.getElementById('fl-serving');
  const qtyEl     = document.getElementById('fl-qty');
  const addBtn    = document.getElementById('fl-add-btn');
  const status    = document.getElementById('fl-add-status');

  let searchTimer = null;
  searchEl.addEventListener('input', () => {
    clearTimeout(searchTimer);
    const q = searchEl.value.trim();
    if (q.length < 1) { suggestEl.style.display = 'none'; return; }
    searchTimer = setTimeout(() => runSearch(q), 200);
  });

  searchEl.addEventListener('blur', () => {
    setTimeout(() => { suggestEl.style.display = 'none'; }, 200);
  });

  async function runSearch(q) {
    const res  = await fetch('api/food_search.php?q=' + encodeURIComponent(q));
    const data = await res.json();
    if (!data.length) { suggestEl.style.display = 'none'; return; }
    suggestEl.innerHTML = data.map(f =>
      `<div class="fl-suggest-item" data-food='${JSON.stringify(f)}'
            style="padding:8px 12px;cursor:pointer;font-size:0.9em;border-bottom:1px solid #f0f0f0;">
        <strong>${esc(f.name)}</strong>
        <span style="color:#999;font-size:0.85em;margin-left:6px;">${esc(f.unit_label)}</span>
      </div>`
    ).join('');
    suggestEl.style.display = 'block';
    suggestEl.querySelectorAll('.fl-suggest-item').forEach(el => {
      el.addEventListener('mousedown', () => selectFood(JSON.parse(el.dataset.food)));
    });
  }

  async function selectFood(f) {
    searchEl.value = f.name;
    suggestEl.style.display = 'none';
    selectedFood = f;
    // Load all serving options for this food
    const res  = await fetch('api/food_log.php', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({action: 'get_servings', food_id: f.food_id})
    });
    const servings = await res.json();
    servingEl.innerHTML = servings.map(s =>
      `<option value="${s.serving_id}" data-weight="${s.weight_g}" ${s.is_default ? 'selected' : ''}>
        ${esc(s.unit_label)}
      </option>`
    ).join('');
  }

  // ── Add entry ────────────────────────────────────────────────────────────
  addBtn.addEventListener('click', async () => {
    if (!selectedFood) { status.textContent = 'Pick a food first.'; return; }
    const serving_id = parseInt(servingEl.value);
    const quantity   = parseFloat(qtyEl.value) || 1;
    status.textContent = 'Adding…';
    const res  = await fetch('api/food_log.php', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({action: 'add', food_id: selectedFood.food_id,
                            serving_id, quantity, date: today})
    });
    const data = await res.json();
    if (data.ok) {
      searchEl.value = '';
      selectedFood = null;
      qtyEl.value = 1;
      servingEl.innerHTML = '<option value="">— pick food first —</option>';
      status.textContent = 'Added.';
      refreshLog();
    } else {
      status.textContent = data.error || 'Error.';
    }
  });

  // ── Write-off ──────────────────────────────────────────────────────────────
  document.getElementById('fl-writeoff-btn').addEventListener('click', async () => {
    const label = document.getElementById('fl-writeoff-input').value.trim();
    if (!label) { status.textContent = 'Enter a label for the write-off.'; return; }
    const res  = await fetch('api/food_log.php', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({action: 'add_writeoff', label, date: today})
    });
    const data = await res.json();
    if (data.ok) {
      document.getElementById('fl-writeoff-input').value = '';
      status.textContent = 'Logged.';
      refreshLog();
    }
  });

  // ── Load and render log ────────────────────────────────────────────────────
  async function refreshLog() {
    const res  = await fetch('api/food_log.php?date=' + today);
    const data = await res.json();
    renderEntries(data.entries || []);
    loadGaps();
  }

  function renderEntries(entries) {
    const el = document.getElementById('fl-entries');
    if (!entries.length) {
      el.innerHTML = '<p class="muted" style="font-size:0.85em;">Nothing logged yet today.</p>';
      return;
    }
    el.innerHTML = entries.map(e => {
      const label = e.is_writeoff
        ? `<span style="color:#aaa;font-style:italic;">${esc(e.writeoff_label)} (write-off)</span>`
        : `${esc(e.food_name)} — ${e.quantity} ${esc(e.unit_label)}`;
      return `<div style="display:flex;justify-content:space-between;align-items:center;
                          padding:5px 0;border-bottom:1px solid #f0f0f0;font-size:0.88em;">
        <span>${label}</span>
        <button class="action-button" style="font-size:0.75em;padding:2px 8px;min-height:24px;
                background:transparent;color:#c0392b;border:1px solid #c0392b;"
          onclick="window._flDelete(${e.log_id})">Remove</button>
      </div>`;
    }).join('');
  }

  window._flDelete = async function(log_id) {
    await fetch('api/food_log.php', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({action: 'delete', log_id})
    });
    refreshLog();
  };

  // ── Gap suggestions ────────────────────────────────────────────────────────
  async function loadGaps() {
    const res  = await fetch('api/food_gaps.php?date=' + today);
    const data = await res.json();
    const gapsCard = document.getElementById('fl-gaps-card');
    const gapsEl   = document.getElementById('fl-gaps');
    const keys     = Object.keys(data.suggestions || {});
    if (!keys.length) { gapsCard.style.display = 'none'; return; }
    gapsCard.style.display = 'block';
    gapsEl.innerHTML = keys.map(n => {
      const s = data.suggestions[n];
      const picks = s.picks.map(p => `
        <div style="display:flex;justify-content:space-between;align-items:center;
                    padding:5px 0;border-bottom:1px solid #f5f5f5;font-size:0.85em;">
          <span><strong>${esc(p.name)}</strong>
            <span style="color:#aaa;margin-left:4px;">${esc(p.serving)}</span>
          </span>
          <span style="color:#27ae60;white-space:nowrap;margin-left:8px;">
            +${p.per_serving}${esc(s.unit)}
          </span>
        </div>`).join('');
      return `
        <div style="margin-bottom:1rem;">
          <p style="font-size:0.82em;font-weight:600;color:#555;margin-bottom:4px;text-transform:uppercase;letter-spacing:0.05em;">
            ${esc(s.label)} — ${s.remaining}${esc(s.unit)} still to go
          </p>
          ${picks}
        </div>`;
    }).join('');
  }

  function esc(s) {
    if (!s) return '';
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
  }

  refreshLog();
};
