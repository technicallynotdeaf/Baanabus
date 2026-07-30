<?php
return [
    'id'    => 15,
    'title' => 'Friendly Rivals, Proper Ones',
    'color' => '#9A6A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEFsdGFpIE1vdW50YWlucyBzdHJhZGRsZSB0aGUgTW9uZ29saWEtUnVzc2lhIGJvcmRlciBpbiBhIGdlbnVpbmVseSByZW1vdGUgdGFuZ2xlIG9mIHBlYWtzLCBhbmQgdGhlIHNtYWxsIHRyYWRpbmcgcG9zdCB0b3duIHlvdSdyZSBhaW1pbmcgZm9yIGV4aXN0cyBtb3N0bHkgYmVjYXVzZSBvZiBpdHMgcG9zaXRpb24gcmF0aGVyIHRoYW4gYW55IHBhcnRpY3VsYXIgY2hhcm0g4oCUIGEgcGxhY2UgcGVvcGxlIHBhc3MgdGhyb3VnaCByYXRoZXIgdGhhbiBjaG9vc2UsIHRob3VnaCBpdCdzIGdyb3duIGl0cyBvd24gc3R1YmJvcm4gY2hhcmFjdGVyIHJlZ2FyZGxlc3MuCgpUd28gd2F5cyB0byBhcHByb2FjaCB0aGUgdHJhZGluZyBwb3N0IHByZXNlbnQgdGhlbXNlbHZlczogdGhyb3VnaCB0aGUgb2xkZXIgTW9uZ29saWFuIHNpZGUgb2YgdG93biwgd2hlcmUgbW9zdCBvZiB0aGUgZ2VudWluZWx5IGxvbmctZXN0YWJsaXNoZWQgdHJhZGUgZmFtaWxpZXMgc3RpbGwgb3BlcmF0ZSwgb3IgdGhlIG5ld2VyIFJ1c3NpYW4tc2lkZSBtYXJrZXQsIGZhc3Rlci1ncm93aW5nLCBsZXNzIHRyYWRpdGlvbmFsLCBjb25zaWRlcmFibHkgbW9yZSBjaGFvdGljLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhyb3VnaCB0aGUgTW9uZ29saWFuIHNpZGU=', 'next' => '2_mongolian'],
                ['text' => 'QXBwcm9hY2ggdGhyb3VnaCB0aGUgUnVzc2lhbiBzaWRl', 'next' => '2_russian'],
            ],
        ],
        '2_mongolian' => [
            'prose'  => 'VGhlIE1vbmdvbGlhbiBzaWRlIG1vdmVzIGF0IGl0cyBvd24gdW5odXJyaWVkIHBhY2UsIGdlci1jYW1wcyBhbmQgcGVybWFuZW50IGJ1aWxkaW5ncyBtaXhlZCB0b2dldGhlciBpbiBhIHdheSB0aGF0IHN1Z2dlc3RzIHRoZSB0b3duIG5ldmVyIHF1aXRlIGRlY2lkZWQgd2hpY2gga2luZCBvZiBwbGFjZSBpdCB3YW50ZWQgdG8gYmUuIFRyYWRlcnMgaGVyZSBkZWFsIGluIGdlbnVpbmUsIGxvbmctY3VsdGl2YXRlZCByZXB1dGF0aW9uIGFzIG11Y2ggYXMgZ29vZHMsIGFuZCB3b3JkIG9mIHlvdXIgZXJyYW5kIHRyYXZlbHMgYWhlYWQgb2YgeW91IHdpdGggcmVhbCBzcGVlZC4KCkJ5IHRoZSB0aW1lIHlvdSByZWFjaCB0aGUgbWFpbiB0cmFkaW5nIGhhbGwsIHNvbWVvbmUncyBhbHJlYWR5IG1lbnRpb25lZCB5b3VyIG5hbWUgdG8gZXhhY3RseSB0aGUgcGVyc29uIHlvdSBuZWVkLg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHRyYWRpbmcgaGFsbA==', 'next' => '3_shared'],
            ],
        ],
        '2_russian' => [
            'prose'  => 'VGhlIFJ1c3NpYW4tc2lkZSBtYXJrZXQgaXMgbG91ZGVyLCBmYXN0ZXIsIGdlbnVpbmVseSBjaGFvdGljIGluIHRoZSBzcGVjaWZpYyB3YXkgb2YgcGxhY2VzIHN0aWxsIGZpZ3VyaW5nIG91dCB0aGVpciBvd24gcnVsZXMgYXMgdGhleSBnby4gWW91IGhhdmUgdG8gYXNrIHR3aWNlIGJlZm9yZSBhbnlvbmUgYWN0dWFsbHkgc3RvcHMgbG9uZyBlbm91Z2ggdG8gcHJvcGVybHkgYW5zd2VyLCBidXQgZXZlbnR1YWxseSBzb21lb25lIHBvaW50cyB5b3UsIHdpdGggcmVhbCBjZXJ0YWludHksIHRvd2FyZCB0aGUgb2xkIHRyYWRpbmcgaGFsbCBvbiB0aGUgYm9yZGVyIGl0c2VsZi4KCllvdSBhcnJpdmUgc2xpZ2h0bHkgcmF0dGxlZCBieSB0aGUgcGFjZSwgYW5kIGNvbnNpZGVyYWJseSBtb3JlIGdyYXRlZnVsIGZvciB0aGUgY2FsbWVyIGJ1aWxkaW5nIGFoZWFkLg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHRyYWRpbmcgaGFsbA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHRyYWRpbmcgaGFsbCdzIG9sZGVzdCBzdGFsbGhvbGRlciwgYSB3ZWF0aGVyZWQgd29tYW4gbmFtZWQgRG9sZ29yLCBsb29rcyB1cCBmcm9tIGhlciBsZWRnZXIgYW5kIGJyZWFrcyBpbnRvIGEgZ2VudWluZSwgZGVsaWdodGVkIGdyaW4gdGhlIG1vbWVudCB5b3UgZXhwbGFpbiB5b3VyIGVycmFuZC4gJ0F1Z3VzdGluJ3MsIHRoZW4hIEhlIGFuZCBJIHJhY2VkIGVhY2ggb3RoZXIgYWNyb3NzIGhhbGYgdGhpcyByYW5nZSBvbmNlLCB0aGlydHkgeWVhcnMgYmFjayDigJQgZnJpZW5kbHkgcml2YWxzLCBwcm9wZXIgb25lcywgdGhlIGtpbmQgd2hvIGFjdHVhbGx5IHJvb3QgZm9yIGVhY2ggb3RoZXIgdW5kZXJuZWF0aCB0aGUgY29tcGV0aW5nLicKClNoZSBwcm9kdWNlcyB0aGUgc3Bpcml0IGxldmVsIGZyb20gYSBsb2NrZWQgZHJhd2VyIHdpdGhvdXQgbXVjaCBjZXJlbW9ueS4gJ1RyYWRlZCBpdCB0byBtZSBoaW1zZWxmLCBmYWlyIGFuZCBzcXVhcmUsIGZvciBhIHJvdXRlIG1hcCBJJ2Qgc3VydmV5ZWQgYmV0dGVyIHRoYW4gaGlzLiBJJ3ZlIGtlcHQgaXQgYXMgYSB0cm9waHkgZXZlciBzaW5jZS4gWW91J2xsIGhhdmUgdG8gYWN0dWFsbHkgZWFybiBpdCBiYWNrIHByb3Blcmx5LCB0aG91Z2gg4oCUIGNhbid0IGp1c3QgaGFuZCBhIHRyb3BoeSBvdmVyIG9uIHNlbnRpbWVudCBhbG9uZS4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2hlIHdhbnRz', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RG9sZ29yIG9mZmVycyB0d28gd2F5cyB0byBlYXJuIGl0IGJhY2s6IGEgZ2VudWluZSByZW1hdGNoLCBvZiBzb3J0cyDigJQgYSBzbWFsbCwgc3BlY2lmaWMgc3VydmV5aW5nIGNoYWxsZW5nZSBzaGUgc3RpbGwgc2V0cyBmb3IgYW55b25lIHdobyBjbGFpbXMgcmVhbCBza2lsbCDigJQgb3Igc2ltcGx5IGEgZ29vZCBzdG9yeSwgcHJvcGVybHkgdG9sZCwgb2YgaG93IHRoZSByZXN0IG9mIEF1Z3VzdGluJ3MgdW5maW5pc2hlZCB3b3JrIGhhcyBnb25lIHNvIGZhciwgd2hpY2ggc2hlIGFkbWl0cyBzaGUncyBiZWVuIHF1aWV0bHkgY3VyaW91cyBhYm91dCBmb3IgZGVjYWRlcy4=',
            'choices' => [
                ['text' => 'QWNjZXB0IHRoZSBzdXJ2ZXlpbmcgY2hhbGxlbmdl', 'next' => '5_challenge'],
                ['text' => 'VGVsbCBoZXIgdGhlIHN0b3J5IHByb3Blcmx5', 'next' => '5_story'],
            ],
        ],
        '5_challenge' => [
            'prose'  => 'VGhlIGNoYWxsZW5nZSBpcyBzbWFsbCBidXQgZ2VudWluZWx5IGV4YWN0aW5nIOKAlCBhY2N1cmF0ZWx5IHRyaWFuZ3VsYXRpbmcgYSBzcGVjaWZpYyBkaXN0YW50IHBlYWsgdXNpbmcgbm90aGluZyBidXQgd2hhdCdzIGluIHRoZSBjYXNlIHNvIGZhciwgbm8gc2hvcnRjdXRzLCBjaGVja2VkIGFnYWluc3QgRG9sZ29yJ3Mgb3duIGRlY2FkZXMtcHJhY3Rpc2VkIGV5ZS4gWW91IGdldCBpdCByaWdodCBvbiB0aGUgc2Vjb25kIGF0dGVtcHQsIGNsb3NlIGVub3VnaCB0aGF0IHNoZSBub2RzIHdpdGggcmVhbCwgZ3J1ZGdpbmcgcmVzcGVjdC4KCidOb3QgYmFkLCcgc2hlIHNheXMuICdOb3QgcXVpdGUgYXMgZ29vZCBhcyBoaW0gYXQgeW91ciBhZ2UuIEJ1dCBub3QgYmFkLic=',
            'choices' => [
                ['text' => 'U2VlIGlmIGl0IHdhcyBlbm91Z2g=', 'next' => '6_shared'],
            ],
        ],
        '5_story' => [
            'prose'  => 'WW91IHRlbGwgaGVyIHRoZSB3aG9sZSBzdG9yeSBwcm9wZXJseSDigJQgdGhlIGNoYXJ0LCB0aGUgbGV0dGVyLCB0aGUgU2ltaWVuIG1vbmFzdGVyeSwgS2FyaW0ncyByZXZlbGF0aW9uIGFib3V0IE1hcmd1ZXJpdGUg4oCUIGFuZCBEb2xnb3IgbGlzdGVucyB3aXRoIHRoZSByYXB0IGF0dGVudGlvbiBvZiBzb21lb25lIGZpbmFsbHkgZ2V0dGluZyBhbiBhbnN3ZXIgdG8gYSBxdWVzdGlvbiBzaGUncyBjYXJyaWVkIGZvciB0aGlydHkgeWVhcnMgd2l0aG91dCBldmVyIGV4cGVjdGluZyBpdCByZXNvbHZlZC4KCidTbyB0aGF0J3Mgd2hhdCBoYXBwZW5lZCB0byBoaW0sJyBzaGUgc2F5cyBxdWlldGx5LCB3aGVuIHlvdSBmaW5pc2guICdJIGFsd2F5cyB3b25kZXJlZCB3aHkgaGUgc3RvcHBlZCB3cml0aW5nLic=',
            'choices' => [
                ['text' => 'U2VlIGlmIGl0IHdhcyBlbm91Z2g=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RWl0aGVyIHdheSwgRG9sZ29yIGhhbmRzIG92ZXIgdGhlIHNwaXJpdCBsZXZlbCB3aXRoIHJlYWwgd2FybXRoIHJhdGhlciB0aGFuIHJlbHVjdGFuY2UsIHRoZSBvbGQgcml2YWxyeSBhcHBhcmVudGx5IGhhdmluZyBsb25nIHNpbmNlIHNldHRsZWQgaW50byBzb21ldGhpbmcgY2xvc2VyIHRvIGdlbnVpbmUgYWZmZWN0aW9uIGZvciBhIGZyaWVuZCBzaGUgbmV2ZXIgc2F3IGFnYWluLiAnRmluaXNoIGl0IHByb3Blcmx5LCcgc2hlIHNheXMuICdGb3IgYm90aCBvZiB1cy4gSSdkIGhhdmUgbGlrZWQgdG8gc2VlIGl0IGZpbmlzaGVkIG15c2VsZiwgaG9uZXN0bHkuJwoKQ29yYmllIGV4YW1pbmVzIHRoZSBzcGlyaXQgbGV2ZWwncyBidWJibGUgd2l0aCByZWFsIHByb2Zlc3Npb25hbCBmYXNjaW5hdGlvbiwgZGVsaWdodGVkIGJ5IGl0cyB0aW55LCBwcmVjaXNlIG1vdmVtZW50LCBhbmQgaGFzIHRvIGJlIGZpcm1seSBkaXNjb3VyYWdlZCBmcm9tIGF0dGVtcHRpbmcgdG8gcmVsb2NhdGUgaXQgc29tZXdoZXJlIG1vcmUgaW50ZXJlc3Rpbmcu',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgQ29udG91ciB3aXRoIHRoZSBzcGlyaXQgbGV2ZWwgc2VjdXJlIGluIHRoZSBjYXNlLCBhIHR3ZWxmdGggcGllY2Ug4oCUIGV4YWN0bHkgaGFsZiB0aGUgd2hvbGUgaW5zdHJ1bWVudCBub3cgcHJvcGVybHkgcmVjb3ZlcmVkLCByZXBsYWNlZCwgb3IgcmVjbGFpbWVkLiBUaGUgQWx0YWkncyBnZW51aW5lbHkgcmVtb3RlIHBlYWtzIGNhdGNoIHRoZSBkYXkncyBmYWRpbmcgbGlnaHQgYXMgeW91IGxpZnQgb2ZmLCBib3JkZXIgYW5kIG1vdW50YWlucyBib3RoIGVxdWFsbHkgaW5kaWZmZXJlbnQgdG8gdGhlIGxpbmUgZHJhd24gYmV0d2VlbiB0aGVtLgoKR3JldGEsIGRvaW5nIHRoZSBjb3VudCBwcm9wZXJseSBmb3IgdGhlIGZpcnN0IHRpbWUgaW4gYSB3aGlsZSwgbG9va3MgYWxtb3N0IHN1cnByaXNlZC4gJ0hhbGZ3YXkuIFdlJ3JlIGFjdHVhbGx5IGhhbGZ3YXkgdGhlcmUuJw==',
            'choices' => [
                ['text' => 'U2F5IGl0IGZlZWxzIGxpa2UgbW9yZSB0aGFuIGhhbGZ3YXksIHNvbWVob3c=', 'next' => '8_end_more'],
                ['text' => 'SnVzdCBsZXQgdGhlIG1pbGVzdG9uZSBiZSBleGFjdGx5IHdoYXQgaXQgaXM=', 'next' => '8_end_milestone'],
            ],
        ],
        '8_end_more' => [
            'prose'  => 'J0l0IGZlZWxzIGxpa2UgbW9yZSB0aGFuIGhhbGZ3YXksIGhvbmVzdGx5LCcgeW91IHNheSwgYW5kIEdyZXRhLCBjb25zaWRlcmluZyBpdCwgbm9kcyBzbG93bHkgaW4gYWdyZWVtZW50LiAnVGhlIHBpZWNlcyBnb3QgZWFzaWVyIHRvIGZpbmQuIFRoZSBzdG9yeSBnb3QgaGFyZGVyIHRvIGNhcnJ5LiBGZWVscyBhYm91dCBldmVuLCBvdmVyYWxsLicgU2hlIHNheXMgaXQgcGxhaW5seSwgd2l0aG91dCBjb21wbGFpbnQsIGp1c3QgYW4gaG9uZXN0IGFjY291bnRpbmcgb2YgaG93IHRoZSB3aG9sZSB0cmlwJ3MgYWN0dWFsbHkgZ29uZSBzbyBmYXIuCgpJdCdzIG5vdCBhIHNtYWxsIHRoaW5nLCBoZWFyaW5nIHlvdXIgb3duIGhhbGYtZm9ybWVkIHNlbnNlIG9mIHRoZSBqb3VybmV5IGNvbmZpcm1lZCBvdXQgbG91ZCBieSBzb21lb25lIHdobydzIGJlZW4gcmlnaHQgdGhlcmUgY2FycnlpbmcgaXQgYWxvbmdzaWRlIHlvdS4=',
            'ending' => true,
        ],
        '8_end_milestone' => [
            'prose'  => 'WW91IGxldCB0aGUgbWlsZXN0b25lIGJlIGV4YWN0bHkgd2hhdCBpdCBpcyDigJQgYSBudW1iZXIsIGEgZmFjdCwgYSBnZW51aW5lIG1hcmtlciBvZiByZWFsIHByb2dyZXNzIOKAlCB3aXRob3V0IG5lZWRpbmcgdG8gbWFrZSBpdCBtZWFuIGFueXRoaW5nIGxhcmdlciB0aGFuIHRoYXQgcmlnaHQgbm93LgoKVGhlIENvbnRvdXIgY3Jvc3NlcyBiYWNrIG92ZXIgdGhlIE1vbmdvbGlhLVJ1c3NpYSBib3JkZXIgaW50byBvcGVuIHNreSwgdGhlIEFsdGFpJ3MgcmVtb3RlIHBlYWtzIHNocmlua2luZyBiZWhpbmQgeW91LCBhbmQgeW91IGZpbmQgeW91cnNlbGYsIGZvciB0aGUgZmlyc3QgdGltZSB0aGlzIHdob2xlIHRyaXAsIGFjdHVhbGx5IGxvb2tpbmcgZm9yd2FyZCB0byBjb3VudGluZyBkb3duIHRoZSBzZWNvbmQgaGFsZiByYXRoZXIgdGhhbiBzaW1wbHkgZHJlYWRpbmcgaG93IG11Y2ggZnVydGhlciB0aGVyZSBpcyB0byBnby4=',
            'ending' => true,
        ],
    ],
];
