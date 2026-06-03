<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); exit; }

$storyFiles = [
    1 => 'chai_meridian.php',
    2 => 'the_platform.php',
    3 => 'below_the_alcyon.php',
    4 => 'green_correspondence.php',
];
$storyId = (int)($_GET['story'] ?? 1);
if (!isset($storyFiles[$storyId])) $storyId = 1;
$story   = require __DIR__ . '/../content/stories/' . $storyFiles[$storyId];
$prog    = getStoryProgress($storyId);
$history = $prog['history'] ?? [];

// History view: ?prev=N shows the Nth historical page (0 = most recent prev, going back)
$prevIdx = isset($_GET['prev']) ? (int)$_GET['prev'] : -1;

if ($prevIdx >= 0 && isset($history[$prevIdx])) {
    $hEntry  = $history[$prevIdx];
    $hPage   = $story['pages'][$hEntry['key'] ?? ''] ?? null;
    $hProse  = $hPage ? base64_decode($hPage['prose']) : '';
    $prevPrev = $prevIdx - 1;
    $nextIdx  = $prevIdx + 1;
    $isLast   = ($nextIdx >= count($history));
    ?>
    <div id="story-content" data-init="initStoryRead" data-story-id="<?= $storyId ?>" style="max-width:520px;margin:0 auto;">
      <p style="font-size:0.8em;color:#999;margin-bottom:0.25rem;letter-spacing:0.05em;"><?= htmlspecialchars(strtoupper($story['title'])) ?> &mdash; history</p>
      <div style="line-height:1.75;margin-bottom:1rem;opacity:0.8;">
        <?php foreach (explode("\n\n", trim($hProse)) as $para): ?>
          <p style="margin:0 0 0.9rem;"><?= nl2br(htmlspecialchars(trim($para))) ?></p>
        <?php endforeach; ?>
      </div>
      <p style="font-size:0.85em;color:#888;font-style:italic;margin-bottom:1rem;">
        You chose: <?= htmlspecialchars($hEntry['text']) ?>
      </p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <?php if ($prevIdx > 0): ?>
          <button class="action-button" style="background:transparent;color:#555;border:1px solid #ccc;font-size:0.85em;padding:6px 12px;"
            onclick="loadOverlay('api/story_read.php?story=<?= $storyId ?>&prev=<?= $prevPrev ?>')">
            &larr; Earlier
          </button>
        <?php endif; ?>
        <?php if (!$isLast): ?>
          <button class="action-button" style="background:transparent;color:#555;border:1px solid #ccc;font-size:0.85em;padding:6px 12px;"
            onclick="loadOverlay('api/story_read.php?story=<?= $storyId ?>&prev=<?= $nextIdx ?>')">
            Later &rarr;
          </button>
        <?php endif; ?>
        <button class="action-button" style="font-size:0.85em;padding:6px 12px;"
          onclick="loadOverlay('api/story_read.php?story=<?= $storyId ?>')">
          Back to now
        </button>
      </div>
    </div>
    <?php
    exit;
}

// Apply any pages banked before a book was chosen, then mark as active
try { consumePendingStoryPages($storyId); } catch (Throwable $e) {}
try { setActiveStoryId($storyId); } catch (Throwable $e) {}

// Reload progress in case pending pages just changed pages_available
$prog = getStoryProgress($storyId);

$pageKey  = $prog['current_key'];
$page     = $story['pages'][$pageKey] ?? null;
if (!$page) { echo '<p>Story page not found.</p>'; exit; }

// Retroactively stamp ended flag if we're on an ending page and it isn't set yet
if (!empty($page['ending']) && empty($prog['ended'])) {
    $prog['ended'] = true;
    try { saveStoryProgress($storyId, $prog); } catch (Throwable $e) {}
}

$prose     = base64_decode($page['prose']);
$canChoose = $prog['pages_available'] > $prog['depth'];
$choices   = $page['choices'] ?? [];
$terminal  = !empty($page['terminal']);
$ending    = !empty($page['ending']);
$firstHistIdx = 0; // oldest history entry index
?>
<div id="story-content" data-init="initStoryRead" data-story-id="<?= $storyId ?>" style="max-width:520px;margin:0 auto;">
  <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.25rem;">
    <p style="font-size:0.8em;color:#999;margin:0;letter-spacing:0.05em;"><?= htmlspecialchars(strtoupper($story['title'])) ?></p>
    <?php if ($history): ?>
      <button onclick="loadOverlay('api/story_read.php?story=<?= $storyId ?>&prev=0')"
              style="background:none;border:none;font-size:0.78em;color:#aaa;cursor:pointer;padding:0;">
        &larr; From the start
      </button>
    <?php endif; ?>
  </div>

  <div style="line-height:1.75;margin-bottom:1.25rem;">
    <?php foreach (explode("\n\n", trim($prose)) as $para): ?>
      <p style="margin:0 0 0.9rem;"><?= nl2br(htmlspecialchars(trim($para))) ?></p>
    <?php endforeach; ?>
  </div>

  <div id="story-choices">
    <?php if ($ending): ?>
      <p style="color:#888;font-size:0.9em;font-style:italic;margin-bottom:1rem;">— The End.</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <?php if ($history): ?>
          <button class="action-button" style="background:transparent;color:#555;border:1px solid #ccc;font-size:0.85em;padding:6px 14px;"
            onclick="loadOverlay('api/story_read.php?story=<?= $storyId ?>&prev=0')">
            From the start
          </button>
        <?php endif; ?>
        <button class="action-button" style="font-size:0.85em;padding:6px 14px;"
          onclick="loadOverlay('api/story_books.php')">
          Back to bookshelf
        </button>
      </div>
    <?php elseif (!$canChoose):
        $pipsNeeded = $prog['depth'] + 1 - $prog['pages_available'];
        $pipsText   = $pipsNeeded === 1 ? 'one more full pip bar' : $pipsNeeded . ' more full pip bars';
    ?>
      <?php if ($terminal): ?>
        <p style="color:#888;font-size:0.9em;font-style:italic;margin-bottom:0.75rem;">
          — To be continued. Fill the pip bar to unlock the next part.
        </p>
      <?php else: ?>
        <div style="background:rgba(0,0,0,0.04);border-radius:8px;padding:0.75rem 1rem;margin-bottom:0.75rem;">
          <p style="margin:0 0 0.3rem;font-weight:500;font-size:0.95em;">The story is waiting.</p>
          <p style="margin:0;color:#666;font-size:0.88em;line-height:1.5;">
            Complete enough tasks to fill the pip bar <?= htmlspecialchars($pipsText) ?> and the next choice will open up.
          </p>
        </div>
      <?php endif; ?>
      <button class="action-button" style="background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
        onclick="document.getElementById('close-overlay').click()">
        Back to tasks
      </button>
    <?php else: ?>
      <?php if (count($choices) === 1): ?>
        <button class="action-button" onclick="window._storyChoose('<?= htmlspecialchars($choices[0]['next']) ?>')">
          <?= htmlspecialchars(base64_decode($choices[0]['text'])) ?>
        </button>
      <?php else: ?>
        <div style="display:flex;flex-direction:column;gap:0.5rem;">
          <?php foreach ($choices as $choice): ?>
            <button class="action-button"
                    style="text-align:left;background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
                    onclick="window._storyChoose('<?= htmlspecialchars($choice['next']) ?>')">
              <?= htmlspecialchars(base64_decode($choice['text'])) ?>
            </button>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>

