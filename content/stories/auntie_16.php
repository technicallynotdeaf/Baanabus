<?php
return [
    'id'    => 16,
    'title' => 'Earn the Rest of It',
    'color' => '#4A5A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UmFwYSBJdGkgaXMgc21hbGxlciBhbmQgbG9uZWxpZXIgdGhhbiBhbG1vc3QgYW55d2hlcmUgeW91J3ZlIHN0b3BwZWQsIGEgc2luZ2xlIHN0ZWVwIHZvbGNhbmljIHJlbW5hbnQgY3Jvd25lZCBieSB0aGUgc3RvbmUgcmVtYWlucyBvZiBhbiBhbmNpZW50IGZvcnRpZmllZCBwxIEg4oCUIHRlcnJhY2VkIHdhbGxzIGNsaW1iaW5nIHRoZSBoaWxsdG9wIGluIHRpZ2h0IGRlZmVuc2l2ZSByaW5ncywgYnVpbHQgYnkgcGVvcGxlIHdobyB0b29rIHRoZSBidXNpbmVzcyBvZiBob2xkaW5nIHRoaXMgb25lIHNtYWxsIGlzbGFuZCBleHRyZW1lbHkgc2VyaW91c2x5LiBTb2xhbmdlIG1lbnRpb25zLCBhbG1vc3QgYXMgYW4gYXNpZGUsIHRoYXQgb3V0c2lkZSBjb250YWN0IGhlcmUgaGFzIGFsd2F5cyBiZWVuIHRoaW4g4oCUIGEgaGFuZGZ1bCBvZiB2aXNpdHMgYSB5ZWFyLCBpZiB0aGF0LgoKVHdvIHdheXMgdXAgdG93YXJkIHRoZSBwxIEgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgZGlyZWN0IGNsaW1iIHN0cmFpZ2h0IHVwIHRoZSBvbGQgZGVmZW5zaXZlIHRlcnJhY2VzLCBzdGVlcCBhbmQgZXhwb3NlZCwgb3IgdGhlIGxvbmdlciB2YWxsZXktZmxvb3IgcGF0aCB0aGF0IGNpcmNsZXMgcm91bmQgdG8gYSBnZW50bGVyIGFwcHJvYWNoIGZyb20gdGhlIHJlYXIu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZGlyZWN0IGNsaW1i', 'next' => '2_climb'],
                ['text' => 'Rm9sbG93IHRoZSB2YWxsZXkgZmxvb3I=', 'next' => '2_valley'],
            ],
        ],
        '2_climb' => [
            'prose'  => 'VGhlIGRpcmVjdCBjbGltYiBpcyBicnV0YWwgYW5kIGhvbmVzdCBhYm91dCBpdCwgb2xkIHRlcnJhY2Ugd2FsbHMgZG91YmxpbmcgYXMgYSBzdGFpcndheSB0aGF0IHdhcyBjbGVhcmx5IG5ldmVyIG1lYW50IHRvIGJlIGNvbWZvcnRhYmxlLCBidWlsdCBmb3IgZGVmZW5kZXJzIHdpdGggYmV0dGVyIGxlZ3MgYW5kIG1vcmUgbW90aXZhdGlvbiB0aGFuIGNhc3VhbCB2aXNpdG9ycy4gWW91IGFycml2ZSBhdCB0aGUgZ2F0ZSBicmVhdGhpbmcgaGFyZCBhbmQgY29uc2lkZXJhYmx5IG1vcmUgcmVzcGVjdGZ1bCBvZiB3aG9ldmVyIGJ1aWx0IHRoaXMuCgpUaGUgQmFyb24sIHdobyBmbGV3IHRoZSB3aG9sZSB3YXksIGhhcyBiZWVuIHdhaXRpbmcgYXQgdGhlIHRvcCBmb3Igc29tZSB0aW1lIGFuZCBtYWtlcyBhYnNvbHV0ZWx5IG5vIGVmZm9ydCB0byBoaWRlIGl0Lg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdhdGU=', 'next' => '3_shared'],
            ],
        ],
        '2_valley' => [
            'prose'  => 'VGhlIHZhbGxleSBwYXRoIGlzIGxvbmdlciwgZ2VudGxlciwgd2luZGluZyB0aHJvdWdoIHNtYWxsIGdhcmRlbnMgYW5kIGEgc2NhdHRlciBvZiBob3VzZXMgd2hlcmUgcGVvcGxlIG5vZCBhdCB5b3Ugd2l0aCB0aGUgcGFydGljdWxhciB1bmh1cnJpZWQgZnJpZW5kbGluZXNzIG9mIGEgcG9wdWxhdGlvbiBzbWFsbCBlbm91Z2ggdGhhdCBldmVyeW9uZSBnZW51aW5lbHkgZG9lcyBrbm93IGV2ZXJ5b25lLiBJdCB0YWtlcyBtb3N0IG9mIHRoZSBtb3JuaW5nLCBidXQgeW91IGFycml2ZSBhdCB0aGUgZ2F0ZSB3aXRoIGJyZWF0aCB0byBzcGFyZSBhbmQgYSBjbGVhcmVyIHNlbnNlIG9mIHRoZSBpc2xhbmQncyB3aG9sZSBzbWFsbCwgd29ya2luZyBzaGFwZS4KCkFuIGVsZGVybHkgd29tYW4gd2VlZGluZyBhIGdhcmRlbiBwbG90IGNhbGxzIG91dCwgdW5wcm9tcHRlZCwgdGhhdCB0aGUgZ2F0ZWtlZXBlciAnZG9lc24ndCBsZXQganVzdCBhbnlvbmUgdXAsIG1pbmQnIOKAlCBkZWxpdmVyZWQgd2l0aCB0aGUgc3BlY2lmaWMgcmVsaXNoIG9mIHNvbWVvbmUgd2hvIGVuam95cyB3YXJuaW5nIHN0cmFuZ2VycyBhYm91dCB0aGluZ3Mgc2xpZ2h0bHkgbW9yZSB0aGFuIHRoZSB3YXJuaW5nIHN0cmljdGx5IHJlcXVpcmVzLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdhdGU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGdhdGUgaXRzZWxmIGlzIGEgZ2FwIGluIHRoZSBvbGQgZGVmZW5zaXZlIHdhbGwsIG5vIG1vcmUgdGhhbiB0aGF0LCBidXQgdGhlIG1hbiBzdGFuZGluZyBpbiBpdCBmaWxscyB0aGUgc3BhY2UgZW50aXJlbHkg4oCUIG5vdCB0aHJvdWdoIHNpemUsIGp1c3QgdGhyb3VnaCB0aGUgcGFydGljdWxhciBzdGlsbG5lc3Mgb2Ygc29tZW9uZSB3aG8gaGFzIHN0b29kIGV4YWN0bHkgaGVyZSwgZGVjaWRpbmcgZXhhY3RseSB0aGlzLCBmb3IgYSB2ZXJ5IGxvbmcgdGltZS4gSGUgZG9lc24ndCBhc2sgd2hvIHlvdSBhcmUuIEhlIGFza3Mgd2hhdCB5b3UncmUgY2FycnlpbmcuCgpZb3Ugc2hvdyBoaW0gdGhlIHNtYWxsIHdvcmtlZCBzdG9uZSBmcm9tIFJhcGEgTnVpIOKAlCBvYnNpZGlhbiBmbGFrZSBvciBjYXJ2ZWQgdG9rZW4sIHdoaWNoZXZlciB5b3UgY2FtZSBhd2F5IHdpdGgg4oCUIGFuZCBzb21ldGhpbmcgaW4gaGlzIGZhY2Ugc2hpZnRzLCByZWNvZ25pdGlvbiBhcnJpdmluZyBzbG93IGFuZCBjZXJ0YWluLiAnTWFyYW1hJ3Mgd29yaywnIGhlIHNheXMsIHR1cm5pbmcgaXQgb3ZlciBvbmNlLiAnQWxsIHJpZ2h0LiBZb3UncmUgcmVhbC4gQ29tZSB1cCBwcm9wZXJseSwgdGhlbiwgYW5kIGVhcm4gdGhlIHJlc3Qgb2YgaXQuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'R28gdXAgcHJvcGVybHk=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SW5zaWRlIHRoZSB3YWxscywgdGhlIHDEgSdzIG9sZCB0ZXJyYWNlcyBhcmUgc3RpbGwgbG92aW5nbHkgbWFpbnRhaW5lZCByYXRoZXIgdGhhbiBtZXJlbHkgcHJlc2VydmVkIOKAlCBhIHdvcmtpbmcgcmVsYXRpb25zaGlwIHdpdGggdGhlIHBhc3QgcmF0aGVyIHRoYW4gYSBtdXNldW0gb2YgaXQuIFRoZSBnYXRla2VlcGVyIHNheXMgdGhlIHdhbGwgd2FudHMgdHdvIGtpbmRzIG9mIGhlbHAgdG9kYXk6IHJlc2V0dGluZyBhIHNlY3Rpb24gb2Ygc3RvbmV3b3JrIHRoYXQncyBzbHVtcGVkIHdpdGggdGhlIGxhc3QgcmFpbnMsIG9yIGhlbHBpbmcgcHJlcGFyZSB0aGUgc21hbGwgb2ZmZXJpbmdzIGxhaWQgb3V0IGZvciBhbiBldmVuaW5nIHJlbWVtYnJhbmNlIHRoYXQgaGFwcGVucywgaGUgc2F5cywgbW9yZSBvZnRlbiB0aGFuIG91dHNpZGVycyB3b3VsZCBndWVzcy4KCidXYWxsJ3MgaG9uZXN0IHdvcmsuIFJlbWVtYnJhbmNlIGlzIGEgZGlmZmVyZW50IGtpbmQuIFBpY2sgd2hpY2hldmVyIHlvdSdyZSBhY3R1YWxseSBzdWl0ZWQgdG8sIG5vdCB3aGljaGV2ZXIgc291bmRzIGJldHRlci4n',
            'choices' => [
                ['text' => 'SGVscCByZXNldCB0aGUgc3RvbmV3b3Jr', 'next' => '5_wall'],
                ['text' => 'SGVscCBwcmVwYXJlIHRoZSByZW1lbWJyYW5jZQ==', 'next' => '5_remembrance'],
            ],
        ],
        '5_wall' => [
            'prose'  => 'UmVzZXR0aW5nIGZhbGxlbiBzdG9uZSBpcyBzbG93LCBiYWNrLWJyZWFraW5nLCBkZWVwbHkgc2F0aXNmeWluZyB3b3JrLCBlYWNoIHBpZWNlIG5lZWRpbmcgdG8gc2l0IGV4YWN0bHkgYXMgaXQgZGlkIGJlZm9yZSBvciB0aGUgd2hvbGUgc2VjdGlvbiBzdGF5cyB3ZWFrLiBUaGUgZ2F0ZWtlZXBlciBjb3JyZWN0cyB5b3VyIHBsYWNlbWVudCB0d2ljZSwgd29yZGxlc3NseSwgaGVmdGluZyBhIHN0b25lIGJhY2sgb3V0IGFuZCBzZXR0aW5nIGl0IGhpbXNlbGYgdG8gc2hvdyB5b3UgdGhlIGRpZmZlcmVuY2UgYmV0d2VlbiBjbG9zZSBlbm91Z2ggYW5kIGFjdHVhbGx5IHJpZ2h0LgoKQnkgdGhlIHRpbWUgdGhlIHNlY3Rpb24ncyBzb2xpZCBhZ2FpbiwgeW91ciBoYW5kcyBhcmUgcmF3IGFuZCB0aGUgd2FsbCBsb29rcywgdW5taXN0YWthYmx5LCBsaWtlIGl0J3MgYmVlbiBwcm9wZXJseSBjYXJlZCBmb3IgcmF0aGVyIHRoYW4gbWVyZWx5IHBhdGNoZWQu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgY29tZXMgbmV4dA==', 'next' => '6_shared'],
            ],
        ],
        '5_remembrance' => [
            'prose'  => 'UHJlcGFyaW5nIHRoZSBldmVuaW5nJ3Mgc21hbGwgcmVtZW1icmFuY2UgaXMgcXVpZXRlciB3b3JrIOKAlCBzcGVjaWZpYyBmbG93ZXJzLCBzcGVjaWZpYyBhcnJhbmdlbWVudCwgbmFtZXMgc3Bva2VuIGFsb3VkIGFzIGVhY2ggcGllY2UgaXMgc2V0IGluIHBsYWNlLCBuYW1lcyBvZiBwZW9wbGUgdGhlIGdhdGVrZWVwZXIgY2xlYXJseSBzdGlsbCBjYXJyaWVzIHdpdGggcmVhbCB3ZWlnaHQgZGVjYWRlcyBvbi4gSGUgZG9lc24ndCBleHBsYWluIHdobyB0aGV5IHdlcmUuIFlvdSBkb24ndCBhc2suCgpCeSB0aGUgZW5kLCBzb21ldGhpbmcgaW4gdGhlIGNhcmVmdWwsIGRlbGliZXJhdGUgc2xvd25lc3Mgb2YgaXQgaGFzIHRhdWdodCB5b3UgbW9yZSBhYm91dCB0aGlzIHNtYWxsLCByZW1vdGUgcGxhY2UgdGhhbiBhbnkgYW1vdW50IG9mIHNpZ2h0c2VlaW5nIGNvdWxkIGhhdmUu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgY29tZXMgbmV4dA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdvcmsgeW91IGRpZCwgdGhlIGdhdGVrZWVwZXIgbGVhZHMgeW91IHRvIGEgc3BlY2lmaWMgc3RvbmUgc2V0IGludG8gdGhlIHDEgSdzIG91dGVyIHdhbGwsIHdvcm4gc21vb3RoIGJ5IGNlbnR1cmllcyBvZiBoYW5kcyBmaW5kaW5nIHRoZSBzYW1lIHNwb3QsIGFuZCB3b3JrcyBpdCBjYXJlZnVsbHkgbG9vc2Ugd2l0aCBhIHBhdGllbmNlIHRoYXQgc2F5cyB0aGlzIGlzbid0IGEgY2FzdWFsIHJlbW92YWwuCgonUHJvb2YgeW91IHdlcmUgcmVhbGx5IGhlcmUsJyBoZSBzYXlzLCBwcmVzc2luZyBpdCBpbnRvIHlvdXIgaGFuZHMuICdOb3QgYSBzb3V2ZW5pci4gQSBrZXkuIFNob3cgaXQsIGZ1cnRoZXIgb24sIHNhbWUgYXMgeW91IHNob3dlZCBtZSBNYXJhbWEncyBzdG9uZSwgYW5kIHdob2V2ZXIgbmVlZHMgdG8ga25vdyB5b3UgcGFzc2VkIHRocm91Z2ggcHJvcGVybHkgd2lsbCBrbm93IGl0Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNrIGRvd24=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciB3YXkgeW91IGRpZG4ndCBjb21lIHVwLCB0aGUgcMSBJ3MgdGVycmFjZWQgd2FsbHMgaG9sZGluZyB0aGVpciBvbGQgZGVmZW5zaXZlIHNoYXBlIGFib3ZlIHlvdSwgdGhlIGlzbGFuZCdzIHNtYWxsIHNjYXR0ZXJlZCBsaWZlIGdvaW5nIG9uIGJlbG93IGV4YWN0bHkgYXMgaXQgaGFzIGZvciBnZW5lcmF0aW9ucyBiZXR3ZWVuIHRoZSByYXJlIGhhbmRmdWwgb2Ygb3V0c2lkZSB2aXNpdHMgYSB5ZWFyLgoKU29sYW5nZSwgd2FpdGluZyBhdCB0aGUgYW5jaG9yYWdlLCB0YWtlcyBvbmUgbG9vayBhdCB0aGUgcMSBIHN0b25lIGFuZCBnb2VzIHVuY2hhcmFjdGVyaXN0aWNhbGx5IHF1aWV0IGZvciBhIG1vbWVudCBiZWZvcmUgc2ltcGx5IG5vZGRpbmcsIG9uY2UsIGFzIHRob3VnaCBzb21ldGhpbmcgYWJvdXQgaXQgc2F0aXNmaWVkIGEgcXVlc3Rpb24gc2hlIGhhZG4ndCBhc2tlZCBvdXQgbG91ZC4=',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgd2hhdCB0aGUgZ2F0ZWtlZXBlciBzYWlkIGFib3V0IGl0', 'next' => '8_end_tell'],
                ['text' => 'SnVzdCBoYW5kIGl0IG92ZXIgYW5kIGxldCBpdCBzcGVhayBmb3IgaXRzZWxm', 'next' => '8_end_silent'],
            ],
        ],
        '8_end_tell' => [
            'prose'  => 'WW91IHRlbGwgaGVyLCB0aGUgd2hvbGUgZXhjaGFuZ2UsIHRoZSB3YWxsIG9yIHRoZSByZW1lbWJyYW5jZSwgdGhlIHN0b25lIHdvcmtlZCBsb29zZSBmcm9tIGEgd2FsbCBjZW50dXJpZXMgaW4gdGhlIHN0YW5kaW5nLiBTaGUgbGlzdGVucyBhbGwgdGhlIHdheSB0aHJvdWdoIHdpdGhvdXQgYSBzaW5nbGUgaW50ZXJydXB0aW9uLCB3aGljaCBmcm9tIFNvbGFuZ2UgY291bnRzIGFzIHJhcHQgYXR0ZW50aW9uLgoKJ0dvb2QgaXNsYW5kLCcgc2hlIHNheXMgZmluYWxseS4gJ0RvZXNuJ3QgbGV0IG11Y2ggaW4uIEdvb2Qgc2lnbiwgd2hlbiBpdCBkb2VzLCB0aGF0IGl0IGxldCB5b3UgaW4gcHJvcGVybHkuJyBTaGUgc2F5cyBpdCBsaWtlIHNoZSBtZWFucyBldmVyeSB3b3JkLCB3aGljaCwgZnJvbSBoZXIsIGlzIHRoZSB3aG9sZSByZXZpZXcgYW55Ym9keSBuZWVkcy4=',
            'ending' => true,
        ],
        '8_end_silent' => [
            'prose'  => 'WW91IGp1c3QgaGFuZCBpdCBvdmVyLCBsZXR0aW5nIHRoZSBzdG9uZSBpdHNlbGYgZG8gd2hhdGV2ZXIgdGFsa2luZyBuZWVkcyBkb2luZywgYW5kIFNvbGFuZ2UsIHR1cm5pbmcgaXQgb3ZlciBpbiBoZXIgcGFsbSwgc2VlbXMgZW50aXJlbHkgY29udGVudCB0byByZWNlaXZlIGl0IHRoYXQgd2F5IOKAlCBubyBzdG9yeSByZXF1aXJlZCwgdGhlIG9iamVjdCdzIG93biB3ZWlnaHQgYW5kIGhpc3RvcnkgYXBwYXJlbnRseSBzdWZmaWNpZW50LgoKVGhlIEvFjXR1a3UgbGlmdHMgb2ZmIFJhcGEgSXRpJ3Mgc2luZ2xlIHN0ZWVwIHNpbGhvdWV0dGUgc2hyaW5raW5nIGZhc3QgaW50byBvcGVuIHdhdGVyLCBhbmQgeW91IGZpbmQgdGhhdCBzb21lIHBsYWNlcywgaXQgdHVybnMgb3V0LCBhcmUgYmVzdCBjYXJyaWVkIGZvcndhcmQgZXhhY3RseSBhcyBxdWlldGx5IGFzIHRoZXkgd2VyZSBnaXZlbiDigJQgbm8gbmFycmF0aW9uIG5lZWRlZCwganVzdCB0aGUgc3RvbmUsIHJpZGluZyBzYWZlIGluIHRoZSBzYXRjaGVsLCBkb2luZyBwcmVjaXNlbHkgd2hhdCBpdCB3YXMgaGFuZGVkIG92ZXIgdG8gZG8u',
            'ending' => true,
        ],
    ],
];
