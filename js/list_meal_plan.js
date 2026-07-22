window.initListMealPlan = function () {
  const root = document.getElementById('meal-plan-grid-root');
  if (!root) return;

  let recipes = [];
  try { recipes = JSON.parse(root.dataset.recipes || '[]'); } catch (e) { recipes = []; }

  const esc  = s => String(s ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  const host = document.getElementById('mpg-picker-host');

  const mealLabels = { breakfast: 'Breakfast', lunch: 'Lunch', dinner: 'Dinner' };

  root.querySelectorAll('.mpg-cell').forEach(cell => {
    cell.addEventListener('click', () => openPicker(cell));
  });

  function openPicker(cell) {
    const date = cell.dataset.date;
    const mealType = cell.dataset.mealType;
    const dateLabel = new Date(date + 'T00:00:00').toLocaleDateString('en-AU', { weekday: 'short', day: 'numeric', month: 'short' });

    const recipeBtns = recipes.map(r =>
      `<button class="action-button" data-recipe-id="${r.id}" data-recipe-name="${esc(r.name)}"
               style="padding:3px 9px;font-size:0.78em;min-height:28px;">${esc(r.name)}</button>`
    ).join('');

    host.innerHTML = `
      <div class="card" style="margin-top:0.5rem;">
        <div style="font-size:0.82em;color:#888;margin-bottom:6px;">${dateLabel} — ${mealLabels[mealType] || mealType}</div>
        <div style="display:flex;gap:5px;flex-wrap:wrap;margin-bottom:6px;">${recipeBtns || '<span class="muted" style="font-size:0.8em;">No saved recipes yet.</span>'}</div>
        <div style="display:flex;gap:5px;">
          <input type="text" id="mpg-custom-name" placeholder="Or type a name…" style="flex:1;font-size:0.85em;">
          <button class="action-button" id="mpg-save" style="padding:3px 10px;font-size:0.8em;min-height:28px;">Save</button>
          <button class="action-button" id="mpg-clear" style="padding:3px 10px;font-size:0.8em;min-height:28px;background:transparent;color:#888;border:1px solid #ccc;">Clear</button>
          <button class="action-button" id="mpg-close" style="padding:3px 10px;font-size:0.8em;min-height:28px;background:transparent;color:#888;border:1px solid #ccc;">Close</button>
        </div>
      </div>`;
    host.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

    function setBusy(busy) {
      host.querySelectorAll('button, input').forEach(el => el.disabled = busy);
    }

    function save(body) {
      setBusy(true);
      fetch('api/meal_plan.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ action: 'plan', date, meal_type: mealType, ...body }),
      })
      .then(r => r.json())
      .then(data => {
        if (data.ok) {
          cell.textContent = data.name;
          cell.style.background = '#fdf6e3';
          cell.style.color = '#5a4a1e';
          host.innerHTML = '';
        } else {
          setBusy(false);
        }
      })
      .catch(() => setBusy(false));
    }

    host.querySelectorAll('[data-recipe-id]').forEach(btn => {
      btn.addEventListener('click', () => save({ recipe_id: parseInt(btn.dataset.recipeId, 10), name: btn.dataset.recipeName }));
    });
    document.getElementById('mpg-save').addEventListener('click', () => {
      const name = document.getElementById('mpg-custom-name').value.trim();
      if (!name) return;
      save({ name });
    });
    document.getElementById('mpg-clear').addEventListener('click', () => {
      setBusy(true);
      fetch('api/meal_plan.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ action: 'clear', date, meal_type: mealType }),
      })
      .then(r => r.json())
      .then(data => {
        if (data.ok) {
          cell.textContent = (mealType === 'breakfast' ? 'B' : mealType === 'lunch' ? 'L' : 'D') + ' +';
          cell.style.background = '#f7f7f7';
          cell.style.color = '#bbb';
          host.innerHTML = '';
        } else {
          setBusy(false);
        }
      })
      .catch(() => setBusy(false));
    });
    document.getElementById('mpg-close').addEventListener('click', () => { host.innerHTML = ''; });
  }
};
