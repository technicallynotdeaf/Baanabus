<?php
return [
    'id'    => 21,
    'title' => 'The Sky Has To Want To Cooperate',
    'color' => '#2A8A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TGFwbGFuZCdzIHNub3ctY292ZXJlZCBmZWxscyBzdHJldGNoIG91dCBiZW5lYXRoIGEgc2t5IGFscmVhZHkgZmFpbnRseSByaXBwbGluZyB3aXRoIHBhbGUgZ3JlZW4sIHRoZSBhdXJvcmEncyBmaXJzdCB0ZW50YXRpdmUgYmFuZHMgcHJvbWlzaW5nIGEgcmVhbCBzaG93IG9uY2UgZnVsbCBkYXJrbmVzcyBwcm9wZXJseSBzZXR0bGVzLiBQcml5YSBsYW5kcyBjYXJlZnVsbHkgb24gcGFja2VkIHNub3cuICdTw6FtaSBlbGRlcidzIGV4cGVjdGluZyB1cywnIHNoZSBzYXlzLiAnQ29yd2luJ3Mgbm90ZXMgc2F5IHRoaXMgcmlkZGxlIG5lZWRzIHRoZSBhdXJvcmEgaXRzZWxmIHRvIGFjdHVhbGx5IGNvb3BlcmF0ZSDigJQgY2FuJ3QgYmUgdG9sZCBwcm9wZXJseSB3aXRob3V0IGl0LicKClR3byBmZWxsIHJvdXRlcyB0b3dhcmQgdGhlIGVsZGVyJ3MgY2FtcCBwcmVzZW50IHRoZW1zZWx2ZXM6IG92ZXIgYW4gZXhwb3NlZCByaWRnZSB3aXRoIGEgY2xlYXIgdmlldyBvZiB0aGUgc2t5LCBvciB0aHJvdWdoIGEgc2hlbHRlcmVkIGJpcmNoIHZhbGxleS4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZXhwb3NlZCByaWRnZQ==', 'next' => '2_ridge'],
                ['text' => 'Rm9sbG93IHRoZSBzaGVsdGVyZWQgYmlyY2ggdmFsbGV5', 'next' => '2_valley'],
            ],
        ],
        '2_ridge' => [
            'prose'  => 'VGhlIGV4cG9zZWQgcmlkZ2Ugb2ZmZXJzIGEgc3BlY3RhY3VsYXIsIHVub2JzdHJ1Y3RlZCB2aWV3IG9mIHRoZSBhdXJvcmEncyBlYXJseSBiYW5kcyByaXBwbGluZyBvdmVyaGVhZCwgdGhlIGNvbGQgY3V0dGluZyBzaGFycCBidXQgdGhlIHNpZ2h0IGdlbnVpbmVseSBicmVhdGh0YWtpbmcuIFlvdSByZWFjaCB0aGUgY2FtcCB3aW5kc3dlcHQgYnV0IHRob3JvdWdobHkgYXdlZCBieSB3aGF0J3MgYWxyZWFkeSB2aXNpYmxlIGFib3ZlLg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZWxkZXI=', 'next' => '3_shared'],
            ],
        ],
        '2_valley' => [
            'prose'  => 'VGhlIHNoZWx0ZXJlZCBiaXJjaCB2YWxsZXkga2VlcHMgdGhlIHdvcnN0IHdpbmQgYXQgYmF5LCBzbm93LWxhZGVuIGJyYW5jaGVzIGZyYW1pbmcgbmFycm93IGdsaW1wc2VzIG9mIHRoZSBhdXJvcmEncyBncmVlbiBsaWdodCByaXBwbGluZyBiZXR3ZWVuIHRoZW0uIFlvdSByZWFjaCB0aGUgY2FtcCBhIGxpdHRsZSBsYXRlciwgaGF2aW5nIGVuam95ZWQgYSBnZW50bGVyLCBtb3JlIGludGltYXRlIHZpZXcgb2YgdGhlIHNob3cgYmVnaW5uaW5nIG92ZXJoZWFkLg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZWxkZXI=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGVsZGVyLCBhIFPDoW1pIHdvbWFuIG5hbWVkIMOBaWxlLCBncmVldHMgeW91IGJlc2lkZSBhIHNtYWxsIGZpcmUsIGdsYW5jaW5nIHNreXdhcmQgd2l0aCB0aGUgcHJhY3Rpc2VkIHBhdGllbmNlIG9mIHNvbWVvbmUgd2hvJ3MgbGVhcm5lZCBub3QgdG8gcnVzaCB0aGUgYXVyb3JhJ3Mgb3duIHNjaGVkdWxlLiAnVGhpcyByaWRkbGUgaXMgYm91bmQgdXAgd2l0aCB0aGUgbGlnaHRzIHRoZW1zZWx2ZXMsJyBzaGUgZXhwbGFpbnMsIGV4YW1pbmluZyB0aGUgYXRsYXMncyBuZXh0IGJsYW5rIHBhdGNoLiAnTm90IGp1c3Qgc3RhcnMuIFRoZSBhdXJvcmEgaGFzIHRvIGFjdHVhbGx5IGNvb3BlcmF0ZSBmb3IgdGhlIHRlbGxpbmcgdG8gbWFrZSBwcm9wZXIgc2Vuc2UuIFdlIHdhaXQgZm9yIGl0IHRvZ2V0aGVyLicKClNoZSBzdHVkaWVzIHlvdS4gJ0FyZSB5b3Ugd2lsbGluZyB0byB3YWl0IGFzIGxvbmcgYXMgdGhlIHNreSBhY3R1YWxseSBuZWVkcz8n',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSB3aWxsaW5nIHRvIHdhaXQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'w4FpbGUgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IHdhaXQgZm9yIHRoZSBhdXJvcmEncyBjb29wZXJhdGlvbjogc2l0IGJ5IHRoZSBmaXJlIGFuZCBzaW1wbHkgd2F0Y2ggdGhlIHNreSB0b2dldGhlciBpbiBjb21mb3J0YWJsZSBzaWxlbmNlLCBvciB3YWxrIHdpdGggaGVyIGEgbGl0dGxlIGZ1cnRoZXIgZnJvbSBjYW1wLCB0cmFja2luZyB0aGUgYXVyb3JhJ3Mgc2hpZnRpbmcgYmFuZHMgYWN0aXZlbHkgcmF0aGVyIHRoYW4gd2FpdGluZyBwYXNzaXZlbHkgZm9yIHRoZW0gdG8gc2V0dGxlLgoKJ0VpdGhlciBob25vdXJzIHRoZSB3YWl0aW5nIHByb3Blcmx5LCcgc2hlIHNheXMuICdTdGlsbCBieSB0aGUgZmlyZSwgb3IgbW92aW5nIHdpdGggdGhlIGxpZ2h0cy4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'U2l0IGJ5IHRoZSBmaXJlIGFuZCB3YXRjaA==', 'next' => '5_fire'],
                ['text' => 'V2FsayBhbmQgdHJhY2sgdGhlIGF1cm9yYSBhY3RpdmVseQ==', 'next' => '5_walk'],
            ],
        ],
        '5_fire' => [
            'prose'  => 'U2l0dGluZyBieSB0aGUgZmlyZSBtZWFucyB3YXRjaGluZyB0aGUgYXVyb3JhJ3MgYmFuZHMgc2xvd2x5IGludGVuc2lmeSBmcm9tIGEgZml4ZWQsIGNvbWZvcnRhYmxlIHZhbnRhZ2UsIHRoZSBwYWxlIGdyZWVuIGRlZXBlbmluZyBncmFkdWFsbHkgaW50byBicmlnaHRlciByaWJib25zIG9mIGNvbG91ciBhcyB0aGUgbmlnaHQgcHJvcGVybHkgc2V0dGxlcywgw4FpbGUncyBxdWlldCBjb21wYW55IG1ha2luZyB0aGUgcGF0aWVudCB3YWl0aW5nIGZlZWwgZW50aXJlbHkgdW5odXJyaWVkLgoKRXZlbnR1YWxseSwgdGhlIGxpZ2h0cyBhcnJhbmdlIHRoZW1zZWx2ZXMgaW50byBleGFjdGx5IHRoZSBwYXR0ZXJuIGhlciByaWRkbGUgcmVxdWlyZXMu',
            'choices' => [
                ['text' => 'SGVhciB0aGUgcmlkZGxlIHByb3Blcmx5', 'next' => '6_shared'],
            ],
        ],
        '5_walk' => [
            'prose'  => 'V2Fsa2luZyBhIGxpdHRsZSBmdXJ0aGVyIGZyb20gY2FtcCBtZWFucyBhY3RpdmVseSB0cmFja2luZyB0aGUgYXVyb3JhJ3Mgc2hpZnRpbmcgYmFuZHMgYWNyb3NzIGEgd2lkZXIsIGRhcmtlciBzdHJldGNoIG9mIHNreSwgw4FpbGUgcG9pbnRpbmcgb3V0IGhvdyB0aGUgbGlnaHRzIG1vdmUgYW5kIGdhdGhlciB3aXRoIGEgaHVudGVyJ3MgYXR0ZW50aXZlIHBhdGllbmNlIHJhdGhlciB0aGFuIHNpbXBseSB3YWl0aW5nIGZvciB0aGVtIHRvIGFycml2ZS4KCkV2ZW50dWFsbHksIG91dCBoZXJlIGluIHRoZSBkZWVwZXIgZGFyaywgdGhlIGxpZ2h0cyBhcnJhbmdlIHRoZW1zZWx2ZXMgaW50byBleGFjdGx5IHRoZSBwYXR0ZXJuIGhlciByaWRkbGUgcmVxdWlyZXMu',
            'choices' => [
                ['text' => 'SGVhciB0aGUgcmlkZGxlIHByb3Blcmx5', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2l0aCB0aGUgYXVyb3JhIGZpbmFsbHkgY29vcGVyYXRpbmcgZXhhY3RseSBhcyBuZWVkZWQsIMOBaWxlIHRlbGxzIHRoZSByaWRkbGUgcHJvcGVybHksIHN0YXItbG9yZSBhbmQgYXVyb3JhLWxvcmUgd292ZW4gdG9nZXRoZXIgaW4gYSB3YXkgdGhhdCBtYWtlcyB0aGUgY29uc3RlbGxhdGlvbidzIG1lYW5pbmcgZGVwZW5kIGVudGlyZWx5IG9uIHRoZSBtb3ZpbmcgbGlnaHRzIGZyYW1pbmcgaXQuIFlvdSBkcmF3IGJvdGggaW50byB0aGUgYXRsYXMgYXMgYmVzdCB5b3UgY2FuIGNhcHR1cmUgdGhlIGNvbWJpbmF0aW9uLCBncmVlbiByaWJib25zIHJpcHBsaW5nIGluIHlvdXIgbWVtb3J5IGFsb25nc2lkZSB0aGUgZml4ZWQgc3RhcnMuCgonVGhhdCdzIHRoZSBvbmx5IHdheSB0aGlzIG9uZSBjYW4gYmUgdG9sZCBwcm9wZXJseSwnIMOBaWxlIHNheXMsIHNhdGlzZmllZC4gJ1RoZSBza3kgaGFzIHRvIHdhbnQgdG8gY29vcGVyYXRlLiBUb25pZ2h0LCBpdCBkaWQuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0b3dhcmQgdGhlIFF1aWV0IEhvdXIgd2l0aCB0aGUgYXVyb3JhIHN0aWxsIHJpcHBsaW5nIGZhaW50bHkgb3ZlcmhlYWQsIHNub3cgY3J1bmNoaW5nIHVuZGVyZm9vdCBpbiB0aGUgZGVlcCBjb2xkLCB0aGUgd2hvbGUgZXhwZXJpZW5jZSBmZWVsaW5nIGNvbnNpZGVyYWJseSBtb3JlIGNvbGxhYm9yYXRpdmUgd2l0aCB0aGUgc2t5IGl0c2VsZiB0aGFuIGFueSBwcmV2aW91cyBzdG9wLiBQcml5YSdzIHdhaXRpbmcgd2l0aCB0aGUgdGhlcm1vcywgd2F0Y2hpbmcgdGhlIGxpZ2h0cyB3aXRoIHJlYWwgd29uZGVyIGhlcnNlbGYuCgonTmV2ZXIgZ2V0cyBvbGQsIHRoYXQsJyBzaGUgc2F5cywgbm9kZGluZyBza3l3YXJkLiAnR29vZCB0aGF0IGl0IGFjdHVhbGx5IGNvb3BlcmF0ZWQgdG9uaWdodC4n',
            'choices' => [
                ['text' => 'U2F5IHRoZSBhdXJvcmEgbWFkZSB0aGUgd2hvbGUgcmlkZGxlIGZlZWwgYWxpdmU=', 'next' => '8_end_alive'],
                ['text' => 'U2F5IHlvdSdyZSByZWxpZXZlZCBpdCBhY3R1YWxseSBzaG93ZWQgdXAgYXQgYWxs', 'next' => '8_end_relieved'],
            ],
        ],
        '8_end_alive' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgYXVyb3JhIG1hZGUgdGhlIHdob2xlIHJpZGRsZSBmZWVsIGFsaXZlLCcgeW91IHNheSwgd2F0Y2hpbmcgdGhlIGxhc3QgZ3JlZW4gcmliYm9ucyBmYWRlIHNsb3dseSBvdmVyaGVhZC4gJ05vdCBqdXN0IGEgZml4ZWQgc2hhcGUgdG8gY29weSBkb3duLiBTb21ldGhpbmcgdGhlIHNreSBpdHNlbGYgaGFkIHRvIGFjdHVhbGx5IGFncmVlIHRvIHNob3cgbWUuJwoKUHJpeWEgbm9kcywgY2xlYXJseSBtb3ZlZCBieSB0aGUgc2FtZSB0aG91Z2h0LiAnVGhhdCdzIGEgbG92ZWx5IHdheSB0byB0aGluayBhYm91dCBpdC4gTm90IGV2ZXJ5IHBhZ2UgaW4gdGhpcyBhdGxhcyBnZXRzIHRoYXQga2luZCBvZiBjb29wZXJhdGlvbi4gTHVja3ksIHRvbmlnaHQuJw==',
            'ending' => true,
        ],
        '8_end_relieved' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gcmVsaWV2ZWQgaXQgYWN0dWFsbHkgc2hvd2VkIHVwIGF0IGFsbCwnIHlvdSBhZG1pdCwgdGhpbmtpbmcgb2YgaG93IGVhc2lseSB0aGUgd2hvbGUgdmlzaXQgY291bGQgaGF2ZSBzdGFsbGVkIHdpdGhvdXQgYW55IGNvb3BlcmF0aW9uIGZyb20gdGhlIHNreS4gJ1dvdWxkJ3ZlIGZlbHQgc3RyYW5nZSwgd2FpdGluZyBmb3Igc29tZXRoaW5nIHRoYXQgc2ltcGx5IG5ldmVyIGFycml2ZWQuJwoKUHJpeWEgbGF1Z2hzLCBoYW5kaW5nIG92ZXIgdGhlIHRoZXJtb3MgcHJvcGVybHkuICdGYWlyLiDDgWlsZSdzIHdhaXRlZCBvdXQgcGxlbnR5IG9mIHF1aWV0IG5pZ2h0cyBiZWZvcmUsIEknZCBndWVzcy4gVG9uaWdodCBqdXN0IGhhcHBlbmVkIHRvIGJlIGEgZ2VuZXJvdXMgb25lLicgVGhlIFF1aWV0IEhvdXIgbGlmdHMgb2ZmIHRocm91Z2ggTGFwbGFuZCdzIGNvbGQsIGF1cm9yYS1saXQgZGFyaywgc25vdy1jb3ZlcmVkIGZlbGxzIHNocmlua2luZyBiZWxvdyBpbnRvIGRlZXAsIHN0YXItdGhpY2sgbmlnaHQu',
            'ending' => true,
        ],
    ],
];
