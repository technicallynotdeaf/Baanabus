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
    if ($action === 'check') {
        $itemId = (int)($in['id'] ?? 0);
        if (!$itemId) json_response(['error' => 'Missing id'], 400);

        $cfg        = getConfig() ?? [];
        $bedtimeCfg = $cfg['bedtime'] ?? ['enabled' => true, 'start_hour' => 21, 'end_hour' => 6];
        $hour       = (int)(new DateTime('now'))->format('H');
        $nightKey   = ($hour < (int)$bedtimeCfg['start_hour']) ? date('Y-m-d', strtotime('-1 day')) : date('Y-m-d');

        $state = $cfg['bedtime_state'][$nightKey] ?? ['checklist_done' => [], 'phase' => 'checklist'];
        if (!in_array($itemId, $state['checklist_done'], true)) {
            $state['checklist_done'][] = $itemId;
        }
        $cfg['bedtime_state'][$nightKey] = $state;

        // Prune state older than a few nights — this is transient nightly bookkeeping.
        $cutoff = date('Y-m-d', strtotime('-3 days'));
        foreach (array_keys($cfg['bedtime_state']) as $k) {
            if ($k < $cutoff) unset($cfg['bedtime_state'][$k]);
        }
        saveConfig($cfg);

        $pip = awardPip();
        json_response(array_merge(['ok' => true], $pip));

    } elseif ($action === 'disable') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $bt = getBedtimeChecklist();
        if (!in_array($id, $bt['disabled_defaults'])) {
            $bt['disabled_defaults'][] = $id;
        }
        saveBedtimeChecklist($bt);
        json_response(['ok' => true]);

    } elseif ($action === 'enable') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $bt = getBedtimeChecklist();
        $bt['disabled_defaults'] = array_values(array_filter(
            $bt['disabled_defaults'], fn($x) => $x !== $id
        ));
        saveBedtimeChecklist($bt);
        json_response(['ok' => true]);

    } elseif ($action === 'add_custom') {
        $text = trim($in['text'] ?? '');
        if (!$text) json_response(['error' => 'Missing text'], 400);
        if (mb_strlen($text) > 200) json_response(['error' => 'Too long (max 200 chars)'], 400);
        $bt      = getBedtimeChecklist();
        $newItem = ['id' => (int)($bt['next_custom_id'] ?? 1), 'text' => $text];
        $bt['custom'][]       = $newItem;
        $bt['next_custom_id'] = $newItem['id'] + 1;
        saveBedtimeChecklist($bt);
        json_response(['ok' => true, 'id' => $newItem['id']]);

    } elseif ($action === 'delete_custom') {
        $id = (int)($in['id'] ?? 0);
        if (!$id) json_response(['error' => 'Missing id'], 400);
        $bt = getBedtimeChecklist();
        $bt['custom'] = array_values(array_filter(
            $bt['custom'], fn($c) => (int)$c['id'] !== $id
        ));
        saveBedtimeChecklist($bt);
        json_response(['ok' => true]);

    } elseif ($action === 'reset') {
        $bt = getBedtimeChecklist();
        $bt['disabled_defaults'] = [];
        saveBedtimeChecklist($bt);
        json_response(['ok' => true]);

    } elseif ($action === 'list') {
        $defaults = require __DIR__ . '/../content/bedtime_checklist.php';
        $bt       = getBedtimeChecklist();
        json_response([
            'ok'       => true,
            'defaults' => $defaults,
            'disabled' => $bt['disabled_defaults'],
            'custom'   => $bt['custom'] ?? [],
        ]);

    } else {
        json_response(['error' => 'Unknown action'], 400);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
