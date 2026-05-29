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

  function earnPip() {
    fetch('api/earn_pip.php')
      .then(r => r.json())
      .then(d => {
        if (d.ok) {
          updateProgressBar(d.pages, d.pages_target);
          if (d.newStoryPage && typeof window.refreshScene === 'function') window.refreshScene();
        }
      })
      .catch(() => {});
  }

  fetch('api/next_activity.php')
    .then(r => r.json())
    .then(render)
    .catch(() => { c.innerHTML = '<p class="muted">Could not load next activity.</p>'; });

  function render(d) {
    switch (d.type) {
      case 'task':           renderTask(d);          break;
      case 'trivia':         renderTrivia(d);        break;
      case 'study':          renderStudy(d);         break;
      case 'minigame':       renderMinigame(d);      break;
      case 'triage':         renderTriage(d);        break;
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
            updateProgressBar(data.pages, data.pages_target);
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

  // ---- Shared helpers ----
  function recordQuestionSeen(id, correct) {
    if (!id) return;
    const fd = new FormData();
    fd.append('id', id);
    fd.append('correct', correct ? '1' : '0');
    fetch('api/record_question_seen.php', { method: 'POST', body: fd }).catch(() => {});
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

  // ---- Study (exam revision) ----
  function renderStudy(d) {
    const setLabel = d.set_name
      ? `<p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.3rem;">${esc(d.set_name)}</p>`
      : '';
    const opts = d.options.map((o, i) =>
      `<button class="action-button" style="width:100%;text-align:left;"
         onclick="window._answerStudy(${i})">${esc(o)}</button>`
    ).join('');
    c.innerHTML = `
      ${setLabel}
      <p style="font-weight:600;line-height:1.4;margin-bottom:0.75rem;">${esc(d.question)}</p>
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

  // ---- Mini-game ----
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
    // Generate a simple arithmetic or geometric sequence
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
    // Generate 3 plausible wrong answers
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

  // ---- Triage ----
  function renderTriage(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.3rem;">Inbox</p>
      <textarea id="triage-title" style="width:100%;min-height:52px;margin-bottom:0.75rem;font-size:1em;resize:vertical;">${esc(d.title)}</textarea>
      <p id="triage-q" style="font-weight:500;margin-bottom:0.75rem;line-height:1.4;"></p>
      <div id="triage-actions" style="display:flex;flex-direction:column;gap:8px;"></div>
      <p id="triage-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>`;

    const getTitle  = () => document.getElementById('triage-title').value.trim() || d.title;
    const setQ      = q  => { document.getElementById('triage-q').textContent = q; };
    const setStatus = s  => { document.getElementById('triage-status').textContent = s; };
    const actionsEl = () => document.getElementById('triage-actions');

    function disableAll() {
      actionsEl().querySelectorAll('button').forEach(b => b.disabled = true);
    }
    function enableAll() {
      actionsEl().querySelectorAll('button').forEach(b => b.disabled = false);
    }

    function mkBtn(label, onClick, extraStyle) {
      const b = document.createElement('button');
      b.className = 'action-button';
      b.style.cssText = 'width:100%;' + (extraStyle || '');
      b.textContent = label;
      b.addEventListener('click', onClick);
      return b;
    }

    function save(body, onOk) {
      disableAll();
      setStatus('Saving…');
      body.task_id = d.id;
      const title = getTitle();
      if (title !== d.title) body.title = title;
      fetch('api/triage.php', {
        method: 'POST', headers: {'Content-Type':'application/json'},
        body: JSON.stringify(body),
      }).then(r => r.json()).then(data => {
        if (data.ok) { setStatus(''); if (onOk) onOk(); else setTimeout(() => loadSpeechBubble('lets-go.php'), 350); }
        else { setStatus(data.error || 'Could not save.'); enableAll(); }
      }).catch(() => { setStatus('Network error.'); enableAll(); });
    }

    // Step 1: Is this real?
    function s1() {
      setQ("Is this something you can actually do?");
      const el = actionsEl(); el.innerHTML = '';
      el.append(
        mkBtn("Yes, it's real", s2),
        mkBtn("Wait, I did that!", () => {
          disableAll();
          setStatus('Marking as done…');
          fetch(`api/mark_complete.api.php?task_id=${d.id}`)
            .then(r => r.json())
            .then(res => {
              if (res.success) updateProgressBar(res.pages, res.pages_target);
              setTimeout(() => loadSpeechBubble('lets-go.php'), 300);
            })
            .catch(() => setTimeout(() => loadSpeechBubble('lets-go.php'), 300));
        }, 'background:#4caf50;'),
        mkBtn("Maybe someday", () => save({action:'someday'}),
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);'),
        mkBtn("Not relevant — bin it", () => save({action:'delete'}),
          'background:transparent;color:#c0392b;border:1.5px solid #c0392b;')
      );
    }

    // Step 2: How long?
    function s2() {
      setQ("How long will it take?");
      const el = actionsEl(); el.innerHTML = '';
      el.append(mkBtn("Under 2 minutes", s3quick), mkBtn("More than 2 minutes", s3big));
    }

    // Step 3a: quick task — can you do it now?
    function s3quick() {
      setQ("Can you do it right now?");
      const el = actionsEl(); el.innerHTML = '';
      el.append(
        mkBtn("Yes — I'll do it now", doItNow),
        mkBtn("Not right now", s4,
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);')
      );
    }

    // Step 3b: big task — is there a 2-min first step?
    function s3big() {
      setQ("Is there a 2-minute step that moves this forward?");
      const el = actionsEl(); el.innerHTML = '';
      const inp = document.createElement('input');
      inp.type = 'text'; inp.placeholder = 'e.g. Look up the number'; inp.style.cssText = 'margin-bottom:0.4rem;';
      const addBtn = mkBtn("Add as first step (save as project)", () => {
        const firstStep = inp.value.trim();
        if (!firstStep) { setStatus('What is the first step?'); return; }
        save({ action: 'project', first_step: firstStep });
      });
      el.append(inp, addBtn,
        mkBtn("No — just add it to my list", () => save({action:'next_action'}),
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);'));
      inp.focus();
      inp.addEventListener('keydown', e => { if (e.key === 'Enter') addBtn.click(); });
    }

    // Do it now: save as next_action, offer Done button
    function doItNow() {
      save({ action: 'next_action' }, () => {
        setQ("Go do it!");
        setStatus('');
        const el = actionsEl(); el.innerHTML = '';
        const doneBtn = mkBtn("Done — mark it complete", () => {
          doneBtn.disabled = true;
          fetch(`api/mark_complete.api.php?task_id=${d.id}`)
            .then(r => r.json())
            .then(res => { if (res.success) updateProgressBar(res.pages, res.pages_target); })
            .finally(() => setTimeout(() => loadSpeechBubble('lets-go.php'), 300));
        }, 'background:#4caf50;');
        el.append(doneBtn,
          mkBtn("I'll do it later", () => loadSpeechBubble('lets-go.php'),
            'background:transparent;color:#888;border:1px solid #ddd;margin-top:2px;'));
      });
    }

    // Step 4: blockers
    function s4() {
      setQ("What's stopping you?");
      const el = actionsEl(); el.innerHTML = '';
      el.append(
        mkBtn("Wrong place / context", sContext),
        mkBtn("Wrong time of day", sTime),
        mkBtn("Snooze until a specific date", sDate),
        mkBtn("Need to buy or get something first", sPrereq)
      );
    }

    // Blocker: context
    function sContext() {
      setQ("Where does this need to happen?");
      const el = actionsEl(); el.innerHTML = '';
      const wrap = document.createElement('div');
      wrap.style.cssText = 'display:flex;gap:6px;flex-wrap:wrap;';
      ['Home','Work','Shops','Online','Phone'].forEach(ctx =>
        wrap.appendChild(mkBtn(ctx, () => save({action:'next_action', context:ctx.toLowerCase()}),
          'width:auto;flex:1;min-width:70px;'))
      );
      el.appendChild(wrap);
    }

    // Blocker: time of day
    function sTime() {
      const fmtDate = dt => `${dt.getFullYear()}-${String(dt.getMonth()+1).padStart(2,'0')}-${String(dt.getDate()).padStart(2,'0')}`;
      const now = new Date();
      const tom = new Date(now); tom.setDate(tom.getDate() + 1);
      const tonight  = fmtDate(now) + 'T20:00:00';
      const tomorrow = fmtDate(tom) + 'T08:00:00';
      setQ("When would work better?");
      const el = actionsEl(); el.innerHTML = '';
      el.append(
        mkBtn("Tonight", () => save({action:'next_action', scheduled_date: tonight})),
        mkBtn("Tomorrow morning", () => save({action:'next_action', scheduled_date: tomorrow})),
        mkBtn("No rush — just add it to my list", () => save({action:'next_action'}),
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);')
      );
    }

    // Blocker: specific date
    function sDate() {
      setQ("Show it to me after...");
      const el = actionsEl(); el.innerHTML = '';
      const inp = document.createElement('input');
      inp.type = 'date'; inp.style.cssText = 'margin-bottom:0.4rem;';
      const min = new Date(); min.setDate(min.getDate() + 1);
      inp.min = min.toISOString().substring(0, 10);
      const saveBtn = mkBtn("Snooze until this date", () => {
        if (!inp.value) { setStatus('Pick a date.'); return; }
        save({ action: 'next_action', scheduled_date: inp.value });
      });
      el.append(inp, saveBtn);
    }

    // Blocker: need to acquire something
    function sPrereq() {
      setQ("What do you need to buy or get first?");
      const el = actionsEl(); el.innerHTML = '';
      const inp = document.createElement('input');
      inp.type = 'text'; inp.placeholder = 'e.g. Iron-on number labels'; inp.style.cssText = 'margin-bottom:0.4rem;';
      const saveBtn = mkBtn("Add as a task and keep this one", () => {
        const prereq = inp.value.trim();
        if (!prereq) { setStatus('What do you need?'); return; }
        disableAll();
        setStatus('Saving…');
        fetch('api/add_task.php', {
          method: 'POST', headers: {'Content-Type':'application/json'},
          body: JSON.stringify({ title: prereq, urgency: 'medium', task_type: 'next_action' }),
        }).then(() => fetch('api/triage.php', {
          method: 'POST', headers: {'Content-Type':'application/json'},
          body: JSON.stringify({ task_id: d.id, action: 'next_action', title: getTitle() }),
        })).then(r => r.json()).then(data => {
          if (data.ok) setTimeout(() => loadSpeechBubble('lets-go.php'), 350);
          else { setStatus(data.error || 'Could not save.'); enableAll(); }
        }).catch(() => { setStatus('Network error.'); enableAll(); });
      });
      el.append(inp, saveBtn);
      inp.focus();
      inp.addEventListener('keydown', e => { if (e.key === 'Enter') saveBtn.click(); });
    }

    s1();
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
