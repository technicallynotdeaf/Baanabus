<?php
return [
    'id'    => 1,
    'title' => 'The Letter in the Attic',
    'color' => '#6B8050',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIGF0dGljIHNtZWxscyBvZiBsYXZlbmRlciBhbmQgb2xkIHdvb2QgYW5kIHNvbWV0aGluZyBlbHNlIHlvdSBjYW4ndCBuYW1lIOKAlCByZXNpbiwgbWF5YmUsIG9yIHRoZSBwYXJ0aWN1bGFyIGR1c3Qgb2YgdGhpbmdzIHRoYXQgaGF2ZSBiZWVuIHN0aWxsIGZvciBhIGxvbmcgdGltZS4gVGhlIHdpbmRvdyBmYWNlcyBub3J0aC4gVGhlIGxpZ2h0IGlzIHRoaW4gYW5kIGhvbmVzdC4KClRoZSBjaGVzdCBpcyB1bmRlciB0aGUgZWF2ZSwgZXhhY3RseSB3aGVyZSBNYWlyIHNhaWQgaXQgd291bGQgYmUuIEJyYXNzIGZpdHRpbmdzIGdvbmUgZ3JlZW4gYXQgdGhlIGNvcm5lcnMsIGFuZCB5b3VyIGdyYW5kbW90aGVyJ3MgbmFtZSBzY3JhdGNoZWQgaW50byB0aGUgbGlkIGluIGEgaGFuZCB5b3UgcmVjb2duaXNlLiBOb3QgaGVyIGhhbmR3cml0aW5nIOKAlCBzb21ldGhpbmcgb2xkZXIuIFNvbWVvbmUgZWxzZSBuYW1lZCBoZXIgb25jZSwgYW5kIGhlcmUgdGhlIG5hbWUgaGFzIHN0YXllZC4KClRoZSBsYXRjaCBpcyBhIHByb3BlciBvbmUuIEl0IG5lZWRzIGEga2V5LCBvciBwYXRpZW5jZSwgb3IgYm90aC4KCk1haXIgZG93bnN0YWlycyBoYXMgYmVlbiBtYWtpbmcgdGVhIHNoZSB3b24ndCBkcmluaywgd2hpY2ggaXMgd2hhdCBzaGUgZG9lcyB3aGVuIHNoZSdzIHdhaXRpbmcu',
            'choices' => [
                ['text' => 'VHJ5IHRoZSBsYXRjaCB5b3Vyc2VsZiBmaXJzdA==', 'next' => '2_force'],
                ['text' => 'R28gZG93biBhbmQgYXNrIE1haXI=', 'next' => '2_neighbor'],
            ],
        ],
        '2_force' => [
            'prose'   => 'VGhlcmUgaXMgYSBjaGlzZWwgaW4gdGhlIHNoZWQsIHdoaWNoIHlvdSBrbm93IGJlY2F1c2UgeW91IHNwZW50IHRocmVlIHN1bW1lcnMgaGVscGluZyB5b3VyIGdyYW5kZmF0aGVyIHN0YWNrIHdvb2QgYWdhaW5zdCB0aGF0IHNhbWUgd2FsbC4gVGhlIGNoaXNlbCBpcyB3aGVyZSBpdCBhbHdheXMgd2FzLgoKSXQgdGFrZXMgeW91IHR3ZW50eSBtaW51dGVzIGFuZCBzb21lIGRhbWFnZSB0byB0aGUgYnJhc3MuIFRoZSBsaWQgaXMgc2xpZ2h0bHkgYmVudCBhdCB0aGUgZnJvbnQgbGVmdCBjb3JuZXIsIHdoaWNoIGJvdGhlcnMgeW91IG1vcmUgdGhhbiBpdCBzaG91bGQuIEJ1dCB0aGUgY2hlc3Qgb3BlbnMsIGFuZCB0aGUgc21lbGwgdGhhdCBjb21lcyBvdXQgaXMgY2VkYXIgYW5kIHBhcGVyIGFuZCBzb21ldGhpbmcgdGhhdCB3YXMgb25jZSBmbG93ZXJzLgoKWW91IHN0YW5kIHRoZXJlIHdpdGggdGhlIGNoaXNlbCBzdGlsbCBpbiB5b3VyIGhhbmQu',
            'choices' => [
                ['text' => 'U2V0IGRvd24gdGhlIGNoaXNlbA==', 'next' => '3_opened'],
            ],
        ],
        '2_neighbor' => [
            'prose'   => 'TWFpciBoYXMgdGhlIGtleS4gT2YgY291cnNlIHNoZSBoYXMgdGhlIGtleS4KClNoZSBwcm9kdWNlcyBpdCBmcm9tIGhlciBhcHJvbiBwb2NrZXQgd2l0aG91dCBiZWluZyBhc2tlZCwgd2hpY2ggbWVhbnMgc2hlIGhhcyBiZWVuIGNhcnJ5aW5nIGl0LiBTaGUgc2F5czogIlNoZSB0b2xkIG1lIHNvbWVvbmUgd291bGQgY29tZS4iIFNoZSBoYW5kcyBpdCBvdmVyLCBzaXRzIGRvd24gYXQgdGhlIGtpdGNoZW4gdGFibGUsIGFuZCBwaWNrcyB1cCBoZXIgdW50b3VjaGVkIHRlYSB3aXRoIGJvdGggaGFuZHMgYXMgdGhvdWdoIHNoZSBpcyB2ZXJ5IGNvbGQuCgpUaGUga2V5IGlzIGlyb24gYW5kIHZlcnkgb2xkLiBJdCBmaXRzIHRoZSBsYXRjaCBvbiB0aGUgZmlyc3QgdHJ5Lg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUga2V5IHVwc3RhaXJz', 'next' => '3_opened'],
            ],
        ],
        '3_opened' => [
            'prose'   => 'VGhlIGNoZXN0IGhvbGRzIHRocmVlIHRoaW5nczogYSBsZXR0ZXIgc2VhbGVkIHdpdGggYnJvd24gd2F4LCBhIHNtYWxsIHNxdWFyZSBvZiBlbWJyb2lkZXJlZCBjbG90aCBmb2xkZWQgb3ZlciBvbmNlLCBhbmQgYSBwaWVjZSBvZiBwYXBlciB0aGF0IGlzIG5vdCBxdWl0ZSBhIG1hcC4KClRoZSBtYXAg4oCUIGlmIGl0IGlzIGEgbWFwIOKAlCBzaG93cyBjb2FzdGxpbmVzIGFuZCByb2FkcyBhbmQgYSBkb3plbiBzbWFsbCBtYXJrcyBpbiBibHVlIGluaywgZWFjaCBvbmUgY2lyY2xlZC4gU29tZSBvZiB0aGUgbWFya3MgaGF2ZSBuYW1lcyB3cml0dGVuIGJlc2lkZSB0aGVtIGluIHlvdXIgZ3JhbmRtb3RoZXIncyBoYW5kd3JpdGluZy4gT3RoZXJzIGp1c3QgaGF2ZSBhIHNpbmdsZSBpbml0aWFsLiBUaGUgcGFwZXIgaXMgb2xkIGJ1dCBub3QgZnJhZ2lsZS4gSXQgaGFzIGJlZW4gaGFuZGxlZCBvZnRlbi4KCllvdSBwaWNrIGl0IHVwIGFuZCBzZXQgaXQgZG93biBhZ2Fpbi4gVGhlbiB5b3UgbG9vayBhdCB0aGUgbGV0dGVyIGFuZCB0aGUgc3F1YXJlLCBzaXR0aW5nIHNpZGUgYnkgc2lkZSBpbiB0aGUgYm90dG9tIG9mIHRoZSBjaGVzdCwgYW5kIHlvdSB1bmRlcnN0YW5kIHRoYXQgeW91IGhhdmUgdG8gY2hvb3NlIHdoaWNoIG9uZSB0byBsb29rIGF0IGZpcnN0Lg==',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgbGV0dGVyIGZpcnN0', 'next' => '4_letter'],
                ['text' => 'SG9sZCB0aGUgc3F1YXJlIGFuZCBsb29r', 'next' => '4_square'],
            ],
        ],
        '4_letter' => [
            'prose'   => 'VGhlIHdheCBicmVha3MgY2xlYW5seS4gSW5zaWRlOiBmb3VyIHBhZ2VzIG9mIHlvdXIgZ3JhbmRtb3RoZXIncyBoYW5kd3JpdGluZywgd2hpY2ggaXMgc21hbGxlciBhbmQgZmFzdGVyIHRoYW4geW91IHJlbWVtYmVyZWQsIGFzIGlmIHNoZSBoYWQgYSBncmVhdCBkZWFsIHRvIHNheSBhbmQgYSBsaW1pdGVkIG51bWJlciBvZiBtb3JuaW5ncy4KClNoZSBiZWdpbnM6IFlvdSBmb3VuZCB0aGUgY2hlc3QuIEdvb2QuIERvbid0IGZlZWwgZ3VpbHR5IGFib3V0IHRoZSBsYXRjaCDigJQgTWFpciBoYXMgdGhlIGtleSBhbmQgc2hlIGtub3dzIHdoZXJlIHRoZSBjaGlzZWwgaXMsIHNvIHdoYXRldmVyIHlvdSBkaWQsIEkgcGxhbm5lZCBmb3IgaXQuCgpUaGVuIHNoZSBleHBsYWlucy4KClRoZSBzcXVhcmVzIGFyZSBzY2F0dGVyZWQuIFR3ZW50eS1mb3VyIG9mIHRoZW0uIEVhY2ggb25lIHdpdGggc29tZW9uZSB3aG8gbG92ZWQgaGVyLCBvciBzb21ld2hlcmUgc2hlIGxvdmVkLCBvciBib3RoLiBTaGUgc2NhdHRlcmVkIHRoZW0gb24gcHVycG9zZSwgc2hlIHdyaXRlcywgYmVjYXVzZSBzaGUgd2FudGVkIHNvbWVvbmUgdG8gZ28gYW5kIGZpbmQgdGhlbSwgYW5kIHNoZSBkaWQgbm90IHdhbnQgdGhhdCBwZXJzb24gdG8gYmUgaW4gYW55IGRvdWJ0IGFib3V0IHdoZXRoZXIgaXQgd2FzIHdvcnRoIGRvaW5nLgoKSXQgaXMgd29ydGggZG9pbmcsIHNoZSB3cml0ZXMuIEkgbWFkZSBzdXJlIG9mIGl0Lg==',
            'choices' => [
                ['text' => 'UHV0IHRoZSBsZXR0ZXIgYXdheSBhbmQgbG9vayBhdCB0aGUgbWFw', 'next' => '5_read'],
            ],
        ],
        '4_square' => [
            'prose'   => 'VGhlIGNsb3RoIGlzIGhlYXZ5IGZvciBpdHMgc2l6ZSDigJQgZ29vZCB3b29sLCB5b3UgdGhpbmssIHRoZSBraW5kIHRoYXQgaG9sZHMgaXRzIHNoYXBlIGZvciBkZWNhZGVzLiBXaGVuIHlvdSB1bmZvbGQgaXQsIHlvdSBzZWUgeW91ciBncmFuZG1vdGhlcidzIGNvdHRhZ2Ugc3RpdGNoZWQgaW4gbWluaWF0dXJlOiB0aGUgcmVkIGRvb3IsIHRoZSBjbGltYmluZyByb3NlcywgdGhlIGNoaW1uZXkgbGVhbmluZyBzbGlnaHRseSB3ZXN0IHRoZSB3YXkgaXQgaGFzIGFsd2F5cyBsZWFuZWQuCgpUaGVyZSBpcyBzbW9rZSBzdGl0Y2hlZCBpbiBncmV5IHRocmVhZCBhYm92ZSB0aGUgY2hpbW5leS4gU29tZW9uZSB0aG91Z2h0IHRvIHB1dCBpbiB0aGUgc21va2UuCgpZb3Ugc2l0IGRvd24gb24gdGhlIGZsb29yIG9mIHRoZSBhdHRpYyB3aXRoIHRoZSBzcXVhcmUgaW4geW91ciBoYW5kcy4gVGhlIGxpZ2h0IGNvbWVzIHRocm91Z2ggdGhlIG5vcnRoIHdpbmRvdyBhbmQgZmFsbHMgYWNyb3NzIGl0LiBZb3Ugc3RheSB0aGVyZSBmb3IgYSB3aGlsZSBiZWZvcmUgeW91IHJlYWNoIGZvciB0aGUgbGV0dGVyLg==',
            'choices' => [
                ['text' => 'UGljayB1cCB0aGUgbGV0dGVyIG5vdw==', 'next' => '5_read'],
            ],
        ],
        '5_read' => [
            'prose'   => 'VGhlIGxldHRlciB0YWtlcyB0aHJlZSByZWFkaW5ncy4KClRoZSBmaXJzdCB0aW1lIHlvdSBhcmUgbG9va2luZyBmb3Igd2hhdCBoYXBwZW5lZC4gVGhlIHNlY29uZCB0aW1lIHlvdSBhcmUgbG9va2luZyBmb3Igd2hhdCBzaGUgbWVhbnQuIFRoZSB0aGlyZCB0aW1lIHlvdSBwdXQgaXQgZG93biBhbmQgbG9vayBhdCB0aGUgcGFydGlhbCBtYXAsIGFuZCB0aGVuIGF0IHRoZSBzcXVhcmUgc3RpbGwgaW4geW91ciBoYW5kcywgYW5kIHNvbWV0aGluZyBzaGlmdHMgaW4gdGhlIHdheSB5b3UgYXJlIHNpdHRpbmcuCgpTaGUgc2NhdHRlcmVkIHRoZW0gZGVsaWJlcmF0ZWx5LiBBbGwgdHdlbnR5LWZvdXIuIFRvIHRoZSBwZW9wbGUgc2hlIGxvdmVkIGFuZCB0aGUgcGxhY2VzIHNoZSBsb3ZlZCBhbmQgdGhlIG92ZXJsYXBzIGJldHdlZW4gdGhlIHR3bywgd2hpY2ggc2hlIHdyaXRlcyBhcmUgbW9yZSBjb21tb24gdGhhbiB5b3UnZCB0aGluaywgb25jZSB5b3Ugc3RhcnQgbG9va2luZy4KClNoZSBleHBlY3RzIHlvdSB0byBnby4=',
            'choices' => [
                ['text' => 'VW5kZXJzdGFuZCB0aGF0IHlvdSdyZSBnb2luZw==', 'next' => '6_weight'],
            ],
        ],
        '6_weight' => [
            'prose'   => 'VGhlIGF0dGljIGlzIHF1aWV0LiBCZWxvdyB5b3UsIE1haXIgaGFzIHN0b3BwZWQgcHJldGVuZGluZyB0byBoYXZlIHRlYS4gWW91IGNhbiBoZWFyIGhlciBpbiB0aGUga2l0Y2hlbiwgbm90IG1vdmluZywganVzdCBiZWluZyB0aGVyZS4KClRoZSBzcXVhcmUgc2l0cyBvbiB0b3Agb2YgdGhlIGNoZXN0LiBUaGUgbGV0dGVyIGlzIGZvbGRlZCBiYWNrIGludG8gaXRzIGVudmVsb3BlLiBUaGUgcGFydGlhbCBtYXAgaXMgaW4geW91ciBwb2NrZXQsIGJlY2F1c2UgaXQgd2VudCB0aGVyZSB3aGlsZSB5b3Ugd2VyZSB0aGlua2luZyBhbmQgeW91ciBoYW5kcyBtYWRlIHRoZSBkZWNpc2lvbiBmaXJzdC4KClR3ZW50eS1mb3VyIHNxdWFyZXMuIEhhbGYgb2YgdGhlbSBpbiBwbGFjZXMgeW91IGNvdWxkbid0IGZpbmQgb24gYSBwcm9wZXIgbWFwLiBBIGdyYW5kbW90aGVyIHdobyBhcHBhcmVudGx5IHNwZW50IHNpeHR5IHllYXJzIHByZXBhcmluZyBhIHB1enpsZSBhbmQgdGhlbiBoYWQgdGhlIGdyYWNlIG5vdCB0byB0ZWxsIHlvdSB1bnRpbCBzaGUgd2FzIGdvbmUuCgpUaGUgbWFya2V0IHRvd24gaXMgdGhyZWUgaG91cnMgZnJvbSBoZXJlLiBUaGF0IHNlZW1zIGxpa2UgYSBwbGFjZSB0byBzdGFydC4=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIG1vcm5pbmcgbG9va3MgbGlrZQ==', 'next' => '7_morning'],
            ],
        ],
        '7_morning' => [
            'prose'   => 'WW91IHNsZWVwIGluIHlvdXIgZ3JhbmRtb3RoZXIncyBob3VzZSBvbmUgbW9yZSBuaWdodC4gSW4gdGhlIG1vcm5pbmcgdGhlIHZhbGxleSBpcyBmdWxsIG9mIGxvdyBjbG91ZCwgd2hpY2ggYnVybnMgb2ZmIGJ5IGVpZ2h0LiBZb3UgcGFjayBsaWdodCDigJQgdGhyZWUgZGF5cycgd29ydGgsIHdoaWNoIHNoZSBzYWlkIGluIHRoZSBsZXR0ZXIgd2FzIGFib3V0IHJpZ2h0IGZvciB0aGUgZmlyc3Qgc3RhZ2UsIHRob3VnaCB5b3Ugd2lsbCBmaW5kIHJlYXNvbnMgdG8gc3RheSBsb25nZXIgaW4gc29tZSBwbGFjZXMsIGFuZCB5b3Ugc2hvdWxkIGxldCB5b3Vyc2VsZi4KClRoZSByb2FkIHNwbGl0cyBhdCB0aGUgdmFsbGV5J3MgZWRnZS4gTGVmdCBmb2xsb3dzIHRoZSByaWRnZSBvdmVyIHRoZSBoaWxsIHBhc3MuIFJpZ2h0IGZvbGxvd3MgdGhlIHNob3JlLgoKVGhlIG1hcCBkb2Vzbid0IHNheSB3aGljaCB3YXkuIFRoaXMsIHlvdSB1bmRlcnN0YW5kLCBpcyBpbnRlbnRpb25hbC4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgaGlnaCBwYXNzIHJvYWQ=', 'next' => '8_mountain'],
                ['text' => 'Rm9sbG93IHRoZSBzaG9yZSByb2FkIHNvdXRo', 'next' => '8_coast'],
            ],
        ],
        '8_mountain' => [
            'prose'   => 'VGhlIHBhc3Mgcm9hZCBjbGltYnMgaGFyZCBmb3IgdGhlIGZpcnN0IGhvdXIgYW5kIHRoZW4gbGV2ZWxzIG91dCBvbnRvIHRoZSByaWRnZSwgd2hlcmUgdGhlIHdpbmQgY29tZXMgaW4gZnJvbSB0aGUgd2VzdCBhbmQgdGhlIHZpZXcgb3BlbnMgYmFjayBvdmVyIHRoZSB2YWxsZXkuIFlvdSBjYW4gc2VlIHRoZSBob3VzZSBmcm9tIGhlcmUg4oCUIGEgd2hpdGUgZG90IHdpdGggYSByZWQgZG9vciwgc21hbGxlciB0aGFuIHlvdSBleHBlY3RlZC4KCllvdSB0dXJuIG5vcnRoIGFuZCBrZWVwIHdhbGtpbmcuCgpOZWFyIHRoZSB0b3AsIHdoZXJlIHRoZSBwYXRoIGJlbmRzIGFyb3VuZCBhbiBvdXRjcm9wcGluZyBvZiBncmV5IHJvY2ssIGEgZ3JleSBwYXJyb3QgaXMgc2l0dGluZyBvbiBhIGxpY2hlbi1jb3ZlcmVkIHN0b25lLiBIZSBpcyBub3QgbG9va2luZyBhdCB5b3UuIEhlIGlzIGluIHRoZSBtaWRkbGUgb2Ygc2F5aW5nIHNvbWV0aGluZyBhYm91dCBTYXhpZnJhZ2Egb3Bwb3NpdGlmb2xpYSDigJQgdGhlIHB1cnBsZSBzYXhpZnJhZ2UsIGhlIHNheXMsIHJhcmUgdGhpcyBmYXIgc291dGgsIGFuZCBoZXJlIGl0IGlzIGdyb3dpbmcgaW4gdGhlIHNoYWRvdyBvZiB0aGlzIHZlcnkgcm9jaywgd2hpY2ggdGVsbHMgeW91IHNvbWV0aGluZyBpbXBvcnRhbnQgYWJvdXQgdGhlIGRyYWluYWdlIHBhdHRlcm5zIG9mIHRoaXMgcGFydGljdWxhciBoaWxsc2lkZSDigJQKCkhlIHBhdXNlcy4gVHVybnMgaGlzIGhlYWQuCgoiT2guIEhlbGxvLiBBcmUgeW91IGdvaW5nIHRvd2FyZCB0aGUgdG93bj8i',
            'choices' => [
                ['text' => 'QW5zd2VyIHRoZSBwYXJyb3Q=', 'next' => '9_tea'],
            ],
        ],
        '8_coast' => [
            'prose'   => 'VGhlIHNob3JlIHJvYWQgZHJvcHMgdG8gdGhlIHNlYSB3aXRoaW4gdGhlIGZpcnN0IG1pbGUgYW5kIHRoZW4gcnVucyBsZXZlbCBmb3IgdGhlIHJlc3Qg4oCUIGVhc3kgd2Fsa2luZywgc2FsdC1oZWF2eSBhaXIsIHRoZSBjbGlmZiBmYWNlIHRvIHlvdXIgbGVmdCBhbmQgdGhlIHdhdGVyIGZhciBiZWxvdyB0byB5b3VyIHJpZ2h0LgoKWW91IGhlYXIgaGltIGJlZm9yZSB5b3Ugc2VlIGhpbS4gQSB2b2ljZSBjYXJyeWluZyBmcm9tIHNvbWV3aGVyZSBhYm92ZSB0aGUgcGF0aCwgZGVzY3JpYmluZyB3aXRoIGNvbnNpZGVyYWJsZSBhdXRob3JpdHkgdGhlIHJvb3Qgc3lzdGVtcyBvZiBzZWEtcGluayBjb2xvbmllcyBvbiBleHBvc2VkIGNoYWxrLCBhbmQgc3BlY2lmaWNhbGx5IHRoZSBhZGFwdGF0aW9uIG9mIEFybWVyaWEgbWFyaXRpbWEgdG8gdGhpcyBwYXJ0aWN1bGFyIGNsaWZmIGFuZ2xlLCB3aGljaCBpcyBzdGVlcGVyIHRoYW4gdGhlIHRleHRib29rIG9wdGltdW0gYW5kIHlldCBoZXJlIGl0IGlzIHRocml2aW5nLCBzbyBwZXJoYXBzIHRoZSB0ZXh0Ym9vayBuZWVkcyByZXZpc2luZyDigJQKCkhlIGlzIG9uIHRoZSBjbGlmZnRvcCwgYWJvdXQgdGhyZWUgbWV0cmVzIGFib3ZlIHlvdSwgcGVlcmluZyBkb3duIGF0IGEgcGxhbnQgd2l0aCBvbmUgZm9vdCB3ZWRnZWQgaW4gYSBjcmFjayBmb3Igc3RhYmlsaXR5LgoKIk9oLCBnb29kLCIgaGUgc2F5cywgYmVmb3JlIHlvdSBoYXZlIHNhaWQgYW55dGhpbmcgYXQgYWxsLiAiSSB3YXMgaG9waW5nIHNvbWVvbmUgd291bGQgY29tZSBhbG9uZy4i',
            'choices' => [
                ['text' => 'TG9vayB1cCBhdCB0aGUgY2xpZmZ0b3A=', 'next' => '9_tea'],
            ],
        ],
        '9_tea' => [
            'prose'   => 'SGlzIG5hbWUgaXMgRnJlZC4gSGUgaXMgYSBncmV5IHBhcnJvdCwgYW5kIGhlIGhhcyBiZWVuIHRyYXZlbGxpbmcgZm9yIHNpeCBtb250aHMgc3R1ZHlpbmcgY29hc3RhbCBhbmQgbW91bnRhaW4gZmxvcmEgYWxvbmcgdGhpcyBwYXJ0aWN1bGFyIHN0cmV0Y2ggb2YgV2FsZXMsIHdoaWNoIGhlIGRlc2NyaWJlcyBhcyB1bmRlcmFwcHJlY2lhdGVkLiBIZSBoYXMgYSBzbWFsbCBwYW5uaWVyIG9uIGhpcyBiYWNrLgoKRnJvbSB0aGUgcGFubmllciBoZSBwcm9kdWNlcyBhIGZsYXNrIGFuZCB0d28gY3VwcyB0aGF0IG5lc3QgaW50byBlYWNoIG90aGVyLCBhbmQgd2l0aG91dCBiZWluZyBhc2tlZCBoZSBwb3VycyBvdXQgc29tZXRoaW5nIHRoYXQgc3RlYW1zIGFuZCBzbWVsbHMgb2YgZ2luZ2VyLgoKIlRocmVlIG1pbnV0ZXMsIiBoZSBzYXlzLCBoYW5kaW5nIHlvdSBhIGN1cC4gIk5vdCB0d28uIFBlb3BsZSBhbHdheXMgZG8gdHdvLiBUd28gaXMgbm90IGVub3VnaC4gVGhlIGZsYXZvdXIgZG9lc24ndCBmdWxseSBkZXZlbG9wIGF0IHR3by4iIEhlIHNheXMgdGhpcyB3aXRoIHRoZSBjb252aWN0aW9uIG9mIHNvbWVvbmUgd2hvIGhhcyBiZWVuIHJpZ2h0IGFib3V0IHRoaXMgZm9yIHllYXJzIGFuZCBpcyBzdGlsbCBub3QgZW50aXJlbHkgb3ZlciBob3cgb2Z0ZW4gcGVvcGxlIGdldCBpdCB3cm9uZy4KClRoZSB0ZWEgaXMgZ29vZC4gSXQgaXMsIGdlbnVpbmVseSwgZXhhY3RseSB3aGF0IHlvdSBuZWVkZWQu',
            'choices' => [
                ['text' => 'QXNrIGlmIGhlIGtuZXcgaGVy', 'next' => '10_ask'],
                ['text' => 'TGV0IGhpbSBrZWVwIHRhbGtpbmcgYWJvdXQgdGhlIHBsYW50cw==', 'next' => '10_listen'],
            ],
        ],
        '10_ask' => [
            'prose'   => 'IkRpZCB5b3Uga25vdyBoZXI/IiB5b3Ugc2F5LiAiVGhlIHdvbWFuIHdobyBsaXZlZCBiYWNrIHRoZXJlLiBNeSBncmFuZG1vdGhlci4iCgpGcmVkIGlzIHF1aWV0IGZvciBhIG1vbWVudCDigJQgbm90IGhlc2l0YXRpbmcsIGp1c3QgdGhpbmtpbmcuCgoiSSBkaWRuJ3Qga25vdyBoZXIsIiBoZSBzYXlzLiAiQnV0IEkga25vdyBoZXIgd29yay4gVGhyZWUgcHJlc3NlZCBzcGVjaW1lbnMgaW4gdGhlIHVuaXZlcnNpdHkgY29sbGVjdGlvbiwgbGFiZWxsZWQgaW4gaGVyIGhhbmQuIEEgbm90ZSBpbiB0aGUgWW9ya3NoaXJlIEJvdGFuaWNhbCBTb2NpZXR5J3MgcmVjb3JkcyBmcm9tIDE5NTEgYWJvdXQgYW4gdW51c3VhbCBjdWx0aXZhciBvZiBtZWFkb3cgZ3Jhc3MsIHdoaWNoIHR1cm5lZCBvdXQgdG8gYmUgY29ycmVjdC4gQW5kIGEgcGFwZXIuIiBIZSBwYXVzZXMuICJBIHZlcnkgZ29vZCBwYXBlci4iCgpIZSByZWZpbGxzIGhpcyBjdXAuIFNldHMgdGhlIGZsYXNrIGJhY2sgaW4gdGhlIHBhbm5pZXIgd2l0aCBjYXJlLgoKIlNoZSB3b3VsZCBoYXZlIGJlZW4gc29tZW9uZSB3b3J0aCBrbm93aW5nLCIgaGUgc2F5cy4gIkknbSBzb3JyeSBJIGRpZG4ndC4i',
            'choices' => [
                ['text' => 'V2FsayBvbiwgdGhpbmtpbmcgYWJvdXQgdGhlIHBhcGVy', 'next' => '11_dusk'],
            ],
        ],
        '10_listen' => [
            'prose'   => 'RnJlZCB0YWxrcyBmb3IgbW9zdCBvZiB0aGUgcmVtYWluaW5nIHdhbGsuIEhlIGNvdmVycywgYW1vbmcgb3RoZXIgc3ViamVjdHM6IHRoZSBteWNvcnJoaXphbCBuZXR3b3JrcyBjb25uZWN0aW5nIHRoZSBoaWxsc2lkZSBmZXJucywgYSBncmFzcyBzcGVjaWVzIGhlIGhhcyBiZWVuIHRyeWluZyB0byBmaW5kIGZvciB0aHJlZSB5ZWFycyB0aGF0IGhlIG5vdyBzdXNwZWN0cyBncm93cyBhbG9uZyB0aGlzIGV4YWN0IHN0cmV0Y2ggb2YgY29hc3QsIHRoZSBwYXJ0aWN1bGFyIGJsdWUgb2Ygc2VhIGNhbXBpb24gd2hlbiB0aGUgbGlnaHQgaGl0cyBpdCBmcm9tIHRoZSBlYXN0LCBhbmQgdGhlIHF1ZXN0aW9uIG9mIHdoZXRoZXIgYm90YW5pY2FsIHRheG9ub215IGFzIGEgZGlzY2lwbGluZSBoYXMgdG9vIG1hbnkgY29tbWl0dGVlcy4KCllvdSBkbyBub3QgZm9sbG93IGFsbCBvZiBpdC4KCkJ1dCBzb21ld2hlcmUgaW4gdGhlIHRoaXJkIG1pbGUsIGhlIG1lbnRpb25zIHlvdXIgZ3JhbmRtb3RoZXIncyBuYW1lLiBOb3QgYXMgYSBxdWVzdGlvbiDigJQgYXMgc29tZW9uZSBoZSBrbm93cywgYWNhZGVtaWNhbGx5IGF0IGxlYXN0LCBmcm9tIGhlciBwYXBlciBpbiBhIFlvcmtzaGlyZSBqb3VybmFsIGluIDE5NTEuCgoiU2hlIGdvdCBzb21ldGhpbmcgcmlnaHQgdGhhdCBub2JvZHkgZWxzZSBoYWQgZmlndXJlZCBvdXQgeWV0LCIgaGUgc2F5cy4=',
            'choices' => [
                ['text' => 'V2FsayBvbiBhcyB0aGUgdmFsbGV5IGZhbGxzIGF3YXk=', 'next' => '11_dusk'],
            ],
        ],
        '11_dusk' => [
            'prose'   => 'VGhlIHZhbGxleSdzIGVkZ2UgYXJyaXZlcyBhdCBkdXNrLCBleGFjdGx5IHdoZW4gaXQgc2hvdWxkLgoKQmVsb3c6IHRoZSBtYXJrZXQgdG93biwgaXRzIGxpZ2h0cyBjb21pbmcgb24gb25lIGJ5IG9uZSBhZ2FpbnN0IHRoZSBncmV5IHNreS4gVGhlIHJvYWQgd2luZHMgZG93biBpbiBsb25nIHN3aXRjaGJhY2tzLiBZb3UgY2FuIHNlZSB0aGUgY2h1cmNoIHRvd2VyIGFuZCB3aGF0IG1pZ2h0IGJlIGEgY292ZXJlZCBtYXJrZXQgYW5kLCBvbiB0aGUgZmFyIHNpZGUsIHRoZSBiZWdpbm5pbmcgb2YgYW5vdGhlciByb2FkIGhlYWRpbmcgYXdheSBmcm9tIGhlcmUgdG93YXJkIHNvbWV3aGVyZSBlbHNlLgoKRnJlZCBoYXMgYmVlbiB3YWxraW5nIHdpdGggeW91IGZvciB0d28gaG91cnMsIHdoaWNoIG5laXRoZXIgb2YgeW91IGNvbW1lbnRlZCBvbi4KCkhlIHJlYWNoZXMgaW50byB0aGUgcGFubmllciBhbmQgcHVsbHMgb3V0IGEgc21hbGwgcGFja2V0IHdyYXBwZWQgaW4gcGFwZXIuICJUaGUgcmVzdCBvZiB0aGUgZ2luZ2VyIHJvb3QsIiBoZSBzYXlzLiAiRnJvbSB0aGUgZmxhc2suIFlvdSdsbCB3YW50IGl0IGZvciB0aGUgcm9hZC4gVGhyZWUgbWludXRlcywgbm90IHR3byDigJQgSSdtIHN1cmUgSSBtZW50aW9uZWQuIiBIZSBoYXMuICJJJ20gaGVhZGluZyB0b3dhcmQgdGhlIHRvd24gbXlzZWxmLiBUaGUgbW9ybmluZywgSSB0aGluay4gSSBoZWFyZCB0aGVyZSBpcyBhIG1hcmtldC4i',
            'choices' => [
                ['text' => 'VHVjayBpdCBhd2F5IGFuZCBsb29rIGF0IHRoZSB0b3du', 'next' => '12_end_town'],
                ['text' => 'VHVjayBpdCBhd2F5IGFuZCBsb29rIGJhY2sgdGhlIHdheSB5b3UgY2FtZQ==', 'next' => '12_end_valley'],
            ],
        ],
        '12_end_town' => [
            'prose'   => 'VGhlIGdpbmdlciByb290IGdvZXMgaW50byB5b3VyIHBvY2tldC4gWW91ciBoYW5kIGZpbmRzIHRoZSBtYXAgdGhlcmUsIHRoZSBzYW1lIHdheSBpdCBoYXMgYWxsIGFmdGVybm9vbi4KClRoZSB0b3duIGJlbG93IGlzIG9yZGluYXJ5IGFuZCBzcGVjaWZpYzogYSBiYWtlcnkgd2l0aCBpdHMgc2h1dHRlcnMganVzdCBnb2luZyB1cCBmb3IgdGhlIGV2ZW5pbmcgc2hpZnQsIGEgbWFuIHdhbGtpbmcgYSBkb2cgYWxvbmcgdGhlIHJpdmVyIHBhdGgsIGxpZ2h0IGluIHRoZSB1cHBlciB3aW5kb3dzIG9mIHRoZSBpbm4uIFNvbWV3aGVyZSBpbiB0aGVyZSBpcyB3aGF0ZXZlciBjb21lcyBuZXh0LgoKWW91IHRoaW5rIGFib3V0IHlvdXIgZ3JhbmRtb3RoZXIgYXQgc2V2ZW50ZWVuLCBzdGFuZGluZyBzb21ld2hlcmUgbG9va2luZyBhdCBhIHJvYWQuIFRoZSBsZXR0ZXIgc2FpZCBzaGUgd2FzIG5vdCBhZnJhaWQuIE9yIHJhdGhlcjogdGhlIGxldHRlciBzYWlkIHNoZSB3YXMgYWZyYWlkIGFuZCB3ZW50IGFueXdheSwgd2hpY2ggc2hlIGNvbnNpZGVyZWQgdGhlIGJldHRlciB2ZXJzaW9uIG9mIHRoZSBzdG9yeS4KCkZyZWQgc2V0dGxlcyBoaXMgcGFubmllciBhbmQgc2F5cyBub3RoaW5nIGZvciBhIG1vbWVudC4gVGhlbjogIkdvb2Qgd2VhdGhlciB0b21vcnJvdy4gVGhlIGNsb3VkIHBhdHRlcm4gc2F5cyBzby4iCgpZb3UgYmVsaWV2ZSBoaW0sIGZvciBubyBwYXJ0aWN1bGFyIHJlYXNvbi4KCllvdSBnbyBkb3duLg==',
            'ending'  => true,
        ],
        '12_end_valley' => [
            'prose'   => 'VGhlIGdpbmdlciByb290IGdvZXMgaW50byB5b3VyIHBvY2tldC4gWW91IHR1cm4uCgpUaGUgdmFsbGV5IGlzIGluIHNoYWRvdyBub3csIHRoZSBoaWxscyBjYXRjaGluZyB0aGUgbGFzdCBvZiB0aGUgbGlnaHQgYXQgdGhlaXIgcmlkZ2VzLiBUaGUgaG91c2UgaXMgbm90IHZpc2libGUgZnJvbSBoZXJlIOKAlCB0aGUgZm9sZCBvZiB0aGUgbGFuZCB0YWtlcyBpdC4gQnV0IHlvdSBrbm93IGV4YWN0bHkgd2hlcmUgaXQgc2l0czogdGhlIHNsaWdodCBsZWFuIG9mIHRoZSBjaGltbmV5LCB0aGUgcmVkIGRvb3IsIHRoZSByb3NlcyB0aGF0IGNvbWUgYmFjayBldmVyeSB5ZWFyIHdpdGhvdXQgYmVpbmcgYXNrZWQuCgpUd2VudHktZm91ciBzcXVhcmVzLiBZb3VyIGdyYW5kbW90aGVyIHdhbGtpbmcgb3V0d2FyZCBmcm9tIHRoYXQgaG91c2UgZm9yIHNpeHR5IHllYXJzIGFuZCBsZWF2aW5nIHBpZWNlcyBvZiBoZXJzZWxmIGluIHRoZSB3b3JsZCBmb3Igc29tZW9uZSB0byBmaW5kLgoKIlRoZSBsaWdodCB3aWxsIGdvIGluIGFib3V0IHRlbiBtaW51dGVzLCIgRnJlZCBzYXlzLCBiZXNpZGUgeW91LiAiVGhlbiBpdCB3aWxsIGJlIGNvbGQuIEp1c3Qgbm90aW5nIGl0LiIKCllvdSBsb29rIGEgbW9tZW50IGxvbmdlci4gVGhlIGhpbGxzIGdvIGRhcmsgZnJvbSB0aGUgYm90dG9tIHVwLgoKVGhlbiB5b3UgdHVybiBiYWNrLCB0YWtlIHRoZSByb2FkLCBhbmQgZ28gZG93biB0b3dhcmQgdGhlIGxpZ2h0cy4=',
            'ending'  => true,
        ],
    ],
];
