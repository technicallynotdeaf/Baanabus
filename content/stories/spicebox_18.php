<?php
return [
    'id'    => 18,
    'title' => 'Quieter Questions',
    'color' => '#7A5A9A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGJpbGlzaSdzIG9sZCB0b3duIHR1bWJsZXMgZG93biBpdHMgaGlsbHNpZGUgaW4gYSBnZW51aW5lIGp1bWJsZSBvZiBiYWxjb25pZWQgaG91c2VzIGFuZCBzdWxmdXItYmF0aGhvdXNlIGRvbWVzLCB0aGUgTXRrdmFyaSBSaXZlciBjdXR0aW5nIHRocm91Z2ggdGhlIG1pZGRsZSBvZiBpdCBhbGwgdW5kZXIgYSBza3kgZ29uZSBzb2Z0IHdpdGggZWFybHkgZXZlbmluZy4gQnJ1bm8gbWVudGlvbnMgdGhlIGZhbWlseSB5b3UncmUgYWZ0ZXIgYmxlbmRzIGEgc3BpY2UgbWl4IHVubGlrZSBhbnl0aGluZyBlbmNvdW50ZXJlZCBvbiB0aGUgd2hvbGUgdHJpcCBzbyBmYXIuCgpUd28gb2xkLXRvd24gcm91dGVzIHRvd2FyZCB0aGVpciBzaG9wIHByZXNlbnQgdGhlbXNlbHZlczogZG93biB0aHJvdWdoIHRoZSB3aW5kaW5nIGJhbGNvbnkgc3RyZWV0cywgb3IgYWxvbmcgdGhlIHJpdmVyc2lkZSBwYXRoIGJlbG93Lg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgd2luZGluZyBiYWxjb255IHN0cmVldHM=', 'next' => '2_balcony'],
                ['text' => 'Rm9sbG93IHRoZSByaXZlcnNpZGUgcGF0aA==', 'next' => '2_river'],
            ],
        ],
        '2_balcony' => [
            'prose'  => 'VGhlIGJhbGNvbnkgc3RyZWV0cyB3aW5kIHN0ZWVwbHkgZG93bndhcmQsIGNhcnZlZCB3b29kZW4gYmFsY29uaWVzIGxlYW5pbmcgY2xvc2Ugb3ZlcmhlYWQgaW4gYSB3YXkgdGhhdCBmZWVscyBhbG1vc3QgY29uc3BpcmF0b3JpYWwsIHRoZSB3aG9sZSBvbGQgdG93bidzIGhpc3RvcnkgcHJlc3NpbmcgaW4gZnJvbSBldmVyeSBkaXJlY3Rpb24uIFlvdSBuYXZpZ2F0ZSBpdCBjYXJlZnVsbHksIHRoZSBzaG9wJ3MgYWRkcmVzcyBmaW5hbGx5IGFwcGVhcmluZyBhdCBhIHF1aWV0IGNvcm5lci4=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHNob3A=', 'next' => '3_shared'],
            ],
        ],
        '2_river' => [
            'prose'  => 'VGhlIHJpdmVyc2lkZSBwYXRoIHJ1bnMgbGV2ZWwgYW5kIGVhc3kgYmVsb3cgdGhlIG9sZCB0b3duJ3Mgc3RlZXAgdGFuZ2xlLCB0aGUgTXRrdmFyaSBtb3ZpbmcgZGFyayBhbmQgdW5odXJyaWVkIGFsb25nc2lkZSB5b3UgdGhlIHdob2xlIHdhbGsuIEl0J3MgYSBnZW50bGVyIHJvdXRlLCBhbmQgeW91IHJlYWNoIHRoZSBzaG9wJ3MgY29ybmVyIHdpdGggcGxlbnR5IG9mIGRheWxpZ2h0IGxlZnQu',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHNob3A=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHNob3AgYmVsb25ncyB0byB0aGUgQ2hpa292YW5pIGZhbWlseSwgYmxlbmRlcnMgb2Yga2htZWxpIHN1bmVsaSBmb3IgZm91ciBnZW5lcmF0aW9ucywgYSBtaXggdW5saWtlIGFueXRoaW5nIHlvdSd2ZSBlbmNvdW50ZXJlZCBhbnl3aGVyZSBlbHNlIG9uIHRoZSB0cmlwIOKAlCBkcmllZCBtYXJpZ29sZCBwZXRhbHMsIGZlbnVncmVlaywgY29yaWFuZGVyLCBhbmQgc2V2ZXJhbCBoZXJicyB3aG9zZSBuYW1lcyB5b3UgZG9uJ3QgcmVjb2duaXNlIGF0IGFsbC4gVGhlIGVsZGVyIHNvbiwgTGV2YW4sIGdyZWV0cyB5b3Ugd2FybWx5LCB0aGVuIHBhdXNlcy4KCidPZGQgdGhpbmcsJyBoZSBzYXlzLiAnQSBqb3VybmFsaXN0IGNhbWUgdGhyb3VnaCByZWNlbnRseS4gRGlmZmVyZW50IGZyb20gdGhlIHVzdWFsIHNvcnQsIHRob3VnaCDigJQgcXVpZXRlci4gQXNrZWQgb2RkbHkgY2FyZWZ1bCBxdWVzdGlvbnMuIERpZG4ndCBmaWxtIGFueXRoaW5nLiBEaWRuJ3Qgc2VlbSB0byB3YW50IGEgc3Rvcnkgc28gbXVjaCBhcyBhbiBhY3R1YWwgYW5zd2VyLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2hlIHdhbnRlZCB0byBrbm93', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'TGV2YW4gY29uc2lkZXJzIGhvdyBtdWNoIHRvIGFjdHVhbGx5IHNoYXJlLCB0aGVuIG9mZmVycyB0d28gd2F5cyB0byBwcm9wZXJseSBzYXRpc2Z5IHlvdXIgY3VyaW9zaXR5OiBkZXNjcmliZSBoZXIgdmlzaXQgYW5kIGhlciBjYXJlZnVsLCB1bnVzdWFsIHF1ZXN0aW9ucyBpbiBmdWxsIGRldGFpbCwgb3Igc2ltcGx5IGhhbmQgeW91IHRoZSBzYW1lIGJsZW5kIHNoZSBhc2tlZCBhYm91dCBhbmQgbGV0IHlvdSB0YXN0ZSB5b3VyIG93biB3YXkgdG93YXJkIHVuZGVyc3RhbmRpbmcgd2hhdCBzaGUgbWlnaHQgaGF2ZSBhY3R1YWxseSBiZWVuIGNoYXNpbmcuCgonRWl0aGVyIHRlbGxzIHlvdSBzb21ldGhpbmcgdHJ1ZSBhYm91dCBoZXIsJyBoZSBzYXlzLiAnU3RvcnksIG9yIHRhc3RlLiBZb3VyIGNob2ljZS4n',
            'choices' => [
                ['text' => 'SGVhciBoZXIgdmlzaXQgZGVzY3JpYmVkIGluIGZ1bGw=', 'next' => '5_hear'],
                ['text' => 'VGFzdGUgdGhlIGJsZW5kIGFuZCBqdWRnZSBmb3IgeW91cnNlbGY=', 'next' => '5_taste'],
            ],
        ],
        '5_hear' => [
            'prose'  => 'TGV2YW4gZGVzY3JpYmVzIGhlciB2aXNpdCBjYXJlZnVsbHkg4oCUIHNoZSdkIGFza2VkLCBhcHBhcmVudGx5LCBub3QgYWJvdXQgcmF0aW9zIG9yIG9yaWdpbiBzdG9yaWVzIGZvciBhIHBpZWNlLCBidXQgYWJvdXQgd2hhdCBtYWRlIGEgYmxlbmQgZmVlbCBob25lc3QgcmF0aGVyIHRoYW4gcGVyZm9ybWVkLCBhIHF1ZXN0aW9uIHRoYXQgaGFkIHZpc2libHkgY2F1Z2h0IHRoZSB3aG9sZSBmYW1pbHkgb2ZmIGd1YXJkIGJ5IGl0cyBzaW5jZXJpdHkuCgonRGlmZmVyZW50IHF1ZXN0aW9ucyB0aGFuIHdlJ3JlIHVzZWQgdG8sJyBMZXZhbiBzYXlzLiAnTWFkZSB1cyB3b25kZXIgaWYgc29tZXRoaW5nJ3Mgc2hpZnRlZCBpbiBoZXIsIGFjdHVhbGx5Lic=',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUga2htZWxpIHN1bmVsaQ==', 'next' => '6_shared'],
            ],
        ],
        '5_taste' => [
            'prose'  => 'VGFzdGluZyB0aGUga2htZWxpIHN1bmVsaSB5b3Vyc2VsZiwgd2FybSBhbmQgaGVyYmFsIGFuZCBmYWludGx5IGZsb3JhbCBmcm9tIHRoZSBtYXJpZ29sZCwgeW91IHN0YXJ0IHRvIHVuZGVyc3RhbmQgdGhlIHF1ZXN0aW9uIFNlbGluIHdhcyBhcHBhcmVudGx5IGNpcmNsaW5nIHdpdGhvdXQgTGV2YW4gbmVlZGluZyB0byBzcGVsbCBpdCBvdXQg4oCUIHRoaXMgYmxlbmQgZG9lc24ndCBhbm5vdW5jZSBpdHNlbGYgbG91ZGx5LiBJdCBzaW1wbHksIHF1aWV0bHksIGlzIHdoYXQgaXQgaXMsIHJhdGlvIGFuZCByZXN0cmFpbnQgYm90aC4KClNvbWV0aGluZyBhYm91dCB0aGF0IGZlZWxzIGxpa2UgZXhhY3RseSB0aGUga2luZCBvZiBob25lc3R5IGEgcGVyc29uIGNoYXNpbmcgc3BlY3RhY2xlIG1pZ2h0IGZpbmFsbHkgYmUgc3RhcnRpbmcgdG8gbm90aWNlLg==',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUga2htZWxpIHN1bmVsaQ==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'TGV2YW4gcGFja2FnZXMgYSBnZW5lcm91cyBtZWFzdXJlIG9mIGtobWVsaSBzdW5lbGksIHN0aWxsIGZhaW50bHkgZmxvcmFsIHRocm91Z2ggdGhlIHdyYXAuICdXaGF0ZXZlciBzaGUncyBhY3R1YWxseSBsb29raW5nIGZvciBub3csJyBoZSBzYXlzLCAnaXQgZmVsdCBkaWZmZXJlbnQgZnJvbSB3aGF0ZXZlciBzaGUgdXNlZCB0byB3YW50LiBDYW4ndCBzYXkgZm9yIGNlcnRhaW4uIEJ1dCBpdCBmZWx0IGRpZmZlcmVudC4nCgpIZSBhZGRzLCBhbG1vc3QgYXMgYW4gYWZ0ZXJ0aG91Z2h0OiAnSWYgeW91ciBwYXRocyBjcm9zcyBhZ2FpbiwgdGVsbCBoZXIgdGhlIG1hcmlnb2xkJ3Mgc3RpbGwgaGVyZSwgd2hlbmV2ZXIgc2hlJ3MgcmVhZHkgdG8gYWN0dWFsbHkgdGFzdGUgaXQgcHJvcGVybHkgaW5zdGVhZCBvZiBqdXN0IGZpbG1pbmcgaXQuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNsaW1iIGJhY2sgdXAgdGhyb3VnaCB0aGUgb2xkIHRvd24gYXMgZXZlbmluZyBwcm9wZXJseSBzZXR0bGVzLCB0aGUga2htZWxpIHN1bmVsaSBzZWN1cmUgaW4gaXRzIHdyYXAsIHRoZSBNdGt2YXJpIGNhdGNoaW5nIHRoZSBsYXN0IGxvdyBsaWdodCBiZWxvdy4gQnJ1bm8ncyBiZWVuIHR1cm5pbmcgc29tZXRoaW5nIG92ZXIgdGhlIHdob2xlIHdhbGssIGZpbmFsbHkgc3BlYWtpbmcgYXMgdGhlIGJhbGNvbmllcyBjbG9zZSBpbiBhcm91bmQgeW91IGJvdGguCgonSXN0YW5idWwncyBuZXh0LCcgaGUgc2F5cyBxdWlldGx5LiAnSWYgc2hlJ3MgYWN0dWFsbHkgY2hhbmdpbmcsIHdlJ2xsIGZpbmQgb3V0IHByb3Blcmx5IHRoZXJlLiBSZWNpcGUgY2FyZCBzYXlzIHRoZSBiYXphYXIncyBwcmFjdGljYWxseSBleHBlY3RpbmcgaGVyLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBjYXV0aW91c2x5IGhvcGVmdWwgYWJvdXQgdGhhdA==', 'next' => '8_end_hopeful'],
                ['text' => 'U2F5IHlvdSdsbCB3YWl0IGFuZCBzZWUgYmVmb3JlIGhvcGluZyBmb3IgYW55dGhpbmc=', 'next' => '8_end_wait'],
            ],
        ],
        '8_end_hopeful' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gY2F1dGlvdXNseSBob3BlZnVsIGFib3V0IHRoYXQsJyB5b3UgYWRtaXQsIHRoaW5raW5nIG9mIExldmFuJ3MgY2FyZWZ1bCwgY29uc2lkZXJlZCBhY2NvdW50IG9mIGhlciBxdWlldGVyLCBtb3JlIHNpbmNlcmUgcXVlc3Rpb25zLiAnUGVvcGxlIGNhbiBhY3R1YWxseSBjaGFuZ2UsIHNvbWV0aW1lcywgaWYgdGhlIHJpZ2h0IHRoaW5nIGZpbmFsbHkgZ2V0cyB0aHJvdWdoIHRvIHRoZW0uJwoKQnJ1bm8gbm9kcyBzbG93bHkuICdDYXV0aW91cyBpcyB0aGUgcmlnaHQgd29yZCBmb3IgaXQuIEhvcGUsIGJ1dCBkb24ndCBiZXQgdGhlIHdob2xlIHRyaXAgb24gaXQuIFdlJ2xsIHNlZSB3aGF0IElzdGFuYnVsIGFjdHVhbGx5IHNob3dzIHVzLic=',
            'ending' => true,
        ],
        '8_end_wait' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ2xsIHdhaXQgYW5kIHNlZSBiZWZvcmUgaG9waW5nIGZvciBhbnl0aGluZywnIHlvdSBzYXksIHRoaW5raW5nIG9mIEphdmEncyBzdGlsbC11bnB1Ymxpc2hlZCBwcm9taXNlcyBhbmQgT2F4YWNhJ3MgdW5lYXN5IHRydWNlLiAnT25lIHF1aWV0IHZpc2l0IGRvZXNuJ3QgdW5kbyBhIHdob2xlIHBhdHRlcm4uIElzdGFuYnVsIHdpbGwgdGVsbCB1cyBtb3JlIHRoYW4gdGhpcyBkaWQuJwoKQnJ1bm8gZG9lc24ndCBhcmd1ZSB0aGUgY2F1dGlvbi4gJ0ZhaXIgZW5vdWdoLiBXYWl0IGFuZCBzZWUsIHRoZW4uIFRoZSBNdGt2YXJpJ3Mgbm90IGdvaW5nIGFueXdoZXJlLCBhbmQgbmVpdGhlciBpcyB0aGUgdHJ1dGggYWJvdXQgaGVyLCB3aGF0ZXZlciBpdCB0dXJucyBvdXQgdG8gYmUuJyBUaGUgcml2ZXIgbW92ZXMgb24gcXVpZXRseSBiZWxvdyBhcyB0aGUgb2xkIHRvd24ncyBsaWdodHMgY29tZSB1cCBhcm91bmQgeW91Lg==',
            'ending' => true,
        ],
    ],
];
