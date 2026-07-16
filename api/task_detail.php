<?php
/**
 * api/task_detail.php — "full" task view: every field + edit controls + subtasks.
 * GET ?id=N
 */
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../config_helper.php';

if (empty($_SESSION['is_authenticated'])) { http_response_code(403); exit; }
if (empty($_SESSION['DEK']))              { http_response_code(423); echo '<p class="muted">Vault is locked.</p>'; exit; }

$taskId = (int)($_GET['id'] ?? 0);
if (!$taskId) { echo '<p class="muted">Missing task id.</p>'; exit; }

$data = getTasks();
$byId = [];
foreach ($data['tasks'] as $t) $byId[(int)$t['id']] = $t;

$task = $byId[$taskId] ?? null;
if (!$task) { echo '<p class="muted">Task not found.</p>'; exit; }

$subtasks = [];
foreach (($task['subtask_ids'] ?? []) as $sid) {
    if (isset($byId[(int)$sid]) && ($byId[(int)$sid]['status'] ?? '') !== 'deleted') {
        $subtasks[] = $byId[(int)$sid];
    }
}

$personName = null;
if (!empty($task['person_id'])) {
    try {
        foreach (getPeople()['people'] as $p) {
            if ((int)$p['person_id'] === (int)$task['person_id']) { $personName = $p['name'] ?? null; break; }
        }
    } catch (Throwable $e) {}
}

$activeContexts = [];
if ($database) {
    $activeContexts = $database->query("SELECT context FROM contexts WHERE is_active=1 ORDER BY context")->fetchAll(PDO::FETCH_COLUMN);
}

