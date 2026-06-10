<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$input   = json_decode(file_get_contents('php://input'), true);
$storyId = trim($input['story_id'] ?? '');
if (!preg_match('/^q\d+$/', $storyId)) json_response(['error' => 'Missing or invalid story_id'], 400);

try {
    $prog = getStoryProgress($storyId);
    $prog['current_key'] = '1_start';
    $prog['depth']       = 0;
    $prog['history']     = [];
    saveStoryProgress($storyId, $prog);
    setActiveStoryId($storyId);
    json_response(['ok' => true]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
