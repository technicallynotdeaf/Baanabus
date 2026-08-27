<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); echo '<p class="muted">Vault is locked.</p>'; exit; }

$personId = (int)($_GET['person_id'] ?? 0);

function reviewLabel(string $date, string $today): array {
    $diff = (int)round((strtotime($date) - strtotime($today)) / 86400);
    if ($diff < -1)  return ['color' => '#c0392b', 'text' => abs($diff) . 'd overdue'];
    if ($diff === -1) return ['color' => '#c0392b', 'text' => 'Yesterday'];
    if ($diff === 0)  return ['color' => '#e67e22', 'text' => 'Today'];
    if ($diff === 1)  return ['color' => '#e67e22', 'text' => 'Tomorrow'];
    if ($diff <= 7)   return ['color' => '#e67e22', 'text' => "In {$diff}d"];
    return ['color' => '#888', 'text' => date('d M', strtotime($date))];
}

if ($personId) {
    renderPersonPanel($personId);
} else {
    renderPeopleList();
}

// ---- List view ---------------------------------------------------------------

function renderPeopleList(): void {
    $data     = getPeople();
    $all      = $data['people'];
    $today    = date('Y-m-d');
    $nextWeek = date('Y-m-d', strtotime('+7 days'));

    $active   = array_values(array_filter($all, fn($p) => !personIsArchived($p)));
    $archived = array_values(array_filter($all, fn($p) => personIsArchived($p)));

    usort($active, function($a, $b) {
        $da = $a['next_review'] ?? null;
        $db = $b['next_review'] ?? null;
        if (!$da && !$db) return strcasecmp($a['name'] ?? '', $b['name'] ?? '');
        if (!$da) return 1;
        if (!$db) return -1;
        return strcmp($da, $db);
    });
    usort($archived, fn($a, $b) => strcasecmp($a['name'] ?? '', $b['name'] ?? ''));

    $overdue  = array_values(array_filter($active, fn($p) => !empty($p['next_review']) && $p['next_review'] < $today));
    $dueSoon  = array_values(array_filter($active, fn($p) => !empty($p['next_review']) && $p['next_review'] >= $today && $p['next_review'] <= $nextWeek));
    $upcoming = array_values(array_filter($active, fn($p) => !empty($p['next_review']) && $p['next_review'] > $nextWeek));
    $noDate   = array_values(array_filter($active, fn($p) => empty($p['next_review'])));

    $groups = [
        ['label' => 'Overdue',   'color' => '#c0392b', 'items' => $overdue],
        ['label' => 'This week', 'color' => '#e67e22', 'items' => $dueSoon],
        ['label' => 'Upcoming',  'color' => '#888',    'items' => $upcoming],
        ['label' => 'No date',   'color' => '#bbb',    'items' => $noDate],
    ];
    $archiveCount = count($archived);
    ?>
    <div data-init="initPeopleList" style="position:relative;padding-bottom:1rem;">
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;">
        <h2 style="margin:0;">People <span class="muted" style="font-size:0.7em;font-weight:400;"><?= count($active) ?></span></h2>
        <button class="btn" id="btn-show-add-person" style="padding:8px 14px;font-size:0.88em;min-height:36px;">+ Add person</button>
      </div>

      <!-- Add person form -->
      <div id="add-person-form" style="display:none;background:#f8f9fa;border-radius:10px;padding:1rem;margin-bottom:1rem;">
        <input type="text" id="new-person-name" placeholder="Name" maxlength="200"
               style="margin-bottom:0.5rem;">
        <div style="display:flex;gap:8px;flex-wrap:wrap;align-items:flex-end;">
          <div style="flex:1;min-width:140px;">
            <label style="font-size:0.8em;color:#555;display:block;margin-bottom:3px;">Circles (optional)</label>
            <input type="text" id="new-person-circles" placeholder="e.g. family, work" maxlength="200">
          </div>
          <button class="btn" id="btn-add-person" style="flex-shrink:0;padding:8px 14px;font-size:0.88em;min-height:44px;">Save</button>
        </div>
        <p id="add-person-status" class="muted" style="margin-top:0.4rem;min-height:1.2em;font-size:0.85em;"></p>
      </div>

      <input type="search" id="people-search" placeholder="Search people…" style="margin-bottom:1rem;">

      <?php foreach ($groups as $g): ?>
        <?php if (empty($g['items'])) continue; ?>
        <div class="people-group">
          <div style="display:flex;align-items:center;gap:6px;margin-bottom:0.4rem;margin-top:0.75rem;">
            <span style="font-size:0.72em;font-weight:600;color:<?= $g['color'] ?>;text-transform:uppercase;letter-spacing:0.06em;"><?= $g['label'] ?></span>
            <span class="muted" style="font-size:0.75em;"><?= count($g['items']) ?></span>
          </div>
          <?php foreach ($g['items'] as $p): ?>
            <?php
            $label   = !empty($p['next_review']) ? reviewLabel($p['next_review'], date('Y-m-d')) : null;
            $c = $p['circles'] ?? '';
            $circles = trim(is_array($c) ? implode(', ', $c) : $c);
            ?>
            <div class="person-row"
                 data-name="<?= htmlspecialchars(strtolower($p['name'] ?? '')) ?>"
                 onclick="loadOverlay('list_people.php?person_id=<?= (int)$p['person_id'] ?>')"
                 style="display:flex;align-items:center;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0f0f0;cursor:pointer;">
              <div style="flex:1;min-width:0;">
                <span style="line-height:1.4;"><?= htmlspecialchars($p['name'] ?? '') ?></span>
                <?php if ($circles): ?>
                  <span style="font-size:0.75em;color:#aaa;margin-left:5px;"><?= htmlspecialchars($circles) ?></span>
                <?php endif; ?>
              </div>
              <?php if ($label): ?>
                <span style="font-size:0.75em;color:<?= $label['color'] ?>;flex-shrink:0;white-space:nowrap;"><?= $label['text'] ?></span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

      <?php if ($archiveCount): ?>
        <div style="margin-top:1rem;">
          <button id="archived-toggle" data-count="<?= $archiveCount ?>"
                  style="font-size:0.8em;color:#aaa;background:none;border:none;cursor:pointer;padding:0;"
                  onclick="window._toggleArchived()">+ <?= $archiveCount ?> archived</button>
          <div id="archived-list" style="display:none;margin-top:0.5rem;">
            <?php foreach ($archived as $p): ?>
              <div class="person-row"
                   data-name="<?= htmlspecialchars(strtolower($p['name'] ?? '')) ?>"
                   onclick="loadOverlay('list_people.php?person_id=<?= (int)$p['person_id'] ?>')"
                   style="display:flex;align-items:center;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0f0f0;cursor:pointer;opacity:0.55;">
                <span><?= htmlspecialchars($p['name'] ?? '') ?></span>
                <span style="font-size:0.72em;color:#aaa;margin-left:4px;">archived</span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (empty($active) && empty($archived)): ?>
        <p class="muted" style="text-align:center;padding:2rem 0;">No contacts yet.</p>
      <?php endif; ?>
    </div>

    <?php
}

