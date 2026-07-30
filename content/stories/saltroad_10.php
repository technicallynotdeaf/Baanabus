<?php
return [
    'id'    => 10,
    'title' => 'The Cost of a Particular Kind of Goodness',
    'color' => '#2A6A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGFicml6IHJpc2VzIGFyb3VuZCBpdHMgbGVnZW5kYXJ5IGJhemFhciwgb25lIG9mIHRoZSBvbGRlc3QgYW5kIGxhcmdlc3QgY292ZXJlZCBtYXJrZXRzIGluIHRoZSB3b3JsZCwgdmF1bHRlZCBicmljayBjZWlsaW5ncyBhcmNoaW5nIG92ZXIgY29ycmlkb3IgYWZ0ZXIgY29ycmlkb3Igb2YgY2FycGV0cywgc3BpY2VzLCBhbmQgbWV0YWx3b3JrIHRoYXQncyBiZWVuIHRyYWRlZCBoZXJlIGZvciB0aGUgYmV0dGVyIHBhcnQgb2YgYSBtaWxsZW5uaXVtLiBUb21hcyBtb3ZlcyB0aHJvdWdoIGl0IHdpdGggcmVhbCwgcHJhY3Rpc2VkIHJldmVyZW5jZS4KClR3byBiYXphYXIgZGlzdHJpY3RzIHRvd2FyZCB0aGUgbWVyY2hhbnQgZmFtaWx5IHByZXNlbnQgdGhlbXNlbHZlczogdGhlIGNhcnBldCBxdWFydGVyLCBjb2xvdXJmdWwgYW5kIHNsb3ctcGFjZWQsIG9yIHRoZSBtZXRhbHdvcmsgcXVhcnRlciwgbG91ZGVyLCBmYXN0ZXIsIHJpbmdpbmcgY29uc3RhbnRseSB3aXRoIGhhbW1lciBvbiBicmFzcy4=',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgY2FycGV0IHF1YXJ0ZXI=', 'next' => '2_carpet'],
                ['text' => 'R28gdGhyb3VnaCB0aGUgbWV0YWx3b3JrIHF1YXJ0ZXI=', 'next' => '2_metal'],
            ],
        ],
        '2_carpet' => [
            'prose'  => 'VGhlIGNhcnBldCBxdWFydGVyIHVuZm9sZHMgaW4gc2xvdywgZGVsaWJlcmF0ZSBjb2xvdXIsIG1lcmNoYW50cyB1bnJvbGxpbmcgcnVncyB3aXRoIHJlYWwgdGhlYXRyaWNhbCBwYXRpZW5jZSBmb3IgYW55b25lIHNob3dpbmcgZ2VudWluZSBpbnRlcmVzdC4gWW91IG1vdmUgdGhyb3VnaCBpdCBhdCB0aGUgYmF6YWFyJ3Mgb3duIHVuaHVycmllZCBwYWNlLCBzZXZlcmFsIG1lcmNoYW50cyByZWNvZ25pc2luZyBZc29sZGUncyBvbGQgdHJhZGluZyBuYW1lIHdpdGggcmVhbCwgd2FybSBub3N0YWxnaWEuCgpZb3UgYXJyaXZlIGF0IHRoZSBsZWRnZXIgaG91c2UgcmVsYXhlZCwgYW5kIGNvbnNpZGVyYWJseSBtb3JlIGVkdWNhdGVkIGFib3V0IGNhcnBldHMgdGhhbiB5b3UgZXhwZWN0ZWQgdG8gYmUu',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGxlZGdlciBob3VzZQ==', 'next' => '3_shared'],
            ],
        ],
        '2_metal' => [
            'prose'  => 'VGhlIG1ldGFsd29yayBxdWFydGVyIHJpbmdzIGNvbnN0YW50bHkgd2l0aCBoYW1tZXIgb24gYnJhc3MsIGNvcHBlcnNtaXRocyBhbmQgc2lsdmVyc21pdGhzIHdvcmtpbmcgaW4gY2xvc2UsIG5vaXN5IHByb3hpbWl0eSwgdGhlIHdob2xlIGRpc3RyaWN0IGEgZ2VudWluZSBhc3NhdWx0IG9mIHNvdW5kIGFuZCBzcGFya3MuIFlvdSBtb3ZlIHRocm91Z2ggaXQgcXVpY2tseSwgZ2xhZCB0byByZWFjaCB0aGUgcmVsYXRpdmUgcXVpZXQgb2YgdGhlIGxlZGdlciBob3VzZSBiZXlvbmQuCgpZb3VyIGVhcnMgYXJlIHN0aWxsIHJpbmdpbmcgc2xpZ2h0bHkgYXMgeW91IGZpbmFsbHkgc3RlcCBpbnNpZGUu',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGxlZGdlciBob3VzZQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGxlZGdlciBob3VzZSBiZWxvbmdzIHRvIHRoZSBIb3NzZWluaSBmYW1pbHksIG1ldGljdWxvdXMgcmVjb3JkLWtlZXBlcnMgZm9yIGdlbmVyYXRpb25zLCBhbmQgdGhlIGN1cnJlbnQgaGVhZCwgUmV6YSwgcHJvZHVjZXMgYm90aCB0aGUgd2VkZ2UgYW5kIGEgc3BlY2lmaWMsIGNhcmVmdWwgbGVkZ2VyIHRoZSBtb21lbnQgeW91ciBlcnJhbmQncyBleHBsYWluZWQuICdUaGlzIHdpbGwgaW50ZXJlc3QgeW91LCcgaGUgc2F5cywgb3BlbmluZyB0byBhIG1hcmtlZCBwYWdlLiAnVGhlIGFjdHVhbCBiZWdpbm5pbmcgb2YgZXZlcnl0aGluZywgaWYgeW91IHdhbnQgdG8gc2VlIGl0IHByb3Blcmx5LicKClRoZSBlbnRyeSwgZGVjYWRlcyBvbGQsIHJlY29yZHMgYSBzdWJzdGFudGlhbCwgZW50aXJlbHkgdW5zZWN1cmVkIGxvYW4g4oCUIFlzb2xkZSwgc3RpbGwgeW91bmcgaW4gaGVyIHRyYWRpbmcgY2FyZWVyLCBleHRlbmRpbmcgcmVhbCBjcmVkaXQgdG8gYSBzdHJ1Z2dsaW5nIGZhbWlseSB3aXRoIG5vIGNvbGxhdGVyYWwgYW5kIG5vIHJlYWxpc3RpYyBleHBlY3RhdGlvbiBvZiByZXBheW1lbnQsIHB1cmVseSBiZWNhdXNlIHRoZXkgbmVlZGVkIGl0IGFuZCBzaGUgY291bGQsIGF0IHRoZSB0aW1lLCBhZmZvcmQgdG8gZ2l2ZSBpdC4=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGFwcGVuZWQgdG8gdGhhdCBmYW1pbHk=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'UmV6YSBleHBsYWluczogdGhlIGxvYW4gd2FzIG5ldmVyIHJlcGFpZCwgbm90IHRocm91Z2ggbWFsaWNlIGJ1dCB0aHJvdWdoIGdlbnVpbmUsIG9uZ29pbmcgaGFyZHNoaXAsIGFuZCBZc29sZGUsIHJhdGhlciB0aGFuIGNhbGxpbmcgaXQgaW4gYW5kIHJ1aW5pbmcgYW4gYWxyZWFkeS1zdHJ1Z2dsaW5nIGZhbWlseSwgc2ltcGx5IGxldCBpdCBnbyDigJQgdGhlIGZpcnN0IG9mIHdoYXQgd291bGQgYmVjb21lLCBvdmVyIHRoZSBmb2xsb3dpbmcgZGVjYWRlcywgYSB3aG9sZSBwYXR0ZXJuIG9mIGdlbmVyb3NpdHkgdGhhdCBncmFkdWFsbHkgb3V0cmFuIGhlciBob3VzZSdzIGFjdHVhbCBjYXBhY2l0eSB0byBzdXN0YWluIGl0LgoKJ1NoZSBrbmV3LCBJIHRoaW5rLCcgUmV6YSBzYXlzLiAnRXZlbiBmcm9tIHRoaXMgZmlyc3Qgb25lLiBLbmV3IGV4YWN0bHkgd2hhdCBzaGUgd2FzIGNob29zaW5nLCBhbmQgY2hvc2UgaXQgYW55d2F5LicgSGUgb2ZmZXJzIHlvdSB0d28gd2F5cyB0byBwcm9wZXJseSByZWNlaXZlIHRoaXMgcGllY2Ugb2YgdGhlIHN0b3J5OiBzdHVkeSB0aGUgZnVsbCBsZWRnZXIgeW91cnNlbGYsIHRyYWNpbmcgdGhlIHBhdHRlcm4gaW4gaGVyIG93biBoYW5kd3JpdGluZyBhY3Jvc3MgdGhlIGZvbGxvd2luZyB5ZWFycywgb3Igc2ltcGx5IHNpdCB3aXRoIFJlemEgYW5kIGxldCBoaW0gd2FsayB5b3UgdGhyb3VnaCB3aGF0IGhpcyBvd24gZmFtaWx5IGhhcyB1bmRlcnN0b29kIGFib3V0IGhlciBmb3IgZ2VuZXJhdGlvbnMu',
            'choices' => [
                ['text' => 'U3R1ZHkgdGhlIGxlZGdlciB5b3Vyc2VsZg==', 'next' => '5_study'],
                ['text' => 'TGV0IFJlemEgd2FsayB5b3UgdGhyb3VnaCBpdA==', 'next' => '5_walk'],
            ],
        ],
        '5_study' => [
            'prose'  => 'WW91IHN0dWR5IHRoZSBsZWRnZXIgY2FyZWZ1bGx5IHlvdXJzZWxmLCB0cmFjaW5nIGVudHJ5IGFmdGVyIGVudHJ5IGFjcm9zcyBkZWNhZGVzIOKAlCBsb2FuIGFmdGVyIGxvYW4sIGV4dGVuZGVkIGFuZCBxdWlldGx5IGZvcmdpdmVuLCBhIHdob2xlIHBhdHRlcm4gb2YgZGVsaWJlcmF0ZSwgaW5mb3JtZWQgZ2VuZXJvc2l0eSByYXRoZXIgdGhhbiBuYWl2ZSBtaXNtYW5hZ2VtZW50LiBCeSB0aGUgZW5kLCB5b3UgdW5kZXJzdGFuZCBoZXIgZGVjbGluZSBub3QgYXMgZmFpbHVyZSBidXQgYXMgYSBjaG9pY2UsIHJlcGVhdGVkIGNvbnNpc3RlbnRseSwgZm9yIGFzIGxvbmcgYXMgc2hlIGNvdWxkIHN1c3RhaW4gaXQuCgpSZXphIHdhdGNoZXMgeW91IHdvcmsgd2l0aCByZWFsLCBwYXRpZW50IGFwcHJvdmFsLg==',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUgd2VkZ2U=', 'next' => '6_shared'],
            ],
        ],
        '5_walk' => [
            'prose'  => 'UmV6YSB3YWxrcyB5b3UgdGhyb3VnaCBpdCBoaW1zZWxmLCBkZWNhZGVzIG9mIGhpcyBvd24gZmFtaWx5J3MgY2FyZWZ1bCByZWNvcmQta2VlcGluZyBmb2xkZWQgaW50byBhIHN0b3J5IGhlIGNsZWFybHkgZmluZHMgZ2VudWluZWx5IG1vdmluZyB0byB0ZWxsIHByb3Blcmx5IOKAlCBhIHdvbWFuIHdobyB1bmRlcnN0b29kIGV4YWN0bHkgd2hhdCBoZXIgZ2VuZXJvc2l0eSB3YXMgY29zdGluZyBoZXIsIGFuZCBjaG9zZSwgZGVsaWJlcmF0ZWx5LCBhZ2FpbiBhbmQgYWdhaW4sIHRvIHBheSBpdCBhbnl3YXkuCgpCeSB0aGUgZW5kLCB5b3UgdW5kZXJzdGFuZCBoZXIgZGVjbGluZSBub3QgYXMgZmFpbHVyZSBidXQgYXMgYSBjaG9pY2UsIHJlcGVhdGVkIGNvbnNpc3RlbnRseSwgZm9yIGFzIGxvbmcgYXMgc2hlIGNvdWxkIHN1c3RhaW4gaXQu',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUgd2VkZ2U=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'UmV6YSBoYW5kcyBvdmVyIHRoZSB3ZWRnZSB3aXRoIHJlYWwsIHF1aWV0IHJlc3BlY3QuICdNeSBmYW1pbHkncyBrZXB0IHRoaXMgbGVkZ2VyIHByb3Blcmx5IGZvciBleGFjdGx5IHRoaXMgcmVhc29uLCcgaGUgc2F5cy4gJ05vdCB0byBqdWRnZSBoZXIuIFRvIHVuZGVyc3RhbmQgaGVyLiBUaGVyZSdzIGEgZGlmZmVyZW5jZSwgYW5kIGl0IG1hdHRlcnMuJwoKSGUgc3R1ZGllcyB5b3UgYSBtb21lbnQgbG9uZ2VyLiAnV2hhdGV2ZXIgeW91J3JlIGZpbmlzaGluZyDigJQgZmluaXNoIGl0IHVuZGVyc3RhbmRpbmcgdGhhdCBzaGUgY2hvc2UgdGhpcywgY2xlYXItZXllZCwgdGhlIHdob2xlIHdheSB0aHJvdWdoLiBUaGF0J3Mgbm90IGEgdHJhZ2VkeS4gVGhhdCdzIHNpbXBseSB0aGUgY29zdCBvZiBhIHBhcnRpY3VsYXIga2luZCBvZiBnb29kbmVzcywgcGFpZCBpbiBmdWxsLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIFRhYnJpeidzIHZhdWx0ZWQgYmF6YWFyIGNlaWxpbmdzIGFyY2hpbmcgb3ZlcmhlYWQgdGhlIHdob2xlIHdheSBvdXQsIHRoZSBsZWRnZXIncyBjYXJlZnVsIGRlY2FkZXMgb2YgZG9jdW1lbnRlZCBnZW5lcm9zaXR5IHNldHRsaW5nIGludG8geW91IGRpZmZlcmVudGx5IHRoYW4gYW55IG9mIHRoZSBwcmV2aW91cyBzdG9wcycgc3RvcmllcyBoYXZlLgoKVG9tYXMsIHF1aWV0IHNpbmNlIGxlYXZpbmcgdGhlIGxlZGdlciBob3VzZSwgZmluYWxseSBzcGVha3MuICdDaGFuZ2VzIHRoaW5ncywgZG9lc24ndCBpdC4gS25vd2luZyBzaGUgY2hvc2UgaXQsIGNsZWFyLWV5ZWQsIHJhdGhlciB0aGFuIHNpbXBseSBsb3NpbmcgY29udHJvbCBvZiBzb21ldGhpbmcuJw==',
            'choices' => [
                ['text' => 'U2F5IGl0IGNoYW5nZXMgZXZlcnl0aGluZywgaG9uZXN0bHk=', 'next' => '8_end_everything'],
                ['text' => 'U2F5IGl0IG1vc3RseSBjb25maXJtcyB3aGF0IHlvdSBhbHJlYWR5IHN1c3BlY3RlZA==', 'next' => '8_end_confirms'],
            ],
        ],
        '8_end_everything' => [
            'prose'  => 'J0l0IGNoYW5nZXMgZXZlcnl0aGluZywgaG9uZXN0bHksJyB5b3Ugc2F5LCBhbmQgbWVhbiBpdCDigJQgdGhlIHdob2xlIGpvdXJuZXkgcmVmcmFtZXMgaXRzZWxmIGFyb3VuZCBhIHdvbWFuIHdobyBrbmV3IGV4YWN0bHkgd2hhdCBzaGUgd2FzIGRvaW5nIGFuZCBkaWQgaXQgYW55d2F5LCBnZW5lcmF0aW9uIGFmdGVyIGdlbmVyYXRpb24gb2YgcXVpZXQsIGRlbGliZXJhdGUgY29zdCB3aWxsaW5nbHkgcGFpZC4KClRvbWFzIG5vZHMgc2xvd2x5LiAnR29vZC4gVGhhdCdzIHdvcnRoIGNhcnJ5aW5nIHByb3Blcmx5LCB0aGUgcmVzdCBvZiB0aGUgd2F5LiBDaGFuZ2VzIHdoYXQgZmluaXNoaW5nIHRoaXMgaXMgYWN0dWFsbHkgZm9yLic=',
            'ending' => true,
        ],
        '8_end_confirms' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBtb3N0bHkgY29uZmlybXMgd2hhdCBJIGFscmVhZHkgc3VzcGVjdGVkLCcgeW91IHNheSwgdGhpbmtpbmcgYmFjayBvdmVyIGV2ZXJ5dGhpbmcgeW91J3ZlIGxlYXJuZWQgc28gZmFyIOKAlCBSYWhpbWkncyBsZXR0ZXIsIEFtYW4ncyBjYXJlZnVsIGtlZXBpbmcsIHRoZSB3aG9sZSBwYXR0ZXJuIG9mIGEgd29tYW4gd2hvIGNsZWFybHkga25ldyBoZXIgb3duIGhlYXJ0IGFuZCBmb2xsb3dlZCBpdCBjb25zaXN0ZW50bHkuCgpUb21hcyBzbWlsZXMgc2xpZ2h0bHkuICdGYWlyIGVub3VnaC4gU29tZXRpbWVzIHRoZSBjb25maXJtYXRpb24gbWF0dGVycyBhcyBtdWNoIGFzIHRoZSBkaXNjb3ZlcnkuIE1lYW5zIHlvdSd2ZSBhY3R1YWxseSBiZWVuIHBheWluZyBhdHRlbnRpb24sIHRoaXMgd2hvbGUgd2F5Lic=',
            'ending' => true,
        ],
    ],
];
