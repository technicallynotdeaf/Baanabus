<?php
require_once __DIR__ . '/../init.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);

$upload = $_FILES['csvfile'] ?? null;
if (!$upload || $upload['error'] !== UPLOAD_ERR_OK) {
    $code = $upload['error'] ?? -1;
    json_response(['error' => "Upload failed (code $code)"], 400);
}

$handle = fopen($upload['tmp_name'], 'r');
if (!$handle) json_response(['error' => 'Could not read file'], 500);

$headers = fgetcsv($handle);
$sample  = fgetcsv($handle) ?: [];
$rowCount = 1;
while (fgetcsv($handle) !== false) $rowCount++;
fclose($handle);

if (!$headers) json_response(['error' => 'Could not parse CSV headers'], 400);

json_response([
    'ok'       => true,
    'fields'   => $headers,
    'sample'   => $sample,
    'rows'     => $rowCount,
]);
