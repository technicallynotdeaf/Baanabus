<?php
return [
    'id'    => 16,
    'title' => 'Patience With Silence',
    'color' => '#7A5A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QmlnIEJlbmQncyBib3JkZXItY291bnRyeSBkZXNlcnQgc3RyZXRjaGVzIHdpZGUgYW5kIGVtcHR5IGJlbmVhdGggYSBza3kgc28gZGFyayB0aGUgTWlsa3kgV2F5IGNhc3RzIGZhaW50IHNoYWRvd3MsIHRoZSBSaW8gR3JhbmRlIGN1dHRpbmcgYSBxdWlldCBsaW5lIHNvbWV3aGVyZSBvZmYgaW4gdGhlIGR1c2suIFByaXlhIGxhbmRzIG5lYXIgYSBsb25lIG92ZXJsb29rLCBjaGVja2luZyBoZXIgbm90ZXMuICdMb2NhbCBzdGFyZ2F6ZXIncyBtZWV0aW5nIHVzIGhlcmUsJyBzaGUgc2F5cy4gJ0NvcndpbidzIHBhZ2Ugc2F5cyB0aGlzIHJpZGRsZSdzIHJlYWxseSBhYm91dCBwYXRpZW5jZSB3aXRoIHNpbGVuY2UgbW9yZSB0aGFuIHdpdGggc2t5LiBPZGQgbm90ZSB0byBsZWF2ZS4nCgpUd28gZGVzZXJ0IHJvdXRlcyB0b3dhcmQgdGhlIG92ZXJsb29rIHByZXNlbnQgdGhlbXNlbHZlczogYWxvbmcgdGhlIGRyeSByaXZlcmJlZCwgb3Igb3ZlciBhIGxvdyByb2NreSByaXNlLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBkcnkgcml2ZXJiZWQ=', 'next' => '2_riverbed'],
                ['text' => 'VGFrZSB0aGUgbG93IHJvY2t5IHJpc2U=', 'next' => '2_rise'],
            ],
        ],
        '2_riverbed' => [
            'prose'  => 'VGhlIGRyeSByaXZlcmJlZCBvZmZlcnMgZWFzeSwgbGV2ZWwgd2Fsa2luZywgc21vb3RoIHN0b25lcyB1bmRlcmZvb3Qgd29ybiBieSBsb25nLXZhbmlzaGVkIGZsb29kd2F0ZXJzLCB0aGUgZGVzZXJ0J3MgZW5vcm1vdXMgcXVpZXQgc2V0dGxpbmcgaW4gcHJvcGVybHkgdGhlIGZ1cnRoZXIgeW91IGdvLiBZb3UgcmVhY2ggdGhlIG92ZXJsb29rIGNhbG1seSwgdGhlIHNpbGVuY2UgYWxyZWFkeSBiZWdpbm5pbmcgdG8gZmVlbCBsZXNzIGVtcHR5IHRoYW4gZXhwZWN0ZWQu',
            'choices' => [
                ['text' => 'TWVldCB0aGUgc3RhcmdhemVy', 'next' => '3_shared'],
            ],
        ],
        '2_rise' => [
            'prose'  => 'VGhlIGxvdyByb2NreSByaXNlIG9mZmVycyBhIGhhcmRlciBzY3JhbWJsZSBidXQgYSBiZXR0ZXIgdmFudGFnZSwgdGhlIHdob2xlIGJvcmRlci1jb3VudHJ5IGRlc2VydCBzcHJlYWRpbmcgb3V0IGJlbmVhdGggeW91IGFzIHlvdSBjbGltYiwgc2lsZW5jZSBwcmVzc2luZyBpbiBmcm9tIGV2ZXJ5IGRpcmVjdGlvbiB3aXRoIHJlYWwsIHBoeXNpY2FsIHdlaWdodC4gWW91IHJlYWNoIHRoZSBvdmVybG9vayBhIGxpdHRsZSB3aW5kZWQsIGNvbnNpZGVyYWJseSBtb3JlIGF3YXJlIG9mIHRoZSBxdWlldC4=',
            'choices' => [
                ['text' => 'TWVldCB0aGUgc3RhcmdhemVy', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHN0YXJnYXplciwgYSB3ZWF0aGVyZWQgcmFuY2hlciBuYW1lZCBEYWxlIHdobydzIGNsZWFybHkgc3BlbnQgZGVjYWRlcyB1bmRlciB0aGlzIGV4YWN0IHNreSwgZ3JlZXRzIHlvdSB3aXRoIGEgc2luZ2xlIG5vZCByYXRoZXIgdGhhbiB3b3JkcywgZ2VzdHVyaW5nIHNpbXBseSB0b3dhcmQgYSBmbGF0IHJvY2sgYmVzaWRlIGhpcyBvd24uICdZb3VyIGdyZWF0LXVuY2xlIHNhdCByaWdodCB0aGVyZSB0b28sJyBoZSBmaW5hbGx5IHNheXMsIG9uY2UgeW91J3ZlIHNldHRsZWQuICdUb29rIGhpbSBhIHdoaWxlIHRvIHVuZGVyc3RhbmQgd2hhdCBJIHdhcyBhY3R1YWxseSBvZmZlcmluZy4gTWlnaHQgdGFrZSB5b3UgYSB3aGlsZSB0b28uJwoKSGUgc3R1ZGllcyB0aGUgYXRsYXMncyBuZXh0IGJsYW5rIHBhdGNoLiAnVGhpcyBvbmUncyBub3QgcmVhbGx5IGFib3V0IHRoZSBzdGFycy4gSXQncyBhYm91dCBzaXR0aW5nIHN0aWxsIGxvbmcgZW5vdWdoIHRvIGFjdHVhbGx5IGRlc2VydmUgaGVhcmluZyBpdC4gUmVhZHkgdG8gdHJ5Pyc=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSByZWFkeSB0byB0cnk=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RGFsZSBvZmZlcnMgdHdvIHdheXMgdG8gcHJvcGVybHkgcHJlcGFyZSBmb3IgdGhlIHJpZGRsZTogc2l0IGluIGNvbXBsZXRlIHNpbGVuY2Ugd2l0aCBoaW0gZm9yIGFzIGxvbmcgYXMgaXQgdGFrZXMsIHdpdGggbm8gZml4ZWQgdGltZSBsaW1pdCwgdW50aWwgaGUganVkZ2VzIHRoZSBtb21lbnQgcmlnaHQsIG9yIGFzayBoaW0gZGlyZWN0bHkgaG93IGxvbmcgdGhlIHNpbGVuY2UgdXN1YWxseSBsYXN0cywgc28geW91IGtub3cgcm91Z2hseSB3aGF0IHlvdSdyZSBhY3R1YWxseSBjb21taXR0aW5nIHRvLgoKJ0VpdGhlcidzIGZpbmUsJyBoZSBzYXlzLiAnT3Blbi1lbmRlZCBzaWxlbmNlLCBvciBrbm93aW5nIHRoZSByb3VnaCBzaGFwZSBvZiBpdCBmaXJzdC4gWW91ciBjaG9pY2UsIHRob3VnaCBtb3N0IHBlb3BsZSB3aG8gYXNrIHRoYXQgc2Vjb25kIHF1ZXN0aW9uIGVuZCB1cCBzdHJ1Z2dsaW5nIHdvcnNlIHdpdGggdGhlIGZpcnN0IHBhcnQuJw==',
            'choices' => [
                ['text' => 'U2l0IGluIG9wZW4tZW5kZWQgc2lsZW5jZQ==', 'next' => '5_open'],
                ['text' => 'QXNrIGhvdyBsb25nIGl0IHVzdWFsbHkgdGFrZXM=', 'next' => '5_ask'],
            ],
        ],
        '5_open' => [
            'prose'  => 'U2l0dGluZyBpbiBvcGVuLWVuZGVkIHNpbGVuY2Ugd2l0aCBubyBmaXhlZCBsaW1pdCBpcyBnZW51aW5lbHkgZGlmZmljdWx0LCB0aGUgdXJnZSB0byBjaGVjayBzb21lIGludmlzaWJsZSBjbG9jayBuYWdnaW5nIHN0ZWFkaWx5IHVudGlsIGl0IGZpbmFsbHksIGdyYWR1YWxseSBmYWRlcywgcmVwbGFjZWQgYnkgc29tZXRoaW5nIGNsb3NlciB0byBhY3R1YWwgc3RpbGxuZXNzLiBEYWxlIHNheXMgbm90aGluZyB0aGUgZW50aXJlIHRpbWUsIHNpbXBseSB3YXRjaGluZyB0aGUgc2t5IGFsb25nc2lkZSB5b3UuCgpFdmVudHVhbGx5LCB3aXRob3V0IGFueSBzaWduYWwgeW91IGNhbiBxdWl0ZSBuYW1lLCB0aGUgc2lsZW5jZSBpdHNlbGYgZmVlbHMgY29tcGxldGUgcmF0aGVyIHRoYW4gbWVyZWx5IGVuZHVyZWQu',
            'choices' => [
                ['text' => 'SGVhciB0aGUgcmlkZGxlIHByb3Blcmx5', 'next' => '6_shared'],
            ],
        ],
        '5_ask' => [
            'prose'  => 'QXNraW5nIGhvdyBsb25nIGl0IHVzdWFsbHkgdGFrZXMgZ2V0cyB5b3UgYSBmbGF0LCB1bmhlbHBmdWwgYW5zd2VyIOKAlCAnaG93ZXZlciBsb25nIGl0IHRha2VzJyDigJQgYW5kIHRoZSBzYW1lIG9wZW4tZW5kZWQgc2lsZW5jZSByZWdhcmRsZXNzLCBleGNlcHQgbm93IHlvdSdyZSBhbHNvIGZpZ2h0aW5nIHRoZSB1cmdlIHRvIG1lYXN1cmUgaXQgYWdhaW5zdCB3aGF0ZXZlciByb3VnaCBlc3RpbWF0ZSB5b3UnZCBob3BlZCBmb3IuIERhbGUgd2F0Y2hlcyB0aGlzIGludGVybmFsIHN0cnVnZ2xlIHdpdGggcXVpZXQsIGtub3dpbmcgYW11c2VtZW50LgoKRXZlbnR1YWxseSwgZGVzcGl0ZSB0aGUgZXh0cmEgZnJpY3Rpb24sIHRoZSBzaWxlbmNlIHNldHRsZXMgcHJvcGVybHkgYW55d2F5Lg==',
            'choices' => [
                ['text' => 'SGVhciB0aGUgcmlkZGxlIHByb3Blcmx5', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'T25seSBvbmNlIHRoZSBzaWxlbmNlIGhhcyBwcm9wZXJseSwgZnVsbHkgc2V0dGxlZCBkb2VzIERhbGUgZmluYWxseSBzcGVhaywgaGlzIHRlbGxpbmcgc3BhcmUgYW5kIHVuaHVycmllZCwgbWF0Y2hpbmcgdGhlIGRlc2VydCdzIG93biB2YXN0IHF1aWV0IHJhdGhlciB0aGFuIGZpZ2h0aW5nIGFnYWluc3QgaXQuIFRoZSBjb25zdGVsbGF0aW9uIGl0IGRlc2NyaWJlcyBhcnJpdmVzIHNsb3dseSwgd2l0aG91dCBhbnkgcnVzaCwgZXhhY3RseSBhcyBldmVyeXRoaW5nIGVsc2UgYWJvdXQgdGhpcyBzdG9wIGhhcyBkZW1hbmRlZC4KCllvdSBkcmF3IGl0IGludG8gdGhlIGF0bGFzIGNhcmVmdWxseSwgYW5kIERhbGUgc3R1ZGllcyB5b3VyIHdvcmsgd2l0aCBhIHNpbmdsZSwgc2F0aXNmaWVkIG5vZC4=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0aHJvdWdoIHRoZSBkZXNlcnQncyBlbm9ybW91cyBxdWlldCBhcyBmdWxsIG5pZ2h0IHNldHRsZXMsIHRoZSBNaWxreSBXYXkgYXJjaGluZyBvdmVyaGVhZCBpbiBhIHdheSB0aGF0IG1ha2VzIHRoZSB3aG9sZSBib3JkZXItY291bnRyeSBsYW5kc2NhcGUgZmVlbCBicmllZmx5LCBnZW51aW5lbHkgc2FjcmVkLiBQcml5YSdzIHdhaXRpbmcgd2l0aCB0aGUgdGhlcm1vcywgd2F0Y2hpbmcgeW91ciB1bnVzdWFsbHkgY2FsbSBleHByZXNzaW9uIHdpdGggaW50ZXJlc3QuCgonRGFsZSBnZXQgeW91IHRvIGFjdHVhbGx5IHNpdCBzdGlsbD8nIHNoZSBhc2tzLCBhbHJlYWR5IGhhbGYtZ3Vlc3NpbmcgdGhlIGFuc3dlci4=',
            'choices' => [
                ['text' => 'U2F5IHRoZSBzaWxlbmNlIHRhdWdodCB5b3UgbW9yZSB0aGFuIHRoZSByaWRkbGUgZGlk', 'next' => '8_end_silence'],
                ['text' => 'U2F5IHlvdSdyZSBzdGlsbCBub3QgZW50aXJlbHkgY29tZm9ydGFibGUgd2l0aCB0aGF0IG11Y2ggcXVpZXQ=', 'next' => '8_end_uncomfortable'],
            ],
        ],
        '8_end_silence' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgc2lsZW5jZSB0YXVnaHQgbWUgbW9yZSB0aGFuIHRoZSByaWRkbGUgZGlkLCcgeW91IGFkbWl0LCBsb29raW5nIG91dCBhdCB0aGUgdmFzdCwgc3Rhci10aGljayBkYXJrLiAnRmVlbHMgbGlrZSBJJ3ZlIGJlZW4gYXZvaWRpbmcgdGhhdCBraW5kIG9mIHN0aWxsbmVzcyBteSB3aG9sZSBsaWZlIHdpdGhvdXQgcXVpdGUgbm90aWNpbmcuIEdsYWQgRGFsZSBtYWRlIG1lIGFjdHVhbGx5IHNpdCB3aXRoIGl0IHByb3Blcmx5LicKClByaXlhIG5vZHMgc2xvd2x5LiAnVGhhdCdzIGV4YWN0bHkgdGhlIHJlYWN0aW9uIENvcndpbiBoYWQgdG9vLCBmcm9tIHdoYXQgSSByZW1lbWJlciBoaW0gc2F5aW5nLiBHb29kIHRoYXQgdGhpcyBzdG9wJ3Mgc3RpbGwgZG9pbmcgd2hhdCBpdCdzIG1lYW50IHRvIGRvLic=',
            'ending' => true,
        ],
        '8_end_uncomfortable' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gc3RpbGwgbm90IGVudGlyZWx5IGNvbWZvcnRhYmxlIHdpdGggdGhhdCBtdWNoIHF1aWV0LCcgeW91IGFkbWl0LCBhIGxpdHRsZSBzaGVlcGlzaGx5LiAnR290IHRoZXJlIGV2ZW50dWFsbHksIGJ1dCBpdCB0b29rIHJlYWwgZWZmb3J0LiBGZWVscyBsaWtlIGEgbXVzY2xlIEkgaGF2ZW4ndCBwcm9wZXJseSB1c2VkIGluIGEgbG9uZyB3aGlsZS4nCgpQcml5YSBzbWlsZXMsIHVuYm90aGVyZWQgYnkgdGhlIGFkbWlzc2lvbi4gJ0ZhaXIgZW5vdWdoLiBOb3QgZXZlcnkgbGVzc29uIGxhbmRzIGVhc2lseSB0aGUgZmlyc3QgdGltZS4gR2l2ZSBpdCB0aW1lIOKAlCB5b3UnbGwgcHJvYmFibHkgZmluZCB5b3Vyc2VsZiBjcmF2aW5nIHRoYXQga2luZCBvZiBxdWlldCBhZ2FpbiwgZXZlbnR1YWxseS4nIFRoZSBRdWlldCBIb3VyIGxpZnRzIG9mZiBvdmVyIEJpZyBCZW5kJ3MgdmFzdCwgc2lsZW50IGRlc2VydCwgdGhlIFJpbyBHcmFuZGUgYSBmYWludCBzaWx2ZXIgdGhyZWFkIGZhciBiZWxvdy4=',
            'ending' => true,
        ],
    ],
];
