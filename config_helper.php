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
  $p = getConfigPaths();
  $uid = preg_replace('/[^A-Za-z0-9_\-]/','_', $_SESSION['user_id'] ?? 'default');
  return is_file($p['wraps']."/cred_{$uid}.json");
}

/* One-call status for UI */
function vaultStatus(): array {
  return [
    'authenticated' => isAuthenticated(),
    'exists'        => vaultExists(),
    'unlocked'      => isUnlocked(),
    'hasPass'       => hasPassphraseWrap(),
    'hasPrf'        => hasPrfWrap(),
  ];
}


