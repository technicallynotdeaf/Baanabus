<?php
return [
    'id'    => 12,
    'title' => 'Half In An Old Dialect',
    'color' => '#4A7A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UnVyYWwgSG9ra2FpZG8gc3ByZWFkcyBvdXQgaW4gcXVpZXQgZmFybWxhbmQgYmVuZWF0aCBhIHNreSBhbHJlYWR5IGZhbW91cywgbG9jYWxseSwgZm9yIGl0cyBkYXJrbmVzcyBvbmNlIHRoZSBzbWFsbCB0b3ducycgbGlnaHRzIHByb3Blcmx5IGZhZGUuIFByaXlhIGxhbmRzIG5lYXIgYSBtb2Rlc3Qgd29vZGVuIGh1dCwgYSBoYW5kLXBhaW50ZWQgc2lnbiBuZWFyYnkgbWFya2luZyBpdCBhcyBob21lIHRvIGEgcnVyYWwgc3RhcmdhemluZyBjbHViLiAnTmljZSBidW5jaCwgZnJvbSB3aGF0IENvcndpbidzIG5vdGVzIHNheSwnIHNoZSBtZW50aW9ucy4gJ0RlbGlnaHRlZCBieSB0aGUgYXRsYXMsIGFwcGFyZW50bHksIGxhc3QgdGltZSByb3VuZC4nCgpUd28gcnVyYWwgcm91dGVzIHRvd2FyZCB0aGUgY2x1YiBodXQgcHJlc2VudCB0aGVtc2VsdmVzOiBhbG9uZyB0aGUgcXVpZXQgZmFybSByb2FkLCBvciB0aHJvdWdoIGEgc3RhbmQgb2YgYmlyY2ggdHJlZXMgYm9yZGVyaW5nIHRoZSBwcm9wZXJ0eS4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgcXVpZXQgZmFybSByb2Fk', 'next' => '2_road'],
                ['text' => 'Q3V0IHRocm91Z2ggdGhlIGJpcmNoIHRyZWVz', 'next' => '2_birch'],
            ],
        ],
        '2_road' => [
            'prose'  => 'VGhlIHF1aWV0IGZhcm0gcm9hZCBydW5zIHN0cmFpZ2h0IGFuZCBlYXN5IGJldHdlZW4gZmllbGRzLCB0aGUgZXZlbmluZydzIGZpcnN0IHN0YXJzIGFscmVhZHkgdmlzaWJsZSBpbiBhIHNreSByZW1hcmthYmx5IGRhcmsgZm9yIGhvdyBjbG9zZSB5b3UgYWN0dWFsbHkgYXJlIHRvIHRvd24uIFlvdSByZWFjaCB0aGUgaHV0IHByb21wdGx5LCBsYXVnaHRlciBhbmQgd2FybSBsaWdodCBzcGlsbGluZyBmcm9tIGl0cyB3aW5kb3dzLg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGh1dA==', 'next' => '3_shared'],
            ],
        ],
        '2_birch' => [
            'prose'  => 'Q3V0dGluZyB0aHJvdWdoIHRoZSBzdGFuZCBvZiBiaXJjaCB0cmVlcyBpcyBhIHF1aWV0ZXIsIG1vcmUgYXRtb3NwaGVyaWMgcm91dGUsIHBhbGUgdHJ1bmtzIGNhdGNoaW5nIHRoZSBsYXN0IG9mIHRoZSBldmVuaW5nIGxpZ2h0LCB0aGUgaHV0J3Mgd2FybSB3aW5kb3dzIHZpc2libGUgdGhyb3VnaCB0aGUgdGhpbm5pbmcgYnJhbmNoZXMgYWhlYWQuIFlvdSBhcnJpdmUgYSBsaXR0bGUgbGF0ZXIsIGhhdmluZyBwcm9wZXJseSBlbmpveWVkIHRoZSB3YWxrLg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGh1dA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGNsdWIncyBtZW1iZXJzIOKAlCBhIGxpdmVseSBtaXggb2YgYWdlcywgZnJvbSB0ZWVuYWdlcnMgdG8gcmV0aXJlZXMg4oCUIGdyZWV0IHlvdSB3aXRoIGdlbnVpbmUsIGRlbGlnaHRlZCBlbnRodXNpYXNtIHRoZSBtb21lbnQgdGhlIGF0bGFzIGNvbWVzIG91dCwgcGFzc2luZyBpdCBjYXJlZnVsbHkgYmV0d2VlbiB0aGVtIHdpdGggcmVhbCByZXZlcmVuY2UuIFRoZSBlbGRlc3QgbWVtYmVyLCBhIHJldGlyZWQgdGVhY2hlciBuYW1lZCBIb3NoaW5vLCBleGFtaW5lcyB0aGUgbmV4dCBibGFuayBwYXRjaCBjbG9zZWx5LCB0aGVuIGZyb3ducyB0aG91Z2h0ZnVsbHkuCgonVGhpcyByaWRkbGUgaXMgaGFsZiBpbiBhbiBvbGQgZGlhbGVjdCwnIHNoZSBzYXlzLiAnTm90IGV2ZXJ5b25lIGhlcmUgc3BlYWtzIGl0IGZsdWVudGx5IGFueW1vcmUuIFdlJ2xsIG5lZWQgdG8gd29yayB0aHJvdWdoIGl0IHRvZ2V0aGVyLCBwcm9wZXJseSwgYXMgYSBncm91cC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWdyZWUgdG8gd29yayB0aHJvdWdoIGl0IHRvZ2V0aGVy', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGNsdWIgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IHVudGFuZ2xlIHRoZSBkaWFsZWN0IHRvZ2V0aGVyOiBnYXRoZXIgZXZlcnlvbmUgYXJvdW5kIHRoZSBodXQncyBjZW50cmFsIHRhYmxlLCBjcm9zcy1yZWZlcmVuY2luZyBvbGQgZGljdGlvbmFyaWVzIGFuZCBlYWNoIG1lbWJlcidzIHBhcnRpYWwgbWVtb3J5IGxpbmUgYnkgY2FyZWZ1bCBsaW5lLCBvciBoYXZlIHRoZSB0d28gZWxkZXN0IG1lbWJlcnMsIHdobyByZW1lbWJlciB0aGUgbW9zdCwgc2ltcGx5IHRyYW5zbGF0ZSBpdCBhbG91ZCBiZXR3ZWVuIHRoZW1zZWx2ZXMgd2hpbGUgZXZlcnlvbmUgZWxzZSBsaXN0ZW5zLgoKJ0VpdGhlciBnZXRzIHVzIHRoZXJlIHByb3Blcmx5LCcgSG9zaGlubyBzYXlzLiAnV2hvbGUgZ3JvdXAgd29ya2luZyBpdCwgb3IgdGhlIHR3byBvZiB1cyBkb2luZyB0aGUgaGVhdnkgbGlmdGluZy4gWW91ciBjaG9pY2UsIHJlYWxseSDigJQgeW91J3JlIHRoZSBndWVzdC4n',
            'choices' => [
                ['text' => 'R2F0aGVyIGV2ZXJ5b25lIGFyb3VuZCB0aGUgdGFibGU=', 'next' => '5_table'],
                ['text' => 'TGV0IHRoZSB0d28gZWxkZXN0IG1lbWJlcnMgdHJhbnNsYXRl', 'next' => '5_eldest'],
            ],
        ],
        '5_table' => [
            'prose'  => 'R2F0aGVyaW5nIGV2ZXJ5b25lIGFyb3VuZCB0aGUgdGFibGUgbWVhbnMgYSBsaXZlbHksIGNvbGxhYm9yYXRpdmUgZWZmb3J0LCBkaWN0aW9uYXJpZXMgcGFzc2VkIGhhbmQgdG8gaGFuZCwgeW91bmdlciBtZW1iZXJzIGNvbnRyaWJ1dGluZyBtb2Rlcm4gcmVmZXJlbmNlIHBvaW50cyB3aGlsZSBvbGRlciBvbmVzIHN1cHBseSBoYWxmLXJlbWVtYmVyZWQgcGhyYXNlcywgdGhlIHdob2xlIGRpYWxlY3Qgc2xvd2x5LCBwcm9wZXJseSByZWNvbnN0cnVjdGVkIHRocm91Z2ggZ2VudWluZSB0ZWFtd29yay4KCkJ5IHRoZSBlbmQsIHRoZSB3aG9sZSBjbHViIGZlZWxzIGEgcmVhbCwgc2hhcmVkIG93bmVyc2hpcCBvdmVyIHRoZSBmaW5pc2hlZCB0cmFuc2xhdGlvbi4=',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_eldest' => [
            'prose'  => 'TGV0dGluZyB0aGUgdHdvIGVsZGVzdCBtZW1iZXJzIHRyYW5zbGF0ZSBtZWFucyBhIHF1aWV0ZXIsIG1vcmUgaW50aW1hdGUgcHJvY2VzcywgSG9zaGlubyBhbmQgaGVyIG9sZCBmcmllbmQgbXVybXVyaW5nIGJhY2sgYW5kIGZvcnRoIGJldHdlZW4gdGhlbXNlbHZlcywgdGVzdGluZyBwaHJhc2VzIGFnYWluc3Qgc2hhcmVkIG1lbW9yeSwgdGhlIHJlc3Qgb2YgdGhlIGNsdWIgbGlzdGVuaW5nIHdpdGggcmVhbCByZXNwZWN0IGZvciBhIGZsdWVuY3kgdGhhdCBjbGVhcmx5LCBxdWlldGx5LCB3b24ndCBsYXN0IGZvcmV2ZXIuCgpCeSB0aGUgZW5kLCBzb21ldGhpbmcgdmFsdWFibGUgZmVlbHMgcHJvcGVybHkgcHJlc2VydmVkLCBub3QganVzdCB0cmFuc2xhdGVkLg==',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMncyBibGFuayBwYXRjaCwgdGhlIGNsdWIgY3Jvd2RpbmcgYXJvdW5kIHdpdGggZ2VudWluZSBkZWxpZ2h0IGF0IHdhdGNoaW5nIHRoZSBwYWdlIGZpbmFsbHkgY29tcGxldGUgaXRzZWxmLiBIb3NoaW5vIGFkZHMgYSBjYXJlZnVsIG5vdGUgaW4gYm90aCB0aGUgb2xkIGRpYWxlY3QgYW5kIGl0cyBtb2Rlcm4gdHJhbnNsYXRpb24sIGVuc3VyaW5nIG5vdGhpbmcgYWJvdXQgdGhlIG1vbWVudCBnZXRzIHByb3Blcmx5IGxvc3QuCgonWW91ciBncmVhdC11bmNsZSB3b3VsZCBiZSBwbGVhc2VkLCcgc2hlIHNheXMsIHNtaWxpbmcuICdIZSBhbHdheXMgc2FpZCBza3ktbG9yZSBkaWVzIHF1aWV0bHkgaWYgbm9ib2R5IGJvdGhlcnMgd3JpdGluZyBpdCBkb3duIHByb3Blcmx5LCBpbiBib3RoIG9sZCB3b3JkcyBhbmQgbmV3IG9uZXMuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgdGhlIGNsdWIgYW5kIHN0YXJ0IGJhY2s=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHN0ZXAgYmFjayBvdXQgaW50byB0aGUgcXVpZXQgSG9ra2FpZG8gbmlnaHQsIHRoZSBjbHViJ3Mgd2FybSBsYXVnaHRlciBzdGlsbCBhdWRpYmxlIGJlaGluZCB5b3UsIHRoZSBza3kgcHJvcGVybHkgZGFyayBub3cgYW5kIHRoaWNrIHdpdGggc3RhcnMgZGVzcGl0ZSBob3cgY2xvc2UgeW91IGFyZSB0byBvcmRpbmFyeSBmYXJtbGFuZC4gUHJpeWEncyB3YWl0aW5nIHdpdGggdGhlIHRoZXJtb3MsIGNsZWFybHkgaGF2aW5nIGVuam95ZWQgd2F0Y2hpbmcgdGhlIHdob2xlIGNvbGxhYm9yYXRpdmUgcHJvY2VzcyBmcm9tIGEgZGlzdGFuY2UuCgonR29vZCBncm91cCwgdGhhdCwnIHNoZSBzYXlzLiAnTmljZSwgc2VlaW5nIGEgd2hvbGUgcm9vbSBhY3R1YWxseSBjYXJlIGFib3V0IGdldHRpbmcgc29tZXRoaW5nIGV4YWN0bHkgcmlnaHQuJw==',
            'choices' => [
                ['text' => 'U2F5IHRoZSBjb2xsYWJvcmF0aXZlIGVmZm9ydCBmZWx0IGxpa2UgaXRzIG93biBraW5kIG9mIHRyYWRpdGlvbg==', 'next' => '8_end_collaborative'],
                ['text' => 'U2F5IHlvdSdyZSBzdHJ1Y2sgYnkgaG93IGZyYWdpbGUgdGhhdCBvbGQgZGlhbGVjdCBhY3R1YWxseSBpcw==', 'next' => '8_end_fragile'],
            ],
        ],
        '8_end_collaborative' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgY29sbGFib3JhdGl2ZSBlZmZvcnQgZmVsdCBsaWtlIGl0cyBvd24ga2luZCBvZiB0cmFkaXRpb24sJyB5b3Ugc2F5LCB0aGlua2luZyBvZiBkaWN0aW9uYXJpZXMgYW5kIGhhbGYtcmVtZW1iZXJlZCBwaHJhc2VzIHBhc3NlZCBoYW5kIHRvIGhhbmQgYXJvdW5kIHRoZSB0YWJsZS4gJ05vdCBqdXN0IHByZXNlcnZpbmcgYW4gb2xkIG9uZS4gQnVpbGRpbmcgc29tZXRoaW5nIG5ld2x5IHNoYXJlZCwgcmlnaHQgdGhlcmUsIHRvZ2V0aGVyLicKClByaXlhIG5vZHMsIHBsZWFzZWQuICdUaGF0J3MgYSBsb3ZlbHkgd2F5IHRvIHB1dCBpdC4gR29vZCB0aGluZyB0byBjYXJyeSB3aXRoIHlvdSwgdGhpcyBmYXIgaW50byB0aGUgam91cm5leS4n',
            'ending' => true,
        ],
        '8_end_fragile' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gc3RydWNrIGJ5IGhvdyBmcmFnaWxlIHRoYXQgb2xkIGRpYWxlY3QgYWN0dWFsbHkgaXMsJyB5b3UgYWRtaXQsIHRoaW5raW5nIG9mIEhvc2hpbm8gYW5kIGhlciBvbGQgZnJpZW5kJ3MgY2FyZWZ1bCwgcXVpZXQgZmx1ZW5jeS4gJ0ZlZWxzIGxpa2Ugc29tZXRoaW5nIHRoYXQgY291bGQganVzdCB2YW5pc2gsIGEgZ2VuZXJhdGlvbiBmcm9tIG5vdywgaWYgbm9ib2R5IGtlZXBzIHdyaXRpbmcgaXQgZG93biBwcm9wZXJseS4nCgpQcml5YSdzIGV4cHJlc3Npb24gc29iZXJzLiAnVGhhdCdzIGV4YWN0bHkgdGhlIGtpbmQgb2YgdGhpbmcgdGhpcyBhdGxhcyBpcyBxdWlldGx5IHRyeWluZyB0byBkbyBzb21ldGhpbmcgYWJvdXQsIEkgdGhpbmsuIFNtYWxsLCBjYXJlZnVsIHByZXNlcnZhdGlvbiwgcGFnZSBieSBwYWdlLicgVGhlIFF1aWV0IEhvdXIgbGlmdHMgb2ZmIGludG8gSG9ra2FpZG8ncyBjbGVhciwgc3Rhci10aGljayBuaWdodCwgZmFybWxhbmQgc2hyaW5raW5nIGdlbnRseSBiZWxvdy4=',
            'ending' => true,
        ],
    ],
];
