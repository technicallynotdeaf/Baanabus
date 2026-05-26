<?php
// Temporary debug endpoint — logs WebAuthn client errors server-side
// Remove once registration is working
header('Content-Type: application/json');
$in = json_decode(file_get_contents('php://input'), true);
if (!$in) { echo '{"ok":false}'; exit; }

$entry = date('c') . ' ' . ($_SERVER['REMOTE_ADDR'] ?? '?') . "\n"
       . '  name:    ' . ($in['name']    ?? '') . "\n"
       . '  message: ' . ($in['message'] ?? '') . "\n"
       . '  ua:      ' . substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 120) . "\n"
       . '  step:    ' . ($in['step']    ?? '') . "\n\n";

file_put_contents('/tmp/webauthn-debug.log', $entry, FILE_APPEND | LOCK_EX);
echo '{"ok":true}';
