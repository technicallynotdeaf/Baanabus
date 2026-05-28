<?php
/**
 * api/agent.php — authenticated agent API
 * Auth: Authorization: Bearer bsk_... header  OR  ?key=bsk_... query param
 *
 * GET  → returns tasks + today's context
 * POST {"action":"update_task","task_id":N,"fields":{urgency?,snoozed_until?,deadline?,context?,task_type?}}
 *      → updates a task in the vault
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

// Auth
$auth  = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$token = strncmp($auth, 'Bearer ', 7) === 0 ? trim(substr($auth, 7)) : '';

if (!$token || !authenticateAgentKey($token)) {
    json_response(['error' => 'Unauthorized — provide a valid bsk_ key'], 401);
}

$method = $_SERVER['REQUEST_METHOD'];

// ---- GET: full context snapshot ----
if ($method === 'GET') {
    $tasks  = getTasks();
    $active = array_values(array_filter($tasks['tasks'], fn($t) =>
        ($t['status'] ?? '') === 'active' && empty($t['parent_id'])
    ));

    $energy = null; $dayType = null;
    if ($database) {
        $row = $database->query("SELECT energy_level, day_type FROM diary WHERE date = '" . date('Y-m-d') . "' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        if ($row) { $energy = $row['energy_level']; $dayType = $row['day_type']; }
    }

    $urgencyLabels   = [1 => 'Do now', 2 => 'Today', 3 => 'Soon', 4 => 'Someday', 5 => 'Waiting'];
    $energyLabels    = [1 => 'Exhausted', 2 => 'Low', 3 => 'Okay', 4 => 'Good', 5 => 'On fire'];
    $dayTypeLabels   = [1 => 'Home', 2 => 'Work', 3 => 'Out', 4 => 'Rest'];

    json_response([
        'context' => [
            'today'           => date('Y-m-d'),
            'energy'          => $energy,
            'energy_label'    => $energyLabels[$energy] ?? null,
            'day_type'        => $dayType,
            'day_type_label'  => $dayTypeLabels[$dayType] ?? null,
            'inbox_count'     => count(getInboxTasks()),
            'pages_target'    => todayPagesTarget(),
            'pages_progress'  => (int)($tasks['pages'] ?? 0),
        ],
        'tasks' => array_map(fn($t) => [
            'id'           => $t['id'],
            'title'        => $t['title'],
            'task_type'    => $t['task_type'] ?? null,
            'urgency'      => $t['urgency'] ?? null,
            'energy'       => $t['energy'] ?? null,
            'context'      => $t['context'] ?? null,
            'deadline'     => $t['deadline'] ?? null,
            'snoozed_until'=> $t['snoozed_until'] ?? null,
            'person_id'    => $t['person_id'] ?? null,
            'description'  => $t['description'] ?? null,
            'tags'         => $t['tags'] ?? null,
            'created_at'   => $t['created_at'] ?? null,
        ], $active),
    ]);
}

// ---- POST: update a task ----
if ($method === 'POST') {
    $body   = json_decode(file_get_contents('php://input'), true) ?? [];
    $action = $body['action'] ?? '';

    if ($action === 'update_task') {
        $taskId = (int)($body['task_id'] ?? 0);
        if (!$taskId) json_response(['error' => 'Missing task_id'], 400);

        $allowed = ['urgency', 'snoozed_until', 'deadline', 'context', 'task_type', 'energy'];
        $fields  = array_intersect_key($body['fields'] ?? [], array_flip($allowed));
        if (!$fields) json_response(['error' => 'No valid fields to update'], 400);

        try {
            vaultUpdateTask($taskId, $fields);
            json_response(['ok' => true, 'updated' => $fields]);
        } catch (Throwable $e) {
            json_response(['error' => $e->getMessage()], 500);
        }
    }

    json_response(['error' => "Unknown action '$action'"], 400);
}

json_response(['error' => 'Method not allowed'], 405);
