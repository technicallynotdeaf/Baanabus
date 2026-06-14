<?php
// Renders the nav cycle dial only when period tracking is enabled and the vault
// is unlocked. Also loads cycle_dial.js here (not in <head>) so it is only
// fetched when tracking is active.
if (!function_exists('isUnlocked') || !isUnlocked()) return;

$cyclePhase  = null;
$cyclePhases = [];
try {
    $cyclePhase = getCyclePhase();
    if ($cyclePhase) $cyclePhases = getCyclePhases($cyclePhase['cycle_length']);
} catch (Throwable $e) {}
if (!$cyclePhase || !$cyclePhases) return;
?>
<script src="js/cycle_dial.js?v=<?= filemtime(__DIR__ . '/../js/cycle_dial.js') ?>"></script>
<canvas id="cycle-dial-nav"
        style="width:72px;height:72px;"
        data-cycle-dial
        data-day="<?= $cyclePhase['day'] ?>"
        data-cycle="<?= $cyclePhase['cycle_length'] ?>"
        data-phases="<?= htmlspecialchars(json_encode($cyclePhases), ENT_QUOTES) ?>"
        title="<?= htmlspecialchars($cyclePhase['label']) ?> — day <?= $cyclePhase['day'] ?> of <?= $cyclePhase['cycle_length'] ?>"></canvas>
