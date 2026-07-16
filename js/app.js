// ===========================
// Top 3 celebration hook — every API call in the app goes through fetch(), so
// wrapping it once here catches `top3_completed` on any JSON response without
// having to thread it through each individual call site. The scene draws the
// actual jars and owns window.celebrateTop3 (only defined when #sceneCanvas
// is on the page); elsewhere this just no-ops.
(function () {
  const origFetch = window.fetch;
  window.fetch = function (...args) {
    return origFetch.apply(this, args).then(response => {
      if (response.ok) {
        response.clone().json().then(data => {
          if (data && Array.isArray(data.top3_completed) && data.top3_completed.length && window.celebrateTop3) {
            window.celebrateTop3(data.top3_completed);
          }
        }).catch(() => {});
      }
      return response;
    });
  };
})();

// ===========================
// Snooze picker option builder — used by list_tasks, day_tasks, lets_go
// Returns {suggested: [[label,when],...], rest: [[label,when],...]}
// 'suggested' = upcoming days whose scheduled type matches the task's location
window.buildSnoozeOpts = function(taskLocation) {
  const compatMap = {
    work:  [2, 5],
    home:  [1, 4, 5],
    shops: [1, 3],
    phone: [1, 2, 4, 5],
    // online/null/anywhere: no preference — skip suggested
  };
  const compatible = compatMap[taskLocation] || null;
  const schedule   = window._weeklySchedule || {};
  const upcoming   = window._upcomingDayTypes || {};
  const hasData    = compatible !== null && (
    Object.values(schedule).some(v => v != null) ||
    Object.keys(upcoming).length > 0
  );

  const today    = new Date(); today.setHours(0,0,0,0);
  const dayNames = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
  const fmtISO   = d => `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;
  const fmtShort = d => `${dayNames[d.getDay()]} ${d.getDate()}`;

  function dtypeFor(d) {
    const iso = fmtISO(d);
    if (upcoming[iso] != null) return parseInt(upcoming[iso]);   // diary override
    if (schedule[d.getDay()] != null) return parseInt(schedule[d.getDay()]); // weekly default
    return null;
  }

  const suggested = [], rest = [];
  const seen = new Set();

  for (let i = 1; i <= 7; i++) {
    const d = new Date(today); d.setDate(today.getDate() + i);
    const iso = fmtISO(d); seen.add(iso);
    const dtype = dtypeFor(d);
    const fits  = hasData && compatible !== null && dtype !== null && compatible.includes(dtype);
    (fits ? suggested : rest).push([fmtShort(d), iso]);
  }
  // Next Monday beyond the 7-day window if not already seen
  const nextMon = new Date(today); nextMon.setDate(today.getDate() + 8);
  while (nextMon.getDay() !== 1) nextMon.setDate(nextMon.getDate() + 1);
  const nextMonIso = fmtISO(nextMon);
  if (!seen.has(nextMonIso)) {
    const dtype = dtypeFor(nextMon);
    const fits  = hasData && compatible !== null && dtype !== null && compatible.includes(dtype);
    (fits ? suggested : rest).push([`Mon ${nextMon.getDate()}`, nextMonIso]);
  }

  rest.push(['In a month',   '1month']);
  rest.push(['After payday', 'payday']);
  rest.push(['In 2 months',  '2months']);
  rest.push(['Someday/maybe','someday']);

  return { suggested, rest };
};

// ===========================
// Loading-state copy for the speech bubble — shown immediately on trigger so a
// slow server response never reads as the app having done nothing. lets_go.js
// rotates through these while its own next_activity.php fetch is in flight.
window.LOADING_LINES = [
  "One sec…",
  "Finding the next thing…",
  "Nearly there…",
  "Hang tight…",
  "Just a moment…",
];
window.pickLoadingLine = function() {
  return window.LOADING_LINES[Math.floor(Math.random() * window.LOADING_LINES.length)];
};

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
    overlayContent.innerHTML = '<p style="color:#999;font-size:0.9em;padding:0.5rem 0;">Loading…</p>';
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
    speechBubble.style.display = 'block';
    speechBubbleContent.innerHTML = '<p class="muted">' + window.pickLoadingLine() + '</p>';
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
    const today = new Date(); today.setHours(0,0,0,0);
    const dayNames = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    const fmtISO   = d => `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;
    const fmtShort = d => `${dayNames[d.getDay()]} ${d.getDate()}`;
    const opts = [];
    for (let i = 1; i <= 4; i++) {
      const d = new Date(today); d.setDate(today.getDate() + i);
      opts.push({label: fmtShort(d), when: fmtISO(d)});
    }
    const nextMon = new Date(today); nextMon.setDate(today.getDate() + 5);
    while (nextMon.getDay() !== 1) nextMon.setDate(nextMon.getDate() + 1);
    opts.push({label: `Mon ${nextMon.getDate()}`, when: fmtISO(nextMon)});
    opts.push({label: 'In a month',   when: '1month'});
    opts.push({label: 'After payday', when: 'payday'});
    opts.push({label: 'In 2 months',  when: '2months'});
    const btns = opts.map(o =>
      `<button class="action-button" data-when="${o.when}">${o.label}</button>`
    ).join('');
    c.innerHTML = `
      <p style="margin-bottom:0.75rem;">Snooze until?</p>
      <div id="snooze-opts" style="display:flex;gap:8px;flex-wrap:wrap;">${btns}
        <button class="action-button" data-when="someday" style="background:transparent;color:#888;border:1px solid #ccc;">Someday/maybe</button>
        <button class="action-button" onclick="loadSpeechBubble('lets-go.php')">Cancel</button>
      </div>`;
    document.getElementById('snooze-opts').addEventListener('click', (e) => {
      const btn = e.target.closest('[data-when]');
      if (!btn) return;
      document.querySelectorAll('#snooze-opts button').forEach(b => b.disabled = true);
      const when = btn.dataset.when;
      const body = when === 'someday'
        ? {task_id: taskId, action: 'someday'}
        : {task_id: taskId, action: 'snooze', when};
      fetch('api/task_action.php', {
        method:  'POST',
        headers: {'Content-Type': 'application/json'},
        body:    JSON.stringify(body),
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


  // Navbar context dropdowns — energy and location
  ['nav-energy', 'nav-daytype'].forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('change', function() {
      const field = id === 'nav-energy' ? 'energy_level' : 'location';
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

    // Keep-alive ping — refreshes the session's mtime so a tab left open
    // through a longer task (or backgrounded on mobile) doesn't come back to
    // a dead session. Fires on an interval and again whenever the tab
    // regains focus, since mobile browsers throttle background timers.
    const sendHeartbeat = () => fetch('api/heartbeat.php', { credentials: 'same-origin' }).catch(() => {});
    setInterval(sendHeartbeat, 30 * 1000);
    document.addEventListener('visibilitychange', () => {
        if (document.visibilityState === 'visible') sendHeartbeat();
    });

    // Morning mode lockout — prevent nav overlays until daily sequence is done
    if (document.body.classList.contains('morning-mode')) {
        const blockedIds = ['note-to-self', 'people-book', 'task-list'];
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

