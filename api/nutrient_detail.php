<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }
if (!$database) { json_response(['error' => 'DB unavailable'], 500); }

$nutrientKey = $_GET['nutrient'] ?? '';

// nutrient_rdis.nutrient → foods table column (per 100g)
$foodsColMap = [
    'energy_kj'             => 'energy_kj',             'protein_g'             => 'protein_g',
    'fibre'                 => 'fibre_g',               'fibre_soluble'         => 'fibre_soluble_g',
    'fibre_insoluble'       => 'fibre_insoluble_g',     'potassium'             => 'potassium_mg',
    'sodium'                => 'sodium_mg',             'vitamin_c'             => 'vitamin_c_mg',
    'folate'                => 'folate_mcg',            'calcium'               => 'calcium_mg',
    'iron'                  => 'iron_mg',               'magnesium'             => 'magnesium_mg',
    'vitamin_k'             => 'vitamin_k_mcg',         'vitamin_a'             => 'vitamin_a_mcg',
    'retinol'               => 'retinol_mcg',           'vitamin_d'             => 'vitamin_d_mcg',
    'omega3_ala_mg'         => 'omega3_ala_mg',         'omega3_epa_mg'         => 'omega3_epa_mg',
    'omega3_dha_mg'         => 'omega3_dha_mg',         'omega6_la_mg'          => 'omega6_la_mg',
    'vitamin_b1_mg'         => 'vitamin_b1_mg',         'vitamin_b2_mg'         => 'vitamin_b2_mg',
    'vitamin_b3_mg'         => 'vitamin_b3_mg',         'vitamin_b5_mg'         => 'vitamin_b5_mg',
    'vitamin_b6_mg'         => 'vitamin_b6_mg',         'vitamin_b7_mcg'        => 'vitamin_b7_mcg',
    'vitamin_b12_mcg'       => 'vitamin_b12_mcg',       'vitamin_e_mg'          => 'vitamin_e_mg',
    'vitamin_k2_mcg'        => 'vitamin_k2_mcg',        'choline_mg'            => 'choline_mg',
    'lutein_zeaxanthin_mcg' => 'lutein_zeaxanthin_mcg', 'zinc_mg'               => 'zinc_mg',
    'selenium_mcg'          => 'selenium_mcg',          'iodine_mcg'            => 'iodine_mcg',
    'copper_mg'             => 'copper_mg',             'fat_saturated_g'       => 'fat_saturated_g',
    'fat_trans_g'           => 'fat_trans_g',           'sugars_g'              => 'sugars_g',
    'phosphorus'            => 'phosphorus_mg',
];

// nutrient_rdis.nutrient → foodLogNutrientTotals() key
$totalsKeyMap = [
    'energy_kj'             => 'energy_kj',         'protein_g'             => 'protein_g',
    'fibre'                 => 'fibre',             'fibre_soluble'         => 'fibre_soluble',
    'fibre_insoluble'       => 'fibre_insoluble',   'potassium'             => 'potassium',
    'sodium'                => 'sodium',            'vitamin_c'             => 'vitamin_c',
    'folate'                => 'vitamin_b9',        'calcium'               => 'calcium',
    'iron'                  => 'iron',              'magnesium'             => 'magnesium',
    'vitamin_k'             => 'vitamin_k',         'vitamin_a'             => 'vitamin_a',
    'retinol'               => 'retinol',           'vitamin_d'             => 'vitamin_d',
    'omega3_ala_mg'         => 'omega3_ala',        'omega3_epa_mg'         => 'omega3_epa',
    'omega3_dha_mg'         => 'omega3_dha',        'omega6_la_mg'          => 'omega6_la',
    'vitamin_b1_mg'         => 'vitamin_b1',        'vitamin_b2_mg'         => 'vitamin_b2',
    'vitamin_b3_mg'         => 'vitamin_b3',        'vitamin_b5_mg'         => 'vitamin_b5',
    'vitamin_b6_mg'         => 'vitamin_b6',        'vitamin_b7_mcg'        => 'vitamin_b7',
    'vitamin_b12_mcg'       => 'vitamin_b12',       'vitamin_e_mg'          => 'vitamin_e',
    'vitamin_k2_mcg'        => 'vitamin_k2',        'choline_mg'            => 'choline',
    'lutein_zeaxanthin_mcg' => 'lutein_zeaxanthin', 'zinc_mg'               => 'zinc',
    'selenium_mcg'          => 'selenium',          'iodine_mcg'            => 'iodine',
    'copper_mg'             => 'copper',            'fat_saturated_g'       => 'fat_saturated_g',
    'fat_trans_g'           => 'fat_trans_g',       'sugars_g'              => 'sugars_g',
    'phosphorus'            => 'phosphorus',
];

