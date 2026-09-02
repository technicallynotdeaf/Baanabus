<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$month = $_GET['month'] ?? date('Y-m');
if (!preg_match('/^\d{4}-\d{2}$/', $month)) json_response(['error' => 'Invalid month'], 400);

try {
    $all = getTasks()['tasks'];

    $scheduled = array_values(array_filter($all, fn($t) =>
        $t['status'] !== 'deleted' &&
        !empty($t['scheduled_date']) &&
        str_starts_with($t['scheduled_date'], $month)
    ));
    $scheduled = array_map(fn($t) => [
        'id'             => (int)$t['id'],
        'title'          => $t['title'],
        'scheduled_date' => $t['scheduled_date'],
        'urgency'        => $t['urgency'] ?? null,
        'status'         => $t['status'],
    ], $scheduled);

    $snoozed = array_values(array_filter($all, fn($t) =>
        $t['status'] === 'active' &&
        !empty($t['snoozed_until']) &&
        str_starts_with(substr($t['snoozed_until'], 0, 10), $month)
    ));
    $snoozed = array_map(fn($t) => [
        'id'             => (int)$t['id'],
        'title'          => $t['title'],
        'scheduled_date' => substr($t['snoozed_until'], 0, 10),
        'urgency'        => $t['urgency'] ?? null,
        'status'         => $t['status'],
        'snoozed'        => true,
    ], $snoozed);

    $tasks = array_merge($scheduled, $snoozed);

    $birthdays = [];
    try { $birthdays = getBirthdaysInMonth($month); } catch (Throwable $e) {}

    $events = [];
    try {
        $eventsData = getEvents();
        $events = array_values(array_filter($eventsData['events'] ?? [], fn($e) =>
            !empty($e['date']) && str_starts_with($e['date'], $month)
        ));
        $events = array_map(fn($e) => [
            'id'           => (int)$e['id'],
            'title'        => $e['title'],
            'date'         => $e['date'],
            'time_start'   => $e['time_start'] ?? null,
            'time_end'     => $e['time_end'] ?? null,
            'recurring'    => $e['recurring'] ?? null,
            'people_ids'   => is_array($e['people_ids'] ?? null) ? $e['people_ids'] : [],
            'task_ids'     => is_array($e['task_ids'] ?? null) ? $e['task_ids'] : [],
            'prebriefed'   => !empty($e['prebriefed']),
            'debriefed'    => !empty($e['debriefed']),
        ], $events);
    } catch (Throwable $e) {}

    json_response(['ok' => true, 'month' => $month, 'tasks' => $tasks, 'birthdays' => $birthdays, 'events' => $events]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
