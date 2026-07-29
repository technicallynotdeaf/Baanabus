<?php
return [
    'id'    => 13,
    'title' => 'Two Faces of the Same Light',
    'color' => '#9A7A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UGluZ2VsYXAgaXMgYSBzbWFsbCwgY2FsbSBhdG9sbCwgdGhyZWUgaXNsZXRzIGFyb3VuZCBhIHNoYWxsb3cgbGFnb29uLCBhbmQgb25lIG9mIHRoZSBmaXJzdCB0aGluZ3MgU29sYW5nZSBtZW50aW9ucyBvbiB0aGUgYXBwcm9hY2gg4oCUIGdlbnRseSwgZmFjdHVhbGx5LCB0aGUgd2F5IHlvdSdkIG1lbnRpb24gYW55IG90aGVyIGZlYXR1cmUgb2YgYSBwbGFjZSDigJQgaXMgdGhhdCBhIGdvb2QgbnVtYmVyIG9mIHBlb3BsZSBoZXJlIHNlZSB0aGUgd29ybGQgZGlmZmVyZW50bHkgdGhhbiBtb3N0OiBhIHJhcmUgaW5oZXJpdGVkIGNvbmRpdGlvbiwgY29tbW9uIGVub3VnaCBvbiB0aGlzIG9uZSBhdG9sbCB0byBiZSBzaW1wbHkgcGFydCBvZiBkYWlseSBsaWZlIHJhdGhlciB0aGFuIGFueXRoaW5nIHJlbWFya2FibGUsIGV4dHJhIHNoYWRlIG92ZXIgZG9vcndheXMsIHN1bmdsYXNzZXMgaGFuZGVkIHRvIGNoaWxkcmVuIGFzIGEgbWF0dGVyIG9mIGNvdXJzZSwgZmlzaGluZyB0aW1lZCBhcm91bmQgdGhlIGdsYXJlIG9mIG9wZW4gd2F0ZXIuCgpUd28gc2hvcmUgcGF0aHMgY3VybCB0b3dhcmQgdGhlIG1haW4gc2V0dGxlbWVudCwgb25lIGFsb25nIHRoZSBsYWdvb24ncyBjYWxtZXIgc2lkZSwgb25lIGZhY2luZyB0aGUgd2luZHdhcmQgcmVlZiDigJQgZGlmZmVyZW50IHZpZXdzIG9mIHRoZSBzYW1lIHNob3J0IHdhbGsu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbGFnb29uIHBhdGg=', 'next' => '2_lagoon'],
                ['text' => 'VGFrZSB0aGUgd2luZHdhcmQgcGF0aA==', 'next' => '2_windward'],
            ],
        ],
        '2_lagoon' => [
            'prose'  => 'VGhlIGxhZ29vbiBwYXRoIGlzIGVhc3ksIHNoYWRlZCwgY2hpbGRyZW4gcGxheWluZyBpbiB3YXRlciBzbyBjYWxtIGl0IGJhcmVseSBjb3VudHMgYXMgYSBoYXphcmQsIHNldmVyYWwgb2YgdGhlbSBzcXVpbnRpbmcgY29tZm9ydGFibHkgYmVoaW5kIHN1bmdsYXNzZXMgY2xlYXJseSBzaXplZCBmb3IgYWR1bHRzIGFuZCBqdXN0IGFzIGNsZWFybHkgaGFuZGVkIGRvd24gd2l0aG91dCBtdWNoIGNlcmVtb255LgoKQSB5b3VuZyBtYW4gbWVuZGluZyBhIG5ldCBsb29rcyB1cCBhcyB5b3UgcGFzcywgdW5ib3RoZXJlZCBieSB0aGUgbWlkZGF5IGdsYXJlIGluIGEgd2F5IHRoYXQgc3VnZ2VzdHMgZWl0aGVyIGdvb2QgZXllcyBvciBsb25nIHByYWN0aWNlIG1hbmFnaW5nIGJhZCBvbmVzLiBIZSBrbm93cyBleGFjdGx5IHdobyB5b3UncmUgbG9va2luZyBmb3IgYmVmb3JlIHlvdSBmaW5pc2ggZXhwbGFpbmluZy4gJ1NlcGUsJyBoZSBzYXlzLiAnU2hlJ2xsIGJlIGF0IHRoZSBob3VzZSBwYXN0IHRoZSBjaHVyY2guIEV2ZXJ5b25lIGVuZHMgdXAgdGhlcmUgZXZlbnR1YWxseSwgb25lIHdheSBvciBhbm90aGVyLic=',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIGhvdXNlIHBhc3QgdGhlIGNodXJjaA==', 'next' => '3_shared'],
            ],
        ],
        '2_windward' => [
            'prose'  => 'VGhlIHdpbmR3YXJkIHBhdGggaXMgYnJpZ2h0ZXIsIGhhcmRlciBvbiB0aGUgZXllcywgd2F2ZXMgd29ya2luZyB0aGUgb3V0ZXIgcmVlZiBpbnRvIGEgc3RlYWR5IHdoaXRlIHJvYXIgdGhhdCBuZXZlciBxdWl0ZSBsZXRzIHVwLiBZb3UgcGFzcyBhIHdvbWFuIHdvcmtpbmcgZW50aXJlbHkgYnkgZmVlbCBhbmQgc2hhZG93IHJhdGhlciB0aGFuIGxvb2tpbmcgZGlyZWN0bHkgYXQgdGhlIHdhdGVyLCBtb3ZlbWVudHMgc3VyZSBkZXNwaXRlIHRoZSBzcXVpbnQgc2hlIG5ldmVyIGZ1bGx5IGxvc2VzIGV2ZW4gaW4gdGhlIHNoYWRlIG9mIGhlciBvd24gaGF0IGJyaW0uCgpTaGUgcG9pbnRzIHlvdSBvbndhcmQgd2l0aG91dCBuZWVkaW5nIHRvIGhlYXIgdGhlIHdob2xlIHF1ZXN0aW9uLiAnU2VwZS4gUGFzdCB0aGUgY2h1cmNoLicgU2hlIHNheXMgaXQgbGlrZSBhIGRpcmVjdGlvbiBzbyB3ZWxsLXdvcm4gaXQgYmFyZWx5IG5lZWRzIHRoZSByZXN0IG9mIHRoZSBzZW50ZW5jZSBhdHRhY2hlZC4=',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIGhvdXNlIHBhc3QgdGhlIGNodXJjaA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'U2VwZSB0dXJucyBvdXQgdG8gYmUgbmVpdGhlciB5b3VuZyBub3Igb2xkLCBicmlzaywgcHJhY3RpY2FsLCBhbmQgZW50aXJlbHkgYXQgZWFzZSBiZWhpbmQgYSBwYWlyIG9mIGRlZXBseSB0aW50ZWQgZ2xhc3NlcyBzaGUgZG9lc24ndCBzbyBtdWNoIHdlYXIgYXMgcmVseSBvbiwgdGhlIHdheSB5b3UnZCByZWx5IG9uIGEgZ29vZCBwYWlyIG9mIGJvb3RzLiBTaGUga25vd3MgQXVudGllJ3MgbmFtZSBpbW1lZGlhdGVseSDigJQgJ3NoZSBzYXQgcmlnaHQgdGhlcmUsIHllYXJzIGJhY2ssIGFuZCBhc2tlZCBnb29kIHF1ZXN0aW9ucyBpbnN0ZWFkIG9mIHJ1ZGUgb25lcycg4oCUIGFuZCBkb2Vzbid0IHdhaXQgZm9yIHlvdSB0byBleHBsYWluIGZ1cnRoZXIgYmVmb3JlIGdldHRpbmcgdG8gdGhlIHBvaW50LgoKJ015IGNvdXNpbiBuZWVkcyBwcm9wZXIgbGVuc2VzIGdyb3VuZCBiZWZvcmUgdGhlIGZpc2hpbmcgc2Vhc29uIHN0YXJ0cywnIHNoZSBzYXlzLiAnQ2FuJ3Qgd29yayB0aGUgZ2xhcmUgd2l0aG91dCB0aGVtLCBhbmQgdGhlIGxhc3QgcGFpciBjcmFja2VkLiBZb3UndmUgZ290IGhhbmRzLiBHb29kLiBTaXQuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2l0IGFuZCBoZWxw', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIHdvcmsgc3BsaXRzIGludG8gZ3JpbmRpbmcgdGhlIGxlbnMgaXRzZWxmIHRvIHRoZSByaWdodCBkZXB0aCBvZiB0aW50IOKAlCBwYXRpZW50LCBleGFjdGluZywgY2hlY2tlZCBjb25zdGFudGx5IGFnYWluc3QgdGhlIGxpZ2h0IOKAlCBhbmQgc2hhcGluZyBhbmQgZml0dGluZyB0aGUgZnJhbWUgZnJvbSB3aGF0IG1hdGVyaWFscyBhcmUgb24gaGFuZCwgd2hpY2ggdHVybnMgb3V0IHRvIGJlIGl0cyBvd24gY2FyZWZ1bCBwdXp6bGUgb2YgY29tZm9ydCBhbmQgZHVyYWJpbGl0eS4gU2VwZSBjYW4gb25seSBwcm9wZXJseSBzdXBlcnZpc2Ugb25lIGF0IGEgdGltZS4KCidHcmluZGluZyB3YW50cyBhIHN0ZWFkeSBoYW5kIGFuZCBubyBydXNoaW5nLCcgc2hlIHNheXMuICdGcmFtZSB3YW50cyBwYXRpZW5jZSBvZiBhIGRpZmZlcmVudCBraW5kLiBQaWNrIG9uZS4gSSdsbCBtYW5hZ2UgdGhlIG90aGVyIG15c2VsZiwgc2FtZSBhcyBhbHdheXMuJw==',
            'choices' => [
                ['text' => 'R3JpbmQgdGhlIGxlbnM=', 'next' => '5_grind'],
                ['text' => 'U2hhcGUgdGhlIGZyYW1l', 'next' => '5_frame'],
            ],
        ],
        '5_grind' => [
            'prose'  => 'R3JpbmRpbmcgdGhlIGxlbnMgdG8gdGhlIHJpZ2h0IGRlbnNpdHkgaXMgc2xvdywgaW5jcmVtZW50YWwgd29yaywgY2hlY2tlZCBvdmVyIGFuZCBvdmVyIGFnYWluc3QgdGhlIGRvb3J3YXkncyBsaWdodCB1bnRpbCB0aGUgdGludCBzaXRzIGV4YWN0bHkgd2hlcmUgaXQgbmVlZHMgdG8g4oCUIHRvbyBwYWxlIGFuZCBpdCBkb2VzIG5vdGhpbmcsIHRvbyBkYXJrIGFuZCB0aGUgd29ybGQgZGlzYXBwZWFycyBhbG9uZyB3aXRoIHRoZSBnbGFyZS4gU2VwZSBjb3JyZWN0cyB5b3VyIGFuZ2xlIG9uY2UsIGZpcm1seSwgYW5kIHRoZSBkaWZmZXJlbmNlIGlzIGltbWVkaWF0ZSBhbmQgb2J2aW91cyBldmVuIHRvIHlvdS4KCkJ5IHRoZSBlbmQgeW91ciBzaG91bGRlcnMgYWNoZSBpbiB0aGUgc3BlY2lmaWMgd2F5IG9mIHdvcmsgdGhhdCBkZW1hbmRlZCBwYXRpZW5jZSByYXRoZXIgdGhhbiBzdHJlbmd0aC4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBwYWlyIGZpbmlzaGVk', 'next' => '6_shared'],
            ],
        ],
        '5_frame' => [
            'prose'  => 'U2hhcGluZyB0aGUgZnJhbWUgZnJvbSBhIHN1bi1ibGVhY2hlZCBzdHJpcCBvZiBsb2NhbCB3b29kIGlzIGZpZGRseSwgZXhhY3Rpbmcgd29yaywgZXZlcnkgYWRqdXN0bWVudCBjaGVja2VkIGFnYWluc3QgYW4gYWN0dWFsIGZhY2UgcmF0aGVyIHRoYW4gYSBndWVzcywgY29tZm9ydCBtYXR0ZXJpbmcgYXMgbXVjaCBhcyBmaXQgZm9yIHNvbWV0aGluZyBtZWFudCB0byBiZSB3b3JuIGZyb20gZGF3biB0byBkdXNrIHdpdGhvdXQgY29tcGxhaW50LgoKU2VwZSBub2RzIGFsb25nIGFzIHlvdSB3b3JrLCBvY2Nhc2lvbmFsbHkgdGFraW5nIHRoZSBmcmFtZSBmcm9tIHlvdXIgaGFuZHMgdG8gY29ycmVjdCBhIGN1cnZlIGJ5IGZlZWwgcmF0aGVyIHRoYW4gc2lnaHQsIHRydXN0aW5nIGhlciBmaW5nZXJzIG92ZXIgaGVyIGV5ZXMgZm9yIHRoaXMgcGFydGljdWxhciBqb2IgaW4gYSB3YXkgdGhhdCBzYXlzIG1vcmUgYWJvdXQgaGVyIHdob2xlIHJlbGF0aW9uc2hpcCB3aXRoIHRoZSB3b3JsZCB0aGFuIGFueSBleHBsYW5hdGlvbiB3b3VsZC4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBwYWlyIGZpbmlzaGVk', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QmV0d2VlbiB0aGUgdHdvIGhhbHZlcyBvZiB0aGUgd29yaywgYSBwcm9wZXIgcGFpciBvZiB0aW50ZWQgc3BlY3RhY2xlcyBjb21lcyB0b2dldGhlciBieSBldmVuaW5nIOKAlCBsZW5zIGFuZCBmcmFtZSBmaXR0ZWQsIHRlc3RlZCwgYWRqdXN0ZWQgdHdpY2UgbW9yZSBiZWZvcmUgU2VwZSdzIGZpbmFsbHkgc2F0aXNmaWVkLiBIZXIgY291c2luLCBmZXRjaGVkIGZyb20gdGhlIHNob3JlLCBwdXRzIHRoZW0gb24gYW5kIHNpbXBseSBzdGFuZHMgdGhlcmUgYSBtb21lbnQsIHN0aWxsLCBpbiBhIHdheSB0aGF0IHNheXMgbW9yZSB0aGFuIGFueSB0aGFua3Mgd291bGQuCgonVGhlcmUsJyBTZXBlIHNheXMsIHF1aWV0IHNhdGlzZmFjdGlvbiB1bmRlciB0aGUgYnJpc2sgcHJhY3RpY2FsaXR5LiAnVGhhdCdzIHdoYXQgcHJvcGVyIGhlbHAgYWN0dWFsbHkgbG9va3MgbGlrZS4gTm90IGZpeGluZyBzb21lb25lLiBKdXN0IGxldHRpbmcgdGhlbSBzZWUgd2hhdCB0aGV5IHdlcmUgYWx3YXlzIGdvaW5nIHRvIHNlZSBhbnl3YXksIHdpdGhvdXQgaXQgaHVydGluZyB0byBnZXQgdGhlcmUuJw==',
            'choices' => [
                ['text' => 'VGFrZSB5b3VyIGxlYXZl', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'U2VwZSBoYW5kcyB5b3UgYSBzZWNvbmQsIGlkZW50aWNhbCBwYWlyIGJlZm9yZSB5b3UgZ28g4oCUICdmb3Igd2hlcmV2ZXIgeW91J3JlIGhlYWRlZCBuZXh0LCBpbiBjYXNlIHRoZSBnbGFyZSBnZXRzIHRvIHNvbWVvbmUgZWxzZSBhbG9uZyB0aGUgd2F5JyDigJQgcHJhY3RpY2FsIHRvIHRoZSB2ZXJ5IGxhc3QsIG5vIGNlcmVtb255IGF0dGFjaGVkIHRvIHRoZSBnaWZ0IGJleW9uZCB0aGUgZ2lmdCBpdHNlbGYuCgpZb3Ugd2FsayBiYWNrIGFsb25nIHRoZSBsYWdvb24gaW4gdGhlIGRheSdzIHNvZnRlbmluZyBsaWdodCwgdGhlIHNlYSBjYWxtIG9uIG9uZSBzaWRlIGFuZCB0aGUgcmVlZiBzdGlsbCB3b3JraW5nIGl0cyBzdGVhZHkgcm9hciBvbiB0aGUgb3RoZXIsIHRoZSBzYW1lIGF0b2xsIHdlYXJpbmcgdHdvIGVudGlyZWx5IGRpZmZlcmVudCBmYWNlcyBkZXBlbmRpbmcgb24gd2hpY2ggd2F5IHlvdSBoYXBwZW4gdG8gYmUgbG9va2luZy4=',
            'choices' => [
                ['text' => 'VHJ5IHRoZSB0aW50ZWQgc3BlY3RhY2xlcyB5b3Vyc2VsZiBiZWZvcmUgeW91IGdv', 'next' => '8_end_try'],
                ['text' => 'UGFjayB0aGVtIGF3YXkgY2FyZWZ1bGx5IGluc3RlYWQ=', 'next' => '8_end_pack'],
            ],
        ],
        '8_end_try' => [
            'prose'  => 'WW91IHRyeSB0aGVtIG9uLCBqdXN0IGZvciBhIG1vbWVudCwgY3VyaW91cyB3aGF0IFNlcGUncyB3aG9sZSBsaWZlIGxvb2tzIGxpa2UgdGhyb3VnaCB0aGlzIHBhcnRpY3VsYXIgbGVucy4gVGhlIGdsYXJlIG9mZiB0aGUgbGFnb29uIHNvZnRlbnMgaW5zdGFudGx5LCBjb2xvdXJzIGZsYXR0ZW5pbmcgc2xpZ2h0bHkgYXQgdGhlIGVkZ2VzLCB0aGUgd29ybGQgZ29pbmcgcXVpZXRlciBpbiBhIHdheSB0aGF0IGlzbid0IHdvcnNlLCBqdXN0IGRpZmZlcmVudCDigJQgYSB2ZXJzaW9uIG9mIHNlZWluZyBidWlsdCBmb3IgYSB2ZXJ5IHNwZWNpZmljIGtpbmQgb2YgbGlnaHQuCgpZb3UgaGFuZCB0aGVtIGJhY2sgYmVmb3JlIHRoZSBLxY10dWt1IGxpZnRzLCBnbGFkIHRvIGhhdmUgdW5kZXJzdG9vZCBzb21ldGhpbmcgeW91J2QgbmV2ZXIgaGF2ZSB1bmRlcnN0b29kIGJ5IHNpbXBseSBiZWluZyB0b2xkIGFib3V0IGl0LCBhbmQgZ2xhZGRlciBzdGlsbCB0aGF0IFNlcGUncyBjb3VzaW4gZ2V0cyB0byBrZWVwIHRoZSB2ZXJzaW9uIGJ1aWx0IHNwZWNpZmljYWxseSBmb3IgaGltLg==',
            'ending' => true,
        ],
        '8_end_pack' => [
            'prose'  => 'WW91IHBhY2sgdGhlbSBhd2F5IGNhcmVmdWxseSBpbnN0ZWFkLCB1bm9wZW5lZCwgZGVjaWRpbmcgc29tZSB0aGluZ3MgYXJlIGJldHRlciBjYXJyaWVkIHRoYW4gdHJpZWQg4oCUIHRoZXNlIGxlbnNlcyB3ZXJlIG1hZGUgZm9yIHNvbWVvbmUgZWxzZSdzIGV5ZXMgYW5kIHNvbWVvbmUgZWxzZSdzIGdsYXJlLCBhbmQgdHJ5aW5nIHRoZW0gb24gZm9yIGEgY3VyaW91cyBtaW51dGUgZmVlbHMsIHNvbWVob3csIGxpa2UgaXQgd291bGQgbWlzcyB0aGUgcG9pbnQgb2YgdGhlIHdob2xlIGNhcmVmdWwgYWZ0ZXJub29uLgoKVGhlIEvFjXR1a3UgbGlmdHMgb2ZmIG92ZXIgdGhlIGxhZ29vbidzIGNhbG0gd2F0ZXIgYW5kIHRoZSByZWVmJ3Mgc3RlYWR5IHJvYXIgYm90aCBhdCBvbmNlLCBQaW5nZWxhcCdzIHR3byBmYWNlcyByZWNlZGluZyB0b2dldGhlciwgYW5kIHlvdSBmaW5kIHRoZSBzcGVjdGFjbGVzIHJpZGUgZWFzaWVyIGluIHRoZSBzYXRjaGVsIGZvciBoYXZpbmcgYmVlbiBsZWZ0IGV4YWN0bHkgYXMgU2VwZSBtYWRlIHRoZW0g4oCUIG5vdCB5b3VycyB0byB0ZXN0LCBvbmx5IHlvdXJzIHRvIGNhcnJ5IHNhZmVseSBvbndhcmQu',
            'ending' => true,
        ],
    ],
];
