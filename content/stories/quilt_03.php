<?php
return [
    'id'    => 3,
    'title' => 'The Hollow Oak',
    'color' => '#4A6741',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIEJsYWNrIEZvcmVzdCBiZWdpbnMgYXQgYSBzdG9uZSB3YWxsIHdoZXJlIHRoZSByb2FkIGVuZHMgYW5kIHRoZSB0cmVlcyBzdGFydC4gVGhleSBhcmUgb2xkZXIgdGhhbiB5b3UgZXhwZWN0ZWQg4oCUIG5vdCBwYXJ0aWN1bGFybHkgdGFsbCBhdCBmaXJzdCwgYnV0IHdpdGhpbiB0d2VudHkgcGFjZXMgdGhlIGxpZ2h0IGNoYW5nZXMgYW5kIHRoZSBncmVlbiBiZWNvbWVzIGl0cyBvd24gd2VhdGhlci4gWW91IHN0b3AgYW5kIGxvb2suCgpUd28gcm91dGVzIGludG8gdGhlIGhlYXJ0IG9mIGl0LiBBIHNpZ25wb3N0IG1hcmtzIHRoZSBmb3Jlc3RlcnMnIHdhbGt3YXksIHJlYWNoZWQgYnkgYSBsYWRkZXIgYXQgaXRzIGJhc2UsIHRoYXQgcnVucyBiZXR3ZWVuIHRoZSBoaWdoIGJyYW5jaGVzLiBUbyB0aGUgb3RoZXIgc2lkZSBvZiB0aGUgcG9zdDogYSBjYXJ2ZWQgYXJjaHdheSBsb3cgaW4gdGhlIGJhbmssIHRoZSBlbnRyYW5jZSB0byBhIHJvb3QgcGFzc2FnZSwgZHJ5IGFuZCBkaW0sIGN1dCBsb25nIGFnbyBmb3IgbXVzaHJvb20tZ2F0aGVyZXJzIHdobyBuZWVkZWQgdG8gd29yayB0aHJvdWdoIHJhaW4uCgpGcmVkIGhhcyBhbHJlYWR5IHJlYWQgdGhlIHNpZ25wb3N0IHR3aWNlIGFuZCBoYXMgb3BpbmlvbnMgYWJvdXQgYm90aCBvcHRpb25zIHRoYXQgaGUgd2lsbCBzaGFyZSByZWdhcmRsZXNzIG9mIHdoaWNoIHlvdSBjaG9vc2Uu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgaGlnaCB3YWxrd2F5', 'next' => '2_canopy'],
                ['text' => 'VGFrZSB0aGUgcm9vdCBwYXNzYWdl', 'next' => '2_roots'],
            ],
        ],
        '2_canopy' => [
            'prose'   => 'VGhlIHdhbGt3YXkgaXMgc2VyaW91cyBlbmdpbmVlcmluZyDigJQgcm9wZSBicmlkZ2VzLCB3b29kZW4gcGxhdGZvcm1zLCBoYW5kcmFpbHMgd29ybiBzbW9vdGggd2l0aCB0d2VudHkgeWVhcnMgb2YgbWFpbnRlbmFuY2UgdGhhdCBzb21lb25lIGhhcyBwZXJmb3JtZWQgd2l0aG91dCBjb21wbGFpbnQuIEZyb20gdXAgaGVyZSB0aGUgZm9yZXN0IGlzIGEgZGlmZmVyZW50IHRoaW5nOiB0aGUgY2Fub3B5IHNob3dzIGVhY2ggdHJlZSBhcyBhIGdyZWVuIHN1cmZhY2UgYXQgdGhlIHNhbWUgaGVpZ2h0LCBhbmQgeW91IGNhbiBzZWUgdGhlIHNoYXBlIG9mIHRoZSB3aG9sZSBzeXN0ZW0sIHRoZSB3YXkgZ2FwcyBhbmQgY2x1c3RlcnMgZm9sbG93IHRoZSBzbG9wZSBvZiB0aGUgbGFuZC4KCkZyZWQgaGFzIGlkZW50aWZpZWQgc2V2ZW50ZWVuIHNwZWNpZXMgYnkgY2Fub3B5IHNoYXBlIGFsb25lLiBIZSBpcyB3b3JraW5nIG9uIGVpZ2h0ZWVuLgoKJ0NhcnBpbnVzIGJldHVsdXMsJyBoZSBzYXlzLCB3aXRoIHF1aWV0IGNvbnZpY3Rpb24uICdBaGVhZC4gV2F0Y2ggdGhlIGJyYW5jaGluZyBhbmdsZS4nIEhlIGlzIGNvcnJlY3QuIEhlIHNheXMgJ0kgc2FpZCBob3JuYmVhbScgZXZlbiB0aG91Z2ggbm8gb25lIGRpc2FncmVlZCB3aXRoIGhpbS4=',
            'choices' => [
                ['text' => 'Q29tZSBkb3duIHdoZW4gdGhlIHBhdGggZGVzY2VuZHM=', 'next' => '3_mira'],
            ],
        ],
        '2_roots' => [
            'prose'   => 'VGhlIHBhc3NhZ2UgaXMgdGhlIGhlaWdodCBvZiBhIHVzZWZ1bCBkb29yLCB0aGUgd2FsbHMgcGFja2VkIGVhcnRoIGFuZCByb290IGFuZCBvY2Nhc2lvbmFsIHN0b25lLiBMYW50ZXJucyBoYW5nIGZyb20gd29vZGVuIHBlZ3MgYXQgaW50ZXJ2YWxzIOKAlCB0aGUgb2lsIGZyZXNoLCB0aGUgZ2xhc3MgY2xlYW4uIFNvbWVvbmUgdGVuZHMgdGhlbS4KCllvdSBzdG9wIHdpdGhvdXQgZGVjaWRpbmcgdG8gc3RvcC4KClRoZSBzaWxlbmNlIGhlcmUgaGFzIGEgc3BlY2lmaWMgcXVhbGl0eS4gTm90IGVtcHR5IOKAlCBwcmVzZW50LiBTb21ldGhpbmcgaGFzIGJlZW4gcGF5aW5nIGF0dGVudGlvbiBpbiB0aGlzIHR1bm5lbCBmb3IgYSBsb25nIHRpbWUsIGFuZCB5b3UgYXJlIHN0YW5kaW5nIGluIHRoZSBtaWRkbGUgb2YgaXRzIGF0dGVudGlvbi4gSXQgZG9lcyBub3QgZmVlbCBob3N0aWxlLiBJdCBmZWVscyBwYXRpZW50LgoKRnJlZCwgZm9yIG9uY2UsIGRvZXMgbm90IHNwZWFrLgoKWW91IHN0YW5kIHN0aWxsIGZvciBhIG1pbnV0ZSwgbWF5YmUgdHdvLiBUaGVuIHRoZSBwYXNzYWdlIGxpZ2h0ZW5zIGFoZWFkIG9mIHlvdSwgYW5kIHlvdSBnbyBvbi4=',
            'choices' => [
                ['text' => 'Q29tZSBvdXQgb2YgdGhlIHBhc3NhZ2U=', 'next' => '3_mira'],
            ],
        ],
        '3_mira' => [
            'prose'   => 'VGhlIGNsZWFyaW5nIGJleW9uZCB0aGUgdHJlZXMgaXMgcmVjZW50IHdvcmsg4oCUIHN0dW1wcyBjdXQgY2xlYW4gYW5kIGxldmVsLCBzYXdkdXN0IHN0aWxsIHBhbGUgaW4gdGhlIGdyYXNzLCBiYXJrIHN0cmlwcyBzdGFja2VkIHRvIG9uZSBzaWRlLiBBIGZvcmVzdGVyIGlzIGNyb3NzaW5nIGZyb20gdGhlIGVhc3Qgd2l0aCBhIGNvaWwgb2Ygcm9wZSBvbiBvbmUgc2hvdWxkZXIuCgpTaGUgc3RvcHMgd2hlbiBzaGUgc2VlcyB5b3UuIE9yIHJhdGhlcjogd2hlbiBzaGUgc2VlcyB0aGUgcG91Y2ggYXQgeW91ciBoaXAuIEhlciBzdGVwIHNsb3dzLCBhbmQgc29tZXRoaW5nIHNoaWZ0cyBpbiBoZXIgZXhwcmVzc2lvbiDigJQgbm90IHN1c3BpY2lvbiwgYnV0IHRoZSBwYXJ0aWN1bGFyIGF0dGVudGlvbiBvZiBzb21lb25lIHdobyBrbm93cyB3aGVyZSBzb21ldGhpbmcgY29tZXMgZnJvbSBhbmQgaXMgc3VycHJpc2VkIHRvIGZpbmQgaXQgaGVyZS4KCidXaGVyZSBkaWQgeW91IGdldCB0aGF0IHdlbGQ/JyBzaGUgc2F5cy4=',
            'choices' => [
                ['text' => 'RXhwbGFpbiB3aGVyZSB0aGUgcG91Y2ggY2FtZSBmcm9t', 'next' => '4_valley'],
            ],
        ],
        '4_valley' => [
            'prose'   => 'WW91IGV4cGxhaW4uCgpNaXJhIGxpc3RlbnMgd2l0aCB0aGUgcGF0aWVuY2Ugb2Ygc29tZW9uZSBmaWxsaW5nIGluIGEgZ2FwIHRoZXkgaGF2ZSBiZWVuIGNhcnJ5aW5nIGZvciBhIHdoaWxlLiAnVGhlIHZhbGxleSB3aGVyZSB0aGF0IHdlbGQgZ3Jvd3MsJyBzaGUgc2F5cyB3aGVuIHlvdSBmaW5pc2guICdZb3VyIGdyYW5kbW90aGVyIHBhc3NlZCB0aHJvdWdoIGl0LiBTaGUgd2FzIGNhdGFsb2d1aW5nIHBsYW50cyDigJQgbW92ZWQgc2xvd2x5LCBvbmUgaGVyYiBwYXRjaCBhdCBhIHRpbWUsIGFjY29yZGluZyB0byBteSBncmFuZG1vdGhlcidzIHJlY29yZCBib29rLiBUaGVyZSB3YXMgY29ycmVzcG9uZGVuY2UuJyBBIHBhdXNlLiAnU2hlIGtuZXcgbXkgZ3JhbmRtb3RoZXIncyBzaXN0ZXIuJwoKU2hlIGRvZXNuJ3QgZWxhYm9yYXRlLiBTaGUgc2F5cyBpdCBhcyBmYWN0LCB0aGUgd2F5IHBlb3BsZSBjYXJyeSB0aGluZ3MgdGhleSBoYXZlIGhlbGQgYSBsb25nIHRpbWUuCgonU2hlIGFsd2F5cyBzdG9wcGVkIGF0IHRoZSBvYWssJyBNaXJhIHNheXMuICdUaGlzIHdheS4nIFNoZSBzZXRzIG9mZiBpbnRvIHRoZSB0cmVlcy4=',
            'choices' => [
                ['text' => 'QXNrIGFib3V0IHRoZSBzaXN0ZXI=', 'next' => '5_sister'],
                ['text' => 'S2VlcCB1cCB3aXRob3V0IHNwZWFraW5n', 'next' => '5_quiet'],
            ],
        ],
        '5_sister' => [
            'prose'   => 'J1lvdXIgZ3JhbmRtb3RoZXIgYW5kIHRoZSBzaXN0ZXIsJyB5b3Ugc2F5LiAnRGlkIHRoZXkga25vdyBlYWNoIG90aGVyIHdlbGw/JwoKTWlyYSB3YWxrcyBmb3IgYSBtb21lbnQgYmVmb3JlIGFuc3dlcmluZy4gJ05vdCB3ZWxsIGluIHRpbWUuIFdlbGwgaW4gY29ycmVzcG9uZGVuY2UuIE15IGdyYW5kbW90aGVyIHNhaWQgdGhleSB3ZXJlIHRoZSBraW5kIG9mIHBlb3BsZSB3aG8gdW5kZXJzdGFuZCBlYWNoIG90aGVyIGltbWVkaWF0ZWx5IGFuZCBuZWVkIHZlcnkgbGl0dGxlIG9jY2FzaW9uLicgQSBwYXVzZS4gJ0hlciBzaXN0ZXIgZGllZCBiZWZvcmUgeW91ciBncmFuZG1vdGhlciBjYW1lIHRocm91Z2ggdGhpcyB2YWxsZXkuIEkgdGhpbmsgdGhhdCBpcyBwYXJ0IG9mIHdoeSBzaGUgd2FzIGhlcmUuIE5vdCBvbmx5IHRoZSBjYXRhbG9ndWluZy4nCgpTaGUgc2F5cyBpdCB3aXRob3V0IGV4Y2Vzcy4gVGhlIGZvcmVzdCByZWNlaXZlcyBpdC4gRnJlZCBpcyBxdWlldCBvbiB5b3VyIHNob3VsZGVyLg==',
            'choices' => [
                ['text' => 'V2FsayBvbiB0aHJvdWdoIHRoZSBvbGQgZ3Jvd3Ro', 'next' => '6_clearing'],
            ],
        ],
        '5_quiet' => [
            'prose'   => 'WW91IHdhbGsgd2l0aG91dCBzcGVha2luZy4KClRoZSBmb3Jlc3QgZmlsbHMgdGhlIHNwYWNlLiBNaXJhIG1vdmVzIGJldHdlZW4gdGhlIHRyZWVzIHdpdGggdGhlIGVjb25vbWljYWwgcGFjZSBvZiBzb21lb25lIHdobyBoYXMgbWFkZSB0aGlzIHBhdGggZXZlcnkgZGF5IGZvciB5ZWFycywgYW5kIHlvdSBmb2xsb3cgaGVyIGFuZCBmaW5kIHRoZSByaHl0aG0gb2YgaXQuIEZyZWQgc3RvcHMgY2F0YWxvZ3Vpbmcgd2l0aGluIHRoZSBmaXJzdCBmaXZlIG1pbnV0ZXMsIHdoaWNoIG1lYW5zIHRoZSBmb3Jlc3QgaGFzIGFjaGlldmVkIHNvbWV0aGluZy4KCkFmdGVyIGEgd2hpbGUgdGhlIHRyZWVzIGdldCBvbGRlciDigJQgdGhlIHRydW5rcyB0aGlja2VyLCB0aGUgY2Fub3B5IGhpZ2hlciwgdGhlIGxpZ2h0IGNvbWluZyBkb3duIG1vcmUgZGlyZWN0bHksIGFzIGlmIGl0IGhhcyBmdXJ0aGVyIHRvIHRyYXZlbC4gU29tZXRoaW5nIHNoaWZ0cyBpbiB0aGUgcXVhbGl0eSBvZiB0aGUgc2lsZW5jZSBhcyB5b3UgZ28gZGVlcGVyLg==',
            'choices' => [
                ['text' => 'V2FsayBpbnRvIHRoZSBvbGRlciB0cmVlcw==', 'next' => '6_clearing'],
            ],
        ],
        '6_clearing' => [
            'prose'   => 'VGhlIG9sZCBncm93dGggaXMgYSBkaWZmZXJlbnQgY291bnRyeSBmcm9tIHRoZSByZXN0IG9mIHRoZSBmb3Jlc3QuIFRoZSB0cmVlcyBoZXJlIGFyZSB0aGUgZGlhbWV0ZXIgb2Ygc21hbGwgcm9vbXMsIHRoZSBiYXJrIGRlZXBseSByaWRnZWQsIHJvb3RzIGVtZXJnaW5nIGZyb20gdGhlIHNvaWwgaW4gYXJjaGVzIGFuZCBidXR0cmVzc2VzLiBUaGUgb2xkZXN0IG9uZSBpcyBub3Qgb2J2aW91c2x5IHRoZSBvbGRlc3QgYXQgZmlyc3Qg4oCUIGl0IGlzIHNpbXBseSBhdCB0aGUgY2VudHJlIG9mIHRoZSBjbGVhcmluZywgYXMgaWYgaXQgaGFzIGJlZW4gb3JnYW5pc2luZyB0aGUgZm9yZXN0IGFyb3VuZCBpdHNlbGYgd2l0aG91dCBtYWtpbmcgYSBwb2ludCBvZiBpdC4KCk1pcmEgc3RvcHMgYXQgdGhlIGVkZ2Ugb2YgdGhlIGNsZWFyaW5nLiAnVGhlcmUsJyBzaGUgc2F5cy4gU2hlIGRvZXNuJ3QgZm9sbG93IHlvdSBpbi4=',
            'choices' => [
                ['text' => 'V2FsayB0byB0aGUgb2Fr', 'next' => '7_oak'],
            ],
        ],
        '7_oak' => [
            'prose'   => 'VGhlIGhvbGxvdyBpcyBhdCBjaGVzdCBoZWlnaHQg4oCUIG5vdCBhIHdvdW5kIGJ1dCBhIGZpbmlzaGVkIHNwYWNlLCB0aGUgaW50ZXJpb3Igc21vb3RoIGFuZCBkcnksIHRoZSBiYXJrIGFyb3VuZCBpdCBjdXJ2ZWQgaW4gYSBnZXN0dXJlIHRoYXQgdG9vayBkZWNhZGVzLiBZb3VyIGhhbmQgZ29lcyBpbiB3aXRob3V0IGhlc2l0YXRpb24uCgpUaGUgdGluIGJveCBpcyBhdCB0aGUgYmFjaywgd3JhcHBlZCBpbiB3YXhlZCBjbG90aCB0aGF0IGlzIHN0aWxsIGludGFjdC4gSW5zaWRlOiBhIHNxdWFyZSBvZiBlbWJyb2lkZXJlZCBjbG90aCBhbmQsIGJlbmVhdGggaXQsIGEgZm9sZGVkIHBhcGVyIGluIHlvdXIgZ3JhbmRtb3RoZXIncyBoYW5kd3JpdGluZy4KCllvdSBzaXQgZG93biBhdCB0aGUgYmFzZSBvZiB0aGUgdHJlZSB3aXRoIHlvdXIgYmFjayBhZ2FpbnN0IHRoZSBiYXJrLCB0aGUgd2F5IHlvdSdkIHNpdCBpZiB5b3UgaW50ZW5kZWQgdG8gc3RheSBmb3IgYSB3aGlsZS4=',
            'choices' => [
                ['text' => 'T3BlbiB0aGUgbm90ZQ==', 'next' => '8_note'],
            ],
        ],
        '8_note' => [
            'prose'   => 'U2hlIHdyaXRlczogSSBzYXQgaW4gdGhpcyB0cmVlLiBJIHdhcyB0ZW4geWVhcnMgb2xkLCBvciBwZXJoYXBzIGVsZXZlbiDigJQgSSBjYW5ub3Qgbm93IHJlbWVtYmVyIHdoaWNoLiBUaGUgYnJhbmNoIHdhcyBsb3dlciB0aGVuLCBvciBJIHdhcyBzbWFsbGVyLCBvciBib3RoLiBJIGNvdWxkIHNlZSB0aGUgY2Fub3B5IGZyb20gYWJvdmUsIGFuZCBiZXlvbmQgaXQgdGhlIGVkZ2Ugb2YgYSBtb3VudGFpbiBJIGRpZCBub3Qga25vdyB0aGUgbmFtZSBvZi4KCkkgZGVjaWRlZCBJIHdvdWxkIGdvIGFuZCBmaW5kIHRoZSBuYW1lIG9mIHRoZSBtb3VudGFpbi4gQW5kIHRoZW4gSSBkZWNpZGVkIEkgd291bGQgZmluZCBvdXQgd2hhdCB3YXMgb24gdGhlIG90aGVyIHNpZGUgb2YgaXQuIEFuZCB0aGVuIEkgdW5kZXJzdG9vZCB0aGF0IHRoaXMgd2FzLCBpbiBmYWN0LCB0aGUgZGVjaXNpb24gSSBoYWQgYmVlbiBwcmVwYXJpbmcgdG8gbWFrZSBmb3Igc2V2ZXJhbCB5ZWFycy4KClNvIHRoYXQgaXMgd2hlcmUgdGhpcyBiZWdhbi4gQW4gZWxldmVuLXllYXItb2xkIGluIGFuIG9hayB0cmVlLiBJIHdhbnRlZCB5b3UgdG8ga25vdy4KClNoZSBoYXMgc2lnbmVkIGl0IHdpdGggaGVyIGZpcnN0IG5hbWUgb25seS4=',
            'terminal' => true,
            'choices' => [
                ['text' => 'TG9vayBhdCB3aGF0IGlzIGNhcnZlZCBpbiB0aGUgc3RvbmUgYXQgdGhlIGJhc2U=', 'next' => '9_stone'],
            ],
        ],
        '9_stone' => [
            'prose'   => 'VGhlIGZsYXQgc3RvbmUgaXMgdG8gdGhlIG5vcnRoIG9mIHRoZSBvYWssIGhhbGYtYnVyaWVkIGluIG1vc3Mg4oCUIHRoZSBpbnNjcmlwdGlvbiBjdXQgZGVlcCBlbm91Z2ggdGhhdCBpdCBoYXMgc3Vydml2ZWQgd2hhdCB0aGUgbW9zcyBoYXMgZG9uZSB0byB0aGUgc3VyZmFjZS4gSXQgaXMgb2xkZXIgdGhhbiB0aGUgbWFya2V0IHRvd24gbGludGVsLiBUaGUgY3V0cyBhcmUgd2lkZXIsIHRoZSBsZXR0ZXItZm9ybXMgZGlmZmVyZW50LCB0aGUgaGFuZCBvZiBzb21lb25lIHdobyBjYXJ2ZWQgZm9yIHBlcm1hbmVuY2UgcmF0aGVyIHRoYW4gY29tbXVuaWNhdGlvbi4KCllvdSBkcmF3IGl0IGludG8gdGhlIG1hcmdpbiBvZiB0aGUgbWFwIGJlc2lkZSB0aGUgZmlyc3Qgb25lLiBUaGV5IGRvIG5vdCBsb29rIHJlbGF0ZWQuIFNvbWV0aGluZyBpbiB5b3Ugc2F5cyB0aGUgcmVsYXRpb25zaGlwIHdpbGwgYmVjb21lIGNsZWFyIHdoZW4gdGhlcmUgYXJlIG1vcmUuCgpGcmVkIGV4YW1pbmVzIHRoZSBzdG9uZSBmcm9tIHlvdXIgc2hvdWxkZXIuICdEaWZmZXJlbnQgZ2VvbG9naWNhbCBwZXJpb2QgZW50aXJlbHksJyBoZSBzYXlzLiAnVGhhdCBpcyBnZW51aW5lbHkgaW50ZXJlc3RpbmcuJw==',
            'choices' => [
                ['text' => 'R28gYmFjayB0byB0aGUgY290dGFnZQ==', 'next' => '10_tea'],
            ],
        ],
        '10_tea' => [
            'prose'   => 'TWlyYSdzIGNvdHRhZ2UgaXMgYXQgdGhlIGZvcmVzdCBlZGdlLCB0aGUgd2FsbHMgaGFsZi1jb3ZlcmVkIHdpdGggZmlyZXdvb2Qgc3RhY2tlZCBmb3Igd2ludGVyLiBJbnNpZGU6IGxvdyBiZWFtcywgYSBmaXJlLCBhIHRhYmxlIHdpdGggdGhlIHRoaW5ncyBvbiBpdCB0aGF0IGhhdmUgYmVlbiBvbiB0aGF0IHRhYmxlIGZvciB5ZWFycy4gU2hlIHB1dHMgYSBwb3Qgb24gYW5kIHByb2R1Y2VzIHR3byBjdXBzIHdpdGhvdXQgYXNraW5nLgoKVGhlIGJlcnJ5IHRlYSBpcyBkYXJrIGFuZCBzbGlnaHRseSB0YXJ0IGFuZCBleGFjdGx5IHJpZ2h0IGZvciBhIGZpcmUgdGhhdCBoYXMgYmVlbiBidXJuaW5nIHNpbmNlIGVhcmx5IG1vcm5pbmcuIEZyZWQgYWNjZXB0cyBhIGN1cCBhbmQgZG9lcyBub3QgcmVtYXJrIG9uIHRoZSBhYnNlbmNlIG9mIGdpbmdlciwgd2hpY2ggaXMgZ2VuZXJvdXMgb2YgaGltLgoKSmFtZXMgaXMgb24gdGhlIHdpbmRvd3NpbGwuIEhlIGhhcyBiZWVuIHRoZXJlIHRoZSBlbnRpcmUgdGltZSwgd2F0Y2hpbmcu',
            'choices' => [
                ['text' => 'TG9vayBhdCBKYW1lcw==', 'next' => '11_james'],
            ],
        ],
        '11_james' => [
            'prose'   => 'WW91IGxvb2sgYXQgSmFtZXMuIEphbWVzIGxvb2tzIGJhY2suCgpIZSBpcyBzbWFsbCDigJQgdGhlIHNpemUgb2YgYSBjbG9zZWQgZmlzdCDigJQgc2xvdy1leWVkLCBoaXMgc21hbGwgaGFuZHMgZm9sZGVkIG9uIHRoZSBzaWxsLiBIZSBjb25zaWRlcnMgeW91IHdpdGggdGhlIHVuaHVycmllZCBhdHRlbnRpb24gb2Ygc29tZW9uZSB3aG8gaGFzIGFscmVhZHkgbWFkZSB0aGVpciBkZWNpc2lvbiBhbmQgaXMgd2FpdGluZyB0byBzZWUgaWYgeW91J3ZlIG1hZGUgeW91cnMuCgpUaGVuIGhlIGNyb3NzZXMgdGhlIHNpbGwsIGRlc2NlbmRzIHRoZSB3YWxsLCBjbGltYnMgeW91ciBhcm0gdG8geW91ciBzaG91bGRlciwgYW5kIHRha2VzIGhvbGQgb2YgeW91ciBjb2xsYXIuIEhlIGhvbGRzIG9uLgoKTWlyYSBzYXlzOiAnSSB0aGluayBoZSdzIGRlY2lkZWQuJwoKRnJlZCBzYXlzOiAnT2ggZ29vZC4gQ29tcGFueS4nIEhlIHJlZ2FyZHMgSmFtZXMuIEphbWVzIHJlZ2FyZHMgRnJlZC4KCk1pcmEgc2V0cyBhIHNlYWxlZCB2aWFsIG9uIHRoZSB0YWJsZS4gJ09hayByZXNpbi4gT2xkIGZvcmVzdCB0cmljay4gRm9yIHNlYWxpbmcgdGhpbmdzIOKAlCB3YXRlcnByb29mLiBEb24ndCBsb3NlIGl0LicgRnJlZCBzYXlzOiAnQWxzbyBhIHByZXNlcnZhdGl2ZS4gRm9yIHNwZWNpbWVucy4nIE1pcmEgc2F5czogJ1llcy4n',
            'choices' => [
                ['text' => 'QXNrIE1pcmEgaG93IHRvIGNhcmUgZm9yIEphbWVz', 'next' => '12_end_road'],
                ['text' => 'TGV0IEZyZWQgaW50cm9kdWNlIGhpbXNlbGYgcHJvcGVybHk=', 'next' => '12_end_james'],
            ],
        ],
        '12_end_road' => [
            'prose'   => 'TWlyYSBhbnN3ZXJzIHlvdXIgcXVlc3Rpb25zIGFib3V0IEphbWVzIHdpdGggdGhlIHBhdGllbmNlIG9mIHNvbWVvbmUgd2hvIGhhcyBzcGVudCBzZXZlcmFsIG1vbnRocyBkb2luZyB0aGUgc2FtZSDigJQgd2hhdCBoZSBlYXRzLCB3aGF0IGZyaWdodGVucyBoaW0gKHZlcnkgbGl0dGxlOiBtb3N0bHkgc3VkZGVuIGxvdWQgbm9pc2VzLCBhbmQgdGhlIHNtZWxsIG9mIHBldHJvbCksIGhvdyBoZSBzaWduYWxzIGh1bmdlciAoYSBzcGVjaWZpYyBncmlwLCBzbGlnaHRseSB0aWdodGVyIHRoYW4gdGhlIGhvbGRpbmcgZ3JpcCkuIFNoZSB0cnVzdHMgeW91IHRvIHJlbWVtYmVyLCB3aGljaCB0dXJucyBvdXQgdG8gYmUgdHJ1ZS4KCkluIHRoZSBtb3JuaW5nLCB0aGUgZm9yZXN0IGdpdmVzIHdheSB0byB0aGUgcm9hZC4gSmFtZXMgaXMgb24geW91ciBsZWZ0IHNob3VsZGVyLiBGcmVkIGlzIG9uIHlvdXIgcmlnaHQuIFRoZSByZXNpbiB2aWFsIGlzIGluIHlvdXIgcGFjayBiZXNpZGUgdGhlIHJ1bmUgY29waWVzLCB0aGUgdHdvIHNxdWFyZXMsIGFuZCB0aGUgcGFydGlhbCBtYXAgd2l0aCBpdHMgbmV4dCBtYXJrIHRocmVlIGRheXMgZWFzdC4KCkZyZWQgbmF2aWdhdGVzLiBKYW1lcyB3YXRjaGVzIGV2ZXJ5dGhpbmcuIFRoZSBvYWsgc3RheXMgd2hlcmUgaXQgaGFzIGFsd2F5cyBiZWVuLiBGcm9tIHNvbWV3aGVyZSBpbnNpZGUgaXQsIHlvdSB0aGluaywgYW4gZWxldmVuLXllYXItb2xkIGlzIHdhdGNoaW5nIHlvdSBsZWF2ZSBhbmQgZmluZGluZyB0aGlzIGVudGlyZWx5IHNhdGlzZmFjdG9yeS4=',
            'ending'  => true,
        ],
        '12_end_james' => [
            'prose'   => 'RnJlZCBpbnRyb2R1Y2VzIGhpbXNlbGYgd2l0aCB0aGUgc3BlY2lmaWNpdHkgb2Ygc29tZW9uZSB3aG8gaGFzIGRlY2lkZWQgdGhhdCBwcm9wZXIgaW50cm9kdWN0aW9ucyBtYXR0ZXI6IG5hbWUsIGZpZWxkIG9mIHN0dWR5LCBjdXJyZW50IHJlc2VhcmNoIGZvY3VzLCBpbnN0aXR1dGlvbmFsIGFmZmlsaWF0aW9uLiBJdCB0YWtlcyBhcHByb3hpbWF0ZWx5IGZvcnR5LWZpdmUgc2Vjb25kcy4gSmFtZXMgbGlzdGVucyB3aXRoIHRoZSBjb21wbGV0ZSBhdHRlbnRpb24gb2YgYW4gYW5pbWFsIHRoYXQgaGFzIGxlYXJuZWQgdGhhdCBsb25nIHNlbnRlbmNlcyBvY2Nhc2lvbmFsbHkgaW52b2x2ZSBmb29kLgoKQXQgdGhlIGVuZCwgRnJlZCBzYXlzOiAnUmVzZWRhIGx1dGVvbGEgaXMgaW4gdGhhdCBwb3VjaC4gSSB3YW50ZWQgeW91IHRvIGtub3cgaW1tZWRpYXRlbHkuJwoKSmFtZXMgcmVhY2hlcyBvdmVyIGFuZCB0YWtlcyBhIHNtYWxsIGhvbGQgb2YgRnJlZCdzIHdpbmcgZmVhdGhlciwgdGhlbiByZWxlYXNlcyBpdC4KCidXZWxsLCcgRnJlZCBzYXlzLiBIZSBzb3VuZHMsIHZlcnkgc2xpZ2h0bHksIHVuZG9uZS4KCk91dHNpZGUsIHRoZSBmb3Jlc3QgY29udGludWVzIGRvaW5nIHdoYXQgaXQgaGFzIGJlZW4gZG9pbmcgc2luY2UgYmVmb3JlIGVpdGhlciBvZiB0aGVtIGV4aXN0ZWQuIFlvdSBkcmluayB0aGUgcmVzdCBvZiB5b3VyIHRlYS4gVGhlIHJlc2luIHZpYWwgY2F0Y2hlcyB0aGUgZmlyZWxpZ2h0LiBJbiB0aGUgbW9ybmluZywgdGhlIG1hcCBzYXlzIGVhc3Qu',
            'ending'  => true,
        ],
    ],
];
