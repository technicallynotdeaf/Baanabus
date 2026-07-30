<?php
return [
    'id'    => 10,
    'title' => 'A Stranger Passing Through',
    'color' => '#5A7A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'WXVubmFuJ3MgbWFya2V0cyBzaXQgaGlnaCBhbmQgY29vbCBjb21wYXJlZCB0byB0aGUgbG93bGFuZCBoZWF0IHlvdSd2ZSBncm93biB1c2VkIHRvLCB0ZWEgYW5kIGRyaWVkIHNwaWNlIGJvdGggdHJhZGVkIGZyb20gc3RhbGxzIHRoYXQgaGF2ZSBjbGVhcmx5IGtub3duIGVhY2ggb3RoZXIsIGZvciBiZXR0ZXIgYW5kIHdvcnNlLCBmb3IgYSB2ZXJ5IGxvbmcgdGltZS4gQnJ1bm8sIGNoZWNraW5nIGhpcyBub3RlcywgbWVudGlvbnMgdGhlIHRyYWRlciB5b3Ugd2FudCBoYXMgYSBzdGFsbCB3ZWRnZWQgdW5jb21mb3J0YWJseSBjbG9zZSB0byBhIHJpdmFsJ3MuCgpUd28gd2F5cyB0byBhcHByb2FjaCBwcmVzZW50IHRoZW1zZWx2ZXM6IGdyZWV0IHRoZSBuZWlnaGJvdXJpbmcgcml2YWwgc3RhbGwgZmlyc3QsIGRpcGxvbWF0aWNhbGx5LCBvciBnbyBzdHJhaWdodCB0byB0aGUgdHJhZGVyIHlvdSBhY3R1YWxseSBuZWVkIGFuZCBkZWFsIHdpdGggYW55IGF3a3dhcmRuZXNzIGFmdGVyd2FyZC4=',
            'choices' => [
                ['text' => 'R3JlZXQgdGhlIHJpdmFsIHN0YWxsIGZpcnN0', 'next' => '2_rival'],
                ['text' => 'R28gc3RyYWlnaHQgdG8gdGhlIHRyYWRlcg==', 'next' => '2_direct'],
            ],
        ],
        '2_rival' => [
            'prose'  => 'WW91IHN0b3AgZmlyc3QgYXQgdGhlIG5laWdoYm91cmluZyBzdGFsbCwgZXhjaGFuZ2luZyBwb2xpdGUgcGxlYXNhbnRyaWVzIHdpdGggaXRzIG93bmVyLCB3aG8gZXllcyB5b3Ugd2l0aCB0aGUgcGFydGljdWxhciB3YXJpbmVzcyBvZiBzb21lb25lIHVzZWQgdG8gdmlzaXRvcnMgYmVpbmcgcG9hY2hlZCBieSB0aGUgc3RhbGwgbmV4dCBkb29yIGJlZm9yZSB0aGV5J3ZlIGV2ZW4gZmluaXNoZWQgYnJvd3NpbmcuIEl0IGNvc3RzIHlvdSBhIGZldyBtaW51dGVzLCBidXQgZWFybnMgYSBmbGlja2VyIG9mIGdlbnVpbmUgYXBwcmVjaWF0aW9uLgoKJ01vc3QgcGVvcGxlIGRvbid0IGJvdGhlciwnIHRoZSByaXZhbCB0cmFkZXIgYWRtaXRzLCBncnVkZ2luZ2x5IGltcHJlc3NlZC4=',
            'choices' => [
                ['text' => 'TW92ZSBvbiB0byB0aGUgYWN0dWFsIHRyYWRlcg==', 'next' => '3_shared'],
            ],
        ],
        '2_direct' => [
            'prose'  => 'WW91IGdvIHN0cmFpZ2h0IHRvIHRoZSB0cmFkZXIgeW91IGFjdHVhbGx5IG5lZWQsIGFuZCB0aGUgcml2YWwgc3RhbGwncyBvd25lciB3YXRjaGVzIHRoZSB3aG9sZSBleGNoYW5nZSB3aXRoIG9wZW4sIHBvaW50ZWQgZGlzYXBwcm92YWwsIG11dHRlcmluZyBzb21ldGhpbmcgdW5kZXIgaGlzIGJyZWF0aCB0aGF0IEJydW5vLCB3aXNlbHksIGRvZXNuJ3QgdHJhbnNsYXRlLgoKJ01pZ2h0IHdhbnQgdG8gc21vb3RoIHRoYXQgb3ZlciBiZWZvcmUgd2UgbGVhdmUsJyBCcnVubyBtdXJtdXJzLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHRyYWRlcg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHRyYWRlciwgTWVpLCBydW5zIGEgc3RhbGwgc3RvY2tlZCB3aXRoIHRlYSBhbmQgYSBkaXN0aW5jdGl2ZSByZWdpb25hbCBzcGljZSBibGVuZCBmb3VuZCBhbG1vc3Qgbm93aGVyZSBvdXRzaWRlIHRoaXMgc3BlY2lmaWMgbWFya2V0LiBTaGUgcmVjb2duaXNlcyBJcmlzJ3MgbmFtZSBpbW1lZGlhdGVseSwgd2FybWx5IOKAlCBhbmQgaW1tZWRpYXRlbHksIHdlYXJpbHksIGJyaW5ncyB1cCBoZXIgbG9uZy1ydW5uaW5nIGZldWQgd2l0aCB0aGUgbmVpZ2hib3VyaW5nIHN0YWxsLiAnRmlmdGVlbiB5ZWFycywgdGhhdCBhcmd1bWVudCwnIHNoZSBzYXlzLiAnU3RhcnRlZCBvdmVyIGEgc2hhcmVkIHdhdGVyIHNvdXJjZS4gTmV2ZXIgYWN0dWFsbHkgcmVzb2x2ZWQuIEV4aGF1c3RpbmcsIGlmIEknbSBob25lc3QuJwoKU2hlIHN0dWRpZXMgeW91LiAnSGVscCBtZSBmaW5kIGEgd2F5IHRocm91Z2ggaXQsIHByb3Blcmx5LCB3aXRob3V0IG1lIGhhdmluZyB0byBzaW1wbHkgZ2l2ZSBpbiBvciBmaWdodCBpdCBvdXQgZnVydGhlciwgYW5kIHRoZSBibGVuZCdzIHlvdXJzLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'T2ZmZXIgdG8gaGVscA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUgYXJlIHR3byBob25lc3Qgd2F5cyB0byBoZWxwIHdpdGhvdXQgdGFraW5nIHNpZGVzOiBwcm9wb3NlIGEgZ2VudWluZWx5IGZhaXIsIHByYWN0aWNhbCBjb21wcm9taXNlIGFib3V0IHRoZSBzaGFyZWQgcmVzb3VyY2UgdGhhdCBzdGFydGVkIGl0IGFsbCwgb3Igc2ltcGx5IGhlbHAgYm90aCBzdGFsbHMgc2VlIGVhY2ggb3RoZXIgYXMgcGVvcGxlIGFnYWluIHRocm91Z2ggc29tZSBzbWFsbCwgbmV1dHJhbCBzaGFyZWQgdGFzaywgbGV0dGluZyB3YXJtdGggZG8gdGhlIHdvcmsgYXJndW1lbnQgbmV2ZXIgbWFuYWdlZC4KCidFaXRoZXIncyByZWFsIGhlbHAsJyBNZWkgc2F5cy4gJ1ByYWN0aWNhbCBmaXgsIG9yIGp1c3QgcmVtaW5kaW5nIHR3byBzdHViYm9ybiBwZW9wbGUgdGhleSB1c2VkIHRvIGFjdHVhbGx5IGxpa2UgZWFjaCBvdGhlci4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'UHJvcG9zZSBhIGZhaXIgcHJhY3RpY2FsIGNvbXByb21pc2U=', 'next' => '5_compromise'],
                ['text' => 'SGVscCB0aGVtIHNlZSBlYWNoIG90aGVyIGFzIHBlb3BsZSBhZ2Fpbg==', 'next' => '5_warmth'],
            ],
        ],
        '5_compromise' => [
            'prose'  => 'UHJvcG9zaW5nIGEgZmFpciBjb21wcm9taXNlIG1lYW5zIGFjdHVhbGx5IHNpdHRpbmcgZG93biB3aXRoIGJvdGggdHJhZGVycywgbGlzdGVuaW5nIHByb3Blcmx5IHRvIGEgZmlmdGVlbi15ZWFyIGdyaWV2YW5jZSBmcm9tIGJvdGggc2lkZXMsIGFuZCB3b3JraW5nIG91dCBhIGdlbnVpbmVseSBwcmFjdGljYWwgYXJyYW5nZW1lbnQgbmVpdGhlciBvbmUgaGFkIHF1aXRlIGJlZW4gd2lsbGluZyB0byBzdWdnZXN0IGZpcnN0IHRoZW1zZWx2ZXMuIEl0IHRha2VzIHJlYWwgcGF0aWVuY2UsIGJ1dCBieSB0aGUgZW5kLCBib3RoIHBhcnRpZXMgcmVsdWN0YW50bHkgYWdyZWUgaXQncyBmYWlyLgoKTWVpIGxvb2tzIGxpZ2h0ZXIgdGhhbiB5b3UndmUgc2VlbiBoZXIgdGhlIHdob2xlIHZpc2l0Lg==',
            'choices' => [
                ['text' => 'U2VlIHRoZSBibGVuZCBoYW5kZWQgb3Zlcg==', 'next' => '6_shared'],
            ],
        ],
        '5_warmth' => [
            'prose'  => 'SGVscGluZyB0aGVtIHNlZSBlYWNoIG90aGVyIGFzIHBlb3BsZSBhZ2FpbiBtZWFucyBhIHNtYWxsLCBkZWxpYmVyYXRlbHkgc2hhcmVkIHRhc2sg4oCUIGFycmFuZ2luZyBmb3IgYm90aCBzdGFsbHMgdG8gaGVscCB5b3UgY2Fycnkgc29tZXRoaW5nIGhlYXZ5IGJldHdlZW4gdGhlbSwgZm9yY2luZyBicmllZiwgb3JkaW5hcnkgY29vcGVyYXRpb24gdGhhdCBuZWl0aGVyIGhhcyBhbGxvd2VkIHRoZW1zZWx2ZXMgaW4gZmlmdGVlbiB5ZWFycy4gQnkgdGhlIGVuZCwgdGhleSdyZSBub3QgZnJpZW5kcyBhZ2FpbiwgZXhhY3RseSwgYnV0IHNvbWV0aGluZyBpbiB0aGUgaWNlIGhhcyBnZW51aW5lbHkgY3JhY2tlZC4KCk1laSBsb29rcyBsaWdodGVyIHRoYW4geW91J3ZlIHNlZW4gaGVyIHRoZSB3aG9sZSB2aXNpdC4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBibGVuZCBoYW5kZWQgb3Zlcg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'TWVpIGhhbmRzIG92ZXIgdGhlIGRpc3RpbmN0aXZlIGJsZW5kIHdpdGggcmVhbCwgZ3JhdGVmdWwgd2FybXRoLiAnRmlmdGVlbiB5ZWFycywgYW5kIGEgc3RyYW5nZXIgcGFzc2luZyB0aHJvdWdoIGRvZXMgbW9yZSBnb29kIGluIGFuIGFmdGVybm9vbiB0aGFuIGVpdGhlciBvZiB1cyBtYW5hZ2VkIG9uIG91ciBvd24sJyBzaGUgc2F5cy4gJ0Z1bm55IGhvdyB0aGF0IHdvcmtzLCBzb21ldGltZXMuJwoKU2hlIHdyYXBzIHRoZSBibGVuZCBjYXJlZnVsbHkuICdZb3VyIGdyYW5kbW90aGVyIHdvdWxkIGhhdmUgZm91bmQgYSB3YXkgdGhyb3VnaCB0aGF0IGFyZ3VtZW50IGluIGFib3V0IHRlbiBtaW51dGVzLCBwcm9iYWJseS4gR29vZCB0byBzZWUgdGhlIGluc3RpbmN0IHJ1bnMgaW4gdGhlIGZhbWlseS4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0aHJvdWdoIHRoZSBjb29sIFl1bm5hbiBtYXJrZXQgd2l0aCB0aGUgYmxlbmQgc2VjdXJlIGluIGl0cyB3cmFwLCB0aGUgdHdvIG9uY2UtZmV1ZGluZyBzdGFsbHMgdmlzaWJseSwgaWYgY2F1dGlvdXNseSwgbW9yZSByZWxheGVkIHdpdGggZWFjaCBvdGhlciBhcyB5b3UgcGFzcy4gQnJ1bm8gbG9va3MgZ2VudWluZWx5IGltcHJlc3NlZC4KCidEaWRuJ3QgZXhwZWN0IHlvdSB0byBhY3R1YWxseSBmaXggdGhhdCwnIGhlIGFkbWl0cy4gJ0ZpZnRlZW4geWVhcnMgaXMgYSBsb25nIHRpbWUgZm9yIGEgbWFya2V0IGdydWRnZSB0byBmZXN0ZXIuJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSBqdXN0IGdvdCBsdWNreSB3aXRoIHRoZSB0aW1pbmc=', 'next' => '8_end_lucky'],
                ['text' => 'U2F5IHNvbWUgZ3J1ZGdlcyBqdXN0IG5lZWQgYSBzdHJhbmdlciB0byBpbnRlcnJ1cHQgdGhlbQ==', 'next' => '8_end_stranger'],
            ],
        ],
        '8_end_lucky' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIHRoaW5rIEkganVzdCBnb3QgbHVja3kgd2l0aCB0aGUgdGltaW5nLCcgeW91IHNheSwgZ2VudWluZWx5IHVuc3VyZSBob3cgbXVjaCBjcmVkaXQgdG8gYWN0dWFsbHkgdGFrZS4gJ0ZpZnRlZW4geWVhcnMgb2YgdGlyZWRuZXNzIHByb2JhYmx5IGRpZCBtb3JlIG9mIHRoZSB3b3JrIHRoYW4gSSBkaWQuJwoKQnJ1bm8gcmFpc2VzIGFuIGV5ZWJyb3cuICdNYXliZS4gT3IgbWF5YmUgeW91J3JlIGJldHRlciBhdCB0aGlzIHRoYW4geW91J3JlIGdpdmluZyB5b3Vyc2VsZiBjcmVkaXQgZm9yLiBFaXRoZXIgd2F5LCBpdCB3b3JrZWQuJw==',
            'ending' => true,
        ],
        '8_end_stranger' => [
            'prose'  => 'J0kgdGhpbmsgc29tZSBncnVkZ2VzIGp1c3QgbmVlZCBhIHN0cmFuZ2VyIHRvIGludGVycnVwdCB0aGVtLCBob25lc3RseSwnIHlvdSBzYXksIHRoaW5raW5nIGFib3V0IGhvdyBzdHVjayBib3RoIHRyYWRlcnMgaGFkIGNsZWFybHkgYmVlbi4gJ1RvbyBtdWNoIGhpc3RvcnkgZm9yIGVpdGhlciBvZiB0aGVtIHRvIG1ha2UgdGhlIGZpcnN0IG1vdmUgYWxvbmUuJwoKQnJ1bm8gbm9kcyBzbG93bHkuICdUaGF0J3MgcHJvYmFibHkgZXhhY3RseSByaWdodC4gV29uZGVyIGhvdyBtYW55IG90aGVyIHN0dWNrIHRoaW5ncyB0aGlzIHdob2xlIHRyaXAncyBxdWlldGx5IGJlZW4gdW5zdGlja2luZywgb25lIHN0b3AgYXQgYSB0aW1lLic=',
            'ending' => true,
        ],
    ],
];
