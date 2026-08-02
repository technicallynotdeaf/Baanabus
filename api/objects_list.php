<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
if (!isAuthenticated() || !isUnlocked()) { echo '<p>Locked.</p>'; exit; }

$data    = getPhysicalObjects();
$objects = $data['objects'] ?? [];

$roomMap = [];
foreach ($data['rooms'] ?? [] as $r) {
    $roomMap[(int)$r['id']] = $r['label'] ?? $r['name'] ?? '';
}

$out      = array_values(array_filter($objects, fn($o) => ($o['status'] ?? '') === 'out'));
$resolved = array_values(array_filter($objects, fn($o) => ($o['status'] ?? '') === 'resolved'));

usort($out,      fn($a, $b) => strcmp($a['created_at']  ?? '', $b['created_at']  ?? ''));
usort($resolved, fn($a, $b) => strcmp($b['resolved_at'] ?? '', $a['resolved_at'] ?? ''));
?>
<div style="padding:1.2rem 1.4rem;max-width:480px;">
  <h2 style="margin:0 0 1.1rem;font-size:1.15rem;">Things</h2>

  <?php if ($out): ?>
  <p style="font-size:0.75em;text-transform:uppercase;letter-spacing:0.07em;color:#a08060;margin:0 0 0.45rem;">
    Out &amp; waiting &mdash; <?= count($out) ?>
  </p>
  <div style="margin-bottom:1.4rem;">
    <?php foreach ($out as $o): ?>
    <div style="display:flex;align-items:baseline;gap:8px;padding:0.42rem 0;border-bottom:1px solid #f0ece2;">
      <span style="flex:1;font-size:0.95em;"><?= htmlspecialchars($o['label']) ?></span>
      <?php if (!empty($o['location'])): ?>
      <span style="font-size:0.80em;color:#bbb;white-space:nowrap;"><?= htmlspecialchars($o['location']) ?></span>
      <?php endif; ?>
      <?php $room = $roomMap[(int)($o['room_id'] ?? 0)] ?? ''; if ($room): ?>
      <span style="font-size:0.72em;background:#f4ede0;color:#a07848;padding:1px 6px;border-radius:10px;white-space:nowrap;"><?= htmlspecialchars($room) ?></span>
      <?php endif; ?>
      <?php if (!empty($o['task_id'])): ?>
      <span style="font-size:0.72em;color:#a08060;white-space:nowrap;" title="A task already tracks this">&rarr; task</span>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php if ($resolved): ?>
  <p style="font-size:0.75em;text-transform:uppercase;letter-spacing:0.07em;color:#999;margin:0 0 0.45rem;">
    Put away &mdash; <?= count($resolved) ?>
  </p>
  <div>
    <?php foreach ($resolved as $o): ?>
    <div style="display:flex;align-items:baseline;gap:8px;padding:0.42rem 0;border-bottom:1px solid #f4f1ec;opacity:0.72;">
      <span style="flex:1;font-size:0.92em;"><?= htmlspecialchars($o['label']) ?></span>
      <?php if (!empty($o['location'])): ?>
      <span style="font-size:0.78em;color:#ccc;white-space:nowrap;"><?= htmlspecialchars($o['location']) ?></span>
      <?php endif; ?>
      <?php if (!empty($o['resolved_at'])): ?>
      <span style="font-size:0.72em;color:#ccc;white-space:nowrap;"><?= htmlspecialchars(substr($o['resolved_at'], 0, 10)) ?></span>
      <?php endif; ?>
      <?php if (!empty($o['task_id'])): ?>
      <span style="font-size:0.72em;color:#8aaa60;" title="Linked to a task">&#10003; task</span>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php if (!$out): ?>
  <p style="color:#555;font-size:0.95em;line-height:1.5;margin-top:0.25rem;"><?= $resolved ? "All clear — anything new lying around?" : "Can you see things lying around that you need to do something with?" ?></p>
  <button class="action-button" style="margin-top:0.75rem;"
          onclick="document.getElementById('close-overlay').click(); loadSpeechBubble('lets-go.php?force=room_scan')">Yes, I can</button>
  <?php endif; ?>
</div>
