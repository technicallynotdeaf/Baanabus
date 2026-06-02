# Baanabus

A personal productivity app disguised as a game. Built for someone with ADHD who finds traditional task managers aversive.

The core idea: embed real tasks inside a game loop so they get done without feeling like admin. Tap the sheep. It tells you what to do. You do it. You earn story pages. You read a chapter. Repeat.

**Live at**: https://baanabus.app (single-user; invite-only)

---

## What it does

- **Speech bubble task loop** — weighted pool of tasks, trivia, minigames, check-ins, and nutrition facts served one at a time. No feed. No scroll. Just the next thing.
- **GTD inbox triage** — Habitica todos land in inbox; one-question-at-a-time triage classifies them (real? how long? first step?).
- **Energy-aware task selection** — morning check-in sets energy level; task pool weights shift accordingly. Low energy = easier tasks surface more.
- **Storybook rewards** — complete tasks to earn pages in branching CYOA stories. Currently active: *The Chai Meridian*, *The Platform That Isn't*, *The Green Correspondence*.
- **Kitchen scene** — second canvas scene with illustrated food shelves (curated from your nutrient gaps), a nutrition chalkboard, and a food log overlay. Tracks 12 nutrients (fibre, potassium, vitamins C/K/A/D, folate, calcium, iron, magnesium — soluble and insoluble fibre split) against Australian RDIs.
- **Minigames** — 10 games (tic-tac-toe, number guess, RPS, math quiz, true/false, sequence, reaction, word scramble, high-low, Gem Match) in the activity rotation; per-game toggles in Settings.
- **People** — contacts with birthday reminders, positive traits, task associations, notes, and "what to ask" prompts.
- **Vault security** — all personal data encrypted with XChaCha20-Poly1305; key derived from WebAuthn PRF extension. Nothing sensitive in PHP or git.

---

## Tech stack

- **Backend**: PHP 8+, SQLite (PDO), libsodium
- **Auth**: WebAuthn/FIDO2 passkeys (YubiKey USB + Android NFC). PRF extension derives the vault key.
- **Frontend**: Vanilla JS, HTML5 Canvas for scenes
- **Server**: Ubuntu, Apache, fail2ban, ModSecurity

---

## Architecture

- Two full-page canvas scenes: **Library** (home base — bookshelf, sheep, story books) and **Kitchen** (pantry shelves, nutrition board)
- Everything else opens as an AJAX overlay panel — no page navigation, no scroll
- Mobile-first; tested on phone

---

## Project history

v0 was a Joomla plugin. Pulled it out, rebuilt from scratch as a standalone PHP/WebAuthn app. The old plugin code is no longer included.
