<?php
return [
    'id'    => 13,
    'title' => 'Settle It, If You Can',
    'color' => '#9A8858',

    'pages' => [
        '1_start' => [
            'prose'  => 'QWxlcHBvIHJpc2VzIGFyb3VuZCBpdHMgYW5jaWVudCBjaXRhZGVsLCBvbmUgb2YgdGhlIG9sZGVzdCBjb250aW51b3VzbHkgaW5oYWJpdGVkIHRyYWRpbmcgY2l0aWVzIGFsb25nIHRoZSB3aG9sZSByb3V0ZSwgaXRzIGNhcmF2YW5zZXJhaXMgc3RpbGwgc3RhbmRpbmcgYXMgd29ya2luZyBtb251bWVudHMgdG8gY2VudHVyaWVzIG9mIGhvc3RlZCB0cmF2ZWxsZXJzLiBUb21hcyBtb3ZlcyB0aHJvdWdoIHRoZSBvbGQgcXVhcnRlciB3aXRoIHJlYWwgZmFtaWxpYXJpdHksIHBvaW50aW5nIG91dCBkZXRhaWxzIG9ubHkgZGVjYWRlcyBvZiBwYXNzaW5nIHRocm91Z2ggd291bGQgbm90aWNlLgoKVHdvIHdheXMgaW50byB0aGUgY2l0eSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIGNpdGFkZWwncyBzaGFkb3csIGRpcmVjdCBidXQgc3RlZXAsIG9yIGFyb3VuZCBieSB0aGUgb2xkIGNhcmF2YW5zZXJhaSBkaXN0cmljdCwgbG9uZ2VyIGJ1dCBmbGF0dGVyIGFuZCBjb25zaWRlcmFibHkgZWFzaWVyIHdhbGtpbmcu',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgY2l0YWRlbCdzIHNoYWRvdw==', 'next' => '2_citadel'],
                ['text' => 'VGFrZSB0aGUgY2FyYXZhbnNlcmFpIGRpc3RyaWN0IHJvdXRl', 'next' => '2_caravanserai'],
            ],
        ],
        '2_citadel' => [
            'prose'  => 'VGhlIHJvdXRlIGJlbmVhdGggdGhlIGNpdGFkZWwgaXMgc3RlZXAsIHRoZSBhbmNpZW50IGZvcnRyZXNzIGxvb21pbmcgb3ZlcmhlYWQgdGhlIHdob2xlIGNsaW1iLCBnZW51aW5lbHkgaW1wb3NpbmcgZXZlbiBhZnRlciBjZW50dXJpZXMgb2YgcmVsYXRpdmUgcGVhY2UuIFlvdSBhcnJpdmUgYXQgdGhlIGNhcmF2YW5zZXJhaSBzbGlnaHRseSB3aW5kZWQsIHByb3Blcmx5IGltcHJlc3NlZCBieSB0aGUgc2hlZXIgc2NhbGUgb2YgdGhlIG9sZCBkZWZlbnNpdmUgYXJjaGl0ZWN0dXJlLgoKVG9tYXMsIHVuYm90aGVyZWQgYnkgdGhlIGNsaW1iLCBzZWVtcyBtb3N0bHkgYW11c2VkIGJ5IHlvdXIgZWZmb3J0Lg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGNhcmF2YW5zZXJhaQ==', 'next' => '3_shared'],
            ],
        ],
        '2_caravanserai' => [
            'prose'  => 'VGhlIGNhcmF2YW5zZXJhaSBkaXN0cmljdCByb3V0ZSBpcyBmbGF0dGVyLCBlYXNpZXIsIHdpbmRpbmcgcGFzdCB3b3JraW5nIHN0YWJsZXMgYW5kIHN0b3JhZ2UgeWFyZHMgdGhhdCBoYXZlIGhvc3RlZCB0cmF2ZWxsaW5nIG1lcmNoYW50cyBmb3IgY2VudHVyaWVzIHdpdGhvdXQgbXVjaCB2aXNpYmxlIGNoYW5nZSB0byB0aGUgYmFzaWMgYXJyYW5nZW1lbnQuIEl0J3MgYSBnZW50bGVyIHdhbGssIGdpdmluZyB5b3UgcmVhbCB0aW1lIHRvIGFwcHJlY2lhdGUgdGhlIHdob2xlIHByYWN0aWNhbCBlY29zeXN0ZW0gYnVpbHQgdXAgYXJvdW5kIGhvc3RpbmcgdHJhdmVsbGVycyBwcm9wZXJseS4KCllvdSBhcnJpdmUgcmVsYXhlZCwgYW5kIGNvbnNpZGVyYWJseSBiZXR0ZXIgaW5mb3JtZWQgYWJvdXQgaG93IGNhcmF2YW5zZXJhaXMgYWN0dWFsbHkgZnVuY3Rpb24gdGhhbiB0aGUgY2l0YWRlbCByb3V0ZSB3b3VsZCBoYXZlIGxlZnQgeW91Lg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGNhcmF2YW5zZXJhaQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WW91IGFycml2ZSBpbiB0aGUgbWlkZGxlIG9mIHdoYXQncyBjbGVhcmx5IGEgbG9uZy1ydW5uaW5nIGZhbWlseSBhcmd1bWVudCDigJQgdHdvIGJyb3RoZXJzLCBib3RoIHdlbGwgaW50byBtaWRkbGUgYWdlLCBkaXNwdXRpbmcgc29tZXRoaW5nIHdpdGggdGhlIHBhcnRpY3VsYXIgd2VhcnkgZmFtaWxpYXJpdHkgb2YgcGVvcGxlIHdobyd2ZSBoYWQgdGhlIGV4YWN0IHNhbWUgYXJndW1lbnQgbWFueSB0aW1lcyBiZWZvcmUuIFRoZSBlbGRlciwgWXVzdWYsIGV4cGxhaW5zIG9uY2UgaGUgbm90aWNlcyB5b3U6ICdPdXIgZ3JhbmRmYXRoZXIga2VwdCBhIHdlZGdlLCBZc29sZGUncywgZm9yIHNhZmVrZWVwaW5nLiBNeSBicm90aGVyIHRoaW5rcyB3ZSBzaG91bGQgaGF2ZSByZXR1cm5lZCBpdCBkZWNhZGVzIGFnby4gSSB0aGluayBpdCdzIGVhcm5lZCBpdHMgcGxhY2UgaGVyZSwgYXMgcGFydCBvZiB0aGlzIGNhcmF2YW5zZXJhaSdzIG93biBoaXN0b3J5IG5vdy4nCgonWW91J3ZlIGFycml2ZWQgYXQgZXhhY3RseSB0aGUgd3Jvbmcg4oCUIG9yIHBlcmhhcHMgZXhhY3RseSB0aGUgcmlnaHQg4oCUIG1vbWVudCwnIHRoZSB5b3VuZ2VyIGJyb3RoZXIsIEthcmltLCBhZGRzIGRyeWx5LiAnU2V0dGxlIGl0LCBpZiB5b3UgY2FuLiBXZSBjbGVhcmx5IGNhbid0Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'SGVhciBib3RoIHNpZGVzIHByb3Blcmx5', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WXVzdWYgYXJndWVzIHRoZSB3ZWRnZSBoYXMgYmVjb21lIGdlbnVpbmVseSBwYXJ0IG9mIHRoZSBjYXJhdmFuc2VyYWkncyBvd24gc3RvcnksIGRpc3BsYXllZCBhbmQgZGlzY3Vzc2VkIGZvciB0d28gZ2VuZXJhdGlvbnMsIGEgcGllY2Ugb2Ygc2hhcmVkIGhpc3Rvcnkgbm93IGFzIG11Y2ggYXMgYSBkZWJ0LXRva2VuLiBLYXJpbSBhcmd1ZXMgaW50ZW50IG1hdHRlcnMgbW9yZSB0aGFuIGFjY3VtdWxhdGVkIHNlbnRpbWVudCDigJQgaXQgd2FzIGFsd2F5cyBtZWFudCB0byB0cmF2ZWwgb24gZXZlbnR1YWxseSwgYW5kIGhvbGRpbmcgaXQgaG9zdGFnZSB0byBub3N0YWxnaWEgZGlzaG9ub3VycyB0aGUgdmVyeSBwdXJwb3NlIGl0IHdhcyBsZWZ0IGhlcmUgZm9yLgoKQm90aCwgeW91IHJlYWxpc2UsIGhhdmUgYSBnZW51aW5lbHkgZmFpciBwb2ludC4gWW91J2xsIG5lZWQgdG8gYWN0dWFsbHkgcGljayBhIHNpZGUsIGhvbmVzdGx5LCByYXRoZXIgdGhhbiBzaW1wbHkgc3BsaXR0aW5nIHRoZSBkaWZmZXJlbmNlLg==',
            'choices' => [
                ['text' => 'U2lkZSB3aXRoIGhvbm91cmluZyB0aGUgZmFtaWx5J3MgYWNjdW11bGF0ZWQgaGlzdG9yeQ==', 'next' => '5_history'],
                ['text' => 'U2lkZSB3aXRoIGhvbm91cmluZyB0aGUgb3JpZ2luYWwgaW50ZW50', 'next' => '5_intent'],
            ],
        ],
        '5_history' => [
            'prose'  => 'WW91IGFyZ3VlIGZvciB0aGUgaGlzdG9yeSDigJQgdGhhdCB0d28gZ2VuZXJhdGlvbnMgb2YgY2FyZWZ1bCBrZWVwaW5nIGhhcyBnZW51aW5lbHkgbWFkZSB0aGUgd2VkZ2UgcGFydCBvZiB0aGlzIGNhcmF2YW5zZXJhaSdzIG93biBpZGVudGl0eSwgYW5kIHRoYXQgaGlzdG9yeSwgb25jZSBtYWRlLCBkZXNlcnZlcyByZWFsIHJlc3BlY3QgZXZlbiB3aGVuIGl0IGNvbXBsaWNhdGVzIGEgc2ltcGxlciBvcmlnaW5hbCBwdXJwb3NlLgoKWXVzdWYgbG9va3MgdmluZGljYXRlZC4gS2FyaW0sIHRvIGhpcyBjcmVkaXQsIGNvbnNpZGVycyB0aGUgYXJndW1lbnQgc2VyaW91c2x5IHJhdGhlciB0aGFuIHNpbXBseSBkaWdnaW5nIGluIGZ1cnRoZXIuICdGYWlyIHBvaW50LCcgaGUgYWRtaXRzLCBncnVkZ2luZ2x5LiAnRG9lc24ndCBtZWFuIEkgZnVsbHkgYWdyZWUuIEJ1dCBpdCdzIGZhaXIuJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhleSBkZWNpZGU=', 'next' => '6_shared'],
            ],
        ],
        '5_intent' => [
            'prose'  => 'WW91IGFyZ3VlIGZvciB0aGUgb3JpZ2luYWwgaW50ZW50IOKAlCB0aGF0IFlzb2xkZSBsZWZ0IGl0IGhlcmUgc3BlY2lmaWNhbGx5IG1lYW5pbmcgZm9yIGl0IHRvIHRyYXZlbCBvbiBldmVudHVhbGx5LCBhbmQgdGhhdCB0d28gZ2VuZXJhdGlvbnMgb2YgZm9uZCBrZWVwaW5nLCBob3dldmVyIGdlbnVpbmUsIHdhcyBhbHdheXMgbWVhbnQgdG8gYmUgdGVtcG9yYXJ5IGN1c3RvZHkgcmF0aGVyIHRoYW4gcGVybWFuZW50IG93bmVyc2hpcC4KCkthcmltIGxvb2tzIHZpbmRpY2F0ZWQuIFl1c3VmLCB0byBoaXMgY3JlZGl0LCBjb25zaWRlcnMgdGhlIGFyZ3VtZW50IHNlcmlvdXNseSByYXRoZXIgdGhhbiBzaW1wbHkgZGlnZ2luZyBpbiBmdXJ0aGVyLiAnRmFpciBwb2ludCwnIGhlIGFkbWl0cywgZ3J1ZGdpbmdseS4gJ0RvZXNuJ3QgbWVhbiBJIGZ1bGx5IGFncmVlLiBCdXQgaXQncyBmYWlyLic=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhleSBkZWNpZGU=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB5b3UgYXJndWVkIGl0LCB0aGUgYnJvdGhlcnMgZmluYWxseSwgcHJvcGVybHkgYWdyZWUg4oCUIGdlbnVpbmVseSBzZXR0bGluZyBzb21ldGhpbmcgdGhhdCdzIGNsZWFybHkgbmVlZGVkIHNldHRsaW5nIGZvciB5ZWFycywgcmVnYXJkbGVzcyBvZiB3aGljaCBzaWRlIGFjdHVhbGx5ICd3b24uJyBZdXN1ZiBwcm9kdWNlcyB0aGUgd2VkZ2UsIGFuZCBib3RoIGJyb3RoZXJzIGhhbmQgaXQgb3ZlciB0b2dldGhlciwgYSBzbWFsbCwgc3ltYm9saWMgZ2VzdHVyZSBvZiBmaW5hbGx5LCBqb2ludGx5IGNsb3NpbmcgdGhlIGFyZ3VtZW50LgoKJ1RoYW5rIHlvdSwnIEthcmltIHNheXMsIGFuZCBtZWFucyBpdCwgJ2ZvciBhY3R1YWxseSB0YWtpbmcgYSBzaWRlIGluc3RlYWQgb2YganVzdCB0cnlpbmcgdG8gcGxlYXNlIHVzIGJvdGguIFRoYXQgd291bGQgaGF2ZSBzZXR0bGVkIG5vdGhpbmcuJw==',
            'choices' => [
                ['text' => 'QWNjZXB0IHRoZSB3ZWRnZSBhbmQgc3RhcnQgYmFjaw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIEFsZXBwbydzIGFuY2llbnQgY2l0YWRlbCBjYXRjaGluZyB0aGUgbGFzdCBvZiB0aGUgZGF5J3MgbGlnaHQgYmVoaW5kIHlvdSwgdGhlIGNhcmF2YW5zZXJhaSBzZXR0bGluZyBpbnRvIGl0cyBldmVuaW5nIHJvdXRpbmUsIG9uZSBsb25nLXJ1bm5pbmcgZmFtaWx5IGFyZ3VtZW50IGZpbmFsbHksIHByb3Blcmx5IHJlc29sdmVkLgoKVG9tYXMsIHdhbGtpbmcgYmVzaWRlIHlvdSwgbG9va3MgdGhvdWdodGZ1bGx5IGJhY2sgYXQgdGhlIG9sZCBjaXRhZGVsLiAnU3RyYW5nZSwgaG93IG1hbnkgb2YgdGhlc2Ugc3RvcHMgdHVybiBvdXQgdG8gbmVlZCBzb21lb25lIGZyb20gb3V0c2lkZSBqdXN0IHRvIHNldHRsZSBzb21ldGhpbmcgdGhlIHBlb3BsZSBpbnZvbHZlZCBjb3VsZG4ndCBtYW5hZ2UgdGhlbXNlbHZlcy4n',
            'choices' => [
                ['text' => 'U2F5IHRoYXQgbWlnaHQgYmUgd29ydGggc29tZXRoaW5nIGluIGl0c2VsZg==', 'next' => '8_end_worth'],
                ['text' => 'U2F5IHlvdSBob3BlIHRoZXkgZG9uJ3QganVzdCBzdGFydCBhcmd1aW5nIGFib3V0IHNvbWV0aGluZyBlbHNl', 'next' => '8_end_hope'],
            ],
        ],
        '8_end_worth' => [
            'prose'  => 'J1RoYXQgbWlnaHQgYmUgd29ydGggc29tZXRoaW5nIGluIGl0c2VsZiwgaG9uZXN0bHksJyB5b3Ugc2F5LCB0aGlua2luZyBhYm91dCBpdCBwcm9wZXJseS4gJ0FuIG91dHNpZGUgcGVyc3BlY3RpdmUsIGFycml2aW5nIGF0IGV4YWN0bHkgdGhlIHJpZ2h0IG1vbWVudCwgaXNuJ3Qgbm90aGluZy4gTWlnaHQgYmUgcGFydCBvZiB3aGF0IHRoaXMgd2hvbGUgam91cm5leSdzIGFjdHVhbGx5IGZvciwgYWxvbmdzaWRlIHRoZSB3ZWRnZXMgdGhlbXNlbHZlcy4nCgpUb21hcyBub2RzIHNsb3dseS4gJ1lzb2xkZSBwcm9iYWJseSB1bmRlcnN0b29kIHRoYXQsIGNob29zaW5nIHRoZSByb3V0ZSB0aGUgd2F5IHNoZSBkaWQuIFNvbWUgdGhpbmdzIG9ubHkgZ2V0IHNldHRsZWQgYnkgc29tZW9uZSBwYXNzaW5nIHRocm91Z2ggd2l0aCBubyBzdGFrZSBpbiB0aGUgb2xkIGFyZ3VtZW50Lic=',
            'ending' => true,
        ],
        '8_end_hope' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGhvcGUgdGhleSBkb24ndCBqdXN0IGZpbmQgc29tZXRoaW5nIGVsc2UgdG8gYXJndWUgYWJvdXQsJyB5b3Ugc2F5LCBvbmx5IGhhbGYtam9raW5nLCB3YXRjaGluZyB0aGUgY2FyYXZhbnNlcmFpIHJlY2VkZSBiZWhpbmQgeW91LiBTb21lIGZhbWlseSBkeW5hbWljcywgeW91IHN1c3BlY3QsIGFyZW4ndCBxdWl0ZSBzbyBlYXNpbHkgcmVzb2x2ZWQgYnkgb25lIG91dHNpZGUgZGVjaXNpb24sIGhvd2V2ZXIgZ2VudWluZWx5IHdlbGNvbWVkLgoKVG9tYXMgbGF1Z2hzLCByZWFsIGFuZCB3YXJtLiAnUHJvYmFibHkgd2lsbCwgZXZlbnR1YWxseS4gQnJvdGhlcnMgZ2VuZXJhbGx5IGRvLiBCdXQgdGhpcyBvbmUncyBzZXR0bGVkLCBhdCBsZWFzdCwgYW5kIHRoYXQncyB3b3J0aCBzb21ldGhpbmcgcmVnYXJkbGVzcyBvZiB3aGF0ZXZlciBjb21lcyBuZXh0IGZvciB0aGVtLic=',
            'ending' => true,
        ],
    ],
];
