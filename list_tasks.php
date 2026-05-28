<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); echo '<p class="muted">Vault is locked.</p>'; exit; }

$data    = getTasks();
$all     = $data['tasks'];
$now     = time();

$inbox   = [];
$active  = [];
foreach ($all as $t) {
    if (($t['status'] ?? '') !== 'active') continue;
    if (!empty($t['parent_id'])) continue;
    if (($t['task_type'] ?? '') === 'inbox') { $inbox[] = $t; continue; }
    $active[] = $t;
}

$urgencyOrder = ['high' => 0, 'medium' => 1, 'low' => 2];
usort($active, function($a, $b) use ($urgencyOrder) {
    $ua = $urgencyOrder[$a['urgency'] ?? 'low'] ?? 2;
    $ub = $urgencyOrder[$b['urgency'] ?? 'low'] ?? 2;
    return $ua <=> $ub;
});

$groups = ['high' => [], 'medium' => [], 'low' => []];
foreach ($active as $t) {
    $u = $t['urgency'] ?? 'low';
    if (!isset($groups[$u])) $u = 'low';
    $groups[$u][] = $t;
}

$urgencyLabel = ['high' => 'High priority', 'medium' => 'Medium priority', 'low' => 'Low priority'];
$urgencyColor = ['high' => '#c0392b', 'medium' => '#e67e22', 'low' => '#888'];

$typeLabels = [
    'next_action' => '', 'contact' => 'contact', 'someday' => 'someday',
    'project' => 'project', 'wishlist' => 'wishlist', 'buy' => 'buy',
];
?>
<div style="position:relative;padding-bottom:1rem;">
  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;">
    <h2 style="margin:0;">Tasks <span class="muted" style="font-size:0.7em;font-weight:400;"><?= count($active) ?></span></h2>
    <button class="btn" id="btn-show-add" style="padding:8px 14px;font-size:0.88em;min-height:36px;">+ Add task</button>
  </div>

  <!-- Add task form -->
  <div id="add-task-form" style="display:none;background:#f8f9fa;border-radius:10px;padding:1rem;margin-bottom:1rem;">
    <input type="text" id="new-task-title" placeholder="What needs doing?" maxlength="300"
           style="margin-bottom:0.5rem;">
    <div style="display:flex;gap:8px;flex-wrap:wrap;align-items:flex-end;">
      <div style="flex:1;min-width:120px;">
        <label style="font-size:0.8em;color:#555;display:block;margin-bottom:3px;">Urgency</label>
        <select id="new-task-urgency">
          <option value="high">High</option>
          <option value="medium" selected>Medium</option>
          <option value="low">Low</option>
        </select>
      </div>
      <div style="flex:1;min-width:120px;">
        <label style="font-size:0.8em;color:#555;display:block;margin-bottom:3px;">Context</label>
        <select id="new-task-context">
          <option value="">Any</option>
          <option value="home">Home</option>
          <option value="work">Work</option>
          <option value="shops">Shops</option>
          <option value="online">Online</option>
          <option value="phone">Phone</option>
        </select>
      </div>
      <button class="btn" id="btn-add-task" style="flex-shrink:0;padding:8px 14px;font-size:0.88em;min-height:44px;">Save</button>
    </div>
    <p id="add-task-status" class="muted" style="margin-top:0.4rem;min-height:1.2em;font-size:0.85em;"></p>
  </div>

  <?php if ($inbox): ?>
  <div style="background:#fff8e1;border-radius:10px;padding:0.75rem 1rem;margin-bottom:1rem;display:flex;align-items:center;justify-content:space-between;gap:8px;">
    <span style="font-size:0.9em;"><strong><?= count($inbox) ?></strong> inbox items need triaging</span>
    <button class="btn" onclick="loadSpeechBubble('lets-go.php');document.getElementById('overlay').style.display='none';"
            style="padding:6px 12px;font-size:0.82em;min-height:32px;background:hsl(45,100%,40%);">Triage</button>
  </div>
  <?php endif; ?>

  <!-- Search -->
  <input type="search" id="task-search" placeholder="Search tasks…" style="margin-bottom:1rem;">

  <!-- Task groups -->
  <?php foreach ($groups as $urgency => $tasks): ?>
    <?php if (empty($tasks)) continue; ?>
    <div class="task-group" data-urgency="<?= $urgency ?>">
      <div style="display:flex;align-items:center;gap:6px;margin-bottom:0.4rem;margin-top:0.75rem;">
        <span style="font-size:0.72em;font-weight:600;color:<?= $urgencyColor[$urgency] ?>;text-transform:uppercase;letter-spacing:0.06em;">
          <?= $urgencyLabel[$urgency] ?>
        </span>
        <span class="task-group-count muted" style="font-size:0.75em;"><?= count($tasks) ?></span>
      </div>
      <?php foreach ($tasks as $t): ?>
        <?php $type = $typeLabels[$t['task_type'] ?? ''] ?? ($t['task_type'] ?? ''); ?>
        <div class="task-row" data-id="<?= (int)$t['id'] ?>"
             data-title="<?= htmlspecialchars(strtolower($t['title'])) ?>"
             style="display:flex;align-items:flex-start;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0f0f0;">
          <div style="flex:1;min-width:0;">
            <span style="line-height:1.4;word-break:break-word;"><?= htmlspecialchars($t['title']) ?></span>
            <?php if ($type): ?>
              <span style="font-size:0.72em;color:#aaa;margin-left:4px;"><?= htmlspecialchars($type) ?></span>
            <?php endif; ?>
            <?php if (!empty($t['snoozed_until']) && strtotime($t['snoozed_until']) > time()): ?>
              <span style="font-size:0.72em;color:#aaa;margin-left:4px;">snoozed <?= date('d M', strtotime($t['snoozed_until'])) ?></span>
            <?php endif; ?>
          </div>
          <div style="display:flex;gap:4px;flex-shrink:0;">
            <button class="task-done-btn action-button"
                    style="padding:3px 8px;font-size:0.75em;min-height:28px;"
                    data-id="<?= (int)$t['id'] ?>">Done</button>
            <button class="task-snooze-btn action-button"
                    style="padding:3px 8px;font-size:0.75em;min-height:28px;background:transparent;color:hsl(210,100%,30%);border:1px solid hsl(210,100%,30%);"
                    data-id="<?= (int)$t['id'] ?>">Snooze</button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>

  <?php if (empty($active)): ?>
    <p class="muted" style="text-align:center;padding:2rem 0;">No active tasks — nice work.</p>
  <?php endif; ?>
