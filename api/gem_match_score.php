<?php
/**
 * api/gem_match_score.php — Gem Match personal-best score, server-side.
 * Previously stored client-side only (localStorage), which meant a
 * different "best" per browser/device with no way to reconcile them.
 * GET              → { ok, best }
 * POST { score }   → if score beats the stored best, saves it; always
 *                     returns the (possibly unchanged) authoritative best.
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cfg = getConfig() ?? [];
    json_response(['ok' => true, 'best' => (int)($cfg['minigame_best']['gemMatch'] ?? 0)]);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'GET or POST only'], 405);

$in    = json_decode(file_get_contents('php://input'), true) ?? [];
$score = (int)($in['score'] ?? 0);
if ($score <= 0) json_response(['error' => 'Invalid score'], 400);

try {
    $cfg     = getConfig() ?? [];
    $current = (int)($cfg['minigame_best']['gemMatch'] ?? 0);
    $newBest = $score > $current;
    if ($newBest) {
        $cfg['minigame_best']['gemMatch'] = $score;
        saveConfig($cfg);
        $current = $score;
    }
    json_response(['ok' => true, 'best' => $current, 'new_best' => $newBest]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
