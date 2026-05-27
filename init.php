<?php
/**
 * init.php — session, database, helpers.
 * Included by every page and API endpoint. Does NOT output HTML.
 */

if (session_status() === PHP_SESSION_NONE) session_start();

error_reporting(E_ALL);
ini_set('display_errors', 0);
header_remove('X-Powered-By');

// ---------- Database ----------
$database = null;
$_dataDir = __DIR__ . '/data';
if (!is_dir($_dataDir)) @mkdir($_dataDir, 0750, true);
$_dbPath = $_dataDir . '/baanabus.db';

try {
    $database = new PDO('sqlite:' . $_dbPath);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->exec('PRAGMA journal_mode=WAL');
    $database->exec('PRAGMA foreign_keys=ON');
    _ensureSchema($database);
} catch (PDOException $e) {
    error_log('DB init failed: ' . $e->getMessage());
    $database = null;
}
unset($_dataDir, $_dbPath);

// ---------- Schema ----------
function _ensureSchema(PDO $db): void {
    $db->exec("
        CREATE TABLE IF NOT EXISTS tasks (
            task_id       INTEGER PRIMARY KEY AUTOINCREMENT,
            task_title    TEXT NOT NULL,
            task_description TEXT,
            task_type     TEXT DEFAULT 'task',
            context       TEXT,
            task_urgency  INTEGER DEFAULT 3,
            completed     INTEGER DEFAULT 0,
            show_after    DATETIME DEFAULT CURRENT_TIMESTAMP,
            deadline      DATETIME,
            prereq_tasks  TEXT,
            parent_task   INTEGER,
            person_id     INTEGER,
            habitica_id   TEXT,
            buy_from      TEXT,
            tags          TEXT
        );

        CREATE TABLE IF NOT EXISTS people (
            person_id       INTEGER PRIMARY KEY AUTOINCREMENT,
            name            TEXT NOT NULL,
            avatar_img      TEXT,
            is_org          INTEGER DEFAULT 0,
            context         TEXT,
            circles         TEXT,
            next_review     DATE,
            review_interval INTEGER DEFAULT 30,
            is_active       INTEGER DEFAULT 1,
            DOB INTEGER, MOB INTEGER, YOB INTEGER,
            char1 TEXT, char2 TEXT, char3 TEXT,
            char_extended   TEXT,
            interests       TEXT,
            love_language   TEXT,
            brain           TEXT
        );

        CREATE TABLE IF NOT EXISTS people_notes (
            note_id    INTEGER PRIMARY KEY AUTOINCREMENT,
            person_id  INTEGER,
            contents   TEXT NOT NULL,
            date_added DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS diary (
            date         DATE PRIMARY KEY,
            task_queue   TEXT DEFAULT '[]',
            energy_level INTEGER,
            day_type     INTEGER,
            drop_count   INTEGER DEFAULT 0,
            drop_cap     INTEGER DEFAULT 0
        );

        CREATE TABLE IF NOT EXISTS contexts (
            context TEXT PRIMARY KEY
        );

        CREATE TABLE IF NOT EXISTS inbox (
            item_id    INTEGER PRIMARY KEY AUTOINCREMENT,
            content    TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS urgency (
            urgency_level INTEGER PRIMARY KEY,
            display_name  TEXT NOT NULL
        );

        CREATE TABLE IF NOT EXISTS quotes (
            quote_id INTEGER PRIMARY KEY AUTOINCREMENT,
            quote    TEXT NOT NULL
        );

        CREATE TABLE IF NOT EXISTS energy_levels (
            energy_level INTEGER PRIMARY KEY,
            label        TEXT NOT NULL,
            description  TEXT
        );

        CREATE TABLE IF NOT EXISTS day_types (
            day_type    INTEGER PRIMARY KEY,
            label       TEXT NOT NULL,
            description TEXT
        );
    ");

    // Seed reference data (INSERT OR IGNORE = safe to repeat)
    $db->exec("
        INSERT OR IGNORE INTO urgency VALUES
            (1,'⚡ Do now'),(2,'🔥 Today'),(3,'📅 Soon'),
            (4,'🌿 Someday'),(5,'💤 Waiting');

        INSERT OR IGNORE INTO energy_levels VALUES
            (1,'😴 Exhausted','Survival mode — basics only'),
            (2,'😕 Low','Small easy things only'),
            (3,'😐 Okay','Normal tasks'),
            (4,'😊 Good','Tackle the harder stuff'),
            (5,'⚡ On fire','Big and hard things');

        INSERT OR IGNORE INTO day_types VALUES
            (1,'🏠 Home','Home-based day'),
            (2,'💼 Work','Work day'),
            (3,'🛍️ Out','Out and about'),
            (4,'🌿 Rest','Rest and recovery');

        INSERT OR IGNORE INTO contexts VALUES
            ('home'),('work'),('shops'),('online'),('phone'),('anywhere');

        INSERT OR IGNORE INTO quotes VALUES
            (1,'Done is better than perfect.'),
            (2,'You don''t have to be great to start, but you have to start to be great.'),
            (3,'One thing at a time.'),
            (4,'Progress, not perfection.'),
            (5,'Small steps still move you forward.'),
            (6,'You are doing better than you think.'),
            (7,'Start somewhere. Anywhere. Just start.');

    ");
}

// ---------- Helpers ----------
function json_response($data, $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}
