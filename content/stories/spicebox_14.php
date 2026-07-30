<?php
return [
    'id'    => 14,
    'title' => 'This Lesson Isn\'t Actually About You',
    'color' => '#5A3A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'T2F4YWNhJ3MgbWFya2V0cyBvdmVyZmxvdyB3aXRoIGRyaWVkIGNoaWxpZXMgaW4gZXZlcnkgc2hhZGUgZnJvbSBkZWVwIHJlZCB0byBuZWFyLWJsYWNrLCBjYWNhbyBiZWFucyBzdGFja2VkIGFsb25nc2lkZSB0aGVtIGluIGEgY29tYmluYXRpb24gdGhhdCdzIGNsZWFybHkgYmVlbiBjb25zaWRlcmVkIHNhY3JlZCBoZXJlIGZhciBsb25nZXIgdGhhbiAnZnVzaW9uIGN1aXNpbmUnIGhhcyBiZWVuIGEgcGhyYXNlIGFueXdoZXJlIGVsc2UuIEJydW5vIG1vdmVzIHRocm91Z2ggaXQgd2l0aCByZWFsLCBodW5ncnkgYW50aWNpcGF0aW9uLgoKVHdvIG1hcmtldCByb3V0ZXMgdG93YXJkIHRoZSBtb2xlLW1ha2luZyBmYW1pbHkgcHJlc2VudCB0aGVtc2VsdmVzOiB0aHJvdWdoIHRoZSBtYWluIGNvdmVyZWQgbWFya2V0LCBvciBhbG9uZyBhIHF1aWV0ZXIgc3RyZWV0IG9mIGhvbWUtYmFzZWQga2l0Y2hlbnMganVzdCBiZXlvbmQgaXQu',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgbWFpbiBjb3ZlcmVkIG1hcmtldA==', 'next' => '2_market'],
                ['text' => 'VGFrZSB0aGUgcXVpZXRlciBraXRjaGVuIHN0cmVldA==', 'next' => '2_street'],
            ],
        ],
        '2_market' => [
            'prose'  => 'VGhlIG1haW4gY292ZXJlZCBtYXJrZXQgaXMgYSBnZW51aW5lIHJpb3Qgb2YgY29sb3VyIGFuZCBzbWVsbCwgY2hpbGkgcHlyYW1pZHMgYW5kIGNob2NvbGF0ZSBzdGFsbHMgcGFja2VkIGNsb3NlIHRvZ2V0aGVyIHVuZGVyIGEgcm9vZiB0aGF0IGJhcmVseSBjb250YWlucyB0aGUgbm9pc2UgYmVsb3cgaXQuIFlvdSBuYXZpZ2F0ZSBpdCBzbG93bHksIGZpbmFsbHkgc3BvdHRpbmcgYSBzbWFsbCBob21lLWtpdGNoZW4gc2lnbiB0dWNrZWQgYXQgdGhlIG1hcmtldCdzIGVkZ2Uu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGtpdGNoZW4=', 'next' => '3_shared'],
            ],
        ],
        '2_street' => [
            'prose'  => 'VGhlIHF1aWV0ZXIga2l0Y2hlbiBzdHJlZXQgcnVucyBqdXN0IHBhc3QgdGhlIG1hcmtldCdzIGVkZ2UsIHNtYWxsIGhvbWUtYmFzZWQgb3BlcmF0aW9ucyBkb2luZyBzZXJpb3VzLCBzZXJpb3VzIGJ1c2luZXNzIHdlbGwgYXdheSBmcm9tIHRoZSBtYWluIGNyb3dkcy4gWW91IGZpbmQgdGhlIHJpZ2h0IGtpdGNoZW4gcXVpY2tseSwgdGhlIHNtZWxsIG9mIHRvYXN0aW5nIGNoaWxpZXMgZHJpZnRpbmcgZnJvbSBhbiBvcGVuIGRvb3J3YXku',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGtpdGNoZW4=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGtpdGNoZW4gYmVsb25ncyB0byB0aGUgUmV5ZXMgZmFtaWx5LCBtb2xlLW1ha2VycyBmb3IgZm91ciBnZW5lcmF0aW9ucywgYW5kIHlvdSBhcnJpdmUgYXQgdGhlIGV4YWN0IHNhbWUgbW9tZW50IGFzIGFuIHVuaW52aXRlZCB0aGlyZCBwYXJ0eSDigJQgU2VsaW4sIGNhbWVyYSBjcmV3IG5vdGFibHkgYWJzZW50IHRoaXMgdGltZSwgYXBwYXJlbnRseSBhdHRlbXB0aW5nIGEgcXVpZXRlciwgbW9yZSBwZXJzb25hbCBhcHByb2FjaCBhZnRlciBKYXZhJ3MgY29vbGVyIHJlY2VwdGlvbi4KCidJIGhlYXJkIHRoZXJlIHdhcyBhIHJlYWwgc3RvcnkgaGVyZSwnIHNoZSBzYXlzLCB0byB0aGUgY2xlYXJseSBzdGFydGxlZCBmYW1pbHksIGJlZm9yZSB5b3UndmUgZXZlbiBpbnRyb2R1Y2VkIHlvdXJzZWxmLiBUaGUgbWF0cmlhcmNoLCBEb8OxYSBDYXJtZW4sIGxvb2tzIGJldHdlZW4geW91IGJvdGggd2l0aCByZWFsLCB3ZWFyeSBzdXNwaWNpb24u',
            'terminal' => true,
            'choices' => [
                ['text' => 'RGVjaWRlIGhvdyB0byByZXNwb25k', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGNvdWxkIGZpcm1seSwgcG9saXRlbHkgZXN0YWJsaXNoIHlvdXIgb3duIHByaW9yLCBnZW51aW5lIGNvbm5lY3Rpb24gYmVmb3JlIFNlbGluIGNhbiBwcm9wZXJseSBpbnNlcnQgaGVyc2VsZiBpbnRvIHRoZSBsZXNzb24sIG9yIHlvdSBjb3VsZCBzaW1wbHkgcHJvY2VlZCB3aXRoIHlvdXIgb3duIGVycmFuZCBjYWxtbHksIGxldHRpbmcgRG/DsWEgQ2FybWVuIGRlY2lkZSBmb3IgaGVyc2VsZiBob3cgbXVjaCBvZiB0aGUgYWN0dWFsIHRlYWNoaW5nIFNlbGluIGlzIGFsbG93ZWQgdG8gd2l0bmVzcy4KCkVpdGhlciB3YXksIFNlbGluIGlzbid0IGxlYXZpbmcgd2l0aG91dCBhIGZpZ2h0IGZvciBhdCBsZWFzdCBzb21lIGFjY2Vzcy4=',
            'choices' => [
                ['text' => 'RXN0YWJsaXNoIHlvdXIgY29ubmVjdGlvbiBmaXJtbHkgZmlyc3Q=', 'next' => '5_firm'],
                ['text' => 'TGV0IERvw7FhIENhcm1lbiBkZWNpZGUgZm9yIGhlcnNlbGY=', 'next' => '5_defer'],
            ],
        ],
        '5_firm' => [
            'prose'  => 'WW91IGV4cGxhaW4geW91ciBhY3R1YWwgZXJyYW5kIHBsYWlubHkgYW5kIGZpcnN0LCB0aGUgcmVjaXBlIGNhcmQgYW5kIHRoZSBncmFuZG1vdGhlciBhbmQgdGhlIGdlbnVpbmUgZmFtaWx5IGNvbm5lY3Rpb24sIGJlZm9yZSBTZWxpbiBjYW4gcHJvcGVybHkgZnJhbWUgdGhlIG1vbWVudCBhcyBoZXIgb3duIGRpc2NvdmVyeS4gRG/DsWEgQ2FybWVuIGxpc3RlbnMsIHRoZW4gdHVybnMgdG8gU2VsaW4gd2l0aCBjb25zaWRlcmFibHkgY29vbGVyIGludGVyZXN0IHRoYW4gYmVmb3JlLgoKJ1lvdSBjYW4gd2F0Y2gsJyBzaGUgdGVsbHMgU2VsaW4uICdRdWlldGx5LiBUaGlzIGxlc3NvbiBpc24ndCBhY3R1YWxseSBhYm91dCB5b3UuJw==',
            'choices' => [
                ['text' => 'QmVnaW4gdGhlIGxlc3Nvbg==', 'next' => '6_shared'],
            ],
        ],
        '5_defer' => [
            'prose'  => 'WW91IGxldCBEb8OxYSBDYXJtZW4gbWFrZSBoZXIgb3duIGp1ZGdtZW50LCBzaW1wbHkgcHJvY2VlZGluZyB3aXRoIHlvdXIgZXJyYW5kIGNhbG1seSB3aGlsZSBTZWxpbiB3b3JrcyB0byBjaGFybSBoZXIgd2F5IGludG8gYSBiZXR0ZXIgcG9zaXRpb24uIERvw7FhIENhcm1lbiwgdW5odXJyaWVkIGFuZCBlbnRpcmVseSB1bmltcHJlc3NlZCBieSBjaGFybSBhbG9uZSwgZXZlbnR1YWxseSBzZXR0bGVzIHRoZSBtYXR0ZXIgaGVyc2VsZi4KCidZb3UgY2FuIHdhdGNoLCcgc2hlIHRlbGxzIFNlbGluLCBhZnRlciBhIGxvbmcsIGFwcHJhaXNpbmcgcGF1c2UuICdRdWlldGx5LiBUaGlzIGxlc3NvbiBpc24ndCBhY3R1YWxseSBhYm91dCB5b3UuJw==',
            'choices' => [
                ['text' => 'QmVnaW4gdGhlIGxlc3Nvbg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIG1vbGUgbGVzc29uIGl0c2VsZiBpcyBnZW51aW5lbHkgaW50cmljYXRlIOKAlCBsYXllcmluZyBkcmllZCBjaGlsaWVzIGFuZCB0b2FzdGVkIHNwaWNlcyBhbmQgZGFyayBjYWNhbyBpbiBjYXJlZnVsLCBzcGVjaWZpYyBzdGFnZXMsIGEgcHJvY2VzcyB0aGF0IHRha2VzIHJlYWwgcGF0aWVuY2UgYW5kIGNsZWFybHkgY2FuJ3QgYmUgcnVzaGVkIGJ5IGFueW9uZSwgY2FtZXJhIGNyZXcgb3Igbm90LiBTZWxpbiwgdG8gaGVyIGNyZWRpdCwgYWN0dWFsbHkgc3RheXMgcXVpZXQgYW5kIHdhdGNoZXMgcHJvcGVybHksIHRha2luZyBub3RlcyByYXRoZXIgdGhhbiBuYXJyYXRpbmcuCgpCeSB0aGUgZW5kLCB5b3UndmUgZ290IGEgcHJvcGVyIGJhc2Ugb2YgY2hpbGllcyBhbmQgY2FjYW8sIGFuZCBEb8OxYSBDYXJtZW4sIHNhdGlzZmllZCB3aXRoIHRoZSB3b3JrLCBwYWNrYWdlcyBhIGdlbmVyb3VzIHBvcnRpb24gZm9yIHlvdSBzcGVjaWZpY2FsbHkuCgonRm9yIGhlciwnIERvw7FhIENhcm1lbiBzYXlzLCBub2RkaW5nIGF0IFNlbGluLCBzdGlsbCB3b3JraW5nIGF0IGhlciBub3RlcywgJ3dlJ2xsIHNlZS4gRGVwZW5kcyB3aGF0IHNoZSBhY3R1YWxseSBkb2VzIHdpdGggd2F0Y2hpbmcgcHJvcGVybHksIGZvciBvbmNlLic=',
            'choices' => [
                ['text' => 'VGFrZSB5b3VyIHBvcnRpb24gYW5kIHN0YXJ0IGJhY2s=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGxlYXZlIHdpdGggdGhlIGNoaWxpZXMgYW5kIGNhY2FvIHNlY3VyZSBpbiB0aGVpciB3cmFwLCBPYXhhY2EncyBtYXJrZXRzIHNldHRsaW5nIGludG8gYWZ0ZXJub29uIGhlYXQgYmVoaW5kIHlvdSwgU2VsaW4gc3RpbGwgbGluZ2VyaW5nIGF0IHRoZSBraXRjaGVuIGRvb3IsIHVudXN1YWxseSBzdWJkdWVkIGZvciBzb21lb25lIHdobydzIHNwZW50IHRoZSB3aG9sZSB0cmlwIHNvIGZhciBiZWluZyBhbnl0aGluZyBidXQuCgpCcnVubywgd2F0Y2hpbmcgaGVyIGdvLCBsb29rcyB0aG91Z2h0ZnVsbHkgdW5jZXJ0YWluLiAnVGhhdCdzIGRpZmZlcmVudCBmcm9tIEhvaSBBbi4gV29uZGVyIGlmIHNvbWV0aGluZydzIGFjdHVhbGx5IHNoaWZ0aW5nIHRoZXJlLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSBob3BlIHNvLCBmb3IgdGhlIGZhbWlseSdzIHNha2U=', 'next' => '8_end_hope'],
                ['text' => 'U2F5IHlvdSdsbCBiZWxpZXZlIGl0IHdoZW4geW91IHNlZSBpdA==', 'next' => '8_end_skeptical'],
            ],
        ],
        '8_end_hope' => [
            'prose'  => 'J0kgaG9wZSBzbywgaG9uZXN0bHksIGZvciB0aGUgZmFtaWx5J3Mgc2FrZSBpZiBub3RoaW5nIGVsc2UsJyB5b3Ugc2F5LCB0aGlua2luZyBvZiBEb8OxYSBDYXJtZW4ncyBjYXJlZnVsLCBoYXJkLXdvbiBnZW5lcm9zaXR5LiAnV291bGQgYmUgZ29vZCBpZiB3YXRjaGluZyBwcm9wZXJseSBhY3R1YWxseSBjaGFuZ2VkIHNvbWV0aGluZyBpbiBob3cgc2hlIHdvcmtzLicKCkJydW5vIG5vZHMgc2xvd2x5LiAnV291bGQgYmUgZ29vZC4gUGVvcGxlIGNhbiBjaGFuZ2UsIHNvbWV0aW1lcywgaWYgc29tZXRoaW5nIGZpbmFsbHkgZ2V0cyB0aHJvdWdoIHByb3Blcmx5LiBEb2Vzbid0IGFsd2F5cyBoYXBwZW4sIGJ1dCBpdCdzIG5vdCBpbXBvc3NpYmxlLic=',
            'ending' => true,
        ],
        '8_end_skeptical' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ2xsIGJlbGlldmUgaXQgd2hlbiBJIHNlZSBpdCwnIHlvdSBhZG1pdCwgdGhpbmtpbmcgb2YgSmF2YSdzIGNvb3BlcmF0aXZlIGFuZCB0aGVpciBzdGlsbC11bnB1Ymxpc2hlZCBwcm9taXNlIG9mIGV4cG9zdXJlLiAnUXVpZXQgbm90ZXMgdG9kYXkgZG9uJ3QgdW5kbyBhIHBhdHRlcm4gbGlrZSB0aGF0IG92ZXJuaWdodC4nCgpCcnVubyBkb2Vzbid0IGFyZ3VlIHRoZSBwb2ludC4gJ0ZhaXIuIFNrZXB0aWNpc20ncyBlYXJuZWQsIGF0IHRoaXMgcG9pbnQuIFdlJ2xsIHNlZSB3aGF0IHNoZSBhY3R1YWxseSBkb2VzIHdpdGggaXQsIHNhbWUgYXMgRG/DsWEgQ2FybWVuIHNhaWQuJyBUaGUgbWFya2V0IG5vaXNlIGZhZGVzIHNsb3dseSBiZWhpbmQgeW91IGFzIHlvdSBoZWFkIGJhY2sgdG93YXJkIHRoZSBkYXkncyBuZXh0IGVycmFuZC4=',
            'ending' => true,
        ],
    ],
];
