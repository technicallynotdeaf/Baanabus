<?php
/**
 * api/triage.php — process an inbox triage decision
 * POST { task_id, action: 'next_action'|'someday'|'delete', scheduled_date?: 'YYYY-MM-DD' }
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body   = json_decode(file_get_contents('php://input'), true) ?? [];
$taskId = (int)($body['task_id'] ?? 0);
$action = $body['action'] ?? '';

if (!$taskId) json_response(['error' => 'Missing task_id'], 400);

$allowed = ['next_action', 'someday', 'delete'];
if (!in_array($action, $allowed, true)) {
    json_response(['error' => "Unknown action '$action'"], 400);
}

try {
    if ($action === 'delete') {
        vaultUpdateTask($taskId, ['status' => 'deleted']);
    } elseif ($action === 'someday') {
        vaultUpdateTask($taskId, ['task_type' => 'someday']);
    } elseif ($action === 'next_action') {
        $fields = ['task_type' => 'next_action'];
        $date   = trim($body['scheduled_date'] ?? '');
        if ($date && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            if ($date > date('Y-m-d')) {
                $fields['snoozed_until'] = $date . 'T08:00:00+00:00';
            }
        }
        vaultUpdateTask($taskId, $fields);
    }
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
