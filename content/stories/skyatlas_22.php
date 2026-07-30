<?php
return [
    'id'    => 22,
    'title' => 'Left Behind, That Last Visit',
    'color' => '#3A6A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'U3ZhbGJhcmQncyBzdGFyaywgZ2xhY2llci1jYXJ2ZWQgbW91bnRhaW5zIHJpc2Ugd2hpdGUgYW5kIHNpbGVudCBhdCB0aGUgZWRnZSBvZiB0aGUgaGFiaXRhYmxlIHdvcmxkLCBhIHJlbW90ZSByZXNlYXJjaCBzdGF0aW9uIHRoZSBvbmx5IHNpZ24gb2YgaHVtYW4gcHJlc2VuY2UgZm9yIGEgZ2VudWluZWx5IGVub3Jtb3VzIGRpc3RhbmNlIGluIGV2ZXJ5IGRpcmVjdGlvbi4gUHJpeWEgbGFuZHMgY2FyZWZ1bGx5IG5lYXIgYSBjbHVzdGVyIG9mIHdlYXRoZXJlZCBidWlsZGluZ3MuICdUaGlzIG9uZSdzIGRpZmZlcmVudCwnIHNoZSBzYXlzIHF1aWV0bHkuICdDb3J3aW4gYXBwYXJlbnRseSBsZWZ0IHRoaXMgcmlkZGxlIGhhbGYtc29sdmVkIGhpbXNlbGYsIGRlY2FkZXMgYWdvLiBIaXMgbGFzdCByZWFsIHZveWFnZSBub3J0aCwgYmVmb3JlIHdoYXRldmVyIGhhcHBlbmVkIHRoYXQgbWFkZSBoaW0gc3RvcCBnb2luZyB0byBzZWEuJwoKVHdvIHN0YXRpb24tYXBwcm9hY2ggcm91dGVzIHByZXNlbnQgdGhlbXNlbHZlczogYWxvbmcgdGhlIGV4cG9zZWQgY29hc3RhbCBpY2UsIG9yIHRocm91Z2ggYSBzaGVsdGVyZWQgdmFsbGV5IGJlaGluZCB0aGUgc3RhdGlvbi4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZXhwb3NlZCBjb2FzdGFsIGljZQ==', 'next' => '2_ice'],
                ['text' => 'Rm9sbG93IHRoZSBzaGVsdGVyZWQgdmFsbGV5', 'next' => '2_valley'],
            ],
        ],
        '2_ice' => [
            'prose'  => 'VGhlIGV4cG9zZWQgY29hc3RhbCBpY2Ugb2ZmZXJzIGEgc3RhcmssIGJlYXV0aWZ1bCB2aWV3IG9mIHRoZSBmcm96ZW4gc2hvcmVsaW5lLCB3aW5kIGN1dHRpbmcgYml0dGVybHkgY29sZCBhY3Jvc3MgdGhlIGZsYXQgd2hpdGUgZXhwYW5zZS4gWW91IHJlYWNoIHRoZSBzdGF0aW9uIHByb3Blcmx5IGNoaWxsZWQsIHRoZSBBcmN0aWMncyByYXcgc2NhbGUgc2V0dGxpbmcgaW4gd2l0aCByZWFsLCBwaHlzaWNhbCB3ZWlnaHQu',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIHdlYXRoZXIgaHV0', 'next' => '3_shared'],
            ],
        ],
        '2_valley' => [
            'prose'  => 'VGhlIHNoZWx0ZXJlZCB2YWxsZXkgYmVoaW5kIHRoZSBzdGF0aW9uIGtlZXBzIHRoZSB3b3JzdCB3aW5kIGF0IGJheSwgZ2xhY2llci1jYXJ2ZWQgcm9jayByaXNpbmcgY2xvc2Ugb24gZWl0aGVyIHNpZGUsIHRoZSBzaWxlbmNlIGhlcmUgZGVlcGVyIGFuZCBzdHJhbmdlciB0aGFuIGFueXdoZXJlIGVsc2UgdGhpcyB3aG9sZSBqb3VybmV5IGhhcyB0YWtlbiB5b3UuIFlvdSByZWFjaCB0aGUgc3RhdGlvbiBhIGxpdHRsZSBsYXRlciwgaGF2aW5nIGZlbHQgdGhlIHZhbGxleSdzIHBhcnRpY3VsYXIsIGFuY2llbnQgc3RpbGxuZXNzLg==',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIHdlYXRoZXIgaHV0', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'QXQgdGhlIHdlYXRoZXIgaHV0LCB0aGUgcmVzZWFyY2ggY3JldyBncmVldHMgeW91IHdpdGggZ2VudWluZSB3YXJtdGgsIHRoZSBzdGF0aW9uJ3MgbGVhZGVyIOKAlCBhIHdlYXRoZXJlZCB3b21hbiBuYW1lZCBJbmdyaWQg4oCUIHB1bGxpbmcgb3V0IGFuIG9sZCBsb2dib29rIHRoZSBtb21lbnQgQ29yd2luJ3MgbmFtZSBjb21lcyB1cC4gJ0hlIHdhcyBoZXJlLCcgc2hlIGNvbmZpcm1zLiAnRGVjYWRlcyBiYWNrLiBTdGFydGVkIHRoaXMgcmlkZGxlLCBnb3QgcGFydHdheSB0aHJvdWdoLCB0aGVuIHNpbXBseSBzdG9wcGVkIGFuZCBsZWZ0IHdpdGhvdXQgZmluaXNoaW5nIGl0LiBOb2JvZHkgaGVyZSBldmVyIGtuZXcgd2h5LicKClNoZSBzdHVkaWVzIHRoZSBhdGxhcydzIGhhbGYtZmlsbGVkIGJsYW5rIHBhdGNoLiAnV2UndmUga2VwdCBoaXMgbm90ZXMgc2FmZSBhbGwgdGhpcyB0aW1lLCB3YWl0aW5nIGZvciBzb21lb25lIHRvIGFjdHVhbGx5IGNvbWUgZmluaXNoIGl0IHByb3Blcmx5LiBSZWFkeSB0byB0cnk/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSByZWFkeSB0byBmaW5pc2ggaXQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SW5ncmlkIG9mZmVycyB0d28gd2F5cyB0byBwcm9wZXJseSBmaW5pc2ggd2hhdCBDb3J3aW4gc3RhcnRlZDogd29yayBmcm9tIGhpcyBvd24gaGFsZi1maW5pc2hlZCBub3RlcyBkaXJlY3RseSwgcGlja2luZyB1cCBleGFjdGx5IHdoZXJlIGhpcyBoYW5kd3JpdGluZyBzdG9wcyBhbmQgY29tcGxldGluZyB0aGUgcmlkZGxlIGluIGhpcyBvd24gbG9naWNhbCB0aHJlYWQsIG9yIHN0YXJ0IGZyZXNoIHdpdGggdGhlIGNyZXcncyBvd24gY3VycmVudCB1bmRlcnN0YW5kaW5nLCBsZXR0aW5nIHlvdXIgdmVyc2lvbiBzdGFuZCBhbG9uZ3NpZGUgaGlzIHJhdGhlciB0aGFuIHN0cmljdGx5IGNvbnRpbnVpbmcgaXQuCgonRWl0aGVyIGhvbm91cnMgaGltIHByb3Blcmx5LCcgc2hlIHNheXMuICdGaW5pc2ggaGlzIGV4YWN0IHRocmVhZCwgb3IgYWRkIHlvdXIgb3duIGFsb25nc2lkZSBpdC4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'RmluaXNoIGhpcyBleGFjdCB0aHJlYWQ=', 'next' => '5_thread'],
                ['text' => 'QWRkIHlvdXIgb3duIHZlcnNpb24gYWxvbmdzaWRlIGhpcw==', 'next' => '5_alongside'],
            ],
        ],
        '5_thread' => [
            'prose'  => 'RmluaXNoaW5nIGhpcyBleGFjdCB0aHJlYWQgbWVhbnMgd29ya2luZyBjYXJlZnVsbHkgZnJvbSBDb3J3aW4ncyBvd24gaGFsZi1maW5pc2hlZCBub3RlcywgaGlzIGhhbmR3cml0aW5nIHNoYWtpZXIgaGVyZSB0aGFuIGFueXdoZXJlIGVsc2UgaW4gdGhlIGF0bGFzLCBwaWNraW5nIHVwIHRoZSBsb2dpY2FsIHBhdGggaGUnZCBzdGFydGVkIGFuZCBmb2xsb3dpbmcgaXQgdGhyb3VnaCB0byBpdHMgcHJvcGVyIGNvbmNsdXNpb24gZXhhY3RseSBhcyBoZSBzZWVtcyB0byBoYXZlIGludGVuZGVkLgoKSXQgZmVlbHMsIG9kZGx5LCBsaWtlIGZpbmFsbHkgY2xvc2luZyBzb21ldGhpbmcgaGUgbGVmdCBvcGVuIG9uIHB1cnBvc2Ugb3Igb3RoZXJ3aXNlLCBkZWNhZGVzIGFnby4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgQ29yd2luIGxlZnQgYmVoaW5kIGhlcmU=', 'next' => '6_shared'],
            ],
        ],
        '5_alongside' => [
            'prose'  => 'QWRkaW5nIHlvdXIgb3duIHZlcnNpb24gYWxvbmdzaWRlIGhpcyBtZWFucyB0aGUgY3JldyBzaGFyaW5nIHRoZWlyIGN1cnJlbnQgdW5kZXJzdGFuZGluZyBvZiB0aGUgcmlkZGxlLCB5b3VyIG93biBhY2NvdW50IHRha2luZyBzaGFwZSBiZXNpZGUgQ29yd2luJ3MgdW5maW5pc2hlZCBub3RlcyByYXRoZXIgdGhhbiBzdHJpY3RseSBjb21wbGV0aW5nIHRoZW0sIHR3byB2ZXJzaW9ucyDigJQgaGlzIGludGVycnVwdGVkLCB5b3VycyB3aG9sZSDigJQgc2l0dGluZyB0b2dldGhlciBvbiB0aGUgc2FtZSBwYWdlLgoKSXQgZmVlbHMgbGlrZSBhbiBob25lc3QgYWNrbm93bGVkZ21lbnQgdGhhdCBzb21lIHRoaW5ncyBnZXQgZmluaXNoZWQgZGlmZmVyZW50bHkgdGhhbiBvcmlnaW5hbGx5IGludGVuZGVkLCBhbmQgdGhhdCdzIGFscmlnaHQgdG9vLg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgQ29yd2luIGxlZnQgYmVoaW5kIGhlcmU=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'T25jZSB0aGUgY29uc3RlbGxhdGlvbiBpcyBwcm9wZXJseSBkcmF3biwgSW5ncmlkIHByb2R1Y2VzIHNvbWV0aGluZyBzbWFsbCBmcm9tIGEgbG9ja2VkIGRyYXdlciDigJQgYSB3ZWF0aGVyZWQgY29tcGFzcywgQ29yd2luJ3Mgb3duIGluaXRpYWxzIHNjcmF0Y2hlZCBmYWludGx5IGludG8gaXRzIGJyYXNzIGNhc2luZy4gJ0hlIGxlZnQgdGhpcyBiZWhpbmQsIHRoYXQgbGFzdCB2aXNpdCwnIHNoZSBzYXlzLiAnTmV2ZXIgY2FtZSBiYWNrIGZvciBpdC4gRmVsdCB3cm9uZyB0byBzZW5kIGl0IGFueXdoZXJlIHdpdGhvdXQgdGhlIHJlc3Qgb2YgdGhlIHN0b3J5IGF0dGFjaGVkLiBGZWVscyByaWdodCB0aGF0IGl0IGdvZXMgdG8geW91IG5vdy4nCgpZb3UgdHVjayB0aGUgY29tcGFzcyBjYXJlZnVsbHkgYWxvbmdzaWRlIHRoZSBsZW5zIGZyYWdtZW50cywgdGhlIGF0bGFzJ3Mgc21hbGwgY29sbGVjdGlvbiBvZiBwaHlzaWNhbCB0b2tlbnMgcXVpZXRseSwgbWVhbmluZ2Z1bGx5IGdyb3dpbmcu',
            'choices' => [
                ['text' => 'QXNrIEluZ3JpZCBpZiBzaGUga25vd3Mgd2hhdCBoYXBwZW5lZCB0byBoaW0=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'J05vdCByZWFsbHksIG5vLCcgSW5ncmlkIGFkbWl0cy4gJ0hlIHdhcyBxdWlldGVyIHRoYW4gbW9zdCB2aXNpdG9ycywgdGhhdCBsYXN0IHRpbWUuIExlZnQgcmF0aGVyIGFicnVwdGx5LCBhY3R1YWxseS4gV2UgYWx3YXlzIHdvbmRlcmVkLCBidXQgaXQgd2Fzbid0IHJlYWxseSBvdXIgcGxhY2UgdG8gYXNrLicgU2hlIHN0dWRpZXMgeW91IGtpbmRseS4gJ1doYXRldmVyIGl0IHdhcywgSSBob3BlIHRoaXMgY3Jvc3NpbmcgYnJpbmdzIHlvdSBhIGxpdHRsZSBjbG9zZXIgdG8gdW5kZXJzdGFuZGluZyBpdCBwcm9wZXJseSwgYmVmb3JlIHRoZSBqb3VybmV5IGVuZHMuJwoKWW91IHRoYW5rIGhlciBhbmQgc3RlcCBiYWNrIG91dCBpbnRvIFN2YWxiYXJkJ3Mgc3RhcmssIHNpbGVudCBjb2xkLCB0aGUgY29tcGFzcydzIHNtYWxsIHdlaWdodCBzaXR0aW5nIHN0cmFuZ2VseSBoZWF2eSBpbiB5b3VyIHBvY2tldC4=',
            'choices' => [
                ['text' => 'U2F5IHRoZSBjb21wYXNzIGZlZWxzIGxpa2UgdGhlIGNsb3Nlc3QgdGhpbmcgeWV0IHRvIGFjdHVhbGx5IGtub3dpbmcgaGlt', 'next' => '8_end_knowing'],
                ['text' => 'U2F5IHlvdSdyZSBtb3JlIGFueGlvdXMgdGhhbiBldmVyIHRvIGxlYXJuIHRoZSB3aG9sZSB0cnV0aA==', 'next' => '8_end_anxious'],
            ],
        ],
        '8_end_knowing' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGlzIGNvbXBhc3MgZmVlbHMgbGlrZSB0aGUgY2xvc2VzdCB0aGluZyB5ZXQgdG8gYWN0dWFsbHkga25vd2luZyBoaW0sJyB5b3UgdGVsbCBQcml5YSBvbmNlIHlvdSdyZSBib3RoIGJhY2sgYWJvYXJkLCB0dXJuaW5nIGl0IGNhcmVmdWxseSBpbiB5b3VyIGZpbmdlcnMuICdOb3QganVzdCBoaXMgaGFuZHdyaXRpbmcgb3IgaGlzIGNhcmVmdWwgcmlkZGxlcy4gU29tZXRoaW5nIGhlIGFjdHVhbGx5IGhlbGQsIHJpZ2h0IGJlZm9yZSB3aGF0ZXZlciBoYXBwZW5lZCB0aGF0IGNoYW5nZWQgZXZlcnl0aGluZy4nCgpQcml5YSBzdHVkaWVzIHRoZSBjb21wYXNzIHdpdGggcmVhbCByZXZlcmVuY2UuICdUaGF0J3MgYSBnb29kIHdheSB0byB0aGluayBhYm91dCBpdC4gV2UncmUgY2xvc2UgdG8gdGhlIGVuZCBub3cuIE1heWJlIHRoZSBsYXN0IHN0b3BzIGZpbmFsbHkgZXhwbGFpbiB0aGUgcmVzdC4n',
            'ending' => true,
        ],
        '8_end_anxious' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gbW9yZSBhbnhpb3VzIHRoYW4gZXZlciB0byBsZWFybiB0aGUgd2hvbGUgdHJ1dGgsJyB5b3UgYWRtaXQsIHRoZSBjb21wYXNzJ3Mgc21hbGwgd2VpZ2h0IHN1ZGRlbmx5IGZlZWxpbmcgY29uc2lkZXJhYmx5IGhlYXZpZXIgdGhhbiBpdHMgYWN0dWFsIHNpemUuICdFdmVyeSBzdG9wIGFkZHMgYW5vdGhlciBwaWVjZSBvZiBoaW0sIGJ1dCBuZXZlciBxdWl0ZSB0aGUgd2hvbGUgcGljdHVyZS4gRmVlbHMgbGlrZSBpdCdzIGJ1aWxkaW5nIHRvd2FyZCBzb21ldGhpbmcuJwoKUHJpeWEgZG9lc24ndCBkaXNtaXNzIHRoZSBhbnhpZXR5LiAnSXQgcHJvYmFibHkgaXMuIFR3byBzdG9wcyBsZWZ0LiBXaGF0ZXZlcidzIHdhaXRpbmcsIHdlJ2xsIGdldCB0aGVyZSB0b2dldGhlci4nIFRoZSBRdWlldCBIb3VyIGxpZnRzIG9mZiBmcm9tIFN2YWxiYXJkJ3Mgc3Rhcmsgd2hpdGUgc2lsZW5jZSwgZ2xhY2llcnMgYW5kIGRhcmsgd2F0ZXIgc3RyZXRjaGluZyBvdXQgYmVuZWF0aCB0aGUgZW5kbGVzcyBBcmN0aWMgdHdpbGlnaHQu',
            'ending' => true,
        ],
    ],
];
