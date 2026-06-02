<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
if (!isAuthenticated()) { header('Location: onboarding.php'); exit; }
if (!isUnlocked())      { header('Location: index.php');      exit; }
include __DIR__ . '/header.php';
?>
<canvas id="kitchenCanvas"
        style="position:fixed;top:0;left:0;width:100%;height:100%;display:block;"></canvas>
<script src="js/scene_kitchen.js?v=<?= filemtime(__DIR__ . '/js/scene_kitchen.js') ?>" defer></script>
<?php include __DIR__ . '/footer.php'; ?>
