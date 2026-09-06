<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

// Must be defined before any pick_quote() call — const at file scope is runtime, not hoisted.
const AFFIRMATIONS = [
    "I am capable even when I don't feel like it.",
    "I can learn new things.",
    "I can get things done without having to feel like it first.",
    "I am not less valuable than anyone else.",
    "I don't talk to myself in ways I wouldn't talk to other people.",
    "Feelings are not facts.",
    "Action comes before motivation, not after.",
    "I am allowed to take up space.",
    "Small steps count.",
    "I don't have to earn rest.",
    "What I do today is enough.",
    "Getting it done imperfectly is better than not at all.",
    "My worth is not conditional on my productivity.",
    "I am more resilient than I feel right now.",
    "I can be kind to myself.",
    "I don't have to have it all figured out.",
    "One thing at a time is a valid strategy.",
    "It's okay to ask for help.",
    "Progress is not linear and that is normal.",
    "I am the kind of person who keeps going.",
    "Way to go.",
    "Great work.",
    "Keep going.",
    "You're doing it.",
    "One more thing done.",
    "That's progress.",
    "Nice one.",
    "Look at you, getting things done.",
    "That mattered.",
    "You showed up today.",
    "Good.",
    "That counts.",
    "You're more capable than you feel right now.",
    "You got this.",
    "That was the hard part. You did it.",
    "Yes. That.",
];

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'],      423);

if (($_GET['force'] ?? '') === 'room_scan') {
    $r = pick_room_scan();
    if ($r) json_response($r);
    // no room due for a scan — fall through to normal selection
}

// Load config early for game preferences and check-in setting
try { $cfg = getConfig() ?? []; } catch (Throwable $e) { $cfg = []; }
$gamePref     = $cfg['game_prefs']      ?? [];
$gamesEnabled = $gamePref['enabled']    ?? true;
$gameToggles  = $gamePref['minigames']  ?? [];
$checkinOn        = $cfg['checkin_enabled'] ?? true;
$danceTodaySeconds = (int)($cfg['dance_log'][date('Y-m-d')] ?? 0);

try {
    $tasks      = getDoableTasks();
    $hasTasks   = !empty($tasks);
    $inboxTasks = getInboxTasks();
    $hasInbox   = !empty($inboxTasks);
    $inboxCount = count($inboxTasks);
    $fillTasks  = getFillTasks();
    $hasFillTasks = !empty($fillTasks);
} catch (Throwable $e) {
    $tasks        = [];
    $hasTasks     = false;
    $inboxTasks   = [];
    $hasInbox     = false;
    $inboxCount   = 0;
    $fillTasks    = [];
    $hasFillTasks = false;
}

// Reset mode — grounding prompts and the smallest task are both valid responses
if (!empty($_GET['reset'])) {
    $resetPool = [];

    // Grounding prompts (weighted 2x — regulation is the primary purpose of Reset)
    try {
        $p1 = pickRegulationPrompt();
        if ($p1) $resetPool[] = ['_type' => 'regulation', 'prompt' => $p1];
        $p2 = pickRegulationPrompt();
        if ($p2) $resetPool[] = ['_type' => 'regulation', 'prompt' => $p2];
    } catch (Throwable $e) {}

    // Smallest task
    try {
        $resetTasks = getDoableTasks();
        if (!empty($resetTasks)) {
            $energyOrder = ['low' => 0, 'medium' => 1, 'high' => 2];
            usort($resetTasks, function($a, $b) use ($energyOrder) {
                $ta = (int)($a['time'] ?? 999);
                $tb = (int)($b['time'] ?? 999);
                if ($ta !== $tb) return $ta <=> $tb;
                return ($energyOrder[$a['energy'] ?? 'medium'] ?? 1) <=> ($energyOrder[$b['energy'] ?? 'medium'] ?? 1);
            });
            $resetPool[] = ['_type' => 'task', 'task' => $resetTasks[0]];
        }
    } catch (Throwable $e) {}

    if (!empty($resetPool)) {
        $pick = $resetPool[array_rand($resetPool)];
        if ($pick['_type'] === 'regulation') {
            $p = $pick['prompt'];
            json_response([
                'type'          => 'regulation',
                'prompt_id'     => $p['id'],
                'text'          => $p['text'],
                'category'      => $p['category'],
                'is_custom'     => !empty($p['is_custom']),
                'seconds'       => $p['seconds'] ?? null,
                'reset_context' => true,
            ]);
        } else {
            $t       = $pick['task'];
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
            json_response(['type' => 'task', 'id' => (int)$t['id'], 'title' => $t['title'],
                           'subtasks' => $subtasks, 'reset_context' => true]);
        }
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
        $dayTypeOpts = [
            ['value' => 1, 'label' => 'Home'],
            ['value' => 2, 'label' => 'Work'],
            ['value' => 3, 'label' => 'Out'],
            ['value' => 4, 'label' => 'Rest'],
        ];
        if ($database) {
            try {
                $dtRows = $database->query("SELECT day_type, label FROM day_types ORDER BY day_type")->fetchAll(PDO::FETCH_ASSOC);
                if ($dtRows) $dayTypeOpts = array_map(fn($r) => ['value' => (int)$r['day_type'], 'label' => $r['label']], $dtRows);
            } catch (Throwable $e) {}
        }
        $missing = [
            'type'    => 'missing_info',
            'field'   => 'day_type',
            'prompt'  => $prompts[array_rand($prompts)],
            'options' => $dayTypeOpts,
        ];
    } elseif (empty($row['location'])) {
        $energy  = max(1, min(5, (int)$row['energy_level']));
        $locOpts = [
            ['value' => 1, 'label' => 'Home'],
            ['value' => 2, 'label' => 'Work'],
            ['value' => 3, 'label' => 'Out'],
            ['value' => 4, 'label' => 'Rest'],
            ['value' => 6, 'label' => 'Transit'],
        ];
        if ($database) {
            try {
                $locRows = $database->query("SELECT location_id, label FROM locations ORDER BY location_id")->fetchAll(PDO::FETCH_ASSOC);
                if ($locRows) $locOpts = array_map(fn($r) => ['value' => (int)$r['location_id'], 'label' => $r['label']], $locRows);
            } catch (Throwable $e) {}
        }
        $missing = [
            'type'    => 'missing_info',
            'field'   => 'location',
            'prompt'  => 'Where are you right now?',
            'options' => $locOpts,
        ];
    } else {
        $energy  = max(1, min(5, (int)$row['energy_level']));
        $dayType = (int)($row['day_type'] ?? 0);
        $physicalLocation = (int)$row['location'];

        // Anticipation check: once per day in the morning if not yet answered
        if (!isset($row['anticipation']) && (int)date('H') < 13) {
            $missing = [
                'type'   => 'missing_info',
                'field'  => 'anticipation',
                'prompt' => 'What are you looking forward to?',
            ];
        }
    }
} catch (Throwable $e) { /* non-fatal — use defaults */ }
$dayType          = $dayType ?? 0;
$physicalLocation = $physicalLocation ?? $dayType;

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

