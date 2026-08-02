<?php
/**
 * api/person_action.php
 * POST { person_id, action: 'mark_reviewed'|'snooze'|'archive'|'unarchive'|'add_note'|'edit_note'|'delete_note',
 *        days?: int, note_content?: string, note_id?: int }
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

$allowed = ['mark_reviewed', 'snooze', 'archive', 'unarchive', 'add_note', 'edit_note', 'delete_note', 'update_qualities', 'update_interval'];
if (!in_array($action, $allowed, true)) {
    json_response(['error' => "Unknown action '$action'"], 400);
}

// Spread reviews evenly across the interval window for people sharing the same interval.
// Earliest reminder = 80% of interval (e.g. day 72 of a 90-day interval); latest = interval.
function scheduleNextReview(int $excludeId, int $interval): string {
    $people = getPeople()['people'];
    $counts = [];
    foreach ($people as $p) {
        if ((int)$p['person_id'] === $excludeId) continue;
        if ((int)($p['review_interval'] ?? 30) !== $interval) continue;
        if (($p['is_active'] ?? 1) == 0) continue;
        $nr = $p['next_review'] ?? null;
        if ($nr) $counts[$nr] = ($counts[$nr] ?? 0) + 1;
    }
    $minDay = max(1, (int)floor($interval * 0.8));
    $maxDay = (int)ceil($interval * 1.5);
    $best = null; $bestCount = PHP_INT_MAX;
    for ($i = $minDay; $i <= $maxDay; $i++) {
        $d = date('Y-m-d', strtotime("+{$i} days"));
        $c = $counts[$d] ?? 0;
        if ($c < $bestCount) { $bestCount = $c; $best = $d; }
    }
    return $best ?? date('Y-m-d', strtotime("+{$maxDay} days"));
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
        $next_review = scheduleNextReview($personId, $interval);
        vaultUpdatePerson($personId, ['next_review' => $next_review]);
        try { creditTop3Progress('person_review', 1); } catch (Throwable $e) {}
        json_response(['ok' => true, 'next_review' => $next_review, 'top3_completed' => top3DrainCompleted()]);

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

    } elseif ($action === 'update_qualities') {
        $char1    = mb_substr(trim($body['char1']    ?? ''), 0, 100);
        $char2    = mb_substr(trim($body['char2']    ?? ''), 0, 100);
        $char3    = mb_substr(trim($body['char3']    ?? ''), 0, 100);
        $lifeNote = mb_substr(trim($body['life_note'] ?? ''), 0, 2000);
        $interval = max(1, min(365, (int)($body['review_interval'] ?? 30)));

        $fields = ['review_interval' => $interval,
                   'next_review'     => scheduleNextReview($personId, $interval)];
        if ($char1 !== '') $fields['char1'] = $char1;
        if ($char2 !== '') $fields['char2'] = $char2;
        if ($char3 !== '') $fields['char3'] = $char3;

        vaultUpdatePerson($personId, $fields);
        try { creditTop3Progress('person_review', 1); } catch (Throwable $e) {}
        if ($lifeNote !== '') {
            vaultAddPeopleNote($personId, $lifeNote);
            try { creditTop3Progress('person_note', 1); } catch (Throwable $e) {}
        }
        json_response(['ok' => true, 'next_review' => $fields['next_review'], 'top3_completed' => top3DrainCompleted()]);

    } elseif ($action === 'update_interval') {
        $interval    = max(1, min(365, (int)($body['days'] ?? 30)));
        $next_review = scheduleNextReview($personId, $interval);
        vaultUpdatePerson($personId, ['review_interval' => $interval, 'next_review' => $next_review]);
        json_response(['ok' => true, 'next_review' => $next_review]);

    } elseif ($action === 'add_note') {
        $contents = trim($body['note_content'] ?? '');
        if ($contents === '')          json_response(['error' => 'Note content required'], 400);
        if (mb_strlen($contents) > 2000) json_response(['error' => 'Note too long (max 2000 chars)'], 400);
        $noteId = vaultAddPeopleNote($personId, $contents);
        try { creditTop3Progress('person_note', 1); } catch (Throwable $e) {}
        json_response(['ok' => true, 'note_id' => $noteId, 'top3_completed' => top3DrainCompleted()]);

    } elseif ($action === 'edit_note') {
        $noteId   = (int)($body['note_id'] ?? 0);
        $contents = trim($body['note_content'] ?? '');
        if (!$noteId)                   json_response(['error' => 'Missing note_id'], 400);
        if ($contents === '')          json_response(['error' => 'Note content required'], 400);
        if (mb_strlen($contents) > 2000) json_response(['error' => 'Note too long (max 2000 chars)'], 400);
        $updated = vaultUpdatePeopleNote($noteId, $contents);
        if (!$updated) json_response(['error' => 'Note not found'], 404);
        json_response(['ok' => true, 'note_id' => $noteId]);

    } elseif ($action === 'delete_note') {
        $noteId = (int)($body['note_id'] ?? 0);
        if (!$noteId) json_response(['error' => 'Missing note_id'], 400);
        $deleted = vaultDeletePeopleNote($noteId);
        if (!$deleted) json_response(['error' => 'Note not found'], 404);
        json_response(['ok' => true, 'note_id' => $noteId]);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
