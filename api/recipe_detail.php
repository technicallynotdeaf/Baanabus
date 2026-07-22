<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: text/html; charset=utf-8');

if (!isAuthenticated()) { echo '<p class="muted">Not authenticated.</p>'; exit; }
if (!isUnlocked())      { echo '<p class="muted">Vault locked.</p>'; exit; }

$id = (int)($_GET['id'] ?? 0);
if (!$id) { echo '<p class="muted">Missing recipe id.</p>'; exit; }

try { $recipes = getRecipes()['recipes']; } catch (Throwable $e) { $recipes = []; }
$recipe = null;
foreach ($recipes as $r) { if ((int)$r['id'] === $id) { $recipe = $r; break; } }
if (!$recipe) { echo '<p class="muted">Recipe not found.</p>'; exit; }

$esc = fn($s) => htmlspecialchars((string)($s ?? ''), ENT_QUOTES);
$ingredientMatches = $recipe['ingredient_matches'] ?? [];

// Resolve ingredient food names for display (ingredient_matches only stores food_id/weight_g)
$foodNames = [];
if ($database && $ingredientMatches) {
    $ids = array_values(array_unique(array_map(fn($i) => (int)($i['food_id'] ?? 0), $ingredientMatches)));
    $ids = array_filter($ids);
    if ($ids) {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $database->prepare("SELECT food_id, name FROM foods WHERE food_id IN ($placeholders)");
        $stmt->execute($ids);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) $foodNames[(int)$row['food_id']] = $row['name'];
    }
}

$portions = (int)($recipe['default_portions'] ?? 1) ?: 1;
$hasCalc  = isset($recipe['portion_cost']);

