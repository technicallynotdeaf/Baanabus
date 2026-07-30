<?php
return [
    'id'    => 13,
    'title' => 'The Lace Around the Seed',
    'color' => '#8A7A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEJhbmRhIElzbGFuZHMgcmlzZSBzbWFsbCBhbmQgdm9sY2FuaWMgb3V0IG9mIGRlZXAgYmx1ZSB3YXRlciwgdGhlIGFjdHVhbCBoaXN0b3JpYyBvcmlnaW4gcG9pbnQgb2YgbnV0bWVnIGFuZCBtYWNlIGJlZm9yZSBlaXRoZXIgc3BpY2UgZXZlciByZWFjaGVkIGFueXdoZXJlIGVsc2Ugb24gRWFydGgg4oCUIGEgZ2VudWluZWx5IHNtYWxsLCByZW1vdGUgcGxhY2UgcmVzcG9uc2libGUgZm9yIGNoYW5naW5nIHRoZSBzaGFwZSBvZiB3b3JsZCB0cmFkZSBmb3IgY2VudHVyaWVzLiBCcnVubyBzZWVtcyBhbG1vc3QgcmV2ZXJlbnQgc3RlcHBpbmcgb2ZmIHRoZSBib2F0LgoKVHdvIGlzbGFuZCBhcHByb2FjaGVzIHRvd2FyZCB0aGUgb2xkIG51dG1lZyBncm92ZSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRoZSBtYWluIGlzbGFuZCdzIHNldHRsZWQgcGF0aCwgb3IgYSBzbWFsbGVyIGJvYXQgY3Jvc3NpbmcgdG8gYW4gb3V0bHlpbmcgaXNsZXQgd2hlcmUgdGhlIG9sZGVzdCB0cmVlcyBhcmUgc2FpZCB0byBzdGlsbCBzdGFuZC4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbiBpc2xhbmQncyBwYXRo', 'next' => '2_main'],
                ['text' => 'Q3Jvc3MgdG8gdGhlIG91dGx5aW5nIGlzbGV0', 'next' => '2_islet'],
            ],
        ],
        '2_main' => [
            'prose'  => 'VGhlIG1haW4gaXNsYW5kJ3MgcGF0aCB3aW5kcyBwYXN0IG9sZCBEdXRjaCBjb2xvbmlhbCBmb3J0cywgd2VhdGhlcmVkIHJlbWluZGVycyBvZiBleGFjdGx5IGhvdyBtdWNoIGJsb29kIGFuZCB0cmVhc3VyZSB0aGlzIHNtYWxsIHBsYWNlIG9uY2UgY29tbWFuZGVkLiBUaGUgZ3JvdmUgaXRzZWxmLCB3aGVuIHlvdSByZWFjaCBpdCwgaXMgd2VsbC10ZW5kZWQsIGNsZWFybHkgc3RpbGwgYWN0aXZlbHkgd29ya2VkLgoKQW4gb2xkIGdyb3dlciB0aGVyZSBwb2ludHMgeW91IGZ1cnRoZXIsIHRvd2FyZCBzb21lb25lIHdobyBhcHBhcmVudGx5IGtub3dzIHRoZSByZWNpcGUgY2FyZCdzIG9sZGVzdCBpbnN0cnVjdGlvbiBiZXR0ZXIgdGhhbiBhbnlvbmUgZWxzZSBvbiB0aGUgaXNsYW5kLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBwb2ludGVkIGRpcmVjdGlvbg==', 'next' => '3_shared'],
            ],
        ],
        '2_islet' => [
            'prose'  => 'VGhlIGJvYXQgY3Jvc3NpbmcgdG8gdGhlIG91dGx5aW5nIGlzbGV0IGlzIHNob3J0IGJ1dCBnZW51aW5lbHkgYmVhdXRpZnVsLCBjbGVhciB3YXRlciBnaXZpbmcgd2F5IHRvIGEgc21hbGwsIHF1aWV0IHNob3JlIHdoZXJlIHNvbWUgb2YgdGhlIG9sZGVzdCBzdXJ2aXZpbmcgbnV0bWVnIHRyZWVzIG9uIEVhcnRoIHN0aWxsIHN0YW5kLCBnbmFybGVkIGFuZCBtb2Rlc3QtbG9va2luZyBmb3Igc29tZXRoaW5nIHNvIGhpc3RvcmljYWxseSBzaWduaWZpY2FudC4KCkFuIG9sZCBncm93ZXIgdGhlcmUgcG9pbnRzIHlvdSBmdXJ0aGVyLCB0b3dhcmQgc29tZW9uZSB3aG8gYXBwYXJlbnRseSBrbm93cyB0aGUgcmVjaXBlIGNhcmQncyBvbGRlc3QgaW5zdHJ1Y3Rpb24gYmV0dGVyIHRoYW4gYW55b25lIGVsc2Ugb24gdGhlIGlzbGFuZC4=',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBwb2ludGVkIGRpcmVjdGlvbg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WW91J3JlIGxlZCB0byBhbiBlbGRlcmx5IHdvbWFuLCBJYnUgU2FyaSwgd2hvJ3Mgc3BlbnQgaGVyIHdob2xlIGxpZmUgdGVuZGluZyB0aGVzZSBleGFjdCBncm92ZXMgdGhlIHdheSBoZXIgZmFtaWx5IGhhcyBmb3IgZ2VuZXJhdGlvbnMgYmV5b25kIGNvdW50aW5nLiBTaGUgZXhhbWluZXMgdGhlIHJlY2lwZSBjYXJkJ3Mgb2xkZXN0LCBtb3N0IHNwZWNpZmljIGluc3RydWN0aW9uIHdpdGggcmVhbCwgZGVsaWdodGVkIHJlY29nbml0aW9uLiAnTWFjZSwnIHNoZSBzYXlzLiAnVGhlIGxhY2UgYXJvdW5kIHRoZSBudXRtZWcgc2VlZCwgbm90IHRoZSBzZWVkIGl0c2VsZi4gTW9zdCBwZW9wbGUgZG9uJ3QgZXZlbiBrbm93IHRoZXkncmUgZGlmZmVyZW50IHNwaWNlcyBmcm9tIHRoZSBzYW1lIGZydWl0LicKClNoZSBzdHVkaWVzIHlvdS4gJ1RoaXMgaW5zdHJ1Y3Rpb24gaXMgb2xkIOKAlCBvbGRlciB0aGFuIHlvdXIgZ3JhbmRtb3RoZXIsIHByb2JhYmx5IHBhc3NlZCBkb3duIGZyb20gd2hvZXZlciBmaXJzdCB0YXVnaHQgaGVyLiBJIGNhbiBzaG93IHlvdSBwcm9wZXJseSwgaWYgeW91J3JlIHdpbGxpbmcgdG8gYWN0dWFsbHkgbGVhcm4gdGhlIHdob2xlIGZydWl0LCBub3QganVzdCB0YWtlIHRoZSBwYXJ0IHlvdSBjYW1lIGZvci4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHRvIGxlYXJuIHRoZSB3aG9sZSBmcnVpdA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SWJ1IFNhcmkgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IGxlYXJuOiBoYXJ2ZXN0IGEgZnJ1aXQgeW91cnNlbGYgZnJvbSB0aGUgdHJlZSwgbGVhcm5pbmcgdGhlIHdob2xlIHByb2Nlc3MgZnJvbSBwaWNraW5nIHRvIHRoZSBkZWxpY2F0ZSBzZXBhcmF0aW9uIG9mIG1hY2UgZnJvbSBudXRtZWcsIG9yIHNpdCB3aXRoIGhlciB3aGlsZSBzaGUgZGVtb25zdHJhdGVzIG9uIGFscmVhZHktaGFydmVzdGVkIGZydWl0LCBmb2N1c2luZyBlbnRpcmVseSBvbiB0aGUgbWFjZSdzIG93biBwYXJ0aWN1bGFyLCBkZWxpY2F0ZSBoYW5kbGluZy4KCidFaXRoZXIgdGVhY2hlcyByZWFsIHJlc3BlY3QgZm9yIHRoZSB3aG9sZSB0aGluZywnIHNoZSBzYXlzLiAnRnVsbCBwcm9jZXNzLCBvciBmb2N1c2VkIGF0dGVudGlvbi4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'SGFydmVzdCBhIGZydWl0IHlvdXJzZWxm', 'next' => '5_harvest'],
                ['text' => 'Rm9jdXMgb24gdGhlIG1hY2UncyBkZWxpY2F0ZSBoYW5kbGluZw==', 'next' => '5_focus'],
            ],
        ],
        '5_harvest' => [
            'prose'  => 'SGFydmVzdGluZyBhIGZydWl0IHlvdXJzZWxmIG1lYW5zIHRoZSB3aG9sZSBjYXJlZnVsIHByb2Nlc3Mg4oCUIHNlbGVjdGluZyBvbmUgcHJvcGVybHkgcmlwZSwgc3BsaXR0aW5nIGl0IG9wZW4gdG8gcmV2ZWFsIHRoZSBzZWVkIHdyYXBwZWQgaW4gaXRzIGxhY2UtbGlrZSByZWQgbWFjZSwgdGhlbiBwYXRpZW50bHkgc2VwYXJhdGluZyB0aGUgdHdvIHdpdGhvdXQgZGFtYWdpbmcgZWl0aGVyLiBJYnUgU2FyaSBndWlkZXMgeW91ciBoYW5kcyB0aGUgd2hvbGUgd2F5LgoKQnkgdGhlIGVuZCwgeW91IHVuZGVyc3RhbmQgdGhlIHdob2xlIGZydWl0J3Mgc3RydWN0dXJlIGluIGEgd2F5IG5vIGV4cGxhbmF0aW9uIGFsb25lIGNvdWxkIGhhdmUgdGF1Z2h0IHlvdS4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBtYWNlIHByb3Blcmx5IHByZXBhcmVk', 'next' => '6_shared'],
            ],
        ],
        '5_focus' => [
            'prose'  => 'Rm9jdXNpbmcgZW50aXJlbHkgb24gdGhlIG1hY2UncyBkZWxpY2F0ZSBoYW5kbGluZyBtZWFucyBjbG9zZSwgY2FyZWZ1bCB3b3JrIHdpdGggYWxyZWFkeS1oYXJ2ZXN0ZWQgbGFjZSwgbGVhcm5pbmcgZXhhY3RseSBob3cgdG8gZHJ5IGFuZCBmbGF0dGVuIGl0IHByb3Blcmx5IHdpdGhvdXQgaXQgY3J1bWJsaW5nIG9yIGxvc2luZyBpdHMgZGlzdGluY3RpdmUsIHNsaWdodGx5IHN3ZWV0ZXIgd2FybXRoIGNvbXBhcmVkIHRvIHRoZSBudXRtZWcgaXQgb25jZSB3cmFwcGVkLgoKQnkgdGhlIGVuZCwgeW91ciBoYW5kcyBrbm93IHRoZSBzcGVjaWZpYyBkZWxpY2FjeSB0aGlzIG9uZSBwYXJ0IG9mIHRoZSBmcnVpdCBhY3R1YWxseSBkZW1hbmRzLg==',
            'choices' => [
                ['text' => 'U2VlIHRoZSBtYWNlIHByb3Blcmx5IHByZXBhcmVk', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SWJ1IFNhcmkgaW5zcGVjdHMgdGhlIGZpbmlzaGVkIG1hY2Ugd2l0aCByZWFsIHNhdGlzZmFjdGlvbiwgcGFja2FnaW5nIGl0IHdpdGggdGhlIHNhbWUgY2FyZWZ1bCBhdHRlbnRpb24gc2hlJ3MgY2xlYXJseSBicm91Z2h0IHRvIHRoaXMgZXhhY3QgdGFzayBoZXIgd2hvbGUgbGlmZS4gJ1RoZSBvbGRlc3QgaW5zdHJ1Y3Rpb24gaXMgb2Z0ZW4gdGhlIHNpbXBsZXN0IG9uZSwgdW5kZXJuZWF0aCBldmVyeXRoaW5nIGVsc2UsJyBzaGUgc2F5cy4gJ1Jlc3BlY3QgdGhlIHdob2xlIGZydWl0IGJlZm9yZSB5b3UgdGFrZSB0aGUgb25lIHBhcnQgeW91IG5lZWQuIFlvdXIgZ3JhbmRtb3RoZXIgdW5kZXJzdG9vZCB0aGF0LiBTb21lb25lIG11c3QgaGF2ZSB0YXVnaHQgaGVyIHByb3Blcmx5IHRvbywgb25jZS4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0b3dhcmQgdGhlIGJvYXQgd2l0aCB0aGUgbWFjZSBzZWN1cmUgaW4gaXRzIGNhcmVmdWwgd3JhcCwgdGhlIHNtYWxsIHZvbGNhbmljIGlzbGFuZHMgcmVzcG9uc2libGUgZm9yIHNvIG11Y2ggb2Ygd29ybGQgaGlzdG9yeSByZWNlZGluZyBzbG93bHkgYmVoaW5kIHlvdSwgdGhlIHdob2xlIHZpc2l0IHNldHRsaW5nIGluIGFzIG9uZSBvZiB0aGUgbW9zdCBxdWlldGx5IHNpZ25pZmljYW50IHN0b3BzIG9mIHRoZSBlbnRpcmUgdHJpcC4KCkJydW5vLCB1bnVzdWFsbHkgcmVmbGVjdGl2ZSwgbG9va3MgYmFjayBhdCB0aGUgaXNsYW5kcyBhIGxvbmcgbW9tZW50LiAnRXZlcnl0aGluZyB0cmFjZXMgYmFjayB0byBzb21ld2hlcmUgdGhpcyBzbWFsbCwgZXZlbnR1YWxseS4gRnVubnksIGhvdyBoaXN0b3J5IHdvcmtzIHRoYXQgd2F5Lic=',
            'choices' => [
                ['text' => 'U2F5IGl0IG1ha2VzIHRoZSB3aG9sZSByZWNpcGUgZmVlbCBtb3JlIHNpZ25pZmljYW50', 'next' => '8_end_significant'],
                ['text' => 'U2F5IGl0IG1ha2VzIHlvdSBmZWVsIHNtYWxsIGluIGEgZ29vZCB3YXk=', 'next' => '8_end_small'],
            ],
        ],
        '8_end_significant' => [
            'prose'  => 'J0l0IG1ha2VzIHRoZSB3aG9sZSByZWNpcGUgZmVlbCBtb3JlIHNpZ25pZmljYW50LCBob25lc3RseSwnIHlvdSBzYXksIHdhdGNoaW5nIHRoZSBpc2xhbmRzIHNocmluayBpbnRvIHRoZSBkZWVwIGJsdWUgZGlzdGFuY2UuICdFdmVyeSBzcGljZSBpbiB0aGlzIGJveCBldmVudHVhbGx5IHRyYWNlcyBiYWNrIHRvIHNvbWV3aGVyZSBleGFjdGx5IGxpa2UgdGhpcyDigJQgc21hbGwsIHNwZWNpZmljLCBnZW51aW5lbHkgZWFybmVkLicKCkJydW5vIG5vZHMgc2xvd2x5LiAnVGhhdCdzIHJhdGhlciB0aGUgd2hvbGUgbGVzc29uIG9mIHRoaXMgdHJpcCwgaXNuJ3QgaXQuIE5vdGhpbmcgaW4gdGhhdCBib3ggaXMgYWN0dWFsbHkgb3JkaW5hcnksIG9uY2UgeW91IHRyYWNlIGl0IGJhY2sgZmFyIGVub3VnaC4n',
            'ending' => true,
        ],
        '8_end_small' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBtYWtlcyBtZSBmZWVsIHNtYWxsIGluIGEgZ29vZCB3YXksJyB5b3UgYWRtaXQsIHRoaW5raW5nIG9mIGNlbnR1cmllcyBvZiBoaXN0b3J5IGNvbXByZXNzZWQgaW50byBvbmUgbW9kZXN0LCBnbmFybGVkIG9sZCB0cmVlLiAnV2hhdGV2ZXIgSSdtIGRvaW5nIGhlcmUgZmVlbHMgbGlrZSBhIHZlcnkgc21hbGwsIHZlcnkgcmVjZW50IGFkZGl0aW9uIHRvIHNvbWV0aGluZyBlbm9ybW91cyBhbmQgb2xkLicKCkJydW5vIHNtaWxlcy4gJ1RoYXQncyBub3QgYSBiYWQgd2F5IHRvIGZlZWwsIHRoaXMgZmFyIGludG8gdGhlIGpvdXJuZXkuIEtlZXBzIHRoaW5ncyBwcm9wZXJseSBpbiBwZXJzcGVjdGl2ZS4nIFRoZSBib2F0IHB1bGxzIGF3YXkgZnJvbSB0aGUgaXNsYW5kcyBhcyB0aGUgYWZ0ZXJub29uIGxpZ2h0IHR1cm5zIGdvbGQu',
            'ending' => true,
        ],
    ],
];
