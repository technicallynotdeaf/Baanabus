<?php
return [
    'id'    => 2,
    'title' => 'You Don\'t Read A Sky Cold',
    'color' => '#4A3A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEF0YWNhbWEgRGVzZXJ0IHVuZm9sZHMgYmVuZWF0aCB0aGUgUXVpZXQgSG91ciBpbiBhIHZhc3QsIGRyeSBvY2hyZSBleHBhbnNlLCB0aGUgZHJpZXN0IHBsYWNlIG9uIEVhcnRoIGFuZCwgYWZ0ZXIgZGFyaywgb25lIG9mIHRoZSBjbGVhcmVzdCwgaXRzIHRoaW4gYWlyIGJhcmVseSBibHVycmluZyBldmVuIHRoZSBmYWludGVzdCBzdGFycy4gUHJpeWEgYnJpbmdzIHRoZSBnbGlkZXIgZG93biBzbW9vdGhseSBuZWFyIGEgcmVzZWFyY2ggc2V0dGxlbWVudCBhcyBkdXNrIHByb3Blcmx5IHNldHRsZXMuCgpUd28gcm91dGVzIHRvd2FyZCB0aGUgdGVjaG5pY2lhbiBDb3J3aW4gYXBwYXJlbnRseSBzdHVkaWVkIHVuZGVyIGEgZnJpZW5kIG9mIHByZXNlbnQgdGhlbXNlbHZlczogdGhyb3VnaCB0aGUgc21hbGwgb2JzZXJ2YXRvcnkgY29tcGxleCBpdHNlbGYsIG9yIGFsb25nIGEgcXVpZXRlciBkaXJ0IHRyYWNrIHBhc3QgdGhlIGxvY2FsIHZpbGxhZ2Uu',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIG9ic2VydmF0b3J5IGNvbXBsZXg=', 'next' => '2_observatory'],
                ['text' => 'VGFrZSB0aGUgdmlsbGFnZSB0cmFjaw==', 'next' => '2_village'],
            ],
        ],
        '2_observatory' => [
            'prose'  => 'VGhlIG9ic2VydmF0b3J5IGNvbXBsZXggaHVtcyBxdWlldGx5IHdpdGggbGF0ZS1zaGlmdCB0ZWNobmljaWFucywgZG9tZXMgY2F0Y2hpbmcgdGhlIGxhc3Qgb3JhbmdlIGxpZ2h0IGJlZm9yZSBvcGVuaW5nIHByb3Blcmx5IHRvIHRoZSBjb21pbmcgbmlnaHQuIFlvdSdyZSBwb2ludGVkIG9ud2FyZCBlZmZpY2llbnRseSwgdGhlIHNwZWNpZmljIHRlY2huaWNpYW4geW91J3JlIGFmdGVyIGFwcGFyZW50bHkgZXhwZWN0aW5nIHlvdSBhbHJlYWR5Lg==',
            'choices' => [
                ['text' => 'RmluZCB0aGUgdGVjaG5pY2lhbg==', 'next' => '3_shared'],
            ],
        ],
        '2_village' => [
            'prose'  => 'VGhlIHZpbGxhZ2UgdHJhY2sgd2luZHMgcGFzdCBzbWFsbCBhZG9iZSBob21lcywgYSBmZXcgbG9jYWxzIG5vZGRpbmcgYXQgdGhlIFF1aWV0IEhvdXIncyBkaXN0aW5jdGl2ZSBzaWxob3VldHRlIHdpdGggdGhlIGVhc3kgZmFtaWxpYXJpdHkgb2YgcGVvcGxlIHVzZWQgdG8gc3RyYW5nZSB0cmF2ZWxsZXJzIHBhc3NpbmcgdGhyb3VnaCBmb3IgdGhlIHNreSBhYm92ZSB0aGVtLiBTb21lb25lIGRpcmVjdHMgeW91IG9ud2FyZCB0b3dhcmQgdGhlIHNhbWUgdGVjaG5pY2lhbiwgdW5wcm9tcHRlZC4=',
            'choices' => [
                ['text' => 'RmluZCB0aGUgdGVjaG5pY2lhbg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHRlY2huaWNpYW4sIGFuIHVuaHVycmllZCBvbGRlciBtYW4gbmFtZWQgRXN0ZWJhbiwgZ3JlZXRzIHlvdSB3aXRoIHJlYWwgd2FybXRoIHRoZSBtb21lbnQgQ29yd2luJ3MgbmFtZSBjb21lcyB1cC4gJ0FoIOKAlCBoaXMgZmFtaWx5LCBmaW5hbGx5LCcgaGUgc2F5cy4gJ0kgc3R1ZGllZCB1bmRlciBhIGNvbGxlYWd1ZSBvZiBoaXMsIHllYXJzIGFnby4gWW91ciBncmVhdC11bmNsZSBzZW50IHJpZGRsZXMgYnkgbGV0dGVyIHNvbWV0aW1lcywganVzdCBmb3IgdGhlIGpveSBvZiBpdC4gTmV2ZXIgZXhwbGFpbmVkIHdoeSBoZSBzdG9wcGVkLCBvbmx5IHRoYXQgc29tZXRoaW5nIGhhcHBlbmVkIGF0IHNlYSBoZSBuZXZlciB3YW50ZWQgdG8gZGlzY3VzcyBwcm9wZXJseS4nCgpIZSBzdHVkaWVzIHRoZSBhdGxhcydzIGJsYW5rIHBhdGNoIHlvdSBzaG93IGhpbSB3aXRoIHJlYWwgcmVjb2duaXRpb24uICdUaGlzIG9uZS4gSSBrbm93IGV4YWN0bHkgd2hpY2ggcmlkZGxlIGFuc3dlcnMgaXQuIEFyZSB5b3UgcmVhZHkgdG8gYWN0dWFsbHkgbGlzdGVuIHByb3Blcmx5LCB0aGUgd2F5IGl0J3MgbWVhbnQgdG8gYmUgaGVhcmQ/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSByZWFkeSB0byBsaXN0ZW4=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'RXN0ZWJhbiBvZmZlcnMgdHdvIHdheXMgdG8gcHJvcGVybHkgcmVjZWl2ZSBpdDogc2l0IHdpdGggaGltIG5vdywgYXQgdGhlIG9ic2VydmF0b3J5LCBoZWFyaW5nIHRoZSByaWRkbGUgZXhhY3RseSBhcyBpdCB3YXMgdG9sZCB0byBoaW0gZGVjYWRlcyBhZ28sIG9yIHdhaXQgdW50aWwgdHJ1ZSBkYXJrIGFuZCBoZWFyIGl0IHVuZGVyIHRoZSBhY3R1YWwgc2t5IGl0IGRlc2NyaWJlcywgdGhlIGNvbnN0ZWxsYXRpb24gaXRzZWxmIHJpc2luZyBhcyBoZSBzcGVha3MuCgonRWl0aGVyIGlzIHByb3BlciwnIGhlIHNheXMuICdIZWFyaW5nIGl0IHBsYWlubHksIG9yIGhlYXJpbmcgaXQgdW5kZXIgdGhlIHN0YXJzIHRoZW1zZWx2ZXMuIFlvdXIgY2hvaWNlLic=',
            'choices' => [
                ['text' => 'SGVhciBpdCBub3csIHBsYWlubHk=', 'next' => '5_now'],
                ['text' => 'V2FpdCBmb3IgdHJ1ZSBkYXJrIGFuZCB0aGUgc3RhcnMgdGhlbXNlbHZlcw==', 'next' => '5_stars'],
            ],
        ],
        '5_now' => [
            'prose'  => 'SGVhcmluZyBpdCBub3csIHBsYWlubHksIG1lYW5zIHNpdHRpbmcgd2l0aCBFc3RlYmFuIGluIHRoZSBvYnNlcnZhdG9yeSdzIHF1aWV0IGNvbW1vbiByb29tLCBoaXMgY2FyZWZ1bCB0ZWxsaW5nIG9mIHRoZSBsb2NhbCBkYXJrLXNreSB0cmFkaXRpb24gdW5odXJyaWVkIGFuZCB0aG9yb3VnaCwgZXZlcnkgZGV0YWlsIG9mIHRoZSByaWRkbGUncyBtZWFuaW5nIGV4cGxhaW5lZCBiZWZvcmUgeW91IGV2ZXIgc3RlcCBiYWNrIG91dHNpZGUgdG8gc2VlIGl0IGZvciB5b3Vyc2VsZi4KCkJ5IHRoZSB0aW1lIHlvdSBlbWVyZ2UsIHlvdSBhbHJlYWR5IGtub3cgZXhhY3RseSB3aGljaCBzaGFwZSB5b3UncmUgbG9va2luZyBmb3IgYWdhaW5zdCB0aGUgbmlnaHQgc2t5Lg==',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '5_stars' => [
            'prose'  => 'V2FpdGluZyBmb3IgdHJ1ZSBkYXJrIG1lYW5zIHN0YW5kaW5nIG91dHNpZGUgd2l0aCBFc3RlYmFuIGFzIHRoZSBza3kgZGVlcGVucyBwcm9wZXJseSwgdGhlIHJpZGRsZSB1bmZvbGRpbmcgaW4gcmVhbCB0aW1lIGFzIHRoZSBleGFjdCBzaGFwZSBpdCBkZXNjcmliZXMgYWN0dWFsbHkgcmlzZXMgYWJvdmUgdGhlIGhvcml6b24sIGhpcyB3b3JkcyBhbmQgdGhlIHNreSBpdHNlbGYgYXJyaXZpbmcgdG9nZXRoZXIgaW4gYSB3YXkgdGhhdCBtYWtlcyB0aGUgd2hvbGUgdGhpbmcgbGFuZCBjb25zaWRlcmFibHkgbW9yZSB2aXZpZGx5LgoKQnkgdGhlIHRpbWUgaGUgZmluaXNoZXMsIHRoZSBjb25zdGVsbGF0aW9uIGlzIHJpZ2h0IHRoZXJlIGFib3ZlIHlvdSwgdW5taXN0YWthYmxlLg==',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMncyBibGFuayBwYXRjaCB5b3Vyc2VsZiwgeW91ciBvd24gaGFuZCBjb25zaWRlcmFibHkgbGVzcyBzdGVhZHkgdGhhbiBDb3J3aW4ncyBjYXJlZnVsIGxpbmVzIGVsc2V3aGVyZSBpbiB0aGUgYm9vaywgYnV0IHRoZSBzaGFwZSB1bm1pc3Rha2FibHksIHByb3Blcmx5IHRoZXJlIGF0IGxhc3QuIEVzdGViYW4gd2F0Y2hlcyB3aXRoIHF1aWV0IHNhdGlzZmFjdGlvbiwgdGhlbiBhZGRzIGhpcyBvd24gbm90ZSBiZXNpZGUgaXQg4oCUIHdobyB0b2xkIGl0LCBhbmQgaG93IGl0J3Mga25vd24gaGVyZSBpbiB0aGUgQXRhY2FtYSdzIG93biBkYXJrLXNreSB0cmFkaXRpb24uCgonVGhhdCdzIG9uZSwnIGhlIHNheXMuICdXaGF0ZXZlcidzIG5leHQsIHlvdSdsbCBmaW5kIHNvbWVvbmUgZWxzZSBleGFjdGx5IGxpa2UgbWUsIHdpbGxpbmcgdG8gdGVsbCBpdCBwcm9wZXJseSwgd2hlcmV2ZXIgdGhlIGF0bGFzIGxlYWRzIHlvdS4n',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBwcmVwYXJlIHRvIGxlYXZl', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNsaW1iIGJhY2sgYWJvYXJkIHRoZSBRdWlldCBIb3VyIGFzIHRoZSBBdGFjYW1hJ3MgaW1wb3NzaWJseSBjbGVhciBza3kgd2hlZWxzIHNsb3dseSBvdmVyaGVhZCwgdGhlIGF0bGFzJ3MgZmlyc3QgYmxhbmsgcGF0Y2ggbm93IHByb3Blcmx5LCBwZXJtYW5lbnRseSBmaWxsZWQuIFByaXlhIHBvdXJzIGEgc2hhcmVkIHRoZXJtb3Mgb2Ygc29tZXRoaW5nIGhvdCwgc3RlYW0gY3VybGluZyBpbnRvIHRoZSBjb2xkIGRlc2VydCBhaXIuICdNeSBydWxlLCcgc2hlIHNheXMuICdZb3UgZG9uJ3QgcmVhZCBhIHNreSBjb2xkLiBFdmVyLicKClNoZSBsb2dzIHRoZSBleGFjdCBtaW51dGUgb2YgdHJ1ZSBkYXJrIGNhcmVmdWxseSBpbiBhIHdvcm4gbm90ZWJvb2ssIGFscmVhZHkgdGhpY2sgd2l0aCBkZWNhZGVzIG9mIENvcndpbidzIG93biBtYXRjaGluZyBlbnRyaWVzLg==',
            'choices' => [
                ['text' => 'U2F5IHRoZSB3aG9sZSB0aGluZyBmZWx0IG1vcmUgc2lnbmlmaWNhbnQgdGhhbiB5b3UgZXhwZWN0ZWQ=', 'next' => '8_end_significant'],
                ['text' => 'U2F5IHlvdSdyZSBzdGFydGluZyB0byB1bmRlcnN0YW5kIHdoeSBDb3J3aW4gbG92ZWQgdGhpcw==', 'next' => '8_end_understand'],
            ],
        ],
        '8_end_significant' => [
            'prose'  => 'J0hvbmVzdGx5LCB0aGUgd2hvbGUgdGhpbmcgZmVsdCBtb3JlIHNpZ25pZmljYW50IHRoYW4gSSBleHBlY3RlZCwnIHlvdSBhZG1pdCwgd2F0Y2hpbmcgc3RlYW0gcmlzZSBmcm9tIHRoZSBzaGFyZWQgdGhlcm1vcyBpbnRvIHRoZSBpbXBvc3NpYmx5IGNsZWFyIGRlc2VydCBhaXIuICdOb3QganVzdCBmaWxsaW5nIGluIGEgYmxhbmsgcGFnZS4gQWN0dWFsbHkgaGVhcmluZyBzb21ldGhpbmcgcmVhbCwgcGFzc2VkIGRvd24gcHJvcGVybHksIGFuZCBiZWluZyB0cnVzdGVkIHRvIGNhcnJ5IGl0IGZvcndhcmQgbXlzZWxmLicKClByaXlhIG5vZHMgc2xvd2x5LCBsb2dnaW5nIHRoZSBsYXN0IG9mIHRvbmlnaHQncyBub3Rlcy4gJ1RoYXQncyByYXRoZXIgdGhlIHdob2xlIHBvaW50IG9mIGl0LCBJIHRoaW5rLiBHb29kIHN0YXJ0LiBUd2VudHktdHdvIG1vcmUgdG8gZ28uJw==',
            'ending' => true,
        ],
        '8_end_understand' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gc3RhcnRpbmcgdG8gdW5kZXJzdGFuZCB3aHkgQ29yd2luIGxvdmVkIHRoaXMsJyB5b3Ugc2F5LCBsb29raW5nIHVwIGF0IHRoZSBBdGFjYW1hJ3MgaW1wb3NzaWJseSBkZW5zZSBzY2F0dGVyIG9mIHN0YXJzLiAnTm90IHRoZSBhc3Ryb25vbXkgZXhhY3RseS4gVGhlIGxpc3RlbmluZy4gVGhlIGJlaW5nIHRydXN0ZWQgd2l0aCBzb21ldGhpbmcgc29tZW9uZSBlbHNlIGNhcmVkIGVub3VnaCB0byBrZWVwLicKClByaXlhIHNtaWxlcywgY2xvc2luZyBoZXIgbm90ZWJvb2sgZm9yIHRoZSBuaWdodC4gJ0hlJ2QgYmUgZ2xhZCB0byBoZWFyIHlvdSBzYXkgdGhhdC4gR2V0IHNvbWUgcmVzdCDigJQgdGhlIG5leHQgc3RvcCdzIGEgcHJvcGVyIGpvdXJuZXksIGFuZCBTdWxpIGdldHMgcmVzdGxlc3MgaWYgd2UgbGluZ2VyIHRvbyBsb25nIGFueXdoZXJlLicgVGhlIGRlc2VydCBuaWdodCBzZXR0bGVzLCB2YXN0IGFuZCBzaWxlbnQsIGFyb3VuZCB0aGUgc21hbGwsIHdhaXRpbmcgZ2xpZGVyLg==',
            'ending' => true,
        ],
    ],
];
