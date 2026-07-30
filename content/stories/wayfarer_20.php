<?php
return [
    'id'    => 20,
    'title' => 'Didn\'t Have to. Did It Anyway.',
    'color' => '#3A6A7A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UGF0YWdvbmlhIHJpc2VzIGphZ2dlZCBhbmQgd2luZHN3ZXB0LCBnbGFjaWVycyBncmluZGluZyBkb3duIGJldHdlZW4gcGVha3MgdGhhdCBzZWVtIGFjdGl2ZWx5IGhvc3RpbGUgdG8gYW55b25lIGF0dGVtcHRpbmcgdG8gc3VydmV5IHRoZW0gcHJvcGVybHksIHdlYXRoZXIgY2hhbmdpbmcgd2l0aCBhIHNwZWVkIHRoYXQgbWFrZXMgZXZlcnkgZm9yZWNhc3QgZmVlbCBtb3JlIGxpa2UgYSBndWVzcyB0aGFuIGEgcHJlZGljdGlvbi4gQSBzdG9ybSBidWlsZHMgZmFzdCBvbiB0aGUgaG9yaXpvbiBhcyB5b3UgYXBwcm9hY2gsIGZhc3RlciB0aGFuIEdyZXRhJ3MgaW5zdHJ1bWVudHMgcHJlZGljdGVkIGV2ZW4gYW4gaG91ciBhZ28uCgpUd28gY2hvaWNlcyBwcmVzZW50IHRoZW1zZWx2ZXMgYXMgdGhlIHdpbmQgcGlja3MgdXAgc2VyaW91c2x5OiBwdXNoIG9uIHRvd2FyZCBhIGtub3duIHNoZWx0ZXIgYSB2YWxsZXkgb3Zlciwgb3Igc2V0IHRoZSBDb250b3VyIGRvd24gaW1tZWRpYXRlbHksIHJpZ2h0IGhlcmUsIGFuZCByaWRlIHRoZSBzdG9ybSBvdXQgaW4gdGhlIG9wZW4u',
            'choices' => [
                ['text' => 'UHVzaCBvbiB0b3dhcmQga25vd24gc2hlbHRlcg==', 'next' => '2_push'],
                ['text' => 'U2V0IGRvd24gaW1tZWRpYXRlbHk=', 'next' => '2_down'],
            ],
        ],
        '2_push' => [
            'prose'  => 'WW91IHB1c2ggb24sIEdyZXRhIGZpZ2h0aW5nIGluY3JlYXNpbmdseSBob3N0aWxlIGNyb3Nzd2luZHMgd2l0aCByZWFsLCBmb2N1c2VkIHNraWxsLCB0aGUgQ29udG91ciB0YWtpbmcgYSBiZWF0aW5nIGJ1dCBob2xkaW5nIHRvZ2V0aGVyIGFzIHNoZSB0aHJlYWRzIGEgcm91dGUgdG93YXJkIHRoZSBzaGVsdGVyIHNoZSBrbm93cy4gUGFydHdheSB0aGVyZSwgdGhyb3VnaCBkcml2aW5nIHNsZWV0LCBzaGUgc3BvdHMgc29tZXRoaW5nIHRoYXQgbWFrZXMgaGVyIGN1cnNlIHNoYXJwbHkgYW5kIGNoYW5nZSBjb3Vyc2UgZW50aXJlbHkg4oCUIGEgY2FtcCwgYmFkbHkgZGFtYWdlZCwgZGlzdHJlc3MgZmxhcmVzIHN0aWxsIHNtb2tpbmcgYWdhaW5zdCB0aGUgZ3JleSBza3kuCgonVGhhdCdzIFJleWVzJ3Mgb3V0Zml0LCcgc2hlIHNheXMsIGFscmVhZHkgYmFua2luZyBoYXJkIHRvd2FyZCBpdC4gJ1NvbWV0aGluZydzIGdvbmUgd3JvbmcgZG93biB0aGVyZS4n',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '2_down' => [
            'prose'  => 'WW91IHNldCBkb3duIGZhc3QsIHRoZSBDb250b3VyJ3MgbW9vcmluZyBsaW5lcyBzdHJhaW5pbmcgaGFyZCBhZ2FpbnN0IGEgd2luZCB0aGF0J3MgYWxyZWFkeSBwcm9wZXJseSBkYW5nZXJvdXMsIGFuZCBodW5rZXIgZG93biB0byB3YWl0IGl0IG91dC4gVGhyb3VnaCBhIGdhcCBpbiB0aGUgZHJpdmluZyBzbGVldCwgR3JldGEgc3BvdHMgZGlzdHJlc3MgZmxhcmVzIHNtb2tpbmcgYWdhaW5zdCB0aGUgZ3JleSBza3ksIG5vdCBmYXIgb2ZmIOKAlCBhbmQgcmVjb2duaXNlcyB0aGUgY2FtcCdzIGxheW91dCBpbW1lZGlhdGVseS4KCidUaGF0J3MgUmV5ZXMsJyBzaGUgc2F5cywgYWxyZWFkeSBtb3ZpbmcgdG8gZ2V0IHRoZSBDb250b3VyIGFpcmJvcm5lIGFnYWluIGRlc3BpdGUgdGhlIHJpc2suICdTb21ldGhpbmcncyBiYWRseSB3cm9uZyBkb3duIHRoZXJlLic=',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'UmV5ZXMncyBjYW1wIGlzIGEgZ2VudWluZSBkaXNhc3RlciDigJQgYSB0ZW50IGNvbGxhcHNlZCB1bmRlciB3aW5kLWRyaXZlbiBzbm93LCBlcXVpcG1lbnQgc2NhdHRlcmVkLCBhbmQgUmV5ZXMgaGltc2VsZiBmYXZvdXJpbmcgb25lIGxlZyBiYWRseSwgZGlyZWN0aW5nIGhpcyBzaGFrZW4gY3JldyB3aXRoIGdyaW0sIGRldGVybWluZWQgY29tcGV0ZW5jZSBkZXNwaXRlIHRoZSBvYnZpb3VzIGluanVyeS4gSGUgbG9va3MgdXAgYXMgeW91IGxhbmQsIGFuZCBmb3Igb25jZSwgdGhlcmUncyBubyBzcGFjZSBsZWZ0IGluIGhpcyBmYWNlIGZvciByaXZhbHJ5IGF0IGFsbC4KCidEaWRuJ3QgZXhwZWN0IHJlc2N1ZSBmcm9tIHlvdSwnIGhlIHNheXMsIHdpbmNpbmcuICdXYXNuJ3QgZXhhY3RseSBwbGFubmluZyB0byBuZWVkIGl0Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNzZXNzIHdoYXQncyBuZWVkZWQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VHdvIHRoaW5ncyBuZWVkIGRvaW5nIGltbWVkaWF0ZWx5OiBSZXllcydzIGxlZyBuZWVkcyBwcm9wZXIgYXR0ZW50aW9uIGJlZm9yZSBpdCBnZXRzIGFueSB3b3JzZSwgYW5kIHRoZSBjYW1wJ3MgcmVtYWluaW5nIHNoZWx0ZXIgbmVlZHMgdXJnZW50IHJlaW5mb3JjaW5nIGJlZm9yZSB0aGUgc3Rvcm0ncyBuZXh0LCB3b3JzZSB3YXZlIGhpdHMuIEdyZXRhJ3MgYWxyZWFkeSBtb3ZpbmcgdG93YXJkIG9uZS4gVGhlIG90aGVyIG5lZWRzIHlvdS4KCidQaWNrLCcgUmV5ZXMgc2F5cyB0aHJvdWdoIGdyaXR0ZWQgdGVldGgsIHBhc3QgcHJldGVuc2Ugbm93LCBnZW51aW5lbHkgZ3JhdGVmdWwgcmF0aGVyIHRoYW4gcHJvdWQuICdFaXRoZXIgb25lJ3MgdGhlIGRpZmZlcmVuY2UgYmV0d2VlbiBhIGJhZCBuaWdodCBhbmQgYSBnZW51aW5lbHkgZGFuZ2Vyb3VzIG9uZS4n',
            'choices' => [
                ['text' => 'SGVscCBzdGFiaWxpc2UgUmV5ZXMncyBsZWc=', 'next' => '5_leg'],
                ['text' => 'SGVscCByZWluZm9yY2UgdGhlIHNoZWx0ZXI=', 'next' => '5_shelter'],
            ],
        ],
        '5_leg' => [
            'prose'  => 'U3RhYmlsaXNpbmcgdGhlIGxlZyBwcm9wZXJseSBtZWFucyB3b3JraW5nIGZhc3QgYW5kIGNhcmVmdWxseSBib3RoIGF0IG9uY2UsIFJleWVzIGdyaXR0aW5nIHRocm91Z2ggcmVhbCBwYWluIHdoaWxlIHlvdSBzcGxpbnQgaXQgYXMgYmVzdCB0aGUgYXZhaWxhYmxlIG1hdGVyaWFscyBhbGxvdy4gSGUgdGFsa3MgdGhyb3VnaCBoaXMgb3duIHRlZXRoIHRoZSB3aG9sZSB0aW1lLCBwYXJ0bHkgZGlzdHJhY3Rpb24sIHBhcnRseSBnZW51aW5lIGdyYXRpdHVkZSBoZSdzIGNsZWFybHkgdW51c2VkIHRvIGV4cHJlc3NpbmcuCgonV2Fzbid0IGdvaW5nIHRvIGFzayBhbnlvbmUgZm9yIGhlbHAsJyBoZSBhZG1pdHMuICdFc3BlY2lhbGx5IG5vdCB5b3UuIFByaWRlJ3MgYSBnZW51aW5lbHkgc3R1cGlkIHRoaW5nIHRvIG5lYXJseSBsb3NlIGEgbGVnIG92ZXIuJw==',
            'choices' => [
                ['text' => 'U2VlIHRoZSBzdG9ybSB0aHJvdWdoIHRvZ2V0aGVy', 'next' => '6_shared'],
            ],
        ],
        '5_shelter' => [
            'prose'  => 'UmVpbmZvcmNpbmcgdGhlIHNoZWx0ZXIgYWdhaW5zdCB0aGUgc3Rvcm0ncyBuZXh0IHdhdmUgbWVhbnMgcmVhbCwgdXJnZW50IHBoeXNpY2FsIGxhYm91ciwgd2luZCBmaWdodGluZyBldmVyeSBrbm90IGFuZCBzdGFrZSB0aGUgd2hvbGUgd2F5LCBSZXllcydzIGNyZXcgd29ya2luZyBhbG9uZ3NpZGUgeW91IHdpdGggdGhlIHNoYXJlZCwgZm9jdXNlZCBlbmVyZ3kgdGhhdCByZWFsIGRhbmdlciB0ZW5kcyB0byBwcm9kdWNlLiBJdCBob2xkcywganVzdCwgd2hlbiB0aGUgc2Vjb25kIHdhdmUgaGl0cyBoYXJkZXIgdGhhbiB0aGUgZmlyc3QuCgpSZXllcywgd2F0Y2hpbmcgZnJvbSB3aGVyZSBoZSdzIHByb3BwZWQgYWdhaW5zdCBhIGNyYXRlLCBsb29rcyBnZW51aW5lbHkgbW92ZWQgZGVzcGl0ZSBoaW1zZWxmLiAnRGlkbid0IGhhdmUgdG8gZG8gdGhhdC4gRGlkIGl0IGFueXdheS4n',
            'choices' => [
                ['text' => 'U2VlIHRoZSBzdG9ybSB0aHJvdWdoIHRvZ2V0aGVy', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IHJpZGUgb3V0IHRoZSB3b3JzdCBvZiB0aGUgc3Rvcm0gdG9nZXRoZXIsIHJpdmFscnkgZW50aXJlbHkgc3VzcGVuZGVkIGluIHRoZSBmYWNlIG9mIHNoYXJlZCwgZ2VudWluZSBkYW5nZXIsIGFuZCBieSBtb3JuaW5nLCB3aXRoIHRoZSBza3kgY2xlYXJpbmcgYW5kIFJleWVzJ3MgbGVnIHByb3Blcmx5IHN0YWJpbGlzZWQsIHNvbWV0aGluZyBiZXR3ZWVuIHlvdSBoYXMgZnVuZGFtZW50YWxseSwgcGVybWFuZW50bHkgc2hpZnRlZC4KCidUaGlzIGlzbid0IG92ZXIsIEkgc3RpbGwgc2F5LCcgUmV5ZXMgc2F5cywgZWNob2luZyBoaXMgb3duIGxpbmUgZnJvbSBtb250aHMgYmFjaywgYnV0IHRoZXJlJ3Mgbm8gZWRnZSBpbiBpdCBub3csIGp1c3Qgc29tZXRoaW5nIGNsb3NlciB0byBydWVmdWwgaHVtb3VyLiBIZSBwcm9kdWNlcyBhIHNtYWxsIGJyYXNzIGZpdHRpbmcgZnJvbSBoaXMgb3duIGtpdCDigJQgYSBwaWVjZSBoZSdzIGhhZCBhbGwgYWxvbmcsIGl0IHR1cm5zIG91dCwgcXVpZXRseSwgd2l0aG91dCBldmVyIHF1aXRlIGRlY2lkaW5nIHdoYXQgdG8gZG8gd2l0aCBpdC4gJ0hlcmUuIE5vdCB0aGUgbGFzdCBvbmUsIHByb2JhYmx5LCBidXQgb25lIG1vcmUgdGhhbiB5b3UgaGFkIHRoaXMgbW9ybmluZy4gRmluaXNoIGl0IHByb3Blcmx5LiBZb3UndmUgbW9yZSB0aGFuIGVhcm5lZCBteSBoZWxwIGRvaW5nIGl0IG5vdy4n',
            'choices' => [
                ['text' => 'QWNjZXB0IGl0IHByb3Blcmx5', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgQ29udG91ciB3aXRoIHRoZSBmaXR0aW5nIHNlY3VyZSBpbiB0aGUgY2FzZSwgYSBzZXZlbnRlZW50aCBwaWVjZSwgUGF0YWdvbmlhJ3Mgc3Rvcm0tc2NvdXJlZCBwZWFrcyBjYXRjaGluZyByZWFsIG1vcm5pbmcgbGlnaHQgZm9yIHRoZSBmaXJzdCB0aW1lIHNpbmNlIHlvdSBhcnJpdmVkLiBSZXllcydzIGNyZXcsIHBhY2tpbmcgdXAgdGhlIGRhbWFnZWQgY2FtcCBiZWhpbmQgeW91LCB3YXZlIHdpdGggZ2VudWluZSB3YXJtdGggcmF0aGVyIHRoYW4gbWVyZSBwb2xpdGVuZXNzLgoKR3JldGEsIGNoZWNraW5nIHRoZSBmaXR0aW5nJ3MgbWF0Y2ggYWdhaW5zdCB0aGUgcmVzdCBvZiB0aGUgYXNzZW1ibHksIGxvb2tzIGFsbW9zdCBhcyBwbGVhc2VkIGFib3V0IHRoZSBjaGFuZ2VkIHJpdmFscnkgYXMgdGhlIGFjdHVhbCBwcm9ncmVzcy4gJ0RpZG4ndCBzZWUgdGhhdCBjb21pbmcsIGlmIEknbSBob25lc3QuIEdsYWQgdG8gYmUgd3JvbmcgYWJvdXQgaGltLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBnbGFkIHRvbywgcHJvcGVybHk=', 'next' => '8_end_glad'],
                ['text' => 'U2F5IHBhcnQgb2YgeW91IGFsd2F5cyBob3BlZCBpdCB3b3VsZCBlbmQgdGhpcyB3YXk=', 'next' => '8_end_hoped'],
            ],
        ],
        '8_end_glad' => [
            'prose'  => 'J0knbSBnbGFkIHRvbywnIHlvdSBzYXksIHNpbXBseSwgYW5kIG1lYW4gaXQgZW50aXJlbHkg4oCUIG5vIGNvbXBsaWNhdGVkIHF1YWxpZmljYXRpb24sIGp1c3QgZ2VudWluZSByZWxpZWYgdGhhdCBhIHJpdmFscnkgeW91J2QgaGFsZi1icmFjZWQgdG8gY2FycnkgdGhlIHdob2xlIHJlc3Qgb2YgdGhlIHRyaXAgdHVybmVkLCBpbnN0ZWFkLCBpbnRvIHNvbWV0aGluZyBjbG9zZXIgdG8gYW4gYWN0dWFsIGZyaWVuZHNoaXAuCgpHcmV0YSBncmlucy4gJ1N0b3JtcyBhcmUgZ29vZCBmb3IgdGhhdCwgc29tZXRpbWVzLiBTdHJpcCBldmVyeXRoaW5nIGRvd24gdG8gd2hhdCBhY3R1YWxseSBtYXR0ZXJzLCB3aGV0aGVyIHlvdSdyZSByZWFkeSBmb3IgaXQgb3Igbm90Lic=',
            'ending' => true,
        ],
        '8_end_hoped' => [
            'prose'  => 'J0hvbmVzdGx5LCBwYXJ0IG9mIG1lIGFsd2F5cyBob3BlZCBpdCB3b3VsZCBlbmQgdGhpcyB3YXksJyB5b3UgYWRtaXQsIGEgbGl0dGxlIHN1cnByaXNlZCBieSB5b3VyIG93biBhbnN3ZXIuICdIZSBuZXZlciBmZWx0IGxpa2UgYSByZWFsIGVuZW15LiBKdXN0IHNvbWVvbmUgd2FudGluZyBzb21ldGhpbmcgYmFkbHksIGZyb20gYSBkaWZmZXJlbnQgZGlyZWN0aW9uIHRoYW4gbWUuJwoKR3JldGEgY29uc2lkZXJzIHRoaXMsIG5vZHMgc2xvd2x5LiAnTWlnaHQgYmUgd2h5IGl0IHdvcmtlZCBvdXQsIHRoZW4uIEhhcmQgdG8gc3RheSBzb21lb25lJ3MgZW5lbXkgd2hlbiB5b3UgbmV2ZXIgcmVhbGx5IGJlbGlldmVkIGluIHRoZSBlbm1pdHkgeW91cnNlbGYuJyBUaGUgQ29udG91ciBsaWZ0cyBvZmYgUGF0YWdvbmlhJ3MgY2xlYXJpbmcgc2tpZXMsIGFuZCB0aGUgd2hvbGUgcmVzdCBvZiB0aGUgam91cm5leSBmZWVscywgc3VkZGVubHksIGNvbnNpZGVyYWJseSBsZXNzIGxvbmVseSB0aGFuIGl0IGRpZCB5ZXN0ZXJkYXku',
            'ending' => true,
        ],
    ],
];
