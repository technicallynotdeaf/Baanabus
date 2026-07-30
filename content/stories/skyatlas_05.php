<?php
return [
    'id'    => 5,
    'title' => 'The Same Careful Way',
    'color' => '#7A6A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEthbGFoYXJpJ3MgZHJ5IGJ1c2h2ZWxkIHNwcmVhZHMgd2lkZSBiZW5lYXRoIHRoZSBRdWlldCBIb3VyLCBzY3J1YmJ5IGFjYWNpYSB0cmVlcyBkb3R0aW5nIGEgbGFuZHNjYXBlIHRoYXQgbG9va3MgZW1wdHkgdW50aWwgeW91IGFjdHVhbGx5IGxlYXJuIHRvIHJlYWQgaXQgcHJvcGVybHkuIFByaXlhIGxhbmRzIHdlbGwgY2xlYXIgb2YgYSBzbWFsbCBmaXJlIGFscmVhZHkgYnVybmluZyBhZ2FpbnN0IHRoZSBjb21pbmcgZHVzay4gJ1NhbiB0cmFja2VyLCcgc2hlIHNheXMuICdSZWFkcyB0aGUgZ3JvdW5kIHRoZSBzYW1lIGNhcmVmdWwgd2F5IGhlIHJlYWRzIHRoZSBza3kuIFdvbid0IGJlIHJ1c2hlZCwgZWl0aGVyIG9uZS4nCgpUd28gYnVzaHZlbGQgcm91dGVzIHRvd2FyZCB0aGUgZmlyZSBwcmVzZW50IHRoZW1zZWx2ZXM6IGEgZGlyZWN0IHBhdGggdGhyb3VnaCBvcGVuIHNjcnViLCBvciBhIGxvbmdlciByb3V0ZSBmb2xsb3dpbmcgYW4gb2xkIGdhbWUgdHJhaWwu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZGlyZWN0IHBhdGggdGhyb3VnaCBvcGVuIHNjcnVi', 'next' => '2_direct'],
                ['text' => 'Rm9sbG93IHRoZSBvbGQgZ2FtZSB0cmFpbA==', 'next' => '2_trail'],
            ],
        ],
        '2_direct' => [
            'prose'  => 'VGhlIGRpcmVjdCBwYXRoIGN1dHMgc3RyYWlnaHQgdGhyb3VnaCBvcGVuIHNjcnViLCBlYXN5IGVub3VnaCB3YWxraW5nIHRob3VnaCB0aGUgZmFkaW5nIGxpZ2h0IG1ha2VzIGZvb3Rpbmcgb2NjYXNpb25hbGx5IHVuY2VydGFpbiBhbW9uZyBzY2F0dGVyZWQgc3RvbmVzIGFuZCBsb3cgYnVzaGVzLiBZb3UgcmVhY2ggdGhlIGZpcmUgcXVpY2tseSwgdGhlIHRyYWNrZXIgYWxyZWFkeSB3YXRjaGluZyB5b3VyIGFwcHJvYWNoIHdpdGggcXVpZXQsIHVuaHVycmllZCBhdHRlbnRpb24u',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGZpcmU=', 'next' => '3_shared'],
            ],
        ],
        '2_trail' => [
            'prose'  => 'VGhlIG9sZCBnYW1lIHRyYWlsIHdpbmRzIGEgbG9uZ2VyLCBnZW50bGVyIHJvdXRlLCB3b3JuIHNtb290aCBieSBnZW5lcmF0aW9ucyBvZiBhbmltYWwgYW5kIGh1bWFuIGZlZXQgYWxpa2UsIHNtYWxsIHRyYWNrcyBpbiB0aGUgc2FuZHkgc29pbCBoaW50aW5nIGF0IGEgd2hvbGUgaGlkZGVuIHRyYWZmaWMgb2Ygbm9jdHVybmFsIGxpZmUuIFlvdSByZWFjaCB0aGUgZmlyZSBhIGxpdHRsZSBsYXRlciwgaGF2aW5nIHByb3Blcmx5IHNlZW4gdGhlIGdyb3VuZCB0aGUgdHJhY2tlciBhcHBhcmVudGx5IHJlYWRzIHNvIGNhcmVmdWxseS4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGZpcmU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHRyYWNrZXIsIGFuIG9sZGVyIFNhbiBtYW4gbmFtZWQgL0t1bnRhIOKAlCBoaXMgb3duIG5hbWUgY2FycnlpbmcgYSBjbGljayB5b3VyIG1vdXRoIGNhbid0IHF1aXRlIG1hbmFnZSB5ZXQg4oCUIHdhdGNoZXMgeW91IHNldHRsZSBieSB0aGUgZmlyZSB3aXRoIHRoZSBzYW1lIHBhdGllbnQsIGFzc2Vzc2luZyBhdHRlbnRpb24gaGUnZCBnaXZlIGEgc2V0IG9mIHVuZmFtaWxpYXIgdHJhY2tzLiAnWW91ciBncmVhdC11bmNsZSBzYXQgZXhhY3RseSB0aGVyZSwgb25jZSwnIGhlIGZpbmFsbHkgc2F5cywgbm9kZGluZyBhdCB5b3VyIHNwb3QuICdBc2tlZCBnb29kIHF1ZXN0aW9ucy4gRGlkbid0IHJ1c2ggbWUgZWl0aGVyLCB3aGljaCBpcyByYXJlciB0aGFuIHlvdSdkIHRoaW5rLicKCkhlIHN0dWRpZXMgdGhlIGF0bGFzJ3MgYmxhbmsgcGF0Y2guICdJIHJlYWQgc2t5IHRoZSBzYW1lIHdheSBJIHJlYWQgZ3JvdW5kLXNpZ24g4oCUIHNsb3dseSwgcHJvcGVybHksIG9yIG5vdCBhdCBhbGwuIEFyZSB5b3Ugd2lsbGluZyB0byBhY3R1YWxseSBnbyBhdCBteSBwYWNlPyc=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSB3aWxsaW5nIHRvIGdvIGF0IGhpcyBwYWNl', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'L0t1bnRhIG9mZmVycyB0d28gd2F5cyB0byBwcm9wZXJseSBsZWFybiBoaXMgcGFjZTogc2l0IGluIGNvbXBsZXRlIHNpbGVuY2Ugd2l0aCBoaW0gZmlyc3QsIHdhdGNoaW5nIHRoZSBmaXJlIGFuZCB0aGUgZW1lcmdpbmcgc3RhcnMgdG9nZXRoZXIgd2l0aG91dCBhIHNpbmdsZSB3b3JkIGV4Y2hhbmdlZCwgdW50aWwgaGUganVkZ2VzIHlvdSd2ZSBhY3R1YWxseSBzZXR0bGVkIGVub3VnaCB0byBsaXN0ZW4gcHJvcGVybHksIG9yIGZvbGxvdyBoaW0gYSBzaG9ydCBkaXN0YW5jZSBmcm9tIHRoZSBmaXJlIHRvIHJlYWQgYSBzZXQgb2YgZnJlc2ggYW5pbWFsIHRyYWNrcyBmaXJzdCwgcHJvdmluZyB5b3VyIHBhdGllbmNlIG9uIHRoZSBncm91bmQgYmVmb3JlIGhlJ2xsIHRydXN0IGl0IHdpdGggdGhlIHNreS4KCidFaXRoZXIgcHJvdmVzIHRoZSBzYW1lIHRoaW5nLCcgaGUgc2F5cy4gJ1NpbGVuY2UsIG9yIHRyYWNrcy4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'U2l0IGluIGNvbXBsZXRlIHNpbGVuY2Ugd2l0aCBoaW0=', 'next' => '5_silence'],
                ['text' => 'UmVhZCB0aGUgZnJlc2ggdHJhY2tzIHdpdGggaGltIGZpcnN0', 'next' => '5_tracks'],
            ],
        ],
        '5_silence' => [
            'prose'  => 'U2l0dGluZyBpbiBjb21wbGV0ZSBzaWxlbmNlIGlzIGhhcmRlciB0aGFuIGl0IHNvdW5kcywgdGhlIHVyZ2UgdG8gZmlsbCB0aGUgcXVpZXQgd2l0aCBxdWVzdGlvbnMgbmFnZ2luZyBhdCB5b3Ugc3RlYWRpbHkgdW50aWwgaXQgZmluYWxseSwgZ3JhZHVhbGx5IGZhZGVzLCByZXBsYWNlZCBieSBzb21ldGhpbmcgY2xvc2VyIHRvIGFjdHVhbCBwYXRpZW5jZS4gL0t1bnRhIHNheXMgbm90aGluZyB0aGUgZW50aXJlIHRpbWUsIHNpbXBseSB3YXRjaGluZyB0aGUgZmlyZSBhbmQgdGhlIGRhcmtlbmluZyBza3kgYWxvbmdzaWRlIHlvdS4KCkV2ZW50dWFsbHksIHdpdGhvdXQgYW55IHNpZ25hbCB5b3UgY2FuIHF1aXRlIGlkZW50aWZ5LCBoZSBzZWVtcyBzYXRpc2ZpZWQu',
            'choices' => [
                ['text' => 'SGVhciB0aGUgcmlkZGxlIHByb3Blcmx5', 'next' => '6_shared'],
            ],
        ],
        '5_tracks' => [
            'prose'  => 'UmVhZGluZyB0aGUgZnJlc2ggdHJhY2tzIHdpdGggaGltIG1lYW5zIGNyb3VjaGluZyBsb3cgb3ZlciBmYWludCBtYXJrcyBpbiB0aGUgc2FuZCwgL0t1bnRhIHBhdGllbnRseSBjb3JyZWN0aW5nIHlvdXIgZ3Vlc3NlcyBhYm91dCB3aGljaCBhbmltYWwgcGFzc2VkLCBob3cgbG9uZyBhZ28sIHdoaWNoIGRpcmVjdGlvbiDigJQgYSBzbG93LCBjYXJlZnVsIGVkdWNhdGlvbiBpbiByZWFkaW5nIHNtYWxsIHNpZ25zIHByb3Blcmx5IHJhdGhlciB0aGFuIHJ1c2hpbmcgdG8gY29uY2x1c2lvbnMuCgpCeSB0aGUgdGltZSBoZSdzIHNhdGlzZmllZCB3aXRoIHlvdXIgcHJvZ3Jlc3MsIHJlYWwgcGF0aWVuY2UgaGFzIHNldHRsZWQgaW50byB5b3VyIGhhbmRzIGFuZCBleWVzIGJvdGgu',
            'choices' => [
                ['text' => 'SGVhciB0aGUgcmlkZGxlIHByb3Blcmx5', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'T25seSBvbmNlIGhlJ3Mgc2F0aXNmaWVkIGRvZXMgL0t1bnRhIGZpbmFsbHkgdGVsbCB0aGUgcmlkZGxlLCBoaXMgdm9pY2UgdW5odXJyaWVkLCBlYWNoIHBocmFzZSBnaXZlbiBwcm9wZXIgd2VpZ2h0IGFuZCBzcGFjZSwgZXhhY3RseSB0aGUgd2F5IGhlJ2QgcmVhZCBhIHRyYWNrIOKAlCBub3RoaW5nIHNraXBwZWQsIG5vdGhpbmcgcnVzaGVkLiBUaGUgY29uc3RlbGxhdGlvbiBpdCBkZXNjcmliZXMgc2V0dGxlcyBpbnRvIHlvdXIgbWluZCBzbG93bHksIHByb3Blcmx5LCByYXRoZXIgdGhhbiBhcnJpdmluZyBhbGwgYXQgb25jZS4KCllvdSBkcmF3IGl0IGludG8gdGhlIGF0bGFzIGNhcmVmdWxseSwgYW5kIGhlIHN0dWRpZXMgeW91ciB3b3JrIHdpdGggcXVpZXQgYXBwcm92YWwsIGFkZGluZyBoaXMgb3duIG5vdGUgYmVzaWRlIGl0Lg==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0b3dhcmQgdGhlIFF1aWV0IEhvdXIgdW5kZXIgYSBza3kgdXR0ZXJseSB0aGljayB3aXRoIHN0YXJzLCB0aGUgYnVzaHZlbGQncyBkYXJrbmVzcyBob2xkaW5nIG5vbmUgb2YgdGhlIGxpZ2h0IHBvbGx1dGlvbiB0aGF0IGJsdXJzIHRoZSBza3kgYWxtb3N0IGV2ZXJ5d2hlcmUgZWxzZS4gUHJpeWEncyB3YWl0aW5nIHdpdGggdGhlIHRoZXJtb3MsIGFuZCBTdWxpIGNoaXJydXBzIGEgZ3JlZXRpbmcgZnJvbSB0aGUgbm9zZSBjb25lLgoKJ0hlIHRlbGwgaXQgc2xvdz8nIFByaXlhIGFza3MsIGFscmVhZHkgZ3Vlc3NpbmcgdGhlIGFuc3dlciBmcm9tIHlvdXIgdW5odXJyaWVkIGdhaXQu',
            'choices' => [
                ['text' => 'U2F5IHRoZSBzbG93bmVzcyB0YXVnaHQgeW91IHNvbWV0aGluZyBpbXBvcnRhbnQ=', 'next' => '8_end_slow'],
                ['text' => 'U2F5IHlvdSBuZWFybHkgbG9zdCBwYXRpZW5jZSBoYWxmd2F5IHRocm91Z2g=', 'next' => '8_end_impatient'],
            ],
        ],
        '8_end_slow' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgc2xvd25lc3MgdGF1Z2h0IG1lIHNvbWV0aGluZyBpbXBvcnRhbnQsJyB5b3Ugc2F5LCB0aGlua2luZyBvZiAvS3VudGEncyBwYXRpZW50LCB1bmh1cnJpZWQgdGVsbGluZy4gJ0V2ZXJ5dGhpbmcgSSd2ZSBydXNoZWQgdGhyb3VnaCBpbiBteSBsaWZlIHByb2JhYmx5IGRlc2VydmVkIGJldHRlciB0aGFuIHRoYXQuIEZlZWxzIGxpa2UgYSBsZXNzb24gd29ydGggYWN0dWFsbHkga2VlcGluZy4nCgpQcml5YSBub2RzLCBwb3VyaW5nIHRoZSBzaGFyZWQgdGhlcm1vcyBwcm9wZXJseS4gJ0dvb2QuIEhlJ3MgdGF1Z2h0IHRoYXQgbGVzc29uIHRvIGEgZ3JlYXQgbWFueSBwZW9wbGUgd2hvIG5lZWRlZCBpdCBmYXIgbW9yZSB0aGFuIHRoZXkgcmVhbGlzZWQuIEdsYWQgaXQgbGFuZGVkLic=',
            'ending' => true,
        ],
        '8_end_impatient' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIG5lYXJseSBsb3N0IHBhdGllbmNlIGhhbGZ3YXkgdGhyb3VnaCwnIHlvdSBhZG1pdCwgYSBsaXR0bGUgc2hlZXBpc2hseS4gJy9LdW50YSBkaWRuJ3QgcnVzaCBmb3IgYW55b25lLCBhbmQgcGFydCBvZiBtZSBrZXB0IHdhbnRpbmcgaGltIHRvLiBIYWQgdG8gcHJvcGVybHkgZmlnaHQgdGhhdCBpbnN0aW5jdCB0aGUgd2hvbGUgd2F5LicKClByaXlhIGxhdWdocywgbm90IHVua2luZGx5LiAnTW9zdCBwZW9wbGUgZG8sIGZpcnN0IHRpbWUuIFRoYXQncyByYXRoZXIgdGhlIHdob2xlIHBvaW50IG9mIGhpbSB0ZXN0aW5nIHlvdSBmaXJzdCwgSSdkIGd1ZXNzLicgVGhlIEthbGFoYXJpJ3MgdmFzdCwgc3Rhci10aGljayBza3kgd2hlZWxzIHNsb3dseSBvdmVyaGVhZCBhcyB0aGUgUXVpZXQgSG91ciBsaWZ0cyBhd2F5IHRvd2FyZCB0aGUgbmV4dCBzdG9wLg==',
            'ending' => true,
        ],
    ],
];
