<?php
return [
    'id'    => 17,
    'title' => 'A Small Mystery, Easily Solved',
    'color' => '#2A5A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'SmFzcGVyJ3MgZGVuc2UgcGluZSBmb3Jlc3QgcmlzZXMgZGFyayBhbmQgZnJhZ3JhbnQgYmVuZWF0aCBvbmUgb2YgdGhlIGxhcmdlc3QgZGFyay1za3kgcHJlc2VydmVzIG9uIHRoZSBjb250aW5lbnQsIHRoZSBSb2NraWVzJyBqYWdnZWQgc2lsaG91ZXR0ZSB2aXNpYmxlIHRocm91Z2ggZ2FwcyBpbiB0aGUgY2Fub3B5IGFzIGR1c2sgcHJvcGVybHkgc2V0dGxlcy4gUHJpeWEgbGFuZHMgbmVhciBhIHNtYWxsIHJhbmdlciBzdGF0aW9uLiAnUmFuZ2VyJ3MgZXhwZWN0aW5nIHVzLCcgc2hlIHNheXMuICdDb3J3aW4ncyBub3RlcyBtZW50aW9uIHNvbWV0aGluZyBvZGQgaGVyZSDigJQgYSBzbWFsbCBteXN0ZXJ5IGFib3V0IGhpcyBvd24gdmlzaXQsIGRlY2FkZXMgYmFjay4nCgpUd28gZm9yZXN0IHJvdXRlcyB0b3dhcmQgdGhlIHJhbmdlciBzdGF0aW9uIHByZXNlbnQgdGhlbXNlbHZlczogdGhlIG1hcmtlZCBoaWtpbmcgdHJhaWwsIG9yIGEgc2hvcnRlciwgdW5tYXJrZWQgcm91dGUgdGhyb3VnaCBkZW5zZXIgdHJlZXMu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFya2VkIGhpa2luZyB0cmFpbA==', 'next' => '2_trail'],
                ['text' => 'Q3V0IHRocm91Z2ggdGhlIHVubWFya2VkIGRlbnNlciByb3V0ZQ==', 'next' => '2_dense'],
            ],
        ],
        '2_trail' => [
            'prose'  => 'VGhlIG1hcmtlZCBoaWtpbmcgdHJhaWwgd2luZHMgYSBjb21mb3J0YWJsZSwgd2VsbC1zaWduZWQgcGF0aCB0aHJvdWdoIHRoZSBwaW5lcywgZXZlbmluZyBiaXJkc29uZyBmYWRpbmcgZ3JhZHVhbGx5IGludG8gdGhlIGRlZXBlciBxdWlldCBvZiBhcHByb2FjaGluZyBuaWdodC4gWW91IHJlYWNoIHRoZSByYW5nZXIgc3RhdGlvbiBwcm9tcHRseSwgZm9sbG93aW5nIGNsZWFyIGRpcmVjdGlvbnMgdGhlIHdob2xlIHdheS4=',
            'choices' => [
                ['text' => 'TWVldCB0aGUgcmFuZ2Vy', 'next' => '3_shared'],
            ],
        ],
        '2_dense' => [
            'prose'  => 'VGhlIHVubWFya2VkIGRlbnNlciByb3V0ZSBjdXRzIG1vcmUgZGlyZWN0bHkgdGhyb3VnaCB0aGljayBwaW5lIGNvdmVyLCBicmFuY2hlcyBjbG9zZSBvbiBldmVyeSBzaWRlLCB0aGUgZm9yZXN0J3MgcXVpZXQgcHJlc3NpbmcgaW4gd2l0aCByZWFsLCBjbG9zZSBpbnRpbWFjeS4gWW91IHJlYWNoIHRoZSBzdGF0aW9uIGEgbGl0dGxlIHNjcmF0Y2hlZCwgaGF2aW5nIHByb3Blcmx5IGZlbHQgdGhlIGZvcmVzdCdzIHJhdyBkZW5zaXR5Lg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgcmFuZ2Vy', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHJhbmdlciwgYSB3b21hbiBuYW1lZCBDb2xldHRlIHdobydzIGNsZWFybHkgc3BlbnQgeWVhcnMgbWFuYWdpbmcgdGhpcyBleGFjdCBwcmVzZXJ2ZSwgZ3JlZXRzIHlvdSB3YXJtbHksIHRoZW4gcHVsbHMgb3V0IGFuIG9sZCBsb2dib29rIHRoZSBtb21lbnQgQ29yd2luJ3MgbmFtZSBjb21lcyB1cC4gJ0Z1bm55IHRoaW5nLCcgc2hlIHNheXMuICdZb3VyIGdyZWF0LXVuY2xlJ3MgdmlzaXQgaGVyZSBnb3QgYSBsaXR0bGUgdGFuZ2xlZCBpbiBsb2NhbCBtZW1vcnkgb3ZlciB0aGUgeWVhcnMg4oCUIHRoZXJlJ3MgYSBmYW1pbHkgc3RvcnkgdGhhdCBzYXlzIGhlIGFycml2ZWQgYnkgc2VhIGtheWFrIGRvd24gdGhlIHJpdmVyLiBSZWNvcmRzIGhlcmUgc2F5IGhlIGFjdHVhbGx5IGNhbWUgYnkgcm9hZCwgc2FtZSBhcyBldmVyeW9uZSBlbHNlLicKClNoZSBzdHVkaWVzIHRoZSBhdGxhcydzIG5leHQgYmxhbmsgcGF0Y2guICdTbWFsbCBteXN0ZXJ5LCBlYXNpbHkgc29sdmVkLCBpZiB5b3UncmUgY3VyaW91cy4gV2FudCBtZSB0byBjbGVhciBpdCB1cCBiZWZvcmUgd2UgZ2V0IHRvIHRoZSByaWRkbGUgaXRzZWxmPyc=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhlciB0byBjbGVhciB1cCB0aGUgbXlzdGVyeSBmaXJzdA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'Q29sZXR0ZSBvZmZlcnMgdHdvIHdheXMgdG8gcHJvcGVybHkgdW50YW5nbGUgdGhlIHNtYWxsIG15c3Rlcnk6IHNob3cgeW91IHRoZSBhY3R1YWwgbG9nYm9vayBlbnRyeSBmcm9tIENvcndpbidzIHZpc2l0LCBzZXR0bGluZyB0aGUgcXVlc3Rpb24gd2l0aCBkaXJlY3QgZG9jdW1lbnRhcnkgZXZpZGVuY2UsIG9yIHRlbGwgeW91IGluc3RlYWQgaG93IHRoZSBrYXlhayBzdG9yeSBsaWtlbHkgc3RhcnRlZCDigJQgYSBtaXNoZWFyaW5nLCBwYXNzZWQgZG93biBhbmQgZW1iZWxsaXNoZWQsIG9mIGFuIGVudGlyZWx5IGRpZmZlcmVudCwgdW5yZWxhdGVkIHZpc2l0b3IncyBzdG9yeS4KCidFaXRoZXIgc2F0aXNmaWVzIHRoZSBjdXJpb3NpdHksJyBzaGUgc2F5cy4gJ0hhcmQgZXZpZGVuY2UsIG9yIHRoZSBsaWtlbHkgZXhwbGFuYXRpb24gZm9yIGhvdyB0aGUgbXl0aCBzdGFydGVkLiBZb3VyIGNob2ljZS4n',
            'choices' => [
                ['text' => 'U2VlIHRoZSBhY3R1YWwgbG9nYm9vayBlbnRyeQ==', 'next' => '5_logbook'],
                ['text' => 'SGVhciBob3cgdGhlIG15dGggbGlrZWx5IHN0YXJ0ZWQ=', 'next' => '5_myth'],
            ],
        ],
        '5_logbook' => [
            'prose'  => 'U2VlaW5nIHRoZSBhY3R1YWwgbG9nYm9vayBlbnRyeSBzZXR0bGVzIGl0IHBsYWlubHkg4oCUIENvcndpbidzIG93biBzaWduYXR1cmUsIGRhdGVkLCBhcnJpdmFsIGJ5IHJvYWQgY2xlYXJseSBub3RlZCBhbG9uZ3NpZGUgYSBicmllZiBjb21tZW50IGFib3V0IHRoZSBwcmVzZXJ2ZSdzIHJlbWFya2FibGUgZGFya25lc3MuIFRoZSBrYXlhayBzdG9yeSwgd2hhdGV2ZXIgaXRzIG9yaWdpbiwgc2ltcGx5IGlzbid0IHN1cHBvcnRlZCBieSB0aGUgcmVjb3JkIGF0IGFsbC4KCkl0J3MgYSBzbWFsbCwgc2F0aXNmeWluZyBjb3JyZWN0aW9uIHRvIGNhcnJ5IGJhY2sgdG8gdGhlIHJlc3Qgb2YgdGhlIGZhbWlseS4=',
            'choices' => [
                ['text' => 'TW92ZSBvbiB0byB0aGUgYWN0dWFsIHJpZGRsZQ==', 'next' => '6_shared'],
            ],
        ],
        '5_myth' => [
            'prose'  => 'SGVhcmluZyBob3cgdGhlIG15dGggbGlrZWx5IHN0YXJ0ZWQgaXMgaXRzIG93biBzbWFsbCBwbGVhc3VyZSDigJQgQ29sZXR0ZSB0cmFjZXMgaXQgdG8gYW4gZW50aXJlbHkgZGlmZmVyZW50IHZpc2l0b3IsIGRlY2FkZXMgbGF0ZXIsIHdobyBnZW51aW5lbHkgZGlkIGFycml2ZSBieSBrYXlhayBhbmQgd2hvc2Ugc3Rvcnkgc2ltcGx5IGdvdCBxdWlldGx5IGZvbGRlZCBpbnRvIENvcndpbidzIG92ZXIgeWVhcnMgb2YgcmV0ZWxsaW5nLCB0d28gdHJhdmVsbGVycyBtZXJnZWQgaW50byBvbmUgY29udmVuaWVudCBsZWdlbmQuCgpJdCdzIGEgZ2VudGxlLCBodW1hbiBleHBsYW5hdGlvbiBmb3IgaG93IHNtYWxsIGZhbWlseSBteXRocyBxdWlldGx5LCBoYXJtbGVzc2x5IGdyb3cu',
            'choices' => [
                ['text' => 'TW92ZSBvbiB0byB0aGUgYWN0dWFsIHJpZGRsZQ==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2l0aCB0aGUgc21hbGwgbXlzdGVyeSBwcm9wZXJseSBzZXR0bGVkLCBDb2xldHRlIHR1cm5zIHRvIHRoZSBhY3R1YWwgcmlkZGxlLCBoZXIgYWNjb3VudCByaWNoIHdpdGggdGhlIHByZXNlcnZlJ3Mgb3duIGNhcmVmdWwgZGFyay1za3kgdHJhZGl0aW9uLCB0aGUgY29uc3RlbGxhdGlvbidzIHNoYXBlIGVtZXJnaW5nIGNsZWFybHkgYWdhaW5zdCB0aGUgcGluZXMuIFlvdSBkcmF3IGl0IGludG8gdGhlIGF0bGFzLCBhZGRpbmcgYSBzbWFsbCBtYXJnaW5hbCBub3RlIGNvcnJlY3RpbmcgdGhlIGtheWFrIG15dGggZm9yIHdob2V2ZXIgaW4gdGhlIGZhbWlseSByZWFkcyB0aGlzIHByb3Blcmx5LCBsYXRlci4KCidOaWNlLCB0aWR5aW5nIHVwIGEgbG9vc2UgdGhyZWFkIGxpa2UgdGhhdCwnIENvbGV0dGUgc2F5cywgcGxlYXNlZC4gJ1NtYWxsIGNvcnJlY3Rpb25zIG1hdHRlciB0b28sIGFsb25nc2lkZSB0aGUgYmlnIHJpZGRsZXMuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0aHJvdWdoIHRoZSBkYXJrZW5pbmcgcGluZXMsIHRoZSBzbWFsbCBteXN0ZXJ5IHJlc29sdmVkIGFuZCB0aGUgY29uc3RlbGxhdGlvbiBwcm9wZXJseSByZWNvcmRlZCwgdGhlIFJvY2tpZXMnIGphZ2dlZCBzaWxob3VldHRlIG5vdyBiYXJlbHkgdmlzaWJsZSBhZ2FpbnN0IGEgc2t5IGdvbmUgZnVsbHkgZGFyay4gUHJpeWEncyB3YWl0aW5nIHdpdGggdGhlIHRoZXJtb3MsIGFtdXNlZCBieSB0aGUgd2hvbGUgZGV0b3VyIGludG8gZmFtaWx5IG15dGgtYnVzdGluZy4KCidLYXlhayBzdG9yeSwnIHNoZSBzYXlzLCBzaGFraW5nIGhlciBoZWFkLiAnV29uZGVyIGhvdyBtYW55IG90aGVyIGxpdHRsZSBteXRocyBhcmUgdGFuZ2xlZCB1cCBpbiB3aGF0IHdlIHRoaW5rIHdlIGtub3cgYWJvdXQgaGltLic=',
            'choices' => [
                ['text' => 'U2F5IHlvdSdkIGxpa2UgdG8gdHJhY2sgZG93biBtb3JlIG9mIHRob3NlIHNtYWxsIGNvcnJlY3Rpb25z', 'next' => '8_end_corrections'],
                ['text' => 'U2F5IHRoZSBteXRocyBkb24ndCByZWFsbHkgbWF0dGVyIG5leHQgdG8gdGhlIHJlYWwgcmlkZGxlcw==', 'next' => '8_end_riddles'],
            ],
        ],
        '8_end_corrections' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ2QgbGlrZSB0byB0cmFjayBkb3duIG1vcmUgb2YgdGhvc2Ugc21hbGwgY29ycmVjdGlvbnMsJyB5b3UgYWRtaXQsIHR1cm5pbmcgdGhlIHRpZHkgbG9nYm9vayBteXN0ZXJ5IG92ZXIgaW4geW91ciBtaW5kLiAnRmVlbHMgbGlrZSB0aGVyZSdzIGEgd2hvbGUgcXVpZXRlciBzdG9yeSBhYm91dCBoaW0sIHVuZGVybmVhdGggdGhlIGJpZyByaWRkbGVzLCBtYWRlIG9mIGxpdHRsZSB0aGluZ3MgbGlrZSB0aGlzLicKClByaXlhIG5vZHMsIGludHJpZ3VlZCBieSB0aGUgaWRlYSBoZXJzZWxmLiAnTWlnaHQgYmUgd29ydGgga2VlcGluZyBhbiBlYXIgb3V0IGZvciwgdGhlIHJlc3Qgb2YgdGhlIHdheS4gTmV2ZXIga25vdyB3aGF0IGVsc2UgaGFzIGdvdHRlbiBxdWlldGx5IHRhbmdsZWQgb3ZlciB0aGUgeWVhcnMuJw==',
            'ending' => true,
        ],
        '8_end_riddles' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgbXl0aHMgZG9uJ3QgcmVhbGx5IG1hdHRlciBuZXh0IHRvIHRoZSByZWFsIHJpZGRsZXMsJyB5b3Ugc2F5LCB0aGlua2luZyBvZiB0aGUgYXRsYXMncyBhY3R1YWwsIGNhcmVmdWwgcHVycG9zZS4gJ05pY2UgbGl0dGxlIGRldG91ciwgYnV0IHRoZSBza3ktbG9yZSdzIHRoZSByZWFsIHdvcmsgaGVyZS4gRG9uJ3Qgd2FudCB0byBnZXQgZGlzdHJhY3RlZCBjaGFzaW5nIGV2ZXJ5IHNtYWxsIGxlZ2VuZCBhbG9uZyB0aGUgd2F5LicKClByaXlhIHNocnVncywgYW1lbmFibGUuICdGYWlyIGVub3VnaC4gUHJhY3RpY2FsLCBhbmQgcHJvYmFibHkgcmlnaHQuJyBUaGUgUXVpZXQgSG91ciBsaWZ0cyBvZmYgdGhyb3VnaCBKYXNwZXIncyBkZW5zZSwgZnJhZ3JhbnQgcGluZXMsIHRoZSBSb2NraWVzJyBzaWxob3VldHRlIHNocmlua2luZyBpbnRvIGZ1bGwgZGFya25lc3MgYmVoaW5kIHlvdS4=',
            'ending' => true,
        ],
    ],
];
