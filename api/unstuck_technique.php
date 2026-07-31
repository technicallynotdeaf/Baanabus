<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $technique = pickUnstuckTechnique();
    if (!$technique) json_response(['error' => 'No techniques available'], 404);
    json_response([
        'ok'        => true,
        'id'        => $technique['id'],
        'kind'      => $technique['kind'] ?? 'nudge',
        'text'      => $technique['text'],
        'seconds'   => $technique['seconds'] ?? null,
        'is_custom' => !empty($technique['is_custom']),
    ]);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'GET or POST only'], 405);

$in     = json_decode(file_get_contents('php://input'), true) ?? [];
$action = $in['action'] ?? '';

try {
    $u = getUnstuck();

    if ($action === 'disable') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        if (!in_array($id, $u['disabled_defaults'])) {
            $u['disabled_defaults'][] = $id;
        }
        saveUnstuck($u);
        json_response(['ok' => true]);

    } elseif ($action === 'enable') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $u['disabled_defaults'] = array_values(array_filter(
            $u['disabled_defaults'], fn($x) => $x !== $id
        ));
        saveUnstuck($u);
        json_response(['ok' => true]);

    } elseif ($action === 'add_custom') {
        $text = trim($in['text'] ?? '');
        if (!$text) json_response(['error' => 'Missing text'], 400);
        if (mb_strlen($text) > 400) json_response(['error' => 'Too long (max 400 chars)'], 400);
        $newItem = ['id' => (int)($u['next_custom_id'] ?? 1), 'text' => $text];
        $u['custom'][]        = $newItem;
        $u['next_custom_id']  = $newItem['id'] + 1;
        saveUnstuck($u);
        json_response(['ok' => true, 'id' => $newItem['id']]);

    } elseif ($action === 'delete_custom') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $u['custom'] = array_values(array_filter(
            $u['custom'], fn($c) => (int)$c['id'] !== $id
        ));
        saveUnstuck($u);
        json_response(['ok' => true]);

    } elseif ($action === 'reset') {
        $u['disabled_defaults'] = [];
        saveUnstuck($u);
        json_response(['ok' => true]);

    } elseif ($action === 'list') {
        $defaults = require __DIR__ . '/../content/unstuck_techniques.php';
        json_response([
            'ok'       => true,
            'defaults' => $defaults,
            'disabled' => $u['disabled_defaults'],
            'custom'   => $u['custom'] ?? [],
        ]);

    } else {
        json_response(['error' => 'Unknown action'], 400);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
