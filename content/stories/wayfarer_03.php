<?php
return [
    'id'    => 3,
    'title' => 'The Sound of the Hammer',
    'color' => '#6A8A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFB5cmVuZWVzIHJpc2UgZ3JlZW4gYW5kIHN0ZWVwIGJldHdlZW4gRnJhbmNlIGFuZCBTcGFpbiwgYSBib3JkZXIgdGhhdCBzZWVtcyB0byBtYXR0ZXIgY29uc2lkZXJhYmx5IGxlc3MgdXAgaGVyZSB0aGFuIHRoZSB3ZWF0aGVyIGRvZXMuIEdyZXRhIGJyaW5ncyB0aGUgQ29udG91ciBkb3duIG5lYXIgYSBzbWFsbCBzdG9uZSB0b3duIGhhbGYgaW4gb25lIGNvdW50cnkgYW5kIGhhbGYgaW4gdGhlIG90aGVyLCBkZXBlbmRpbmcsIGFwcGFyZW50bHksIG9uIHdoaWNoIGJha2VyIHlvdSBhc2suCgpUd28gd2F5cyB0b3dhcmQgdGhlIGluc3RydW1lbnQtbWFrZXIncyB3b3Jrc2hvcCBwcmVzZW50IHRoZW1zZWx2ZXM6IHRoZSBoaWdoIHBhc3MsIGRpcmVjdCBidXQgY29sZCBhbmQgZXhwb3NlZCBldmVuIHRoaXMgbGF0ZSBpbiB0aGUgc2Vhc29uLCBvciB0aGUgcml2ZXIgdmFsbGV5LCBsb25nZXIsIGdlbnRsZXIsIGZvbGxvd2luZyB0aGUgd2F0ZXIgbW9zdCBvZiB0aGUgd2F5Lg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgaGlnaCBwYXNz', 'next' => '2_pass'],
                ['text' => 'Rm9sbG93IHRoZSByaXZlciB2YWxsZXk=', 'next' => '2_river'],
            ],
        ],
        '2_pass' => [
            'prose'  => 'VGhlIGhpZ2ggcGFzcyBpcyBjb2xkIGVub3VnaCB0byBiaXRlIHRocm91Z2ggZXZlbiBHcmV0YSdzIHByYWN0aWNhbCBsYXllcnMsIHdpbmQgd29ya2luZyBhdCB5b3UgdGhlIHdob2xlIGV4cG9zZWQgdHJhdmVyc2UsIHRoZSB2aWV3IG9wZW5pbmcgb3V0IGF0IHRoZSB0b3AgaW50byBhIGdlbnVpbmUsIGJyZWF0aHRha2luZyBzcHJhd2wgb2YgZ3JlZW4gcmlkZ2VzIGZhbGxpbmcgYXdheSBpbiBldmVyeSBkaXJlY3Rpb24uCgpZb3UgY29tZSBkb3duIHRoZSBmYXIgc2lkZSB3aW5kLXNjb3VyZWQgYW5kIGEgbGl0dGxlIGdpZGR5LCBpbiB0aGUgc3BlY2lmaWMgd2F5IGhpZ2gsIGNvbGQsIGJlYXV0aWZ1bCBwbGFjZXMgdGVuZCB0byBsZWF2ZSB5b3Uu',
            'choices' => [
                ['text' => 'RmluZCB0aGUgd29ya3Nob3A=', 'next' => '3_shared'],
            ],
        ],
        '2_river' => [
            'prose'  => 'VGhlIHJpdmVyIHZhbGxleSByb3V0ZSBpcyBnZW50bGVyLCBlYXNpZXIgb24gdGhlIGxlZ3MsIGZvbGxvd2luZyB3YXRlciB0aGF0IGdldHMgbG91ZGVyIGFuZCBjbGVhcmVyIHRoZSBoaWdoZXIgeW91IGNsaW1iIGFsb25nc2lkZSBpdC4gVHJvdXQgZGFydCBmcm9tIHRoZSBzaGFsbG93cyBhcyB5b3UgcGFzcywgYW5kIGEgZmlzaGVybWFuIHdvcmtpbmcgdGhlIGJhbmsgY2FsbHMgb3V0LCB1bnByb21wdGVkLCB0aGF0IHRoZSBlbmdyYXZlcidzIHdvcmtzaG9wIGlzIGVhc3kgdG8gZmluZCDigJQgJ2ZvbGxvdyB0aGUgc291bmQgb2YgdGhlIGhhbW1lciwgaXQgbmV2ZXIgcmVhbGx5IHN0b3BzLicKCkhlJ3MgcmlnaHQuIFlvdSBoZWFyIGl0IGhhbGYgYSBtaWxlIGJlZm9yZSB5b3Ugc2VlIHRoZSBidWlsZGluZy4=',
            'choices' => [
                ['text' => 'RmluZCB0aGUgd29ya3Nob3A=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHdvcmtzaG9wIGJlbG9uZ3MgdG8gRXRpZW5uZSwgYSB3aXJ5LCBwcmVjaXNlIG1hbiB3ZWxsIGludG8gaGlzIHNpeHRpZXMgd2hvIGRvZXNuJ3QgbG9vayB1cCBmcm9tIGhpcyBjdXJyZW50IHBpZWNlIHdoZW4geW91IGVudGVyLCB0aG91Z2ggaGUgZG9lcyBzYXksIHdpdGhvdXQgcHJlYW1ibGUsICdZb3UnbGwgYmUgQXVndXN0aW4ncywgdGhlbi4gWW91J3ZlIGdvdCBoaXMgcGF0aWVuY2UgaW4geW91ciBrbm9jayDigJQgdGhyZWUsIGV2ZW5seSBzcGFjZWQsIHRoZSB3YXkgaGUgYWx3YXlzIGRpZCBpdC4nCgpIZSBzZXRzIGRvd24gaGlzIHRvb2xzIGF0IGxhc3QuICdUaGUgdmVybmllciBzY2FsZSB3YW50cyByZS1lbmdyYXZpbmcgYmVmb3JlIGl0J3MgZml0IGZvciBhbnl0aGluZy4gRmluZSB3b3JrLiBTbG93IHdvcmsuIFlvdSdsbCBlaXRoZXIgbGVhcm4gdG8gZG8gaXQgcHJvcGVybHkgeW91cnNlbGYsIG9yIHlvdSdsbCB0cmFkZSBtZSBzb21ldGhpbmcgd29ydGggbXkgZG9pbmcgaXQgZm9yIHlvdS4gWW91ciBjaG9pY2Ugd2hpY2guJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'Q2hvb3NlIHlvdXIgYXBwcm9hY2g=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SXQncyBhIHJlYWwgY2hvaWNlLCBub3QgYSBmb3JtYWxpdHkg4oCUIEV0aWVubmUncyBjbGVhcmx5IGluZGlmZmVyZW50IHRvIHdoaWNoIHlvdSBwaWNrLCBwcm92aWRlZCB5b3UgYWN0dWFsbHkgY29tbWl0IHRvIGl0LiBMZWFybmluZyB0aGUgZW5ncmF2aW5nIHlvdXJzZWxmIG1lYW5zIGhvdXJzIGF0IGhpcyBiZW5jaCwgcnVpbmluZyBzY3JhcCBicmFzcyB1bnRpbCB5b3VyIGhhbmQgc3RlYWRpZXMuIFRyYWRpbmcgZmFpcmx5IG1lYW5zIGZpbmRpbmcgc29tZXRoaW5nIG9mIGdlbnVpbmUsIGNvbXBhcmFibGUgdmFsdWUgdG8gb2ZmZXIsIG5vdCBqdXN0IG1vbmV5LCB3aGljaCBoZSdzIGFscmVhZHkgbWFkZSBjbGVhciBoZSBoYXMgbm8gcGFydGljdWxhciBpbnRlcmVzdCBpbi4=',
            'choices' => [
                ['text' => 'TGVhcm4gdG8gZW5ncmF2ZSBpdCB5b3Vyc2VsZg==', 'next' => '5_learn'],
                ['text' => 'T2ZmZXIgYSBmYWlyIHRyYWRlIGluc3RlYWQ=', 'next' => '5_trade'],
            ],
        ],
        '5_learn' => [
            'prose'  => 'RXRpZW5uZSBpcyBhIHBhdGllbnQgdGVhY2hlciBpbiB0aGUgc3BlY2lmaWMgd2F5IHRoYXQgZXhhY3RpbmcgcGVvcGxlIG9mdGVuIGFyZSDigJQgdXR0ZXJseSB1bmJvdGhlcmVkIGJ5IHlvdXIgZWFybHkgZmFpbHVyZXMsIGVudGlyZWx5IHVud2lsbGluZyB0byBsZXQgYSBzaW5nbGUgc2xvcHB5IGxpbmUgcGFzcyB3aXRob3V0IGNvbW1lbnQuIFlvdSBydWluIGZvdXIgc2NyYXBzIG9mIGJyYXNzIGJlZm9yZSB5b3VyIGhhbmQgZmluZHMgYW55dGhpbmcgbGlrZSBzdGVhZGluZXNzLgoKQnkgdGhlIGZpZnRoIGF0dGVtcHQsIHRoZSBsaW5lIGhvbGRzIHRydWUsIGFuZCBFdGllbm5lLCBleGFtaW5pbmcgaXQgdW5kZXIgaGlzIGxvdXBlLCBnaXZlcyB0aGUgc21hbGxlc3QgcG9zc2libGUgbm9kIOKAlCB0aGUgZW5ncmF2ZXIncyB2ZXJzaW9uLCB5b3UncmUgYmVnaW5uaW5nIHRvIHVuZGVyc3RhbmQsIG9mIGdlbnVpbmUgcHJhaXNlLg==',
            'choices' => [
                ['text' => 'U2VlIHRoZSB2ZXJuaWVyIGZpbmlzaGVk', 'next' => '6_shared'],
            ],
        ],
        '5_trade' => [
            'prose'  => 'WW91IG9mZmVyLCBldmVudHVhbGx5LCB0aGUgb25lIHRoaW5nIHlvdSBhY3R1YWxseSBoYXZlIHRoYXQncyB3b3J0aCBhbnl0aGluZyB0byBhIG1hbiBsaWtlIHRoaXM6IHRoZSBzdG9yeSBpdHNlbGYsIHRvbGQgcHJvcGVybHkgYW5kIGNvbXBsZXRlbHksIG9mIHRoZSB1bmZpbmlzaGVkIGNoYXJ0IGFuZCB0aGUgbGV0dGVyIGFuZCB0aGUgd2hvbGUgc3RyYW5nZSB0YXNrIHlvdSd2ZSB0YWtlbiBvbi4gRXRpZW5uZSBsaXN0ZW5zIHRoZSBlbnRpcmUgd2F5IHRocm91Z2ggd2l0aG91dCBvbmNlIHBpY2tpbmcgdXAgYSB0b29sLgoKJ1RoYXQncyB3b3J0aCBtb3JlIHRoYW4gYnJhc3MsJyBoZSBzYXlzIHdoZW4geW91IGZpbmlzaCwgYWxyZWFkeSByZWFjaGluZyBmb3IgdGhlIHZlcm5pZXIgc2NhbGUuICdCcmluZyBtZSBhIHN0b3J5IGxpa2UgdGhhdCwgcHJvcGVybHkgdG9sZCwgYW5kIEknbGwgcmUtZW5ncmF2ZSBhbnl0aGluZyB5b3UgbGlrZS4n',
            'choices' => [
                ['text' => 'U2VlIHRoZSB2ZXJuaWVyIGZpbmlzaGVk', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgZWFybmVkIGl0LCB0aGUgZmluaXNoZWQgdmVybmllciBzY2FsZSBpcyBnZW51aW5lbHkgYmVhdXRpZnVsIHVuZGVyIEV0aWVubmUncyBoYW5kcyDigJQgdGhlIG5ldyBlbmdyYXZpbmcgY3Jpc3AsIGV4YWN0LCBsZWdpYmxlIGluIGEgd2F5IHRoZSBvbGQgd29ybiBvbmUgY2xlYXJseSBoYWRuJ3QgYmVlbiBmb3IgeWVhcnMuIEhlIHdyYXBzIGl0IHdpdGggcmVhbCBjYXJlIGJlZm9yZSBoYW5kaW5nIGl0IG92ZXIuCgonVGVsbCBoaW0g4oCUICcgRXRpZW5uZSBzdG9wcyBoaW1zZWxmLCBjb3JyZWN0aW5nIGNvdXJzZS4gJ1RlbGwgd2hvZXZlciBuZWVkcyB0ZWxsaW5nLCB0aGF0IEV0aWVubmUgZmluaXNoZWQgd2hhdCBoZSBzdGFydGVkLiBIZSdsbCBrbm93IHdoYXQgdGhhdCBtZWFucywgaWYgaGUncyBsaXN0ZW5pbmcgYXQgYWxsLCB3aGVyZXZlciBoZSdzIGdvdCB0byBub3cuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciByb3V0ZSB5b3UgZGlkbid0IHRha2Ugb24gdGhlIHdheSB1cCwgdGhlIFB5cmVuZWVzIHNldHRsaW5nIGludG8gZXZlbmluZyBhcm91bmQgeW91LCBncmVlbiByaWRnZXMgZ29pbmcgcHVycGxlLWdyZXkgaW4gdGhlIGZhZGluZyBsaWdodC4gVGhlIHZlcm5pZXIgc2NhbGUgcmlkZXMgc2VjdXJlIGluIHRoZSBjYXNlIG5vdywgYSBzZWNvbmQgY3V0b3V0IGZpbGxlZCwgdGhlIGluc3RydW1lbnQgc2xvd2x5LCBnZW51aW5lbHksIGJlY29taW5nIGl0c2VsZiBhZ2Fpbi4KCkdyZXRhIGNoZWNrcyB0aGUgZW5ncmF2aW5nIHdpdGggcmVhbCBhcHByZWNpYXRpb24uICdIZSdzIGdvb2QuIFdhcyBnb29kLCBldmVuIGJhY2sgd2hlbiBJIGtuZXcgb2YgaGltIG9ubHkgYnkgcmVwdXRhdGlvbi4nIFNoZSBkb2Vzbid0IGFzayBob3cgeW91IGVhcm5lZCBpdC4gWW91IGZpbmQsIHRoaXMgdGltZSwgeW91IGFjdHVhbGx5IHdhbnQgdG8gdGVsbCBoZXIgYW55d2F5Lg==',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgYWJvdXQgdGhlIHRyYWRlIHlvdSBtYWRl', 'next' => '8_end_tell'],
                ['text' => 'SnVzdCBsZXQgaGVyIGFkbWlyZSB0aGUgY3JhZnRzbWFuc2hpcA==', 'next' => '8_end_admire'],
            ],
        ],
        '8_end_tell' => [
            'prose'  => 'WW91IHRlbGwgaGVyIOKAlCB0aGUgc3RvcnktYXMtcGF5bWVudCwgdGhlIHdob2xlIHN0cmFuZ2UgZWNvbm9teSBvZiBpdCDigJQgYW5kIEdyZXRhIGFjdHVhbGx5IGxhdWdocywgc3VycHJpc2VkIGFuZCBnZW51aW5lbHkgZGVsaWdodGVkLiAnT2YgY291cnNlIHRoYXQncyB3aGF0IGhlIHdhbnRlZC4gTWFuJ3Mgc3BlbnQgZm9ydHkgeWVhcnMgbGlzdGVuaW5nIHRvIG90aGVyIHBlb3BsZSdzIG1vdW50YWlucy4gT3VycyB3YXMgcHJvYmFibHkgdGhlIGZpcnN0IGdlbnVpbmVseSBuZXcgb25lIGhlJ2QgaGVhcmQgaW4gYSBkZWNhZGUuJwoKSXQncyBhIHNtYWxsIHRoaW5nLCBiZWluZyB0aGUgc291cmNlIG9mIHNvbWVvbmUncyBkZWxpZ2h0IGluc3RlYWQgb2YganVzdCB0aGVpciBlcnJhbmQuIFlvdSBmaW5kIHlvdSBkb24ndCBtaW5kIGl0IGF0IGFsbC4=',
            'ending' => true,
        ],
        '8_end_admire' => [
            'prose'  => 'WW91IGxldCBoZXIgYWRtaXJlIHRoZSBjcmFmdHNtYW5zaGlwIGluc3RlYWQsIHRoZSB0d28gb2YgeW91IHR1cm5pbmcgdGhlIHZlcm5pZXIgc2NhbGUgb3ZlciB0b2dldGhlciBpbiB0aGUgZGF5J3MgbGFzdCBsaWdodCwgdHJhY2luZyB0aGUgbmV3LWN1dCBsaW5lcyB3aXRoIHNvbWV0aGluZyBjbG9zZSB0byByZXZlcmVuY2UuIFNvbWUgdGhpbmdzLCB5b3UncmUgZmluZGluZywgZG9uJ3QgbmVlZCBleHBsYWluaW5nIHRvIGJlIHByb3Blcmx5IGFwcHJlY2lhdGVkLgoKVGhlIENvbnRvdXIgbGlmdHMgb2ZmIGFzIGZ1bGwgZGFyayBzZXR0bGVzIG92ZXIgdGhlIFB5cmVuZWVzLCBhbmQgdGhlIG5ld2x5IGZpbGxlZCBjYXNlIGNhdGNoZXMgdGhlIGNhYmluIGxpZ2h0IGF0IGp1c3QgdGhlIHJpZ2h0IGFuZ2xlIHRvIHRocm93IGEgc21hbGwsIHByZWNpc2UgZ2xlYW0gYWNyb3NzIHRoZSBjb2NrcGl0IOKAlCBDb3JiaWUgbm90aWNpbmcgaXQgaW1tZWRpYXRlbHksIG9mIGNvdXJzZSwgYW5kIGJlaW5nIGltbWVkaWF0ZWx5LCBmaXJtbHksIGRlbmllZC4=',
            'ending' => true,
        ],
    ],
];
