// ===========================
// global consts for things we reference... 
//
const letsGoLink = document.getElementById('lets-go');
const speechBubble = document.getElementById('speechBubble');
const speechBubbleContent = document.getElementById('speechBubble-body');
const closeSpeechBubble = document.getElementById('close-speechBubble');


// ============================
// All function definitions go here
// ============================

function setupOverlayListeners() {
  const overlay = document.getElementById('overlay');
  const overlayContent = document.getElementById('overlay-body');
  const closeOverlay = document.getElementById('close-overlay');

  // Helper function to fetch and display content
  const loadOverlay = (url) => {
    overlay.style.display = 'block';
    fetch(url)
      .then(response => response.text())
      .then(data => {
          overlayContent.innerHTML = data;

          // 🚀 === Execute Inline Scripts === 🚀
          const scripts = overlayContent.querySelectorAll('script');
          scripts.forEach((script) => {
              const newScript = document.createElement('script');
              newScript.textContent = script.textContent;
              document.body.appendChild(newScript);
              document.body.removeChild(newScript);
              });

          console.log("✅ Inline scripts executed successfully.");
          })
    .catch(error => {
        overlayContent.innerHTML = "<p>Error loading content.</p>";
        console.error('Error:', error);
        });
  };

  window.loadOverlay = loadOverlay;

  // Helper function to fetch and display content
  const loadSpeechBubble = (url) => {
    fetch(url)
      .then(response => {
          if (!response.ok) return null;
          return response.text();
          })
      .then(data => {
          if (!data) return;
          speechBubble.style.display = 'block';
          speechBubbleContent.innerHTML = data;

          const scripts = speechBubbleContent.querySelectorAll('script');
          scripts.forEach((script) => {
              const newScript = document.createElement('script');
              newScript.textContent = script.textContent;
              document.body.appendChild(newScript);
              document.body.removeChild(newScript);
              });

          const event = new Event('speechBubbleLoaded');
          speechBubble.dispatchEvent(event);
          })
      .catch(error => console.error('Speech bubble load error:', error));
  };

  window.loadSpeechBubble = loadSpeechBubble;

  // ============================
  // Lets-Go AJAX Handlers
  // ============================

  function markAsDone(taskId) {
    const url = `api/mark_complete.api.php?task_id=${taskId}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
          if (data.success) {
          updateProgressBar(data.pages, data.pages_target);
          if (data.newStoryPage && typeof window.refreshScene === 'function') {
              window.refreshScene();
          }
          loadSpeechBubble('lets-go.php');
          } else {
          console.error('mark_complete error:', data.message);
          }
          })
    .catch(error => console.error('mark_complete fetch error:', error));
  }



  function markAsStuck(taskId) {
    const c = document.getElementById('activity-container');
    if (!c) return;
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;">OK — coming back to this tomorrow.</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="action-button" id="stuck-confirm">Got it</button>
        <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Cancel</button>
      </div>`;
    document.getElementById('stuck-confirm').addEventListener('click', () => {
      fetch('api/task_action.php', {
        method:  'POST',
        headers: {'Content-Type': 'application/json'},
        body:    JSON.stringify({task_id: taskId, action: 'stuck'}),
      }).then(() => loadSpeechBubble('lets-go.php'))
        .catch(() => loadSpeechBubble('lets-go.php'));
    });
  }

  function snoozeTask(taskId) {
    const c = document.getElementById('activity-container');
    if (!c) return;
    const opts = [
      {label: '2 hours',   when: '2h'},
      {label: 'Tonight',   when: 'tonight'},
      {label: 'Tomorrow',  when: 'tomorrow'},
      {label: 'Next week', when: 'week'},
    ];
    const btns = opts.map(o =>
      `<button class="action-button" data-when="${o.when}">${o.label}</button>`
    ).join('');
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;">Snooze until?</p>
      <div id="snooze-opts" style="display:flex;gap:8px;flex-wrap:wrap;">${btns}
        <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Cancel</button>
      </div>`;
    document.getElementById('snooze-opts').addEventListener('click', (e) => {
      const btn = e.target.closest('[data-when]');
      if (!btn) return;
      document.querySelectorAll('#snooze-opts button').forEach(b => b.disabled = true);
      fetch('api/task_action.php', {
        method:  'POST',
        headers: {'Content-Type': 'application/json'},
        body:    JSON.stringify({task_id: taskId, action: 'snooze', when: btn.dataset.when}),
      }).then(() => loadSpeechBubble('lets-go.php'))
        .catch(() => loadSpeechBubble('lets-go.php'));
    });
  }

  window.markAsStuck = markAsStuck;
  window.snoozeTask = snoozeTask;
  window.markAsDone = markAsDone;

  // ============================
  // Event Listeners for Navbar 
  // ============================

  if (letsGoLink) {
    letsGoLink.addEventListener('click', (e) => {
        e.preventDefault();
        loadSpeechBubble('lets-go.php');
        });
  }

  const noteToSelf = document.getElementById('note-to-self');
  if (noteToSelf) {
    noteToSelf.addEventListener('click', (e) => {
        e.preventDefault();
        loadOverlay('brain_dump.php?mode=capture');
        });
  }

  const peoplebook_link = document.getElementById('people-book');
  if (peoplebook_link ) {
    peoplebook_link.addEventListener('click', (e) => {
        e.preventDefault();
        loadOverlay('list_people.php');
        });
  }
  const tasklist_link = document.getElementById('task-list');
  if (tasklist_link) {
    tasklist_link.addEventListener('click', (e) => {
        e.preventDefault();
        loadOverlay('list_tasks.php');
        });
  }

  const settings_link = document.getElementById('settings-page-link');
  if (settings_link) {
    settings_link.addEventListener('click', (e) => {
        e.preventDefault();
        loadOverlay('api/settings.php');
        });
  }

  // ============================
  // Close Listeners 
  // ============================
  closeOverlay.addEventListener('click', function() {
      overlay.style.display = 'none';
      overlayContent.innerHTML = "";
      });

  closeSpeechBubble.addEventListener('click', function() {
      speechBubble.style.display = 'none';
      speechBubbleContent.innerHTML = "";
      });

  window.addEventListener('click', function(e) {
      if (e.target === overlay) {
      overlay.style.display = 'none';
      overlayContent.innerHTML = "";
      }
      });

  window.addEventListener('click', function(e) {
      if (e.target === speechBubble) {
      speechBubble.style.display = 'none';
      speechBubbleContent.innerHTML = "";
      }
      });
}

// app.js (or a small overlay.js)
// Authentication overlay
const overlay = document.getElementById('overlay');            // your existing overlay
const overlayBody = document.getElementById('overlay-body');   // inner scroll area/content
function showOverlay(){ if(overlay) overlay.style.display='flex'; if(document.body) document.body.style.overflow='hidden'; }
function hideOverlay(){ if(overlay) overlay.style.display='none'; if(document.body) document.body.style.overflow=''; if(overlayBody) overlayBody.innerHTML=''; }

function spawnStarPip() {
  const bar = document.getElementById('scene-progress');
  if (!bar) return;
  const barRect = bar.getBoundingClientRect();
  const barCx   = barRect.left + barRect.width  / 2;
  const barCy   = barRect.top  + barRect.height / 2;
  const startX  = window.innerWidth  / 2 + (Math.random() - 0.5) * 50;
  const startY  = window.innerHeight * 0.38;

  const el = document.createElement('div');
  el.className   = 'star-pip';
  el.textContent = '★';
  el.style.left  = startX + 'px';
  el.style.top   = startY + 'px';
  el.style.setProperty('--dx', (barCx - startX) + 'px');
  el.style.setProperty('--dy', (barCy - startY) + 'px');
  document.body.appendChild(el);
  setTimeout(() => el.parentNode && el.parentNode.removeChild(el), 900);
}

function updateProgressBar(pages, target) {
  const fill = document.getElementById('scene-progress-fill');
  const bar  = document.getElementById('scene-progress');
  if (!fill) return;
  const t   = target || parseInt(bar && bar.dataset.target, 10) || 15;
  const pct = Math.min(100, Math.round((pages / t) * 100));
  fill.style.width = pct + '%';
  if (bar) bar.dataset.target = t;
  spawnStarPip();
}

// ============================
// Call the initializers
// ============================
document.addEventListener('DOMContentLoaded', () => {
    console.log("Page Loaded - Setting up Listeners");
    setupOverlayListeners();

    // Set up create config button
    const createConfigBtn = document.getElementById('openCreateConfig');
    if (createConfigBtn) {
      createConfigBtn.addEventListener('click', e => {
        e.preventDefault();
        showOverlay();
        fetch('create_config.php?partial=1', {
          headers: {'X-Requested-With': 'XMLHttpRequest'},
          credentials: 'same-origin'
        })
          .then(r => r.text())
          .then(html => {
            if (overlayBody) overlayBody.innerHTML = html;
          })
          .catch(err => {
            if (overlayBody) overlayBody.innerHTML = `<p style="color:crimson">Error: ${err}</p>`;
          });
      });
    }

    loadSpeechBubble('greeting.php');
    });

// close buttons/backdrop
overlay.addEventListener('click', e => {
  if (e.target.matches('#overlay') || e.target.matches('.overlay-close')) hideOverlay();
});

// Handle the create-config form submit inside the overlay (AJAX)
overlay.addEventListener('submit', async (e) => {
  if (!e.target.matches('#createConfigForm')) return;
  e.preventDefault();
  const status = overlayBody.querySelector('#createCfgStatus');
  status.textContent = 'Working…';
  try {
    const resp = await fetch('create_config.php?partial=1', {
      method: 'POST',
      headers: {'X-Requested-With':'XMLHttpRequest'},
      body: new FormData(e.target),
      credentials: 'same-origin'
    });
    const html = await resp.text();
    overlayBody.innerHTML = html;               // re-render form + messages
    // if server echoed a success flag, optionally auto-close + reload
    if (overlayBody.querySelector('[data-cfg-created="1"]')) {
      setTimeout(()=>{ hideOverlay(); location.reload(); }, 500);
    }
  } catch (err) {
    status.textContent = `❌ ${err}`;
    status.style.color = 'crimson';
  }
});

