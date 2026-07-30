<?php
return [
    'id'    => 14,
    'title' => 'Fairness, Not Just Generosity',
    'color' => '#8A6A9A',

    'pages' => [
        '1_start' => [
            'prose'  => 'Q29uc3RhbnRpbm9wbGUgcmlzZXMgYWNyb3NzIGl0cyBmYW1vdXMgc2V2ZW4gaGlsbHMsIHRoZSBCb3NwaG9ydXMgZGl2aWRpbmcgY29udGluZW50cyByaWdodCB0aHJvdWdoIHRoZSBtaWRkbGUgb2YgdGhlIGNpdHksIG1pbmFyZXRzIGFuZCBhbmNpZW50IGRvbWVzIHNoYXJpbmcgYSBza3lsaW5lIHRoYXQncyBzZWVuIGVtcGlyZXMgcmlzZSBhbmQgZmFsbCBhcm91bmQgaXQuIFRvbWFzIHBvaW50cyBvdXQgdGhlIEdlbm9lc2UgdHJhZGluZyBjb2xvbnkncyBkaXN0cmljdCB3aXRoIHJlYWwsIHByYWN0aXNlZCByZWNvZ25pdGlvbi4KClR3byBoYXJib3VyLWRpc3RyaWN0IGFwcHJvYWNoZXMgcHJlc2VudCB0aGVtc2VsdmVzOiB0aHJvdWdoIHRoZSBtYWluIGN1c3RvbXMgaG91c2UsIG9mZmljaWFsIGFuZCBwcm9wZXJseSBkb2N1bWVudGVkLCBvciBhbG9uZyB0aGUgd29ya2luZyBkb2NrcywgZmFzdGVyIGJ1dCBjb25zaWRlcmFibHkgbGVzcyBmb3JtYWwu',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgY3VzdG9tcyBob3VzZQ==', 'next' => '2_customs'],
                ['text' => 'VGFrZSB0aGUgd29ya2luZyBkb2Nrcw==', 'next' => '2_docks'],
            ],
        ],
        '2_customs' => [
            'prose'  => 'VGhlIGN1c3RvbXMgaG91c2UgaXMgcHJvcGVybHkgYnVyZWF1Y3JhdGljLCBvZmZpY2lhbHMgY2hlY2tpbmcgZG9jdW1lbnRzIHdpdGggcmVhbCB0aG9yb3VnaG5lc3MsIHRoZSB3aG9sZSBwcm9jZXNzIHNsb3cgYnV0IGVudGlyZWx5IGFib3ZlLWJvYXJkLiBCeSB0aGUgdGltZSB5b3UncmUgdGhyb3VnaCwgeW91J3ZlIGdvdCBwcm9wZXIsIHN0YW1wZWQgcGVybWlzc2lvbiB0byBlbnRlciB0aGUgR2Vub2VzZSBxdWFydGVyLCB3aGljaCBUb21hcyBhc3N1cmVzIHlvdSB3aWxsIHNtb290aCB0aGluZ3MgY29uc2lkZXJhYmx5LgoKJ0JvcmluZywnIGhlIGFkbWl0cywgJ2J1dCBib3Jpbmcgd29ya3MsIGluIGEgY2l0eSB0aGlzIHBvbGl0aWNhbGx5IHRhbmdsZWQuJw==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIEdlbm9lc2UgcXVhcnRlcg==', 'next' => '3_shared'],
            ],
        ],
        '2_docks' => [
            'prose'  => 'VGhlIHdvcmtpbmcgZG9ja3MgYXJlIGZhc3RlciwgbG91ZGVyLCBnZW51aW5lbHkgY2hhb3RpYyB3aXRoIGNhcmdvIG1vdmluZyBpbiBldmVyeSBkaXJlY3Rpb24sIGFuZCBjb25zaWRlcmFibHkgbGVzcyBjb25jZXJuZWQgd2l0aCBwcm9wZXIgZG9jdW1lbnRhdGlvbi4gWW91IHNsaXAgdGhyb3VnaCB3aXRob3V0IG11Y2ggZm9ybWFsIG5vdGljZSwgYXJyaXZpbmcgYXQgdGhlIEdlbm9lc2UgcXVhcnRlciBxdWlja2x5IGJ1dCB3aXRob3V0IHRoZSBjdXN0b21zIGhvdXNlJ3Mgc21vb3RoaW5nIGVmZmVjdC4KCidGYXN0ZXIsJyBUb21hcyBzYXlzLCAnYnV0IHdlJ2xsIG5lZWQgdG8gYWN0dWFsbHkgY2hhcm0gb3VyIHdheSB0aHJvdWdoIHdoYXQncyBjb21pbmcsIHJhdGhlciB0aGFuIHNpbXBseSBwcmVzZW50aW5nIHBhcGVyd29yay4n',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIEdlbm9lc2UgcXVhcnRlcg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIEdlbm9lc2UgY29sb255J3MgcmVwcmVzZW50YXRpdmUsIFNpZ25vciBEb3JpYSwgcmVjZWl2ZXMgeW91IGNhcmVmdWxseSwgdmlzaWJseSB3ZWlnaGluZyBleGFjdGx5IGhvdyB5b3VyIGVycmFuZCBtaWdodCBjb21wbGljYXRlIGFuIGFscmVhZHkgZGVsaWNhdGUgcG9saXRpY2FsIHNpdHVhdGlvbi4gJ1RoZSB3ZWRnZSBpcyByZWFsLCBhbmQgaXQncyBoZXJlLCcgaGUgY29uZmlybXMuICdCdXQgaGFuZGluZyBvdmVyIGFueXRoaW5nIG9mIHZhbHVlIHJpZ2h0IG5vdywgd2l0aCBCeXphbnRpbmUgYXV0aG9yaXRpZXMgd2F0Y2hpbmcgb3VyIGV2ZXJ5IHRyYW5zYWN0aW9uIGZvciB0aGUgc2xpZ2h0ZXN0IGV4Y3VzZSB0byByZXN0cmljdCBvdXIgdHJhZGluZyBwcml2aWxlZ2VzIGZ1cnRoZXIsIGlzIG5vdCBhIHNpbXBsZSBtYXR0ZXIuJwoKSGUgc3R1ZGllcyB5b3UuICdZb3UnbGwgbmVlZCB0byBoZWxwIG1lIG5hdmlnYXRlIHRoaXMgcHJvcGVybHksIG9uZSB3YXkgb3IgYW5vdGhlciwgYmVmb3JlIEkgY2FuIGhvbmVzdGx5IGp1c3RpZnkgcmVsZWFzaW5nIGl0Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdyB5b3UgY2FuIGhlbHA=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RG9yaWEgb2ZmZXJzIHR3byBhcHByb2FjaGVzOiBhY2NvbXBhbnkgaGltIHRvIGEgcHJvcGVyLCBmb3JtYWwgYXVkaWVuY2Ugd2l0aCB0aGUgcmVsZXZhbnQgQnl6YW50aW5lIHRyYWRlIG9mZmljaWFsLCBsZW5kaW5nIHlvdXIgb3duIG5ldXRyYWwsIG91dHNpZGUgY3JlZGliaWxpdHkgdG8gYSBkZWxpY2F0ZSBuZWdvdGlhdGlvbiwgb3IgaGVscCBoaW0gcXVpZXRseSByZXNvbHZlIGEgc3BlY2lmaWMsIHNtYWxsZXIgZGlzcHV0ZSB3aXRoIGEgcml2YWwgVmVuZXRpYW4gbWVyY2hhbnQgZmlyc3QsIHNpbmNlIHRoYXQgZGlzcHV0ZSBpcyBjdXJyZW50bHkgdGhlIG1vcmUgdXJnZW50LCBkaXN0cmFjdGluZyBjb21wbGljYXRpb24uCgonRWl0aGVyIGhlbHBzLCcgaGUgc2F5cy4gJ0Zvcm1hbCBkaXBsb21hY3kgb3IgcXVpZXQgcHJhY3RpY2FsIGZpeGluZy4gWW91ciBjaG9pY2Ugd2hpY2gga2luZCBvZiBoZWxwIHlvdSdyZSBhY3R1YWxseSBzdWl0ZWQgdG8uJw==',
            'choices' => [
                ['text' => 'QXR0ZW5kIHRoZSBmb3JtYWwgYXVkaWVuY2U=', 'next' => '5_audience'],
                ['text' => 'SGVscCByZXNvbHZlIHRoZSBWZW5ldGlhbiBkaXNwdXRl', 'next' => '5_venetian'],
            ],
        ],
        '5_audience' => [
            'prose'  => 'VGhlIGZvcm1hbCBhdWRpZW5jZSBpcyBnZW51aW5lbHkgdGVuc2UsIGNhcmVmdWwgZGlwbG9tYXRpYyBsYW5ndWFnZSBkb2luZyBhIGdyZWF0IGRlYWwgb2Ygd29yayB0byBhdm9pZCBzYXlpbmcgYW55dGhpbmcgdG9vIGRpcmVjdGx5LCB5b3VyIG93biBuZXV0cmFsIHByZXNlbmNlIGFwcGFyZW50bHkgbGVuZGluZyBleGFjdGx5IHRoZSBraW5kIG9mIG91dHNpZGUgY3JlZGliaWxpdHkgRG9yaWEgaG9wZWQgZm9yLiBCeSB0aGUgZW5kLCBhIHNtYWxsIGJ1dCByZWFsIGNvbmNlc3Npb24ncyBiZWVuIHdvbiDigJQgbm90aGluZyBkcmFtYXRpYywgYnV0IGEgZ2VudWluZSBlYXNpbmcgb2YgdGhlIGltbWVkaWF0ZSBwcmVzc3VyZS4KCkRvcmlhIGxvb2tzIHZpc2libHkgcmVsaWV2ZWQgYWZ0ZXJ3YXJkLiAnVGhhdCBoZWxwZWQgbW9yZSB0aGFuIHlvdSBwcm9iYWJseSByZWFsaXNlLiBTb21ldGltZXMgYW4gdW5pbnZlc3RlZCB3aXRuZXNzIGNoYW5nZXMgdGhlIHdob2xlIHRvbmUgb2YgYSByb29tLic=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgc2F5cw==', 'next' => '6_shared'],
            ],
        ],
        '5_venetian' => [
            'prose'  => 'UmVzb2x2aW5nIHRoZSBWZW5ldGlhbiBkaXNwdXRlIG1lYW5zIGNhcmVmdWwsIHByYWN0aWNhbCBuZWdvdGlhdGlvbiDigJQgYSBkaXNwdXRlZCBzaGlwbWVudCwgYSBnZW51aW5lIG1pc3VuZGVyc3RhbmRpbmcgcmF0aGVyIHRoYW4gYWN0dWFsIGJhZCBmYWl0aCBvbiBlaXRoZXIgc2lkZSwgc29ydGVkIG91dCB0aHJvdWdoIHBhdGllbnQsIHVuZ2xhbW9yb3VzIG1lZGlhdGlvbiByYXRoZXIgdGhhbiBhbnkgZ3JhbmQgZ2VzdHVyZS4KCkJ5IHRoZSBlbmQsIGJvdGggc2lkZXMgYXJlIHNhdGlzZmllZCwgYW5kIERvcmlhJ3Mgb3duIHBvbGl0aWNhbCBzaXR1YXRpb24gaXMgbWVhc3VyYWJseSBsZXNzIGNvbXBsaWNhdGVkIHRoYW4gaXQgd2FzIGFuIGhvdXIgYWdvLg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgc2F5cw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RG9yaWEsIGdlbnVpbmVseSByZWxpZXZlZCBlaXRoZXIgd2F5LCBwcm9kdWNlcyB0aGUgd2VkZ2UgaGltc2VsZi4gJ1lvdSd2ZSBhY3R1YWxseSBoZWxwZWQsIHByb3Blcmx5LCBub3QganVzdCBhc2tlZCBmb3Igc29tZXRoaW5nLCcgaGUgc2F5cy4gJ1RoYXQncyByYXJlciB0aGFuIHlvdSdkIHRoaW5rLCBpbiBhIGNpdHkgdGhpcyBwb2xpdGljYWxseSB0YW5nbGVkLiBZc29sZGUgdW5kZXJzdG9vZCB0aGF0IHRvbywgYXBwYXJlbnRseSDigJQgc2hlIG5ldmVyIHNpbXBseSB0b29rIGZyb20gdGhpcyBjb2xvbnkgd2l0aG91dCBnaXZpbmcgc29tZXRoaW5nIHJlYWwgaW4gcmV0dXJuLicKCkhlIGhhbmRzIGl0IG92ZXIgd2l0aCBnZW51aW5lIHdhcm10aC4gJ1RlbGwgd2hvZXZlciBuZWVkcyB0ZWxsaW5nOiB0aGUgSG91c2Ugb2YgWXNvbGRlJ3MgcmVwdXRhdGlvbiBoZXJlIHdhcyBhbHdheXMgZm9yIGZhaXJuZXNzLCBub3QganVzdCBnZW5lcm9zaXR5LiBUaGF0J3Mgd29ydGggcHJlc2VydmluZyBwcm9wZXJseS4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIENvbnN0YW50aW5vcGxlJ3MgYW5jaWVudCBza3lsaW5lIGNhdGNoaW5nIHRoZSBsYXN0IG9mIHRoZSBkYXkncyBsaWdodCBhY3Jvc3MgdGhlIEJvc3Bob3J1cywgdGhlIHdob2xlIHRhbmdsZWQsIGZhc2NpbmF0aW5nIHBvbGl0aWNhbCBjb21wbGV4aXR5IG9mIHRoZSBjaXR5IHNldHRsaW5nIHNsb3dseSBiZWhpbmQgeW91IGFzIHlvdSBnby4KClRvbWFzLCBnZW51aW5lbHkgaW1wcmVzc2VkIGJ5IHRoZSB3aG9sZSB2aXNpdCwgbG9va3MgdGhvdWdodGZ1bGx5IGF0IHRoZSBkZXBhcnRpbmcgc2t5bGluZS4gJ0ZhaXJuZXNzIGFuZCBnZW5lcm9zaXR5IGFyZW4ndCBhbHdheXMgdGhlIHNhbWUgdGhpbmcsIGFyZSB0aGV5LiBHb29kLCB0aGF0IHNoZSB1bmRlcnN0b29kIHRoZSBkaWZmZXJlbmNlLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBzdGFydGluZyB0byB1bmRlcnN0YW5kIGl0IHRvbw==', 'next' => '8_end_understand'],
                ['text' => 'U2F5IGl0J3MgYSBoYXJkZXIgZGlzdGluY3Rpb24gdGhhbiBpdCBzb3VuZHM=', 'next' => '8_end_harder'],
            ],
        ],
        '8_end_understand' => [
            'prose'  => 'J0knbSBzdGFydGluZyB0byB1bmRlcnN0YW5kIGl0IHRvbywgaG9uZXN0bHksJyB5b3Ugc2F5LCB0aGlua2luZyBiYWNrIG92ZXIgZXZlcnkgc3RvcCBzbyBmYXIg4oCUIGdlbmVyb3NpdHkgdGhhdCBuZWFybHkgcnVpbmVkIGEgaG91c2UsIGFuZCBmYWlybmVzcyB0aGF0J3MgY2xlYXJseSwgc2VwYXJhdGVseSwga2VwdCBkb29ycyBvcGVuIGFjcm9zcyBoYWxmIGEgY29udGluZW50IHJlZ2FyZGxlc3MuCgpUb21hcyBub2RzLCBzYXRpc2ZpZWQuICdHb29kLiBUaGF0J3Mgd29ydGggdW5kZXJzdGFuZGluZyBwcm9wZXJseSwgdGhpcyBmYXIgaW50byB0aGUgam91cm5leS4gQm90aCBtYXR0ZXIuIFRoZXkncmUganVzdCBub3QgaW50ZXJjaGFuZ2VhYmxlLic=',
            'ending' => true,
        ],
        '8_end_harder' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCdzIGEgaGFyZGVyIGRpc3RpbmN0aW9uIHRoYW4gaXQgc291bmRzLCcgeW91IGFkbWl0LCB3YXRjaGluZyBDb25zdGFudGlub3BsZSdzIHNreWxpbmUgcmVjZWRlIGludG8gZXZlbmluZy4gJ0tub3dpbmcgd2hlbiB0byBzaW1wbHkgZ2l2ZSwgYW5kIHdoZW4gdG8gbWFrZSBzdXJlIGl0J3MgYWN0dWFsbHkgZmFpciB0byBldmVyeW9uZSBpbnZvbHZlZC4nCgpUb21hcyBkb2Vzbid0IHByZXRlbmQgaXQncyBzaW1wbGUgZWl0aGVyLiAnSXQgaXMgaGFyZC4gWXNvbGRlIGNsZWFybHkgd29ya2VkIGF0IGl0IGhlciB3aG9sZSBsaWZlLCBhbmQgZXZlbiBzaGUgZG91YnRlZCBoZXJzZWxmIHNvbWV0aW1lcywgcmVtZW1iZXIuIFRoYXQncyBwcm9iYWJseSB0aGUgbW9zdCBob25lc3QgYW5zd2VyIHRoZXJlIGlzLic=',
            'ending' => true,
        ],
    ],
];
