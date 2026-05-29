<?php

#define('CONFIG_FILE', __DIR__ . '\config.json');


function getConfig() {
    $p = getConfigPaths();
    if (!file_exists($p['enc'])) {
        // nothing exists yet — handle setup elsewhere
        attemptCreateConfigWithPRF($p);
        return null;
    }

    if (empty($_SESSION['DEK'])) {
        throw new Exception('Vault locked');
    }

    $dek = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob = json_decode(file_get_contents($p['enc']), true);
    $nonce = base64_decode($blob['nonce']);
    $ct    = base64_decode($blob['ct']);
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    return json_decode($plain, true);
}

function attemptCreateConfigWithPRF(array $paths) {
    // check if current passkey supports PRF
    if (!($_SESSION['has_prf_support'] ?? false)) {
        // fallback: prompt user later for a passphrase
        return false;
    }

    $dek = random_bytes(32);
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $dummyConfig = json_encode(['created' => date('c')]);

    // encrypt dummy config
    $ct = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($dummyConfig, '', $nonce, $dek);
    file_put_contents($paths['enc'], json_encode(['nonce'=>base64_encode($nonce),'ct'=>base64_encode($ct)]));

    // wrap DEK with PRF key later (once the client sends it)
    $_SESSION['DEK'] = rtrim(strtr(base64_encode($dek), '+/', '-_'), '=');
    return true;
}

function saveConfig(array $data): void {
    $paths = getConfigPaths();

    if (empty($_SESSION['DEK'])) {
        throw new Exception('Vault is locked — no DEK in session');
    }

    if (!extension_loaded('sodium')) {
        throw new Exception('libsodium extension missing');
    }

    $dek = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);

    $plaintext = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $ciphertext = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($plaintext, '', $nonce, $dek);

    $payload = [
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ciphertext),
    ];

    $cfgBase = $paths['base'];
    @mkdir($cfgBase, 0700, true);

    if (file_put_contents($paths['enc'], json_encode($payload, JSON_UNESCAPED_SLASHES), LOCK_EX) === false) {
        throw new Exception('Failed to write encrypted config');
    }

    @chmod($paths['enc'], 0600);
}



function sess() { if (session_status()!==PHP_SESSION_ACTIVE) session_start(); }

function b64u_enc($s){ return rtrim(strtr(base64_encode($s),'+/','-_'),'='); }
function b64u_dec($s){ return base64_decode(strtr($s.'===','-_','+/')); }

function getConfigPaths(): array {
  sess();
  $uid = preg_replace('/[^A-Za-z0-9_\-]/','_', $_SESSION['user_id'] ?? 'default');
  $base = __DIR__."/config/$uid";
  $wraps = "$base/wraps";
  @mkdir($wraps,0700,true);

    return [
        'base'  => $base,
        'wraps' => $wraps,
        'enc'   => "$base/config.enc",
        'pass'  => "$wraps/passphrase.json",
    ];
}

function isAuthenticated(): bool { sess(); return !empty($_SESSION['is_authenticated']); }
function isUnlocked(): bool { sess(); return !empty($_SESSION['DEK']); }

function authenticateAgentKey(string $token): bool {
    if (strncmp($token, 'bsk_', 4) !== 0) return false;
    if (!extension_loaded('sodium')) return false;
    $indexPath = __DIR__ . '/data/apikeys.json';
    if (!file_exists($indexPath)) return false;
    $index = json_decode(file_get_contents($indexPath), true) ?? [];
    $hash  = hash('sha256', $token);
    if (!isset($index[$hash])) return false;
    $entry  = $index[$hash];
    $uid    = preg_replace('/[^A-Za-z0-9_\-]/', '_', $entry['user_id']);
    $keyId  = preg_replace('/[^A-Za-z0-9_\-]/', '_', $entry['key_id']);
    $wrapPath = __DIR__ . "/config/$uid/apikeys/$keyId.json";
    if (!file_exists($wrapPath)) return false;
    $wrap  = json_decode(file_get_contents($wrapPath), true) ?? [];
    $nonce = base64_decode($wrap['nonce'] ?? '');
    $ct    = base64_decode($wrap['ct']    ?? '');
    if (!$nonce || !$ct) return false;
    $kek = substr(hash('sha256', $token, true), 0, 32);
    $dek = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $kek);
    if ($dek === false) return false;
    sess();
    $_SESSION['DEK']              = b64u_enc($dek);
    $_SESSION['user_id']          = $entry['user_id'];
    $_SESSION['is_authenticated'] = true;
    return true;
}

