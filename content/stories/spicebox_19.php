<?php
return [
    'id'    => 19,
    'title' => 'Tasted It Properly, For Once',
    'color' => '#9A2A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'SXN0YW5idWwncyBTcGljZSBCYXphYXIgcmlzZXMgdXAgaW4gaXRzIG93biB2YXVsdGVkIHN0b25lIHR1bm5lbCwgY2VudHVyaWVzIG9sZCwgY29uZXMgb2Ygc3VtYWMgYW5kIHBhcHJpa2EgYW5kIGRyaWVkIHJvc2UgcGV0YWxzIHN0YWNrZWQgaW4gY29sb3VycyBzbyB2aXZpZCB0aGV5IGxvb2sgYWxtb3N0IHBhaW50ZWQgb24uIEJydW5vIG1vdmVzIHRocm91Z2ggaXQgd2l0aCB0aGUgcGFydGljdWxhciBhbGVydG5lc3Mgb2Ygc29tZW9uZSBleHBlY3RpbmcgdG8gcnVuIGludG8gc29tZWJvZHkgc3BlY2lmaWMuCgpUd28gYmF6YWFyIHJvdXRlcyB0b3dhcmQgdGhlIHN1bWFjIHN0YWxsIHByZXNlbnQgdGhlbXNlbHZlczogdGhyb3VnaCB0aGUgbWFpbiBjb3ZlcmVkIGFyY2FkZSwgb3IgYWxvbmcgYSBzbWFsbGVyIHNpZGUgcGFzc2FnZSBmYXZvdXJlZCBieSBsb2NhbCBzaG9wcGVycyByYXRoZXIgdGhhbiB0b3VyaXN0cy4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbiBjb3ZlcmVkIGFyY2FkZQ==', 'next' => '2_arcade'],
                ['text' => 'Rm9sbG93IHRoZSBsb2NhbCBzaWRlIHBhc3NhZ2U=', 'next' => '2_passage'],
            ],
        ],
        '2_arcade' => [
            'prose'  => 'VGhlIG1haW4gYXJjYWRlIGlzIGEgZ2VudWluZSBmbG9vZCBvZiBjb2xvdXIgYW5kIG5vaXNlLCB2ZW5kb3JzIGNhbGxpbmcgb3V0IG92ZXIgZWFjaCBvdGhlciwgdG91cmlzdHMgcGhvdG9ncmFwaGluZyBzcGljZSBjb25lcyBpbnN0ZWFkIG9mIGJ1eWluZyB0aGVtLiBZb3UgcHVzaCB0aHJvdWdoIHN0ZWFkaWx5LCB0aGUgc3VtYWMgc3RhbGwgZmluYWxseSBhcHBlYXJpbmcgYXQgYSBxdWlldGVyIGJlbmQgbmVhciB0aGUgYmFjay4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHN0YWxs', 'next' => '3_shared'],
            ],
        ],
        '2_passage' => [
            'prose'  => 'VGhlIHNpZGUgcGFzc2FnZSBpcyBxdWlldGVyLCBmYXZvdXJlZCBieSBsb2NhbHMgd2hvIGNsZWFybHkga25vdyBleGFjdGx5IHdoaWNoIHN0YWxscyBhcmUgd29ydGggdGhlaXIgdGltZSwgdGhlIGNvbG91cnMgbm8gbGVzcyB2aXZpZCBmb3IgdGhlIHNtYWxsZXIgY3Jvd2QuIFlvdSByZWFjaCB0aGUgc3VtYWMgc3RhbGwgZGlyZWN0bHksIG5vIHdhc3RlZCBuYXZpZ2F0aW9uLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHN0YWxs', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'QW5kIHRoZXJlIHNoZSBpcyDigJQgU2VsaW4sIHN0YW5kaW5nIGF0IHRoZSBzdW1hYyBzdGFsbCBpdHNlbGYsIG5vIGNhbWVyYSBjcmV3LCBubyBub3RlYm9vayBldmVuLCBqdXN0IHdhdGNoaW5nIHRoZSB2ZW5kb3IgbWVhc3VyZSBvdXQgYSBjdXN0b21lcidzIG9yZGVyIHdpdGggYW4gYXR0ZW50aW9uIHRoYXQgbG9va3MsIGZvciB0aGUgZmlyc3QgdGltZSBzaW5jZSBIb2kgQW4sIGdlbnVpbmVseSB1bmd1YXJkZWQuIFNoZSBub3RpY2VzIHlvdSBhbmQgZG9lc24ndCBmbGluY2ggYXdheSBvciByZWFjaCBmb3IgYW55dGhpbmcgdG8gcmVjb3JkLgoKJ0kgd2FzIGhvcGluZyB5b3UnZCBjb21lIHRocm91Z2ggaGVyZSBldmVudHVhbGx5LCcgc2hlIHNheXMgcXVpZXRseS4gJ1RoZXJlJ3Mgc29tZXRoaW5nIEknZCBsaWtlIHlvdSB0byBhY3R1YWxseSBzZWUgbWUgZG8sIGlmIHlvdSdsbCBsZXQgbWUuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'SGVhciBoZXIgb3V0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'U2VsaW4gZXhwbGFpbnMsIHBsYWlubHkgYW5kIHdpdGhvdXQgaGVyIG9sZCBwb2xpc2gsIHRoYXQgc2hlIHdhbnRzIHRvIHByb3Blcmx5IHRhc3RlIGEgZGlzaCBtYWRlIHRoZSBob25lc3Qgd2F5IOKAlCBub3QgZmlsbWVkLCBub3QgbmFycmF0ZWQsIGp1c3QgZWF0ZW4g4oCUIGJlZm9yZSBzaGUgZGVjaWRlcyB3aGF0LCBpZiBhbnl0aGluZywgc2hlJ3MgZ29pbmcgdG8gd3JpdGUgYWJvdXQgYW55IG9mIHRoaXMuIFNoZSBvZmZlcnMgeW91IHR3byB3YXlzIHRvIGxldCB0aGF0IGFjdHVhbGx5IGhhcHBlbjogaW52aXRlIGhlciB0byBqb2luIHRoZSBzdW1hYyBsZXNzb24gaXRzZWxmLCBzaXR0aW5nIGFsb25nc2lkZSB5b3UgYXMgYSBndWVzdCByYXRoZXIgdGhhbiBhbiBvYnNlcnZlciwgb3IgYXJyYW5nZSBmb3IgaGVyIHRvIHRhc3RlIHRoZSBmaW5pc2hlZCBkaXNoIGFmdGVyd2FyZCwgb25jZSB0aGUgbGVzc29uIGlzIGRvbmUgYW5kIGl0J3MganVzdCBmb29kLCBvZmZlcmVkIHBsYWlubHkuCgonRWl0aGVyIHdheSB0ZWxscyBtZSBzb21ldGhpbmcsJyBzaGUgc2F5cy4gJ0kganVzdCB3YW50IHRvIGFjdHVhbGx5IHRhc3RlIGl0IHByb3Blcmx5LCBmb3Igb25jZS4n',
            'choices' => [
                ['text' => 'SW52aXRlIGhlciB0byBqb2luIHRoZSBsZXNzb24gaXRzZWxm', 'next' => '5_join'],
                ['text' => 'TGV0IGhlciB0YXN0ZSB0aGUgZmluaXNoZWQgZGlzaCBhZnRlcndhcmQ=', 'next' => '5_after'],
            ],
        ],
        '5_join' => [
            'prose'  => 'SW52aXRpbmcgaGVyIHRvIGpvaW4gdGhlIGxlc3NvbiBtZWFucyBzaGUgc2l0cyBiZXNpZGUgeW91IGF0IHRoZSBzdW1hYyB2ZW5kb3IncyBsb3cgdGFibGUsIGhhbmRzIGFjdHVhbGx5IHdvcmtpbmcgYWxvbmdzaWRlIHlvdXJzLCBzdW1hYydzIHRhcnQsIGZhaW50bHkgY2l0cnVzIGR1c3Qgc2V0dGxpbmcgb3ZlciBib3RoIHlvdXIgcGFsbXMgYXMgdGhlIHZlbmRvciBndWlkZXMgeW91IHRocm91Z2ggdGhlIHNhbWUgaW5zdHJ1Y3Rpb24sIG5vIGRpZmZlcmVudCBmb3IgaGVyIHRoYW4gZm9yIHlvdS4KClNlbGluLCBoYW5kcyBidXN5LCBzdG9wcyBuYXJyYXRpbmcgZW50aXJlbHkuIFNoZSdzIHNpbXBseSBoZXJlLCBkb2luZyB0aGUgdGhpbmcsIGZvciB3aGF0IGxvb2tzIGxpa2UgdGhlIGZpcnN0IHRpbWUgaW4gYSB2ZXJ5IGxvbmcgd2hpbGUu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGFwcGVucyBvbmNlIHRoZSBmb29kIGlzIHJlYWR5', 'next' => '6_shared'],
            ],
        ],
        '5_after' => [
            'prose'  => 'TGV0dGluZyBoZXIgdGFzdGUgdGhlIGZpbmlzaGVkIGRpc2ggYWZ0ZXJ3YXJkIG1lYW5zIHNoZSB3YWl0cyBxdWlldGx5IGF0IGEgbmVhcmJ5IHRhYmxlIHdoaWxlIHlvdSBjb21wbGV0ZSB0aGUgc3VtYWMgbGVzc29uIHByb3Blcmx5LCB0aGVuIGpvaW5zIHlvdSBvbmNlIGl0J3MgY29va2VkLCBubyBjYW1lcmFzLCBubyBub3RlYm9vaywganVzdCBhIHBsYXRlIHNldCBpbiBmcm9udCBvZiBoZXIgdGhlIHNhbWUgd2F5IGl0IHdvdWxkIGJlIHNldCBpbiBmcm9udCBvZiBhbnlvbmUuCgpTaGUgZWF0cyBzbG93bHksIGRlbGliZXJhdGVseSwgdGhlIHBlcmZvcm1hbmNlIGVudGlyZWx5IGFic2VudCBmcm9tIGhlciBmYWNlIGZvciB3aGF0IGxvb2tzIGxpa2UgdGhlIGZpcnN0IHRpbWUgaW4gYSB2ZXJ5IGxvbmcgd2hpbGUu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGFwcGVucyBvbmNlIHRoZSBmb29kIGlzIHJlYWR5', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSBpdCBoYXBwZW5lZCwgU2VsaW4gc2V0cyBkb3duIGhlciBmb3JrIGV2ZW50dWFsbHkgYW5kIGlzIHF1aWV0IGZvciBhIGxvbmcgbW9tZW50LiAnSSd2ZSBlYXRlbiBhIGh1bmRyZWQgdmVyc2lvbnMgb2YgZGlzaGVzIGxpa2UgdGhpcyBmb3Igc3RvcmllcywnIHNoZSBmaW5hbGx5IHNheXMuICdOZXZlciBhY3R1YWxseSB0YXN0ZWQgb25lIHByb3Blcmx5LCBub3Qgb25jZSwgbm90IHJlYWxseS4gVGhlcmUncyBhIGRpZmZlcmVuY2UuIEkgZGlkbid0IHVuZGVyc3RhbmQgdGhhdCB1bnRpbCByaWdodCBub3cuJwoKU2hlIGxvb2tzIGF0IHlvdSBwbGFpbmx5LiAnSSdtIG5vdCBnb2luZyB0byB3cml0ZSB0aGUgYXJ0aWNsZSBJIHBsYW5uZWQuIE5vdCBhYm91dCB5b3VyIGdyYW5kbW90aGVyLCBub3QgYWJvdXQgYW55IG9mIHRoZXNlIGZhbWlsaWVzLiBJdCB3YXMgbmV2ZXIgYWN0dWFsbHkgbWluZSB0byB0YWtlLiBJIHNlZSB0aGF0IG5vdy4n',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2hlJ2xsIGRvIGluc3RlYWQ=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'J0kgZG9uJ3QgZW50aXJlbHkga25vdyB5ZXQsJyBTZWxpbiBhZG1pdHMsIHR1cm5pbmcgaGVyIGVtcHR5IHBsYXRlIHNsb3dseSBvbiB0aGUgdGFibGUuICdNYXliZSBub3RoaW5nLCBmb3IgYSB3aGlsZS4gTWF5YmUgSSBuZWVkIHRvIGp1c3QgZWF0IHRoaW5ncyBwcm9wZXJseSBmaXJzdCwgYmVmb3JlIEkgZXZlciB0cnkgdG8gd3JpdGUgYWJvdXQgdGhlbSBhZ2Fpbi4nIFNoZSBzdGFuZHMsIGdhdGhlcmluZyBoZXJzZWxmIHdpdGggc29tZXRoaW5nIGxpa2UgZ2VudWluZSBodW1pbGl0eS4gJ1RoYW5rIHlvdSBmb3IgbGV0dGluZyBtZSBmaW5hbGx5IHRhc3RlIGl0IHJpZ2h0LicKCkJydW5vLCB3YXRjaGluZyB0aGlzIHdob2xlIGV4Y2hhbmdlIHdpdGggcmVhbCBzdXJwcmlzZSwgZmluYWxseSBzcGVha3Mgb25jZSBzaGUncyBnb25lLiAnRGlkbid0IGV4cGVjdCB0aGF0LCBob25lc3RseS4gTm90IGZyb20gaGVyLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSBkaWRuJ3QgZWl0aGVyLCBidXQgeW91J3JlIGdsYWQ=', 'next' => '8_end_glad'],
                ['text' => 'U2F5IHlvdSdsbCBiZWxpZXZlIHRoZSBjaGFuZ2Ugb25jZSB5b3Ugc2VlIGl0IGhvbGQ=', 'next' => '8_end_wait_and_see'],
            ],
        ],
        '8_end_glad' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGRpZG4ndCBleHBlY3QgaXQgZWl0aGVyLCcgeW91IGFkbWl0LCB3YXRjaGluZyBTZWxpbidzIHJldHJlYXRpbmcgZmlndXJlIGRpc2FwcGVhciBpbnRvIHRoZSBiYXphYXIncyBjb2xvdXJmdWwgY3Jvd2QsICdidXQgSSdtIGdsYWQuIEdlbnVpbmVseS4gRmVlbHMgbGlrZSBzb21ldGhpbmcgYWN0dWFsbHkgc2hpZnRlZCwgbm90IGp1c3Qgc29mdGVuZWQgZm9yIHNob3cuJwoKQnJ1bm8gbm9kcyBzbG93bHksIHN0aWxsIGZhaW50bHkgc3R1bm5lZC4gJ1NhbWUuIFdhc24ndCBzdXJlIHBlb3BsZSBsaWtlIHRoYXQgYWN0dWFsbHkgY2hhbmdlLiBNYXliZSB0aGV5IGRvLCBzb21ldGltZXMsIGlmIHRoZSByaWdodCBtZWFsIGZpbmFsbHkgZ2V0cyB0aHJvdWdoIHByb3Blcmx5Lic=',
            'ending' => true,
        ],
        '8_end_wait_and_see' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ2xsIGJlbGlldmUgaXQgb25jZSBJIHNlZSBpdCBob2xkLCcgeW91IHNheSwgdGhpbmtpbmcgb2YgSmF2YSdzIGNvb3BlcmF0aXZlIGFuZCB0aGVpciBzdGlsbC11bnB1Ymxpc2hlZCBwcm9taXNlLCBvZiBPYXhhY2EncyB1bmVhc3ksIHdhdGNoZnVsIHRydWNlLiAnT25lIGhvbmVzdCBtZWFsIGlzIGEgc3RhcnQuIEl0J3Mgbm90IHRoZSB3aG9sZSBwcm9vZiB5ZXQuJwoKQnJ1bm8gZG9lc24ndCBhcmd1ZSB0aGUgY2F1dGlvbi4gJ0ZhaXIuIFRpbWUgd2lsbCB0ZWxsLCBzYW1lIGFzIGFsd2F5cy4gQnV0IGl0J3MgYSByZWFsIHN0YXJ0LCB3aGF0ZXZlciBjb21lcyBvZiBpdC4nIFRoZSBiYXphYXIncyB2aXZpZCBjb2xvdXJzIHNldHRsZSBiYWNrIGludG8gdGhlaXIgb3JkaW5hcnkgYnVzdGxlIGFyb3VuZCB5b3UgYXMgeW91IG1vdmUgb24gdG93YXJkIHRoZSBuZXh0IHN0YWxsLg==',
            'ending' => true,
        ],
    ],
];
