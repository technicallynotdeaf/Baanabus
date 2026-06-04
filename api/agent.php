<?php
/**
 * api/agent.php — vault + context API for agent use
 * Auth: Authorization: Bearer bsk_... header
 *
 * GET ?view=tasks               → active tasks + today's context (default)
 * GET ?view=inbox               → inbox (untriaged) tasks
 * GET ?view=all_tasks           → every task regardless of status/type
 * GET ?view=config              → app config (preferences, onboarding state, story progress)
 * GET ?view=snapshot            → tasks + inbox + config + context in one call
 * GET ?view=food_search&q=term  → search foods + servings by name (for finding food_id/serving_id)
 * GET ?view=people              → all people (id, name, circles, birthday, next_review, archived)
 * GET ?view=person&id=N         → single person with their notes
 *
 * POST {"action":"update_task","task_id":N,"fields":{...}}
 *      → update urgency / snoozed_until / deadline / context / task_type / energy / time / status
 *
 * POST {"action":"add_task","title":"...","task_type"?:"next_action","urgency"?:"medium",...}
 *      → insert a new task into the vault
 *
 * POST {"action":"delete_task","task_id":N}
 *      → mark a task as deleted
 *
 * POST {"action":"add_person_note","person_id":N,"note_content":"..."}
 *      → append a note to a person record
 *
 * POST {"action":"update_person","person_id":N,"fields":{...}}
 *      → update fields on a person record (name, birthday, circles, next_review_date, etc.)
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

    if ($view === 'food_log') {
        $date  = $_GET['date']  ?? date('Y-m-d');
        $from  = $_GET['from']  ?? $date;
        $to    = $_GET['to']    ?? $date;
        // Clamp range to 90 days
        if ((strtotime($to) - strtotime($from)) > 90 * 86400) {
            $from = date('Y-m-d', strtotime($to . ' -90 days'));
        }
        try { $log = getFoodLog(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }

        if ($from === $to) {
            // Single-day response (original behaviour)
            $entries = [];
            foreach ($log['entries'][$date] ?? [] as $e) {
                $entries[] = [
                    'log_id'        => (int)$e['log_id'],
                    'food_id'       => $e['food_id'] ? (int)$e['food_id'] : null,
                    'serving_id'    => $e['serving_id'] ? (int)$e['serving_id'] : null,
                    'quantity'      => (float)$e['quantity'],
                    'is_writeoff'   => (bool)$e['is_writeoff'],
                    'writeoff_label'=> $e['writeoff_label'] ?? null,
                    'logged_at'     => $e['logged_at'] ?? null,
                ];
            }
            $totals = $database ? foodLogNutrientTotals($database, $log, $date, $date) : [];
            json_response(['ok' => true, 'date' => $date, 'entries' => $entries, 'totals' => $totals]);
        } else {
            // Range response: per-day totals + averages across days that have entries
            if (!$database) json_response(['error' => 'Database unavailable'], 503);
            $days = [];
            $cur  = $from;
            while ($cur <= $to) {
                if (!empty($log['entries'][$cur])) {
                    $days[$cur] = foodLogNutrientTotals($database, $log, $cur, $cur);
                }
                $cur = date('Y-m-d', strtotime($cur . ' +1 day'));
            }
            $dayCount = count($days);
            $averages = [];
            if ($dayCount > 0) {
                foreach ($days as $d) {
                    foreach ($d as $k => $v) {
                        $averages[$k] = ($averages[$k] ?? 0) + (float)$v;
                    }
                }
                foreach ($averages as $k => &$v) { $v = round($v / $dayCount, 2); }
                unset($v);
            }
            json_response([
                'ok'        => true,
                'from'      => $from,
                'to'        => $to,
                'days_with_data' => $dayCount,
                'per_day'   => $days,
                'averages'  => $averages,
            ]);
        }
    }

    if ($view === 'food_search') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $q = trim($_GET['q'] ?? '');
        if (!$q) json_response(['error' => 'q parameter required'], 400);
        try {
            $stmt = $database->prepare(
                "SELECT f.food_id, f.name, f.category, f.suggested_serving_g,
                        fs.serving_id, fs.unit_label, fs.weight_g AS serving_weight_g, fs.is_default
                 FROM foods f
                 JOIN food_servings fs ON f.food_id = fs.food_id
                 WHERE lower(f.name) LIKE lower(:q) OR lower(f.search_name) LIKE lower(:q)
                 ORDER BY f.name, fs.is_default DESC, fs.weight_g
                 LIMIT 40"
            );
            $stmt->execute([':q' => '%' . $q . '%']);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Group by food
            $foods = [];
            foreach ($rows as $row) {
                $fid = (int)$row['food_id'];
                if (!isset($foods[$fid])) {
                    $foods[$fid] = [
                        'food_id'            => $fid,
                        'name'               => $row['name'],
                        'category'           => $row['category'],
                        'suggested_serving_g'=> $row['suggested_serving_g'],
                        'servings'           => [],
                    ];
                }
                $foods[$fid]['servings'][] = [
                    'serving_id' => (int)$row['serving_id'],
                    'unit_label' => $row['unit_label'],
                    'weight_g'   => (float)$row['serving_weight_g'],
                    'is_default' => (bool)$row['is_default'],
                ];
            }
            json_response(['ok' => true, 'query' => $q, 'foods' => array_values($foods)]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($view === 'people') {
        try {
            $data = getPeople();
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
        $personMap = fn($p) => [
            'person_id'        => (int)$p['person_id'],
            'name'             => $p['name']              ?? null,
            'circles'          => $p['circles']           ?? [],
            'birthday'         => $p['birthday']          ?? null,
            'next_review_date' => $p['next_review_date']  ?? null,
            'review_interval'  => $p['review_interval']   ?? null,
            'archived'         => $p['archived']          ?? false,
            'qualities'        => $p['qualities']         ?? [],
        ];
        json_response(['ok' => true, 'people' => array_map($personMap, $data['people'])]);
    }

    if ($view === 'person') {
        $personId = (int)($_GET['id'] ?? 0);
        if (!$personId) json_response(['error' => 'id parameter required'], 400);
        try {
            $data   = getPeople();
            $person = null;
            foreach ($data['people'] as $p) {
                if ((int)$p['person_id'] === $personId) { $person = $p; break; }
            }
            if (!$person) json_response(['error' => 'Person not found'], 404);
            $notesData = getPeopleNotes();
            $notes = array_values(array_filter($notesData['notes'], fn($n) => (int)$n['person_id'] === $personId));
            usort($notes, fn($a, $b) => strcmp($b['date_added'] ?? '', $a['date_added'] ?? ''));
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
        json_response(['ok' => true, 'person' => $person, 'notes' => $notes]);
    }

    if ($view === 'habitica_task') {
        $habId = trim($_GET['id'] ?? '');
        if (!$habId) json_response(['error' => 'id parameter required'], 400);
        try {
            $cfg = getConfig() ?? [];
            if (empty($cfg['preferences']['uses_habitica'])) json_response(['error' => 'Habitica not configured'], 400);
            require_once __DIR__ . '/habitica_helper.php';
            $cass    = getCassowary();
            $habUser = $cass['habitica']['user_id'] ?? '';
            $habKey  = $cass['habitica']['api_key']  ?? '';
            if (!$habUser || !$habKey) json_response(['error' => 'No Habitica credentials'], 400);
            $task = habiticaRequest('GET', '/tasks/' . urlencode($habId), $habUser, $habKey);
            json_response([
                'ok'        => true,
                'id'        => $task['id']        ?? null,
                'title'     => $task['text']       ?? null,
                'notes'     => $task['notes']      ?? null,
                'type'      => $task['type']       ?? null,
                'completed' => $task['completed']  ?? null,
                'checklist' => $task['checklist']  ?? [],
            ]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    json_response(['error' => "Unknown view '$view'. Valid: tasks, inbox, all_tasks, config, snapshot, food_log, food_search, people, person, habitica_task"], 400);
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

            // Push to Habitica if this is a next_action and Habitica is configured
            if (($body['task_type'] ?? 'next_action') === 'next_action' && empty($body['parent_id'])) {
                try {
                    $cfg = getConfig() ?? [];
                    if (!empty($cfg['preferences']['uses_habitica'])) {
                        require_once __DIR__ . '/habitica_helper.php';
                        $cass    = getCassowary();
                        $habUser = $cass['habitica']['user_id'] ?? '';
                        $habKey  = $cass['habitica']['api_key']  ?? '';
                        if ($habUser && $habKey) {
                            $created = habiticaRequest('POST', '/tasks/user', $habUser, $habKey, [
                                'type' => 'todo',
                                'text' => $title,
                            ]);
                            if (!empty($created['id'])) {
                                vaultUpdateTask($taskId, ['habitica_id' => $created['id']]);
                            }
                        }
                    }
                } catch (Throwable $e) {
                    // non-fatal
                }
            }

            json_response(['ok' => true, 'task_id' => $taskId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'migrate_quotes') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $dryRun = !empty($body['dry_run']);
        try {
            $rows = $database->query("SELECT quote_id, quote FROM quotes ORDER BY quote_id")
                             ->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            json_response(['error' => 'Could not read quotes: ' . $e->getMessage()], 500);
        }

        if ($dryRun) {
            json_response(['ok' => true, 'dry_run' => true, 'count' => count($rows),
                           'sample' => array_slice($rows, 0, 3)]);
        }

        $existing    = getQuotes();
        $existingSet = array_map(fn($i) => $i['text'], $existing['items']);
        $added       = 0;
        foreach ($rows as $row) {
            $text = trim($row['quote'] ?? '');
            if (!$text || in_array($text, $existingSet, true)) continue;
            $existing['items'][] = ['id' => $existing['next_id'], 'text' => $text];
            $existing['next_id']++;
            $existingSet[] = $text;
            $added++;
        }
        if ($added > 0) saveQuotes($existing);

        try { $database->exec("DROP TABLE IF EXISTS quotes"); }
        catch (Throwable $e) { /* non-fatal */ }

        json_response(['ok' => true, 'dry_run' => false, 'imported' => $added,
                       'total' => count($existing['items'])]);
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

    if ($action === 'log_food') {
        $date = $body['date'] ?? date('Y-m-d');
        try {
            $log = getFoodLog();
            $lid = $log['next_id'];
            if (!empty($body['is_writeoff'])) {
                $label = trim($body['label'] ?? '');
                if (!$label) json_response(['error' => 'label required for writeoff'], 400);
                $log['entries'][$date][] = [
                    'log_id'        => $lid,
                    'food_id'       => null,
                    'serving_id'    => null,
                    'quantity'      => 1,
                    'is_writeoff'   => true,
                    'writeoff_label'=> $label,
                    'logged_at'     => date('Y-m-d H:i:s'),
                ];
            } else {
                $food_id    = (int)($body['food_id']    ?? 0);
                $serving_id = (int)($body['serving_id'] ?? 0);
                $quantity   = max(0.1, (float)($body['quantity'] ?? 1));
                if (!$food_id || !$serving_id) json_response(['error' => 'food_id and serving_id required'], 400);
                $log['entries'][$date][] = [
                    'log_id'        => $lid,
                    'food_id'       => $food_id,
                    'serving_id'    => $serving_id,
                    'quantity'      => $quantity,
                    'is_writeoff'   => false,
                    'writeoff_label'=> null,
                    'logged_at'     => date('Y-m-d H:i:s'),
                ];
            }
            $log['next_id']++;
            saveFoodLog($log);
            json_response(['ok' => true, 'log_id' => $lid]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'delete_food_entry') {
        $log_id = (int)($body['log_id'] ?? 0);
        if (!$log_id) json_response(['error' => 'log_id required'], 400);
        try {
            $log = getFoodLog();
            foreach ($log['entries'] as $d => &$day) {
                $log['entries'][$d] = array_values(array_filter($day, fn($e) => (int)$e['log_id'] !== $log_id));
            }
            unset($day);
            saveFoodLog($log);
            json_response(['ok' => true]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'migrate_food_log') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $dryRun = !empty($body['dry_run']);
        try {
            $rows = $database->query(
                "SELECT user_id, date, food_id, serving_id, quantity, is_writeoff, writeoff_label, logged_at FROM food_log ORDER BY logged_at"
            )->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            json_response(['error' => 'Could not read food_log: ' . $e->getMessage()], 500);
        }

        $uid = $_SESSION['user_id'] ?? '';
        $myRows = array_filter($rows, fn($r) => $r['user_id'] === $uid);

        if ($dryRun) {
            json_response(['ok' => true, 'dry_run' => true, 'count' => count($myRows), 'sample' => array_values(array_slice($myRows, 0, 3))]);
        }

        $log = getFoodLog();
        $imported = 0;
        foreach ($myRows as $r) {
            $date = substr($r['logged_at'], 0, 10);
            $lid  = $log['next_id'];
            $log['entries'][$date][] = [
                'log_id'        => $lid,
                'food_id'       => $r['food_id'] ? (int)$r['food_id'] : null,
                'serving_id'    => $r['serving_id'] ? (int)$r['serving_id'] : null,
                'quantity'      => (float)$r['quantity'],
                'is_writeoff'   => (bool)$r['is_writeoff'],
                'writeoff_label'=> $r['writeoff_label'],
                'logged_at'     => $r['logged_at'],
            ];
            $log['next_id']++;
            $imported++;
        }
        if ($imported > 0) saveFoodLog($log);

        try { $database->exec("DROP TABLE IF EXISTS food_log"); } catch (Throwable $e) {}

        json_response(['ok' => true, 'dry_run' => false, 'imported' => $imported]);
    }

    if ($action === 'migrate_daily_completions') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        try {
            $rows = $database->query("SELECT date, count FROM daily_completions ORDER BY date")
                             ->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            json_response(['error' => 'Could not read daily_completions: ' . $e->getMessage()], 500);
        }
        $cfg    = getConfig() ?? [];
        $daily  = $cfg['daily_completions'] ?? [];
        $merged = 0;
        foreach ($rows as $r) {
            $daily[$r['date']] = ($daily[$r['date']] ?? 0) + (int)$r['count'];
            $merged++;
        }
        $cfg['daily_completions'] = $daily;
        saveConfig($cfg);
        try { $database->exec("DROP TABLE IF EXISTS daily_completions"); } catch (Throwable $e) {}
        json_response(['ok' => true, 'merged' => $merged, 'dates' => array_keys($daily)]);
    }

    if ($action === 'delete_task') {
        $taskId = (int)($body['task_id'] ?? 0);
        if (!$taskId) json_response(['error' => 'Missing task_id'], 400);
        try {
            vaultUpdateTask($taskId, ['status' => 'deleted']);
            // Cascade-delete active children
            $allData = getTasks();
            $changed = false;
            foreach ($allData['tasks'] as &$child) {
                if ((int)($child['parent_id'] ?? 0) === $taskId && ($child['status'] ?? '') === 'active') {
                    $child['status'] = 'deleted';
                    $changed = true;
                }
            }
            unset($child);
            if ($changed) saveTasks($allData);
            json_response(['ok' => true]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_person_note') {
        $personId = (int)($body['person_id'] ?? 0);
        $contents = trim($body['note_content'] ?? '');
        if (!$personId) json_response(['error' => 'Missing person_id'], 400);
        if (!$contents) json_response(['error' => 'Missing note_content'], 400);
        if (mb_strlen($contents) > 2000) json_response(['error' => 'Note too long (max 2000 chars)'], 400);
        try {
            $noteId = vaultAddPeopleNote($personId, $contents);
            json_response(['ok' => true, 'note_id' => $noteId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'update_person') {
        $personId = (int)($body['person_id'] ?? 0);
        if (!$personId) json_response(['error' => 'Missing person_id'], 400);
        $allowed = ['name', 'birthday', 'circles', 'next_review_date', 'review_interval',
                    'archived', 'qualities', 'phone', 'email'];
        $fields  = array_intersect_key($body['fields'] ?? [], array_flip($allowed));
        if (!$fields) json_response(['error' => 'No valid fields to update'], 400);
        try {
            vaultUpdatePerson($personId, $fields);
            json_response(['ok' => true, 'updated' => $fields]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    json_response(['error' => "Unknown action '$action'. Valid: update_task, add_task, delete_task, add_person_note, update_person"], 400);
}

json_response(['error' => 'Method not allowed'], 405);
