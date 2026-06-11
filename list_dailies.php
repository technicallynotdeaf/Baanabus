<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
header('Content-Type: text/html; charset=utf-8');

if (!isAuthenticated()) { echo '<p>Not authenticated.</p>'; exit; }
if (!isUnlocked())      { echo '<p>Vault locked.</p>'; exit; }

$dailyId = isset($_GET['daily_id']) ? (int)$_GET['daily_id'] : null;
$data    = getDailies();

// Sort items within a group: no relevant_after first (by irrelevant_after asc, then none),
// then items with relevant_after (by relevant_after asc).
function sortDailyItems(array $items): array {
    usort($items, function($a, $b) {
        $raA = $a['relevant_after']   ?? '';
        $raB = $b['relevant_after']   ?? '';
        $iaA = $a['irrelevant_after'] ?? '';
        $iaB = $b['irrelevant_after'] ?? '';
        $aHasRA = $raA !== '';
        $bHasRA = $raB !== '';
        if (!$aHasRA && $bHasRA) return -1;
        if ($aHasRA && !$bHasRA) return 1;
        if (!$aHasRA) {
            if ($iaA !== '' && $iaB === '') return -1;
            if ($iaA === '' && $iaB !== '') return 1;
            return strcmp($iaA, $iaB);
        }
        return strcmp($raA, $raB);
    });
    return $items;
}

