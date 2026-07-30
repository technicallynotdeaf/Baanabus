<?php
return [
    'id'    => 13,
    'title' => 'On Her Own Terms',
    'color' => '#6A4A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'V2FycnVtYnVuZ2xlJ3MgamFnZ2VkIHZvbGNhbmljIHJpZGdlbGluZXMgcmlzZSBkcmFtYXRpY2FsbHkgYWdhaW5zdCB0aGUgQXVzdHJhbGlhbiBvdXRiYWNrIHNreSwgb25lIG9mIHRoZSBjb3VudHJ5J3MgZmV3IGRlZGljYXRlZCBkYXJrLXNreSBwYXJrcyBwcm9wZXJseSBsaXZpbmcgdXAgdG8gaXRzIHJlcHV0YXRpb24gYXMgdGhlIHN0YXJzIGJlZ2luIGVtZXJnaW5nLiBQcml5YSBsYW5kcyBjYXJlZnVsbHkgbmVhciBhIG1hcmtlZCByaWRnZSB0cmFjay4gJ1NreS1rbm93bGVkZ2UgaG9sZGVyJ3Mgd2FpdGluZyBhdCB0aGUgbG9va291dCwnIHNoZSBzYXlzLiAnQ29yd2luJ3Mgbm90ZXMgYXJlIGNhcmVmdWwgaGVyZSDigJQgcmVhbCByZXNwZWN0IHJlcXVpcmVkIGFib3V0IHdoYXQncyBhcHByb3ByaWF0ZSB0byBhY3R1YWxseSByZWNvcmQuJwoKVHdvIHJpZGdlLXRyYWNrIHJvdXRlcyB0b3dhcmQgdGhlIGxvb2tvdXQgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgc3RlZXBlciBkaXJlY3QgdHJhY2ssIG9yIHRoZSBsb25nZXIgdHJhY2sgc2tpcnRpbmcgdGhlIHJpZGdlJ3MgYmFzZS4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgc3RlZXBlciBkaXJlY3QgdHJhY2s=', 'next' => '2_direct'],
                ['text' => 'Rm9sbG93IHRoZSBsb25nZXIgYmFzZSB0cmFjaw==', 'next' => '2_base'],
            ],
        ],
        '2_direct' => [
            'prose'  => 'VGhlIHN0ZWVwZXIgZGlyZWN0IHRyYWNrIGNsaW1icyBoYXJkIHRvd2FyZCB0aGUgcmlkZ2UsIGphZ2dlZCB2b2xjYW5pYyByb2NrIHJpc2luZyBjbG9zZSBvbiBlaXRoZXIgc2lkZSwgdGhlIGVmZm9ydCBjb25zaWRlcmFibGUgYnV0IHRoZSBwYWNlIHF1aWNrLiBZb3UgcmVhY2ggdGhlIGxvb2tvdXQgcHJvcGVybHkgd2luZGVkLCB0aGUgc2t5IGFscmVhZHkgZGVlcGVuaW5nIHRvd2FyZCBmdWxsIGRhcmsu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGxvb2tvdXQ=', 'next' => '3_shared'],
            ],
        ],
        '2_base' => [
            'prose'  => 'VGhlIGxvbmdlciB0cmFjayBza2lydGluZyB0aGUgcmlkZ2UncyBiYXNlIHRha2VzIGEgZ2VudGxlciBncmFkZSwgdGhlIGphZ2dlZCB2b2xjYW5pYyBzaWxob3VldHRlcyByaXNpbmcgZHJhbWF0aWNhbGx5IG92ZXJoZWFkIHRoZSB3aG9sZSB1bmh1cnJpZWQgd2Fsay4gWW91IHJlYWNoIHRoZSBsb29rb3V0IGEgbGl0dGxlIGxhdGVyLCBhdCBhbiBlYXNpZXIgcGFjZS4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGxvb2tvdXQ=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'QXQgdGhlIGxvb2tvdXQgd2FpdHMgYW4gQWJvcmlnaW5hbCBBdXN0cmFsaWFuIHNreS1rbm93bGVkZ2UgaG9sZGVyLCBhIHdvbWFuIG5hbWVkIEF1bnR5IE1lcmxlLCB3aG8gZ3JlZXRzIHlvdSB3aXRoIGNhcmVmdWwsIG1lYXN1cmVkIHdhcm10aC4gJ1lvdXIgZ3JlYXQtdW5jbGUgY2FtZSBoZXJlIG9uY2UsIHByb3Blcmx5LCBhbmQgYXNrZWQgZ29vZCBxdWVzdGlvbnMgYWJvdXQgd2hhdCBoZSBjb3VsZCBhbmQgY291bGRuJ3QgdGFrZSBhd2F5IHdpdGggaGltLCcgc2hlIHNheXMuICdUaGF0IG1hdHRlcmVkIHRvIG1lIHRoZW4uIE1hdHRlcnMgbm93IHRvby4nCgpTaGUgc3R1ZGllcyB0aGUgYXRsYXMncyBuZXh0IGJsYW5rIHBhdGNoLiAnSSdsbCBzaGFyZSBhIHN0b3J5IHdpdGggeW91IHByb3Blcmx5LCBvbiBteSBvd24gdGVybXMuIFNvbWUgb2YgaXQgZ29lcyBpbiB0aGF0IGJvb2suIFNvbWUgb2YgaXQgc3RheXMgd2l0aCBtZS4gQXJlIHlvdSBhYmxlIHRvIGFjY2VwdCB0aGF0IHNwbGl0LCB3aXRob3V0IHB1c2hpbmcgZm9yIG1vcmU/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdsbCBhY2NlcHQgd2hhdGV2ZXIgc2hlJ3Mgd2lsbGluZyB0byBzaGFyZQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'QXVudHkgTWVybGUgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IHJlY2VpdmUgd2hhdCBzaGUncyB3aWxsaW5nIHRvIHNoYXJlOiBoZWFyIHRoZSB3aG9sZSBzdG9yeSBhcyBzaGUgY2hvb3NlcyB0byB0ZWxsIGl0LCB1bmJyb2tlbiwgdHJ1c3RpbmcgaGVyIGp1ZGdtZW50IGVudGlyZWx5IGFib3V0IHdoZXJlIHRoZSB0ZWxsaW5nIG5hdHVyYWxseSBzdG9wcywgb3IgYXNrIGhlciBkaXJlY3RseSwgYmVmb3JlaGFuZCwgZXhhY3RseSB3aGF0IGJvdW5kYXJpZXMgdG8gZXhwZWN0LCBzbyB5b3Uga25vdyBjbGVhcmx5IHdoZXJlIHRoZSBzaGFyZWQgcGFydCBlbmRzLgoKJ0VpdGhlciByZXNwZWN0cyBpdCBwcm9wZXJseSwnIHNoZSBzYXlzLiAnVHJ1c3QgdGhlIHRlbGxpbmcgaXRzZWxmLCBvciBhc2sgZmlyc3QuIFlvdXIgY2hvaWNlLCB0aG91Z2ggSSBkb24ndCBtaW5kIGVpdGhlciB3YXkuJw==',
            'choices' => [
                ['text' => 'VHJ1c3QgdGhlIHRlbGxpbmcgaXRzZWxm', 'next' => '5_trust'],
                ['text' => 'QXNrIGRpcmVjdGx5IGFib3V0IHRoZSBib3VuZGFyaWVzIGZpcnN0', 'next' => '5_ask'],
            ],
        ],
        '5_trust' => [
            'prose'  => 'VHJ1c3RpbmcgdGhlIHRlbGxpbmcgaXRzZWxmIG1lYW5zIHNpbXBseSBsaXN0ZW5pbmcgYXMgQXVudHkgTWVybGUgc2hhcmVzIHRoZSBzdG9yeSBhdCBoZXIgb3duIGNhcmVmdWwgcGFjZSwgdGhlIGFjY291bnQgcmljaCBhbmQgdml2aWQgcmlnaHQgdXAgdW50aWwgYSBuYXR1cmFsLCB1bm1pc3Rha2FibGUgY2xvc2Ugd2hlcmUgaGVyIHZvaWNlIHNoaWZ0cywgZ2VudGx5IGJ1dCBjbGVhcmx5LCBzaWduYWxsaW5nIHRoZSBzaGFyZWQgcGFydCBoYXMgcHJvcGVybHkgZW5kZWQuCgpZb3UgZG9uJ3QgcHJlc3MgZm9yIG1vcmUuIFRoZSBib3VuZGFyeSBhbm5vdW5jZXMgaXRzZWxmLCBhbmQgeW91IHJlc3BlY3QgaXQgd2l0aG91dCBuZWVkaW5nIGl0IHNwZWxsZWQgb3V0Lg==',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_ask' => [
            'prose'  => 'QXNraW5nIGRpcmVjdGx5IGFib3V0IHRoZSBib3VuZGFyaWVzIGZpcnN0IG1lYW5zIEF1bnR5IE1lcmxlIGV4cGxhaW5pbmcgcGxhaW5seSwgYmVmb3JlIHNoZSBldmVuIGJlZ2lucywgZXhhY3RseSB3aGljaCBwYXJ0cyBvZiB0aGUgc3RvcnkgYXJlIG1lYW50IGZvciB0aGUgYXRsYXMgYW5kIHdoaWNoIHJlbWFpbiBoZXJzIGFsb25lLCB0aGUgd2hvbGUgdGVsbGluZyBhZnRlcndhcmQgdW5mb2xkaW5nIHdpdGggcmVhbCBjbGFyaXR5IGFib3V0IHdoZXJlIGl0cyBlZGdlcyBwcm9wZXJseSBzaXQuCgpLbm93aW5nIHRoZSBzaGFwZSBiZWZvcmVoYW5kLCB5b3UncmUgYWJsZSB0byBsaXN0ZW4gZnVsbHksIHdpdGhvdXQgYW55IG5hZ2dpbmcgdW5jZXJ0YWludHkgYWJvdXQgd2hlcmUgdG8gc3RvcC4=',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMncyBibGFuayBwYXRjaCBjYXJlZnVsbHksIGFuZCBiZXNpZGUgaXQgd3JpdGUgYW4gZXhwbGljaXQgbm90ZSDigJQgbm90IHRoZSBmdWxsIHN0b3J5LCBvbmx5IHdoYXQgd2FzIHByb3Blcmx5LCBkZWxpYmVyYXRlbHkgc2hhcmVkLCBhbG9uZ3NpZGUgYSBjbGVhciBhY2tub3dsZWRnbWVudCB0aGF0IG1vcmUgZXhpc3RzIGFuZCByaWdodGx5IHN0YXlzIHdoZXJlIGl0IGJlbG9uZ3MuIEF1bnR5IE1lcmxlIHJldmlld3MgdGhlIG5vdGUgd2l0aCByZWFsIHNhdGlzZmFjdGlvbi4KCidUaGF0J3MgZXhhY3RseSByaWdodCwnIHNoZSBzYXlzLiAnWW91ciBncmVhdC11bmNsZSB3cm90ZSB0aGUgc2FtZSBraW5kIG9mIG5vdGUsIGFsbCB0aG9zZSB5ZWFycyBiYWNrLiBHb29kIHRoYXQgeW91J3ZlIGtlcHQgdGhhdCByZXNwZWN0IGdvaW5nIHByb3Blcmx5Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayBkb3duIGZyb20gdGhlIGxvb2tvdXQgYXMgV2FycnVtYnVuZ2xlJ3MgamFnZ2VkIHJpZGdlbGluZXMgc2V0dGxlIGludG8gZnVsbCBzaWxob3VldHRlIGFnYWluc3QgYSBza3kgbm93IHRoaWNrIHdpdGggc3RhcnMsIHRoZSB3aG9sZSB2aXNpdCBzaXR0aW5nIHdpdGggYSBwYXJ0aWN1bGFyIHdlaWdodCBxdWl0ZSBkaWZmZXJlbnQgZnJvbSB0aGUgam91cm5leSdzIG90aGVyIHN0b3BzLiBQcml5YSdzIHdhaXRpbmcgd2l0aCB0aGUgdGhlcm1vcywgd2F0Y2hpbmcgeW91ciB0aG91Z2h0ZnVsIGV4cHJlc3Npb24gY2xvc2VseS4KCidHb29kIHZpc2l0Pycgc2hlIGFza3MgY2FyZWZ1bGx5Lg==',
            'choices' => [
                ['text' => 'U2F5IGl0IHRhdWdodCB5b3Ugc29tZXRoaW5nIGltcG9ydGFudCBhYm91dCByZXNwZWN0', 'next' => '8_end_respect'],
                ['text' => 'U2F5IHlvdSdyZSBzdGlsbCBzaXR0aW5nIHdpdGggaG93IGl0IGZlbHQ=', 'next' => '8_end_sitting'],
            ],
        ],
        '8_end_respect' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCB0YXVnaHQgbWUgc29tZXRoaW5nIGltcG9ydGFudCBhYm91dCByZXNwZWN0LCcgeW91IHNheSwgdGhpbmtpbmcgb2YgQXVudHkgTWVybGUncyBjYXJlZnVsLCBjbGVhciBib3VuZGFyeS4gJ05vdCBldmVyeSBzdG9yeSBpcyBvd2VkIHRvIG1lIGluIGZ1bGwsIGp1c3QgYmVjYXVzZSBJJ20gYXNraW5nIG5pY2VseS4gU29tZSB0aGluZ3Mgc3RheSBoZWxkLCBhbmQgdGhhdCdzIGV4YWN0bHkgYXMgaXQgc2hvdWxkIGJlLicKClByaXlhIG5vZHMgc2xvd2x5LiAnVGhhdCdzIGEgZ2VudWluZWx5IGltcG9ydGFudCB0aGluZyB0byBjYXJyeSBmb3J3YXJkLCB0aGUgcmVzdCBvZiB0aGlzIGpvdXJuZXkgYW5kIGJleW9uZCBpdC4gR2xhZCBpdCBsYW5kZWQgcHJvcGVybHkuJw==',
            'ending' => true,
        ],
        '8_end_sitting' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gc3RpbGwgc2l0dGluZyB3aXRoIGhvdyBpdCBmZWx0LCcgeW91IGFkbWl0LCBsb29raW5nIGJhY2sgb25jZSBhdCB0aGUgZGFya2VuaW5nIHJpZGdlbGluZS4gJ05vdCBpbiBhIGJhZCB3YXkuIEp1c3Qg4oCUIGEgbG90IHRvIHByb3Blcmx5IGFic29yYiwgYmVpbmcgdHJ1c3RlZCB3aXRoIGV4YWN0bHkgYXMgbXVjaCBhcyBzaGUgY2hvc2UgdG8gZ2l2ZSwgYW5kIG5vdGhpbmcgbW9yZS4nCgpQcml5YSBkb2Vzbid0IHJ1c2ggeW91IHBhc3QgaXQuICdUaGF0J3MgZmFpci4gU29tZSBzdG9wcyBkZXNlcnZlIHRoYXQga2luZCBvZiBzaXR0aW5nLXdpdGguIFRha2UgeW91ciB0aW1lLicgVGhlIFF1aWV0IEhvdXIgbGlmdHMgcXVpZXRseSBhd2F5LCBXYXJydW1idW5nbGUncyBqYWdnZWQgc2lsaG91ZXR0ZSBzaHJpbmtpbmcgaW50byB0aGUgc3Rhci10aGljayBvdXRiYWNrIGRhcmsu',
            'ending' => true,
        ],
    ],
];
