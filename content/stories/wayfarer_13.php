<?php
return [
    'id'    => 13,
    'title' => 'Not Stuck. Moving.',
    'color' => '#C08A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEtodW1idSByZWdpb24gcmlzZXMgdG93YXJkIGdlbnVpbmUgZ2lhbnRzIOKAlCBFdmVyZXN0IGl0c2VsZiB2aXNpYmxlIG9uIGNsZWFyIGRheXMgYXMgYSBkYXJrIHB5cmFtaWQgYWJvdmUgZXZlcnl0aGluZyBlbHNlLCBwcmF5ZXIgZmxhZ3Mgc3RydW5nIGFjcm9zcyBldmVyeSBwYXNzIGluIGZsdXR0ZXJpbmcgbGluZXMgb2YgY29sb3VyLiBTaGVycGEgaG9zcGl0YWxpdHkgbWVldHMgeW91IGF0IGV2ZXJ5IHRlYSBob3VzZSBhbG9uZyB0aGUgd2F5LCB3YXJtIGFuZCB1bmh1cnJpZWQgZGVzcGl0ZSB0aGUgYWx0aXR1ZGUncyB2ZXJ5IHJlYWwgZGVtYW5kcyBvbiBjb252ZXJzYXRpb24uCgpUd28gcm91dGVzIHRvd2FyZCB0aGUgbW9uYXN0ZXJ5IHByZXNlbnQgdGhlbXNlbHZlczogdGhyb3VnaCB0aGUgbWFpbiB0cmVra2luZyB2aWxsYWdlLCB3ZWxsLXRyb2RkZW4gYW5kIGdyYWR1YWwsIG9yIGEgaGlnaGVyLCBtb3JlIGRpcmVjdCByb3V0ZSBmYXZvdXJlZCBieSBsb2NhbHMgcmF0aGVyIHRoYW4gdmlzaXRvcnMsIHN0ZWVwZXIgYnV0IGNvbnNpZGVyYWJseSBzaG9ydGVyLg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbiB0cmVra2luZyByb3V0ZQ==', 'next' => '2_main'],
                ['text' => 'VGFrZSB0aGUgaGlnaGVyIGxvY2FsIHJvdXRl', 'next' => '2_local'],
            ],
        ],
        '2_main' => [
            'prose'  => 'VGhlIG1haW4gcm91dGUgY2xpbWJzIGdyYWR1YWxseSwgcHJvcGVybHksIGdpdmluZyB5b3VyIGx1bmdzIHRpbWUgdG8gYWRqdXN0IHRoZSB3YXkgc2Vuc2libGUgYWNjbGltYXRpc2F0aW9uIGFsd2F5cyBzaG91bGQuIFByYXllciBmbGFncyBtYXJrIGV2ZXJ5IHBhc3MsIHNuYXBwaW5nIGluIGEgd2luZCB0aGF0IG5ldmVyIHF1aXRlIHN0b3BzLCBhbmQgdGhlIHdob2xlIGFzY2VudCBoYXMgdGhlIHBhcnRpY3VsYXIgdW5odXJyaWVkIHJoeXRobSBvZiBhIHRyYWlsIGRlc2lnbmVkLCBldmVudHVhbGx5LCBieSBkZWNhZGVzIG9mIGFjdHVhbCBmb290IHRyYWZmaWMgcmF0aGVyIHRoYW4gYW55IHNpbmdsZSBwbGFubmVyJ3MgZGVjaXNpb24uCgpZb3UgYXJyaXZlIGF0IHRoZSBtb25hc3RlcnkgZ2F0ZSB3aW5kZWQgYnV0IHByb3Blcmx5IGFjY2xpbWF0aXNlZCwgY29uc2lkZXJhYmx5IG1vcmUgY2FwYWJsZSBvZiBhcHByZWNpYXRpbmcgdGhlIHZpZXcgdGhhbiB5b3UnZCBvdGhlcndpc2UgaGF2ZSBiZWVuLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdhdGU=', 'next' => '3_shared'],
            ],
        ],
        '2_local' => [
            'prose'  => 'VGhlIGxvY2FsIHJvdXRlIGlzIHN0ZWVwZXIsIHNob3J0ZXIsIGFuZCBjb25zaWRlcmFibHkgbGVzcyBmb3JnaXZpbmcgb2YgcG9vciBhY2NsaW1hdGlzYXRpb24sIHlvdXIgbHVuZ3Mgd29ya2luZyBoYXJkZXIgd2l0aCBldmVyeSBzd2l0Y2hiYWNrIHRoYW4geW91J2QgbGlrZSB0byBhZG1pdCBvdXQgbG91ZC4gQSBsb2NhbCBmYW1pbHkgdHJhdmVsbGluZyB0aGUgc2FtZSByb3V0ZSBtYXRjaGVzIHlvdXIgc2xvd2VyIHBhY2Ugd2l0aG91dCBjb21tZW50LCBvZmZlcmluZyBkcmllZCB5YWsgY2hlZXNlIHRoYXQgdHVybnMgb3V0IHRvIGJlIGV4YWN0bHkgd2hhdCB5b3VyIGJvZHkgd2FzIGFza2luZyBmb3IuCgpZb3UgYXJyaXZlIGF0IHRoZSBtb25hc3RlcnkgZ2F0ZSBmYXN0ZXIgdGhhbiB0aGUgbWFpbiByb3V0ZSB3b3VsZCBoYXZlIG1hbmFnZWQsIGFuZCBjb25zaWRlcmFibHkgbW9yZSBncmF0ZWZ1bCBmb3IgdGhlIHNoYXJlZCBjaGVlc2UgdGhhbiB5b3UgZXhwZWN0ZWQgdG8gYmUu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdhdGU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIG1vbmFzdGVyeSdzIHNlbmlvciBsYW1hIHJlY2VpdmVzIHlvdSB3aXRoIHRoZSBjYWxtLCB1bmh1cnJpZWQgYXR0ZW50aW9uIHRoYXQgc2VlbXMgdG8gY2hhcmFjdGVyaXNlIGV2ZXJ5IHNlcmlvdXMgcmVsaWdpb3VzIGNvbW11bml0eSB5b3UndmUgdmlzaXRlZCB0aGlzIHdob2xlIHRyaXAuIEhlIGtub3dzIHRoZSBiYXJvbWV0cmljIGdhdWdlIGltbWVkaWF0ZWx5LCBhbmQga25vd3MgQXVndXN0aW4ncyBuYW1lIHdpdGggcmVhbCB3YXJtdGggcmF0aGVyIHRoYW4gdGhlIG1vcmUgY29tcGxpY2F0ZWQgcmVhY3Rpb25zIHlvdSd2ZSBlbmNvdW50ZXJlZCBlbHNld2hlcmUuCgonSGUgZ2F2ZSBpdCB0byB1cyBoaW1zZWxmLCcgdGhlIGxhbWEgc2F5cy4gJ05vdCBsb3N0LCBub3QgbGVmdCBiZWhpbmQg4oCUIGEgZ2VudWluZSBnaWZ0LCBpbiB0aGFua3MgZm9yIGEgcmVzY3VlLiBPbmUgb2Ygb3VyIG1vbmtzIGZvdW5kIGhpbSBoYWxmLWZyb3plbiBvbiB0aGUgcGFzcyBhYm92ZSwgeWVhcnMgYWdvLCBhbmQgYnJvdWdodCBoaW0gZG93bi4gSGUgaW5zaXN0ZWQgb24gZ2l2aW5nIHNvbWV0aGluZyBpbiByZXR1cm4sIHRob3VnaCB3ZSB0b2xkIGhpbSBpdCB3YXNuJ3QgbmVjZXNzYXJ5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGlmIGl0IGNhbiBiZSByZXR1cm5lZA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'J0EgZ2lmdCBnaXZlbiBmcmVlbHkgaXNuJ3Qgc2ltcGx5IHJlY2xhaW1lZCwnIHRoZSBsYW1hIHNheXMsIG5vdCB1bmtpbmRseS4gJ0J1dCBJIHVuZGVyc3RhbmQgd2hhdCB5b3UncmUgYWN0dWFsbHkgdHJ5aW5nIHRvIGZpbmlzaCwgYW5kIEkgdGhpbmsgaGUgd291bGQgd2FudCB0aGF0IGZpbmlzaGVkIHByb3Blcmx5LiBTbzogZWFybiBpdCBhcyBhIHNlY29uZCBnaWZ0LCBnaXZlbiB0byB5b3UgcmF0aGVyIHRoYW4gdGFrZW4gYmFjayBmcm9tIHVzLiBIZWxwIHdpdGggdGhlIG1vbmFzdGVyeSdzIHdvcmsgYSB3aGlsZSDigJQgdGhlIHByYXllciB3aGVlbHMgbmVlZCBwcm9wZXIgbWFpbnRlbmFuY2UsIG9yIHRoZSB0ZXJyYWNlZCBnYXJkZW5zIG5lZWQgdGVuZGluZyBiZWZvcmUgdGhlIHNlYXNvbiB0dXJucy4n',
            'choices' => [
                ['text' => 'SGVscCBtYWludGFpbiB0aGUgcHJheWVyIHdoZWVscw==', 'next' => '5_wheels'],
                ['text' => 'SGVscCB0ZW5kIHRoZSB0ZXJyYWNlZCBnYXJkZW5z', 'next' => '5_gardens'],
            ],
        ],
        '5_wheels' => [
            'prose'  => 'TWFpbnRhaW5pbmcgdGhlIHByYXllciB3aGVlbHMgaXMgc2xvdywgY2FyZWZ1bCwgZmFpbnRseSBtZWRpdGF0aXZlIHdvcmsg4oCUIGNoZWNraW5nIG1lY2hhbmlzbXMsIHJlcGxhY2luZyB3b3JuIGNvcmQsIG1ha2luZyBzdXJlIGVhY2ggd2hlZWwgdHVybnMgc21vb3RobHkgZW5vdWdoIHRvIGtlZXAgaXRzIGVuZGxlc3MgcXVpZXQgcHJheWVyIG1vdmluZyBwcm9wZXJseS4gQSB5b3VuZyBtb25rIHRlYWNoZXMgeW91IHdpdGhvdXQgbXVjaCBleHBsYW5hdGlvbiwgdHJ1c3RpbmcgZGVtb25zdHJhdGlvbiBvdmVyIHdvcmRzLgoKQnkgdGhlIGVuZCwgeW91ciBoYW5kcyBzbWVsbCBvZiBvbGQgd29vZCBhbmQgYnV0dGVyLWxhbXAgc21va2UsIGFuZCBzb21ldGhpbmcgaW4gdGhlIHJlcGV0aXRpdmUsIGNhcmVmdWwgbGFib3VyIGhhcyBzZXR0bGVkIGEgcmVzdGxlc3NuZXNzIHlvdSBkaWRuJ3QgZnVsbHkgcmVhbGlzZSB5b3Ugd2VyZSBjYXJyeWluZy4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBsYW1hJ3MgZGVjaXNpb24=', 'next' => '6_shared'],
            ],
        ],
        '5_gardens' => [
            'prose'  => 'VGVuZGluZyB0aGUgdGVycmFjZWQgZ2FyZGVucyBhdCB0aGlzIGFsdGl0dWRlIGlzIGhhcmRlciB0aGFuIGl0IGxvb2tzLCB0aGluIHNvaWwgYW5kIHRoaW5uZXIgYWlyIGJvdGggd29ya2luZyBhZ2FpbnN0IHlvdSB0aGUgd2hvbGUgYWZ0ZXJub29uLiBUaGUgbW9ua3Mgd29ya2luZyBhbG9uZ3NpZGUgeW91IG1vdmUgd2l0aCBhbiBlY29ub215IG9mIGVmZm9ydCB0aGF0IGNvbWVzIGZyb20gZGVjYWRlcyBvZiBkb2luZyBleGFjdGx5IHRoaXMgYXQgZXhhY3RseSB0aGlzIGFsdGl0dWRlLCBhbmQgZ2VudGx5IGNvcnJlY3QgeW91ciB0ZWNobmlxdWUgbW9yZSB0aGFuIG9uY2UuCgpCeSB0aGUgZW5kLCB0aGUgdGVycmFjZXMgYXJlIHByb3Blcmx5IHByZXBhcmVkIGZvciB0aGUgY29taW5nIHNlYXNvbiwgYW5kIHlvdXIgd2hvbGUgYm9keSBhY2hlcyBpbiB0aGUgc3BlY2lmaWMgd2F5IG9mIGhvbmVzdCwgdXNlZnVsLCB1bmZhbWlsaWFyIHdvcmsu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBsYW1hJ3MgZGVjaXNpb24=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIGxhbWEsIHNhdGlzZmllZCB3aXRoIHRoZSB3b3JrIGVpdGhlciB3YXksIGJyaW5ncyBvdXQgdGhlIGJhcm9tZXRyaWMgZ2F1Z2UgaGltc2VsZiDigJQgc21hbGwsIGJyYXNzLCBrZXB0IHNhZmUgb24gYSBzaGVsZiBhbG9uZ3NpZGUgZ2VudWluZWx5IHNhY3JlZCBvYmplY3RzIGZvciB5ZWFycywgdHJlYXRlZCB3aXRoIHRoZSBzYW1lIGNhcmVmdWwgcmVzcGVjdCByZWdhcmRsZXNzIG9mIGl0cyBtb3JlIG9yZGluYXJ5IG9yaWdpbi4KCidBIGdpZnQgcmV0dXJucyBlYXNpZXN0IHRvIHNvbWVvbmUgd2hvJ3MgZ2l2ZW4gc29tZXRoaW5nIHRoZW1zZWx2ZXMgZmlyc3QsJyBoZSBzYXlzLCBwbGFjaW5nIGl0IGluIHlvdXIgaGFuZHMuICdOb3cgaXQgdHJhdmVscyBvbiwgcHJvcGVybHksIHRoZSB3YXkgZ2lmdHMgYXJlIG1lYW50IHRvLiBOb3Qgc3R1Y2suIE1vdmluZy4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciByb3V0ZSB5b3UgZGlkbid0IHRha2Ugb24gdGhlIHdheSB1cCwgcHJheWVyIGZsYWdzIHNuYXBwaW5nIG92ZXJoZWFkIHRoZSB3aG9sZSBkZXNjZW50LCBFdmVyZXN0J3MgZGlzdGFudCBkYXJrIHB5cmFtaWQgY2F0Y2hpbmcgdGhlIGxhc3Qgb2YgdGhlIGRheSdzIGxpZ2h0IGJlaGluZCB5b3UuIFRoZSBiYXJvbWV0cmljIGdhdWdlIHJpZGVzIHNlY3VyZSBpbiB0aGUgY2FzZSBub3csIGEgdGVudGggcGllY2UgcmVjb3ZlcmVkLCBhbmQgdGhlIGNhc2UgaXRzZWxmIGlzIGJlZ2lubmluZywgdW5taXN0YWthYmx5LCB0byBsb29rIGxpa2UgYW4gYWN0dWFsIGZpbmlzaGVkIGluc3RydW1lbnQgcmF0aGVyIHRoYW4gYSBzY2F0dGVyZWQgY29sbGVjdGlvbiBvZiBwYXJ0cy4KCkdyZXRhIHN0dWRpZXMgdGhlIGdhdWdlIHdpdGggcmVhbCBzYXRpc2ZhY3Rpb24uICdIZSBnYXZlIHRoaXMgYXdheSBvbmNlLCBmcmVlbHksIGFuZCBpdCdzIGNvbWluZyBiYWNrIHRvIGhpbSBhbnl3YXksIGp1c3QgZGlmZmVyZW50bHkgdGhhbiBlaXRoZXIgb2YgdXMgcHJvYmFibHkgZXhwZWN0ZWQuJw==',
            'choices' => [
                ['text' => 'U2F5IHRoYXQgZmVlbHMgbGlrZSB0aGUgd2hvbGUgdHJpcCwgaG9uZXN0bHk=', 'next' => '8_end_pattern'],
                ['text' => 'SnVzdCBlbmpveSB0aGUgcXVpZXQgb2YgdGhlIGRlc2NlbnQ=', 'next' => '8_end_quiet'],
            ],
        ],
        '8_end_pattern' => [
            'prose'  => 'J1RoYXQgZmVlbHMgbGlrZSB0aGUgd2hvbGUgdHJpcCwgaG9uZXN0bHksJyB5b3Ugc2F5LCBhbmQgbWVhbiBpdCDigJQgZXZlcnkgcGllY2Ugc28gZmFyIGdpdmVuIGF3YXkgb3IgbG9zdCBvciBzaW1wbHkgc2V0IGFzaWRlLCBhbmQgZXZlcnkgc2luZ2xlIG9uZSBmaW5kaW5nIGl0cyB3YXkgYmFjayBub3QgdGhyb3VnaCBmb3JjZSBvciByZWNsYWltaW5nLCBidXQgdGhyb3VnaCBzb21ldGhpbmcgY2xvc2VyIHRvIGdyYWNlLCBmcmVlbHkgb2ZmZXJlZCBhIHNlY29uZCB0aW1lLgoKR3JldGEgZG9lc24ndCBhbnN3ZXIgaW1tZWRpYXRlbHksIGJ1dCB3aGVuIHNoZSBkb2VzLCBpdCdzIHRob3VnaHRmdWwgcmF0aGVyIHRoYW4gYnJpc2suICdNaWdodCBiZSB3b3J0aCByZW1lbWJlcmluZyB0aGF0LCB3aGF0ZXZlciB3ZSBmaW5kIHdhaXRpbmcgYXQgdGhlIHZlcnkgZW5kIG9mIHRoaXMgbGlzdC4n',
            'ending' => true,
        ],
        '8_end_quiet' => [
            'prose'  => 'WW91IGRvbid0IHNheSBtdWNoLCBsZXR0aW5nIHRoZSBxdWlldCBvZiB0aGUgZGVzY2VudCBzcGVhayBmb3IgaXRzZWxmIGluc3RlYWQg4oCUIHByYXllciBmbGFncywgdGhpbiBjb2xkIGFpciwgdGhlIHBhcnRpY3VsYXIgc2F0aXNmYWN0aW9uIG9mIGEgbG9uZyBjbGltYiBwcm9wZXJseSBmaW5pc2hlZCByYXRoZXIgdGhhbiBtZXJlbHkgc3Vydml2ZWQuCgpUaGUgQ29udG91ciBsaWZ0cyBvZmYgdGhlIEtodW1idSB2YWxsZXkgYXMgZXZlbmluZyBwcm9wZXJseSBzZXR0bGVzLCBFdmVyZXN0J3MgZGFyayBzaWxob3VldHRlIHRoZSBsYXN0IHRoaW5nIHZpc2libGUgYmVmb3JlIGNsb3VkIGNsb3NlcyBpbiBhcm91bmQgdGhlIHBlYWtzLCBhbmQgeW91IGZpbmQgeW91cnNlbGYsIGZvciBvbmNlLCBzaW1wbHkgZ3JhdGVmdWwsIHdpdGhvdXQgbmVlZGluZyB0byB0dXJuIHRoZSBmZWVsaW5nIGludG8gd29yZHMgZm9yIGFueW9uZS4=',
            'ending' => true,
        ],
    ],
];
