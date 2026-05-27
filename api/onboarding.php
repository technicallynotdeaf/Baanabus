<?php
// api/onboarding.php — saves wizard answers to vault config and cassowary.enc
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function respond(array $data, int $code = 200): void {
    http_response_code($code);
    echo json_encode($data);
    exit;
}

if (empty($_SESSION['is_authenticated'])) respond(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') respond(['error' => 'POST only'], 405);

$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) respond(['error' => 'Invalid JSON'], 400);

$step = $input['step'] ?? '';

switch ($step) {

    case 'preferences':
        $pb = $input['peanut_butter'] ?? '';
        if (!in_array($pb, ['smooth', 'crunchy'], true)) respond(['error' => 'Invalid value'], 400);
        $cfg = getConfig() ?? [];
        $cfg['preferences']['peanut_butter'] = $pb;
        saveConfig($cfg);
        respond(['ok' => true]);

    case 'habitica':
        $usesIt = !empty($input['uses_habitica']);
        $cfg = getConfig() ?? [];
        $cfg['preferences']['uses_habitica'] = $usesIt;
        saveConfig($cfg);
        if ($usesIt) {
            $uid = trim($input['user_id'] ?? '');
            $key = trim($input['api_key'] ?? '');
            if (!$uid || !$key) respond(['error' => 'user_id and api_key required'], 400);
            $cassowary = getCassowary();
            $cassowary['habitica'] = ['user_id' => $uid, 'api_key' => $key];
            saveCassowary($cassowary);
        }
        respond(['ok' => true]);

    case 'complete':
        $cfg = getConfig() ?? [];
        $cfg['onboarding_complete'] = true;
        $cfg['onboarding_at']       = date('c');
        saveConfig($cfg);
        respond(['ok' => true]);

    default:
        respond(['error' => 'Unknown step: ' . htmlspecialchars($step)], 400);
}
