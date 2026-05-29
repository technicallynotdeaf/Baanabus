<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
if (!isAuthenticated() || !isUnlocked()) { header('Location: index.php'); exit; }
require_once __DIR__ . '/header.php';
?>

<div id="cal-nav">
  <button id="cal-prev" aria-label="Previous month">&#8249;</button>
  <h2 id="cal-title">Loading…</h2>
  <button id="cal-next" aria-label="Next month">&#8250;</button>
</div>
<canvas id="calCanvas"></canvas>

<script src="js/scene2.js"></script>

<?php require_once __DIR__ . '/footer.php'; ?>
