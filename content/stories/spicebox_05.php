<?php
return [
    'id'    => 5,
    'title' => 'Not Simple At All',
    'color' => '#8A6A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'WmFuemliYXIncyBjbG92ZSBwbGFudGF0aW9ucyBzdHJldGNoIGlubGFuZCBmcm9tIHRoZSBjb2FzdCBpbiBnZW51aW5lLCBmcmFncmFudCBhYnVuZGFuY2UsIHRoZSB3aG9sZSBpc2xhbmQncyBoaXN0b3J5IGJvdW5kIHVwIGluIGEgc2luZ2xlIHNtYWxsIGRyaWVkIGZsb3dlciBidWQgdGhhdCBvbmNlIG1hZGUgaXQgd29ydGggZmlnaHRpbmcgb3Zlci4gQnJ1bm8gYnJlYXRoZXMgdGhlIGFpciBkZWVwbHkgdGhlIG1vbWVudCB5b3Ugc3RlcCBvZmYgdGhlIGJvYXQsIHZpc2libHkgZGVsaWdodGVkLgoKVHdvIHBhdGhzIHRvd2FyZCB0aGUgcGxhbnRhdGlvbiBmYW1pbHkgcHJlc2VudCB0aGVtc2VsdmVzOiB0aHJvdWdoIHRoZSBvbGRlciwgZXN0YWJsaXNoZWQgZ3JvdmVzIGNsb3NlIHRvIHRoZSBjb2FzdCByb2FkLCBvciBhIGxvbmdlciBpbmxhbmQgdHJhY2sgcGFzdCBzbWFsbGVyLCBuZXdlciBwbGFudGluZ3Mu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgY29hc3RhbCBncm92ZSBwYXRo', 'next' => '2_coastal'],
                ['text' => 'Rm9sbG93IHRoZSBpbmxhbmQgdHJhY2s=', 'next' => '2_inland'],
            ],
        ],
        '2_coastal' => [
            'prose'  => 'VGhlIGNvYXN0YWwgZ3JvdmVzIGFyZSBvbGQsIGVzdGFibGlzaGVkLCBjbG92ZSB0cmVlcyB0b3dlcmluZyB3aXRoIHRoZSBxdWlldCBjb25maWRlbmNlIG9mIGEgY2VudHVyeSBvciBtb3JlIG9mIGNhcmVmdWwgY3VsdGl2YXRpb24uIFdvcmtlcnMgbW92ZSBiZXR3ZWVuIHRoZSByb3dzIHdpdGggcHJhY3Rpc2VkIGVhc2UsIHRoZSB3aG9sZSBzY2VuZSBodW1taW5nIHdpdGggYSByaHl0aG0gdGhhdCdzIGNsZWFybHkgYmVlbiByZWZpbmVkIG92ZXIgZ2VuZXJhdGlvbnMuCgpZb3UgYXJyaXZlIGF0IHRoZSBmYW1pbHkncyBtYWluIGhvdXNlIHByb3Blcmx5IGltcHJlc3NlZCBieSB0aGUgc2hlZXIgbWF0dXJpdHkgb2YgdGhlIG9wZXJhdGlvbi4=',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '2_inland' => [
            'prose'  => 'VGhlIGlubGFuZCB0cmFjayB3aW5kcyBwYXN0IHlvdW5nZXIgcGxhbnRpbmdzLCB0cmVlcyBzdGlsbCBmaW5kaW5nIHRoZWlyIGZ1bGwgaGVpZ2h0LCB0aGUgd2hvbGUgYXJlYSBmZWVsaW5nIG1vcmUgbGlrZSBhIGxpdmluZyBleHBlcmltZW50IHRoYW4gdGhlIGNvYXN0YWwgZ3JvdmVzJyBzZXR0bGVkIGNlcnRhaW50eS4gSXQncyBhIGxvbmdlciB3YWxrLCBidXQgZ2l2ZXMgeW91IGEgcmVhbCBzZW5zZSBvZiBob3cgdGhlIHBsYW50YXRpb24gYWN0dWFsbHkgZ3Jvd3MgYW5kIGNoYW5nZXMgb3ZlciB0aW1lLgoKWW91IGFycml2ZSBhdCB0aGUgZmFtaWx5J3MgbWFpbiBob3VzZSB3aXRoIGEgZ2VudWluZSBhcHByZWNpYXRpb24gZm9yIHRoZSB3aG9sZSBvcGVyYXRpb24ncyBvbmdvaW5nIGV2b2x1dGlvbi4=',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHBsYW50YXRpb24gZmFtaWx5LCB0aGUgSGFpZGFyaXMsIHdlbGNvbWUgeW91IHdpdGggcmVhbCB3YXJtdGggb25jZSB5b3VyIGVycmFuZCdzIGV4cGxhaW5lZCwgdGhlIGZhbWlseSBtYXRyaWFyY2gsIEFtaW5hLCByZWNvZ25pc2luZyBJcmlzJ3MgbmFtZSBpbW1lZGlhdGVseS4gJ1NoZSBjYW1lIGZvciB0aGUgdGltaW5nIGxlc3NvbiB0b28sJyBBbWluYSBzYXlzLiAnRXZlcnlvbmUgdGhpbmtzIGNsb3ZlcyBhcmUgc2ltcGxlLiBQaWNrIHRoZSBidWQsIGRyeSBpdCwgZG9uZS4gSXQncyBub3Qgc2ltcGxlIGF0IGFsbCwgaWYgeW91IGFjdHVhbGx5IHdhbnQgaXQgZG9uZSBwcm9wZXJseS4nCgpTaGUgc3R1ZGllcyB5b3UuICdJJ2xsIHRlYWNoIHlvdSB0aGUgdGltaW5nIG15c2VsZiwgaWYgeW91J3JlIHdpbGxpbmcgdG8gYWN0dWFsbHkgbGVhcm4gaXQgcmF0aGVyIHRoYW4ganVzdCB3YXRjaC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgbGVhcm5pbmcgaXQgbWVhbnM=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'QW1pbmEgZXhwbGFpbnM6IHRoZSBidWRzIG11c3QgYmUgcGlja2VkIGF0IGV4YWN0bHkgdGhlIHJpZ2h0IG1vbWVudCwganVzdCBiZWZvcmUgdGhleSdkIG90aGVyd2lzZSBmbG93ZXIsIGFuZCB0aGVyZSBhcmUgdHdvIHdheXMgdG8gYWN0dWFsbHkgbGVhcm4gdGhhdCB0aW1pbmcgcHJvcGVybHkg4oCUIHNwZW5kIGEgZnVsbCBtb3JuaW5nIGluIHRoZSBncm92ZXMgbGVhcm5pbmcgdG8gcmVhZCB0aGUgYnVkcycgc3VidGxlIGNvbG91ciBjaGFuZ2VzIGRpcmVjdGx5LCBvciB3b3JrIHRoZSBkcnlpbmcgcmFja3MgZmlyc3QsIGxlYXJuaW5nIHRvIHJlY29nbmlzZSBwcm9wZXJseSBmaW5pc2hlZCBjbG92ZXMgYnkgZmVlbCBhbmQgc2NlbnQsIHRoZW4gd29yayBiYWNrd2FyZCB0byB1bmRlcnN0YW5kIHRoZSBwaWNraW5nIHdpbmRvdy4KCidFaXRoZXIgdGVhY2hlcyB0aGUgc2FtZSBsZXNzb24sIGV2ZW50dWFsbHksJyBzaGUgc2F5cy4gJ0Zyb250IG9mIHRoZSBwcm9jZXNzIG9yIGJhY2sgb2YgaXQuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'TGVhcm4gdG8gcmVhZCB0aGUgYnVkcyBpbiB0aGUgZ3JvdmVz', 'next' => '5_groves'],
                ['text' => 'U3RhcnQgd2l0aCB0aGUgZHJ5aW5nIHJhY2tzIGluc3RlYWQ=', 'next' => '5_racks'],
            ],
        ],
        '5_groves' => [
            'prose'  => 'TGVhcm5pbmcgdG8gcmVhZCB0aGUgYnVkcyBkaXJlY3RseSBtZWFucyByZWFsLCBwYXRpZW50IG9ic2VydmF0aW9uLCBzdWJ0bGUgc2hpZnRzIGluIGNvbG91ciBhbmQgZmlybW5lc3MgdGhhdCBtZWFuIGV2ZXJ5dGhpbmcgdG8gdGhlIHRpbWluZyBhbmQgbm90aGluZyB0byBhbiB1bnRyYWluZWQgZXllLiBBbWluYSBjb3JyZWN0cyB5b3VyIHNlbGVjdGlvbnMgY29uc3RhbnRseSwgZ2VudGx5LCB1bnRpbCB5b3VyIG93biBzZW5zZSBvZiBpdCBmaW5hbGx5IHN0YXJ0cyB0byBzaGFycGVuLgoKQnkgdGhlIGVuZCBvZiB0aGUgbW9ybmluZywgeW91IGNhbiBwaWNrIGEgcHJvcGVybHktdGltZWQgYnVkIGNvcnJlY3RseSBtb3JlIG9mdGVuIHRoYW4gbm90Lg==',
            'choices' => [
                ['text' => 'U2VlIHRoZSBwcm9jZXNzIHRocm91Z2ggdG8gZHJ5aW5n', 'next' => '6_shared'],
            ],
        ],
        '5_racks' => [
            'prose'  => 'U3RhcnRpbmcgd2l0aCB0aGUgZHJ5aW5nIHJhY2tzIG1lYW5zIGxlYXJuaW5nIGJhY2t3YXJkLCBleGFtaW5pbmcgcHJvcGVybHkgZmluaXNoZWQgY2xvdmVzIGZvciB0aGUgc3BlY2lmaWMgY29sb3VyIGFuZCB0ZXh0dXJlIHRoYXQgdGltaW5nIHByb2R1Y2VzLCB0aGVuIHdvcmtpbmcgeW91ciB3YXkgYmFjayB0byB1bmRlcnN0YW5kIGV4YWN0bHkgd2hhdCBjb25kaXRpb25zIGluIHRoZSBncm92ZSB3b3VsZCBoYXZlIHByb2R1Y2VkIHRoaXMgcGFydGljdWxhciByZXN1bHQuCgpCeSB0aGUgZW5kIG9mIHRoZSBtb3JuaW5nLCB5b3UgdW5kZXJzdGFuZCB0aGUgd2hvbGUgcHJvY2VzcydzIGxvZ2ljIGV2ZW4gYmVmb3JlIHlvdSd2ZSBwaWNrZWQgYSBzaW5nbGUgYnVkIHlvdXJzZWxmLg==',
            'choices' => [
                ['text' => 'U2VlIHRoZSBwcm9jZXNzIHRocm91Z2ggdG8gZHJ5aW5n', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB5b3UgbGVhcm5lZCBpdCwgeW91IGhlbHAgYnJpbmcgaW4gYW5kIHByb3Blcmx5IGRyeSBhIGZyZXNoIGJhdGNoIGJ5IGRheSdzIGVuZCwgdGhlIHdob2xlIHBsYW50YXRpb24ncyBhaXIgdGhpY2sgd2l0aCB0aGUgc3BlY2lmaWMgd2FybS1zaGFycCBzbWVsbCBvZiBjbG92ZXMgY3VyaW5nIGluIHRoZSBzdW4uIEFtaW5hIGluc3BlY3RzIHRoZSBmaW5pc2hlZCBiYXRjaCB3aXRoIHJlYWwgc2F0aXNmYWN0aW9uLgoKJ0dvb2QgdGltaW5nLCcgc2hlIHNheXMuICdZb3UgYWN0dWFsbHkgbGVhcm5lZCBpdCwgbm90IGp1c3Qgd2F0Y2hlZCBpdCBoYXBwZW4uIFRoYXQgbWF0dGVycywgZm9yIHNvbWV0aGluZyB0aGlzIGVhc3kgdG8gZ2V0IHdyb25nLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0b3dhcmQgdGhlIGNvYXN0IHdpdGggdGhlIGNsb3ZlcyBzZWN1cmUgaW4gdGhlaXIgcGFwZXIgd3JhcCwgWmFuemliYXIncyBwbGFudGF0aW9uIGFpciBzdGlsbCBjbGluZ2luZyBmYWludGx5IHRvIHlvdXIgY2xvdGhlcywgdGhlIGRheSdzIGNhcmVmdWwgbGVzc29uIHNldHRsaW5nIGluIGFsb25nc2lkZSB0aGUgc3BpY2UgaXRzZWxmLgoKQnJ1bm8gYnJlYXRoZXMgaW4gdGhlIGJhdGNoJ3Mgc2hhcnAgd2FybXRoIHdpdGggcmVhbCBhcHByZWNpYXRpb24uICdQcm9wZXIgY2xvdmVzLCB0aGF0LiBZb3UgY2FuIGFsd2F5cyB0ZWxsIHRoZSBkaWZmZXJlbmNlLCBvbmNlIHlvdSd2ZSBhY3R1YWxseSBsZWFybmVkIHdoYXQgdG8gbG9vayBmb3IuJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSdsbCBuZXZlciBsb29rIGF0IGNsb3ZlcyB0aGUgc2FtZSB3YXkgYWdhaW4=', 'next' => '8_end_never'],
                ['text' => 'U2F5IHlvdSdyZSBnbGFkIHlvdSBhY3R1YWxseSB0b29rIHRoZSB0aW1lIHRvIGxlYXJuIGl0', 'next' => '8_end_glad'],
            ],
        ],
        '8_end_never' => [
            'prose'  => 'J0knbGwgZ2VudWluZWx5IG5ldmVyIGxvb2sgYXQgY2xvdmVzIHRoZSBzYW1lIHdheSBhZ2FpbiwnIHlvdSBzYXksIGFuZCBtZWFuIGl0IOKAlCBhIHNwaWNlIHlvdSdkIGhhdmUgb25jZSBib3VnaHQgd2l0aG91dCBhIHNlY29uZCB0aG91Z2h0IG5vdyBjYXJyaWVzIGEgd2hvbGUgbW9ybmluZydzIHdvcnRoIG9mIGNhcmVmdWwsIGhhcmQtd29uIHVuZGVyc3RhbmRpbmcgYmVoaW5kIGl0LgoKQnJ1bm8gZ3JpbnMuICdUaGF0J3MgcmF0aGVyIHRoZSB3aG9sZSBwb2ludCBvZiB0aGlzIHRyaXAsIGlzbid0IGl0LiBOb3RoaW5nIGxvb2tzIHNpbXBsZSBhbnltb3JlLCBvbmNlIHlvdSd2ZSBhY3R1YWxseSBzZWVuIHRoZSB3b3JrIGJlaGluZCBpdC4n',
            'ending' => true,
        ],
        '8_end_glad' => [
            'prose'  => 'J0knbSBnbGFkIEkgYWN0dWFsbHkgdG9vayB0aGUgdGltZSB0byBsZWFybiBpdCBwcm9wZXJseSwnIHlvdSBzYXksIHRoaW5raW5nIG9mIGhvdyBlYXNpbHkgeW91IGNvdWxkIGhhdmUgc2ltcGx5IGFza2VkIHRvIGJ1eSBhIGphciBhbmQgbW92ZWQgb24uICdGZWVscyBsaWtlIGl0IG1lYW5zIHNvbWV0aGluZyBkaWZmZXJlbnQgbm93LCBoYXZpbmcgZWFybmVkIHRoZSB1bmRlcnN0YW5kaW5nIHJhdGhlciB0aGFuIGp1c3QgdGhlIHNwaWNlLicKCkJydW5vIG5vZHMsIHF1aWV0bHkgcGxlYXNlZC4gJ1RoYXQncyBleGFjdGx5IHRoZSBkaWZmZXJlbmNlIHlvdXIgZ3JhbmRtb3RoZXIgYWx3YXlzIHRyaWVkIHRvIHRlYWNoIG1lLCBhbGwgdGhvc2UgeWVhcnMgYWdvLiBUb29rIG1lIGEgd2hpbGUgdG8gYWN0dWFsbHkgdW5kZXJzdGFuZCBpdCBteXNlbGYuJw==',
            'ending' => true,
        ],
    ],
];
