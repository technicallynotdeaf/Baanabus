<?php
return [
    'id'    => 6,
    'title' => 'Exactly Where You Needed to Be',
    'color' => '#3A7A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'S2VyYWxhJ3MgaGlsbHMgcm9sbCBncmVlbiBhbmQgc3RlZXAsIHBlcHBlciB2aW5lcyBjbGltYmluZyB0YWxsIHN1cHBvcnQgdHJlZXMgaW4gZGVuc2UgdGFuZ2xlcyB3aGlsZSBjYXJkYW1vbSBncm93cyBsb3dlciBpbiB0aGUgc2hhZGVkIHVuZGVyc3RvcmV5LCB0aGUgd2hvbGUgbGFuZHNjYXBlIHRoaWNrIHdpdGggdGhlIHBhcnRpY3VsYXIgZGFtcCB3YXJtdGggdGhhdCBtYWtlcyB0aGlzIGNvYXN0IGZhbW91cyBmb3Igc3BpY2UuIEJydW5vIGNoZWNrcyB0aGUgc2t5IHdpdGggcmVhbCBjb25jZXJuLiAnUmFpbnMgYXJlIGNvbWluZyBlYXJseSB0b2RheS4gV2UnbGwgb25seSBtYW5hZ2Ugb25lIGVzdGF0ZSBiZWZvcmUgdGhlIHJvYWRzIGNsb3NlLicKClR3byBlc3RhdGVzIHByZXNlbnQgdGhlbXNlbHZlczogdGhlIHBlcHBlciB2aW5lIHRlcnJhY2VzIGhpZ2hlciB1cCB0aGUgc2xvcGUsIG9yIHRoZSBjYXJkYW1vbSBoaWxsIGVzdGF0ZSBmdXJ0aGVyIGFsb25nIHRoZSB2YWxsZXku',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHBlcHBlciB0ZXJyYWNlcw==', 'next' => '2_pepper'],
                ['text' => 'SGVhZCBmb3IgdGhlIGNhcmRhbW9tIGVzdGF0ZQ==', 'next' => '2_cardamom'],
            ],
        ],
        '2_pepper' => [
            'prose'  => 'VGhlIHBlcHBlciB0ZXJyYWNlcyBjbGltYiBzdGVlcGx5LCB2aW5lcyBoZWF2eSB3aXRoIGdyZWVuIGNsdXN0ZXJzIHdpbmRpbmcgdXAgc3VwcG9ydCB0cmVlcyBwbGFudGVkIGdlbmVyYXRpb25zIGFnbyBzcGVjaWZpY2FsbHkgZm9yIHRoaXMgcHVycG9zZS4gWW91IGFycml2ZSBqdXN0IGFzIHRoZSBmaXJzdCBkaXN0YW50IHRodW5kZXIgcm9sbHMgaW4sIHRoZSBmYXJtIGZhbWlseSB3YXZpbmcgeW91IGluIHF1aWNrbHkgYmVmb3JlIHRoZSByYWluIHByb3Blcmx5IHN0YXJ0cy4KCidNYWRlIGl0IGp1c3QgaW4gdGltZSwnIHRoZSBmYXJtZXIgc2F5cywgZ2xhbmNpbmcgYXQgdGhlIGRhcmtlbmluZyBza3ku',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5IHByb3Blcmx5', 'next' => '3_shared'],
            ],
        ],
        '2_cardamom' => [
            'prose'  => 'VGhlIGNhcmRhbW9tIGVzdGF0ZSBzaXRzIGxvd2VyIGluIHRoZSB2YWxsZXksIHNoYWRlZCB1bmRlcnN0b3JleSBwbGFudHMgaGVhdnkgd2l0aCB0aGUgc21hbGwgZ3JlZW4gcG9kcyB0aGF0IGdpdmUgdGhlIHdob2xlIGFyZWEgaXRzIGRpc3RpbmN0aXZlLCBjb29saW5nIGZyYWdyYW5jZS4gWW91IGFycml2ZSBqdXN0IGFzIHRoZSBmaXJzdCBkaXN0YW50IHRodW5kZXIgcm9sbHMgaW4sIHRoZSBmYXJtIGZhbWlseSB3YXZpbmcgeW91IGluIHF1aWNrbHkgYmVmb3JlIHRoZSByYWluIHByb3Blcmx5IHN0YXJ0cy4KCidNYWRlIGl0IGp1c3QgaW4gdGltZSwnIHRoZSBmYXJtZXIgc2F5cywgZ2xhbmNpbmcgYXQgdGhlIGRhcmtlbmluZyBza3ku',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5IHByb3Blcmx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'V2hpY2hldmVyIGVzdGF0ZSB5b3UgcmVhY2hlZCwgdGhlIGZhbWlseSByZWNvZ25pc2VzIElyaXMncyBuYW1lIHdhcm1seSwgYW5kIHRoZSByYWluLCBvbmNlIGl0IGFycml2ZXMsIHNldHRsZXMgaW50byB0aGUga2luZCBvZiBzdGVhZHkgbW9uc29vbiBkb3ducG91ciB0aGF0IG1ha2VzIGFueSBmdXJ0aGVyIHRyYXZlbCB0b2RheSBlbnRpcmVseSBpbXBvc3NpYmxlLiAnWW91J3JlIHN0dWNrIHdpdGggdXMgdGlsbCBtb3JuaW5nLCcgdGhlIG1hdHJpYXJjaCBzYXlzLCBtb3JlIGFtdXNlZCB0aGFuIGFwb2xvZ2V0aWMuICdNaWdodCBhcyB3ZWxsIG1ha2UgaXQgdXNlZnVsLiBXZSdsbCB0ZWFjaCB5b3UgcHJvcGVybHksIHdoaWxlIHdlIHdhaXQgaXQgb3V0Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'TGVhcm4gd2hhdCB0aGV5IGhhdmUgdG8gdGVhY2g=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUgYXJlIHR3byB3YXlzIHRvIHNwZW5kIHRoZSByYWluLWJvdW5kIGV2ZW5pbmcgdXNlZnVsbHk6IGhlbHAgd2l0aCB0aGUgY2FyZWZ1bCwgZXhhY3Rpbmcgd29yayBvZiBzb3J0aW5nIGFuZCBncmFkaW5nIHRoZSBoYXJ2ZXN0IGJ5IGhhbmQsIGxlYXJuaW5nIHRvIGp1ZGdlIHF1YWxpdHkgYnkgZmVlbCwgb3Igc2l0IHdpdGggdGhlIGZhbWlseSBwcm9wZXJseSBhbmQgbGVhcm4gdGhlIHNwZWNpZmljIGhpc3RvcnkgYW5kIHVzZSBvZiB3aGljaGV2ZXIgc3BpY2UgeW91J3ZlIGVuZGVkIHVwIHdpdGgsIHVuZGVyc3RhbmRpbmcgaXRzIHBsYWNlIGluIHRoZSB3aG9sZSBraXRjaGVuIHRyYWRpdGlvbi4KCidFaXRoZXIncyBhIHJlYWwgZWR1Y2F0aW9uLCcgdGhlIG1hdHJpYXJjaCBzYXlzLiAnSGFuZHMgb3IgZWFycy4gWW91ciBjaG9pY2UsIHdoaWxlIHRoZSByYWluIGhhcyBpdHMgc2F5Lic=',
            'choices' => [
                ['text' => 'SGVscCBzb3J0IGFuZCBncmFkZSB0aGUgaGFydmVzdA==', 'next' => '5_sort'],
                ['text' => 'TGVhcm4gdGhlIHNwaWNlJ3MgaGlzdG9yeSBhbmQgdXNl', 'next' => '5_history'],
            ],
        ],
        '5_sort' => [
            'prose'  => 'U29ydGluZyBhbmQgZ3JhZGluZyBieSBoYW5kIGlzIHNsb3csIGNhcmVmdWwgd29yaywgbGVhcm5pbmcgdG8ganVkZ2Ugc2l6ZSBhbmQgcXVhbGl0eSBhbmQgcmlwZW5lc3MgYnkgZmVlbCBhbG9uZSwgdGhlIHJhaW4gZHJ1bW1pbmcgc3RlYWRpbHkgb24gdGhlIHJvb2YgdGhlIHdob2xlIHRpbWUuIEJ5IHRoZSBlbmQgb2YgdGhlIGV2ZW5pbmcsIHlvdXIgaGFuZHMgaGF2ZSBsZWFybmVkIHNvbWV0aGluZyB5b3VyIGV5ZXMgYWxvbmUgbmV2ZXIgY291bGQgaGF2ZS4KClRoZSBmYW1pbHkgd2F0Y2hlcyB5b3VyIHByb2dyZXNzIHdpdGggcmVhbCwgd2FybSBhcHByb3ZhbC4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIG1vcm5pbmcgYnJpbmdz', 'next' => '6_shared'],
            ],
        ],
        '5_history' => [
            'prose'  => 'TGVhcm5pbmcgdGhlIGhpc3RvcnkgbWVhbnMgYSBsb25nLCB1bmh1cnJpZWQgZXZlbmluZyBvZiBzdG9yaWVzIOKAlCBob3cgdGhlIHNwaWNlIHRyYWRlIHNoYXBlZCB0aGlzIHdob2xlIGNvYXN0IGZvciBjZW50dXJpZXMsIGhvdyB0aGUgZmFtaWx5J3Mgb3duIHRlY2huaXF1ZXMgcGFzc2VkIGRvd24gZ2VuZXJhdGlvbiB0byBnZW5lcmF0aW9uLCB0aGUgcmFpbiBvdXRzaWRlIHNvbWVob3cgbWFraW5nIHRoZSBmaXJlc2lkZSB0ZWxsaW5nIGZlZWwgZXZlbiBtb3JlIHByb3Blcmx5IGVhcm5lZC4KCkJ5IHRoZSBlbmQgb2YgdGhlIGV2ZW5pbmcsIHlvdSB1bmRlcnN0YW5kIG5vdCBqdXN0IHdoYXQgeW91J3JlIGNhcnJ5aW5nLCBidXQgd2h5IGl0J3MgbWF0dGVyZWQgaGVyZSBmb3Igc28gdmVyeSBsb25nLg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIG1vcm5pbmcgYnJpbmdz', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QnkgbW9ybmluZywgdGhlIHJhaW4ncyBjbGVhcmVkLCB0aGUgcm9hZHMgcGFzc2FibGUgYWdhaW4sIGFuZCB0aGUgZmFtaWx5IHNlbmRzIHlvdSBvZmYgd2l0aCBhIHByb3Blcmx5IG1lYXN1cmVkIHBvcnRpb24gb2YgdGhlIGhhcnZlc3Qg4oCUIHdoaWNoZXZlciBzcGljZSB5b3UgZW5kZWQgdXAgbGVhcm5pbmcsIHByZXBhcmVkIGFuZCBwYWNrZWQgd2l0aCByZWFsLCBnZW5lcm91cyBjYXJlLgoKJ1JhaW4gYnJvdWdodCB5b3UgdG8gZXhhY3RseSB3aGVyZSB5b3UgbmVlZGVkIHRvIGJlLCcgdGhlIG1hdHJpYXJjaCBzYXlzLCBzYXRpc2ZpZWQuICdTb21ldGltZXMgdGhhdCdzIGp1c3QgaG93IHRoZXNlIHRoaW5ncyB3b3JrIG91dC4n',
            'choices' => [
                ['text' => 'VGhhbmsgdGhlbSBhbmQgc3RhcnQgYmFjaw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHRvd2FyZCB0aGUgY29hc3Qgcm9hZCB3aXRoIHRoZSBzcGljZSBzZWN1cmUgaW4gaXRzIGNhcmVmdWwgd3JhcHBpbmcsIEtlcmFsYSdzIGdyZWVuIGhpbGxzIHN0ZWFtaW5nIGdlbnRseSBpbiB0aGUgbW9ybmluZyBzdW4gYWZ0ZXIgdGhlIG5pZ2h0J3MgaGVhdnkgcmFpbiwgdGhlIHdob2xlIGRldG91ciBmZWVsaW5nLCBpbiByZXRyb3NwZWN0LCBleGFjdGx5IGFzIG5lY2Vzc2FyeSBhcyBpdCB3YXMgdW5wbGFubmVkLgoKQnJ1bm8gY2hlY2tzIHRoZSB3cmFwcGVkIHNwaWNlIHdpdGggcmVhbCBzYXRpc2ZhY3Rpb24uICdHb29kIHRoaW5nIHRoZSByYWluIGNsb3NlZCB0aGUgcm9hZCwgaW4gYSB3YXkuIFdvdWxkbid0IGhhdmUgZ290IHRoZSBmdWxsIGxlc3NvbiBvdGhlcndpc2UuJw==',
            'choices' => [
                ['text' => 'QWdyZWUgdGhhdCB0aGUgZGVsYXkgd2FzIHdvcnRoIGl0', 'next' => '8_end_worth'],
                ['text' => 'U2F5IHlvdSdyZSBqdXN0IGdsYWQgdG8gYmUgbW92aW5nIGFnYWlu', 'next' => '8_end_moving'],
            ],
        ],
        '8_end_worth' => [
            'prose'  => 'J0kgYWdyZWUsIGhvbmVzdGx5LCcgeW91IHNheSwgdGhpbmtpbmcgYmFjayBvdmVyIHRoZSB3aG9sZSB1bnBsYW5uZWQsIHJhaW4tYm91bmQgZXZlbmluZy4gJ1dvdWxkIGhhdmUgbWlzc2VkIHNvbWV0aGluZyByZWFsIGlmIHdlJ2QganVzdCBydXNoZWQgc3RyYWlnaHQgdGhyb3VnaC4nCgpCcnVubyBub2RzLCBwbGVhc2VkLiAnVGhhdCdzIHJhdGhlciB0aGUgbGVzc29uIG9mIHRoaXMgd2hvbGUgdHJpcCwgSSB0aGluay4gVGhlIGRlbGF5cyBhcmUgdXN1YWxseSB3aGVyZSB0aGUgYWN0dWFsIGxlYXJuaW5nIGhhcHBlbnMuJw==',
            'ending' => true,
        ],
        '8_end_moving' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20ganVzdCBnbGFkIHRvIGJlIG1vdmluZyBhZ2FpbiwnIHlvdSBhZG1pdCwgZWFnZXIgZm9yIHRoZSBuZXh0IHN0b3AgZGVzcGl0ZSBldmVyeXRoaW5nIHRoZSByYWluLWJvdW5kIGV2ZW5pbmcgYWN0dWFsbHkgdGF1Z2h0IHlvdS4gJ0dvb2QgZGV0b3VyLiBTdGlsbCBnbGFkIGl0J3MgYSBkZXRvdXIgYW5kIG5vdCB0aGUgd2hvbGUgdHJpcC4nCgpCcnVubyBsYXVnaHMuICdGYWlyIGVub3VnaC4gUGxlbnR5IG1vcmUgZ3JvdW5kIHRvIGNvdmVyIHlldC4nIFRoZSB0d28gb2YgeW91IGNvbnRpbnVlIG9uIHRvd2FyZCB0aGUgY29hc3QsIHRoZSBtb3JuaW5nIGZyZXNoIGFuZCBjbGVhciBhZnRlciB0aGUgbmlnaHQncyBoZWF2eSByYWluLg==',
            'ending' => true,
        ],
    ],
];