// Bedtime wind-down — replaces tasking/triage/games with a pre-bed checklist,
// then calm wind-down activities, for the configured evening window. Sits
// ahead of morning dailies/review and both triage windows below so nothing
// cognitively effortful can preempt it once the window is active. Explicit
// requests (?reset=1, ?force=room_scan) already exit above this point, so
// they remain untouched, deliberate bypasses.
$bedtimeCfg = $cfg['bedtime'] ?? ['enabled' => true, 'start_hour' => 21, 'end_hour' => 6];
$btHour     = (int)(new DateTime('now'))->format('H'); // no explicit DateTimeZone — init.php already sets the per-user zone
$inBedtimeWindow = !empty($bedtimeCfg['enabled']) && ($btHour >= (int)$bedtimeCfg['start_hour'] || $btHour < (int)$bedtimeCfg['end_hour']);

if ($inBedtimeWindow) {
    $resp = serve_bedtime($cfg, $bedtimeCfg, $btHour);
    if ($resp) json_response($resp);
}

// Split active dailies by horizon. Morning items are forced one-at-a-time, but not
// back-to-back — the last_activity check ensures a game/task appears in between.
// Day/evening items enter the normal pool below ($otherDailies).
$morningDailies = [];
$otherDailies   = [];
try {
    $allActiveDailies = getActiveDailies();
    $morningDailies   = array_values(array_filter($allActiveDailies, fn($d) => getDailyHorizon($d) === 'morning'));
    $otherDailies     = array_values(array_filter($allActiveDailies, fn($d) => getDailyHorizon($d) !== 'morning'));
} catch (Throwable $e) { /* non-fatal */ }

if (!empty($morningDailies) && ($_SESSION['last_activity'] ?? '') !== 'morning_daily') {
    $skip      = array_filter(array_map('intval', explode(',', $_GET['skip'] ?? '')));
    $available = empty($skip)
        ? $morningDailies
        : array_values(array_filter($morningDailies, fn($d) => !in_array((int)$d['id'], $skip, true)));
    if (!empty($available)) {
        $d         = $available[array_rand($available)];
        $dSubtasks = array_values(array_map(
            fn($ci) => ['id' => $ci['id'], 'title' => $ci['text']],
            $d['checklist'] ?? []
        ));
        $_SESSION['last_activity'] = 'morning_daily';
        json_response([
            'type'      => 'morning_daily',
            'id'        => (int)$d['id'],
            'title'     => $d['title'],
            'notes'     => $d['notes'] ?? '',
            'subtasks'  => $dSubtasks,
            'horizon'   => getDailyHorizon($d),
            'remaining' => count($morningDailies),
            'looped'    => false,
        ]);
    }
    // All morning dailies skipped — fall through to normal pool
}

// Morning review: show tasks that woke from snooze today, one at a time, before the normal pool
// Fires while session is fresh (actCount ≤ 5) so it doesn't interrupt mid-session activity
if ($actCount <= 5 && ($_SESSION['last_activity'] ?? '') !== 'morning_review') {
    try {
        $allTasks = getTasks()['tasks'];
        $todayDate = date('Y-m-d');
        $wokeToday = array_values(array_filter($allTasks, fn($t) =>
            ($t['woke_date'] ?? '') === $todayDate &&
            $t['status'] === 'active'
        ));
        if (!empty($wokeToday)) {
            $t = $wokeToday[0];
            $remaining = count($wokeToday);
            $mrNow = time();
            $mrSubtasks = array_values(array_filter($allTasks, fn($s) =>
                !empty($s['parent_id']) &&
                (int)$s['parent_id'] === (int)$t['id'] &&
                $s['status'] === 'active' &&
                (!$s['snoozed_until'] || strtotime($s['snoozed_until']) <= $mrNow)
            ));
            usort($mrSubtasks, fn($a, $b) => (int)$a['id'] <=> (int)$b['id']);
            $mrSubtasks = array_map(fn($s) => ['id' => (int)$s['id'], 'title' => $s['title']], $mrSubtasks);
            $_SESSION['last_activity'] = 'morning_review';
            json_response([
                'type'        => 'morning_review',
                'id'          => (int)$t['id'],
                'title'       => $t['title'],
                'description' => $t['description'] ?? null,
                'subtasks'    => $mrSubtasks,
                'context'     => trim($t['context'] ?? '') ?: null,
                'time'        => $t['time'] ?? null,
                'person_name' => personNameForId($t['person_id'] ?? null),
                'location'    => $t['location'] ?? null,
                'remaining'   => $remaining,
            ]);
        }
    } catch (Throwable $e) { /* non-fatal */ }
}

// While inbox has items: force triage window scales with pile size (larger pile = longer forced run)
// (fill-tasks only: force 2–4, then normal pool)
$triageForceEnd   = $inboxCount > 20 ? 10 : 6;
$triageOddsExclud = $inboxCount > 20 ? 4  : 3;   // 3/4 vs 2/3 chance of triage after forced window
if ($hasInbox && $actCount >= 2 && $actCount <= $triageForceEnd) {
    $resp = serve_triage_question($inboxTasks, $fillTasks);
    if ($resp) { $_SESSION['last_activity'] = 'triage'; json_response($resp); }
}
if ($hasFillTasks && !$hasInbox && $actCount >= 2 && $actCount <= 4) {
    $resp = serve_triage_question($inboxTasks, $fillTasks);
    if ($resp) { $_SESSION['last_activity'] = 'triage'; json_response($resp); }
}
// Beyond the forced window: probabilistic triage (never back-to-back)
if ($hasInbox && $actCount > $triageForceEnd && ($_SESSION['last_activity'] ?? '') !== 'triage' && rand(1, $triageOddsExclud) !== 1) {
    $resp = serve_triage_question($inboxTasks, $fillTasks);
    if ($resp) { $_SESSION['last_activity'] = 'triage'; json_response($resp); }
}

