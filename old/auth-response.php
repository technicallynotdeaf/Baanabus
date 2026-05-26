<?php
session_start();

$logFile = __DIR__ . '/auth-response.log';
function log_debug($m){ global $logFile; file_put_contents($logFile, '['.date('Y-m-d H:i:s')."] $m\n", FILE_APPEND); }
header('Content-Type: application/json');

// base64url helpers
function b64u_dec($s){ return base64_decode(strtr($s, '-_', '+/').str_repeat('=', (4 - strlen($s)%4)%4)); }
function b64u_enc($b){ return rtrim(strtr(base64_encode($b), '+/', '-_'), '='); }

// read and decode
log_debug("=== New auth request ===");
$raw = file_get_contents('php://input');
log_debug("Raw length: ".strlen($raw));
$data = json_decode($raw, true);
if(!$data){ log_debug("❌ Invalid JSON: ".json_last_error_msg()); http_response_code(400); echo json_encode(['success'=>false,'message'=>'Invalid JSON']); exit; }

// structure checks
if (!isset($data['id'],$data['response']['clientDataJSON'],$data['response']['authenticatorData'],$data['response']['signature'])) {
    log_debug("❌ Missing required fields");
    http_response_code(400); echo json_encode(['success'=>false,'message'=>'Missing fields']); exit;
}

// parse clientDataJSON
$clientDataJSON_raw = b64u_dec($data['response']['clientDataJSON']);
$clientData = json_decode($clientDataJSON_raw, true);
if(!$clientData){ log_debug("❌ clientDataJSON JSON error"); http_response_code(400); echo json_encode(['success'=>false,'message'=>'Bad clientDataJSON']); exit; }
log_debug("clientData.type=".$clientData['type']." origin=".$clientData['origin']);

// challenge match
if (!isset($_SESSION['auth_challenge'])) {
    log_debug("❌ Session challenge missing"); http_response_code(400); echo json_encode(['success'=>false,'message'=>'Session challenge missing']); exit;
}
$expectedChal = b64u_enc($_SESSION['auth_challenge']);
$gotChal = $clientData['challenge'] ?? '';
if (!hash_equals($expectedChal, $gotChal)) {
    log_debug("❌ Challenge mismatch expected=$expectedChal got=$gotChal");
    http_response_code(400); echo json_encode(['success'=>false,'message'=>'Challenge mismatch']); exit;
}

// load stored credential & key
$credId = $data['id'];
$storePath = __DIR__.'/credentials.json';
$all = file_exists($storePath) ? (json_decode(file_get_contents($storePath), true) ?: []) : [];
$idx = null; $rec = null;
foreach ($all as $i=>$r) { if (($r['credentialId'] ?? '') === $credId) { $idx=$i; $rec=$r; break; } }
if ($rec === null) { log_debug("❌ Unknown credentialId"); http_response_code(400); echo json_encode(['success'=>false,'message'=>'Unknown credential']); exit; }
if (empty($rec['publicKeyPem'])) { log_debug("❌ No publicKeyPem stored for credential"); http_response_code(500); echo json_encode(['success'=>false,'message'=>'Credential missing public key']); exit; }

// parse authenticatorData
$authData = b64u_dec($data['response']['authenticatorData']);
if ($authData === false || strlen($authData) < 37) { // 32 rpIdHash + 1 flags + 4 signCount
    log_debug("❌ authenticatorData too short"); http_response_code(400); echo json_encode(['success'=>false,'message'=>'Bad authenticatorData']); exit;
}

$rpIdHash = substr($authData, 0, 32);
$flags    = ord($authData[32]);              // bit 0 UP, bit 2 UV, bit 6 AT, bit 7 ED
$signCnt  = unpack('N', substr($authData, 33, 4))[1]; // big-endian uint32

// check rpIdHash
$rpId = $_SERVER['HTTP_HOST'] ?? '';
$expectedRpHash = hash('sha256', $rpId, true);
if (!hash_equals($expectedRpHash, $rpIdHash)) {
    log_debug("❌ rpIdHash mismatch for rpId=$rpId");
    http_response_code(400); echo json_encode(['success'=>false,'message'=>'rpIdHash mismatch']); exit;
}

// optional: require user presence
if (($flags & 0x01) === 0) { // UP bit
    log_debug("❌ User Presence flag not set");
    http_response_code(400); echo json_encode(['success'=>false,'message'=>'User presence not verified']); exit;
}
log_debug("Flags=0x".dechex($flags)." signCount=".$signCnt);

// build signed data
$clientDataHash = hash('sha256', $clientDataJSON_raw, true);
$signedData = $authData . $clientDataHash;

// decode signature (WebAuthn sends DER ECDSA already)
$sig = b64u_dec($data['response']['signature']);

// verify
$pubKeyPem = $rec['publicKeyPem'];
$ok = openssl_verify($signedData, $sig, $pubKeyPem, OPENSSL_ALGO_SHA256);
if ($ok !== 1) {
    log_debug("❌ openssl_verify failed (code=$ok)");
    http_response_code(400); echo json_encode(['success'=>false,'message'=>'Signature verification failed']); exit;
}
log_debug("✅ Signature verified");

// sign count check (non-decreasing)
$prev = isset($rec['signCount']) ? (int)$rec['signCount'] : 0;
if ($signCnt !== 0 && $prev !== 0 && $signCnt < $prev) {
    log_debug("⚠ signCount decreased: prev=$prev new=$signCnt (possible cloned key)");
}
// persist new signCount
$rec['signCount'] = $signCnt;
$all[$idx] = $rec;
file_put_contents($storePath, json_encode($all, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo json_encode(['success'=>true,'message'=>'Authentication successful']);
log_debug("✅ Auth success");

// after signature verified and credential recognized
session_regenerate_id(true);

$_SESSION['user_id']       = $rec['userId'] ?? 'anonymous'; // or your real user
$_SESSION['credential_id'] = $data['id'];
$_SESSION['logged_in']     = true;
$_SESSION['login_time']    = time();

