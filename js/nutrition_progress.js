window.initNutritionProgress = function () {
  'use strict';
  const root = document.getElementById('np-root');
  if (!root) return;

  const SECTIONS = [
    { label: 'Fibre',                  keys: ['fibre', 'fibre_soluble', 'fibre_insoluble'] },
    { label: 'Energy & protein',       keys: ['energy_kj', 'protein_g'] },
    { label: 'Fatty acids',            keys: ['omega3_ala_mg', 'omega3_epa_mg', 'omega3_dha_mg', 'omega6_la_mg'] },
    { label: 'Fat & sugar limits',     keys: ['fat_saturated_g', 'fat_trans_g', 'sugars_g'] },
    { label: 'Vitamins A & D',         keys: ['vitamin_a', 'retinol', 'vitamin_d', 'vitamin_k', 'vitamin_k2_mcg', 'vitamin_e_mg'] },
    { label: 'B vitamins',             keys: ['vitamin_b1_mg', 'vitamin_b2_mg', 'vitamin_b3_mg', 'vitamin_b5_mg',
                                              'vitamin_b6_mg', 'vitamin_b7_mcg', 'folate', 'vitamin_b12_mcg', 'choline_mg'] },
    { label: 'Vitamin C & carotenoids',keys: ['vitamin_c', 'lutein_zeaxanthin_mcg'] },
    { label: 'Minerals',               keys: ['calcium', 'iron', 'magnesium', 'potassium', 'sodium',
                                              'zinc_mg', 'selenium_mcg', 'iodine_mcg', 'copper_mg'] },
  ];

  const INFO_KEYS = new Set(['energy_kj', 'protein_g']);

  function fmt(v) {
    if (v == null) return '—';
    if (v < 1)   return v.toFixed(2);
    if (v < 10)  return v.toFixed(1);
    if (v < 100) return v.toFixed(1);
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

  function esc(s) {
    if (s == null) return '';
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
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
    const limitNote = isLimit ? `<span style="color:#aaa;font-size:0.82em;margin-left:3px;">(keep low)</span>` : '';

    return `<div data-nutrient="${key}" style="margin-bottom:0.55rem;cursor:pointer;" title="Tap for details">
      <div style="display:flex;justify-content:space-between;font-size:0.81em;margin-bottom:2px;flex-wrap:wrap;gap:2px;">
        <span>${esc(p.label)}${limitNote}${badge}</span>
        <span style="color:${colour};white-space:nowrap;">${fmt(p.actual)} / ${fmt(p.target)}${esc(p.unit)} <span style="opacity:0.75;font-size:0.9em;">(${pctDisp}%)</span></span>
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

  function renderGapFoods(foods) {
    if (!foods || !foods.length) return '';
    const rows = foods.map(f => {
      const nutrients = (f.contributions || []).map(c => `${esc(c.label)} ${c.pct}%`).join(', ');
      return `<div style="display:flex;justify-content:space-between;align-items:baseline;
                          padding:6px 0;border-bottom:1px solid #f5f5f5;">
        <span style="font-size:0.85em;">
          <strong>${esc(f.name)}</strong>
          <span style="color:#aaa;margin-left:4px;font-size:0.9em;">${esc(f.serving)}</span><br>
          <span style="color:#777;font-size:0.82em;">${esc(nutrients)}</span>
        </span>
        <span style="color:#27ae60;white-space:nowrap;margin-left:12px;font-weight:600;font-size:0.9em;">${f.score}%</span>
      </div>`;
    }).join('');
    return `<div style="margin-top:1.5rem;padding-top:1.25rem;border-top:2px solid #eee;">
      <h3 style="margin-bottom:0.1rem;">What would help most today?</h3>
      <p class="muted" style="font-size:0.83em;margin-bottom:0.9rem;">Ranked by how much of your remaining gaps one serving covers.</p>
      ${rows}
    </div>`;
  }

  // ── Detail view ────────────────────────────────────────────────────────────

  function renderDetail(d) {
    const isLimit  = !!d.is_limit;
    const isInfo   = INFO_KEYS.has(d.nutrient);
    const pct      = Math.min(1, d.today.pct || 0);
    const colour   = barColour(pct, isLimit, isInfo);
    const pctDisp  = Math.round(pct * 100);
    const todayLbl = d.is_weekly ? 'This week' : 'Today';

    const noteHtml = d.note
      ? `<p style="font-size:0.82em;color:#888;margin:0.75rem 0 0;line-height:1.5;">${esc(d.note)}</p>`
      : '';

    const streakHtml = (d.streak_days != null && d.streak_days < 7)
      ? `<p class="muted" style="font-size:0.8em;margin:0.4rem 0 0;">Based on the last ${d.streak_days} day${d.streak_days === 1 ? '' : 's'} logged, not a full week.</p>`
      : '';

    const histHtml = d.history.map(h => {
      const hp      = Math.min(1, h.pct || 0);
      const hColour = barColour(hp, isLimit, isInfo);
      const hPct    = Math.round(hp * 100);
      const dayLbl  = h.is_today ? '<strong>Today</strong>' : h.day;
      return `<div style="display:flex;align-items:center;gap:6px;margin-bottom:5px;">
        <span style="font-size:0.78em;color:#aaa;width:2.8em;flex-shrink:0;">${dayLbl}</span>
        <div style="flex:1;background:#eee;border-radius:3px;height:7px;overflow:hidden;">
          <div style="height:100%;width:${Math.min(100,hPct)}%;background:${hColour};border-radius:3px;"></div>
        </div>
        <span style="font-size:0.78em;color:#777;white-space:nowrap;width:5em;text-align:right;">${fmt(h.actual)}${esc(d.unit)}</span>
        <span style="font-size:0.75em;color:${hColour};white-space:nowrap;width:2.8em;text-align:right;">${hPct}%</span>
      </div>`;
    }).join('');

    const sourcesHtml = (d.sources || []).map(s =>
      `<div style="display:flex;justify-content:space-between;align-items:baseline;
                   padding:5px 0;border-bottom:1px solid #f5f5f5;">
        <span style="font-size:0.85em;">
          <strong>${esc(s.name)}</strong>
          <span style="color:#aaa;margin-left:4px;font-size:0.88em;">${esc(s.serving)}</span>
        </span>
        <span style="white-space:nowrap;margin-left:10px;font-size:0.85em;">
          <strong>${fmt(s.amount)}${esc(d.unit)}</strong>
          <span style="color:#aaa;margin-left:5px;">${s.pct_of_rdi}%</span>
        </span>
      </div>`
    ).join('');

    return `
      <button data-np-back style="background:none;border:none;padding:0;color:#888;font-size:0.85em;
              cursor:pointer;margin-bottom:1rem;display:flex;align-items:center;gap:4px;">
        &#8592; All nutrients
      </button>

      <h3 style="margin:0 0 0.9rem;">${esc(d.label)}</h3>

      <div style="margin-bottom:0.25rem;display:flex;justify-content:space-between;font-size:0.82em;">
        <span style="color:#aaa;">${esc(todayLbl)}</span>
        <span style="color:${colour};">${fmt(d.today.actual)} / ${fmt(d.today.target)}${esc(d.unit)} (${pctDisp}%)</span>
      </div>
      <div style="background:#eee;border-radius:4px;height:9px;overflow:hidden;margin-bottom:0.15rem;">
        <div style="height:100%;width:${pctDisp}%;background:${colour};border-radius:4px;transition:width 0.4s;"></div>
      </div>
      ${noteHtml}
      ${streakHtml}

      <div style="margin-top:1.4rem;">
        <p style="font-size:0.71em;text-transform:uppercase;letter-spacing:0.08em;color:#aaa;
                  margin-bottom:0.6rem;padding-bottom:3px;border-bottom:1px solid #f0f0f0;">This week</p>
        ${histHtml}
      </div>

      ${sourcesHtml ? `
      <div style="margin-top:1.4rem;">
        <p style="font-size:0.71em;text-transform:uppercase;letter-spacing:0.08em;color:#aaa;
                  margin-bottom:0.6rem;padding-bottom:3px;border-bottom:1px solid #f0f0f0;">
          Top sources of ${esc(d.label)}
        </p>
        ${sourcesHtml}
      </div>` : ''}`;
  }

  // ── Wiring ─────────────────────────────────────────────────────────────────

  const body  = document.getElementById('np-body');
  const today = new Date().toLocaleDateString('sv-SE');
  const dateEl = document.getElementById('np-date');
  if (dateEl) dateEl.textContent = today;

  let mainHtml = null;

  if (body) {
    body.addEventListener('click', function (e) {
      const bar = e.target.closest('[data-nutrient]');
      if (bar) {
        mainHtml = body.innerHTML;
        body.innerHTML = '<p class="muted" style="font-size:0.85em;margin-top:1rem;">Loading…</p>';
        fetch('api/nutrient_detail.php?nutrient=' + encodeURIComponent(bar.dataset.nutrient))
          .then(r => r.json())
          .then(d => { body.innerHTML = renderDetail(d); })
          .catch(() => { body.innerHTML = '<p class="muted">Could not load detail.</p>'; });
        return;
      }
      if (e.target.closest('[data-np-back]') && mainHtml !== null) {
        body.innerHTML = mainHtml;
      }
    });
  }

  fetch('api/food_gaps.php?date=' + today + '&limit=8')
    .then(r => r.json())
    .then(data => {
      if (!body) return;
      const progress   = data.progress    || {};
      const foods      = data.foods       || [];
      const streakDays = data.streak_days;
      const streakNote = (streakDays != null && streakDays < 7)
        ? `<p class="muted" style="font-size:0.8em;margin-bottom:0.75rem;">
             Weekly goals based on the last ${streakDays} day${streakDays === 1 ? '' : 's'} logged, not a full week —
             days you haven't logged aren't counted against you.
           </p>`
        : '';
      const html = streakNote + SECTIONS.map(s => renderSection(s, progress)).join('') + renderGapFoods(foods);
      body.innerHTML = html || '<p class="muted">No nutrient data yet today.</p>';
    })
    .catch(() => {
      if (body) body.innerHTML = '<p class="muted">Could not load nutrient data.</p>';
    });
};
