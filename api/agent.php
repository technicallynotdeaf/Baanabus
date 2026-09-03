<?php
/**
 * api/agent.php — vault + context API for agent use
 * Auth: Authorization: Bearer bsk_... header
 *
 * GET ?view=tasks               → active tasks + today's context (default)
 * GET ?view=inbox               → inbox (untriaged) tasks
 * GET ?view=all_tasks           → every task regardless of status/type
 * GET ?view=config              → app config (preferences, onboarding state, story progress)
 * GET ?view=top3                → today's 3 challenge jars (label/target/progress/points/completed_at) + lifetime points total
 * GET ?view=snapshot            → tasks + inbox + config + context in one call
 * GET ?view=food_search&q=term  → search foods + servings by name (for finding food_id/serving_id)
 * GET ?view=api_keys            → list agent API keys (label, created_at, is_current)
 * GET ?view=people              → all people (id, name, circles, birthday, next_review, archived)
 * GET ?view=person&id=N         → single person with their notes
 * GET ?view=recipes             → all saved recipes
 * GET ?view=meal_plan&date=YYYY-MM-DD → meal plan for a date (defaults to today)
 * GET ?view=goals                → all goals (id, title, created_at)
 * GET ?view=quotes                → all personal reminder quotes (id, text)
 * GET ?view=physical_objects     → items left out (status/task_id/room/created_at/resolved_at)
 * GET ?view=food_packs&food_id=N → pack-size/cost entries for a food (all stores)
 * GET ?view=food_pack_gaps&limit=N → foods with zero recorded pack-size entries (prompt queue)
 * GET ?view=food_pack_stale&days=90&limit=N → pack entries not confirmed in `days`, oldest first (recheck queue)
 * GET ?view=events              → all calendar events (title, date, time, people_ids, task_ids, etc.)
 *
 * POST {"action":"update_task","task_id":N,"fields":{...}}
 *      → update urgency / snoozed_until / deadline / context / task_type / energy / time / status / parent_id / goal_id
 *
 * POST {"action":"add_task","title":"...","task_type"?:"next_action","urgency"?:"medium",...}
 *      → insert a new task into the vault
 *
 * POST {"action":"delete_task","task_id":N}
 *      → mark a task as deleted
 *
 * POST {"action":"rotate_api_key"}
 *      → generate new bsk_ key (label: claude-MON-DD), return new_token + old_key_id; old key stays live until revoked
 *
 * POST {"action":"revoke_api_key","key_id":"..."}
 *      → delete a key by key_id; refuses to revoke the key currently in use
 *
 * POST {"action":"add_person_note","person_id":N,"note_content":"..."}
 *      → append a note to a person record
 *
 * POST {"action":"delete_person_note","note_id":N}
 *      → remove a note from a person record
 *
 * POST {"action":"update_person","person_id":N,"fields":{...}}
 *      → update fields on a person record (name, birthday, circles, next_review_date, etc.)
 *
 * POST {"action":"add_goal","title":"..."}
 *      → add a goal; link tasks to it via update_task fields.goal_id
 *
 * POST {"action":"delete_goal","goal_id":N}
 *      → delete a goal (tasks keep their goal_id, pointing at nothing)
 *
 * POST {"action":"add_recipe","name":"...","ingredients_text":"...","notes":"...","default_portions":N,"tags":[...]}
 *      → add a recipe to the recipe book (ingredients_text is free text for now)
 *
 * POST {"action":"delete_recipe","recipe_id":N}
 *      → delete a recipe
 *
 * POST {"action":"plan_meal","date":"YYYY-MM-DD","meal_type":"dinner","name":"...","recipe_id":N}
 *      → record a planned meal for a date (meal_type: breakfast/lunch/dinner; recipe_id optional)
 *
 * POST {"action":"clear_meal","date":"YYYY-MM-DD","meal_type":"dinner"}
 *      → remove a planned meal
 *
 * POST {"action":"add_context","context":"...","description":"..."}
 *      → add a new context option to the lookup table (INSERT OR IGNORE)
 *
 * POST {"action":"rename_context","old_context":"...","new_context":"..."}
 *      → renames a context: updates the contexts lookup row (context is its
 *        primary key) and bulk-renames the context field on every matching
 *        task in the vault. Fails if new_context already exists.
 *
 * POST {"action":"set_story_pages","pages":N}
 *      → overwrite the global story_pages pool (use to correct pages_available)
 *
 * POST {"action":"set_active_story","story_id":"q9"}
 *      → set which unlocked book is the current/highlighted one on the shelf
 *        (story_id is a family letter + book number, e.g. q1..q24, a1..a24)
 *
 * POST {"action":"add_food_pack","food_id":N,"store":"Coles","pack_size_g":N,"cost_per_pack":N,
 *       "pack_label"?:"400g tin","last_seen_date"?:"YYYY-MM-DD","provenance"?:"user_reported","notes"?:"..."}
 *      → record/refresh a pack-size+cost observation for a food at a store. Same
 *        (food_id, store, pack_size_g) upserts: price + last_seen_date are
 *        refreshed rather than creating a duplicate row. last_seen_date defaults
 *        to today; provenance defaults to 'user_reported'.
 *
 * POST {"action":"add_food_packs_batch","entries":[{food_id,store,pack_size_g,cost_per_pack,
 *       pack_label?,last_seen_date?,notes?},...],"provenance"?:"receipt_extract"}
 *      → bulk version of add_food_pack, for recording several items parsed from a
 *        receipt or shopping description in one call (parsing happens in the
 *        calling Claude session, not server-side — no OCR/NLP here).
 *
 * POST {"action":"update_food_pack","pack_id":N,"fields":{...}}
 *      → update store/pack_label/pack_size_g/cost_per_pack/last_seen_date/notes on
 *        an existing pack row (e.g. bump last_seen_date alone to confirm a price
 *        is still current without changing it)
 *
 * POST {"action":"delete_food_pack","pack_id":N}
 *      → remove a pack-size entry
 *
 * POST {"action":"add_event","title":"...","date":"YYYY-MM-DD","fields":{...}}
 *      → add a calendar event; fields can include time_start, time_end, recurring,
 *        people_ids, task_ids, prereq_tasks, prebriefed, debriefed, notes
 *
 * POST {"action":"update_event","event_id":N,"fields":{...}}
 *      → update event fields (title, date, time_start, time_end, recurring,
 *        people_ids, task_ids, prereq_tasks, prebriefed, debriefed, notes)
 *
 * POST {"action":"delete_event","event_id":N}
 *      → delete a calendar event
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

// One-time migration: fold per-story pages_available into global pool
try { migrateStoryPagesToGlobal(); } catch (Throwable $e) {}

$method = $_SERVER['REQUEST_METHOD'];

// ---- GET ----
if ($method === 'GET') {
    $view = $_GET['view'] ?? 'tasks';

    $context = null;
    if (in_array($view, ['tasks', 'snapshot'], true)) {
        $diaryEntry = getDiaryEntry(date('Y-m-d'));
        $tasks = getTasks();
        $context = [
            'today'          => date('Y-m-d'),
            'energy'         => $diaryEntry['energy_level'] ?? null,
            'day_type'       => $diaryEntry['day_type']     ?? null,
            'location'       => $diaryEntry['location']     ?? null,
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
        'importance'    => $t['importance']    ?? null,
        'energy'        => $t['energy']        ?? null,
        'time'          => $t['time']          ?? null,
        'context'       => $t['context']       ?? null,
        'location'         => $t['location']         ?? null,
        'relevant_after'   => $t['relevant_after']   ?? null,
        'irrelevant_after' => $t['irrelevant_after'] ?? null,
        'status'        => $t['status']        ?? null,
        'deadline'      => $t['deadline']      ?? null,
        'snoozed_until' => $t['snoozed_until'] ?? null,
        'stuck'         => $t['stuck']         ?? false,
        'parent_id'     => $t['parent_id']     ?? null,
        'subtask_ids'   => $t['subtask_ids']   ?? [],
        'person_id'     => $t['person_id']     ?? null,
        'habitica_id'      => $t['habitica_id']      ?? null,
        'habitica_item_id' => $t['habitica_item_id'] ?? null,
        'description'   => $t['description']   ?? null,
        'tags'          => $t['tags']          ?? null,
        'goal_id'       => $t['goal_id']       ?? null,
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

    if ($view === 'top3') {
        try {
            $entries = getOrGenerateTop3();
            $points  = (int)((getConfig() ?? [])['points'] ?? 0);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
        json_response(['ok' => true, 'challenges' => $entries, 'points' => $points]);
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
        $todayMealPlan = null;
        $todayEntry = [];
        try { $todayEntry = getDiaryEntry(date('Y-m-d')); $todayMealPlan = $todayEntry['meal_plan'] ?? null; } catch (Throwable $e) {}

        // Fuel signals — raw behavioural indicators for wellbeing assessment
        $today = date('Y-m-d');
        $dailyComp = $cfg['daily_completions'] ?? [];
        $completionsToday = (int)($dailyComp[$today] ?? 0);
        $completions7d = 0;
        for ($i = 0; $i < 7; $i++) {
            $d = date('Y-m-d', strtotime("-{$i} days"));
            $completions7d += (int)($dailyComp[$d] ?? 0);
        }
        $foodLogToday = 0;
        try {
            $fl = getFoodLog();
            $foodLogToday = count($fl['entries'][$today] ?? []);
        } catch (Throwable $e) {}
        $danceToday = (int)(($cfg['dance_log'] ?? [])[$today] ?? 0);
        $anticipationToday = $todayEntry['anticipation'] ?? null;
        $wantToNones7d = 0;
        try {
            $diary = getDiary();
            for ($i = 0; $i < 7; $i++) {
                $d = date('Y-m-d', strtotime("-{$i} days"));
                $wantToNones7d += (int)(($diary[$d]['want_to_nones'] ?? 0));
            }
        } catch (Throwable $e) {}
        $energyLevel = $context['energy'];
        $energyLabels = [1 => 'Exhausted', 2 => 'Low', 3 => 'Okay', 4 => 'Good', 5 => 'On fire'];

        // Simple color signal — rough initial thresholds, tunable on real data
        $colorSignal = null; $colorReason = null;
        if ($energyLevel !== null || $wantToNones7d >= 3) {
            if ($energyLevel !== null && $energyLevel <= 1 && $completions7d <= 3) {
                $colorSignal = 'red';
                $colorReason = 'Exhausted energy and very low completions this week. This looks like depression territory — time to name it and choose: force the basics (exercise, shower, food, gratitude) or go to the GP.';
            } elseif ($wantToNones7d >= 3 || ($energyLevel !== null && $energyLevel <= 2 && ($anticipationToday === 'nothing' || $completions7d < 5))) {
                $colorSignal = 'orange';
                $reason_parts = [];
                if ($anticipationToday === 'nothing') $reason_parts[] = 'not looking forward to anything';
                if ($completions7d < 5) $reason_parts[] = 'fewer than 5 completions this week';
                if ($wantToNones7d >= 3) $reason_parts[] = 'found nothing appealing 3+ times this week';
                $colorReason = 'Low energy with ' . implode(' and ', $reason_parts) . '. Getting depleted.';
            } elseif ($energyLevel !== null && ($energyLevel <= 2 || ($foodLogToday === 0 && (int)date('H') >= 13) || $anticipationToday === 'nothing')) {
                $colorSignal = 'yellow';
                $reason_parts = [];
                if ($energyLevel <= 2) $reason_parts[] = 'energy is low';
                if ($foodLogToday === 0 && (int)date('H') >= 13) $reason_parts[] = 'no food logged past 1pm';
                if ($anticipationToday === 'nothing') $reason_parts[] = 'nothing to look forward to today';
                $colorReason = ucfirst(implode(', ', $reason_parts)) . '.';
            }
        }

        json_response([
            'ok'            => true,
            'context'       => $context,
            'tasks'         => array_map($taskMap, $active),
            'inbox'         => array_map($taskMap, $inbox),
            'config'        => $cfg,
            'pages'         => (int)($data['pages'] ?? 0),
            'meal_plan_today' => $todayMealPlan,
            'fuel_signals'  => [
                'energy_level'       => $energyLevel,
                'energy_label'       => $energyLevel ? ($energyLabels[$energyLevel] ?? null) : null,
                'completions_today'  => $completionsToday,
                'completions_7d'     => $completions7d,
                'food_log_today'     => $foodLogToday,
                'dance_today_secs'   => $danceToday,
                'anticipation_today'  => $anticipationToday,
                'want_to_nones_7d'   => $wantToNones7d,
                'color_signal'       => $colorSignal,
                'color_reason'       => $colorReason,
            ],
        ]);
    }

    if ($view === 'want_to') {
        try { $wt = getWantTo(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        json_response(['ok' => true, 'items' => $wt['items'] ?? []]);
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
            'circles'          => is_array($p['circles'] ?? null) ? $p['circles'] : [],
            // 'birthday' is a legacy/unused field name — the actual data list_people.php
            // reads and displays is DOB (day)/MOB (month)/YOB (optional year), added here
            // for inspection while investigating the birthday-reminder feature request.
            'birthday'         => $p['birthday']          ?? null,
            'DOB'              => $p['DOB']                ?? null,
            'MOB'              => $p['MOB']                ?? null,
            'YOB'              => $p['YOB']                ?? null,
            'next_review_date' => $p['next_review_date']  ?? null,
            'next_review'      => $p['next_review']        ?? null,
            'review_interval'  => $p['review_interval']   ?? null,
            'archived'         => !empty($p['archived']),
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

    if ($view === 'habitica_dailies') {
        try {
            $cfg = getConfig() ?? [];
            if (empty($cfg['preferences']['uses_habitica'])) json_response(['error' => 'Habitica not configured'], 400);
            require_once __DIR__ . '/habitica_helper.php';
            $cass    = getCassowary();
            $habUser = $cass['habitica']['user_id'] ?? '';
            $habKey  = $cass['habitica']['api_key']  ?? '';
            if (!$habUser || !$habKey) json_response(['error' => 'No Habitica credentials'], 400);
            $dailies = habiticaRequest('GET', '/tasks/user?type=dailys', $habUser, $habKey);
            json_response(['ok' => true, 'dailies' => array_map(fn($t) => [
                'id'     => $t['id']    ?? null,
                'title'  => $t['text']  ?? null,
                'notes'  => $t['notes'] ?? null,
            ], $dailies)]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($view === 'events') {
        try {
            $data = getEvents();
            $eventMap = fn($e) => [
                'id'           => (int)$e['id'],
                'title'        => $e['title']        ?? null,
                'date'         => $e['date']         ?? null,
                'time_start'   => $e['time_start']   ?? null,
                'time_end'     => $e['time_end']     ?? null,
                'recurring'    => $e['recurring']    ?? null,
                'people_ids'   => is_array($e['people_ids'] ?? null) ? $e['people_ids'] : [],
                'task_ids'     => is_array($e['task_ids'] ?? null) ? $e['task_ids'] : [],
                'prereq_tasks' => is_array($e['prereq_tasks'] ?? null) ? $e['prereq_tasks'] : [],
                'prebriefed'   => !empty($e['prebriefed']),
                'debriefed'    => !empty($e['debriefed']),
                'notes'        => $e['notes']        ?? null,
                'created_at'   => $e['created_at']   ?? null,
            ];
            json_response(['ok' => true, 'events' => array_map($eventMap, $data['events'] ?? [])]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($view === 'contexts') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $rows = $database->query("SELECT context, description, is_active FROM contexts ORDER BY is_active DESC, context")->fetchAll(PDO::FETCH_ASSOC);
        json_response(['ok' => true, 'contexts' => $rows]);
    }

    if ($view === 'api_keys') {
        $indexPath = __DIR__ . '/../data/apikeys.json';
        $index     = file_exists($indexPath) ? (json_decode(file_get_contents($indexPath), true) ?? []) : [];
        $currentKeyId = $index[hash('sha256', $token)]['key_id'] ?? null;
        try { $cass = getCassowary(); } catch (Throwable $e) { $cass = []; }
        $keys = [];
        foreach ($cass['api_keys'] ?? [] as $keyId => $meta) {
            $keys[] = [
                'key_id'     => $keyId,
                'label'      => $meta['label']      ?? '',
                'created_at' => $meta['created_at'] ?? null,
                'is_current' => $keyId === $currentKeyId,
            ];
        }
        json_response(['ok' => true, 'keys' => $keys]);
    }

    if ($view === 'nutrition_gaps') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);

        $date = $_GET['date'] ?? date('Y-m-d');

        // Week start: most recent Monday
        $dow       = (int)date('N', strtotime($date)); // 1=Mon … 7=Sun
        $weekStart = date('Y-m-d', strtotime($date . ' -' . ($dow - 1) . ' days'));

        try { $log = getFoodLog(); } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }

        // Today's totals
        $todayTotals = foodLogNutrientTotals($database, $log, $date, $date);

        // Weekly average: sum each day that has data, divide by day count
        $weekDays = [];
        $cur = $weekStart;
        while ($cur <= $date) {
            if (!empty($log['entries'][$cur])) {
                $weekDays[$cur] = foodLogNutrientTotals($database, $log, $cur, $cur);
            }
            $cur = date('Y-m-d', strtotime($cur . ' +1 day'));
        }
        $weekDayCount = count($weekDays);
        $weekAvg = [];
        foreach ($weekDays as $day) {
            foreach ($day as $k => $v) { $weekAvg[$k] = ($weekAvg[$k] ?? 0) + (float)$v; }
        }
        if ($weekDayCount > 0) {
            foreach ($weekAvg as $k => &$v) { $v = $v / $weekDayCount; }
            unset($v);
        }

        // Mapping: nutrient_rdis.nutrient → foodLogNutrientTotals key
        $keyMap = [
            'energy_kj'             => 'energy_kj',
            'protein_g'             => 'protein_g',
            'fibre'                 => 'fibre',
            'fibre_soluble'         => 'fibre_soluble',
            'fibre_insoluble'       => 'fibre_insoluble',
            'potassium'             => 'potassium',
            'calcium'               => 'calcium',
            'iron'                  => 'iron',
            'magnesium'             => 'magnesium',
            'zinc_mg'               => 'zinc',
            'selenium_mcg'          => 'selenium',
            'iodine_mcg'            => 'iodine',
            'copper_mg'             => 'copper',
            'vitamin_a'             => 'vitamin_a',
            'vitamin_c'             => 'vitamin_c',
            'vitamin_d'             => 'vitamin_d',
            'vitamin_e_mg'          => 'vitamin_e',
            'vitamin_k'             => 'vitamin_k',
            'vitamin_k2_mcg'        => 'vitamin_k2',
            'folate'                => 'vitamin_b9',
            'vitamin_b1_mg'         => 'vitamin_b1',
            'vitamin_b2_mg'         => 'vitamin_b2',
            'vitamin_b3_mg'         => 'vitamin_b3',
            'vitamin_b5_mg'         => 'vitamin_b5',
            'vitamin_b6_mg'         => 'vitamin_b6',
            'vitamin_b7_mcg'        => 'vitamin_b7',
            'vitamin_b12_mcg'       => 'vitamin_b12',
            'choline_mg'            => 'choline',
            'lutein_zeaxanthin_mcg' => 'lutein_zeaxanthin',
            'omega3_ala_mg'         => 'omega3_ala',
            'omega3_epa_mg'         => 'omega3_epa',
            'omega3_dha_mg'         => 'omega3_dha',
            'omega6_la_mg'          => 'omega6_la',
            'fat_saturated_g'       => 'fat_saturated_g',
            'fat_trans_g'           => 'fat_trans_g',
            'sugars_g'              => 'sugars_g',
        ];

        // Load RDIs; skip upper-limit-only rows (display_order = 99)
        $rdis = $database->query(
            "SELECT * FROM nutrient_rdis WHERE display_order < 99 ORDER BY display_order"
        )->fetchAll(PDO::FETCH_ASSOC);

        $gaps = [];
        foreach ($rdis as $rdi) {
            $rdiKey    = $rdi['nutrient'];
            $totalsKey = $keyMap[$rdiKey] ?? $rdiKey;
            $period    = $rdi['period'] ?? 'daily';
            $dailyRdi  = (float)($rdi['daily_rdi'] ?? 0);
            if (!$dailyRdi) continue;

            $logged = $period === 'weekly'
                ? ($weekAvg[$totalsKey] ?? 0)
                : ($todayTotals[$totalsKey] ?? 0);

            $gaps[] = [
                'nutrient'   => $rdiKey,
                'label'      => $rdi['label'],
                'unit'       => $rdi['unit'],
                'period'     => $period,
                'logged'     => round((float)$logged, 2),
                'daily_rdi'  => $dailyRdi,
                'pct'        => $dailyRdi > 0 ? round($logged / $dailyRdi * 100, 1) : null,
                'shortfall'  => round(max(0, $dailyRdi - $logged), 2),
                'upper_limit'=> isset($rdi['upper_limit']) ? (float)$rdi['upper_limit'] : null,
            ];
        }

        usort($gaps, fn($a, $b) => ($a['pct'] ?? 999) <=> ($b['pct'] ?? 999));

        json_response([
            'ok'                  => true,
            'date'                => $date,
            'week_start'          => $weekStart,
            'week_days_with_data' => $weekDayCount,
            'gaps'                => $gaps,
        ]);
    }

    if ($view === 'dailies') {
        try { $data = getDailies(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        json_response(['ok' => true, 'dailies' => $data]);
    }

    if ($view === 'recipes') {
        try { $data = getRecipes(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        json_response(['ok' => true, 'recipes' => $data['recipes']]);
    }

    if ($view === 'goals') {
        try { $data = getGoals(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        json_response(['ok' => true, 'goals' => $data['items']]);
    }

    if ($view === 'quotes') {
        try { $data = getQuotes(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        json_response(['ok' => true, 'quotes' => $data['items']]);
    }

    if ($view === 'physical_objects') {
        try { $data = getPhysicalObjects(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        $roomMap = [];
        foreach ($data['rooms'] ?? [] as $r) { $roomMap[(int)$r['id']] = $r['label'] ?? $r['name'] ?? ''; }
        $objMap = fn($o) => [
            'id'          => (int)$o['id'],
            'label'       => $o['label'],
            'location'    => $o['location']    ?? null,
            'room'        => $roomMap[(int)($o['room_id'] ?? 0)] ?? null,
            'status'      => $o['status']      ?? null,
            'task_id'     => isset($o['task_id']) ? (int)$o['task_id'] ?: null : null,
            'created_at'  => $o['created_at']  ?? null,
            'resolved_at' => $o['resolved_at'] ?? null,
        ];
        json_response(['ok' => true, 'objects' => array_map($objMap, $data['objects'] ?? [])]);
    }

    if ($view === 'food_packs') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $foodId = (int)($_GET['food_id'] ?? 0);
        if (!$foodId) json_response(['error' => 'food_id parameter required'], 400);
        try {
            $stmt = $database->prepare(
                "SELECT pack_id, food_id, store, pack_label, pack_size_g, cost_per_pack,
                        last_seen_date, provenance, notes, created_at, updated_at
                 FROM food_packs WHERE food_id = ? ORDER BY store, pack_size_g"
            );
            $stmt->execute([$foodId]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $packs = array_map(fn($r) => [
                'pack_id'        => (int)$r['pack_id'],
                'food_id'        => (int)$r['food_id'],
                'store'          => $r['store'],
                'pack_label'     => $r['pack_label'],
                'pack_size_g'    => (float)$r['pack_size_g'],
                'cost_per_pack'  => (float)$r['cost_per_pack'],
                'cost_per_100g'  => $r['pack_size_g'] > 0 ? round((float)$r['cost_per_pack'] / (float)$r['pack_size_g'] * 100, 4) : null,
                'last_seen_date' => $r['last_seen_date'],
                'provenance'     => $r['provenance'],
                'notes'          => $r['notes'],
                'created_at'     => $r['created_at'],
                'updated_at'     => $r['updated_at'],
            ], $rows);
            json_response(['ok' => true, 'food_id' => $foodId, 'packs' => $packs]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($view === 'food_pack_gaps') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $limit = max(1, min(50, (int)($_GET['limit'] ?? 5)));
        try {
            $stmt = $database->prepare(
                "SELECT f.food_id, f.name, f.category
                 FROM foods f
                 WHERE NOT EXISTS (SELECT 1 FROM food_packs fp WHERE fp.food_id = f.food_id)
                 ORDER BY f.name
                 LIMIT ?"
            );
            $stmt->execute([$limit]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $totalStmt = $database->query(
                "SELECT COUNT(*) FROM foods f WHERE NOT EXISTS (SELECT 1 FROM food_packs fp WHERE fp.food_id = f.food_id)"
            );
            json_response([
                'ok'          => true,
                'foods'       => array_map(fn($r) => ['food_id' => (int)$r['food_id'], 'name' => $r['name'], 'category' => $r['category']], $rows),
                'total_gaps'  => (int)$totalStmt->fetchColumn(),
            ]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($view === 'food_pack_stale') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $days  = max(1, (int)($_GET['days'] ?? 90));
        $limit = max(1, min(50, (int)($_GET['limit'] ?? 10)));
        $cutoff = date('Y-m-d', strtotime("-$days days"));
        try {
            $stmt = $database->prepare(
                "SELECT fp.pack_id, fp.food_id, f.name AS food_name, fp.store, fp.pack_label,
                        fp.pack_size_g, fp.cost_per_pack, fp.last_seen_date
                 FROM food_packs fp
                 JOIN foods f ON f.food_id = fp.food_id
                 WHERE fp.last_seen_date < ?
                 ORDER BY fp.last_seen_date ASC
                 LIMIT ?"
            );
            $stmt->execute([$cutoff, $limit]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            json_response([
                'ok'     => true,
                'cutoff' => $cutoff,
                'packs'  => array_map(fn($r) => [
                    'pack_id'        => (int)$r['pack_id'],
                    'food_id'        => (int)$r['food_id'],
                    'food_name'      => $r['food_name'],
                    'store'          => $r['store'],
                    'pack_label'     => $r['pack_label'],
                    'pack_size_g'    => (float)$r['pack_size_g'],
                    'cost_per_pack'  => (float)$r['cost_per_pack'],
                    'last_seen_date' => $r['last_seen_date'],
                ], $rows),
            ]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($view === 'meal_plan') {
        $date = $_GET['date'] ?? date('Y-m-d');
        try { $entry = getDiaryEntry($date); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        $plan = $entry['meal_plan'] ?? null;
        $recipe = null;
        if ($plan) {
            $recipesToCheck = [];
            foreach ($plan as $mealType => $meal) {
                if (!empty($meal['recipe_id'])) $recipesToCheck[(int)$meal['recipe_id']] = true;
            }
            if ($recipesToCheck) {
                try {
                    $rdata = getRecipes();
                    foreach ($rdata['recipes'] as $r) {
                        if (isset($recipesToCheck[(int)$r['id']])) $recipe[$r['id']] = $r;
                    }
                } catch (Throwable $e) {}
            }
        }
        json_response(['ok' => true, 'date' => $date, 'meal_plan' => $plan, 'recipes' => $recipe]);
    }

    if ($view === 'contexts') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        try {
            $rows = $database->query("SELECT context, description FROM contexts ORDER BY context")->fetchAll(PDO::FETCH_ASSOC);
            json_response(['ok' => true, 'contexts' => $rows]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    json_response(['error' => "Unknown view '$view'. Valid: tasks, inbox, all_tasks, config, snapshot, food_log, food_search, nutrition_gaps, api_keys, people, person, habitica_task, habitica_dailies, recipes, goals, quotes, physical_objects, food_packs, food_pack_gaps, food_pack_stale, meal_plan, contexts"], 400);
}

// ---- POST ----
if ($method === 'POST') {
    $body   = json_decode(file_get_contents('php://input'), true) ?? [];
    $action = $body['action'] ?? '';

    if ($action === 'update_daily') {
        $id     = (int)($body['daily_id'] ?? 0);
        $fields = $body['fields'] ?? [];
        if (!$id || !$fields) json_response(['error' => 'Missing daily_id or fields'], 400);
        $allowed = ['title', 'notes', 'morning', 'horizon', 'show_after', 'is_active', 'frequency', 'everyX', 'repeat', 'start_date'];
        try {
            $data = getDailies();
            $found = false;
            foreach ($data['items'] as &$d) {
                if ((int)$d['id'] === $id) {
                    foreach ($fields as $k => $v) {
                        if (in_array($k, $allowed, true)) $d[$k] = $v;
                    }
                    $found = true;
                    break;
                }
            }
            unset($d);
            if (!$found) json_response(['error' => 'Daily not found'], 404);
            saveDailies($data);
            json_response(['ok' => true, 'daily_id' => $id, 'updated' => array_intersect_key($fields, array_flip($allowed))]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'update_task') {
        $taskId = (int)($body['task_id'] ?? 0);
        if (!$taskId) json_response(['error' => 'Missing task_id'], 400);
        try {
            $fields = updateTaskFieldsShared($taskId, $body['fields'] ?? []);
            json_response(['ok' => true, 'updated' => $fields, 'top3_completed' => top3DrainCompleted()]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'set_story_pages') {
        $pages = isset($body['pages']) ? (int)$body['pages'] : null;
        if ($pages === null || $pages < 0) json_response(['error' => 'Missing or invalid pages (must be >= 0)'], 400);
        try {
            $cfg = getConfig() ?? [];
            $cfg['story_pages'] = $pages;
            saveConfig($cfg);
            json_response(['ok' => true, 'story_pages' => $pages]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_context') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $ctx = trim($body['context'] ?? '');
        if (!$ctx) json_response(['error' => 'Missing context'], 400);
        $desc = trim($body['description'] ?? '') ?: null;
        try {
            $stmt = $database->prepare("INSERT OR IGNORE INTO contexts (context, description) VALUES (?, ?)");
            $stmt->execute([$ctx, $desc]);
            $inserted = $database->lastInsertId() > 0;
            json_response(['ok' => true, 'context' => $ctx, 'inserted' => $inserted]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'rename_context') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $old = trim($body['old_context'] ?? '');
        $new = trim($body['new_context'] ?? '');
        if (!$old || !$new) json_response(['error' => 'Missing old_context or new_context'], 400);
        if ($old === $new) json_response(['ok' => true, 'renamed' => 0, 'tasks_updated' => 0]);
        try {
            $stmt = $database->prepare("UPDATE contexts SET context = ? WHERE context = ?");
            $stmt->execute([$new, $old]);
            $renamed = $stmt->rowCount();

            $data = getTasks();
            $tasksUpdated = 0;
            foreach ($data['tasks'] as &$t) {
                if (($t['context'] ?? null) === $old) {
                    $t['context'] = $new;
                    $tasksUpdated++;
                }
            }
            unset($t);
            if ($tasksUpdated > 0) saveTasks($data);

            json_response(['ok' => true, 'renamed' => $renamed, 'tasks_updated' => $tasksUpdated]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_food_pack') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $foodId = (int)($body['food_id'] ?? 0);
        $store  = trim($body['store'] ?? '');
        $sizeG  = isset($body['pack_size_g']) ? (float)$body['pack_size_g'] : 0.0;
        $cost   = isset($body['cost_per_pack']) ? (float)$body['cost_per_pack'] : null;
        if (!$foodId || !$store || $sizeG <= 0 || $cost === null) {
            json_response(['error' => 'food_id, store, pack_size_g, and cost_per_pack are required'], 400);
        }
        try {
            $existsStmt = $database->prepare("SELECT COUNT(*) FROM foods WHERE food_id = ?");
            $existsStmt->execute([$foodId]);
            if (!(int)$existsStmt->fetchColumn()) json_response(['error' => 'food_id not found'], 404);

            $now  = date('c');
            $seen = $body['last_seen_date'] ?? date('Y-m-d');
            $prov = trim($body['provenance'] ?? '') ?: 'user_reported';
            $label = isset($body['pack_label']) ? trim($body['pack_label']) : null;
            $notes = isset($body['notes']) ? trim($body['notes']) : null;

            $stmt = $database->prepare(
                "INSERT INTO food_packs
                    (food_id, store, pack_label, pack_size_g, cost_per_pack, last_seen_date, provenance, notes, created_at, updated_at)
                 VALUES (:food_id, :store, :pack_label, :pack_size_g, :cost_per_pack, :last_seen_date, :provenance, :notes, :created_at, :updated_at)
                 ON CONFLICT(food_id, store, pack_size_g) DO UPDATE SET
                    cost_per_pack  = excluded.cost_per_pack,
                    last_seen_date = excluded.last_seen_date,
                    pack_label     = COALESCE(excluded.pack_label, food_packs.pack_label),
                    provenance     = excluded.provenance,
                    notes          = COALESCE(excluded.notes, food_packs.notes),
                    updated_at     = excluded.updated_at"
            );
            $stmt->execute([
                ':food_id' => $foodId, ':store' => $store, ':pack_label' => $label,
                ':pack_size_g' => $sizeG, ':cost_per_pack' => $cost, ':last_seen_date' => $seen,
                ':provenance' => $prov, ':notes' => $notes, ':created_at' => $now, ':updated_at' => $now,
            ]);
            $idStmt = $database->prepare("SELECT pack_id FROM food_packs WHERE food_id = ? AND store = ? AND pack_size_g = ?");
            $idStmt->execute([$foodId, $store, $sizeG]);
            $packId = (int)$idStmt->fetchColumn();
            json_response(['ok' => true, 'pack_id' => $packId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_food_packs_batch') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $entries = $body['entries'] ?? [];
        if (!is_array($entries) || !$entries) json_response(['error' => 'entries (array) required'], 400);
        $defaultProv = trim($body['provenance'] ?? '') ?: 'receipt_extract';
        $now = date('c');
        $today = date('Y-m-d');
        try {
            $existsStmt = $database->prepare("SELECT COUNT(*) FROM foods WHERE food_id = ?");
            $stmt = $database->prepare(
                "INSERT INTO food_packs
                    (food_id, store, pack_label, pack_size_g, cost_per_pack, last_seen_date, provenance, notes, created_at, updated_at)
                 VALUES (:food_id, :store, :pack_label, :pack_size_g, :cost_per_pack, :last_seen_date, :provenance, :notes, :created_at, :updated_at)
                 ON CONFLICT(food_id, store, pack_size_g) DO UPDATE SET
                    cost_per_pack  = excluded.cost_per_pack,
                    last_seen_date = excluded.last_seen_date,
                    pack_label     = COALESCE(excluded.pack_label, food_packs.pack_label),
                    provenance     = excluded.provenance,
                    notes          = COALESCE(excluded.notes, food_packs.notes),
                    updated_at     = excluded.updated_at"
            );
            $results = [];
            foreach ($entries as $i => $e) {
                $foodId = (int)($e['food_id'] ?? 0);
                $store  = trim($e['store'] ?? '');
                $sizeG  = isset($e['pack_size_g']) ? (float)$e['pack_size_g'] : 0.0;
                $cost   = isset($e['cost_per_pack']) ? (float)$e['cost_per_pack'] : null;
                if (!$foodId || !$store || $sizeG <= 0 || $cost === null) {
                    $results[] = ['index' => $i, 'ok' => false, 'error' => 'missing food_id/store/pack_size_g/cost_per_pack'];
                    continue;
                }
                $existsStmt->execute([$foodId]);
                if (!(int)$existsStmt->fetchColumn()) {
                    $results[] = ['index' => $i, 'ok' => false, 'error' => "food_id $foodId not found"];
                    continue;
                }
                try {
                    $stmt->execute([
                        ':food_id' => $foodId, ':store' => $store,
                        ':pack_label' => isset($e['pack_label']) ? trim($e['pack_label']) : null,
                        ':pack_size_g' => $sizeG, ':cost_per_pack' => $cost,
                        ':last_seen_date' => $e['last_seen_date'] ?? $today,
                        ':provenance' => $defaultProv,
                        ':notes' => isset($e['notes']) ? trim($e['notes']) : null,
                        ':created_at' => $now, ':updated_at' => $now,
                    ]);
                    $results[] = ['index' => $i, 'ok' => true, 'food_id' => $foodId, 'store' => $store];
                } catch (Throwable $rowErr) {
                    $results[] = ['index' => $i, 'ok' => false, 'error' => $rowErr->getMessage()];
                }
            }
            json_response(['ok' => true, 'results' => $results]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'update_food_pack') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $packId = (int)($body['pack_id'] ?? 0);
        $fields = $body['fields'] ?? [];
        if (!$packId || !$fields) json_response(['error' => 'Missing pack_id or fields'], 400);
        $allowed = ['store', 'pack_label', 'pack_size_g', 'cost_per_pack', 'last_seen_date', 'provenance', 'notes'];
        $set = [];
        $params = [':pack_id' => $packId];
        foreach ($fields as $k => $v) {
            if (!in_array($k, $allowed, true)) continue;
            $set[] = "$k = :$k";
            $params[":$k"] = $v;
        }
        if (!$set) json_response(['error' => 'No valid fields to update'], 400);
        $set[] = "updated_at = :updated_at";
        $params[':updated_at'] = date('c');
        try {
            $stmt = $database->prepare("UPDATE food_packs SET " . implode(', ', $set) . " WHERE pack_id = :pack_id");
            $stmt->execute($params);
            if ($stmt->rowCount() === 0) json_response(['error' => 'Pack not found'], 404);
            json_response(['ok' => true, 'pack_id' => $packId, 'updated' => array_intersect_key($fields, array_flip($allowed))]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'delete_food_pack') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $packId = (int)($body['pack_id'] ?? 0);
        if (!$packId) json_response(['error' => 'pack_id required'], 400);
        try {
            $stmt = $database->prepare("DELETE FROM food_packs WHERE pack_id = ?");
            $stmt->execute([$packId]);
            json_response(['ok' => true, 'deleted' => $stmt->rowCount() > 0]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    // Deletes an arbitrary Habitica task by its raw Habitica task ID — unlike
    // habiticaDeleteTaskBestEffort() (habitica_helper.php), which only ever
    // acts on a vault task's stored habitica_id, this reaches tasks that
    // exist purely on Habitica's side with no corresponding vault task
    // (e.g. old dailies never imported by habitica_sync.php, which only
    // imports todos/checklist items, not dailies).
    if ($action === 'delete_habitica_task') {
        $habId = trim($body['habitica_id'] ?? '');
        if (!$habId) json_response(['error' => 'habitica_id required'], 400);
        try {
            $cfg = getConfig() ?? [];
            if (empty($cfg['preferences']['uses_habitica'])) json_response(['error' => 'Habitica not configured'], 400);
            require_once __DIR__ . '/habitica_helper.php';
            $cass    = getCassowary();
            $habUser = $cass['habitica']['user_id'] ?? '';
            $habKey  = $cass['habitica']['api_key']  ?? '';
            if (!$habUser || !$habKey) json_response(['error' => 'No Habitica credentials'], 400);
            habiticaRequest('DELETE', '/tasks/' . urlencode($habId), $habUser, $habKey);
            json_response(['ok' => true, 'deleted' => true]);
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
            // location: multi-select array (a task can be doable at more than
            // one place) — accepts an array or a single legacy string,
            // normalized the same way updateTaskFieldsShared() does.
            $rawLoc = $body['location'] ?? null;
            $locs   = is_array($rawLoc) ? $rawLoc : (is_string($rawLoc) && $rawLoc !== '' ? [$rawLoc] : []);
            $locs   = array_values(array_unique(array_filter(array_map(
                fn($l) => strtolower(trim((string)$l)),
                $locs
            ), fn($l) => in_array($l, ['home', 'work', 'shops', 'phone', 'online'], true))));
            vaultAppendTask($data, [
                'id'            => $taskId,
                'title'         => $title,
                'task_type'     => $body['task_type']     ?? 'next_action',
                'urgency'       => $body['urgency']       ?? 'medium',
                'importance'    => $body['importance']    ?? 'medium',
                'energy'        => $body['energy']        ?? 'medium',
                'time'          => isset($body['time']) ? (int)$body['time'] : null,
                'status'        => 'active',
                'context'       => $body['context']       ?? null,
                'location'      => $locs ?: null,
                'deadline'      => $body['deadline']      ?? null,
                'snoozed_until' => $body['snoozed_until'] ?? null,
                'parent_id'     => $body['parent_id']     ?? null,
                'person_id'     => $body['person_id']     ?? null,
                'description'   => $body['description']   ?? null,
                'tags'          => $body['tags']          ?? null,
                'goal_id'       => $body['goal_id']       ?? null,
                'created_at'    => date('c'),
            ]);
            $data['next_id'] = $taskId + 1;
            saveTasks($data);
            try { creditTop3Progress('task_add', 1); } catch (Throwable $e) {}

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
                            $newTask = end($data['tasks']);
                            $created = habiticaRequest('POST', '/tasks/user', $habUser, $habKey, [
                                'type'  => 'todo',
                                'text'  => $title,
                                'notes' => habiticaMetaNotes($newTask),
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

            json_response(['ok' => true, 'task_id' => $taskId, 'top3_completed' => top3DrainCompleted()]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_want_to') {
        $text = mb_substr(trim($body['text'] ?? ''), 0, 200);
        if (!$text) json_response(['error' => 'text required'], 400);
        try { $id = addWantToItem($text); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        json_response(['ok' => true, 'id' => $id]);
    }

    if ($action === 'remove_want_to') {
        $id = (int)($body['id'] ?? 0);
        if (!$id) json_response(['error' => 'id required'], 400);
        try {
            $wt = getWantTo();
            $wt['items'] = array_values(array_filter($wt['items'], fn($i) => (int)$i['id'] !== $id));
            saveWantTo($wt);
        } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        json_response(['ok' => true]);
    }

    if ($action === 'add_quote') {
        $text = trim($body['text'] ?? '');
        if (!$text) json_response(['error' => 'text is required'], 400);
        $quotes = getQuotes();
        $id = $quotes['next_id'];
        $quotes['items'][] = ['id' => $id, 'text' => $text];
        $quotes['next_id']++;
        saveQuotes($quotes);
        json_response(['ok' => true, 'id' => $id, 'total' => count($quotes['items'])]);
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
            if ($date === date('Y-m-d')) {
                try {
                    creditTop3Progress('food_log', 1);
                    if (empty($body['is_writeoff']) && $database) {
                        creditTop3Progress('nutrient_hit', top3NutrientsAtRdiCount($date));
                    }
                } catch (Throwable $e) {}
            }
            json_response(['ok' => true, 'log_id' => $lid, 'top3_completed' => top3DrainCompleted()]);
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

    if ($action === 'migrate_person_archived') {
        // One-shot: 'archived' is the field the original people UI used to
        // mark a contact archived; a later is_active field duplicated it and
        // became the one every call site actually read/wrote, leaving
        // 'archived' dead. This backfills archived from each person's
        // current is_active value and drops is_active so archived becomes
        // the single canonical field.
        try {
            $data    = getPeople();
            $migrated = 0;
            foreach ($data['people'] as &$p) {
                if (array_key_exists('is_active', $p)) {
                    $p['archived'] = (($p['is_active'] ?? 1) == 0);
                    unset($p['is_active']);
                    $migrated++;
                } elseif (!array_key_exists('archived', $p)) {
                    $p['archived'] = false;
                }
            }
            unset($p);
            if ($migrated > 0) savePeople($data);
            json_response(['ok' => true, 'migrated' => $migrated]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'delete_task') {
        $taskId = (int)($body['task_id'] ?? 0);
        if (!$taskId) json_response(['error' => 'Missing task_id'], 400);
        try {
            // Read before deleting so we can propagate to Habitica
            $allData     = getTasks();
            $taskToDelete = null;
            $changed      = false;
            foreach ($allData['tasks'] as $t) {
                if ((int)$t['id'] === $taskId) { $taskToDelete = $t; break; }
            }
            foreach ($allData['tasks'] as &$t) {
                if ((int)$t['id'] === $taskId && ($t['status'] ?? '') === 'active') {
                    $t['status'] = 'deleted';
                    $changed = true;
                } elseif (!empty($t['parent_id']) && (int)$t['parent_id'] === $taskId && ($t['status'] ?? '') === 'active') {
                    $t['status'] = 'deleted';
                    $changed = true;
                }
            }
            unset($t);
            // If the deleted task was itself a subtask, unlink it from its parent
            if ($changed && $taskToDelete && !empty($taskToDelete['parent_id'])) {
                vaultUnlinkSubtask($allData, (int)$taskToDelete['parent_id'], $taskId);
            }
            if ($changed) saveTasks($allData);
            if ($changed && $taskToDelete && ($taskToDelete['status'] ?? '') === 'active') {
                try { creditTop3Progress('declutter', 1); } catch (Throwable $e) {}
            }

            if ($taskToDelete) {
                require_once __DIR__ . '/habitica_helper.php';
                habiticaDeleteTaskBestEffort($taskToDelete);
                require_once __DIR__ . '/gcal_helper.php';
                gcalDeleteEventBestEffort($taskToDelete);
            }

            json_response(['ok' => true, 'top3_completed' => top3DrainCompleted()]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'backfill_subtask_ids') {
        try {
            $data = getTasks();
            $count = 0;
            foreach ($data['tasks'] as $t) {
                if (!empty($t['parent_id'])) {
                    vaultLinkSubtask($data, (int)$t['parent_id'], (int)$t['id']);
                    $count++;
                }
            }
            saveTasks($data);
            json_response(['ok' => true, 'linked' => $count]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'bulk_clear_field') {
        $field = $body['field'] ?? '';
        $allowedFields = ['urgency', 'importance', 'energy', 'context'];
        if (!in_array($field, $allowedFields, true)) {
            json_response(['error' => 'field must be one of: ' . implode(', ', $allowedFields)], 400);
        }
        try {
            $data  = getTasks();
            $count = 0;
            foreach ($data['tasks'] as &$t) {
                if (($t['status'] ?? '') === 'active' && ($t[$field] ?? null) !== null) {
                    $t[$field] = null;
                    $count++;
                }
            }
            unset($t);
            if ($count > 0) saveTasks($data);
            json_response(['ok' => true, 'field' => $field, 'cleared' => $count]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'rotate_api_key') {
        if (!extension_loaded('sodium')) json_response(['error' => 'libsodium missing'], 500);

        $newToken = 'bsk_' . bin2hex(random_bytes(32));
        $label    = 'claude-' . strtolower(date('M-d')); // e.g. claude-jun-06
        $kek      = substr(hash('sha256', $newToken, true), 0, 32);
        $dek      = b64u_dec($_SESSION['DEK']);
        $nonce    = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
        $ct       = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($dek, '', $nonce, $kek);
        $newKeyId = bin2hex(random_bytes(8));
        $uid      = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');

        // Store wrapped DEK for new key
        $wrapDir = __DIR__ . "/../config/$uid/apikeys";
        @mkdir($wrapDir, 0700, true);
        file_put_contents("$wrapDir/$newKeyId.json", json_encode([
            'nonce' => base64_encode($nonce),
            'ct'    => base64_encode($ct),
        ], JSON_UNESCAPED_SLASHES), LOCK_EX);

        // Update global index; also find old key_id from current token
        $indexPath = __DIR__ . '/../data/apikeys.json';
        $index = file_exists($indexPath) ? (json_decode(file_get_contents($indexPath), true) ?? []) : [];
        $oldKeyId = $index[hash('sha256', $token)]['key_id'] ?? null;
        $index[hash('sha256', $newToken)] = ['user_id' => $_SESSION['user_id'] ?? 'default', 'key_id' => $newKeyId];
        file_put_contents($indexPath, json_encode($index, JSON_UNESCAPED_SLASHES), LOCK_EX);

        // Metadata in cassowary
        try {
            $cass = getCassowary();
            $cass['api_keys'][$newKeyId] = ['label' => $label, 'created_at' => date('c')];
            saveCassowary($cass);
        } catch (Throwable $e) { /* non-fatal */ }

        json_response([
            'ok'         => true,
            'new_token'  => $newToken,
            'new_key_id' => $newKeyId,
            'old_key_id' => $oldKeyId,
            'label'      => $label,
            'note'       => 'Save new_token to disk, verify it works, then call revoke_api_key with old_key_id.',
        ]);
    }

    if ($action === 'revoke_api_key') {
        $keyId = preg_replace('/[^A-Za-z0-9]/', '', $body['key_id'] ?? '');
        if (!$keyId) json_response(['error' => 'key_id required'], 400);

        $indexPath = __DIR__ . '/../data/apikeys.json';
        $index = file_exists($indexPath) ? (json_decode(file_get_contents($indexPath), true) ?? []) : [];

        // Refuse to revoke the key currently in use
        $currentKeyId = $index[hash('sha256', $token)]['key_id'] ?? null;
        if ($keyId === $currentKeyId) json_response(['error' => 'Cannot revoke the key currently in use — rotate first'], 400);

        // Verify the key belongs to this user
        $belongs = false;
        foreach ($index as $entry) {
            if ($entry['key_id'] === $keyId && $entry['user_id'] === ($_SESSION['user_id'] ?? 'default')) {
                $belongs = true; break;
            }
        }
        if (!$belongs) json_response(['error' => 'Key not found or not yours'], 404);

        $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
        @unlink(__DIR__ . "/../config/$uid/apikeys/$keyId.json");

        $index = array_filter($index, fn($v) => $v['key_id'] !== $keyId);
        file_put_contents($indexPath, json_encode($index, JSON_UNESCAPED_SLASHES), LOCK_EX);

        try {
            $cass = getCassowary();
            unset($cass['api_keys'][$keyId]);
            saveCassowary($cass);
        } catch (Throwable $e) { /* non-fatal */ }

        json_response(['ok' => true, 'revoked' => $keyId]);
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

    if ($action === 'delete_person_note') {
        $noteId = (int)($body['note_id'] ?? 0);
        if (!$noteId) json_response(['error' => 'Missing note_id'], 400);
        try {
            $deleted = vaultDeletePeopleNote($noteId);
            if (!$deleted) json_response(['error' => 'Note not found'], 404);
            json_response(['ok' => true, 'note_id' => $noteId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'update_person') {
        $personId = (int)($body['person_id'] ?? 0);
        if (!$personId) json_response(['error' => 'Missing person_id'], 400);
        // DOB/MOB/YOB (day/month/year of birth, year optional) added so the
        // birthday cue (getUpcomingBirthdays() in config_helper.php) can be
        // corrected — there's still no dedicated UI for it, hence the
        // comment there about most values being legacy-imported.
        $allowed = ['name', 'birthday', 'circles', 'next_review_date', 'review_interval',
                    'archived', 'qualities', 'phone', 'email', 'DOB', 'MOB', 'YOB'];
        $fields  = array_intersect_key($body['fields'] ?? [], array_flip($allowed));
        if (!$fields) json_response(['error' => 'No valid fields to update'], 400);
        if (array_key_exists('DOB', $fields) && $fields['DOB'] !== null
            && ((int)$fields['DOB'] < 1 || (int)$fields['DOB'] > 31)) {
            json_response(['error' => 'DOB must be 1-31 or null'], 400);
        }
        if (array_key_exists('MOB', $fields) && $fields['MOB'] !== null
            && ((int)$fields['MOB'] < 1 || (int)$fields['MOB'] > 12)) {
            json_response(['error' => 'MOB must be 1-12 or null'], 400);
        }
        try {
            vaultUpdatePerson($personId, $fields);
            json_response(['ok' => true, 'updated' => $fields]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_goal') {
        $title = trim($body['title'] ?? '');
        if (!$title) json_response(['error' => 'title required'], 400);
        try {
            $data = getGoals();
            $id   = (int)($data['next_id'] ?? 1);
            $data['items'][] = [
                'id'         => $id,
                'title'      => $title,
                'created_at' => date('c'),
            ];
            $data['next_id'] = $id + 1;
            saveGoals($data);
            json_response(['ok' => true, 'goal_id' => $id]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'delete_goal') {
        $goalId = (int)($body['goal_id'] ?? 0);
        if (!$goalId) json_response(['error' => 'goal_id required'], 400);
        try {
            $data = getGoals();
            $data['items'] = array_values(array_filter($data['items'], fn($g) => (int)$g['id'] !== $goalId));
            saveGoals($data);
            json_response(['ok' => true]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'reconcile_physical_objects') {
        // One-off data fix: find_home/link_task used to mark an object 'resolved' the
        // moment it was handed to a task, instead of when the task was actually done.
        // Revert any object whose linked task is still active — it's still physically out.
        try {
            $objData = getPhysicalObjects();
            $tasks   = getTasks()['tasks'];
            $taskMap = [];
            foreach ($tasks as $t) { $taskMap[(int)$t['id']] = $t['status'] ?? null; }
            $reverted = [];
            foreach ($objData['objects'] as &$o) {
                if (($o['status'] ?? '') !== 'resolved' || empty($o['task_id'])) continue;
                $taskStatus = $taskMap[(int)$o['task_id']] ?? null;
                if ($taskStatus === 'active') {
                    $o['status']      = 'out';
                    $o['resolved_at'] = null;
                    $reverted[] = ['id' => (int)$o['id'], 'label' => $o['label'], 'task_id' => (int)$o['task_id']];
                }
            }
            unset($o);
            if ($reverted) savePhysicalObjects($objData);
            json_response(['ok' => true, 'reverted' => $reverted]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_recipe') {
        $name = trim($body['name'] ?? '');
        if (!$name) json_response(['error' => 'name required'], 400);
        try {
            $data   = getRecipes();
            $id     = (int)($data['next_id'] ?? 1);
            $data['recipes'][] = [
                'id'               => $id,
                'name'             => $name,
                'ingredients_text' => trim($body['ingredients_text'] ?? ''),
                'notes'            => trim($body['notes'] ?? ''),
                'default_portions' => isset($body['default_portions']) ? (int)$body['default_portions'] : null,
                'tags'             => $body['tags'] ?? [],
                'created_at'       => date('c'),
            ];
            $data['next_id'] = $id + 1;
            saveRecipes($data);
            json_response(['ok' => true, 'recipe_id' => $id]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'delete_recipe') {
        $recipeId = (int)($body['recipe_id'] ?? 0);
        if (!$recipeId) json_response(['error' => 'recipe_id required'], 400);
        try {
            $data = getRecipes();
            $data['recipes'] = array_values(array_filter($data['recipes'], fn($r) => (int)$r['id'] !== $recipeId));
            saveRecipes($data);
            json_response(['ok' => true]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'update_recipe') {
        $recipeId = (int)($body['recipe_id'] ?? 0);
        if (!$recipeId) json_response(['error' => 'recipe_id required'], 400);
        try {
            $data  = getRecipes();
            $found = false;
            foreach ($data['recipes'] as &$r) {
                if ((int)$r['id'] !== $recipeId) continue;
                $found = true;
                if (isset($body['name']))             $r['name']             = trim($body['name']);
                if (isset($body['ingredients_text'])) $r['ingredients_text'] = trim($body['ingredients_text']);
                if (isset($body['notes']))            $r['notes']            = trim($body['notes']);
                if (isset($body['default_portions'])) $r['default_portions'] = (int)$body['default_portions'];
                if (isset($body['tags']))             $r['tags']             = $body['tags'];
                if (isset($body['ingredient_matches'])) {
                    $r['ingredient_matches'] = $body['ingredient_matches'];
                    unset($r['batch_nutrition'], $r['portion_nutrition'], $r['nutrition_notes']);
                }
                $r['updated_at'] = date('c');
                break;
            }
            unset($r);
            if (!$found) json_response(['error' => 'Recipe not found'], 404);
            saveRecipes($data);
            json_response(['ok' => true]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'plan_meal') {
        $date     = $body['date'] ?? date('Y-m-d');
        $mealType = $body['meal_type'] ?? 'dinner';
        $name     = trim($body['name'] ?? '');
        $recipeId = isset($body['recipe_id']) ? (int)$body['recipe_id'] : null;
        if (!$name && !$recipeId) json_response(['error' => 'name or recipe_id required'], 400);
        // Look up recipe name if only recipe_id given
        if (!$name && $recipeId) {
            try {
                foreach (getRecipes()['recipes'] as $r) {
                    if ((int)$r['id'] === $recipeId) { $name = $r['name']; break; }
                }
            } catch (Throwable $e) {}
        }
        try {
            $existing = getDiaryEntry($date);
            $plan = $existing['meal_plan'] ?? [];
            $plan[$mealType] = array_filter(['name' => $name, 'recipe_id' => $recipeId], fn($v) => $v !== null);
            saveDiaryEntry($date, ['meal_plan' => $plan]);
            json_response(['ok' => true, 'date' => $date, 'meal_type' => $mealType, 'name' => $name]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'clear_meal') {
        $date     = $body['date'] ?? date('Y-m-d');
        $mealType = $body['meal_type'] ?? 'dinner';
        try {
            $existing = getDiaryEntry($date);
            $plan = $existing['meal_plan'] ?? [];
            unset($plan[$mealType]);
            saveDiaryEntry($date, ['meal_plan' => $plan ?: null]);
            json_response(['ok' => true]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'precalculate_recipe') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $recipeId = (int)($body['recipe_id'] ?? 0);
        if (!$recipeId) json_response(['error' => 'recipe_id required'], 400);
        // If no ingredients in body, fall back to stored ingredient_matches on the recipe
        try { $allRecipes = getRecipes(); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }
        $storedRecipe = null;
        foreach ($allRecipes['recipes'] as $r) {
            if ((int)$r['id'] === $recipeId) { $storedRecipe = $r; break; }
        }
        if (!$storedRecipe) json_response(['error' => 'Recipe not found'], 404);
        $ingredients = $body['ingredients'] ?? $storedRecipe['ingredient_matches'] ?? [];
        $manual      = $body['manual_nutrients'] ?? [];
        $notes       = $body['nutrition_notes'] ?? '';

        $result = computeRecipeTotals($database, $ingredients, $manual);

        // Determine portions (reuse $allRecipes/$storedRecipe already fetched above)
        $recipes = $allRecipes;
        $recipe  = $storedRecipe;
        $portions = (int)($body['portions'] ?? $recipe['default_portions'] ?? 1);
        if ($portions < 1) $portions = 1;

        $batch_nutrition   = $result['nutrition'];
        $portion_nutrition = array_map(fn($v) => round($v / $portions, 3), $result['nutrition']);
        $batch_cost        = $result['cost'];
        $portion_cost      = round($batch_cost / $portions, 2);

        // Save back to recipe
        foreach ($recipes['recipes'] as &$r) {
            if ((int)$r['id'] === $recipeId) {
                $r['batch_nutrition']    = $batch_nutrition;
                $r['portion_nutrition']  = $portion_nutrition;
                $r['batch_cost']         = $batch_cost;
                $r['portion_cost']       = $portion_cost;
                $r['default_portions']   = $portions;
                $r['nutrition_notes']    = $notes;
                $r['ingredient_matches'] = $ingredients;
                break;
            }
        }
        unset($r);
        try { saveRecipes($recipes); } catch (Throwable $e) { json_response(['error' => $e->getMessage()], 500); }

        json_response([
            'ok'                => true,
            'recipe_id'         => $recipeId,
            'portions'          => $portions,
            'batch_nutrition'   => $batch_nutrition,
            'portion_nutrition' => $portion_nutrition,
            'batch_cost'        => $batch_cost,
            'portion_cost'      => $portion_cost,
            'per_ingredient'    => $result['per_ingredient'],
        ]);
    }

    if ($action === 'log_recipe_portion') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $recipeId = (int)($body['recipe_id'] ?? 0);
        $fraction = (float)($body['fraction'] ?? 1.0);
        if (!$recipeId) json_response(['error' => 'recipe_id required'], 400);
        if ($fraction <= 0 || $fraction > 20) json_response(['error' => 'fraction out of range'], 400);
        try {
            $recipes = getRecipes();
            $recipe  = null;
            foreach ($recipes['recipes'] as $r) {
                if ((int)$r['id'] === $recipeId) { $recipe = $r; break; }
            }
            if (!$recipe) json_response(['error' => 'Recipe not found'], 404);
            $ingredients = $recipe['ingredient_matches'] ?? [];
            if (empty($ingredients)) json_response(['error' => 'No ingredient_matches — run precalculate_recipe first'], 400);

            $foodLog = getFoodLog();
            $today   = date('Y-m-d');
            $entries = $foodLog['entries'][$today] ?? [];
            $nextId  = (int)($foodLog['next_id'] ?? 1);
            $logged  = [];

            foreach ($ingredients as $ing) {
                $foodId  = (int)($ing['food_id'] ?? 0);
                $weightG = round((float)($ing['weight_g'] ?? 0) * $fraction, 1);
                if (!$foodId || $weightG <= 0) continue;
                $stmt = $database->prepare("SELECT serving_id FROM food_servings WHERE food_id = ? AND weight_g = 1 ORDER BY serving_id LIMIT 1");
                $stmt->execute([$foodId]);
                $servingId = (int)($stmt->fetchColumn() ?: 0);
                if (!$servingId) continue;
                $entry = [
                    'log_id'         => $nextId++,
                    'food_id'        => $foodId,
                    'serving_id'     => $servingId,
                    'quantity'       => $weightG,
                    'is_writeoff'    => false,
                    'writeoff_label' => null,
                    'logged_at'      => date('Y-m-d H:i:s'),
                ];
                $entries[] = $entry;
                $logged[]  = $entry;
            }

            $foodLog['entries'][$today] = $entries;
            $foodLog['next_id'] = $nextId;
            saveFoodLog($foodLog);
            json_response(['ok' => true, 'recipe' => $recipe['name'], 'fraction' => $fraction, 'logged_items' => count($logged)]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'set_preference') {
        $allowed = ['payday_day'];
        $key     = $body['key']   ?? '';
        $value   = $body['value'] ?? null;
        if (!in_array($key, $allowed, true)) json_response(['error' => "Unknown preference key '$key'. Allowed: " . implode(', ', $allowed)], 400);
        if ($value === null) json_response(['error' => 'value required'], 400);
        try {
            $cfg = getConfig() ?? [];
            $cfg['preferences'][$key] = $value;
            saveConfig($cfg);
            json_response(['ok' => true, 'key' => $key]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'save_period_pref') {
        try {
            $cfg = getConfig() ?? [];
            $pt  = $cfg['period_tracking'] ?? [];
            if (array_key_exists('enabled', $body))
                $pt['enabled'] = (bool)$body['enabled'];
            if (array_key_exists('lmp', $body))
                $pt['lmp'] = preg_match('/^\d{4}-\d{2}-\d{2}$/', (string)$body['lmp']) ? $body['lmp'] : ($pt['lmp'] ?? null);
            if (array_key_exists('cycle_min', $body))
                $pt['cycle_min'] = max(14, min(60, (int)$body['cycle_min']));
            if (array_key_exists('cycle_max', $body))
                $pt['cycle_max'] = max(14, min(60, (int)$body['cycle_max']));
            $cfg['period_tracking'] = $pt;
            saveConfig($cfg);
            json_response(['ok' => true]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_person') {
        $name    = trim($body['name'] ?? '');
        if (!$name) json_response(['error' => 'name required'], 400);
        $circles = isset($body['circles']) ? (array)$body['circles'] : [];
        try {
            $data     = getPeople();
            $personId = (int)($data['next_id'] ?? 1);
            $data['people'][] = [
                'person_id'       => $personId,
                'name'            => $name,
                'circles'         => $circles,
                'next_review'     => null,
                'review_interval' => 30,
                'archived'        => false,
                'created_at'      => date('c'),
            ];
            $data['next_id'] = $personId + 1;
            savePeople($data);
            json_response(['ok' => true, 'person_id' => $personId, 'name' => $name]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'archive_context') {
        if (!$database) json_response(['error' => 'Database unavailable'], 503);
        $ctx = trim($body['context'] ?? '');
        if (!$ctx) json_response(['error' => 'context required'], 400);
        try {
            // Mark context inactive in SQLite
            $stmt = $database->prepare("UPDATE contexts SET is_active=0 WHERE context=?");
            $stmt->execute([$ctx]);
            // Archive all people whose circles contain this context
            $data = getPeople();
            $archivedPeople = 0;
            foreach ($data['people'] as &$p) {
                $circles = is_array($p['circles'] ?? null) ? $p['circles'] : [];
                if (in_array($ctx, $circles, true) && !personIsArchived($p)) {
                    $p['archived'] = true;
                    $archivedPeople++;
                }
            }
            unset($p);
            if ($archivedPeople) savePeople($data);
            json_response(['ok' => true, 'context' => $ctx, 'people_archived' => $archivedPeople]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'migrate_circles') {
        // One-shot: fold people.context (string) into people.circles (array), then remove context field.
        try {
            $data = getPeople();
            $migrated = 0;
            foreach ($data['people'] as &$p) {
                $existing = $p['circles'] ?? null;
                $ctx      = $p['context'] ?? null;
                if (is_string($existing) && $existing !== '') $existing = [$existing];
                elseif (!is_array($existing)) $existing = [];
                if ($ctx && !in_array($ctx, $existing, true)) {
                    $existing[] = $ctx;
                    $migrated++;
                }
                $p['circles'] = $existing;
                unset($p['context']);
            }
            unset($p);
            savePeople($data);
            json_response(['ok' => true, 'migrated' => $migrated]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'set_active_story') {
        $storyId = trim($body['story_id'] ?? '');
        if (!storyFamilyInfo($storyId)) json_response(['error' => 'Missing or invalid story_id'], 400);
        try {
            setActiveStoryId($storyId);
            json_response(['ok' => true, 'active_story_id' => $storyId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'set_active_study_set') {
        $setName = trim($body['set_name'] ?? '');
        $active  = array_key_exists('active', $body) ? (bool)$body['active'] : true;
        if (!$setName) json_response(['error' => 'Missing set_name'], 400);
        try {
            $stmt = $database->prepare("SELECT COUNT(*) FROM study_questions WHERE set_name = ? AND q_type = 'study'");
            $stmt->execute([$setName]);
            if ((int)$stmt->fetchColumn() === 0) json_response(['error' => 'Unknown study set'], 400);
            toggleActiveStudySet($setName, $active);
            json_response(['ok' => true, 'set_name' => $setName, 'active' => $active, 'study_active_sets' => getActiveStudySets()]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'add_event') {
        $title = trim($body['title'] ?? '');
        $date  = trim($body['date'] ?? '');
        if (!$title || !$date) json_response(['error' => 'Missing title or date'], 400);
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) json_response(['error' => 'Invalid date format (YYYY-MM-DD)'], 400);
        try {
            $fields = array_intersect_key($body['fields'] ?? [], array_flip([
                'time_start', 'time_end', 'recurring', 'people_ids', 'task_ids',
                'prereq_tasks', 'prebriefed', 'debriefed', 'notes'
            ]));
            $fields['title'] = $title;
            $fields['date'] = $date;
            $eventId = vaultAddEvent($fields);
            json_response(['ok' => true, 'event_id' => $eventId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'update_event') {
        $eventId = (int)($body['event_id'] ?? 0);
        if (!$eventId) json_response(['error' => 'Missing event_id'], 400);
        try {
            $fields = $body['fields'] ?? [];
            if (isset($fields['date']) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fields['date'])) {
                json_response(['error' => 'Invalid date format (YYYY-MM-DD)'], 400);
            }
            if (!vaultUpdateEvent($eventId, $fields)) json_response(['error' => 'Event not found'], 404);
            json_response(['ok' => true, 'event_id' => $eventId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    if ($action === 'delete_event') {
        $eventId = (int)($body['event_id'] ?? 0);
        if (!$eventId) json_response(['error' => 'Missing event_id'], 400);
        try {
            vaultDeleteEvent($eventId);
            json_response(['ok' => true, 'event_id' => $eventId]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    json_response(['error' => "Unknown action '$action'"], 400);
}

json_response(['error' => 'Method not allowed'], 405);
