<?php
return [
    'id'    => 20,
    'title' => 'A Story With No Single Owner',
    'color' => '#5A6A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'U2FyayByaXNlcyBzbWFsbCBhbmQgY2FyLWZyZWUgb3V0IG9mIHRoZSBFbmdsaXNoIENoYW5uZWwsIHRoZSB3b3JsZCdzIGZpcnN0IG9mZmljaWFsbHkgZGVzaWduYXRlZCBEYXJrIFNreSBJc2xhbmQsIGl0cyBjb21wbGV0ZSBhYnNlbmNlIG9mIHN0cmVldGxpZ2h0cyBtYWtpbmcgdGhlIHdob2xlIHBsYWNlIGZlZWwgZ2VudGx5IHN1c3BlbmRlZCBvdXQgb2YgdGltZSBhcyBkdXNrIHByb3Blcmx5IHNldHRsZXMuIFByaXlhIGxhbmRzIGNhcmVmdWxseSBvbiBhIG1vZGVzdCBncmFzcyBzdHJpcC4gJ1dob2xlIGNvbW11bml0eSBhcHBhcmVudGx5IHRlbGxzIHRoaXMgcmlkZGxlIHRvZ2V0aGVyLCcgc2hlIHNheXMuICdPZGQgbm90ZSBpbiBDb3J3aW4ncyB3cml0aW5nIOKAlCBzZXZlcmFsIHBlb3BsZSwgZmluaXNoaW5nIGVhY2ggb3RoZXIncyBzZW50ZW5jZXMuJwoKVHdvIGlzbGFuZCByb3V0ZXMgdG93YXJkIHRoZSB2aWxsYWdlIGdyZWVuIHByZXNlbnQgdGhlbXNlbHZlczogYWxvbmcgdGhlIGNsaWZmLXRvcCBwYXRoLCBvciB0aHJvdWdoIHRoZSBpc2xhbmQncyBxdWlldCBpbnRlcmlvciBsYW5lcy4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgY2xpZmYtdG9wIHBhdGg=', 'next' => '2_cliff'],
                ['text' => 'Rm9sbG93IHRoZSBxdWlldCBpbnRlcmlvciBsYW5lcw==', 'next' => '2_lanes'],
            ],
        ],
        '2_cliff' => [
            'prose'  => 'VGhlIGNsaWZmLXRvcCBwYXRoIG9mZmVycyBkcmFtYXRpYyB2aWV3cyBvZiB0aGUgQ2hhbm5lbCBiZWxvdywgd2F2ZXMgYnJlYWtpbmcgYWdhaW5zdCBkYXJrIHJvY2ssIHRoZSBpc2xhbmQncyB0aW55IHNjYWxlIHByb3Blcmx5IGFwcGFyZW50IGFnYWluc3QgdGhlIHZhc3Qgc3Vycm91bmRpbmcgc2VhLiBZb3UgcmVhY2ggdGhlIHZpbGxhZ2UgZ3JlZW4gYSBsaXR0bGUgd2luZHN3ZXB0LCBldmVuaW5nIHZvaWNlcyBhbHJlYWR5IGF1ZGlibGUgYWhlYWQu',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIHZpbGxhZ2UgZ3JlZW4=', 'next' => '3_shared'],
            ],
        ],
        '2_lanes' => [
            'prose'  => 'VGhlIHF1aWV0IGludGVyaW9yIGxhbmVzIHdpbmQgYmV0d2VlbiBzbWFsbCBzdG9uZSBjb3R0YWdlcyBhbmQgaGVkZ2Vyb3dzLCB1dHRlcmx5IHNpbGVudCBidXQgZm9yIGJpcmRzb25nIGFuZCB0aGUgZGlzdGFudCBzZWEsIHRoZSBpc2xhbmQncyBmYW1vdXMgZGFya25lc3MgYWxyZWFkeSBiZWdpbm5pbmcgdG8gcHJvcGVybHkgc2V0dGxlLiBZb3UgcmVhY2ggdGhlIHZpbGxhZ2UgZ3JlZW4gY2FsbWx5LCB2b2ljZXMgY2Fycnlpbmcgd2FybWx5IGFjcm9zcyB0aGUgc21hbGwgc3BhY2Uu',
            'choices' => [
                ['text' => 'UmVhY2ggdGhlIHZpbGxhZ2UgZ3JlZW4=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'T24gdGhlIHZpbGxhZ2UgZ3JlZW4sIGEgc21hbGwgZ3JvdXAgb2YgaXNsYW5kZXJzIHNpdHMgd2FpdGluZywgYW5kIHRoZSBtb21lbnQgeW91IHNob3cgdGhlbSB0aGUgYXRsYXMsIHRoZXkgYmVnaW4gdGhlIHJpZGRsZSB0b2dldGhlciDigJQgb25lIHN0YXJ0cyBhIHNlbnRlbmNlLCBhbm90aGVyIGZpbmlzaGVzIGl0LCBhIHRoaXJkIGFkZHMgYSBkZXRhaWwgdGhlIGZpcnN0IHR3byBoYWQgYXBwYXJlbnRseSBsZWZ0IG91dCwgdGhlIHdob2xlIHRlbGxpbmcgYSBnZW51aW5lLCBzZWFtbGVzcyBjb2xsZWN0aXZlIGVmZm9ydCByYXRoZXIgdGhhbiBhbnkgc2luZ2xlIHBlcnNvbidzIGFjY291bnQuCgpBbiBvbGRlciB3b21hbiBuYW1lZCBDb25zdGFuY2UgY2F0Y2hlcyB5b3VyIHNsaWdodGx5IGJld2lsZGVyZWQgZXhwcmVzc2lvbiBhbmQgbGF1Z2hzIGtpbmRseS4gJ1dlJ3ZlIHRvbGQgaXQgdG9nZXRoZXIgZm9yIHllYXJzLCcgc2hlIHNheXMuICdOb2JvZHkgcmVtZW1iZXJzIGl0IGFsb25lIHByb3Blcmx5IGFueW1vcmUuIFJlYWR5IHRvIGp1c3QgbGV0IHVzIGNhcnJ5IHlvdSB0aHJvdWdoIGl0Pyc=',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSByZWFkeSB0byBiZSBjYXJyaWVkIHRocm91Z2ggaXQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGdyb3VwIG9mZmVycyB0d28gd2F5cyB0byBwcm9wZXJseSByZWNlaXZlIHRoZSBjb2xsZWN0aXZlIHRlbGxpbmc6IHNpdCBxdWlldGx5IGluIHRoZSBtaWRkbGUgb2YgdGhlIGdyb3VwIHdoaWxlIHRoZXkgd2VhdmUgdGhlIHdob2xlIHJpZGRsZSBhcm91bmQgeW91LCB2b2ljZXMgb3ZlcmxhcHBpbmcgYW5kIGNvbXBsZXRpbmcgZWFjaCBvdGhlciBuYXR1cmFsbHksIG9yIGFjdHVhbGx5IGpvaW4gdGhlIGNpcmNsZSB5b3Vyc2VsZiwgYWRkaW5nIHlvdXIgb3duIHNtYWxsIGNvbnRyaWJ1dGlvbiBvbmNlIHlvdSd2ZSBjYXVnaHQgdGhlIHJoeXRobSBvZiBob3cgdGhleSBwYXNzIGl0IGJldHdlZW4gdGhlbS4KCidFaXRoZXIgd2F5IHdvcmtzLCcgQ29uc3RhbmNlIHNheXMuICdTaXQgYW5kIHJlY2VpdmUgaXQsIG9yIGpvaW4gaW4gcHJvcGVybHkuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'U2l0IHF1aWV0bHkgYW5kIHJlY2VpdmUgaXQ=', 'next' => '5_receive'],
                ['text' => 'Sm9pbiB0aGUgY2lyY2xlIGFuZCBjb250cmlidXRl', 'next' => '5_join'],
            ],
        ],
        '5_receive' => [
            'prose'  => 'U2l0dGluZyBxdWlldGx5IGluIHRoZSBtaWRkbGUgb2YgdGhlIGdyb3VwIG1lYW5zIGxldHRpbmcgdGhlIGNvbGxlY3RpdmUgdGVsbGluZyB3YXNoIG92ZXIgeW91IHByb3Blcmx5LCB2b2ljZXMgb3ZlcmxhcHBpbmcgYW5kIGNvbXBsZXRpbmcgZWFjaCBvdGhlciB3aXRoIHRoZSBlYXNlIG9mIHBlb3BsZSB3aG8ndmUgZG9uZSB0aGlzIHRvZ2V0aGVyIGZvciBkZWNhZGVzLCB0aGUgY29uc3RlbGxhdGlvbidzIHNoYXBlIGVtZXJnaW5nIGZyb20gbWFueSBzbWFsbCBwaWVjZXMgcmF0aGVyIHRoYW4gYW55IHNpbmdsZSBhY2NvdW50LgoKQnkgdGhlIGVuZCwgeW91IHVuZGVyc3RhbmQgaXQgbm90IGFzIG9uZSBwZXJzb24ncyBzdG9yeSwgYnV0IGFzIHNvbWV0aGluZyBnZW51aW5lbHksIGNvbW11bmFsbHkgaGVsZC4=',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_join' => [
            'prose'  => 'Sm9pbmluZyB0aGUgY2lyY2xlIHlvdXJzZWxmIG1lYW5zIGNhdGNoaW5nIHRoZSByaHl0aG0gZ3JhZHVhbGx5LCBoZXNpdGFudGx5IGF0IGZpcnN0LCB0aGVuIGZpbmRpbmcgYSBzbWFsbCBnYXAgd2hlcmUgeW91ciBvd24gaGFsdGluZyBjb250cmlidXRpb24gYWN0dWFsbHkgZml0cywgdGhlIGdyb3VwIHdlbGNvbWluZyB5b3VyIGFkZGl0aW9uIHdpdGggZ2VudWluZSB3YXJtdGggcmF0aGVyIHRoYW4gY29ycmVjdGlvbiwgdGhlIHRlbGxpbmcgYmVjb21pbmcsIGJyaWVmbHksIHByb3Blcmx5IHlvdXJzIHRvby4KCkJ5IHRoZSBlbmQsIHlvdSd2ZSBiZWVuIGZvbGRlZCBpbnRvIHRoZSBjb2xsZWN0aXZlIGFjY291bnQsIGhvd2V2ZXIgYnJpZWZseS4=',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMncyBibGFuayBwYXRjaCwgdGhlIHdob2xlIHNtYWxsIGNyb3dkIHdhdGNoaW5nIHdpdGggZ2VudWluZSwgY29sbGVjdGl2ZSBwcmlkZSBhcyB0aGUgcGFnZSBmaW5hbGx5IGNvbXBsZXRlcyBpdHNlbGYuIENvbnN0YW5jZSBhZGRzIGEgbm90ZSBiZXNpZGUgaXQg4oCUIG5vdCBvbmUgbmFtZSwgYnV0IHNldmVyYWwsIGFsbCB3aG8gY29udHJpYnV0ZWQgdG8gdGhlIHRlbGxpbmcsIGV4YWN0bHkgYXMgdGhlIGNvbW11bml0eSBpdHNlbGYgaG9sZHMgdGhlIHN0b3J5LgoKJ1lvdXIgZ3JlYXQtdW5jbGUgdW5kZXJzdG9vZCB0aGF0IHRvbywnIHNoZSBzYXlzLiAnU29tZSBzdG9yaWVzIGFyZW4ndCBtZWFudCB0byBiZWxvbmcgdG8ganVzdCBvbmUgcGVyc29uLiBUaGlzIHdob2xlIGlzbGFuZCdzIGxpa2UgdGhhdCwgcmVhbGx5Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgdGhlbSBhbmQgc3RhcnQgYmFjaw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayBhY3Jvc3MgdGhlIGRhcmtlbmluZyBpc2xhbmQsIHRoZSB2aWxsYWdlIGdyZWVuJ3Mgd2FybSBjb2xsZWN0aXZlIHZvaWNlcyBmYWRpbmcgZ2VudGx5IGJlaGluZCB5b3UsIFNhcmsncyBjb21wbGV0ZSBhYnNlbmNlIG9mIGFydGlmaWNpYWwgbGlnaHQgbWFraW5nIHRoZSBlbWVyZ2luZyBzdGFycyBmZWVsIGFsbW9zdCBpbXBvc3NpYmx5IGNsb3NlLiBQcml5YSdzIHdhaXRpbmcgd2l0aCB0aGUgdGhlcm1vcywgZ2VudWluZWx5IGRlbGlnaHRlZCBieSB0aGUgd2hvbGUgYWNjb3VudCBvbmNlIHlvdSBkZXNjcmliZSBpdC4KCidBIHN0b3J5IHdpdGggbm8gc2luZ2xlIG93bmVyLCcgc2hlIHNheXMsIHR1cm5pbmcgdGhlIGlkZWEgb3Zlci4gJ1JhdGhlciBsb3ZlbHksIHRoYXQuJw==',
            'choices' => [
                ['text' => 'U2F5IHRoZSBpc2xhbmQgaXRzZWxmIGZlZWxzIGxpa2UgYSBzaGFyZWQgdGhpbmcgdG9v', 'next' => '8_end_shared'],
                ['text' => 'U2F5IGl0IG1hZGUgeW91IHRoaW5rIGFib3V0IHdobyB5b3UnbGwgdGVsbCB0aGlzIHdob2xlIGpvdXJuZXkgdG8gc29tZWRheQ==', 'next' => '8_end_tell'],
            ],
        ],
        '8_end_shared' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgd2hvbGUgaXNsYW5kIGZlZWxzIGxpa2UgYSBzaGFyZWQgdGhpbmcgdG9vLCcgeW91IHNheSwgbG9va2luZyBiYWNrIGF0IHRoZSBzbWFsbCBjbHVzdGVyIG9mIGNvdHRhZ2VzIGFuZCBoZWRnZXJvd3MgZGlzYXBwZWFyaW5nIGludG8gZnVsbCBkYXJrLiAnTm8gY2Fycywgbm8gc3RyZWV0bGlnaHRzLCBldmVyeW9uZSBhcHBhcmVudGx5IGhvbGRpbmcgdGhlIHNhbWUgc3RvcmllcyB0b2dldGhlci4gRmVlbHMgbGlrZSBhIHBsYWNlIGJ1aWx0IGFyb3VuZCBleGFjdGx5IHRoYXQgaWRlYS4nCgpQcml5YSBub2RzLCBnZW51aW5lbHkgY2hhcm1lZCBieSB0aGUgdGhvdWdodC4gJ1RoYXQncyBhIGxvdmVseSB3YXkgdG8gcHV0IGl0LiBHb29kIHN0b3AsIHRoaXMgb25lLiBHbGFkIHdlIGNhbWUuJw==',
            'ending' => true,
        ],
        '8_end_tell' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBtYWRlIG1lIHRoaW5rIGFib3V0IHdobyBJJ2xsIHRlbGwgdGhpcyB3aG9sZSBqb3VybmV5IHRvLCBzb21lZGF5LCcgeW91IGFkbWl0LCB3YXRjaGluZyB0aGUgaXNsYW5kJ3MgZGFyayBzaWxob3VldHRlIHJlY2VkZS4gJ01heWJlIHRoaXMgYXRsYXMgaXNuJ3QgbWVhbnQgdG8gZW5kIHdpdGgganVzdCBtZSBlaXRoZXIuIE1heWJlIGl0J3Mgc3VwcG9zZWQgdG8gYmVjb21lIHNvbWV0aGluZyB0b2xkIHRvZ2V0aGVyIHRvbywgZXZlbnR1YWxseS4nCgpQcml5YSBjb25zaWRlcnMgdGhhdCBzZXJpb3VzbHkuICdUaGF0J3MgYSBnZW51aW5lbHkgZ29vZCB0aG91Z2h0IHRvIGNhcnJ5IHRvd2FyZCB0aGUgZW5kIG9mIHRoaXMuIFdvcnRoIHJlbWVtYmVyaW5nLCBvbmNlIHdlJ3JlIGZpbmFsbHkgaG9tZS4nIFRoZSBRdWlldCBIb3VyIGxpZnRzIGdlbnRseSBvZmYgU2FyaydzIGRhcmssIGNhci1mcmVlIGhpbGxzLCB0aGUgQ2hhbm5lbCdzIGJsYWNrIHdhdGVyIHN0cmV0Y2hpbmcgb3V0IGluIGV2ZXJ5IGRpcmVjdGlvbiBiZWxvdy4=',
            'ending' => true,
        ],
    ],
];
