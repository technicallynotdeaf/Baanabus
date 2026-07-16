<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

// Lightweight keep-alive: just touching the session (any request does this)
// refreshes its mtime so the server-side session file doesn't age out during
// a long-open tab. No vault/DEK access needed, so it works even if the vault
// isn't unlocked yet.
if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);

$_SESSION['last_heartbeat'] = time();
json_response(['ok' => true]);
