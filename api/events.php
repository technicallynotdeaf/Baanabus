<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); echo '<p class="muted">Vault is locked.</p>'; exit; }

try {
    $eventsData = getEvents();
    $events = $eventsData['events'] ?? [];
    $people = getPeople()['people'] ?? [];
    $tasks  = getTasks()['tasks'] ?? [];

    // Build people index for easy lookup
    $peopleIndex = [];
    foreach ($people as $p) {
        $peopleIndex[(int)$p['person_id']] = $p;
    }

    // Build task index
    $taskIndex = [];
    foreach ($tasks as $t) {
        $taskIndex[(int)$t['id']] = $t;
    }

    // Sort events by date
    usort($events, fn($a, $b) => strcmp($b['date'] ?? '', $a['date'] ?? ''));
} catch (Throwable $e) {
    echo '<p class="muted">Error loading events: ' . htmlspecialchars($e->getMessage()) . '</p>';
    exit;
}
?>

<div data-init="initEventsOverlay" style="padding-bottom:2rem;">
  <h2 style="margin-bottom:1rem;">Calendar events</h2>

  <!-- Add event form (initially hidden) -->
  <div id="add-event-form" style="display:none;background:#f8f9fa;border-radius:10px;padding:1rem;margin-bottom:1.5rem;">
    <h3 style="margin-top:0;font-size:1em;">New event</h3>

    <div style="margin-bottom:0.75rem;">
      <label style="display:block;font-size:0.85em;color:#555;margin-bottom:4px;">Title</label>
      <input type="text" id="event-title" placeholder="e.g. Church, Coffee with Sarah, Train" maxlength="200"
             style="width:100%;box-sizing:border-box;">
    </div>

    <div style="display:flex;gap:0.75rem;margin-bottom:0.75rem;">
      <div style="flex:1;">
        <label style="display:block;font-size:0.85em;color:#555;margin-bottom:4px;">Date</label>
        <input type="date" id="event-date" style="width:100%;box-sizing:border-box;">
      </div>
      <div style="flex:1;">
        <label style="display:block;font-size:0.85em;color:#555;margin-bottom:4px;">Start time (opt.)</label>
        <input type="time" id="event-time-start" style="width:100%;box-sizing:border-box;">
      </div>
      <div style="flex:1;">
        <label style="display:block;font-size:0.85em;color:#555;margin-bottom:4px;">End time (opt.)</label>
        <input type="time" id="event-time-end" style="width:100%;box-sizing:border-box;">
      </div>
    </div>

    <div style="margin-bottom:0.75rem;">
      <label style="display:block;font-size:0.85em;color:#555;margin-bottom:4px;">Recurring (opt.)</label>
      <select id="event-recurring" style="width:100%;box-sizing:border-box;">
        <option value="">One-off</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>
        <option value="yearly">Yearly</option>
      </select>
    </div>

    <div style="margin-bottom:0.75rem;">
      <label style="display:block;font-size:0.85em;color:#555;margin-bottom:4px;">Notes</label>
      <textarea id="event-notes" placeholder="Context, reminders, etc." rows="2" style="width:100%;box-sizing:border-box;resize:vertical;"></textarea>
    </div>

    <div style="display:flex;gap:8px;margin-top:1rem;">
      <button class="action-button" id="btn-save-event" style="padding:8px 16px;font-size:0.9em;min-height:36px;">Save</button>
      <button class="action-button" id="btn-cancel-event" style="padding:8px 16px;font-size:0.9em;min-height:36px;background:transparent;color:#888;border:1.5px solid #ddd;">Cancel</button>
    </div>
    <p id="add-event-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>
  </div>

  <!-- Add button -->
  <button class="action-button" id="btn-add-event" style="padding:8px 14px;font-size:0.88em;min-height:36px;margin-bottom:1rem;">+ New event</button>

  <!-- Events list -->
  <div id="events-list">
    <?php if (empty($events)): ?>
      <p class="muted" style="text-align:center;padding:2rem 0;">No events yet.</p>
    <?php else: ?>
      <?php foreach ($events as $e):
        $dateObj = DateTime::createFromFormat('Y-m-d', $e['date'] ?? '');
        $dateStr = $dateObj ? $dateObj->format('D M j') : $e['date'];
        $timeStr = '';
        if (!empty($e['time_start'])) {
          $timeStr = $e['time_start'];
          if (!empty($e['time_end'])) $timeStr .= '–' . $e['time_end'];
        }
      ?>
      <div class="event-row" data-event-id="<?= (int)$e['id'] ?>"
           style="background:#f8f9fa;border-radius:8px;padding:0.75rem;margin-bottom:0.75rem;">

        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;margin-bottom:0.5rem;">
          <div style="flex:1;min-width:0;">
            <div style="font-weight:600;word-break:break-word;"><?= htmlspecialchars($e['title'] ?? '') ?></div>
            <div style="font-size:0.8em;color:#888;">
              <?= htmlspecialchars($dateStr) ?>
              <?php if ($timeStr): ?><span style="margin-left:4px;"><?= htmlspecialchars($timeStr) ?></span><?php endif; ?>
            </div>
          </div>
          <div style="display:flex;gap:4px;flex-shrink:0;">
            <button class="event-btn-edit" style="background:none;border:none;cursor:pointer;padding:4px;color:#666;font-size:1.1em;min-height:32px;min-width:32px;"
                    title="Edit">&#9999;</button>
            <button class="event-btn-delete" style="background:none;border:none;cursor:pointer;padding:4px;color:#c0392b;font-size:1.1em;min-height:32px;min-width:32px;"
                    title="Delete">&#10005;</button>
          </div>
        </div>

        <!-- People tags -->
        <?php if (!empty($e['people_ids'])): ?>
          <div style="display:flex;flex-wrap:wrap;gap:4px;margin-bottom:0.4rem;">
            <?php foreach ((array)$e['people_ids'] as $pid):
              $p = $peopleIndex[$pid] ?? null;
              if ($p):
            ?>
              <span style="font-size:0.75em;background:#e3f2fd;color:#1565c0;padding:2px 8px;border-radius:3px;">
                <?= htmlspecialchars($p['name'] ?? '') ?>
              </span>
            <?php endif; endforeach; ?>
          </div>
        <?php endif; ?>

        <!-- Task links -->
        <?php if (!empty($e['task_ids'])): ?>
          <div style="font-size:0.85em;color:#555;margin-bottom:0.4rem;">
            <span class="muted">Tasks:</span>
            <?php $taskTitles = array_map(fn($tid) => $taskIndex[$tid]['title'] ?? '', array_filter($e['task_ids'], fn($tid) => isset($taskIndex[$tid]))); ?>
            <?= htmlspecialchars(implode(', ', $taskTitles)) ?>
          </div>
        <?php endif; ?>

        <!-- Notes -->
        <?php if (!empty($e['notes'])): ?>
          <div style="font-size:0.85em;color:#666;margin-bottom:0.4rem;">
            <?= htmlspecialchars($e['notes']) ?>
          </div>
        <?php endif; ?>

        <!-- Status badges -->
        <div style="display:flex;gap:6px;align-items:center;flex-wrap:wrap;">
          <?php if (!empty($e['prebriefed'])): ?>
            <span style="font-size:0.75em;background:#c8e6c9;color:#2e7d32;padding:2px 6px;border-radius:3px;">Prebriefed</span>
          <?php endif; ?>
          <?php if (!empty($e['debriefed'])): ?>
            <span style="font-size:0.75em;background:#c8e6c9;color:#2e7d32;padding:2px 6px;border-radius:3px;">Debriefed</span>
          <?php endif; ?>
          <?php if (!empty($e['recurring'])): ?>
            <span style="font-size:0.75em;background:#fff3e0;color:#e65100;padding:2px 6px;border-radius:3px;">
              <?= htmlspecialchars(ucfirst($e['recurring'])) ?>
            </span>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<script>
