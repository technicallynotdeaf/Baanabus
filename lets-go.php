<?php
include_once 'init.php';
include_once 'CRUD.php';

// 🔍 Console log to indicate loading
echo "<script>console.log('🚀 Let\'s go - lets-go.php loaded!');</script>";

if (!isset($database)) {
    echo "<script>console.log('⚠️ Database connection is missing');</script>";
} else {
    echo "<script>console.log('✅ Database connection established');</script>";
}


if (isset($_GET['action']) && $_GET['action'] === 'complete' && isset($_GET['task_id'])) {
    $task_id = (int)$_GET['task_id'];
    
    // Mark as complete and update pages
    mark_complete($database, $task_id);

    // Respond with the updated page and book count
    echo json_encode([
        'success' => true,
        'pages' => $_SESSION['pages'],
        'books' => $_SESSION['books']
    ]);
    exit;
}

try {
    // Fetch the "doable" tasks from the database
    $tasks = get_doable_tasks($database);

    if (!$tasks || count($tasks) === 0) {
        echo '<div class="question">You don\'t have any doable tasks right now. 🎉</div>';
    } else {
        // Select a random task from the list of doable tasks
        $task = $tasks[array_rand($tasks)];

        // Use the existing display_task function to render it
        echo "<div class='task-item'>";
        display_task($database, $task);

        // Task Options
        $taskId = $task['task_id'];
        echo "<div class='task-options'>
                    <button onclick='markAsDone($taskId)'>I'm Done!</button>
                    <button onclick='markAsStuck($taskId)'>I'm Stuck</button>
                    <button onclick='snoozeTask($taskId)'>Snooze</button>
              </div>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

