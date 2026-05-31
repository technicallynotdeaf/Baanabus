<?php
$paperCount    = 0;
$storyStarted  = false;
if (isUnlocked()) {
    try {
        $paperCount   = count(getInboxTasks());
        $storyStarted = true;
    } catch (Throwable $e) {}
}
?>
<canvas id="sceneCanvas" data-papers="<?= (int)$paperCount ?>" data-story-started="<?= $storyStarted ? '1' : '0' ?>"></canvas>

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
$fillPct = $pageTarget > 0 ? min(100, round($pageCount / $pageTarget * 100)) : 0;
?>
<div id="scene-progress" class="scene-progress" data-target="<?= $pageTarget ?>">
  <div id="scene-progress-fill" class="scene-progress-fill" style="width:<?= $fillPct ?>%"></div>
</div>
<div id="scene-total-pips">★ <?= $totalPages ?></div>
<div id="scene-clock"></div>

<script src="js/scene.js"></script>
