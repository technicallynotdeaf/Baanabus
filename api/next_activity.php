<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'],      423);

try {
    $tasks    = getDoableTasks();
    $hasTasks = !empty($tasks);
} catch (Throwable $e) {
    $tasks    = [];
    $hasTasks = false;
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
//   task slots    = energy level (1 exhausted → 5 on fire)
//   minigame slots = 6 - energy (inverse of tasks)
//   fatigue shift: every 4 activities, move 1 slot from task → minigame
//
//   Examples at act 0: energy 1 → 1t/5g, energy 3 → 3t/3g, energy 5 → 5t/1g
//   After 8 acts:      energy 3 → 1t/5g, energy 5 → 3t/3g
$fatigue   = (int)floor($actCount / 4);
$taskSlots = max(0, $energy - $fatigue);
$gameSlots = min(8, (6 - $energy) + $fatigue);

$pool = array_merge(
    $hasTasks ? array_fill(0, $taskSlots, 'task') : [],
    array_fill(0, 2, 'trivia'),
    array_fill(0, $gameSlots, 'minigame'),
    $missing ? ['missing_info'] : []
);

if (empty($pool)) {
    json_response(['type' => 'empty', 'message' => "Nothing to do right now — check back later."]);
}

$choice = $pool[array_rand($pool)];

if ($choice === 'trivia') json_response(pick_trivia());
if ($choice === 'minigame') {
    $games = ['tictactoe', 'numguess', 'rps', 'mathquiz'];
    json_response(['type' => 'minigame', 'game' => $games[array_rand($games)]]);
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
    // Both answered — mark onboarding complete and fall through to task
    try {
        $cfg['onboarding_complete'] = true;
        $cfg['onboarding_at']       = date('c');
        saveConfig($cfg);
    } catch (Throwable $e) { /* non-fatal */ }
}

if (!$hasTasks) {
    json_response(['type' => 'empty', 'message' => "No tasks right now — check back later."]);
}
$t   = $tasks[array_rand($tasks)];
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

// ---------- trivia pool ----------
function pick_trivia(): array {
    $questions = [
        ['q' => 'What is the only mammal capable of sustained flight?',
         'opts' => ['Flying squirrel','Bat','Sugar glider','Flying lemur'], 'ans' => 1],
        ['q' => 'What is the capital of Australia?',
         'opts' => ['Sydney','Melbourne','Canberra','Brisbane'], 'ans' => 2],
        ['q' => 'How many hearts does an octopus have?',
         'opts' => ['One','Two','Three','Four'], 'ans' => 2],
        ['q' => 'Which planet currently has the most known moons?',
         'opts' => ['Jupiter','Saturn','Uranus','Neptune'], 'ans' => 1],
        ['q' => 'What language has the most native speakers worldwide?',
         'opts' => ['English','Hindi','Mandarin','Spanish'], 'ans' => 2],
        ['q' => 'How many sides does a dodecagon have?',
         'opts' => ['10','11','12','14'], 'ans' => 2],
        ['q' => 'What is the hardest natural substance on Earth?',
         'opts' => ['Ruby','Diamond','Quartz','Topaz'], 'ans' => 1],
        ['q' => 'What does DNA stand for?',
         'opts' => ['Deoxyribonucleic Acid','Deoxyribose Nucleic Acid','Double Nucleic Arrangement','Distinct Nucleotide Assembly'], 'ans' => 0],
        ['q' => 'What is the smallest country in the world?',
         'opts' => ['Monaco','Liechtenstein','San Marino','Vatican City'], 'ans' => 3],
        ['q' => 'How many bones are in the adult human body?',
         'opts' => ['196','206','216','226'], 'ans' => 1],
        ['q' => 'What is the chemical symbol for gold?',
         'opts' => ['Gd','Go','Au','Ag'], 'ans' => 2],
        ['q' => 'Which ocean is the largest?',
         'opts' => ['Atlantic','Indian','Arctic','Pacific'], 'ans' => 3],
        ['q' => 'What year did the Berlin Wall fall?',
         'opts' => ['1987','1988','1989','1991'], 'ans' => 2],
        ['q' => 'What is the fastest land animal?',
         'opts' => ['Lion','Greyhound','Cheetah','Pronghorn'], 'ans' => 2],
        ['q' => 'What element does "Fe" represent on the periodic table?',
         'opts' => ['Fluorine','Fermium','Iron','Francium'], 'ans' => 2],
        ['q' => 'In which country were the first modern Olympic Games held?',
         'opts' => ['Italy','Greece','Turkey','Egypt'], 'ans' => 1],
        ['q' => 'What is the longest river in the world?',
         'opts' => ['Amazon','Congo','Yangtze','Nile'], 'ans' => 3],
        ['q' => 'How many colours are in a rainbow?',
         'opts' => ['5','6','7','8'], 'ans' => 2],
        ['q' => 'How many strings does a standard guitar have?',
         'opts' => ['4','5','6','7'], 'ans' => 2],
        ['q' => 'Which gas do plants absorb during photosynthesis?',
         'opts' => ['Oxygen','Nitrogen','Carbon dioxide','Hydrogen'], 'ans' => 2],
        ['q' => 'What is the currency of Japan?',
         'opts' => ['Won','Yuan','Rupee','Yen'], 'ans' => 3],
        ['q' => 'How many hours are in a week?',
         'opts' => ['148','168','172','184'], 'ans' => 1],
        ['q' => 'Which planet is known as the Red Planet?',
         'opts' => ['Venus','Mercury','Mars','Jupiter'], 'ans' => 2],
        ['q' => 'What is the largest organ in the human body?',
         'opts' => ['Liver','Lungs','Brain','Skin'], 'ans' => 3],
        ['q' => 'How many players are on a standard football (soccer) team?',
         'opts' => ['9','10','11','12'], 'ans' => 2],
    ];
    $q = $questions[array_rand($questions)];
    return ['type' => 'trivia', 'question' => $q['q'], 'options' => $q['opts'], 'answer' => $q['ans']];
}
