<?php
return [
    'id'    => 7,
    'title' => 'Never Actually Wrong',
    'color' => '#B85A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'R29hJ3Mgb2xkIHF1YXJ0ZXIgbWl4ZXMgUG9ydHVndWVzZS10aWxlZCBmYWNhZGVzIHdpdGggdGhlIHNtZWxsIG9mIGEgZ2VudWluZWx5IGZ1c2VkIGN1aXNpbmUgdGhhdCdzIGhhZCBmb3VyIGNlbnR1cmllcyB0byBzZXR0bGUgaW50byBzb21ldGhpbmcgZW50aXJlbHkgaXRzIG93bi4gQnJ1bm8gaHVtcyBjaGVlcmZ1bGx5IGFzIHlvdSB3YWxrLCBjbGVhcmx5IG9uIGZhbWlsaWFyIGdyb3VuZCBoZXJlIGluIGEgd2F5IGhlIGhhc24ndCBxdWl0ZSBiZWVuIGF0IGV2ZXJ5IHByZXZpb3VzIHN0b3AuCgpUd28gd2F5cyB0b3dhcmQgdGhlIGZhbWlseSBraXRjaGVuIHByZXNlbnQgdGhlbXNlbHZlczogdGhyb3VnaCB0aGUgb2xkIHRvd24ncyBuYXJyb3csIHRpbGVkIGxhbmVzLCBvciBhbG9uZyB0aGUgc2VhZnJvbnQgcHJvbWVuYWRlLCBsb25nZXIgYnV0IGNvbnNpZGVyYWJseSBtb3JlIHNjZW5pYy4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgb2xkIHRvd24gbGFuZXM=', 'next' => '2_lanes'],
                ['text' => 'V2FsayB0aGUgc2VhZnJvbnQgcHJvbWVuYWRl', 'next' => '2_promenade'],
            ],
        ],
        '2_lanes' => [
            'prose'  => 'VGhlIG9sZCB0b3duIGxhbmVzIHdpbmQgYmV0d2VlbiBjcnVtYmxpbmcgUG9ydHVndWVzZS1lcmEgZmFjYWRlcyBhbmQgc21hbGwgZmFtaWx5LXJ1biBraXRjaGVucywgdGhlIHNtZWxsIG9mIHZpbmVnYXIgYW5kIGNoaWxpIGFuZCBzbG93LWNvb2tlZCBwb3JrIGRyaWZ0aW5nIGZyb20gb3BlbiBkb29yd2F5cyBhdCBldmVyeSB0dXJuLiBZb3UgbmF2aWdhdGUgaXQgZWFzaWx5LCBCcnVubyBjbGVhcmx5IGhhdmluZyB3YWxrZWQgdGhpcyBleGFjdCByb3V0ZSBiZWZvcmUuCgonU2hlIHVzZWQgdG8gc3RheSBqdXN0IHJvdW5kIHRoaXMgY29ybmVyLCcgaGUgbWVudGlvbnMsIHBvaW50aW5nIGF0IGEgc2h1dHRlcmVkIGd1ZXN0aG91c2UuICdXaG9sZSBtb250aCwgb25lIHllYXIuIEJlc3QgZm9vZCBvZiBoZXIgbGlmZSwgc2hlIGFsd2F5cyBzYWlkLic=',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIGtpdGNoZW4=', 'next' => '3_shared'],
            ],
        ],
        '2_promenade' => [
            'prose'  => 'VGhlIHNlYWZyb250IHByb21lbmFkZSBpcyBsb25nZXIgYnV0IGdlbnVpbmVseSBwbGVhc2FudCwgZmlzaGluZyBib2F0cyBkcmF3biB1cCBvbiB0aGUgc2FuZCBhbmQgdGhlIHdob2xlIGNvYXN0IGNhdGNoaW5nIGdvbGQgYWZ0ZXJub29uIGxpZ2h0LiBCcnVubyBwb2ludHMgb3V0IGxhbmRtYXJrcyB3aXRoIHJlYWwsIGZvbmQgZmFtaWxpYXJpdHkgdGhlIHdob2xlIHJlbGF4ZWQgd2Fsay4KCidTaGUgdXNlZCB0byB3YWxrIHRoaXMgZXhhY3Qgc3RyZXRjaCBldmVyeSBldmVuaW5nLCcgaGUgc2F5cy4gJ1NhaWQgaXQgaGVscGVkIGhlciB0aGluayB0aHJvdWdoIHdoYXRldmVyIHNoZSB3YXMgY29va2luZyB0aGF0IHdlZWsuJw==',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIGtpdGNoZW4=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGtpdGNoZW4gYmVsb25ncyB0byB0aGUgRmVybmFuZGVzIGZhbWlseSwgcnVubmluZyBhIHNtYWxsLCBiZWxvdmVkIHJlc3RhdXJhbnQgYmxlbmRpbmcgUG9ydHVndWVzZSBhbmQgS29ua2FuaSB0cmFkaXRpb25zIGZvciB0aHJlZSBnZW5lcmF0aW9ucy4gVGhlIGN1cnJlbnQgY29vaywgTWFyaWEsIGxhdWdocyB0aGUgbW9tZW50IElyaXMncyBuYW1lIGNvbWVzIHVwLiAnWW91ciBncmFuZG1vdGhlciEgU2hlIGNhbWUgaGVyZSBldmVyeSB2aXNpdCwgYWx3YXlzIGFza2VkIGZvciB0aGUgdmluZGFsb28sIGFsd2F5cyBjb21wbGFpbmVkIHRoZSB2aW5lZ2FyLWNoaWxpIGJhbGFuY2Ugd2FzIHNsaWdodGx5IHdyb25nLicKCk1hcmlhJ3MgZXllcyB0d2lua2xlLiAnSXQgd2FzIG5ldmVyIGFjdHVhbGx5IHdyb25nLiBTaGUga25ldyB0aGF0LiBJdCB3YXMgYSBqb2tlIGJldHdlZW4gdXMsIGV2ZXJ5IHNpbmdsZSB0aW1lLCBmb3IgdHdlbnR5IHllYXJzLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGFib3V0IHRoZSBqb2tlIHByb3Blcmx5', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'TWFyaWEgb2ZmZXJzIHR3byB3YXlzIHRvIGFjdHVhbGx5IGxlYXJuIHRoZSByZWFsLCBjb3JyZWN0bHktYmFsYW5jZWQgYmFzZSBwcm9wZXJseTogd29yayBhbG9uZ3NpZGUgaGVyIGluIHRoZSBraXRjaGVuIGR1cmluZyB0aGUgZGlubmVyIHJ1c2gsIGxlYXJuaW5nIHVuZGVyIHJlYWwgcHJlc3N1cmUsIG9yIHNpdCBxdWlldGx5IHRocm91Z2ggYSBzbG93LCB1bmh1cnJpZWQgYWZ0ZXJub29uIHByZXAgc2Vzc2lvbiwgbGVhcm5pbmcgYXQgYSBnZW50bGVyIHBhY2Ugd2l0aCByb29tIGZvciB0aGUgZnVsbCBzdG9yeSBiZWhpbmQgdGhlIGpva2UuCgonRWl0aGVyIGdldHMgeW91IHRoZSBhY3R1YWwgcmVjaXBlLCcgc2hlIHNheXMuICdSdXNoIG9yIHVuaHVycmllZC4gRGVwZW5kcyB3aGF0IGtpbmQgb2YgbGVzc29uIHlvdSdyZSBhZnRlciB0b2RheS4n',
            'choices' => [
                ['text' => 'TGVhcm4gZHVyaW5nIHRoZSBkaW5uZXIgcnVzaA==', 'next' => '5_rush'],
                ['text' => 'TGVhcm4gZHVyaW5nIGEgc2xvdyBwcmVwIHNlc3Npb24=', 'next' => '5_slow'],
            ],
        ],
        '5_rush' => [
            'prose'  => 'TGVhcm5pbmcgZHVyaW5nIGRpbm5lciBydXNoIGlzIGdlbnVpbmVseSBjaGFvdGljLCBvcmRlcnMgc3RhY2tpbmcgdXAgd2hpbGUgTWFyaWEgdGFsa3MgeW91IHRocm91Z2ggdGhlIHZpbmVnYXItY2hpbGkgYmFzZSBiZXR3ZWVuIGEgZG96ZW4gb3RoZXIgc2ltdWx0YW5lb3VzIHRhc2tzLCBoZXIgaGFuZHMgbmV2ZXIgb25jZSBzbG93aW5nIGRvd24uIFNvbWVob3csIHlvdSBhY3R1YWxseSBhYnNvcmIgaXQsIGFkcmVuYWxpbmUgc2hhcnBlbmluZyB5b3VyIGF0dGVudGlvbiByYXRoZXIgdGhhbiBzY2F0dGVyaW5nIGl0LgoKQnkgdGhlIGVuZCBvZiBzZXJ2aWNlLCBleGhhdXN0ZWQsIHlvdSd2ZSBnb3QgdGhlIGJhbGFuY2UgcHJvcGVybHkgZG93bi4=',
            'choices' => [
                ['text' => 'SGVhciB0aGUgZnVsbCBzdG9yeSBvZiB0aGUgam9rZQ==', 'next' => '6_shared'],
            ],
        ],
        '5_slow' => [
            'prose'  => 'TGVhcm5pbmcgZHVyaW5nIGEgc2xvdyBwcmVwIHNlc3Npb24gaXMgdW5odXJyaWVkLCB0aG9yb3VnaCwgTWFyaWEgd2Fsa2luZyB5b3UgY2FyZWZ1bGx5IHRocm91Z2ggZWFjaCBpbmdyZWRpZW50J3MgZXhhY3Qgcm9sZSBpbiB0aGUgYmFsYW5jZSwgcGxlbnR5IG9mIHJvb20gZm9yIHF1ZXN0aW9ucyBhbmQgc2Vjb25kIGF0dGVtcHRzLiBJdCdzIGEgZ2VudGxlciBsZXNzb24sIGJ1dCBubyBsZXNzIHRob3JvdWdoIGZvciBpdC4KCkJ5IHRoZSBlbmQgb2YgdGhlIGFmdGVybm9vbiwgeW91J3ZlIGdvdCB0aGUgYmFsYW5jZSBwcm9wZXJseSBkb3duLg==',
            'choices' => [
                ['text' => 'SGVhciB0aGUgZnVsbCBzdG9yeSBvZiB0aGUgam9rZQ==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J1RoZSBqb2tlLCcgTWFyaWEgc2F5cywgZmluYWxseSwgc2V0dGxpbmcgaW4gd2l0aCByZWFsIGZvbmRuZXNzLCAnd2FzIHRoYXQgeW91ciBncmFuZG1vdGhlciBhbHdheXMgY2xhaW1lZCBJJ2QgZ290dGVuIGl0IHdyb25nLCBldmVyeSBzaW5nbGUgdmlzaXQsIHR3ZW50eSB5ZWFycyBydW5uaW5nIOKAlCBhbmQgSSBhbHdheXMgcGxheWVkIGFsb25nLCBhcG9sb2dpc2luZywgcHJvbWlzaW5nIHRvIGZpeCBpdCBuZXh0IHRpbWUuIE5laXRoZXIgb2YgdXMgZXZlciBhZG1pdHRlZCB0aGUgdHJ1dGg6IGl0IHdhcyBwZXJmZWN0IGV2ZXJ5IHRpbWUuIFNoZSBqdXN0IGxpa2VkIGhhdmluZyBhIHJlYXNvbiB0byBjb21lIGJhY2sgYW5kIGNoZWNrLicKClNoZSBzbWlsZXMuICdCZXN0IGV4Y3VzZSBmb3IgYSBmcmllbmRzaGlwIEkndmUgZXZlciBoZWFyZC4gV2Fzbid0IHJlYWxseSBhYm91dCB0aGUgdmluZWdhciBhdCBhbGwuJw==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgcHJvcGVybHkgYmFsYW5jZWQgYmFzZSBhbmQgc3RhcnQgYmFjaw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0aHJvdWdoIEdvYSdzIG9sZCBxdWFydGVyIHdpdGggdGhlIHZpbmVnYXItY2hpbGkgYmFzZSBzZWN1cmUgaW4gaXRzIHNlYWxlZCBqYXIsIHRoZSBkYXkncyBnZW50bGUgcmV2ZWxhdGlvbiBzZXR0bGluZyBpbiBhbG9uZ3NpZGUgdGhlIHJlY2lwZSBpdHNlbGYg4oCUIGEgdHdlbnR5LXllYXIgam9rZSB0aGF0IHdhcyBuZXZlciByZWFsbHkgYWJvdXQgdGhlIGZvb2QgYXQgYWxsLgoKQnJ1bm8sIGhlYXJpbmcgdGhlIGZ1bGwgc3RvcnkgZm9yIHRoZSBmaXJzdCB0aW1lLCBsb29rcyBnZW51aW5lbHkgbW92ZWQuICdEaWRuJ3Qga25vdyB0aGF0IG9uZS4gU2hlIGtlcHQgc29tZSB0aGluZ3MgY2xvc2UsIGV2ZW4gZnJvbSBtZS4n',
            'choices' => [
                ['text' => 'U2F5IHNvbWUgam9rZXMgYXJlIGFjdHVhbGx5IGxvdmUgbGV0dGVycw==', 'next' => '8_end_love'],
                ['text' => 'U2F5IHlvdSdyZSBnbGFkIHlvdSBnb3QgdG8gaGVhciBpdCBwcm9wZXJseQ==', 'next' => '8_end_glad'],
            ],
        ],
        '8_end_love' => [
            'prose'  => 'J1NvbWUgam9rZXMgYXJlIGFjdHVhbGx5IGxvdmUgbGV0dGVycywgSSB0aGluaywnIHlvdSBzYXksIHR1cm5pbmcgdGhlIHNlYWxlZCBqYXIgb3ZlciBpbiB5b3VyIGhhbmRzLiAnQSByZWFzb24gdG8ga2VlcCBjb21pbmcgYmFjaywgZHJlc3NlZCB1cCBhcyBzb21ldGhpbmcgc21hbGwgYW5kIHNpbGx5IGluc3RlYWQuJwoKQnJ1bm8gbm9kcyBzbG93bHksIGdlbnVpbmVseSBhZmZlY3RlZC4gJ1RoYXQncyBleGFjdGx5IHdoYXQgaXQgd2FzLiBXaXNoIEknZCBrbm93biB0byB0ZWxsIGhlciBJIHVuZGVyc3Rvb2QsIGJlZm9yZSBzaGUgd2FzIGdvbmUuJw==',
            'ending' => true,
        ],
        '8_end_glad' => [
            'prose'  => 'J0knbSBob25lc3RseSBqdXN0IGdsYWQgSSBnb3QgdG8gaGVhciBpdCBwcm9wZXJseSwnIHlvdSBzYXksIHRoaW5raW5nIG9mIHR3ZW50eSB5ZWFycyBvZiBhIHJ1bm5pbmcgam9rZSBuZWl0aGVyIHdvbWFuIGV2ZXIgYWN0dWFsbHkgYnJva2UuICdGZWVscyBsaWtlIGEgcmVhbCBwaWVjZSBvZiBoZXIsIGdldHRpbmcgdG8ga25vdyB0aGF0LicKCkJydW5vIGFncmVlcyBxdWlldGx5LiAnVGhhdCdzIHdoYXQgdGhpcyB3aG9sZSB0cmlwIGtlZXBzIHR1cm5pbmcgb3V0IHRvIGFjdHVhbGx5IGJlIGFib3V0LCBpc24ndCBpdC4gTm90IGp1c3QgdGhlIHNwaWNlcy4gVGhlIHBpZWNlcyBvZiBoZXIgd2UncmUgZmluZGluZyBhbG9uZyB3aXRoIHRoZW0uJw==',
            'ending' => true,
        ],
    ],
];
