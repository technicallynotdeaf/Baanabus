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