function vaultExists(): bool {
  $p = getConfigPaths();
  return is_file($p['enc']);
}
function hasPassphraseWrap(): bool {
  $p = getConfigPaths();
  return is_file($p['pass']);
}
function hasPrfWrap(): bool {
  sess();
  $p      = getConfigPaths();
  $uid    = preg_replace('/[^A-Za-z0-9_\-]/','_', $_SESSION['user_id'] ?? 'default');
  $credId = preg_replace('/[^A-Za-z0-9_\-]/','_', $_SESSION['credential_id'] ?? $uid);
  return is_file($p['wraps']."/cred_{$credId}.json") || is_file($p['wraps']."/cred_{$uid}.json");
}

/* One-call status for UI */
function vaultStatus(): array {
  $onboarding = false;
  if (isUnlocked()) {
    try { $cfg = getConfig(); $onboarding = !empty($cfg['onboarding_complete']); } catch (\Throwable $e) {}
  }
  return [
    'authenticated'      => isAuthenticated(),
    'exists'             => vaultExists(),
    'unlocked'           => isUnlocked(),
    'hasPass'            => hasPassphraseWrap(),
    'hasPrf'             => hasPrfWrap(),
    'onboarding_complete' => $onboarding,
  ];
}

function bootstrapVaultWithPrf(string $prfKeyB64u, array $paths): void {
    if (!extension_loaded('sodium')) throw new Exception('libsodium missing');
    $dek   = random_bytes(32);
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $plain = json_encode(['created' => date('c'), 'nickname' => 'Alison'], JSON_UNESCAPED_SLASHES);
    $ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($plain, '', $nonce, $dek);
    @mkdir($paths['base'], 0700, true);
    file_put_contents($paths['enc'], json_encode([
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ct),
    ], JSON_UNESCAPED_SLASHES), LOCK_EX);
    wrapDekWithPrf($dek, $prfKeyB64u, $paths);
    $_SESSION['DEK'] = b64u_enc($dek);
}

function unlockWithPrf(string $prfKeyB64u, array $paths): void {
    $uid    = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    $credId = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['credential_id'] ?? $uid);

    // Try per-credential wrap first, fall back to legacy per-user wrap
    $wrapPath = $paths['wraps'] . "/cred_{$credId}.json";
    if (!is_file($wrapPath)) {
        $legacy = $paths['wraps'] . "/cred_{$uid}.json";
        if (is_file($legacy)) {
            $wrapPath = $legacy;
        } else {
            throw new Exception('No PRF wrap for this credential');
        }
    }

    $meta  = json_decode(file_get_contents($wrapPath), true) ?: [];
    $kek   = b64u_dec($prfKeyB64u);
    $nonce = base64_decode($meta['nonce'] ?? '');
    $ct    = base64_decode($meta['ct'] ?? '');
    if (!$nonce || !$ct) throw new Exception('Invalid PRF wrap format');
    $dek = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $kek);
    if ($dek === false) throw new Exception('PRF unwrap failed — wrong key or corrupted wrap');
    $_SESSION['DEK'] = b64u_enc($dek);
}

function wrapDekWithPrf(string $dek, string $prfKeyB64u, array $paths, ?string $credIdOverride = null): void {
    if (!extension_loaded('sodium')) throw new Exception('libsodium missing');
    $kek   = b64u_dec($prfKeyB64u);
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($dek, '', $nonce, $kek);
    @mkdir($paths['wraps'], 0700, true);
    $uid    = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    $credId = $credIdOverride
        ? preg_replace('/[^A-Za-z0-9_\-]/', '_', $credIdOverride)
        : preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['credential_id'] ?? $uid);
    file_put_contents($paths['wraps'] . "/cred_{$credId}.json", json_encode([
        'type'  => 'prf',
        'alg'   => 'xchacha20',
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ct),
    ], JSON_UNESCAPED_SLASHES), LOCK_EX);
}

// ---------- Tasks vault ----------

function tasksPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/tasks.enc";
}

