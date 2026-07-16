<?php
/**
 * init.php — session, database, helpers.
 * Included by every page and API endpoint. Does NOT output HTML.
 */

if (session_status() === PHP_SESSION_NONE) {
    // Default session.cookie_lifetime=0 makes PHPSESSID a non-persistent
    // "session" cookie. On mobile browsers, backgrounding the tab during a
    // short task (e.g. a 2-minute grounding prompt) can let the OS reclaim
    // the browser process and drop that cookie, forcing a full re-login even
    // though the server-side session (gc_maxlifetime, 24min) is still valid.
    // A real expiry makes the cookie survive that.
    session_set_cookie_params([
        'lifetime' => 60 * 60 * 24,
        'path'     => '/',
        'secure'   => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

// Apply user timezone (stored in session after vault unlock; defaults to Melbourne)
$_tz = $_SESSION['user_timezone'] ?? 'Australia/Melbourne';
date_default_timezone_set(in_array($_tz, DateTimeZone::listIdentifiers(), true) ? $_tz : 'Australia/Melbourne');
unset($_tz);

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
        "ALTER TABLE contexts        ADD COLUMN description       TEXT",
        "ALTER TABLE contexts        ADD COLUMN archived          INTEGER DEFAULT 0",
        "ALTER TABLE contexts        ADD COLUMN is_active         INTEGER DEFAULT 1",
        "ALTER TABLE foods           ADD COLUMN fibre_soluble_g   REAL",
        "ALTER TABLE foods           ADD COLUMN fibre_insoluble_g REAL",
        "ALTER TABLE nutrient_rdis   ADD COLUMN min_rdi           REAL",
        "ALTER TABLE nutrient_rdis   ADD COLUMN upper_limit       REAL",
        "ALTER TABLE nutrient_rdis   ADD COLUMN notes             TEXT",
        "ALTER TABLE nutrient_rdis   ADD COLUMN is_limit          INTEGER DEFAULT 0",
    ];
    foreach ($alters as $sql) {
        try { $db->exec($sql); }
        catch (PDOException $e) {
            if (strpos($e->getMessage(), 'duplicate column') === false) throw $e;
        }
    }

    // Mark limit nutrients (upper-bound only — lower intake is always better)
    try {
        $db->exec("UPDATE nutrient_rdis SET is_limit=1 WHERE nutrient IN ('fat_trans_g','fat_saturated_g','sugars_g')");
    } catch (PDOException $e) {}
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

        CREATE TABLE IF NOT EXISTS locations (
            location_id INTEGER PRIMARY KEY,
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
            (4,'🌿 Rest','Rest and recovery'),
            (5,'WFH','Working from home'),
            (6,'🚌 Transit','Commuting or travelling');

        INSERT OR IGNORE INTO contexts (context) VALUES
            ('home'),('work'),('shops'),('online'),('phone'),('anywhere');

        INSERT OR IGNORE INTO locations VALUES
            (1,'Home','At home'),
            (2,'Work','At the office'),
            (3,'Out','Out and about'),
            (4,'Rest','Resting'),
            (6,'Transit','Commuting or travelling');

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
    _ensureFoodSchema($db);
}

function _ensureFoodSchema(PDO $db): void {
    $db->exec("
        CREATE TABLE IF NOT EXISTS nutrient_rdis (
            nutrient      TEXT PRIMARY KEY,
            label         TEXT NOT NULL,
            unit          TEXT NOT NULL,
            daily_rdi     REAL NOT NULL,
            weekly_rdi    REAL,
            period        TEXT NOT NULL DEFAULT 'daily',
            good_enough   REAL NOT NULL DEFAULT 0.9,
            display_order INTEGER NOT NULL DEFAULT 99
        );
        CREATE TABLE IF NOT EXISTS foods (
            food_id             INTEGER PRIMARY KEY AUTOINCREMENT,
            name                TEXT NOT NULL,
            search_name         TEXT NOT NULL,
            category            TEXT,
            suggested_serving_g REAL,
            fibre_g             REAL,
            potassium_mg        REAL,
            vitamin_k_mcg       REAL,
            vitamin_c_mg        REAL,
            folate_mcg          REAL,
            calcium_mg          REAL,
            iron_mg             REAL,
            magnesium_mg        REAL,
            sodium_mg           REAL,
            vitamin_a_mcg       REAL,
            vitamin_d_mcg       REAL
        );
        CREATE INDEX IF NOT EXISTS idx_foods_search ON foods(search_name);
        CREATE TABLE IF NOT EXISTS food_servings (
            serving_id  INTEGER PRIMARY KEY AUTOINCREMENT,
            food_id     INTEGER NOT NULL REFERENCES foods(food_id),
            unit_label  TEXT NOT NULL,
            weight_g    REAL NOT NULL,
            is_default  INTEGER NOT NULL DEFAULT 0
        );
    ");
    $db->exec("
        INSERT OR IGNORE INTO nutrient_rdis
            (nutrient,label,unit,daily_rdi,weekly_rdi,period,good_enough,display_order) VALUES
        ('fibre',     'Fibre',     'g',    25.0,   175.0, 'daily',  0.9, 1),
        ('potassium', 'Potassium', 'mg',  2800.0, 19600.0,'daily',  0.9, 2),
        ('vitamin_c', 'Vitamin C', 'mg',    45.0,   315.0, 'daily',  0.9, 3),
        ('folate',    'Folate',    'mcg',  400.0,  2800.0, 'daily',  0.9, 4),
        ('calcium',   'Calcium',   'mg',  1000.0,  7000.0, 'daily',  0.9, 5),
        ('iron',      'Iron',      'mg',    18.0,   126.0, 'weekly', 0.9, 6),
        ('magnesium', 'Magnesium', 'mg',   320.0,  2240.0, 'daily',  0.9, 7),
        ('vitamin_k', 'Vitamin K', 'mcg',   60.0,   420.0, 'weekly', 0.9, 8),
        ('vitamin_a', 'Vitamin A', 'mcg',  700.0,  4900.0, 'weekly', 0.9, 9),
        ('vitamin_d', 'Vitamin D', 'mcg',    5.0,    35.0, 'weekly', 0.9, 10)
    ");
    _seedFoodData($db);
    _updateFibreData($db);
}

function _updateFibreData(PDO $db): void {
    // Skip if already seeded
    if ((int)$db->query("SELECT COUNT(*) FROM foods WHERE fibre_soluble_g IS NOT NULL")->fetchColumn() > 0) return;

    // Update existing nutrient_rdis rows with evidence-based min_rdi, upper_limit, notes
    $rdiMeta = [
        ['fibre',      15.0,  null,    null],
        ['potassium',  2000.0, null,   null],
        ['vitamin_c',  10.0,  2000.0,  null],
        ['folate',     200.0, 1000.0,  "UL applies to synthetic folic acid (supplements/fortified foods); naturally occurring food folate is safe at any dietary level"],
        ['calcium',    500.0, 2500.0,  "Higher intakes — especially from supplements — are linked to kidney stones and possibly cardiovascular risk"],
        ['iron',       8.0,   45.0,    "UL applies to supplemental iron; excess iron from whole food is rarely an issue for healthy adults"],
        ['magnesium',  200.0, 350.0,   "UL applies to supplemental magnesium only; dietary magnesium from food has no established upper limit"],
        ['vitamin_k',  30.0,  1000.0,  "No formal upper limit established. High intakes above ~600mcg/day can interact with anticoagulant medications (warfarin, heparin) — consistency matters more than amount"],
        ['vitamin_a',  200.0, 3000.0,  "UL is for preformed retinol (liver, meat, dairy, supplements). Beta-carotene from plants converts more slowly and is not included in this limit"],
        ['vitamin_d',  1.5,   100.0,   null],
    ];
    $updRdi = $db->prepare("UPDATE nutrient_rdis SET min_rdi=?, upper_limit=?, notes=? WHERE nutrient=?");
    foreach ($rdiMeta as [$n, $min, $upper, $notes]) {
        $updRdi->execute([$min, $upper, $notes, $n]);
    }

    // Add soluble and insoluble fibre as tracked nutrients
    $db->exec("
        INSERT OR IGNORE INTO nutrient_rdis
            (nutrient,label,unit,daily_rdi,weekly_rdi,period,good_enough,display_order,min_rdi,upper_limit,notes) VALUES
        ('fibre_soluble',   'Fibre — soluble',   'g', 7.0,  49.0, 'daily', 0.9, 1.5, 3.0, null,
         'Dissolves in water; forms a gel that slows glucose absorption, feeds gut bacteria, and lowers LDL. Found in oats, legumes, fruit, psyllium.'),
        ('fibre_insoluble', 'Fibre — insoluble', 'g', 18.0, 126.0,'daily', 0.9, 1.6, null, null,
         'Adds bulk and speeds transit. Found in vegetable skins, wholegrains, nuts, seeds. Supports microbiome diversity.')
    ");

    // Update foods with per-100g soluble / insoluble fibre values (AFCD-based approximations)
    $upd = $db->prepare("UPDATE foods SET fibre_soluble_g=?, fibre_insoluble_g=? WHERE name=?");
    foreach ([
        // Fruits
        ['Apple',              1.0, 1.2], ['Avocado',           2.1, 4.6],
        ['Banana',             0.6, 1.1], ['Blueberries',        0.5, 1.9],
        ['Feijoa',             1.2, 2.8], ['Kiwifruit',          1.0, 2.0],
        ['Mango',              0.8, 0.8], ['Orange',             1.1, 1.1],
        ['Passionfruit',       1.2, 9.2], ['Pear',               1.2, 1.9],
        ['Raspberries',        0.9, 5.6], ['Rockmelon',          0.2, 0.7],
        ['Strawberries',       0.4, 1.6], ['Watermelon',         0.1, 0.3],
        ['Grapes',             0.4, 0.5], ['Peach',              0.7, 0.8],
        ['Plum',               0.7, 0.7],
        // Vegetables
        ['Asparagus',          1.7, 0.4], ['Beetroot',           0.5, 2.3],
        ['Broccoli',           1.0, 1.6], ['Brussels sprouts',   1.5, 2.3],
        ['Cabbage',            0.6, 1.9], ['Capsicum (red)',      0.5, 1.6],
        ['Capsicum (green)',   0.4, 1.4], ['Carrot',             1.5, 1.3],
        ['Cauliflower',        0.5, 1.5], ['Celery',             0.4, 1.2],
        ['Corn',               0.2, 2.1], ['Cucumber',           0.1, 0.5],
        ['Eggplant',           0.6, 2.4], ['Kale',               0.5, 3.1],
        ['Leek',               1.2, 0.6], ['Lettuce (cos)',       0.4, 1.3],
        ['Mushrooms',          0.1, 0.9], ['Onion',              1.1, 0.6],
        ['Peas',               1.8, 3.3], ['Potato',             0.8, 1.0],
        ['Pumpkin',            0.2, 0.3], ['Silverbeet',         0.4, 1.2],
        ['Spinach',            0.6, 1.6], ['Sweet potato',       1.2, 1.8],
        ['Tomato',             0.3, 0.9], ['Zucchini',           0.4, 0.7],
        // Legumes (cooked)
        ['Chickpeas',          3.5, 4.1], ['Kidney beans',       2.8, 4.6],
        ['Lentils',            3.6, 4.3], ['Black beans',        4.8, 3.9],
        ['Edamame',            2.0, 3.2], ['Butter beans',       2.5, 2.8],
        // Nuts and seeds
        ['Almonds',            0.9, 11.6], ['Cashews',            0.6, 2.7],
        ['Chia seeds',        13.5, 20.9], ['Pumpkin seeds',      0.4, 5.6],
        ['Walnuts',            0.7,  6.0], ['Sunflower seeds',    0.7, 7.9],
        // Dairy — no fibre
        ['Milk (full fat)',    0, 0], ['Milk (skim)',         0, 0],
        ['Yogurt (plain)',     0, 0], ['Cheddar cheese',      0, 0],
        ['Feta cheese',        0, 0],
        // Protein — no fibre
        ['Egg',                0, 0], ['Salmon',              0, 0],
        ['Sardines (tinned)',  0, 0],
        // Grains
        ['Oats',               4.5, 6.1], ['Brown rice',         0.1, 1.7],
        ['Quinoa',             0.4, 2.4], ['Wholegrain bread',   1.0, 5.4],
    ] as [$name, $sol, $insol]) {
        $upd->execute([$sol, $insol, $name]);
    }
}

function _seedFoodData(PDO $db): void {
    if ((int)$db->query("SELECT COUNT(*) FROM foods")->fetchColumn() > 0) return;

    // [name, search_name, category, suggested_g, fibre, K_mg, vitK_mcg, vitC_mg, folate_mcg,
    //  Ca_mg, Fe_mg, Mg_mg, Na_mg, vitA_mcg, vitD_mcg, serving_label, serving_g]
    $foods = [
        // ── Fruits ──────────────────────────────────────────────────────────────
        ['Apple','apple','fruit',138,1.3,107,2.2,6,5,6,0.1,5,1,3,null,'medium whole',138],
        ['Avocado','avocado','fruit',100,6.7,485,21,10,81,12,0.6,29,7,7,null,'half',100],
        ['Banana','banana','fruit',118,1.7,358,0.5,9,20,5,0.3,27,1,3,null,'medium whole',118],
        ['Blueberries','blueberry blueberries','fruit',74,2.4,77,19,10,6,6,0.3,6,1,3,null,'half cup',74],
        ['Feijoa','feijoa','fruit',50,4.0,155,3,22,38,17,0.1,9,3,2,null,'whole',50],
        ['Kiwifruit','kiwifruit kiwi','fruit',69,3.0,312,40,93,25,35,0.3,17,3,4,null,'whole',69],
        ['Mango','mango','fruit',165,1.6,168,4.2,37,14,11,0.2,10,1,38,null,'medium whole',165],
        ['Orange','orange','fruit',130,2.2,181,0,59,30,40,0.1,10,0,11,null,'medium whole',130],
        ['Passionfruit','passionfruit passion fruit','fruit',18,10.4,348,0.7,30,14,12,1.6,29,28,64,null,'whole',18],
        ['Pear','pear','fruit',178,3.1,119,4.4,4,7,9,0.2,7,1,1,null,'medium whole',178],
        ['Raspberries','raspberry raspberries','fruit',123,6.5,151,7.8,26,21,25,0.7,22,1,2,null,'cup',123],
        ['Rockmelon','rockmelon cantaloupe melon','fruit',134,0.9,267,2.5,36,17,9,0.2,12,16,169,null,'cup (cubed)',134],
        ['Strawberries','strawberry strawberries','fruit',152,2.0,154,2.2,59,24,16,0.4,13,1,1,null,'cup',152],
        ['Watermelon','watermelon','fruit',280,0.4,112,0.1,8,3,7,0.2,10,1,28,null,'slice',280],
        ['Grapes','grapes grape','fruit',92,0.9,191,14.6,3,2,10,0.4,5,2,3,null,'small bunch',92],
        ['Peach','peach nectarine','fruit',150,1.5,190,2.6,6,4,6,0.3,9,0,16,null,'medium whole',150],
        ['Plum','plum','fruit',66,1.4,157,6.4,9,5,6,0.2,7,0,17,null,'whole',66],
        // ── Vegetables ──────────────────────────────────────────────────────────
        ['Asparagus','asparagus','vegetable',90,2.1,202,51,7,149,24,1.1,14,2,38,null,'6 spears',90],
        ['Beetroot','beetroot beet','vegetable',136,2.8,325,0.2,5,109,16,0.8,23,78,2,null,'cup (sliced)',136],
        ['Broccoli','broccoli','vegetable',91,2.6,316,102,89,63,47,0.7,21,33,31,null,'cup (raw)',91],
        ['Brussels sprouts','brussels sprouts brussel','vegetable',88,3.8,389,177,85,61,42,1.4,23,25,38,null,'cup',88],
        ['Cabbage','cabbage','vegetable',70,2.5,170,76,36,43,40,0.5,12,18,5,null,'cup (shredded)',70],
        ['Capsicum (red)','capsicum red pepper bell pepper red','vegetable',119,2.1,211,4.9,190,46,7,0.4,12,4,157,null,'medium whole',119],
        ['Capsicum (green)','capsicum green pepper bell pepper green','vegetable',119,1.8,175,7.4,80,10,10,0.4,10,3,18,null,'medium whole',119],
        ['Carrot','carrot carrots','vegetable',61,2.8,320,13,6,19,33,0.3,12,69,835,null,'medium whole',61],
        ['Cauliflower','cauliflower','vegetable',100,2.0,299,16,48,57,22,0.4,15,30,0,null,'cup (florets)',100],
        ['Celery','celery','vegetable',40,1.6,260,29,3,36,40,0.2,11,80,22,null,'stalk',40],
        ['Corn','corn sweetcorn maize','vegetable',77,2.3,270,0.3,7,46,2,0.4,26,15,10,null,'half cob',77],
        ['Cucumber','cucumber','vegetable',119,0.6,147,16,3,14,14,0.3,13,2,5,null,'half',119],
        ['Eggplant','eggplant aubergine','vegetable',82,3.0,229,3.5,2,22,9,0.2,14,2,1,null,'cup (cubed)',82],
        ['Kale','kale','vegetable',67,3.6,491,817,93,141,150,1.5,47,38,241,null,'cup (chopped)',67],
        ['Leek','leek','vegetable',89,1.8,180,47,12,64,59,2.1,28,20,83,null,'medium whole',89],
        ['Lettuce (cos)','lettuce cos romaine','vegetable',47,1.7,247,102,4,136,33,0.9,14,8,136,null,'cup (chopped)',47],
        ['Mushrooms','mushroom mushrooms','vegetable',70,1.0,318,0,2,17,3,0.5,9,5,0,0.2,'cup (sliced)',70],
        ['Onion','onion','vegetable',110,1.7,146,0.4,7,30,23,0.2,10,4,0,null,'medium whole',110],
        ['Peas','peas green peas','vegetable',80,5.1,271,26,40,51,25,1.5,33,5,38,null,'half cup',80],
        ['Potato','potato potatoes','vegetable',150,1.8,421,2,20,18,12,0.8,23,6,0,null,'medium whole',150],
        ['Pumpkin','pumpkin butternut squash','vegetable',116,0.5,340,1.1,9,16,21,0.8,12,1,426,null,'cup (cubed)',116],
        ['Silverbeet','silverbeet silver beet swiss chard chard','vegetable',36,1.6,549,830,30,14,51,1.8,81,213,306,null,'cup (raw)',36],
        ['Spinach','spinach baby spinach','vegetable',30,2.2,558,483,28,194,99,2.7,79,79,469,null,'cup (raw)',30],
        ['Sweet potato','sweet potato kumara','vegetable',130,3.0,337,1.8,20,11,30,0.6,25,55,961,null,'medium whole',130],
        ['Tomato','tomato tomatoes','vegetable',123,1.2,237,8,14,15,10,0.3,11,5,42,null,'medium whole',123],
        ['Zucchini','zucchini courgette','vegetable',124,1.1,261,4.3,17,24,16,0.4,18,8,10,null,'medium whole',124],
        // ── Legumes (cooked) ────────────────────────────────────────────────────
        ['Chickpeas','chickpeas chickpea garbanzo','legume',164,7.6,291,6.6,1,172,80,4.7,48,11,1,null,'cup (cooked)',164],
        ['Kidney beans','kidney beans red beans','legume',177,7.4,403,14.9,1,229,50,5.2,45,2,0,null,'cup (cooked)',177],
        ['Lentils','lentils lentil','legume',198,7.9,369,1.7,1,181,19,6.6,36,2,1,null,'cup (cooked)',198],
        ['Black beans','black beans','legume',172,8.7,355,5.6,0,256,46,3.6,70,2,2,null,'cup (cooked)',172],
        ['Edamame','edamame soybean soybeans','legume',155,5.2,436,26,9,311,98,3.5,64,9,9,null,'cup (shelled)',155],
        ['Butter beans','butter beans lima beans','legume',170,5.3,401,2,0,170,32,4.5,73,2,0,null,'cup (cooked)',170],
        // ── Nuts and seeds ───────────────────────────────────────────────────────
        ['Almonds','almonds almond','nut',30,12.5,733,0,0,44,264,3.7,270,1,0,null,'small handful (30g)',30],
        ['Cashews','cashews cashew','nut',30,3.3,660,34.7,0,25,37,6.7,292,12,0,null,'small handful (30g)',30],
        ['Chia seeds','chia seeds chia','seed',28,34.4,407,0,1,49,631,7.7,335,16,0,null,'2 tablespoons',28],
        ['Pumpkin seeds','pumpkin seeds pepitas','seed',30,6.0,919,0,0,16,46,8.8,592,7,0,null,'2 tablespoons (30g)',30],
        ['Walnuts','walnuts walnut','nut',30,6.7,441,2.7,1,98,98,2.9,158,2,1,null,'small handful (30g)',30],
        ['Sunflower seeds','sunflower seeds','seed',30,8.6,645,0,0,78,33,5.3,325,1,0,null,'2 tablespoons (30g)',30],
        // ── Dairy ────────────────────────────────────────────────────────────────
        ['Milk (full fat)','milk full fat whole milk','dairy',250,0,150,1,1,5,113,0.1,10,44,46,0.1,'cup (250ml)',250],
        ['Milk (skim)','milk skim low fat','dairy',250,0,166,0.2,1,5,125,0.1,11,52,4,0.1,'cup (250ml)',250],
        ['Yogurt (plain)','yogurt plain yoghurt','dairy',200,0,155,0.2,0,11,110,0.1,11,46,27,0.1,'small tub (200g)',200],
        ['Cheddar cheese','cheddar cheese','dairy',30,0,98,2.4,0,18,721,0.2,28,621,85,0.1,'slice (30g)',30],
        ['Feta cheese','feta cheese','dairy',30,0,62,1.8,0,9,140,0.1,5,410,26,0.1,'serving (30g)',30],
        // ── Protein ─────────────────────────────────────────────────────────────
        ['Egg','egg eggs','protein',50,0,138,0.3,0,47,25,1.8,6,124,100,1.1,'whole (large)',50],
        ['Salmon','salmon','protein',100,0,628,0.6,0,28,12,0.8,32,59,13,14.5,'serve (100g)',100],
        ['Sardines (tinned)','sardines sardine tinned canned fish','protein',100,0,397,2.6,0,10,382,2.9,39,505,35,4.8,'small tin (100g)',100],
        // ── Grains ───────────────────────────────────────────────────────────────
        ['Oats','oats oatmeal porridge','grain',40,10.6,429,2,0,56,54,4.7,177,2,0,null,'half cup (raw)',40],
        ['Brown rice','brown rice','grain',195,1.8,79,1.2,0,4,10,1.0,43,10,0,null,'cup (cooked)',195],
        ['Quinoa','quinoa','grain',185,2.8,172,0,0,42,31,2.8,64,13,0,null,'cup (cooked)',185],
        ['Wholegrain bread','wholegrain bread wholemeal bread','grain',45,6.4,190,1.8,0,39,76,2.4,47,335,0,null,'2 slices',45],
    ];

    $fstmt = $db->prepare("INSERT INTO foods
        (name,search_name,category,suggested_serving_g,fibre_g,potassium_mg,vitamin_k_mcg,
         vitamin_c_mg,folate_mcg,calcium_mg,iron_mg,magnesium_mg,sodium_mg,vitamin_a_mcg,vitamin_d_mcg)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sstmt = $db->prepare("INSERT INTO food_servings (food_id,unit_label,weight_g,is_default) VALUES (?,?,?,?)");

    foreach ($foods as $f) {
        $fstmt->execute(array_slice($f, 0, 15));
        $id = (int)$db->lastInsertId();
        $sstmt->execute([$id, 'grams', 1, 0]);
        $sstmt->execute([$id, $f[15], $f[16], 1]);
    }
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
