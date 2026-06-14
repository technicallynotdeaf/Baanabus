<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (!isAuthenticated()) { http_response_code(401); echo '<p class="muted">Not authenticated.</p>'; exit; }
if (!isUnlocked())      { http_response_code(423); echo '<p class="muted">Vault locked.</p>'; exit; }

$date = $_GET['date'] ?? '';
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    echo '<p class="muted">Invalid date.</p>'; exit;
}

$today   = date('Y-m-d');
$isPast  = $date < $today;
$label   = date('l, j F', strtotime($date));

try {
    $all        = getTasks()['tasks'];
    $scheduled  = array_values(array_filter($all, fn($t) =>
        ($t['scheduled_date'] ?? '') === $date && $t['status'] !== 'deleted'
    ));
    // Tasks that woke from snooze on this date
    $wokeHere = array_values(array_filter($all, fn($t) =>
        $t['status'] === 'active' &&
        ($t['woke_date'] ?? '') === $date
    ));
    $scheduledIds = array_column($scheduled, 'id');
    foreach ($wokeHere as $t) {
        if (!in_array($t['id'], $scheduledIds)) {
            $t['_woke'] = true;
            $scheduled[] = $t;
        }
    }
    $unscheduled = array_values(array_filter($all, fn($t) =>
        empty($t['scheduled_date']) &&
        ($t['task_type'] ?? '') === 'next_action' &&
        $t['status'] === 'active'
    ));
} catch (Throwable $e) {
    echo '<p class="muted">Could not load tasks.</p>'; exit;
}

$canAdd = !$isPast && count(array_filter($scheduled, fn($t) => empty($t['_woke']))) < 3;

$mealPlan = [];
try {
    $diaryEntry = getDiaryEntry($date);
    $mealPlan   = $diaryEntry['meal_plan'] ?? [];
} catch (Throwable $e) {}

$btnStyle = 'font-size:0.75em;padding:3px 8px;min-height:28px;background:transparent;color:#888;border:1px solid #ddd;border-radius:4px;cursor:pointer;';
?>
<div data-init="initDayTasks">
  <h2 style="margin-bottom:1rem;"><?= htmlspecialchars($label) ?></h2>

  <?php if (!empty($mealPlan)): ?>
    <div style="background:#fdf6e3;border-left:3px solid #c8a84b;border-radius:6px;padding:0.6rem 0.85rem;margin-bottom:1rem;">
      <?php
        $mealLabels = ['breakfast' => 'Breakfast', 'lunch' => 'Lunch', 'dinner' => 'Dinner'];
        foreach ($mealPlan as $type => $meal):
          if (empty($meal['name'])) continue;
          $typeLabel = $mealLabels[$type] ?? ucfirst($type);
      ?>
        <div style="font-size:0.82em;color:#888;margin-bottom:1px;"><?= htmlspecialchars($typeLabel) ?></div>
        <div style="font-weight:600;color:#5a4a1e;"><?= htmlspecialchars($meal['name']) ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if (empty($scheduled)): ?>
    <p class="muted">Nothing scheduled for this day.</p>
  <?php else: ?>
    <ul id="day-task-list" style="list-style:none;margin:0 0 1rem;padding:0;">
      <?php foreach ($scheduled as $t): ?>
        <?php $id = (int)$t['id']; $isWoke = !empty($t['_woke']); ?>
        <li data-id="<?= $id ?>" style="padding:0.5rem 0;border-bottom:1px solid #f0ede6;">
          <div style="line-height:1.4;margin-bottom:0.35rem;">
            <?= htmlspecialchars($t['title']) ?>
            <?php if ($isWoke): ?>
              <span style="font-size:0.75em;color:#bbb;margin-left:6px;">woke from snooze</span>
            <?php endif; ?>
          </div>
          <div style="display:flex;gap:5px;flex-wrap:wrap;">
            <button style="<?= $btnStyle ?>color:#4a7c59;border-color:#c3d9c9;"
                    onclick="window._doneFromDay(<?= $id ?>, this)">Done</button>
            <button style="<?= $btnStyle ?>"
                    onclick="window._snoozeFromDay(<?= $id ?>, this, 'tomorrow')">Tomorrow</button>
            <button style="<?= $btnStyle ?>"
                    onclick="window._snoozeFromDay(<?= $id ?>, this, 'week')">Next week</button>
            <?php if (!$isPast && !$isWoke): ?>
              <button style="<?= $btnStyle ?>color:#c06060;border-color:#e8cccc;"
                      onclick="window._removeFromDay(<?= $id ?>, '<?= $date ?>')">Remove</button>
            <?php endif; ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <?php if ($canAdd): ?>
    <div id="add-section">
      <button class="action-button" id="add-btn" style="margin-top:0.25rem;"
              onclick="window._showPicker()">+ Schedule a task here</button>
      <div id="task-picker" style="display:none;margin-top:0.75rem;">
        <?php if (empty($unscheduled)): ?>
          <p class="muted" style="font-size:0.9em;">No unscheduled next actions — triage your inbox to create some.</p>
        <?php else: ?>
          <?php foreach ($unscheduled as $t): ?>
            <button class="action-button"
                    style="width:100%;text-align:left;margin-bottom:6px;"
                    onclick="window._addToDay(<?= (int)$t['id'] ?>, '<?= $date ?>', this)">
              <?= htmlspecialchars($t['title']) ?>
            </button>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  <?php elseif (!$isPast && count(array_filter($scheduled, fn($t) => empty($t['_woke']))) >= 3): ?>
    <p class="muted" style="margin-top:0.75rem;font-size:0.85em;">Day is full — 3 tasks max.</p>
  <?php endif; ?>
</div>
