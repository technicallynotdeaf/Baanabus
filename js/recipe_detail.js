window.initRecipeDetail = function () {
  const root = document.getElementById('recipe-detail-root');
  if (!root) return;

  const recipeId = parseInt(root.dataset.recipeId, 10);
  let ingredients = [];
  try { ingredients = JSON.parse(root.dataset.ingredients || '[]'); } catch (e) { ingredients = []; }

  const esc = s => String(s ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');

  function renderIngredients() {
    const el = document.getElementById('rd-ingredient-list');
    if (!ingredients.length) {
      el.innerHTML = '<p class="muted" style="font-size:0.85em;">No structured ingredients yet — add some below to enable cost/nutrition calculation.</p>';
      return;
    }
    el.innerHTML = ingredients.map((ing, i) => `
      <div style="display:flex;justify-content:space-between;align-items:center;padding:4px 0;border-bottom:1px solid #f0f0f0;font-size:0.88em;">
        <span>${esc(ing.name)} — ${ing.weight_g}g</span>
        <button data-i="${i}" class="rd-remove-ing" style="font-size:0.75em;padding:2px 8px;min-height:24px;
                background:transparent;color:#c0392b;border:1px solid #c0392b;border-radius:6px;cursor:pointer;">Remove</button>
      </div>`).join('');
    el.querySelectorAll('.rd-remove-ing').forEach(btn => {
      btn.addEventListener('click', () => {
        ingredients.splice(parseInt(btn.dataset.i, 10), 1);
        renderIngredients();
      });
    });
  }
  renderIngredients();

  // ── Ingredient search (mirrors food_log.js) ─────────────────────────────
  const searchEl  = document.getElementById('rd-search');
  const suggestEl = document.getElementById('rd-suggestions');
  const servingEl = document.getElementById('rd-serving');
  const qtyEl     = document.getElementById('rd-qty');
  const addBtn    = document.getElementById('rd-add-ingredient');
  const ingStatus = document.getElementById('rd-ingredient-status');
  let selectedFood = null;
  let searchTimer  = null;

  searchEl.addEventListener('input', () => {
    clearTimeout(searchTimer);
    const q = searchEl.value.trim();
    if (q.length < 1) { suggestEl.style.display = 'none'; return; }
    searchTimer = setTimeout(() => runSearch(q), 200);
  });
  searchEl.addEventListener('blur', () => setTimeout(() => { suggestEl.style.display = 'none'; }, 200));

  async function runSearch(q) {
    const res  = await fetch('api/food_search.php?q=' + encodeURIComponent(q));
    const data = await res.json();
    if (!data.length) { suggestEl.style.display = 'none'; return; }
    suggestEl.innerHTML = data.map(f => `
      <div class="rd-suggest-item" data-food='${JSON.stringify(f)}'
           style="padding:8px 12px;cursor:pointer;font-size:0.9em;border-bottom:1px solid #f0f0f0;">
        <strong>${esc(f.name)}</strong>
      </div>`).join('');
    suggestEl.style.display = 'block';
    suggestEl.querySelectorAll('.rd-suggest-item').forEach(el => {
      el.addEventListener('mousedown', () => selectFood(JSON.parse(el.dataset.food)));
    });
  }

  async function selectFood(f) {
    searchEl.value = f.name;
    suggestEl.style.display = 'none';
    selectedFood = f;
    const res = await fetch('api/food_log.php', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({action: 'get_servings', food_id: f.food_id}),
    });
    const servings = await res.json();
    servingEl.innerHTML = servings.map(s =>
      `<option value="${s.serving_id}" data-weight="${s.weight_g}" ${s.is_default ? 'selected' : ''}>${esc(s.unit_label)}</option>`
    ).join('');
  }

  addBtn.addEventListener('click', () => {
    if (!selectedFood) { ingStatus.textContent = 'Pick a food first.'; return; }
    const opt      = servingEl.selectedOptions[0];
    const servingW = opt ? parseFloat(opt.dataset.weight) : 0;
    const qty      = parseFloat(qtyEl.value) || 1;
    if (!servingW) { ingStatus.textContent = 'Pick a serving first.'; return; }
    ingredients.push({ food_id: selectedFood.food_id, weight_g: Math.round(servingW * qty * 10) / 10, name: selectedFood.name });
    renderIngredients();
    searchEl.value = '';
    selectedFood = null;
    servingEl.innerHTML = '<option value="">— pick food first —</option>';
    qtyEl.value = 1;
    ingStatus.textContent = 'Added — recalculate to update cost/nutrition.';
  });

  // ── Save details (name/notes/tags/portions) ─────────────────────────────
  document.getElementById('rd-save-details').addEventListener('click', async () => {
    const status = document.getElementById('rd-save-status');
    status.textContent = 'Saving…';
    const tags = document.getElementById('rd-tags').value.split(',').map(t => t.trim()).filter(Boolean);
    try {
      const res  = await fetch('api/recipe_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
          action: 'update', recipe_id: recipeId,
          name: document.getElementById('rd-name').value,
          notes: document.getElementById('rd-notes').value,
          ingredients_text: document.getElementById('rd-ingredients-text').value,
          default_portions: parseInt(document.getElementById('rd-portions').value, 10) || 1,
          tags,
        }),
      });
      const data = await res.json();
      status.textContent = data.ok ? 'Saved.' : (data.error || 'Error.');
    } catch (e) {
      status.textContent = 'Network error.';
    }
  });

  // ── Calculate cost + nutrition ───────────────────────────────────────────
  document.getElementById('rd-calculate').addEventListener('click', async () => {
    const btn = document.getElementById('rd-calculate');
    btn.disabled = true;
    btn.textContent = 'Calculating…';
    try {
      const portions = parseInt(document.getElementById('rd-portions').value, 10) || 1;
      const res  = await fetch('api/recipe_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
          action: 'precalculate', recipe_id: recipeId, portions,
          ingredients: ingredients.map(i => ({ food_id: i.food_id, weight_g: i.weight_g })),
        }),
      });
      const data = await res.json();
      if (data.ok) {
        document.getElementById('rd-portion-cost').textContent = '$' + data.portion_cost.toFixed(2);
        document.getElementById('rd-batch-cost').textContent   = '$' + data.batch_cost.toFixed(2);
        document.querySelectorAll('#rd-nutrition-grid [data-nkey]').forEach(el => {
          const v = data.portion_nutrition[el.dataset.nkey];
          el.textContent = v !== undefined ? Math.round(v * 10) / 10 : '—';
        });
        document.getElementById('rd-calc-results').style.display = 'block';
      }
    } catch (e) {
      // swallow — button re-enables below regardless
    } finally {
      btn.disabled = false;
      btn.textContent = 'Calculate cost & nutrition';
    }
  });

  // ── Delete ────────────────────────────────────────────────────────────────
  document.getElementById('rd-delete').addEventListener('click', async () => {
    if (!confirm('Delete this recipe? This cannot be undone.')) return;
    await fetch('api/recipe_action.php', {
      method: 'POST', headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({action: 'delete', recipe_id: recipeId}),
    });
    if (typeof window.loadOverlay === 'function') window.loadOverlay('list_recipes.php');
  });
};
