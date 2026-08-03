<?php
/**
 * api/food_pack_action.php — session-authenticated food_packs write path
 * POST {action:'save_pack', food_id, store, pack_size_g, cost_per_pack, last_seen_date?}
 *
 * Mirrors api/agent.php's add_food_pack action (bearer-token only, for Claude)
 * so the browser UI — specifically the recipe detail view's per-ingredient
 * "add cost" form — has a session-cookie-authenticated path to the same
 * table. Same upsert (ON CONFLICT food_id/store/pack_size_g), so the two
 * paths can never compute it differently. New file rather than folding into
 * recipe_action.php: this is food reference data, not recipe data, matching
 * the codebase's one-file-per-domain convention (recipe_action.php,
 * task_action.php, person_action.php, ...).
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

global $database;
if (!$database) json_response(['error' => 'Database unavailable'], 503);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$action = $body['action'] ?? '';

try {
    if ($action === 'save_pack') {
        $foodId = (int)($body['food_id'] ?? 0);
        $store  = trim($body['store'] ?? '');
        $sizeG  = isset($body['pack_size_g']) ? (float)$body['pack_size_g'] : 0.0;
        $cost   = isset($body['cost_per_pack']) ? (float)$body['cost_per_pack'] : null;
        if (!$foodId || !$store || $sizeG <= 0 || $cost === null) {
            json_response(['error' => 'food_id, store, pack_size_g, and cost_per_pack are required'], 400);
        }

        $existsStmt = $database->prepare("SELECT COUNT(*) FROM foods WHERE food_id = ?");
        $existsStmt->execute([$foodId]);
        if (!(int)$existsStmt->fetchColumn()) json_response(['error' => 'food_id not found'], 404);

        $now  = date('c');
        $seen = $body['last_seen_date'] ?? date('Y-m-d');

        $stmt = $database->prepare(
            "INSERT INTO food_packs
                (food_id, store, pack_label, pack_size_g, cost_per_pack, last_seen_date, provenance, notes, created_at, updated_at)
             VALUES (:food_id, :store, NULL, :pack_size_g, :cost_per_pack, :last_seen_date, 'user_reported', NULL, :created_at, :updated_at)
             ON CONFLICT(food_id, store, pack_size_g) DO UPDATE SET
                cost_per_pack  = excluded.cost_per_pack,
                last_seen_date = excluded.last_seen_date,
                provenance     = excluded.provenance,
                updated_at     = excluded.updated_at"
        );
        $stmt->execute([
            ':food_id' => $foodId, ':store' => $store,
            ':pack_size_g' => $sizeG, ':cost_per_pack' => $cost, ':last_seen_date' => $seen,
            ':created_at' => $now, ':updated_at' => $now,
        ]);

        $idStmt = $database->prepare("SELECT pack_id FROM food_packs WHERE food_id = ? AND store = ? AND pack_size_g = ?");
        $idStmt->execute([$foodId, $store, $sizeG]);
        $packId = (int)$idStmt->fetchColumn();

        json_response([
            'ok'            => true,
            'pack_id'       => $packId,
            'cost_per_100g' => round($cost / $sizeG * 100, 4),
        ]);
    }

    json_response(['error' => "Unknown action '$action'"], 400);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
