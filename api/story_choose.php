<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) json_response(['error' => 'Invalid JSON'], 400);

$raw       = trim($input['story_id'] ?? '');
$choiceKey = trim($input['choice_key'] ?? '');
if (!$choiceKey) json_response(['error' => 'Missing choice_key'], 400);

$storyId = $raw;
$story   = loadStoryById($storyId);
if (!$story) {
    $storyId = defaultStoryId();
    $story   = loadStoryById($storyId);
}
if (!$story) json_response(['error' => 'No stories available'], 500);
$prog = getStoryProgress($storyId);

// Validate the choice exists from the current page
$currentPage = $story['pages'][$prog['current_key']] ?? null;
if (!$currentPage) json_response(['error' => 'Current page not found'], 500);

$valid = false;
foreach (($currentPage['choices'] ?? []) as $choice) {
    if ($choice['next'] === $choiceKey) { $valid = true; break; }
}
if (!$valid) json_response(['error' => 'Invalid choice'], 400);

// Can only choose if there is at least one page in the global pool
if (getGlobalStoryPages() <= 0) {
    json_response(['error' => 'Not unlocked yet'], 403);
}

// Record choice in history before advancing
$chosenText = '';
foreach (($currentPage['choices'] ?? []) as $choice) {
    if ($choice['next'] === $choiceKey) { $chosenText = base64_decode($choice['text']); break; }
}
$prog['history'][] = [
    'key'  => $prog['current_key'],
    'next' => $choiceKey,
    'text' => $chosenText,
];

// Advance
$prog['current_key'] = $choiceKey;
$prog['depth']++;
$nextPage = $story['pages'][$choiceKey] ?? null;
if ($nextPage && !empty($nextPage['ending'])) {
    $prog['ended'] = true;
}
saveStoryProgress($storyId, $prog);
decrementGlobalStoryPages();

json_response(['ok' => true]);
