<?php
return [
    'id'    => 9,
    'title' => 'Not Ever Going to Matter',
    'color' => '#4A7A7A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QXN0cmFraGFuIHNpdHMgd2hlcmUgdGhlIFZvbGdhIGZpbmFsbHkgc3VycmVuZGVycyBpdHNlbGYgdG8gdGhlIENhc3BpYW4sIGEgZ2VudWluZSBjcm9zc3JvYWRzIG9mIHJpdmVyIGFuZCBzZWEgdHJhZGUsIHN0dXJnZW9uIGJvYXRzIGFuZCBtZXJjaGFudCB2ZXNzZWxzIGNyb3dkaW5nIGEgaGFyYm91ciB0aGF0J3MgY2xlYXJseSBzZWVuIGV2ZXJ5IGtpbmQgb2YgY2FyZ28gaW1hZ2luYWJsZSBwYXNzIHRocm91Z2ggaXQuIFRvbWFzIG5hdmlnYXRlcyB0aGUgZG9ja3Mgd2l0aCByZWFsLCBwcmFjdGlzZWQgZWFzZS4KClR3byByaXZlci1hcHByb2FjaCByb3V0ZXMgdG93YXJkIHRoZSB0cmFkaW5nIGZhbWlseSBwcmVzZW50IHRoZW1zZWx2ZXM6IGFsb25nIHRoZSBtYWluIHF1YXksIGJ1c3kgYW5kIGRpcmVjdCwgb3IgYSBxdWlldGVyIHJvdXRlIHRocm91Z2ggdGhlIGZpc2hpbmcgYm9hdHMsIHNsb3dlciBidXQgY29uc2lkZXJhYmx5IGxlc3MgY3Jvd2RlZC4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbiBxdWF5', 'next' => '2_quay'],
                ['text' => 'R28gYnkgd2F5IG9mIHRoZSBmaXNoaW5nIGJvYXRz', 'next' => '2_fishing'],
            ],
        ],
        '2_quay' => [
            'prose'  => 'VGhlIG1haW4gcXVheSBpcyBsb3VkLCBidXN5LCBnZW51aW5lbHkgY2hhb3RpYyB3aXRoIGNhcmdvIGJlaW5nIGxvYWRlZCBhbmQgdW5sb2FkZWQgaW4gZXZlcnkgZGlyZWN0aW9uLCBtZXJjaGFudHMgYW5kIGRvY2toYW5kcyBjYWxsaW5nIG91dCBvdmVyIGVhY2ggb3RoZXIgaW4gYSBkb3plbiBsYW5ndWFnZXMuIFlvdSBuYXZpZ2F0ZSBpdCBxdWlja2x5LCBhc2tpbmcgZGlyZWN0aW9ucyB0d2ljZSBiZWZvcmUgZmluYWxseSByZWFjaGluZyB0aGUgZmFtaWx5J3Mgd2FyZWhvdXNlLgoKJ0J1c3kgc2Vhc29uLCcgVG9tYXMgc2F5cywgdW5uZWNlc3NhcmlseSwgd2lwaW5nIHN3ZWF0IGZyb20gaGlzIGJyb3cu',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHdhcmVob3VzZQ==', 'next' => '3_shared'],
            ],
        ],
        '2_fishing' => [
            'prose'  => 'VGhlIGZpc2hpbmctYm9hdCByb3V0ZSB3aW5kcyBhbG9uZyBhIHF1aWV0ZXIgc3RyZXRjaCBvZiBkb2NrLCBzdHVyZ2VvbiBib2F0cyBib2JiaW5nIGdlbnRseSwgZmlzaGVybWVuIG1lbmRpbmcgbmV0cyB3aXRoIHRoZSB1bmh1cnJpZWQgcGF0aWVuY2Ugb2YgcGVvcGxlIHdob3NlIHdvcmsgZGVwZW5kcyBvbiB0aWRlcyByYXRoZXIgdGhhbiBzY2hlZHVsZXMuIEl0J3MgYSBzbG93ZXIgYXBwcm9hY2gsIGJ1dCBhIGNvbnNpZGVyYWJseSBjYWxtZXIgb25lLgoKWW91IGFycml2ZSBhdCB0aGUgd2FyZWhvdXNlIHJlbGF4ZWQsIGFuZCB3aXRoIGEgZ2VudWluZSBhcHByZWNpYXRpb24gZm9yIHRoZSByaXZlcidzIHF1aWV0ZXIgd29ya2luZyByaHl0aG1zLg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIHdhcmVob3VzZQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHdhcmVob3VzZSBiZWxvbmdzIHRvIHRoZSBWb2xrb3YgZmFtaWx5LCByaXZlci10cmFkZXJzIGZvciBnZW5lcmF0aW9ucywgYW5kIHRoZSBtb21lbnQgeW91IGludHJvZHVjZSB5b3Vyc2VsZiwgdGhlIGZhbWlseSdzIG1hdHJpYXJjaCwgSXJpbmEsIGxhdWdocyDigJQgbm90IHVua2luZGx5LCBidXQgd2l0aCByZWFsLCBldmlkZW50IGFtdXNlbWVudC4gJ1lvdSdyZSB0aGUgc2Vjb25kIHBlcnNvbiB0aGlzIG1vbnRoIGFza2luZyBhZnRlciB0aGF0IHdlZGdlLiBUaGUgZmlyc3Qgb25lLCBiaWcgZmVsbG93LCB2ZXJ5IGluc2lzdGVudCwgdHJpZWQgdG8gc2ltcGx5IGJ1eSBpdCBvdXRyaWdodCwgbm8gcXVlc3Rpb25zLCBubyBzdG9yeS4gV2UgdHVybmVkIGhpbSBhd2F5LiBNb25leSBhbG9uZSdzIG5ldmVyIGJlZW4gdGhlIGFjdHVhbCBwb2ludC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgdGhlIGFjdHVhbCBwb2ludCBpcw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SXJpbmEgZXhwbGFpbnM6IHRoZSB3ZWRnZSBjYW1lIGludG8gaGVyIGZhbWlseSdzIGtlZXBpbmcgYXMgcGFydCBvZiBhIGdlbnVpbmUgZnJpZW5kc2hpcCB3aXRoIFlzb2xkZSwgYnVpbHQgb3ZlciB5ZWFycyBvZiBob25lc3Qgcml2ZXIgdHJhZGUsIGFuZCBzaGUgd29uJ3Qgc2ltcGx5IHNlbGwgc29tZXRoaW5nIHRoYXQgcmVwcmVzZW50cyBhbiBhY3R1YWwgcmVsYXRpb25zaGlwIHRvIHdob2V2ZXIgb2ZmZXJzIHRoZSBtb3N0IG1vbmV5LiBTaGUgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3ZlIHlvdSdyZSBkaWZmZXJlbnQgZnJvbSBCZXJrYW50OiBzaGFyZSBhIHJlYWwgc3RvcnkgYWJvdXQgWXNvbGRlIHRoYXQgb25seSBzb21lb25lIHdobydkIGFjdHVhbGx5IGRvbmUgdGhlIHdvcmsgb2YgbGVhcm5pbmcgaGVyIGhpc3Rvcnkgd291bGQga25vdywgb3Igc3BlbmQgYSBkYXkgd29ya2luZyB0aGUgcml2ZXIgdHJhZGUgcHJvcGVybHksIGxlYXJuaW5nIGl0IHRoZSB3YXkgaGVyIG93biBmYW1pbHkgbGVhcm5lZCBpdC4KCidFaXRoZXIgc2hvd3MgbWUgeW91J3JlIGhlcmUgZm9yIHRoZSByaWdodCByZWFzb25zLCcgc2hlIHNheXMuICdNb25leSBhbG9uZSBuZXZlciBoYXMgYmVlbiwgYW5kIG5ldmVyIHdpbGwgYmUuJw==',
            'choices' => [
                ['text' => 'U2hhcmUgd2hhdCB5b3UndmUgbGVhcm5lZCBhYm91dCBZc29sZGU=', 'next' => '5_share'],
                ['text' => 'U3BlbmQgYSBkYXkgd29ya2luZyB0aGUgcml2ZXIgdHJhZGU=', 'next' => '5_work'],
            ],
        ],
        '5_share' => [
            'prose'  => 'WW91IHNoYXJlIGV2ZXJ5dGhpbmcgeW91J3ZlIGFjdHVhbGx5IGxlYXJuZWQgdGhpcyB3aG9sZSBqb3VybmV5IOKAlCB0aGUgcnVpbmVkIGhvdXNlLCB0aGUgc2V0dGxlZCBkZWJ0cywgUmFoaW1pJ3MgbGV0dGVyLCBBbWFuJ3MgdGhyZWUgZ2VuZXJhdGlvbnMgb2YgcGF0aWVudCBrZWVwaW5nLCBFbGRlciBUdXJzdW4ncyBwcm92ZXJiLiBJcmluYSBsaXN0ZW5zIHdpdGggcmVhbCwgZ3Jvd2luZyB3YXJtdGgsIHJlY29nbmlzaW5nIGEgc3RvcnkgdGhhdCBjb3VsZG4ndCBwb3NzaWJseSBoYXZlIGJlZW4gYm91Z2h0IG9yIGZha2VkLgoKJ1RoYXQncyBoZXIsIGFsbCByaWdodCwnIHNoZSBzYXlzIHNvZnRseSwgd2hlbiB5b3UgZmluaXNoLiAnVGhhdCdzIGV4YWN0bHkgdGhlIGtpbmQgb2YgdHJhaWwgc2hlJ2QgbGVhdmUgYmVoaW5kIGhlci4n',
            'choices' => [
                ['text' => 'U2VlIGhlciBkZWNpc2lvbg==', 'next' => '6_shared'],
            ],
        ],
        '5_work' => [
            'prose'  => 'V29ya2luZyB0aGUgcml2ZXIgdHJhZGUgZm9yIGEgZGF5IG1lYW5zIHJlYWwsIHByYWN0aWNhbCBsYWJvdXIg4oCUIGxvYWRpbmcgY2FyZ28sIGNoZWNraW5nIG1hbmlmZXN0cywgbGVhcm5pbmcgdGhlIHNwZWNpZmljIHJoeXRobXMgb2YgYSBidXNpbmVzcyB0aGF0J3MgcnVuIG9uIHRoZSBWb2xnYSdzIG93biBzY2hlZHVsZSBmb3IgZ2VuZXJhdGlvbnMuIElyaW5hJ3MgZmFtaWx5IHdvcmtzIGFsb25nc2lkZSB5b3Ugd2l0aCBnZW51aW5lLCB3YXJtaW5nIGNhbWFyYWRlcmllLCBjb3JyZWN0aW5nIHlvdXIgdGVjaG5pcXVlIHdpdGhvdXQgbXVjaCBjZXJlbW9ueS4KCkJ5IHRoZSBlbmQgb2YgdGhlIGRheSwgeW91J3JlIGV4aGF1c3RlZCwgYW5kIGdlbnVpbmVseSwgd2FybWx5IHdlbGNvbWVkIGFzIHNvbWV0aGluZyBjbG9zZXIgdG8gZmFtaWx5IHRoYW4gbWVyZSBidXNpbmVzcy4=',
            'choices' => [
                ['text' => 'U2VlIGhlciBkZWNpc2lvbg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SXJpbmEgYnJpbmdzIG91dCB0aGUgd2VkZ2UgaGVyc2VsZiwgc2F0aXNmaWVkIGVpdGhlciB3YXksIGFuZCBwbGFjZXMgaXQgaW4geW91ciBoYW5kcyB3aXRoIHJlYWwgd2FybXRoLiAnWW91ciBjb21wZXRpdG9yIG9mZmVyZWQgdGhyZWUgdGltZXMgd2hhdCB0aGlzIGlzIHdvcnRoIGluIGNvaW4sJyBzaGUgc2F5cy4gJ1dhc24ndCBldmVyIGdvaW5nIHRvIG1hdHRlci4gU29tZSB0aGluZ3MgYXJlbid0IGZvciBzYWxlLCBvbmx5IGZvciBlYXJuaW5nIHByb3Blcmx5LicKClNoZSBzdHVkaWVzIHlvdSBhIG1vbWVudC4gJ0hlJ2xsIGtlZXAgdHJ5aW5nLCB0aGF0IG9uZS4gRm9sbG93aW5nIHRoZSBzYW1lIHJvdXRlLCBwcm9iYWJseSwgaG9waW5nIG1vbmV5IHdvcmtzIGJldHRlciBuZXh0IHRpbWUuIEl0IHdvbid0LiBXb3JkIHRyYXZlbHMgb24gdGhpcyByaXZlciBmYXN0ZXIgdGhhbiBhbnkgY2FyYXZhbi4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIEFzdHJha2hhbidzIGJ1c3kgaGFyYm91ciBjYXRjaGluZyB0aGUgbGFzdCBvZiB0aGUgZGF5J3MgbGlnaHQsIHN0dXJnZW9uIGJvYXRzIGFuZCBtZXJjaGFudCB2ZXNzZWxzIHNldHRsaW5nIGludG8gZXZlbmluZyBxdWlldCBhcm91bmQgdGhlIGRlbHRhLiBUb21hcywgaGVhcmluZyBhYm91dCBCZXJrYW50J3MgZmFpbGVkIGF0dGVtcHQsIGxvb2tzIGdlbnVpbmVseSBzYXRpc2ZpZWQuCgonR29vZCwnIGhlIHNheXMuICdMZXQgaGltIGxlYXJuIHRoYXQgbGVzc29uIGVhcmx5LiBNb25leSdzIG5ldmVyIGJlZW4gd2hhdCB0aGlzIHJvdXRlIGFjdHVhbGx5IHJ1bnMgb24sIHdoYXRldmVyIGhlJ3MgZGVjaWRlZCB0byBiZWxpZXZlLic=',
            'choices' => [
                ['text' => 'V29uZGVyIGlmIEJlcmthbnQgd2lsbCBldmVyIGFjdHVhbGx5IGxlYXJuIHRoYXQ=', 'next' => '8_end_wonder'],
                ['text' => 'SnVzdCBiZSBnbGFkIHlvdSBnb3QgdGhlcmUgZmlyc3QgdGhpcyB0aW1l', 'next' => '8_end_first'],
            ],
        ],
        '8_end_wonder' => [
            'prose'  => 'WW91IHdvbmRlciBhbG91ZCB3aGV0aGVyIEJlcmthbnQgd2lsbCBldmVyIGFjdHVhbGx5IGxlYXJuIHRoZSBsZXNzb24sIG9yIHdoZXRoZXIgaGUnbGwganVzdCBrZWVwIHRyeWluZyB0aGUgc2FtZSBmYWlsZWQgYXBwcm9hY2ggYXQgZXZlcnkgcmVtYWluaW5nIHN0b3AuIFRvbWFzIGNvbnNpZGVycyBpdCBzZXJpb3VzbHkuCgonSGFyZCB0byBzYXkuIFNvbWUgcGVvcGxlIGxlYXJuIHNsb3cuIFNvbWUgbmV2ZXIgZG8uIEVpdGhlciB3YXksIGl0J3Mgbm90IHJlYWxseSB5b3VyIGpvYiB0byB0ZWFjaCBoaW0g4oCUIGp1c3QgdG8ga2VlcCBkb2luZyB0aGlzIHByb3Blcmx5IHlvdXJzZWxmLCBhbmQgbGV0IHRoZSBkaWZmZXJlbmNlIHNwZWFrIGZvciBpdHNlbGYsIHNhbWUgYXMgaXQgZGlkIHRvZGF5Lic=',
            'ending' => true,
        ],
        '8_end_first' => [
            'prose'  => 'WW91IGxldCB5b3Vyc2VsZiBzaW1wbHkgYmUgZ2xhZCB5b3UgZ290IHRoZXJlIGZpcnN0IHRoaXMgdGltZSwgd2l0aG91dCBpbW1lZGlhdGVseSB3b3JyeWluZyBvdmVyIHdoYXQgQmVya2FudCBtaWdodCB0cnkgbmV4dC4gT25lIGZhbWlseSdzIHRydXN0IGVhcm5lZCBwcm9wZXJseSwgb25lIHdlZGdlIGNsb3NlciB0byBhIGRlYnQgdGhyZWUgZ2VuZXJhdGlvbnMgb3ZlcmR1ZS4KClRoZSBjYXJhdmFuIG1vdmVzIG9uIGZyb20gQXN0cmFraGFuIGFzIHRoZSBWb2xnYSBkZWx0YSBmYWRlcyBpbnRvIGV2ZW5pbmcgYmVoaW5kIHlvdSwgYW5kIHlvdSBmaW5kIHRoZSB3aG9sZSByaXZhbHJ5IHdpdGggQmVya2FudCBzaXR0aW5nIGEgbGl0dGxlIGxpZ2h0ZXIgaW4geW91IHRoYW4gaXQgZGlkIHllc3RlcmRheSDigJQgbm90IHJlc29sdmVkLCBidXQgYXQgbGVhc3QsIGZvciB0b2RheSwgcHJvcGVybHkgb3V0cGFjZWQu',
            'ending' => true,
        ],
    ],
];
