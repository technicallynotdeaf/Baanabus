// Global (not data-init) since this only wires static onclick handlers in
// api/birthday_today.php's server-rendered markup — no per-load DOM query
// needed, so it doesn't need the overlay init-dispatch pattern.
window._dismissBirthday = function(personId, btn) {
  btn.disabled = true;
  fetch('api/person_action.php', {
    method: 'POST', headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({person_id: personId, action: 'dismiss_birthday_today'}),
  })
    .then(r => r.json())
    .then(data => {
      if (!data.ok) { btn.disabled = false; return; }
      btn.textContent = '✓ Handled';
      btn.classList.remove('action-button');
      btn.style.cssText = 'font-size:0.82em;color:#7a9e7e;background:none;border:none;white-space:nowrap;';
      btn.disabled = true;
      removeFromSceneBadge(personId);
    })
    .catch(() => { btn.disabled = false; });
};

function removeFromSceneBadge(personId) {
  const badge = document.getElementById('scene-birthday');
  if (!badge || !badge.classList.contains('today')) return;
  let people = [];
  try { people = JSON.parse(badge.dataset.todayPeople || '[]'); } catch (e) {}
  people = people.filter(p => p.id !== personId);
  badge.dataset.todayPeople = JSON.stringify(people);
  if (!people.length) {
    badge.style.display = 'none';
    return;
  }
  const namesEl = badge.querySelector('.scene-birthday-names');
  if (namesEl) namesEl.textContent = people.map(p => p.name).join(', ');
}
