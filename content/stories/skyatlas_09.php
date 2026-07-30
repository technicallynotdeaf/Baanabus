<?php
return [
    'id'    => 9,
    'title' => 'Sky And Calendar Together',
    'color' => '#5A3A7A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TGFkYWtoJ3MgaGlnaCBtb3VudGFpbiBhaXIgaXMgdGhpbiBhbmQgaW1wb3NzaWJseSBjbGVhciwgcHJheWVyIGZsYWdzIHNuYXBwaW5nIGluIGEgY29sZCB3aW5kIGFib3ZlIGEgbW9uYXN0ZXJ5IHBlcmNoZWQgaW1wcm9iYWJseSBhZ2FpbnN0IHRoZSByb2NrLiBQcml5YSBsYW5kcyB0aGUgUXVpZXQgSG91ciBjYXJlZnVsbHkgYXQgYWx0aXR1ZGUsIGNoZWNraW5nIGdhdWdlcyB3aXRoIHZpc2libGUgY29uY2Vybi4gJ1RoaW4gYWlyIHVwIGhlcmUuIFRha2UgaXQgc2xvdyDigJQgbm8gbmVlZCB0byBydXNoIHRoZSBjbGltYi4nCgpUd28gbW91bnRhaW4tbW9uYXN0ZXJ5IGFwcHJvYWNoZXMgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgc3RlZXAsIGRpcmVjdCBzdG9uZSBzdGFpcndheSwgb3IgdGhlIGxvbmdlciwgZ2VudGxlciBzd2l0Y2hiYWNrIHBhdGgu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgc3RlZXAgc3RvbmUgc3RhaXJ3YXk=', 'next' => '2_stairway'],
                ['text' => 'Rm9sbG93IHRoZSBnZW50bGVyIHN3aXRjaGJhY2sgcGF0aA==', 'next' => '2_switchback'],
            ],
        ],
        '2_stairway' => [
            'prose'  => 'VGhlIHN0ZWVwIHN0b25lIHN0YWlyd2F5IGlzIGEgaGFyZCwgYnJlYXRobGVzcyBjbGltYiBpbiB0aGUgdGhpbiBtb3VudGFpbiBhaXIsIHByYXllciBmbGFncyBzbmFwcGluZyBvdmVyaGVhZCB0aGUgd2hvbGUgYXNjZW50LCB5b3VyIGx1bmdzIHdvcmtpbmcgaGFyZGVyIHRoYW4gdGhleSB3b3VsZCBhdCBhbnkgbm9ybWFsIGFsdGl0dWRlLiBZb3UgcmVhY2ggdGhlIGNvdXJ0eWFyZCBwcm9wZXJseSB3aW5kZWQsIGJ1dCBxdWlja2x5Lg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGNvdXJ0eWFyZA==', 'next' => '3_shared'],
            ],
        ],
        '2_switchback' => [
            'prose'  => 'VGhlIGxvbmdlciBzd2l0Y2hiYWNrIHBhdGggdGFrZXMgdGhlIG1vdW50YWluJ3MgZ3JhZGUgbW9yZSBnZW50bHksIGVhc2llciBvbiBsdW5ncyB1bnVzZWQgdG8gdGhlIHRoaW4gYWlyLCBwcmF5ZXIgZmxhZ3MgYW5kIGRpc3RhbnQgc25vdyBwZWFrcyB2aXNpYmxlIGluIHNsb3csIGNoYW5naW5nIGdsaW1wc2VzIHRoZSB3aG9sZSB1bmh1cnJpZWQgY2xpbWIuIFlvdSByZWFjaCB0aGUgY291cnR5YXJkIGEgbGl0dGxlIGxhdGVyLCBidXQgY29tZm9ydGFibHku',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGNvdXJ0eWFyZA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SW4gdGhlIG1vbmFzdGVyeSBjb3VydHlhcmQsIGFuIGFzdHJvbm9tZXItbW9uayBuYW1lZCBUZW56aW4gZ3JlZXRzIHlvdSB3aXRoIHF1aWV0IHdhcm10aCwgcHJheWVyIHdoZWVscyB0dXJuaW5nIHNsb3dseSBuZWFyYnkuIEhlIGV4YW1pbmVzIHRoZSBhdGxhcydzIG5leHQgYmxhbmsgcGF0Y2ggdGhvdWdodGZ1bGx5LiAnWW91ciBncmVhdC11bmNsZSdzIHJpZGRsZSBoZXJlIGRyYXdzIG9uIGJvdGggc2t5LWxvcmUgYW5kIGNhbGVuZGFyLWxvcmUgdG9nZXRoZXIsJyBoZSBleHBsYWlucy4gJ05vdCBzaW1wbHkgd2hpY2ggc3RhcnMsIGJ1dCB3aGVuLCBhbmQgd2h5IHRoZSB0aW1pbmcgaXRzZWxmIG1hdHRlcnMgYXMgbXVjaCBhcyB0aGUgc2hhcGUuJwoKSGUgc3R1ZGllcyB5b3UuICdBcmUgeW91IHByZXBhcmVkIHRvIGxlYXJuIGJvdGggYXQgb25jZSwgcHJvcGVybHk/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBwcmVwYXJlZCB0byBsZWFybiBib3Ro', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGVuemluIG9mZmVycyB0d28gd2F5cyB0byBwcm9wZXJseSBsZWFybiB0aGUgY29tYmluZWQgcmlkZGxlOiBzaXQgd2l0aCB0aGUgbW9uYXN0ZXJ5J3Mgb3duIGx1bmFyIGNhbGVuZGFyIGZpcnN0LCB1bmRlcnN0YW5kaW5nIHRoZSB0aW1pbmcgYmVmb3JlIHRoZSBza3ktc2hhcGUgaXMgbGF5ZXJlZCBvbiB0b3AsIG9yIGJlZ2luIHdpdGggdGhlIHNreS1zaGFwZSBpdHNlbGYsIGxldHRpbmcgdGhlIGNhbGVuZGFyJ3Mgc2lnbmlmaWNhbmNlIHJldmVhbCBpdHNlbGYgYWZ0ZXJ3YXJkIGFzIGNvbnRleHQuCgonRWl0aGVyIGFycml2ZXMgYXQgdGhlIHNhbWUgdW5kZXJzdGFuZGluZywnIGhlIHNheXMuICdDYWxlbmRhciBmaXJzdCwgb3Igc2t5IGZpcnN0LiBZb3VyIGNob2ljZS4n',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIGNhbGVuZGFyIGZpcnN0', 'next' => '5_calendar'],
                ['text' => 'TGVhcm4gdGhlIHNreS1zaGFwZSBmaXJzdA==', 'next' => '5_sky'],
            ],
        ],
        '5_calendar' => [
            'prose'  => 'TGVhcm5pbmcgdGhlIGNhbGVuZGFyIGZpcnN0IG1lYW5zIHNpdHRpbmcgd2l0aCBUZW56aW4gb3ZlciB0aGUgbW9uYXN0ZXJ5J3MgY2FyZWZ1bCBsdW5hciByZWNrb25pbmcsIHVuZGVyc3RhbmRpbmcgZXhhY3RseSB3aHkgdGhpcyBwYXJ0aWN1bGFyIG5pZ2h0IG9mIHRoZSB5ZWFyIG1hdHRlcnMgYmVmb3JlIGhlIGV2ZXIgZGVzY3JpYmVzIHRoZSBjb25zdGVsbGF0aW9uIGl0c2VsZiwgdGltaW5nIGFuZCBtZWFuaW5nIGFycml2aW5nIHRvZ2V0aGVyIHJhdGhlciB0aGFuIHNlcGFyYXRlbHkuCgpCeSB0aGUgdGltZSBoZSBtb3ZlcyB0byB0aGUgc2t5LXNoYXBlLCBpdHMgc2lnbmlmaWNhbmNlIGlzIGFscmVhZHksIHByb3Blcmx5IGNsZWFyLg==',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_sky' => [
            'prose'  => 'TGVhcm5pbmcgdGhlIHNreS1zaGFwZSBmaXJzdCBtZWFucyBUZW56aW4gZGVzY3JpYmluZyB0aGUgY29uc3RlbGxhdGlvbiBpdHNlbGYgd2l0aCByZWFsIGNhcmUsIGl0cyBvdXRsaW5lIHNldHRsaW5nIGNsZWFybHkgaW4geW91ciBtaW5kIGJlZm9yZSBoZSBmaW5hbGx5IGV4cGxhaW5zIHRoZSBjYWxlbmRhciBzaWduaWZpY2FuY2UgbGF5ZXJlZCBiZW5lYXRoIGl0LCB0aGUgdGltaW5nIGFycml2aW5nIGFmdGVyd2FyZCBhcyBhIGRlZXBlciwgcmljaGVyIGNvbnRleHQgdG8gd2hhdCB5b3UndmUgYWxyZWFkeSBzZWVuLgoKQnkgdGhlIGVuZCwgYm90aCBwaWVjZXMgc2l0IHRvZ2V0aGVyIHByb3Blcmx5LCBuZWl0aGVyIG9uZSBjb21wbGV0ZSB3aXRob3V0IHRoZSBvdGhlci4=',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMncyBibGFuayBwYXRjaCwgYW5kIFRlbnppbiBhZGRzIGhpcyBvd24gY2FyZWZ1bCBub3RlIGJlc2lkZSBpdCDigJQgbm90IGp1c3QgdGhlIHNoYXBlLCBidXQgdGhlIHNwZWNpZmljIGRhdGUgYW5kIHJlYXNvbmluZyB0aGF0IGdpdmVzIGl0IG1lYW5pbmcgaGVyZS4gJ1lvdXIgZ3JlYXQtdW5jbGUgdW5kZXJzdG9vZCB0aGF0IHNreSBhbmQgY2FsZW5kYXIgYXJlbid0IHNlcGFyYXRlIHRoaW5ncywgaW4gYSBwbGFjZSBsaWtlIHRoaXMsJyBoZSBzYXlzLiAnR29vZCB0aGF0IHlvdSd2ZSB0YWtlbiB0aGUgdGltZSB0byB1bmRlcnN0YW5kIGJvdGggcHJvcGVybHkuJwoKVGhlIHByYXllciB3aGVlbHMgY29udGludWUgdGhlaXIgc2xvdywgcGF0aWVudCB0dXJuaW5nIG5lYXJieSBhcyB5b3UgZmluaXNoIHRoZSBwYWdlLg==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGRlc2NlbmQgY2FyZWZ1bGx5IGluIHRoZSB0aGluIG1vdW50YWluIGFpciwgdGhlIG1vbmFzdGVyeSdzIHByYXllciBmbGFncyBzbmFwcGluZyBzdGVhZGlseSBvdmVyaGVhZCwgdGhlIFF1aWV0IEhvdXIgd2FpdGluZyBwYXRpZW50bHkgYmVsb3cgd2l0aCBQcml5YSBhbHJlYWR5IHBvdXJpbmcgdGhlIHNoYXJlZCB0aGVybW9zLiBTdWxpIHBlZXJzIG91dCBmcm9tIHRoZSBub3NlIGNvbmUsIGVhcnMgdHdpdGNoaW5nIGF0IHRoZSBjb2xkIG1vdW50YWluIHdpbmQuCgonQWx0aXR1ZGUgYWdyZWUgd2l0aCB5b3U/JyBQcml5YSBhc2tzLCB3YXRjaGluZyB5b3VyIGNhcmVmdWwsIGRlbGliZXJhdGUgc3RlcHMu',
            'choices' => [
                ['text' => 'U2F5IHRoZSBjYWxlbmRhciBsZXNzb24gY2hhbmdlZCBob3cgeW91IHNlZSB0aGUgd2hvbGUgYXRsYXM=', 'next' => '8_end_calendar'],
                ['text' => 'U2F5IHlvdSdyZSBqdXN0IGdsYWQgdG8gYmUgYnJlYXRoaW5nIGVhc2llciBhZ2Fpbg==', 'next' => '8_end_breathe'],
            ],
        ],
        '8_end_calendar' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgY2FsZW5kYXIgbGVzc29uIGNoYW5nZWQgaG93IEkgc2VlIHRoZSB3aG9sZSBhdGxhcywnIHlvdSBhZG1pdCwgc2V0dGxpbmcgZ3JhdGVmdWxseSBpbnRvIHRoaWNrZXIgYWlyLiAnTWF5YmUgZXZlcnkgcGFnZSBpbiBoZXJlIGhhcyBhIHRpbWluZyBoaWRkZW4gaW4gaXQgdG9vLCBub3QganVzdCBhIHNoYXBlLiBGZWVscyBsaWtlIHRoZXJlJ3MgbW9yZSB0byBub3RpY2UgdGhhbiBJJ3ZlIGJlZW4gbm90aWNpbmcuJwoKUHJpeWEgY29uc2lkZXJzIHRoYXQgc2VyaW91c2x5LiAnVGhhdCdzIGEgZ2VudWluZWx5IGdvb2QgdGhvdWdodC4gTWlnaHQgYmUgd29ydGggd2F0Y2hpbmcgZm9yLCB0aGUgcmVzdCBvZiB0aGUgd2F5LiBHb29kIGNhdGNoLic=',
            'ending' => true,
        ],
        '8_end_breathe' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20ganVzdCBnbGFkIHRvIGJlIGJyZWF0aGluZyBlYXNpZXIgYWdhaW4sJyB5b3UgYWRtaXQsIGd1bHBpbmcgZ3JhdGVmdWxseSBhdCB0aGUgdGhpY2tlciBhaXIgbG93ZXIgZG93bi4gJ1RoYXQgY2xpbWIgcHJvcGVybHkgaHVtYmxlZCBtZS4gQ2FsZW5kYXIgbGVzc29uIHdhcyBmYXNjaW5hdGluZywgYnV0IG15IGx1bmdzIGhhdmUgc29tZSBvcGluaW9ucyBhYm91dCB0aGUgYWx0aXR1ZGUgaXQgcmVxdWlyZWQuJwoKUHJpeWEgbGF1Z2hzLCBoYW5kaW5nIG92ZXIgdGhlIHRoZXJtb3MuICdGYWlyLiBOZXh0IHN0b3AncyBjb25zaWRlcmFibHkgZ2VudGxlciBvbiB0aGUgbHVuZ3MsIEkgcHJvbWlzZS4nIFRoZSBRdWlldCBIb3VyIGxpZnRzIHNtb290aGx5IGF3YXksIExhZGFraCdzIHByYXllciBmbGFncyBhbmQgc25vdyBwZWFrcyBzaHJpbmtpbmcgaW50byB0aGUgdGhpbiwgY2xlYXIgbW91bnRhaW4gYWlyIGJlaGluZCB5b3Uu',
            'ending' => true,
        ],
    ],
];
