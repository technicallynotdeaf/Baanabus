<?php
return [
    'id'    => 5,
    'title' => 'The Door That Seems Locked',
    'color' => '#B85A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'S2FzaGdhcidzIG9sZCBiYXphYXIgc3ByYXdscyBpbiBnZW51aW5lLCBjaGFvdGljIHNwbGVuZG9yLCBvbmUgb2YgdGhlIFNpbGsgUm9hZCdzIG9sZGVzdCBhbmQgbW9zdCBzdG9yaWVkIHRyYWRpbmcgaHVicywgVXlnaHVyIG1lcmNoYW50cyBjYWxsaW5nIG91dCBvdmVyIHN0YWxscyBvZiBkcmllZCBmcnVpdCwgY2FycGV0cywgYW5kIGhhbmQtZm9yZ2VkIGtuaXZlcyB3aXRoIGEgcmh5dGhtIHRoYXQgZmVlbHMgb2xkZXIgdGhhbiB0aGUgYnVpbGRpbmdzIGFyb3VuZCBpdC4gVG9tYXMgbmF2aWdhdGVzIGl0IHdpdGggcmVhbCBmYW1pbGlhcml0eSwgdGhlIGhhd2sgcmlkaW5nIGxvdyBhbmQgd2F0Y2hmdWwgb3ZlciB0aGUgY3Jvd2QncyBub2lzZS4KClR3byB3YXlzIHRocm91Z2ggdGhlIGJhemFhciB0b3dhcmQgdGhlIGVsZGVyIHdobyBtaWdodCBrbm93IHNvbWV0aGluZyB1c2VmdWwgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgbWFpbiBjb3ZlcmVkIG1hcmtldCwgZGVuc2UgYW5kIGxvdWQsIG9yIHRoZSBxdWlldGVyIGNyYWZ0c21lbidzIHJvdywgd2hlcmUga25pZmUtbWFrZXJzIGFuZCBpbnN0cnVtZW50LWJ1aWxkZXJzIGtlZXAgc21hbGxlciwgY2FsbWVyIHN0YWxscy4=',
            'choices' => [
                ['text' => 'UHVzaCB0aHJvdWdoIHRoZSBtYWluIG1hcmtldA==', 'next' => '2_market'],
                ['text' => 'VGFrZSB0aGUgY3JhZnRzbWVuJ3Mgcm93', 'next' => '2_craft'],
            ],
        ],
        '2_market' => [
            'prose'  => 'VGhlIG1haW4gbWFya2V0IGlzIGEgZ2VudWluZSBzZW5zb3J5IG92ZXJsb2FkLCBjb2xvdXIgYW5kIG5vaXNlIGFuZCB0aGUgc3BlY2lmaWMsIGxheWVyZWQgc21lbGwgb2YgYSBkb3plbiBkaWZmZXJlbnQgc3BpY2VzIGFuZCBjb29raW5nIGZpcmVzIGFsbCBjb21wZXRpbmcgYXQgb25jZS4gWW91IGhhdmUgdG8gYXNrIHRocmVlIHNlcGFyYXRlIHBlb3BsZSBiZWZvcmUgZmluYWxseSBnZXR0aW5nIGEgY2xlYXIgYW5zd2VyLCB0aGUgZWxkZXIncyBuYW1lIHBhc3NlZCBhbG9uZyB3aXRoIHJlYWwsIHVuaGVzaXRhdGluZyByZXNwZWN0IGVhY2ggdGltZS4KCidFbGRlciBUdXJzdW4sJyBzb21lb25lIGZpbmFsbHkgY29uZmlybXMuICdDcmFmdHNtZW4ncyByb3csIHBhc3QgdGhlIGtuaWZlLXNlbGxlcnMuIEhlJ2xsIGtub3cgd2h5IHlvdSd2ZSBjb21lIGJlZm9yZSB5b3Ugc2F5IGEgd29yZC4n',
            'choices' => [
                ['text' => 'RmluZCBoaW0=', 'next' => '3_shared'],
            ],
        ],
        '2_craft' => [
            'prose'  => 'VGhlIGNyYWZ0c21lbidzIHJvdyBpcyBjYWxtZXIsIG1vcmUgZGVsaWJlcmF0ZSwgYXJ0aXNhbnMgd29ya2luZyB3aXRoIHRoZSBwYXJ0aWN1bGFyIHVuaHVycmllZCBmb2N1cyBvZiBwZW9wbGUgd2hvc2UgcmVwdXRhdGlvbnMgZGVwZW5kIGVudGlyZWx5IG9uIGdldHRpbmcgdGhlIGRldGFpbHMgcmlnaHQuIFNldmVyYWwgcmVjb2duaXNlIFlzb2xkZSdzIG9sZCB0cmFkaW5nIG5hbWUgaW1tZWRpYXRlbHksIHBvaW50aW5nIHlvdSBvbndhcmQgd2l0aCByZWFsLCBxdWlldCByZXNwZWN0LgoKJ0VsZGVyIFR1cnN1biwnIG9uZSBrbmlmZS1tYWtlciBjb25maXJtcyB3aXRob3V0IGxvb2tpbmcgdXAgZnJvbSBoaXMgd29yay4gJ0VuZCBvZiB0aGUgcm93LiBIZSdsbCBrbm93IHdoeSB5b3UndmUgY29tZSBiZWZvcmUgeW91IHNheSBhIHdvcmQuJw==',
            'choices' => [
                ['text' => 'RmluZCBoaW0=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'RWxkZXIgVHVyc3VuIGlzIGFuY2llbnQsIHNoYXJwLWV5ZWQsIGFuZCBlbnRpcmVseSB1bmh1cnJpZWQgZGVzcGl0ZSB3aGF0IG11c3QgYmUgZ2VudWluZSBwaHlzaWNhbCBmcmFpbHR5LiBIZSBrbm93cyBZc29sZGUncyBuYW1lIGltbWVkaWF0ZWx5LCB3aXRoIHJlYWwgd2FybXRoLiAnU2hlIHBhc3NlZCB0aHJvdWdoIGhlcmUgbW9yZSB0aW1lcyB0aGFuIEkgY2FuIHByb3Blcmx5IGNvdW50LCBvdmVyIHRoZSB5ZWFycy4gQWx3YXlzIGFza2VkIGdvb2QgcXVlc3Rpb25zLiBBbHdheXMgbGlzdGVuZWQgdG8gdGhlIGFuc3dlcnMuJwoKSGUgc3R1ZGllcyB5b3UgY2FyZWZ1bGx5LiAnSSd2ZSBub3RoaW5nIHRvIGdpdmUgeW91IHRoYXQgeW91IGNvdWxkIGhvbGQgaW4geW91ciBoYW5kLiBPbmx5IGEgcHJvdmVyYiwgYW5kIG9ubHkgaWYgeW91IHByb3ZlIHlvdSdsbCBhY3R1YWxseSBjYXJyeSBpdCBwcm9wZXJseSByYXRoZXIgdGhhbiBzaW1wbHkgY29sbGVjdGluZyBpdCBsaWtlIGEgdHJpbmtldC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdyB0byBwcm92ZSB0aGF0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VHVyc3VuIG9mZmVycyB0d28gdGVzdHMsIGJvdGggYWJvdXQgdGhlIHNhbWUgZXNzZW50aWFsIHRoaW5nOiBwYXRpZW5jZS4gU2l0IHdpdGggaGltIGluIGNvbXBsZXRlIHNpbGVuY2UgZm9yIGEgcHJvcGVyIHN0cmV0Y2ggb2YgdGltZSwgbWF0Y2hpbmcgaGlzIG93biB1bmh1cnJpZWQgcmh5dGhtIHdpdGhvdXQgZmlkZ2V0aW5nIG9yIGZpbGxpbmcgdGhlIHF1aWV0IHdpdGggdGFsaywgb3IgbGlzdGVuIHRvIGEgbG9uZywgd2luZGluZywgc2VlbWluZ2x5IHBvaW50bGVzcyBzdG9yeSBvZiBoaXMgb3duIGxpZmUgYWxsIHRoZSB3YXkgdGhyb3VnaCwgd2l0aG91dCBvbmNlIGludGVycnVwdGluZyBvciB0cnlpbmcgdG8gaHVycnkgaXQgYWxvbmcuCgonRWl0aGVyIHByb3ZlcyB0aGUgc2FtZSB0aGluZywnIGhlIHNheXMuICdXaGV0aGVyIHlvdSBjYW4gYWN0dWFsbHkgcmVjZWl2ZSBzb21ldGhpbmcsIGluc3RlYWQgb2YganVzdCBncmFiYmluZyBmb3IgaXQuJw==',
            'choices' => [
                ['text' => 'U2l0IHdpdGggaGltIGluIHNpbGVuY2U=', 'next' => '5_silence'],
                ['text' => 'SGVhciBoaXMgbG9uZyBzdG9yeSB0aHJvdWdo', 'next' => '5_story'],
            ],
        ],
        '5_silence' => [
            'prose'  => 'WW91IHNpdCB3aXRoIGhpbSBhIGxvbmcgd2hpbGUsIHRoZSBiYXphYXIncyBub2lzZSBmYWRpbmcgaW50byBiYWNrZ3JvdW5kIHRleHR1cmUsIHRoZSBzaWxlbmNlIGl0c2VsZiBncmFkdWFsbHkgYmVjb21pbmcgbGVzcyB1bmNvbWZvcnRhYmxlIHRoZSBsb25nZXIgaXQgc3RyZXRjaGVzLiBUdXJzdW4gd2F0Y2hlcyB5b3UgdGhlIHdob2xlIHRpbWUgd2l0aG91dCBjb21tZW50LCBhbmQgc29tZXRoaW5nIGluIGhpcyBhbmNpZW50LCBwYXRpZW50IGZhY2Ugc3VnZ2VzdHMgeW91J3JlIHBhc3NpbmcgYSB0ZXN0IHlvdSBjYW4ndCBlbnRpcmVseSBzZWUgdGhlIHNoYXBlIG9mLgoKQnkgdGhlIGVuZCwgdGhlIHNpbGVuY2UgaGFzIHRhdWdodCB5b3Ugc29tZXRoaW5nIGFib3V0IHlvdXIgb3duIHJlc3RsZXNzbmVzcyB0aGF0IHdvcmRzIHByb2JhYmx5IGNvdWxkbid0IGhhdmUu',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUgcHJvdmVyYg==', 'next' => '6_shared'],
            ],
        ],
        '5_story' => [
            'prose'  => 'SGlzIHN0b3J5IHdpbmRzIGZvciB0aGUgYmV0dGVyIHBhcnQgb2YgYW4gaG91ciwgc2VlbWluZ2x5IHBvaW50bGVzcyBkaWdyZXNzaW9ucyBmb2xkaW5nIGJhY2ssIGV2ZW50dWFsbHksIGludG8gc29tZXRoaW5nIHRoYXQgZG9lcyBhY3R1YWxseSBtYXR0ZXIsIHRob3VnaCB5b3UgY291bGRuJ3QgaGF2ZSBndWVzc2VkIHRoZSBzaGFwZSBvZiBpdCBmcm9tIHRoZSBiZWdpbm5pbmcuIFlvdSBsZXQgaXQgdW5mb2xkIGVudGlyZWx5IG9uIGl0cyBvd24gdGVybXMsIHdpdGhvdXQgb25jZSB0cnlpbmcgdG8gaHVycnkgaGltIHRvd2FyZCB3aGF0ZXZlciBwb2ludCBoZSdzIHNsb3dseSBidWlsZGluZyB0b3dhcmQuCgpCeSB0aGUgZW5kLCB5b3UgdW5kZXJzdGFuZCBzb21ldGhpbmcgYWJvdXQgcGF0aWVuY2UgdGhhdCBhIHNob3J0ZXIsIG1vcmUgZWZmaWNpZW50IHRlbGxpbmcgY291bGQgbmV2ZXIgaGF2ZSB0YXVnaHQgeW91Lg==',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUgcHJvdmVyYg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J0FsbCByaWdodCwnIFR1cnN1biBzYXlzLCBzYXRpc2ZpZWQgZWl0aGVyIHdheS4gJ0hlcmUgaXMgd2hhdCB5b3UgYWN0dWFsbHkgY2FtZSBmb3IuJyBIZSBzcGVha3MgYSBzaG9ydCwgb2xkIHByb3ZlcmIgaW4gaGlzIG93biBsYW5ndWFnZSwgdGhlbiB0cmFuc2xhdGVzIGl0IGNhcmVmdWxseTogJ1RoZSBkb29yIHRoYXQgc2VlbXMgbG9ja2VkIGhhcyBvZnRlbiBzaW1wbHkgbmV2ZXIgYmVlbiBwcm9wZXJseSBhc2tlZC4nCgonUmVtZW1iZXIgaXQgZXhhY3RseSwnIGhlIHNheXMuICdOb3QgZm9yIGl0cyBvd24gc2FrZS4gWW91J2xsIG5lZWQgaXQsIHByZWNpc2VseSBhcyBJIHNhaWQgaXQsIHNvbWV3aGVyZSBmdXJ0aGVyIGRvd24gdGhpcyByb2FkLiBJIHdvbid0IHNheSB3aGVyZS4gWW91J2xsIGtub3cgdGhlIG1vbWVudCBpdCBtYXR0ZXJzLic=',
            'choices' => [
                ['text' => 'V3JpdGUgaXQgaW50byB0aGUgbGV0dGVy', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdyaXRlIHRoZSBwcm92ZXJiIGNhcmVmdWxseSBpbnRvIHRoZSBtYXJnaW4gb2YgWXNvbGRlJ3Mgb2xkIGxldHRlciBvZiBkZWJ0LCBleGFjdCB3b3JkcywgZXhhY3QgcGhyYXNpbmcsIHRydXN0aW5nIFR1cnN1bidzIGNlcnRhaW50eSB0aGF0IGl0J2xsIG1hdHRlciBsYXRlciBldmVuIHRob3VnaCBpdHMgcHVycG9zZSBpcyBlbnRpcmVseSBvcGFxdWUgdG8geW91IHJpZ2h0IG5vdy4KClRvbWFzLCByZWFkaW5nIGl0IG92ZXIgeW91ciBzaG91bGRlciwgbG9va3MgdGhvdWdodGZ1bCByYXRoZXIgdGhhbiBkaXNtaXNzaXZlLiAnT2xkIHRyYWRlcnMgZGlkIHRoaXMgc29tZXRpbWVzIOKAlCBwYXNzd29yZHMgZGlzZ3Vpc2VkIGFzIHdpc2RvbSwgc28gYW55b25lIGludGVyY2VwdGluZyBhIGxldHRlciB3b3VsZG4ndCBrbm93IHdoYXQgdGhleSB3ZXJlIGFjdHVhbGx5IGhvbGRpbmcuIFdvdWxkbid0IGJlIHN1cnByaXNlZCBpZiB0aGF0J3MgZXhhY3RseSB3aGF0IHRoaXMgdHVybnMgb3V0IHRvIGJlLic=',
            'choices' => [
                ['text' => 'QXNrIGhpbSB0byBndWVzcyB3aGF0IGRvb3IgaXQgbWlnaHQgb3Blbg==', 'next' => '8_end_guess'],
                ['text' => 'TGV0IHRoZSBteXN0ZXJ5IHNpbXBseSB0cmF2ZWwgd2l0aCB5b3U=', 'next' => '8_end_travel'],
            ],
        ],
        '8_end_guess' => [
            'prose'  => 'WW91IGFzayBUb21hcyB0byBndWVzcywgYW5kIGhlIGNvbnNpZGVycyBpdCBzZXJpb3VzbHksIHR1cm5pbmcgb3ZlciBldmVyeXRoaW5nIGhlIGFjdHVhbGx5IGtub3dzIGFib3V0IHRoZSByb3V0ZSBhaGVhZC4gJ0R1bmh1YW5nLCBtYXliZS4gT2xkIGFyY2hpdmVzIHRoZXJlLCBndWFyZGVkIGNhcmVmdWxseS4gQSBkb29yIHRoYXQgc2VlbXMgbG9ja2VkIGZpdHMgdGhhdCBraW5kIG9mIHBsYWNlIGJldHRlciB0aGFuIG1vc3QuJwoKSXQncyBhIGd1ZXNzLCBub3QgYSBjZXJ0YWludHkuIEJ1dCBpdCBnaXZlcyB0aGUgcHJvdmVyYiBhIHNoYXBlIHRvIHRyYXZlbCB0b3dhcmQsIHJhdGhlciB0aGFuIHNpbXBseSByaWRpbmcgYWxvbmcgYXMgYW4gdW5leHBsYWluZWQgY3VyaW9zaXR5Lg==',
            'ending' => true,
        ],
        '8_end_travel' => [
            'prose'  => 'WW91IGxldCB0aGUgbXlzdGVyeSBzaW1wbHkgdHJhdmVsIHdpdGggeW91LCB1bmV4cGxhaW5lZCwgdHJ1c3RpbmcgVHVyc3VuJ3MgY2VydGFpbnR5IHdpdGhvdXQgbmVlZGluZyB0byBzb2x2ZSBpdCBpbiBhZHZhbmNlLiBTb21lIHRoaW5ncywgeW91J3JlIGxlYXJuaW5nIHRoaXMgd2hvbGUgam91cm5leSwgcmV2ZWFsIHRoZWlyIHB1cnBvc2UgZXhhY3RseSB3aGVuIHRoZXkncmUgbmVlZGVkIGFuZCBub3QgYSBtb21lbnQgc29vbmVyLgoKVGhlIGNhcmF2YW4gbW92ZXMgb24gZnJvbSBLYXNoZ2FyIGFzIHRoZSBiYXphYXIncyBub2lzZSBmYWRlcyBiZWhpbmQgeW91LCB0aGUgcHJvdmVyYiByaWRpbmcgcXVpZXRseSBpbiB0aGUgbGV0dGVyJ3MgbWFyZ2luLCB3YWl0aW5nIGZvciB3aGF0ZXZlciBkb29yIGl0J3MgYWN0dWFsbHkgbWVhbnQgdG8gb3Blbi4=',
            'ending' => true,
        ],
    ],
];
