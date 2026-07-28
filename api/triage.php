<?php
/**
 * api/triage.php — process an inbox triage decision
 * POST {
 *   task_id,
 *   action: 'next_action'|'someday'|'project'|'delete'|'reference'|'waiting_start',
 *   title?: string,
 *   urgency?: 'low'|'medium'|'high',
 *   time?: '5min'|'15min'|'60min'|'hours',
 *   context?: string,
 *   scheduled_date?: 'YYYY-MM-DD' or 'YYYY-MM-DDTHH:MM',
 *   first_step?: string,   // project only
 * }
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$taskId = (int)($body['task_id'] ?? 0);
$action = $body['action'] ?? '';

if (!$taskId) json_response(['error' => 'Missing task_id'], 400);

$allowed = ['next_action', 'someday', 'project', 'delete', 'mark_actionable', 'save_time', 'save_energy', 'save_context', 'save_urgency', 'save_importance', 'quick_win', 'reference', 'waiting_start'];
if (!in_array($action, $allowed, true)) {
    json_response(['error' => "Unknown action '$action'"], 400);
}

$newTitle = trim($body['title'] ?? '');
$urgency  = in_array($body['urgency'] ?? '', ['low', 'medium', 'high'], true) ? $body['urgency'] : null;
$timeRaw  = $body['time'] ?? null;
$time     = (is_int($timeRaw) || ctype_digit((string)$timeRaw)) && (int)$timeRaw > 0 ? (int)$timeRaw : null;

$pipResult = null;

try {
    if ($action === 'save_urgency') {
        $urg = $body['urgency'] ?? null;
        if (!in_array($urg, ['low', 'medium', 'high'], true)) $urg = 'medium';
        $pipResult = vaultUpdateTask($taskId, ['urgency' => $urg])['pip'] ?? null;

    } elseif ($action === 'save_importance') {
        $imp = $body['importance'] ?? null;
        if (!in_array($imp, ['low', 'medium', 'high'], true)) $imp = 'medium';
        $pipResult = vaultUpdateTask($taskId, ['importance' => $imp])['pip'] ?? null;

    } elseif ($action === 'save_energy') {
        $energy = $body['energy'] ?? ' ';
        if (!in_array($energy, ['low', 'medium', 'high', ' '], true)) $energy = ' ';
        $pipResult = vaultUpdateTask($taskId, ['energy' => $energy])['pip'] ?? null;

    } elseif ($action === 'save_context') {
        $context = isset($body['context']) ? trim((string)$body['context']) : '';
        $pipResult = vaultUpdateTask($taskId, ['context' => $context !== '' ? $context : ' '])['pip'] ?? null;

    } elseif ($action === 'quick_win') {
        $pipResult = vaultUpdateTask($taskId, ['triage_actionable' => true, 'task_type' => 'next_action'])['pip'] ?? null;

    } elseif ($action === 'reference') {
        // GTD "Reference" endpoint — worth keeping, nothing to do. No further
        // triage questions needed (no urgency/energy/context for something
        // that isn't actionable).
        $pipResult = vaultUpdateTask($taskId, ['task_type' => 'reference'])['pip'] ?? null;

    } elseif ($action === 'waiting_start') {
        // GTD "Waiting For" endpoint. person_id is optional (not every
        // waiting-on is a tracked person — could be a delivery, a reply from
        // an org, etc). "when" is a check-back interval, not a hard deadline —
        // pick_waiting_followup() in next_activity.php surfaces it once it
        // passes, as a dedicated "still waiting?" prompt rather than treating
        // it like an ordinary snoozed task.
        $personId = isset($body['person_id']) && $body['person_id'] !== '' ? (int)$body['person_id'] : null;
        $fields = [
            'task_type'     => 'waiting',
            'snoozed_until' => waitingUntilTimestamp($body['when'] ?? '1w'),
        ];
        if ($personId) $fields['person_id'] = $personId;
        $pipResult = vaultUpdateTask($taskId, $fields)['pip'] ?? null;

    } elseif ($action === 'mark_actionable') {
        vaultUpdateTask($taskId, ['triage_actionable' => true]);

    } elseif ($action === 'save_time') {
        $fields = [];
        if ($time !== null) $fields['time'] = $time;
        if ($newTitle !== '') $fields['title'] = $newTitle;
        if ($time !== null && $time <= 120) {
            // Short enough to classify directly — no first-step question needed
            $fields['task_type'] = 'next_action';
            if ($urgency !== null) $fields['urgency'] = $urgency;
        }
        if (!empty($fields)) $pipResult = vaultUpdateTask($taskId, $fields)['pip'] ?? null;

    } elseif ($action === 'delete') {
        // Read task before deleting so we can propagate to Habitica
        $dataForDel  = getTasks();
        $taskForDel  = null;
        foreach ($dataForDel['tasks'] as $t) {
            if ((int)$t['id'] === $taskId) { $taskForDel = $t; break; }
        }
        $fields = ['status' => 'deleted'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency'] = $urgency;
        $pipResult = vaultUpdateTask($taskId, $fields)['pip'] ?? null;
        // Delete from Habitica (best-effort)
        if ($taskForDel && !empty($taskForDel['habitica_id'])) {
            try {
                $cfg = getConfig() ?? [];
                if (!empty($cfg['preferences']['uses_habitica'])) {
                    require_once __DIR__ . '/habitica_helper.php';
                    $cass    = getCassowary();
                    $habUser = $cass['habitica']['user_id'] ?? '';
                    $habKey  = $cass['habitica']['api_key']  ?? '';
                    if ($habUser && $habKey) {
                        if (!empty($taskForDel['habitica_item_id'])) {
                            habiticaRequest('DELETE', "/tasks/{$taskForDel['habitica_id']}/checklist/{$taskForDel['habitica_item_id']}", $habUser, $habKey);
                        } else {
                            habiticaRequest('DELETE', "/tasks/{$taskForDel['habitica_id']}", $habUser, $habKey);
                        }
                    }
                }
            } catch (Throwable $e) {
                // non-fatal
            }
        }

    } elseif ($action === 'someday') {
        $fields = ['task_type' => 'someday'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency'] = $urgency;
        if ($time !== null)    $fields['time']    = $time;
        $pipResult = vaultUpdateTask($taskId, $fields)['pip'] ?? null;

    } elseif ($action === 'next_action') {
        $fields = ['task_type' => 'next_action'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency'] = $urgency;
        if ($time !== null)    $fields['time']    = $time;
        $context = trim($body['context'] ?? '') ?: null;
        if ($context !== null) $fields['context'] = $context;
        $date = trim($body['scheduled_date'] ?? '');
        if ($date) {
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                if ($date >= date('Y-m-d')) $fields['snoozed_until'] = $date . 'T08:00:00';
            } elseif (preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}/', $date)) {
                $fields['snoozed_until'] = $date;
            }
        }
        $pipResult = vaultUpdateTask($taskId, $fields)['pip'] ?? null;

    } elseif ($action === 'project') {
        $fields = ['task_type' => 'project'];
        if ($newTitle !== '')  $fields['title']   = $newTitle;
        if ($urgency !== null) $fields['urgency'] = $urgency;
        if ($time !== null)    $fields['time']    = $time;
        $pipResult = vaultUpdateTask($taskId, $fields)['pip'] ?? null;

        $firstStep = trim($body['first_step'] ?? '');
        if ($firstStep !== '' && mb_strlen($firstStep) <= 300) {
            $data   = getTasks();
            $stepId = (int)($data['next_id'] ?? 1);
            vaultAppendTask($data, [
                'id'            => $stepId,
                'title'         => $firstStep,
                'task_type'     => 'next_action',
                'urgency'       => $urgency ?? 'medium',
                'importance'    => 'medium',
                'energy'        => 'medium',
                'status'        => 'active',
                'context'       => null,
                'created_at'    => date('c'),
                'snoozed_until' => null,
                'parent_id'     => $taskId,
                'person_id'     => null,
                'deadline'      => null,
                'tags'          => null,
                'description'   => null,
            ]);
            $data['next_id'] = $stepId + 1;
            saveTasks($data);
            try { creditTop3Progress('subtask_break', 1); } catch (Throwable $e) {}
        }
    }

    // Habitica: sync time tag on existing tasks + push new next_actions
    $isPushCandidate = in_array($action, ['quick_win', 'next_action'], true)
        || ($action === 'save_time' && $time !== null && $time <= 120);
    // reference/waiting_start never carry a time and never create a new
    // Habitica todo (the opposite of "actionable"), but should still push
    // updated metadata notes to an existing todo, same as save_context etc.
    $isNotesOnly = in_array($action, ['reference', 'waiting_start'], true);

    if (($time !== null && $action !== 'delete') || $isPushCandidate || $isNotesOnly) {
        try {
            $data = getTasks();
            $task = null;
            foreach ($data['tasks'] as $t) {
                if ((int)$t['id'] === $taskId) { $task = $t; break; }
            }
            if ($task) {
                $habId = $task['habitica_id'] ?? null;
                $cfg   = getConfig() ?? [];
                if (!empty($cfg['preferences']['uses_habitica'])) {
                    require_once __DIR__ . '/habitica_helper.php';
                    $cass    = getCassowary();
                    $habUser = $cass['habitica']['user_id'] ?? '';
                    $habKey  = $cass['habitica']['api_key']  ?? '';
                    if ($habUser && $habKey) {
                        if ($time !== null && $action !== 'delete' && $habId) {
                            habiticaSyncTimeTag($habId, $time, $habUser, $habKey);
                        }
                        if ($isPushCandidate && !$habId && empty($task['parent_id'])) {
                            $created = habiticaRequest('POST', '/tasks/user', $habUser, $habKey, [
                                'type'  => 'todo',
                                'text'  => $task['title'],
                                'notes' => habiticaMetaNotes($task),
                            ]);
                            if (!empty($created['id'])) {
                                vaultUpdateTask($taskId, ['habitica_id' => $created['id']]);
                            }
                        }
                        // Push metadata notes for existing tasks when relevant fields change
                        $notesActions = ['save_urgency', 'save_importance', 'save_context', 'next_action', 'someday',
                                         'project', 'quick_win', 'save_time', 'mark_actionable', 'reference', 'waiting_start'];
                        if ($habId && empty($task['habitica_item_id']) && in_array($action, $notesActions, true)) {
                            habiticaPushNotes($habId, $task, $habUser, $habKey);
                        }
                    }
                }
            }
        } catch (Throwable $e) {
            // non-fatal — vault already saved
        }
    }

    $resp = ['ok' => true, 'top3_completed' => top3DrainCompleted()];
    if ($pipResult) $resp['pip'] = $pipResult;
    json_response($resp);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
