<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
require_once __DIR__ . '/habitica_helper.php';
header('Content-Type: application/json; charset=utf-8');

// Accept BSK token for agent-triggered force sync
$bskAuth = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$bskToken = strncmp($bskAuth, 'Bearer ', 7) === 0 ? trim(substr($bskAuth, 7)) : '';
if ($bskToken && authenticateAgentKey($bskToken)) {
    // agent-key path: vault is unlocked by authenticateAgentKey
} else {
    if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
    if (!isUnlocked())      json_response(['error' => 'Vault locked'],      423);
}

set_time_limit(300); // tag sync may sleep waiting for rate-limit reset

// Release the PHP session file lock now. session_start() (called for every
// request via init.php) holds an exclusive lock on the session file for the
// entire script lifetime unless explicitly released — and nothing else in
// this codebase ever calls session_write_close(). This script is fired
// fire-and-forget alongside the greeting bubble on page load and can run for
// 40s+ (tag-sync rate-limit sleeps below), during which every other request
// for the same session — the greeting bubble, next_activity.php, everything —
// was queueing behind this lock and making the whole app appear frozen.
// $_SESSION remains fully readable after this call; only writes to new keys
// would be lost, and nothing below writes to $_SESSION.
session_write_close();

try {
    $cfg   = getConfig() ?? [];
    $prefs = $cfg['preferences'] ?? [];

    if (empty($prefs['uses_habitica'])) {
        json_response(['skipped' => true, 'reason' => 'not_configured']);
    }

    $today = date('Y-m-d');
    $force = !empty($_GET['force']) && ($bskToken || isAuthenticated());
    if (!$force && ($cfg['habitica_sync_date'] ?? '') === $today) {
        json_response(['already_ran' => true]);
    }

    $cass   = getCassowary();
    $userId = $cass['habitica']['user_id'] ?? '';
    $apiKey = $cass['habitica']['api_key'] ?? '';
    if (!$userId || !$apiKey) {
        json_response(['skipped' => true, 'reason' => 'no_credentials']);
    }

    $todos = habiticaRequest('GET', '/tasks/user?type=todos', $userId, $apiKey);
    $data  = getTasks();
    $now   = date('c');

    // Build set of all Habitica todo IDs (complete + incomplete) for deletion detection
    $habiticaIdSet = [];
    foreach ($todos as $todo) {
        if (!empty($todo['id'])) $habiticaIdSet[(string)$todo['id']] = true;
    }

    // Index existing Habitica tasks to avoid duplicates
    // existingParents: habitica_id => baanabus task id (parent todos)
    // existingItems:   "habitica_id:item_id" => true  (checklist subtasks)
    $existingParents = [];
    $existingItems   = [];
    $idIndex         = [];
    foreach ($data['tasks'] as $k => $t) {
        $idIndex[(int)$t['id']] = $k;
        if (empty($t['habitica_id'])) continue;
        if (empty($t['habitica_item_id'])) {
            $existingParents[$t['habitica_id']] = (int)$t['id'];
        } else {
            $existingItems[$t['habitica_id'] . ':' . $t['habitica_item_id']] = true;
        }
    }

    // Habitica's todo 'notes' field is free text the user can write in the Habitica app.
    // Baanabus also writes its own '[baanabus] urgency: ...' metadata block into that same
    // field (see habiticaPushNotes) — never treat that block as a real description.
    $habNotesToDescription = function (array $todo): ?string {
        $notes = trim($todo['notes'] ?? '');
        if ($notes === '' || strpos($notes, '[baanabus]') === 0) return null;
        return $notes;
    };

    $synced          = 0;
    $descBackfilled  = 0;

    foreach ($todos as $todo) {
        if ($todo['completed'] ?? false) continue;
        $todoId      = $todo['id'];
        $description = $habNotesToDescription($todo);

        // Import parent todo if not already present
        if (!isset($existingParents[$todoId])) {
            $task = [
                'id'            => $data['next_id']++,
                'title'         => $todo['text'],
                'task_type'     => 'inbox',
                'urgency'       => null,
                'importance'    => null,
                'energy'        => null,
                'status'        => 'active',
                'snoozed_until' => null,
                'created_at'    => $now,
                'habitica_id'   => $todoId,
                'description'   => $description,
            ];
            $existingParents[$todoId] = $task['id'];
            $idIndex[$task['id']]     = count($data['tasks']);
            $data['tasks'][]          = $task;
            $synced++;
        } elseif ($description !== null) {
            // Backfill description for tasks synced before this field existed
            $k = $idIndex[$existingParents[$todoId]] ?? null;
            if ($k !== null && empty($data['tasks'][$k]['description'])) {
                $data['tasks'][$k]['description'] = $description;
                $descBackfilled++;
            }
        }

        $parentBaanabusId = $existingParents[$todoId];

        // Import each incomplete checklist item as a child task
        foreach (($todo['checklist'] ?? []) as $item) {
            if ($item['completed'] ?? false) continue;
            $key = $todoId . ':' . $item['id'];
            if (isset($existingItems[$key])) continue;

            $childId = $data['next_id']++;
            vaultAppendTask($data, [
                'id'               => $childId,
                'title'            => $item['text'],
                'task_type'        => 'inbox',
                'urgency'          => 'low',
                'energy'           => 'low',
                'status'           => 'active',
                'snoozed_until'    => null,
                'created_at'       => $now,
                'habitica_id'      => $todoId,
                'habitica_item_id' => $item['id'],
                'parent_id'        => $parentBaanabusId,
            ]);
            $idIndex[$childId]   = count($data['tasks']) - 1;
            $existingItems[$key] = true;
            $synced++;
        }
    }

    // Detect parent todos deleted from Habitica and soft-delete locally
    $deleted = 0;
    $deletedBaanabusIds = [];
    foreach ($data['tasks'] as &$task) {
        if (empty($task['habitica_id']) || !empty($task['habitica_item_id'])) continue;
        if (($task['status'] ?? '') !== 'active') continue;
        if (!isset($habiticaIdSet[(string)$task['habitica_id']])) {
            $task['status'] = 'deleted';
            $deletedBaanabusIds[(int)$task['id']] = true;
            $deleted++;
        }
    }
    unset($task);

    // Cascade: soft-delete active children of deleted parents
    foreach ($data['tasks'] as &$task) {
        if (($task['status'] ?? '') !== 'active') continue;
        if (!empty($task['parent_id']) && isset($deletedBaanabusIds[(int)$task['parent_id']])) {
            $task['status'] = 'deleted';
            $deleted++;
        }
    }
    unset($task);

    // --- Apply managed doable/snoozed and location tags to active parent todos ---
    // Tag IDs are cached in cassowary.enc; only fetched from Habitica when missing.
    // Each task stores _hab_tags (last-known applied set) so only diffs hit the API.
    $managedTagIds   = $cass['habitica']['tag_ids'] ?? [];
    $allManagedNames = ['doable', 'snoozed', 'location:home', 'location:work',
                        'location:shops', 'location:phone', 'location:online', 'location:anywhere'];
    $missingNames    = array_values(array_filter($allManagedNames, fn($n) => empty($managedTagIds[$n])));

    if ($missingNames) {
        $allHabTags     = habiticaRequest('GET', '/tags', $userId, $apiKey);
        $existingByName = [];
        foreach ((array)$allHabTags as $tag) {
            $existingByName[$tag['name'] ?? ''] = (string)($tag['id'] ?? '');
        }
        foreach ($missingNames as $tn) {
            if (!empty($existingByName[$tn])) {
                $managedTagIds[$tn] = $existingByName[$tn];
            } else {
                try {
                    $created = habiticaRequest('POST', '/tags', $userId, $apiKey, ['name' => $tn]);
                    if (!empty($created['id'])) $managedTagIds[$tn] = (string)$created['id'];
                } catch (Throwable $e) {}
            }
        }
        $cass['habitica']['tag_ids'] = $managedTagIds;
        saveCassowary($cass);
    }

    // Habitica's per-minute rate limit is commonly ~30 requests. A budget of 50 almost
    // guarantees exhausting it mid-run and triggering habiticaThrottle()'s blocking sleep()
    // (up to ~60s) — previously the biggest contributor to the 40s+ first-load-of-the-day
    // duration. 20 keeps a typical run under the limit so it usually completes without
    // sleeping at all; runs needing more than 20 tag changes just finish the rest on the
    // next sync (tags are Habitica-side organisational metadata, not time-critical).
    $tagBudget    = 20; // max API calls for tag sync per run
    $tagCallsUsed = 0;
    $tagsUpdated  = 0;
    $tasksDirty   = false;
    $nowTs        = time();

    // Build a prioritised list: tasks never tagged (no _hab_tags) come first
    $tagQueue = [];
    foreach ($data['tasks'] as $k => $t) {
        if (empty($t['habitica_id']) || !empty($t['habitica_item_id'])) continue;
        if (($t['status'] ?? '') !== 'active') continue;
        $tagQueue[] = [$k, !array_key_exists('_hab_tags', $t)];
    }
    usort($tagQueue, fn($a, $b) => $b[1] <=> $a[1]); // never-tagged first

    foreach ($tagQueue as [$k, $_]) {
        if ($tagCallsUsed >= $tagBudget) break;

        $task  = &$data['tasks'][$k];
        $habId = $task['habitica_id'];

        $snoozed  = !empty($task['snoozed_until']) && strtotime($task['snoozed_until']) > $nowTs;
        $rawLocs  = $task['location'] ?? null;
        $taskLocs = is_array($rawLocs) ? $rawLocs : (is_string($rawLocs) && $rawLocs !== '' ? [$rawLocs] : []);
        $locTags  = [];
        foreach ($taskLocs as $l) {
            $l = strtolower(trim((string)$l));
            if (in_array($l, ['home', 'work', 'shops', 'phone', 'online'], true)) $locTags[] = 'location:' . $l;
        }
        if (!$locTags) $locTags = ['location:anywhere'];
        $desired = array_merge([$snoozed ? 'snoozed' : 'doable'], $locTags);
        sort($desired);

        $stored = $task['_hab_tags'] ?? [];
        sort($stored);

        if ($desired === $stored) { unset($task); continue; }

        $toAdd    = array_values(array_diff($desired, $stored));
        $toRemove = array_values(array_diff($stored,  $desired));

        $callOk = true;
        try {
            foreach ($toRemove as $tn) {
                if (empty($managedTagIds[$tn])) continue;
                habiticaRequest('DELETE', "/tasks/$habId/tags/{$managedTagIds[$tn]}", $userId, $apiKey);
                $tagCallsUsed++;
                habiticaThrottle();
            }
            foreach ($toAdd as $tn) {
                if (empty($managedTagIds[$tn])) continue;
                habiticaRequest('POST', "/tasks/$habId/tags/{$managedTagIds[$tn]}", $userId, $apiKey);
                $tagCallsUsed++;
                habiticaThrottle();
            }
        } catch (Throwable $e) {
            $callOk = false;
            error_log('Habitica tag sync (task ' . ($task['id'] ?? '?') . '): ' . $e->getMessage());
        }

        if ($callOk) {
            $task['_hab_tags'] = $desired;
            $tasksDirty = true;
            $tagsUpdated++;
        }
        unset($task);
    }
    // --- end tag sync ---

    // --- Delete reconciliation sweep ---
    // Every local-delete call site attempts a best-effort Habitica delete at
    // the moment of deletion, but a transient failure there (timeout,
    // momentary rate limit) previously just got logged and left the task
    // orphaned on Habitica forever — nothing ever retried. This sweep finds
    // any locally-deleted task that still carries a habitica_id and retries,
    // self-healing both the existing backlog and any future one-off
    // failures over the next few daily syncs. A 404 ("already gone") counts
    // as success, not a failure, since that's the actual goal state.
    $delBudget    = 10; // small, separate budget so this can't starve tag sync's own budget
    $delCallsUsed = 0;
    $delCleaned   = 0;
    foreach ($data['tasks'] as $k => $t) {
        if ($delCallsUsed >= $delBudget) break;
        if (($t['status'] ?? '') !== 'deleted' || empty($t['habitica_id'])) continue;

        $task = &$data['tasks'][$k];
        $done = false;
        try {
            if (!empty($task['habitica_item_id'])) {
                habiticaRequest('DELETE', "/tasks/{$task['habitica_id']}/checklist/{$task['habitica_item_id']}", $userId, $apiKey);
            } else {
                habiticaRequest('DELETE', "/tasks/{$task['habitica_id']}", $userId, $apiKey);
            }
            $done = true;
        } catch (Throwable $e) {
            if (stripos($e->getMessage(), 'not found') !== false) {
                $done = true; // already gone — that's the goal state, not a failure
            } else {
                error_log('Habitica delete reconciliation (task ' . ($task['id'] ?? '?') . '): ' . $e->getMessage());
            }
        }
        if ($done) {
            $task['habitica_id']      = null;
            $task['habitica_item_id'] = null;
            $tasksDirty = true;
            $delCleaned++;
        }
        $delCallsUsed++;
        habiticaThrottle();
        unset($task);
    }
    // --- end delete reconciliation sweep ---

    if ($synced > 0 || $deleted > 0 || $tasksDirty || $descBackfilled > 0) saveTasks($data);

    $cfg['habitica_sync_date'] = $today;
    $cfg['habitica_sync_last_count'] = $synced;
    saveConfig($cfg);

    // --- Sync daily definitions into dailies.enc ---
    $habiticaDailies = habiticaRequest('GET', '/tasks/user?type=dailys', $userId, $apiKey);
    $dailyData       = getDailies();

    // Build lookup index: habitica_id => array index in items
    $dailyHabIndex = [];
    foreach ($dailyData['items'] as $k => $item) {
        if (!empty($item['habitica_id'])) $dailyHabIndex[$item['habitica_id']] = $k;
    }

    $dailySynced = 0;
    $habiticaDailyIds = [];
    foreach ($habiticaDailies as $d) {
        $habId = $d['id'] ?? null;
        if (!$habId) continue;
        $habiticaDailyIds[] = $habId;
        $def = [
            'habitica_id' => $habId,
            'title'       => $d['text']      ?? '',
            'notes'       => $d['notes']     ?? '',
            'checklist'   => array_values(array_map(fn($ci) => [
                'id'   => $ci['id']   ?? '',
                'text' => $ci['text'] ?? '',
            ], $d['checklist'] ?? [])),
            'frequency'   => $d['frequency'] ?? 'daily',
            'repeat'      => $d['repeat']    ?? [],
            'everyX'      => (int)($d['everyX'] ?? 1),
            'start_date'  => substr($d['startDate'] ?? $today, 0, 10),
            'is_active'   => true,
        ];
        if (isset($dailyHabIndex[$habId])) {
            $k        = $dailyHabIndex[$habId];
            $existing = $dailyData['items'][$k];
            $def['id']    = $existing['id'];
            $def['order'] = $existing['order'] ?? 0;
            // Preserve fields the user can set in Baanabus that Habitica doesn't know about
            foreach (['horizon', 'location', 'relevant_after', 'irrelevant_after', 'is_active'] as $f) {
                if (array_key_exists($f, $existing)) $def[$f] = $existing[$f];
            }
            $dailyData['items'][$k] = $def;
        } else {
            $def['id']    = $dailyData['next_id']++;
            $def['order'] = count($dailyData['items']);
            $dailyData['items'][] = $def;
            $dailySynced++;
        }
    }

    // Deactivate Habitica dailies no longer returned by the API
    foreach ($dailyData['items'] as &$item) {
        if (!empty($item['habitica_id']) && !in_array($item['habitica_id'], $habiticaDailyIds, true)) {
            $item['is_active'] = false;
        }
    }
    unset($item);

    $dailyData['sync_date'] = $today;
    saveDailies($dailyData);

    json_response(['synced' => $synced, 'deleted' => $deleted, 'daily_synced' => $dailySynced,
                   'parents' => count($existingParents), 'items_checked' => count($existingItems),
                   'tags_updated' => $tagsUpdated, 'tag_calls' => $tagCallsUsed,
                   'descriptions_backfilled' => $descBackfilled,
                   'delete_reconciled' => $delCleaned, 'delete_calls' => $delCallsUsed]);

} catch (Throwable $e) {
    error_log('Habitica sync error: ' . $e->getMessage());
    json_response(['error' => $e->getMessage()], 500);
}
