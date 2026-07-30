<?php
return [
    'id'    => 4,
    'title' => 'Sturdier Than Wood',
    'color' => '#5A6A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIENhcnBhdGhpYW5zIHJvbGwgZ3JlZW4gYW5kIHRoaWNrIHdpdGggZm9yZXN0LCB3b2x2ZXMgYW5kIGJlYXJzIHNvbWV3aGVyZSBpbiB0aGUgZGVlcGVyIGZvbGRzIG9mIGl0IGFjY29yZGluZyB0byBHcmV0YSwgZGVsaXZlcmVkIHdpdGggdGhlIGZsYXQgY2hlZXJmdWxuZXNzIG9mIHNvbWVvbmUgd2hvIGZpbmRzIHRoaXMgcmVhc3N1cmluZyByYXRoZXIgdGhhbiBhbGFybWluZy4gU2hlZXAgYmVsbHMgY2FycnkgZmFpbnQgYW5kIGNvbnN0YW50IG9uIHRoZSB3aW5kIGxvbmcgYmVmb3JlIHlvdSBzZWUgYSBzaW5nbGUgYWN0dWFsIHNoZWVwLgoKVHdvIHdheXMgdG8gZmluZCB0aGUgc2hlcGhlcmQgZmFtaWx5IHByZXNlbnQgdGhlbXNlbHZlczogZm9sbG93IHRoZSBzaGVlcCB0cmFpbHMgZGlyZWN0bHkgdXAgaW50byB0aGUgaGlnaCBwYXN0dXJlLCBvciBzdG9wIGZpcnN0IGluIHRoZSB2aWxsYWdlIGJlbG93IGFuZCBhc2ssIHByb3Blcmx5LCB3aGVyZSB0aGV5J3ZlIG1vdmVkIHRoZWlyIHN1bW1lciBjYW1wIHRoaXMgeWVhci4=',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBzaGVlcCB0cmFpbHM=', 'next' => '2_trails'],
                ['text' => 'QXNrIGluIHRoZSB2aWxsYWdlIGZpcnN0', 'next' => '2_village'],
            ],
        ],
        '2_trails' => [
            'prose'  => 'VGhlIHRyYWlscyB3aW5kIHN0ZWVwIGFuZCBzd2l0Y2hiYWNrZWQgdGhyb3VnaCBmb3Jlc3QgdGhpbm5pbmcgZ3JhZHVhbGx5IGludG8gb3BlbiBwYXN0dXJlLCBzaGVlcCBiZWxscyBncm93aW5nIGxvdWRlciBhbmQgbW9yZSBkaXN0aW5jdCB0aGUgaGlnaGVyIHlvdSBjbGltYiB1bnRpbCB5b3UgY2FuIHBpY2sgb3V0IGluZGl2aWR1YWwgYW5pbWFscyBieSB0aGUgcGFydGljdWxhciBwaXRjaCBvZiB0aGVpciBiZWxsIGFsb25lLgoKWW91IGNyZXN0IHRoZSBsYXN0IHJpc2UgaW50byBhIHByb3BlciBzdW1tZXIgY2FtcCDigJQgZG9ncywgc2hlZXAsIGEgbG93IGZpcmUsIGFuZCBhIGZhbWlseSB3aG8gc3BvdCB5b3UgYXBwcm9hY2hpbmcgZnJvbSBhIGdlbnVpbmVseSBpbXByZXNzaXZlIGRpc3RhbmNlIGFuZCBzaW1wbHkgd2FpdCwgdW5ib3RoZXJlZCwgZm9yIHlvdSB0byBhcnJpdmUgYW5kIGV4cGxhaW4geW91cnNlbGYu',
            'choices' => [
                ['text' => 'RXhwbGFpbiB5b3Vyc2VsZg==', 'next' => '3_shared'],
            ],
        ],
        '2_village' => [
            'prose'  => 'VGhlIHZpbGxhZ2UgaXMgc21hbGwsIHdhcm0sIGltbWVkaWF0ZWx5IGhvc3BpdGFibGUgaW4gdGhlIHNwZWNpZmljIHdheSBtb3VudGFpbiB2aWxsYWdlcyBzbyBvZnRlbiBhcmUg4oCUIHlvdSdyZSBvZmZlcmVkIMibdWljxIMsIGEgZmllcmNlIGhvbWUtZGlzdGlsbGVkIHBsdW0gYnJhbmR5LCBiZWZvcmUgeW91J3ZlIGZpbmlzaGVkIHlvdXIgZmlyc3Qgc2VudGVuY2Ugb2YgZXhwbGFuYXRpb24uIEFuIG9sZCBtYW4sIG9uY2UgaGUgc3RvcHMgbGF1Z2hpbmcgYXQgeW91ciByZWFjdGlvbiB0byB0aGUgyJt1aWPEgywgcG9pbnRzIHlvdSB1cCBhIHNwZWNpZmljIHRyYWlsIHdpdGggcmVhbCBwcmVjaXNpb24uCgonQnVuaWNhJ3MgZmFtaWx5LCcgaGUgc2F5cy4gJ0dvb2QgcGVvcGxlLiBGb2xsb3cgdGhlIGJlbGxzLiBZb3UnbGwgZmluZCB0aGVtIGJlZm9yZSBkYXJrIGlmIHlvdSBkb24ndCBkYXdkbGUuJw==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSB0cmFpbCBoZSBwb2ludGVkIG91dA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB5b3UgYXJyaXZlZCwgdGhlIGNhbXAgaXMgdGhlIHNhbWUg4oCUIGEgdGlnaHQsIHByYWN0aWNhbCBhcnJhbmdlbWVudCBvZiB0ZW50cyBhbmQgcGVucyBhcm91bmQgYSBjZW50cmFsIGZpcmUsIGFuZCBvbmUgcGFydGljdWxhciB0ZW50IHdob3NlIG1haW4gc3VwcG9ydCBwb2xlLCB5b3UgcmVhbGlzZSBhbG1vc3QgaW1tZWRpYXRlbHksIGlzIGEgbGVuZ3RoIG9mIGR1bGxlZCBicmFzcyByYXRoZXIgdGhhbiB3b29kLCBzYW5kZWQgc21vb3RoIGF0IG9uZSBlbmQgd2hlcmUgYSBmaXR0aW5nIHVzZWQgdG8gYXR0YWNoLgoKVGhlIG1hdHJpYXJjaCwgQnVuaWNhLCBmb2xsb3dzIHlvdXIgZ2F6ZSBhbmQgbGF1Z2hzLCBub3QgdW5raW5kbHkuICdUaGF0IG9sZCB0aGluZz8gRm91bmQgaXQgeWVhcnMgYWdvLCBsZWZ0IGJlaGluZCBieSBzb21lIGZvcmVpZ24gc3VydmV5b3Igd2hvIG5ldmVyIGNhbWUgYmFjayBmb3IgaXQuIE1hZGUgYSBmaW5lIHRlbnQtcG9sZS4gU3R1cmRpZXIgdGhhbiB3b29kLCBpZiB5b3UgZG9uJ3QgbWluZCB0aGUgd2VpZ2h0Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'RXhwbGFpbiB3aGF0IGl0IGFjdHVhbGx5IGlz', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'U2hlIGxpc3RlbnMgdG8gdGhlIHdob2xlIGV4cGxhbmF0aW9uIHdpdGggcmVhbCBpbnRlcmVzdCByYXRoZXIgdGhhbiBhbnkgcGFydGljdWxhciBhdHRhY2htZW50IHRvIHRoZSBwb2xlIGl0c2VsZi4gJ1dlbGwuIElmIGl0J3MgdHJ1bHkgaGlzLCBhbmQgdHJ1bHkgd2FudGVkLCB5b3UgY2FuIGhhdmUgaXQgYmFjayBwcm9wZXJseSDigJQgYnV0IHRoZSB0ZW50IHN0aWxsIG5lZWRzIGEgcG9sZSB0b25pZ2h0LCBhbmQgdGhlIGZsb2NrIHN0aWxsIG5lZWRzIHdhdGNoaW5nIHRpbGwgZGF3bi4gRWFybiBpdCBlaXRoZXIgd2F5OyBtYWtlcyBubyBkaWZmZXJlbmNlIHRvIG1lIHdoaWNoLic=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgb3Zlcm5pZ2h0IHdhdGNoIHdpdGggdGhlIGZsb2Nr', 'next' => '5_watch'],
                ['text' => 'SGVscCByaWcgYSByZXBsYWNlbWVudCBwb2xlIGZvciB0aGUgdGVudA==', 'next' => '5_pole'],
            ],
        ],
        '5_watch' => [
            'prose'  => 'VGhlIG92ZXJuaWdodCB3YXRjaCBpcyBjb2xkLCBsb25nLCBhbmQgcXVpZXRseSB0ZW5zZSDigJQgYSB3b2xmIGNhbGxzIHNvbWV3aGVyZSBpbiB0aGUgZGVlcGVyIGRhcmsgdHdpY2UsIGNsb3NlIGVub3VnaCB0byBzZXQgZXZlcnkgZG9nIGluIGNhbXAgYnJpc3RsaW5nLCB0aG91Z2ggbm90aGluZyBjb21lcyBvZiBpdCBiZXlvbmQgYSBmZXcgcmVzdGxlc3MgaG91cnMuIEJ1bmljYSdzIGdyYW5kc29uLCBzaGFyaW5nIHRoZSB3YXRjaCB3aXRoIHlvdSwgdGVhY2hlcyB5b3UgdGhyZWUgd29yZHMgb2YgUm9tYW5pYW4gZm9yICdzdGF5IGNhbG0sJyByZXBlYXRlZCBhdCB0aGUgZG9ncyBsaWtlIGEgY2hhcm0uCgpCeSBkYXduLCB0aGUgZmxvY2sncyBpbnRhY3QsIHlvdSdyZSBleGhhdXN0ZWQsIGFuZCBzb21ldGhpbmcgaW4gdGhlIHdob2xlIGxvbmcgY29sZCB2aWdpbCBoYXMgZWFybmVkIHlvdSBhIHBsYWNlIGF0IHRoZSBmaXJlIHRoYXQgbWVyZSBjb252ZXJzYXRpb24gd291bGRuJ3QgaGF2ZS4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBwb2xlIGhhbmRlZCBvdmVy', 'next' => '6_shared'],
            ],
        ],
        '5_pole' => [
            'prose'  => 'UmlnZ2luZyBhIHByb3BlciB3b29kZW4gcmVwbGFjZW1lbnQgcG9sZSBtZWFucyBmaW5kaW5nLCBjdXR0aW5nLCBhbmQgdHJpbW1pbmcgYSBzdHJhaWdodCBlbm91Z2ggc2FwbGluZyBpbiB0aGUgZGFyayBieSBsYW1wbGlnaHQg4oCUIHRyaWNraWVyIHRoYW4gaXQgc291bmRzLCBhbmQgdHdpY2UgeW91IGdldCBpdCB3cm9uZyBiZWZvcmUgQnVuaWNhJ3Mgc29uLCBtaWxkbHkgYW11c2VkLCBzaG93cyB5b3UgdGhlIHRyaWNrIG9mIHRlc3RpbmcgYSB0cnVuaydzIHN0cmFpZ2h0bmVzcyBieSBleWUgZnJvbSB0aGUgYmFzZSByYXRoZXIgdGhhbiBwYXJ0d2F5IHVwLgoKQnkgdGhlIHRpbWUgdGhlIHRlbnQncyBwcm9wZXJseSByZXBpdGNoZWQgb24gaXRzIG5ldyBwb2xlLCB5b3VyIGhhbmRzIGFyZSBwaXRjaC1zdGlja3kgYW5kIHlvdXIgUm9tYW5pYW4gdm9jYWJ1bGFyeSBoYXMgZXhwYW5kZWQgYnkgZXhhY3RseSB0aGUgd29yZHMgZm9yICd3cm9uZyB0cmVlLic=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBwb2xlIGhhbmRlZCBvdmVy', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QnVuaWNhIHdvcmtzIHRoZSBicmFzcyB0cmlwb2QgbGVnIGZyZWUgZnJvbSB0aGUgb2xkIHRlbnQgd2l0aCByZWFsIGNhcmUsIHdpcGluZyBkZWNhZGVzIG9mIHdlYXRoZXIgYW5kIHNtb2tlIG9mZiBpdCB3aXRoIHRoZSBoZW0gb2YgaGVyIGFwcm9uIGJlZm9yZSBoYW5kaW5nIGl0IG92ZXIuICdNdWzIm3VtZXNjLCcgc2hlIHNheXMg4oCUIHRoYW5rIHlvdSDigJQgdGhvdWdoIHlvdSdyZSBmYWlybHkgc3VyZSBpdCBzaG91bGQgYmUgdGhlIG90aGVyIHdheSByb3VuZC4KCidXaG9ldmVyIGhlIHdhcywnIHNoZSBhZGRzLCAnaGUgYnVpbHQgdGhpbmdzIHRvIGxhc3QuIFRoaXMgaGVsZCBhIHRlbnQgdXAgdGhyb3VnaCB3aW50ZXJzIHRoYXQga2lsbGVkIGxlc3NlciBwb2xlcyBvdXRyaWdodC4nIFNoZSBzYXlzIGl0IGxpa2UgYSBjb21wbGltZW50IHBhaWQgdG8gYSBtYW4gc2hlIG5ldmVyIG1ldCwgd2hpY2gsIGluIGl0cyBvd24gd2F5LCBpdCBpcy4=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIHByb3Blcmx5IGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciByb3V0ZSB5b3UgZGlkbid0IHRha2Ugb24gdGhlIHdheSB1cCwgdGhlIENhcnBhdGhpYW5zIHNldHRsaW5nIGludG8gZWFybHkgbW9ybmluZyBtaXN0IGJlbG93IHRoZSBoaWdoIHBhc3R1cmUsIHNoZWVwIGJlbGxzIGZhZGluZyBncmFkdWFsbHkgYmVoaW5kIHlvdSBpbnRvIGp1c3QgYW5vdGhlciBzb3VuZCB0aGUgbW91bnRhaW4gbWFrZXMuIFRoZSB0cmlwb2QgbGVnIHJpZGVzIHNlY3VyZSBpbiB0aGUgY2FzZSwgYSB0aGlyZCBjdXRvdXQgZmlsbGVkLCBkdWxsZWQgYnJhc3Mgd2FybWluZyBzbG93bHkgdG8gdGhlIHRlbXBlcmF0dXJlIG9mIGV2ZXJ5dGhpbmcgZWxzZSBpdCdzIHRyYXZlbGxpbmcgd2l0aC4KCkdyZXRhIGV4YW1pbmVzIHRoZSBsZWcncyB3b3JuIGVuZCB3aXRoIHJlYWwgaW50ZXJlc3QuICdUd2VudHkgeWVhcnMgYXMgYSB0ZW50LXBvbGUgYW5kIGl0J3MgYmFyZWx5IHdvcnNlIGZvciB3ZWFyLiBXaG9ldmVyIG1hZGUgdGhpcyBidWlsdCBmb3IgcGVvcGxlIHdobydkIGFjdHVhbGx5IHVzZSBpdCBoYXJkLCBub3QganVzdCBhZG1pcmUgaXQuJw==',
            'choices' => [
                ['text' => 'TWVudGlvbiB0aGUgd29sZiBjYWxsIGZyb20gdGhlIHdhdGNo', 'next' => '8_end_wolf'],
                ['text' => 'TGV0IHRoZSBuaWdodCdzIHNtYWxsIGRyYW1hcyBzdGF5IHVubWVudGlvbmVk', 'next' => '8_end_quiet'],
            ],
        ],
        '8_end_wolf' => [
            'prose'  => 'WW91IG1lbnRpb24gdGhlIHdvbGYsIGhhbGYtZXhwZWN0aW5nIEdyZXRhIHRvIGJlIGFsYXJtZWQgb24geW91ciBiZWhhbGYuIEluc3RlYWQgc2hlIGp1c3Qgbm9kcywgZW50aXJlbHkgbWF0dGVyLW9mLWZhY3QuICdHb29kIHdhdGNoLCB0aGVuLiBNb3N0IG5pZ2h0cyB1cCB0aGVyZSwgc29tZXRoaW5nIGNhbGxzIGFuZCBub3RoaW5nIGNvbWVzIG9mIGl0LiBUaGF0J3Mgbm90IGx1Y2ssIHBhcnRpY3VsYXJseS4gVGhhdCdzIGp1c3QgaG93IGl0IG1vc3RseSBnb2VzLCBpZiB5b3UncmUgcGF5aW5nIHByb3BlciBhdHRlbnRpb24uJwoKSXQncyBub3QgdGhlIHJlYXNzdXJhbmNlIHlvdSBleHBlY3RlZCwgYnV0IGl0J3MgYmV0dGVyIOKAlCBhbiBhY3R1YWwsIHByYWN0aWNhbCBhbnN3ZXIgaW5zdGVhZCBvZiBjb21mb3J0IGZvciBjb21mb3J0J3Mgc2FrZSwgYW5kIHlvdSBmaW5kIHlvdSB0cnVzdCBpdCBtb3JlIGZvciB0aGF0Lg==',
            'ending' => true,
        ],
        '8_end_quiet' => [
            'prose'  => 'WW91IGxldCB0aGUgbmlnaHQncyBzbWFsbCBkcmFtYXMg4oCUIHRoZSB3b2xmLWNhbGwsIHRoZSBjb2xkLCB0aGUgYm9ycm93ZWQgUm9tYW5pYW4gZm9yIGNhbG0g4oCUIHN0YXkgdW5tZW50aW9uZWQsIGZvbGRpbmcgdGhlbSBhd2F5IHByaXZhdGVseSBpbnN0ZWFkIGFzIHNvbWV0aGluZyB0aGF0IGJlbG9uZ3MgdG8geW91IGFuZCBCdW5pY2EncyBncmFuZHNvbiBhbmQgdGhhdCBvbmUgbG9uZyB3YXRjaCwgcmF0aGVyIHRoYW4gc29tZXRoaW5nIHRoYXQgbmVlZHMgcmV0ZWxsaW5nLgoKVGhlIENvbnRvdXIgbGlmdHMgb2ZmIGludG8gYSBza3kgc3RpbGwgcGFsZSB3aXRoIGVhcmx5IG1vcm5pbmcsIHNoZWVwIGJlbGxzIG9uZSBsYXN0IGZhaW50IHNvdW5kIGJlbG93IGJlZm9yZSB0aGUgZW5naW5lIG5vaXNlIHRha2VzIG92ZXIgZW50aXJlbHksIGFuZCB5b3UgZmluZCB5b3Vyc2VsZiwgZm9yIHRoZSBmaXJzdCB0aW1lIHRoaXMgd2hvbGUgdHJpcCwgYWN0dWFsbHkgbG9va2luZyBmb3J3YXJkIHRvIHdoYXRldmVyIGNvbWVzIG5leHQgcmF0aGVyIHRoYW4gc2ltcGx5IGVuZHVyaW5nIHRoZSBnZXR0aW5nLXRoZXJlLg==',
            'ending' => true,
        ],
    ],
];
