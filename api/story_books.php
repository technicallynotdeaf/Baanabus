<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); exit; }

$books = [
    1 => ['title' => 'The Chai Meridian',    'color' => '#C8813A', 'file' => 'chai_meridian.php'],
    2 => ['title' => 'The Platform That Isn\'t', 'color' => '#2A7FA8', 'file' => 'the_platform.php'],
    3 => ['title' => 'Below the Alcyon',     'color' => '#6B5A8A', 'file' => 'below_the_alcyon.php'],
    4 => ['title' => 'The Green Correspondence', 'color' => '#3A6B4A', 'file' => 'green_correspondence.php'],
    5 => ['title' => 'Book Five',            'color' => '#7A3A3A', 'file' => null],
    6 => ['title' => 'Book Six',             'color' => '#6B7A3A', 'file' => null],
];

$config      = getConfig() ?? [];
$activeStory = (int)($config['active_story_id'] ?? 0);

// Pre-compute ended state for each book so we can gate sequential unlocks
$bookEnded = [];
foreach ($books as $id => $book) {
    if (!$book['file']) { $bookEnded[$id] = false; continue; }
    $path = __DIR__ . '/../content/stories/' . $book['file'];
    if (!file_exists($path)) { $bookEnded[$id] = false; continue; }
    $prog = getStoryProgress($id);
    if (!$prog) { $bookEnded[$id] = false; continue; }
    $bookEnded[$id] = !empty($prog['ended']);
}
?>
<div data-init="initStoryBooks" style="max-width:520px;margin:0 auto;">
  <h2 style="margin:0 0 1.25rem;font-size:1.1rem;letter-spacing:0.02em;">Books</h2>
  <div style="display:flex;flex-direction:column;gap:0.6rem;">
    <?php foreach ($books as $id => $book): ?>
      <?php
        $fileExists = $book['file'] && file_exists(__DIR__ . '/../content/stories/' . $book['file']);
        $prevId     = $id - 1;
        $prevDone   = ($id === 1) || ($bookEnded[$prevId] ?? false);
        $available  = $fileExists && $prevDone;
        $prog           = $fileExists ? getStoryProgress($id) : null;
        $depth          = $prog ? (int)($prog['depth'] ?? 0) : 0;
        $pagesAvailable = $prog ? (int)($prog['pages_available'] ?? 1) : 1;
        $currentKey     = $prog ? ($prog['current_key'] ?? '1_start') : '1_start';
        $started        = $depth > 0 || $pagesAvailable > 1;
        $isEnded        = $bookEnded[$id] ?? false;
        $isActive       = ($activeStory === $id);
        $readyChoices   = $available && !$isEnded ? max(0, $pagesAvailable - $depth) : 0;
      ?>
      <div style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 0.75rem;border-radius:8px;
                  background:<?= $isActive ? 'rgba(0,0,0,0.06)' : 'rgba(0,0,0,0.03)' ?>;
                  opacity:<?= $available ? '1' : '0.35' ?>;
                  <?= $isActive ? 'outline:1.5px solid rgba(0,0,0,0.12);' : '' ?>">
        <div style="width:10px;height:44px;border-radius:3px;background:<?= htmlspecialchars($book['color']) ?>;
                    flex-shrink:0;<?= !$available ? 'filter:grayscale(1);' : '' ?>"></div>
        <div style="flex:1;min-width:0;">
          <div style="font-weight:600;font-size:0.9rem;"><?= htmlspecialchars($book['title']) ?></div>
          <div style="font-size:0.76rem;color:#aaa;margin-top:2px;">
            <?php if (!$fileExists): ?>
              Not yet written
            <?php elseif (!$prevDone): ?>
              Finish <?= htmlspecialchars($books[$prevId]['title']) ?> to unlock
            <?php elseif ($isEnded): ?>
              Finished &middot; <?= $depth ?> choice<?= $depth === 1 ? '' : 's' ?>
            <?php elseif ($started): ?>
              <?= $depth ?> choice<?= $depth === 1 ? '' : 's' ?> in
              <?php if ($readyChoices > 0): ?>
                &middot; <span style="color:#7a9e7e;font-weight:600;"><?= $readyChoices ?> ready</span>
              <?php elseif ($isActive): ?>
                &middot; <span style="color:#7a9e7e;">active</span>
              <?php endif; ?>
            <?php else: ?>
              Not started<?php if ($readyChoices > 0): ?> &middot; <span style="color:#7a9e7e;font-weight:600;"><?= $readyChoices ?> ready</span><?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
        <?php if ($available): ?>
          <?php if ($isEnded): ?>
            <button class="action-button" style="padding:6px 14px;font-size:0.85rem;flex-shrink:0;"
              onclick="window._storyReset(<?= $id ?>)">Read again</button>
          <?php else: ?>
            <button class="action-button" style="padding:6px 14px;font-size:0.85rem;flex-shrink:0;"
              onclick="window._openStory(<?= $id ?>)">
              <?= $started ? 'Continue' : 'Begin' ?>
            </button>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
