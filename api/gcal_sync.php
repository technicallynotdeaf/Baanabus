<?php
// Syncs Google Calendar events into gcal_cache.enc.
// Once-per-day guard (same pattern as habitica_sync.php); ?force=1 bypasses.
// Dual auth: BSK bearer OR browser session.
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
require_once __DIR__ . '/gcal_helper.php';

header('Content-Type: application/json; charset=utf-8');

// Auth — accept BSK bearer token (agent API path) or active session
$cfg = null;
if (!empty($_SERVER['HTTP_AUTHORIZATION']) && str_starts_with($_SERVER['HTTP_AUTHORIZATION'], 'Bearer bsk_')) {
    $token = substr($_SERVER['HTTP_AUTHORIZATION'], 7);
    try {
        authenticateAgentKey($token);
        $cfg = getConfig() ?? [];
    } catch (Throwable $e) {
        json_response(['error' => 'Unauthorized'], 401);
    }
} else {
    if (empty($_SESSION['is_authenticated'])) json_response(['error' => 'Not authenticated'], 401);
    if (empty($_SESSION['DEK']))              json_response(['error' => 'Vault locked'], 423);
    $cfg = getConfig() ?? [];
}

// Release the session lock early — sync can be slow
session_write_close();
set_time_limit(60);

if (empty($cfg['preferences']['uses_gcal'])) {
    json_response(['skipped' => true, 'reason' => 'not_connected']);
}

$today = date('Y-m-d');
$force = !empty($_GET['force']);
if (!$force && ($cfg['gcal_sync_date'] ?? '') === $today) {
    json_response(['already_ran' => true]);
}

try {
    $cass        = getCassowary();
    $calendarId  = $cass['google']['calendar_id'] ?? 'primary';
    $accessToken = gcalGetAccessToken();

    // 90-day window: 7 days back (catch recent additions) + 83 days forward
    $timeMin = gmdate('Y-m-d\TH:i:s\Z', strtotime('-7 days'));
    $timeMax = gmdate('Y-m-d\TH:i:s\Z', strtotime('+83 days'));

    $events = gcalFetchEvents($accessToken, $calendarId, $timeMin, $timeMax);

    saveGcalCache([
        'synced_at'   => date('c'),
        'calendar_id' => $calendarId,
        'events'      => $events,
    ]);

    // Update sync date — need a fresh session since we called session_write_close()
    session_start();
    $cfg = getConfig() ?? [];
    $cfg['gcal_sync_date'] = $today;
    saveConfig($cfg);
    session_write_close();

    json_response(['ok' => true, 'count' => count($events), 'synced_at' => date('c')]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
