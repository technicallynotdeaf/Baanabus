<?php
return [
    'id'    => 14,
    'title' => 'A Path, Not Just A Shape',
    'color' => '#2A4A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'R3JlYXQgQmFycmllciBJc2xhbmQgcmlzZXMgZ3JlZW4gYW5kIHJ1Z2dlZCBvdXQgb2YgdGhlIEhhdXJha2kgR3VsZiwgYW5vdGhlciBvZiBOZXcgWmVhbGFuZCdzIG93biBkYXJrLXNreSBzYW5jdHVhcmllcywgdGhlIHNlYSBhaXIgY2Fycnlpbmcgc2FsdCBhbmQgcGluZSBhcyB0aGUgUXVpZXQgSG91ciBkZXNjZW5kcyB0b3dhcmQgYSBzbWFsbCBjb2FzdGFsIHNldHRsZW1lbnQuIFByaXlhIGNoZWNrcyBoZXIgY2hhcnRzIHRob3VnaHRmdWxseS4gJ03EgW9yaSBuYXZpZ2F0b3IgaGVyZSwgYXBwYXJlbnRseS4gQ29yd2luJ3Mgbm90ZXMgc2F5IHRoaXMgcGF0Y2ggaXNuJ3QganVzdCBhIHNoYXBlIOKAlCBpdCdzIGFuIGFjdHVhbCBzYWlsaW5nIHJvdXRlLicKClR3byBjb2FzdGFsIHJvdXRlcyB0b3dhcmQgdGhlIG5hdmlnYXRvcidzIGJvYXRzaGVkIHByZXNlbnQgdGhlbXNlbHZlczogYWxvbmcgdGhlIGV4cG9zZWQgY2xpZmYgcGF0aCwgb3IgdGhyb3VnaCBhIHNoZWx0ZXJlZCBjb2FzdGFsIHRyYWNrIGJlaGluZCB0aGUgZHVuZXMu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZXhwb3NlZCBjbGlmZiBwYXRo', 'next' => '2_cliff'],
                ['text' => 'Rm9sbG93IHRoZSBzaGVsdGVyZWQgY29hc3RhbCB0cmFjaw==', 'next' => '2_track'],
            ],
        ],
        '2_cliff' => [
            'prose'  => 'VGhlIGV4cG9zZWQgY2xpZmYgcGF0aCBvZmZlcnMgYSBnZW51aW5lbHkgc3BlY3RhY3VsYXIgdmlldyBvZiB0aGUgZ3VsZiwgd2F2ZXMgYnJlYWtpbmcgd2hpdGUgYWdhaW5zdCBkYXJrIHJvY2sgZmFyIGJlbG93LCB3aW5kIGNhcnJ5aW5nIHNhbHQgc3ByYXkgdGhlIHdob2xlIGV4cG9zZWQgd2Fsay4gWW91IHJlYWNoIHRoZSBib2F0c2hlZCBhIGxpdHRsZSB3aW5kc3dlcHQsIHRoZSBzZWEncyB3aG9sZSBzY2FsZSBzdGlsbCBzZXR0bGluZyBpbiBiZWhpbmQgeW91Lg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGJvYXRzaGVk', 'next' => '3_shared'],
            ],
        ],
        '2_track' => [
            'prose'  => 'VGhlIHNoZWx0ZXJlZCBjb2FzdGFsIHRyYWNrIGJlaGluZCB0aGUgZHVuZXMga2VlcHMgeW91IG91dCBvZiB0aGUgd29yc3Qgd2luZCwgbmF0aXZlIGJ1c2ggcHJlc3NpbmcgY2xvc2Ugb24gb25lIHNpZGUsIHRoZSBzZWEncyBzdGVhZHkgcmh5dGhtIGF1ZGlibGUgYnV0IGhpZGRlbiBvbiB0aGUgb3RoZXIuIFlvdSByZWFjaCB0aGUgYm9hdHNoZWQgY2FsbWx5LCBwcm9wZXJseSB1bmh1cnJpZWQu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGJvYXRzaGVk', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIG5hdmlnYXRvciwgYW4gb2xkZXIgTcSBb3JpIG1hbiBuYW1lZCBIZW1pLCB3b3JrcyBxdWlldGx5IGF0IGEgaGFsZi1maW5pc2hlZCB3YWthIGh1bGwsIGxvb2tpbmcgdXAgd2l0aCBpbW1lZGlhdGUgcmVjb2duaXRpb24gd2hlbiB5b3Ugc2hvdyBoaW0gdGhlIGF0bGFzLiAnS3VhIHJvYSBhaGF1IGUgdGF0YXJpIGFuYSwnIGhlIHNheXMsIHNtaWxpbmcg4oCUICpJJ3ZlIGJlZW4gd2FpdGluZyBhIHdoaWxlKiDigJQgYmVmb3JlIHN3aXRjaGluZyBlYXNpbHkgdG8gRW5nbGlzaC4gJ1lvdXIgZ3JlYXQtdW5jbGUgdW5kZXJzdG9vZCBzb21ldGhpbmcgbW9zdCB2aXNpdG9ycyBtaXNzLiBUaGlzIHBhdGNoIGlzbid0IGEgc2hhcGUuIEl0J3MgYSBwYXRoLicKCkhlIHN0dWRpZXMgeW91LiAnQXJlIHlvdSByZWFkeSB0byBsZWFybiBhIHJvdXRlLCBub3QganVzdCBhIHBpY3R1cmU/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSByZWFkeSB0byBsZWFybiB0aGUgcm91dGU=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SGVtaSBvZmZlcnMgdHdvIHdheXMgdG8gcHJvcGVybHkgbGVhcm4gdGhlIHN0YXItcGF0aDogc2l0IHdpdGggaGltIGF0IHRoZSBib2F0c2hlZCB0YWJsZSB3aGlsZSBoZSB0cmFjZXMgdGhlIHdob2xlIHZveWFnZSBvbiBhbiBvbGQgcGFwZXIgY2hhcnQsIHN0YXIgYnkgc3Rhciwgb3Igd2FsayBkb3duIHRvIHRoZSBhY3R1YWwgc2hvcmVsaW5lIHdpdGggaGltLCB3aGVyZSBoZSdsbCBwb2ludCBvdXQgZWFjaCBzdGFyJ3MgcG9zaXRpb24gZGlyZWN0bHkgYWdhaW5zdCB0aGUgcmVhbCBob3Jpem9uIGl0IG9uY2UgZ3VpZGVkIHNhaWxvcnMgYWNyb3NzLgoKJ0VpdGhlciB0ZWFjaGVzIHRoZSBwYXRoIHByb3Blcmx5LCcgaGUgc2F5cy4gJ0NoYXJ0LCBvciBzaG9yZWxpbmUuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'VHJhY2UgdGhlIHZveWFnZSBvbiB0aGUgY2hhcnQ=', 'next' => '5_chart'],
                ['text' => 'TGVhcm4gaXQgZnJvbSB0aGUgYWN0dWFsIHNob3JlbGluZQ==', 'next' => '5_shoreline'],
            ],
        ],
        '5_chart' => [
            'prose'  => 'VHJhY2luZyB0aGUgdm95YWdlIG9uIHRoZSBvbGQgcGFwZXIgY2hhcnQgbWVhbnMgZm9sbG93aW5nIEhlbWkncyBjYXJlZnVsIGZpbmdlciBzdGFyIGJ5IHN0YXIgYWNyb3NzIGEgcm91dGUgdGhhdCBvbmNlIGNhcnJpZWQgYW5jZXN0b3JzIHNhZmVseSBhY3Jvc3Mgb3BlbiBvY2VhbiwgZWFjaCBwb2ludCBuYW1lZCBhbmQgZXhwbGFpbmVkIGluIHR1cm4sIHRoZSB3aG9sZSBwYXRoJ3MgbG9naWMgc2xvd2x5LCBwcm9wZXJseSBhc3NlbWJsaW5nIGl0c2VsZiBvbiBwYXBlci4KCkJ5IHRoZSBlbmQsIHlvdSB1bmRlcnN0YW5kIHRoZSBzaGFwZSBub3QgYXMgYSBwaWN0dXJlLCBidXQgYXMgYSBqb3VybmV5IHdpdGggYSBiZWdpbm5pbmcgYW5kIGFuIGVuZC4=',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgc3Rhci1wYXRoIGludG8gdGhlIGF0bGFz', 'next' => '6_shared'],
            ],
        ],
        '5_shoreline' => [
            'prose'  => 'TGVhcm5pbmcgaXQgZnJvbSB0aGUgYWN0dWFsIHNob3JlbGluZSBtZWFucyBzdGFuZGluZyB3aGVyZSB3YXZlcyBtZWV0IHNhbmQgYXMgSGVtaSBwb2ludHMgb3V0IGVhY2ggc3RhciBkaXJlY3RseSBhZ2FpbnN0IHRoZSByZWFsIGhvcml6b24sIHRoZSBzdGFyLXBhdGgncyBsb2dpYyBsYW5kaW5nIGNvbnNpZGVyYWJseSBtb3JlIHZpc2NlcmFsbHkgd2l0aCBhY3R1YWwgd2luZCBhbmQgYWN0dWFsIHNlYSBwcm92aWRpbmcgdGhlIGV4YWN0IGNvbnRleHQgaXQgd2FzIGFsd2F5cyBtZWFudCBmb3IuCgpCeSB0aGUgZW5kLCB0aGUgcGF0aCBmZWVscyBsZXNzIGxpa2UgaW5mb3JtYXRpb24gYW5kIG1vcmUgbGlrZSBzb21ldGhpbmcgeW91IGNvdWxkIGdlbnVpbmVseSBmb2xsb3cgeW91cnNlbGYsIGdpdmVuIHRoZSBjaGFuY2Uu',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgc3Rhci1wYXRoIGludG8gdGhlIGF0bGFz', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIHN0YXItcGF0aCBpbnRvIHRoZSBhdGxhcydzIGJsYW5rIHBhdGNoLCBwbG90dGluZyBpdCBub3QgYXMgYSBzdGF0aWMgc2hhcGUgYnV0IGFzIGEgc2VxdWVuY2UsIGFycm93cyBhbmQgbm90ZXMgbWFya2luZyB0aGUgdm95YWdlJ3MgYWN0dWFsIGRpcmVjdGlvbiB0aGUgd2F5IEhlbWkgZGVzY3JpYmVkIGl0LiBIZSByZXZpZXdzIHlvdXIgd29yayB3aXRoIHF1aWV0IGFwcHJvdmFsLgoKJ0dvb2QsJyBoZSBzYXlzLiAnWW91ciBncmVhdC11bmNsZSBkcmV3IGl0IHRoZSBzYW1lIHdheSwgYWxsIHRob3NlIHllYXJzIGJhY2sg4oCUIGEgcGF0aCwgbm90IGp1c3Qgc3RhcnMuIFNvbWUgdGhpbmdzIGluIHRoZSBza3kgYXJlIG1lYW50IHRvIGJlIGZvbGxvd2VkLCBub3QganVzdCBhZG1pcmVkLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0b3dhcmQgdGhlIFF1aWV0IEhvdXIgYXMgZXZlbmluZyBwcm9wZXJseSBzZXR0bGVzIG92ZXIgdGhlIGd1bGYsIHdhdmVzIGJyZWFraW5nIHN0ZWFkaWx5IGFnYWluc3QgZGFyayByb2NrLCB0aGUgc3Rhci1wYXRoIG5vdyBzYWZlbHksIHByb3Blcmx5IHJlY29yZGVkLiBQcml5YSdzIHdhaXRpbmcgd2l0aCB0aGUgdGhlcm1vcywgZ2VudWluZWx5IGN1cmlvdXMgYWJvdXQgd2hhdCB5b3UgbGVhcm5lZC4KCidBIHBhdGgsIG5vdCBhIHBpY3R1cmUsJyBzaGUgcmVwZWF0cywgdHVybmluZyB0aGUgaWRlYSBvdmVyLiAnTmV2ZXIgdGhvdWdodCBvZiBhIGNvbnN0ZWxsYXRpb24gdGhhdCB3YXkgYmVmb3JlLic=',
            'choices' => [
                ['text' => 'U2F5IGl0IGNoYW5nZWQgaG93IHlvdSdsbCBsb29rIGF0IGV2ZXJ5IHNreSBmcm9tIG5vdyBvbg==', 'next' => '8_end_changed'],
                ['text' => 'U2F5IHlvdSB3aXNoIHlvdSBjb3VsZCBhY3R1YWxseSBzYWlsIHRoYXQgcm91dGUgeW91cnNlbGYgc29tZWRheQ==', 'next' => '8_end_sail'],
            ],
        ],
        '8_end_changed' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBjaGFuZ2VkIGhvdyBJJ2xsIGxvb2sgYXQgZXZlcnkgc2t5IGZyb20gbm93IG9uLCcgeW91IGFkbWl0LCB3YXRjaGluZyB0aGUgbGFzdCBsaWdodCBmYWRlIG92ZXIgdGhlIGd1bGYuICdOb3QganVzdCBzaGFwZXMgdG8gYWRtaXJlLiBNYXliZSBzb21lIG9mIHRoZW0gYXJlIGFjdHVhbGx5IG1lYW50IHRvIHRha2UgeW91IHNvbWV3aGVyZSwgaWYgeW91IGtub3cgaG93IHRvIHJlYWQgdGhlbSBwcm9wZXJseS4nCgpQcml5YSBub2RzIHNsb3dseSwgZ2VudWluZWx5IG1vdmVkIGJ5IHRoZSB0aG91Z2h0LiAnVGhhdCdzIGEgZ29vZCB3YXkgdG8gY2FycnkgdGhpcyBmb3J3YXJkLiBDb3J3aW4gd291bGQgbGlrZSB0aGF0IHJlYWRpbmcgb2YgaXQsIEkgdGhpbmsuJw==',
            'ending' => true,
        ],
        '8_end_sail' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIHdpc2ggSSBjb3VsZCBhY3R1YWxseSBzYWlsIHRoYXQgcm91dGUgbXlzZWxmIHNvbWVkYXksJyB5b3Ugc2F5LCBsb29raW5nIG91dCBhdCB0aGUgZGFya2VuaW5nIHdhdGVyIHdoZXJlIHRoZSBhbmNlc3RvcnMnIHBhdGggb25jZSBsZWQuICdGZWVscyBpbmNvbXBsZXRlLCBqdXN0IGRyYXdpbmcgaXQgb24gcGFwZXIuIExpa2UgaXQncyBtZWFudCB0byBiZSBsaXZlZCwgbm90IGp1c3QgcmVjb3JkZWQuJwoKUHJpeWEgY29uc2lkZXJzIHRoYXQgc2VyaW91c2x5LiAnTWF5YmUgdGhhdCdzIGEgdHJpcCBmb3IgYWZ0ZXIgdGhpcyBvbmUuIE5vIHJlYXNvbiB0aGUgYXRsYXMgaGFzIHRvIGJlIHRoZSBvbmx5IGpvdXJuZXkgeW91IHRha2UgZnJvbSBoZXJlLicgVGhlIFF1aWV0IEhvdXIgbGlmdHMgb2ZmIGdlbnRseSBvdmVyIHRoZSBndWxmLCBHcmVhdCBCYXJyaWVyIElzbGFuZCdzIGRhcmsgc2hvcmVsaW5lIHNocmlua2luZyBiZWxvdyBpbnRvIHRoZSBzdGFyLXRoaWNrIG5pZ2h0Lg==',
            'ending' => true,
        ],
    ],
];
