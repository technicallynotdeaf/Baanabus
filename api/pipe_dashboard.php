<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';
header('Content-Type: text/html; charset=utf-8');

if (empty($_SESSION['is_authenticated'])) { echo '<p class="muted">Not authenticated.</p>'; exit; }
if (empty($_SESSION['DEK']))              { echo '<p class="muted">Vault locked.</p>'; exit; }

$cassowary = getCassowary();
$apiKey    = $cassowary['pipe']['api_key'] ?? '';
$apiUrl    = $cassowary['pipe']['api_url'] ?? 'https://pipeproject.info/dashboard/pipe_overview.php';

if (!$apiKey) {
    echo '<div style="padding:1.5rem;">
        <h2 style="margin-bottom:0.75rem;">PIPE Dashboard</h2>
        <p class="muted">No API key configured. Add it in Settings &rarr; Account.</p>
    </div>';
    exit;
}

// Cache: 10-minute TTL, stored per user
$uid       = $_SESSION['user_id'];
$cacheFile = __DIR__ . "/../config/{$uid}/pipe_cache.json";
$data      = null;

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 600) {
    $data = json_decode(file_get_contents($cacheFile), true);
}

if (!$data) {
    $ctx = stream_context_create(['http' => [
        'method'  => 'GET',
        'header'  => "Authorization: Bearer {$apiKey}\r\nAccept: application/json\r\n",
        'timeout' => 8,
        'ignore_errors' => true,
    ]]);
    $raw = @file_get_contents($apiUrl, false, $ctx);
    if ($raw) {
        $fetched = json_decode($raw, true);
        if (is_array($fetched)) {
            $data = $fetched;
            file_put_contents($cacheFile, $raw);
        }
    }
}

$health        = $data['health']        ?? [];
$jurisdictions = $data['jurisdictions'] ?? [];
$detail        = $data['detail']        ?? [];

$statusColor = ['green' => '#4caf50', 'grey' => '#aaaaaa', 'red' => '#e53935'];
$statusIcon  = ['green' => '&#9679;', 'grey' => '&#9675;', 'red' => '&#9679;'];
$statusLabel = ['green' => 'OK', 'grey' => '&#8212;', 'red' => 'Needs attention'];

$jOrder = ['NSW', 'VIC', 'SA', 'QLD', 'WA', 'TAS', 'ACT', 'NT', 'Fed'];
$jMap   = [];
foreach ($jurisdictions as $j) {
    $jMap[$j['code'] ?? ''] = $j;
}

$cacheAge = file_exists($cacheFile) ? round((time() - filemtime($cacheFile)) / 60) : null;
?>
<div style="padding:1.5rem 1.25rem 2rem;">
  <h2 style="margin-bottom:1rem;">PIPE Dashboard</h2>

  <?php if (!$data): ?>
    <div class="card">
      <p class="muted">Could not reach the PIPE API. Check the key in Settings or try again shortly.</p>
    </div>
  <?php else: ?>

  <!-- Health status -->
  <?php if ($health): ?>
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.75rem;font-size:1em;">System health</h3>
    <?php foreach ($health as $dim):
      $st  = $dim['status']  ?? 'grey';
      $col = $statusColor[$st] ?? '#aaa';
      $lbl = $dim['label']   ?? '';
      $msg = $dim['message'] ?? ($statusLabel[$st] ?? $st);
    ?>
    <div style="display:flex;align-items:center;gap:10px;padding:7px 0;border-bottom:1px solid #f0f0f0;">
      <span style="color:<?= htmlspecialchars($col) ?>;font-size:0.85em;flex-shrink:0;"><?= $statusIcon[$st] ?? '&#9675;' ?></span>
      <span style="font-size:0.9em;font-weight:500;flex:1;"><?= htmlspecialchars($lbl) ?></span>
      <span style="font-size:0.85em;color:#666;"><?= htmlspecialchars($msg) ?></span>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <!-- Jurisdictions -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.75rem;font-size:1em;">Parliament sitting this week</h3>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px;">
      <?php foreach ($jOrder as $code):
        $j       = $jMap[$code] ?? null;
        $sitting = $j && ($j['sitting'] ?? false);
        $days    = $j['sitting_days'] ?? [];
        $daysStr = implode(', ', array_map(fn($d) => date('D j M', strtotime($d)), array_slice($days, 0, 3)));
      ?>
      <div style="padding:8px 6px;border-radius:8px;background:<?= $sitting ? '#f5eeff' : '#f7f7f7' ?>;text-align:center;">
        <div style="font-size:0.8em;font-weight:600;color:<?= $sitting ? '#7D3E96' : '#999' ?>;"><?= htmlspecialchars($code) ?></div>
        <?php if ($sitting): ?>
          <div style="font-size:0.68em;color:#555;margin-top:2px;line-height:1.3;"><?= htmlspecialchars($daysStr ?: 'Sitting') ?></div>
        <?php else: ?>
          <div style="font-size:0.68em;color:#ccc;margin-top:2px;">Not sitting</div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Detail sub-sections — each rendered only if the sub-object is present and non-empty -->
  <?php foreach (['curation' => 'Curation', 'scraper' => 'Scraper', 'traffic' => 'Traffic', 'signup' => 'Signups'] as $key => $heading):
    if (empty($detail[$key]) || !is_array($detail[$key])) continue;
  ?>
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.5rem;font-size:1em;"><?= htmlspecialchars($heading) ?></h3>
    <?php foreach ($detail[$key] as $k => $v):
      if ($v === null || $v === '') continue;
    ?>
    <div style="display:flex;justify-content:space-between;font-size:0.88em;padding:4px 0;border-bottom:1px solid #f5f5f5;">
      <span style="color:#666;"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $k))) ?></span>
      <span style="font-weight:500;"><?= htmlspecialchars(is_array($v) ? json_encode($v) : (string)$v) ?></span>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endforeach; ?>

  <p class="muted" style="font-size:0.78em;text-align:right;margin-top:0.5rem;">
    <?php if ($cacheAge !== null): ?>
      Last updated <?= $cacheAge === 0 ? 'just now' : "{$cacheAge} min ago" ?>
    <?php endif; ?>
  </p>

  <?php endif; ?>
</div>
