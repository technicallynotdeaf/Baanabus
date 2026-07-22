<?php
$paperCount      = 0;
$storyStarted    = false;
$badgeIds        = [];
$storyBooksAvail = [];
$storyCurrentBook = 0;
$storyPagesAvail  = 0;
$objectsOut      = false;
$cycleDay        = 0;
$cycleLen        = 0;
$cyclePhases     = [];
$top3Entries     = [];
if (isUnlocked()) {
    try {
        $cp = getCyclePhase();
        if ($cp) {
            $cycleDay    = $cp['day'];
            $cycleLen    = $cp['cycle_length'];
            $cyclePhases = getCyclePhases($cycleLen);
        }
    } catch (Throwable $e) {}
    try {
        $paperCount   = count(getInboxTasks());
        $storyStarted = true;
        $badgeIds     = array_keys(checkAndAwardBadges());
        // Books unlock strictly in sequence (next only opens once the previous
        // one is ended), so at most one unlocked book is ever still "in
        // progress". The global page pool is what actually gates making its
        // next choice, so surface that count as a badge on that one book.
        $bookState        = getStoryBookState();
        $storyBooksExist  = $bookState['books_exist'];
        $storyBooksAvail  = $bookState['books_avail'];
        $storyCurrentBook = $bookState['current_book'];
        $storyPagesAvail  = $bookState['pages_avail'];
    } catch (Throwable $e) {}
    try {
        $obj = getPhysicalObjects();
        $objectsOut      = !empty(array_filter($obj['objects'] ?? [], fn($o) => ($o['status'] ?? '') === 'out'));
        $objectsResolved = !empty(array_filter($obj['objects'] ?? [], fn($o) => ($o['status'] ?? '') === 'resolved'));
    } catch (Throwable $e) {}
    try {
        $top3Entries = getOrGenerateTop3();
    } catch (Throwable $e) {}
}
?>
<canvas id="sceneCanvas"
  data-papers="<?= (int)$paperCount ?>"
  data-story-started="<?= $storyStarted ? '1' : '0' ?>"
  data-badge-ids="<?= htmlspecialchars(json_encode($badgeIds), ENT_QUOTES) ?>"
  data-story-books-avail="<?= htmlspecialchars(json_encode($storyBooksAvail), ENT_QUOTES) ?>"
  data-story-books-exist="<?= htmlspecialchars(json_encode($storyBooksExist ?? []), ENT_QUOTES) ?>"
  data-story-current-book="<?= (int)$storyCurrentBook ?>"
  data-story-pages-avail="<?= (int)$storyPagesAvail ?>"
  data-objects-out="<?= $objectsOut ? '1' : '0' ?>"
  data-objects-resolved="<?= ($objectsResolved ?? false) ? '1' : '0' ?>"
  data-cycle-day="<?= $cycleDay ?>"
  data-cycle-len="<?= $cycleLen ?>"
  data-cycle-phases="<?= htmlspecialchars(json_encode($cyclePhases), ENT_QUOTES) ?>"
  data-top3="<?= htmlspecialchars(json_encode($top3Entries), ENT_QUOTES) ?>"></canvas>

<?php
$pageCount    = 0;
$pageTarget   = 15;
$totalPages   = 0;
$snoozedCount = 0;
$buckets      = ['routine' => 0, 'inbox' => 0, 'ready' => 0, 'blocked' => 0, 'snoozed' => 0, 'someday' => 0, 'waiting' => 0, 'project' => 0];
if (isUnlocked()) {
    try {
        $t = getTasks();
        $pageCount  = (int)($t['pages']       ?? 0);
        $totalPages = (int)($t['total_pages'] ?? 0);
        $pageTarget = todayPagesTarget();
        $nowTs = time();
        $today = date('Y-m-d');
        $completedIds = [];
        foreach ($t['tasks'] ?? [] as $task) {
            if (($task['status'] ?? '') === 'complete') $completedIds[(int)$task['id']] = true;
        }
        $prereqsMet = fn($task) => empty($task['prereq_tasks']) ||
            !array_diff(array_map('intval', (array)$task['prereq_tasks']), array_keys($completedIds));
        foreach ($t['tasks'] ?? [] as $task) {
            if (($task['status'] ?? '') !== 'active') continue;
            if (!empty($task['parent_id'])) continue;
            $type          = $task['task_type'] ?? '';
            $isSnoozed     = !empty($task['snoozed_until']) && strtotime($task['snoozed_until']) > $nowTs;
            $isFutureSched = !empty($task['scheduled_date']) && $task['scheduled_date'] > $today;
            // reference is not actionable — intentionally excluded from the bar
            if      ($type === 'reference')                                  { /* skip */ }
            elseif  ($type === 'inbox')                                      { $buckets['inbox']++; }
            elseif  ($isSnoozed || $isFutureSched)                          { $buckets['snoozed']++; }
            elseif  ($type === 'next_action' && $prereqsMet($task))          { $buckets['ready']++; }
            elseif  ($type === 'next_action' && !$prereqsMet($task))         { $buckets['blocked']++; }
            elseif  ($type === 'someday')                                    { $buckets['someday']++; }
            elseif  ($type === 'waiting')                                    { $buckets['waiting']++; }
            elseif  ($type === 'project')                                    { $buckets['project']++; }
            // unknown types also intentionally excluded rather than shown as noise
        }
        $buckets['routine'] = count(getActiveDailies());
        $snoozedCount = $buckets['snoozed'];
    } catch (Throwable $e) {}
}

$bucketDefs = [
    'routine' => ['label' => 'routine',      'color' => '#3aaa6c', 'filter' => '', 'link' => "loadOverlay('list_dailies.php')"],
    'inbox'   => ['label' => 'inbox',        'color' => '#9a6200', 'filter' => 'inbox'],
    'ready'   => ['label' => 'next action',  'color' => '#1a6b3a', 'filter' => 'ready'],
    'blocked' => ['label' => 'blocked',      'color' => '#a82020', 'filter' => 'blocked'],
    'snoozed' => ['label' => 'snoozed',      'color' => '#1e4d82', 'filter' => 'snoozed'],
    'someday' => ['label' => 'someday',      'color' => '#4a5568', 'filter' => 'someday'],
    'waiting' => ['label' => 'waiting',      'color' => '#553c87', 'filter' => 'waiting'],
    'project' => ['label' => 'projects',     'color' => '#2a2a2a', 'filter' => 'project'],
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
  <?php foreach ($scoreboardSegs as $seg):
    $onclick = $seg['link']
      ?? ($seg['filter']
          ? "loadOverlay('list_tasks.php?filter={$seg['filter']}')"
          : "loadSpeechBubble('lets-go.php')");
  ?>
  <button class="scb-seg" style="flex:<?= $seg['flex'] ?>;background:<?= $seg['color'] ?>;"
          onclick="<?= $onclick ?>"
          title="<?= htmlspecialchars($seg['label']) ?>: <?= $seg['count'] ?>">
    <span class="scb-label"><?= htmlspecialchars($seg['label']) ?></span>
    <span class="scb-count"><?= $seg['count'] ?></span>
  </button>
  <?php endforeach; ?>
</div>
<?php endif; ?>

<button id="reset-btn" class="scene-mode-btn"<?= $isTired ? ' data-tired="1"' : '' ?>>Reset</button>

<script src="js/scene.js"></script>
