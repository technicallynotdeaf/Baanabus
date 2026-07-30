<?php
return [
    'id'    => 8,
    'title' => 'What Your Ears Never Could',
    'color' => '#A87A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'U3JpIExhbmthJ3Mgc291dGhlcm4gY29hc3QgZ2l2ZXMgd2F5IGlubGFuZCB0byBjaW5uYW1vbiBwbGFudGF0aW9ucywgdGhlIHRyZWVzIHRoZW1zZWx2ZXMgdW5yZW1hcmthYmxlLWxvb2tpbmcgdW50aWwgeW91IGxlYXJuIHRoYXQgdHJ1ZSBjaW5uYW1vbiDigJQgdGhlIHJlYWwgdGhpbmcsIG5vdCB0aGUgaGFyZGVyIGNhc3NpYSBiYXJrIHNvbGQgYXMgYSBzdWJzdGl0dXRlIHdvcmxkd2lkZSDigJQgY29tZXMgYWxtb3N0IGVudGlyZWx5IGZyb20gdGhpcyBvbmUgcGFydCBvZiB0aGUgd29ybGQuIEJydW5vIHNlZW1zIGFsbW9zdCByZXZlcmVudCBleHBsYWluaW5nIHRoZSBkaXN0aW5jdGlvbi4KClR3byByb3V0ZXMgdG93YXJkIHRoZSBwZWVsaW5nIGZhbWlseSBwcmVzZW50IHRoZW1zZWx2ZXM6IGFsb25nIHRoZSBjb2FzdCByb2FkIGZpcnN0LCBwYXN0IHNtYWxsIGZpc2hpbmcgdmlsbGFnZXMsIG9yIHN0cmFpZ2h0IGlubGFuZCB0aHJvdWdoIHRoZSBwbGFudGF0aW9uIGJlbHQgaXRzZWxmLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBjb2FzdCByb2FkIGZpcnN0', 'next' => '2_coast'],
                ['text' => 'R28gc3RyYWlnaHQgaW5sYW5k', 'next' => '2_inland'],
            ],
        ],
        '2_coast' => [
            'prose'  => 'VGhlIGNvYXN0IHJvYWQgd2luZHMgcGFzdCBzbWFsbCBmaXNoaW5nIHZpbGxhZ2VzLCBib2F0cyBkcmF3biB1cCBjb2xvdXJmdWxseSBvbiB0aGUgc2FuZCwgYmVmb3JlIGZpbmFsbHkgdHVybmluZyBpbmxhbmQgdG93YXJkIHRoZSBwbGFudGF0aW9uIGJlbHQuIEl0J3MgYSBsb25nZXIgcm91dGUsIGJ1dCBhIGdlbnVpbmVseSBiZWF1dGlmdWwgb25lLCBzYWx0IGFpciBnaXZpbmcgd2F5IGdyYWR1YWxseSB0byB0aGUgZ3JlZW5lciwgZWFydGhpZXIgc21lbGwgb2YgY3VsdGl2YXRlZCBsYW5kLgoKWW91IGFycml2ZSBhdCB0aGUgcGVlbGluZyBzaGVkIGhhdmluZyBwcm9wZXJseSBzZWVuIGJvdGggZmFjZXMgb2YgdGhlIHJlZ2lvbi4=',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '2_inland' => [
            'prose'  => 'R29pbmcgc3RyYWlnaHQgaW5sYW5kIG1lYW5zIGEgZmFzdGVyLCBtb3JlIGRpcmVjdCBhcHByb2FjaCB0aHJvdWdoIHRoZSBwbGFudGF0aW9uIGJlbHQgaXRzZWxmLCBjaW5uYW1vbiB0cmVlcyBncm93aW5nIGluIGRlbnNlLCBsb3cgc3RhbmRzIHRoYXQgbG9vayBhbG1vc3QgdW5yZW1hcmthYmxlIHVudGlsIHlvdSdyZSB0b2xkIHdoYXQgdGhleSBhY3R1YWxseSBhcmUuCgpZb3UgYXJyaXZlIGF0IHRoZSBwZWVsaW5nIHNoZWQgY29uc2lkZXJhYmx5IGZhc3RlciwgYW5kIGVhZ2VyIHRvIGFjdHVhbGx5IHNlZSB0aGUgZmFtb3VzIHRlY2huaXF1ZSBldmVyeW9uZSdzIHRvbGQgeW91IGFib3V0Lg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHBlZWxpbmcgZmFtaWx5LCBnZW5lcmF0aW9ucyBkZWVwIGluIGEgY3JhZnQgdGhhdCByZXF1aXJlcyBnZW51aW5lbHkgc3BlY2lhbGlzZWQgc2tpbGwsIHdlbGNvbWUgeW91IHdhcm1seSBvbmNlIElyaXMncyBuYW1lIGNvbWVzIHVwLiBUaGUgc2VuaW9yIHBlZWxlciwgYW4gb2xkZXIgbWFuIG5hbWVkIFN1bmlsLCBleGFtaW5lcyB5b3VyIGhhbmRzIHdpdGggcmVhbCwgYXBwcmFpc2luZyBpbnRlcmVzdC4gJ1BlZWxpbmcgdHJ1ZSBjaW5uYW1vbiBiYXJrIHByb3Blcmx5IGNhbid0IGJlIHRhdWdodCBieSB0YWxraW5nLCcgaGUgc2F5cy4gJ09ubHkgYnkgd2F0Y2hpbmcsIGFuZCBieSB0cnlpbmcsIGFuZCBieSBnZXR0aW5nIGl0IHdyb25nIGVub3VnaCB0aW1lcyB0aGF0IHlvdXIgaGFuZHMgZmluYWxseSB1bmRlcnN0YW5kIHdoYXQgeW91ciBlYXJzIG5ldmVyIGNvdWxkLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHRvIHdhdGNoIGFuZCB0cnk=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'U3VuaWwgb2ZmZXJzIHR3byB3YXlzIGluOiB3YXRjaCBoaW0gd29yayBhbiBlbnRpcmUgc3RpY2sgZnJvbSBzdGFydCB0byBmaW5pc2ggYmVmb3JlIGF0dGVtcHRpbmcgeW91ciBvd24sIGJ1aWxkaW5nIGEgY29tcGxldGUgbWVudGFsIHBpY3R1cmUgZmlyc3QsIG9yIGF0dGVtcHQgeW91ciBvd24gc3RyaXAgaW1tZWRpYXRlbHksIGxlYXJuaW5nIHRocm91Z2ggdGhlIHNwZWNpZmljLCBodW1ibGluZyBleHBlcmllbmNlIG9mIGZhaWxpbmcgaW4gcmVhbCB0aW1lIHdpdGggcmVhbCBiYXJrLgoKJ0VpdGhlciBnZXRzIHlvdXIgaGFuZHMgdGhlcmUgZXZlbnR1YWxseSwnIGhlIHNheXMuICdXYXRjaGluZyBmaXJzdCwgb3IgZGl2aW5nIGluIGZpcnN0LiBZb3VyIGNob2ljZS4n',
            'choices' => [
                ['text' => 'V2F0Y2ggYSBjb21wbGV0ZSBkZW1vbnN0cmF0aW9uIGZpcnN0', 'next' => '5_watch'],
                ['text' => 'QXR0ZW1wdCB5b3VyIG93biBzdHJpcCBpbW1lZGlhdGVseQ==', 'next' => '5_attempt'],
            ],
        ],
        '5_watch' => [
            'prose'  => 'V2F0Y2hpbmcgU3VuaWwgd29yayBhIGNvbXBsZXRlIHN0cmlwIGlzIGdlbnVpbmVseSBtZXNtZXJpc2luZywgaGlzIHNtYWxsIGN1cnZlZCBrbmlmZSBtb3Zpbmcgd2l0aCBhbiBlY29ub215IG9mIG1vdGlvbiB0aGF0IG1ha2VzIGFuIGV4dHJhb3JkaW5hcmlseSBkaWZmaWN1bHQgdGVjaG5pcXVlIGxvb2sgYWxtb3N0IHNpbXBsZS4gT25seSBvbmNlIHlvdSBhY3R1YWxseSB0cnkgaXQgeW91cnNlbGYgZG8geW91IHVuZGVyc3RhbmQgZXhhY3RseSBob3cgbXVjaCBza2lsbCB3YXMgaGlkZGVuIGluc2lkZSB0aGF0IGFwcGFyZW50IGVhc2UuCgpZb3VyIG93biBlYXJseSBhdHRlbXB0cyBhcmUgY29uc2lkZXJhYmx5IHJvdWdoZXIsIGJ1dCBTdW5pbCBjb3JyZWN0cyB5b3Ugd2l0aCByZWFsIHBhdGllbmNlLg==',
            'choices' => [
                ['text' => 'S2VlcCB3b3JraW5nIGF0IGl0', 'next' => '6_shared'],
            ],
        ],
        '5_attempt' => [
            'prose'  => 'QXR0ZW1wdGluZyB5b3VyIG93biBzdHJpcCBpbW1lZGlhdGVseSBpcyBodW1ibGluZyBhbG1vc3QgaW5zdGFudGx5LCB0aGUgYmFyayB0ZWFyaW5nIHVuZXZlbmx5IHVuZGVyIHlvdXIgdW5wcmFjdGlzZWQgaGFuZCB3aGlsZSBTdW5pbCB3YXRjaGVzIHdpdGhvdXQgaW50ZXJ2ZW5pbmcsIGxldHRpbmcgeW91IGFjdHVhbGx5IGZlZWwgdGhlIGRpZmZpY3VsdHkgYmVmb3JlIG9mZmVyaW5nIGFueSBjb3JyZWN0aW9uIGF0IGFsbC4KCk9uY2UgaGUgZmluYWxseSBkb2VzIHN0ZXAgaW4sIGhpcyBhZGp1c3RtZW50cyB0byB5b3VyIGdyaXAgYW5kIGFuZ2xlIG1ha2UgYW4gaW1tZWRpYXRlLCBvYnZpb3VzIGRpZmZlcmVuY2Uu',
            'choices' => [
                ['text' => 'S2VlcCB3b3JraW5nIGF0IGl0', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QnkgdGhlIGVuZCBvZiBhIGdlbnVpbmVseSBodW1ibGluZyBhZnRlcm5vb24sIHlvdSd2ZSBwcm9kdWNlZCBhIGhhbmRmdWwgb2YgcHJvcGVybHkgcGVlbGVkIGNpbm5hbW9uIHF1aWxscywgcm9sbGVkIGFuZCBjdXJsZWQgZXhhY3RseSBhcyB0aGV5IHNob3VsZCBiZSwgcmVhbCBpZiBpbXBlcmZlY3Qgd29yayB5b3UgY2FuIGFjdHVhbGx5IHRha2UgcmVhbCBwcmlkZSBpbi4gU3VuaWwgZXhhbWluZXMgeW91ciBlZmZvcnQgYW5kIG5vZHMsIHNhdGlzZmllZC4KCidHb29kIGhhbmRzLCBldmVudHVhbGx5LCcgaGUgc2F5cy4gJ1dhc24ndCBzdXJlIGF0IHRoZSBzdGFydC4gWW91IGtlcHQgdHJ5aW5nIHByb3Blcmx5LCB0aG91Z2gsIGluc3RlYWQgb2YgZ2l2aW5nIHVwIGF0IHRoZSBmaXJzdCBiYWQgc3RyaXAuIFRoYXQncyB0aGUgYWN0dWFsIHNraWxsLCBtb3JlIHRoYW4gdGhlIGtuaWZlLXdvcmsuJw==',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZmluaXNoZWQgY2lubmFtb24gYW5kIHRoYW5rIGhpbQ==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0b3dhcmQgdGhlIGNvYXN0IHdpdGggdGhlIHRydWUgY2lubmFtb24gc2VjdXJlIGluIGl0cyBjYXJlZnVsIHdyYXBwaW5nLCBTcmkgTGFua2EncyBwbGFudGF0aW9uIGJlbHQgZ2l2aW5nIHdheSBncmFkdWFsbHkgYmFjayB0byBzYWx0IGFpciBhbmQgZmlzaGluZyBib2F0cywgeW91ciBoYW5kcyBzdGlsbCBzbGlnaHRseSBzb3JlIGZyb20gYW4gYWZ0ZXJub29uIG9mIGdlbnVpbmVseSBkaWZmaWN1bHQsIGdlbnVpbmVseSBlYXJuZWQgd29yay4KCkJydW5vIGV4YW1pbmVzIHRoZSBxdWlsbHMgd2l0aCByZWFsIGFwcHJlY2lhdGlvbi4gJ1Byb3BlciBjaW5uYW1vbiwgaGFuZC1wZWVsZWQuIFlvdSBjYW4gdGVsbCB0aGUgZGlmZmVyZW5jZSBmcm9tIHRoZSBjYXNzaWEgc3R1ZmYgaW1tZWRpYXRlbHksIG9uY2UgeW91IGtub3cgd2hhdCB0byBsb29rIGZvci4n',
            'choices' => [
                ['text' => 'U2F5IHlvdXIgaGFuZHMgd2lsbCByZW1lbWJlciB0aGlzIG9uZQ==', 'next' => '8_end_hands'],
                ['text' => 'U2F5IHlvdSBoYXZlIGEgd2hvbGUgbmV3IHJlc3BlY3QgZm9yIHNvbWV0aGluZyB5b3UgdG9vayBmb3IgZ3JhbnRlZA==', 'next' => '8_end_respect'],
            ],
        ],
        '8_end_hands' => [
            'prose'  => 'J015IGhhbmRzIHdpbGwgcmVtZW1iZXIgdGhpcyBvbmUsIGhvbmVzdGx5LCcgeW91IHNheSwgZmxleGluZyB5b3VyIHN0aWxsLXNvcmUgZmluZ2Vycy4gJ05ldmVyIHRob3VnaHQgYSBzcGljZSBjb3VsZCBhY3R1YWxseSBiZSB0aGlzIHBoeXNpY2FsbHkgZWFybmVkLicKCkJydW5vIGxhdWdocy4gJ1dhaXQgdGlsbCB5b3UgZmVlbCBpdCBhZ2FpbiB0aGUgbmV4dCB0aW1lIHlvdSB1c2UgY2lubmFtb24gaW4gYW55dGhpbmcuIEJldCBpdCBtZWFucyBzb21ldGhpbmcgZGlmZmVyZW50IG5vdy4n',
            'ending' => true,
        ],
        '8_end_respect' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGhhdmUgYSB3aG9sZSBuZXcgcmVzcGVjdCBmb3Igc29tZXRoaW5nIEkgYWx3YXlzIHRvb2sgY29tcGxldGVseSBmb3IgZ3JhbnRlZCwnIHlvdSBhZG1pdCwgdHVybmluZyB0aGUgY2FyZWZ1bCB3cmFwcGluZyBvdmVyIGluIHlvdXIgaGFuZHMuICdOZXZlciBvbmNlIHRob3VnaHQgYWJvdXQgd2hhdCBhY3R1YWxseSBnb2VzIGludG8gYSBqYXIgb2YgZ3JvdW5kIGNpbm5hbW9uIGJlZm9yZSB0b2RheS4nCgpCcnVubyBub2RzIHNsb3dseS4gJ1RoYXQncyB0aGUgd2hvbGUgZ2lmdCBvZiB0aGlzIHRyaXAsIEkgdGhpbmsuIE5vdGhpbmcgZ2V0cyB0byBzdGF5IG9yZGluYXJ5IG9uY2UgeW91J3ZlIHNlZW4gdGhlIHJlYWwgd29yayBiZWhpbmQgaXQuJw==',
            'ending' => true,
        ],
    ],
];
