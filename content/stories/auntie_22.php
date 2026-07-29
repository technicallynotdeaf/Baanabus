<?php
return [
    'id'    => 22,
    'title' => 'Rough Surf, Out Past Here',
    'color' => '#8A9A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'U3QgQnJhbmRvbiBpc24ndCBzbyBtdWNoIGFuIGlzbGFuZCBhcyBhIHNjYXR0ZXIgb2YgdGhlbSwgYSB3aG9sZSBzdGFyayBjaGFpbiBvZiBzYW5keSBhdG9sbHMgYW5kIHJlZWYgc3RydW5nIGFjcm9zcyBvcGVuIHdhdGVyIHdpdGggbm8gcGVybWFuZW50IHBvcHVsYXRpb24gYXQgYWxsIOKAlCBqdXN0IHNlYXNvbmFsIGZpc2hpbmcgY2FtcHMgdGhhdCBhcHBlYXIgZWFjaCB5ZWFyIGFuZCB2YW5pc2ggYWdhaW4ganVzdCBhcyBjb21wbGV0ZWx5LCB0ZW50cyBhbmQgZHJ5aW5nIHJhY2tzIHRoZSBvbmx5IHNpZ24gYW55b25lIHdhcyBldmVyIGhlcmUuCgpUd28gYXRvbGxzIHdpdGhpbiB0aGUgY2hhaW4gcHJlc2VudCB0aGVtc2VsdmVzIGFzIGxpa2VseSBsYW5kaW5nIHBvaW50cywgYm90aCBzaG93aW5nIHRoZSB0ZWxsdGFsZSBzaWducyBvZiBhbiBhY3RpdmUgY2FtcCDigJQgc21va2UsIGRyeWluZyByYWNrcywgYm9hdHMgZHJhd24gdXAgb24gdGhlIHNhbmQu',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIG5lYXJlciBhdG9sbA==', 'next' => '2_near'],
                ['text' => 'SGVhZCBmb3IgdGhlIGZ1cnRoZXIgYXRvbGw=', 'next' => '2_far'],
            ],
        ],
        '2_near' => [
            'prose'  => 'VGhlIG5lYXJlciBhdG9sbCBpcyBzbWFsbGVyLCBidXNpZXIsIG5ldHMgc3RydW5nIGJldHdlZW4gcG9sZXMgdGhlIHdob2xlIHZpc2libGUgbGVuZ3RoIG9mIHRoZSBiZWFjaCwgYSBjcmV3IG9mIGhhbGYgYSBkb3plbiB3b3JraW5nIHdpdGggdGhlIHByYWN0aXNlZCBlZmZpY2llbmN5IG9mIHBlb3BsZSB3aG8ga25vdyBleGFjdGx5IGhvdyBzaG9ydCB0aGUgZ29vZCBmaXNoaW5nIHNlYXNvbiBhY3R1YWxseSBpcy4KCk9uZSBvZiB0aGVtLCBzdW4tZGFyayBhbmQgc3F1aW50aW5nLCB3YXZlcyB5b3Ugb3ZlciB3aXRob3V0IHBhdXNpbmcgaGlzIG93biB3b3JrLiAnQ2FtcCdzIGZ1cnRoZXIgcm91bmQsIGlmIHlvdSdyZSBhZnRlciBhbnlvbmUgaW4gcGFydGljdWxhci4gQnV0IHdlIGNhbiBwb2ludCB5b3UgcmlnaHQsIGVhc2llciB0aGFuIG1vc3QuJw==',
            'choices' => [
                ['text' => 'QXNrIHRvIGJlIHBvaW50ZWQgdG93YXJkIHRoZSBtYWluIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '2_far' => [
            'prose'  => 'VGhlIGZ1cnRoZXIgYXRvbGwgdGFrZXMgbG9uZ2VyIHRvIHJlYWNoLCBsb3cgYW5kIHN0YXJrIGFuZCBlbnRpcmVseSBnaXZlbiBvdmVyIHRvIHRoZSBidXNpbmVzcyBvZiBkcnlpbmcgcmFja3MgYW5kIHNhbHQgcGFucywgZ3VsbHMgd29ya2luZyB0aGUgc2hvcmVsaW5lIGluIHJlc3RsZXNzLCBlbmRsZXNzIGNpcmN1aXRzIG92ZXIgYSBiZWFjaCB0aGF0J3MgY2xlYXJseSBmZWVkaW5nIHRoZW0gd2VsbCB0aGlzIHNlYXNvbi4KCkEgd29tYW4gbWVuZGluZyBhIG5ldCBnbGFuY2VzIHVwLCB1bmJvdGhlcmVkIGJ5IHRoZSBleHRyYSBkaXN0YW5jZSB5b3UndmUgY29tZS4gJ01haW4gY2FtcCdzIHRoZSBvdGhlciBhdG9sbCwgbW9zdGx5LCBidXQgaGFsZiBvZiB1cyBkcmlmdCBiZXR3ZWVuIGJvdGguIFlvdSdsbCBmaW5kIHdobyB5b3UgbmVlZCBlaXRoZXIgd2F5LCBwcm9iYWJseS4n',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIG1haW4gY2FtcA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgYXJyaXZlZCwgeW91IGVuZCB1cCBhdCB0aGUgc2FtZSB3b3JraW5nIGNhbXAg4oCUIGNhbnZhcyB0ZW50cywgZHJ5aW5nIHJhY2tzIGhlYXZ5IHdpdGggdGhlIHNlYXNvbidzIGNhdGNoLCB0aGUgd2hvbGUgb3BlcmF0aW9uIHJ1bm5pbmcgb24gYSByaHl0aG0gZGljdGF0ZWQgZW50aXJlbHkgYnkgdGlkZSBhbmQgd2VhdGhlciByYXRoZXIgdGhhbiBjbG9jay4gVGhlIGNyZXcncyBmb3JlbWFuLCB3ZWF0aGVyZWQgYW5kIHVuaHVycmllZCwgc2l6ZXMgeW91IHVwIHF1aWNrbHkgYW5kIGNvcnJlY3RseS4KCidBdW50aWUncyBwZW9wbGUsJyBoZSBzYXlzLCBub3QgYSBxdWVzdGlvbi4gJ1NoZSBmaXNoZWQgd2l0aCB0aGlzIGNyZXcncyBncmFuZHBhcmVudHMsIHdheSBiYWNrLiBHb29kIGhhbmRzIHRoZW4sIGdvb2QgaGFuZHMgbmVlZGVkIG5vdyDigJQgbmV0IHdvcmsgb3IgdGhlIHNhbHRpbmcgcmFja3MuIFBpY2suJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'UGljayB5b3VyIHRhc2s=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIG5ldHMgYWx3YXlzIG5lZWQgbWVuZGluZyBhZnRlciBhIGhhcmQgd2VlaydzIGZpc2hpbmcsIHBhdGllbnQga25vdC13b3JrIGFnYWluc3Qgd2VhciBhbmQgdGVhciB0aGF0IG5ldmVyIHJlYWxseSBzdG9wcywgb3IgdGhlIHJhY2tzIG5lZWQgY29uc3RhbnQgdGVuZGluZyDigJQgdHVybmluZywgc2FsdGluZywgY2hlY2tpbmcgYWdhaW5zdCB0aGUgc3VuIGFuZCB0aGUgZmxpZXMgYm90aC4gJ1doaWNoZXZlciBzdWl0cyB5b3VyIGhhbmRzLCcgdGhlIGZvcmVtYW4gc2F5cy4gJ0JvdGgga2VlcCB0aGlzIHdob2xlIHNlYXNvbiBhbGl2ZS4gTmVpdGhlcidzIGdsYW1vcm91cy4n',
            'choices' => [
                ['text' => 'TWVuZCB0aGUgZmlzaGluZyBuZXRz', 'next' => '5_nets'],
                ['text' => 'VGVuZCB0aGUgc2FsdGluZyByYWNrcw==', 'next' => '5_racks'],
            ],
        ],
        '5_nets' => [
            'prose'  => 'TWVuZGluZyBuZXQgaXMgY2xvc2UsIGNhcmVmdWwsIHJlcGV0aXRpdmUgd29yaywgZWFjaCB0b3JuIHNlY3Rpb24gcmVxdWlyaW5nIHRoZSBzYW1lIHBhdGllbnQga25vdCBvdmVyIGFuZCBvdmVyIHVudGlsIG11c2NsZSBtZW1vcnkgc3RhcnRzIGRvaW5nIG1vcmUgb2YgaXQgdGhhbiBjb25zY2lvdXMgdGhvdWdodC4gT25lIG9mIHRoZSBjcmV3IGNvcnJlY3RzIHlvdXIgdGVuc2lvbiBvbmNlLCBicmlza2x5LCB3aXRob3V0IGJyZWFraW5nIGhlciBvd24gcmh5dGhtIGF0IGFsbC4KCkJ5IHRoZSBlbmQsIHlvdXIgZmluZ2VycyBhcmUgcmF3IGluIHRoZSBzcGVjaWZpYyB3YXkgb2YgaG9uZXN0LCB1c2VmdWwgd29yaywgYW5kIHRoZSBuZXQncyB3aG9sZSB0b3JuIHNlY3Rpb24gaXMgc291bmQgYWdhaW4u',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgY29tZXMgb2YgaXQ=', 'next' => '6_shared'],
            ],
        ],
        '5_racks' => [
            'prose'  => 'VGVuZGluZyB0aGUgc2FsdGluZyByYWNrcyBpcyBob3QsIHN0ZWFkeSwgdW5nbGFtb3JvdXMgd29yaywgdHVybmluZyBhbmQgY2hlY2tpbmcgYW5kIHJlLXNhbHRpbmcgdW5kZXIgYSBzdW4gdGhhdCBkb2Vzbid0IGxldCB1cCBhbmQgZmxpZXMgdGhhdCBkb24ndCBlaXRoZXIsIHRoZSB3aG9sZSByaHl0aG0gb2YgaXQgYSBzbWFsbCBkYWlseSB3YXIgYWdhaW5zdCBzcG9pbGFnZSB0aGF0IHRoZSBjcmV3J3MgY2xlYXJseSBiZWVuIHdpbm5pbmcsIHNlYXNvbiBhZnRlciBzZWFzb24sIGZvciBhIGxvbmcgdGltZS4KCkJ5IHRoZSBlbmQsIHlvdSd2ZSBnb3QgYSBnZW51aW5lLCBoYXJkLWVhcm5lZCByZXNwZWN0IGZvciBhIGpvYiBtb3N0IHBlb3BsZSBuZXZlciB0aGluayBhYm91dCBiZXR3ZWVuIHRoZSBmaXNoIGxlYXZpbmcgdGhlIHdhdGVyIGFuZCBhcnJpdmluZyBzb21ld2hlcmUgYXMgZm9vZC4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgY29tZXMgb2YgaXQ=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIGZvcmVtYW4sIHNhdGlzZmllZCB3aXRoIHRoZSB3b3JrIGVpdGhlciB3YXksIGN1dHMgYSBsZW5ndGggb2YgcHJvcGVybHkgbWVuZGVkIG5ldCBmcmVlIGFuZCBoYW5kcyBpdCBvdmVyIOKAlCBub3QgdGhlIGZpbmVzdCBwaWVjZSwgYnV0IGEgcmVhbCwgd29ya2luZyBmcmFnbWVudCwga25vdHRlZCBieSBoYW5kcyB0aGF0IGtub3cgZXhhY3RseSB3aGF0IHRoZXkncmUgZG9pbmcuCgonWW91J2xsIHdhbnQgZ29vZCBuZXQgd2hlcmUgeW91J3JlIGhlYWRlZCBuZXh0LCcgaGUgc2F5cywgd2l0aCB0aGUgZmxhdCBjZXJ0YWludHkgb2Ygc29tZW9uZSB3aG8ncyBzcGVudCBoaXMgd2hvbGUgd29ya2luZyBsaWZlIHJlYWRpbmcgd2F0ZXIuICdSb3VnaCBzdXJmLCBvdXQgcGFzdCBoZXJlLiBUaGlzJ2xsIGhvbGQsIGlmIGl0IGNvbWVzIHRvIGl0LicgSGUgZG9lc24ndCBleHBsYWluIGZ1cnRoZXIsIGFuZCBzb21ldGhpbmcgaW4gaGlzIGZhY2Ugc3VnZ2VzdHMgaGUgZG9lc24ndCBuZWVkIHRvLg==',
            'choices' => [
                ['text' => 'VGhhbmsgdGhlIGNyZXcgYW5kIGhlYWQgYmFjaw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0byB0aGUgYW5jaG9yYWdlIHBhc3QgZHJ5aW5nIHJhY2tzIGFuZCBtZW5kZWQgbmV0cyBhbmQgdGhlIHdob2xlIHN0YXJrLCB3b3JraW5nIGJlYXV0eSBvZiBhIHBsYWNlIHRoYXQgZXhpc3RzIGZvciBleGFjdGx5IG9uZSBwdXJwb3NlIGFuZCBkb2VzIGl0IGV4dHJlbWVseSB3ZWxsLCBndWxscyB3aGVlbGluZyBvdmVyaGVhZCBpbiB0aGVpciBzYW1lIHJlc3RsZXNzIGNpcmN1aXRzIHJlZ2FyZGxlc3Mgb2YgeW91ciBsZWF2aW5nLgoKU29sYW5nZSBzdHVkaWVzIHRoZSBuZXQgZnJhZ21lbnQgd2l0aCByZWFsIHByb2Zlc3Npb25hbCByZXNwZWN0IGJlZm9yZSBzdG93aW5nIGl0IGNhcmVmdWxseS4gJ0dvb2Qga25vdCB3b3JrLCcgc2hlIHNheXMuICdXaG9ldmVyIHRhdWdodCB0aGF0IGNyZXcga25ldyB3aGF0IHRoZXkgd2VyZSBkb2luZywgYW5kIHRhdWdodCBpdCBwcm9wZXJseS4n',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc3VyZiB0aGUgZm9yZW1hbiBtZWFudA==', 'next' => '8_end_ask'],
                ['text' => 'TGV0IGhpcyB3YXJuaW5nIHN0YXkgZXhhY3RseSBhcyB2YWd1ZSBhcyBoZSBsZWZ0IGl0', 'next' => '8_end_vague'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzayBTb2xhbmdlLCBvbmNlIHlvdSdyZSBhaXJib3JuZSwgd2hldGhlciBzaGUga25vd3Mgd2hhdCBzdXJmIHRoZSBmb3JlbWFuIG1lYW50LiBTaGUgY2hlY2tzIHRoZSBjaGFydCwgdGFwcyBhIHNwb3QgYSBsaXR0bGUgZnVydGhlciBhbG9uZyB5b3VyIHJvdXRlLCBhbmQgZ29lcyBxdWlldCBmb3IgYSBtb21lbnQgaW4gYSB3YXkgdGhhdCBhbnN3ZXJzIHRoZSBxdWVzdGlvbiBiZXR0ZXIgdGhhbiB3b3JkcyB3b3VsZC4KCidUcm9tZWxpbiwnIHNoZSBzYXlzIGV2ZW50dWFsbHkuICdXZSdsbCB3YW50IHRoYXQgbmV0LiBHb29kIHRoaW5nIHNvbWVvbmUgdGhvdWdodCB0byBnaXZlIGl0IHRvIHVzIHByb3Blcmx5LCBhbmQgbm90IGp1c3QgYXMgYSBjb3VydGVzeS4n',
            'ending' => true,
        ],
        '8_end_vague' => [
            'prose'  => 'WW91IGxldCBoaXMgd2FybmluZyBzdGF5IGV4YWN0bHkgYXMgdmFndWUgYXMgaGUgbGVmdCBpdCwgZGVjaWRpbmcgc29tZSBpbmZvcm1hdGlvbiBpcyBtb3JlIHVzZWZ1bCBhcnJpdmluZyBleGFjdGx5IHdoZW4gaXQncyBuZWVkZWQgcmF0aGVyIHRoYW4gd29ycmllZCBvdmVyIGluIGFkdmFuY2UuCgpUaGUgS8WNdHVrdSBsaWZ0cyBvZmYgU3QgQnJhbmRvbidzIHNjYXR0ZXIgb2Ygc3RhcmssIHdvcmtpbmcgYXRvbGxzLCBndWxscyB0cmFpbGluZyB0aGUgd2FrZSBmb3IgYSB3aGlsZSBiZWZvcmUgcGVlbGluZyBvZmYgb25lIGJ5IG9uZSwgYW5kIHRoZSBuZXQgZnJhZ21lbnQgcmlkZXMgc2VjdXJlIGluIHRoZSBzYXRjaGVsIOKAlCBub3QgeWV0IG5lZWRlZCwgYnV0LCB5b3Ugc3VzcGVjdCwgbm90IGdvaW5nIHRvIHN0YXkgdGhhdCB3YXkgZm9yIHZlcnkgbXVjaCBsb25nZXIu',
            'ending' => true,
        ],
    ],
];
