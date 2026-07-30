<?php
return [
    'id'    => 17,
    'title' => 'This Isn\'t Over',
    'color' => '#7A9A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFNvdXRoZXJuIEFscHMgcmlzZSBzaGFycCBhbmQgZ2xhY2llci1jYXJ2ZWQgYWJvdmUgaGlnaC1jb3VudHJ5IHNoZWVwIHN0YXRpb25zIHRoYXQgaGF2ZSB3b3JrZWQgdGhpcyBzYW1lIGhhcmQsIGJlYXV0aWZ1bCBsYW5kIGZvciBnZW5lcmF0aW9ucywgdHVzc29jayBncmFzcyByaXBwbGluZyBnb2xkLWJyb3duIGFjcm9zcyBzbG9wZXMgdG9vIHN0ZWVwIGZvciBhbnl0aGluZyBidXQgc2hlZXAgYW5kIHRoZSBvY2Nhc2lvbmFsIHN0dWJib3JuIGZhcm1lci4gR3JldGEgbW9vcnMgdGhlIENvbnRvdXIgd2l0aCBhIGxvdyB3aGlzdGxlIG9mIGdlbnVpbmUgYXBwcmVjaWF0aW9uIGZvciB0aGUgc2NlbmVyeS4KClR3byByb3V0ZXMgdG93YXJkIHRoZSBzdGF0aW9uIHByZXNlbnQgdGhlbXNlbHZlczogdGhlIGRpcmVjdCBmYXJtIHRyYWNrLCBmYXN0ZXIgYnV0IGNyb3NzaW5nIGxhbmQgeW91IGhhdmVuJ3QgYmVlbiBleHBsaWNpdGx5IGludml0ZWQgb250byB5ZXQsIG9yIHRoZSBsb25nZXIgcHVibGljIHJvdXRlLCBzbG93ZXIgYnV0IHByb3Blcmx5LCB1bmFtYmlndW91c2x5IHBlcm1pdHRlZC4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZGlyZWN0IGZhcm0gdHJhY2s=', 'next' => '2_direct'],
                ['text' => 'VGFrZSB0aGUgbG9uZ2VyIHB1YmxpYyByb3V0ZQ==', 'next' => '2_public'],
            ],
        ],
        '2_direct' => [
            'prose'  => 'VGhlIGZhcm0gdHJhY2sgY3V0cyBzdHJhaWdodCBhY3Jvc3Mgb3BlbiBjb3VudHJ5LCB0dXNzb2NrIGJydXNoaW5nIGF0IHlvdXIgbGVncyB0aGUgd2hvbGUgd2F5LCBhbmQgeW91IG1ha2UgZ29vZCB0aW1lIGRlc3BpdGUgdGhlIG1pbGQgZGlzY29tZm9ydCBvZiB0cmVzcGFzc2luZyBvbiBsYW5kIHlvdSBoYXZlbid0IHRlY2huaWNhbGx5IGJlZW4gd2VsY29tZWQgb250by4gQSBkb2cgYXBwZWFycyBmaXJzdCwgdGhlbiBhIHJpZGVyLCBib3RoIHJlZ2FyZGluZyB5b3Ugd2l0aCBtb3JlIGN1cmlvc2l0eSB0aGFuIGFjdHVhbCBob3N0aWxpdHkuCgonWW91J3JlIGVpdGhlciBsb3N0IG9yIHlvdSdyZSBoZXJlIGFib3V0IHRoZSBzYW1lIHRoaW5nIHRoZSBvdGhlciBsb3QncyBoZXJlIGFib3V0LCcgdGhlIHJpZGVyIHNheXMsIHVuYm90aGVyZWQuICdTdGF0aW9uJ3MganVzdCBvdmVyIHRoZSByaXNlLic=',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHN0YXRpb24=', 'next' => '3_shared'],
            ],
        ],
        '2_public' => [
            'prose'  => 'VGhlIHB1YmxpYyByb3V0ZSB0YWtlcyBjb25zaWRlcmFibHkgbG9uZ2VyLCB3aW5kaW5nIHByb3Blcmx5IGFyb3VuZCB0aGUgZmFybSdzIGJvdW5kYXJ5IGJlZm9yZSBmaW5hbGx5IHJlam9pbmluZyB0b3dhcmQgdGhlIGhvbWVzdGVhZCwgdHVzc29jayBhbmQgZ2xhY2llci1jYXJ2ZWQgcGVha3MgcHJvdmlkaW5nIGdlbnVpbmVseSBzcGVjdGFjdWxhciBzY2VuZXJ5IHRoZSB3aG9sZSB1bmh1cnJpZWQgd2F5LgoKQSBmYXJtaGFuZCBtZW5kaW5nIGZlbmNlIG5lYXIgdGhlIGJvdW5kYXJ5IG1lbnRpb25zLCBpbiBwYXNzaW5nLCB0aGF0IHlvdSdyZSBub3QgdGhlIGZpcnN0IG91dHNpZGVycyB0aHJvdWdoIHRoaXMgd2VlayDigJQgJ3RoZXJlJ3MgYSB3aG9sZSBzdXJ2ZXkgY3JldyBjYW1wZWQgdXAgcGFzdCB0aGUgcmlkZ2UsIGJlZW4gaGVyZSBhIGZldyBkYXlzIGFscmVhZHkuJw==',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHN0YXRpb24=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHN0YXRpb24ncyBvd25lciwgYSB3ZWF0aGVyZWQsIHBsYWluLXNwb2tlbiB3b21hbiBuYW1lZCBEb3QsIGdyZWV0cyB5b3UgYXQgdGhlIGhvbWVzdGVhZCB3aXRoIHJlYWwgd2FybXRoLCB0aG91Z2ggc2hlIG1lbnRpb25zLCBhbG1vc3QgaW1tZWRpYXRlbHksIHRoYXQgeW91J3JlIG5vdCB0aGUgb25seSBvbmVzIGludGVyZXN0ZWQgaW4gd2hhdCBzaGUncyBnb3QuICdTdXJ2ZXkgY3JldydzIGJlZW4gdXAgdGhlIHZhbGxleSBhIGZldyBkYXlzIG5vdyDigJQgUmV5ZXMsIHRoZSBmZWxsb3cgaW4gY2hhcmdlLCBrZWVwcyBhc2tpbmcgYWJvdXQgb2xkIGVxdWlwbWVudCwgb2xkIHJlY29yZHMsIGFueXRoaW5nIGZyb20gYSBieWdvbmUgc3VydmV5LicKCkFzIGlmIHN1bW1vbmVkIGJ5IGhpcyBvd24gbmFtZSwgYSBtYW4gYXBwZWFycyBpbiB0aGUgeWFyZCBiZWhpbmQgaGVyIOKAlCBzaGFycC1leWVkLCBjbGVhcmx5IGNvbXBldGVudCwgYW5kIHZpc2libHkgYW5ub3llZCB0byBzZWUgeW91LiAnWW91LCcgaGUgc2F5cywgcmVjb2duaXNpbmcgdGhlIGNhc2UgaW4geW91ciBoYW5kcyBpbW1lZGlhdGVseS4gJ1Nob3VsZCBoYXZlIGtub3duLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgd2FudHM=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'UmV5ZXMgZXhwbGFpbnMsIHRpZ2h0bHksIHRoYXQgaGUncyBoZXJlIHN1cnZleWluZyB0aGUgc2FtZSB1bmZpbmlzaGVkIHBhc3MgQXVndXN0aW4gbmV2ZXIgY2xvc2VkIG91dCDigJQgZm9yIGEgcmFpbCBjb25jZXNzaW9uLCBub3Qgc2VudGltZW50LCBhbmQgaGUnZCB2ZXJ5IG11Y2ggYXBwcmVjaWF0ZSB5b3Ugbm90IG11ZGR5aW5nIGEgbGVnaXRpbWF0ZSBjb21tZXJjaWFsIHN1cnZleSB3aXRoIHdoYXRldmVyIHRoaXMgcGVyc29uYWwgZXJyYW5kIGFjdHVhbGx5IGlzLiBEb3QsIHdhdGNoaW5nIHRoZSB0ZW5zaW9uIHdpdGggb3BlbiBhbXVzZW1lbnQsIG9mZmVycyB5b3UgdHdvIHdheXMgdG8gYWN0dWFsbHkgZ2V0IHRoZSBzdW4tc2hhZGUgZmlsdGVyIHNoZSdzIGhvbGRpbmc6IG91dGJpZCBSZXllcydzIG93biBmb3JtYWwgb2ZmZXIgZm9yIGl0LCBvciBzaW1wbHkgb3V0LWFyZ3VlIGhpbSBwcm9wZXJseSBpbiBmcm9udCBvZiBoZXIsIHNpbmNlIHNoZSdzIGNsZWFybHkgZW5qb3lpbmcgdGhlIHNob3cgcmVnYXJkbGVzcyBvZiBvdXRjb21lLg==',
            'choices' => [
                ['text' => 'TWFrZSBhIGJldHRlciBmb3JtYWwgb2ZmZXI=', 'next' => '5_offer'],
                ['text' => 'QXJndWUgeW91ciBjYXNlIHByb3Blcmx5', 'next' => '5_argue'],
            ],
        ],
        '5_offer' => [
            'prose'  => 'WW91IG1ha2UgYSBnZW51aW5lLCBjYXJlZnVsIG9mZmVyIOKAlCBub3QgbW9uZXkgZXhhY3RseSwgc2luY2UgRG90J3MgY2xlYXJseSBub3QgbW90aXZhdGVkIGJ5IHRoYXQsIGJ1dCBhIHByb3BlciBwcm9taXNlIHRvIGRvY3VtZW50IHRoZSBzdGF0aW9uJ3Mgb3duIHN1cnZleSBoaXN0b3J5IGFsb25nc2lkZSBBdWd1c3RpbidzLCBwcm9mZXNzaW9uYWxseSwgZm9yIHRoZSBmYW1pbHkncyBvd24gcmVjb3Jkcy4gUmV5ZXMncyBjb21tZXJjaWFsIG9mZmVyLCBieSBjb21wYXJpc29uLCBzdWRkZW5seSBsb29rcyBjb25zaWRlcmFibHkgdGhpbm5lci4KCkRvdCBkb2Vzbid0IGhlc2l0YXRlIGxvbmcuICdUaGF0J3Mgd29ydGggbW9yZSB0byBtZSB0aGFuIGhpcyBudW1iZXIsJyBzaGUgc2F5cywgd2l0aCBhIGxvb2sgYXQgUmV5ZXMgdGhhdCBpc24ndCB1bmtpbmQsIGp1c3QgZmluYWwu',
            'choices' => [
                ['text' => 'U2VlIFJleWVzJ3MgcmVhY3Rpb24=', 'next' => '6_shared'],
            ],
        ],
        '5_argue' => [
            'prose'  => 'WW91IGFyZ3VlIHlvdXIgY2FzZSBwbGFpbmx5LCBpbiBmcm9udCBvZiBib3RoIG9mIHRoZW0g4oCUIHRoaXMgaXNuJ3QgY29tbWVyY2UsIGl0J3MgZmluaXNoaW5nIGEgbWFuJ3MgdW5maW5pc2hlZCB3b3JrIHByb3Blcmx5LCBmb3IgcmVhc29ucyB0aGF0IGhhdmUgbm90aGluZyB0byBkbyB3aXRoIHJhaWwgY29uY2Vzc2lvbnMgb3IgbGFuZCBjbGFpbXMuIFJleWVzIGNvdW50ZXJzIHNoYXJwbHksIHByb2Zlc3Npb25hbGx5LCBnZW51aW5lbHkgY29udmluY2VkIGhpcyBvd24gY2F1c2UgbWF0dGVycyB0b28uCgpEb3QgbGV0cyB5b3UgYm90aCBmaW5pc2ggYmVmb3JlIGRlbGl2ZXJpbmcgaGVyIHZlcmRpY3QuICdDb21tZXJjaWFsIHN1cnZleSdzIGdvdCBwbGVudHkgb2Ygb3RoZXIgZXF1aXBtZW50IHRvIHdvcmsgZnJvbS4gVGhpcyBvbmUncyBwZXJzb25hbC4gUGVyc29uYWwgd2lucywgb24gbXkgbGFuZC4n',
            'choices' => [
                ['text' => 'U2VlIFJleWVzJ3MgcmVhY3Rpb24=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'UmV5ZXMgZG9lc24ndCB0YWtlIHRoZSBsb3NzIGdyYWNlZnVsbHksIGV4YWN0bHksIGJ1dCBoZSBkb2Vzbid0IHN0b3JtIG9mZiBlaXRoZXIg4oCUIGp1c3Qgc3R1ZGllcyB5b3UgZm9yIGEgbG9uZyBtb21lbnQgd2l0aCBzb21ldGhpbmcgdGhhdCBtaWdodCwgZXZlbnR1YWxseSwgYmVjb21lIHJlc3BlY3QsIHRob3VnaCBpdCdzIGNsZWFybHkgbm90IHRoZXJlIHlldC4gJ1RoaXMgaXNuJ3Qgb3ZlciwnIGhlIHNheXMuICdXZSdyZSBib3RoIGhlYWRlZCB0aGUgc2FtZSBkaXJlY3Rpb24sIG1vcmUgb3IgbGVzcy4gSSBleHBlY3Qgd2UnbGwgY3Jvc3MgcGF0aHMgYWdhaW4uJwoKRG90IGhhbmRzIG92ZXIgdGhlIHN1bi1zaGFkZSBmaWx0ZXIgcmVnYXJkbGVzcywgZW50aXJlbHkgdW5ib3RoZXJlZCBieSB0aGUgd2hvbGUgZXhjaGFuZ2UuICdHb29kIHJpZGRhbmNlIHRvIGEgYml0IG9mIGRyYW1hLCcgc2hlIHNheXMsIGNoZWVyZnVsbHkuICdTdGF0aW9uIGNvdWxkIHVzZSBtb3JlIG9mIGl0LCBob25lc3RseSwgZ2V0cyBkdWxsIG91dCBoZXJlLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgQ29udG91ciB3aXRoIHRoZSBmaWx0ZXIgc2VjdXJlIGluIHRoZSBjYXNlLCBhIGZvdXJ0ZWVudGggcGllY2UsIHRoZSBTb3V0aGVybiBBbHBzJyBnbGFjaWVyLWNhcnZlZCBwZWFrcyBjYXRjaGluZyByZWFsIGdvbGQgaW4gdGhlIGxhdGUgbGlnaHQuIFJleWVzJ3Mgc3VydmV5IGNhbXAgaXMgdmlzaWJsZSBvbiB0aGUgZmFyIHJpZGdlIGFzIHlvdSBsaWZ0IG9mZiwgdGVudHMgYW5kIGVxdWlwbWVudCBzY2F0dGVyZWQgd2l0aCB0aGUgcGFydGljdWxhciBlZmZpY2llbmN5IG9mIGEgd2VsbC1mdW5kZWQgb3BlcmF0aW9uLgoKR3JldGEgd2F0Y2hlcyB0aGUgY2FtcCBzaHJpbmsgYmVsb3cgd2l0aCBhIGNvbXBsaWNhdGVkIGV4cHJlc3Npb24uICdIZSdzIGdvb2QsIHlvdSBrbm93LiBQcm9wZXJseSBnb29kLCB3aGF0ZXZlciBlbHNlIGhlIGlzLiBXb3VsZG4ndCB3YW50IGhpbSBhcyBhbiBlbmVteSBsb25nZXIgdGhhbiBuZWNlc3NhcnkuJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSBob3BlIGl0IGRvZXNuJ3QgY29tZSB0byB0aGF0', 'next' => '8_end_hope'],
                ['text' => 'U2F5IHlvdSdyZSBub3QgY291bnRpbmcgb24gaXQgZ29pbmcgd2VsbA==', 'next' => '8_end_brace'],
            ],
        ],
        '8_end_hope' => [
            'prose'  => 'J0kgaG9wZSBpdCBkb2Vzbid0IGNvbWUgdG8gdGhhdCwnIHlvdSBzYXksIGFuZCBtZWFuIGl0IOKAlCB0aGVyZSdzIHNvbWV0aGluZyBpbiBSZXllcydzIG9idmlvdXMgY29tcGV0ZW5jZSBhbmQgb2J2aW91cyBmcnVzdHJhdGlvbiB0aGF0IHJlYWRzIGxlc3MgbGlrZSB2aWxsYWlueSBhbmQgbW9yZSBsaWtlIHNvbWVvbmUgY2hhc2luZyBzb21ldGhpbmcgcmVhbCwganVzdCBmcm9tIGEgZGlmZmVyZW50IGRpcmVjdGlvbiBlbnRpcmVseS4KCkdyZXRhIGNvbnNpZGVycyB0aGlzLCBub2RzIHNsb3dseS4gJ01pZ2h0IGJlIHJpZ2h0LiBNaWdodCBub3QgYmUuIEVpdGhlciB3YXksIHdlJ2xsIGZpbmQgb3V0LicgVGhlIENvbnRvdXIgY2xpbWJzIGludG8gb3BlbiBza3ksIFJleWVzJ3MgY2FtcCBzaHJpbmtpbmcgdG8gYSBzbWFsbCwgY29tcGV0ZW50LWxvb2tpbmcgc3BlY2sgb24gdGhlIHJpZGdlIGJlaGluZCB5b3Uu',
            'ending' => true,
        ],
        '8_end_brace' => [
            'prose'  => 'J0knbSBub3QgY291bnRpbmcgb24gaXQgZ29pbmcgd2VsbCwnIHlvdSBhZG1pdCwgYnJhY2luZywgYSBsaXR0bGUsIGZvciB3aGF0ZXZlciBjb21lcyBuZXh0IGluIHdoYXRldmVyIGRpcmVjdGlvbiBSZXllcyBkZWNpZGVzIHRvIHRha2UgdGhpcyByaXZhbHJ5LgoKVGhlIENvbnRvdXIgbGlmdHMgb2ZmIHRoZSBTb3V0aGVybiBBbHBzJyBnbGFjaWVyLWNhcnZlZCBzbG9wZXMsIFJleWVzJ3MgY2FtcCBhIHNtYWxsLCBkZXRlcm1pbmVkIHNwZWNrIG9uIHRoZSByaWRnZSBiZWhpbmQgeW91LCBhbmQgeW91IGZpbmQgeW91cnNlbGYgaG9waW5nLCBkZXNwaXRlIHRoZSBicmFjaW5nLCB0aGF0IHlvdSdyZSB3cm9uZyB0byBleHBlY3QgdGhlIHdvcnN0IGZyb20gaGltLiBTb21lIGluc3RpbmN0cywgeW91J3JlIGxlYXJuaW5nLCBhcmUgd29ydGggZG91YnRpbmcgYSBsaXR0bGUsIGV2ZW4gd2hlbiB0aGV5IGZlZWwgZW50aXJlbHkganVzdGlmaWVkLg==',
            'ending' => true,
        ],
    ],
];
