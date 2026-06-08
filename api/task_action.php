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

        case 'blocked':
            $reason = $input['reason'] ?? '';
            switch ($reason) {
                case 'wrong_place':
                    vaultUpdateTask($taskId, ['snoozed_until' => date('c', strtotime('+4 hours'))]);
                    break;
                case 'low_energy':
                    vaultUpdateTask($taskId, [
                        'energy'        => 'high',
                        'snoozed_until' => date('c', strtotime('tomorrow 08:00')),
                    ]);
                    break;
                case 'no_time':
                    vaultUpdateTask($taskId, ['snoozed_until' => date('c', strtotime('+4 hours'))]);
                    break;
                case 'waiting_on':
                    vaultUpdateTask($taskId, [
                        'stuck'         => true,
                        'stuck_at'      => date('c'),
                        'snoozed_until' => date('c', strtotime('tomorrow 08:00')),
                    ]);
                    break;
                case 'too_vague':
                    // Return to inbox for re-triage
                    vaultUpdateTask($taskId, [
                        'task_type'        => 'inbox',
                        'triage_actionable'=> false,
                        'time'             => null,
                        'snoozed_until'    => null,
                        'stuck'            => false,
                    ]);
                    break;
                case 'waiting_date':
                    $until = $input['until'] ?? null;
                    if (!$until || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $until)) {
                        json_response(['error' => 'Invalid date'], 400);
                    }
                    vaultUpdateTask($taskId, ['snoozed_until' => date('c', strtotime($until . ' 08:00'))]);
                    break;
                default:
                    json_response(['error' => 'Unknown blocked reason'], 400);
            }
            json_response(['ok' => true]);

        case 'snooze':
            $when = $input['when'] ?? 'tomorrow';
            if ($when === 'payday') {
                $cfg = getConfig() ?? [];
                $paydayDay = max(1, min(28, (int)($cfg['preferences']['payday_day'] ?? 1)));
                $dt = new DateTime('first day of next month');
                $dt->setDate((int)$dt->format('Y'), (int)$dt->format('m'), $paydayDay);
                $dt->setTime(8, 0, 0);
                $until = $dt->getTimestamp();
            } elseif ($when === '2months') {
                $until = strtotime('+2 months 08:00');
            } elseif ($when === '1month') {
                $until = strtotime('+1 month 08:00');
            } elseif (preg_match('/^\d{4}-\d{2}-\d{2}$/', $when)) {
                $until = strtotime($when . ' 08:00');
            } else {
                $until = match ($when) {
                    'tonight'  => strtotime('today 20:00'),
                    'tomorrow' => strtotime('tomorrow 08:00'),
                    'week'     => strtotime('+7 days 08:00'),
                    '2h'       => strtotime('+2 hours'),
                    default    => strtotime('tomorrow 08:00'),
                };
                if ($when === 'tonight' && $until <= time()) {
                    $until = strtotime('tomorrow 08:00');
                }
            }
            vaultUpdateTask($taskId, ['snoozed_until' => date('c', $until)]);
            json_response(['ok' => true]);

        case 'someday':
            vaultUpdateTask($taskId, [
                'task_type'     => 'someday',
                'snoozed_until' => null,
                'stuck'         => false,
            ]);
            json_response(['ok' => true]);

        case 'wake':
            vaultUpdateTask($taskId, ['snoozed_until' => null, 'stuck' => false]);
            json_response(['ok' => true]);

        case 'rate_importance':
            $importance = $input['importance'] ?? null;
            if (!in_array($importance, ['low', 'medium', 'high'], true))
                json_response(['error' => 'Invalid importance value'], 400);
            vaultUpdateTask($taskId, ['importance' => $importance]);
            json_response(['ok' => true]);

        case 'rate_urgency':
            $urgency = $input['urgency'] ?? null;
            if (!in_array($urgency, ['low', 'medium', 'high'], true))
                json_response(['error' => 'Invalid urgency value'], 400);
            vaultUpdateTask($taskId, ['urgency' => $urgency, 'urgency_set' => true]);
            json_response(['ok' => true]);

        default:
            json_response(['error' => 'Unknown action'], 400);
    }
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
