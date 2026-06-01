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

  const btnShow  = document.getElementById('btn-show-add-person');
  const form     = document.getElementById('add-person-form');
  const nameIn   = document.getElementById('new-person-name');

  btnShow.addEventListener('click', function() {
    const open = form.style.display !== 'none';
    form.style.display = open ? 'none' : 'block';
    if (!open) nameIn.focus();
  });

  document.getElementById('btn-add-person').addEventListener('click', addPerson);
  nameIn.addEventListener('keydown', e => { if (e.key === 'Enter') addPerson(); });

  function addPerson() {
    const name    = nameIn.value.trim();
    const circles = document.getElementById('new-person-circles').value.trim();
    const status  = document.getElementById('add-person-status');
    if (!name) { status.textContent = 'Enter a name first.'; return; }
    status.textContent = 'Saving…';
    fetch('api/add_person.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ name, circles: circles || null }),
    })
    .then(r => r.json())
    .then(d => {
      if (!d.ok) throw new Error(d.error || 'Failed');
      nameIn.value = '';
      document.getElementById('new-person-circles').value = '';
      status.textContent = 'Saved.';
      setTimeout(() => { status.textContent = ''; }, 2000);
      addPersonRow({ person_id: d.person_id, name: d.name, circles: d.circles });
    })
    .catch(e => { status.textContent = e.message; status.style.color = 'crimson'; });
  }

  function addPersonRow(p) {
    let noDateGroup = document.querySelector('.people-group[data-group="nodate"]');
    if (!noDateGroup) {
      noDateGroup = document.createElement('div');
      noDateGroup.className = 'people-group';
      noDateGroup.dataset.group = 'nodate';
      noDateGroup.innerHTML = `<div style="display:flex;align-items:center;gap:6px;margin-bottom:0.4rem;margin-top:0.75rem;">
        <span style="font-size:0.72em;font-weight:600;color:#bbb;text-transform:uppercase;letter-spacing:0.06em;">No date</span>
      </div>`;
      form.closest('[data-init]').appendChild(noDateGroup);
    }
    const row = document.createElement('div');
    row.className = 'person-row';
    row.dataset.name = p.name.toLowerCase();
    row.style.cssText = 'display:flex;align-items:center;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0f0f0;cursor:pointer;';
    row.onclick = () => loadOverlay(`list_people.php?person_id=${p.person_id}`);
    row.innerHTML = `<div style="flex:1;min-width:0;">
      <span style="line-height:1.4;">${esc(p.name)}</span>
      ${p.circles ? `<span style="font-size:0.75em;color:#aaa;margin-left:5px;">${esc(p.circles)}</span>` : ''}
    </div>`;
    noDateGroup.appendChild(row);
  }

  window._toggleArchived = function() {
    const list = document.getElementById('archived-list');
    const btn  = document.getElementById('archived-toggle');
    if (!list || !btn) return;
    const count = btn.dataset.count || '0';
    const open = list.style.display !== 'none';
    list.style.display = open ? 'none' : 'block';
    btn.textContent    = open ? `+ ${count} archived` : '- hide archived';
  };

  function esc(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }
};

window.initPersonPanel = function() {
  const root = document.querySelector('[data-init="initPersonPanel"]');
  if (!root) return;
  const pid = parseInt(root.dataset.personId, 10);

  const actionStatus = document.getElementById('note-status');

  function showError(msg) {
    if (actionStatus) { actionStatus.textContent = msg; actionStatus.style.color = 'crimson'; }
  }

  function personAction(body, onOk) {
    fetch('api/person_action.php', {
      method:  'POST',
      headers: {'Content-Type': 'application/json'},
      body:    JSON.stringify(body),
    }).then(r => r.json()).then(d => {
      if (d.ok) onOk(d);
      else showError(d.error || 'Something went wrong.');
    }).catch(() => showError('Request failed — check connection.'));
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
