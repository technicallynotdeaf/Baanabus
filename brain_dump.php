<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';

if (empty($_SESSION['is_authenticated'])) {
    http_response_code(403);
    echo '<p class="muted">Not authenticated.</p>';
    exit;
}
if (empty($_SESSION['DEK'])) {
    http_response_code(423);
    echo '<p class="muted">Vault is locked — unlock it to capture notes.</p>';
    exit;
}
?>
<div data-init="initBrainDump">
  <h2 style="margin-bottom:0.75rem;">Quick capture</h2>
  <p class="muted" style="margin-bottom:1rem;">Brain dump — write it down so you can stop thinking about it.</p>

  <form id="brain-dump-form">
    <textarea
      id="brain-dump-text"
      name="content"
      rows="5"
      placeholder="What's on your mind?"
      style="width:100%;box-sizing:border-box;resize:vertical;font-size:1rem;padding:0.6rem 0.75rem;border:1px solid #ccc;border-radius:6px;font-family:inherit;"
      autofocus
    ></textarea>
    <div style="display:flex;gap:0.75rem;align-items:center;margin-top:0.75rem;flex-wrap:wrap;">
      <button type="submit" class="btn">Save</button>
      <p id="dump-status" class="muted" style="margin:0;min-height:1.4em;"></p>
    </div>
  </form>

</div>

