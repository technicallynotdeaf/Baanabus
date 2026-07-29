<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); exit; }

$family = $_GET['family'] ?? 'quilt';
if (!in_array($family, ['quilt', 'auntie', 'wayfarer'], true)) $family = 'quilt';

if ($family === 'quilt') {
    $letter      = 'q';
    $filePrefix  = 'quilt_';
    $seriesTitle = "The Grandmother's Quilt";
    $books = [
        1  => ['title' => 'The Letter in the Attic',    'color' => '#5A7A4A'],
        2  => ['title' => 'The Chaiwalla\'s Corner',     'color' => '#C8813A'],
        3  => ['title' => 'The Hollow Oak',              'color' => '#2D5A2D'],
        4  => ['title' => 'The Ferryman Knows',          'color' => '#4A7AA0'],
        5  => ['title' => 'The Mountain Shrine',         'color' => '#5A6A80'],
        6  => ['title' => 'The Tide Caves',              'color' => '#2A8080'],
        7  => ['title' => 'The Crystal Chambers',        'color' => '#7A5A9A'],
        8  => ['title' => 'The Grumpy Count',            'color' => '#8A3A5A'],
        9  => ['title' => 'The Harbour Dispute',         'color' => '#2A6AB0'],
        10 => ['title' => 'Fred\'s Canal Boat',          'color' => '#C05A1A'],
        11 => ['title' => 'The Hill Farm Runes',         'color' => '#7A4A8A'],
        12 => ['title' => 'The Midsummer Fair',          'color' => '#B89020'],
        13 => ['title' => 'The Sunken Rooms',            'color' => '#5A7A3A'],
        14 => ['title' => 'The Oasis Chaiwalla',         'color' => '#C8803A'],
        15 => ['title' => 'The Treehouse Village',       'color' => '#2A7040'],
        16 => ['title' => 'The Underground River',       'color' => '#2A8070'],
        17 => ['title' => 'Lars and the Boat Shed',      'color' => '#3A5A8A'],
        18 => ['title' => 'The Monastery Library',       'color' => '#8A2A2A'],
        19 => ['title' => 'The Deep Passage',            'color' => '#3A7A6A'],
        20 => ['title' => 'The Mountain of Her Youth',   'color' => '#5A5A7A'],
        21 => ['title' => 'The Valley of Stones',        'color' => '#6A5A70'],
        22 => ['title' => 'The Storm Crossing',          'color' => '#3A4A6A'],
        23 => ['title' => 'Grandmother\'s Letter',       'color' => '#8A7A3A'],
        24 => ['title' => 'The Red Door',                'color' => '#9A2A2A'],
    ];
} elseif ($family === 'auntie') {
    $letter      = 'a';
    $filePrefix  = 'auntie_';
    $seriesTitle = "Auntie's Mosaic";
    // Only books that exist get a real title/colour below (from the story
    // file itself, once it's written) — unwritten slots stay anonymous
    // ("Book N") rather than guessing ahead at titles that aren't set yet.
    $books = [];
    for ($n = 1; $n <= 24; $n++) {
        $books[$n] = ['title' => "Book $n", 'color' => '#8a8a8a'];
    }
} else {
    $letter      = 'w';
    $filePrefix  = 'wayfarer_';
    $seriesTitle = "The Wayfarer's Instrument";
    // Same "pull from the file once it exists" convention as auntie above.
    $books = [];
    for ($n = 1; $n <= 24; $n++) {
        $books[$n] = ['title' => "Book $n", 'color' => '#8a8a8a'];
    }
}

$config      = getConfig() ?? [];
$activeStory = (string)($config['active_story_id'] ?? '');

