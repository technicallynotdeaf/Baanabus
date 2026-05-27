# Baanabus — Product Roadmap

**Vision**: A personal life OS disguised as a game. The canvas scene is home base. You tap the sheep, it tells you what to do. You do it. You earn pages. You unlock stories.

**Architecture** (locked):
- 3–4 full-page scenes max; no full-page navigation elsewhere
- Everything else opens in AJAX overlays (bottom-sheet on mobile)
- PRF vault (cassowary.enc) for all sensitive data
- Mobile-first; nothing requires scrolling outside of overlay panels

---

## M0 — Foundation ✅

- ✅ WebAuthn/FIDO2 registration + sign-in (YubiKey USB + Android NFC/Vanadium)
- ✅ PRF vault bootstrap: `config/{userId}/config.enc` + `cassowary.enc`
- ✅ Canvas scene: sheep + bookshelf renders full viewport
- ✅ Overlay system: `loadOverlay()` / `loadSpeechBubble()` in app.js
- ✅ Navbar wired: Let's Go → speech bubble, Tasks/People/Notes/Settings → overlay
- ✅ Mobile CSS: `css/app.css` (body scrollable, `scene-view` locks it for canvas only)
- ✅ fail2ban (apache jails) + ModSecurity DetectionOnly on server
- ✅ Habitica secrets: moved from PHP constants → `cassowary.enc`; `api/integrations.php` for settings

---

## M1 — Working Loop ✅

Make the core task loop functional end-to-end.

- ✅ `api/mark_complete.api.php` — marks task done, updates pages in vault, returns JSON; Habitica scoring wired
- ✅ `updateProgressBar(pages)` in app.js — 10-pip bar on scene, updates on task completion
- ✅ `lets-go.php` — fetches from `api/next_activity.php`; weighted pool (tasks/trivia/minigame/check-in); touch-friendly buttons
- ✅ `markAsDone()` / `markAsStuck()` / `snoozeTask()` — all implemented in app.js
- ✅ Stuck: snoozes task until tomorrow 08:00, sets `stuck: true` flag
- ✅ Snooze: inline time picker (2h / tonight / tomorrow / next week) via `api/task_action.php`
- ✅ `vaultUpdateTask()` helper in config_helper.php
- ✅ `api/settings.php` — settings overlay: nickname, Habitica creds form
- ✅ `brain_dump.php` — quick capture overlay → saves to inbox

---

## M2 — Tasks & People

The two main data views.

- [ ] `list_tasks.php` — tasks overlay: incomplete tasks grouped by urgency; tap to expand; Done/Snooze buttons inline; "Add task" button opens add form sub-panel
- [ ] Add task form: title, context (dropdown), urgency selector; submits via AJAX, refreshes list
- [ ] `list_people.php` — people overlay: contacts list sorted by next_review; overdue contacts highlighted; tap person → person panel
- [ ] Person panel: name, contact notes, task list for that person; "Mark reviewed" / "Snooze 1 day" / "Add note" actions
- [ ] Inbox triage overlay or tab: list inbox items; for each: "Make task" / "Discard"; "Make task" opens add-task form pre-filled from inbox content

---

## M3 — Daily Flow

The daily rhythm that makes the game loop feel intentional.

- ✅ Check-in: energy level (1–5) + day type surfaced via `next_activity.php` when missing for the day
- ✅ Stuck flow: task marked stuck → snoozes until tomorrow, flagged for review
- [ ] `lets-go.php` respects energy: low energy surfaces low-effort tasks first; high energy surfaces high-urgency tasks
- [ ] Day type affects task filtering (e.g., "Home" day = home context tasks)
- [ ] GTD inbox triage: one-question-at-a-time flow in speech bubble; `task_type` changes last; produces next-actions, reference, someday, or deleted
- [ ] Context filter in tasks overlay: quick filter chips (Home / Work / etc.)

---

## M4 — Scene Depth

Make the world feel alive without adding complexity.

- ✅ 6 story books on bookshelf canvas (correct spine colours; book 1 gold-highlighted when unlocked)
- ✅ Paper scraps on floor = count of inbox-type tasks
- ✅ 10-pip progress bar (bottom of scene); fills as tasks are completed; resets when a story page unlocks
- [ ] Sheep click → greeting speech bubble + current task (replace auto-load with click trigger; keep auto on first visit of the day)
- [ ] Time-of-day tint: warm morning / neutral afternoon / cooler evening
- [ ] Daily NPC message: first load of each day shows a short greeting
- [ ] "New book" animation / notification when a story page unlocks

---

## M5 — Storybook Rewards ✅ (first story complete)

The long-term engagement layer.

- ✅ Story format: CYOA nodes keyed `"{page}_{branch}"`, prose + choices, terminal flag; stored in `content/stories/`
- ✅ Story content base64-encoded in source so user can't read ahead in git
- ✅ Story unlock: every 10 completed tasks increments `pages_available` in vault; choices gated by `pages_available > depth`
- ✅ Story reader overlay: `api/story_read.php` — renders current page, shows choices or "earn more tasks" message
- ✅ Choice endpoint: `api/story_choose.php` — validates choice, advances `current_key`, increments depth
- ✅ Story progress saved per story in `config.enc` under `config['stories'][$id]`
- ✅ **The Chai Meridian** — 19-node CYOA story: branching path from Chandrapur tea house to a standing stone above the snowline and grandmother's impossible letter
- [ ] Write stories 2–6 to match remaining book slots

---

## M6 — Integrations ✅ (Habitica)

Connect to services Alison already uses.

- ✅ Habitica sync: `api/habitica_sync.php` — once-per-day pull of todos + checklist items into tasks.enc; deduplicates; triggered silently from `greeting.php`
- ✅ Habitica score-up: `api/mark_complete.api.php` scores back to Habitica when task completed (checklist items + parent todos handled separately)
- ✅ Block task system: Habitica tasks with checklists surface as parent + subtask checklist in speech bubble; children never appear standalone; subtasks check off inline
- ✅ Imported tasks get `task_type: 'inbox'`; paper scraps on floor count inbox tasks only
- [ ] CalDAV (Radicale): pull calendar events → show upcoming events as tasks/reminders
- [ ] CardDAV (Radicale): sync contacts → people directory
- [ ] Proton Mail IMAP: pull unread emails → land in inbox for triage

---

## M7 — Android Companion

- [ ] Android WebView wrapper (PWA-style, fullscreen, no browser chrome)
- [ ] Share target: receive text/URLs from other apps → lands in inbox
- [ ] Push notifications: due tasks / overdue reviews
- [ ] Contact call prompts: before a call, app surfaces person notes + last contact date

---

## Ongoing / Infrastructure

- [ ] CSP headers: move inline `<script>` blocks to external `.js` files first; then add `Content-Security-Policy` header in Apache
- [ ] ModSecurity: switch from DetectionOnly → enforcement (after confirming no false positives in logs)
- [ ] Automated deploy: git push → auto-pull on server (simple post-receive hook)
- [ ] Rate limiting on auth endpoints beyond fail2ban

---

## Next up

M1 is complete. Focus shifts to M3 GTD triage (energy-aware task selection, inbox triage flow) and M2 task/people views.
