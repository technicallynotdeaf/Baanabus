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
if ($vaultOpen) {
    try { $cassowary = getCassowary(); } catch (Throwable $e) {}
    $habiticaUser = $cassowary['habitica']['user_id'] ?? '';
    $habiticaKey  = $cassowary['habitica']['api_key']  ?? '';
}
?>
<div style="position:relative;">
  <h2>⚙️ Settings</h2>

  <!-- Passkey section -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;">🔑 Vault access</h3>
    <?php if ($vaultOpen): ?>
      <p class="muted" style="margin-bottom:0.75rem;">
        Your vault is open. Tap another key below to grant it vault access from any browser.
      </p>
      <button id="btn-enroll" class="btn">Tap a key to enroll it</button>
      <p id="enrollStatus" class="muted" style="margin-top:0.5rem;min-height:1.4em;"></p>
    <?php else: ?>
      <p class="muted">Vault is locked — sign in from a device that can unlock it to manage key access.</p>
    <?php endif; ?>
  </div>

  <!-- Habitica section -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;">🎮 Habitica</h3>
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
      <p class="muted">Vault locked — unlock to manage Habitica credentials.</p>
    <?php endif; ?>
  </div>

</div>

<?php if ($vaultOpen): ?>
<script>
document.getElementById('btn-enroll').addEventListener('click', async function() {
  const statusEl = document.getElementById('enrollStatus');
  this.disabled = true;
  statusEl.style.color = '';
  try {
    await BaanabusAuth.enrollPasskey();
    statusEl.textContent = '✅ Key enrolled — it can now unlock your vault.';
  } catch(e) {
    statusEl.textContent = e.message;
    statusEl.style.color = 'crimson';
    this.disabled = false;
  }
});

document.getElementById('habitica-form').addEventListener('submit', async function(e) {
  e.preventDefault();
  const statusEl = document.getElementById('habStatus');
  statusEl.textContent = 'Saving…';
  try {
    const resp = await fetch('api/integrations.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({
        habitica: {
          user_id: document.getElementById('hab-user').value.trim(),
          api_key:  document.getElementById('hab-key').value.trim()
        }
      })
    });
    const result = await resp.json();
    if (result.ok) {
      statusEl.textContent = 'Saved.';
    } else {
      throw new Error(result.error || 'Save failed');
    }
  } catch(e) {
    statusEl.textContent = e.message;
    statusEl.style.color = 'crimson';
  }
});
</script>
<?php endif; ?>
