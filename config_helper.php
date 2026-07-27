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

// Reads the non-personal task_fields registry from SQLite: field name -> default
// value to backfill with when a task record predates that field. '[]'/'false' are
// decoded to their real PHP types; everything else (incl. actual NULL) stays null.
function taskFieldDefaults(): array {
    global $database;
    if (!$database) return [];
    static $cache = null;
    if ($cache !== null) return $cache;
    $cache = [];
    try {
        foreach ($database->query("SELECT field_name, default_value FROM task_fields") as $row) {
            $v = $row['default_value'];
            $cache[$row['field_name']] = $v === '[]' ? [] : ($v === 'false' ? false : ($v === 'true' ? true : $v));
        }
    } catch (Throwable $e) {}
    return $cache;
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
    $today = date('Y-m-d');
    $fieldDefaults = taskFieldDefaults();
    foreach ($data['tasks'] as &$t) {
        if (!empty($t['snoozed_until']) && strtotime($t['snoozed_until']) <= $now) {
            $t['snoozed_until'] = null;
            if (empty($t['woke_date'])) $t['woke_date'] = $today;
            $dirty = true;
        }
        foreach ($fieldDefaults as $field => $default) {
            if (!array_key_exists($field, $t)) {
                $t[$field] = $default;
                $dirty = true;
            }
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

// ---------- subtask linking ----------
// parent_id on the child is the source of truth; subtask_ids on the parent is a
// materialised reverse index kept in sync here so subtasks can be found from
// either side without scanning every task. Callers should route all
// subtask creation/reparenting/deletion through these so the two never drift.

// Append a newly-built task to $data['tasks'] and link it into its parent's
// subtask_ids if it has a parent_id. Operates on $data in memory — caller saves.
function vaultAppendTask(array &$data, array $task): void {
    $task['subtask_ids'] = $task['subtask_ids'] ?? [];
    $data['tasks'][] = $task;
    if (!empty($task['parent_id'])) {
        vaultLinkSubtask($data, (int)$task['parent_id'], (int)$task['id']);
    }
}

function vaultLinkSubtask(array &$data, int $parentId, int $childId): void {
    foreach ($data['tasks'] as &$p) {
        if ((int)$p['id'] === $parentId) {
            $ids = $p['subtask_ids'] ?? [];
            if (!in_array($childId, $ids, true)) $ids[] = $childId;
            $p['subtask_ids'] = $ids;
            break;
        }
    }
    unset($p);
}

function vaultUnlinkSubtask(array &$data, int $parentId, int $childId): void {
    foreach ($data['tasks'] as &$p) {
        if ((int)$p['id'] === $parentId) {
            $p['subtask_ids'] = array_values(array_diff($p['subtask_ids'] ?? [], [$childId]));
            break;
        }
    }
    unset($p);
}

// Awards one pip toward today's story-page target — the same mechanic
// api/earn_pip.php exposes for completed activities, reused here so
// organization work (see top3CreditFieldTransitions) raises level progress too.
function awardPip(): array {
    $target       = todayPagesTarget();
    $data         = getTasks();
    $data['pages']       = ($data['pages']       ?? 0) + 1;
    $data['total_pages'] = ($data['total_pages'] ?? 0) + 1;
    $newStoryPage = false;
    if ($data['pages'] >= $target) {
        $data['pages'] = 0;
        $newStoryPage  = true;
    }
    saveTasks($data);
    if ($newStoryPage) {
        try { incrementStoryPages(1); } catch (Throwable $e) { error_log('awardPip: incrementStoryPages failed: ' . $e->getMessage()); }
    }
    return ['pages' => $data['pages'], 'pages_target' => $target, 'total_pages' => $data['total_pages'], 'newStoryPage' => $newStoryPage];
}

// Returns any Top 3 jars completed as a side effect of this edit (see
// top3CreditFieldTransitions), so callers can surface a positive-feedback
// moment. Safe to ignore — most existing callers do.
function vaultUpdateTask(int $taskId, array $fields): array {
    $data  = getTasks();
    $found = false;
    $oldParentId = null;
    $before = null;
    foreach ($data['tasks'] as &$t) {
        if ((int)$t['id'] === $taskId) {
            $oldParentId = $t['parent_id'] ?? null;
            $before      = $t;
            foreach ($fields as $k => $v) $t[$k] = $v;
            $found = true;
            break;
        }
    }
    unset($t);
    if (!$found) throw new Exception('Task not found');

    // Keep subtask_ids in sync when a subtask is reparented or deleted
    $newParentId   = array_key_exists('parent_id', $fields) ? $fields['parent_id'] : $oldParentId;
    $parentChanged = (int)($newParentId ?? 0) !== (int)($oldParentId ?? 0);
    $becameDeleted = ($fields['status'] ?? null) === 'deleted';
    if ($oldParentId && ($parentChanged || $becameDeleted)) {
        vaultUnlinkSubtask($data, (int)$oldParentId, $taskId);
    }
    if ($parentChanged && !$becameDeleted && !empty($newParentId)) {
        vaultLinkSubtask($data, (int)$newParentId, $taskId);
    }

    saveTasks($data);

    // Top 3: this is the single choke point for every field edit path (triage,
    // task_action, schedule_task, the agent API), so credit transitions here
    // rather than at each call site. Same choke point also awards a level-progress
    // pip for organization work (fill_info/calendar_set/inbox_triage/declutter),
    // so tidying tasks up counts toward story-page progress, not just completing them.
    try {
        $completed = top3CreditFieldTransitions($before, $fields);
    } catch (Throwable $e) {
        $completed = [];
    }
    $pip = null;
    if (!empty($completed)) {
        try { $pip = awardPip(); } catch (Throwable $e) {}
    }
    return ['top3_completed' => $completed, 'pip' => $pip];
}

// Detects the specific before/after transitions Top 3 cares about and credits
// the matching category. $before is the full task row prior to the edit;
// $fields is only the changed keys that were just applied. Returns the merged
// list of newly-completed jars ([{label, points}, ...]).
function top3CreditFieldTransitions(?array $before, array $fields): array {
    if (!$before) return [];
    $completed = [];

    foreach (['urgency', 'importance', 'energy', 'context'] as $f) {
        if (array_key_exists($f, $fields) && empty($before[$f]) && trim((string)$fields[$f]) !== '' && trim((string)$fields[$f]) !== ' ') {
            $completed = array_merge($completed, creditTop3Progress('fill_info', 1));
        }
    }

    foreach (['deadline', 'scheduled_date'] as $f) {
        if (array_key_exists($f, $fields) && empty($before[$f]) && !empty($fields[$f])) {
            $completed = array_merge($completed, creditTop3Progress('calendar_set', 1));
        }
    }

    $oldType = $before['task_type'] ?? null;
    $newType = array_key_exists('task_type', $fields) ? $fields['task_type'] : $oldType;
    $inboxAffected = false;
    if ($oldType === 'inbox' && $newType !== 'inbox') {
        $completed = array_merge($completed, creditTop3Progress('inbox_triage', 1));
        $inboxAffected = true;
    }
    if (in_array($newType, ['someday', 'waiting'], true) && $newType !== $oldType) {
        $completed = array_merge($completed, creditTop3Progress('declutter', 1));
    }
    if (array_key_exists('status', $fields) && $fields['status'] === 'deleted' && ($before['status'] ?? null) !== 'deleted') {
        $completed = array_merge($completed, creditTop3Progress('declutter', 1));
        $inboxAffected = $inboxAffected || $oldType === 'inbox';
    }
    if ($inboxAffected) {
        try {
            $val = top3RecomputeValue('inbox_zero');
            if ($val !== null) $completed = array_merge($completed, creditTop3Progress('inbox_zero', $val));
        } catch (Throwable $e) {}
    }

    return $completed;
}

// Shared field-update path for both the agent API (Bearer auth) and the browser
// session (cookie auth) — filters to the allowed set, saves, and pushes updated
// metadata to Habitica notes when a synced field changes. Throws on bad input.
function updateTaskFieldsShared(int $taskId, array $rawFields): array {
    $allowed = ['urgency', 'importance', 'snoozed_until', 'deadline', 'context', 'location', 'task_type',
                'energy', 'time', 'prereq_tasks', 'status', 'title', 'description', 'tags', 'parent_id', 'goal_id'];
    $fields  = array_intersect_key($rawFields, array_flip($allowed));
    if (!$fields) throw new Exception('No valid fields to update');

    vaultUpdateTask($taskId, $fields);

    $metaFields = ['urgency', 'importance', 'context', 'task_type', 'location', 'snoozed_until'];
    if (array_intersect_key($fields, array_flip($metaFields))) {
        try {
            $cfg = getConfig() ?? [];
            if (!empty($cfg['preferences']['uses_habitica'])) {
                $allData = getTasks();
                foreach ($allData['tasks'] as $t) {
                    if ((int)$t['id'] !== $taskId) continue;
                    if (empty($t['habitica_id']) || !empty($t['habitica_item_id'])) break;
                    require_once __DIR__ . '/api/habitica_helper.php';
                    $cass    = getCassowary();
                    $habUser = $cass['habitica']['user_id'] ?? '';
                    $habKey  = $cass['habitica']['api_key']  ?? '';
                    if ($habUser && $habKey) habiticaPushNotes($t['habitica_id'], $t, $habUser, $habKey);
                    break;
                }
            }
        } catch (Throwable $e) {}
    }

    return $fields;
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

// ---------- Goals vault ----------
// Personal outcome/goal records that tasks can link to via task.goal_id.
// Deliberately minimal: {id, title, created_at}. Not a life-area tag (that's
// context) — a goal is a specific outcome a task moves you toward.

function goalsPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/goals.enc";
}

function getGoals(): array {
    $path = goalsPath();
    if (!is_file($path)) return ['next_id' => 1, 'items' => []];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Goals: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Goals decrypt failed');
    return json_decode($plain, true) ?? ['next_id' => 1, 'items' => []];
}

function saveGoals(array $data): void {
    $path = goalsPath();
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

// Counts consecutive logged days ending at $endDate, stopping at the first gap
// (a day with zero entries — write-offs count as "logged", they're a deliberate
// record that the day happened even without tracked nutrients). Used to prorate
// weekly-rolling nutrient goals so an unlogged day reads as "unknown", not as a
// zero-intake day that tanks the week's score.
function loggedStreakDays(array $log, string $endDate, int $maxDays = 7): int {
    $n   = 0;
    $cur = $endDate;
    for ($i = 0; $i < $maxDays; $i++) {
        if (empty($log['entries'][$cur])) break;
        $n++;
        $cur = date('Y-m-d', strtotime($cur . ' -1 day'));
    }
    return $n;
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
        'calcium', 'copper', 'iodine', 'iron', 'magnesium', 'phosphorus', 'potassium', 'selenium', 'sodium', 'zinc',
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

// Shared nutrition + cost computation for a recipe's ingredient list, used by
// both api/agent.php's precalculate_recipe action and the session-authenticated
// api/recipe_action.php, so the two never compute a recipe's numbers
// differently. $ingredients is a list of {food_id, weight_g} (the same shape
// stored as a recipe's ingredient_matches). $manualNutrients are pre-scaled
// (already at actual weight, not per-100g) nutrient values to add on top —
// e.g. for a store-bought component with no foods-table entry.
function computeRecipeTotals(PDO $db, array $ingredients, array $manualNutrients = []): array {
    $nutrientCols = [
        'energy_kj','protein_g','fat_total_g','fat_saturated_g','fat_monounsaturated_g',
        'fat_polyunsaturated_g','fat_trans_g','cholesterol_mg','carbohydrate_g','sugars_g',
        'fibre_g','fibre_soluble_g','fibre_insoluble_g',
        'omega3_ala_mg','omega3_epa_mg','omega3_dha_mg','omega6_la_mg',
        'vitamin_a_mcg','vitamin_b1_mg','vitamin_b2_mg','vitamin_b3_mg','vitamin_b5_mg',
        'vitamin_b6_mg','vitamin_b7_mcg','folate_mcg','vitamin_b12_mcg',
        'vitamin_c_mg','vitamin_d_mcg','vitamin_e_mg','vitamin_k_mcg','vitamin_k2_mcg',
        'choline_mg','lutein_zeaxanthin_mcg',
        'calcium_mg','copper_mg','iodine_mcg','iron_mg','magnesium_mg',
        'potassium_mg','selenium_mcg','sodium_mg','zinc_mg',
    ];

    $totals = array_fill_keys($nutrientCols, 0.0);
    $cost   = 0.0;

    foreach ($manualNutrients as $k => $v) {
        if (isset($totals[$k])) $totals[$k] += (float)$v;
    }

    $cols = implode(', ', $nutrientCols);
    $stmt = $db->prepare("SELECT $cols, cost_per_100g FROM foods WHERE food_id = ?");
    foreach ($ingredients as $ing) {
        $foodId  = (int)($ing['food_id']  ?? 0);
        $weightG = (float)($ing['weight_g'] ?? 0);
        if (!$foodId || !$weightG) continue;
        $stmt->execute([$foodId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) continue;
        $factor = $weightG / 100.0;
        foreach ($nutrientCols as $col) {
            $totals[$col] += (float)($row[$col] ?? 0) * $factor;
        }
        if ($row['cost_per_100g'] !== null) $cost += (float)$row['cost_per_100g'] * $factor;
    }

    return [
        'nutrition' => array_map(fn($v) => round($v, 3), $totals),
        'cost'      => round($cost, 2),
    ];
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

// Shared source of truth for the bookshelf's book-unlock state and the
// unread-pages badge (the red "N pages waiting" circle on the current book's
// spine). Used by scene.php (full render) and api/heartbeat.php (lightweight
// poll, badge fields only) so the two never compute this differently.
// Shared book-set state logic: which books' files exist, which are sequentially
// unlocked (each requires the previous to be marked ended), and which one (if
// any) is the current in-progress book with unread pages. Parameterized by
// filename prefix and story-progress id prefix so more than one 24-book set
// can share the mechanism (see getStoryBookState / getSecondBookSetState).
function getBookSetState(string $filePrefix, string $progressPrefix): array {
    $booksExist = [];
    $booksAvail = [];
    $prevEnded = true; // book 1 has no prerequisite
    for ($n = 1; $n <= 24; $n++) {
        $file   = sprintf('%s%02d.php', $filePrefix, $n);
        $fileOk = file_exists(__DIR__ . '/content/stories/' . $file);
        if ($fileOk) $booksExist[] = $n;
        if ($fileOk && $prevEnded) $booksAvail[] = $n;
        $prevEnded = false;
        if ($fileOk) {
            $prog      = getStoryProgress($progressPrefix . $n);
            $prevEnded = !empty($prog['ended']);
        }
    }

    $currentBook = 0;
    $pagesAvail  = 0;
    if (!empty($booksAvail)) {
        $latestBookId   = end($booksAvail);
        $latestBookProg = getStoryProgress($progressPrefix . $latestBookId);
        if (empty($latestBookProg['ended'])) {
            $pagesAvail = getGlobalStoryPages();
            if ($pagesAvail > 0) $currentBook = $latestBookId;
        }
    }

    return [
        'books_exist'  => $booksExist,
        'books_avail'  => $booksAvail,
        'current_book' => $currentBook,
        'pages_avail'  => $pagesAvail,
    ];
}

function getStoryBookState(): array {
    return getBookSetState('quilt_', 'q');
}

// Second 24-slot book set (top-shelf-row-2). Files not written yet — every
// slot renders as the "not written" state until content/stories/auntie_NN.php
// files start appearing.
function getSecondBookSetState(): array {
    return getBookSetState('auntie_', 'a');
}

// Story "families" — each is an independently-unlocked set of up to 24
// books. story_id prefix letter selects the family (e.g. "q5" = quilt book
// 5, "a3" = second-shelf book 3). api/story_read.php, api/story_choose.php,
// and api/story_books.php all resolve through this rather than each
// hardcoding the quilt_NN.php pattern — add new arcs here only.
const STORY_FAMILY_FILE_PREFIX = [
    'q' => 'quilt_',
    'a' => 'auntie_',
];

// Splits a story_id into its family letter, file prefix, and book number.
// Returns null for anything that doesn't match a known family or isn't a
// valid book number (1-24).
function storyFamilyInfo(string $storyId): ?array {
    if (!preg_match('/^([a-z]+)(\d+)$/', $storyId, $m)) return null;
    $letter = $m[1];
    if (!isset(STORY_FAMILY_FILE_PREFIX[$letter])) return null;
    $n = (int)$m[2];
    if ($n < 1 || $n > 24) return null;
    return ['letter' => $letter, 'file_prefix' => STORY_FAMILY_FILE_PREFIX[$letter], 'n' => $n];
}

// Loads a story's {id, title, color, pages} array by story_id, or null if
// the story_id is invalid or its file doesn't exist yet.
function loadStoryById(string $storyId): ?array {
    $info = storyFamilyInfo($storyId);
    if (!$info) return null;
    $path = __DIR__ . '/content/stories/' . sprintf('%s%02d.php', $info['file_prefix'], $info['n']);
    if (!file_exists($path)) return null;
    return require $path;
}

// First existing book in a family, used as a fallback when no/an invalid
// story_id is given. Defaults to the quilt family to match prior behaviour
// (the app only ever had one family before the second shelf existed).
function defaultStoryId(string $letter = 'q'): string {
    $filePrefix = STORY_FAMILY_FILE_PREFIX[$letter] ?? STORY_FAMILY_FILE_PREFIX['q'];
    for ($n = 1; $n <= 24; $n++) {
        if (file_exists(__DIR__ . '/content/stories/' . sprintf('%s%02d.php', $filePrefix, $n))) return $letter . $n;
    }
    return $letter . '1';
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
        if ($date === date('Y-m-d')) {
            try { creditTop3Progress('daily_routine', 1); } catch (Throwable $e) {}
        }
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

// ---------- Top 3 daily challenges ----------
//
// Three daily "jars" drawn from content/top3_challenges.php, each worth a
// randomised point reward. Progress is never self-reported — every category
// is credited automatically from a real app action via creditTop3Progress(),
// called from the handful of endpoints where that action happens. See
// CLAUDE.md for the full category → hook-point table.

function getTop3ChallengePool(): array {
    return include __DIR__ . '/content/top3_challenges.php';
}

// Fills in {n} and naively singularises a trailing plural noun when n === 1
// (e.g. "Review {n} people" -> "Review 1 person"). Good enough for this pool's
// small, known vocabulary — not a general pluralisation engine.
function top3RenderLabel(string $label, int $n): string {
    $text = str_replace('{n}', (string)$n, $label);
    if ($n !== 1) return $text;
    $singulars = ['people' => 'person', 'things' => 'thing', 'tasks' => 'task',
                  'entries' => 'entry', 'objects' => 'object', 'rooms' => 'room',
                  'nutrients' => 'nutrient', 'notes' => 'note', 'routines' => 'routine',
                  'items' => 'item'];
    foreach ($singulars as $plural => $singular) {
        $text = preg_replace('/\b' . preg_quote($plural, '/') . '\b/', $singular, $text, 1);
    }
    return $text;
}

function getOrGenerateTop3(?string $date = null): array {
    $date   = $date ?? date('Y-m-d');
    $config = getConfig() ?? [];
    $top3   = $config['top3'] ?? [];
    if (!empty($top3[$date])) return $top3[$date];

    $pool   = getTop3ChallengePool();
    $recent = $config['top3_recent'] ?? [];
    $avoid  = [];
    foreach ($recent as $cats) $avoid = array_merge($avoid, $cats);

    $pickThree = function (array $candidates) {
        shuffle($candidates);
        $chosen = [];
        $seenCategories = [];
        foreach ($candidates as $def) {
            if (in_array($def['category'], $seenCategories, true)) continue;
            $chosen[] = $def;
            $seenCategories[] = $def['category'];
            if (count($chosen) === 3) break;
        }
        return $chosen;
    };

    $available = array_values(array_filter($pool, fn($p) => !in_array($p['category'], $avoid, true)));
    $chosen    = $pickThree(count($available) >= 3 ? $available : $pool);
    if (count($chosen) < 3) { // pool too small even ignoring anti-repeat — top up from full pool
        $have = array_map(fn($c) => $c['category'], $chosen);
        foreach ($pool as $def) {
            if (in_array($def['category'], $have, true)) continue;
            $chosen[] = $def;
            $have[] = $def['category'];
            if (count($chosen) === 3) break;
        }
    }

    $entries = [];
    foreach ($chosen as $def) {
        $target = random_int($def['n_range'][0], $def['n_range'][1]);
        $entries[] = [
            'id'           => $def['id'],
            'category'     => $def['category'],
            'mode'         => $def['mode'],
            'label'        => top3RenderLabel($def['label'], $target),
            'target'       => $target,
            'points'       => random_int($def['points_range'][0], $def['points_range'][1]),
            'progress'     => 0,
            'completed_at' => null,
        ];
    }

    $top3[$date]     = $entries;
    $config['top3']  = $top3;

    $recent[$date] = array_map(fn($e) => $e['category'], $entries);
    if (count($recent) > 2) {
        $keys = array_keys($recent);
        sort($keys);
        $recent = array_intersect_key($recent, array_flip(array_slice($keys, -2)));
    }
    $config['top3_recent'] = $recent;

    saveConfig($config);

    // Recompute-mode categories reflect live state, so give them an immediate
    // baseline in case the qualifying condition is already true today (e.g.
    // the inbox happens to already be empty when the jars are first generated).
    foreach ($entries as $e) {
        if ($e['mode'] !== 'recompute') continue;
        try {
            $value = top3RecomputeValue($e['category'], $date);
            if ($value !== null) creditTop3Progress($e['category'], $value);
        } catch (Throwable $ex) {}
    }

    $fresh = getConfig() ?? [];
    return $fresh['top3'][$date] ?? $entries;
}

// The single shared entry point every action site calls to advance a jar.
// For 'increment'-mode categories, $value is added to progress. For
// 'recompute'-mode categories, $value is the current true count and progress
// is set to max(existing, value) so it can never regress. Returns a list of
// [{label, points}] for any jar that reached its target on this call.
function creditTop3Progress(string $category, int $value = 1): array {
    $date   = date('Y-m-d');
    $config = getConfig() ?? [];
    if (empty($config['top3'][$date])) {
        getOrGenerateTop3($date);
        $config = getConfig() ?? [];
    }
    if (empty($config['top3'][$date])) return [];

    $completed = [];
    $changed   = false;
    foreach ($config['top3'][$date] as &$entry) {
        if ($entry['category'] !== $category || $entry['completed_at']) continue;

        $newProgress = ($entry['mode'] ?? 'increment') === 'recompute'
            ? max($entry['progress'], min($entry['target'], $value))
            : min($entry['target'], $entry['progress'] + $value);

        if ($newProgress !== $entry['progress']) {
            $entry['progress'] = $newProgress;
            $changed = true;
        }
        if ($entry['progress'] >= $entry['target']) {
            $entry['completed_at'] = date('c');
            $config['points']      = (int)($config['points'] ?? 0) + (int)$entry['points'];
            $completed[]           = ['label' => $entry['label'], 'points' => $entry['points']];
            $changed = true;
        }
    }
    unset($entry);

    if ($changed) saveConfig($config);
    if ($completed) top3StashCompleted($completed);
    return $completed;
}

// Per-request accumulator so endpoints that trigger a credit indirectly (e.g.
// via vaultUpdateTask deep inside triage.php) can still surface the
// just-completed jars without threading a return value through every call
// site. Call top3DrainCompleted() once, right before building the JSON
// response, and splice the result on as `top3_completed`.
function top3StashCompleted(array $completed): void {
    global $__top3StashedCompletions;
    $__top3StashedCompletions = array_merge($__top3StashedCompletions ?? [], $completed);
}

function top3DrainCompleted(): array {
    global $__top3StashedCompletions;
    $out = $__top3StashedCompletions ?? [];
    $__top3StashedCompletions = [];
    return $out;
}

// Live-state value for a recompute-mode category. Returns null for categories
// that don't need a baseline recompute (i.e. increment-mode ones).
function top3RecomputeValue(string $category, ?string $date = null): ?int {
    global $database;
    $date = $date ?? date('Y-m-d');
    if ($category === 'inbox_zero') {
        try { return empty(getInboxTasks()) ? 1 : 0; } catch (Throwable $e) { return null; }
    }
    if ($category === 'nutrient_hit') {
        if (!$database) return null;
        try { return top3NutrientsAtRdiCount($date); } catch (Throwable $e) { return null; }
    }
    return null;
}

// How many non-limit RDI nutrients have reached 100% of their target for $date.
// Mirrors the gap-scoring exclusions in api/food_gaps.php — limit nutrients
// (sodium, saturated/trans fat, sugars) are excluded since hitting them isn't
// an achievement.
function top3NutrientsAtRdiCount(string $date): int {
    global $database;
    if (!$database) return 0;
    $totalsMap = [
        'energy_kj' => 'energy_kj', 'protein_g' => 'protein_g', 'fibre' => 'fibre',
        'fibre_soluble' => 'fibre_soluble', 'fibre_insoluble' => 'fibre_insoluble',
        'omega3_ala_mg' => 'omega3_ala', 'omega3_epa_mg' => 'omega3_epa', 'omega3_dha_mg' => 'omega3_dha',
        'omega6_la_mg' => 'omega6_la', 'potassium' => 'potassium', 'calcium' => 'calcium',
        'phosphorus' => 'phosphorus', 'iron' => 'iron', 'magnesium' => 'magnesium',
        'zinc_mg' => 'zinc', 'selenium_mcg' => 'selenium', 'iodine_mcg' => 'iodine', 'copper_mg' => 'copper',
        'vitamin_a' => 'vitamin_a', 'retinol' => 'retinol', 'vitamin_c' => 'vitamin_c', 'vitamin_d' => 'vitamin_d',
        'vitamin_e_mg' => 'vitamin_e', 'vitamin_k' => 'vitamin_k', 'vitamin_k2_mcg' => 'vitamin_k2',
        'folate' => 'vitamin_b9', 'vitamin_b1_mg' => 'vitamin_b1', 'vitamin_b2_mg' => 'vitamin_b2',
        'vitamin_b3_mg' => 'vitamin_b3', 'vitamin_b5_mg' => 'vitamin_b5', 'vitamin_b6_mg' => 'vitamin_b6',
        'vitamin_b7_mcg' => 'vitamin_b7', 'vitamin_b12_mcg' => 'vitamin_b12',
        'choline_mg' => 'choline', 'lutein_zeaxanthin_mcg' => 'lutein_zeaxanthin',
    ];
    $rdis = $database->query("SELECT * FROM nutrient_rdis ORDER BY display_order")->fetchAll(PDO::FETCH_ASSOC);
    $log  = getFoodLog();
    $todayTotals = foodLogNutrientTotals($database, $log, $date, $date);
    $weekStart   = date('Y-m-d', strtotime($date . ' -6 days'));
    $weekTotals  = foodLogNutrientTotals($database, $log, $weekStart, $date);
    $streakDays  = loggedStreakDays($log, $date, 7);
    $weekProrate = $streakDays > 0 ? $streakDays / 7 : 1;

    $count = 0;
    foreach ($rdis as $rdi) {
        $n      = $rdi['nutrient'];
        $totKey = $totalsMap[$n] ?? null;
        if (!$totKey) continue;
        if ($rdi['period'] === 'weekly') {
            $target = (float)($rdi['weekly_rdi'] ?? $rdi['daily_rdi'] * 7) * $weekProrate;
            $actual = (float)($weekTotals[$totKey] ?? 0);
        } else {
            $target = (float)$rdi['daily_rdi'];
            $actual = (float)($todayTotals[$totKey] ?? 0);
        }
        if ($target > 0 && $actual >= $target) $count++;
    }
    return $count;
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

// ---------- Regulation vault ----------

function regulationPath(): string {
    sess();
    $uid = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_SESSION['user_id'] ?? 'default');
    return __DIR__ . "/config/$uid/regulation.enc";
}

function getRegulation(): array {
    $path = regulationPath();
    if (!is_file($path)) return ['disabled_defaults' => [], 'custom' => [], 'next_custom_id' => 1];
    if (empty($_SESSION['DEK'])) throw new Exception('Vault locked');
    $dek   = base64_decode(strtr($_SESSION['DEK'], '-_', '+/'));
    $blob  = json_decode(file_get_contents($path), true);
    $nonce = base64_decode($blob['nonce'] ?? '');
    $ct    = base64_decode($blob['ct']    ?? '');
    if (!$nonce || !$ct) throw new Exception('Regulation: corrupt file');
    $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ct, '', $nonce, $dek);
    if ($plain === false) throw new Exception('Regulation decrypt failed');
    return json_decode($plain, true) ?? ['disabled_defaults' => [], 'custom' => [], 'next_custom_id' => 1];
}

function saveRegulation(array $data): void {
    $path = regulationPath();
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

function pickRegulationPrompt(): ?array {
    $defaults = require __DIR__ . '/content/regulation_prompts.php';
    $reg      = getRegulation();
    $disabled = $reg['disabled_defaults'] ?? [];
    $custom   = $reg['custom'] ?? [];
    $available = array_values(array_filter($defaults, fn($p) => !in_array($p['id'], $disabled)));
    $customMapped = array_map(fn($c) => array_merge($c, ['category' => 'custom', 'is_custom' => true]), $custom);
    $pool = array_merge($available, $customMapped);
    if (empty($pool)) return null;
    return $pool[array_rand($pool)];
}

