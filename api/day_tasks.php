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
?>
<div>
  <h2 style="margin-bottom:1rem;"><?= htmlspecialchars($label) ?></h2>

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
  <?php elseif (!$isPast && count($scheduled) >= 3): ?>
    <p class="muted" style="margin-top:0.75rem;font-size:0.85em;">Day is full — 3 tasks max.</p>
  <?php endif; ?>
</div>

<script>
window._showPicker = function() {
  document.getElementById('task-picker').style.display = 'block';
  document.getElementById('add-btn').style.display = 'none';
};

window._addToDay = function(taskId, date, btn) {
  btn.disabled = true;
  fetch('api/schedule_task.php', {
    method:  'POST',
    headers: {'Content-Type': 'application/json'},
    body:    JSON.stringify({task_id: taskId, scheduled_date: date}),
  })
  .then(r => r.json())
  .then(data => {
    if (data.ok) {
      if (window.calendarInvalidate) window.calendarInvalidate(date.substring(0, 7));
      btn.remove();
      const list = document.getElementById('day-task-list');
      if (!list) {
        document.querySelector('#add-section').insertAdjacentHTML('beforebegin',
          '<ul id="day-task-list" style="list-style:none;margin:0 0 1rem;padding:0;"></ul>');
      }
      document.getElementById('day-task-list').insertAdjacentHTML('beforeend',
        `<li style="padding:0.5rem 0;border-bottom:1px solid #f0ede6;">${btn.textContent.trim()}</li>`
      );
    } else {
      btn.disabled = false;
      alert(data.error || 'Could not schedule task.');
    }
  })
  .catch(() => { btn.disabled = false; });
};

window._removeFromDay = function(taskId, date) {
  const li = document.querySelector(`[data-id="${taskId}"]`);
  if (li) li.style.opacity = '0.4';
  fetch('api/schedule_task.php', {
    method:  'POST',
    headers: {'Content-Type': 'application/json'},
    body:    JSON.stringify({task_id: taskId, scheduled_date: null}),
  })
  .then(r => r.json())
  .then(data => {
    if (data.ok) {
      if (window.calendarInvalidate) window.calendarInvalidate(date.substring(0, 7));
      if (li) li.remove();
    } else {
      if (li) li.style.opacity = '1';
    }
  })
  .catch(() => { if (li) li.style.opacity = '1'; });
};
</script>
