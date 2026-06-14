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

  window._showSnoozePicker = function(taskId, btn) {
    document.querySelectorAll('.day-snooze-picker').forEach(p => p.remove());
    const li = btn.closest('li');

    const today = new Date(); today.setHours(0,0,0,0);
    const dayNames = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    const fmtISO   = d => `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;
    const fmtShort = d => `${dayNames[d.getDay()]} ${d.getDate()}`;
    const opts = [];
    for (let i = 1; i <= 4; i++) {
      const d = new Date(today); d.setDate(today.getDate() + i);
      opts.push([fmtShort(d), fmtISO(d)]);
    }
    const nextMon = new Date(today); nextMon.setDate(today.getDate() + 5);
    while (nextMon.getDay() !== 1) nextMon.setDate(nextMon.getDate() + 1);
    opts.push([`Mon ${nextMon.getDate()}`, fmtISO(nextMon)]);
    opts.push(['In a month',   '1month']);
    opts.push(['After payday', 'payday']);
    opts.push(['In 2 months',  '2months']);
    opts.push(['Someday/maybe', 'someday']);

    const picker = document.createElement('div');
    picker.className = 'day-snooze-picker';
    picker.style.cssText = 'display:flex;gap:4px;flex-wrap:wrap;padding:4px 0;';
    opts.forEach(([label, when]) => {
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
