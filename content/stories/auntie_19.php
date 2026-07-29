<?php
return [
    'id'    => 19,
    'title' => 'Quiet Hands For a While',
    'color' => '#3A8A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'Q2hhdGhhbSByaXNlcyBsb3cgYW5kIHdpbmRzd2VwdCBvdXQgb2YgYSBzdHJldGNoIG9mIG9jZWFuIHNvIGZhciBmcm9tIGFueXdoZXJlIHRoYXQgdGhlIG1hcHMgb2YgbW9zdCBvdGhlciBwbGFjZXMgc2ltcGx5IHN0b3AgYmVmb3JlIHRoZXkgZ2V0IGhlcmUg4oCUIGFtb25nIHRoZSBmaXJzdCBpbmhhYml0ZWQgZ3JvdW5kIG9uIEVhcnRoIHRvIHNlZSBlYWNoIG5ldyBzdW5yaXNlLCBTb2xhbmdlIG1lbnRpb25zLCB3aGljaCBmZWVscywgZ2l2ZW4gdGhlIGxhc3QgZmV3IGRheXMsIGxpa2UgZXhhY3RseSB0aGUga2luZCBvZiBxdWlldCBmYWN0IHlvdSBuZWVkZWQgdG8gaGVhciB0b2RheS4KCk5vYm9keSdzIHNhaWQgbXVjaCBhYm91dCBOb3Jmb2xrIHNpbmNlIHlvdSBsZWZ0IGl0LiBUaGUgS8WNdHVrdSdzIGJlZW4gdW51c3VhbGx5IHF1aWV0LCB0aGUgQmFyb24gaW5jbHVkZWQsIGV2ZXJ5b25lIHByb2Nlc3NpbmcgYW4gYWJzZW5jZSBpbiB0aGVpciBvd24gd2F5IHJhdGhlciB0aGFuIHRhbGtpbmcgYWJvdXQgaXQgZGlyZWN0bHkuCgpUd28gY29hc3RhbCByb3V0ZXMgcHJlc2VudCB0aGVtc2VsdmVzIHRvd2FyZCB0aGUgc2V0dGxlbWVudDogdGhlIHNoZWx0ZXJlZCBiYXkgc2lkZSwgb3IgdGhlIG9wZW4sIHdpbmQtc2NvdXJlZCBzaG9yZSBmYWNpbmcgdGhlIGVtcHR5IG9jZWFuIGJleW9uZC4=',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBzaGVsdGVyZWQgYmF5', 'next' => '2_bay'],
                ['text' => 'Rm9sbG93IHRoZSBvcGVuIHNob3Jl', 'next' => '2_shore'],
            ],
        ],
        '2_bay' => [
            'prose'  => 'VGhlIGJheSBzaWRlIGlzIGNhbG0sIGxvdyBzY3J1YiBiZW50IHBlcm1hbmVudGx5IHNpZGV3YXlzIGJ5IHdpbmQgdGhhdCdzIGNsZWFybHkgYmVlbiBibG93aW5nIGZyb20gdGhlIHNhbWUgZGlyZWN0aW9uIGZvciBhIHZlcnkgbG9uZyB0aW1lLCBhIGZldyBzY2F0dGVyZWQgaG91c2VzIGZhY2luZyB0aGUgd2F0ZXIgd2l0aCB0aGUgcGFydGljdWxhciBodW5rZXJlZC1kb3duIHJlc2lsaWVuY2Ugb2YgYSBwbGFjZSB0aGF0IHRha2VzIGl0cyB3ZWF0aGVyIHNlcmlvdXNseS4KCkFuIG9sZGVyIHdvbWFuIG1lbmRpbmcgYSBmZW5jZSBsb29rcyB1cCBhcyB5b3UgcGFzcywgcmVjb2duaXNpbmcgQXVudGllJ3MgbmFtZSB3aXRoIGEgc2xvdywgd2FybSBub2QuICdTaGUgY2FtZSBoZXJlIG9uY2UsIHF1aWV0IHNvcnQgb2YgdmlzaXQsJyBzaGUgc2F5cy4gJ0RpZG4ndCBhc2sgZm9yIG11Y2guIFNvbWUgcGVvcGxlIHVuZGVyc3RhbmQgdGhhdCB0aGlzIHBsYWNlIGRvZXNuJ3Qgd2FudCB0byBiZSBhc2tlZCBmb3IgbXVjaC4n',
            'choices' => [
                ['text' => 'QXNrIHdoZXJlIHRvIGZpbmQgaGVy', 'next' => '3_shared'],
            ],
        ],
        '2_shore' => [
            'prose'  => 'VGhlIG9wZW4gc2hvcmUgaGl0cyB5b3Ugd2l0aCB0aGUgd2luZCdzIGZ1bGwgaG9uZXN0IHdlaWdodCwgd2F2ZXMgd29ya2luZyBhbiBlbXB0eSBzdHJldGNoIG9mIG9jZWFuIGludG8gd2hpdGUgcmFua3MgdGhhdCByb2xsIGluIGZyb20gbm93aGVyZSBpbiBwYXJ0aWN1bGFyIGFuZCBnbyBub3doZXJlIGluIHBhcnRpY3VsYXIgZWl0aGVyLCB0aGUgaG9yaXpvbiBlbnRpcmVseSB1bmJyb2tlbiBpbiBldmVyeSBkaXJlY3Rpb24geW91IGxvb2suCgpBIG1hbiB3YWxraW5nIHRoZSB0aWRlbGluZSwgY29sbGVjdGluZyB3aGF0IHRoZSBsYXN0IHN0b3JtIGxlZnQgYmVoaW5kLCBzdHJhaWdodGVucyBhcyB5b3UgYXBwcm9hY2guIEhlIGtub3dzIEF1bnRpZSdzIG5hbWUgdG9vLCB0aGUgc2FtZSBxdWlldCByZWNvZ25pdGlvbiBhcyBldmVyeXdoZXJlIGVsc2Ugb24gdGhpcyB3aG9sZSBsb25nIGpvdXJuZXksIGFuZCBwb2ludHMgeW91IGZ1cnRoZXIgYWxvbmcgdG93YXJkIGEgaG91c2UgYXQgdGhlIHNldHRsZW1lbnQncyBlZGdlLg==',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIGhvdXNl', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHdvbWFuIGF0IHRoZSBob3VzZSDigJQgSGluZSwgc2hlIGludHJvZHVjZXMgaGVyc2VsZiwgdW5odXJyaWVkIOKAlCBoYXMgTW9yaW9yaSBoZXJpdGFnZSBvbiBvbmUgc2lkZSBvZiBoZXIgZmFtaWx5LCBhbmQgc3BlYWtzIGFib3V0IGl0IHBsYWlubHkgd2hlbiBpdCBjb21lcyB1cCwgdGhlIG9sZCBoaXN0b3J5IGhlcmUgYmVpbmcgb25lIG9mIHJlYWwgaGFyZHNoaXAgbWV0LCBldmVudHVhbGx5LCB3aXRoIGEgcmVtYXJrYWJsZSBhbmQgZGVsaWJlcmF0ZSBjaG9pY2UgdG93YXJkIHBlYWNlIHJhdGhlciB0aGFuIHJldGFsaWF0aW9uLiBTaGUgZG9lc24ndCBkd2VsbCBvbiBpdCwgZG9lc24ndCBwZXJmb3JtIGl0IGZvciB2aXNpdG9ycy4gSXQncyBzaW1wbHkgcGFydCBvZiB3aG8gc2hlIGlzLCBtZW50aW9uZWQgdGhlIHdheSB5b3UnZCBtZW50aW9uIHdoZXJlIHlvdSdyZSBmcm9tLgoKJ0F1bnRpZSBhc2tlZCBnb29kIHF1ZXN0aW9ucyB3aGVuIHNoZSBjYW1lIHRocm91Z2gsJyBIaW5lIHNheXMuICdEaWRuJ3QgdHJ5IHRvIHR1cm4gaXQgaW50byBhIGxlc3NvbiBmb3IgaGVyc2VsZi4gSnVzdCBsaXN0ZW5lZC4nIFNoZSBzdHVkaWVzIHlvdSBhIG1vbWVudC4gJ1lvdSBsb29rIGxpa2UgeW91J3JlIGNhcnJ5aW5nIHNvbWV0aGluZyBoZWF2aWVyIHRoYW4gdXN1YWwgdG9kYXksIHRob3VnaC4gU29tZXRoaW5nIGhhcHBlbiBiYWNrIHRoZSB3YXkgeW91IGNhbWU/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'VGVsbCBoZXIsIGJyaWVmbHksIGFib3V0IHRoZSByaXZhbA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IHRlbGwgaGVyIHRoZSBzaG9ydCB2ZXJzaW9uLCBjYXJlZnVsIG5vdCB0byBtYWtlIG1vcmUgb2YgaXQgdGhhbiBpdCB3YXMg4oCUIGEgZ29vZGJ5ZSwgYSByb2FkIHRoYXQgc3BsaXQsIG5vYm9keSBjaGFzaW5nIGFueWJvZHkgYW55bW9yZS4gSGluZSBsaXN0ZW5zIHRoZSB3aG9sZSB3YXkgdGhyb3VnaCB3aXRob3V0IGludGVycnVwdGluZywgdGhlbiBzaW1wbHkgbm9kcywgdW5zdXJwcmlzZWQsIGFzIHRob3VnaCBwYXJ0aW5ncyBsaWtlIHRoYXQgd2VyZSBhbiBlbnRpcmVseSBvcmRpbmFyeSBwYXJ0IG9mIGFueSBsb25nIGpvdXJuZXkuCgonR29vZCBzaGVsbHMgd2FzaCB1cCBhZnRlciBhIHBhcnRpbmcgbGlrZSB0aGF0LCcgc2hlIHNheXMsIGFwcm9wb3Mgb2YgdmVyeSBsaXR0bGUsIGFuZCBzaW1wbHkgYXMgZmFjdCByYXRoZXIgdGhhbiBzdXBlcnN0aXRpb24uICdSb2NrcG9vbHMgYXQgbG93IHRpZGUsIG9yIHRoZSBvcGVuIGJlYWNoIGFmdGVyIGxhc3Qgd2VlaydzIHN0b3JtLiBFaXRoZXIgb25lLCBpZiB5b3Ugd2FudCBxdWlldCBoYW5kcyBmb3IgYSB3aGlsZS4n',
            'choices' => [
                ['text' => 'U2VhcmNoIHRoZSByb2NrcG9vbHMgYXQgbG93IHRpZGU=', 'next' => '5_pools'],
                ['text' => 'QmVhY2hjb21iIHRoZSBzdG9ybS1jbGVhcmVkIHNob3Jl', 'next' => '5_beach'],
            ],
        ],
        '5_pools' => [
            'prose'  => 'VGhlIHJvY2twb29scyBhdCBsb3cgdGlkZSBhcmUgc3RpbGwsIGNsZWFyLCBjbG9zZSB3b3JrIOKAlCBjaGVja2luZyBlYWNoIG9uZSBjYXJlZnVsbHksIHBhdGllbnRseSwgZm9yIHRoZSBwYXJ0aWN1bGFyIGdsZWFtIG9mIHNoZWxsIHJhdGhlciB0aGFuIHN0b25lLiBJdCdzIHNsb3csIGNvbnRlbXBsYXRpdmUgd29yaywgZXhhY3RseSB0aGUga2luZCB0aGF0IGxldHMgYSBtaW5kIHF1aWV0bHkgZmluaXNoIHByb2Nlc3Npbmcgc29tZXRoaW5nIHdpdGhvdXQgYmVpbmcgYXNrZWQgdG8gdGFsayBhYm91dCBpdCBkaXJlY3RseS4KCllvdSBmaW5kLCBldmVudHVhbGx5LCBhIHNpbmdsZSBwYXVhIHNoZWxsIGZyYWdtZW50LCBzZWEtdHVtYmxlZCBzbW9vdGgsIGl0cyBpbm5lciBzdXJmYWNlIGNhdGNoaW5nIHRoZSBsaWdodCBpbiBzaGlmdGluZyBibHVlcyBhbmQgZ3JlZW5zIHRoYXQgc2VlbSB0byBob2xkIG1vcmUgY29sb3VyIHRoYW4gYW55IG9uZSBhbmdsZSBzaG91bGQgYmUgYWJsZSB0byBzaG93Lg==',
            'choices' => [
                ['text' => 'QnJpbmcgaXQgYmFjayB0byBIaW5l', 'next' => '6_shared'],
            ],
        ],
        '5_beach' => [
            'prose'  => 'VGhlIHN0b3JtLWNsZWFyZWQgYmVhY2ggaXMgd2lkZSBvcGVuLCB3aW5kLXNjb3VyZWQsIGxpdHRlcmVkIHdpdGggd2hhdGV2ZXIgbGFzdCB3ZWVrJ3Mgd2VhdGhlciBkZWNpZGVkIHRvIGdpdmUgdXAg4oCUIGtlbHAsIGRyaWZ0d29vZCwgdGhlIG9jY2FzaW9uYWwgZ2VudWluZSBmaW5kIGFtb25nIGEgZ3JlYXQgZGVhbCBvZiBvcmRpbmFyeSBkZWJyaXMuIEl0IHRha2VzIGEgbG9uZ2VyLCBtb3JlIHJlc3RsZXNzIGtpbmQgb2Ygc2VhcmNoaW5nLCBtYXRjaGluZyB0aGUgbW9vZCB5b3UndmUgYmVlbiBjYXJyeWluZyBzaW5jZSBOb3Jmb2xrIG1vcmUgaG9uZXN0bHkgdGhhbiB0aGUgcXVpZXQgcm9ja3Bvb2xzIHdvdWxkIGhhdmUuCgpZb3UgZmluZCwgZXZlbnR1YWxseSwgYSBzaW5nbGUgcGF1YSBzaGVsbCBmcmFnbWVudCwgc2VhLXR1bWJsZWQgc21vb3RoLCBpdHMgaW5uZXIgc3VyZmFjZSBjYXRjaGluZyB0aGUgbGlnaHQgaW4gc2hpZnRpbmcgYmx1ZXMgYW5kIGdyZWVucyB0aGF0IHNlZW0gdG8gaG9sZCBtb3JlIGNvbG91ciB0aGFuIGFueSBvbmUgYW5nbGUgc2hvdWxkIGJlIGFibGUgdG8gc2hvdy4=',
            'choices' => [
                ['text' => 'QnJpbmcgaXQgYmFjayB0byBIaW5l', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SGluZSB0dXJucyB0aGUgZnJhZ21lbnQgb3ZlciBpbiB0aGUgbGlnaHQsIGFwcHJvdmluZy4gJ1RoYXQgb25lJ2xsIGRvIG1vcmUgdGhhbiBmaW5lIGZvciB0aGUgd2luZG93LCcgc2hlIHNheXMuICdDb2xvdXIgdGhhdCBzaGlmdHMgZGVwZW5kaW5nIGhvdyB5b3UncmUgc3RhbmRpbmcgd2hlbiB5b3UgbG9vayBhdCBpdC4gRmVlbHMgYWJvdXQgcmlnaHQsIGZvciB0b2RheS4nCgpTaGUgZG9lc24ndCBlbGFib3JhdGUgZnVydGhlciwgYW5kIGRvZXNuJ3QgbmVlZCB0by4gU29tZSBkYXlzIGdpdmUgdXAgZXhhY3RseSB0aGUgb2JqZWN0IHRoZXkgc2hvdWxkLCB3aXRob3V0IGFueW9uZSBoYXZpbmcgdG8gZXhwbGFpbiB3aHku',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBoZWFkIGJhY2sgdG8gdGhlIHNoaXA=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0byB0aGUgYW5jaG9yYWdlIGluIHRoZSBsYXN0IG9mIHRoZSBkYXkncyBncmV5IGxpZ2h0LCB3aW5kIHN0ZWFkeSwgb2NlYW4gZW5vcm1vdXMgYW5kIGVtcHR5IGluIGV2ZXJ5IGRpcmVjdGlvbiwgdGhlIEJhcm9uIHVudXN1YWxseSBzdWJkdWVkIG9uIHlvdXIgc2hvdWxkZXIgcmF0aGVyIHRoYW4gaGlzIHVzdWFsIHBlcmNoIG9uIHRoZSByaWdnaW5nLgoKU29sYW5nZSwgY2hlY2tpbmcgdGhlIEvFjXR1a3Ugb3ZlciB3aXRoIG1vcmUgY2FyZSB0aGFuIHRoZSBldmVuaW5nIHN0cmljdGx5IHJlcXVpcmVzLCBkb2Vzbid0IGFzayBob3cgdGhlIHZpc2l0IHdlbnQuIFNoZSdzIHdhdGNoaW5nIHRoZSBob3Jpem9uIGluc3RlYWQsIHRoZSBwYXJ0aWN1bGFyIHdhdGNoaW5nIG9mIHNvbWVvbmUgZ2l2aW5nIGFuIGFic2VuY2Ugcm9vbSB0byBiZSBleGFjdGx5IGFzIHByZXNlbnQgYXMgaXQgbmVlZHMgdG8gYmUgZm9yIG9uZSBtb3JlIGV2ZW5pbmcu',
            'choices' => [
                ['text' => 'U2l0IHVwIHdpdGggaGVyIGEgd2hpbGUgYmVmb3JlIHR1cm5pbmcgaW4=', 'next' => '8_end_sit'],
                ['text' => 'VHVybiBpbiBlYXJseSBhbmQgbGV0IHRvbW9ycm93IGJlIGEgZnJlc2ggc3RhcnQ=', 'next' => '8_end_fresh'],
            ],
        ],
        '8_end_sit' => [
            'prose'  => 'WW91IHNpdCB1cCB3aXRoIGhlciBhIHdoaWxlLCBuZWl0aGVyIG9mIHlvdSBzYXlpbmcgbXVjaCwgdGhlIEvFjXR1a3Ugcm9ja2luZyBnZW50bHkgYXQgYW5jaG9yIHVuZGVyIGEgc2t5IGFscmVhZHkgc3RhcnRpbmcgdG8gZWFybiBpdHMgcmVwdXRhdGlvbiBmb3IgZWFybHkgc3VucmlzZXMuIFNvbGFuZ2UgcG91cnMgaGVyIHJ1bSwgc2FtZSBhcyBhbHdheXMsIGFuZCwgdW51c3VhbGx5LCBkb2Vzbid0IGRyaW5rIGl0IGFsb25lIOKAlCBwYXNzZXMgeW91IGEgc21hbGwgbWVhc3VyZSB0b28sIHdpdGhvdXQgY29tbWVudCwgd2l0aG91dCBjZXJlbW9ueS4KCllvdSBkb24ndCB0b2FzdCB0byBhbnl0aGluZyBpbiBwYXJ0aWN1bGFyLiBTb21lIGV2ZW5pbmdzIGp1c3Qgd2FudCBjb21wYW55IGluc3RlYWQgb2Ygd29yZHMsIGFuZCB0aGlzLCBpdCB0dXJucyBvdXQsIGlzIGV4YWN0bHkgb25lIG9mIHRob3NlLg==',
            'ending' => true,
        ],
        '8_end_fresh' => [
            'prose'  => 'WW91IHR1cm4gaW4gZWFybHkgaW5zdGVhZCwgdGlyZWQgaW4gdGhlIHBhcnRpY3VsYXIgd2F5IHRoYXQgcHJvY2Vzc2luZyBzb21ldGhpbmcgcXVpZXRseSBhbGwgZGF5IGxlYXZlcyB5b3UsIGFuZCBsZXQgdG9tb3Jyb3cgc3RhcnQgdGhlIGJ1c2luZXNzIG9mIGJlaW5nIGEgZnJlc2ggc3RyZXRjaCBvZiBvY2VhbiByYXRoZXIgdGhhbiBhIGNvbnRpbnVhdGlvbiBvZiB5ZXN0ZXJkYXkncyBnb29kYnllLgoKWW91IHdha2UgYmVmb3JlIGRhd24gd2l0aG91dCBtZWFuaW5nIHRvLCBpbiB0aW1lIHRvIGNhdGNoIHRoZSB2ZXJ5IGZpcnN0IGVkZ2Ugb2Ygc3VubGlnaHQgZmluZGluZyB0aGlzIHJlbW90ZSwgd2luZHN3ZXB0IGNvcm5lciBvZiB0aGUgd29ybGQgYmVmb3JlIGFsbW9zdCBhbnl3aGVyZSBlbHNlIG9uIEVhcnRoIGdldHMgdG8gc2VlIGl0IOKAlCBhbmQgZmluZCwgd2F0Y2hpbmcgaXQsIHRoYXQgZ3JpZWYgYW5kIGZvcndhcmQgbW90aW9uIGFyZSBhcHBhcmVudGx5IGFibGUgdG8gc2l0IGluIHRoZSBzYW1lIHF1aWV0IHJvb20gdG9nZXRoZXIgd2l0aG91dCBlaXRoZXIgb25lIG5lZWRpbmcgdG8gd2luLg==',
            'ending' => true,
        ],
    ],
];
