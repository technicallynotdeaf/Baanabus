<?php
/**
 * api/person_action.php
 * POST { person_id, action: 'mark_reviewed'|'snooze'|'archive'|'unarchive'|'add_note', days?: int, note_content?: string }
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body     = json_decode(file_get_contents('php://input'), true) ?? [];
$personId = (int)($body['person_id'] ?? 0);
$action   = $body['action'] ?? '';

if (!$personId) json_response(['error' => 'Missing person_id'], 400);

$allowed = ['mark_reviewed', 'snooze', 'archive', 'unarchive', 'add_note'];
if (!in_array($action, $allowed, true)) {
    json_response(['error' => "Unknown action '$action'"], 400);
}

try {
    if ($action === 'mark_reviewed') {
        $people   = getPeople();
        $person   = null;
        foreach ($people['people'] as $p) {
            if ((int)$p['person_id'] === $personId) { $person = $p; break; }
        }
        if (!$person) json_response(['error' => 'Person not found'], 404);
        $interval    = max(1, (int)($person['review_interval'] ?? 30));
        $next_review = date('Y-m-d', strtotime("+{$interval} days"));
        vaultUpdatePerson($personId, ['next_review' => $next_review]);
        json_response(['ok' => true, 'next_review' => $next_review]);

    } elseif ($action === 'snooze') {
        $days        = max(1, min(365, (int)($body['days'] ?? 7)));
        $next_review = date('Y-m-d', strtotime("+{$days} days"));
        vaultUpdatePerson($personId, ['next_review' => $next_review]);
        json_response(['ok' => true, 'next_review' => $next_review]);

    } elseif ($action === 'archive') {
        vaultUpdatePerson($personId, ['is_active' => 0]);
        json_response(['ok' => true]);

    } elseif ($action === 'unarchive') {
        vaultUpdatePerson($personId, ['is_active' => 1]);
        json_response(['ok' => true]);

    } elseif ($action === 'add_note') {
        $contents = trim($body['note_content'] ?? '');
        if ($contents === '')          json_response(['error' => 'Note content required'], 400);
        if (mb_strlen($contents) > 2000) json_response(['error' => 'Note too long (max 2000 chars)'], 400);
        $noteId = vaultAddPeopleNote($personId, $contents);
        json_response(['ok' => true, 'note_id' => $noteId]);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
