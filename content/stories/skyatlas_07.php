<?php
return [
    'id'    => 7,
    'title' => 'Something That Needs To Be Held',
    'color' => '#A83A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'V2FkaSBSdW0ncyB0b3dlcmluZyByZWQgc2FuZHN0b25lIHJpc2VzIGluIHNoZWVyLCBhbmNpZW50IHdhbGxzIG9uIGV2ZXJ5IHNpZGUsIHRoZSB2YWxsZXkgZmxvb3IgYmV0d2VlbiB0aGVtIGltcG9zc2libHkgcXVpZXQsIHRoZSBraW5kIG9mIHNpbGVuY2UgdGhhdCBtYWtlcyBldmVuIHNvZnQgZm9vdHN0ZXBzIGZlZWwgbG91ZC4gUHJpeWEgYnJpbmdzIHRoZSBRdWlldCBIb3VyIGRvd24gY2FyZWZ1bGx5IGJldHdlZW4gdHdvIGxvb21pbmcgcm9jayBmYWNlcy4gJ0JlZG91aW4gZ3VpZGUncyBjYW1wIGlzIHRocm91Z2ggdGhlIGNhbnlvbiwnIHNoZSBzYXlzLiAnU3VsaSdzIGFscmVhZHkgcmVzdGxlc3Mg4oCUIHNoZSBjYW4gYXBwYXJlbnRseSBzbWVsbCBzb21ldGhpbmcgaW50ZXJlc3Rpbmcgd2FpdGluZyBmb3IgdXMuJwoKVHdvIGNhbnlvbiByb3V0ZXMgdG93YXJkIHRoZSBndWlkZSdzIGNhbXAgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgbmFycm93IHNsb3QgY2FueW9uIHNob3J0Y3V0LCBvciB0aGUgd2lkZXIsIGxvbmdlciB3YWRpIGZsb29yLg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbmFycm93IHNsb3QgY2FueW9u', 'next' => '2_slot'],
                ['text' => 'Rm9sbG93IHRoZSB3aWRlciB3YWRpIGZsb29y', 'next' => '2_wadi'],
            ],
        ],
        '2_slot' => [
            'prose'  => 'VGhlIG5hcnJvdyBzbG90IGNhbnlvbiBpcyBhIHRpZ2h0LCBkcmFtYXRpYyBzcXVlZXplIGJldHdlZW4gdG93ZXJpbmcgcm9jayB3YWxscywgeW91ciB2b2ljZSBlY2hvaW5nIHN0cmFuZ2VseSBvZmYgc3RvbmUgdGhhdCdzIHN0b29kIGhlcmUgc2luY2UgbG9uZyBiZWZvcmUgYW55b25lIHRob3VnaHQgdG8gbmFtZSB0aGUgc3RhcnMgYWJvdmUgaXQuIEl0J3MgdGhlIGZhc3RlciByb3V0ZSwgdGhvdWdoIGNvbnNpZGVyYWJseSBtb3JlIGNsYXVzdHJvcGhvYmljLgoKWW91IGVtZXJnZSBhdCB0aGUgZ3VpZGUncyBjYW1wIHdpdGggcmVkIGR1c3Qgb24geW91ciBzaG91bGRlcnMgYW5kIGEgcmVhbCBzZW5zZSBvZiB0aGUgY2FueW9uJ3MgYW5jaWVudCBzY2FsZS4=',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZ3VpZGU=', 'next' => '3_shared'],
            ],
        ],
        '2_wadi' => [
            'prose'  => 'VGhlIHdpZGVyIHdhZGkgZmxvb3IgaXMgYW4gZWFzaWVyLCBtb3JlIG9wZW4gd2FsaywgdGhlIHNhbmRzdG9uZSB3YWxscyBzdGlsbCB0b3dlcmluZyBjbG9zZSBvbiBlaXRoZXIgc2lkZSBidXQgd2l0aCBwcm9wZXIgcm9vbSB0byBicmVhdGhlIGJldHdlZW4gdGhlbS4gWW91IHJlYWNoIHRoZSBndWlkZSdzIGNhbXAgYXQgYSBjb21mb3J0YWJsZSBwYWNlLCB0aGUgdmFsbGV5J3MgZmFtb3VzIHNpbGVuY2Ugc2V0dGxpbmcgaW4gcHJvcGVybHkgd2l0aCBldmVyeSBzdGVwLg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZ3VpZGU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGd1aWRlLCBhIEJlZG91aW4gbWFuIG5hbWVkIFNhbGltLCBncmVldHMgeW91IGJ5IGhpcyBzbWFsbCBmaXJlLCBhbHJlYWR5IHR1cm5pbmcgc29tZXRoaW5nIHNtYWxsIGFuZCBzbW9vdGggYmV0d2VlbiBoaXMgZmluZ2Vycy4gJ1lvdXIgZ3JlYXQtdW5jbGUncyByaWRkbGUgZm9yIHRoaXMgcGF0Y2gsJyBoZSBzYXlzLCBzaG93aW5nIHlvdSB0aGUgYXRsYXMncyBuZXh0IGJsYW5rIHBhZ2UsICdjb21lcyB3aXRoIHNvbWV0aGluZyBleHRyYS4gQWx3YXlzIGhhcywgc2luY2UgdGhlIGZpcnN0IHRpbWUgSSB0b2xkIGl0LCB0byBoaW0sIGFsbCB0aG9zZSB5ZWFycyBhZ28uJwoKSGUgb3BlbnMgaGlzIHBhbG0gdG8gcmV2ZWFsIGEgc21hbGwsIHBvbGlzaGVkIHN0b25lLiAnQXJlIHlvdSByZWFkeSB0byBoZWFyIHRoZSByaWRkbGUgcHJvcGVybHksIGFuZCBzZWUgd2hhdCB0aGlzIGFjdHVhbGx5IGlzPyc=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSByZWFkeQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'U2FsaW0gb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IHJlY2VpdmUgYm90aCByaWRkbGUgYW5kIHN0b25lOiBoZWFyIHRoZSBzdGFyLXJpZGRsZSBmaXJzdCwgdGhlbiBleGFtaW5lIHRoZSBzdG9uZSBvbmNlIHRoZSBza3ktc3RvcnkncyBzZXR0bGVkIHByb3Blcmx5IGluIHlvdXIgbWluZCwgb3IgZXhhbWluZSB0aGUgc3RvbmUgZmlyc3QsIGxldHRpbmcgaXRzIG93biBteXN0ZXJ5IHB1bGwgeW91IHRvd2FyZCB0aGUgcmlkZGxlIGl0IGFwcGFyZW50bHkgYmVsb25ncyB0by4KCidFaXRoZXIgd2F5IGdldHMgeW91IGJvdGgsJyBoZSBzYXlzLiAnUmlkZGxlIGZpcnN0LCBvciBzdG9uZSBmaXJzdC4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'SGVhciB0aGUgcmlkZGxlIGZpcnN0', 'next' => '5_riddle'],
                ['text' => 'RXhhbWluZSB0aGUgc3RvbmUgZmlyc3Q=', 'next' => '5_stone'],
            ],
        ],
        '5_riddle' => [
            'prose'  => 'SGVhcmluZyB0aGUgcmlkZGxlIGZpcnN0IG1lYW5zIFNhbGltJ3MgY2FyZWZ1bCwgcG9ldGljIHRlbGxpbmcgb2YgdGhlIGxvY2FsIHN0YXItbG9yZSBmb3IgdGhpcyBleGFjdCBwYXRjaCBvZiBza3ksIEJlZG91aW4gcGhyYXNlcyB3b3ZlbiBuYXR1cmFsbHkgdGhyb3VnaCBoaXMgYWNjb3VudCwgdGhlIGNvbnN0ZWxsYXRpb24ncyBzaGFwZSBzZXR0bGluZyBjbGVhcmx5IGluIHlvdXIgbWluZCB3ZWxsIGJlZm9yZSBoZSBmaW5hbGx5IGhhbmRzIG92ZXIgdGhlIHNtYWxsIHN0b25lIGl0c2VsZi4KCk9ubHkgdGhlbiwgdHVybmluZyBpdCBvdmVyIGluIHlvdXIgcGFsbSwgZG8geW91IG5vdGljZSB0aGUgZmFpbnQsIGRlbGliZXJhdGUgY3VydmUgZ3JvdW5kIGludG8gb25lIGZhY2Uu',
            'choices' => [
                ['text' => 'RXhhbWluZSB0aGUgc3RvbmUgcHJvcGVybHk=', 'next' => '6_shared'],
            ],
        ],
        '5_stone' => [
            'prose'  => 'RXhhbWluaW5nIHRoZSBzdG9uZSBmaXJzdCBtZWFucyB0dXJuaW5nIGl0IG92ZXIgc2xvd2x5IGluIHlvdXIgcGFsbSB1bmRlciBTYWxpbSdzIHdhdGNoZnVsLCBhbXVzZWQgYXR0ZW50aW9uLCBub3RpY2luZyB0aGUgZmFpbnQsIGRlbGliZXJhdGVseSBncm91bmQgY3VydmUgb24gb25lIGZhY2Ugd2VsbCBiZWZvcmUgaGUgZXZlciBiZWdpbnMgdGhlIHJpZGRsZSBpdHNlbGYsIHRoZSBvYmplY3QncyBteXN0ZXJ5IHB1bGxpbmcgeW91IHByb3Blcmx5IGludG8gdGhlIHN0b3J5IG9uY2UgaGUgZmluYWxseSBzdGFydHMgdGVsbGluZyBpdC4KClRoZSByaWRkbGUsIG9uY2UgaXQgY29tZXMsIGFuc3dlcnMgZXhhY3RseSB0aGUgcXVlc3Rpb24gdGhlIHN0b25lIHdhcyBxdWlldGx5IGFza2luZy4=',
            'choices' => [
                ['text' => 'RXhhbWluZSB0aGUgc3RvbmUgcHJvcGVybHk=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J0l0J3MgYSBsZW5zIGZyYWdtZW50LCcgU2FsaW0gZmluYWxseSBleHBsYWlucywgJ2Zyb20gYW4gb2xkIHRlbGVzY29wZSwgc2hhdHRlcmVkIGdlbmVyYXRpb25zIGJhY2suIEdyb3VuZCBzbW9vdGggYnkgaGFuZGxpbmcgc2luY2UuIFlvdXIgZ3JlYXQtdW5jbGUgcmVjb2duaXNlZCBpdCBpbW1lZGlhdGVseSwgZmlyc3QgdGltZSBJIHNob3dlZCBoaW0g4oCUIHNhaWQgaXQgYmVsb25nZWQgd2l0aCB0aGUgYXRsYXMsIHNvbWVob3csIHRob3VnaCBoZSBuZXZlciBmdWxseSBleHBsYWluZWQgd2h5LicgSGUgcHJlc3NlcyBpdCBpbnRvIHlvdXIgaGFuZC4gJ0ZlZWxzIHJpZ2h0IHRoYXQgaXQgZ29lcyB3aXRoIHlvdSBub3cuJwoKWW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMsIHRoZW4gdHVjayB0aGUgc21hbGwgbGVucyBmcmFnbWVudCBjYXJlZnVsbHkgaW50byB0aGUgYm9vaydzIGluc2lkZSBwb2NrZXQsIHRoZSBmaXJzdCBwaHlzaWNhbCB0aGluZyB0aGlzIHdob2xlIGpvdXJuZXkncyBhY3R1YWxseSBhZGRlZCB0byB0aGUgY29sbGVjdGlvbi4=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0aHJvdWdoIHRoZSB0b3dlcmluZyByZWQgY2FueW9uIGFzIGZ1bGwgbmlnaHQgcHJvcGVybHkgc2V0dGxlcywgV2FkaSBSdW0ncyBhbmNpZW50IHNpbGVuY2UgZGVlcGVuaW5nIGFyb3VuZCB5b3UsIHRoZSBzbWFsbCBsZW5zIGZyYWdtZW50IHNpdHRpbmcgb2RkbHkgaGVhdnkgaW4geW91ciBwb2NrZXQgZm9yIHNvbWV0aGluZyBzbyBzbWFsbC4gUHJpeWEncyB3YWl0aW5nIHdpdGggdGhlIHRoZXJtb3MsIFN1bGkgc25pZmZpbmcgY3VyaW91c2x5IGF0IHlvdXIgcG9ja2V0IHRoZSBtb21lbnQgeW91IGNsaW1iIGFib2FyZC4KCidGaXJzdCBhY3R1YWwgb2JqZWN0LCcgUHJpeWEgbm90ZXMsIGNsZWFybHkgcGxlYXNlZC4gJ01vc3Qgb2YgdGhpcyBqb3VybmV5J3MganVzdCB3b3JkcyBhbmQgZHJhd2luZ3MuIE5pY2UsIGhhdmluZyBzb21ldGhpbmcgdG8gYWN0dWFsbHkgaG9sZC4n',
            'choices' => [
                ['text' => 'U2F5IHRoZSBmcmFnbWVudCBmZWVscyBsaWtlIGEgcmVhbCwgcGh5c2ljYWwgdGhyZWFkIHRvIENvcndpbg==', 'next' => '8_end_thread'],
                ['text' => 'U2F5IHlvdSdyZSBjdXJpb3VzIHdoYXQgaXQgd2FzIGFjdHVhbGx5IHBhcnQgb2Y=', 'next' => '8_end_curious'],
            ],
        ],
        '8_end_thread' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgZnJhZ21lbnQgZmVlbHMgbGlrZSBhIHJlYWwsIHBoeXNpY2FsIHRocmVhZCB0byBoaW0sJyB5b3UgYWRtaXQsIHR1cm5pbmcgaXQgY2FyZWZ1bGx5IGluIHlvdXIgZmluZ2Vycy4gJ0V2ZXJ5dGhpbmcgZWxzZSBzbyBmYXIgaGFzIGJlZW4gd29yZHMgYW5kIGRyYXdpbmdzLCBzZWNvbmRoYW5kIGV2ZW4gd2hlbiB0aGV5J3JlIHZpdmlkLiBUaGlzIGlzIHNvbWV0aGluZyBoZSBhY3R1YWxseSB0b3VjaGVkLCBkZWNpZGVkIG1hdHRlcmVkIGVub3VnaCB0byBrZWVwLicKClByaXlhIG5vZHMsIHdhdGNoaW5nIHlvdSB0dWNrIGl0IHNhZmVseSBhd2F5LiAnVGhhdCdzIGV4YWN0bHkgd2h5IGhlIGtlcHQgaXQsIEknZCBndWVzcy4gU29tZSB0aGluZ3MgbmVlZCB0byBiZSBoZWxkLCBub3QganVzdCBoZWFyZC4n',
            'ending' => true,
        ],
        '8_end_curious' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gY3VyaW91cyB3aGF0IHRlbGVzY29wZSBpdCB3YXMgYWN0dWFsbHkgcGFydCBvZiwnIHlvdSBzYXksIGhvbGRpbmcgdGhlIGZyYWdtZW50IHVwIHRvIGNhdGNoIHRoZSBzdGFybGlnaHQuICdGZWVscyBsaWtlIHRoZXJlJ3MgYSB3aG9sZSBvdGhlciBzdG9yeSBoaWRpbmcgaW4gdGhpcyBzbWFsbCBwaWVjZSBvZiBnbGFzcywgb25lIHdlIGhhdmVuJ3QgaGVhcmQgeWV0LicKClByaXlhIGNvbnNpZGVycyB0aGF0LiAnTWF5YmUgdGhlcmUgaXMuIE1heWJlIHRoYXQncyBhIHF1ZXN0aW9uIGZvciBsYXRlciBpbiB0aGUgam91cm5leSwgb25jZSB3ZSd2ZSBnb3QgbW9yZSBwaWVjZXMgb2YgaGltIGdhdGhlcmVkLicgVGhlIFF1aWV0IEhvdXIgbGlmdHMgb2ZmLCBXYWRpIFJ1bSdzIHRvd2VyaW5nIHNpbGhvdWV0dGVzIHNocmlua2luZyBiZWxvdyBhcyB0aGUgc21hbGwgbGVucyBmcmFnbWVudCByaWRlcyBzYWZlIGluIHRoZSBhdGxhcydzIHBvY2tldC4=',
            'ending' => true,
        ],
    ],
];