// ---- Person panel view -------------------------------------------------------

function renderPersonPanel(int $personId): void {
    $data   = getPeople();
    $person = null;
    foreach ($data['people'] as $p) {
        if ((int)$p['person_id'] === $personId) { $person = $p; break; }
    }
    if (!$person) {
        echo '<p class="muted">Person not found. <button class="action-button" onclick="loadOverlay(\'list_people.php\')">Back</button></p>';
        return;
    }

    $notesData = getPeopleNotes();
    $notes     = array_values(array_filter($notesData['notes'], fn($n) => (int)$n['person_id'] === $personId));
    usort($notes, fn($a, $b) => strcmp($b['date_added'] ?? '', $a['date_added'] ?? ''));

    $tasksData = getTasks();
    $tasks     = array_values(array_filter($tasksData['tasks'], fn($t) =>
        !empty($t['person_id']) && (int)$t['person_id'] === $personId &&
        ($t['status'] ?? '') === 'active'
    ));

    $today    = date('Y-m-d');
    $isActive = !personIsArchived($person);

    $reviewLabel = !empty($person['next_review']) ? reviewLabel($person['next_review'], $today) : null;
    $interval    = max(1, (int)($person['review_interval'] ?? 30));

    // DOB
    $dob = null;
    if (!empty($person['DOB']) && !empty($person['MOB'])) {
        $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $m = (int)$person['MOB'];
        $dob = ((int)$person['DOB']) . ' ' . ($months[$m - 1] ?? $m);
        if (!empty($person['YOB'])) $dob .= ' ' . (int)$person['YOB'];
    }

    // Non-empty character traits
    $traitKeys = ['char1','char2','char3','char_extended','interests','love_language','brain'];
    $traits    = array_filter(array_intersect_key($person, array_flip($traitKeys)));
    $traitLabels = [
        'char1' => '', 'char2' => '', 'char3' => '',
        'char_extended' => 'More', 'interests' => 'Interests',
        'love_language' => 'Love language', 'brain' => 'How they think',
    ];
    ?>
    <div data-init="initPersonPanel" data-person-id="<?= $personId ?>" style="padding-bottom:2rem;">

      <!-- Header -->
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:1rem;">
        <button onclick="loadOverlay('list_people.php')"
                style="background:none;border:none;cursor:pointer;font-size:1.2em;color:#888;padding:0;line-height:1;min-height:0;"
                aria-label="Back">&#8592;</button>
        <h2 style="margin:0;flex:1;word-break:break-word;"><?= htmlspecialchars($person['name'] ?? '') ?></h2>
        <?php if (!$isActive): ?>
          <span style="font-size:0.75em;color:#aaa;background:#f0f0f0;padding:2px 7px;border-radius:4px;">archived</span>
        <?php endif; ?>
      </div>

      <!-- Meta -->
      <?php if (!empty($person['circles']) || $dob || !empty($person['is_org'])): ?>
        <div style="margin-bottom:1rem;font-size:0.88em;color:#555;display:flex;flex-direction:column;gap:3px;">
          <?php if (!empty($person['circles'])): ?>
            <span><?= htmlspecialchars(implode(', ', (array)$person['circles'])) ?></span>
          <?php endif; ?>
          <?php if ($dob): ?>
            <span class="muted">Birthday: <?= htmlspecialchars($dob) ?></span>
          <?php endif; ?>
          <?php if (!empty($person['is_org'])): ?>
            <span class="muted">Organisation</span>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <!-- Review card -->
      <div style="background:#f8f9fa;border-radius:10px;padding:0.75rem 1rem;margin-bottom:1rem;">
        <div style="margin-bottom:0.5rem;">
          <span style="font-size:0.8em;color:#555;">Next review: </span>
          <?php if ($reviewLabel): ?>
            <span id="review-display" style="font-size:0.85em;font-weight:600;color:<?= $reviewLabel['color'] ?>;"><?= htmlspecialchars($reviewLabel['text']) ?></span>
          <?php else: ?>
            <span id="review-display" style="font-size:0.85em;color:#aaa;">not set</span>
          <?php endif; ?>
          <span class="muted" style="font-size:0.75em;margin-left:4px;">(every <?= $interval ?> days)</span>
        </div>
        <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:0.5rem;">
          <button id="btn-reviewed" class="action-button"
                  style="padding:5px 12px;font-size:0.82em;min-height:32px;"
                  onclick="window._markReviewed()">Mark reviewed</button>
          <button id="btn-snooze" class="action-button"
                  style="padding:5px 12px;font-size:0.82em;min-height:32px;background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
                  onclick="window._snoozeReview()">Snooze 1 week</button>
        </div>
        <div style="display:flex;align-items:center;gap:6px;font-size:0.82em;flex-wrap:wrap;">
          <span style="color:#888;">Check in every</span>
          <select id="interval-select" style="padding:3px 6px;border:1px solid #ccc;border-radius:5px;font-size:0.95em;">
            <?php foreach ([
                [2,  'Every 2 days — household'],
                [7,  'Weekly — close friends'],
                [14, 'Fortnightly — church/regular'],
                [30, 'Monthly — active acquaintances'],
                [90, 'Quarterly — distant/extended family'],
              ] as [$d, $lbl]): ?>
              <option value="<?= $d ?>" <?= $d === $interval ? 'selected' : '' ?>><?= htmlspecialchars($lbl) ?></option>
            <?php endforeach; ?>
          </select>
          <button onclick="window._saveInterval()"
                  style="padding:3px 10px;font-size:0.85em;background:transparent;color:hsl(210,100%,30%);
                         border:1.5px solid hsl(210,100%,30%);border-radius:6px;cursor:pointer;min-height:28px;">Save</button>
          <span id="interval-status" style="color:#4caf50;font-size:0.82em;"></span>
        </div>
      </div>

      <!-- This friendship -->
      <?php if ($isActive && !$person['is_org']): ?>
      <div style="background:#f8f9fa;border-radius:10px;padding:0.75rem 1rem;margin-bottom:1rem;">
        <p style="font-size:0.72em;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.6rem;">This friendship</p>

        <div style="margin-bottom:0.75rem;">
          <label style="font-size:0.82em;color:#555;display:block;margin-bottom:4px;">What do I want from this friendship?</label>
          <div style="display:flex;gap:6px;align-items:center;flex-wrap:wrap;">
            <select id="friendship-goal-select" style="flex:1;min-width:140px;padding:4px 6px;border:1px solid #ccc;border-radius:5px;font-size:0.9em;">
              <option value="" <?= empty($person['friendship_goal']) ? 'selected' : '' ?>>Not set</option>
              <option value="occasional_coffee" <?= ($person['friendship_goal'] ?? '') === 'occasional_coffee' ? 'selected' : '' ?>>Occasional catch-up</option>
              <option value="encouragement" <?= ($person['friendship_goal'] ?? '') === 'encouragement' ? 'selected' : '' ?>>Mutual encouragement</option>
              <option value="shared_interest" <?= ($person['friendship_goal'] ?? '') === 'shared_interest' ? 'selected' : '' ?>>Shared interest or activity</option>
              <option value="infrequent_meaningful" <?= ($person['friendship_goal'] ?? '') === 'infrequent_meaningful' ? 'selected' : '' ?>>Infrequent but meaningful</option>
              <option value="not_sure" <?= ($person['friendship_goal'] ?? '') === 'not_sure' ? 'selected' : '' ?>>Not sure yet</option>
            </select>
            <button onclick="window._saveFriendshipGoal()"
                    style="padding:4px 10px;font-size:0.82em;background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);border-radius:6px;cursor:pointer;min-height:28px;white-space:nowrap;">Save</button>
          </div>
          <span id="friendship-goal-status" class="muted" style="font-size:0.8em;display:block;margin-top:3px;min-height:1.2em;"></span>
        </div>

        <div>
          <label style="font-size:0.82em;color:#555;display:block;margin-bottom:4px;">How does it feel lately?</label>
          <?php
            $feel = $person['last_interaction_feel'] ?? null;
            $feelStyles = [
              'nourishing' => 'background:#e8f5e9;color:#2e7d32;border:1.5px solid #2e7d32;',
              'neutral'    => 'background:#e3f2fd;color:#1565c0;border:1.5px solid #1565c0;',
              'depleting'  => 'background:#fce4ec;color:#c62828;border:1.5px solid #c62828;',
            ];
            $feels = ['nourishing' => 'Nourishing', 'neutral' => 'Neutral', 'depleting' => 'Depleting'];
          ?>
          <div style="display:flex;gap:6px;flex-wrap:wrap;">
            <?php foreach ($feels as $val => $lbl): ?>
              <button onclick="window._saveInteractionFeel('<?= $val ?>', this)"
                      style="padding:4px 12px;font-size:0.82em;border-radius:6px;cursor:pointer;min-height:28px;
                             <?= ($feel === $val) ? $feelStyles[$val] : 'background:transparent;color:#888;border:1.5px solid #ddd;' ?>">
                <?= $lbl ?>
              </button>
            <?php endforeach; ?>
          </div>
          <span id="feel-status" class="muted" style="font-size:0.8em;display:block;margin-top:3px;min-height:1.2em;"></span>
        </div>
      </div>
      <?php endif; ?>

      <!-- Character traits -->
      <?php if ($traits): ?>
        <div style="margin-bottom:1rem;">
          <p style="font-size:0.72em;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">About</p>
          <?php foreach ($traits as $k => $v): ?>
            <div style="margin-bottom:0.4rem;font-size:0.88em;line-height:1.4;">
              <?php if ($traitLabels[$k]): ?>
                <span class="muted" style="font-size:0.85em;"><?= htmlspecialchars($traitLabels[$k]) ?>: </span>
              <?php endif; ?>
              <span><?= htmlspecialchars($v) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Tasks -->
      <div style="margin-bottom:1rem;">
        <p style="font-size:0.72em;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">
          Tasks <span id="person-task-count">(<?= count($tasks) ?>)</span>
        </p>
        <div id="person-tasks-list">
          <?php foreach ($tasks as $t): ?>
            <div class="person-task-row" style="padding:0.3rem 0;border-bottom:1px solid #f0f0f0;font-size:0.88em;display:flex;align-items:center;gap:4px;">
              <span style="flex:1;"><?= htmlspecialchars($t['title']) ?></span>
              <?php if (($t['urgency'] ?? '') === 'high'): ?>
                <span style="font-size:0.72em;color:#c0392b;">high</span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
          <?php if (!$tasks): ?>
            <p class="muted" id="no-person-tasks-msg" style="font-size:0.85em;">No tasks yet.</p>
          <?php endif; ?>
        </div>
        <div style="display:flex;gap:8px;margin-top:0.5rem;align-items:center;">
          <input type="text" id="new-person-task" placeholder="Add a task…" style="flex:1;min-width:0;">
          <button class="action-button" id="btn-add-person-task"
                  style="padding:5px 12px;font-size:0.82em;min-height:32px;flex-shrink:0;">Add</button>
        </div>
        <span id="person-task-status" class="muted" style="font-size:0.82em;min-height:1.2em;display:block;margin-top:0.2rem;"></span>
      </div>

      <!-- Notes -->
      <div style="margin-bottom:1rem;">
        <p style="font-size:0.72em;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.5rem;">Notes (<?= count($notes) ?>)</p>
        <div style="margin-bottom:0.75rem;">
          <textarea id="new-note" placeholder="Add a note… (Ctrl+Enter to save)" rows="2"
                    style="margin-bottom:0.4rem;resize:vertical;"></textarea>
          <div style="display:flex;align-items:center;gap:8px;">
            <button class="action-button" onclick="window._addNote()"
                    style="padding:5px 12px;font-size:0.82em;min-height:32px;">Save note</button>
            <span id="note-status" class="muted" style="font-size:0.82em;"></span>
          </div>
        </div>
        <div id="notes-list">
          <?php foreach ($notes as $n): ?>
            <div class="person-note-item" data-note-id="<?= (int)$n['note_id'] ?>" style="padding:0.4rem 0;border-bottom:1px solid #f5f5f5;">
              <p class="person-note-text" style="font-size:0.88em;margin:0 0 3px;white-space:pre-wrap;word-break:break-word;"><?= htmlspecialchars($n['contents'] ?? '') ?></p>
              <div style="display:flex;align-items:center;gap:8px;">
                <span style="font-size:0.75em;color:#aaa;"><?= date('d M Y', strtotime($n['date_added'] ?? 'now')) ?></span>
                <button type="button" style="background:none;border:none;padding:0;font-size:0.75em;color:#aaa;cursor:pointer;"
                        onclick="window._editNote(<?= (int)$n['note_id'] ?>)">edit</button>
                <button type="button" style="background:none;border:none;padding:0;font-size:0.75em;color:#c0392b;cursor:pointer;"
                        onclick="window._deleteNote(<?= (int)$n['note_id'] ?>)">delete</button>
              </div>
            </div>
          <?php endforeach; ?>
          <?php if (!$notes): ?>
            <p class="muted" id="no-notes-msg" style="font-size:0.85em;">No notes yet.</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Archive / unarchive -->
      <div style="padding-top:1rem;border-top:1px solid #f0f0f0;">
        <?php if ($isActive): ?>
          <button onclick="window._archivePerson()"
                  style="font-size:0.82em;background:transparent;color:#aaa;border:1px solid #ddd;padding:5px 12px;border-radius:6px;cursor:pointer;min-height:32px;">
            Archive this contact
          </button>
        <?php else: ?>
          <button onclick="window._unarchivePerson()"
                  style="font-size:0.82em;background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);padding:5px 12px;border-radius:6px;cursor:pointer;min-height:32px;">
            Unarchive
          </button>
        <?php endif; ?>
      </div>
    </div>

    <?php
}
