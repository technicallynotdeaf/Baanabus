<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }

// ── GET: today's log + nutrient totals ───────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $date = $_GET['date'] ?? date('Y-m-d');
    try { $log = getFoodLog(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }

    $entries = [];
    foreach ($log['entries'][$date] ?? [] as $e) {
        if ($e['is_writeoff']) {
            $entries[] = [
                'log_id'        => (int)$e['log_id'],
                'quantity'      => (float)$e['quantity'],
                'is_writeoff'   => true,
                'writeoff_label'=> $e['writeoff_label'],
                'food_name'     => null,
                'food_id'       => null,
                'unit_label'    => null,
                'weight_g'      => null,
                'serving_id'    => null,
            ];
        } else {
            $info = [];
            if ($database) {
                $s = $database->prepare("SELECT f.name, fs.unit_label, fs.weight_g FROM foods f JOIN food_servings fs ON fs.food_id = f.food_id WHERE f.food_id = ? AND fs.serving_id = ?");
                $s->execute([(int)$e['food_id'], (int)$e['serving_id']]);
                $info = $s->fetch(PDO::FETCH_ASSOC) ?: [];
            }
            $entries[] = [
                'log_id'        => (int)$e['log_id'],
                'quantity'      => (float)$e['quantity'],
                'is_writeoff'   => false,
                'writeoff_label'=> null,
                'food_name'     => $info['name']      ?? null,
                'food_id'       => (int)$e['food_id'],
                'unit_label'    => $info['unit_label'] ?? null,
                'weight_g'      => isset($info['weight_g']) ? (float)$info['weight_g'] : null,
                'serving_id'    => (int)$e['serving_id'],
            ];
        }
    }

    $totals     = $database ? foodLogNutrientTotals($database, $log, $date, $date) : [];
    $weekStart  = date('Y-m-d', strtotime($date . ' -6 days'));
    $weekTotals = $database ? foodLogNutrientTotals($database, $log, $weekStart, $date) : [];

    json_response(['entries' => $entries, 'totals' => $totals, 'week_totals' => $weekTotals, 'date' => $date]);
}

// ── POST ─────────────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body   = json_decode(file_get_contents('php://input'), true) ?? [];
    $action = $body['action'] ?? '';

    if ($action === 'add') {
        $food_id    = (int)($body['food_id']    ?? 0);
        $serving_id = (int)($body['serving_id'] ?? 0);
        $quantity   = max(0.1, (float)($body['quantity'] ?? 1));
        $date       = $body['date'] ?? date('Y-m-d');
        if (!$food_id || !$serving_id) { json_response(['error' => 'food_id and serving_id required'], 400); }
        try {
            $log = getFoodLog();
            $lid = $log['next_id'];
            $log['entries'][$date][] = [
                'log_id'        => $lid,
                'food_id'       => $food_id,
                'serving_id'    => $serving_id,
                'quantity'      => $quantity,
                'is_writeoff'   => false,
                'writeoff_label'=> null,
                'logged_at'     => date('Y-m-d H:i:s'),
            ];
            $log['next_id']++;
            saveFoodLog($log);
            if ($date === date('Y-m-d')) {
                try {
                    creditTop3Progress('food_log', 1);
                    if ($database) {
                        $nCount = top3NutrientsAtRdiCount($date);
                        creditTop3Progress('nutrient_hit', $nCount);
                    }
                } catch (Throwable $e) {}
            }
            json_response(['ok' => true, 'log_id' => $lid, 'top3_completed' => top3DrainCompleted()]);
        } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
    }

    if ($action === 'add_writeoff') {
        $label = trim($body['label'] ?? '');
        $date  = $body['date'] ?? date('Y-m-d');
        if (!$label) { json_response(['error' => 'label required'], 400); }
        try {
            $log = getFoodLog();
            $lid = $log['next_id'];
            $log['entries'][$date][] = [
                'log_id'        => $lid,
                'food_id'       => null,
                'serving_id'    => null,
                'quantity'      => 1,
                'is_writeoff'   => true,
                'writeoff_label'=> $label,
                'logged_at'     => date('Y-m-d H:i:s'),
            ];
            $log['next_id']++;
            saveFoodLog($log);
            if ($date === date('Y-m-d')) {
                try { creditTop3Progress('food_log', 1); } catch (Throwable $e) {}
            }
            json_response(['ok' => true, 'log_id' => $lid, 'top3_completed' => top3DrainCompleted()]);
        } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
    }

    if ($action === 'delete') {
        $log_id = (int)($body['log_id'] ?? 0);
        if (!$log_id) { json_response(['error' => 'log_id required'], 400); }
        try {
            $log = getFoodLog();
            foreach ($log['entries'] as $date => &$day) {
                $log['entries'][$date] = array_values(
                    array_filter($day, fn($e) => (int)$e['log_id'] !== $log_id)
                );
            }
            unset($day);
            saveFoodLog($log);
            json_response(['ok' => true]);
        } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
    }

    if ($action === 'get_servings') {
        if (!$database) { json_response(['error' => 'DB unavailable'], 500); }
        $food_id = (int)($body['food_id'] ?? 0);
        $stmt = $database->prepare("SELECT serving_id, unit_label, weight_g, is_default FROM food_servings WHERE food_id = ? ORDER BY is_default DESC, serving_id");
        $stmt->execute([$food_id]);
        json_response($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    json_response(['error' => 'Unknown action'], 400);
}

json_response(['error' => 'Method not allowed'], 405);