// Inbox milestone — celebrate every 5 items cleared in this session
if (!isset($_SESSION['session_inbox_start'])) {
    $_SESSION['session_inbox_start']    = $inboxCount;
    $_SESSION['session_inbox_notified'] = 0;
}
$sessionCleared = (int)$_SESSION['session_inbox_start'] - $inboxCount;
$nextNotify     = (int)($_SESSION['session_inbox_notified'] ?? 0) + 5;
if ($sessionCleared >= $nextNotify && $sessionCleared > 0) {
    $_SESSION['session_inbox_notified'] = $nextNotify;
    if ($inboxCount === 0)     $msg = "Inbox clear. That's everything.";
    elseif ($inboxCount <= 5)  $msg = "Almost clear — just {$inboxCount} left in the inbox.";
    elseif ($inboxCount <= 10) $msg = "Under 10 inbox items now. That pile is shrinking.";
    elseif ($inboxCount <= 20) $msg = "Under 20 in the inbox. You're getting through it.";
    elseif ($inboxCount <= 30) $msg = "Under 30 in the inbox. Keep going.";
    else                       $msg = "You've cleared {$sessionCleared} items from the inbox this session.";
    json_response(['type' => 'inbox_milestone', 'message' => $msg, 'inbox_count' => $inboxCount]);
}

// Energy-aware + fatigue pool:
//   task slots    = energy level (1–5); minigame slots = 6 - energy (inverse)
//   fatigue shift: every 4 activities, move 1 slot from minigame's inverse
//   baseline upward — but only erodes TASK slots at the lowest ("Exhausted",
//   energy=1) tier. At every other energy level, doing/snoozing/categorizing
//   a real task is itself soothing rather than draining, so a long session
//   shouldn't push tasks out of rotation the way it fairly should when the
//   user is genuinely exhausted.
//   Triage slots scale with inbox count when inbox is non-empty (dominates the pool).
//   Short doable tasks surface at half-weight alongside inbox triage.
$fatigue     = (int)floor($actCount / 4);
$taskFatigue = ($energy <= 1) ? $fatigue : 0;
$taskSlots   = max(0, $energy - $taskFatigue);
$gameSlots   = min(8, (6 - $energy) + $fatigue);

if ($hasInbox) {
    $triageSlots = min($inboxCount * 2 + $taskSlots, 10);
} elseif ($hasFillTasks) {
    $triageSlots = max(1, $taskSlots);
} else {
    $triageSlots = 0;
}
$doableSlots = $hasTasks ? ($hasInbox ? max(1, intdiv($taskSlots, 2)) : $taskSlots) : 0;

