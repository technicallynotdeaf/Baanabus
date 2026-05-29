<?php
require_once __DIR__ . '/../init.php';
header('Content-Type: application/json; charset=utf-8');

if (!isAuthenticated()) json_response(['error' => 'Not authenticated'], 401);
if (!$database)         json_response(['error' => 'No database'], 500);

$body    = json_decode(file_get_contents('php://input'), true) ?? [];
$csv     = trim($body['csv']      ?? '');
$qType   = $body['q_type']        ?? 'study';
$setName = trim($body['set_name'] ?? '');

if (!$csv) json_response(['error' => 'No CSV provided'], 400);
if (!in_array($qType, ['trivia', 'study'])) json_response(['error' => 'Invalid q_type'], 400);

$lines    = array_filter(array_map('trim', preg_split('/\r?\n/', $csv)));
$header   = null;
$inserted = 0;
$errors   = [];

$stmt = $database->prepare("
    INSERT INTO study_questions (q_type, question, option_a, option_b, option_c, option_d, correct, explanation, set_name)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
");

foreach (array_values($lines) as $lineNum => $line) {
    $row = str_getcsv($line);

    if ($header === null) {
        $header = array_map('strtolower', array_map('trim', $row));
        continue;
    }

    if (count($row) < count($header)) { $errors[] = "Row $lineNum: too few columns"; continue; }

    $map = array_combine($header, array_slice($row, 0, count($header)));

    $question = trim($map['question']    ?? '');
    $optA     = trim($map['option_a']    ?? '');
    $optB     = trim($map['option_b']    ?? '');
    $optC     = trim($map['option_c']    ?? '');
    $optD     = trim($map['option_d']    ?? '');
    $correct  = strtolower(trim($map['correct'] ?? ''));
    $expl     = trim($map['explanation'] ?? '');

    if (!$question || !$optA || !$optB || !$optC || !$optD || !in_array($correct, ['a','b','c','d'])) {
        $errors[] = "Row $lineNum: invalid data (correct must be a/b/c/d)";
        continue;
    }

    try {
        $stmt->execute([$qType, $question, $optA, $optB, $optC, $optD, $correct, $expl ?: null, $setName ?: null]);
        $inserted++;
    } catch (Throwable $e) {
        $errors[] = "Row $lineNum: " . $e->getMessage();
    }
}

json_response(['ok' => true, 'inserted' => $inserted, 'errors' => $errors]);
