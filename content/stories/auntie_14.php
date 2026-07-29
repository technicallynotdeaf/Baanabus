<?php
return [
    'id'    => 14,
    'title' => 'Older Information',
    'color' => '#6A9ABA',

    'pages' => [
        '1_start' => [
            'prose'  => 'S2lyaXRpbWF0aSBkb2Vzbid0IGxvb2sgbGlrZSBhbiBpc2xhbmQgc28gbXVjaCBhcyBhIHZhc3QsIGZsYXQgc3VnZ2VzdGlvbiBvZiBvbmUg4oCUIHRoZSBsYXJnZXN0IGNvcmFsIGF0b2xsIG9uIEVhcnRoIGJ5IGxhbmQgYXJlYSwgbG93IHNjcnViIGFuZCBzYWx0IGZsYXQgc3RyZXRjaGluZyBpbiBldmVyeSBkaXJlY3Rpb24gdW5kZXIgYSBza3kgc28gZW5vcm1vdXMgaXQgbWFrZXMgdGhlIGhvcml6b24gZmVlbCBsaWtlIGFuIGFmdGVydGhvdWdodC4gV2luZCBtb3ZlcyBhY3Jvc3MgaXQgY29uc3RhbnRseSwgdW5icm9rZW4gYnkgYW55dGhpbmcgdGFsbCBlbm91Z2ggdG8gaW50ZXJydXB0IGl0LgoKU29sYW5nZSBzcXVpbnRzIGF0IHRoZSBjaGFydCwgdGhlbiBhdCB0aGUgc2t5LCBjbGVhcmx5IHJlY2FsaWJyYXRpbmcgaGVyIHNlbnNlIG9mIHNjYWxlLiBUd28gd2F5cyB0b3dhcmQgdGhlIHNldHRsZW1lbnQgcHJlc2VudCB0aGVtc2VsdmVzOiBhbG9uZyB0aGUgbGFnb29uJ3MgaW5uZXIgc2hhbGxvd3MsIGNhbG1lciBidXQgbG9uZ2VyLCBvciBzdHJhaWdodCB1cCB0aGUgb2NlYW4tZmFjaW5nIGJlYWNoLCBzaG9ydGVyIGJ1dCBleHBvc2VkIHRvIHRoZSBmdWxsIHdlaWdodCBvZiB0aGUgd2luZC4=',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBsYWdvb24gc2hhbGxvd3M=', 'next' => '2_lagoon'],
                ['text' => 'VGFrZSB0aGUgZXhwb3NlZCBvY2VhbiBiZWFjaA==', 'next' => '2_ocean'],
            ],
        ],
        '2_lagoon' => [
            'prose'  => 'VGhlIGxhZ29vbiBzaWRlIGlzIGNhbG1lciwgbWlycm9yLWZsYXQgaW4gcGF0Y2hlcyBiZXR3ZWVuIHRoZSB3aW5kJ3MgZ3VzdHMsIHdhZGluZyBiaXJkcyB3b3JraW5nIHRoZSBzaGFsbG93cyB3aXRoIHRoZSB1bmh1cnJpZWQgY29uZmlkZW5jZSBvZiBjcmVhdHVyZXMgd2hvIG93biB0aGUgcGxhY2UuIEl0J3MgYSBsb25nZXIgd2FsaywgYnV0IGFuIGVhc2llciBvbmUsIHNhbHQgY3J1c3RpbmcgeW91ciBza2luIHNsb3dseSByYXRoZXIgdGhhbiBhbGwgYXQgb25jZS4KCkEgZmlzaGVybWFuIHBvbGluZyBhIG5hcnJvdyBib2F0IHRocm91Z2ggdGhlIHNoYWxsb3dzIHBvaW50cyB5b3Ugb253YXJkIHdpdGhvdXQgbXVjaCBuZWVkIGZvciBleHBsYW5hdGlvbi4gJ1RhYmVyYW5uYW5nLCcgaGUgc2F5cy4gJ0Rvd24gdGhlIG9jZWFuIHNpZGUuIFlvdSdsbCBoZWFyIHRoZSBiaXJkcyBiZWZvcmUgeW91IHNlZSBoaW0g4oCUIGhlIGtlZXBzIGNvbXBhbnkgd2l0aCB0aGVtIG1vcmUgdGhhbiB3aXRoIHVzLCBtb3N0IGRheXMuJw==',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIG9jZWFuIHNpZGU=', 'next' => '3_shared'],
            ],
        ],
        '2_ocean' => [
            'prose'  => 'VGhlIG9jZWFuLWZhY2luZyBiZWFjaCBoaXRzIHlvdSB3aXRoIHRoZSB3aW5kJ3MgZnVsbCB3ZWlnaHQgaW1tZWRpYXRlbHksIHNhbHQtbGFkZW4gYW5kIGNvbnN0YW50LCB3YXZlcyB3b3JraW5nIHRoZSByZWVmIGludG8gYSBsb25nIHVuYnJva2VuIHJvYXIgd2l0aCBub3RoaW5nIHRvIHNvZnRlbiBpdCBmb3IgbWlsZXMgaW4gZWl0aGVyIGRpcmVjdGlvbi4gRnJpZ2F0ZWJpcmRzIHdvcmsgdGhlIGFpciBvdmVyaGVhZCBpbiBsb25nLCB1bmh1cnJpZWQgYXJjcywgYmxhY2sgc2hhcGVzIGN1dCBzaGFycCBhZ2FpbnN0IGFsbCB0aGF0IHNreS4KCkEgd29tYW4gZ2F0aGVyaW5nIHNvbWV0aGluZyBmcm9tIHRoZSB0aWRlbGluZSBnbGFuY2VzIHVwLCB1bnN1cnByaXNlZCwgYW5kIHNpbXBseSBub2RzIGZ1cnRoZXIgZG93biB0aGUgYmVhY2guICdUYWJlcmFubmFuZydzIHN0cmV0Y2guIEZvbGxvdyB0aGUgYmlyZHMuIFRoZXkga25vdyB3aGVyZSBoZSBpcyBiZXR0ZXIgdGhhbiBtb3N0IHBlb3BsZSBkby4n',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBiaXJkcyBkb3duIHRoZSBiZWFjaA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGFiZXJhbm5hbmcgdHVybnMgb3V0IHRvIGJlIGV4YWN0bHkgd2hlcmUgdGhlIGJpcmRzIHN1Z2dlc3RlZCDigJQgYSBzcGFyZSwgd2VhdGhlcmVkIG1hbiBzaXR0aW5nIGNyb3NzLWxlZ2dlZCBpbiB0aGUgbGVlIG9mIGEgbG93IGR1bmUsIHdhdGNoaW5nIHRoZSBmcmlnYXRlYmlyZHMgd29yayB0aGUgc2t5IHdpdGggdGhlIHNwZWNpZmljIGF0dGVudGlvbiBvZiBzb21lb25lIHJlYWRpbmcgYSBsYW5ndWFnZSBtb3N0IHBlb3BsZSBuZXZlciBsZWFybi4gSGUga25vd3MgQXVudGllJ3MgbmFtZSBiZWZvcmUgeW91J3JlIGhhbGZ3YXkgdGhyb3VnaCBleHBsYWluaW5nIHlvdXJzZWx2ZXMuCgonU2hlIGxlYXJuZWQgdG8gcmVhZCBhIGxpdHRsZSBza3ksIHdoaWxlIHNoZSB3YXMgaGVyZSwnIGhlIHNheXMuICdOb3QgbXVjaC4gRW5vdWdoIHRvIGJlIHVzZWZ1bCwgb25jZSwgb24gYSBiYWQgY3Jvc3NpbmcuJyBIZSBzdHVkaWVzIHlvdSBmb3IgYSBtb21lbnQuICdZb3UnbGwgd2FudCB0aGUgc2FtZSB0aGluZy4gRXZlcnlvbmUgd2hvIGNvbWVzIHRoaXMgZmFyIGV2ZW50dWFsbHkgZG9lcy4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhpbSB0byB0ZWFjaCB5b3U=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUgYXJlIHR3byB3YXlzIGluLCBoZSBzYXlzOiBzaXQgd2l0aCBoaW0gdGhyb3VnaCB0aGUgbmlnaHQgYW5kIGxlYXJuIHRvIHJlYWQgdGhlIHN0YXIgcGF0aHMgdGhlIG9sZCB3YXksIHBhdGllbnQgYW5kIHNsb3csIG9yIHNwZW5kIHRoZSBkYXkgd2l0aCBoaW0gcmVhZGluZyB0aGUgZnJpZ2F0ZWJpcmRzIHRoZW1zZWx2ZXMg4oCUIGhvdyBmYXIgb3V0IHRoZXkgcmFuZ2UsIHdoaWNoIHdheSB0aGV5IHR1cm4gZm9yIGhvbWUsIHdoYXQgdGhlaXIgZmxpZ2h0IHRlbGxzIHlvdSBhYm91dCBsYW5kIGFuZCB3ZWF0aGVyIGxvbmcgYmVmb3JlIGVpdGhlciBpcyB2aXNpYmxlLiAnU3RhcnMgZm9yIHRoZSBvcGVuIGNyb3NzaW5nLiBCaXJkcyBmb3Iga25vd2luZyB5b3UncmUgY2xvc2UuIFlvdSdsbCB3YW50IGJvdGgsIGV2ZW50dWFsbHkuIFRvZGF5LCBwaWNrIG9uZS4n',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIHN0YXIgcGF0aHMgdG9uaWdodA==', 'next' => '5_stars'],
                ['text' => 'UmVhZCB0aGUgZnJpZ2F0ZWJpcmRzIHRvZGF5', 'next' => '5_birds'],
            ],
        ],
        '5_stars' => [
            'prose'  => 'WW91IHNpdCB3aXRoIGhpbSB3ZWxsIHBhc3QgZGFyaywgdGhlIHNreSBvdmVyIEtpcml0aW1hdGkgdW5wb2xsdXRlZCBieSBhbnl0aGluZyBidXQgc3RhcmxpZ2h0LCBhbmQgaGUgd2Fsa3MgeW91IHRocm91Z2ggc3RhciBwYXRocyB0aGUgd2F5IHlvdSdkIHdhbGsgYSB3ZWxsLWtub3duIHJvYWQg4oCUIHRoaXMgb25lIHJpc2luZyBoZXJlIG1lYW5zIHRoYXQgb25lIHNldHRpbmcgdGhlcmUsIHRoZSB3aG9sZSBza3kgYSBtZW1vcmlzZWQgY2hhaW4gcmF0aGVyIHRoYW4gYSBzY2F0dGVyIG9mIHBvaW50cy4gWW91IGdldCBtYXliZSBhIHRlbnRoIG9mIGl0LiBIZSBzZWVtcyBzYXRpc2ZpZWQgd2l0aCBhIHRlbnRoLgoKJ05vYm9keSBsZWFybnMgaXQgaW4gb25lIG5pZ2h0LCcgaGUgc2F5cy4gJ1lvdSd2ZSBsZWFybmVkIGVub3VnaCB0byBrbm93IHdoYXQgeW91IGRvbid0IGtub3cgeWV0LiBUaGF0J3MgdGhlIGFjdHVhbCBmaXJzdCBzdGVwLCBhbmQgbW9zdCBwZW9wbGUgbmV2ZXIgZXZlbiBnZXQgdGhhdCBmYXIuJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgZ2l2ZXMgeW91', 'next' => '6_shared'],
            ],
        ],
        '5_birds' => [
            'prose'  => 'WW91IHNwZW5kIHRoZSBkYXkgd2F0Y2hpbmcgZnJpZ2F0ZWJpcmRzIHdpdGggaGltLCBsZWFybmluZyB0byByZWFkIHJhbmdlIGFuZCBkaXJlY3Rpb24gaW4gdGhlIGFuZ2xlIG9mIGEgd2luZ2JlYXQsIHRoZSBzcGVjaWZpYyB1bmh1cnJpZWQgcGF0aWVuY2Ugb2YgYSBiaXJkIHRoYXQgbmV2ZXIgbGFuZHMgb24gd2F0ZXIgYW5kIHRoZXJlZm9yZSBuZXZlciB3YXN0ZXMgYSBzaW5nbGUgbW90aW9uIGdldHRpbmcgaG9tZS4gSGUgcG9pbnRzIG91dCBvbmUsIGJhbmtpbmcgaGFyZCB0b3dhcmQgdGhlIGludGVyaW9yLCBhIGZ1bGwgdHdlbnR5IG1pbnV0ZXMgYmVmb3JlIHlvdSdkIGhhdmUgbm90aWNlZCBhbnl0aGluZyBhdCBhbGwuCgonVGhhdCBvbmUncyByZWFkIHdlYXRoZXIgeW91IGhhdmVuJ3QgZmVsdCB5ZXQsJyBoZSBzYXlzLiAnQmVsaWV2ZSB0aGUgYmlyZCBiZWZvcmUgeW91IGJlbGlldmUgeW91ciBvd24gc2tpbiwgb3V0IGhlcmUuIEl0J3Mgb2xkZXIgaW5mb3JtYXRpb24uJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgZ2l2ZXMgeW91', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIGhhbGYgb2YgdGhlIGxlc3NvbiB5b3UgdG9vaywgVGFiZXJhbm5hbmcgcHJvZHVjZXMsIGZyb20gYSBiYXR0ZXJlZCB0aW4gYm94LCBhIGhhbmQtZHJhd24gc3Rhci1jb21wYXNzIGNhcmQg4oCUIGNhcmVmdWwgaW5rIGxpbmVzIG9uIHRvdWdoIHBhcGVyLCB3b3JuIHNvZnQgYXQgdGhlIGZvbGRzIGZyb20geWVhcnMgb2YgYWN0dWFsIHVzZSDigJQgYW5kIGEgc2luZ2xlIHByZXNlcnZlZCBmcmlnYXRlYmlyZCBmZWF0aGVyLCBmb3VuZCByYXRoZXIgdGhhbiB0YWtlbiwgdHVja2VkIGluIGJlc2lkZSBpdC4KCidDYXJkJ3MgZm9yIHRoZSBjcm9zc2luZywnIGhlIHNheXMuICdGZWF0aGVyJ3MgZm9yIHJlbWVtYmVyaW5nIHRoYXQgdGhlIHNreSB3YXMgbmV2ZXIgdGhlIG9ubHkgdGhpbmcgd29ydGggcmVhZGluZyBvdXQgaGVyZS4gQmV0d2VlbiB0aGUgdHdvLCB5b3UnbGwga25vdyB3aGVuIHlvdSdyZSBjbG9zZSB0byBzb21ld2hlcmUsIGV2ZW4gaW4gd2VhdGhlciB0aGF0IGhpZGVzIGV2ZXJ5dGhpbmcgZWxzZS4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayBhbG9uZyB3aGljaGV2ZXIgYmVhY2ggeW91IGRpZG4ndCB0YWtlIG9uIHRoZSB3YXkgaW4sIHdpbmQgc3RpbGwgY29uc3RhbnQsIHNreSBzdGlsbCBlbm9ybW91cywgZnJpZ2F0ZWJpcmRzIHN0aWxsIHdvcmtpbmcgdGhlaXIgbG9uZyBwYXRpZW50IGFyY3Mgb3ZlcmhlYWQgYXMgdGhvdWdoIG5vdGhpbmcgYWJvdXQgdGhlIGRheSBoYWQgY2hhbmdlZCBhdCBhbGwgZm9yIHRoZW0sIHdoaWNoIGl0IGhhc24ndC4KClRoZSBCYXJvbiBzdHVkaWVzIHRoZSBmZWF0aGVyIHdpdGggcmVhbCBwcm9mZXNzaW9uYWwgcmVzcGVjdCDigJQgJ2dvb2QgYmlyZCwgdGhhdCwgd2hlcmV2ZXIgaXQgZW5kZWQgdXAnIOKAlCB3aGlsZSBTb2xhbmdlIHR1Y2tzIHRoZSBzdGFyLWNvbXBhc3MgY2FyZCBzb21ld2hlcmUgZHJ5LCBhbHJlYWR5IHBsYW5uaW5nLCB5b3Ugc3VzcGVjdCwgZXhhY3RseSB3aGljaCBmdXR1cmUgY3Jvc3Npbmcgc2hlIGludGVuZHMgdG8gdGVzdCBpdCBvbi4=',
            'choices' => [
                ['text' => 'QXNrIFNvbGFuZ2UgdG8gdGVhY2ggeW91IG1vcmUgb2YgaXQgZW4gcm91dGU=', 'next' => '8_end_learn'],
                ['text' => 'TGV0IHRoZSBsZXNzb24gcmVzdCBmb3Igbm93', 'next' => '8_end_rest'],
            ],
        ],
        '8_end_learn' => [
            'prose'  => 'WW91IGFzaywgYW5kIFNvbGFuZ2UsIHVuZXhwZWN0ZWRseSBwbGVhc2VkIHRvIGJlIGFza2VkLCBzcGVuZHMgdGhlIG5leHQgc2V2ZXJhbCBob3VycyBvZiBvcGVuIHdhdGVyIHdhbGtpbmcgeW91IGJhY2sgdGhyb3VnaCBldmVyeXRoaW5nIFRhYmVyYW5uYW5nIGNvdmVyZWQsIGFkZGluZyBoZXIgb3duIGRlY2FkZXMgb2YgcHJhY3RpY2FsIGNvcnJlY3Rpb25zIG9uIHRvcCBvZiBoaXMgcGF0aWVudCB0aGVvcnkuIEJldHdlZW4gdGhlIHR3byBvZiB0aGVtLCBiYWRseSwgc2xvd2x5LCBzb21ldGhpbmcgcmVhbCBzdGFydHMgdG8gdGFrZSByb290LgoKJ1lvdSB3b24ndCBuZWVkIGl0LCcgc2hlIHNheXMgZXZlbnR1YWxseSwgY2hlY2tpbmcgdGhlIGluc3RydW1lbnRzIG91dCBvZiBoYWJpdCByYXRoZXIgdGhhbiBuZWNlc3NpdHkuICdVbnRpbCwgb25lIGRheSwgeW91IHZlcnkgbXVjaCB3aWxsLiBCZXR0ZXIgdG8gaGF2ZSBzdGFydGVkIG5vdy4n',
            'ending' => true,
        ],
        '8_end_rest' => [
            'prose'  => 'WW91IGxldCB0aGUgbGVzc29uIHJlc3QsIGZvciBub3csIHRoZSBjYXJkIGFuZCB0aGUgZmVhdGhlciBzdG93ZWQgY2FyZWZ1bGx5IHJhdGhlciB0aGFuIHN0dWRpZWQgZnVydGhlciwgdG9kYXkncyB1bmRlcnN0YW5kaW5nIGZlZWxpbmcgY29tcGxldGUgZW5vdWdoIG9uIGl0cyBvd24gd2l0aG91dCBuZWVkaW5nIHRvIGJlIGltbWVkaWF0ZWx5IGJ1aWx0IG9uLgoKVGhlIEvFjXR1a3UgY3Jvc3NlcyBvcGVuIHdhdGVyIHVuZGVyIGEgc2t5IHRoYXQgc3RheXMgZW5vcm1vdXMgbG9uZyBhZnRlciBLaXJpdGltYXRpIGl0c2VsZiBoYXMgZHJvcHBlZCBiZWxvdyB0aGUgaG9yaXpvbiwgYW5kIHlvdSBmaW5kIHlvdXJzZWxmLCB1bnByb21wdGVkLCBnbGFuY2luZyB1cCBvbmNlIG9yIHR3aWNlIGFueXdheSDigJQgbm90IHJlYWRpbmcgYW55dGhpbmcgeWV0LCBqdXN0IGxvb2tpbmcsIHRoZSB3YXkgeW91IGxvb2sgYXQgYSBsYW5ndWFnZSB5b3UgZG9uJ3Qgc3BlYWsgYnV0IGhhdmUgc3RhcnRlZCwgcXVpZXRseSwgdG8gd2FudCB0by4=',
            'ending' => true,
        ],
    ],
];
