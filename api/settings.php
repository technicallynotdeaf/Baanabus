<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) {
    echo '<p class="muted">Not authenticated.</p>';
    exit;
}

$vaultOpen = !empty($_SESSION['DEK']);
$cfg       = [];
$cassowary = [];
if ($vaultOpen) {
    try { $cfg       = getConfig() ?? []; }   catch (Throwable $e) { $cfg = []; }
    try { $cassowary = getCassowary() ?? []; } catch (Throwable $e) { $cassowary = []; }
}

$nickname     = $cfg['nickname'] ?? '';
$habiticaUser = $cassowary['habitica']['user_id'] ?? '';
$habiticaKey  = $cassowary['habitica']['api_key']  ?? '';
$checkinOn    = $cfg['checkin_enabled'] ?? true;

// Game preferences
$allGames = [
    'gemMatch'    => 'Gem Match',
    'tictactoe'   => 'Tic-tac-toe',
    'numguess'    => 'Number Guess',
    'rps'         => 'Rock Paper Scissors',
    'mathquiz'    => 'Maths Quiz',
    'truefalse'   => 'True or False',
    'sequence'    => 'Sequences',
    'reaction'    => 'Reaction Time',
    'wordscramble'=> 'Word Scramble',
    'highlow'     => 'High or Low',
];
$gamePref     = $cfg['game_prefs'] ?? [];
$gamesEnabled = $gamePref['enabled'] ?? true;
$gameToggles  = $gamePref['minigames'] ?? [];

// Enrolled passkeys
$enrolledKeys = [];
if ($vaultOpen) {
    $credsDir = __DIR__ . '/../data/creds';
    if (is_dir($credsDir)) {
        foreach (glob("$credsDir/*.json") ?: [] as $f) {
            $c = json_decode(file_get_contents($f), true);
            if (($c['userId'] ?? '') === $_SESSION['user_id']) {
                $transports = $c['transports'] ?? [];
                $hint = in_array('usb', $transports) ? 'USB' : (in_array('nfc', $transports) ? 'NFC' : (in_array('internal', $transports) ? 'device' : ''));
                $enrolledKeys[] = [
                    'credId'    => $c['credentialId'] ?? '',
                    'label'     => $c['label'] ?? '',
                    'hint'      => $hint,
                    'createdAt' => substr($c['createdAt'] ?? '', 0, 10),
                ];
            }
        }
    }
}

// Diary data (last 14 days) for wellness tab
$diaryEntries = [];
if ($vaultOpen) {
    try {
        $all = getDiary();
        krsort($all);
        $energyLabels  = [1 => 'Exhausted', 2 => 'Low', 3 => 'Okay', 4 => 'Good', 5 => 'On fire'];
        $dayTypeLabels = [1 => 'Home', 2 => 'Work', 3 => 'Out', 4 => 'Rest'];
        $count = 0;
        foreach ($all as $date => $entry) {
            if ($count++ >= 14) break;
            $diaryEntries[] = [
                'date'    => $date,
                'energy'  => $energyLabels[(int)($entry['energy_level'] ?? 0)] ?? '',
                'dayType' => $dayTypeLabels[(int)($entry['day_type'] ?? 0)] ?? '',
            ];
        }
    } catch (Throwable $e) {}
}

// Trivia stats
$triviaStats = [];
if ($database) {
    try {
        $stmt = $database->query("
            SELECT sq.set_name,
                   COUNT(*) AS total,
                   SUM(CASE WHEN qs.correct_count >= 2 THEN 1 ELSE 0 END) AS mastered
            FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'trivia'
            GROUP BY sq.set_name
            ORDER BY sq.set_name
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $triviaStats[$row['set_name']] = [
                'total'   => (int)$row['total'],
                'mastered'=> (int)$row['mastered'],
            ];
        }
    } catch (Throwable $e) {}
}
$allTopics    = ['Plants', 'Pop Music', 'Food'];
$lockedTopics = array_values(array_filter($allTopics, fn($t) => !isset($triviaStats[$t])));

