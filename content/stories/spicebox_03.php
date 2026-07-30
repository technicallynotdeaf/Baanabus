<?php
return [
    'id'    => 3,
    'title' => 'Earned, Not Bought',
    'color' => '#9A6A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QmFyY2Vsb25hIGdpdmVzIHdheSBxdWlja2x5IHRvIGNvdW50cnlzaWRlIG9uY2UgeW91J3JlIGNsZWFyIG9mIHRoZSBjaXR5LCBzbWFsbCB0ZXJyYWNlZCBmaWVsZHMgb3BlbmluZyB1cCBpbiB0aGUgaGlsbHMgd2hlcmUgc2FmZnJvbiBjcm9jdXMgZ3Jvd3MgaW4gdGlnaHQgcHVycGxlIHJvd3MsIGJsb29taW5nIGZvciBvbmx5IGEgZmV3IHByZWNpb3VzIHdlZWtzIGVhY2ggYXV0dW1uLiBCcnVubyBleHBsYWlucywgd2l0aCByZWFsIHJldmVyZW5jZSwgZXhhY3RseSBob3cgbWFueSBmbG93ZXJzIGl0IHRha2VzIHRvIHByb2R1Y2UgZXZlbiBhIHNpbmdsZSBncmFtIG9mIHRoZSBmaW5pc2hlZCBzcGljZS4KClR3byByb3V0ZXMgdG93YXJkIHRoZSBmYXJtaW5nIGZhbWlseSBwcmVzZW50IHRoZW1zZWx2ZXM6IGFsb25nIHRoZSBtYWluIHZhbGxleSByb2FkLCBkaXJlY3QgYnV0IGV4cG9zZWQgdG8gdGhlIGRheSdzIGdyb3dpbmcgaGVhdCwgb3IgYSBzaGFkZWQgdHJhY2sgdGhyb3VnaCB0aGUgc3Vycm91bmRpbmcgb2xpdmUgZ3JvdmVzLCBsb25nZXIgYnV0IGNvbnNpZGVyYWJseSBjb29sZXIu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgdmFsbGV5IHJvYWQ=', 'next' => '2_valley'],
                ['text' => 'R28gdGhyb3VnaCB0aGUgb2xpdmUgZ3JvdmVz', 'next' => '2_groves'],
            ],
        ],
        '2_valley' => [
            'prose'  => 'VGhlIHZhbGxleSByb2FkIGlzIGRpcmVjdCBhbmQgaW5jcmVhc2luZ2x5IGhvdCwgc3VuIGJlYXRpbmcgZG93biBvbiB0ZXJyYWNlZCBmaWVsZHMgdGhhdCBzdHJldGNoIGZ1cnRoZXIgdGhhbiB5b3UgZXhwZWN0ZWQuIFlvdSBhcnJpdmUgYXQgdGhlIGZhcm1ob3VzZSBzd2VhdGluZyBhbmQgcHJvcGVybHkgaW1wcmVzc2VkIGJ5IHRoZSBzaGVlciBzY2FsZSBvZiBjdWx0aXZhdGlvbiBzYWZmcm9uIGFjdHVhbGx5IHJlcXVpcmVzLgoKQnJ1bm8sIHVuYm90aGVyZWQgYnkgdGhlIGhlYXQsIHNlZW1zIG1vc3RseSBhbXVzZWQgYnkgeW91ciBzdHJ1Z2dsZS4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGZhcm1ob3VzZQ==', 'next' => '3_shared'],
            ],
        ],
        '2_groves' => [
            'prose'  => 'VGhlIG9saXZlIGdyb3ZlIHRyYWNrIHdpbmRzIHBsZWFzYW50bHkgdGhyb3VnaCBkYXBwbGVkIHNoYWRlLCBhbmNpZW50IHRyZWVzIG9mZmVyaW5nIHJlYWwgcmVsaWVmIGZyb20gdGhlIGRheSdzIGhlYXQsIHRoZSB3aG9sZSB3YWxrIGNvbnNpZGVyYWJseSBnZW50bGVyIHRoYW4gdGhlIGV4cG9zZWQgdmFsbGV5IHJvYWQuIFBpbSwgZGVsaWdodGVkIGJ5IHRoZSBzaGFkZSwgYWN0dWFsbHkgc2V0dGxlcyBxdWlldGx5IGluIGhpcyBiYXNrZXQgZm9yIG9uY2UuCgpZb3UgYXJyaXZlIGF0IHRoZSBmYXJtaG91c2UgcmVsYXhlZCwgaWYgc2xpZ2h0bHkgc2xvd2VyIHRoYW4gdGhlIGRpcmVjdCByb3V0ZSB3b3VsZCBoYXZlIGFsbG93ZWQu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGZhcm1ob3VzZQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhcm1pbmcgZmFtaWx5LCB0aGUgRmVycmVycywgZ3JlZXQgeW91IHdhcm1seSBidXQgd2l0aCByZWFsLCBldmlkZW50IHdvcnJ5IOKAlCB0aGlzIHllYXIncyBoYXJ2ZXN0IGhhcyBjb21lIGluIHNtYWxsZXIgdGhhbiBhbnkgaW4gbGl2aW5nIG1lbW9yeSwgbGF0ZSBmcm9zdCBoYXZpbmcgZGFtYWdlZCBtdWNoIG9mIHRoZSBjcm9wLiAnV2UgcmVtZW1iZXIgeW91ciBncmFuZG1vdGhlciwnIHRoZSBtYXRyaWFyY2ggc2F5cy4gJ0dvb2QgY3VzdG9tZXIsIGdvb2QgZnJpZW5kLiBCdXQgSSBjYW4ndCBzaW1wbHkgc2VsbCB3aGF0IHdlIGJhcmVseSBoYXZlIGVub3VnaCBvZiB0aGlzIHllYXIuIFlvdSdsbCBuZWVkIHRvIGFjdHVhbGx5IGhlbHAgYnJpbmcgaW4gd2hhdCdzIGxlZnQsIHByb3Blcmx5LCBiZWZvcmUgSSBjYW4gc3BhcmUgYW55Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'T2ZmZXIgdG8gaGVscA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGhhcnZlc3QgaXRzZWxmIHNwbGl0cyBpbnRvIHR3byB1cmdlbnQgdGFza3M6IHBpY2tpbmcgdGhlIGRlbGljYXRlIGNyb2N1cyBmbG93ZXJzIHRoZW1zZWx2ZXMgYmVmb3JlIHRoZSBtb3JuaW5nIGhlYXQgd2lsdHMgdGhlbSwgcGFpbnN0YWtpbmcgd29yayBkb25lIGVudGlyZWx5IGJ5IGhhbmQsIG9yIHNlcGFyYXRpbmcgdGhlIHByZWNpb3VzIHJlZCBzdGlnbWFzIGZyb20gdGhlIHBpY2tlZCBmbG93ZXJzIGFmdGVyd2FyZCwgZXF1YWxseSBkZWxpY2F0ZSwgZXF1YWxseSBlc3NlbnRpYWwuCgonQm90aCBuZWVkIGRvaW5nLCBmYXN0LCBiZWZvcmUgd2UgbG9zZSBhbnkgbW9yZSBvZiBhIHNlYXNvbiB0aGF0J3MgYWxyZWFkeSBnaXZlbiB1cyB0b28gbGl0dGxlLCcgc2hlIHNheXMuICdQaWNrIHdoaWNoZXZlciB5b3VyIGhhbmRzIGFyZSBzdGVhZGllciBmb3IuJw==',
            'choices' => [
                ['text' => 'SGVscCBwaWNrIHRoZSBjcm9jdXMgZmxvd2Vycw==', 'next' => '5_pick'],
                ['text' => 'SGVscCBzZXBhcmF0ZSB0aGUgc3RpZ21hcw==', 'next' => '5_separate'],
            ],
        ],
        '5_pick' => [
            'prose'  => 'UGlja2luZyBjcm9jdXMgZmxvd2VycyBwcm9wZXJseSBtZWFucyB3b3JraW5nIGZhc3QgYnV0IGdlbnRseSBpbiB0aGUgY29vbCBlYXJseSBtb3JuaW5nLCBlYWNoIGJsb29tIG5lZWRpbmcgdG8gY29tZSBhd2F5IHdob2xlIGFuZCB1bmRhbWFnZWQgYmVmb3JlIHRoZSBkYXkncyBoZWF0IGNsb3NlcyBpdCBmb3IgZ29vZC4gWW91ciBiYWNrIGFjaGVzIHdpdGhpbiB0aGUgaG91ciwgYmVudCBsb3cgb3ZlciByb3cgYWZ0ZXIgcm93IG9mIHNtYWxsIHB1cnBsZSBmbG93ZXJzLgoKVGhlIEZlcnJlcnMgd29yayBhbG9uZ3NpZGUgeW91IHdpdGggcHJhY3Rpc2VkIHNwZWVkLCBjb3JyZWN0aW5nIHlvdXIgdGVjaG5pcXVlIHdpdGhvdXQgbXVjaCBjZXJlbW9ueSwgZ3JhdGVmdWwgZm9yIGV2ZXJ5IGFkZGl0aW9uYWwgcGFpciBvZiBjYXJlZnVsIGhhbmRzLg==',
            'choices' => [
                ['text' => 'U2VlIHRoZSBoYXJ2ZXN0IHRocm91Z2g=', 'next' => '6_shared'],
            ],
        ],
        '5_separate' => [
            'prose'  => 'U2VwYXJhdGluZyB0aGUgcmVkIHN0aWdtYXMgZnJvbSB0aGUgcGlja2VkIGZsb3dlcnMgaXMgY2xvc2UsIGV4YWN0aW5nLCBoYW5kLW51bWJpbmcgd29yaywgdGhyZWUgZGVsaWNhdGUgdGhyZWFkcyB0ZWFzZWQgZnJlZSBmcm9tIGVhY2ggYmxvb20gd2l0aG91dCBkYW1hZ2luZyB0aGVpciBmcmFnaWxlIHN0cnVjdHVyZS4gSXQncyBzbG93LCBhbmQgdGhlIHBpbGUgb2YgZmluaXNoZWQgZmxvd2VycyBiYXJlbHkgc2VlbXMgdG8gc2hyaW5rIG5vIG1hdHRlciBob3cgbG9uZyB5b3Ugd29yay4KCkJ5IHRoZSBlbmQsIHlvdXIgZmluZ2VycyBhcmUgc3RhaW5lZCBmYWludGx5IHJlZCwgYW5kIHlvdSd2ZSBnYWluZWQgcmVhbCwgaGFyZC13b24gcmVzcGVjdCBmb3IgaG93IG11Y2ggbGFib3VyIHNpdHMgYmVoaW5kIGV2ZW4gYSBzaW5nbGUgc21hbGwgamFyIG9mIHRoZSBmaW5pc2hlZCBzcGljZS4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBoYXJ2ZXN0IHRocm91Z2g=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QnkgZXZlbmluZywgdGhlIGhhcnZlc3QgaXMgcHJvcGVybHksIHNhZmVseSBicm91Z2h0IGluLCBhbmQgdGhlIG1hdHJpYXJjaCwgZ2VudWluZWx5IGdyYXRlZnVsLCBzZXRzIGFzaWRlIGEgc21hbGwgbWVhc3VyZSBvZiB0aGUgcHJlY2lvdXMgc2FmZnJvbiBmb3IgeW91IHdpdGhvdXQgaGVzaXRhdGlvbi4gJ0Vhcm5lZCBwcm9wZXJseSwnIHNoZSBzYXlzLiAnVGhhdCBtYXR0ZXJzIG1vcmUgdGhpcyB5ZWFyIHRoYW4gbW9zdCwgd2l0aCBzbyBsaXR0bGUgdG8gZ28gYXJvdW5kLicKClNoZSBzdHVkaWVzIHlvdSBhIG1vbWVudC4gJ1lvdXIgZ3JhbmRtb3RoZXIgd291bGQgdW5kZXJzdGFuZCBleGFjdGx5IHdoeSB3ZSBjb3VsZG4ndCBqdXN0IHNlbGwgaXQsIHRoaXMgcGFydGljdWxhciBzZWFzb24uIFNvbWUgdGhpbmdzIGhhdmUgdG8gYWN0dWFsbHkgYmUgc2hhcmVkIGludG8sIG5vdCBzaW1wbHkgYm91Z2h0Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0b3dhcmQgdGhlIGNpdHkgd2l0aCB0aGUgc2FmZnJvbiBzZWN1cmUgaW4gaXRzIHNtYWxsIHBhcGVyIHR3aXN0LCB0aGUgdGVycmFjZWQgZmllbGRzIGdsb3dpbmcgZ29sZC1wdXJwbGUgaW4gdGhlIGV2ZW5pbmcgbGlnaHQsIHRoZSB3aG9sZSBkYXkncyBjYXJlZnVsIGxhYm91ciBzZXR0bGluZyBpbnRvIHNvbWV0aGluZyB0aGF0IGZlZWxzIGNvbnNpZGVyYWJseSBtb3JlIGVhcm5lZCB0aGFuIGFueSBwdXJjaGFzZSBjb3VsZCBoYXZlLgoKQnJ1bm8gZXhhbWluZXMgdGhlIHRpbnksIHByZWNpb3VzIHF1YW50aXR5IHdpdGggcmVhbCBhcHByZWNpYXRpb24uICdEb2Vzbid0IGxvb2sgbGlrZSBtdWNoLiBOZXZlciBkb2VzLiBUaGF0J3MgcmF0aGVyIHRoZSB3aG9sZSBwb2ludCBvZiBzYWZmcm9uLCB0aG91Z2gg4oCUIHRoZSB2YWx1ZSdzIG5ldmVyIGluIHRoZSBzaXplIG9mIHRoZSBwaWxlLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSB1bmRlcnN0YW5kIHRoYXQgYmV0dGVyIG5vdw==', 'next' => '8_end_understand'],
                ['text' => 'U2F5IHlvdSdyZSBzdXJwcmlzZWQgYnkgaG93IGxpdHRsZSBpdCBhY3R1YWxseSB0YWtlcw==', 'next' => '8_end_surprised'],
            ],
        ],
        '8_end_understand' => [
            'prose'  => 'J0kgdW5kZXJzdGFuZCB0aGF0IGJldHRlciBub3csIGhvbmVzdGx5LCcgeW91IHNheSwgdGhpbmtpbmcgb2YgdGhlIHdob2xlIGRheSdzIGFjaGluZywgY2FyZWZ1bCBsYWJvdXIgZGlzdGlsbGVkIGludG8gc29tZXRoaW5nIHRoYXQgY291bGQgZml0IGluIHlvdXIgY2xvc2VkIHBhbG0uICdTb21lIHRoaW5ncyBhcmUgd29ydGggbW9yZSBwcmVjaXNlbHkgYmVjYXVzZSBzbyBtdWNoIGdvZXMgaW50byBzbyBsaXR0bGUuJwoKQnJ1bm8gbm9kcywgc2F0aXNmaWVkLiAnVGhhdCdzIGV4YWN0bHkgcmlnaHQuIFNhbWUgY291bGQgcHJvYmFibHkgYmUgc2FpZCBhYm91dCBtb3N0IG9mIHdoYXQgd2UncmUgYWN0dWFsbHkgZG9pbmcgb24gdGhpcyB3aG9sZSB0cmlwLCBpZiB5b3UgdGhpbmsgYWJvdXQgaXQgcHJvcGVybHkuJw==',
            'ending' => true,
        ],
        '8_end_surprised' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gc3VycHJpc2VkIGJ5IGhvdyBsaXR0bGUgaXQgYWN0dWFsbHkgdGFrZXMsJyB5b3UgYWRtaXQsIHR1cm5pbmcgdGhlIHNtYWxsIHBhcGVyIHR3aXN0IG92ZXIgaW4geW91ciBoYW5kcy4gJ0FsbCB0aGF0IHdvcmssIGZvciBzb21ldGhpbmcgdGhpcyBzbWFsbC4nCgpCcnVubyBzbWlsZXMuICdTbWFsbCBkb2Vzbid0IG1lYW4gaW5zaWduaWZpY2FudC4gWW91J2xsIHVuZGVyc3RhbmQgdGhhdCBiZXR0ZXIgYnkgdGhlIHRpbWUgdGhpcyB3aG9sZSByZWNpcGUncyBmaW5hbGx5IGZpbmlzaGVkLCBJIHRoaW5rLicgVGhlIHR3byBvZiB5b3UgaGVhZCBiYWNrIHRvd2FyZCB0aGUgc3RhdGlvbiBhcyBldmVuaW5nIHByb3Blcmx5IHNldHRsZXMgb3ZlciB0aGUgdGVycmFjZWQgaGlsbHMu',
            'ending' => true,
        ],
    ],
];
