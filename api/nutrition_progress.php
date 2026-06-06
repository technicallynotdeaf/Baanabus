<?php
require_once __DIR__ . '/../init.php';
if (empty($_SESSION['is_authenticated'])) { echo '<p class="muted">Not authenticated.</p>'; exit; }
?>
<div id="np-root" data-init="initNutritionProgress">
  <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.25rem;">
    <h2 style="margin:0;">Nutrients</h2>
    <span id="np-date" style="font-size:0.82em;color:#aaa;"></span>
  </div>
  <p class="muted" style="font-size:0.83em;margin-bottom:1.25rem;">
    Bars show today's total vs daily target, or 7-day rolling total for weekly nutrients.
  </p>
  <div id="np-body">
    <p class="muted" style="font-size:0.85em;">Loading…</p>
  </div>
</div>
