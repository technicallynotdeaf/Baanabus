<?php
// api/integrations.php — read/write integration credentials from vault (Habitica, etc.)
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function respond(array $data, int $code = 200): void {
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

if (empty($_SESSION['is_authenticated'])) respond(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond(['error' => 'Vault locked'], 423);

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    try {
        $data = getCassowary();
        // Mask API keys for display — show only last 4 chars
        if (!empty($data['habitica']['api_key'])) {
            $raw = $data['habitica']['api_key'];
            $data['habitica']['api_key_set'] = true;
            $data['habitica']['api_key'] = '••••' . substr($raw, -4);
        }
        respond(['ok' => true, 'data' => $data]);
    } catch (Exception $e) {
        respond(['error' => $e->getMessage()], 500);
    }
}

if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!is_array($input)) respond(['error' => 'Invalid JSON'], 400);

    // Only allow known top-level keys to prevent arbitrary vault pollution
    $allowed = ['habitica'];
    $filtered = array_intersect_key($input, array_flip($allowed));
    if (empty($filtered)) respond(['error' => 'No valid keys provided'], 400);

    try {
        $existing = getCassowary();
        $merged   = array_replace_recursive($existing, $filtered);
        saveCassowary($merged);
        respond(['ok' => true]);
    } catch (Exception $e) {
        respond(['error' => $e->getMessage()], 500);
    }
}

respond(['error' => 'Method not allowed'], 405);
