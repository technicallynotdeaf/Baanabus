window.initStoryBooks = function() {
  // Set active story in vault first, then open the reader
  window._openStory = function(storyId) {
    fetch('api/set_active_story.php', {
      method:  'POST',
      headers: {'Content-Type': 'application/json'},
      body:    JSON.stringify({story_id: storyId}),
    }).finally(() => loadOverlay('api/story_read.php?story=' + storyId));
  };

  window._storyReset = function(storyId) {
    fetch('api/story_reset.php', {
      method:  'POST',
      headers: {'Content-Type': 'application/json'},
      body:    JSON.stringify({story_id: storyId}),
    })
    .then(r => r.json())
    .then(d => { if (d.ok) loadOverlay('api/story_read.php?story=' + storyId); })
    .catch(e => console.error('Story reset error:', e));
  };
};
