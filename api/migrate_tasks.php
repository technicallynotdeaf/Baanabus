<?php
/**
 * api/migrate_tasks.php — one-off vault migration
 * Imports: tasks (from data/tasks_import.csv), people + people_notes (from SQLite)
 * After success: clears SQLite people/notes tables, deletes CSV files, writes done flag
 * Requires authenticated session with vault unlocked. Runs once only.
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

$doneFlag = __DIR__ . '/../data/vault_migration.done';
if (file_exists($doneFlag)) {
    json_response(['error' => 'Already done', 'done_at' => trim(file_get_contents($doneFlag))], 409);
}

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$results = [];

// ---- Tasks (from CSV) -------------------------------------------------------

function mapUrgency(string $v): string {
    $i = (int)$v;
    if ($i >= 5) return 'high';
    if ($i >= 3) return 'medium';
    return 'low';
}

$tasksCsv = __DIR__ . '/../data/tasks_import.csv';
if (file_exists($tasksCsv)) {
    $handle  = fopen($tasksCsv, 'r');
    $headers = fgetcsv($handle);
    $csvRows = [];
    while (($row = fgetcsv($handle)) !== false) {
        if (count($row) === count($headers)) $csvRows[] = array_combine($headers, $row);
    }
    fclose($handle);

    $data        = getTasks();
    $existingIds = array_flip(array_column($data['tasks'], 'id'));
    $today       = date('Y-m-d');
    $imported    = 0;

    foreach ($csvRows as $row) {
        $id = (int)($row['task_id'] ?? 0);
        if (!$id || isset($existingIds[$id])) continue;

        $showAfter = $row['show_after'] ?? '';
        $data['tasks'][] = [
            'id'            => $id,
            'title'         => $row['task_title']    ?? '',
            'task_type'     => $row['task_type']      ?: 'next_action',
            'urgency'       => mapUrgency($row['task_urgency'] ?? '0'),
            'energy'        => 'medium',
            'status'        => ($row['completed'] ?? 0) ? 'complete' : 'active',
            'completed_at'  => ($row['completed_at'] ?? '') ?: null,
            'snoozed_until' => ($showAfter && $showAfter > $today) ? $showAfter : null,
            'created_at'    => ($row['created_at']   ?? '') ?: date('c'),
            'context'       => ($row['context']      ?? '') ?: null,
            'habitica_id'   => ($row['habitica_id']  ?? '') ?: null,
            'parent_id'     => ($row['parent_task']  ?? '') ? (int)$row['parent_task'] : null,
            'person_id'     => ($row['person_id']    ?? '') !== '' ? (int)$row['person_id'] : null,
            'buy_from'      => ($row['buy_from']     ?? '') ?: null,
            'tags'          => ($row['tags']         ?? '') ?: null,
            'deadline'      => ($row['deadline']     ?? '') ?: null,
            'description'   => ($row['description']  ?? '') ?: null,
            'prereq_tasks'  => ($row['prereq_tasks'] ?? '') ?: null,
        ];
        $existingIds[$id] = true;
        $imported++;
    }

    $allIds          = array_column($data['tasks'], 'id');
    $data['next_id'] = max(array_merge([$data['next_id'] ?? 1], $allIds)) + 1;
    saveTasks($data);
    @unlink($tasksCsv);
    $results['tasks'] = $imported;
} else {
    $results['tasks'] = 'csv not found — skipped';
}

// ---- People (SQLite → vault) ------------------------------------------------

if ($database) {
    $rows = $database->query("SELECT * FROM people ORDER BY person_id")->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {
        $maxId = max(array_column($rows, 'person_id'));
        savePeople(['next_id' => $maxId + 1, 'people' => $rows]);
        $database->exec("DELETE FROM people");
        $results['people'] = count($rows);
    } else {
        $results['people'] = 0;
    }

// ---- People notes (SQLite → vault) -----------------------------------------

    $notes = $database->query("SELECT * FROM people_notes ORDER BY note_id")->fetchAll(PDO::FETCH_ASSOC);
    if ($notes) {
        $maxNoteId = max(array_column($notes, 'note_id'));
        savePeopleNotes(['next_id' => $maxNoteId + 1, 'notes' => $notes]);
        $database->exec("DELETE FROM people_notes");
        $results['people_notes'] = count($notes);
    } else {
        $results['people_notes'] = 0;
    }
} else {
    $results['people'] = $results['people_notes'] = 'db unavailable';
}

// ---- Clean up CSV files -----------------------------------------------------

$csvDirs = ['/tmp/csv_migration', __DIR__ . '/../data'];
foreach ($csvDirs as $dir) {
    foreach (glob("$dir/*.csv") as $f) @unlink($f);
}
@rmdir('/tmp/csv_migration');

// ---- Done -------------------------------------------------------------------

file_put_contents($doneFlag, date('c'));
json_response(['ok' => true, 'results' => $results]);
