<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'],      423);

// Load config early for game preferences and check-in setting
try { $cfg = getConfig() ?? []; } catch (Throwable $e) { $cfg = []; }
$gamePref     = $cfg['game_prefs']      ?? [];
$gamesEnabled = $gamePref['enabled']    ?? true;
$gameToggles  = $gamePref['minigames']  ?? [];
$checkinOn    = $cfg['checkin_enabled'] ?? true;

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

// Reset mode — find the single smallest task, or a quote/tip for grounding
if (!empty($_GET['reset'])) {
    try { $tasks = getDoableTasks(); } catch (Throwable $e) { $tasks = []; }
    if (!empty($tasks)) {
        // Sort by time (shortest first), then by energy level (lowest first)
        $energyOrder = ['low' => 0, 'medium' => 1, 'high' => 2];
        usort($tasks, function($a, $b) use ($energyOrder) {
            $ta = (int)($a['time'] ?? 999);
            $tb = (int)($b['time'] ?? 999);
            if ($ta !== $tb) return $ta <=> $tb;
            return ($energyOrder[$a['energy'] ?? 'medium'] ?? 1) <=> ($energyOrder[$b['energy'] ?? 'medium'] ?? 1);
        });
        $t = $tasks[0];
        json_response(['type' => 'task', 'id' => (int)$t['id'], 'title' => $t['title'], 'subtasks' => [], 'reset_context' => true]);
    }
    $q = pick_quote(); if ($q) json_response($q);
    $t = pick_tip();   if ($t) json_response($t);
    json_response(['type' => 'tip', 'id' => 0, 'text' => "Take a breath. You don't have to fix everything right now. One small thing is enough."]);
}

// Fatigue counter — increments each call, resets with the PHP session
$actCount = (int)($_SESSION['activity_count'] ?? 0);
$_SESSION['activity_count'] = $actCount + 1;

// Return welcome — detect gap since last visit
$todayDate    = date('Y-m-d');
$lastSeenDate = $cfg['last_seen_date'] ?? null;
$returnGap    = ($lastSeenDate && $lastSeenDate !== $todayDate)
    ? (int)(new DateTime($todayDate))->diff(new DateTime($lastSeenDate))->days
    : 0;
if ($lastSeenDate !== $todayDate) {
    try { $cfg['last_seen_date'] = $todayDate; saveConfig($cfg); } catch (Throwable $e) {}
}

