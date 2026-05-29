window.initPeopleList = function() {
  const searchInput = document.getElementById('people-search');
  if (!searchInput) return;

  searchInput.addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.person-row').forEach(row => {
      row.style.display = (!q || row.dataset.name.includes(q)) ? '' : 'none';
    });
    document.querySelectorAll('.people-group').forEach(g => {
      const vis = g.querySelectorAll('.person-row:not([style*="display: none"])').length;
      g.style.display = vis ? '' : 'none';
    });
  });

  window._toggleArchived = function() {
    const list = document.getElementById('archived-list');
    const btn  = document.getElementById('archived-toggle');
    if (!list || !btn) return;
    const count = btn.dataset.count || '0';
    const open = list.style.display !== 'none';
    list.style.display = open ? 'none' : 'block';
    btn.textContent    = open ? `+ ${count} archived` : '- hide archived';
  };
};

window.initPersonPanel = function() {
  const root = document.querySelector('[data-init="initPersonPanel"]');
  if (!root) return;
  const pid = parseInt(root.dataset.personId, 10);

  function personAction(body, onOk) {
    fetch('api/person_action.php', {
      method:  'POST',
      headers: {'Content-Type': 'application/json'},
      body:    JSON.stringify(body),
    }).then(r => r.json()).then(d => {
      if (d.ok) onOk(d);
      else { alert(d.error || 'Something went wrong.'); }
    }).catch(() => alert('Request failed — check connection.'));
  }

  window._markReviewed = function() {
    const btn = document.getElementById('btn-reviewed');
    btn.disabled = true;
    personAction({ person_id: pid, action: 'mark_reviewed' }, d => {
      const dt  = new Date(d.next_review + 'T12:00:00');
      const lbl = 'Next: ' + dt.toLocaleDateString('en-GB', { day:'numeric', month:'short' });
      const el  = document.getElementById('review-display');
      el.textContent = lbl;
      el.style.color = '#888';
      document.getElementById('btn-snooze').disabled = false;
    });
  };

  window._snoozeReview = function() {
    const btn = document.getElementById('btn-snooze');
    btn.disabled = true;
    personAction({ person_id: pid, action: 'snooze', days: 7 }, d => {
      const dt  = new Date(d.next_review + 'T12:00:00');
      const lbl = 'Snoozed to ' + dt.toLocaleDateString('en-GB', { day:'numeric', month:'short' });
      const el  = document.getElementById('review-display');
      el.textContent = lbl;
      el.style.color = '#888';
    });
  };

  window._addNote = function() {
    const inp    = document.getElementById('new-note');
    const status = document.getElementById('note-status');
    const text   = inp.value.trim();
    if (!text) { status.textContent = 'Type something first.'; return; }
    status.textContent = 'Saving…';
    personAction({ person_id: pid, action: 'add_note', note_content: text }, () => {
      const noMsg = document.getElementById('no-notes-msg');
      if (noMsg) noMsg.remove();
      const today = new Date().toLocaleDateString('en-GB', { day:'numeric', month:'short', year:'numeric' });
      const div   = document.createElement('div');
      div.style.cssText = 'padding:0.4rem 0;border-bottom:1px solid #f5f5f5;';
      div.innerHTML = `<p style="font-size:0.75em;color:#aaa;margin:0 0 2px;">${today}</p>
        <p style="font-size:0.88em;margin:0;white-space:pre-wrap;word-break:break-word;">${esc(text)}</p>`;
      document.getElementById('notes-list').prepend(div);
      inp.value = '';
      status.textContent = 'Saved.';
      setTimeout(() => status.textContent = '', 2000);
    });
  };

  window._archivePerson = function() {
    if (!confirm('Archive this contact? They\'ll still appear under archived contacts.')) return;
    personAction({ person_id: pid, action: 'archive' }, () => loadOverlay('list_people.php'));
  };

  window._unarchivePerson = function() {
    personAction({ person_id: pid, action: 'unarchive' }, () => loadOverlay('list_people.php'));
  };

  document.getElementById('new-note').addEventListener('keydown', e => {
    if (e.key === 'Enter' && (e.ctrlKey || e.metaKey)) window._addNote();
  });

  function esc(s) {
    return String(s)
      .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')
      .replace(/\n/g,'<br>');
  }
};
