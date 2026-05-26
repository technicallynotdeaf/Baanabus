<?php
require_once __DIR__ . '/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Baanabus</title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/app.js" defer></script>
</head>
<body>

<?php if (!empty($_SESSION['credential_id'])): ?>
  <!-- Navigation Bar (only when logged in) -->
  <ul class="navbar">
    <li><a href="index.php">🏠 Home</a></li>
    <li><a href="#" id="lets-go">🎯 Let's Go</a></li>
    <li><a href="#" id="note-to-self">📝 Note to Self</a></li>
    <li><a href="#" id="people-book">👥 People</a></li>
    <li><a href="#" id="task-list">📋 Tasks</a></li>
    <li><a href="#" id="settings-page-link">⚙️ Settings</a></li>
    <li><a href="logout.php">🚪 Logout</a></li>
  </ul>
<?php endif; ?>

<!-- Overlays are fine to keep globally -->
<div id="overlay" class="overlay">
  <div id="overlay-body" class="overlay-content"></div>
  <span id="close-overlay" class="close-button">&times;</span>
</div>

<div id="speechBubble" class="speechBubble">
  <div id="speechBubble-body" class="speechBubble-content"></div>
  <span id="close-speechBubble" class="close-button">&times;</span>
</div>

