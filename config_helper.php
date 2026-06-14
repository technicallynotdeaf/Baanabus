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
    $data = json_decode($plain, true) ?? _defaultTasks();
    $now  = time();
    $dirty = false;
    foreach ($data['tasks'] as &$t) {
        if (!empty($t['snoozed_until']) && strtotime($t['snoozed_until']) <= $now) {
            $t['snoozed_until'] = null;
            $dirty = true;
        }
    }
    unset($t);
    if ($dirty) saveTasks($data);
    return $data;
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

    $completedIds = [];
    foreach ($data['tasks'] as $t) {
        if ($t['status'] === 'complete') $completedIds[(int)$t['id']] = true;
    }

    $prereqsMet = fn($t) => empty($t['prereq_tasks']) ||
        !array_diff(array_map('intval', (array)$t['prereq_tasks']), array_keys($completedIds));

    $dayType = null;
    $physicalLocation = null;
    try {
        $entry   = getDiaryEntry(date('Y-m-d'));
        $dayType = isset($entry['day_type']) ? (int)$entry['day_type'] : null;
        // location = current physical location; falls back to day_type when not set
        $physicalLocation = isset($entry['location']) ? (int)$entry['location'] : $dayType;
    } catch (Throwable $e) {}

    // Location filtering: task 'location' field = where/how the task can be done.
    // Values: home, work, shops, phone, online, or null (anywhere).
    // 'context' is a planning tag (area of life) and is NOT used for filtering.
    $locationOk = function(array $t) use ($physicalLocation): bool {
        $loc = strtolower(trim($t['location'] ?? ''));
        if (!$loc || !$physicalLocation) return true;
        if ($physicalLocation === 1) return $loc !== 'work';
        if ($physicalLocation === 2) return !in_array($loc, ['home', 'shops'], true);
        if ($physicalLocation === 3) return !in_array($loc, ['work', 'home', 'shops', 'phone'], true);
        if ($physicalLocation === 5) return $loc !== 'shops';
        if ($physicalLocation === 6) return !in_array($loc, ['work', 'home', 'shops', 'phone'], true);
        return true; // Rest (4): no suppression
    };

    return array_values(array_filter($data['tasks'], fn($t) =>
        $t['status'] === 'active' &&
        empty($t['parent_id']) &&
        ($t['task_type'] ?? '') !== 'inbox' &&
        (!$t['snoozed_until'] || strtotime($t['snoozed_until']) <= $now) &&
        $prereqsMet($t) &&
        $locationOk($t)
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
    $taskUrgency   = null;
    $taskCreatedAt = null;
    $taskStuck     = false;
    $taskType      = null;
    foreach ($data['tasks'] as &$t) {
        if ((int)$t['id'] === $taskId) {
            $t['status']       = 'complete';
            $t['completed_at'] = date('c');
            $habiticaId        = $t['habitica_id']      ?? null;
            $habiticaItemId    = $t['habitica_item_id'] ?? null;
            $taskUrgency       = $t['urgency']           ?? null;
            $taskCreatedAt     = $t['created_at']        ?? null;
            $taskStuck         = !empty($t['stuck']);
            $taskType          = $t['task_type']         ?? null;
            $found             = true;
            break;
        }
    }
    unset($t);
    if (!$found) throw new Exception('Task not found');

    // Cascade-complete any active children when parent is marked done
    foreach ($data['tasks'] as &$child) {
        if ((int)($child['parent_id'] ?? 0) === $taskId && ($child['status'] ?? '') === 'active') {
            $child['status']       = 'complete';
            $child['completed_at'] = date('c');
        }
    }
    unset($child);

    $data['pages']       = ($data['pages']       ?? 0) + 1;
    $data['total_pages'] = ($data['total_pages'] ?? 0) + 1;
    $newStoryPage = false;
    if ($data['pages'] >= $target) {
        $data['pages'] = 0;
        $newStoryPage = true;
    }
    saveTasks($data);
    return [
        'pages'            => $data['pages'],
        'pages_target'     => $target,
        'total_pages'      => $data['total_pages'],
        'newStoryPage'     => $newStoryPage,
        'habitica_id'      => $habiticaId,
        'habitica_item_id' => $habiticaItemId,
        'task_urgency'     => $taskUrgency,
        'task_created_at'  => $taskCreatedAt,
        'task_stuck'       => $taskStuck,
        'task_type'        => $taskType,
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

// ---------- Diary vault ----------

function diaryPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/diary.enc";
}

function getDiary(): array {
    $path = diaryPath();
    if (!is_file($path)) return [];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Diary: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Diary decrypt failed');
    return json_decode($plain, true) ?? [];
}

function saveDiary(array $entries): void {
    $path = diaryPath();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    if (!extension_loaded('sodium')) throw new Exception('libsodium missing');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);
    $ct    = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(
        json_encode($entries, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        '', $nonce, $dek
    );
    @mkdir(dirname($path), 0700, true);
    file_put_contents($path, json_encode([
        'nonce' => base64_encode($nonce),
        'ct'    => base64_encode($ct),
    ], JSON_UNESCAPED_SLASHES), LOCK_EX);
    @chmod($path, 0600);
}

function getDiaryEntry(string $date): array {
    $entries = getDiary();
    return $entries[$date] ?? [];
}

function saveDiaryEntry(string $date, array $data): void {
    $entries        = getDiary();
    $existing       = $entries[$date] ?? [];
    $entries[$date] = array_merge($existing, array_filter($data, fn($v) => $v !== null));
    saveDiary($entries);
}

// ---------- Quotes vault ----------

function quotesPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/quotes.enc";
}

function getQuotes(): array {
    $path = quotesPath();
    if (!is_file($path)) return ['next_id' => 1, 'items' => []];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Quotes: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Quotes decrypt failed');
    return json_decode($plain, true) ?? ['next_id' => 1, 'items' => []];
}

function saveQuotes(array $data): void {
    $path = quotesPath();
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

function pickRandomQuote(): ?array {
    $data  = getQuotes();
    $items = $data['items'] ?? [];
    if (empty($items)) return null;
    return $items[array_rand($items)];
}

function addQuote(string $text): array {
    $data            = getQuotes();
    $item            = ['id' => $data['next_id'], 'text' => $text];
    $data['items'][] = $item;
    $data['next_id']++;
    saveQuotes($data);
    return $item;
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

// ---------- Food log vault ----------

function foodLogPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/food_log.enc";
}

function getFoodLog(): array {
    $path = foodLogPath();
    if (!is_file($path)) return ['next_id' => 1, 'entries' => []];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Food log: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Food log decrypt failed');
    return json_decode($plain, true) ?? ['next_id' => 1, 'entries' => []];
}

function saveFoodLog(array $data): void {
    $path = foodLogPath();
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

// Computes nutrient totals from vault entries + SQLite reference data.
// $log is the full getFoodLog() result; $from/$to are YYYY-MM-DD strings (inclusive).
function foodLogNutrientTotals(PDO $db, array $log, string $from, string $to): array {
    $keys = [
        'energy_kj', 'protein_g', 'fat_total_g', 'fat_saturated_g', 'fat_monounsaturated_g',
        'fat_polyunsaturated_g', 'fat_trans_g', 'cholesterol_mg', 'carbohydrate_g', 'sugars_g',
        'fibre', 'fibre_soluble', 'fibre_insoluble',
        'omega3_ala', 'omega3_epa', 'omega3_dha', 'omega6_la',
        'vitamin_a', 'retinol', 'vitamin_b1', 'vitamin_b2', 'vitamin_b3', 'vitamin_b5', 'vitamin_b6',
        'vitamin_b7', 'vitamin_b9', 'vitamin_b12', 'vitamin_c', 'vitamin_d', 'vitamin_e', 'vitamin_k', 'vitamin_k2',
        'choline', 'lutein_zeaxanthin',
        'calcium', 'copper', 'iodine', 'iron', 'magnesium', 'potassium', 'selenium', 'sodium', 'zinc',
    ];
    $totals = array_fill_keys($keys, 0.0);

    $allEntries = [];
    $cur = $from;
    while ($cur <= $to) {
        foreach ($log['entries'][$cur] ?? [] as $e) {
            if (!($e['is_writeoff'] ?? false)) $allEntries[] = $e;
        }
        $cur = date('Y-m-d', strtotime($cur . ' +1 day'));
    }
    if (!$allEntries) return $totals;

    $servingIds   = array_values(array_unique(array_column($allEntries, 'serving_id')));
    $placeholders = implode(',', array_fill(0, count($servingIds), '?'));
    $stmt = $db->prepare("
        SELECT fs.serving_id, fs.weight_g,
               f.energy_kj, f.protein_g, f.fat_total_g, f.fat_saturated_g,
               f.fat_monounsaturated_g, f.fat_polyunsaturated_g, f.fat_trans_g,
               f.cholesterol_mg, f.carbohydrate_g, f.sugars_g,
               f.fibre_g, f.fibre_soluble_g, f.fibre_insoluble_g,
               f.omega3_ala_mg, f.omega3_epa_mg, f.omega3_dha_mg, f.omega6_la_mg,
               f.vitamin_a_mcg, f.retinol_mcg, f.vitamin_b1_mg, f.vitamin_b2_mg, f.vitamin_b3_mg,
               f.vitamin_b5_mg, f.vitamin_b6_mg, f.vitamin_b7_mcg, f.folate_mcg, f.vitamin_b12_mcg,
               f.vitamin_c_mg, f.vitamin_d_mcg, f.vitamin_e_mg, f.vitamin_k_mcg, f.vitamin_k2_mcg,
               f.choline_mg, f.lutein_zeaxanthin_mcg,
               f.calcium_mg, f.phosphorus_mg, f.copper_mg, f.iodine_mcg, f.iron_mg,
               f.magnesium_mg, f.potassium_mg, f.selenium_mcg, f.sodium_mg, f.zinc_mg
        FROM food_servings fs JOIN foods f ON fs.food_id = f.food_id
        WHERE fs.serving_id IN ($placeholders)
    ");
    $stmt->execute($servingIds);
    $sd = [];
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $sd[(int)$row['serving_id']] = $row;
    }

    $map = [
        'energy_kj'             => 'energy_kj',
        'protein_g'             => 'protein_g',
        'fat_total_g'           => 'fat_total_g',
        'fat_saturated_g'       => 'fat_saturated_g',
        'fat_monounsaturated_g' => 'fat_monounsaturated_g',
        'fat_polyunsaturated_g' => 'fat_polyunsaturated_g',
        'fat_trans_g'           => 'fat_trans_g',
        'cholesterol_mg'        => 'cholesterol_mg',
        'carbohydrate_g'        => 'carbohydrate_g',
        'sugars_g'              => 'sugars_g',
        'fibre'                 => 'fibre_g',
        'fibre_soluble'         => 'fibre_soluble_g',
        'fibre_insoluble'       => 'fibre_insoluble_g',
        'omega3_ala'            => 'omega3_ala_mg',
        'omega3_epa'            => 'omega3_epa_mg',
        'omega3_dha'            => 'omega3_dha_mg',
        'omega6_la'             => 'omega6_la_mg',
        'vitamin_a'             => 'vitamin_a_mcg',
        'retinol'               => 'retinol_mcg',
        'vitamin_b1'            => 'vitamin_b1_mg',
        'vitamin_b2'            => 'vitamin_b2_mg',
        'vitamin_b3'            => 'vitamin_b3_mg',
        'vitamin_b5'            => 'vitamin_b5_mg',
        'vitamin_b6'            => 'vitamin_b6_mg',
        'vitamin_b7'            => 'vitamin_b7_mcg',
        'vitamin_b9'            => 'folate_mcg',
        'vitamin_b12'           => 'vitamin_b12_mcg',
        'vitamin_c'             => 'vitamin_c_mg',
        'vitamin_d'             => 'vitamin_d_mcg',
        'vitamin_e'             => 'vitamin_e_mg',
        'vitamin_k'             => 'vitamin_k_mcg',
        'vitamin_k2'            => 'vitamin_k2_mcg',
        'choline'               => 'choline_mg',
        'lutein_zeaxanthin'     => 'lutein_zeaxanthin_mcg',
        'calcium'               => 'calcium_mg',
        'phosphorus'            => 'phosphorus_mg',
        'copper'                => 'copper_mg',
        'iodine'                => 'iodine_mcg',
        'iron'                  => 'iron_mg',
        'magnesium'             => 'magnesium_mg',
        'potassium'             => 'potassium_mg',
        'selenium'              => 'selenium_mcg',
        'sodium'                => 'sodium_mg',
        'zinc'                  => 'zinc_mg',
    ];

    foreach ($allEntries as $e) {
        $s = $sd[(int)$e['serving_id']] ?? null;
        if (!$s) continue;
        $f = (float)$e['quantity'] * ((float)$s['weight_g'] / 100.0);
        foreach ($map as $key => $col) {
            $totals[$key] += $f * (float)($s[$col] ?? 0);
        }
    }
    return $totals;
}

// ---------- Recipes vault ----------

function recipesPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/recipes.enc";
}

function getRecipes(): array {
    $path = recipesPath();
    if (!is_file($path)) return ['next_id' => 1, 'recipes' => []];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Recipes: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Recipes decrypt failed');
    return json_decode($plain, true) ?? ['next_id' => 1, 'recipes' => []];
}

function saveRecipes(array $data): void {
    $path = recipesPath();
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

function getStoryProgress(string $storyId): array {
    $cfg      = getConfig() ?? [];
    $progress = $cfg['stories'][$storyId] ?? [];
    return [
        'pages_available' => (int)($progress['pages_available'] ?? 1),
        'depth'           => (int)($progress['depth']           ?? 0),
        'current_key'     => $progress['current_key']            ?? '1_start',
        'history'         => $progress['history']                ?? [],
        'ended'           => !empty($progress['ended']),
    ];
}

function saveStoryProgress(string $storyId, array $progress): void {
    $cfg = getConfig() ?? [];
    $cfg['stories'][$storyId] = $progress;
    saveConfig($cfg);
}

// ---------- Global story page pool ----------

function getGlobalStoryPages(): int {
    $cfg = getConfig() ?? [];
    return (int)($cfg['story_pages'] ?? 1);
}

function incrementGlobalStoryPages(): int {
    $cfg = getConfig() ?? [];
    $cfg['story_pages'] = (int)($cfg['story_pages'] ?? 1) + 1;
    saveConfig($cfg);
    return $cfg['story_pages'];
}

function decrementGlobalStoryPages(): int {
    $cfg = getConfig() ?? [];
    $cfg['story_pages'] = max(0, (int)($cfg['story_pages'] ?? 0) - 1);
    saveConfig($cfg);
    return $cfg['story_pages'];
}

// One-time migration: fold all per-story pages_available + pending into the global pool.
function migrateStoryPagesToGlobal(): void {
    $cfg = getConfig() ?? [];
    if (isset($cfg['story_pages'])) return;
    $max = (int)($cfg['pending_story_pages'] ?? 0);
    foreach (($cfg['stories'] ?? []) as $s) {
        $pa = (int)($s['pages_available'] ?? 1);
        if ($pa > $max) $max = $pa;
    }
    $cfg['story_pages'] = max(1, $max);
    saveConfig($cfg);
}

// Legacy stubs kept so nothing crashes if called during transition
function incrementStoryPages(string $storyId): int { return incrementGlobalStoryPages(); }
function getActiveStoryId(): ?string { $cfg = getConfig() ?? []; return isset($cfg['active_story_id']) ? (string)$cfg['active_story_id'] : null; }
function setActiveStoryId(string $storyId): void {}
function consumePendingStoryPages(string $storyId): void { migrateStoryPagesToGlobal(); }

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

// ---------- Dailies vault ----------

function dailiesPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/dailies.enc";
}

function getDailies(): array {
    $path = dailiesPath();
    if (!is_file($path)) return ['next_id' => 1, 'items' => [], 'completions' => [], 'sync_date' => null];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Dailies: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Dailies decrypt failed');
    return json_decode($plain, true) ?? ['next_id' => 1, 'items' => [], 'completions' => [], 'sync_date' => null];
}

function saveDailies(array $data): void {
    $path = dailiesPath();
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
        throw new Exception('Failed to write dailies.enc');
    }
    @chmod($path, 0600);
}

// Returns true if a daily definition is due on $date (YYYY-MM-DD).
function isDailyDueToday(array $daily, string $date = null): bool {
    if (!($daily['is_active'] ?? true)) return false;
    $date   = $date ?? date('Y-m-d');
    $freq   = $daily['frequency'] ?? 'daily';
    $everyX = max(1, (int)($daily['everyX'] ?? 1));

    if ($freq === 'daily') {
        if ($everyX <= 1) return true;
        $start    = $daily['start_date'] ?? '2026-01-01';
        $daysDiff = (int)round((strtotime($date) - strtotime($start)) / 86400);
        return $daysDiff >= 0 && $daysDiff % $everyX === 0;
    }

    if ($freq === 'weekly') {
        $repeat = $daily['repeat'] ?? [];
        // Habitica repeat keys: su m t w th f s
        $dowMap = [1 => 'm', 2 => 't', 3 => 'w', 4 => 'th', 5 => 'f', 6 => 's', 7 => 'su'];
        $key    = $dowMap[(int)date('N', strtotime($date))] ?? 'm';
        return (bool)($repeat[$key] ?? false);
    }

    return false; // monthly/yearly not yet supported
}

function markDailyComplete(int $id, string $date = null): void {
    $date = $date ?? date('Y-m-d');
    $data = getDailies();
    $done = array_map('intval', $data['completions'][$date] ?? []);
    if (!in_array($id, $done, true)) {
        $done[]                     = $id;
        $data['completions'][$date] = $done;
        saveDailies($data);
    }
}

// Returns the horizon for a daily item. Checks 'horizon' field first, then falls back to
// legacy 'morning' bool (true → morning, false → day). Default is 'day'.
function getDailyHorizon(array $d): string {
    if (isset($d['horizon'])) return $d['horizon'];
    if (isset($d['morning'])) return $d['morning'] ? 'morning' : 'day';
    return 'day';
}

// Returns incomplete morning-horizon dailies for today (used for the morning-mode CSS flag).
function getMorningModeDailies(): array {
    $today = date('Y-m-d');
    $data  = getDailies();
    $done  = array_map('intval', $data['completions'][$today] ?? []);
    return array_values(array_filter($data['items'], fn($d) =>
        getDailyHorizon($d) === 'morning' &&
        isDailyDueToday($d, $today) &&
        !in_array((int)$d['id'], $done, true)
    ));
}

// Returns all currently-unlocked incomplete dailies across horizons, ordered morning → day → evening.
// Day items unlock when morning is done, or after a 10am fallback (so a skipped morning
// doesn't block the whole day). Evening items unlock after show_after hour (default 19).
// Optional relevant_after / irrelevant_after (HH:MM) gate individual items by time of day.
// Timezone comes from date_default_timezone_set() in init.php — never hardcoded here.
function getActiveDailies(): array {
    $now     = new DateTime('now');
    $today   = $now->format('Y-m-d');
    $hour    = (int)$now->format('H');
    $timeStr = $now->format('H:i');
    $data    = getDailies();
    $done    = array_map('intval', $data['completions'][$today] ?? []);

    $dayType = null;
    $physicalLocation = null;
    try {
        $entry   = getDiaryEntry($today);
        $dayType = isset($entry['day_type']) ? (int)$entry['day_type'] : null;
        $physicalLocation = isset($entry['location']) ? (int)$entry['location'] : $dayType;
    } catch (Throwable $e) {}

    $locationOk = function(array $d) use ($physicalLocation): bool {
        $raw  = $d['location'] ?? null;
        $locs = is_array($raw) ? $raw : (is_string($raw) && $raw !== '' ? [$raw] : []);
        if (empty($locs) || !$physicalLocation) return true;
        $canDo = function(string $loc) use ($physicalLocation): bool {
            if ($physicalLocation === 1) return $loc !== 'work';
            if ($physicalLocation === 2) return !in_array($loc, ['home', 'shops'], true);
            if ($physicalLocation === 3) return !in_array($loc, ['work', 'home', 'shops', 'phone'], true);
            if ($physicalLocation === 5) return $loc !== 'shops';
            if ($physicalLocation === 6) return !in_array($loc, ['work', 'home', 'shops', 'phone'], true);
            return true; // Rest (4): no suppression
        };
        foreach ($locs as $loc) {
            if ($canDo(strtolower(trim($loc)))) return true;
        }
        return false;
    };

    $morningLeft = array_filter($data['items'], fn($d) =>
        getDailyHorizon($d) === 'morning' &&
        isDailyDueToday($d, $today) &&
        !in_array((int)$d['id'], $done, true)
    );
    $morningDone = empty($morningLeft);

    $hOrder = ['morning' => 0, 'day' => 1, 'evening' => 2];
    $active = array_values(array_filter($data['items'], function($d) use ($today, $done, $morningDone, $hour, $timeStr, $locationOk) {
        if (!isDailyDueToday($d, $today)) return false;
        if (in_array((int)$d['id'], $done, true)) return false;
        if (!$locationOk($d)) return false;
        if (!empty($d['relevant_after'])   && $timeStr <  $d['relevant_after'])   return false;
        if (!empty($d['irrelevant_after']) && $timeStr >= $d['irrelevant_after']) return false;
        $h = getDailyHorizon($d);
        if ($h === 'morning') return true;
        if ($h === 'day')     return $morningDone || $hour >= 10;
        if ($h === 'evening') return $hour >= (int)($d['show_after'] ?? 19);
        return false;
    }));

    usort($active, fn($a, $b) =>
        ($hOrder[getDailyHorizon($a)] ?? 1) <=> ($hOrder[getDailyHorizon($b)] ?? 1)
    );
    return $active;
}

// ---------- Badges ----------

function getBadgeDefinitions(): array {
    return [
        'first_task'   => ['name' => 'First Step',      'desc' => 'Complete your first task',                    'color' => '#e74c3c'],
        'task_10'      => ['name' => 'Getting Started',  'desc' => 'Complete 10 tasks',                           'color' => '#e67e22'],
        'task_50'      => ['name' => 'Momentum',         'desc' => 'Complete 50 tasks',                           'color' => '#f1c40f'],
        'task_100'     => ['name' => 'Centurion',         'desc' => 'Complete 100 tasks',                          'color' => '#c0a030'],
        'inbox_clear'  => ['name' => 'Clear Desk',        'desc' => 'Have an empty inbox',                         'color' => '#2ecc71'],
        'trivia_10'    => ['name' => 'Quiz Night',         'desc' => '10 trivia questions answered correctly',      'color' => '#3498db'],
        'story_start'  => ['name' => 'Once Upon a Time',  'desc' => 'Read the first page of The Chai Meridian',    'color' => '#9b59b6'],
        'story_deep'   => ['name' => 'Turning the Page',  'desc' => 'Make 5 choices in The Chai Meridian',         'color' => '#e91e63'],
    ];
}

function checkAndAwardBadges(): array {
    global $database;
    $config  = getConfig() ?? [];
    $earned  = $config['badges'] ?? [];
    $changed = false;

    $award = function (string $id) use (&$earned, &$changed): void {
        if (!isset($earned[$id])) { $earned[$id] = date('c'); $changed = true; }
    };

    try {
        $tasks      = getTasks();
        $total      = (int)($tasks['total_pages'] ?? 0);
        $inboxCount = count(array_filter($tasks['tasks'], fn($t) =>
            ($t['status'] ?? '') === 'active' &&
            ($t['task_type'] ?? '') === 'inbox' &&
            empty($t['parent_id'])
        ));
        if ($total >= 1)   $award('first_task');
        if ($total >= 10)  $award('task_10');
        if ($total >= 50)  $award('task_50');
        if ($total >= 100) $award('task_100');
        if ($inboxCount === 0 && $total >= 1) $award('inbox_clear');
    } catch (Throwable $e) {}

    try {
        $prog = getStoryProgress('q1');
        if ($prog['depth'] >= 1) $award('story_start');
        if ($prog['depth'] >= 5) $award('story_deep');
    } catch (Throwable $e) {}

    if ($database) {
        try {
            $stmt    = $database->query('SELECT COUNT(*) FROM question_seen WHERE correct_count > 0');
            $correct = (int)$stmt->fetchColumn();
            if ($correct >= 10) $award('trivia_10');
        } catch (Throwable $e) {}
    }

    if ($changed) {
        $config['badges'] = $earned;
        saveConfig($config);
    }

    return $earned;
}

// ---------- Physical objects vault ----------

function physicalObjectsPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/physical_objects.enc";
}

