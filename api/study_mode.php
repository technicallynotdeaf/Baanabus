<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
if (!isAuthenticated() || !isUnlocked()) { echo '<p>Locked.</p>'; exit; }

// Every study set that exists, regardless of whether it's in the ambient
// study/trivia rotation (config['study_active_sets'], see getActiveStudySets()
// in config_helper.php) — intensive cram deliberately targets one set at a
// time on request, not whatever's currently ambient.
$sets      = [];
$shortlist = [];
if ($database) {
    try {
        $stmt = $database->query("
            SELECT sq.set_name,
                   COUNT(*) AS total,
                   SUM(CASE WHEN qs.correct_count >= 2 THEN 1 ELSE 0 END) AS mastered,
                   SUM(CASE WHEN qs.bucket = 'cram'    THEN 1 ELSE 0 END) AS cram_count,
                   SUM(CASE WHEN qs.bucket = 'revise'  THEN 1 ELSE 0 END) AS revise_count
            FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'study'
            GROUP BY sq.set_name
            ORDER BY sq.set_name
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sets[] = [
                'set_name'     => $row['set_name'],
                'total'        => (int)$row['total'],
                'mastered'     => (int)$row['mastered'],
                'cram_count'   => (int)$row['cram_count'],
                'revise_count' => (int)$row['revise_count'],
            ];
        }
        // Totals across all sets
        $totalCram   = array_sum(array_column($sets, 'cram_count'));
        $totalRevise = array_sum(array_column($sets, 'revise_count'));
        if ($totalCram > 0 || $totalRevise > 0) {
            $shortlist = ['cram' => $totalCram, 'revise' => $totalRevise, 'sets' => $sets];
        }
    } catch (Throwable $e) {}
}
?>
<div id="study-mode-root" data-init="initStudyMode" style="padding:1.2rem 1.4rem;max-width:480px;">

  <?php if ($shortlist): ?>
  <div id="study-shortlist-section" style="margin-bottom:1.2rem;padding:0.9rem 1rem;background:rgba(0,0,0,0.04);border-radius:8px;">
    <h3 style="margin:0 0 0.4rem;">Shortlist</h3>
    <p class="muted" style="font-size:0.85em;margin-bottom:0.75rem;">Questions bucketed after 4+ attempts. Work through weak ones until they move up.</p>
    <div style="display:flex;gap:8px;flex-wrap:wrap;">
      <?php if ($shortlist['cram'] > 0): ?>
      <button class="action-button" style="background:#c0392b;" data-shortlist-bucket="cram">
        Intensive cram &mdash; <?= $shortlist['cram'] ?> questions
      </button>
      <?php endif; ?>
      <?php if ($shortlist['revise'] > 0): ?>
      <button class="action-button" style="background:#e67e22;" data-shortlist-bucket="revise">
        Revise &mdash; <?= $shortlist['revise'] ?> questions
      </button>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>

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
