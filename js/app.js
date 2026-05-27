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
    speechBubble.style.display = 'block';

    fetch(url)
      .then(response => response.text())
      .then(data => {
          speechBubbleContent.innerHTML = data;

          // 🚀 === Execute Inline Scripts === 🚀
          const scripts = speechBubbleContent.querySelectorAll('script');
          scripts.forEach((script) => {
              const newScript = document.createElement('script');
              newScript.textContent = script.textContent;
              document.body.appendChild(newScript);
              document.body.removeChild(newScript);
              });

          console.log("✅ Inline speech bubble scripts executed successfully.");

          // 🔔 Dispatch an event to start the timed progression
          const event = new Event('speechBubbleLoaded');
          speechBubble.dispatchEvent(event);

          })
    .catch(error => {
        speechBubbleContent.innerHTML = "<p>Error loading speech bubble content.</p>";
        console.error('Error:', error);
        });
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
          console.log("✅ Task marked as complete. Pages: " + data.pages + ", Books: " + data.books);

          updateProgressBar(data.pages);

          if (data.pages === 0) {
          alert("📚 You've added a new book to your bookshelf!");
          }

          // Refresh the speech bubble with the next task
          loadSpeechBubble('lets-go.php');
          } else {
          console.error("❌ Error completing task:", data.message);
          }
          })
    .catch(error => console.error('❌ Error:', error));
  }



  function markAsStuck(taskId) {
    alert(`Task ${taskId} is marked as stuck (not yet implemented).`);
  }

  function snoozeTask(taskId) {
    alert(`Task ${taskId} is snoozed (not yet implemented).`);
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

function updateProgressBar(pages) {
  const bar = document.getElementById('progress-bar');
  if (bar) bar.style.width = (pages * 10) + '%';
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

    // Automatically load the speech bubble on page load
    if (!window.BAANABUS_ONBOARDING && !window.BAANABUS_SUPPRESS_BUBBLE) {
      loadSpeechBubble('lets-go.php');
    }
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

