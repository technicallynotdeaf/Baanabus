<?php
return [
    'id'    => 16,
    'title' => 'Doesn\'t Hand Out Compliments Freely',
    'color' => '#B8945A',

    'pages' => [
        '1_start' => [
            'prose'  => 'Q2Fpcm8gc3ByYXdscyBhbG9uZyB0aGUgTmlsZSBpbiBnZW51aW5lLCBvdmVyd2hlbG1pbmcgc2NhbGUsIG1pbmFyZXRzIGFuZCBtYXJrZXRzIGFuZCBjZW50dXJpZXMgb2YgYWNjdW11bGF0ZWQgaGlzdG9yeSBsYXllcmVkIHRvZ2V0aGVyIGluIGEgY2l0eSB0aGF0J3Mgc2ltcGx5IGFsd2F5cyBtYXR0ZXJlZCB0b28gbXVjaCB0byBldmVyIHByb3Blcmx5IHNldHRsZSBkb3duLiBUb21hcyBuYXZpZ2F0ZXMgdG93YXJkIHRoZSBzY2FsZS1tYWtlcnMnIGd1aWxkIHdpdGggcmVhbCwgcHJhY3Rpc2VkIGZhbWlsaWFyaXR5LgoKVHdvIHJvdXRlcyB0b3dhcmQgdGhlIGd1aWxkIHByZXNlbnQgdGhlbXNlbHZlczogdGhyb3VnaCBPbGQgSXNsYW1pYyBDYWlybydzIGRlbnNlLCBoaXN0b3JpYyBxdWFydGVyLCBvciBhbG9uZyB0aGUgTmlsZSdzIHJpdmVyc2lkZSwgbW9yZSBvcGVuLCBjb25zaWRlcmFibHkgbGVzcyBjcm93ZGVkLg==',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCBPbGQgQ2Fpcm8=', 'next' => '2_old'],
                ['text' => 'Rm9sbG93IHRoZSByaXZlcnNpZGU=', 'next' => '2_river'],
            ],
        ],
        '2_old' => [
            'prose'  => 'T2xkIENhaXJvJ3MgcXVhcnRlciBpcyBkZW5zZSwgaGlzdG9yaWMsIG1pbmFyZXRzIGFuZCBtYWRyYXNhcyBjcm93ZGluZyBjbG9zZSB0b2dldGhlciBpbiBnZW51aW5lbHkgc3BlY3RhY3VsYXIgYXJjaGl0ZWN0dXJhbCBkZW5zaXR5LiBZb3UgbmF2aWdhdGUgaXQgc2xvd2x5LCBwcm9wZXJseSBhYnNvcmJpbmcgY2VudHVyaWVzIG9mIGNhcmVmdWwsIG9ybmF0ZSBjcmFmdHNtYW5zaGlwIGF0IGV2ZXJ5IHR1cm4uCgpZb3UgYXJyaXZlIGF0IHRoZSBndWlsZCBjb25zaWRlcmFibHkgbW9yZSBlZHVjYXRlZCBhYm91dCB0aGUgY2l0eSdzIGFyY2hpdGVjdHVyZSB0aGFuIHlvdSBleHBlY3RlZCB0byBiZS4=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGd1aWxkIGhvdXNl', 'next' => '3_shared'],
            ],
        ],
        '2_river' => [
            'prose'  => 'VGhlIE5pbGUgcml2ZXJzaWRlIGlzIG9wZW4sIGNhbG1lciwgZmVsdWNjYXMgZHJpZnRpbmcgcGFzdCB3aXRoIHJlYWwgdW5odXJyaWVkIGdyYWNlLCB0aGUgd2hvbGUgcm91dGUgY29uc2lkZXJhYmx5IGxlc3MgY3Jvd2RlZCB0aGFuIHRoZSBvbGQgcXVhcnRlcidzIGRlbnNlIHN0cmVldHMuIEl0J3MgYSBwbGVhc2FudCwgZWFzeSB3YWxrLCBnaXZpbmcgeW91IHJlYWwgdGltZSB0byBwcm9wZXJseSBzZXR0bGUgeW91ciB0aG91Z2h0cy4KCllvdSBhcnJpdmUgYXQgdGhlIGd1aWxkIHJlbGF4ZWQsIGFuZCB3aXRoIGEgZ2VudWluZSBhcHByZWNpYXRpb24gZm9yIHRoZSByaXZlcidzIHN0ZWFkeSwgcGF0aWVudCBwcmVzZW5jZS4=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGd1aWxkIGhvdXNl', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WW91J3JlIG5vdCBleHBlY3RpbmcgdG8gZmluZCBCZXJrYW50IGFscmVhZHkgaW5zaWRlIOKAlCBidXQgdGhlcmUgaGUgaXMsIGRlZXAgaW4gY29udmVyc2F0aW9uIHdpdGggdGhlIGd1aWxkIG1hc3RlciwgYW5kIHRvIHlvdXIgZ2VudWluZSBzdXJwcmlzZSwgaGUgZG9lc24ndCBpbW1lZGlhdGVseSB0dXJuIGFkdmVyc2FyaWFsIHdoZW4gaGUgc3BvdHMgeW91LiAnVGhpcyBvbmUncyBhY3R1YWxseSBhbGwgcmlnaHQsJyBoZSBzYXlzIHRvIHRoZSBndWlsZCBtYXN0ZXIsIGdydWZmbHksIGNsZWFybHkgY29zdGluZyBoaW0gc29tZXRoaW5nIHRvIGFkbWl0LiAnRm9sbG93ZWQgdGhlaXIgd2hvbGUgcm91dGUgc2luY2UgdGhlIHN0ZXBwZS4gRG9lcyB0aGUgd29yayBwcm9wZXJseS4gRG9lc24ndCBqdXN0IHRhbGsgYWJvdXQgZG9pbmcgaXQuJwoKVGhlIGd1aWxkIG1hc3RlciwgbWlsZGx5IGJlbXVzZWQgYnkgdGhlIHdob2xlIGV4Y2hhbmdlLCBwcm9kdWNlcyB0aGUgd2VkZ2UuICdJZiBCZXJrYW50J3Mgdm91Y2hpbmcgZm9yIHlvdSwgdGhhdCdzIHdvcnRoIHNvbWV0aGluZyBpbiB0aGlzIGNpdHkuIEhlIGRvZXNuJ3QgaGFuZCBvdXQgY29tcGxpbWVudHMgZnJlZWx5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQncyBhY3R1YWxseSBuZWVkZWQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGd1aWxkIG5lZWRzIGhlbHAgd2l0aCBhIGdlbnVpbmVseSBkZWxpY2F0ZSB0YXNrOiBjYWxpYnJhdGluZyBhIHNldCBvZiBjZXJlbW9uaWFsIHNjYWxlcyBmb3IgYW4gdXBjb21pbmcgY2l2aWMgY2VyZW1vbnksIHByZWNpc2lvbiB3b3JrIHRoYXQgcHVuaXNoZXMgYW55IGNhcmVsZXNzbmVzcyBpbW1lZGlhdGVseSBhbmQgdmlzaWJseSwgb3IgdmVyaWZ5aW5nIGEgYmF0Y2ggb2YgdHJhZGUgd2VpZ2h0cyBhZ2FpbnN0IHRoZSBndWlsZCdzIG93biBjYXJlZnVsIG1hc3RlciBzdGFuZGFyZHMsIHRlZGlvdXMgYnV0IGVzc2VudGlhbCB3b3JrIHRoYXQga2VlcHMgdGhlIHdob2xlIGNpdHkncyBjb21tZXJjZSBob25lc3QuCgonRWl0aGVyIG1hdHRlcnMsJyB0aGUgZ3VpbGQgbWFzdGVyIHNheXMuICdQaWNrIHdoaWNoZXZlciB5b3UncmUgYWN0dWFsbHkgc3VpdGVkIHRvLic=',
            'choices' => [
                ['text' => 'Q2FsaWJyYXRlIHRoZSBjZXJlbW9uaWFsIHNjYWxlcw==', 'next' => '5_calibrate'],
                ['text' => 'VmVyaWZ5IHRoZSB0cmFkZSB3ZWlnaHRz', 'next' => '5_verify'],
            ],
        ],
        '5_calibrate' => [
            'prose'  => 'Q2FsaWJyYXRpbmcgdGhlIGNlcmVtb25pYWwgc2NhbGVzIGlzIGdlbnVpbmVseSBkZWxpY2F0ZSB3b3JrLCB0aW55IGFkanVzdG1lbnRzIG1hdHRlcmluZyBlbm9ybW91c2x5IGZvciBhIHNldCBvZiBpbnN0cnVtZW50cyBhYm91dCB0byBiZSB1c2VkIGluIGZyb250IG9mIHRoZSB3aG9sZSBjaXR5J3MgYXNzZW1ibGVkIGRpZ25pdGFyaWVzLiBCZXJrYW50LCB1bmV4cGVjdGVkbHksIG9mZmVycyBxdWlldCwgdXNlZnVsIGFkdmljZSBmcm9tIGRlY2FkZXMgb2YgaGlzIG93biBleHBlcmllbmNlIHdpdGggZmluZSBpbnN0cnVtZW50cy4KCkJ5IHRoZSBlbmQsIHRoZSBzY2FsZXMgYmFsYW5jZSBwZXJmZWN0bHksIGFuZCBCZXJrYW50J3MgZ3J1ZGdpbmcgcmVzcGVjdCBzZWVtcyB0byBoYXZlIGRlZXBlbmVkIHNsaWdodGx5IGZ1cnRoZXIu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBndWlsZCdzIGdyYXRpdHVkZQ==', 'next' => '6_shared'],
            ],
        ],
        '5_verify' => [
            'prose'  => 'VmVyaWZ5aW5nIHRoZSB0cmFkZSB3ZWlnaHRzIGlzIHRlZGlvdXMsIGVzc2VudGlhbCB3b3JrLCBjaGVja2luZyBtZWFzdXJlIGFmdGVyIG1lYXN1cmUgYWdhaW5zdCB0aGUgZ3VpbGQncyBjYXJlZnVsIG1hc3RlciBzdGFuZGFyZHMsIHRoZSBraW5kIG9mIHVuZ2xhbW9yb3VzIGxhYm91ciB0aGF0IGtlZXBzIGFuIGVudGlyZSBjaXR5J3MgY29tbWVyY2UgaG9uZXN0IHdpdGhvdXQgYW55b25lIG91dHNpZGUgdGhlIGd1aWxkIGV2ZXIgcHJvcGVybHkgbm90aWNpbmcgaXQgaGFwcGVucy4KCkJlcmthbnQsIHdhdGNoaW5nIHlvdSB3b3JrIHN0ZWFkaWx5IHRocm91Z2ggdGhlIHdob2xlIHRlZGlvdXMgcGlsZSB3aXRob3V0IGNvbXBsYWludCwgbm9kcyBzbG93bHkgdG8gaGltc2VsZiwgY2xlYXJseSBmaWxpbmcgYXdheSBhbm90aGVyIGRhdGEgcG9pbnQgaW4geW91ciBmYXZvdXIu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBndWlsZCdzIGdyYXRpdHVkZQ==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIGd1aWxkIG1hc3Rlciwgc2F0aXNmaWVkIHdpdGggdGhlIHdvcmsgZWl0aGVyIHdheSwgaGFuZHMgb3ZlciB0aGUgd2VkZ2Ugd2l0aCBnZW51aW5lIHdhcm10aC4gQmVya2FudCwgdW5leHBlY3RlZGx5LCBhZGRzIGhpcyBvd24gd29yZHMuICdZc29sZGUncyBmYW1pbHkgYWx3YXlzIGRpZCBob25lc3Qgd29yaywgd2hhdGV2ZXIgZWxzZSB3ZW50IHdyb25nIGZvciB0aGVtLCcgaGUgc2F5cy4gJ0kndmUgYmVlbiBjYXJyeWluZyBhbiBvbGQgZ3J1ZGdlIHRoYXQgd2FzIG5ldmVyIHJlYWxseSBhYm91dCB5b3UsIHNwZWNpZmljYWxseS4gTWlnaHQgYmUgdGltZSBJIGFjdHVhbGx5IGxldCBpdCBnby4nCgpJdCdzIG5vdCBxdWl0ZSBhbiBhcG9sb2d5LiBCdXQgaXQncyBjbG9zZSwgYW5kIGl0J3MgY2xlYXJseSBjb3N0aW5nIGhpbSBzb21ldGhpbmcgcmVhbCB0byBzYXkgYXQgYWxsLg==',
            'choices' => [
                ['text' => 'QWNjZXB0IGl0LCB3aGF0ZXZlciBpdCBpcw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIENhaXJvJ3MgbWluYXJldHMgYW5kIHRoZSBOaWxlIGJvdGggY2F0Y2hpbmcgdGhlIGxhc3Qgb2YgdGhlIGRheSdzIGxpZ2h0LCBCZXJrYW50IHdhbGtpbmcgYWxvbmdzaWRlIHlvdSBub3cgcmF0aGVyIHRoYW4gc2hhZG93aW5nIHlvdSBhZHZlcnNhcmlhbGx5IGZyb20gYSBkaXN0YW5jZS4KCidEb24ndCBnZXQgdXNlZCB0byB0aGlzLCcgaGUgbXV0dGVycywgZ3J1ZmZseSwgdGhvdWdoIHRoZXJlJ3MgcmVhbCB3YXJtdGggdW5kZXJuZWF0aCB0aGUgZ3J1ZmZuZXNzIG5vdy4gJ1N0aWxsIG93ZWQsIHNvbWV3aGVyZSwgYnkgc29tZWJvZHkuIEp1c3QgbWF5YmUgbm90IHNvIG11Y2ggYnkgeW91IHBlcnNvbmFsbHkuJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSdsbCB0YWtlIHRoYXQgYXMgcmVhbCBwcm9ncmVzcw==', 'next' => '8_end_progress'],
                ['text' => 'U2F5IHlvdSBkaWRuJ3QgZXhwZWN0IHRoaXMgYXQgYWxs', 'next' => '8_end_unexpected'],
            ],
        ],
        '8_end_progress' => [
            'prose'  => 'J0knbGwgdGFrZSB0aGF0IGFzIHJlYWwgcHJvZ3Jlc3MsJyB5b3Ugc2F5LCBhbmQgbWVhbiBpdCDigJQgd2hhdGV2ZXIgdGhlIGFjdHVhbCBvbGQgZGVidCBiZXR3ZWVuIGhpcyBmYW1pbHkgYW5kIFlzb2xkZSdzIHR1cm5zIG91dCB0byBiZSwgdGhpcyBwYXJ0aWN1bGFyIHZlcnNpb24gb2YgaXQsIGJldHdlZW4geW91IGFuZCBoaW0gc3BlY2lmaWNhbGx5LCBmZWVscyBnZW51aW5lbHksIG1lYW5pbmdmdWxseSByZXNvbHZlZC4KCkJlcmthbnQgZ3J1bnRzLCB3aGljaCBmcm9tIGhpbSwgeW91J3JlIGxlYXJuaW5nLCBpcyBwcmFjdGljYWxseSBlZmZ1c2l2ZSB3YXJtdGgu',
            'ending' => true,
        ],
        '8_end_unexpected' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGRpZG4ndCBleHBlY3QgdGhpcyBhdCBhbGwsJyB5b3UgYWRtaXQsIGFuZCBCZXJrYW50IGFsbW9zdCBzbWlsZXMgYXQgdGhhdCDigJQgYWxtb3N0LiAnTmVpdGhlciBkaWQgSSwnIGhlIHNheXMuICdGb2xsb3dpbmcgeW91IGZvciByZXZlbmdlIGFuZCBlbmRpbmcgdXAgYWN0dWFsbHkgcmVzcGVjdGluZyB0aGUgd29yayBpbnN0ZWFkLiBMaWZlJ3MgZ290IGEgc2Vuc2Ugb2YgaHVtb3VyIGFib3V0IHRoZXNlIHRoaW5ncywgYXBwYXJlbnRseS4nCgpUaGUgY2FyYXZhbiBtb3ZlcyBvbiBmcm9tIENhaXJvIGFzIGV2ZW5pbmcgc2V0dGxlcyBvdmVyIHRoZSBOaWxlLCBhbiBvbGQgYWR2ZXJzYXJ5IHdhbGtpbmcgYWxvbmdzaWRlIHlvdSBub3cgaW5zdGVhZCBvZiB0cmFpbGluZyByZXNlbnRmdWxseSBiZWhpbmQu',
            'ending' => true,
        ],
    ],
];
