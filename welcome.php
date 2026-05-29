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
<div id="setup-wizard" data-init="initWelcome" data-state='<?= htmlspecialchars($state, ENT_QUOTES, 'UTF-8') ?>'>

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
    <button class="btn" onclick="wizTo(2)">Let's go &rarr;</button>
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
    <button class="btn" id="pb-next" style="display:none; margin-top:0.5rem;" onclick="wizTo(3)">Next &rarr;</button>
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
      <p class="hint" style="margin-bottom:0.75rem;">Settings &rarr; API in Habitica</p>
      <button class="btn" onclick="saveHabitica()">Save &amp; continue &rarr;</button>
      <p id="hab-error" class="muted" style="color:crimson; min-height:1.2em;"></p>
    </div>
    <button class="btn" id="hab-next" style="display:none; margin-top:0.75rem;" onclick="wizTo(4)">Next &rarr;</button>
  </div>

  <!-- Step 4: Tic-tac-toe -->
  <div class="wiz-step" id="wiz-4" style="display:none">
    <div class="wiz-sheep" id="ttt-sheep">🐑</div>
    <p class="muted">One more thing.</p>
    <h2>Play me.</h2>
    <p class="muted" id="ttt-msg">I'm a sheep. I'm not great at this.</p>
    <div id="ttt-board"></div>
    <button class="btn btn-secondary" id="ttt-reset" style="display:none; margin-right:0.5rem;" onclick="tttReset()">Play again</button>
    <button class="btn" id="ttt-next" style="display:none;" onclick="wizTo(5)">Almost done &rarr;</button>
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
