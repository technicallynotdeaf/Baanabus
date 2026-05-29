<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'],      423);

try {
    $tasks      = getDoableTasks();
    $hasTasks   = !empty($tasks);
    $inboxTasks = getInboxTasks();
    $hasInbox   = !empty($inboxTasks);
} catch (Throwable $e) {
    $tasks      = [];
    $hasTasks   = false;
    $inboxTasks = [];
    $hasInbox   = false;
}

// Fatigue counter — increments each call, resets with the PHP session
$actCount = (int)($_SESSION['activity_count'] ?? 0);
$_SESSION['activity_count'] = $actCount + 1;

// Pull today's check-in; capture energy for pool weighting at the same time
$missing = null;
$energy  = 3; // default: Okay
if ($database) {
    try {
        $today = date('Y-m-d');
        $stmt  = $database->prepare("SELECT energy_level, day_type FROM diary WHERE date = ?");
        $stmt->execute([$today]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row || $row['energy_level'] === null) {
            $missing = [
                'type'    => 'missing_info',
                'field'   => 'energy_level',
                'prompt'  => "How's your energy today?",
                'options' => [
                    ['value' => 1, 'label' => 'Exhausted'],
                    ['value' => 2, 'label' => 'Low'],
                    ['value' => 3, 'label' => 'Okay'],
                    ['value' => 4, 'label' => 'Good'],
                    ['value' => 5, 'label' => 'On fire'],
                ],
            ];
        } elseif ($row['day_type'] === null) {
            $energy  = max(1, min(5, (int)$row['energy_level']));
            $missing = [
                'type'    => 'missing_info',
                'field'   => 'day_type',
                'prompt'  => 'What kind of day is it?',
                'options' => [
                    ['value' => 1, 'label' => 'Home'],
                    ['value' => 2, 'label' => 'Work'],
                    ['value' => 3, 'label' => 'Out'],
                    ['value' => 4, 'label' => 'Rest'],
                ],
            ];
        } else {
            $energy = max(1, min(5, (int)$row['energy_level']));
        }
    } catch (Throwable $e) { /* non-fatal */ }
}

// Always surface the check-in on the very first activity of a session
if ($missing && $actCount === 0) json_response($missing);

// Energy-aware + fatigue pool:
//   task slots    = energy level (1–5); minigame slots = 6 - energy (inverse)
//   fatigue shift: every 4 activities, move 1 slot from task → minigame
//   Inbox triage takes the task slots — doable tasks only appear once inbox is clear.
//   Triage always gets at least 1 slot so the inbox can't starve at low energy.
$fatigue   = (int)floor($actCount / 4);
$taskSlots = max(0, $energy - $fatigue);
$gameSlots = min(8, (6 - $energy) + $fatigue);

$triageSlots = $hasInbox ? max(1, $taskSlots) : 0;
$doableSlots = (!$hasInbox && $hasTasks) ? $taskSlots : 0;

