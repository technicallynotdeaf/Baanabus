<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }
if (!$database) { json_response(['error' => 'DB unavailable'], 500); }

$date = $_GET['date'] ?? date('Y-m-d');

// Load RDIs
$rdis = $database->query("SELECT * FROM nutrient_rdis ORDER BY display_order")
                 ->fetchAll(PDO::FETCH_ASSOC);

// Nutrient column map: rdi nutrient key → SQL column in foods table + key in foodLogNutrientTotals output
$colMap = [
    'energy_kj'             => ['foods_col' => 'energy_kj',             'totals_key' => 'energy_kj'],
    'protein_g'             => ['foods_col' => 'protein_g',             'totals_key' => 'protein_g'],
    'fibre'                 => ['foods_col' => 'fibre_g',               'totals_key' => 'fibre'],
    'fibre_soluble'         => ['foods_col' => 'fibre_soluble_g',       'totals_key' => 'fibre_soluble'],
    'fibre_insoluble'       => ['foods_col' => 'fibre_insoluble_g',     'totals_key' => 'fibre_insoluble'],
    'fat_saturated_g'       => ['foods_col' => 'fat_saturated_g',       'totals_key' => 'fat_saturated_g'],
    'fat_trans_g'           => ['foods_col' => 'fat_trans_g',           'totals_key' => 'fat_trans_g'],
    'sugars_g'              => ['foods_col' => 'sugars_g',              'totals_key' => 'sugars_g'],
    'omega3_ala_mg'         => ['foods_col' => 'omega3_ala_mg',         'totals_key' => 'omega3_ala'],
    'omega3_epa_mg'         => ['foods_col' => 'omega3_epa_mg',         'totals_key' => 'omega3_epa'],
    'omega3_dha_mg'         => ['foods_col' => 'omega3_dha_mg',         'totals_key' => 'omega3_dha'],
    'omega6_la_mg'          => ['foods_col' => 'omega6_la_mg',          'totals_key' => 'omega6_la'],
    'potassium'             => ['foods_col' => 'potassium_mg',          'totals_key' => 'potassium'],
    'calcium'               => ['foods_col' => 'calcium_mg',            'totals_key' => 'calcium'],
    'iron'                  => ['foods_col' => 'iron_mg',               'totals_key' => 'iron'],
    'magnesium'             => ['foods_col' => 'magnesium_mg',          'totals_key' => 'magnesium'],
    'zinc_mg'               => ['foods_col' => 'zinc_mg',               'totals_key' => 'zinc'],
    'selenium_mcg'          => ['foods_col' => 'selenium_mcg',          'totals_key' => 'selenium'],
    'iodine_mcg'            => ['foods_col' => 'iodine_mcg',            'totals_key' => 'iodine'],
    'copper_mg'             => ['foods_col' => 'copper_mg',             'totals_key' => 'copper'],
    'vitamin_a'             => ['foods_col' => 'vitamin_a_mcg',         'totals_key' => 'vitamin_a'],
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

try { $log = getFoodLog(); } catch (Throwable $e) { $log = ['next_id' => 1, 'entries' => []]; }

// Get today's totals (for daily nutrients)
$todayTotals = foodLogNutrientTotals($database, $log, $date, $date);

// Get 7-day rolling totals (for weekly nutrients — rolling average vs daily RDI)
$weekStart  = date('Y-m-d', strtotime($date . ' -6 days'));
$weekTotals = foodLogNutrientTotals($database, $log, $weekStart, $date);

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
        'label'       => $rdi['label'],
        'unit'        => $rdi['unit'],
        'actual'      => round($actual, 2),
        'target'      => $target,
        'pct'         => $pct,
        'good_enough' => (float)$rdi['good_enough'],
        'period'      => $rdi['period'],
        'note'        => $note,
        'covered'     => $pct >= (float)$rdi['good_enough'],
        'upper_limit' => isset($rdi['upper_limit']) ? (float)$rdi['upper_limit'] : null,
        'is_limit'    => !empty($rdi['is_limit']),
    ];
}

// Find gaps (sorted by how deficient, worst first)
$gaps = array_filter($progress, fn($p) => !$p['covered']);
uasort($gaps, fn($a, $b) => $a['pct'] <=> $b['pct']);

// Build suggestions for each gap nutrient (up to 4 gaps, 4 foods each)
$suggestions = [];
$maxSuggestions = min(12, (int)($_GET['limit'] ?? 4));
foreach (array_slice(array_keys($gaps), 0, $maxSuggestions) as $n) {
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
