<?php
return [
    'id'    => 17,
    'title' => 'The Only Ingredient That Can\'t Be Bought',
    'color' => '#B85A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QWRkaXMgQWJhYmEgc3ByZWFkcyB3aWRlIGFuZCBoaWdoIGFjcm9zcyBpdHMgcGxhdGVhdSwgdGhlIGFpciBub3RpY2VhYmx5IHRoaW5uZXIsIHRoZSBzbWVsbCBvZiByb2FzdGluZyBjb2ZmZWUgYW5kIGRyeWluZyBjaGlsaWVzIGRyaWZ0aW5nIGZyb20gZG9vcndheSBhZnRlciBkb29yd2F5IGFsb25nIHRoZSBidXNpZXIgc3RyZWV0cy4gQnJ1bm8gbWVudGlvbnMgdGhlIGJlcmJlcmUtbWFrZXIgeW91J3JlIGFmdGVyIGtlZXBzIGEgcmVwdXRhdGlvbiBmb3IgdHVybmluZyBhd2F5IGFueW9uZSBpbiB0b28gbXVjaCBvZiBhIGh1cnJ5LgoKVHdvIG1hcmtldCBkYXlzIHByZXNlbnQgdGhlbXNlbHZlcyBhcyB0aGUgd2F5IGluOiB0aGUgc21hbGxlciwgcXVpZXRlciBUdWVzZGF5IG1hcmtldCwgb3IgdGhlIGxhcmdlciwgbG91ZGVyIFNhdHVyZGF5IG1hcmtldCB3aGVyZSB0aGUgbWFrZXIgaGVyc2VsZiBpcyBtb3JlIHJlbGlhYmx5IGZvdW5kLg==',
            'choices' => [
                ['text' => 'VHJ5IHRoZSBxdWlldGVyIFR1ZXNkYXkgbWFya2V0', 'next' => '2_tuesday'],
                ['text' => 'R28gc3RyYWlnaHQgZm9yIHRoZSBsYXJnZXIgU2F0dXJkYXkgbWFya2V0', 'next' => '2_saturday'],
            ],
        ],
        '2_tuesday' => [
            'prose'  => 'VGhlIFR1ZXNkYXkgbWFya2V0IGlzIHNtYWxsZXIsIGVhc2llciB0byBuYXZpZ2F0ZSwgdGhvdWdoIHRoZSBiZXJiZXJlLW1ha2VyIGhlcnNlbGYgaXNuJ3QgdGhlcmUg4oCUIG9ubHkgaGVyIG5lcGhldywgd2hvIGRpcmVjdHMgeW91IHBhdGllbnRseSB0b3dhcmQgU2F0dXJkYXkgaW5zdGVhZCwgYXBvbG9nZXRpYyBidXQgZmlybS4gJ1NoZSBkb2Vzbid0IHJ1c2ggZm9yIGFueW9uZSwnIGhlIHNheXMsIG5vdCB1bmtpbmRseS4gJ0Jlc3QgeW91IGtub3cgdGhhdCBiZWZvcmUgeW91IG1lZXQgaGVyLicKCllvdSBtYWtlIGEgbm90ZSB0byByZXR1cm4gcHJvcGVybHku',
            'choices' => [
                ['text' => 'Q29tZSBiYWNrIG9uIFNhdHVyZGF5', 'next' => '3_shared'],
            ],
        ],
        '2_saturday' => [
            'prose'  => 'VGhlIFNhdHVyZGF5IG1hcmtldCBpcyBhIGdlbnVpbmUgY3J1c2ggb2YgY29sb3VyIGFuZCBub2lzZSwgZWFzaWx5IHRocmVlIHRpbWVzIHRoZSBzaXplIG9mIGFueSBzbWFsbGVyIG1hcmtldCBkYXksIGFuZCBpdCB0YWtlcyByZWFsIHBhdGllbmNlIGp1c3QgdG8gbG9jYXRlIHRoZSByaWdodCBzdGFsbCBhbWlkIHRoZSBjcm93ZC4gV2hlbiB5b3UgZmluYWxseSBkbywgdGhlIG1ha2VyIGhlcnNlbGYgaXMgbWlkLXRyYW5zYWN0aW9uLCB1bmh1cnJpZWQgZGVzcGl0ZSB0aGUgc3Vycm91bmRpbmcgY2hhb3MuCgpTaGUgZmluaXNoZXMgd2l0aCBoZXIgY3VycmVudCBjdXN0b21lciBhdCBoZXIgb3duIHBhY2UgYmVmb3JlIGZpbmFsbHkgdHVybmluZyB0byB5b3Uu',
            'choices' => [
                ['text' => 'V2FpdCBmb3IgaGVyIGF0dGVudGlvbiBwcm9wZXJseQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGJlcmJlcmUtbWFrZXIsIGFuIHVuaHVycmllZCBvbGRlciB3b21hbiBuYW1lZCBUaWdpc3QsIGxpc3RlbnMgdG8geW91ciBlcnJhbmQgd2l0aCBwb2xpdGUgYnV0IHZpc2libHkgdGVzdGluZyBwYXRpZW5jZS4gJ0V2ZXJ5b25lIHdhbnRzIHRoZSBibGVuZCBmYXN0LCcgc2hlIHNheXMgZXZlbnR1YWxseS4gJ05vYm9keSB3YW50cyB0byBhY3R1YWxseSBzaXQgd2l0aCBob3cgbG9uZyBpdCB0YWtlcyB0byBnZXQgcmlnaHQuIFRoZSBjaGlsaWVzIGRyeSBzbG93LiBUaGUgc3BpY2VzIHRvYXN0IHNsb3cuIFJ1c2hpbmcgYW55IG9mIGl0IHJ1aW5zIHRoZSB3aG9sZSB0aGluZywgZXZlcnkgdGltZSwgbm8gZXhjZXB0aW9ucy4nCgpTaGUgc3R1ZGllcyB5b3UgYSBsb25nIG1vbWVudC4gJ1NvLiBBcmUgeW91IGFjdHVhbGx5IHdpbGxpbmcgdG8gc2l0IHdpdGggc2xvdywgb3IganVzdCBoZXJlIGZvciB0aGUgYmxlbmQgaXRzZWxmPyc=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSB3aWxsaW5nIHRvIHNpdCB3aXRoIGl0IHByb3Blcmx5', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGlnaXN0IGRvZXNuJ3QgaGFuZCBvdmVyIGFueXRoaW5nIGltbWVkaWF0ZWx5LiBJbnN0ZWFkIHNoZSBzZXRzIHlvdSB0d28gZnVsbCwgdW5odXJyaWVkIHRhc2tzOiBzaXQgYW5kIHdhdGNoIGFuIGVudGlyZSBiYXRjaCBvZiBjaGlsaWVzIHRocm91Z2ggdGhlaXIgc2xvdyBkcnlpbmcgcHJvY2VzcyB3aXRob3V0IHRvdWNoaW5nIG9yIGh1cnJ5aW5nIHRoZW0sIG9yIHNpdCB3aXRoIGhlciBhdCB0aGUgdG9hc3RpbmcgcGFuIHRocm91Z2ggYSBmdWxsLCBwYXRpZW50IGN5Y2xlIG9mIHNwaWNlcywgdGltZWQgZW50aXJlbHkgYnkgc21lbGwgYW5kIGZlZWwgcmF0aGVyIHRoYW4gYW55IGNsb2NrLgoKJ0VpdGhlciB0ZWFjaGVzIHRoZSBzYW1lIHRoaW5nLCcgc2hlIHNheXMuICdQYXRpZW5jZSB3aXRoIGRyeWluZywgb3IgcGF0aWVuY2Ugd2l0aCB0b2FzdGluZy4gWW91ciBjaG9pY2UsIGJ1dCB5b3UgZG9uJ3QgbGVhdmUgZWFybHkgZWl0aGVyIHdheS4n',
            'choices' => [
                ['text' => 'V2F0Y2ggdGhlIGNoaWxpZXMgdGhyb3VnaCB0aGVpciBzbG93IGRyeWluZw==', 'next' => '5_drying'],
                ['text' => 'U2l0IHRocm91Z2ggYSBmdWxsIHRvYXN0aW5nIGN5Y2xl', 'next' => '5_toasting'],
            ],
        ],
        '5_drying' => [
            'prose'  => 'V2F0Y2hpbmcgdGhlIGNoaWxpZXMgdGhyb3VnaCB0aGVpciBzbG93IGRyeWluZyBwcm9jZXNzIGlzIGdlbnVpbmVseSwgZGVsaWJlcmF0ZWx5IHVuZXZlbnRmdWwg4oCUIGhvdXJzIG9mIHZlcnkgbGl0dGxlIHZpc2libGUgY2hhbmdlLCBUaWdpc3QgY2hlY2tpbmcgaW4gcGVyaW9kaWNhbGx5IHdpdGggcXVpZXQsIHVuYm90aGVyZWQgcGF0aWVuY2Ugd2hpbGUgeW91ciBvd24gcmVzdGxlc3NuZXNzIGdyYWR1YWxseSwgZ3J1ZGdpbmdseSBzZXR0bGVzIGludG8gc29tZXRoaW5nIGNsb3NlciB0byBoZXIgb3duIHVuaHVycmllZCByaHl0aG0uCgpCeSB0aGUgdGltZSB0aGUgY2hpbGllcyBhcmUgcHJvcGVybHkgcmVhZHksIHNvbWV0aGluZyBpbiB5b3VyIG93biBwYWNlIGhhcyBzaGlmdGVkIHRvby4=',
            'choices' => [
                ['text' => 'U2VlIGhlciBmaW5hbCBqdWRnbWVudA==', 'next' => '6_shared'],
            ],
        ],
        '5_toasting' => [
            'prose'  => 'U2l0dGluZyB0aHJvdWdoIGEgZnVsbCB0b2FzdGluZyBjeWNsZSBhdCB0aGUgcGFuIG1lYW5zIGxlYXJuaW5nIGJ5IHNtZWxsIGFuZCBmZWVsIGVudGlyZWx5LCBubyB0aW1lciBhbGxvd2VkLCBUaWdpc3QgY29ycmVjdGluZyB5b3VyIGluc3RpbmN0IHRvIHB1bGwgdGhlIHNwaWNlcyBlYXJseSBhZ2FpbiBhbmQgYWdhaW4gdW50aWwgeW91IGZpbmFsbHksIHByb3Blcmx5IGxlYXJuIHRvIHdhaXQgZm9yIHRoZSBleGFjdCBtb21lbnQgdGhlIGFyb21hIGNoYW5nZXMgcmF0aGVyIHRoYW4gZ3Vlc3NpbmcgYXQgaXQuCgpCeSB0aGUgZmluYWwgdG9hc3QsIHlvdXIgcGF0aWVuY2UgaGFzIHZpc2libHksIG1lYXN1cmFibHkgaW1wcm92ZWQu',
            'choices' => [
                ['text' => 'U2VlIGhlciBmaW5hbCBqdWRnbWVudA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGlnaXN0IHN0dWRpZXMgeW91ciB3b3JrIOKAlCBhbmQgeW91IOKAlCB3aXRoIHNvbWV0aGluZyB0aGF0IGZpbmFsbHksIGdlbnVpbmVseSByZXNlbWJsZXMgYXBwcm92YWwuICdHb29kLCcgc2hlIHNheXMgc2ltcGx5LiAnWW91IGRpZG4ndCBydXNoLiBUaGF0J3MgcmFyZXIgdGhhbiBwZW9wbGUgdGhpbmssIGFuZCBpdCdzIHRoZSBvbmx5IHJlYWwgaW5ncmVkaWVudCBpbiB0aGlzIGJsZW5kIHRoYXQgY2FuJ3QgYmUgYm91Z2h0IG9yIHN1YnN0aXR1dGVkLicKClNoZSBwYWNrYWdlcyBhIGdlbmVyb3VzIG1lYXN1cmUgb2YgZmluaXNoZWQgYmVyYmVyZSBmb3IgeW91LCB0aG91Z2ggaXQncyBjbGVhcmx5IHRoZSBwYXRpZW5jZSBpdHNlbGYsIHByb3ZlbiBwcm9wZXJseSBvdmVyIHRoZXNlIHVuaHVycmllZCBob3VycywgdGhhdCBzaGUgY29uc2lkZXJzIHRoZSByZWFsIHRoaW5nIGVhcm5lZCB0b2RheS4=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGxlYXZlIHRoZSBtYXJrZXQgYXMgdGhlIGFmdGVybm9vbiBsaWdodCB0dXJucyBnb2xkIGFjcm9zcyB0aGUgcGxhdGVhdSwgdGhlIGJlcmJlcmUgc2VjdXJlIGluIGl0cyB3cmFwLCBidXQgaXQncyB0aGUgc2xvdywgdW5odXJyaWVkIGhvdXJzIHRoZW1zZWx2ZXMgdGhhdCBzZWVtIHRvIGhhdmUgYWN0dWFsbHkgY2hhbmdlZCBzb21ldGhpbmcgaW4geW91LCByYXRoZXIgdGhhbiB0aGUgc3BpY2UgYmxlbmQgaXRzZWxmLgoKQnJ1bm8sIHdhbGtpbmcgYmVzaWRlIHlvdSwgc2VlbXMgdG8gbm90aWNlLiAnWW91J3JlIGRpZmZlcmVudCwgY29taW5nIG91dCBvZiB0aGF0IHRoYW4gZ29pbmcgaW4uIFNsb3dlci4gU3RlYWRpZXIuIFN1aXRzIHlvdSwgaG9uZXN0bHkuJw==',
            'choices' => [
                ['text' => 'U2F5IHRoZSBwYXRpZW5jZSBmZWx0IGxpa2UgdGhlIHJlYWwgbGVzc29u', 'next' => '8_end_patience'],
                ['text' => 'U2F5IHlvdSdyZSBub3Qgc3VyZSBpdCdsbCBzdGljayBvbmNlIHlvdSdyZSBtb3ZpbmcgYWdhaW4=', 'next' => '8_end_uncertain'],
            ],
        ],
        '8_end_patience' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgcGF0aWVuY2UgZmVsdCBsaWtlIHRoZSByZWFsIGxlc3NvbiwgbW9yZSB0aGFuIHRoZSBzcGljZSBpdHNlbGYsJyB5b3UgYWRtaXQsIHRoaW5raW5nIG9mIFRpZ2lzdCdzIHVuaHVycmllZCBjZXJ0YWludHkgYXQgdGhlIHRvYXN0aW5nIHBhbi4gJ0ZlZWxzIGxpa2Ugc29tZXRoaW5nIHdvcnRoIGFjdHVhbGx5IGtlZXBpbmcsIG5vdCBqdXN0IHNvbWV0aGluZyBJIGVhcm5lZCBmb3IgdG9kYXkuJwoKQnJ1bm8gbm9kcyBzbG93bHkuICdHb29kLiBUaGF0J3MgdGhlIGtpbmQgb2YgdGhpbmcgdGhhdCdzIHN1cHBvc2VkIHRvIHRyYXZlbCB3aXRoIHlvdSwgcGFzdCB0aGUgbWFya2V0LCBwYXN0IHRoZSB0cmlwLiBHbGFkIGl0IGxhbmRlZCBwcm9wZXJseS4n',
            'ending' => true,
        ],
        '8_end_uncertain' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gbm90IHN1cmUgaXQnbGwgc3RpY2sgb25jZSBJJ20gbW92aW5nIGZhc3QgYWdhaW4sJyB5b3UgYWRtaXQsIGFscmVhZHkgaGFsZi1hd2FyZSBvZiB0aGUgdHJpcCdzIHBhY2UgcGlja2luZyBiYWNrIHVwIGFoZWFkLiAnRmVlbHMgcmVhbCByaWdodCBub3cuIEhhcmRlciB0byBwcm9taXNlIGl0J2xsIGhvbGQgb25jZSB3ZSdyZSBydXNoaW5nIGZvciB0aGUgbmV4dCBmbGlnaHQuJwoKQnJ1bm8gZG9lc24ndCBkaXNtaXNzIHRoZSB3b3JyeS4gJ0ZhaXIgZW5vdWdoLiBNYXliZSBpdCBkb2Vzbid0IGhhdmUgdG8gc3RpY2sgcGVyZmVjdGx5LiBNYXliZSBpdCdzIGVub3VnaCB0aGF0IHlvdSBrbm93IHdoYXQgc2xvdyBhY3R1YWxseSBmZWVscyBsaWtlIG5vdywgc28geW91IGNhbiBmaW5kIHlvdXIgd2F5IGJhY2sgdG8gaXQgbGF0ZXIuJyBUaGUgbWFya2V0IG5vaXNlIGZhZGVzIGdlbnRseSBiZWhpbmQgeW91IGFzIGV2ZW5pbmcgc2V0dGxlcyBvdmVyIHRoZSBwbGF0ZWF1Lg==',
            'ending' => true,
        ],
    ],
];
