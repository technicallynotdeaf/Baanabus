<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');
if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);

$in = json_decode(file_get_contents('php://input'), true) ?: [];
if (array_key_exists('on', $in)) {
    $_SESSION['regulation_mode'] = (bool)$in['on'];
} else {
    $_SESSION['regulation_mode'] = !($_SESSION['regulation_mode'] ?? false);
}

json_response(['ok' => true, 'active' => (bool)$_SESSION['regulation_mode']]);
