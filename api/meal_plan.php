<?php
/**
 * api/meal_plan.php — session-authenticated meal plan read/write
 *
 * GET  ?from=YYYY-MM-DD&to=YYYY-MM-DD → {ok, days:{date:{mealType:{name,recipe_id}}}, recipes:{id:{name,portion_cost}}, total_cost}
 * GET  ?date=YYYY-MM-DD                → single day, same shape as one entry of `days`
 * POST {action:'plan', date, meal_type, name?, recipe_id?}
 * POST {action:'clear', date, meal_type}
 *
 * Meal plans are stored per-date inside diary.enc (getDiaryEntry/saveDiaryEntry)
 * under the 'meal_plan' key — same storage the calendar day overlay already
 * reads. Mirrors api/agent.php's plan_meal/clear_meal/meal_plan view (bearer
 * token, for Claude) so the browser UI has a session-cookie path to the same
 * data; both end up calling the same getDiaryEntry/saveDiaryEntry/getRecipes.
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

function mp_recipe_lookup(array $days): array {
    $ids = [];
    foreach ($days as $day) {
        foreach ($day as $meal) {
            if (!empty($meal['recipe_id'])) $ids[(int)$meal['recipe_id']] = true;
        }
    }
    if (!$ids) return [];
    $out = [];
    try {
        foreach (getRecipes()['recipes'] as $r) {
            if (isset($ids[(int)$r['id']])) {
                $out[(int)$r['id']] = ['name' => $r['name'], 'portion_cost' => $r['portion_cost'] ?? null];
            }
        }
    } catch (Throwable $e) {}
    return $out;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) json_response(['error' => 'Invalid date'], 400);
            $plan = getDiaryEntry($date)['meal_plan'] ?? [];
            $days = [$date => $plan];
            json_response(['ok' => true, 'days' => $days, 'recipes' => mp_recipe_lookup($days)]);
        }

        $from = $_GET['from'] ?? date('Y-m-d');
        $to   = $_GET['to']   ?? date('Y-m-d', strtotime($from . ' +13 days'));
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $from) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $to)) {
            json_response(['error' => 'Invalid date range'], 400);
        }
        // Cap the range so a malformed request can't force scanning years of diary data
        $spanDays = (strtotime($to) - strtotime($from)) / 86400;
        if ($spanDays < 0 || $spanDays > 31) json_response(['error' => 'Range too large (max 31 days)'], 400);

        $diary = getDiary();
        $days  = [];
        $totalCost = 0.0;
        $cur = $from;
        while ($cur <= $to) {
            $plan = $diary[$cur]['meal_plan'] ?? [];
            $days[$cur] = $plan;
            $cur = date('Y-m-d', strtotime($cur . ' +1 day'));
        }
        $recipes = mp_recipe_lookup($days);
        foreach ($days as $plan) {
            foreach ($plan as $meal) {
                $rid = (int)($meal['recipe_id'] ?? 0);
                if ($rid && isset($recipes[$rid]['portion_cost'])) $totalCost += (float)$recipes[$rid]['portion_cost'];
            }
        }

        json_response(['ok' => true, 'days' => $days, 'recipes' => $recipes, 'total_cost' => round($totalCost, 2)]);
    } catch (Throwable $e) {
        json_response(['error' => $e->getMessage()], 500);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body     = json_decode(file_get_contents('php://input'), true) ?? [];
    $action   = $body['action'] ?? '';
    $date     = $body['date'] ?? '';
    $mealType = $body['meal_type'] ?? '';
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) json_response(['error' => 'Invalid date'], 400);
    if (!in_array($mealType, ['breakfast', 'lunch', 'dinner'], true)) json_response(['error' => 'Invalid meal_type'], 400);

    try {
        if ($action === 'plan') {
            $name     = trim($body['name'] ?? '');
            $recipeId = isset($body['recipe_id']) ? (int)$body['recipe_id'] : null;
            if (!$name && !$recipeId) json_response(['error' => 'name or recipe_id required'], 400);
            if (!$name && $recipeId) {
                foreach (getRecipes()['recipes'] as $r) {
                    if ((int)$r['id'] === $recipeId) { $name = $r['name']; break; }
                }
            }
            $existing = getDiaryEntry($date);
            $plan = $existing['meal_plan'] ?? [];
            $plan[$mealType] = array_filter(['name' => $name, 'recipe_id' => $recipeId], fn($v) => $v !== null);
            saveDiaryEntry($date, ['meal_plan' => $plan]);
            json_response(['ok' => true, 'date' => $date, 'meal_type' => $mealType, 'name' => $name]);
        }

        if ($action === 'clear') {
            $existing = getDiaryEntry($date);
            $plan = $existing['meal_plan'] ?? [];
            unset($plan[$mealType]);
            saveDiaryEntry($date, ['meal_plan' => $plan ?: null]);
            json_response(['ok' => true]);
        }

        json_response(['error' => "Unknown action '$action'"], 400);
    } catch (Throwable $e) {
        json_response(['error' => $e->getMessage()], 500);
    }
}

json_response(['error' => 'Method not allowed'], 405);
