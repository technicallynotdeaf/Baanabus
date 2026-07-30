<?php
return [
    'id'    => 15,
    'title' => 'Texture Matters As Much As Ingredients',
    'color' => '#8A4A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFl1Y2F0YW4ncyBmbGF0LCBzY3J1YmJ5IGNvdW50cnlzaWRlIGdpdmVzIHdheSB0byBzbWFsbCBNYXlhIHZpbGxhZ2VzIHdoZXJlIGFjaGlvdGUgdHJlZXMgZ3JvdyBtb2Rlc3RseSBhbW9uZyBob21lIGdhcmRlbnMsIHRoZWlyIHNtYWxsIHJlZCBzZWVkcyByZXNwb25zaWJsZSBmb3IgdGhlIGRpc3RpbmN0aXZlIGJyaWNrLXJlZCBjb2xvciBmb3VuZCB0aHJvdWdob3V0IHRoZSB3aG9sZSByZWdpb24ncyBjb29raW5nLiBCcnVubyBtZW50aW9ucyB0aGUgZmFtaWx5IHlvdSdyZSBhZnRlciBrZWVwcyBhIHRyYWRpdGlvbmFsIGdyaW5kaW5nIHN0b25lIHRoYXQncyBiZWVuIGluIGNvbnRpbnVvdXMgdXNlIGZvciBnZW5lcmF0aW9ucy4KClR3byB2aWxsYWdlIGFwcHJvYWNoZXMgcHJlc2VudCB0aGVtc2VsdmVzOiB0aHJvdWdoIHRoZSBjZW50cmFsIHBsYXphLCBvciBhbG9uZyBhIHF1aWV0ZXIgYmFjayBsYW5lIHBhc3Qgc2V2ZXJhbCBmYW1pbHkgbWlscGFzLg==',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgY2VudHJhbCBwbGF6YQ==', 'next' => '2_plaza'],
                ['text' => 'VGFrZSB0aGUgcXVpZXRlciBiYWNrIGxhbmU=', 'next' => '2_lane'],
            ],
        ],
        '2_plaza' => [
            'prose'  => 'VGhlIGNlbnRyYWwgcGxhemEgaXMgbW9kZXN0LCB1bmh1cnJpZWQsIGEgZmV3IHN0YWxscyBzZWxsaW5nIHByb2R1Y2UgYW5kIGhhbmRpY3JhZnRzIHVuZGVyIHRoZSBzaGFkZSBvZiBvbGQgdHJlZXMuIFNvbWVvbmUgcG9pbnRzIHlvdSBvbndhcmQgZWFzaWx5IGVub3VnaCwgcmVjb2duaXNpbmcgeW91ciBlcnJhbmQgdGhlIG1vbWVudCB5b3UgbWVudGlvbiBhY2hpb3RlIGFuZCB0aGUgZ3JpbmRpbmcgc3RvbmUuCgpZb3UgYXJyaXZlIGF0IHRoZSBmYW1pbHkgaG9tZSB3aXRoIGNsZWFyIGRpcmVjdGlvbnMgYW5kIG5vIHdhc3RlZCB0aW1lLg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '2_lane' => [
            'prose'  => 'VGhlIGJhY2sgbGFuZSB3aW5kcyBwYXN0IHNtYWxsIGZhbWlseSBtaWxwYXMsIGNvcm4gYW5kIHNxdWFzaCBncm93aW5nIGluIHRoZSB0cmFkaXRpb25hbCBpbnRlcmNyb3BwZWQgcGF0dGVybiB0aGF0J3Mgc3VzdGFpbmVkIHRoaXMgcmVnaW9uIGZvciBjZW50dXJpZXMuIEl0J3MgYSBxdWlldGVyLCBtb3JlIHNjZW5pYyByb3V0ZSwgZ2l2aW5nIHlvdSByZWFsIHRpbWUgdG8gYXBwcmVjaWF0ZSB0aGUgd2hvbGUgcmh5dGhtIG9mIHZpbGxhZ2UgbGlmZS4KCllvdSBhcnJpdmUgYXQgdGhlIGZhbWlseSBob21lIGhhdmluZyBwcm9wZXJseSBzZWVuIHRoZSB3b3JraW5nIGxhbmQgYXJvdW5kIGl0Lg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhbWlseSwgdGhlIENhbnVscywga2VlcCBhIG1ldGF0ZSDigJQgYSB0cmFkaXRpb25hbCBzdG9uZSBncmluZGluZyB0b29sIOKAlCB0aGF0J3MgYmVlbiBwYXNzZWQgZG93biBhbmQgdXNlZCBjb250aW51b3VzbHkgZm9yIGFzIGxvbmcgYXMgYW55b25lIGluIHRoZSBmYW1pbHkgY2FuIHByb3Blcmx5IHJlbWVtYmVyLiBUaGUgbWF0cmlhcmNoLCBEb8OxYSBSb3NhLCByZWNvZ25pc2VzIElyaXMncyBuYW1lIHdhcm1seS4gJ1NoZSBsZWFybmVkIHRoZSBncmluZGluZyBoZXJlLCBwcm9wZXJseSwgYnkgaGFuZC4gV291bGRuJ3QgdXNlIGEgbWFjaGluZSwgZXZlciwgbm8gbWF0dGVyIGhvdyBtdWNoIGVhc2llciBpdCB3b3VsZCBoYXZlIGJlZW4uJwoKU2hlIHN0dWRpZXMgeW91LiAnVGhlIHBhc3RlIGhhcyB0byBiZSBncm91bmQgZXhhY3RseSByaWdodCDigJQgdGV4dHVyZSBtYXR0ZXJzIGFzIG11Y2ggYXMgaW5ncmVkaWVudHMuIEknbGwgdGVhY2ggeW91IHRoZSBzYW1lIHdheSwgaWYgeW91J3JlIHBhdGllbnQgZW5vdWdoIGZvciBpdC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWNjZXB0IHRoZSBsZXNzb24=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RG/DsWEgUm9zYSBvZmZlcnMgdHdvIHdheXMgdG8gYWN0dWFsbHkgbGVhcm4gdGhlIGdyaW5kaW5nIHByb3Blcmx5OiB3b3JrIHRoZSBzdG9uZSB5b3Vyc2VsZiBmcm9tIHRoZSB2ZXJ5IHN0YXJ0LCBsZWFybmluZyB0aHJvdWdoIHRoZSBzcGVjaWZpYywgaHVtYmxpbmcgZGlmZmljdWx0eSBvZiBnZXR0aW5nIHRoZSByaHl0aG0gd3JvbmcgcmVwZWF0ZWRseSwgb3Igd2F0Y2ggaGVyIGNvbXBsZXRlIGFuIGVudGlyZSBiYXRjaCBmaXJzdCwgYWJzb3JiaW5nIHRoZSBjb3JyZWN0IHJoeXRobSBiZWZvcmUgYXR0ZW1wdGluZyB5b3VyIG93bi4KCidFaXRoZXIgZ2V0cyB5b3VyIGhhbmRzIHRoZXJlLCcgc2hlIHNheXMuICdTdHJ1Z2dsZSBmaXJzdCwgb3Igd2F0Y2ggZmlyc3QuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'V29yayB0aGUgc3RvbmUgeW91cnNlbGYgZnJvbSB0aGUgc3RhcnQ=', 'next' => '5_struggle'],
                ['text' => 'V2F0Y2ggYSBjb21wbGV0ZSBiYXRjaCBmaXJzdA==', 'next' => '5_watch'],
            ],
        ],
        '5_struggle' => [
            'prose'  => 'V29ya2luZyB0aGUgc3RvbmUgeW91cnNlbGYgZnJvbSB0aGUgc3RhcnQgaXMgZ2VudWluZWx5IGh1bWJsaW5nLCB5b3VyIHJoeXRobSB1bmV2ZW4sIHRoZSBwYXN0ZSBjb21pbmcgb3V0IGx1bXB5IGFuZCBpbmNvbnNpc3RlbnQgd2hpbGUgRG/DsWEgUm9zYSB3YXRjaGVzIHdpdGhvdXQgaW50ZXJ2ZW5pbmcsIGxldHRpbmcgeW91IGFjdHVhbGx5IGZlZWwgdGhlIGRpZmZpY3VsdHkgYmVmb3JlIG9mZmVyaW5nIGNvcnJlY3Rpb24uIE9uY2Ugc2hlIGZpbmFsbHkgZG9lcyBzdGVwIGluLCBoZXIgYWRqdXN0bWVudHMgdG8geW91ciBncmlwIGFuZCBtb3Rpb24gbWFrZSBhbiBpbW1lZGlhdGUgZGlmZmVyZW5jZS4KCllvdXIgYXJtcyBhY2hlIGJ5IHRoZSBlbmQgaW4gYSB3YXkgdGhhdCBmZWVscywgdW5leHBlY3RlZGx5LCBsaWtlIHJlYWwgYWNjb21wbGlzaG1lbnQu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBmaW5pc2hlZCBwYXN0ZQ==', 'next' => '6_shared'],
            ],
        ],
        '5_watch' => [
            'prose'  => 'V2F0Y2hpbmcgRG/DsWEgUm9zYSBjb21wbGV0ZSBhbiBlbnRpcmUgYmF0Y2ggZmlyc3QgaXMgZ2VudWluZWx5IG1lc21lcmlzaW5nLCBoZXIgc3RlYWR5LCBwcmFjdGlzZWQgcmh5dGhtIG1ha2luZyBhbiBleGFjdGluZyB0ZWNobmlxdWUgbG9vayBhbG1vc3QgZWZmb3J0bGVzcy4gT25seSBvbmNlIHlvdSBhY3R1YWxseSB0cnkgaXQgeW91cnNlbGYgZG8geW91IHVuZGVyc3RhbmQgZXhhY3RseSBob3cgbXVjaCBza2lsbCB3YXMgaGlkZGVuIGluc2lkZSB0aGF0IGFwcGFyZW50IGVhc2UuCgpZb3VyIG93biBhdHRlbXB0IGlzIHJvdWdoZXIsIGJ1dCBoZXIgZWFybGllciBkZW1vbnN0cmF0aW9uIGdpdmVzIHlvdXIgaGFuZHMgYSByZWFsIHRlbXBsYXRlIHRvIHdvcmsgZnJvbS4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBmaW5pc2hlZCBwYXN0ZQ==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QnkgdGhlIGVuZCwgd2hpY2hldmVyIHdheSB5b3UgbGVhcm5lZCBpdCwgeW91J3ZlIHByb2R1Y2VkIGEgcHJvcGVyIGJhdGNoIG9mIGFjaGlvdGUgcGFzdGUsIHRoZSByaWdodCB0ZXh0dXJlIGFuZCBjb2xvdXIgZmluYWxseSwgZ2VudWluZWx5IGFjaGlldmVkLiBEb8OxYSBSb3NhIGV4YW1pbmVzIGl0IHdpdGggcmVhbCBzYXRpc2ZhY3Rpb24uICdHb29kLiBZb3VyIGdyYW5kbW90aGVyIHRvb2sgdHdvIGZ1bGwgZGF5cyB0byBnZXQgdGhpcyByaWdodCwgaGVyIGZpcnN0IHZpc2l0LiBZb3UncmUgZG9pbmcgYmV0dGVyIHRoYW4gc2hlIGRpZCwgaWYgSSdtIGhvbmVzdC4nCgpTaGUgc2VlbXMgZGVsaWdodGVkIHJhdGhlciB0aGFuIGJvdGhlcmVkIGJ5IHRoZSBjb21wYXJpc29uLg==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0aHJvdWdoIHRoZSBxdWlldCB2aWxsYWdlIHdpdGggdGhlIGFjaGlvdGUgcGFzdGUgc2VjdXJlIGluIGl0cyBjYXJlZnVsIHdyYXAsIHRoZSBZdWNhdGFuJ3MgZmxhdCBzY3J1YmxhbmQgc3RyZXRjaGluZyB0b3dhcmQgdGhlIGhvcml6b24gaW4gZXZlcnkgZGlyZWN0aW9uLCB5b3VyIGFybXMgc3RpbGwgZmFpbnRseSBhY2hpbmcgZnJvbSBhbiBhZnRlcm5vb24gb2YgZ2VudWluZWx5IGVhcm5lZCwgaGFuZC1ncm91bmQgd29yay4KCkJydW5vIGV4YW1pbmVzIHRoZSBwYXN0ZSB3aXRoIHJlYWwgYXBwcmVjaWF0aW9uLiAnUHJvcGVyIHRleHR1cmUsIHRoYXQuIFlvdSBjYW4gdGVsbCBtYWNoaW5lLWdyb3VuZCBmcm9tIGhhbmQtZ3JvdW5kIGltbWVkaWF0ZWx5LCBvbmNlIHlvdSBrbm93IHdoYXQgdG8gbG9vayBmb3IuJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBnbGFkIHlvdSBkaWQgYmV0dGVyIHRoYW4gSXJpcyBkaWQ=', 'next' => '8_end_better'],
                ['text' => 'U2F5IGl0IG1ha2VzIHlvdSBmZWVsIGNsb3NlciB0byBoZXIgc29tZWhvdw==', 'next' => '8_end_closer'],
            ],
        ],
        '8_end_better' => [
            'prose'  => 'J0knbSBnbGFkIEkgZGlkIGJldHRlciB0aGFuIHNoZSBkaWQsIGhvbmVzdGx5LCcgeW91IHNheSwgYWxsb3dpbmcgeW91cnNlbGYgYSBzbWFsbCwgZ2VudWluZSBwcmlkZSBpbiB0aGUgY29tcGFyaXNvbi4gJ0ZlZWxzIGdvb2QsIGFjdHVhbGx5IGltcHJvdmluZyBvbiBzb21ldGhpbmcgaW5zdGVhZCBvZiBqdXN0IHJlcGxpY2F0aW5nIGl0LicKCkJydW5vIGdyaW5zLiAnU2hlJ2QgaGF2ZSBsb3ZlZCB0aGF0LCBob25lc3RseS4gU2hlIHdhcyBuZXZlciBwcmVjaW91cyBhYm91dCBiZWluZyB0aGUgYmVzdCBhdCBldmVyeXRoaW5nLiBKdXN0IHdhbnRlZCBpdCBkb25lIHByb3Blcmx5LCBob3dldmVyIHRoYXQgaGFwcGVuZWQuJw==',
            'ending' => true,
        ],
        '8_end_closer' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBtYWtlcyBtZSBmZWVsIGNsb3NlciB0byBoZXIgc29tZWhvdywnIHlvdSBhZG1pdCwgdGhpbmtpbmcgb2YgaGVyIG93biB0d28gZnVsbCBkYXlzIGF0IHRoaXMgZXhhY3Qgc3RvbmUsIGRlY2FkZXMgYWdvLiAnU2FtZSBzdHJ1Z2dsZSwgc2FtZSBzdG9uZSwgc2FtZSBmYW1pbHkgdGVhY2hpbmcgaXQuIEZlZWxzIGxpa2UgdG91Y2hpbmcgc29tZXRoaW5nIHJlYWwgb2YgaGVycy4nCgpCcnVubydzIGV5ZXMgZ28gc2xpZ2h0bHkgYnJpZ2h0IGF0IHRoYXQuICdJdCBpcyByZWFsLiBTb21lIHRoaW5ncyBkb24ndCBhY3R1YWxseSBmYWRlLCBubyBtYXR0ZXIgaG93IG11Y2ggdGltZSBwYXNzZXMuIFRoaXMgaXMgY2xlYXJseSBvbmUgb2YgdGhlbS4n',
            'ending' => true,
        ],
    ],
];
