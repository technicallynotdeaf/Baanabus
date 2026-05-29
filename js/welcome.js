window.initWelcome = function() {
  'use strict';

  const wizard = document.getElementById('setup-wizard');
  if (!wizard) return;
  const STATE = JSON.parse(wizard.dataset.state);
  let currentStep = 1;

  window.wizTo = function(n) {
    document.getElementById('wiz-' + currentStep).style.display = 'none';
    currentStep = n;
    document.getElementById('wiz-' + n).style.display = 'block';
    document.querySelectorAll('.wiz-dot').forEach(d => {
      d.classList.toggle('active', parseInt(d.dataset.step) <= n);
    });
    if (n === 4) tttInit();
  };

  window.pickPb = function(choice, btn) {
    document.querySelectorAll('#wiz-2 .wiz-choice').forEach(b => b.classList.remove('wiz-chosen'));
    btn.classList.add('wiz-chosen');
    document.getElementById('wiz-sheep-2').textContent = choice === 'smooth' ? '🐑😌' : '🐑😤';
    const reactions = { smooth: 'Classic. Respectable.', crunchy: 'Bold choice. I respect it.' };
    document.getElementById('pb-reaction').textContent = reactions[choice];
    document.getElementById('pb-next').style.display = 'inline-flex';
    apiPost({ step: 'preferences', peanut_butter: choice });
  };

  window.pickHabitica = function(yes) {
    document.querySelectorAll('#wiz-3 .wiz-choice').forEach(b => b.disabled = true);
    if (yes) {
      document.getElementById('hab-fields').style.display = 'block';
    } else {
      apiPost({ step: 'habitica', uses_habitica: false });
      document.getElementById('hab-next').style.display = 'inline-flex';
    }
  };

  window.saveHabitica = async function() {
    const userId = document.getElementById('hab-user').value.trim();
    const apiKey = document.getElementById('hab-key').value.trim();
    const err = document.getElementById('hab-error');
    if (!userId || !apiKey) { err.textContent = 'Both fields required.'; return; }
    err.textContent = '';
    await apiPost({ step: 'habitica', uses_habitica: true, user_id: userId, api_key: apiKey });
    wizTo(4);
  };

  let board, gameOver;

  function tttInit() {
    board = Array(9).fill(null);
    gameOver = false;
    document.getElementById('ttt-msg').textContent = "I'm a sheep. I'm not great at this.";
    document.getElementById('ttt-sheep').textContent = '🐑';
    document.getElementById('ttt-next').style.display = 'none';
    document.getElementById('ttt-reset').style.display = 'none';
    renderBoard();
  }
  window.tttReset = tttInit;

  function renderBoard() {
    const el = document.getElementById('ttt-board');
    el.innerHTML = '';
    board.forEach((v, i) => {
      const cell = document.createElement('button');
      cell.className = 'ttt-cell' + (v === 'X' ? ' ttt-x' : v === 'O' ? ' ttt-o' : '');
      cell.textContent = v || '';
      cell.disabled = !!v || gameOver;
      cell.addEventListener('click', () => playerMove(i));
      el.appendChild(cell);
    });
  }

  function playerMove(i) {
    if (gameOver || board[i]) return;
    board[i] = 'X';
    renderBoard();
    const w = winner(board);
    if (w) { endGame(w); return; }
    if (board.every(Boolean)) { endGame('draw'); return; }
    document.getElementById('ttt-msg').textContent = '🐑 Hmm...';
    setTimeout(sheepMove, 650);
  }

  function sheepMove() {
    const empty = board.map((v,i) => v ? null : i).filter(i => i !== null);
    if (!empty.length) return;
    board[empty[Math.floor(Math.random() * empty.length)]] = 'O';
    renderBoard();
    const w = winner(board);
    if (w) { endGame(w); return; }
    if (board.every(Boolean)) { endGame('draw'); return; }
    document.getElementById('ttt-msg').textContent = 'Your move.';
  }

  function endGame(w) {
    gameOver = true;
    renderBoard();
    const sheep = document.getElementById('ttt-sheep');
    const msg   = document.getElementById('ttt-msg');
    if (w === 'X')      { sheep.textContent = '🐑😅'; msg.textContent = "You win! I wasn't ready."; }
    else if (w === 'O') { sheep.textContent = '🐑😤'; msg.textContent = "I win! Huh. Didn't expect that."; }
    else                { sheep.textContent = '🐑🤝'; msg.textContent = 'A draw. Respectable.'; }
    document.getElementById('ttt-reset').style.display = 'inline-flex';
    document.getElementById('ttt-next').style.display  = 'inline-flex';
  }

  function winner(b) {
    const lines = [[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]];
    for (const [a,c,d] of lines) {
      if (b[a] && b[a] === b[c] && b[a] === b[d]) return b[a];
    }
    return null;
  }

  window.completeSetup = async function(btn) {
    btn.disabled = true;
    btn.textContent = 'Setting up…';
    await apiPost({ step: 'complete' });
    location.reload();
  };

  function apiPost(data) {
    return fetch('api/onboarding.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
      credentials: 'same-origin'
    }).catch(console.error);
  }

  if (STATE.startStep > 1) {
    wizTo(STATE.startStep);
  }

  if (STATE.habUser) document.getElementById('hab-user').value = STATE.habUser;
  if (STATE.habKey)  document.getElementById('hab-key').value  = STATE.habKey;

  if (STATE.usesHabitica === true) {
    document.querySelectorAll('#wiz-3 .wiz-choice').forEach(b => b.disabled = true);
    document.getElementById('hab-fields').style.display = 'block';
  } else if (STATE.usesHabitica === false) {
    document.querySelectorAll('#wiz-3 .wiz-choice').forEach(b => b.disabled = true);
    document.getElementById('hab-next').style.display = 'inline-flex';
  }
};
