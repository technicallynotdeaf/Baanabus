<?php
// Google Calendar API helper functions.
// All functions require the vault to be unlocked (DEK in session) because they
// read credentials from cassowary.enc via getCassowary().

require_once __DIR__ . '/../config_helper.php';

function gcalGetAccessToken(): string {
    $cass   = getCassowary();
    $google = $cass['google'] ?? [];

    if (empty($google['client_id']) || empty($google['client_secret']) || empty($google['refresh_token'])) {
        throw new Exception('Google Calendar not connected — missing credentials');
    }

    $ch = curl_init('https://oauth2.googleapis.com/token');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query([
            'client_id'     => $google['client_id'],
            'client_secret' => $google['client_secret'],
            'refresh_token' => $google['refresh_token'],
            'grant_type'    => 'refresh_token',
        ]),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 20,
    ]);
    $raw = curl_exec($ch);
    curl_close($ch);
    $resp = json_decode($raw, true) ?? [];

    if (!empty($resp['error'])) {
        if ($resp['error'] === 'invalid_grant') {
            // Token revoked — clear it so the UI drops back to Phase 2
            $cass['google']['refresh_token'] = null;
            saveCassowary($cass);
            $cfg = getConfig() ?? [];
            $cfg['preferences']['uses_gcal'] = false;
            saveConfig($cfg);
        }
        throw new Exception('Google token error: ' . ($resp['error_description'] ?? $resp['error']));
    }

    return $resp['access_token'];
}

function gcalFetchEvents(string $accessToken, string $calendarId, string $timeMin, string $timeMax): array {
    $url = 'https://www.googleapis.com/calendar/v3/calendars/' . rawurlencode($calendarId) . '/events?' . http_build_query([
        'singleEvents' => 'true',
        'orderBy'      => 'startTime',
        'maxResults'   => '500',
        'timeMin'      => $timeMin,
        'timeMax'      => $timeMax,
    ]);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 20,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $accessToken],
    ]);
    $raw = curl_exec($ch);
    curl_close($ch);
    $resp = json_decode($raw, true) ?? [];

    if (!empty($resp['error'])) {
        throw new Exception('GCal fetch error: ' . ($resp['error']['message'] ?? json_encode($resp['error'])));
    }

    $cfg = getConfig() ?? [];
    $tz  = $cfg['preferences']['timezone'] ?? 'UTC';

    $events = [];
    foreach ($resp['items'] ?? [] as $item) {
        if (($item['status'] ?? '') === 'cancelled') continue;

        $title     = $item['summary'] ?? '(No title)';
        $date      = null;
        $timeStart = null;
        $timeEnd   = null;

        if (!empty($item['start']['date'])) {
            // All-day event
            $date = $item['start']['date'];
        } elseif (!empty($item['start']['dateTime'])) {
            try {
                $dt = new DateTime($item['start']['dateTime']);
                $dt->setTimezone(new DateTimeZone($tz));
                $date      = $dt->format('Y-m-d');
                $timeStart = $dt->format('H:i');
                if (!empty($item['end']['dateTime'])) {
                    $dtEnd = new DateTime($item['end']['dateTime']);
                    $dtEnd->setTimezone(new DateTimeZone($tz));
                    $timeEnd = $dtEnd->format('H:i');
                }
            } catch (Throwable $e) {
                $date      = substr($item['start']['dateTime'], 0, 10);
                $timeStart = substr($item['start']['dateTime'], 11, 5);
            }
        }

        if (!$date) continue;

        $description = null;
        if (!empty($item['description'])) {
            $description = mb_substr($item['description'], 0, 500);
        }

        $events[] = [
            'gcal_id'     => $item['id'],
            'title'       => $title,
            'date'        => $date,
            'time_start'  => $timeStart,
            'time_end'    => $timeEnd,
            'description' => $description,
        ];
    }

    return $events;
}

function gcalCreateEvent(string $accessToken, string $calendarId, array $eventBody): string {
    $url = 'https://www.googleapis.com/calendar/v3/calendars/' . rawurlencode($calendarId) . '/events';
    $ch  = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($eventBody),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 20,
        CURLOPT_HTTPHEADER     => [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json',
        ],
    ]);
    $raw  = curl_exec($ch);
    curl_close($ch);
    $resp = json_decode($raw, true) ?? [];

    if (!empty($resp['error'])) {
        throw new Exception('GCal create error: ' . ($resp['error']['message'] ?? json_encode($resp['error'])));
    }

    return $resp['id'];
}

function gcalDeleteEvent(string $accessToken, string $calendarId, string $gcalEventId): void {
    $url = 'https://www.googleapis.com/calendar/v3/calendars/' . rawurlencode($calendarId) . '/events/' . rawurlencode($gcalEventId);
    $ch  = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_CUSTOMREQUEST  => 'DELETE',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $accessToken],
    ]);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // 204 = deleted; 404 = already gone — both acceptable
    if ($code >= 400 && $code !== 404) {
        throw new Exception('GCal delete failed: HTTP ' . $code);
    }
}

// Safe wrapper for task deletion call-sites: logs errors, never throws.
function gcalDeleteEventBestEffort(array $task): void {
    if (empty($task['gcal_event_id'])) return;
    try {
        $cfg = getConfig() ?? [];
        if (empty($cfg['preferences']['uses_gcal'])) return;
        $cass        = getCassowary();
        $calendarId  = $cass['google']['calendar_id'] ?? 'primary';
        $accessToken = gcalGetAccessToken();
        gcalDeleteEvent($accessToken, $calendarId, $task['gcal_event_id']);
    } catch (Throwable $e) {
        error_log('gcalDeleteEventBestEffort: ' . $e->getMessage());
    }
}
