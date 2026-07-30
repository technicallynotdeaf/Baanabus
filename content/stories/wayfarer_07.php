<?php
return [
    'id'    => 7,
    'title' => 'The Letter Pinned Inside',
    'color' => '#4A8A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFNpbWllbiBNb3VudGFpbnMgc3BsaXQgdGhlIHNreSB3aXRoIGphZ2dlZCBlc2NhcnBtZW50cyBhbmQgY2xpZmZzIHRoYXQgZHJvcCBhd2F5IHdpdGggc3RhcnRsaW5nIHN1ZGRlbm5lc3MsIGdlbGFkYSBiYWJvb25zIGdyYXppbmcgdW5ib3RoZXJlZCBhbG9uZyByaWRnZWxpbmVzIHRoYXQgd291bGQgZ2l2ZSBtb3N0IGh1bWFucyBjb25zaWRlcmFibGUgcGF1c2UuIEdyZXRhIG1vb3JzIHRoZSBDb250b3VyIG9uIGEgcmFyZSBmbGF0IG91dGNyb3AsIHdhdGNoaW5nIHRoZSBnZWxhZGFzIHdpdGggb3BlbiBkZWxpZ2h0LgoKVHdvIHRyYWlscyB0b3dhcmQgdGhlIG1vdW50YWluIG1vbmFzdGVyeSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRoZSByaWRnZSBwYXRoLCBzcGVjdGFjdWxhciBhbmQgZXhwb3NlZCwgdHJhY2luZyB0aGUgdmVyeSBlZGdlIG9mIHRoZSBlc2NhcnBtZW50LCBvciB0aGUgbG93ZXIgdmFsbGV5IHBhdGgsIHNhZmVyLCBzbG93ZXIsIHdpbmRpbmcgYmVuZWF0aCB0aGUgY2xpZmZzIHJhdGhlciB0aGFuIGFsb25nIHRoZW0u',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgcmlkZ2UgcGF0aA==', 'next' => '2_ridge'],
                ['text' => 'VGFrZSB0aGUgdmFsbGV5IHBhdGg=', 'next' => '2_valley'],
            ],
        ],
        '2_ridge' => [
            'prose'  => 'VGhlIHJpZGdlIHBhdGggaXMgZ2VudWluZWx5IGJyZWF0aHRha2luZyBhbmQgZ2VudWluZWx5IHRlcnJpZnlpbmcgaW4gcm91Z2hseSBlcXVhbCBtZWFzdXJlLCBnZWxhZGEgdHJvb3BzIHNjYXR0ZXJpbmcgYW5kIHJlZm9ybWluZyBhcm91bmQgeW91IGFzIHlvdSBwYXNzLCB0aGUgZXNjYXJwbWVudCBmYWxsaW5nIGF3YXkgc2hlZXIgYW5kIHZhc3Qgb24gb25lIHNpZGUgdGhlIGVudGlyZSB3YXkuIEdyZXRhLCB1bmJvdGhlcmVkIGJ5IGhlaWdodHMgaW4gYSB3YXkgeW91J3JlIGJlZ2lubmluZyB0byBzdXNwZWN0IGlzIHByb2Zlc3Npb25hbCByYXRoZXIgdGhhbiBuYXR1cmFsLCB3YWxrcyBpdCBsaWtlIGxldmVsIGdyb3VuZC4KCllvdSBhcnJpdmUgYXQgdGhlIG1vbmFzdGVyeSBnYXRlIHdpdGggeW91ciBuZXJ2ZXMgY29uc2lkZXJhYmx5IG1vcmUgdGVzdGVkIHRoYW4geW91ciBsZWdzLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdhdGU=', 'next' => '3_shared'],
            ],
        ],
        '2_valley' => [
            'prose'  => 'VGhlIHZhbGxleSBwYXRoIGlzIGNhbG1lciwgY29vbGVyLCB0aHJlYWRpbmcgYmVuZWF0aCB0aGUgZXNjYXJwbWVudCdzIHNoYWRvdyBwYXN0IHNtYWxsIHRlcnJhY2VkIGZpZWxkcyB3b3JrZWQgYnkgbW9ua3MgYW5kIHZpbGxhZ2VycyBhbGlrZS4gQmlyZHNvbmcgcmVwbGFjZXMgdGhlIHJpZGdlJ3Mgd2luZC1yb2FyIGFsbW9zdCBlbnRpcmVseSwgYW5kIHRoZSB3aG9sZSB3YWxrIGhhcyBhIHNldHRsZWQsIHVuaHVycmllZCBxdWFsaXR5IHRoYXQgc2VlbXMgdG8gbWF0Y2ggdGhlIGRlc3RpbmF0aW9uIGl0c2VsZi4KCllvdSBhcnJpdmUgYXQgdGhlIG1vbmFzdGVyeSBnYXRlIGhhdmluZyBiYXJlbHkgcmFpc2VkIHlvdXIgcHVsc2UsIGFuZCBjb25zaWRlcmFibHkgbW9yZSBhYmxlIHRvIGFwcHJlY2lhdGUgdGhlIGJ1aWxkaW5nJ3MgYWN0dWFsIGFyY2hpdGVjdHVyZSBmb3IgaXQu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGdhdGU=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIG1vbmFzdGVyeSBpcyBhbmNpZW50LCBjYXJ2ZWQgcGFydGx5IGludG8gdGhlIGNsaWZmIGl0c2VsZiwgYW5kIHRoZSBtb25rIHdobyBncmVldHMgeW91IOKAlCBpbXBvc3NpYmx5IG9sZCwgbW92aW5nIHNsb3dseSBidXQgd2l0aCByZWFsIHB1cnBvc2Ug4oCUIHJlY29nbmlzZXMgQXVndXN0aW4ncyBuYW1lIHRoZSBtb21lbnQgeW91IHNheSBpdCwgYW5kIHNpbXBseSBub2RzLCBhcyB0aG91Z2ggaGUncyBiZWVuIGV4cGVjdGluZyB0aGlzIGV4YWN0IGNvbnZlcnNhdGlvbiBmb3IgYSB2ZXJ5IGxvbmcgdGltZS4KCidIZSBjYW1lIGhlcmUgb25jZSwgbG9uZyBhZ28sIGNhcnJ5aW5nIGdyaWVmIGhlIHdvdWxkbid0IG5hbWUsJyB0aGUgbW9uayBzYXlzLiAnTGVmdCBzb21ldGhpbmcgYmVoaW5kLCBkZWxpYmVyYXRlbHksIEkgdGhpbmsuIFdhbnRlZCBpdCBrZXB0IHNvbWV3aGVyZSBoZSB0cnVzdGVkIGl0IHdvdWxkbid0IHNpbXBseSBiZSB0aHJvd24gYXdheS4nIEhlIHN0dWRpZXMgeW91LiAnWW91J2xsIHdhbnQgdG8gZWFybiB0aGUgcmlnaHQgdG8gaXQgcHJvcGVybHksIHRoZSB3YXkgYW55dGhpbmcga2VwdCB0aGlzIGNhcmVmdWxseSBzaG91bGQgYmUgZWFybmVkLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIG1vbmFzdGVyeSdzIGRheXMgcnVuIG9uIG9sZCwgdW5odXJyaWVkIHJoeXRobXMg4oCUIGRhd24gcHJheWVycywgY29tbXVuYWwgd29yayBpbiB0aGUgdGVycmFjZWQgZmllbGRzLCB0aGUgY2FyZWZ1bCwgcGF0aWVudCB0cmFuc2NyaXB0aW9uIG9mIG1hbnVzY3JpcHRzIHRvbyBmcmFnaWxlIHRvIHJpc2sgZnVydGhlciBoYW5kbGluZyBieSB1bnN0ZWFkeSBoYW5kcy4gVGhlIG1vbmsgb2ZmZXJzIHlvdSBhIGNob2ljZTogam9pbiB0aGUgd29ya2luZyByaHl0aG0gb2YgdGhlIHBsYWNlIHByb3Blcmx5LCBkYXduIHRvIGR1c2ssIG9yIGhlbHAgc3BlY2lmaWNhbGx5IHdpdGggdGhlIG1hbnVzY3JpcHQgd29yaywgd2hpY2ggaGFwcGVucyB0byBpbmNsdWRlIHNldmVyYWwgcGFnZXMgaW4gYSBoYW5kIG5vdCB1bmxpa2UgeW91ciBncmFuZGZhdGhlcidzIG93bi4=',
            'choices' => [
                ['text' => 'Sm9pbiB0aGUgZGFpbHkgd29ya2luZyByaHl0aG0=', 'next' => '5_rhythm'],
                ['text' => 'SGVscCB3aXRoIHRoZSBtYW51c2NyaXB0IHRyYW5zY3JpcHRpb24=', 'next' => '5_manuscript'],
            ],
        ],
        '5_rhythm' => [
            'prose'  => 'Sm9pbmluZyB0aGUgZGFpbHkgcmh5dGhtIG1lYW5zIHJlYWwsIHVuZ2xhbW9yb3VzIGxhYm91ciDigJQgY2Fycnlpbmcgd2F0ZXIsIHdvcmtpbmcgdGhlIHRlcnJhY2VzLCBzaXR0aW5nIHRocm91Z2ggcHJheWVycyB3aG9zZSBsYW5ndWFnZSB5b3UgZG9uJ3QgdW5kZXJzdGFuZCBidXQgd2hvc2Ugcmh5dGhtLCBzb21laG93LCB5b3UgZmluZCB5b3Vyc2VsZiBzZXR0bGluZyBpbnRvIGFueXdheS4gTm9ib2R5IGV4cGxhaW5zIGFueXRoaW5nIHRvIHlvdSBkaXJlY3RseS4gWW91J3JlIHNpbXBseSBleHBlY3RlZCB0byBub3RpY2UsIGFuZCBldmVudHVhbGx5LCBtb3N0bHksIHlvdSBkby4KCkJ5IGV2ZW5pbmcsIG9uZSBvZiB0aGUgeW91bmdlciBtb25rcywgd2l0aG91dCBiZWluZyBhc2tlZCwgcXVpZXRseSBzaG93cyB5b3Ugd2hlcmUgdGhlIHNpZ2h0aW5nIHZhbmUgaGFzIGJlZW4ga2VwdCBhbGwgYWxvbmcu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQncyBrZXB0IHdpdGggaXQ=', 'next' => '6_shared'],
            ],
        ],
        '5_manuscript' => [
            'prose'  => 'VHJhbnNjcmliaW5nIGZyYWdpbGUgb2xkIHBhZ2VzIGlzIHNsb3csIGV4YWN0aW5nLCBmYWludGx5IG1lZGl0YXRpdmUgd29yaywgaW5rIGFuZCBjYXJlZnVsIGF0dGVudGlvbiBzdGFuZGluZyBpbiBmb3Igd29yZHMgeW91IG9mdGVuIGNhbid0IHJlYWQgYXQgYWxsLiBQYXJ0d2F5IHRocm91Z2ggdGhlIGFmdGVybm9vbiwgeW91IGZpbmQsIHR1Y2tlZCBiZXR3ZWVuIHR3byBnZW51aW5lbHkgYW5jaWVudCBwYWdlcywgYSBzY3JhcCBvZiBmYXIgbW9yZSByZWNlbnQgcGFwZXIg4oCUIEF1Z3VzdGluJ3MgaGFuZCwgdW5taXN0YWthYmxlLCBpbiB0aGUgbWFyZ2luIG9mIHNvbWV0aGluZyBoZSBjbGVhcmx5IHdhc24ndCBzdXBwb3NlZCB0byBiZSB3cml0aW5nIG9uLgoKVGhlIG9sZCBtb25rLCB3YXRjaGluZyB5b3UgZmluZCBpdCwgc2ltcGx5IG5vZHMsIGFzIHRob3VnaCB0aGlzIHdhcyBhbHdheXMgZXhhY3RseSB3aGVyZSBoZSBleHBlY3RlZCB5b3UgdG8gbG9vay4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQncyBrZXB0IHdpdGggaXQ=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgZm91bmQgeW91ciB3YXkgdGhlcmUsIHRoZSBtb25rIGJyaW5ncyBvdXQgdGhlIHNlY29uZCBzaWdodGluZyB2YW5lIGhpbXNlbGYsIGEgZm9sZGVkIGxldHRlciBwaW5uZWQgY2FyZWZ1bGx5IGluc2lkZSBpdHMgY2FzZSDigJQgQXVndXN0aW4ncyBoYW5kIGFnYWluLCBhZGRyZXNzZWQgc2ltcGx5IHRvICdNLicgYW5kIHNlYWxlZCwgdW5vcGVuZWQsIGZvciB3aGF0IGxvb2tzIGxpa2UgZGVjYWRlcy4KCidIZSBhc2tlZCBtZSB0byBrZWVwIGl0IHNhZmUgdW50aWwgc29tZW9uZSBjYW1lIHdobyBkZXNlcnZlZCB0byByZWFkIGl0LCcgdGhlIG1vbmsgc2F5cy4gJ0kndmUgbmV2ZXIgb3BlbmVkIGl0IG15c2VsZi4gVGhhdCB3YXMgbmV2ZXIgbWluZSB0byBkby4nIEhlIHBsYWNlcyBib3RoIHRoZSB2YW5lIGFuZCB0aGUgbGV0dGVyIGluIHlvdXIgaGFuZHMgdG9nZXRoZXIuICdQZXJoYXBzIGl0J3MgdGltZSBzb21lb25lIGZpbmFsbHkgZGlkLic=',
            'choices' => [
                ['text' => 'RGVjaWRlIHdoYXQgdG8gZG8gd2l0aCB0aGUgbGV0dGVy', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNhcnJ5IGJvdGgg4oCUIHZhbmUgYW5kIHVub3BlbmVkIGxldHRlciDigJQgYmFjayBkb3duIHdoaWNoZXZlciBwYXRoIHlvdSBkaWRuJ3QgdGFrZSBvbiB0aGUgd2F5IHVwLCB0aGUgU2ltaWVuIGVzY2FycG1lbnRzIGNhdGNoaW5nIHRoZSBkYXkncyBsYXN0IGxpZ2h0IGluIGxvbmcgZ29sZC1hbmQtc2hhZG93IHN0cmlwZXMsIGdlbGFkYSB0cm9vcHMgc2V0dGxpbmcgZm9yIHRoZSBldmVuaW5nIGFsb25nIHJpZGdlcyB0aGF0IG5vIGxvbmdlciBmZWVsIHF1aXRlIHNvIHRlcnJpZnlpbmcgbm93IHRoYXQgeW91J3ZlIHByb3Blcmx5IHdhbGtlZCBvbmUuCgpHcmV0YSwgc2VlaW5nIHRoZSBsZXR0ZXIsIGRvZXNuJ3QgYXNrIHdoYXQgaXQgc2F5cy4gU2hlIGRvZXMgYXNrLCBnZW50bHksIHdoZXRoZXIgeW91J3JlIGdvaW5nIHRvIG9wZW4gaXQu',
            'choices' => [
                ['text' => 'T3BlbiB0aGUgbGV0dGVyIG5vdw==', 'next' => '8_end_open'],
                ['text' => 'V2FpdCB1bnRpbCB5b3UncmUgcmVhZHk=', 'next' => '8_end_wait'],
            ],
        ],
        '8_end_open' => [
            'prose'  => 'WW91IG9wZW4gaXQgdGhlcmUsIG9uIHRoZSBtb3VudGFpbnNpZGUsIGhhbmRzIG5vdCBxdWl0ZSBzdGVhZHkuIEl0J3Mgc2hvcnQg4oCUIGFuIGFwb2xvZ3ksIG1vc3RseSwgdG8gc29tZW9uZSBuYW1lZCBNYXJndWVyaXRlLCBmb3IgYSBwcm9taXNlIGFib3V0IGZpbmlzaGluZyBhIHN1cnZleSB0b2dldGhlciB0aGF0IGhlIGJyb2tlIHdpdGhvdXQgZXZlciBwcm9wZXJseSBleHBsYWluaW5nIHdoeSwgYW5kIGEgbGluZSwgbmVhciB0aGUgZW5kLCB0aGF0IHN0b3BzIHlvdSBjb21wbGV0ZWx5OiAqTS4g4oCUIGlmIHRoaXMgZXZlciBmaW5kcyB5b3UsIGtub3cgdGhlIHBhc3Mgd2FzIG5ldmVyIHJlYWxseSBhYm91dCB0aGUgbW91bnRhaW4uKgoKWW91IGRvbid0IGZ1bGx5IHVuZGVyc3RhbmQgaXQgeWV0LiBCdXQgeW91IHVuZGVyc3RhbmQsIG5vdywgdGhhdCAnaGVyJyBoYXMgYSBuYW1lLCBhbmQgdGhhdCB0aGlzIHdob2xlIGpvdXJuZXkgaXMgY2lyY2xpbmcgc29tZXRoaW5nIGZhciBtb3JlIHNwZWNpZmljIHRoYW4gYSBzaW1wbGUgdW5maW5pc2hlZCBjaGFydC4gWW91IGZvbGQgdGhlIGxldHRlciBhd2F5IGNhcmVmdWxseSwgYW5kIGtlZXAgd2Fsa2luZy4=',
            'ending' => true,
        ],
        '8_end_wait' => [
            'prose'  => 'WW91IGRlY2lkZSB0byB3YWl0LCBmb2xkaW5nIHRoZSBsZXR0ZXIgYXdheSB1bm9wZW5lZCBpbiB0aGUgY2FzZSdzIG5ld2VzdCBjdXRvdXQsIGRlY2lkaW5nIHNvbWUgdGhpbmdzIGRlc2VydmUgYSBxdWlldGVyIG1vbWVudCB0aGFuIGEgbW91bnRhaW5zaWRlIGF0IGR1c2sgd2l0aCBhIGxvbmcgZGF5J3Mgd2FsayBzdGlsbCBjYXRjaGluZyB1cCB0byB5b3VyIGxlZ3MuCgpUaGUgQ29udG91ciBsaWZ0cyBvZmYgdGhlIFNpbWllbiBlc2NhcnBtZW50IGFzIHRoZSBnZWxhZGFzIHNldHRsZSBmb3IgdGhlIG5pZ2h0IGJlbG93LCBhbmQgdGhlIHNlYWxlZCBsZXR0ZXIgcmlkZXMgYWxvbmdzaWRlIHRoZSB2YW5lLCBwYXRpZW50LCB1bnJlYWQsIGNhcnJ5aW5nIHdoYXRldmVyIGl0J3MgY2FycnlpbmcgZm9yIGp1c3QgYSBsaXR0bGUgd2hpbGUgbG9uZ2VyIOKAlCB1bnRpbCB5b3UncmUgcHJvcGVybHkgcmVhZHkgdG8gYWN0dWFsbHkgcmVjZWl2ZSBpdC4=',
            'ending' => true,
        ],
    ],
];
