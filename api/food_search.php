<?php
require_once __DIR__ . '/../init.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { json_response(['error' => 'Not authenticated'], 401); }
if (!$database) { json_response(['error' => 'DB unavailable'], 500); }

$q = trim($_GET['q'] ?? '');
if (strlen($q) < 1) { json_response([]); }

$like = '%' . $q . '%';
$stmt = $database->prepare("
    SELECT f.food_id, f.name, f.category, f.suggested_serving_g,
           fs.serving_id, fs.unit_label, fs.weight_g
    FROM foods f
    JOIN food_servings fs ON fs.food_id = f.food_id AND fs.is_default = 1
    WHERE f.search_name LIKE ?
    ORDER BY
        CASE WHEN f.search_name LIKE ? THEN 0 ELSE 1 END,
        f.name
    LIMIT 12
");
$stmt->execute([$like, $q . '%']);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$results = [];
foreach ($rows as $r) {
    $results[] = [
        'food_id'    => (int)$r['food_id'],
        'name'       => $r['name'],
        'category'   => $r['category'],
        'serving_id' => (int)$r['serving_id'],
        'unit_label' => $r['unit_label'],
        'weight_g'   => (float)$r['weight_g'],
    ];
}
json_response($results);
