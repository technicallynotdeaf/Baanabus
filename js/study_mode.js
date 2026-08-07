window.initStudyMode = function() {
  'use strict';

  const root   = document.getElementById('study-mode-root');
  if (!root) return;
  const picker = document.getElementById('study-set-picker');
  const intro  = root.querySelector('p.muted');
  const body   = document.getElementById('study-cram-body');

  function esc(s) {
    return String(s)
      .replace(/&/g, '&amp;').replace(/</g, '&lt;')
      .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  function earnPip() {
    fetch('api/earn_pip.php')
      .then(r => r.json())
      .then(d => {
        if (d.ok) {
          if (typeof updateProgressBar === 'function') updateProgressBar(d.pages, d.pages_target, d.total_pages);
          if (d.newStoryPage && typeof window.refreshScene === 'function') window.refreshScene();
        }
      })
      .catch(() => {});
  }

  // Same sand-timer visual next_activity.php's timed prompts use (fun task,
  // regulation) — duplicated here rather than shared with js/lets_go.js
  // since that file's copy is private to its own closure.
  function hourglassMarkup(seconds, uid) {
    return `
      <div style="display:flex;justify-content:center;margin:0.5rem 0 1rem;">
        <svg viewBox="0 0 60 102" width="52" height="88" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <clipPath id="hgt${uid}"><polygon points="2,5 58,5 31,48 29,48"/></clipPath>
            <clipPath id="hgb${uid}"><polygon points="29,54 31,54 58,97 2,97"/></clipPath>
          </defs>
          <rect x="1" y="1" width="58" height="5" rx="2.5" fill="#8b7355"/>
          <rect x="1" y="96" width="58" height="5" rx="2.5" fill="#8b7355"/>
          <polygon points="2,5 58,5 31,48 29,48" fill="rgba(200,180,150,0.15)" stroke="#8b7355" stroke-width="1.5" stroke-linejoin="round"/>
          <polygon points="29,54 31,54 58,97 2,97" fill="rgba(200,180,150,0.15)" stroke="#8b7355" stroke-width="1.5" stroke-linejoin="round"/>
          <rect id="hgts${uid}" x="0" y="5" width="60" height="43" fill="#c8813a" clip-path="url(#hgt${uid})">
            <animate attributeName="height" from="43" to="0" dur="${seconds}s" fill="freeze" calcMode="linear"/>
            <animate attributeName="y" from="5" to="48" dur="${seconds}s" fill="freeze" calcMode="linear"/>
          </rect>
          <rect x="0" y="97" width="60" height="0" fill="#c8813a" clip-path="url(#hgb${uid})">
            <animate attributeName="height" from="0" to="43" dur="${seconds}s" fill="freeze" calcMode="linear"/>
            <animate attributeName="y" from="97" to="54" dur="${seconds}s" fill="freeze" calcMode="linear"/>
          </rect>
          <line id="hgst${uid}" x1="30" y1="48" x2="30" y2="54" stroke="#c8813a" stroke-width="1.5" opacity="0.5"/>
          <circle id="hggr${uid}" cx="30" cy="48" r="1.8" fill="#c8813a">
            <animate attributeName="cy" from="48" to="54" dur="0.45s" repeatCount="indefinite" calcMode="linear"/>
            <animate attributeName="opacity" from="0.9" to="0.1" dur="0.45s" repeatCount="indefinite"/>
          </circle>
        </svg>
      </div>`;
  }

  function armHourglass(seconds, uid, doneBtnId) {
    setTimeout(() => {
      const btn = document.getElementById(doneBtnId);
      if (btn) btn.style.visibility = '';
      ['hgst', 'hggr'].forEach(p => {
        const el = document.getElementById(p + uid);
        if (el) el.style.display = 'none';
      });
    }, seconds * 1000);
  }

  function progressLabel(d) {
    if (!d.cram_position) return '';
    return d.cram_position <= 4
      ? `Question ${d.cram_position} of 4`
      : 'Quick break';
  }

  function step(body_) {
    fetch('api/study_mode_step.php', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify(body_),
    }).then(r => r.json()).then(render).catch(() => {
      body.innerHTML = `<p class="muted">Could not load the next step.</p>
        <button class="action-button" onclick="window._studyModeNext()">Try again</button>`;
    });
  }

  window._studyModeNext = function() { step({action: 'next'}); };

  function startSet(setName) {
    picker.querySelectorAll('button').forEach(b => b.disabled = true);
    picker.style.display = 'none';
    intro.style.display  = 'none';
    body.innerHTML = '<p class="muted">Loading…</p>';
    step({action: 'start', set_name: setName});
  }

  picker && picker.querySelectorAll('[data-cram-set]').forEach(btn => {
    btn.addEventListener('click', () => startSet(btn.dataset.cramSet));
  });

  function backToPicker() {
    body.innerHTML = '';
    if (picker) { picker.style.display = ''; picker.querySelectorAll('button').forEach(b => b.disabled = false); }
    if (intro)  intro.style.display = '';
  }

  function render(d) {
    switch (d.type) {
      case 'study':           renderStudy(d);           break;
      case 'triage':           renderCramTriage(d);      break;
      case 'cram_fun_task':    renderCramFunTask(d);     break;
      case 'cram_regulation':  renderCramRegulation(d);  break;
      case 'cram_daily':       renderCramDaily(d);       break;
      case 'study_mode_done':  renderDone(d);            break;
      case 'error':            renderError(d);           break;
      default:
        body.innerHTML = '<p class="muted">Nothing to show right now.</p>';
    }
  }

  function recordQuestionSeen(id, correct) {
    if (!id) return;
    const fd = new FormData();
    fd.append('id', id);
    fd.append('correct', correct ? '1' : '0');
    fetch('api/record_question_seen.php', {method: 'POST', body: fd}).catch(() => {});
  }

  function renderStudy(d) {
    const hasProgress = d.total && d.once_correct !== undefined;
    const progressBar = hasProgress ? (() => {
      const pct     = Math.round(d.once_correct / d.total * 100);
      const mastPct = Math.round((d.mastered || 0) / d.total * 100);
      return `<div style="position:relative;height:4px;background:#e0d8cc;border-radius:2px;margin-bottom:0.55rem;">
        <div style="height:4px;background:#7a9e7e;border-radius:2px;width:${pct}%;transition:width 0.4s;"></div>
        <div style="position:absolute;top:0;left:0;height:4px;background:#2d6a4f;border-radius:2px;width:${mastPct}%;transition:width 0.4s;"></div>
      </div>`;
    })() : '';
    const progressText = hasProgress
      ? `${d.once_correct}/${d.total} correct` + (d.mastered > 0 ? ` &middot; ${d.mastered} mastered` : '')
      : null;
    const opts = d.options.map((o, i) =>
      `<button class="action-button" style="width:100%;text-align:left;"
         onclick="window._answerCramStudy(${i})">${esc(o)}</button>`
    ).join('');
    body.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.25rem;">
        ${esc(progressLabel(d))}${progressText ? ' &middot; ' + progressText : ''}
      </p>
      ${progressBar}
      <p style="font-weight:600;line-height:1.4;margin-bottom:0.75rem;white-space:pre-wrap;">${esc(d.question)}</p>
      <div id="cram-study-opts" style="display:flex;flex-direction:column;gap:6px;">${opts}</div>
      <p id="cram-study-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <p id="cram-study-expl" style="display:none;margin-top:0.4rem;font-size:0.88em;line-height:1.45;
         border-left:3px solid #ddd;padding-left:0.6rem;color:#555;"></p>
      <button id="cram-study-next" class="action-button" style="display:none;margin-top:0.6rem;"
        onclick="window._studyModeNext()">Next</button>`;

    window._answerCramStudy = function(idx) {
      const btns = document.querySelectorAll('#cram-study-opts .action-button');
      btns.forEach(b => b.disabled = true);
      const correct = idx === d.answer;
      recordQuestionSeen(d.id, correct);
      if (correct) {
        btns[idx].style.background = '#4caf50';
        document.getElementById('cram-study-feedback').textContent = 'Correct!';
        earnPip();
      } else {
        btns[idx].style.background = '#e53935';
        if (btns[d.answer]) btns[d.answer].style.background = '#4caf50';
        document.getElementById('cram-study-feedback').textContent = 'Not quite.';
      }
      if (d.explanation) {
        const expl = document.getElementById('cram-study-expl');
        expl.textContent = d.explanation;
        expl.style.display = 'block';
      }
      document.getElementById('cram-study-next').style.display = 'inline-flex';
    };
  }

  // Same one-question-per-card GTD triage flow as js/lets_go.js's
  // renderTriage, posting to the same api/triage.php — the only difference
  // is what happens after a successful save (continue the cram loop instead
  // of reloading the ambient speech bubble).
  function renderCramTriage(d) {
    const question  = d.question || 'actionable';
    const label     = d.source === 'fill' ? 'Quick question' : 'Inbox';
    const questions = {
      actionable: 'Is this still something you need to do?',
      duration:   'Roughly how long does this take?',
      first_step: 'Is there a quick 2-minute step that moves this forward?',
      energy:     'How much energy does this take?',
      context:    'Which area of your life does this belong to?',
      urgency:    'How urgent is this?',
      importance: 'How much does this actually matter to you?',
    };
    const itemsHtml = (d.items && d.items.length > 0)
      ? `<ul style="margin:0 0 0.6rem 0;padding-left:1.2rem;font-size:0.88em;color:#555;line-height:1.5;">${d.items.map(i => `<li>${esc(i)}</li>`).join('')}</ul>`
      : '';
    body.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.3rem;">${esc(progressLabel(d))} &middot; ${label}</p>
      <p style="font-weight:600;line-height:1.4;margin-bottom:0.25rem;">${esc(d.title)}</p>
      ${itemsHtml}<p style="font-weight:500;color:#555;margin-bottom:0.75rem;font-size:0.95em;">${esc(questions[question] || '')}</p>
      <div id="cram-triage-actions" style="display:flex;flex-direction:column;gap:8px;"></div>
      <p id="cram-triage-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>`;

    const el        = document.getElementById('cram-triage-actions');
    const setStatus = s => { document.getElementById('cram-triage-status').textContent = s; };

    function mkBtn(label_, onClick, style) {
      const b = document.createElement('button');
      b.className = 'action-button';
      b.style.cssText = 'width:100%;' + (style || '');
      b.textContent = label_;
      b.addEventListener('click', onClick);
      return b;
    }

    function save(bodyObj) {
      el.querySelectorAll('button').forEach(b => b.disabled = true);
      setStatus('Saving…');
      bodyObj.task_id = d.id;
      fetch('api/triage.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(bodyObj),
      }).then(r => r.json()).then(data => {
        if (data.ok) {
          if (data.pip && typeof updateProgressBar === 'function') {
            updateProgressBar(data.pip.pages, data.pip.pages_target, data.pip.total_pages);
            if (data.pip.newStoryPage && typeof window.refreshScene === 'function') window.refreshScene();
          }
          setTimeout(() => window._studyModeNext(), 350);
        } else {
          setStatus(data.error || 'Could not save.');
          el.querySelectorAll('button').forEach(b => b.disabled = false);
        }
      }).catch(() => {
        setStatus('Network error.');
        el.querySelectorAll('button').forEach(b => b.disabled = false);
      });
    }

    if (question === 'actionable') {
      el.append(
        mkBtn("Yes — quick win", () => save({action: 'quick_win'})),
        mkBtn("Yes — needs scheduling", () => save({action: 'mark_actionable'})),
        mkBtn("Already done!", () => {
          el.querySelectorAll('button').forEach(b => b.disabled = true);
          setStatus('Marking done…');
          fetch(`api/mark_complete.api.php?task_id=${d.id}`)
            .then(r => r.json())
            .then(res => { if (res.success && typeof updateProgressBar === 'function') updateProgressBar(res.pages, res.pages_target, res.total_pages); })
            .finally(() => setTimeout(() => window._studyModeNext(), 300));
        }, 'background:#4caf50;'),
        mkBtn("Someday", () => save({action: 'someday'}),
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);'),
        mkBtn("Delete it", () => save({action: 'delete'}),
          'background:transparent;color:#c0392b;border:1.5px solid #c0392b;')
      );
    } else if (question === 'duration') {
      el.append(
        mkBtn("Less than 5 mins", () => save({action: 'save_time', time: 5})),
        mkBtn("10–15 mins",        () => save({action: 'save_time', time: 15})),
        mkBtn("30–60 mins",        () => save({action: 'save_time', time: 60})),
        mkBtn("A few hours",       () => save({action: 'save_time', time: 120}))
      );
    } else if (question === 'first_step') {
      const inp = document.createElement('input');
      inp.type = 'text';
      inp.placeholder = 'e.g. Look up the number';
      inp.style.cssText = 'width:100%;box-sizing:border-box;margin-bottom:0.4rem;';
      const addBtn = mkBtn("Add as first step (save as project)", () => {
        const firstStep = inp.value.trim();
        if (!firstStep) { setStatus('Type a first step first.'); return; }
        save({action: 'project', first_step: firstStep});
      });
      el.append(inp, addBtn,
        mkBtn("No first step — just add it to my list", () => save({action: 'next_action'}),
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);'));
      inp.focus();
      inp.addEventListener('keydown', e => { if (e.key === 'Enter') addBtn.click(); });
    } else if (question === 'energy') {
      const skipStyle = 'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);';
      el.append(
        mkBtn("Low — can do it when tired",        () => save({action: 'save_energy', energy: 'low'})),
        mkBtn("Medium — need to be reasonably on", () => save({action: 'save_energy', energy: 'medium'})),
        mkBtn("High — needs my best brain",        () => save({action: 'save_energy', energy: 'high'})),
        mkBtn("Doesn't matter",                    () => save({action: 'save_energy', energy: ' '}), skipStyle)
      );
    } else if (question === 'context') {
      const contexts = d.contexts || [];
      const sel = document.createElement('select');
      sel.style.cssText = 'width:100%;box-sizing:border-box;margin-bottom:0.5rem;padding:0.35rem 0.4rem;font-size:0.95rem;border:1px solid #ccc;border-radius:6px;';
      sel.innerHTML = `<option value="">Choose an area…</option>` +
        contexts.map(ctx => `<option value="${esc(ctx)}">${esc(ctx)}</option>`).join('');
      const saveBtn = mkBtn("Save", () => {
        if (!sel.value) { setStatus('Pick an area first.'); return; }
        save({action: 'save_context', context: sel.value});
      });
      const skipStyle = 'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);';
      el.append(sel, saveBtn,
        mkBtn("Doesn't apply", () => save({action: 'save_context', context: ' '}), skipStyle));
    } else if (question === 'urgency') {
      const skipStyle = 'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);';
      el.append(
        mkBtn("Today or the next few days", () => save({action: 'save_urgency', urgency: 'high'})),
        mkBtn("Next few weeks",             () => save({action: 'save_urgency', urgency: 'medium'})),
        mkBtn("Later",                      () => save({action: 'save_urgency', urgency: 'low'})),
        mkBtn("Not sure — skip for now",    () => save({action: 'save_urgency', urgency: 'medium'}), skipStyle)
      );
    } else if (question === 'importance') {
      const skipStyle = 'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);';
      el.append(
        mkBtn("High — moves something that really matters",     () => save({action: 'save_importance', importance: 'high'})),
        mkBtn("Medium — worth doing, not a big deal either way", () => save({action: 'save_importance', importance: 'medium'})),
        mkBtn("Low — minor, wouldn't lose sleep over it",        () => save({action: 'save_importance', importance: 'low'})),
        mkBtn("Not sure — skip for now",                         () => save({action: 'save_importance', importance: 'medium'}), skipStyle),
        mkBtn("You know what — delete it",                       () => save({action: 'delete'}),
          'background:transparent;color:#c0392b;border:1.5px solid #c0392b;')
      );
    }
  }

  function renderCramFunTask(d) {
    const secs = d.seconds || null;
    const uid  = Math.random().toString(36).slice(2);
    const hourglass = secs ? hourglassMarkup(secs, uid) : '';
    body.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">${esc(progressLabel(d))} &middot; Take a moment</p>
      <p style="line-height:1.5;margin-bottom:0.6rem;">${esc(d.text)}</p>
      ${hourglass}
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" id="cram-fun-done-btn" ${secs ? 'style="visibility:hidden;"' : ''} onclick="window._cramFunDone()">Done</button>
        <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
          onclick="window._studyModeNext()">Skip</button>
      </div>`;
    if (secs) armHourglass(secs, uid, 'cram-fun-done-btn');
    window._cramFunDone = function() { earnPip(); window._studyModeNext(); };
  }

  function renderCramRegulation(d) {
    const catLabels = {
      movement: 'movement', breath: 'breath', sensory: 'sensory',
      cognitive: 'thinking', self_compassion: 'self-compassion', somatic: 'body', custom: 'yours'
    };
    const secs = d.seconds || null;
    const uid  = Math.random().toString(36).slice(2);
    const hourglass = secs ? hourglassMarkup(secs, uid) : '';
    body.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">${esc(progressLabel(d))} &middot; ${esc(catLabels[d.category] || d.category)}</p>
      <p style="margin-bottom:0.85rem;line-height:1.5;">${esc(d.text)}</p>
      ${hourglass}
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" id="cram-reg-done-btn" ${secs ? 'style="visibility:hidden;"' : ''} onclick="window._studyModeNext()">Done</button>
        <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
          onclick="window._studyModeNext()">Skip</button>
      </div>`;
    if (secs) armHourglass(secs, uid, 'cram-reg-done-btn');
  }

  function renderCramDaily(d) {
    const labels = { morning: 'MORNING ROUTINE', day: 'ROUTINE', evening: 'EVENING ROUTINE' };
    const label  = labels[d.horizon] || 'ROUTINE';
    const notesHtml = d.notes
      ? `<p style="font-size:0.85em;color:#888;margin:0 0 0.75rem;">${esc(d.notes)}</p>`
      : '';
    body.innerHTML = `
      <p style="font-size:0.75em;color:#b8860b;letter-spacing:0.05em;margin-bottom:0.4rem;">${esc(progressLabel(d))} &middot; ${label}</p>
      <p style="margin-bottom:0.5rem;">${esc(d.title)}</p>
      ${notesHtml}
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" onclick="window._cramDailyDone(${d.id})">Done</button>
        <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
          onclick="window._studyModeNext()">Skip</button>
      </div>`;
    window._cramDailyDone = function(id) {
      fetch('api/score_daily.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({id}),
      }).then(r => r.json()).then(res => {
        if (res.ok) earnPip();
      }).catch(() => {}).finally(() => window._studyModeNext());
    };
  }

  function renderDone(d) {
    body.innerHTML = `
      <p style="line-height:1.6;margin-bottom:0.9rem;">${esc(d.message)}</p>
      <button class="action-button" onclick="window._studyModeBackToPicker()">Pick another set</button>`;
    window._studyModeBackToPicker = backToPicker;
  }

  function renderError(d) {
    body.innerHTML = `
      <p class="muted" style="margin-bottom:0.75rem;">${esc(d.message || 'Something went wrong.')}</p>
      <button class="action-button" onclick="window._studyModeBackToPicker()">Back to sets</button>`;
    window._studyModeBackToPicker = backToPicker;
  }
};
