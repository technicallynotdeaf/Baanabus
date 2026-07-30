<?php
return [
    'id'    => 8,
    'title' => 'Setting Old Accounts Right',
    'color' => '#6A4A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIERyYWtlbnNiZXJnIHJpc2VzIGluIGEgdmFzdCBiYXNhbHQgd2FsbCwgdGhlICdCYXJyaWVyIG9mIFNwZWFycywnIGl0cyBjbGlmZnMgYW5kIGNhdmVzIGhvbGRpbmcgc29tZSBvZiB0aGUgb2xkZXN0IHJvY2sgYXJ0IGluIHRoZSB3b3JsZCDigJQgcGFpbnRlZCBieSBTYW4gYW5jZXN0b3JzIGFjcm9zcyB0aG91c2FuZHMgb2YgeWVhcnMsIHN0aWxsIHRlbmRlZCBhbmQgZXhwbGFpbmVkIGJ5IFNhbiBkZXNjZW5kYW50cyB3aG8gbGl2ZSBpbiB0aGUgc2hhZG93IG9mIHRoZSBlc2NhcnBtZW50IHRvZGF5LiBHcmV0YSBtb29ycyB0aGUgQ29udG91ciB3aXRoIHJlYWwgY2FyZSwgYXdhcmUsIGV2ZW4gYmVmb3JlIHlvdSBzYXkgYW55dGhpbmcsIHRoYXQgdGhpcyBpc24ndCBhIHBsYWNlIHRvIHRyZWF0IGNhc3VhbGx5LgoKVHdvIHJvdXRlcyB0b3dhcmQgdGhlIGNvbW11bml0eSBwcmVzZW50IHRoZW1zZWx2ZXM6IGFsb25nIHRoZSBiYXNlIG9mIHRoZSBlc2NhcnBtZW50LCBwYXN0IHNldmVyYWwgcGFpbnRlZCByb2NrLXNoZWx0ZXJzLCBvciB1cCBhIGhpZ2hlciBjb250b3VyIHBhdGggdGhhdCBza2lydHMgdGhlIGNsaWZmIGZhY2UgbW9yZSBkaXJlY3RseS4=',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBlc2NhcnBtZW50IGJhc2U=', 'next' => '2_base'],
                ['text' => 'VGFrZSB0aGUgaGlnaGVyIGNvbnRvdXIgcGF0aA==', 'next' => '2_contour'],
            ],
        ],
        '2_base' => [
            'prose'  => 'VGhlIGxvd2VyIHJvdXRlIHRha2VzIHlvdSBwYXN0IHNldmVyYWwgcm9jay1zaGVsdGVycywgdGhlaXIgcGFpbnRlZCB3YWxscyBmYWRlZCBidXQgdW5taXN0YWthYmx5IGRlbGliZXJhdGUg4oCUIGVsYW5kLCBodW1hbiBmaWd1cmVzLCBwYXR0ZXJucyB3aG9zZSBmdWxsIG1lYW5pbmcgaXNuJ3QgeW91cnMgdG8gZ3Vlc3MgYXQgZnJvbSB0aGUgb3V0c2lkZS4gWW91IHJlc2lzdCB0aGUgdXJnZSB0byB0b3VjaCBhbnl0aGluZywga2VlcGluZyBhIHJlc3BlY3RmdWwgZGlzdGFuY2UgdGhlIHdob2xlIHdheS4KCkEgeW91bmcgbWFuIHRlbmRpbmcgYSBzbWFsbCBoZXJkIG5lYXJieSBkaXJlY3RzIHlvdSBvbndhcmQgd2l0aG91dCBtdWNoIGNlcmVtb255LiAnWW91J2xsIHdhbnQgdG8gc3BlYWsgd2l0aCB1TWtodWx1IE5vbWJ1c28uIFNoZSdzIHRoZSBvbmUgd2hvIGFjdHVhbGx5IGtub3dzIHRoZSBvbGQgc3RvcmllcyBwcm9wZXJseSwgbm90IGp1c3QgdGhlIHBhcnRzIHRvdXJpc3RzIGdldCB0b2xkLic=',
            'choices' => [
                ['text' => 'RmluZCBoZXI=', 'next' => '3_shared'],
            ],
        ],
        '2_contour' => [
            'prose'  => 'VGhlIGhpZ2hlciBwYXRoIGlzIG1vcmUgZXhwb3NlZCwgdGhlIHdob2xlIGJhc2FsdCB3YWxsIGxvb21pbmcgY2xvc2Ugb24gb25lIHNpZGUsIGFuZCB0aGUgdmlldyBmcm9tIHVwIGhlcmUgbWFrZXMgcGxhaW4gZXhhY3RseSB3aHkgdGhpcyBlc2NhcnBtZW50IGhhcyBtYXR0ZXJlZCB0byBwZW9wbGUgZm9yIGFzIGxvbmcgYXMgaXQgaGFzIOKAlCBhIGdlbnVpbmUsIGFuY2llbnQgdmFzdG5lc3MgdGhhdCBubyBhbW91bnQgb2YgZmFtaWxpYXJpdHkgd291bGQgZnVsbHkgd2VhciBkb3duLgoKQSB3b21hbiBnYXRoZXJpbmcgaGVyYnMgYWxvbmcgdGhlIHBhdGggcG9pbnRzIHlvdSwgd2l0aG91dCBuZWVkaW5nIG11Y2ggZXhwbGFuYXRpb24sIHRvd2FyZCBhIHNtYWxsIHNldHRsZW1lbnQgYmVsb3cuICdOb21idXNvIHdpbGwgc2VlIHlvdS4gU2hlIHNlZXMgbW9zdCBwZW9wbGUgd2hvIGNvbWUgYXNraW5nIHByb3Blcmx5Lic=',
            'choices' => [
                ['text' => 'RmluZCBoZXI=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'Tm9tYnVzbyBpcyBvbGQsIHNoYXJwLWV5ZWQsIGFuZCBvcGVubHkgdW5pbXByZXNzZWQgYnkgYW55b25lIHdobyBhcnJpdmVzIGV4cGVjdGluZyBxdWljayBhbnN3ZXJzIGFib3V0IG1hdHRlcnMgdGhhdCB0b29rIGhlciBvd24gZWxkZXJzIGEgbGlmZXRpbWUgdG8gcHJvcGVybHkgbGVhcm4uIFNoZSBsaXN0ZW5zIHRvIHlvdXIgZXhwbGFuYXRpb24gY2FyZWZ1bGx5LCB0aG91Z2gsIGFuZCBzb21ldGhpbmcgaW4gaGVyIGZhY2Ugc2hpZnRzIG9uY2UgeW91IG1lbnRpb24gQXVndXN0aW4ncyBuYW1lIGFuZCB0aGUgaW5zdHJ1bWVudCBpdHNlbGYuCgonQSBmb2N1c2luZyBzY3Jldywgc21hbGwsIGJyYXNzLCcgc2hlIHNheXMuICdNeSBncmFuZGZhdGhlciB0cmFkZWQgaXQgYXdheSwgZm9vbGlzaGx5LCB0byBhIHBhc3NpbmcgdHJhZGVyIGRlY2FkZXMgYWdvIOKAlCBuZWVkZWQgdGhlIG1vbmV5IG1vcmUgdGhhbiBoZSBuZWVkZWQgYSBjdXJpb3NpdHkgaGUgZGlkbid0IHVuZGVyc3RhbmQgdGhlIHVzZSBvZi4gSSd2ZSBhbHdheXMgcmVncmV0dGVkIHRoYXQgaGUgaGFkIHRvIG1ha2UgdGhhdCBjaG9pY2UgYXQgYWxsLicgU2hlIHN0dWRpZXMgeW91LiAnRmluZGluZyB0aGUgdHJhZGVyJ3MgZGVzY2VuZGFudHMgbm93IGlzIHBvc3NpYmxlLiBOb3QgZWFzeS4gQnV0IHBvc3NpYmxlLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdyB0byBzdGFydA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUgYXJlIHR3byB3YXlzIHRvIHRyYWNlIGEgZmFtaWx5IHRoYXQgc2NhdHRlcmVkIGRlY2FkZXMgYWdvLCBOb21idXNvIHNheXM6IHRocm91Z2ggd2hhdGV2ZXIgb2ZmaWNpYWwgdHJhZGluZy1wb3N0IHJlY29yZHMgbWlnaHQgaGF2ZSBzdXJ2aXZlZCBpbiB0aGUgbmVhcmVzdCB0b3duJ3MgYXJjaGl2ZSwgb3IgdGhyb3VnaCB0aGUgc2xvd2VyLCBtb3JlIHJlbGlhYmxlIG5ldHdvcmsgb2Ygd2hvLXJlbWVtYmVycy13aG9tIHRoYXQgc3RpbGwgcnVucyB0aHJvdWdoIHRoaXMgd2hvbGUgcmVnaW9uLCBtb3V0aCB0byBtb3V0aCwgZmFzdGVyIHRoYW4gYW55IHBhcGVyIHRyYWlsIGlmIHlvdSBrbm93IGhvdyB0byBhY3R1YWxseSBsaXN0ZW4gdG8gaXQu',
            'choices' => [
                ['text' => 'U2VhcmNoIHRoZSB0cmFkaW5nLXBvc3QgYXJjaGl2ZQ==', 'next' => '5_archive'],
                ['text' => 'Rm9sbG93IHRoZSBjb21tdW5pdHkncyBvd24gbWVtb3J5', 'next' => '5_memory'],
            ],
        ],
        '5_archive' => [
            'prose'  => 'VGhlIGFyY2hpdmUgaXMgZHVzdHksIGRpc29yZ2FuaXNlZCwgYW5kIGdlbnVpbmVseSB1c2VmdWwgb25jZSB5b3UgZmluZCB0aGUgcmlnaHQgbGVkZ2VyIOKAlCBhIGZhZGVkIGVudHJ5IGNvbmZpcm1pbmcgdGhlIHRyYWRlLCBhbmQgYSBuYW1lIHRoYXQsIGNyb3NzLXJlZmVyZW5jZWQgYWdhaW5zdCBhIHNlY29uZCwgbGF0ZXIgcmVjb3JkLCBmaW5hbGx5IHBvaW50cyB0b3dhcmQgYSBzcGVjaWZpYyBmYW1pbHksIHRocmVlIHRvd25zIG92ZXIsIHdobyBtaWdodCBzdGlsbCBob2xkIHdoYXQncyBsZWZ0IG9mIHRoZSBvbGQgdHJhZGVyJ3Mgc3RvY2suCgpJdCdzIHNsb3csIHBhcGVyLWJhc2VkIHdvcmssIGJ1dCBpdCBnZXRzIHlvdSB0aGVyZSwgbWV0aG9kaWNhbGx5LCBvbmUgY29uZmlybWVkIGZhY3QgYXQgYSB0aW1lLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBsZWFk', 'next' => '6_shared'],
            ],
        ],
        '5_memory' => [
            'prose'  => 'Rm9sbG93aW5nIHRoZSBjb21tdW5pdHkncyBvd24gbWVtb3J5IG1lYW5zIHJlYWwgY29udmVyc2F0aW9uLCBjdXAgYWZ0ZXIgY3VwIG9mIHRlYSwgc3RvcnkgYWZ0ZXIgaGFsZi1yZW1lbWJlcmVkIHN0b3J5LCB1bnRpbCBhbiBvbGQgd29tYW4gdHdvIHNldHRsZW1lbnRzIG92ZXIgZmluYWxseSBwbGFjZXMgdGhlIHRyYWRlcidzIG5hbWUgcHJvcGVybHkg4oCUICdtYXJyaWVkIGludG8gdGhlIEJvdGhhIGZhbWlseSwgdGhyZWUgdG93bnMgb3Zlciwgc3RpbGwgdGhlcmUsIGZhciBhcyBJIGtub3cnIOKAlCBkZWxpdmVyZWQgd2l0aCB0aGUgY2FzdWFsIGNvbmZpZGVuY2Ugb2Ygc29tZW9uZSB3aG9zZSBtZW1vcnkgaGFzIHNpbXBseSBuZXZlciBuZWVkZWQgYSBsZWRnZXIuCgpJdCdzIHNsb3dlciBpbiBzb21lIHdheXMsIGZhc3RlciBpbiBvdGhlcnMsIGFuZCBjb25zaWRlcmFibHkgd2FybWVyIHRoYW4gYW55IGFyY2hpdmUgY291bGQgaGF2ZSBtYW5hZ2VkLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBsZWFk', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgZm91bmQgdGhlbSwgdGhlIEJvdGhhIGZhbWlseSB0dXJucyBvdXQgdG8gYmUgZ2VudWluZWx5IGdsYWQgdG8gaGVscCBvbmNlIHRoZSB3aG9sZSBzdG9yeSdzIGV4cGxhaW5lZCDigJQgdGhlIGZvY3VzaW5nIHNjcmV3IGhhcyBzYXQgaW4gYSBkcmF3ZXIgb2Ygb2xkIGN1cmlvc2l0aWVzIGZvciB0d28gZ2VuZXJhdGlvbnMsIHZhbHVlZCBhcyBhbiBvZGRpdHkgcmF0aGVyIHRoYW4gYW55dGhpbmcgd2l0aCByZWFsIGhpc3RvcnkgYXR0YWNoZWQuCgonU2hvdWxkJ3ZlIGdvbmUgYmFjayB0byB3aG9ldmVyIGl0IGJlbG9uZ2VkIHRvIGEgbG9uZyB0aW1lIGFnbywnIHRoZSBjdXJyZW50IGhlYWQgb2YgdGhlIGZhbWlseSBzYXlzLCBoYW5kaW5nIGl0IG92ZXIgd2l0aG91dCBoZXNpdGF0aW9uLiAnR2xhZCBpdCBmaW5hbGx5IGlzLicgTm9tYnVzbywgaW5mb3JtZWQgb2YgdGhlIHJlY292ZXJ5LCBzZWVtcyBnZW51aW5lbHkgcmVsaWV2ZWQgYXMgbXVjaCBhcyBzYXRpc2ZpZWQg4oCUIGEgc21hbGwgb2xkIHdyb25nLCBxdWlldGx5IHNldCByaWdodC4=',
            'choices' => [
                ['text' => 'VGhhbmsgZXZlcnlvbmUgYW5kIHN0YXJ0IGJhY2s=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgQ29udG91ciB3aXRoIHRoZSBmb2N1c2luZyBzY3JldyBzZWN1cmUgaW4gdGhlIGNhc2UsIGEgc2l4dGggcGllY2UgcmVjb3ZlcmVkLCB0aGUgRHJha2Vuc2JlcmcncyBhbmNpZW50IHBhaW50ZWQgd2FsbHMgY2F0Y2hpbmcgdGhlIGxhc3Qgb2YgdGhlIGRheSdzIGxpZ2h0IGJlaGluZCB5b3UgaW4gY29sb3VycyB0aGF0IGhhdmUgY2xlYXJseSBvdXRsYXN0ZWQgZXZlcnkgc2luZ2xlIGh1bWFuIHRyYW5zYWN0aW9uIHRoYXQncyBldmVyIGhhcHBlbmVkIGluIHRoZWlyIHNoYWRvdy4KCkdyZXRhLCBjaGVja2luZyB0aGUgc2NyZXcncyBmaXQgYWdhaW5zdCB0aGUgcmVzdCBvZiB0aGUgaW5zdHJ1bWVudCwgbG9va3MgdGhvdWdodGZ1bCByYXRoZXIgdGhhbiBzaW1wbHkgc2F0aXNmaWVkLiAnRnVubnksIGhvdyBtdWNoIG9mIHRoaXMgdGhpbmcgdHVybnMgb3V0IHRvIGJlIGFib3V0IHNldHRpbmcgb2xkIGFjY291bnRzIHJpZ2h0LCBvbmUgd2F5IG9yIGFub3RoZXIuIFdvbmRlciBpZiBoZSBrbmV3IHRoYXQsIGdvaW5nIGluLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSB0aGluayBoZSBwcm9iYWJseSBkaWRuJ3Q=', 'next' => '8_end_didnt'],
                ['text' => 'U2F5IHlvdSB0aGluaywgc29tZWhvdywgaGUgZGlk', 'next' => '8_end_did'],
            ],
        ],
        '8_end_didnt' => [
            'prose'  => 'WW91IHRoaW5rIGFib3V0IGl0IHNlcmlvdXNseSBiZWZvcmUgYW5zd2VyaW5nLiAnSSBkb24ndCB0aGluayBoZSBrbmV3LCBleGFjdGx5LiBJIHRoaW5rIGhlIHdhcyBqdXN0IHRyeWluZyB0byBmaW5pc2ggYSBtYXAuJyBJdCBmZWVscyB0cnVlIGFzIHlvdSBzYXkgaXQg4oCUIHRoYXQgdGhlIGRlZXBlciByZWNrb25pbmdzLCB0aGUgb2xkIGRlYnRzIGFuZCBvbGQgZ3JpZWZzLCB3ZXJlIG5ldmVyIHRoZSBwbGFuLCBqdXN0IHdoYXQgdHVybmVkIHVwIGFsb25nIHRoZSB3YXkuCgpHcmV0YSBjb25zaWRlcnMgdGhpcywgbm9kcyBzbG93bHkuICdNYXliZSB0aGF0J3MgYmV0dGVyLCBhY3R1YWxseS4gTWVhbnMgaXQgd2Fzbid0IGNhbGN1bGF0ZWQuIEp1c3Qgd2hhdCBoYXBwZW5zIHdoZW4geW91IGdvIGxvb2tpbmcgcHJvcGVybHkgZm9yIHNvbWV0aGluZyByZWFsLic=',
            'ending' => true,
        ],
        '8_end_did' => [
            'prose'  => 'WW91IHRoaW5rIGFib3V0IGl0IHNlcmlvdXNseSBiZWZvcmUgYW5zd2VyaW5nLiAnSSB0aGluaywgc29tZXdoZXJlLCBoZSBkaWQuIEkgdGhpbmsgdGhhdCdzIHdoYXQgdGhlIGxldHRlciBtZWFudCDigJQgdGhlIHBhc3Mgd2FzIG5ldmVyIHJlYWxseSBhYm91dCB0aGUgbW91bnRhaW4uJyBJdCdzIHRoZSBmaXJzdCB0aW1lIHlvdSd2ZSBzYWlkIGl0IG91dCBsb3VkLCBhbmQgaXQgc2V0dGxlcyBzb21ldGhpbmcsIGhlYXJpbmcgaXQgbGFuZCBpbiB0aGUgb3BlbiBhaXIgaW5zdGVhZCBvZiBqdXN0IHR1cm5pbmcgb3ZlciBwcml2YXRlbHkgaW4geW91ciBvd24gaGVhZC4KCkdyZXRhIGRvZXNuJ3QgYW5zd2VyIGltbWVkaWF0ZWx5LiBXaGVuIHNoZSBkb2VzLCBpdCdzIHF1aWV0LiAnVGhlbiBsZXQncyBtYWtlIHN1cmUgd2UgYWN0dWFsbHkgZmluaXNoIHdoYXQgaGUgc3RhcnRlZCwgcHJvcGVybHkuIE5vdCBqdXN0IHRoZSBtYXAuIEFsbCBvZiBpdC4n',
            'ending' => true,
        ],
    ],
];
