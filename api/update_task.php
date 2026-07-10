<?php
/**
 * api/update_task.php — general-purpose task field editor for the browser session
 * POST {task_id, fields: {urgency?, importance?, energy?, context?, location?,
 *       task_type?, time?, deadline?, snoozed_until?, status?, title?,
 *       description?, tags?, prereq_tasks?}}
 *
 * Session-authed counterpart to agent.php's update_task action (that one is
 * Bearer-token only). Both funnel through updateTaskFieldsShared() so the
 * allowlist and Habitica notes push can't drift between the two.
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$input  = json_decode(file_get_contents('php://input'), true) ?? [];
$taskId = (int)($input['task_id'] ?? 0);
if (!$taskId) json_response(['error' => 'Missing task_id'], 400);

try {
    $fields = updateTaskFieldsShared($taskId, $input['fields'] ?? []);
    json_response(['ok' => true, 'updated' => $fields]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