// Pull today's check-in from the diary vault
$missing = null;
$energy  = 3; // default: Okay
try {
    $today = date('Y-m-d');
    $row   = getDiaryEntry($today);
    if (empty($row['energy_level'])) {
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
    } elseif (empty($row['day_type'])) {
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
} catch (Throwable $e) { /* non-fatal — use defaults */ }

// Comeback callout (set in mark_complete when best week detected) — fires once
if (!empty($_SESSION['comeback_callout'])) {
    unset($_SESSION['comeback_callout']);
    json_response(['type' => 'comeback_callout',
        'message' => "This is your best week in a while. I noticed."]);
}

// Return welcome on first activity after a gap — fires before check-in
if ($actCount === 0 && $returnGap >= 1) {
    if ($returnGap >= 30)     $welcomeMsg = "Welcome back. Take your time — we'll figure out what matters first.";
    elseif ($returnGap >= 7)  $welcomeMsg = "You're here. That's enough to start.";
    else                      $welcomeMsg = "Good to see you. No rush — let's just see what today needs.";
    json_response(['type' => 'return_welcome', 'message' => $welcomeMsg, 'gap_days' => $returnGap]);
}

// Surface the check-in on the first or second activity of a session
if ($missing && $actCount <= 1 && $checkinOn) json_response($missing);

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

$hasQuotes = false;
$hasTips   = false;
try { $hasQuotes = !empty(getQuotes()['items']); } catch (Throwable $e) {}
if ($database) {
    try { $hasTips = (bool)$database->query("SELECT 1 FROM tips LIMIT 1")->fetchColumn(); }
    catch (Throwable $e) {}
}

$easySlots = ($energy <= 2) ? 2 : 1;

$pool = array_merge(
    array_fill(0, $doableSlots,                        'task'),
    array_fill(0, $triageSlots,                        'triage'),
    array_fill(0, $hasStudy ? 3 : 0,                   'study'),
    array_fill(0, 2,                                   'trivia'),
    array_fill(0, $hasQuotes ? 2 : 0,                  'quote'),
    array_fill(0, $hasTips  ? 1 : 0,                   'tip'),
    array_fill(0, $gamesEnabled ? $gameSlots : 0,      'minigame'),
    array_fill(0, 1,                                   'fun_task'),
    array_fill(0, $easySlots,                          'easy_task'),
    ($missing && $checkinOn) ? ['missing_info'] : []
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

if ($choice === 'quote') {
    $q = pick_quote();
    if ($q) json_response($q);
    json_response(pick_trivia());
}
if ($choice === 'tip') {
    $t = pick_tip();
    if ($t) json_response($t);
    json_response(pick_trivia());
}
if ($choice === 'fun_task')  json_response(pick_fun_task());
if ($choice === 'easy_task') json_response(pick_easy_task());
if ($choice === 'trivia') json_response(pick_trivia());
if ($choice === 'study') {
    $s = pick_study();
    if ($s) json_response($s);
    json_response(pick_trivia()); // fallback if pool somehow empty
}
if ($choice === 'minigame') {
    $allGames = ['gemMatch','gemMatch','gemMatch','tictactoe','numguess','rps','mathquiz','truefalse','sequence','reaction','wordscramble','highlow'];
    // Filter to only enabled games (default: all on)
    $games = array_values(array_filter($allGames, fn($g) => $gameToggles[$g] ?? true));
    if (empty($games)) $games = $allGames; // fallback if all turned off somehow
    $lastGame = $_SESSION['last_minigame'] ?? null;
    if ($lastGame && count(array_unique($games)) > 1) {
        $games = array_values(array_filter($games, fn($g) => $g !== $lastGame));
    }
    $game = $games[array_rand($games)];
    $_SESSION['last_minigame'] = $game;
    json_response(['type' => 'minigame', 'game' => $game]);
}
if ($choice === 'triage') {
    shuffle($inboxTasks);
    foreach ($inboxTasks as $t) {
        $q = triage_next_question($t);
        if ($q === 'auto_classify') {
            try { vaultUpdateTask((int)$t['id'], ['task_type' => 'next_action']); } catch (Throwable $e) {}
            continue;
        }
        json_response(['type' => 'triage', 'id' => (int)$t['id'], 'title' => $t['title'], 'question' => $q]);
    }
    json_response(pick_trivia()); // inbox empty or all auto-classified
}
if ($choice === 'missing_info') json_response($missing);

// 'task' branch — serve next onboarding step if incomplete, otherwise a real task
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

// ---------- triage helpers ----------

function triage_next_question(array $t): string {
    if (empty($t['triage_actionable'])) return 'actionable';
    $time = isset($t['time']) ? (int)$t['time'] : null;
    if ($time === null) return 'duration';
    if ($time > 120) return 'first_step';
    return 'auto_classify'; // actionable + short = auto next_action
}

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
            $stmt = $database->prepare("
                SELECT sq.* FROM study_questions sq
                LEFT JOIN question_seen qs ON sq.id = qs.question_id
                WHERE sq.q_type = 'trivia'
                  AND (qs.correct_count IS NULL OR qs.correct_count < 2)
                ORDER BY RANDOM() LIMIT 1
            ");
            $stmt->execute();
            $q = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($q) return question_row_to_response($q, 'trivia');
            return pick_topic_picker();
        } catch (Throwable $e) {
            error_log('pick_trivia: ' . $e->getMessage());
        }
    }
    return ['type' => 'trivia', 'id' => 0, 'question' => 'What is the capital of Australia?',
            'options' => ['Sydney', 'Melbourne', 'Canberra', 'Brisbane'], 'answer' => 2];
}

