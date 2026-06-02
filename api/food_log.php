<?php
require_once __DIR__ . '/../init.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }
if (!$database) { json_response(['error' => 'DB unavailable'], 500); }

$uid = $_SESSION['user_id'] ?? '';
if (!$uid) { json_response(['error' => 'No user id'], 401); }

// ── GET: return today's log + per-nutrient totals ────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $date = $_GET['date'] ?? date('Y-m-d');

    // Logged entries
    $stmt = $database->prepare("
        SELECT fl.log_id, fl.quantity, fl.is_writeoff, fl.writeoff_label,
               f.name AS food_name, f.food_id,
               fs.unit_label, fs.weight_g, fs.serving_id
        FROM food_log fl
        LEFT JOIN foods f ON fl.food_id = f.food_id
        LEFT JOIN food_servings fs ON fl.serving_id = fs.serving_id
        WHERE fl.user_id = ? AND fl.date = ?
        ORDER BY fl.logged_at
    ");
    $stmt->execute([$uid, $date]);
    $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($entries as &$e) {
        $e['log_id']   = (int)$e['log_id'];
        $e['food_id']  = $e['food_id'] ? (int)$e['food_id'] : null;
        $e['quantity'] = (float)$e['quantity'];
        $e['is_writeoff'] = (bool)$e['is_writeoff'];
    }
    unset($e);

    // Daily nutrient totals (whole foods only)
    $totals = _nutrientTotals($database, $uid, $date, $date);

    // Weekly totals for weekly-tracked nutrients (last 7 days including today)
    $weekStart = date('Y-m-d', strtotime($date . ' -6 days'));
    $weekTotals = _nutrientTotals($database, $uid, $weekStart, $date);

    json_response(['entries' => $entries, 'totals' => $totals, 'week_totals' => $weekTotals, 'date' => $date]);
}

// ── POST: add entry or delete entry ─────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body   = json_decode(file_get_contents('php://input'), true) ?? [];
    $action = $body['action'] ?? '';

    if ($action === 'add') {
        $food_id    = (int)($body['food_id'] ?? 0);
        $serving_id = (int)($body['serving_id'] ?? 0);
        $quantity   = max(0.1, (float)($body['quantity'] ?? 1));
        $date       = $body['date'] ?? date('Y-m-d');
        if (!$food_id || !$serving_id) { json_response(['error' => 'food_id and serving_id required'], 400); }
        $database->prepare("
            INSERT INTO food_log (user_id,date,food_id,serving_id,quantity,is_writeoff)
            VALUES (?,?,?,?,?,0)
        ")->execute([$uid, $date, $food_id, $serving_id, $quantity]);
        json_response(['ok' => true, 'log_id' => (int)$database->lastInsertId()]);
    }

    if ($action === 'add_writeoff') {
        $label = trim($body['label'] ?? '');
        $date  = $body['date'] ?? date('Y-m-d');
        if (!$label) { json_response(['error' => 'label required'], 400); }
        $database->prepare("
            INSERT INTO food_log (user_id,date,food_id,serving_id,quantity,is_writeoff,writeoff_label)
            VALUES (?,?,NULL,NULL,1,1,?)
        ")->execute([$uid, $date, $label]);
        json_response(['ok' => true, 'log_id' => (int)$database->lastInsertId()]);
    }

    if ($action === 'delete') {
        $log_id = (int)($body['log_id'] ?? 0);
        if (!$log_id) { json_response(['error' => 'log_id required'], 400); }
        $database->prepare("DELETE FROM food_log WHERE log_id = ? AND user_id = ?")
                 ->execute([$log_id, $uid]);
        json_response(['ok' => true]);
    }

    if ($action === 'get_servings') {
        $food_id = (int)($body['food_id'] ?? 0);
        $stmt = $database->prepare("SELECT serving_id, unit_label, weight_g, is_default
                                    FROM food_servings WHERE food_id = ? ORDER BY is_default DESC, serving_id");
        $stmt->execute([$food_id]);
        json_response($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    json_response(['error' => 'Unknown action'], 400);
}

json_response(['error' => 'Method not allowed'], 405);

// ── Helper ────────────────────────────────────────────────────────────────────
function _nutrientTotals(PDO $db, string $uid, string $from, string $to): array {
    $stmt = $db->prepare("
        SELECT
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.fibre_g),            0) AS fibre,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.fibre_soluble_g),   0) AS fibre_soluble,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.fibre_insoluble_g), 0) AS fibre_insoluble,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.potassium_mg),0) AS potassium,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.vitamin_k_mcg),0) AS vitamin_k,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.vitamin_c_mg), 0) AS vitamin_c,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.folate_mcg),   0) AS folate,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.calcium_mg),   0) AS calcium,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.iron_mg),      0) AS iron,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.magnesium_mg), 0) AS magnesium,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.vitamin_a_mcg),0) AS vitamin_a,
            COALESCE(SUM(fl.quantity * (fs.weight_g / 100.0) * f.vitamin_d_mcg),0) AS vitamin_d
        FROM food_log fl
        JOIN food_servings fs ON fl.serving_id = fs.serving_id
        JOIN foods f ON fl.food_id = f.food_id
        WHERE fl.user_id = ? AND fl.date >= ? AND fl.date <= ? AND fl.is_writeoff = 0
    ");
    $stmt->execute([$uid, $from, $to]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return array_map('floatval', $row ?: []);
}
