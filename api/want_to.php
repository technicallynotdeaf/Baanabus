<?php
/**
 * api/want_to.php
 * POST { action: 'add'|'remove'|'mark_offered'|'none', text?, id? }
 *
 * add:          Add a new item to want_to.enc.
 * remove:       Remove an item by id.
 * mark_offered: Update last_offered date on an item (called when user taps it in suggestion card).
 * none:         Record an anhedonia signal for today (user found nothing appealing).
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$action = $body['action'] ?? '';

try {
    if ($action === 'add') {
        $text = mb_substr(trim($body['text'] ?? ''), 0, 200);
        if (!$text) json_response(['error' => 'Text required'], 400);
        $id = addWantToItem($text);
        json_response(['ok' => true, 'id' => $id]);
    }

    if ($action === 'remove') {
        $id   = (int)($body['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $data          = getWantTo();
        $data['items'] = array_values(array_filter($data['items'], fn($i) => (int)$i['id'] !== $id));
        saveWantTo($data);
        json_response(['ok' => true]);
    }

    if ($action === 'mark_offered') {
        $id   = (int)($body['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $data = getWantTo();
        foreach ($data['items'] as &$item) {
            if ((int)$item['id'] === $id) { $item['last_offered'] = date('Y-m-d'); break; }
        }
        unset($item);
        saveWantTo($data);
        json_response(['ok' => true]);
    }

    if ($action === 'none') {
        $today  = date('Y-m-d');
        $entry  = getDiaryEntry($today);
        $count  = (int)($entry['want_to_nones'] ?? 0) + 1;
        saveDiaryEntry($today, ['want_to_nones' => $count]);
        json_response(['ok' => true, 'nones_today' => $count]);
    }

    json_response(['error' => "Unknown action '$action'"], 400);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
