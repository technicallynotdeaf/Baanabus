<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); echo '<p class="muted">Vault is locked.</p>'; exit; }

$data    = getTasks();
$all     = $data['tasks'];
$now     = time();

$subtaskMap = [];
foreach ($all as $t) {
    if (!empty($t['parent_id']) && ($t['status'] ?? '') === 'active') {
        $pid = (int)$t['parent_id'];
        if (!isset($subtaskMap[$pid])) $subtaskMap[$pid] = [];
        $subtaskMap[$pid][] = $t['title'];
    }
}

$activeContexts = [];
if ($database) {
    $rows = $database->query("SELECT context FROM contexts WHERE is_active=1 ORDER BY context")->fetchAll(PDO::FETCH_COLUMN);
    $activeContexts = $rows;
}

if (($_GET['filter'] ?? '') === 'snoozed') {
    $snoozed = [];
    foreach ($all as $t) {
        if (($t['status'] ?? '') !== 'active') continue;
        if (empty($t['snoozed_until'])) continue;
        if (strtotime($t['snoozed_until']) <= $now) continue;
        $snoozed[] = $t;
    }
    usort($snoozed, fn($a, $b) => strtotime($a['snoozed_until']) <=> strtotime($b['snoozed_until']));
    ?>
<div data-init="initSnoozedTasks" style="padding-bottom:1rem;">
  <h2 style="margin:0 0 0.25rem;">Snoozed <span class="muted" style="font-size:0.7em;font-weight:400;"><?= count($snoozed) ?></span></h2>
  <p class="muted" style="font-size:0.85em;margin-bottom:1rem;">Parked until a specific date. Wake anything that's ready now.</p>
  <?php if (empty($snoozed)): ?>
    <p class="muted" style="text-align:center;padding:2rem 0;">Nothing snoozed.</p>
  <?php else: ?>
    <?php foreach ($snoozed as $t):
        $wakeTs   = strtotime($t['snoozed_until']);
        $wakeDate = date('D j M', $wakeTs);
        $isToday  = date('Y-m-d', $wakeTs) === date('Y-m-d');
        $isTomorrow = date('Y-m-d', $wakeTs) === date('Y-m-d', strtotime('+1 day'));
        $wakeLabel = $isToday ? 'today' : ($isTomorrow ? 'tomorrow' : $wakeDate);
    ?>
    <div class="task-row snooze-task-row" data-id="<?= (int)$t['id'] ?>"
         style="display:flex;align-items:flex-start;gap:8px;padding:0.6rem 0;border-bottom:1px solid #f0f0f0;">
      <div style="flex:1;min-width:0;">
        <div style="line-height:1.4;word-break:break-word;"><?= htmlspecialchars($t['title']) ?></div>
        <div style="font-size:0.78em;color:#aaa;margin-top:2px;">wakes <?= htmlspecialchars($wakeLabel) ?></div>
      </div>
      <button class="task-wake-btn action-button"
              data-id="<?= (int)$t['id'] ?>"
              style="padding:3px 10px;font-size:0.75em;min-height:28px;flex-shrink:0;background:transparent;color:hsl(210,100%,30%);border:1px solid hsl(210,100%,30%);">Wake now</button>
    </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
    <?php
    exit;
}

$filter = $_GET['filter'] ?? '';

