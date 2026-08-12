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

    // Recalculate bucket after 4+ attempts (see CLAUDE.md bucketing design).
    // bucket=mastered: 100%, revise: 70-99%, cram: <70%.
    // With exactly 3 attempts, 70% threshold is unreachable (2/3=67%), so 4 is
    // the minimum before bucketing. Subsequent answers keep updating the bucket.
    $row = $database->prepare("SELECT seen_count, correct_count FROM question_seen WHERE question_id = ?");
    $row->execute([$id]);
    $stats = $row->fetch(PDO::FETCH_ASSOC);
    if ($stats && (int)$stats['seen_count'] >= 4) {
        $rate   = (int)$stats['correct_count'] / (int)$stats['seen_count'];
        $bucket = $rate >= 1.0 ? 'mastered' : ($rate >= 0.7 ? 'revise' : 'cram');
        $database->prepare("UPDATE question_seen SET bucket = ? WHERE question_id = ?")
                 ->execute([$bucket, $id]);
    }

    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
