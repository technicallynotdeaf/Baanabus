<?php
return [
    'id'    => 7,
    'title' => 'The Weight of the Adze',
    'color' => '#6A7A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'V2FsbGlzIHJpc2VzIGxvdyBhbmQgZ3JlZW4gYXJvdW5kIGEgbGFnb29uIHNvIHN0aWxsIGl0IGxvb2tzIHBvdXJlZCByYXRoZXIgdGhhbiBmaWxsZWQsIGNodXJjaCBzcGlyZXMgYW5kIHRoYXRjaGVkIHJvb2ZzIHNoYXJpbmcgdGhlIHNreWxpbmUgdGhlIHdheSB0aGV5IHNlZW0gdG8gZXZlcnl3aGVyZSBpbiB0aGlzIHBhcnQgb2YgdGhlIG9jZWFuIOKAlCBvbGQgYW5kIG5ldyBoYXZpbmcgbG9uZyBzaW5jZSBzdG9wcGVkIGFyZ3VpbmcgYWJvdXQgd2hpY2ggY2FtZSBmaXJzdC4KClNvbGFuZ2UsIHVudXN1YWxseSB0YWxrYXRpdmUgb24gdGhlIGFwcHJvYWNoLCBtZW50aW9ucyBzaGUncyBiZWVuIGhlcmUgYmVmb3JlLCB5ZWFycyBiYWNrLCBhbmQga25vd3MgYSBmYW1pbHkgbmVhciB0aGUgbGFnb29uIHdobyBtaWdodCBzbW9vdGggdGhlIGludHJvZHVjdGlvbnMuIFRoZSBmb3JtYWwgcm91dGUgcnVucyBzdHJhaWdodCB0aHJvdWdoIE1hdGEgVXR1IGFuZCB0aGUga2luZydzIGNvdXJ0IGluc3RlYWQg4oCUIHNsb3dlciwgYnV0IGl0J3MgaG93IHRoaW5ncyBhcmUgcHJvcGVybHkgZG9uZSBoZXJlLCBhbmQgU29sYW5nZSwgd2hvIGN1dCBoZXIgdGVldGggb24gJ3Byb3Blcmx5IGRvbmUsJyBjbGVhcmx5IHJhdGVzIGl0LgoKVHdvIHdheXMgdG8gb3BlbiB0aGUgdmlzaXQgcHJlc2VudCB0aGVtc2VsdmVzOiB0aHJvdWdoIFNvbGFuZ2UncyBvbGQgYWNxdWFpbnRhbmNlLCBvciB0aHJvdWdoIHRoZSBmcm9udCBkb29yIGF0IE1hdGEgVXR1Lg==',
            'choices' => [
                ['text' => 'R28gYnkgd2F5IG9mIFNvbGFuZ2UncyBvbGQgZnJpZW5k', 'next' => '2_kinship'],
                ['text' => 'UHJlc2VudCB5b3Vyc2VsdmVzIGF0IE1hdGEgVXR1', 'next' => '2_formal'],
            ],
        ],
        '2_formal' => [
            'prose'  => 'TWF0YSBVdHUncyBhIHNtYWxsLCB0aWR5IHRvd24gYnVpbHQgYXJvdW5kIGl0cyBjaHVyY2ggYW5kIGl0cyBwYWxhY2UgaW4gcm91Z2hseSBlcXVhbCBtZWFzdXJlLCBhbmQgdGhlIGZvcm1hbCByb3V0ZSB0dXJucyBvdXQgdG8gbWVhbiBleGFjdGx5IHdoYXQgaXQgc291bmRzIGxpa2U6IGEgd2FpdCwgYSBzZXJpZXMgb2YgcXVpZXQgaW50cm9kdWN0aW9ucyB0aHJvdWdoIHBlb3BsZSB3aG9zZSBqb2IgaXMga25vd2luZyB3aG8gdGFsa3MgdG8gd2hvbSwgYW5kIGV2ZW50dWFsbHkgYSBub2QgdGhhdCBtZWFucyB5b3UgbWF5IHByb2NlZWQuCgpOb2JvZHkncyB1bmZyaWVuZGx5IGFib3V0IGl0LiBJZiBhbnl0aGluZywgdGhlIHdob2xlIHByb2NlZHVyZSBoYXMgdGhlIHVuaHVycmllZCBjb3VydGVzeSBvZiBwZW9wbGUgd2hvJ3ZlIGRvbmUgdGhpcyBleGFjdCBkYW5jZSBmb3IgY2VudHVyaWVzIGFuZCBzZWUgbm8gcmVhc29uIHRvIHJ1c2ggaXQgbm93IGZvciB5b3UuCgpCeSB0aGUgdGltZSB5b3UncmUgdGhyb3VnaCwgc29tZW9uZSdzIGFscmVhZHkgc2VudCB3b3JkIGFoZWFkIOKAlCB5b3UncmUgZXhwZWN0ZWQsIGFwcGFyZW50bHksIGF0IGEgd29ya3Nob3AgbmVhciB0aGUgbGFnb29uJ3MgZWRnZSwga2VwdCBieSBhIG1hbiBldmVyeW9uZSByZWZlcnMgdG8gb25seSBhcyB0aGUgY3VzdG9tLWhvbGRlci4=',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHdvcmtzaG9w', 'next' => '3_shared'],
            ],
        ],
        '2_kinship' => [
            'prose'  => 'U29sYW5nZSdzIG9sZCBhY3F1YWludGFuY2UgdHVybnMgb3V0IHRvIGJlIGFuIGVudGlyZSBleHRlbmRlZCBmYW1pbHksIGRlbGlnaHRlZCB0byBzZWUgaGVyIGFuZCBtaWxkbHkgc2NhbmRhbGlzZWQgYXQgaG93IGxvbmcgaXQncyBiZWVuLiBZb3UncmUgZmVkIGJlZm9yZSB5b3UncmUgcXVlc3Rpb25lZCwgd2hpY2ggc2VlbXMgdG8gYmUgdGhlIGxvY2FsIG9yZGVyIG9mIG9wZXJhdGlvbnMgcmVnYXJkbGVzcyBvZiBob3cgb2ZmaWNpYWwgeW91ciBidXNpbmVzcyBpcy4KCk9uY2UgdGhlIG1lYWwncyBjbGVhcmVkLCB0aGUgZmFtaWx5IG1hdHJpYXJjaCBsaXN0ZW5zIHRvIHlvdXIgZXJyYW5kIHdpdGggcmVhbCBhdHRlbnRpb24sIHRoZW4gc2ltcGx5IHBpY2tzIHVwIGEgaGFuZCBsaW5lIOKAlCB0aGUga2luZCBmaXNoZXJtZW4gdXNlIHRvIHJlYWNoIHRoZSBuZXh0IGlzbGV0IG92ZXIg4oCUIGFuZCBtYWtlcyBhIGNhbGwgbm9ib2R5IHF1aXRlIGV4cGxhaW5zLiAnWW91J2xsIHdhbnQgdGhlIGN1c3RvbS1ob2xkZXIsJyBzaGUgc2F5cyBhZnRlcndhcmQuICdIZSdzIGV4cGVjdGluZyBzb21lb25lLiBNaWdodCBhcyB3ZWxsIGJlIHlvdS4n',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHdvcmtzaG9w', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgYXJyaXZlZCwgeW91IGVuZCB1cCBhdCB0aGUgc2FtZSBsb3cgd29ya3Nob3AgYWJvdmUgdGhlIGxhZ29vbiwgaXRzIGZsb29yIGdyZXkgd2l0aCBiYXNhbHQgZHVzdCBhbmQgaXRzIHdhbGxzIGh1bmcgd2l0aCB0b29scyB0aGF0IGhhdmUgY2xlYXJseSBvdXRsaXZlZCBzZXZlcmFsIG93bmVycy4gVGhlIGN1c3RvbS1ob2xkZXIgaXMgb2xkLCBzcGFyZSwgYW5kIGVudGlyZWx5IHVuaW50ZXJlc3RlZCBpbiBzbWFsbCB0YWxrIOKAlCBoZSdzIG1pZHdheSB0aHJvdWdoIGZpdHRpbmcgYSBzdG9uZSBibGFkZSB0byBhIGhhZnQgYW5kIGRvZXNuJ3Qgc3RvcCB3aGVuIHlvdSBhcnJpdmUsIG9ubHkgZ2xhbmNlcyB1cCBsb25nIGVub3VnaCB0byBjb25maXJtIHlvdSdyZSB3aG8gaGUgd2FzIHRvbGQgdG8gZXhwZWN0LgoKJ1NpdCwnIGhlIHNheXMsIG1lYW5pbmcgdGhlIGZsb29yLCBtZWFuaW5nIG5vdy4gJ1RoaXMgY2FuIHdhaXQgZm9yIHlvdS4gSXQgY2FuJ3Qgd2FpdCBmb3IgaXRzZWxmLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2l0IGFuZCB3YXRjaCBoaW0gd29yaw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SGUgZXhwbGFpbnMsIHdpdGhvdXQgc2xvd2luZyBoaXMgaGFuZHMsIHRoYXQgdGhlIGJsYWRlIHlvdSd2ZSBjb21lIGZvciBpc24ndCBmaW5pc2hlZCDigJQgdGhlIHN0b25lJ3Mgc2hhcGVkLCBidXQgaXQgd2FudHMgYSBwcm9wZXIgaGFmdCwgYW5kIGEgcHJvcGVyIGhhZnQgd2FudHMgZWl0aGVyIHJlYWwgd29yayBvciBhIHJlYWwgb2NjYXNpb24sIGhpcyBjaG9pY2UgZGVwZW5kaW5nIG9uIHdoaWNoIHlvdSdkIHJhdGhlciBnaXZlIGhpbS4KCidIZWxwIG1lIGZpbmlzaCB0aGUgYmluZGluZywnIGhlIHNheXMsICdvciBjb21lIHRvIHRoZSBrYXZhIHRoaXMgZXZlbmluZyBhbmQgZHJpbmsgaXQgcHJvcGVybHksIHRoZSB3YXkgaXQncyBtZWFudCB0byBiZSBkcnVuaywgYW5kIEknbGwgZmluaXNoIGl0IG15c2VsZiB3aGlsZSB5b3UgZG8uIEVpdGhlciBvbmUgdGVsbHMgbWUgc29tZXRoaW5nIGFib3V0IHlvdS4gSSBkb24ndCBtdWNoIG1pbmQgd2hpY2guJw==',
            'choices' => [
                ['text' => 'SGVscCBmaW5pc2ggdGhlIGJpbmRpbmc=', 'next' => '5_bind'],
                ['text' => 'R28gdG8gdGhlIGthdmEgY2VyZW1vbnk=', 'next' => '5_kava'],
            ],
        ],
        '5_bind' => [
            'prose'  => 'QmluZGluZyBhIHN0b25lIGJsYWRlIHRvIGl0cyBoYWZ0IHdpdGggd2V0IHNlbm5pdCBjb3JkIGlzIHNsb3csIGV4YWN0aW5nIHdvcmsg4oCUIHdpbmQgaXQgdG9vIGxvb3NlIGFuZCBpdCdsbCBmYWlsIGF0IHRoZSBmaXJzdCByZWFsIHN0cmlrZSwgdG9vIHRpZ2h0IGFuZCB0aGUgd29vZCBzcGxpdHMgYmVmb3JlIHRoZSBjb3JkJ3MgZXZlbiBkcnkuIFRoZSBjdXN0b20taG9sZGVyIGNvcnJlY3RzIHlvdXIgdGVuc2lvbiB0d2ljZSwgc2lsZW50bHksIGJ5IHNpbXBseSB0YWtpbmcgdGhlIGNvcmQgZnJvbSB5b3VyIGhhbmRzIGFuZCBzaG93aW5nIHlvdSB3aGF0IHJpZ2h0IGZlZWxzIGxpa2UuCgpCeSB0aGUgdGltZSB0aGUgYmluZGluZydzIHNldCwgeW91ciBmaW5nZXJzIGFjaGUgaW4gYSB3YXkgdGhhdCBmZWVscywgdW5leHBlY3RlZGx5LCBsaWtlIHNvbWV0aGluZyBlYXJuZWQgcmF0aGVyIHRoYW4gbWVyZWx5IGZpbmlzaGVkLg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgc2F5cw==', 'next' => '6_shared'],
            ],
        ],
        '5_kava' => [
            'prose'  => 'VGhlIGthdmEgY2VyZW1vbnkgcnVucyB0byBpdHMgb3duIHVuaHVycmllZCByaHl0aG0g4oCUIHRoZSBwb3VuZGluZywgdGhlIHN0cmFpbmluZyB0aHJvdWdoIGZpYnJlLCB0aGUgY2FyZWZ1bCBvcmRlciBpbiB3aGljaCB0aGUgYm93bCBtb3ZlcyBmcm9tIGhhbmQgdG8gaGFuZCwgcmFuayBhbmQgaGlzdG9yeSBkaWN0YXRpbmcgd2hvIGRyaW5rcyB3aGVuIGluIGEgY29kZSB5b3UncmUgY2xlYXJseSBub3QgbWVhbnQgdG8gZnVsbHkgdW5kZXJzdGFuZCBvbiBhIGZpcnN0IHZpc2l0LiBZb3UgZG8geW91ciBiZXN0IHRvIGZvbGxvdyBhbG9uZyB3aXRob3V0IGNhdXNpbmcgb2ZmZW5jZSwgd2hpY2ggdHVybnMgb3V0IHRvIGJlIGl0cyBvd24ga2luZCBvZiBleGFjdGluZyB3b3JrLgoKQWNyb3NzIHRoZSBjaXJjbGUsIHNvbWVvbmUgbWVudGlvbnMgQXVudGllJ3MgbmFtZSBhdCBvbmUgcG9pbnQsIHdhcm1seSwgYW5kIHRoZSBjb252ZXJzYXRpb24gbW92ZXMgb24gYmVmb3JlIHlvdSBjYW4gYXNrIGFueXRoaW5nIG1vcmUg4oCUIGEgZG9vciBvcGVuZWQgYW5kIGNsb3NlZCBhZ2FpbiBpbiB0aGUgc2FtZSBicmVhdGgu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgc2F5cw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB0aGUgZXZlbmluZyB3ZW50LCB5b3UgZmluZCB0aGUgY3VzdG9tLWhvbGRlciBhZnRlcndhcmQgd2l0aCB0aGUgYmxhZGUgZmluaXNoZWQg4oCUIGhhZnQgYm91bmQgdGlnaHQsIHN0b25lIGVkZ2UgY2F0Y2hpbmcgdGhlIGxhbXAgbGlnaHQgd2l0aCBhIGR1bGwsIHBhdGllbnQgZ2xlYW0uIEhlIHR1cm5zIGl0IG92ZXIgb25jZSBpbiBoaXMgb3duIGhhbmRzIGJlZm9yZSBoZSdsbCBnaXZlIGl0IHRvIHlvdSwgY2hlY2tpbmcgaGlzIG93biB3b3JrIHRoZSB3YXkgY2FyZWZ1bCBwZW9wbGUgYWx3YXlzIGRvLCBldmVuIGF0IHRoZSBlbmQuCgonVGhpcyBpcyBub3QgYSBkZWNvcmF0aW9uLCcgaGUgc2F5cywgaGFuZGluZyBpdCBvdmVyLiAnSXQgaGFzIGRvbmUgcmVhbCB3b3JrIGJlZm9yZSBhbmQgaXQgd2lsbCBhZ2Fpbi4gV2hhdCBpdCBkb2VzIG5leHQgaXMgbm9ib2R5J3MgYnVzaW5lc3MgYnV0IHlvdXJzIHdoZW4gdGhlIHRpbWUgY29tZXMuJyBIZSBkb2Vzbid0IGV4cGxhaW4gZnVydGhlciwgYW5kIHNvbWV0aGluZyBhYm91dCBoaXMgZmFjZSBzYXlzIGhlIG5ldmVyIGludGVuZHMgdG8u',
            'choices' => [
                ['text' => 'Q2FycnkgaXQgYmFjayB0byB0aGUgS8WNdHVrdQ==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNhcnJ5IHRoZSBhZHplIGJhY2sgZG93biB0byB0aGUgYW5jaG9yYWdlIHdyYXBwZWQgaW4gYSBmb2xkIG9mIHRoZSBwYXJjZWwncyBsZWZ0b3ZlciBsZWFmLXdyYXBwaW5nLCB0aGUgbGFnb29uIGdvbmUgdGhlIGNvbG91ciBvZiBoYW1tZXJlZCBwZXd0ZXIgdW5kZXIgYSBza3kgdGhhdCBjYW4ndCBkZWNpZGUgb24gcmFpbi4gVGhlIEJhcm9uLCBwcmVkaWN0YWJseSwgY2Fubm90IGxlYXZlIHRoZSBibGFkZSBhbG9uZSwgdHVybmluZyBoaXMgaGVhZCB0byBjYXRjaCB0aGUgZWRnZSdzIGdsZWFtIGZyb20gZXZlcnkgYW5nbGUgYXZhaWxhYmxlIHRvIGhpbS4KCidTaGFycCwnIGhlIGFubm91bmNlcywgd2l0aCByZWFsIHJlc3BlY3Qg4oCUIHRoZSBmaXJzdCB0aGluZyBhbGwgZGF5IGhlIGhhc24ndCBzYWlkIHdpdGggYW4gZWRnZSBvZiBzaG93bWFuc2hpcCBpbiBpdC4=',
            'choices' => [
                ['text' => 'QXNrIHRoZSBjdXN0b20taG9sZGVyJ3MgbmFtZSBiZWZvcmUgeW91IGdv', 'next' => '8_end_ask_name'],
                ['text' => 'TGV0IGhpbSBzdGF5IHNpbXBseSAndGhlIGN1c3RvbS1ob2xkZXIn', 'next' => '8_end_no_name'],
            ],
        ],
        '8_end_ask_name' => [
            'prose'  => 'WW91IGdvIGJhY2sgdXAsIG9uY2UsIGJlZm9yZSB5b3UgY2FzdCBvZmYg4oCUIGEgc21hbGwgdGhpbmcsIGJ1dCBpdCBmZWVscyB3cm9uZyB0byBjYXJyeSBhd2F5IHNvbWV0aGluZyB0aGlzIGNvbnNpZGVyZWQgZnJvbSBzb21lb25lIHdob3NlIG5hbWUgeW91IG5ldmVyIGFza2VkLiBIZSBsb29rcyBmYWludGx5IGFtdXNlZCB0aGF0IHlvdSBjYW1lIGJhY2sganVzdCBmb3IgdGhhdC4KCidQZXRlbG8sJyBoZSBzYXlzLCBhbmQgbm90aGluZyBtb3JlIOKAlCBubyBzdG9yeSBhdHRhY2hlZCwgbm8gaW52aXRhdGlvbiB0byB1c2UgaXQgZmFtaWxpYXJseSwganVzdCB0aGUgZmFjdCBvZiBpdCwgb2ZmZXJlZCBwbGFpbmx5IGJlY2F1c2UgeW91IGFza2VkIHBsYWlubHkuCgpJdCdzIG5vdCBtdWNoLiBCdXQgaXQgdHVybnMgdGhlIGJsYWRlLCBzb21laG93LCBmcm9tIGFuIG9iamVjdCBpbnRvIHNvbWV0aGluZyBtYWRlIGJ5IGEgc3BlY2lmaWMgcGVyc29uIHdobyBoYXMgYSBuYW1lIGFuZCBhIHdvcmtzaG9wIGFuZCBhIGxpZmUgdGhhdCB3aWxsIGdvIG9uIGhlcmUgbG9uZyBhZnRlciB5b3UndmUgZ29uZS4gWW91IGNhcnJ5IGJvdGggYmFjayB0byB0aGUgc2hpcCwgdGhlIG5hbWUgYW5kIHRoZSBhZHplLCBhbmQgbmVpdGhlciBvbmUgd2VpZ2hzIGFueXRoaW5nIGF0IGFsbCwgYW5kIGJvdGggbWF0dGVyLg==',
            'ending' => true,
        ],
        '8_end_no_name' => [
            'prose'  => 'WW91IGRvbid0IGFzay4gU29tZSBwZW9wbGUsIHlvdSdyZSBsZWFybmluZywgaGFuZCB5b3Ugc29tZXRoaW5nIGNvbnNpZGVyZWQgYW5kIGV4cGVjdCBub3RoaW5nIGJhY2sgYnV0IHRoZSBzZW5zZSB0byByZWNlaXZlIGl0IHByb3Blcmx5IOKAlCBhbmQgcHJlc3NpbmcgZm9yIG1vcmUgdGhhbiB0aGF0LCBhIG5hbWUsIGEgc3RvcnksIGEgY29ubmVjdGlvbiB0byBrZWVwLCB3b3VsZCB0dXJuIGEgZ2lmdCBpbnRvIGEgdHJhbnNhY3Rpb24uCgpUaGUgS8WNdHVrdSBsaWZ0cyBvZmYgdGhlIGxhZ29vbiBpbiB0aGUgZGF5J3MgbGFzdCBsaWdodCwgV2FsbGlzIGZhbGxpbmcgYXdheSBuZWF0IGFuZCBncmVlbiBhbmQgdW5odXJyaWVkIGJlbG93IHlvdSwgYW5kIHRoZSBhZHplIHJpZGVzIGluIHRoZSBzYXRjaGVsIG5leHQgdG8gdGhlIGxhc3Qgb2YgdGhlIHNtb2tlZCBwYXJjZWwsIHN0b25lIGFuZCBzdG9uZS13b3JrIHNpdHRpbmcgdG9nZXRoZXIgbGlrZSB0d28gaGFsdmVzIG9mIHRoZSBzYW1lIGlkZWEuCgpTb2xhbmdlLCB3YXRjaGluZyB0aGUgaXNsYW5kIGdvLCBzYXlzIG9ubHk6ICdHb29kIGlzbGFuZC4gR29vZCBoYW5kcyB0aGVyZS4nIEl0J3MgdGhlIGNsb3Nlc3QgdGhpbmcgdG8gYSByZXZpZXcgeW91J2xsIGdldCBvdXQgb2YgaGVyLCBhbmQgaXQncyBlbm91Z2gu',
            'ending' => true,
        ],
    ],
];
