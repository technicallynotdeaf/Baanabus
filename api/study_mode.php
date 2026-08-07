<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
if (!isAuthenticated() || !isUnlocked()) { echo '<p>Locked.</p>'; exit; }

// Every study set that exists, regardless of whether it's in the ambient
// study/trivia rotation (config['study_active_sets'], see getActiveStudySets()
// in config_helper.php) — intensive cram deliberately targets one set at a
// time on request, not whatever's currently ambient.
$sets = [];
if ($database) {
    try {
        $stmt = $database->query("
            SELECT sq.set_name,
                   COUNT(*) AS total,
                   SUM(CASE WHEN qs.correct_count >= 2 THEN 1 ELSE 0 END) AS mastered
            FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'study'
            GROUP BY sq.set_name
            ORDER BY sq.set_name
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sets[] = [
                'set_name' => $row['set_name'],
                'total'    => (int)$row['total'],
                'mastered' => (int)$row['mastered'],
            ];
        }
    } catch (Throwable $e) {}
}
?>
<div id="study-mode-root" data-init="initStudyMode" style="padding:1.2rem 1.4rem;max-width:480px;">
  <h2 style="margin-bottom:0.3rem;">Intensive cram</h2>
  <p class="muted" style="margin-bottom:1rem;font-size:0.88em;">4 questions, then a short break — on repeat, until the set's cleared.</p>

  <?php if (!$sets): ?>
  <p style="color:#555;font-size:0.95em;line-height:1.5;">No study sets yet. Add some in Settings &rarr; Trivia &rarr; Import study questions.</p>
  <?php else: ?>
  <div id="study-set-picker" style="display:flex;flex-direction:column;gap:8px;">
    <?php foreach ($sets as $s): ?>
    <button class="action-button" style="width:100%;text-align:left;" data-cram-set="<?= htmlspecialchars($s['set_name']) ?>">
      <?= htmlspecialchars($s['set_name']) ?>
      <span style="float:right;font-size:0.85em;color:#999;"><?= $s['mastered'] ?>/<?= $s['total'] ?> mastered</span>
    </button>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <div id="study-cram-body" style="margin-top:1rem;"></div>
</div>
