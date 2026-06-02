window.initLetsGo = function() {
  'use strict';

  const c = document.getElementById('activity-container');
  if (!c) return;

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

  fetch('api/next_activity.php')
    .then(r => r.json())
    .then(render)
    .catch(() => { c.innerHTML = '<p class="muted">Could not load next activity.</p>'; });

  function render(d) {
    switch (d.type) {
      case 'task':           renderTask(d);          break;
      case 'return_welcome':   renderReturnWelcome(d);   break;
      case 'comeback_callout': renderComebackCallout(d); break;
      case 'fun_task':       renderFunTask(d);       break;
      case 'easy_task':      renderEasyTask(d);      break;
      case 'joke':           renderJoke(d);          break;
      case 'nutrition':      renderNutrition(d);     break;
      case 'trivia':         renderTrivia(d);        break;
      case 'study':          renderStudy(d);         break;
      case 'minigame':       renderMinigame(d);      break;
      case 'triage':         renderTriage(d);        break;
      case 'bedtime':        renderBedtime(d);       break;
      case 'topic_picker':   renderTopicPicker(d);   break;
      case 'reset_msg':      renderResetMsg(d);      break;
      case 'quote':          renderQuote(d);         break;
      case 'tip':            renderTip(d);           break;
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
    if (d.subtasks && d.subtasks.length > 0) {
      renderBlockTask(d);
    } else {
      c.innerHTML = `
        <p style="margin-bottom:0.75rem;">${esc(d.title)}</p>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
          <button class="action-button" onclick="markAsDone(${d.id})">Done</button>
          <button class="action-button" onclick="window._showBlocked(${d.id})">Blocked</button>
          <button class="action-button" onclick="snoozeTask(${d.id})">Snooze</button>
        </div>`;
    }
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

  function renderFunTask(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Take a moment</p>
      <p style="line-height:1.5;margin-bottom:0.75rem;">${esc(d.text)}</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" onclick="window._funDone()">Done</button>
        <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
          onclick="loadSpeechBubble('lets-go.php')">Skip</button>
      </div>`;
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

  function renderEasyTask(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Easy win</p>
      <p style="line-height:1.5;margin-bottom:0.75rem;">${esc(d.text)}</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" onclick="window._easyDone()">Done</button>
        <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
          onclick="loadSpeechBubble('lets-go.php')">Skip</button>
      </div>`;
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

    opts.append(
      mkBtn("Wrong place right now",          () => sendBlocked('wrong_place')),
      mkBtn("Not enough energy for this",     () => sendBlocked('low_energy')),
      mkBtn("Need a longer stretch of time",  () => sendBlocked('no_time')),
      mkBtn("Waiting on something else first",() => sendBlocked('waiting_on')),
      mkBtn("Not sure what to do with it",    () => sendBlocked('too_vague')),
    );

    // "Waiting for a date" needs inline date input
    const dateRow = document.createElement('div');
    dateRow.style.cssText = 'display:flex;gap:8px;align-items:center;';
    const dateInput = document.createElement('input');
    dateInput.type = 'date';
    dateInput.min  = new Date(Date.now() + 86400000).toISOString().slice(0, 10);
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
        <button class="action-button" onclick="window._showBlocked(${d.id})">Blocked</button>
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
            updateProgressBar(data.pages, data.pages_target, data.total_pages);
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
      c.innerHTML = `<p style="font-weight:600;">You've mastered all the trivia topics!</p>
        <p class="muted">More topics coming soon. In the meantime, keep completing tasks.</p>
        <button class="action-button" style="margin-top:0.5rem;" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
      return;
    }
    const btns = d.topics.map(topic =>
      `<button class="action-button" style="width:100%;" onclick="window._pickTopic(${JSON.stringify(topic)})">${esc(topic)}</button>`
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
      const pct = Math.round(d.once_correct / d.total * 100);
      return `<div style="height:4px;background:#e0d8cc;border-radius:2px;margin-bottom:0.55rem;">
        <div style="height:4px;background:#7a9e7e;border-radius:2px;width:${pct}%;transition:width 0.4s;"></div>
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

  function renderBedtime(d) {
    c.innerHTML = `
      <p style="font-size:1.05em;line-height:1.5;margin-bottom:0.9rem;">${esc(d.message)}</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">...</button>`;
  }

  function renderTriage(d) {
    const question  = d.question || 'actionable';
    const label     = d.source === 'fill' ? 'Quick question' : 'Inbox';
    const questions = {
      actionable: 'Is this still something you need to do?',
      duration:   'Roughly how long does this take?',
      first_step: 'Is there a quick 2-minute step that moves this forward?',
      energy:     'How much energy does this take?',
      context:    'Which area of your life does this belong to?',
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
        if (data.ok) setTimeout(() => loadSpeechBubble('lets-go.php'), 350);
        else { setStatus(data.error || 'Could not save.'); el.querySelectorAll('button').forEach(b => b.disabled = false); }
      }).catch(() => { setStatus('Network error.'); el.querySelectorAll('button').forEach(b => b.disabled = false); });
    }

    if (question === 'actionable') {
      el.append(
        mkBtn("Yes, it's real", () => save({action:'mark_actionable'})),
        mkBtn("Wait, I already did that!", () => {
          el.querySelectorAll('button').forEach(b => b.disabled = true);
          setStatus('Marking done…');
          fetch(`api/mark_complete.api.php?task_id=${d.id}`)
            .then(r => r.json())
            .then(res => { if (res.success) updateProgressBar(res.pages, res.pages_target, res.total_pages); })
            .finally(() => setTimeout(() => loadSpeechBubble('lets-go.php'), 300));
        }, 'background:#4caf50;'),
        mkBtn("Maybe someday", () => save({action:'someday'}),
          'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);'),
        mkBtn("Not relevant — bin it", () => save({action:'delete'}),
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

    } else if (question === 'context') {
      const contexts = d.contexts || [];
      const sel = document.createElement('select');
      sel.style.cssText = 'width:100%;box-sizing:border-box;margin-bottom:0.5rem;padding:0.35rem 0.4rem;font-size:0.95rem;border:1px solid #ccc;border-radius:6px;';
      sel.innerHTML = `<option value="">Choose an area…</option>` +
        contexts.map(ctx => `<option value="${esc(ctx)}">${esc(ctx)}</option>`).join('');
      const saveBtn = mkBtn("Save", () => {
        if (!sel.value) { setStatus('Pick an area first.'); return; }
        save({action:'save_context', context: sel.value});
      });
      const skipStyle = 'background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);';
      el.append(sel, saveBtn,
        mkBtn("Doesn't apply", () => save({action:'save_context', context:' '}), skipStyle));
    }
  }

  function renderTip(d) {
    c.innerHTML = `
      <p style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Tip</p>
      <p style="line-height:1.6;margin-bottom:0.75rem;">${esc(d.text)}</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Got it</button>`;
  }

  function renderQuote(d) {
    const acks = ['Got it', 'I hear this', 'Cool', 'OK', 'Next'];
    const btn  = acks[Math.floor(Math.random() * acks.length)];
    c.innerHTML = `
      <p style="font-style:italic;line-height:1.6;margin-bottom:0.75rem;">"${esc(d.text)}"</p>
      <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">${btn}</button>`;
  }

  function renderMissingInfo(d) {
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
        <div id="gm-msg" style="text-align:center;min-height:1.5em;padding-top:8px;"></div>
        <div id="gm-btns" style="display:flex;gap:8px;justify-content:center;padding-top:4px;"></div>`;
    overlayEl.style.display = 'block';

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

    let grid = [], score = 0, moves = START_MOVES, sel = null;
    let state = 'IDLE', rafId = null;
    let animT = 0, animDur = 0, swapA = null, matchSet = new Set(), fallData = [];

    const gxy  = (r,c) => [c*(GEM+GAP), r*(GEM+GAP)];
    const rnd  = ()    => Math.floor(Math.random() * N_COLORS); // always normal (type 0)
    const eIO  = t     => t<0.5 ? 2*t*t : -1+(4-2*t)*t;
    const eOut = t     => 1 - Math.pow(1-t, 3);

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
            toRemove.delete(`${h.r},${v.c}`); // bomb cell stays
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

    // Expand the removal set by activating any specials it contains (chain-reactive)
    function expandSpecials(ms) {
      let changed=true;
      while (changed) {
        changed=false;
        for (const key of [...ms]) {
          const [r,c]=key.split(',').map(Number);
          const type=gemType(grid[r][c]);
          if (type===1) { // hline: blast row
            for (let cc=0;cc<COLS;cc++) if (!ms.has(`${r},${cc}`)) { ms.add(`${r},${cc}`); changed=true; }
          } else if (type===2) { // vline: blast column
            for (let rr=0;rr<ROWS;rr++) if (!ms.has(`${rr},${c}`)) { ms.add(`${rr},${c}`); changed=true; }
          } else if (type===3) { // star: blast all gems of same colour
            const col=gemColor(grid[r][c]);
            for (let rr=0;rr<ROWS;rr++) for (let cc=0;cc<COLS;cc++)
              if (gemColor(grid[rr][cc])===col && !ms.has(`${rr},${cc}`)) { ms.add(`${rr},${cc}`); changed=true; }
          } else if (type===4) { // bomb: blast 3×3 area
            for (let dr=-1;dr<=1;dr++) for (let dc=-1;dc<=1;dc++) {
              if (!dr&&!dc) continue;
              const rr=r+dr, cc=c+dc;
              if (rr>=0&&rr<ROWS&&cc>=0&&cc<COLS&&!ms.has(`${rr},${cc}`)) { ms.add(`${rr},${cc}`); changed=true; }
            }
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
      if (s) s.innerHTML=`Score: <b>${score}</b>&nbsp;|&nbsp;Moves: <b>${moves}</b>`;
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
            if (ms) { matchSet=ms; score+=ms.size*10; updateUI(); animT=0; animDur=350; state='MATCH'; }
            else { [grid[r1][c1],grid[r2][c2]]=[grid[r2][c2],grid[r1][c1]]; animT=0; animDur=160; state='BACK'; }
          } else {
            state='IDLE';
            if (moves<=0) endGame(); else checkNoMoves();
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
          if (cascade) { matchSet=cascade; score+=cascade.size*15; updateUI(); animT=0; animDur=350; state='MATCH'; }
          else if (moves<=0) endGame();
          else { state='IDLE'; checkNoMoves(); }
        }
      }

      rafId=requestAnimationFrame(loop);
    }

    function endGame() {
      state='GAMEOVER';
      ctx.clearRect(0,0,canvas.width,canvas.height);
      for (let r=0;r<ROWS;r++) for (let c=0;c<COLS;c++) {
        drawSlot(r,c); const[x,y]=gxy(r,c); drawGem(x,y,grid[r][c],0.35,1);
      }
      const msg=document.getElementById('gm-msg'),btns=document.getElementById('gm-btns');
      if (score>=200) { earnPip(); if(msg) msg.textContent=`Score: ${score} — nice work!`; }
      else            { if(msg) msg.textContent=`Score: ${score} — better luck next time`; }
      if (btns) btns.innerHTML=`
          <button class="action-button" onclick="window._gmRestart()">Play again</button>
          <button class="action-button btn-secondary"
            onclick="document.getElementById('overlay').style.display='none';document.getElementById('overlay-body').innerHTML='';loadSpeechBubble('lets-go.php');">
            Next task</button>`;
      window._gmRestart=function() {
        initGrid(); score=0; moves=START_MOVES; sel=null; updateUI();
        document.getElementById('gm-msg').textContent='';
        document.getElementById('gm-btns').innerHTML='';
        state='IDLE'; rafId=requestAnimationFrame(loop);
      };
    }

    function activateSpecial(r,c) {
      if (moves<=0||state!=='IDLE') return;
      moves--; updateUI(); sel=null;
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

    initGrid(); updateUI();
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
};