function _defaultPhysicalObjects(): array {
    return [
        'next_id'         => 1,
        'objects'         => [],
        'rooms'           => [
            ['id' => 1, 'name' => 'livingroom', 'label' => 'Living Room'],
        ],
        'room_scan_dates' => [],
    ];
}

function getPhysicalObjects(): array {
    $path = physicalObjectsPath();
    if (!is_file($path)) return _defaultPhysicalObjects();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('physical_objects: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('physical_objects decrypt failed');
    return json_decode($plain, true) ?? _defaultPhysicalObjects();
}

function savePhysicalObjects(array $data): void {
    $path = physicalObjectsPath();
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
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
        throw new Exception('Failed to write physical_objects.enc');
    }
    @chmod($path, 0600);
}

function addPhysicalObject(string $label, string $location = '', ?int $roomId = null): array {
    $data = getPhysicalObjects();
    $id   = (int)($data['next_id'] ?? 1);
    $data['objects'][] = [
        'id'         => $id,
        'label'      => $label,
        'location'   => $location !== '' ? $location : null,
        'room_id'    => $roomId,
        'task_id'    => null,
        'status'     => 'out',
        'created_at' => date('c'),
    ];
    $data['next_id'] = $id + 1;
    savePhysicalObjects($data);
    return $data;
}

