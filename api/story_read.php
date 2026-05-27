<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); exit; }

$storyId = 1;
$story   = require __DIR__ . '/../content/stories/chai_meridian.php';
$prog    = getStoryProgress($storyId);

$pageKey  = $prog['current_key'];
$page     = $story['pages'][$pageKey] ?? null;
if (!$page) { echo '<p>Story page not found.</p>'; exit; }

$canChoose = $prog['pages_available'] > $prog['depth'];
$choices   = $page['choices'] ?? [];
$terminal  = !empty($page['terminal']);
?>
<div id="story-content" style="max-width:520px;margin:0 auto;">
  <p style="font-size:0.8em;color:#999;margin-bottom:0.25rem;letter-spacing:0.05em;">
    THE CHAI MERIDIAN
  </p>

  <div style="line-height:1.75;margin-bottom:1.25rem;">
    <?php foreach (explode("\n\n", trim($page['prose'])) as $para): ?>
      <p style="margin:0 0 0.9rem;"><?= nl2br(htmlspecialchars(trim($para))) ?></p>
    <?php endforeach; ?>
  </div>

  <div id="story-choices">
    <?php if ($terminal): ?>
      <p style="color:#888;font-size:0.9em;font-style:italic;">
        — To be continued. Earn more tasks to unlock the next chapter.
      </p>
    <?php elseif (!$canChoose): ?>
      <?php $needed = $prog['depth'] + 1 - $prog['pages_available']; ?>
      <p style="color:#888;font-size:0.9em;">
        Complete <?= $needed === 1 ? 'one more set of tasks' : $needed . ' more sets of tasks' ?> to read on.
      </p>
    <?php else: ?>
      <?php if (count($choices) === 1): ?>
        <button class="action-button" onclick="window._storyChoose('<?= htmlspecialchars($choices[0]['next']) ?>')">
          <?= htmlspecialchars($choices[0]['text']) ?>
        </button>
      <?php else: ?>
        <div style="display:flex;flex-direction:column;gap:0.5rem;">
          <?php foreach ($choices as $choice): ?>
            <button class="action-button"
                    style="text-align:left;background:transparent;color:hsl(210,100%,30%);border:1.5px solid hsl(210,100%,30%);"
                    onclick="window._storyChoose('<?= htmlspecialchars($choice['next']) ?>')">
              <?= htmlspecialchars($choice['text']) ?>
            </button>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>

<script>
window._storyChoose = function(choiceKey) {
    document.querySelectorAll('#story-choices button').forEach(b => b.disabled = true);
    fetch('api/story_choose.php', {
        method:  'POST',
        headers: {'Content-Type': 'application/json'},
        body:    JSON.stringify({story_id: 1, choice_key: choiceKey}),
    })
    .then(r => r.json())
    .then(d => { if (d.ok) loadOverlay('api/story_read.php'); })
    .catch(e => console.error('Story choose error:', e));
};
</script>
