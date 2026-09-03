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

$dayBirthdays = [];
try {
    $monthBirthdays = getBirthdaysInMonth(substr($date, 0, 7));
    $dayBirthdays   = array_values(array_filter($monthBirthdays, fn($b) => $b['date'] === $date));
} catch (Throwable $e) {}

$dayEvents = [];
try {
    $eventsData = getEvents();
    $dayEvents = array_values(array_filter($eventsData['events'] ?? [], fn($e) => ($e['date'] ?? '') === $date));
    usort($dayEvents, fn($a, $b) => strcmp($a['time_start'] ?? '00:00', $b['time_start'] ?? '00:00'));
} catch (Throwable $e) {}

$gcalDayEvents = [];
$useGcal = false;
try {
    $gcalCfg = getConfig() ?? [];
    $useGcal = !empty($gcalCfg['preferences']['uses_gcal']);
    if ($useGcal) {
        $gcalCache = getGcalCache();
        $gcalDayEvents = array_values(array_filter($gcalCache['events'] ?? [], fn($e) => ($e['date'] ?? '') === $date));
        usort($gcalDayEvents, fn($a, $b) => strcmp($a['time_start'] ?? '00:00', $b['time_start'] ?? '00:00'));
    }
} catch (Throwable $e) {}

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
  <?php if ($dayBirthdays):
    $bNames = array_map(fn($b) => $b['name'], $dayBirthdays);
    $bText  = count($bNames) === 1 ? "{$bNames[0]}'s birthday" : 'Birthdays: ' . implode(', ', $bNames);
  ?>
    <div style="background:#fdf2e6;border-left:3px solid #e0a458;border-radius:6px;padding:0.5rem 0.85rem;margin-bottom:1rem;font-size:0.9em;">
      🎂 <?= htmlspecialchars($bText) ?>
    </div>
  <?php endif; ?>

  <?php if ($dayEvents):
    $people = getPeople()['people'] ?? [];
    $peopleIndex = [];
    foreach ($people as $p) $peopleIndex[(int)$p['person_id']] = $p;
  ?>
    <div style="margin-bottom:1rem;">
      <div style="font-size:0.78em;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:0.5rem;">Events</div>
      <?php foreach ($dayEvents as $e): ?>
        <div style="background:#e8f4f8;border-left:3px solid #0066cc;border-radius:6px;padding:0.6rem 0.85rem;margin-bottom:0.5rem;font-size:0.9em;">
          <div style="font-weight:600;margin-bottom:0.3rem;"><?= htmlspecialchars($e['title'] ?? '') ?></div>
          <?php if (!empty($e['time_start'])): ?>
            <div style="font-size:0.8em;color:#666;margin-bottom:0.3rem;">
              <?= htmlspecialchars($e['time_start']) ?>
              <?php if (!empty($e['time_end'])): ?>
                –<?= htmlspecialchars($e['time_end']) ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if (!empty($e['people_ids'])): ?>
            <div style="display:flex;flex-wrap:wrap;gap:3px;margin-bottom:0.3rem;">
              <?php foreach ((array)$e['people_ids'] as $pid):
                $p = $peopleIndex[$pid] ?? null;
                if ($p):
              ?>
                <span style="font-size:0.75em;background:#d4e8ff;color:#0066cc;padding:2px 6px;border-radius:3px;">
                  <?= htmlspecialchars($p['name'] ?? '') ?>
                </span>
              <?php endif; endforeach; ?>
            </div>
          <?php endif; ?>
          <?php if (!empty($e['notes'])): ?>
            <div style="font-size:0.8em;color:#555;margin-top:0.3rem;">
              <?= htmlspecialchars($e['notes']) ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ($gcalDayEvents): ?>
    <div style="margin-bottom:1rem;">
      <div style="font-size:0.78em;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:0.5rem;">
        Google Calendar
      </div>
      <?php foreach ($gcalDayEvents as $e): ?>
        <div style="background:#e8f5f3;border-left:3px solid #00897b;border-radius:6px;padding:0.6rem 0.85rem;margin-bottom:0.5rem;font-size:0.9em;">
          <div style="display:flex;align-items:center;gap:6px;margin-bottom:0.2rem;">
            <span style="font-weight:600;"><?= htmlspecialchars($e['title'] ?? '') ?></span>
            <span style="font-size:0.7em;background:#00897b;color:#fff;padding:1px 5px;border-radius:3px;">GCal</span>
          </div>
          <?php if (!empty($e['time_start'])): ?>
            <div style="font-size:0.8em;color:#666;">
              <?= htmlspecialchars($e['time_start']) ?>
              <?php if (!empty($e['time_end'])): ?>
                –<?= htmlspecialchars($e['time_end']) ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if (!empty($e['description'])): ?>
            <div style="font-size:0.8em;color:#555;margin-top:0.3rem;">
              <?= htmlspecialchars(mb_substr($e['description'], 0, 150)) ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
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

  <?php if (!$isPast): ?>
    <div id="meal-plan-block" data-date="<?= $date ?>" style="background:#fdf6e3;border-left:3px solid #c8a84b;border-radius:6px;padding:0.6rem 0.85rem;margin-bottom:1rem;">
      <?php
        $mealLabels = ['breakfast' => 'Breakfast', 'lunch' => 'Lunch', 'dinner' => 'Dinner'];
        foreach ($mealLabels as $type => $typeLabel):
          $meal = $mealPlan[$type] ?? null;
          $name = $meal['name'] ?? null;
      ?>
        <div class="meal-plan-row" style="padding:2px 0;cursor:pointer;" onclick="window._toggleMealPicker('<?= $type ?>', this)">
          <div style="font-size:0.78em;color:#888;">
            <?= $typeLabel ?><?= $name ? '' : ' — tap to plan' ?>
          </div>
          <div style="font-weight:600;color:<?= $name ? '#5a4a1e' : '#c8b888' ?>;">
            <?= $name ? htmlspecialchars($name) : '+ Add' ?>
          </div>
        </div>
        <div class="meal-picker" data-meal-type="<?= $type ?>" style="display:none;margin:4px 0 8px;"></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if (empty($scheduled)): ?>
    <p class="muted">Nothing scheduled for this day.</p>
  <?php else: ?>
    <ul id="day-task-list" style="list-style:none;margin:0 0 1rem;padding:0;">
      <?php foreach ($scheduled as $t): ?>
        <?php $id = (int)$t['id']; $isWoke = !empty($t['_woke']); ?>
        <li data-id="<?= $id ?>" data-location="<?= htmlspecialchars(implode(',', (array)($t['location'] ?? []))) ?>" style="padding:0.5rem 0;border-bottom:1px solid #f0ede6;">
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
            <?php if ($useGcal && empty($t['gcal_event_id'])): ?>
              <button style="<?= $btnStyle ?>color:#00897b;border-color:#b2dfdb;"
                      onclick="window._pushToGcal(<?= $id ?>, this)">+ GCal</button>
            <?php elseif ($useGcal && !empty($t['gcal_event_id'])): ?>
              <span style="font-size:0.75em;color:#00897b;padding:3px 0;">In Calendar</span>
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
