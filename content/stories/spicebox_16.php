<?php
return [
    'id'    => 16,
    'title' => 'Cousins It Never Knew About',
    'color' => '#6A4A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TmV3IE9ybGVhbnMncyBGcmVuY2ggUXVhcnRlciBwcmVzc2VzIGNsb3NlIGFuZCBodW1pZCBhcm91bmQgeW91LCB3cm91Z2h0LWlyb24gYmFsY29uaWVzIGRyaXBwaW5nIGZlcm5zIG92ZXJoZWFkLCB0aGUgd2hvbGUgY2l0eSBjYXJyeWluZyB0aGUgc3BlY2lmaWMsIGxheWVyZWQgc21lbGwgb2YgYSBjdWlzaW5lIGJ1aWx0IGZyb20gZ2VuZXJhdGlvbnMgb2YgcGVvcGxlIG1ha2luZyBkbyBicmlsbGlhbnRseSB3aXRoIHdoYXRldmVyIGNyb3NzZWQgdGhlaXIgcGF0aC4gQnJ1bm8ncyBiZWVuIHF1aWV0IHNpbmNlIGxhbmRpbmcsIG9kZGx5IG5lcnZvdXMgZm9yIHNvbWVvbmUgdXN1YWxseSBzbyBhdCBlYXNlLgoKVHdvIEZyZW5jaCBRdWFydGVyIHJvdXRlcyB0b3dhcmQgdGhlIGNvb2sncyBraXRjaGVuIHByZXNlbnQgdGhlbXNlbHZlczogYWxvbmcgdGhlIG1haW4gdG91cmlzdC1oZWF2eSBzdHJpcCwgb3IgdGhyb3VnaCBhIHF1aWV0ZXIgcmVzaWRlbnRpYWwgYmxvY2sganVzdCBiZWhpbmQgaXQu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbiB0b3VyaXN0IHN0cmlw', 'next' => '2_strip'],
                ['text' => 'Q3V0IHRocm91Z2ggdGhlIHF1aWV0IHJlc2lkZW50aWFsIGJsb2Nr', 'next' => '2_block'],
            ],
        ],
        '2_strip' => [
            'prose'  => 'VGhlIG1haW4gc3RyaXAgaXMgbG91ZCwgYnJpZ2h0LCB0aGljayB3aXRoIG11c2ljIHNwaWxsaW5nIGZyb20gZXZlcnkgb3BlbiBkb29yd2F5LCB0b3VyaXN0cyBhbmQgbG9jYWxzIG1vdmluZyBwYXN0IGVhY2ggb3RoZXIgaW4gYSBjdXJyZW50IHRoYXQgdGFrZXMgcmVhbCBlZmZvcnQgdG8gc3dpbSBhZ2FpbnN0LiBZb3UgcHVzaCB0aHJvdWdoIGl0IHN0ZWFkaWx5LCB0aGUgbm9pc2UgZ3JhZHVhbGx5IHRoaW5uaW5nIGFzIHlvdSBuZWFyIHRoZSBhZGRyZXNzIEJydW5vJ3MgaG9sZGluZy4KCllvdSByZWFjaCB0aGUga2l0Y2hlbiB3aXRoIHRoZSB3aG9sZSBRdWFydGVyJ3MgY2xhbW91ciBzdGlsbCByaW5naW5nIGZhaW50bHkgaW4geW91ciBlYXJzLg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgY29vaw==', 'next' => '3_shared'],
            ],
        ],
        '2_block' => [
            'prose'  => 'VGhlIHF1aWV0IHJlc2lkZW50aWFsIGJsb2NrIGJlaGluZCB0aGUgc3RyaXAgaXMgYSBkaWZmZXJlbnQgY2l0eSBlbnRpcmVseSwgc2hvdGd1biBob3VzZXMgcGFpbnRlZCBpbiBzb2Z0LCBmYWRlZCBjb2xvdXJzLCBzb21lb25lJ3MgcmFkaW8gZHJpZnRpbmcgZnJvbSBhbiBvcGVuIHdpbmRvdywgdGhlIG5vaXNlIG9mIHRoZSBtYWluIHN0cmlwIHJlZHVjZWQgdG8gYSBkaXN0YW50IGh1bS4gSXQncyBhIHNsb3dlciByb3V0ZSwgYnV0IGEgY29uc2lkZXJhYmx5IG1vcmUgaG9uZXN0IGxvb2sgYXQgdGhlIGFjdHVhbCBuZWlnaGJvdXJob29kLgoKWW91IHJlYWNoIHRoZSBraXRjaGVuIGhhdmluZyBwcm9wZXJseSBzZWVuIHRoZSBxdWlldGVyIGNpdHkgYmVoaW5kIHRoZSBwb3N0Y2FyZCB2ZXJzaW9uLg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgY29vaw==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGNvb2ssIGFuIG9sZGVyIENhanVuIHdvbWFuIGV2ZXJ5b25lIHNpbXBseSBjYWxscyBNaXNzIE9kYWxpZSwga2VlcHMgYSBqYXIgb2YgZmlsw6kgcG93ZGVyIOKAlCBncm91bmQgc2Fzc2FmcmFzIGxlYXZlcywgc2hlIGV4cGxhaW5zLCB0aGUgdGhpY2tlbmVyIGhlciBvd24gZ3JhbmRtb3RoZXIgc3dvcmUgYnkgbG9uZyBiZWZvcmUgZ3VtYm8gZXZlciBoYWQgYSBmaXhlZCByZWNpcGUgYW55d2hlcmUuIFNoZSBzdHVkaWVzIHlvdSBhIGxvbmcgbW9tZW50IGFmdGVyIHlvdSBtZW50aW9uIElyaXMncyBuYW1lIGFuZCB0aGUgZGlzaCB5b3UncmUgY2hhc2luZy4KCidGdW5ueSB0aGluZywnIHNoZSBzYXlzIHNsb3dseS4gJ1lvdXIgZ3JhbmRtb3RoZXIncyBkaXNoIHNvdW5kcyBhbiBhd2Z1bCBsb3QgbGlrZSBteSBvd24gbW90aGVyJ3MsIGRlY2FkZXMgcmVtb3ZlZC4gRGlmZmVyZW50IHNwaWNlcyBhcnJpdmluZywgc2FtZSBoYW5kcyBhZGFwdGluZy4gSGFwcGVucyBtb3JlIHRoYW4gcGVvcGxlIHRoaW5rLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhlciB0byBleHBsYWluIGZ1cnRoZXI=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'TWlzcyBPZGFsaWUgb2ZmZXJzIHR3byB3YXlzIHRvIGhlYXIgdGhlIHJlc3QgcHJvcGVybHk6IHNpdCBhdCBoZXIga2l0Y2hlbiB0YWJsZSB3aGlsZSBzaGUgdGVsbHMgdGhlIHdob2xlIGZhbWlseSBzdG9yeSBiZWhpbmQgdGhlIGRpc2gncyBzdHJhbmdlLCBkaXN0YW50IGVjaG8sIG9yIHN0YW5kIGF0IHRoZSBzdG92ZSB3aXRoIGhlciBhbmQgbGVhcm4gdGhlIGZpbMOpJ3MgYWN0dWFsIHVzZSBmaXJzdGhhbmQsIGxldHRpbmcgdGhlIHN0b3J5IGNvbWUgb3V0IHNpZGV3YXlzIHdoaWxlIHlvdXIgaGFuZHMgc3RheSBidXN5LgoKJ0VpdGhlciBnZXRzIHlvdSB0aGVyZSwnIHNoZSBzYXlzLiAnU2l0dGluZyBhbmQgbGlzdGVuaW5nLCBvciB3b3JraW5nIGFuZCBsaXN0ZW5pbmcuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'U2l0IGFuZCBoZWFyIHRoZSB3aG9sZSBzdG9yeQ==', 'next' => '5_sit'],
                ['text' => 'V29yayB0aGUgc3RvdmUgYW5kIGxpc3RlbiBzaWRld2F5cw==', 'next' => '5_stove'],
            ],
        ],
        '5_sit' => [
            'prose'  => 'U2l0dGluZyBhdCBoZXIga2l0Y2hlbiB0YWJsZSwgeW91IGhlYXIgdGhlIHdob2xlIHVuaHVycmllZCBzdG9yeSDigJQgaG93IGRpc2hlcyB0cmF2ZWwgYW5kIG11dGF0ZSBhbmQgcmVzdXJmYWNlIGFuIG9jZWFuIGF3YXkgd2VhcmluZyBkaWZmZXJlbnQgbmFtZXMsIGNhcnJpZWQgYnkgcGVvcGxlIHdobyBuZXZlciBtZXQgYnV0IHNvbWVob3cgYXJyaXZlZCBhdCBzdHJpa2luZ2x5IHNpbWlsYXIgYW5zd2VycyB0byB0aGUgc2FtZSBodW5ncnkgcXVlc3Rpb24uIEl0J3MgYSBsb25nZXIgdGVsbGluZywgcmljaCB3aXRoIGRpZ3Jlc3Npb25zLgoKQnkgdGhlIGVuZCwgdGhlIGNvaW5jaWRlbmNlIGJldHdlZW4gaGVyIG1vdGhlcidzIGRpc2ggYW5kIElyaXMncyBmZWVscyBsZXNzIGxpa2UgY29pbmNpZGVuY2UgYW5kIG1vcmUgbGlrZSBzb21ldGhpbmcgYWxtb3N0IGluZXZpdGFibGUu',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUgZmlsw6kgcG93ZGVy', 'next' => '6_shared'],
            ],
        ],
        '5_stove' => [
            'prose'  => 'V29ya2luZyB0aGUgc3RvdmUgYWxvbmdzaWRlIGhlciwgeW91IGxlYXJuIHRoZSBmaWzDqSdzIGFjdHVhbCwgcHJhY3RpY2FsIHVzZSDigJQgc3RpcnJlZCBpbiBvZmYgdGhlIGhlYXQsIG5ldmVyIGJvaWxlZCwgb3IgaXQgdHVybnMgdGhpbiBhbmQgc3RyaW5neSBpbnN0ZWFkIG9mIHByb3Blcmx5IHRoaWNrZW5pbmcgdGhlIHBvdC4gVGhlIHN0b3J5IGNvbWVzIG91dCBpbiBwaWVjZXMgYmV0d2VlbiBpbnN0cnVjdGlvbnMsIG5vIGxlc3MgcmljaCBmb3IgYmVpbmcgaW50ZXJydXB0ZWQuCgpCeSB0aGUgZW5kLCB5b3VyIGhhbmRzIGtub3cgdGhlIHRlY2huaXF1ZSBhbmQgdGhlIHRhbGUgaW4gZXF1YWwsIHRhbmdsZWQgbWVhc3VyZS4=',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUgZmlsw6kgcG93ZGVy', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'TWlzcyBPZGFsaWUgcGFja2FnZXMgYSBnZW5lcm91cyBqYXIgb2YgZmlsw6kgcG93ZGVyLCBzdGlsbCBmYWludGx5IGdyZWVuLWdyZXkgYW5kIGZyYWdyYW50LiAnVGVsbCB5b3VyIGdyYW5kbW90aGVyJ3MgZGlzaCBpdCdzIGdvdCBjb3VzaW5zIGl0IG5ldmVyIGtuZXcgYWJvdXQsJyBzaGUgc2F5cywgaGFsZi1qb2tpbmcsIGhhbGYgbm90LiAnRm9vZCBmaW5kcyBpdHMgd2F5IHRvIHRoZSBzYW1lIHRydXRocywgd2hlcmV2ZXIgaXQgc3RhcnRzLiBBbHdheXMgaGFzLicKClNoZSB3YXZlcyBvZmYgYW55IHBheW1lbnQuICdDYWxsIGl0IGEgZmFtaWx5IGZhdm91ci4gRmVlbHMgbGlrZSBvbmUsIHNvbWVob3csIGhvd2V2ZXIgZmFyIHJlbW92ZWQuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHN0ZXAgYmFjayBvdXQgaW50byB0aGUgUXVhcnRlcidzIHRoaWNrLCBodW1pZCBldmVuaW5nIHdpdGggdGhlIGZpbMOpIHBvd2RlciBzZWN1cmUgaW4gaXRzIGphciwgYnJhc3MgYmFuZCBtdXNpYyBkcmlmdGluZyBmcm9tIHNvbWV3aGVyZSBjbG9zZSwgQnJ1bm8gdW51c3VhbGx5IHRob3VnaHRmdWwgYmVzaWRlIHlvdSB0aGUgd2hvbGUgd2FsayBiYWNrIHRvd2FyZCB0aGUgaG90ZWwuCgonU3RyYW5nZSwgaXNuJ3QgaXQsJyBoZSBmaW5hbGx5IHNheXMuICdHcmFuZG1vdGhlcidzIG5vdCB0aGUgb25seSBvbmUgd2hvIGV2ZXIgdGhpY2tlbmVkIGEgcG90IHRoaXMgd2F5LiBGZWVscyBsaWtlIGl0IHNob3VsZCBtYWtlIHRoZSBkaXNoIGxlc3Mgc3BlY2lhbC4gRG9lc24ndCwgdGhvdWdoLiBOb3QgZXZlbiBhIGxpdHRsZS4n',
            'choices' => [
                ['text' => 'QWdyZWUgdGhhdCBpdCBtYWtlcyBpdCBmZWVsIG1vcmUgdW5pdmVyc2Fs', 'next' => '8_end_universal'],
                ['text' => 'U2F5IGl0IGp1c3QgbWFrZXMgeW91IG1pc3MgaGVyIG1vcmU=', 'next' => '8_end_miss'],
            ],
        ],
        '8_end_universal' => [
            'prose'  => 'J0kgYWdyZWUsIGhvbmVzdGx5IOKAlCBpdCBtYWtlcyBpdCBmZWVsIG1vcmUgdW5pdmVyc2FsLCBpZiBhbnl0aGluZywnIHlvdSBzYXksIHRoaW5raW5nIG9mIE1pc3MgT2RhbGllJ3MgbW90aGVyIGFuZCBJcmlzLCBvY2VhbnMgYXBhcnQsIGFycml2aW5nIGF0IHRoZSBzYW1lIGh1bmdyeSBhbnN3ZXIgaW5kZXBlbmRlbnRseS4gJ0xpa2Ugc2hlIHdhcyBwYXJ0IG9mIHNvbWV0aGluZyBiaWdnZXIgdGhhbiBqdXN0IGhlciBvd24ga2l0Y2hlbiwgd2l0aG91dCBldmVyIGtub3dpbmcgaXQuJwoKQnJ1bm8gbm9kcyBzbG93bHkuICdUaGF0J3MgcmF0aGVyIGJlYXV0aWZ1bCwgYWN0dWFsbHksIHB1dCB0aGF0IHdheS4gU2hlJ2QgaGF2ZSBsaWtlZCBoZWFyaW5nIGl0LCBJIHRoaW5rLic=',
            'ending' => true,
        ],
        '8_end_miss' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBqdXN0IG1ha2VzIG1lIG1pc3MgaGVyIG1vcmUsJyB5b3UgYWRtaXQsIHRocm9hdCB0aWdodGVuaW5nIHNsaWdodGx5IGF0IHRoZSB0aG91Z2h0IG9mIElyaXMgY29va2luZyBhbG9uZSwgbmV2ZXIga25vd2luZyBoZXIgZGlzaCBoYWQgY291c2lucyBzY2F0dGVyZWQgYWNyb3NzIHRoZSB3b3JsZC4gJ1dpc2ggSSBjb3VsZCd2ZSB0b2xkIGhlci4gV2lzaCBzaGUgY291bGQndmUgaGVhcmQgTWlzcyBPZGFsaWUncyB2ZXJzaW9uIG9mIGl0LicKCkJydW5vJ3MgaGFuZCBmaW5kcyB5b3VyIHNob3VsZGVyIGJyaWVmbHkuICdJIGtub3cuIFNvbWUgdGhpbmdzIHlvdSBjYW4gb25seSBwYXNzIGFsb25nIGFmdGVyLCBub3QgYmVmb3JlLiBEb2Vzbid0IG1ha2UgaXQgYW55IGxlc3Mgd29ydGggY2FycnlpbmcgZm9yd2FyZC4n',
            'ending' => true,
        ],
    ],
];
