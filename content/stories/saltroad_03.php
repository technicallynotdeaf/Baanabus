<?php
return [
    'id'    => 3,
    'title' => 'Kept Safe, Waiting',
    'color' => '#D0B070',

    'pages' => [
        '1_start' => [
            'prose'  => 'TWVydiByaXNlcyBmcm9tIHRoZSBLYXJha3VtIGRlc2VydCBpbiBydWluIGFmdGVyIHBhdGllbnQgcnVpbiDigJQgbXVkYnJpY2sgd2FsbHMgYW5kIHRoZSBlbm9ybW91cywgd2VhdGhlcmVkIGRvbWUgb2YgYSBtYXVzb2xldW0sIGFsbCB0aGF0IHJlbWFpbnMgb2YgYSBjaXR5IHRoYXQgd2FzIG9uY2UsIGJ5IHNvbWUgYWNjb3VudHMsIHRoZSBsYXJnZXN0IGluIHRoZSB3b3JsZC4gVG9tYXMgZ3Jvd3MgcXVpZXQgYXMgeW91IGFwcHJvYWNoLCB0aGUgcGFydGljdWxhciBxdWlldCBvZiBzb21lb25lIHN0YW5kaW5nIHNvbWV3aGVyZSB0aGF0IHVzZWQgdG8gbWF0dGVyIGVub3Jtb3VzbHkgYW5kIG5vIGxvbmdlciBkb2VzLCBleGNlcHQgdG8gdGhlIHBlb3BsZSB3aG8gc3RpbGwgY2hvb3NlIHRvIHJlbWVtYmVyIGl0IHByb3Blcmx5LgoKVHdvIHdheXMgaW50byB0aGUgcnVpbnMgcHJlc2VudCB0aGVtc2VsdmVzOiB0aHJvdWdoIHRoZSBvbGQgY2l0YWRlbCB3YWxscywgZGlyZWN0IGJ1dCBleHBvc2VkIHRvIHRoZSBmdWxsIGRlc2VydCBzdW4sIG9yIGFyb3VuZCBieSBhIGxvd2VyIHJvdXRlIHRoYXQga2VlcHMgbW9zdGx5IHRvIHNoYWRlIGNhc3QgYnkgdGhlIHN0YW5kaW5nIHdhbGxzLg==',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgY2l0YWRlbCB3YWxscw==', 'next' => '2_citadel'],
                ['text' => 'VGFrZSB0aGUgc2hhZGVkIGxvd2VyIHJvdXRl', 'next' => '2_shade'],
            ],
        ],
        '2_citadel' => [
            'prose'  => 'VGhlIGRpcmVjdCByb3V0ZSB0YWtlcyB5b3Ugc3RyYWlnaHQgdGhyb3VnaCB0aGUgb2xkIGNpdGFkZWwncyBicm9rZW4gd2FsbHMsIHN1biBiZWF0aW5nIGRvd24gd2l0aG91dCBtZXJjeSwgdGhlIHNjYWxlIG9mIHRoZSBydWlucyBvbmx5IGZ1bGx5IGFwcGFyZW50IG9uY2UgeW91J3JlIHByb3Blcmx5IGluc2lkZSB0aGVtIOKAlCBjb3VydHlhcmRzIGFuZCBjaGFtYmVycyBzdHJldGNoaW5nIGZ1cnRoZXIgdGhhbiB5b3UgZXhwZWN0ZWQsIGFsbCBvZiBpdCBzaWxlbnQgZXhjZXB0IGZvciB3aW5kIGZpbmRpbmcgZ2FwcyBpbiBhbmNpZW50IGJyaWNrLgoKWW91IGFycml2ZSBhdCB0aGUgY2FyZXRha2VyJ3MgdGVudCBzdW4tc2NvdXJlZCBhbmQgZ2VudWluZWx5IGh1bWJsZWQgYnkgdGhlIHNoZWVyIHNpemUgb2Ygd2hhdCB1c2VkIHRvIHN0YW5kIGhlcmUu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHRlbnQ=', 'next' => '3_shared'],
            ],
        ],
        '2_shade' => [
            'prose'  => 'VGhlIGxvd2VyIHJvdXRlIGtlZXBzIG1vc3RseSB0byBzaGFkb3csIHdlYXZpbmcgYmV0d2VlbiBzdGFuZGluZyB3YWxscyBpbiBhIHBhdGggdGhhdCBjbGVhcmx5IHJlZmxlY3RzIGdlbmVyYXRpb25zIG9mIHBlb3BsZSBsZWFybmluZyBleGFjdGx5IHdoZXJlIHRoZSBzaGFkZSBhY3R1YWxseSBmYWxscyBhdCB0aGlzIHRpbWUgb2YgZGF5LiBJdCdzIGNvb2xlciwgc2xvd2VyLCBhbmQgZ2l2ZXMgeW91IHJlYWwgdGltZSB0byBwcm9wZXJseSBhYnNvcmIgdGhlIHNjYWxlIG9mIHRoZSBydWlucyBhcm91bmQgeW91LgoKWW91IGFycml2ZSBhdCB0aGUgY2FyZXRha2VyJ3MgdGVudCBjb25zaWRlcmFibHkgbW9yZSBjb21mb3J0YWJsZSwgYW5kIG5vIGxlc3MgaHVtYmxlZCBieSBpdCBhbGwu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHRlbnQ=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGNhcmV0YWtlciBmYW1pbHkgaGFzIGxpdmVkIGFsb25nc2lkZSB0aGVzZSBydWlucyBmb3IgdGhyZWUgZ2VuZXJhdGlvbnMsIHRlbmRpbmcgdGhlbSBpbmZvcm1hbGx5LCB1bm9mZmljaWFsbHksIHNpbXBseSBiZWNhdXNlIHNvbWVvbmUgYWx3YXlzIGhhcyBhbmQgaXQgbmV2ZXIgb2NjdXJyZWQgdG8gdGhlbSB0byBzdG9wLiBUaGUgZWxkZXN0LCBBbWFuLCBwcm9kdWNlcyB0aGUgd2VkZ2UgZnJvbSBhIHNtYWxsIGxvY2tlZCBib3ggdGhlIG1vbWVudCB5b3VyIGVycmFuZCdzIGV4cGxhaW5lZCwgYXMgdGhvdWdoIGhlJ3MgYmVlbiB3YWl0aW5nIGZvciBleGFjdGx5IHRoaXMgdmlzaXQgaGlzIHdob2xlIGxpZmUuCgonTXkgZ3JhbmRmYXRoZXIgZm91bmQgaXQgaW4gdGhlIHJ1YmJsZSwnIGhlIHNheXMuICdLZXB0IGl0IHNhZmUsIHRvbGQgaGlzIGNoaWxkcmVuIHRvIGtlZXAgaXQgc2FmZSwgdG9sZCB0aGVtIHRvIHRlbGwgdGhlaXIgb3duIGNoaWxkcmVuIHRoZSBzYW1lLiBXZSBuZXZlciBrbmV3IHdoYXQgaXQgd2FzIGZvci4gT25seSB0aGF0IHNvbWVvbmUsIHNvbWVkYXksIHdvdWxkIGNvbWUgYXNraW5nIHByb3Blcmx5LCBhbmQgdGhhdCB3ZSBzaG91bGQgYmUgcmVhZHkgd2hlbiB0aGV5IGRpZC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGlmIHRoZXJlJ3MgYW55dGhpbmcgeW91IGNhbiBkbyBpbiByZXR1cm4=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'QW1hbiBjb25zaWRlcnMgdGhlIG9mZmVyIHNlcmlvdXNseS4gJ1RoZSBydWlucyB3YW50IHRlbmRpbmcsIGFsd2F5cyDigJQgY2xlYXJpbmcgc2FuZCBmcm9tIHRoZSBvbGQgY2FuYWwgc3lzdGVtLCBvciBzaW1wbHkgaGVscGluZyByZWNvcmQgd2hhdCdzIGhlcmUgcHJvcGVybHksIGJlZm9yZSBtb3JlIG9mIGl0J3MgbG9zdCB0byB0aW1lIGFuZCB3ZWF0aGVyIHRoYW4gYWxyZWFkeSBoYXMgYmVlbi4gRWl0aGVyJ3MgcmVhbCwgdXNlZnVsIHdvcmsuIFdlJ2QgZ2VudWluZWx5IHdlbGNvbWUgZWl0aGVyLic=',
            'choices' => [
                ['text' => 'SGVscCBjbGVhciB0aGUgb2xkIGNhbmFsIHN5c3RlbQ==', 'next' => '5_canal'],
                ['text' => 'SGVscCByZWNvcmQgdGhlIHJ1aW5zIHByb3Blcmx5', 'next' => '5_record'],
            ],
        ],
        '5_canal' => [
            'prose'  => 'Q2xlYXJpbmcgc2FuZCBmcm9tIHRoZSBhbmNpZW50IGNhbmFsIHN5c3RlbSBpcyBob3QsIHJlcGV0aXRpdmUsIGdlbnVpbmVseSBzYXRpc2Z5aW5nIHdvcmssIHRoZSBvbGQgZW5naW5lZXJpbmcgcmV2ZWFsZWQgZ3JhZHVhbGx5IGJlbmVhdGggeW91ciBoYW5kcyDigJQgY2hhbm5lbHMgdGhhdCBvbmNlIGNhcnJpZWQgd2F0ZXIgYWNyb3NzIGEgZ2VudWluZWx5IGVub3Jtb3VzIGFuY2llbnQgY2l0eSwgc3RpbGwgc3RydWN0dXJhbGx5IHNvdW5kIGFmdGVyIGFsbCB0aGVzZSBjZW50dXJpZXMgYnVyaWVkLgoKQW1hbiB3b3JrcyBhbG9uZ3NpZGUgeW91IHdpdGggcmVhbCwgcXVpZXQgcHJpZGUgaW4gaW5mcmFzdHJ1Y3R1cmUgaGlzIG93biBhbmNlc3RvcnMgbGlrZWx5IGhlbHBlZCBtYWludGFpbiwgb25jZSwgYSB2ZXJ5IGxvbmcgdGltZSBhZ28u',
            'choices' => [
                ['text' => 'U2VlIEFtYW4ncyBncmF0aXR1ZGU=', 'next' => '6_shared'],
            ],
        ],
        '5_record' => [
            'prose'  => 'UmVjb3JkaW5nIHRoZSBydWlucyBwcm9wZXJseSBtZWFucyBjYXJlZnVsIHNrZXRjaGluZyBhbmQgbWVhc3VyZW1lbnQsIGNhdGFsb2d1aW5nIHdhbGxzIGFuZCBjaGFtYmVycyB0aGF0IGhhdmUgbmV2ZXIgYmVlbiBmb3JtYWxseSBkb2N1bWVudGVkLCB3b3JraW5nIGFsb25nc2lkZSBBbWFuJ3Mgb3duIGRldGFpbGVkLCBpbmZvcm1hbCBrbm93bGVkZ2UgYnVpbHQgdXAgb3ZlciBkZWNhZGVzIG9mIHNpbXBseSBsaXZpbmcgaGVyZSBhbmQgcGF5aW5nIGF0dGVudGlvbi4KCkJ5IHRoZSBlbmQsIHlvdSd2ZSBwcm9kdWNlZCBzb21ldGhpbmcgZ2VudWluZWx5IHVzZWZ1bCDigJQgYSByZWNvcmQgdGhhdCBkaWRuJ3QgZXhpc3QgYmVmb3JlLCBvZiBhIHBsYWNlIHRoYXQgZGVzZXJ2ZXMgdG8gYmUgcHJvcGVybHkgcmVtZW1iZXJlZC4=',
            'choices' => [
                ['text' => 'U2VlIEFtYW4ncyBncmF0aXR1ZGU=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QW1hbiwgc2F0aXNmaWVkIHdpdGggdGhlIHdvcmsgZWl0aGVyIHdheSwgaGFuZHMgb3ZlciB0aGUgd2VkZ2Ugd2l0aCByZWFsLCB1bmh1cnJpZWQgY2VyZW1vbnkuICdUaHJlZSBnZW5lcmF0aW9ucywgd2FpdGluZywnIGhlIHNheXMuICdGZWVscyByaWdodCwgdGhhdCBpdCdzIGZpbmFsbHkgbW92aW5nIG9uIHRvIHdoZXJldmVyIGl0J3MgYWN0dWFsbHkgbmVlZGVkLiBTb21lIHRoaW5ncyBhcmVuJ3QgbWVhbnQgdG8ganVzdCBzaXQgc3RpbGwgZm9yZXZlciwgaG93ZXZlciBjYXJlZnVsbHkgdGhleSdyZSBrZXB0LicKCkhlIGdsYW5jZXMgYmFjayBhdCB0aGUgdmFzdCwgc2lsZW50IHJ1aW5zIGJlaGluZCBoaW0uICdUaGlzIHBsYWNlIHVuZGVyc3RhbmRzIHRoYXQgYmV0dGVyIHRoYW4gbW9zdCwgSSB0aGluay4gRXZlcnl0aGluZyBoZXJlIHVzZWQgdG8gYmUgc29tZXRoaW5nIGVsc2UsIG9uY2UuIEV2ZXJ5dGhpbmcgaGVyZSB3aWxsIGJlIHNvbWV0aGluZyBlbHNlIGFnYWluLCBldmVudHVhbGx5Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIE1lcnYncyBlbm9ybW91cywgcGF0aWVudCBydWlucyBzZXR0bGluZyBpbnRvIGV2ZW5pbmcgc2hhZG93IGJlaGluZCB5b3UsIHRoZSBkZXNlcnQgd2luZCBwaWNraW5nIHVwIGFzIHRoZSBzdW4gcHJvcGVybHkgc2V0cy4gVG9tYXMsIHF1aWV0ZXIgdGhhbiB1c3VhbCwgc2VlbXMgZ2VudWluZWx5IG1vdmVkIGJ5IHRoZSB3aG9sZSB2aXNpdC4KCidUaHJlZSBnZW5lcmF0aW9ucyBvZiBjYXJlZnVsIGtlZXBpbmcsJyBoZSBzYXlzIGV2ZW50dWFsbHkuICdUaGF0J3Mgbm90IG5vdGhpbmcuIFRoYXQncyBpdHMgb3duIGtpbmQgb2YgZGVidCwgaG9uZXN0bHkg4oCUIG9uZSBub2JvZHkgYXNrZWQgdGhlbSB0byBjYXJyeSwgYW5kIHRoZXkgY2FycmllZCBpdCBhbnl3YXksIGZhaXRoZnVsbHksIHRoZSB3aG9sZSB0aW1lLic=',
            'choices' => [
                ['text' => 'U2F5IFlzb2xkZSB3b3VsZCBoYXZlIGJlZW4gZ3JhdGVmdWwgZm9yIHRoYXQga2luZCBvZiBjYXJl', 'next' => '8_end_grateful'],
                ['text' => 'U2F5IGl0IG1ha2VzIHlvdSB0aGluayBkaWZmZXJlbnRseSBhYm91dCB3aGF0IHlvdSdyZSBjYXJyeWluZyB0b28=', 'next' => '8_end_carrying'],
            ],
        ],
        '8_end_grateful' => [
            'prose'  => 'J1lzb2xkZSB3b3VsZCBoYXZlIGJlZW4gZ3JhdGVmdWwgZm9yIHRoYXQga2luZCBvZiBjYXJlLCcgeW91IHNheSwgYW5kIGZpbmQgeW91cnNlbGYgbWVhbmluZyBpdCBwcm9wZXJseSDigJQgYSBmYW1pbHkgd2hvIG5ldmVyIGtuZXcgaGVyLCBrZWVwaW5nIHNvbWV0aGluZyBzYWZlIGZvciB0aHJlZSBnZW5lcmF0aW9ucyBvbiBub3RoaW5nIGJ1dCB0aGUgcGxhaW4sIHBhdGllbnQgaG9wZSB0aGF0IGl0IHdvdWxkIHNvbWVkYXkgbWF0dGVyIHRvIHNvbWVvbmUuCgpUb21hcyBub2RzIHNsb3dseS4gJ1NoZSBjaG9zZSBoZXIgcm91dGVzIHdlbGwsIHRoZW4sIGlmIHRoYXQncyB0aGUga2luZCBvZiBwZW9wbGUgc2hlIHRydXN0ZWQgYWxvbmcgdGhlbS4gR29vZCBpbnN0aW5jdCwgZXZlbiBmcm9tIHRoaXMgZmFyIHJlbW92ZWQuJw==',
            'ending' => true,
        ],
        '8_end_carrying' => [
            'prose'  => 'J0l0IG1ha2VzIG1lIHRoaW5rIGRpZmZlcmVudGx5IGFib3V0IHdoYXQgSSdtIGFjdHVhbGx5IGNhcnJ5aW5nLCBob25lc3RseSwnIHlvdSBhZG1pdCwgd2F0Y2hpbmcgTWVydidzIHJ1aW5zIHJlY2VkZSBpbnRvIHRoZSBkYXJrZW5pbmcgZGVzZXJ0LiAnTm90IGp1c3Qgd2VkZ2VzIGFuZCBkZWJ0cy4gV2hhdGV2ZXIgdGhpcyB3aG9sZSBqb3VybmV5IHR1cm5zIGludG8sIGZvciB3aG9ldmVyIGNvbWVzIGFmdGVyIG1lLicKClRvbWFzIGRvZXNuJ3QgYW5zd2VyIGltbWVkaWF0ZWx5LCBidXQgd2hlbiBoZSBkb2VzLCBpdCdzIHRob3VnaHRmdWwgcmF0aGVyIHRoYW4gYnJpc2suICdUaGF0J3MgdGhlIHJpZ2h0IHRoaW5nIHRvIGJlIHRoaW5raW5nLCB0aGlzIGZhciBpbi4gS2VlcCB0aGlua2luZyBpdC4gSXQnbGwgbWF0dGVyLCBldmVudHVhbGx5LCBzYW1lIGFzIEFtYW4ncyBjYXJlZnVsIGtlZXBpbmcgbWF0dGVyZWQuJw==',
            'ending' => true,
        ],
    ],
];
