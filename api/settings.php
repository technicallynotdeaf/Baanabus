<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) {
    echo '<p class="muted">Not authenticated.</p>';
    exit;
}

$vaultOpen    = !empty($_SESSION['DEK']);
$hasPrf       = $vaultOpen && hasPrfWrap();
$cassowary    = [];
$habiticaUser = '';
$habiticaKey  = '';
$nickname     = '';
if ($vaultOpen) {
    try {
        $cassowary = getCassowary();
        $cfg       = getConfig() ?? [];
    } catch (Throwable $e) { $cfg = []; }
    $habiticaUser = $cassowary['habitica']['user_id'] ?? '';
    $habiticaKey  = $cassowary['habitica']['api_key']  ?? '';
    $nickname     = $cfg['nickname'] ?? '';
}
?>
<div data-init="initSettings" style="position:relative;">
  <h2>Settings</h2>

  <!-- Nickname section -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;">Your name</h3>
    <?php if ($vaultOpen): ?>
      <form id="nickname-form">
        <label style="display:block;margin-bottom:0.4rem;font-size:0.9em;color:#555;">What should the sheep call you?</label>
        <input type="text" id="nickname-input" name="nickname" value="<?= htmlspecialchars($nickname) ?>" placeholder="e.g. Alison" maxlength="50">
        <button type="submit" class="btn" style="margin-top:0.75rem;">Save</button>
        <p id="nicknameStatus" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      </form>
    <?php else: ?>
      <p class="muted">Vault locked â€” unlock to change your name.</p>
    <?php endif; ?>
  </div>

  <!-- Passkey section -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;">ðŸ”‘ Vault access</h3>
    <?php if ($vaultOpen): ?>
      <p class="muted" style="margin-bottom:0.75rem;">
        Your vault is open. Tap another key below to grant it vault access from any browser.
      </p>
      <button id="btn-enroll" class="btn">Tap a key to enroll it</button>
      <p id="enrollStatus" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
    <?php else: ?>
      <p class="muted">Vault is locked â€” sign in from a device that can unlock it to manage key access.</p>
    <?php endif; ?>
  </div>

  <!-- Habitica section -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;">ðŸŽ® Habitica</h3>
    <?php if ($vaultOpen): ?>
      <form id="habitica-form">
        <label style="display:block;margin-bottom:0.4rem;font-size:0.9em;color:#555;">User ID</label>
        <input type="text" id="hab-user" name="user_id" value="<?= htmlspecialchars($habiticaUser) ?>" placeholder="xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx">
        <label style="display:block;margin:0.75rem 0 0.4rem;font-size:0.9em;color:#555;">API Key</label>
        <input type="password" id="hab-key" name="api_key" value="<?= htmlspecialchars($habiticaKey) ?>" placeholder="xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx">
        <button type="submit" class="btn" style="margin-top:0.75rem;">Save Habitica creds</button>
        <p id="habStatus" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
      </form>
    <?php else: ?>
      <p class="muted">Vault locked â€” unlock to manage Habitica credentials.</p>
    <?php endif; ?>
  </div>

  <!-- Agent API keys -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;">Agent API keys</h3>
    <?php if ($vaultOpen): ?>
      <p class="muted" style="margin-bottom:0.75rem;font-size:0.88em;">Generate a key to give an AI agent access to your tasks and context. Each key can decrypt your vault â€” treat it like a password. Revoke it here when you're done.</p>
      <?php
      $existingKeys = $cassowary['api_keys'] ?? [];
      ?>
      <?php if ($existingKeys): ?>
      <div id="api-key-list" style="margin-bottom:0.75rem;">
        <?php foreach ($existingKeys as $kid => $meta): ?>
        <div class="api-key-row" style="display:flex;align-items:center;justify-content:space-between;padding:6px 0;border-bottom:1px solid #f0f0f0;gap:8px;" data-kid="<?= htmlspecialchars($kid) ?>">
          <div>
            <span style="font-size:0.9em;font-weight:500;"><?= htmlspecialchars($meta['label'] ?? 'Key') ?></span>
            <span class="muted" style="font-size:0.8em;margin-left:6px;"><?= htmlspecialchars(substr($meta['created_at'] ?? '', 0, 10)) ?></span>
          </div>
          <button class="btn-revoke action-button delete-link" data-kid="<?= htmlspecialchars($kid) ?>" style="font-size:0.78em;padding:4px 10px;min-height:30px;">Revoke</button>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      <div id="new-key-result" style="display:none;margin-bottom:0.75rem;">
        <p style="font-size:0.88em;margin-bottom:0.4rem;color:#555;">Copy this key now â€” it will not be shown again.</p>
        <div style="display:flex;gap:6px;align-items:center;">
          <input type="text" id="new-key-value" readonly style="font-family:monospace;font-size:0.8em;flex:1;min-width:0;">
          <button id="btn-copy-key" class="btn" style="white-space:nowrap;flex-shrink:0;">Copy</button>
        </div>
        <p id="copy-status" class="muted" style="font-size:0.82em;min-height:1.2em;margin-top:0.3rem;"></p>
      </div>
      <form id="gen-key-form" style="display:flex;gap:8px;align-items:flex-end;flex-wrap:wrap;">
        <div style="flex:1;min-width:140px;">
          <label style="display:block;font-size:0.85em;color:#555;margin-bottom:0.3rem;">Label</label>
          <input type="text" id="key-label" name="label" placeholder="e.g. Claude agent" maxlength="60">
        </div>
        <button type="submit" class="btn" style="flex-shrink:0;">Generate key</button>
      </form>
      <p id="gen-key-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
    <?php else: ?>
      <p class="muted">Vault locked â€” unlock to manage agent keys.</p>
    <?php endif; ?>
  </div>

  <!-- CSV import probe -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;">Import tasks from CSV</h3>
    <p class="muted" style="margin-bottom:0.75rem;font-size:0.88em;">Upload a tasks.csv to inspect its fields before mapping the import.</p>
    <form id="csv-probe-form" enctype="multipart/form-data">
      <input type="file" id="csv-file" name="csvfile" accept=".csv,text/csv" style="margin-bottom:0.6rem;">
      <button type="submit" class="btn">Inspect fields</button>
      <p id="csv-status" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
    </form>
    <div id="csv-result" style="display:none;margin-top:0.75rem;"></div>
  </div>

</div>

