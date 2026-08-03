<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);
if (!$database)         json_response(['error' => 'No database'], 500);

$input   = json_decode(file_get_contents('php://input'), true);
$setName = trim($input['set_name'] ?? '');
$active  = array_key_exists('active', $input) ? (bool)$input['active'] : true;
if (!$setName) json_response(['error' => 'Missing set_name'], 400);

try {
    $stmt = $database->prepare("SELECT COUNT(*) FROM study_questions WHERE set_name = ? AND q_type = 'study'");
    $stmt->execute([$setName]);
    if ((int)$stmt->fetchColumn() === 0) json_response(['error' => 'Unknown study set'], 400);

    toggleActiveStudySet($setName, $active);
    json_response(['ok' => true, 'set_name' => $setName, 'active' => $active, 'study_active_sets' => getActiveStudySets()]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
