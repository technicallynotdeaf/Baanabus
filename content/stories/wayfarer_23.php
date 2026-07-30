<?php
return [
    'id'    => 23,
    'title' => 'Easier to Finish Maps',
    'color' => '#9A8A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEFwcGFsYWNoaWFucyByaXNlIG9sZCBhbmQgcm91bmRlZCwgYW5jaWVudCBieSBhbnkgbW91bnRhaW4ncyBzdGFuZGFyZCwgdGhlIGtpbmQgb2Ygc29mdCwgd29ybiBiZWF1dHkgdGhhdCBjb21lcyBvbmx5IGZyb20gaGF2aW5nIGJlZW4gbW91bnRhaW5zIGZvciBsb25nZXIgdGhhbiBhbG1vc3QgYW55d2hlcmUgZWxzZSBvbiBFYXJ0aC4gR3JldGEgYnJpbmdzIHRoZSBDb250b3VyIGRvd24gbmVhciBhIHNtYWxsIGZhcm1ob3VzZSwgaXRzIGdhcmRlbiBuZWF0LCBpdHMgcG9yY2ggY2xlYXJseSBsaXZlZC1pbiBmb3IgZGVjYWRlcyBieSB0aGUgc2FtZSBjYXJlZnVsIGhhbmRzLgoKQW4gZWxkZXJseSB3b21hbiBpcyB3YWl0aW5nIG9uIHRoYXQgcG9yY2ggYmVmb3JlIHlvdSd2ZSBldmVuIHByb3Blcmx5IGxhbmRlZCwgYXMgdGhvdWdoIHNoZSdzIGJlZW4gZXhwZWN0aW5nIHRoaXMgZXhhY3QgdmlzaXQgZm9yIGEgdmVyeSBsb25nIHRpbWUu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHBvcmNo', 'next' => '2_shared'],
            ],
        ],
        '2_shared' => [
            'prose'  => 'J0VsZWFub3IsJyBzaGUgaW50cm9kdWNlcyBoZXJzZWxmLCBiZWZvcmUgeW91J3ZlIHNhaWQgYSB3b3JkLiAnQXVndXN0aW4gYW5kIEkgZ3JldyB1cCB0d28gZmFybXMgb3ZlciBmcm9tIGVhY2ggb3RoZXIsIGJhY2sgYmVmb3JlIGVpdGhlciBvZiB1cyBrbmV3IHdoYXQgdGhlIHJlc3Qgb2Ygb3VyIGxpdmVzIHdvdWxkIGFjdHVhbGx5IGxvb2sgbGlrZS4nIFNoZSBzdHVkaWVzIHlvdSB3aXRoIHJlYWwsIHVuaHVycmllZCB3YXJtdGguICdJIHdvbmRlcmVkLCBmb3IgeWVhcnMsIHdoZXRoZXIgYW55b25lIHdvdWxkIGV2ZXIgZmluYWxseSBjb21lIGFza2luZyBhYm91dCBoaW0gcHJvcGVybHkuJw==',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2hlJ3Mga2VwdA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'U2hlIGdvZXMgaW5zaWRlIHdpdGhvdXQgZnVydGhlciBleHBsYW5hdGlvbiBhbmQgY29tZXMgYmFjayB3aXRoIGEgc21hbGwsIHdvcm4gbm90ZWJvb2sg4oCUIEF1Z3VzdGluJ3Mgb3duIGNhbGlicmF0aW9uIG5vdGVzLCBoaXMgaGFuZHdyaXRpbmcgdW5taXN0YWthYmxlIGFjcm9zcyBldmVyeSBjYXJlZnVsIHBhZ2UsIGtlcHQgc2FmZSBpbiBhIGRyYXdlciBmb3IgbG9uZ2VyIHRoYW4gbW9zdCBvZiB5b3VyIG93biBsaWZlLgoKJ0hlIGxlZnQgaXQgd2l0aCBtZSBiZWZvcmUgdGhhdCBsYXN0IGJpZyBleHBlZGl0aW9uLCcgRWxlYW5vciBzYXlzLiAnVG9sZCBtZSB0byBrZWVwIGl0IHNvbWV3aGVyZSBzYWZlLCBzb21ld2hlcmUgdGhhdCB3YXNuJ3QgdGhlIGZpZWxkLCBpbiBjYXNlIGhlIGRpZG4ndCBjb21lIGJhY2sgdG8gbmVlZCBpdC4gVGhlbiBoZSBkaWQgY29tZSBiYWNrIOKAlCBkaWZmZXJlbnQsIHRob3VnaCwgcXVpZXRlciDigJQgYW5kIHNvbWVob3cgbmVpdGhlciBvZiB1cyBldmVyIGdvdCByb3VuZCB0byBtZSBhY3R1YWxseSBnaXZpbmcgaXQgYmFjay4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGUgd2FzIGxpa2UsIGJlZm9yZSBhbGwgdGhlIG1vdW50YWlucw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RWxlYW5vciB0YWxrcyBmb3IgYSBsb25nIHdoaWxlLCB1bmh1cnJpZWQsIHBhaW50aW5nIGEgZnVsbGVyIHBpY3R1cmUgdGhhbiB0aGUgd2hvbGUgcmVzdCBvZiB0aGlzIGpvdXJuZXkgaGFzIG1hbmFnZWQg4oCUIGEgYm95IHdobyBsb3ZlZCBtYXBzIGJlZm9yZSBoZSBldmVyIGxvdmVkIG1vdW50YWlucywgd2hvIHdhcyBjbHVtc3kgYW5kIGZ1bm55IGFuZCBlbnRpcmVseSB1bnJlbWFya2FibGUgaW4gbW9zdCBvZiB0aGUgb3JkaW5hcnkgd2F5cywgcmlnaHQgdXAgdW50aWwgdGhlIHNwZWNpZmljLCBjYXJlZnVsIGF0dGVudGlvbiBoZSBicm91Z2h0IHRvIGFueXRoaW5nIGhlIGFjdHVhbGx5IGNhcmVkIGFib3V0LgoKJ0hlIHdhc24ndCBhIG15c3RlcnksIG5vdCByZWFsbHksJyBzaGUgc2F5cy4gJ0p1c3QgYSBtYW4gd2hvIGZvdW5kIGl0IGVhc2llciB0byBmaW5pc2ggbWFwcyB0aGFuIHRvIGZpbmlzaCBjb252ZXJzYXRpb25zLiBJIGxvdmVkIGhpbSBmb3IgaXQgYW55d2F5LCBzYW1lIGFzIGV2ZXJ5b25lIHdobyByZWFsbHkga25ldyBoaW0gZGlkLic=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbm90ZWJvb2sgcHJvcGVybHk=', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'U2hlIHBsYWNlcyB0aGUgbm90ZWJvb2sgaW4geW91ciBoYW5kcyB3aXRoIHJlYWwsIGNhcmVmdWwgY2VyZW1vbnkg4oCUIHRoZSBsYXN0IHBpZWNlLCBnZW51aW5lbHksIHRoZSBjYWxpYnJhdGlvbiBub3RlcyB0aGF0IGNvbXBsZXRlIG5vdCBqdXN0IHRoZSBpbnN0cnVtZW50J3MgcGh5c2ljYWwgYXNzZW1ibHkgYnV0IGl0cyB3aG9sZSB3b3JraW5nIHB1cnBvc2UsIGV2ZXJ5IG1lYXN1cmVtZW50IG5vdyBwcm9wZXJseSBkb2N1bWVudGVkIGFuZCBjcm9zcy1yZWZlcmVuY2VkIGF0IGxhc3QuCgonRmluaXNoIHRoZSByZWFkaW5nLCcgRWxlYW5vciBzYXlzLiAnV2hlcmV2ZXIgaXQncyB3YWl0aW5nLiBIZSdkIHdhbnQgdGhhdCBtb3JlIHRoYW4gaGUgZXZlciB3YW50ZWQgYW55b25lIGZ1c3Npbmcgb3ZlciBoaW0gcGVyc29uYWxseSwgSSB0aGluay4gVGhhdCB3YXMgYWx3YXlzIHJhdGhlciB0aGUgcG9pbnQgb2YgaGltLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBwcmVwYXJlIHRvIGxlYXZl', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IHNpdCB3aXRoIEVsZWFub3IgYSB3aGlsZSBsb25nZXIgYmVmb3JlIHlvdSBnbywgdGhlIEFwcGFsYWNoaWFucycgb2xkIHNvZnQgcGVha3Mgc2V0dGxpbmcgaW50byBldmVuaW5nIGFyb3VuZCB0aGUgZmFybWhvdXNlLCBub3RoaW5nIGxlZnQgbm93IGJ1dCB0aGUgZmluYWwgam91cm5leSBob21lIGFuZCB3aGF0ZXZlciByZWFkaW5nIHRoZSBjb21wbGV0ZWQgaW5zdHJ1bWVudCBpcyBmaW5hbGx5IGFibGUgdG8gdGFrZS4KCkdyZXRhLCB3YWl0aW5nIGJ5IHRoZSBDb250b3VyLCBkb2Vzbid0IHJ1c2ggdGhlIGdvb2RieWUuIFdoZW4geW91IGZpbmFsbHkgZG8gY2xpbWIgYWJvYXJkLCBzaGUganVzdCBhc2tzLCBxdWlldGx5OiAnUmVhZHk/Jw==',
            'choices' => [
                ['text' => 'U2F5IHllcywgcHJvcGVybHkgcmVhZHk=', 'next' => '7_end_ready'],
                ['text' => 'QWRtaXQgeW91J3JlIG5vdCBzdXJlIHlvdSBhcmU=', 'next' => '7_end_unsure'],
            ],
        ],
        '7_end_ready' => [
            'prose'  => 'J1llcywnIHlvdSBzYXksIGFuZCBmaW5kIHlvdSBtZWFuIGl0IGNvbXBsZXRlbHkg4oCUIG5vdCBicmF2YWRvLCBqdXN0IGEgZ2VudWluZSwgc2V0dGxlZCByZWFkaW5lc3MgdGhhdCdzIGJlZW4gYnVpbGRpbmcgdGhpcyB3aG9sZSBsb25nIGpvdXJuZXkgd2l0aG91dCB5b3UgcXVpdGUgbm90aWNpbmcgaXQgYXJyaXZlLiBFdmVyeSBwaWVjZSBpcyBoZXJlLiBFdmVyeSBzdG9yeSdzIGJlZW4gaGVhcmQuIFRoZXJlJ3Mgbm90aGluZyBsZWZ0IG5vdyBidXQgdGhlIGxhc3QgZmxpZ2h0IGhvbWUuCgpUaGUgQ29udG91ciBsaWZ0cyBvZmYgdGhlIEFwcGFsYWNoaWFucycgb2xkLCB3b3JuIHBlYWtzIGludG8gYSBza3kgZ29uZSBwcm9wZXJseSBnb2xkIHdpdGggZXZlbmluZywgYW5kIGZvciB0aGUgZmlyc3QgdGltZSB0aGlzIHdob2xlIHRyaXAsIHRoZSBlbmRpbmcgYWhlYWQgZmVlbHMgbGlrZSBhbiBhcnJpdmFsIHJhdGhlciB0aGFuIGEgbG9zcy4=',
            'ending' => true,
        ],
        '7_end_unsure' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gbm90IHN1cmUgSSBhbSwnIHlvdSBhZG1pdCwgYW5kIEdyZXRhLCBpbnN0ZWFkIG9mIHB1c2hpbmcgYmFjaywganVzdCBub2RzLCB1bmRlcnN0YW5kaW5nIGNvbXBsZXRlbHkuICdHb29kLCcgc2hlIHNheXMsIHN1cnByaXNpbmcgeW91LiAnTWVhbnMgaXQncyBhY3R1YWxseSBtYXR0ZXJlZCwgdGhlIHdob2xlIHdheSB0aHJvdWdoLiBSZWFkeSBvciBub3QsIHRob3VnaCDigJQgaXQncyB0aW1lLicKClRoZSBDb250b3VyIGxpZnRzIG9mZiB0aGUgQXBwYWxhY2hpYW5zJyBvbGQsIHdvcm4gcGVha3MgaW50byBhIHNreSBnb25lIHByb3Blcmx5IGdvbGQgd2l0aCBldmVuaW5nLCB1bmNlcnRhaW50eSBhbmQgcmVhZGluZXNzIHNpdHRpbmcgc2lkZSBieSBzaWRlIGluIHlvdSB0aGUgd2hvbGUgY2xpbWIsIG5laXRoZXIgb25lIGNhbmNlbGxpbmcgdGhlIG90aGVyIG91dC4=',
            'ending' => true,
        ],
    ],
];