// Check for available study questions (unseen or not yet correctly answered twice)
$hasStudy = false;
if ($database) {
    try {
        $hasStudy = (bool)$database->query("
            SELECT 1 FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'study'
              AND (qs.correct_count IS NULL OR qs.correct_count < 2)
            LIMIT 1
        ")->fetchColumn();
    } catch (Throwable $e) {}
}

$pool = array_merge(
    array_fill(0, $doableSlots,          'task'),
    array_fill(0, $triageSlots,          'triage'),
    array_fill(0, $hasStudy ? 3 : 0,     'study'),
    array_fill(0, 2,                     'trivia'),
    array_fill(0, $gameSlots,            'minigame'),
    $missing ? ['missing_info'] : []
);

if (empty($pool)) {
    json_response(['type' => 'empty', 'message' => "Nothing to do right now — check back later."]);
}

// Avoid the same activity type twice in a row
$lastActivity = $_SESSION['last_activity'] ?? null;
if ($lastActivity && count(array_unique($pool)) > 1) {
    $pool = array_values(array_filter($pool, fn($t) => $t !== $lastActivity));
}

$choice = $pool[array_rand($pool)];
$_SESSION['last_activity'] = $choice;

if ($choice === 'trivia') json_response(pick_trivia());
if ($choice === 'study') {
    $s = pick_study();
    if ($s) json_response($s);
    json_response(pick_trivia()); // fallback if pool somehow empty
}
if ($choice === 'minigame') {
    $games    = ['tictactoe', 'numguess', 'rps', 'mathquiz', 'truefalse', 'sequence', 'reaction', 'wordscramble', 'highlow'];
    $lastGame = $_SESSION['last_minigame'] ?? null;
    if ($lastGame && count($games) > 1) {
        $games = array_values(array_filter($games, fn($g) => $g !== $lastGame));
    }
    $game = $games[array_rand($games)];
    $_SESSION['last_minigame'] = $game;
    json_response(['type' => 'minigame', 'game' => $game]);
}
if ($choice === 'triage') {
    $t = $inboxTasks[array_rand($inboxTasks)];
    json_response(['type' => 'triage', 'id' => (int)$t['id'], 'title' => $t['title']]);
}
if ($choice === 'missing_info') json_response($missing);

// 'task' branch — serve next onboarding step if incomplete, otherwise a real task
try { $cfg = getConfig() ?? []; } catch (Throwable $e) { $cfg = []; }
$prefs = $cfg['preferences'] ?? [];

if (empty($cfg['onboarding_complete'])) {
    if (!isset($prefs['peanut_butter'])) {
        json_response([
            'type'    => 'onboarding_step',
            'step'    => 'peanut_butter',
            'prompt'  => 'Quick one — smooth or crunchy peanut butter?',
            'options' => [
                ['value' => 'smooth',  'label' => 'Smooth'],
                ['value' => 'crunchy', 'label' => 'Crunchy'],
            ],
        ]);
    }
    if (!array_key_exists('uses_habitica', $prefs)) {
        json_response([
            'type'   => 'onboarding_step',
            'step'   => 'habitica',
            'prompt' => 'Do you use Habitica? I can sync your tasks with it.',
        ]);
    }
    try {
        $cfg['onboarding_complete'] = true;
        $cfg['onboarding_at']       = date('c');
        saveConfig($cfg);
    } catch (Throwable $e) { /* non-fatal */ }
}

if (!$hasTasks) {
    json_response(['type' => 'empty', 'message' => "No tasks right now — check back later."]);
}
$energyWeights = [
    'low'    => [1 => 10, 2 => 7, 3 => 3, 4 => 1, 5 => 1],
    'medium' => [1 => 2,  2 => 4, 3 => 8, 4 => 6, 5 => 3],
    'high'   => [1 => 0,  2 => 0, 3 => 3, 4 => 6, 5 => 10],
];
$weightedPool = [];
foreach ($tasks as $task) {
    $te = $task['energy'] ?? 'medium';
    $w  = $energyWeights[$te][$energy] ?? 3;
    for ($i = 0; $i < $w; $i++) $weightedPool[] = $task;
}
$t = $weightedPool[array_rand($weightedPool)];
$now = time();
try {
    $allTasks = getTasks()['tasks'];
    $subtasks = array_values(array_filter($allTasks, fn($s) =>
        !empty($s['parent_id']) &&
        (int)$s['parent_id'] === (int)$t['id'] &&
        $s['status'] === 'active' &&
        (!$s['snoozed_until'] || strtotime($s['snoozed_until']) <= $now)
    ));
    usort($subtasks, fn($a, $b) => (int)$a['id'] <=> (int)$b['id']);
    $subtasks = array_map(fn($s) => ['id' => (int)$s['id'], 'title' => $s['title']], $subtasks);
} catch (Throwable $e) {
    $subtasks = [];
}
json_response(['type' => 'task', 'id' => (int)$t['id'], 'title' => $t['title'], 'subtasks' => $subtasks]);

// ---------- question helpers ----------

function question_row_to_response(array $q, string $type): array {
    $opts = [$q['option_a'], $q['option_b'], $q['option_c'], $q['option_d']];
    $ans  = array_search($q['correct'], ['a', 'b', 'c', 'd'], true);
    $out  = [
        'type'     => $type,
        'id'       => (int)$q['id'],
        'question' => $q['question'],
        'options'  => $opts,
        'answer'   => $ans === false ? 0 : (int)$ans,
    ];
    if ($type === 'study') {
        $out['explanation'] = $q['explanation'] ?? null;
        $out['set_name']    = $q['set_name']    ?? null;
    }
    return $out;
}

function pick_trivia(): array {
    global $database;
    if ($database) {
        try {
            // Prefer questions not yet seen twice
            $stmt = $database->prepare("
                SELECT sq.* FROM study_questions sq
                LEFT JOIN question_seen qs ON sq.id = qs.question_id
                WHERE sq.q_type = 'trivia'
                  AND (qs.seen_count IS NULL OR qs.seen_count < 2)
                ORDER BY RANDOM() LIMIT 1
            ");
            $stmt->execute();
            $q = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$q) {
                // All trivia exhausted — reset and start the cycle again
                $database->exec("
                    DELETE FROM question_seen
                    WHERE question_id IN (SELECT id FROM study_questions WHERE q_type = 'trivia')
                ");
                $q = $database->query("
                    SELECT * FROM study_questions WHERE q_type = 'trivia' ORDER BY RANDOM() LIMIT 1
                ")->fetch(PDO::FETCH_ASSOC);
            }

            if ($q) return question_row_to_response($q, 'trivia');
        } catch (Throwable $e) {
            error_log('pick_trivia: ' . $e->getMessage());
        }
    }
    // Emergency fallback
    return ['type' => 'trivia', 'id' => 0, 'question' => 'What is the capital of Australia?',
            'options' => ['Sydney', 'Melbourne', 'Canberra', 'Brisbane'], 'answer' => 2];
}

function pick_study(): ?array {
    global $database;
    if (!$database) return null;
    try {
        $stmt = $database->prepare("
            SELECT sq.* FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'study'
              AND (qs.correct_count IS NULL OR qs.correct_count < 2)
            ORDER BY RANDOM() LIMIT 1
        ");
        $stmt->execute();
        $q = $stmt->fetch(PDO::FETCH_ASSOC);
        return $q ? question_row_to_response($q, 'study') : null;
    } catch (Throwable $e) {
        error_log('pick_study: ' . $e->getMessage());
        return null;
    }
}
