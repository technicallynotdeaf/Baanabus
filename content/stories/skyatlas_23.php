<?php
return [
    'id'    => 23,
    'title' => 'Ours To Work Out',
    'color' => '#1A3A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIG9wZW4gUGFjaWZpYyBzdHJldGNoZXMgb3V0IGluIGV2ZXJ5IGRpcmVjdGlvbiB3aXRoIG5vIGxhbmRmYWxsIGFueXdoZXJlIG5lYXIsIHRoZSBRdWlldCBIb3VyIGRyaWZ0aW5nIHF1aWV0bHkgb24gaXRzIHNvbGFyIHNhaWxzIHRocm91Z2ggYSBsb25nLCB1bmh1cnJpZWQgbmlnaHQgY3Jvc3NpbmcgdG93YXJkIGhvbWUuIFRoZXJlJ3Mgbm8gbG9jYWwga2VlcGVyIHdhaXRpbmcgb3V0IGhlcmUsIG5vIHZpbGxhZ2Ugb3IgY2FtcCBvciByZXNlYXJjaCBzdGF0aW9uIOKAlCBqdXN0IHRoZSBhdGxhcywgdGhlIGNyZXcsIGFuZCBhIHNlY29uZC10by1sYXN0IGJsYW5rIHBhdGNoIHRoYXQgUHJpeWEgc2F5cyBuZWVkcyB0byBiZSBzb2x2ZWQgZGlmZmVyZW50bHkgdGhpcyB0aW1lLgoKJ05vIG9uZSB0byB0ZWxsIHVzIHRoaXMgb25lLCcgc2hlIHNheXMsIHNldHRsaW5nIGluIGJlc2lkZSB5b3UuICdUaGlzIG9uZSdzIG91cnMgdG8gd29yayBvdXQuIEV2ZXJ5dGhpbmcgd2UndmUgbGVhcm5lZCBzbyBmYXIsIGFsbCBpbiBvbmUgcGxhY2UuJw==',
            'choices' => [
                ['text' => 'QmVnaW4gd29ya2luZyB0aHJvdWdoIGl0IHRvZ2V0aGVy', 'next' => '2_shared'],
            ],
        ],
        '2_shared' => [
            'prose'  => 'WW91IHNwcmVhZCB0aGUgYXRsYXMgb3BlbiBvbiB5b3VyIGtuZWVzLCBTdWxpIGN1cmxpbmcgY2xvc2UgZm9yIHdhcm10aCBhcyB0aGUgbmlnaHQgZGVlcGVucyBwcm9wZXJseSBhcm91bmQgdGhlIHNtYWxsLCBzb2xhci13aW5nZWQgZ2xpZGVyLiBQcml5YSBwdWxscyBvdXQgaGVyIHdvcm4gbm90ZWJvb2ssIGRlY2FkZXMgb2YgQ29yd2luJ3Mgb3duIGNhcmVmdWwgZW50cmllcyBmaWxsaW5nIGl0cyBlYXJsaWVyIHBhZ2VzIGFsb25nc2lkZSBoZXIgb3duIG1vcmUgcmVjZW50IG9uZXMuCgonTGV0J3MgYWN0dWFsbHkgdGhpbmsgYWJvdXQgdGhpcyBwcm9wZXJseSwnIHNoZSBzYXlzLiAnRXZlcnkgc3RvcCB0YXVnaHQgdXMgc29tZXRoaW5nLiBNYXliZSB0aGUgdHJpY2sgaGVyZSBpcyBwdXR0aW5nIGFsbCBvZiBpdCB0b2dldGhlciwgcmF0aGVyIHRoYW4gd2FpdGluZyBmb3Igc29tZW9uZSBlbHNlIHRvIGhhbmQgdXMgdGhlIGFuc3dlci4n',
            'choices' => [
                ['text' => 'U3RhcnQgd29ya2luZyB0aHJvdWdoIHdoYXQgeW91J3ZlIGxlYXJuZWQ=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WW91IHdvcmsgdGhyb3VnaCBpdCBzbG93bHksIHRvZ2V0aGVyLCBkcmF3aW5nIG9uIGV2ZXJ5dGhpbmcgdGhlIGpvdXJuZXkgaGFzIGFjdHVhbGx5IHRhdWdodCB5b3Ug4oCUIEVzdGViYW4ncyBwYXRpZW50IGxpc3RlbmluZywgL0t1bnRhJ3MgY2FyZWZ1bCBwYWNlLCBEYWxlJ3Mgc2lsZW5jZSwgSGVtaSdzIHVuZGVyc3RhbmRpbmcgdGhhdCBzb21lIHNoYXBlcyBhcmUgcGF0aHMgcmF0aGVyIHRoYW4gcGljdHVyZXMsIMOBaWxlJ3MgcGF0aWVuY2Ugd2l0aCBhbiB1bmNvb3BlcmF0aXZlIHNreS4gRWFjaCBsZXNzb24gdHVybnMgb3V0IHRvIG1hdHRlciBoZXJlLCBsYXllcmVkIHRvZ2V0aGVyIHJhdGhlciB0aGFuIHNlcGFyYXRlbHkuCgpUaGUgY29uc3RlbGxhdGlvbiB0aGF0IGZpbmFsbHkgZW1lcmdlcyBpc24ndCBoYW5kZWQgdG8geW91IGJ5IGFueW9uZS4gSXQncyByZWFzb25lZCBvdXQsIHByb3Blcmx5LCBmcm9tIHRoZSB3aG9sZSBhY2N1bXVsYXRlZCBqb3VybmV5Lg==',
            'terminal' => true,
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGRyYXcgaXQgaW50byB0aGUgYXRsYXMncyBzZWNvbmQtdG8tbGFzdCBibGFuayBwYXRjaCB5b3Vyc2VsZiwgbm8gbG9jYWwga2VlcGVyJ3Mgbm90ZSBiZXNpZGUgaXQgdGhpcyB0aW1lIOKAlCBqdXN0IHlvdXIgb3duIG5hbWUsIGFuZCB0aGUgc2ltcGxlIHRydXRoIHRoYXQgdGhpcyBvbmUgd2FzIHdvcmtlZCBvdXQgZnJvbSBldmVyeXRoaW5nIHRoZSB3aG9sZSBqb3VybmV5IHRhdWdodCB5b3UsIHJhdGhlciB0aGFuIHRvbGQgdG8geW91IGJ5IGFueSBzaW5nbGUgcGVyc29uLgoKUHJpeWEgc3R1ZGllcyB0aGUgZmluaXNoZWQgcGFnZSBmb3IgYSBsb25nLCBxdWlldCBtb21lbnQuICdUaGF0J3MgcmF0aGVyIGRpZmZlcmVudCBmcm9tIGV2ZXJ5IG90aGVyIHBhZ2UgaW4gdGhpcyBib29rLCcgc2hlIHNheXMuICdGZWVscyBsaWtlIHlvdSd2ZSBhY3R1YWxseSBiZWNvbWUgcGFydCBvZiB3aGF0IHRoZSBhdGxhcyBpcyB0ZWFjaGluZywgbm90IGp1c3Qgc29tZW9uZSBmaWxsaW5nIGl0IGluLic=',
            'choices' => [
                ['text' => 'U2l0IHdpdGggdGhhdCB0aG91Z2h0IGEgd2hpbGU=', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'WW91IHNpdCB3aXRoIHRoYXQgdGhvdWdodCBmb3IgYSBsb25nIHdoaWxlLCB0aGUgUGFjaWZpYydzIHZhc3QsIGRhcmsgc3dlbGxzIHJvbGxpbmcgc3RlYWRpbHkgYmVuZWF0aCB0aGUgZ2xpZGVyLCBvbmx5IG9uZSBibGFuayBwYXRjaCBsZWZ0IGluIHRoZSBlbnRpcmUgYXRsYXMgbm93IOKAlCB0aGUgb25lIGF0IGhvbWUsIHRoZSBvbmUgQ29yd2luIGFwcGFyZW50bHkgbWVhbnQgdG8gYmUgZm91bmQgbGFzdCBvZiBhbGwuIFN1bGkgc3RpcnMgc2xpZ2h0bHksIGVhcnMgdHdpdGNoaW5nIHRvd2FyZCB0aGUgaG9yaXpvbiBhcyB0aG91Z2ggc2hlIGNhbiBhbHJlYWR5IHNlbnNlIHNvbWV0aGluZyB3YWl0aW5nIHRoZXJlLgoKJ09uZSBsZWZ0LCcgUHJpeWEgc2F5cyBzb2Z0bHkuICdBbmQgaXQncyBub3QgZXZlbiBhIGNvbnN0ZWxsYXRpb24sIGZyb20gd2hhdCBoaXMgbm90ZXMgc2F5LiBTb21ldGhpbmcgZWxzZSBlbnRpcmVseS4n',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2hlIHRoaW5rcyBpdCBhY3R1YWxseSBpcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J0Rvbid0IGtub3cgZXhhY3RseSwnIFByaXlhIGFkbWl0cy4gJ0p1c3QgdGhhdCBoaXMgbm90ZXMgY2FsbCBpdCBhIHBsYWNlIGFuZCBhIGRhdGUsIG5vdCBhIHNoYXBlLiBXaGF0ZXZlciB0aGF0IG1lYW5zLCBJIHN1c3BlY3Qgd2UncmUgbm90IG1lYW50IHRvIGd1ZXNzIGl0IHByb3Blcmx5IHVudGlsIHdlJ3JlIGFjdHVhbGx5IHN0YW5kaW5nIHRoZXJlLicgU2hlIGNsb3NlcyBoZXIgbm90ZWJvb2sgZ2VudGx5LCBkZWNhZGVzIG9mIG1hdGNoaW5nIGVudHJpZXMgZmluYWxseSBuZWFyaW5nIHRoZWlyIG93biBxdWlldCBjb21wbGV0aW9uLgoKVGhlIFF1aWV0IEhvdXIgc2FpbHMgb24gdGhyb3VnaCB0aGUgZGFyaywgc29sYXIgd2luZ3MgY2F0Y2hpbmcgZmFpbnQgc3RhcmxpZ2h0LCBub3RoaW5nIGJ1dCBvY2VhbiBpbiBldmVyeSBkaXJlY3Rpb24gdW50aWwgbW9ybmluZy4=',
            'choices' => [
                ['text' => 'U2F5IHlvdSBmZWVsIHJlYWR5IGZvciB3aGF0ZXZlcidzIHdhaXRpbmcgYXQgaG9tZQ==', 'next' => '7_end_ready'],
                ['text' => 'QWRtaXQgdGhlIG5vdC1rbm93aW5nIGlzIG1ha2luZyB5b3UgbmVydm91cw==', 'next' => '7_end_nervous'],
            ],
        ],
        '7_end_ready' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGZlZWwgcmVhZHkgZm9yIHdoYXRldmVyJ3Mgd2FpdGluZyBhdCBob21lLCcgeW91IHNheSwgd2F0Y2hpbmcgdGhlIFBhY2lmaWMncyBkYXJrIHN3ZWxscyByb2xsIG9uIHN0ZWFkaWx5IGJlbmVhdGggeW91LiAnRXZlcnkgc3RvcCdzIGFkZGVkIHNvbWV0aGluZy4gRmVlbHMgbGlrZSBJJ3ZlIGFjdHVhbGx5IGVhcm5lZCB3aGF0ZXZlciB0aGlzIGxhc3QgcGFnZSB0dXJucyBvdXQgdG8gYmUuJwoKUHJpeWEgc21pbGVzLCBzb21ldGhpbmcgd2FybSBhbmQgcXVpZXRseSBwcm91ZCBpbiBpdC4gJ0dvb2QuIFRoYXQncyBleGFjdGx5IGhvdyB5b3Ugc2hvdWxkIGZlZWwsIHRoaXMgY2xvc2UgdG8gdGhlIGVuZC4gR2V0IHNvbWUgcmVzdCDigJQgaG9tZSdzIG5vdCBmYXIgbm93LicgVGhlIFF1aWV0IEhvdXIgc2FpbHMgb24gdGhyb3VnaCB0aGUgbmlnaHQsIFN1bGkgY3VybGVkIHdhcm0gYW5kIGNvbnRlbnQgYmV0d2VlbiB5b3UgYm90aC4=',
            'ending' => true,
        ],
        '7_end_nervous' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgbm90LWtub3dpbmcgaXMgbWFraW5nIG1lIG5lcnZvdXMsJyB5b3UgYWRtaXQsIHR1cm5pbmcgdGhlIGF0bGFzIG92ZXIgc2xvd2x5IGluIHlvdXIgaGFuZHMuICdFdmVyeSBvdGhlciBwYWdlIGhhZCBhIHNoYXBlIHRvIGZpbmQuIFRoaXMgbGFzdCBvbmUncyBqdXN0Li4uIGEgcGxhY2UgYW5kIGEgZGF0ZS4gRmVlbHMgbGlrZSBpdCBjb3VsZCBiZSBhbnl0aGluZy4nCgpQcml5YSBkb2Vzbid0IGRpc21pc3MgdGhlIG5lcnZlcy4gJ0ZhaXIgZW5vdWdoLiBTb21lIGVuZGluZ3MgZG9uJ3QgYW5ub3VuY2UgdGhlbXNlbHZlcyBpbiBhZHZhbmNlLiBNaWdodCBqdXN0IGhhdmUgdG8gdHJ1c3QgdGhhdCB3aGF0ZXZlciBpdCBpcywgeW91J2xsIGJlIHJlYWR5IHdoZW4geW91J3JlIGFjdHVhbGx5IHN0YW5kaW5nIHRoZXJlLicgVGhlIFF1aWV0IEhvdXIgc2FpbHMgb24gcXVpZXRseSB0aHJvdWdoIHRoZSBkYXJrIFBhY2lmaWMgbmlnaHQsIGhvbWUgZHJhd2luZyBzbG93bHksIHN0ZWFkaWx5IGNsb3Nlci4=',
            'ending' => true,
        ],
    ],
];
