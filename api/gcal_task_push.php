<?php
// Pushes a scheduled Baanabus task to Google Calendar as a reminder event.
// POST {task_id: N}
// Stores the returned gcal event ID on the task as gcal_event_id.
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
require_once __DIR__ . '/gcal_helper.php';

header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$input  = json_decode(file_get_contents('php://input'), true) ?? [];
$taskId = (int)($input['task_id'] ?? 0);
if (!$taskId) json_response(['error' => 'task_id required'], 400);

try {
    $data = getTasks();
    $task = null;
    foreach ($data['tasks'] as $t) {
        if ((int)$t['id'] === $taskId) { $task = $t; break; }
    }

    if (!$task)                                    json_response(['error' => 'Task not found'], 404);
    if (($task['status'] ?? '') === 'deleted')     json_response(['error' => 'Task is deleted'], 400);
    if (empty($task['scheduled_date']))            json_response(['error' => 'Task has no scheduled date'], 400);

    if (!empty($task['gcal_event_id'])) {
        json_response(['already_pushed' => true, 'gcal_event_id' => $task['gcal_event_id']]);
    }

    $cfg    = getConfig() ?? [];
    $cass   = getCassowary();
    $calId  = $cass['google']['calendar_id'] ?? 'primary';
    $tz     = $cfg['preferences']['timezone'] ?? 'UTC';

    $accessToken = gcalGetAccessToken();

    // Build event body — timed if relevant_after set, all-day otherwise
    $timeStart = $task['relevant_after'] ?? null;
    if ($timeStart) {
        $startDt = new DateTime($task['scheduled_date'] . 'T' . $timeStart . ':00', new DateTimeZone($tz));
        $endDt   = clone $startDt;
        $endDt->modify('+1 hour');
        $eventBody = [
            'summary' => $task['title'],
            'start'   => ['dateTime' => $startDt->format(DateTime::RFC3339), 'timeZone' => $tz],
            'end'     => ['dateTime' => $endDt->format(DateTime::RFC3339), 'timeZone' => $tz],
        ];
    } else {
        // All-day: end date must be the day after for GCal all-day events
        $endDate   = date('Y-m-d', strtotime($task['scheduled_date'] . ' +1 day'));
        $eventBody = [
            'summary' => $task['title'],
            'start'   => ['date' => $task['scheduled_date']],
            'end'     => ['date' => $endDate],
        ];
    }

    if (!empty($task['description'])) {
        $eventBody['description'] = $task['description'];
    }

    $gcalEventId = gcalCreateEvent($accessToken, $calId, $eventBody);

    // Write gcal_event_id directly onto the task (system-only field, not in
    // updateTaskFieldsShared's user-editable allowlist)
    foreach ($data['tasks'] as &$t) {
        if ((int)$t['id'] === $taskId) {
            $t['gcal_event_id'] = $gcalEventId;
            break;
        }
    }
    unset($t);
    saveTasks($data);

    json_response(['ok' => true, 'gcal_event_id' => $gcalEventId]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