// Check for available study questions (unseen or not yet correctly answered twice),
// scoped to whichever study set(s) the user has active (see getActiveStudySets()).
$hasStudy = false;
if ($database) {
    try {
        $activeStudySets = getActiveStudySets();
        $setPlaceholders = [];
        foreach ($activeStudySets as $i => $sn) $setPlaceholders[] = ":set_$i";
        $stmt = $database->prepare("
            SELECT 1 FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'study'
              AND (qs.correct_count IS NULL OR qs.correct_count < 2)
              " . ($setPlaceholders ? "AND sq.set_name IN (" . implode(',', $setPlaceholders) . ")" : "") . "
            LIMIT 1
        ");
        foreach ($activeStudySets as $i => $sn) $stmt->bindValue(":set_$i", $sn);
        $stmt->execute();
        $hasStudy = (bool)$stmt->fetchColumn();
    } catch (Throwable $e) {}
}

// Check for available trivia (unseen/uncorrected questions, or a topic still locked to unlock)
$hasTrivia = false;
if ($database) {
    try {
        $hasTrivia = (bool)$database->query("
            SELECT 1 FROM study_questions sq
            LEFT JOIN question_seen qs ON sq.id = qs.question_id
            WHERE sq.q_type = 'trivia'
              AND (qs.correct_count IS NULL OR qs.correct_count < 2)
            LIMIT 1
        ")->fetchColumn();
        if (!$hasTrivia) {
            foreach (['Plants', 'Pop Music', 'Food'] as $topic) {
                $s = $database->prepare("SELECT COUNT(*) FROM study_questions WHERE set_name = ? AND q_type = 'trivia'");
                $s->execute([$topic]);
                if ((int)$s->fetchColumn() === 0) { $hasTrivia = true; break; }
            }
        }
    } catch (Throwable $e) {}
}

$hasQuotes = false;
$hasTips   = false;
try { $hasQuotes = !empty(getQuotes()['items']); } catch (Throwable $e) {}
if ($database) {
    try {
        $totalTips = (int)$database->query("SELECT COUNT(*) FROM tips")->fetchColumn();
        if ($totalTips > 0) {
            $tipsSeen = $cfg['tips_seen'] ?? [];
            $expired  = count(array_filter($tipsSeen, fn($c) => $c >= 2));
            $hasTips  = $expired < $totalTips;
        }
    } catch (Throwable $e) {}
}

$easySlots = ($energy <= 2) ? 2 : 1;

// House tasks: only when physically at home (Home=1, Rest=4, WFH=5)
$hasHouseTasks = false;
if (in_array($physicalLocation, [1, 4, 5], true)) {
    $houseDefs = include __DIR__ . '/../content/house_tasks.php';
    $now       = time();
    $houseSeen = ($cfg['house_tasks_seen'] ?? [])[date('Y-m-d')] ?? [];
    foreach ($houseDefs as $ht) {
        $times = $houseSeen[$ht['id']] ?? [];
        if (count($times) >= ($ht['max'] ?? 1)) continue;
        if (!empty($times) && isset($ht['gap_hours']) && ($now - max($times)) < $ht['gap_hours'] * 3600) continue;
        $hasHouseTasks = true;
        break;
    }
}

$hasPhysicalObjects = false;
$hasRoomScan        = false;
try {
    $objData   = getPhysicalObjects();
    $hasPhysicalObjects = !empty(array_filter($objData['objects'], fn($o) =>
        $o['status'] === 'out' && $o['task_id'] === null
    ));
    // Don't invite new clutter-spotting while ANY items are still out — untriaged
    // ones (handled above) or ones already handed to a task but not yet actually
    // put away. Either way, asking for more before the existing list clears is
    // exactly the pile-up this feature exists to prevent.
    $hasOutstandingObjects = !empty(array_filter($objData['objects'], fn($o) => ($o['status'] ?? '') === 'out'));
    if (!$hasOutstandingObjects && in_array($physicalLocation, [1, 4, 5], true)) {
        $rooms      = $objData['rooms']           ?? [['id' => 1, 'name' => 'livingroom', 'label' => 'Living Room']];
        $scanDates  = $objData['room_scan_dates'] ?? [];
        $todayScan  = date('Y-m-d');
        foreach ($rooms as $room) {
            if (($scanDates[$room['id']] ?? '') !== $todayScan) { $hasRoomScan = true; break; }
        }
    }
} catch (Throwable $e) {}

$hasWantToCapture    = false;
$hasWantToSuggestion = false;
try {
    $wantToData = getWantTo();
    // Capture: fire on good days (energy >= 4); multiple items welcome, no daily cap
    if ($energy >= 4) $hasWantToCapture = true;
    // Suggestion: fire when energy is low and the list has items to offer
    $hasWantToSuggestion = $energy <= 2 && !empty($wantToData['items']);
} catch (Throwable $e) {}

$hasPersonReview = false;
try {
    $peopleData = getPeople();
    $today_str  = date('Y-m-d');
    foreach ($peopleData['people'] as $p) {
        if (personIsArchived($p)) continue;
        $nr = $p['next_review'] ?? null;
        if (!$nr || $nr <= $today_str) { $hasPersonReview = true; break; }
    }
    // No random fallback when nothing's due — offering "review someone" as an
    // activity when no one actually needs reviewing isn't a real option.
} catch (Throwable $e) {}

// Event pre-brief/debrief: a task links to a person and carries a scheduled day, so it
// doubles as "seeing them" — pre-brief fires the day of, debrief the day after (once the
// day has actually passed), each exactly once per task.
$hasEventPrebrief = false;
$hasEventDebrief  = false;
try {
    $todayStr    = date('Y-m-d');
    $debriefFrom = date('Y-m-d', strtotime('-3 days'));
    $allTasks    = getTasks()['tasks'];
    foreach ($allTasks as $t) {
        if (empty($t['person_id']) || ($t['status'] ?? '') === 'deleted') continue;
        $sched = $t['scheduled_date'] ?? (!empty($t['snoozed_until']) ? substr($t['snoozed_until'], 0, 10) : null);
        if (!$sched) continue;
        if ($sched === $todayStr && empty($t['event_prebriefed_at'])) $hasEventPrebrief = true;
        if ($sched < $todayStr && $sched >= $debriefFrom && empty($t['event_debriefed_at'])) $hasEventDebrief = true;
        if ($hasEventPrebrief && $hasEventDebrief) break;
    }
} catch (Throwable $e) {}

// GTD Waiting-For follow-up: any waiting task whose check-back date has arrived.
$hasWaitingFollowup = false;
try {
    $now = time();
    foreach (getTasks()['tasks'] as $t) {
        if (($t['task_type'] ?? '') === 'waiting' && ($t['status'] ?? '') === 'active'
            && !empty($t['snoozed_until']) && strtotime($t['snoozed_until']) <= $now) {
            $hasWaitingFollowup = true;
            break;
        }
    }
} catch (Throwable $e) {}

// 1-in-3 chance to surface a missing check-in question mid-session; never back-to-back
if ($missing && $checkinOn && ($_SESSION['last_activity'] ?? '') !== 'missing_info' && rand(1, 3) === 1) {
    $_SESSION['last_activity'] = 'missing_info';
    json_response($missing);
}

$pool = array_merge(
    array_fill(0, $doableSlots,                        'task'),
    array_fill(0, $triageSlots,                        'triage'),
    array_fill(0, $hasStudy ? 3 : 0,                   'study'),
    array_fill(0, $hasTrivia ? 2 : 0,                  'trivia'),
    array_fill(0, $hasQuotes ? 2 : 0,                  'quote'),
    array_fill(0, $hasTips  ? 1 : 0,                   'tip'),
    array_fill(0, $gamesEnabled ? $gameSlots : 0,      'minigame'),
    array_fill(0, (!in_array($physicalLocation, [3, 6], true) && $danceTodaySeconds < 900) ? 2 : 0, 'dance'),
    array_fill(0, 1,                                   'fun_task'),
    array_fill(0, $easySlots,                          'easy_task'),
    array_fill(0, 1,                                   'joke'),
    array_fill(0, 1,                                   'nutrition'),
    array_fill(0, 1,                                   'bible_verse'),
    array_fill(0, $hasWantToCapture    ? 1 : 0, 'want_to_capture'),
    array_fill(0, $hasWantToSuggestion ? 2 : 0, 'want_to_suggestion'),
    array_fill(0, $hasPersonReview ? 1 : 0,            'person_review'),
    array_fill(0, $hasEventPrebrief ? 1 : 0,           'event_prebrief'),
    array_fill(0, $hasEventDebrief  ? 1 : 0,           'event_debrief'),
    array_fill(0, $hasWaitingFollowup ? 1 : 0,         'waiting_followup'),
    array_fill(0, $hasHouseTasks         ? 1 : 0,        'house_task'),
    array_fill(0, $hasRoomScan          ? 2 : 0,        'room_scan'),
    array_fill(0, $hasPhysicalObjects   ? 2 : 0,        'physical_object_triage'),
    array_fill(0, !empty($otherDailies) ? 2 : 0,        'other_daily'),
    array_fill(0, !empty($morningDailies) ? 1 : 0,     'other_daily') // morning dailies also in pool as fallback
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

if ($choice === 'dance') {
    json_response(pick_dance());
}
if ($choice === 'quote') {
    $q = pick_quote();
    if ($q) json_response($q);
    json_response(pick_trivia() ?? pick_fun_task());
}
if ($choice === 'tip') {
    $t = pick_tip();
    if ($t) json_response($t);
    json_response(pick_trivia() ?? pick_fun_task());
}
if ($choice === 'other_daily') {
    $allDailiesForPool = array_merge($otherDailies, $morningDailies);
    if (!empty($allDailiesForPool)) {
        $skip      = array_filter(array_map('intval', explode(',', $_GET['skip'] ?? '')));
        $available = empty($skip)
            ? $allDailiesForPool
            : array_values(array_filter($allDailiesForPool, fn($d) => !in_array((int)$d['id'], $skip, true)));
        if (!empty($available)) {
            $d         = $available[array_rand($available)];
            $dSubtasks = array_values(array_map(
                fn($ci) => ['id' => $ci['id'], 'title' => $ci['text']],
                $d['checklist'] ?? []
            ));
            $_SESSION['last_activity'] = 'morning_daily';
            json_response([
                'type'      => 'morning_daily',
                'id'        => (int)$d['id'],
                'title'     => $d['title'],
                'notes'     => $d['notes'] ?? '',
                'subtasks'  => $dSubtasks,
                'horizon'   => getDailyHorizon($d),
                'remaining' => count($allDailiesForPool),
                'looped'    => false,
            ]);
        }
    }
    json_response(pick_trivia() ?? pick_fun_task()); // fallback if no dailies available
}
if ($choice === 'house_task') {
    $ht = pick_house_task();
    if ($ht) json_response($ht);
    json_response(pick_fun_task());
}
if ($choice === 'want_to_capture') {
    json_response(pick_want_to_capture());
}
if ($choice === 'want_to_suggestion') {
    $ws = pick_want_to_suggestion();
    if ($ws) json_response($ws);
    json_response(pick_fun_task());
}
if ($choice === 'person_review') {
    $pr = pick_person_review();
    if ($pr) json_response($pr);
    json_response(pick_fun_task()); // fallback if no people
}
if ($choice === 'event_prebrief') {
    $ep = pick_event_prebrief();
    if ($ep) json_response($ep);
    json_response(pick_fun_task());
}
if ($choice === 'event_debrief') {
    $ed = pick_event_debrief();
    if ($ed) json_response($ed);
    json_response(pick_fun_task());
}
if ($choice === 'waiting_followup') {
    $wf = pick_waiting_followup();
    if ($wf) json_response($wf);
    json_response(pick_fun_task());
}
if ($choice === 'room_scan') {
    $rs = pick_room_scan();
    if ($rs) json_response($rs);
    json_response(pick_fun_task());
}
if ($choice === 'physical_object_triage') {
    $po = pick_physical_object();
    if ($po) json_response($po);
    json_response(pick_fun_task());
}
if ($choice === 'bible_verse') json_response(pick_bible_verse());
if ($choice === 'fun_task')  json_response(pick_fun_task());
if ($choice === 'easy_task') json_response(pick_easy_task());
if ($choice === 'joke') {
    $j = pick_joke();
    if ($j) json_response($j);
    json_response(pick_fun_task()); // fallback if every joke has hit the repeat cap
}
if ($choice === 'nutrition') json_response(pick_nutrition());
if ($choice === 'trivia') json_response(pick_trivia() ?? pick_fun_task());
if ($choice === 'study') {
    $s = pick_study();
    if ($s) json_response($s);
    json_response(pick_trivia() ?? pick_fun_task()); // fallback if pool somehow empty
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
    $resp = serve_triage_question($inboxTasks, $fillTasks);
    if ($resp) json_response($resp);
    json_response(pick_trivia() ?? pick_fun_task()); // nothing left to triage
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
    $rawTaskData = getTasks();
    $allTasks    = $rawTaskData['tasks'];
    $subtasks    = array_values(array_filter($allTasks, fn($s) =>
        !empty($s['parent_id']) &&
        (int)$s['parent_id'] === (int)$t['id'] &&
        $s['status'] === 'active' &&
        (!$s['snoozed_until'] || strtotime($s['snoozed_until']) <= $now)
    ));
    usort($subtasks, fn($a, $b) => (int)$a['id'] <=> (int)$b['id']);
    $subtasks = array_map(fn($s) => ['id' => (int)$s['id'], 'title' => $s['title']], $subtasks);
    $curPages      = (int)($rawTaskData['pages'] ?? 0);
    $pagesLeft     = todayPagesTarget() - $curPages;
} catch (Throwable $e) {
    $subtasks  = [];
    $pagesLeft = null;
}
$taskResp = [
    'type'        => 'task',
    'id'          => (int)$t['id'],
    'title'       => $t['title'],
    'description' => $t['description'] ?? null,
    'subtasks'    => $subtasks,
    'location'    => $t['location'] ?? null,
    'context'     => trim($t['context'] ?? '') ?: null,
    'time'        => $t['time'] ?? null,
    'person_name' => personNameForId($t['person_id'] ?? null),
];
if ($pagesLeft !== null && $pagesLeft > 0 && $pagesLeft <= 3) {
    $taskResp['pages_remaining'] = $pagesLeft;
}
json_response($taskResp);

// ---------- triage helpers ----------
// serve_triage_question / triage_next_question / fill_next_question now live
// in config_helper.php (shared with api/study_mode.php's cram interruptions).

function personNameForId(?int $personId): ?string {
    static $byId = null;
    if (!$personId) return null;
    if ($byId === null) {
        $byId = [];
        try {
            foreach (getPeople()['people'] as $p) $byId[(int)$p['person_id']] = $p['name'] ?? null;
        } catch (Throwable $e) {}
    }
    return $byId[$personId] ?? null;
}

// ---------- question helpers ----------
// question_row_to_response / pick_study now live in config_helper.php.

function pick_trivia(): ?array {
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
            $picker = pick_topic_picker();
            // Only worth showing if there's actually a topic left to unlock —
            // otherwise there's nothing actionable, so let the caller fall back.
            if (!empty($picker['topics'])) return $picker;
            return null;
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

function pick_bible_verse(): array {
    $verses = include __DIR__ . '/../content/bible_verses.php';
    $v = $verses[array_rand($verses)];
    return ['type' => 'bible_verse', 'text' => $v['text'], 'ref' => $v['ref']];
}

function pick_person_review(): ?array {
    try {
        $data   = getPeople();
        $today  = date('Y-m-d');
        $active = array_values(array_filter($data['people'], fn($p) => !personIsArchived($p)));
        if (empty($active)) return null;

        // Exclude people with birthdays today — birthdays are not visits
        $birthdaysToday = array_column(getUpcomingBirthdays(0), 'person_id');
        $active = array_values(array_filter($active, fn($p) => !in_array((int)$p['person_id'], $birthdaysToday, true)));
        if (empty($active)) return null;

        // Prefer overdue or never-reviewed
        $due = array_values(array_filter($active, fn($p) => empty($p['next_review']) || $p['next_review'] <= $today));
        if (!empty($due)) {
            usort($due, function($a, $b) {
                $da = $a['next_review'] ?? null;
                $db = $b['next_review'] ?? null;
                if (!$da && !$db) return 0;
                if (!$da) return 1;
                if (!$db) return -1;
                return strcmp($da, $db);
            });
            $p = $due[0];
        } else {
            $p = $active[array_rand($active)];
        }

        // Include recent notes so the card can show them
        $recentNotes = [];
        try {
            $notesData = getPeopleNotes();
            $pNotes = array_values(array_filter(
                $notesData['notes'] ?? [],
                fn($n) => (int)$n['person_id'] === (int)$p['person_id']
            ));
            usort($pNotes, fn($a, $b) => strcmp($b['date_added'] ?? '', $a['date_added'] ?? ''));
            $recentNotes = array_slice($pNotes, 0, 5);
        } catch (Throwable $e) {}

        // Include existing linked tasks — same filter the People overlay uses — so the
        // review card doesn't just offer to add a task without showing what's already there.
        $linkedTasks = [];
        try {
            $pid = (int)$p['person_id'];
            $tTasks = array_values(array_filter(getTasks()['tasks'], fn($t) =>
                !empty($t['person_id']) && (int)$t['person_id'] === $pid &&
                ($t['status'] ?? '') === 'active'
            ));
            $linkedTasks = array_map(fn($t) => [
                'id'      => (int)$t['id'],
                'title'   => $t['title'],
                'urgency' => $t['urgency'] ?? null,
            ], $tTasks);
        } catch (Throwable $e) {}

        return [
            'type'            => 'person_review',
            'person_id'       => (int)$p['person_id'],
            'name'            => $p['name'] ?? 'this person',
            'char1'           => $p['char1'] ?? '',
            'char2'           => $p['char2'] ?? '',
            'char3'           => $p['char3'] ?? '',
            'review_interval' => (int)($p['review_interval'] ?? 30),
            'recent_notes'    => $recentNotes,
            'tasks'           => $linkedTasks,
        ];
    } catch (Throwable $e) {
        return null;
    }
}

function pick_event_prebrief(): ?array {
    try {
        $today = date('Y-m-d');
        $tasks = getTasks()['tasks'];
        $candidates = [];
        foreach ($tasks as $t) {
            if (empty($t['person_id']) || ($t['status'] ?? '') !== 'active') continue;
            if (!empty($t['event_prebriefed_at'])) continue;
            $sched = $t['scheduled_date'] ?? (!empty($t['snoozed_until']) ? substr($t['snoozed_until'], 0, 10) : null);
            if ($sched === $today) $candidates[] = $t;
        }
        if (empty($candidates)) return null;
        $t = $candidates[array_rand($candidates)];

        $person = null;
        foreach (getPeople()['people'] as $p) {
            if ((int)$p['person_id'] === (int)$t['person_id']) { $person = $p; break; }
        }
        if (!$person) return null;

        $recentNotes = [];
        try {
            $notesData = getPeopleNotes();
            $pNotes = array_values(array_filter($notesData['notes'] ?? [],
                fn($n) => (int)$n['person_id'] === (int)$person['person_id']));
            usort($pNotes, fn($a, $b) => strcmp($b['date_added'] ?? '', $a['date_added'] ?? ''));
            $recentNotes = array_slice($pNotes, 0, 2);
        } catch (Throwable $e) {}

        return [
            'type'         => 'event_prebrief',
            'task_id'      => (int)$t['id'],
            'task_title'   => $t['title'],
            'person_id'    => (int)$person['person_id'],
            'name'         => $person['name'] ?? 'them',
            'recent_notes' => $recentNotes,
        ];
    } catch (Throwable $e) {
        return null;
    }
}

function pick_event_debrief(): ?array {
    try {
        $today  = date('Y-m-d');
        $cutoff = date('Y-m-d', strtotime('-3 days'));
        $tasks  = getTasks()['tasks'];
        $candidates = [];
        foreach ($tasks as $t) {
            if (empty($t['person_id']) || ($t['status'] ?? '') === 'deleted') continue;
            if (!empty($t['event_debriefed_at'])) continue;
            $sched = $t['scheduled_date'] ?? (!empty($t['snoozed_until']) ? substr($t['snoozed_until'], 0, 10) : null);
            if (!$sched || $sched >= $today || $sched < $cutoff) continue;
            $t['_sched'] = $sched;
            $candidates[] = $t;
        }
        if (empty($candidates)) return null;
        usort($candidates, fn($a, $b) => strcmp($a['_sched'], $b['_sched']));
        $t = $candidates[0];

        $person = null;
        foreach (getPeople()['people'] as $p) {
            if ((int)$p['person_id'] === (int)$t['person_id']) { $person = $p; break; }
        }
        if (!$person) return null;

        return [
            'type'       => 'event_debrief',
            'task_id'    => (int)$t['id'],
            'task_title' => $t['title'],
            'person_id'  => (int)$person['person_id'],
            'name'       => $person['name'] ?? 'them',
            'event_date' => $t['_sched'],
        ];
    } catch (Throwable $e) {
        return null;
    }
}

// GTD "Waiting For" follow-up: surfaces once a waiting task's check-back
// date (snoozed_until, set at capture time via waiting_start/waiting_on)
// arrives. Deliberately not routed through getDoableTasks() — waiting
// tasks are excluded from that pool entirely, this is the one dedicated
// path back into view for them.
function pick_waiting_followup(): ?array {
    try {
        $now  = time();
        $candidates = [];
        foreach (getTasks()['tasks'] as $t) {
            if (($t['task_type'] ?? '') !== 'waiting' || ($t['status'] ?? '') !== 'active') continue;
            if (empty($t['snoozed_until']) || strtotime($t['snoozed_until']) > $now) continue;
            $candidates[] = $t;
        }
        if (empty($candidates)) return null;
        usort($candidates, fn($a, $b) => strtotime($a['snoozed_until']) <=> strtotime($b['snoozed_until']));
        $t = $candidates[0];
        return [
            'type'        => 'waiting_followup',
            'task_id'     => (int)$t['id'],
            'title'       => $t['title'],
            'person_name' => personNameForId(isset($t['person_id']) ? (int)$t['person_id'] : null),
        ];
    } catch (Throwable $e) {
        return null;
    }
}

function pick_tip(): ?array {
    global $database, $cfg;
    if (!$database) return null;
    try {
        $allTips  = $database->query("SELECT tip_id, tip FROM tips")->fetchAll(PDO::FETCH_ASSOC);
        if (!$allTips) return null;
        $tipsSeen = $cfg['tips_seen'] ?? [];
        $available = array_values(array_filter($allTips, fn($t) => ($tipsSeen[(string)$t['tip_id']] ?? 0) < 2));
        if (!$available) return null;
        $t = $available[array_rand($available)];
        $tipsSeen[(string)$t['tip_id']] = ($tipsSeen[(string)$t['tip_id']] ?? 0) + 1;
        $cfg['tips_seen'] = $tipsSeen;
        try { saveConfig($cfg); } catch (Throwable $e) {}
        return ['type' => 'tip', 'id' => (int)$t['tip_id'], 'text' => $t['tip']];
    } catch (Throwable $e) {
        return null;
    }
}

function pick_want_to_capture(): array {
    $prompts = [
        "What's something good from today, or something you'd enjoy doing soon?",
        "What's been enjoyable lately?",
        "Anything you're looking forward to doing, even something small?",
        "What's something that sounds good to you right now?",
    ];
    return ['type' => 'want_to_capture', 'prompt' => $prompts[array_rand($prompts)]];
}

function pick_want_to_suggestion(): ?array {
    $data  = getWantTo();
    $items = $data['items'] ?? [];
    if (empty($items)) return null;
    // Prefer least-recently-offered items
    usort($items, fn($a, $b) => strcmp($a['last_offered'] ?? '', $b['last_offered'] ?? ''));
    $picks = array_slice($items, 0, min(3, count($items)));
    return [
        'type'  => 'want_to_suggestion',
        'items' => array_map(fn($i) => ['id' => (int)$i['id'], 'text' => $i['text']], $picks),
    ];
}

function pick_quote(): ?array {
    // Build a pool: all affirmations + user's personal quotes
    $pool = array_map(fn($t) => ['id' => null, 'text' => $t], AFFIRMATIONS);
    try {
        $data = getQuotes();
        foreach ($data['items'] ?? [] as $q) {
            $pool[] = ['id' => $q['id'], 'text' => $q['text']];
        }
    } catch (Throwable $e) {
        // vault unavailable — affirmations-only is fine
    }
    if (empty($pool)) return null;
    $pick = $pool[array_rand($pool)];
    return ['type' => 'quote', 'id' => $pick['id'], 'text' => $pick['text']];
}

// Decides checklist vs. wind-down for the active bedtime window and returns
// the response payload, or null if nothing to show (shouldn't normally
// happen — getBedtimeChecklistPool() always has the defaults as a floor).
// $cfg is the already-loaded config from the top of the file; $bedtimeCfg is
// its 'bedtime' sub-array; $hour is the current hour in the user's timezone.
function serve_bedtime(array $cfg, array $bedtimeCfg, int $hour): ?array {
    $nightKey = ($hour < (int)$bedtimeCfg['start_hour']) ? date('Y-m-d', strtotime('-1 day')) : date('Y-m-d');
    $state    = $cfg['bedtime_state'][$nightKey] ?? ['checklist_done' => [], 'phase' => 'checklist'];

    // Explicit phase switch (the checklist's "Not tired yet" / wind-down's
    // "N prep steps left" links) — flips phase without losing checked items.
    $choice  = $_GET['bedtime_choice'] ?? '';
    $changed = false;
    if ($choice === 'winddown' && $state['phase'] !== 'winddown')   { $state['phase'] = 'winddown';  $changed = true; }
    if ($choice === 'checklist' && $state['phase'] !== 'checklist') { $state['phase'] = 'checklist';  $changed = true; }

    if ($changed) {
        $cfg['bedtime_state'][$nightKey] = $state;
        $cutoff = date('Y-m-d', strtotime('-3 days'));
        foreach (array_keys($cfg['bedtime_state']) as $k) {
            if ($k < $cutoff) unset($cfg['bedtime_state'][$k]);
        }
        try { saveConfig($cfg); } catch (Throwable $e) { /* non-fatal — phase just won't persist this pull */ }
    }

    $pool      = getBedtimeChecklistPool();
    $unchecked = array_values(array_filter($pool, fn($i) => !in_array($i['id'], $state['checklist_done'], true)));

    if (!empty($unchecked) && $state['phase'] === 'checklist') {
        return [
            'type'            => 'bedtime_checklist',
            'items'           => array_map(fn($i) => ['id' => $i['id'], 'text' => $i['text']], $unchecked),
            'remaining_count' => count($unchecked),
            'night_key'       => $nightKey,
        ];
    }

    return pick_bedtime_winddown(count($unchecked));
}

// Picks the next wind-down activity — weighted toward calming prompts, with
// the gentle puzzle and Gem Match as an occasional change of pace, not the
// main event. Gem Match is move-limited, not clock-timed (self-paced, no
// reflex pressure) so it fits the wind-down brief; 'reaction' (a literal
// millisecond reflex test) and every other minigame are deliberately never
// offered here — too stimulating for winding down before sleep.
function pick_bedtime_winddown(int $checklistRemaining): array {
    global $gamesEnabled, $gameToggles;
    $gemMatchAvailable = $gamesEnabled && ($gameToggles['gemMatch'] ?? true);
    if ($gemMatchAvailable && rand(1, 10) <= 2) { // ~20%
        return ['type' => 'minigame', 'game' => 'gemMatch'];
    }

    $prompt = null;
    if (rand(1, 10) > 3) { // of the remainder: ~70% prompt, ~30% puzzle
        $prompt = pickBedtimeWindDown();
    }
    if (!$prompt) {
        $puzzle = pick_gentle_puzzle();
        $puzzle['checklist_remaining'] = $checklistRemaining;
        return $puzzle;
    }
    return [
        'type'                => 'winddown',
        'kind'                => 'prompt',
        'prompt_id'           => $prompt['id'],
        'text'                => $prompt['text'],
        'category'            => $prompt['category'],
        'is_custom'           => !empty($prompt['is_custom']),
        'seconds'             => $prompt['seconds'] ?? null,
        'checklist_remaining' => $checklistRemaining,
    ];
}

// "Sort the shades" — a handful of colour swatches of one hue at varying
// lightness, tapped in order light-to-dark at the user's own pace. No timer,
// no score, no fail state: a wrong tap just doesn't advance. Each swatch's
// 'id' IS its correct tap order (0 = lightest) so the client needs no
// separate answer key — just track the next expected id.
function pick_gentle_puzzle(): array {
    $hues = [210, 150, 280, 30, 340]; // blue, green, violet, amber, rose
    $hue  = $hues[array_rand($hues)];
    $n    = rand(5, 6);
    $swatches = [];
    for ($i = 0; $i < $n; $i++) {
        $lightness  = 82 - (int)round(($i / ($n - 1)) * 55);
        $swatches[] = ['id' => $i, 'color' => "hsl({$hue}, 40%, {$lightness}%)"];
    }
    shuffle($swatches);
    return ['type' => 'gentle_puzzle', 'swatches' => $swatches];
}

function pick_dance(): array {
    $prompts = [
        "Put on one song you love and actually dance to it. Move — don't just sway.",
        "One song. Actually dance. Not in your head — with your body.",
        "Put on the song that always gets you and dance to it properly.",
        "This is a prescription: one song, full dancing. The research is unambiguous.",
        "Find a song and dance to it. Not later. Now.",
    ];
    global $danceTodaySeconds;
    return ['type' => 'dance', 'text' => $prompts[array_rand($prompts)], 'today_seconds' => $danceTodaySeconds];
}

// pick_fun_task now lives in config_helper.php.

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

    ];
    return ['type' => 'nutrition', 'text' => $facts[array_rand($facts)]];
}

// Caps each joke at 3 showings (tracked in config['jokes_seen'], same pattern
// as tips_seen in pick_tip() above) — otherwise pure random selection repeats
// the same handful of jokes far too often over time. Returns null once every
// joke in the pool has hit the cap, so the pool clearly needs expanding.
function pick_joke(): ?array {
    global $cfg;
    $jokes = require __DIR__ . '/../content/jokes.php';
    if (!$jokes) return null;
    $jokesSeen = $cfg['jokes_seen'] ?? [];
    $available = array_values(array_filter($jokes, fn($j) => ($jokesSeen[(string)$j['id']] ?? 0) < 3));
    if (!$available) return null;
    $j = $available[array_rand($available)];
    $jokesSeen[(string)$j['id']] = ($jokesSeen[(string)$j['id']] ?? 0) + 1;
    $cfg['jokes_seen'] = $jokesSeen;
    try { saveConfig($cfg); } catch (Throwable $e) {}
    return ['type' => 'joke', 'setup' => $j['setup'], 'punchline' => $j['punchline']];
}

function pick_house_task(): ?array {
    global $cfg;
    $tasks  = include __DIR__ . '/../content/house_tasks.php';
    $today  = date('Y-m-d');
    $now    = time();
    $seen   = ($cfg['house_tasks_seen'] ?? [])[$today] ?? [];
    $avail  = array_values(array_filter($tasks, function($t) use ($seen, $now) {
        $times = $seen[$t['id']] ?? [];
        if (count($times) >= ($t['max'] ?? 1)) return false;
        if (!empty($times) && isset($t['gap_hours']) && ($now - max($times)) < $t['gap_hours'] * 3600) return false;
        return true;
    }));
    if (empty($avail)) return null;
    $t = $avail[array_rand($avail)];
    return ['type' => 'house_task', 'task_id' => $t['id'], 'title' => $t['title']];
}

function pick_room_scan(): ?array {
    try {
        $data = getPhysicalObjects();
        // Work through the existing outstanding items before inviting new clutter-spotting —
        // untriaged ones or ones already handed to a task but not yet actually put away.
        // Otherwise the same items risk getting logged again as "new" finds.
        $hasBacklog = !empty(array_filter($data['objects'], fn($o) => ($o['status'] ?? '') === 'out'));
        if ($hasBacklog) return null;

        $rooms     = $data['rooms']           ?? [['id' => 1, 'name' => 'livingroom', 'label' => 'Living Room']];
        $scanDates = $data['room_scan_dates'] ?? [];
        $today     = date('Y-m-d');

        // Objects already tracked as still out — including ones already handed to a task,
        // which don't block this prompt (they've been triaged) but are still real and
        // shouldn't get logged again as a "new" find during the scan.
        $existing = array_values(array_map(fn($o) => [
            'label'    => $o['label'],
            'location' => $o['location'] ?? null,
        ], array_filter($data['objects'], fn($o) => ($o['status'] ?? '') === 'out')));

        foreach ($rooms as $room) {
            if (($scanDates[$room['id']] ?? '') !== $today) {
                return [
                    'type'       => 'room_scan',
                    'room_id'    => $room['id'],
                    'room_label' => $room['label'],
                    'existing'   => $existing,
                ];
            }
        }
        return null;
    } catch (Throwable $e) {
        return null;
    }
}

function pick_physical_object(): ?array {
    try {
        $data       = getPhysicalObjects();
        $unresolved = array_values(array_filter($data['objects'], fn($o) =>
            $o['status'] === 'out' && $o['task_id'] === null
        ));
        if (empty($unresolved)) return null;
        $o = $unresolved[0]; // oldest first
        return [
            'type'     => 'physical_object_triage',
            'id'       => (int)$o['id'],
            'label'    => $o['label'],
            'location' => $o['location'] ?? null,
        ];
    } catch (Throwable $e) {
        return null;
    }
}

function pick_easy_task(): array {
    global $physicalLocation;
    // 'location' uses the same tag vocabulary + matching rules as task.location
    // (see locationTagsAllow() in config_helper.php) — home/work/shops/phone/online/transit,
    // matched against today's physical location (Home/Work/Out/Rest/WFH/Transit).
    // Empty/omitted = doable anywhere. This is what keeps "step outside" from
    // firing while already Out, or "chop a carrot" from firing away from a kitchen.
    // 'context' is the values-layer life-area tag (see CLAUDE.md values layer notes) —
    // informational only, not used for filtering here.
    $tasks = [
        ['text' => "Drink a full glass of water", 'context' => 'Health'],
        ['text' => "Box breathing — breathe in for 4, hold for 4, out for 4, hold for 4. Three rounds.", 'context' => 'Health'],
        ['text' => "Tidy one small thing — just one", 'location' => ['home', 'work'], 'context' => 'Home'],
        ['text' => "Sit quietly for two minutes", 'seconds' => 120, 'context' => 'Health'],
        ['text' => "Stretch your arms above your head and hold for ten seconds", 'seconds' => 10, 'context' => 'Health'],
        ['text' => "Step outside for five minutes", 'seconds' => 300, 'location' => ['home', 'work'], 'context' => 'Health'],
        ['text' => "Take your vitamins or any medication you need today", 'location' => ['home'], 'context' => 'Health'],
        ['text' => "Wash your face", 'location' => ['home'], 'context' => 'Health'],
        ['text' => "Make your bed or straighten where you're sitting", 'location' => ['home'], 'context' => 'Home'],
        ['text' => "Put away three things that are out of place", 'location' => ['home', 'work'], 'context' => 'Home'],
        ['text' => "Chop a carrot", 'location' => ['home'], 'context' => 'Nutrition'],
        ['text' => "Put some nuts in a bowl to eat", 'location' => ['home'], 'context' => 'Nutrition'],
        ['text' => "Make yourself 4 Vita-Weats and cheese", 'location' => ['home'], 'context' => 'Nutrition'],
    ];
    $eligible = array_values(array_filter(
        $tasks,
        fn($t) => locationTagsAllow($t['location'] ?? null, $physicalLocation)
    ));
    if (empty($eligible)) $eligible = $tasks; // safety net: never return an empty pool
    $t = $eligible[array_rand($eligible)];
    return [
        'type'    => 'easy_task',
        'text'    => $t['text'],
        'seconds' => $t['seconds'] ?? null,
        'context' => $t['context'] ?? null,
    ];
}

