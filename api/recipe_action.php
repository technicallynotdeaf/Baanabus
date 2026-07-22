<?php
/**
 * api/recipe_action.php — session-authenticated recipe CRUD + cost/nutrition calc
 * POST {action:'add', name, ingredients_text?, notes?, default_portions?, tags?}
 * POST {action:'update', recipe_id, name?, ingredients_text?, notes?, default_portions?, tags?}
 * POST {action:'delete', recipe_id}
 * POST {action:'precalculate', recipe_id, ingredients:[{food_id,weight_g},...]?, portions?}
 *      → uses the recipe's stored ingredient_matches if `ingredients` isn't given
 *
 * Mirrors the equivalent actions in api/agent.php (which are bearer-token only,
 * for Claude) so the browser UI has a session-cookie-authenticated path to the
 * same recipe data. Both call computeRecipeTotals() in config_helper.php so
 * nutrition/cost are never computed two different ways.
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

// GET ?list=1 — compact recipe list for picker dropdowns (meal plan editors).
// The full list_recipes.php overlay renders its own list server-side instead
// of calling this; this exists for callers that need a fetchable JSON list.
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (($_GET['list'] ?? '') !== '1') json_response(['error' => 'GET only supports ?list=1'], 400);
    try {
        $data = getRecipes();
        $out  = array_map(fn($r) => [
            'id'           => (int)$r['id'],
            'name'         => $r['name'],
            'tags'         => $r['tags'] ?? [],
            'portion_cost' => $r['portion_cost'] ?? null,
        ], $data['recipes']);
        json_response(['ok' => true, 'recipes' => $out]);
    } catch (Throwable $e) {
        json_response(['error' => $e->getMessage()], 500);
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$action = $body['action'] ?? '';

try {
    if ($action === 'add') {
        $name = trim($body['name'] ?? '');
        if ($name === '') json_response(['error' => 'name required'], 400);
        if (mb_strlen($name) > 150) json_response(['error' => 'name too long'], 400);

        $data = getRecipes();
        $id   = (int)($data['next_id'] ?? 1);
        $data['recipes'][] = [
            'id'                => $id,
            'name'              => $name,
            'ingredients_text'  => trim($body['ingredients_text'] ?? ''),
            'notes'             => trim($body['notes'] ?? ''),
            'default_portions'  => isset($body['default_portions']) ? max(1, (int)$body['default_portions']) : null,
            'tags'              => is_array($body['tags'] ?? null) ? array_values($body['tags']) : [],
            'ingredient_matches'=> [],
            'created_at'        => date('c'),
        ];
        $data['next_id'] = $id + 1;
        saveRecipes($data);
        json_response(['ok' => true, 'recipe_id' => $id]);
    }

    if ($action === 'update') {
        $recipeId = (int)($body['recipe_id'] ?? 0);
        if (!$recipeId) json_response(['error' => 'recipe_id required'], 400);

        $data  = getRecipes();
        $found = false;
        foreach ($data['recipes'] as &$r) {
            if ((int)$r['id'] !== $recipeId) continue;
            $found = true;
            if (isset($body['name']))              $r['name']              = trim($body['name']);
            if (isset($body['ingredients_text']))  $r['ingredients_text']  = trim($body['ingredients_text']);
            if (isset($body['notes']))             $r['notes']             = trim($body['notes']);
            if (isset($body['default_portions']))  $r['default_portions']  = max(1, (int)$body['default_portions']);
            if (isset($body['tags']) && is_array($body['tags'])) $r['tags'] = array_values($body['tags']);
            $r['updated_at'] = date('c');
            break;
        }
        unset($r);
        if (!$found) json_response(['error' => 'Recipe not found'], 404);
        saveRecipes($data);
        json_response(['ok' => true]);
    }

    if ($action === 'delete') {
        $recipeId = (int)($body['recipe_id'] ?? 0);
        if (!$recipeId) json_response(['error' => 'recipe_id required'], 400);
        $data = getRecipes();
        $data['recipes'] = array_values(array_filter($data['recipes'], fn($r) => (int)$r['id'] !== $recipeId));
        saveRecipes($data);
        json_response(['ok' => true]);
    }

    if ($action === 'precalculate') {
        global $database;
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $recipeId = (int)($body['recipe_id'] ?? 0);
        if (!$recipeId) json_response(['error' => 'recipe_id required'], 400);

        $data   = getRecipes();
        $recipe = null;
        foreach ($data['recipes'] as $r) {
            if ((int)$r['id'] === $recipeId) { $recipe = $r; break; }
        }
        if (!$recipe) json_response(['error' => 'Recipe not found'], 404);

        $ingredients = $body['ingredients'] ?? $recipe['ingredient_matches'] ?? [];
        $portions    = (int)($body['portions'] ?? $recipe['default_portions'] ?? 1);
        if ($portions < 1) $portions = 1;

        $result            = computeRecipeTotals($database, $ingredients);
        $batchNutrition    = $result['nutrition'];
        $portionNutrition  = array_map(fn($v) => round($v / $portions, 3), $result['nutrition']);
        $batchCost         = $result['cost'];
        $portionCost       = round($batchCost / $portions, 2);

        foreach ($data['recipes'] as &$r) {
            if ((int)$r['id'] === $recipeId) {
                $r['ingredient_matches'] = $ingredients;
                $r['default_portions']   = $portions;
                $r['batch_nutrition']    = $batchNutrition;
                $r['portion_nutrition']  = $portionNutrition;
                $r['batch_cost']         = $batchCost;
                $r['portion_cost']       = $portionCost;
                break;
            }
        }
        unset($r);
        saveRecipes($data);

        json_response([
            'ok'                => true,
            'recipe_id'         => $recipeId,
            'portions'          => $portions,
            'batch_nutrition'   => $batchNutrition,
            'portion_nutrition' => $portionNutrition,
            'batch_cost'        => $batchCost,
            'portion_cost'      => $portionCost,
        ]);
    }

    json_response(['error' => "Unknown action '$action'"], 400);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
