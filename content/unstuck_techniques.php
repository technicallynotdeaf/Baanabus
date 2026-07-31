<?php
// Default anti-procrastination "unstuck" techniques — offered from the
// Blocked flow's "I just don't want to do this right now" reason, once a
// task's metadata is already correct and it's genuine resistance rather
// than a setup problem. No single named framework anchors these (checked —
// none exists in this project's docs, unlike Behavioural Activation for the
// values layer); general, well-established techniques instead.
// IDs are permanent — never reuse a deleted ID.
// kind: 'nudge' (plain framing, optional countdown) or 'break_smaller'
// (renders its own inline first-step form instead of a plain prompt).
return [
    ['id' => 1, 'kind' => 'nudge', 'seconds' => 120,
     'text' => "Set a timer for just 2 minutes and start. You can stop the moment it goes off if you still want to — most of the time you won't."],
    ['id' => 2, 'kind' => 'nudge',
     'text' => "You don't have to do it well. Do it badly on purpose — get something down, anything. You can fix it later."],
    ['id' => 3, 'kind' => 'nudge',
     'text' => "Pick the worst, most annoying part of this and do just that bit first. Once it's out of the way, the rest is easier."],
    ['id' => 4, 'kind' => 'nudge',
     'text' => "Pair it with something you enjoy — put a podcast on, make a good coffee. You don't have to do this joylessly."],
    ['id' => 5, 'kind' => 'nudge', 'seconds' => 5,
     'text' => "5-4-3-2-1 — count down, then start on 'go,' before you can talk yourself out of it."],
    ['id' => 6, 'kind' => 'nudge',
     'text' => "Decide right now: when exactly will you do this, and where will you be? A vague 'later' rarely happens — a specific one does."],
    ['id' => 7, 'kind' => 'break_smaller',
     'text' => "This might just be too big as it stands. What's one tiny piece of it — under 5 minutes — you could peel off and do first?"],
];
