<?php
return [
    'id'    => 9,
    'title' => 'Convince Me',
    'color' => '#3A5A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QW5laXR5dW0gc2l0cyBhdCB0aGUgdmVyeSBib3R0b20gb2YgdGhlIFZhbnVhdHUgY2hhaW4sIHNtYWxsZXIgYW5kIHF1aWV0ZXIgdGhhbiBhbnl3aGVyZSB5b3UndmUgc3RvcHBlZCBzbyBmYXIsIGl0cyBzaW5nbGUgbW91bnRhaW4gd3JhcHBlZCBpbiBjbG91ZCB0aGF0IG5ldmVyIHF1aXRlIGxpZnRzLiBTb2xhbmdlIG1vb3JzIHdpdGggbW9yZSBjYXJlIHRoYW4gdXN1YWwuICdTb21lb25lJ3MgYWxyZWFkeSBiZWVuIGhlcmUsJyBzaGUgc2F5cywgYmVmb3JlIHlvdSd2ZSBldmVuIGFza2VkLiAnUmVjZW50bHkuIEkgY2FuIGZlZWwgaXQgaW4gaG93IGNhcmVmdWwgZXZlcnlvbmUncyBiZWluZyBhYm91dCBub3Qgc2F5aW5nIHNvLicKClR3byB3YXlzIHVwIGZyb20gdGhlIGFuY2hvcmFnZSBwcmVzZW50IHRoZW1zZWx2ZXMg4oCUIGEgc2hvcmUgcGF0aCBwYXN0IGEga25vdCBvZiBmaXNoZXJtZW4gbWVuZGluZyBuZXQsIG9yIGEgZ2FyZGVuIHRyYWNrIHdoZXJlIGEgaGFuZGZ1bCBvZiBjaGlsZHJlbiBhcmUgcGxheWluZyBhIGdhbWUgd2l0aCBzdG9uZXMgdGhhdCBzdG9wcyB0aGUgbW9tZW50IHRoZXkgbm90aWNlIHlvdS4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgc2hvcmUgcGF0aA==', 'next' => '2_fishermen'],
                ['text' => 'VGFrZSB0aGUgZ2FyZGVuIHRyYWNr', 'next' => '2_children'],
            ],
        ],
        '2_fishermen' => [
            'prose'  => 'VGhlIGZpc2hlcm1lbiBhbnN3ZXIgeW91ciBjYXJlZnVsIHF1ZXN0aW9ucyBjYXJlZnVsbHkgaW4gcmV0dXJuLCB0aGUgd2F5IHBlb3BsZSBkbyB3aGVuIHRoZXkndmUgZGVjaWRlZCwgY29sbGVjdGl2ZWx5IGFuZCB3aXRob3V0IGRpc2N1c3NpbmcgaXQsIGV4YWN0bHkgaG93IG11Y2ggYSBzdHJhbmdlciBnZXRzIHRvbGQuIFdoYXQgeW91IHBpZWNlIHRvZ2V0aGVyIGlzIHRoaXM6IHNvbWVvbmUgY2FtZSB0aHJvdWdoIG5vdCBsb25nIGFnbywgYXNraW5nIGFmdGVyIHRoZSBzYW1lIGtpbmQgb2YgdGhpbmcgeW91J3JlIGFza2luZyBhZnRlciwgYW5kIGxlZnQgaW4gYSBodXJyeSB0aGF0IGRpZG4ndCBzaXQgd2VsbCB3aXRoIGFueW9uZS4KCidCaWcgbWFuJ2xsIHdhbnQgdG8gbG9vayBhdCB5b3UgaGltc2VsZiwnIG9uZSBvZiB0aGVtIGZpbmFsbHkgc2F5cywgbWVhbmluZyB0aGUgaXNsYW5kJ3MgcmVzcGVjdGVkIGVsZGVyLCBub3QgdW5raW5kbHksIGp1c3QgYXMgZmFjdC4gJ1VwIHBhc3QgdGhlIGdhcmRlbi4gSGUnbGwga25vdyB3aGF0IGhlIHRoaW5rcyBvZiB5b3UgYmVmb3JlIHlvdSd2ZSBzYWlkIGEgd29yZC4n',
            'choices' => [
                ['text' => 'SGVhZCB1cCB0byBmaW5kIGhpbQ==', 'next' => '3_shared'],
            ],
        ],
        '2_children' => [
            'prose'  => 'VGhlIGNoaWxkcmVuLCBvbmNlIHRoZXkndmUgZGVjaWRlZCB5b3UncmUgbm90IHdvcnRoIGJlaW5nIGFmcmFpZCBvZiwgdHVybiBvdXQgdG8gYmUgdGhlIGJlc3QtaW5mb3JtZWQgcGVvcGxlIG9uIHRoZSB3aG9sZSBpc2xhbmQg4oCUIHRoZXkgdGVsbCB5b3UsIGluIHRoZSBzY2F0dGVyZWQsIG92ZXJsYXBwaW5nIHdheSBjaGlsZHJlbiB0ZWxsIGFueXRoaW5nLCBhYm91dCBhIHN0cmFuZ2VyIHdobyBjYW1lIHRocm91Z2ggcmVjZW50bHkgYW5kIHdhcyBydWRlIHRvIHNvbWVvbmUncyBncmFuZG1vdGhlciwgdGhvdWdoIHRoZSBkZXRhaWxzIHNoaWZ0IHdpdGggZXZlcnkgcmV0ZWxsaW5nLgoKQW4gb2xkZXIgZ2lybCwgY2xlYXJseSB1c2VkIHRvIGJlaW5nIGJlbGlldmVkIG92ZXIgdGhlIHlvdW5nZXIgb25lcywgc2V0dGxlcyBpdDogJ0JpZyBtYW4gd2FudHMgdG8gc2VlIGFueW9uZSB3aG8gY29tZXMgbm93LiBVcCB0aGVyZS4nIFNoZSBwb2ludHMgdXAgcGFzdCB0aGUgZ2FyZGVuIHdpdGggdGhlIHRvdGFsIGNvbmZpZGVuY2Ugb2Ygc29tZW9uZSB3aG8gaGFzIG5ldmVyIG9uY2UgYmVlbiB3cm9uZyBhYm91dCBhbnl0aGluZyBpbiBoZXIgbGlmZS4=',
            'choices' => [
                ['text' => 'SGVhZCB1cCB0byBmaW5kIGhpbQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGJpZyBtYW4ncyBob3VzZSBzaXRzIGF0IHRoZSBnYXJkZW4ncyB1cHBlciBlZGdlLCBhbmQgaGUncyB3YWl0aW5nIG9uIHRoZSBzdGVwIGJlZm9yZSB5b3UndmUgcHJvcGVybHkgYXJyaXZlZCwgd2F0Y2hpbmcgeW91ciBhcHByb2FjaCB3aXRoIGFuIGF0dGVudGlvbiB0aGF0IG1pc3NlcyBub3RoaW5nIOKAlCB5b3VyIHBhY2UsIHlvdXIgaGFuZHMsIHdoZXRoZXIgeW91IGxvb2sgYXQgaGltIG9yIGF0IHRoZSBncm91bmQuCgonWW91J3JlIG5vdCB0aGUgbGFzdCBvbmUsJyBoZSBzYXlzLCB3aXRob3V0IHByZWFtYmxlLiAnVGhlIGxhc3Qgb25lIGRpZG4ndCB3YWl0IHRvIGJlIGFza2VkIGFueXRoaW5nLiBEaWRuJ3Qgd2FpdCBmb3IgbXVjaCBhdCBhbGwuJyBIZSBkb2Vzbid0IHNheSB3aGF0IGhhcHBlbmVkLCBvbmx5IHRoYXQgaXQgbGVmdCBzb21ldGhpbmcgYmVoaW5kIGl0IOKAlCBhIHdhcmluZXNzIHlvdSBjYW4gZmVlbCBzaXR0aW5nIGluIHRoZSBzcGFjZSBiZXR3ZWVuIHlvdSBsaWtlIHdlYXRoZXIuCgonU28sJyBoZSBzYXlzLiAnQ29udmluY2UgbWUgeW91J3JlIG5vdCBoaW0uJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'RGVjaWRlIGhvdyB0byBhbnN3ZXIgdGhhdA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUncyBubyBzaW5nbGUgcmlnaHQgYW5zd2VyIHRvIGEgcXVlc3Rpb24gbGlrZSB0aGF0LCBvbmx5IGEgY2hvaWNlIGFib3V0IGhvdyB0byB0cnkuIFlvdSBjb3VsZCBvZmZlciB0aGUgdGFub2Egbm93LCBwcm9wZXJseSwgdGhlIHdheSB5b3Ugd2VyZSB0YXVnaHQgdG8gb2ZmZXIgYW55dGhpbmcgdGhhdCBtYXR0ZXJzIOKAlCBnaWZ0IGZpcnN0LCB0cnVzdCB0byBmb2xsb3cuIE9yIHlvdSBjb3VsZCBob2xkIGl0IGJhY2ssIHNpdCB3aXRoIGhpbSwgYW5kIGxldCBoaW0gdGFrZSB3aGF0ZXZlciB0aW1lIGhlIG5lZWRzIHRvIGRlY2lkZSBhYm91dCB5b3Ugb24gaGlzIG93biB0ZXJtcywgd2l0aG91dCBhbnl0aGluZyBpbiB5b3VyIGhhbmRzIHRvIHN3YXkgaXQu',
            'choices' => [
                ['text' => 'T2ZmZXIgdGhlIHRhbm9hIG5vdywgcHJvcGVybHk=', 'next' => '5_gift'],
                ['text' => 'SG9sZCBiYWNrIGFuZCBsZXQgaGltIHRha2UgaGlzIHRpbWU=', 'next' => '5_wait'],
            ],
        ],
        '5_gift' => [
            'prose'  => 'WW91IG9mZmVyIHRoZSBib3dsIHRoZSB3YXkgaXQgd2FzIGdpdmVuIHRvIHlvdSDigJQgYm90aCBoYW5kcywgbm8gcnVzaCwgdGhlIHNtYWxsIGZvcm1hbCBwYXVzZSB0aGF0IHNheXMgdGhpcyBtYXR0ZXJzIGFuZCBJIGtub3cgaXQuIEhlIHRha2VzIGl0IHNsb3dseSwgdHVybnMgaXQgb3Zlciwgbm90ZXMgdGhlIGdvb2QgZ3JhaW4gdGhlIHNhbWUgd2F5IFNvbGFuZ2UgZGlkLCBhbmQgc29tZXRoaW5nIGluIGhpcyBzaG91bGRlcnMgZWFzZXMgYnkgYSBmcmFjdGlvbiB0aGF0IHdvdWxkIGJlIGVhc3kgdG8gbWlzcyBpZiB5b3Ugd2VyZW4ndCB3YXRjaGluZyBmb3IgaXQuCgonVGFubmEgd29yaywnIGhlIHNheXMuICdHb29kIGhhbmRzIHRoZXJlIHRvby4nIEhlIHNldHMgaXQgZG93biB3aXRoIHJlYWwgY2FyZS4gJ0FsbCByaWdodC4gU2l0LiBXZSdsbCBzZWUuJwoKVGhlIGV2ZW5pbmcgdGhhdCBmb2xsb3dzIGlzIHNsb3cgYW5kIGNhcmVmdWwgYW5kLCBncmFkdWFsbHksIGxlc3MgY2FyZWZ1bCDigJQgcXVlc3Rpb25zIGFza2VkIGFuZCBhY3R1YWxseSBhbnN3ZXJlZCwgc2lsZW5jZXMgdGhhdCBzdG9wIG1lYW5pbmcgc3VzcGljaW9uIGFuZCBzdGFydCBtZWFuaW5nIHNpbXBseSByZXN0Lg==',
            'choices' => [
                ['text' => 'U2VlIHdoZXJlIHRoZSBldmVuaW5nIGxlYWRz', 'next' => '6_gift_result'],
            ],
        ],
        '5_wait' => [
            'prose'  => 'WW91IGRvbid0IG9mZmVyIGFueXRoaW5nLiBZb3Ugc2l0LCBpbnN0ZWFkLCBhdCBhIHJlc3BlY3RmdWwgZGlzdGFuY2UsIGFuZCBsZXQgaGltIHdhdGNoIHlvdSBub3QgcGVyZm9ybSBmb3IgaGltLCB3aGljaCB0dXJucyBvdXQgdG8gYmUgaXRzIG93biBraW5kIG9mIGFuc3dlciwgdGhvdWdoIGEgc2xvd2VyIGFuZCBtb3JlIHVuY2VydGFpbiBvbmUuIFRoZSBhZnRlcm5vb24gc3RyZXRjaGVzIGxvbmcgYW5kIHVucmVzb2x2ZWQsIGhpcyB3YXJpbmVzcyBuZXZlciBxdWl0ZSBsaWZ0aW5nLCB5b3VyIHBhdGllbmNlIG5ldmVyIHF1aXRlIHJld2FyZGVkLgoKRHVzayBpcyBjb21pbmcgZG93biBmYXN0IGFuZCB0aGUgbW91bnRhaW4ncyBjbG91ZCBoYXMgZHJvcHBlZCBsb3cgb3ZlciB0aGUgZ2FyZGVuIHdoZW4gYSBjcmFzaGluZyBzdGFydHMgaW4gdGhlIGJydXNoIGJlaGluZCB0aGUgaG91c2Ug4oCUIGEgd2lsZCBwaWcsIHNwb29rZWQgYnkgc29tZXRoaW5nLCBicmVha2luZyBmb3IgdGhlIGNsZWFyaW5nIGF0IGV4YWN0bHkgdGhlIHdyb25nIGFuZ2xlLCBleGFjdGx5IHRoZSB3cm9uZyBzcGVlZCwgaGVhZGVkIHN0cmFpZ2h0IGZvciB3aGVyZSB0aGUgY2hpbGRyZW4gd2VyZSBwbGF5aW5nIHN0b25lcyB0aGF0IGFmdGVybm9vbi4KClRoZSBiaWcgbWFuIGlzIG1vdmluZyBiZWZvcmUgeW91J3ZlIGZ1bGx5IHVuZGVyc3Rvb2Qgd2hhdCB5b3UncmUgc2VlaW5nLCBhIGhlYXZ5IGNhcnZlZCBjbHViIGFscmVhZHkgaW4gaGlzIGhhbmQsIHB1bGxlZCBmcm9tIHdoZXJlIGl0IGh1bmcgYnkgdGhlIGRvb3Igd2l0aG91dCBhIHNpbmdsZSB3YXN0ZWQgbW90aW9uLg==',
            'choices' => [
                ['text' => 'V2F0Y2ggd2hhdCBoYXBwZW5zIG5leHQ=', 'next' => '6_wait_result'],
            ],
        ],
        '6_gift_result' => [
            'prose'  => 'V2VsbCBpbnRvIHRoZSBldmVuaW5nLCB3aXRoIHRoZSBmaXJlIGRvd24gdG8gY29hbHMgYW5kIHRoZSB0ZW5zaW9uIGxvbmcgc2luY2UgZGlzc29sdmVkIGludG8gb3JkaW5hcnkgY29udmVyc2F0aW9uLCB0aGUgYmlnIG1hbiBnZXRzIHVwIHdpdGhvdXQgYSB3b3JkIGFuZCBjb21lcyBiYWNrIHdpdGggYSBjbHViIOKAlCBhIG5hbC1uYWwsIGRlbnNlLWhlYWRlZCwgdGhlIGtpbmQgb2YgY2FydmluZyB0aGF0IHRha2VzIGEgY3JhZnRzbWFuIG1vbnRocyBhbmQgYSBsaWZldGltZSBvZiBwcmFjdGljZSB0byBnZXQgcmlnaHQuCgonVGhpcyBpc24ndCBub3RoaW5nLCB3aGF0IEknbSBnaXZpbmcgeW91LCcgaGUgc2F5cywgc2V0dGluZyBpdCBpbiB5b3VyIGhhbmRzIHdpdGggdGhlIHNhbWUgZm9ybWFsIHdlaWdodCB5b3UgZ2F2ZSBoaW0gdGhlIGJvd2wuICdJdCdzIGEgcGVhY2Ugb2ZmZXJpbmcsIGZyb20gbWUgdG8gd2hvZXZlciBjb21lcyBhc2tpbmcgaG9uZXN0bHkuIFlvdSBhc2tlZCBob25lc3RseS4gU28uIFRha2UgaXQsIGFuZCB0YWtlIHdoYXQgaXQgbWVhbnMgd2l0aCBpdC4nCgpUaGUgQmFyb24sIGNhdGNoaW5nIHRoZSBmaXJlbGlnaHQgYWxvbmcgdGhlIGNsdWIncyBwb2xpc2hlZCBoZWFkLCBvZmZlcnMgYSBsb3csIGFwcHJlY2lhdGl2ZSB3aGlzdGxlIHRoYXQgaXMsIGZvciBvbmNlLCBlbnRpcmVseSBzaW5jZXJlLg==',
            'choices' => [
                ['text' => 'Q2FycnkgaXQgYmFjayBkb3duIHRvIHRoZSBhbmNob3JhZ2U=', 'next' => '7_shared'],
            ],
        ],
        '6_wait_result' => [
            'prose'  => 'SXQncyBvdmVyIGluIHNlY29uZHMg4oCUIHRoZSBjbHViIHN3dW5nIG9uY2UsIGhhcmQsIGxvdywgdHVybmluZyB0aGUgYm9hciBhc2lkZSBhdCB0aGUgbGFzdCBwb3NzaWJsZSBtb21lbnQgYmVmb3JlIGl0IHJlYWNoZXMgdGhlIGNsZWFyaW5nIHdoZXJlLCBoYWxmIGEgYnJlYXRoIGFnbywgY2hpbGRyZW4gaGFkIGJlZW4gcGxheWluZy4gVGhlIGFuaW1hbCBjcmFzaGVzIG9mZiBpbnRvIHRoZSBkYXJrLCBtb3JlIHN0YXJ0bGVkIHRoYW4gaHVydCwgYW5kIHRoZSBiaWcgbWFuIHN0YW5kcyB0aGVyZSBhZnRlcndhcmQgYnJlYXRoaW5nIGhhcmQsIGNsdWIgc3RpbGwgcmFpc2VkLCBzZXZlcmFsIGxvbmcgc2Vjb25kcyBiZWZvcmUgaGUgbG93ZXJzIGl0LgoKTm9ib2R5IHNheXMgYW55dGhpbmcgZm9yIGEgbW9tZW50LiBUaGVuIGhlIGxvb2tzIGRvd24gYXQgdGhlIGNsdWIgaW4gaGlzIG93biBoYW5kLCBhbmQgdGhlbiBhdCB5b3UsIGFuZCBzb21ldGhpbmcgaW4gaGlzIGZhY2UgaGFzIHZpc2libHksIGZpbmFsbHksIHNldHRsZWQuCgonTm93IGl0IG1lYW5zIHNvbWV0aGluZyBlbHNlIHRvbywnIGhlIHNheXMsIGFuZCBwcmVzc2VzIGl0IGludG8geW91ciBoYW5kcyBiZWZvcmUgeW91IGNhbiB0aGluayB0byBhc2sgd2hhdCBoZSBtZWFucy4gJ1dhc24ndCBwbGFubmluZyBvbiBnaXZpbmcgdGhpcyB0byBhbnlvbmUgdG9kYXkuIFBsYW5zIGNoYW5nZS4n',
            'choices' => [
                ['text' => 'Q2FycnkgaXQgYmFjayBkb3duIHRvIHRoZSBhbmNob3JhZ2U=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'SG93ZXZlciB0aGUgZXZlbmluZyB0dXJuZWQsIHRoZSBjbHViIHJpZGVzIGJhY2sgZG93biB0byB0aGUgYW5jaG9yYWdlIGluIHRoZSBjcm9vayBvZiB5b3VyIGFybSwgaGVhdmllciB0aGFuIGl0cyBzaXplIHN1Z2dlc3RzLCBjYXJyeWluZyB3aGF0ZXZlciBpdCdzIGNhcnJ5aW5nIG5vdyBpbiBhIHdheSB0aGF0IGhhcyBub3RoaW5nIHRvIGRvIHdpdGggd2VpZ2h0LiBUaGUgZ2FyZGVuIHBhdGggaXMgcXVpZXQgaW4gdGhlIGxhc3Qgb2YgdGhlIGxpZ2h0LCB0aGUgY2hpbGRyZW4gbG9uZyBzaW5jZSBjYWxsZWQgaW4gZm9yIHN1cHBlciwgdGhlIG1vdW50YWluJ3MgY2xvdWQgdW5tb3ZlZCBhbmQgdW5tb3ZpbmcgYWJvdmUgaXQgYWxsLgoKU29sYW5nZSB0YWtlcyBvbmUgbG9vayBhdCB0aGUgbmFsLW5hbCBhbmQgZG9lc24ndCBhc2sgYSBzaW5nbGUgcXVlc3Rpb24sIHdoaWNoIHlvdSB1bmRlcnN0YW5kLCBieSBub3csIHRvIGJlIGl0cyBvd24ga2luZCBvZiByZXNwZWN0IOKAlCBzb21lIHN0b3JpZXMgZ2V0IHRvbGQgd2hlbiB0aGV5J3JlIHJlYWR5IGFuZCBub3QgYSBtb21lbnQgYmVmb3JlLg==',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgdGhlIHdob2xlIHN0b3J5IGFueXdheQ==', 'next' => '8_end_tell'],
                ['text' => 'TGV0IGl0IHN0YXkgdW50b2xkIGZvciBub3c=', 'next' => '8_end_untold'],
            ],
        ],
        '8_end_tell' => [
            'prose'  => 'WW91IHRlbGwgaGVyIGFueXdheSwgdGhlIHdob2xlIHRoaW5nLCBvbiB0aGUgc2hvcnQgZmxpZ2h0IG91dCB3aGlsZSBBbmVpdHl1bSdzIG1vdW50YWluIGlzIHN0aWxsIHZpc2libGUgYmVoaW5kIHlvdSB3cmFwcGVkIGluIGl0cyBwZXJtYW5lbnQgY2xvdWQuIFNoZSBsaXN0ZW5zIHdpdGhvdXQgaW50ZXJydXB0aW5nLCB0aGUgd2F5IHNoZSBsaXN0ZW5zIHRvIGV2ZXJ5dGhpbmcgdGhhdCBhY3R1YWxseSBtYXR0ZXJzLCBhbmQgYXQgdGhlIGVuZCBzYXlzIG9ubHksICdHb29kIG1hbiwgdGhlbi4gVW5kZXIgYWxsIHRoYXQgd2FyaW5lc3MuJwoKSXQncyB0aGUga2luZCBvZiB2ZXJkaWN0IHNoZSBkb2Vzbid0IGhhbmQgb3V0IGxpZ2h0bHksIGFuZCB5b3UgZmluZCB5b3Vyc2VsZiBnbGFkLCBpbiBhIHdheSB5b3UgZG9uJ3QgZXhhbWluZSB0b28gY2xvc2VseSwgdGhhdCB5b3UgaGFkIGEgc3Rvcnkgd29ydGggZWFybmluZyBpdC4=',
            'ending' => true,
        ],
        '8_end_untold' => [
            'prose'  => 'WW91IGRvbid0IHRlbGwgaGVyLCBub3QgdGhhdCBldmVuaW5nLiBTb21lIHRoaW5ncyB3YW50IHRvIHNpdCBhIHdoaWxlIGJlZm9yZSB0aGV5J3JlIHR1cm5lZCBpbnRvIGEgc3RvcnkgZm9yIHNvbWVvbmUgZWxzZSwgZXZlbiBzb21lb25lIHdobydkIHVuZGVyc3RhbmQgaXQgcHJvcGVybHkuCgpUaGUgS8WNdHVrdSBsaWZ0cyBpbnRvIGEgc2t5IGdvbmUgdGhlIGRlZXAsIGJydWlzZWQgY29sb3VyIHRoYXQgY29tZXMganVzdCBhZnRlciBzdW5zZXQgaW4gdGhpcyBwYXJ0IG9mIHRoZSB3b3JsZCwgQW5laXR5dW0ncyBjbG91ZC13cmFwcGVkIG1vdW50YWluIHNocmlua2luZyBhc3Rlcm4sIGFuZCB0aGUgbmFsLW5hbCByaWRlcyBpbiB0aGUgc2F0Y2hlbCBiZXNpZGUgdGhlIHRhbm9hJ3MgcmVwbGFjZW1lbnQgd2FybXRoIOKAlCBrYXZhIGJvd2wgYmVoaW5kIHlvdSBub3csIHdoYXRldmVyIHRoaXMgbmV3IHRoaW5nIGlzIHJpZGluZyBhaGVhZC4gU29tZSBldmVuaW5ncywgaXQgdHVybnMgb3V0LCBhcmUgZW5vdWdoIGp1c3QgdG8gaGF2ZSBoYXBwZW5lZCwgd2l0aG91dCBhbnlvbmUgZWxzZSBuZWVkaW5nIHRvIGhlYXIgYWJvdXQgaXQgeWV0Lg==',
            'ending' => true,
        ],
    ],
];
