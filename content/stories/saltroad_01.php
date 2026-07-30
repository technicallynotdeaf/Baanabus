<?php
return [
    'id'    => 1,
    'title' => 'Someone Will Need to Finish This',
    'color' => '#B8863A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEhvdXNlIG9mIFlzb2xkZSBoYXMgYmVlbiBjbG9zZWQgZm9yIGxvbmdlciB0aGFuIHlvdSd2ZSBiZWVuIGFsaXZlLCBpdHMgb25jZS1ncmFuZCB0cmFkaW5nIGZsb29yIHJlZHVjZWQgdG8gZHVzdCwgY29id2VicywgYW5kIHRoZSBwYXJ0aWN1bGFyIGhvbGxvdyBlY2hvIG9mIGEgYnVpbGRpbmcgdGhhdCB1c2VkIHRvIG1hdHRlciBhbmQgbm8gbG9uZ2VyIGRvZXMuIFlvdSd2ZSBjb21lIHRvIGZpbmFsbHkgY2xlYXIgaXQsIHRocmVlIGdlbmVyYXRpb25zIHRvbyBsYXRlLCB0aGUgc29saWNpdG9yJ3Mgbm90aWNlIGFib3V0IHVucGFpZCBkZWJ0cyBhZ2FpbnN0IHRoZSBvbGQgZXN0YXRlIGZpbmFsbHkgZm9yY2luZyB3aGF0IG5vYm9keSBlbHNlIGluIHRoZSBmYW1pbHkgZXZlciBxdWl0ZSBtYW5hZ2VkLgoKVHdvIHRoaW5ncyB3YWl0IGFtb25nIHRoZSBsYXN0IG9mIFlzb2xkZSdzIGVmZmVjdHMsIHdyYXBwZWQgdG9nZXRoZXIgaW4gb2lsZWQgY2xvdGg6IGEgYnJva2VuIGxldHRlciBvZiBkZWJ0LCBpdHMgd2F4IHNlYWwgc2hhdHRlcmVkIGNsZWFuIGluIGhhbGYsIGFuZCBhIHNpbmdsZSBicmFzcyB3ZWRnZSDigJQgb25lIG5pbnRoLCB5b3UnbGwgY29tZSB0byBsZWFybiwgb2Ygc29tZXRoaW5nIHRoYXQgd2FzIG9uY2Ugd2hvbGUu',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgbGV0dGVyIGZpcnN0', 'next' => '2_letter'],
                ['text' => 'RXhhbWluZSB0aGUgd2VkZ2UgZmlyc3Q=', 'next' => '2_wedge'],
            ],
        ],
        '2_letter' => [
            'prose'  => 'VGhlIGxldHRlciBpcyBZc29sZGUncyBvd24gaGFuZCwgcHJlY2lzZSBkZXNwaXRlIGl0cyBhZ2UsIHJlY29yZGluZyBhIGRlYnQgb3dlZCBub3QgYnkgaGVyIGZhbWlseSwgYnV0IFRPIHRoZW0g4oCUIGEgZGVidCBzaGUgYXBwYXJlbnRseSBuZXZlciBjYWxsZWQgaW4sIGZvciByZWFzb25zIHRoZSBsZXR0ZXIgaXRzZWxmIGRvZXNuJ3QgZXhwbGFpbi4gVGhlIGJyb2tlbiBzZWFsIHN1Z2dlc3RzIGl0IHdhcyBtZWFudCB0byBiZSBwcmVzc2VkIGFnYWluLCBjb21wbGV0ZWQsIGJlZm9yZSBpdCBjb3VsZCBldmVyIGJlIGhvbm91cmVkLgoKQSBzaW5nbGUgbGluZSwgYWRkZWQgbGF0ZXIgaW4gZGlmZmVyZW50IGluaywgY2F0Y2hlcyB5b3VyIGV5ZTogKkkgb3dlIHRoZW0gbW9yZSB0aGFuIHRoZXkgZXZlciBvd2VkIG1lLiBTb21lb25lIHdpbGwgbmVlZCB0byBmaW5pc2ggdGhpcyBwcm9wZXJseSwgc29tZWRheS4q',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIHdlZGdlIGFjdHVhbGx5IGlz', 'next' => '3_shared'],
            ],
        ],
        '2_wedge' => [
            'prose'  => 'VGhlIHdlZGdlIGlzIHNtYWxsLCBkZW5zZSwgcHJlY2lzZWx5IGN1dCDigJQgY2xlYXJseSBvbmUgcGllY2Ugb2Ygc29tZXRoaW5nIGxhcmdlciwgYSBwdXp6bGUtc2hhcGUgd2l0aCB0d28gc3RyYWlnaHQgZWRnZXMgYW5kIG9uZSBjdXJ2ZWQsIG1lYW50IHRvIGludGVybG9jayB3aXRoIHBpZWNlcyB5b3UgZG9uJ3QgeWV0IGhhdmUuIFR1cm5pbmcgaXQgb3ZlciByZXZlYWxzIGZpbmUgZW5ncmF2aW5nIG9uIGl0cyBmbGF0IGZhY2UsIGhhbGYgYSBzeW1ib2wgdGhhdCBtZWFucyBub3RoaW5nIG9uIGl0cyBvd24uCgpUdWNrZWQgYmVuZWF0aCBpdCwgdGhlIGJyb2tlbiBsZXR0ZXIgb2YgZGVidCwgc2VhbGVkIHdpdGggd2F4IHNwbGl0IGNsZWFuIGRvd24gdGhlIG1pZGRsZS4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIGxldHRlciBhY3R1YWxseSBzYXlz', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgY2FtZSB0byBpdCwgdGhlIHNoYXBlIG9mIHRoZSB0aGluZyBpcyB0aGUgc2FtZTogYSBzZWFsIGJyb2tlbiBpbnRvIG5pbmUgcGllY2VzLCBzY2F0dGVyZWQgYWNyb3NzIGEgdHJhZGUgcm91dGUgdGhhdCBvbmNlIHN0cmV0Y2hlZCBmcm9tIGhlcmUgdG8gdGhlIE1lZGl0ZXJyYW5lYW4sIGFuZCBhIGRlYnQgWXNvbGRlIG5ldmVyIGNhbGxlZCBpbiwgbGVmdCBmb3Igd2hvZXZlciBmaW5hbGx5IGNsZWFyZWQgdGhpcyBob3VzZSB0byBlaXRoZXIgZmluaXNoIG9yIHNpbXBseSBmb3JnZXQuCgpZb3UncmUgc3RpbGwgdHVybmluZyB0aGUgd2VkZ2Ugb3ZlciBpbiB5b3VyIGhhbmRzLCB3ZWlnaGluZyBleGFjdGx5IGhvdyBsYXJnZSBhIHRhc2sgdGhpcyBhY3R1YWxseSBpcywgd2hlbiBhIGtub2NrIHNvdW5kcyBhdCB0aGUgZG9vciDigJQgdGhyZWUsIHVuaHVycmllZCwgdGhlIGtub2NrIG9mIHNvbWVvbmUgd2hvJ3MgY2xlYXJseSBkb25lIHRoaXMgYmVmb3JlLg==',
            'terminal' => true,
            'choices' => [
                ['text' => 'QW5zd2VyIGl0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIG1hbiBhdCB0aGUgZG9vciBpcyBicm9hZCwgd2VhdGhlcmVkLCBzb21ld2hlcmUgcGFzdCBmb3J0eSwgYW5kIGludHJvZHVjZXMgaGltc2VsZiBiZWZvcmUgeW91J3ZlIHByb3Blcmx5IG9wZW5lZCB0aGUgZG9vciBhbGwgdGhlIHdheS4gJ1RvbWFzIEF2ZWlyby4gSSBicm9rZXIgcGFzc2FnZSBhbmQgZ29vZHMgYWxvbmcgdGhlIG9sZCByb3V0ZSDigJQgaGF2ZSBkb25lIGZvciB0d2VudHkgeWVhcnMuIEkga25ldyBZc29sZGUncyBzdG9yeSBiZWZvcmUgeW91IHdlcmUgbGlrZWx5IGV2ZW4gYm9ybi4nIEhlIGdsYW5jZXMgcGFzdCB5b3UgYXQgdGhlIHJ1aW5lZCB0cmFkaW5nIGZsb29yLiAnSSdtIG5vdCBoZXJlIGZvciBjaGFyaXR5LiBJJ20gb2ZmZXJpbmcgcGFzc2FnZSwgcHJvcGVybHksIHRvIHdob2V2ZXIgZmluYWxseSBkZWNpZGVzIHRvIGNsb3NlIG91dCB3aGF0IHNoZSBsZWZ0IG9wZW4uJw==',
            'choices' => [
                ['text' => 'SGVhciBoaW0gb3V0IHByb3Blcmx5', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'SGUncyBhbHJlYWR5IGRpc2N1c3Npbmcgcm91dGVzIGFuZCBvbGQgYWxsaWVkIHRyYWRpbmcgaG91c2VzIHdoZW4gc29tZXRoaW5nIGxhbmRzIG9uIHRoZSBkb29yZnJhbWUgYWJvdmUgeW91IGJvdGgg4oCUIGEgaHVudGluZyBoYXdrLCB1bm5hbWVkLCB1bmJvdGhlcmVkLCByZWdhcmRpbmcgeW91IHdpdGggdGhlIGZsYXQsIGFzc2Vzc2luZyBwYXRpZW5jZSBvZiBhIGNyZWF0dXJlIHRoYXQncyBqdWRnZWQgYSBncmVhdCBtYW55IHN0cmFuZ2VycyBiZWZvcmUgYW5kIHJhcmVseSBib3RoZXJzIGJlaW5nIHdyb25nLgoKJ1NoZSBjb21lcyB3aXRoIHRoZSBvZmZlciwnIFRvbWFzIHNheXMsIGVudGlyZWx5IHVuYm90aGVyZWQgYnkgdGhlIGhhd2sncyBzdWRkZW4gYXJyaXZhbC4gJ0RvZXNuJ3QgbXVjaCBsaWtlIG1vc3QgcGVvcGxlLiBSZXNlcnZlIGp1ZGdtZW50IG9uIHdoYXQgdGhhdCBtZWFucyBhYm91dCB5b3UsIGVpdGhlciB3YXkuJw==',
            'choices' => [
                ['text' => 'RGVjaWRlIHdoYXQgdG8gZG8=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SXQncyBub3QgYSBzbWFsbCBkZWNpc2lvbiwgd2hhdGV2ZXIgVG9tYXMncyBicmlzayBtYW5uZXIgbWFrZXMgaXQgZmVlbCBsaWtlIOKAlCBuaW5lIHdlZGdlcyBzY2F0dGVyZWQgYWNyb3NzIGhhbGYgYSBjb250aW5lbnQncyB3b3J0aCBvZiBvbGQgdHJhZGUgY2l0aWVzLCBhIGRlYnQgZ2VuZXJhdGlvbnMgb3ZlcmR1ZSwgYSBob3VzZSB0aGF0J3MgYmVlbiBxdWlldGx5IGZhaWxpbmcgdGhpcyB3aG9sZSBmYW1pbHkgZm9yIGxvbmdlciB0aGFuIGFueW9uZSBhbGl2ZSBwcm9wZXJseSByZW1lbWJlcnMuCgpZb3UgY291bGQgYWNjZXB0IGhpcyBvZmZlciB0b2RheSwgd2hpbGUgdGhlIHJlc29sdmUgaG9sZHMuIE9yIHlvdSBjb3VsZCB0YWtlIG9uZSBtb3JlIG5pZ2h0IGhlcmUsIGFsb25lIHdpdGggd2hhdCdzIGxlZnQgb2YgdGhlIEhvdXNlIG9mIFlzb2xkZSwgYmVmb3JlIGNvbW1pdHRpbmcgdG8gZmluaXNoIHdoYXQgc2hlIGNvdWxkbid0Lg==',
            'choices' => [
                ['text' => 'QWNjZXB0IGhpcyBvZmZlciB0b2RheQ==', 'next' => '7_end_today'],
                ['text' => 'VGFrZSBvbmUgbW9yZSBuaWdodCBpbiB0aGUgaG91c2UgZmlyc3Q=', 'next' => '7_end_night'],
            ],
        ],
        '7_end_today' => [
            'prose'  => 'WW91IGFjY2VwdCB0b2RheSwgdGhlIHJlc29sdmUgdG9vIGZyYWdpbGUgdG8gdHJ1c3Qgb3Zlcm5pZ2h0LCBhbmQgVG9tYXMgZG9lc24ndCBydXNoIHlvdSBleGFjdGx5IGJ1dCBkb2Vzbid0IHNsb3cgZG93biBlaXRoZXIg4oCUIGJ5IHRoZSB0aW1lIHlvdSd2ZSBnYXRoZXJlZCB0aGUgd2VkZ2UsIHRoZSBsZXR0ZXIsIGFuZCBhIHRyYXZlbGxlcidzIHNlYWwtY2FzZSBzaXplZCBmb3IgdGhlIGVpZ2h0IHBpZWNlcyBzdGlsbCBtaXNzaW5nLCBoaXMgb3duIGNhcmF2YW4gaXMgYWxyZWFkeSBhc3NlbWJsaW5nIGluIHRoZSBzdHJlZXQgb3V0c2lkZS4KClRoZSBydWluZWQgSG91c2Ugb2YgWXNvbGRlIHNocmlua3MgYmVoaW5kIHlvdSBhcyB5b3UgZmluYWxseSBsZWF2ZSBpdCwgcHJvcGVybHksIGZvciB0aGUgZmlyc3QgdGltZSBpbiB0aHJlZSBnZW5lcmF0aW9ucyDigJQgbm90IGFiYW5kb25lZCB0aGlzIHRpbWUsIGJ1dCBnZW51aW5lbHksIGRlbGliZXJhdGVseSBjbG9zaW5nLCBvbiBpdHMgd2F5IHRvIGJlaW5nIGNsb3NlZCB0aGUgcmlnaHQgd2F5IGF0IGxhc3Qu',
            'ending' => true,
        ],
        '7_end_night' => [
            'prose'  => 'WW91IGFzayBmb3Igb25lIG1vcmUgbmlnaHQsIGFuZCBUb21hcywgdG8gaGlzIGNyZWRpdCwgZG9lc24ndCBhcmd1ZSDigJQgc2ltcGx5IHRlbGxzIHlvdSB3aGVyZSB0byBmaW5kIGhpbSBhdCBkYXduLCBhbmQgbGVhdmVzIHlvdSBhbG9uZSB3aXRoIHRoZSBob3VzZSBvbmUgbGFzdCB0aW1lLCB3YWxraW5nIGl0cyBlbXB0eSwgZHVzdC10aGljayByb29tcyB0aGUgd2F5IG5vbmUgb2YgeW91ciBmYW1pbHkgcHJvcGVybHkgbWFuYWdlZCB0byBiZWZvcmUgeW91LgoKWW91IGxlYXZlIGF0IGZpcnN0IGxpZ2h0IHdpdGggdGhlIHdlZGdlLCB0aGUgbGV0dGVyLCBhbmQgYSBzZWFsLWNhc2Ugc2l6ZWQgZm9yIHdoYXQncyBzdGlsbCBtaXNzaW5nIOKAlCBhbmQgd2l0aCB0aGUgaG91c2UgcHJvcGVybHkgc2FpZCBnb29kYnllIHRvLCBmb3IgdGhlIGZpcnN0IHRpbWUgaW4gdGhyZWUgZ2VuZXJhdGlvbnMsIHJhdGhlciB0aGFuIHNpbXBseSwgcXVpZXRseSwgbGVmdCB0byBmYWlsLg==',
            'ending' => true,
        ],
    ],
];
