<?php
return [
    'id'    => 3,
    'title' => 'Telling Reflection From Reality',
    'color' => '#5A6A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFV5dW5pIFNhbHQgRmxhdHMgc3RyZXRjaCBvdXQgd2hpdGUgYW5kIGltcG9zc2libHkgZmxhdCB0byBldmVyeSBob3Jpem9uLCBhbmQgYWZ0ZXIgdGhlIHJlY2VudCByYWlucywgYSB0aGluIHNoZWV0IG9mIHdhdGVyIHR1cm5zIHRoZSB3aG9sZSBzdXJmYWNlIGludG8gYSBwZXJmZWN0IG1pcnJvciwgc2t5IGFuZCBncm91bmQgZnVzaW5nIGludG8gb25lIHNlYW1sZXNzLCBkaXNvcmllbnRpbmcgd2hvbGUuIFByaXlhIGJyaW5ncyB0aGUgUXVpZXQgSG91ciBkb3duIGNhcmVmdWxseSBhdCBpdHMgZWRnZSwgU3VsaSdzIGVhcnMgZmxhdCB3aXRoIHdoYXQgbG9va3MgbGlrZSBnZW51aW5lIHVuZWFzZSBhdCB0aGUgc3RyYW5nZSBkb3VibGluZy4KClR3byBjcm9zc2luZyByb3V0ZXMgdG93YXJkIHRoZSBkcnkgcGF0Y2ggb2YgaGlnaCBncm91bmQgd2hlcmUgdGhlIGxvY2FsIGd1aWRlIHdhaXRzIHByZXNlbnQgdGhlbXNlbHZlczogdGhlIHNob3J0ZXIgcm91dGUgc3RyYWlnaHQgYWNyb3NzIHRoZSB3ZXQgbWlycm9yLXN1cmZhY2UsIG9yIHRoZSBsb25nZXIgcm91dGUgYWxvbmcgdGhlIGZpcm1lciwgZHJpZXIgZWRnZS4=',
            'choices' => [
                ['text' => 'Q3Jvc3Mgc3RyYWlnaHQgb3ZlciB0aGUgbWlycm9yLXN1cmZhY2U=', 'next' => '2_mirror'],
                ['text' => 'Rm9sbG93IHRoZSBkcmllciBlZGdlIHJvdXRl', 'next' => '2_edge'],
            ],
        ],
        '2_mirror' => [
            'prose'  => 'Q3Jvc3Npbmcgc3RyYWlnaHQgb3ZlciB0aGUgbWlycm9yLXN1cmZhY2UgaXMgZ2VudWluZWx5IGRpc29yaWVudGluZywgZXZlcnkgc3RhciBvdmVyaGVhZCBkb3VibGVkIHBlcmZlY3RseSB1bmRlcmZvb3QsIHVwIGFuZCBkb3duIGxvc2luZyB0aGVpciB1c3VhbCBjZXJ0YWludHkgd2l0aCBlYWNoIGNhcmVmdWwgc3RlcC4gSXQncyB0aGUgc2hvcnRlciByb3V0ZSwgdGhvdWdoIGl0IGRlbWFuZHMgcmVhbCBjb25jZW50cmF0aW9uIG5vdCB0byBzaW1wbHkgc3RvcCwgZGl6emllZCwgaGFsZndheSBhY3Jvc3MuCgpZb3UgcmVhY2ggdGhlIGRyeSBwYXRjaCBvZiBoaWdoIGdyb3VuZCBhIGxpdHRsZSByYXR0bGVkLCBidXQgY29uc2lkZXJhYmx5IGZhc3RlciB0aGFuIHRoZSBhbHRlcm5hdGl2ZS4=',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZ3VpZGU=', 'next' => '3_shared'],
            ],
        ],
        '2_edge' => [
            'prose'  => 'VGhlIGRyaWVyIGVkZ2Ugcm91dGUga2VlcHMgc29saWQgZ3JvdW5kIHByb3Blcmx5IHVuZGVyZm9vdCB0aGUgd2hvbGUgd2F5LCB0aGUgbWlycm9yZWQgc2t5IHZpc2libGUgb25seSBhdCBhIGNhcmVmdWwgZGlzdGFuY2UgcmF0aGVyIHRoYW4gc3dhbGxvd2luZyB5b3UgZGlyZWN0bHkuIEl0J3MgYSBsb25nZXIgd2FsaywgYnV0IGEgY29uc2lkZXJhYmx5IHN0ZWFkaWVyIG9uZS4KCllvdSByZWFjaCB0aGUgZHJ5IHBhdGNoIG9mIGhpZ2ggZ3JvdW5kIHdpdGggeW91ciBzZW5zZSBvZiB1cCBhbmQgZG93biBzdGlsbCBmdWxseSBpbnRhY3Qu',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZ3VpZGU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGd1aWRlLCBhbiBvbGRlciBBeW1hcmEgd29tYW4gbmFtZWQgRG/DsWEgRmxvcmEsIHdhdGNoZXMgeW91IGFycml2ZSB3aXRoIHF1aWV0IGFtdXNlbWVudCBhdCB3aGljaGV2ZXIgcm91dGUgdW5zZXR0bGVkIHlvdS4gJ0V2ZXJ5b25lIHN0cnVnZ2xlcyB3aXRoIHRoZSBtaXJyb3IsIGZpcnN0IHRpbWUsJyBzaGUgc2F5cy4gJ1RoYXQncyByYXRoZXIgdGhlIHdob2xlIHJpZGRsZSBoZXJlLCBhY3R1YWxseSDigJQgbm90IGEgc2hhcGUgaW4gdGhlIHNreSwgYnV0IHRlbGxpbmcgcmVmbGVjdGlvbiBmcm9tIHJlYWxpdHkuIFlvdXIgZ3JlYXQtdW5jbGUgdW5kZXJzdG9vZCB0aGF0IGltbWVkaWF0ZWx5LCB3aGVuIGhlIGNhbWUuJwoKU2hlIHN0dWRpZXMgdGhlIGF0bGFzJ3MgbmV4dCBibGFuayBwYXRjaC4gJ1RoaXMgb25lIGFza3MgeW91IHRvIGFjdHVhbGx5IHNvbHZlIHRoYXQgY29uZnVzaW9uLCBub3QganVzdCBhZG1pcmUgaXQuIEFyZSB5b3UgcmVhZHk/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSByZWFkeQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RG/DsWEgRmxvcmEgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IHNvbHZlIHRoZSByaWRkbGU6IHN0YW5kIHZlcnkgc3RpbGwgYXQgdGhlIGV4YWN0IGNlbnRyZSBvZiB0aGUgbWlycm9yZWQgZmxhdCBhbmQgbGV0IGhlciBleHBsYWluLCBwYXRpZW50bHksIGhvdyBoZXIgb3duIHBlb3BsZSBsZWFybmVkIHRvIHRlbGwgdHJ1ZSBzdGFycyBmcm9tIHJlZmxlY3RlZCBvbmVzIGJ5IGEgc3BlY2lmaWMgZml4ZWQgcG9pbnQgb24gdGhlIGhvcml6b24sIG9yIHdhbGsgdGhlIGZsYXQncyBlZGdlIHdpdGggaGVyIHdoaWxlIHNoZSBkZXNjcmliZXMgYW4gb2xkZXIgbWV0aG9kIOKAlCB0cmFja2luZyBhIHNpbmdsZSBzdGFyJ3Mgc2xvdyBkcmlmdCByYXRoZXIgdGhhbiB0cnVzdGluZyBhbnkgZml4ZWQgcG9pbnQgYXQgYWxsLgoKJ0VpdGhlciBzb2x2ZXMgaXQgcHJvcGVybHksJyBzaGUgc2F5cy4gJ0ZpeGVkIHBvaW50LCBvciBtb3Zpbmcgc3Rhci4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIGZpeGVkLXBvaW50IG1ldGhvZA==', 'next' => '5_fixed'],
                ['text' => 'TGVhcm4gdG8gdHJhY2sgYSBzaW5nbGUgZHJpZnRpbmcgc3Rhcg==', 'next' => '5_drift'],
            ],
        ],
        '5_fixed' => [
            'prose'  => 'TGVhcm5pbmcgdGhlIGZpeGVkLXBvaW50IG1ldGhvZCBtZWFucyBzdGFuZGluZyBhdCB0aGUgZmxhdCdzIGV4YWN0IGNlbnRyZSwgRG/DsWEgRmxvcmEgcG9pbnRpbmcgb3V0IGEgc3BlY2lmaWMgbG93IHJpZGdlIG9uIHRoZSBob3Jpem9uIHRoYXQgbmV2ZXIgZG91YmxlcyBubyBtYXR0ZXIgaG93IHN0aWxsIHRoZSB3YXRlciBzaXRzLCBhbiBhbmNob3IgZm9yIHRoZSBleWUgdGhhdCByZXNvbHZlcyB0aGUgd2hvbGUgZGl6enlpbmcgY29uZnVzaW9uIGFsbW9zdCBpbnN0YW50bHkgb25jZSB5b3Uga25vdyB0byBsb29rIGZvciBpdC4KCk9uY2UgYW5jaG9yZWQsIHRoZSB0cnVlIHN0YXJzIG92ZXJoZWFkIHNlcGFyYXRlIGNsZWFubHkgZnJvbSB0aGVpciBtaXJyb3JlZCB0d2lucyB1bmRlcmZvb3Qu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBjb25zdGVsbGF0aW9uIHByb3Blcmx5LCBvbmNlIHNlcGFyYXRlZA==', 'next' => '6_shared'],
            ],
        ],
        '5_drift' => [
            'prose'  => 'TGVhcm5pbmcgdG8gdHJhY2sgYSBzaW5nbGUgZHJpZnRpbmcgc3RhciBtZWFucyB3YXRjaGluZyBvbmUgcGFydGljdWxhciBwb2ludCBvZiBsaWdodCBwYXRpZW50bHkgb3ZlciBzZXZlcmFsIGxvbmcgbWludXRlcywgaXRzIHNsb3csIHRydWUgbW92ZW1lbnQgYWNyb3NzIHRoZSBza3kgdGhlIG9uZSB0aGluZyBpdHMgZmFsc2UgcmVmbGVjdGlvbiBjYW4gbmV2ZXIgcXVpdGUgbWF0Y2gsIGhvd2V2ZXIgc3RpbGwgdGhlIHdhdGVyIHNpdHMuCgpPbmNlIHlvdSd2ZSB0cmFja2VkIGl0IHByb3Blcmx5LCB0aGUgdHJ1ZSBzdGFycyBvdmVyaGVhZCBzZXBhcmF0ZSBjbGVhbmx5IGZyb20gdGhlaXIgbWlycm9yZWQgdHdpbnMgYmVsb3cu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBjb25zdGVsbGF0aW9uIHByb3Blcmx5LCBvbmNlIHNlcGFyYXRlZA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2l0aCByZWZsZWN0aW9uIGZpbmFsbHksIHByb3Blcmx5IHRvbGQgZnJvbSByZWFsaXR5LCB0aGUgY29uc3RlbGxhdGlvbiByZXZlYWxzIGl0c2VsZiBjbGVhcmx5IG92ZXJoZWFkLCBhbmQgeW91IGRyYXcgaXQgaW50byB0aGUgYXRsYXMncyBibGFuayBwYXRjaCB3aXRoIGEgc3RlYWRpZXIgaGFuZCB0aGFuIGxhc3QgdGltZS4gRG/DsWEgRmxvcmEgYWRkcyBoZXIgb3duIG5vdGUgYmVzaWRlIGl0LCBuYW1pbmcgdGhlIHRyYWRpdGlvbiBhbmQgaG93IGl0J3Mga25vd24gaGVyZSBvbiB0aGUgc2FsdC4KCidZb3VyIGdyZWF0LXVuY2xlIGRyZXcgdGhpcyBleGFjdCBzaGFwZSBvbmNlLCBkZWNhZGVzIGFnbywnIHNoZSBzYXlzLCBzdHVkeWluZyB5b3VyIHdvcmsuICdTYW1lIGNvbmZ1c2lvbiwgc2FtZSBzb2x2aW5nIG9mIGl0LiBHb29kIHRvIHNlZSBpdCBjYXJyaWVkIGZvcndhcmQgcHJvcGVybHkuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNyb3NzIGJhY2sgdG93YXJkIHRoZSBRdWlldCBIb3VyIGFzIHRoZSBtaXJyb3JlZCBmbGF0IHNldHRsZXMgaW50byBmdWxsIG5pZ2h0LCBkb3VibGVkIHN0YXJzIHN0cmV0Y2hpbmcgdG8gZXZlcnkgaG9yaXpvbiBpbiBhIHdheSB0aGF0IG5vIGxvbmdlciBkaXNvcmllbnRzIHF1aXRlIHNvIGJhZGx5IG5vdyB0aGF0IHlvdSB1bmRlcnN0YW5kIHRoZSB0cmljayBvZiBpdC4gUHJpeWEgaGFzIHRoZSB0aGVybW9zIHJlYWR5LCBzdGVhbSBjdXJsaW5nIHVwd2FyZCBpbnRvIHRoZSB0aGluLCBjb2xkIGFpci4KCidCZXR0ZXI/JyBzaGUgYXNrcywgd2F0Y2hpbmcgeW91ciBzdGVhZGllciBzdGVwcy4gJ1NhbHQgZmxhdHMgYnJlYWsgbW9zdCBwZW9wbGUncyBzZW5zZSBvZiB1cCBhbmQgZG93biwgZmlyc3QgY3Jvc3NpbmcuIEdvb2QgdGhhdCB5b3UgZm91bmQgeW91ciBmZWV0Lic=',
            'choices' => [
                ['text' => 'U2F5IHRoZSBtaXJyb3IgdGF1Z2h0IHlvdSBzb21ldGhpbmcgYWJvdXQgdHJ1c3RpbmcgeW91ciBzZW5zZXM=', 'next' => '8_end_trust'],
                ['text' => 'U2F5IHlvdSdyZSBzdGlsbCBub3QgZW50aXJlbHkgc3VyZSB3aGljaCB3YXkgaXMgdXA=', 'next' => '8_end_unsure'],
            ],
        ],
        '8_end_trust' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgbWlycm9yIHRhdWdodCBtZSBzb21ldGhpbmcgYWJvdXQgdHJ1c3RpbmcgbXkgb3duIHNlbnNlcyBwcm9wZXJseSwnIHlvdSBhZG1pdCwgbG9va2luZyBvdXQgYXQgdGhlIGltcG9zc2libGUgZG91YmxlZCBob3Jpem9uLiAnTm90IGp1c3QgYWNjZXB0aW5nIGNvbmZ1c2lvbiwgYnV0IGFjdHVhbGx5IHdvcmtpbmcgb3V0IGhvdyB0byBzb2x2ZSBpdCwgY2FyZWZ1bGx5LCByYXRoZXIgdGhhbiBqdXN0IHdhaXRpbmcgZm9yIGl0IHRvIHBhc3MuJwoKUHJpeWEgbm9kcyBhcHByb3ZpbmdseS4gJ1RoYXQncyBhIGdvb2QgbGVzc29uIHRvIHRha2UgZnJvbSB0aGlzIHN0b3Agc3BlY2lmaWNhbGx5LiBOb3QgZXZlcnkgcmlkZGxlIGluIHRoaXMgYXRsYXMgaXMgZ29pbmcgdG8gYmUgZ2VudGxlLiBHb29kIHRoYXQgeW91J3JlIGJ1aWxkaW5nIHRoZSByaWdodCBpbnN0aW5jdHMgZWFybHkuJw==',
            'ending' => true,
        ],
        '8_end_unsure' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gc3RpbGwgbm90IGVudGlyZWx5IHN1cmUgd2hpY2ggd2F5IGlzIHVwLCcgeW91IGFkbWl0LCBsYXVnaGluZyBzbGlnaHRseSBkZXNwaXRlIHlvdXJzZWxmIGF0IHRoZSBlbmRsZXNzIGRvdWJsZWQgc3RhcnMuICdGZWVscyBsaWtlIHRoZSBmbGF0IG5ldmVyIHF1aXRlIGxldHMgZ28gb2YgeW91LCBldmVuIG9uY2UgeW91J3ZlIHNvbHZlZCBpdHMgYWN0dWFsIHJpZGRsZS4nCgpQcml5YSBsYXVnaHMgdG9vLCBub3QgdW5raW5kbHkuICdGYWlyLiBTb21lIHBsYWNlcyBkbyB0aGF0LiBEb24ndCB3b3JyeSDigJQgc29saWQgZ3JvdW5kJ3MgYWhlYWQgc29vbiBlbm91Z2guJyBTdWxpIGNoaXJydXBzIHNvbWV0aGluZyB0aGF0IHNvdW5kcyBkaXN0aW5jdGx5IGxpa2UgYWdyZWVtZW50IGFzIHRoZSBRdWlldCBIb3VyIGxpZnRzIG9mZiwgc2FsdCBmbGF0IGFuZCBkb3VibGVkIHNreSBzaHJpbmtpbmcgdG9nZXRoZXIgYmVoaW5kIHlvdS4=',
            'ending' => true,
        ],
    ],
];
