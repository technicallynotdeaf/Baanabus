<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
if (empty($_SESSION['is_authenticated'])) { exit; }

$cfg      = [];
$cassowary = [];
try { $cfg      = getConfig()     ?? []; } catch (Throwable $e) {}
try { $cassowary = getCassowary() ?? []; } catch (Throwable $e) {}

$prefs       = $cfg['preferences'] ?? [];
$hasPb       = isset($prefs['peanut_butter']);
$pbChoice    = $prefs['peanut_butter'] ?? null;
$hasHabitica = array_key_exists('uses_habitica', $prefs);
$usesHabitica = $prefs['uses_habitica'] ?? false;
$habUser     = $cassowary['habitica']['user_id'] ?? '';
$habKey      = $cassowary['habitica']['api_key']  ?? '';

// First unanswered step: 1=welcome, 2=pb, 3=habitica, 4=ttt, 5=done
if (!$hasPb)       $startStep = 1;
elseif (!$hasHabitica) $startStep = 3;
else               $startStep = 4;

$state = json_encode([
    'startStep'    => $startStep,
    'pbChoice'     => $pbChoice,
    'usesHabitica' => $hasHabitica ? $usesHabitica : null,
    'habUser'      => $habUser,
    'habKey'       => $habKey,
], JSON_UNESCAPED_SLASHES);
?>
<div id="setup-wizard">

  <!-- Progress dots -->
  <div class="wiz-progress">
    <span class="wiz-dot active" data-step="1" title="Welcome"></span>
    <span class="wiz-dot" data-step="2" title="Peanut butter"></span>
    <span class="wiz-dot" data-step="3" title="Habitica"></span>
    <span class="wiz-dot" data-step="4" title="Game"></span>
  </div>

  <!-- Step 1: Welcome -->
  <div class="wiz-step" id="wiz-1">
    <div class="wiz-sheep" id="wiz-sheep">🐑</div>
    <h2>Hey there. I'm Baanabus.</h2>
    <p>I'm here to help you get stuff done — without the overwhelm.</p>
    <p class="muted">Quick setup. A couple of questions. One game.</p>
    <button class="btn" onclick="wizTo(2)">Let's go →</button>
  </div>

  <!-- Step 2: Peanut butter -->
  <div class="wiz-step" id="wiz-2" style="display:none">
    <div class="wiz-sheep" id="wiz-sheep-2">🐑</div>
    <p class="muted">Question 1 of 2</p>
    <h2>Peanut butter.</h2>
    <p>Smooth or crunchy?</p>
    <div class="wiz-choices">
      <button class="btn wiz-choice" onclick="pickPb('smooth', this)">🫙 Smooth</button>
      <button class="btn btn-secondary wiz-choice" onclick="pickPb('crunchy', this)">🥜 Crunchy</button>
    </div>
    <p id="pb-reaction" class="muted" style="min-height:1.6em; margin-top:0.75rem;"></p>
    <button class="btn" id="pb-next" style="display:none; margin-top:0.5rem;" onclick="wizTo(3)">Next →</button>
  </div>

  <!-- Step 3: Habitica -->
  <div class="wiz-step" id="wiz-3" style="display:none">
    <div class="wiz-sheep">🐑</div>
    <p class="muted">Question 2 of 2</p>
    <h2>Do you use Habitica?</h2>
    <p class="muted">I can sync your completed tasks with it.</p>
    <div class="wiz-choices">
      <button class="btn wiz-choice" id="hab-yes-btn" onclick="pickHabitica(true)">Yes, I use it</button>
      <button class="btn btn-secondary wiz-choice" id="hab-no-btn" onclick="pickHabitica(false)">Nope</button>
    </div>
    <div id="hab-fields" style="display:none; margin-top:1.25rem; text-align:left;">
      <input type="text" id="hab-user" placeholder="Habitica User ID" style="margin-bottom:0.5rem;">
      <input type="text" id="hab-key" placeholder="Habitica API Key" style="margin-bottom:0.25rem;">
      <p class="hint" style="margin-bottom:0.75rem;">Settings → API in Habitica</p>
      <button class="btn" onclick="saveHabitica()">Save & continue →</button>
      <p id="hab-error" class="muted" style="color:crimson; min-height:1.2em;"></p>
    </div>
    <button class="btn" id="hab-next" style="display:none; margin-top:0.75rem;" onclick="wizTo(4)">Next →</button>
  </div>

  <!-- Step 4: Tic-tac-toe -->
  <div class="wiz-step" id="wiz-4" style="display:none">
    <div class="wiz-sheep" id="ttt-sheep">🐑</div>
    <p class="muted">One more thing.</p>
    <h2>Play me.</h2>
    <p class="muted" id="ttt-msg">I'm a sheep. I'm not great at this.</p>
    <div id="ttt-board"></div>
    <button class="btn btn-secondary" id="ttt-reset" style="display:none; margin-right:0.5rem;" onclick="tttReset()">Play again</button>
    <button class="btn" id="ttt-next" style="display:none;" onclick="wizTo(5)">Almost done →</button>
  </div>

  <!-- Step 5: Done -->
  <div class="wiz-step" id="wiz-5" style="display:none">
    <div class="wiz-sheep">🐑✨</div>
    <h2>You're all set!</h2>
    <p>Your workspace is ready.</p>
    <p class="muted">Let's get to work.</p>
    <button class="btn" onclick="completeSetup(this)">Let's go! 🐑</button>
  </div>

