<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); exit; }

$books = [
    1 => ['title' => 'The Chai Meridian',    'color' => '#C8813A', 'file' => 'chai_meridian.php'],
    2 => ['title' => 'The Platform That Isn\'t', 'color' => '#2A7FA8', 'file' => 'the_platform.php'],
    3 => ['title' => 'Below the Alcyon',     'color' => '#6B5A8A', 'file' => 'below_the_alcyon.php'],
    4 => ['title' => 'Book Four',            'color' => '#3A6B4A', 'file' => null],
    5 => ['title' => 'Book Five',            'color' => '#7A3A3A', 'file' => null],
    6 => ['title' => 'Book Six',             'color' => '#6B7A3A', 'file' => null],
];

$config = getConfig() ?? [];
?>
<div data-init="initStoryBooks" style="max-width:520px;margin:0 auto;">
  <h2 style="margin:0 0 1.25rem;font-size:1.1rem;letter-spacing:0.02em;">Books</h2>
  <div style="display:flex;flex-direction:column;gap:0.6rem;">
    <?php foreach ($books as $id => $book): ?>
      <?php
        $available = $book['file'] && file_exists(__DIR__ . '/../content/stories/' . $book['file']);
        $prog = $available ? (getStoryProgress($id)) : null;
        $depth = $prog ? (int)($prog['depth'] ?? 0) : 0;
        $started = $depth > 0 || ($prog && ($prog['pages_available'] ?? 1) > 1);
      ?>
      <div style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 0.75rem;border-radius:8px;
                  background:rgba(0,0,0,0.03);opacity:<?= $available ? '1' : '0.35' ?>;">
        <div style="width:10px;height:44px;border-radius:3px;background:<?= htmlspecialchars($book['color']) ?>;
                    flex-shrink:0;<?= !$available ? 'filter:grayscale(1);' : '' ?>"></div>
        <div style="flex:1;min-width:0;">
          <div style="font-weight:600;font-size:0.9rem;"><?= htmlspecialchars($book['title']) ?></div>
          <div style="font-size:0.76rem;color:#aaa;margin-top:2px;">
            <?php if (!$available): ?>
              Not yet written
            <?php elseif ($started): ?>
              <?= $depth ?> choice<?= $depth === 1 ? '' : 's' ?> in
            <?php else: ?>
              Not started
            <?php endif; ?>
          </div>
        </div>
        <?php if ($available): ?>
          <button class="action-button" style="padding:6px 14px;font-size:0.85rem;flex-shrink:0;"
            onclick="loadOverlay('api/story_read.php?story=<?= $id ?>')">
            <?= $started ? 'Continue' : 'Begin' ?>
          </button>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
