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
          const initEl = overlayContent.querySelector('[data-init]');
          if (initEl) {
            const fn = window[initEl.dataset.init];
            if (typeof fn === 'function') fn();
          }
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
          const initEl = speechBubbleContent.querySelector('[data-init]');
          if (initEl) {
            const fn = window[initEl.dataset.init];
            if (typeof fn === 'function') fn();
          }
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
    fetch(`api/mark_complete.api.php?task_id=${taskId}`)
      .then(r => r.json())
      .then(data => {
        if (data.success) {
          updateProgressBar(data.pages, data.pages_target, data.total_pages);
          if (data.newStoryPage && typeof window.refreshScene === 'function') {
            window.refreshScene();
          }
          if (data.bookUnlocked) {
            const ac = document.getElementById('activity-container');
            if (ac) {
              ac.innerHTML = `
                <p style="font-weight:600;margin-bottom:0.4rem;">You've earned a story page.</p>
                <p style="color:#555;font-size:0.92em;line-height:1.5;margin-bottom:0.75rem;">
                  Open the bookshelf and choose a book — your page will be waiting there.
                </p>
                <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Nice one</button>`;
              return;
            }
          }
          if (data.callout) {
            const ac = document.getElementById('activity-container');
            if (ac) {
              const safe = data.callout.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
              ac.innerHTML = `<p style="line-height:1.6;margin-bottom:0.75rem;">${safe}</p>
                <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Next</button>`;
              return;
            }
          }
          loadSpeechBubble('lets-go.php');
        } else {
          console.error('mark_complete error:', data.message);
        }
      })
      .catch(err => console.error('mark_complete fetch error:', err));
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
      {label: '2 hours',    when: '2h'},
      {label: 'Tonight',    when: 'tonight'},
      {label: 'Tomorrow',   when: 'tomorrow'},
      {label: 'Next week',  when: 'week'},
      {label: 'After payday', when: 'payday'},
      {label: 'In 2 months',  when: '2months'},
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


  const food_log_link = document.getElementById('food-log-link');
  if (food_log_link) {
    food_log_link.addEventListener('click', (e) => {
      e.preventDefault();
      loadOverlay('api/food_log_overlay.php');
    });
  }

  const settings_link = document.getElementById('settings-page-link');
  if (settings_link) {
    settings_link.addEventListener('click', (e) => {
        e.preventDefault();
        loadOverlay('api/settings.php');
        });
  }

  const story_link = document.getElementById('story-book-link');
  if (story_link) {
    story_link.addEventListener('click', (e) => {
        e.preventDefault();
        loadOverlay('api/story_books.php');
        });
  }

  // Navbar context dropdowns — energy and location
  ['nav-energy', 'nav-daytype'].forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('change', function() {
      const field = id === 'nav-energy' ? 'energy_level' : 'day_type';
      const val   = parseInt(this.value);
      fetch('api/checkin.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({field, value: val}),
      });
    });
  });

  const resetBtn = document.getElementById('reset-btn');
  if (resetBtn) {
    if (resetBtn.dataset.tired === '1') resetBtn.classList.add('active');
    resetBtn.addEventListener('click', () => {
        // Set energy to Low for today, then find the smallest task
        fetch('api/checkin.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({field: 'energy_level', value: 2}),
        }).then(r => r.json()).then(d => {
            if (d.ok) {
                resetBtn.dataset.tired = '1';
                resetBtn.classList.add('active');
            }
        }).catch(() => {});
        loadSpeechBubble('lets-go.php?reset=1');
    });
  }

  const logoutLink = document.getElementById('logout-link');
  if (logoutLink) {
    logoutLink.addEventListener('click', (e) => {
        if (!confirm('Log out?')) e.preventDefault();
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
      if (e.target === overlay && !window._gemMatchActive) {
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

function updateProgressBar(pages, target, totalPages) {
  const fill = document.getElementById('scene-progress-fill');
  const bar  = document.getElementById('scene-progress');
  if (!fill) return;
  const t   = target || parseInt(bar && bar.dataset.target, 10) || 15;
  const pct = Math.min(100, Math.round((pages / t) * 100));
  fill.style.width = pct + '%';
  if (bar) bar.dataset.target = t;
  if (totalPages !== undefined) {
    const tot = document.getElementById('scene-total-pips');
    if (tot) tot.textContent = '★ ' + totalPages;
  }
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
    fetch('api/habitica_sync.php').catch(() => {});

    // Morning mode lockout — prevent nav overlays until daily sequence is done
    if (document.body.classList.contains('morning-mode')) {
        const blockedIds = ['story-book-link', 'note-to-self', 'people-book', 'task-list'];
        blockedIds.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('click', e => {
                e.preventDefault();
                e.stopImmediatePropagation();
                loadSpeechBubble('greeting.php');
            }, { capture: true });
        });
        // Also block calendar link
        const calLink = document.querySelector('.navbar a[href="scene2.php"]');
        if (calLink) calLink.addEventListener('click', e => {
            e.preventDefault();
            loadSpeechBubble('greeting.php');
        }, { capture: true });
    }
    });

// close buttons/backdrop
overlay.addEventListener('click', e => {
  if ((e.target.matches('#overlay') || e.target.matches('.overlay-close')) && !window._gemMatchActive) hideOverlay();
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

