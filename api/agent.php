<?php
/**
 * api/agent.php — vault + context API for agent use
 * Auth: Authorization: Bearer bsk_... header
 *
 * GET ?view=tasks          → active tasks + today's context (default)
 * GET ?view=inbox          → inbox (untriaged) tasks
 * GET ?view=all_tasks      → every task regardless of status/type
 * GET ?view=config         → app config (preferences, onboarding state, story progress)
 * GET ?view=snapshot       → tasks + inbox + config + context in one call
 *
 * POST {"action":"update_task","task_id":N,"fields":{...}}
 *      → update urgency / snoozed_until / deadline / context / task_type / energy / time / status
 *
 * POST {"action":"add_task","title":"...","task_type"?:"next_action","urgency"?:"medium",...}
 *      → insert a new task into the vault
 *
 * POST {"action":"delete_task","task_id":N}
 *      → mark a task as deleted
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

$auth  = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$token = strncmp($auth, 'Bearer ', 7) === 0 ? trim(substr($auth, 7)) : '';
if (!$token || !authenticateAgentKey($token)) {
    json_response(['error' => 'Unauthorized — provide a valid bsk_ key'], 401);
}

$method = $_SERVER['REQUEST_METHOD'];

// ---- GET ----
if ($method === 'GET') {
    $view = $_GET['view'] ?? 'tasks';

    $context = null;
    if (in_array($view, ['tasks', 'snapshot'], true)) {
        $energy = null; $dayType = null;
        if ($database) {
            try {
                $row = $database->query(
                    "SELECT energy_level, day_type FROM diary WHERE date = '" . date('Y-m-d') . "' LIMIT 1"
                )->fetch(PDO::FETCH_ASSOC);
                if ($row) { $energy = $row['energy_level']; $dayType = $row['day_type']; }
            } catch (Throwable $e) {}
        }
        $tasks = getTasks();
        $context = [
            'today'          => date('Y-m-d'),
            'energy'         => $energy,
            'day_type'       => $dayType,
            'inbox_count'    => count(getInboxTasks()),
            'pages_target'   => todayPagesTarget(),
            'pages_progress' => (int)($tasks['pages'] ?? 0),
        ];
    }

    $taskMap = fn($t) => [
        'id'            => (int)$t['id'],
        'title'         => $t['title'],
        'task_type'     => $t['task_type']     ?? null,
        'urgency'       => $t['urgency']       ?? null,
        'energy'        => $t['energy']        ?? null,
        'time'          => $t['time']          ?? null,
        'context'       => $t['context']       ?? null,
        'status'        => $t['status']        ?? null,
        'deadline'      => $t['deadline']      ?? null,
        'snoozed_until' => $t['snoozed_until'] ?? null,
        'stuck'         => $t['stuck']         ?? false,
        'parent_id'     => $t['parent_id']     ?? null,
        'person_id'     => $t['person_id']     ?? null,
        'habitica_id'   => $t['habitica_id']   ?? null,
        'description'   => $t['description']   ?? null,
        'tags'          => $t['tags']          ?? null,
        'created_at'    => $t['created_at']    ?? null,
    ];

    if ($view === 'tasks') {
        $active = array_values(array_filter(getTasks()['tasks'], fn($t) =>
            ($t['status'] ?? '') === 'active' && empty($t['parent_id'])
        ));
        json_response(['ok' => true, 'context' => $context, 'tasks' => array_map($taskMap, $active)]);
    }

    if ($view === 'inbox') {
        json_response(['ok' => true, 'tasks' => array_map($taskMap, getInboxTasks())]);
    }

    if ($view === 'all_tasks') {
        $all = getTasks()['tasks'];
        json_response(['ok' => true, 'tasks' => array_map($taskMap, $all), 'count' => count($all)]);
    }

    if ($view === 'config') {
        try { $cfg = getConfig() ?? []; } catch (Throwable $e) { $cfg = []; }
        json_response(['ok' => true, 'config' => $cfg]);
    }

    if ($view === 'snapshot') {
        $data  = getTasks();
        $all   = $data['tasks'];
        $active = array_values(array_filter($all, fn($t) =>
            ($t['status'] ?? '') === 'active' && empty($t['parent_id'])
        ));
        $inbox  = array_values(array_filter($all, fn($t) =>
            ($t['task_type'] ?? '') === 'inbox' && ($t['status'] ?? '') === 'active' && empty($t['parent_id'])
        ));
        try { $cfg = getConfig() ?? []; } catch (Throwable $e) { $cfg = []; }
        json_response([
            'ok'      => true,
            'context' => $context,
            'tasks'   => array_map($taskMap, $active),
            'inbox'   => array_map($taskMap, $inbox),
            'config'  => $cfg,
            'pages'   => (int)($data['pages'] ?? 0),
        ]);
    }

    json_response(['error' => "Unknown view '$view'. Valid: tasks, inbox, all_tasks, config, snapshot"], 400);
}

// ---- POST ----
if ($method === 'POST') {
    $body   = json_decode(file_get_contents('php://input'), true) ?? [];
    $action = $body['action'] ?? '';

    if ($action === 'update_task') {
        $taskId = (int)($body['task_id'] ?? 0);
        if (!$taskId) json_response(['error' => 'Missing task_id'], 400);
        $allowed = ['urgency', 'snoozed_until', 'deadline', 'context', 'task_type',
                    'energy', 'time', 'prereq_tasks', 'status', 'title', 'description', 'tags'];
        $fields  = array_intersect_key($body['fields'] ?? [], array_flip($allowed));
        if (!$fields) json_response(['error' => 'No valid fields to update'], 400);
        try {
            vaultUpdateTask($taskId, $fields);
            json_response(['ok' => true, 'updated' => $fields]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_task') {
        $title = trim($body['title'] ?? '');
        if (!$title) json_response(['error' => 'Missing title'], 400);
        try {
            $data   = getTasks();
            $taskId = (int)($data['next_id'] ?? 1);
            $data['tasks'][] = [
                'id'            => $taskId,
                'title'         => $title,
                'task_type'     => $body['task_type']     ?? 'next_action',
                'urgency'       => $body['urgency']       ?? 'medium',
                'energy'        => $body['energy']        ?? 'medium',
                'time'          => isset($body['time']) ? (int)$body['time'] : null,
                'status'        => 'active',
                'context'       => $body['context']       ?? null,
                'deadline'      => $body['deadline']      ?? null,
                'snoozed_until' => $body['snoozed_until'] ?? null,
                'parent_id'     => $body['parent_id']     ?? null,
                'person_id'     => $body['person_id']     ?? null,
                'description'   => $body['description']   ?? null,
                'tags'          => $body['tags']          ?? null,
                'created_at'    => date('c'),
            ];
            $data['next_id'] = $taskId + 1;
            saveTasks($data);
            json_response(['ok' => true, 'task_id' => $taskId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'migrate_diary') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $dryRun = !empty($body['dry_run']);
        try {
            $rows = $database->query(
                "SELECT date, energy_level, day_type FROM diary
                 WHERE energy_level IS NOT NULL OR day_type IS NOT NULL
                 ORDER BY date"
            )->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            json_response(['error' => 'Could not read diary: ' . $e->getMessage()], 500);
        }

        $migrated = [];
        if (!$dryRun) {
            $existing = getDiary();
            foreach ($rows as $row) {
                $entry = [];
                if ($row['energy_level'] !== null) $entry['energy_level'] = (int)$row['energy_level'];
                if ($row['day_type']     !== null) $entry['day_type']     = (int)$row['day_type'];
                if (!empty($entry)) {
                    $existing[$row['date']] = array_merge($existing[$row['date']] ?? [], $entry);
                    $migrated[] = $row['date'];
                }
            }
            if (!empty($migrated)) saveDiary($existing);

            // Drop the diary table now that data is in the vault
            try { $database->exec("DROP TABLE IF EXISTS diary"); }
            catch (Throwable $e) { /* non-fatal */ }
        } else {
            foreach ($rows as $row) {
                if ($row['energy_level'] !== null || $row['day_type'] !== null) {
                    $migrated[] = $row['date'];
                }
            }
        }

        json_response([
            'ok'       => true,
            'dry_run'  => $dryRun,
            'migrated' => count($migrated),
            'dates'    => $migrated,
        ]);
    }

    if ($action === 'migrate_from_sqlite') {
        // One-shot migration: pulls incomplete tasks (id > 5) from the legacy SQLite
        // tasks table and inserts them into the vault. Idempotent — skips tasks whose
        // title already exists in the vault (case-insensitive).
        if (!$database) json_response(['error' => 'Database unavailable'], 503);

        $urgencyMap = fn(int $u): string => $u >= 4 ? 'high' : ($u >= 2 ? 'medium' : 'low');
        $typeMap    = function(string $t): string {
            return match($t) {
                'project'     => 'project',
                'wishlist'    => 'someday',
                'someday'     => 'someday',
                default       => 'next_action',
            };
        };

        $dryRun = !empty($body['dry_run']);

        try {
            $stmt = $database->query(
                "SELECT task_id, task_title, task_type, task_urgency, context,
                        habitica_id, person_id, deadline, show_after
                 FROM tasks
                 WHERE completed = 0 AND task_id > 5
                 ORDER BY task_id"
            );
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            json_response(['error' => 'Could not read tasks: ' . $e->getMessage()], 500);
        }

        $vaultData     = getTasks();
        $existingTitles = array_map(
            fn($t) => mb_strtolower(trim($t['title'] ?? '')),
            $vaultData['tasks']
        );

        $imported = []; $skipped = [];
        $nextId   = (int)($vaultData['next_id'] ?? 1);
        $now      = date('Y-m-d');

        foreach ($rows as $row) {
            $title = trim($row['task_title'] ?? '');
            if (!$title) { $skipped[] = ['id' => $row['task_id'], 'reason' => 'empty title']; continue; }
            if (in_array(mb_strtolower($title), $existingTitles, true)) {
                $skipped[] = ['id' => $row['task_id'], 'title' => $title, 'reason' => 'already in vault'];
                continue;
            }

            // Snooze if show_after is in the future
            $snoozeUntil = null;
            if (!empty($row['show_after']) && $row['show_after'] > $now . ' 00:00:00') {
                $snoozeUntil = date('Y-m-d\TH:i:s', strtotime($row['show_after']));
            }

            $task = [
                'id'            => $nextId,
                'title'         => $title,
                'task_type'     => $typeMap($row['task_type'] ?? 'next-action'),
                'urgency'       => $urgencyMap((int)($row['task_urgency'] ?? 0)),
                'energy'        => 'medium',
                'status'        => 'active',
                'context'       => $row['context'] ?: null,
                'deadline'      => $row['deadline'] ?: null,
                'snoozed_until' => $snoozeUntil,
                'parent_id'     => null,
                'person_id'     => ($row['person_id'] ?? 0) ? (int)$row['person_id'] : null,
                'habitica_id'   => $row['habitica_id'] ?: null,
                'description'   => null,
                'tags'          => null,
                'created_at'    => date('c'),
            ];
            $imported[] = ['id' => $row['task_id'], 'title' => $title, 'vault_id' => $nextId];
            $existingTitles[] = mb_strtolower($title);
            if (!$dryRun) {
                $vaultData['tasks'][] = $task;
                $vaultData['next_id'] = ++$nextId;
            } else {
                $nextId++;
            }
        }

        if (!$dryRun && !empty($imported)) {
            saveTasks($vaultData);
        }

        json_response([
            'ok'       => true,
            'dry_run'  => $dryRun,
            'imported' => count($imported),
            'skipped'  => count($skipped),
            'tasks'    => $imported,
            'skipped_detail' => $skipped,
        ]);
    }

    if ($action === 'delete_task') {
        $taskId = (int)($body['task_id'] ?? 0);
        if (!$taskId) json_response(['error' => 'Missing task_id'], 400);
        try {
            vaultUpdateTask($taskId, ['status' => 'deleted']);
            json_response(['ok' => true]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    json_response(['error' => "Unknown action '$action'. Valid: update_task, add_task, delete_task"], 400);
}

json_response(['error' => 'Method not allowed'], 405);
