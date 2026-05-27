<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function respond_mc(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}

if (empty($_SESSION['is_authenticated'])) respond_mc(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond_mc(['error' => 'Vault locked'], 423);

$taskId = isset($_GET['task_id']) ? (int)$_GET['task_id'] : 0;
if (!$taskId) respond_mc(['error' => 'Missing task_id'], 400);

try {
    $result = vaultMarkComplete($taskId);

    if (!empty($result['habitica_id'])) {
        require_once __DIR__ . '/habitica_helper.php';
        $cass   = getCassowary();
        $userId = $cass['habitica']['user_id'] ?? '';
        $apiKey = $cass['habitica']['api_key'] ?? '';
        if ($userId && $apiKey) {
            try {
                if (!empty($result['habitica_item_id'])) {
                    habiticaRequest('POST',
                        "/tasks/{$result['habitica_id']}/checklist/{$result['habitica_item_id']}/score",
                        $userId, $apiKey);
                } else {
                    habiticaRequest('POST', "/tasks/{$result['habitica_id']}/score/up", $userId, $apiKey);
                }
            } catch (Throwable $e) {
                error_log('Habitica score failed: ' . $e->getMessage());
                // non-fatal — task is already marked done locally
            }
        }
    }

    respond_mc(['success' => true, 'pages' => $result['pages'], 'books' => $result['books'], 'newBook' => $result['newBook']]);
} catch (Throwable $e) {
    respond_mc(['success' => false, 'message' => $e->getMessage()], 500);
}
