<?php
/**
 * api/people_list.php — lightweight {person_id, name} list of active people,
 * for pickers (e.g. the Waiting-For "who" select) that don't need the full
 * list_people.php overlay.
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!isUnlocked())      json_response(['error' => 'Vault locked'], 423);

try {
    $people = array_values(array_filter(getPeople()['people'] ?? [], fn($p) => !personIsArchived($p)));
    $out = array_map(fn($p) => ['person_id' => (int)$p['person_id'], 'name' => $p['name'] ?? ''], $people);
    usort($out, fn($a, $b) => strcasecmp($a['name'], $b['name']));
    json_response(['ok' => true, 'people' => $out]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
