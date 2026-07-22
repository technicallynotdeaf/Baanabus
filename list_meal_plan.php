<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
header('Content-Type: text/html; charset=utf-8');

if (!isAuthenticated()) { echo '<p class="muted">Not authenticated.</p>'; exit; }
if (!isUnlocked())      { echo '<p class="muted">Vault locked.</p>'; exit; }

$startDate = $_GET['start'] ?? date('Y-m-d');
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $startDate)) $startDate = date('Y-m-d');

$days = [];
for ($i = 0; $i < 14; $i++) {
    $days[] = date('Y-m-d', strtotime($startDate . " +$i days"));
}

try { $diary = getDiary(); } catch (Throwable $e) { $diary = []; }
try { $recipes = getRecipes()['recipes']; } catch (Throwable $e) { $recipes = []; }
usort($recipes, fn($a, $b) => strcasecmp($a['name'] ?? '', $b['name'] ?? ''));

$mealTypes  = ['breakfast' => 'B', 'lunch' => 'L', 'dinner' => 'D'];
$recipeById = [];
foreach ($recipes as $r) $recipeById[(int)$r['id']] = $r;

$totalCost = 0.0;
$plan = [];
foreach ($days as $d) {
    $plan[$d] = $diary[$d]['meal_plan'] ?? [];
    foreach ($plan[$d] as $meal) {
        $rid = (int)($meal['recipe_id'] ?? 0);
        if ($rid && isset($recipeById[$rid]['portion_cost'])) $totalCost += (float)$recipeById[$rid]['portion_cost'];
    }
}

$recipePickList = array_map(fn($r) => ['id' => (int)$r['id'], 'name' => $r['name']], $recipes);
$prevStart = date('Y-m-d', strtotime($startDate . ' -14 days'));
$nextStart = date('Y-m-d', strtotime($startDate . ' +14 days'));
?>
<div data-init="initListMealPlan" id="meal-plan-grid-root"
     data-recipes='<?= htmlspecialchars(json_encode($recipePickList), ENT_QUOTES) ?>'
     style="position:relative;padding-bottom:1rem;">
  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.6rem;flex-wrap:wrap;gap:6px;">
    <h2 style="margin:0;">Meal plan</h2>
    <div style="font-size:0.85em;color:#27ae60;font-weight:600;">
      Est. cost this period: $<?= number_format($totalCost, 2) ?>
    </div>
  </div>
  <div style="display:flex;justify-content:space-between;margin-bottom:0.75rem;">
    <button class="btn btn-secondary" style="font-size:0.8em;padding:5px 12px;min-height:32px;"
            onclick="loadOverlay('list_meal_plan.php?start=<?= $prevStart ?>')">&larr; Previous 2 weeks</button>
    <button class="btn btn-secondary" style="font-size:0.8em;padding:5px 12px;min-height:32px;"
            onclick="loadOverlay('list_meal_plan.php?start=<?= $nextStart ?>')">Next 2 weeks &rarr;</button>
  </div>

  <div id="mpg-rows" style="display:flex;flex-direction:column;gap:2px;">
    <?php foreach ($days as $d):
      $dow    = date('D j M', strtotime($d));
      $isToday = $d === date('Y-m-d');
    ?>
      <div style="display:flex;align-items:center;gap:6px;padding:4px 0;<?= $isToday ? 'background:rgba(200,168,75,0.08);border-radius:4px;' : '' ?>">
        <div style="width:64px;flex-shrink:0;font-size:0.78em;color:<?= $isToday ? '#5a4a1e' : '#999' ?>;font-weight:<?= $isToday ? '600' : '400' ?>;">
          <?= $dow ?>
        </div>
        <?php foreach ($mealTypes as $type => $short):
          $meal = $plan[$d][$type] ?? null;
          $name = $meal['name'] ?? null;
        ?>
          <div class="mpg-cell" data-date="<?= $d ?>" data-meal-type="<?= $type ?>"
               style="flex:1;min-width:0;font-size:0.78em;padding:3px 6px;border-radius:5px;cursor:pointer;
                      background:<?= $name ? '#fdf6e3' : '#f7f7f7' ?>;color:<?= $name ? '#5a4a1e' : '#bbb' ?>;
                      overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?= $short ?>">
            <?= $name ? htmlspecialchars($name) : $short . ' +' ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
  <div id="mpg-picker-host"></div>
</div>
