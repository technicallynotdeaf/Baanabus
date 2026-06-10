window.initStoryRead = function() {
    const storyId = document.getElementById('story-content')?.dataset.storyId || 'q1';

    window._storyChoose = function(choiceKey) {
        document.querySelectorAll('#story-choices button').forEach(b => b.disabled = true);
        fetch('api/story_choose.php', {
            method:  'POST',
            headers: {'Content-Type': 'application/json'},
            body:    JSON.stringify({story_id: storyId, choice_key: choiceKey}),
        })
        .then(r => r.json())
        .then(d => {
            if (d.ok) loadOverlay(`api/story_read.php?story=${storyId}`);
            else {
                document.querySelectorAll('#story-choices button').forEach(b => b.disabled = false);
                console.error('Story choose error:', d.error);
            }
        })
        .catch(e => {
            document.querySelectorAll('#story-choices button').forEach(b => b.disabled = false);
            console.error('Story choose error:', e);
        });
    };
};
