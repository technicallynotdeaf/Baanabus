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

- ✅ `list_tasks.php` — tasks overlay: incomplete tasks grouped by urgency; Done/Snooze inline; inbox banner; search
- ✅ Add task form: title + urgency + context selectors; submits via AJAX, adds row to group live
- ✅ `list_people.php` — people overlay: contacts grouped by overdue/this week/upcoming/no date; search; archived contacts collapsed
- ✅ Person panel: circles, birthday, traits, tasks, notes (add inline); Mark reviewed / Snooze 1 week / Archive actions
- [ ] Inbox triage: full GTD flow lives in speech bubble (lets-go.php); may want a standalone triage overlay too

---

## M2.5 — Trivia & Minigame Quality

- [ ] Trivia: track answered questions per user in SQLite (`trivia_answers` table: question_hash, correct, answered_at); avoid repeating questions until pool is exhausted; surface previously wrong answers more often (simple spaced repetition)
- [ ] Trivia: expand question pool by category (history, science, language, geography)
- ✅ Minigames: 9 distinct games (tictactoe, numguess, rps, mathquiz, truefalse, sequence, reaction, wordscramble, highlow)
- ✅ Minigames: no-repeat logic — same game and same activity type never appear twice in a row

---

## M3 — Daily Flow

The daily rhythm that makes the game loop feel intentional.

- ✅ Check-in: energy level (1–5) + day type surfaced via `next_activity.php` when missing for the day
- ✅ Stuck flow: task marked stuck → snoozes until tomorrow, flagged for review
- ✅ Energy-aware task selection: weighted pool in `next_activity.php` matches task energy to today's level
- ✅ GTD inbox triage: full flow in speech bubble (rename, urgency, next_action+date, project+subtask, waiting, someday, delete)
- [ ] Day type → passive context filter: home day suppresses tasks tagged work/office; work day suppresses home tasks. Happens automatically in `getDoableTasks()` based on today's diary entry — no user action needed.
- [ ] Context chips in task list overlay = **planning mode only**: pick a context to see all tasks in that bucket at once. Not a real-time filter for "what can I do now" — that's the passive filter above.

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
- [ ] **Badges notice board** — pinboard/corkboard on the wall beside the bookshelf, rendered on canvas; badges earned for milestones (tasks completed, streak, triage cleared, trivia correct, minigame wins, story progress, etc.); badges stored in vault config; clicking the board opens a badges overlay showing earned + locked badges with descriptions

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

- [ ] Vault backup: authenticated download of decrypted JSON (all vault files: tasks, people, people_notes, config) — decision pending on format (encrypted vs plain)
- [ ] CSP headers: move inline `<script>` blocks to external `.js` files first; then add `Content-Security-Policy` header in Apache
- [ ] ModSecurity: switch from DetectionOnly → enforcement (after confirming no false positives in logs)
- [ ] Automated deploy: git push → auto-pull on server (simple post-receive hook)
- [ ] Rate limiting on auth endpoints beyond fail2ban

---

## Next up

M0–M2 and most of M3 are complete. Likely candidates: M3 context filtering (day type → surfaces matching tasks), M4 scene depth (sheep click, time-of-day tint, daily greeting), or infra quick wins (auto-deploy hook).
