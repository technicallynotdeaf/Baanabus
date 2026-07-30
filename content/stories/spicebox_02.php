<?php
return [
    'id'    => 2,
    'title' => 'Smelled, Not Measured',
    'color' => '#6A8A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TWFyc2VpbGxlIG9wZW5zIG9udG8gdGhlIE1lZGl0ZXJyYW5lYW4gaW4gYSBnZW51aW5lIHRhbmdsZSBvZiBvbGQgcG9ydCBhbmQgbmV3IGNpdHksIHRoZSBmaXNoIG1hcmtldCdzIG1vcm5pbmcgY2FsbHMgY2Fycnlpbmcgb3ZlciBoYXJib3VyIHdhdGVyIHRoYXQncyBzbWVsbGVkIGxpa2Ugc2FsdCBhbmQgZGllc2VsIGFuZCBzb21ldGhpbmcgZmFpbnRseSBzd2VldCBmb3IgYXMgbG9uZyBhcyBhbnlvbmUgY2FuIHJlbWVtYmVyLiBCcnVubyBuYXZpZ2F0ZXMgaXQgd2l0aCByZWFsLCBwcmFjdGlzZWQgZWFzZSwgUGltIHJpZGluZyBpbiBoaXMgY292ZXJlZCBiYXNrZXQgd2l0aCB2aXNpYmxlLCBtdWZmbGVkIGluZGlnbmF0aW9uIGF0IGJlaW5nIGNvbmZpbmVkLgoKVHdvIHdheXMgdG93YXJkIHRoZSBzcGljZSBtZXJjaGFudCBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIG9sZCBwb3J0IG1hcmtldCBpdHNlbGYsIGRlbnNlIGFuZCBsb3VkLCBvciBvdXQgcGFzdCB0aGUgZWRnZSBvZiB0b3duIHRvIGEgc21hbGwgaGVyYiBmYXJtIHRoYXQgc3VwcGxpZXMgdGhlIG1hcmtldCdzIGJldHRlciBzdGFsbHMu',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgb2xkIHBvcnQgbWFya2V0', 'next' => '2_market'],
                ['text' => 'SGVhZCBvdXQgdG8gdGhlIGhlcmIgZmFybQ==', 'next' => '2_farm'],
            ],
        ],
        '2_market' => [
            'prose'  => 'VGhlIG9sZCBwb3J0IG1hcmtldCBpcyBhIGdlbnVpbmUgYXNzYXVsdCBvZiBjb2xvdXIgYW5kIG5vaXNlLCBmaXNoIGFuZCBmbG93ZXJzIGFuZCBwcm9kdWNlIHN0YWxscyBwYWNrZWQgY2xvc2UgdW5kZXIgYSBza3kgYWxyZWFkeSBnb2luZyBoYXp5IHdpdGggbWlkZGF5IGhlYXQuIFlvdSBuYXZpZ2F0ZSBpdCBzbG93bHksIGFza2luZyBkaXJlY3Rpb25zIHR3aWNlLCBiZWZvcmUgZmluYWxseSBzcG90dGluZyBhIHNtYWxsIHN0YWxsIHN0YWNrZWQgd2l0aCBidW5kbGVkIGRyaWVkIGhlcmJzLgoKJ09sZCBNYXJjZWwncyBzdGFsbCwnIEJydW5vIHNheXMsIHJlY29nbmlzaW5nIGl0IGltbWVkaWF0ZWx5LiAnR29vZCBzaWduLiBIZSdzIGV4YWN0bHkgd2hvIHdlIHdhbnQuJw==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHN0YWxs', 'next' => '3_shared'],
            ],
        ],
        '2_farm' => [
            'prose'  => 'VGhlIGhlcmIgZmFybSBzaXRzIGp1c3QgcGFzdCB0aGUgY2l0eSdzIGVkZ2UsIHJvd3Mgb2YgdGh5bWUgYW5kIHJvc2VtYXJ5IGFuZCBsYXZlbmRlciBiYWtpbmcgZ2VudGx5IGluIHRoZSBzdW4sIHRoZSBhaXIgdGhpY2sgd2l0aCBhIGdyZWVuLCByZXNpbm91cyBzbWVsbCB0aGF0IGNsaW5ncyBwbGVhc2FudGx5IHRvIHlvdXIgY2xvdGhlcyB0aGUgd2hvbGUgdmlzaXQuIFRoZSBmYXJtZXIgcG9pbnRzIHlvdSBiYWNrIHRvd2FyZCB0aGUgb2xkIHBvcnQgbWFya2V0IGZvciB0aGUgYWN0dWFsIGJsZW5kaW5nLiAnTWFyY2VsJ3Mgc3RhbGwuIEhlIGRvZXMgdGhlIHJlYWwgd29yayB3aXRoIHdoYXQgd2UgZ3Jvdy4nCgpZb3UgaGVhZCBiYWNrIGludG8gdGhlIGNpdHkgd2l0aCBhIGZyZXNoIGJ1bmRsZSBvZiBjdXR0aW5ncyBhbmQgYSBjbGVhciBkZXN0aW5hdGlvbi4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHN0YWxs', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'TWFyY2VsLCB3ZWF0aGVyZWQgYW5kIHNoYXJwLWV5ZWQgYmVoaW5kIGhpcyBzdGFsbCBvZiBidW5kbGVkIGhlcmJzLCByZWNvZ25pc2VzIElyaXMncyBuYW1lIHRoZSBtb21lbnQgQnJ1bm8gc2F5cyBpdC4gJ1NoZSBjYW1lIGhlcmUgZm9yIHllYXJzLCcgaGUgc2F5cy4gJ0Fsd2F5cyBnb3QgdGhlIGJsZW5kIGEgbGl0dGxlIHdyb25nLCB0aG91Z2guIFRvbyBtdWNoIHRoeW1lLCBub3QgZW5vdWdoIG9mIHRoZSByZXN0LiBJIHRvbGQgaGVyIGV2ZXJ5IHRpbWUuIFNoZSBuZXZlciBxdWl0ZSBsaXN0ZW5lZC4nCgpIZSBzdHVkaWVzIHlvdS4gJ0hlcmJlcyBkZSBQcm92ZW5jZSBpc24ndCBtZWFzdXJlZCBwcm9wZXJseS4gSXQncyBzbWVsbGVkLiBJJ2xsIHRlYWNoIHlvdSwgaWYgeW91J3JlIGFjdHVhbGx5IHdpbGxpbmcgdG8gbGVhcm4gaXQgcmlnaHQsIG5vdCBqdXN0IGNvcHkgaGVyIG1pc3Rha2UuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWdyZWUgdG8gbGVhcm4gaXQgcHJvcGVybHk=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'TWFyY2VsIG9mZmVycyB0d28gd2F5cyBpbjogd29yayB0aHJvdWdoIGhpcyBvd24gY2FyZWZ1bCByYXRpb3MgZmlyc3QsIGxlYXJuaW5nIHRoZSBwcm9wZXIgcHJvcG9ydGlvbnMgYnkgbWVhc3VyZW1lbnQgYmVmb3JlIHRydXN0aW5nIHlvdXIgbm9zZSwgb3Igc2tpcCBzdHJhaWdodCB0byBzbWVsbGluZyBiYXRjaCBhZnRlciBiYXRjaCB1bnRpbCB5b3VyIG93biBzZW5zZSBvZiBpdCBkZXZlbG9wcyBkaXJlY3RseSwgdGhlIGhhcmRlciBidXQgbW9yZSBob25lc3Qgd2F5LgoKJ0VpdGhlciBnZXRzIHlvdSB0aGVyZSwnIGhlIHNheXMuICdPbmUncyBqdXN0IGZhc3RlciB0byBzdGFydCBhbmQgc2xvd2VyIHRvIGZpbmlzaC4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIHJhdGlvcyBmaXJzdA==', 'next' => '5_ratios'],
                ['text' => 'R28gc3RyYWlnaHQgdG8gc21lbGxpbmcgYmF0Y2hlcw==', 'next' => '5_smell'],
            ],
        ],
        '5_ratios' => [
            'prose'  => 'TGVhcm5pbmcgdGhlIHByb3BlciByYXRpb3MgZmlyc3QgaXMgbWV0aG9kaWNhbCwgZXhhY3Rpbmcgd29yaywgTWFyY2VsIGNvcnJlY3RpbmcgeW91ciBtZWFzdXJpbmcgaGFuZCBtb3JlIHRoYW4gb25jZSBiZWZvcmUgaGUncyBzYXRpc2ZpZWQgeW91IHVuZGVyc3RhbmQgdGhlIHByb3BvcnRpb25zIHByb3Blcmx5LiBPbmx5IG9uY2UgeW91J3ZlIGdvdCB0aGUgbnVtYmVycyBkb3duIGRvZXMgaGUgZmluYWxseSBoYXZlIHlvdSBzZXQgdGhlIG1lYXN1cmluZyBzcG9vbnMgYXNpZGUgYW5kIHN0YXJ0IGFjdHVhbGx5IHNtZWxsaW5nIHdoYXQgeW91J3ZlIG1hZGUuCgpCeSB0aGUgZW5kLCB5b3UgY2FuIHRlbGwsIGJ5IHNjZW50IGFsb25lLCB3aGVuIGEgYmF0Y2ggaXMgYSBmcmFjdGlvbiBvZiBhIGRlZ3JlZSBvZmYu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBmaW5pc2hlZCBibGVuZA==', 'next' => '6_shared'],
            ],
        ],
        '5_smell' => [
            'prose'  => 'R29pbmcgc3RyYWlnaHQgdG8gc21lbGxpbmcgYmF0Y2hlcyBpcyBkaXNvcmllbnRpbmcgYXQgZmlyc3QsIE1hcmNlbCBoYW5kaW5nIHlvdSBzYW1wbGUgYWZ0ZXIgc2FtcGxlIHdpdGggbm8gbnVtYmVycyBhdHRhY2hlZCBhdCBhbGwsIGp1c3QgYXNraW5nLCBlYWNoIHRpbWUsIHdoYXQncyBtaXNzaW5nLiBZb3UgZ2V0IGl0IHdyb25nIG1vcmUgdGhhbiBhIGRvemVuIHRpbWVzIGJlZm9yZSBzb21ldGhpbmcgaW4geW91ciBub3NlIGZpbmFsbHksIGdlbnVpbmVseSBsZWFybnMgdGhlIGRpZmZlcmVuY2UuCgpCeSB0aGUgZW5kLCB5b3UgY2FuIHRlbGwsIGJ5IHNjZW50IGFsb25lLCB3aGVuIGEgYmF0Y2ggaXMgYSBmcmFjdGlvbiBvZiBhIGRlZ3JlZSBvZmYu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBmaW5pc2hlZCBibGVuZA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'TWFyY2VsIG5vZHMsIHNhdGlzZmllZCBlaXRoZXIgd2F5LCBhbmQgaGVscHMgeW91IGJsZW5kIG9uZSBmaW5hbCwgcHJvcGVyIGJhdGNoIHRvZ2V0aGVyIOKAlCB0aHltZSBhbmQgcm9zZW1hcnkgYW5kIHNhdm9yeSBhbmQgbGF2ZW5kZXIsIGV4YWN0bHkgYmFsYW5jZWQsIGV4YWN0bHkgd2hhdCB0aGUgcmVjaXBlIGNhcmQgd2FzIGFsd2F5cyBtaXNzaW5nLiBIZSBzZWFscyBpdCBjYXJlZnVsbHkgaW50byBhIHNtYWxsIHBhcGVyIHBhY2tldC4KCidUZWxsIGhlciwnIGhlIHN0YXJ0cywgdGhlbiBjYXRjaGVzIGhpbXNlbGYsIHRoZSB3YXkgcGVvcGxlIHdobyBrbmV3IGhlciBjbGVhcmx5IHN0aWxsIGRvIHNvbWV0aW1lcy4gJ1RlbGwgd2hvZXZlciBuZWVkcyB0ZWxsaW5nLCBzaGUgZmluYWxseSBnb3QgaXQgcmlnaHQuIEp1c3QgdG9vayBzb21lb25lIGVsc2UgdG8gYWN0dWFsbHkgZmluaXNoIGxlYXJuaW5nIGl0IHByb3Blcmx5Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0b3dhcmQgdGhlIHBvcnQgd2l0aCB0aGUgaGVyYmVzIGRlIFByb3ZlbmNlIHNlY3VyZSBpbiB0aGUgYm94J3MgZmlyc3QgcHJvcGVybHkgZmlsbGVkIHdlbGwsIE1hcnNlaWxsZSdzIGhhcmJvdXIgY2F0Y2hpbmcgdGhlIGFmdGVybm9vbiBsaWdodCwgZ3VsbHMgd2hlZWxpbmcgb3ZlciBmaXNoaW5nIGJvYXRzIGNvbWluZyBpbiB3aXRoIHRoZSBkYXkncyBjYXRjaC4KCkJydW5vIHN0dWRpZXMgdGhlIGJsZW5kIHdpdGggcmVhbCBzYXRpc2ZhY3Rpb24uICdPbmUgZG93bi4gRmVlbHMgZGlmZmVyZW50LCBkb2Vzbid0IGl0LCBoYXZpbmcgc29tZXRoaW5nIGFjdHVhbGx5IGZpbmlzaGVkIGluc3RlYWQgb2YganVzdCBjb2xsZWN0ZWQuJw==',
            'choices' => [
                ['text' => 'U2F5IGl0IGZlZWxzIGxpa2UgcmVhbCBwcm9ncmVzcw==', 'next' => '8_end_progress'],
                ['text' => 'U2F5IGl0J3MgbW9yZSBlbW90aW9uYWwgdGhhbiB5b3UgZXhwZWN0ZWQ=', 'next' => '8_end_emotional'],
            ],
        ],
        '8_end_progress' => [
            'prose'  => 'J0l0IGZlZWxzIGxpa2UgcmVhbCBwcm9ncmVzcywgaG9uZXN0bHksJyB5b3Ugc2F5LCB0dXJuaW5nIHRoZSBzbWFsbCBwYXBlciBwYWNrZXQgb3ZlciBpbiB5b3VyIGhhbmRzLiAnRmlyc3Qgd2VsbCBmaWxsZWQgcHJvcGVybHkuIFdoYXRldmVyJ3MgYWhlYWQsIGF0IGxlYXN0IHRoaXMgcGFydCdzIGFjdHVhbGx5IGRvbmUuJwoKQnJ1bm8gbm9kcywgcGxlYXNlZC4gJ1RoYXQncyB0aGUgcmlnaHQgd2F5IHRvIHRoaW5rIGFib3V0IGl0LiBPbmUgd2VsbCBhdCBhIHRpbWUuIERvZXNuJ3QgbmVlZCB0byBmZWVsIGxpa2UgdGhlIHdob2xlIG1vdW50YWluIGFsbCBhdCBvbmNlLic=',
            'ending' => true,
        ],
        '8_end_emotional' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCdzIG1vcmUgZW1vdGlvbmFsIHRoYW4gSSBleHBlY3RlZCwnIHlvdSBhZG1pdCwgc3VycHJpc2VkIGJ5IGhvdyBtdWNoIGEgc21hbGwgcGFwZXIgcGFja2V0IG9mIGRyaWVkIGhlcmJzIGFjdHVhbGx5IG1lYW5zLiAnRmVlbHMgbGlrZSBzaGUncyBhIGxpdHRsZSBiaXQgbGVzcyB1bmZpbmlzaGVkIG5vdy4nCgpCcnVubydzIG93biBleWVzIGdvIHNsaWdodGx5IGJyaWdodCBhdCB0aGF0LiAnU2hlIHdvdWxkIGJlIGdsYWQsIEkgdGhpbmsuIE5vdCBmb3IgdGhlIGhlcmJzLiBGb3Igc29tZW9uZSBhY3R1YWxseSBjYXJpbmcgZW5vdWdoIHRvIGdldCB0aGVtIHJpZ2h0LicgVGhlIHR3byBvZiB5b3UgaGVhZCBiYWNrIHRvd2FyZCB0aGUgc3RhdGlvbiwgUGltIGdydW1ibGluZyBmcm9tIGhpcyBiYXNrZXQgdGhlIHdob2xlIHdheS4=',
            'ending' => true,
        ],
    ],
];