if ($dailyId !== null) {
    // ── Detail / edit view ────────────────────────────────────────────────
    $item = null;
    foreach ($data['items'] as $d) {
        if ((int)$d['id'] === $dailyId) { $item = $d; break; }
    }
    if (!$item) { echo '<p class="muted">Daily not found.</p>'; exit; }

    $today  = date('Y-m-d');
    $done   = array_map('intval', $data['completions'][$today] ?? []);
    $isDone = in_array($dailyId, $done, true);

    $horizonOpts  = ['morning' => 'Morning', 'day' => 'Day', 'evening' => 'Evening'];
    $locationOpts = ['' => 'Anywhere', 'home' => 'Home', 'work' => 'Work', 'shops' => 'Shops', 'phone' => 'Phone', 'online' => 'Online'];
    $dayKeys      = ['m' => 'Mon', 't' => 'Tue', 'w' => 'Wed', 'th' => 'Thu', 'f' => 'Fri', 's' => 'Sat', 'su' => 'Sun'];

    $currentHorizon = $item['horizon'] ?? (($item['morning'] ?? false) ? 'morning' : 'day');
    $currentLoc     = $item['location']        ?? '';
    $currentFreq    = $item['frequency']       ?? 'daily';
    $currentRepeat  = $item['repeat']          ?? [];
    $currentRA      = $item['relevant_after']  ?? '';
    $currentIA      = $item['irrelevant_after'] ?? '';
    $currentActive  = $item['is_active']       ?? true;
    $currentEveryX  = max(1, (int)($item['everyX'] ?? 1));
    ?>
    <div data-init="initDailyDetail" data-daily-id="<?= $dailyId ?>">
      <p style="font-size:0.78em;color:#aaa;margin-bottom:0.75rem;">
        <a href="#" onclick="loadOverlay('list_dailies.php');return false;"
           style="color:#888;text-decoration:none;">Routine tasks</a>
        &rsaquo; <?= htmlspecialchars($item['title']) ?>
      </p>

      <p style="font-size:0.72em;color:<?= $isDone ? '#4caf50' : '#aaa' ?>;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.25rem;"><?= $isDone ? 'Done today' : 'Pending today' ?></p>
      <p style="font-weight:600;font-size:1.05em;margin-bottom:1.1rem;"><?= htmlspecialchars($item['title']) ?></p>

      <div class="daily-field-row">
        <label>Horizon</label>
        <select id="dd-horizon">
          <?php foreach ($horizonOpts as $val => $lbl): ?>
            <option value="<?= $val ?>"<?= $currentHorizon === $val ? ' selected' : '' ?>><?= $lbl ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="daily-field-row">
        <label>Frequency</label>
        <select id="dd-frequency">
          <option value="daily"<?= $currentFreq === 'daily' ? ' selected' : '' ?>>Daily</option>
          <option value="weekly"<?= $currentFreq === 'weekly' ? ' selected' : '' ?>>Weekly</option>
        </select>
        <span id="dd-everyx-wrap" style="<?= $currentFreq !== 'daily' ? 'display:none;' : '' ?>margin-left:8px;font-size:0.85em;color:#888;white-space:nowrap;">
          every <input type="number" id="dd-everyx" min="1" max="30" value="<?= $currentEveryX ?>"
            style="width:3rem;padding:2px 5px;font-size:0.95em;"> days
        </span>
      </div>

      <div id="dd-days-wrap" style="<?= $currentFreq !== 'weekly' ? 'display:none;' : '' ?>margin-bottom:0.75rem;">
        <label style="font-size:0.82em;color:#888;display:block;margin-bottom:0.4rem;">Days of week</label>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
          <?php foreach ($dayKeys as $key => $lbl): ?>
            <label style="display:flex;flex-direction:column;align-items:center;gap:3px;font-size:0.75em;color:#555;cursor:pointer;">
              <input type="checkbox" data-day="<?= $key ?>"
                <?= !empty($currentRepeat[$key]) ? 'checked' : '' ?>>
              <?= $lbl ?>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="daily-field-row">
        <label>Location</label>
        <select id="dd-location">
          <?php foreach ($locationOpts as $val => $lbl): ?>
            <option value="<?= $val ?>"<?= $currentLoc === $val ? ' selected' : '' ?>><?= $lbl ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="daily-field-row">
        <label>Active from</label>
        <input type="time" id="dd-relevant-after" value="<?= htmlspecialchars($currentRA) ?>" style="width:7rem;">
        <span style="color:#bbb;padding:0 4px;font-size:0.9em;">until</span>
        <input type="time" id="dd-irrelevant-after" value="<?= htmlspecialchars($currentIA) ?>" style="width:7rem;">
      </div>

      <div style="margin-top:1.25rem;display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
        <button class="action-button" id="dd-save-btn">Save</button>
        <button class="action-button" id="dd-active-btn"
          style="background:<?= $currentActive ? '#888' : '#2d8c5a' ?>;">
          <?= $currentActive ? 'Deactivate' : 'Reactivate' ?>
        </button>
      </div>
      <p id="dd-status" class="muted" style="margin-top:0.5rem;min-height:1.2em;font-size:0.85em;"></p>
    </div>
    <?php

} else {
    // ── List view ─────────────────────────────────────────────────────────
    $today    = date('Y-m-d');
    $done     = array_map('intval', $data['completions'][$today] ?? []);
    $items    = $data['items'] ?? [];

    // IDs currently passing all gates (time, location, horizon unlock, due today)
    $doableIds = array_flip(array_map(fn($d) => (int)$d['id'], getActiveDailies()));
    // Also treat completed-today items as "doable" (they were doable, user did them)
    foreach ($done as $id) $doableIds[$id] = true;

    $groups   = ['morning' => [], 'day' => [], 'evening' => []];
    $gated    = []; // active but not currently doable
    $inactive = [];
    foreach ($items as $d) {
        if (!($d['is_active'] ?? true)) { $inactive[] = $d; continue; }
        if (isset($doableIds[(int)$d['id']])) {
            $h = getDailyHorizon($d);
            if (!isset($groups[$h])) $h = 'day';
            $groups[$h][] = $d;
        } else {
            $gated[] = $d;
        }
    }
    foreach ($groups as &$g) $g = sortDailyItems($g);
    $gated = sortDailyItems($gated);
    unset($g);

    $horizonLabels  = ['morning' => 'Morning', 'day' => 'Day', 'evening' => 'Evening'];
    $locationLabels = ['home' => 'Home', 'work' => 'Work', 'shops' => 'Shops', 'phone' => 'Phone', 'online' => 'Online'];

    $sep = "\xE2\x80\x93"; // en-dash UTF-8
    function dailyRowTags(array $d, array $locationLabels, string $sep): array {
        $loc      = $locationLabels[$d['location'] ?? ''] ?? null;
        $ra       = $d['relevant_after']   ?? '';
        $ia       = $d['irrelevant_after'] ?? '';
        $timeGate = ($ra || $ia) ? trim("{$ra}{$sep}{$ia}", $sep) : null;
        return array_filter([$loc, $timeGate]);
    }

    $hasAny = !empty($inactive) || !empty($gated);
    foreach ($groups as $g) { if (!empty($g)) { $hasAny = true; break; } }
    ?>
    <div data-init="initDailiesList">
      <h2 style="margin:0 0 1rem;">Routine tasks</h2>

      <?php foreach ($groups as $horizon => $groupItems): ?>
        <?php if (empty($groupItems)) continue; ?>
        <p style="font-size:0.72em;font-weight:600;color:#bbb;text-transform:uppercase;letter-spacing:0.06em;margin:0.75rem 0 0.25rem;"><?= $horizonLabels[$horizon] ?></p>
        <?php foreach ($groupItems as $d):
          $isDone = in_array((int)$d['id'], $done, true);
          $tags   = dailyRowTags($d, $locationLabels, $sep);
        ?>
          <div class="daily-list-row"
               onclick="loadOverlay('list_dailies.php?daily_id=<?= (int)$d['id'] ?>')">
            <span class="dlr-dot" style="background:<?= $isDone ? '#4caf50' : '#ddd' ?>;"></span>
            <span class="dlr-title<?= $isDone ? ' dlr-done' : '' ?>"><?= htmlspecialchars($d['title']) ?></span>
            <span class="dlr-tags">
              <?php foreach ($tags as $tag): ?>
                <span class="dlr-tag"><?= htmlspecialchars($tag) ?></span>
              <?php endforeach; ?>
            </span>
          </div>
        <?php endforeach; ?>
      <?php endforeach; ?>

      <?php if (!empty($gated)): ?>
        <p style="font-size:0.72em;font-weight:600;color:#ccc;text-transform:uppercase;letter-spacing:0.06em;margin:1rem 0 0.25rem;">Not right now</p>
        <?php foreach ($gated as $d):
          $tags = dailyRowTags($d, $locationLabels, $sep);
        ?>
          <div class="daily-list-row"
               onclick="loadOverlay('list_dailies.php?daily_id=<?= (int)$d['id'] ?>')">
            <span class="dlr-dot" style="background:#e0e0e0;"></span>
            <span class="dlr-title" style="color:#999;"><?= htmlspecialchars($d['title']) ?></span>
            <span class="dlr-tags">
              <?php foreach ($tags as $tag): ?>
                <span class="dlr-tag" style="opacity:0.6;"><?= htmlspecialchars($tag) ?></span>
              <?php endforeach; ?>
            </span>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($inactive)): ?>
        <p style="font-size:0.72em;font-weight:600;color:#ddd;text-transform:uppercase;letter-spacing:0.06em;margin:1rem 0 0.25rem;">Inactive</p>
        <?php foreach ($inactive as $d): ?>
          <div class="daily-list-row"
               onclick="loadOverlay('list_dailies.php?daily_id=<?= (int)$d['id'] ?>')">
            <span class="dlr-dot" style="background:#eee;"></span>
            <span class="dlr-title" style="color:#ccc;"><?= htmlspecialchars($d['title']) ?></span>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!$hasAny): ?>
        <p class="muted">No routine tasks set up yet.</p>
      <?php endif; ?>
    </div>
    <?php
}
