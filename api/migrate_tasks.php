<?php
/**
 * api/migrate_tasks.php — one-off vault task import from CSV
 * Requires: authenticated session + vault unlocked
 * CSV must be at /tmp/csv_migration/tasks.csv on the server
 * Writes /tmp/csv_migration/tasks.done after success to prevent re-running
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

$doneFlag = '/tmp/csv_migration/tasks.done';
if (file_exists($doneFlag)) {
    json_response(['error' => 'Already done', 'done_at' => trim(file_get_contents($doneFlag))], 409);
}

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$csvPath = '/tmp/csv_migration/tasks.csv';
if (!file_exists($csvPath)) {
    json_response(['error' => "tasks.csv not found at $csvPath"], 404);
}

// Read CSV
$handle  = fopen($csvPath, 'r');
$headers = fgetcsv($handle);
$csvRows = [];
while (($row = fgetcsv($handle)) !== false) {
    if (count($row) === count($headers)) {
        $csvRows[] = array_combine($headers, $row);
    }
}
fclose($handle);

if (!$csvRows) json_response(['error' => 'CSV is empty or unreadable'], 400);

// Map old integer urgency (0-5,99) to vault string urgency
function mapUrgency(string $v): string {
    $i = (int)$v;
    if ($i >= 5) return 'high';
    if ($i >= 3) return 'medium';
    return 'low';
}

// Load current vault
$data        = getTasks();
$existingIds = array_flip(array_column($data['tasks'], 'id'));
$today       = date('Y-m-d');

$imported = 0;
$skipped  = 0;

foreach ($csvRows as $row) {
    $id = (int)($row['task_id'] ?? 0);
    if (!$id) { $skipped++; continue; }

    if (isset($existingIds[$id])) { $skipped++; continue; }

    $showAfter    = $row['show_after'] ?? '';
    $snoozedUntil = ($showAfter && $showAfter > $today) ? $showAfter : null;

    $data['tasks'][] = [
        'id'               => $id,
        'title'            => $row['task_title']    ?? '',
        'task_type'        => $row['task_type']     ?: 'next_action',
        'urgency'          => mapUrgency($row['task_urgency'] ?? '0'),
        'energy'           => 'medium',
        'status'           => ($row['completed'] ?? 0) ? 'complete' : 'active',
        'completed_at'     => ($row['completed_at'] ?? '') ?: null,
        'snoozed_until'    => $snoozedUntil,
        'created_at'       => ($row['created_at']   ?? '') ?: date('c'),
        'context'          => ($row['context']      ?? '') ?: null,
        'habitica_id'      => ($row['habitica_id']  ?? '') ?: null,
        'parent_id'        => ($row['parent_task']  ?? '') ? (int)$row['parent_task'] : null,
        'person_id'        => ($row['person_id']    ?? '') !== '' ? (int)$row['person_id'] : null,
        'buy_from'         => ($row['buy_from']     ?? '') ?: null,
        'tags'             => ($row['tags']         ?? '') ?: null,
        'deadline'         => ($row['deadline']     ?? '') ?: null,
        'description'      => ($row['description']  ?? '') ?: null,
        'prereq_tasks'     => ($row['prereq_tasks'] ?? '') ?: null,
    ];
    $existingIds[$id] = true;
    $imported++;
}

// Keep pages/books, update next_id
$allIds         = array_column($data['tasks'], 'id');
$data['next_id'] = max(array_merge([$data['next_id'] ?? 1], $allIds)) + 1;

saveTasks($data);
file_put_contents($doneFlag, date('c'));

json_response([
    'ok'       => true,
    'imported' => $imported,
    'skipped'  => $skipped,
    'total'    => count($data['tasks']),
    'next_id'  => $data['next_id'],
]);
