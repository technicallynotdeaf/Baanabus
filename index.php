<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (!isAuthenticated() || !isUnlocked()) {
    header('Location: unauthorised.php');
    exit;
}

require_once __DIR__ . '/header.php';
echo '<script>window.BUBBLE_SRC = "greeting.php";</script>';
include __DIR__ . '/scene.php';
require_once __DIR__ . '/footer.php';
