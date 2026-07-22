<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
header('Content-Type: text/html; charset=utf-8');

if (!isAuthenticated()) { echo '<p class="muted">Not authenticated.</p>'; exit; }
if (!isUnlocked())      { echo '<p class="muted">Vault locked.</p>'; exit; }

try { $recipes = getRecipes()['recipes']; } catch (Throwable $e) { $recipes = []; }
usort($recipes, fn($a, $b) => strcasecmp($a['name'] ?? '', $b['name'] ?? ''));
?>
<div data-init="initListRecipes" id="recipes-root" style="position:relative;padding-bottom:1rem;">
  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;">
    <h2 style="margin:0;">Recipes <span class="muted" style="font-size:0.7em;font-weight:400;"><?= count($recipes) ?></span></h2>
    <button class="btn" id="rc-new-btn" style="padding:8px 14px;font-size:0.88em;min-height:36px;">+ New recipe</button>
  </div>
  <p id="rc-new-status" class="muted" style="font-size:0.85em;min-height:1.2em;margin-bottom:0.5rem;"></p>

  <?php if (empty($recipes)): ?>
    <p class="muted" style="font-size:0.9em;">No recipes yet — add one to start tracking cost and nutrition per meal.</p>
  <?php else: ?>
    <div id="rc-cards" style="display:flex;flex-direction:column;gap:8px;">
      <?php foreach ($recipes as $r):
        $hasCost = isset($r['portion_cost']);
        $tags    = $r['tags'] ?? [];
      ?>
        <div class="card rc-card" data-id="<?= (int)$r['id'] ?>" style="cursor:pointer;padding:0.7rem 0.9rem;">
          <div style="display:flex;justify-content:space-between;align-items:baseline;gap:8px;">
            <div style="font-weight:600;"><?= htmlspecialchars($r['name']) ?></div>
            <?php if ($hasCost): ?>
              <div style="font-size:0.82em;color:#27ae60;white-space:nowrap;">$<?= number_format((float)$r['portion_cost'], 2) ?> / portion</div>
            <?php else: ?>
              <div style="font-size:0.78em;color:#bbb;white-space:nowrap;">not calculated</div>
            <?php endif; ?>
          </div>
          <?php if (!empty($tags)): ?>
            <div style="margin-top:4px;display:flex;gap:5px;flex-wrap:wrap;">
              <?php foreach ($tags as $t): ?>
                <span style="font-size:0.72em;color:#888;background:#f2f2f2;border-radius:10px;padding:1px 8px;"><?= htmlspecialchars($t) ?></span>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
