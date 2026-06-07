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
    renderNutrients(data.totals || {}, data.week_totals || {});
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

  // ── Nutrient progress bars ─────────────────────────────────────────────────
  const RDIS = {
    fibre:           {label:'Fibre (total)',     unit:'g',   daily:25,    period:'daily',  min:15,   upper:null},
    fibre_soluble:   {label:'Fibre — soluble',   unit:'g',   daily:7,     period:'daily',  min:3,    upper:null},
    fibre_insoluble: {label:'Fibre — insoluble', unit:'g',   daily:18,    period:'daily',  min:null, upper:null},
    potassium:       {label:'Potassium',          unit:'mg',  daily:2800,  period:'daily',  min:2000, upper:null},
    vitamin_c:       {label:'Vitamin C',          unit:'mg',  daily:45,    period:'daily',  min:10,   upper:2000},
    vitamin_b9:      {label:'Folate',             unit:'mcg', daily:400,   period:'daily',  min:200,  upper:1000},
    calcium:         {label:'Calcium',            unit:'mg',  daily:1000,  period:'daily',  min:500,  upper:2500},
    iron:            {label:'Iron',               unit:'mg',  daily:18,    period:'weekly', weekly:126, min:8, upper:45},
    magnesium:       {label:'Magnesium',          unit:'mg',  daily:320,   period:'daily',  min:200,  upper:350},
    vitamin_k:       {label:'Vitamin K',          unit:'mcg', daily:60,    period:'weekly', weekly:420, min:30, upper:1000},
    vitamin_a:       {label:'Vitamin A',          unit:'mcg', daily:700,   period:'weekly', weekly:4900,min:200,upper:null},
    retinol:         {label:'Retinol (preformed)', unit:'mcg', daily:null,  period:'daily',  min:null, upper:3000, ulOnly:true},
    vitamin_d:       {label:'Vitamin D',          unit:'mcg', daily:5,     period:'weekly', weekly:35,  min:1.5,upper:100},
  };
  const KEYS_ORDER = ['fibre','fibre_soluble','fibre_insoluble','potassium','vitamin_c',
                      'vitamin_b9','calcium','iron','magnesium','vitamin_k','vitamin_a','retinol','vitamin_d'];

  function renderNutrients(todayTotals, weekTotals) {
    const el = document.getElementById('fl-nutrients');
    el.innerHTML = KEYS_ORDER.map(k => {
      const rdi    = RDIS[k];
      const actual = rdi.period === 'weekly' ? (weekTotals[k] ?? 0) : (todayTotals[k] ?? 0);

      if (rdi.ulOnly) {
        if (!actual) return '';
        const ulPct   = Math.min(1, actual / rdi.upper) * 100;
        const colour  = actual > rdi.upper ? '#c0392b' : actual >= rdi.upper * 0.8 ? '#e67e22' : '#f39c12';
        const warn    = actual > rdi.upper
          ? `<span style="color:#c0392b;font-size:0.78em;margin-left:6px;">above UL (${rdi.upper}${rdi.unit})</span>`
          : actual >= rdi.upper * 0.8
            ? `<span style="color:#e67e22;font-size:0.78em;margin-left:6px;">approaching UL</span>`
            : '';
        return `
          <div style="margin-bottom:0.6rem;">
            <div style="display:flex;justify-content:space-between;font-size:0.82em;margin-bottom:2px;flex-wrap:wrap;gap:2px;">
              <span>${esc(rdi.label)} <span style="color:#aaa;font-size:0.85em;">today</span>${warn}</span>
              <span style="color:${colour};">${actual.toFixed(1)} / ${rdi.upper}${rdi.unit} UL</span>
            </div>
            <div style="background:#eee;border-radius:4px;height:7px;overflow:hidden;">
              <div style="height:100%;width:${ulPct}%;background:${colour};border-radius:4px;transition:width 0.4s;"></div>
            </div>
          </div>`;
      }

      const isWeekly = rdi.period === 'weekly';
      const target   = isWeekly ? (rdi.weekly ?? rdi.daily * 7) : rdi.daily;
      const pct      = Math.min(1, actual / target);
      const pctDisp  = Math.round(pct * 100);
      const note     = isWeekly ? '7-day total' : 'today';
      const colour   = pct >= 0.9 ? '#2ecc71' : pct >= 0.6 ? '#f39c12' : '#e74c3c';
      const upperWarn = rdi.upper && actual > rdi.upper
        ? `<span style="color:#c0392b;font-size:0.78em;margin-left:6px;">above UL (${rdi.upper}${rdi.unit})</span>`
        : (rdi.upper && actual >= rdi.upper * 0.8 && actual <= rdi.upper
          ? `<span style="color:#e67e22;font-size:0.78em;margin-left:6px;">approaching UL</span>`
          : '');
      return `
        <div style="margin-bottom:0.6rem;">
          <div style="display:flex;justify-content:space-between;font-size:0.82em;margin-bottom:2px;flex-wrap:wrap;gap:2px;">
            <span>${esc(rdi.label)} <span style="color:#aaa;font-size:0.85em;">${note}</span>${upperWarn}</span>
            <span style="color:${colour};">${actual.toFixed(1)} / ${target}${rdi.unit}</span>
          </div>
          <div style="background:#eee;border-radius:4px;height:7px;overflow:hidden;">
            <div style="height:100%;width:${pctDisp}%;background:${colour};border-radius:4px;transition:width 0.4s;"></div>
          </div>
        </div>`;
    }).join('');
  }

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
