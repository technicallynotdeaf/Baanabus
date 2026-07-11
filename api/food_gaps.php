<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }
if (!$database) { json_response(['error' => 'DB unavailable'], 500); }

$date = $_GET['date'] ?? date('Y-m-d');

// Gap scoring map: nutrient RDI key → foods table column + foodLogNutrientTotals key.
// Limit nutrients and sodium are excluded — they can't improve a gap score.
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

// Full map of ALL RDI nutrient keys → foodLogNutrientTotals key (includes limits).
// Used to build the progress bars in the Nutrients overlay.
$progressTotalsMap = [
    'energy_kj'             => 'energy_kj',
    'protein_g'             => 'protein_g',
    'fibre'                 => 'fibre',
    'fibre_soluble'         => 'fibre_soluble',
    'fibre_insoluble'       => 'fibre_insoluble',
    'potassium'             => 'potassium',
    'sodium'                => 'sodium',
    'vitamin_c'             => 'vitamin_c',
    'folate'                => 'vitamin_b9',
    'calcium'               => 'calcium',
    'iron'                  => 'iron',
    'magnesium'             => 'magnesium',
    'vitamin_k'             => 'vitamin_k',
    'vitamin_a'             => 'vitamin_a',
    'retinol'               => 'retinol',
    'vitamin_d'             => 'vitamin_d',
    'omega3_ala_mg'         => 'omega3_ala',
    'omega3_epa_mg'         => 'omega3_epa',
    'omega3_dha_mg'         => 'omega3_dha',
    'omega6_la_mg'          => 'omega6_la',
    'vitamin_b1_mg'         => 'vitamin_b1',
    'vitamin_b2_mg'         => 'vitamin_b2',
    'vitamin_b3_mg'         => 'vitamin_b3',
    'vitamin_b5_mg'         => 'vitamin_b5',
    'vitamin_b6_mg'         => 'vitamin_b6',
    'vitamin_b7_mcg'        => 'vitamin_b7',
    'vitamin_b12_mcg'       => 'vitamin_b12',
    'vitamin_e_mg'          => 'vitamin_e',
    'vitamin_k2_mcg'        => 'vitamin_k2',
    'choline_mg'            => 'choline',
    'lutein_zeaxanthin_mcg' => 'lutein_zeaxanthin',
    'zinc_mg'               => 'zinc',
    'selenium_mcg'          => 'selenium',
    'iodine_mcg'            => 'iodine',
    'copper_mg'             => 'copper',
    'fat_saturated_g'       => 'fat_saturated_g',
    'fat_trans_g'           => 'fat_trans_g',
    'sugars_g'              => 'sugars_g',
];

$rdis = $database->query("SELECT * FROM nutrient_rdis ORDER BY display_order")
                 ->fetchAll(PDO::FETCH_ASSOC);

try { $log = getFoodLog(); } catch (Throwable $e) { $log = ['next_id' => 1, 'entries' => []]; }

$todayTotals = foodLogNutrientTotals($database, $log, $date, $date);
$weekStart   = date('Y-m-d', strtotime($date . ' -6 days'));
$weekTotals  = foodLogNutrientTotals($database, $log, $weekStart, $date);

// How many of the last 7 days actually have log entries, counting back from
// $date and stopping at the first unlogged day. Weekly-rolling nutrient goals
// are prorated to this many days out of 7 so an unlogged day (unknown intake)
// isn't scored as a zero-intake day.
$streakDays  = loggedStreakDays($log, $date, 7);
$weekProrate = $streakDays / 7;

// Build progress bars for ALL RDI nutrients (including limits).
$progress = [];
foreach ($rdis as $rdi) {
    $n      = $rdi['nutrient'];
    $totKey = $progressTotalsMap[$n] ?? null;
    if (!$totKey) continue;

    if ($rdi['period'] === 'weekly') {
        $target = (float)($rdi['weekly_rdi'] ?? $rdi['daily_rdi'] * 7) * $weekProrate;
        $actual = (float)($weekTotals[$totKey] ?? 0);
    } else {
        $target = (float)$rdi['daily_rdi'];
        $actual = (float)($todayTotals[$totKey] ?? 0);
    }

    $progress[$n] = [
        'label'       => $rdi['label'],
        'actual'      => round($actual, 3),
        'target'      => round($target, 3),
        'unit'        => $rdi['unit'],
        'pct'         => $target > 0 ? round($actual / $target, 4) : 0.0,
        'is_limit'    => !empty($rdi['is_limit']),
        'upper_limit' => isset($rdi['upper_limit']) ? (float)$rdi['upper_limit'] : null,
        'note'        => $rdi['notes'] ?? null,
    ];
}

// Build gap map: only uncovered, non-limit nutrients (used for food suggestions).
$gaps = [];
foreach ($rdis as $rdi) {
    $n   = $rdi['nutrient'];
    $col = $colMap[$n]['totals_key'] ?? null;
    if (!$col || !empty($rdi['is_limit'])) continue;

    if ($rdi['period'] === 'weekly') {
        $target = (float)($rdi['weekly_rdi'] ?? $rdi['daily_rdi'] * 7) * $weekProrate;
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
    json_response(['foods' => [], 'progress' => $progress, 'suggestions' => new stdClass(), 'date' => $date, 'streak_days' => $streakDays]);
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

// Build per-nutrient suggestions for the top 4 biggest gaps.
// Each entry lists the top 3 foods for that specific nutrient.
$sortedGaps = $gaps;
uasort($sortedGaps, fn($a, $b) =>
    ($b['remaining'] / max(0.001, $b['target'])) <=> ($a['remaining'] / max(0.001, $a['target']))
);
$suggestions = new stdClass();
$suggCount   = 0;
foreach ($sortedGaps as $n => $gap) {
    if ($suggCount >= 4) break;
    $col      = $gap['foods_col'];
    $picks    = [];
    foreach ($allFoods as $food) {
        $servingG       = (float)$food['serving_g'];
        $nutrientPer100 = isset($food[$col]) ? (float)$food[$col] : 0.0;
        if ($servingG <= 0 || $nutrientPer100 <= 0.0) continue;
        $perServing = $servingG / 100.0 * $nutrientPer100;
        if ($perServing <= 0) continue;
        $picks[] = [
            'name'        => $food['name'],
            'serving'     => '1 ' . $food['serving_label'],
            'per_serving' => round($perServing, 3),
            'pct_of_rdi'  => (int)round($perServing / $gap['target'] * 100),
        ];
    }
    usort($picks, fn($a, $b) => $b['per_serving'] <=> $a['per_serving']);
    $picks = array_slice($picks, 0, 3);
    if (empty($picks)) continue;
    $suggestions->$n = [
        'label'     => $gap['label'],
        'unit'      => $progress[$n]['unit'] ?? $gap['unit'],
        'remaining' => round($gap['remaining'], 3),
        'picks'     => $picks,
    ];
    $suggCount++;
}

json_response(['foods' => array_slice($scored, 0, 10), 'progress' => $progress, 'suggestions' => $suggestions, 'date' => $date, 'streak_days' => $streakDays]);