if (!isset($foodsColMap[$nutrientKey])) { json_response(['error' => 'Unknown nutrient'], 400); }

$rdiStmt = $database->prepare("SELECT * FROM nutrient_rdis WHERE nutrient = ?");
$rdiStmt->execute([$nutrientKey]);
$rdi = $rdiStmt->fetch(PDO::FETCH_ASSOC);
if (!$rdi) { json_response(['error' => 'RDI not found'], 404); }

$totalsKey   = $totalsKeyMap[$nutrientKey];
$foodsCol    = $foodsColMap[$nutrientKey];   // validated against hardcoded map — safe to interpolate
$isWeekly    = $rdi['period'] === 'weekly';
$dailyTarget = (float)$rdi['daily_rdi'];
$weekTarget  = (float)($rdi['weekly_rdi'] ?? $dailyTarget * 7);
$barTarget   = $isWeekly ? $weekTarget / 7 : $dailyTarget;

try { $log = getFoodLog(); } catch (Throwable $e) { $log = ['next_id' => 1, 'entries' => []]; }

$today = date('Y-m-d');

// 7 daily bars — for weekly-period nutrients, target = weekly_rdi/7 so bars scale sensibly
$history = [];
for ($i = 6; $i >= 0; $i--) {
    $d      = date('Y-m-d', strtotime("$today -$i days"));
    $t      = foodLogNutrientTotals($database, $log, $d, $d);
    $actual = (float)($t[$totalsKey] ?? 0);
    $history[] = [
        'date'    => $d,
        'day'     => date('D', strtotime($d)),
        'actual'  => round($actual, 3),
        'target'  => round($barTarget, 3),
        'pct'     => $barTarget > 0 ? round($actual / $barTarget, 4) : 0.0,
        'is_today'=> $d === $today,
    ];
}

// "Today" header value — weekly nutrients show 7-day rolling total vs weekly target,
// prorated to the number of days actually logged so an unlogged day reads as
// "unknown" rather than a zero-intake day dragging the week's score down.
if ($isWeekly) {
    $weekStart   = date('Y-m-d', strtotime("$today -6 days"));
    $wt          = foodLogNutrientTotals($database, $log, $weekStart, $today);
    $todayActual = (float)($wt[$totalsKey] ?? 0);
    $streakDays  = loggedStreakDays($log, $today, 7);
    $todayTarget = $weekTarget * ($streakDays / 7);
} else {
    $dt          = foodLogNutrientTotals($database, $log, $today, $today);
    $todayActual = (float)($dt[$totalsKey] ?? 0);
    $todayTarget = $dailyTarget;
}

// Top food sources — $foodsCol is from a hardcoded whitelist so safe to interpolate
$stmt = $database->query("
    SELECT f.name, fs.unit_label AS serving,
           CAST(fs.weight_g AS REAL) / 100.0 * f.{$foodsCol} AS amount_per_serving
    FROM foods f
    JOIN food_servings fs ON fs.food_id = f.food_id AND fs.is_default = 1
    WHERE f.{$foodsCol} IS NOT NULL AND f.{$foodsCol} > 0
    ORDER BY amount_per_serving DESC
    LIMIT 12
");
$sources = [];
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $amt = (float)$row['amount_per_serving'];
    if ($amt <= 0) continue;
    $sources[] = [
        'name'       => $row['name'],
        'serving'    => '1 ' . $row['serving'],
        'amount'     => round($amt, 3),
        'pct_of_rdi' => (int)round($amt / $dailyTarget * 100),
    ];
}

json_response([
    'nutrient'  => $nutrientKey,
    'label'     => $rdi['label'],
    'unit'      => $rdi['unit'],
    'is_weekly' => $isWeekly,
    'is_limit'  => !empty($rdi['is_limit']),
    'note'      => $rdi['notes'],
    'today'     => [
        'actual' => round($todayActual, 3),
        'target' => round($todayTarget, 3),
        'pct'    => $todayTarget > 0 ? round($todayActual / $todayTarget, 4) : 0.0,
    ],
    'streak_days' => $isWeekly ? $streakDays : null,
    'history'   => $history,
    'sources'   => $sources,
]);
