<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['error' => 'POST only'], 405);
if (!$database) json_response(['error' => 'No database'], 500);

$in    = json_decode(file_get_contents('php://input'), true) ?: [];
$topic = trim($in['topic'] ?? '');

$questions = [
    'Plants' => [
        ['trivia','What is the green pigment that captures sunlight in plant leaves?','Melanin','Chlorophyll','Carotene','Anthocyanin','b','Plants'],
        ['trivia','Plants that shed their leaves each autumn are called what?','Evergreen','Annual','Deciduous','Perennial','c','Plants'],
        ['trivia','What gas do plants release as a byproduct of photosynthesis?','Carbon dioxide','Nitrogen','Water vapour','Oxygen','d','Plants'],
        ['trivia','What is the scientific study of plants called?','Zoology','Botany','Ecology','Mycology','b','Plants'],
        ['trivia','Which part of a flower receives pollen during fertilisation?','Stamen','Petal','Sepal','Stigma','d','Plants'],
        ['trivia','What is the world\'s tallest type of grass?','Sugar cane','Bamboo','Corn','Pampas grass','b','Plants'],
        ['trivia','What do the rings in a tree trunk cross-section indicate?','The tree\'s height','The type of soil','The tree\'s age','The tree\'s species','c','Plants'],
        ['trivia','What is the name for plants that live for more than two years?','Annual','Biennial','Seasonal','Perennial','d','Plants'],
        ['trivia','What part of the broccoli plant do we eat?','Root','Stem','Leaf','Flower head','d','Plants'],
        ['trivia','What is the world\'s largest seed?','Coconut','Avocado','Coco de mer','Date','c','Plants'],
        ['trivia','Cacti are native to which part of the world?','Africa','Asia','Australia','The Americas','d','Plants'],
        ['trivia','What gives autumn leaves their red and purple colours?','Carotene','Chlorophyll','Anthocyanins','Tannins','c','Plants'],
        ['trivia','What tissue carries water from roots up through a plant?','Phloem','Cambium','Cortex','Xylem','d','Plants'],
        ['trivia','What is the waxy outer layer of a leaf that reduces water loss called?','Epidermis','Cuticle','Stomata','Mesophyll','b','Plants'],
        ['trivia','What is it called when a plant grows toward a light source?','Geotropism','Hydrotropism','Phototropism','Thigmotropism','c','Plants'],
    ],
    'Pop Music' => [
        ['trivia','Which artist holds the record for most Grammy Awards won?','Taylor Swift','Jay-Z','Beyoncé','Adele','c','Pop Music'],
        ['trivia','What was the best-selling album of the 1980s worldwide?','Purple Rain','Thriller','Born in the USA','Like a Virgin','b','Pop Music'],
        ['trivia','Which band was Freddie Mercury the lead singer of?','Led Zeppelin','Aerosmith','Queen','The Rolling Stones','c','Pop Music'],
        ['trivia','What year did The Beatles officially break up?','1968','1969','1970','1972','c','Pop Music'],
        ['trivia','Who sang "Like a Prayer" (1989)?','Janet Jackson','Whitney Houston','Cyndi Lauper','Madonna','d','Pop Music'],
        ['trivia','Which Australian band had a hit with "Down Under"?','INXS','Midnight Oil','Men at Work','Crowded House','c','Pop Music'],
        ['trivia','What is Taylor Swift\'s debut album called?','Fearless','Taylor Swift','Speak Now','Red','b','Pop Music'],
        ['trivia','Who is known as the "King of Pop"?','Elvis Presley','Prince','David Bowie','Michael Jackson','d','Pop Music'],
        ['trivia','Which artist released the 2017 hit "Shape of You"?','Sam Smith','Justin Bieber','Harry Styles','Ed Sheeran','d','Pop Music'],
        ['trivia','Who sang "Rolling in the Deep"?','Amy Winehouse','Beyoncé','Rihanna','Adele','d','Pop Music'],
        ['trivia','Which pop star is also known as "Mother Monster"?','Katy Perry','Lady Gaga','Nicki Minaj','Ariana Grande','b','Pop Music'],
        ['trivia','What is ABBA\'s home country?','Norway','Denmark','Finland','Sweden','d','Pop Music'],
        ['trivia','Which band released the album "Abbey Road" in 1969?','The Rolling Stones','The Who','The Beatles','Led Zeppelin','c','Pop Music'],
        ['trivia','Who sang "Billie Jean"?','Prince','Michael Jackson','David Bowie','Stevie Wonder','b','Pop Music'],
        ['trivia','What country does K-pop originate from?','Japan','China','Thailand','South Korea','d','Pop Music'],
    ],
    'Food' => [
        ['trivia','Which country is credited with inventing pizza?','France','Spain','Italy','Greece','c','Food'],
        ['trivia','Sushi originates from which country?','China','Korea','Vietnam','Japan','d','Food'],
        ['trivia','What is the main ingredient in guacamole?','Tomato','Mango','Lime','Avocado','d','Food'],
        ['trivia','Which nut is used to make marzipan?','Walnut','Pistachio','Almond','Hazelnut','c','Food'],
        ['trivia','What is the most consumed hot beverage in the world?','Coffee','Hot chocolate','Green tea','Tea','d','Food'],
        ['trivia','How many calories are in one gram of fat?','4','7','9','11','c','Food'],
        ['trivia','What is the world\'s most expensive spice by weight?','Vanilla','Saffron','Cardamom','Cinnamon','b','Food'],
        ['trivia','What is tofu made from?','Rice milk','Almond milk','Coconut milk','Soy milk','d','Food'],
        ['trivia','Which vitamin is abundant in orange and yellow vegetables like carrots?','Vitamin B','Vitamin A','Vitamin C','Vitamin D','b','Food'],
        ['trivia','What is the Italian word for ice cream?','Sorbet','Semifreddo','Granita','Gelato','d','Food'],
        ['trivia','Which country is the world\'s largest producer of coffee?','Colombia','Vietnam','Ethiopia','Brazil','d','Food'],
        ['trivia','What gives chilli peppers their heat?','Piperine','Gingerol','Capsaicin','Allicin','c','Food'],
        ['trivia','What type of pastry is a croissant made from?','Shortcrust','Choux','Filo','Laminated','d','Food'],
        ['trivia','Which civilisation first drank chocolate as a beverage?','Swiss','French','Aztec/Maya','Belgian','c','Food'],
        ['trivia','What is the name for Japanese rice wine?','Soju','Baijiu','Sake','Mirin','c','Food'],
    ],
];

if (!array_key_exists($topic, $questions)) {
    json_response(['error' => 'Unknown topic'], 400);
}

try {
    $existing = $database->prepare("SELECT COUNT(*) FROM study_questions WHERE set_name = ? AND q_type = 'trivia'");
    $existing->execute([$topic]);
    if ((int)$existing->fetchColumn() > 0) {
        json_response(['ok' => true, 'already_unlocked' => true]);
    }

    $stmt = $database->prepare("
        INSERT INTO study_questions (q_type, question, option_a, option_b, option_c, option_d, correct, set_name)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    foreach ($questions[$topic] as $row) {
        $stmt->execute($row);
    }
    json_response(['ok' => true, 'topic' => $topic, 'added' => count($questions[$topic])]);
} catch (Throwable $e) {
    json_response(['error' => $e->getMessage()], 500);
}
