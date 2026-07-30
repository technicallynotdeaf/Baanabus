<?php
return [
    'id'    => 8,
    'title' => 'Something Was Different That Year',
    'color' => '#C89A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEVtcHR5IFF1YXJ0ZXIgc3RyZXRjaGVzIG91dCBpbiB0aGUgbGFyZ2VzdCB1bmJyb2tlbiBzYW5kIHNlYSBvbiBFYXJ0aCwgZHVuZXMgcm9sbGluZyB0byBldmVyeSBob3Jpem9uIHdpdGggYSBzY2FsZSB0aGF0IG1ha2VzIGV2ZW4gdGhlIE5hbWliIGZlZWwgbW9kZXN0IGJ5IGNvbXBhcmlzb24uIFByaXlhIGNoZWNrcyBoZXIgaW5zdHJ1bWVudHMgY2FyZWZ1bGx5IGJlZm9yZSBzZXR0aW5nIGRvd24uICdSZW1vdGUgZW5jYW1wbWVudCdzIGEgcHJvcGVyIHRyZWsgZnJvbSBoZXJlLCcgc2hlIHNheXMuICdUaGlzIG9uZSdzIGdvaW5nIHRvIHRha2UgcmVhbCBlZmZvcnQsIEkgdGhpbmsg4oCUIENvcndpbidzIG5vdGVzIG9uIHRoaXMgcGFnZSBnZXQgbm90aWNlYWJseSBzaGFraWVyLicKClR3byBkdW5lLXNlYSByb3V0ZXMgdG93YXJkIHRoZSBlbmNhbXBtZW50IHByZXNlbnQgdGhlbXNlbHZlczogb3ZlciBhIGNoYWluIG9mIHRvd2VyaW5nIGR1bmUgY3Jlc3RzLCBvciB0aHJvdWdoIHRoZSBsb3dlciBjb3JyaWRvcnMgYmV0d2VlbiB0aGVtLg==',
            'choices' => [
                ['text' => 'Q3Jvc3MgdGhlIHRvd2VyaW5nIGR1bmUgY3Jlc3Rz', 'next' => '2_crests'],
                ['text' => 'VGFrZSB0aGUgbG93ZXIgY29ycmlkb3JzIGJldHdlZW4gZHVuZXM=', 'next' => '2_corridors'],
            ],
        ],
        '2_crests' => [
            'prose'  => 'Q3Jvc3NpbmcgdGhlIHRvd2VyaW5nIGR1bmUgY3Jlc3RzIGlzIGV4aGF1c3RpbmcsIGJydXRhbCB3b3JrLCBlYWNoIHJpZGdlIHJldmVhbGluZyBhbm90aGVyIGlkZW50aWNhbCByaWRnZSBiZXlvbmQgaXQsIHRoZSBzaGVlciBzY2FsZSBvZiB0aGUgRW1wdHkgUXVhcnRlciBwcmVzc2luZyBpbiB3aXRoIHJlYWwsIHBoeXNpY2FsIHdlaWdodC4gWW91IHJlYWNoIHRoZSBlbmNhbXBtZW50IHByb3Blcmx5IHNwZW50LCBidXQgd2l0aCBhIHZpc2NlcmFsIHVuZGVyc3RhbmRpbmcgb2YgdGhlIHBsYWNlJ3MgcmVwdXRhdGlvbi4=',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIGVuY2FtcG1lbnQ=', 'next' => '3_shared'],
            ],
        ],
        '2_corridors' => [
            'prose'  => 'VGhlIGxvd2VyIGNvcnJpZG9ycyBiZXR3ZWVuIGR1bmVzIGFyZSBnZW50bGVyIHdhbGtpbmcsIHRob3VnaCBjb25zaWRlcmFibHkgbG9uZ2VyLCB3aW5kaW5nIGEgY2FyZWZ1bCBwYXRoIHRocm91Z2ggdGhlIHNhbmQgc2VhJ3MgdmFzdCBmb2xkcyByYXRoZXIgdGhhbiBmaWdodGluZyBkaXJlY3RseSBvdmVyIGl0cyBjcmVzdHMuIFlvdSByZWFjaCB0aGUgZW5jYW1wbWVudCBtb3JlIHNsb3dseSwgYnV0IHdpdGggc29tZXRoaW5nIGxlZnQgaW4gcmVzZXJ2ZS4=',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIGVuY2FtcG1lbnQ=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGVuY2FtcG1lbnQgaXMgc21hbGwsIHJlbW90ZSwgaG9tZSB0byBhIHNpbmdsZSBleHRlbmRlZCBmYW1pbHkgd2hvJ3ZlIHJlYWQgdGhpcyBleGFjdCBzdHJldGNoIG9mIHNreSBmb3IgZ2VuZXJhdGlvbnMuIFRoZSBlbGRlc3QsIGEgd29tYW4gbmFtZWQgWmFocmEsIGV4YW1pbmVzIHRoZSBhdGxhcydzIG5leHQgYmxhbmsgcGF0Y2ggZm9yIGEgbG9uZywgY2FyZWZ1bCBtb21lbnQsIHRoZW4gbG9va3MgdXAgYXQgeW91IHNlcmlvdXNseS4KCidUaGlzIHJpZGRsZSBpcyB0aGUgbG9uZ2VzdCBhbmQgaGFyZGVzdCBvZiB5b3VyIGdyZWF0LXVuY2xlJ3Mgd2hvbGUgYXRsYXMsJyBzaGUgc2F5cy4gJ0hpcyBoYW5kd3JpdGluZyBvbiB0aGlzIHBhZ2Ugc2hha2VzIOKAlCBkaWQgeW91IG5vdGljZT8gU29tZXRoaW5nIHdhcyBkaWZmZXJlbnQsIHRoZSB5ZWFyIGhlIGNhbWUgZm9yIHRoaXMgb25lLiBBcmUgeW91IHByZXBhcmVkIGZvciBzb21ldGhpbmcgZ2VudWluZWx5IGRpZmZpY3VsdD8n',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBwcmVwYXJlZCBmb3IgaXQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WmFocmEgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IGF0dGVtcHQgdGhlIGRpZmZpY3VsdCByaWRkbGU6IGhlYXIgaXQgdG9sZCBpbiBmdWxsIGltbWVkaWF0ZWx5LCB0cnVzdGluZyB5b3VyIG1lbW9yeSB0byBob2xkIGl0cyBtYW55IGxheWVyZWQgcGFydHMgdG9nZXRoZXIsIG9yIGhhdmUgaXQgdG9sZCB0byB5b3UgaW4gY2FyZWZ1bCBzdGFnZXMgb3ZlciBzZXZlcmFsIGhvdXJzLCBjaGVja2luZyB5b3VyIHVuZGVyc3RhbmRpbmcgYXQgZWFjaCBzdGVwIGJlZm9yZSBtb3ZpbmcgdG8gdGhlIG5leHQuCgonRWl0aGVyIGNhbiB3b3JrLCcgc2hlIHNheXMsICd0aG91Z2ggdGhpcyBvbmUncyBiZWF0ZW4gc3Ryb25nZXIgbWVtb3JpZXMgdGhhbiB5b3VycyBiZWZvcmUuIEZ1bGwgdGVsbGluZywgb3IgY2FyZWZ1bCBzdGFnZXMuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'SGVhciBpdCB0b2xkIGluIGZ1bGwgaW1tZWRpYXRlbHk=', 'next' => '5_full'],
                ['text' => 'SGF2ZSBpdCB0b2xkIGluIGNhcmVmdWwgc3RhZ2Vz', 'next' => '5_stages'],
            ],
        ],
        '5_full' => [
            'prose'  => 'SGVhcmluZyBpdCB0b2xkIGluIGZ1bGwgaW1tZWRpYXRlbHkgbWVhbnMgYSBsb25nLCBkZW5zZSwgZGVsaWJlcmF0ZWx5IGRpZmZpY3VsdCB0ZWxsaW5nLCBsYXllciBhZnRlciBsYXllciBvZiBtZWFuaW5nIGZvbGRlZCBpbnRvIGEgc2luZ2xlIHVuYnJva2VuIGFjY291bnQsIHlvdXIgY29uY2VudHJhdGlvbiBzdHJhaW5pbmcgdG8gaG9sZCBldmVyeSB0aHJlYWQgYnkgdGhlIHRpbWUgWmFocmEgZmluYWxseSwgbWVyY2lmdWxseSBmaW5pc2hlcy4KClNvbWVob3csIGFnYWluc3QgcmVhbCBkb3VidCwgdGhlIHdob2xlIHNoYXBlIG9mIGl0IGRvZXMgYWN0dWFsbHkgaG9sZCB0b2dldGhlciBpbiB5b3VyIG1pbmQu',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_stages' => [
            'prose'  => 'SGF2aW5nIGl0IHRvbGQgaW4gY2FyZWZ1bCBzdGFnZXMgbWVhbnMgWmFocmEgcGF1c2luZyBhZnRlciBlYWNoIGxheWVyZWQgcGllY2UsIGNoZWNraW5nIHBhdGllbnRseSB0aGF0IHlvdSd2ZSBhY3R1YWxseSB1bmRlcnN0b29kIGJlZm9yZSBhZGRpbmcgdGhlIG5leHQsIHRoZSByaWRkbGUncyBnZW51aW5lIGRpZmZpY3VsdHkgaGFuZGxlZCB3aXRoIHJlYWwgY2FyZSByYXRoZXIgdGhhbiByYXcgZW5kdXJhbmNlLgoKQnkgdGhlIGZpbmFsIHN0YWdlLCB5b3UgdW5kZXJzdGFuZCBub3QganVzdCB0aGUgc2hhcGUgb2YgdGhlIGNvbnN0ZWxsYXRpb24sIGJ1dCBleGFjdGx5IHdoeSBpdCB3YXMgc28gaGFyZCB0byBob2xkLg==',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMsIHlvdXIgaGFuZCBub3RpY2VhYmx5IGxlc3Mgc3RlYWR5IHRoYW4gdXN1YWwsIHRoZSBzaGVlciBkaWZmaWN1bHR5IG9mIHRoZSByaWRkbGUgbGVhdmluZyBpdHMgb3duIG1hcmsgb24geW91ciB2ZXJzaW9uIHRoZSB3YXkgaXQgYXBwYXJlbnRseSBsZWZ0IG9uZSBvbiBDb3J3aW4ncy4gWmFocmEgc3R1ZGllcyB0aGUgZmluaXNoZWQgcGFnZSBjYXJlZnVsbHkuCgonSGUgc3RydWdnbGVkIHdpdGggdGhpcyBvbmUgdG9vLCcgc2hlIHNheXMgZ2VudGx5LiAnV2hhdGV2ZXIgaGFwcGVuZWQgdG8gaGltIGF0IHNlYSwgaXQgd2FzIHdlaWdoaW5nIG9uIGhpbSBoZWF2aWx5IGJ5IHRoZSB0aW1lIGhlIHJlYWNoZWQgdXMuIFRoaXMgcGFnZSBjb3N0IGhpbSBzb21ldGhpbmcuIEl0J3MgY29zdCB5b3Ugc29tZXRoaW5nIHRvbywgSSB0aGluay4n',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2hlIG1lYW5zIGFib3V0IENvcndpbg==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'J0kgZG9uJ3Qga25vdyB0aGUgd2hvbGUgc3RvcnksJyBaYWhyYSBhZG1pdHMuICdPbmx5IHRoYXQgaGUgYXJyaXZlZCBoZXJlIHF1aWV0ZXIgdGhhbiBtb3N0IHRyYXZlbGxlcnMsIGFuZCBsZWZ0IGEgbGl0dGxlIGxpZ2h0ZXIsIHNvbWVob3csIGhhdmluZyBmaW5hbGx5IGdvdHRlbiB0aGlzIHJpZGRsZSBwcm9wZXJseSBvbnRvIHRoZSBwYWdlLiBTb21ldGltZXMgdGhlIGhhcmRlc3Qgb25lcyBkbyB0aGF0IOKAlCBjb3N0IHlvdSBnb2luZyBpbiwgZ2l2ZSB5b3Ugc29tZXRoaW5nIGJhY2sgY29taW5nIG91dC4nCgpZb3UgdHVjayB0aGUgYXRsYXMgYXdheSBjYXJlZnVsbHkgYXMgdGhlIEVtcHR5IFF1YXJ0ZXIncyB2YXN0IGRhcmtuZXNzIHByZXNzZXMgaW4gb24gZXZlcnkgc2lkZSwgUHJpeWEgd2FpdGluZyBwYXRpZW50bHkgd2l0aCB0aGUgUXVpZXQgSG91ciBhdCB0aGUgZWRnZSBvZiB0aGUgZW5jYW1wbWVudCdzIHNtYWxsIGxhbnRlcm4tbGlnaHQu',
            'choices' => [
                ['text' => 'U2F5IHRoZSBkaWZmaWN1bHR5IG1hZGUgdGhlIHJld2FyZCBmZWVsIG1vcmUgZWFybmVk', 'next' => '8_end_earned'],
                ['text' => 'U2F5IHlvdSdyZSB3b3JyaWVkIGFib3V0IHdoYXQgaGFwcGVuZWQgdG8gQ29yd2luIGF0IHNlYQ==', 'next' => '8_end_worried'],
            ],
        ],
        '8_end_earned' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgZGlmZmljdWx0eSBtYWRlIHRoZSByZXdhcmQgZmVlbCBtb3JlIGVhcm5lZCwnIHlvdSB0ZWxsIFByaXlhIG9uY2UgeW91J3JlIGJvdGggc2V0dGxlZCBiYWNrIGFib2FyZCwgdGhlIHRoZXJtb3Mgc3RlYW1pbmcgYmV0d2VlbiB5b3UuICdIYXJkZXN0IG9uZSB5ZXQsIGJ5IGEgcmVhbCBtYXJnaW4uIEJ1dCBmaW5pc2hpbmcgaXQgcHJvcGVybHkgZmVlbHMgbGlrZSBpdCBhY3R1YWxseSBtZWFucyBzb21ldGhpbmcuJwoKUHJpeWEgbm9kcyBzbG93bHksIGxvZ2dpbmcgdG9uaWdodCdzIGVudHJ5IHdpdGggcGFydGljdWxhciBjYXJlLiAnVGhhdCB0cmFja3Mgd2l0aCB3aGF0IEkgcmVtZW1iZXIgb2YgaGltIHRhbGtpbmcgYWJvdXQgdGhpcyBzdG9wLCB5ZWFycyBiYWNrLiBTYWlkIHNvbWV0aGluZyBzaW1pbGFyLCBhY3R1YWxseS4gR29vZCB0aGF0IGl0J3MgbGFuZGluZyB0aGUgc2FtZSB3YXkgZm9yIHlvdS4n',
            'ending' => true,
        ],
        '8_end_worried' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gYSBsaXR0bGUgd29ycmllZCBhYm91dCB3aGF0IGFjdHVhbGx5IGhhcHBlbmVkIHRvIGhpbSBhdCBzZWEsJyB5b3UgYWRtaXQsIHRoaW5raW5nIG9mIFphaHJhJ3MgZ2VudGxlIG9ic2VydmF0aW9uIGFib3V0IGhpcyBzaGFraWVyIGhhbmR3cml0aW5nLCBoaXMgcXVpZXRlciBhcnJpdmFsLiAnRmVlbHMgbGlrZSB0aGVyZSdzIGEgd2hvbGUgc3RvcnkgdW5kZXJuZWF0aCB0aGlzIGF0bGFzIHdlIHN0aWxsIGRvbid0IHByb3Blcmx5IHVuZGVyc3RhbmQuJwoKUHJpeWEncyBleHByZXNzaW9uIHNvYmVycyBzbGlnaHRseS4gJ1RoZXJlIGlzLCBJIHRoaW5rLiBIZSBuZXZlciB0b2xkIG1lIGVpdGhlciwgbm90IHByb3Blcmx5LiBNYXliZSB0aGF0J3MgYSB0aHJlYWQgdGhpcyBqb3VybmV5J3Mgc3RpbGwgbWVhbnQgdG8gcHVsbCBvbiwgZnVydGhlciBhbG9uZy4nIFRoZSBFbXB0eSBRdWFydGVyJ3MgdmFzdCwgc3Rhci10aGljayBkYXJrbmVzcyBzdHJldGNoZXMgb24gdW5icm9rZW4gaW4gZXZlcnkgZGlyZWN0aW9uIGFzIHRoZSBRdWlldCBIb3VyIGxpZnRzIHF1aWV0bHkgYXdheS4=',
            'ending' => true,
        ],
    ],
];
