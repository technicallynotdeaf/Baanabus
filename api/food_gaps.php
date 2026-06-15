<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }
if (!$database) { json_response(['error' => 'DB unavailable'], 500); }

$date = $_GET['date'] ?? date('Y-m-d');

// Map RDI nutrient keys → foods table column + foodLogNutrientTotals key
// Limit nutrients (sodium, sat fat, trans fat, sugars) are intentionally absent —
// they can't improve a gap score.
$colMap = [
    'energy_kj'             => ['foods_col' => 'energy_kj',             'totals_key' => 'energy_kj'],
    'protein_g'             => ['foods_col' => 'protein_g',             'totals_key' => 'protein_g'],
    'fibre'                 => ['foods_col' => 'fibre_g',               'totals_key' => 'fibre'],
    'fibre_soluble'         => ['foods_col' => 'fibre_soluble_g',       'totals_key' => 'fibre_soluble'],
    'fibre_insoluble'       => ['foods_col' => 'fibre_insoluble_g',     'totals_key' => 'fibre_insoluble'],
    'omega3_ala_mg'         => ['foods_col' => 'omega3_ala_mg',         'totals_key' => 'omega3_ala'],
    'omega3_epa_mg'         => ['foods_col' => 'omega3_epa_mg',         'totals_key' => 'omega3_epa'],
    'omega3_dha_mg'         => ['foods_col' => 'omega3_dha_mg',         'totals_key' => 'omega3_dha'],
    'omega6_la_mg'          => ['foods_col' => 'omega6_la_mg',          'totals_key' => 'omega6_la'],
    'potassium'             => ['foods_col' => 'potassium_mg',          'totals_key' => 'potassium'],
    'calcium'               => ['foods_col' => 'calcium_mg',            'totals_key' => 'calcium'],
    'phosphorus'            => ['foods_col' => 'phosphorus_mg',         'totals_key' => 'phosphorus'],
    'iron'                  => ['foods_col' => 'iron_mg',               'totals_key' => 'iron'],
    'magnesium'             => ['foods_col' => 'magnesium_mg',          'totals_key' => 'magnesium'],
    'zinc_mg'               => ['foods_col' => 'zinc_mg',               'totals_key' => 'zinc'],
    'selenium_mcg'          => ['foods_col' => 'selenium_mcg',          'totals_key' => 'selenium'],
    'iodine_mcg'            => ['foods_col' => 'iodine_mcg',            'totals_key' => 'iodine'],
    'copper_mg'             => ['foods_col' => 'copper_mg',             'totals_key' => 'copper'],
    'vitamin_a'             => ['foods_col' => 'vitamin_a_mcg',         'totals_key' => 'vitamin_a'],
    'retinol'               => ['foods_col' => 'retinol_mcg',           'totals_key' => 'retinol'],
    'vitamin_c'             => ['foods_col' => 'vitamin_c_mg',          'totals_key' => 'vitamin_c'],
    'vitamin_d'             => ['foods_col' => 'vitamin_d_mcg',         'totals_key' => 'vitamin_d'],
    'vitamin_e_mg'          => ['foods_col' => 'vitamin_e_mg',          'totals_key' => 'vitamin_e'],
    'vitamin_k'             => ['foods_col' => 'vitamin_k_mcg',         'totals_key' => 'vitamin_k'],
    'vitamin_k2_mcg'        => ['foods_col' => 'vitamin_k2_mcg',        'totals_key' => 'vitamin_k2'],
    'folate'                => ['foods_col' => 'folate_mcg',            'totals_key' => 'vitamin_b9'],
    'vitamin_b1_mg'         => ['foods_col' => 'vitamin_b1_mg',         'totals_key' => 'vitamin_b1'],
    'vitamin_b2_mg'         => ['foods_col' => 'vitamin_b2_mg',         'totals_key' => 'vitamin_b2'],
    'vitamin_b3_mg'         => ['foods_col' => 'vitamin_b3_mg',         'totals_key' => 'vitamin_b3'],
    'vitamin_b5_mg'         => ['foods_col' => 'vitamin_b5_mg',         'totals_key' => 'vitamin_b5'],
    'vitamin_b6_mg'         => ['foods_col' => 'vitamin_b6_mg',         'totals_key' => 'vitamin_b6'],
    'vitamin_b7_mcg'        => ['foods_col' => 'vitamin_b7_mcg',        'totals_key' => 'vitamin_b7'],
    'vitamin_b12_mcg'       => ['foods_col' => 'vitamin_b12_mcg',       'totals_key' => 'vitamin_b12'],
    'choline_mg'            => ['foods_col' => 'choline_mg',            'totals_key' => 'choline'],
    'lutein_zeaxanthin_mcg' => ['foods_col' => 'lutein_zeaxanthin_mcg', 'totals_key' => 'lutein_zeaxanthin'],
];

