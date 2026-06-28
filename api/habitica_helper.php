<?php
// Habitica HTTP helper — include after init.php and config_helper.php

function habiticaRequest(string $method, string $path, string $userId, string $apiKey, ?array $body = null): array {
    if (!function_exists('curl_init')) throw new Exception('cURL not available');
    $url = 'https://habitica.com/api/v3' . $path;
    $ch  = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10,
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
    if ($err) throw new Exception("Habitica cURL error: $err");
    $json = json_decode($raw, true);
    if (!is_array($json)) throw new Exception("Habitica: non-JSON response (HTTP $code)");
    if (!($json['success'] ?? false)) throw new Exception('Habitica: ' . ($json['message'] ?? 'unknown error'));
    return $json['data'] ?? [];
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
function habiticaPushNotes(string $habId, array $task, string $userId, string $apiKey): void {
    try {
        habiticaRequest('PATCH', "/tasks/$habId", $userId, $apiKey, [
            'notes' => habiticaMetaNotes($task),
        ]);
    } catch (Throwable $e) {
        error_log('Habitica notes push failed (' . $habId . '): ' . $e->getMessage());
    }
}
