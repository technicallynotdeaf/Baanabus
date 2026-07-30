<?php
return [
    'id'    => 4,
    'title' => 'The Letter Mattered More Than the Hand',
    'color' => '#3A8AA0',

    'pages' => [
        '1_start' => [
            'prose'  => 'SGVyYXQgcmlzZXMgYXJvdW5kIGl0cyBvbGQgY2l0YWRlbCBhbmQgbWluYXJldHMsIGEgY2l0eSB3aG9zZSByZXB1dGF0aW9uIGZvciBjYWxsaWdyYXBoeSBhbmQgZmluZSBhcnQgaGFzIG91dGxhc3RlZCBlbXBpcmVzLCBjb25xdWVyb3JzLCBhbmQgY2VudHVyaWVzIG9mIGNoYW5nZSBhbGlrZS4gVG9tYXMgbWVudGlvbnMsIHdpdGggcmVhbCByZXZlcmVuY2UsIHRoYXQgdGhpcyBjaXR5IHByb2R1Y2VkIHNvbWUgb2YgdGhlIGZpbmVzdCBoYW5kd3JpdGluZyB0aGUgd29ybGQgaGFzIGV2ZXIgc2VlbiDigJQgYW4gYXJ0IGZvcm0gaGVyZSB0cmVhdGVkIHdpdGggdGhlIHNhbWUgc2VyaW91c25lc3Mgb3RoZXIgcGxhY2VzIHJlc2VydmUgZm9yIGFyY2hpdGVjdHVyZSBvciBsYXcuCgpUd28gd2F5cyB0byBmaW5kIHRoZSBjYWxsaWdyYXBoZXIgd2hvIGNvcnJlc3BvbmRlZCB3aXRoIFlzb2xkZSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIG9sZCBtYXJrZXQgYmVuZWF0aCB0aGUgY2l0YWRlbCwgd2hlcmUgd29ya2luZyBhcnRpc2FucyBzdGlsbCBrZWVwIHNtYWxsIHN0dWRpb3MsIG9yIHRocm91Z2ggYSBtb3NxdWUncyBzY2hvbGFybHkgbmV0d29yaywgbW9yZSBmb3JtYWwsIG1vcmUgbGlrZWx5IHRvIGtub3cgZXhhY3RseSB3aGVyZSBhIG1hc3RlciBjYWxsaWdyYXBoZXIgY2FuIGN1cnJlbnRseSBiZSBmb3VuZC4=',
            'choices' => [
                ['text' => 'U2VhcmNoIHRoZSBtYXJrZXQgc3R1ZGlvcw==', 'next' => '2_market'],
                ['text' => 'QXNrIHRocm91Z2ggdGhlIG1vc3F1ZSBuZXR3b3Jr', 'next' => '2_mosque'],
            ],
        ],
        '2_market' => [
            'prose'  => 'VGhlIG1hcmtldCBiZW5lYXRoIHRoZSBjaXRhZGVsIGlzIGEgZ2VudWluZSB3b3JraW5nIGFydGlzYW4ncyBxdWFydGVyLCBpbmsgYW5kIHBhcGVyIGFuZCB0aGUgc3BlY2lmaWMsIHBhcnRpY3VsYXIgc21lbGwgb2YgcHJlcGFyZWQgcmVlZCBwZW5zIGZpbGxpbmcgc21hbGwgc3R1ZGlvcyB0dWNrZWQgYmV0d2VlbiBtb3JlIG9yZGluYXJ5IHNob3BzLiBTZXZlcmFsIGFydGlzdHMgcmVjb2duaXNlIHRoZSBuYW1lIHlvdSdyZSBhc2tpbmcgYWZ0ZXIgaW1tZWRpYXRlbHksIHBvaW50aW5nIHlvdSB0b3dhcmQgYSBzcGVjaWZpYyBuYXJyb3cgYWxsZXkgd2l0aCByZWFsLCB1bmhlc2l0YXRpbmcgY2VydGFpbnR5LgoKJ01hc3RlciBSYWhpbWksJyBvbmUgc2F5cy4gJ1N0aWxsIHdvcmtpbmcsIHN0aWxsIGV4YWN0aW5nLiBZb3UnbGwgd2FudCB0byBoYXZlIHlvdXIgcmVhc29ucyBwcm9wZXJseSBpbiBvcmRlciBiZWZvcmUgeW91IGtub2NrLic=',
            'choices' => [
                ['text' => 'RmluZCB0aGUgc3R1ZGlv', 'next' => '3_shared'],
            ],
        ],
        '2_mosque' => [
            'prose'  => 'VGhlIG1vc3F1ZSdzIHNjaG9sYXJseSBuZXR3b3JrIG1vdmVzIHNsb3dlciBidXQgbW9yZSBjZXJ0YWlubHksIGEgc2VyaWVzIG9mIGNhcmVmdWwgaW50cm9kdWN0aW9ucyBsZWFkaW5nIGV2ZW50dWFsbHkgdG8gYSBwcmVjaXNlIGFkZHJlc3MgYW5kIGEgcHJlY2lzZSB3YXJuaW5nLiAnTWFzdGVyIFJhaGltaSBkb2Vzbid0IHN1ZmZlciBjYXJlbGVzc25lc3MsJyBhbiBlbGRlcmx5IHNjaG9sYXIgdGVsbHMgeW91LiAnQXBwcm9hY2ggaGltIHByb3Blcmx5LCBvciBkb24ndCBhcHByb2FjaCBoaW0gYXQgYWxsLicKCllvdSBhcnJpdmUgYXQgdGhlIHN0dWRpbyB3aXRoIHJlYWwsIGVhcm5lZCByZXNwZWN0IGZvciBleGFjdGx5IHdoYXQgeW91J3JlIGFib3V0IHRvIGFzayBvZiBoaW0u',
            'choices' => [
                ['text' => 'RmluZCB0aGUgc3R1ZGlv', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'TWFzdGVyIFJhaGltaSBpcyBlbGRlcmx5LCBwcmVjaXNlLCBlbnRpcmVseSB1bmh1cnJpZWQgZGVzcGl0ZSBkZWNhZGVzIG9mIGFwcGFyZW50IGltcGF0aWVuY2Ugd2l0aCBhbnl0aGluZyBzbG9wcHkuIEhlIHJlbWVtYmVycyBZc29sZGUgaW1tZWRpYXRlbHksIHdpdGggcmVhbCB3YXJtdGguICdTaGUgd3JvdGUgdG8gbWUgZm9yIHllYXJzLCBhYm91dCB0cmFkZSBhbmQgYWJvdXQgZXZlcnl0aGluZyBlbHNlIGJlc2lkZXMg4oCUIGEgZ2VudWluZSBmcmllbmQsIHRob3VnaCB3ZSBuZXZlciBvbmNlIG1ldCBpbiBwZXJzb24uJyBIZSBwcm9kdWNlcyB0aGUgd2VkZ2UsIHRoZW4gc2V0cyBpdCBkZWxpYmVyYXRlbHkgb3V0IG9mIHJlYWNoLgoKJ1NoZSBhbHdheXMgd3JvdGUgaGVyIG93biBsZXR0ZXJzLCBieSBoZXIgb3duIGhhbmQsIG5ldmVyIGRpY3RhdGVkLiBJJ2xsIGdpdmUgdGhpcyB0byB3aG9ldmVyIHByb3ZlcyBjYXBhYmxlIG9mIHRoZSBzYW1lIOKAlCBhIGxldHRlciwgcHJvcGVybHkgd3JpdHRlbiwgYnkgeW91LCB0byB3aG9ldmVyIHlvdSdyZSBhY3R1YWxseSBkb2luZyBhbGwgdGhpcyBmb3IuIENvbnRlbnQgbWF0dGVycyBtb3JlIHRoYW4gc2tpbGwuIEJ1dCBpdCBoYXMgdG8gYmUgcmVhbC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdyB0byBwcmVwYXJl', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'UmFoaW1pIG9mZmVycyB0d28gcGF0aHM6IHNwZW5kIHRoZSBhZnRlcm5vb24gbGVhcm5pbmcgdGhlIGJhc2ljIGRpc2NpcGxpbmUgb2YgcHJvcGVyIGxldHRlciBmb3JtYXRpb24gZnJvbSBoaW0gZGlyZWN0bHksIHRlY2huaWNhbCBhbmQgZXhhY3RpbmcsIG9yIHNpbXBseSBzaXQgYW5kIHdyaXRlIGhvbmVzdGx5LCByaWdodCBub3csIHRydXN0aW5nIHNpbmNlcml0eSBvdmVyIHRlY2huaXF1ZSBlbnRpcmVseS4KCidFaXRoZXIgY2FuIHByb2R1Y2Ugc29tZXRoaW5nIHJlYWwsJyBoZSBzYXlzLiAnU2tpbGwgd2l0aG91dCBob25lc3R5IGlzIGVtcHR5IGRlY29yYXRpb24uIEhvbmVzdHkgd2l0aG91dCBhbnkgc2tpbGwgYXQgYWxsIGlzIHN0aWxsIHdvcnRoIG1vcmUgdGhhbiBkZWNvcmF0aW9uLCB0aG91Z2guIENob29zZSB3aGljaCBtYXR0ZXJzIG1vcmUgdG8geW91IHRvZGF5Lic=',
            'choices' => [
                ['text' => 'U3BlbmQgdGhlIGFmdGVybm9vbiBsZWFybmluZyBwcm9wZXIgdGVjaG5pcXVl', 'next' => '5_technique'],
                ['text' => 'V3JpdGUgaG9uZXN0bHkgcmlnaHQgbm93LCB1bnRyYWluZWQ=', 'next' => '5_honest'],
            ],
        ],
        '5_technique' => [
            'prose'  => 'TGVhcm5pbmcgZXZlbiB0aGUgYmFzaWNzIG9mIHByb3BlciBsZXR0ZXIgZm9ybWF0aW9uIHRha2VzIHJlYWwgcGF0aWVuY2Ug4oCUIHBlbiBhbmdsZSwgcHJlc3N1cmUsIHRoZSBzcGVjaWZpYyBkaXNjaXBsaW5lIG9mIGEgc2NyaXB0IHBlcmZlY3RlZCBvdmVyIGNlbnR1cmllcy4gUmFoaW1pIGNvcnJlY3RzIHlvdSBjb25zdGFudGx5LCBwcmVjaXNlbHksIHdpdGhvdXQgbXVjaCBwYXRpZW5jZSBmb3IgZXhjdXNlcywgYW5kIGJ5IHRoZSB0aW1lIHlvdSBmaW5hbGx5IHNpdCB0byB3cml0ZSB5b3VyIGFjdHVhbCBsZXR0ZXIsIHlvdXIgaGFuZCBpcyBzdGVhZGllciB0aGFuIGl0IHdhcyB0aGF0IG1vcm5pbmcuCgpUaGUgbGV0dGVyIHRoYXQgZW1lcmdlcyBpcyBpbXBlcmZlY3QgYnV0IGdlbnVpbmVseSBpbXByb3ZlZCwgdGVjaG5pcXVlIGxlbmRpbmcgcmVhbCB3ZWlnaHQgdG8gd2hhdGV2ZXIgeW91IGFjdHVhbGx5IGhhdmUgdG8gc2F5Lg==',
            'choices' => [
                ['text' => 'U2VlIGlmIGl0IHNhdGlzZmllcyBoaW0=', 'next' => '6_shared'],
            ],
        ],
        '5_honest' => [
            'prose'  => 'WW91IHdyaXRlIHdpdGhvdXQgdHJhaW5pbmcsIHdpdGhvdXQgcG9saXNoLCBzaW1wbHkgcHV0dGluZyBkb3duIGhvbmVzdGx5IGV2ZXJ5dGhpbmcgdGhpcyB3aG9sZSBqb3VybmV5IGhhcyBhY3R1YWxseSBtZWFudCBzbyBmYXIg4oCUIHRoZSBydWluZWQgaG91c2UsIHRoZSBmYW1pbHkgZGVidHMgc2V0dGxlZCBvbmUgYnkgb25lLCB0aGUgc3RyYW5nZSwgcGF0aWVudCBnZW5lcm9zaXR5IG9mIHN0cmFuZ2VycyBhbG9uZyB0aGUgd2F5LiBUaGUgaGFuZHdyaXRpbmcgaXMgcm91Z2guIFRoZSBjb250ZW50IGlzbid0LgoKUmFoaW1pIHJlYWRzIGl0IHNsb3dseSwgYW5kIHNvbWV0aGluZyBpbiBoaXMgY2FyZWZ1bCwgZXhhY3RpbmcgZmFjZSBzb2Z0ZW5zIGJ5IHRoZSBlbmQu',
            'choices' => [
                ['text' => 'U2VlIGlmIGl0IHNhdGlzZmllcyBoaW0=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J1RoaXMgd2lsbCBkbywnIFJhaGltaSBzYXlzLCB3aGljaGV2ZXIgbGV0dGVyIHlvdSBwcm9kdWNlZCwgd2l0aCByZWFsLCBnZW51aW5lIGFwcHJvdmFsIHJhdGhlciB0aGFuIG1lcmUgdG9sZXJhbmNlLiBIZSBoYW5kcyBvdmVyIHRoZSB3ZWRnZSBhdCBsYXN0LiAnWXNvbGRlIHdvdWxkIGhhdmUgYXBwcm92ZWQgb2YgZWl0aGVyIGFwcHJvYWNoLCBob25lc3RseS4gU2hlIGFsd2F5cyBzYWlkIHRoZSBsZXR0ZXIgbWF0dGVyZWQgbW9yZSB0aGFuIHRoZSBoYW5kIHRoYXQgd3JvdGUgaXQsIGV2ZW4gdGhvdWdoIGhlciBvd24gaGFuZCB3YXMgZ2VudWluZWx5IGJlYXV0aWZ1bC4nCgpIZSBzdHVkaWVzIHlvdSBhIG1vbWVudCBsb25nZXIuICdLZWVwIHdyaXRpbmcsIHdoYXRldmVyIGNvbWVzIG9mIHRoZSByZXN0IG9mIHRoaXMgam91cm5leS4gVGhlIGhhYml0IG1hdHRlcnMgbW9yZSB0aGFuIG1vc3QgcGVvcGxlIHJlYWxpc2UuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIEhlcmF0J3MgYW5jaWVudCBtaW5hcmV0cyBjYXRjaGluZyB0aGUgbGFzdCBvZiB0aGUgZGF5J3MgbGlnaHQsIHlvdXIgb3duIGxldHRlciDigJQgaW1wZXJmZWN0LCBob25lc3QsIGdlbnVpbmVseSB5b3VycyDigJQgZm9sZGVkIGNhcmVmdWxseSBhbG9uZ3NpZGUgaXQsIGEgc21hbGwsIHVuZXhwZWN0ZWQgYWRkaXRpb24gdG8gZXZlcnl0aGluZyBlbHNlIHlvdSdyZSBjYXJyeWluZy4KClRvbWFzLCB0b2xkIGFib3V0IHRoZSBleGNoYW5nZSwgbG9va3MgdGhvdWdodGZ1bGx5IGF0IHRoZSBmb2xkZWQgbGV0dGVyLiAnR29pbmcgdG8gYWN0dWFsbHkgc2VuZCB0aGF0IGFueXdoZXJlPyBPciB3YXMgdGhlIHdyaXRpbmcgaXRzZWxmIHRoZSB3aG9sZSBwb2ludD8n',
            'choices' => [
                ['text' => 'U2F5IHRoZSB3cml0aW5nIHdhcyB0aGUgd2hvbGUgcG9pbnQ=', 'next' => '8_end_writing'],
                ['text' => 'U2F5IHlvdSBtaWdodCBzZW5kIGl0IGFmdGVyIGFsbA==', 'next' => '8_end_send'],
            ],
        ],
        '8_end_writing' => [
            'prose'  => 'J1RoZSB3cml0aW5nIHdhcyB0aGUgd2hvbGUgcG9pbnQsIEkgdGhpbmssJyB5b3Ugc2F5LCBhbmQgZmluZCB5b3UgbWVhbiBpdCDigJQgc29tZSB0aGluZ3MgbmVlZCB0byBhY3R1YWxseSBiZSBwdXQgaW50byB3b3JkcywgcHJvcGVybHksIHJlZ2FyZGxlc3Mgb2Ygd2hldGhlciBhbnlvbmUgZWxzZSBldmVyIHJlYWRzIHRoZW0uCgpUb21hcyBub2RzLCB1bmRlcnN0YW5kaW5nIGNvbXBsZXRlbHkuICdSYWhpbWkgd291bGQgYXBwcm92ZSBvZiB0aGF0IGFuc3dlciB0b28sIHByb2JhYmx5LiBNYW4ncyBzcGVudCBoaXMgd2hvbGUgbGlmZSBiZWxpZXZpbmcgdGhlIGFjdCBvZiB3cml0aW5nIG1hdHRlcnMgYXMgbXVjaCBhcyBhbnl0aGluZyB0aGUgd3JpdGluZyBldmVudHVhbGx5IGRvZXMuJw==',
            'ending' => true,
        ],
        '8_end_send' => [
            'prose'  => 'J0kgbWlnaHQgc2VuZCBpdCBhZnRlciBhbGwsJyB5b3UgYWRtaXQsIHN1cnByaXNpbmcgeW91cnNlbGYgYSBsaXR0bGUuICdGZWVscyBsaWtlIGl0IGRlc2VydmVzIHRvIGFjdHVhbGx5IHJlYWNoIHNvbWVvbmUsIG5vdCBqdXN0IHNpdCBmb2xkZWQgaW4gYSBjYXNlLicKClRvbWFzIGNvbnNpZGVycyB0aGlzLCBub2RzIHNsb3dseS4gJ1RoZW4gc2VuZCBpdC4gWXNvbGRlJ3Mgd2hvbGUgbGlmZSB3YXMgYnVpbHQgb24gdHJ1c3RpbmcgdGhhdCB3b3JkcyBzZW50IGhvbmVzdGx5LCBhY3Jvc3Mgd2hhdGV2ZXIgZGlzdGFuY2UsIGV2ZW50dWFsbHkgbGFuZCBzb21ld2hlcmUgdGhleSdyZSBtZWFudCB0by4nIFRoZSBjYXJhdmFuIG1vdmVzIG9uIGZyb20gSGVyYXQgYXMgZXZlbmluZyBwcm9wZXJseSBzZXR0bGVzLCBtaW5hcmV0cyBzaHJpbmtpbmcgc2xvd2x5IGludG8gdGhlIGRhcmtlbmluZyBza3lsaW5lIGJlaGluZCB5b3Uu',
            'ending' => true,
        ],
    ],
];