</div><!-- #setup-wizard -->

<script>
(function () {
  'use strict';

  const STATE = <?= $state ?>;
  let currentStep = 1;

  // ---- Navigation ----
  window.wizTo = function(n) {
    document.getElementById('wiz-' + currentStep).style.display = 'none';
    currentStep = n;
    document.getElementById('wiz-' + n).style.display = 'block';
    document.querySelectorAll('.wiz-dot').forEach(d => {
      d.classList.toggle('active', parseInt(d.dataset.step) <= n);
    });
    if (n === 4) tttInit();
  };

  // ---- Peanut butter ----
  window.pickPb = function(choice, btn) {
    document.querySelectorAll('#wiz-2 .wiz-choice').forEach(b => b.classList.remove('wiz-chosen'));
    btn.classList.add('wiz-chosen');
    document.getElementById('wiz-sheep-2').textContent = choice === 'smooth' ? '🐑😌' : '🐑😤';
    const reactions = { smooth: 'Classic. Respectable.', crunchy: 'Bold choice. I respect it.' };
    document.getElementById('pb-reaction').textContent = reactions[choice];
    document.getElementById('pb-next').style.display = 'inline-flex';
    apiPost({ step: 'preferences', peanut_butter: choice });
  };

  // ---- Habitica ----
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

  // ---- Tic-tac-toe ----
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

  // ---- Complete ----
  window.completeSetup = async function(btn) {
    btn.disabled = true;
    btn.textContent = 'Setting up…';
    await apiPost({ step: 'complete' });
    location.reload();
  };

  // ---- API helper ----
  function apiPost(data) {
    return fetch('api/onboarding.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
      credentials: 'same-origin'
    }).catch(console.error);
  }

  // ---- Resume at the right step ----
  if (STATE.startStep > 1) {
    wizTo(STATE.startStep);
  }

  // Pre-fill Habitica fields if already saved
  if (STATE.habUser) document.getElementById('hab-user').value = STATE.habUser;
  if (STATE.habKey)  document.getElementById('hab-key').value  = STATE.habKey;

  // If habitica was already answered, show the fields or the next button
  if (STATE.usesHabitica === true) {
    document.querySelectorAll('#wiz-3 .wiz-choice').forEach(b => b.disabled = true);
    document.getElementById('hab-fields').style.display = 'block';
  } else if (STATE.usesHabitica === false) {
    document.querySelectorAll('#wiz-3 .wiz-choice').forEach(b => b.disabled = true);
    document.getElementById('hab-next').style.display = 'inline-flex';
  }

})();
</script>
