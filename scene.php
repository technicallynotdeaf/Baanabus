<?php
$paperCount      = 0;
$storyStarted    = false;
$badgeIds        = [];
$storyBooksAvail = [];
if (isUnlocked()) {
    try {
        $paperCount   = count(getInboxTasks());
        $storyStarted = true;
        $badgeIds     = array_keys(checkAndAwardBadges());
        $storyFiles = [1 => 'chai_meridian.php', 2 => 'the_platform.php', 3 => 'below_the_alcyon.php'];
        $prevEnded  = true; // book 1 has no prerequisite
        foreach ($storyFiles as $sid => $file) {
            $fileOk = file_exists(__DIR__ . '/content/stories/' . $file);
            if ($fileOk && $prevEnded) {
                $storyBooksAvail[] = $sid;
            }
            // Determine if this book is ended so the next one can check
            $prevEnded = false;
            if ($fileOk) {
                $prog      = getStoryProgress($sid);
                $prevEnded = !empty($prog['ended']);
            }
        }
    } catch (Throwable $e) {}
}
?>
<canvas id="sceneCanvas"
  data-papers="<?= (int)$paperCount ?>"
  data-story-started="<?= $storyStarted ? '1' : '0' ?>"
  data-badge-ids="<?= htmlspecialchars(json_encode($badgeIds), ENT_QUOTES) ?>"
  data-story-books-avail="<?= htmlspecialchars(json_encode($storyBooksAvail), ENT_QUOTES) ?>"></canvas>

<?php
$pageCount    = 0;
$pageTarget   = 15;
$totalPages   = 0;
$snoozedCount = 0;
$buckets      = ['inbox' => 0, 'ready' => 0, 'blocked' => 0, 'snoozed' => 0, 'someday' => 0, 'waiting' => 0, 'project' => 0];
if (isUnlocked()) {
    try {
        $t = getTasks();
        $pageCount  = (int)($t['pages']       ?? 0);
        $totalPages = (int)($t['total_pages'] ?? 0);
        $pageTarget = todayPagesTarget();
        $nowTs = time();
        $completedIds = [];
        foreach ($t['tasks'] ?? [] as $task) {
            if (($task['status'] ?? '') === 'complete') $completedIds[(int)$task['id']] = true;
        }
        $prereqsMet = fn($task) => empty($task['prereq_tasks']) ||
            !array_diff(array_map('intval', (array)$task['prereq_tasks']), array_keys($completedIds));
        foreach ($t['tasks'] ?? [] as $task) {
            if (($task['status'] ?? '') !== 'active') continue;
            if (!empty($task['parent_id'])) continue;
            $type      = $task['task_type'] ?? 'next_action';
            $isSnoozed = !empty($task['snoozed_until']) && strtotime($task['snoozed_until']) > $nowTs;
            if ($type === 'inbox')                                  { $buckets['inbox']++; }
            elseif ($isSnoozed)                                     { $buckets['snoozed']++; }
            elseif ($type === 'next_action' && $prereqsMet($task))   { $buckets['ready']++; }
            elseif ($type === 'next_action' && !$prereqsMet($task)) { $buckets['blocked']++; }
            elseif ($type === 'someday')                            { $buckets['someday']++; }
            elseif ($type === 'waiting')                            { $buckets['waiting']++; }
            elseif ($type === 'project')                            { $buckets['project']++; }
        }
        $snoozedCount = $buckets['snoozed'];
    } catch (Throwable $e) {}
}

$bucketDefs = [
    'inbox'   => ['label' => 'inbox',        'color' => '#9a6200', 'filter' => 'inbox'],
    'ready'   => ['label' => 'ready',        'color' => '#1a6b3a', 'filter' => 'ready'],
    'blocked' => ['label' => 'blocked',      'color' => '#a82020', 'filter' => 'blocked'],
    'snoozed' => ['label' => 'snoozed',      'color' => '#1e4d82', 'filter' => 'snoozed'],
    'someday' => ['label' => 'someday',      'color' => '#4a5568', 'filter' => 'someday'],
    'waiting' => ['label' => 'waiting',      'color' => '#553c87', 'filter' => 'waiting'],
    'project' => ['label' => 'needs a step', 'color' => '#8b3a00', 'filter' => 'project'],
];
$scoreboardSegs = [];
foreach ($bucketDefs as $key => $def) {
    if ($buckets[$key] === 0) continue;
    $scoreboardSegs[] = $def + ['count' => $buckets[$key], 'flex' => max($buckets[$key], 3)];
}
$fillPct     = $pageTarget > 0 ? min(100, round($pageCount / $pageTarget * 100)) : 0;
$energyLevel = 3;
if (isUnlocked()) {
    try {
        $row = getDiaryEntry(date('Y-m-d'));
        if (!empty($row['energy_level'])) $energyLevel = (int)$row['energy_level'];
    } catch (Throwable $e) {}
}
$isTired = $energyLevel <= 2;
?>
<div id="scene-progress" class="scene-progress" data-target="<?= $pageTarget ?>">
  <div id="scene-progress-fill" class="scene-progress-fill" style="width:<?= $fillPct ?>%"></div>
</div>
<div id="scene-total-pips">★ <?= $totalPages ?></div>
<div id="scene-clock"></div>
<?php
$energyLabels = [1 => 'Exhausted', 2 => 'Low energy', 3 => 'Okay', 4 => 'Good', 5 => 'On fire'];
$energyLabel  = $energyLabels[$energyLevel] ?? '';
?>
<div id="scene-energy"><?= htmlspecialchars($energyLabel) ?></div>
<?php if ($scoreboardSegs): ?>
<div id="scene-scoreboard">
  <?php foreach ($scoreboardSegs as $seg): ?>
  <button class="scb-seg" style="flex:<?= $seg['flex'] ?>;background:<?= $seg['color'] ?>;"
          onclick="loadOverlay('list_tasks.php?filter=<?= $seg['filter'] ?>')"
          title="<?= htmlspecialchars($seg['label']) ?>: <?= $seg['count'] ?>">
    <span class="scb-label"><?= htmlspecialchars($seg['label']) ?></span>
    <span class="scb-count"><?= $seg['count'] ?></span>
  </button>
  <?php endforeach; ?>
</div>
<?php endif; ?>

<button id="reset-btn" class="scene-mode-btn"<?= $isTired ? ' data-tired="1"' : '' ?>>Reset</button>
<button id="scene-snoozed" data-count="<?= $snoozedCount ?>"
        onclick="loadOverlay('list_tasks.php?filter=snoozed')">
  <span id="scene-snoozed-count"><?= $snoozedCount ?></span> snoozed
</button>

<script src="js/scene.js"></script>
