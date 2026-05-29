<?php
require_once __DIR__ . '/init.php';
if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); echo '<p class="muted">Vault is locked.</p>'; exit; }
?>
<div id="activity-container" data-init="initLetsGo" style="padding:0.25rem 0;">
  <p class="muted">Loading…</p>
</div>
