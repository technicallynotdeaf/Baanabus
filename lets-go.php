<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) {
    http_response_code(403);
    echo '<p class="muted">Not authenticated.</p>';
    exit;
}
if (empty($_SESSION['DEK'])) {
    http_response_code(423);
    echo '<p class="muted">Vault is locked.</p>';
    exit;
}

try {
    $doable = getDoableTasks();

    if (empty($doable)) {
        echo '<div style="padding:0.5rem 0;">';
        echo '<p>You have no doable tasks right now.</p>';
        echo '</div>';
    } else {
        $task   = $doable[array_rand($doable)];
        $taskId = (int) $task['id'];
        echo '<div style="padding:0.25rem 0;">';
        echo '<p style="margin-bottom:0.75rem;">' . htmlspecialchars($task['title']) . '</p>';
        echo '<div style="display:flex;gap:8px;flex-wrap:wrap;">';
        echo "<button class=\"action-button\" onclick=\"markAsDone($taskId)\">Done</button>";
        echo "<button class=\"action-button\" onclick=\"markAsStuck($taskId)\">Stuck</button>";
        echo "<button class=\"action-button\" onclick=\"snoozeTask($taskId)\">Snooze</button>";
        echo '</div>';
        echo '</div>';
    }
} catch (Throwable $e) {
    echo '<p class="muted">Could not load tasks: ' . htmlspecialchars($e->getMessage()) . '</p>';
}
?>
