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
    $unscheduled = array_values(array_filter($all, fn($t) =>
        empty($t['scheduled_date']) &&
        ($t['task_type'] ?? '') === 'next_action' &&
        $t['status'] === 'active'
    ));
} catch (Throwable $e) {
    echo '<p class="muted">Could not load tasks.</p>'; exit;
}

$canAdd = !$isPast && count($scheduled) < 3;

$mealPlan = [];
try {
    $diaryEntry = getDiaryEntry($date);
    $mealPlan   = $diaryEntry['meal_plan'] ?? [];
} catch (Throwable $e) {}
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
        <li data-id="<?= (int)$t['id'] ?>"
            style="display:flex;align-items:center;justify-content:space-between;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0ede6;">
          <span style="flex:1;line-height:1.4;"><?= htmlspecialchars($t['title']) ?></span>
          <?php if (!$isPast): ?>
            <button class="action-button"
                    style="font-size:0.78em;padding:4px 10px;min-height:32px;background:transparent;color:#888;border:1px solid #ddd;"
                    onclick="window._removeFromDay(<?= (int)$t['id'] ?>, '<?= $date ?>')">Remove</button>
          <?php endif; ?>
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
          <p class="muted" style="font-size:0.9em;">No unscheduled next actions â€” triage your inbox to create some.</p>
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
  <?php elseif (!$isPast && count($scheduled) >= 3): ?>
    <p class="muted" style="margin-top:0.75rem;font-size:0.85em;">Day is full â€” 3 tasks max.</p>
  <?php endif; ?>
</div>
