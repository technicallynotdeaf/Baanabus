<?php
require_once __DIR__ . '/init.php';
if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); echo '<p class="muted">Vault is locked.</p>'; exit; }
?>
<div id="activity-container" style="padding:0.25rem 0;">
  <p class="muted">Loading…</p>
</div>

<script>
(function () {
  'use strict';

  const c = document.getElementById('activity-container');

  function esc(s) {
    return String(s)
      .replace(/&/g, '&amp;').replace(/</g, '&lt;')
      .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  fetch('api/next_activity.php')
    .then(r => r.json())
    .then(render)
    .catch(() => { c.innerHTML = '<p class="muted">Could not load next activity.</p>'; });

  function render(d) {
    switch (d.type) {
      case 'task':           renderTask(d);          break;
      case 'trivia':         renderTrivia(d);        break;
      case 'minigame':       renderMinigame(d);      break;
      case 'missing_info':   renderMissingInfo(d);   break;
      case 'onboarding_step': renderOnboarding(d);   break;
      case 'empty':
        c.innerHTML = `<p>${esc(d.message)}</p>`;
        break;
      default:
        c.innerHTML = '<p class="muted">Nothing to show right now.</p>';
    }
  }

  // ---- Task ----
  function renderTask(d) {
    if (d.subtasks && d.subtasks.length > 0) {
      renderBlockTask(d);
    } else {
      c.innerHTML = `
        <p style="margin-bottom:0.75rem;">${esc(d.title)}</p>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
          <button class="action-button" onclick="markAsDone(${d.id})">Done</button>
          <button class="action-button" onclick="markAsStuck(${d.id})">Stuck</button>
          <button class="action-button" onclick="snoozeTask(${d.id})">Snooze</button>
        </div>`;
    }
  }

  function renderBlockTask(d) {
    const rows = d.subtasks.map(s => `
      <div class="subtask-row" style="display:flex;align-items:flex-start;gap:8px;padding:0.35rem 0;border-bottom:1px solid rgba(0,0,0,0.07);">
        <span style="flex:1;line-height:1.4;font-size:0.95em;">${esc(s.title)}</span>
        <button class="action-button" data-id="${s.id}"
          style="flex-shrink:0;padding:0.2rem 0.6rem;font-size:0.82em;"
          onclick="window._subtaskDone(${s.id}, this)">Done</button>
      </div>`).join('');

    c.innerHTML = `
      <p style="font-size:0.72em;color:#999;margin-bottom:0.2rem;text-transform:uppercase;letter-spacing:0.06em;">Block task</p>
      <p style="font-weight:600;margin-bottom:0.5rem;">${esc(d.title)}</p>
      <div id="subtask-list" style="margin-bottom:0.75rem;">${rows}</div>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" onclick="markAsStuck(${d.id})">Stuck</button>
        <button class="action-button" onclick="snoozeTask(${d.id})">Snooze</button>
      </div>`;

    window._subtaskDone = function(taskId, btn) {
      const row = btn.closest('.subtask-row');
      btn.disabled = true;
      row.style.transition = 'opacity 0.2s';
      row.style.opacity    = '0';
      fetch(`api/mark_complete.api.php?task_id=${taskId}`)
        .then(r => r.json())
        .then(data => {
          if (data.success) {
            updateProgressBar(data.pages);
            if (data.newStoryPage && typeof window.refreshScene === 'function') window.refreshScene();
            setTimeout(() => {
              row.remove();
              if (!document.querySelector('#subtask-list .subtask-row')) {
                loadSpeechBubble('lets-go.php');
              }
            }, 220);
          } else {
            btn.disabled    = false;
            row.style.opacity = '1';
          }
        })
        .catch(() => { btn.disabled = false; row.style.opacity = '1'; });
    };
  }

  // ---- Trivia ----
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
      if (idx === d.answer) {
        btns[idx].style.background = '#4caf50';
        fb.textContent = 'Correct!';
      } else {
        btns[idx].style.background = '#e53935';
        if (btns[d.answer]) btns[d.answer].style.background = '#4caf50';
        fb.textContent = 'Not quite — the answer was: ' + esc(d.options[d.answer]);
      }
      document.getElementById('trivia-next').style.display = 'inline-flex';
    };
  }

  // ---- Mini-game ----
  function renderMinigame(d) {
    if (d.game === 'tictactoe') renderTicTacToe();
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
      if (w === 'X')      msg.textContent = "You win! I wasn't ready.";
      else if (w === 'O') msg.textContent = "I win! Huh. Didn't expect that.";
      else                msg.textContent = 'A draw. Respectable.';
    }

    window._tttReset = function () {
      board = Array(9).fill(null); over = false; busy = false; draw();
    };

    draw();
  }

  // ---- Missing info (daily check-in) ----
  function renderMissingInfo(d) {
    const opts = d.options.map(o =>
      `<button class="action-button"
         onclick="window._checkin('${d.field}', ${o.value}, this)">${esc(o.label)}</button>`
    ).join('');
    c.innerHTML = `
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

  // ---- Onboarding steps ----
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
})();
</script>
