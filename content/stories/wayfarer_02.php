<?php
return [
    'id'    => 2,
    'title' => 'Asking Properly',
    'color' => '#8A7A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TW9udCBCbGFuYyByaXNlcyB3aGl0ZSBhbmQgbWVyY2lsZXNzIGFib3ZlIGEgc2NhdHRlciBvZiBzdG9uZS1yb29mZWQgdmlsbGFnZXMsIGdsYWNpZXJzIGhhbmdpbmcgaW4gYmx1ZS13aGl0ZSBmb2xkcyBkb3duIHNsb3BlcyBzdGVlcCBlbm91Z2ggdG8gbWFrZSB0aGUgQ2Fpcm5nb3JtcyBsb29rIGxpa2UgYSBnZW50bGUgc3VnZ2VzdGlvbiBvZiBhIG1vdW50YWluIGJ5IGNvbXBhcmlzb24uIEdyZXRhIGJyaW5ncyB0aGUgQ29udG91ciBkb3duIGludG8gYSBoaWdoIG1lYWRvdyB3aXRoIHRoZSBzYW1lIHVuYm90aGVyZWQgY29tcGV0ZW5jZSBzaGUncyBjbGVhcmx5IGJyb3VnaHQgdG8gd29yc2UgbGFuZGluZ3MgdGhhbiB0aGlzLgoKVHdvIHdheXMgdG93YXJkIHRoZSBndWlkZSdzIGh1dCBwcmVzZW50IHRoZW1zZWx2ZXM6IHN0cmFpZ2h0IGFjcm9zcyB0aGUgZ2xhY2llciwgZmFzdGVyIGJ1dCBnZW51aW5lbHkgZGFuZ2Vyb3VzIHdpdGhvdXQgcHJvcGVyIHJvcGluZywgb3IgdGhlIGxvbmdlciB2YWxsZXktdmlsbGFnZSByb3V0ZSwgc2FmZXIsIHNsb3dlciwgcGFzdCB0aHJlZSBzZXBhcmF0ZSBoYW1sZXRzIHRoYXQgYWxsIHNlZW0gdG8ga25vdyBleGFjdGx5IHdobyB5b3UncmUgbG9va2luZyBmb3Iu',
            'choices' => [
                ['text' => 'Q3Jvc3MgdGhlIGdsYWNpZXI=', 'next' => '2_glacier'],
                ['text' => 'VGFrZSB0aGUgdmFsbGV5LXZpbGxhZ2Ugcm91dGU=', 'next' => '2_village'],
            ],
        ],
        '2_glacier' => [
            'prose'  => 'R3JldGEgcm9wZXMgeW91IGJvdGggcHJvcGVybHkgYmVmb3JlIHNoZSdsbCBsZXQgeW91IHNldCBvbmUgYm9vdCBvbiB0aGUgaWNlLCBjaGVja2luZyBldmVyeSBrbm90IHR3aWNlIHdpdGggdGhlIGZsYXQsIGh1bW91cmxlc3MgdGhvcm91Z2huZXNzIG9mIHNvbWVvbmUgd2hvIGhhcyBwZXJzb25hbGx5IHdhdGNoZWQgYSBzaG9ydGN1dCBnbyB3cm9uZyBiZWZvcmUuIFRoZSBnbGFjaWVyIGl0c2VsZiBpcyBiZWF1dGlmdWwgYW5kIGVudGlyZWx5IGluZGlmZmVyZW50IHRvIHRoYXQgYmVhdXR5LCBibHVlIGNyZXZhc3NlcyBvcGVuaW5nIHdpdGhvdXQgd2FybmluZyB1bmRlciBhIGNydXN0IHRoYXQgbG9va3Mgc29saWQgYW5kIGlzbid0IGFsd2F5cy4KCllvdSBjcm9zcyBpdCBzbG93ZXIgdGhhbiBlaXRoZXIgb2YgeW91IHdvdWxkIGxpa2UsIHRlc3RpbmcgZXZlcnkgZmV3IHN0ZXBzLCBhbmQgYXJyaXZlIGF0IHRoZSBodXQgcmF0dGxlZCwgdXByaWdodCwgYW5kIGNvbnNpZGVyYWJseSBtb3JlIHJlc3BlY3RmdWwgb2YgdGhlIG1vdW50YWluIHRoYW4geW91IHdlcmUgYW4gaG91ciBhZ28u',
            'choices' => [
                ['text' => 'S25vY2s=', 'next' => '3_shared'],
            ],
        ],
        '2_village' => [
            'prose'  => 'VGhlIHZhbGxleSByb3V0ZSB3aW5kcyB0aHJvdWdoIHRocmVlIHNtYWxsIHN0b25lIHZpbGxhZ2VzLCBlYWNoIG9uZSBhcHBhcmVudGx5IHJlcXVpcmVkIGJ5IHVuc3Bva2VuIGxvY2FsIGxhdyB0byBvZmZlciB5b3Ugc29tZXRoaW5nIHRvIGVhdCBiZWZvcmUgbGV0dGluZyB5b3UgcGFzcyB0aHJvdWdoLiBCeSB0aGUgdGhpcmQgdmlsbGFnZSwgYW4gb2xkIHdvbWFuIHNlbGxpbmcgY2hlZXNlIG1lbnRpb25zLCBlbnRpcmVseSB1bnByb21wdGVkLCB0aGF0ICd0aGUgZ3VpZGUgdXAgYXQgdGhlIGh1dCcgaGFzIGJlZW4gZXhwZWN0aW5nIHNvbWVvbmUgZm9yIHllYXJzLCB0aG91Z2ggc2hlIGRvZXNuJ3Qgc2F5IHdobyB0b2xkIGhlciB0aGF0LgoKWW91IGFycml2ZSBhdCB0aGUgaHV0IHdlbGwgZmVkLCB1bmh1cnJpZWQsIGFuZCBtaWxkbHkgYmV3aWxkZXJlZCBieSBob3cgbXVjaCBvZiB0aGUgbW91bnRhaW4ncyB3aG9sZSBzb2NpYWwgbmV0d29yayBhbHJlYWR5IHNlZW1zIHRvIGtub3cgeW91ciBidXNpbmVzcy4=',
            'choices' => [
                ['text' => 'S25vY2s=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGh1dCdzIG93bmVyLCBPZGlsZSwgaXMgc29tZXdoZXJlIHBhc3Qgc2V2ZW50eSBhbmQgYnVpbHQgbGlrZSBzaGUgY291bGQgc3RpbGwgb3V0LWNsaW1iIHlvdSB3aXRob3V0IHRyeWluZyDigJQgd2VhdGhlcmVkLCBzaGFycC1leWVkLCBlbnRpcmVseSB1bnN1cnByaXNlZCB0byBmaW5kIHlvdSBvbiBoZXIgZG9vcnN0ZXAuICdBdWd1c3RpbidzLCcgc2hlIHNheXMsIGJlZm9yZSB5b3UndmUgaW50cm9kdWNlZCB5b3Vyc2VsZiwgc3R1ZHlpbmcgeW91ciBmYWNlIGZvciBhIHJlc2VtYmxhbmNlIHNoZSBhcHBhcmVudGx5IGZpbmRzLiAnWW91J3ZlIGdvdCBoaXMgc3R1YmJvcm5uZXNzIGluIHRoZSBqYXcsIGlmIG5vdGhpbmcgZWxzZS4nCgpTaGUgZG9lc24ndCBpbnZpdGUgeW91IGluIGltbWVkaWF0ZWx5LiAnSSd2ZSBrZXB0IHRoYXQgbWlycm9yIHRlbiB5ZWFycyBmb3Igd2hvZXZlciBjYW1lIGFza2luZyBwcm9wZXJseS4gUXVlc3Rpb24gaXMgd2hldGhlciB5b3UncmUgYXNraW5nIHByb3Blcmx5LCBvciBqdXN0IGFza2luZy4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'Q29udmluY2UgaGVyIHlvdSBtZWFuIGl0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'Q29udmluY2luZyBoZXIsIGl0IHR1cm5zIG91dCwgbWVhbnMgd29yayByYXRoZXIgdGhhbiB3b3Jkcy4gVGhlIG1pcnJvciBpdHNlbGYgbmVlZHMgcmVzaWx2ZXJpbmcgYmVmb3JlIGl0J3MgYW55IHVzZSB0byBhbnlvbmUg4oCUIGEgZmlkZGx5LCBleGFjdGluZyBqb2Igc2hlJ3MgYmVlbiBwdXR0aW5nIG9mZiDigJQgYW5kIGEgcm91dGUgbWFya2VyIGZ1cnRoZXIgdXAgdGhlIHJpZGdlIG5lZWRzIGNoZWNraW5nIGFmdGVyIGxhc3Qgd2VlaydzIHJvY2tmYWxsLCBiZWZvcmUgaGVyIG5leHQgcGF5aW5nIGdyb3VwIGNvbWVzIHRocm91Z2guCgonUGljayBvbmUsJyBzaGUgc2F5cy4gJ0VpdGhlciB0ZWxscyBtZSBwbGVudHkuIE5laXRoZXIncyBhIHRlc3QgZXhhY3RseS4gSnVzdCB3b3JrIHRoYXQgd2FudHMgZG9pbmcsIHNhbWUgYXMgZXZlcnl0aGluZyBlbHNlIHVwIGhlcmUuJw==',
            'choices' => [
                ['text' => 'SGVscCByZXNpbHZlciB0aGUgbWlycm9y', 'next' => '5_mirror'],
                ['text' => 'SGVscCBjaGVjayB0aGUgcmlkZ2UgbWFya2Vy', 'next' => '5_marker'],
            ],
        ],
        '5_mirror' => [
            'prose'  => 'UmVzaWx2ZXJpbmcgYSBtaXJyb3IgcHJvcGVybHkgaXMgc2xvdywgZXhhY3RpbmcsIGZhaW50bHkgYWxjaGVtaWNhbCB3b3JrIOKAlCB0aGUgb2xkIGJhY2tpbmcgc2NyYXBlZCBhd2F5LCBhIG5ldyBjb2F0IGFwcGxpZWQgd2l0aCBhIHByZWNpc2lvbiB0aGF0IHB1bmlzaGVzIHJ1c2hpbmcgaW1tZWRpYXRlbHkgYW5kIG9idmlvdXNseS4gT2RpbGUgY29ycmVjdHMgeW91ciB0ZWNobmlxdWUgdHdpY2UsIGJyaXNrbHksIHdpdGhvdXQgYW55IHBhcnRpY3VsYXIgZ2VudGxlbmVzcywgdGhlIHdheSB5b3Ugc3VzcGVjdCBzaGUgY29ycmVjdHMgZXZlcnlvbmUuCgpCeSB0aGUgdGltZSBpdCdzIGRvbmUsIHRoZSBtaXJyb3IgdGhyb3dzIGxpZ2h0IGJhY2sgY2xlYW4gYW5kIHRydWUgZm9yIHRoZSBmaXJzdCB0aW1lIGluIHllYXJzLCBhbmQgc29tZXRoaW5nIGluIE9kaWxlJ3MgZmFjZSBzdWdnZXN0cyB0aGlzIGlzLCBmb3IgaGVyLCBjbG9zZSB0byBhIGdlbnVpbmUgY29tcGxpbWVudCBwYWlkIHRvIHlvdXIgcGF0aWVuY2Uu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgc2hlIGRlY2lkZXM=', 'next' => '6_shared'],
            ],
        ],
        '5_marker' => [
            'prose'  => 'VGhlIHJpZGdlIHJvdXRlIGlzIGV4cG9zZWQsIGNvbGQsIGFuZCBnZW51aW5lbHkgdGVzdGluZyBhZnRlciBsYXN0IHdlZWsncyByb2NrZmFsbCwgdGhlIG1hcmtlciBpdHNlbGYgaGFsZi1idXJpZWQgdW5kZXIgbmV3IHNjcmVlIHRoYXQgdGFrZXMgcmVhbCBlZmZvcnQgdG8gcHJvcGVybHkgY2xlYXIgYW5kIHJlc2V0LiBPZGlsZSBtb3ZlcyBhY3Jvc3MgdGhlIHRlcnJhaW4gbGlrZSBzaGUncyB0d2VudHkgeWVhcnMgeW91bmdlciB0aGFuIHNoZSBpcywgYW5kIGRvZXNuJ3Qgc2xvdyBkb3duIGZvciB5b3UsIHdoaWNoIHlvdSB1bmRlcnN0YW5kLCBldmVudHVhbGx5LCB0byBiZSBhIGNvbXBsaW1lbnQgb2YgaXRzIG93biBraW5kLgoKQnkgdGhlIHRpbWUgdGhlIG1hcmtlcidzIHJlc2V0IGFuZCB2aXNpYmxlIGFnYWluLCB5b3VyIGxlZ3MgYXJlIHNoYWtpbmcgYW5kIHlvdXIgcmVzcGVjdCBmb3IgdGhlIHdob2xlIGd1aWRpbmcgcHJvZmVzc2lvbiBoYXMgZ29uZSB1cCBjb25zaWRlcmFibHku',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgc2hlIGRlY2lkZXM=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'T2RpbGUgc3R1ZGllcyB0aGUgZmluaXNoZWQgd29yayDigJQgbWlycm9yIG9yIG1hcmtlciwgd2hpY2hldmVyIHlvdSBkaWQg4oCUIGZvciBhIGxvbmcgbW9tZW50IGJlZm9yZSBzaGUgZmluYWxseSBnb2VzIHRvIHRoZSBzaGVsZiBhbmQgdGFrZXMgZG93biBhIHNtYWxsLCBjYXJlZnVsIGJ1bmRsZSwgdW53cmFwcGluZyBpdCB0byByZXZlYWwgdGhlIG1haW4gc2lnaHRpbmcgbWlycm9yIGl0c2VsZiwga2VwdCBzYWZlIGZvciBhIGRlY2FkZSBpbiBvaWxlZCBjbG90aC4KCidIZSB3cm90ZSB0byBtZSwgbmVhciB0aGUgZW5kLCcgc2hlIHNheXMsIGhhbmRpbmcgaXQgb3Zlci4gJ1NhaWQgaGUgd2FzIGZpbmFsbHkgZ29pbmcgdG8gZmluaXNoIHRoZSBwYXNzIHByb3Blcmx5LiBOZXZlciBkaWQgaGVhciB0aGF0IGhlIG1hbmFnZWQgaXQuJyBTaGUgbG9va3MgYXQgeW91IGV2ZW5seS4gJ1BlcmhhcHMgdGhhdCdzIHlvdSBub3csIGluc3RlYWQuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciByb3V0ZSB5b3UgZGlkbid0IHRha2Ugb24gdGhlIHdheSB1cCwgTW9udCBCbGFuYydzIHdob2xlIHZhc3Qgd2hpdGUgc2hvdWxkZXIgaW5kaWZmZXJlbnQgdG8geW91ciBsZWF2aW5nIHRoZSBzYW1lIHdheSBpdCB3YXMgaW5kaWZmZXJlbnQgdG8geW91ciBhcnJpdmluZywgYW5kIHRoZSBtaXJyb3IgcmlkZXMgY2FyZWZ1bGx5IHdyYXBwZWQgaW4gdGhlIGNhc2UncyBvbmUgZmlsbGVkIGN1dG91dCwgbm8gbG9uZ2VyIGVudGlyZWx5IGVtcHR5LgoKR3JldGEgY2hlY2tzIGl0IG92ZXIgd2l0aCByZWFsIHByb2Zlc3Npb25hbCBpbnRlcmVzdCBiZWZvcmUgc3Rvd2luZyBpdC4gJ0dvb2QgZ2xhc3MsIHRoYXQuIE9sZCwgYnV0IHByb3Blcmx5IGtlcHQuJyBTaGUgZG9lc24ndCBhc2sgd2hhdCBPZGlsZSBzYWlkLiBZb3UgZmluZCB5b3Vyc2VsZiBnbGFkIHNoZSBkb2Vzbid0LCBmb3Igbm93Lg==',
            'choices' => [
                ['text' => 'VGVsbCBHcmV0YSB3aGF0IE9kaWxlIHNhaWQgYWJvdXQgdGhlIGxldHRlcg==', 'next' => '8_end_tell'],
                ['text' => 'S2VlcCBpdCB0byB5b3Vyc2VsZiBhIHdoaWxlIGxvbmdlcg==', 'next' => '8_end_keep'],
            ],
        ],
        '8_end_tell' => [
            'prose'  => 'WW91IHRlbGwgaGVyIGFueXdheSwgb25jZSB5b3UncmUgYWlyYm9ybmUsIHRoZSBsZXR0ZXIgYW5kIHRoZSB1bmZpbmlzaGVkIHByb21pc2UgYW5kIHRoZSBzZW5zZSB0aGF0IHRoaXMgd2hvbGUgam91cm5leSBtaWdodCBnZW51aW5lbHkgYmUgdGhlIGNsb3Npbmcgb2Ygc29tZXRoaW5nIHJhdGhlciB0aGFuIHNpbXBseSB0aGUgY29sbGVjdGluZyBvZiBwYXJ0cy4gR3JldGEgbGlzdGVucyB3aXRob3V0IGludGVycnVwdGluZywgd2hpY2ggZnJvbSBoZXIgaXMgcmVhbCBhdHRlbnRpdmVuZXNzLgoKJ1RoZW4gd2UnZCBiZXR0ZXIgYWN0dWFsbHkgZmluaXNoIGl0LCcgc2hlIHNheXMsIHNpbXBseSwgYWRqdXN0aW5nIHRoZSBDb250b3VyJ3MgaGVhZGluZyB3aXRoIGEgZnJhY3Rpb24gbW9yZSBwdXJwb3NlIHRoYW4gYmVmb3JlLiBJdCdzIG5vdCBzZW50aW1lbnRhbCwgY29taW5nIGZyb20gaGVyLiBJdCdzIGJldHRlciB0aGFuIHRoYXQg4oCUIGl0J3MgYSBkZWNpc2lvbi4=',
            'ending' => true,
        ],
        '8_end_keep' => [
            'prose'  => 'WW91IGtlZXAgaXQgdG8geW91cnNlbGYgYSB3aGlsZSBsb25nZXIsIHR1cm5pbmcgdGhlIGxldHRlcidzIHByb21pc2Ugb3ZlciBwcml2YXRlbHkgYXMgdGhlIENvbnRvdXIgY2xpbWJzIGF3YXkgZnJvbSBNb250IEJsYW5jJ3Mgd2hpdGUgc2hvdWxkZXIgaW50byBvcGVuIHNreSwgbm90IHF1aXRlIHJlYWR5IHlldCB0byBoYW5kIHRoZSB3aG9sZSB3ZWlnaHQgb2YgaXQgb3ZlciB0byBzb21lb25lIGVsc2UsIGhvd2V2ZXIgdHJ1c3R3b3J0aHkuCgpDb3JiaWUsIG9ibGl2aW91cyB0byBhbGwgb2YgaXQsIHNwZW5kcyB0aGUgd2hvbGUgY2xpbWIgYXR0ZW1wdGluZyB0byBwcnkgdGhlIG1pcnJvcidzIHdyYXBwaW5nIGNsb3RoIGxvb3NlIG91dCBvZiBwdXJlIHByb2Zlc3Npb25hbCBpbnRlcmVzdCwgYW5kIGlzIGdlbnRseSwgcmVwZWF0ZWRseSwgdGh3YXJ0ZWQuIEl0J3MgYSBzbWFsbCwgb3JkaW5hcnkgYml0IG9mIGNoYW9zLCBhbmQgaXQncyBleGFjdGx5IGVub3VnaCB0byBtYWtlIHRoZSBiaWdnZXIgZmVlbGluZyBiZWFyYWJsZSBmb3Igbm93Lg==',
            'ending' => true,
        ],
    ],
];
