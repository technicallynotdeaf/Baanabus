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
- [ ] Pre-visit reminder: before you see someone, surface what you were going to do for them / ask them. Could be a speech bubble activity type ("You're seeing Jordan soon — here's what you had noted") or a manual trigger from the person panel.
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

## M3.5 — Warmth & Wellbeing

The mental health layer — built into Baanabus's character, never announced.
Full design philosophy: `mental-health-features.md` (light patterns, duty of care, intentional absences).

- ✅ Return welcome — first interaction after a gap (≥1 day) opens with a warm shame-free message; `last_seen_date` tracked in `config.enc`
- ✅ Fun task daily rotation — one playful micro-task per session in the activity pool (star jumps, look at the sky, draw something badly, etc.)
- ✅ Easy-task roster — micro-tasks that count as real completions (drink water, box breathing, tidy one thing); 2 pool slots on low-energy days
- ✅ Blocked button — replaces Stuck; six choice buttons with smart routing per reason:
  - *Wrong place* → snooze 4h
  - *Not enough energy* → set task energy to High, snooze until tomorrow
  - *Need a longer block* → snooze 4h
  - *Waiting on something else* → snooze until tomorrow
  - *Not sure what to do with it* → returns task to inbox for re-triage
  - *Waiting for a specific date* → date picker, snooze until chosen date
- [ ] Effort acknowledgement — completing a high-urgency or long-deferred task earns a specific callout beyond just a pip
- [ ] Comeback callout — "this is your best week in a while" detected when 7-day task count exceeds recent average by a meaningful margin; said once, not on repeat
- [ ] Morning mode — before a configurable time on work days, show one sequential morning task on screen with no navigation; everything else wakes up after the sequence is done
- [ ] Bunting daily essentials — 3–5 user-defined non-negotiable minimums visualised as flags across the scene; turns green on completion; Baanabus says something specific when all are green
- [ ] Conversational check-ins — sparse (one every few days at most); triggered only when two passive signals align; Baanabus shares something first to make the question feel like commiseration
- [ ] Lighter week mode — Settings toggle; reduces task pressure, surfaces easy-task roster more heavily, removes nudges; user-triggered, never algorithmically imposed
- [ ] Reaction time longitudinal tracking — 7-day rolling trend; single sessions are noise; consistent slowdown is a fatigue/cognitive load signal

---

## M4 — Scene Depth

Make the world feel alive without adding complexity.

- ✅ 6 story books on bookshelf canvas (correct spine colours; book 1 gold-highlighted when unlocked)
- ✅ Paper scraps on floor = count of inbox-type tasks
- ✅ 10-pip progress bar (bottom of scene); fills as tasks are completed; resets when a story page unlocks
- ✅ Time-of-day tint + lamp: Melbourne sunrise/sunset cycle; lamp on at dusk; night sky + crescent moon in window
- ✅ Badges notice board: corkboard on right wall; 8 badge pins; clicking opens badges overlay
- ✅ **Kitchen scene** (`scene_kitchen.php` / `js/scene_kitchen.js`): warm terracotta room with pantry shelves, a chalk nutrition board, and Melbourne time-of-day window. Library door ↔ kitchen door navigation between scenes. 24 individual canvas food illustrations.
- [ ] Sheep click → greeting speech bubble + current task (replace auto-load with click trigger; keep auto on first visit of the day)
- [ ] Daily NPC message: first load of each day shows a short greeting
- [ ] "New book" animation / notification when a story page unlocks
- [ ] **Bunting daily essentials** (see M3.5) — 3–5 flags rendered across the top of the scene canvas

---

## M4.5 — Nutrition Tracking ✅

Log whole foods and close nutrient gaps — woven into the game loop, not bolted on as a separate diet tracker.

- ✅ **Schema** (`baanabus.db`): `foods` (65 whole foods with AFCD values per 100g), `food_servings` (suggested serving sizes), `food_log` (daily entries: food + serving + quantity, or write-off for packaged foods), `nutrient_rdis` (Australian women's RDIs; daily and weekly periods; min/upper limits with clinical notes)
- ✅ **12 tracked nutrients**: fibre (soluble + insoluble), potassium, vitamin C, folate, calcium, iron, magnesium, vitamin K, vitamin A, vitamin D
- ✅ **Food log overlay** (`api/food_log_overlay.php` / `js/food_log.js`): AJAX autocomplete search, serving selector, qty input, write-off entry, today's log with delete, nutrient progress bars with amber/red upper-limit warnings, gap suggestions
- ✅ **Gap analysis** (`api/food_gaps.php`): daily and 7-day rolling totals vs RDIs; suggests 4 diverse foods (fruit/veg/legume/other) per nutrient gap
- ✅ **Kitchen chalkboard**: perspective-correct 12-row progress bars rendered on the right-wall board; clicking opens the food log overlay
- ✅ **Pantry shelves**: food illustrations curated from today's gap suggestions (falls back to a default set when no gap data)
- ✅ **Nutrition facts in activity pool**: 34 food facts (feijoas, broccoli, avocado, legumes, etc.) drawn from AFCD; weight 1 in `next_activity.php`; rendered as "Food fact" with a Got it button

---

## M5 — Storybook Rewards ✅ (first story complete)

The long-term engagement layer.

- ✅ Story format: CYOA nodes keyed `"{page}_{branch}"`, prose + choices, terminal flag; stored in `content/stories/`
- ✅ Story content base64-encoded in source so user can't read ahead in git
- ✅ Story unlock: every 10 completed tasks increments `pages_available` in vault; choices gated by `pages_available > depth`
- ✅ Story reader overlay: `api/story_read.php` — renders current page, shows choices or "earn more tasks" message
- ✅ Choice endpoint: `api/story_choose.php` — validates choice, advances `current_key`, increments depth
- ✅ Story progress saved per story in `config.enc` under `config['stories'][$id]`
- ✅ **The Chai Meridian** (book 1) — 19-node CYOA: Chandrapur tea house to a standing stone above the snowline and grandmother's impossible letter
- ✅ **The Platform That Isn't** (book 2) — written and active
- ✅ **Below the Alcyon** (book 3) — written and active
- ✅ **The Green Correspondence** (book 4) — written and active
- [ ] Write stories 5, 6 to fill remaining book slots

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
- [ ] WiFi SSID → automatic context detection: known SSIDs mapped to home/work/out; native wrapper reads SSID and passes to web layer via JS bridge; sets day context without check-in prompt. Needs ACCESS_WIFI_STATE + ACCESS_FINE_LOCATION permissions. Worth checking GrapheneOS behaviour — it may require explicit grants each session.

---

## Ongoing / Infrastructure

- [ ] Vault backup: authenticated download of decrypted JSON (all vault files: tasks, people, people_notes, config) — decision pending on format (encrypted vs plain)
- [ ] CSP headers: move inline `<script>` blocks to external `.js` files first; then add `Content-Security-Policy` header in Apache
- [ ] ModSecurity: switch from DetectionOnly → enforcement (after confirming no false positives in logs)
- [ ] Automated deploy: git push → auto-pull on server (simple post-receive hook)
- [ ] Rate limiting on auth endpoints beyond fail2ban

---

## Next up

M0–M2, most of M3, M5 (first three stories), M6, and M4.5 are complete. Likely candidates: remaining M4 scene polish (sheep click trigger, new-book animation), M3 context filtering (day type → passive task suppression), M3.5 warmth features (effort acknowledgement, comeback callout), or M2.5 trivia expansion.
