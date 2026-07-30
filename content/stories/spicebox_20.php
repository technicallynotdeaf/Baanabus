<?php
return [
    'id'    => 20,
    'title' => 'No Lesson On An Empty Stomach',
    'color' => '#3A7A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QmVpcnV0IHNwcmVhZHMgYnJpZ2h0IGFuZCBiYXR0ZXJlZCBhbmQgYmVhdXRpZnVsIGFsb25nIHRoZSBNZWRpdGVycmFuZWFuLCBiYWxjb25pZXMgc3RydW5nIHdpdGggZHJ5aW5nIGhlcmJzLCB0aGUgc2VhIGNhdGNoaW5nIHRoZSBhZnRlcm5vb24gbGlnaHQgaW4gYSBoYXJkLCBicmlsbGlhbnQgZ2xhcmUuIEJydW5vIG1lbnRpb25zIHRoZSB6YSdhdGFyLWJsZW5kaW5nIGZhbWlseSB5b3UncmUgYWZ0ZXIgYXJlIGZhbW91c2x5LCBhbG1vc3QgZmllcmNlbHkgcGFydGljdWxhciBhYm91dCB0aGVpciBleGFjdCByYXRpb3MuCgpUd28gbmVpZ2hib3VyaG9vZCByb3V0ZXMgdG93YXJkIHRoZWlyIGhvbWUgcHJlc2VudCB0aGVtc2VsdmVzOiBhbG9uZyB0aGUgYnVzeSBjb3JuaWNoZSBmYWNpbmcgdGhlIHNlYSwgb3IgdGhyb3VnaCB0aGUgcXVpZXRlciByZXNpZGVudGlhbCBzdHJlZXRzIHNldCBiYWNrIGZyb20gaXQu',
            'choices' => [
                ['text' => 'V2FsayB0aGUgYnVzeSBjb3JuaWNoZQ==', 'next' => '2_corniche'],
                ['text' => 'VGFrZSB0aGUgcXVpZXRlciByZXNpZGVudGlhbCBzdHJlZXRz', 'next' => '2_streets'],
            ],
        ],
        '2_corniche' => [
            'prose'  => 'VGhlIGNvcm5pY2hlIGlzIGJyaWdodCBhbmQgY3Jvd2RlZCwgZmFtaWxpZXMgb3V0IHdhbGtpbmcsIHRoZSBzZWEgZ2xpdHRlcmluZyBoYXJkIGFsb25nc2lkZSB0aGUgd2hvbGUgcHJvbWVuYWRlLiBZb3UgZm9sbG93IGl0IGF0IGFuIGVhc3kgcGFjZSwgY3V0dGluZyBpbmxhbmQgd2hlbiB0aGUgYWRkcmVzcyBmaW5hbGx5IGNhbGxzIGZvciBpdC4KCllvdSByZWFjaCB0aGUgZmFtaWx5J3MgaG9tZSB3aXRoIHRoZSBzZWEgc3RpbGwgZmFpbnRseSB2aXNpYmxlIGJlaGluZCB5b3Uu',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '2_streets' => [
            'prose'  => 'VGhlIHF1aWV0ZXIgcmVzaWRlbnRpYWwgc3RyZWV0cyBzZXQgYmFjayBmcm9tIHRoZSB3YXRlciBjYXJyeSB0aGVpciBvd24gcGFydGljdWxhciBjaGFyYWN0ZXIsIGJhbGNvbmllcyBjbG9zZSBvdmVyaGVhZCBzdHJ1bmcgdGhpY2sgd2l0aCBkcnlpbmcgdGh5bWUgYW5kIHN1bWFjLCBsYXVuZHJ5IGxpbmVzIGNyb3NzaW5nIGJldHdlZW4gYnVpbGRpbmdzIGF0IGV2ZXJ5IHR1cm4uIEl0J3MgYSBzbG93ZXIgcm91dGUsIGJ1dCBhIGNvbnNpZGVyYWJseSBtb3JlIGludGltYXRlIGxvb2sgYXQgdGhlIG5laWdoYm91cmhvb2QgaXRzZWxmLgoKWW91IHJlYWNoIHRoZSBmYW1pbHkncyBob21lIGhhdmluZyBwcm9wZXJseSBzZWVuIHRoZSBzdHJlZXRzIHRoYXQgYWN0dWFsbHkgZmVlZCB0aGlzIGV4YWN0IGJsZW5kLg==',
            'choices' => [
                ['text' => 'TWVldCB0aGUgZmFtaWx5', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZhbWlseSwgdGhlIEhhZGRhZHMsIGFyZSB3YXJtIGFuZCBpbW1lZGlhdGVseSwgYWxtb3N0IGFnZ3Jlc3NpdmVseSBnZW5lcm91cywgd2VsY29taW5nIHlvdSBpbiBiZWZvcmUgeW91J3ZlIGZpbmlzaGVkIGludHJvZHVjaW5nIHlvdXJzZWxmLiBUaGUgbW90aGVyLCBOYWRpYSwgZXhhbWluZXMgdGhlIHJlY2lwZSBjYXJkJ3MgemEnYXRhciBub3RlIHdpdGggcmVhbCwgZGVsaWdodGVkIHJlY29nbml0aW9uLiAnWW91ciBncmFuZG1vdGhlciBrbmV3IGhlciByYXRpb3MsJyBzaGUgc2F5cy4gJ1RoeW1lLCBzdW1hYywgc2VzYW1lLCBzYWx0IOKAlCBnZXQgYW55IG9uZSBvZiB0aGVtIGV2ZW4gc2xpZ2h0bHkgd3JvbmcgYW5kIHRoZSB3aG9sZSB0aGluZyBmYWxscyBhcGFydC4gTW9zdCBwZW9wbGUgZG9uJ3QgdW5kZXJzdGFuZCB0aGF0LicKClNoZSBzdHVkaWVzIHlvdSB3YXJtbHkuICdJJ2xsIHRlYWNoIHlvdSBwcm9wZXJseSwgdGhlIHdheSBJIHdhcyB0YXVnaHQuIEJ1dCB5b3UnbGwgZWF0IHdpdGggdXMgZmlyc3QuIE5vIGxlc3NvbiBoYXBwZW5zIG9uIGFuIGVtcHR5IHN0b21hY2ggaW4gdGhpcyBob3VzZS4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWNjZXB0IHRoZSBtZWFsIGFuZCB0aGUgbGVzc29u', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'QWZ0ZXIgYSBnZW51aW5lbHkgZW5vcm1vdXMsIGdlbmVyb3VzIG1lYWwsIE5hZGlhIG9mZmVycyB0d28gd2F5cyB0byBwcm9wZXJseSBsZWFybiB0aGUgemEnYXRhciByYXRpb3M6IG1lYXN1cmUgZXZlcnl0aGluZyBwcmVjaXNlbHkgYnkgd2VpZ2h0LCB0aGUgZXhhY3QgbWV0aG9kIHNoZSB1c2VzIGhlcnNlbGYgZm9yIGNvbnNpc3RlbmN5IGFjcm9zcyBldmVyeSBiYXRjaCwgb3IgbGVhcm4gdG8ganVkZ2UgaXQgZW50aXJlbHkgYnkgZXllIGFuZCB0YXN0ZSwgdGhlIG9sZGVyLCBtb3JlIGludHVpdGl2ZSBtZXRob2QgaGVyIG93biBtb3RoZXIgaW5zaXN0ZWQgb24uCgonRWl0aGVyIGdldHMgeW91IHRoZSByYXRpbyByaWdodCwgZXZlbnR1YWxseSwnIHNoZSBzYXlzLiAnUHJlY2lzZSBtZWFzdXJpbmcsIG9yIHRydXN0aW5nIHlvdXIgb3duIHNlbnNlcy4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'TWVhc3VyZSBldmVyeXRoaW5nIHByZWNpc2VseSBieSB3ZWlnaHQ=', 'next' => '5_measure'],
                ['text' => 'TGVhcm4gdG8ganVkZ2UgaXQgYnkgZXllIGFuZCB0YXN0ZQ==', 'next' => '5_judge'],
            ],
        ],
        '5_measure' => [
            'prose'  => 'TWVhc3VyaW5nIGV2ZXJ5dGhpbmcgcHJlY2lzZWx5IGJ5IHdlaWdodCBtZWFucyBjYXJlZnVsLCBleGFjdGluZyB3b3JrIGF0IHRoZSBraXRjaGVuIHNjYWxlLCBlYWNoIGluZ3JlZGllbnQgcG9ydGlvbmVkIHRvIHRoZSBncmFtIHdoaWxlIE5hZGlhIGNoZWNrcyB5b3VyIHRvdGFscyBhZ2FpbnN0IGhlciBvd24gbG9uZy1tZW1vcmlzZWQgbnVtYmVycywgYWRqdXN0aW5nIG9ubHkgZnJhY3Rpb25hbGx5IHdoZW4gc29tZXRoaW5nIGRyaWZ0cy4KCkJ5IHRoZSBlbmQsIHlvdSd2ZSBnb3QgYSBibGVuZCB0aGF0IG1hdGNoZXMgaGVycyBhbG1vc3QgZXhhY3RseSwgcmVwbGljYWJsZSBhbmQgcmVsaWFibGUu',
            'choices' => [
                ['text' => 'U2VlIHRoZSBmaW5pc2hlZCBibGVuZA==', 'next' => '6_shared'],
            ],
        ],
        '5_judge' => [
            'prose'  => 'TGVhcm5pbmcgdG8ganVkZ2UgaXQgYnkgZXllIGFuZCB0YXN0ZSBtZWFucyB0cnVzdGluZyB5b3VyIG93biBzZW5zZXMgZW50aXJlbHksIE5hZGlhIGd1aWRpbmcgeW91IHRvd2FyZCB0aGUgZXhhY3QgbW9tZW50IHRoZSBjb2xvdXIgYW5kIHNtZWxsIHRlbGwgeW91IHRoZSByYXRpbydzIHJpZ2h0LCBubyBzY2FsZSBpbnZvbHZlZCBhdCBhbGwsIGp1c3QgeWVhcnMgb2YgaGVyIG93biBhY2N1bXVsYXRlZCBpbnN0aW5jdCBwYXNzZWQgYWxvbmcgaW4gcmVhbCB0aW1lLgoKQnkgdGhlIGVuZCwgeW91ciBvd24gaW5zdGluY3QgaGFzIHNoYXJwZW5lZCBjb25zaWRlcmFibHksIGV2ZW4gaWYgaXQnbGwgbmV2ZXIgYmUgcXVpdGUgYXMgcHJlY2lzZSBhcyBoZXJzLg==',
            'choices' => [
                ['text' => 'U2VlIHRoZSBmaW5pc2hlZCBibGVuZA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'TmFkaWEgdGFzdGVzIHRoZSBmaW5pc2hlZCB6YSdhdGFyIGhlcnNlbGYsIG5vZGRpbmcgd2l0aCByZWFsIHNhdGlzZmFjdGlvbi4gJ0dvb2QuIFRoaXMgaXMgY2xvc2UgZW5vdWdoIHRvIGZlZWwgbGlrZSBvdXJzLCBhbmQgY2xvc2UgZW5vdWdoIHRvIGZlZWwgbGlrZSB5b3VycyB0b28uIFRoYXQncyBleGFjdGx5IGhvdyBpdCBzaG91bGQgYmUsIHBhc3NlZCBhbG9uZyBwcm9wZXJseS4nIFNoZSBwYWNrYWdlcyBhIGdlbmVyb3VzIGphciBmb3IgeW91LCByZWZ1c2luZyBhbnkgcGF5bWVudCB3aXRoIHZpc2libGUgb2ZmZW5zZSBhdCB0aGUgc3VnZ2VzdGlvbi4KCidHdWVzdHMgZG9uJ3QgcGF5IGluIHRoaXMgaG91c2UsJyBzaGUgc2F5cyBmaXJtbHkuICdGYW1pbHkgcmVjaXBlcyBlc3BlY2lhbGx5IGRvbid0IGdldCBzb2xkLiBUaGV5IGdldCBzaGFyZWQuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGxlYXZlIHRoZSBIYWRkYWRzJyBob21lIGFzIHRoZSBNZWRpdGVycmFuZWFuIGxpZ2h0IHR1cm5zIHByb3Blcmx5IGdvbGRlbiwgdGhlIHphJ2F0YXIgc2VjdXJlIGluIGl0cyBqYXIsIHRoZSB3aG9sZSBuZWlnaGJvdXJob29kJ3MgZHJpZWQgaGVyYnMgc3RpbGwgZmFpbnRseSBwZXJmdW1pbmcgdGhlIHdhcm0gZXZlbmluZyBhaXIgYmVoaW5kIHlvdS4gQnJ1bm8sIHRob3JvdWdobHkgYW5kIGhhcHBpbHkgb3ZlcmZlZCwgd2Fsa3Mgc2xvd2VyIHRoYW4gdXN1YWwuCgonVGhhdCBnZW5lcm9zaXR5LCcgaGUgZmluYWxseSBzYXlzLiAnRmVlbHMgZXhhY3RseSBsaWtlIHlvdXIgZ3JhbmRtb3RoZXIncyBraXRjaGVuLCBzb21laG93LiBTYW1lIGluc2lzdGVuY2UgdGhhdCB5b3UgZWF0IGZpcnN0LCBhcmd1ZSBsYXRlci4n',
            'choices' => [
                ['text' => 'U2F5IGl0IGZlbHQgbGlrZSBiZWluZyB3ZWxjb21lZCBob21l', 'next' => '8_end_home'],
                ['text' => 'U2F5IGl0J3MgYSBnZW5lcm9zaXR5IHlvdSB3YW50IHRvIGNhcnJ5IGZvcndhcmQgeW91cnNlbGY=', 'next' => '8_end_carry'],
            ],
        ],
        '8_end_home' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBmZWx0IGxpa2UgYmVpbmcgd2VsY29tZWQgaG9tZSwnIHlvdSBhZG1pdCwgdGhpbmtpbmcgb2YgTmFkaWEncyBmaXJtIGluc2lzdGVuY2Ugb24gZmVlZGluZyB5b3UgYmVmb3JlIHRlYWNoaW5nIHlvdSBhbnl0aGluZyBhdCBhbGwuICdFeGFjdGx5IHRoZSBraW5kIG9mIGhvc3BpdGFsaXR5IHRoYXQgZG9lc24ndCBuZWVkIGEgcmVhc29uLiBKdXN0IGhhcHBlbnMsIGJlY2F1c2UgdGhhdCdzIHNpbXBseSBob3cgaXQncyBkb25lLicKCkJydW5vIG5vZHMgc2xvd2x5LiAnVGhhdCdzIHRoZSB0aHJlYWQgcnVubmluZyB0aHJvdWdoIHRoaXMgd2hvbGUgdHJpcCwgaXNuJ3QgaXQuIERpZmZlcmVudCBjb3VudHJpZXMsIHNhbWUgaW5zaXN0ZW5jZSBvbiBmZWVkaW5nIHBlb3BsZSBwcm9wZXJseSBmaXJzdC4n',
            'ending' => true,
        ],
        '8_end_carry' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCdzIGEgZ2VuZXJvc2l0eSBJIHdhbnQgdG8gY2FycnkgZm9yd2FyZCBteXNlbGYsJyB5b3Ugc2F5LCB0aGlua2luZyBvZiBOYWRpYSdzIGZsYXQgcmVmdXNhbCBvZiBhbnkgcGF5bWVudCwgaGVyIGluc2lzdGVuY2UgdGhhdCBmYW1pbHkgcmVjaXBlcyBnZXQgc2hhcmVkIHJhdGhlciB0aGFuIHNvbGQuICdGZWVscyBsaWtlIHRoZSBhY3R1YWwgcG9pbnQgb2YgYWxsIHRoaXMgY29sbGVjdGluZyDigJQgbm90IGhvYXJkaW5nIGl0LCBidXQgZXZlbnR1YWxseSBnaXZpbmcgaXQgYXdheSB0aGUgc2FtZSB3YXkuJwoKQnJ1bm8gc21pbGVzIGF0IHRoYXQuICdZb3VyIGdyYW5kbW90aGVyIHdvdWxkIGxpa2UgdGhhdCBhbnN3ZXIgYSBncmVhdCBkZWFsLCBJIHRoaW5rLiBWZXJ5IG11Y2ggaGVyIG93biB3YXkgb2Ygc2VlaW5nIGl0LicgVGhlIHNlYSBjYXRjaGVzIHRoZSBsYXN0IG9mIHRoZSBnb2xkIGxpZ2h0IGFzIHlvdSBoZWFkIGJhY2sgdG93YXJkIHRoZSBkYXkncyBuZXh0IHN0b3Au',
            'ending' => true,
        ],
    ],
];
