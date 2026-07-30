<?php
return [
    'id'    => 21,
    'title' => 'Thirty Years Overdue',
    'color' => '#5A8AA8',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIENhbmFkaWFuIFJvY2tpZXMgcmlzZSBzaGFycCBhbmQgZ2xhY2llci1ibHVlLCBuYXRpb25hbCBwYXJrIGxhbmQgc3RyZXRjaGluZyBpbiBnZW51aW5lbHkgdmFzdCwgY2FyZWZ1bGx5IHByb3RlY3RlZCB3aWxkZXJuZXNzIGFsbCBhcm91bmQgYSBzbWFsbCB3YXJkZW4ncyBjYWJpbiB0dWNrZWQgaW50byBhIHJlbW90ZSB2YWxsZXkuIEdyZXRhIG1vb3JzIHRoZSBDb250b3VyIG5lYXIgYSB0cmFpbGhlYWQsIGNoZWNraW5nIGEgYnJpZWYgcmFkaW8gbWVzc2FnZSBmcm9tIFJleWVzIOKAlCBhbHJlYWR5IHdlbGwgYWhlYWQgb24gaGlzIG93biBsZWcgb2YgYSB2ZXJ5IGRpZmZlcmVudCBzdXJ2ZXksIGNoZWNraW5nIGluIG91dCBvZiB3aGF0J3MgY2xlYXJseSBiZWNvbWluZyBnZW51aW5lIGZyaWVuZHNoaXAgcmF0aGVyIHRoYW4gb2JsaWdhdGlvbi4KClR3byB0cmFpbHMgdG93YXJkIHRoZSB3YXJkZW4ncyBjYWJpbiBwcmVzZW50IHRoZW1zZWx2ZXM6IHRoZSBtYWludGFpbmVkIHBhcmsgcm91dGUsIHdlbGwtbWFya2VkIGFuZCBnZW50bGUsIG9yIGFuIG9sZGVyLCB1bm1haW50YWluZWQgdHJhaWwgZmF2b3VyZWQgYnkgbG9uZy10aW1lIGxvY2FscyByYXRoZXIgdGhhbiBjYXN1YWwgaGlrZXJzLg==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbnRhaW5lZCBwYXJrIHJvdXRl', 'next' => '2_maintained'],
                ['text' => 'VGFrZSB0aGUgb2xkZXIgbG9jYWwgdHJhaWw=', 'next' => '2_local'],
            ],
        ],
        '2_maintained' => [
            'prose'  => 'VGhlIG1haW50YWluZWQgcm91dGUgaXMgZWFzeSwgd2VsbC1zaWduZWQsIHNoYXJpbmcgdGhlIHRyYWlsIHdpdGggZ2VudWluZSB3aWxkbGlmZSDigJQgYSBkaXN0YW50IGdyaXp6bHksIHRoYW5rZnVsbHkgZGlzaW50ZXJlc3RlZCwgYW5kIGEgaGVyZCBvZiBtb3VudGFpbiBnb2F0cyBwaWNraW5nIHRoZWlyIHdheSBhY3Jvc3MgYSBzY3JlZSBzbG9wZSB3aXRoIHJlYWwsIHVuYm90aGVyZWQgY29uZmlkZW5jZS4gSXQncyBhIHBsZWFzYW50LCB1bmh1cnJpZWQgd2FsaywgdGhlIFJvY2tpZXMnIGZhbW91cyBzY2VuZXJ5IGZ1bGx5IGxpdmluZyB1cCB0byBpdHMgcmVwdXRhdGlvbi4KCllvdSBhcnJpdmUgYXQgdGhlIGNhYmluIHJlbGF4ZWQgYW5kIHRob3JvdWdobHkgc2NlbmljLWVkIG91dC4=',
            'choices' => [
                ['text' => 'S25vY2s=', 'next' => '3_shared'],
            ],
        ],
        '2_local' => [
            'prose'  => 'VGhlIG9sZGVyIHRyYWlsIGlzIHJvdWdoZXIsIHF1aWV0ZXIsIHdpbmRpbmcgdGhyb3VnaCBjb3VudHJ5IHRoYXQgZmVlbHMgZ2VudWluZWx5IHdpbGRlciBkZXNwaXRlIGJlaW5nIHRlY2huaWNhbGx5IG5vIGZ1cnRoZXIgZnJvbSB0aGUgbWFpbnRhaW5lZCByb3V0ZS4gWW91IGNyb3NzIHBhdGhzIHdpdGggY29uc2lkZXJhYmx5IGxlc3Mgd2lsZGxpZmUgYW5kIGNvbnNpZGVyYWJseSBtb3JlIHNvbGl0dWRlLCB0aGUga2luZCBvZiBxdWlldCB0aGF0IG1ha2VzIHlvdSBhY3R1YWxseSBub3RpY2UgeW91ciBvd24gZm9vdHN0ZXBzLgoKWW91IGFycml2ZSBhdCB0aGUgY2FiaW4gaGF2aW5nIGVhcm5lZCB0aGUgZGVzdGluYXRpb24gYSBsaXR0bGUgbW9yZSB0aG9yb3VnaGx5IHRoYW4gdGhlIGVhc2llciByb3V0ZSB3b3VsZCBoYXZlIGFsbG93ZWQu',
            'choices' => [
                ['text' => 'S25vY2s=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHJldGlyZWQgd2FyZGVuLCBNYXJnYXJldCDigJQgbm8gcmVsYXRpb24gdG8gYW55b25lIHlvdSd2ZSBtZXQgc28gZmFyLCBzaGUgY2xhcmlmaWVzIGltbWVkaWF0ZWx5LCBjbGVhcmx5IGhhdmluZyBmaWVsZGVkIHRoYXQgZXhhY3QgY29uZnVzaW9uIGJlZm9yZSB3aXRoIGEgZGlmZmVyZW50IG5hbWUg4oCUIGhhcyBrZXB0IHRoZSBjYXNlIGhpbmdlIG9uIGhlciBtYW50ZWxwaWVjZSBmb3IgdGhpcnR5IHllYXJzLCBhIGdlbnVpbmUgY3VyaW9zaXR5IGZyb20gYSByZXNjdWUgc2hlIHdhcyBwYXJ0IG9mIGVhcmx5IGluIGhlciBjYXJlZXIuCgonRm91bmQgeW91ciBncmFuZGZhdGhlciBoYWxmLWJ1cmllZCBhZnRlciBhIHNtYWxsIHNsaWRlLCBzaGFrZW4gYnV0IGZpbmUsJyBzaGUgc2F5cy4gJ0Nhc2UgaGFkIGNvbWUgb3BlbiBpbiB0aGUgZmFsbCwgdGhpcyBoaW5nZSBzbmFwcGVkIGNsZWFuIG9mZi4gSGUgd2FzIHRvbyByYXR0bGVkIHRvIG5vdGljZSBhdCB0aGUgdGltZSwgYW5kIEkgbmV2ZXIgcXVpdGUgZ290IHJvdW5kIHRvIHJldHVybmluZyBzb21ldGhpbmcgc28gc21hbGwuIEJlZW4gbWVhbmluZyB0byBmb3IgdGhyZWUgZGVjYWRlcywgaWYgSSdtIGhvbmVzdC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGlmIHlvdSBjYW4gZmluYWxseSB0YWtlIGl0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'J0NvdXJzZSB5b3UgY2FuLCcgTWFyZ2FyZXQgc2F5cywgdGhvdWdoIHNoZSBkb2VzIGFkZCwgd2l0aCByZWFsIHdhcm10aCByYXRoZXIgdGhhbiBhbnkgYWN0dWFsIGJhcnJpZXIsIHRoYXQgc2hlJ2QgYXBwcmVjaWF0ZSB0aGUgY29tcGFueSBhIHdoaWxlIGZpcnN0IOKAlCBoZWxwIGhlciB3aXRoIHRoZSBjYWJpbidzIHdvb2RwaWxlIGJlZm9yZSB3aW50ZXIgcHJvcGVybHkgc2V0cyBpbiwgb3Igc2ltcGx5IHNpdCBhbmQgbGV0IGhlciBhY3R1YWxseSB0ZWxsIHRoZSB3aG9sZSByZXNjdWUgc3RvcnkgcHJvcGVybHksIHNpbmNlIHNoZSdzIG5ldmVyIHJlYWxseSBoYWQgYW55b25lIHRvIHRlbGwgaXQgdG8gd2hvJ2QgY2FyZS4=',
            'choices' => [
                ['text' => 'SGVscCB3aXRoIHRoZSB3b29kcGlsZQ==', 'next' => '5_wood'],
                ['text' => 'U2l0IGFuZCBoZWFyIHRoZSB3aG9sZSBzdG9yeQ==', 'next' => '5_story'],
            ],
        ],
        '5_wood' => [
            'prose'  => 'U3BsaXR0aW5nIGFuZCBzdGFja2luZyB3b29kIGZvciBhIFJvY2tpZXMgd2ludGVyIGlzIHJlYWwsIHNhdGlzZnlpbmcgcGh5c2ljYWwgbGFib3VyLCBNYXJnYXJldCBkaXJlY3Rpbmcgd2l0aCB0aGUgZWFzeSBhdXRob3JpdHkgb2YgZGVjYWRlcyBvZiBwcmFjdGljYWwgd2lsZGVybmVzcyBjb21wZXRlbmNlLiBCeSB0aGUgdGltZSB0aGUgcGlsZSdzIHByb3Blcmx5IHNvcnRlZCwgeW91ciBhcm1zIGFjaGUgYW5kIHRoZSBjYWJpbiBsb29rcyBjb25zaWRlcmFibHkgbW9yZSBwcmVwYXJlZCBmb3IgdGhlIHNlYXNvbiBhaGVhZC4KCk1hcmdhcmV0LCB3YXRjaGluZyB0aGUgZmluaXNoZWQgc3RhY2sgd2l0aCByZWFsIHNhdGlzZmFjdGlvbiwgc2VlbXMganVzdCBhcyBwbGVhc2VkIGJ5IHRoZSBjb21wYW55IGFzIHRoZSBhY3R1YWwgaGVscC4=',
            'choices' => [
                ['text' => 'SGVhciBhYm91dCB0aGUgcmVzY3Vl', 'next' => '6_shared'],
            ],
        ],
        '5_story' => [
            'prose'  => 'WW91IHNpdCB3aXRoIGhlciBhIGxvbmcgd2hpbGUsIGxldHRpbmcgdGhlIHdob2xlIHJlc2N1ZSBzdG9yeSB1bmZvbGQgcHJvcGVybHkg4oCUIHRoZSBzbGlkZSwgdGhlIHNlYXJjaCwgdGhlIHNwZWNpZmljIHJlbGllZiBvZiBmaW5kaW5nIGhpbSBhbGl2ZSBhbmQgbW9zdGx5IHVuaHVydCwgdGhlIHNtYWxsIGhpbmdlIHNoZSBwb2NrZXRlZCB3aXRob3V0IHJlYWxseSB0aGlua2luZyBhbmQgdGhlbiBzaW1wbHkgbmV2ZXIgcmV0dXJuZWQuIEl0J3MgY2xlYXJseSBhIHN0b3J5IHNoZSdzIGNhcnJpZWQgYSBsb25nIHRpbWUgd2l0aG91dCBhbnlvbmUgdG8gcHJvcGVybHkgdGVsbCBpdCB0by4KCkJ5IHRoZSBlbmQsIHNvbWV0aGluZyBpbiB0aGUgdGVsbGluZyBpdHNlbGYgc2VlbXMgdG8gaGF2ZSBzZXR0bGVkIGEgc21hbGwsIGRlY2FkZXMtb2xkIGxvb3NlIHRocmVhZCBmb3IgaGVyLg==',
            'choices' => [
                ['text' => 'SGVhciBhYm91dCB0aGUgcmVzY3Vl', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB0aGUgdmlzaXQgd2VudCwgTWFyZ2FyZXQgZmluYWxseSBoYW5kcyBvdmVyIHRoZSBoaW5nZSwgc21hbGwgYW5kIHVucmVtYXJrYWJsZSBhbmQgdGhpcnR5IHllYXJzIG92ZXJkdWUuICdGZWVscyBnb29kLCBhY3R1YWxseSwgZmluYWxseSBjbG9zaW5nIHRoYXQgcGFydGljdWxhciBsb29wLCcgc2hlIHNheXMuICdTb21lIHRoaW5ncyB5b3UgY2Fycnkgd2l0aG91dCBtZWFuaW5nIHRvLCBqdXN0IGJlY2F1c2UgcmV0dXJuaW5nIHRoZW0gbmV2ZXIgcXVpdGUgYmVjYW1lIHVyZ2VudCBlbm91Z2guJwoKU2hlIHN0dWRpZXMgeW91IGEgbW9tZW50LiAnVGVsbCBoaW0g4oCUICcgU2hlIHN0b3BzLCBjb3JyZWN0aW5nIGhlcnNlbGYgdGhlIHdheSBldmVyeW9uZSBvbiB0aGlzIGpvdXJuZXkgc2VlbXMgdG8gZXZlbnR1YWxseS4gJ1RlbGwgd2hvZXZlciBuZWVkcyB0ZWxsaW5nLCB0aGF0IGhlIHdhcyBsdWNraWVyIHRoYW4gaGUgcHJvYmFibHkgcmVhbGlzZWQgdGhhdCBkYXkuIFNtYWxsIHNsaWRlLiBDb3VsZCd2ZSBiZWVuIG11Y2ggd29yc2UuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciB0cmFpbCB5b3UgZGlkbid0IHRha2Ugb24gdGhlIHdheSB1cCwgdGhlIFJvY2tpZXMnIGdsYWNpZXItYmx1ZSBwZWFrcyBjYXRjaGluZyByZWFsIGFmdGVybm9vbiBsaWdodCwgdGhlIGhpbmdlIHNlY3VyZSBpbiB0aGUgY2FzZSDigJQgYW4gZWlnaHRlZW50aCBwaWVjZSwgdGhlIHdob2xlIGFzc2VtYmx5IG5vdyB1bm1pc3Rha2FibHksIHZpc2libHkgYWxtb3N0IGNvbXBsZXRlLgoKR3JldGEsIGNoZWNraW5nIHRoZSBjb3VudCBwcm9wZXJseSwgZG9lcyB0aGUgbWF0aCB3aXRoIHJlYWwgc2F0aXNmYWN0aW9uLiAnVHdvIG1vcmUsIHByb2JhYmx5LCBhbmQgdGhlbiB3aGF0ZXZlcidzIGFjdHVhbGx5IHdhaXRpbmcgYXQgdGhlIHZlcnkgZW5kIG9mIHRoZSBsaXN0LiBXZSdyZSBjbG9zZSBub3cuIFByb3Blcmx5IGNsb3NlLic=',
            'choices' => [
                ['text' => 'UmFkaW8gUmV5ZXMgd2l0aCB0aGUgbmV3cw==', 'next' => '8_end_radio'],
                ['text' => 'TGV0IHRoZSBuZXdzIHdhaXQgdW50aWwgeW91IHNlZSBoaW0gaW4gcGVyc29u', 'next' => '8_end_wait'],
            ],
        ],
        '8_end_radio' => [
            'prose'  => 'WW91IHJhZGlvIFJleWVzIHdpdGggdGhlIG5ld3MsIGFuZCBoaXMgcmVwbHkgY3JhY2tsZXMgYmFjayBhbG1vc3QgaW1tZWRpYXRlbHksIGdlbnVpbmVseSBkZWxpZ2h0ZWQgcmF0aGVyIHRoYW4gbWVyZWx5IHBvbGl0ZS4gJ0tuZXcgeW91J2QgZ2V0IHRoZXJlLiBOZWFybHkgZmluaXNoZWQsIGlzIGl0PyBHb29kLiBCdXkgdGhlIGZpcnN0IHJvdW5kIHdoZW4gaXQncyBhY3R1YWxseSBkb25lLCBhbmQgSSdsbCBjb25zaWRlciB1cyBwcm9wZXJseSBldmVuLicKCkl0J3MgYSBzbWFsbCwgb3JkaW5hcnkgZXhjaGFuZ2UsIGFuZCBpdCBsYW5kcyB3aXRoIHJlYWwgd2FybXRoIHJlZ2FyZGxlc3Mg4oCUIHByb29mLCBzbWFsbCBidXQgcmVhbCwgb2YgZXhhY3RseSBob3cgbXVjaCBoYXMgY2hhbmdlZCBzaW5jZSBQYXRhZ29uaWEu',
            'ending' => true,
        ],
        '8_end_wait' => [
            'prose'  => 'WW91IGxldCB0aGUgbmV3cyB3YWl0LCBkZWNpZGluZyBzb21lIHRoaW5ncyBhcmUgYmV0dGVyIHNoYXJlZCBwcm9wZXJseSwgaW4gcGVyc29uLCB0aGFuIGNyYWNrbGVkIHRocm91Z2ggYSByYWRpbyBjaGFubmVsIGZyb20gaGFsZiBhIHdvcmxkIGF3YXkuCgpUaGUgQ29udG91ciBsaWZ0cyBvZmYgdGhlIFJvY2tpZXMnIGdsYWNpZXItYmx1ZSBwZWFrcywgdGhlIGNhc2UncyBuZWFyLWNvbXBsZXRlbmVzcyBzZXR0bGluZyBpbnRvIHlvdSBzbG93bHksIHByb3Blcmx5LCByYXRoZXIgdGhhbiBuZWVkaW5nIHRvIGJlIGFubm91bmNlZCB0byBhbnlvbmUganVzdCB5ZXQuIFR3byBtb3JlIHBpZWNlcywgcHJvYmFibHkuIFRoZW4gd2hhdGV2ZXIncyBhY3R1YWxseSB3YWl0aW5nIGF0IHRoZSBlbmQu',
            'ending' => true,
        ],
    ],
];
