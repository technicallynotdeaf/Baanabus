<?php
return [
    'id'    => 6,
    'title' => 'You\'ve Actually Earned the Asking',
    'color' => '#9A7A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'RHVuaHVhbmcgc2l0cyBhdCB0aGUgZWRnZSBvZiB0aGUgR29iaSwgYSBnZW51aW5lIG9hc2lzIHRvd24gdGhhdCBvd2VzIGl0cyB3aG9sZSBleGlzdGVuY2UgdG8gdGhlIHRyYWRlIHJvdXRlIHJ1bm5pbmcgdGhyb3VnaCBpdCDigJQgYW5kIGp1c3QgYmV5b25kLCBjYXJ2ZWQgaW50byBhIGNsaWZmIGZhY2UsIHRoZSBNb2dhbyBDYXZlcyBob2xkIGNlbnR1cmllcyBvZiBCdWRkaGlzdCBhcnQgYW5kLCBvbmNlLCBhbiBlbnRpcmUgaGlkZGVuIGxpYnJhcnkgc2VhbGVkIGF3YXkgZm9yIG5lYXJseSBhIHRob3VzYW5kIHllYXJzIGJlZm9yZSBpdHMgcmVkaXNjb3ZlcnkuIFRvbWFzIGdyb3dzIHVudXN1YWxseSByZXZlcmVudCBhcyB5b3UgYXBwcm9hY2guCgpUd28gd2F5cyB0b3dhcmQgdGhlIGNhdmVzJyBhcmNoaXZlIHByZXNlbnQgdGhlbXNlbHZlczogdGhlIHBpbGdyaW0gcGF0aCwgd2luZGluZyBwcm9wZXJseSBwYXN0IHNocmluZSBhZnRlciBwYWludGVkIHNocmluZSwgb3IgYSBtb3JlIGRpcmVjdCByb3V0ZSB1c2VkIG1vc3RseSBieSB0aGUgc2l0ZSdzIG93biBzY2hvbGFycyBhbmQgY2FyZXRha2Vycy4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgcGlsZ3JpbSBwYXRo', 'next' => '2_pilgrim'],
                ['text' => 'VGFrZSB0aGUgc2Nob2xhcnMnIHJvdXRl', 'next' => '2_scholars'],
            ],
        ],
        '2_pilgrim' => [
            'prose'  => 'VGhlIHBpbGdyaW0gcGF0aCB3aW5kcyBwYXN0IGNhdmUgYWZ0ZXIgcGFpbnRlZCBjYXZlLCBjZW50dXJpZXMgb2YgZGV2b3Rpb25hbCBhcnQgbGF5ZXJlZCBvbnRvIHJvY2sgaW4gY29sb3VycyB0aGF0IGhhdmUgc29tZWhvdywgaW1wcm9iYWJseSwgc3Vydml2ZWQgYSB0aG91c2FuZCB5ZWFycyBvZiBkZXNlcnQgd2luZCBhbmQgbGlnaHQuIEl0J3MgYSBzbG93LCBodW1ibGluZyB3YWxrLCBnaXZpbmcgeW91IHJlYWwgdGltZSB0byBwcm9wZXJseSBhYnNvcmIgdGhlIHNjYWxlIGFuZCBwYXRpZW5jZSBvZiB3aGF0J3MgYWN0dWFsbHkgaGVyZS4KCllvdSBhcnJpdmUgYXQgdGhlIGFyY2hpdmUgYnVpbGRpbmcgY29uc2lkZXJhYmx5IG1vcmUgcmV2ZXJlbnQgdGhhbiB3aGVuIHlvdSBzZXQgb3V0Lg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGFyY2hpdmU=', 'next' => '3_shared'],
            ],
        ],
        '2_scholars' => [
            'prose'  => 'VGhlIHNjaG9sYXJzJyByb3V0ZSBpcyBmYXN0ZXIsIG1vcmUgZGlyZWN0LCBjdXR0aW5nIHBhc3QgdGhlIHNpdGUncyB3b3JraW5nIHJlc2VhcmNoIGJ1aWxkaW5ncyByYXRoZXIgdGhhbiB0aGUgcHVibGljIHNocmluZXMuIEEgcmVzZWFyY2hlciwgbm90aWNpbmcgeW91ciBvYnZpb3VzIGVycmFuZCwgb2ZmZXJzIHF1aWV0IGRpcmVjdGlvbnMgd2l0aCByZWFsLCB1bmh1cnJpZWQgY291cnRlc3kuCgpZb3UgYXJyaXZlIGF0IHRoZSBhcmNoaXZlIGJ1aWxkaW5nIHdpdGggdGltZSB0byBzcGFyZSwgYW5kIGNvbnNpZGVyYWJseSBtb3JlIGN1cmlvc2l0eSBhYm91dCB0aGUgd29ya2luZywgbGl2aW5nIHNpZGUgb2YgdGhlIHNpdGUgdGhhbiB0aGUgcGlsZ3JpbSByb3V0ZSB3b3VsZCBoYXZlIG9mZmVyZWQu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGFyY2hpdmU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGFyY2hpdmUncyBrZWVwZXIsIERyLiBXZWksIGlzIHByZWNpc2UsIHByb3RlY3RpdmUsIGFuZCBlbnRpcmVseSB1bm1vdmVkIGJ5IHRoZSBtZXJlIGZhY3Qgb2YgeW91ciBhcnJpdmFsIOKAlCB0aGUgZGVlcGVyIGNvbGxlY3Rpb25zIGhlcmUgYXJlIGd1YXJkZWQgY2FyZWZ1bGx5LCBmb3IgZXhjZWxsZW50IGhpc3RvcmljYWwgcmVhc29ucywgYW5kIGNhc3VhbCByZXF1ZXN0cyBnZXQgcG9saXRlbHksIGZpcm1seSBkZWNsaW5lZCBhcyBhIG1hdHRlciBvZiBjb3Vyc2UuCgonVGhlIGRvb3IgeW91J3JlIGFza2luZyBhYm91dCwnIHNoZSBzYXlzLCBvbmNlIHlvdSBleHBsYWluIHByb3Blcmx5LCAnaGFzIHN0YXllZCBsb2NrZWQgZm9yIGEgZ3JlYXQgbWFueSBwZW9wbGUgd2l0aCBtdWNoIGdyYW5kZXIgY2xhaW1zIHRoYW4geW91cnMuIFdoYXQgbWFrZXMgeW91IHRoaW5rIGl0IG9wZW5zIGZvciB5b3U/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'T2ZmZXIgdGhlIHByb3ZlcmI=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGNvdWxkIHJlY2l0ZSBpdCBmb3JtYWxseSwgZXhhY3RseSBhcyBUdXJzdW4gZ2F2ZSBpdCwgdHJ1c3RpbmcgdGhlIHdvcmRzIHRoZW1zZWx2ZXMgdG8gY2Fycnkgd2hhdGV2ZXIgd2VpZ2h0IHRoZXkncmUgbWVhbnQgdG8g4oCUIG9yIHlvdSBjb3VsZCBleHBsYWluIHByb3Blcmx5LCBjb252ZXJzYXRpb25hbGx5LCB0aGUgd2hvbGUgc3Rvcnkgb2YgaG93IHlvdSBjYW1lIHRvIGNhcnJ5IGl0LCBsZXR0aW5nIHRoZSBjb250ZXh0IGRvIGFzIG11Y2ggd29yayBhcyB0aGUgd29yZHMgdGhlbXNlbHZlcy4KCkVpdGhlciB3YXksIHRoZSBhY3R1YWwgcHJvdmVyYiBoYXMgdG8gYmUgc3Bva2VuLg==',
            'choices' => [
                ['text' => 'UmVjaXRlIGl0IGZvcm1hbGx5LCBleGFjdGx5IGFzIGdpdmVu', 'next' => '5_formal'],
                ['text' => 'RXhwbGFpbiB0aGUgd2hvbGUgc3RvcnkgYmVoaW5kIGl0', 'next' => '5_story'],
            ],
        ],
        '5_formal' => [
            'prose'  => 'WW91IHNwZWFrIGl0IGV4YWN0bHkgYXMgVHVyc3VuIHRhdWdodCB5b3UsIGNhcmVmdWwgYW5kIHByZWNpc2UsIHRoZSBvbGQgd29yZHMgbGFuZGluZyB3aXRoIHJlYWwsIGRlbGliZXJhdGUgd2VpZ2h0IGluIHRoZSBxdWlldCBhcmNoaXZlIHJvb20uIERyLiBXZWkncyBjYXJlZnVsIGNvbXBvc3VyZSBzaGlmdHMsIGp1c3Qgc2xpZ2h0bHksIHJlY29nbml0aW9uIGZsaWNrZXJpbmcgYWNyb3NzIGhlciBmYWNlLgoKJ1RoYXQncyBub3QgYSBwaHJhc2UgeW91J2Qga25vdyBieSBhY2NpZGVudCwnIHNoZSBzYXlzLiAnQWxsIHJpZ2h0LiBZb3UndmUgYWN0dWFsbHkgZWFybmVkIHRoZSBhc2tpbmcuJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQncyBiZWhpbmQgdGhlIGRvb3I=', 'next' => '6_shared'],
            ],
        ],
        '5_story' => [
            'prose'  => 'WW91IGV4cGxhaW4gdGhlIHdob2xlIHN0b3J5IOKAlCBLYXNoZ2FyLCBFbGRlciBUdXJzdW4sIHRoZSBsb25nIHBhdGllbnQgdGVzdCB0aGF0IGVhcm5lZCB5b3UgdGhlIHdvcmRzIGluIHRoZSBmaXJzdCBwbGFjZSDigJQgYW5kIERyLiBXZWkgbGlzdGVucyB3aXRoIHJlYWwsIGdyb3dpbmcgaW50ZXJlc3QsIHRoZSBmb3JtYWwgd2FyaW5lc3MgZ3JhZHVhbGx5IHNvZnRlbmluZyBpbnRvIHNvbWV0aGluZyBjbG9zZXIgdG8gZ2VudWluZSBlbmdhZ2VtZW50LgoKJ1RoYXQncyBub3QgYSBzdG9yeSB5b3UnZCBpbnZlbnQsJyBzaGUgc2F5cywgd2hlbiB5b3UgZmluaXNoLiAnQWxsIHJpZ2h0LiBZb3UndmUgYWN0dWFsbHkgZWFybmVkIHRoZSBhc2tpbmcuJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQncyBiZWhpbmQgdGhlIGRvb3I=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB5b3UgcHJvdmVkIGl0LCBEci4gV2VpIGxlYWRzIHlvdSBpbnRvIGEgc21hbGxlciwgY2FyZWZ1bGx5IGNsaW1hdGUtY29udHJvbGxlZCByb29tIOKAlCBub3QgdGhlIGZhbW91cyBzZWFsZWQgbGlicmFyeSBjYXZlIGl0c2VsZiwgbG9uZyBzaW5jZSBwcm9wZXJseSBjYXRhbG9ndWVkIGFuZCBkaXNwZXJzZWQgdG8gY29sbGVjdGlvbnMgd29ybGR3aWRlLCBidXQgYSBzbWFsbGVyIGFyY2hpdmUgb2YgbW9yZSByZWNlbnQgdHJhZGVyIGRlcG9zaXRzLCBpbmNsdWRpbmcsIHR1Y2tlZCBpbiBhIHNwZWNpZmljIGxhYmVsbGVkIGJveCwgdGhlIG5leHQgd2VkZ2UsIGxlZnQgaGVyZSBieSBZc29sZGUgaGVyc2VsZiBkZWNhZGVzIGFnbyBmb3IgZXhhY3RseSB0aGlzIGtpbmQgb2Ygc2FmZWtlZXBpbmcuCgonU2hlIHRydXN0ZWQgdXMgd2l0aCBpdCwnIERyLiBXZWkgc2F5cywgaGFuZGluZyBpdCBvdmVyLiAnVHJ1c3RlZCB0aGF0IHdob2V2ZXIgZXZlbnR1YWxseSBjYW1lIGFza2luZyBwcm9wZXJseSB3b3VsZCBhY3R1YWxseSBiZSB3aG8gdGhleSBjbGFpbWVkLiBTZWVtcyBzaGUgd2FzIHJpZ2h0IHRvLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIHRoZSBNb2dhbyBDYXZlcycgcGFpbnRlZCBjbGlmZnMgY2F0Y2hpbmcgdGhlIGxhc3Qgb2YgdGhlIGRheSdzIGxpZ2h0IGJlaGluZCB5b3UsIGNlbnR1cmllcyBvZiBjYXJlZnVsLCBwYXRpZW50IHByZXNlcnZhdGlvbiBhbGwgYXJvdW5kIGEgc2luZ2xlIHNtYWxsIHBpZWNlIG9mIGJyYXNzIHRoYXQncyBmaW5hbGx5LCBwcm9wZXJseSwgbW92aW5nIG9uLgoKVG9tYXMsIGdlbnVpbmVseSBtb3ZlZCBieSB0aGUgd2hvbGUgdmlzaXQsIGxvb2tzIHRob3VnaHRmdWxseSBiYWNrIGF0IHRoZSBjYXZlcy4gJ1N0cmFuZ2UsIGlzbid0IGl0LiBBbGwgdGhhdCBlZmZvcnQsIGtlZXBpbmcgdGhpbmdzIHNhZmUgZm9yIGNlbnR1cmllcyDigJQgbWFudXNjcmlwdHMsIGFydCwgb25lIHNtYWxsIHdlZGdlIGFtb25nIGl0IGFsbC4gRmVlbHMgbGlrZSBpdCBzaG91bGQgbWF0dGVyIG1vcmUsIHNvbWVob3csIGJlaW5nIHBhcnQgb2YgdGhhdCBjb21wYW55Lic=',
            'choices' => [
                ['text' => 'QWdyZWUgdGhhdCBpdCBkb2VzIG1hdHRlciBtb3JlLCBub3c=', 'next' => '8_end_matters'],
                ['text' => 'U2F5IGl0IHdhcyBhbHdheXMganVzdCBvbmUgcGllY2UgYW1vbmcgbWFueQ==', 'next' => '8_end_piece'],
            ],
        ],
        '8_end_matters' => [
            'prose'  => 'J0l0IGRvZXMgbWF0dGVyIG1vcmUsIG5vdywnIHlvdSBzYXksIG1lYW5pbmcgaXQg4oCUIGNhcnJ5aW5nIHNvbWV0aGluZyB0aGF0J3Mgc3BlbnQgZGVjYWRlcyBpbiB0aGUgY29tcGFueSBvZiBnZW51aW5lbHkgcHJpY2VsZXNzLCBjYXJlZnVsbHkgcHJlc2VydmVkIGhpc3RvcnkgZmVlbHMgbGlrZSBhIHNtYWxsLCByZWFsIGhvbm91ciwgd2hhdGV2ZXIgdGhlIHdlZGdlJ3Mgb3duIG1vZGVzdCwgcHJhY3RpY2FsIHB1cnBvc2UgYWN0dWFsbHkgaXMuCgpUb21hcyBub2RzLCBzYXRpc2ZpZWQuICdHb29kLiBJdCBzaG91bGQuIFlzb2xkZSBjbGVhcmx5IHRob3VnaHQgc28gdG9vLCBjaG9vc2luZyB0byBsZWF2ZSBpdCBzb21ld2hlcmUgdGhpcyBjYXJlZnVsbHkga2VwdC4n',
            'ending' => true,
        ],
        '8_end_piece' => [
            'prose'  => 'J0l0IHdhcyBhbHdheXMganVzdCBvbmUgcGllY2UgYW1vbmcgbWFueSwgaG9uZXN0bHksJyB5b3Ugc2F5LCBhbmQgZmluZCB0aGVyZSdzIHNvbWV0aGluZyBnZW51aW5lbHkgZnJlZWluZyBpbiB0aGF0IHRob3VnaHQgcmF0aGVyIHRoYW4gZGltaW5pc2hpbmcg4oCUIG5vdCBldmVyeSBtZWFuaW5nZnVsIHRoaW5nIG5lZWRzIHRvIGJlIHNpbmd1bGFyIG9yIGlycmVwbGFjZWFibGUgdG8gYWN0dWFsbHkgbWF0dGVyLgoKVGhlIGNhcmF2YW4gbW92ZXMgb24gZnJvbSBEdW5odWFuZyBhcyB0aGUgZGVzZXJ0IGV2ZW5pbmcgcHJvcGVybHkgc2V0dGxlcywgdGhlIE1vZ2FvIENhdmVzJyBwYWludGVkIGNsaWZmcyBmYWRpbmcgaW50byB0aGUgZGFya2VuaW5nIGhvcml6b24gYmVoaW5kIHlvdSwgb25lIHNtYWxsIHBpZWNlIG9mIGEgbXVjaCBsYXJnZXIsIHBhdGllbnQgc3Rvcnkgb2YgY2FyZWZ1bCBrZWVwaW5nLg==',
            'ending' => true,
        ],
    ],
];
