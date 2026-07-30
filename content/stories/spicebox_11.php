<?php
return [
    'id'    => 11,
    'title' => 'That\'s Just How She Works',
    'color' => '#C89A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'SG9pIEFuJ3Mgb2xkIHRvd24gZ2xvd3MgYXQgZHVzayBpbiBhIGdlbnVpbmUsIGZhbW91cyByaXZlciBvZiBwYXBlciBsYW50ZXJucywgdGhlIG5pZ2h0IG1hcmtldCBzZXR0aW5nIHVwIGFsb25nIHRoZSB3YXRlciB3aXRoIHRoZSBzcGVjaWZpYyB3YXJtIGJ1c3RsZSBvZiBhIHBsYWNlIHRoYXQncyBjbGVhcmx5IGRvbmUgdGhpcyBleGFjdCBldmVuaW5nIHJpdHVhbCBmb3IgYSB2ZXJ5IGxvbmcgdGltZS4gQnJ1bm8gY2hlY2tzIGhpcyBub3RlcyBmb3IgdGhlIHN0YWxsIHRoYXQgY2FycmllcyBwcm9wZXIgbGVtb25ncmFzcyBhbmQgc3RhciBhbmlzZS4KClR3byByb3V0ZXMgdGhyb3VnaCB0aGUgbGFudGVybi1saXQgbmlnaHQgbWFya2V0IHByZXNlbnQgdGhlbXNlbHZlczogYWxvbmcgdGhlIHJpdmVyc2lkZSBwcm9tZW5hZGUgaXRzZWxmLCBvciB0aHJvdWdoIHRoZSBkZW5zZXIgc3RhbGxzIG9uZSBzdHJlZXQgYmFjay4=',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSByaXZlcnNpZGUgcHJvbWVuYWRl', 'next' => '2_river'],
                ['text' => 'VGFrZSB0aGUgc3RhbGxzIG9uZSBzdHJlZXQgYmFjaw==', 'next' => '2_back'],
            ],
        ],
        '2_river' => [
            'prose'  => 'VGhlIHJpdmVyc2lkZSBwcm9tZW5hZGUgaXMgZ2VudWluZWx5IGJlYXV0aWZ1bCwgbGFudGVybnMgcmVmbGVjdGVkIGluIGRhcmsgd2F0ZXIsIGJvYXRzIGRyaWZ0aW5nIHBhc3Qgc2VsbGluZyB0aGVpciBvd24gc21hbGwgZmxvYXRpbmcgbGlnaHRzLiBJdCdzIGEgc2xvd2VyIHJvdXRlLCBjcm93ZGVkIHdpdGggcGVvcGxlIHNpbXBseSBlbmpveWluZyB0aGUgZXZlbmluZywgYnV0IHlvdSBtYWtlIHN0ZWFkeSBwcm9ncmVzcyB0b3dhcmQgdGhlIHJpZ2h0IHN0YWxsLgoKQnJ1bm8gcG9pbnRzIGFoZWFkLiAnVGhlcmUuIEFuZCBpcyB0aGF04oCUJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUncyBub3RpY2Vk', 'next' => '3_shared'],
            ],
        ],
        '2_back' => [
            'prose'  => 'VGhlIHN0cmVldCBvbmUgYmFjayBmcm9tIHRoZSByaXZlciBpcyBkZW5zZXIsIG1vcmUgcHVyZWx5IGNvbW1lcmNpYWwsIHN0YWxscyBwYWNrZWQgdGlnaHRseSB3aXRoIHByb2R1Y2UgYW5kIHNwaWNlIHJhdGhlciB0aGFuIHRoZSBwcm9tZW5hZGUncyBtb3JlIHNjZW5pYyBtaXguIFlvdSBtb3ZlIGZhc3RlciBoZXJlLCByZWFjaGluZyB0aGUgcmlnaHQgc3RhbGwgd2l0aCB0aW1lIHRvIHNwYXJlLgoKQnJ1bm8gc3RvcHMgc2hvcnQuICdJcyB0aGF04oCUJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUncyBub3RpY2Vk', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SXQgaXM6IGEgeW91bmcgd29tYW4gd2l0aCBhIHByb2Zlc3Npb25hbCBjYW1lcmEgY3JldywgZmlsbWluZyBhbiBlbGFib3JhdGUsIGdsb3NzeSBzZWdtZW50IGF0IHRoZSBleGFjdCBzdGFsbCB5b3Ugd2VyZSBoZWFkaW5nIGZvciwgbmFycmF0aW5nIHNvbWV0aGluZyBhYm91dCAnYSBmb3Jnb3R0ZW4gZmFtaWx5IHJlY2lwZScgd2l0aCBhIGNvbmZpZGVuY2UgdGhhdCBtYWtlcyB5b3VyIHN0b21hY2ggZHJvcCBzbGlnaHRseS4gVGhlIHN0YWxsaG9sZGVyIGNhdGNoZXMgeW91ciBleWUgb3ZlciB0aGUgd29tYW4ncyBzaG91bGRlciwgbG9va2luZyBmYWludGx5IGFwb2xvZ2V0aWMuCgonU2VsaW4gQXlkxLFuLCcgQnJ1bm8gbXV0dGVycywgcmVjb2duaXNpbmcgaGVyIGltbWVkaWF0ZWx5LiAnRm9vZCB3cml0ZXIuIFZlcnkgZ29vZCBhdCBtYWtpbmcgb3RoZXIgcGVvcGxlJ3Mgc3RvcmllcyBzb3VuZCBsaWtlIGhlciBvd24gZGlzY292ZXJ5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'RGVjaWRlIGhvdyB0byBoYW5kbGUgdGhpcw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGNvdWxkIHdhaXQsIHBvbGl0ZWx5LCBmb3IgdGhlIGZpbG1pbmcgdG8gZmluaXNoIGFuZCB0aGVuIHNpbXBseSBleHBsYWluIHlvdXIgb3duIGFjdHVhbCBjb25uZWN0aW9uIHRvIHRoZSByZWNpcGUgc2hlJ3MgY3VycmVudGx5IG5hcnJhdGluZywgb3IgeW91IGNvdWxkIHF1aWV0bHkgYXNrIHRoZSBzdGFsbGhvbGRlciBmb3IgYSBwcml2YXRlIHdvcmQgZmlyc3QsIHNvcnRpbmcgb3V0IHlvdXIgZXJyYW5kIGF3YXkgZnJvbSB0aGUgY2FtZXJhcyBlbnRpcmVseS4KCidFaXRoZXIgd29ya3MsJyBCcnVubyBzYXlzIHF1aWV0bHkuICdEZXBlbmRzIHdoZXRoZXIgeW91IHdhbnQgdGhpcyB0byBiZWNvbWUgcGFydCBvZiBoZXIgZm9vdGFnZSBvciBub3QuJw==',
            'choices' => [
                ['text' => 'V2FpdCBhbmQgZXhwbGFpbiBhZnRlcndhcmQsIG9wZW5seQ==', 'next' => '5_open'],
                ['text' => 'QXNrIGZvciBhIHF1aWV0IHdvcmQgYXdheSBmcm9tIHRoZSBjYW1lcmFz', 'next' => '5_quiet'],
            ],
        ],
        '5_open' => [
            'prose'  => 'WW91IHdhaXQgZm9yIHRoZSBzZWdtZW50IHRvIHdyYXAsIHRoZW4gaW50cm9kdWNlIHlvdXJzZWxmIHBsYWlubHksIGV4cGxhaW5pbmcgdGhlIHJlY2lwZSBjYXJkIGFuZCB0aGUgZ3JhbmRtb3RoZXIgYW5kIHRoZSB3aG9sZSB1bmdsYW1vcm91cywgZ2VudWluZSByZWFzb24geW91J3JlIGFjdHVhbGx5IGhlcmUuIFNlbGluJ3MgcHJhY3Rpc2VkIGNhbWVyYS1zbWlsZSBmYWx0ZXJzIHNsaWdodGx5LCByZXBsYWNlZCBieSBzb21ldGhpbmcgc2hhcnBlciwgbW9yZSBjdXJpb3VzLCBhbmQgY29uc2lkZXJhYmx5IG1vcmUgcHJvcHJpZXRhcnkuCgonQSByZWFsIGZhbWlseSBzdG9yeSwnIHNoZSBzYXlzLCBoYWxmIHRvIGhlcnNlbGYsIGFscmVhZHkgbG9va2luZyBsaWtlIHNoZSdzIGZvdW5kIGhlciBuZXh0IHNlZ21lbnQu',
            'choices' => [
                ['text' => 'U2VlIGhvdyB0aGUgc3RhbGxob2xkZXIgcmVzcG9uZHM=', 'next' => '6_shared'],
            ],
        ],
        '5_quiet' => [
            'prose'  => 'WW91IGNhdGNoIHRoZSBzdGFsbGhvbGRlcidzIGV5ZSBhbmQgZ2VzdHVyZSBzdWJ0bHkgdG93YXJkIHRoZSBiYWNrIG9mIHRoZSBzdGFsbCwgYW5kIHNoZSB1bmRlcnN0YW5kcyBpbW1lZGlhdGVseSwgZmluZGluZyBhIG1vbWVudCBiZXR3ZWVuIHRha2VzIHRvIHNsaXAgYXdheSBhbmQgaGVhciB5b3VyIGFjdHVhbCBlcnJhbmQgcHJpdmF0ZWx5LCBhd2F5IGZyb20gU2VsaW4ncyBjcmV3IGVudGlyZWx5LgoKJ0dvb2QsJyB0aGUgc3RhbGxob2xkZXIgbXVybXVycy4gJ1NoZSdzIGNoYXJtaW5nLCB0aGF0IG9uZS4gQWxzbyByZWxlbnRsZXNzLiBCZXN0IHRvIGtlZXAgc29tZSB0aGluZ3Mgc2ltcGx5IHlvdXJzLic=',
            'choices' => [
                ['text' => 'U2VlIGhvdyB0aGUgc3RhbGxob2xkZXIgcmVzcG9uZHM=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB5b3UgaGFuZGxlZCBpdCwgdGhlIHN0YWxsaG9sZGVyIGNvbmZpcm1zIHRoZSBsZW1vbmdyYXNzIGFuZCBzdGFyIGFuaXNlIGFyZSBleGFjdGx5IHdoYXQgSXJpcyBhbHdheXMgdXNlZCwgYW5kIHBhY2thZ2VzIGEgcHJvcGVyIG1lYXN1cmUgZm9yIHlvdSB3aXRoIHJlYWwgd2FybXRoLiBTZWxpbiwgd2F0Y2hpbmcgZnJvbSBhIGRpc3RhbmNlIG5vdywgZG9lc24ndCBhcHByb2FjaCBkaXJlY3RseSwgYnV0IHlvdSBjYXRjaCBoZXIgd3JpdGluZyBzb21ldGhpbmcgaW4gYSBub3RlYm9vaywgZ2xhbmNpbmcgeW91ciB3YXkgbW9yZSB0aGFuIG9uY2UuCgonU2hlJ2xsIGJlIGJhY2sgYXJvdW5kLCcgQnJ1bm8gc2F5cywgd2l0aCB0aGUgZmxhdCBjZXJ0YWludHkgb2Ygc29tZW9uZSB3aG8ncyBkZWFsdCB3aXRoIGhlciBraW5kIGJlZm9yZS4gJ1RoYXQncyBqdXN0IGhvdyBzaGUgd29ya3MuJw==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgc3BpY2VzIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBhbG9uZyB0aGUgbGFudGVybi1saXQgcml2ZXIgd2l0aCB0aGUgbGVtb25ncmFzcyBhbmQgc3RhciBhbmlzZSBzZWN1cmUgaW4gdGhlaXIgd3JhcCwgSG9pIEFuJ3Mgd2hvbGUgYmVhdXRpZnVsIGV2ZW5pbmcgcml0dWFsIGdsb3dpbmcgd2FybSBhcm91bmQgeW91LCB0aG91Z2ggc29tZXRoaW5nIGFib3V0IFNlbGluJ3Mgd2F0Y2hmdWwgYXR0ZW50aW9uIGxpbmdlcnMgdW5jb21mb3J0YWJseSBhdCB0aGUgZWRnZSBvZiB0aGUgZXZlbmluZydzIGNoYXJtLgoKQnJ1bm8sIGNoZWNraW5nIG92ZXIgaGlzIHNob3VsZGVyIG9uY2UsIGxvb2tzIHRob3VnaHRmdWxseSBjb25jZXJuZWQuICdTaGUncyBnb29kIGF0IHdoYXQgc2hlIGRvZXMuIFRoYXQncyBub3QgbmVjZXNzYXJpbHkgYSBjb21wbGltZW50LCBpbiB0aGlzIGNvbnRleHQuJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBub3QgZ29pbmcgdG8gbGV0IGhlciBydXNoIHlvdQ==', 'next' => '8_end_unrushed'],
                ['text' => 'QWRtaXQgc2hlJ3MgYWxyZWFkeSBnb3R0ZW4gdW5kZXIgeW91ciBza2luIGEgbGl0dGxl', 'next' => '8_end_underskin'],
            ],
        ],
        '8_end_unrushed' => [
            'prose'  => 'J0knbSBub3QgZ29pbmcgdG8gbGV0IGhlciBydXNoIG1lLCB3aGF0ZXZlciBzaGUncyBwbGFubmluZywnIHlvdSBzYXksIHdhdGNoaW5nIHRoZSBsYW50ZXJucycgcmVmbGVjdGlvbnMgc2V0dGxlIG9uIHRoZSBkYXJrIHdhdGVyLiAnVGhpcyBpcyBJcmlzJ3Mgc3RvcnkuIEl0J2xsIGdldCB0b2xkIHByb3Blcmx5LCBpbiBpdHMgb3duIHRpbWUsIHJlZ2FyZGxlc3Mgb2Ygd2hhdGV2ZXIgc2hlIHB1Ymxpc2hlcyBmaXJzdC4nCgpCcnVubyBub2RzLCBzYXRpc2ZpZWQuICdHb29kLiBUaGF0J3MgdGhlIHJpZ2h0IGluc3RpbmN0LiBEb24ndCBsZXQgaGVyIHBhY2UgYmVjb21lIHlvdXJzLic=',
            'ending' => true,
        ],
        '8_end_underskin' => [
            'prose'  => 'J0hvbmVzdGx5LCBzaGUncyBhbHJlYWR5IGdvdHRlbiB1bmRlciBteSBza2luIGEgbGl0dGxlLCcgeW91IGFkbWl0LCB1bmFibGUgdG8gc2hha2UgdGhlIGltYWdlIG9mIGhlciBub3RlYm9vayBhbmQgaGVyIHdhdGNoZnVsLCBjYWxjdWxhdGluZyBhdHRlbnRpb24uICdGZWVscyBsaWtlIGEgcmFjZSBub3csIHdoZXRoZXIgSSB3YW50ZWQgb25lIG9yIG5vdC4nCgpCcnVubyBkb2Vzbid0IGRpc21pc3MgdGhlIHdvcnJ5LiAnRmFpci4gS2VlcCB5b3VyIGhlYWQgYWJvdXQgaXQsIHRob3VnaC4gVGhpcyB3YXMgbmV2ZXIgYWN0dWFsbHkgYSByYWNlLCB3aGF0ZXZlciBzaGUgZGVjaWRlcyB0byBtYWtlIG9mIGl0LicgVGhlIGxhbnRlcm5zIGRyaWZ0IG9uIHBhc3QsIGluZGlmZmVyZW50IHRvIGVpdGhlciBvZiB5b3VyIGNvbmNlcm5zLg==',
            'ending' => true,
        ],
    ],
];
