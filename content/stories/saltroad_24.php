<?php
return [
    'id'    => 24,
    'title' => 'Generations Late, But Properly',
    'color' => '#D4A030',

    'pages' => [
        '1_start' => [
            'prose'  => 'U2FtYXJrYW5kIHJpc2VzIGV4YWN0bHkgYXMgeW91IGxlZnQgaXQgbW9udGhzIGFnbywgdGhlIHJ1aW5lZCBIb3VzZSBvZiBZc29sZGUgc3RpbGwgc3RhbmRpbmcgZW1wdHkgYXQgdGhlIGVkZ2Ugb2YgdGhlIG9sZCB0cmFkaW5nIHF1YXJ0ZXIsIHRob3VnaCBpdCBmZWVscyBlbnRpcmVseSBkaWZmZXJlbnQgd2Fsa2luZyBiYWNrIGludG8gaXQgbm93IHRoYW4gaXQgZGlkIHRoZSBkYXkgeW91IGZpcnN0IGZvdW5kIHRoZSBicm9rZW4gbGV0dGVyIGFuZCB0aGUgc2luZ2xlIHdhaXRpbmcgd2VkZ2UuIFRvbWFzLCBCZXJrYW50LCBhbmQgTnVyIGFyZSBhbGwgaGVyZSB3aXRoIHlvdSwgdGhlIHdob2xlIHN0cmFuZ2UsIGFjY2lkZW50YWwgZm91bmQtZmFtaWx5IHRoaXMgam91cm5leSBzb21laG93IGFzc2VtYmxlZC4KCllvdSBkb24ndCBsaW5nZXIgbG9uZyBpbiB0aGUgaG91c2UgaXRzZWxmLiBXaGF0IG1hdHRlcnMgbm93IHdhaXRzIHNvbWV3aGVyZSBlbHNlIOKAlCB0aGUgY2FyYXZhbnNlcmFpLCBzdGlsbCBzdGFuZGluZywgc3RpbGwgcnVuIGJ5IHRoZSBzYW1lIGZhbWlseSBsaW5lIHRoYXQgdG9vayBpbiBhIHBlbm5pbGVzcywgZGVzcGVyYXRlIHlvdW5nIHdvbWFuIGdlbmVyYXRpb25zIGFnbyBhbmQgYXNrZWQgbm90aGluZyBpbiByZXR1cm4gYnV0IHNpbXBsZSBkZWNlbmN5Lg==',
            'choices' => [
                ['text' => 'V2FsayB0byB0aGUgY2FyYXZhbnNlcmFp', 'next' => '2_shared'],
            ],
        ],
        '2_shared' => [
            'prose'  => 'VGhlIGNhcmF2YW5zZXJhaSBpcyBleGFjdGx5IGFzIEVsZW5hIGluIFZlbmljZSBkZXNjcmliZWQgaXQg4oCUIG9sZCwgd2VsbC1rZXB0LCBzdGlsbCBnZW51aW5lbHkgb3BlcmF0aW5nLCB0cmF2ZWxsZXJzIGNvbWluZyBhbmQgZ29pbmcgdGhyb3VnaCB0aGUgc2FtZSBnYXRlIFlzb2xkZSBoZXJzZWxmIG9uY2Ugc3R1bWJsZWQgdGhyb3VnaCB3aXRoIG5vdGhpbmcgdG8gaGVyIG5hbWUuIFRoZSBjdXJyZW50IGtlZXBlciwgYW4gZWxkZXJseSB3b21hbiBuYW1lZCBTYW5hbSwgZ3JlZXRzIHlvdSB3aXRoIHRoZSBzYW1lIHVuaHVycmllZCwgcHJhY3Rpc2VkIHdhcm10aCBoZXIgZmFtaWx5J3MgY2xlYXJseSBvZmZlcmVkIGZvciBnZW5lcmF0aW9ucy4KCidUcmF2ZWxsZXJzIGFyZSBhbHdheXMgd2VsY29tZSBoZXJlLCcgc2hlIHNheXMuICdIYXMgYmVlbiB0aGUgcnVsZSBhIHZlcnkgbG9uZyB0aW1lLiBXaGF0IGNhbiB3ZSBkbyBmb3IgeW91Pyc=',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgdGhlIHdob2xlIHN0b3J5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WW91IHRlbGwgaGVyIGV2ZXJ5dGhpbmcg4oCUIHRoZSBydWluZWQgaG91c2UsIHRoZSBicm9rZW4gbGV0dGVyLCBuaW5lIGNpdGllcyBhbmQgbmluZSBkZWJ0cyBhbmQgc3RvcmllcywgYSByaXZhbHJ5IHRoYXQgYmVjYW1lIGEgZnJpZW5kc2hpcCwgYSBoYXdrIGZpbmFsbHksIHByb3Blcmx5IG5hbWVkLiBTYW5hbSBsaXN0ZW5zIHdpdGhvdXQgaW50ZXJydXB0aW5nLCBoZXIgY2FyZWZ1bCBjb21wb3N1cmUgc2hpZnRpbmcgc2xvd2x5IGludG8gc29tZXRoaW5nIGNsb3NlciB0byByZWFsLCBxdWlldCBhc3RvbmlzaG1lbnQgYXMgdGhlIHN0b3J5IHVuZm9sZHMuCgonTXkgZmFtaWx5J3MgdG9sZCB0aGF0IHN0b3J5IGZvciBnZW5lcmF0aW9ucywnIHNoZSBzYXlzIGZpbmFsbHkuICdUaGUgZGVzcGVyYXRlIHN0cmFuZ2VyIHdlIHRvb2sgaW4gd2hvIGJlY2FtZSBzb21lb25lIHJlbWFya2FibGUuIFdlIG5ldmVyIGtuZXcgd2hhdCBiZWNhbWUgb2YgaGVyIGFmdGVyd2FyZCwgb25seSB0aGF0IHNoZSBuZXZlciBmb3Jnb3QgdXMg4oCUIHNtYWxsIGdpZnRzIGFycml2ZWQgZm9yIHllYXJzLCB0aG91Z2ggd2UgbmV2ZXIgdW5kZXJzdG9vZCB3aHkgdW50aWwgbm93LicgU2hlIHN0dWRpZXMgdGhlIGNvbXBsZXRlZCBzZWFsIGluIHlvdXIgaGFuZHMuICdZb3UndmUgYWN0dWFsbHkgY29tZSB0byBjbG9zZSBpdC4gQWZ0ZXIgYWxsIHRoaXMgdGltZS4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'UHJlc3MgdGhlIHNlYWwgaW50byB0aGUgbGV0dGVy', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IHVuZm9sZCB0aGUgb3JpZ2luYWwgbGV0dGVyIG9mIGRlYnQsIHdheCBzZWFsIGJyb2tlbiBjbGVhbiBpbiBoYWxmIHNpbmNlIGJlZm9yZSB5b3Ugd2VyZSBib3JuLCBhbmQgcHJlc3MgdGhlIGNvbXBsZXRlZCBuaW5lLXBpZWNlIHNlYWwgaW50byBmcmVzaCB3YXggYWxvbmdzaWRlIGl0IOKAlCB0aGUgd2hvbGUgZGVzaWduIHJlbmRlcmVkIHBlcmZlY3RseSwgcHJvcGVybHksIGZvciB0aGUgZmlyc3QgdGltZSBpbiBsb25nZXIgdGhhbiBhbnlvbmUgYWxpdmUgaGFzIHdpdG5lc3NlZC4KCkl0J3MgYSBzdHJhbmdlIHRoaW5nLCB3YXRjaGluZyBhIGRlYnQgZ2VuZXJhdGlvbnMgb3ZlcmR1ZSBmaW5hbGx5LCBmb3JtYWxseSBjbG9zZSDigJQgbm90IGJlY2F1c2UgYW55b25lIGRlbWFuZGVkIGl0LCBidXQgYmVjYXVzZSBzb21lb25lLCBldmVudHVhbGx5LCBjYXJlZCBlbm91Z2ggdG8gYWN0dWFsbHkgZmluaXNoIGl0Lg==',
            'choices' => [
                ['text' => 'RXhwbGFpbiB3aGF0IGl0IGFjdHVhbGx5IG1lYW5z', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'J1NoZSBhbHdheXMgbWVhbnQgdG8gcmVwYXkgeW91IHByb3Blcmx5LCcgeW91IHRlbGwgU2FuYW0sICdub3QganVzdCByZW1lbWJlciB5b3UgZm9uZGx5IGZyb20gYSBkaXN0YW5jZS4gVGhpcyBpcyB0aGF0LiBMYXRlIOKAlCBnZW5lcmF0aW9ucyBsYXRlIOKAlCBidXQgcmVhbC4nIFlvdSBwcmVzcyB0aGUgd2F4IGltcHJlc3Npb24gZm9ybWFsbHkgYWdhaW5zdCB0aGUgbGV0dGVyLCBjbG9zaW5nLCBhdCBsYXN0LCB0aGUgYWNjb3VudCB0aGF0J3Mgc2F0IG9wZW4gc2luY2UgYmVmb3JlIHlvdXIgb3duIGdyYW5kcGFyZW50cyB3ZXJlIGJvcm4uCgpTYW5hbSdzIGV5ZXMgYXJlIHdldCBieSB0aGUgZW5kLiAnU2hlIHdhcyByaWdodCB0byB0cnVzdCB0aGF0IHNvbWVvbmUgZXZlbnR1YWxseSB3b3VsZCwnIHNoZSBzYXlzLiAnVGhhbmsgeW91LiBUcnVseS4gV2hhdGV2ZXIgZGVidCBzaGUgdGhvdWdodCBzaGUgb3dlZCB1cyDigJQgeW91J3ZlIHBhaWQgaXQgcHJvcGVybHksIGFuZCB0aGVuIHNvbWUsIGp1c3QgYnkgY2FyaW5nIGVub3VnaCB0byBjb21lLic=',
            'choices' => [
                ['text' => 'U2l0IHdpdGggd2hhdCdzIGp1c3QgaGFwcGVuZWQ=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VG9tYXMsIEJlcmthbnQsIGFuZCBOdXIgZ2F0aGVyIGNsb3NlIGFzIHRoZSB3YXggY29vbHMgYW5kIHRoZSBsZXR0ZXIncyBmaW5hbGx5LCBwcm9wZXJseSBjbG9zZWQsIGFuZCBmb3IgYSBsb25nIG1vbWVudCBub2JvZHkgc2F5cyBhbnl0aGluZyBhdCBhbGwg4oCUIG5pbmUgY2l0aWVzLCBuaW5lIG1vbnRocywgb25lIGJyb2tlbiBob3VzZSBhbmQgb25lIGRlYnQgdGhyZWUgZ2VuZXJhdGlvbnMgb3ZlcmR1ZSwgYWxsIG9mIGl0IGZvbGRpbmcgbm93IGludG8gdGhpcyBzaW5nbGUsIHF1aWV0LCBmaW5pc2hlZCBtb21lbnQuCgpCZXJrYW50IGZpbmFsbHkgYnJlYWtzIHRoZSBzaWxlbmNlLiAnWXNvbGRlIHdvdWxkIGJlIGdsYWQsJyBoZSBzYXlzIHNpbXBseS4gJ05vdCBiZWNhdXNlIHRoZSBkZWJ0J3MgY2xvc2VkLiBCZWNhdXNlIHNvbWVvbmUgZmluYWxseSB1bmRlcnN0b29kIHdoeSBpdCBtYXR0ZXJlZCB0aGF0IGl0IHNob3VsZCBiZS4n',
            'choices' => [
                ['text' => 'U3RheSBpbiBTYW1hcmthbmQgYSB3aGlsZSBsb25nZXI=', 'next' => '7_end_stay'],
                ['text' => 'QmVnaW4gdGhlIGpvdXJuZXkgaG9tZSBpbW1lZGlhdGVseQ==', 'next' => '7_end_home'],
            ],
        ],
        '7_end_stay' => [
            'prose'  => 'WW91IHN0YXkgaW4gU2FtYXJrYW5kIGEgd2hpbGUgbG9uZ2VyLCBsZXR0aW5nIHRoZSB3aG9sZSBqb3VybmV5IHByb3Blcmx5IHNldHRsZSBiZWZvcmUgZGVjaWRpbmcgd2hhdCBjb21lcyBuZXh0IOKAlCB0aGUgcnVpbmVkIEhvdXNlIG9mIFlzb2xkZSBiZWhpbmQgeW91IG5vdyBjbG9zZWQgb3V0IGhvbmVzdGx5IHJhdGhlciB0aGFuIHNpbXBseSBhYmFuZG9uZWQsIHRoZSBjYXJhdmFuc2VyYWkncyBvbGQgZGVidCBmaW5hbGx5LCBnZW5lcmF0aW9ucyBsYXRlLCBwcm9wZXJseSByZXBhaWQuCgpTYW5hbSBpbnNpc3RzIHlvdSBzdGF5IGFzIGhlciBndWVzdHMsIGFuZCB5b3UgZG8sIGZvciBzZXZlcmFsIHF1aWV0LCB1bmh1cnJpZWQgZGF5cywgdGhlIGZvdW5kLWZhbWlseSB0aGlzIHdob2xlIGltcHJvYmFibGUgam91cm5leSBhc3NlbWJsZWQgc2ltcGx5IGJlaW5nIHRvZ2V0aGVyLCBmb3Igb25jZSwgd2l0aCBub3doZXJlIHVyZ2VudCBsZWZ0IHRvIGJlLg==',
            'ending' => true,
        ],
        '7_end_home' => [
            'prose'  => 'WW91IGJlZ2luIHRoZSBqb3VybmV5IGhvbWUgYWxtb3N0IGltbWVkaWF0ZWx5LCB0aGUgZGVidCBjbG9zZWQsIHRoZSBzZWFsIGNvbXBsZXRlLCBub3RoaW5nIGxlZnQgbm93IGJ1dCB0aGUgcXVpZXRlciwgZ2VudGxlciB3b3JrIG9mIGFjdHVhbGx5IGxpdmluZyB3aXRoIGV2ZXJ5dGhpbmcgdGhpcyB3aG9sZSBqb3VybmV5IHRhdWdodCB5b3UuCgpUaGUgY2FyYXZhbiBzZXRzIG91dCBvbmUgbGFzdCB0aW1lLCBCZXJrYW50IGFuZCBOdXIgcmlkaW5nIGFsb25nc2lkZSwgVG9tYXMgbGVhZGluZyB0aGUgd2F5IHdpdGggdGhlIHNhbWUgdW5odXJyaWVkIGNvbXBldGVuY2UgaGUncyBicm91Z2h0IHRvIGV2ZXJ5IHNpbmdsZSBzdG9wIHNpbmNlIFNhbWFya2FuZCBmaXJzdCBzZW50IHlvdSBvdXQgdG8gZmluZCBuaW5lIHNjYXR0ZXJlZCBwaWVjZXMgb2YgYnJhc3MgYW5kIGEgZGVidCBub2JvZHkgZWxzZSBoYWQgcHJvcGVybHkgZmluaXNoZWQuIEFuIG9sZCBob3VzZSBzdGFuZHMgY2xvc2VkIGJlaGluZCB5b3Ugbm93LCBob25lc3RseSwgYXQgbGFzdCDigJQgYW5kIGFuIGVudGlyZWx5IG5ldyBjaGFwdGVyLCB1bndyaXR0ZW4sIHdhaXRzIGFoZWFkLg==',
            'ending' => true,
        ],
    ],
];
