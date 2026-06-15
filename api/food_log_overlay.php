<?php
require_once __DIR__ . '/../init.php';
if (empty($_SESSION['is_authenticated'])) { echo '<p class="muted">Not authenticated.</p>'; exit; }
$today = date('Y-m-d');
?>
<div data-init="initFoodLog" id="food-log-root">
  <h2 style="margin-bottom:0.5rem;">Food log</h2>
  <p class="muted" style="font-size:0.85em;margin-bottom:1rem;">Log whole foods to track your nutrients. Packaged stuff can go in as a write-off.</p>

  <!-- Add food form -->
  <div class="card" style="margin-bottom:1rem;">
    <div style="display:flex;gap:8px;flex-wrap:wrap;align-items:flex-end;">
      <div style="flex:2;min-width:140px;position:relative;">
        <label style="display:block;font-size:0.82em;color:#777;margin-bottom:3px;">Food</label>
        <input type="text" id="fl-search" placeholder="Start typing…" autocomplete="off"
               style="width:100%;box-sizing:border-box;">
        <div id="fl-suggestions" style="display:none;position:absolute;left:0;right:0;top:100%;background:#fff;
             border:1px solid #ddd;border-radius:0 0 6px 6px;z-index:50;max-height:200px;overflow-y:auto;box-shadow:0 4px 12px rgba(0,0,0,0.1);"></div>
      </div>
      <div style="flex:1;min-width:100px;">
        <label style="display:block;font-size:0.82em;color:#777;margin-bottom:3px;">Serving</label>
        <select id="fl-serving" style="width:100%;box-sizing:border-box;">
          <option value="">— pick food first —</option>
        </select>
      </div>
      <div style="width:70px;">
        <label style="display:block;font-size:0.82em;color:#777;margin-bottom:3px;">Qty</label>
        <input type="number" id="fl-qty" value="1" min="0.1" step="0.5" style="width:100%;box-sizing:border-box;">
      </div>
      <button id="fl-add-btn" class="btn" style="flex-shrink:0;align-self:flex-end;">Add</button>
    </div>
    <div style="margin-top:0.6rem;display:flex;gap:8px;align-items:center;">
      <input type="text" id="fl-writeoff-input" placeholder="Write-off label (e.g. chocolate biscuits)"
             style="flex:1;font-size:0.85em;" >
      <button id="fl-writeoff-btn" class="btn btn-secondary" style="font-size:0.82em;padding:4px 10px;min-height:30px;flex-shrink:0;">Log write-off</button>
    </div>
    <p id="fl-add-status" class="muted" style="margin-top:0.4rem;min-height:1.2em;font-size:0.85em;"></p>
  </div>

  <!-- Today's entries -->
  <div class="card" style="margin-bottom:1rem;">
    <h3 style="margin-bottom:0.6rem;">Today — <?= htmlspecialchars($today) ?></h3>
    <div id="fl-entries">
      <p class="muted" style="font-size:0.85em;">Loading…</p>
    </div>
  </div>

  <!-- Gap suggestions -->
  <div id="fl-gaps-card" class="card" style="display:none;">
    <h3 style="margin-bottom:0.75rem;">What else today?</h3>
    <p class="muted" style="font-size:0.85em;margin-bottom:0.75rem;">Ranked by how much of your remaining gaps one serving covers.</p>
    <div id="fl-gaps"></div>
  </div>

</div>
