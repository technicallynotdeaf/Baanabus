// Shared "small" task info renderer — used anywhere a task needs to show its
// description/subtasks/tags consistently (speech bubble task cards, morning
// review, block tasks). Returns an HTML string, not a DOM node, to match the
// c.innerHTML = `...` pattern used throughout lets_go.js.
//
// task shape: {id, title, description?, subtasks?: [{id, title}], context?,
//              time?, person_name?}
// opts.interactive: if true, subtask rows get a "Done" button that calls
//   mark_complete.api.php directly (used in the speech bubble). If false,
//   subtasks render as a plain read-only list.

(function() {
  function esc(s) {
    return String(s)
      .replace(/&/g, '&amp;').replace(/</g, '&lt;')
      .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  window.renderTaskInfo = function(task, opts) {
    opts = opts || {};
    const parts = [];

    if (task.description) {
      parts.push(`<p style="font-size:0.88em;color:#666;line-height:1.5;margin:0.3rem 0 0.5rem;">${esc(task.description)}</p>`);
    }

    const tags = [];
    if (task.person_name) tags.push(`with ${esc(task.person_name)}`);
    if (task.context)     tags.push(esc(task.context));
    if (task.time)        tags.push(`${parseInt(task.time)} min`);
    if (tags.length) {
      parts.push(`<p style="font-size:0.75em;color:#bbb;margin:0.2rem 0;">${tags.join(' &middot; ')}</p>`);
    }

    if (task.subtasks && task.subtasks.length) {
      const rows = task.subtasks.map(s => {
        const doneBtn = opts.interactive
          ? `<button class="action-button" data-id="${s.id}"
               style="flex-shrink:0;padding:0.2rem 0.6rem;font-size:0.82em;"
               onclick="window._taskCardSubtaskDone(${s.id}, this)">Done</button>`
          : '';
        return `<div class="subtask-row" data-id="${s.id}" style="display:flex;align-items:flex-start;gap:8px;padding:0.3rem 0;border-bottom:1px solid rgba(0,0,0,0.06);">
          <span style="flex:1;line-height:1.4;font-size:0.92em;">${esc(s.title)}</span>${doneBtn}</div>`;
      }).join('');
      parts.push(`<div class="task-card-subtasks" id="subtask-list" style="margin-top:0.3rem;">${rows}</div>`);
    }

    if (task.id && opts.showDetailLink !== false && typeof window.loadOverlay === 'function') {
      parts.push(`<a href="#" onclick="event.preventDefault();loadOverlay('api/task_detail.php?id=${task.id}')"
        style="font-size:0.78em;color:#8b7355;display:inline-block;margin-top:0.3rem;">View / edit full details</a>`);
    }

    return parts.join('');
  };

  // Shared handler for interactive subtask "Done" buttons rendered above.
  window._taskCardSubtaskDone = function(taskId, btn) {
    const row = btn.closest('.subtask-row');
    btn.disabled = true;
    row.style.transition = 'opacity 0.2s';
    row.style.opacity = '0';
    fetch(`api/mark_complete.api.php?task_id=${taskId}`)
      .then(r => r.json())
      .then(data => {
        if (data.success) {
          if (typeof updateProgressBar === 'function') updateProgressBar(data.pages, data.pages_target, data.total_pages);
          if (data.newStoryPage && typeof window.refreshScene === 'function') window.refreshScene();
          setTimeout(() => {
            row.remove();
            if (!document.querySelector('#subtask-list .subtask-row') && typeof window.loadSpeechBubble === 'function') {
              loadSpeechBubble('lets-go.php');
            }
          }, 220);
        } else {
          btn.disabled = false;
          row.style.opacity = '1';
        }
      })
      .catch(() => { btn.disabled = false; row.style.opacity = '1'; });
  };
})();
