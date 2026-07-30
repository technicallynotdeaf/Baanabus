<?php
return [
    'id'    => 14,
    'title' => 'Not the Original',
    'color' => '#8A9A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFRpYW4gU2hhbiBtb3VudGFpbnMgcmlzZSBpbiB2YXN0LCByZW1vdGUgcmFuZ2VzIHRocm91Z2ggS3lyZ3l6c3RhbiwgaGVyZGluZyBmYW1pbGllcyBzdGlsbCBmb2xsb3dpbmcgc2Vhc29uYWwgcGF0dGVybnMgdGhlaXIgYW5jZXN0b3JzIHdvdWxkIHJlY29nbmlzZSwgZ29sZGVuIGVhZ2xlcyBvY2Nhc2lvbmFsbHkgdmlzaWJsZSByaWRpbmcgdGhlIHRoZXJtYWxzIGFib3ZlIGNhbXAg4oCUIHRyYWluZWQgaHVudGluZyBiaXJkcywgR3JldGEgZXhwbGFpbnMsIHBhcnQgb2YgYSB0cmFkaXRpb24gaGVyZSBvbGRlciB0aGFuIG1vc3Qgd3JpdHRlbiBoaXN0b3J5LgoKVHdvIHdheXMgaW50byB0aGUgbmVhcmVzdCBoZXJkaW5nIGNhbXAgcHJlc2VudCB0aGVtc2VsdmVzOiBmb2xsb3dpbmcgdGhlIHJpdmVyIHZhbGxleSwgZ2VudGxlciBidXQgbG9uZ2VyLCBvciBjcm9zc2luZyBkaXJlY3RseSBvdmVyIGEgbG93ZXIgcmlkZ2UsIGZhc3RlciBidXQgZXhwb3NlZCB0byB3aGF0ZXZlciB3ZWF0aGVyJ3MgY3VycmVudGx5IGJ1aWxkaW5nIG92ZXIgdGhlIHBlYWtzLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSByaXZlciB2YWxsZXk=', 'next' => '2_river'],
                ['text' => 'Q3Jvc3MgdGhlIHJpZGdlIGRpcmVjdGx5', 'next' => '2_ridge'],
            ],
        ],
        '2_river' => [
            'prose'  => 'VGhlIHJpdmVyIHZhbGxleSByb3V0ZSBpcyBnZW50bGUsIGdyZWVuLCBkb3R0ZWQgd2l0aCBncmF6aW5nIGhvcnNlcyBhbmQgdGhlIG9jY2FzaW9uYWwgeXVydCBjYXRjaGluZyBhZnRlcm5vb24gbGlnaHQgYWdhaW5zdCB0aGUgdmFzdCBvcGVuIGxhbmRzY2FwZS4gWW91IG1ha2UgZWFzeSB0aW1lLCBhcnJpdmluZyBhdCB0aGUgY2FtcCByZWxheGVkIGFuZCBjb25zaWRlcmFibHkgbW9yZSBhYmxlIHRvIGFwcHJlY2lhdGUgdGhlIHNjZW5lcnkgdGhhbiBhIGhhcmRlciByb3V0ZSB3b3VsZCBoYXZlIGFsbG93ZWQuCgpBIHlvdW5nIHJpZGVyLCBzcG90dGluZyB5b3UgZnJvbSBzb21lIGRpc3RhbmNlLCBnYWxsb3BzIG92ZXIgd2l0aCByZWFsIGN1cmlvc2l0eSByYXRoZXIgdGhhbiBhbnkgd2FyaW5lc3MsIGFuZCBsZWFkcyB5b3UgdGhlIHJlc3Qgb2YgdGhlIHdheSBpbi4=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '2_ridge' => [
            'prose'  => 'VGhlIHJpZGdlIHJvdXRlIGlzIGZhc3RlciBidXQgcHJvcGVybHkgZXhwb3NlZCwgd2VhdGhlciBidWlsZGluZyB2aXNpYmx5IG9uIHRoZSBwZWFrcyBhYm92ZSBhcyB5b3UgY3Jvc3MsIHdpbmQgcGlja2luZyB1cCBlbm91Z2ggdG8gbWFrZSBjb252ZXJzYXRpb24gZ2VudWluZWx5IGRpZmZpY3VsdC4gWW91IG1ha2UgaXQgZG93biBpbnRvIHRoZSBjYW1wIGp1c3QgYXMgdGhlIGZpcnN0IHJlYWwgZ3VzdHMgYXJyaXZlLCBicmVhdGhsZXNzIGFuZCBnbGFkIHRvIGJlIHVuZGVyIGNvdmVyLgoKVGhlIGNhbXAncyBkb2dzIGFubm91bmNlIHlvdSB3ZWxsIGJlZm9yZSBhbnkgcGVyc29uIGRvZXMsIGFuZCBzb21lb25lIGNvbWVzIG91dCB0byBpbnZlc3RpZ2F0ZSwgZXllYnJvd3MgcmFpc2VkIGF0IHlvdXIgdGltaW5nLg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGNhbXAncyBmYWxjb25lciwgTnVybGFuLCBpcyBleGFtaW5pbmcgYSBnb2xkZW4gZWFnbGUncyBqZXNzZXMgd2hlbiB5b3UgYXJyaXZlLCBhbmQgZG9lc24ndCBsb29rIHVwIGltbWVkaWF0ZWx5LCB0aG91Z2ggaGUgZG9lcyBhc2ssIHdpdGhvdXQgcHJlYW1ibGUsIHRvIHNlZSB0aGUgaW5zdHJ1bWVudCBjYXNlIG9uY2UgaW50cm9kdWN0aW9ucyBhcmUgcHJvcGVybHkgbWFkZS4gSGUgc3R1ZGllcyB0aGUgbWFrZXIncyBtYXJrIHN0YW1wZWQgaW50byB0aGUgYnJhc3MgZml0dGluZ3Mgd2l0aCByZWFsIHJlY29nbml0aW9uLgoKJ0kga25vdyB0aGlzIG1hcmssJyBoZSBzYXlzLiAnVGhlIHN1cnZleW9yIHdobyBjYXJyaWVkIHRoaXMgc3RheWVkIHdpdGggbXkgZ3JhbmRmYXRoZXIncyBjYW1wIG9uY2UsIHllYXJzIGJhY2suIExvc3QgYSBzY3JldyBoZXJlLCBpbiBkZWVwIHNub3csIGR1cmluZyBhIHN0b3JtIOKAlCBuZXZlciBmb3VuZCBpdCBhZ2FpbiwgaG93ZXZlciBoYXJkIGV2ZXJ5b25lIGxvb2tlZC4gSXQncyBzdGlsbCBvdXQgdGhlcmUgc29tZXdoZXJlLCBwcm9iYWJseSwgYnVyaWVkIGZvciBnb29kLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgY2FuIGJlIGRvbmU=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'J0Nhbid0IHJlY292ZXIgd2hhdCB0aGUgbW91bnRhaW4ncyBrZXB0LCcgTnVybGFuIHNheXMuICdCdXQgdGhlcmUncyBhIHNtaXRoIGluIHRoZSBuZXh0IHZhbGxleSB3aG8gY291bGQgZm9yZ2UgYW4gZXhhY3QgbWF0Y2gsIGlmIHlvdSBjYW4gY29udmluY2UgaGltIGl0J3Mgd29ydGggaGlzIHRpbWUg4oCUIGhlJ3MgcGFydGljdWxhciBhYm91dCB0aGF0LiBZb3UnZCBuZWVkIHRvIGVpdGhlciBicmluZyBoaW0gc29tZXRoaW5nIG9mIGdlbnVpbmUgdHJhZGUgdmFsdWUsIG9yIHByb3ZlIHlvdXIgbmVlZCBpcyByZWFsIGJ5IGhlbHBpbmcgaGltIHdpdGggc29tZXRoaW5nIGZpcnN0Lic=',
            'choices' => [
                ['text' => 'T2ZmZXIgYSBmYWlyIHRyYWRl', 'next' => '5_trade'],
                ['text' => 'SGVscCBoaW0gd2l0aCBzb21ldGhpbmcgZmlyc3Q=', 'next' => '5_help'],
            ],
        ],
        '5_trade' => [
            'prose'  => 'VGhlIHNtaXRoLCBCZWt6YXQsIGV4YW1pbmVzIHdoYXQgeW91IG9mZmVyIOKAlCB0aGUgc3RvcnkgaXRzZWxmLCB0b2xkIHByb3Blcmx5LCBhbG9uZyB3aXRoIGEgc21hbGwgc2tldGNoIG9mIHRoZSB3aG9sZSBpbnN0cnVtZW50J3Mgbm93LW5lYXJseS1jb21wbGV0ZSBhc3NlbWJseSDigJQgd2l0aCByZWFsIHByb2Zlc3Npb25hbCBpbnRlcmVzdCByYXRoZXIgdGhhbiBhbnkgaW1tZWRpYXRlIGFncmVlbWVudC4gJ0Egc3RvcnkncyBub3Qgbm90aGluZywnIGhlIHNheXMgZXZlbnR1YWxseSwgJ2J1dCBzaG93IG1lIHlvdSB1bmRlcnN0YW5kIHdoYXQgeW91J3JlIGFjdHVhbGx5IGFza2luZyBmb3IsIGFuZCBJJ2xsIGNvbnNpZGVyIGl0IGZhaXJseSB0cmFkZWQuJwoKWW91IHNwZW5kIGFuIGhvdXIgcHJvcGVybHkgZXhwbGFpbmluZyB0aGUgbWVjaGFuaXNtLCB0aGUgdG9sZXJhbmNlcywgZXhhY3RseSB3aGF0IHRoZSBtaXNzaW5nIHNjcmV3IG5lZWRzIHRvIGRvIOKAlCBhbmQgYnkgdGhlIGVuZCwgQmVremF0J3Mgbm9kZGluZywgZ2VudWluZWx5IHNhdGlzZmllZCByYXRoZXIgdGhhbiBtZXJlbHkgY29udmluY2VkLg==',
            'choices' => [
                ['text' => 'U2VlIHRoZSBwaWVjZSBmb3JnZWQ=', 'next' => '6_shared'],
            ],
        ],
        '5_help' => [
            'prose'  => 'QmVremF0J3MgZm9yZ2UgbmVlZHMgYSBzZWNvbmQgcGFpciBvZiBoYW5kcyBmb3IgYSBiYXRjaCBvZiBob3JzZXNob2VzIHRoYXQncyBvdmVyZHVlIGZvciBhIG5laWdoYm91cmluZyBjYW1wLCBob3QsIHJlcGV0aXRpdmUsIGdlbnVpbmVseSBkZW1hbmRpbmcgd29yayB0aGF0IGxlYXZlcyB5b3VyIGFybXMgYWNoaW5nIHdpdGhpbiB0aGUgaG91ci4gSGUgY29ycmVjdHMgeW91ciB0ZWNobmlxdWUgdHdpY2UsIGJyaXNrbHksIHdpdGhvdXQgbXVjaCBwYXRpZW5jZSBmb3IgZXhjdXNlcy4KCkJ5IHRoZSB0aW1lIHRoZSBob3JzZXNob2VzIGFyZSBkb25lLCBoZSdzIHNhdGlzZmllZCBlbm91Z2ggd2l0aCB5b3VyIGFjdHVhbCBlZmZvcnQgdG8gdHVybiwgd2l0aG91dCBtdWNoIGZ1cnRoZXIgbmVnb3RpYXRpb24sIHRvIHlvdXIgb3duIHJlcXVlc3Qu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBwaWVjZSBmb3JnZWQ=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QmVremF0IGZvcmdlcyB0aGUgcmVwbGFjZW1lbnQgc2NyZXcgd2l0aCByZWFsLCBleGFjdGluZyBjYXJlLCBjaGVja2luZyBkaW1lbnNpb25zIGFnYWluc3QgeW91ciBub3RlcyB0d2ljZSBiZWZvcmUgaGUncyBzYXRpc2ZpZWQsIHRoZSB3aG9sZSBwcm9jZXNzIGEgZ2VudWluZSwgc2tpbGxlZCBwZXJmb3JtYW5jZSByYXRoZXIgdGhhbiBtZXJlIG1lY2hhbmljYWwgbGFib3VyLiBXaGVuIGl0J3MgZG9uZSwgaXQgZml0cyB0aGUgYXNzZW1ibHkgcGVyZmVjdGx5IOKAlCBuZXcgbWV0YWwgc3RhbmRpbmcgaW4gaG9uZXN0bHkgZm9yIHdoYXQgdGhlIG1vdW50YWluIG5ldmVyIGdhdmUgYmFjay4KCidOb3QgdGhlIG9yaWdpbmFsLCcgaGUgc2F5cywgaGFuZGluZyBpdCBvdmVyLiAnQnV0IGl0J2xsIGRvIHRoZSBzYW1lIGpvYiwgcHJvcGVybHksIGZvciBqdXN0IGFzIGxvbmcuIFNvbWV0aW1lcyB0aGF0J3Mgd2hhdCBhIHRoaW5nIGFjdHVhbGx5IG5lZWRzIOKAlCBub3QgdGhlIGV4YWN0IHNhbWUgcGllY2UsIGp1c3Qgc29tZXRoaW5nIG1hZGUgd2l0aCB0aGUgc2FtZSBjYXJlLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0b3dhcmQgdGhlIENvbnRvdXIgd2l0aCB0aGUgbmV3IHNjcmV3IHNlY3VyZSBpbiB0aGUgY2FzZSwgYW4gZWxldmVudGggcGllY2Ug4oCUIG5vdCByZWNvdmVyZWQsIGV4YWN0bHksIGJ1dCBob25lc3RseSByZXBsYWNlZCwgYW5kIHNvbWVob3cgdGhhdCBmZWVscyBsaWtlIGl0cyBvd24gc21hbGwsIGltcG9ydGFudCBkaXN0aW5jdGlvbiB3b3J0aCBub3RpY2luZy4KCkdyZXRhIGV4YW1pbmVzIHRoZSBuZXcgbWV0YWwgYWdhaW5zdCB0aGUgb2xkLCB3ZWF0aGVyZWQgYnJhc3Mgc3Vycm91bmRpbmcgaXQuICdEb2Vzbid0IHF1aXRlIG1hdGNoIHRoZSBwYXRpbmEuIFlvdSdsbCBiZSBhYmxlIHRvIHNlZSwgYWx3YXlzLCB0aGF0IHRoaXMgb25lJ3MgbmV3ZXIuJyBTaGUgc2F5cyBpdCBsaWtlIGFuIG9ic2VydmF0aW9uLCBub3QgYSBjb21wbGFpbnQu',
            'choices' => [
                ['text' => 'U2F5IHlvdSBkb24ndCBtaW5kIGl0IHNob3dpbmc=', 'next' => '8_end_show'],
                ['text' => 'U2F5IHlvdSB3aXNoIGl0IG1hdGNoZWQgYmV0dGVy', 'next' => '8_end_match'],
            ],
        ],
        '8_end_show' => [
            'prose'  => 'J0kgZG9uJ3QgbWluZCBpdCBzaG93aW5nLCcgeW91IHNheSwgYW5kIGZpbmQgeW91IG1lYW4gaXQuICdNZWFucyB0aGUgd2hvbGUgaW5zdHJ1bWVudCdzIGhvbmVzdCBhYm91dCBpdHMgb3duIGhpc3Rvcnkg4oCUIHNvbWUgcGFydHMgb3JpZ2luYWwsIHNvbWUgcGFydHMgbWFkZSBuZXcgYnkgcGVvcGxlIHdobyBjYXJlZCBlbm91Z2ggdG8gZG8gaXQgcHJvcGVybHkuIFRoYXQgc2VlbXMgYmV0dGVyIHRoYW4gcHJldGVuZGluZyBub3RoaW5nIHdhcyBldmVyIGxvc3QuJwoKR3JldGEgY29uc2lkZXJzIHRoaXMsIHRoZW4gbm9kcyBzbG93bHkuICdNaWdodCBiZSB0aGUgbW9zdCBzZW5zaWJsZSB0aGluZyB5b3UndmUgc2FpZCB0aGlzIHdob2xlIHRyaXAuJw==',
            'ending' => true,
        ],
        '8_end_match' => [
            'prose'  => 'J0kgd2lzaCBpdCBtYXRjaGVkIGJldHRlciwgaWYgSSdtIGhvbmVzdCwnIHlvdSBhZG1pdCwgYW5kIEdyZXRhLCBzdXJwcmlzaW5nbHksIGRvZXNuJ3QgcHVzaCBiYWNrIG9uIHRoZSBzZW50aW1lbnQuICdGYWlyIGVub3VnaC4gU29tZSB0aGluZ3MgeW91IHdhbnQgc2VhbWxlc3MuIERvZXNuJ3QgbWFrZSB5b3Ugd3JvbmcgZm9yIHdhbnRpbmcgaXQuJwoKVGhlIENvbnRvdXIgbGlmdHMgb2ZmIHRoZSBUaWFuIFNoYW4ncyB2YXN0IG9wZW4gcmFuZ2VzLCBnb2xkZW4gZWFnbGVzIHJpZGluZyBpbnZpc2libGUgdGhlcm1hbHMgc29tZXdoZXJlIGJlbG93LCBhbmQgeW91IGZpbmQgeW91cnNlbGYgdHVybmluZyB0aGUgbmV3IHNjcmV3IG92ZXIgaW4geW91ciBtaW5kIGFueXdheSwgZGVjaWRpbmcsIHNsb3dseSwgdGhhdCBhIHZpc2libGUgc2VhbSBtaWdodCBub3QgYmUgdGhlIHdvcnN0IHRoaW5nIGEgdGhpbmcgbGlrZSB0aGlzIGNvdWxkIGNhcnJ5Lg==',
            'ending' => true,
        ],
    ],
];
