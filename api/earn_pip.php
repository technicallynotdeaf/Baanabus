<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

try {
    $target        = todayPagesTarget();
    $data          = getTasks();
    $data['pages']       = ($data['pages']       ?? 0) + 1;
    $data['total_pages'] = ($data['total_pages'] ?? 0) + 1;
    $newStoryPage  = false;
    if ($data['pages'] >= $target) {
        $data['pages'] = 0;
        $newStoryPage  = true;
    }
    saveTasks($data);
    if ($newStoryPage) {
        try { incrementStoryPages(1); } catch (Throwable $e) { error_log('earn_pip: incrementStoryPages failed: ' . $e->getMessage()); }
    }
    json_response(['ok' => true, 'pages' => $data['pages'], 'pages_target' => $target, 'total_pages' => $data['total_pages'], 'newStoryPage' => $newStoryPage]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