function initEventsOverlay() {
  const btnAdd = document.getElementById('btn-add-event');
  const formAdd = document.getElementById('add-event-form');
  const btnSave = document.getElementById('btn-save-event');
  const btnCancel = document.getElementById('btn-cancel-event');
  const statusAdd = document.getElementById('add-event-status');

  btnAdd.addEventListener('click', () => {
    formAdd.style.display = formAdd.style.display === 'none' ? 'block' : 'none';
  });

  btnCancel.addEventListener('click', () => {
    formAdd.style.display = 'none';
    document.getElementById('event-title').value = '';
    document.getElementById('event-date').value = '';
    document.getElementById('event-time-start').value = '';
    document.getElementById('event-time-end').value = '';
    document.getElementById('event-recurring').value = '';
    document.getElementById('event-notes').value = '';
  });

  btnSave.addEventListener('click', async () => {
    const title = document.getElementById('event-title').value.trim();
    const date = document.getElementById('event-date').value.trim();
    if (!title || !date) {
      statusAdd.textContent = 'Title and date required';
      statusAdd.style.color = '#c0392b';
      return;
    }

    const payload = {
      action: 'add_event',
      title: title,
      date: date,
      fields: {
        time_start: document.getElementById('event-time-start').value || null,
        time_end: document.getElementById('event-time-end').value || null,
        recurring: document.getElementById('event-recurring').value || null,
        notes: document.getElementById('event-notes').value || null,
        people_ids: [],
        task_ids: [],
        prereq_tasks: [],
      }
    };

    statusAdd.textContent = 'Saving...';
    statusAdd.style.color = '#888';
    try {
      const resp = await fetch('/api/agent.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + document.body.getAttribute('data-bsk')
        },
        body: JSON.stringify(payload)
      });
      const result = await resp.json();
      if (result.ok) {
        location.reload();
      } else {
        statusAdd.textContent = 'Error: ' + (result.error || 'Unknown error');
        statusAdd.style.color = '#c0392b';
      }
    } catch (e) {
      statusAdd.textContent = 'Network error';
      statusAdd.style.color = '#c0392b';
    }
  });

  // Delete buttons
  document.querySelectorAll('.event-btn-delete').forEach(btn => {
    btn.addEventListener('click', async (evt) => {
      evt.stopPropagation();
      const row = btn.closest('.event-row');
      const eventId = parseInt(row.getAttribute('data-event-id'));
      if (!confirm('Delete this event?')) return;

      try {
        const resp = await fetch('/api/agent.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + document.body.getAttribute('data-bsk')
          },
          body: JSON.stringify({ action: 'delete_event', event_id: eventId })
        });
        const result = await resp.json();
        if (result.ok) {
          row.style.opacity = '0.5';
          setTimeout(() => row.remove(), 200);
        }
      } catch (e) {}
    });
  });
}
</script>
