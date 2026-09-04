window.initLetsGo = function() {
  'use strict';

  const c = document.getElementById('activity-container');
  if (!c) return;

  let skippedDailyIds = [];
  let _currentTaskData = null; // last-rendered task card's data, for returning to it without a refetch

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
          updateProgressBar(d.pages, d.pages_target, d.total_pages);
          if (d.newStoryPage && typeof window.refreshScene === 'function') window.refreshScene();
        }
      })
      .catch(() => {});
  }

  const _force = c.dataset.force || '';
  const _actUrl = 'api/next_activity.php' + (_force ? '?force=' + encodeURIComponent(_force) : '');

  // Rotate the loading line while the (potentially slow) real fetch is in flight,
  // so a busy server reads as "still working" rather than "did nothing".
  const pickLine = window.pickLoadingLine || (() => 'Loading…');
  c.innerHTML = `<p class="muted">${pickLine()}</p>`;
  const _loadingTimer = setInterval(() => {
    const p = c.querySelector('p.muted');
    if (p) p.textContent = pickLine();
  }, 1400);

  fetch(_actUrl)
    .then(r => r.json())
    .then(d => { clearInterval(_loadingTimer); render(d); })
    .catch(() => { clearInterval(_loadingTimer); c.innerHTML = '<p class="muted">Could not load next activity.</p>'; });

  function render(d) {
    switch (d.type) {
      case 'task':           renderTask(d);          break;
      case 'return_welcome':   renderReturnWelcome(d);   break;
      case 'comeback_callout': renderComebackCallout(d); break;
      case 'morning_review':   renderMorningReview(d);   break;
      case 'fun_task':       renderFunTask(d);       break;
      case 'easy_task':      renderEasyTask(d);      break;
      case 'joke':           renderJoke(d);          break;
      case 'nutrition':      renderNutrition(d);     break;
      case 'trivia':         renderTrivia(d);        break;
      case 'study':          renderStudy(d);         break;
      case 'minigame':       renderMinigame(d);      break;
      case 'triage':         renderTriage(d);        break;
      case 'person_review':  renderPersonReview(d);  break;
      case 'event_prebrief': renderEventPrebrief(d); break;
      case 'event_debrief':  renderEventDebrief(d);  break;
      case 'waiting_followup': renderWaitingFollowup(d); break;
      case 'bible_verse':    renderBibleVerse(d);    break;
      case 'bedtime_checklist': renderBedtimeChecklist(d); break;
      case 'winddown':       renderWinddown(d);      break;
      case 'gentle_puzzle':  renderGentlePuzzle(d);  break;
      case 'inbox_milestone': renderInboxMilestone(d); break;
      case 'house_task':            renderHouseTask(d);           break;
      case 'room_scan':              renderRoomScan(d);             break;
      case 'physical_object_triage': renderPhysicalObjectTriage(d); break;
      case 'morning_daily':  renderMorningDaily(d);  break;
      case 'morning_done':   renderMorningDone(d);   break;
      case 'topic_picker':   renderTopicPicker(d);   break;
      case 'regulation':     renderRegulation(d);    break;
      case 'reset_msg':      renderResetMsg(d);      break;
      case 'quote':          renderQuote(d);         break;
      case 'dance':          renderDance(d);         break;
      case 'tip':            renderTip(d);           break;
      case 'want_to_capture':    renderWantToCapture(d);    break;
      case 'want_to_suggestion': renderWantToSuggestion(d); break;
      case 'missing_info':   renderMissingInfo(d);   break;
      case 'onboarding_step': renderOnboarding(d);   break;
      case 'empty':
        c.innerHTML = `<p>${esc(d.message)}</p>`;
        break;
      default:
        c.innerHTML = '<p class="muted">Nothing to show right now.</p>';
    }
  }

  function renderTask(d) {
    _currentTaskData = d;
    const hasSubs = d.subtasks && d.subtasks.length > 0;
    const info    = window.renderTaskInfo ? window.renderTaskInfo(d, {interactive: hasSubs}) : '';
    const label   = hasSubs
      ? `<p style="font-size:0.72em;color:#999;margin-bottom:0.2rem;text-transform:uppercase;letter-spacing:0.06em;">Block task</p>`
      : '';
    const doneBtn = hasSubs ? '' : `<button class="action-button" onclick="markAsDone(${d.id})">Done</button>`;
    const pagesHint = d.pages_remaining
      ? `<p style="font-size:0.78em;color:#999;margin-top:0.5rem;">${d.pages_remaining} more task${d.pages_remaining === 1 ? '' : 's'} to unlock the next story page</p>`
      : '';
    c.innerHTML = `
      ${label}
      <p style="${hasSubs ? 'font-weight:600;' : ''}margin-bottom:0.3rem;">${esc(d.title)}</p>
      ${info}
      <div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:0.6rem;">
        ${doneBtn}
        <button class="action-button" onclick="window._showBlocked(${d.id})">Blocked</button>
        <button class="action-button" onclick="snoozeTask(${d.id})">Snooze</button>
      </div>${pagesHint}`;
  }

  function renderRegulation(d) {
    const catLabels = {
      movement: 'movement', breath: 'breath', sensory: 'sensory',
      cognitive: 'thinking', self_compassion: 'self-compassion', somatic: 'body', custom: 'yours'
    };
    const cat     = catLabels[d.category] || d.category;
    const nextUrl = d.reset_context ? 'lets-go.php?reset=1' : 'lets-go.php';
    const secs = d.seconds || null;
    const uid  = Math.random().toString(36).slice(2);
    const hourglass = secs ? hourglassMarkup(secs, uid) : '';
    c.innerHTML = `
      <p style="font-size:0.75em;color:#aaa;margin-bottom:0.35rem;text-transform:uppercase;letter-spacing:0.05em;">${esc(cat)}</p>
      <p style="margin-bottom:0.85rem;line-height:1.5;">${esc(d.text)}</p>
      ${hourglass}
      <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:0.6rem;">
        <button class="action-button" onclick="loadSpeechBubble('${nextUrl}')">Try another</button>
        <button class="action-button" onclick="_regulationNotForMe(${d.prompt_id}, ${d.is_custom ? 'true' : 'false'}, '${nextUrl}')">Not for me</button>
        <button class="action-button" id="reg-done-btn" style="background:transparent;color:#888;border:1px solid #ccc;${secs ? 'visibility:hidden;' : ''}" onclick="loadSpeechBubble('lets-go.php')">Done</button>
      </div>`;
    if (secs) armHourglass(secs, uid, 'reg-done-btn');
    window._regulationNotForMe = function(promptId, isCustom, reloadUrl) {
      const action = isCustom ? 'delete_custom' : 'disable';
      fetch('api/regulation_prompt.php', {method:'POST', headers:{'Content-Type':'application/json'},
        body: JSON.stringify({action, id: promptId})})
        .then(() => loadSpeechBubble(reloadUrl));
    };
  }

  function renderMorningReview(d) {
    const more = d.remaining > 1 ? ` <span style="font-size:0.82em;color:#aaa;">(${d.remaining} to review)</span>` : '';
    const info = window.renderTaskInfo ? window.renderTaskInfo(d, {interactive: false}) : '';
    c.innerHTML = `
      <p style="font-size:0.8em;color:#aaa;margin-bottom:0.4rem;">Woke from snooze today${more}</p>
      <p style="margin-bottom:0.3rem;">${esc(d.title)}</p>
      ${info}
      <div style="display:flex;gap:6px;flex-wrap:wrap;margin-top:0.5rem;">
        <button class="action-button" onclick="_mrToday(${d.id})">On today's list</button>
        <button class="action-button" onclick="_mrShowSnooze(${d.id}, this)">Snooze</button>
        <button class="action-button" onclick="_mrDone(${d.id})">Done</button>
      </div>`;
    window._mrToday = function(id) {
      const today = new Date().toISOString().slice(0,10);
      fetch('api/schedule_task.php', {method:'POST', headers:{'Content-Type':'application/json'},
        body: JSON.stringify({task_id: id, scheduled_date: today})})
        .then(() => loadSpeechBubble('lets-go.php'));
    };
    window._mrShowSnooze = function(id, btn) {
      document.querySelectorAll('.mr-snooze-picker').forEach(p => p.remove());
      const {suggested, rest} = (window.buildSnoozeOpts || (() => ({suggested:[], rest:[]})))(d.location || []);
      const allOpts = suggested.length
        ? [['-- suits this task --', null], ...suggested, ['-- other days --', null], ...rest]
        : rest;
      const picker = document.createElement('div');
      picker.className = 'mr-snooze-picker';
      picker.style.cssText = 'display:flex;gap:4px;flex-wrap:wrap;margin-top:6px;';
      allOpts.forEach(([label, when]) => {
        if (when === null) {
          const sep = document.createElement('div');
          sep.style.cssText = 'width:100%;font-size:0.72em;color:#aaa;padding:2px 0 1px;';
          sep.textContent = label;
          picker.appendChild(sep);
          return;
        }
        const b = document.createElement('button');
        b.className = 'action-button';
        b.style.cssText = when === 'someday'
          ? 'padding:3px 8px;font-size:0.75em;min-height:28px;background:transparent;color:#888;border:1px solid #ccc;'
          : 'padding:3px 8px;font-size:0.75em;min-height:28px;';
        b.textContent = label;
        b.addEventListener('click', () => {
          picker.querySelectorAll('button').forEach(x => x.disabled = true);
          const body = when === 'someday'
            ? {task_id: id, action: 'someday'}
            : {task_id: id, action: 'snooze', when};
          fetch('api/task_action.php', {method:'POST', headers:{'Content-Type':'application/json'},
            body: JSON.stringify(body)})
            .then(() => loadSpeechBubble('lets-go.php'));
        });
        picker.appendChild(b);
      });
      btn.closest('div').after(picker);
    };
    window._mrDone = function(id) {
      fetch('api/mark_complete.api.php?task_id=' + id, {method:'POST'})
        .then(r => r.json())
        .then(data => {
          if (data.ok) updateProgressBar(data.pages, data.pages_target, data.total_pages);
          loadSpeechBubble('lets-go.php');
        });
    };
  }

  function renderReturnWelcome(d) {
    c.innerHTML = `
      <p style="line-height:1.6;margin-bottom:0.75rem;">${esc(d.message)}</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Let's see what's up</button>`;
  }

  function renderComebackCallout(d) {
    c.innerHTML = `
      <p style="line-height:1.6;margin-bottom:0.75rem;">${esc(d.message)}</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Keep going</button>`;
  }

  const AFFIRMATIONS = [
    "Good work.", "Good stuff, keep going.", "You got this.",
    "Nice one.", "That counts.", "Look at you go.",
    "Keep it up.", "Solid.", "That's the one.", "Well done.",
    "You're doing great.", "Every little thing helps.",
  ];

  function maybeAffirm() {
    if (Math.random() >= 0.3) return false;
    const msg = AFFIRMATIONS[Math.floor(Math.random() * AFFIRMATIONS.length)];
    c.innerHTML = `<p style="line-height:1.6;margin-bottom:0.75rem;">${msg}</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
    return true;
  }

  // Shared sand-timer visual for any duration-bound prompt (fun task, regulation, easy win).
  function hourglassMarkup(seconds, uid) {
    return `
      <div style="display:flex;justify-content:center;margin:0.5rem 0 1rem;">
        <svg viewBox="0 0 60 102" width="52" height="88" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <clipPath id="hgt${uid}"><polygon points="2,5 58,5 31,48 29,48"/></clipPath>
            <clipPath id="hgb${uid}"><polygon points="29,54 31,54 58,97 2,97"/></clipPath>
          </defs>
          <!-- frame bars -->
          <rect x="1" y="1" width="58" height="5" rx="2.5" fill="#8b7355"/>
          <rect x="1" y="96" width="58" height="5" rx="2.5" fill="#8b7355"/>
          <!-- glass halves -->
          <polygon points="2,5 58,5 31,48 29,48" fill="rgba(200,180,150,0.15)" stroke="#8b7355" stroke-width="1.5" stroke-linejoin="round"/>
          <polygon points="29,54 31,54 58,97 2,97" fill="rgba(200,180,150,0.15)" stroke="#8b7355" stroke-width="1.5" stroke-linejoin="round"/>
          <!-- top sand (shrinks to nothing) -->
          <rect id="hgts${uid}" x="0" y="5" width="60" height="43" fill="#c8813a" clip-path="url(#hgt${uid})">
            <animate attributeName="height" from="43" to="0" dur="${seconds}s" fill="freeze" calcMode="linear"/>
            <animate attributeName="y" from="5" to="48" dur="${seconds}s" fill="freeze" calcMode="linear"/>
          </rect>
          <!-- bottom sand (grows from nothing) -->
          <rect x="0" y="97" width="60" height="0" fill="#c8813a" clip-path="url(#hgb${uid})">
            <animate attributeName="height" from="0" to="43" dur="${seconds}s" fill="freeze" calcMode="linear"/>
            <animate attributeName="y" from="97" to="54" dur="${seconds}s" fill="freeze" calcMode="linear"/>
          </rect>
          <!-- waist stream -->
          <line id="hgst${uid}" x1="30" y1="48" x2="30" y2="54" stroke="#c8813a" stroke-width="1.5" opacity="0.5"/>
          <!-- falling grain -->
          <circle id="hggr${uid}" cx="30" cy="48" r="1.8" fill="#c8813a">
            <animate attributeName="cy" from="48" to="54" dur="0.45s" repeatCount="indefinite" calcMode="linear"/>
            <animate attributeName="opacity" from="0.9" to="0.1" dur="0.45s" repeatCount="indefinite"/>
          </circle>
        </svg>
      </div>`;
  }

  // Reveals the given Done button and stops the falling grain once the sand runs out.
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

  // Shared "who + how long" sub-form for the GTD Waiting-For endpoint —
  // used by both renderTriage's "Waiting on someone" choice (which already
  // has a people list from the server, passed in directly) and
  // _showBlocked's "waiting_on" reason (which doesn't, so pass null to
  // fetch it fresh). onConfirm(personId, when, onError) is called with the
  // picked values; call onError(message) to re-enable the form on failure.
  function renderWaitingSubform(container, people, onConfirm) {
    function build(peopleList) {
      const peopleOpts = peopleList.map(p => `<option value="${p.person_id}">${esc(p.name)}</option>`).join('');
      container.innerHTML = `
        <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Who (optional)</label>
        <select id="wf-person" style="width:100%;box-sizing:border-box;margin-bottom:0.5rem;padding:0.35rem 0.4rem;font-size:0.95rem;border:1px solid #ccc;border-radius:6px;">
          <option value="">Not tracked / no one specific</option>
          ${peopleOpts}
        </select>
        <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Check back in</label>
        <select id="wf-when" style="width:100%;box-sizing:border-box;margin-bottom:0.6rem;padding:0.35rem 0.4rem;font-size:0.95rem;border:1px solid #ccc;border-radius:6px;">
          <option value="3d">3 days</option>
          <option value="1w" selected>1 week</option>
          <option value="2w">2 weeks</option>
          <option value="1m">1 month</option>
        </select>
        <button class="action-button" id="wf-confirm" style="width:100%;">Confirm</button>
        <p id="wf-status" class="muted" style="margin-top:0.4rem;min-height:1.2em;font-size:0.85em;"></p>`;
      document.getElementById('wf-confirm').addEventListener('click', () => {
        const personId = document.getElementById('wf-person').value || null;
        const when = document.getElementById('wf-when').value;
        document.getElementById('wf-confirm').disabled = true;
        document.getElementById('wf-status').textContent = 'Saving…';
        onConfirm(personId, when, (errMsg) => {
          const status = document.getElementById('wf-status');
          const btn = document.getElementById('wf-confirm');
          if (status) status.textContent = errMsg || 'Could not save.';
          if (btn) btn.disabled = false;
        });
      });
    }

    if (people) {
      build(people);
    } else {
      container.innerHTML = '<p class="muted" style="font-size:0.85em;">Loading…</p>';
      fetch('api/people_list.php')
        .then(r => r.json())
        .then(data => build(data.people || []))
        .catch(() => { container.innerHTML = '<p class="muted">Could not load people.</p>'; });
    }
  }

  function renderFunTask(d) {
    const secs = d.seconds || null;
    const uid  = Math.random().toString(36).slice(2);
    const hourglass = secs ? hourglassMarkup(secs, uid) : '';

    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Take a moment</p>
      <p style="line-height:1.5;margin-bottom:0.6rem;">${esc(d.text)}</p>
      ${hourglass}
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" id="fun-done-btn" ${secs ? 'style="visibility:hidden;"' : ''} onclick="window._funDone()">Done</button>
        <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
          onclick="loadSpeechBubble('lets-go.php')">Skip</button>
      </div>`;

    if (secs) armHourglass(secs, uid, 'fun-done-btn');

    window._funDone = function() {
      earnPip();
      if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
    };
  }

  function renderNutrition(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Food fact</p>
      <p style="line-height:1.6;margin-bottom:0.75rem;">${esc(d.text)}</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Got it</button>`;
  }

  function renderJoke(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Joke</p>
      <p style="line-height:1.5;margin-bottom:0.75rem;">${esc(d.setup)}</p>
      <button class="action-button" id="joke-reveal-btn">...</button>`;
    document.getElementById('joke-reveal-btn').addEventListener('click', function() {
      this.remove();
      const punchline = document.createElement('p');
      punchline.style.cssText = 'line-height:1.5;margin-bottom:0.75rem;font-style:italic;';
      punchline.textContent = d.punchline;
      c.appendChild(punchline);
      const next = document.createElement('button');
      next.className = 'action-button';
      next.textContent = 'Next';
      next.addEventListener('click', () => loadSpeechBubble('lets-go.php'));
      c.appendChild(next);
    });
  }

  function renderDance(d) {
    let startTime = null;
    let timerInterval = null;
    let todaySeconds = d.today_seconds || 0;

    function fmtSeconds(s) {
      const m = Math.floor(s / 60), sec = s % 60;
      return m > 0 ? `${m}m ${sec}s` : `${sec}s`;
    }

    function todayLine(total) {
      if (total <= 0) return '';
      return `<p id="dance-today" style="font-size:0.8em;color:#aaa;margin-top:0.5rem;">${fmtSeconds(total)} today</p>`;
    }

    function render(state) {
      if (state === 'ready') {
        c.innerHTML = `
          <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.5rem;">Move</p>
          <p style="line-height:1.6;margin-bottom:0.75rem;">${esc(d.text)}</p>
          ${todayLine(todaySeconds)}
          <button class="action-button" style="margin-top:0.75rem;" onclick="window._danceStart()">Start</button>`;
      } else if (state === 'dancing') {
        c.innerHTML = `
          <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.5rem;">Move</p>
          <p id="dance-timer" style="font-size:2rem;font-weight:bold;color:#fff;margin:0.5rem 0 1rem;letter-spacing:0.04em;">0s</p>
          ${todayLine(todaySeconds)}
          <button class="action-button" onclick="window._danceStop()">Done</button>`;
      }
    }

    window._danceStart = function() {
      startTime = Date.now();
      render('dancing');
      timerInterval = setInterval(() => {
        const el = document.getElementById('dance-timer');
        if (el) el.textContent = fmtSeconds(Math.floor((Date.now() - startTime) / 1000));
      }, 1000);
    };

    window._danceStop = function() {
      clearInterval(timerInterval);
      const elapsed = Math.max(1, Math.floor((Date.now() - startTime) / 1000));
      fetch('api/log_dance.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({seconds: elapsed}),
      })
      .then(r => r.json())
      .then(data => {
        const total = data.today_total || (todaySeconds + elapsed);
        c.innerHTML = `
          <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.5rem;">Move</p>
          <p style="line-height:1.6;margin-bottom:0.25rem;">Nice — ${fmtSeconds(elapsed)}.</p>
          <p style="font-size:0.85em;color:#aaa;margin-bottom:0.75rem;">${fmtSeconds(total)} today total.</p>
          <button class="action-button" onclick="window._danceNext()">Next</button>`;
      })
      .catch(() => {
        earnPip();
        if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
      });
    };

    window._danceNext = function() {
      earnPip();
      if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
    };

    render('ready');
  }

  function renderEasyTask(d) {
    const secs = d.seconds || null;
    const uid  = Math.random().toString(36).slice(2);
    const hourglass = secs ? hourglassMarkup(secs, uid) : '';
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Easy win</p>
      <p style="line-height:1.5;margin-bottom:0.75rem;">${esc(d.text)}</p>
      ${hourglass}
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" id="easy-done-btn" ${secs ? 'style="visibility:hidden;"' : ''} onclick="window._easyDone()">Done</button>
        <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
          onclick="loadSpeechBubble('lets-go.php')">Skip</button>
      </div>`;
    if (secs) armHourglass(secs, uid, 'easy-done-btn');
    window._easyDone = function() {
      earnPip();
      if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
    };
  }

  window._showBlocked = function(taskId) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">What's in the way?</p>
      <div id="blocked-opts" style="display:flex;flex-direction:column;gap:7px;"></div>
      <p id="blocked-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>`;

    const opts = document.getElementById('blocked-opts');
    const status = document.getElementById('blocked-status');

    function mkBtn(label, onClick, style) {
      const b = document.createElement('button');
      b.className = 'action-button';
      b.style.cssText = 'width:100%;text-align:left;' + (style || '');
      b.textContent = label;
      b.addEventListener('click', onClick);
      return b;
    }

    function sendBlocked(reason, extra) {
      opts.querySelectorAll('button').forEach(b => b.disabled = true);
      status.textContent = 'Got it.';
      fetch('api/task_action.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ task_id: taskId, action: 'blocked', reason, ...extra }),
      }).then(() => setTimeout(() => loadSpeechBubble('lets-go.php'), 400))
        .catch(() => { status.textContent = 'Network error.'; opts.querySelectorAll('button').forEach(b => b.disabled = false); });
    }

    // Genuine metadata mismatch — snoozes lightly (same as before) so it
    // doesn't immediately resurface, and opens the task detail overlay
    // scrolled/focused straight to the field(s) that need fixing, rather
    // than just deferring the same wrong data again.
    function fixMetadata(reason, focusFields) {
      sendBlocked(reason);
      loadOverlay('api/task_detail.php?id=' + taskId + '&focus=' + encodeURIComponent(focusFields));
    }

    // "Wrong location" actually asks where it'd need to be done, inline —
    // opening the overlay and hoping the user engages with it doesn't
    // capture anything on its own. Location is multi-select: a task can be
    // doable at more than one place.
    function renderLocationSubform() {
      status.textContent = '';
      const locs    = ['home', 'work', 'shops', 'online', 'phone'];
      const labels  = { home: 'Home', work: 'Work', shops: 'Shops', online: 'Online', phone: 'Phone call' };
      const current = (_currentTaskData && Array.isArray(_currentTaskData.location)) ? _currentTaskData.location : [];
      opts.innerHTML = `
        <p style="font-size:0.85em;color:#555;margin-bottom:0.5rem;">Where would this actually need to be done? (pick any that apply)</p>
        <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:0.6rem;">
          ${locs.map(l => `<label style="display:flex;align-items:center;gap:8px;font-size:0.92em;cursor:pointer;">
            <input type="checkbox" class="wl-cb" value="${l}" ${current.includes(l) ? 'checked' : ''}> ${labels[l]}
          </label>`).join('')}
        </div>
        <button class="action-button" id="wl-save">Save</button>
        <p style="margin-top:0.5rem;"><a href="#" id="wl-skip" style="font-size:0.78em;color:#8b7355;">Not sure — snooze it instead</a></p>`;
      document.getElementById('wl-save').addEventListener('click', function() {
        const selected = Array.from(opts.querySelectorAll('.wl-cb:checked')).map(cb => cb.value);
        this.disabled = true;
        status.textContent = 'Saving…';
        fetch('api/update_task.php', { method: 'POST', headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ task_id: taskId, fields: { location: selected } }) })
          .then(r => r.json()).then(data => {
            if (data.ok) { status.textContent = 'Saved.'; setTimeout(() => loadSpeechBubble('lets-go.php'), 350); }
            else { this.disabled = false; status.textContent = data.error || 'Could not save.'; }
          }).catch(() => { this.disabled = false; status.textContent = 'Network error.'; });
      });
      document.getElementById('wl-skip').addEventListener('click', function(e) {
        e.preventDefault();
        sendBlocked('wrong_location');
      });
    }

    opts.append(
      mkBtn("Wrong location",                 renderLocationSubform),
      mkBtn("Wrong time of day",              () => fixMetadata('wrong_time', 'relevant_after,irrelevant_after')),
      mkBtn("Duration or energy tagged wrong",() => fixMetadata('wrong_effort', 'time,energy')),
      mkBtn("Waiting on something else first",() => {
        opts.innerHTML = '';
        renderWaitingSubform(opts, null, (personId, when, onError) => {
          fetch('api/task_action.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ task_id: taskId, action: 'blocked', reason: 'waiting_on', person_id: personId, when }),
          }).then(r => r.json()).then(data => {
            if (data.ok) setTimeout(() => loadSpeechBubble('lets-go.php'), 400);
            else onError(data.error);
          }).catch(() => onError('Network error.'));
        });
      }),
      mkBtn("Not sure what to do with it",    () => sendBlocked('too_vague')),
      mkBtn("I just don't want to do this right now", () => {
        opts.innerHTML = '';
        status.textContent = '';
        loadUnstuckTechnique(taskId);
      }, 'background:transparent;color:#6b5b95;border:1.5px solid #6b5b95;'),
    );

    // "Waiting for a date" needs inline date input
    const dateRow = document.createElement('div');
    dateRow.style.cssText = 'display:flex;gap:8px;align-items:center;';
    const dateInput = document.createElement('input');
    dateInput.type = 'date';
    dateInput.min  = new Date(Date.now() + 86400000).toLocaleDateString('sv-SE');
    dateInput.style.cssText = 'flex:1;min-width:0;';
    const dateBtn = document.createElement('button');
    dateBtn.className = 'action-button';
    dateBtn.style.cssText = 'flex-shrink:0;white-space:nowrap;';
    dateBtn.textContent = 'Not until…';
    dateBtn.addEventListener('click', () => {
      if (!dateInput.value) { status.textContent = 'Pick a date first.'; return; }
      sendBlocked('waiting_date', { until: dateInput.value });
    });
    dateRow.append(dateInput, dateBtn);
    opts.append(dateRow);
  };

  // Category-2 "genuine resistance" flow — the task's metadata is already
  // correct, offer an actual unstuck technique rather than another snooze.
  function loadUnstuckTechnique(taskId) {
    c.innerHTML = `<p class="muted">${(window.pickLoadingLine || (() => 'Loading…'))()}</p>`;
    fetch(`api/unstuck_technique.php?task_id=${taskId}`)
      .then(r => r.json())
      .then(d => {
        if (d.ok) renderUnstuckTechnique(taskId, d);
        else c.innerHTML = `<p class="muted">${esc(d.error || 'Could not load a technique.')}</p>`;
      })
      .catch(() => { c.innerHTML = '<p class="muted">Could not load a technique.</p>'; });
  }

  function renderUnstuckTechnique(taskId, d) {
    if (d.kind === 'break_smaller') { renderBreakSmaller(taskId, d); return; }

    const secs = d.seconds || null;
    const uid  = Math.random().toString(36).slice(2);
    const hourglass = secs ? hourglassMarkup(secs, uid) : '';
    c.innerHTML = `
      <p style="font-size:0.75em;color:#aaa;margin-bottom:0.35rem;text-transform:uppercase;letter-spacing:0.05em;">getting unstuck</p>
      <p style="margin-bottom:0.85rem;line-height:1.5;">${esc(d.text)}</p>
      ${hourglass}
      <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:0.6rem;">
        <button class="action-button" onclick="window._loadUnstuck(${taskId})">Try another</button>
        <button class="action-button" onclick="window._unstuckNotForMe(${taskId}, ${d.id}, ${d.is_custom ? 'true' : 'false'})">Not for me</button>
        <button class="action-button" id="unstuck-ready-btn" style="background:transparent;color:#888;border:1px solid #ccc;${secs ? 'visibility:hidden;' : ''}" onclick="window._unstuckReady(${taskId})">Ready to try</button>
      </div>
      <p style="margin-top:0.4rem;"><a href="#" onclick="event.preventDefault();snoozeTask(${taskId})" style="font-size:0.78em;color:#8b7355;">None of these — snooze it</a></p>`;
    if (secs) armHourglass(secs, uid, 'unstuck-ready-btn');
  }

  function renderBreakSmaller(taskId, d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#aaa;margin-bottom:0.35rem;text-transform:uppercase;letter-spacing:0.05em;">getting unstuck</p>
      <p style="margin-bottom:0.7rem;line-height:1.5;">${esc(d.text)}</p>
      <input id="unstuck-step-input" type="text" placeholder="e.g. Open the document" style="width:100%;box-sizing:border-box;margin-bottom:0.5rem;">
      <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:0.6rem;">
        <button class="action-button" id="unstuck-step-add">Add & I'm on it</button>
        <button class="action-button" onclick="window._loadUnstuck(${taskId})">Try another</button>
        <button class="action-button" onclick="window._unstuckNotForMe(${taskId}, ${d.id}, ${d.is_custom ? 'true' : 'false'})">Not for me</button>
      </div>
      <p style="margin-top:0.4rem;"><a href="#" onclick="event.preventDefault();snoozeTask(${taskId})" style="font-size:0.78em;color:#8b7355;">None of these — snooze it</a></p>`;
    const inp = document.getElementById('unstuck-step-input');
    const addBtn = document.getElementById('unstuck-step-add');
    function submit() {
      const title = inp.value.trim();
      if (!title) { inp.focus(); return; }
      addBtn.disabled = true;
      fetch('api/add_task.php', {
        method: 'POST', headers: {'Content-Type':'application/json'},
        body: JSON.stringify({ title, task_type: 'next_action', parent_id: taskId }),
      }).then(r => r.json()).then(data => {
        addBtn.disabled = false;
        if (!data.ok) return;
        earnPip();
        if (_currentTaskData && _currentTaskData.id === taskId) {
          _currentTaskData.subtasks = _currentTaskData.subtasks || [];
          _currentTaskData.subtasks.push({ id: data.task_id, title });
          renderTask(_currentTaskData);
        } else {
          loadSpeechBubble('lets-go.php');
        }
      }).catch(() => { addBtn.disabled = false; });
    }
    addBtn.addEventListener('click', submit);
    inp.addEventListener('keydown', e => { if (e.key === 'Enter') submit(); });
    inp.focus();
  }

  window._loadUnstuck = function(taskId) { loadUnstuckTechnique(taskId); };

  window._unstuckReady = function(taskId) {
    earnPip();
    if (_currentTaskData && _currentTaskData.id === taskId) {
      renderTask(_currentTaskData);
    } else {
      loadSpeechBubble('lets-go.php');
    }
  };

  window._unstuckNotForMe = function(taskId, techId, isCustom) {
    const action = isCustom ? 'delete_custom' : 'disable';
    fetch('api/unstuck_technique.php', {method:'POST', headers:{'Content-Type':'application/json'},
      body: JSON.stringify({action, id: techId})})
      .then(() => loadUnstuckTechnique(taskId));
  };

  function recordQuestionSeen(id, correct) {
    if (!id) return;
    const fd = new FormData();
    fd.append('id', id);
    fd.append('correct', correct ? '1' : '0');
    fetch('api/record_question_seen.php', { method: 'POST', body: fd }).catch(() => {});
  }

  function renderTrivia(d) {
    const opts = d.options.map((o, i) =>
      `<button class="action-button" style="width:100%;text-align:left;"
         onclick="window._answerTrivia(${i})">${esc(o)}</button>`
    ).join('');
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;font-weight:600;">${esc(d.question)}</p>
      <div id="trivia-opts" style="display:flex;flex-direction:column;gap:6px;">${opts}</div>
      <p id="trivia-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <button id="trivia-next" class="action-button" style="display:none;margin-top:0.5rem;"
        onclick="loadSpeechBubble('lets-go.php')">Next</button>`;

    window._answerTrivia = function (idx) {
      const btns = document.querySelectorAll('#trivia-opts .action-button');
      btns.forEach(b => b.disabled = true);
      const fb = document.getElementById('trivia-feedback');
      const correct = idx === d.answer;
      recordQuestionSeen(d.id, correct);
      if (correct) {
        btns[idx].style.background = '#4caf50';
        fb.textContent = 'Correct!';
        earnPip();
      } else {
        btns[idx].style.background = '#e53935';
        if (btns[d.answer]) btns[d.answer].style.background = '#4caf50';
        fb.textContent = 'Not quite — the answer was: ' + esc(d.options[d.answer]);
      }
      document.getElementById('trivia-next').style.display = 'inline-flex';
    };
  }

  function renderResetMsg(d) {
    c.innerHTML = `<p style="line-height:1.6;">${esc(d.text)}</p>
      <button class="action-button" style="margin-top:0.75rem;" onclick="loadSpeechBubble('lets-go.php')">OK, next</button>`;
  }

  function renderTopicPicker(d) {
    if (!d.topics || d.topics.length === 0) {
      // Nothing left to unlock or answer — skip this activity silently
      // rather than announcing it, and move straight to the next one.
      loadSpeechBubble('lets-go.php');
      return;
    }
    const btns = d.topics.map(topic =>
      `<button class="action-button" style="width:100%;" onclick="window._pickTopic('${topic.replace(/'/g, "\\'")}')"> ${esc(topic)}</button>`
    ).join('');
    c.innerHTML = `
      <p style="font-weight:600;margin-bottom:0.5rem;">You've mastered all the current trivia questions!</p>
      <p class="muted" style="margin-bottom:0.75rem;">Pick your next topic:</p>
      <div style="display:flex;flex-direction:column;gap:6px;">${btns}</div>
      <p id="topic-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;"></p>`;

    window._pickTopic = async function(topic) {
      document.querySelectorAll('#lets-go-content .action-button').forEach(b => b.disabled = true);
      document.getElementById('topic-status').textContent = 'Unlocking ' + topic + '...';
      try {
        const r = await fetch('api/unlock_trivia_topic.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({topic}),
        });
        const data = await r.json();
        if (data.ok) {
          document.getElementById('topic-status').textContent = topic + ' unlocked!';
          setTimeout(() => loadSpeechBubble('lets-go.php'), 800);
        } else {
          document.getElementById('topic-status').textContent = data.error || 'Something went wrong.';
          document.querySelectorAll('#lets-go-content .action-button').forEach(b => b.disabled = false);
        }
      } catch(e) {
        document.getElementById('topic-status').textContent = 'Network error.';
        document.querySelectorAll('#lets-go-content .action-button').forEach(b => b.disabled = false);
      }
    };
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
    const meta = (d.set_name || progressText)
      ? `<p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.25rem;">
           ${d.set_name ? esc(d.set_name) + (progressText ? ' &middot; ' : '') : ''}${progressText || ''}
         </p>`
      : '';
    const opts = d.options.map((o, i) =>
      `<button class="action-button" style="width:100%;text-align:left;"
         onclick="window._answerStudy(${i})">${esc(o)}</button>`
    ).join('');
    c.innerHTML = `
      ${meta}${progressBar}
      <p style="font-weight:600;line-height:1.4;margin-bottom:0.75rem;white-space:pre-wrap;">${esc(d.question)}</p>
      <div id="study-opts" style="display:flex;flex-direction:column;gap:6px;">${opts}</div>
      <p id="study-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <p id="study-expl" style="display:none;margin-top:0.4rem;font-size:0.88em;line-height:1.45;
         border-left:3px solid #ddd;padding-left:0.6rem;color:#555;"></p>
      <button id="study-next" class="action-button" style="display:none;margin-top:0.6rem;"
        onclick="loadSpeechBubble('lets-go.php')">Next</button>`;

    window._answerStudy = function (idx) {
      const btns = document.querySelectorAll('#study-opts .action-button');
      btns.forEach(b => b.disabled = true);
      const correct = idx === d.answer;
      recordQuestionSeen(d.id, correct);
      if (correct) {
        btns[idx].style.background = '#4caf50';
        document.getElementById('study-feedback').textContent = 'Correct!';
        earnPip();
      } else {
        btns[idx].style.background = '#e53935';
        if (btns[d.answer]) btns[d.answer].style.background = '#4caf50';
        document.getElementById('study-feedback').textContent = 'Not quite.';
      }
      if (d.explanation) {
        const expl = document.getElementById('study-expl');
        expl.textContent = d.explanation;
        expl.style.display = 'block';
      }
      document.getElementById('study-next').style.display = 'inline-flex';
    };
  }

  function renderMinigame(d) {
    if (d.game === 'tictactoe')    renderTicTacToe();
    if (d.game === 'numguess')     renderNumGuess();
    if (d.game === 'rps')          renderRPS();
    if (d.game === 'mathquiz')     renderMathQuiz();
    if (d.game === 'truefalse')    renderTrueFalse();
    if (d.game === 'sequence')     renderSequence();
    if (d.game === 'reaction')     renderReaction();
    if (d.game === 'wordscramble') renderWordScramble();
    if (d.game === 'highlow')      renderHighLow();
    if (d.game === 'gemMatch')     renderGemMatch();
  }

  function renderTicTacToe() {
    let board = Array(9).fill(null), over = false, busy = false;

    function win(b) {
      for (const [a, x, y] of [[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]])
        if (b[a] && b[a] === b[x] && b[a] === b[y]) return b[a];
      return null;
    }

    function draw() {
      const cells = board.map((v, i) => {
        const cls = 'ttt-cell' + (v === 'X' ? ' ttt-x' : v === 'O' ? ' ttt-o' : '');
        const dis = (v || over || busy) ? 'disabled' : '';
        return `<button class="${cls}" data-i="${i}" ${dis}>${v || ''}</button>`;
      }).join('');
      c.innerHTML = `
        <p id="ttt-msg" style="margin-bottom:0.25rem;">Your move.</p>
        <div id="ttt-board">${cells}</div>
        <div style="margin-top:0.75rem;display:flex;gap:8px;">
          <button class="action-button"
            style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
            onclick="window._tttReset()">Again</button>
          <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Next task</button>
        </div>`;
      document.getElementById('ttt-board').addEventListener('click', e => {
        const btn = e.target.closest('[data-i]');
        if (!btn || over || busy) return;
        const i = +btn.dataset.i;
        if (board[i]) return;
        board[i] = 'X';
        busy = true;
        draw();
        const w = win(board);
        if (w || board.every(Boolean)) { endGame(w); return; }
        document.getElementById('ttt-msg').textContent = 'Hmm…';
        setTimeout(sheepMove, 650);
      });
    }

    function sheepMove() {
      const empty = board.map((v, i) => v ? null : i).filter(i => i !== null);
      if (!empty.length) return;
      board[empty[Math.floor(Math.random() * empty.length)]] = 'O';
      busy = false;
      draw();
      const w = win(board);
      if (w || board.every(Boolean)) { endGame(w); return; }
      document.getElementById('ttt-msg').textContent = 'Your move.';
    }

    function endGame(w) {
      over = true;
      draw();
      const msg = document.getElementById('ttt-msg');
      if (w === 'X')      { earnPip(); msg.textContent = "You win! I wasn't ready."; }
      else if (w === 'O') msg.textContent = "I win! Huh. Didn't expect that.";
      else                msg.textContent = 'A draw. Respectable.';
    }

    window._tttReset = function () {
      board = Array(9).fill(null); over = false; busy = false; draw();
    };

    draw();
  }

  function renderNumGuess() {
    const target = Math.floor(Math.random() * 20) + 1;
    let attempts = 0;
    const max = 5;

    function drawNG(msg) {
      c.innerHTML = `
        <p style="margin-bottom:0.5rem;">${msg}</p>
        <div style="display:flex;gap:8px;align-items:center;">
          <input type="number" id="ng-input" min="1" max="20" placeholder="1 – 20"
            style="width:5.5rem;padding:0.4rem 0.5rem;font-size:1rem;border:1px solid #ccc;border-radius:6px;">
          <button class="action-button" onclick="window._ngGuess()">Guess</button>
        </div>
        <p id="ng-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
        <p class="muted" style="font-size:0.85em;margin-top:0.25rem;">Attempts left: <span id="ng-left">${max - attempts}</span></p>`;
      const inp = document.getElementById('ng-input');
      inp.focus();
      inp.addEventListener('keydown', e => { if (e.key === 'Enter') window._ngGuess(); });
    }

    drawNG("I'm thinking of a number between 1 and 20.");

    window._ngGuess = function() {
      const inp = document.getElementById('ng-input');
      const val = parseInt(inp.value, 10);
      if (!val || val < 1 || val > 20) {
        document.getElementById('ng-feedback').textContent = 'Pick a number between 1 and 20.';
        return;
      }
      attempts++;
      inp.value = '';
      if (val === target) {
        earnPip();
        c.innerHTML = `
          <p>Yes! It was ${target}. You got it in ${attempts} ${attempts === 1 ? 'try' : 'tries'}.</p>
          <button class="action-button" style="margin-top:0.75rem;" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
      } else if (attempts >= max) {
        c.innerHTML = `
          <p>Out of guesses — it was ${target}.</p>
          <button class="action-button" style="margin-top:0.75rem;" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
      } else {
        document.getElementById('ng-feedback').textContent = val < target ? 'Too low.' : 'Too high.';
        document.getElementById('ng-left').textContent = max - attempts;
        inp.focus();
      }
    };
  }

  function renderRPS() {
    const choices = ['Rock', 'Paper', 'Scissors'];
    function sheepPick() { return choices[Math.floor(Math.random() * 3)]; }
    function result(p, s) {
      if (p === s) return 'draw';
      if ((p==='Rock'&&s==='Scissors')||(p==='Paper'&&s==='Rock')||(p==='Scissors'&&s==='Paper')) return 'win';
      return 'lose';
    }
    const btns = choices.map(ch =>
      `<button class="action-button" onclick="window._rps('${ch}')">${ch}</button>`
    ).join('');
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;">Rock, paper, scissors...</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;" id="rps-btns">${btns}</div>
      <p id="rps-result" class="muted" style="margin-top:0.75rem;min-height:1.4em;"></p>
      <button id="rps-next" class="action-button" style="display:none;margin-top:0.5rem;"
        onclick="loadSpeechBubble('lets-go.php')">Next</button>`;

    window._rps = function(player) {
      document.querySelectorAll('#rps-btns .action-button').forEach(b => b.disabled = true);
      const sheep = sheepPick();
      const r = result(player, sheep);
      if (r === 'win') earnPip();
      const msg = r === 'win'  ? `You played ${player}, I played ${sheep}. You win.`
                : r === 'lose' ? `You played ${player}, I played ${sheep}. I win.`
                :                `We both played ${player}. Draw.`;
      document.getElementById('rps-result').textContent = msg;
      document.getElementById('rps-next').style.display = 'inline-flex';
    };
  }

  function renderMathQuiz() {
    const ops = ['+', '-', '*'];
    const op  = ops[Math.floor(Math.random() * ops.length)];
    let a, b, answer;
    if (op === '+') {
      a = Math.floor(Math.random() * 50) + 1;
      b = Math.floor(Math.random() * 50) + 1;
      answer = a + b;
    } else if (op === '-') {
      a = Math.floor(Math.random() * 50) + 10;
      b = Math.floor(Math.random() * a) + 1;
      answer = a - b;
    } else {
      a = Math.floor(Math.random() * 11) + 2;
      b = Math.floor(Math.random() * 11) + 2;
      answer = a * b;
    }
    const symbol = op === '*' ? '×' : op;
    const wrongs = new Set();
    while (wrongs.size < 3) {
      const delta = Math.floor(Math.random() * 8) + 1;
      const w = answer + (Math.random() < 0.5 ? delta : -delta);
      if (w !== answer && w >= 0) wrongs.add(w);
    }
    const opts = [...wrongs, answer].sort(() => Math.random() - 0.5);
    const ci   = opts.indexOf(answer);
    const btns = opts.map((o, i) =>
      `<button class="action-button" onclick="window._mathAns(${i},${ci})">${o}</button>`
    ).join('');
    c.innerHTML = `
      <p style="font-size:1.15em;font-weight:600;margin-bottom:0.75rem;">${a} ${symbol} ${b} = ?</p>
      <div id="math-opts" style="display:flex;gap:8px;flex-wrap:wrap;">${btns}</div>
      <p id="math-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <button id="math-next" class="action-button" style="display:none;margin-top:0.5rem;"
        onclick="loadSpeechBubble('lets-go.php')">Next</button>`;

    window._mathAns = function(idx, correct) {
      document.querySelectorAll('#math-opts .action-button').forEach(b => b.disabled = true);
      const fb = document.getElementById('math-feedback');
      if (idx === correct) {
        document.querySelectorAll('#math-opts .action-button')[idx].style.background = '#4caf50';
        fb.textContent = 'Correct!';
        earnPip();
      } else {
        document.querySelectorAll('#math-opts .action-button')[idx].style.background = '#e53935';
        document.querySelectorAll('#math-opts .action-button')[correct].style.background = '#4caf50';
        fb.textContent = 'Nope — it was ' + answer + '.';
      }
      document.getElementById('math-next').style.display = 'inline-flex';
    };
  }

  function renderTrueFalse() {
    const questions = [
      { s: 'The Great Wall of China is visible from space with the naked eye.', a: false },
      { s: 'A group of flamingos is called a flamboyance.', a: true },
      { s: 'Diamonds are the hardest natural substance on Earth.', a: true },
      { s: 'Napoleon Bonaparte was unusually short for his era.', a: false },
      { s: 'Humans share about 60% of their DNA with bananas.', a: true },
      { s: 'The Eiffel Tower was originally intended to be permanent.', a: false },
      { s: 'Honey never spoils — edible honey has been found in ancient Egyptian tombs.', a: true },
      { s: 'Lightning never strikes the same place twice.', a: false },
      { s: 'Goldfish have a memory span of only 3 seconds.', a: false },
      { s: 'Sound travels faster through water than through air.', a: true },
      { s: 'The human eye can distinguish about 10 million different colours.', a: true },
      { s: 'Bats are blind.', a: false },
      { s: 'A day on Venus is longer than a year on Venus.', a: true },
      { s: 'Cleopatra lived closer in time to the Moon landing than to the construction of the Great Pyramid.', a: true },
      { s: 'Humans use only 10% of their brain.', a: false },
      { s: 'Sharks are older than trees as a species.', a: true },
      { s: 'The tongue is the strongest muscle in the human body.', a: false },
      { s: 'Hot water freezes faster than cold water under certain conditions.', a: true },
      { s: 'Carrots were originally purple before selective breeding.', a: true },
      { s: 'An octopus has three hearts.', a: true },
    ];
    const q = questions[Math.floor(Math.random() * questions.length)];
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;line-height:1.45;">${esc(q.s)}</p>
      <div id="tf-opts" style="display:flex;gap:8px;">
        <button class="action-button" style="flex:1;" onclick="window._tf(true,${q.a})">True</button>
        <button class="action-button" style="flex:1;" onclick="window._tf(false,${q.a})">False</button>
      </div>
      <p id="tf-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <button id="tf-next" class="action-button" style="display:none;margin-top:0.5rem;"
        onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
    window._tf = function(ans, correct) {
      document.querySelectorAll('#tf-opts .action-button').forEach(b => b.disabled = true);
      const fb = document.getElementById('tf-feedback');
      if (ans === correct) {
        fb.textContent = 'Correct!';
        earnPip();
      } else {
        fb.textContent = `Not quite — that's ${correct ? 'true' : 'false'}.`;
      }
      document.getElementById('tf-next').style.display = 'inline-flex';
    };
  }

  function renderSequence() {
    const type = Math.random() < 0.5 ? 'arith' : 'geo';
    let seq, next;
    if (type === 'arith') {
      const start = Math.floor(Math.random() * 10) + 1;
      const step  = Math.floor(Math.random() * 8) + 2;
      seq  = [start, start+step, start+step*2, start+step*3];
      next = start + step * 4;
    } else {
      const start = Math.floor(Math.random() * 3) + 1;
      const ratio = Math.floor(Math.random() * 3) + 2;
      seq  = [start, start*ratio, start*ratio**2, start*ratio**3];
      next = start * ratio ** 4;
    }
    const wrongs = new Set();
    while (wrongs.size < 3) {
      const delta = Math.floor(Math.random() * (next * 0.4 + 5)) + 1;
      const w = next + (Math.random() < 0.5 ? delta : -delta);
      if (w !== next && w > 0 && Number.isFinite(w)) wrongs.add(w);
    }
    const opts = [...wrongs, next].sort(() => Math.random() - 0.5);
    const ci   = opts.indexOf(next);
    const btns = opts.map((o, i) =>
      `<button class="action-button" onclick="window._seqAns(${i},${ci})">${Math.round(o)}</button>`
    ).join('');
    c.innerHTML = `
      <p class="muted" style="font-size:0.8em;margin-bottom:0.3rem;">What comes next?</p>
      <p style="font-size:1.1em;font-weight:600;margin-bottom:0.75rem;letter-spacing:0.04em;">${seq.join(', ')}, ___</p>
      <div id="seq-opts" style="display:flex;gap:8px;flex-wrap:wrap;">${btns}</div>
      <p id="seq-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <button id="seq-next" class="action-button" style="display:none;margin-top:0.5rem;"
        onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
    window._seqAns = function(idx, correct) {
      document.querySelectorAll('#seq-opts .action-button').forEach(b => b.disabled = true);
      const fb = document.getElementById('seq-feedback');
      if (idx === correct) {
        document.querySelectorAll('#seq-opts .action-button')[idx].style.background = '#4caf50';
        fb.textContent = 'Correct!';
        earnPip();
      } else {
        document.querySelectorAll('#seq-opts .action-button')[idx].style.background = '#e53935';
        document.querySelectorAll('#seq-opts .action-button')[correct].style.background = '#4caf50';
        fb.textContent = `Nope — it was ${Math.round(next)}.`;
      }
      document.getElementById('seq-next').style.display = 'inline-flex';
    };
  }

  function renderReaction() {
    let startTime, waiting = false;
    let timeoutId;
    c.innerHTML = `
      <p class="muted" style="margin-bottom:0.75rem;">Tap the button the moment it turns green.</p>
      <button id="react-btn" class="action-button"
        style="width:100%;min-height:80px;font-size:1.1em;background:#ccc;cursor:not-allowed;"
        disabled>Wait...</button>
      <p id="react-msg" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>`;
    const btn = document.getElementById('react-btn');
    const msg = document.getElementById('react-msg');
    const delay = 1500 + Math.random() * 2500;
    timeoutId = setTimeout(() => {
      btn.style.background = '#4caf50';
      btn.style.cursor     = 'pointer';
      btn.disabled         = false;
      btn.textContent      = 'NOW!';
      startTime            = performance.now();
      waiting              = true;
    }, delay);
    btn.addEventListener('click', function() {
      if (!waiting) {
        clearTimeout(timeoutId);
        msg.textContent = 'Too early! Starting over...';
        msg.style.color = '#e53935';
        btn.style.background = '#ccc';
        btn.disabled = true;
        btn.textContent = 'Wait...';
        const newDelay = 1500 + Math.random() * 2500;
        timeoutId = setTimeout(() => {
          btn.style.background = '#4caf50';
          btn.style.cursor     = 'pointer';
          btn.disabled         = false;
          btn.textContent      = 'NOW!';
          startTime            = performance.now();
          waiting              = true;
          msg.textContent      = '';
        }, newDelay);
        return;
      }
      const ms = Math.round(performance.now() - startTime);
      waiting = false;
      btn.disabled = true;
      earnPip();
      const comment = ms < 200 ? 'Unnaturally fast.' : ms < 300 ? 'Excellent.' : ms < 400 ? 'Pretty quick.' : ms < 500 ? 'Not bad.' : 'A little slow today.';
      c.innerHTML = `
        <p style="font-size:1.3em;font-weight:600;margin-bottom:0.25rem;">${ms} ms</p>
        <p class="muted" style="margin-bottom:0.75rem;">${comment}</p>
        <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
    });
  }

  function renderWordScramble() {
    const words = [
      'bridge','carpet','planet','silver','hammer','bottle','castle','garden',
      'lantern','crayon','puzzle','basket','jungle','winter','purple','corner',
      'frozen','pillow','candle','gravel','lizard','button','velvet','mirror',
      'forest','temple','cobalt','finger','ladder','pepper'
    ];
    const correct = words[Math.floor(Math.random() * words.length)];
    function scramble(w) {
      let arr = w.split(''), s;
      do { arr.sort(() => Math.random() - 0.5); s = arr.join(''); } while (s === w);
      return s;
    }
    const scrambled = scramble(correct);
    const pool = words.filter(w => w !== correct);
    const distractors = [];
    while (distractors.length < 3) {
      const w = pool[Math.floor(Math.random() * pool.length)];
      if (!distractors.includes(w)) distractors.push(w);
    }
    const opts = [...distractors, correct].sort(() => Math.random() - 0.5);
    const ci   = opts.indexOf(correct);
    const btns = opts.map((o, i) =>
      `<button class="action-button" onclick="window._scrambleAns(${i},${ci})">${o}</button>`
    ).join('');
    c.innerHTML = `
      <p class="muted" style="font-size:0.8em;margin-bottom:0.3rem;">Unscramble the word:</p>
      <p style="font-size:1.6em;font-weight:700;letter-spacing:0.12em;margin-bottom:0.75rem;">${scrambled}</p>
      <div id="scramble-opts" style="display:flex;gap:8px;flex-wrap:wrap;">${btns}</div>
      <p id="scramble-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <button id="scramble-next" class="action-button" style="display:none;margin-top:0.5rem;"
        onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
    window._scrambleAns = function(idx, ci) {
      document.querySelectorAll('#scramble-opts .action-button').forEach(b => b.disabled = true);
      const fb = document.getElementById('scramble-feedback');
      if (idx === ci) {
        document.querySelectorAll('#scramble-opts .action-button')[idx].style.background = '#4caf50';
        fb.textContent = 'Correct!';
        earnPip();
      } else {
        document.querySelectorAll('#scramble-opts .action-button')[idx].style.background = '#e53935';
        document.querySelectorAll('#scramble-opts .action-button')[ci].style.background = '#4caf50';
        fb.textContent = `It was "${correct}".`;
      }
      document.getElementById('scramble-next').style.display = 'inline-flex';
    };
  }

  function renderHighLow() {
    const totalRounds = 5;
    let round = 0, score = 0;
    let current = Math.floor(Math.random() * 100) + 1;

    function drawRound() {
      c.innerHTML = `
        <p class="muted" style="font-size:0.8em;margin-bottom:0.25rem;">Higher or lower? (${round + 1}/${totalRounds})</p>
        <p style="font-size:2em;font-weight:700;margin-bottom:0.75rem;">${current}</p>
        <div style="display:flex;gap:8px;">
          <button class="action-button" style="flex:1;" onclick="window._hl('higher')">Higher</button>
          <button class="action-button" style="flex:1;" onclick="window._hl('lower')">Lower</button>
        </div>
        <p id="hl-feedback" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
        <p class="muted" style="font-size:0.82em;">Score: ${score}/${round}</p>`;
      window._hl = function(guess) {
        document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = true);
        const next = Math.floor(Math.random() * 100) + 1;
        const fb   = document.getElementById('hl-feedback');
        if (next === current) {
          fb.textContent = `Also ${next} — no change.`;
          current = next; round++;
          setTimeout(round < totalRounds ? drawRound : finish, 1100);
          return;
        }
        const ok = (next > current && guess === 'higher') || (next < current && guess === 'lower');
        if (ok) { score++; fb.textContent = `${next} — correct!`; }
        else    { fb.textContent = `${next} — nope.`; }
        current = next; round++;
        setTimeout(round < totalRounds ? drawRound : finish, 1100);
      };
    }

    function finish() {
      if (score >= 3) earnPip();
      c.innerHTML = `
        <p style="font-size:1.1em;font-weight:600;margin-bottom:0.25rem;">${score} / ${totalRounds}</p>
        <p class="muted" style="margin-bottom:0.75rem;">${score >= 4 ? 'Sharp.' : score >= 3 ? 'Good enough.' : 'Bad luck.'}</p>
        <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
    }

    drawRound();
  }

  function renderBedtimeChecklist(d) {
    const rows = d.items.map(item => `
      <div class="subtask-row" data-id="${item.id}" style="display:flex;align-items:flex-start;gap:8px;padding:0.35rem 0;border-bottom:1px solid rgba(0,0,0,0.06);">
        <span style="flex:1;line-height:1.4;font-size:0.95em;">${esc(item.text)}</span>
        <button class="action-button" data-id="${item.id}"
          style="flex-shrink:0;padding:0.2rem 0.6rem;font-size:0.82em;"
          onclick="window._bedtimeChecklistDone(${item.id}, this)">Done</button>
      </div>`).join('');
    c.innerHTML = `
      <p style="font-size:0.75em;color:#aaa;margin-bottom:0.4rem;text-transform:uppercase;letter-spacing:0.05em;">Getting ready for bed</p>
      <div class="bedtime-checklist" id="bedtime-checklist-list" style="margin-bottom:0.7rem;">${rows}</div>
      <button class="action-button" style="background:transparent;color:#888;border:1px solid #ccc;" onclick="loadSpeechBubble('lets-go.php?bedtime_choice=winddown')">Not tired yet &rarr;</button>`;
    window._bedtimeChecklistDone = function(itemId, btn) {
      const row = btn.closest('.subtask-row');
      btn.disabled = true;
      row.style.transition = 'opacity 0.2s';
      row.style.opacity = '0';
      fetch('api/bedtime_checklist.php', {method:'POST', headers:{'Content-Type':'application/json'},
        body: JSON.stringify({action: 'check', id: itemId})})
        .then(r => r.json())
        .then(data => {
          if (data.ok) {
            updateProgressBar(data.pages, data.pages_target, data.total_pages);
            setTimeout(() => {
              row.remove();
              const listEl = document.getElementById('bedtime-checklist-list');
              if (listEl && !listEl.querySelector('.subtask-row')) {
                // Whole checklist done for the night — a small extra flourish, then roll into wind-down
                if (typeof spawnStarPip === 'function') {
                  setTimeout(spawnStarPip, 150);
                  setTimeout(spawnStarPip, 300);
                }
                setTimeout(() => loadSpeechBubble('lets-go.php'), 400);
              }
            }, 220);
          } else {
            btn.disabled = false;
            row.style.opacity = '1';
          }
        })
        .catch(() => { btn.disabled = false; row.style.opacity = '1'; });
    };
  }

  function renderWinddown(d) {
    const catLabels = {
      movement: 'movement', breath: 'breath', sensory: 'sensory',
      cognitive: 'thinking', self_compassion: 'self-compassion', somatic: 'body', custom: 'yours'
    };
    const cat  = catLabels[d.category] || d.category;
    const secs = d.seconds || null;
    const uid  = Math.random().toString(36).slice(2);
    const hourglass = secs ? hourglassMarkup(secs, uid) : '';
    const checklistLink = d.checklist_remaining > 0
      ? `<p style="margin-top:0.6rem;"><a href="#" onclick="event.preventDefault();loadSpeechBubble('lets-go.php?bedtime_choice=checklist')" style="font-size:0.78em;color:#8b7355;">${d.checklist_remaining} prep step${d.checklist_remaining === 1 ? '' : 's'} left — do ${d.checklist_remaining === 1 ? 'it' : 'them'}</a></p>`
      : '';
    c.innerHTML = `
      <p style="font-size:0.75em;color:#aaa;margin-bottom:0.35rem;text-transform:uppercase;letter-spacing:0.05em;">wind down &middot; ${esc(cat)}</p>
      <p style="margin-bottom:0.85rem;line-height:1.5;">${esc(d.text)}</p>
      ${hourglass}
      <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:0.6rem;">
        <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Try another</button>
        <button class="action-button" onclick="_winddownNotForMe(${d.prompt_id}, ${d.is_custom ? 'true' : 'false'})">Not for me</button>
        <button class="action-button" id="winddown-done-btn" style="background:transparent;color:#888;border:1px solid #ccc;${secs ? 'visibility:hidden;' : ''}" onclick="_winddownDone()">Done</button>
      </div>
      ${checklistLink}`;
    if (secs) armHourglass(secs, uid, 'winddown-done-btn');
    window._winddownDone = function() { earnPip(); loadSpeechBubble('lets-go.php'); };
    window._winddownNotForMe = function(promptId, isCustom) {
      const action = isCustom ? 'delete_custom' : 'disable';
      fetch('api/regulation_prompt.php', {method:'POST', headers:{'Content-Type':'application/json'},
        body: JSON.stringify({action, id: promptId})})
        .then(() => loadSpeechBubble('lets-go.php'));
    };
  }

  function renderGentlePuzzle(d) {
    const checklistLink = d.checklist_remaining > 0
      ? `<p style="margin-top:0.6rem;"><a href="#" onclick="event.preventDefault();loadSpeechBubble('lets-go.php?bedtime_choice=checklist')" style="font-size:0.78em;color:#8b7355;">${d.checklist_remaining} prep step${d.checklist_remaining === 1 ? '' : 's'} left — do ${d.checklist_remaining === 1 ? 'it' : 'them'}</a></p>`
      : '';
    const swatchesHtml = d.swatches.map(s => `
      <div class="puzzle-swatch" data-id="${s.id}" style="width:15%;aspect-ratio:1;border-radius:8px;background:${s.color};cursor:pointer;box-shadow:0 1px 3px rgba(0,0,0,0.15);"></div>
    `).join('');
    c.innerHTML = `
      <p style="font-size:0.75em;color:#aaa;margin-bottom:0.35rem;text-transform:uppercase;letter-spacing:0.05em;">wind down &middot; sort the shades</p>
      <p style="margin-bottom:0.7rem;line-height:1.5;">Tap the shades in order, lightest to darkest. No rush.</p>
      <div id="puzzle-swatches" style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:0.8rem;">${swatchesHtml}</div>
      <div style="display:flex;gap:6px;flex-wrap:wrap;">
        <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Try another</button>
        <button class="action-button" id="puzzle-done-btn" style="background:transparent;color:#888;border:1px solid #ccc;visibility:hidden;" onclick="_puzzleDone()">Done</button>
      </div>
      ${checklistLink}`;
    let nextExpected = 0;
    const total = d.swatches.length;
    document.querySelectorAll('.puzzle-swatch').forEach(el => {
      el.addEventListener('click', function() {
        const id = parseInt(this.dataset.id, 10);
        if (id !== nextExpected) {
          this.style.transition = 'transform 0.15s';
          this.style.transform = 'scale(0.92)';
          setTimeout(() => { this.style.transform = ''; }, 150);
          return;
        }
        this.style.outline = '2px solid rgba(255,255,255,0.6)';
        this.style.cursor = 'default';
        this.style.pointerEvents = 'none';
        nextExpected++;
        if (nextExpected >= total) {
          const doneBtn = document.getElementById('puzzle-done-btn');
          if (doneBtn) doneBtn.style.visibility = '';
        }
      });
    });
    window._puzzleDone = function() { earnPip(); loadSpeechBubble('lets-go.php'); };
  }

  function renderHouseTask(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#7a9e7a;letter-spacing:0.05em;margin-bottom:0.4rem;">HOUSE RESET</p>
      <p style="margin-bottom:0.75rem;">${esc(d.title)}</p>
      <button class="action-button" onclick="houseTaskDone('${d.task_id}')">Done</button>
      <button class="action-button" style="margin-top:0.4rem;background:#888;" onclick="loadSpeechBubble('lets-go.php')">Not now</button>`;
  }

  function renderRoomScan(d) {
    const existing = d.existing || [];
    const existingHtml = existing.length ? `
      <div style="font-size:0.71em;text-transform:uppercase;letter-spacing:0.08em;color:#aaa;
                  margin-bottom:0.3rem;padding-bottom:3px;border-bottom:1px solid #f0f0f0;">
        Already logged (${existing.length}) &mdash; no need to re-add these
      </div>
      <div style="margin-bottom:0.75rem;max-height:130px;overflow-y:auto;">
        ${existing.map(o => `
          <div style="padding:2px 0;font-size:0.82em;color:#888;display:flex;gap:6px;">
            <span style="flex:1;">${esc(o.label)}</span>
            ${o.location ? `<span style="color:#bbb;white-space:nowrap;">${esc(o.location)}</span>` : ''}
          </div>`).join('')}
      </div>` : '';

    const rowStyle = 'display:flex;gap:6px;margin-bottom:0.45rem;';
    const labelStyle = 'flex:2;box-sizing:border-box;font-size:0.9rem;padding:0.45rem 0.65rem;border:1px solid #ccc;border-radius:6px;font-family:inherit;';
    const locStyle   = 'flex:1;box-sizing:border-box;font-size:0.9rem;padding:0.45rem 0.65rem;border:1px solid #ccc;border-radius:6px;font-family:inherit;color:#666;';
    const rows = [1,2,3,4,5].map(n => `
      <div style="${rowStyle}">
        <input type="text" class="scan-label" style="${labelStyle}" placeholder="What is it?${n===1?' e.g. library book':''}"${n===1?' autofocus':''}>
        <input type="text" class="scan-loc"   style="${locStyle}"   placeholder="Where?${n===1?' e.g. on the table':''}">
      </div>`).join('');

    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.35rem;">Room scan</p>
      <p style="margin-bottom:0.85rem;">Look around your <strong>${esc(d.room_label)}</strong>. What's out and waiting for you?</p>
      ${existingHtml}
      ${rows}
      <p style="font-size:0.75em;color:#bbb;margin:0.1rem 0 0.75rem;">Up to 5 items. Location is optional but helps.</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" id="scan-submit-btn">Log these</button>
        <button class="action-button" style="background:transparent;color:#888;border:1px solid #ddd;"
          onclick="loadSpeechBubble('lets-go.php')">Skip</button>
      </div>
      <p id="scan-status" class="muted" style="margin-top:0.5rem;min-height:1em;font-size:0.85em;"></p>`;

    document.getElementById('scan-submit-btn').addEventListener('click', function() {
      const labels = Array.from(c.querySelectorAll('.scan-label'));
      const locs   = Array.from(c.querySelectorAll('.scan-loc'));
      const items  = labels.map((el, i) => ({label: el.value.trim(), location: locs[i].value.trim()}))
                           .filter(it => it.label !== '');
      const status = document.getElementById('scan-status');
      if (!items.length) { status.textContent = 'Add at least one item.'; return; }
      this.disabled = true;
      fetch('api/room_scan.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({room_id: d.room_id, items}),
      })
      .then(r => r.json())
      .then(data => {
        if (data.ok) {
          c.innerHTML = `
            <p style="margin-bottom:0.75rem;">${data.added} item${data.added === 1 ? '' : 's'} logged. They'll come up for triage in the next few activities.</p>
            <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
        } else {
          status.textContent = data.error || 'Something went wrong.';
          document.getElementById('scan-submit-btn').disabled = false;
        }
      })
      .catch(() => {
        status.textContent = 'Could not save — try again.';
        document.getElementById('scan-submit-btn').disabled = false;
      });
    });
  }

  function renderPhysicalObjectTriage(d) {
    function postTriage(payload) {
      return fetch('api/physical_object_triage.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload),
      }).then(r => r.json());
    }

    const locationHint = d.location
      ? `<p style="font-size:0.85em;color:#999;margin:-0.5rem 0 1rem;">${esc(d.location)}</p>`
      : '';

    function showInitial() {
      c.innerHTML = `
        <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">What's this doing out?</p>
        <p style="font-weight:600;margin-bottom:0.3rem;">${esc(d.label)}</p>
        ${locationHint}
        <div style="display:flex;flex-direction:column;gap:7px;">
          <button class="action-button" id="obj-for-task" style="text-align:left;">It's out for a task</button>
          <button class="action-button" id="obj-find-home" style="text-align:left;">It needs a home</button>
          <button class="action-button" id="obj-put-away" style="text-align:left;background:transparent;color:#888;border:1px solid #ddd;">Just put it away</button>
        </div>`;
      document.getElementById('obj-for-task').addEventListener('click', showTaskInput);
      document.getElementById('obj-find-home').addEventListener('click', () => {
        postTriage({object_id: d.id, action: 'find_home'}).then(data => {
          if (data.ok) {
            c.innerHTML = `<p style="margin-bottom:0.75rem;">Task added: find it a home.</p>
              <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
          }
        });
      });
      document.getElementById('obj-put-away').addEventListener('click', () => {
        postTriage({object_id: d.id, action: 'put_away'}).then(() => loadSpeechBubble('lets-go.php'));
      });
    }

    function showTaskInput() {
      c.innerHTML = `
        <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">What task is it for?</p>
        <p style="color:#888;font-size:0.9em;margin-bottom:0.75rem;">${esc(d.label)}</p>
        <input id="obj-task-title" type="text"
          style="width:100%;box-sizing:border-box;font-size:1rem;padding:0.5rem 0.75rem;border:1px solid #ccc;border-radius:6px;margin-bottom:0.6rem;font-family:inherit;"
          placeholder="Name the task…" autofocus>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
          <button class="action-button" id="obj-link-btn">Create task</button>
          <button class="action-button" style="background:transparent;color:#888;border:1px solid #ddd;"
            onclick="loadSpeechBubble('lets-go.php')">Skip</button>
        </div>
        <p id="obj-status" class="muted" style="margin-top:0.5rem;min-height:1em;font-size:0.85em;"></p>`;
      const input  = document.getElementById('obj-task-title');
      const status = document.getElementById('obj-status');
      document.getElementById('obj-link-btn').addEventListener('click', submit);
      input.addEventListener('keydown', e => { if (e.key === 'Enter') submit(); });

      function submit() {
        const title = input.value.trim();
        if (!title) { status.textContent = 'Enter a task name.'; return; }
        document.getElementById('obj-link-btn').disabled = true;
        postTriage({object_id: d.id, action: 'link_task', task_title: title}).then(data => {
          if (data.ok) {
            c.innerHTML = `<p style="margin-bottom:0.75rem;">Task added to your list.</p>
              <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
          } else {
            status.textContent = data.error || 'Something went wrong.';
            document.getElementById('obj-link-btn').disabled = false;
          }
        });
      }
    }

    showInitial();
  }

  function renderMorningDaily(d) {
    if (d.looped) skippedDailyIds = [];
    const labels = { morning: 'MORNING ROUTINE', day: 'TODAY', evening: 'EVENING ROUTINE' };
    const label  = labels[d.horizon] || 'MORNING ROUTINE';
    const notesHtml = d.notes
      ? `<p style="font-size:0.85em;color:#888;margin:0 0 0.75rem;">${esc(d.notes)}</p>`
      : '';
    let subtasksHtml = '';
    if (d.subtasks && d.subtasks.length > 0) {
      const rows = d.subtasks.map(s =>
        `<div class="daily-sub-row" style="display:flex;align-items:flex-start;gap:8px;padding:0.3rem 0;border-bottom:1px solid rgba(0,0,0,0.06);">
          <span style="flex:1;line-height:1.4;font-size:0.9em;">${esc(s.title)}</span>
          <button class="action-button" style="flex-shrink:0;padding:0.15rem 0.55rem;font-size:0.78em;"
            onclick="window._dailySubDone(${d.id}, this)">Done</button>
        </div>`
      ).join('');
      subtasksHtml = `<div id="daily-sub-list" style="margin:0.1rem 0 0.7rem;">${rows}</div>`;
    }
    const countHtml = d.remaining > 1
      ? `<p style="font-size:0.78em;color:#999;margin-top:0.5rem;">${d.remaining - 1} more after this</p>`
      : '';
    c.innerHTML = `
      <p style="font-size:0.75em;color:#b8860b;letter-spacing:0.05em;margin-bottom:0.4rem;">${label}</p>
      <p style="margin-bottom:0.5rem;">${esc(d.title)}</p>
      ${notesHtml}
      ${subtasksHtml}
      <button class="action-button" onclick="scoreMorningDaily(${d.id})">Done</button>
      <button class="action-button" style="margin-top:0.4rem;background:#888;" onclick="skipMorningDaily(${d.id})">Skip for now</button>
      ${countHtml}`;

    window._dailySubDone = function(dailyId, btn) {
      const row = btn.closest('.daily-sub-row');
      btn.disabled = true;
      row.style.opacity = '0.4';
      setTimeout(() => {
        row.remove();
        if (!document.querySelector('#daily-sub-list .daily-sub-row')) {
          scoreMorningDaily(dailyId);
        }
      }, 300);
    };
  }

  function renderMorningDone(d) {
    c.innerHTML = `
      <p style="line-height:1.6;margin-bottom:0.75rem;">${esc(d.message || 'Morning routine complete. The day is yours.')}</p>
      <button class="action-button" onclick="window.location.reload()">Let's go</button>`;
  }

  function renderInboxMilestone(d) {
    c.innerHTML = `
      <p style="line-height:1.6;margin-bottom:0.75rem;">${esc(d.message)}</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Keep going</button>`;
  }

  function renderTriage(d) {
    const question  = d.question || 'actionable';
    const label     = d.source === 'fill' ? 'Quick question' : 'Inbox';
    const questions = {
      actionable: 'Is this still something you need to do?',
      duration:   'Roughly how long does this take?',
      first_step: 'Is there a quick 2-minute step that moves this forward?',
      energy:     'How much energy does this take?',
      urgency:    'How urgent is this?',
      importance: 'How much does this actually matter to you?',
    };
    const itemsHtml = (d.items && d.items.length > 0)
      ? `<ul style="margin:0 0 0.6rem 0;padding-left:1.2rem;font-size:0.88em;color:#555;line-height:1.5;">${d.items.map(i => `<li>${esc(i)}</li>`).join('')}</ul>`
      : '';
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.3rem;">${label}</p>
      <p style="font-weight:600;line-height:1.4;margin-bottom:0.25rem;">${esc(d.title)}</p>
      ${itemsHtml}<p style="font-weight:500;color:#555;margin-bottom:0.75rem;font-size:0.95em;">${esc(questions[question] || '')}</p>
      <div id="triage-actions" style="display:flex;flex-direction:column;gap:8px;"></div>
      <p id="triage-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>`;

    const el        = document.getElementById('triage-actions');
    const setStatus = s => { document.getElementById('triage-status').textContent = s; };

    function mkBtn(label, onClick, style) {
      const b = document.createElement('button');
      b.className = 'action-button';
      b.style.cssText = 'width:100%;' + (style || '');
      b.textContent = label;
      b.addEventListener('click', onClick);
      return b;
    }

    function save(body) {
      el.querySelectorAll('button').forEach(b => b.disabled = true);
      setStatus('Saving…');
      body.task_id = d.id;
      fetch('api/triage.php', {
        method: 'POST', headers: {'Content-Type':'application/json'},
        body: JSON.stringify(body),
      }).then(r => r.json()).then(data => {
        if (data.ok) {
          if (data.pip) {
            updateProgressBar(data.pip.pages, data.pip.pages_target, data.pip.total_pages);
            if (data.pip.newStoryPage && typeof window.refreshScene === 'function') window.refreshScene();
          }
          setTimeout(() => loadSpeechBubble('lets-go.php'), 350);
        }
        else { setStatus(data.error || 'Could not save.'); el.querySelectorAll('button').forEach(b => b.disabled = false); }
      }).catch(() => { setStatus('Network error.'); el.querySelectorAll('button').forEach(b => b.disabled = false); });
    }

    if (question === 'actionable') {
      el.append(
        mkBtn("Yes — quick win", () => save({action:'quick_win'})),
        mkBtn("Yes — it's a call", () => save({action:'phone_call'}),
          'background:#e3f2fd;color:#1565c0;border:1.5px solid #90caf9;'),
        mkBtn("Yes — needs scheduling", () => save({action:'mark_actionable'})),
        mkBtn("Already done!", () => {
          el.querySelectorAll('button').forEach(b => b.disabled = true);
          setStatus('Marking done…');
          fetch(`api/mark_complete.api.php?task_id=${d.id}`)
            .then(r => r.json())
            .then(res => { if (res.success) updateProgressBar(res.pages, res.pages_target, res.total_pages); })
            .finally(() => setTimeout(() => loadSpeechBubble('lets-go.php'), 300));
        }, 'background:#4caf50;'),
        mkBtn("Waiting on someone", () => {
          el.innerHTML = '';
          renderWaitingSubform(el, d.people || [], (personId, when) => {
            save({action: 'waiting_start', person_id: personId, when});
          });
        }, 'background:transparent;color:#553c87;border:1.5px solid #553c87;'),
        mkBtn("File as reference", () => save({action:'reference'}),
          'background:transparent;color:#8a7a5a;border:1.5px solid #8a7a5a;'),
        mkBtn("Someday", () => save({action:'someday'}),
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);'),
        mkBtn("Delete it", () => save({action:'delete'}),
          'background:transparent;color:#c0392b;border:1.5px solid #c0392b;')
      );

    } else if (question === 'duration') {
      el.append(
        mkBtn("Less than 5 mins",  () => save({action:'save_time', time:5})),
        mkBtn("10–15 mins",        () => save({action:'save_time', time:15})),
        mkBtn("30–60 mins",        () => save({action:'save_time', time:60})),
        mkBtn("A few hours",       () => save({action:'save_time', time:120}))
      );

    } else if (question === 'first_step') {
      const inp = document.createElement('input');
      inp.type = 'text';
      inp.placeholder = 'e.g. Look up the number';
      inp.style.cssText = 'width:100%;box-sizing:border-box;margin-bottom:0.4rem;';
      const addBtn = mkBtn("Add as first step (save as project)", () => {
        const firstStep = inp.value.trim();
        if (!firstStep) { setStatus('Type a first step first.'); return; }
        save({action:'project', first_step: firstStep});
      });
      el.append(inp, addBtn,
        mkBtn("No first step — just add it to my list", () => save({action:'next_action'}),
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);'));
      inp.focus();
      inp.addEventListener('keydown', e => { if (e.key === 'Enter') addBtn.click(); });

    } else if (question === 'energy') {
      const skipStyle = 'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);';
      el.append(
        mkBtn("Low — can do it when tired",        () => save({action:'save_energy', energy:'low'})),
        mkBtn("Medium — need to be reasonably on", () => save({action:'save_energy', energy:'medium'})),
        mkBtn("High — needs my best brain",        () => save({action:'save_energy', energy:'high'})),
        mkBtn("Doesn't matter",                    () => save({action:'save_energy', energy:' '}), skipStyle)
      );

    } else if (question === 'urgency') {
      const skipStyle = 'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);';
      el.append(
        mkBtn("Today or the next few days", () => save({action:'save_urgency', urgency:'high'})),
        mkBtn("Next few weeks",             () => save({action:'save_urgency', urgency:'medium'})),
        mkBtn("Later",                      () => save({action:'save_urgency', urgency:'low'})),
        mkBtn("Not sure — skip for now",    () => save({action:'save_urgency', urgency:'medium'}), skipStyle)
      );

    } else if (question === 'importance') {
      const skipStyle = 'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);';
      el.append(
        mkBtn("High — moves something that really matters",     () => save({action:'save_importance', importance:'high'})),
        mkBtn("Medium — worth doing, not a big deal either way", () => save({action:'save_importance', importance:'medium'})),
        mkBtn("Low — minor, wouldn't lose sleep over it",       () => save({action:'save_importance', importance:'low'})),
        mkBtn("Not sure — skip for now",                        () => save({action:'save_importance', importance:'medium'}), skipStyle),
        mkBtn("You know what — delete it",                      () => save({action:'delete'}),
          'background:transparent;color:#c0392b;border:1.5px solid #c0392b;')
      );
    }
  }

  function renderPersonReview(d) {
    const hasQ = d.char1 && d.char2 && d.char3;

    function relDate(s) {
      if (!s) return '';
      const diff = Math.floor((Date.now() - new Date(s).getTime()) / 86400000);
      if (diff === 0) return 'Today';
      if (diff === 1) return 'Yesterday';
      if (diff < 7)  return diff + ' days ago';
      const wk = Math.floor(diff / 7);
      if (diff < 30) return wk + ' week' + (wk > 1 ? 's' : '') + ' ago';
      return s.slice(0, 10);
    }

    function noteItemHtml(n) {
      return `
          <div class="pr-note-item" data-note-id="${n.note_id}" style="padding:3px 0;border-bottom:1px solid #f5f5f5;">
            <p class="pr-note-text" style="margin:0 0 1px;font-size:0.84em;line-height:1.4;">${esc(n.contents)}</p>
            <div style="display:flex;align-items:center;gap:8px;">
              <span style="font-size:0.75em;color:#bbb;">${relDate(n.date_added)}</span>
              <button type="button" style="background:none;border:none;padding:0;font-size:0.72em;color:#aaa;cursor:pointer;"
                onclick="window._prEditNote(${n.note_id})">edit</button>
              <button type="button" style="background:none;border:none;padding:0;font-size:0.72em;color:#c0392b;cursor:pointer;"
                onclick="window._prDeleteNote(${n.note_id})">delete</button>
            </div>
          </div>`;
    }

    const existingNotes = d.recent_notes || [];
    const notesListHtml = existingNotes.length
      ? existingNotes.map(noteItemHtml).join('')
      : '<p style="color:#ccc;font-size:0.83em;margin:0 0 0.4rem;">No notes yet.</p>';

    const notesSection = `
      <div style="font-size:0.71em;text-transform:uppercase;letter-spacing:0.08em;color:#aaa;
                  margin-bottom:0.45rem;padding-bottom:3px;border-bottom:1px solid #f0f0f0;">Notes</div>
      <div id="pr-notes-list" style="margin-bottom:0.4rem;">${notesListHtml}</div>
      <div style="display:flex;gap:6px;margin-bottom:0.35rem;">
        <textarea id="pr-note" placeholder="Add a note…" rows="2"
          style="flex:1;resize:vertical;font-size:0.88em;"></textarea>
        <button class="action-button"
          style="flex-shrink:0;align-self:flex-end;padding:5px 10px;font-size:0.82em;"
          onclick="window._prSaveNote()">Save</button>
      </div>
      <p id="pr-note-status" class="muted" style="font-size:0.82em;min-height:1em;margin-bottom:0.3rem;"></p>`;

    const existingTasks = d.tasks || [];
    const tasksSection = existingTasks.length ? `
      <div style="font-size:0.71em;text-transform:uppercase;letter-spacing:0.08em;color:#aaa;
                  margin-bottom:0.3rem;padding-bottom:3px;border-bottom:1px solid #f0f0f0;">Tasks (${existingTasks.length})</div>
      <div style="margin-bottom:0.4rem;">
        ${existingTasks.map(t => `
          <div style="padding:3px 0;border-bottom:1px solid #f5f5f5;display:flex;align-items:center;gap:6px;">
            <span style="flex:1;font-size:0.85em;">${esc(t.title)}</span>
            ${t.urgency === 'high' ? '<span style="font-size:0.72em;color:#c0392b;">high</span>' : ''}
          </div>`).join('')}
      </div>` : '';

    const intervalChoices = [
      [2,  'Every 2 days — household'],
      [7,  'Weekly — close friends'],
      [14, 'Fortnightly — church/regular'],
      [30, 'Monthly — active acquaintances'],
      [90, 'Quarterly — distant/extended family'],
    ];
    const intervalOpts = intervalChoices.map(([n, label]) =>
      `<option value="${n}" ${d.review_interval === n ? 'selected' : ''}>${label}</option>`
    ).join('');
    const freqRow = `
      <div style="display:flex;align-items:center;gap:6px;margin-bottom:0.6rem;font-size:0.85em;flex-wrap:wrap;">
        <span style="color:#888;">Check in every</span>
        <select id="pr-interval" style="padding:3px 6px;border:1px solid #ccc;border-radius:5px;font-size:0.95em;">${intervalOpts}</select>
      </div>`;
    const archiveBtn = `<button onclick="window._prArchive()"
      style="font-size:0.78em;background:transparent;color:#aaa;border:1px solid #ddd;
             padding:3px 10px;border-radius:6px;cursor:pointer;margin-top:0.4rem;">
      Archive this friendship</button>`;

    const taskRow = `
      <div style="display:flex;gap:6px;margin-bottom:0.4rem;">
        <input id="pr-task-title" type="text" placeholder="Task for ${esc(d.name)}…" style="flex:1;font-size:0.88em;">
        <button class="action-button" style="flex-shrink:0;padding:5px 10px;font-size:0.82em;"
          onclick="window._prAddTask()">Add</button>
      </div>
      <p id="pr-task-status" class="muted" style="font-size:0.82em;min-height:1em;margin-bottom:0.3rem;"></p>`;

    if (hasQ) {
      c.innerHTML = `
        <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">People</p>
        <p style="line-height:1.5;margin-bottom:0.6rem;">
          <strong>${esc(d.name)}</strong> is ${esc(d.char1)}, ${esc(d.char2)} and ${esc(d.char3)}.
        </p>
        <div id="pr-edit-form" style="display:none;margin-bottom:0.5rem;">
          <input id="pr-char1" type="text" placeholder="Quality 1" value="${esc(d.char1)}" style="margin-bottom:0.3rem;">
          <input id="pr-char2" type="text" placeholder="Quality 2" value="${esc(d.char2)}" style="margin-bottom:0.3rem;">
          <input id="pr-char3" type="text" placeholder="Quality 3" value="${esc(d.char3)}" style="margin-bottom:0.4rem;">
        </div>
        ${notesSection}
        ${tasksSection}
        ${taskRow}
        ${freqRow}
        <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:0.4rem;">
          <button class="action-button" onclick="window._prDone()">Still true</button>
          <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
            onclick="window._prEdit()">Update qualities</button>
        </div>
        <p id="pr-status" class="muted" style="font-size:0.82em;min-height:1em;"></p>
        ${archiveBtn}`;
    } else {
      c.innerHTML = `
        <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">People</p>
        <p style="margin-bottom:0.6rem;">What are three things you genuinely like about <strong>${esc(d.name)}</strong>? Keep it positive.</p>
        <input id="pr-char1" type="text" placeholder="Quality 1" style="margin-bottom:0.3rem;">
        <input id="pr-char2" type="text" placeholder="Quality 2" style="margin-bottom:0.3rem;">
        <input id="pr-char3" type="text" placeholder="Quality 3" style="margin-bottom:0.5rem;">
        ${notesSection}
        ${tasksSection}
        ${taskRow}
        ${freqRow}
        <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:0.4rem;">
          <button class="action-button" onclick="window._prDone()">Save</button>
          <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
            onclick="loadSpeechBubble('lets-go.php')">Skip</button>
        </div>
        <p id="pr-status" class="muted" style="font-size:0.82em;min-height:1em;"></p>
        ${archiveBtn}`;
      document.getElementById('pr-char1').focus();
    }

    document.getElementById('pr-task-title').addEventListener('keydown', e => {
      if (e.key === 'Enter') window._prAddTask();
    });

    window._prEdit = function() {
      const form = document.getElementById('pr-edit-form');
      form.style.display = form.style.display === 'none' ? 'block' : 'none';
    };

    window._prSaveNote = function() {
      const textarea = document.getElementById('pr-note');
      const status   = document.getElementById('pr-note-status');
      const contents = textarea.value.trim();
      if (!contents) return;
      textarea.disabled = true;
      status.textContent = 'Saving…';
      fetch('api/person_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ person_id: d.person_id, action: 'add_note', note_content: contents }),
      }).then(r => r.json()).then(res => {
        if (res.ok) {
          const list    = document.getElementById('pr-notes-list');
          const noNotes = list.querySelector('p');
          if (noNotes) list.innerHTML = '';
          const wrap = document.createElement('div');
          wrap.innerHTML = noteItemHtml({ note_id: res.note_id, contents, date_added: new Date().toISOString() }).trim();
          list.insertBefore(wrap.firstElementChild, list.firstChild);
          textarea.value = '';
          status.textContent = '';
        } else {
          status.textContent = res.error || 'Could not save.';
        }
        textarea.disabled = false;
      }).catch(() => {
        status.textContent = 'Network error.';
        textarea.disabled = false;
      });
    };

    window._prEditNote = function(noteId) {
      const item = document.querySelector(`.pr-note-item[data-note-id="${noteId}"]`);
      if (!item) return;
      const current  = item.querySelector('.pr-note-text').textContent;
      item.dataset.original = item.innerHTML;
      item.innerHTML = `
        <textarea class="pr-note-edit" rows="2" style="width:100%;box-sizing:border-box;font-size:0.84em;margin-bottom:4px;">${esc(current)}</textarea>
        <div style="display:flex;gap:8px;">
          <button type="button" class="action-button" style="padding:3px 8px;font-size:0.78em;"
            onclick="window._prSaveNoteEdit(${noteId})">Save</button>
          <button type="button" style="background:none;border:none;padding:0;font-size:0.78em;color:#aaa;cursor:pointer;"
            onclick="window._prCancelNoteEdit(${noteId})">Cancel</button>
        </div>`;
      item.querySelector('textarea').focus();
    };

    window._prCancelNoteEdit = function(noteId) {
      const item = document.querySelector(`.pr-note-item[data-note-id="${noteId}"]`);
      if (!item || !item.dataset.original) return;
      item.innerHTML = item.dataset.original;
    };

    window._prSaveNoteEdit = function(noteId) {
      const item = document.querySelector(`.pr-note-item[data-note-id="${noteId}"]`);
      if (!item) return;
      const textarea = item.querySelector('.pr-note-edit');
      const contents = textarea.value.trim();
      if (!contents) return;
      textarea.disabled = true;
      fetch('api/person_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ person_id: d.person_id, action: 'edit_note', note_id: noteId, note_content: contents }),
      }).then(r => r.json()).then(res => {
        if (res.ok) {
          const wrap = document.createElement('div');
          wrap.innerHTML = noteItemHtml({ note_id: noteId, contents, date_added: new Date().toISOString() }).trim();
          item.replaceWith(wrap.firstElementChild);
        } else {
          textarea.disabled = false;
        }
      }).catch(() => { textarea.disabled = false; });
    };

    window._prDeleteNote = function(noteId) {
      if (!confirm('Delete this note?')) return;
      const item = document.querySelector(`.pr-note-item[data-note-id="${noteId}"]`);
      fetch('api/person_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ person_id: d.person_id, action: 'delete_note', note_id: noteId }),
      }).then(r => r.json()).then(res => {
        if (res.ok && item) {
          item.remove();
          const list = document.getElementById('pr-notes-list');
          if (list && !list.children.length) {
            list.innerHTML = '<p style="color:#ccc;font-size:0.83em;margin:0 0 0.4rem;">No notes yet.</p>';
          }
        }
      });
    };

    window._prAddTask = function() {
      const input  = document.getElementById('pr-task-title');
      const status = document.getElementById('pr-task-status');
      const title  = input.value.trim();
      if (!title) return;
      input.disabled = true;
      status.textContent = 'Adding…';
      fetch('api/add_task.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ title, person_id: d.person_id, task_type: 'next_action', urgency: 'medium' }),
      }).then(r => r.json()).then(res => {
        if (res.ok) {
          input.value = '';
          status.textContent = 'Added.';
          setTimeout(() => { status.textContent = ''; }, 2000);
        } else {
          status.textContent = res.error || 'Could not add task.';
        }
        input.disabled = false;
      }).catch(() => {
        status.textContent = 'Network error.';
        input.disabled = false;
      });
    };

    window._prDone = function() {
      const status   = document.getElementById('pr-status');
      const char1    = (document.getElementById('pr-char1')?.value ?? '').trim() || d.char1 || '';
      const char2    = (document.getElementById('pr-char2')?.value ?? '').trim() || d.char2 || '';
      const char3    = (document.getElementById('pr-char3')?.value ?? '').trim() || d.char3 || '';
      const note     = (document.getElementById('pr-note')?.value ?? '').trim();
      const interval = parseInt(document.getElementById('pr-interval').value) || d.review_interval;
      document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = true);
      status.textContent = 'Saving…';
      fetch('api/person_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({person_id: d.person_id, action: 'update_qualities',
                              char1, char2, char3, life_note: note, review_interval: interval}),
      }).then(r => r.json()).then(res => {
        if (res.ok) {
          earnPip();
          if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
        } else {
          status.textContent = res.error || 'Could not save.';
          document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = false);
        }
      }).catch(() => {
        status.textContent = 'Network error.';
        document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = false);
      });
    };

    window._prArchive = function() {
      if (!confirm(esc(d.name) + ' will be archived — they won\'t come up for review but stay in your contacts. OK?')) return;
      fetch('api/person_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({person_id: d.person_id, action: 'archive'}),
      }).then(() => loadSpeechBubble('lets-go.php'))
        .catch(() => loadSpeechBubble('lets-go.php'));
    };
  }

  function renderEventPrebrief(d) {
    const notes = d.recent_notes || [];
    const notesHtml = notes.length ? `
      <div style="font-size:0.72em;color:#aaa;text-transform:uppercase;letter-spacing:0.05em;margin:0.6rem 0 0.3rem;">Worth remembering</div>
      <div style="margin-bottom:0.5rem;">
        ${notes.map(n => `<p style="margin:0 0 4px;font-size:0.85em;line-height:1.4;color:#666;">${esc(n.contents)}</p>`).join('')}
      </div>` : '';

    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Before you go</p>
      <p style="line-height:1.5;margin-bottom:0.5rem;">You're seeing <strong>${esc(d.name)}</strong> today — ${esc(d.task_title)}.</p>
      ${notesHtml}
      <p style="font-weight:500;color:#555;margin:0.5rem 0 0.6rem;font-size:0.95em;">How are you going into it?</p>
      <div id="eb-energy-opts" style="display:flex;flex-direction:column;gap:7px;"></div>
      <button class="action-button" style="background:transparent;color:#888;border:1px solid #ddd;margin-top:0.6rem;"
        onclick="loadSpeechBubble('lets-go.php')">Skip</button>
      <p id="eb-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>`;

    const opts = [[1, 'Exhausted'], [2, 'Low'], [3, 'Okay'], [4, 'Good'], [5, 'On fire']];
    const wrap = document.getElementById('eb-energy-opts');
    opts.forEach(([val, label]) => {
      const b = document.createElement('button');
      b.className = 'action-button';
      b.style.cssText = 'width:100%;text-align:left;';
      b.textContent = label;
      b.addEventListener('click', () => {
        wrap.querySelectorAll('button').forEach(x => x.disabled = true);
        document.getElementById('eb-status').textContent = 'Saving…';
        fetch('api/event_checkin.php', {
          method: 'POST', headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({action: 'prebrief', task_id: d.task_id, person_id: d.person_id, energy: val}),
        }).then(r => r.json()).then(res => {
          if (res.ok) {
            earnPip();
            if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
          } else {
            document.getElementById('eb-status').textContent = res.error || 'Could not save.';
            wrap.querySelectorAll('button').forEach(x => x.disabled = false);
          }
        }).catch(() => {
          document.getElementById('eb-status').textContent = 'Network error.';
          wrap.querySelectorAll('button').forEach(x => x.disabled = false);
        });
      });
      wrap.appendChild(b);
    });
  }

  function renderEventDebrief(d) {
    function relDate(s) {
      if (!s) return 'recently';
      const diff = Math.floor((Date.now() - new Date(s + 'T00:00:00').getTime()) / 86400000);
      if (diff <= 0) return 'today';
      if (diff === 1) return 'yesterday';
      return diff + ' days ago';
    }

    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Debrief</p>
      <p style="line-height:1.5;margin-bottom:0.75rem;">You saw <strong>${esc(d.name)}</strong> ${relDate(d.event_date)} — ${esc(d.task_title)}.</p>

      <p style="font-size:0.88em;color:#555;margin-bottom:0.3rem;">Did you commit to doing anything for them?</p>
      <div style="display:flex;gap:6px;margin-bottom:0.3rem;">
        <input id="eb-commit" type="text" placeholder="What did you commit to?" style="flex:1;font-size:0.88em;">
        <button class="action-button" style="flex-shrink:0;padding:5px 10px;font-size:0.82em;" onclick="window._ebAddTask()">Add</button>
      </div>
      <p id="eb-commit-status" class="muted" style="font-size:0.8em;min-height:1em;margin-bottom:0.5rem;"></p>

      <p style="font-size:0.88em;color:#555;margin-bottom:0.3rem;">Did you learn anything new about them?</p>
      <div style="display:flex;gap:6px;margin-bottom:0.3rem;">
        <input id="eb-note" type="text" placeholder="What did you learn?" style="flex:1;font-size:0.88em;">
        <button class="action-button" style="flex-shrink:0;padding:5px 10px;font-size:0.82em;" onclick="window._ebAddNote()">Save</button>
      </div>
      <p id="eb-note-status" class="muted" style="font-size:0.8em;min-height:1em;margin-bottom:0.5rem;"></p>

      <div id="eb-notice-qs" style="margin-bottom:0.6rem;"></div>

      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" onclick="window._ebDone()">Done</button>
        <button class="action-button" style="background:transparent;color:#888;border:1px solid #ddd;"
          onclick="loadSpeechBubble('lets-go.php')">Skip</button>
      </div>
      <p id="eb-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>`;

    // Noticing questions — tap only, no storage. The value is in being asked, not the log.
    const noticeQs = [
      'Did they seem tired, distracted, or off today?',
      "Was there a moment they wanted to say something but didn't get to?",
    ];
    const noticeWrap = document.getElementById('eb-notice-qs');
    noticeQs.forEach(q => {
      const row = document.createElement('div');
      row.style.cssText = 'margin-bottom:0.5rem;';
      const qP = document.createElement('p');
      qP.style.cssText = 'font-size:0.88em;color:#555;margin-bottom:0.3rem;';
      qP.textContent = q;
      const btnRow = document.createElement('div');
      btnRow.style.cssText = 'display:flex;gap:6px;';
      ['Yes', 'No', 'Not sure'].forEach(label => {
        const b = document.createElement('button');
        b.className = 'action-button';
        b.style.cssText = 'padding:4px 10px;font-size:0.82em;min-height:30px;';
        b.textContent = label;
        b.addEventListener('click', () => {
          btnRow.querySelectorAll('button').forEach(x => {
            x.style.opacity = x === b ? '1' : '0.4';
            x.disabled = true;
          });
        });
        btnRow.appendChild(b);
      });
      row.append(qP, btnRow);
      noticeWrap.appendChild(row);
    });

    window._ebAddTask = function() {
      const input  = document.getElementById('eb-commit');
      const status = document.getElementById('eb-commit-status');
      const title  = input.value.trim();
      if (!title) return;
      input.disabled = true;
      status.textContent = 'Adding…';
      fetch('api/add_task.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({title, person_id: d.person_id, task_type: 'next_action', urgency: 'medium'}),
      }).then(r => r.json()).then(res => {
        if (res.ok) {
          input.value = '';
          status.textContent = 'Added.';
          setTimeout(() => { status.textContent = ''; }, 2000);
        } else {
          status.textContent = res.error || 'Could not add task.';
        }
        input.disabled = false;
      }).catch(() => {
        status.textContent = 'Network error.';
        input.disabled = false;
      });
    };

    window._ebAddNote = function() {
      const input  = document.getElementById('eb-note');
      const status = document.getElementById('eb-note-status');
      const note   = input.value.trim();
      if (!note) return;
      input.disabled = true;
      status.textContent = 'Saving…';
      fetch('api/person_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({person_id: d.person_id, action: 'add_note', note_content: note}),
      }).then(r => r.json()).then(res => {
        if (res.ok) {
          input.value = '';
          status.textContent = 'Saved.';
          setTimeout(() => { status.textContent = ''; }, 2000);
        } else {
          status.textContent = res.error || 'Could not save.';
        }
        input.disabled = false;
      }).catch(() => {
        status.textContent = 'Network error.';
        input.disabled = false;
      });
    };

    window._ebDone = function() {
      document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = true);
      document.getElementById('eb-status').textContent = 'Saving…';
      fetch('api/event_checkin.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({action: 'debrief', task_id: d.task_id}),
      }).then(r => r.json()).then(res => {
        if (res.ok) {
          earnPip();
          if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
        } else {
          document.getElementById('eb-status').textContent = res.error || 'Could not save.';
          document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = false);
        }
      }).catch(() => {
        document.getElementById('eb-status').textContent = 'Network error.';
        document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = false);
      });
    };
  }

  function renderWaitingFollowup(d) {
    const who = d.person_name ? ` — waiting on ${esc(d.person_name)}` : '';
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Still waiting?</p>
      <p style="font-weight:600;line-height:1.4;margin-bottom:0.75rem;">${esc(d.title)}${who}</p>
      <div id="wfup-actions" style="display:flex;flex-direction:column;gap:8px;"></div>
      <p id="wfup-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>`;

    const el     = document.getElementById('wfup-actions');
    const status = document.getElementById('wfup-status');

    function respond(response, extra) {
      el.querySelectorAll('button, select').forEach(b => b.disabled = true);
      status.textContent = 'Saving…';
      fetch('api/task_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({task_id: d.task_id, action: 'waiting_followup', response, ...extra}),
      }).then(r => r.json()).then(data => {
        if (data.ok) {
          earnPip();
          if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
        } else {
          status.textContent = data.error || 'Could not save.';
          el.querySelectorAll('button, select').forEach(b => b.disabled = false);
        }
      }).catch(() => {
        status.textContent = 'Network error.';
        el.querySelectorAll('button, select').forEach(b => b.disabled = false);
      });
    }

    const stillRow = document.createElement('div');
    stillRow.style.cssText = 'display:flex;gap:6px;';
    const whenSel = document.createElement('select');
    whenSel.style.cssText = 'flex:1;padding:0.35rem 0.4rem;font-size:0.9rem;border:1px solid #ccc;border-radius:6px;';
    whenSel.innerHTML = `<option value="3d">3 days</option><option value="1w" selected>1 week</option><option value="2w">2 weeks</option><option value="1m">1 month</option>`;
    const stillBtn = document.createElement('button');
    stillBtn.className = 'action-button';
    stillBtn.style.cssText = 'flex-shrink:0;';
    stillBtn.textContent = 'Still waiting';
    stillBtn.addEventListener('click', () => respond('still', {when: whenSel.value}));
    stillRow.append(whenSel, stillBtn);

    const resolvedBtn = document.createElement('button');
    resolvedBtn.className = 'action-button';
    resolvedBtn.style.cssText = 'width:100%;';
    resolvedBtn.textContent = 'Got a response — make it actionable';
    resolvedBtn.addEventListener('click', () => respond('resolved'));

    const cancelBtn = document.createElement('button');
    cancelBtn.className = 'action-button';
    cancelBtn.style.cssText = 'width:100%;background:transparent;color:#c0392b;border:1.5px solid #c0392b;';
    cancelBtn.textContent = 'No longer needed';
    cancelBtn.addEventListener('click', () => respond('cancel'));

    el.append(stillRow, resolvedBtn, cancelBtn);
  }

  function renderBibleVerse(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.5rem;">Verse</p>
      <p style="font-style:italic;line-height:1.65;margin-bottom:0.5rem;">"${esc(d.text)}"</p>
      <p style="font-size:0.85em;color:#aaa;margin-bottom:0.75rem;">— ${esc(d.ref)}</p>
      <button class="action-button" onclick="window._verseRead()">Read it</button>`;
    window._verseRead = function() {
      earnPip();
      if (!maybeAffirm()) loadSpeechBubble('lets-go.php');
    };
  }

  function renderTip(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Tip</p>
      <p style="line-height:1.6;margin-bottom:0.75rem;">${esc(d.text)}</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Got it</button>`;
  }

  function renderQuote(d) {
    c.innerHTML = `
      <p style="font-size:0.72em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.6rem;">A moment</p>
      <p style="font-style:italic;line-height:1.65;margin-bottom:1.2rem;">"${esc(d.text)}"</p>
      <div id="quote-bar-wrap" style="height:3px;background:rgba(255,255,255,0.12);border-radius:2px;overflow:hidden;cursor:pointer;" title="Tap to skip">
        <div id="quote-bar" style="height:100%;width:0%;background:rgba(255,255,255,0.45);transition:width 10s linear;"></div>
      </div>`;

    const advance = () => {
      clearTimeout(quoteTimer);
      loadSpeechBubble('lets-go.php');
    };

    document.getElementById('quote-bar-wrap').addEventListener('click', advance);
    c.addEventListener('click', advance, { once: true });

    // Kick off the bar animation on next frame so the transition fires
    requestAnimationFrame(() => requestAnimationFrame(() => {
      const bar = document.getElementById('quote-bar');
      if (bar) bar.style.width = '100%';
    }));

    const quoteTimer = setTimeout(advance, 10000);
  }

  function renderWantToCapture(d) {
    c.innerHTML = `
      <p style="font-size:0.72em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Things I enjoy</p>
      <p style="margin-bottom:0.75rem;">${esc(d.prompt)}</p>
      <input type="text" id="want-to-input" placeholder="Something good…" maxlength="200"
             style="width:100%;box-sizing:border-box;margin-bottom:0.6rem;">
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" id="btn-want-to-add">Add it</button>
        <button class="action-button" id="btn-want-to-skip"
                style="background:transparent;color:#aaa;border:1.5px solid #ddd;">Skip</button>
      </div>
      <p id="want-to-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>`;

    function submitItem() {
      const val = document.getElementById('want-to-input').value.trim();
      if (!val) { document.getElementById('want-to-status').textContent = 'Type something first.'; return; }
      document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = true);
      fetch('api/want_to.php', {
        method:  'POST',
        headers: {'Content-Type': 'application/json'},
        body:    JSON.stringify({action: 'add', text: val}),
      }).then(r => r.json()).then(() => {
        document.getElementById('want-to-status').textContent = 'Added.';
        setTimeout(() => loadSpeechBubble('lets-go.php'), 500);
      }).catch(() => {
        document.getElementById('want-to-status').textContent = 'Could not save — try again.';
        document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = false);
      });
    }

    document.getElementById('btn-want-to-add').addEventListener('click', submitItem);
    document.getElementById('btn-want-to-skip').addEventListener('click', () => loadSpeechBubble('lets-go.php'));
    document.getElementById('want-to-input').addEventListener('keydown', e => { if (e.key === 'Enter') submitItem(); });
  }

  function renderWantToSuggestion(d) {
    const itemBtns = d.items.map(i =>
      `<button class="action-button" data-id="${i.id}"
               style="text-align:left;padding:8px 12px;font-size:0.92em;line-height:1.4;width:100%;"
               onclick="window._wantToChosen(${i.id})">${esc(i.text)}</button>`
    ).join('');
    c.innerHTML = `
      <p style="font-size:0.72em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">How about one of these?</p>
      <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:0.75rem;">${itemBtns}</div>
      <button class="action-button" id="btn-want-to-none"
              style="background:transparent;color:#aaa;border:1.5px solid #ddd;font-size:0.85em;">
        None of these appeal right now
      </button>
      <p id="want-to-none-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>`;

    window._wantToChosen = function(id) {
      fetch('api/want_to.php', {
        method:  'POST',
        headers: {'Content-Type': 'application/json'},
        body:    JSON.stringify({action: 'mark_offered', id}),
      }).catch(() => {});
      loadSpeechBubble('lets-go.php');
    };

    document.getElementById('btn-want-to-none').addEventListener('click', function() {
      this.disabled = true;
      fetch('api/want_to.php', {
        method:  'POST',
        headers: {'Content-Type': 'application/json'},
        body:    JSON.stringify({action: 'none'}),
      }).then(() => {
        document.getElementById('want-to-none-status').textContent = "That\'s okay. Keep going.";
        setTimeout(() => loadSpeechBubble('lets-go.php'), 1200);
      }).catch(() => loadSpeechBubble('lets-go.php'));
    });
  }

  function renderMissingInfo(d) {
    if (d.field === 'anticipation') {
      renderAnticipationCheck(d);
      return;
    }
    const opts = d.options.map(o =>
      `<button class="action-button"
         onclick="window._checkin('${d.field}', ${o.value}, this)">${esc(o.label)}</button>`
    ).join('');
    const greetingHtml = d.greeting
      ? `<p style="margin-bottom:0.35rem;color:#888;font-size:0.92em;">${esc(d.greeting)}</p>`
      : '';
    c.innerHTML = `
      ${greetingHtml}
      <p style="margin-bottom:0.75rem;">${esc(d.prompt)}</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">${opts}</div>
      <p id="checkin-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>`;

    window._checkin = function (field, value, btn) {
      document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = true);
      btn.style.outline = '3px solid hsl(210,100%,40%)';
      fetch('api/checkin.php', {
        method:  'POST',
        headers: { 'Content-Type': 'application/json' },
        body:    JSON.stringify({ field, value }),
      }).then(r => r.json()).then(() => {
        setTimeout(() => loadSpeechBubble('lets-go.php'), 500);
      }).catch(() => {
        document.getElementById('checkin-status').textContent = 'Could not save — try again.';
        document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = false);
      });
    };
  }

  function renderAnticipationCheck(d) {
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;">${esc(d.prompt)}</p>
      <input type="text" id="anticipation-input" placeholder="Something coming up…"
             style="width:100%;box-sizing:border-box;margin-bottom:0.6rem;" maxlength="500">
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" id="btn-anticipation-submit">Submit</button>
        <button class="action-button" id="btn-anticipation-nothing"
                style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);">
          Not looking forward to anything
        </button>
      </div>
      <p id="anticipation-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>`;

    function saveAnticipation(value) {
      document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = true);
      fetch('api/checkin.php', {
        method:  'POST',
        headers: { 'Content-Type': 'application/json' },
        body:    JSON.stringify({ field: 'anticipation', value }),
      }).then(r => r.json()).then(() => {
        setTimeout(() => loadSpeechBubble('lets-go.php'), 400);
      }).catch(() => {
        document.getElementById('anticipation-status').textContent = 'Could not save — try again.';
        document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = false);
      });
    }

    document.getElementById('btn-anticipation-submit').addEventListener('click', () => {
      const val = document.getElementById('anticipation-input').value.trim();
      if (!val) { document.getElementById('anticipation-status').textContent = 'Type something, or use the button below.'; return; }
      saveAnticipation(val);
    });
    document.getElementById('btn-anticipation-nothing').addEventListener('click', () => {
      saveAnticipation('nothing');
    });
    document.getElementById('anticipation-input').addEventListener('keydown', e => {
      if (e.key === 'Enter') document.getElementById('btn-anticipation-submit').click();
    });
  }

  function renderGemMatch() {
    const overlayEl   = document.getElementById('overlay');
    const overlayBody = document.getElementById('overlay-body');
    const sb = document.getElementById('speechBubble');
    if (sb) sb.style.display = 'none';
    if (!overlayEl || !overlayBody) return;

    const COLS = 7, ROWS = 7, N_COLORS = 6, GAP = 4, START_MOVES = 25;
    const GEM_FILL  = ['#d62839','#4895ef','#52b788','#f9c74f','#9b5de5','#ff8c00'];
    const GEM_GLOSS = ['rgba(255,155,165,0.5)','rgba(155,210,255,0.5)',
                       'rgba(155,255,210,0.5)','rgba(255,252,175,0.5)',
                       'rgba(205,175,255,0.5)','rgba(255,215,130,0.5)'];

    overlayBody.innerHTML = `
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
          <strong>Gem Match</strong>
          <span id="gm-stats" style="font-size:0.9em;color:#666;"></span>
        </div>
        <canvas id="gm-canvas" style="display:block;width:100%;border-radius:8px;touch-action:none;"></canvas>
        <div id="gm-msg" style="text-align:center;min-height:1.5em;padding-top:8px;font-weight:600;"></div>
        <div id="gm-btns" style="display:flex;gap:8px;justify-content:center;padding-top:4px;"></div>
        <div style="text-align:center;padding-top:6px;">
          <button id="gm-giveup" onclick="window._gmGiveUp()"
            style="font-size:0.78em;background:transparent;color:#bbb;border:none;cursor:pointer;padding:4px 8px;">
            Give up</button>
        </div>`;
    overlayEl.style.display = 'block';
    window._gemMatchActive = true;

    const canvas = document.getElementById('gm-canvas');
    const avail  = Math.min(overlayBody.clientWidth - 8, 440);
    const gemW   = Math.floor((avail - (COLS-1)*GAP) / COLS);
    const gemH   = Math.floor((window.innerHeight*0.52 - (ROWS-1)*GAP) / ROWS);
    const GEM    = Math.max(32, Math.min(gemW, gemH));
    canvas.width  = COLS*GEM + (COLS-1)*GAP;
    canvas.height = ROWS*GEM + (ROWS-1)*GAP;
    canvas.style.maxWidth = canvas.width + 'px';
    const ctx = canvas.getContext('2d');

    // Gem encoding: low nibble = colour (0-5), high nibble = type
    // type 0=normal  1=hline (blasts row)  2=vline (blasts col)  3=star (blasts colour)
    const gemColor = v => (v == null || v < 0) ? -1 : v & 0xF;
    const gemType  = v => (v == null || v < 0) ? 0  : v >> 4;
    const makeGem  = (color, type) => (type << 4) | color;

    const TARGET   = 300;
    const SAVE_KEY = 'baan_gm_save';
    // Best score now lives server-side (config.enc via api/gem_match_score.php)
    // instead of the old localStorage-only baan_gm_pb key — deliberately
    // starting fresh at 0 rather than migrating the old per-browser value up,
    // since an uncapped cascade-combo multiplier could produce outlier scores
    // not representative of normal play.

    let grid = [], score = 0, moves = START_MOVES, sel = null, cascadeDepth = 0;
    let state = 'IDLE', rafId = null;
    let animT = 0, animDur = 0, swapA = null, matchSet = new Set(), fallData = [];

    const gxy  = (r,c) => [c*(GEM+GAP), r*(GEM+GAP)];
    const rnd  = ()    => Math.floor(Math.random() * N_COLORS); // always normal (type 0)
    const eIO  = t     => t<0.5 ? 2*t*t : -1+(4-2*t)*t;
    const eOut = t     => 1 - Math.pow(1-t, 3);

    function saveState() {
      if (state !== 'IDLE') return;
      try { localStorage.setItem(SAVE_KEY, JSON.stringify({grid:grid.map(r=>[...r]),score,moves,savedAt:Date.now()})); } catch(e) {}
    }
    function clearSave() { try { localStorage.removeItem(SAVE_KEY); } catch(e) {} }

    function initGrid() {
      grid = [];
      for (let r=0; r<ROWS; r++) {
        grid[r] = [];
        for (let c=0; c<COLS; c++) {
          let g; do { g=rnd(); } while (
            (c>=2 && gemColor(grid[r][c-1])===g && gemColor(grid[r][c-2])===g) ||
            (r>=2 && gemColor(grid[r-1][c])===g && gemColor(grid[r-2][c])===g)
          );
          grid[r][c] = g;
        }
      }
    }

    // Returns {toRemove: Set, toCreate: [{r,c,type}]}
    // type 0=normal 1=hline 2=vline 3=star 4=bomb (L/T shape → 3×3 blast)
    function findMatches() {
      const toRemove = new Set();
      const toCreate = [];

      // Collect all horizontal runs ≥3
      const hRuns = [];
      for (let r=0; r<ROWS; r++) {
        let c=0;
        while (c<COLS) {
          const g=gemColor(grid[r][c]);
          let e=c; while(e+1<COLS && gemColor(grid[r][e+1])===g) e++;
          if (e-c+1>=3) hRuns.push({r, c1:c, c2:e, color:g});
          c=e+1;
        }
      }
      // Collect all vertical runs ≥3
      const vRuns = [];
      for (let c=0; c<COLS; c++) {
        let r=0;
        while (r<ROWS) {
          const g=gemColor(grid[r][c]);
          let e=r; while(e+1<ROWS && gemColor(grid[e+1][c])===g) e++;
          if (e-r+1>=3) vRuns.push({r1:r, r2:e, c, color:g});
          r=e+1;
        }
      }
      if (!hRuns.length && !vRuns.length) return {toRemove, toCreate};

      // L/T overlap detection → bomb at intersection
      const usedH=new Set(), usedV=new Set();
      for (let hi=0; hi<hRuns.length; hi++) {
        const h=hRuns[hi];
        for (let vi=0; vi<vRuns.length; vi++) {
          const v=vRuns[vi];
          if (h.color!==v.color) continue;
          if (v.c>=h.c1 && v.c<=h.c2 && h.r>=v.r1 && h.r<=v.r2) {
            for (let c=h.c1;c<=h.c2;c++) toRemove.add(`${h.r},${c}`);
            for (let r=v.r1;r<=v.r2;r++) toRemove.add(`${r},${v.c}`);
            // intersection cell stays in toRemove so computeMatchSet() converts it to a bomb
            toCreate.push({r:h.r, c:v.c, type:4});
            usedH.add(hi); usedV.add(vi);
          }
        }
      }
      // Remaining horizontal runs — normal hline/star logic
      for (let hi=0; hi<hRuns.length; hi++) {
        if (usedH.has(hi)) continue;
        const h=hRuns[hi]; const len=h.c2-h.c1+1;
        for (let c=h.c1;c<=h.c2;c++) toRemove.add(`${h.r},${c}`);
        const mid=Math.floor((h.c1+h.c2)/2);
        if      (len>=5) toCreate.push({r:h.r, c:mid, type:3});
        else if (len===4) toCreate.push({r:h.r, c:mid, type:1});
      }
      // Remaining vertical runs — normal vline/star logic
      for (let vi=0; vi<vRuns.length; vi++) {
        if (usedV.has(vi)) continue;
        const v=vRuns[vi]; const len=v.r2-v.r1+1;
        for (let r=v.r1;r<=v.r2;r++) toRemove.add(`${r},${v.c}`);
        const mid=Math.floor((v.r1+v.r2)/2);
        if      (len>=5) toCreate.push({r:mid, c:v.c, type:3});
        else if (len===4) toCreate.push({r:mid, c:v.c, type:2});
      }
      return {toRemove, toCreate};
    }

    // Expand the removal set by activating any specials it contains (chain-reactive).
    // BFS queue: every newly-added gem is immediately queued so its own special
    // effect is also expanded — bomb→star→star's colour all cascade in one pass.
    function expandSpecials(ms) {
      const queue = [...ms];
      const add = (rr, cc) => {
        const k = `${rr},${cc}`;
        if (!ms.has(k)) { ms.add(k); queue.push(k); }
      };
      while (queue.length > 0) {
        const key = queue.shift();
        const [r,c] = key.split(',').map(Number);
        const type  = gemType(grid[r][c]);
        if (type===1) { // hline: blast row
          for (let cc=0;cc<COLS;cc++) add(r,cc);
        } else if (type===2) { // vline: blast column
          for (let rr=0;rr<ROWS;rr++) add(rr,c);
        } else if (type===3) { // star: blast all gems of same colour
          const col=gemColor(grid[r][c]);
          for (let rr=0;rr<ROWS;rr++) for (let cc=0;cc<COLS;cc++)
            if (gemColor(grid[rr][cc])===col) add(rr,cc);
        } else if (type===4) { // bomb: blast 3×3 area
          for (let dr=-1;dr<=1;dr++) for (let dc=-1;dc<=1;dc++) {
            if (!dr&&!dc) continue;
            const rr=r+dr, cc=c+dc;
            if (rr>=0&&rr<ROWS&&cc>=0&&cc<COLS) add(rr,cc);
          }
        }
      }
    }

    // Find matches, spawn specials into grid, expand specials, return removal set (or null)
    function computeMatchSet() {
      const {toRemove, toCreate}=findMatches();
      if (toRemove.size===0) return null;
      // Spawn new specials: keep spawn cell in grid, remove it from the removal set
      for (const spawn of toCreate) {
        const key=`${spawn.r},${spawn.c}`;
        if (toRemove.has(key)) {
          toRemove.delete(key);
          grid[spawn.r][spawn.c]=makeGem(gemColor(grid[spawn.r][spawn.c]), spawn.type);
        }
      }
      expandSpecials(toRemove);
      return toRemove;
    }

    function buildFall(ms) {
      const data=[];
      for (let c=0;c<COLS;c++) {
        const sv=[];
        for (let r=0;r<ROWS;r++) if (!ms.has(`${r},${c}`)) sv.push({color:grid[r][c],fr:r});
        const n=ROWS-sv.length;
        for (let i=0;i<n;i++) sv.unshift({color:rnd(), fr:-(n-i)});
        for (let r=0;r<ROWS;r++)
          data.push({r, c, color:sv[r].color, fromY:sv[r].fr*(GEM+GAP), toY:r*(GEM+GAP)});
      }
      return data;
    }

    function applyFall() {
      const g2=Array.from({length:ROWS},()=>Array(COLS).fill(0));
      for (const d of fallData) g2[d.r][d.c]=d.color;
      grid=g2;
    }

    function hasMoves() {
      // Special gems can always be tapped directly
      for (let r=0;r<ROWS;r++) for (let c=0;c<COLS;c++) if (gemType(grid[r][c])>0) return true;
      // Check every adjacent swap for a resulting match
      for (let r=0;r<ROWS;r++) {
        for (let c=0;c<COLS;c++) {
          if (c+1<COLS) {
            [grid[r][c],grid[r][c+1]]=[grid[r][c+1],grid[r][c]];
            const ok=findMatches().toRemove.size>0;
            [grid[r][c],grid[r][c+1]]=[grid[r][c+1],grid[r][c]];
            if (ok) return true;
          }
          if (r+1<ROWS) {
            [grid[r][c],grid[r+1][c]]=[grid[r+1][c],grid[r][c]];
            const ok=findMatches().toRemove.size>0;
            [grid[r][c],grid[r+1][c]]=[grid[r+1][c],grid[r][c]];
            if (ok) return true;
          }
        }
      }
      return false;
    }

    function checkNoMoves() {
      if (hasMoves()) return;
      const msg=document.getElementById('gm-msg');
      if (msg) msg.textContent='No moves left — reshuffling…';
      setTimeout(()=>{
        let attempts=0;
        do {
          // Fisher-Yates shuffle of gem values in place
          const vals=[];
          for (let r=0;r<ROWS;r++) for (let c=0;c<COLS;c++) vals.push(grid[r][c]);
          for (let i=vals.length-1;i>0;i--) {
            const j=Math.floor(Math.random()*(i+1));
            [vals[i],vals[j]]=[vals[j],vals[i]];
          }
          let k=0;
          for (let r=0;r<ROWS;r++) for (let c=0;c<COLS;c++) grid[r][c]=vals[k++];
          attempts++;
        } while (!hasMoves() && attempts<20);
        if (msg) msg.textContent='';
      }, 700);
    }

    function updateUI() {
      const s=document.getElementById('gm-stats');
      if (s) s.innerHTML=`Score: <b>${score}</b>&nbsp;/&nbsp;${TARGET}&nbsp;|&nbsp;Moves: <b>${moves}</b>`;
    }

    function rrect(x,y,w,h,r) {
      ctx.beginPath();
      ctx.moveTo(x+r,y); ctx.lineTo(x+w-r,y); ctx.arcTo(x+w,y,x+w,y+r,r);
      ctx.lineTo(x+w,y+h-r); ctx.arcTo(x+w,y+h,x+w-r,y+h,r);
      ctx.lineTo(x+r,y+h); ctx.arcTo(x,y+h,x,y+h-r,r);
      ctx.lineTo(x,y+r); ctx.arcTo(x,y,x+r,y,r);
      ctx.closePath();
    }

    function drawGem(x,y,v,alpha,scale) {
      if (v==null || v<0) return;
      const ci=gemColor(v), type=gemType(v);
      if (ci<0||ci>=N_COLORS) return;
      const hw=GEM/2;
      ctx.save();
      ctx.globalAlpha=alpha;
      ctx.translate(x+hw,y+hw); ctx.scale(scale,scale);
      // Base gem
      rrect(-hw,-hw,GEM,GEM,7); ctx.fillStyle=GEM_FILL[ci]; ctx.fill();
      rrect(-hw+2,-hw+2,GEM-4,GEM-4,5);
      ctx.strokeStyle='rgba(255,255,255,0.18)'; ctx.lineWidth=1.5; ctx.stroke();
      ctx.fillStyle=GEM_GLOSS[ci];
      ctx.beginPath();
      ctx.ellipse(-hw*0.32,-hw*0.44,hw*0.33,hw*0.17,-0.35,0,Math.PI*2);
      ctx.fill();
      // Special indicators
      ctx.fillStyle='rgba(255,255,255,0.88)';
      if (type===1) { // hline: horizontal bar + outward arrowheads
        ctx.fillRect(-hw+5,-2,GEM-10,4);
        ctx.beginPath(); ctx.moveTo(hw-4,0); ctx.lineTo(hw-10,-5); ctx.lineTo(hw-10,5); ctx.closePath(); ctx.fill();
        ctx.beginPath(); ctx.moveTo(-hw+4,0); ctx.lineTo(-hw+10,-5); ctx.lineTo(-hw+10,5); ctx.closePath(); ctx.fill();
      } else if (type===2) { // vline: vertical bar + outward arrowheads
        ctx.fillRect(-2,-hw+5,4,GEM-10);
        ctx.beginPath(); ctx.moveTo(0,hw-4); ctx.lineTo(-5,hw-10); ctx.lineTo(5,hw-10); ctx.closePath(); ctx.fill();
        ctx.beginPath(); ctx.moveTo(0,-hw+4); ctx.lineTo(-5,-hw+10); ctx.lineTo(5,-hw+10); ctx.closePath(); ctx.fill();
      } else if (type===3) { // star
        ctx.font=`bold ${Math.round(GEM*0.44)}px sans-serif`;
        ctx.textAlign='center'; ctx.textBaseline='middle';
        ctx.fillText('★',0,1);
      } else if (type===4) { // bomb: radial burst
        const r1=hw*0.22, r2=hw*0.54;
        ctx.strokeStyle='rgba(255,255,255,0.88)';
        ctx.lineWidth=Math.max(1.5,hw*0.11);
        ctx.lineCap='round';
        for (let i=0;i<8;i++) {
          const a=i*Math.PI/4;
          ctx.beginPath();
          ctx.moveTo(Math.cos(a)*r1, Math.sin(a)*r1);
          ctx.lineTo(Math.cos(a)*r2, Math.sin(a)*r2);
          ctx.stroke();
        }
        ctx.fillStyle='rgba(255,255,255,0.9)';
        ctx.beginPath(); ctx.arc(0,0,r1*0.75,0,Math.PI*2); ctx.fill();
      }
      ctx.restore();
    }

    function drawSlot(r,c) {
      const [x,y]=gxy(r,c);
      rrect(x,y,GEM,GEM,7); ctx.fillStyle='rgba(0,0,0,0.13)'; ctx.fill();
    }

    function drawBoard(ms,mAlpha,mScale) {
      for (let r=0;r<ROWS;r++) for (let c=0;c<COLS;c++) {
        drawSlot(r,c);
        const [x,y]=gxy(r,c);
        if (ms&&ms.has(`${r},${c}`)) drawGem(x,y,grid[r][c],mAlpha,mScale);
        else drawGem(x,y,grid[r][c],1,1);
      }
    }

    function loop() {
      if (state==='GAMEOVER'||!document.getElementById('gm-canvas')) { rafId=null; return; }
      ctx.clearRect(0,0,canvas.width,canvas.height);

      if (state==='IDLE') {
        drawBoard(null,1,1);
        if (sel) {
          const [x,y]=gxy(sel.r,sel.c);
          ctx.strokeStyle='#fff'; ctx.lineWidth=3;
          rrect(x-2,y-2,GEM+4,GEM+4,9); ctx.stroke();
          ctx.strokeStyle='rgba(255,255,255,0.28)'; ctx.lineWidth=5;
          rrect(x-5,y-5,GEM+10,GEM+10,11); ctx.stroke();
        }

      } else if (state==='SWAP'||state==='BACK') {
        animT=Math.min(animT+16,animDur);
        const p=state==='SWAP' ? eIO(animT/animDur) : 1-eIO(animT/animDur);
        const {r1,c1,r2,c2}=swapA;
        const [x1,y1]=gxy(r1,c1),[x2,y2]=gxy(r2,c2);
        for (let r=0;r<ROWS;r++) for (let c=0;c<COLS;c++) {
          drawSlot(r,c);
          if((r===r1&&c===c1)||(r===r2&&c===c2)) continue;
          const [x,y]=gxy(r,c); drawGem(x,y,grid[r][c],1,1);
        }
        drawGem(x1+(x2-x1)*p,y1+(y2-y1)*p,grid[r1][c1],1,1);
        drawGem(x2+(x1-x2)*p,y2+(y1-y2)*p,grid[r2][c2],1,1);
        if (animT>=animDur) {
          if (state==='SWAP') {
            [grid[r1][c1],grid[r2][c2]]=[grid[r2][c2],grid[r1][c1]];
            const ms=computeMatchSet();
            if (ms) { cascadeDepth=0; matchSet=ms; score+=ms.size*10; updateUI(); animT=0; animDur=350; state='MATCH'; }
            else { [grid[r1][c1],grid[r2][c2]]=[grid[r2][c2],grid[r1][c1]]; animT=0; animDur=160; state='BACK'; }
          } else {
            state='IDLE';
            if (moves<=0) endGame(); else { checkNoMoves(); saveState(); }
          }
        }

      } else if (state==='MATCH') {
        animT=Math.min(animT+16,animDur);
        const t=animT/animDur, f=eOut(t);
        drawBoard(matchSet,1-f,1-f);
        for (const key of matchSet) {
          const [r,c]=key.split(',').map(Number),[x,y]=gxy(r,c);
          ctx.save(); ctx.globalAlpha=(1-t)*0.75; ctx.strokeStyle='#fff'; ctx.lineWidth=3;
          rrect(x-3,y-3,GEM+6,GEM+6,10); ctx.stroke(); ctx.restore();
        }
        if (animT>=animDur) { fallData=buildFall(matchSet); animT=0; animDur=300; state='FALL'; }

      } else if (state==='FALL') {
        animT=Math.min(animT+16,animDur);
        const t=eOut(animT/animDur);
        for (let r=0;r<ROWS;r++) for (let c=0;c<COLS;c++) drawSlot(r,c);
        for (const d of fallData) {
          const [x]=gxy(d.r,d.c);
          drawGem(x,d.fromY+(d.toY-d.fromY)*t,d.color,d.fromY<0?Math.min(1,t*2):1,1);
        }
        if (animT>=animDur) {
          applyFall();
          const cascade=computeMatchSet();
          if (cascade) {
            cascadeDepth++;
            const mult = 1 + cascadeDepth * 0.5;
            matchSet=cascade; score+=Math.round(cascade.size*10*mult); updateUI();
            const msgEl=document.getElementById('gm-msg');
            if (msgEl) {
              const lbl=['Cascade!','Double!','Triple!','Mega!'];
              msgEl.textContent=lbl[Math.min(cascadeDepth-1,lbl.length-1)];
              setTimeout(()=>{ if(msgEl) msgEl.textContent=''; },700);
            }
            animT=0; animDur=350; state='MATCH';
          }
          else if (moves<=0) endGame();
          else { state='IDLE'; checkNoMoves(); saveState(); }
        }
      }

      rafId=requestAnimationFrame(loop);
    }

    function endGame(gaveUp) {
      state='GAMEOVER';
      clearSave();
      window._gemMatchActive = false;
      const giveupBtn = document.getElementById('gm-giveup');
      if (giveupBtn) giveupBtn.style.display = 'none';
      ctx.clearRect(0,0,canvas.width,canvas.height);
      for (let r=0;r<ROWS;r++) for (let c=0;c<COLS;c++) {
        drawSlot(r,c); const[x,y]=gxy(r,c); drawGem(x,y,grid[r][c],0.35,1);
      }
      const msg=document.getElementById('gm-msg'),btns=document.getElementById('gm-btns');
      const won = score >= TARGET && !gaveUp;
      if (won) earnPip();

      function renderMsg(pbText) {
        if (!msg) return;
        if (won)            msg.textContent = `Level complete! ${score}${pbText}`;
        else if (gaveUp)    msg.textContent = `${score} / ${TARGET}${pbText}`;
        else if (score >= TARGET * 0.7) msg.textContent = `${score} / ${TARGET} — so close!${pbText}`;
        else                msg.textContent = `${score} / ${TARGET}${pbText}`;
      }
      renderMsg(''); // show the score immediately; best-info fills in once the server responds

      // Best score is server-side (api/gem_match_score.php), starting fresh
      // at 0. A give-up never counts toward it (matches prior behaviour), so
      // that path only reads the current best rather than submitting one.
      if (!gaveUp && score > 0) {
        fetch('api/gem_match_score.php', { method: 'POST', headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ score }) })
          .then(r => r.json())
          .then(d => {
            if (!d.ok) return;
            renderMsg(d.new_best ? ' — new best!' : (d.best > 0 ? ` — best: ${d.best}` : ''));
          }).catch(() => {});
      } else {
        fetch('api/gem_match_score.php')
          .then(r => r.json())
          .then(d => { if (d.ok && d.best > 0) renderMsg(` — best: ${d.best}`); })
          .catch(() => {});
      }
      if (btns) btns.innerHTML=`
          <button class="action-button" onclick="window._gmRestart()">Play again</button>
          <button class="action-button btn-secondary"
            onclick="window._gemMatchActive=false;document.getElementById('overlay').style.display='none';document.getElementById('overlay-body').innerHTML='';loadSpeechBubble('lets-go.php');">
            Next task</button>`;
      window._gmRestart=function() {
        clearSave(); initGrid(); score=0; moves=START_MOVES; sel=null; cascadeDepth=0; updateUI();
        const msgEl=document.getElementById('gm-msg'); if(msgEl) msgEl.textContent='';
        const btnsEl=document.getElementById('gm-btns'); if(btnsEl) btnsEl.innerHTML='';
        const guBtn=document.getElementById('gm-giveup'); if(guBtn) guBtn.style.display='';
        state='IDLE'; window._gemMatchActive=true; rafId=requestAnimationFrame(loop);
      };
    }

    window._gmGiveUp = function() { endGame(true); };

    function activateSpecial(r,c) {
      if (moves<=0||state!=='IDLE') return;
      cascadeDepth=0; moves--; updateUI(); sel=null;
      const ms=new Set([`${r},${c}`]);
      expandSpecials(ms);
      matchSet=ms; score+=ms.size*10; updateUI();
      animT=0; animDur=350; state='MATCH';
    }

    let ptStart=null;
    canvas.addEventListener('pointerdown',e=>{
      if (state!=='IDLE') return;
      const rect=canvas.getBoundingClientRect();
      ptStart={
        r:Math.floor((e.clientY-rect.top) *(canvas.height/rect.height)/(GEM+GAP)),
        c:Math.floor((e.clientX-rect.left)*(canvas.width /rect.width) /(GEM+GAP)),
      };
    });
    canvas.addEventListener('pointerup',e=>{
      if (!ptStart||state!=='IDLE') { ptStart=null; return; }
      const rect=canvas.getBoundingClientRect();
      const er=Math.floor((e.clientY-rect.top) *(canvas.height/rect.height)/(GEM+GAP));
      const ec=Math.floor((e.clientX-rect.left)*(canvas.width /rect.width) /(GEM+GAP));
      const {r:sr,c:sc}=ptStart; ptStart=null;
      if (er<0||er>=ROWS||ec<0||ec>=COLS) return;
      const dr=er-sr,dc=ec-sc;
      if (Math.abs(dr)+Math.abs(dc)===1) {
        doSwap(sr,sc,er,ec);
      } else if (!dr&&!dc) {
        // Tapping a special gem activates it directly
        if (gemType(grid[sr][sc])>0) { activateSpecial(sr,sc); return; }
        if (sel&&Math.abs(sr-sel.r)+Math.abs(sc-sel.c)===1) { doSwap(sel.r,sel.c,sr,sc); sel=null; }
        else sel=(sel?.r===sr&&sel?.c===sc)?null:{r:sr,c:sc};
      }
    });

    function doSwap(r1,c1,r2,c2) {
      if (moves<=0||state!=='IDLE') return;
      moves--; updateUI(); sel=null;
      swapA={r1,c1,r2,c2}; animT=0; animDur=180; state='SWAP';
    }

    // Auto-restore saved game (max 24h old)
    let restored = false;
    try {
      const raw = localStorage.getItem(SAVE_KEY);
      if (raw) {
        const s = JSON.parse(raw);
        if (s.grid && typeof s.score==='number' && s.moves>0 && (Date.now()-s.savedAt)<86400000) {
          grid=s.grid; score=s.score; moves=s.moves; restored=true;
        } else { clearSave(); }
      }
    } catch(e) { clearSave(); }
    if (!restored) initGrid();
    updateUI();
    rafId=requestAnimationFrame(loop);
  }

  function renderOnboarding(d) {
    if (d.step === 'peanut_butter') renderPbStep(d);
    else if (d.step === 'habitica') renderHabiticaStep(d);
  }

  function renderPbStep(d) {
    const opts = d.options.map(o =>
      `<button class="action-button"
         onclick="window._pbPick('${o.value}')">${esc(o.label)}</button>`
    ).join('');
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;">${esc(d.prompt)}</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">${opts}</div>
      <p id="ob-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>`;

    window._pbPick = function (value) {
      document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = true);
      fetch('api/onboarding.php', {
        method:  'POST',
        headers: { 'Content-Type': 'application/json' },
        body:    JSON.stringify({ step: 'preferences', peanut_butter: value }),
      }).then(r => r.json()).then(() => {
        setTimeout(() => loadSpeechBubble('lets-go.php'), 400);
      }).catch(() => {
        document.getElementById('ob-status').textContent = 'Could not save — try again.';
        document.querySelectorAll('#activity-container .action-button').forEach(b => b.disabled = false);
      });
    };
  }

  function renderHabiticaStep(d) {
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;">${esc(d.prompt)}</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;" id="hab-yn">
        <button class="action-button" onclick="window._habNo()">Nope</button>
        <button class="action-button" onclick="window._habYes()">Yes, I do</button>
      </div>
      <div id="hab-form" style="display:none;margin-top:0.75rem;">
        <input type="text" id="hab-uid" placeholder="User ID"  style="margin-bottom:0.4rem;">
        <input type="text" id="hab-key" placeholder="API Key"  style="margin-bottom:0.4rem;">
        <button class="action-button" onclick="window._habSave()">Save</button>
      </div>
      <p id="hab-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>`;

    window._habNo = function () {
      document.querySelectorAll('#hab-yn .action-button').forEach(b => b.disabled = true);
      fetch('api/onboarding.php', {
        method:  'POST',
        headers: { 'Content-Type': 'application/json' },
        body:    JSON.stringify({ step: 'habitica', uses_habitica: false }),
      }).then(() => setTimeout(() => loadSpeechBubble('lets-go.php'), 400))
        .catch(() => { document.getElementById('hab-status').textContent = 'Could not save.'; });
    };

    window._habYes = function () {
      document.querySelectorAll('#hab-yn .action-button').forEach(b => b.disabled = true);
      document.getElementById('hab-form').style.display = 'block';
    };

    window._habSave = function () {
      const uid = document.getElementById('hab-uid').value.trim();
      const key = document.getElementById('hab-key').value.trim();
      const st  = document.getElementById('hab-status');
      if (!uid || !key) { st.textContent = 'Both fields required.'; return; }
      st.textContent = '';
      fetch('api/onboarding.php', {
        method:  'POST',
        headers: { 'Content-Type': 'application/json' },
        body:    JSON.stringify({ step: 'habitica', uses_habitica: true, user_id: uid, api_key: key }),
      }).then(r => r.json()).then(data => {
        if (data.error) { st.textContent = data.error; return; }
        setTimeout(() => loadSpeechBubble('lets-go.php'), 400);
      }).catch(() => { st.textContent = 'Could not save.'; });
    };
  }

  window.scoreMorningDaily = function(id) {
    skippedDailyIds = skippedDailyIds.filter(s => s !== id);
    fetch('api/score_daily.php', {
      method:  'POST',
      headers: { 'Content-Type': 'application/json' },
      body:    JSON.stringify({ id }),
    })
    .then(r => r.json())
    .then(d => {
      if (!d.ok) return;
      earnPip();
      if (d.all_done) {
        window.location.reload();
      } else {
        const skipParam = skippedDailyIds.length ? '?skip=' + skippedDailyIds.join(',') : '';
        fetch('api/next_activity.php' + skipParam)
          .then(r => r.json())
          .then(render)
          .catch(() => {});
      }
    })
    .catch(() => {});
  };

  window.houseTaskDone = function(taskId) {
    fetch('api/house_task_done.php', {
      method:  'POST',
      headers: { 'Content-Type': 'application/json' },
      body:    JSON.stringify({ task_id: taskId }),
    })
    .then(() => loadSpeechBubble('lets-go.php'))
    .catch(() => loadSpeechBubble('lets-go.php'));
  };

  window.skipMorningDaily = function(id) {
    if (!skippedDailyIds.includes(id)) skippedDailyIds.push(id);
    const skipParam = '?skip=' + skippedDailyIds.join(',');
    fetch('api/next_activity.php' + skipParam)
      .then(r => r.json())
      .then(render)
      .catch(() => {});
  };
};
