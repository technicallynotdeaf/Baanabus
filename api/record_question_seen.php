<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!$database)         json_response(['error' => 'No database'], 500);

$id      = (int)($_POST['id']      ?? 0);
$correct = (int)($_POST['correct'] ?? 0);

if (!$id) json_response(['error' => 'Missing id'], 400);

try {
    $database->prepare("
        INSERT INTO question_seen (question_id, seen_count, correct_count, last_seen)
        VALUES (?, 1, ?, CURRENT_TIMESTAMP)
        ON CONFLICT(question_id) DO UPDATE SET
            seen_count    = seen_count + 1,
            correct_count = correct_count + excluded.correct_count,
            last_seen     = CURRENT_TIMESTAMP
    ")->execute([$id, $correct]);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
