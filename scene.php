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
<button id="just-games-btn" class="just-games-btn" title="Just games — no tasks">🎮</button>
<button id="tired-btn" class="just-games-btn" title="Tired mode — easy tasks only"<?= $isTired ? ' data-tired="1"' : '' ?>>😴</button>

<script src="js/scene.js"></script>
