window.initListRecipes = function () {
  const root = document.getElementById('recipes-root');
  if (!root) return;

  root.querySelectorAll('.rc-card').forEach(card => {
    card.addEventListener('click', () => {
      if (typeof window.loadOverlay === 'function') {
        window.loadOverlay('api/recipe_detail.php?id=' + card.dataset.id);
      }
    });
  });

  const newBtn    = document.getElementById('rc-new-btn');
  const newStatus = document.getElementById('rc-new-status');
  newBtn.addEventListener('click', async () => {
    const name = prompt("Recipe name?");
    if (!name || !name.trim()) return;
    newBtn.disabled = true;
    newStatus.textContent = 'Creating…';
    try {
      const res  = await fetch('api/recipe_action.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({action: 'add', name: name.trim()}),
      });
      const data = await res.json();
      if (data.ok && typeof window.loadOverlay === 'function') {
        window.loadOverlay('api/recipe_detail.php?id=' + data.recipe_id);
      } else {
        newStatus.textContent = data.error || 'Could not create recipe.';
        newBtn.disabled = false;
      }
    } catch (e) {
      newStatus.textContent = 'Network error.';
      newBtn.disabled = false;
    }
  });
};
