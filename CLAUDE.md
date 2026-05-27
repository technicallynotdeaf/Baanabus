# Baanabus — Claude Code Briefing

## What this project is

Baanabus is a personal productivity app disguised as a game, built for Alison (sole user). The core idea: embed real tasks inside a game loop so they get done without feeling like admin. Think GTD capture + NPC warmth + dopamine-friendly task presentation.

The app targets people with dopamine dysregulation / ADHD who find traditional task managers aversive.

---

## Where things are

| What | Where |
|------|-------|
| **Product roadmap** | `ROADMAP.md` in this directory — 7 milestones, M0 complete, M1 in progress |
| **Task tracker** | `C:\ClaudeCode\TASKS.md` — multi-project, Baanabus section is sparse; use `ROADMAP.md` for Baanabus tasks |
| **Memory files** | `C:\Users\alison\.claude\projects\C--Baanabus\memory\` |
| **Server** | SSH host `pipe-server` (pipeproject.info). Codebase at `/var/www/baanabus/`. Deploy via `git push` then `ssh pipe-server "cd /var/www/baanabus && sudo git pull"` |
| **GitHub PAT** | `C:\Baanabus\gitpat.txt` — use `$(cat /c/Baanabus/gitpat.txt \| tr -d '[:space:]')` in git commands |
| **Secrets file** | `cassowary.php` — gitignored, contains `INVITE_CODES`. Never commit. |

---

## Tech stack

- **Backend**: PHP 8+, SQLite (via PDO), libsodium for vault encryption
- **Auth**: WebAuthn/FIDO2 passkeys (YubiKey USB + Android NFC). PRF extension used to derive vault key.
- **Vault**: Per-user encrypted store at `config/{userId}/config.enc` (app state) and `config/{userId}/cassowary.enc` (API secrets). Both use XChaCha20-Poly1305 with a PRF-derived DEK.
- **Frontend**: Vanilla JS, canvas for scene, AJAX overlays
- **CSS**: `css/app.css` — mobile-first, fresh. `css/styles.css` is legacy reference only (not linked).
- **Database**: `data/baanabus.db` — SQLite, created automatically on first request via `_ensureSchema()` in `init.php`. Gitignored.
- **Server**: Ubuntu, Apache, fail2ban, ModSecurity (DetectionOnly)

---

## Architecture (locked decisions)

- **3–4 full-page scenes max.** Everything else loads as an AJAX overlay panel.
- **No page scrolling** except inside overlay panels (`overflow-y: auto`).
- **Scene = home base.** The canvas (sheep + bookshelf) is always behind overlays.
- **Mobile-first.** Test on phone. Navbar collapses to emoji-only on ≤600px screens.
- **Vault for secrets.** Nothing sensitive in PHP constants or git. Habitica API keys live in `cassowary.enc`, read via `getCassowary()` in `config_helper.php`.
- **Overlay system** is in `js/app.js`: `loadOverlay(url)` for full overlays, `loadSpeechBubble(url)` for the floating speech bubble. Navbar links are already wired.

---

## Key files

```
init.php              — session, DB connection, schema init (CREATE TABLE IF NOT EXISTS), seed data
config_helper.php     — vault: getConfig/saveConfig, getCassowary/saveCassowary, vaultStatus()
header.php            — HTML head, navbar, overlay/speechBubble divs
footer.php            — closing HTML
index.php             — main entry: routes to vault-unlock UI / onboarding wizard / scene
scene.php             — canvas drawing (bookshelf + sheep); adds 'scene-view' class to body
welcome.php           — first-run onboarding wizard overlay (peanut butter, Habitica, tic-tac-toe)
onboarding.php        — registration + sign-in page (NOT the setup wizard — that's welcome.php)
lets-go.php           — speech bubble content: shows next task with Done/Stuck/Snooze buttons
crud.php              — all SQLite helpers: get_task, get_doable_tasks, mark_complete, etc.
js/app.js             — overlay manager, navbar wiring, markAsDone/markAsStuck/snoozeTask
js/auth.js            — WebAuthn register + sign-in (window.BaanabusAuth)
api/cassowary.php     — AJAX: GET masked secrets / POST update secrets
api/onboarding.php    — AJAX: saves wizard answers (peanut_butter, habitica creds, complete flag)
```

---

## Security constraints

- **`scratch/` scripts** must NEVER be placed in `/var/www/baanabus/`. Always SCP to `/tmp/` and run from there. Treat any file in the web root as potentially public.
- **`cassowary.php`** is gitignored. It contains `INVITE_CODES` and other secrets. Never add `-f` to git add it.
- **`data/`** is gitignored. Contains `baanabus.db`. Never commit.
- **`config/`** is gitignored. Contains encrypted vault files. Never commit.
- ModSecurity is in `DetectionOnly` mode — don't switch to enforcement without checking logs for false positives first.

---

## Current state (as of 2026-05-27)

**Working:**
- WebAuthn login (YubiKey USB + Vanadium Android confirmed)
- PRF vault bootstrap and unlock
- Scene renders (canvas + sheep + bookshelf)
- Onboarding wizard (welcome → peanut butter → Habitica → tic-tac-toe)
- Database auto-created on first request with seed tasks
- Overlay system wired (navbar → overlays)
- Mobile CSS (`css/app.css`)

**M1 in progress — next tasks:**
1. `api/mark_complete.php` — POST endpoint; marks task done, updates pages/books in vault, returns JSON
2. Wire `updateProgressBar(pages)` in `js/app.js`
3. Refactor `lets-go.php` to use the new endpoint (remove inline GET action)
4. `api/settings.php` — settings overlay (nickname, Habitica creds form)
5. `brain_dump.php` — quick-capture overlay → saves to `inbox` table

See `ROADMAP.md` for the full milestone plan.

---

## Onboarding flow (for context)

After vault unlock, `index.php` checks `vaultStatus()['onboarding_complete']`. If false, it loads `welcome.php` as an overlay over the scene. The wizard:
1. Peanut butter choice (saved to `config['preferences']['peanut_butter']`)
2. Habitica yes/no (if yes, creds saved to `cassowary.enc`)
3. Tic-tac-toe vs the sheep (sheep plays randomly and usually loses)
4. Marks `config['onboarding_complete'] = true` → reloads → scene appears normally
