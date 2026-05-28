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

  <!-- Agent API keys -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;">Agent API keys</h3>
    <?php if ($vaultOpen): ?>
      <p class="muted" style="margin-bottom:0.75rem;font-size:0.88em;">Generate a key to give an AI agent access to your tasks and context. Each key can decrypt your vault — treat it like a password. Revoke it here when you're done.</p>
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
        <p style="font-size:0.88em;margin-bottom:0.4rem;color:#555;">Copy this key now — it will not be shown again.</p>
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
      <p class="muted">Vault locked — unlock to manage agent keys.</p>
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

// Agent API key generation
document.getElementById('gen-key-form').addEventListener('submit', async function(e) {
  e.preventDefault();
  const statusEl = document.getElementById('gen-key-status');
  const resultEl = document.getElementById('new-key-result');
  statusEl.textContent = 'Generating...';
  resultEl.style.display = 'none';
  try {
    const resp = await fetch('api/generate_api_key.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ label: document.getElementById('key-label').value.trim() || 'Agent key' })
    });
    const data = await resp.json();
    if (!data.ok) throw new Error(data.error || 'Failed');
    document.getElementById('new-key-value').value = data.token;
    resultEl.style.display = 'block';
    document.getElementById('new-key-value').select();
    statusEl.textContent = '';
    // Add to list without reload
    const list = document.getElementById('api-key-list') || (() => {
      const d = document.createElement('div');
      d.id = 'api-key-list';
      d.style.marginBottom = '0.75rem';
      document.getElementById('gen-key-form').before(d);
      return d;
    })();
    const row = document.createElement('div');
    row.className = 'api-key-row';
    row.dataset.kid = data.key_id;
    row.style.cssText = 'display:flex;align-items:center;justify-content:space-between;padding:6px 0;border-bottom:1px solid #f0f0f0;gap:8px;';
    row.innerHTML = `<div><span style="font-size:0.9em;font-weight:500;">${esc(data.label)}</span><span class="muted" style="font-size:0.8em;margin-left:6px;">${new Date().toISOString().slice(0,10)}</span></div><button class="btn-revoke action-button delete-link" data-kid="${esc(data.key_id)}" style="font-size:0.78em;padding:4px 10px;min-height:30px;">Revoke</button>`;
    list.appendChild(row);
  } catch(e) {
    statusEl.textContent = e.message;
    statusEl.style.color = 'crimson';
  }
});

document.getElementById('btn-copy-key').addEventListener('click', function() {
  const input = document.getElementById('new-key-value');
  input.select();
  navigator.clipboard.writeText(input.value).then(() => {
    document.getElementById('copy-status').textContent = 'Copied.';
  }).catch(() => {
    document.getElementById('copy-status').textContent = 'Select and copy manually.';
  });
});

document.addEventListener('click', async function(e) {
  if (!e.target.classList.contains('btn-revoke')) return;
  const keyId = e.target.dataset.kid;
  if (!keyId) return;
  if (!confirm('Revoke this key? Any agent using it will lose access immediately.')) return;
  e.target.disabled = true;
  try {
    const resp = await fetch('api/revoke_api_key.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ key_id: keyId })
    });
    const data = await resp.json();
    if (data.ok) e.target.closest('.api-key-row').remove();
    else throw new Error(data.error || 'Revoke failed');
  } catch(e) {
    alert(e.message);
    e.target.disabled = false;
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