// Bucket filter views (non-snoozed)
$bucketFilters = [
    'inbox'   => ['title' => 'Inbox',          'note' => 'Unprocessed — work through these in the Let\'s Go bubble.', 'type' => 'inbox'],
    'ready'   => ['title' => 'Ready',           'note' => 'Active next actions you can do now.',                       'type' => 'next_action'],
    'someday' => ['title' => 'Someday',         'note' => 'Parked ideas. No pressure — review when you feel like it.', 'type' => 'someday'],
    'waiting' => ['title' => 'Waiting',         'note' => 'Delegated or blocked on someone else.',                    'type' => 'waiting'],
    'blocked' => ['title' => 'Blocked',         'note' => 'Next actions waiting on another task to be done first.',                        'type' => 'next_action'],
    'project' => ['title' => 'Needs a next step','note' => 'Multi-step tasks. Each one needs a concrete first action before it\'s doable.', 'type' => 'project'],
];
if (isset($bucketFilters[$filter])) {
    $completedIds = [];
    foreach ($all as $t) {
        if (($t['status'] ?? '') === 'complete') $completedIds[(int)$t['id']] = true;
    }
    $prereqsMet = fn($t) => empty($t['prereq_tasks']) ||
        !array_diff(array_map('intval', (array)$t['prereq_tasks']), array_keys($completedIds));
    $taskTitleMap = [];
    foreach ($all as $t2) {
        $taskTitleMap[(int)$t2['id']] = $t2['title'];
    }

    $def      = $bucketFilters[$filter];
    $filtered = [];
    foreach ($all as $t) {
        if (($t['status'] ?? '') !== 'active') continue;
        if (!empty($t['parent_id'])) continue;
        if (($t['task_type'] ?? '') !== $def['type']) continue;
        if ($filter === 'ready'   && !empty($t['snoozed_until']) && strtotime($t['snoozed_until']) > $now) continue;
        if ($filter === 'ready'   && !$prereqsMet($t)) continue;
        if ($filter === 'blocked' && $prereqsMet($t)) continue;
        if ($filter === 'blocked' && !empty($t['snoozed_until']) && strtotime($t['snoozed_until']) > $now) continue;
        $filtered[] = $t;
    }
    if ($filter === 'ready') {
        $uOrd = ['high' => 0, 'medium' => 1, 'low' => 2];
        usort($filtered, fn($a, $b) => ($uOrd[$a['urgency'] ?? 'low'] ?? 2) <=> ($uOrd[$b['urgency'] ?? 'low'] ?? 2));
    }
    ?>
<div data-init="initListTasks" style="padding-bottom:1rem;">
  <h2 style="margin:0 0 0.25rem;"><?= htmlspecialchars($def['title']) ?> <span class="muted" style="font-size:0.7em;font-weight:400;"><?= count($filtered) ?></span></h2>
  <p class="muted" style="font-size:0.85em;margin-bottom:1rem;"><?= htmlspecialchars($def['note']) ?></p>
  <?php if (empty($filtered)): ?>
    <p class="muted" style="text-align:center;padding:2rem 0;">Nothing here.</p>
  <?php else: ?>
    <?php foreach ($filtered as $t):
        $isSnoozed = !empty($t['snoozed_until']) && strtotime($t['snoozed_until']) > $now;
        $isStuck   = !empty($t['stuck']);
        $notDoable = $isSnoozed || $isStuck;
        $ctx       = trim($t['context'] ?? '');
        $type      = $t['task_type'] ?? '';
    ?>
    <div class="task-row" data-id="<?= (int)$t['id'] ?>"
         data-title="<?= htmlspecialchars(strtolower($t['title'])) ?>"
         data-context="<?= htmlspecialchars($ctx) ?>"
         style="display:flex;align-items:flex-start;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0f0f0;<?= $notDoable ? 'opacity:0.4;' : '' ?>">
      <div style="flex:1;min-width:0;">
        <div style="line-height:1.4;word-break:break-word;"><?= htmlspecialchars($t['title']) ?></div>
        <?php if ($filter === 'blocked' && !empty($t['prereq_tasks'])):
            $unmetIds = array_diff(array_map('intval', (array)$t['prereq_tasks']), array_keys($completedIds));
            $blockers = array_values(array_filter(array_map(fn($id) => $taskTitleMap[$id] ?? null, $unmetIds)));
            if ($blockers): ?>
          <div style="font-size:0.78em;color:#a82020;margin-top:3px;line-height:1.4;">
            needs first: <?= htmlspecialchars(implode(', ', $blockers)) ?>
          </div>
        <?php endif;
        else:
          $subs = $subtaskMap[(int)$t['id']] ?? [];
          if ($subs): ?>
          <div style="font-size:0.78em;color:#bbb;margin-top:2px;line-height:1.4;">
            <?= htmlspecialchars(implode(' · ', array_slice($subs, 0, 3))) ?>
            <?php if (count($subs) > 3): ?><span style="color:#ddd;">+ <?= count($subs) - 3 ?> more</span><?php endif; ?>
          </div>
        <?php elseif ($ctx): ?><div style="font-size:0.75em;color:#bbb;margin-top:2px;"><?= htmlspecialchars($ctx) ?></div><?php endif;
        endif; ?>
      </div>
      <?php if ($filter !== 'inbox'): ?>
      <div style="display:flex;gap:4px;flex-shrink:0;">
        <button class="task-done-btn action-button" data-id="<?= (int)$t['id'] ?>"
                style="padding:3px 8px;font-size:0.75em;min-height:28px;">Done</button>
        <button class="task-snooze-btn action-button" data-id="<?= (int)$t['id'] ?>"
                style="padding:3px 8px;font-size:0.75em;min-height:28px;background:transparent;color:hsl(210,100%,30%);border:1px solid hsl(210,100%,30%);">Snooze</button>
      </div>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
    <?php
    exit;
}

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
        <label style="font-size:0.8em;color:#555;display:block;margin-bottom:3px;">Location</label>
        <select id="new-task-location">
          <option value="">Anywhere</option>
          <option value="home">Home</option>
          <option value="work">Work</option>
          <option value="shops">Shops</option>
          <option value="online">Online</option>
          <option value="phone">Phone call</option>
        </select>
      </div>
      <div style="flex:1;min-width:120px;">
        <label style="font-size:0.8em;color:#555;display:block;margin-bottom:3px;">Context</label>
        <select id="new-task-context">
          <option value="">None</option>
          <?php foreach ($activeContexts as $ctx): ?>
          <option value="<?= htmlspecialchars($ctx) ?>"><?= htmlspecialchars($ctx) ?></option>
          <?php endforeach; ?>
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
        <?php
          $tSubs    = $subtaskMap[(int)$t['id']] ?? [];
          $subSearch = strtolower(implode(' ', $tSubs));
        ?>
        <div class="task-row" data-id="<?= (int)$t['id'] ?>"
             data-title="<?= htmlspecialchars(strtolower($t['title']) . ' ' . $subSearch) ?>"
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
            <?php if ($tSubs): ?>
              <div style="font-size:0.78em;color:#bbb;margin-top:2px;line-height:1.4;">
                <?= htmlspecialchars(implode(' · ', array_slice($tSubs, 0, 3))) ?>
                <?php if (count($tSubs) > 3): ?><span style="color:#ddd;">+ <?= count($tSubs) - 3 ?> more</span><?php endif; ?>
              </div>
            <?php elseif (trim($t['context'] ?? '')): ?>
              <div style="font-size:0.75em;color:#bbb;margin-top:2px;"><?= htmlspecialchars(trim($t['context'])) ?></div>
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
