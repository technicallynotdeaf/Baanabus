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
    $data   = getTasks();
    $now    = time();
    $active = array_filter($data['tasks'], fn($t) =>
        $t['status'] === 'active' && (!$t['snoozed_until'] || strtotime($t['snoozed_until']) <= $now)
    );

    // Suppress parent tasks while they still have active children
    $blockedParents = [];
    foreach ($active as $t) {
        if (!empty($t['parent_id'])) $blockedParents[(int)$t['parent_id']] = true;
    }

    return array_values(array_filter($active, fn($t) => !isset($blockedParents[(int)$t['id']])));
}

function vaultMarkComplete(int $taskId): array {
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
    $newBook = false;
    if ($data['pages'] >= 10) {
        $data['pages'] = 0;
        $data['books'] = ($data['books'] ?? 0) + 1;
        $newBook = true;
    }
    saveTasks($data);
    return [
        'pages'            => $data['pages'],
        'books'            => $data['books'],
        'newBook'          => $newBook,
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
    $data  = getInbox();
    $item  = ['id' => $data['next_id'], 'content' => $content, 'created_at' => date('c')];
    $data['items'][]  = $item;
    $data['next_id']++;
    saveInbox($data);
    return $item;
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

