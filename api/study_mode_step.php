<?php
/**
 * api/study_mode_step.php — drives the intensive-cram loop for study mode.
 * POST action=start {set_name}  — begin a session, returns the first step
 * POST action=next              — continue an in-progress session
 * POST action=end               — abandon the session
 *
 * Loop shape: 4 study questions from the chosen set, then 1 interruption,
 * repeating — see study_cram_step() below. Question/interruption selection
 * reuses the same picker functions the ambient activity rotation uses
 * (config_helper.php), so cram mode never re-implements that logic.
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

$input  = json_decode(file_get_contents('php://input'), true) ?? [];
$action = $input['action'] ?? ($_GET['action'] ?? '');

if ($action === 'start') {
    $setName = trim($input['set_name'] ?? '');
    if (!$setName) json_response(['error' => 'Missing set_name'], 400);
    if (!$database) json_response(['error' => 'No database'], 500);
    $chk = $database->prepare("SELECT COUNT(*) FROM study_questions WHERE set_name = ? AND q_type = 'study'");
    $chk->execute([$setName]);
    if ((int)$chk->fetchColumn() === 0) json_response(['error' => 'Unknown study set'], 400);

    $_SESSION['study_cram'] = ['set_name' => $setName, 'step' => 0];
    json_response(study_cram_step());
}

if ($action === 'next') json_response(study_cram_step());

if ($action === 'end') {
    unset($_SESSION['study_cram']);
    json_response(['ok' => true]);
}

json_response(['error' => 'Unknown action'], 400);

// ---------- cram loop ----------

function study_cram_step(): array {
    $state = $_SESSION['study_cram'] ?? null;
    if (!$state || empty($state['set_name'])) {
        return ['type' => 'error', 'message' => 'No active cram session — pick a set to start.'];
    }
    $setName = $state['set_name'];
    $step    = (int)($state['step'] ?? 0);

    // Every 5th slot (index 4, 9, 14, ...) is the interruption — 4 study
    // questions, then 1 interruption, repeating.
    if ($step % 5 === 4) {
        $resp = pick_cram_interruption();
    } else {
        $resp = pick_study($setName);
        if (!$resp) {
            unset($_SESSION['study_cram']);
            return [
                'type'     => 'study_mode_done',
                'set_name' => $setName,
                'message'  => "You've cleared every question in \"{$setName}\".",
            ];
        }
    }

    $_SESSION['study_cram']['step'] = $step + 1;
    $resp['cram_position'] = ($step % 5) + 1; // 1-4 = question N of 4, 5 = the break
    return $resp;
}

function pick_cram_interruption(): array {
    $inboxTasks = [];
    $fillTasks  = [];
    try { $inboxTasks = getInboxTasks(); } catch (Throwable $e) {}
    try { $fillTasks  = getFillTasks();  } catch (Throwable $e) {}
    $hasTriageMaterial = !empty($inboxTasks) || !empty($fillTasks);

    $dailies = [];
    try { $dailies = getActiveDailies(); } catch (Throwable $e) {}

    // Branch 1: a real question toward inbox-zero / all next-actions
    // scheduled-or-snoozed, via the exact same picker the ambient triage
    // rotation uses.
    $branches = $hasTriageMaterial ? ['triage', 'quick_task'] : ['quick_task'];
    if ($branches[array_rand($branches)] === 'triage') {
        $resp = serve_triage_question($inboxTasks, $fillTasks);
        if ($resp) return $resp;
    }

    // Branch 2: a <=30s reset — the fun-task pool, a grounding/regulation
    // prompt, or a not-yet-done-today routine task, same pools + selection
    // logic the Reset button and ambient rotation already use.
    $options = ['fun_task', 'fun_task', 'regulation'];
    if (!empty($dailies)) $options[] = 'daily';
    $pick = $options[array_rand($options)];

    if ($pick === 'daily') {
        $d = $dailies[array_rand($dailies)];
        $subtasks = array_values(array_map(
            fn($ci) => ['id' => $ci['id'], 'title' => $ci['text']],
            $d['checklist'] ?? []
        ));
        return [
            'type'     => 'cram_daily',
            'id'       => (int)$d['id'],
            'title'    => $d['title'],
            'notes'    => $d['notes'] ?? '',
            'subtasks' => $subtasks,
            'horizon'  => getDailyHorizon($d),
        ];
    }

    if ($pick === 'regulation') {
        $p = pickRegulationPrompt();
        if ($p) {
            return [
                'type'      => 'cram_regulation',
                'prompt_id' => $p['id'],
                'text'      => $p['text'],
                'category'  => $p['category'],
                'is_custom' => !empty($p['is_custom']),
                'seconds'   => $p['seconds'] ?? null,
            ];
        }
    }

    // pick_fun_task() reads global $physicalLocation — populate it the same
    // way next_activity.php's top-level check-in block does, from today's
    // diary entry, since this file has no equivalent top-level pass.
    global $physicalLocation;
    $physicalLocation = null;
    try {
        $row = getDiaryEntry(date('Y-m-d'));
        $physicalLocation = isset($row['location']) ? (int)$row['location']
            : (isset($row['day_type']) ? (int)$row['day_type'] : null);
    } catch (Throwable $e) {}
    $ft = pick_fun_task();
    return ['type' => 'cram_fun_task', 'text' => $ft['text'], 'seconds' => $ft['seconds']];
}
