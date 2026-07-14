<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); exit; }

$entries = getOrGenerateTop3();
$config  = getConfig() ?? [];
$points  = (int)($config['points'] ?? 0);
?>
<div id="top3-panel" data-init="initTop3" style="max-width:520px;margin:0 auto;">
  <h2 style="margin:0 0 0.25rem;font-size:1.1rem;letter-spacing:0.02em;">Today's Top 3</h2>
  <p style="color:#999;font-size:0.8rem;margin:0 0 1.25rem;">
    Fills automatically as you use the app — nothing here to tick off yourself.
  </p>
  <div style="display:flex;flex-direction:column;gap:0.75rem;">
    <?php foreach ($entries as $e): ?>
      <?php
        $done = !empty($e['completed_at']);
        $pct  = $e['target'] > 0 ? min(100, round(100 * $e['progress'] / $e['target'])) : 0;
      ?>
      <div style="padding:0.75rem 0.9rem;border-radius:10px;background:<?= $done ? 'rgba(46,204,113,0.10)' : 'rgba(0,0,0,0.03)' ?>;">
        <div style="display:flex;justify-content:space-between;align-items:baseline;gap:0.5rem;">
          <div style="font-weight:600;font-size:0.92rem;<?= $done ? 'color:#2ecc71;' : '' ?>">
            <?= htmlspecialchars($e['label']) ?><?= $done ? ' ✓' : '' ?>
          </div>
          <div style="font-size:0.78rem;color:#f5a623;white-space:nowrap;">★ <?= (int)$e['points'] ?></div>
        </div>
        <div style="margin-top:0.5rem;height:8px;border-radius:4px;background:rgba(0,0,0,0.08);overflow:hidden;">
          <div style="height:100%;width:<?= $pct ?>%;background:<?= $done ? '#2ecc71' : '#f5a623' ?>;transition:width 0.3s ease;"></div>
        </div>
        <div style="margin-top:0.3rem;font-size:0.72rem;color:#aaa;"><?= (int)$e['progress'] ?> / <?= (int)$e['target'] ?></div>
      </div>
    <?php endforeach; ?>
  </div>
  <p style="text-align:center;margin-top:1.5rem;font-size:0.9rem;color:#888;">
    Lifetime points: <strong style="color:#f5a623;">★ <?= $points ?></strong>
  </p>
</div>
