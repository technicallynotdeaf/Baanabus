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

## M2.1 — Calendar Events ✅

Link people, tasks, and time blocks to calendar events. Solve the birthday false-positive bug (birthdays ≠ visits).

- ✅ **Vault store** (`events.enc`): events with fields title, date, time_start/end, recurring (weekly/monthly/yearly), people_ids, task_ids, prereq_tasks, prebriefed, debriefed, notes
- ✅ **Agent API**: GET ?view=events; POST add_event/update_event/delete_event
- ✅ **Events overlay** (📍 button): browse events, add/delete forms, display linked people + tasks
- ✅ **Calendar integration**: events appear in `api/calendar.php` response; rendered in day view with times, people tags, notes
- ✅ **Birthday false-positive fix** (2026-09-03): `pick_person_review()` now excludes people with birthdays today via `getUpcomingBirthdays(0)` filter — prevents "you saw Laura yesterday" message when it was just her birthday
- [ ] People/task multi-select in add-event form (currently accepts empty arrays)
- [ ] Inline edit for existing events; pre/debrief toggles
- [ ] Pre-event reminder activity: "Church is Sunday — you might see Laura & James; here's what you wanted to ask"
- [ ] Google Calendar integration (research done; ready to implement)

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
- ✅ Day type → passive context filter: home day suppresses tasks tagged work/office; work day suppresses home tasks. Happens automatically in `getDoableTasks()` based on today's diary entry — no user action needed.
- ✅ Context chips in task list overlay = **planning mode only**: pick a context to see all tasks in that bucket at once. Not a real-time filter for "what can I do now" — that's the passive filter above.

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
- ✅ Effort acknowledgement — completing a high-urgency task, a task older than 21 days, or a previously-stuck task shows a specific callout before the next activity loads
- ✅ Comeback callout — "This is your best week in a while. I noticed." fires when this week's completions beat the 3-week best (checked from Wed onward); once per week; count stored in `config['daily_completions']`
- [~] Morning mode — before a configurable time on work days, show one sequential morning task on screen with no navigation; everything else wakes up after the sequence is done. Partially covered by the new M10 morning review (reviews scheduled/snoozed tasks), but that's calendar-driven, not a locked single-task sequence — still open whether a stricter mode is wanted.
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
- ✅ **Pip credit for organizing, not just completing** (2026-07-26): `vaultUpdateTask()` — the single choke point every field edit already runs through for Top 3 credit — now also awards a pip whenever it credits an organization-improving transition (`fill_info`, `calendar_set`, `inbox_triage`, `declutter`). Previously every pip came from completions/games/fun activities and GTD processing work (filling in urgency/energy/context, clearing the inbox, scheduling, sending things to someday) earned zero level progress despite being the app's primary purpose. One pip per edit regardless of how many fields changed at once, to keep it comparable to a task completion rather than rewarding bulk edits disproportionately. Wired through in `api/triage.php`'s response (`pip: {pages, pages_target, total_pages, newStoryPage}`) and consumed in `renderTriage()`'s save handler in `js/lets_go.js`.
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
- ✅ **Food cost tracking**: `foods.cost_per_100g` (all 98 foods populated); shared `computeRecipeTotals()` (`config_helper.php`) sums cost alongside nutrition per batch/portion — used by both `api/agent.php`'s `precalculate_recipe` action and the in-app recipe UI, so Claude and the browser never compute a recipe's numbers two different ways
- ✅ **Recipe storage**: user-created recipes as a named collection of foods (`food_id`+`weight_g` rows) stored in vault (`recipes.enc`); recipe book overlay (`list_recipes.php`/`js/list_recipes.js`, `api/recipe_detail.php`/`js/recipe_detail.js`) reachable from a click-target on the kitchen counter (`js/scene_kitchen.js`); ingredient rows reuse the food log's search/serving picker; Calculate action shows nutrition + cost per batch/portion; session-authenticated `api/recipe_action.php` mirrors the bearer-token agent API actions
- ✅ **Meal planning**: calendar day view's meal-plan block is tap-to-edit (pick a saved recipe or type a custom name); 2-week planner overlay (`list_meal_plan.php`/`js/list_meal_plan.js`) lays out 14 days × 3 meals with a running estimated cost total; `api/meal_plan.php` (session-authenticated) and the agent API's `plan_meal`/`clear_meal` both write to `diary.enc`'s `meal_plan` key

---

## M4.6 — Period & Fertility Tracking

Cycle awareness woven into Baanabus's wellness layer — private, vault-only, no external sync.

