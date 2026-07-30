<?php
return [
    'id'    => 23,
    'title' => 'Took Her a While to Decide',
    'color' => '#C89050',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGFzaGtlbnQgc2l0cyBjbG9zZSBlbm91Z2ggdG8gU2FtYXJrYW5kIG5vdyB0aGF0IGV2ZXJ5b25lIGNhbiBmZWVsIHRoZSBqb3VybmV5J3MgYWN0dWFsIGVuZCBhcHByb2FjaGluZywgdGhlIGNhcmF2YW4gcGF1c2luZyBoZXJlIGxlc3Mgb3V0IG9mIG5lY2Vzc2l0eSB0aGFuIGEgc2hhcmVkLCB1bnNwb2tlbiBuZWVkIHRvIHByb3Blcmx5IGdhdGhlciBiZWZvcmUgdGhlIHZlcnkgbGFzdCBsZWcuIFRvbWFzLCBCZXJrYW50LCBhbmQgdGhlIGhhd2sgYXJlIGFsbCBoZXJlIHRvZ2V0aGVyIGZvciB3aGF0IGZlZWxzIGxpa2UgdGhlIGZpcnN0IHRpbWUgYXMgYSBnZW51aW5lLCBzZXR0bGVkIGdyb3VwIHJhdGhlciB0aGFuIHBlb3BsZSBzaW1wbHkgdHJhdmVsbGluZyB0aGUgc2FtZSBkaXJlY3Rpb24uCgpUaGUgZXZlbmluZyBzZXR0bGVzIHNsb3cgYW5kIHdhcm0gYXJvdW5kIGEgbW9kZXN0IGZpcmUsIG5vYm9keSBpbiBhbnkgcGFydGljdWxhciBodXJyeSB0byBmaWxsIHRoZSBxdWlldCB3aXRoIHRhbGsu',
            'choices' => [
                ['text' => 'U2l0IHdpdGggdGhlIHF1aWV0IGEgd2hpbGU=', 'next' => '2_shared'],
            ],
        ],
        '2_shared' => [
            'prose'  => 'QmVya2FudCwgdW5jaGFyYWN0ZXJpc3RpY2FsbHkgcmVsYXhlZCwgbWVudGlvbnMgYSBsZXR0ZXIncyBhbHJlYWR5IGFycml2ZWQgZnJvbSBoaXMgYnJvdGhlciDigJQgc2hvcnQsIGJ1dCBnZW51aW5lbHkgd2FybSwgdGhlIGZpcnN0IG9mIHdoYXQgYm90aCBvZiB0aGVtIGhhdmUgcHJvbWlzZWQgd2lsbCBiZSBtYW55LiBUb21hcyBsaXN0ZW5zIHdpdGggcmVhbCBzYXRpc2ZhY3Rpb24sIHRoZSB3aG9sZSBzdHJhbmdlLCBhY2NpZGVudGFsIGZvdW5kLWZhbWlseSBhc3NlbWJsZWQgYXJvdW5kIG9uZSBzbWFsbCBmaXJlIGZlZWxpbmcsIGZvciBhIG1vbWVudCwgbGlrZSBleGFjdGx5IHdoZXJlIGV2ZXJ5b25lJ3MgYWN0dWFsbHkgc3VwcG9zZWQgdG8gYmUuCgpUaGUgaGF3aywgcGVyY2hlZCBuZWFyYnksIHdhdGNoZXMgeW91IHNwZWNpZmljYWxseSB3aXRoIGFuIGF0dGVudGlvbiB0aGF0IGZlZWxzIGRpZmZlcmVudCB0b25pZ2h0IOKAlCBsZXNzIGFzc2Vzc2luZywgbW9yZSBzaW1wbHkgcHJlc2VudC4=',
            'choices' => [
                ['text' => 'V2F0Y2ggaGVyIGJhY2s=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'U2hlIGhvbGRzIHlvdXIgZ2F6ZSBhIGxvbmcgbW9tZW50LCB0aGVuIGRvZXMgc29tZXRoaW5nIHNoZSdzIG5ldmVyIG9uY2UgZG9uZSB0aGUgd2hvbGUgam91cm5leTogc2hlIGNvbWVzIHRvIHlvdSwgdW5wcm9tcHRlZCwgc2V0dGxpbmcgb24geW91ciBvZmZlcmVkIGFybSB3aXRoIHRoZSBlYXN5IGNvbmZpZGVuY2Ugb2YgYSBjcmVhdHVyZSB3aG8ncyBmaW5hbGx5LCBwcm9wZXJseSBkZWNpZGVkIHNvbWV0aGluZy4KClRvbWFzIHdhdGNoZXMsIHF1aWV0IGFuZCBjbGVhcmx5IG1vdmVkLiAnU2hlJ3MgZGVjaWRlZCwnIGhlIHNheXMgc2ltcGx5LiAnVG9vayBoZXIgYSB3aGlsZS4gU2hlIGRvZXNuJ3QgZGVjaWRlIGFib3V0IHBlb3BsZSBxdWlja2x5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgdG8gbmFtZSBoZXI=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'J1NoZSdzIHlvdXJzIHRvIG5hbWUgbm93LCBwcm9wZXJseSwnIFRvbWFzIHNheXMuICdOb3QgbWluZSB0byBkbywgbm90IGFueW1vcmUuIFRoYXQncyBub3QgaG93IGl0IHdvcmtzLCBvbmNlIHRoZXkndmUgYWN0dWFsbHkgZGVjaWRlZC4nCgpZb3UgdGhpbmsgYWJvdXQgdGhlIHdob2xlIGpvdXJuZXkg4oCUIG5pbmUgY2l0aWVzLCBuaW5lIGRlYnRzLCBhIHByb3ZlcmIgdGhhdCBvcGVuZWQgYSBsb2NrZWQgZG9vciwgYSByaXZhbHJ5IHRoYXQgYmVjYW1lIGEgcmVhbCBmcmllbmRzaGlwLCBhIGhvdXNlIGZpbmFsbHksIHByb3Blcmx5IGNsb3NpbmcgYWZ0ZXIgdGhyZWUgZ2VuZXJhdGlvbnMgb2YgcXVpZXQgZmFpbHVyZS4gQSBuYW1lIHNldHRsZXMgaW4geW91LCB1bmZvcmNlZCwgdGhlIHdheSB0aGUgcmlnaHQgb25lcyBnZW5lcmFsbHkgZG8u',
            'choices' => [
                ['text' => 'R2l2ZSBoZXIgdGhlIG5hbWU=', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'J051ciwnIHlvdSBzYXksIHF1aWV0bHkg4oCUIGxpZ2h0LCB0aGUgd29yZCBzZXR0bGluZyBlYXNpbHkgb2ZmIHlvdXIgdG9uZ3VlIGluIGEgd2F5IHRoYXQgZmVlbHMgbGlrZSBpdCBiZWxvbmdzIGFjcm9zcyBldmVyeSBsYW5ndWFnZSB0aGlzIGpvdXJuZXkgaGFzIGFjdHVhbGx5IHBhc3NlZCB0aHJvdWdoLiBTaGUgYWNjZXB0cyBpdCB0aGUgd2F5IHNoZSdzIGFjY2VwdGVkIGV2ZXJ5dGhpbmcgZWxzZSB0b25pZ2h0LCB3aXRob3V0IGZ1c3MsIHNpbXBseSBwcmVzZW50LCBzaW1wbHksIGZpbmFsbHksIHlvdXJzLiBCZXJrYW50IHJhaXNlcyBoaXMgY3VwIGluIGEgc21hbGwsIGluZm9ybWFsIHRvYXN0LiBUb21hcyBqdXN0IHNtaWxlcywgc2F0aXNmaWVkLgoKJ0dvb2QgbmFtZSwnIGhlIHNheXMuICdTaGUncyBlYXJuZWQgc29tZSwgdGhpcyB3aG9sZSB3YXkuJwoKVG9tb3Jyb3csIHRoZSBsYXN0IGxlZyB0byBTYW1hcmthbmQgYmVnaW5zLiBUb25pZ2h0LCBmb3Igb25jZSwgaXMgc2ltcGx5IGZvciBzaXR0aW5nIHdpdGggZXZlcnlvbmUgd2hvIGFjdHVhbGx5IG1hZGUgaXQgdGhpcyBmYXIu',
            'choices' => [
                ['text' => 'VHVybiBpbiBlYXJseSwgcmVhZHkgZm9yIHRvbW9ycm93', 'next' => '6_end_early'],
                ['text' => 'U3RheSB1cCBhIHdoaWxlIGxvbmdlciB3aXRoIGV2ZXJ5b25l', 'next' => '6_end_late'],
            ],
        ],
        '6_end_early' => [
            'prose'  => 'WW91IHR1cm4gaW4gZWFybHksIGdlbnVpbmVseSByZWFkeSBmb3Igd2hhdGV2ZXIgdG9tb3Jyb3cgYWN0dWFsbHkgYnJpbmdzLCBOdXIgc2V0dGxpbmcgbmVhcmJ5IHJhdGhlciB0aGFuIGF0IGFueSBkaXN0YW5jZSBmb3IgdGhlIGZpcnN0IHRpbWUuIFNsZWVwIGNvbWVzIGVhc2lseSwgdGhlIHdob2xlIGxvbmcgam91cm5leSdzIGFjY3VtdWxhdGVkIHdlaWdodCBzb21laG93IGxpZ2h0ZXIgbm93IHRoYW4gaXQncyBiZWVuIGluIG1vbnRocy4KClRvbW9ycm93LCBob21lLiBUb25pZ2h0LCBzaW1wbHksIHByb3Blcmx5LCByZXN0ZWQu',
            'ending' => true,
        ],
        '6_end_late' => [
            'prose'  => 'WW91IHN0YXkgdXAgYSB3aGlsZSBsb25nZXIgaW5zdGVhZCwgdGhlIGZpcmUgYnVybmluZyBsb3csIHN0b3JpZXMgdHJhZGluZyBiYWNrIGFuZCBmb3J0aCBiZXR3ZWVuIFRvbWFzIGFuZCBCZXJrYW50IHRoYXQgaGF2ZSBub3RoaW5nIHRvIGRvIHdpdGggd2VkZ2VzIG9yIGRlYnRzIGF0IGFsbCDigJQganVzdCB0d28gbWVuIHdobyd2ZSBiZWNvbWUgZ2VudWluZSBmcmllbmRzLCBzaGFyaW5nIGFuIGV2ZW5pbmcgd2l0aCBzb21lb25lIHRoZXkndmUgYm90aCwgc29tZXdoZXJlIGFsb25nIHRoZSB3YXksIGNvbWUgdG8gcHJvcGVybHkgdHJ1c3QuCgpOdXIgc3RheXMgY2xvc2UgdGhlIHdob2xlIHRpbWUuIFRvbW9ycm93IHdpbGwgY29tZSByZWdhcmRsZXNzLiBUb25pZ2h0LCBmb3Igb25jZSwgbm9ib2R5J3MgaW4gYW55IGh1cnJ5IHRvIHJ1c2ggaXQu',
            'ending' => true,
        ],
    ],
];
