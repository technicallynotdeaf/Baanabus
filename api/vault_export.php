<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (!isAuthenticated()) { http_response_code(401); exit('Not authenticated'); }
if (!isUnlocked())      { http_response_code(423); exit('Vault locked — unlock first'); }

$export = [
    'exported_at' => date('c'),
    'app'         => 'baanabus',
    'version'     => 1,
];

foreach ([
    'tasks'        => 'getTasks',
    'config'       => 'getConfig',
    'people'       => 'getPeople',
    'people_notes' => 'getPeopleNotes',
    'inbox'        => 'getInbox',
    'diary'        => 'getDiary',
    'quotes'       => 'getQuotes',
] as $key => $fn) {
    try { $export[$key] = $fn(); } catch (Throwable $e) { $export[$key] = null; }
}

try { $export['cassowary'] = getCassowary(); } catch (Throwable $e) { $export['cassowary'] = null; }

$json     = json_encode($export, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
$filename = 'baanabus-backup-' . date('Y-m-d') . '.json';

header('Content-Type: application/json; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . strlen($json));
header('Cache-Control: no-store, no-cache');
echo $json;