**Implemented (2026-06-14):**
- ✅ **Vault storage** (`config['period_tracking']`): enabled flag, LMP date, cycle length min/max
- ✅ **Phase calculation** (`getCyclePhase()` / `getCyclePhases()` in `config_helper.php`): four phases — bleeding (days 1–4, red), follicular (days 5 to ov−3, yellow), ovulatory window (ov−2 to ov+2, 5 days, green), post-ovulatory/luteal (remainder, blue). Ovulation estimated at cycle_length − 14 (luteal phase is a biological constant ~14 days).
- ✅ **Cycle dial** (`js/cycle_dial.js`): clock-face canvas with coloured ring and a hand pointing to the current day. Small fixed dial (72px) on desktop, larger dial (120px) in Settings → Wellness with phase legend. `getCyclePhases()` provides arc definitions for JS.
- ✅ **Settings UI** (Settings → Wellness): enable toggle, LMP date picker, cycle length range inputs, saved via `api/save_period_pref.php`

**Up next — sympto-thermal / fertility awareness:**
- [ ] **Symptom log** (`symptoms.enc`): daily entry for basal body temperature (BBT), cervical mucus type (dry/sticky/creamy/watery/egg-white), spotting, pain (cramp severity 0–5), mood, breast tenderness, headache. Tap-to-select only — no free text boxes.
- [ ] **BBT chart**: canvas line chart of temperature over the cycle, overlaid on phase colour bands; shows the biphasic shift (temperature rise post-ovulation confirms luteal phase)
- [ ] **Cervical mucus pattern display**: timeline of mucus types mapped to cycle days; "egg-white" peak marks likely fertility window
- [ ] **Fertility window estimate**: highlight days ~5 before to 1 after estimated ovulation; adjusts estimate once BBT shift is observed (overrides calendar-only estimate)
- [ ] **Speech bubble integration**: phase-aware prompts — e.g. on premenstrual days: "You might want to have supplies handy in the next day or two"; on follicular days: "You're likely at higher energy this week"
- [ ] **Nutrient focus by phase**: surface phase-relevant nutrition nudges (iron + vitamin C during follicular, when the endometrium is rebuilding; B vitamins + magnesium in luteal; omega-3 for premenstrual)
- [ ] **Retrospective LMP logging**: let user mark "period started today" from a prompt so LMP stays accurate without manual date entry

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

### M6.1 — Habitica Bidirectional Sync (next priority)

Full two-way sync so Habitica and Baanabus stay in lockstep, plus Habitica tags that make Habitica itself more useful when working directly in it.

**Sync correctness:**
- ✅ Tasks deleted in Habitica should be removed from Baanabus on the next sync
- ✅ Tasks added to Baanabus as `next_action` should be pushed up to Habitica (via `add_task` in agent API and `quick_win`/`next_action` in triage); Habitica `id` stored back in vault
- ✅ Task metadata (urgency, context/location, task_type, snoozed_until) written to Habitica `notes` field on create, triage, and `update_task`; Baanabus delete propagates to Habitica DELETE

**Habitica tags for in-app filtering:**
- ✅ `doable`/`snoozed` tags: applied at sync time; `doable` = active + not snoozed, `snoozed` = active + snoozed_until in future
- ✅ Location tags: `location:home`, `location:work`, `location:shops`, `location:phone`, `location:online`, `location:anywhere` applied at sync time based on task's location field
- ✅ Tag IDs cached in `cassowary.enc`; each task stores `_hab_tags` so only diffs hit the API; 50-call budget per sync run (never-tagged tasks prioritised)

**Remaining M6 integrations (lower priority):**
- [ ] CalDAV (Radicale): pull calendar events → show upcoming events as tasks/reminders
- [ ] CardDAV (Radicale): sync contacts → people directory
- [ ] Proton Mail IMAP: pull unread emails → land in inbox for triage

---

## M7 — Android Companion

### M7.0 — Authentication

Two paths depending on whether the user already has a web account:

**Path A — Existing user (QR link)**
1. Web settings page generates a short-lived one-time token (5 min TTL), renders it as a QR code
2. User scans QR with the Android app
3. App exchanges the token at a server endpoint → server generates a BSK key scoped to that user, returns it once
4. Token is invalidated immediately after exchange
5. App stores BSK key in Android Keystore via `flutter_secure_storage`
6. All subsequent API calls use the BSK key as Bearer auth

Server-side needed: `api/generate_qr_token.php` (creates short-lived token in vault or SQLite), `api/exchange_qr_token.php` (validates token, generates + returns BSK key, invalidates token). QR contains a deep link: `baanabus://setup?token=XXXX` or `https://baanabus.app/setup?token=XXXX`.

