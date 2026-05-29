<?php
require_once __DIR__ . '/init.php';
if (!isAuthenticated()) { http_response_code(403); exit; }
?>
<h2 style="margin-top:0;">Import Questions</h2>

<div style="margin-bottom:0.75rem;">
  <label style="display:block;font-weight:500;margin-bottom:0.3rem;">Set name</label>
  <input type="text" id="imp-setname" placeholder="e.g. MS-102" style="margin-bottom:0.75rem;">

  <label style="display:block;font-weight:500;margin-bottom:0.3rem;">Type</label>
  <select id="imp-type" style="margin-bottom:0.75rem;">
    <option value="study">Study (exam / revision)</option>
    <option value="trivia">Trivia</option>
  </select>

  <label style="display:block;font-weight:500;margin-bottom:0.3rem;">CSV</label>
  <p class="muted" style="font-size:0.82em;margin-bottom:0.4rem;">
    Header row required. Columns: <code>question, option_a, option_b, option_c, option_d, correct, explanation</code><br>
    <code>correct</code> must be <code>a</code>, <code>b</code>, <code>c</code>, or <code>d</code>.
    <code>explanation</code> is optional.
  </p>
  <textarea id="imp-csv" style="width:100%;min-height:200px;font-family:monospace;font-size:0.8em;resize:vertical;"
    placeholder="question,option_a,option_b,option_c,option_d,correct,explanation"></textarea>
</div>

<button class="btn" id="imp-btn">Import</button>
<p id="imp-status" class="muted" style="margin-top:0.75rem;min-height:1.4em;"></p>

<script>
document.getElementById('imp-btn').addEventListener('click', function () {
  const csv     = document.getElementById('imp-csv').value.trim();
  const setName = document.getElementById('imp-setname').value.trim();
  const qType   = document.getElementById('imp-type').value;
  const btn     = this;
  const status  = document.getElementById('imp-status');

  if (!csv) { status.textContent = 'Paste some CSV first.'; return; }

  btn.disabled = true;
  status.textContent = 'Importing...';

  fetch('api/upload_questions.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ csv, set_name: setName, q_type: qType }),
  })
  .then(r => r.json())
  .then(d => {
    if (d.ok) {
      const errs = d.errors.length ? ` (${d.errors.length} skipped)` : '';
      status.textContent = `Imported ${d.inserted} question${d.inserted !== 1 ? 's' : ''}${errs}.`;
      if (!d.errors.length) document.getElementById('imp-csv').value = '';
    } else {
      status.textContent = d.error || 'Import failed.';
    }
    btn.disabled = false;
  })
  .catch(() => { status.textContent = 'Network error.'; btn.disabled = false; });
});
</script>
