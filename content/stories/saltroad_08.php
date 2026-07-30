<?php
return [
    'id'    => 8,
    'title' => 'Not Dangerous. Just Persistent.',
    'color' => '#7A8A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEthcmFrb3J1bSBzdGVwcGUgc3RyZXRjaGVzIHZhc3QgYW5kIHdpbmRzd2VwdCwgZ3Jhc3MgcmlwcGxpbmcgaW4gc2lsdmVyLWdyZWVuIHdhdmVzIHRvd2FyZCBhIGhvcml6b24gdGhhdCBzZWVtcyB0byBnZW51aW5lbHkgbmV2ZXIgZW5kLCBnZXJzIHNjYXR0ZXJlZCBhdCBkaXN0YW5jZXMgdGhhdCBvbmx5IG1ha2Ugc2Vuc2Ugb25jZSB5b3UgdW5kZXJzdGFuZCBob3cgbXVjaCBzcGFjZSBlYWNoIGhlcmRpbmcgZmFtaWx5IGFjdHVhbGx5IG5lZWRzLiBUb21hcyBzY2FucyB0aGUgb3BlbiBncm91bmQgd2l0aCByZWFsLCBwcmFjdGlzZWQgYXR0ZW50aW9uLgoKVHdvIHJvdXRlcyBhY3Jvc3MgdGhlIHN0ZXBwZSB0b3dhcmQgdGhlIGhlcmRpbmcgZmFtaWx5IHByZXNlbnQgdGhlbXNlbHZlczogdGhlIGRpcmVjdCBsaW5lLCBmYXN0ZXIgYnV0IGNyb3NzaW5nIG9wZW4sIGV4cG9zZWQgZ3JvdW5kLCBvciBhIGxvbmdlciByb3V0ZSBmb2xsb3dpbmcgYSBkcnkgcml2ZXJiZWQsIHNsb3dlciBidXQgb2ZmZXJpbmcgcmVhbCBzaGVsdGVyIGZyb20gdGhlIHdpbmQu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZGlyZWN0IGxpbmU=', 'next' => '2_direct'],
                ['text' => 'Rm9sbG93IHRoZSBkcnkgcml2ZXJiZWQ=', 'next' => '2_riverbed'],
            ],
        ],
        '2_direct' => [
            'prose'  => 'VGhlIGRpcmVjdCByb3V0ZSBjcm9zc2VzIG9wZW4gc3RlcHBlIHdpdGggbm90aGluZyBiZXR3ZWVuIHlvdSBhbmQgdGhlIHdpbmQsIGdyYXNzIHJpcHBsaW5nIGluIGdlbnVpbmUsIGh5cG5vdGljIHdhdmVzIHRoZSB3aG9sZSBleHBvc2VkIHdheS4gSXQncyBmYXN0LCBidXQgdGlyaW5nLCB0aGUgY29uc3RhbnQgd2luZCB3b3JraW5nIGF0IHlvdSB3aXRoIGEgcGVyc2lzdGVuY2UgdGhhdCBuZXZlciBxdWl0ZSBsZXRzIHVwLgoKWW91IGFycml2ZSBhdCB0aGUgZmFtaWx5J3MgZ2VyIHdpbmRzd2VwdCBhbmQgc2xpZ2h0bHkgZGlzb3JpZW50ZWQgYnkgdGhlIHNoZWVyLCBmZWF0dXJlbGVzcyBzY2FsZSBvZiB0aGUgb3BlbiBncm91bmQu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdlcg==', 'next' => '3_shared'],
            ],
        ],
        '2_riverbed' => [
            'prose'  => 'VGhlIGRyeSByaXZlcmJlZCBvZmZlcnMgcmVhbCBzaGVsdGVyIGZyb20gdGhlIHdvcnN0IG9mIHRoZSB3aW5kLCBpdHMgYmFua3MgcHJvdmlkaW5nIGdlbnVpbmUgcmVsaWVmIGV2ZW4gd2l0aG91dCBhbnkgYWN0dWFsIHdhdGVyIGluIGl0IHRoaXMgc2Vhc29uLiBJdCdzIGEgbG9uZ2VyIHJvdXRlLCBidXQgYSBjb25zaWRlcmFibHkgbW9yZSBjb21mb3J0YWJsZSBvbmUsIHRoZSB3YWxraW5nIGVhc2llciB3aXRoIHRoZSB3aW5kIG1vc3RseSBibG9ja2VkLgoKWW91IGFycml2ZSBhdCB0aGUgZmFtaWx5J3MgZ2VyIGNvbnNpZGVyYWJseSBsZXNzIHdpbmRzd2VwdCwgYW5kIHdpdGggcmVhbCBhcHByZWNpYXRpb24gZm9yIHRoZSBzaGVsdGVyIHRoZSBlbXB0eSByaXZlcmJlZCBwcm92aWRlZC4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdlcg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhbWlseSByZWNvZ25pc2VzIHRoZSBzZWFsLWNhc2UgaXRzZWxmIGJlZm9yZSB0aGV5IGV2ZW4gcHJvcGVybHkgbG9vayBhdCB5b3Ug4oCUIGEgZmxpY2tlciBvZiB3YXJ5IHJlY29nbml0aW9uIHRoYXQgaGFzIG5vdGhpbmcgdG8gZG8gd2l0aCBob3NwaXRhbGl0eSBhbmQgZXZlcnl0aGluZyB0byBkbyB3aXRoIGEgbWFuIGFscmVhZHkgc3RhbmRpbmcgaW4gdGhlaXIgZG9vcndheSB3aGVuIHlvdSBhcnJpdmUuIE9sZCBCZXJrYW50LCBicm9hZCBhbmQgd2VhdGhlcmVkIGFuZCB2aXNpYmx5IGRpc3BsZWFzZWQgYXQgeW91ciBhcHBlYXJhbmNlLCBkb2Vzbid0IGJvdGhlciB3aXRoIGludHJvZHVjdGlvbnMuCgonQW5vdGhlciBvbmUgb2YgWXNvbGRlJ3MgcGVvcGxlLCcgaGUgc2F5cywgZmxhdCBhbmQgdW5pbXByZXNzZWQuICdIZXIgZmFtaWx5IG93ZXMgbXkgZmFtaWx5IHRvbywgeW91IGtub3cuIENvbnZlbmllbnQsIHRoYXQgeW91IG9ubHkgZXZlciBzZWVtIHRvIGNvbGxlY3QgYW5kIG5ldmVyIHJlcGF5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'UmVzcG9uZCB0byBoaW0=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGNvdWxkIGNvbmZyb250IGhpbSBkaXJlY3RseSwgcGxhaW5seSBkaXNwdXRpbmcgaGlzIGNsYWltIGFuZCBkZW1hbmRpbmcgaGUgc3Vic3RhbnRpYXRlIGl0IHByb3Blcmx5IGJlZm9yZSBtYWtpbmcgYWNjdXNhdGlvbnMgaW4gc29tZW9uZSBlbHNlJ3MgaG9tZSwgb3IgeW91IGNvdWxkIHdvcmsgYXJvdW5kIHRoZSB0ZW5zaW9uIGRpcGxvbWF0aWNhbGx5LCBmb2N1c2luZyBvbiB0aGUgZmFtaWx5J3Mgb3duIG5lZWRzIHJhdGhlciB0aGFuIGVuZ2FnaW5nIEJlcmthbnQncyBncmlldmFuY2UgaGVhZC1vbiByaWdodCBub3cuCgpUaGUgZmFtaWx5IHdhdGNoZXMgYm90aCBvZiB5b3UgY2FyZWZ1bGx5LCBjbGVhcmx5IHVuY29tZm9ydGFibGUgYmVpbmcgY2F1Z2h0IGJldHdlZW4gYW4gb2xkLCB1bnJlc29sdmVkIGRpc3B1dGUgdGhleSBkaWRuJ3QgYXNrIHRvIGhvc3Qu',
            'choices' => [
                ['text' => 'Q29uZnJvbnQgaGltIGRpcmVjdGx5', 'next' => '5_confront'],
                ['text' => 'Rm9jdXMgb24gdGhlIGZhbWlseSBpbnN0ZWFk', 'next' => '5_focus'],
            ],
        ],
        '5_confront' => [
            'prose'  => 'WW91IGNvbmZyb250IGhpbSBwbGFpbmx5LCBhc2tpbmcgZXhhY3RseSB3aGF0IGRlYnQgaGUncyByZWZlcnJpbmcgdG8gYW5kIGV4YWN0bHkgd2hhdCBwcm9vZiBoZSBhY3R1YWxseSBoYXMgb2YgaXQuIEJlcmthbnQsIGNhdWdodCBzbGlnaHRseSBvZmYgZ3VhcmQgYnkgdGhlIGRpcmVjdCBjaGFsbGVuZ2UsIGJsdXN0ZXJzIGJ1dCBjYW4ndCBpbW1lZGlhdGVseSBwcm9kdWNlIGFueXRoaW5nIG1vcmUgY29uY3JldGUgdGhhbiBvbGQgZmFtaWx5IGdyaWV2YW5jZSBhbmQgZ2VuZXJhbCByZXNlbnRtZW50LgoKJ1dlJ2xsIHNldHRsZSB0aGF0IHByb3Blcmx5LCBhbm90aGVyIHRpbWUsJyBoZSBzYXlzLCByZXRyZWF0aW5nIHdpdGhvdXQgcXVpdGUgYmFja2luZyBkb3duLiBUaGUgZmFtaWx5LCByZWxpZXZlZCB0aGUgY29uZnJvbnRhdGlvbiBkaWRuJ3QgZXNjYWxhdGUgZnVydGhlciwgcmVsYXhlcyB2aXNpYmx5Lg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIGZhbWlseSBzYXlz', 'next' => '6_shared'],
            ],
        ],
        '5_focus' => [
            'prose'  => 'WW91IHR1cm4geW91ciBhdHRlbnRpb24gdG8gdGhlIGZhbWlseSBpbnN0ZWFkLCBkZWxpYmVyYXRlbHkgbm90IGVuZ2FnaW5nIEJlcmthbnQncyBwcm92b2NhdGlvbiwgYXNraW5nIHNpbXBseSBhbmQgZGlyZWN0bHkgd2hhdCB0aGV5IGFjdHVhbGx5IG5lZWQgZnJvbSB5b3UgdG8gZmFpcmx5IHBhcnQgd2l0aCB0aGUgd2VkZ2UuIEJlcmthbnQsIGRlbmllZCB0aGUgY29uZnJvbnRhdGlvbiBoZSB3YXMgY2xlYXJseSBob3BpbmcgZm9yLCBzaW1tZXJzIHZpc2libHkgYnV0IGRvZXNuJ3QgcHJlc3MgZnVydGhlci4KClRoZSBmYW1pbHksIGdyYXRlZnVsIGZvciB0aGUgZGUtZXNjYWxhdGlvbiwgd2FybXMgdG8geW91IGNvbnNpZGVyYWJseSBmYXN0ZXIgdGhhbiB0aGV5IG1pZ2h0IGhhdmUgb3RoZXJ3aXNlLg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIGZhbWlseSBzYXlz', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIGZhbWlseSBleHBsYWluczogdGhlIHdlZGdlIGNhbWUgdG8gdGhlbSBob25lc3RseSwgZGVjYWRlcyBiYWNrLCB0cmFkZWQgZmFpcmx5IGZvciB3aW50ZXIgc2hlbHRlciBkdXJpbmcgYSBnZW51aW5lbHkgYnJ1dGFsIHN0b3JtLiBUaGV5IGhhbmQgaXQgb3ZlciB3aXRob3V0IG11Y2ggZnVydGhlciBjZXJlbW9ueSwgY2xlYXJseSBtb3JlIGludGVyZXN0ZWQgaW4gYmVpbmcgZG9uZSB3aXRoIHRoZSB3aG9sZSB0ZW5zZSBzaXR1YXRpb24gdGhhbiBpbiBleHRyYWN0aW5nIGFueXRoaW5nIGZ1cnRoZXIgZnJvbSB5b3UuCgpCZXJrYW50LCB3YXRjaGluZyBmcm9tIHRoZSBkb29yd2F5LCBtdXR0ZXJzIHNvbWV0aGluZyBhYm91dCBmb2xsb3dpbmcgeW91ciByb3V0ZSBtb3JlIGNsb3NlbHkgZnJvbSBoZXJlIG9uLiBJdCBkb2Vzbid0IHNvdW5kIGxpa2UgYSB0aHJlYXQgZXhhY3RseS4gSXQgc291bmRzIG1vcmUgbGlrZSBhIG1hbiB3aG8ncyBkZWNpZGVkLCBob3dldmVyIGdydWRnaW5nbHksIHRoYXQgeW91J3JlIHdvcnRoIGFjdHVhbGx5IHBheWluZyBhdHRlbnRpb24gdG8u',
            'choices' => [
                ['text' => 'VGhhbmsgdGhlIGZhbWlseSBhbmQgc3RhcnQgYmFjaw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIHRoZSBLYXJha29ydW0gc3RlcHBlIHN0cmV0Y2hpbmcgdmFzdCBhbmQgc2lsdmVyLWdyZWVuIGluIGV2ZXJ5IGRpcmVjdGlvbiwgQmVya2FudCdzIGdlci1jYW1wIHNocmlua2luZyBiZWhpbmQgeW91IGFzIHlvdSBnby4gVG9tYXMsIG9uY2UgeW91J3JlIGNsZWFyLCBsZXRzIG91dCBhIGJyZWF0aCBoZSdkIGNsZWFybHkgYmVlbiBob2xkaW5nLgoKJ0hlJ3MgYSByZWFsIHByb2JsZW0sIHRoYXQgb25lLCcgVG9tYXMgc2F5cy4gJ05vdCBkYW5nZXJvdXMsIGV4YWN0bHkuIEp1c3QgcGVyc2lzdGVudCwgYW5kIGNvbnZpbmNlZCBoZSdzIG93ZWQgc29tZXRoaW5nLiBXZSdsbCBsaWtlbHkgc2VlIGhpbSBhZ2Fpbi4n',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBub3QgbG9va2luZyBmb3J3YXJkIHRvIHRoYXQ=', 'next' => '8_end_dread'],
                ['text' => 'U2F5IHlvdSdkIHJhdGhlciByZXNvbHZlIGl0IHRoYW4gYXZvaWQgaXQ=', 'next' => '8_end_resolve'],
            ],
        ],
        '8_end_dread' => [
            'prose'  => 'J0knbSBub3QgbG9va2luZyBmb3J3YXJkIHRvIHRoYXQsIGhvbmVzdGx5LCcgeW91IGFkbWl0LCB3YXRjaGluZyB0aGUgc3RlcHBlIHJvbGwgYnkgYmVuZWF0aCB0aGUgY2FyYXZhbi4gVGhlcmUncyBzb21ldGhpbmcgZ2VudWluZWx5IHdlYXJpbmcgYWJvdXQgYW4gdW5yZXNvbHZlZCBncnVkZ2UgdHJhaWxpbmcgYWxvbmcgYmVoaW5kIHRoZSB3aG9sZSByZXN0IG9mIHRoaXMgam91cm5leS4KClRvbWFzIGRvZXNuJ3Qgb2ZmZXIgZmFsc2UgY29tZm9ydC4gJ0ZhaXIgZW5vdWdoLiBTb21lIHRoaW5ncyBhcmUganVzdCB0aXJpbmcsIGhvd2V2ZXIgdGhleSBldmVudHVhbGx5IHJlc29sdmUuIFdlJ2xsIG1hbmFnZSBpdCB3aGVuIGl0IGNvbWVzLic=',
            'ending' => true,
        ],
        '8_end_resolve' => [
            'prose'  => 'J0knZCBob25lc3RseSByYXRoZXIgcmVzb2x2ZSBpdCB0aGFuIGp1c3Qga2VlcCBhdm9pZGluZyBpdCwnIHlvdSBzYXksIHN1cnByaXNpbmcgeW91cnNlbGYgYSBsaXR0bGUgd2l0aCBob3cgbXVjaCB5b3UgbWVhbiBpdC4gJ1doYXRldmVyIGhpcyBhY3R1YWwgZ3JpZXZhbmNlIGlzLCBkcmFnZ2luZyBpdCBvdXQgdW5yZXNvbHZlZCBkb2Vzbid0IGhlbHAgZWl0aGVyIG9mIHVzLicKClRvbWFzIGxvb2tzIGF0IHlvdSB3aXRoIHNvbWV0aGluZyBsaWtlIHJlYWwgYXBwcm92YWwuICdUaGF0J3MgdGhlIHJpZ2h0IGluc3RpbmN0LiBZc29sZGUncyB3aG9sZSBsaWZlIHdhcyBidWlsdCBvbiBhY3R1YWxseSByZXNvbHZpbmcgdGhpbmdzIGluc3RlYWQgb2YganVzdCBvdXRydW5uaW5nIHRoZW0uIEdvb2Qgc2lnbiwgdGhhdCB5b3UncmUgYWxyZWFkeSB0aGlua2luZyB0aGUgc2FtZSB3YXkuJw==',
            'ending' => true,
        ],
    ],
];
