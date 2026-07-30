<?php
return [
    'id'    => 23,
    'title' => 'The Last Short Step',
    'color' => '#C87A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'U2ljaWx5IGFycml2ZXMgcXVpZXRseSBhZnRlciBldmVyeXdoZXJlIGVsc2UsIHRoZSBpc2xhbmQncyBkcnkgaGlsbHMgYW5kIGNpdHJ1cyBncm92ZXMgY2F0Y2hpbmcgdGhlIGxhc3QgbG93IGxpZ2h0IG9mIHRoZSB0cmlwJ3MgZmluYWwgcHJvcGVyIHN0b3AgYmVmb3JlIGhvbWUuIFRoZXJlJ3Mgbm90aGluZyBsZWZ0IHRvIGFjcXVpcmUgaGVyZSB0aGF0IHRoZSByZWNpcGUgdHJ1bHkgbmVlZHMg4oCUIG9ubHkgdGhlIGxhc3Qgb2YgdGhlIGZyZXNoIGluZ3JlZGllbnRzLCB0aGUga2luZCB0aGF0IG9ubHkgdHJhdmVsIHdlbGwgdGhpcyBjbG9zZSB0byB0aGUgYWN0dWFsIGNvb2tpbmcuCgpCcnVubyBzZWVtcyB0byBzZW5zZSB0aGUgbW9vZCwgc2F5aW5nIGxpdHRsZSBhcyB5b3Ugd2FsayB0aGUgZHVzdHkgcm9hZCB0b3dhcmQgYSBzbWFsbCBtYXJrZXQgc3RhbGwga25vd24gZm9yIGl0cyBwcm9kdWNlLg==',
            'choices' => [
                ['text' => 'V2FsayBvbiB0b3dhcmQgdGhlIHN0YWxs', 'next' => '2_walk'],
            ],
        ],
        '2_walk' => [
            'prose'  => 'VGhlIHJvYWQgd2luZHMgZ2VudGx5IGJldHdlZW4gY2l0cnVzIGdyb3ZlcyBoZWF2eSB3aXRoIGZydWl0LCB0aGUgc21lbGwgb2Ygb3JhbmdlIGJsb3Nzb20gZHJpZnRpbmcgZmFpbnRseSBvbiB0aGUgd2FybSBhaXIsIGNpY2FkYXMga2VlcGluZyB1cCB0aGVpciBzdGVhZHksIHVuaHVycmllZCByYWNrZXQgdGhlIHdob2xlIHdheS4gSXQncyBhbiBlYXN5IHdhbGssIG5vdGhpbmcgdXJnZW50IGFib3V0IGl0IGF0IGFsbCwgd2hpY2ggZmVlbHMgcmlnaHQgZm9yIHdoZXJlIHRoZSB0cmlwIGhhcyBmaW5hbGx5IGFycml2ZWQuCgpUaGUgc3RhbGxob2xkZXIsIGFuIG9sZGVyIG1hbiB0ZW5kaW5nIGJhc2tldHMgb2YgZnJlc2ggaGVyYnMgYW5kIGNpdHJ1cywgZ3JlZXRzIHlvdSBib3RoIHdpdGhvdXQgY2VyZW1vbnku',
            'choices' => [
                ['text' => 'R2F0aGVyIHRoZSBsYXN0IGluZ3JlZGllbnRz', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SGUgZG9lc24ndCBuZWVkIHRoZSByZWNpcGUgY2FyZCBleHBsYWluZWQgdG8gaGltIOKAlCBoZSBzaW1wbHkgYXNrcyB3aGF0IHRoZSBkaXNoIG5lZWRzLCBsaXN0ZW5zIHRvIHlvdXIgYW5zd2VyLCBhbmQgcXVpZXRseSBhc3NlbWJsZXMgZXhhY3RseSB0aGUgcmlnaHQgaGFuZGZ1bCBvZiBmcmVzaCBoZXJicyBhbmQgZnJ1aXQsIHRoZSBraW5kIHRoYXQgd2lsdCBvciBmYWRlIGlmIGNhcnJpZWQgdG9vIGxvbmcsIG1lYW50IHRvIGJlIHVzZWQgd2l0aGluIGRheXMgcmF0aGVyIHRoYW4gd2Vla3MuCgonTGFzdCBzdG9wIGJlZm9yZSBob21lLCBJIHRha2UgaXQsJyBoZSBzYXlzLCBub3QgcmVhbGx5IGEgcXVlc3Rpb24uICdZb3UndmUgZ290IHRoYXQgbG9vayBhYm91dCB5b3UuIFRoZSBvbmUgcGVvcGxlIGdldCByaWdodCBiZWZvcmUgdGhleSdyZSBmaW5pc2hlZCB3aXRoIHNvbWV0aGluZyBlbm9ybW91cy4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWRtaXQgdGhhdCdzIGV4YWN0bHkgcmlnaHQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGFkbWl0IGl0IHBsYWlubHksIGFuZCBoZSBzaW1wbHkgbm9kcywgcGFja2FnaW5nIHRoZSBsYXN0IGZyZXNoIGluZ3JlZGllbnRzIHdpdGggdW5odXJyaWVkIGNhcmUsIG5vIGZ1cnRoZXIgcXVlc3Rpb25zIG5lZWRlZC4gVGhlcmUncyBub3RoaW5nIHRvIGxlYXJuIGhlcmUsIG5vIHRlY2huaXF1ZSB0byBtYXN0ZXIsIG5vIGxlc3NvbiB0byBzaXQgdGhyb3VnaCDigJQganVzdCB0aGUgcXVpZXQsIG9yZGluYXJ5IGJ1c2luZXNzIG9mIGdhdGhlcmluZyB3aGF0J3MgbmVlZGVkIGZvciBvbmUgbGFzdCwgb3JkaW5hcnkgd2FsayBob21lLgoKQnJ1bm8gd2FpdHMgbmVhcmJ5LCB3YXRjaGluZyB0aGUgY2l0cnVzIGdyb3ZlcyByYXRoZXIgdGhhbiB0aGUgdHJhbnNhY3Rpb24u',
            'choices' => [
                ['text' => 'U2l0IHdpdGggdGhlIG1vbWVudCBhIHdoaWxl', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'WW91IHNpdCBmb3IgYSB3aGlsZSBvbiBhIGxvdyBzdG9uZSB3YWxsIGF0IHRoZSBlZGdlIG9mIHRoZSBncm92ZSwgdGhlIGluZ3JlZGllbnRzIGdhdGhlcmVkLCBub3RoaW5nIGxlZnQgdG8gZG8gYnV0IGxldCB0aGUgbW9tZW50IGFjdHVhbGx5IHNldHRsZSBiZWZvcmUgbW92aW5nIG9uLiBCcnVubyBzaXRzIGJlc2lkZSB5b3UsIHF1aWV0IGluIHRoZSB3YXkgdGhhdCBkb2Vzbid0IGFzayBhbnl0aGluZyBvZiB5b3UuCgonQWxtb3N0IGhvbWUsJyBoZSBmaW5hbGx5IHNheXMsIG1vcmUgdG8gaGltc2VsZiB0aGFuIHRvIHlvdS4gJ0ZlZWxzIHN0cmFuZ2UsIGRvZXNuJ3QgaXQuIEFsbCB0aGF0IGRpc3RhbmNlLCBhbmQgbm93IGl0J3MganVzdCBvbmUgbW9yZSBzaG9ydCBob3AuJw==',
            'choices' => [
                ['text' => 'TGV0IHRoZSBxdWlldCBzdHJldGNoIGEgbGl0dGxlIGxvbmdlcg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGxldCB0aGUgcXVpZXQgc3RyZXRjaCwgY2ljYWRhcyBrZWVwaW5nIHRoZWlyIHN0ZWFkeSByYWNrZXQsIHRoZSBjaXRydXMgZ3JvdmVzIHNldHRsaW5nIGludG8gbGF0ZS1hZnRlcm5vb24gZ29sZCBhcm91bmQgeW91IGJvdGguIFRoZXJlJ3Mgbm8gdXJnZW5jeSB0byBmaWxsIHRoZSBzaWxlbmNlLiBJdCBzaW1wbHkgaG9sZHMsIGNvbWZvcnRhYmxlLCB0aGUgd2hvbGUgZW5vcm1vdXMgdHJpcCBmaW5hbGx5IGFsbG93ZWQgdG8gc2l0IHN0aWxsIGZvciBhIG1vbWVudCBiZWZvcmUgaXRzIGxhc3Qgc2hvcnQgc3RlcC4KCkV2ZW50dWFsbHkgQnJ1bm8gc3RhbmRzLCBicnVzaGluZyBvZmYgaGlzIHRyb3VzZXJzLCBvZmZlcmluZyB5b3UgYSBoYW5kIHVwIHdpdGhvdXQgYSB3b3JkLg==',
            'choices' => [
                ['text' => 'VGFrZSBoaXMgaGFuZCBhbmQgc3RhcnQgdG93YXJkIGhvbWU=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHRha2UgaGlzIGhhbmQgYW5kIHJpc2UsIHRoZSBsYXN0IGZyZXNoIGluZ3JlZGllbnRzIHNlY3VyZSBpbiB0aGVpciB3cmFwLCB0aGUgcm9hZCBhaGVhZCBsZWFkaW5nIGZpbmFsbHksIHByb3Blcmx5IHRvd2FyZCBOYXBsZXMgYW5kIElyaXMncyBraXRjaGVuIGFuZCB0aGUgbWVhbCB0aGF0J3MgYmVlbiBidWlsZGluZyBpdHNlbGYsIHBpZWNlIGJ5IGVhcm5lZCBwaWVjZSwgdGhpcyBlbnRpcmUgam91cm5leS4KCkJydW5vIGdsYW5jZXMgYmFjayBvbmNlIGF0IHRoZSBjaXRydXMgZ3JvdmVzIGFzIHlvdSB3YWxrLiAnTmVhcmx5IHRoZXJlLCcgaGUgc2F5cyBzb2Z0bHkuICdOZWFybHksIGZpbmFsbHksIHRoZXJlLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBnbGFkIFNpY2lseSB3YXMgcXVpZXQ=', 'next' => '8_end_quiet'],
                ['text' => 'U2F5IHBhcnQgb2YgeW91IHdpc2hlcyBpdCBjb3VsZCBzdGF5IHF1aWV0IGEgbGl0dGxlIGxvbmdlcg==', 'next' => '8_end_linger'],
            ],
        ],
        '8_end_quiet' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gZ2xhZCBTaWNpbHkgd2FzIHF1aWV0LCcgeW91IHNheSwgZmVlbGluZyB0aGUgZGF5J3Mgc3RpbGxuZXNzIHN0aWxsIHNldHRsZWQgY29tZm9ydGFibHkgaW4geW91ciBjaGVzdC4gJ0ZlbHQgbGlrZSBleGFjdGx5IHRoZSByaWdodCBraW5kIG9mIHN0b3AsIHRoaXMgY2xvc2UgdG8gdGhlIGVuZC4gTm90aGluZyB0byBwcm92ZS4gSnVzdCBnYXRoZXJpbmcgdGhlIGxhc3Qgb2YgaXQgYW5kIHNpdHRpbmcgd2l0aCB0aGF0IGEgd2hpbGUuJwoKQnJ1bm8gbm9kcywgc29tZXRoaW5nIGNvbnRlbnRlZCBpbiBpdC4gJ0dvb2QuIFlvdSd2ZSBlYXJuZWQgYSBxdWlldCBzdG9wIG9yIHR3bywgdGhpcyBkZWVwIGludG8gdGhpbmdzLiBOYXBsZXMgd2lsbCBhc2sgZW5vdWdoIG9mIHlvdSBzb29uLic=',
            'ending' => true,
        ],
        '8_end_linger' => [
            'prose'  => 'J0hvbmVzdGx5LCBwYXJ0IG9mIG1lIHdpc2hlcyBpdCBjb3VsZCBzdGF5IHF1aWV0IGEgbGl0dGxlIGxvbmdlciwnIHlvdSBhZG1pdCwgbG9va2luZyBiYWNrIG9uY2UgeW91cnNlbGYgYXQgdGhlIG9yYW5nZSBncm92ZXMgZmFkaW5nIGdvbGQgYmVoaW5kIHlvdS4gJ0ZlZWxzIGxpa2UgdGhlIGxhc3QgZWFzeSBicmVhdGggYmVmb3JlIHdoYXRldmVyIE5hcGxlcyBhY3R1YWxseSBhc2tzIG9mIG1lLicKCkJydW5vJ3MgaGFuZCBmaW5kcyB5b3VyIHNob3VsZGVyIGJyaWVmbHkuICdUaGF0J3MgZmFpci4gV2hhdGV2ZXIgTmFwbGVzIGFza3MsIHlvdSdyZSBtb3JlIHJlYWR5IGZvciBpdCB0aGFuIHlvdSBwcm9iYWJseSBmZWVsIHJpZ2h0IG5vdy4gVGhpcyBxdWlldCBkb2Vzbid0IGhhdmUgdG8gZW5kIHRoZSBtb21lbnQgeW91IGxlYXZlIGl0IGJlaGluZC4nIFRoZSByb2FkIHN0cmV0Y2hlcyBvbiwgdW5odXJyaWVkLCB0b3dhcmQgdGhlIGNvYXN0IGFuZCB0aGUgZmVycnkgYW5kIGZpbmFsbHksIHByb3Blcmx5LCBob21lLg==',
            'ending' => true,
        ],
    ],
];
