<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST required'], 405);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$roomId = $body['room_id'] ?? null;
$rawItems = (array)($body['items'] ?? []);

if ($roomId === null) json_response(['error' => 'Missing room_id'], 400);

// Each item: {label, location}
$items = array_slice(array_values(array_filter($rawItems, fn($i) => trim($i['label'] ?? '') !== '')), 0, 5);

try {
    $data  = getPhysicalObjects();
    $rooms = $data['rooms'] ?? [['id' => 1, 'name' => 'livingroom', 'label' => 'Living Room']];

    $roomExists = false;
    foreach ($rooms as $r) {
        if ($r['id'] == $roomId) { $roomExists = true; break; }
    }
    if (!$roomExists) json_response(['error' => 'Room not found'], 404);

    $added = 0;
    foreach ($items as $item) {
        $label    = mb_substr(trim($item['label']    ?? ''), 0, 200);
        $location = mb_substr(trim($item['location'] ?? ''), 0, 200);
        if ($label === '') continue;
        $id = (int)($data['next_id'] ?? 1);
        $data['objects'][] = [
            'id'         => $id,
            'label'      => $label,
            'location'   => $location !== '' ? $location : null,
            'room_id'    => (int)$roomId,
            'task_id'    => null,
            'status'     => 'out',
            'created_at' => date('c'),
        ];
        $data['next_id'] = $id + 1;
        $added++;
    }

    if (!isset($data['room_scan_dates'])) $data['room_scan_dates'] = [];
    $data['room_scan_dates'][$roomId] = date('Y-m-d');

    savePhysicalObjects($data);
    try { creditTop3Progress('room_scan', 1); } catch (Throwable $e) {}
    json_response(['ok' => true, 'added' => $added, 'top3_completed' => top3DrainCompleted()]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
