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

function _ensureMigrations(PDO $db): void {
    $alters = [
        "ALTER TABLE contexts      ADD COLUMN description      TEXT",
    ];
    foreach ($alters as $sql) {
        try { $db->exec($sql); }
        catch (PDOException $e) {
            if (strpos($e->getMessage(), 'duplicate column') === false) throw $e;
        }
    }
}

function _ensureSchema(PDO $db): void {
    $db->exec("

        CREATE TABLE IF NOT EXISTS contexts (
            context TEXT PRIMARY KEY
        );

        CREATE TABLE IF NOT EXISTS urgency (
            urgency_level INTEGER PRIMARY KEY,
            display_name  TEXT NOT NULL
        );


        CREATE TABLE IF NOT EXISTS tips (
            tip_id   INTEGER PRIMARY KEY AUTOINCREMENT,
            tip      TEXT NOT NULL
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

        CREATE TABLE IF NOT EXISTS tags (
            tag_id    TEXT PRIMARY KEY,
            name      TEXT NOT NULL,
            challenge TEXT,
            tag_type  TEXT DEFAULT 'default'
        );

        CREATE TABLE IF NOT EXISTS love_languages (
            language     TEXT PRIMARY KEY,
            display_name TEXT NOT NULL,
            help_text    TEXT
        );

        CREATE TABLE IF NOT EXISTS note_types (
            note_type   INTEGER PRIMARY KEY,
            label       TEXT NOT NULL,
            description TEXT
        );

        CREATE TABLE IF NOT EXISTS task_types (
            task_type   TEXT PRIMARY KEY,
            description TEXT
        );

        CREATE TABLE IF NOT EXISTS priority (
            priority_level INTEGER PRIMARY KEY,
            display_name   TEXT NOT NULL
        );

        CREATE TABLE IF NOT EXISTS study_questions (
            id          INTEGER PRIMARY KEY AUTOINCREMENT,
            q_type      TEXT    NOT NULL DEFAULT 'trivia',
            question    TEXT    NOT NULL,
            option_a    TEXT    NOT NULL,
            option_b    TEXT    NOT NULL,
            option_c    TEXT    NOT NULL,
            option_d    TEXT    NOT NULL,
            correct     TEXT    NOT NULL,
            explanation TEXT,
            set_name    TEXT,
            created_at  DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS question_seen (
            question_id   INTEGER PRIMARY KEY,
            seen_count    INTEGER DEFAULT 0,
            correct_count INTEGER DEFAULT 0,
            last_seen     DATETIME,
            FOREIGN KEY (question_id) REFERENCES study_questions(id)
        );
        CREATE TABLE IF NOT EXISTS daily_completions (
            date  TEXT PRIMARY KEY,
            count INTEGER NOT NULL DEFAULT 0
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

        INSERT OR IGNORE INTO contexts (context) VALUES
            ('home'),('work'),('shops'),('online'),('phone'),('anywhere');

        INSERT OR IGNORE INTO love_languages VALUES
            ('service', 'Acts of Service',  'This person feels loved when I do things for them'),
            ('words',   'Words',            'This person feels loved when I use words to encourage them and tell them I care'),
            ('touch',   'Touch',            'This person feels loved when they get hugs, or being touched in appropriate ways'),
            ('gifts',   'Gifts',            'This person feels loved when others give them gifts / they show love by giving gifts'),
            ('time',    'Quality Time',     'This person feels loved when others spend time with them');

        INSERT OR IGNORE INTO note_types VALUES
            (0, 'note',     'A note about a person'),
            (1, 'question', 'Something you were going to ask them'),
            (2, 'reminder', 'Something you need to remember when you see them');

        INSERT OR IGNORE INTO task_types VALUES
            ('next-action', 'A clear and simple instruction that you can do without having to think about it'),
            ('to-do',       'A task that can be broken down into steps or that needs thinking about'),
            ('project',     'A more complicated task that might have a number of subtasks involved'),
            ('goal',        'Something generic like Clean the House — an overarching goal'),
            ('buy',         'Something you need to buy from somewhere'),
            ('wait',        'You need to wait for something to happen or for someone else to do something'),
            ('contact',     'You need to get in touch with someone to ask them or tell them something'),
            ('recurring_tasks', 'This task repeats every so often'),
            ('routine',     'Task is part of a list e.g. birthday party list, morning list'),
            ('question',    'You need to ask someone something'),
            ('wishlist',    'A birthday idea or something you want but don''t have finance approval for'),
            ('delegated',   'Someone else can do this job');

        INSERT OR IGNORE INTO priority VALUES
            (0,   'Doesn''t matter'),
            (1,   'Minimal importance'),
            (10,  'Actually needs doing'),
            (100, 'Mission critical');

        INSERT OR IGNORE INTO tips VALUES
            (1,'Changed your mind about Habitica? You can connect or disconnect it any time in Settings.'),
            (2,'Your vault is encrypted to your passkey. If you lose it, you lose vault access — enrol a backup key in Settings now.'),
            (3,'Brain dump anything that''s taking up mental space — tap Note to Self in the nav bar.'),
            (4,'Snoozed a task you now want back? Find it in the Tasks list and it will reappear when the snooze expires.'),
            (5,'You can add time estimates to tasks during triage — this syncs as a tag to Habitica too.'),
            (6,'The story unlocks a new page every time you complete a set of tasks. Keep going.'),
            (7,'Agent API keys let Claude access your vault directly. Generate one in Settings if you haven''t already.'),
            (8,'Stuck on something? Hit Stuck and it will come back tomorrow. No guilt.'),
            (9,'Your energy level each morning shapes which tasks appear. Higher energy = harder tasks in the mix.'),
            (10,'Tasks, trivia, and games are all mixed into the same rotation on purpose. It''s not random — it''s paced.');


        INSERT OR IGNORE INTO study_questions (id,q_type,question,option_a,option_b,option_c,option_d,correct,set_name) VALUES
        (1,'trivia','What is the only mammal capable of sustained flight?','Flying squirrel','Bat','Sugar glider','Flying lemur','b','General'),
        (2,'trivia','What is the capital of Australia?','Sydney','Melbourne','Canberra','Brisbane','c','General'),
        (3,'trivia','How many hearts does an octopus have?','One','Two','Three','Four','c','General'),
        (4,'trivia','Which planet currently has the most known moons?','Jupiter','Saturn','Uranus','Neptune','b','General'),
        (5,'trivia','What language has the most native speakers worldwide?','English','Hindi','Mandarin','Spanish','c','General'),
        (6,'trivia','How many sides does a dodecagon have?','10','11','12','14','c','General'),
        (7,'trivia','What is the hardest natural substance on Earth?','Ruby','Diamond','Quartz','Topaz','b','General'),
        (8,'trivia','What does DNA stand for?','Deoxyribonucleic Acid','Deoxyribose Nucleic Acid','Double Nucleic Arrangement','Distinct Nucleotide Assembly','a','General'),
        (9,'trivia','What is the smallest country in the world?','Monaco','Liechtenstein','San Marino','Vatican City','d','General'),
        (10,'trivia','How many bones are in the adult human body?','196','206','216','226','b','General'),
        (11,'trivia','What is the chemical symbol for gold?','Gd','Go','Au','Ag','c','General'),
        (12,'trivia','Which ocean is the largest?','Atlantic','Indian','Arctic','Pacific','d','General'),
        (13,'trivia','What year did the Berlin Wall fall?','1987','1988','1989','1991','c','General'),
        (14,'trivia','What is the fastest land animal?','Lion','Greyhound','Cheetah','Pronghorn','c','General'),
        (15,'trivia','What element does Fe represent on the periodic table?','Fluorine','Fermium','Iron','Francium','c','General'),
        (16,'trivia','In which country were the first modern Olympic Games held?','Italy','Greece','Turkey','Egypt','b','General'),
        (17,'trivia','What is the longest river in the world?','Amazon','Congo','Yangtze','Nile','d','General'),
        (18,'trivia','How many colours are in a rainbow?','5','6','7','8','c','General'),
        (19,'trivia','How many strings does a standard guitar have?','4','5','6','7','c','General'),
        (20,'trivia','Which gas do plants absorb during photosynthesis?','Oxygen','Nitrogen','Carbon dioxide','Hydrogen','c','General'),
        (21,'trivia','What is the currency of Japan?','Won','Yuan','Rupee','Yen','d','General'),
        (22,'trivia','How many hours are in a week?','148','168','172','184','b','General'),
        (23,'trivia','Which planet is known as the Red Planet?','Venus','Mercury','Mars','Jupiter','c','General'),
        (24,'trivia','What is the largest organ in the human body?','Liver','Lungs','Brain','Skin','d','General'),
        (25,'trivia','How many players are on a standard football (soccer) team?','9','10','11','12','c','General');
    ");
    _ensureMigrations($db);
}

// ---------- Helpers ----------

// Pages needed to unlock a story page — scales with today's energy.
// Lower energy = smaller target = more achievable on hard days.
function todayPagesTarget(): int {
    $e = 3;
    try {
        $row = getDiaryEntry(date('Y-m-d'));
        if (!empty($row['energy_level'])) $e = (int)$row['energy_level'];
    } catch (Throwable $th) {}
    return [1 => 10, 2 => 12, 3 => 15, 4 => 18, 5 => 20][$e] ?? 15;
}

function json_response($data, $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}
