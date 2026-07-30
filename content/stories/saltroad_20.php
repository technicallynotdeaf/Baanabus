<?php
return [
    'id'    => 20,
    'title' => 'Close the Circle Where It Began',
    'color' => '#2A7A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VmVuaWNlIHJpc2VzIGltcG9zc2libHkgb3V0IG9mIGl0cyBvd24gbGFnb29uLCBjYW5hbHMgdGhyZWFkaW5nIGJldHdlZW4gYnVpbGRpbmdzIHRoYXQgaGF2ZSBzb21laG93LCBmb3IgY2VudHVyaWVzLCBzaW1wbHkgcmVmdXNlZCB0byBzaW5rIGRlc3BpdGUgZXZlcnkgcmVhc29uYWJsZSBleHBlY3RhdGlvbiB0aGF0IHRoZXkgc2hvdWxkLiBUb21hcywgZGVsaWdodGVkIHRvIGZpbmFsbHkgcmVhY2ggcHJvcGVyIE1lZGl0ZXJyYW5lYW4gd2F0ZXIgYWdhaW4gYWZ0ZXIgc28gbXVjaCBvdmVybGFuZCB0cmF2ZWwsIG5hdmlnYXRlcyB0aGUgY2FuYWwtZGlzdHJpY3Qgd2l0aCByZWFsLCBldmlkZW50IHBsZWFzdXJlLgoKVHdvIGNhbmFsLWRpc3RyaWN0IHJvdXRlcyB0b3dhcmQgdGhlIHNoaXBwaW5nIGZhbWlseSBwcmVzZW50IHRoZW1zZWx2ZXM6IGJ5IGdvbmRvbGEsIGFsb25nIHRoZSBtYWluIGNhbmFsLCBvciBvbiBmb290LCB0aHJvdWdoIHRoZSBuYXJyb3cgYnJpZGdlcyBhbmQgYWxsZXlzIHRoYXQgdGhyZWFkIGJldHdlZW4gdGhlIHdhdGVyLg==',
            'choices' => [
                ['text' => 'VGFrZSBhIGdvbmRvbGE=', 'next' => '2_gondola'],
                ['text' => 'R28gb24gZm9vdA==', 'next' => '2_foot'],
            ],
        ],
        '2_gondola' => [
            'prose'  => 'VGhlIGdvbmRvbGEgZ2xpZGVzIHNtb290aGx5IGFsb25nIHRoZSBtYWluIGNhbmFsLCBwYWxhenpvcyByaXNpbmcgb24gZWl0aGVyIHNpZGUgaW4gZ2VudWluZWx5IHNwZWN0YWN1bGFyLCBzbGlnaHRseSBhYnN1cmQgZ3JhbmRldXIsIHRoZSB3aG9sZSBjaXR5J3MgaW1wcm9iYWJsZSByZWxhdGlvbnNoaXAgd2l0aCB3YXRlciBvbiBmdWxsLCBiZWF1dGlmdWwgZGlzcGxheSB0aGUgZW50aXJlIHdheS4KCllvdSBhcnJpdmUgYXQgdGhlIHNoaXBwaW5nIGhvdXNlIHJlbGF4ZWQsIGFuZCB0aG9yb3VnaGx5IGNoYXJtZWQgYnkgdGhlIHdob2xlIGltcG9zc2libGUgY2l0eS4=',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '2_foot' => [
            'prose'  => 'R29pbmcgb24gZm9vdCBtZWFucyB0aHJlYWRpbmcgbmFycm93IGFsbGV5cyBhbmQgY291bnRsZXNzIHNtYWxsIGJyaWRnZXMsIHRoZSBjaXR5J3MgZ2VudWluZSwgaHVtYW4tc2NhbGVkIGludGltYWN5IGNvbnNpZGVyYWJseSBtb3JlIGFwcGFyZW50IHRoYW4gYW55IGdvbmRvbGEgcmlkZSB3b3VsZCByZXZlYWwuIFlvdSBnZXQgcHJvcGVybHksIHNhdGlzZnlpbmdseSBsb3N0IHR3aWNlIGJlZm9yZSBmaW5hbGx5IGZpbmRpbmcgdGhlIHNoaXBwaW5nIGhvdXNlLgoKVG9tYXMsIGRlbGlnaHRlZCBieSB5b3VyIG1pbm9yIG5hdmlnYXRpb25hbCBzdHJ1Z2dsZXMsIG9mZmVycyBkaXJlY3Rpb25zIG9ubHkgb25jZSB5b3UndmUgY2xlYXJseSBlYXJuZWQgdGhlbSB0aHJvdWdoIGdlbnVpbmUgZWZmb3J0Lg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHNoaXBwaW5nIGZhbWlseSwgdGhlIENvbnRhcmluaXMsIHJlY2VpdmUgeW91IHdpdGggcmVhbCBWZW5ldGlhbiBob3NwaXRhbGl0eSwgdGhlIGN1cnJlbnQgaGVhZCwgRWxlbmEsIHByb2R1Y2luZyB0aGUgd2VkZ2Ugd2l0aCBnZW51aW5lIHdhcm10aC4gJ1lzb2xkZSdzIGZhbWlseSBhbmQgbWluZSB0cmFkZWQgaG9uZXN0bHkgZm9yIGdlbmVyYXRpb25zLCcgc2hlIHNheXMuICdUaGlzIG9uZSdzIHNpbXBsZSDigJQgbm8gZGVidCwgbm8gdGVzdCwganVzdCBhbiBvbGQgZnJpZW5kc2hpcCdzIGZpbmFsIHBpZWNlLCBmcmVlbHkgZ2l2ZW4uJwoKU2hlIHN0dWRpZXMgeW91IHdpdGggcmVhbCBpbnRlcmVzdC4gJ1lvdSdyZSBjbG9zZSBub3csIHlvdSB1bmRlcnN0YW5kLiBKdXN0IG9uZSBtb3JlIHBpZWNlIGFmdGVyIHRoaXMuIEFuZCBJIHNob3VsZCB0ZWxsIHlvdSDigJQgdGhlIGNhcmF2YW5zZXJhaSB3aGVyZSBoZXIgd2hvbGUgc3RvcnkgYWN0dWFsbHkgYmVnYW4sIGJhY2sgaW4gU2FtYXJrYW5kLCBpcyBzdGlsbCBzdGFuZGluZy4gU3RpbGwgcnVuIGJ5IHRoZSBzYW1lIGZhbWlseSBsaW5lLCBhbGwgdGhlc2UgZ2VuZXJhdGlvbnMgbGF0ZXIuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIG1vcmUgYWJvdXQgdGhhdA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RWxlbmEgZXhwbGFpbnMgd2hhdCBzaGUga25vd3M6IHRoZSBjYXJhdmFuc2VyYWkgdGhhdCB0b29rIGluIGEgeW91bmcsIHBlbm5pbGVzcyBZc29sZGUgZ2VuZXJhdGlvbnMgYWdvIGhhcyBwYXNzZWQgZG93biB0aHJvdWdoIHRoZSBzYW1lIGZhbWlseSBldmVyIHNpbmNlLCBzdGlsbCBvcGVyYXRpbmcsIHN0aWxsIGhvc3RpbmcgdHJhdmVsbGVycyBleGFjdGx5IGFzIGl0IGFsd2F5cyBoYXMuIFNoZSBvZmZlcnMgdHdvIHdheXMgdG8gcHJvcGVybHkgaG9ub3VyIHRoaXMgZmluYWwgcGllY2Ugb2YgaW5mb3JtYXRpb246IGhlbHAgaGVyIGRyYWZ0IGEgcHJvcGVyIGxldHRlciBvZiBpbnRyb2R1Y3Rpb24gdG8gc2VuZCBhaGVhZCwgZWFzaW5nIHlvdXIgZXZlbnR1YWwgYXJyaXZhbCB0aGVyZSwgb3Igc2ltcGx5IHNpdCBhbmQgbGV0IGhlciB0ZWxsIHlvdSBldmVyeXRoaW5nIHNoZSBwZXJzb25hbGx5IGtub3dzIGFib3V0IHRoYXQgZmlyc3QsIGZvcm1hdGl2ZSBraW5kbmVzcy4KCidFaXRoZXIgbWF0dGVycywnIHNoZSBzYXlzLiAnUHJhY3RpY2FsIHByZXBhcmF0aW9uLCBvciBwcm9wZXIgdW5kZXJzdGFuZGluZy4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'SGVscCBkcmFmdCB0aGUgbGV0dGVyIG9mIGludHJvZHVjdGlvbg==', 'next' => '5_letter'],
                ['text' => 'SGVhciBldmVyeXRoaW5nIHNoZSBrbm93cyBhYm91dCB0aGF0IGZpcnN0IGtpbmRuZXNz', 'next' => '5_hear'],
            ],
        ],
        '5_letter' => [
            'prose'  => 'RHJhZnRpbmcgdGhlIGxldHRlciBwcm9wZXJseSBtZWFucyBjYXJlZnVsLCBmb3JtYWwgY29tcG9zaXRpb24sIEVsZW5hIGd1aWRpbmcgeW91IHRocm91Z2ggZXhhY3RseSB0aGUgcmlnaHQgdG9uZSBhbmQgZGV0YWlsIHRvIGVuc3VyZSBhIHdhcm0gcmVjZXB0aW9uIGF0IGpvdXJuZXkncyB0cnVlIGVuZC4gSXQncyBjYXJlZnVsLCBwcmFjdGljYWwgd29yaywgYW5kIGJ5IHRoZSBmaW5pc2gsIHlvdSd2ZSBnb3Qgc29tZXRoaW5nIGdlbnVpbmVseSB1c2VmdWwgdG8gc2VuZCBhaGVhZC4KCkVsZW5hIHJldmlld3MgaXQgd2l0aCByZWFsIHNhdGlzZmFjdGlvbi4gJ1RoYXQnbGwgb3BlbiB0aGUgZG9vciBwcm9wZXJseSwgd2hlbiB5b3UgZmluYWxseSByZWFjaCBpdC4n',
            'choices' => [
                ['text' => 'U2VlIHRoZSB3ZWRnZSBwcm9wZXJseSBnaXZlbg==', 'next' => '6_shared'],
            ],
        ],
        '5_hear' => [
            'prose'  => 'RWxlbmEgdGVsbHMgeW91IGV2ZXJ5dGhpbmcgc2hlJ3MgZXZlciBoZWFyZCBhYm91dCB0aGF0IGZpcnN0IGtpbmRuZXNzIOKAlCBhIHlvdW5nIFlzb2xkZSwgYWxvbmUgYW5kIGRlc3RpdHV0ZSwgdGFrZW4gaW4gd2l0aG91dCBxdWVzdGlvbiBieSBhIGNhcmF2YW5zZXJhaSBrZWVwZXIgd2hvIGFza2VkIG5vdGhpbmcgaW4gcmV0dXJuIGJleW9uZCBzaW1wbGUgZGVjZW5jeS4gSXQncyBhIHN0b3J5IHRoYXQncyBjbGVhcmx5IGJlZW4gcGFzc2VkIGRvd24gY2FyZWZ1bGx5LCB0cmVhc3VyZWQgYWNyb3NzIGdlbmVyYXRpb25zIG9mIHRyYWRpbmcgZmFtaWxpZXMgd2hvIGFsbCwgZXZlbnR1YWxseSwgYmVuZWZpdGVkIGZyb20gdGhlIHdvbWFuIHRoYXQga2luZG5lc3MgaGVscGVkIGNyZWF0ZS4KCkJ5IHRoZSBlbmQsIHlvdSB1bmRlcnN0YW5kLCBtb3JlIGZ1bGx5IHRoYW4gZXZlciwgZXhhY3RseSB3aGF0IHlvdSdyZSBhY3R1YWxseSB0cmF2ZWxsaW5nIHRvd2FyZC4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSB3ZWRnZSBwcm9wZXJseSBnaXZlbg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RWxlbmEgaGFuZHMgb3ZlciB0aGUgZmluYWwgd2VkZ2UgZnJvbSBoZXIgZmFtaWx5J3Mga2VlcGluZywgdGhlIGVpZ2h0aCBvZiBuaW5lIG5vdyBwcm9wZXJseSBpbiB5b3VyIHBvc3Nlc3Npb24uICdPbmUgbW9yZSwnIHNoZSBzYXlzLiAnU29tZXdoZXJlIGNsb3NlIGJ5LCBJJ2QgZ3Vlc3MsIGdpdmVuIGhvdyB0aGUgcm91dGUncyBiZWVuIHJ1bm5pbmcuIFRoZW4gaG9tZSwgdG8gY2xvc2UgdGhlIGNpcmNsZSB3aGVyZSBpdCBhY3R1YWxseSBiZWdhbi4nCgpTaGUgc3R1ZGllcyB5b3Ugd2l0aCByZWFsIHdhcm10aC4gJ1doYXRldmVyIHlvdSBmaW5kIHRoZXJlLCBhdCB0aGUgdmVyeSBlbmQg4oCUIHRyZWF0IGl0IGdlbnRseS4gVGhhdCBmaXJzdCBraW5kbmVzcyBpcyB0aGUgcmVhc29uIGFueSBvZiB0aGUgcmVzdCBvZiB0aGlzIGV2ZXIgaGFkIGFueXdoZXJlIHRvIHRyYXZlbCBmcm9tLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIFZlbmljZSdzIGltcG9zc2libGUgY2FuYWxzIGFuZCBwYWxhenpvcyBzZXR0bGluZyBpbnRvIGV2ZW5pbmcgbGlnaHQgYmVoaW5kIHlvdSwgdGhlIHdob2xlIGpvdXJuZXkncyBhY3R1YWwgZW5kaW5nIGZpbmFsbHksIGdlbnVpbmVseSB3aXRoaW4gc2lnaHQgZm9yIHRoZSBmaXJzdCB0aW1lLgoKVG9tYXMsIGNoZWNraW5nIHRoZSBjYXNlJ3MgbmVhci1jb21wbGV0ZSBhc3NlbWJseSwgbG9va3MgdGhvdWdodGZ1bCByYXRoZXIgdGhhbiBzaW1wbHkgc2F0aXNmaWVkLiAnQWxtb3N0IHRoZXJlLiBGZWVscyBkaWZmZXJlbnQsIGRvZXNuJ3QgaXQsIGtub3dpbmcgZXhhY3RseSB3aGVyZSB0aGlzIGlzIGFsbCBhY3R1YWxseSBoZWFkZWQgbm93Lic=',
            'choices' => [
                ['text' => 'U2F5IGl0IGZlZWxzIGxpa2UgY29taW5nIGZ1bGwgY2lyY2xl', 'next' => '8_end_circle'],
                ['text' => 'U2F5IHlvdSdyZSBub3QgcmVhZHkgZm9yIGl0IHRvIGVuZCB5ZXQ=', 'next' => '8_end_notready'],
            ],
        ],
        '8_end_circle' => [
            'prose'  => 'J0l0IGZlZWxzIGxpa2UgY29taW5nIGZ1bGwgY2lyY2xlLCBob25lc3RseSwnIHlvdSBzYXksIHdhdGNoaW5nIFZlbmljZSdzIGxpZ2h0cyByZWZsZWN0IG9uIHRoZSBjYW5hbCB3YXRlciBhcyBldmVuaW5nIHByb3Blcmx5IHNldHRsZXMuICdFdmVyeXRoaW5nIGxlYWRpbmcgYmFjayB0byBleGFjdGx5IHdoZXJlIGl0IGFsbCBhY3R1YWxseSBzdGFydGVkLCBmb3IgaGVyIGFuZCBub3csIGluIGEgd2F5LCBmb3IgdXMgdG9vLicKClRvbWFzIG5vZHMgc2xvd2x5LiAnR29vZCBjaXJjbGVzIGFyZSByYXJlLiBNb3N0IHRoaW5ncyBqdXN0IGVuZC4gVGhpcyBvbmUncyBhY3R1YWxseSBjbG9zaW5nIHByb3Blcmx5LCB0aGUgd2F5IGl0IHdhcyBhbHdheXMgbWVhbnQgdG8uJw==',
            'ending' => true,
        ],
        '8_end_notready' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gbm90IHJlYWR5IGZvciBpdCB0byBlbmQgeWV0LCcgeW91IGFkbWl0LCBzdXJwcmlzaW5nIHlvdXJzZWxmIHdpdGggaG93IG11Y2ggdGhlIHRob3VnaHQgdW5zZXR0bGVzIHlvdS4gJ1RoaXMgd2hvbGUgam91cm5leSdzIGJlY29tZSBzb21ldGhpbmcuIE5vdCBzdXJlIHdoYXQgaGFwcGVucyB0byB0aGF0LCBvbmNlIHRoZSB3ZWRnZXMgc3RvcCBuZWVkaW5nIGZpbmRpbmcuJwoKVG9tYXMgZG9lc24ndCBydXNoIHRvIHJlYXNzdXJlIHlvdS4gJ0ZhaXIgd29ycnkuIEpvdXJuZXlzIGVuZGluZyBkb2Vzbid0IG1lYW4gd2hhdCB0aGV5IGJ1aWx0IGp1c3QgZGlzYXBwZWFycywgdGhvdWdoLiBXaGF0ZXZlciB0aGlzIGJlY2FtZSwgaXQnbGwga2VlcCBiZWluZyB0aGF0LCB3ZWRnZXMgb3Igbm90Lic=',
            'ending' => true,
        ],
    ],
];
