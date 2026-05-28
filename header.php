<?php
require_once __DIR__ . '/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Baanabus</title>
  <link rel="stylesheet" href="css/app.css">
  <script src="js/app.js" defer></script>
  <script src="js/auth.js"></script>
</head>
<body>

<?php if (!empty($_SESSION['credential_id'])): ?>
  <!-- Navigation Bar (only when logged in) -->
  <ul class="navbar">
    <li><a href="index.php">🏠<span class="nav-text"> Home</span></a></li>
    <li><a href="scene2.php">📅<span class="nav-text"> Calendar</span></a></li>
    <li><a href="#" id="lets-go">🎯<span class="nav-text"> Let's Go</span></a></li>
    <li><a href="#" id="note-to-self">📝<span class="nav-text"> Note to Self</span></a></li>
    <li><a href="#" id="people-book">👥<span class="nav-text"> People</span></a></li>
    <li><a href="#" id="task-list">📋<span class="nav-text"> Tasks</span></a></li>
    <li><a href="#" id="settings-page-link">⚙️<span class="nav-text"> Settings</span></a></li>
    <li><a href="logout.php">🚪<span class="nav-text"> Logout</span></a></li>
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