// Study stats (exam questions, q_type = 'study')
$studyStats = [];
if ($database) {
    try {
        $stmt = $database->query("
            SELECT sq.set_name,
                   COUNT(*) AS total,
                   SUM(CASE WHEN qs.correct_count >= 2 THEN 1 ELSE 0 END) AS mastered
            FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'study'
            GROUP BY sq.set_name
            ORDER BY sq.set_name
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $studyStats[$row['set_name']] = [
                'total'   => (int)$row['total'],
                'mastered'=> (int)$row['mastered'],
            ];
        }
    } catch (Throwable $e) {}
}
?>
<div data-init="initSettings">
  <h2 style="margin-bottom:0.75rem;">Settings</h2>

  <div class="settings-tabs" role="tablist">
    <button class="settings-tab active" data-tab="account"  role="tab">Account</button>
    <button class="settings-tab"        data-tab="games"    role="tab">Games</button>
    <button class="settings-tab"        data-tab="wellness" role="tab">Wellness</button>
    <button class="settings-tab"        data-tab="trivia"   role="tab">Trivia</button>
  </div>

  <!-- ===== ACCOUNT ===== -->
  <div id="tab-account" class="settings-panel">

    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.5rem;">Your name</h3>
      <?php if ($vaultOpen): ?>
        <form id="nickname-form">
          <label style="display:block;margin-bottom:0.4rem;font-size:0.9em;color:#555;">What should the sheep call you?</label>
          <input type="text" id="nickname-input" name="nickname" value="<?= htmlspecialchars($nickname) ?>" placeholder="e.g. Alison" maxlength="50">
          <button type="submit" class="btn" style="margin-top:0.75rem;">Save</button>
          <p id="nicknameStatus" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
        </form>
      <?php else: ?>
        <p class="muted">Vault locked.</p>
      <?php endif; ?>
    </div>

    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.75rem;">Passkeys</h3>
      <?php if ($vaultOpen): ?>
        <?php if ($enrolledKeys): ?>
        <div style="margin-bottom:1rem;">
          <?php foreach ($enrolledKeys as $k): ?>
          <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 0;border-bottom:1px solid rgba(0,0,0,0.06);gap:8px;">
            <div>
              <span style="font-size:0.95em;font-weight:500;"><?= htmlspecialchars($k['label'] ?: 'Unnamed key') ?></span>
              <?php if ($k['hint']): ?>
                <span class="muted" style="font-size:0.8em;margin-left:5px;">(<?= htmlspecialchars($k['hint']) ?>)</span>
              <?php endif; ?>
              <span class="muted" style="font-size:0.8em;margin-left:6px;"><?= htmlspecialchars($k['createdAt']) ?></span>
            </div>
            <button class="btn btn-secondary" style="font-size:0.8em;padding:4px 10px;min-height:30px;color:#c0392b;border-color:#c0392b;"
              data-revoke="<?= htmlspecialchars($k['credId']) ?>"
              data-label="<?= htmlspecialchars($k['label'] ?: 'this key') ?>">Revoke</button>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <label style="display:block;font-size:0.88em;color:#555;margin-bottom:0.3rem;">Name this key</label>
        <input type="text" id="enroll-label-input" placeholder="e.g. YubiKey, Pixel 8" maxlength="60" style="margin-bottom:0.75rem;">
        <button id="btn-enroll-device" class="btn" style="width:100%;margin-bottom:0.35rem;">Add passkey on this device</button>
        <button id="btn-enroll-key" class="btn btn-secondary" style="width:100%;margin-bottom:0.35rem;">Register hardware key (USB/NFC)</button>
        <p id="enrollStatus" class="muted" style="margin-top:0.25rem;min-height:1.4em;"></p>
      <?php else: ?>
        <p class="muted">Vault locked — sign in from a device that can unlock it to manage keys.</p>
      <?php endif; ?>
    </div>

    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.5rem;">Agent API keys</h3>
      <?php if ($vaultOpen): ?>
        <p class="muted" style="margin-bottom:0.75rem;font-size:0.88em;">Each key can decrypt your vault — treat it like a password. Revoke when done.</p>
        <?php $existingKeys = $cassowary['api_keys'] ?? []; ?>
        <?php if ($existingKeys): ?>
        <div id="api-key-list" style="margin-bottom:0.75rem;">
          <?php foreach ($existingKeys as $kid => $meta): ?>
          <div class="api-key-row" style="display:flex;align-items:center;justify-content:space-between;padding:6px 0;border-bottom:1px solid #f0f0f0;gap:8px;" data-kid="<?= htmlspecialchars($kid) ?>">
            <div>
              <span style="font-size:0.9em;font-weight:500;"><?= htmlspecialchars($meta['label'] ?? 'Key') ?></span>
              <span class="muted" style="font-size:0.8em;margin-left:6px;"><?= htmlspecialchars(substr($meta['created_at'] ?? '', 0, 10)) ?></span>
            </div>
            <button class="btn-revoke action-button delete-link" data-kid="<?= htmlspecialchars($kid) ?>" style="font-size:0.78em;padding:4px 10px;min-height:30px;">Revoke</button>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div id="new-key-result" style="display:none;margin-bottom:0.75rem;">
          <p style="font-size:0.88em;margin-bottom:0.4rem;color:#555;">Copy this key now — it won't be shown again.</p>
          <div style="display:flex;gap:6px;align-items:center;">
            <input type="text" id="new-key-value" readonly style="font-family:monospace;font-size:0.8em;flex:1;min-width:0;">
            <button id="btn-copy-key" class="btn" style="white-space:nowrap;flex-shrink:0;">Copy</button>
          </div>
          <p id="copy-status" class="muted" style="font-size:0.82em;min-height:1.2em;margin-top:0.3rem;"></p>
        </div>
        <form id="gen-key-form" style="display:flex;gap:8px;align-items:flex-end;flex-wrap:wrap;">
          <div style="flex:1;min-width:140px;">
            <label style="display:block;font-size:0.85em;color:#555;margin-bottom:0.3rem;">Label</label>
            <input type="text" id="key-label" name="label" placeholder="e.g. Claude agent" maxlength="60">
          </div>
          <button type="submit" class="btn" style="flex-shrink:0;">Generate</button>
        </form>
        <p id="gen-key-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <?php else: ?>
        <p class="muted">Vault locked.</p>
      <?php endif; ?>
    </div>

    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.5rem;">Habitica</h3>
      <?php if ($vaultOpen): ?>
        <form id="habitica-form">
          <label style="display:block;margin-bottom:0.4rem;font-size:0.9em;color:#555;">User ID</label>
          <input type="text" id="hab-user" name="user_id" value="<?= htmlspecialchars($habiticaUser) ?>" placeholder="xxxxxxxx-xxxx-...">
          <label style="display:block;margin:0.75rem 0 0.4rem;font-size:0.9em;color:#555;">API Key</label>
          <input type="password" id="hab-key" name="api_key" value="<?= htmlspecialchars($habiticaKey) ?>" placeholder="xxxxxxxx-xxxx-...">
          <button type="submit" class="btn" style="margin-top:0.75rem;">Save</button>
          <p id="habStatus" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
        </form>
      <?php else: ?>
        <p class="muted">Vault locked.</p>
      <?php endif; ?>
    </div>

    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.5rem;">Timezone</h3>
      <?php if ($vaultOpen): ?>
        <?php $savedTz = $cfg['preferences']['timezone'] ?? ''; ?>
        <p class="muted" style="font-size:0.88em;margin-bottom:0.75rem;">Used to determine what counts as "today" for diary entries and check-ins.</p>
        <?php if ($savedTz): ?>
        <p style="font-size:0.88em;margin-bottom:0.75rem;">Current: <strong><?= htmlspecialchars($savedTz) ?></strong></p>
        <?php endif; ?>
        <div id="browser-tz-row" style="display:none;margin-bottom:0.75rem;padding:8px 10px;background:#f8f8f8;border-radius:6px;font-size:0.88em;align-items:center;gap:8px;flex-wrap:wrap;">
          <span>Browser timezone: <strong id="browser-tz-name"></strong></span>
          <button id="btn-use-browser-tz" class="btn btn-secondary" style="font-size:0.8em;padding:3px 10px;min-height:28px;">Use this</button>
        </div>
        <label style="display:block;font-size:0.88em;color:#555;margin-bottom:0.3rem;">Or choose manually:</label>
        <select id="timezone-select" style="margin-bottom:0.75rem;width:100%;">
          <?php
          $tzGroups = [
            'Australia' => ['Australia/Melbourne','Australia/Sydney','Australia/Brisbane','Australia/Perth','Australia/Adelaide','Australia/Darwin','Australia/Hobart'],
            'Pacific'   => ['Pacific/Auckland','Pacific/Fiji','Pacific/Honolulu'],
            'Asia'      => ['Asia/Singapore','Asia/Tokyo','Asia/Seoul','Asia/Shanghai','Asia/Kolkata','Asia/Dubai','Asia/Bangkok'],
            'Europe'    => ['Europe/London','Europe/Paris','Europe/Berlin','Europe/Amsterdam','Europe/Rome','Europe/Madrid'],
            'Americas'  => ['America/New_York','America/Chicago','America/Denver','America/Los_Angeles','America/Vancouver','America/Toronto','America/Sao_Paulo'],
            'Other'     => ['UTC','Africa/Johannesburg'],
          ];
          foreach ($tzGroups as $group => $zones):
          ?>
          <optgroup label="<?= htmlspecialchars($group) ?>">
            <?php foreach ($zones as $tz): ?>
            <option value="<?= htmlspecialchars($tz) ?>"<?= $savedTz === $tz ? ' selected' : '' ?>><?= htmlspecialchars($tz) ?></option>
            <?php endforeach; ?>
          </optgroup>
          <?php endforeach; ?>
        </select>
        <button id="btn-save-timezone" class="btn">Save</button>
        <p id="timezoneStatus" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      <?php else: ?>
        <p class="muted">Vault locked.</p>
      <?php endif; ?>
    </div>

    <div class="card">
      <h3 style="margin-bottom:0.5rem;">Backup</h3>
      <?php if ($vaultOpen): ?>
        <p class="muted" style="font-size:0.88em;margin-bottom:0.75rem;">Downloads a decrypted JSON file of all your vault data — tasks, people, diary, stories, everything. Keep it somewhere safe.</p>
        <a href="api/vault_export.php" download class="btn" style="display:inline-block;text-decoration:none;">Download backup</a>
      <?php else: ?>
        <p class="muted">Vault locked.</p>
      <?php endif; ?>
    </div>

    <div class="card">
      <h3 style="margin-bottom:0.5rem;">Import tasks from CSV</h3>
      <p class="muted" style="margin-bottom:0.75rem;font-size:0.88em;">Inspect a tasks.csv before mapping the import.</p>
      <form id="csv-probe-form" enctype="multipart/form-data">
        <input type="file" id="csv-file" name="csvfile" accept=".csv,text/csv" style="margin-bottom:0.6rem;">
        <button type="submit" class="btn">Inspect fields</button>
        <p id="csv-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      </form>
      <div id="csv-result" style="display:none;margin-top:0.75rem;"></div>
    </div>

  </div><!-- /tab-account -->

  <!-- ===== GAMES ===== -->
  <div id="tab-games" class="settings-panel" hidden>

    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.75rem;">Games</h3>
      <?php if ($vaultOpen): ?>
        <label class="settings-toggle-row" style="margin-bottom:1rem;">
          <span>Include games in rotation</span>
          <input type="checkbox" id="games-enabled" <?= $gamesEnabled ? 'checked' : '' ?>>
        </label>
        <div id="game-list" style="<?= $gamesEnabled ? '' : 'opacity:0.4;pointer-events:none;' ?>">
          <?php foreach ($allGames as $id => $label): ?>
          <label class="settings-toggle-row">
            <span><?= htmlspecialchars($label) ?></span>
            <input type="checkbox" class="game-toggle" data-game="<?= $id ?>" <?= ($gameToggles[$id] ?? true) ? 'checked' : '' ?>>
          </label>
          <?php endforeach; ?>
        </div>
        <p id="games-status" class="muted" style="margin-top:0.75rem;min-height:1.2em;font-size:0.85em;"></p>
      <?php else: ?>
        <p class="muted">Vault locked.</p>
      <?php endif; ?>
    </div>

  </div><!-- /tab-games -->

  <!-- ===== WELLNESS ===== -->
  <div id="tab-wellness" class="settings-panel" hidden>

    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.75rem;">Morning check-in</h3>
      <?php if ($vaultOpen): ?>
        <label class="settings-toggle-row" style="margin-bottom:0.5rem;">
          <span>Ask energy level &amp; day type each morning</span>
          <input type="checkbox" id="checkin-enabled" <?= $checkinOn ? 'checked' : '' ?>>
        </label>
        <p class="muted" style="font-size:0.85em;">When on, the first activity each session asks how you are. Your answers shape which tasks appear.</p>
        <p id="checkin-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>
      <?php else: ?>
        <p class="muted">Vault locked.</p>
      <?php endif; ?>
    </div>

    <?php if ($vaultOpen && $diaryEntries): ?>
    <div class="card">
      <h3 style="margin-bottom:0.75rem;">Recent check-ins</h3>
      <table style="width:100%;border-collapse:collapse;font-size:0.88em;">
        <thead>
          <tr style="text-align:left;border-bottom:1px solid #eee;">
            <th style="padding:4px 8px 6px 0;color:#888;font-weight:500;">Date</th>
            <th style="padding:4px 8px 6px;color:#888;font-weight:500;">Energy</th>
            <th style="padding:4px 8px 6px;color:#888;font-weight:500;">Day type</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($diaryEntries as $row): ?>
          <tr style="border-bottom:1px solid #f5f5f5;">
            <td style="padding:5px 8px 5px 0;"><?= htmlspecialchars($row['date']) ?></td>
            <td style="padding:5px 8px;"><?= htmlspecialchars($row['energy']) ?></td>
            <td style="padding:5px 8px;"><?= htmlspecialchars($row['dayType']) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php elseif ($vaultOpen): ?>
    <div class="card">
      <p class="muted">No check-in data yet. Start each session with a check-in and it will appear here.</p>
    </div>
    <?php endif; ?>

  </div><!-- /tab-wellness -->

  <!-- ===== TRIVIA ===== -->
  <div id="tab-trivia" class="settings-panel" hidden>

    <?php if ($studyStats): ?>
    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.75rem;">Study progress</h3>
      <?php foreach ($studyStats as $setName => $stat):
        $pct = $stat['total'] > 0 ? round($stat['mastered'] / $stat['total'] * 100) : 0;
      ?>
      <div style="margin-bottom:0.75rem;">
        <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.3rem;">
          <span style="font-weight:500;"><?= htmlspecialchars($setName) ?></span>
          <span class="muted" style="font-size:0.88em;"><?= $stat['mastered'] ?>/<?= $stat['total'] ?> mastered</span>
        </div>
        <div style="height:6px;background:#e0d8cc;border-radius:3px;">
          <div style="height:6px;background:#7a9e7e;border-radius:3px;width:<?= $pct ?>%;"></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="card" style="margin-bottom:1rem;">
      <h3 style="margin-bottom:0.75rem;">Trivia pools</h3>
      <?php if ($triviaStats): ?>
        <?php foreach ($triviaStats as $setName => $stat): ?>
        <div style="display:flex;justify-content:space-between;align-items:center;padding:6px 0;border-bottom:1px solid rgba(0,0,0,0.06);">
          <span style="font-weight:500;"><?= htmlspecialchars($setName) ?></span>
          <span class="muted" style="font-size:0.88em;"><?= $stat['mastered'] ?>/<?= $stat['total'] ?> mastered</span>
        </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="muted">No trivia questions loaded yet — unlock a topic below.</p>
      <?php endif; ?>
    </div>

    <?php if ($lockedTopics): ?>
    <div class="card">
      <h3 style="margin-bottom:0.75rem;">Unlock a topic</h3>
      <p class="muted" style="margin-bottom:0.75rem;font-size:0.88em;">Adds 15 new questions to the rotation.</p>
      <div style="display:flex;flex-direction:column;gap:8px;" id="topic-unlock-list">
        <?php foreach ($lockedTopics as $topic): ?>
        <button class="btn" data-unlock-topic="<?= htmlspecialchars($topic) ?>"><?= htmlspecialchars($topic) ?></button>
        <?php endforeach; ?>
      </div>
      <p id="topic-unlock-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>
    </div>
    <?php else: ?>
    <div class="card" style="margin-bottom:1rem;">
      <p class="muted">All topics unlocked.</p>
    </div>
    <?php endif; ?>

    <div class="card">
      <h3 style="margin-bottom:0.5rem;">Import study questions</h3>
      <p class="muted" style="margin-bottom:0.75rem;font-size:0.88em;">
        Paste a CSV — header row required. Columns: <code>question, option_a, option_b, option_c, option_d, correct, explanation</code>.
        <code>correct</code> must be <code>a</code>–<code>d</code>. <code>explanation</code> is optional.
      </p>
      <label style="display:block;font-size:0.88em;color:#555;margin-bottom:0.25rem;">Set name</label>
      <input type="text" id="imp-setname" placeholder="e.g. MS-102" style="margin-bottom:0.6rem;">
      <label style="display:block;font-size:0.88em;color:#555;margin-bottom:0.25rem;">Type</label>
      <select id="imp-type" style="margin-bottom:0.6rem;">
        <option value="study">Study (exam / revision)</option>
        <option value="trivia">Trivia</option>
      </select>
      <textarea id="imp-csv" style="width:100%;box-sizing:border-box;min-height:160px;font-family:monospace;font-size:0.8em;resize:vertical;"
        placeholder="question,option_a,option_b,option_c,option_d,correct,explanation"></textarea>
      <button class="btn" id="imp-btn" style="margin-top:0.6rem;">Import</button>
      <p id="imp-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;font-size:0.85em;"></p>
    </div>

  </div><!-- /tab-trivia -->

</div>
