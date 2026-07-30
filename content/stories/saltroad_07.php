<?php
return [
    'id'    => 7,
    'title' => 'Old Friends, Given the Choice',
    'color' => '#A83A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'Q2hhbmcnYW4g4oCUIG9sZCBpbXBlcmlhbCBjYXBpdGFsLCBlYXN0ZXJuIGFuY2hvciBvZiB0aGUgd2hvbGUgU2lsayBSb2FkIOKAlCBzcHJhd2xzIGluIGxheWVycyBvZiBoaXN0b3J5LCBhbmNpZW50IGNpdHkgd2FsbHMgc3RhbmRpbmcgYWxvbmdzaWRlIGNvbnNpZGVyYWJseSBuZXdlciBjb25zdHJ1Y3Rpb24gd2l0aCB0aGUgcGFydGljdWxhciBjb25maWRlbmNlIG9mIGEgcGxhY2UgdGhhdCdzIHNpbXBseSBhbHdheXMgYmVlbiBpbXBvcnRhbnQuIFRvbWFzIHBvaW50cyBvdXQgdGhlIG9sZCBtYXJrZXQgZGlzdHJpY3Qgd2l0aCByZWFsLCBwcmFjdGlzZWQgZmFtaWxpYXJpdHkuCgpUd28gcm91dGVzIHRvd2FyZCB0aGUgdHJhZGluZyBob3VzZSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIG9sZCBjaXR5IHdhbGxzJyBtYWluIGdhdGUsIGZvcm1hbCBhbmQgcHJvcGVybHkgYW5ub3VuY2VkLCBvciBhIHNpZGUgZW50cmFuY2UgdXNlZCBtb3N0bHkgYnkgbG9uZy1lc3RhYmxpc2hlZCB0cmFkaW5nIGZhbWlsaWVzIHdobyBkb24ndCBuZWVkIHRoZSBjZXJlbW9ueS4=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhyb3VnaCB0aGUgbWFpbiBnYXRl', 'next' => '2_main'],
                ['text' => 'VXNlIHRoZSBzaWRlIGVudHJhbmNl', 'next' => '2_side'],
            ],
        ],
        '2_main' => [
            'prose'  => 'VGhlIG1haW4gZ2F0ZSBpcyBwcm9wZXJseSBjZXJlbW9uaWFsLCBndWFyZHMgYW5kIGZvcm1hbCBwcm9jZWR1cmUgc2xvd2luZyB5b3VyIGVudHJ5IGJ1dCBsZW5kaW5nIHJlYWwgd2VpZ2h0IHRvIHRoZSB3aG9sZSBhcHByb2FjaC4gQnkgdGhlIHRpbWUgeW91J3JlIGFjdHVhbGx5IGluc2lkZSB0aGUgb2xkIHdhbGxzLCB3b3JkIG9mIHlvdXIgYnVzaW5lc3MgaGFzIGNsZWFybHkgdHJhdmVsbGVkIGFoZWFkIHRocm91Z2ggZW50aXJlbHkgcHJvcGVyIGNoYW5uZWxzLgoKWW91IGFycml2ZSBhdCB0aGUgdHJhZGluZyBob3VzZSBleHBlY3RlZCwgYW5kIHRyZWF0ZWQgd2l0aCBhIGNvcnJlc3BvbmRpbmcgZGVncmVlIG9mIGZvcm1hbCByZXNwZWN0Lg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgaG91c2UncyBoZWFk', 'next' => '3_shared'],
            ],
        ],
        '2_side' => [
            'prose'  => 'VGhlIHNpZGUgZW50cmFuY2UgaXMgZmFzdGVyLCBpbmZvcm1hbCwgdXNlZCBieSBwZW9wbGUgd2hvJ3ZlIGVhcm5lZCB0aGUgcmlnaHQgdG8gc2tpcCB0aGUgY2VyZW1vbnkgdGhyb3VnaCBkZWNhZGVzIG9mIGVzdGFibGlzaGVkIHJlbGF0aW9uc2hpcC4gVG9tYXMgY2xlYXJseSBoYXMgdGhhdCBzdGFuZGluZywgYW5kIHlvdSBiZW5lZml0IGZyb20gaXQsIGFycml2aW5nIGNvbnNpZGVyYWJseSBxdWlja2VyIHRoYW4gdGhlIG1haW4gZ2F0ZSB3b3VsZCBoYXZlIGFsbG93ZWQuCgonT2xkIGhhYml0cywnIGhlIHNheXMsIGJ5IHdheSBvZiBleHBsYW5hdGlvbi4gJ1NvbWUgZG9vcnMgeW91IGVhcm4gdGhlIHJpZ2h0IHRvIHVzZSBwcm9wZXJseSwgZXZlbnR1YWxseS4n',
            'choices' => [
                ['text' => 'TWVldCB0aGUgaG91c2UncyBoZWFk', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHRyYWRpbmcgaG91c2UncyBjdXJyZW50IGhlYWQsIE1hZGFtIExpYW5nLCByZWNlaXZlcyB5b3Ugd2l0aCBjYXJlZnVsLCBtZWFzdXJlZCBjb3VydGVzeSDigJQgaGVyIGZhbWlseSBhbmQgWXNvbGRlJ3Mgd2VyZSBnZW51aW5lIGNvbW1lcmNpYWwgcml2YWxzIG9uY2UsIGdlbmVyYXRpb25zIGJhY2ssIHJlYWwgY29tcGV0aXRpb24gdGhhdCBvY2Nhc2lvbmFsbHkgdHVybmVkIHNoYXJwIGJlZm9yZSBldmVudHVhbGx5LCBncmFkdWFsbHksIG1lbGxvd2luZyBpbnRvIHNvbWV0aGluZyBsaWtlIG11dHVhbCByZXNwZWN0IGFzIGJvdGggaG91c2VzIGFnZWQuCgonSSBoYXZlIHlvdXIgd2VkZ2UsJyBzaGUgY29uZmlybXMuICdUcmFkZWQgZmFpcmx5LCBpbiB0aGUgZW5kLCBhZnRlciBkZWNhZGVzIG9mIHJpdmFscnkgZmluYWxseSB3ZWFyaW5nIGl0c2VsZiBvdXQgaW50byBzb21ldGhpbmcgbW9yZSBzZW5zaWJsZS4gQnV0IEkgd29uJ3Qgc2ltcGx5IGhhbmQgaXQgdG8gYSBzdHJhbmdlci4gR2l2ZSBtZSBhbiBob25lc3QgYWNjb3VudGluZyBvZiBob3cgdGhlIEhvdXNlIG9mIFlzb2xkZSBhY3R1YWxseSBkZWNsaW5lZC4gSSd2ZSBoZWFyZCBydW1vdXJzIGZvciB5ZWFycy4gSSdkIGxpa2UgdGhlIHRydXRoLCBmb3Igb25jZSwgZnJvbSBzb21lb25lIHdobydkIGFjdHVhbGx5IGtub3cgaXQuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'RGVjaWRlIGhvdyB0byBnaXZlIGl0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGNvdWxkIGdpdmUgaGVyIHRoZSBhY2NvdW50aW5nIHByb3Blcmx5LCBmcm9tIHRoZSBhY3R1YWwgZmluYW5jaWFsIHJlY29yZHMgYW5kIGxldHRlcnMgeW91J3ZlIGdhdGhlcmVkIOKAlCBkYXRlcywgc3VtcywgdGhlIHNwZWNpZmljIGRvY3VtZW50ZWQgc2VxdWVuY2Ugb2YgZGVjaXNpb25zIHRoYXQgbGVkIHRoZSBob3VzZSBmcm9tIHByb3NwZXJpdHkgdG8gcnVpbi4gT3IgeW91IGNvdWxkIGdpdmUgaXQgdG8gaGVyIHBlcnNvbmFsbHksIGhvbmVzdGx5LCBmcm9tIHdoYXQgeW91J3ZlIGFjdHVhbGx5IGZlbHQgYW5kIGxlYXJuZWQgcGllY2luZyB0aGUgc3RvcnkgdG9nZXRoZXIgdGhpcyB3aG9sZSBqb3VybmV5LCBpbXBlcmZlY3QgYW5kIHN1YmplY3RpdmUgYnV0IGdlbnVpbmVseSwgcGVyc29uYWxseSB0cnVlLgoKJ0VpdGhlcidzIHJlYWwsJyBzaGUgc2F5cy4gJ0knZCB0YWtlIGVpdGhlciBzZXJpb3VzbHkuIENob29zZSB3aGljaGV2ZXIgeW91IGNhbiBhY3R1YWxseSBnaXZlIHByb3Blcmx5Lic=',
            'choices' => [
                ['text' => 'R2l2ZSB0aGUgZmFjdHVhbCwgZG9jdW1lbnRlZCBhY2NvdW50aW5n', 'next' => '5_factual'],
                ['text' => 'R2l2ZSB0aGUgaG9uZXN0LCBwZXJzb25hbCBhY2NvdW50', 'next' => '5_personal'],
            ],
        ],
        '5_factual' => [
            'prose'  => 'WW91IGxheSBvdXQgdGhlIGFjdHVhbCBzZXF1ZW5jZSwgY2FyZWZ1bGx5LCBmcm9tIHRoZSByZWNvcmRzIOKAlCB0aGUgbG9zdCBzaGlwbWVudCwgdGhlIHVuY2FsbGVkIGRlYnRzLCBhIHNsb3cgYWNjdW11bGF0aW9uIG9mIGdvb2QgaW50ZW50aW9ucyB0aGF0IG5ldmVyIHF1aXRlIHRyYW5zbGF0ZWQgaW50byBwcm9wZXJseSBjbG9zZWQgYWNjb3VudHMsIGRlY2FkZSBhZnRlciBkZWNhZGUsIHVudGlsIHRoZXJlIHdhcyBzaW1wbHkgbm90aGluZyBsZWZ0IHRvIHJ1biBhIHRyYWRpbmcgaG91c2Ugb24gYnV0IHNlbnRpbWVudC4KCk1hZGFtIExpYW5nIGxpc3RlbnMgd2l0aCByZWFsIHByb2Zlc3Npb25hbCBhdHRlbnRpb24sIG5vZGRpbmcgYXQgcG9pbnRzIHRoYXQgY2xlYXJseSBjb25maXJtIHJ1bW91cnMgc2hlJ2QgaGFsZi1iZWxpZXZlZCBmb3IgeWVhcnMu',
            'choices' => [
                ['text' => 'U2VlIGhlciByZWFjdGlvbg==', 'next' => '6_shared'],
            ],
        ],
        '5_personal' => [
            'prose'  => 'WW91IHRlbGwgaGVyIGluc3RlYWQgd2hhdCB5b3UndmUgYWN0dWFsbHkgZmVsdCwgcGllY2luZyB0aGlzIHdob2xlIHN0b3J5IHRvZ2V0aGVyIOKAlCBub3QganVzdCB0aGUgZmFjdHMsIGJ1dCB0aGUgc3BlY2lmaWMgYWNoZSBvZiBhIGZhbWlseSB0aGF0IGNsZWFybHkgY2FyZWQgbW9yZSBhYm91dCBkb2luZyByaWdodCBieSBwZW9wbGUgdGhhbiBhYm91dCBwcm90ZWN0aW5nIGl0cyBvd24gcHJvc3Blcml0eSwgZ2VuZXJhdGlvbiBhZnRlciBnZW5lcmF0aW9uLCB1bnRpbCBjYXJpbmcgcHJvcGVybHkgYW5kIHN1cnZpdmluZyBwcm9wZXJseSBzdG9wcGVkIGJlaW5nIGNvbXBhdGlibGUuCgpNYWRhbSBMaWFuZyBsaXN0ZW5zIHdpdGggcmVhbCwgdW5leHBlY3RlZCBlbW90aW9uLCBzb21ldGhpbmcgaW4gaGVyIG93biBjYXJlZnVsIGNvbXBvc3VyZSBzb2Z0ZW5pbmcgYnkgdGhlIGVuZC4=',
            'choices' => [
                ['text' => 'U2VlIGhlciByZWFjdGlvbg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J1RoYW5rIHlvdSwnIHNoZSBzYXlzLCB3aGljaGV2ZXIgYWNjb3VudGluZyB5b3UgZ2F2ZSwgd2l0aCByZWFsLCBnZW51aW5lIHNpbmNlcml0eS4gJ015IG93biBmYW1pbHkgYWx3YXlzIGFzc3VtZWQgdGhlIHdvcnN0IOKAlCBjYXJlbGVzc25lc3MsIGluY29tcGV0ZW5jZS4gSXQncyByYXRoZXIgZGlmZmVyZW50LCBoZWFyaW5nIGl0IHdhcyBtb3N0bHkgZ2VuZXJvc2l0eSB0aGF0IHJhbiBvdXQgb2Ygcm9vbSB0byBzdXN0YWluIGl0c2VsZi4nIFNoZSBoYW5kcyBvdmVyIHRoZSB3ZWRnZS4gJ1dlIHdlcmUgcml2YWxzIG9uY2UuIEkgZmluZCBJJ2QgcmF0aGVyIGJlIHJlbWVtYmVyZWQgYXMgc29tZXRoaW5nIGNsb3NlciB0byBvbGQgZnJpZW5kcywgZ2l2ZW4gdGhlIGNob2ljZS4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIENoYW5nJ2FuJ3MgbGF5ZXJlZCBvbGQgd2FsbHMgY2F0Y2hpbmcgdGhlIGxhc3Qgb2YgdGhlIGRheSdzIGxpZ2h0LCB0aGUgYWNjb3VudGluZyB5b3UgZ2F2ZSDigJQgZmFjdHVhbCBvciBwZXJzb25hbCwgd2hpY2hldmVyIHlvdSBjaG9zZSDigJQgc2V0dGxpbmcgaW50byB5b3UgZGlmZmVyZW50bHkgbm93IHRoYXQgaXQncyBiZWVuIHByb3Blcmx5IHNwb2tlbiBhbG91ZCB0byBzb21lb25lIHdobyBnZW51aW5lbHkgbmVlZGVkIHRvIGhlYXIgaXQuCgpUb21hcywgd2Fsa2luZyBiZXNpZGUgeW91LCBsb29rcyB0aG91Z2h0ZnVsbHkgYXQgdGhlIG9sZCBjaXR5LiAnRnVubnksIGhvdyBtdWNoIG9mIHRoaXMgd2hvbGUgam91cm5leSB0dXJucyBvdXQgdG8gYmUgYWJvdXQgdGVsbGluZyB0aGUgdHJ1dGggcHJvcGVybHkgdG8gcGVvcGxlIHdobyd2ZSBiZWVuIHdhaXRpbmcgYSBsb25nIHRpbWUgdG8gaGVhciBpdC4n',
            'choices' => [
                ['text' => 'U2F5IHRoYXQgbWlnaHQgYmUgdGhlIGFjdHVhbCBwb2ludCBvZiB0aGUgd2hvbGUgdGhpbmc=', 'next' => '8_end_point'],
                ['text' => 'U2F5IHlvdSBoYWRuJ3QgcXVpdGUgdGhvdWdodCBvZiBpdCB0aGF0IHdheQ==', 'next' => '8_end_notthought'],
            ],
        ],
        '8_end_point' => [
            'prose'  => 'J1RoYXQgbWlnaHQgYmUgdGhlIGFjdHVhbCBwb2ludCBvZiB0aGUgd2hvbGUgdGhpbmcsIGhvbmVzdGx5LCcgeW91IHNheSwgYW5kIGZpbmQgdGhlIHRob3VnaHQgc2V0dGxlcyBzb21ldGhpbmcgaW4geW91IOKAlCBub3QganVzdCBuaW5lIHdlZGdlcyBhbmQgb25lIGJyb2tlbiBzZWFsLCBidXQgbmluZSBob25lc3QgY29udmVyc2F0aW9ucywgbmluZSB0cnV0aHMgZmluYWxseSBzcG9rZW4gdG8gcGVvcGxlIHdobydkIGVhcm5lZCB0aGUgaGVhcmluZyBvZiB0aGVtLgoKVG9tYXMgbm9kcyBzbG93bHkuICdZc29sZGUgd291bGQgaGF2ZSBsaWtlZCB0aGF0IGZyYW1pbmcuIFNoZSBhbHdheXMgc2FpZCBhIGRlYnQgcHJvcGVybHkgZXhwbGFpbmVkIHdhcyBoYWxmIHBhaWQgYWxyZWFkeSwgcmVnYXJkbGVzcyBvZiB3aGF0IGFjdHVhbGx5IGNoYW5nZWQgaGFuZHMuJw==',
            'ending' => true,
        ],
        '8_end_notthought' => [
            'prose'  => 'J0kgaGFkbid0IHF1aXRlIHRob3VnaHQgb2YgaXQgdGhhdCB3YXksJyB5b3UgYWRtaXQsIHR1cm5pbmcgdGhlIGlkZWEgb3ZlciBhcyB0aGUgY2FyYXZhbiBtb3ZlcyBvbiBmcm9tIENoYW5nJ2FuJ3Mgb2xkIHdhbGxzIGludG8gdGhlIGV2ZW5pbmcuICdCdXQgeW91IG1pZ2h0IGJlIHJpZ2h0LicKClRvbWFzIGRvZXNuJ3QgcHVzaCB0aGUgcG9pbnQgZnVydGhlciwgbGV0dGluZyBpdCBzaW1wbHkgc2l0IHdpdGggeW91IGFzIHRoZSBhbmNpZW50IGNhcGl0YWwgZmFkZXMgaW50byB0aGUgZGFya2VuaW5nIHNreWxpbmUgYmVoaW5kIHlvdSDigJQgb25lIG1vcmUgaG9uZXN0IGNvbnZlcnNhdGlvbiwgcXVpZXRseSwgcHJvcGVybHkgZmluaXNoZWQu',
            'ending' => true,
        ],
    ],
];
