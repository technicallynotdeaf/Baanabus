<?php
return [
    'id'    => 11,
    'title' => 'Doing Real Work Again',
    'color' => '#6A7A9A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEhpbmR1IEt1c2ggcmlzZXMgaW4gYSBnZW51aW5lIG1hemUgb2YgaGlnaCwgcmVtb3RlIHZhbGxleXMsIHBlYWtzIGNyb3dkaW5nIGNsb3NlIGVub3VnaCB0b2dldGhlciB0aGF0IHRoZSBza3kgaXRzZWxmIHNlZW1zIHRvIHNocmluayB0byBuYXJyb3cgc3RyaXBzIG92ZXJoZWFkLiBHcmV0YSBzdHVkaWVzIHRoZSBtYXAgd2l0aCByZWFsIGNvbmNlbnRyYXRpb24gYmVmb3JlIGZpbmFsbHkgc3BlYWtpbmcuICdWaWxsYWdlIHdlIHdhbnQganVzdCBoYWQgYSByb2Nrc2xpZGUgY2xvc2UgdGhlIHVzdWFsIHJvdXRlLiBUd28gd2F5cyByb3VuZCBpdCDigJQgdGhlIGxvbmcgd2F5LCBzYWZlIGJ1dCBzbG93LCBvciBhIHNob3J0ZXIgcm91dGUgYWNyb3NzIGEgc2xvcGUgdGhhdCdzIHByb2JhYmx5IHN0aWxsIHNldHRsaW5nLic=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbG9uZywgc2FmZSByb3V0ZQ==', 'next' => '2_long'],
                ['text' => 'VGFrZSB0aGUgc2hvcnRlciwgcmlza2llciByb3V0ZQ==', 'next' => '2_short'],
            ],
        ],
        '2_long' => [
            'prose'  => 'VGhlIGxvbmcgcm91dGUgYWRkcyBtb3N0IG9mIGEgZGF5LCB3aW5kaW5nIHdlbGwgY2xlYXIgb2YgdGhlIHNsaWRlIHpvbmUgdGhyb3VnaCB2YWxsZXlzIHRoYXQgZmVlbCBnZW51aW5lbHkgdW50b3VjaGVkIGJ5IGFueXRoaW5nIGJleW9uZCB0aGUgb2NjYXNpb25hbCBoZXJkaW5nIGZhbWlseSdzIHNlYXNvbmFsIHBhc3NhZ2UuIEl0J3MgdGlyaW5nLCB1bmdsYW1vcm91cyB3YWxraW5nLCBhbmQgZW50aXJlbHkgd2l0aG91dCBpbmNpZGVudCwgd2hpY2ggYWZ0ZXIgdGhpcyB3aG9sZSB0cmlwJ3MgYWNjdW11bGF0ZWQgc21hbGwgZGFuZ2VycyBmZWVscyBsaWtlIGl0cyBvd24ga2luZCBvZiBsdXh1cnkuCgpZb3UgYXJyaXZlIGF0IHRoZSB2aWxsYWdlIHRpcmVkLCB1bmh1cnQsIGFuZCBncmF0ZWZ1bCBmb3IgdGhlIGJvcmluZyBhZnRlcm5vb24u',
            'choices' => [
                ['text' => 'RmluZCB0aGUgZ3VpZGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '2_short' => [
            'prose'  => 'VGhlIHNob3J0ZXIgcm91dGUgY3Jvc3NlcyBkaXJlY3RseSBiZW5lYXRoIHRoZSBzbGlkZSB6b25lLCBsb29zZSBzY3JlZSBzdGlsbCB2aXNpYmx5IHNldHRsaW5nIHVuZGVyIGNhcmVmdWwgZmVldCwgR3JldGEgdGVzdGluZyBlYWNoIHNlY3Rpb24gYWhlYWQgYmVmb3JlIGNvbW1pdHRpbmcgZWl0aGVyIG9mIHlvdXIgd2VpZ2h0IHRvIGl0LiBJdCdzIHNsb3cgZ29pbmcgZGVzcGl0ZSBiZWluZyB0aGUgJ3Nob3J0JyByb3V0ZSwgZXZlcnkgc3RlcCBkZWxpYmVyYXRlLCBhbmQgeW91IGJvdGggYnJlYXRoZSBjb25zaWRlcmFibHkgZWFzaWVyIG9uY2UgeW91J3JlIHByb3Blcmx5IGNsZWFyIG9mIHRoZSB1bnN0YWJsZSBncm91bmQuCgpZb3UgYXJyaXZlIGF0IHRoZSB2aWxsYWdlIHdpdGggaG91cnMgdG8gc3BhcmUgYW5kIG5lcnZlcyBjb25zaWRlcmFibHkgbW9yZSB0ZXN0ZWQgdGhhbiB5b3VyIGxlZ3Mu',
            'choices' => [
                ['text' => 'RmluZCB0aGUgZ3VpZGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGd1aWRlIGZhbWlseSwgd2VsbCBrbm93biBpbiB0aGlzIHZhbGxleSBmb3IgZ2VuZXJhdGlvbnMgb2YgbW91bnRhaW5lZXJpbmcgc3VwcG9ydCB3b3JrLCByZWNlaXZlcyB5b3Ugd2l0aCByZWFsIHdhcm10aCBvbmNlIHlvdXIgZXJyYW5kJ3MgZXhwbGFpbmVkLiBUaGUgcGF0cmlhcmNoLCBSYXNoaWQsIHJlbWVtYmVycyBBdWd1c3RpbiBzcGVjaWZpY2FsbHkg4oCUICdhIGNhcmVmdWwgbWFuLCBtZXRob2RpY2FsLCB0aG91Z2ggbm90IGFsd2F5cyBjYXJlZnVsIHdpdGggaGltc2VsZicg4oCUIGFuZCBjb25maXJtcyB0aGUgZXllcGllY2UgaGFzIGJlZW4ga2VwdCBzYWZlIGluIHRoZSBmYW1pbHkncyBvd24gY29sbGVjdGlvbiBvZiBjbGllbnQgbWVtZW50b3MgZXZlciBzaW5jZS4KCidJdCdzIG5vdCBzaW1wbHkgbWluZSB0byBnaXZlIGF3YXksIHRob3VnaCwnIGhlIHNheXMuICdFdmVyeSBwaWVjZSBpbiB0aGF0IGNvbGxlY3Rpb24gd2FzIGVhcm5lZCBieSBzb21ldGhpbmcg4oCUIGEgc2VydmljZSwgYSBnZW51aW5lIGtpbmRuZXNzLCBhIGRlYnQgcHJvcGVybHkgc2V0dGxlZC4gWW91J2xsIG5lZWQgdG8gYWRkIHNvbWV0aGluZyByZWFsIHRvIGl0IGJlZm9yZSBJIGNhbiBob25lc3RseSBoYW5kIHRoaXMgb25lIG92ZXIuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGUgbmVlZHM=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'UmFzaGlkJ3MgZmFtaWx5LCBpdCB0dXJucyBvdXQsIGhhcyB0d28gaW1tZWRpYXRlIG5lZWRzOiBhIHByb3BlciBzdXJ2ZXkgb2YgdGhlIG5ldyByb2Nrc2xpZGUncyBleHRlbnQsIHVzZWZ1bCBmb3Igd2FybmluZyBmdXR1cmUgdHJhdmVsbGVycyBhbmQgZm9yIHRoZSBmYW1pbHkncyBvd24gZ3VpZGluZyB3b3JrLCBvciBoZWxwIHJlcGFpcmluZyBzdG9ybSBkYW1hZ2UgdG8gdGhlIGd1ZXN0aG91c2Ugcm9vZiBiZWZvcmUgd2ludGVyIHByb3Blcmx5IHNldHMgaW4uCgonRWl0aGVyJ3MgcmVhbCB3b3JrLCByZWFsIGhlbHAsJyBoZSBzYXlzLiAnUGljayB3aGljaGV2ZXIgeW91ciBwYXJ0aWN1bGFyIHNraWxscyBhY3R1YWxseSBzdWl0Lic=',
            'choices' => [
                ['text' => 'U3VydmV5IHRoZSByb2Nrc2xpZGU=', 'next' => '5_survey'],
                ['text' => 'SGVscCByZXBhaXIgdGhlIGd1ZXN0aG91c2Ugcm9vZg==', 'next' => '5_roof'],
            ],
        ],
        '5_survey' => [
            'prose'  => 'U3VydmV5aW5nIHRoZSByb2Nrc2xpZGUgcHJvcGVybHkgbWVhbnMgcHV0dGluZyBBdWd1c3RpbidzIG93biBpbnN0cnVtZW50IHRvIGdlbnVpbmUsIHByYWN0aWNhbCB1c2UgZm9yIHRoZSBmaXJzdCB0aW1lIHRoaXMgd2hvbGUgdHJpcCDigJQgbWVhc3VyaW5nIGV4dGVudCwgZXN0aW1hdGluZyBzdGFiaWxpdHksIHByb2R1Y2luZyBzb21ldGhpbmcgUmFzaGlkJ3MgZmFtaWx5IGNhbiBhY3R1YWxseSByZWx5IG9uIGZvciBmdXR1cmUgcm91dGUgcGxhbm5pbmcuIEl0IGZlZWxzIGRpZmZlcmVudCwgZG9pbmcgY2FyZWZ1bCBzdXJ2ZXkgd29yayB3aXRoIHBpZWNlcyBvZiB0aGUgdmVyeSBpbnN0cnVtZW50IHlvdSdyZSB0cnlpbmcgdG8gY29tcGxldGUuCgpCeSB0aGUgZW5kLCB5b3UndmUgZ290IGEgcHJvcGVyLCB1c2FibGUgcmVjb3JkLCBhbmQgYSBzdHJhbmdlLCBzYXRpc2Z5aW5nIHNlbnNlIHRoYXQgdGhlIGNhc2UncyBpbmNvbXBsZXRlIGNvbnRlbnRzIGFyZSBhbHJlYWR5IHdvcnRoIHNvbWV0aGluZywgdW5maW5pc2hlZCBvciBub3Qu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgUmFzaGlkIHNheXM=', 'next' => '6_shared'],
            ],
        ],
        '5_roof' => [
            'prose'  => 'UmVwYWlyaW5nIHN0b3JtIGRhbWFnZSBvbiBhIGd1ZXN0aG91c2Ugcm9vZiBhdCB0aGlzIGFsdGl0dWRlIGlzIGNvbGQsIGV4YWN0aW5nLCBvY2Nhc2lvbmFsbHkgYWxhcm1pbmcgd29yaywgdGVzdGluZyB5b3VyIGJhbGFuY2UgYW5kIHlvdXIgcGF0aWVuY2UgYWJvdXQgZXF1YWxseS4gUmFzaGlkJ3Mgc29ucyB3b3JrIGFsb25nc2lkZSB5b3Ugd2l0aCB0aGUgZWFzeSBjb21wZXRlbmNlIG9mIHBlb3BsZSB3aG8ndmUgZG9uZSB0aGlzIGV4YWN0IGpvYiBtYW55IHRpbWVzIGJlZm9yZSwgY29ycmVjdGluZyB5b3VyIHRlY2huaXF1ZSB3aXRob3V0IG11Y2ggY2VyZW1vbnkuCgpCeSB0aGUgZW5kLCB0aGUgcm9vZidzIHNvdW5kIGFnYWluIGJlZm9yZSB0aGUgd2VhdGhlciBwcm9wZXJseSB0dXJucywgYW5kIHNvbWV0aGluZyBpbiB0aGUgc2hhcmVkIGxhYm91ciBoYXMgZWFybmVkIHlvdSBtb3JlIGdlbnVpbmUgdHJ1c3QgdGhhbiBtZXJlIGNvbnZlcnNhdGlvbiB3b3VsZCBoYXZlLg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgUmFzaGlkIHNheXM=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'UmFzaGlkIGluc3BlY3RzIHRoZSBmaW5pc2hlZCB3b3JrIOKAlCBzdXJ2ZXkgb3Igcm9vZiwgd2hpY2hldmVyIHlvdSBkaWQg4oCUIHdpdGggcmVhbCBzYXRpc2ZhY3Rpb24gYmVmb3JlIGZpbmFsbHkgYnJpbmdpbmcgb3V0IHRoZSBleWVwaWVjZSwgc21hbGwgYW5kIHByZWNpc2VseSBtYWRlLCBrZXB0IHNhZmUgaW4gYSBjYXNlIG9mIGl0cyBvd24gZm9yIHllYXJzLgoKJ0hlJ2QgYmUgZ2xhZCwgSSB0aGluaywgdGhhdCBpdCBlbmRlZCB1cCBkb2luZyByZWFsIHdvcmsgYWdhaW4gaW5zdGVhZCBvZiBqdXN0IHNpdHRpbmcgb24gYSBzaGVsZiwnIFJhc2hpZCBzYXlzLCBoYW5kaW5nIGl0IG92ZXIuICdUaGF0IHdhcyBhbHdheXMgbW9yZSBoaXMgd2F5IHRoYW4gbWluZSB0byBzYXksIGJ1dCBJIGJlbGlldmUgaXQncyB0cnVlIHJlZ2FyZGxlc3MuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0b3dhcmQgdGhlIENvbnRvdXIgYnkgd2hpY2hldmVyIHJvdXRlIHlvdSBkaWRuJ3QgdGFrZSBvbiB0aGUgd2F5IGluLCB0aGUgSGluZHUgS3VzaCdzIHRpZ2h0LCBjcm93ZGVkIHBlYWtzIG5hcnJvd2luZyB0aGUgc2t5IG92ZXJoZWFkIHRoZSB3aG9sZSB3YXksIHRoZSBleWVwaWVjZSByaWRpbmcgc2VjdXJlIGluIHRoZSBjYXNlIOKAlCBhbiBlaWdodGggcGllY2UgcmVjb3ZlcmVkLCB0aGUgaW5zdHJ1bWVudCdzIHNoYXBlIGdyb3dpbmcgY2xlYXJlciB3aXRoIGV2ZXJ5IHN0b3AuCgpHcmV0YSwgdGVzdGluZyB0aGUgZXllcGllY2UncyBmaXQgYWdhaW5zdCB0aGUgcmVzdCBvZiB0aGUgYXNzZW1ibHksIGxvb2tzIGdlbnVpbmVseSBwbGVhc2VkIGZvciB0aGUgZmlyc3QgdGltZSBpbiBhIHdoaWxlLiAnR2V0dGluZyB0aGVyZS4gUHJvcGVybHkgZ2V0dGluZyB0aGVyZSBub3cuJw==',
            'choices' => [
                ['text' => 'QXNrIGhlciBob3cgbXVjaCBmdXJ0aGVyIHRoZSBsaXN0IGFjdHVhbGx5IGdvZXM=', 'next' => '8_end_ask'],
                ['text' => 'SnVzdCBlbmpveSB0aGUgbW9tZW50IHdpdGhvdXQgY291bnRpbmc=', 'next' => '8_end_enjoy'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzaywgYW5kIEdyZXRhIGFjdHVhbGx5IGNvdW50cyBvbiBoZXIgZmluZ2Vycywgd29ya2luZyB0aHJvdWdoIHRoZSByZW1haW5pbmcgbmFtZXMgb24gdGhlIGxpc3Qgd2l0aCByZWFsIGZvY3VzLiAnTW9yZSB0aGFuIGhhbGYgc3RpbGwgdG8gZ28sIGlmIEknbSBob25lc3QuIEJ1dCBtb3JlIHRoYW4gaGFsZiBkb25lIHRvbywgbm93LiBUaGF0J3Mgd29ydGggc29tZXRoaW5nLicKCkl0J3Mgbm90IGEgc21hbGwgdGFzaywgd2hpY2hldmVyIHdheSB5b3Ugc2xpY2UgaXQuIEJ1dCBoZWFyaW5nIGl0IGNvdW50ZWQgb3V0IGxvdWQsIHByb3Blcmx5LCBtYWtlcyB0aGUgcmVtYWluaW5nIGRpc3RhbmNlIGZlZWwgbGlrZSBzb21ldGhpbmcgd2l0aCBhbiBhY3R1YWwgc2hhcGUsIHJhdGhlciB0aGFuIGp1c3QgYW4gZW5kbGVzcyBvcGVuIHF1ZXN0aW9uLg==',
            'ending' => true,
        ],
        '8_end_enjoy' => [
            'prose'  => 'WW91IGRvbid0IGFzaywgZGVjaWRpbmcgdGhlIHJlbWFpbmluZyBkaXN0YW5jZSBjYW4gc3RheSBjb21mb3J0YWJseSB2YWd1ZSBhIGxpdHRsZSBsb25nZXIsIGFuZCBzaW1wbHkgZW5qb3kgdGhlIG1vbWVudCBpbnN0ZWFkIOKAlCB0aGUgQ29udG91ciBsaWZ0aW5nIG9mZiwgdGhlIEhpbmR1IEt1c2gncyBjcm93ZGVkIHBlYWtzIGZhbGxpbmcgYXdheSBiZWxvdywgb25lIG1vcmUgcGllY2Ugb2YgYSBsaWZlJ3MgdW5maW5pc2hlZCB3b3JrIHByb3Blcmx5LCBob25lc3RseSByZWNvdmVyZWQuCgpDb3JiaWUsIGRlbGlnaHRlZCBieSB0aGUgZXllcGllY2UncyBnZW51aW5lIG9wdGljYWwgcHJvcGVydGllcywgc3BlbmRzIGEgc29saWQgdGVuIG1pbnV0ZXMgdHJ5aW5nIHRvIGxvb2sgdGhyb3VnaCBpdCB0aGUgd3Jvbmcgd2F5IHJvdW5kIGJlZm9yZSBHcmV0YSBmaW5hbGx5LCBwYXRpZW50bHksIHNob3dzIGhpbSB3aGljaCBlbmQgYWN0dWFsbHkgd29ya3Mu',
            'ending' => true,
        ],
    ],
];