$bookEnded = [];
foreach ($books as $id => $book) {
    $path = __DIR__ . '/../content/stories/' . sprintf('%s%02d.php', $filePrefix, $id);
    if (!file_exists($path)) { $bookEnded[$id] = false; continue; }
    $prog = getStoryProgress($letter . $id);
    $bookEnded[$id] = !empty($prog['ended']);
    // Auntie and Wayfarer have no curated picker palette (unlike quilt's
    // hand-picked colours above) — pull title/colour from the file itself
    // once it exists, so not-yet-written slots are the only ones left
    // anonymous. Quilt keeps its own hardcoded values untouched.
    if ($family === 'auntie' || $family === 'wayfarer') {
        $storyFile = require $path;
        if (!empty($storyFile['title'])) $books[$id]['title'] = $storyFile['title'];
        if (!empty($storyFile['color'])) $books[$id]['color'] = $storyFile['color'];
    }
}
?>
<div data-init="initStoryBooks" style="max-width:520px;margin:0 auto;">
  <h2 style="margin:0 0 0.25rem;font-size:1.1rem;letter-spacing:0.02em;"><?= htmlspecialchars($seriesTitle) ?></h2>
  <p style="margin:0 0 1.25rem;font-size:0.8rem;color:#aaa;">24 books &mdash; earn completions to unlock each one</p>
  <div style="display:grid;grid-template-columns:repeat(6,1fr);gap:6px;">
    <?php foreach ($books as $id => $book): ?>
      <?php
        $fileExists  = file_exists(__DIR__ . '/../content/stories/' . sprintf('%s%02d.php', $filePrefix, $id));
        $prevDone    = ($id === 1) || ($bookEnded[$id - 1] ?? false);
        $unlocked    = $fileExists && $prevDone;
        $prog        = $fileExists ? getStoryProgress($letter . $id) : null;
        $depth       = $prog ? (int)($prog['depth'] ?? 0) : 0;
        $pagesAvail  = $prog ? (int)($prog['pages_available'] ?? 1) : 1;
        $isEnded     = $bookEnded[$id] ?? false;
        $isActive    = ($activeStory === $letter . $id);
        $readyChoice = $unlocked && !$isEnded && ($pagesAvail > $depth);
        $bgColor     = $unlocked ? $book['color'] : '#c8c0b8';
        $sid         = $letter . $id;
        $onclick     = $unlocked
            ? ($isEnded ? "window._storyReset('$sid')" : "window._openStory('$sid')")
            : '';
      ?>
      <div onclick="<?= $onclick ?>"
           title="<?= htmlspecialchars($book['title']) ?><?= !$unlocked ? ' — locked' : '' ?>"
           style="position:relative;aspect-ratio:2/3;background:<?= $bgColor ?>;border-radius:3px;
                  cursor:<?= $unlocked ? 'pointer' : 'default' ?>;overflow:hidden;
                  <?= $isActive ? 'box-shadow:0 0 0 2px #fff,0 0 0 3.5px rgba(0,0,0,0.5);' : '' ?>
                  <?= !$unlocked ? 'filter:saturate(0) brightness(0.88);' : '' ?>">
        <div style="position:absolute;inset:0;display:flex;flex-direction:column;
                    align-items:center;justify-content:center;padding:4px 2px;">
          <div style="font-weight:700;font-size:1rem;color:rgba(255,255,255,<?= $unlocked ? '0.9' : '0.5' ?>);
                      line-height:1;"><?= $id ?></div>
          <div style="font-size:0.42rem;color:rgba(255,255,255,<?= $unlocked ? '0.75' : '0.4' ?>);
                      text-align:center;line-height:1.25;margin-top:3px;
                      word-break:break-word;hyphens:auto;">
            <?= htmlspecialchars($book['title']) ?>
          </div>
        </div>
        <?php if ($readyChoice): ?>
          <div style="position:absolute;top:3px;right:3px;width:6px;height:6px;
                      border-radius:50%;background:#7ac47a;box-shadow:0 0 3px rgba(0,0,0,0.3);">
          </div>
        <?php elseif ($isEnded): ?>
          <div style="position:absolute;top:2px;right:3px;font-size:0.6rem;
                      color:rgba(255,255,255,0.7);">&#10003;</div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
  <p style="margin:1rem 0 0;font-size:0.75rem;color:#bbb;">
    Green dot = a choice is ready to make &middot; Tick = finished
  </p>
</div>
