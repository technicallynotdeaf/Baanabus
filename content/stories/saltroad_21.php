<?php
return [
    'id'    => 21,
    'title' => 'Whole Again',
    'color' => '#6A7A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'R2Vub2EgcmlzZXMgc3RlZXAgZnJvbSBpdHMgaGFyYm91ciwgdGVycmFjZWQgaG91c2VzIGNsaW1iaW5nIHRoZSBoaWxsc2lkZSBhYm92ZSBhIGRvY2tzaWRlIGdlbnVpbmVseSB0aGljayB3aXRoIHRoZSBvcmRpbmFyeSBidXNpbmVzcyBvZiBhIHdvcmtpbmcgTWVkaXRlcnJhbmVhbiBwb3J0IOKAlCBub3RoaW5nIGxpa2UgVmVuaWNlJ3MgdGhlYXRyaWNhbCBncmFuZGV1ciwganVzdCBob25lc3QsIHByYWN0aWNhbCBtYXJpdGltZSBjb21tZXJjZS4gVG9tYXMgc2VlbXMgYWxtb3N0IGdpZGR5LCBjaGVja2luZyBhbmQgcmVjaGVja2luZyB0aGUgc2VhbC1jYXNlLiAnTGFzdCBvbmUsJyBoZSBrZWVwcyBzYXlpbmcuICdBY3R1YWxseSB0aGUgbGFzdCBvbmUuJwoKVHdvIGRvY2tzaWRlIHJvdXRlcyB0b3dhcmQgdGhlIHBhd25icm9rZXIncyBzaG9wIHByZXNlbnQgdGhlbXNlbHZlczogYWxvbmcgdGhlIHdvcmtpbmcgcXVheSwgZGlyZWN0IGJ1dCBidXN5IHdpdGggY2FyZ28gdHJhZmZpYywgb3IgYSBxdWlldGVyIGJhY2sgc3RyZWV0LCBzbG93ZXIgYnV0IGNsZWFyIG9mIHRoZSBkYXkncyBzaGlwcGluZyBidXN0bGUu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgd29ya2luZyBxdWF5', 'next' => '2_quay'],
                ['text' => 'R28gYnkgdGhlIGJhY2sgc3RyZWV0', 'next' => '2_back'],
            ],
        ],
        '2_quay' => [
            'prose'  => 'VGhlIHdvcmtpbmcgcXVheSBpcyBidXN5LCBwcmFjdGljYWwsIGNhcmdvIG1vdmluZyBpbiBldmVyeSBkaXJlY3Rpb24gd2l0aCB0aGUgc3BlY2lmaWMgdW5nbGFtb3JvdXMgZWZmaWNpZW5jeSBvZiBhIHBvcnQgdGhhdCdzIG1vcmUgaW50ZXJlc3RlZCBpbiBmdW5jdGlvbiB0aGFuIHNwZWN0YWNsZS4gWW91IG5hdmlnYXRlIGl0IHF1aWNrbHksIGRvZGdpbmcgaGFuZGNhcnRzIGFuZCBjb2lsZWQgcm9wZSwgYmVmb3JlIGZpbmFsbHkgcmVhY2hpbmcgYSBzbWFsbCwgdW5yZW1hcmthYmxlIHNob3AgZnJvbnQuCgonTmludGggb25lJ3MgYWx3YXlzIGdvaW5nIHRvIGJlIHRoZSBsZWFzdCBkcmFtYXRpYywnIFRvbWFzIHNheXMsIGFtdXNlZC4gJ0ZlZWxzIHJpZ2h0LCBzb21laG93Lic=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHNob3A=', 'next' => '3_shared'],
            ],
        ],
        '2_back' => [
            'prose'  => 'VGhlIGJhY2sgc3RyZWV0IGlzIHF1aWV0ZXIsIG5hcnJvd2VyLCB0aGUga2luZCBvZiByb3V0ZSBvbmx5IGxvY2FscyBvciBwZW9wbGUgd2hvIGdlbnVpbmVseSBrbm93IHRoZSBwb3J0IGFjdHVhbGx5IHVzZS4gSXQgd2luZHMgcGFzdCBzbWFsbCB3b3Jrc2hvcHMgYW5kIG1vZGVzdCBob21lcyBiZWZvcmUgb3BlbmluZyBvbnRvIHRoZSBzYW1lIHVucmVtYXJrYWJsZSBzaG9wIGZyb250LCByZWFjaGVkIGEgbGl0dGxlIG1vcmUgY2lyY3VpdG91c2x5LgoKJ1Nsb3dlciwgYnV0IGhvbmVzdGx5LCBJIGxpa2UgYXJyaXZpbmcgYXQgdGhlIGxhc3QgcGllY2UgdGhpcyB3YXksJyBUb21hcyBhZG1pdHMuICdGZWVscyBhcHByb3ByaWF0ZWx5IHVuZ2xhbW9yb3VzLic=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHNob3A=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHBhd25icm9rZXIsIGFuIGVsZGVybHkgbWFuIG5hbWVkIFZpdHRvcmlvLCBoYXMgYWJzb2x1dGVseSBubyBpZGVhIHdoYXQgaGUncyBhY3R1YWxseSBob2xkaW5nIOKAlCB0aGUgd2VkZ2Ugc2l0cyBpbiBoaXMgd2luZG93IGRpc3BsYXkgYW1vbmcgcmluZ3MgYW5kIG9sZCBjb2lucyBhbmQgb3RoZXIgdW5jbGFpbWVkIGN1cmlvc2l0aWVzLCBwcmljZWQgYXMgYSBzaW1wbGUgZGVjb3JhdGl2ZSBvZGRpdHkgcmF0aGVyIHRoYW4gYW55dGhpbmcgbW9yZSBzaWduaWZpY2FudC4KCidUaGF0IG9sZCB0aGluZz8gU29tZW9uZSBwYXduZWQgaXQgZ2VuZXJhdGlvbnMgYmFjaywgbmV2ZXIgY2FtZSB0byByZWNsYWltIGl0LCcgaGUgc2F5cywgc2hydWdnaW5nLiAnQmVlbiBzaXR0aW5nIHRoZXJlIHNvIGxvbmcgSSd2ZSBnZW51aW5lbHkgZm9yZ290dGVuIGhvdyBpdCBldmVuIGdvdCBoZXJlLiBZb3Ugd2FudCBpdCwgaXQncyB5b3VycywgZm9yIGEgZmFpciBwcmljZS4gTm90aGluZyBjb21wbGljYXRlZCBhYm91dCB0aGlzIG9uZSwgSSdtIGFmcmFpZC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'RGVjaWRlIGhvdyB0byBwcm9jZWVk', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUncyBubyByZWFsIHRlc3QgaGVyZSwgbm8gaG9uZXN0eSByZXF1aXJlZCwgbm8gZmFtaWx5IGhpc3RvcnkgdG8gdW50YW5nbGUg4oCUIGp1c3QgYSBzdHJhaWdodGZvcndhcmQgdHJhbnNhY3Rpb24sIHJlZnJlc2hpbmdseSBzaW1wbGUgYWZ0ZXIgZWlnaHQgc3RvcHMnIHdvcnRoIG9mIGNhcmVmdWwsIG1lYW5pbmdmdWwgbmVnb3RpYXRpb24uIFlvdSBjb3VsZCBzaW1wbHkgcGF5IFZpdHRvcmlvJ3MgYXNraW5nIHByaWNlIG91dHJpZ2h0LCBvciB5b3UgY291bGQgb2ZmZXIgYSBmYWlyIHRyYWRlIGluc3RlYWQsIHNvbWV0aGluZyBvZiBnZW51aW5lIHZhbHVlIGZyb20geW91ciBvd24gYWNjdW11bGF0ZWQgdHJhdmVscy4KCidFaXRoZXIncyBmaW5lIGJ5IG1lLCcgVml0dG9yaW8gc2F5cywgZW50aXJlbHkgdW5ib3RoZXJlZCBlaXRoZXIgd2F5LiAnTW9uZXkncyBtb25leSwgYW5kIGEgZmFpciB0cmFkZSdzIGEgZmFpciB0cmFkZS4gWW91ciBjYWxsLic=',
            'choices' => [
                ['text' => 'UGF5IHRoZSBhc2tpbmcgcHJpY2Ugb3V0cmlnaHQ=', 'next' => '5_pay'],
                ['text' => 'T2ZmZXIgYSBmYWlyIHRyYWRlIGluc3RlYWQ=', 'next' => '5_trade'],
            ],
        ],
        '5_pay' => [
            'prose'  => 'WW91IHBheSBvdXRyaWdodCwgc2ltcGxlIGFuZCBzdHJhaWdodGZvcndhcmQsIGFuZCBWaXR0b3JpbyBjb3VudHMgdGhlIGNvaW5zIHdpdGggdGhlIHByYWN0aXNlZCBlZmZpY2llbmN5IG9mIGEgbWFuIHdobydzIGRvbmUgdGhpcyBleGFjdCB0cmFuc2FjdGlvbiB0ZW4gdGhvdXNhbmQgdGltZXMgYmVmb3JlLCBmb3Igb2JqZWN0cyBjb25zaWRlcmFibHkgbGVzcyBzaWduaWZpY2FudCB0aGFuIHRoaXMgb25lIHR1cm5zIG91dCB0byBhY3R1YWxseSBiZS4KCidQbGVhc3VyZSBkb2luZyBidXNpbmVzcywnIGhlIHNheXMsIGFscmVhZHkgdHVybmluZyBoaXMgYXR0ZW50aW9uIHRvIGhpcyBuZXh0IGN1c3RvbWVyLg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgd2VkZ2U=', 'next' => '6_shared'],
            ],
        ],
        '5_trade' => [
            'prose'  => 'WW91IG9mZmVyIGEgdHJhZGUgaW5zdGVhZCDigJQgYSBzbWFsbCwgZ2VudWluZWx5IGludGVyZXN0aW5nIGN1cmlvc2l0eSB5b3UgcGlja2VkIHVwIHNvbWV3aGVyZSBhbG9uZyB0aGUgcm91dGUsIGFuZCBWaXR0b3JpbyBleGFtaW5lcyBpdCB3aXRoIHJlYWwsIHByb2Zlc3Npb25hbCBhcHByYWlzYWwgYmVmb3JlIG5vZGRpbmcsIHNhdGlzZmllZCB3aXRoIHRoZSBleGNoYW5nZS4KCidGYWlyIHRyYWRlLCB0aGF0LCcgaGUgc2F5cy4gJ0dvb2QgaW5zdGluY3QgZm9yIHZhbHVlLiBQbGVhc3VyZSBkb2luZyBidXNpbmVzcy4n',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgd2VkZ2U=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IHRha2UgdGhlIGZpbmFsIHdlZGdlIOKAlCB0aGUgbmludGgsIHRoZSBsYXN0LCBlbnRpcmVseSB1bnJlbWFya2FibGUgaW4gVml0dG9yaW8ncyBlc3RpbWF0aW9uIGFuZCBlbnRpcmVseSBtb21lbnRvdXMgaW4geW91cnMg4oCUIGFuZCBzdGVwIGJhY2sgb3V0IG9udG8gR2Vub2EncyBidXN5IGRvY2tzaWRlIHdpdGggdGhlIGZ1bGwsIGNvbXBsZXRlIHNldCBmaW5hbGx5LCBnZW51aW5lbHkgYXNzZW1ibGVkIGZvciB0aGUgZmlyc3QgdGltZSBpbiBnZW5lcmF0aW9ucy4KClRvbWFzLCBleGFtaW5pbmcgYWxsIG5pbmUgcGllY2VzIHRvZ2V0aGVyIGluIHRoZSBjYXNlIGZvciB0aGUgZmlyc3QgdGltZSwgZ29lcyBxdWlldCwgZ2VudWluZWx5IG1vdmVkLiAnVGhlcmUgaXQgaXMsJyBoZSBzYXlzIHNvZnRseS4gJ1dob2xlIGFnYWluLiBUaHJlZSBtb250aHMsIGhhbGYgYSBjb250aW5lbnQsIGFuZCBoZXJlIGl0IGFjdHVhbGx5IGlzLic=',
            'choices' => [
                ['text' => 'VGFrZSBhIG1vbWVudCB0byBwcm9wZXJseSBzZWUgaXQ=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGZpdCBhbGwgbmluZSB3ZWRnZXMgdG9nZXRoZXIsIGNhcmVmdWxseSwgcmlnaHQgdGhlcmUgb24gdGhlIEdlbm9hIGRvY2tzaWRlLCBhbmQgdGhlIHNlYWwgdGFrZXMgcHJvcGVyIHNoYXBlIGZvciB0aGUgZmlyc3QgdGltZSBpbiBsb25nZXIgdGhhbiBhbnlvbmUgYWxpdmUgaGFzIGFjdHVhbGx5IHdpdG5lc3NlZCDigJQgYSBjb21wbGV0ZSwgYmVhdXRpZnVsLCBmdW5jdGlvbmluZyBvYmplY3QsIHJlYWR5IGF0IGxhc3QgZm9yIGl0cyBvbmUgdHJ1ZSBwdXJwb3NlLgoKVG9tYXMgd2F0Y2hlcyB5b3UgaG9sZCBpdCwgcXVpZXQgYW5kIGdlbnVpbmVseSByZXZlcmVudC4gJ1JlYWR5IGZvciBTYW1hcmthbmQsIHRoZW4uIFJlYWR5IHRvIGFjdHVhbGx5IGNsb3NlIHdoYXQgc2hlIHN0YXJ0ZWQuJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSBjYW4ndCBxdWl0ZSBiZWxpZXZlIGl0J3MgYWN0dWFsbHkgY29tcGxldGU=', 'next' => '8_end_believe'],
                ['text' => 'U2F5IHlvdSdyZSByZWFkeSB0byBmaW5pc2ggdGhpcyBwcm9wZXJseQ==', 'next' => '8_end_ready'],
            ],
        ],
        '8_end_believe' => [
            'prose'  => 'J0kgaG9uZXN0bHkgY2FuJ3QgcXVpdGUgYmVsaWV2ZSBpdCdzIGFjdHVhbGx5IGNvbXBsZXRlLCcgeW91IGFkbWl0LCB0dXJuaW5nIHRoZSB3aG9sZSBhc3NlbWJsZWQgc2VhbCBvdmVyIGluIHlvdXIgaGFuZHMsIG5pbmUgY2l0aWVzIGFuZCBuaW5lIHN0b3JpZXMgZm9sZGVkIGludG8gb25lIHNtYWxsLCBzb2xpZCwgZmluaXNoZWQgb2JqZWN0LiAnRmVlbHMgbGlrZSBpdCBzaG91bGQgYmUgaGFyZGVyIHRvIGhvbGQgdGhhbiBpdCBhY3R1YWxseSBpcy4nCgpUb21hcyBzbWlsZXMsIGdlbnVpbmVseSB3YXJtLiAnVGhhdCdzIHJhdGhlciB0aGUgbmF0dXJlIG9mIGZpbmlzaGluZyBzb21ldGhpbmcgcHJvcGVybHksIEkgdGhpbmsuIEFsbCB0aGF0IHdlaWdodCwgYW5kIHNvbWVob3cgaXQgc3RpbGwgZml0cyBpbiBvbmUgaGFuZC4n',
            'ending' => true,
        ],
        '8_end_ready' => [
            'prose'  => 'J0knbSByZWFkeSB0byBmaW5pc2ggdGhpcyBwcm9wZXJseSwnIHlvdSBzYXksIGFuZCBtZWFuIGl0IGNvbXBsZXRlbHkg4oCUIG5pbmUgY2l0aWVzLCBuaW5lIGRlYnRzIGFuZCBzdG9yaWVzIGFuZCBzbWFsbCBhY3RzIG9mIGdyYWNlLCBhbGwgb2YgaXQgZm9sZGluZyBub3cgaW50byBvbmUgbGFzdCBqb3VybmV5IGhvbWUuCgpUb21hcyBub2RzLCBtYXRjaGluZyB5b3VyIHJlc29sdmUuICdUaGVuIGxldCdzIGdvIGNsb3NlIHRoZSBjaXJjbGUuIFNhbWFya2FuZCdzIHdhaXRpbmcsIGFuZCBzbywgSSB0aGluaywgaXMgc2hlIOKAlCBob3dldmVyIHRoYXQgdHVybnMgb3V0IHRvIGFjdHVhbGx5IGxvb2ssIGFmdGVyIGFsbCB0aGlzIHRpbWUuJyBUaGUgY2FyYXZhbiB0dXJucyBlYXN0LCB0b3dhcmQgaG9tZSwgZm9yIHRoZSB2ZXJ5IGxhc3QgdGltZS4=',
            'ending' => true,
        ],
    ],
];
