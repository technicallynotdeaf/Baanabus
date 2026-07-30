<?php
return [
    'id'    => 6,
    'title' => 'One Of Several Valid Names',
    'color' => '#B87A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TWVyem91Z2EncyBncmVhdCBkdW5lcyByaXNlIGdvbGQgYW5kIGVub3Jtb3VzIGFnYWluc3QgdGhlIGRhcmtlbmluZyBza3ksIHRoZSBTYWhhcmEncyBlZGdlIHByb3Blcmx5IGFubm91bmNpbmcgaXRzZWxmIGluIHNjYWxlIGFsb25lLiBQcml5YSBzZXRzIHRoZSBRdWlldCBIb3VyIGRvd24gbmVhciBhIGNsdXN0ZXIgb2YgZHVuZS1jYW1wIHRlbnRzLCB0aGVpciBsYW50ZXJuIGxpZ2h0IGFscmVhZHkgZmxpY2tlcmluZyB3YXJtIGFnYWluc3QgdGhlIGVuY3JvYWNoaW5nIGR1c2suCgpUd28gZHVuZS1jYW1wIHJvdXRlcyB0b3dhcmQgdGhlIEJlcmJlciBmYW1pbHkncyB0ZW50IHByZXNlbnQgdGhlbXNlbHZlczogb3ZlciB0aGUgdGFsbGVzdCBuZWFyYnkgZHVuZSBmb3IgdGhlIHZpZXcsIG9yIGFyb3VuZCBpdHMgYmFzZSBhbG9uZyBhIGZpcm1lciwgc2FuZGllciB0cmFjay4=',
            'choices' => [
                ['text' => 'R28gb3ZlciB0aGUgdGFsbGVzdCBkdW5l', 'next' => '2_dune'],
                ['text' => 'VGFrZSB0aGUgZmlybWVyIHRyYWNrIGFyb3VuZCBpdHMgYmFzZQ==', 'next' => '2_track'],
            ],
        ],
        '2_dune' => [
            'prose'  => 'Q2xpbWJpbmcgdGhlIHRhbGxlc3QgbmVhcmJ5IGR1bmUgaXMgaGFyZCwgc2xpZGluZyB3b3JrLCBib290cyBmaWxsaW5nIHN0ZWFkaWx5IHdpdGggZmluZSBzYW5kLCBidXQgdGhlIHZpZXcgZnJvbSBpdHMgY3Jlc3QgaXMgZ2VudWluZWx5IHNwZWN0YWN1bGFyIOKAlCBnb2xkIGR1bmVzIHN0cmV0Y2hpbmcgdG8gZXZlcnkgaG9yaXpvbiwgdGhlIGZpcnN0IHN0YXJzIGFscmVhZHkgZW1lcmdpbmcgaW4gYSBza3kgc3RpbGwgZmFpbnRseSBvcmFuZ2UgYXQgaXRzIGVkZ2VzLgoKWW91IGhhbGYtc2xpZGUgZG93biB0aGUgZmFyIHNpZGUsIGFycml2aW5nIGF0IHRoZSB0ZW50IHByb3Blcmx5IG91dCBvZiBicmVhdGgu',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '2_track' => [
            'prose'  => 'VGhlIGZpcm1lciB0cmFjayBhcm91bmQgdGhlIGR1bmUncyBiYXNlIGlzIGNvbnNpZGVyYWJseSBlYXNpZXIgd2Fsa2luZywgc2FuZCBwYWNrZWQgdGlnaHRlciBieSBnZW5lcmF0aW9ucyBvZiBjYW1lbCB0cmFpbnMgcGFzc2luZyBleGFjdGx5IHRoaXMgcm91dGUuIFlvdSBhcnJpdmUgYXQgdGhlIHRlbnQgdW5odXJyaWVkLCBsYW50ZXJuIGxpZ2h0IGdyb3dpbmcgd2FybWVyIGFzIGZ1bGwgZHVzayBmaW5hbGx5IHNldHRsZXMu',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhbWlseSB3ZWxjb21lcyB5b3Ugd2FybWx5IGludG8gdGhlaXIgdGVudCwgbWludCB0ZWEgYWxyZWFkeSBzdGVhbWluZywgdGhlIHBhdHJpYXJjaCDigJQgYW4gb2xkZXIgbWFuIG5hbWVkIEJyYWhpbSDigJQgZXhhbWluaW5nIHRoZSBhdGxhcydzIG5leHQgYmxhbmsgcGF0Y2ggd2l0aCBpbW1lZGlhdGUsIGRlbGlnaHRlZCByZWNvZ25pdGlvbi4gJ0FoLCB0aGlzIG9uZSwnIGhlIHNheXMuICdXZSBoYXZlIG91ciBvd24gbmFtZSBmb3IgdGhlc2Ugc3RhcnMuIERpZmZlcmVudCBmcm9tIHdoYXRldmVyIHlvdSd2ZSBoZWFyZCBhbHJlYWR5IG9uIHRoaXMgam91cm5leSwgSSdkIGd1ZXNzLicKCkhlIHN0dWRpZXMgeW91LiAnVGhhdCdzIG5vdCBhIHByb2JsZW0sIHlvdSB1bmRlcnN0YW5kLiBEaWZmZXJlbnQgbmFtZXMsIHNhbWUgc3RhcnMuIFRoYXQncyByYXRoZXIgdGhlIHdob2xlIHBvaW50LiBBcmUgeW91IHJlYWR5IHRvIGhlYXIgb3Vycz8n',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSByZWFkeSB0byBoZWFyIHRoZWlyIG5hbWUgZm9yIGl0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'QnJhaGltIG9mZmVycyB0d28gd2F5cyB0byBwcm9wZXJseSByZWNlaXZlIHRoZSBmYW1pbHkncyBvd24gc3Rhci1uYW1lOiBoZWFyIGl0IHRvbGQgYnkgaGltIGRpcmVjdGx5LCB0aGUgdmVyc2lvbiBoZSBsZWFybmVkIGZyb20gaGlzIG93biBmYXRoZXIsIG9yIGhhdmUgaXQgdG9sZCBpbnN0ZWFkIGJ5IGhpcyBkYXVnaHRlciwgQW1pbmEsIHdobydzIGJlZ3VuIGNvbGxlY3RpbmcgYW5kIGNvbXBhcmluZyBzZXZlcmFsIGVsZGVycycgc2xpZ2h0bHkgZGlmZmVyZW50IHZlcnNpb25zIG9mIHRoZSBzYW1lIHN0b3J5LgoKJ0VpdGhlciBpcyBwcm9wZXJseSBvdXJzLCcgaGUgc2F5cy4gJ015IGZhdGhlcidzIGV4YWN0IHRlbGxpbmcsIG9yIG15IGRhdWdodGVyJ3MgZ2F0aGVyZWQgY29tcGFyaXNvbi4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'SGVhciBCcmFoaW0ncyBvd24gdGVsbGluZw==', 'next' => '5_father'],
                ['text' => 'SGVhciBBbWluYSdzIGdhdGhlcmVkIGNvbXBhcmlzb24=', 'next' => '5_daughter'],
            ],
        ],
        '5_father' => [
            'prose'  => 'SGVhcmluZyBCcmFoaW0ncyBvd24gdGVsbGluZyBtZWFucyBhIHdhcm0sIGRpcmVjdCBhY2NvdW50IHBhc3NlZCBkb3duIHVuY2hhbmdlZCBmcm9tIGhpcyBvd24gZmF0aGVyLCB0aGUgc3Rhci1uYW1lIGFuZCBpdHMgc3RvcnkgZGVsaXZlcmVkIHdpdGggdGhlIGVhc3kgY29uZmlkZW5jZSBvZiBzb21ldGhpbmcgcmVjaXRlZCBleGFjdGx5IHRoZSBzYW1lIHdheSBmb3IgZ2VuZXJhdGlvbnMsIG1pbnQgdGVhIHN0ZWFtaW5nIGJldHdlZW4geW91IGJvdGggdGhlIHdob2xlIHRlbGxpbmcuCgpCeSB0aGUgZW5kLCB0aGUgbmFtZSBhbmQgaXRzIHN0b3J5IGZlZWwgc29saWQsIHNldHRsZWQsIGV4YWN0bHkgYXMgcGFzc2VkIGRvd24u',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_daughter' => [
            'prose'  => 'SGVhcmluZyBBbWluYSdzIGdhdGhlcmVkIGNvbXBhcmlzb24gbWVhbnMgYSBsaXZlbGllciwgbW9yZSBjdXJpb3VzIGFjY291bnQsIHNldmVyYWwgZWxkZXJzJyBzbGlnaHRseSBkaWZmZXJlbnQgdmVyc2lvbnMgb2YgdGhlIHNhbWUgc3Rhci1uYW1lIHdvdmVuIHRvZ2V0aGVyIHdpdGggaGVyIG93biBjYXJlZnVsIG5vdGVzIG9uIHdoZXJlIHRoZXkgYWdyZWUgYW5kIHdoZXJlIHRoZXkgcXVpZXRseSBkaXZlcmdlLCBhIHN0b3J5IHN0aWxsIHZpc2libHksIGFjdGl2ZWx5IGFsaXZlIHJhdGhlciB0aGFuIGZpeGVkLgoKQnkgdGhlIGVuZCwgeW91IHVuZGVyc3RhbmQgbm90IGp1c3Qgb25lIHRlbGxpbmcsIGJ1dCB0aGUgc2hhcGUgb2YgaG93IGl0J3Mgc3RpbGwgZXZvbHZpbmcu',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMncyBibGFuayBwYXRjaCwgYW5kIEJyYWhpbSBhZGRzIGhpcyBvd24gY2FyZWZ1bCBub3RlIGJlc2lkZSBpdCDigJQgbm90IGFzIFRIRSBuYW1lLCBidXQgYXMgb25lIG9mIHNldmVyYWwgdmFsaWQgbmFtZXMgZm9yIHRoZXNlIGV4YWN0IHN0YXJzLCBleGFjdGx5IGFzIENvcndpbidzIGVhcmxpZXIgbm90ZXMgZWxzZXdoZXJlIGluIHRoZSBhdGxhcyBoYXZlIHF1aWV0bHksIHJlc3BlY3RmdWxseSBkb25lIGZvciBvdGhlciB0cmFkaXRpb25zLgoKJ1lvdXIgZ3JlYXQtdW5jbGUgdW5kZXJzdG9vZCB0aGF0IHByb3Blcmx5LCcgQnJhaGltIHNheXMsIHN0dWR5aW5nIHRoZSBjb21wbGV0ZWQgcGFnZS4gJ05ldmVyIG9uY2UgY2xhaW1lZCBvbmUgbmFtZSB3YXMgbW9yZSBjb3JyZWN0IHRoYW4gYW5vdGhlci4gUmFyZSwgdGhhdCBraW5kIG9mIHJlc3BlY3QuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgdGhlIGZhbWlseSBhbmQgc3RhcnQgYmFjaw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHN0ZXAgYmFjayBvdXQgaW50byB0aGUgY29vbGluZyBkZXNlcnQgbmlnaHQsIHRoZSBkdW5lcyBub3cgcHVyZSBzaWxob3VldHRlIGFnYWluc3QgYSBza3kgdGhpY2sgd2l0aCBzdGFycywgdGhlIGZhbWlseSdzIHdhcm0gdGVudCBhbmQgbWludCB0ZWEgYWxyZWFkeSBmYWRpbmcgZ2VudGx5IGJlaGluZCB5b3UuIFByaXlhJ3Mgd2FpdGluZyB3aXRoIHRoZSBzaGFyZWQgdGhlcm1vcywgU3VsaSBkb3ppbmcgY3VybGVkIGluIHRoZSBub3NlIGNvbmUuCgonR29vZCB2aXNpdD8nIHNoZSBhc2tzLCBub3RpbmcgeW91ciB0aG91Z2h0ZnVsIGV4cHJlc3Npb24u',
            'choices' => [
                ['text' => 'U2F5IGl0IGNoYW5nZWQgaG93IHlvdSB0aGluayBhYm91dCAndGhlJyBuYW1lIGZvciBzb21ldGhpbmc=', 'next' => '8_end_names'],
                ['text' => 'U2F5IHRoZSB0ZWEgd2FzIHRoZSBiZXN0IHBhcnQsIGhvbmVzdGx5', 'next' => '8_end_tea'],
            ],
        ],
        '8_end_names' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBjaGFuZ2VkIGhvdyBJIHRoaW5rIGFib3V0ICJ0aGUiIG5hbWUgZm9yIHNvbWV0aGluZywnIHlvdSBhZG1pdCwgd2F0Y2hpbmcgdGhlIGR1bmUgc2lsaG91ZXR0ZXMgc2V0dGxlIGludG8gZnVsbCBkYXJrLiAnTmV2ZXIgb2NjdXJyZWQgdG8gbWUgYmVmb3JlIHRoYXQgYSBuYW1lIGNvdWxkIGJlIHByb3Blcmx5LCBlcXVhbGx5IHZhbGlkIHNldmVyYWwgZGlmZmVyZW50IHdheXMgYXQgb25jZSwgYWxsIGhlbGQgd2l0aCB0aGUgc2FtZSByZXNwZWN0LicKClByaXlhIG5vZHMgc2xvd2x5LiAnVGhhdCdzIHJhdGhlciB0aGUgd2hvbGUgcG9pbnQgb2YgdGhpcyBhdGxhcywgSSB0aGluaywgd2hlbiB5b3UgbG9vayBhdCBpdCBwcm9wZXJseS4gTm8gc2luZ2xlIGNvcnJlY3Qgc2t5LiBKdXN0IGEgbG90IG9mIHBlb3BsZSwgYWxsIGxvb2tpbmcgdXAgaG9uZXN0bHkuJw==',
            'ending' => true,
        ],
        '8_end_tea' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgdGVhIHdhcyB0aGUgYmVzdCBwYXJ0LCcgeW91IHNheSwgb25seSBoYWxmLWpva2luZywgc3RpbGwgd2FybSBmcm9tIEJyYWhpbSdzIGhvc3BpdGFsaXR5LiAnVGhvdWdoIHRoZSBzdGFyLW5hbWUgd2FzIGxvdmVseSB0b28uIEp1c3Qg4oCUIGdlbnVpbmVseSBnb29kIHRlYSwgdGhhdC4nCgpQcml5YSBsYXVnaHMsIGxvZ2dpbmcgdGhlIG5pZ2h0J3MgZGV0YWlscyBpbiBoZXIgd29ybiBub3RlYm9vayByZWdhcmRsZXNzLiAnRmFpci4gU29tZSBzdG9wcyBhcmUgbGlrZSB0aGF0LiBEb2Vzbid0IG1ha2UgdGhlIHJlc3Qgb2YgaXQgYW55IGxlc3MgcmVhbC4nIFRoZSBRdWlldCBIb3VyIGxpZnRzIGdlbnRseSBvZmYgdGhlIHNhbmQsIGR1bmVzIHNocmlua2luZyBpbnRvIGdvbGQtYmxhY2sgc2hhZG93IGJlbG93IGFzIHlvdSBjbGltYiB0b3dhcmQgdGhlIG5leHQgc3RvcC4=',
            'ending' => true,
        ],
    ],
];