$isDone = ($task['status'] ?? '') === 'complete';
$esc = fn($v) => htmlspecialchars((string)($v ?? ''));
$sel = fn($val, $opt) => ((string)($val ?? '') === (string)$opt) ? 'selected' : '';
?>
<div data-init="initTaskDetail" data-task-id="<?= $taskId ?>" style="padding-bottom:1rem;">
  <div style="display:flex;align-items:flex-start;gap:8px;margin-bottom:0.75rem;">
    <input type="checkbox" id="td-done" <?= $isDone ? 'checked' : '' ?>
           style="margin-top:6px;width:20px;height:20px;flex-shrink:0;">
    <input type="text" id="td-title" value="<?= $esc($task['title']) ?>" maxlength="300"
           style="flex:1;font-size:1.05em;font-weight:600;<?= $isDone ? 'color:#aaa;text-decoration:line-through;' : '' ?>">
  </div>

  <textarea id="td-description" placeholder="Add a note or description…" rows="3"
            style="width:100%;box-sizing:border-box;margin-bottom:0.75rem;font-size:0.92em;"><?= $esc($task['description']) ?></textarea>

  <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:0.75rem;">
    <div style="flex:1;min-width:110px;">
      <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Type</label>
      <select id="td-task_type" style="width:100%;">
        <?php foreach (['next_action'=>'Next action','someday'=>'Someday','waiting'=>'Waiting','project'=>'Project','reference'=>'Reference','inbox'=>'Inbox'] as $val=>$label): ?>
        <option value="<?= $val ?>" <?= $sel($task['task_type'] ?? '', $val) ?>><?= $label ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div style="flex:1;min-width:110px;">
      <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Urgency</label>
      <select id="td-urgency" style="width:100%;">
        <option value="high"   <?= $sel($task['urgency'] ?? '', 'high') ?>>Today / next few days</option>
        <option value="medium" <?= $sel($task['urgency'] ?? '', 'medium') ?>>Next few weeks</option>
        <option value="low"    <?= $sel($task['urgency'] ?? '', 'low') ?>>Later</option>
      </select>
    </div>
    <div style="flex:1;min-width:110px;">
      <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Importance</label>
      <select id="td-importance" style="width:100%;">
        <option value="high"   <?= $sel($task['importance'] ?? '', 'high') ?>>High — really matters</option>
        <option value="medium" <?= $sel($task['importance'] ?? '', 'medium') ?>>Medium</option>
        <option value="low"    <?= $sel($task['importance'] ?? '', 'low') ?>>Low — minor</option>
      </select>
    </div>
    <div style="flex:1;min-width:110px;">
      <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Energy</label>
      <select id="td-energy" style="width:100%;">
        <option value="low"    <?= $sel($task['energy'] ?? '', 'low') ?>>Low</option>
        <option value="medium" <?= $sel($task['energy'] ?? '', 'medium') ?>>Medium</option>
        <option value="high"   <?= $sel($task['energy'] ?? '', 'high') ?>>High</option>
      </select>
    </div>
    <div style="flex:1;min-width:110px;">
      <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Location</label>
      <select id="td-location" style="width:100%;">
        <option value="" <?= $sel($task['location'] ?? '', '') ?>>Anywhere</option>
        <?php foreach (['home','work','shops','online','phone'] as $loc): ?>
        <option value="<?= $loc ?>" <?= $sel($task['location'] ?? '', $loc) ?>><?= ucfirst($loc) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div style="flex:1;min-width:110px;">
      <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Context</label>
      <select id="td-context" style="width:100%;">
        <option value="">None</option>
        <?php foreach ($activeContexts as $ctx): ?>
        <option value="<?= $esc($ctx) ?>" <?= $sel(trim($task['context'] ?? ''), $ctx) ?>><?= $esc($ctx) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div style="flex:1;min-width:90px;">
      <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Minutes</label>
      <input type="number" id="td-time" min="0" value="<?= $esc($task['time']) ?>" style="width:100%;">
    </div>
    <div style="flex:1;min-width:130px;">
      <label style="font-size:0.78em;color:#555;display:block;margin-bottom:3px;">Deadline</label>
      <input type="date" id="td-deadline" value="<?= $esc(substr($task['deadline'] ?? '', 0, 10)) ?>" style="width:100%;">
    </div>
  </div>

  <?php if (!empty($task['snoozed_until'])): ?>
  <p class="muted" style="font-size:0.82em;margin-bottom:0.5rem;">
    Snoozed until <?= $esc(date('D j M, g:ia', strtotime($task['snoozed_until']))) ?>
    — use Snooze on the task list to change this.
  </p>
  <?php endif; ?>

  <?php if ($personName): ?>
  <p class="muted" style="font-size:0.82em;margin-bottom:0.5rem;">Linked to <strong><?= $esc($personName) ?></strong></p>
  <?php endif; ?>

  <p id="td-status" class="muted" style="min-height:1.2em;font-size:0.85em;margin:0.5rem 0;"></p>
  <button class="btn" id="td-save" style="padding:8px 16px;font-size:0.9em;min-height:40px;margin-bottom:1rem;">Save changes</button>

  <div style="border-top:1px solid #eee;padding-top:0.75rem;">
    <p style="font-size:0.82em;font-weight:600;color:#555;margin:0 0 0.4rem;">
      Subtasks <span class="muted" style="font-weight:400;"><?= count($subtasks) ?></span>
    </p>
    <div id="td-subtasks">
      <?php foreach ($subtasks as $s): $sDone = ($s['status'] ?? '') === 'complete'; ?>
      <div class="td-subtask-row" data-id="<?= (int)$s['id'] ?>" style="display:flex;align-items:center;gap:8px;padding:0.3rem 0;">
        <input type="checkbox" class="td-subtask-check" data-id="<?= (int)$s['id'] ?>" <?= $sDone ? 'checked' : '' ?> style="width:18px;height:18px;flex-shrink:0;">
        <span style="flex:1;font-size:0.92em;<?= $sDone ? 'color:#aaa;text-decoration:line-through;' : '' ?>"><?= $esc($s['title']) ?></span>
      </div>
      <?php endforeach; ?>
      <?php if (!$subtasks): ?><p class="muted" style="font-size:0.85em;">No subtasks yet.</p><?php endif; ?>
    </div>
    <div style="display:flex;gap:6px;margin-top:0.5rem;">
      <input type="text" id="td-new-subtask" placeholder="Add a subtask…" maxlength="300" style="flex:1;">
      <button class="btn" id="td-add-subtask" style="padding:6px 12px;font-size:0.85em;min-height:36px;flex-shrink:0;">Add</button>
    </div>
  </div>
</div>
