window.initNutritionProgress = function () {
  'use strict';
  const root = document.getElementById('np-root');
  if (!root) return;

  // Nutrient keys grouped by display section, in order
  const SECTIONS = [
    { label: 'Fibre',             keys: ['fibre', 'fibre_soluble', 'fibre_insoluble'] },
    { label: 'Energy & protein',  keys: ['energy_kj', 'protein_g'] },
    { label: 'Fatty acids',       keys: ['omega3_ala_mg', 'omega3_epa_mg', 'omega3_dha_mg', 'omega6_la_mg'] },
    { label: 'Fat & sugar limits',keys: ['fat_saturated_g', 'fat_trans_g', 'sugars_g'] },
    { label: 'Vitamins A & D',    keys: ['vitamin_a', 'retinol', 'vitamin_d', 'vitamin_k', 'vitamin_k2_mcg', 'vitamin_e_mg'] },
    { label: 'B vitamins',        keys: ['vitamin_b1_mg', 'vitamin_b2_mg', 'vitamin_b3_mg', 'vitamin_b5_mg',
                                         'vitamin_b6_mg', 'vitamin_b7_mcg', 'folate', 'vitamin_b12_mcg', 'choline_mg'] },
    { label: 'Vitamin C & carotenoids', keys: ['vitamin_c', 'lutein_zeaxanthin_mcg'] },
    { label: 'Minerals',          keys: ['calcium', 'iron', 'magnesium', 'potassium',
                                         'zinc_mg', 'selenium_mcg', 'iodine_mcg', 'copper_mg'] },
  ];

  // Informational only — neutral colour, no green/red
  const INFO_KEYS = new Set(['energy_kj', 'protein_g']);

  function fmt(v) {
    if (v == null) return '—';
    if (v < 1)    return v.toFixed(2);
    if (v < 10)   return v.toFixed(1);
    if (v < 100)  return v.toFixed(1);
    return Math.round(v).toString();
  }

  function barColour(pct, isLimit, isInfo) {
    if (isInfo)  return '#90b8d4';
    if (isLimit) {
      if (pct >= 1.0) return '#e74c3c';
      if (pct >= 0.8) return '#e67e22';
      return '#2ecc71';
    }
    if (pct >= 0.9) return '#2ecc71';
    if (pct >= 0.6) return '#f39c12';
    return '#e74c3c';
  }

  function renderBar(key, p) {
    const isLimit = !!p.is_limit;
    const isInfo  = INFO_KEYS.has(key);
    const pct     = Math.min(1, p.pct || 0);
    const colour  = barColour(pct, isLimit, isInfo);
    const pctDisp = Math.round(pct * 100);

    let badge = '';
    if (!isInfo) {
      if (p.upper_limit && p.actual > p.upper_limit) {
        badge = `<span style="color:#c0392b;font-size:0.75em;margin-left:5px;font-weight:600;">above UL</span>`;
      } else if (!isLimit && p.upper_limit && p.actual >= p.upper_limit * 0.85) {
        badge = `<span style="color:#e67e22;font-size:0.75em;margin-left:5px;">near UL</span>`;
      }
    }

    const noteStr = p.note ? `<span style="color:#bbb;font-size:0.82em;margin-left:3px;">${esc(p.note)}</span>` : '';
    const limitNote = isLimit ? `<span style="color:#aaa;font-size:0.82em;margin-left:3px;">(keep low)</span>` : '';

    return `<div style="margin-bottom:0.55rem;">
      <div style="display:flex;justify-content:space-between;font-size:0.81em;margin-bottom:2px;flex-wrap:wrap;gap:2px;">
        <span>${esc(p.label)}${noteStr}${limitNote}${badge}</span>
        <span style="color:${colour};white-space:nowrap;">${fmt(p.actual)} / ${fmt(p.target)}${esc(p.unit)}</span>
      </div>
      <div style="background:#eee;border-radius:3px;height:6px;overflow:hidden;">
        <div style="height:100%;width:${pctDisp}%;background:${colour};border-radius:3px;transition:width 0.4s;"></div>
      </div>
    </div>`;
  }

  function renderSection(section, progress) {
    const present = section.keys.filter(k => progress[k]);
    if (!present.length) return '';
    return `<div style="margin-bottom:1.4rem;">
      <p style="font-size:0.71em;text-transform:uppercase;letter-spacing:0.08em;color:#aaa;
                margin-bottom:0.5rem;padding-bottom:3px;border-bottom:1px solid #f0f0f0;">
        ${esc(section.label)}
      </p>
      ${present.map(k => renderBar(k, progress[k])).join('')}
    </div>`;
  }

  function renderSuggestions(suggestions) {
    const keys = Object.keys(suggestions || {});
    if (!keys.length) return '';
    const rows = keys.map(n => {
      const s    = suggestions[n];
      const picks = (s.picks || []).map(p => `
        <div style="display:flex;justify-content:space-between;align-items:center;
                    padding:4px 0;border-bottom:1px solid #f5f5f5;font-size:0.84em;">
          <span><strong>${esc(p.name)}</strong>
            <span style="color:#aaa;margin-left:4px;">${esc(p.serving)}</span></span>
          <span style="color:#27ae60;white-space:nowrap;margin-left:8px;">
            +${fmt(p.per_serving)}${esc(s.unit)}
          </span>
        </div>`).join('');
      return `<div style="margin-bottom:1.1rem;">
        <p style="font-size:0.79em;font-weight:600;color:#555;margin-bottom:4px;
                  text-transform:uppercase;letter-spacing:0.05em;">
          ${esc(s.label)} — ${fmt(s.remaining)}${esc(s.unit)} short
        </p>
        ${picks}
      </div>`;
    }).join('');

    return `<div style="margin-top:1.5rem;padding-top:1.25rem;border-top:2px solid #eee;">
      <h3 style="margin-bottom:0.1rem;">What would help most today?</h3>
      <p class="muted" style="font-size:0.83em;margin-bottom:0.9rem;">
        Foods that move your biggest gaps.
      </p>
      ${rows}
    </div>`;
  }

  function esc(s) {
    if (s == null) return '';
    return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  const today = new Date().toISOString().slice(0, 10);
  const dateEl = document.getElementById('np-date');
  if (dateEl) dateEl.textContent = today;

  fetch('api/food_gaps.php?date=' + today + '&limit=8')
    .then(r => r.json())
    .then(data => {
      const progress    = data.progress    || {};
      const suggestions = data.suggestions || {};
      const body        = document.getElementById('np-body');
      if (!body) return;
      const html = SECTIONS.map(s => renderSection(s, progress)).join('') +
                   renderSuggestions(suggestions);
      body.innerHTML = html || '<p class="muted">No nutrient data yet today.</p>';
    })
    .catch(() => {
      const body = document.getElementById('np-body');
      if (body) body.innerHTML = '<p class="muted">Could not load nutrient data.</p>';
    });
};
