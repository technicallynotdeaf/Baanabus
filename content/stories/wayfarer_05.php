<?php
return [
    'id'    => 5,
    'title' => 'Two Ways of Paying Attention',
    'color' => '#8AA0B8',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEdlb3JnaWFuIE1pbGl0YXJ5IFJvYWQgY3V0cyB0aHJvdWdoIHNvbWUgb2YgdGhlIG1vc3QgZHJhbWF0aWMgY291bnRyeSB5b3UndmUgc2VlbiB5ZXQsIGphZ2dlZCBzbm93LWNhcHBlZCBwZWFrcyBjbG9zaW5nIGluIHRpZ2h0IGFyb3VuZCBhIHZhbGxleSByb2FkIHRoYXQncyBjYXJyaWVkIHRyYXZlbGxlcnMsIHRyYWRlcnMsIGFuZCBhcm1pZXMgYWxpa2UgZm9yIGNlbnR1cmllcy4gU29tZXdoZXJlIGFib3ZlIHRoZSByb2FkLCBhdCB0aGUgcGFzcyBpdHNlbGYsIGEga2VlcGVyIGNvbnRyb2xzIHdobydzIGFjdHVhbGx5IHBlcm1pdHRlZCB0byBjcm9zcyB3aGVuIHRoZSB3ZWF0aGVyIHR1cm5zIHVuY2VydGFpbiDigJQgd2hpY2gsIHRoaXMgdGltZSBvZiB5ZWFyLCBpcyBtb3N0IG9mIHRoZSB0aW1lLgoKVHdvIHdheXMgdG8gYXBwcm9hY2ggaGlzIHBvc3QgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgb2xkIGNhcmF2YW4gdHJhY2ssIHNsb3dlciBidXQgdHJhZGl0aW9uYWwsIHRoZSB3YXkgZ2VuZXJhdGlvbnMgb2YgdHJhdmVsbGVycyBoYXZlIGFubm91bmNlZCB0aGVtc2VsdmVzLCBvciB0aGUgbmV3ZXIgcm9hZCwgZmFzdGVyLCBtb3JlIGRpcmVjdCwgbGVzcyBvYnZpb3VzbHkgcmVzcGVjdGZ1bCBvZiB0aGUgbW91bnRhaW4ncyBvd24gZXRpcXVldHRlLg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgb2xkIGNhcmF2YW4gdHJhY2s=', 'next' => '2_caravan'],
                ['text' => 'VGFrZSB0aGUgbmV3ZXIgcm9hZA==', 'next' => '2_road'],
            ],
        ],
        '2_caravan' => [
            'prose'  => 'VGhlIGNhcmF2YW4gdHJhY2sgd2luZHMgcHJvcGVybHksIGRlbGliZXJhdGVseSwgcGFzdCBzbWFsbCByb2Fkc2lkZSBzaHJpbmVzIGFuZCB0aGUgb2NjYXNpb25hbCB3ZWF0aGVyZWQga2hhY2hrYXIg4oCUIGNhcnZlZCBtZW1vcmlhbCBzdG9uZXMg4oCUIGVhY2ggb25lIGEgc21hbGwsIHNwZWNpZmljIGFja25vd2xlZGdtZW50IG9mIHRoZSBtb3VudGFpbidzIGxvbmcgaGlzdG9yeSBvZiBjbGFpbWluZyB0cmF2ZWxsZXJzIHdobyBkaWRuJ3QgcmVzcGVjdCBpdCBwcm9wZXJseS4KCllvdSBhcnJpdmUgYXQgdGhlIGtlZXBlcidzIHBvc3QgaGF2aW5nIHRha2VuIHRoZSBzbG93ZXIsIG1vcmUgdmlzaWJseSBodW1ibGUgYXBwcm9hY2gsIGFuZCB0aGUgb2xkIG1hbiB3YXRjaGluZyB5b3VyIGZpbmFsIGFzY2VudCBzZWVtcyB0byBub3RlIHRoaXMsIGZpbGluZyBpdCBhd2F5IHdpdGhvdXQgY29tbWVudC4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHBvc3Q=', 'next' => '3_shared'],
            ],
        ],
        '2_road' => [
            'prose'  => 'VGhlIG5ld2VyIHJvYWQgaXMgZmFzdGVyLCBtb3JlIGRpcmVjdCwgZW5naW5lZXJlZCB3aXRoIGEgY29uZmlkZW5jZSB0aGUgbW91bnRhaW4gZG9lc24ndCBlbnRpcmVseSBzZWVtIHRvIHNoYXJlIOKAlCBzd2l0Y2hiYWNrcyBibGFzdGVkIHRocm91Z2ggcm9jayByYXRoZXIgdGhhbiB3b3JrZWQgYXJvdW5kIGl0LiBZb3UgbWFrZSBnb29kIHRpbWUsIGFycml2aW5nIGF0IHRoZSBrZWVwZXIncyBwb3N0IHdlbGwgYWhlYWQgb2Ygd2hlcmUgdGhlIG9sZCB0cmFjayB3b3VsZCBoYXZlIHB1dCB5b3UuCgpUaGUga2VlcGVyIHdhdGNoZXMgeW91IGFycml2ZSB3aXRoIGFuIGV4cHJlc3Npb24gdGhhdCdzIGhhcmQgdG8gcmVhZCDigJQgbm90IGRpc2FwcHJvdmFsIGV4YWN0bHksIG1vcmUgY2FyZWZ1bCBhc3Nlc3NtZW50LCBmaWxpbmcgYXdheSB5b3VyIGNob2ljZSBvZiByb3V0ZSB0aGUgc2FtZSB3YXkgaGUnZCBmaWxlIGF3YXkgYW55dGhpbmcgZWxzZSB3b3J0aCBub3RpbmcgYWJvdXQgYSBzdHJhbmdlci4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHBvc3Q=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGtlZXBlciwgVmFraHRhbmcsIGhhcyBoZWxkIHRoaXMgcG9zdCBmb3IgbG9uZ2VyIHRoYW4gbW9zdCBvZiB0aGUgc3Vycm91bmRpbmcgcGVha3MgaGF2ZSBoYWQgbmFtZXMgYW55b25lIGJvdGhlcmVkIHdyaXRpbmcgZG93biwgYnkgdGhlIGxvb2sgb2YgaGltLiBIZSBrbm93cyBBdWd1c3RpbidzIG5hbWUgaW1tZWRpYXRlbHksIG5vZGRpbmcgc2xvd2x5LiAnSGUgY3Jvc3NlZCBoZXJlIG9uY2UsIHByb3Blcmx5LCBvbiBmb290LCBpbiB3ZWF0aGVyIEkgd291bGRuJ3QgaGF2ZSBzZW50IG15IG93biBzb24gaW50by4nIEEgcGF1c2UuICdJIHdvbid0IGhhbmQgeW91IGFueXRoaW5nIG9mIGhpcyBvbiByZXB1dGF0aW9uIGFsb25lLCB0aG91Z2guIFRoZSBwYXNzIGlzIHVuY2VydGFpbiB0b2RheS4gUHJvdmUgeW91IGNhbiBhY3R1YWxseSByZWFkIGl0LCBhbmQgd2UnbGwgdGFsay4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWNjZXB0IHRoZSB0ZXN0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'UmVhZGluZyBhIG1vdW50YWluIHBhc3MgcHJvcGVybHksIGl0IHR1cm5zIG91dCwgaXNuJ3Qgb25lIHNpbmdsZSBza2lsbCDigJQgaXQncyBhbiBhY2N1bXVsYXRpb24gb2Ygc21hbGwgc2lnbnMsIGFuZCBWYWtodGFuZyBzZWVtcyBlbnRpcmVseSBvcGVuIHRvIGhvdyB5b3UgYXJyaXZlIGF0IHlvdXIgYW5zd2VyLCBwcm92aWRlZCB0aGUgYW5zd2VyIGl0c2VsZiBob2xkcyB1cC4gWW91IGNvdWxkIHdvcmsgZnJvbSB3aGF0IGhpcyBvd24gZmFtaWx5IGhhcyB0YXVnaHQgZm9yIGdlbmVyYXRpb25zLCB3YXRjaGluZyB3aW5kIGFuZCBjbG91ZCBhbmQgc25vdy10ZXh0dXJlIHRoZSB0cmFkaXRpb25hbCB3YXksIG9yIHlvdSBjb3VsZCB3b3JrIGZyb20gQXVndXN0aW4ncyBvd24gY2FyZWZ1bCBub3RlcywgdHVja2VkIGludG8gdGhlIGNhc2UsIGRlc2NyaWJpbmcgZXhhY3RseSB0aGlzIGtpbmQgb2YganVkZ21lbnQgY2FsbCBpbiBoaXMgb3duIG1ldGhvZGljYWwgaGFuZC4=',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgcGFzcyB0aGUgdHJhZGl0aW9uYWwgd2F5', 'next' => '5_tradition'],
                ['text' => 'UmVhZCBpdCBieSBBdWd1c3RpbidzIG93biBub3Rlcw==', 'next' => '5_notes'],
            ],
        ],
        '5_tradition' => [
            'prose'  => 'VmFraHRhbmcgdGVhY2hlcyB5b3UsIHBhdGllbnRseSBhbmQgd2l0aG91dCBtdWNoIGV4cGxhbmF0aW9uIGJleW9uZCBkaXJlY3QgZGVtb25zdHJhdGlvbiwgdG8gcmVhZCB0aGUgc3BlY2lmaWMgdGV4dHVyZSBvZiB3aW5kYmxvd24gc25vdyBvbiB0aGUgcmlkZ2UgYWJvdmUsIHRoZSBwYXJ0aWN1bGFyIHF1YWxpdHkgb2YgY2xvdWQgdGhhdCBtZWFucyByZWFsIHRyb3VibGUgdmVyc3VzIHRoZSBraW5kIHRoYXQgbWVhbnMgbm90aGluZyBhdCBhbGwuIEl0J3Mgc2xvdywgaHVtYmxpbmcgd29yaywgYnVpbHQgZW50aXJlbHkgb24gZGVjYWRlcyBvZiBhY2N1bXVsYXRlZCBhdHRlbnRpb24geW91IGRvbid0IGhhdmUgYW5kIGNhbid0IGZha2UuCgpCeSB0aGUgZW5kLCB5b3UndmUgbWFkZSB5b3VyIHJlYWQg4oCUIGNhdXRpb3VzbHksIGJ1dCBjb3JyZWN0bHksIG1hdGNoaW5nIFZha2h0YW5nJ3Mgb3duIHByaXZhdGUgYXNzZXNzbWVudCB3aGVuIGhlIGZpbmFsbHkgcmV2ZWFscyBpdC4=',
            'choices' => [
                ['text' => 'U2VlIGlmIHlvdSB3ZXJlIHJpZ2h0', 'next' => '6_shared'],
            ],
        ],
        '5_notes' => [
            'prose'  => 'QXVndXN0aW4ncyBub3RlcyB0dXJuIG91dCB0byBiZSByZW1hcmthYmx5IHNwZWNpZmljIG9uY2UgeW91IGFjdHVhbGx5IHNpdCB3aXRoIHRoZW0gcHJvcGVybHkg4oCUIGJhcm9tZXRyaWMgcmVhZGluZ3MsIHdpbmQgcGF0dGVybnMsIGNhcmVmdWwgY3Jvc3MtcmVmZXJlbmNlcyB0byBleGFjdGx5IHRoaXMga2luZCBvZiBwYXNzLCB3cml0dGVuIGJ5IGEgbWFuIHdobyBjbGVhcmx5IHRvb2sgbW91bnRhaW4gc2FmZXR5IGFzIHNlcmlvdXNseSBhcyBhbnkgbG9jYWwgZXZlciBjb3VsZC4gQ3Jvc3MtcmVmZXJlbmNpbmcgaGlzIG51bWJlcnMgYWdhaW5zdCB3aGF0IHlvdSBjYW4gc2VlIHdpdGggeW91ciBvd24gZXllcyB0YWtlcyByZWFsIGNvbmNlbnRyYXRpb24uCgpCeSB0aGUgZW5kLCB5b3UndmUgbWFkZSB5b3VyIHJlYWQg4oCUIG1ldGhvZGljYWxseSwgYnkgaGlzIG93biBjYXJlZnVsIHN5c3RlbSwgbWF0Y2hpbmcgVmFraHRhbmcncyBvd24gcHJpdmF0ZSBhc3Nlc3NtZW50IHdoZW4gaGUgZmluYWxseSByZXZlYWxzIGl0Lg==',
            'choices' => [
                ['text' => 'U2VlIGlmIHlvdSB3ZXJlIHJpZ2h0', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J0NvcnJlY3QsJyBWYWtodGFuZyBzYXlzLCB3aXRoIHRoZSBwYXJ0aWN1bGFyIHNhdGlzZmFjdGlvbiBvZiBhIG1hbiB3aG8gZG9lc24ndCBzYXkgaXQgb2Z0ZW4uICdUaGUgcGFzcyBob2xkcyB1bnRpbCB0b21vcnJvdyBldmVuaW5nLCB0aGVuIGl0IHdvbid0LiBZb3UgcmVhZCB0aGF0IHByb3Blcmx5LCBob3dldmVyIHlvdSBnb3QgdGhlcmUuJyBIZSBnb2VzIGluc2lkZSBhbmQgcmV0dXJucyB3aXRoIGEgc21hbGwgYnJhc3MgaW5zdHJ1bWVudCwgdGhlIGxldmVsbGluZyBidWJibGUsIGtlcHQgaW4gYSBkcmF3ZXIgb2YgdGhpbmdzIGhlJ3MgYXBwYXJlbnRseSBiZWVuIG1pbmRpbmcgZm9yIHRyYXZlbGxlcnMgd2hvIG5ldmVyIHJldHVybmVkIHRvIGNsYWltIHRoZW0uCgonSGlzLCcgaGUgY29uZmlybXMsIGNoZWNraW5nIGEgc21hbGwgc2NyYXRjaGVkIG1hcmsgb24gaXRzIGJhc2UuICdUYWtlIGl0LiBZb3UndmUgZWFybmVkIHRoZSByaWdodCB0byBjYXJyeSBpdCBmdXJ0aGVyIHRoYW4gaGUgZGlkLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBwcmVwYXJlIHRvIGNyb3Nz', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNyb3NzIHRoZSBwYXNzIHRoZSBuZXh0IG1vcm5pbmcsIGV4YWN0bHkgd2l0aGluIHRoZSB3aW5kb3cgVmFraHRhbmcgcHJlZGljdGVkLCB0aGUgbW91bnRhaW4ncyBtb29kIHNoaWZ0aW5nIHZpc2libHkgZm9yIHRoZSB3b3JzZSByaWdodCBvbiBzY2hlZHVsZSBhcyB5b3UgY2xlYXIgdGhlIGZhciBzaWRlLiBUaGUgbGV2ZWxsaW5nIGJ1YmJsZSByaWRlcyBzZWN1cmUgaW4gdGhlIGNhc2Ugbm93LCBhIGZvdXJ0aCBwaWVjZSByZWNvdmVyZWQsIHRoZSB3aG9sZSBpbnN0cnVtZW50IHNsb3dseSByZWdhaW5pbmcgYSBzaGFwZSB0aGF0IGFjdHVhbGx5IHJlc2VtYmxlcyBpdHNlbGYuCgpHcmV0YSwgY2hlY2tpbmcgdGhlIHdlYXRoZXIgaW5zdHJ1bWVudHMgYXMgeW91IGRlc2NlbmQsIGdpdmVzIGEgbG93IHdoaXN0bGUgYXQgaG93IHByZWNpc2VseSB0aGUgb2xkIGtlZXBlciBjYWxsZWQgaXQuICdUaGF0J3Mgbm90IGx1Y2suIFRoYXQncyBmb3J0eSB5ZWFycyBvZiBwYXlpbmcgcmVhbCBhdHRlbnRpb24uIEknZCB0cnVzdCB0aGF0IG9sZCBtYW4ncyByZWFkIG92ZXIgaGFsZiB0aGUgaW5zdHJ1bWVudHMgaW4gdGhpcyBjYXNlLCBob25lc3RseS4n',
            'choices' => [
                ['text' => 'QXNrIHdoaWNoIG1ldGhvZCDigJQgdHJhZGl0aW9uIG9yIHRoZSBub3RlcyDigJQgcmVhbGx5IGNhcnJpZWQgdGhlIGRheQ==', 'next' => '8_end_ask'],
                ['text' => 'TGV0IGJvdGggYXBwcm9hY2hlcyBzaW1wbHkgaGF2ZSBib3RoIHdvcmtlZA==', 'next' => '8_end_both'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzayBHcmV0YSwgaGFsZi1qb2tpbmcsIHdoZXRoZXIgaXQgd2FzIHRyYWRpdGlvbiBvciBBdWd1c3RpbidzIG93biBjYXJlZnVsIG1ldGhvZG9sb2d5IHRoYXQgcmVhbGx5IGdvdCB5b3UgdGhyb3VnaC4gU2hlIGNvbnNpZGVycyBpdCBzZXJpb3VzbHksIHRob3VnaCwgcmF0aGVyIHRoYW4gbGF1Z2hpbmcgaXQgb2ZmLiAnSG9uZXN0bHk/IFByb2JhYmx5IG5laXRoZXIsIGFsb25lLiBPbGQga25vd2xlZGdlIGFuZCBjYXJlZnVsIG5vdGVzIOKAlCB0aGV5J3JlIG5vdCBhY3R1YWxseSBpbiBjb21wZXRpdGlvbi4gVGhleSdyZSBqdXN0IHR3byB3YXlzIG9mIHBheWluZyB0aGUgc2FtZSBraW5kIG9mIGF0dGVudGlvbi4nCgpJdCdzIGEgYmV0dGVyIGFuc3dlciB0aGFuIHlvdSBleHBlY3RlZCwgYW5kIGl0IHNldHRsZXMgc29tZXRoaW5nIGluIHlvdSBhYm91dCB0aGUgd2hvbGUgcmVzdCBvZiB0aGlzIGpvdXJuZXkg4oCUIHRoYXQgdGhlcmUgbWlnaHQgbm90IGJlIGEgc2luZ2xlIHJpZ2h0IHdheSB0byBkbyBhbnkgb2YgdGhpcywgb25seSByaWdodCBhdHRlbnRpb24sIGFwcGxpZWQgaG93ZXZlciBpdCBjb21lcyBuYXR1cmFsbHku',
            'ending' => true,
        ],
        '8_end_both' => [
            'prose'  => 'WW91IGRvbid0IHByZXNzIGZvciBhIHNpbmdsZSBhbnN3ZXIsIGRlY2lkaW5nIHRoZSBxdWVzdGlvbiBpdHNlbGYgbWlnaHQgYmUgdGhlIHdyb25nIHNoYXBlIOKAlCBhcyBpZiBvbmx5IG9uZSBtZXRob2QgY291bGQgcG9zc2libHkgaGF2ZSBiZWVuIHRoZSByZWFsIG9uZSwgd2hlbiBjbGVhcmx5IGJvdGggbGVkIHRvIGV4YWN0bHkgdGhlIHNhbWUgdHJ1ZSByZWFkaW5nIG9mIHRoZSBzYW1lIHJlYWwgbW91bnRhaW4uCgpUaGUgQ29udG91ciBjbGVhcnMgdGhlIHBhc3MgaW4gZ29vZCB0aW1lLCBWYWtodGFuZydzIHBvc3Qgc2hyaW5raW5nIGJlaGluZCB5b3UgaW50byBqdXN0IGFub3RoZXIgZml4ZWQgcG9pbnQgb24gYSB2ZXJ5IGxvbmcgcm91dGUsIGFuZCB5b3UgZmluZCB5b3Vyc2VsZiB0aGlua2luZyB0aGF0IEF1Z3VzdGluLCB3aGF0ZXZlciBlbHNlIGhlIGdvdCB3cm9uZyBpbiBoaXMgbGlmZSwgc2VlbXMgdG8gaGF2ZSB1bmRlcnN0b29kIHRoaXMgc2FtZSB0aGluZzogdGhhdCB0aGVyZSdzIG1vcmUgdGhhbiBvbmUgaG9uZXN0IHdheSB1cCBhIG1vdW50YWluLCBwcm92aWRlZCB5b3UncmUgYWN0dWFsbHkgcGF5aW5nIGF0dGVudGlvbiBvbiB0aGUgd2F5Lg==',
            'ending' => true,
        ],
    ],
];
