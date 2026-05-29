window.initUploadQuestions = function() {
  const btn = document.getElementById('imp-btn');
  if (!btn) return;

  btn.addEventListener('click', function () {
    const csv     = document.getElementById('imp-csv').value.trim();
    const setName = document.getElementById('imp-setname').value.trim();
    const qType   = document.getElementById('imp-type').value;
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
};
