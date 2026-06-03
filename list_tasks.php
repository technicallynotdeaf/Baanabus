<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); echo '<p class="muted">Vault is locked.</p>'; exit; }

$data    = getTasks();
$all     = $data['tasks'];
$now     = time();

$completedIds = [];
foreach ($all as $t) {
    if (($t['status'] ?? '') === 'complete') $completedIds[(int)$t['id']] = true;
}

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

$usedContexts = array_values(array_filter(
    array_unique(array_map(fn($t) => trim($t['context'] ?? ''), $active)),
    fn($c) => $c !== '' && $c !== ' '
));
sort($usedContexts);

$typeLabels = [
    'next_action' => '', 'contact' => 'contact', 'someday' => 'someday',
    'project' => 'project', 'wishlist' => 'wishlist', 'buy' => 'buy',
];
?>
<div data-init="initListTasks" style="position:relative;padding-bottom:1rem;">
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
  <input type="search" id="task-search" placeholder="Search tasks..." style="margin-bottom:0.75rem;">

  <!-- Context chips -->
  <?php if (count($usedContexts) > 1): ?>
  <div id="context-chips" style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:0.75rem;">
    <button class="context-chip active" data-ctx=""
            style="padding:4px 12px;font-size:0.8em;border-radius:20px;border:1px solid #8b7355;background:#8b7355;color:#fff;cursor:pointer;">All</button>
    <?php foreach ($usedContexts as $ctx): ?>
    <button class="context-chip" data-ctx="<?= htmlspecialchars($ctx) ?>"
            style="padding:4px 12px;font-size:0.8em;border-radius:20px;border:1px solid #8b7355;background:transparent;color:#8b7355;cursor:pointer;"><?= htmlspecialchars(ucfirst($ctx)) ?></button>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

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
        <?php
          $type       = $typeLabels[$t['task_type'] ?? ''] ?? ($t['task_type'] ?? '');
          $isSnoozed  = !empty($t['snoozed_until']) && strtotime($t['snoozed_until']) > $now;
          $isStuck    = !empty($t['stuck']);
          $prereqsMet = empty($t['prereq_tasks']) ||
              !array_diff(array_map('intval', (array)$t['prereq_tasks']), array_keys($completedIds));
          $notDoable  = $isSnoozed || $isStuck || !$prereqsMet;
        ?>
        <div class="task-row" data-id="<?= (int)$t['id'] ?>"
             data-title="<?= htmlspecialchars(strtolower($t['title'])) ?>"
             data-context="<?= htmlspecialchars(trim($t['context'] ?? '')) ?>"
             style="display:flex;align-items:flex-start;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0f0f0;<?= $notDoable ? 'opacity:0.4;' : '' ?>">
          <div style="flex:1;min-width:0;">
            <span style="line-height:1.4;word-break:break-word;"><?= htmlspecialchars($t['title']) ?></span>
            <?php if ($type): ?>
              <span style="font-size:0.72em;color:#aaa;margin-left:4px;"><?= htmlspecialchars($type) ?></span>
            <?php endif; ?>
            <?php if ($isSnoozed): ?>
              <span style="font-size:0.72em;color:#aaa;margin-left:4px;">snoozed <?= date('d M', strtotime($t['snoozed_until'])) ?></span>
            <?php elseif ($isStuck): ?>
              <span style="font-size:0.72em;color:#aaa;margin-left:4px;">stuck</span>
            <?php elseif (!$prereqsMet): ?>
              <span style="font-size:0.72em;color:#aaa;margin-left:4px;">blocked</span>
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
    <p class=”muted” style=”text-align:center;padding:2rem 0;”>No active tasks. Nice work.</p>
  <?php endif; ?>
</div>
