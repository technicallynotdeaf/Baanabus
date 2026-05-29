# Baanabus — Claude Code Briefing

## Claude Code environment

- **Platform**: Windows 10 (local machine). PowerShell is the default shell — use PowerShell syntax, not bash.
- **No WSL**: `/mnt/c/...` paths do not work. Use `C:\...` paths.
- **Git**: run from `C:\Baanabus\Baanabus` via PowerShell. Use PowerShell heredoc syntax (`@'...'@`) for multi-line commit messages — bash `cat <<'EOF'` does not work.
- **PHP execution**: never run PHP locally. SCP scripts to `/tmp/` on pipe-server and run via SSH.
- **File editing**: Write/Edit tools work directly on local Windows paths.

---

## What this project is

Baanabus is a personal productivity app disguised as a game, built for Alison (sole user). The core idea: embed real tasks inside a game loop so they get done without feeling like admin. Think GTD capture + NPC warmth + dopamine-friendly task presentation.

The app targets people with dopamine dysregulation / ADHD who find traditional task managers aversive.

---

## Where things are

| What | Where |
|------|-------|
| **Product roadmap** | `ROADMAP.md` in this directory |
| **Memory files** | `C:\Users\alison\.claude\projects\C--Baanabus\memory\` |
| **Server** | SSH host `pipe-server` (pipeproject.info). Codebase at `/var/www/baanabus/`. Deploy via `git push origin master` then `ssh pipe-server "cd /var/www/baanabus && sudo git pull"` |
| **GitHub remote** | `https://github.com/technicallynotdeaf/Baanabus.git` — PAT embedded in remote URL already |
| **Secrets file** | `cassowary.php` — gitignored, contains `INVITE_CODES`. Never commit. |
| **Run PHP scripts** | SCP to `/tmp/` on pipe-server and run via SSH. Do not run PHP locally. |

---

## Tech stack

- **Backend**: PHP 8+, SQLite (via PDO), libsodium for vault encryption
- **Auth**: WebAuthn/FIDO2 passkeys (YubiKey USB + Android NFC). PRF extension used to derive vault key.
- **Vault**: Per-user encrypted store. XChaCha20-Poly1305 with a PRF-derived DEK.
  - `config/{userId}/config.enc` — app state (preferences, onboarding, story progress)
  - `config/{userId}/tasks.enc` — task list (`{next_id, pages, tasks: [...]}`)
  - `config/{userId}/cassowary.enc` — API secrets (Habitica creds)
  - `config/{userId}/inbox.enc` — quick-capture inbox items
- **Frontend**: Vanilla JS, canvas for scene, AJAX overlays
- **CSS**: `css/app.css` — mobile-first. `css/styles.css` is legacy reference only (not linked).
- **Database**: `data/baanabus.db` — SQLite, gitignored. Used for diary/check-in, people, trivia.
- **Server**: Ubuntu, Apache, fail2ban, ModSecurity (DetectionOnly)

---

## Architecture (locked decisions)

- **3–4 full-page scenes max.** Everything else loads as an AJAX overlay panel.
- **No page scrolling** except inside overlay panels (`overflow-y: auto`).
- **Scene = home base.** The canvas (bookshelf + avatar) is always behind overlays.
- **Mobile-first.** Test on phone. Navbar collapses to emoji-only on ≤600px screens.
- **Vault for secrets.** Nothing sensitive in PHP constants or git. Habitica API keys live in `cassowary.enc`, read via `getCassowary()` in `config_helper.php`.
- **Overlay system**: `loadOverlay(url)` for full overlays, `loadSpeechBubble(url)` for the floating speech bubble. Both defined in `js/app.js`.
- **Tasks are vault-only** — no SQLite for tasks. All task state lives in `tasks.enc`.

---

## Key files

```
init.php                     — session, DB connection, schema init, json_response() helper
config_helper.php            — all vault helpers:
                                 getConfig/saveConfig, getCassowary/saveCassowary
                                 getTasks/saveTasks, getDoableTasks, vaultMarkComplete, vaultUpdateTask
                                 getStoryProgress/saveStoryProgress/incrementStoryPages
                                 getInbox/saveInbox/addToInbox
header.php                   — HTML head, navbar, overlay/speechBubble divs
footer.php                   — closing HTML
index.php                    — main entry: routes to vault-unlock UI / onboarding / scene
scene.php                    — canvas (bookshelf + 6 story books + paper scraps + avatar + pip bar)
greeting.php                 — loaded on page load; triggers silent Habitica sync
lets-go.php                  — speech bubble: fetches next_activity, renders task/trivia/checkin/minigame
welcome.php                  — first-run onboarding wizard (peanut butter → Habitica → tic-tac-toe)
onboarding.php               — WebAuthn registration + sign-in page

api/next_activity.php        — weighted pool: task (60%) / trivia (20%) / minigame (10%) / check-in
api/mark_complete.api.php    — POST ?task_id=N: marks done, increments pages, Habitica score-up
api/task_action.php          — POST {task_id, action:'stuck'|'snooze', when?}: updates snoozed_until
api/story_read.php           — overlay partial: renders current story page + choices
api/story_choose.php         — POST {story_id, choice_key}: advances story progress
api/habitica_sync.php        — once-per-day pull from Habitica; imports todos + checklist items
api/habitica_helper.php      — habiticaRequest() cURL wrapper
api/integrations.php         — GET/POST Habitica credentials (masked GET, saves to cassowary.enc)
api/onboarding.php           — saves wizard answers to config.enc
api/checkin.php              — saves energy_level / day_type to diary table
api/settings.php             — (not yet built)

content/stories/chai_meridian.php  — 19-node CYOA story; prose + choice texts are base64-encoded
js/app.js                    — overlay manager, markAsDone/markAsStuck/snoozeTask, updateProgressBar
js/auth.js                   — WebAuthn register + sign-in (window.BaanabusAuth)
css/app.css                  — all styles; scene-pips, action-button, overlay, speech bubble
```

