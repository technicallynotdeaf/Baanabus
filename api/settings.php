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
<div style="position:relative;">
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
      <p class="muted">Vault locked — unlock to change your name.</p>
    <?php endif; ?>
  </div>

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

<?php if ($vaultOpen): ?>
<script>
document.getElementById('nickname-form').addEventListener('submit', async function(e) {
  e.preventDefault();
  const statusEl = document.getElementById('nicknameStatus');
  statusEl.style.color = '';
  statusEl.textContent = 'Saving…';
  try {
    const resp = await fetch('api/nickname.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ nickname: document.getElementById('nickname-input').value.trim() })
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

document.getElementById('csv-probe-form').addEventListener('submit', async function(e) {
  e.preventDefault();
  const file   = document.getElementById('csv-file').files[0];
  const status = document.getElementById('csv-status');
  const result = document.getElementById('csv-result');
  if (!file) { status.textContent = 'Choose a CSV file first.'; return; }
  status.textContent = 'Reading…';
  result.style.display = 'none';
  const fd = new FormData();
  fd.append('csvfile', file);
  try {
    const resp = await fetch('api/csv_probe.php', { method: 'POST', body: fd });
    const data = await resp.json();
    if (!data.ok) throw new Error(data.error || 'Failed');
    status.textContent = `${data.rows} rows, ${data.fields.length} fields.`;
    const fieldHtml = data.fields.map((f, i) => {
      const sample = data.sample[i] !== undefined ? `<span class="muted"> — e.g. ${esc(String(data.sample[i]).substring(0,40))}</span>` : '';
      return `<li style="padding:3px 0;font-size:0.88em;"><code>${esc(f)}</code>${sample}</li>`;
    }).join('');
    result.innerHTML = `<ul style="margin:0;padding-left:1.2rem;line-height:1.7;">${fieldHtml}</ul>`;
    result.style.display = 'block';
  } catch(e) {
    status.textContent = e.message;
    status.style.color = 'crimson';
  }
});

function esc(s) {
  return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}
</script>
<?php endif; ?>
