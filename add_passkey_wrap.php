<?php
// add_passkey_wrap.php — grant current passkey the ability to unlock the vault
session_start();
require_once __DIR__ . '/init.php';
header('Content-Type: application/json; charset=utf-8');

function b64u_dec($s){ $s=strtr($s,'-_','+/'); return base64_decode($s.str_repeat('=',(4-strlen($s)%4)%4)); }
function respond($d,$c=200){ http_response_code($c); echo json_encode($d); exit; }

if (empty($_SESSION['is_authenticated'])) respond(['error'=>'Not signed in'],401);
if (empty($_SESSION['DEK'])) respond(['error'=>'Vault is locked'],400);
if (empty($_SESSION['user_id'])) respond(['error'=>'No credential ID in session'],400);

$input = json_decode(file_get_contents('php://input'), true) ?: [];
$prfKeyB64 = $input['prfKey'] ?? '';
if ($prfKeyB64 === '') respond(['error'=>'Missing prfKey'],400);

if (!extension_loaded('sodium')) respond(['error'=>'libsodium missing'],500);

$dek = b64u_dec($_SESSION['DEK']);
$kek = b64u_dec($prfKeyB64);

$nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
$ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($dek, '', $nonce, $kek);

$credId = preg_replace('/[^A-Za-z0-9_\-]/','_', $_SESSION['user_id']);
$wrapDir = __DIR__ . '/config/wraps';
@mkdir($wrapDir, 0700, true);
$wrapPath = "$wrapDir/cred_{$credId}.json";

$data = [
  'type'  => 'prf',
  'alg'   => 'xchacha20',
  'nonce' => base64_encode($nonce),
  'ct'    => base64_encode($ct),
];

if (file_put_contents($wrapPath, json_encode($data, JSON_UNESCAPED_SLASHES), LOCK_EX) === false) {
  respond(['error'=>'Failed to write wrap file'],500);
}
@chmod($wrapPath, 0600);

respond(['ok'=>true, 'wrap'=>$wrapPath]);

