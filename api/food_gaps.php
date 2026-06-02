<?php
require_once __DIR__ . '/../init.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }
if (!$database) { json_response(['error' => 'DB unavailable'], 500); }

$uid  = $_SESSION['user_id'] ?? '';
$date = $_GET['date'] ?? date('Y-m-d');

// Load RDIs
$rdis = $database->query("SELECT * FROM nutrient_rdis ORDER BY display_order")
                 ->fetchAll(PDO::FETCH_ASSOC);

// Nutrient column map: rdi nutrient key → SQL column in foods + totals result
$colMap = [
    'fibre'          => ['foods_col' => 'fibre_g',            'totals_key' => 'fibre'],
    'fibre_soluble'  => ['foods_col' => 'fibre_soluble_g',   'totals_key' => 'fibre_soluble'],
    'fibre_insoluble'=> ['foods_col' => 'fibre_insoluble_g', 'totals_key' => 'fibre_insoluble'],
    'potassium' => ['foods_col' => 'potassium_mg',   'totals_key' => 'potassium'],
    'vitamin_c' => ['foods_col' => 'vitamin_c_mg',   'totals_key' => 'vitamin_c'],
    'folate'    => ['foods_col' => 'folate_mcg',     'totals_key' => 'folate'],
    'calcium'   => ['foods_col' => 'calcium_mg',     'totals_key' => 'calcium'],
    'iron'      => ['foods_col' => 'iron_mg',        'totals_key' => 'iron'],
    'magnesium' => ['foods_col' => 'magnesium_mg',   'totals_key' => 'magnesium'],
    'vitamin_k' => ['foods_col' => 'vitamin_k_mcg',  'totals_key' => 'vitamin_k'],
    'vitamin_a' => ['foods_col' => 'vitamin_a_mcg',  'totals_key' => 'vitamin_a'],
    'vitamin_d' => ['foods_col' => 'vitamin_d_mcg',  'totals_key' => 'vitamin_d'],
];

// Get today's totals (for daily nutrients)
$todayTotals = _gapTotals($database, $uid, $date, $date);

// Get 7-day rolling totals (for weekly nutrients — rolling average vs daily RDI)
$weekStart   = date('Y-m-d', strtotime($date . ' -6 days'));
$weekTotals  = _gapTotals($database, $uid, $weekStart, $date);

// Calculate progress per nutrient
$progress = [];
foreach ($rdis as $rdi) {
    $n   = $rdi['nutrient'];
    $col = $colMap[$n]['totals_key'] ?? null;
    if (!$col) continue;

    if ($rdi['period'] === 'weekly') {
        // 7-day rolling sum vs weekly target (daily_rdi × 7)
        $target  = ($rdi['weekly_rdi'] ?? $rdi['daily_rdi'] * 7);
        $actual  = $weekTotals[$col] ?? 0;
        $note    = '7-day total';
    } else {
        $target = $rdi['daily_rdi'];
        $actual = $todayTotals[$col] ?? 0;
        $note   = 'today';
    }

    $pct = $target > 0 ? round($actual / $target, 3) : 0;
    $progress[$n] = [
        'label'      => $rdi['label'],
        'unit'       => $rdi['unit'],
        'actual'     => round($actual, 1),
        'target'     => $target,
        'pct'        => $pct,
        'good_enough'=> (float)$rdi['good_enough'],
        'period'     => $rdi['period'],
        'note'       => $note,
        'covered'    => $pct >= (float)$rdi['good_enough'],
    ];
}

// Find gaps (sorted by how deficient, worst first)
$gaps = array_filter($progress, fn($p) => !$p['covered']);
uasort($gaps, fn($a, $b) => $a['pct'] <=> $b['pct']);

// Build suggestions for each gap nutrient (up to 4 gaps, 4 foods each)
$suggestions = [];
foreach (array_slice(array_keys($gaps), 0, 4) as $n) {
    $foodsCol = $colMap[$n]['foods_col'] ?? null;
    if (!$foodsCol) continue;

    $remaining = max(0, $gaps[$n]['target'] - $gaps[$n]['actual']);
    $unit      = $gaps[$n]['unit'];
    $label     = $gaps[$n]['label'];

    // Get top foods for this nutrient, all categories
    $stmt = $database->prepare("
        SELECT f.food_id, f.name, f.category, f.suggested_serving_g,
               fs.unit_label, fs.weight_g,
               ROUND(f.suggested_serving_g / 100.0 * f.$foodsCol, 1) AS per_serving
        FROM foods f
        JOIN food_servings fs ON fs.food_id = f.food_id AND fs.is_default = 1
        WHERE f.$foodsCol IS NOT NULL AND f.$foodsCol > 0
        ORDER BY per_serving DESC
        LIMIT 40
    ");
    $stmt->execute();
    $candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Pick one from each of: fruit, vegetable, legume/grain, nut/seed/dairy/protein
    $buckets  = ['fruit' => null, 'vegetable' => null, 'legume' => null, 'other' => null];
    $catGroup = fn($cat) => match($cat) {
        'fruit'     => 'fruit',
        'vegetable' => 'vegetable',
        'legume'    => 'legume',
        'grain'     => 'legume',
        default     => 'other',
    };
    foreach ($candidates as $c) {
        $bucket = $catGroup($c['category']);
        if ($buckets[$bucket] === null) $buckets[$bucket] = $c;
        if (!in_array(null, $buckets, true)) break;
    }

    $picks = [];
    foreach (array_filter($buckets) as $pick) {
        $perServing = (float)$pick['per_serving'];
        $servings   = $perServing > 0 ? ceil($remaining / $perServing) : null;
        $picks[] = [
            'food_id'     => (int)$pick['food_id'],
            'name'        => $pick['name'],
            'serving'     => "1 {$pick['unit_label']}",
            'per_serving' => $perServing,
            'unit'        => $unit,
            'servings_to_cover' => $servings,
        ];
    }

    $suggestions[$n] = [
        'label'     => $label,
        'unit'      => $unit,
        'remaining' => round($remaining, 1),
        'picks'     => $picks,
    ];
}

json_response(['progress' => $progress, 'suggestions' => $suggestions, 'date' => $date]);

function _gapTotals(PDO $db, string $uid, string $from, string $to): array {
    $stmt = $db->prepare("
        SELECT
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.fibre_g),0)            AS fibre,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.fibre_soluble_g),0)   AS fibre_soluble,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.fibre_insoluble_g),0) AS fibre_insoluble,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.potassium_mg),0)  AS potassium,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.vitamin_k_mcg),0) AS vitamin_k,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.vitamin_c_mg),0)  AS vitamin_c,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.folate_mcg),0)    AS folate,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.calcium_mg),0)    AS calcium,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.iron_mg),0)       AS iron,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.magnesium_mg),0)  AS magnesium,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.vitamin_a_mcg),0) AS vitamin_a,
            COALESCE(SUM(fl.quantity*(fs.weight_g/100.0)*f.vitamin_d_mcg),0) AS vitamin_d
        FROM food_log fl
        JOIN food_servings fs ON fl.serving_id = fs.serving_id
        JOIN foods f ON fl.food_id = f.food_id
        WHERE fl.user_id = ? AND fl.date >= ? AND fl.date <= ? AND fl.is_writeoff = 0
    ");
    $stmt->execute([$uid, $from, $to]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return array_map('floatval', $row ?: []);
}
