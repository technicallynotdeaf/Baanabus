window.initListTasks = function() {
  const btnShow = document.getElementById('btn-show-add');

  if (btnShow) {
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
      const title    = titleIn.value.trim();
      const urgency  = document.getElementById('new-task-urgency').value;
      const location = Array.from(document.querySelectorAll('.new-task-location-cb:checked')).map(cb => cb.value);
      const status   = document.getElementById('add-task-status');
      if (!title) { status.textContent = 'Enter a title first.'; return; }
      status.textContent = 'Saving…';
      fetch('api/add_task.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ title, urgency, location: location.length ? location : null }),
      })
      .then(r => r.json())
      .then(d => {
        if (!d.ok) throw new Error(d.error || 'Failed');
        titleIn.value = '';
        document.querySelectorAll('.new-task-location-cb:checked').forEach(cb => cb.checked = false);
        status.textContent = 'Saved.';
        setTimeout(() => { status.textContent = ''; }, 2000);
        addRowToGroup({ id: d.task_id, title, urgency });
      })
      .catch(e => { status.textContent = e.message; status.style.color = 'crimson'; });
    }

    function addRowToGroup(t) {
      // Quick-add doesn't collect importance, so new rows land in the
      // medium-importance group — matches the server-side default in
      // list_tasks.php's grouping ($t['importance'] ?? 'medium').
      const group = document.querySelector(`.task-group[data-importance="medium"]`);
      if (!group) return;
      const row = document.createElement('div');
      row.className = 'task-row';
      row.dataset.id      = t.id;
      row.dataset.title   = t.title.toLowerCase();
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
  }

  function applyFilters() {
    const searchEl = document.getElementById('task-search');
    const q = searchEl ? (searchEl.value || '').toLowerCase() : '';
    document.querySelectorAll('.task-row').forEach(row => {
      const matchSearch = !q || row.dataset.title.includes(q);
      row.style.display = matchSearch ? '' : 'none';
    });
    document.querySelectorAll('.task-group').forEach(group => {
      const visible = group.querySelectorAll('.task-row:not([style*="display: none"])').length;
      group.style.display = visible ? '' : 'none';
    });
  }

  const taskSearch = document.getElementById('task-search');
  if (taskSearch) taskSearch.addEventListener('input', applyFilters);

  // Delegated on document since task rows are re-rendered on every overlay
  // load; guarded so re-opening this overlay (tab switches, search, etc.)
  // doesn't stack a fresh copy of each listener onto document forever —
  // that stacking was firing every click N times (N = times this overlay
  // had been opened this session), amplifying into request bursts large
  // enough to occasionally race the PHP session lock and produce a stray
  // 403 mid-burst (diagnosed 2026-08-03 from a false ModSecurity-timeout report).
  if (!window._taskListHandlersBound) {
    window._taskListHandlersBound = true;

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
      const btn = e.target.closest('.task-detail-btn');
      if (!btn) return;
      if (typeof window.loadOverlay === 'function') {
        window.loadOverlay(`api/task_detail.php?id=${btn.dataset.id}`);
      }
    });

    document.addEventListener('click', function(e) {
      const btn = e.target.closest('.task-snooze-btn');
      if (!btn) return;
      const taskId = parseInt(btn.dataset.id);
      const row    = btn.closest('.task-row');

      document.querySelectorAll('.snooze-picker').forEach(p => p.remove());

      const taskLocation = row && row.dataset.location ? row.dataset.location.split(',').filter(Boolean) : [];
      const {suggested, rest} = (window.buildSnoozeOpts || (() => ({suggested:[], rest:[]})))(taskLocation);
      const allOpts = suggested.length
        ? [['-- suits this task --', null], ...suggested, ['-- other days --', null], ...rest]
        : rest;

      const picker = document.createElement('div');
      picker.className = 'snooze-picker';
      picker.style.cssText = 'display:flex;gap:4px;flex-wrap:wrap;padding:4px 0;';
      allOpts.forEach(([label, when]) => {
        if (when === null) {
          const sep = document.createElement('div');
          sep.style.cssText = 'width:100%;font-size:0.72em;color:#aaa;padding:2px 0 1px;';
          sep.textContent = label;
          picker.appendChild(sep);
          return;
        }
        const b = document.createElement('button');
        b.className = 'action-button';
        b.style.cssText = when === 'someday'
          ? 'padding:3px 8px;font-size:0.75em;min-height:28px;background:transparent;color:#888;border:1px solid #ccc;'
          : 'padding:3px 8px;font-size:0.75em;min-height:28px;';
        b.textContent = label;
        b.addEventListener('click', () => when === 'someday'
          ? moveToSomeday(taskId, row, picker)
          : snooze(taskId, when, row, picker));
        picker.appendChild(b);
      });
      row.after(picker);
    });
  }

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

  function moveToSomeday(taskId, row, picker) {
    picker.querySelectorAll('button').forEach(b => b.disabled = true);
    fetch('api/task_action.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ task_id: taskId, action: 'someday' }),
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

window.initSnoozedTasks = function() {
  // Guarded for the same reason as initListTasks' delegated listeners above —
  // this overlay can be reopened repeatedly in one session.
  if (window._snoozedTaskHandlersBound) return;
  window._snoozedTaskHandlersBound = true;

  document.addEventListener('click', function(e) {
    const btn = e.target.closest('.task-wake-btn');
    if (!btn) return;
    const taskId = parseInt(btn.dataset.id);
    const row    = btn.closest('.snooze-task-row');
    btn.disabled = true;
    btn.textContent = '...';
    fetch('api/task_action.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ task_id: taskId, action: 'wake' }),
    })
    .then(r => r.json())
    .then(d => {
      if (d.ok) {
        row.style.transition = 'opacity 0.2s';
        row.style.opacity = '0';
        setTimeout(() => {
          row.remove();
          const remaining = document.querySelectorAll('.snooze-task-row').length;
          if (remaining === 0) {
            const list = document.querySelector('[data-init="initSnoozedTasks"]');
            if (list) list.innerHTML += '<p class="muted" style="text-align:center;padding:2rem 0;">Nothing snoozed.</p>';
          }
        }, 220);
      } else {
        btn.disabled = false;
        btn.textContent = 'Wake now';
      }
    })
    .catch(() => { btn.disabled = false; btn.textContent = 'Wake now'; });
  });

  document.addEventListener('click', function(e) {
    const btn = e.target.closest('.task-unschedule-btn');
    if (!btn) return;
    const taskId = parseInt(btn.dataset.id);
    const row    = btn.closest('.snooze-task-row');
    btn.disabled = true;
    btn.textContent = '...';
    fetch('api/schedule_task.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ task_id: taskId, scheduled_date: null }),
    })
    .then(r => r.json())
    .then(d => {
      if (d.ok) {
        row.style.transition = 'opacity 0.2s';
        row.style.opacity = '0';
        setTimeout(() => {
          row.remove();
          const remaining = document.querySelectorAll('.snooze-task-row').length;
          if (remaining === 0) {
            const list = document.querySelector('[data-init="initSnoozedTasks"]');
            if (list) list.innerHTML += '<p class="muted" style="text-align:center;padding:2rem 0;">Nothing snoozed.</p>';
          }
        }, 220);
      } else {
        btn.disabled = false;
        btn.textContent = 'Unschedule';
      }
    })
    .catch(() => { btn.disabled = false; btn.textContent = 'Unschedule'; });
  });

};
