<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
if (!isAuthenticated() || !isUnlocked()) { echo '<p>Locked.</p>'; exit; }

$dismissed = [];
$people    = [];
try {
    $dismissed = getDismissedBirthdaysToday();
    foreach (getUpcomingBirthdays() as $b) {
        if ($b['days_until'] === 0) $people[] = $b;
    }
} catch (Throwable $e) {}
?>
<div style="padding:1.2rem 1.4rem;max-width:480px;">
  <h2 style="margin-bottom:0.9rem;">Today's birthdays</h2>

  <?php if (!$people): ?>
  <p class="muted">No birthdays today.</p>
  <?php else: ?>
  <div style="display:flex;flex-direction:column;gap:8px;">
    <?php foreach ($people as $p):
        $isDismissed = in_array((int)$p['person_id'], $dismissed, true);
    ?>
    <div data-person-row style="display:flex;align-items:center;justify-content:space-between;gap:10px;padding:0.6rem 0.75rem;border:1px solid #eee;border-radius:8px;">
      <div>
        <div style="font-weight:600;"><?= htmlspecialchars($p['name']) ?></div>
        <div style="font-size:0.8em;color:#999;">Birthday today &#127874;</div>
      </div>
      <?php if ($isDismissed): ?>
      <span class="bday-status" style="font-size:0.82em;color:#7a9e7e;white-space:nowrap;">&#10003; Handled</span>
      <?php else: ?>
      <button class="action-button bday-status" style="padding:0.3rem 0.7rem;font-size:0.85em;white-space:nowrap;"
              onclick="window._dismissBirthday(<?= (int)$p['person_id'] ?>, this)">Mark handled</button>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
  <p class="muted" style="margin-top:0.9rem;font-size:0.82em;">Marking handled stops the cue for today — it'll come back next year.</p>
  <?php endif; ?>
</div>
