<?php
return [
    'id'    => 10,
    'title' => 'Learned By Ear',
    'color' => '#2A6A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEdvYmkgRGVzZXJ0J3MgdmFzdCBzdGVwcGUgcm9sbHMgb3V0IGluIGRyeSBncmFzc2xhbmQgYmVuZWF0aCB0aGUgUXVpZXQgSG91ciwgYSBzY2F0dGVyaW5nIG9mIHdoaXRlIGdlcnMgdmlzaWJsZSBpbiB0aGUgZGlzdGFuY2UsIGhlcmRzIG9mIGhvcnNlcyBncmF6aW5nIHVuaHVycmllZCBhZ2FpbnN0IHRoZSBlbm9ybW91cyBza3kuIFByaXlhIGxhbmRzIHdlbGwgY2xlYXIgb2YgdGhlIG5lYXJlc3QgY2FtcC4gJ0hlcmRpbmcgZmFtaWx5IGhlcmUsJyBzaGUgc2F5cy4gJ0NvcndpbidzIG5vdGVzIG1lbnRpb24gdGhpcyBvbmUncyBkaWZmZXJlbnQg4oCUIG5vdCBhIHZlcnNlIGF0IGFsbCwgYXBwYXJlbnRseS4gQSBzb25nLicKClR3byBzdGVwcGUgcm91dGVzIHRvd2FyZCB0aGUgZmFtaWx5J3MgZ2VyIHByZXNlbnQgdGhlbXNlbHZlczogZm9sbG93aW5nIHRoZSBuZWFyZXN0IGhvcnNlIHRyYWlsLCBvciBjdXR0aW5nIG1vcmUgZGlyZWN0bHkgYWNyb3NzIG9wZW4gZ3Jhc3NsYW5kLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBob3JzZSB0cmFpbA==', 'next' => '2_trail'],
                ['text' => 'Q3V0IGFjcm9zcyBvcGVuIGdyYXNzbGFuZA==', 'next' => '2_grassland'],
            ],
        ],
        '2_trail' => [
            'prose'  => 'VGhlIGhvcnNlIHRyYWlsIHdpbmRzIGEgbG9uZ2VyIGJ1dCB3ZWxsLXdvcm4gcGF0aCwgaGVyZHMgZ3JhemluZyBwZWFjZWZ1bGx5IG9uIGVpdGhlciBzaWRlIGFzIHlvdSBmb2xsb3cgdHJhY2tzIGNsZWFybHkgdXNlZCBieSB0aGlzIGZhbWlseSBmb3IgZ2VuZXJhdGlvbnMgb2YgbW92aW5nIHN0b2NrIGFjcm9zcyB0aGUgc3RlcHBlLiBZb3UgcmVhY2ggdGhlIGdlciBhdCBhIGNvbWZvcnRhYmxlLCB1bmh1cnJpZWQgcGFjZS4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdlcg==', 'next' => '3_shared'],
            ],
        ],
        '2_grassland' => [
            'prose'  => 'Q3V0dGluZyBkaXJlY3RseSBhY3Jvc3Mgb3BlbiBncmFzc2xhbmQgaXMgYSBzaG9ydGVyLCB3aWxkZXIgd2FsaywgdGhlIHN0ZXBwZSdzIGVub3Jtb3VzIHNjYWxlIHByZXNzaW5nIGluIGZyb20gZXZlcnkgZGlyZWN0aW9uLCB3aW5kIG1vdmluZyB0aHJvdWdoIGRyeSBncmFzcyBpbiBsb25nLCB2aXNpYmxlIHdhdmVzLiBZb3UgcmVhY2ggdGhlIGdlciBtb3JlIHF1aWNrbHksIHNsaWdodGx5IHdpbmRzd2VwdC4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdlcg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhbWlseSB3ZWxjb21lcyB5b3UgaW50byB0aGVpciBnZXIgd2l0aCB3YXJtLCBlYXN5IGhvc3BpdGFsaXR5LCB0aGUgbWF0cmlhcmNoIOKAlCBhIHdvbWFuIG5hbWVkIE95dW4g4oCUIGFscmVhZHkgcmVhY2hpbmcgZm9yIGEgc21hbGwgaG9yc2VoYWlyIGZpZGRsZSB0aGUgbW9tZW50IENvcndpbidzIGF0bGFzIGNvbWVzIHVwLiAnVGhpcyBvbmUncyBhIHNvbmcsJyBzaGUgY29uZmlybXMsIGV4YW1pbmluZyB0aGUgYmxhbmsgcGF0Y2guICdBbHdheXMgaGFzIGJlZW4uIE5vdCB3cml0dGVuIGRvd24gcHJvcGVybHksIGV2ZXIg4oCUIHRoYXQncyByYXRoZXIgdGhlIHBvaW50IG9mIGl0LiBIYXMgdG8gYmUgbGVhcm5lZCBieSBlYXIuJwoKU2hlIHN0dWRpZXMgeW91LiAnQXJlIHlvdSB3aWxsaW5nIHRvIGFjdHVhbGx5IGxlYXJuIGEgc29uZywgcmF0aGVyIHRoYW4ganVzdCBoZWFyIGEgcmlkZGxlPyc=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSB3aWxsaW5nIHRvIGxlYXJuIHRoZSBzb25n', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'T3l1biBvZmZlcnMgdHdvIHdheXMgdG8gcHJvcGVybHkgbGVhcm4gaXQ6IGhlYXIgdGhlIHdob2xlIHNvbmcgcGVyZm9ybWVkIG9uY2UsIHN0cmFpZ2h0IHRocm91Z2gsIHRoZW4gYXR0ZW1wdCB0byBodW0gYmFjayB3aGF0IHlvdSByZW1lbWJlciBvZiBpdCwgb3IgbGVhcm4gaXQgcGhyYXNlIGJ5IHBocmFzZSwgcmVwZWF0aW5nIGVhY2ggc21hbGwgcGllY2UgYmFjayB0byBoZXIgYmVmb3JlIG1vdmluZyB0byB0aGUgbmV4dC4KCidFaXRoZXIgdGVhY2hlcyBpdCBwcm9wZXJseSwgZXZlbnR1YWxseSwnIHNoZSBzYXlzLiAnV2hvbGUgc29uZyBmaXJzdCwgb3IgcGllY2UgYnkgcGllY2UuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'SGVhciB0aGUgd2hvbGUgc29uZyBmaXJzdA==', 'next' => '5_whole'],
                ['text' => 'TGVhcm4gaXQgcGhyYXNlIGJ5IHBocmFzZQ==', 'next' => '5_phrase'],
            ],
        ],
        '5_whole' => [
            'prose'  => 'SGVhcmluZyB0aGUgd2hvbGUgc29uZyBwZXJmb3JtZWQgZmlyc3QgbWVhbnMgT3l1bidzIGZpZGRsZSBhbmQgdm9pY2UgY2FycnlpbmcgdGhlIG1lbG9keSBjbGVhbiB0aHJvdWdoLCB1bmJyb2tlbiwgdGhlIHR1bmUgY29uc2lkZXJhYmx5IG1vcmUgY29tcGxleCB0aGFuIHlvdSBleHBlY3RlZCwgc2V2ZXJhbCBrZXkgcGhyYXNlcyBzbGlwcGluZyBmcm9tIG1lbW9yeSB0aGUgbW9tZW50IHNoZSBmaW5pc2hlcyBkZXNwaXRlIHlvdXIgYmVzdCBlZmZvcnQgdG8gaG9sZCB0aGVtLgoKWW91ciBvd24gYXR0ZW1wdGVkIGh1bS1iYWNrIGlzIHJvdWdoLCBwYXRjaHksIGJ1dCB0aGUgc2hhcGUgb2YgdGhlIGNvbnN0ZWxsYXRpb24gaXQgZGVzY3JpYmVzIGlzIHVubWlzdGFrYWJseSwgcHJvcGVybHkgdGhlcmUgaW4gd2hhdCB5b3UgZGlkIHJldGFpbi4=',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_phrase' => [
            'prose'  => 'TGVhcm5pbmcgaXQgcGhyYXNlIGJ5IHBocmFzZSBtZWFucyBjYXJlZnVsLCBwYXRpZW50IHJlcGV0aXRpb24sIE95dW4gY29ycmVjdGluZyB5b3VyIHRvbmUgYW5kIHJoeXRobSBvbiBlYWNoIHNtYWxsIHBpZWNlIGJlZm9yZSBhZGRpbmcgdGhlIG5leHQsIHRoZSBzb25nIHNsb3dseSwgcHJvcGVybHkgYXNzZW1ibGluZyBpdHNlbGYgaW4geW91ciBtZW1vcnkgcmF0aGVyIHRoYW4gd2FzaGluZyBvdmVyIHlvdSBhbGwgYXQgb25jZS4KCkJ5IHRoZSBmaW5hbCBwaHJhc2UsIHlvdSBjYW4gaHVtIGJhY2sgbW9zdCBvZiBpdCDigJQgaW1wZXJmZWN0bHksIGJ1dCByZWNvZ25pc2FibHku',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMgYXMgYmVzdCB5b3UgdW5kZXJzdG9vZCBpdCBmcm9tIHRoZSBzb25nLCBodW1taW5nIHRoZSB0dW5lIHF1aWV0bHkgdG8geW91cnNlbGYgYXMgeW91IHdvcmssIHRoZSBzaGFwZSBzZXR0bGluZyBvbnRvIHRoZSBwYWdlIGhhbGYtcmVtZW1iZXJlZCBieSBlYXIgcmF0aGVyIHRoYW4gcmVhZCBmcm9tIGFueSBjbGVhbiB2ZXJzZS4gT3l1biBsaXN0ZW5zIHRvIHlvdXIgaHVtbWluZyB3aXRoIHJlYWwgYW11c2VtZW50LgoKJ0Nsb3NlIGVub3VnaCwnIHNoZSBzYXlzLCBsYXVnaGluZy4gJ1NvbmdzIGRyaWZ0IGEgbGl0dGxlIGluIGV2ZXJ5IG1vdXRoIHRoYXQgY2FycmllcyB0aGVtIGZvcndhcmQuIFRoYXQncyBub3QgYSBmbGF3LiBUaGF0J3MganVzdCBob3cgc29uZ3MgYWN0dWFsbHkgd29yay4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHN0ZXAgYmFjayBvdXQgb250byB0aGUgdmFzdCBzdGVwcGUgYXMgZXZlbmluZyBwcm9wZXJseSBzZXR0bGVzLCBzdGlsbCBodW1taW5nIHRoZSBoYWxmLXJlbWVtYmVyZWQgdHVuZSB1bmRlciB5b3VyIGJyZWF0aCwgaG9yc2VzIGdyYXppbmcgcGVhY2VmdWxseSBpbiB0aGUgbGFzdCBvZiB0aGUgbGlnaHQuIFByaXlhJ3Mgd2FpdGluZyB3aXRoIHRoZSB0aGVybW9zLCBTdWxpJ3MgZWFycyBwcmlja2VkIHdpdGggaW50ZXJlc3QgYXQgeW91ciBxdWlldCBodW1taW5nLgoKJ0NhdGNoIHRoZSB0dW5lPycgUHJpeWEgYXNrcywgY2xlYXJseSBhbXVzZWQu',
            'choices' => [
                ['text' => 'U2luZyBhIHJvdWdoIGF0dGVtcHQgYXQgaXQgZm9yIGhlcg==', 'next' => '8_end_sing'],
                ['text' => 'QWRtaXQgaXQncyBhbHJlYWR5IHNsaXBwaW5nIGZyb20gbWVtb3J5', 'next' => '8_end_slipping'],
            ],
        ],
        '8_end_sing' => [
            'prose'  => 'WW91IGF0dGVtcHQgYSByb3VnaCwgaW1wZXJmZWN0IHZlcnNpb24gb2YgdGhlIHR1bmUgZm9yIFByaXlhLCB3aG8gbGlzdGVucyB3aXRoIHJlYWwgZGVsaWdodCBkZXNwaXRlIHRoZSB3b2JibHkgcGl0Y2guICdDbG9zZSBlbm91Z2gsJyBzaGUgc2F5cywgZWNob2luZyBPeXVuJ3Mgb3duIHdvcmRzLiAnQ29yd2luIHVzZWQgdG8gaHVtIHNvbWV0aGluZyBzaW1pbGFyLCBhY3R1YWxseSwgd2hlbiBoZSB0aG91Z2h0IG5vYm9keSB3YXMgbGlzdGVuaW5nLiBOaWNlLCBoZWFyaW5nIGl0IGNhcnJpZWQgZm9yd2FyZCwgaG93ZXZlciByb3VnaGx5LicKClN1bGkgY2hpcnJ1cHMgc29tZXRoaW5nIHRoYXQgbWlnaHQgYmUgYXBwcm92YWwgYXMgdGhlIFF1aWV0IEhvdXIgbGlmdHMgb2ZmIGludG8gdGhlIHZhc3QgTW9uZ29saWFuIGR1c2su',
            'ending' => true,
        ],
        '8_end_slipping' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCdzIGFscmVhZHkgc2xpcHBpbmcgZnJvbSBtZW1vcnksJyB5b3UgYWRtaXQsIGZyb3duaW5nIHNsaWdodGx5IGF0IGhvdyBxdWlja2x5IHRoZSB0dW5lJ3MgZWRnZXMgYXJlIGJsdXJyaW5nLiAnRmVlbHMgc3RyYW5nZSwgaG9sZGluZyBzb21ldGhpbmcgdGhhdCdzIG1lYW50IHRvIGJlIGEgbGl0dGxlIGltcGVyZmVjdCBieSBuYXR1cmUuIE5vdCBzdXJlIEknbSBkb2luZyBpdCBqdXN0aWNlLicKClByaXlhIHNocnVncywgdW5ib3RoZXJlZC4gJ095dW4gc2FpZCBpdCBoZXJzZWxmIOKAlCBzb25ncyBkcmlmdC4gVGhhdCdzIG5vdCB5b3UgZmFpbGluZyBpdC4gVGhhdCdzIGp1c3Qgd2hhdCBjYXJyeWluZyBhIHNvbmcgZm9yd2FyZCBhY3R1YWxseSBsb29rcyBsaWtlLicgVGhlIHN0ZXBwZSdzIGVub3Jtb3VzIHNreSBkZWVwZW5zIHRvd2FyZCBmdWxsIGRhcmsgYXMgdGhlIFF1aWV0IEhvdXIgcmlzZXMgcXVpZXRseSBhd2F5Lg==',
            'ending' => true,
        ],
    ],
];
