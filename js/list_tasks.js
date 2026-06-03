window.initListTasks = function() {
  const btnShow = document.getElementById('btn-show-add');
  if (!btnShow) return;
  const form    = document.getElementById('add-task-form');
  const titleIn = document.getElementById('new-task-title');

  btnShow.addEventListener('click', function() {
    const open = form.style.display !== 'none';
    form.style.display = open ? 'none' : 'block';
    if (!open) titleIn.focus();
  });

  document.getElementById('btn-add-task').addEventListener('click', addTask);
  titleIn.addEventListener('keydown', e => { if (e.key === 'Enter') addTask(); });

  function addTask() {
    const title   = titleIn.value.trim();
    const urgency = document.getElementById('new-task-urgency').value;
    const context = document.getElementById('new-task-context').value;
    const status  = document.getElementById('add-task-status');
    if (!title) { status.textContent = 'Enter a title first.'; return; }
    status.textContent = 'Saving…';
    fetch('api/add_task.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ title, urgency, context: context || null }),
    })
    .then(r => r.json())
    .then(d => {
      if (!d.ok) throw new Error(d.error || 'Failed');
      titleIn.value = '';
      status.textContent = 'Saved.';
      setTimeout(() => { status.textContent = ''; }, 2000);
      addRowToGroup({ id: d.task_id, title, urgency, context });
    })
    .catch(e => { status.textContent = e.message; status.style.color = 'crimson'; });
  }

  function addRowToGroup(t) {
    const group = document.querySelector(`.task-group[data-urgency="${t.urgency}"]`);
    if (!group) return;
    const row = document.createElement('div');
    row.className = 'task-row';
    row.dataset.id      = t.id;
    row.dataset.title   = t.title.toLowerCase();
    row.dataset.context = t.context || '';
    row.style.cssText = 'display:flex;align-items:flex-start;gap:8px;padding:0.5rem 0;border-bottom:1px solid #f0f0f0;';
    row.innerHTML = `
      <div style="flex:1;min-width:0;"><span style="line-height:1.4;word-break:break-word;">${esc(t.title)}</span></div>
      <div style="display:flex;gap:4px;flex-shrink:0;">
        <button class="task-done-btn action-button" data-id="${t.id}" style="padding:3px 8px;font-size:0.75em;min-height:28px;">Done</button>
        <button class="task-snooze-btn action-button" data-id="${t.id}" style="padding:3px 8px;font-size:0.75em;min-height:28px;background:transparent;color:hsl(210,100%,30%);border:1px solid hsl(210,100%,30%);">Snooze</button>
      </div>`;
    group.appendChild(row);
    const countEl = group.querySelector('.task-group-count');
    if (countEl) countEl.textContent = parseInt(countEl.textContent || '0') + 1;
  }

  let activeCtx = '';

  function applyFilters() {
    const q = (document.getElementById('task-search').value || '').toLowerCase();
    document.querySelectorAll('.task-row').forEach(row => {
      const matchSearch = !q || row.dataset.title.includes(q);
      const matchCtx = !activeCtx || row.dataset.context === activeCtx;
      row.style.display = (matchSearch && matchCtx) ? '' : 'none';
    });
    document.querySelectorAll('.task-group').forEach(group => {
      const visible = group.querySelectorAll('.task-row:not([style*="display: none"])').length;
      group.style.display = visible ? '' : 'none';
    });
  }

  document.getElementById('task-search').addEventListener('input', applyFilters);

  document.querySelectorAll('.context-chip').forEach(chip => {
    chip.addEventListener('click', function() {
      activeCtx = this.dataset.ctx;
      document.querySelectorAll('.context-chip').forEach(c => {
        const on = c === this;
        c.style.background = on ? '#8b7355' : 'transparent';
        c.style.color = on ? '#fff' : '#8b7355';
        c.classList.toggle('active', on);
      });
      applyFilters();
    });
  });

  document.addEventListener('click', function(e) {
    const btn = e.target.closest('.task-done-btn');
    if (!btn) return;
    const taskId = parseInt(btn.dataset.id);
    const row    = btn.closest('.task-row');
    btn.disabled = true;
    fetch(`api/mark_complete.api.php?task_id=${taskId}`)
      .then(r => r.json())
      .then(d => {
        if (d.success) {
          updateProgressBar(d.pages, d.pages_target);
          row.style.transition = 'opacity 0.2s';
          row.style.opacity = '0';
          setTimeout(() => row.remove(), 220);
        } else {
          btn.disabled = false;
        }
      })
      .catch(() => { btn.disabled = false; });
  });

  document.addEventListener('click', function(e) {
    const btn = e.target.closest('.task-snooze-btn');
    if (!btn) return;
    const taskId = parseInt(btn.dataset.id);
    const row    = btn.closest('.task-row');

    document.querySelectorAll('.snooze-picker').forEach(p => p.remove());

    const now       = new Date();
    const fmt       = d => `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;
    const tonight   = fmt(now) + 'T21:00:00';
    const tom       = new Date(now); tom.setDate(now.getDate() + 1);
    const tomorrow  = fmt(tom) + 'T08:00:00';
    const nextWeek  = new Date(now); nextWeek.setDate(now.getDate() + 7);
    const nwStr     = fmt(nextWeek) + 'T08:00:00';

    const picker = document.createElement('div');
    picker.className = 'snooze-picker';
    picker.style.cssText = 'display:flex;gap:4px;flex-wrap:wrap;padding:4px 0;';
    [['Tonight', tonight], ['Tomorrow', tomorrow], ['Next week', nwStr]].forEach(([label, when]) => {
      const b = document.createElement('button');
      b.className = 'action-button';
      b.style.cssText = 'padding:3px 8px;font-size:0.75em;min-height:28px;';
      b.textContent = label;
      b.addEventListener('click', () => snooze(taskId, when, row, picker));
      picker.appendChild(b);
    });
    row.after(picker);
  });

  function snooze(taskId, when, row, picker) {
    picker.querySelectorAll('button').forEach(b => b.disabled = true);
    fetch('api/task_action.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ task_id: taskId, action: 'snooze', when }),
    })
    .then(r => r.json())
    .then(d => {
      if (d.ok) {
        picker.remove();
        row.style.transition = 'opacity 0.2s';
        row.style.opacity = '0';
        setTimeout(() => row.remove(), 220);
      }
    })
    .catch(() => { picker.querySelectorAll('button').forEach(b => b.disabled = false); });
  }

  function esc(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }
};
