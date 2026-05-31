<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); exit; }

$earned = checkAndAwardBadges();
$defs   = getBadgeDefinitions();
?>
<div id="badges-panel" data-init="initBadges" style="max-width:520px;margin:0 auto;">
  <h2 style="margin:0 0 1.25rem;font-size:1.1rem;letter-spacing:0.02em;">Notice Board</h2>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;">
    <?php foreach ($defs as $id => $badge): ?>
      <?php $earnedAt = $earned[$id] ?? null; ?>
      <div style="display:flex;align-items:flex-start;gap:0.6rem;padding:0.65rem 0.75rem;border-radius:8px;
                  background:<?= $earnedAt ? 'rgba(0,0,0,0.04)' : 'rgba(0,0,0,0.02)' ?>;
                  opacity:<?= $earnedAt ? '1' : '0.4' ?>;">
        <div style="width:26px;height:26px;border-radius:50%;background:<?= htmlspecialchars($badge['color']) ?>;
                    flex-shrink:0;margin-top:1px;<?= !$earnedAt ? 'filter:grayscale(1) brightness(0.7);' : '' ?>">
        </div>
        <div>
          <div style="font-weight:600;font-size:0.88rem;line-height:1.3;"><?= htmlspecialchars($badge['name']) ?></div>
          <div style="font-size:0.76rem;color:#999;margin-top:2px;line-height:1.4;"><?= htmlspecialchars($badge['desc']) ?></div>
          <?php if ($earnedAt): ?>
            <div style="font-size:0.70rem;color:#bbb;margin-top:3px;"><?= date('d M Y', strtotime($earnedAt)) ?></div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <?php if (empty($earned)): ?>
    <p style="color:#aaa;font-size:0.88em;margin-top:1.25rem;text-align:center;">
      Complete tasks to earn your first badge.
    </p>
  <?php endif; ?>
</div>
