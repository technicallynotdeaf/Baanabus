<?php
return [
    'id'    => 17,
    'title' => 'Good Heavy',
    'color' => '#A8865A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGltYnVrdHUgcmlzZXMgb3V0IG9mIHRoZSBTYWhhcmEncyBlZGdlIGxpa2UgYSBnZW51aW5lIG1pcmFjbGUgb2YgcGVyc2lzdGVuY2UsIG11ZGJyaWNrIG1vc3F1ZXMgYW5kIGZhbWlseSBsaWJyYXJpZXMgaG9sZGluZyBjZW50dXJpZXMgb2YgbWFudXNjcmlwdHMgdGhhdCByZXByZXNlbnQgb25lIG9mIHRoZSByaWNoZXN0LCBsZWFzdC1rbm93biBpbnRlbGxlY3R1YWwgdHJhZGl0aW9ucyBpbiB0aGUgd29ybGQuIFRoZSB0cmFucy1TYWhhcmFuIGNyb3NzaW5nIHRoYXQgYnJvdWdodCB5b3UgaGVyZSB3YXMgZ2VudWluZWx5IGdydWVsbGluZywgYW5kIFRvbWFzIGxvb2tzIGFzIHJlbGlldmVkIGFzIHlvdSBmZWVsIHRvIGZpbmFsbHkgc2VlIHRoZSBjaXR5J3MgbG93IHNreWxpbmUuCgpUd28gZGVzZXJ0LWFwcHJvYWNoIHJvdXRlcyBpbnRvIHRoZSBjaXR5IHByZXNlbnQgdGhlbXNlbHZlczogdGhyb3VnaCB0aGUgbWFpbiBjYXJhdmFuIGdhdGUsIHdoZXJlIGNhbWVsIHRyYWlucyBoYXZlIGFycml2ZWQgZm9yIGNlbnR1cmllcywgb3IgYSBxdWlldGVyIHNpZGUgYXBwcm9hY2ggZmF2b3VyZWQgYnkgc2Nob2xhcnMgYW5kIG1hbnVzY3JpcHQgdHJhZGVycy4=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhyb3VnaCB0aGUgbWFpbiBjYXJhdmFuIGdhdGU=', 'next' => '2_gate'],
                ['text' => 'VGFrZSB0aGUgc2Nob2xhcnMnIGFwcHJvYWNo', 'next' => '2_scholars'],
            ],
        ],
        '2_gate' => [
            'prose'  => 'VGhlIG1haW4gZ2F0ZSBpcyBidXN5IHdpdGggYXJyaXZpbmcgY2FyYXZhbnMsIGNhbWVscyBhbmQgdHJhZGVycyBhbmQgdGhlIHNwZWNpZmljIHJlbGllZiBvZiBwZW9wbGUgd2hvJ3ZlIGp1c3QgY3Jvc3NlZCBnZW51aW5lbHkgZGFuZ2Vyb3VzIG9wZW4gZGVzZXJ0LiBZb3UncmUgYWJzb3JiZWQgaW50byB0aGUgZ2VuZXJhbCBidXN0bGUgb2YgYXJyaXZhbCwgdGhlIGNpdHkncyBsb3cgbXVkYnJpY2sgc2t5bGluZSBmaW5hbGx5LCBwcm9wZXJseSBjbG9zZS4KCllvdSBhcnJpdmUgYXQgdGhlIG1hbnVzY3JpcHQgbGlicmFyeSBjb25zaWRlcmFibHkgbW9yZSB0cmF2ZWwtd29ybiB0aGFuIHlvdSdkIGxpa2UsIGJ1dCBnZW51aW5lbHksIGRlZXBseSByZWxpZXZlZCB0byBoYXZlIG1hZGUgdGhlIGNyb3NzaW5nLg==',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGxpYnJhcnk=', 'next' => '3_shared'],
            ],
        ],
        '2_scholars' => [
            'prose'  => 'VGhlIHNjaG9sYXJzJyBhcHByb2FjaCBpcyBxdWlldGVyLCB1c2VkIGJ5IHBlb3BsZSB3aG9zZSBidXNpbmVzcyBoZXJlIGlzIG1hbnVzY3JpcHRzIGFuZCBsZWFybmluZyByYXRoZXIgdGhhbiBnZW5lcmFsIHRyYWRlLCB0aGUgY2l0eSdzIGludGVsbGVjdHVhbCByZXB1dGF0aW9uIGV2aWRlbnQgZXZlbiBpbiBob3cgY2FyZWZ1bGx5IHRoaXMgcGFydGljdWxhciByb3V0ZSBpcyBrZXB0LgoKWW91IGFycml2ZSBhdCB0aGUgbGlicmFyeSBjb25zaWRlcmFibHkgY2FsbWVyLCBhbmQgd2l0aCByZWFsIGFudGljaXBhdGlvbiBmb3Igd2hhdCdzIGNsZWFybHkgYSBnZW51aW5lbHkgc2lnbmlmaWNhbnQgY29sbGVjdGlvbi4=',
            'choices' => [
                ['text' => 'RW50ZXIgdGhlIGxpYnJhcnk=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGxpYnJhcnkncyBrZWVwZXIsIEFsYXNzYW5lLCBjb21lcyBmcm9tIGEgZmFtaWx5IHRoYXQncyBwcm90ZWN0ZWQgdGhpcyBzcGVjaWZpYyBjb2xsZWN0aW9uIGZvciBnZW5lcmF0aW9ucywgdGhyb3VnaCBwZXJpb2RzIG9mIHJlYWwgaGlzdG9yaWNhbCBkYW5nZXIgdG8gbWFudXNjcmlwdHMgbGlrZSB0aGVzZS4gSGUgZXhhbWluZXMgeW91ciBjcmVkZW50aWFscyBjYXJlZnVsbHkgYmVmb3JlIGZpbmFsbHkgcmVsYXhpbmcuICdZc29sZGUncyB3ZWRnZSwgeWVzLiBLZXB0IGhlcmUgYWxvbmdzaWRlIHRoaW5ncyBjb25zaWRlcmFibHkgbW9yZSB2YWx1YWJsZSwgdGhvdWdoIHNoZSdkIGhhdmUgYXBwcmVjaWF0ZWQgdGhlIGNvbXBhbnkgcmVnYXJkbGVzcy4nCgpIZSBzdHVkaWVzIHlvdS4gJ1RoaXMgY29sbGVjdGlvbiBoYXMgc3Vydml2ZWQgdGhyZWF0cyB5b3UgY2FuJ3QgaW1hZ2luZSwgdGhyb3VnaCBjYXJlZnVsLCBkZWxpYmVyYXRlIHByb3RlY3Rpb24gYnkgcGVvcGxlIHdobyB1bmRlcnN0b29kIGV4YWN0bHkgd2hhdCB3YXMgYXQgc3Rha2UuIEkgd29uJ3QgcmVsZWFzZSBhbnl0aGluZyBmcm9tIGhlcmUgY2FzdWFsbHkuIFlvdSdsbCBuZWVkIHRvIHNob3cgbWUgeW91IGFjdHVhbGx5IHVuZGVyc3RhbmQgdGhhdCB0b28uJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdyB0byBzaG93IHRoYXQ=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'QWxhc3NhbmUgb2ZmZXJzIHR3byB3YXlzOiBoZWxwIHdpdGggdGhlIGRlbGljYXRlLCBvbmdvaW5nIHdvcmsgb2YgcHJvcGVybHkgcHJlc2VydmluZyBhbmQgZGlnaXRpc2luZyBhIHNwZWNpZmljIHNldCBvZiBmcmFnaWxlIG1hbnVzY3JpcHRzLCBsZWFybmluZyBmaXJzdGhhbmQgZXhhY3RseSBob3cgbXVjaCBjYXJlZnVsIGF0dGVudGlvbiB0aGlzIGtpbmQgb2YgcHJvdGVjdGlvbiBhY3R1YWxseSBkZW1hbmRzLCBvciBzaW1wbHkgc2l0IGFuZCBsaXN0ZW4gcHJvcGVybHkgdG8gdGhlIGZ1bGwgaGlzdG9yeSBvZiBob3cgdGhpcyBwYXJ0aWN1bGFyIGNvbGxlY3Rpb24gc3Vydml2ZWQgaXRzIG1vc3QgZGFuZ2Vyb3VzIHBlcmlvZHMsIHVuZGVyc3RhbmRpbmcgdGhlIHN0YWtlcyB0aHJvdWdoIHN0b3J5IHJhdGhlciB0aGFuIGRpcmVjdCBsYWJvdXIuCgonRWl0aGVyIHRlYWNoZXMgdGhlIHNhbWUgbGVzc29uLCcgaGUgc2F5cy4gJ1doZXRoZXIgeW91IGNhbiBhY3R1YWxseSBncmFzcCB3aGF0J3MgcmVhbGx5IGF0IHN0YWtlIGhlcmUsIGJleW9uZCB0aGUgd2VkZ2UgaXRzZWxmLic=',
            'choices' => [
                ['text' => 'SGVscCB3aXRoIHRoZSBwcmVzZXJ2YXRpb24gd29yaw==', 'next' => '5_preserve'],
                ['text' => 'SGVhciB0aGUgY29sbGVjdGlvbidzIHN1cnZpdmFsIHN0b3J5', 'next' => '5_story'],
            ],
        ],
        '5_preserve' => [
            'prose'  => 'SGVscGluZyB3aXRoIHRoZSBwcmVzZXJ2YXRpb24gd29yayBpcyBzbG93LCBleGFjdGluZywgZ2VudWluZWx5IG5lcnZlLXdyYWNraW5nIGxhYm91ciDigJQgZnJhZ2lsZSBwYWdlcyByZXF1aXJpbmcgYSBkZWxpY2FjeSB0aGF0IHB1bmlzaGVzIGFueSBjYXJlbGVzc25lc3MgaW1tZWRpYXRlbHkgYW5kIGlycmV2ZXJzaWJseS4gQWxhc3NhbmUgZ3VpZGVzIHlvdSBjYXJlZnVsbHksIGFuZCBieSB0aGUgZW5kLCB5b3UndmUgY29udHJpYnV0ZWQgc29tZXRoaW5nIHJlYWwgdG8gYSBjb2xsZWN0aW9uIHRoYXQgd2lsbCBvdXRsYXN0IHlvdSBieSBjZW50dXJpZXMuCgpIZSBleGFtaW5lcyB5b3VyIGNhcmVmdWwgd29yayB3aXRoIGdlbnVpbmUsIGhhcmQtd29uIGFwcHJvdmFsLg==',
            'choices' => [
                ['text' => 'U2VlIGhpcyBkZWNpc2lvbg==', 'next' => '6_shared'],
            ],
        ],
        '5_story' => [
            'prose'  => 'QWxhc3NhbmUgdGVsbHMgeW91IHRoZSBjb2xsZWN0aW9uJ3Mgc3Vydml2YWwgc3RvcnkgcHJvcGVybHkg4oCUIGRlY2FkZXMgb2YgY2FyZWZ1bCwgc29tZXRpbWVzIGRhbmdlcm91cyBwcm90ZWN0aW9uLCBoaWRkZW4gbWFudXNjcmlwdHMgYW5kIHF1aWV0IGNvdXJhZ2UsIG9yZGluYXJ5IGZhbWlsaWVzIGNob29zaW5nLCByZXBlYXRlZGx5LCB0byByaXNrIHJlYWwgZGFuZ2VyIHJhdGhlciB0aGFuIGxldCB0aGlzIGludGVsbGVjdHVhbCBoZXJpdGFnZSBiZSBsb3N0IG9yIGRlc3Ryb3llZC4KCkJ5IHRoZSBlbmQsIHlvdSB1bmRlcnN0YW5kIHRoZSBzdGFrZXMgaW4gYSB3YXkgdGhhdCBjaGFuZ2VzIGhvdyB5b3UnbGwgY2FycnkgZXZlcnkgd2VkZ2UgZm9yIHRoZSByZXN0IG9mIHRoaXMgam91cm5leS4=',
            'choices' => [
                ['text' => 'U2VlIGhpcyBkZWNpc2lvbg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QWxhc3NhbmUsIHNhdGlzZmllZCBlaXRoZXIgd2F5LCByZXRyaWV2ZXMgdGhlIHdlZGdlIGZyb20gaXRzIGNhcmVmdWwga2VlcGluZyBhbmQgcGxhY2VzIGl0IGluIHlvdXIgaGFuZHMuICdOb3cgeW91IHVuZGVyc3RhbmQsJyBoZSBzYXlzLiAnTm90IGp1c3QgdGhlIHdlZGdlLiBXaGF0IGl0IGFjdHVhbGx5IG1lYW5zIHRvIHByb3RlY3Qgc29tZXRoaW5nIHByb3Blcmx5LCBhdCByZWFsIGNvc3QsIGJlY2F1c2UgaXQgbWF0dGVycyBhbmQgYmVjYXVzZSBzb21lb25lIGhhcyB0by4nCgpIZSBzdHVkaWVzIHlvdSBhIGZpbmFsIG1vbWVudC4gJ0NhcnJ5IHRoYXQgdW5kZXJzdGFuZGluZyBmb3J3YXJkLCBzYW1lIGFzIHRoZSB3ZWRnZS4gSXQnbGwgbWF0dGVyIG1vcmUgdGhhbiB0aGUgbWV0YWwgaXRzZWxmLCBldmVudHVhbGx5Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgY2FyYXZhbiB3aXRoIHRoZSB3ZWRnZSBzZWN1cmUgaW4gdGhlIGNhc2UsIFRpbWJ1a3R1J3MgbG93IG11ZGJyaWNrIHNreWxpbmUgc2V0dGxpbmcgaW50byB0aGUgdmFzdCBkZXNlcnQgZXZlbmluZyBiZWhpbmQgeW91LCB0aGUgdHJhbnMtU2FoYXJhbiBjcm9zc2luZyBhaGVhZCBub3cgZmVlbGluZyBkaWZmZXJlbnQg4oCUIGxlc3MgbGlrZSBhbiBvYnN0YWNsZSwgbW9yZSBsaWtlIGEgZ2VudWluZSBwYXNzYWdlIGJldHdlZW4gdHdvIGhhbHZlcyBvZiBhIHdob2xlLCBjb25uZWN0ZWQgd29ybGQuCgpUb21hcywgcXVpZXQgYW5kIHRob3VnaHRmdWwgc2luY2UgbGVhdmluZyB0aGUgbGlicmFyeSwgZmluYWxseSBzcGVha3MuICdUaGF0J3MgYSBoZWF2aWVyIGtpbmQgb2Ygc3RvcCB0aGFuIG1vc3QuIEdvb2QgaGVhdnksIHRob3VnaC4gVGhlIGtpbmQgdGhhdCdzIHdvcnRoIGFjdHVhbGx5IGNhcnJ5aW5nLic=',
            'choices' => [
                ['text' => 'QWdyZWUgY29tcGxldGVseQ==', 'next' => '8_end_agree'],
                ['text' => 'U2F5IHlvdSdyZSBzdGlsbCBwcm9jZXNzaW5nIGl0', 'next' => '8_end_processing'],
            ],
        ],
        '8_end_agree' => [
            'prose'  => 'J0kgYWdyZWUgY29tcGxldGVseSwnIHlvdSBzYXksIHdhdGNoaW5nIFRpbWJ1a3R1IHJlY2VkZSBpbnRvIHRoZSBkZXNlcnQgZHVzayBiZWhpbmQgdGhlIGNhcmF2YW4uICdTb21lIHRoaW5ncyBkZXNlcnZlIHRvIHdlaWdoIHNvbWV0aGluZy4gVGhpcyBpcyBvbmUgb2YgdGhlbS4nCgpUb21hcyBub2RzLCBzYXRpc2ZpZWQuICdHb29kLiBDYXJyeSBpdCBwcm9wZXJseSwgdGhlbiwgdGhlIHJlc3Qgb2YgdGhlIHdheS4gWXNvbGRlIHdvdWxkIGhhdmUgdW5kZXJzdG9vZCBleGFjdGx5IHdoeSBpdCBtYXR0ZXJzIHRoaXMgbXVjaC4n',
            'ending' => true,
        ],
        '8_end_processing' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gc3RpbGwgcHJvY2Vzc2luZyBpdCwnIHlvdSBhZG1pdCwgdGhlIG1hbnVzY3JpcHRzJyB3aG9sZSBjYXJlZnVsLCBjb3VyYWdlb3VzIHN1cnZpdmFsIHN0b3J5IHN0aWxsIHNldHRsaW5nIGluIHlvdSBhcyB0aGUgY2FyYXZhbiBtb3ZlcyBpbnRvIHRoZSBnYXRoZXJpbmcgZGVzZXJ0IGRhcmsuICdNaWdodCB0YWtlIGEgd2hpbGUgYmVmb3JlIEkgcHJvcGVybHkgdW5kZXJzdGFuZCBldmVyeXRoaW5nIEFsYXNzYW5lIHdhcyBhY3R1YWxseSB0cnlpbmcgdG8gdGVhY2ggbWUuJwoKVG9tYXMgZG9lc24ndCBydXNoIHlvdS4gJ0ZhaXIgZW5vdWdoLiBTb21lIGxlc3NvbnMgdGFrZSBsb25nZXIgdG8gbGFuZCBwcm9wZXJseSB0aGFuIG90aGVycy4gVGhhdCdzIG5vdCBhIGZhaWxpbmcuIFRoYXQncyBqdXN0IGhvdyB0aGUgcmVhbCBvbmVzIGFjdHVhbGx5IHdvcmsuJw==',
            'ending' => true,
        ],
    ],
];
