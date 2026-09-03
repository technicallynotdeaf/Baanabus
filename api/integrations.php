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
        if (!empty($data['pipe']['api_key'])) {
            $raw = $data['pipe']['api_key'];
            $data['pipe']['api_key_set'] = true;
            $data['pipe']['api_key'] = '••••' . substr($raw, -4);
        }
        // Mask Google client_secret; never expose refresh_token
        if (!empty($data['google']['client_secret'])) {
            $raw = $data['google']['client_secret'];
            $data['google']['client_secret_set'] = true;
            $data['google']['client_secret'] = '••••' . substr($raw, -4);
        }
        unset($data['google']['refresh_token']);
        respond(['ok' => true, 'data' => $data]);
    } catch (Exception $e) {
        respond(['error' => $e->getMessage()], 500);
    }
}

if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!is_array($input)) respond(['error' => 'Invalid JSON'], 400);

    // Only allow known top-level keys to prevent arbitrary vault pollution
    $allowed = ['habitica', 'pipe', 'google'];
    $filtered = array_intersect_key($input, array_flip($allowed));
    if (empty($filtered)) respond(['error' => 'No valid keys provided'], 400);

    try {
        $existing = getCassowary();
        $merged   = array_replace_recursive($existing, $filtered);
        saveCassowary($merged);

        // If Habitica creds were just set, mark uses_habitica = true in config
        if (!empty($filtered['habitica']['user_id']) && !empty($filtered['habitica']['api_key'])) {
            $cfg = getConfig() ?? [];
            $cfg['preferences']['uses_habitica'] = true;
            saveConfig($cfg);
        }

        // If Google client credentials were saved, mark gcal_configured = true in config
        if (!empty($filtered['google']['client_id']) && !empty($filtered['google']['client_secret'])) {
            $cfg = getConfig() ?? [];
            $cfg['preferences']['uses_gcal_configured'] = true;
            saveConfig($cfg);
        }

        respond(['ok' => true]);
    } catch (Exception $e) {
        respond(['error' => $e->getMessage()], 500);
    }
}

respond(['error' => 'Method not allowed'], 405);
