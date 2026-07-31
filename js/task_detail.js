window.initTaskDetail = function() {
  'use strict';

  const root   = document.querySelector('[data-init="initTaskDetail"]');
  if (!root) return;
  const taskId = parseInt(root.dataset.taskId);

  const titleEl  = document.getElementById('td-title');
  const doneEl   = document.getElementById('td-done');
  const statusEl = document.getElementById('td-status');
  const saveBtn  = document.getElementById('td-save');

  // 'location' is handled separately below — a checkbox group, not a single
  // element with a .value.
  const fieldIds = ['task_type', 'urgency', 'importance', 'energy', 'context', 'time', 'deadline',
                     'relevant_after', 'irrelevant_after', 'description'];

  // Deep-link from the Blocked flow (?focus=field1,field2 on task_detail.php) —
  // scroll to and highlight the field(s) that prompted opening this overlay.
  // 'location' maps to its checkbox-group container, not a 'td-location' element.
  const focusFields = (root.dataset.focusFields || '').split(',').filter(Boolean);
  if (focusFields.length) {
    let first = null;
    focusFields.forEach(id => {
      const elId = id === 'location' ? 'td-location-group' : 'td-' + id;
      const el = document.getElementById(elId);
      if (!el) return;
      if (!first) first = el;
      const wrap = id === 'location' ? el : (el.closest('div') || el);
      wrap.style.outline = '2px solid #c9922e';
      wrap.style.borderRadius = '6px';
      setTimeout(() => { wrap.style.outline = ''; }, 3000);
    });
    if (first) setTimeout(() => { first.scrollIntoView({ block: 'center', behavior: 'smooth' }); if (first.focus) first.focus(); }, 50);
  }

  function refreshList() {
    if (typeof window.refreshTaskListRow === 'function') window.refreshTaskListRow(taskId);
  }

  saveBtn.addEventListener('click', () => {
    const fields = { title: titleEl.value.trim() };
    fieldIds.forEach(id => {
      const el = document.getElementById('td-' + id);
      if (!el) return;
      let v = el.value;
      if (id === 'time') v = v === '' ? null : parseInt(v);
      if (id === 'deadline') v = v === '' ? null : v;
      fields[id] = v === '' ? null : v;
    });
    const checkedLocs = Array.from(document.querySelectorAll('.td-location-cb:checked')).map(cb => cb.value);
    fields.location = checkedLocs.length ? checkedLocs : null;

    saveBtn.disabled = true;
    statusEl.textContent = 'Saving…';
    fetch('api/update_task.php', {
      method: 'POST', headers: {'Content-Type':'application/json'},
      body: JSON.stringify({ task_id: taskId, fields }),
    }).then(r => r.json()).then(d => {
      saveBtn.disabled = false;
      if (d.ok) {
        statusEl.textContent = 'Saved.';
        setTimeout(() => { statusEl.textContent = ''; }, 2000);
        refreshList();
      } else {
        statusEl.textContent = d.error || 'Could not save.';
      }
    }).catch(() => { saveBtn.disabled = false; statusEl.textContent = 'Network error.'; });
  });

  if (!doneEl.checked) {
    doneEl.addEventListener('change', () => {
      if (!doneEl.checked) return;
      doneEl.disabled = true;
      titleEl.style.color = '#aaa';
      titleEl.style.textDecoration = 'line-through';
      fetch(`api/mark_complete.api.php?task_id=${taskId}`, {method:'POST'})
        .then(r => r.json())
        .then(res => {
          if (res.success && typeof updateProgressBar === 'function') {
            updateProgressBar(res.pages, res.pages_target, res.total_pages);
          }
          refreshList();
        })
        .catch(() => {});
    });
  } else {
    doneEl.disabled = true;
  }

  document.querySelectorAll('.td-subtask-check').forEach(cb => {
    if (cb.checked) { cb.disabled = true; return; }
    cb.addEventListener('change', () => {
      if (!cb.checked) return;
      const id  = parseInt(cb.dataset.id);
      const row = cb.closest('.td-subtask-row');
      cb.disabled = true;
      fetch(`api/mark_complete.api.php?task_id=${id}`, {method:'POST'})
        .then(r => r.json())
        .then(res => {
          if (res.success) {
            const span = row.querySelector('span');
            span.style.color = '#aaa';
            span.style.textDecoration = 'line-through';
            if (typeof updateProgressBar === 'function') {
              updateProgressBar(res.pages, res.pages_target, res.total_pages);
            }
          }
        })
        .catch(() => {});
    });
  });

  const newSubInput = document.getElementById('td-new-subtask');
  const addSubBtn   = document.getElementById('td-add-subtask');
  const subtasksEl  = document.getElementById('td-subtasks');

  function addSubtask() {
    const title = newSubInput.value.trim();
    if (!title) return;
    addSubBtn.disabled = true;
    fetch('api/add_task.php', {
      method: 'POST', headers: {'Content-Type':'application/json'},
      body: JSON.stringify({ title, task_type: 'next_action', parent_id: taskId }),
    }).then(r => r.json()).then(d => {
      addSubBtn.disabled = false;
      if (!d.ok) return;
      const emptyMsg = subtasksEl.querySelector('p.muted');
      if (emptyMsg) emptyMsg.remove();
      const row = document.createElement('div');
      row.className = 'td-subtask-row';
      row.dataset.id = d.task_id;
      row.style.cssText = 'display:flex;align-items:center;gap:8px;padding:0.3rem 0;';
      row.innerHTML = `<input type="checkbox" class="td-subtask-check" data-id="${d.task_id}" style="width:18px;height:18px;flex-shrink:0;">
        <span style="flex:1;font-size:0.92em;">${title.replace(/</g,'&lt;')}</span>`;
      subtasksEl.appendChild(row);
      row.querySelector('.td-subtask-check').addEventListener('change', function() {
        if (!this.checked) return;
        const cid = parseInt(this.dataset.id);
        this.disabled = true;
        fetch(`api/mark_complete.api.php?task_id=${cid}`, {method:'POST'})
          .then(r => r.json())
          .then(res => {
            if (res.success) {
              const span = row.querySelector('span');
              span.style.color = '#aaa';
              span.style.textDecoration = 'line-through';
              if (typeof updateProgressBar === 'function') {
                updateProgressBar(res.pages, res.pages_target, res.total_pages);
              }
            }
          }).catch(() => {});
      });
      newSubInput.value = '';
      refreshList();
    }).catch(() => { addSubBtn.disabled = false; });
  }

  addSubBtn.addEventListener('click', addSubtask);
  newSubInput.addEventListener('keydown', e => { if (e.key === 'Enter') addSubtask(); });
};
