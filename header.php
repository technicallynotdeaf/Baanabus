<?php
require_once __DIR__ . '/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Baanabus</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;600&display=swap">
  <link rel="stylesheet" href="css/app.css?v=<?= filemtime(__DIR__ . '/css/app.css') ?>">
  <script src="js/app.js?v=<?= filemtime(__DIR__ . '/js/app.js') ?>" defer></script>
  <script src="js/auth.js?v=<?= filemtime(__DIR__ . '/js/auth.js') ?>"></script>
  <script src="js/brain_dump.js?v=<?= filemtime(__DIR__ . '/js/brain_dump.js') ?>" defer></script>
  <script src="js/lets_go.js?v=<?= filemtime(__DIR__ . '/js/lets_go.js') ?>" defer></script>
  <script src="js/list_tasks.js?v=<?= filemtime(__DIR__ . '/js/list_tasks.js') ?>" defer></script>
  <script src="js/list_people.js?v=<?= filemtime(__DIR__ . '/js/list_people.js') ?>" defer></script>
  <script src="js/welcome.js?v=<?= filemtime(__DIR__ . '/js/welcome.js') ?>" defer></script>
  <script src="js/settings.js?v=<?= filemtime(__DIR__ . '/js/settings.js') ?>" defer></script>
  <script src="js/story_read.js?v=<?= filemtime(__DIR__ . '/js/story_read.js') ?>" defer></script>
  <script src="js/story_books.js?v=<?= filemtime(__DIR__ . '/js/story_books.js') ?>" defer></script>
  <script src="js/day_tasks.js?v=<?= filemtime(__DIR__ . '/js/day_tasks.js') ?>" defer></script>
  <script src="js/upload_questions.js?v=<?= filemtime(__DIR__ . '/js/upload_questions.js') ?>" defer></script>
  <script src="js/badges.js?v=<?= filemtime(__DIR__ . '/js/badges.js') ?>" defer></script>
  <script src="js/food_log.js?v=<?= filemtime(__DIR__ . '/js/food_log.js') ?>" defer></script>
  <script src="js/nutrition_progress.js?v=<?= filemtime(__DIR__ . '/js/nutrition_progress.js') ?>" defer></script>
</head>
<body<?php
  $bodyClasses = [];
  if (!empty($_SESSION['regulation_mode'])) $bodyClasses[] = 'regulation-mode';
  if (!empty($morningModeActive))           $bodyClasses[] = 'morning-mode';
  echo $bodyClasses ? ' class="' . implode(' ', $bodyClasses) . '"' : '';
?>>


<?php if (!empty($_SESSION['credential_id'])): ?>
  <!-- Navigation Bar (only when logged in) -->
  <?php
    $navEnergy         = null;
    $navDayType        = null;
    $morningModeActive = false;
    require_once __DIR__ . '/config_helper.php';
    if (isUnlocked()) {
        try {
            $todayEntry = getDiaryEntry(date('Y-m-d'));
            $navEnergy  = !empty($todayEntry['energy_level']) ? (int)$todayEntry['energy_level'] : null;
            $navDayType = !empty($todayEntry['day_type'])     ? (int)$todayEntry['day_type']     : null;
        } catch (Throwable $e) {}
        try {
            $morningModeActive = !empty(getMorningModeDailies());
        } catch (Throwable $e) {}
    }
  ?>
  <ul class="navbar">
    <li><a href="index.php">🏠<span class="nav-text"> Home</span></a></li>
    <li><a href="scene2.php">📅<span class="nav-text"> Calendar</span></a></li>
    <li><a href="#" id="lets-go">🎯<span class="nav-text"> Let's Go</span></a></li>
    <li><a href="#" id="story-book-link">📖<span class="nav-text"> Story</span></a></li>
    <li><a href="#" id="note-to-self">📝<span class="nav-text"> Note to Self</span></a></li>
    <li><a href="#" id="people-book">👥<span class="nav-text"> People</span></a></li>
    <li><a href="#" id="task-list">📋<span class="nav-text"> Tasks</span></a></li>
    <li><a href="#" id="food-log-link">🥦<span class="nav-text"> Food</span></a></li>
    <li><a href="#" id="settings-page-link">⚙️<span class="nav-text"> Settings</span></a></li>
    <li><a href="logout.php" id="logout-link">🚪<span class="nav-text"> Logout</span></a></li>
  </ul>
  <div id="nav-context-pill">
    <select id="nav-energy" class="nav-checkin-select">
      <option value=""<?= $navEnergy === null ? ' selected disabled' : '' ?>>Energy</option>
      <option value="1"<?= $navEnergy === 1 ? ' selected' : '' ?>>Exhausted</option>
      <option value="2"<?= $navEnergy === 2 ? ' selected' : '' ?>>Low</option>
      <option value="3"<?= $navEnergy === 3 ? ' selected' : '' ?>>Okay</option>
      <option value="4"<?= $navEnergy === 4 ? ' selected' : '' ?>>Good</option>
      <option value="5"<?= $navEnergy === 5 ? ' selected' : '' ?>>On fire</option>
    </select>
    <span class="nav-context-sep">|</span>
    <select id="nav-daytype" class="nav-checkin-select">
      <option value=""<?= $navDayType === null ? ' selected disabled' : '' ?>>Location</option>
      <option value="1"<?= $navDayType === 1 ? ' selected' : '' ?>>Home</option>
      <option value="2"<?= $navDayType === 2 ? ' selected' : '' ?>>Work</option>
      <option value="3"<?= $navDayType === 3 ? ' selected' : '' ?>>Out</option>
      <option value="4"<?= $navDayType === 4 ? ' selected' : '' ?>>Rest</option>
      <option value="6"<?= $navDayType === 6 ? ' selected' : '' ?>>Transit</option>
    </select>
  </div>
<?php endif; ?>

<div id="scene-tint"></div>
<script src="js/scene_tint.js?v=<?= filemtime(__DIR__ . '/js/scene_tint.js') ?>"></script>

<!-- Overlays are fine to keep globally -->
<div id="overlay" class="overlay">
  <div id="overlay-body" class="overlay-content"></div>
  <span id="close-overlay" class="close-button">&times;</span>
</div>

<div id="speechBubble" class="speechBubble">
  <div id="speechBubble-body" class="speechBubble-content"></div>
  <span id="close-speechBubble" class="close-button">&times;</span>
</div>