---

## Task data model

Tasks live in `tasks.enc` as `{next_id, pages, tasks: [...]}`.

Each task:
```
{
  id, title, task_type, urgency, energy, status,
  snoozed_until,   // ISO datetime or null; checked in getDoableTasks()
  stuck,           // bool; set by markAsStuck
  created_at,
  parent_id,       // set on Habitica checklist items (subtasks)
  habitica_id,     // Habitica parent todo UUID
  habitica_item_id // Habitica checklist item UUID (subtasks only)
}
```

`task_type` values: `'inbox'` (Habitica imports, untriaged), `'next_action'`, `'reference'`, `'someday'`

`getDoableTasks()` returns: active + unsnoozed + no `parent_id`. Children surface inside their parent's block task card in the speech bubble, never standalone.

---

## Story system

- Progress stored in `config.enc` under `config['stories'][$storyId]` as `{pages_available, depth, current_key}`
- `pages_available` starts at 1; increments by 1 every 10 completed tasks
- Choices gated by `pages_available > depth`; making a choice increments `depth`
- Story content files: `content/stories/*.php` — return PHP array; prose and choice texts are **base64-encoded**
- `api/story_read.php` calls `base64_decode()` before rendering
- Book 1 (The Chai Meridian, `#C8813A`) is the only active story; books 2–6 render desaturated

---

## Habitica sync

- `api/habitica_sync.php` runs once per day (guarded by `config['habitica_sync_date']`)
- Imports Habitica todos as tasks with `task_type:'inbox'`, `habitica_id` set
- Imports incomplete checklist items as child tasks with `parent_id`, `habitica_item_id` set
- Deduplicates via `habitica_id` + `habitica_item_id` indexes
- `api/mark_complete.api.php` scores back: checklist items via `/tasks/{id}/checklist/{itemId}/score`, parent todos via `/tasks/{id}/score/up`
- Triggered silently from `greeting.php` on page load

---

## Security constraints

- **`scratch/` scripts** must NEVER be in the web root. SCP to `/tmp/` on pipe-server only.
- **`cassowary.php`** is gitignored. Contains `INVITE_CODES`. Never `git add -f`.
- **`data/`** is gitignored. Contains `baanabus.db`.
- **`config/`** is gitignored. Contains encrypted vault files.
- ModSecurity is in `DetectionOnly` — do not switch to enforcement without checking logs first.

---

## Current state (as of 2026-05-28)

**Working end-to-end:**
- WebAuthn login (YubiKey USB + Vanadium Android confirmed)
- PRF vault bootstrap and unlock
- Canvas scene: bookshelf with 6 story books, paper scraps (inbox count), 10-pip progress bar, avatar
- Onboarding wizard (peanut butter → Habitica → tic-tac-toe)
- Speech bubble: weighted task / trivia / check-in / tic-tac-toe pool via `next_activity.php`
- Task completion: marks done, increments pip bar, scores on Habitica
- Stuck: snoozes until tomorrow 08:00, flags task
- Snooze: 4 time options (2h / tonight / tomorrow / next week)
- Block tasks: Habitica tasks with checklists show parent title + inline subtask checklist; subtasks check off one by one; bubble reloads when block is clear
- Storybook: The Chai Meridian (19 nodes) — unlocks 1 page per 10 tasks; reader overlay with branching choices
- Habitica sync: once-per-day pull of todos + checklist items

**Remaining M1 items:**
- `api/settings.php` — settings overlay (nickname, Habitica creds form)
- `brain_dump.php` — quick-capture overlay → saves to inbox

**Up next (M3):**
- GTD inbox triage: one-question-at-a-time flow; `task_type` changes at end
- Energy-aware task selection in `next_activity.php`

---

## Onboarding flow (for context)

After vault unlock, `index.php` checks `vaultStatus()['onboarding_complete']`. If false, loads `welcome.php` as an overlay. The wizard:
1. Peanut butter choice → `config['preferences']['peanut_butter']`
2. Habitica yes/no → if yes, creds saved to `cassowary.enc`; `uses_habitica: true` set in config
3. Tic-tac-toe vs the sheep (sheep plays randomly)
4. Marks `config['onboarding_complete'] = true` → reloads → scene appears
