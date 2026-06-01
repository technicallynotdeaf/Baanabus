<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function respond_mc(array $d, int $c = 200): void {
    http_response_code($c);
    echo json_encode($d, JSON_UNESCAPED_SLASHES);
    exit;
}

if (empty($_SESSION['is_authenticated'])) respond_mc(['error' => 'Not authenticated'], 401);
if (empty($_SESSION['DEK']))              respond_mc(['error' => 'Vault locked'], 423);

$taskId = isset($_GET['task_id']) ? (int)$_GET['task_id'] : 0;
if (!$taskId) respond_mc(['error' => 'Missing task_id'], 400);

try {
    $target = todayPagesTarget();
    $result = vaultMarkComplete($taskId, $target);

    $bookUnlocked = false;
    if ($result['newStoryPage']) {
        $activeStory = getActiveStoryId();
        if ($activeStory !== null) {
            try { incrementStoryPages($activeStory); } catch (Throwable $e) { error_log('mark_complete: incrementStoryPages failed: ' . $e->getMessage()); }
        } else {
            // No book chosen yet — bank the page and prompt to pick one
            try {
                $cfg = getConfig() ?? [];
                $cfg['pending_story_pages'] = ($cfg['pending_story_pages'] ?? 0) + 1;
                saveConfig($cfg);
            } catch (Throwable $e) {}
            $bookUnlocked = true;
        }
    }

    if (!empty($result['habitica_id'])) {
        require_once __DIR__ . '/habitica_helper.php';
        $cass   = getCassowary();
        $userId = $cass['habitica']['user_id'] ?? '';
        $apiKey = $cass['habitica']['api_key'] ?? '';
        if ($userId && $apiKey) {
            try {
                if (!empty($result['habitica_item_id'])) {
                    habiticaRequest('POST',
                        "/tasks/{$result['habitica_id']}/checklist/{$result['habitica_item_id']}/score",
                        $userId, $apiKey);
                } else {
                    habiticaRequest('POST', "/tasks/{$result['habitica_id']}/score/up", $userId, $apiKey);
                }
            } catch (Throwable $e) {
                error_log('Habitica score failed: ' . $e->getMessage());
            }
        }
    }

    // ── Effort acknowledgement ─────────────────────────────────────────
    $callout = null;
    $urgency    = $result['task_urgency']    ?? null;
    $createdAt  = $result['task_created_at'] ?? null;
    $wasStuck   = !empty($result['task_stuck']);
    $taskType   = $result['task_type']       ?? null;
    $isUrgent   = in_array($urgency, ['urgent', 'critical'], true);
    $isOld      = $createdAt && $taskType !== 'inbox'
                  && strtotime($createdAt) < strtotime('-21 days');

    if ($wasStuck) {
        $callout = "You got past the block. That's the harder kind of done.";
    } elseif ($isUrgent && $isOld) {
        $callout = "That one had been waiting a while and it mattered. Really well done.";
    } elseif ($isUrgent) {
        $callout = "That was an important one. Well done.";
    } elseif ($isOld) {
        $callout = "That task has been waiting a while. Really glad you got there.";
    }

    // ── Daily completion tracking + comeback callout ───────────────────
    if ($database) {
        try {
            $today = date('Y-m-d');
            $database->prepare(
                "INSERT INTO daily_completions (date, count) VALUES (?, 1)
                 ON CONFLICT(date) DO UPDATE SET count = count + 1"
            )->execute([$today]);

            // Comeback callout: best week in a while (fire once per week)
            $thisWeekKey = date('o-\WW');
            if (($_SESSION['comeback_week'] ?? null) !== $thisWeekKey) {
                $dow = (int)date('N'); // 1=Mon
                if ($dow >= 3) { // Need Wednesday+ to have meaningful signal
                    $thisWeekTotal = weekCompletions($database, 0);
                    $prevBest = max(
                        weekCompletions($database, 1),
                        weekCompletions($database, 2),
                        weekCompletions($database, 3)
                    );
                    if ($prevBest > 0 && $thisWeekTotal > $prevBest && $thisWeekTotal >= 5) {
                        $_SESSION['comeback_week']    = $thisWeekKey;
                        $_SESSION['comeback_callout'] = true;
                    }
                }
            }
        } catch (Throwable $e) {
            error_log('daily_completions: ' . $e->getMessage());
        }
    }

    respond_mc([
        'success'      => true,
        'pages'        => $result['pages'],
        'pages_target' => $result['pages_target'],
        'total_pages'  => $result['total_pages'],
        'newStoryPage' => $result['newStoryPage'] && !$bookUnlocked,
        'bookUnlocked' => $bookUnlocked,
        'callout'      => $callout,
    ]);
} catch (Throwable $e) {
    respond_mc(['success' => false, 'message' => $e->getMessage()], 500);
}

function weekCompletions(PDO $db, int $weeksAgo): int {
    $dow        = (int)date('N');
    $monOffset  = ($weeksAgo * 7) + ($dow - 1);
    $mon        = date('Y-m-d', strtotime("-{$monOffset} days"));
    $sun        = date('Y-m-d', strtotime($mon . ' +6 days'));
    $cap        = date('Y-m-d');
    if ($sun > $cap) $sun = $cap;
    try {
        $s = $db->prepare("SELECT COALESCE(SUM(count),0) FROM daily_completions WHERE date BETWEEN ? AND ?");
        $s->execute([$mon, $sun]);
        return (int)$s->fetchColumn();
    } catch (Throwable $e) {
        return 0;
    }
}
