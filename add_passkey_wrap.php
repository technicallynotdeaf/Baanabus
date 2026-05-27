<?php
// add_passkey_wrap.php — grant the current credential vault access by wrapping the DEK with its PRF key.
// Called directly with a prfKey already in hand (e.g. after a PRF-capable sign-in that had no wrap yet).
session_start();
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_dec_apw($s){ $s=strtr($s,'-_','+/'); return base64_decode($s.str_repeat('=',(4-strlen($s)%4)%4)); }
function respond_apw($d,$c=200){ http_response_code($c); echo json_encode($d); exit; }

if (empty($_SESSION['is_authenticated'])) respond_apw(['error'=>'Not signed in'],401);
if (empty($_SESSION['DEK'])) respond_apw(['error'=>'Vault is locked'],400);
if (empty($_SESSION['credential_id'])) respond_apw(['error'=>'No credential ID in session'],400);

$input = json_decode(file_get_contents('php://input'), true) ?: [];
$prfKeyB64 = $input['prfKey'] ?? '';
if ($prfKeyB64 === '') respond_apw(['error'=>'Missing prfKey'],400);
if (!extension_loaded('sodium')) respond_apw(['error'=>'libsodium missing'],500);

$dek   = b64u_dec_apw($_SESSION['DEK']);
$paths = getConfigPaths();
wrapDekWithPrf($dek, $prfKeyB64, $paths);

respond_apw(['ok'=>true]);
