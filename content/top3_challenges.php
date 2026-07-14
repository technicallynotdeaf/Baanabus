<?php
// Top 3 challenge pool — every entry maps to exactly one `category`, which is
// credited automatically from real app actions via creditTop3Progress() in
// config_helper.php. Nothing here is self-reported; mode 'increment' counts
// qualifying events since the jar was generated, mode 'recompute' re-derives
// the true current value each time (used where the count can go both up and
// down, so tallying events would drift from reality).
return [
    ['id' => 'task_add',       'category' => 'task_add',       'label' => 'Add {n} tasks',                            'n_range' => [1, 5],  'points_range' => [10, 30], 'mode' => 'increment'],
    ['id' => 'task_complete',  'category' => 'task_complete',  'label' => 'Complete {n} tasks',                       'n_range' => [1, 6],  'points_range' => [15, 35], 'mode' => 'increment'],
    ['id' => 'inbox_triage',   'category' => 'inbox_triage',   'label' => 'Clear {n} things from your inbox',         'n_range' => [2, 8],  'points_range' => [10, 30], 'mode' => 'increment'],
    ['id' => 'inbox_zero',     'category' => 'inbox_zero',     'label' => 'Get your inbox to zero',                   'n_range' => [1, 1],  'points_range' => [20, 40], 'mode' => 'recompute'],
    ['id' => 'fill_info',      'category' => 'fill_info',      'label' => 'Fill in {n} missing pieces of info',       'n_range' => [3, 10], 'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'calendar_set',   'category' => 'calendar_set',   'label' => 'Put {n} things on your calendar',          'n_range' => [1, 4],  'points_range' => [15, 35], 'mode' => 'increment'],
    ['id' => 'declutter',      'category' => 'declutter',      'label' => 'Send {n} tasks to someday or waiting',     'n_range' => [1, 5],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'snooze_old',     'category' => 'snooze_old',     'label' => 'Reschedule {n} stale tasks',               'n_range' => [1, 4],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'subtask_break',  'category' => 'subtask_break',  'label' => 'Break {n} tasks into first steps',         'n_range' => [1, 3],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'checkin_done',   'category' => 'checkin_done',   'label' => 'Complete your check-in for the day',       'n_range' => [1, 1],  'points_range' => [10, 20], 'mode' => 'increment'],
    ['id' => 'daily_routine',  'category' => 'daily_routine',  'label' => 'Complete {n} routine tasks',               'n_range' => [1, 4],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'person_review',  'category' => 'person_review',  'label' => 'Review {n} people',                        'n_range' => [1, 3],  'points_range' => [15, 30], 'mode' => 'increment'],
    ['id' => 'person_note',    'category' => 'person_note',    'label' => 'Add {n} notes about people',               'n_range' => [1, 3],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'room_scan',      'category' => 'room_scan',      'label' => 'Scan {n} rooms for stray objects',         'n_range' => [1, 2],  'points_range' => [10, 20], 'mode' => 'increment'],
    ['id' => 'object_resolve', 'category' => 'object_resolve', 'label' => 'Resolve {n} out-of-place objects',         'n_range' => [1, 3],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'food_log',       'category' => 'food_log',       'label' => 'Log {n} food entries today',               'n_range' => [2, 4],  'points_range' => [10, 20], 'mode' => 'increment'],
    ['id' => 'nutrient_hit',   'category' => 'nutrient_hit',   'label' => 'Hit your target on {n} nutrients today',   'n_range' => [2, 6],  'points_range' => [10, 30], 'mode' => 'recompute'],
    ['id' => 'task_add_2',     'category' => 'task_add',       'label' => 'Capture {n} new tasks',                    'n_range' => [1, 4],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'task_complete_2','category' => 'task_complete',  'label' => 'Knock off {n} tasks',                      'n_range' => [1, 5],  'points_range' => [15, 30], 'mode' => 'increment'],
    ['id' => 'inbox_triage_2', 'category' => 'inbox_triage',   'label' => 'Triage {n} inbox items',                   'n_range' => [2, 6],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'fill_info_2',    'category' => 'fill_info',      'label' => 'Round out {n} half-finished tasks',        'n_range' => [3, 8],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'calendar_set_2', 'category' => 'calendar_set',   'label' => 'Schedule {n} tasks onto the calendar',     'n_range' => [1, 3],  'points_range' => [15, 30], 'mode' => 'increment'],
    ['id' => 'declutter_2',    'category' => 'declutter',      'label' => 'Clear {n} tasks off your active list',     'n_range' => [1, 4],  'points_range' => [10, 25], 'mode' => 'increment'],
    ['id' => 'snooze_old_2',   'category' => 'snooze_old',     'label' => 'Give {n} old tasks a new date',            'n_range' => [1, 3],  'points_range' => [10, 20], 'mode' => 'increment'],
    ['id' => 'food_log_2',     'category' => 'food_log',       'label' => 'Log what you eat {n} times today',        'n_range' => [2, 3],  'points_range' => [10, 20], 'mode' => 'increment'],
    ['id' => 'nutrient_hit_2', 'category' => 'nutrient_hit',   'label' => 'Reach {n} nutrient targets today',        'n_range' => [2, 5],  'points_range' => [15, 30], 'mode' => 'recompute'],
    ['id' => 'daily_routine_2','category' => 'daily_routine',  'label' => 'Tick off {n} of today\'s routines',        'n_range' => [1, 3],  'points_range' => [10, 20], 'mode' => 'increment'],
];
