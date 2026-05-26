<?php

include_once 'config_helper.php';

$config = getConfig();

// === User Info ===
$nickname = $config['user']['nickname'] ?? 'Friend';
$_SESSION['nickname'] = $nickname;

// === Progress Info ===
// Sync from config.json to session
$_SESSION['pages'] = $config['progress']['pages'] ?? 0;
$_SESSION['books'] = $config['progress']['books'] ?? 0;

// Optional: Set a hard limit of max pages per book
if ($_SESSION['pages'] >= 30) {
    $_SESSION['pages'] = 0;
    $_SESSION['books']++;
    // Update the config file as well
    $config['progress']['pages'] = 0;
    $config['progress']['books'] = $_SESSION['books'];
    saveConfig($config);
}

// === Preferences ===
$_SESSION['theme'] = $config['preferences']['theme'] ?? 'light';
$_SESSION['language'] = $config['preferences']['language'] ?? 'en';
?>

