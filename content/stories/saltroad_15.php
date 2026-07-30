<?php
return [
    'id'    => 15,
    'title' => 'Half Superstition, Half Paying Attention',
    'color' => '#3A6A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QWxleGFuZHJpYSBvcGVucyBvbnRvIHRoZSBNZWRpdGVycmFuZWFuIGluIGEgZ2VudWluZSBzcHJhd2wgb2YgaGFyYm91ciBhbmQgaGlzdG9yeSwgdGhlIHNpdGUgb2YgdGhlIGFuY2llbnQgUGhhcm9zIGxvbmcgc2luY2UgZmFsbGVuIGJ1dCBpdHMgbWVtb3J5IHN0aWxsIHNoYXBpbmcgaG93IHRoZSB3aG9sZSBjaXR5IHRoaW5rcyBhYm91dCBpdHMgcmVsYXRpb25zaGlwIHdpdGggdGhlIHNlYS4gVG9tYXMgcG9pbnRzIHRvd2FyZCBhIG1vZGVzdCBsaWdodGhvdXNlIGtlZXBlcidzIGhvdXNlIGF0IHRoZSBoYXJib3VyJ3MgZWRnZSwgY29uc2lkZXJhYmx5IGh1bWJsZXIgdGhhbiBpdHMgbGVnZW5kYXJ5IHByZWRlY2Vzc29yLgoKVHdvIGhhcmJvdXIgcm91dGVzIHRvd2FyZCB0aGUga2VlcGVyJ3MgaG91c2UgcHJlc2VudCB0aGVtc2VsdmVzOiBhbG9uZyB0aGUgbWFpbiBicmVha3dhdGVyLCBleHBvc2VkIGJ1dCBkaXJlY3QsIG9yIHRocm91Z2ggdGhlIGZpc2hpbmcgcXVhcnRlciwgc2hlbHRlcmVkIGJ1dCBjb25zaWRlcmFibHkgbW9yZSB3aW5kaW5nLg==',
            'choices' => [
                ['text' => 'V2FsayB0aGUgbWFpbiBicmVha3dhdGVy', 'next' => '2_breakwater'],
                ['text' => 'R28gdGhyb3VnaCB0aGUgZmlzaGluZyBxdWFydGVy', 'next' => '2_fishing'],
            ],
        ],
        '2_breakwater' => [
            'prose'  => 'VGhlIGJyZWFrd2F0ZXIgcm91dGUgaXMgZXhwb3NlZCwgc2VhIHNwcmF5IHJlYWNoaW5nIHlvdSBldmVuIGF0IGEgZGlzdGFuY2UsIHRoZSBtb2Rlcm4gbGlnaHRob3VzZSBncm93aW5nIHN0ZWFkaWx5IGxhcmdlciBhaGVhZCBhZ2FpbnN0IGEgZ2VudWluZWx5IGVub3Jtb3VzIHN0cmV0Y2ggb2Ygb3BlbiBNZWRpdGVycmFuZWFuIHdhdGVyLiBJdCdzIGEgYnJhY2luZywgaW52aWdvcmF0aW5nIHdhbGssIHNhbHQgYWlyIGNsZWFyaW5nIHlvdXIgaGVhZCBwcm9wZXJseSBmb3IgdGhlIGZpcnN0IHRpbWUgaW4gZGF5cy4KCllvdSBhcnJpdmUgYXQgdGhlIGtlZXBlcidzIGhvdXNlIHdpbmQtc2NvdXJlZCBhbmQgY29uc2lkZXJhYmx5IG1vcmUgYXdha2UgdGhhbiB5b3Ugd2VyZSBhbiBob3VyIGFnby4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGhvdXNl', 'next' => '3_shared'],
            ],
        ],
        '2_fishing' => [
            'prose'  => 'VGhlIGZpc2hpbmcgcXVhcnRlciByb3V0ZSB3aW5kcyBwYXN0IHdvcmtpbmcgYm9hdHMgYW5kIGRyeWluZyBuZXRzLCBmaXNoZXJtZW4gY2FsbGluZyBncmVldGluZ3MgdG8gVG9tYXMgd2l0aCByZWFsLCBldmlkZW50IGZhbWlsaWFyaXR5IGJ1aWx0IHVwIG92ZXIgeWVhcnMgb2YgcGFzc2luZyB0aHJvdWdoLiBJdCdzIGEgc2xvd2VyLCBtb3JlIHNoZWx0ZXJlZCBhcHByb2FjaCwgZ2l2aW5nIHlvdSByZWFsIHRpbWUgdG8gYWJzb3JiIHRoZSBoYXJib3VyJ3MgYWN0dWFsIHdvcmtpbmcgcmh5dGhtLgoKWW91IGFycml2ZSBhdCB0aGUga2VlcGVyJ3MgaG91c2UgY29uc2lkZXJhYmx5IGNhbG1lciwgYW5kIHdpdGggYSBnZW51aW5lIGFwcHJlY2lhdGlvbiBmb3IgdGhlIGhhcmJvdXIncyBldmVyeWRheSBsaWZlLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGhvdXNl', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGtlZXBlciwgYW4gb2xkZXIgd29tYW4gbmFtZWQgRmFyaWRhLCBncmVldHMgeW91IHdpdGggdGhlIHBhcnRpY3VsYXIgdW5odXJyaWVkIGNvbmZpZGVuY2Ugb2Ygc29tZW9uZSB3aG8ncyBzcGVudCBkZWNhZGVzIHdhdGNoaW5nIG92ZXIgc2hpcHMgaW4gdGhlIGRhcmsuIFNoZSBwcm9kdWNlcyB0aGUgd2VkZ2UgZnJvbSBhIHNoZWxmIGNyb3dkZWQgd2l0aCBvdGhlciBzbWFsbCwgY2FyZWZ1bCB0b2tlbnMg4oCUIHNoZWxscywgY29pbnMsIHdvcm4gcGllY2VzIG9mIHJvcGUsIGVhY2ggb25lIGNsZWFybHkgbWVhbmluZ2Z1bCB0byBzb21lb25lIG9uY2UuCgonWXNvbGRlIGdhdmUgaXQgdG8gbXkgZ3JhbmRtb3RoZXIsJyBzaGUgc2F5cywgJ2ZvciBnb29kIGx1Y2ssIHNoZSBzYWlkLCBzYW1lIGFzIGV2ZXJ5dGhpbmcgZWxzZSBvbiB0aGlzIHNoZWxmLiBCZWVuIGtlZXBpbmcgc2hpcHMgc2FmZSBldmVyIHNpbmNlLCBvciBzbyB3ZSd2ZSBhbHdheXMgdG9sZCBvdXJzZWx2ZXMuIFlvdSdsbCBuZWVkIHRvIGFjdHVhbGx5IGVhcm4gaXRzIHJlbGVhc2UsIHRob3VnaC4gQSBjaGFybSByZW1vdmVkIGNhcmVsZXNzbHkgaXMgYmFkIGx1Y2sgYWxsIGl0cyBvd24sIGFyb3VuZCBoZXJlLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgZWFybmluZyBpdCBsb29rcyBsaWtl', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RmFyaWRhIG9mZmVycyB0d28gd2F5czoga2VlcCB0aGUgbGlnaHRob3VzZSdzIHdhdGNoIHdpdGggaGVyIGZvciBhIGZ1bGwgbmlnaHQsIGxlYXJuaW5nIHRoZSBhY3R1YWwgcmh5dGhtIG9mIHRoZSB3b3JrIHRoYXQgY2hhcm0ncyBzdXBwb3NlZGx5IGJlZW4gcHJvdGVjdGluZyBhbGwgdGhlc2UgeWVhcnMsIG9yIGhlbHAgaGVyIHByb3Blcmx5IGNhdGFsb2d1ZSBhbmQgcHJlc2VydmUgdGhlIHdob2xlIHNoZWxmIG9mIHRva2VucywgbW9zdCBvZiB3aGljaCBoYXZlIG5ldmVyIGJlZW4gZ2l2ZW4gdGhlIGNhcmVmdWwgYXR0ZW50aW9uIHRoZXkgcHJvYmFibHkgZGVzZXJ2ZS4KCidFaXRoZXIgc2hvd3MgcmVhbCByZXNwZWN0IGZvciB3aGF0IHRoaXMgcGxhY2UgYWN0dWFsbHkgZG9lcywnIHNoZSBzYXlzLiAnUGljayB3aGljaGV2ZXIgc3VpdHMgeW91Lic=',
            'choices' => [
                ['text' => 'S2VlcCB0aGUgbmlnaHQgd2F0Y2ggd2l0aCBoZXI=', 'next' => '5_watch'],
                ['text' => 'SGVscCBjYXRhbG9ndWUgdGhlIHNoZWxmIG9mIHRva2Vucw==', 'next' => '5_catalogue'],
            ],
        ],
        '5_watch' => [
            'prose'  => 'S2VlcGluZyB0aGUgbmlnaHQgd2F0Y2ggbWVhbnMgcmVhbCwgZm9jdXNlZCBhdHRlbnRpb24gdGhyb3VnaCB0aGUgZGFyayBob3VycywgbGVhcm5pbmcgdG8gcmVhZCBkaXN0YW50IGxpZ2h0cyBhbmQgc2hpZnRpbmcgd2VhdGhlciB3aXRoIHRoZSBzYW1lIHBhdGllbnQgY2FyZSBGYXJpZGEncyBjbGVhcmx5IGJyb3VnaHQgdG8gdGhpcyB3b3JrIGZvciBkZWNhZGVzLiBJdCdzIHF1aWV0LCBkZW1hbmRpbmcsIGdlbnVpbmVseSBodW1ibGluZyB3b3JrLgoKQnkgZGF3biwgeW91IHVuZGVyc3RhbmQsIHZpc2NlcmFsbHksIGV4YWN0bHkgd2hhdCBraW5kIG9mIHZpZ2lsYW5jZSB0aGF0IGxpdHRsZSBzaGVsZiBvZiBjaGFybXMgaGFzIGFjdHVhbGx5IGJlZW4gc3RhbmRpbmcgaW4gZm9yLCBzeW1ib2xpY2FsbHksIGFsbCB0aGVzZSB5ZWFycy4=',
            'choices' => [
                ['text' => 'U2VlIGhlciBkZWNpc2lvbg==', 'next' => '6_shared'],
            ],
        ],
        '5_catalogue' => [
            'prose'  => 'Q2F0YWxvZ3VpbmcgdGhlIHNoZWxmIHByb3Blcmx5IG1lYW5zIGhhbmRsaW5nIGVhY2ggdG9rZW4gd2l0aCByZWFsIGNhcmUsIGxlYXJuaW5nIHdoYXQgc3RvcnkgeW91IGNhbiBhYm91dCBpdHMgb3JpZ2luLCByZWNvcmRpbmcgaXQgcHJvcGVybHkgZm9yIHRoZSBmaXJzdCB0aW1lIGluIHdoYXQncyBjbGVhcmx5IGJlZW4gZGVjYWRlcyBvZiBjYXN1YWwsIHVuY2F0YWxvZ3VlZCBrZWVwaW5nLgoKQnkgdGhlIGVuZCwgdGhlIHdob2xlIHNoZWxmIGZlZWxzIGxlc3MgbGlrZSBjbHV0dGVyIGFuZCBtb3JlIGxpa2UgYSBnZW51aW5lLCBwcm9wZXJseSBob25vdXJlZCBjb2xsZWN0aW9uIG9mIHNtYWxsLCBtZWFuaW5nZnVsIGhpc3Rvcmllcy4=',
            'choices' => [
                ['text' => 'U2VlIGhlciBkZWNpc2lvbg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RmFyaWRhLCBzYXRpc2ZpZWQgZWl0aGVyIHdheSwgZmluYWxseSB3b3JrcyB0aGUgd2VkZ2UgZnJlZSBmcm9tIGl0cyBwbGFjZSBvbiB0aGUgc2hlbGYgYW5kIHByZXNzZXMgaXQgaW50byB5b3VyIGhhbmRzLiAnVGhlcmUsJyBzaGUgc2F5cy4gJ1Byb3Blcmx5IHJlbGVhc2VkLCBub3QganVzdCB0YWtlbi4gSXQnbGwga2VlcCBkb2luZyBpdHMgd29yayB3aGVyZXZlciBpdCB0cmF2ZWxzIG5leHQsIHNhbWUgYXMgaXQncyBkb25lIGhlcmUuJwoKU2hlIHN0dWRpZXMgdGhlIGhhcmJvdXIgYSBtb21lbnQuICdMdWNrJ3MgYSBmdW5ueSB0aGluZy4gSGFsZiBzdXBlcnN0aXRpb24sIGhhbGYganVzdCBwYXlpbmcgcHJvcGVyIGF0dGVudGlvbiB0byB3aGF0IGFjdHVhbGx5IG5lZWRzIHdhdGNoaW5nLiBZb3UndmUgc2hvd24gbWUgeW91IHVuZGVyc3RhbmQgYm90aCBoYWx2ZXMgdG9uaWdodC4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIEFsZXhhbmRyaWEncyBoYXJib3VyIHNldHRsaW5nIGludG8gaXRzIG93biBwYXJ0aWN1bGFyIHJoeXRobSBiZWhpbmQgeW91LCB0aGUgbW9kZXJuIGxpZ2h0aG91c2UncyBiZWFtIHN3ZWVwaW5nIHN0ZWFkeSBhbmQgcGF0aWVudCBhY3Jvc3Mgd2F0ZXIgdGhhdCdzIGNhcnJpZWQgc2hpcHMgc2FmZWx5IGFuZCB1bnNhZmVseSBmb3IgYXMgbG9uZyBhcyBhbnlvbmUncyBrZXB0IHdhdGNoIG92ZXIgaXQuCgpUb21hcywgcXVpZXQgYW5kIHJlZmxlY3RpdmUsIGxvb2tzIGJhY2sgYXQgdGhlIGxpZ2h0IGEgd2hpbGUgYmVmb3JlIGZpbmFsbHkgc3BlYWtpbmcuICdGdW5ueSB0aGluZywgd2F0Y2hpbmcgb3ZlciBzb21ldGhpbmcgZm9yIG90aGVyIHBlb3BsZSdzIHNha2UuIERvZXNuJ3QgYWx3YXlzIGdldCBub3RpY2VkIHByb3Blcmx5LiBNYXR0ZXJzIGFueXdheS4n',
            'choices' => [
                ['text' => 'U2F5IHRoYXQncyB0cnVlIG9mIG1vc3Qgb2Ygd2hhdCB5b3UndmUgc2VlbiB0aGlzIGpvdXJuZXk=', 'next' => '8_end_true'],
                ['text' => 'QXNrIGlmIGhlIGV2ZXIgZmVlbHMgdW5ub3RpY2VkLCBkb2luZyB0aGlzIHdvcmsgaGltc2VsZg==', 'next' => '8_end_ask'],
            ],
        ],
        '8_end_true' => [
            'prose'  => 'J1RoYXQncyB0cnVlIG9mIG1vc3Qgb2Ygd2hhdCBJJ3ZlIHNlZW4gdGhpcyB3aG9sZSBqb3VybmV5LCBob25lc3RseSwnIHlvdSBzYXksIHRoaW5raW5nIG9mIEFtYW4ncyB0aHJlZSBnZW5lcmF0aW9ucywgUmFoaW1pJ3MgbGV0dGVycywgRmFyaWRhJ3Mgb3duIHF1aWV0IGRlY2FkZXMgb2Ygd2F0Y2hpbmcuICdBIGxvdCBvZiBjYXJlZnVsLCB1bmdsYW1vcm91cyBrZWVwaW5nLCBkb25lIHByb3Blcmx5LCB3aGV0aGVyIG9yIG5vdCBhbnlvbmUgZXZlciBwcm9wZXJseSB0aGFua3MgeW91IGZvciBpdC4nCgpUb21hcyBub2RzIHNsb3dseS4gJ1RoYXQncyByYXRoZXIgdGhlIHdob2xlIHNoYXBlIG9mIGEgbGlmZSB3ZWxsIHNwZW50LCBJIHRoaW5rLiBZc29sZGUgdW5kZXJzdG9vZCBpdC4gU28gZG9lcyBGYXJpZGEuIFNvLCBhcHBhcmVudGx5LCBhcmUgeW91IHN0YXJ0aW5nIHRvLic=',
            'ending' => true,
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzayBoaW0sIGdlbnRseSwgd2hldGhlciBoZSBldmVyIGZlZWxzIHVubm90aWNlZCBkb2luZyB0aGlzIHdvcmsgaGltc2VsZiDigJQgYnJva2VyLCBndWlkZSwgdGhlIHBlcnNvbiB3aG8gbWFrZXMgYWxsIHRoZXNlIGNvbm5lY3Rpb25zIHBvc3NpYmxlIHdpdGhvdXQgZXZlciByZWFsbHkgYmVpbmcgdGhlIHN0b3J5J3MgYWN0dWFsIGNlbnRyZS4KClRvbWFzIGNvbnNpZGVycyBpdCBzZXJpb3VzbHkgYmVmb3JlIGFuc3dlcmluZy4gJ1NvbWV0aW1lcy4gRG9lc24ndCBib3RoZXIgbWUgdGhlIHdheSBpdCB1c2VkIHRvLCB0aG91Z2guIFNvbWUgam9icyBhcmUganVzdCBtZWFudCB0byBob2xkIHRoZSBsaWdodCBzdGVhZHkgZm9yIHNvbWVvbmUgZWxzZSdzIHNoaXAgdG8gZmluZCBpdHMgd2F5IGJ5LiBJJ3ZlIG1hZGUgbXkgcGVhY2Ugd2l0aCBiZWluZyB0aGF0LCBtb3N0bHkuJw==',
            'ending' => true,
        ],
    ],
];