// ─── Cycle phase ─────────────────────────────────────────────────────────────

function getCyclePhase(): ?array {
    $cfg = getConfig() ?? [];
    $pt  = $cfg['period_tracking'] ?? [];
    if (empty($pt['enabled']) || empty($pt['lmp'])) return null;

    $min = (int)($pt['cycle_min'] ?? 28);
    $max = (int)($pt['cycle_max'] ?? 28);
    $avg = max(14, min(60, (int)round(($min + $max) / 2)));

    try {
        $elapsed = (int)(new DateTime($pt['lmp']))->diff(new DateTime(date('Y-m-d')))->days;
    } catch (Throwable $e) {
        return null;
    }

    $day = ($elapsed % $avg) + 1;

    // Ovulation estimated at cycle_length − 14; clamped so it falls after bleeding.
    $ov         = max(5, $avg - 14);
    $greenStart = max(5, $ov - 2); // 2 days before ovulation
    $greenEnd   = $ov + 2;         // 2 days after ovulation (5-day window)

    if ($day <= 4)
        return ['phase' => 'bleeding',     'label' => 'Bleeding',     'colour' => '#e74c3c', 'day' => $day, 'cycle_length' => $avg];
    if ($greenStart > 5 && $day < $greenStart)
        return ['phase' => 'follicular',   'label' => 'Follicular',   'colour' => '#f0ad00', 'day' => $day, 'cycle_length' => $avg];
    if ($day <= $greenEnd)
        return ['phase' => 'ovulatory',    'label' => 'Ovulatory',    'colour' => '#2ecc71', 'day' => $day, 'cycle_length' => $avg];
    return     ['phase' => 'luteal',       'label' => 'Luteal',       'colour' => '#3498db', 'day' => $day, 'cycle_length' => $avg];
}

// Returns phase arc definitions [{colour, startDay, endDay}] matching getCyclePhase() boundaries.
// Zero-length phases omitted.
function getCyclePhases(int $avg): array {
    $ov         = max(5, $avg - 14);
    $greenStart = max(5, $ov - 2);
    $greenEnd   = min($ov + 2, $avg);
    $blueStart  = max(5, $greenEnd + 1);

    $phases = [];
    $phases[] = ['colour' => '#e74c3c', 'startDay' => 1,          'endDay' => 4];
    if ($greenStart > 5)
        $phases[] = ['colour' => '#f0ad00', 'startDay' => 5,       'endDay' => $greenStart - 1];
    if ($greenEnd >= $greenStart)
        $phases[] = ['colour' => '#2ecc71', 'startDay' => $greenStart, 'endDay' => $greenEnd];
    if ($avg >= $blueStart)
        $phases[] = ['colour' => '#3498db', 'startDay' => $blueStart,  'endDay' => $avg];
    return $phases;
}

