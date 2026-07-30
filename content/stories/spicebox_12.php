<?php
return [
    'id'    => 12,
    'title' => 'Not Holding Our Breath',
    'color' => '#4A6A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'SmF2YSdzIHZvbGNhbmljIGhpbGxzIHN1cHBvcnQgbnV0bWVnIGdyb3ZlcyBpbiBhIGx1c2gsIGh1bWlkIGdyZWVuIHRoYXQgQnJ1bm8ga2VlcHMgc3RvcHBpbmcgdG8gcHJvcGVybHkgYWRtaXJlLCB0aGUgdHJlZXMgdGhlbXNlbHZlcyBtb2Rlc3QtbG9va2luZyBmb3Igc29tZXRoaW5nIHRoYXQgb25jZSBkcm92ZSBlbnRpcmUgZW1waXJlcyB0byBmaWdodCBvdmVyIHRoZXNlIGV4YWN0IHNsb3Blcy4gVGhlIGNvb3BlcmF0aXZlIHlvdSdyZSBsb29raW5nIGZvciBzaXRzIGZ1cnRoZXIgdXAsIHBhc3Qgc2V2ZXJhbCBzbWFsbGVyIGZhbWlseSBwbG90cy4KClR3byBwbGFudGF0aW9uIGFwcHJvYWNoZXMgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgbWFpbiBjb29wZXJhdGl2ZSByb2FkLCB3aWRlciBhbmQgbW9yZSBkaXJlY3QsIG9yIGEgc21hbGxlciBmb290cGF0aCB1c2VkIG1vc3RseSBieSB0aGUgZ3Jvd2VycyB0aGVtc2VsdmVzLg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbiBjb29wZXJhdGl2ZSByb2Fk', 'next' => '2_road'],
                ['text' => 'Rm9sbG93IHRoZSBncm93ZXJzJyBmb290cGF0aA==', 'next' => '2_footpath'],
            ],
        ],
        '2_road' => [
            'prose'  => 'VGhlIG1haW4gcm9hZCBpcyB3aWRlLCB3ZWxsLW1haW50YWluZWQsIGNsZWFybHkgYnVpbHQgZm9yIG1vdmluZyBwcm9wZXIgcXVhbnRpdGllcyBvZiBoYXJ2ZXN0ZWQgbnV0bWVnIGRvd24gdG8gbWFya2V0IGVmZmljaWVudGx5LiBZb3UgbWFrZSBnb29kIHRpbWUsIHRoZSBodW1pZCBncmVlbiBncm92ZXMgcmlzaW5nIHN0ZWVwbHkgb24gZWl0aGVyIHNpZGUgdGhlIHdob2xlIGNsaW1iLgoKWW91IGFycml2ZSBhdCB0aGUgY29vcGVyYXRpdmUncyBkcnlpbmcgaG91c2Ugd2l0aCB0aW1lIHRvIHNwYXJlLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGNvb3BlcmF0aXZl', 'next' => '3_shared'],
            ],
        ],
        '2_footpath' => [
            'prose'  => 'VGhlIGdyb3dlcnMnIGZvb3RwYXRoIHdpbmRzIG1vcmUgaW50aW1hdGVseSB0aHJvdWdoIHRoZSBhY3R1YWwgd29ya2luZyBncm92ZXMsIGNsb3NlIGVub3VnaCB0byByZWFjaCBvdXQgYW5kIHRvdWNoIHRoZSB0cmVlcyB0aGVtc2VsdmVzLCB3b3JrZXJzIG5vZGRpbmcgYXQgeW91IHdpdGggcXVpZXQgY3VyaW9zaXR5IGFzIHlvdSBwYXNzLiBJdCdzIGEgc2xvd2VyIHJvdXRlLCBidXQgYSBjb25zaWRlcmFibHkgbW9yZSBwZXJzb25hbCBpbnRyb2R1Y3Rpb24gdG8gdGhlIHBsYWNlLgoKWW91IGFycml2ZSBhdCB0aGUgY29vcGVyYXRpdmUncyBkcnlpbmcgaG91c2UgaGF2aW5nIHByb3Blcmx5IHNlZW4gdGhlIGdyb3ZlcyB1cCBjbG9zZS4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGNvb3BlcmF0aXZl', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGNvb3BlcmF0aXZlJ3MgbWFuYWdlciwgV2F5YW4sIGdyZWV0cyB5b3Ugd2l0aCByZWFsIGJ1dCB2aXNpYmx5IGd1YXJkZWQgcG9saXRlbmVzcy4gJ0Fub3RoZXIgam91cm5hbGlzdCBjYW1lIHRocm91Z2ggcmVjZW50bHksJyBzaGUgc2F5cywgYmVmb3JlIHlvdSd2ZSBldmVuIHByb3Blcmx5IGV4cGxhaW5lZCB5b3Vyc2VsZi4gJ1Byb21pc2VkIGV4cG9zdXJlLCBhIGZlYXR1cmUsIHJlYWwgY2hhbmdlIGZvciB0aGUgZ3Jvd2VycyBoZXJlLiBGaWxtZWQgZm9yIGhvdXJzLiBOZXZlciBwdWJsaXNoZWQgYW55dGhpbmcgd2UndmUgYWN0dWFsbHkgc2VlbiwgZmFyIGFzIEkga25vdy4nCgpTaGUgc3R1ZGllcyB5b3UgY2FyZWZ1bGx5LiAnU28gZm9yZ2l2ZSBtZSBpZiBJJ20gbm90IGltbWVkaWF0ZWx5IHRydXN0aW5nIG9mIGFueW9uZSBuZXcgYXNraW5nIHF1ZXN0aW9ucyBhYm91dCBvdXIgbnV0bWVnLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'RXhwbGFpbiB5b3UncmUgbm90IHRoYXQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGV4cGxhaW4gcHJvcGVybHkg4oCUIHRoZSByZWNpcGUgY2FyZCwgdGhlIGdyYW5kbW90aGVyLCB0aGUgZ2VudWluZSwgdW5nbGFtb3JvdXMgbmF0dXJlIG9mIHlvdXIgYWN0dWFsIGVycmFuZCDigJQgYW5kIFdheWFuIGNvbnNpZGVycyBpdCwgc3RpbGwgY2F1dGlvdXMsIGJlZm9yZSBvZmZlcmluZyB0d28gd2F5cyB0byBhY3R1YWxseSBwcm92ZSBpdDogc3BlbmQgdGhlIGRheSB3b3JraW5nIHRoZSBkcnlpbmcgaG91c2UgYWxvbmdzaWRlIHRoZSBjb29wZXJhdGl2ZSdzIG93biBzdGFmZiwgb3Igc2l0IHdpdGggdGhlIGdyb3dlcnMgcHJvcGVybHkgYW5kIHNpbXBseSBsaXN0ZW4gdG8gd2hhdCBTZWxpbidzIHZpc2l0IGFjdHVhbGx5IGNvc3QgdGhlbSwgd2l0aG91dCB0cnlpbmcgdG8gZml4IG9yIGV4Y3VzZSBhbnkgb2YgaXQuCgonRWl0aGVyIHNob3dzIG1lIHNvbWV0aGluZyByZWFsLCcgc2hlIHNheXMuICdXb3JrLCBvciBsaXN0ZW5pbmcgcHJvcGVybHkuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'V29yayB0aGUgZHJ5aW5nIGhvdXNlIGZvciB0aGUgZGF5', 'next' => '5_work'],
                ['text' => 'TGlzdGVuIHByb3Blcmx5IHRvIHdoYXQgU2VsaW4ncyB2aXNpdCBjb3N0IHRoZW0=', 'next' => '5_listen'],
            ],
        ],
        '5_work' => [
            'prose'  => 'V29ya2luZyB0aGUgZHJ5aW5nIGhvdXNlIG1lYW5zIHJlYWwsIGhvdCwgcmVwZXRpdGl2ZSBsYWJvdXIsIHNvcnRpbmcgYW5kIHR1cm5pbmcgbnV0bWVnIHRocm91Z2ggaXRzIGNhcmVmdWwgY3VyaW5nIHByb2Nlc3MgYWxvbmdzaWRlIGNvb3BlcmF0aXZlIHN0YWZmIHdobyB3YXJtIHRvIHlvdSBncmFkdWFsbHkgYXMgdGhlIGRheSB3ZWFycyBvbiwgeW91ciB3aWxsaW5nbmVzcyB0byBhY3R1YWxseSB3b3JrIHNwZWFraW5nIGxvdWRlciB0aGFuIGFueSBleHBsYW5hdGlvbiBjb3VsZC4KCkJ5IGV2ZW5pbmcsIHRoZSB3YXJpbmVzcyBoYXMgdmlzaWJseSBlYXNlZC4=',
            'choices' => [
                ['text' => 'U2VlIFdheWFuJ3MgZGVjaXNpb24=', 'next' => '6_shared'],
            ],
        ],
        '5_listen' => [
            'prose'  => 'TGlzdGVuaW5nIHByb3Blcmx5IG1lYW5zIHNpdHRpbmcgd2l0aCBzZXZlcmFsIGdyb3dlcnMgYXMgdGhleSBkZXNjcmliZSwgcGxhaW5seSBhbmQgd2l0aG91dCBtdWNoIGJpdHRlcm5lc3MsIGV4YWN0bHkgd2hhdCBTZWxpbidzIHByb21pc2VkIGV4cG9zdXJlIGFjdHVhbGx5IGFtb3VudGVkIHRvIOKAlCBub3RoaW5nLCBpbiB0aGUgZW5kLCBqdXN0IGZvb3RhZ2UgdGhhdCBwcmVzdW1hYmx5IHNlcnZlZCBoZXIgb3duIHByb2plY3Qgd2hpbGUgZG9pbmcgbm90aGluZyBtZWFzdXJhYmxlIGZvciB0aGUgcGVvcGxlIHdobydkIHRydXN0ZWQgaGVyIHdpdGggdGhlaXIgdGltZS4KCllvdSBkb24ndCB0cnkgdG8gZXhjdXNlIGl0IG9yIGZpeCBpdC4gWW91IGp1c3QgbGlzdGVuLCBwcm9wZXJseSwgYW5kIHNvbWV0aGluZyBpbiB0aGF0IHBsYWluIGF0dGVudGlvbiBzZWVtcyB0byBtYXR0ZXIu',
            'choices' => [
                ['text' => 'U2VlIFdheWFuJ3MgZGVjaXNpb24=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2F5YW4sIHNhdGlzZmllZCBlaXRoZXIgd2F5LCBmaW5hbGx5IHJlbGF4ZXMgaW50byBzb21ldGhpbmcgbGlrZSBnZW51aW5lIHdhcm10aC4gJ0FsbCByaWdodCwnIHNoZSBzYXlzLiAnWW91J3JlIG5vdCBoZXIuIFRoYXQgbXVjaCBJIGJlbGlldmUgbm93LicgU2hlIHBhY2thZ2VzIGEgZ2VuZXJvdXMgbWVhc3VyZSBvZiBwcm9wZXJseSBjdXJlZCBudXRtZWcgaGVyc2VsZi4gJ1Rha2UgaXQgd2l0aCBvdXIgYWN0dWFsIGJsZXNzaW5nLCBub3QganVzdCBhIHRyYW5zYWN0aW9uLicKClNoZSBhZGRzLCBhbG1vc3QgYXMgYW4gYWZ0ZXJ0aG91Z2h0OiAnSWYgeW91IGRvIGV2ZXIgY3Jvc3MgcGF0aHMgd2l0aCB0aGF0IHdvbWFuIGFnYWluLCB0ZWxsIGhlciB3ZSdyZSBzdGlsbCB3YWl0aW5nIG9uIHRoYXQgYXJ0aWNsZS4gTm90IGhvbGRpbmcgb3VyIGJyZWF0aCwgdGhvdWdoLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHRocm91Z2ggdGhlIGx1c2ggZ3JvdmVzIHdpdGggdGhlIG51dG1lZyBzZWN1cmUgaW4gaXRzIHdyYXAsIEphdmEncyB2b2xjYW5pYyBoaWxscyBzZXR0bGluZyBpbnRvIGV2ZW5pbmcgaGF6ZSBiZWhpbmQgeW91LCBXYXlhbidzIGd1YXJkZWQgd2FybXRoIHNldHRsaW5nIGludG8gc29tZXRoaW5nIHlvdSdyZSBnZW51aW5lbHkgZ2xhZCB0byBoYXZlIHByb3Blcmx5IGVhcm5lZCByYXRoZXIgdGhhbiBzaW1wbHkgYmVlbiBncmFudGVkLgoKQnJ1bm8sIHF1aWV0IHNpbmNlIGxlYXZpbmcgdGhlIGNvb3BlcmF0aXZlLCBmaW5hbGx5IHNwZWFrcy4gJ1RoYXQncyB0aGUgcmVhbCBjb3N0IG9mIHBlb3BsZSBsaWtlIFNlbGluLCBpc24ndCBpdC4gTm90IGp1c3QgdGhlIHN0b3J5IHRoZXkgdGFrZS4gVGhlIHRydXN0IHRoZXkgdXNlIHVwIGZvciBldmVyeW9uZSB3aG8gY29tZXMgYWZ0ZXIgdGhlbSwgdG9vLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSBob3BlIHlvdSBjYW4gYmUgcGFydCBvZiB1bmRvaW5nIHNvbWUgb2YgdGhhdA==', 'next' => '8_end_undoing'],
                ['text' => 'U2F5IGl0IG1ha2VzIHlvdSBhbmdyeSBvbiB0aGUgZ3Jvd2VycycgYmVoYWxm', 'next' => '8_end_angry'],
            ],
        ],
        '8_end_undoing' => [
            'prose'  => 'J0kgaG9wZSBJIGNhbiBiZSBwYXJ0IG9mIHVuZG9pbmcgc29tZSBvZiB0aGF0LCBob25lc3RseSwnIHlvdSBzYXksIHRoaW5raW5nIG9mIFdheWFuJ3MgY2FyZWZ1bCwgaGFyZC13b24gdHJ1c3QuICdFdmVuIGp1c3QgYSBsaXR0bGUuIFNob3dpbmcgdXAgcHJvcGVybHksIGFjdHVhbGx5IGZvbGxvd2luZyB0aHJvdWdoIOKAlCB0aGF0IGhhcyB0byBjb3VudCBmb3Igc29tZXRoaW5nLicKCkJydW5vIG5vZHMgc2xvd2x5LiAnSXQgZG9lcy4gU2xvdyB3b3JrLCByZWJ1aWxkaW5nIHRydXN0IHNvbWVvbmUgZWxzZSBzcGVudCBjYXJlbGVzc2x5LiBCdXQgaXQgZG9lcyBjb3VudC4n',
            'ending' => true,
        ],
        '8_end_angry' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBtYWtlcyBtZSBhbmdyeSBvbiB0aGVpciBiZWhhbGYsJyB5b3UgYWRtaXQsIHRoaW5raW5nIG9mIGhvdXJzIG9mIHRoZSBncm93ZXJzJyB0aW1lIGdpdmVuIGZyZWVseSBmb3IgYSBzdG9yeSB0aGF0IGFwcGFyZW50bHkgd2VudCBub3doZXJlLiAnVGhhdCdzIG5vdCBhIHNtYWxsIHRoaW5nIHRvIGp1c3QgdGFrZSBhbmQgbm90IGZvbGxvdyB0aHJvdWdoIG9uLicKCkJydW5vIGRvZXNuJ3QgZGlzYWdyZWUuICdJdCBpc24ndC4gQW5nZXIncyBhIGZhaXIgcmVzcG9uc2UuIEp1c3QgbWFrZSBzdXJlIGl0IHR1cm5zIGludG8gYWN0dWFsbHkgZG9pbmcgdGhpcyBwcm9wZXJseSB5b3Vyc2VsZiwgcmF0aGVyIHRoYW4ganVzdCBzaXR0aW5nIHRoZXJlIGJlaW5nIGFuZ3J5IGFib3V0IHNvbWVvbmUgZWxzZSdzIGNhcmVsZXNzbmVzcy4n',
            'ending' => true,
        ],
    ],
];
