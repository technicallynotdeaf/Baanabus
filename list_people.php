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

    $active   = array_values(array_filter($all, fn($p) => ($p['is_active'] ?? 1) != 0));
    $archived = array_values(array_filter($all, fn($p) => ($p['is_active'] ?? 1) == 0));

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
    <div style="position:relative;padding-bottom:1rem;">
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;">
        <h2 style="margin:0;">People <span class="muted" style="font-size:0.7em;font-weight:400;"><?= count($active) ?></span></h2>
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
            $circles = trim($p['circles'] ?? '');
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
          <button id="archived-toggle"
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

    <script>
    (function() {
      document.getElementById('people-search').addEventListener('input', function() {
        const q = this.value.toLowerCase();
        document.querySelectorAll('.person-row').forEach(row => {
          row.style.display = (!q || row.dataset.name.includes(q)) ? '' : 'none';
        });
        document.querySelectorAll('.people-group').forEach(g => {
          const vis = g.querySelectorAll('.person-row:not([style*="display: none"])').length;
          g.style.display = vis ? '' : 'none';
        });
      });
      window._toggleArchived = function() {
        const list = document.getElementById('archived-list');
        const btn  = document.getElementById('archived-toggle');
        const open = list.style.display !== 'none';
        list.style.display = open ? 'none' : 'block';
        btn.textContent    = open ? '+ <?= $archiveCount ?> archived' : '- hide archived';
      };
    })();
    </script>
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
    $isActive = ($person['is_active'] ?? 1) != 0;

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
    <div style="padding-bottom:2rem;">

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
      <?php if (!empty($person['circles']) || !empty($person['context']) || $dob || !empty($person['is_org'])): ?>
        <div style="margin-bottom:1rem;font-size:0.88em;color:#555;display:flex;flex-direction:column;gap:3px;">
          <?php if (!empty($person['circles'])): ?>
            <span><?= htmlspecialchars($person['circles']) ?></span>
          <?php endif; ?>
          <?php if (!empty($person['context'])): ?>
            <span class="muted"><?= htmlspecialchars($person['context']) ?></span>
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
        <div style="display:flex;gap:6px;flex-wrap:wrap;">
          <button id="btn-reviewed" class="action-button"
                  style="padding:5px 12px;font-size:0.82em;min-height:32px;"
                  onclick="window._markReviewed()">Mark reviewed</button>
          <button id="btn-snooze" class="action-button"
                  style="padding:5px 12px;font-size:0.82em;min-height:32px;background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
                  onclick="window._snoozeReview()">Snooze 1 week</button>
        </div>
      </div>

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
      <?php if ($tasks): ?>
        <div style="margin-bottom:1rem;">
          <p style="font-size:0.72em;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem;">Tasks (<?= count($tasks) ?>)</p>
          <?php foreach ($tasks as $t): ?>
            <div style="padding:0.3rem 0;border-bottom:1px solid #f0f0f0;font-size:0.88em;display:flex;align-items:center;gap:4px;">
              <span style="flex:1;"><?= htmlspecialchars($t['title']) ?></span>
              <?php if (($t['urgency'] ?? '') === 'high'): ?>
                <span style="font-size:0.72em;color:#c0392b;">high</span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

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
            <div style="padding:0.4rem 0;border-bottom:1px solid #f5f5f5;">
              <p style="font-size:0.75em;color:#aaa;margin:0 0 2px;"><?= date('d M Y', strtotime($n['date_added'] ?? 'now')) ?></p>
              <p style="font-size:0.88em;margin:0;white-space:pre-wrap;word-break:break-word;"><?= htmlspecialchars($n['contents'] ?? '') ?></p>
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

    <script>
    (function() {
      const pid = <?= $personId ?>;

      function personAction(body, onOk) {
        fetch('api/person_action.php', {
          method:  'POST',
          headers: {'Content-Type': 'application/json'},
          body:    JSON.stringify(body),
        }).then(r => r.json()).then(d => {
          if (d.ok) onOk(d);
          else { alert(d.error || 'Something went wrong.'); }
        }).catch(() => alert('Request failed — check connection.'));
      }

      window._markReviewed = function() {
        const btn = document.getElementById('btn-reviewed');
        btn.disabled = true;
        personAction({ person_id: pid, action: 'mark_reviewed' }, d => {
          const dt  = new Date(d.next_review + 'T12:00:00');
          const lbl = 'Next: ' + dt.toLocaleDateString('en-GB', { day:'numeric', month:'short' });
          const el  = document.getElementById('review-display');
          el.textContent = lbl;
          el.style.color = '#888';
          document.getElementById('btn-snooze').disabled = false;
        });
      };

      window._snoozeReview = function() {
        const btn = document.getElementById('btn-snooze');
        btn.disabled = true;
        personAction({ person_id: pid, action: 'snooze', days: 7 }, d => {
          const dt  = new Date(d.next_review + 'T12:00:00');
          const lbl = 'Snoozed to ' + dt.toLocaleDateString('en-GB', { day:'numeric', month:'short' });
          const el  = document.getElementById('review-display');
          el.textContent = lbl;
          el.style.color = '#888';
        });
      };

      window._addNote = function() {
        const inp    = document.getElementById('new-note');
        const status = document.getElementById('note-status');
        const text   = inp.value.trim();
        if (!text) { status.textContent = 'Type something first.'; return; }
        status.textContent = 'Saving…';
        personAction({ person_id: pid, action: 'add_note', note_content: text }, () => {
          const noMsg = document.getElementById('no-notes-msg');
          if (noMsg) noMsg.remove();
          const today = new Date().toLocaleDateString('en-GB', { day:'numeric', month:'short', year:'numeric' });
          const div   = document.createElement('div');
          div.style.cssText = 'padding:0.4rem 0;border-bottom:1px solid #f5f5f5;';
          div.innerHTML = `<p style="font-size:0.75em;color:#aaa;margin:0 0 2px;">${today}</p>
            <p style="font-size:0.88em;margin:0;white-space:pre-wrap;word-break:break-word;">${esc(text)}</p>`;
          document.getElementById('notes-list').prepend(div);
          inp.value = '';
          status.textContent = 'Saved.';
          setTimeout(() => status.textContent = '', 2000);
        });
      };

      window._archivePerson = function() {
        if (!confirm('Archive this contact? They\'ll still appear under archived contacts.')) return;
        personAction({ person_id: pid, action: 'archive' }, () => loadOverlay('list_people.php'));
      };

      window._unarchivePerson = function() {
        personAction({ person_id: pid, action: 'unarchive' }, () => loadOverlay('list_people.php'));
      };

      document.getElementById('new-note').addEventListener('keydown', e => {
        if (e.key === 'Enter' && (e.ctrlKey || e.metaKey)) window._addNote();
      });

      function esc(s) {
        return String(s)
          .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')
          .replace(/\n/g,'<br>');
      }
    })();
    </script>
    <?php
}