$nutrientLabels = [
    'energy_kj' => 'Energy (kJ)', 'protein_g' => 'Protein (g)', 'fat_total_g' => 'Fat (g)',
    'carbohydrate_g' => 'Carbs (g)', 'sugars_g' => 'Sugars (g)', 'fibre_g' => 'Fibre (g)',
    'sodium_mg' => 'Sodium (mg)',
];
?>
<div data-init="initRecipeDetail" id="recipe-detail-root" data-recipe-id="<?= $id ?>"
     data-ingredients='<?= htmlspecialchars(json_encode(array_map(fn($i, $fid = null) => [
        'food_id'  => (int)($i['food_id'] ?? 0),
        'weight_g' => (float)($i['weight_g'] ?? 0),
        'name'     => $foodNames[(int)($i['food_id'] ?? 0)] ?? 'Unknown food',
     ], $ingredientMatches)), ENT_QUOTES) ?>'
     style="position:relative;padding-bottom:1rem;">

  <p style="font-size:0.78em;color:#aaa;margin-bottom:0.5rem;">
    <a href="#" onclick="loadOverlay('list_recipes.php');return false;" style="color:#888;text-decoration:none;">Recipes</a>
    &rsaquo; <?= $esc($recipe['name']) ?>
  </p>

  <div class="card" style="margin-bottom:0.75rem;">
    <label style="display:block;font-size:0.8em;color:#555;margin-bottom:3px;">Name</label>
    <input id="rd-name" type="text" value="<?= $esc($recipe['name']) ?>" style="width:100%;box-sizing:border-box;margin-bottom:0.6rem;">

    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:0.6rem;">
      <div style="flex:1;min-width:100px;">
        <label style="display:block;font-size:0.8em;color:#555;margin-bottom:3px;">Portions</label>
        <input id="rd-portions" type="number" min="1" value="<?= $portions ?>" style="width:100%;box-sizing:border-box;">
      </div>
      <div style="flex:2;min-width:160px;">
        <label style="display:block;font-size:0.8em;color:#555;margin-bottom:3px;">Tags (comma separated)</label>
        <input id="rd-tags" type="text" value="<?= $esc(implode(', ', $recipe['tags'] ?? [])) ?>" style="width:100%;box-sizing:border-box;">
      </div>
    </div>

    <label style="display:block;font-size:0.8em;color:#555;margin-bottom:3px;">Notes</label>
    <textarea id="rd-notes" rows="2" style="width:100%;box-sizing:border-box;margin-bottom:0.4rem;"><?= $esc($recipe['notes']) ?></textarea>

    <button class="action-button" id="rd-save-details" style="font-size:0.85em;">Save details</button>
    <span id="rd-save-status" class="muted" style="font-size:0.82em;margin-left:8px;"></span>
  </div>

  <div class="card" style="margin-bottom:0.75rem;">
    <h3 style="margin-bottom:0.5rem;font-size:1em;">Ingredients</h3>
    <div id="rd-ingredient-list" style="margin-bottom:0.6rem;"></div>

    <div style="display:flex;gap:8px;flex-wrap:wrap;align-items:flex-end;">
      <div style="flex:2;min-width:130px;position:relative;">
        <label style="display:block;font-size:0.78em;color:#777;margin-bottom:3px;">Food</label>
        <input type="text" id="rd-search" placeholder="Start typing…" autocomplete="off" style="width:100%;box-sizing:border-box;">
        <div id="rd-suggestions" style="display:none;position:absolute;left:0;right:0;top:100%;background:#fff;
             border:1px solid #ddd;border-radius:0 0 6px 6px;z-index:50;max-height:200px;overflow-y:auto;box-shadow:0 4px 12px rgba(0,0,0,0.1);"></div>
      </div>
      <div style="flex:1;min-width:100px;">
        <label style="display:block;font-size:0.78em;color:#777;margin-bottom:3px;">Serving</label>
        <select id="rd-serving" style="width:100%;box-sizing:border-box;">
          <option value="">— pick food first —</option>
        </select>
      </div>
      <div style="width:70px;">
        <label style="display:block;font-size:0.78em;color:#777;margin-bottom:3px;">Qty</label>
        <input type="number" id="rd-qty" value="1" min="0.1" step="0.5" style="width:100%;box-sizing:border-box;">
      </div>
      <button id="rd-add-ingredient" class="btn btn-secondary" style="flex-shrink:0;padding:6px 12px;font-size:0.85em;min-height:34px;">Add</button>
    </div>
    <p id="rd-ingredient-status" class="muted" style="font-size:0.8em;min-height:1.1em;margin-top:0.3rem;"></p>

    <details style="margin-top:0.6rem;">
      <summary style="font-size:0.8em;color:#999;cursor:pointer;">Free-text ingredients (reference only — not used for cost/nutrition)</summary>
      <textarea id="rd-ingredients-text" rows="3" style="width:100%;box-sizing:border-box;margin-top:0.4rem;font-size:0.88em;"><?= $esc($recipe['ingredients_text']) ?></textarea>
    </details>
  </div>

  <div class="card" style="margin-bottom:0.75rem;">
    <button class="btn" id="rd-calculate" style="margin-bottom:0.6rem;">Calculate cost &amp; nutrition</button>
    <div id="rd-calc-results" style="<?= $hasCalc ? '' : 'display:none;' ?>">
      <div style="display:flex;gap:1.5rem;margin-bottom:0.5rem;">
        <div>
          <div style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.05em;">Cost / portion</div>
          <div id="rd-portion-cost" style="font-size:1.3em;font-weight:700;color:#27ae60;">$<?= number_format((float)($recipe['portion_cost'] ?? 0), 2) ?></div>
        </div>
        <div>
          <div style="font-size:0.75em;color:#999;text-transform:uppercase;letter-spacing:0.05em;">Batch total</div>
          <div id="rd-batch-cost" style="font-size:1.3em;font-weight:700;">$<?= number_format((float)($recipe['batch_cost'] ?? 0), 2) ?></div>
        </div>
      </div>
      <div id="rd-nutrition-grid" style="display:grid;grid-template-columns:repeat(2,1fr);gap:4px 12px;font-size:0.85em;">
        <?php foreach ($nutrientLabels as $key => $label): $val = $recipe['portion_nutrition'][$key] ?? null; ?>
          <div style="display:flex;justify-content:space-between;color:#666;">
            <span><?= $label ?></span><span data-nkey="<?= $key ?>"><?= $val !== null ? round($val, 1) : '—' ?></span>
          </div>
        <?php endforeach; ?>
      </div>
      <p class="muted" style="font-size:0.75em;margin-top:0.4rem;">Per portion (<?= $portions ?> portions).</p>
    </div>
  </div>

  <button id="rd-delete" style="font-size:0.78em;background:transparent;color:#c0392b;border:1px solid #c0392b;
          padding:4px 12px;border-radius:6px;cursor:pointer;">Delete recipe</button>
</div>
