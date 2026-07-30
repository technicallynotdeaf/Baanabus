<?php
return [
    'id'    => 12,
    'title' => 'Chose Her Over the Mountain',
    'color' => '#5A7A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEthcmFrb3JhbSByaXNlcyBpbiB0aGUgbW9zdCBzZXJpb3VzIG1vdW50YWlucyB5b3UndmUgZW5jb3VudGVyZWQgeWV0IOKAlCBnZW51aW5lbHkgZGFuZ2Vyb3VzLCBnZW51aW5lbHkgZW5vcm1vdXMsIEsyJ3Mgb3duIGRpc3RhbnQgc2lsaG91ZXR0ZSB2aXNpYmxlIG9uIGEgY2xlYXIgZGF5IGFzIGEgcmVtaW5kZXIgb2YgZXhhY3RseSBob3cgaGlnaCAnaGlnaCcgY2FuIGFjdHVhbGx5IGdldC4gR3JldGEncyBtYW5uZXIgaGVyZSBpcyBub3RpY2VhYmx5IG1vcmUgY2FyZWZ1bCB0aGFuIHVzdWFsLCBjaGVja2luZyBnZWFyIHR3aWNlIGJlZm9yZSB5b3UndmUgZXZlbiBwcm9wZXJseSBsZWZ0IHRoZSBDb250b3VyLgoKVHdvIHdheXMgdG8gZmluZCB0aGUgcG9ydGVyLWVsZGVyIHdobyBtaWdodCByZW1lbWJlciBBdWd1c3RpbidzIGZpbmFsIGV4cGVkaXRpb24gcHJlc2VudCB0aGVtc2VsdmVzOiB0aHJvdWdoIHRoZSBsb2NhbCB0cmVra2luZyBhZ2VuY3kncyBuZXR3b3JrIG9mIG9sZCBoYW5kcywgb3IgZGlyZWN0bHkgYXQgYSBwYXJ0aWN1bGFyIHRlYSBob3VzZSBwYXJ0d2F5IHVwIHRoZSBtYWluIHRyYWlsLCB3aGVyZSwgc29tZW9uZSBtZW50aW9ucywgYW4gb2xkIHBvcnRlciBzdGlsbCB0ZWxscyBzdG9yaWVzIHRvIGFueW9uZSB3aWxsaW5nIHRvIHByb3Blcmx5IGxpc3Rlbi4=',
            'choices' => [
                ['text' => 'QXNrIHRocm91Z2ggdGhlIHRyZWtraW5nIGFnZW5jeQ==', 'next' => '2_agency'],
                ['text' => 'RmluZCB0aGUgdGVhIGhvdXNlIGRpcmVjdGx5', 'next' => '2_teahouse'],
            ],
        ],
        '2_agency' => [
            'prose'  => 'VGhlIGFnZW5jeSBvZmZpY2UgaXMgc21hbGwsIGVmZmljaWVudCwgcnVuIGJ5IGEgeW91bmdlciBnZW5lcmF0aW9uIHdobyBub25ldGhlbGVzcyB0cmVhdCB0aGVpciBvbGRlciBwb3J0ZXJzJyBrbm93bGVkZ2Ugd2l0aCByZWFsLCBldmlkZW50IHJlc3BlY3QuIE9uY2UgeW91ciBlcnJhbmQncyB1bmRlcnN0b29kLCBzb21lb25lIG1ha2VzIGEgY2FsbCwgYW5kIHdpdGhpbiB0aGUgaG91ciB5b3UncmUgcG9pbnRlZCB0b3dhcmQgYSBzcGVjaWZpYyB0ZWEgaG91c2UgYW5kIGEgc3BlY2lmaWMgbmFtZSDigJQgS2FyaW0sIG9uZSBvZiB0aGUgbGFzdCBsaXZpbmcgcG9ydGVycyBmcm9tIHRoYXQgd2hvbGUgZXJhIG9mIGV4cGVkaXRpb25zLgoKJ0hlJ2xsIHRhbGssJyB0aGUgYWdlbmN5IG1hbmFnZXIgc2F5cy4gJ0lmIGhlIHRydXN0cyB5b3UncmUgYWN0dWFsbHkgbGlzdGVuaW5nIHByb3Blcmx5LCBub3QganVzdCBjb2xsZWN0aW5nIGEgc3RvcnkuJw==',
            'choices' => [
                ['text' => 'RmluZCBLYXJpbQ==', 'next' => '3_shared'],
            ],
        ],
        '2_teahouse' => [
            'prose'  => 'VGhlIHRlYSBob3VzZSBpcyBleGFjdGx5IHdoZXJlIHRoZSBydW1vdXIgcGxhY2VkIGl0LCBhIGxvdyBzdG9uZSBidWlsZGluZyB0aGljayB3aXRoIHRoZSBzbWVsbCBvZiB3b29kc21va2UgYW5kIHllYXJzIG9mIHRyYXZlbGxlcnMnIHN0b3JpZXMuIEFuIG9sZCBtYW4gaW4gdGhlIGNvcm5lciwgd2F0Y2hpbmcgeW91ciBlbnRyYW5jZSB3aXRoIHJlYWwgYXR0ZW50aW9uIHJhdGhlciB0aGFuIHNpbXBsZSBjdXJpb3NpdHksIHR1cm5zIG91dCB0byBiZSBleGFjdGx5IHdobyB5b3UncmUgbG9va2luZyBmb3IgYmVmb3JlIHlvdSd2ZSBldmVuIHByb3Blcmx5IGludHJvZHVjZWQgeW91cnNlbGYuCgonQXVndXN0aW4ncywnIEthcmltIHNheXMsIG5vdCBhIHF1ZXN0aW9uLCBzdHVkeWluZyB5b3VyIGZhY2UgdGhlIHdheSBldmVyeW9uZSBvbiB0aGlzIHdob2xlIGpvdXJuZXkgc2VlbXMgdG8uICdJIHdvbmRlcmVkIGlmIGFueW9uZSB3b3VsZCBldmVyIGNvbWUgYXNraW5nLic=',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGUga25vd3M=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'S2FyaW0gd2FzIG9uIHRoZSBmaW5hbCBleHBlZGl0aW9uIGhpbXNlbGYsIG9uZSBvZiB0aGUgbGFzdCBwZW9wbGUgYWxpdmUgd2hvIGFjdHVhbGx5IHdpdG5lc3NlZCB3aGF0IGhhcHBlbmVkLiBCdXQgaGUgZG9lc24ndCBvZmZlciB0aGUgc3RvcnkgZnJlZWx5LiAnWW91ciBmYW1pbHkgdGVsbHMgaXQgb25lIHdheSwgSSBleHBlY3QsJyBoZSBzYXlzLiAnTWFuIHRyaWVkLCBmYWlsZWQsIGNhbWUgaG9tZS4gU2ltcGxlIHN0b3J5LiBDb21mb3J0YWJsZSBzdG9yeS4nIEhlIHN0dWRpZXMgeW91IGNhcmVmdWxseS4gJ0kgd29uJ3QgY29ycmVjdCBhIGNvbWZvcnRhYmxlIHN0b3J5IGZvciBzb21lb25lIHdobyBqdXN0IHdhbnRzIGl0IGNvbmZpcm1lZCBpbnN0ZWFkLiBQcm92ZSB0byBtZSB5b3UgYWN0dWFsbHkgd2FudCB0aGUgdHJ1dGgsIHdoYXRldmVyIHNoYXBlIGl0IHR1cm5zIG91dCB0byBoYXZlLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'UHJvdmUgaXQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUgYXJlIHR3byBob25lc3Qgd2F5cyB0byBwcm92ZSB5b3UgYWN0dWFsbHkgd2FudCB0cnV0aCBvdmVyIGNvbWZvcnQsIGl0IHR1cm5zIG91dDogYWRtaXQsIHBsYWlubHksIHNvbWUgZG91YnQgb3IgZmVhciBvZiB5b3VyIG93biBhYm91dCB0aGlzIHdob2xlIGpvdXJuZXkg4oCUIHNvbWV0aGluZyByZWFsLCBub3QgcGVyZm9ybWVkIOKAlCBvciBjb3JyZWN0IEthcmltIGhpbXNlbGYsIGdlbnRseSwgd2hlbiBoZSB0ZXN0cyB5b3UgYnkgc3RhdGluZyBzb21ldGhpbmcgYWJvdXQgeW91ciBvd24gbW90aXZlcyB0aGF0IGlzbid0IHF1aXRlIGFjY3VyYXRlLCByYXRoZXIgdGhhbiBzaW1wbHkgbGV0dGluZyB0aGUgZmxhdHRlcmluZyBtaXNyZWFkaW5nIHN0YW5kLg==',
            'choices' => [
                ['text' => 'QWRtaXQgYSByZWFsIGRvdWJ0IGFib3V0IHRoZSBqb3VybmV5', 'next' => '5_doubt'],
                ['text' => 'Q29ycmVjdCBoaXMgbWlzdGFrZW4gYXNzdW1wdGlvbiBhYm91dCB5b3U=', 'next' => '5_correct'],
            ],
        ],
        '5_doubt' => [
            'prose'  => 'WW91IGFkbWl0IGl0LCBwbGFpbmx5LCBzdXJwcmlzaW5nIHlvdXJzZWxmIGEgbGl0dGxlIHdpdGggaG93IGVhc2lseSBpdCBjb21lcyBvbmNlIHlvdSBhY3R1YWxseSBzdGFydDogdGhhdCBzb21lIGRheXMgeW91J3JlIG5vdCBzdXJlIHlvdSdyZSBkb2luZyB0aGlzIHRvIGZpbmlzaCBBdWd1c3RpbidzIHdvcmsgc28gbXVjaCBhcyB0byBhdm9pZCBzaXR0aW5nIHN0aWxsIHdpdGggeW91ciBvd24gZ3JpZWYgbG9uZyBlbm91Z2ggdG8gcHJvcGVybHkgZmVlbCBpdC4KCkthcmltIGxpc3RlbnMgd2l0aG91dCBqdWRnbWVudCwgbm9kZGluZyBzbG93bHkuICdUaGF0J3MgYW4gaG9uZXN0IGFuc3dlci4gTW9zdCBwZW9wbGUgZ2l2ZSBtZSBhIG5vYmxlciBvbmUuJw==',
            'choices' => [
                ['text' => 'U2VlIGlmIGl0IHdhcyBlbm91Z2g=', 'next' => '6_shared'],
            ],
        ],
        '5_correct' => [
            'prose'  => 'S2FyaW0gdGVzdHMgeW91IGRlbGliZXJhdGVseSwgc3VnZ2VzdGluZyB5b3UncmUgY2xlYXJseSBoZXJlIGZvciBnbG9yeSwgdG8gZmluaXNoIGEgZmFtb3VzIG1hbidzIGZhbW91cyB1bmZpbmlzaGVkIHdvcmsgYW5kIGNsYWltIHNvbWUgcmVmbGVjdGVkIGNyZWRpdCBmb3IgaXQuIFlvdSBjb3JyZWN0IGhpbSwgcGxhaW5seSwgdGhvdWdoIGl0IGNvc3RzIHNvbWV0aGluZyB0byBzYXkgb3V0IGxvdWQ6IHRoYXQgdGhlcmUncyBubyBnbG9yeSBpbiBhbnkgb2YgdGhpcywgb25seSBhIHN0dWJib3JuLCB1bmNlcnRhaW4gbmVlZCB0byBjbG9zZSBzb21ldGhpbmcgdGhhdCdzIGJlZW4gbGVmdCBvcGVuIHRvbyBsb25nLgoKS2FyaW0gbGlzdGVucyB3aXRob3V0IGp1ZGdtZW50LCBub2RkaW5nIHNsb3dseS4gJ1RoYXQncyBhbiBob25lc3QgYW5zd2VyLiBNb3N0IHBlb3BsZSBsZXQgdGhlIGZsYXR0ZXJpbmcgdmVyc2lvbiBzdGFuZC4n',
            'choices' => [
                ['text' => 'U2VlIGlmIGl0IHdhcyBlbm91Z2g=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J0FsbCByaWdodCwnIEthcmltIHNheXMuICdIZXJlIGlzIHdoYXQgYWN0dWFsbHkgaGFwcGVuZWQsIG5vdCB0aGUgY29tZm9ydGFibGUgdmVyc2lvbi4nIFRoZSBleHBlZGl0aW9uIHdhc24ndCBkZWZlYXRlZCBieSB3ZWF0aGVyIG9yIGJ5IGhpcyBvd24gcGh5c2ljYWwgbGltaXRzLCBhcyB0aGUgZmFtaWx5IGFsd2F5cyBhc3N1bWVkLiBBIHdvbWFuIHRyYXZlbGxlZCB3aXRoIGhpbSB0aGF0IHNlYXNvbiDigJQgTWFyZ3Vlcml0ZSwgYSBmZWxsb3cgc3VydmV5b3IsIHNoYXJwIGFuZCBjYXBhYmxlIGluIGhlciBvd24gcmlnaHQg4oCUIGFuZCBwYXJ0d2F5IHVwLCB3aXRoIHRoZSBzdW1taXQgZ2VudWluZWx5IHdpdGhpbiByZWFjaCwgc2hlIHdhcyBodXJ0IGJhZGx5IGVub3VnaCB0aGF0IGNvbnRpbnVpbmcgbWVhbnQgbGVhdmluZyBoZXIgYmVoaW5kIHdpdGggdGhlIHN1cHBvcnQgdGVhbSB3aGlsZSBoZSBwdXNoZWQgb24gYWxvbmUuCgonSGUgdHVybmVkIGJhY2ssJyBLYXJpbSBzYXlzLiAnQ2hvc2UgaGVyIG92ZXIgdGhlIG1vdW50YWluLCB3aXRob3V0IGEgc2Vjb25kJ3MgcmVhbCBoZXNpdGF0aW9uLCBmYXIgYXMgSSBjb3VsZCBzZWUuIE5ldmVyIHN1cnZleWVkIHNlcmlvdXNseSBhZ2FpbiBhZnRlciB0aGF0IHNlYXNvbi4gU29tZSBtZW4gd291bGQgY2FsbCB0aGF0IGZhaWx1cmUuIEkndmUgYWx3YXlzIGNhbGxlZCBpdCB0aGUgb3Bwb3NpdGUuJw==',
            'choices' => [
                ['text' => 'U2l0IHdpdGggd2hhdCB0aGF0IG1lYW5z', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHNpdCB3aXRoIGl0IGEgbG9uZyB3aGlsZSwgdGhlIGZhbWlseSdzIGNvbWZvcnRhYmxlIG9sZCBzdG9yeSBxdWlldGx5LCBwZXJtYW5lbnRseSByZXdyaXR0ZW4g4oCUIG5vdCBhIG1hbiB3aG8gZmFpbGVkIHRvIGZpbmlzaCBzb21ldGhpbmcsIGJ1dCBhIG1hbiB3aG8gY2hvc2UsIHdpdGhvdXQgaGVzaXRhdGlvbiwgdGhlIHBlcnNvbiBpbiBmcm9udCBvZiBoaW0gb3ZlciB0aGUgYWNoaWV2ZW1lbnQgd2FpdGluZyBmdXJ0aGVyIHVwIHRoZSBtb3VudGFpbi4gSXQgcmVmcmFtZXMgdGhlIHdob2xlIHVuZmluaXNoZWQgY2hhcnQgZW50aXJlbHkuCgpHcmV0YSwgdG9sZCB0aGUgc3RvcnkgbGF0ZXIsIGdvZXMgdmVyeSBxdWlldC4gJ1RoYXQncyBub3Qgbm90aGluZywnIHNoZSBzYXlzIGV2ZW50dWFsbHkuICdUaGF0J3Mgbm90IG5vdGhpbmcgYXQgYWxsLic=',
            'choices' => [
                ['text' => 'QXNrIEthcmltIHdoYXQgYmVjYW1lIG9mIE1hcmd1ZXJpdGUgYWZ0ZXIgdGhhdA==', 'next' => '8_end_ask'],
                ['text' => 'TGV0IHRoYXQgcGFydGljdWxhciBxdWVzdGlvbiB3YWl0IGZvciBsYXRlcg==', 'next' => '8_end_wait'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzaywgYmVmb3JlIHlvdSBsZWF2ZSwgd2hhdCBiZWNhbWUgb2YgTWFyZ3Vlcml0ZSBhZnRlcndhcmQuIEthcmltJ3MgZmFjZSBkb2VzIHNvbWV0aGluZyBjb21wbGljYXRlZC4gJ1NoZSByZWNvdmVyZWQuIFdlbnQgb24gc3VydmV5aW5nIGVsc2V3aGVyZSwgSSBiZWxpZXZlLCB3aXRob3V0IGhpbSDigJQgd2hhdGV2ZXIgaGFwcGVuZWQgYmV0d2VlbiB0aGVtIGFmdGVyIHRoYXQgc2Vhc29uLCBpdCB3YXNuJ3QgYSBzdG9yeSBJIHdhcyBldmVyIHRvbGQgdGhlIGVuZGluZyBvZi4gU29tZSB0aGluZ3MgZXZlbiBvbGQgcG9ydGVycyBkb24ndCBnZXQgdG8ga25vdy4nCgpJdCdzIG5vdCBhIGZ1bGwgYW5zd2VyLiBCdXQgaXQncyBhIHJlYWwgb25lLCBhbmQgaXQgYWRkcyBhbm90aGVyIHBpZWNlIHRvIGEgcGljdHVyZSB0aGF0J3MgZmluYWxseSwgc2xvd2x5LCBzdGFydGluZyB0byBtYWtlIGVtb3Rpb25hbCBzZW5zZS4=',
            'ending' => true,
        ],
        '8_end_wait' => [
            'prose'  => 'WW91IGxldCB0aGF0IHBhcnRpY3VsYXIgcXVlc3Rpb24gd2FpdCwgZGVjaWRpbmcgdGhlIHNoYXBlIG9mIHRoZSBzdG9yeSB5b3UndmUganVzdCBiZWVuIGdpdmVuIGlzIGVub3VnaCB0byBjYXJyeSBmb3Igbm93LCB3aXRob3V0IGltbWVkaWF0ZWx5IHJlYWNoaW5nIGZvciB0aGUgbmV4dCB0aHJlYWQgdG8gcHVsbC4KClRoZSBDb250b3VyIGxpZnRzIG9mZiB0aGUgS2FyYWtvcmFtJ3MgZ2VudWluZWx5IGVub3Jtb3VzIHBlYWtzLCBLMidzIGRpc3RhbnQgc2lsaG91ZXR0ZSBjYXRjaGluZyB0aGUgbGFzdCBsaWdodCBvbiB0aGUgaG9yaXpvbiwgYW5kIHlvdSBmaW5kIHlvdXJzZWxmIHVuZGVyc3RhbmRpbmcgQXVndXN0aW4sIGZvciB0aGUgZmlyc3QgdGltZSB0aGlzIHdob2xlIGpvdXJuZXksIG5vdCBhcyBhIG15c3RlcnkgdG8gYmUgc29sdmVkIGJ1dCBhcyBhIHBlcnNvbiB3aG8gb25jZSBtYWRlIGFuIGVudGlyZWx5IHVuZGVyc3RhbmRhYmxlLCBlbnRpcmVseSBodW1hbiBjaG9pY2Uu',
            'ending' => true,
        ],
    ],
];
