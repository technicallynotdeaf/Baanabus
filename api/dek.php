<?php
// dek.php
require_once __DIR__.'/config_helper.php';
header('Content-Type: application/json; charset=utf-8');
echo json_encode(vaultStatus());

