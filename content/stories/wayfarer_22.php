<?php
return [
    'id'    => 22,
    'title' => 'Near the End of Each Letter',
    'color' => '#4A4A7A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFNpZXJyYSBOZXZhZGEgcmlzZXMgaW4gY2xlYW4gZ3Jhbml0ZSBwZWFrcyB0b3dhcmQgYSBzbWFsbCBtb3VudGFpbi10b3Agb2JzZXJ2YXRvcnksIGl0cyBkb21lIGNhdGNoaW5nIHRoZSBsYXN0IG9mIHRoZSBkYXkncyBsaWdodCBsaWtlIGEgc2Vjb25kLCBzbWFsbGVyIG1vb24gc2V0dGxpbmcgb250byB0aGUgcmlkZ2UuIEdyZXRhIHN0dWRpZXMgdGhlIGFjY2VzcyByb2FkIHdpdGggcmVhbCBpbnRlcmVzdCDigJQgdGhpcyBpcyB0aGUgZmlyc3QgZ2VudWluZWx5IG1vZGVybiByZXNlYXJjaCBmYWNpbGl0eSB0aGUgd2hvbGUgdHJpcCdzIGJyb3VnaHQgeW91IHRvLgoKVHdvIG1vdW50YWluIHJvYWRzIHRvd2FyZCB0aGUgb2JzZXJ2YXRvcnkgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgc3dpdGNoYmFja2VkIG1haW4gYWNjZXNzIHJvYWQsIGxvbmdlciBidXQgcHJvcGVybHkgbWFpbnRhaW5lZCwgb3IgYSBzaG9ydGVyLCBzdGVlcGVyIGZpcmUgcm9hZCB0aGF0IGN1dHMgbW9yZSBkaXJlY3RseSB1cCB0aGUgcmlkZ2Uu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbiBhY2Nlc3Mgcm9hZA==', 'next' => '2_main'],
                ['text' => 'VGFrZSB0aGUgZmlyZSByb2Fk', 'next' => '2_fire'],
            ],
        ],
        '2_main' => [
            'prose'  => 'VGhlIG1haW4gcm9hZCBjbGltYnMgaW4gbG9uZywgY29tZm9ydGFibGUgc3dpdGNoYmFja3MsIGdyYW5pdGUgd2FsbHMgY2F0Y2hpbmcgZ29sZCBsaWdodCBvbiBvbmUgc2lkZSBhbmQgZ2VudWluZWx5IGVub3Jtb3VzIHZpZXdzIG9wZW5pbmcgb24gdGhlIG90aGVyIHdpdGggZXZlcnkgdHVybi4gSXQncyBhbiBlYXN5LCBzY2VuaWMgZHJpdmUsIHRoZSBvYnNlcnZhdG9yeSdzIGRvbWUgZ3Jvd2luZyBzdGVhZGlseSBsYXJnZXIgYWdhaW5zdCB0aGUgZGFya2VuaW5nIHNreS4KCllvdSBhcnJpdmUgcmVsYXhlZCwgcHJvcGVybHkgYXBwcmVjaWF0aXZlIG9mIHRoZSB2aWV3LCBhbmQgb25seSBzbGlnaHRseSBsYXRlLg==',
            'choices' => [
                ['text' => 'RmluZCB0aGUgdGVjaG5pY2lhbg==', 'next' => '3_shared'],
            ],
        ],
        '2_fire' => [
            'prose'  => 'VGhlIGZpcmUgcm9hZCBpcyBzdGVlcCwgcm91Z2gsIGNvbnNpZGVyYWJseSBmYXN0ZXIgYnV0IGNvbnNpZGVyYWJseSBsZXNzIGNvbWZvcnRhYmxlLCB0aGUgQ29udG91cidzIHN1c3BlbnNpb24gd29ya2luZyBoYXJkIGFnYWluc3QgdGVycmFpbiBuZXZlciBtZWFudCBmb3IgYW55dGhpbmcgYnV0IGVtZXJnZW5jeSB2ZWhpY2xlcy4gWW91IGFycml2ZSBkdXN0eSBhbmQgam9sdGVkLCBidXQgd2VsbCBhaGVhZCBvZiB3aGVyZSB0aGUgc2NlbmljIHJvdXRlIHdvdWxkIGhhdmUgcHV0IHlvdS4KClRoZSBvYnNlcnZhdG9yeSdzIG5pZ2h0IGNyZXcsIHNldHRpbmcgdXAgZm9yIHRoZSBldmVuaW5nJ3Mgb2JzZXJ2YXRpb25zLCBsb29rcyBmYWludGx5IGFtdXNlZCBhdCB5b3VyIGRyYW1hdGljIGVudHJhbmNlLg==',
            'choices' => [
                ['text' => 'RmluZCB0aGUgdGVjaG5pY2lhbg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHNlbmlvciB0ZWNobmljaWFuLCBEci4gQ2hlbiwgZXhhbWluZXMgdGhlIGluc3RydW1lbnQgY2FzZSB3aXRoIGdlbnVpbmUsIGRlbGlnaHRlZCByZWNvZ25pdGlvbiBvbmNlIHlvdSBleHBsYWluIHlvdXIgZXJyYW5kLiAnSSBrbm93IHRoaXMgZGVzaWduLCcgc2hlIHNheXMuICdXZSBoYXZlIGRlY2FkZXMgb2YgY29ycmVzcG9uZGVuY2UgaW4gdGhlIGFyY2hpdmUg4oCUIHlvdXIgZ3JhbmRmYXRoZXIgY29uc3VsdGVkIHdpdGggdGhpcyBvYnNlcnZhdG9yeSBvbiBjYWxpYnJhdGlvbiBzdGFuZGFyZHMsIGJhY2sgd2hlbiBoZSB3YXMgc3RpbGwgc3VydmV5aW5nIHNlcmlvdXNseS4gVGhlcmUncyBhIHNwZWNpZmljIGNhbGlicmF0aW9uIHdlaWdodCByZWZlcmVuY2VkIHRocm91Z2hvdXQsIGN1c3RvbS1tYWRlIHRvIG91ciBvd24gc3RhbmRhcmQuIFN0aWxsIGhlcmUsIGluIGZhY3QsIHN0aWxsIGluIHRoZSBhcmNoaXZlIGRyYXdlciB3aGVyZSBpdCdzIGFsd2F5cyBiZWVuLicKClNoZSBzdHVkaWVzIHlvdS4gJ0l0J3Mgbm90IHNpbXBseSBtaW5lIHRvIGhhbmQgb3ZlciwgdGhvdWdoIOKAlCBhcmNoaXZlIHByb3RvY29sLCBtb3N0bHkgYnVyZWF1Y3JhdGljLCBidXQgcmVhbC4gWW91J2xsIG5lZWQgdG8gYWN0dWFsbHkgZWFybiBwcm9wZXIgYWNjZXNzLCBzYW1lIGFzIGFueSByZXNlYXJjaGVyIHdvdWxkLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RWFybmluZyBwcm9wZXIgYXJjaGl2ZSBhY2Nlc3MsIGl0IHR1cm5zIG91dCwgbWVhbnMgZWl0aGVyIGFzc2lzdGluZyB3aXRoIHRoZSBvYnNlcnZhdG9yeSdzIGFjdHVhbCBuaWdodC1za3kgb2JzZXJ2YXRpb25zIGZvciBhIHNoaWZ0LCBsZWFybmluZyB0aGUgZXF1aXBtZW50IGFuZCBjb250cmlidXRpbmcgc29tZXRoaW5nIHJlYWwgdG8gdGhlIGN1cnJlbnQgcmVzZWFyY2gsIG9yIHNwZW5kaW5nIGFuIGFmdGVybm9vbiBwcm9wZXJseSBjYXRhbG9ndWluZyBhIGJhY2tsb2cgb2Ygb2xkIGNvcnJlc3BvbmRlbmNlIHRoYXQncyBuZXZlciBiZWVuIGZ1bGx5IG9yZ2FuaXNlZC4KCidFaXRoZXIncyBnZW51aW5lLCB1c2VmdWwgd29yaywnIERyLiBDaGVuIHNheXMuICdQaWNrIHdoaWNoZXZlciBhY3R1YWxseSBpbnRlcmVzdHMgeW91IG1vcmUuJw==',
            'choices' => [
                ['text' => 'QXNzaXN0IHdpdGggdGhlIG5pZ2h0IG9ic2VydmF0aW9ucw==', 'next' => '5_observe'],
                ['text' => 'Q2F0YWxvZ3VlIHRoZSBvbGQgY29ycmVzcG9uZGVuY2U=', 'next' => '5_catalogue'],
            ],
        ],
        '5_observe' => [
            'prose'  => 'QXNzaXN0aW5nIHdpdGggYSByZWFsIG5pZ2h0IG9mIGFzdHJvbm9taWNhbCBvYnNlcnZhdGlvbiBpcyBnZW51aW5lbHkgdGhyaWxsaW5nIOKAlCBsZWFybmluZyB0aGUgZXF1aXBtZW50LCBsb2dnaW5nIHJlYWRpbmdzLCB3YXRjaGluZyB0aGUgdGVjaG5pY2lhbnMgd29yayB3aXRoIGEgcHJlY2lzaW9uIGFuZCBwYXRpZW5jZSB0aGF0IHJlbWluZHMgeW91LCBtb3JlIHRoYW4gb25jZSwgb2YgZXZlcnl0aGluZyB5b3UndmUgbGVhcm5lZCBhYm91dCBjYXJlZnVsIGF0dGVudGlvbiB0aGlzIHdob2xlIHRyaXAuIFRoZSBza3kgYWJvdmUgdGhlIFNpZXJyYSBOZXZhZGEsIHByb3Blcmx5IGRhcmsgYW5kIHByb3Blcmx5IGNsZWFyLCBpcyBnZW51aW5lbHkgaHVtYmxpbmcuCgpCeSB0aGUgZW5kIG9mIHRoZSBzaGlmdCwgRHIuIENoZW4gbG9va3Mgc2F0aXNmaWVkIHJhdGhlciB0aGFuIG1lcmVseSBvYmxpZ2F0ZWQuICdHb29kIGhhbmRzLiBZb3UnZCBoYXZlIG1hZGUgYSBmYWlyIHJlc2VhcmNoZXIsIGluIGFub3RoZXIgbGlmZS4n',
            'choices' => [
                ['text' => 'U2VlIHRoZSBhcmNoaXZl', 'next' => '6_shared'],
            ],
        ],
        '5_catalogue' => [
            'prose'  => 'Q2F0YWxvZ3VpbmcgZGVjYWRlcyBvZiBvbGQgY29ycmVzcG9uZGVuY2UgaXMgc2xvdywgY2FyZWZ1bCwgZ2VudWluZWx5IGFic29yYmluZyB3b3JrLCBhbmQgcGFydHdheSB0aHJvdWdoIHRoZSBhZnRlcm5vb24geW91IGZpbmQgc29tZXRoaW5nIHRoYXQgc3RvcHMgeW91IGNvbXBsZXRlbHkg4oCUIGEgbXVjaCBsYXRlciBsZXR0ZXIsIGZpbGVkIHNsaWdodGx5IG91dCBvZiBzZXF1ZW5jZSwgZnJvbSBhIG5hbWUgeW91IHJlY29nbmlzZSBpbnN0YW50bHk6IE1hcmd1ZXJpdGUsIHdyaXRpbmcgdG8gdGhlIG9ic2VydmF0b3J5IGhlcnNlbGYsIHllYXJzIGFmdGVyIEthcmFrb3JhbSwgaW5xdWlyaW5nIGFib3V0IGNhbGlicmF0aW9uIHN0YW5kYXJkcyBmb3IgaGVyIG93biBvbmdvaW5nIHN1cnZleSB3b3JrLgoKU2hlJ2QgZ29uZSBvbi4gU2hlJ2QgdGhyaXZlZCwgYnkgdGhlIGxvb2sgb2YgdGhlIGxldHRlcidzIGNvbmZpZGVudCwgcHJvZmVzc2lvbmFsIHRvbmUg4oCUIGFuZCBuZWFyIHRoZSB2ZXJ5IGVuZCwgYWxtb3N0IGluIHBhc3NpbmcsIHNoZSdkIGFza2VkLCBxdWlldGx5LCB3aGV0aGVyIGFueW9uZSBzdGlsbCBoZWFyZCBmcm9tIEF1Z3VzdGluIFZvc3Mu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBhcmNoaXZl', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RHIuIENoZW4sIG9uY2UgeW91ciB3b3JrJ3MgcHJvcGVybHkgZG9uZSwgYnJpbmdzIG91dCB0aGUgY2FsaWJyYXRpb24gd2VpZ2h0IOKAlCBzbWFsbCwgcHJlY2lzZWx5IG1hZGUsIGV4YWN0bHkgbWF0Y2hpbmcgdGhlIHNwZWNpZmljYXRpb25zIHJlZmVyZW5jZWQgdGhyb3VnaG91dCB0aGUgb2xkIGNvcnJlc3BvbmRlbmNlLiAnVGhlcmUsJyBzaGUgc2F5cy4gJ0Vhcm5lZCBwcm9wZXJseSwgYXJjaGl2ZSBwcm90b2NvbCBzYXRpc2ZpZWQuJwoKSWYgeW91IGZvdW5kIE1hcmd1ZXJpdGUncyBsZXR0ZXIsIERyLiBDaGVuIGNvbmZpcm1zIGl0LCBnZW50bHk6ICdTaGUgd3JvdGUgYSBmZXcgdGltZXMsIG92ZXIgdGhlIHllYXJzLiBBbHdheXMgYXNrZWQgYWZ0ZXIgaGltLCBuZWFyIHRoZSBlbmQgb2YgZWFjaCBsZXR0ZXIsIGFsbW9zdCBsaWtlIGEgaGFiaXQgc2hlIGNvdWxkbid0IHF1aXRlIGJyZWFrLiBXZSBuZXZlciBoYWQgYW4gYW5zd2VyIHRvIGdpdmUgaGVyLiBJIGRvbid0IGJlbGlldmUgaGUgZXZlciB3cm90ZSBiYWNrLCB3aGVyZXZlciBoZSBhY3R1YWxseSB3YXMgYnkgdGhlbi4n',
            'choices' => [
                ['text' => 'U2l0IHdpdGggdGhhdCBhIG1vbWVudA==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNhcnJ5IHRoZSB3ZWlnaHQgYmFjayB0byB0aGUgQ29udG91ciwgdGhlIHR3ZW50aWV0aCBwaWVjZSDigJQgdGhlIGNhc2Ugbm93IGdlbnVpbmVseSwgdmlzaWJseSBhbG1vc3Qgd2hvbGUg4oCUIGFuZCBzaXQgYSBsb25nIG1vbWVudCBvbiB0aGUgb2JzZXJ2YXRvcnkncyByaWRnZSwgdGhlIFNpZXJyYSBOZXZhZGEncyBncmFuaXRlIHBlYWtzIGNhdGNoaW5nIHRoZSBsYXN0IHRydWUgbGlnaHQgYmVmb3JlIGZ1bGwgZGFyayBwcm9wZXJseSBzZXR0bGVzLgoKVHdvIHBlb3BsZSB3aG8gY2xlYXJseSBuZXZlciBzdG9wcGVkIHdvbmRlcmluZyBhYm91dCBlYWNoIG90aGVyLCBhbmQgbmV2ZXIgcXVpdGUgY2xvc2VkIHRoZSBkaXN0YW5jZSByZWdhcmRsZXNzLiBJdCdzIG5vdCB0aGUgZW5kaW5nIHlvdSdkIGhhdmUgd3JpdHRlbiwgaWYgeW91J2QgYmVlbiB0aGUgb25lIGNob29zaW5nIGl0LiBCdXQgaXQncyB0aGUgaG9uZXN0IG9uZSwgYW5kIHRoZXJlJ3Mgc29tZXRoaW5nIGluIGl0cyB2ZXJ5IGluY29tcGxldGVuZXNzIHRoYXQgZmluYWxseSwgZnVsbHkgZXhwbGFpbnMgdGhlIHVuZmluaXNoZWQgY2hhcnQsIGJldHRlciB0aGFuIGFueSBzaW5nbGUgYW5zd2VyIGNvdWxkIGhhdmUu',
            'choices' => [
                ['text' => 'RGVjaWRlIHRvIGZpbmQgb3V0IHdoYXQgaGFwcGVuZWQgdG8gaGVyLCBwcm9wZXJseSwgYmVmb3JlIHRoaXMgaXMgb3Zlcg==', 'next' => '8_end_find'],
                ['text' => 'TGV0IGhlciBzdG9yeSByZXN0IGV4YWN0bHkgd2hlcmUgaXQgaXMsIHVucmVzb2x2ZWQ=', 'next' => '8_end_rest'],
            ],
        ],
        '8_end_find' => [
            'prose'  => 'WW91IGRlY2lkZSwgd2F0Y2hpbmcgdGhlIGxhc3QgbGlnaHQgZmFkZSBvZmYgdGhlIFNpZXJyYSBOZXZhZGEncyBwZWFrcywgdGhhdCB5b3UncmUgbm90IHdpbGxpbmcgdG8gbGV0IHRoaXMgcGFydGljdWxhciB0aHJlYWQgc3RheSBkYW5nbGluZyDigJQgdGhhdCBmaW5kaW5nIG91dCB3aGF0IGFjdHVhbGx5IGJlY2FtZSBvZiBNYXJndWVyaXRlLCBwcm9wZXJseSwgaGFzIHF1aWV0bHkgYmVjb21lIGFzIGltcG9ydGFudCB0byB5b3UgYXMgZmluaXNoaW5nIHRoZSBpbnN0cnVtZW50IGl0c2VsZi4KCkdyZXRhLCB0b2xkIHRoZSB3aG9sZSBzdG9yeSwgZG9lc24ndCB0cnkgdG8gdGFsayB5b3Ugb3V0IG9mIGl0LiAnT25lIG1vcmUgc3RvcCBhZnRlciB0aGlzLCB0aGVuIGhvbWUsJyBzaGUgc2F5cy4gJ01heWJlIHRoZSBhbnN3ZXIncyB3YWl0aW5nIHRoZXJlLiBNYXliZSBpdCBpc24ndC4gRWl0aGVyIHdheSwgeW91J2xsIGhhdmUgYWN0dWFsbHkgbG9va2VkIHByb3Blcmx5LCBhbmQgdGhhdCdzIHdvcnRoIHNvbWV0aGluZyByZWdhcmRsZXNzIG9mIHdoYXQgeW91IGZpbmQuJw==',
            'ending' => true,
        ],
        '8_end_rest' => [
            'prose'  => 'WW91IGxldCBoZXIgc3RvcnkgcmVzdCBleGFjdGx5IHdoZXJlIGl0IGlzLCB1bnJlc29sdmVkLCBkZWNpZGluZyB0aGF0IHNvbWUgdGhpbmdzIGFyZSBhbGxvd2VkIHRvIHN0YXkgb3BlbiDigJQgbm90IGV2ZXJ5IHRocmVhZCBuZWVkcyBwdWxsaW5nIGFsbCB0aGUgd2F5IHRocm91Z2ggdG8gYSB0aWR5IGVuZCwgYW5kIHRoZXJlJ3MgYSBraW5kIG9mIGhvbmVzdHkgaW4gc2ltcGx5IGxldHRpbmcgdHdvIHBlb3BsZSdzIG5lYXItbWlzcyBzdGF5IGEgbmVhci1taXNzLCByYXRoZXIgdGhhbiBmb3JjaW5nIGEgcmVzb2x1dGlvbiBuZWl0aGVyIG9mIHRoZW0gZXZlciBtYW5hZ2VkIHRvIHJlYWNoIHRoZW1zZWx2ZXMuCgpUaGUgQ29udG91ciBsaWZ0cyBvZmYgdGhlIG9ic2VydmF0b3J5J3MgcmlkZ2UgaW50byBhIHNreSBwcm9wZXJseSwgZ29yZ2VvdXNseSBkYXJrLCBhbmQgeW91IGZpbmQgeW91cnNlbGYsIGZvciBvbmNlLCBhdCBwZWFjZSB3aXRoIGFuIGVuZGluZyB5b3UnbGwgbmV2ZXIgYWN0dWFsbHkgZ2V0IHRvIHJlYWQu',
            'ending' => true,
        ],
    ],
];
