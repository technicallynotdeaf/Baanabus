<?php
return [
    'id'    => 24,
    'title' => 'The Real Sky, Properly Whole',
    'color' => '#1A2A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QW9yYWtpIE1hY2tlbnppZSByaXNlcyBmYW1pbGlhciBhbmQgZ3JlZW4gb3V0IG9mIHRoZSBsYXN0IG1vcm5pbmcgaGF6ZSwgdGhlIFF1aWV0IEhvdXIgZmluYWxseSwgcHJvcGVybHkgY29taW5nIGhvbWUgYWZ0ZXIgYSBqb3VybmV5IHRoYXQncyBjYXJyaWVkIHRoZSBhdGxhcyBhY3Jvc3MgbmVhcmx5IGV2ZXJ5IGNvbnRpbmVudCBhbmQgb2NlYW4gb24gRWFydGguIENvcndpbidzIG9sZCBvYnNlcnZhdG9yeSBzaGVkIHdhaXRzIGV4YWN0bHkgd2hlcmUgeW91IGZpcnN0IGZvdW5kIGl0LCB3ZWVrcyBhbmQgYSB3aG9sZSB3b3JsZCBhZ28uCgpQcml5YSBicmluZ3MgdGhlIGdsaWRlciBkb3duIGdlbnRseSBvbiB0aGUgc2FtZSBwYWRkb2NrLCBhbmQgdGhpcyB0aW1lLCB3YWl0aW5nIGJlc2lkZSB0aGUgc2hlZCwgc3RhbmRzIGEgZmFtaWxpYXIgZmlndXJlIOKAlCBEci4gVm9zcywgcHJlc2VudCBub3QgdG8gY2xhaW0gYW55dGhpbmcsIHNpbXBseSB0byBzZWUgdGhlIGVuZGluZyB0aHJvdWdoLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHNoZWQgdG9nZXRoZXI=', 'next' => '2_shared'],
            ],
        ],
        '2_shared' => [
            'prose'  => 'WW91IHdhbGsgdG93YXJkIHRoZSBzaGVkIHRvZ2V0aGVyLCBWb3NzIGZhbGxpbmcgaW50byBzdGVwIHF1aWV0bHkgYmVzaWRlIFByaXlhIHJhdGhlciB0aGFuIGFoZWFkIG9mIGFueW9uZSwgU3VsaSByaWRpbmcgY3VybGVkIGNvbnRlbnRlZGx5IGluIHRoZSBub3NlIGNvbmUgb25lIGxhc3QgdGltZS4gVGhlIGF0bGFzIHNpdHMgaGVhdnkgYW5kIGNvbXBsZXRlIGluIHlvdXIgaGFuZHMsIGV2ZXJ5IHBhZ2UgZmlsbGVkIGJ1dCBvbmUg4oCUIHRoZSB2ZXJ5IGxhc3QgYmxhbmsgcGF0Y2gsIHRoZSBvbmUgQ29yd2luJ3Mgb3duIG5vdGVzIGNhbGxlZCBhIHBsYWNlIGFuZCBhIGRhdGUgcmF0aGVyIHRoYW4gYSBzaGFwZS4KCidUaGlzIGlzIHRoZSBwbGFjZSwnIFByaXlhIHNheXMgc29mdGx5LiAnQW5kIHRvbmlnaHQncyB0aGUgZGF0ZSwgaWYgaGlzIG9sZCBub3RlcyBhcmUgcmlnaHQuIFNoYWxsIHdlIGZpbmQgb3V0IHdoYXQgaGUgYWN0dWFsbHkgbWVhbnQ/Jw==',
            'choices' => [
                ['text' => 'T3BlbiB0aGUgYXRsYXMgdG8gdGhlIGZpbmFsIHBhZ2U=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WW91IG9wZW4gdGhlIGF0bGFzIHRvIGl0cyBmaW5hbCBibGFuayBwYXRjaCBhcyBldmVuaW5nIHByb3Blcmx5IHNldHRsZXMgb3ZlciB0aGUgcGFkZG9jaywgYW5kIHRoZXJlLCBpbiBDb3J3aW4ncyBvd24gY2FyZWZ1bCBoYW5kLCBhIG5vdGUgeW91IHNvbWVob3cgbWlzc2VkIG9uIGV2ZXJ5IHByZXZpb3VzIHJlYWRpbmc6ICpJZiB5b3UndmUgY29tZSB0aGlzIGZhciwgeW91IGFscmVhZHkga25vdyB0aGUgYW5zd2VyIGlzbid0IHVwIHRoZXJlLiBJdCdzIHJpZ2h0IGhlcmUuIEl0IGFsd2F5cyB3YXMuKgoKQXMgaWYgaW4gYW5zd2VyLCB0aGUgc2t5IGFib3ZlIEFvcmFraSBNYWNrZW56aWUgYmVnaW5zIGl0cyBvd24gZmFtb3VzLCBkZXBlbmRhYmxlIGNsYXJpdHkg4oCUIHRoZSBzYW1lIGRhcmstc2t5IHJlc2VydmUgdGhhdCBzdGFydGVkIHRoaXMgd2hvbGUgam91cm5leSwgdGhlIHNhbWUgcGF0Y2ggb2Ygc2t5IENvcndpbiB3YXRjaGVkIGhpcyBlbnRpcmUgbGlmZS4=',
            'terminal' => true,
            'choices' => [
                ['text' => 'TG9vayB1cCBhdCB0aGUgc2t5IHByb3Blcmx5', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGxvb2sgdXAsIGFuZCB0aGUgd2hvbGUgc2t5IG9wZW5zIG92ZXJoZWFkIGV4YWN0bHkgYXMgaXQgYWx3YXlzIGhhcyBoZXJlIOKAlCBmYW1pbGlhciwgdW5kcmFtYXRpYywgaG9tZS4gTm90aGluZyBhYm91dCBpdCBpcyBkaWZmZXJlbnQgZnJvbSBhbnkgb3JkaW5hcnkgTWFja2V6bmllIG5pZ2h0LCBleGNlcHQgdGhhdCBub3csIGZvciB0aGUgZmlyc3QgdGltZSwgeW91IHVuZGVyc3RhbmQgZXZlcnkgc2luZ2xlIHBhdGNoIG9mIGl0LCBldmVyeSB0cmFkaXRpb24gYW5kIHN0b3J5IGFuZCBjYXJlZnVsLCBoYXJkLXdvbiBsZXNzb24gZ2F0aGVyZWQgZnJvbSBldmVyeSBjb3JuZXIgb2YgdGhlIEVhcnRoLgoKVGhlIGF0bGFzJ3MgZmluYWwgYW5zd2VyIGlzbid0IGEgbmV3IGNvbnN0ZWxsYXRpb24gYXQgYWxsLiBJdCdzIHNpbXBseSB0aGlzOiB0aGUgcmVhbCBza3ksIHByb3Blcmx5LCBmaW5hbGx5IHdob2xlLCBzZWVuIHdpdGggZXZlcnl0aGluZyB0aGUgam91cm5leSB0YXVnaHQgeW91Lg==',
            'choices' => [
                ['text' => 'RmlsbCB0aGUgbGFzdCBwYWdl', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'WW91IGRyYXcgbm90IGEgbmV3IHNoYXBlLCBidXQgYSBzaW1wbGUgbm90ZSBpbiB0aGUgYXRsYXMncyBmaW5hbCBibGFuayBwYXRjaCDigJQgdGhlIHBsYWNlLCB0aGUgZGF0ZSwgYW5kIGJlbmVhdGggaXQsIGluIHlvdXIgb3duIGhhbmQgYWxvbmdzaWRlIENvcndpbidzOiAqRmluaXNoZWQuIFByb3Blcmx5LiBBdCBsYXN0LiogUHJpeWEgd2F0Y2hlcyB3aXRoIHRlYXJzIHNoZSBkb2Vzbid0IGJvdGhlciBoaWRpbmcsIGFuZCBldmVuIFZvc3MsIHN0YW5kaW5nIHF1aWV0bHkgYXQgdGhlIHNoZWQncyBlZGdlLCBsb29rcyBtb3ZlZCBpbiBhIHdheSBoaXMgb2xkIGNvbXBvc2VkIGNlcnRhaW50eSBuZXZlciBvbmNlIGFsbG93ZWQuCgonSGUnZCBiZSBzbyBnbGFkLCcgUHJpeWEgZmluYWxseSBzYXlzLiAnTm90IGp1c3QgdGhhdCBpdCdzIGRvbmUuIFRoYXQgaXQgd2FzIHlvdSB3aG8gZmluaXNoZWQgaXQuJw==',
            'choices' => [
                ['text' => 'VHVybiB0byBWb3Nz', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'Vm9zcyBzdGVwcyBmb3J3YXJkIGhlc2l0YW50bHkuICdJIGNhbWUgdG8gc2VlIGl0IHByb3Blcmx5IGZpbmlzaGVkLCcgaGUgc2F5cy4gJ05vdCB0byBjbGFpbSBhbnl0aGluZy4gSSB1bmRlcnN0YW5kIG5vdyB0aGF0IGl0IHdhcyBuZXZlciBtaW5lIHRvIGNsYWltLicgSGUgc3R1ZGllcyB0aGUgY29tcGxldGVkIGF0bGFzIHdpdGggcmVhbCwgaHVtYmxlZCByZXNwZWN0LiAnVGhhbmsgeW91IGZvciBsZXR0aW5nIG1lIGJlIGhlcmUgZm9yIHRoaXMsIHJlZ2FyZGxlc3Mgb2YgZXZlcnl0aGluZyBJIGdvdCB3cm9uZyBhbG9uZyB0aGUgd2F5LicKCllvdSBub2QsIGFuZCBzb21ldGhpbmcgaW4gdGhlIHdob2xlIHN0cmFuZ2UsIGFkdmVyc2FyaWFsIHRocmVhZCBvZiB0aGlzIGpvdXJuZXkgZmluYWxseSwgcXVpZXRseSByZXNvbHZlcy4=',
            'choices' => [
                ['text' => 'U2l0IHdpdGggdGhlIGNvbXBsZXRlZCBhdGxhcyBhIHdoaWxl', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHNpdCB0b2dldGhlciBvdXRzaWRlIHRoZSBvbGQgb2JzZXJ2YXRvcnkgc2hlZCBhcyBmdWxsIGRhcmsgcHJvcGVybHkgc2V0dGxlcywgdGhlIGNvbXBsZXRlZCBhdGxhcyByZXN0aW5nIGNsb3NlZCBpbiB5b3VyIGxhcCwgZXZlcnkgcGFnZSBmaWxsZWQsIGV2ZXJ5IHJpZGRsZSBhbnN3ZXJlZCwgZXZlcnkgc3RvcnkgcHJvcGVybHksIHJlc3BlY3RmdWxseSByZWNvcmRlZC4gUHJpeWEgcG91cnMgb25lIGxhc3Qgc2hhcmVkIHRoZXJtb3MsIHN0ZWFtIGN1cmxpbmcgaW50byB0aGUgY29sZCwgZmFtaWxpYXIgTWFja2VuemllIGFpci4KCidXaGF0IGhhcHBlbnMgbm93Pycgc2hlIGZpbmFsbHkgYXNrcywgZWNob2luZyB0aGUgdmVyeSBxdWVzdGlvbiB0aGF0IHN0YXJ0ZWQgdGhpcyB3aG9sZSBqb3VybmV5Lg==',
            'choices' => [
                ['text' => 'U2F5IHRoZSBhdGxhcyBkb2Vzbid0IGhhdmUgdG8gYmUgdGhlIGVuZCBvZiB0aGUgbG9va2luZyB1cA==', 'next' => '8_end_continue'],
                ['text' => 'U2F5IHlvdSdyZSBmaW5hbGx5IHJlYWR5IHRvIGp1c3QgcmVzdCB3aXRoIHdoYXQgeW91J3ZlIGZvdW5k', 'next' => '8_end_rest'],
            ],
        ],
        '8_end_continue' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGRvbid0IHRoaW5rIHRoZSBhdGxhcyBoYXMgdG8gYmUgdGhlIGVuZCBvZiBsb29raW5nIHVwLCcgeW91IHNheSwgd2F0Y2hpbmcgdGhlIHNhbWUgZmFtaWxpYXIgTWFja2VuemllIHN0YXJzIHRoYXQgc3RhcnRlZCB0aGlzIHdob2xlIGpvdXJuZXkuICdDb3J3aW4gZmlsbGVkIG9uZSBib29rLiBNYXliZSB0aGVyZSdzIG1vcmUgc2t5IHRoYW4gYW55IHNpbmdsZSBhdGxhcyBjb3VsZCBldmVyIHByb3Blcmx5IGhvbGQuJwoKUHJpeWEncyBhbnN3ZXJpbmcgc21pbGUgaXMgd2lkZSwgdW5ndWFyZGVkLCBnZW51aW5lbHkgZGVsaWdodGVkLiAnTm93IHRoYXQncyBhIHRob3VnaHQgaGUnZCBoYXZlIGxvdmVkLiBTdWxpIGNlcnRhaW5seSBzZWVtcyB0byBhZ3JlZS4nIFRoZSBsaXR0bGUgZm94IGNoaXJydXBzIGhhcHBpbHkgZnJvbSBoZXIgbGFwLCBhbmQgb3ZlcmhlYWQsIEFvcmFraSBNYWNrZW56aWUncyBza3kgc2V0dGxlcyBpbnRvIHRoZSBzYW1lIHBhdGllbnQsIHdhaXRpbmcgZGFyayBpdCdzIGFsd2F5cyBrZXB0LCByZWFkeSBmb3Igd2hvZXZlciBsb29rcyB1cCBuZXh0Lg==',
            'ending' => true,
        ],
        '8_end_rest' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gZmluYWxseSByZWFkeSB0byBqdXN0IHJlc3Qgd2l0aCB3aGF0IEkndmUgZm91bmQsJyB5b3UgYWRtaXQsIGZlZWxpbmcgdGhlIHdob2xlIGVub3Jtb3VzIGpvdXJuZXkgc2V0dGxlIHByb3Blcmx5IGludG8gc29tZXRoaW5nIGxpa2UgcGVhY2UuICdOb3QgY2hhc2UgdGhlIG5leHQgcGF0Y2gsIG9yIHRoZSBuZXh0IHJpZGRsZS4gSnVzdCBzaXQgaGVyZSwgdW5kZXIgdGhpcyBza3ksIHdpdGggZXZlcnlvbmUgd2hvIGhlbHBlZCBtZSBmaW5pc2ggaXQuJwoKUHJpeWEgbGVhbnMgYmFjayBhZ2FpbnN0IHRoZSBzaGVkIHdhbGwsIGVudGlyZWx5IGNvbnRlbnQuICdUaGF0J3MgYSBnb29kIHBsYWNlIHRvIGxhbmQsIHRoaXMgZGVlcCBpbnRvIHRoaW5ncy4nIFN1bGkgY3VybHMgdXAgd2FybSBiZXR3ZWVuIHlvdSBib3RoLCBhbmQgb3ZlcmhlYWQsIEFvcmFraSBNYWNrZW56aWUncyBmYW1pbGlhciBzdGFycyBob2xkIHRoZWlyIHNhbWUgcGF0aWVudCwgdW5odXJyaWVkIHdhdGNoLCBleGFjdGx5IGFzIHRoZXkgYWx3YXlzIGhhdmUsIGV4YWN0bHkgYXMgdGhleSBhbHdheXMgd2lsbC4=',
            'ending' => true,
        ],
    ],
];
