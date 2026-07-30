<?php
return [
    'id'    => 12,
    'title' => 'A Tool That\'s Cared for Properly',
    'color' => '#5A6A7A',

    'pages' => [
        '1_start' => [
            'prose'  => 'RGFtYXNjdXMgcmlzZXMgYXJvdW5kIGl0cyBhbmNpZW50IHNvdXEsIHRoZSBjaXR5J3MgcmVwdXRhdGlvbiBmb3IgbWV0YWx3b3JrIHN0cmV0Y2hpbmcgYmFjayBzbyBmYXIgdGhhdCBpdHMgdmVyeSBuYW1lIGJlY2FtZSBhIGJ5d29yZCBmb3IgYSBwYXJ0aWN1bGFyIGtpbmQgb2YgbGVnZW5kYXJ5IHN0ZWVsLiBUb21hcyBtb3ZlcyB0aHJvdWdoIHRoZSBjb3ZlcmVkIG1hcmtldCB3aXRoIHJlYWwgcmV2ZXJlbmNlLCB0aGUgcmluZyBvZiBoYW1tZXIgb24gbWV0YWwgYSBjb25zdGFudCB1bmRlcnRvbmUgYmVuZWF0aCB0aGUgdXN1YWwgYmF6YWFyIG5vaXNlLgoKVHdvIHNvdXEgcm91dGVzIHRvd2FyZCB0aGUgbWV0YWx3b3JraW5nIGZhbWlseSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIG1haW4gY292ZXJlZCBtYXJrZXQsIGRlbnNlIHdpdGggc3RhbGxzLCBvciBhIHF1aWV0ZXIgc2lkZSBwYXNzYWdlIGZhdm91cmVkIGJ5IHdvcmtpbmcgY3JhZnRzbWVuIHJhdGhlciB0aGFuIGNhc3VhbCBzaG9wcGVycy4=',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgbWFpbiBjb3ZlcmVkIG1hcmtldA==', 'next' => '2_main'],
                ['text' => 'VGFrZSB0aGUgcXVpZXRlciBzaWRlIHBhc3NhZ2U=', 'next' => '2_side'],
            ],
        ],
        '2_main' => [
            'prose'  => 'VGhlIG1haW4gY292ZXJlZCBtYXJrZXQgaXMgZGVuc2UsIGNvbG91cmZ1bCwgZ2VudWluZWx5IG92ZXJ3aGVsbWluZyBpbiB0aGUgYmVzdCB3YXksIHN0YWxscyBvZiBtZXRhbHdvcmsgYW5kIHRleHRpbGVzIGFuZCBzcGljZXMgcGFja2VkIGNsb3NlIHRvZ2V0aGVyIHVuZGVyIGFuY2llbnQgdmF1bHRlZCBjZWlsaW5ncy4gWW91IG5hdmlnYXRlIGl0IHNsb3dseSwgYXNraW5nIGRpcmVjdGlvbnMgdHdpY2UsIGJlZm9yZSBmaW5hbGx5IHJlYWNoaW5nIHRoZSBmb3JnZSBkaXN0cmljdC4KCidPbGQgY2l0eSBoYXNuJ3QgY2hhbmdlZCBpdHMgYm9uZXMgaW4gY2VudHVyaWVzLCcgVG9tYXMgc2F5cywgY2xlYXJseSBkZWxpZ2h0ZWQgYnkgdGhlIGRlbnNpdHkgb2YgaXQgYWxsLg==',
            'choices' => [
                ['text' => 'RmluZCB0aGUgZm9yZ2U=', 'next' => '3_shared'],
            ],
        ],
        '2_side' => [
            'prose'  => 'VGhlIHNpZGUgcGFzc2FnZSBpcyBxdWlldGVyLCB1c2VkIG1vc3RseSBieSBjcmFmdHNtZW4gbW92aW5nIGJldHdlZW4gd29ya3Nob3BzIHJhdGhlciB0aGFuIGN1c3RvbWVycyBicm93c2luZyBzdGFsbHMsIHRoZSByaW5nIG9mIGhhbW1lcnMgZ3Jvd2luZyBzdGVhZGlseSBsb3VkZXIgYW5kIG1vcmUgZGlzdGluY3QgdGhlIGRlZXBlciB5b3UgZ28uCgpZb3UgYXJyaXZlIGF0IHRoZSBmb3JnZSBkaXN0cmljdCBjb25zaWRlcmFibHkgZmFzdGVyLCBhbmQgd2l0aCBhIGdlbnVpbmUgYXBwcmVjaWF0aW9uIGZvciB0aGUgc291cSdzIHdvcmtpbmcsIHVuZ2xhbW9yb3VzIHVuZGVyc2lkZS4=',
            'choices' => [
                ['text' => 'RmluZCB0aGUgZm9yZ2U=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZvcmdlIGJlbG9uZ3MgdG8gdGhlIEtoYWxpbCBmYW1pbHksIG1ldGFsd29ya2VycyBmb3IgZ2VuZXJhdGlvbnMsIHJlbm93bmVkIGV2ZW4gbm93IGZvciBhIHRlY2huaXF1ZSBvZiBsYXllcmVkLCBmb2xkZWQgc3RlZWwgdGhlaXIgYW5jZXN0b3JzIGhlbHBlZCBwZXJmZWN0IGNlbnR1cmllcyBhZ28uIFRoZSBjdXJyZW50IG1hc3RlciwgU2FtaXIsIGV4YW1pbmVzIGJvdGggdGhlIHdlZGdlIGhlJ3Mga2VwdCBhbmQgdGhlIGNhc2UgaXRzZWxmIHdpdGggcmVhbCBwcm9mZXNzaW9uYWwgaW50ZXJlc3QuCgonVGhpcyBjYXNlIGhhcyB0YWtlbiByZWFsIGRhbWFnZSBvdmVyIHlvdXIgdHJhdmVscywnIGhlIHNheXMuICdJIGNvdWxkIHJlLWZvcmdlIGl0IHByb3Blcmx5IHdoaWxlIHlvdSdyZSBoZXJlIOKAlCByZWluZm9yY2UgdGhlIGpvaW50cywgdHJ1ZSB0aGUgaGluZ2VzIOKAlCBzYW1lIGFzIEknbGwgaGFuZCBvdmVyIHRoZSB3ZWRnZS4gQnV0IGJvdGggdGFrZSByZWFsIHRpbWUsIGFuZCBJIGRvbid0IGRvIHJ1c2hlZCB3b3JrLCBvbiBwcmluY2lwbGUuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGUgbmVlZHMgZnJvbSB5b3U=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'U2FtaXIgb2ZmZXJzIHR3byB3YXlzIHRvIHNwZW5kIHRoZSBuZWNlc3NhcnkgdGltZSBwcm9kdWN0aXZlbHk6IGxlYXJuIHRoZSBiYXNpY3Mgb2YgaGlzIGZhbWlseSdzIHNwZWNpZmljIGZvbGRpbmcgdGVjaG5pcXVlIGRpcmVjdGx5IGZyb20gaGltLCBwYXRpZW50IGFuZCBleGFjdGluZywgb3IgaGVscCBoaW0gZmluaXNoIGFuIHVyZ2VudCwgdW5yZWxhdGVkIG9yZGVyIGZvciBhIGxvY2FsIGNsaWVudCB0aGF0J3MgY3VycmVudGx5IGJlaGluZCBzY2hlZHVsZS4KCidFaXRoZXIncyBob25lc3QgdXNlIG9mIHRoZSB0aW1lLCcgaGUgc2F5cy4gJ0kgZG9uJ3QgbXVjaCBjYXJlIHdoaWNoLCBzbyBsb25nIGFzIHlvdSdyZSBub3Qgc2ltcGx5IHNpdHRpbmcgaWRsZSB3aGlsZSBJIHdvcmsuJw==',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIGZvbGRpbmcgdGVjaG5pcXVl', 'next' => '5_learn'],
                ['text' => 'SGVscCBmaW5pc2ggdGhlIHVyZ2VudCBvcmRlcg==', 'next' => '5_help'],
            ],
        ],
        '5_learn' => [
            'prose'  => 'TGVhcm5pbmcgZXZlbiB0aGUgYmFzaWNzIG9mIHRoZSBmYW1pbHkncyBmb2xkaW5nIHRlY2huaXF1ZSB0YWtlcyByZWFsIHBhdGllbmNlIOKAlCBoZWF0LCB0aW1pbmcsIGEgZmVlbCBmb3IgdGhlIG1ldGFsIHRoYXQgY2xlYXJseSB0b29rIFNhbWlyJ3Mgb3duIGFuY2VzdG9ycyBnZW5lcmF0aW9ucyB0byBwcm9wZXJseSBkZXZlbG9wLiBIZSBjb3JyZWN0cyB5b3UgY29uc3RhbnRseSwgcHJlY2lzZWx5LCBhbmQgYnkgdGhlIGVuZCB5b3UndmUgcHJvZHVjZWQgc29tZXRoaW5nIHJvdWdoIGJ1dCBnZW51aW5lbHksIHJlY29nbmlzYWJseSBtYWRlIHVzaW5nIGhpcyBmYW1pbHkncyBtZXRob2QuCgpTYW1pciBleGFtaW5lcyB5b3VyIGVmZm9ydCB3aXRoIHJlYWwsIGlmIHJlc3RyYWluZWQsIGFwcHJvdmFsLiAnUm91Z2guIEJ1dCByZWFsLiBUaGF0J3MgbW9yZSB0aGFuIG1vc3QgbWFuYWdlIG9uIGEgZmlyc3QgYXR0ZW1wdC4n',
            'choices' => [
                ['text' => 'U2VlIHRoZSBjYXNlIGFuZCB3ZWRnZSwgZmluaXNoZWQ=', 'next' => '6_shared'],
            ],
        ],
        '5_help' => [
            'prose'  => 'SGVscGluZyBmaW5pc2ggdGhlIHVyZ2VudCBvcmRlciBtZWFucyByZWFsLCBwcmFjdGljYWwgbGFib3VyIOKAlCBtZWFzdXJpbmcsIGZldGNoaW5nLCBob2xkaW5nIHBpZWNlcyBzdGVhZHkgd2hpbGUgU2FtaXIgd29ya3Mgd2l0aCBhIHNwZWVkIGFuZCBwcmVjaXNpb24gdGhhdCBjb21lcyBvbmx5IGZyb20gZGVjYWRlcyBvZiBwcmFjdGljZS4gSXQncyB1bmdsYW1vcm91cyB3b3JrLCBidXQgZ2VudWluZWx5IHVzZWZ1bCwgYW5kIHRoZSBjbGllbnQncyBvcmRlciBzaGlwcyBvbiB0aW1lIGJlY2F1c2Ugb2YgaXQuCgpTYW1pciwgcmVsaWV2ZWQgdG8gaGF2ZSBtYWRlIHRoZSBkZWFkbGluZSwgd29ya3Mgb24geW91ciBjYXNlIGFuZCB3ZWRnZSB3aXRoIHZpc2libGUgZXh0cmEgY2FyZSBhZnRlcndhcmQsIGNsZWFybHkgZ3JhdGVmdWwu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBjYXNlIGFuZCB3ZWRnZSwgZmluaXNoZWQ=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'U2FtaXIgaGFuZHMgYmFjayB0aGUgY2FzZSBwcm9wZXJseSByZWZvcmdlZCDigJQgam9pbnRzIHJlaW5mb3JjZWQsIGhpbmdlcyB0cnVlLCBjb25zaWRlcmFibHkgc3R1cmRpZXIgdGhhbiBpdCBhcnJpdmVkIOKAlCBhbG9uZyB3aXRoIHRoZSB3ZWRnZSBpdHNlbGYsIGZyZXNobHkgY2xlYW5lZCBhbmQgZml0dGVkLiAnU2hvdWxkIGxhc3QgdGhlIHJlc3Qgb2Ygd2hhdGV2ZXIgeW91J3JlIGNhcnJ5aW5nIGl0IHRocm91Z2gsJyBoZSBzYXlzLiAnQSB0b29sIHRoYXQncyBjYXJlZCBmb3IgcHJvcGVybHkgb3V0bGFzdHMgb25lIHRoYXQncyBtZXJlbHkgdXNlZC4nCgpIZSBzdHVkaWVzIHlvdSBhIG1vbWVudC4gJ1NhbWUgaXMgdHJ1ZSBvZiBwZW9wbGUsIGdlbmVyYWxseSwgdGhvdWdoIEkgZG9uJ3QgbGlrZSB0byBnZXQgdG9vIHBoaWxvc29waGljYWwgYWJvdXQgbWV0YWx3b3JrLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSBjYXNlIGdlbnVpbmVseSwgc3RydWN0dXJhbGx5IGltcHJvdmVkIGFuZCB0aGUgd2VkZ2Ugc2VjdXJlIHdpdGhpbiBpdCwgRGFtYXNjdXMncyBhbmNpZW50IHNvdXEgc2V0dGxpbmcgaW50byBldmVuaW5nIGFyb3VuZCB5b3UsIHRoZSByaW5nIG9mIGhhbW1lcnMgZmluYWxseSBxdWlldGluZyBhcyBmb3JnZXMgYmFuayB0aGVpciBmaXJlcyBmb3IgdGhlIG5pZ2h0LgoKVG9tYXMgZXhhbWluZXMgdGhlIHJlZm9yZ2VkIGNhc2Ugd2l0aCByZWFsIGFwcHJlY2lhdGlvbi4gJ0dvb2Qgd29yaywgdGhhdC4gU2hvdWxkIGhvbGQgcHJvcGVybHkgdGhlIHJlc3Qgb2YgdGhlIHdheSwgd2hlcmV2ZXIgdGhlIHJlc3Qgb2YgdGhlIHdheSBhY3R1YWxseSBsZWFkcy4n',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBncmF0ZWZ1bCBmb3IgdGhlIHVuZXhwZWN0ZWQgcmVwYWly', 'next' => '8_end_grateful'],
                ['text' => 'U2F5IHlvdSBoYWRuJ3QgcmVhbGl6ZWQgaG93IHdvcm4gaXQgaGFkIGdvdHRlbg==', 'next' => '8_end_worn'],
            ],
        ],
        '8_end_grateful' => [
            'prose'  => 'J0knbSBnZW51aW5lbHkgZ3JhdGVmdWwgZm9yIHRoZSB1bmV4cGVjdGVkIHJlcGFpciwnIHlvdSBzYXksIHR1cm5pbmcgdGhlIHN0dXJkaWVyIGNhc2Ugb3ZlciBpbiB5b3VyIGhhbmRzLiAnSGFkbid0IHRob3VnaHQgYWJvdXQgaXQgbmVlZGluZyBjYXJlIG9mIGl0cyBvd24sIHRoaXMgd2hvbGUgdGltZSDigJQganVzdCBrZXB0IHVzaW5nIGl0LCB3ZWFyIGFuZCBhbGwuJwoKVG9tYXMgbm9kcy4gJ0Vhc3kgdG8gZG8sIHdpdGggdG9vbHMgdGhhdCBhcmUgd29ya2luZy4gRG9lc24ndCBtZWFuIHRoZXkgZG9uJ3QgbmVlZCB0ZW5kaW5nIGV2ZW50dWFsbHksIHNhbWUgYXMgYW55dGhpbmcgZWxzZSB0aGF0J3MgY2FycnlpbmcgcmVhbCB3ZWlnaHQuJw==',
            'ending' => true,
        ],
        '8_end_worn' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGhhZG4ndCByZWFsaXplZCBob3cgd29ybiBpdCBoYWQgZ290dGVuLCcgeW91IGFkbWl0LCBleGFtaW5pbmcgdGhlIGNhc2UncyBub3ctc3R1cmR5IGpvaW50cy4gJ0p1c3Qga2VwdCB1c2luZyBpdCwgdGhlIHdob2xlIHdheSwgd2l0aG91dCByZWFsbHkgbm90aWNpbmcgdGhlIHdlYXIgYWNjdW11bGF0aW5nLicKClRvbWFzIHNtaWxlcyBzbGlnaHRseS4gJ1RoYXQncyByYXRoZXIgaG93IHdlYXIgd29ya3MsIGdlbmVyYWxseS4gWW91IGRvbid0IG5vdGljZSBpdCBidWlsZGluZyB1bnRpbCBzb21lb25lIHdpdGggdGhlIHJpZ2h0IGV5ZSBwb2ludHMgaXQgb3V0IGFuZCBmaXhlcyBpdCBwcm9wZXJseS4nIFRoZSBjYXJhdmFuIG1vdmVzIG9uIGZyb20gRGFtYXNjdXMgYXMgdGhlIHNvdXEncyBsaWdodHMgY29tZSB1cCBmb3IgdGhlIGV2ZW5pbmcgYmVoaW5kIHlvdS4=',
            'ending' => true,
        ],
    ],
];
