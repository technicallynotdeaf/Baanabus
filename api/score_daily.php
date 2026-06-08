<?php
/**
 * api/score_daily.php — mark a daily complete
 * POST {id: N}
 * Marks complete in dailies.enc and scores UP in Habitica if the daily has a habitica_id.
 * Returns: {ok, all_done, remaining}
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$body = json_decode(file_get_contents('php://input'), true) ?? [];
$id   = (int)($body['id'] ?? $_GET['id'] ?? 0);
if (!$id) json_response(['error' => 'Missing id'], 400);

try {
    $dailies = getDailies();
    $item    = null;
    foreach ($dailies['items'] as $d) {
        if ((int)$d['id'] === $id) { $item = $d; break; }
    }
    if (!$item) json_response(['error' => 'Daily not found'], 404);

    markDailyComplete($id, date('Y-m-d'));

    if (!empty($item['habitica_id'])) {
        try {
            require_once __DIR__ . '/habitica_helper.php';
            $cass    = getCassowary();
            $habUser = $cass['habitica']['user_id'] ?? '';
            $habKey  = $cass['habitica']['api_key']  ?? '';
            if ($habUser && $habKey) {
                habiticaRequest('POST', "/tasks/{$item['habitica_id']}/score/up", $habUser, $habKey);
            }
        } catch (Throwable $e) {
            error_log('score_daily Habitica error: ' . $e->getMessage());
        }
    }

    $remaining = getActiveDailies();
    json_response(['ok' => true, 'all_done' => empty($remaining), 'remaining' => count($remaining)]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
