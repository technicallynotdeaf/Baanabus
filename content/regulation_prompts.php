<?php
// Default grounding/regulation prompts.
// IDs are permanent — never reuse a deleted ID.
// Categories: movement, breath, sensory, cognitive, self_compassion, somatic
// 'bedtime_suitable' => true marks prompts calm/low-stimulation enough to
// surface in the evening wind-down pool (see pickBedtimeWindDown() in
// config_helper.php) as well as daytime Reset mode. Deliberately NOT set on
// the activating movement prompts (dance, cold water, stairs) — wrong
// direction for winding down.
return [
    // Movement
    ['id' =>  1, 'category' => 'movement',       'text' => "Put some pumping music on and dance somewhere private for 2 minutes. A bathroom, meeting room, car — wherever works.", 'seconds' => 120],
    ['id' =>  2, 'category' => 'movement',       'text' => "Shake your hands and arms out for 30 seconds, like you're flinging water off them.", 'seconds' => 30],
    ['id' =>  3, 'category' => 'movement',       'text' => "10 slow shoulder rolls forward, then 10 back. Notice your shoulders dropping as you go.", 'bedtime_suitable' => true],
    ['id' =>  4, 'category' => 'movement',       'text' => "Walk up and down a flight of stairs twice, or do a lap around the building."],
    ['id' =>  5, 'category' => 'movement',       'text' => "Stand up and push your feet into the floor — really press down. Hold for 5 slow breaths."],
    ['id' =>  6, 'category' => 'movement',       'text' => "Run cold water over your wrists for 30 seconds. Or splash some on your face.", 'seconds' => 30],

    // Breath
    ['id' =>  7, 'category' => 'breath',         'text' => "Box breathing: in for 4 counts, hold 4, out 4, hold 4. Do it 4 times. That's it.", 'bedtime_suitable' => true],
    ['id' =>  8, 'category' => 'breath',         'text' => "Physiological sigh: double inhale through your nose (sniff, then top it up), then one long slow exhale through your mouth. Do 3.", 'bedtime_suitable' => true],
    ['id' =>  9, 'category' => 'breath',         'text' => "Breathe in for 4 counts, out for 8. The longer exhale activates your rest system. Do it 6 times.", 'bedtime_suitable' => true],
    ['id' => 10, 'category' => 'breath',         'text' => "Yawn. Fake it until it's real — your body will follow. Big jaw-drop, arms overhead if you can."],

    // Sensory
    ['id' => 11, 'category' => 'sensory',        'text' => "5-4-3-2-1: name 5 things you can see, 4 you can hear, 3 you can touch right now, 2 you can smell, 1 you can taste."],
    ['id' => 12, 'category' => 'sensory',        'text' => "Hold something cold — a cold drink, your phone from your bag, the metal edge of something near you."],
    ['id' => 13, 'category' => 'sensory',        'text' => "Strong smell: hand cream, coffee, something citrus. Hold it close and breathe in slowly."],
    ['id' => 14, 'category' => 'sensory',        'text' => "Chew something with a strong flavour — mint gum, a lemon wedge, a strongly-flavoured coffee."],
    ['id' => 15, 'category' => 'sensory',        'text' => "Put your hands flat on a surface and press down. Notice the texture, the temperature, the resistance."],

    // Cognitive / orienting
    ['id' => 16, 'category' => 'cognitive',      'text' => "Look around the room and spot every red object. Then blue. Then green. Just look."],
    ['id' => 17, 'category' => 'cognitive',      'text' => "Think of somewhere you love to be. Put yourself there in detail — what does it smell like? Sound like?"],
    ['id' => 18, 'category' => 'cognitive',      'text' => "Name one animal for each letter of the alphabet, as far as you can get."],
    ['id' => 19, 'category' => 'cognitive',      'text' => "What's the most interesting thing you've learned in the last week?"],

    // Self-compassion
    ['id' => 20, 'category' => 'self_compassion','text' => "Put a hand on your chest. Say to yourself: this is hard right now. That's okay. I'm doing okay.", 'bedtime_suitable' => true],
    ['id' => 21, 'category' => 'self_compassion','text' => "Think of someone who loves you. What would they say to you right now if they could see you?", 'bedtime_suitable' => true],
    ['id' => 22, 'category' => 'self_compassion','text' => "What's one small thing that's gone okay today — even something tiny?", 'bedtime_suitable' => true],
    ['id' => 23, 'category' => 'self_compassion','text' => "You don't have to fix everything right now. One small thing is enough. What's the one thing?", 'bedtime_suitable' => true],

    // Somatic
    ['id' => 24, 'category' => 'somatic',        'text' => "Clench every muscle in your body as tight as you can for 5 seconds, then release all at once. Repeat 3 times.", 'seconds' => 5, 'bedtime_suitable' => true],
    ['id' => 25, 'category' => 'somatic',        'text' => "Hum something — anything. The vibration in your chest and throat activates your rest system. Keep going for a minute.", 'seconds' => 60, 'bedtime_suitable' => true],
    ['id' => 26, 'category' => 'somatic',        'text' => "Massage your hands slowly — press into your palm, work each finger. A minute of this is surprisingly calming.", 'seconds' => 60, 'bedtime_suitable' => true],

    // Bedtime wind-down additions (all bedtime_suitable — low-stimulation by design)
    ['id' => 27, 'category' => 'sensory',        'text' => "Close your eyes for 10 seconds. Just let the dark be dark.", 'seconds' => 10, 'bedtime_suitable' => true],
    ['id' => 28, 'category' => 'sensory',        'text' => "Find the furthest point you can see — out a window, down a hallway — and rest your eyes on it for 20 seconds. Let them stop focusing up close.", 'seconds' => 20, 'bedtime_suitable' => true],
    ['id' => 29, 'category' => 'somatic',        'text' => "Slow neck stretch: ear toward one shoulder, hold, breathe, then the other side. No rush.", 'bedtime_suitable' => true],
];