</div>

<script>
(function() {
  // Add task form toggle
  const btnShow = document.getElementById('btn-show-add');
  const form    = document.getElementById('add-task-form');
  const titleIn = document.getElementById('new-task-title');
  btnShow.addEventListener('click', function() {
    const open = form.style.display !== 'none';
    form.style.display = open ? 'none' : 'block';
    if (!open) titleIn.focus();
  });

  document.getElementById('btn-add-task').addEventListener('click', addTask);
  titleIn.addEventListener('keydown', e => { if (e.key === 'Enter') addTask(); });

  function addTask() {
    const title   = titleIn.value.trim();
    const urgency = document.getElementById('new-task-urgency').value;
    const context = document.getElementById('new-task-context').value;
    const status  = document.getElementById('add-task-status');
    if (!title) { status.textContent = 'Enter a title first.'; return; }
    status.textContent = 'Saving…';
    fetch('api/add_task.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ title, urgency, context: context || null }),
    })
    .then(r => r.json())
    .then(d => {
      if (!d.ok) throw new Error(d.error || 'Failed');
      titleIn.value = '';
      status.textContent = 'Saved.';
      setTimeout(() => { status.textContent = ''; }, 2000);
      addRowToGroup({ id: d.task_id, title, urgency, context });
    })
    .catch(e => { status.textContent = e.message; status.style.color = 'crimson'; });
  }

  function addRowToGroup(t) {
    const group = document.querySelector(`.task-group[data-urgency="${t.urgency}"]`);
    if (!group) return;
    const row = document.createElement('div');
    row.className = 'task-row';
    row.dataset.id    = t.id;
    row.dataset.title = t.title.toLowerCase();
    row.style.cssText = 'display:flex;align-items:flex-start;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0f0f0;';
    row.innerHTML = `
      <div style="flex:1;min-width:0;"><span style="line-height:1.4;word-break:break-word;">${esc(t.title)}</span></div>
      <div style="display:flex;gap:4px;flex-shrink:0;">
        <button class="task-done-btn action-button" data-id="${t.id}" style="padding:3px 8px;font-size:0.75em;min-height:28px;">Done</button>
        <button class="task-snooze-btn action-button" data-id="${t.id}" style="padding:3px 8px;font-size:0.75em;min-height:28px;background:transparent;color:hsl(210,100%,30%);border:1px solid hsl(210,100%,30%);">Snooze</button>
      </div>`;
    group.appendChild(row);
    const countEl = group.querySelector('.task-group-count');
    if (countEl) countEl.textContent = parseInt(countEl.textContent || '0') + 1;
  }

  // Search
  document.getElementById('task-search').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.task-row').forEach(row => {
      row.style.display = (!q || row.dataset.title.includes(q)) ? '' : 'none';
    });
    document.querySelectorAll('.task-group').forEach(group => {
      const visible = group.querySelectorAll('.task-row:not([style*="display: none"])').length;
      group.style.display = visible ? '' : 'none';
    });
  });

  // Done button
  document.addEventListener('click', function(e) {
    const btn = e.target.closest('.task-done-btn');
    if (!btn) return;
    const taskId = parseInt(btn.dataset.id);
    const row    = btn.closest('.task-row');
    btn.disabled = true;
    fetch(`api/mark_complete.api.php?task_id=${taskId}`)
      .then(r => r.json())
      .then(d => {
        if (d.success) {
          updateProgressBar(d.pages, d.pages_target);
          row.style.transition = 'opacity 0.2s';
          row.style.opacity = '0';
          setTimeout(() => row.remove(), 220);
        } else {
          btn.disabled = false;
        }
      })
      .catch(() => { btn.disabled = false; });
  });

  // Snooze button — simple inline picker
  document.addEventListener('click', function(e) {
    const btn = e.target.closest('.task-snooze-btn');
    if (!btn) return;
    const taskId = parseInt(btn.dataset.id);
    const row    = btn.closest('.task-row');

    // Remove any existing picker
    document.querySelectorAll('.snooze-picker').forEach(p => p.remove());

    const now       = new Date();
    const fmt       = d => `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;
    const tonight   = fmt(now) + 'T21:00:00';
    const tom       = new Date(now); tom.setDate(now.getDate() + 1);
    const tomorrow  = fmt(tom) + 'T08:00:00';
    const nextWeek  = new Date(now); nextWeek.setDate(now.getDate() + 7);
    const nwStr     = fmt(nextWeek) + 'T08:00:00';

    const picker = document.createElement('div');
    picker.className = 'snooze-picker';
    picker.style.cssText = 'display:flex;gap:4px;flex-wrap:wrap;padding:4px 0;';
    [['Tonight', tonight], ['Tomorrow', tomorrow], ['Next week', nwStr]].forEach(([label, when]) => {
      const b = document.createElement('button');
      b.className = 'action-button';
      b.style.cssText = 'padding:3px 8px;font-size:0.75em;min-height:28px;';
      b.textContent = label;
      b.addEventListener('click', () => snooze(taskId, when, row, picker));
      picker.appendChild(b);
    });
    row.after(picker);
  });

  function snooze(taskId, when, row, picker) {
    picker.querySelectorAll('button').forEach(b => b.disabled = true);
    fetch('api/task_action.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ task_id: taskId, action: 'snooze', when }),
    })
    .then(r => r.json())
    .then(d => {
      if (d.ok) {
        picker.remove();
        row.style.transition = 'opacity 0.2s';
        row.style.opacity = '0';
        setTimeout(() => row.remove(), 220);
      }
    })
    .catch(() => { picker.querySelectorAll('button').forEach(b => b.disabled = false); });
  }

  function esc(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }
})();
</script>