$rdis = $database->query("SELECT * FROM nutrient_rdis ORDER BY display_order")
                 ->fetchAll(PDO::FETCH_ASSOC);

try { $log = getFoodLog(); } catch (Throwable $e) { $log = ['next_id' => 1, 'entries' => []]; }

$todayTotals = foodLogNutrientTotals($database, $log, $date, $date);
$weekStart   = date('Y-m-d', strtotime($date . ' -6 days'));
$weekTotals  = foodLogNutrientTotals($database, $log, $weekStart, $date);

// Build gap map: only uncovered, non-limit nutrients
$gaps = [];
foreach ($rdis as $rdi) {
    $n   = $rdi['nutrient'];
    $col = $colMap[$n]['totals_key'] ?? null;
    if (!$col || !empty($rdi['is_limit'])) continue;

    if ($rdi['period'] === 'weekly') {
        $target = (float)($rdi['weekly_rdi'] ?? $rdi['daily_rdi'] * 7);
        $actual = (float)($weekTotals[$col] ?? 0);
    } else {
        $target = (float)$rdi['daily_rdi'];
        $actual = (float)($todayTotals[$col] ?? 0);
    }

    $goodEnough = (float)$rdi['good_enough'];
    if ($target <= 0 || ($actual / $target) >= $goodEnough) continue;

    $gaps[$n] = [
        'label'     => $rdi['label'],
        'unit'      => $rdi['unit'],
        'target'    => $target,
        'remaining' => max(0.0, $target - $actual),
        'foods_col' => $colMap[$n]['foods_col'],
    ];
}

if (empty($gaps)) {
    json_response(['foods' => [], 'date' => $date]);
}

// Load all non-meal foods with their default serving
$allFoods = $database->query("
    SELECT f.*, fs.unit_label AS serving_label, fs.weight_g AS serving_g
    FROM foods f
    JOIN food_servings fs ON fs.food_id = f.food_id AND fs.is_default = 1
    WHERE f.category != 'meal'
    ORDER BY f.name
")->fetchAll(PDO::FETCH_ASSOC);

// Score each food: for every gap nutrient, calculate % of full RDI the default
// serving provides, capped at the remaining gap percentage. Contributions below
// 5% are too small to mention. Score = sum of per-nutrient contributions.
$scored = [];
foreach ($allFoods as $food) {
    $servingG = (float)$food['serving_g'];
    if ($servingG <= 0) continue;

    $score         = 0.0;
    $contributions = [];

    foreach ($gaps as $n => $gap) {
        $nutrientPer100 = isset($food[$gap['foods_col']]) ? (float)$food[$gap['foods_col']] : 0.0;
        if ($nutrientPer100 <= 0.0) continue;

        $perServing   = $servingG / 100.0 * $nutrientPer100;
        $pctOfRdi     = $perServing / $gap['target'] * 100.0;
        $remainingPct = $gap['remaining'] / $gap['target'] * 100.0;
        $pct          = min($pctOfRdi, $remainingPct);

        if ($pct < 5.0) continue;

        $score           += $pct;
        $contributions[]  = ['label' => $gap['label'], 'pct' => (int)round($pct)];
    }

    if (empty($contributions)) continue;

    usort($contributions, fn($a, $b) => $b['pct'] <=> $a['pct']);

    $scored[] = [
        'food_id'       => (int)$food['food_id'],
        'name'          => $food['name'],
        'serving'       => '1 ' . $food['serving_label'],
        'score'         => (int)round($score),
        'contributions' => $contributions,
    ];
}

usort($scored, fn($a, $b) => $b['score'] <=> $a['score']);

json_response(['foods' => array_slice($scored, 0, 10), 'date' => $date]);
