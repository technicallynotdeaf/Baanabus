<?php
return [
    'id'    => 6,
    'title' => 'Not Just Brass',
    'color' => '#B8783A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEF0bGFzIE1vdW50YWlucyByaXNlIGRyeSBhbmQgcmVkLWdvbGQgYWJvdmUgdmFsbGV5cyB0ZXJyYWNlZCBncmVlbiB3aXRoIGFyZ2FuIHRyZWVzIGFuZCBzbWFsbCBzdG9uZSB2aWxsYWdlcyB0aGF0IHNlZW0gdG8gZ3JvdyBkaXJlY3RseSBvdXQgb2YgdGhlIHJvY2sgaXRzZWxmLiBHcmV0YSBicmluZ3MgdGhlIENvbnRvdXIgZG93biBuZWFyIGEga2FzYmFoIHdob3NlIHdhbGxzIGhhdmUgY2xlYXJseSBiZWVuIHJlYnVpbHQgYW5kIHJlaW5mb3JjZWQgbW9yZSB0aW1lcyB0aGFuIGFueW9uZSBzdGlsbCBsaXZpbmcgY291bGQgY291bnQuCgpUd28gd2F5cyB0byBmaW5kIHRoZSBmYW1pbHkgd2hvIG1pZ2h0IGhvbGQgdGhlIGNvbXBhc3Mgcm9zZSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIG1vdW50YWluIHZpbGxhZ2UgaXRzZWxmLCBzbG93IGFuZCBwcm9wZXJseSBpbnRyb2R1Y2VkLCBvciBmb2xsb3dpbmcgYW4gb2xkIGNhcmF2YW4gdHJhaWwgdGhhdCBhIGd1aWRlIGluIHRoZSBrYXNiYWggaW5zaXN0cyBpcyBmYXN0ZXIsIGlmIHlvdSBkb24ndCBtaW5kIGFycml2aW5nIGEgbGl0dGxlIGxlc3MgZm9ybWFsbHkgYW5ub3VuY2VkLg==',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgdmlsbGFnZSBwcm9wZXJseQ==', 'next' => '2_village'],
                ['text' => 'Rm9sbG93IHRoZSBjYXJhdmFuIHRyYWls', 'next' => '2_trail'],
            ],
        ],
        '2_village' => [
            'prose'  => 'VGhlIHZpbGxhZ2Ugd2VsY29tZXMgeW91IHdpdGggdGhlIHBhcnRpY3VsYXIgdW5odXJyaWVkIHdhcm10aCBvZiBhIHBsYWNlIHVzZWQgdG8gdHJhdmVsbGVycyBwYXNzaW5nIHRocm91Z2ggb24gZ2VudWluZSBidXNpbmVzcyByYXRoZXIgdGhhbiBjdXJpb3NpdHkuIE1pbnQgdGVhIGFwcGVhcnMgYmVmb3JlIHlvdSd2ZSBmaW5pc2hlZCBleHBsYWluaW5nIHlvdXJzZWxmLCBwb3VyZWQgZnJvbSBhIGhlaWdodCB0aGF0IHNlZW1zIHRvIG1hdHRlciBmb3IgcmVhc29ucyBub2JvZHkgcXVpdGUgZXhwbGFpbnMuCgpCeSB5b3VyIHNlY29uZCBnbGFzcywgc29tZW9uZSdzIGFscmVhZHkgc2VudCB3b3JkIGFoZWFkIHRvIHRoZSBmYW1pbHkgeW91J3JlIGxvb2tpbmcgZm9yLCB1cCBhIGZ1cnRoZXIgdHJhY2sgcGFzdCB0aGUgbGFzdCBvZiB0aGUgdGVycmFjZWQgYXJnYW4gZ3JvdmVzLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSB0cmFjaw==', 'next' => '3_shared'],
            ],
        ],
        '2_trail' => [
            'prose'  => 'VGhlIGNhcmF2YW4gdHJhaWwgaXMgZmFzdGVyLCBvbGRlciwgd29ybiBzbW9vdGggYnkgY2VudHVyaWVzIG9mIGZlZXQgYW5kIGhvb3ZlcyByYXRoZXIgdGhhbiByZWNlbnQgdHJhZmZpYywgd2luZGluZyB0aHJvdWdoIGNvdW50cnkgdGhhdCBmZWVscyBnZW51aW5lbHkgdW50b3VjaGVkIGJ5IGFueXRoaW5nIG1vcmUgbW9kZXJuIHRoYW4gdGhlIGxhc3QgZmV3IGdlbmVyYXRpb25zLgoKWW91IGFycml2ZSBhdCB0aGUgZmFtaWx5J3MgaG9tZSByYXRoZXIgc3VkZGVubHksIGR1c3QtY292ZXJlZCBhbmQgc2xpZ2h0bHkgbGVzcyBjb21wb3NlZCB0aGFuIHRoZSB2aWxsYWdlIHJvdXRlIHdvdWxkIGhhdmUgbGVmdCB5b3UsIHRob3VnaCB0aGUgZmFtaWx5IHNlZW1zIG1vcmUgYW11c2VkIHRoYW4gcHV0IG9mZiBieSBpdC4=',
            'choices' => [
                ['text' => 'SW50cm9kdWNlIHlvdXJzZWxmIHByb3Blcmx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhbWlseSdzIG1hdHJpYXJjaCwgRmF0aW1hLCByZWNlaXZlcyB5b3Ugb24gYSBzaGFkZWQgdGVycmFjZSBvdmVybG9va2luZyB0aGUgd2hvbGUgdGVycmFjZWQgdmFsbGV5LCBhbmQgY29uZmlybXMg4oCUIG9uY2UgeW91J3ZlIGV4cGxhaW5lZCB5b3Vyc2VsZiBwcm9wZXJseSDigJQgdGhhdCB5ZXMsIHRoZSBjb21wYXNzIHJvc2UgaXMgcmVhbCwgYW5kIHllcywgaXQncyBoZXJlLCBhbmQgbm8sIGl0IGlzbid0IHNpbXBseSBoZXJzIHRvIGhhbmQgb3Zlci4KCidJdCB3YXMgbXkgZ3JhbmRtb3RoZXIncyB3ZWRkaW5nIGdpZnQsJyBzaGUgc2F5cy4gJ0dpdmVuIGJ5IGEgZm9yZWlnbiBzdXJ2ZXlvciB3aG8gb3dlZCBoZXIgZmFtaWx5IGEgZGVidCBoZSBjb3VsZG4ndCByZXBheSBhbnkgb3RoZXIgd2F5LiBJdCdzIG5vdCBqdXN0IGJyYXNzIHRvIHVzLiBJdCdzIGJlZW4gcGFydCBvZiBldmVyeSB3ZWRkaW5nIGluIHRoaXMgZmFtaWx5IHNpbmNlLicgU2hlIHN0dWRpZXMgeW91IGV2ZW5seS4gJ1lvdSdsbCBuZWVkIHRvIGVhcm4gaXQgcHJvcGVybHksIG5vdCBqdXN0IGFzayBmb3IgaXQuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUgYXJlIHR3byBob25lc3Qgd2F5cyBmb3J3YXJkLCBzaGUgc2F5czogYSBwcm9wZXIsIGZvcm1hbCBuZWdvdGlhdGlvbiwgbWF0Y2hpbmcgdGhlIGRlYnQncyBvcmlnaW5hbCB3ZWlnaHQgd2l0aCBzb21ldGhpbmcgb2YgZ2VudWluZSBjb21wYXJhYmxlIHZhbHVlLCBjb25kdWN0ZWQgd2l0aCBhbGwgdGhlIGNlcmVtb255IHN1Y2ggYSBzZXJpb3VzIGV4Y2hhbmdlIGRlc2VydmVzIOKAlCBvciBzaW1wbHkgc3RheWluZywgd29ya2luZyBhbG9uZ3NpZGUgdGhlIGZhbWlseSBmb3IgYXMgbG9uZyBhcyBpdCB0YWtlcyB0byBiZSB0cnVzdGVkIHdpdGggc29tZXRoaW5nIHRoaXMgc2lnbmlmaWNhbnQsIG5vIGZvcm1hbCB0ZXJtcyBhdHRhY2hlZC4KCidFaXRoZXIgaXMgaG9uZXN0LCcgc2hlIHNheXMuICdPbmx5IHRoZSBlbXB0eSBraW5kIG9mIGFza2luZyBpcyBub3QuJw==',
            'choices' => [
                ['text' => 'UHJvcG9zZSBhIGZvcm1hbCBleGNoYW5nZQ==', 'next' => '5_formal'],
                ['text' => 'T2ZmZXIgdG8gc3RheSBhbmQgd29yaw==', 'next' => '5_work'],
            ],
        ],
        '5_formal' => [
            'prose'  => 'TmVnb3RpYXRpbmcgcHJvcGVybHkgbWVhbnMgdW5kZXJzdGFuZGluZyBleGFjdGx5IHdoYXQgdGhlIGNvbXBhc3Mgcm9zZSBoYXMgbWVhbnQgdG8gdGhpcyBmYW1pbHkgZm9yIGdlbmVyYXRpb25zLCBhbmQgZmluZGluZyBzb21ldGhpbmcgb2YgZ2VudWluZWx5IG1hdGNoaW5nIHdlaWdodCB0byBvZmZlciBpbiByZXR1cm4g4oCUIG5vdCBtb25leSwgd2hpY2ggRmF0aW1hIG1ha2VzIGNsZWFyIGltbWVkaWF0ZWx5IHdvdWxkIGluc3VsdCB0aGUgd2hvbGUgY29udmVyc2F0aW9uLCBidXQgc29tZXRoaW5nIHRoYXQgY2xvc2VzIHRoZSBvcmlnaW5hbCBkZWJ0IGluIHNwaXJpdCBhcyBtdWNoIGFzIHN1YnN0YW5jZS4KCllvdSBzZXR0bGUsIGV2ZW50dWFsbHksIG9uIGEgcHJvbWlzZTogcHJvcGVyIGRvY3VtZW50YXRpb24gb2YgdGhlIGZhbWlseSdzIG93biBoaXN0b3J5IHdpdGggdGhlIHBpZWNlLCBwcm9mZXNzaW9uYWxseSByZWNvcmRlZCBhbmQgcHJlc2VydmVkLCBzbyB0aGUgc3Rvcnkgc3Vydml2ZXMgZXZlbiBvbmNlIHRoZSBvYmplY3QgaXRzZWxmIG1vdmVzIG9uLiBGYXRpbWEgY29uc2lkZXJzIHRoaXMgZm9yIGEgbG9uZyBtb21lbnQgYmVmb3JlIGZpbmFsbHksIGZvcm1hbGx5LCBhZ3JlZWluZy4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBleGNoYW5nZSBjb21wbGV0ZWQ=', 'next' => '6_shared'],
            ],
        ],
        '5_work' => [
            'prose'  => 'U3RheWluZyB0byB3b3JrIG1lYW5zIHJlYWwgZGF5cyBpbiB0aGUgYXJnYW4gZ3JvdmVzIGFuZCB0aGUga2l0Y2hlbiBhbmQgdGhlIHdhdGVyIGNoYW5uZWxzIHRoYXQga2VlcCB0aGUgd2hvbGUgdGVycmFjZWQgdmFsbGV5IGFsaXZlLCBlYXJuaW5nIHRydXN0IHRoZSBzbG93LCB1bmdsYW1vcm91cyB3YXkgcmF0aGVyIHRoYW4gdGhyb3VnaCBhbnkgc2luZ2xlIGdyYW5kIGdlc3R1cmUuIEZhdGltYSB3YXRjaGVzIHlvdSB3b3JrIHdpdGhvdXQgY29tbWVudCBmb3IgdHdvIGZ1bGwgZGF5cyBiZWZvcmUgZmluYWxseSwgb24gdGhlIHRoaXJkLCBpbnZpdGluZyB5b3UgcHJvcGVybHkgdG8gc2l0IHdpdGggdGhlIGZhbWlseSByYXRoZXIgdGhhbiBzaW1wbHkgbmVhciBpdC4KCkJ5IHRoZSBlbmQgb2YgdGhlIHdlZWssIHNvbWV0aGluZydzIHNoaWZ0ZWQg4oCUIG5vdCBhIHRyYW5zYWN0aW9uIGV4YWN0bHksIGp1c3QgYSBnZW51aW5lLCBtdXR1YWwgc2Vuc2UgdGhhdCB5b3UndmUgYWN0dWFsbHkgYmVlbiBwcmVzZW50IHJhdGhlciB0aGFuIG1lcmVseSBwYXNzaW5nIHRocm91Z2gu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBleGNoYW5nZSBjb21wbGV0ZWQ=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgZWFybmVkIGl0LCBGYXRpbWEgYnJpbmdzIG91dCB0aGUgY29tcGFzcyByb3NlIGhlcnNlbGYsIHdyYXBwZWQgaW4gY2xvdGggdGhhdCdzIGNsZWFybHkgYmVlbiB1c2VkIGZvciB0aGlzIGV4YWN0IHB1cnBvc2UgYXQgZXZlcnkgd2VkZGluZyBpdCdzIGF0dGVuZGVkLiBTaGUgaG9sZHMgaXQgYSBsb25nIG1vbWVudCBiZWZvcmUgZmluYWxseSBwbGFjaW5nIGl0IGluIHlvdXIgaGFuZHMuCgonVXNlIGl0IHdlbGwsJyBzaGUgc2F5cywgc2ltcGx5LiAnSXQncyBtZWFudCB0byBoZWxwIHBlb3BsZSBmaW5kIHRoZWlyIHdheSBob21lLiBUaGF0J3MgYWxsIGl0J3MgZXZlciByZWFsbHkgYmVlbiBmb3IsIHdoYXRldmVyIGRlYnQgZmlyc3QgYnJvdWdodCBpdCBpbnRvIHRoaXMgZmFtaWx5LicgVGhlcmUncyByZWFsIGVtb3Rpb24gaW4gaGVyIHZvaWNlLCBjYXJlZnVsbHkgaGVsZCwgdGhlIHdlaWdodCBvZiBsZXR0aW5nIGdvIG9mIHNvbWV0aGluZyBnZW51aW5lbHkgbG92ZWQgcmF0aGVyIHRoYW4gbWVyZWx5IG93bmVkLg==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIHByb3Blcmx5IGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciByb3V0ZSB5b3UgZGlkbid0IHRha2Ugb24gdGhlIHdheSB1cCwgdGhlIHRlcnJhY2VkIHZhbGxleSBnbG93aW5nIGdvbGQgaW4gdGhlIGxhdGUgYWZ0ZXJub29uIGxpZ2h0LCBhcmdhbiB0cmVlcyBjYXN0aW5nIGxvbmcgc2hhZG93cyBhY3Jvc3MgdGhlIHZlcnkgdGVycmFjZXMgdGhlIGZhbWlseSdzIHdob2xlIGxpZmUgaXMgYnVpbHQgYXJvdW5kLiBUaGUgY29tcGFzcyByb3NlIHJpZGVzIHNlY3VyZSBpbiB0aGUgY2FzZSBub3csIGEgZmlmdGggcGllY2UgcmVjb3ZlcmVkLCBhbmQgaGVhdmllciBzb21laG93IHRoYW4gaXRzIGFjdHVhbCB3ZWlnaHQgd291bGQgc3VnZ2VzdC4KCkdyZXRhIHN0dWRpZXMgaXQgaW4gc2lsZW5jZSBmb3IgYSB3aGlsZSBiZWZvcmUgZmluYWxseSBzcGVha2luZy4gJ1RoYXQgd2Fzbid0IGp1c3QgYW4gb2JqZWN0IHRvIGhlciwgd2FzIGl0LicgTm90IHJlYWxseSBhIHF1ZXN0aW9uLg==',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgd2hhdCBpdCBjb3N0IEZhdGltYSB0byBsZXQgaXQgZ28=', 'next' => '8_end_tell'],
                ['text' => 'U2ltcGx5IGNvbmZpcm0gaXQsIHdpdGhvdXQgZWxhYm9yYXRpbmc=', 'next' => '8_end_confirm'],
            ],
        ],
        '8_end_tell' => [
            'prose'  => 'WW91IHRlbGwgaGVyIOKAlCB0aGUgd2VkZGluZyB0cmFkaXRpb24sIHRoZSBnZW5lcmF0aW9ucyBvZiBicmlkZXMgd2hvJ2QgaGVsZCB0aGlzIGV4YWN0IHBpZWNlLCB0aGUgcmVhbCBjb3N0IG9mIGxldHRpbmcgc29tZXRoaW5nIGxpa2UgdGhhdCBsZWF2ZSBhIGZhbWlseSBmb3IgZ29vZC4gR3JldGEgbGlzdGVucyBhbGwgdGhlIHdheSB0aHJvdWdoLCBxdWlldCBpbiBhIHdheSB0aGF0IGlzbid0IGhlciB1c3VhbCBicmlzayBlY29ub215LgoKJ1RoZW4gd2UnZCBiZXR0ZXIgbWFrZSBzdXJlIGl0J3Mgd29ydGggd2hhdCBzaGUgZ2F2ZSB1cCwnIHNoZSBzYXlzIGZpbmFsbHkuICdGaW5pc2ggdGhpcyBwcm9wZXJseS4gRm9yIGhlciBzYWtlIGFzIG11Y2ggYXMgaGlzLicgSXQncyB0aGUgbW9zdCBpbnZlc3RlZCBpbiB0aGUgYWN0dWFsIG1pc3Npb24geW91J3ZlIGhlYXJkIGhlciBzb3VuZCB0aGUgd2hvbGUgdHJpcCwgYW5kIGl0IGxhbmRzIHdpdGggcmVhbCB3ZWlnaHQu',
            'ending' => true,
        ],
        '8_end_confirm' => [
            'prose'  => 'WW91IHNpbXBseSBjb25maXJtIGl0LCB3aXRob3V0IGVsYWJvcmF0aW5nIGZ1cnRoZXIsIGRlY2lkaW5nIHRoZSB3ZWlnaHQgb2Ygd2hhdCBGYXRpbWEgZ2F2ZSB1cCBiZWxvbmdzIHRvIGhlciBzdG9yeSBtb3JlIHRoYW4geW91cnMgdG8gcmV0ZWxsIGluIGRldGFpbC4KClRoZSBDb250b3VyIGxpZnRzIG9mZiB0aGUgdGVycmFjZWQgdmFsbGV5IGFzIHRoZSBsaWdodCBnb2VzIHByb3Blcmx5IGdvbGQsIGFyZ2FuIGdyb3ZlcyBhbmQga2FzYmFoIHdhbGxzIHNocmlua2luZyB0b2dldGhlciBpbnRvIGp1c3Qgb25lIG1vcmUgYmVhdXRpZnVsIHBsYWNlIHlvdSdyZSBsZWF2aW5nIHJpY2hlciB0aGFuIHlvdSBmb3VuZCBpdCwgYW5kIHBvb3JlciwgaW4gb25lIHZlcnkgc3BlY2lmaWMsIHZlcnkgcmVhbCB3YXksIHRoYW4gaXQgd2FzIGJlZm9yZSB5b3UgYXJyaXZlZC4=',
            'ending' => true,
        ],
    ],
];
