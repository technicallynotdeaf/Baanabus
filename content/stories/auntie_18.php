<?php
return [
    'id'    => 18,
    'title' => 'Go Be Worth Something To It',
    'color' => '#5A6A7A',

    'pages' => [
        '1_start' => [
            'prose'  => 'Tm9yZm9sayBJc2xhbmQgcmlzZXMgZ3JlZW4gYW5kIHN0ZWVwIG91dCBvZiBhIGNvbGRlciwgZ3JleWVyIHNlYSB0aGFuIHlvdSd2ZSBncm93biB1c2VkIHRvLCB0YWxsIHBpbmVzIHN0YW5kaW5nIHNlbnRpbmVsIG92ZXIgb2xkIGNvbnZpY3QtZXJhIHN0b25lIHRoZSB3YXkgdGhleSd2ZSBzdG9vZCBmb3IgdHdvIGNlbnR1cmllcyDigJQgdGhlIHZlcnkgcGxhY2UsIFNvbGFuZ2UgcmVtaW5kcyB5b3UsIHRoYXQgUGl0Y2Fpcm4ncyB3aG9sZSBwb3B1bGF0aW9uIG9uY2UgbW92ZWQgdG8gYWxtb3N0IGVudGlyZWx5LCBiYWNrIGluIDE4NTYsIHdoZW4gdGhlaXIgb3duIGlzbGFuZCBncmV3IHRvbyBzbWFsbCB0byBob2xkIHRoZW0uIEhpc3RvcnkgcmVwZWF0aW5nIGl0c2VsZiBpbiByZXZlcnNlLCBpbiBhIHdheSwgZ2l2ZW4gd2hvIGVsc2UncyBib2F0IGlzIGFscmVhZHkgbW9vcmVkIGF0IHRoZSBwaWVyIGJlbG93LgoKVHdvIHdheXMgaW50byB0aGUgc2V0dGxlbWVudCBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIG9sZCBjb252aWN0IGJ1aWxkaW5ncywgcXVpZXQgYW5kIGhlYXZ5IHdpdGggdHdvIGNlbnR1cmllcyBvZiB1c2UsIG9yIGFsb25nIHRoZSByaWRnZSB0cmFjayB1bmRlciB0aGUgcGluZXMsIGNvbGRlciBhbmQgaGlnaGVyIGFuZCBjb25zaWRlcmFibHkgbW9yZSBwcml2YXRlLg==',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgb2xkIHNldHRsZW1lbnQ=', 'next' => '2_settlement'],
                ['text' => 'VGFrZSB0aGUgcmlkZ2UgdHJhY2sgdW5kZXIgdGhlIHBpbmVz', 'next' => '2_ridge'],
            ],
        ],
        '2_settlement' => [
            'prose'  => 'VGhlIG9sZCBjb252aWN0IGJ1aWxkaW5ncyBzaXQgaGVhdnkgYW5kIGhvbmVzdCBhYm91dCB0aGVpciBoaXN0b3J5LCBzdG9uZSB0aGF0J3Mgc2VlbiBnZW51aW5lIGhhcmRzaGlwIG5vdyByZXB1cnBvc2VkIGludG8gaG9tZXMgYW5kIHNtYWxsIG9mZmljZXMgd2l0aCB0aGUgcGFydGljdWxhciByZXNpbGllbmNlIG9mIGEgcGxhY2UgdGhhdCdzIHNpbXBseSBrZXB0IGxpdmluZyByZWdhcmRsZXNzIG9mIHdoYXQgaXQgdXNlZCB0byBiZS4gQSB3b21hbiBzd2VlcGluZyBhIGRvb3JzdGVwIHBvaW50cyB5b3Ugb253YXJkIHdpdGhvdXQgbmVlZGluZyBtdWNoIGV4cGxhbmF0aW9uLgoKJ1lvdSdsbCB3YW50IERlbHBoaW5lLCcgc2hlIHNheXMuICdVcCBwYXN0IHRoZSBvbGQgZ2FvbC4gWW91ciBmcmllbmQncyBhbHJlYWR5IHRoZXJlIOKAlCBoYXMgYmVlbiBhIHdoaWxlLCBhY3R1YWxseS4n',
            'choices' => [
                ['text' => 'SGVhZCB1cCBwYXN0IHRoZSBvbGQgZ2FvbA==', 'next' => '3_shared'],
            ],
        ],
        '2_ridge' => [
            'prose'  => 'VGhlIHJpZGdlIHRyYWNrIGNsaW1icyBjb2xkIGFuZCBxdWlldCB1bmRlciBwaW5lcyBzbyB0YWxsIHRoZXkgdHVybiB0aGUgbGlnaHQgZ3JlZW4gYW5kIGZpbHRlcmVkIGV2ZW4gYXQgbWlkZGF5LCB0aGUgc2VhIGEgZGlzdGFudCBncmV5IGdsaXR0ZXIgdGhyb3VnaCBnYXBzIGluIHRoZSBjYW5vcHkuIEl0J3MgYSBsb25nZXIsIGxvbmVsaWVyIHdhbGssIGFuZCBnaXZlcyB5b3UgbW9yZSB0aW1lIHRoYW4geW91IG5lY2Vzc2FyaWx5IHdhbnQgdG8gc2l0IHdpdGggdGhlIGZhY3Qgb2YgdGhlIHJpdmFsJ3MgYm9hdCBhdCB0aGUgcGllciBiZWxvdy4KCllvdSBjb21lIGRvd24gdGhlIGZhciBzaWRlIGludG8gdGhlIHNldHRsZW1lbnQgdG8gZmluZCBhIG1hbiByYWtpbmcgcGluZSBuZWVkbGVzIHdobyBkaXJlY3RzIHlvdSwgd2l0aG91dCBmdXNzLCB0b3dhcmQgYSBzbWFsbCBob3VzZSBwYXN0IHRoZSBvbGQgZ2FvbCDigJQgJ0RlbHBoaW5lJ3MuIFlvdXIgZnJpZW5kJ3MgdGhlcmUuIEhhcyBiZWVuIGEgd2hpbGUuJw==',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgRGVscGhpbmUncyBob3VzZQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'RGVscGhpbmUgdHVybnMgb3V0IHRvIGJlIGEgYnJpc2ssIHdhcm0gd29tYW4gc3Vycm91bmRlZCBieSB0aGUgcGFydGljdWxhciBvcmdhbmlzZWQgY2x1dHRlciBvZiBzb21lb25lIHdobyBoYXMgc3BlbnQgYSBsaWZldGltZSBiZWluZyB0aGUgcGVyc29uIGV2ZXJ5b25lIGNvbWVzIHRvIGFib3V0IGZhbWlseSBoaXN0b3J5LiBUaGUgcml2YWwgaXMgdGhlcmUgdG9vLCBzZWF0ZWQsIGNvbnNpZGVyYWJseSBzdGVhZGllciB0aGFuIHRoZXkgd2VyZSBvbiBQaXRjYWlybiwgYSBmb2xkZXIgb2YgcGFwZXJzIGhlbGQgbG9vc2VseSByYXRoZXIgdGhhbiBncmlwcGVkLgoKJ0l0J3MgcmVhbCwnIERlbHBoaW5lIHNheXMsIHRvIHlvdSwgYmVmb3JlIHlvdSd2ZSBldmVuIHByb3Blcmx5IGFza2VkIGFueXRoaW5nLCBndWVzc2luZyBjb3JyZWN0bHkgd2hhdCdzIGJyb3VnaHQgeW91IGJvdGggdG8gaGVyIGRvb3Igb24gdGhlIHNhbWUgZGF5LiAnV2hhdGV2ZXIgdGhleSBmb3VuZCBvbiBQaXRjYWlybiwgSSd2ZSBjb25maXJtZWQgdGhlIHJlc3Qgb2YgaXQgZnJvbSB0aGlzIGVuZC4gUmVhbCBmYW1pbHkuIFJlYWwgQ291bnRyeSwgb3V0IHBhc3Qgd2hlcmUgbW9zdCBtYXBzIHN0b3AgYm90aGVyaW5nIHdpdGggZGV0YWlsLiBUaGF0J3Mgbm90IG5vdGhpbmcuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2l0IHdpdGggdGhhdCBmb3IgYSBtb21lbnQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'Tm9ib2R5IHNheXMgbXVjaCBmb3IgYSB3aGlsZS4gVGhlIHJpdmFsIGxvb2tzLCBmb3IgdGhlIGZpcnN0IHRpbWUgc2luY2UgeW91J3ZlIGtub3duIHRoZW0sIGVudGlyZWx5IHVuaHVycmllZCDigJQgbm90IHJlc29sdmVkIGV4YWN0bHksIGJ1dCBwb2ludGVkIG5vdywgZmluYWxseSwgaW4gYSBkaXJlY3Rpb24gcmF0aGVyIHRoYW4gc2ltcGx5IHJhY2luZyBpbiBhbGwgb2YgdGhlbSBhdCBvbmNlLgoKRGVscGhpbmUsIGdpdmluZyB0aGUgbW9tZW50IHJvb20gd2l0aG91dCBtYWtpbmcgYSBwcm9kdWN0aW9uIG9mIGl0LCBtZW50aW9ucyBzaGUgY291bGQgdXNlIGEgaGFuZCBlaXRoZXIgd2VhdmluZyBhIGJhc2tldCBmcm9tIHRoaXMgc2Vhc29uJ3MgZmFsbGVuIHBpbmUgZnJvbmRzLCBvciBnYXRoZXJpbmcgYW5kIHByZXNzaW5nIGEgZmV3IG9mIHRoZSB0YWxsIHBpbmVzJyBkaXN0aW5jdGl2ZSBjb25lcyBmb3IgdGhlIG1vc2FpYyB3aW5kb3cgaXRzZWxmLCB3aGljaGV2ZXIgb2NjdXBpZXMgeW91ciBoYW5kcyBiZXN0IHdoaWxlIGV2ZXJ5b25lIGZpbmRzIHRoZWlyIG5leHQgc2VudGVuY2Uu',
            'choices' => [
                ['text' => 'V2VhdmUgdGhlIHBpbmUtZnJvbmQgYmFza2V0', 'next' => '5_basket'],
                ['text' => 'R2F0aGVyIGFuZCBwcmVzcyB0aGUgcGluZSBjb25lcw==', 'next' => '5_cones'],
            ],
        ],
        '5_basket' => [
            'prose'  => 'V2VhdmluZyBmcmVzaCBwaW5lIGZyb25kcyBpcyBzaW1wbGUsIHJlcGV0aXRpdmUsIGdyb3VuZGluZyB3b3JrLCBleGFjdGx5IHRoZSBraW5kIG9mIHRoaW5nIGhhbmRzIHdhbnQgd2hlbiB0aGUgcmVzdCBvZiB0aGUgcm9vbSBpcyBidXN5IHdpdGggc29tZXRoaW5nIHRvbyBsYXJnZSB0byBydXNoLiBEZWxwaGluZSBjb3JyZWN0cyB5b3VyIHRlbnNpb24gb25jZSwgZ2VudGx5LCBhbmQgb3RoZXJ3aXNlIGxlYXZlcyB5b3UgZW50aXJlbHkgdG8gaXQuCgpBY3Jvc3MgdGhlIHJvb20sIHlvdSBjYXRjaCBmcmFnbWVudHMgb2YgdGhlIHJpdmFsJ3MgcGxhbnMgdGFraW5nIHNoYXBlIG91dCBsb3VkIOKAlCBhIHJvdXRlIGlubGFuZCwgYSBuYW1lLCBhIHBsYWNlIHRoYXQgaXNuJ3Qgb24gdGhlIHdheSB0byBhbnl3aGVyZSB5b3UncmUgYm90aCBoZWFkZWQgYW55bW9yZS4=',
            'choices' => [
                ['text' => 'U2VlIHdoZXJlIHRoZSBjb252ZXJzYXRpb24gbGFuZHM=', 'next' => '6_shared'],
            ],
        ],
        '5_cones' => [
            'prose'  => 'R2F0aGVyaW5nIGdvb2QsIHdob2xlIHBpbmUgY29uZXMgZnJvbSB1bmRlciB0cmVlcyB0aGlzIHNpemUgdHVybnMgb3V0IHRvIGJlIGl0cyBvd24gc21hbGwgY29tcGV0aXRpdmUgc3BvcnQsIHRoZSBiZXN0IG9uZXMgYWx3YXlzIHNsaWdodGx5IGZ1cnRoZXIgdGhhbiB0aGUgb25lIHlvdSBhbHJlYWR5IHBpY2tlZCB1cC4gUHJlc3NpbmcgdGhlbSBwcm9wZXJseSBhZnRlcndhcmQgaXMgZmlkZGx5LCBwYXRpZW50IHdvcmssIGV4YWN0bHkgZW5vdWdoIHRvIGtlZXAgeW91ciBoYW5kcyBvY2N1cGllZCB3aXRob3V0IG9jY3VweWluZyB5b3VyIHdob2xlIGF0dGVudGlvbi4KCkFjcm9zcyB0aGUgcm9vbSwgeW91IGNhdGNoIGZyYWdtZW50cyBvZiB0aGUgcml2YWwncyBwbGFucyB0YWtpbmcgc2hhcGUgb3V0IGxvdWQg4oCUIGEgcm91dGUgaW5sYW5kLCBhIG5hbWUsIGEgcGxhY2UgdGhhdCBpc24ndCBvbiB0aGUgd2F5IHRvIGFueXdoZXJlIHlvdSdyZSBib3RoIGhlYWRlZCBhbnltb3JlLg==',
            'choices' => [
                ['text' => 'U2VlIHdoZXJlIHRoZSBjb252ZXJzYXRpb24gbGFuZHM=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RXZlbnR1YWxseSB0aGUgcml2YWwgc3RhbmRzLCBmb2xkZXIgdHVja2VkIHVuZGVyIG9uZSBhcm0sIGFuZCB0aGVyZSdzIG5vIHdheSB0byBtYWtlIHRoZSBtb21lbnQgYW55dGhpbmcgb3RoZXIgdGhhbiB3aGF0IGl0IHBsYWlubHkgaXMuICdJJ20gbm90IGZpbmlzaGluZyB0aGlzIHdpdGggeW91LCcgdGhleSBzYXksIHNpbXBsZSwgbm8gZHJhbWEgaW4gaXQsIGp1c3QgZmFjdC4gJ0ZvdW5kIHNvbWV0aGluZyBiaWdnZXIgdGhhbiBhIHdpbmRvdyBmdWxsIG9mIGdsYXNzLiBHb2luZyB0byBnbyBiZSB3b3J0aCBzb21ldGhpbmcgdG8gaXQgaW5zdGVhZC4nCgpUaGVyZSdzIG5vIGdyYW5kIHNwZWVjaCwgbm8gYXBvbG9neSBmb3IgdGhlIHdob2xlIHJhY2UgdGhhdCdzIHJ1biBiZXR3ZWVuIHlvdSBtb3N0IG9mIHRoaXMgam91cm5leS4gSnVzdCBTb2xhbmdlIHN0ZXBwaW5nIGZvcndhcmQgZmlyc3QsIGdyaXBwaW5nIHRoZWlyIGhhbmQgcHJvcGVybHksIGFuZCB0aGUgQmFyb24sIHVuY2hhcmFjdGVyaXN0aWNhbGx5IHdpdGhvdXQgY29tbWVudGFyeSwgc2ltcGx5IGxhbmRpbmcgb24gdGhlaXIgc2hvdWxkZXIgZm9yIGEgbW9tZW50IGJlZm9yZSBsaWZ0aW5nIG9mZiBhZ2Fpbi4gWW91IGZpbmQgeW91ciBvd24gZ29vZGJ5ZSBzb21ld2hlcmUgaW4gdGhlIG1pZGRsZSBvZiB0aGVpcnMg4oCUIG5vdCByZWhlYXJzZWQsIG5vdCBwZXJmZWN0LCBlbnRpcmVseSByZWFsLg==',
            'choices' => [
                ['text' => 'V2F0Y2ggdGhlbSBnbw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhdGNoIHRoZW0gd2FsayBvZmYgZG93biB0b3dhcmQgdGhlIG9sZCBzZXR0bGVtZW50LCBmb2xkZXIgdW5kZXIgb25lIGFybSwgbm90IGxvb2tpbmcgYmFjaywgd2hpY2ggc29tZWhvdyBmZWVscyBsaWtlIGV4YWN0bHkgdGhlIHJpZ2h0IHdheSBmb3IgdGhpcyBwYXJ0aWN1bGFyIGdvb2RieWUgdG8gaGFwcGVuIOKAlCBubyBsaW5nZXJpbmcsIG5vIHVuZmluaXNoZWQgYnVzaW5lc3MgZHJhZ2dlZCBvdXQgbG9uZ2VyIHRoYW4gaXQgbmVlZHMgdG8gYmUuCgpTb2xhbmdlLCBiZXNpZGUgeW91LCB3YXRjaGVzIHRoZSBzYW1lIGVtcHR5IHN0cmV0Y2ggb2Ygcm9hZCBhIHdoaWxlIGFmdGVyIHRoZXkndmUgZ29uZS4gJ0dvb2Qgcm9hZCwgdGhhdCBvbmUsJyBzaGUgc2F5cyBldmVudHVhbGx5LiAnRGlmZmVyZW50IG9uZSB0aGFuIG91cnMuIEJvdGggc3RpbGwgZ29vZC4nIERlbHBoaW5lIGhhbmRzIHlvdSB0aGUgZmluaXNoZWQgYmFza2V0LCBvciB0aGUgcHJlc3NlZCBjb25lcywgd2l0aG91dCBjb21tZW50LCBsZXR0aW5nIHRoZSBvYmplY3Qgc3BlYWsgZm9yIHRoZSB3aG9sZSBzdHJhbmdlIGFmdGVybm9vbiBpbnN0ZWFkIG9mIGFkZGluZyBhbnl0aGluZyBmdXJ0aGVyIHRvIGl0Lg==',
            'choices' => [
                ['text' => 'QXNrIFNvbGFuZ2UgaWYgc2hlIHRoaW5rcyB5b3UnbGwgc2VlIHRoZW0gYWdhaW4=', 'next' => '8_end_ask'],
                ['text' => 'TGV0IHRoZSBxdWVzdGlvbiBzdGF5IG9wZW4sIHRoZSB3YXkgdGhlIHJpdmFsJ3Mgc3Rvcnkgbm93IGlz', 'next' => '8_end_open'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzaywgYW5kIFNvbGFuZ2UgdGFrZXMgaGVyIHRpbWUgYW5zd2VyaW5nLCB3aGljaCB0ZWxscyB5b3Ugc29tZXRoaW5nIGFsbCBieSBpdHNlbGYuICdPY2VhbidzIGJpZywnIHNoZSBzYXlzIGZpbmFsbHkuICdCdXQgaXQncyBub3QgdGhhdCBiaWcsIG5vdCByZWFsbHksIG5vdCBmb3IgcGVvcGxlIHdobyd2ZSBwcm9wZXJseSBjcm9zc2VkIHBhdGhzIG9uIGl0IG9uY2UuIFdvdWxkbid0IGJldCBhZ2FpbnN0IGl0LicKCkl0J3Mgbm90IGEgcHJvbWlzZSwgYW5kIHNoZSBkb2Vzbid0IHByZXRlbmQgaXQgaXMuIEJ1dCBpdCdzIGVub3VnaCBvZiBhbiBhbnN3ZXIgdGhhdCB0aGUgS8WNdHVrdSBsaWZ0cyBvZmYgTm9yZm9saydzIHRhbGwgcGluZXMgZmVlbGluZyBsZXNzIGxpa2UgYW4gZW5kaW5nIGFuZCBtb3JlIGxpa2UgYSBjaGFwdGVyIGdlbnVpbmVseSBjbG9zaW5nLCByZWFkeSBmb3Igd2hhdGV2ZXIgY29tZXMgYWZ0ZXIgaXQg4oCUIGZvciB0aGVtLCBhbmQsIGV2ZW50dWFsbHksIGZvciB5b3Uu',
            'ending' => true,
        ],
        '8_end_open' => [
            'prose'  => 'WW91IGRvbid0IGFzay4gU29tZSBxdWVzdGlvbnMsIHlvdSdyZSBsZWFybmluZywgYXJlIGJldHRlciBsZWZ0IGV4YWN0bHkgYXMgb3BlbiBhcyB0aGUgcGVyc29uIHRoZXkncmUgYWJvdXQg4oCUIHRoZSByaXZhbCdzIHdob2xlIHJvYWQgYWhlYWQgdW53cml0dGVuLCB1bmNlcnRhaW4sIGVudGlyZWx5IHRoZWlycyB0byB3YWxrIHdpdGhvdXQgYW55b25lIGVsc2UncyBndWVzcyBwaW5uZWQgb250byBpdCBpbiBhZHZhbmNlLgoKVGhlIEvFjXR1a3UgbGlmdHMgb2ZmIE5vcmZvbGsgSXNsYW5kLCB0YWxsIHBpbmVzIGZhbGxpbmcgYXdheSBiZWxvdyBpbnRvIGdyZXksIGNvbGQgc2VhLCBhbmQgeW91IGZpbmQgeW91cnNlbGYgY2FycnlpbmcgdGhlIHBpbmUtZnJvbmQgYmFza2V0LCBvciB0aGUgcHJlc3NlZCBjb25lcywgYW5kIHNvbWV0aGluZyBlbHNlIGJlc2lkZXMg4oCUIG5vIG5hbWUgZm9yIGl0IHlldCwganVzdCB0aGUgcGxhaW4gZmFjdCBvZiBoYXZpbmcgd2F0Y2hlZCBzb21lb25lIGNob29zZSwgaW4gZnJvbnQgb2YgeW91LCB0byBnbyBiZSB3b3J0aCBzb21ldGhpbmcgdG8gYSBwZXJzb24gYW5kIGEgcGxhY2UgaW5zdGVhZCBvZiBhIHByaXplLiBUaGF0IHBhcnQsIGF0IGxlYXN0LCBuZWVkcyBubyBmdXJ0aGVyIGV4cGxhaW5pbmcu',
            'ending' => true,
        ],
    ],
];
