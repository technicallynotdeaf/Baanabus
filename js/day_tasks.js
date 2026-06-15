window.initDayTasks = function() {
  window._showPicker = function() {
    document.getElementById('task-picker').style.display = 'block';
    document.getElementById('add-btn').style.display = 'none';
  };

  window._addToDay = function(taskId, date, btn) {
    btn.disabled = true;
    fetch('api/schedule_task.php', {
      method:  'POST',
      headers: {'Content-Type': 'application/json'},
      body:    JSON.stringify({task_id: taskId, scheduled_date: date}),
    })
    .then(r => r.json())
    .then(data => {
      if (data.ok) {
        if (window.calendarInvalidate) window.calendarInvalidate(date.substring(0, 7));
        btn.remove();
        const list = document.getElementById('day-task-list');
        if (!list) {
          document.querySelector('#add-section').insertAdjacentHTML('beforebegin',
            '<ul id="day-task-list" style="list-style:none;margin:0 0 1rem;padding:0;"></ul>');
        }
        document.getElementById('day-task-list').insertAdjacentHTML('beforeend',
          `<li style="padding:0.5rem 0;border-bottom:1px solid #f0ede6;">${btn.textContent.trim()}</li>`
        );
      } else {
        btn.disabled = false;
        alert(data.error || 'Could not schedule task.');
      }
    })
    .catch(() => { btn.disabled = false; });
  };

  window._removeFromDay = function(taskId, date) {
    const li = document.querySelector(`[data-id="${taskId}"]`);
    if (li) li.style.opacity = '0.4';
    fetch('api/schedule_task.php', {
      method:  'POST',
      headers: {'Content-Type': 'application/json'},
      body:    JSON.stringify({task_id: taskId, scheduled_date: null}),
    })
    .then(r => r.json())
    .then(data => {
      if (data.ok) {
        if (window.calendarInvalidate) window.calendarInvalidate(date.substring(0, 7));
        if (li) li.remove();
      } else {
        if (li) li.style.opacity = '1';
      }
    })
    .catch(() => { if (li) li.style.opacity = '1'; });
  };

  window._doneFromDay = function(taskId, btn) {
    const li = btn.closest('li');
    if (li) li.style.opacity = '0.4';
    fetch('api/mark_complete.api.php?task_id=' + taskId, {method: 'POST'})
      .then(r => r.json())
      .then(data => {
        if (data.ok) {
          if (li) li.remove();
          if (typeof updateProgressBar === 'function')
            updateProgressBar(data.pages, data.pages_target, data.total_pages);
        } else {
          if (li) li.style.opacity = '1';
        }
      })
      .catch(() => { if (li) li.style.opacity = '1'; });
  };

  window._toggleDayTypePicker = function() {
    const p = document.getElementById('day-type-picker');
    if (p) p.style.display = p.style.display === 'none' ? 'block' : 'none';
  };

  window._setDayType = function(val, name, btn) {
    const picker = document.getElementById('day-type-picker');
    const badge  = document.getElementById('day-type-badge');
    // Highlight the active button
    if (picker) picker.querySelectorAll('button').forEach(b => {
      b.style.background = ''; b.style.color = '#666'; b.style.border = '1px solid #ccc';
    });
    if (btn) { btn.style.background = '#5a4a1e'; btn.style.color = '#fff'; btn.style.border = ''; }

    // Read the date from the overlay URL or data attribute
    const overlay = document.getElementById('overlay-body');
    const dateEl  = overlay ? overlay.querySelector('[data-date]') : null;
    const date    = dateEl ? dateEl.dataset.date : null;
    if (!date) return;

    fetch('api/checkin.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({field: 'day_type', value: val, date}),
    })
    .then(r => r.json())
    .then(data => {
      if (data.ok) {
        if (badge) badge.firstChild.textContent = name + ' ';
        // Update client-side cache so snooze picker sees new day type immediately
        if (window._upcomingDayTypes) window._upcomingDayTypes[date] = val;
        if (picker) picker.style.display = 'none';
      }
    });
  };

  window._showSnoozePicker = function(taskId, btn) {
    document.querySelectorAll('.day-snooze-picker').forEach(p => p.remove());
    const li = btn.closest('li');
    const taskLocation = li ? (li.dataset.location || null) : null;

    const {suggested, rest} = (window.buildSnoozeOpts || (() => ({suggested:[], rest:[]})))(taskLocation);
    const allOpts = suggested.length
      ? [['-- suits this task --', null], ...suggested, ['-- other days --', null], ...rest]
      : rest;

    const picker = document.createElement('div');
    picker.className = 'day-snooze-picker';
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
      b.addEventListener('click', () => {
        picker.querySelectorAll('button').forEach(x => x.disabled = true);
        if (li) li.style.opacity = '0.4';
        const action = when === 'someday' ? 'someday' : 'snooze';
        const body   = when === 'someday'
          ? {task_id: taskId, action: 'someday'}
          : {task_id: taskId, action: 'snooze', when};
        fetch('api/task_action.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify(body),
        })
        .then(r => r.json())
        .then(data => {
          if (data.ok) { picker.remove(); if (li) li.remove(); }
          else { picker.querySelectorAll('button').forEach(x => x.disabled = false); if (li) li.style.opacity = '1'; }
        })
        .catch(() => { picker.querySelectorAll('button').forEach(x => x.disabled = false); if (li) li.style.opacity = '1'; });
      });
      picker.appendChild(b);
    });
    if (li) li.after(picker);
  };
};
