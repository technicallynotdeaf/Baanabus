<?php
return [
    'id'    => 2,
    'title' => 'Simply Be a Piece of Brass Again',
    'color' => '#A8783A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QnVraGFyYSByaXNlcyBpbiBhIG1hemUgb2Ygc2FuZC1jb2xvcmVkIGRvbWVzIGFuZCBtaW5hcmV0cywgdGhlIG9sZCB0cmFkaW5nIGNpdHkncyBiYXphYXJzIHN0aWxsIGh1bW1pbmcgd2l0aCBleGFjdGx5IHRoZSBraW5kIG9mIGNvbW1lcmNlIHRoYXQgYnVpbHQgaG91c2VzIGxpa2UgWXNvbGRlJ3MgaW4gdGhlIGZpcnN0IHBsYWNlLiBUb21hcyBuYXZpZ2F0ZXMgdGhlIHN0cmVldHMgd2l0aCB0aGUgZWFzeSBmYW1pbGlhcml0eSBvZiBzb21lb25lIHdobydzIHdhbGtlZCB0aGVtIGZvciBkZWNhZGVzLCB0aGUgaGF3ayByaWRpbmcgaGlzIHNob3VsZGVyIHdpdGggcHJvcHJpZXRhcnkgY2FsbS4KClR3byB3YXlzIHRvd2FyZCB0aGUgZmFtaWx5IGhvbGRpbmcgdGhlIHNlY29uZCB3ZWRnZSBwcmVzZW50IHRoZW1zZWx2ZXM6IHN0cmFpZ2h0IHRocm91Z2ggdGhlIGJhemFhcidzIGNyb3dkZWQsIGNoYW90aWMgaGVhcnQsIG9yIHRoZSBxdWlldGVyLCBtb3JlIGZvcm1hbCByb3V0ZSB0aHJvdWdoIHRoZSBtZXJjaGFudHMnIGd1aWxkIGhvdXNlIGZpcnN0Lg==',
            'choices' => [
                ['text' => 'Q3V0IHRocm91Z2ggdGhlIGJhemFhcg==', 'next' => '2_bazaar'],
                ['text' => 'R28gYnkgd2F5IG9mIHRoZSBndWlsZCBob3VzZQ==', 'next' => '2_guild'],
            ],
        ],
        '2_bazaar' => [
            'prose'  => 'VGhlIGJhemFhciBpcyBhIGdlbnVpbmUgYXNzYXVsdCBvbiB0aGUgc2Vuc2VzIOKAlCBzcGljZSBhbmQgbGVhdGhlciBhbmQgcm9hc3RpbmcgbWVhdCwgbWVyY2hhbnRzIGNhbGxpbmcgb3V0IGluIGhhbGYgYSBkb3plbiBsYW5ndWFnZXMsIHRoZSBoYXdrIHNoaWZ0aW5nIHJlc3RsZXNzbHkgb24gVG9tYXMncyBzaG91bGRlciBhdCB0aGUgc2hlZXIgcHJlc3Mgb2Ygbm9pc2UgYW5kIGNvbG91ci4gWW91IG5hdmlnYXRlIGl0IHNsb3dseSwgYXNraW5nIGRpcmVjdGlvbnMgdHdpY2UsIGJlZm9yZSBmaW5hbGx5IHJlYWNoaW5nIGEgcXVpZXRlciBzaWRlIHN0cmVldC4KCidOb3QgdGhlIGRpZ25pZmllZCBhcHByb2FjaCwnIFRvbWFzIGFkbWl0cywgc3RyYWlnaHRlbmluZyBoaXMgY29hdC4gJ0J1dCBpdCB3b3JrcywgYW5kIGl0J3MgaG9uZXN0IGFib3V0IHdoYXQgdGhpcyB3aG9sZSByb3V0ZSBhY3R1YWxseSBpcyB1bmRlcm5lYXRoIHRoZSBjZXJlbW9ueS4n',
            'choices' => [
                ['text' => 'RmluZCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '2_guild' => [
            'prose'  => 'VGhlIGd1aWxkIGhvdXNlIGlzIGNhbG0sIG9yZGVybHksIGZvcm1hbCBpbiBhIHdheSB0aGUgYmF6YWFyIGVudGlyZWx5IGlzbid0IOKAlCBjbGVya3MgYW5kIGxlZGdlcnMgYW5kIHRoZSBwYXJ0aWN1bGFyIHVuaHVycmllZCBjb3VydGVzeSBvZiBhbiBpbnN0aXR1dGlvbiB0aGF0J3Mgb3V0bGFzdGVkIHNldmVyYWwgZW1waXJlcyBieSBzaW1wbHkgc3RheWluZyB1c2VmdWwuIEEgY2xlcmssIG9uY2UgeW91ciBlcnJhbmQncyBleHBsYWluZWQsIHByb3ZpZGVzIGEgcHJvcGVyIGxldHRlciBvZiBpbnRyb2R1Y3Rpb24gd2l0aG91dCBtdWNoIGZ1c3MuCgonVGhlIGZvcm1hbCB3YXksJyBUb21hcyBzYXlzIGFwcHJvdmluZ2x5LiAnQ29zdHMgbW9yZSB0aW1lLiBCdXlzIG1vcmUgZ29vZHdpbGwsIGdlbmVyYWxseS4n',
            'choices' => [
                ['text' => 'RmluZCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhbWlseSBob2xkaW5nIHRoZSBzZWNvbmQgd2VkZ2Ug4oCUIHRoZSBSYXNoaWRvdiBob3VzZWhvbGQsIHByb3NwZXJvdXMgYnV0IHZpc2libHkgc3RyYWluZWQg4oCUIHJlY2VpdmVzIHlvdSBwb2xpdGVseSBidXQgd2FyaWx5LiBUaGUgaGVhZCBvZiB0aGUgaG91c2UsIEZhcnJ1a2gsIGV4cGxhaW5zOiB0aGUgd2VkZ2Ugd2FzIGxlZnQgYXMgY29sbGF0ZXJhbCBhZ2FpbnN0IGEgZGVidCBvd2VkIHRvIFlzb2xkZSdzIGhvdXNlIGdlbmVyYXRpb25zIGJhY2ssIGEgZGVidCBoaXMgb3duIGZhbWlseSBoYXMgcXVpZXRseSB3b3JyaWVkLCBmb3IgeWVhcnMsIG1pZ2h0IG5ldmVyIGFjdHVhbGx5IGJlIGNhbGxlZCBpbiBvciByZXNvbHZlZCBlaXRoZXIgd2F5LgoKJ1dlIGRvbid0IHdhbnQgaXQgaGFuZ2luZyBvdmVyIHVzIGFueSBsb25nZXIsJyBoZSBzYXlzLiAnQnV0IGNvbGxhdGVyYWwncyBjb2xsYXRlcmFsLiBZb3UnbGwgbmVlZCB0byBhY3R1YWxseSBzZXR0bGUgdGhlIGRlYnQgcHJvcGVybHksIG9uZSB3YXkgb3IgYW5vdGhlciwgYmVmb3JlIEkgY2FuIGhvbmVzdGx5IGxldCBpdCBnby4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2V0dGxpbmcgaXQgbG9va3MgbGlrZQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGRlYnQsIGl0IHR1cm5zIG91dCwgd2FzIGZvciBnb29kcyBZc29sZGUncyBob3VzZSBuZXZlciBhY3R1YWxseSBkZWxpdmVyZWQg4oCUIGEgc2hpcG1lbnQgbG9zdCBkZWNhZGVzIGFnbywgbmV2ZXIgcmVwbGFjZWQsIG5ldmVyIHJlZnVuZGVkLCBuZXZlciBwcm9wZXJseSBjbG9zZWQuIEZhcnJ1a2ggb2ZmZXJzIHR3byB3YXlzIHRvIHNldHRsZSBpdCBmYWlybHk6IHBheSB0aGUgZGVidCdzIGhvbmVzdCBtb2Rlcm4gdmFsdWUgb3V0cmlnaHQsIG9yIHNwZW5kIHJlYWwgdGltZSBoZWxwaW5nIHRoZSBmYW1pbHkncyBvd24gY3VycmVudCB0cmFkaW5nIHZlbnR1cmUsIHdvcmsgd29ydGggcm91Z2hseSB0aGUgc2FtZSBpbiBwcmFjdGljYWwgdmFsdWUuCgonRWl0aGVyIGNsb3NlcyBpdCBwcm9wZXJseSwnIGhlIHNheXMuICdJIGRvbid0IG11Y2ggY2FyZSB3aGljaCwgb25seSB0aGF0IGl0J3MgYWN0dWFsbHkgY2xvc2VkLCBvbmUgd2F5IG9yIHRoZSBvdGhlciwgYXQgbGFzdC4n',
            'choices' => [
                ['text' => 'UGF5IHRoZSBkZWJ0J3MgaG9uZXN0IHZhbHVl', 'next' => '5_pay'],
                ['text' => 'SGVscCB3aXRoIHRoZWlyIGN1cnJlbnQgdmVudHVyZQ==', 'next' => '5_help'],
            ],
        ],
        '5_pay' => [
            'prose'  => 'UGF5aW5nIHRoZSBkZWJ0IG91dHJpZ2h0IG1lYW5zIGEgcmVhbCwgY2FyZWZ1bCBhY2NvdW50aW5nIG9mIHdoYXQgdGhlIG9yaWdpbmFsIGxvc3Qgc2hpcG1lbnQgd291bGQgYmUgd29ydGggdG9kYXksIGFkanVzdGVkIGZhaXJseSBmb3IgZGVjYWRlcyBvZiBpbmZsYXRpb24gYW5kIGludGVyZXN0IG5laXRoZXIgc2lkZSBldmVyIHByb3Blcmx5IHRyYWNrZWQuIFRvbWFzIGhlbHBzIHdpdGggdGhlIHJlY2tvbmluZywgYW5kIHRoZSBmaW5hbCBzdW0sIHdoaWxlIHNpZ25pZmljYW50LCBmZWVscyBob25lc3RseSwgbXV0dWFsbHkgYWdyZWVkIHJhdGhlciB0aGFuIG1lcmVseSBleHRyYWN0ZWQuCgpGYXJydWtoIGNvdW50cyBpdCB0d2ljZSwgc2F0aXNmaWVkLCBhbmQgc29tZXRoaW5nIGluIGhpcyB3aG9sZSBob3VzZWhvbGQncyB0ZW5zaW9uIHZpc2libHkgZWFzZXMu',
            'choices' => [
                ['text' => 'U2VlIHRoZSB3ZWRnZSByZWxlYXNlZA==', 'next' => '6_shared'],
            ],
        ],
        '5_help' => [
            'prose'  => 'SGVscGluZyB3aXRoIHRoZSBmYW1pbHkncyBjdXJyZW50IHZlbnR1cmUgbWVhbnMgcmVhbCwgcHJhY3RpY2FsIGxhYm91ciDigJQgYXNzaXN0aW5nIHdpdGggYSBzaGlwbWVudCBvZiB0ZXh0aWxlcyBib3VuZCBmb3IgdGhlIG5leHQgY2l0eSBvdmVyLCBsZWFybmluZyB0aGUgc3BlY2lmaWMgY2FyZSBmaW5lIGNsb3RoIGRlbWFuZHMgZHVyaW5nIHRyYW5zcG9ydCwgd29ya2luZyBhbG9uZ3NpZGUgRmFycnVraCdzIG93biBzb25zIHdpdGggcmVhbCwgZWFybmVkIGNhbWFyYWRlcmllIGRldmVsb3Bpbmcgb3ZlciBzZXZlcmFsIGxvbmcgZGF5cy4KCkJ5IHRoZSB0aW1lIHRoZSBzaGlwbWVudCdzIHByb3Blcmx5IGxvYWRlZCBhbmQgc2VudCwgRmFycnVraCdzIHdob2xlIG1hbm5lciB0b3dhcmQgeW91IGhhcyBzaGlmdGVkIGZyb20gd2FyeSB0byBnZW51aW5lbHkgd2FybS4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSB3ZWRnZSByZWxlYXNlZA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RmFycnVraCBicmluZ3Mgb3V0IHRoZSB3ZWRnZSBoaW1zZWxmLCB3cmFwcGVkIGNhcmVmdWxseSwgYW5kIHBsYWNlcyBpdCBpbiB5b3VyIGhhbmRzIHdpdGggcmVhbCwgdmlzaWJsZSByZWxpZWYuICdHZW5lcmF0aW9ucywgdGhpcyBoYXMgc2F0IGluIGEgZHJhd2VyLCBtZWFuaW5nIHNvbWV0aGluZyB1bnJlc29sdmVkIGV2ZXJ5IHRpbWUgYW55b25lIGluIHRoaXMgZmFtaWx5IGxvb2tlZCBhdCBpdCwnIGhlIHNheXMuICdGZWVscyBnb29kLCBmaW5hbGx5LCB0byBoYXZlIGl0IHNpbXBseSBiZSBhIHBpZWNlIG9mIGJyYXNzIGFnYWluLCBpbnN0ZWFkIG9mIGEgZGVidC4nCgpIZSBzdHVkaWVzIHlvdSBhIG1vbWVudC4gJ1doYXRldmVyIHlvdSdyZSBidWlsZGluZyB0b3dhcmQg4oCUIGZpbmlzaCBpdCBwcm9wZXJseS4gRG9uJ3QgbGV0IGFueW9uZSBlbHNlJ3MgZmFtaWx5IGNhcnJ5IGFuIHVucmVzb2x2ZWQgd2VpZ2h0IHRoaXMgbG9uZyBhZ2FpbiwgaWYgeW91IGNhbiBoZWxwIGl0Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0b3dhcmQgdGhlIGNhcmF2YW4gd2l0aCB0aGUgd2VkZ2Ugc2VjdXJlIGluIHRoZSBzZWFsLWNhc2UsIEJ1a2hhcmEncyBzYW5kLWNvbG9yZWQgZG9tZXMgY2F0Y2hpbmcgdGhlIGRheSdzIGZhZGluZyBsaWdodCwgdGhlIGhhd2sgZmluYWxseSBzZXR0bGluZyBvbmNlIHlvdSdyZSBjbGVhciBvZiB0aGUgYmF6YWFyJ3Mgbm9pc2UgYW5kIGNvbG91ci4KClRvbWFzIHN0dWRpZXMgdGhlIHdlZGdlJ3MgZW5ncmF2aW5nIHdpdGggcmVhbCBwcm9mZXNzaW9uYWwgaW50ZXJlc3QuICdUd28gZG93biwgc2V2ZW4gdG8gZ28uIEdvb2Qgc3RhcnQuIFlzb2xkZSBjaG9zZSBoZXIgZGVidHMgY2FyZWZ1bGx5LCBpdCBzZWVtcyDigJQgZXZlcnkgb25lIHNvIGZhcidzIGhhZCBhIHJlYWwsIGhvbmVzdCB3ZWlnaHQgdG8gaXQuJw==',
            'choices' => [
                ['text' => 'QXNrIGlmIGFsbCB0aGUgZGVidHMgd2lsbCBiZSB0aGlzIGhlYXZ5', 'next' => '8_end_ask'],
                ['text' => 'SnVzdCBiZSBnbGFkIHRoaXMgb25lJ3Mgc2V0dGxlZA==', 'next' => '8_end_glad'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzaywgYW5kIFRvbWFzIGNvbnNpZGVycyBpdCBzZXJpb3VzbHkgYmVmb3JlIGFuc3dlcmluZy4gJ1NvbWUgd2lsbCBiZSBoZWF2aWVyLiBTb21lIGxpZ2h0ZXIuIE5pbmUgZGVidHMsIG5pbmUgZGlmZmVyZW50IHdlaWdodHMg4oCUIHRoYXQncyByYXRoZXIgdGhlIG5hdHVyZSBvZiBhIGxpZmUgc3BlbnQgdHJhZGluZyBmYWlybHkgYWNyb3NzIGEgbG90IG9mIHZlcnkgZGlmZmVyZW50IHBsYWNlcy4nIEhlIHNocnVncy4gJ1lvdSdsbCBtYW5hZ2UuIFlvdSBtYW5hZ2VkIHRoaXMgb25lLicKCkl0J3Mgbm90IGV4YWN0bHkgcmVhc3N1cmFuY2UsIGJ1dCBpdCdzIGhvbmVzdCwgYW5kIHNvbWVob3cgdGhhdCBsYW5kcyBiZXR0ZXIgdGhhbiBmYWxzZSBjb21mb3J0IHdvdWxkIGhhdmUu',
            'ending' => true,
        ],
        '8_end_glad' => [
            'prose'  => 'WW91IGxldCB5b3Vyc2VsZiBzaW1wbHkgYmUgZ2xhZCB0aGlzIG9uZSdzIHNldHRsZWQsIHdpdGhvdXQgaW1tZWRpYXRlbHkgcmVhY2hpbmcgZm9yIGhvdyB0aGUgcmVzdCBtaWdodCBnbyDigJQgb25lIGhvbmVzdCBkZWJ0IGNsb3NlZCBwcm9wZXJseSwgYSB3aG9sZSBmYW1pbHkgdmlzaWJseSByZWxpZXZlZCwgYSB3ZWRnZSByaWRpbmcgc2FmZSBpbiB0aGUgY2FzZS4KClRoZSBjYXJhdmFuIG1vdmVzIG9uIGZyb20gQnVraGFyYSBhcyBldmVuaW5nIHByb3Blcmx5IHNldHRsZXMsIGFuZCB5b3UgZmluZCB5b3Vyc2VsZiwgZm9yIHRoZSBmaXJzdCB0aW1lIHRoaXMgd2hvbGUgam91cm5leSwgYWN0dWFsbHkgbG9va2luZyBmb3J3YXJkIHRvIHdoYXRldmVyIHRoZSBuZXh0IGNpdHkncyBvd24gcGFydGljdWxhciBkZWJ0IHR1cm5zIG91dCB0byBiZS4=',
            'ending' => true,
        ],
    ],
];