**Path B — New user (device passkey)**
1. App runs a preflight check for passkey prerequisites:
   - Android 9+ (API 28+)
   - Screen lock set (PIN, pattern, biometric) — required for passkey storage; if missing, explain why it matters and deep-link to `Settings > Security > Screen lock`
   - A credential provider enabled (Google Password Manager is the default on most devices; if disabled or not configured, prompt user to enable it and deep-link to `Settings > Passwords & accounts` or `Settings > Security > Passkeys`)
   - If any check fails: plain-language explanation of what's needed and a button that opens the relevant settings screen directly — user comes back to the app and retries, no data lost
2. If preflight passes: attempt registration via Android Credential Manager, defaulting to Google Password Manager / device keychain
3. PRF support depends on the authenticator — Google Password Manager supports PRF from Android 14. If PRF is unavailable, onboarding checks what authenticator apps are installed and attempts each in turn (1Password, Bitwarden, etc. all have varying PRF support). PRF availability is determined from the registration response, not upfront.
4. If no available authenticator supports PRF: clear message explaining what's needed and why — graceful stop, no silent fallback to a weaker scheme
5. If PRF available: server registers the credential, bootstraps a new vault, DEK derived via PRF

User never needs to visit baanabus.app. The phone is their only device and the passkey is their only credential.

### M7.1 — Core Features

- [ ] Share target: receive text/URLs from other apps → lands in inbox
- [ ] Push notifications: due tasks / overdue reviews
- [ ] Contact call prompts: before a call, app surfaces person notes + last contact date
- [ ] WiFi SSID → automatic context detection: known SSIDs mapped to home/work/out; native wrapper reads SSID and passes to web layer via JS bridge; sets day context without check-in prompt. Needs ACCESS_WIFI_STATE + ACCESS_FINE_LOCATION permissions. Worth checking GrapheneOS behaviour — it may require explicit grants each session.

---

## Ongoing / Infrastructure

- ✅ Vault backup: `api/vault_export.php` — authenticated download of decrypted JSON (tasks, config, people, people_notes, inbox, diary, quotes)
- [ ] CSP headers: move inline `<script>` blocks to external `.js` files first; then add `Content-Security-Policy` header in Apache
- [ ] ModSecurity: switch from DetectionOnly → enforcement (after confirming no false positives in logs)
- [ ] Automated deploy: git push → auto-pull on server (simple post-receive hook)
- [ ] Rate limiting on auth endpoints beyond fail2ban

---

## M8 — Relational Intelligence

Build the capacity for meaningful connection through low-friction, attention-shaping prompts. Not social logging — conscious investment scaffolded over time.

Design constraint: many users are neurodiverse. Prefer tappable structured options, scales, and "sit with this for a moment" interactions over blank text boxes. The pause is a valid and valuable interaction.

