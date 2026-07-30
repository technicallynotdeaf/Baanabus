<?php
return [
    'id'    => 11,
    'title' => 'Wisdom or Simply Weakness',
    'color' => '#6A5A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QmFnaGRhZCByaXNlcyBhbG9uZyB0aGUgVGlncmlzLCBhIGNpdHkgd2hvc2UgaGlzdG9yeSBhcyBhIGNlbnRlciBvZiBsZWFybmluZyBzdHJldGNoZXMgYmFjayBjZW50dXJpZXMsIHNtYWxsIHByaXZhdGUgbGlicmFyaWVzIGFuZCBhcmNoaXZlcyBzdGlsbCB0dWNrZWQgdGhyb3VnaG91dCBpdHMgb2xkZXIgcXVhcnRlcnMsIHRlbmRlZCBieSBzY2hvbGFycyB3aG8gdHJlYXQgb2xkIG1hbnVzY3JpcHRzIHdpdGggdGhlIHNhbWUgc2VyaW91c25lc3MgdGhlaXIgcHJlZGVjZXNzb3JzIGFsd2F5cyBkaWQuIFRvbWFzIG1lbnRpb25zLCByZXNwZWN0ZnVsbHksIHRoYXQgdGhpcyBjaXR5IGhhcyBmb3Jnb3R0ZW4gbW9yZSBzY2hvbGFyc2hpcCB0aGFuIG1vc3QgcGxhY2VzIGV2ZXIgbGVhcm4uCgpUd28gd2F5cyB0b3dhcmQgdGhlIHNjaG9sYXItbGlicmFyaWFuJ3MgYXJjaGl2ZSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIG9sZCBxdWFydGVyJ3MgcXVpZXQgcmVzaWRlbnRpYWwgc3RyZWV0cywgb3IgYWxvbmcgdGhlIHJpdmVyZnJvbnQsIGJ1c2llciwgbW9yZSBkaXJlY3Qu',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgb2xkIHF1YXJ0ZXI=', 'next' => '2_quarter'],
                ['text' => 'Rm9sbG93IHRoZSByaXZlcmZyb250', 'next' => '2_river'],
            ],
        ],
        '2_quarter' => [
            'prose'  => 'VGhlIG9sZCBxdWFydGVyJ3MgcXVpZXQgc3RyZWV0cyB3aW5kIHBhc3QgYnVpbGRpbmdzIHdob3NlIGFnZSBpcyBvbmx5IGFwcGFyZW50IHVwIGNsb3NlLCBjb3VydHlhcmQgZG9vcnMgb3BlbmluZyBvY2Nhc2lvbmFsbHkgb250byBnbGltcHNlcyBvZiBwcml2YXRlIGdhcmRlbnMgYW5kIG9sZGVyLCBjYXJlZnVsIHdheXMgb2YgbGl2aW5nLiBJdCdzIGEgc2xvdywgY29udGVtcGxhdGl2ZSB3YWxrLCBnaXZpbmcgeW91IHJlYWwgdGltZSB0byBwcm9wZXJseSBzZXR0bGUgeW91ciB0aG91Z2h0cyBiZWZvcmUgdGhlIGNvbWluZyB0ZXN0LgoKWW91IGFycml2ZSBhdCB0aGUgYXJjaGl2ZSBjYWxtLCBhbmQgY29uc2lkZXJhYmx5IG1vcmUgcHJlcGFyZWQgdGhhbiBhIHJ1c2hlZCBhcHByb2FjaCB3b3VsZCBoYXZlIGxlZnQgeW91Lg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGFyY2hpdmU=', 'next' => '3_shared'],
            ],
        ],
        '2_river' => [
            'prose'  => 'VGhlIHJpdmVyZnJvbnQgcm91dGUgaXMgYnVzaWVyLCBmYXN0ZXIsIHRoZSBUaWdyaXMgaXRzZWxmIGEgY29uc3RhbnQsIHN0ZWFkeSBwcmVzZW5jZSBhbG9uZ3NpZGUgdGhlIHBhdGgsIGJvYXRzIGFuZCBmb290IHRyYWZmaWMgbW92aW5nIHdpdGggdGhlIHBhcnRpY3VsYXIgdW5odXJyaWVkIHB1cnBvc2Ugb2YgYSBjaXR5IHRoYXQncyBiZWVuIGRvaW5nIGV4YWN0bHkgdGhpcyBmb3IgYSB2ZXJ5IGxvbmcgdGltZS4KCllvdSBhcnJpdmUgYXQgdGhlIGFyY2hpdmUgc2xpZ2h0bHkgcnVzaGVkLCBhbmQgY29uc2lkZXJhYmx5IG1vcmUgYXdhcmUgb2YgdGhlIGNpdHkncyBsaXZpbmcsIHdvcmtpbmcgcHJlc2VudCBhbG9uZ3NpZGUgaXRzIGRlZXAgaGlzdG9yeS4=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGFyY2hpdmU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHNjaG9sYXItbGlicmFyaWFuLCBEci4gQWwtUmFzaGlkLCBleGFtaW5lcyB5b3VyIGNyZWRlbnRpYWxzIOKAlCB0aGUgbGV0dGVyLCB0aGUgd2VkZ2VzLCBZc29sZGUncyBuYW1lIHJlcGVhdGVkIGF0IGV2ZXJ5IHN0b3Ag4oCUIHdpdGggcmVhbCwgY2FyZWZ1bCBza2VwdGljaXNtLiAnTmFtZXMgYXJlIGVhc3kgdG8gY2xhaW0sJyBzaGUgc2F5cy4gJ0hhbmR3cml0aW5nIGlzIG5vdCBzbyBlYXNpbHkgZmFrZWQuIEkgaGF2ZSBhIGZyYWdtZW50IG9mIGhlciBvd24gY29ycmVzcG9uZGVuY2UgaGVyZSwgd2F0ZXItZGFtYWdlZCwgZGlmZmljdWx0LiBJZiB5b3UgY2FuIHByb3Blcmx5IHRyYW5zY3JpYmUgaXQsIEknbGwga25vdyB5b3UncmUgbm90IHNpbXBseSBjYXJyeWluZyBoZXIgbmFtZSBsaWtlIGEgYm9ycm93ZWQgY29hdC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWNjZXB0IHRoZSB0ZXN0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGZyYWdtZW50IGlzIGdlbnVpbmVseSBkaWZmaWN1bHQg4oCUIGluayBmYWRlZCwgcGFwZXIgd2F0ZXItc3RhaW5lZCwgd2hvbGUgd29yZHMgb2JzY3VyZWQgZW50aXJlbHkgaW4gcGxhY2VzLiBEci4gQWwtUmFzaGlkIG9mZmVycyB0d28gYXBwcm9hY2hlczogd29yayB0aHJvdWdoIGl0IG1ldGhvZGljYWxseSwgbGV0dGVyIGJ5IGxldHRlciwgY3Jvc3MtcmVmZXJlbmNpbmcgYWdhaW5zdCBvdGhlciBzYW1wbGVzIG9mIFlzb2xkZSdzIGhhbmQgeW91J3ZlIGNvbGxlY3RlZCBhbG9uZyB0aGUgd2F5LCBvciByZWFkIGl0IG1vcmUgaW50dWl0aXZlbHksIHRydXN0aW5nIGNvbnRleHQgYW5kIHRoZSB2b2ljZSB5b3UndmUgY29tZSB0byByZWNvZ25pc2UgYWNyb3NzIHNvIG1hbnkgb3RoZXIgbGV0dGVycyB0byBmaWxsIHRoZSBnZW51aW5lIGdhcHMuCgonRWl0aGVyIGNhbiB3b3JrLCcgc2hlIHNheXMuICdTY2hvbGFyc2hpcCBuZWVkcyBib3RoIGtpbmRzIG9mIHJlYWRpbmcsIHByb3Blcmx5IGJhbGFuY2VkLic=',
            'choices' => [
                ['text' => 'V29yayB0aHJvdWdoIGl0IG1ldGhvZGljYWxseQ==', 'next' => '5_methodical'],
                ['text' => 'UmVhZCBpdCBieSBmZWVsIGFuZCBjb250ZXh0', 'next' => '5_intuitive'],
            ],
        ],
        '5_methodical' => [
            'prose'  => 'WW91IHdvcmsgdGhyb3VnaCBpdCBsZXR0ZXIgYnkgbGV0dGVyLCBjcm9zcy1yZWZlcmVuY2luZyBhZ2FpbnN0IFJhaGltaSdzIGxldHRlciBhbmQgdGhlIGxlZGdlciBlbnRyaWVzIGZyb20gVGFicml6LCBwYWluc3Rha2luZ2x5IHJlY29uc3RydWN0aW5nIGVhY2ggb2JzY3VyZWQgd29yZCB0aHJvdWdoIGNhcmVmdWwgY29tcGFyaXNvbiByYXRoZXIgdGhhbiBndWVzc3dvcmsuIEl0J3Mgc2xvdywgZXhhY3Rpbmcgd29yaywgYnV0IGdlbnVpbmVseSByZWxpYWJsZS4KCkRyLiBBbC1SYXNoaWQgY2hlY2tzIHlvdXIgdHJhbnNjcmlwdGlvbiBhZ2FpbnN0IGhlciBvd24gY2FyZWZ1bCBub3Rlcywgbm9kZGluZyBzbG93bHkgYXQgaXRzIGFjY3VyYWN5Lg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIGZyYWdtZW50IHNheXM=', 'next' => '6_shared'],
            ],
        ],
        '5_intuitive' => [
            'prose'  => 'WW91IHJlYWQgaXQgbW9yZSBieSBmZWVsLCB0cnVzdGluZyB0aGUgc3BlY2lmaWMgY2FkZW5jZSBhbmQgdm9pY2UgeW91J3ZlIGNvbWUgdG8gcmVjb2duaXNlIGFjcm9zcyBldmVyeSBsZXR0ZXIgYW5kIGFjY291bnQgdGhpcyB3aG9sZSBqb3VybmV5IGhhcyB0dXJuZWQgdXAsIGZpbGxpbmcgdGhlIGdlbnVpbmUgZ2FwcyB3aXRoIGluZm9ybWVkLCBjYXJlZnVsIGludHVpdGlvbiByYXRoZXIgdGhhbiBwdXJlIG1lY2hhbmljYWwgcmVjb25zdHJ1Y3Rpb24uCgpEci4gQWwtUmFzaGlkIGNoZWNrcyB5b3VyIHRyYW5zY3JpcHRpb24gYWdhaW5zdCBoZXIgb3duIGNhcmVmdWwgbm90ZXMsIG5vZGRpbmcgc2xvd2x5LCBnZW51aW5lbHkgaW1wcmVzc2VkIGJ5IGhvdyBjbG9zZSB5b3VyIGluc3RpbmN0IGxhbmRlZC4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIGZyYWdtZW50IHNheXM=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIGNvbXBsZXRlZCBmcmFnbWVudCwgd2hpY2hldmVyIHdheSB5b3UgcmVjb25zdHJ1Y3RlZCBpdCwgdHVybnMgb3V0IHRvIGJlIGEgcHJpdmF0ZSBhc2lkZSBpbiBvbmUgb2YgWXNvbGRlJ3MgbGV0dGVycywgbmV2ZXIgbWVhbnQgZm9yIHRoZSByZWNpcGllbnQncyBleWVzIGF0IGFsbCDigJQgYSBicmllZiwgaG9uZXN0IGFkbWlzc2lvbiB0aGF0IHNoZSBzb21ldGltZXMgZG91YnRlZCB3aGV0aGVyIGhlciBnZW5lcm9zaXR5IHdhcyB3aXNkb20gb3Igc2ltcGx5IHdlYWtuZXNzIGRyZXNzZWQgdXAgYXMgdmlydHVlLCBhbmQgYSBxdWlldCByZXNvbHZlLCByZWdhcmRsZXNzLCB0byBrZWVwIGNob29zaW5nIGl0IGFueXdheS4KCidTaGUgZG91YnRlZCBoZXJzZWxmLCcgRHIuIEFsLVJhc2hpZCBzYXlzIHNvZnRseS4gJ1NhbWUgYXMgYW55b25lIGdlbnVpbmVseSBnb29kIGV2ZW50dWFsbHkgZG9lcy4gRG9lc24ndCBtZWFuIHNoZSB3YXMgd3JvbmcuIEp1c3QgbWVhbnMgc2hlIHdhcyBob25lc3Qgd2l0aCBoZXJzZWxmIGFib3V0IHRoZSBjb3N0Lic=',
            'choices' => [
                ['text' => 'U2l0IHdpdGggd2hhdCB5b3UndmUgcmVhZA==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGxlYXZlIHRoZSBhcmNoaXZlIHdpdGggdGhlIHRyYW5zY3JpcHRpb24gY2FyZWZ1bGx5IGNvcGllZCBpbnRvIHlvdXIgb3duIG5vdGVzIOKAlCBubyBwaHlzaWNhbCBvYmplY3QsIGJ1dCBzb21ldGhpbmcgdGhhdCBmZWVscywgc29tZWhvdywganVzdCBhcyByZWFsIGFzIGFueSBvZiB0aGUgd2VkZ2VzIHlvdSd2ZSBjb2xsZWN0ZWQgc28gZmFyLCBZc29sZGUncyBwcml2YXRlIHVuY2VydGFpbnR5IG5vdyBwcm9wZXJseSwgcGVybWFuZW50bHkgcHJlc2VydmVkIHJhdGhlciB0aGFuIGxlZnQgdG8gZmFkZSBlbnRpcmVseSB3aXRoIHRoZSB3YXRlci1kYW1hZ2VkIG9yaWdpbmFsLgoKVG9tYXMsIHRvbGQgYWJvdXQgdGhlIGZyYWdtZW50LCBsb29rcyB0aG91Z2h0ZnVsLiAnR29vZCwga25vd2luZyBzaGUgZG91YnRlZCBzb21ldGltZXMuIE1ha2VzIHRoZSBjaG9vc2luZyBtYXR0ZXIgbW9yZSwgc29tZWhvdywgcmF0aGVyIHRoYW4gbGVzcy4n',
            'choices' => [
                ['text' => 'QWdyZWUsIGFuZCBzYXkgaXQgbWFrZXMgeW91IHRydXN0IGhlciBtb3Jl', 'next' => '8_end_trust'],
                ['text' => 'U2F5IHRoZSBkb3VidCBtYWtlcyB0aGUgd2hvbGUgc3RvcnkgZmVlbCBoZWF2aWVyIG5vdw==', 'next' => '8_end_heavier'],
            ],
        ],
        '8_end_trust' => [
            'prose'  => 'J0kgYWdyZWUsJyB5b3Ugc2F5LCAnYW5kIGhvbmVzdGx5LCBpdCBtYWtlcyBtZSB0cnVzdCBoZXIgbW9yZSwgbm90IGxlc3MuIEFueW9uZSBjYW4gYmUgY2VydGFpbiBmcm9tIHRoZSBvdXRzaWRlLiBDaG9vc2luZyBnZW5lcm9zaXR5IGFueXdheSwgZGVzcGl0ZSByZWFsIGRvdWJ0IGFib3V0IHdoZXRoZXIgaXQncyBhY3R1YWxseSB3aXNkb20g4oCUIHRoYXQncyBhIGhhcmRlciwgbW9yZSBob25lc3Qga2luZCBvZiBnb29kbmVzcy4nCgpUb21hcyBub2RzLCBzYXRpc2ZpZWQuICdUaGF0J3MgZXhhY3RseSByaWdodC4gQ2VydGFpbnR5J3MgY2hlYXAuIERvdWJ0LCBjaG9zZW4gdGhyb3VnaCBhbnl3YXksIGlzIHdvcnRoIGNvbnNpZGVyYWJseSBtb3JlLic=',
            'ending' => true,
        ],
        '8_end_heavier' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBtYWtlcyB0aGUgd2hvbGUgc3RvcnkgZmVlbCBoZWF2aWVyIG5vdywnIHlvdSBhZG1pdCwgd2F0Y2hpbmcgdGhlIFRpZ3JpcyBmbG93IHBhc3QgYXMgeW91IGxlYXZlIHRoZSBvbGQgcXVhcnRlciBiZWhpbmQuICdLbm93aW5nIHNoZSB3YXNuJ3QgY2VydGFpbi4gS25vd2luZyBzaGUgZGlkIGl0IGFueXdheSwgdW5jZXJ0YWluLCB0aGUgd2hvbGUgdGltZS4nCgpUb21hcyBkb2Vzbid0IHRyeSB0byBsaWdodGVuIHRoZSBmZWVsaW5nLiAnSGVhdmllcidzIGZhaXIuIFNvbWUgdGhpbmdzIHNob3VsZCB3ZWlnaCBzb21ldGhpbmcuIERvZXNuJ3QgbWVhbiB5b3UncmUgY2FycnlpbmcgaXQgd3JvbmcuJw==',
            'ending' => true,
        ],
    ],
];