function _defaultTasks(): array {
    $now = date('c');
    return [
        'next_id' => 6,
        'pages'   => 0,
        'books'   => 0,
        'tasks'   => [
            ['id'=>1,'title'=>'Do one thing that makes tomorrow easier',          'urgency'=>'low','energy'=>'low',   'status'=>'active','snoozed_until'=>null,'created_at'=>$now],
            ['id'=>2,'title'=>'Write down three things that went well today',      'urgency'=>'low','energy'=>'low',   'status'=>'active','snoozed_until'=>null,'created_at'=>$now],
            ['id'=>3,'title'=>'Message one person you have not spoken to lately',  'urgency'=>'low','energy'=>'medium','status'=>'active','snoozed_until'=>null,'created_at'=>$now],
            ['id'=>4,'title'=>'Spend 10 minutes tidying your space',               'urgency'=>'low','energy'=>'low',   'status'=>'active','snoozed_until'=>null,'created_at'=>$now],
            ['id'=>5,'title'=>'Review your task list and pick the easiest win',    'urgency'=>'low','energy'=>'low',   'status'=>'active','snoozed_until'=>null,'created_at'=>$now],
        ],
    ];
}

function getTasks(): array {
    $path = tasksPath();
    if (!is_file($path)) return _defaultTasks();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Tasks: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Tasks decrypt failed');
    return json_decode($plain, true) ?? _defaultTasks();
}

function saveTasks(array $data): void {
    $path = tasksPath();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    if (!extension_loaded('sodium')) throw new Exception('libsodium missing');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(
        json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        '', $nonce, $dek
    );
    @mkdir(dirname($path), 0700, true);
    if (file_put_contents($path, json_encode([
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ct),
    ], JSON_UNESCAPED_SLASHES), LOCK_EX) === false) {
        throw new Exception('Failed to write tasks.enc');
    }
    @chmod($path, 0600);
}

function getDoableTasks(): array {
    $data = getTasks();
    $now  = time();
    // Children surface inside their parent's block — never as standalone tasks.
    // Inbox-typed tasks are untriaged and not yet doable; they surface as triage questions instead.
    return array_values(array_filter($data['tasks'], fn($t) =>
        $t['status'] === 'active' &&
        empty($t['parent_id']) &&
        ($t['task_type'] ?? '') !== 'inbox' &&
        (!$t['snoozed_until'] || strtotime($t['snoozed_until']) <= $now)
    ));
}

function getInboxTasks(): array {
    $data = getTasks();
    $now  = time();
    return array_values(array_filter($data['tasks'], fn($t) =>
        $t['status'] === 'active' &&
        ($t['task_type'] ?? '') === 'inbox' &&
        empty($t['parent_id']) &&
        (!$t['snoozed_until'] || strtotime($t['snoozed_until']) <= $now)
    ));
}

function vaultUpdateTask(int $taskId, array $fields): void {
    $data  = getTasks();
    $found = false;
    foreach ($data['tasks'] as &$t) {
        if ((int)$t['id'] === $taskId) {
            foreach ($fields as $k => $v) $t[$k] = $v;
            $found = true;
            break;
        }
    }
    unset($t);
    if (!$found) throw new Exception('Task not found');
    saveTasks($data);
}

function vaultMarkComplete(int $taskId, int $target = 15): array {
    $data           = getTasks();
    $found          = false;
    $habiticaId     = null;
    $habiticaItemId = null;
    foreach ($data['tasks'] as &$t) {
        if ((int)$t['id'] === $taskId) {
            $t['status']       = 'complete';
            $t['completed_at'] = date('c');
            $habiticaId        = $t['habitica_id']      ?? null;
            $habiticaItemId    = $t['habitica_item_id'] ?? null;
            $found             = true;
            break;
        }
    }
    unset($t);
    if (!$found) throw new Exception('Task not found');

    $data['pages'] = ($data['pages'] ?? 0) + 1;
    $newStoryPage = false;
    if ($data['pages'] >= $target) {
        $data['pages'] = 0;
        $newStoryPage = true;
    }
    saveTasks($data);
    return [
        'pages'            => $data['pages'],
        'pages_target'     => $target,
        'newStoryPage'     => $newStoryPage,
        'habitica_id'      => $habiticaId,
        'habitica_item_id' => $habiticaItemId,
    ];
}

// ---------- Inbox vault ----------

function inboxPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/inbox.enc";
}

function getInbox(): array {
    $path = inboxPath();
    if (!is_file($path)) return ['next_id' => 1, 'items' => []];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Inbox: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Inbox decrypt failed');
    return json_decode($plain, true) ?? ['next_id' => 1, 'items' => []];
}

function saveInbox(array $data): void {
    $path = inboxPath();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    if (!extension_loaded('sodium')) throw new Exception('libsodium missing');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(
        json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        '', $nonce, $dek
    );
    @mkdir(dirname($path), 0700, true);
    file_put_contents($path, json_encode([
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ct),
    ], JSON_UNESCAPED_SLASHES), LOCK_EX);
    @chmod($path, 0600);
}

