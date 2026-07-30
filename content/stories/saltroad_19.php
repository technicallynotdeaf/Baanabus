<?php
return [
    'id'    => 19,
    'title' => 'Not Just Silence Pretending to Be Fine',
    'color' => '#A85A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'Q29yZG9iYSByaXNlcyBpbiBsYXllcnMgb2YgTW9vcmlzaCBhbmQgQ2hyaXN0aWFuIGFyY2hpdGVjdHVyZSwgdGhlIE1lenF1aXRhJ3MgaG9yc2VzaG9lIGFyY2hlcyB2aXNpYmxlIGZyb20gc3RyZWV0cyB0aGF0IHN0aWxsIGNhcnJ5IGNlbnR1cmllcyBvZiBBbmRhbHVzaWFuIGNyYWZ0IGFuZCB0cmFkZS4gQmVya2FudCBncm93cyB2aXNpYmx5IHRlbnNlIGFzIHlvdSBhcHByb2FjaCB0aGUgb2xkIHF1YXJ0ZXIsIGhpcyB1c3VhbCBncnVmZiBjb25maWRlbmNlIGdpdmluZyB3YXkgdG8gc29tZXRoaW5nIGNvbnNpZGVyYWJseSBtb3JlIHVuY2VydGFpbi4KClR3byByb3V0ZXMgdGhyb3VnaCB0aGUgb2xkIHF1YXJ0ZXIgdG93YXJkIGhpcyBicm90aGVyJ3Mgd29ya3Nob3AgcHJlc2VudCB0aGVtc2VsdmVzOiBwYXN0IHRoZSBNZXpxdWl0YSBpdHNlbGYsIHRha2luZyBhIG1vbWVudCBmb3Igc29tZXRoaW5nIGxpa2UgcmVmbGVjdGlvbiwgb3IgZGlyZWN0bHkgdGhyb3VnaCB0aGUgd29ya2luZyBzdHJlZXRzLCBmYXN0ZXIgYnV0IHNraXBwaW5nIHdoYXRldmVyIHByZXBhcmF0aW9uIHRoZSBkZXRvdXIgbWlnaHQgb2ZmZXIu',
            'choices' => [
                ['text' => 'UGFzcyBieSB0aGUgTWV6cXVpdGEgZmlyc3Q=', 'next' => '2_mezquita'],
                ['text' => 'R28gZGlyZWN0bHkgdG8gdGhlIHdvcmtzaG9w', 'next' => '2_direct'],
            ],
        ],
        '2_mezquita' => [
            'prose'  => 'WW91IHBhc3MgdGhlIE1lenF1aXRhJ3Mgc3R1bm5pbmcgaG9yc2VzaG9lIGFyY2hlcywgYW5kIEJlcmthbnQsIHVucHJvbXB0ZWQsIHN0b3BzIGEgbW9tZW50IHRvIGFjdHVhbGx5IGxvb2sgYXQgaXQgcHJvcGVybHksIHNvbWV0aGluZyBsaWtlIGdlbnVpbmUgcmVmbGVjdGlvbiBjcm9zc2luZyBoaXMgd2VhdGhlcmVkIGZhY2UuICdCZWVuIHBhc3QgdGhpcyBhIGh1bmRyZWQgdGltZXMsJyBoZSBzYXlzLiAnTmV2ZXIgYWN0dWFsbHkgc3RvcHBlZCBiZWZvcmUuIEd1ZXNzIHRvZGF5J3MgZGlmZmVyZW50LicKCkhlIHNlZW1zIHN0ZWFkaWVyIGFmdGVyd2FyZCwgd2hhdGV2ZXIgdGhlIHBhdXNlIGFjdHVhbGx5IGRpZCBmb3IgaGltLg==',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gdGhlIHdvcmtzaG9w', 'next' => '3_shared'],
            ],
        ],
        '2_direct' => [
            'prose'  => 'WW91IGdvIGRpcmVjdGx5LCBCZXJrYW50J3MgbmVydm91cyBlbmVyZ3kgYnVpbGRpbmcgd2l0aCBldmVyeSBzdHJlZXQgcmF0aGVyIHRoYW4gc2V0dGxpbmcsIGNsZWFybHkgcHJlZmVycmluZyB0byBzaW1wbHkgZ2V0IHRoZSBkaWZmaWN1bHQgbW9tZW50IG92ZXIgd2l0aCByYXRoZXIgdGhhbiBkZWxheSBpdCBmdXJ0aGVyIHdpdGggcmVmbGVjdGlvbiBoZSdzIG5vdCBzdXJlIGhlIGNhbiBhZmZvcmQgcmlnaHQgbm93LgoKWW91IGFycml2ZSBhdCB0aGUgd29ya3Nob3Agd2l0aCBoaXMgdGVuc2lvbiBhdCBpdHMgYWJzb2x1dGUgcGVhay4=',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gdGhlIHdvcmtzaG9w', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHdvcmtzaG9wIGJlbG9uZ3MgdG8gQmVya2FudCdzIGJyb3RoZXIsIElkcmlzLCBhbiBpbnN0cnVtZW50LW1ha2VyIG9mIHJlYWwsIGV2aWRlbnQgc2tpbGwsIGFuZCB0aGUgdHdvIGJyb3RoZXJzIHN0YXJlIGF0IGVhY2ggb3RoZXIgZm9yIGEgbG9uZywgY2hhcmdlZCBtb21lbnQgYmVmb3JlIGVpdGhlciBzYXlzIGFueXRoaW5nIGF0IGFsbC4gJ1lvdSBjYW1lLCcgSWRyaXMgZmluYWxseSBzYXlzLCBmbGF0LCBndWFyZGVkLCB5ZWFycyBvZiB1bnNwb2tlbiBodXJ0IHNpdHRpbmcgcGxhaW5seSBiZWhpbmQgdGhlIHR3byBzaW1wbGUgd29yZHMuCgonSSBjYW1lLCcgQmVya2FudCBjb25maXJtcywgZXF1YWxseSBndWFyZGVkLiBOZWl0aGVyIG9uZSBzZWVtcyBlbnRpcmVseSBzdXJlIHdoYXQgaGFwcGVucyBuZXh0Lg==',
            'terminal' => true,
            'choices' => [
                ['text' => 'R2l2ZSB0aGVtIHJvb20sIGJ1dCBzdGF5IG5lYXJieQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIHNpbGVuY2Ugc3RyZXRjaGVzLCBuZWl0aGVyIGJyb3RoZXIgcXVpdGUgd2lsbGluZyB0byBtYWtlIHRoZSBmaXJzdCByZWFsIG1vdmUgdG93YXJkIGFjdHVhbCByZWNvbmNpbGlhdGlvbiByYXRoZXIgdGhhbiBtZXJlIHByZXNlbmNlLiBZb3UgY291bGQgZ2VudGx5IHByb21wdCB0aGVtIHRvd2FyZCBnZW51aW5lIGNvbnZlcnNhdGlvbiwgcmlza2luZyBvdmVyc3RlcHBpbmcgaW50byBhIGZhbWlseSBtYXR0ZXIgdGhhdCdzIG5vdCByZWFsbHkgeW91cnMsIG9yIHlvdSBjb3VsZCBzaW1wbHkgd2FpdCwgcGF0aWVudGx5LCB0cnVzdGluZyB0aGVtIHRvIGZpbmQgdGhlaXIgb3duIHdheSB0aGVyZSB3aXRob3V0IG91dHNpZGUgcHJlc3N1cmUuCgpFaXRoZXIgcmlza3Mgc29tZXRoaW5nLiBOZWl0aGVyIGlzIGd1YXJhbnRlZWQgdG8gd29yay4=',
            'choices' => [
                ['text' => 'R2VudGx5IHByb21wdCB0aGVtIHRvd2FyZCByZWFsIGNvbnZlcnNhdGlvbg==', 'next' => '5_prompt'],
                ['text' => 'V2FpdCBwYXRpZW50bHkgYW5kIHRydXN0IHRoZW0=', 'next' => '5_wait'],
            ],
        ],
        '5_prompt' => [
            'prose'  => 'WW91IGdlbnRseSBub3RlLCB0byBubyBvbmUgaW4gcGFydGljdWxhciwgdGhhdCB5b3UndmUgd2F0Y2hlZCB0d28gZmFtaWx5IGFyZ3VtZW50cyBhbHJlYWR5IGdldCBwcm9wZXJseSBzZXR0bGVkIHRoaXMgd2hvbGUgam91cm5leSwgYW5kIHRoYXQgbmVpdGhlciBzaWRlIHJlZ3JldHRlZCBpdCBhZnRlcndhcmQuIEl0J3MgYSBzbWFsbCBudWRnZSwgYnV0IGl0J3MgZW5vdWdoIOKAlCBJZHJpcywgYWZ0ZXIgYSBtb21lbnQsIGFza3MgdGhlIGFjdHVhbCBxdWVzdGlvbiB1bmRlcm5lYXRoIHRoZSBzaWxlbmNlOiB3aHkgQmVya2FudCByZWFsbHkgc3RheWVkIGF3YXkgc28gbG9uZy4KClRoZSBjb252ZXJzYXRpb24gdGhhdCBmb2xsb3dzIGlzIGRpZmZpY3VsdCwgaG9uZXN0LCBhbmQgZ2VudWluZWx5IGhlYWxpbmcsIHllYXJzIG9mIG1pc3VuZGVyc3RhbmRpbmcgZmluYWxseSBnZXR0aW5nIHByb3Blcmx5IGFpcmVkLg==',
            'choices' => [
                ['text' => 'U2VlIHdoZXJlIGl0IGxhbmRz', 'next' => '6_shared'],
            ],
        ],
        '5_wait' => [
            'prose'  => 'WW91IHdhaXQsIHBhdGllbnRseSwgbGV0dGluZyB0aGUgc2lsZW5jZSBkbyBpdHMgb3duIHNsb3cgd29yayByYXRoZXIgdGhhbiBmb3JjaW5nIGFueXRoaW5nLiBFdmVudHVhbGx5LCB1bnByb21wdGVkLCBJZHJpcyBhc2tzIHRoZSBhY3R1YWwgcXVlc3Rpb24gdW5kZXJuZWF0aCBoaXMgb3duIGd1YXJkZWRuZXNzOiB3aHkgQmVya2FudCByZWFsbHkgc3RheWVkIGF3YXkgc28gbG9uZy4KClRoZSBjb252ZXJzYXRpb24gdGhhdCBmb2xsb3dzIGlzIGRpZmZpY3VsdCwgaG9uZXN0LCBhbmQgZ2VudWluZWx5IGhlYWxpbmcsIHllYXJzIG9mIG1pc3VuZGVyc3RhbmRpbmcgZmluYWxseSBnZXR0aW5nIHByb3Blcmx5IGFpcmVkLCBvbiBpdHMgb3duIHRpbWVsaW5lIHJhdGhlciB0aGFuIHlvdXJzLg==',
            'choices' => [
                ['text' => 'U2VlIHdoZXJlIGl0IGxhbmRz', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QnkgdGhlIGNvbnZlcnNhdGlvbidzIGVuZCwgc29tZXRoaW5nIHJlYWwgaGFzIGFjdHVhbGx5IHNoaWZ0ZWQgYmV0d2VlbiB0aGUgYnJvdGhlcnMg4oCUIG5vdCBmdWxseSByZXNvbHZlZCwgeWVhcnMgb2YgaHVydCBkb24ndCB1bndpbmQgaW4gYSBzaW5nbGUgYWZ0ZXJub29uLCBidXQgZ2VudWluZWx5LCBtZWFuaW5nZnVsbHkgYmVndW4uIElkcmlzLCByZW1lbWJlcmluZyBhdCBsYXN0IHdoeSB5b3UncmUgYWN0dWFsbHkgaGVyZSwgcmV0cmlldmVzIHRoZSB3ZWRnZSBmcm9tIGEgd29ya3Nob3AgZHJhd2VyLgoKJ1lzb2xkZSdzLCB5ZXMsJyBoZSBjb25maXJtcy4gJ1RyYWRlZCB0byBvdXIgZmFtaWx5IGZhaXJseSwgeWVhcnMgYmFjay4gRmVlbHMgcmlnaHQsIHNvbWVob3csIHRoYXQgaXQncyBsZWF2aW5nIG9uIHRoZSBzYW1lIGRheSBzb21ldGhpbmcgZWxzZSBmaW5hbGx5IGdvdCBwcm9wZXJseSBzdGFydGVkIHRvby4n',
            'choices' => [
                ['text' => 'VGhhbmsgdGhlbSBib3RoIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIENvcmRvYmEncyBsYXllcmVkIGFyY2hpdGVjdHVyZSBjYXRjaGluZyB0aGUgZXZlbmluZyBsaWdodCBiZWhpbmQgeW91LCBCZXJrYW50IGxpbmdlcmluZyBhIHdoaWxlIGxvbmdlciB3aXRoIGhpcyBicm90aGVyIGJlZm9yZSBmaW5hbGx5LCByZWx1Y3RhbnRseSwgcmVqb2luaW5nIHlvdSBmb3IgdGhlIHJvYWQgYWhlYWQuCgonV2UncmUgZ29pbmcgdG8gYWN0dWFsbHkgd3JpdGUgdG8gZWFjaCBvdGhlciBub3csJyBoZSBzYXlzLCB3aGVuIGhlIGNhdGNoZXMgdXAsIHNvbWV0aGluZyBsaWdodGVyIGluIGhpcyB3aG9sZSBiZWFyaW5nIHRoYW4geW91J3ZlIHNlZW4gdGhlIGVudGlyZSBqb3VybmV5LiAnUmVhbCBsZXR0ZXJzLiBOb3QganVzdCBzaWxlbmNlIHByZXRlbmRpbmcgdG8gYmUgZmluZS4n',
            'choices' => [
                ['text' => 'U2F5IHRoYXQncyB3b3J0aCBtb3JlIHRoYW4gYW55IHdlZGdl', 'next' => '8_end_worth'],
                ['text' => 'U2F5IHlvdSdyZSBwcm91ZCBvZiBoaW0gZm9yIHN0YXlpbmc=', 'next' => '8_end_proud'],
            ],
        ],
        '8_end_worth' => [
            'prose'  => 'J1RoYXQncyB3b3J0aCBtb3JlIHRoYW4gYW55IHdlZGdlLCBob25lc3RseSwnIHlvdSBzYXksIGFuZCBCZXJrYW50LCBmb3Igb25jZSwgZG9lc24ndCBkZWZsZWN0IHRoZSBzZW50aW1lbnQgd2l0aCBncnVmZm5lc3MuICdNaWdodCBiZSwnIGhlIGFkbWl0cy4gJ0Z1bm55LCBjaGFzaW5nIGFuIG9sZCBkZWJ0IGNsZWFyIGFjcm9zcyBoYWxmIHRoZSB3b3JsZCwgYW5kIHRoZSBhY3R1YWwgdGhpbmcgd29ydGggZmluZGluZyB0dXJucyBvdXQgdG8gYmUgbXkgb3duIGJyb3RoZXIuJwoKVGhlIGNhcmF2YW4gbW92ZXMgb24gZnJvbSBDb3Jkb2JhIGludG8gZXZlbmluZywgYW5kIHlvdSBmaW5kIHlvdXJzZWxmIGdlbnVpbmVseSBnbGFkIHRoaXMgd2hvbGUgcml2YWxyeSBsZWQgaGVyZSBpbnN0ZWFkIG9mIGFueXdoZXJlIGVsc2Uu',
            'ending' => true,
        ],
        '8_end_proud' => [
            'prose'  => 'J0knbSBwcm91ZCBvZiB5b3UgZm9yIHN0YXlpbmcsJyB5b3Ugc2F5LCBzaW1wbHksIGFuZCBCZXJrYW50LCBncnVmZiBhcyBldmVyLCBzdGlsbCBjYW4ndCBxdWl0ZSBoaWRlIGhvdyBtdWNoIHRoZSB3b3JkcyBsYW5kLiAnV2Fzbid0IGdvaW5nIHRvLCBhdCBmaXJzdCwnIGhlIGFkbWl0cy4gJ1dhbnRlZCB0byBqdXN0IGtub2NrLCBoYW5kIG92ZXIgdGhlIHdlZGdlIGJ1c2luZXNzLCBsZWF2ZS4gR2xhZCBzb21ldGhpbmcgbWFkZSBtZSBzdGF5IHByb3Blcmx5IGluc3RlYWQuJwoKVGhlIGNhcmF2YW4gbW92ZXMgb24gZnJvbSBDb3Jkb2JhIGludG8gdGhlIGdhdGhlcmluZyBldmVuaW5nLCBhbiBvbGQgcml2YWxyeSdzIHdob2xlIHN0cmFuZ2Ugam91cm5leSBlbmRpbmcgc29tZXdoZXJlIG5laXRoZXIgb2YgeW91IGV4cGVjdGVkIGl0IHRvLg==',
            'ending' => true,
        ],
    ],
];
