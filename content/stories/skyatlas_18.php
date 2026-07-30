<?php
return [
    'id'    => 18,
    'title' => 'Less Certain Than Before',
    'color' => '#3A6A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'S2llbGRlciBGb3Jlc3QncyBkZW5zZSBjb25pZmVycyByb2xsIG91dCBhY3Jvc3MgdGhlIEVuZ2xpc2ggYm9yZGVyIGNvdW50cnksIG9uZSBvZiB0aGUgbGFyZ2VzdCBwcm90ZWN0ZWQgZGFyay1za3kgYXJlYXMgaW4gRXVyb3BlIHNldHRsaW5nIGludG8gYSBzb2Z0LCBkcml6emx5IGR1c2suIFByaXlhIGxhbmRzIG5lYXIgYSBzbWFsbCB2b2x1bnRlZXIgb2JzZXJ2YXRvcnkgaHV0LCBjaGVja2luZyBoZXIgbm90ZXMgd2l0aCBhIHNsaWdodCBzaWdoLiAnVm9zcyBhZ2FpbiwnIHNoZSBzYXlzLiAnVGhpcmQgdGltZSBub3cuIFNvbWV0aGluZydzIGRpZmZlcmVudCBhYm91dCBoaW0gdGhpcyB2aXNpdCwgdGhvdWdoIOKAlCBjYW4ndCBxdWl0ZSBzYXkgd2hhdCB5ZXQuJwoKVHdvIGZvcmVzdCByb3V0ZXMgdG93YXJkIHRoZSBvYnNlcnZhdG9yeSBodXQgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgbWFya2VkIGZvcmVzdHJ5IHRyYWNrLCBvciBhIHF1aWV0ZXIgcGF0aCBhbG9uZyBhIHN0cmVhbS4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFya2VkIGZvcmVzdHJ5IHRyYWNr', 'next' => '2_track'],
                ['text' => 'Rm9sbG93IHRoZSBxdWlldCBzdHJlYW0gcGF0aA==', 'next' => '2_stream'],
            ],
        ],
        '2_track' => [
            'prose'  => 'VGhlIG1hcmtlZCBmb3Jlc3RyeSB0cmFjayBjdXRzIGEgY2xlYXIsIHdlbGwtc2lnbmVkIHBhdGggdGhyb3VnaCBkZW5zZSBjb25pZmVycywgZHJpenpsZSBzZXR0bGluZyBzb2Z0bHkgb24gdGhlIGNhbm9weSBvdmVyaGVhZCB0aGUgd2hvbGUgY29tZm9ydGFibGUgd2Fsay4gWW91IHJlYWNoIHRoZSBodXQgcHJvbXB0bHksIGZvbGxvd2luZyBjbGVhciB3YXltYXJrZXJzIHRoZSBlbnRpcmUgd2F5Lg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGh1dA==', 'next' => '3_shared'],
            ],
        ],
        '2_stream' => [
            'prose'  => 'VGhlIHF1aWV0ZXIgcGF0aCBhbG9uZyB0aGUgc3RyZWFtIG9mZmVycyBhIG1vcmUgYXRtb3NwaGVyaWMgcm91dGUsIHdhdGVyIHJ1bm5pbmcgc3RlYWR5IGJlc2lkZSB5b3UgdW5kZXIgdGhlIGRyaXp6bGluZyBjYW5vcHksIHRoZSBmb3Jlc3QncyBkYW1wLCBlYXJ0aHkgc21lbGwgc2V0dGxpbmcgaW4gcHJvcGVybHkuIFlvdSByZWFjaCB0aGUgaHV0IGEgbGl0dGxlIGxhdGVyLCBoYXZpbmcgZW5qb3llZCB0aGUgZ2VudGxlciB3YWxrLg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGh1dA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SW5zaWRlIHRoZSBodXQsIGEgY2hlZXJmdWwgdm9sdW50ZWVyIG5hbWVkIE5pZ2VsIGdyZWV0cyB5b3Ugd2FybWx5IOKAlCBhbmQgdGhlcmUsIHNlYXRlZCBxdWlldGx5IGluIHRoZSBjb3JuZXIgcmF0aGVyIHRoYW4gc3RhbmRpbmcgd2l0aCBoaXMgdXN1YWwgYXNzZXJ0aXZlbmVzcywgaXMgVm9zcywgbG9va2luZyBub3RpY2VhYmx5IGxlc3MgY2VydGFpbiBvZiBoaW1zZWxmIHRoYW4gYXQgYW55IHByZXZpb3VzIHN0b3AuICdJJ2QgbGlrZSB0byB0cnkgdGhpcyBkaWZmZXJlbnRseSwnIGhlIHNheXMsIGJlZm9yZSB5b3UgY2FuIGV2ZW4gcmVhY3QuICdObyBkZW1hbmRzIHRoaXMgdGltZS4gSnVzdCDigJQgYSBjb252ZXJzYXRpb24sIGlmIHlvdSdyZSB3aWxsaW5nLicKCk5pZ2VsIHJhaXNlcyBhbiBleWVicm93IGF0IHlvdSwgY2xlYXJseSBsZWF2aW5nIHRoZSBjaG9pY2UgZW50aXJlbHkgaW4geW91ciBoYW5kcy4=',
            'terminal' => true,
            'choices' => [
                ['text' => 'RGVjaWRlIGhvdyB0byByZXNwb25kIHRvIFZvc3M=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGNvdWxkIGFncmVlIHRvIGhlYXIgaGltIG91dCBwcm9wZXJseSwgY3VyaW91cyB3aGF0J3MgYWN0dWFsbHkgY2hhbmdlZCBpbiBoaXMgYXBwcm9hY2gsIG9yIHlvdSBjb3VsZCBrZWVwIHlvdXIgZGlzdGFuY2UgcG9saXRlbHksIHByb2NlZWRpbmcgd2l0aCBOaWdlbCBhbmQgdGhlIHJpZGRsZSB3aGlsZSBsZWF2aW5nIFZvc3MncyBzb2Z0ZXIgb3ZlcnR1cmUgdW5hbnN3ZXJlZCBmb3Igbm93LgoKJ1lvdXIgY2FsbCwgZW50aXJlbHksJyBOaWdlbCBzYXlzIHF1aWV0bHkuICdJJ2xsIGdldCB0aGUgcmlkZGxlIHJlYWR5IGVpdGhlciB3YXkuJw==',
            'choices' => [
                ['text' => 'QWdyZWUgdG8gaGVhciBWb3NzIG91dCBwcm9wZXJseQ==', 'next' => '5_hear'],
                ['text' => 'S2VlcCB5b3VyIGRpc3RhbmNlIHBvbGl0ZWx5IGZvciBub3c=', 'next' => '5_distance'],
            ],
        ],
        '5_hear' => [
            'prose'  => 'SGVhcmluZyBWb3NzIG91dCBwcm9wZXJseSByZXZlYWxzIHNvbWV0aGluZyBnZW51aW5lbHkgZGlmZmVyZW50IOKAlCBoZSdzIGRyb3BwZWQgdGhlIGFjcXVpc2l0aW9uIGFyZ3VtZW50IGVudGlyZWx5LCBpbnN0ZWFkIGFza2luZywgYWxtb3N0IGhlc2l0YW50bHksIHdoYXQgdGhlIGF0bGFzIGhhcyBhY3R1YWxseSBtZWFudCB0byB5b3UgcGVyc29uYWxseSwgYXMgdGhvdWdoIHRoZSBxdWVzdGlvbidzIG9ubHkganVzdCBwcm9wZXJseSBvY2N1cnJlZCB0byBoaW0gYWZ0ZXIgbW9udGhzIG9mIGNoYXNpbmcgdGhlIG9iamVjdCBpdHNlbGYuCgpJdCdzIG5vdCBhIGZ1bGwgdHVybi4gQnV0IGl0J3MgYSByZWFsLCBub3RpY2VhYmxlIHNoaWZ0IGZyb20gZXZlcnkgcHJldmlvdXMgZW5jb3VudGVyLg==',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIHJpZGRsZSBmcm9tIE5pZ2Vs', 'next' => '6_shared'],
            ],
        ],
        '5_distance' => [
            'prose'  => 'S2VlcGluZyB5b3VyIGRpc3RhbmNlIHBvbGl0ZWx5IG1lYW5zIGEgYnJpZWYsIGNpdmlsIGFja25vd2xlZGdtZW50IGJlZm9yZSB0dXJuaW5nIHlvdXIgYXR0ZW50aW9uIHRvIE5pZ2VsIGFuZCB0aGUgYWN0dWFsIHJpZGRsZSwgVm9zcyB3YXRjaGluZyBxdWlldGx5IGZyb20gaGlzIGNvcm5lciB3aXRob3V0IHByZXNzaW5nIGZ1cnRoZXIsIGhpcyBzb2Z0ZXIgZGVtZWFub3VyIHNvbWVob3cgcGVyc2lzdGluZyBldmVuIHdpdGhvdXQgeW91ciBlbmdhZ2VtZW50LgoKV2hhdGV2ZXIncyBzaGlmdGVkIGluIGhpbSBzZWVtcyByZWFsIGVub3VnaCB0byBob2xkLCBldmVuIHdpdGhvdXQgZW5jb3VyYWdlbWVudC4=',
            'choices' => [
                ['text' => 'TGVhcm4gdGhlIHJpZGRsZSBmcm9tIE5pZ2Vs', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'TmlnZWwgd2Fsa3MgeW91IHRocm91Z2ggdGhlIHJpZGRsZSB3aXRoIHJlYWwsIGluZmVjdGlvdXMgZW50aHVzaWFzbSwgdGhlIGNvbnN0ZWxsYXRpb24gc2V0dGxpbmcgY2xlYXJseSBpbnRvIHRoZSBhdGxhcydzIGJsYW5rIHBhdGNoLiBWb3NzIHdhdGNoZXMgdGhlIHdob2xlIHByb2Nlc3MgZnJvbSBoaXMgY29ybmVyLCBxdWlldCBhbmQgdGhvdWdodGZ1bCBpbiBhIHdheSB0aGF0IGZlZWxzIGVudGlyZWx5IHVubGlrZSBoaXMgcHJldmlvdXMgYWR2ZXJzYXJpYWwgaW50ZXJlc3QuCgonSGUgZGlkbid0IHRyeSBhbnl0aGluZywnIE5pZ2VsIG11cm11cnMgdG8geW91IGFmdGVyd2FyZCwgY2xlYXJseSBub3RpbmcgdGhlIGNoYW5nZSBoaW1zZWxmLiAnV2hhdGV2ZXIgaGFwcGVuZWQgdG8gaGltLCBzb21ldGhpbmcncyBzaGlmdGVkIHByb3Blcmx5Lic=',
            'choices' => [
                ['text' => 'RmluaXNoIHRoZSBwYWdlIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGxlYXZlIHRoZSBodXQgd2l0aCB0aGUgcGFnZSBjb21wbGV0ZSwgVm9zcyBzdGlsbCBzaXR0aW5nIHF1aWV0bHkgaW4gaGlzIGNvcm5lciBhcyB5b3UgZ28sIG9mZmVyaW5nIG9ubHkgYSBzbWFsbCwgdW5jZXJ0YWluIG5vZCByYXRoZXIgdGhhbiBoaXMgdXN1YWwgY29vbCBjb21wb3N1cmUuIFByaXlhJ3Mgd2FpdGluZyBvdXRzaWRlIHdpdGggdGhlIHRoZXJtb3MsIGdlbnVpbmVseSBjdXJpb3VzIGFib3V0IHRoZSBjaGFuZ2UuCgonU29mdGVyLCB0aGlzIHRpbWUsJyBzaGUgc2F5cy4gJ1dvbmRlciB3aGF0J3MgYWN0dWFsbHkgZ29pbmcgb24gd2l0aCBoaW0uJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSB0aGluayBzb21ldGhpbmcgcmVhbCBpcyBzaGlmdGluZyBpbiBoaW0=', 'next' => '8_end_shifting'],
                ['text' => 'U2F5IHlvdSdsbCBiZWxpZXZlIGl0IG9uY2UgeW91IHNlZSBpdCBob2xkIHByb3Blcmx5', 'next' => '8_end_wait'],
            ],
        ],
        '8_end_shifting' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIHRoaW5rIHNvbWV0aGluZyByZWFsIGlzIHNoaWZ0aW5nIGluIGhpbSwnIHlvdSBzYXksIHRoaW5raW5nIG9mIGhpcyB1bmNlcnRhaW4sIHVuZ3VhcmRlZCBxdWVzdGlvbnMgYmFjayBpbiB0aGUgaHV0LiAnRG9lc24ndCBmZWVsIGxpa2UgYSBwZXJmb3JtYW5jZSBhbnltb3JlLiBGZWVscyBsaWtlIGhlJ3MgYWN0dWFsbHkgc3RhcnRpbmcgdG8gdW5kZXJzdGFuZCB3aGF0IHRoaXMgYXRsYXMgaXMgcmVhbGx5IGZvci4nCgpQcml5YSBjb25zaWRlcnMgdGhhdCBzZXJpb3VzbHkuICdDb3VsZCBiZS4gV2UncmUgZ2V0dGluZyBjbG9zZSB0byBXZXN0aGF2ZWxsYW5kIG5leHQg4oCUIGlmIGFueXRoaW5nJ3MgcmVhbGx5IGdvaW5nIHRvIHR1cm4sIHRoYXQnbGwgcHJvYmFibHkgYmUgd2hlcmUgaXQgaGFwcGVucy4n',
            'ending' => true,
        ],
        '8_end_wait' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ2xsIGJlbGlldmUgaXQgb25jZSBJIHNlZSBpdCBob2xkIHByb3Blcmx5LCcgeW91IHNheSwgdGhpbmtpbmcgb2YgaGlzIG1vbnRocyBvZiBwZXJzaXN0ZW50LCBjb29sIHB1cnN1aXQgYmVmb3JlIG5vdy4gJ09uZSBxdWlldCBjb3JuZXIgYW5kIGEgc29mdCBxdWVzdGlvbiBkb2Vzbid0IHVuZG8gdGhhdCB3aG9sZSBwYXR0ZXJuIG92ZXJuaWdodC4nCgpQcml5YSBub2RzLCBtYXRjaGluZyB5b3VyIGNhdXRpb24uICdGYWlyLiBUaW1lIHdpbGwgdGVsbCwgc2FtZSBhcyBhbHdheXMuJyBUaGUgUXVpZXQgSG91ciBsaWZ0cyBvZmYgdGhyb3VnaCBLaWVsZGVyJ3MgZHJpenpsaW5nIGNhbm9weSwgdGhlIGZvcmVzdCdzIGRlbnNlIGdyZWVuIHNocmlua2luZyBiZWxvdyBpbnRvIHRoZSBmYWRpbmcgRW5nbGlzaCBkdXNrLg==',
            'ending' => true,
        ],
    ],
];