function addToInbox(string $content): array {
    $data            = getInbox();
    $item            = ['id' => $data['next_id'], 'content' => $content, 'created_at' => date('c')];
    $data['items'][] = $item;
    $data['next_id']++;
    saveInbox($data);
    return $data;
}

// ---------- People vault ----------

function peoplePath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/people.enc";
}

function getPeople(): array {
    $path = peoplePath();
    if (!is_file($path)) return ['next_id' => 1, 'people' => []];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('People: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('People decrypt failed');
    return json_decode($plain, true) ?? ['next_id' => 1, 'people' => []];
}

function savePeople(array $data): void {
    $path = peoplePath();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    if (!extension_loaded('sodium')) throw new Exception('libsodium missing');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(
        json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        '', $nonce, $dek
    );
    @mkdir(dirname($path), 0700, true);
    if (file_put_contents($path, json_encode([
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ct),
    ], JSON_UNESCAPED_SLASHES), LOCK_EX) === false) {
        throw new Exception('Failed to write people.enc');
    }
    @chmod($path, 0600);
}

// ---------- People notes vault ----------

function peopleNotesPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/people_notes.enc";
}

function getPeopleNotes(): array {
    $path = peopleNotesPath();
    if (!is_file($path)) return ['next_id' => 1, 'notes' => []];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('People notes: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('People notes decrypt failed');
    return json_decode($plain, true) ?? ['next_id' => 1, 'notes' => []];
}

function savePeopleNotes(array $data): void {
    $path = peopleNotesPath();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    if (!extension_loaded('sodium')) throw new Exception('libsodium missing');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(
        json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        '', $nonce, $dek
    );
    @mkdir(dirname($path), 0700, true);
    if (file_put_contents($path, json_encode([
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ct),
    ], JSON_UNESCAPED_SLASHES), LOCK_EX) === false) {
        throw new Exception('Failed to write people_notes.enc');
    }
    @chmod($path, 0600);
}

function vaultUpdatePerson(int $personId, array $fields): void {
    $data  = getPeople();
    $found = false;
    foreach ($data['people'] as &$p) {
        if ((int)$p['person_id'] === $personId) {
            foreach ($fields as $k => $v) $p[$k] = $v;
            $found = true;
            break;
        }
    }
    unset($p);
    if (!$found) throw new Exception('Person not found');
    savePeople($data);
}

function vaultAddPeopleNote(int $personId, string $contents): int {
    $data   = getPeopleNotes();
    $noteId = (int)($data['next_id'] ?? 1);
    $data['notes'][] = [
        'note_id'    => $noteId,
        'person_id'  => $personId,
        'contents'   => $contents,
        'date_added' => date('Y-m-d H:i:s'),
    ];
    $data['next_id'] = $noteId + 1;
    savePeopleNotes($data);
    return $noteId;
}

// ---------- Story progress (stored in config.enc under config['stories'][$id]) ----------

function getStoryProgress(int $storyId): array {
    $cfg      = getConfig() ?? [];
    $progress = $cfg['stories'][$storyId] ?? [];
    return [
        'pages_available' => (int)($progress['pages_available'] ?? 1),
        'depth'           => (int)($progress['depth']           ?? 0),
        'current_key'     => $progress['current_key']            ?? '1_start',
    ];
}

function saveStoryProgress(int $storyId, array $progress): void {
    $cfg = getConfig() ?? [];
    $cfg['stories'][$storyId] = $progress;
    saveConfig($cfg);
}

function incrementStoryPages(int $storyId): int {
    $p = getStoryProgress($storyId);
    $p['pages_available']++;
    saveStoryProgress($storyId, $p);
    return $p['pages_available'];
}

// ---------- Cassowary vault (API keys / integration secrets) ----------

function cassowaryPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/cassowary.enc";
}

function getCassowary(): array {
    $path = cassowaryPath();
    if (!is_file($path)) return [];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Cassowary: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Cassowary decrypt failed');
    return json_decode($plain, true) ?? [];
}

function saveCassowary(array $data): void {
    $path = cassowaryPath();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault is locked');
    if (!extension_loaded('sodium')) throw new Exception('libsodium extension missing');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(
        json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        '', $nonce, $dek
    );
    @mkdir(dirname($path), 0700, true);
    if (file_put_contents($path, json_encode([
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ct),
    ], JSON_UNESCAPED_SLASHES), LOCK_EX) === false) {
        throw new Exception('Failed to write cassowary.enc');
    }
    @chmod($path, 0600);
}

