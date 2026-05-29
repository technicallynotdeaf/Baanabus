window.initStoryRead = function() {
    window._storyChoose = function(choiceKey) {
        document.querySelectorAll('#story-choices button').forEach(b => b.disabled = true);
        fetch('api/story_choose.php', {
            method:  'POST',
            headers: {'Content-Type': 'application/json'},
            body:    JSON.stringify({story_id: 1, choice_key: choiceKey}),
        })
        .then(r => r.json())
        .then(d => { if (d.ok) loadOverlay('api/story_read.php'); })
        .catch(e => console.error('Story choose error:', e));
    };
};
