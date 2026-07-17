<?php
require_once __DIR__ . '/../init.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);
if (!$database) json_response(['error' => 'No database'], 500);

$in      = json_decode(file_get_contents('php://input'), true) ?: [];
$setName = trim($in['set_name'] ?? '');
$qType   = trim($in['q_type']   ?? 'study');

if (!$setName) json_response(['error' => 'Missing set_name'], 400);
if (!in_array($qType, ['trivia', 'study'])) json_response(['error' => 'Invalid q_type'], 400);

try {
    $stmt = $database->prepare("
        DELETE FROM question_seen
        WHERE question_id IN (
            SELECT id FROM study_questions WHERE set_name = ? AND q_type = ?
        )
    ");
    $stmt->execute([$setName, $qType]);
    json_response(['ok' => true, 'reset' => $stmt->rowCount(), 'set_name' => $setName, 'q_type' => $qType]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
