<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) json_response(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$in     = json_decode(file_get_contents('php://input'), true) ?: [];
$credId = trim($in['credId'] ?? '');
if ($credId === '') json_response(['error' => 'Missing credId'], 400);

$credSafe = preg_replace('/[^A-Za-z0-9_\-]/', '_', $credId);
$credPath = __DIR__ . "/../data/creds/$credSafe.json";

if (!is_file($credPath)) json_response(['error' => 'Credential not found'], 404);

$rec = json_decode(file_get_contents($credPath), true) ?: [];
if (($rec['userId'] ?? '') !== ($_SESSION['user_id'] ?? '')) {
    json_response(['error' => 'Not your credential'], 403);
}

// Delete vault wrap for this credential
$paths    = getConfigPaths();
$wrapPath = $paths['wraps'] . '/cred_' . $credSafe . '.json';
if (is_file($wrapPath)) @unlink($wrapPath);

// Delete credential record
@unlink($credPath);

error_log('Revoke: deleted credId=' . substr($credId, 0, 12) . '… by user=' . ($_SESSION['user_id'] ?? 'unknown'));

json_response(['ok' => true]);
