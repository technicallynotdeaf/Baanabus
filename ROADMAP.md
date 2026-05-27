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
- ✅ Habitica secrets: moved from PHP constants → `cassowary.enc`; `api/cassowary.php` for settings

---

## M1 — Working Loop

Make the core task loop functional end-to-end. Success: sign in, see a task, mark it done, see progress update.

- [ ] `api/mark_complete.php` — POST endpoint: marks task done, updates pages/books in vault, returns JSON (replaces the GET action in lets-go.php)
- [ ] `updateProgressBar(pages)` in app.js — wire to pages value returned from mark_complete
- [ ] `lets-go.php` — refactor: remove inline `?action=complete` handler; use `markAsDone()` → `api/mark_complete.php`; style task card for speech bubble context (big, touch-friendly)
- [ ] `api/settings.php` — settings overlay: Habitica creds form (GET pre-fills masked values from `api/cassowary.php`; POST saves); nickname field; app version/debug info
- [ ] `brain_dump.php` — quick capture overlay: single text input + optional context tag → saves to `inbox` table; confirm and close
- [ ] Deploy M1 and test the full loop on phone

---

## M2 — Tasks & People

The two main data views.

- [ ] `list_tasks.php` — tasks overlay: incomplete tasks grouped by urgency; tap to expand; Done/Snooze buttons inline; "Add task" button opens add form sub-panel
- [ ] Add task form: title, context (dropdown), urgency selector; submits via AJAX, refreshes list
- [ ] `list_people.php` — people overlay: contacts list sorted by next_review; overdue contacts highlighted; tap person → person panel
- [ ] Person panel: name, contact notes, task list for that person; "Mark reviewed" / "Snooze 1 day" / "Add note" actions
- [ ] Task snooze: 1 day / 1 week options (updates `show_after` in DB)
- [ ] Inbox triage overlay or tab: list inbox items; for each: "Make task" / "Discard"; "Make task" opens add-task form pre-filled from inbox content

---

## M3 — Daily Flow

The daily rhythm that makes the game loop feel intentional.

- [ ] Check-in overlay (shown once per day on first scene load): energy level selector (1–5) + day type selector → saved to diary table; sets session context
- [ ] `lets-go.php` respects energy: low energy (1–2) surfaces low-effort tasks first; high energy (4–5) surfaces high-urgency tasks
- [ ] Day type affects task filtering (e.g., "Home" day = home context tasks)
- [ ] Pages/books persisted correctly across sign-ins (read from `config.enc` on vault unlock)
- [ ] "Stuck" flow: task marked stuck → snooze options shown; optionally add a note about the blocker
- [ ] Context filter in tasks overlay: quick filter chips (Home / Work / etc.)

---

## M4 — Scene Depth

Make the world feel alive without adding complexity.

- [ ] Bookshelf draws filled books based on `config.books` count (canvas update in scene.php)
- [ ] Book/page counter shown on scene (subtle, bottom corner or on bookshelf)
- [ ] Sheep click → greeting speech bubble + current task (replace auto-load-on-page-load with click trigger; keep auto on first visit of the day)
- [ ] Time-of-day tint: warm morning / neutral afternoon / cooler evening (based on hour)
- [ ] Daily NPC message: first load of each day shows a short greeting (drawn from a small pool, or from current state)
- [ ] "New book" animation / notification when books increments

---

## M5 — Storybook Rewards

The long-term engagement layer.

- [ ] Story content: short CYOA stories authored and stored as JSON in `data/stories/`
- [ ] Story unlock: every N pages (TBD), a story fragment unlocks → stored in `config.enc` under `stories.unlocked[]`
- [ ] Storybook overlay: list unlocked stories; tap to read
- [ ] CYOA reader: present passage → choices → follow path through branching JSON tree
- [ ] Story progress saved per story in vault
- [ ] Write 3 seed stories before launch (short, 5–10 nodes each)

---

## M6 — Integrations

Connect to services Alison already uses.

- [ ] Habitica sync fully working: `api/habitica_sync.php` — pull incomplete Habitica tasks → upsert to local tasks table; mark_complete pushes score up
- [ ] CalDAV (Radicale): pull calendar events → show upcoming events as tasks/reminders
- [ ] CardDAV (Radicale): sync contacts → people directory
- [ ] Proton Mail IMAP: pull unread emails → land in inbox for triage

---

## M7 — Android Companion

- [ ] Android WebView wrapper (PWA-style, fullscreen, no browser chrome)
- [ ] Share target: receive text/URLs from other apps → lands in inbox
- [ ] SMS triage: read SMS and surface in inbox (requires permission; accessibility service or SMS reader)
- [ ] Push notifications: due tasks / overdue reviews (via Firebase or self-hosted)
- [ ] Contact call prompts: before a call, app surfaces person notes + last contact date

---

## Ongoing / Infrastructure

- [ ] CSP headers: move inline `<script>` blocks to external `.js` files first; then add `Content-Security-Policy` header in Apache
- [ ] ModSecurity: switch from DetectionOnly → enforcement (after confirming no false positives in logs)
- [ ] Fix SEO for pipeproject.info (separate project)
- [ ] Rate limiting on auth endpoints beyond fail2ban (consider nginx upstream for all vhosts)
- [ ] Automated deploy: git push → auto-pull on server (simple post-receive hook, no CD pipeline needed at this scale)

---

## Next up

**M1 is the priority.** Start with `api/mark_complete.php` since it unblocks the let's-go loop, then settings overlay so Habitica creds can be entered, then brain_dump.php for capture.
