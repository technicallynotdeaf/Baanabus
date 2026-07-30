<?php
return [
    'id'    => 18,
    'title' => 'Word\'s the Only Currency',
    'color' => '#8A5A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEdyZWF0IERpdmlkaW5nIFJhbmdlIHVuc3Bvb2xzIGluIGxvbmcsIGRyeSByaWRnZWxpbmVzIHRocm91Z2ggdGhlIEF1c3RyYWxpYW4gb3V0YmFjaywgZHJvdmluZyBjb3VudHJ5IHdoZXJlIGNhdHRsZSBhbmQgdGhlIHBlb3BsZSB3aG8gbW92ZSB0aGVtIGNvdmVyIGdlbnVpbmVseSBlbm9ybW91cyBkaXN0YW5jZXMgb24gbm90aGluZyBidXQgcGF0aWVuY2UgYW5kIGhhcmQtZWFybmVkIGxvY2FsIGtub3dsZWRnZS4gR3JldGEgbW9vcnMgdGhlIENvbnRvdXIgbmVhciBhIGRyeSBjcmVlayBiZWQsIGV5ZWluZyB0aGUgdmFzdCBmbGF0IGRpc3RhbmNlcyB3aXRoIHJlYWwgcmVzcGVjdC4KClR3byB3YXlzIHRvIGZpbmQgdGhlIGRyb3ZlciB3aG8gbWlnaHQga25vdyBhYm91dCB0aGUgbWlzc2luZyB0cmlwb2QgY2xhbXAgcHJlc2VudCB0aGVtc2VsdmVzOiBmb2xsb3dpbmcgdGhlIGRyb3Zpbmcgcm91dGUgaXRzZWxmLCBob3BpbmcgdG8gY2F0Y2ggdXAgd2l0aCB0aGUgbW9iIGluIHRyYW5zaXQsIG9yIGFza2luZyBhdCB0aGUgbGFzdCBob21lc3RlYWQgeW91IHBhc3NlZCwgd2hlcmUgc29tZW9uZSBtaWdodCBrbm93IGV4YWN0bHkgd2hlcmUgdGhleSd2ZSBjdXJyZW50bHkgY2FtcGVkLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBkcm92aW5nIHJvdXRl', 'next' => '2_route'],
                ['text' => 'QXNrIGF0IHRoZSBob21lc3RlYWQ=', 'next' => '2_homestead'],
            ],
        ],
        '2_route' => [
            'prose'  => 'Rm9sbG93aW5nIHRoZSBkcm92aW5nIHJvdXRlIG1lYW5zIHJlYWRpbmcgZHVzdCBhbmQgY2F0dGxlLXNpZ24gYWNyb3NzIGdlbnVpbmVseSB2YXN0IGRpc3RhbmNlcywgdGhlIG1vYidzIHBhc3NhZ2UgdmlzaWJsZSBpbiBmbGF0dGVuZWQgZ3Jhc3MgYW5kIGNodXJuZWQgZWFydGggbG9uZyBiZWZvcmUgeW91IGNhdGNoIHNpZ2h0IG9mIGFueSBhY3R1YWwgY2F0dGxlLiBJdCdzIHNsb3csIGhvdCwgcGF0aWVudCB3b3JrLCB0aGUgb3V0YmFjaydzIHNjYWxlIG1ha2luZyBldmVyeSBsYW5kbWFyayBmZWVsIHNpbXVsdGFuZW91c2x5IGNsb3NlIGFuZCBpbXBvc3NpYmx5IGZhci4KCllvdSBjYXRjaCB1cCB0byB0aGUgbW9iIGJ5IGxhdGUgYWZ0ZXJub29uLCBkdXN0IGhhbmdpbmcgdGhpY2sgaW4gdGhlIGxvdyBzdW4sIGEgbG9uZSByaWRlciBwZWVsaW5nIG9mZiB0byBpbnZlc3RpZ2F0ZSB5b3VyIGFwcHJvYWNoLg==',
            'choices' => [
                ['text' => 'SW50cm9kdWNlIHlvdXJzZWxm', 'next' => '3_shared'],
            ],
        ],
        '2_homestead' => [
            'prose'  => 'VGhlIGhvbWVzdGVhZCBpcyBleGFjdGx5IHRoZSBraW5kIG9mIGlzb2xhdGVkLCBzZWxmLXN1ZmZpY2llbnQgb3BlcmF0aW9uIHRoZSBvdXRiYWNrIHNlZW1zIHRvIHNwZWNpYWxpc2UgaW4sIHRoZSBmYW1pbHkgdGhlcmUgZ2VuZXJvdXMgd2l0aCBkaXJlY3Rpb25zIG9uY2UgeW91ciBlcnJhbmQncyBleHBsYWluZWQuICdCaWxsJ3MgbW9iLCcgdGhlIGhvbWVzdGVhZCdzIG93bmVyIHNheXMuICdGb2xsb3cgdGhlIGZlbmNlIGxpbmUgdHdvIGRheXMgb3V0LCB5b3UnbGwgZmluZCB0aGVtLiBBbmQgdGVsbCBoaW0gdGhlIG90aGVyIGZlbGxvdyB3aG8gY2FtZSB0aHJvdWdoIGFscmVhZHkgdHJpZWQgdGhlIHNhbWUgc2hvcnRjdXQgeW91J3JlIHByb2JhYmx5IGhvcGluZyBmb3IuIERpZG4ndCB3b3JrIG91dCBmb3IgaGltLic=',
            'choices' => [
                ['text' => 'SGVhZCBvdXQgdG8gZmluZCB0aGVt', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'QmlsbCwgdGhlIGhlYWQgZHJvdmVyLCBpcyB3ZWF0aGVyZWQsIHBsYWluLXNwb2tlbiwgYW5kIGVudGlyZWx5IHVuaW1wcmVzc2VkIGJ5IGFueW9uZSB3aG8gYXJyaXZlcyBleHBlY3RpbmcgcXVpY2sgYW5zd2VycyBpbiBjb3VudHJ5IHRoYXQgcHVuaXNoZXMgZXhhY3RseSB0aGF0IGtpbmQgb2YgaW1wYXRpZW5jZS4gJ1lvdSdsbCBiZSBhZnRlciB0aGUgc2FtZSB0aGluZyB0aGF0IG90aGVyIGJsb2tlIHdhcyBhZnRlciwnIGhlIHNheXMuICdSZXllcywgb3Igd2hhdGV2ZXIgaGlzIG5hbWUgd2FzLiBTaGFycCBmZWxsb3cuIENsZXZlci4gVHJpZWQgdG8gdGFsayBoaXMgd2F5IHJvdW5kIGEgc3RyYWlnaHQgYW5zd2VyIGluc3RlYWQgb2YganVzdCBnaXZpbmcgb25lLicgQmlsbCBzaGFrZXMgaGlzIGhlYWQgc2xvd2x5LiAnRGlkbid0IGdvIHdlbGwgZm9yIGhpbS4gSSBkb24ndCBoYW5kIGFueXRoaW5nIHRvIHBlb3BsZSB3aG8gd29uJ3QganVzdCBiZSBzdHJhaWdodCB3aXRoIG1lLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGFwcGVuZWQgdG8gUmV5ZXM=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'QmlsbCBleHBsYWluczogaGUgYXNrZWQgUmV5ZXMgYSBzaW1wbGUsIGRpcmVjdCBxdWVzdGlvbiwgYW5kIFJleWVzLCB0cnlpbmcgdG8gbWFuYWdlIHRoZSBhbnN3ZXIgcmF0aGVyIHRoYW4ganVzdCBnaXZlIGl0IGhvbmVzdGx5LCBnb3QgY2F1Z2h0IG91dCBpbiBhIHNtYWxsIGV2YXNpb24gdGhhdCBjb3N0IGhpbSBCaWxsJ3MgdHJ1c3QgZW50aXJlbHkuICdNYW4gd2FudGVkIHNvbWV0aGluZyBiYWQgZW5vdWdoIHRvIHNoYWRlIHRoZSB0cnV0aCBhIGxpdHRsZSwnIEJpbGwgc2F5cy4gJ1RoYXQncyB0aGUgb25lIHRoaW5nIEkgd29uJ3QgZm9yZ2l2ZSBvdXQgaGVyZS4gV29yZCdzIHRoZSBvbmx5IGN1cnJlbmN5IHRoYXQgYWN0dWFsbHkgbWF0dGVycywgdGhpcyBmYXIgZnJvbSBhbnl3aGVyZSBlbHNlLicKCkhlIHN0dWRpZXMgeW91IG5vdy4gJ1NvLiBJJ2xsIGFzayB5b3Ugc29tZXRoaW5nIHRvby4gQW5zd2VyIHN0cmFpZ2h0LCB3aGF0ZXZlciBpdCBjb3N0cyB5b3UsIGFuZCB3ZSdsbCB0YWxrIHByb3Blcmx5LiBBbnN3ZXIgY2xldmVyLCBhbmQgeW91IGNhbiBmb2xsb3cgaGltIGJhY2sgdGhlIHdheSBoZSBjYW1lLic=',
            'choices' => [
                ['text' => 'QW5zd2VyIHN0cmFpZ2h0LCBldmVuIHRob3VnaCBpdCBjb3N0cyBzb21ldGhpbmc=', 'next' => '5_straight'],
                ['text' => 'T3duIHVwIHRvIGEgbWlzdGFrZSBiZWZvcmUgaGUgY2F0Y2hlcyBpdA==', 'next' => '5_admit'],
            ],
        ],
        '5_straight' => [
            'prose'  => 'QmlsbCBhc2tzIHlvdSBwbGFpbmx5IHdoZXRoZXIgQXVndXN0aW4gZXZlciBhY3R1YWxseSBmaW5pc2hlZCBhbnl0aGluZyBvdXQgaGVyZSwgaW4gdGhpcyBjb3VudHJ5LCBvciB3aGV0aGVyIOKAlCBsaWtlIG1vc3Qgc3VydmV5b3JzIHBhc3NpbmcgdGhyb3VnaCDigJQgaGUgbW9zdGx5IGxlZnQgaGFsZi10cmFja2VkIHdvcmsgYmVoaW5kIGhpbSBzYW1lIGFzIGV2ZXJ5b25lIGVsc2UuIEl0IHdvdWxkIGJlIGVhc3kgdG8gc3BpbiBhbiBhbnN3ZXIgdGhhdCBtYWtlcyBoaW0gc291bmQgYmV0dGVyIHRoYW4gdGhlIGhvbmVzdCBvbmUuCgpZb3UgdGVsbCBCaWxsIHRoZSB0cnV0aCBpbnN0ZWFkOiB0aGF0IGFzIGZhciBhcyB5b3Uga25vdywgQXVndXN0aW4gbmV2ZXIgZmluaXNoZWQgYSBzaW5nbGUgc3VydmV5IGluIEF1c3RyYWxpYSwgdGhhdCB0aGlzIHdob2xlIHRyaXAgaGFzIHR1cm5lZCB1cCBtb3JlIHVuZmluaXNoZWQgYnVzaW5lc3MgdGhhbiB0cml1bXBocy4gQmlsbCBub2RzIHNsb3dseSwgc2F0aXNmaWVkIGJ5IHRoZSBhZG1pc3Npb24gcmF0aGVyIHRoYW4gZGlzYXBwb2ludGVkIGJ5IGl0Lg==',
            'choices' => [
                ['text' => 'U2VlIGlmIGl0IHdhcyBlbm91Z2g=', 'next' => '6_shared'],
            ],
        ],
        '5_admit' => [
            'prose'  => 'UGFydHdheSB0aHJvdWdoIGV4cGxhaW5pbmcgeW91ciBvd24gY3JlZGVudGlhbHMsIHlvdSByZWFsaXNlIHlvdSd2ZSBsZXQgQmlsbCBhc3N1bWUgeW91J3JlIGEgcHJvcGVybHkgdHJhaW5lZCBzdXJ2ZXlvciB5b3Vyc2VsZiwgd2hpY2ggaXNuJ3QgcXVpdGUgdHJ1ZSDigJQgeW91J3JlIGxlYXJuaW5nIGFzIHlvdSBnbywgbW9zdGx5LCBwYXRjaGVkIHRvZ2V0aGVyIGZyb20gR3JldGEncyB0ZWFjaGluZyBhbmQgQXVndXN0aW4ncyBvbGQgbm90ZXMuIFlvdSBjb3JyZWN0IGl0IGJlZm9yZSBoZSBjYW4gY2F0Y2ggdGhlIGdhcCBoaW1zZWxmLgoKQmlsbCdzIGZhY2Ugc2hpZnRzLCBhcHByb3ZpbmcuICdEaWRuJ3QgbmVlZCB0byB0ZWxsIG1lIHRoYXQuIFRvbGQgbWUgYW55d2F5LiBUaGF0J3Mgd29ydGggbW9yZSB0aGFuIHRoZSBjcmVkZW50aWFscyB3b3VsZCd2ZSBiZWVuLic=',
            'choices' => [
                ['text' => 'U2VlIGlmIGl0IHdhcyBlbm91Z2g=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J0FsbCByaWdodCwnIEJpbGwgc2F5cywgc2F0aXNmaWVkIGVpdGhlciB3YXkuICdUaGUgdHJpcG9kIGNsYW1wJ3Mgb3V0IGF0IHRoZSBvbGQgYm91bmRhcnkgcmlkZXIncyBodXQsIHR3byBkYXlzIGZ1cnRoZXIgb24g4oCUIGZlbGwgb2ZmIHNvbWUgc3VydmV5IHBhcnR5J3Mga2l0IGRlY2FkZXMgYmFjaywgYmVlbiBzaXR0aW5nIGluIGEgZHJhd2VyIHRoZXJlIGV2ZXIgc2luY2UsIGZhciBhcyBJIGtub3cuIEknbGwgcmFkaW8gYWhlYWQsIGxldCB0aGVtIGtub3cgeW91J3JlIGNvbWluZyBhbmQgdGhhdCB5b3UncmUgYWN0dWFsbHkgd29ydGggdHJ1c3RpbmcuJwoKSGUgcGF1c2VzIGJlZm9yZSB5b3UgbGVhdmUuICdUaGF0IG90aGVyIGZlbGxvdyDigJQgUmV5ZXMuIEhlJ3Mgbm90IGEgYmFkIHNvcnQsIEkgZG9uJ3QgdGhpbmsuIEp1c3Qgd2FudGVkIHNvbWV0aGluZyBiYWRseSBlbm91Z2ggdG8gc2hhZGUgaXQuIEhhcHBlbnMgdG8gcGxlbnR5IG9mIGdvb2QgcGVvcGxlLCBvdXQgaGVyZSBhbmQgZWxzZXdoZXJlLiBEb24ndCBob2xkIGl0IGFnYWluc3QgaGltIHRvbyBoYXJkLCBpZiB5b3VyIHBhdGhzIGNyb3NzIGFnYWluLic=',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIGJvdW5kYXJ5IHJpZGVyJ3MgaHV0', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'VGhlIGNsYW1wIHR1cm5zIG91dCB0byBiZSBleGFjdGx5IHdoZXJlIEJpbGwgc2FpZCwgYW5kIGV4YWN0bHkgYXMgdW5yZW1hcmthYmxlIGFzIGRlY2FkZXMgaW4gYSBkcmF3ZXIgd291bGQgc3VnZ2VzdCDigJQgYnV0IGl0IGZpdHMsIGFuZCB0aGUgY2FzZSBnYWlucyBpdHMgZmlmdGVlbnRoIHBpZWNlIHdpdGggc2F0aXNmeWluZyBmaW5hbGl0eS4gVGhlIENvbnRvdXIgbGlmdHMgb2ZmIHRoZSBHcmVhdCBEaXZpZGluZyBSYW5nZSdzIGxvbmcgZHJ5IHJpZGdlbGluZXMgYXMgZXZlbmluZyBwcm9wZXJseSBzZXRzIGluLCBkaXN0YW5jZSBhbmQgZHVzdCBib3RoIHNldHRsaW5nIGludG8gdGhlIHBhcnRpY3VsYXIgZ29sZC1icm93biBoYXplIG9mIGFuIG91dGJhY2sgc3Vuc2V0LgoKR3JldGEsIHRvbGQgYWJvdXQgUmV5ZXMncyBmYWlsZWQgdGVzdCwgZ29lcyBxdWlldCBmb3IgYSBtb21lbnQuICdGZWVsIGEgYml0IHNvcnJ5IGZvciBoaW0sIGhvbmVzdGx5LiBXYW50aW5nIHNvbWV0aGluZyBlbm91Z2ggdG8gc2hhZGUgdGhlIHRydXRoIGEgbGl0dGxlIOKAlCB0aGF0J3Mgbm90IHZpbGxhaW55LiBUaGF0J3MganVzdCBiZWluZyBodW1hbiB1bmRlciBwcmVzc3VyZS4n',
            'choices' => [
                ['text' => 'QWdyZWUsIGFuZCBob3BlIHlvdSBnZXQgdGhlIGNoYW5jZSB0byB0ZWxsIGhpbSBzbw==', 'next' => '8_end_agree'],
                ['text' => 'U2F5IHlvdSdyZSBub3QgcmVhZHkgdG8gZmVlbCBzb3JyeSBmb3IgaGltIHlldA==', 'next' => '8_end_notyet'],
            ],
        ],
        '8_end_agree' => [
            'prose'  => 'J0kgYWdyZWUsJyB5b3Ugc2F5LCBhbmQgZmluZCB5b3UgbWVhbiBpdCDigJQgdGhlcmUncyBzb21ldGhpbmcgaW4gQmlsbCdzIHBsYWluLCB1bmdydWRnaW5nIGFjY291bnQgb2YgUmV5ZXMncyBmYWlsdXJlIHRoYXQgbWFrZXMgcm9vbSBmb3IgcmVhbCBzeW1wYXRoeSByYXRoZXIgdGhhbiBzYXRpc2ZhY3Rpb24uICdJZiB3ZSBjcm9zcyBwYXRocyBhZ2FpbiwgSSBob3BlIEkgZ2V0IHRoZSBjaGFuY2UgdG8gYWN0dWFsbHkgdGVsbCBoaW0gdGhhdCwgcmF0aGVyIHRoYW4ganVzdCBob2xkaW5nIGl0IG92ZXIgaGltLicKCkdyZXRhIGxvb2tzIHBsZWFzZWQsIGluIGhlciB1bmRlcnN0YXRlZCB3YXkuICdUaGF0J2QgYmUgdGhlIHJpZ2h0IHRoaW5nIHRvIGRvLiBHcmFjZSBjb3N0cyBsZXNzIHRoYW4gcGVvcGxlIHRoaW5rIGl0IHdpbGwsIGdlbmVyYWxseS4n',
            'ending' => true,
        ],
        '8_end_notyet' => [
            'prose'  => 'J0knbSBub3QgcmVhZHkgdG8gZmVlbCBzb3JyeSBmb3IgaGltIHlldCwgaWYgSSdtIGhvbmVzdCwnIHlvdSBhZG1pdCwgYW5kIEdyZXRhIGRvZXNuJ3QgcHVzaCBiYWNrIG9uIGl0LiAnRmFpciBlbm91Z2guIEdyYWNlIG9uIGEgc2NoZWR1bGUncyBzdGlsbCBncmFjZSwgZXZlbnR1YWxseS4gTm8gcnVzaC4nCgpUaGUgQ29udG91ciBjcm9zc2VzIHRoZSBvdXRiYWNrJ3MgdmFzdCBkcnkgZGlzdGFuY2VzIHRvd2FyZCB0aGUgbmV4dCBzdG9wLCBhbmQgeW91IGZpbmQgdGhlIHRob3VnaHQgb2YgUmV5ZXMgc2l0dGluZyBkaWZmZXJlbnRseSBpbiB5b3UgdGhhbiBpdCBkaWQgYSB3ZWVrIGFnbyByZWdhcmRsZXNzIOKAlCBub3QgcXVpdGUgc3ltcGF0aHkgeWV0LCBidXQgbm8gbG9uZ2VyIHF1aXRlIHNpbXBsZSByaXZhbHJ5IGVpdGhlci4=',
            'ending' => true,
        ],
    ],
];
