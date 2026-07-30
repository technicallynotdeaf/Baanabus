<?php
return [
    'id'    => 22,
    'title' => 'It\'ll Hold',
    'color' => '#5A7A9A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VHJlYml6b25kIHJpc2VzIGFib3ZlIHRoZSBCbGFjayBTZWEsIGFuIG9sZCB0cmFkaW5nIHBvcnQgdGhhdCdzIHdhdGNoZWQgZW1waXJlcyBhbmQgY2FyYXZhbnMgYWxpa2UgcGFzcyB0aHJvdWdoIGZvciBjZW50dXJpZXMsIGl0cyBoYXJib3VyIGNhdGNoaW5nIGEgY29sZGVyLCBncmV5ZXIgbGlnaHQgdGhhbiB0aGUgTWVkaXRlcnJhbmVhbiBwb3J0cyBiZWhpbmQgeW91LiBUb21hcywgdW5jaGFyYWN0ZXJpc3RpY2FsbHkgbmVydm91cywga2VlcHMgY2hlY2tpbmcgdGhlIGFzc2VtYmxlZCBzZWFsIGluIGl0cyBjYXNlLgoKJ1Nob3VsZCB0ZXN0IGl0IHByb3Blcmx5IGJlZm9yZSBTYW1hcmthbmQsJyBoZSBzYXlzLiAnQ2FuJ3QgYXJyaXZlIHRvIGNsb3NlIGEgZGVidCB3aXRoIGFuIHVudGVzdGVkIHNlYWwuIE5lZWRzIGEgZmlyc3QgcHJlc3NpbmcsIGRvbmUgcmlnaHQsIGJ5IHNvbWVvbmUgd2hvIGFjdHVhbGx5IGtub3dzIG5vdGFyaWFsIHByYWN0aWNlLicKClR3byBhcHByb2FjaGVzIHRvd2FyZCBhIHByb3BlciBub3RhcnkgcHJlc2VudCB0aGVtc2VsdmVzOiB0aHJvdWdoIHRoZSBvbGQgY3VzdG9tcyBob3VzZSwgZm9ybWFsIGFuZCB0aG9yb3VnaCwgb3IgdmlhIGEgbG9jYWwgbWVyY2hhbnRzJyBndWlsZCB0aGF0IGtlZXBzIGl0cyBvd24gcmVzcGVjdGVkIG5vdGFyeSBvbiBoYW5kLg==',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgb2xkIGN1c3RvbXMgaG91c2U=', 'next' => '2_customs'],
                ['text' => 'QXNrIHRoZSBtZXJjaGFudHMnIGd1aWxk', 'next' => '2_guild'],
            ],
        ],
        '2_customs' => [
            'prose'  => 'VGhlIGN1c3RvbXMgaG91c2UgaXMgcHJvcGVybHkgYnVyZWF1Y3JhdGljLCB0aG9yb3VnaCBpbiBleGFjdGx5IHRoZSB3YXkgb2xkIHRyYWRpbmcgcG9ydHMgdGVuZCB0byBiZSBhYm91dCBhbnl0aGluZyBpbnZvbHZpbmcgb2ZmaWNpYWwgc2VhbHMgYW5kIGRvY3VtZW50cy4gVGhlIG9mZmljaWFsIHdobyBldmVudHVhbGx5IGF0dGVuZHMgdG8geW91IHRha2VzIHJlYWwsIGNhcmVmdWwgaW50ZXJlc3QgaW4gdGhlIGFzc2VtYmxlZCBzZWFsJ3MgY29uc3RydWN0aW9uLgoKJ1VudXN1YWwgcGllY2UsJyBzaGUgc2F5cy4gJ05pbmUgcGFydHMsIHByb3Blcmx5IGpvaW5lZC4gSSdkIGxpa2UgdG8gc2VlIHRoaXMgYWN0dWFsbHkgd29yaywgaWYgeW91IGRvbid0IG1pbmQgYSB3aXRuZXNzLic=',
            'choices' => [
                ['text' => 'UHJvY2VlZCB0byB0aGUgdGVzdA==', 'next' => '3_shared'],
            ],
        ],
        '2_guild' => [
            'prose'  => 'VGhlIG1lcmNoYW50cycgZ3VpbGQgaXMgaW5mb3JtYWwgYnV0IGdlbnVpbmVseSByZXNwZWN0ZWQsIGl0cyByZXNpZGVudCBub3RhcnkgYSB3ZWF0aGVyZWQgb2xkIG1hbiB3aG8ncyBjbGVhcmx5IHNlZW4gZXZlcnkga2luZCBvZiBzZWFsIGFuZCBkb2N1bWVudCBhIHdvcmtpbmcgcG9ydCBjb3VsZCBwcm9kdWNlLiBIZSBleGFtaW5lcyB0aGUgYXNzZW1ibGVkIHBpZWNlIHdpdGggcmVhbCwgcHJvZmVzc2lvbmFsIGN1cmlvc2l0eS4KCidOaW5lIHBhcnRzLCcgaGUgbXVybXVycy4gJ05ldmVyIHNlZW4gYW55dGhpbmcgcXVpdGUgbGlrZSBpdC4gTGV0J3Mgc2VlIGlmIGl0IGFjdHVhbGx5IGhvbGRzIHRvZ2V0aGVyIHVuZGVyIHJlYWwgdXNlLic=',
            'choices' => [
                ['text' => 'UHJvY2VlZCB0byB0aGUgdGVzdA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'V2hpY2hldmVyIG5vdGFyeSB5b3UgZm91bmQsIHRoZSBtb21lbnQncyBhcnJpdmVkOiBtZWx0ZWQgd2F4LCBhIHN0ZWFkeSBoYW5kLCBhbmQgbmluZSB3ZWRnZXMnIHdvcnRoIG9mIGNvbGxlY3RlZCBkZWJ0cyBhbmQgc3RvcmllcyBhYm91dCB0byBiZSB0ZXN0ZWQgZm9yIHRoZSBmaXJzdCB0aW1lIGFzIGEgc2luZ2xlLCBmdW5jdGlvbmluZyB3aG9sZS4gVGhlIG5vdGFyeSBoYW5kcyB5b3UgdGhlIHdheCBhbmQgc3RlcHMgYmFjay4KCidZb3VyIHNlYWwsJyBoZSBvciBzaGUgc2F5cy4gJ1lvdXIgcHJlc3NpbmcuIExldCdzIHNlZSB3aGF0IG5pbmUgbW9udGhzIG9mIGNvbGxlY3RpbmcgYWN0dWFsbHkgYnVpbHQuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'UHJlcGFyZSB0aGUgd2F4IHByb3Blcmx5', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUgYXJlIHR3byB3YXlzIHRvIGRvIHRoaXMgcHJvcGVybHk6IGhlYXQgdGhlIHdheCBjYXJlZnVsbHkgeW91cnNlbGYsIHRlc3RpbmcgdGhlIGV4YWN0IHJpZ2h0IHRlbXBlcmF0dXJlIGFuZCBjb25zaXN0ZW5jeSB0aGUgd2F5IFlzb2xkZSdzIG93biBsZXR0ZXJzIGRlc2NyaWJlIGRvaW5nIGl0LCBvciBsZXQgdGhlIG5vdGFyeSdzIG93biBwcmFjdGlzZWQgaGFuZCBwcmVwYXJlIGl0LCB0cnVzdGluZyBwcm9mZXNzaW9uYWwgZXhwZXJpZW5jZSBvdmVyIHlvdXIgb3duIGxlc3MtdGVzdGVkIGluc3RpbmN0LgoKJ0VpdGhlciBnZXRzIGEgcHJvcGVyIHRlc3QsJyB0aGUgbm90YXJ5IHNheXMuICdEZXBlbmRzIHdoZXRoZXIgeW91IHdhbnQgdG8gcHJvdmUgdGhlIHNlYWwgd29ya3MsIG9yIHByb3ZlIHlvdSBjYW4gdXNlIGl0IHByb3Blcmx5IHRvby4n',
            'choices' => [
                ['text' => 'SGVhdCBhbmQgcHJlcGFyZSB0aGUgd2F4IHlvdXJzZWxm', 'next' => '5_yourself'],
                ['text' => 'TGV0IHRoZSBub3RhcnkgcHJlcGFyZSBpdA==', 'next' => '5_notary'],
            ],
        ],
        '5_yourself' => [
            'prose'  => 'WW91IGhlYXQgdGhlIHdheCBjYXJlZnVsbHksIHRlc3RpbmcgY29uc2lzdGVuY3kgYWdhaW5zdCB5b3VyIG93biBhY2N1bXVsYXRlZCBzZW5zZSBvZiB3aGF0J3MgcmlnaHQsIGRyYXdpbmcgb24gZGV0YWlscyBoYWxmLXJlbWVtYmVyZWQgZnJvbSBsZXR0ZXJzIGFuZCBsZWRnZXJzIGFjcm9zcyB0aGUgd2hvbGUgam91cm5leS4gSXQgdGFrZXMgdHdvIGNhcmVmdWwgYXR0ZW1wdHMgYmVmb3JlIHRoZSB0ZW1wZXJhdHVyZSdzIGdlbnVpbmVseSByaWdodC4KClRoZSBub3Rhcnkgd2F0Y2hlcyB3aXRoIHJlYWwsIGdyb3dpbmcgcmVzcGVjdC4gJ1lvdSd2ZSBhY3R1YWxseSBsZWFybmVkIHNvbWV0aGluZyBvdXQgdGhlcmUsIG5vdCBqdXN0IGNvbGxlY3RlZCBwaWVjZXMgb2YgbWV0YWwuJw==',
            'choices' => [
                ['text' => 'TWFrZSB0aGUgcHJlc3Npbmc=', 'next' => '6_shared'],
            ],
        ],
        '5_notary' => [
            'prose'  => 'WW91IGxldCB0aGUgbm90YXJ5J3MgcHJhY3Rpc2VkIGhhbmQgcHJlcGFyZSB0aGUgd2F4LCB0cnVzdGluZyBkZWNhZGVzIG9mIHByb2Zlc3Npb25hbCBleHBlcmllbmNlIG92ZXIgeW91ciBvd24gbGVzcy1jZXJ0YWluIGluc3RpbmN0LCB3YXRjaGluZyBjYXJlZnVsbHkgYXMgZXhwZXJ0aXNlIHlvdSBkb24ndCBoYXZlIHlvdXJzZWxmIGRvZXMgZXhhY3RseSB3aGF0J3MgbmVlZGVkLCBwcmVjaXNlbHkgYW5kIHdpdGhvdXQgd2FzdGVkIG1vdGlvbi4KClRoZSBub3Rhcnkgd29ya3Mgd2l0aCByZWFsLCBxdWlldCBwcmlkZS4gJ1NvbWUgdGhpbmdzIGFyZSB3b3J0aCB0cnVzdGluZyB0byB0aGUgcGVyc29uIHdobydzIGFjdHVhbGx5IHNwZW50IGEgbGlmZXRpbWUgZ2V0dGluZyB0aGVtIHJpZ2h0Lic=',
            'choices' => [
                ['text' => 'TWFrZSB0aGUgcHJlc3Npbmc=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IHByZXNzIHRoZSBhc3NlbWJsZWQgc2VhbCBpbnRvIHRoZSB3YXJtIHdheCwgYW5kIGZvciBvbmUgZ2VudWluZWx5IHN1c3BlbmRlZCBtb21lbnQsIG5vYm9keSBicmVhdGhlcyDigJQgbmluZSBtb250aHMsIG5pbmUgY2l0aWVzLCBuaW5lIGRlYnRzIGFuZCBzdG9yaWVzLCBhbGwgcmVzdGluZyBvbiB3aGV0aGVyIHRoaXMgYWN0dWFsbHksIHBoeXNpY2FsbHkgd29ya3MuCgpJdCBkb2VzLiBUaGUgaW1wcmVzc2lvbiBjb21lcyBhd2F5IGNsZWFuLCBwZXJmZWN0LCBldmVyeSBkZXRhaWwgb2YgdGhlIG5pbmUtcGFydCBkZXNpZ24gcmVuZGVyZWQgZXhhY3RseSBhcyBpdCB3YXMgYWx3YXlzIG1lYW50IHRvIGJlLiBUaGUgbm90YXJ5IGxldHMgb3V0IGEgYnJlYXRoLiAnVGhlcmUgaXQgaXMuIFdoYXRldmVyIHlvdSdyZSBjbG9zaW5nIG91dCB3aXRoIHRoaXMg4oCUIGl0J2xsIGhvbGQuIFByb3Blcmx5LCBsZWdhbGx5LCBjb21wbGV0ZWx5Lic=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgcHJvb2YgYW5kIHByZXBhcmUgdG8gbGVhdmU=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNhcnJ5IHRoZSB3YXggaW1wcmVzc2lvbiBjYXJlZnVsbHkgYWxvbmdzaWRlIHRoZSBzZWFsIGl0c2VsZiwgVHJlYml6b25kJ3MgZ3JleSBCbGFjayBTZWEgbGlnaHQgc2V0dGxpbmcgaW50byBldmVuaW5nIGFzIHlvdSBoZWFkIGJhY2sgdG8gdGhlIGNhcmF2YW4sIG9uZSBmaW5hbCwgY3J1Y2lhbCBjb25maXJtYXRpb24gbm93IHNhZmVseSBpbiBoYW5kIGJlZm9yZSB0aGUgdmVyeSBsYXN0IGxlZyBob21lLgoKVG9tYXMsIGV4YW1pbmluZyB0aGUgcGVyZmVjdCBpbXByZXNzaW9uIHdpdGggcmVhbCwgdW5kaXNndWlzZWQgcmVsaWVmLCBmaW5hbGx5IGxldHMgaGlzIG5lcnZvdXNuZXNzIGdvIGVudGlyZWx5LiAnV29ya3MuIEFjdHVhbGx5IHdvcmtzLiBXaGF0ZXZlcidzIHdhaXRpbmcgaW4gU2FtYXJrYW5kLCB3ZSdyZSBhcnJpdmluZyB3aXRoIHNvbWV0aGluZyB0aGF0J2xsIGdlbnVpbmVseSBkbyB3aGF0IGl0IG5lZWRzIHRvIGRvLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSBuZXZlciBkb3VidGVkIGl0IHdvdWxkIHdvcms=', 'next' => '8_end_confident'],
                ['text' => 'QWRtaXQgeW91IHdlcmUgbmVydm91cyB0b28=', 'next' => '8_end_nervous'],
            ],
        ],
        '8_end_confident' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIG5ldmVyIGRvdWJ0ZWQgaXQgd291bGQgd29yaywnIHlvdSBzYXksIGFuZCBmaW5kIHlvdSBtZWFuIGl0IOKAlCBuaW5lIG1vbnRocyBvZiBjYXJlZnVsLCBob25lc3QgY29sbGVjdGluZyBkb2Vzbid0IHByb2R1Y2Ugc29tZXRoaW5nIGZyYWdpbGUgb3IgaGFsZi1maW5pc2hlZC4gJ0ZlbHQgcmlnaHQsIHRoZSB3aG9sZSB3YXkgdGhyb3VnaCwgdGhhdCBpdCB3b3VsZCBob2xkLicKClRvbWFzIHJhaXNlcyBhbiBleWVicm93LCBhbXVzZWQuICdDb25maWRlbmNlLCB0aGlzIGxhdGUgaW4gdGhlIGpvdXJuZXkuIEknbGwgdGFrZSBpdC4gU2FtYXJrYW5kIG5leHQsIHRoZW4uIFByb3Blcmx5LCBmaW5hbGx5LCBmb3IgcmVhbCB0aGlzIHRpbWUuJw==',
            'ending' => true,
        ],
        '8_end_nervous' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIHdhcyBuZXJ2b3VzIHRvbywnIHlvdSBhZG1pdCwgYW5kIFRvbWFzLCByZWxpZXZlZCB0byBoZWFyIGl0LCBsYXVnaHMgcHJvcGVybHkgZm9yIHRoZSBmaXJzdCB0aW1lIGluIGRheXMuICdHb29kLiBXb3VsZCd2ZSB3b3JyaWVkIGFib3V0IHlvdSBpZiB5b3Ugd2VyZW4ndC4gTWVhbnMgeW91IGFjdHVhbGx5IHVuZGVyc3Rvb2Qgd2hhdCB3YXMgcmlkaW5nIG9uIGl0LicKClRoZSBjYXJhdmFuIHR1cm5zIHRvd2FyZCBTYW1hcmthbmQgYXQgbGFzdCwgdGhlIHRlc3RlZCwgcHJvdmVuIHNlYWwgcmlkaW5nIHNlY3VyZSBhbmQgY29uZmlybWVkIGluIHRoZSBjYXNlLCB0aGUgdmVyeSBsYXN0IHN0cmV0Y2ggb2YgYSB2ZXJ5IGxvbmcgcm9hZCBmaW5hbGx5LCBnZW51aW5lbHkgdW5kZXJ3YXku',
            'ending' => true,
        ],
    ],
];
