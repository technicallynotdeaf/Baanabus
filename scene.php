<?php
$paperCount      = 0;
$storyStarted    = false;
$badgeIds        = [];
$storyBooksAvail = [];
$storyCurrentBook = 0;
$storyPagesAvail  = 0;
$secondBooksAvail = [];
$secondCurrentBook = 0;
$secondPagesAvail  = 0;
$thirdBooksAvail  = [];
$thirdCurrentBook = 0;
$thirdPagesAvail  = 0;
$fourthBooksAvail  = [];
$fourthCurrentBook = 0;
$fourthPagesAvail  = 0;
$fifthBooksAvail  = [];
$fifthCurrentBook = 0;
$fifthPagesAvail  = 0;
$sixthBooksAvail  = [];
$sixthCurrentBook = 0;
$sixthPagesAvail  = 0;
$objectsOut      = false;
$cycleDay        = 0;
$cycleLen        = 0;
$cyclePhases     = [];
$top3Entries     = [];
$birthdaysToday  = [];
$birthdaysSoon   = [];
$pipeData        = null;
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
        $secondBookState   = getSecondBookSetState();
        $secondBooksExist  = $secondBookState['books_exist'];
        $secondBooksAvail  = $secondBookState['books_avail'];
        $secondCurrentBook = $secondBookState['current_book'];
        $secondPagesAvail  = $secondBookState['pages_avail'];
        $thirdBookState   = getThirdBookSetState();
        $thirdBooksExist  = $thirdBookState['books_exist'];
        $thirdBooksAvail  = $thirdBookState['books_avail'];
        $thirdCurrentBook = $thirdBookState['current_book'];
        $thirdPagesAvail  = $thirdBookState['pages_avail'];
        $fourthBookState   = getFourthBookSetState();
        $fourthBooksExist  = $fourthBookState['books_exist'];
        $fourthBooksAvail  = $fourthBookState['books_avail'];
        $fourthCurrentBook = $fourthBookState['current_book'];
        $fourthPagesAvail  = $fourthBookState['pages_avail'];
        $fifthBookState   = getFifthBookSetState();
        $fifthBooksExist  = $fifthBookState['books_exist'];
        $fifthBooksAvail  = $fifthBookState['books_avail'];
        $fifthCurrentBook = $fifthBookState['current_book'];
        $fifthPagesAvail  = $fifthBookState['pages_avail'];
        $sixthBookState   = getSixthBookSetState();
        $sixthBooksExist  = $sixthBookState['books_exist'];
        $sixthBooksAvail  = $sixthBookState['books_avail'];
        $sixthCurrentBook = $sixthBookState['current_book'];
        $sixthPagesAvail  = $sixthBookState['pages_avail'];
    } catch (Throwable $e) {}
    try {
        $obj = getPhysicalObjects();
        $objectsOut      = !empty(array_filter($obj['objects'] ?? [], fn($o) => ($o['status'] ?? '') === 'out'));
        $objectsResolved = !empty(array_filter($obj['objects'] ?? [], fn($o) => ($o['status'] ?? '') === 'resolved'));
    } catch (Throwable $e) {}
    try {
        $top3Entries = getOrGenerateTop3();
    } catch (Throwable $e) {}
    try {
        $upcoming = getUpcomingBirthdays();
        $dismissedToday = getDismissedBirthdaysToday();
        $birthdaysToday = array_values(array_filter($upcoming, fn($b) =>
            $b['days_until'] === 0 && !in_array($b['person_id'], $dismissedToday, true)
        ));
        $birthdaysSoon  = array_values(array_filter($upcoming, fn($b) => $b['days_until'] > 0));
    } catch (Throwable $e) {}
    try {
        ensureBirthdayGiftTasks();
    } catch (Throwable $e) {}
    try {
        $cas = getCassowary();
        if (!empty($cas['pipe']['api_key'])) {
            $pipeData = ['configured' => true, 'health' => [], 'jurisdictions' => []];
            $uid = $_SESSION['user_id'];
            $cacheFile = __DIR__ . "/config/{$uid}/pipe_cache.json";
            if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 600) {
                $cached = json_decode(file_get_contents($cacheFile), true);
                if ($cached) {
                    $pipeData['health']        = $cached['health']        ?? [];
                    $pipeData['jurisdictions'] = $cached['jurisdictions'] ?? [];
                }
            }
        }
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
  data-second-books-avail="<?= htmlspecialchars(json_encode($secondBooksAvail), ENT_QUOTES) ?>"
  data-second-books-exist="<?= htmlspecialchars(json_encode($secondBooksExist ?? []), ENT_QUOTES) ?>"
  data-second-current-book="<?= (int)$secondCurrentBook ?>"
  data-second-pages-avail="<?= (int)$secondPagesAvail ?>"
  data-third-books-avail="<?= htmlspecialchars(json_encode($thirdBooksAvail), ENT_QUOTES) ?>"
  data-third-books-exist="<?= htmlspecialchars(json_encode($thirdBooksExist ?? []), ENT_QUOTES) ?>"
  data-third-current-book="<?= (int)$thirdCurrentBook ?>"
  data-third-pages-avail="<?= (int)$thirdPagesAvail ?>"
  data-fourth-books-avail="<?= htmlspecialchars(json_encode($fourthBooksAvail), ENT_QUOTES) ?>"
  data-fourth-books-exist="<?= htmlspecialchars(json_encode($fourthBooksExist ?? []), ENT_QUOTES) ?>"
  data-fourth-current-book="<?= (int)$fourthCurrentBook ?>"
  data-fourth-pages-avail="<?= (int)$fourthPagesAvail ?>"
  data-fifth-books-avail="<?= htmlspecialchars(json_encode($fifthBooksAvail), ENT_QUOTES) ?>"
  data-fifth-books-exist="<?= htmlspecialchars(json_encode($fifthBooksExist ?? []), ENT_QUOTES) ?>"
  data-fifth-current-book="<?= (int)$fifthCurrentBook ?>"
  data-fifth-pages-avail="<?= (int)$fifthPagesAvail ?>"
  data-sixth-books-avail="<?= htmlspecialchars(json_encode($sixthBooksAvail), ENT_QUOTES) ?>"
  data-sixth-books-exist="<?= htmlspecialchars(json_encode($sixthBooksExist ?? []), ENT_QUOTES) ?>"
  data-sixth-current-book="<?= (int)$sixthCurrentBook ?>"
  data-sixth-pages-avail="<?= (int)$sixthPagesAvail ?>"
  data-objects-out="<?= $objectsOut ? '1' : '0' ?>"
  data-objects-resolved="<?= ($objectsResolved ?? false) ? '1' : '0' ?>"
  data-cycle-day="<?= $cycleDay ?>"
  data-cycle-len="<?= $cycleLen ?>"
  data-cycle-phases="<?= htmlspecialchars(json_encode($cyclePhases), ENT_QUOTES) ?>"
  data-top3="<?= htmlspecialchars(json_encode($top3Entries), ENT_QUOTES) ?>"
  data-pipe="<?= htmlspecialchars(json_encode($pipeData), ENT_QUOTES) ?>"></canvas>

