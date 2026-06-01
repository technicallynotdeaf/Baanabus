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
                $prog = getStoryProgress($sid);
                if ($prog) {
                    $story     = require __DIR__ . '/content/stories/' . $file;
                    $key       = $prog['current_key'] ?? '1_start';
                    $page      = $story['pages'][$key] ?? null;
                    $prevEnded = !empty($page['ending']);
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
  data-story-books-avail="<?= htmlspecialchars(json_encode($storyBooksAvail), ENT_QUOTES) ?>"></canvas>

<?php
$pageCount   = 0;
$pageTarget  = 15;
$totalPages  = 0;
if (isUnlocked()) {
    try {
        $t = getTasks();
        $pageCount  = (int)($t['pages']       ?? 0);
        $totalPages = (int)($t['total_pages'] ?? 0);
        $pageTarget = todayPagesTarget();
    } catch (Throwable $e) {}
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
<button id="reset-btn" class="scene-mode-btn"<?= $isTired ? ' data-tired="1"' : '' ?>>Reset</button>

<script src="js/scene.js"></script>
