<?php
// The Chai Meridian — CYOA story pages
// Node keys: "{page_number}_{branch}"
// Each node: prose, choices (array of {text, next}) or empty for terminal nodes
return [
    'id'    => 1,
    'title' => 'The Chai Meridian',
    'color' => '#C8813A',

    'pages' => [

        '1_start' => [
            'prose' => "The map is written on the back of a prayer flag, grandmother's handwriting faded but still legible. You're sitting in a tea house at the edge of Chandrapur, six days' walk above the valley floor, and the woman across the table has been watching you since you sat down.

The blade is tucked inside your coat — not grandmother's blade, that one is locked in the collector's house in Delhi, which is why you borrowed this one from his kitchen. The meridian is somewhere above the snowline. According to the map, you'll know it when you see it.

The woman stands.",
            'choices' => [
                ['text' => 'Fold the map before she can see it', 'next' => '2_fold'],
                ['text' => 'Let her approach',                   'next' => '2_approach'],
            ],
        ],

        '2_fold' => [
            'prose' => "You fold the prayer flag twice, tuck it away, and are out the door before she reaches your table. The streets of Chandrapur wind upward. Thin air. A dog watches you from a doorway.

At the north gate, a boy is selling cardamom from a sack, and he looks at you the same way the woman did — like he's been told to expect you.",
            'choices' => [
                ['text' => 'Buy a handful and ask what he knows', 'next' => '3_cardamom'],
                ['text' => 'Walk through the gate without stopping', 'next' => '3_gate'],
            ],
        ],

        '2_approach' => [
            'prose' => "Her name is Miriam. She says it matter-of-factly, like she's been rehearsing. She sits across from you and orders two chais without asking. She speaks good Hindi, better Nepali.

She says she's been to the meridian and come back, which almost nobody does. She says the path is technically easy but geographically unkind.",
            'choices' => [
                ['text' => 'Ask what she means by unkind',  'next' => '3_unkind'],
                ['text' => 'Ask if she will take you there', 'next' => '3_guide'],
            ],
        ],

        '3_cardamom' => [
            'prose' => "The boy's name is Babu. He doesn't know much about the meridian specifically, but he knows about the ice cave at the third false peak — everyone local does. He says it's not a cave, really. More of a threshold.

He draws a mark in the dust with his heel that matches something in the corner of grandmother's map. You give him more cardamom money than the handful cost.",
            'choices' => [
                ['text' => 'Continue to the glacier', 'next' => '4_glacier'],
            ],
        ],

        '3_gate' => [
            'prose' => "The north gate guard is a woman with a thermos of something that isn't tea. She doesn't stop you, but she stamps a chit you didn't know you needed, which means someone now has a record of you going up.

You're three hours above the town before you stop thinking about that.",
            'choices' => [
                ['text' => 'Continue to the glacier', 'next' => '4_glacier'],
            ],
        ],

        '3_unkind' => [
            'prose' => "Miriam says: the path is easy to follow, difficult to finish. The glacier speaks. She means it literally — there are sounds, cracks, movements that have no meteorological cause.

The stone at the top is marked in a language that isn't Sanskrit or Tibetan. She's had a linguist look at photographs. The linguist had questions that Miriam wasn't prepared to answer.",
            'choices' => [
                ['text' => 'Continue to the glacier', 'next' => '4_glacier'],
            ],
        ],

        '3_guide' => [
            'prose' => "She says no immediately, but then asks why you're going. You tell her about grandmother. She asks if you know what the blade unlocks.

You don't.

She says that's honest, and that honest people have a better time at the meridian than clever ones. She gives you the name of a lodge keeper near the snowline and writes it in her own handwriting, which is different from grandmother's but not entirely unlike it.",
            'choices' => [
                ['text' => 'Continue to the glacier', 'next' => '4_glacier'],
            ],
        ],

        '4_glacier' => [
            'prose' => "The glacier is steel-coloured under a high thin sky. You can see the false peaks from here — three of them, arranged like a question mark. The path is obvious in the morning: darker rock beneath the ice. By afternoon it will be camouflaged.

The map suggests the standing stone is beyond the third peak, but the map is fifty years old and glaciers move. The blade is still warm inside your coat, which is strange, because you've been walking in single digits for hours.",
            'choices' => [
                ['text' => 'Push for the first peak before making camp', 'next' => '5_push'],
                ['text' => 'Camp here and take the first peak in morning light', 'next' => '5_camp'],
            ],
        ],

        '5_push' => [
            'prose' => "You reach the first peak with an hour of light left. The view is staggering — four countries, allegedly. The second peak is closer than the map suggested, which means the third is too.

The blade is warm against your ribs. You take it out and it catches the last of the light in a way that metal usually doesn't.",
            'choices' => [
                ['text' => 'Push for the second peak before dark', 'next' => '6_second_peak'],
                ['text' => 'Camp here — the second peak in the morning', 'next' => '6_second_peak'],
            ],
        ],

        '5_camp' => [
            'prose' => "The night on the glacier is spectacular and cold. You're woken twice: once by a sound like a door opening somewhere beneath the ice, once by nothing you can name.

In the morning the air is still and the first peak is lit gold before the rest of the mountain. You eat the last of the cardamom bread and start climbing, and the blade is warm against your ribs in a way that has nothing to do with body heat.",
            'choices' => [
                ['text' => 'Continue toward the second peak', 'next' => '6_second_peak'],
            ],
        ],

        '6_second_peak' => [
            'prose' => "The second peak is different from the first. The path narrows here — not difficult, just deliberate, like it was made narrower on purpose. The ice on either side is older, blue-white and compressed, and the sounds Miriam mentioned have started: not wind, not ice settling. Something below the surface, rhythmic.

The blade is so warm you've unbuttoned your coat.",
            'choices' => [
                ['text' => 'Stop and listen to the rhythm', 'next' => '7_listen'],
                ['text' => "Keep moving — don't give it the attention", 'next' => '7_keep_moving'],
            ],
        ],

        '7_listen' => [
            'prose' => "Three beats, pause, three beats. You stand still long enough to be certain of the pattern. Then you take one step forward and it changes: four beats, pause, one.

Like it noticed you.

You stand there a while longer. The pattern doesn't change again. Whatever is down there has said what it wanted to say.",
            'choices' => [
                ['text' => 'Continue to the third peak', 'next' => '8_third_peak'],
            ],
        ],

        '7_keep_moving' => [
            'prose' => "Whatever is below the ice knows you're there. You can tell because when you stop, the sound stops too — and when you move, it matches your pace for thirty seconds before falling back into its own rhythm.

Easier not to test it. You reach the top of the second peak before noon and do not look back at the path you came up.",
            'choices' => [
                ['text' => 'Continue to the third peak', 'next' => '8_third_peak'],
            ],
        ],

        '8_third_peak' => [
            'prose' => "The standing stone is visible from the third peak — smaller than you expected, and darker. Black basalt, grandmother's map said. From here you can see something at its base that catches the light the same way the blade does.

Around the stone the ice is oldest: compressed over centuries, almost grey. The path to it crosses thirty metres of open glacier with no cover, and the wind has picked up.",
            'choices' => [
                ['text' => "Cross directly — it's thirty metres", 'next' => '9_cross_direct'],
                ['text' => 'Circle the long way and find a stable line', 'next' => '9_circle'],
            ],
        ],

        '9_cross_direct' => [
            'prose' => "The ice holds. Halfway across, the blade vibrates once — a single pulse, felt more than heard, like a struck bell heard through water. You stop. Nothing else happens. You keep walking.

The stone is waist-high, as described. Grandmother's initials are cut into the base, exactly where the map said. Below them: a small brass door, set flush into the basalt, so flush you'd miss it without knowing to look.",
            'choices' => [
                ['text' => 'Try the blade in the lock', 'next' => '10_the_door'],
            ],
        ],

        '9_circle' => [
            'prose' => "The long route takes forty minutes and is better ice — older, more stable. You reach the stone from the north side, which isn't shown on the map, and find something the map doesn't mark: a second set of initials cut shallower, in a different hand, in a script you don't recognise.

You take a photograph. Then you walk around to the south face where grandmother's initials are, and below them the small brass door, set so flush into the basalt that you feel it before you see it.",
            'choices' => [
                ['text' => 'Try the blade in the lock', 'next' => '10_the_door'],
            ],
        ],

        '10_the_door' => [
            'prose' => "The blade fits the keyhole — not perfectly, but it was never quite meant for this, which is perhaps the point. You feel two catches, then a third. Something inside the stone moves, deliberate and unhurried, like it's been waiting to be polite about this.

The door opens inward. Behind it: a recess about the size of a shoebox, dry despite everything. Inside the recess, a tin box, dented, sealed with wax.",
            'choices' => [
                ['text' => 'Open it', 'next' => '11_open'],
                ['text' => 'Sit with it a moment first', 'next' => '11_wait'],
            ],
        ],

        '11_open' => [
            'prose' => "Inside the tin: a letter, folded twice, in grandmother's handwriting.

Not her old handwriting. Her handwriting from three years ago — the careful, slightly compressed script she used after her hands started troubling her. Which is impossible, because grandmother died four years ago.

The letter begins:

I knew you'd be quick about it. That was always your way. Sit down. The ice will hold.",
            'choices' => [],
            'terminal' => true,
        ],

        '11_wait' => [
            'prose' => "You sit on the ice with the tin in your lap for ten minutes. The glacier is quiet. Whatever was below the surface has stopped. The wind has dropped to nothing, which at this altitude means something but you're not sure what.

Then you open it. Inside: a letter, folded twice, in grandmother's handwriting — not her old handwriting but the careful, compressed script she used in her last years. Which is impossible because grandmother died four years ago.

The letter begins:

I knew you'd take your time. Good. You'll need that patience.",
            'choices' => [],
            'terminal' => true,
        ],

    ],
];