<?php
$pageCount    = 0;
$pageTarget   = 15;
$totalPages   = 0;
$snoozedCount = 0;
$buckets      = ['routine' => 0, 'inbox' => 0, 'ready' => 0, 'not_here' => 0, 'blocked' => 0, 'snoozed' => 0, 'someday' => 0, 'waiting' => 0, 'project' => 0, 'reference' => 0];
if (isUnlocked()) {
    try {
        $t = getTasks();
        $pageCount  = (int)($t['pages']       ?? 0);
        $totalPages = (int)($t['total_pages'] ?? 0);
        $pageTarget = todayPagesTarget();
        $nowTs = time();
        $today = date('Y-m-d');
        $timeStr = date('H:i');
        // Same physical-location/time-window checks getDoableTasks() applies
        // (config_helper.php) — this loop is a separate bucket-count pass so
        // it has to apply them itself rather than delegating to that
        // function, or a task blocked by location/time silently counts
        // toward "next action" here even though the actual suggestion
        // picker would never offer it.
        $physicalLocation = null;
        try {
            $diaryRow = getDiaryEntry($today);
            $physicalLocation = isset($diaryRow['location']) ? (int)$diaryRow['location']
                : (isset($diaryRow['day_type']) ? (int)$diaryRow['day_type'] : null);
        } catch (Throwable $e) {}
        $completedIds = [];
        foreach ($t['tasks'] ?? [] as $task) {
            if (($task['status'] ?? '') === 'complete') $completedIds[(int)$task['id']] = true;
        }
        $prereqsMet = fn($task) => empty($task['prereq_tasks']) ||
            !array_diff(array_map('intval', (array)$task['prereq_tasks']), array_keys($completedIds));
        $constraintOk = function($task) use ($physicalLocation, $timeStr): bool {
            if (!locationTagsAllow($task['location'] ?? null, $physicalLocation)) return false;
            if (!empty($task['relevant_after'])   && $timeStr < $task['relevant_after'])   return false;
            if (!empty($task['irrelevant_after']) && $timeStr >= $task['irrelevant_after']) return false;
            return true;
        };
        foreach ($t['tasks'] ?? [] as $task) {
            if (($task['status'] ?? '') !== 'active') continue;
            if (!empty($task['parent_id'])) continue;
            $type          = $task['task_type'] ?? '';
            $isSnoozed     = !empty($task['snoozed_until']) && strtotime($task['snoozed_until']) > $nowTs;
            $isFutureSched = !empty($task['scheduled_date']) && $task['scheduled_date'] > $today;
            // reference isn't actionable, but it IS a real bucket now (GTD
            // reference endpoint) — shown so filed items stay reachable from
            // the scene, same as someday/waiting.
            if      ($type === 'reference')                                  { $buckets['reference']++; }
            elseif  ($type === 'inbox')                                      { $buckets['inbox']++; }
            // waiting tasks always carry a snoozed_until (the check-back
            // date) — checked ahead of the generic isSnoozed case so they
            // land in their own segment instead of being swallowed by it.
            elseif  ($type === 'waiting')                                    { $buckets['waiting']++; }
            elseif  ($isSnoozed || $isFutureSched)                          { $buckets['snoozed']++; }
            elseif  ($type === 'next_action' && !$prereqsMet($task))         { $buckets['blocked']++; }
            // Genuinely ready except the user isn't currently somewhere (or
            // some-when) this task allows — distinct from 'blocked' (a real
            // prerequisite task) and 'snoozed' (an explicit defer date):
            // this resolves itself the moment location/time changes, with
            // nothing to do about it right now.
            elseif  ($type === 'next_action' && !$constraintOk($task))       { $buckets['not_here']++; }
            elseif  ($type === 'next_action')                                { $buckets['ready']++; }
            elseif  ($type === 'someday')                                    { $buckets['someday']++; }
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
    'not_here' => ['label' => 'not here',    'color' => '#7a7a7a', 'filter' => 'not_here'],
    'blocked' => ['label' => 'blocked',      'color' => '#a82020', 'filter' => 'blocked'],
    'snoozed' => ['label' => 'snoozed',      'color' => '#1e4d82', 'filter' => 'snoozed'],
    'someday' => ['label' => 'someday',      'color' => '#4a5568', 'filter' => 'someday'],
    'waiting' => ['label' => 'waiting',      'color' => '#553c87', 'filter' => 'waiting'],
    'project' => ['label' => 'projects',     'color' => '#2a2a2a', 'filter' => 'project'],
    'reference' => ['label' => 'reference',  'color' => '#8a7a5a', 'filter' => 'reference'],
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
<?php if ($birthdaysToday || $birthdaysSoon):
    $bdayNames = implode(', ', array_map(fn($b) => $b['name'], $birthdaysToday ?: $birthdaysSoon));
    // Today's-people list is also handed to the client as id+name pairs so
    // js/birthday_today.js can strike a name off this badge (or hide it
    // entirely once empty) the moment it's dismissed, without a page reload.
    $todayPeopleJson = htmlspecialchars(json_encode(array_map(
        fn($b) => ['id' => $b['person_id'], 'name' => $b['name']], $birthdaysToday
    )), ENT_QUOTES);
    $bdayOnclick = $birthdaysToday ? "loadOverlay('api/birthday_today.php')" : "loadOverlay('list_people.php')";
?>
<div id="scene-birthday" class="<?= $birthdaysToday ? 'today' : 'soon' ?>"
     data-today-people='<?= $todayPeopleJson ?>'
     onclick="<?= $bdayOnclick ?>">
  <span class="scene-birthday-icon"><?= $birthdaysToday ? '🎂' : '🎈' ?></span>
  <span class="scene-birthday-names"><?= htmlspecialchars($bdayNames) ?></span>
</div>
<?php endif; ?>
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
<a href="scene_kitchen.php" id="kitchen-mobile-btn" class="scene-mode-btn">Kitchen</a>
<?php if ($pipeData): ?>
<button id="pipe-mobile-btn" class="scene-mode-btn" onclick="loadOverlay('api/pipe_dashboard.php')">PIPE</button>
<?php endif; ?>

<script src="js/scene.js?v=<?= filemtime(__DIR__ . '/js/scene.js') ?>"></script>
