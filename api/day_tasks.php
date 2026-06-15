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

$mealPlan      = [];
$diaryDayType  = null;
try {
    $diaryEntry   = getDiaryEntry($date);
    $mealPlan     = $diaryEntry['meal_plan'] ?? [];
    $diaryDayType = $diaryEntry['location'] ?? $diaryEntry['day_type'] ?? null;
    if ($diaryDayType) $diaryDayType = (int)$diaryDayType;
} catch (Throwable $e) {}

// Resolve day type: diary entry wins; fall back to weekly_schedule default
$dow = (int)date('w', strtotime($date)); // 0=Sun … 6=Sat
$weeklySchedule = [];
try { $weeklySchedule = (getConfig() ?? [])['weekly_schedule'] ?? []; } catch (Throwable $e) {}
$scheduledDayType = $weeklySchedule[$dow] ?? null;
$effectiveDayType = $diaryDayType ?? ($scheduledDayType ? (int)$scheduledDayType : null);
$dtLabels = [1 => 'Home', 2 => 'Work', 3 => 'Out', 4 => 'Rest', 5 => 'WFH'];

$btnStyle = 'font-size:0.75em;padding:3px 8px;min-height:28px;background:transparent;color:#888;border:1px solid #ddd;border-radius:4px;cursor:pointer;';
?>
<div data-init="initDayTasks">
  <div style="display:flex;align-items:baseline;gap:10px;margin-bottom:1rem;flex-wrap:wrap;">
    <h2 style="margin:0;"><?= htmlspecialchars($label) ?></h2>
    <?php if (!$isPast): ?>
      <span id="day-type-badge" style="font-size:0.8em;color:#888;cursor:pointer;"
            onclick="window._toggleDayTypePicker()"
            title="Set day type">
        <?= $effectiveDayType ? htmlspecialchars($dtLabels[$effectiveDayType]) : '+ day type' ?>
        <?php if ($diaryDayType && $scheduledDayType && $diaryDayType != $scheduledDayType): ?>
          <span title="Differs from your usual <?= $dtLabels[$scheduledDayType] ?> on this weekday" style="color:#c8a84b;">*</span>
        <?php endif; ?>
      </span>
    <?php endif; ?>
  </div>
  <div id="day-type-picker" data-date="<?= $date ?>" style="display:none;margin-bottom:0.75rem;">
    <div style="font-size:0.8em;color:#888;margin-bottom:5px;">
      <?= $scheduledDayType ? 'Usual: ' . htmlspecialchars($dtLabels[$scheduledDayType]) . ' — change for this day:' : 'What kind of day is this?' ?>
    </div>
    <div style="display:flex;gap:5px;flex-wrap:wrap;">
      <?php foreach ($dtLabels as $val => $name): ?>
        <button class="action-button"
                style="padding:4px 10px;font-size:0.8em;min-height:28px;<?= $effectiveDayType === $val ? 'background:#5a4a1e;color:#fff;' : 'background:transparent;color:#666;border:1px solid #ccc;' ?>"
                onclick="window._setDayType(<?= $val ?>, '<?= $name ?>', this)">
          <?= $name ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>

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
        <li data-id="<?= $id ?>" data-location="<?= htmlspecialchars($t['location'] ?? '') ?>" style="padding:0.5rem 0;border-bottom:1px solid #f0ede6;">
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
                    onclick="window._showSnoozePicker(<?= $id ?>, this)">Snooze</button>
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
