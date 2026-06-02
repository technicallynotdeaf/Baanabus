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
        $resetNow = time();
        $allTasks = getTasks()['tasks'];
        $subtasks = array_values(array_filter($allTasks, fn($s) =>
            !empty($s['parent_id']) &&
            (int)$s['parent_id'] === (int)$t['id'] &&
            $s['status'] === 'active' &&
            (!$s['snoozed_until'] || strtotime($s['snoozed_until']) <= $resetNow)
        ));
        usort($subtasks, fn($a, $b) => (int)$a['id'] <=> (int)$b['id']);
        $subtasks = array_map(fn($s) => ['id' => (int)$s['id'], 'title' => $s['title']], $subtasks);
        json_response(['type' => 'task', 'id' => (int)$t['id'], 'title' => $t['title'], 'subtasks' => $subtasks, 'reset_context' => true]);
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
        $greetings = [
            'Good to see you.',
            'Hey. Morning.',
            'Oh good, you\'re here.',
            'There you are.',
            'You made it.',
            'Hello, you.',
            'Nice to see your face.',
            'Morning. Glad you\'re here.',
        ];
        $prompts = [
            'How\'d you sleep?',
            'How\'s your energy today?',
            'How are you feeling?',
            'What kind of shape are you in?',
            'How are you doing today?',
            'How\'s your energy this morning?',
            'Energy check — where are you at?',
        ];
        $missing = [
            'type'     => 'missing_info',
            'field'    => 'energy_level',
            'greeting' => $greetings[array_rand($greetings)],
            'prompt'   => $prompts[array_rand($prompts)],
            'options'  => [
                ['value' => 1, 'label' => 'Exhausted'],
                ['value' => 2, 'label' => 'Low'],
                ['value' => 3, 'label' => 'Okay'],
                ['value' => 4, 'label' => 'Good'],
                ['value' => 5, 'label' => 'On fire'],
            ],
        ];
    } elseif (empty($row['day_type'])) {
        $energy  = max(1, min(5, (int)$row['energy_level']));
        $prompts = [
            'What kind of day is it?',
            'What\'s the day looking like?',
            'What does today look like for you?',
            'Home day, work day, or something else?',
        ];
        $missing = [
            'type'    => 'missing_info',
            'field'   => 'day_type',
            'prompt'  => $prompts[array_rand($prompts)],
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

// Bedtime mode — after 9pm Melbourne time, wind down instead of tasking
$melbHour = (int)(new DateTime('now', new DateTimeZone('Australia/Melbourne')))->format('H');
if ($melbHour >= 21) {
    $bedtimeMessages = [
        "You've done enough for today.",
        "Yawn.",
        "Close your eyes and take a deep breath.",
        "Go fill up a hot water bottle.",
        "Go get ready for bed.",
        "The to-do list will still be there tomorrow.",
        "Time to put the phone down.",
        "Wind down. Tomorrow is another day.",
        "You showed up today. That counts.",
        "Rest is part of the work.",
    ];
    json_response(['type' => 'bedtime', 'message' => $bedtimeMessages[array_rand($bedtimeMessages)]]);
}

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
    array_fill(0, 1,                                   'joke'),
    array_fill(0, 1,                                   'nutrition'),
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
if ($choice === 'joke')      json_response(pick_joke());
if ($choice === 'nutrition') json_response(pick_nutrition());
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
        // Include checklist items so the user can see what's inside a task during triage
        $triageNow = time();
        $allForTriage = getTasks()['tasks'];
        $triageItems = array_values(array_filter($allForTriage, fn($s) =>
            !empty($s['parent_id']) &&
            (int)$s['parent_id'] === (int)$t['id'] &&
            $s['status'] === 'active'
        ));
        usort($triageItems, fn($a, $b) => (int)$a['id'] <=> (int)$b['id']);
        $triageItems = array_map(fn($s) => $s['title'], $triageItems);
        json_response(['type' => 'triage', 'id' => (int)$t['id'], 'title' => $t['title'], 'question' => $q, 'items' => $triageItems]);
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

function pick_nutrition(): array {
    $facts = [
        // Feijoas
        "Feijoas have about 2g of fibre each. Eat four or five and you've knocked out a decent chunk of your day's 25g target — and they taste like a tropical holiday.",
        "Feijoas are one of the better fruit sources of folate. A cup of them gives you around 38mcg — useful if you're trying to get more B vitamins in.",

        // Kiwifruit
        "One kiwifruit has about 65mg of vitamin C. The Australian recommended daily intake for adults is just 45mg — so a single kiwi has you covered and then some.",
        "Kiwifruit contains an enzyme called actinidin that helps break down protein. It's why kiwi works as a meat tenderiser.",
        "Two kiwifruit before bed has been shown in studies to improve sleep onset and duration. The serotonin precursors in them are the likely reason.",

        // Capsicum
        "A red capsicum has around 190mg of vitamin C — that's more than four times the Australian daily recommended intake of 45mg. Green capsicum is just an unripe red one, and has about a third of the vitamin C.",
        "Red capsicums have nearly twice the vitamin C of green ones and about 11 times more beta-carotene. Same plant, just left on longer.",

        // Broccoli
        "A cup of raw broccoli has about 90mg of vitamin C — more than an orange. It also has calcium, folate, and fibre, all in one go.",
        "Broccoli belongs to the brassica family along with kale, cauliflower, cabbage, and Brussels sprouts. Eating more of any of them is associated with lower rates of some cancers.",

        // Avocado
        "Half an avocado has about 485mg of potassium — more than a banana. The Australian daily target for potassium is 2800mg (women) or 3800mg (men), so they add up fast.",
        "Avocados are one of the few fruits with significant monounsaturated fat. This is the same type as olive oil, and it helps your body absorb fat-soluble vitamins like A, D, E, and K.",

        // Sweet potato
        "One medium sweet potato (about 130g) gives you over 1000mcg of beta-carotene — your body converts that to vitamin A. The Australian RDI for vitamin A is 700mcg for women and 900mcg for men.",
        "Sweet potatoes are one of the most nutrient-dense foods by calorie. Fibre, potassium, vitamin C, vitamin B6, and a huge hit of beta-carotene, all under 500kJ.",

        // Spinach
        "Two cups of raw spinach gives you your full daily vitamin K — about 140mcg. Vitamin K is essential for blood clotting and bone metabolism.",
        "Spinach is high in iron, but also contains oxalates that reduce absorption. Eating it with a vitamin C source (like lemon juice or capsicum) improves how much iron you actually get.",

        // Beetroot
        "Beetroot is high in dietary nitrates, which your body converts to nitric oxide. That relaxes blood vessels and can measurably lower blood pressure within a few hours.",
        "The deep red colour in beetroot comes from betalains — pigments with antioxidant properties. Your body can't always break them down fully, which is why things can look alarming the next day.",

        // Blueberries
        "Blueberries are among the highest antioxidant foods measured by ORAC score (oxygen radical absorbance capacity). The blue pigment — anthocyanin — is the main driver.",
        "Frozen blueberries are nutritionally near-identical to fresh. Freezing preserves the anthocyanins, so a bag from the freezer aisle counts just as much.",

        // Mushrooms
        "Mushrooms are the only non-animal food that naturally produces vitamin D — and only when they've been exposed to UV light. Leaving them gill-side up in a sunny window for 15 minutes before cooking actually works.",

        // Garlic
        "Garlic's active compound is allicin, which forms when you crush or chop the clove. It's what gives garlic its smell and most of its health benefits. Let crushed garlic sit for 10 minutes before cooking to maximise allicin formation.",

        // Carrots
        "Cooked carrots release more beta-carotene than raw ones — heat breaks down the cell walls. A small amount of fat (butter, oil) helps your body absorb it, since beta-carotene is fat-soluble.",

        // Tomatoes
        "Cooked tomatoes have more available lycopene than raw ones — the heat breaks down the cell matrix. This is why tinned tomatoes and passata are actually nutritionally excellent.",
        "Tomatoes are technically a fruit, but Australia classifies them as a vegetable for dietary purposes. The lycopene in them is linked to reduced prostate cancer risk in observational studies.",

        // Bananas
        "Slightly underripe bananas contain resistant starch, which your gut bacteria ferment into short-chain fatty acids — good for the gut lining. As they ripen, the resistant starch converts to sugar.",

        // Legumes
        "Legumes — beans, lentils, chickpeas — are the one food consistently associated with longevity across every major long-lived population studied. They're high in fibre, protein, and slow-digesting carbs.",
        "Half a cup of cooked lentils has about 8g of fibre and 9g of protein, and costs almost nothing. They're also one of the best dietary sources of folate.",

        // Apples
        "The fibre in apples is mostly pectin — a soluble fibre that feeds good gut bacteria and helps slow sugar absorption. Most of it is in or just under the skin.",

        // Watermelon
        "Watermelon is 92% water, making it one of the most hydrating foods you can eat. It also has lycopene and a reasonable hit of vitamin C.",

        // Pumpkin
        "A cup of cooked pumpkin has about 2600mcg of beta-carotene — well over twice the Australian RDI for vitamin A — plus good fibre and potassium, all under 200kJ.",

        // Cabbage/brassicas
        "Cabbage is cheap, underrated, and genuinely nutritious. Half a cup of cooked cabbage has about 30mg of vitamin C, good fibre, and vitamin K — for almost no calories.",

        // General
        "Eating a wide variety of vegetables — especially different colours — feeds different strains of gut bacteria. More colour variety on your plate = more microbiome diversity.",
        "The Australian dietary guidelines recommend 5 serves of vegetables and 2 serves of fruit a day. Most Australians average about 2.5 serves of veg. So there's usually room to add more without overhauling anything.",
    ];
    return ['type' => 'nutrition', 'text' => $facts[array_rand($facts)]];
}

function pick_joke(): array {
    $jokes = [
        ['setup' => "Why don't scientists trust atoms?",                   'punchline' => "Because they make up everything."],
        ['setup' => "I told my doctor I broke my arm in two places.",       'punchline' => "He told me to stop going to those places."],
        ['setup' => "Why did the scarecrow win an award?",                  'punchline' => "He was outstanding in his field."],
        ['setup' => "What do you call cheese that isn't yours?",            'punchline' => "Nacho cheese."],
        ['setup' => "Why can't a bicycle stand on its own?",                'punchline' => "Because it's two-tired."],
        ['setup' => "What do you call a factory that makes okay products?", 'punchline' => "A satisfactory."],
        ['setup' => "I'm reading a book about anti-gravity.",               'punchline' => "It's impossible to put down."],
        ['setup' => "Did you hear about the claustrophobic astronaut?",     'punchline' => "He just needed a little space."],
        ['setup' => "Why do cows wear bells?",                              'punchline' => "Because their horns don't work."],
        ['setup' => "What do you call an alligator in a vest?",             'punchline' => "An investigator."],
        ['setup' => "How do you organise a space party?",                   'punchline' => "You planet."],
        ['setup' => "What did the ocean say to the beach?",                 'punchline' => "Nothing. It just waved."],
        ['setup' => "Why couldn't the leopard play hide and seek?",         'punchline' => "Because he was always spotted."],
        ['setup' => "What's a computer's favourite snack?",                 'punchline' => "Microchips."],
        ['setup' => "Why do we tell actors to 'break a leg'?",              'punchline' => "Because every play has a cast."],
        ['setup' => "What do you call a parade of rabbits hopping backwards?", 'punchline' => "A receding hare-line."],
        ['setup' => "I asked my dog what two minus two is.",                'punchline' => "He said nothing."],
        ['setup' => "What did one wall say to the other wall?",             'punchline' => "I'll meet you at the corner."],
        ['setup' => "Why did the math book look so sad?",                   'punchline' => "It had too many problems."],
        ['setup' => "I used to hate facial hair.",                          'punchline' => "Then it grew on me."],
        ['setup' => "Time flies like an arrow.",                            'punchline' => "Fruit flies like a banana."],
        ['setup' => "What do you call a sleeping dinosaur?",               'punchline' => "A dino-snore."],
        ['setup' => "I tried to come up with a joke about infinity.",       'punchline' => "But I couldn't find an ending."],
        ['setup' => "Why don't eggs tell jokes?",                          'punchline' => "They'd crack each other up."],
        ['setup' => "What do you call a fish without eyes?",               'punchline' => "A fsh."],
        ['setup' => "I only know 25 letters of the alphabet.",             'punchline' => "I don't know y."],
        ['setup' => "What's brown and sticky?",                            'punchline' => "A stick."],
        ['setup' => "Why did the golfer bring an extra pair of pants?",    'punchline' => "In case he got a hole in one."],
        ['setup' => "I have a joke about paper.",                          'punchline' => "It's tearable."],
        ['setup' => "What do you call a bear with no teeth?",              'punchline' => "A gummy bear."],
    ];
    $j = $jokes[array_rand($jokes)];
    return ['type' => 'joke', 'setup' => $j['setup'], 'punchline' => $j['punchline']];
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
        $total       = (int)$database->query("SELECT COUNT(*) FROM study_questions WHERE q_type='study'")->fetchColumn();
        $mastered    = (int)$database->query("
            SELECT COUNT(*) FROM question_seen qs
            JOIN study_questions sq ON sq.id = qs.question_id
            WHERE sq.q_type = 'study' AND qs.correct_count >= 2
        ")->fetchColumn();
        $once_correct = (int)$database->query("
            SELECT COUNT(*) FROM question_seen qs
            JOIN study_questions sq ON sq.id = qs.question_id
            WHERE sq.q_type = 'study' AND qs.correct_count >= 1
        ")->fetchColumn();
        $out['total']        = $total;
        $out['mastered']     = $mastered;
        $out['once_correct'] = $once_correct;
        return $out;
    } catch (Throwable $e) {
        error_log('pick_study: ' . $e->getMessage());
        return null;
    }
}
