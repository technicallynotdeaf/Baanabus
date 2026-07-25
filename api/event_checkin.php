<?php
/**
 * api/event_checkin.php — pre-brief / debrief check-ins for person-linked scheduled tasks
 * POST { action: 'prebrief', task_id, person_id, energy: 1-5 }
 * POST { action: 'debrief',  task_id }
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$action = $body['action'] ?? '';
$taskId = (int)($body['task_id'] ?? 0);

if (!$taskId) json_response(['error' => 'Missing task_id'], 400);
if (!in_array($action, ['prebrief', 'debrief'], true)) {
    json_response(['error' => "Unknown action '$action'"], 400);
}

try {
    $today = date('Y-m-d');

    if ($action === 'prebrief') {
        $energy   = (int)($body['energy'] ?? 0);
        $personId = (int)($body['person_id'] ?? 0);
        if ($energy < 1 || $energy > 5) json_response(['error' => 'energy must be 1-5'], 400);

        $entry = getDiaryEntry($today);
        $list  = $entry['event_prebriefs'] ?? [];
        $list[] = ['task_id' => $taskId, 'person_id' => $personId, 'energy' => $energy, 'at' => date('c')];
        saveDiaryEntry($today, ['event_prebriefs' => $list]);

        vaultUpdateTask($taskId, ['event_prebriefed_at' => $today]);
        json_response(['ok' => true]);
    }

    if ($action === 'debrief') {
        vaultUpdateTask($taskId, ['event_debriefed_at' => $today]);
        try { creditTop3Progress('person_review', 1); } catch (Throwable $e) {}
        json_response(['ok' => true, 'top3_completed' => top3DrainCompleted()]);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
