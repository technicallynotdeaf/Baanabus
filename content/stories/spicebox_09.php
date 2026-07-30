<?php
return [
    'id'    => 9,
    'title' => 'Not Memorised. Learned.',
    'color' => '#8A2A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'U2ljaHVhbidzIG1hcmtldHMgY2FycnkgYSB2ZXJ5IHBhcnRpY3VsYXIsIG1vdXRoLW51bWJpbmcgZnJhZ3JhbmNlIGxvbmcgYmVmb3JlIHlvdSBhY3R1YWxseSBzcG90IHRoZSBzb3VyY2Ug4oCUIGRyaWVkIGNoaWxpZXMgYW5kIFNpY2h1YW4gcGVwcGVyY29ybnMgc3RhY2tlZCBpbiBjYXJlZnVsIHB5cmFtaWRzLCB0aGUgd2hvbGUgYWlyIGZhaW50bHkgdGluZ2xpbmcgaW4gYSB3YXkgQnJ1bm8gd2FybnMgeW91IG5vdCB0byB1bmRlcmVzdGltYXRlLiAnVG9hc3RpbmcgdGhlc2UgcHJvcGVybHkgaXMgdGhlIHdob2xlIHNlY3JldCwnIGhlIHNheXMuICdOb3QgdGhlIHBlcHBlcnMgdGhlbXNlbHZlcy4gVGhlIHRvYXN0aW5nLicKClR3byBtYXJrZXQgYXBwcm9hY2hlcyB0b3dhcmQgdGhlIGZhcm1lciBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIGNvdmVyZWQgY2VudHJhbCBtYXJrZXQsIG9yIGFsb25nIGEgc21hbGxlciBzdHJlZXQgb2Ygc3BlY2lhbGlzdCBzdGFsbHMganVzdCBvZmYgdGhlIG1haW4gc3F1YXJlLg==',
            'choices' => [
                ['text' => 'R28gdGhyb3VnaCB0aGUgY2VudHJhbCBtYXJrZXQ=', 'next' => '2_central'],
                ['text' => 'VGFrZSB0aGUgc3BlY2lhbGlzdCBzdGFsbHMgc3RyZWV0', 'next' => '2_specialist'],
            ],
        ],
        '2_central' => [
            'prose'  => 'VGhlIGNlbnRyYWwgbWFya2V0IGlzIGxvdWQsIGNvbG91cmZ1bCwgZ2VudWluZWx5IG92ZXJ3aGVsbWluZyB3aXRoIHRoZSBzaGVlciBkZW5zaXR5IG9mIGNoaWxpIHZhcmlldGllcyBvbiBkaXNwbGF5LCB2ZW5kb3JzIGNhbGxpbmcgb3V0IHByaWNlcyBhbmQgc3BlY2lhbHRpZXMgb3ZlciBlYWNoIG90aGVyLiBZb3UgbmF2aWdhdGUgaXQgc2xvd2x5LCB0aGUgbW91dGgtbnVtYmluZyB0aW5nbGUgaW4gdGhlIGFpciBncm93aW5nIHN0cm9uZ2VyIHRoZSBkZWVwZXIgaW4geW91IGdvLgoKWW91IGZpbmFsbHkgc3BvdCBhIHN0YWxsIHdpdGggYSBzbWFsbCwgaGFuZC1sZXR0ZXJlZCBzaWduIHRoYXQgQnJ1bm8gcmVjb2duaXNlcyBpbW1lZGlhdGVseS4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHN0YWxs', 'next' => '3_shared'],
            ],
        ],
        '2_specialist' => [
            'prose'  => 'VGhlIHNwZWNpYWxpc3Qgc3RhbGxzIHN0cmVldCBpcyBxdWlldGVyLCBtb3JlIGZvY3VzZWQsIGVhY2ggc21hbGwgc2hvcCBjbGVhcmx5IHRoZSBkb21haW4gb2Ygc29tZW9uZSB3aG8ncyBzcGVudCBhIGxpZmV0aW1lIHBlcmZlY3Rpbmcgb25lIHNwZWNpZmljIHRoaW5nLiBZb3UgZmluZCB0aGUgcmlnaHQgc3RhbGwgcXVpY2tseSwgaXRzIGNhcmVmdWwsIGN1cmF0ZWQgZGlzcGxheSBzdWdnZXN0aW5nIHJlYWwgZXhwZXJ0aXNlIHJhdGhlciB0aGFuIHNpbXBsZSB2b2x1bWUuCgpCcnVubyByZWNvZ25pc2VzIHRoZSBoYW5kLWxldHRlcmVkIHNpZ24gaW1tZWRpYXRlbHku',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHN0YWxs', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhcm1lciwgYW4gb2xkZXIgd29tYW4gbmFtZWQgTGksIGhhcyBiZWVuIGdyb3dpbmcgYW5kIHRvYXN0aW5nIGNoaWxpZXMgaGVyIHdob2xlIGxpZmUsIHRhdWdodCBieSBoZXIgb3duIGdyYW5kbW90aGVyIHRoZSBzYW1lIGV4YWN0aW5nIHdheSBzaGUgc3RpbGwgdGVzdHMgYW55b25lIGNsYWltaW5nIHJlYWwgaW50ZXJlc3QgaW4gdGhlIGNyYWZ0LiAnQW55b25lIGNhbiBidXkgY2hpbGllcywnIHNoZSBzYXlzLiAnS25vd2luZyB3aGVuIHRoZXkncmUgcHJvcGVybHkgdG9hc3RlZCDigJQgdGhhdCdzIG5vdCBzb21ldGhpbmcgSSBjYW4ganVzdCBoYW5kIHlvdS4gUHJvdmUgeW91IGNhbiBhY3R1YWxseSBsZWFybiB0byBzbWVsbCBpdCwgYW5kIEknbGwgdGVhY2ggeW91IHByb3Blcmx5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWNjZXB0IHRoZSB0ZXN0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'TGkncyB0ZXN0IGlzIHN0cmFpZ2h0Zm9yd2FyZCBhbmQgZ2VudWluZWx5IGRpZmZpY3VsdDogc2hlIHRvYXN0cyBiYXRjaCBhZnRlciBiYXRjaCwgc29tZSBzbGlnaHRseSB1bmRlcmRvbmUsIHNvbWUgcGVyZmVjdCwgc29tZSBqdXN0IGJhcmVseSBzY29yY2hlZCwgYW5kIGFza3MgeW91IHRvIGlkZW50aWZ5IGVhY2ggYnkgc21lbGwgYWxvbmUsIG5vIHZpc3VhbCBjdWVzIGFsbG93ZWQuIFRoZXJlIGFyZSB0d28gd2F5cyB0byBhcHByb2FjaCBpdCDigJQgdHJ1c3QgeW91ciB2ZXJ5IGZpcnN0IGluc3RpbmN0IG9uIGVhY2ggYmF0Y2gsIG9yIHRha2UgeW91ciB0aW1lLCBjb21wYXJpbmcgZWFjaCBuZXcgYmF0Y2ggY2FyZWZ1bGx5IGFnYWluc3Qgd2hhdCB5b3UgcmVtZW1iZXIgb2YgdGhlIGxhc3QuCgonRWl0aGVyIGNhbiB3b3JrLCcgc2hlIHNheXMuICdJbnN0aW5jdCBvciBjb21wYXJpc29uLiBMZXQncyBzZWUgd2hpY2ggc3VpdHMgeW91ciBub3NlLic=',
            'choices' => [
                ['text' => 'VHJ1c3QgeW91ciBmaXJzdCBpbnN0aW5jdCBlYWNoIHRpbWU=', 'next' => '5_instinct'],
                ['text' => 'Q29tcGFyZSBlYWNoIGJhdGNoIGNhcmVmdWxseQ==', 'next' => '5_compare'],
            ],
        ],
        '5_instinct' => [
            'prose'  => 'VHJ1c3RpbmcgeW91ciBmaXJzdCBpbnN0aW5jdCBtZWFucyBxdWljaywgaW1tZWRpYXRlIGNhbGxzIG9uIGVhY2ggYmF0Y2gsIG5vIHNlY29uZC1ndWVzc2luZywgeW91ciBub3NlIGdpdmVuIHRoZSBjaGFuY2UgdG8gc2ltcGx5IGtub3cgd2l0aG91dCBiZWluZyBzZWNvbmQtZ3Vlc3NlZCBieSBvdmVydGhpbmtpbmcuIFlvdSBnZXQgaXQgd3JvbmcgbW9yZSB0aGFuIHlvdSdkIGxpa2UgYXQgZmlyc3QsIGJ1dCBncmFkdWFsbHksIHlvdXIgaW1tZWRpYXRlIGluc3RpbmN0IHN0YXJ0cyBsYW5kaW5nIGNvcnJlY3RseSBtb3JlIG9mdGVuIHRoYW4gbm90LgoKTGkgd2F0Y2hlcyB5b3VyIHByb2dyZXNzIHdpdGggcmVhbCwgcXVpZXQgaW50ZXJlc3Qu',
            'choices' => [
                ['text' => 'U2VlIGlmIHlvdSBwYXNzZWQ=', 'next' => '6_shared'],
            ],
        ],
        '5_compare' => [
            'prose'  => 'Q29tcGFyaW5nIGVhY2ggYmF0Y2ggY2FyZWZ1bGx5IGFnYWluc3QgbWVtb3J5IG9mIHRoZSBsYXN0IG1lYW5zIHNsb3dlciwgbW9yZSBkZWxpYmVyYXRlIGp1ZGdtZW50cywgYnVpbGRpbmcgYSBtZW50YWwgbGlicmFyeSBvZiBleGFjdGx5IHdoYXQgJ3BlcmZlY3QnIGFjdHVhbGx5IHNtZWxscyBsaWtlIHJlbGF0aXZlIHRvIGl0cyBuZWFyLW1pc3Nlcy4gSXQgdGFrZXMgbG9uZ2VyLCBidXQgeW91ciBhY2N1cmFjeSBidWlsZHMgc3RlYWRpbHkgcmF0aGVyIHRoYW4gdGhyb3VnaCBsdWNreSBpbnN0aW5jdC4KCkxpIHdhdGNoZXMgeW91ciBwcm9ncmVzcyB3aXRoIHJlYWwsIHF1aWV0IGludGVyZXN0Lg==',
            'choices' => [
                ['text' => 'U2VlIGlmIHlvdSBwYXNzZWQ=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QnkgdGhlIGVuZCBvZiB0aGUgdGVzdCwgeW91J3JlIGlkZW50aWZ5aW5nIHByb3Blcmx5IHRvYXN0ZWQgYmF0Y2hlcyBjb3JyZWN0bHksIGNvbnNpc3RlbnRseSwgeW91ciBub3NlIGZpbmFsbHkgdHJhaW5lZCB0byBjYXRjaCB0aGUgZXhhY3QgbW9tZW50IGJldHdlZW4gcmF3IGFuZCBwZXJmZWN0IGFuZCBzY29yY2hlZC4gTGkgbm9kcywgc2F0aXNmaWVkLiAnWW91IGFjdHVhbGx5IGxlYXJuZWQgaXQuIE5vdCBtZW1vcmlzZWQuIExlYXJuZWQuJwoKU2hlIGhhcyBub3RoaW5nIHBoeXNpY2FsIHRvIGdpdmUgeW91IOKAlCBubyBqYXIsIG5vIHBhY2tldCwganVzdCB0aGUgc2tpbGwgaXRzZWxmLCBub3cgZ2VudWluZWx5IHlvdXJzLiAnV3JpdGUgaXQgZG93biBwcm9wZXJseSwgdGhvdWdoLCBmb3Igd2hvZXZlciBjb21lcyBhZnRlciB5b3UuIFNvbWUgdGhpbmdzIGZhZGUgaWYgdGhleSdyZSBub3QgcHV0IGludG8gd29yZHMgZXZlbnR1YWxseSwgZXZlbiBza2lsbHMgbGlrZSB0aGlzIG9uZS4n',
            'choices' => [
                ['text' => 'V3JpdGUgdGhlIHRlY2huaXF1ZSBkb3du', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdyaXRlIHRoZSB0ZWNobmlxdWUgY2FyZWZ1bGx5IG9udG8gYSBjYXJkLCBwaW5uaW5nIGl0IGluc2lkZSB0aGUgc3BpY2UgYm94J3MgbGlkIOKAlCB0aGUgZXhhY3Qgc21lbGwgb2YgcHJvcGVybHkgdG9hc3RlZCBjaGlsaSBhbmQgcGVwcGVyY29ybiwgZGVzY3JpYmVkIGFzIHByZWNpc2VseSBhcyB3b3JkcyBjYW4gbWFuYWdlLCBhIHBlcm1hbmVudCByZWNvcmQgb2YgYSBza2lsbCB0aGF0IHRvb2sgYSB3aG9sZSBhZnRlcm5vb24gb2YgZ2VudWluZSwgaHVtYmxpbmcgcHJhY3RpY2UgdG8gYWN0dWFsbHkgZWFybi4KCkJydW5vIHJlYWRzIGl0IG92ZXIgeW91ciBzaG91bGRlciB3aXRoIHJlYWwgc2F0aXNmYWN0aW9uLiAnVGhhdCdzIG5vdCBub3RoaW5nLCB5b3Uga25vdy4gVGhhdCdzIHRoZSBib3ggbGVhcm5pbmcgc29tZXRoaW5nIHRoZSByZWNpcGUgY2FyZCBuZXZlciBhY3R1YWxseSBtYW5hZ2VkIHRvIGNhcHR1cmUuJw==',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBwcm91ZCBvZiBsZWFybmluZyBpdCBwcm9wZXJseQ==', 'next' => '8_end_proud'],
                ['text' => 'U2F5IHlvdSdyZSByZWxpZXZlZCBpdCdzIGZpbmFsbHkgd3JpdHRlbiBkb3duIHNvbWV3aGVyZQ==', 'next' => '8_end_relieved'],
            ],
        ],
        '8_end_proud' => [
            'prose'  => 'J0knbSBob25lc3RseSBwcm91ZCBvZiBsZWFybmluZyBpdCBwcm9wZXJseSwnIHlvdSBzYXksIGFuZCBtZWFuIGl0IOKAlCBhIHNraWxsIGVhcm5lZCB0aHJvdWdoIHJlYWwsIGh1bWJsaW5nIHRyaWFsIHJhdGhlciB0aGFuIHNpbXBseSBoYW5kZWQgb3ZlciBmZWVscyBkaWZmZXJlbnQsIGxvZGdlZCBzb21ld2hlcmUgeW91ciBoYW5kcyBhbmQgbm9zZSB3aWxsIGFjdHVhbGx5IHJlbWVtYmVyLgoKQnJ1bm8gc21pbGVzLiAnWW91IHNob3VsZCBiZSBwcm91ZC4gTm90IGV2ZXJ5b25lJ3MgcGF0aWVudCBlbm91Z2ggdG8gYWN0dWFsbHkgbGVhcm4gc29tZXRoaW5nIGxpa2UgdGhhdCBpbnN0ZWFkIG9mIGp1c3Qgd2FudGluZyB0aGUgc2hvcnRjdXQuJw==',
            'ending' => true,
        ],
        '8_end_relieved' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20ganVzdCByZWxpZXZlZCBpdCdzIGZpbmFsbHkgd3JpdHRlbiBkb3duIHNvbWV3aGVyZSwnIHlvdSBhZG1pdCwgY2hlY2tpbmcgdGhlIGNhcmQgaXMgcHJvcGVybHkgc2VjdXJlZCBpbnNpZGUgdGhlIGxpZC4gJ1dvdWxkIGhhdGUgZm9yIHNvbWV0aGluZyB0aGlzIHNwZWNpZmljIHRvIGp1c3QgZGlzYXBwZWFyIGJlY2F1c2Ugbm9ib2R5IGJvdGhlcmVkIHRvIHJlY29yZCBpdC4nCgpCcnVubyBub2RzLCB1bmRlcnN0YW5kaW5nIGNvbXBsZXRlbHkuICdHb29kIGluc3RpbmN0LiBUaGF0J3MgcmF0aGVyIHRoZSB3aG9sZSBwb2ludCBvZiB0aGlzIGJveCwgaW4gdGhlIGVuZCDigJQgbWFraW5nIHN1cmUgbm90aGluZyBnZXRzIGxvc3QgYWdhaW4gdGhlIHdheSBpdCBhbG1vc3QgZGlkIHRoZSBmaXJzdCB0aW1lLic=',
            'ending' => true,
        ],
    ],
];
