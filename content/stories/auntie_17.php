<?php
return [
    'id'    => 17,
    'title' => 'Some Pages Take Longer',
    'color' => '#7A5A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UGl0Y2Fpcm4gYW5ub3VuY2VzIGl0c2VsZiB0aGUgd2F5IGl0J3Mgc3VwcG9zZWQgdG8g4oCUIG5vIGFpcnN0cmlwLCBubyBlYXN5IGhhcmJvdXIsIGp1c3QgYSBzaW5nbGUgc3RlZXAgZ2FzaCBvZiBhIGxhbmRpbmcgYXQgQm91bnR5IEJheSBhbmQgYSBwb3B1bGF0aW9uIHRoYXQgY291bGQgZml0IGluIG9uZSBsYXJnZSByb29tLCBkZXNjZW5kYW50cyBvZiBhIG11dGlueSB0aGF0IGhhcHBlbmVkIHNvIGxvbmcgYWdvIGl0J3MgdHVybmVkIGZyb20gc2NhbmRhbCBpbnRvIHNpbXBseSB3aGVyZSBldmVyeW9uZSdzIGZyb20uIFNvbGFuZ2UsIGJyaW5naW5nIHRoZSBLxY10dWt1IGluIHdpdGggbW9yZSB0aGFuIGhlciB1c3VhbCBjYXJlLCBwb2ludHMgb3V0IGEgc2Vjb25kIHZlc3NlbCBhbHJlYWR5IG1vb3JlZCBjbG9zZSBieSwgb25lIHlvdSBib3RoIHJlY29nbmlzZSBpbW1lZGlhdGVseS4KCidUaGV5J3JlIGhlcmUsJyBzaGUgc2F5cywgbWVhbmluZyB0aGUgcml2YWwsIGZsYXQgYW5kIHVuc3VycHJpc2VkLiAnRmlyc3QgdGltZSB0aGlzIHdob2xlIHRyaXAgd2UndmUgYWN0dWFsbHkgbGFuZGVkIGF0IHRoZSBzYW1lIHBsYWNlLCBzYW1lIGRheS4nIFR3byB3YXlzIHVwIGZyb20gdGhlIGxhbmRpbmcgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgZmFtb3VzIEhpbGwgb2YgRGlmZmljdWx0eSwgc3RlZXAgYW5kIGRpcmVjdCwgb3IgdGhlIGxvbmdlciB0cmFjayB0aGF0IGxvb3BzIHJvdW5kIHBhc3QgdGhlIHNldHRsZW1lbnQncyBnYXJkZW5zIGZpcnN0Lg==',
            'choices' => [
                ['text' => 'Q2xpbWIgdGhlIEhpbGwgb2YgRGlmZmljdWx0eQ==', 'next' => '2_hill'],
                ['text' => 'VGFrZSB0aGUgZ2FyZGVuIHRyYWNr', 'next' => '2_garden'],
            ],
        ],
        '2_hill' => [
            'prose'  => 'VGhlIEhpbGwgb2YgRGlmZmljdWx0eSBlYXJucyBpdHMgbmFtZSBob25lc3RseSwgYSBicnV0YWwgY2xpbWIgdGhhdCdzIGNsZWFybHkgY2xhaW1lZCB0aGUgZGlnbml0eSBvZiBldmVyeSB2aXNpdG9yIHdobydzIGV2ZXIgdHJpZWQgdG8gbG9vayBjb21wb3NlZCBhdCB0aGUgdG9wIG9mIGl0LiBZb3UgYXJyaXZlIGJyZWF0aGxlc3MsIHNhbHQtc3RyZWFrZWQsIGFuZCBjb25zaWRlcmFibHkgbW9yZSBzeW1wYXRoZXRpYyB0byB0d28gY2VudHVyaWVzIG9mIHBlb3BsZSB3aG8gbWFkZSB0aGlzIGV4YWN0IGNsaW1iIGNhcnJ5aW5nIGNvbnNpZGVyYWJseSBtb3JlIHRoYW4geW91IGFyZS4KCkEgd29tYW4gc3dlZXBpbmcgaGVyIGZyb250IHN0ZXAgZGlyZWN0cyB5b3Ugb253YXJkIHdpdGhvdXQgbmVlZGluZyBtdWNoIGV4cGxhbmF0aW9uLiAnQXJjaGl2ZSdzIHBhc3QgdGhlIHNxdWFyZS4gWW91ciBjb21wZXRpdGlvbidzIGFscmVhZHkgdXAgdGhlcmUsIGZvciB3aGF0IGl0J3Mgd29ydGguJyBTaGUgc2F5cyBjb21wZXRpdGlvbiB3aXRoIGEgcmFpc2VkIGV5ZWJyb3cgdGhhdCBzdWdnZXN0cyB0aGUgd2hvbGUgdGlueSBpc2xhbmQgYWxyZWFkeSBrbm93cyB0aGUgc2hhcGUgb2YgeW91ciByYWNlIGJldHRlciB0aGFuIHlvdSdkIGV4cGVjdC4=',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIGFyY2hpdmU=', 'next' => '3_shared'],
            ],
        ],
        '2_garden' => [
            'prose'  => 'VGhlIGdhcmRlbiB0cmFjayBsb29wcyBnZW50bHkgcGFzdCBzbWFsbCwgZmllcmNlbHkgdGVuZGVkIHBsb3RzLCBicmVhZGZydWl0IGFuZCBjaXRydXMgZG9pbmcgdGhlaXIgYmVzdCBhZ2FpbnN0IHRoaW4gc29pbCBhbmQgY29uc3RhbnQgc2FsdCB3aW5kLCBzZXZlcmFsIHBlb3BsZSBsb29raW5nIHVwIHRvIG5vZCBhdCB5b3Ugd2l0aCB0aGUgc3BlY2lmaWMgd2FybXRoIG9mIGFuIGlzbGFuZCB3aGVyZSBhIHN0cmFuZ2VyIGlzIHN0aWxsLCBnZW51aW5lbHksIGFuIGV2ZW50LgoKQW4gb2xkZXIgbWFuIHdlZWRpbmcgbWV0aG9kaWNhbGx5IG1lbnRpb25zLCB1bnByb21wdGVkLCB0aGF0ICd0aGUgb3RoZXIgb25lJyBhcnJpdmVkIGFuIGhvdXIgb3Igc28gYWhlYWQgb2YgeW91IGFuZCB3ZW50IHN0cmFpZ2h0IHVwIHRvIHRoZSBhcmNoaXZlLCBsb29raW5nLCBpbiBoaXMgd29yZHMsICdsaWtlIHRoZXknZCBzZWVuIGEgZ2hvc3QgYmVmb3JlIHRoZXknZCBldmVuIGdvdCB0aGVyZS4n',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIGFyY2hpdmU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGFyY2hpdmUgaXMgb25lIHJvb20gYWJvdmUgdGhlIGdlbmVyYWwgc3RvcmUsIHNoZWx2ZWQgd2l0aCByZWdpc3RlcnMgZ29pbmcgYmFjayBnZW5lcmF0aW9ucyDigJQgYmlydGhzLCBtdXRpbmVlcnMnIGRlc2NlbmRhbnRzLCB0aGUgd2hvbGUgc21hbGwgdGFuZ2xlZCBmYW1pbHkgdHJlZSBvZiBhbiBpc2xhbmQgd2hlcmUgYWxtb3N0IGV2ZXJ5b25lIGlzLCBvbmUgd2F5IG9yIGFub3RoZXIsIHJlbGF0ZWQuIFRoZSByaXZhbCBpcyBhbHJlYWR5IHRoZXJlLCBzZWF0ZWQsIHZlcnkgc3RpbGwsIGluIGZyb250IG9mIGFuIG9wZW4gbGVkZ2VyLCBhbmQgZG9lc24ndCBsb29rIHVwIHJpZ2h0IGF3YXkgd2hlbiB5b3UgY29tZSBpbi4KClRoZSByZWNvcmQtaG9sZGVyLCBhbiB1bmh1cnJpZWQgd29tYW4gd2hvIGNsZWFybHkgcnVucyB0aGlzIHdob2xlIHJvb20gdGhlIHdheSBhIGNhcHRhaW4gcnVucyBhIHNoaXAsIGdpdmVzIHlvdSBhIHNpbmdsZSBtZWFzdXJpbmcgZ2xhbmNlLiAnR2l2ZSB0aGVtIGEgbWludXRlLCcgc2hlIHNheXMgcXVpZXRseSwgbWVhbmluZyB0aGUgcml2YWwsIG5vdCB1bmtpbmRseS4gJ1NvbWUgcGFnZXMgdGFrZSBsb25nZXIgdG8gZmluaXNoIHJlYWRpbmcgdGhhbiBvdGhlcnMuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'V2FpdCBxdWlldGx5', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIHJpdmFsIGNsb3NlcyB0aGUgbGVkZ2VyIGV2ZW50dWFsbHksIGNhcmVmdWxseSwgdGhlIHBhcnRpY3VsYXIgY2FyZWZ1bG5lc3Mgb2Ygc29tZW9uZSBoYW5kbGluZyBzb21ldGhpbmcgdGhhdCdzIGp1c3QgYmVjb21lIG11Y2ggaGVhdmllciB0aGFuIGEgYm91bmQgc3RhY2sgb2YgcGFwZXIuIFRoZXkgZG9uJ3QgZXhwbGFpbiwgYW5kIHlvdSBkb24ndCBhc2sg4oCUIGp1c3QgYSBicmllZiwgdW5yZWFkYWJsZSBsb29rIHBhc3NlZCBiZXR3ZWVuIHR3byBwZW9wbGUgd2hvJ3ZlIHNwZW50IG1vc3Qgb2YgdGhpcyB3aG9sZSBqb3VybmV5IHJhY2luZyBlYWNoIG90aGVyIGFuZCBoYXZlLCBmb3IgdGhpcyBvbmUgc3RyYW5nZSBob3VyLCBzdG9wcGVkLgoKVGhlIHJlY29yZC1ob2xkZXIsIG9uY2UgdGhlIHJvb20gc2V0dGxlcywgdHVybnMgaGVyIGF0dGVudGlvbiB0byB5b3VyIG93biBlcnJhbmQuICdCb3VudHkgdGltYmVyLCcgc2hlIHNheXMuICdXZSd2ZSBnb3QgcGllY2VzIGNhdGFsb2d1ZWQgYW5kIHBpZWNlcyBub3QsIGFuZCBJIGNvdWxkIHVzZSBoYW5kcyBmb3IgZWl0aGVyIOKAlCBjYXJlZnVsIGNhdGFsb2d1aW5nIHdvcmsgaW5kb29ycywgb3IgY2xlYXJpbmcgdGhlIG92ZXJncm93biB0cmFjayBvdXQgdG8gd2hlcmUgdGhlIG9sZCB3cmVjayB0aW1iZXIncyBzdG9yZWQuIFdoaWNoIHN1aXRzIHlvdT8n',
            'choices' => [
                ['text' => 'SGVscCB3aXRoIHRoZSBjYXJlZnVsIGNhdGFsb2d1aW5n', 'next' => '5_catalogue'],
                ['text' => 'SGVscCBjbGVhciB0aGUgdHJhY2sgdG8gdGhlIHRpbWJlciBzdG9yZQ==', 'next' => '5_clear'],
            ],
        ],
        '5_catalogue' => [
            'prose'  => 'Q2F0YWxvZ3VpbmcgZnJhZ2lsZSwgY2VudHVyaWVzLW9sZCB0aW1iZXIgZnJhZ21lbnRzIGlzIHNsb3csIGV4YWN0aW5nIHdvcmssIGVhY2ggcGllY2UgaGFuZGxlZCBsaWtlIGl0IG1pZ2h0IG5vdCBzdXJ2aXZlIGNhcmVsZXNzIGhhbmRzLCBudW1iZXJzIGFuZCBwcm92ZW5hbmNlIG5vdGVzIGNoZWNrZWQgdHdpY2UgYWdhaW5zdCBhIHJlZ2lzdGVyIHRoYXQncyBjbGVhcmx5IGJlZW4gbWFpbnRhaW5lZCB3aXRoIHJlYWwgbG92ZSBmb3IgYSB2ZXJ5IGxvbmcgdGltZS4KCkFjcm9zcyB0aGUgcm9vbSwgdGhlIHJpdmFsIHNpdHMgYSB3aGlsZSBsb25nZXIsIHNheWluZyBsaXR0bGUsIGJlZm9yZSBldmVudHVhbGx5IHJpc2luZyBhbmQgdGhhbmtpbmcgdGhlIHJlY29yZC1ob2xkZXIgd2l0aCB1bnVzdWFsIGZvcm1hbGl0eSDigJQgdGhlIGtpbmQgb2YgdGhhbmtzIHRoYXQgbWVhbnMgY29uc2lkZXJhYmx5IG1vcmUgdGhhbiBpdHMgb3duIGJyaWVmIHdvcmRpbmcu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgc2hlIGdpdmVzIHlvdQ==', 'next' => '6_shared'],
            ],
        ],
        '5_clear' => [
            'prose'  => 'Q2xlYXJpbmcgdGhlIG92ZXJncm93biB0cmFjayBvdXQgdG8gdGhlIHRpbWJlciBzdG9yZSBpcyBob3QsIHN0cmFpZ2h0Zm9yd2FyZCwgc2F0aXNmeWluZyB3b3JrLCBtYWNoZXRlIGFuZCBwYXRpZW5jZSBhZ2FpbnN0IGdyb3d0aCB0aGF0J3MgY2xlYXJseSByZWNsYWltZWQgdGhlIHBhdGggbW9yZSB0aGFuIG9uY2UgYmVmb3JlLiBCeSB0aGUgdGltZSBpdCdzIHBhc3NhYmxlIGFnYWluLCB5b3UncmUgc2NyYXRjaGVkIGFuZCBzd2VhdGluZyBhbmQgY2FuIHNlZSwgYXQgdGhlIHRyYWNrJ3MgZW5kLCBhIHNtYWxsIGxvY2tlZCBzaGVkIGhvbGRpbmcgd2hhdGV2ZXIncyBsZWZ0IG9mIGEgdmVyeSBmYW1vdXMgc2hpcC4KClRoZSByaXZhbCwgc3RpbGwgaW5zaWRlIGF0IHRoZSBhcmNoaXZlIGFzIHlvdSBmaW5pc2gsIGV2ZW50dWFsbHkgZW1lcmdlcywgcXVpZXRlciB0aGFuIHlvdSd2ZSBldmVyIHNlZW4gdGhlbSwgYW5kIHNpbXBseSBub2RzIG9uY2UgaW4geW91ciBkaXJlY3Rpb24gYmVmb3JlIGhlYWRpbmcgb2ZmIGFsb25lIHRvd2FyZCB0aGUgZ2FyZGVucy4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgc2hlIGdpdmVzIHlvdQ==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIHJlY29yZC1ob2xkZXIgc2VsZWN0cywgZnJvbSBhIHNtYWxsIGxvY2tlZCBjYXNlLCBhIG1vZGVzdCBjYXJ2ZWQgcGllY2Ugb2YgdGltYmVyIOKAlCBzYWlkLCB3aXRoIHRoZSBwYXJ0aWN1bGFyIFBpdGNhaXJuIHNocnVnIHRoYXQgbmVpdGhlciBjbGFpbXMgbm9yIGRpc2NsYWltcyBjZXJ0YWludHksIHRvIGJlIGdlbnVpbmUgQm91bnR5IHdvb2QsIHNoYXBlZCB5ZWFycyBiYWNrIGludG8gc29tZXRoaW5nIHBvY2tldC1zaXplZCBhbmQgbWVhbnQgZm9yIGNhcnJ5aW5nLCBub3QgZGlzcGxheS4gJ1Byb29mLW9mLXBhc3NhZ2UsIHRoaXMsJyBzaGUgc2F5cywgaGFuZGluZyBpdCBvdmVyLiAnV2hldGhlciBpdCdzIHJlYWxseSB3aGF0IHBlb3BsZSBzYXkgaXQgaXMgbWF0dGVycyBsZXNzIHRoYW4gd2hhdCBpdCdzIGNvbWUgdG8gbWVhbiBieSBub3cuIE1vc3QgZ29vZCBrZWVwc2FrZXMgZW5kIHVwIHRoYXQgd2F5LicKClNoZSBnbGFuY2VzLCBicmllZmx5LCB0b3dhcmQgdGhlIGRvb3IgdGhlIHJpdmFsIHdlbnQgb3V0LiAnVGhhdCBvbmUncyBnb3QgYSBsb25nZXIgcm9hZCBhaGVhZCB0aGFuIGVpdGhlciBvZiB5b3UgcHJvYmFibHkgcGxhbm5lZCBmb3IuIE5vdCB5b3VycyB0byBjYXJyeSwgdGhvdWdoLiBFdmVyeW9uZSdzIGdvdCB0aGVpciBvd24uJw==',
            'choices' => [
                ['text' => 'SGVhZCBiYWNrIGRvd24gdG8gdGhlIGFuY2hvcmFnZQ==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciB3YXkgeW91IGRpZG4ndCBjb21lIHVwLCB0aGUgSGlsbCBvZiBEaWZmaWN1bHR5IG9yIHRoZSBnYXJkZW4gdHJhY2ssIFBpdGNhaXJuJ3Mgd2hvbGUgc21hbGwgdGFuZ2xlZCBoaXN0b3J5IHNldHRsaW5nIGRpZmZlcmVudGx5IGluIHlvdSB0aGFuIGl0IGRpZCBvbiB0aGUgd2F5IHVwLiBUaGUgcml2YWwncyBib2F0IGlzIHN0aWxsIG1vb3JlZCBjbG9zZSB0byB0aGUgS8WNdHVrdSB3aGVuIHlvdSByZWFjaCB0aGUgbGFuZGluZywgdGhvdWdoIHRoZXJlJ3Mgbm8gc2lnbiBvZiB0aGVtIGF0IHRoZSB3YXRlcidzIGVkZ2UuCgpTb2xhbmdlIHN0dWRpZXMgeW91ciBmYWNlIHJhdGhlciB0aGFuIHRoZSBrZWVwc2FrZSBmb3Igb25jZS4gJ1NvbWV0aGluZyBoYXBwZW5lZCB1cCB0aGVyZSwnIHNoZSBzYXlzLiBOb3QgYSBxdWVzdGlvbi4gWW91IGZpbmQgeW91J3JlIG5vdCBlbnRpcmVseSBzdXJlIGhvdyB0byBhbnN3ZXIgaXQsIG9yIGhvdyBtdWNoIG9mIGl0IGlzIGV2ZW4geW91cnMgdG8gZGVzY3JpYmUu',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgd2hhdCBsaXR0bGUgeW91IGFjdHVhbGx5IGtub3c=', 'next' => '8_end_tell'],
                ['text' => 'U2F5IG9ubHkgdGhhdCBpdCB3YXNuJ3QgeW91ciBzdG9yeSB0byB0ZWxs', 'next' => '8_end_discreet'],
            ],
        ],
        '8_end_tell' => [
            'prose'  => 'WW91IHRlbGwgaGVyIHdoYXQgbGl0dGxlIHlvdSBhY3R1YWxseSB3aXRuZXNzZWQg4oCUIG5vdCBtdWNoLCBhIGNsb3NlZCBsZWRnZXIsIGEgbG9uZyBzdGlsbG5lc3MsIGEgbm9kIGluc3RlYWQgb2YgYSByaXZhbHJ5IHRvZGF5IOKAlCBjYXJlZnVsIG5vdCB0byBpbnZlbnQgZGV0YWlsIHlvdSBkb24ndCBoYXZlLiBTb2xhbmdlIGxpc3RlbnMsIHF1aWV0LCBhbmQgZG9lc24ndCBhc2sgZm9yIG1vcmUgdGhhbiB5b3UncmUgYWJsZSB0byBnaXZlLgoKJ1doYXRldmVyIGl0IHdhcywnIHNoZSBzYXlzIGV2ZW50dWFsbHksICdJIGhvcGUgaXQncyBhIGdvb2Qgcm9hZCwgd2hlcmV2ZXIgaXQgbGVhZHMgdGhlbS4nIFRoZSBLxY10dWt1IGxpZnRzIG9mZiBQaXRjYWlybidzIHNpbmdsZSBzdGVlcCBzaWxob3VldHRlLCBhbmQgeW91IGZpbmQgeW91cnNlbGYsIHVuZXhwZWN0ZWRseSwgaG9waW5nIHRoZSBleGFjdCBzYW1lIHRoaW5nLg==',
            'ending' => true,
        ],
        '8_end_discreet' => [
            'prose'  => 'WW91IHRlbGwgaGVyIG9ubHkgdGhhdCBpdCB3YXNuJ3QgeW91ciBzdG9yeSB0byB0ZWxsLCBhbmQgU29sYW5nZSwgd2hvIGhhcyBjbGVhcmx5IGVhcm5lZCBhbmQga2VwdCBwbGVudHkgb2Ygb3RoZXIgcGVvcGxlJ3Mgc3RvcmllcyBvdmVyIGEgbG9uZyBsaWZlIGF0IHNlYSwgYWNjZXB0cyB0aGF0IHdpdGhvdXQgcHVzaGluZyBmb3IgbW9yZS4KClRoZSBLxY10dWt1IGxpZnRzIG9mZiwgUGl0Y2Fpcm4ncyBzdGVlcCBncmVlbiBzaGFwZSBmYWxsaW5nIGF3YXkgYmVsb3csIHRoZSByaXZhbCdzIGJvYXQgc3RpbGwgYXQgYW5jaG9yLCB1bm1vdmluZywgYW5kIHlvdSBmaW5kIHlvdXJzZWxmIGhvcGluZyDigJQgcXVpZXRseSwgd2l0aG91dCBuZWVkaW5nIHRvIHNheSBpdCBhbG91ZCB0byBhbnlvbmUg4oCUIHRoYXQgd2hhdGV2ZXIgcGFnZSB0aGV5IHdlcmUgcmVhZGluZyB0dXJucyBvdXQsIGV2ZW50dWFsbHksIHRvIGJlIGEgZ29vZCBvbmUu',
            'ending' => true,
        ],
    ],
];