**Event Pre-brief/Debrief** (2026-07-26) — a task linking to a person via `person_id` and carrying a scheduled day (`scheduled_date` or `snoozed_until`) doubles as "seeing them", so this reuses existing task data rather than a new events store:
- ✅ **Pre-brief** (`pick_event_prebrief()`, `renderEventPrebrief` in `js/lets_go.js`): fires once per task on its scheduled day. Shows the person's name, the task, up to 2 recent notes about them ("worth remembering"), and a 5-tap energy scale ("How are you going into it?" — Exhausted/Low/Okay/Good/On fire, same scale as the daily check-in). Answer is appended to `diary.enc`'s `event_prebriefs` for that date — private, vault-only, never surfaced socially.
- ✅ **Debrief** (`pick_event_debrief()`, `renderEventDebrief`): fires once per task, starting the day after its scheduled day (up to 3 days back — older than that is treated as stale and skipped). Card frames it as "You saw [Name] [when] — [task]" rather than asking a literal yes/no (the task's existence is treated as the "did you see them" signal). Commitments captured optionally convert to a task via `api/add_task.php` (person-linked); "learned something new" optionally saves a note via `api/person_action.php`'s existing `add_note` action; two tap-only noticing questions ("seemed off?", "wanted to say something?") are ephemeral by design — no storage, the value is in being asked, matching the design doc's framing.
- ✅ New endpoint `api/event_checkin.php` — `prebrief`/`debrief` actions; marks `event_prebriefed_at`/`event_debriefed_at` on the task so each stage fires exactly once.
- [ ] Event types (church, band, work, family) tuning the question set — not implemented; `context` could stand in for this but wasn't wired up
- [ ] "Did you see [person] today?" as an explicit yes/no gate before the rest of the debrief (currently assumed true from the task existing)
- [ ] Situational awareness extensions (conversation ease/effort, "did you give them an out", "what was going on for you going in") — not implemented, a distinct follow-on from the pre-brief/debrief pair built here

**Relationship Review Prompts** (periodic, no text required unless desired):
- [ ] Gratitude: "Think about [person] — what's one thing they've done lately that mattered?" — pause only, no output needed
- [ ] Reframing: prompt to find a generous read on an irritating trait (pedantic → observant; blunt → honest); two-field interaction
- [ ] Action: "Did they do something you haven't acknowledged yet?"
- [ ] Connection thought capture: "I should introduce X to Y" → quick-capture, links to person or task

**Self-Awareness Layer** (foundational — underpins all relational features):
- ✅ Pre-interaction check: "How are you going into this?" — shipped as part of Event Pre-brief above (5-tap scale, not text)
- [ ] Post-interaction: "Did what you were carrying affect how that went?"
- [ ] Pattern noticing over time: if user rates flat before certain event types, surface it gently (the raw data is now being collected in `diary.enc.event_prebriefs`, but nothing reads it back yet)
- ✅ Emotional state data: private, vault-only (`diary.enc`), never surfaced socially

**Situational Awareness** (debrief extension):
- [ ] "Did the conversation feel easy or effortful for them?"
- [ ] "Did you give them an out, or hold them there?"
- [ ] "What was going on for you going in?"
- [ ] Pre-event nudge: "Is this a good moment to approach [person]?" (surfaced before a scheduled event)

**Relational Skills — Short Conversation Model** (implicit, through prompts):
- [ ] Scaffold the model through questions: greeting → hook → question → graceful exit
- [ ] "Did you find a natural way to wrap up?" — builds awareness over time
- [ ] "Did you ask as many questions as you answered?" — framed as curiosity, not scorekeeping

**Repair Skills**:
- [ ] "Did anything need repair after that?" → "Have you done your part?" → "Is the ball in their court?"
- [ ] "Olive branch extended" state on a relationship record
- [ ] "I've done what I can — releasing this" closure action
- [ ] Framed as fair accounting, not "be the bigger person"; user is responsible for their part only

---

## M2.8 — Physical Object Triage

Process physical objects that are left out as visual reminders — without requiring the user to mentally translate them to tasks first. The object IS the prompt.

- ✅ Vault store: `physical_objects.enc` — `{id, label, task_id, status: 'out'|'resolved', created_at}`
- ✅ Quick capture: "Note to Self" overlay gains a "What's out?" form (separate from inbox)
- ✅ Speech bubble activity type `physical_object_triage`: surfaces oldest unresolved object, asks "What's this doing out?"
  - "It's out for a task" → name the task → creates `next_action`, links object, resolves it
  - "It needs a home" → auto-creates task "Find a home for: [label]", resolves object
  - "Just put it away" → marks resolved, no task
- ✅ `api/add_physical_object.php` — POST `{label}`
- ✅ `api/physical_object_triage.php` — POST `{object_id, action, task_id?, task_title?}`
- ✅ **Room scan**: separate `room_scan` activity type (`api/room_scan.php`, `pick_room_scan()`) — prompts "look around this room, log up to 5 things"; one scan per room per day (`room_scan_dates`)
- ✅ **Objects list overlay** (`api/objects_list.php`, "Things"): view all logged objects split into Out & waiting / Put away, with room + location shown
- ✅ **Declutter batch prioritization** (fixed 2026-07-26): room scan (spotting *new* clutter) and physical object triage (working through the *existing* unresolved batch) used to compete in the activity pool at the same time, so a room scan could run while a backlog of already-logged objects sat untriaged — risking the same item being logged twice. `pick_room_scan()` now refuses to fire at all while any object is unresolved (`status='out'`), and the pool gives that weight to `physical_object_triage` instead; new-spotting only resumes once the batch is clear. The "Things" overlay's "Yes, I can [spot more]" prompt had the same bug in miniature (`!$out && !$resolved`, which meant it never reappeared after the first-ever resolved object) — now just `!$out`.
- [ ] Bidirectional task link: tasks gain `physical_object_ids` array; task card shows object labels

---

## Next up

**M6.1 complete.** Habitica bidirectional sync is fully done: deletion both ways, metadata notes, doable/snoozed and location tags at sync time.

**Up next:** remaining M4 scene polish (sheep click trigger, new-book animation), M3.5 warmth features (bunting, conversational check-ins), M2.5 trivia expansion, or writing quilt quest books.

---

## M9 — Goals & Daily Challenges (shipped, undocumented until now)

Two gamification/motivation features built between M6.1 and now that don't fit cleanly into an earlier milestone — recorded here after the fact.

- ✅ **Goals** (`goals.enc`): minimal outcome records — `{id, title, created_at}` — that a task can link to via `task.goal_id`. Deliberately separate from `context`: context is a life-area tag (Health, Faith, Garden), a goal is a specific outcome a task is moving you toward. CRUD via agent API (`add_task`/`update_task` accept `goal_id`, `delete_goal` action).
- [ ] Goals list/detail overlay — currently only reachable via the agent API, no in-app UI to create, view, or browse goals yet
- [ ] Goal progress surfacing — show linked-task completion progress against a goal somewhere in the scene or an overlay
- ✅ **Top 3 daily challenge jars** (`content/top3_challenges.php`, `api/top3.php`): 3 auto-tracked daily challenges drawn from a pool each session, each worth points; credited as a side effect of real actions (task edits, inbox triage, food logging, calendar scheduling, declutter, daily routine) through one central choke point rather than scattered per-feature hooks. Lifetime points total exposed via `api/agent.php?view=top3`.
- [ ] Points redemption / visible reward — points currently accumulate with no in-app sink or display beyond the agent API

---

## M10 — Calendar, Routine & Regulation (shipped, undocumented until now)

- ✅ **Calendar overlay** (`api/calendar.php`, `js/scene2.js`, `js/day_tasks.js`): month view of tasks by `scheduled_date` + snoozed tasks; day-tap opens interactive rows with full snooze picker, location-aware snooze, and day-type picker inline
- ✅ **Morning review**: reviews the day's scheduled/snoozed tasks as part of the calendar flow
- ✅ **Weekly routine / "typical week"**: `config['weekly_schedule']` maps day-of-week → default day_type; editable in Settings and offered as an onboarding step
- ✅ **Day type vs. location split**: physical location (own `locations` DB table, stored as an array) is now a separate check-in from day_type — "what kind of day" vs. "where am I right now"
- ✅ **Regulation mode**: session toggle surfacing grounding/sensory prompts (`content/regulation_prompts.php`); user can disable defaults or add custom prompts in Settings → Wellness
- ✅ **Dance activity**: pool activity type with start/stop timer, daily accumulator (`config['dance_log']`), suppressed after 15 min/day or when location is Out/Transit
- ✅ **Quotes → auto-advancing interstitial**: 10-second auto-advance instead of manual dismiss; affirmations pool added alongside personal quotes
- ✅ **Vault export/backup** (`api/vault_export.php`): authenticated decrypted-JSON download — resolves the "Vault backup" item under Ongoing/Infrastructure below
- ✅ **Story picker/reread**: `active_story_id` lets the reader choose which unlocked book to continue (`api/set_active_story.php`); `api/story_reset.php` lets a finished book be reread from the start; `api/story_books.php` serves the 24-book catalogue with per-book ended state

---

## Maybe One Day

Features that are worth remembering but not prioritising. No commitments — just a place to park ideas so they don't get lost.

- **Fitbit / Pebble sleep tracking**: ingest sleep data via Fitbit webhook or Pebble timeline API → store sleep duration + quality in vault (`sleep.enc`) → use as a G6 signal (did the user sleep adequately?) and as context for activity pool weighting (don't surface high-energy tasks after a bad night). Pebble is community-maintained post-Fitbit acquisition; worth checking current webhook support before building.
- **Gmail / iCloud as vault storage**: for non-technical users, storing the encrypted vault in their existing cloud storage rather than on the Baanabus server removes the single-point-of-failure and makes the app self-hostable in spirit. Vault files are already opaque encrypted blobs — they're safe to store anywhere. Would require OAuth flows for Gmail Drive / iCloud Drive APIs.
- **Android SMS triage**: read incoming SMS and surface unread threads as inbox items for triage ("Reply to Mum?"). Requires READ_SMS permission on Android — worth checking GrapheneOS/Vanadium behaviour.
- **Contact sync (CardDAV / Android contacts)**: import device contacts into `people.enc` as a starting point for the people directory, rather than requiring manual entry.
- **CalDAV sync**: pull calendar events from a self-hosted CalDAV server (Radicale) or device calendar → surface as context on the focus card ("you have X at 2pm").
- **Proton Mail IMAP triage**: pull unread emails into inbox for GTD processing.
- **Food cost tracking**: record approximate cost per food item or serving; weight gap suggestions toward affordable options.
- **Formal REST API + OpenAPI spec**: restructure `api/agent.php` into proper REST endpoints (`GET /api/tasks`, `PATCH /api/tasks/{id}`, etc.) with an OpenAPI/Swagger spec so third-party agents can consume it without needing source access. Pre-requisite for opening the API to external developers. Not needed while Alison is the only user.
