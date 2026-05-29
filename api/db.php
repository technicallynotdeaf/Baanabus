<?php
/**
 * api/db.php — generic SQLite CRUD for agent use
 * Auth: Authorization: Bearer bsk_... header
 *
 * GET  ?table=NAME[&id=VALUE][&limit=500][&offset=0]
 *      → {"ok":true,"rows":[...],"count":N}
 *      → {"ok":true,"row":{...}}          (when id supplied)
 *
 * POST {"action":"schema","table":"NAME"}
 *      → {"ok":true,"columns":[{"name","type","pk"},...]}
 *
 * POST {"action":"insert","table":"NAME","data":{col:val,...}}
 *      → {"ok":true,"id":N}
 *
 * POST {"action":"update","table":"NAME","id":VALUE,"data":{col:val,...}}
 *      → {"ok":true,"affected":N}
 *
 * POST {"action":"delete","table":"NAME","id":VALUE}
 *      → {"ok":true,"affected":N}
 *
 * POST {"action":"query","sql":"SELECT ...","params":[...]}
 *      → {"ok":true,"rows":[...]}   (read-only; SELECT only)
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

$auth  = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$token = strncmp($auth, 'Bearer ', 7) === 0 ? trim(substr($auth, 7)) : '';
if (!$token || !authenticateAgentKey($token)) {
    json_response(['error' => 'Unauthorized'], 401);
}

if (!$database) json_response(['error' => 'Database unavailable'], 503);

const ALLOWED_TABLES = [
    'diary', 'people', 'people_notes', 'quotes', 'study_questions',
    'question_seen', 'contexts', 'day_types', 'energy_levels',
    'love_languages', 'note_types', 'priority', 'tags', 'task_types',
    'urgency', 'inbox',
];

function resolveTable(string $name): string {
    if (!in_array($name, ALLOWED_TABLES, true)) {
        json_response(['error' => "Table '$name' is not accessible. Allowed: " . implode(', ', ALLOWED_TABLES)], 403);
    }
    return $name;
}

function tablePK(PDO $db, string $table): string {
    $cols = $db->query("PRAGMA table_info(`$table`)")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cols as $c) {
        if ((int)$c['pk'] === 1) return $c['name'];
    }
    // Fall back to rowid if no explicit PK found
    return 'rowid';
}

$method = $_SERVER['REQUEST_METHOD'];

// ---- GET: list or get-by-id ----
if ($method === 'GET') {
    $table  = resolveTable($_GET['table'] ?? '');
    $id     = $_GET['id'] ?? null;
    $limit  = min(1000, max(1, (int)($_GET['limit']  ?? 500)));
    $offset = max(0,             (int)($_GET['offset'] ?? 0));

    if ($id !== null) {
        $pk   = tablePK($database, $table);
        $stmt = $database->prepare("SELECT * FROM `$table` WHERE `$pk` = ? LIMIT 1");
        $stmt->execute([$id]);
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        json_response(['ok' => true, 'row' => $row ?: null]);
    }

    $stmt = $database->prepare("SELECT * FROM `$table` LIMIT ? OFFSET ?");
    $stmt->execute([$limit, $offset]);
    $rows  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = (int)$database->query("SELECT COUNT(*) FROM `$table`")->fetchColumn();
    json_response(['ok' => true, 'rows' => $rows, 'count' => $count]);
}

// ---- POST: schema / insert / update / delete / query ----
if ($method === 'POST') {
    $body   = json_decode(file_get_contents('php://input'), true) ?? [];
    $action = $body['action'] ?? '';

    // Schema introspection — no table whitelist restriction
    if ($action === 'schema') {
        $table = resolveTable($body['table'] ?? '');
        $cols  = $database->query("PRAGMA table_info(`$table`)")->fetchAll(PDO::FETCH_ASSOC);
        $out   = array_map(fn($c) => [
            'name'     => $c['name'],
            'type'     => $c['type'],
            'notnull'  => (bool)$c['notnull'],
            'default'  => $c['dflt_value'],
            'pk'       => (bool)$c['pk'],
        ], $cols);
        json_response(['ok' => true, 'table' => $table, 'columns' => $out]);
    }

    // List all accessible tables (handy for discovery)
    if ($action === 'tables') {
        json_response(['ok' => true, 'tables' => ALLOWED_TABLES]);
    }

    if ($action === 'insert') {
        $table = resolveTable($body['table'] ?? '');
        $data  = $body['data'] ?? [];
        if (empty($data)) json_response(['error' => 'No data provided'], 400);
        $cols   = implode(', ', array_map(fn($k) => "`$k`", array_keys($data)));
        $places = implode(', ', array_fill(0, count($data), '?'));
        $stmt   = $database->prepare("INSERT INTO `$table` ($cols) VALUES ($places)");
        $stmt->execute(array_values($data));
        json_response(['ok' => true, 'id' => (int)$database->lastInsertId()]);
    }

    if ($action === 'update') {
        $table = resolveTable($body['table'] ?? '');
        $id    = $body['id']   ?? null;
        $data  = $body['data'] ?? [];
        if ($id === null)  json_response(['error' => 'Missing id'], 400);
        if (empty($data))  json_response(['error' => 'No data provided'], 400);
        $pk   = tablePK($database, $table);
        $set  = implode(', ', array_map(fn($k) => "`$k` = ?", array_keys($data)));
        $stmt = $database->prepare("UPDATE `$table` SET $set WHERE `$pk` = ?");
        $stmt->execute([...array_values($data), $id]);
        json_response(['ok' => true, 'affected' => $stmt->rowCount()]);
    }

    if ($action === 'delete') {
        $table = resolveTable($body['table'] ?? '');
        $id    = $body['id'] ?? null;
        if ($id === null) json_response(['error' => 'Missing id'], 400);
        $pk   = tablePK($database, $table);
        $stmt = $database->prepare("DELETE FROM `$table` WHERE `$pk` = ?");
        $stmt->execute([$id]);
        json_response(['ok' => true, 'affected' => $stmt->rowCount()]);
    }

    // Raw SELECT — useful for joins and filtered queries
    if ($action === 'query') {
        $sql    = trim($body['sql']    ?? '');
        $params = $body['params'] ?? [];
        if (empty($sql)) json_response(['error' => 'Missing sql'], 400);
        if (!preg_match('/^\s*SELECT\b/i', $sql)) {
            json_response(['error' => 'Only SELECT statements allowed via query action'], 403);
        }
        $stmt = $database->prepare($sql);
        $stmt->execute(array_values($params));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        json_response(['ok' => true, 'rows' => $rows, 'count' => count($rows)]);
    }

    json_response(['error' => "Unknown action '$action'. Valid: schema, tables, insert, update, delete, query"], 400);
}

json_response(['error' => 'Method not allowed'], 405);
