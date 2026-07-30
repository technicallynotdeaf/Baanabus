<?php
return [
    'id'    => 22,
    'title' => 'Not A Spice, A Patience',
    'color' => '#6A4A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UHJvdmVuY2UgdW5mb2xkcyBpbiBsYXZlbmRlci1wdXJwbGUgaGlsbHMgYW5kIHBhbGUgc3RvbmUgdmlsbGFnZXMsIHRoZSByZXR1cm4gbGVnIG9mIHRoZSB3aG9sZSBqb3VybmV5IG5vdyBwcm9wZXJseSB1bmRlcndheSwgZXZlcnkgc3BpY2UgdGhlIHJlY2lwZSBuZWVkcyBmaW5hbGx5IGdhdGhlcmVkIGV4Y2VwdCBmb3Igb25lIGxhc3QsIHF1aWV0IHBpZWNlIG9mIGtub3dsZWRnZS4gQnJ1bm8gbWVudGlvbnMgYW4gb2xkIGNvb2sgaGVyZSB3aG8gbWlnaHQgYWN0dWFsbHkgaG9sZCBpdCDigJQgbm90IGFuIGluZ3JlZGllbnQgdGhpcyB0aW1lLCBidXQgYSB0ZWNobmlxdWUuCgpUd28gY291bnRyeSByb3V0ZXMgdG93YXJkIGhlciBmYXJtaG91c2UgcHJlc2VudCB0aGVtc2VsdmVzOiBhbG9uZyB0aGUgbmFycm93ZXIgbGF2ZW5kZXItbGluZWQgbGFuZSwgb3IgdGhlIHdpZGVyIHJvYWQgdGhhdCBsb29wcyBwYXN0IHRoZSB2aWxsYWdlIG1hcmtldCBmaXJzdC4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbGF2ZW5kZXItbGluZWQgbGFuZQ==', 'next' => '2_lane'],
                ['text' => 'TG9vcCBwYXN0IHRoZSB2aWxsYWdlIG1hcmtldCBmaXJzdA==', 'next' => '2_market'],
            ],
        ],
        '2_lane' => [
            'prose'  => 'VGhlIGxhdmVuZGVyLWxpbmVkIGxhbmUgaXMgbmFycm93IGFuZCBmcmFncmFudCwgYmVlcyB3b3JraW5nIHN0ZWFkaWx5IGFtb25nIHRoZSByb3dzIG9uIGVpdGhlciBzaWRlLCB0aGUgd2hvbGUgd2FsayB1bmh1cnJpZWQgYW5kIHF1aWV0bHkgYmVhdXRpZnVsLiBZb3UgcmVhY2ggdGhlIGZhcm1ob3VzZSBkaXJlY3RseSwgdGhlIGxhdmVuZGVyJ3Mgc2NlbnQgZm9sbG93aW5nIHlvdSByaWdodCB1cCB0byB0aGUgZG9vci4=',
            'choices' => [
                ['text' => 'S25vY2sgYW5kIGludHJvZHVjZSB5b3Vyc2VsZg==', 'next' => '3_shared'],
            ],
        ],
        '2_market' => [
            'prose'  => 'TG9vcGluZyBwYXN0IHRoZSB2aWxsYWdlIG1hcmtldCBmaXJzdCBtZWFucyBhIGJyaWVmIHN0b3AgYW1vbmcgc3RhbGxzIG9mIGNoZWVzZSBhbmQgb2xpdmVzIGFuZCBmcmVzaCBicmVhZCwgYSBwbGVhc2FudCBkZXRvdXIgYmVmb3JlIHRoZSBxdWlldGVyIGxhbmUgb3V0IHRvIHRoZSBmYXJtaG91c2UgaXRzZWxmLiBZb3UgYXJyaXZlIGEgbGl0dGxlIGxhdGVyLCBidXQgcHJvcGVybHkgcHJvdmlzaW9uZWQgZm9yIHdoYXRldmVyIGNvbWVzIG5leHQu',
            'choices' => [
                ['text' => 'S25vY2sgYW5kIGludHJvZHVjZSB5b3Vyc2VsZg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhcm1ob3VzZSBiZWxvbmdzIHRvIGFuIG9sZCBjb29rIG5hbWVkIE9kaWxlLCB3aG8ncyBzcGVudCBhIGxpZmV0aW1lIGNvb2tpbmcgZGlzaGVzIG5vdCBzbyBkaWZmZXJlbnQgZnJvbSB0aGUgb25lIHlvdSdyZSBjaGFzaW5nLiBTaGUgcmVhZHMgdGhlIHJlY2lwZSBjYXJkIGNhcmVmdWxseSwgbm9kZGluZyBzbG93bHkgYXQgZWFjaCBzcGljZSBhbHJlYWR5IGdhdGhlcmVkLCB0aGVuIHN0b3BzIGF0IHRoZSB2ZXJ5IGVuZC4KCidUaGVyZSdzIG5vdGhpbmcgbWlzc2luZyBmcm9tIHlvdXIgaW5ncmVkaWVudHMsJyBzaGUgc2F5cy4gJ0J1dCB5b3VyIGdyYW5kbW90aGVyIG5ldmVyIHdyb3RlIGRvd24gaG93IGxvbmcgdGhlIGZpbmlzaGVkIGRpc2ggYWN0dWFsbHkgbmVlZHMgdG8gcmVzdCBiZWZvcmUgaXQncyByaWdodC4gVGhhdCdzIHRoZSBsYXN0IHRoaW5nLiBOb3QgYSBzcGljZS4gQSBwYXRpZW5jZS4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhlciB0byB0ZWFjaCB5b3UgdGhlIHJlc3RpbmcgdGltZQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'T2RpbGUgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IGxlYXJuIGl0OiBjb29rIGEgZnVsbCBkaXNoIHRvZ2V0aGVyIHJpZ2h0IG5vdywgdGltaW5nIHRoZSByZXN0IHByZWNpc2VseSBieSBjbG9jayBzbyB5b3UgaGF2ZSBhbiBleGFjdCBudW1iZXIgdG8gY2FycnkgaG9tZSwgb3IgY29vayBpdCB0b2dldGhlciB3aXRob3V0IGFueSBjbG9jayBhdCBhbGwsIGxlYXJuaW5nIHRvIGp1ZGdlIGRvbmVuZXNzIGJ5IHNtZWxsIGFuZCBjb2xvdXIgYW5kIHRoZSBkaXNoJ3Mgb3duIHF1aWV0IGNoYW5nZXMgaW5zdGVhZC4KCidFaXRoZXIgdGVhY2hlcyB5b3UgdGhlIHJlc3RpbmcgcHJvcGVybHksJyBzaGUgc2F5cy4gJ0V4YWN0IG51bWJlciwgb3IgdHJ1c3RpbmcgeW91ciBzZW5zZXMuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'VGltZSBpdCBwcmVjaXNlbHkgYnkgY2xvY2s=', 'next' => '5_clock'],
                ['text' => 'TGVhcm4gdG8ganVkZ2UgaXQgd2l0aG91dCBhIGNsb2Nr', 'next' => '5_senses'],
            ],
        ],
        '5_clock' => [
            'prose'  => 'VGltaW5nIGl0IHByZWNpc2VseSBieSBjbG9jayBtZWFucyBjb29raW5nIHRoZSBkaXNoIHRvZ2V0aGVyIGFuZCBzZXR0aW5nIGl0IGFzaWRlIGZvciBhbiBleGFjdCwgbWVhc3VyZWQgaW50ZXJ2YWwsIE9kaWxlIGNoZWNraW5nIGhlciB3YXRjaCB3aXRoIHJlYWwgcHJlY2lzaW9uIHNvIHlvdSBsZWF2ZSB3aXRoIGEgc3BlY2lmaWMgbnVtYmVyIHdyaXR0ZW4gZG93biwgcmVsaWFibGUgYW5kIHJlcGVhdGFibGUgd2hlcmV2ZXIgeW91IGNvb2sgaXQgbmV4dC4KCkJ5IHRoZSBlbmQsIHlvdSd2ZSBnb3QgYW4gZXhhY3QgZmlndXJlIOKAlCBzb21ldGhpbmcgY29uY3JldGUgdG8gY2FycnkgdGhlIHJlc3Qgb2YgdGhlIHdheSBob21lLg==',
            'choices' => [
                ['text' => 'VGFzdGUgdGhlIHByb3Blcmx5IHJlc3RlZCBkaXNo', 'next' => '6_shared'],
            ],
        ],
        '5_senses' => [
            'prose'  => 'TGVhcm5pbmcgdG8ganVkZ2UgaXQgd2l0aG91dCBhIGNsb2NrIG1lYW5zIGNvb2tpbmcgdGhlIGRpc2ggdG9nZXRoZXIgYW5kIHNpbXBseSB3YXRjaGluZyBpdCBjaGFuZ2Ug4oCUIHRoZSBzbWVsbCBkZWVwZW5pbmcsIHRoZSBjb2xvdXIgc2V0dGxpbmcsIHRoZSB3aG9sZSB0aGluZyBxdWlldGx5IHRyYW5zZm9ybWluZyBmcm9tIGZpbmlzaGVkIHRvIGFjdHVhbGx5IHJlYWR5IOKAlCBPZGlsZSBwb2ludGluZyBvdXQgZWFjaCBzbWFsbCBzaWduYWwgYXMgaXQgaGFwcGVucyByYXRoZXIgdGhhbiBhbnkgbnVtYmVyIG9uIGEgZGlhbC4KCkJ5IHRoZSBlbmQsIHlvdXIgc2Vuc2VzIGtub3cgdGhlIG1vbWVudCBldmVuIHdpdGhvdXQgYSB0aW1lciB0byBjb25maXJtIGl0Lg==',
            'choices' => [
                ['text' => 'VGFzdGUgdGhlIHByb3Blcmx5IHJlc3RlZCBkaXNo', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIGRpc2gsIHByb3Blcmx5IHJlc3RlZCBlaXRoZXIgd2F5LCB0YXN0ZXMgZGlmZmVyZW50IGZyb20gYW55dGhpbmcgeW91J3ZlIG1hZGUgc28gZmFyIG9uIHRoaXMgd2hvbGUgdHJpcCDigJQgc2V0dGxlZCwgZGVlcGVuZWQsIGV2ZXJ5IHNwaWNlIHlvdSd2ZSBnYXRoZXJlZCBmaW5hbGx5IGdpdmVuIHRoZSB0aW1lIHRvIGFjdHVhbGx5IGZpbmlzaCBiZWNvbWluZyBpdHNlbGYgcmF0aGVyIHRoYW4gYmVpbmcgcnVzaGVkIHN0cmFpZ2h0IHRvIHRoZSB0YWJsZS4gT2RpbGUgd2F0Y2hlcyB5b3VyIHJlYWN0aW9uIHdpdGggcXVpZXQgc2F0aXNmYWN0aW9uLgoKJ1RoYXQncyBpdCwnIHNoZSBzYXlzIHNpbXBseS4gJ1RoZSBsYXN0IHRoaW5nIHlvdXIgZ3JhbmRtb3RoZXIgbmV2ZXIgd3JvdGUgZG93biwgYmVjYXVzZSBzb21lIHRoaW5ncyB5b3UgY2FuIG9ubHkgYWN0dWFsbHkgbGVhcm4gYnkgd2FpdGluZyB0aHJvdWdoIHRoZW0geW91cnNlbGYuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGxlYXZlIHRoZSBmYXJtaG91c2UgYXMgZXZlbmluZyBzZXR0bGVzIGdlbnRseSBvdmVyIHRoZSBsYXZlbmRlciBoaWxscywgdGhlIGxhc3QgcGllY2Ugb2YgdGhlIHJlY2lwZSBub3cgcHJvcGVybHkgY29tcGxldGUg4oCUIG5vdCBhIHNwaWNlIGluIGEgamFyIHRoaXMgdGltZSwgYnV0IGtub3dsZWRnZSBjYXJyaWVkIHF1aWV0bHkgaW4geW91ciBvd24gaGFuZHMgYW5kIHBhdGllbmNlLiBCcnVubyB3YWxrcyBiZXNpZGUgeW91LCB1bnVzdWFsbHkgc29sZW1uLgoKJ1RoYXQncyBldmVyeXRoaW5nLCB0aGVuLCcgaGUgc2F5cyBzb2Z0bHkuICdFdmVyeSBzcGljZS4gRXZlcnkgdGVjaG5pcXVlLiBOb3RoaW5nIGxlZnQgc3RhbmRpbmcgYmV0d2VlbiB5b3UgYW5kIGFjdHVhbGx5IGNvb2tpbmcgaXQsIHByb3Blcmx5LCBhdCBob21lLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSBmZWVsIHJlYWR5', 'next' => '8_end_ready'],
                ['text' => 'QWRtaXQgeW91IGZlZWwgc3RyYW5nZWx5IHVucmVhZHk=', 'next' => '8_end_unready'],
            ],
        ],
        '8_end_ready' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGZlZWwgcmVhZHksJyB5b3Ugc2F5LCB3YXRjaGluZyB0aGUgbGF2ZW5kZXIgaGlsbHMgc2V0dGxlIGludG8gZXZlbmluZyBwdXJwbGUgYXJvdW5kIHlvdS4gJ0V2ZXJ5IHBpZWNlIGdhdGhlcmVkLCBldmVyeSBsZXNzb24gYWN0dWFsbHkgbGVhcm5lZC4gRmVlbHMgbGlrZSB0aGUgcmVjaXBlJ3MgZmluYWxseSB3aG9sZSwgYW5kIHNvIGFtIEksIHNvbWVob3csIGFsb25nc2lkZSBpdC4nCgpCcnVubyBzbWlsZXMsIHNvbWV0aGluZyB3YXJtIGFuZCBzbGlnaHRseSB3aXN0ZnVsIGluIGl0LiAnR29vZC4gVGhhdCdzIGV4YWN0bHkgaG93IGl0IHNob3VsZCBmZWVsLCB0aGlzIGNsb3NlIHRvIHRoZSBlbmQuIFNpY2lseSBuZXh0LCB0aGVuIGhvbWUuJw==',
            'ending' => true,
        ],
        '8_end_unready' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGZlZWwgc3RyYW5nZWx5IHVucmVhZHksJyB5b3UgYWRtaXQsIHN1cnByaXNpbmcgeW91cnNlbGYgd2l0aCB0aGUgc3VkZGVuIHdlaWdodCBvZiBpdC4gJ0V2ZXJ5dGhpbmcncyBnYXRoZXJlZC4gTm90aGluZydzIGFjdHVhbGx5IHN0b3BwaW5nIG1lIGFueW1vcmUuIFRoYXQgc2hvdWxkIGZlZWwgbGlrZSByZWxpZWYsIGFuZCBpbnN0ZWFkIGl0IGp1c3QgZmVlbHMgZW5vcm1vdXMuJwoKQnJ1bm8gZG9lc24ndCBydXNoIHlvdSBwYXN0IHRoZSBmZWVsaW5nLiAnVGhhdCdzIGZhaXIsIGFuZCBwcmV0dHkgbm9ybWFsLCBJJ2QgZ3Vlc3MuIFNpY2lseSdzIG5leHQg4oCUIHF1aWV0LCB1bmh1cnJpZWQuIE1pZ2h0IGJlIGV4YWN0bHkgdGhlIHNwYWNlIHlvdSBuZWVkIGJlZm9yZSB0aGUgbGFzdCBzdGVwIGhvbWUuJyBUaGUgbGF2ZW5kZXIgZmllbGRzIHN0cmV0Y2ggb24sIGZyYWdyYW50IGFuZCB1bmJvdGhlcmVkLCBpbnRvIHRoZSBnYXRoZXJpbmcgZHVzay4=',
            'ending' => true,
        ],
    ],
];
