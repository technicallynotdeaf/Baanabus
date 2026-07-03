<?php
// Habitica HTTP helper — include after init.php and config_helper.php

function habiticaRequest(string $method, string $path, string $userId, string $apiKey, ?array $body = null, int $timeout = 5): array {
    if (!function_exists('curl_init')) throw new Exception('cURL not available');
    $url = 'https://habitica.com/api/v3' . $path;
    $ch  = curl_init($url);

    // Capture rate-limit headers into globals so habiticaThrottle() can inspect them
    $rateRemaining = null;
    $rateResetRaw  = null;
    curl_setopt($ch, CURLOPT_HEADERFUNCTION, function($ch, $hdr) use (&$rateRemaining, &$rateResetRaw) {
        $parts = explode(':', $hdr, 2);
        if (count($parts) === 2) {
            $name = strtolower(trim($parts[0]));
            $val  = trim($parts[1]);
            if ($name === 'x-ratelimit-remaining') $rateRemaining = (int)$val;
            if ($name === 'x-ratelimit-reset')     $rateResetRaw  = $val;
        }
        return strlen($hdr);
    });

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => $timeout,
        CURLOPT_HTTPHEADER     => [
            'x-api-user: '  . $userId,
            'x-api-key: '   . $apiKey,
            'x-client: '    . $userId . '-Baanabus',
            'Content-Type: application/json',
        ],
    ]);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST,       true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body !== null ? json_encode($body) : '{}');
    } elseif ($method === 'PATCH' || $method === 'PUT') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body !== null ? json_encode($body) : '{}');
    } elseif ($method === 'DELETE') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    }
    $raw  = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err  = curl_error($ch);
    curl_close($ch);

    // Update global rate-limit state after every call
    if ($rateRemaining !== null) {
        $GLOBALS['_hab_rate_remaining'] = $rateRemaining;
    }
    if ($rateResetRaw !== null) {
        // Header format: "Mon Jun 29 2026 08:50:10 GMT+0000 (Coordinated Universal Time)"
        $clean = preg_replace('/\s*\(.*?\)\s*$/', '', $rateResetRaw);
        $ts    = strtotime($clean);
        if ($ts !== false) $GLOBALS['_hab_rate_reset_ts'] = $ts;
    }

    if ($err) throw new Exception("Habitica cURL error: $err");
    $json = json_decode($raw, true);
    if (!is_array($json)) throw new Exception("Habitica: non-JSON response (HTTP $code)");
    if (!($json['success'] ?? false)) throw new Exception('Habitica: ' . ($json['message'] ?? 'unknown error'));
    return $json['data'] ?? [];
}

// Sleep until the current rate-limit window resets if remaining requests <= $threshold.
// Call after any habiticaRequest() that might be part of a burst.
function habiticaThrottle(int $threshold = 3): void {
    $remaining = $GLOBALS['_hab_rate_remaining'] ?? 30;
    if ($remaining > $threshold) return;
    $resetTs = $GLOBALS['_hab_rate_reset_ts'] ?? (time() + 60);
    $sleep   = max(1, $resetTs - time() + 1); // +1s buffer past the reset
    if ($sleep <= 120) sleep($sleep);
}

function habiticaSyncTimeTag(string $habiticaTaskId, int $timeMinutes, string $userId, string $apiKey): void {
    if ($timeMinutes <= 0) return;
    if      ($timeMinutes <= 5)  $targetName = '5 min';
    elseif  ($timeMinutes <= 15) $targetName = '15 min';
    elseif  ($timeMinutes <= 60) $targetName = '30-60 min';
    else                         $targetName = '2+ hours';

    $allTimeTagNames = ['5 min', '15 min', '30-60 min', '2+ hours'];

    // Fetch all existing tags once
    $allTags  = habiticaRequest('GET', '/tags', $userId, $apiKey);
    $timeTags = [];   // name => id for all known time tags
    $targetId = null;
    foreach ((array)$allTags as $tag) {
        $n = $tag['name'] ?? '';
        if (in_array($n, $allTimeTagNames, true)) $timeTags[$n] = (string)$tag['id'];
        if ($n === $targetName) $targetId = (string)$tag['id'];
    }

    // Create target tag if it doesn't exist yet
    if (!$targetId) {
        $new      = habiticaRequest('POST', '/tags', $userId, $apiKey, ['name' => $targetName]);
        $targetId = (string)($new['id'] ?? '');
    }
    if (!$targetId) return;

    // Get task's current tags so we can remove stale time tags
    $task       = habiticaRequest('GET', "/tasks/$habiticaTaskId", $userId, $apiKey);
    $taskTagIds = (array)($task['tags'] ?? []);

    foreach ($taskTagIds as $tagId) {
        if (in_array($tagId, $timeTags, true) && $tagId !== $targetId) {
            try { habiticaRequest('DELETE', "/tasks/$habiticaTaskId/tags/$tagId", $userId, $apiKey); }
            catch (Throwable $e) {}
        }
    }

    // Add new tag if not already present
    if (!in_array($targetId, $taskTagIds, true)) {
        habiticaRequest('POST', "/tasks/$habiticaTaskId/tags/$targetId", $userId, $apiKey);
    }
}

function habiticaGetOrCreateTag(string $name, string $userId, string $apiKey): string {
    $tags = habiticaRequest('GET', '/tags', $userId, $apiKey);
    foreach ((array)$tags as $tag) {
        if (($tag['name'] ?? '') === $name) return (string)$tag['id'];
    }
    $tag = habiticaRequest('POST', '/tags', $userId, $apiKey, ['name' => $name]);
    return (string)($tag['id'] ?? '');
}

// Format Baanabus task metadata as structured notes for Habitica
function habiticaMetaNotes(array $task): string {
    $lines = ['[baanabus]'];
    if (!empty($task['urgency']))      $lines[] = 'urgency: '  . $task['urgency'];
    if (!empty($task['task_type']))    $lines[] = 'type: '     . $task['task_type'];
    if (!empty($task['context']))      $lines[] = 'context: '  . $task['context'];
    if (!empty($task['location']))     $lines[] = 'location: ' . $task['location'];
    if (!empty($task['snoozed_until'])) $lines[] = 'snoozed: ' . substr($task['snoozed_until'], 0, 10);
    return implode("\n", $lines);
}

// Push metadata notes to Habitica (non-fatal — logs errors, never throws)
// Uses a short timeout so UI actions aren't held up if Habitica is slow.
function habiticaPushNotes(string $habId, array $task, string $userId, string $apiKey): void {
    try {
        habiticaRequest('PATCH', "/tasks/$habId", $userId, $apiKey, [
            'notes' => habiticaMetaNotes($task),
        ], 4);
    } catch (Throwable $e) {
        error_log('Habitica notes push failed (' . $habId . '): ' . $e->getMessage());
    }
}
