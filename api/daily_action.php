<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body    = json_decode(file_get_contents('php://input'), true) ?? [];
$dailyId = (int)($body['daily_id'] ?? 0);
$action  = $body['action'] ?? '';

if (!$dailyId) json_response(['error' => 'Missing daily_id'], 400);

$data  = getDailies();
$index = null;
foreach ($data['items'] as $i => $d) {
    if ((int)$d['id'] === $dailyId) { $index = $i; break; }
}
if ($index === null) json_response(['error' => 'Daily not found'], 404);

try {
    if ($action === 'update') {
        $item = &$data['items'][$index];

        $allowedHorizons = ['morning', 'day', 'evening'];
        $allowedFreqs    = ['daily', 'weekly'];
        $allowedLocs     = ['home', 'work', 'shops', 'phone', 'online'];
        $dayKeys         = ['su', 'm', 't', 'w', 'th', 'f', 's'];

        if (isset($body['horizon']) && in_array($body['horizon'], $allowedHorizons, true)) {
            $item['horizon'] = $body['horizon'];
            unset($item['morning']); // remove legacy bool field
        }
        if (isset($body['frequency']) && in_array($body['frequency'], $allowedFreqs, true)) {
            $item['frequency'] = $body['frequency'];
        }
        if (isset($body['everyX'])) {
            $item['everyX'] = max(1, min(30, (int)$body['everyX']));
        }
        if (isset($body['repeat']) && is_array($body['repeat'])) {
            $repeat = [];
            foreach ($dayKeys as $k) $repeat[$k] = !empty($body['repeat'][$k]);
            $item['repeat'] = $repeat;
        }
        if (array_key_exists('location', $body)) {
            $raw  = $body['location'] ?? [];
            $locs = is_array($raw) ? $raw : (is_string($raw) && $raw !== '' ? [$raw] : []);
            $item['location'] = array_values(array_filter($locs, fn($l) => in_array($l, $allowedLocs, true)));
        }
        if (array_key_exists('relevant_after', $body)) {
            $ra = trim((string)($body['relevant_after'] ?? ''));
            $item['relevant_after'] = preg_match('/^\d{2}:\d{2}$/', $ra) ? $ra : null;
        }
        if (array_key_exists('irrelevant_after', $body)) {
            $ia = trim((string)($body['irrelevant_after'] ?? ''));
            $item['irrelevant_after'] = preg_match('/^\d{2}:\d{2}$/', $ia) ? $ia : null;
        }

        saveDailies($data);
        json_response(['ok' => true]);

    } elseif ($action === 'toggle_active') {
        $current = $data['items'][$index]['is_active'] ?? true;
        $data['items'][$index]['is_active'] = !$current;
        saveDailies($data);
        json_response(['ok' => true, 'is_active' => !$current]);

    } else {
        json_response(['error' => "Unknown action '$action'"], 400);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
