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

// The bookshelf's "N pages waiting" badge is otherwise baked into the canvas
// at page load and never updates — e.g. pages earned via the agent API, or
// just time passing since the tab was opened, left it stuck until a manual
// reload. Piggyback the current value on this already-running 30s poll so
// the scene can refresh it live.
$storyCurrentBook = 0;
$storyPagesAvail  = 0;
if (isUnlocked()) {
    try {
        $bookState        = getStoryBookState();
        $storyCurrentBook = $bookState['current_book'];
        $storyPagesAvail  = $bookState['pages_avail'];
    } catch (Throwable $e) {}
}

json_response([
    'ok'                => true,
    'story_current_book' => $storyCurrentBook,
    'story_pages_avail'  => $storyPagesAvail,
]);
