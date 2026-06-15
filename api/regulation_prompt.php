<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$in     = json_decode(file_get_contents('php://input'), true) ?? [];
$action = $in['action'] ?? '';

try {
    $reg = getRegulation();

    if ($action === 'disable') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        if (!in_array($id, $reg['disabled_defaults'])) {
            $reg['disabled_defaults'][] = $id;
        }
        saveRegulation($reg);
        json_response(['ok' => true]);

    } elseif ($action === 'enable') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $reg['disabled_defaults'] = array_values(array_filter(
            $reg['disabled_defaults'], fn($x) => $x !== $id
        ));
        saveRegulation($reg);
        json_response(['ok' => true]);

    } elseif ($action === 'add_custom') {
        $text = trim($in['text'] ?? '');
        if (!$text) json_response(['error' => 'Missing text'], 400);
        if (mb_strlen($text) > 400) json_response(['error' => 'Too long (max 400 chars)'], 400);
        $newItem = ['id' => (int)($reg['next_custom_id'] ?? 1), 'text' => $text];
        $reg['custom'][]        = $newItem;
        $reg['next_custom_id']  = $newItem['id'] + 1;
        saveRegulation($reg);
        json_response(['ok' => true, 'id' => $newItem['id']]);

    } elseif ($action === 'delete_custom') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $reg['custom'] = array_values(array_filter(
            $reg['custom'], fn($c) => (int)$c['id'] !== $id
        ));
        saveRegulation($reg);
        json_response(['ok' => true]);

    } elseif ($action === 'reset') {
        $reg['disabled_defaults'] = [];
        saveRegulation($reg);
        json_response(['ok' => true]);

    } elseif ($action === 'list') {
        // Returns full list for settings UI
        $defaults = require __DIR__ . '/../content/regulation_prompts.php';
        json_response([
            'ok'       => true,
            'defaults' => $defaults,
            'disabled' => $reg['disabled_defaults'],
            'custom'   => $reg['custom'] ?? [],
        ]);

    } else {
        json_response(['error' => 'Unknown action'], 400);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
