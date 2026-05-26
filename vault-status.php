<?php
session_start();
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

header('Content-Type: application/json; charset=utf-8');

// Suppress output
ob_start();
$status = vaultStatus();
ob_end_clean();

echo json_encode($status, JSON_UNESCAPED_SLASHES);

