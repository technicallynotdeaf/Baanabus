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
};
