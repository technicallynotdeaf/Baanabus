<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$input  = json_decode(file_get_contents('php://input'), true);
$taskId = (int)($input['task_id'] ?? 0);
$action = $input['action'] ?? '';

if (!$taskId || !$action) json_response(['error' => 'Missing task_id or action'], 400);

try {
    switch ($action) {
        case 'stuck':
            vaultUpdateTask($taskId, [
                'stuck'         => true,
                'stuck_at'      => date('c'),
                'snoozed_until' => date('c', strtotime('tomorrow 08:00')),
            ]);
            json_response(['ok' => true]);

        case 'snooze':
            $when = $input['when'] ?? '2h';
            $until = match ($when) {
                '2h'      => strtotime('+2 hours'),
                'tonight' => strtotime('today 20:00'),
                'tomorrow' => strtotime('tomorrow 08:00'),
                'week'    => strtotime('+7 days 08:00'),
                default   => strtotime('+2 hours'),
            };
            if ($when === 'tonight' && $until <= time()) {
                $until = strtotime('tomorrow 08:00');
            }
            vaultUpdateTask($taskId, ['snoozed_until' => date('c', $until)]);
            json_response(['ok' => true]);

        default:
            json_response(['error' => 'Unknown action'], 400);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