function pick_topic_picker(): array {
    global $database;
    $allTopics = ['Plants', 'Pop Music', 'Food'];
    $available = [];
    if ($database) {
        foreach ($allTopics as $topic) {
            try {
                $s = $database->prepare("SELECT COUNT(*) FROM study_questions WHERE set_name = ? AND q_type = 'trivia'");
                $s->execute([$topic]);
                if ((int)$s->fetchColumn() === 0) $available[] = $topic;
            } catch (Throwable $e) {}
        }
    }
    return ['type' => 'topic_picker', 'topics' => $available];
}

function pick_tip(): ?array {
    global $database;
    if (!$database) return null;
    try {
        $t = $database->query("SELECT tip_id, tip FROM tips ORDER BY RANDOM() LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        return $t ? ['type' => 'tip', 'id' => (int)$t['tip_id'], 'text' => $t['tip']] : null;
    } catch (Throwable $e) {
        return null;
    }
}

function pick_quote(): ?array {
    try {
        $q = pickRandomQuote();
        return $q ? ['type' => 'quote', 'id' => $q['id'], 'text' => $q['text']] : null;
    } catch (Throwable $e) {
        return null;
    }
}

function pick_fun_task(): array {
    $tasks = [
        "Do 5 star jumps",
        "Close your eyes for 20 seconds and imagine you're somewhere beautiful",
        "Put on one song you love and just listen to it",
        "Draw something badly on purpose",
        "Walk to the end of the street and back",
        "Look up at the sky for 30 seconds",
        "Make yourself a proper cup of tea or coffee — no rushing",
        "Text someone you haven't spoken to in a while",
        "Stretch — arms up, side to side, touch your toes if you can",
        "Step outside for two minutes, even just to the doorstep",
        "Write down one thing you're glad happened this week",
        "Find something nearby that's a colour you like and look at it for a moment",
        "Send someone a voice message instead of a text",
    ];
    return ['type' => 'fun_task', 'text' => $tasks[array_rand($tasks)]];
}

function pick_easy_task(): array {
    $tasks = [
        "Drink a full glass of water",
        "Box breathing — breathe in for 4, hold for 4, out for 4, hold for 4. Three rounds.",
        "Tidy one small thing — just one",
        "Sit quietly for two minutes",
        "Stretch your arms above your head and hold for ten seconds",
        "Write one sentence — anything at all",
        "Step outside for five minutes",
        "Put away three things that are out of place",
        "Take your vitamins or any medication you need today",
        "Wash your face",
        "Make your bed or straighten where you're sitting",
    ];
    return ['type' => 'easy_task', 'text' => $tasks[array_rand($tasks)]];
}

function pick_study(): ?array {
    global $database;
    if (!$database) return null;
    try {
        // Prefer unseen questions first, then least-correctly-answered, then random
        $stmt = $database->prepare("
            SELECT sq.* FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'study'
              AND (qs.correct_count IS NULL OR qs.correct_count < 2)
            ORDER BY
              CASE WHEN qs.question_id IS NULL THEN 0 ELSE 1 END ASC,
              COALESCE(qs.correct_count, 0) ASC,
              RANDOM()
            LIMIT 1
        ");
        $stmt->execute();
        $q = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$q) return null;
        $out = question_row_to_response($q, 'study');
        // Attach progress counts
        $total    = (int)$database->query("SELECT COUNT(*) FROM study_questions WHERE q_type='study'")->fetchColumn();
        $mastered = (int)$database->query("
            SELECT COUNT(*) FROM question_seen qs
            JOIN study_questions sq ON sq.id = qs.question_id
            WHERE sq.q_type = 'study' AND qs.correct_count >= 2
        ")->fetchColumn();
        $out['total']    = $total;
        $out['mastered'] = $mastered;
        return $out;
    } catch (Throwable $e) {
        error_log('pick_study: ' . $e->getMessage());
        return null;
    }
}
