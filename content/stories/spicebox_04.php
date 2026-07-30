<?php
return [
    'id'    => 4,
    'title' => 'Never Written Down',
    'color' => '#7A5A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'RmV6IHJpc2VzIGFyb3VuZCBpdHMgYW5jaWVudCBtZWRpbmEsIHRoZSBhaXIgdGhpY2sgd2l0aCB0aGUgbGF5ZXJlZCBzbWVsbCBvZiBsZWF0aGVyLCBjZWRhciwgYW5kIGV2ZXJ5IHNwaWNlIGltYWdpbmFibGUgbG9uZyBiZWZvcmUgeW91IGFjdHVhbGx5IHJlYWNoIGFueSBtYXJrZXQgc3RhbGwuIEJydW5vIG1vdmVzIHRocm91Z2ggdGhlIG5hcnJvdyBzdHJlZXRzIHdpdGggcmVhbCwgcHJhY3Rpc2VkIGNvbmZpZGVuY2UsIFBpbSdzIGJhc2tldCBkcmF3aW5nIGN1cmlvdXMgZ2xhbmNlcyBmcm9tIHN0YWxsaG9sZGVycyB1c2VkIHRvIHNlZWluZyBldmVyeXRoaW5nLgoKVHdvIHdheXMgdG93YXJkIHRoZSBzcGljZS1ibGVuZGVyJ3Mgc2hvcCBwcmVzZW50IHRoZW1zZWx2ZXM6IHN0cmFpZ2h0IHRocm91Z2ggdGhlIG1lZGluYSdzIGRlbnNlIGNlbnRyYWwgbWFya2V0LCBvciBhIGxvbmdlciByb3V0ZSBwYXN0IHRoZSB0YW5uZXJ5IGRpc3RyaWN0LCB3aGVyZSB0aGUgc21lbGwgYWxvbmUgdGVuZHMgdG8ga2VlcCBjYXN1YWwgdmlzaXRvcnMgYXdheS4=',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgY2VudHJhbCBtZWRpbmE=', 'next' => '2_medina'],
                ['text' => 'VGFrZSB0aGUgdGFubmVyeSBkaXN0cmljdCByb3V0ZQ==', 'next' => '2_tannery'],
            ],
        ],
        '2_medina' => [
            'prose'  => 'VGhlIGNlbnRyYWwgbWVkaW5hIGlzIGEgZ2VudWluZSBtYXplLCBuYXJyb3cgYWxsZXlzIHBhY2tlZCB3aXRoIHN0YWxscyBzZWxsaW5nIGV2ZXJ5dGhpbmcgZnJvbSBsZWF0aGVyIGdvb2RzIHRvIGdsZWFtaW5nIHB5cmFtaWRzIG9mIGdyb3VuZCBzcGljZSwgY29sb3VyIGFuZCBub2lzZSBwcmVzc2luZyBpbiBmcm9tIGV2ZXJ5IGRpcmVjdGlvbi4gWW91IG5hdmlnYXRlIGl0IHNsb3dseSwgYXNraW5nIGRpcmVjdGlvbnMgdHdpY2UsIGJlZm9yZSBmaW5hbGx5IGZpbmRpbmcgYSBzbWFsbCwgdW5hc3N1bWluZyBzaG9wZnJvbnQuCgonR29vZCBzaWduLCB0aGF0IGl0J3MgdW5hc3N1bWluZywnIEJydW5vIHNheXMuICdUaGUgcmVhbCBvbmVzIG5ldmVyIG5lZWQgdG8gc2hvdXQuJw==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHNob3A=', 'next' => '3_shared'],
            ],
        ],
        '2_tannery' => [
            'prose'  => 'VGhlIHRhbm5lcnkgZGlzdHJpY3Qgcm91dGUgaXMgY29uc2lkZXJhYmx5IG1vcmUgcHVuZ2VudCwgdmF0cyBvZiBkeWUgYW5kIHRyZWF0bWVudCB2aXNpYmxlIGJlbG93IHRoZSB2aWV3aW5nIHRlcnJhY2VzLCB0aGUgc21lbGwgc3Ryb25nIGVub3VnaCB0aGF0IGV2ZW4gUGltIGdvZXMgdW5jaGFyYWN0ZXJpc3RpY2FsbHkgcXVpZXQgaW4gaGlzIGJhc2tldC4gSXQncyBhIGxvbmdlciB3YWxrLCBidXQgYSBnZW51aW5lbHkgbWVtb3JhYmxlIG9uZS4KCllvdSBhcnJpdmUgYXQgdGhlIHNhbWUgc21hbGwgc2hvcGZyb250IGZyb20gdGhlIG9wcG9zaXRlIGRpcmVjdGlvbiwgY29uc2lkZXJhYmx5IG1vcmUgZWR1Y2F0ZWQgYWJvdXQgdGhlIGNpdHkncyBvdGhlciBmYW1vdXMgY3JhZnQu',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHNob3A=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHNob3AgYmVsb25ncyB0byB0aGUgQmVuamVsbG91biBmYW1pbHksIHNwaWNlIGJsZW5kZXJzIGZvciBmaXZlIGdlbmVyYXRpb25zLCBhbmQgdGhlIGN1cnJlbnQga2VlcGVyLCBGYXRpbWEsIGd1YXJkcyBoZXIgZmFtaWx5J3Mgc3BlY2lmaWMgcmFzIGVsIGhhbm91dCByZWNpcGUgdGhlIHdheSBvdGhlciBmYW1pbGllcyBndWFyZCBhY3R1YWwgdHJlYXN1cmUuICdUaGlydHksIGZvcnR5IGluZ3JlZGllbnRzLCBkZXBlbmRpbmcgb24gdGhlIGJhdGNoLCcgc2hlIHNheXMuICdOZXZlciB3cml0dGVuIGRvd24uIE5ldmVyIHNoYXJlZCwgbm90IGV2ZW4gd2l0aCBvdGhlciBibGVuZGVycyBpbiB0aGlzIHZlcnkgbWFya2V0LicKClNoZSBzdHVkaWVzIHlvdSBjYXJlZnVsbHkuICdZb3VyIGdyYW5kbW90aGVyIGNhbWUgaGVyZSBvbmNlLCB5ZWFycyBhZ28sIGFuZCBhc2tlZCBwcm9wZXJseSBpbnN0ZWFkIG9mIHRyeWluZyB0byBidXkgaGVyIHdheSBpbnRvIHRoZSByZWNpcGUuIEknbGwgdGVhY2ggeW91IHRoZSBzYW1lIHdheSwgaWYgeW91J3JlIHBhdGllbnQgZW5vdWdoIGZvciBpdC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgcGF0aWVuY2UgbG9va3MgbGlrZSBoZXJl', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RmF0aW1hIG9mZmVycyB0d28gd2F5cyB0byBhY3R1YWxseSBlYXJuIHRoZSBsZXNzb246IHNwZW5kIGEgZnVsbCBkYXkgaW4gdGhlIHNob3AsIHdhdGNoaW5nIGFuZCBoZWxwaW5nIHdpdGggdGhlIG9yZGluYXJ5IGRhaWx5IGJ1c2luZXNzIG9mIGdyaW5kaW5nIGFuZCBzZWxsaW5nLCBwcm92aW5nIGdlbnVpbmUgaW50ZXJlc3QgdGhyb3VnaCBzaW1wbGUgcHJlc2VuY2UsIG9yIGF0dGVtcHQgYSBibGVuZCB5b3Vyc2VsZiwgYmFkbHkgYXQgZmlyc3QsIGFuZCBsZWFybiB0aHJvdWdoIHRoZSBzcGVjaWZpYyBodW1pbGl0eSBvZiBnZXR0aW5nIGl0IHdyb25nIGluIGZyb250IG9mIGhlci4KCidFaXRoZXIgc2hvd3MgbWUgc29tZXRoaW5nIHRydWUsJyBzaGUgc2F5cy4gJ1BhdGllbmNlLCBvciBodW1pbGl0eS4gUGljayB3aGljaGV2ZXIgeW91J3JlIGFjdHVhbGx5IHdpbGxpbmcgdG8gb2ZmZXIuJw==',
            'choices' => [
                ['text' => 'U3BlbmQgdGhlIGRheSBoZWxwaW5nIGluIHRoZSBzaG9w', 'next' => '5_help'],
                ['text' => 'QXR0ZW1wdCBhIGJsZW5kIHlvdXJzZWxm', 'next' => '5_attempt'],
            ],
        ],
        '5_help' => [
            'prose'  => 'U3BlbmRpbmcgdGhlIGRheSBoZWxwaW5nIG1lYW5zIHJlYWwsIHVuZ2xhbW9yb3VzIGxhYm91ciDigJQgZ3JpbmRpbmcsIHNvcnRpbmcsIHdlaWdoaW5nIG91dCBvcmRlcnMgZm9yIGEgc3RlYWR5IHN0cmVhbSBvZiByZWd1bGFyIGN1c3RvbWVycyB3aG8gYWxsIHNlZW0gdG8ga25vdyBGYXRpbWEgcGVyc29uYWxseS4gWW91IHNheSBsaXR0bGUsIG1vc3RseSB3YXRjaCwgYW5kIGJ5IGV2ZW5pbmcsIHNoZSBzZWVtcyBzYXRpc2ZpZWQgdGhhdCB5b3VyIHBhdGllbmNlIHdhcyBnZW51aW5lIHJhdGhlciB0aGFuIHBlcmZvcm1lZC4KCidZb3Ugd2FpdGVkIHByb3Blcmx5LCcgc2hlIHNheXMuICdUaGF0J3MgcmFyZXIgdGhhbiBwZW9wbGUgdGhpbmsuJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgc2hlIHRlYWNoZXM=', 'next' => '6_shared'],
            ],
        ],
        '5_attempt' => [
            'prose'  => 'QXR0ZW1wdGluZyBhIGJsZW5kIHlvdXJzZWxmIGlzIGh1bWJsaW5nIGFsbW9zdCBpbW1lZGlhdGVseSwgeW91ciBmaXJzdCBlZmZvcnQgbGFuZGluZyBub3doZXJlIG5lYXIgdGhlIGJhbGFuY2UgRmF0aW1hJ3Mgb3duIGJsZW5kcyBhY2hpZXZlIHdpdGhvdXQgYXBwYXJlbnQgZWZmb3J0LiBTaGUgbGV0cyB5b3UgZmFpbCB0d2ljZSwgZnVsbHksIGJlZm9yZSBmaW5hbGx5LCBnZW50bHksIHN0YXJ0aW5nIHRvIGFjdHVhbGx5IGNvcnJlY3QgeW91LgoKJ1lvdSB3ZXJlIHdpbGxpbmcgdG8gbG9vayBmb29saXNoIGluIGZyb250IG9mIG1lLCcgc2hlIHNheXMgYWZ0ZXJ3YXJkLiAnVGhhdCdzIHJhcmVyIHRoYW4gcGVvcGxlIHRoaW5rLCB0b28uJw==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgc2hlIHRlYWNoZXM=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RmF0aW1hIGZpbmFsbHksIHByb3Blcmx5IHRlYWNoZXMgeW91IHRoZSBmYW1pbHkgYmxlbmQg4oCUIG5vdCB0aGUgZXhhY3QgcmF0aW9zLCB3aGljaCBzdGF5IGhlcnMgYWxvbmUsIGJ1dCB0aGUgdW5kZXJseWluZyBsb2dpYywgdGhlIGxheWVyaW5nIG9mIHdhcm0gc3BpY2VzIGFnYWluc3Qgc2hhcnAgb25lcywgc3dlZXQgYWdhaW5zdCBiaXR0ZXIsIGJ1aWx0IHVwIGluIGNhcmVmdWwgc3RhZ2VzIHJhdGhlciB0aGFuIGFsbCBhdCBvbmNlLiBUb2dldGhlciwgeW91IGJsZW5kIGEgZnJlc2ggYmF0Y2ggc3BlY2lmaWNhbGx5IGZvciB0aGUgcmVjaXBlIGNhcmQncyBtaXNzaW5nIHBpZWNlLgoKJ1RoaXMgaXMgeW91cnMgbm93LCcgc2hlIHNheXMsIHNlYWxpbmcgaXQgY2FyZWZ1bGx5LiAnTm90IHRoZSBmYW1pbHkgc2VjcmV0LiBKdXN0IGVub3VnaCBvZiB0aGUgdW5kZXJzdGFuZGluZyB0byBmaW5pc2ggd2hhdCB5b3UgYWN0dWFsbHkgY2FtZSBmb3IuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0aHJvdWdoIHRoZSBtZWRpbmEgd2l0aCB0aGUgZnJlc2ggcmFzIGVsIGhhbm91dCBzZWN1cmUgaW4gaXRzIHBhcGVyIHdyYXAsIEZleidzIGFuY2llbnQgc3RyZWV0cyBzZXR0bGluZyBpbnRvIGV2ZW5pbmcgYXJvdW5kIHlvdSwgdGhlIGRheSdzIHBhdGllbnQsIGh1bWJsaW5nIGxlc3NvbiBzZXR0bGluZyBhbG9uZ3NpZGUgdGhlIHNwaWNlIGl0c2VsZi4KCkJydW5vIGJyZWF0aGVzIGluIHRoZSBibGVuZCdzIGNvbXBsZXggd2FybXRoIHdpdGggcmVhbCBhcHByZWNpYXRpb24uICdUaGF0J3MgcHJvcGVyIHdvcmssIHRoYXQuIFlvdSBjYW4gYWx3YXlzIHRlbGwgd2hlbiBzb21lb25lJ3MgYWN0dWFsbHkgYmVlbiB0YXVnaHQgcmF0aGVyIHRoYW4ganVzdCBoYW5kZWQgYSBmb3JtdWxhLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBnbGFkIHlvdSB3ZXJlIHBhdGllbnQgZW5vdWdo', 'next' => '8_end_patient'],
                ['text' => 'U2F5IHRoZSBodW1pbGl0eSB3YXMgaGFyZGVyIHRoYW4gdGhlIHBhdGllbmNlIHdvdWxkIGhhdmUgYmVlbg==', 'next' => '8_end_humble'],
            ],
        ],
        '8_end_patient' => [
            'prose'  => 'J0knbSBnbGFkIEkgd2FzIHBhdGllbnQgZW5vdWdoLCBob25lc3RseSwnIHlvdSBzYXksIHRoaW5raW5nIGJhY2sgb3ZlciB0aGUgd2hvbGUgcXVpZXQgZGF5IG9mIHdhdGNoaW5nIGFuZCB3YWl0aW5nLiAnRmVsdCBsaWtlIHRoZSByaWdodCB3YXkgaW4sIGZvciBzb21lb25lIGFzIHByb3RlY3RpdmUgb2YgaGVyIGNyYWZ0IGFzIEZhdGltYSBjbGVhcmx5IGlzLicKCkJydW5vIG5vZHMsIHNhdGlzZmllZC4gJ0dvb2QgaW5zdGluY3QuIFNvbWUgZG9vcnMgb25seSBvcGVuIGZvciBwZW9wbGUgd2lsbGluZyB0byBzaW1wbHkgd2FpdCBwcm9wZXJseSBvdXRzaWRlIHRoZW0gYSB3aGlsZSBmaXJzdC4n',
            'ending' => true,
        ],
        '8_end_humble' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgaHVtaWxpdHkgd2FzIGhhcmRlciB0aGFuIHRoZSBwYXRpZW5jZSB3b3VsZCBoYXZlIGJlZW4sJyB5b3UgYWRtaXQsIHN0aWxsIGZhaW50bHkgZW1iYXJyYXNzZWQgYnkgeW91ciBmaXJzdCBjbHVtc3kgYXR0ZW1wdHMgYXQgdGhlIGJsZW5kLiAnRmFpbGluZyBpbiBmcm9udCBvZiBzb21lb25lIHRoYXQgc2tpbGxlZCB3YXNuJ3QgY29tZm9ydGFibGUuJwoKQnJ1bm8gbGF1Z2hzLCB3YXJtIGFuZCBnZW51aW5lLiAnRGlzY29tZm9ydCdzIHVzdWFsbHkgYSBnb29kIHNpZ24geW91J3JlIGFjdHVhbGx5IGxlYXJuaW5nIHNvbWV0aGluZyByZWFsLiBXZWFyIGl0IHByb3VkbHkuIFNoZSBjbGVhcmx5IHJlc3BlY3RlZCB5b3UgZm9yIGl0Lic=',
            'ending' => true,
        ],
    ],
];
