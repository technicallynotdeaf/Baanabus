<?php
return [
    'id'    => 4,
    'title' => 'The Green Correspondence',
    'color' => '#3A6B4A',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIHNvbGljaXRvcidzIGxpc3QgaGFzIHR3ZWx2ZSBpdGVtczogZnVybml0dXJlLCBzaWx2ZXJ3YXJlLCB0aGUgY29udGVudHMgb2YgdGhlIHN0dWR5LCB0aGUgZ2FyZGVuIHRvb2xzLiBIZSBtZW50aW9uZWQgdGhlIGxldHRlcnMgYXMgYW4gYWZ0ZXJ0aG91Z2h0LCB0aGUgd2F5IHBlb3BsZSBtZW50aW9uIHRoaW5ncyB0aGV5J3ZlIGRlY2lkZWQgYXJlbid0IGhpcyBwcm9ibGVtIOKAlCAidGhlcmUgbWF5IGJlIHNvbWUgcGVyc29uYWwgY29ycmVzcG9uZGVuY2UiIOKAlCBhbmQgdGhlbiBoYW5kZWQgeW91IHRoZSBrZXkuCgpUaGUga2V5IGlzIGhlYXZ5LCB0aGUgb2xkIGtpbmQuIFRoZSBob3VzZSBpcyBvbiBhIGxhbmUgdGhhdCBoYXNuJ3QgY2hhbmdlZCBtdWNoIHNpbmNlIGJlZm9yZSB5b3Ugd2VyZSBib3JuOiBlbG1zLCBhIGxvdyB3YWxsLCBhIGdhdGUgdGhhdCBvcGVucyBpbndhcmQuIFlvdSBrbm93IHRoaXMgd2l0aG91dCBrbm93aW5nIGhvdyB5b3Uga25vdyBpdC4KClRoZSBmcm9udCBkb29yIGlzIHVubG9ja2VkLiBUaGUgaG91c2Ugc21lbGxzIG9mIGJlZXN3YXggYW5kIG9sZCBwYXBlciBhbmQgdGhlIHBhcnRpY3VsYXIgZGFtcCBvZiByb29tcyB0aGF0IGhhdmUgYmVlbiBjbG9zZWQgc2luY2Ugd2ludGVyLg==',
            'choices' => [
                ['text' => 'RmluZCB0aGUgbGV0dGVycyBmaXJzdA==', 'next' => '2_letters'],
                ['text' => 'V2FsayB0aHJvdWdoIHRoZSByb29tcyBmaXJzdA==', 'next' => '2_rooms'],
            ],
        ],
        '2_letters' => [
            'prose'   => 'VGhlIHN0dWR5IGlzIG9mZiB0aGUgaGFsbCwgbGluZWQgd2l0aCBzaGVsdmVzLiBNb3N0IG9mIHRoZSBib29rcyBhcmUgcmVmZXJlbmNlLCBhY2N1bXVsYXRlZCBvdmVyIGEgbG9uZyBsaWZlIHdpdGhvdXQgbmVjZXNzYXJpbHkgYmVpbmcgcmVhZC4gT24gdGhlIGRlc2s6IGEgYnVuZGxlIHRpZWQgd2l0aCBraXRjaGVuIHR3aW5lLiBOb3Qgc21hbGwuIFR3byBodW5kcmVkIGxldHRlcnMsIHBlcmhhcHMgbW9yZSwgc29ydGVkIGludG8gd2hhdCBsb29rcyBsaWtlIGEgZGVsaWJlcmF0ZSBvcmRlci4KClRoZSB0b3AgZW52ZWxvcGUgaXMgdGhlIG5ld2VzdC4gVGhlIGhhbmR3cml0aW5nIGlzIGRpZmZlcmVudCBmcm9tIHRoZSBvbmVzIGJlbG93IOKAlCBzaGFraWVyLCB0aGUgZ3JlZW4gaW5rIGZhZGVkIHRvIHNvbWV0aGluZyBhbG1vc3QgZ3JleS4gSW5zaWRlOiBhIHNpbmdsZSBmb2xkZWQgc2hlZXQuICpEZWFyIEEsKiBhdCB0aGUgdG9wLCBhbmQgYmVsb3cgdGhhdCwgdGhlIGJlZ2lubmluZyBvZiBhIHNlbnRlbmNlIHRoYXQgc3RvcHMgbWlkLXdvcmQu',
            'choices' => [
                ['text' => 'QW5zd2VyIHRoZSBrbm9jayBhdCB0aGUgYmFjayBkb29y', 'next' => '3_fallon'],
            ],
        ],
        '2_rooms' => [
            'prose'   => 'WW91IGdvIHRocm91Z2ggdGhlIHJvb21zIHRoZSB3YXkgeW91IGdvIHRocm91Z2ggdGhpbmdzIHRoYXQgYmVsb25nZWQgdG8gc29tZW9uZSB3aG8gZGllZDogc3lzdGVtYXRpY2FsbHksIHdpdGhvdXQgbG9va2luZyB0b28gY2xvc2VseS4gVGhlIGtpdGNoZW4gaGFzIGEgY2FsZW5kYXIgb24gdGhlIHdhbGwgd2l0aCBkYXRlcyBjaXJjbGVkIGluIGdyZWVuIGluaywgdGhlIGxhc3QgdGhyZWUgbW9udGhzIHVubWFya2VkLiBUaGUgYmVkcm9vbSBoYXMgYSBjaGFpciBwdWxsZWQgY2xvc2UgdG8gdGhlIHdpbmRvdywgd29ybiBpbiB0aGUgc2hhcGUgb2YgaGFiaXR1YWwgdXNlLiBUaGUgc3R1ZHkgaGFzIGEgYnVuZGxlIG9mIGxldHRlcnMgb24gdGhlIGRlc2ssIHRpZWQgd2l0aCBraXRjaGVuIHR3aW5lLgoKWW91IGNvbWUgYmFjayB0byB0aGUgbGV0dGVycy4gU29tZSB0aGluZ3MgcHVsbC4=',
            'choices' => [
                ['text' => 'QW5zd2VyIHRoZSBrbm9jayBhdCB0aGUgYmFjayBkb29y', 'next' => '3_fallon'],
            ],
        ],
        '3_fallon' => [
            'prose'   => 'VGhlIGtub2NrIGF0IHRoZSBiYWNrIGRvb3IgaXMgdGhyZWUgdGltZXMsIHRoZSBrbm9jayBvZiBzb21lb25lIHdobyBrbm93cyB0aGUgaG91c2UuCgpTaGUgaXMgc21hbGwsIGRpcmVjdCwgd2l0aCB0aGUgbWFubmVyIG9mIHNvbWVvbmUgd2hvIGhhcyBkZWNpZGVkIG5vdCB0byB3YXN0ZSB0aW1lIG9uIHRoaW5ncyB0aGF0IGRvbid0IG1hdHRlci4gU2hlJ3MgYmVlbiB3YXRjaGluZyB0aGUgaG91c2Ugc2luY2UgRGVjZW1iZXIsIHNoZSBzYXlzIOKAlCBub3QgaW4gYSB3YXRjaGluZyB3YXksIHNoZSBjbGFyaWZpZXMsIGp1c3Qgd2F0Y2hpbmcuIFNoZSBrbmV3IE1hcmdhcmV0IHRoaXJ0eSB5ZWFycy4gU2hlIGtub3dzIHdoYXQncyBpbiB0aGF0IGJ1bmRsZSwgb3IgdGhlIHNoYXBlIG9mIGl0IGFueXdheSwgYW5kIHNoZSB3YW50cyB0byBrbm93IHdoYXQgeW91J3JlIHBsYW5uaW5nIHRvIGRvIHdpdGggaXQuCgpTaGUgaXMgaG9sZGluZyBhIGNvdmVyZWQgcGxhdGUgb2Ygc29tZXRoaW5nIHRoYXQgc21lbGxzIG9mIGxlbW9uLiBTaGUgaGFzIG5vdCBvZmZlcmVkIGl0IHlldC4=',
            'choices' => [
                ['text' => 'SW52aXRlIGhlciBpbg==', 'next' => '4_invite'],
                ['text' => 'VGhhbmsgaGVyLCBzYXkgeW91J2xsIG1hbmFnZQ==', 'next' => '4_polite'],
            ],
        ],
        '4_invite' => [
            'prose'   => 'U2hlIGNvbWVzIGluIHRoZSB3YXkgcGVvcGxlIGNvbWUgaW4gd2hvIGtub3cgd2hlcmUgdGhlIGtldHRsZSBpcy4gU2hlIHNldHMgdGhlIGxlbW9uIGNha2Ugb24gdGhlIGNvdW50ZXIg4oCUIGl0IGlzIGEgZ29vZCBsZW1vbiBjYWtlLCBhbmQgc2hlIGtub3dzIHlvdSBub3RpY2VkIOKAlCBhbmQgd2hpbGUgc2hlIGZpbGxzIHRoZSBrZXR0bGUgc2hlIHNheXM6IE1hcmdhcmV0IHdyb3RlIHRvIGhlciBzaXN0ZXIgZm9yIGZvcnR5IHllYXJzLiBHcmVlbiBpbmssIGJvdGggb2YgdGhlbSwgYWx3YXlzLCBiZWNhdXNlIG9mIGEgam9rZSBiZXR3ZWVuIHRoZW0gc2hlIG5ldmVyIGV4cGxhaW5lZC4gVGhlIHNpc3RlcidzIG5hbWUgd2FzIEF1ZHJleS4KCkF1ZHJleSBkaWVkIGluIE9jdG9iZXIuIFNpeCBtb250aHMgYmVmb3JlIE1hcmdhcmV0LgoKU2hlIHNheXMgdGhpcyB0byB0aGUgd2luZG93LCBub3QgdG8geW91Lg==',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2hlIGtub3dzIGFib3V0IHRoZSBsZXR0ZXJz', 'next' => '5_green'],
            ],
        ],
        '4_polite' => [
            'prose'   => 'U2hlIGFjY2VwdHMgdGhpcyB3aXRob3V0IG9mZmVuc2UsIHdoaWNoIHRlbGxzIHlvdSBzaGUgZXhwZWN0ZWQgaXQuIFNoZSBoYW5kcyB5b3UgdGhlIGNvdmVyZWQgcGxhdGUgYW55d2F5IOKAlCBsZW1vbiBjYWtlLCBzdGlsbCB3YXJtIOKAlCBhbmQgc2F5cyBvbmx5IHRoYXQgTWFyZ2FyZXQgd3JvdGUgdG8gc29tZW9uZSBjYWxsZWQgQXVkcmV5IGZvciBmb3J0eSB5ZWFycywgZ3JlZW4gaW5rIGFsd2F5cywgYW5kIHRoYXQgeW91IG1pZ2h0IHdhbnQgdG8ga25vdyB0aGF0IGJlZm9yZSB5b3Ugc3RhcnQgZGVjaWRpbmcgd2hhdCBtYXR0ZXJzLgoKU2hlIGxlYXZlcyB5b3UgdG8gaXQuIEhlciBmb290c3RlcHMgb24gdGhlIHBhdGggYXJlIHVuaHVycmllZCwgYW5kIHNoZSBkb2VzIG5vdCBsb29rIGJhY2suCgpUaGUga2l0Y2hlbiBpcyBxdWlldC4gVGhlIGNha2Ugc2l0cyBvbiB0aGUgY291bnRlci4gWW91IHN0YW5kIGF0IHRoZSBkZXNrIHdpdGggdGhlIGJ1bmRsZSBpbiB5b3VyIGhhbmRzLg==',
            'choices' => [
                ['text' => 'T3BlbiB0aGUgYnVuZGxl', 'next' => '5_green'],
            ],
        ],
        '5_green' => [
            'prose'   => 'VHdvIGh1bmRyZWQgYW5kIHNldmVudGVlbiBsZXR0ZXJzLiBZb3UgY291bnQgdGhlbSB3aXRob3V0IG1lYW5pbmcgdG8uCgpBbGwgaW4gZ3JlZW4gaW5rIOKAlCBib3RoIHNpZGVzLCBib3RoIHdvbWVuIOKAlCBpbiB0aGUgd2F5IG9mIHBlb3BsZSB3aG8gZm91bmQgc29tZXRoaW5nIHRoYXQgd29ya2VkIGFuZCBrZXB0IGl0LiBUaGUgcGFwZXIgaW4gdGhlIG9sZGVzdCBsZXR0ZXJzIGlzIGJyaXR0bGUsIHRoZSBjb2xvdXIgb2Ygb2xkIHRlZXRoLiBUaGUgaGFuZHdyaXRpbmcgY2hhbmdlcyBvdmVyIGZvcnR5IHllYXJzIHRoZSB3YXkgaGFuZHdyaXRpbmcgZG9lczogc29tZSB5ZWFycyBsb29zZXIsIHNvbWUgeWVhcnMgY29udHJvbGxlZCBpbiB0aGUgd2F5IHRoaW5ncyBhcmUgY29udHJvbGxlZCBkdXJpbmcgZGlmZmljdWx0IHBlcmlvZHMuCgpUaGVyZSBpcyBhIGdhcCBpbiB0aGUgc2VxdWVuY2UuIEVsZXZlbiB5ZWFycyBvZiBlbnZlbG9wZXMsIGFuZCB0aGVuIG5vdGhpbmcsIGFuZCB0aGVuIGEgbGV0dGVyIHRoYXQgc3RhcnRzOiAqRGVhciBBLCBJIGhhdmUgYmVlbiB0aGlua2luZyBhYm91dCB3aGF0IHlvdSBzYWlkIOKAlCogYW5kIGdvZXMgbm8gZnVydGhlciBiYWNrIHRoYW4gdGhhdC4KCllvdSBkb24ndCBrbm93IHlldCB3aGF0IHNoZSBzYWlkLg==',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgZmlyc3QgbGV0dGVy', 'next' => '6_first'],
            ],
            'terminal' => true,
        ],
        '6_first' => [
            'prose'   => 'VGhlIGZpcnN0IGxldHRlciBpcyBkYXRlZCAxOTYxLiBNYXJnYXJldCB3b3VsZCBoYXZlIGJlZW4gdHdlbnR5LXR3by4KCkl0IGlzIG5vdCBhIHNpZ25pZmljYW50IGxldHRlciBieSBhbnkgbWVhc3VyZSDigJQgaXQncyBhYm91dCBhIGdhcmRlbiwgYSBsZWFreSB0YXAsIGEgbXV0dWFsIGFjcXVhaW50YW5jZSB3aG8gbWFycmllZCBiYWRseS4gVGhlcmUgaXMgYSBqb2tlIGluIGl0IHRoYXQgZG9lc24ndCBsYW5kIGFjcm9zcyBzaXh0eSB5ZWFycywgYnV0IHlvdSBjYW4gZmVlbCB0aGUgc2hhcGUgb2YgYSBqb2tlLiBUaGVyZSBpcyBhZmZlY3Rpb24gaW4gaXQsIHRoZSBkb21lc3RpYywgcGFydGljdWxhciBraW5kLCB0aGUga2luZCB0aGF0IGFzc3VtZXMgdGhlIG90aGVyIHBlcnNvbiB3aWxsIHVuZGVyc3RhbmQgdGhlIHNob3J0aGFuZCBiZWNhdXNlIHRoZXkgYWx3YXlzIGhhdmUuCgpJdCB3b3VsZCB0YWtlIHlvdSB3ZWVrcyB0byByZWFkIGFsbCBvZiB0aGVtLiBCdXQgeW91IHVuZGVyc3RhbmQgYWxyZWFkeSB0aGF0IHRoaXMgd2FzIHRoZSBwcmltYXJ5IHJlbGF0aW9uc2hpcCBvZiBNYXJnYXJldCdzIGxpZmUuIE5vdCBoZXIgbWFycmlhZ2UsIG5vdCBoZXIgY2hpbGRyZW4uIFRoaXMu',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgZWFybHkgb25lcyDigJQgYmVmb3JlIHRoZSBnYXA=', 'next' => '7_early'],
                ['text' => 'U2tpcCB0byB0aGUgbGF0ZXIgb25lcyDigJQgYWZ0ZXIgdGhlIGdhcA==', 'next' => '7_late'],
            ],
        ],
        '7_early' => [
            'prose'   => 'VGhlIGVhcmx5IGxldHRlcnMgYXJlIGZ1bGwuIFJlY2lwZXMsIGFyZ3VtZW50cyBhYm91dCB3aGV0aGVyIGEgcGFydGljdWxhciBjb3VzaW4gZGVzZXJ2ZWQgdGhlIHN5bXBhdGh5IHNoZSdkIHJlY2VpdmVkLCBvYnNlcnZhdGlvbnMgYWJvdXQgd2VhdGhlciB0aGF0IGFyZSByZWFsbHkgYWJvdXQgb3RoZXIgdGhpbmdzLiBJbiB0aGUgbGF0ZSAxOTYwcyBib3RoIGhhbmR3cml0aW5ncyBnZXQgbGFyZ2VyLCBsb29zZXIg4oCUIHNvbWV0aGluZyBnb29kIHdhcyBoYXBwZW5pbmcuIFRoZW4gdGhlIDE5NzBzOiBzbWFsbGVyLCB0aWdodGVyLgoKVGhlbiAxOTc4LiBBIHNpbmdsZSBwYWdlIGZyb20gTWFyZ2FyZXQuIEdyZWVuIGluaywgbm90IGNyb3NzZWQsIGV2ZXJ5IHdvcmQgc2V0IGRvd24gbGlrZSBhIHN0b25lIGJlaW5nIHBsYWNlZC4KCipJIGFtIG5vdCBhc2tpbmcgeW91IHRvIGZvcmdpdmUgbWUgeWV0LiBJIGFtIGFza2luZyB5b3UgdG8ga25vdyB0aGF0IEkga25vdy4qCgpUaGVuIHRoZSBnYXAuIEVsZXZlbiB5ZWFycyBvZiBub3RoaW5nLg==',
            'choices' => [
                ['text' => 'UmVhZCB0aHJvdWdoIHRoZSBnYXA=', 'next' => '8_rift'],
            ],
        ],
        '7_late' => [
            'prose'   => 'QWZ0ZXIgdGhlIGdhcCB0aGUgbGV0dGVycyBjaGFuZ2UuIENhcmVmdWwgYXQgZmlyc3QsIGFsbW9zdCBmb3JtYWwg4oCUIHR3byBwZW9wbGUgcmVidWlsZGluZyBhIGJyaWRnZSBvbmUgcGxhbmsgYXQgYSB0aW1lLiBSZWZlcmVuY2VzIHRvIGEgc2hhcmVkIGdhcmRlbi4gQSBtZW1vcnkgdHJlYXRlZCBnZW50bHksIGxpa2UgYSBicnVpc2VkIGZydWl0LCBjaXJjbGVkIHJhdGhlciB0aGFuIHRvdWNoZWQuCgpCeSB0aGUgMTk5MHM6IHdhcm1lci4gVGhlIGpva2VzIGNvbWUgYmFjaywgc21hbGxlciBhbmQgbW9yZSBjYXJlZnVsIHRoYW4gYmVmb3JlLiBTb21ldGhpbmcgd2FzIHB1dCBkb3duLiBOb3QgZm9yZ290dGVuIOKAlCB5b3UgY2FuIGZlZWwgdGhlIGNhcmVmdWwgd2F5IGNlcnRhaW4gc3ViamVjdHMgYXJlIGF2b2lkZWQg4oCUIGJ1dCBzZXQgZG93biBkZWxpYmVyYXRlbHksIGFuZCBub3QgcGlja2VkIGJhY2sgdXAuCgpUaGUgbGFzdCBsZXR0ZXIgaW4gdGhlIHNlcXVlbmNlLCBmcm9tIEF1ZHJleSwgZGF0ZWQgU2VwdGVtYmVyOiAqSSB0aGluayB3ZSBkaWQgYWxyaWdodCwgTWFnZ2llLioKClRoZW4gbm90aGluZy4gQmVjYXVzZSBBdWRyZXkgZGllZCBpbiBPY3RvYmVyLg==',
            'choices' => [
                ['text' => 'TG9vayBmb3Igd2hhdCBNYXJnYXJldCBrZXB0IGFwYXJ0', 'next' => '8_rift'],
            ],
        ],
        '8_rift' => [
            'prose'   => 'VGhlIGdhcCB3YXMgZWxldmVuIHllYXJzLiBUaGUgbGV0dGVycyBmcm9tIHRoYXQgcGVyaW9kIGFyZSBnb25lIOKAlCBib3RoIHNpZGVzLCBib3RoIHdvbWVuLCBkZWxpYmVyYXRlbHkgcmVtb3ZlZCDigJQgd2hpY2ggaXMgaXRzIG93biBraW5kIG9mIHN0YXRlbWVudC4gV2hhdCB5b3Uga25vdyBpcyB0aGF0IE1hcmdhcmV0J3MgMTk3OCBsZXR0ZXIgYXNrZWQgZm9yIHNvbWV0aGluZywgYW5kIHRoYXQgaXQgdG9vayBlbGV2ZW4geWVhcnMgZm9yIEF1ZHJleSB0byBhbnN3ZXIuCgpBbmQgdGhhdCB3aGVuIHNoZSBkaWQsIHRoZXkgd2VudCB0aGUgcmVzdCBvZiB0aGUgd2F5LgoKT24gdGhlIGRlc2ssIGJlbmVhdGggdGhlIGJ1bmRsZSwgYSBzbWFsbCBlbnZlbG9wZSDigJQgbm90IGluIHRoZSBzZXF1ZW5jZSwgbm90IHRpZWQgd2l0aCB0aGUgb3RoZXJzLiBBZGRyZXNzZWQgaW4gZ3JlZW4gaW5rLCBzaGFraWVyIHRoYW4gdGhlIHJlc3QuIFN0YW1wZWQuIEFuIGFkZHJlc3MgaW4gYSB0b3duIHR3byBob3VycyBmcm9tIGhlcmUuCgpJdCB3YXMgbmV2ZXIgc2VudC4=',
            'choices' => [
                ['text' => 'R28gdXAgdG8gdGhlIGF0dGlj', 'next' => '9_attic'],
            ],
            'terminal' => true,
        ],
        '9_attic' => [
            'prose'   => 'VGhlIGF0dGljIGlzIHRpZGllciB0aGFuIGF0dGljcyB1c3VhbGx5IGFyZS4gQm94ZXMgaW4gZ3JlZW4gaW5rIOKAlCBNYXJnYXJldCdzIGhhbmR3cml0aW5nLCBsYXRlIHBlcmlvZCwgdGhlIGNhcmVmdWwgdmVyc2lvbi4gQ2hyaXN0bWFzIHRoaW5ncy4gUGhvdG9ncmFwaHMgaW4gc2hvZWJveGVzLCBub3Qgc29ydGVkLiBBIGZvbGRlZCBxdWlsdCB0aGF0IHNtZWxscyBvZiBjZWRhci4KCkluIHRoZSBjb3JuZXI6IGEgc21hbGwgd29vZGVuIGJveCB3aXRoIGEgaGFzcCwgbm90IGxvY2tlZC4gSW5zaWRlLCB0aHJlZSB0aGluZ3MuIEEgcGhvdG9ncmFwaCBvZiB0d28gZ2lybHMsIHRlbiBhbmQgdHdlbHZlLCBvbiBhIGNvbGQgYmVhY2guIEEgc3ByaWcgb2Ygc29tZXRoaW5nIGRyaWVkLCB0aWVkIHdpdGggZ3JlZW4gdGhyZWFkLiBBbmQgYW4gZW52ZWxvcGUsIHVuc2VhbGVkLgoKVGhlIGxldHRlciBpbnNpZGUgaXMgZGF0ZWQgdGhyZWUgd2Vla3MgYWZ0ZXIgQXVkcmV5IGRpZWQuCgpNYXJnYXJldCBkaWRuJ3Qga25vdyB5ZXQuIFNoZSB3YXMgc3RpbGwgd3JpdGluZyB0byBoZXIu',
            'choices' => [
                ['text' => 'UHV0IGl0IGJhY2sgaW4gdGhlIGJveA==', 'next' => '10_keep'],
                ['text' => 'VGFrZSBpdCB0byBBdWRyZXkncyBncmF2ZQ==', 'next' => '10_send'],
            ],
        ],
        '10_keep' => [
            'prose'   => 'WW91IGZvbGQgdGhlIGxldHRlciBiYWNrIHRoZSB3YXkgeW91IGZvdW5kIGl0LiBZb3UgcHV0IGl0IGluIHRoZSBib3gsIGNsb3NlIHRoZSBoYXNwLCBzZXQgaXQgb24gdGhlIHNoZWxmLgoKWW91IGFyZSBub3QgdGhlIGludGVuZGVkIHJlYWRlci4gWW91J3JlIG5vdCBjZXJ0YWluIHRoZXJlIGlzIGFuIGludGVuZGVkIHJlYWRlciwgaW4gdGhlIG9yZGluYXJ5IHNlbnNlLiBTb21lIHRoaW5ncyBhcmUgd3JpdHRlbiB0byBiZSB3cml0dGVuLCBub3QgdG8gYXJyaXZlIOKAlCB0aGUgd3JpdGluZyBpcyB0aGUgYWN0IHRoYXQgbWF0dGVycywgdGhlIHJlYWNoaW5nIG91dCwgdGhlIGFkZHJlc3Mgb2Ygc29tZW9uZSBpbiB0aGUgZGFyay4KCllvdSBmaW5pc2ggdGhlIGludmVudG9yeS4gWW91IG5vdGUgb24gdGhlIHNvbGljaXRvcidzIGxpc3QgdGhhdCB0aGUgbGV0dGVycyBhcmUgcGVyc29uYWwgY29ycmVzcG9uZGVuY2UgYW5kIHNob3VsZCBiZSBrZXB0IHdpdGggdGhlIGZhbWlseSByZWNvcmRzLg==',
            'choices' => [
                ['text' => 'RmluaXNoIHRoZSBpbnZlbnRvcnk=', 'next' => '11_end_keep'],
            ],
        ],
        '10_send' => [
            'prose'   => 'TXJzIEZhbGxvbiBrbm93cyB0aGUgY2h1cmNoeWFyZCwgb2YgY291cnNlIHNoZSBkb2VzLiBTaGUgZ2l2ZXMgeW91IGRpcmVjdGlvbnMgd2l0aG91dCBhc2tpbmcgd2h5LCB3aGljaCBpcyBlaXRoZXIgdGFjdCBvciB0aGUgc2FtZSBxdWFsaXR5IHRoYXQgbWFkZSBoZXIgYnJpbmcgbGVtb24gY2FrZSB0byBhIHN0cmFuZ2VyIOKAlCB0aGUgdW5kZXJzdGFuZGluZyB0aGF0IHNvbWV0aW1lcyB0aGluZ3MgbmVlZCBkb2luZyBhbmQgcmVhc29ucyBjYW4gYmUgdGFsa2VkIGFib3V0IGxhdGVyLCBvciBub3QgYXQgYWxsLgoKVGhlIGdyYXZlIGlzIG5vdCBoYXJkIHRvIGZpbmQuIEEuIEcuIE1hcnNoLCBiZWxvdmVkIHNpc3Rlci4gU29tZW9uZSBlbHNlJ3MgZmxvd2VycywgcmVjZW50LgoKWW91IHB1dCB0aGUgbGV0dGVyIG9uIHRoZSBzdG9uZS4gWW91IHN0YW5kIHRoZXJlIGEgd2hpbGUuIFRoZSB3aW5kIGlzIGZyb20gdGhlIHdlc3QgYW5kIGl0IHNtZWxscyBvZiBjdXQgZ3Jhc3MgYW5kIHNvbWV0aGluZyBlbHNlLCBzb21ldGhpbmcgeW91IGNhbid0IG5hbWUsIHNvbWV0aGluZyB0aGF0IGlzbid0IGxvc3MgZXhhY3RseS4=',
            'choices' => [
                ['text' => 'RHJpdmUgaG9tZQ==', 'next' => '11_end_send'],
            ],
        ],
        '11_end_keep' => [
            'prose'   => 'WW91IGxvY2sgdGhlIGhvdXNlIGF0IGZvdXIgbydjbG9jay4gVGhlIHNvbGljaXRvcidzIGxpc3QgaXMgY29tcGxldGUuIFR3ZWx2ZSBpdGVtcyBwbHVzIGNvcnJlc3BvbmRlbmNlLgoKWW91IHNpdCBpbiB0aGUgY2FyIGZvciBhIHdoaWxlIGJlZm9yZSB5b3Ugc3RhcnQgaXQuIFRoZSBrZXkgaXMgb24gdGhlIHBhc3NlbmdlciBzZWF0IOKAlCB5b3UnbGwgcG9zdCBpdCB0b21vcnJvdy4KCllvdSBkb24ndCBrbm93IHdoYXQgd2FzIGluIE1hcmdhcmV0J3MgbGFzdCBsZXR0ZXIgdG8gQXVkcmV5LiBZb3Uga25vdyBzaGUgd3JvdGUgaXQsIGFuZCB0aGF0IHRoZSB3cml0aW5nIHdhcyB0aGUgdGhpbmcsIG5vdCB0aGUgZGVsaXZlcnkuIFNvbWUgY29ycmVzcG9uZGVuY2VzIGFyZSBoZWxkIHJhdGhlciB0aGFuIHNlbnQuIFNvbWUgdGhpbmdzIGFyZSBrZXB0IHdpdGhvdXQga25vd2luZyB3aHksIGFuZCB0aGUga2VlcGluZyBpcyB0aGUgcmlnaHQgYWN0aW9uIGV2ZW4gd2hlbiBpdCBkb2Vzbid0IGZlZWwgbGlrZSBhbiBhY3Rpb24gYXQgYWxsLgoKVGhlIGdhdGUgY2xvc2VzIG9uIGl0cyBvd24gd2VpZ2h0LiBZb3UgZHJpdmUgaG9tZS4=',
            'ending'  => true,
        ],
        '11_end_send' => [
            'prose'   => 'T24gdGhlIHdheSBiYWNrIHRvIHRoZSBjYXIgeW91IHRoaW5rIGFib3V0IHRoZSBmb3J0eSB5ZWFycyBvZiBncmVlbiBpbmssIHRoZSBlbGV2ZW4teWVhciBnYXAsIHRoZSBwYXRpZW50IHJlY29uc3RydWN0aW9uIGFmdGVyLgoKTWFyZ2FyZXQncyBsYXN0IGxldHRlciDigJQgd3JpdHRlbiB3aGlsZSBBdWRyZXkgd2FzIGFscmVhZHkgZ29uZSDigJQgd2Fzbid0IGEgbWlzdGFrZSBvciBhIGNvbmZ1c2lvbi4gSXQgd2FzIHRoZSBsYXN0IHN0ZXAgb2YgYSB2ZXJ5IGxvbmcgcHJhY3RpY2U6IHdyaXRlIHRvIGhlciwgYmVjYXVzZSB0aGF0J3Mgd2hhdCB5b3UgZG8uIEJlY2F1c2Ugc2hlJ3MgdGhlcmUgZXZlbiB3aGVuIHNoZSdzIG5vdCB0aGVyZS4gQmVjYXVzZSB0aGUgY29ycmVzcG9uZGVuY2UgaXMgd2hhdCBtYWRlIGhlciBwcmVzZW50LCBhbmQgbWlnaHQgbWFrZSBoZXIgcHJlc2VudCBvbmNlIG1vcmUsIGV2ZW4gbm93LgoKWW91IHRoaW5rIHRoaXMgbWF5IGJlIHdoYXQgcHJheWVyIGlzLgoKVGhlIGFmdGVybm9vbiBsaWdodCBpcyB0aGUgcGFydGljdWxhciBnb2xkIG9mIGxhdGUgYXV0dW1uLCBmYWxsaW5nIG9uIGV2ZXJ5dGhpbmcgd2l0aG91dCBwcmVmZXJlbmNlLCB0aGUgd2F5IGdvb2QgdGhpbmdzIGRvLiBZb3UgZHJpdmUgaG9tZS4=',
            'ending'  => true,
        ],
    ],
];
