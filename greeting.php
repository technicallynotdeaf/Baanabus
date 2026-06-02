<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }

$greetings = [
    "Hey! You showed up. That's already the hard part.",
    "Good to see you. Ready when you are.",
    "You're here. Let's make it count.",
    "Hey you. No pressure — just one thing at a time.",
    "There you are. Good to have you back.",
    "You made it. That matters.",
    "Welcome back. What are we doing today?",
    "Hi! Glad you're here.",
    "You showed up. That's the whole battle.",
    "Hey. Take a breath. Then let's pick one thing.",
];
?>
<div style="padding:0.25rem 0;">
  <p style="margin-bottom:0.75rem;"><?= htmlspecialchars($greetings[array_rand($greetings)]) ?></p>
  <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Let's go</button>
</div>
