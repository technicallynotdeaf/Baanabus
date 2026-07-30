<?php
return [
    'id'    => 15,
    'title' => 'Not Really How Things Work Up Here',
    'color' => '#3A3A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TWF1bmEgS2VhJ3Mgc3VtbWl0IHJpc2VzIGFib3ZlIHRoZSBjbG91ZHMgdGhlbXNlbHZlcywgdGhlIHRoaW4sIGRyeSBhaXIgYW5kIG5lYXItdG90YWwgZGFya25lc3MgbWFraW5nIGl0IG9uZSBvZiB0aGUgZmluZXN0IG9ic2VydmluZyBzaXRlcyBvbiBFYXJ0aCwgZG9tZXMgb2Ygd29ya2luZyB0ZWxlc2NvcGVzIHNjYXR0ZXJlZCBhY3Jvc3MgdGhlIHZvbGNhbmljIHJpZGdlIGxpa2Ugc3RyYW5nZSB3aGl0ZSBzZW50aW5lbHMuIFByaXlhIGxhbmRzIGNhcmVmdWxseSwgbWluZGZ1bCBvZiB0aGUgYWx0aXR1ZGUuICdXb3JraW5nIG9ic2VydmF0b3J5IHRlY2huaWNpYW4ncyBleHBlY3RpbmcgdXMsJyBzaGUgc2F5cywgdGhlbiBhZGRzLCBmbGF0bHksICdzbyBpcyBzb21lb25lIGVsc2UsIHVuZm9ydHVuYXRlbHkuJwoKVHdvIHN1bW1pdC1hY2Nlc3Mgcm91dGVzIHRvd2FyZCB0aGUgZG9tZXMgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgbWFpbnRlbmFuY2Ugcm9hZCwgb3IgYSByb3VnaGVyIHZvbGNhbmljIGZvb3RwYXRoLg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbnRlbmFuY2Ugcm9hZA==', 'next' => '2_road'],
                ['text' => 'Rm9sbG93IHRoZSB2b2xjYW5pYyBmb290cGF0aA==', 'next' => '2_footpath'],
            ],
        ],
        '2_road' => [
            'prose'  => 'VGhlIG1haW50ZW5hbmNlIHJvYWQgaXMgc21vb3RoLCBwdXJwb3NlLWJ1aWx0LCB3aW5kaW5nIHN0ZWFkaWx5IHVwIHRvd2FyZCB0aGUgY2x1c3RlciBvZiBkb21lcyB3aXRoIG5vbmUgb2YgdGhlIGZvb3RpbmcgaGF6YXJkcyB0aGUgcmF3IHZvbGNhbmljIHJvY2sgd291bGQgb3RoZXJ3aXNlIHByZXNlbnQuIFlvdSByZWFjaCB0aGUgc3VtbWl0IGNvbXBsZXggcXVpY2tseSwgdGhlIHRoaW4gYWlyIHN0aWxsIGxlYXZpbmcgeW91IHNsaWdodGx5IGJyZWF0aGxlc3MgZGVzcGl0ZSB0aGUgZWFzaWVyIHdhbGtpbmcu',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIGRvbWU=', 'next' => '3_shared'],
            ],
        ],
        '2_footpath' => [
            'prose'  => 'VGhlIHJvdWdoZXIgdm9sY2FuaWMgZm9vdHBhdGggZGVtYW5kcyBjYXJlZnVsIGZvb3Rpbmcgb3ZlciBsb29zZSByZWRkaXNoIHJvY2ssIHRoZSBzdW1taXQncyBzdGFyaywgb3RoZXJ3b3JsZGx5IGxhbmRzY2FwZSBwcmVzc2luZyBpbiBmcm9tIGV2ZXJ5IHNpZGUuIFlvdSByZWFjaCB0aGUgZG9tZSBhIGxpdHRsZSBzbG93ZXIsIGhhdmluZyBwcm9wZXJseSBmZWx0IHRoZSBtb3VudGFpbidzIHJhdywgdm9sY2FuaWMgY2hhcmFjdGVyIHVuZGVyZm9vdC4=',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIGRvbWU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SW5zaWRlLCBhIHdvcmtpbmcgdGVjaG5pY2lhbiBuYW1lZCBLYWltYW5hIGdyZWV0cyB5b3Ugd2FybWx5IOKAlCBhbmQgYmVzaWRlIGhlciwgYXJtcyBjcm9zc2VkLCB1bm1pc3Rha2FibHksIHN0YW5kcyBEci4gVm9zcywgY2xlYXJseSBoYXZpbmcgdGFsa2VkIGhpcyB3YXkgb250byB0aGUgc2l0ZSB0aHJvdWdoIHNvbWUgdW5pdmVyc2l0eSBjcmVkZW50aWFsIG9yIGFub3RoZXIuICdBaCwnIGhlIHNheXMgY29vbGx5LCBzZWVpbmcgeW91LiAnSSBkaWQgd29uZGVyIGlmIG91ciBwYXRocyB3b3VsZCBjcm9zcyBhZ2Fpbi4nCgpLYWltYW5hIGdsYW5jZXMgYmV0d2VlbiB5b3UgYm90aCwgdmlzaWJseSB1bmltcHJlc3NlZCBieSBoaXMgYXR0ZW1wdCB0byBsZXZlcmFnZSBhY2FkZW1pYyBzdGFuZGluZyBvbiBoZXIgbW91bnRhaW4uICdIZSdzIGJlZW4gdHJ5aW5nIHRvIHB1bGwgcmFuayBzaW5jZSBoZSBhcnJpdmVkLCcgc2hlIHNheXMuICdOb3QgcmVhbGx5IGhvdyB0aGluZ3Mgd29yayB1cCBoZXJlLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'RGVjaWRlIGhvdyB0byBoYW5kbGUgVm9zcydzIHByZXNlbmNl', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGNvdWxkIGlnbm9yZSBWb3NzIGVudGlyZWx5LCBwcm9jZWVkaW5nIHdpdGggS2FpbWFuYSBhcyB0aG91Z2ggaGUgd2VyZW4ndCB0aGVyZSwgb3IgeW91IGNvdWxkIGFkZHJlc3MgaGltIGRpcmVjdGx5LCBtYWtpbmcgY2xlYXIgb25jZSBtb3JlIHRoYXQgaGlzIHJhbmstcHVsbGluZyBpc24ndCBnb2luZyB0byBjaGFuZ2UgYW55dGhpbmcgYWJvdXQgaG93IHRoaXMgdmlzaXQgdW5mb2xkcy4KCkthaW1hbmEsIHdhdGNoaW5nIGJvdGggb3B0aW9ucyBwbGF5IG91dCBpbiB5b3VyIGV4cHJlc3Npb24sIHNpbXBseSB3YWl0cywgZW50aXJlbHkgdW5ib3RoZXJlZCBlaXRoZXIgd2F5Lg==',
            'choices' => [
                ['text' => 'SWdub3JlIGhpbSBlbnRpcmVseQ==', 'next' => '5_ignore'],
                ['text' => 'QWRkcmVzcyBoaW0gZGlyZWN0bHk=', 'next' => '5_address'],
            ],
        ],
        '5_ignore' => [
            'prose'  => 'SWdub3JpbmcgaGltIGVudGlyZWx5IG1lYW5zIHByb2NlZWRpbmcgY2FsbWx5IHdpdGggS2FpbWFuYSBhcyB0aG91Z2ggVm9zcyBzaW1wbHkgd2VyZW4ndCBwcmVzZW50LCBoaXMgYXR0ZW1wdGVkIGF1dGhvcml0eSB2aXNpYmx5IGRlZmxhdGluZyB3aXRoIG5vYm9keSBsZWZ0IHRvIGV4ZXJjaXNlIGl0IG9uLiBIZSBldmVudHVhbGx5IHJldHJlYXRzIHRvIGEgY29ybmVyLCBhcm1zIHN0aWxsIGNyb3NzZWQsIHdhdGNoaW5nIGluIGlycml0YXRlZCBzaWxlbmNlLgoKS2FpbWFuYSdzIHNtYWxsLCBhcHByb3Zpbmcgbm9kIHN1Z2dlc3RzIHlvdSd2ZSBoYW5kbGVkIGl0IGV4YWN0bHkgcmlnaHQu',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIHJpZGRsZSBmcm9tIEthaW1hbmE=', 'next' => '6_shared'],
            ],
        ],
        '5_address' => [
            'prose'  => 'QWRkcmVzc2luZyBoaW0gZGlyZWN0bHkgbWVhbnMgdGVsbGluZyBWb3NzIHBsYWlubHksIG9uY2UgbW9yZSwgdGhhdCBoaXMgdW5pdmVyc2l0eSBjcmVkZW50aWFscyBjYXJyeSBubyB3ZWlnaHQgaGVyZSwgd2hhdGV2ZXIgYXV0aG9yaXR5IGhlJ3MgdXNlZCB0byB3aWVsZGluZyBlbHNld2hlcmUuIEhlIGJyaXN0bGVzLCBjbGVhcmx5IHVudXNlZCB0byBiZWluZyB0b2xkIHNvIGJsdW50bHksIGJ1dCBkb2Vzbid0IGFyZ3VlIGZ1cnRoZXIsIHJldHJlYXRpbmcgdG8gd2F0Y2ggaW4gaXJyaXRhdGVkIHNpbGVuY2UgaW5zdGVhZC4KCkthaW1hbmEncyBzbWFsbCwgYXBwcm92aW5nIG5vZCBzdWdnZXN0cyB5b3UndmUgaGFuZGxlZCBpdCBleGFjdGx5IHJpZ2h0Lg==',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIHJpZGRsZSBmcm9tIEthaW1hbmE=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'S2FpbWFuYSB3YWxrcyB5b3UgdGhyb3VnaCB0aGUgcmlkZGxlIHByb3Blcmx5LCB0ZWNobmljYWwgcHJlY2lzaW9uIGFuZCBnZW51aW5lIHN0YXItbG9yZSB3b3ZlbiB0b2dldGhlciBpbiBhIHdheSB0aGF0IGNsZWFybHkgY29tZXMgZnJvbSBzb21lb25lIHdobydzIHNwZW50IHJlYWwgeWVhcnMgYWN0dWFsbHkgd29ya2luZyB0aGlzIGV4YWN0IG1vdW50YWluLiBZb3UgZHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcyBjYXJlZnVsbHksIGFuZCBzaGUgaGFuZHMgeW91IHNvbWV0aGluZyBzbWFsbCBhbmQgY29vbCB3cmFwcGVkIGluIHRpc3N1ZSBhZnRlcndhcmQuCgonQW5vdGhlciBsZW5zIGZyYWdtZW50LCcgc2hlIGV4cGxhaW5zLiAnRm91bmQgaXQgY2F0YWxvZ3Vpbmcgb2xkIGVxdWlwbWVudC4gWW91ciBncmVhdC11bmNsZSdzIG5vdGVzIG1lbnRpb24gb25lIGV4YWN0bHkgbGlrZSBpdCDigJQgc2VlbWVkIHJpZ2h0IGl0IHNob3VsZCBqb2luIHRoZSBmaXJzdC4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGxlYXZlIHRoZSBkb21lIHdpdGggdGhlIHNlY29uZCBsZW5zIGZyYWdtZW50IHR1Y2tlZCBzYWZlbHkgYWxvbmdzaWRlIHRoZSBmaXJzdCwgVm9zcyBzdGlsbCB3YXRjaGluZyBmcm9tIGhpcyBjb3JuZXIgd2l0aCBhbiBleHByZXNzaW9uIHRoYXQncyBzaGlmdGVkLCBzdWJ0bHksIGZyb20gaXJyaXRhdGlvbiB0b3dhcmQgc29tZXRoaW5nIG1vcmUgbGlrZSBncnVkZ2luZyByZWFzc2Vzc21lbnQuIFByaXlhJ3Mgd2FpdGluZyBvdXRzaWRlIHdpdGggdGhlIHRoZXJtb3MsIHRoZSBzdW1taXQncyB0aGluIGFpciBiaXRpbmcgY29sZCBkZXNwaXRlIHRoZSBjbGVhciwgYnJpbGxpYW50IHN0YXJzIG92ZXJoZWFkLgoKJ0hlIGRpZG4ndCBnZXQgYW55d2hlcmUgd2l0aCBLYWltYW5hLCcgc2hlIG5vdGVzLCB3aXRoIHJlYWwgc2F0aXNmYWN0aW9uLiAnR29vZC4gVHdvIGZyYWdtZW50cyBub3cg4oCUIHN0YXJ0aW5nIHRvIGZlZWwgbGlrZSBhIHByb3BlciBsaXR0bGUgY29sbGVjdGlvbi4n',
            'choices' => [
                ['text' => 'U2F5IFZvc3Mgc2VlbWVkIHNsaWdodGx5IGRpZmZlcmVudCB0aGlzIHRpbWU=', 'next' => '8_end_different'],
                ['text' => 'U2F5IHlvdSdyZSBqdXN0IGdsYWQgdG8gYmUgb2ZmIHRoYXQgY29sZCBtb3VudGFpbg==', 'next' => '8_end_cold'],
            ],
        ],
        '8_end_different' => [
            'prose'  => 'J0hvbmVzdGx5LCBWb3NzIHNlZW1lZCBzbGlnaHRseSBkaWZmZXJlbnQgdGhpcyB0aW1lLCcgeW91IHNheSwgdGhpbmtpbmcgb2YgaGlzIHdhdGNoZnVsLCB1bmNoYXJhY3RlcmlzdGljYWxseSBxdWlldCByZXRyZWF0IHRvIHRoZSBjb3JuZXIuICdMZXNzIGNlcnRhaW4gb2YgaGltc2VsZiB0aGFuIGJlZm9yZSwgc29tZWhvdy4gSGFyZCB0byBzYXkgZXhhY3RseSB3aGF0J3Mgc2hpZnRlZC4nCgpQcml5YSBjb25zaWRlcnMgdGhhdC4gJ01heWJlIHJhbmstcHVsbGluZyBmYWlsaW5nIHR3aWNlIGluIGEgcm93IGRvZXMgc29tZXRoaW5nIHRvIGEgcGVyc29uJ3MgY29uZmlkZW5jZS4gV2UnbGwgc2VlIGlmIGl0IGhvbGRzLCBmdXJ0aGVyIGFsb25nLic=',
            'ending' => true,
        ],
        '8_end_cold' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20ganVzdCBnbGFkIHRvIGJlIG9mZiB0aGF0IGNvbGQgbW91bnRhaW4sJyB5b3UgYWRtaXQsIHdyYXBwaW5nIGJvdGggaGFuZHMgZ3JhdGVmdWxseSBhcm91bmQgdGhlIHdhcm0gdGhlcm1vcy4gJ1Zvc3MgYXNpZGUsIHRoYXQgYWx0aXR1ZGUgYW5kIHRoYXQgd2luZCB3ZXJlIGdlbnVpbmVseSBicnV0YWwuIFNlY29uZCBmcmFnbWVudCdzIHdvcnRoIGl0LCB0aG91Z2guJwoKUHJpeWEgbGF1Z2hzLCBoYW5kaW5nIG92ZXIgYW4gZXh0cmEgYmxhbmtldC4gJ0ZhaXIuIE5leHQgc3RvcCdzIGNvbnNpZGVyYWJseSB3YXJtZXIsIEkgcHJvbWlzZS4nIFRoZSBRdWlldCBIb3VyIGxpZnRzIGF3YXkgZnJvbSBNYXVuYSBLZWEncyBzdGFyaywgc3Rhci1jcm93bmVkIHN1bW1pdCwgY2xvdWRzIHJvbGxpbmcgYmVsb3cgbGlrZSBhIHNlY29uZCwgc2lsZW50IG9jZWFuLg==',
            'ending' => true,
        ],
    ],
];
