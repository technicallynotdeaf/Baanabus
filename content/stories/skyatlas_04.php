<?php
return [
    'id'    => 4,
    'title' => 'Some Stories Need More Room',
    'color' => '#8A4A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TmFtaWJSYW5kJ3MgcmVkIGR1bmVzIHJvbGwgb3V0IGJlbmVhdGggdGhlIFF1aWV0IEhvdXIgaW4gdmFzdCwgd2luZC1zY3VscHRlZCB3YXZlcywgb25lIG9mIHRoZSBkYXJrZXN0IHNraWVzIG9uIHRoZSBjb250aW5lbnQgd2FpdGluZyBwYXRpZW50bHkgZm9yIHByb3BlciBuaWdodGZhbGwuIFByaXlhIGNoZWNrcyBoZXIgaW5zdHJ1bWVudHMgd2l0aCBxdWlldCBzYXRpc2ZhY3Rpb24uICdSZXNlcnZlJ3Mgc2VyaW91cyBhYm91dCBpdHMgZGFyay1za3kgc3RhdHVzLiBObyBzdHJheSBsaWdodCBmb3IgYSBodW5kcmVkIGtpbG9tZXRyZXMsIGVhc2lseS4nCgpUd28gZHVuZSBhcHByb2FjaGVzIHRvd2FyZCB0aGUgTmFtYSBlbGRlcidzIGNhbXAgcHJlc2VudCB0aGVtc2VsdmVzOiBvdmVyIHRoZSB0YWxsLCBleHBvc2VkIHJpZGdlIGxpbmUsIG9yIGFsb25nIHRoZSBzaGVsdGVyZWQgdmFsbGV5IGZsb29yIGJldHdlZW4gdGhlIGR1bmVzLg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZXhwb3NlZCByaWRnZSBsaW5l', 'next' => '2_ridge'],
                ['text' => 'Rm9sbG93IHRoZSBzaGVsdGVyZWQgdmFsbGV5IGZsb29y', 'next' => '2_valley'],
            ],
        ],
        '2_ridge' => [
            'prose'  => 'VGhlIHJpZGdlIGxpbmUgaXMgZXhwb3NlZCB0byB0aGUgd2luZCBidXQgb2ZmZXJzIGEgZ2VudWluZWx5IHNwZWN0YWN1bGFyIHZpZXcgdGhlIHdob2xlIHdheSwgcmVkIHNhbmQgc3RyZXRjaGluZyB0byBldmVyeSBob3Jpem9uIHVuZGVyIGEgc2t5IGFscmVhZHkgZGVlcGVuaW5nIHRvd2FyZCBldmVuaW5nLiBJdCdzIGhhcmRlciB3YWxraW5nLCBidXQgeW91IGFycml2ZSB3aXRoIHRoZSB3aG9sZSByZXNlcnZlIGxhaWQgb3V0IGdsb3Jpb3VzbHkgYmVoaW5kIHlvdS4=',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '2_valley' => [
            'prose'  => 'VGhlIHNoZWx0ZXJlZCB2YWxsZXkgZmxvb3Iga2VlcHMgeW91IG91dCBvZiB0aGUgd29yc3Qgb2YgdGhlIHdpbmQsIHRoZSBkdW5lcyByaXNpbmcgY2xvc2Ugb24gZWl0aGVyIHNpZGUgbGlrZSByZWQgd2FsbHMgaG9sZGluZyBiYWNrIHRoZSBjb21pbmcgZGFyay4gSXQncyBhbiBlYXNpZXIgd2FsaywgdGhlIGNhbXAncyBmaXJlIGZpbmFsbHkgdmlzaWJsZSBhaGVhZCBhcyBmdWxsIGR1c2sgc2V0dGxlcy4=',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGVsZGVyLCBhIE5hbWEgd29tYW4gbmFtZWQgT3VtYSBQZXRyb25lbGxhLCBzaXRzIGJ5IGEgc21hbGwgZmlyZSwgY2xlYXJseSBleHBlY3RpbmcgeW91LiAnWW91ciBncmVhdC11bmNsZSBsZWZ0IHRoaXMgcGF0Y2ggb2Ygc2t5IGNvbnNwaWN1b3VzbHkgbGFyZ2UsJyBzaGUgc2F5cywgZXhhbWluaW5nIHRoZSBhdGxhcydzIG5leHQgYmxhbmsgcGFnZSDigJQgbm90aWNlYWJseSBiaWdnZXIgdGhhbiB0aGUgb3RoZXJzIHlvdSd2ZSBmaWxsZWQgc28gZmFyLiAnVGhhdCdzIG5vIGFjY2lkZW50LiBTb21lIHN0b3JpZXMgbmVlZCBtb3JlIHJvb20gdGhhbiBvdGhlcnMgdG8gYmUgdG9sZCBwcm9wZXJseS4nCgpTaGUgc3R1ZGllcyB5b3UuICdBcmUgeW91IHByZXBhcmVkIHRvIGFjdHVhbGx5IHNpdCB3aXRoIGEgbG9uZyB0ZWxsaW5nLCByYXRoZXIgdGhhbiBhIHNob3J0IG9uZT8n',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBwcmVwYXJlZCB0byBzaXQgd2l0aCBpdA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'T3VtYSBQZXRyb25lbGxhIG9mZmVycyB0d28gd2F5cyB0byBwcm9wZXJseSByZWNlaXZlIHRoZSBsb25nIHRlbGxpbmc6IGhlYXIgaXQgYWxsIGluIG9uZSB1bmJyb2tlbiBzaXR0aW5nIGJ5IHRoZSBmaXJlLCB0aGUgd2hvbGUgc3RvcnkgdG9sZCBzdGFydCB0byBmaW5pc2ggd2l0aG91dCBwYXVzZSwgb3IgaGVhciBpdCBpbiBwaWVjZXMgYWNyb3NzIHRoZSBuaWdodCwgZWFjaCBwaWVjZSBwYWlyZWQgd2l0aCB3YXRjaGluZyB0aGUgYWN0dWFsIHN0YXJzIGl0IGRlc2NyaWJlcyByaXNlIGluIHRoZWlyIG93biB0aW1lLgoKJ0VpdGhlciBob25vdXJzIHRoZSBzdG9yeSBwcm9wZXJseSwnIHNoZSBzYXlzLiAnT25lIGxvbmcgdGVsbGluZywgb3Igc2V2ZXJhbCBwYWlyZWQgd2l0aCB0aGUgc2t5IGl0c2VsZi4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'SGVhciBpdCBhbGwgaW4gb25lIHVuYnJva2VuIHNpdHRpbmc=', 'next' => '5_unbroken'],
                ['text' => 'SGVhciBpdCBpbiBwaWVjZXMsIHBhaXJlZCB3aXRoIHRoZSByaXNpbmcgc3RhcnM=', 'next' => '5_pieces'],
            ],
        ],
        '5_unbroken' => [
            'prose'  => 'SGVhcmluZyBpdCBhbGwgaW4gb25lIHVuYnJva2VuIHNpdHRpbmcgbWVhbnMgYSBsb25nLCByaWNoIHRlbGxpbmcgYnkgdGhlIGZpcmUsIE91bWEgUGV0cm9uZWxsYSdzIHZvaWNlIHN0ZWFkeSBhbmQgdW5odXJyaWVkIHRocm91Z2ggYSBzdG9yeSBjb25zaWRlcmFibHkgbG9uZ2VyIGFuZCBtb3JlIGxheWVyZWQgdGhhbiBhbnl0aGluZyB5b3UndmUgaGVhcmQgb24gdGhpcyBqb3VybmV5IHNvIGZhciwgdGhlIGZ1bGwgc2hhcGUgb2YgaXQgb25seSBiZWNvbWluZyBjbGVhciBuZWFyIHRoZSB2ZXJ5IGVuZC4KCkJ5IHRoZSB0aW1lIHNoZSBmaW5pc2hlcywgdGhlIGZpcmUncyBidXJuZWQgbG93IGFuZCB0aGUgd2hvbGUgc3Rvcnkgc2l0cyBjb21wbGV0ZSBpbiB5b3VyIG1pbmQu',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_pieces' => [
            'prose'  => 'SGVhcmluZyBpdCBpbiBwaWVjZXMgbWVhbnMgdGhlIHRlbGxpbmcgdW5mb2xkcyBncmFkdWFsbHkgYWNyb3NzIHRoZSB3aG9sZSBuaWdodCwgZWFjaCBuZXcgcGllY2UgYXJyaXZpbmcgZXhhY3RseSBhcyB0aGUgcGFydCBvZiB0aGUgc2t5IGl0IGRlc2NyaWJlcyBhY3R1YWxseSByaXNlcyBhYm92ZSB0aGUgZHVuZXMsIHRoZSBzdG9yeSBhbmQgdGhlIHN0YXJzIHRoZW1zZWx2ZXMgbW92aW5nIHRvZ2V0aGVyIGluIGEgd2F5IHRoYXQgbWFrZXMgdGhlIHNjYWxlIG9mIGl0IGxhbmQgbW9yZSB2aXZpZGx5IHRoYW4gd29yZHMgYWxvbmUgY291bGQuCgpCeSB0aGUgdGltZSB0aGUgbGFzdCBwaWVjZSBhcnJpdmVzLCB0aGUgd2hvbGUgc2hhcGUgaXMgZmluYWxseSwgcHJvcGVybHkgb3ZlcmhlYWQu',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgdW51c3VhbGx5IGxhcmdlIGJsYW5rIHBhdGNoLCB0aGUgc2hhcGUgdGFraW5nIGNvbnNpZGVyYWJseSBtb3JlIG9mIHRoZSBwYWdlIHRoYW4gYW55IHlvdSd2ZSBmaWxsZWQgc28gZmFyLCBtYXRjaGluZyB0aGUgc2NhbGUgb2YgdGhlIHN0b3J5IGl0c2VsZi4gT3VtYSBQZXRyb25lbGxhIGFkZHMgaGVyIG93biBjYXJlZnVsIG5vdGUgYmVzaWRlIGl0LCBuYW1pbmcgdGhlIHRyYWRpdGlvbiBwcm9wZXJseS4KCidZb3VyIGdyZWF0LXVuY2xlIHNhdCBleGFjdGx5IHdoZXJlIHlvdSdyZSBzaXR0aW5nLCBvbmNlLCcgc2hlIHNheXMuICdUb29rIGhpbSB0aGUgd2hvbGUgbmlnaHQgdG9vLiBTb21lIHRoaW5ncyBhcmVuJ3QgbWVhbnQgdG8gYmUgcnVzaGVkLCB3aG9ldmVyJ3MgbGlzdGVuaW5nLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0b3dhcmQgdGhlIFF1aWV0IEhvdXIgYXMgdGhlIHNreSBiZWdpbnMgaXRzIHNsb3cgZmFkZSB0b3dhcmQgZGF3biwgdGhlIHJlc2VydmUncyBmYW1vdXMgZGFya25lc3MgZmluYWxseSBnaXZpbmcgd2F5IHRvIGZpcnN0IGxpZ2h0IGFsb25nIHRoZSBkdW5lIHRvcHMuIFByaXlhJ3Mgd2FpdGluZyB3aXRoIHRoZSB0aGVybW9zLCB3YXRjaGluZyB5b3VyIHRpcmVkIGJ1dCBjbGVhcmx5IG1vdmVkIGV4cHJlc3Npb24gd2l0aCByZWFsIGludGVyZXN0LgoKJ0xvbmcgb25lLCB0aGF0LCcgc2hlIHNheXMuICdPdW1hIFBldHJvbmVsbGEgZG9lc24ndCBydXNoIGZvciBhbnlvbmUuIEdvb2Qgc2lnbiwgdGhvdWdoLCB0aGF0IHNoZSBnYXZlIHlvdSB0aGUgbG9uZyB2ZXJzaW9uIGF0IGFsbC4n',
            'choices' => [
                ['text' => 'U2F5IHRoZSBsZW5ndGggbWFkZSBpdCBmZWVsIG1vcmUgaW1wb3J0YW50', 'next' => '8_end_important'],
                ['text' => 'QWRtaXQgeW91J3JlIGV4aGF1c3RlZCBidXQgZ2xhZCB5b3Ugc3RheWVkIHRoZSB3aG9sZSBuaWdodA==', 'next' => '8_end_exhausted'],
            ],
        ],
        '8_end_important' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgbGVuZ3RoIG1hZGUgaXQgZmVlbCBtb3JlIGltcG9ydGFudCwgc29tZWhvdywnIHlvdSBzYXksIHdhdGNoaW5nIHRoZSBmaXJzdCBwYWxlIGxpZ2h0IHRvdWNoIHRoZSBkdW5lIHRvcHMuICdMaWtlIHNoZSB3b3VsZG4ndCBoYXZlIGdpdmVuIHRoYXQgbXVjaCB0aW1lIHRvIHNvbWV0aGluZyBzaGUgZGlkbid0IHRoaW5rIG1hdHRlcmVkIHByb3Blcmx5LicKClByaXlhIG5vZHMsIHBhY2tpbmcgYXdheSB0aGUgbGFzdCBvZiB0aGUgdGhlcm1vcy4gJ1RoYXQncyBleGFjdGx5IHJpZ2h0LCBJIHRoaW5rLiBTb21lIHN0b3JpZXMgZWFybiB0aGVpciBsZW5ndGguIEdldCBzb21lIHJlc3Qg4oCUIHlvdSd2ZSBlYXJuZWQgaXQgdG9vLic=',
            'ending' => true,
        ],
        '8_end_exhausted' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gZXhoYXVzdGVkLCcgeW91IGFkbWl0LCBzdGlmbGluZyBhIHlhd24gZGVzcGl0ZSB0aGUgZGF3bidzIGJlYXV0eSwgJ2J1dCBnbGFkIEkgc3RheWVkIHRoZSB3aG9sZSBuaWdodCBmb3IgaXQuIFdvdWxkJ3ZlIGZlbHQgd3JvbmcsIGN1dHRpbmcgYSBzdG9yeSBsaWtlIHRoYXQgc2hvcnQuJwoKUHJpeWEgc21pbGVzLCB1c2hlcmluZyB5b3UgdG93YXJkIHRoZSBnbGlkZXIncyBzbWFsbCBzbGVlcGluZyBiZXJ0aC4gJ0dvb2QgaW5zdGluY3QuIFNsZWVwIG5vdyDigJQgd2UndmUgYSBsb25nIGZsaWdodCB0byB0aGUgbmV4dCBzdG9wLCBhbmQgU3VsaSdzIGFscmVhZHkgZGVhZCB0byB0aGUgd29ybGQgaW4gdGhlIG5vc2UgY29uZS4nIFRoZSBRdWlldCBIb3VyIGxpZnRzIG9mZiBhcyB0aGUgTmFtaWIncyByZWQgZHVuZXMgY2F0Y2ggdGhlIHZlcnkgZmlyc3QgY29sb3VyIG9mIG1vcm5pbmcu',
            'ending' => true,
        ],
    ],
];
