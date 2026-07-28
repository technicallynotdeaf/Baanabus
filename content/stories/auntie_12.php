<?php
return [
    'id'    => 12,
    'title' => 'What the Ledger Remembered',
    'color' => '#5A5A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TmF1cnUgaXMgc21hbGxlciB0aGFuIGFueXdoZXJlIHlvdSd2ZSBzdG9wcGVkLCBhIHNpbmdsZSByb3VuZCBpc2xhbmQgeW91IGNvdWxkIHdhbGsgdGhlIGNvYXN0IG9mIGluIGFuIGFmdGVybm9vbiDigJQgZXhjZXB0IHRoZSBjb2FzdCBpcyBiYXNpY2FsbHkgYWxsIHRoZXJlIGlzIGxlZnQgdG8gd2FsayBlYXNpbHkuIElubGFuZCwgJ1RvcHNpZGUnIHJpc2VzIGluIGEgamFnZ2VkIGdyZXkgbW9vbnNjYXBlIG9mIGNvcmFsIHBpbm5hY2xlcywgcGhvc3BoYXRlIHN0cmlwcGVkIG91dCBvZiBpdCBkZWNhZGUgYWZ0ZXIgZGVjYWRlIHVudGlsIGFsbW9zdCBub3RoaW5nIGdyZWVuIHJlbWFpbnMgdXAgdGhlcmUgYXQgYWxsLCB0aGUgd2hvbGUgaW50ZXJpb3IgdHVybmVkIGluc2lkZSBvdXQgYW5kIGxlZnQgc3RhbmRpbmcgaW4gc3Bpa2VzLgoKU29sYW5nZSdzIGZhY2UsIG9uIHRoZSBhcHByb2FjaCwgZ29lcyBjYXJlZnVsbHkgbmV1dHJhbCBpbiBhIHdheSB5b3UndmUgbGVhcm5lZCBtZWFucyBzaGUgaGFzIG9waW5pb25zIHNoZSdzIGNob29zaW5nIG5vdCB0byBzaGFyZSB1bnByb21wdGVkLiBUd28gd2F5cyB0byBzdGFydCBwcmVzZW50IHRoZW1zZWx2ZXM6IGhlYWQgc3RyYWlnaHQgdXAgb250byBUb3BzaWRlIGl0c2VsZiwgb3IgZm9sbG93IHRoZSBjb2FzdGFsIHJpbmcgcm9hZCByb3VuZCB0byBhc2sgYWZ0ZXIgQXVudGllJ3MgaGlzdG9yeSBmcm9tIHBlb3BsZSB3aG8gbWlnaHQgYWN0dWFsbHkgcmVtZW1iZXIgaXQu',
            'choices' => [
                ['text' => 'R28gc3RyYWlnaHQgdXAgdG8gVG9wc2lkZQ==', 'next' => '2_topside'],
                ['text' => 'Rm9sbG93IHRoZSBjb2FzdGFsIHJpbmcgcm9hZA==', 'next' => '2_coastal'],
            ],
        ],
        '2_topside' => [
            'prose'  => 'VG9wc2lkZSBpcyBleGFjdGx5IGFzIHN0YXJrIHVwIGNsb3NlIGFzIGl0IGxvb2tlZCBmcm9tIHRoZSBhaXIg4oCUIGdyZXkgY29yYWwgcGlubmFjbGVzIHN0YW5kaW5nIGluIHJhbmtzIHdoZXJlIGdvb2QgZ3JvdW5kIHVzZWQgdG8gYmUsIHRoZSBoZWF0IHJhZGlhdGluZyB1cCBvZmYgYmFyZSByb2NrIHdpdGggbm90aGluZyBsZWZ0IHRvIHNoYWRlIGl0LCBvbGQgcmFpbCBsaW5lcyBhbmQgcnVzdGVkIG1hY2hpbmVyeSBoYWxmLXN3YWxsb3dlZCBieSBwaW5uYWNsZSBhbmQgZHVzdC4gSXQncyBub3QgYSBydWluIGV4YWN0bHksIG1vcmUgYSB3b3VuZCB0aGF0IHN0b3BwZWQgYmxlZWRpbmcgYSBsb25nIHRpbWUgYWdvIGFuZCBzaW1wbHkgbmV2ZXIgaGVhbGVkIG92ZXIuCgpBbiBvbGQgY29udmV5b3IgZ2FudHJ5LCBzaWxlbnQgYW5kIHJ1c3Qtc3RyZWFrZWQsIHBvaW50cyB5b3UgdG93YXJkIGEgbG93IGJ1aWxkaW5nIGF0IFRvcHNpZGUncyBlZGdlIHRoYXQgdHVybnMgb3V0IHRvIHN0aWxsIGJlIGluIHVzZSDigJQgdGhlIGlzbGFuZCdzIHNtYWxsIG1pbmluZyByZWNvcmQgb2ZmaWNlLCBrZXB0LCBhY2NvcmRpbmcgdG8gYSBoYW5kLWxldHRlcmVkIHNpZ24sIGJ5IGFwcG9pbnRtZW50IG9yIGJ5IHNpbXBseSBrbm9ja2luZy4=',
            'choices' => [
                ['text' => 'S25vY2s=', 'next' => '3_shared'],
            ],
        ],
        '2_coastal' => [
            'prose'  => 'VGhlIHJpbmcgcm9hZCBsb29wcyB0aGUgaXNsYW5kJ3MgbmFycm93IGdyZWVuIGZyaW5nZSwgaG91c2VzIGFuZCBnYXJkZW5zIG1ha2luZyB0aGUgbW9zdCBvZiB0aGUgb25seSBkZWNlbnQgZ3JvdW5kIGxlZnQsIGFuZCB3b3JkIG9mIHlvdXIgZXJyYW5kIHRyYXZlbHMgZmFzdCBlbm91Z2ggdGhhdCBieSB5b3VyIHRoaXJkIGNvbnZlcnNhdGlvbiwgc29tZW9uZSdzIGFscmVhZHkgcG9pbnRlZCB5b3UgdG93YXJkIHRoZSByZWNvcmQgb2ZmaWNlIGF0IFRvcHNpZGUncyBlZGdlIOKAlCBhcHBhcmVudGx5IHRoZSBvbmx5IHBsYWNlIG9sZCBlbm91Z2gsIGFuZCBvcmdhbmlzZWQgZW5vdWdoLCB0byBob2xkIHdoYXQgeW91J3JlIGFmdGVyLgoKJ0FzayBmb3IgdGhlIGtlZXBlciwnIGFuIG9sZGVyIHdvbWFuIHRlbGxzIHlvdSwgdGVuZGluZyBhIGdhcmRlbiB0aGF0IGxvb2tzIGxpa2UgaXQncyB3aW5uaW5nIGEgc2xvdyBhcmd1bWVudCB3aXRoIHRoZSBzYWx0IGFpci4gJ1NoZSBrbm93cyBtb3JlIGFib3V0IHRoaXMgaXNsYW5kJ3MgcGFzdCB0aGFuIHRoZSBpc2xhbmQgZG9lcywgc29tZSBkYXlzLic=',
            'choices' => [
                ['text' => 'SGVhZCB0byB0aGUgcmVjb3JkIG9mZmljZQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHJlY29yZCBvZmZpY2UgaXMgb25lIHJvb20sIGNsb3NlIGFuZCBwYXBlci1kcnksIHNoZWx2ZWQgZmxvb3IgdG8gY2VpbGluZyB3aXRoIGxlZGdlcnMgZ29uZSBzb2Z0IGFuZCBicm93biBhdCB0aGUgZWRnZXMg4oCUIGRlY2FkZXMgb2YgdG9ubmFnZSwgc2hpcG1lbnRzLCBuYW1lcywgdGhlIHdob2xlIGhhcmQgYXJpdGhtZXRpYyBvZiB3aGF0IHRoaXMgaXNsYW5kIGdhdmUgdXAgYW5kIHRvIHdob20uIFRoZSBrZWVwZXIsIHNoYXJwLWV5ZWQgYmVoaW5kIHN0YWNrcyB0aGF0IHdvdWxkIGRlZmVhdCBtb3N0IHBlb3BsZSdzIHBhdGllbmNlLCBrbm93cyBleGFjdGx5IHdoYXQgc2hlJ3MgbG9va2luZyBhdCB0aGUgc2Vjb25kIHlvdSBtZW50aW9uIEF1bnRpZSdzIG5hbWUuCgonU2hlIHdhcyBoZXJlIGFzIGEgZ2lybCwnIHRoZSBrZWVwZXIgc2F5cy4gJ0ZhbWlseSB3b3JrZWQgdGhlIGxvYWRpbmcgZ2FudHJ5LCBvbmUgYmFkIHNlYXNvbiwgYmVmb3JlIHRoZXkgbW92ZWQgb24uIFRoZXJlJ3MgYSBwYWdlIHdpdGggaGVyIGZhdGhlcidzIG5hbWUgb24gaXQgc29tZXdoZXJlIGluIHRoaXMgcm9vbS4gV2hldGhlciB3ZSBjYW4gc3RpbGwgZmluZCBpdCBpcyBhIGRpZmZlcmVudCBxdWVzdGlvbi4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'SGVscCBoZXIgbG9vaw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGxlZGdlcnMgYXJlbid0IGluZGV4ZWQgdGhlIHdheSBhbnl0aGluZyBtb2Rlcm4gd291bGQgYmUsIGFuZCBmaW5kaW5nIG9uZSBzcGVjaWZpYyBwYWdlIG1lYW5zIGVpdGhlciB3b3JraW5nIHRocm91Z2ggdGhlIHBhcGVyIGFyY2hpdmUgaXRzZWxmLCBkZWNhZGUgYnkgZGVjYWRlLCBvciBnb2luZyBiYWNrIHVwIHRvIFRvcHNpZGUgdG8gbWF0Y2ggYSBzcGVjaWZpYyBjbGFpbSBtYXJrZXIgbnVtYmVyIHN0ZW5jaWxsZWQgb24gYW4gb2xkIGJvdW5kYXJ5IHN0b25lIOKAlCB0aGUga2VlcGVyIHRoaW5rcyBzaGUgcmVtZW1iZXJzIHdoaWNoIG9uZSwgdGhvdWdoICd0aGlua3MnIGlzIGRvaW5nIGEgbG90IG9mIHdvcmsgaW4gdGhhdCBzZW50ZW5jZS4KCidQYXBlcidzIHNsb3cgYnV0IHN1cmUsJyBzaGUgc2F5cy4gJ1RoZSBtYXJrZXIncyBhIGd1ZXNzLCBidXQgYSBnb29kIG9uZS4gRWl0aGVyIGdldHMgeW91IHRoZXJlLCBtYXliZS4n',
            'choices' => [
                ['text' => 'V29yayB0aHJvdWdoIHRoZSBwYXBlciBhcmNoaXZl', 'next' => '5_paper'],
                ['text' => 'R28gZmluZCB0aGUgYm91bmRhcnkgbWFya2Vy', 'next' => '5_marker'],
            ],
        ],
        '5_paper' => [
            'prose'  => 'WW91IHdvcmsgdGhyb3VnaCBsZWRnZXIgYWZ0ZXIgbGVkZ2VyIGJ5IGxhbXAgbGlnaHQsIHRvbm5hZ2UgYW5kIGRhdGVzIGFuZCBuYW1lcyBibHVycmluZyB0b2dldGhlciB1bnRpbCB0aGUgc3BlY2lmaWMgb25lIHlvdSB3YW50IGFsbW9zdCBzbGlkZXMgcGFzdCB1bm5vdGljZWQg4oCUIGEgYm95J3MgbmFtZSwgYSBmYXRoZXIncyBuYW1lLCBhIHNlYXNvbidzIHdhZ2VzLCBvcmRpbmFyeSBhbmQgdW5yZW1hcmthYmxlIGV4Y2VwdCB0aGF0IHlvdSBub3cga25vdyBleGFjdGx5IHdob3NlIGl0IHdhcy4KClRoZSBrZWVwZXIsIHdhdGNoaW5nIHlvdSBmaW5kIGl0LCBhbGxvd3MgaGVyc2VsZiBzb21ldGhpbmcgY2xvc2UgdG8gYSBzbWlsZS4gJ1RoZXJlIHNoZSBpcy4gS25ldyBzaGUnZCBiZSBpbiBoZXJlIHNvbWV3aGVyZS4n',
            'choices' => [
                ['text' => 'QnJpbmcgaXQgdG8gaGVy', 'next' => '6_shared'],
            ],
        ],
        '5_marker' => [
            'prose'  => 'VGhlIGJvdW5kYXJ5IG1hcmtlciB0dXJucyBvdXQgdG8gYmUgZXhhY3RseSB3aGVyZSB0aGUga2VlcGVyIGhhbGYtcmVtZW1iZXJlZCwgYSBzcXVhdCBzdGVuY2lsbGVkIHN0b25lIGhhbGYtYnVyaWVkIGluIHBpbm5hY2xlIGR1c3QgdGhhdCB0YWtlcyByZWFsIGRpZ2dpbmcgdG8gcHJvcGVybHkgZXhwb3NlLiBUaGUgY2xhaW0gbnVtYmVyIG1hdGNoZXMsIGV2ZW50dWFsbHksIGFmdGVyIGVub3VnaCBzY3JhcGluZyBhbmQgc3F1aW50aW5nIHRvIG1ha2UgeW91IGRvdWJ0IHRoZSB3aG9sZSBwbGFuIHR3aWNlIG92ZXIuCgpZb3UgY29tZSBiYWNrIGRvd24gZ3JleSB3aXRoIGR1c3QgYW5kIHRyaXVtcGhhbnQgcmVnYXJkbGVzcywgYSBmaXN0LXNpemVkIGNodW5rIG9mIHJhdyBwaG9zcGhhdGUgcm9jayBicm9rZW4gZnJlZSBmcm9tIGJlc2lkZSB0aGUgbWFya2VyIHJpZGluZyBpbiB5b3VyIHBvY2tldC4=',
            'choices' => [
                ['text' => 'QnJpbmcgaXQgdG8gaGVy', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgZm91bmQgeW91ciB3YXkgdGhlcmUsIHRoZSBrZWVwZXIgbWF0Y2hlcyB3aGF0IHlvdSd2ZSBicm91Z2h0IGJhY2sgYWdhaW5zdCB0aGUgbGVkZ2VyIHdpdGggcmVhbCBjYXJlLCBhbmQgY29uZmlybXMgaXQ6IHRoZSBjbGFpbSwgdGhlIHNlYXNvbiwgdGhlIG5hbWUuIFNoZSB0dWNrcyBhIGJhdHRlcmVkLCBicml0dGxlIHBhZ2Ug4oCUIGNhcmVmdWxseSBmcmVlZCBmcm9tIGl0cyBiaW5kaW5nIOKAlCBpbiBhZ2FpbnN0IHRoZSBwaG9zcGhhdGUgY2h1bmssIHdyYXBwaW5nIGJvdGggdG9nZXRoZXIgbGlrZSBzaGUncyBoYW5kaW5nIG92ZXIgc29tZXRoaW5nIG1vcmUgZnJhZ2lsZSB0aGFuIGVpdGhlciBvYmplY3QgYWxvbmUuCgonVGhpcyBpcyB3aGVyZSBzaGUgc3RhcnRlZCwnIHRoZSBrZWVwZXIgc2F5cy4gJ05vdCB3aGVyZSBzaGUgZW5kZWQgdXAsIG9idmlvdXNseS4gQnV0IHlvdSBkb24ndCBnZXQgdGhlIHNlY29uZCBwYXJ0IHdpdGhvdXQgdGhlIGZpcnN0LicgU2hlIHNheXMgaXQgcGxhaW5seSwgbGlrZSBhIGZhY3QgcmF0aGVyIHRoYW4gYSBsZXNzb24sIHRob3VnaCBpdCBsYW5kcyBsaWtlIGJvdGgu',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBoZWFkIGJhY2sgdG8gdGhlIHNoaXA=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91J3JlIG1vc3Qgb2YgdGhlIHdheSBiYWNrIGRvd24gdG8gdGhlIGFuY2hvcmFnZSwgbGVkZ2VyIHBhZ2UgYW5kIHBob3NwaGF0ZSByb2NrIHdyYXBwZWQgY2FyZWZ1bGx5IGluIHRoZSBzYXRjaGVsLCB3aGVuIHlvdSBmaW5kIFZhbyBhbHJlYWR5IHRoZXJlLCBzaXR0aW5nIG9uIHRoZSBLxY10dWt1J3MgYm9hcmRpbmcgcmFtcCBsaWtlIGhlJ3MgYmVlbiB3YWl0aW5nIGFuIGVudGlyZWx5IHJlYXNvbmFibGUgYW1vdW50IG9mIHRpbWUsIHdoaWNoIGJ5IGhpcyBzdGFuZGFyZHMgaGUgcHJvYmFibHkgaGFzIGJlZW4uCgonVGhpcmQgdGltZSwnIHRoZSBCYXJvbiBhbm5vdW5jZXMsIGRlbGlnaHRlZCwgYXBwYXJlbnRseSBrZWVwaW5nIGNvdW50IGluIGEgd2F5IG5vYm9keSBhc2tlZCBoaW0gdG8uIFZhbyBkb2Vzbid0IGV4cGxhaW4gaG93IGhlIGdvdCBoZXJlLCBzYW1lIGFzIGFsd2F5cywgdGhvdWdoIGhlIGRvZXMgbWVudGlvbiwgYWxtb3N0IGluIHBhc3NpbmcsIHRoYXQgYSB0ZWxlZ3JhbSBjYW1lIHRocm91Z2ggZm9yIHRoZSByaXZhbCBhIGZldyBpc2xhbmRzIGJhY2sg4oCUIHNvbWV0aGluZyBhYm91dCBmYW1pbHksIGhlIHRoaW5rcywgdGhvdWdoIGhlIGRpZG4ndCByZWFkIGl0IGNsb3NlbHkgZW5vdWdoIHRvIHNheSBtb3JlLCBhbmQgY2xlYXJseSBpc24ndCBnb2luZyB0byBzcGVjdWxhdGUgZnVydGhlciBldmVuIHdoZW4geW91IGFzay4=',
            'choices' => [
                ['text' => 'UHJlc3MgaGltIGZvciBtb3JlIGFib3V0IHRoZSB0ZWxlZ3JhbQ==', 'next' => '8_end_press'],
                ['text' => 'TGV0IGl0IGdvIOKAlCBub3QgeW91ciBidXNpbmVzcw==', 'next' => '8_end_let_go'],
            ],
        ],
        '8_end_press' => [
            'prose'  => 'WW91IHByZXNzLCBhIGxpdHRsZSwgYmVjYXVzZSBjdXJpb3NpdHkncyBhIGhhcmQgdGhpbmcgdG8gc3dpdGNoIG9mZiBvbmNlIGl0J3MgY2F1Z2h0IG9uIHNvbWV0aGluZy4gVmFvIGp1c3Qgc2hha2VzIGhpcyBoZWFkLCB1bmJvdGhlcmVkLCBlbnRpcmVseSB1bm1vdmVkIGJ5IHRoZSBwcmVzc2luZy4gJ05vdCBtaW5lIHRvIGNhcnJ5IGZ1cnRoZXIgdGhhbiBJIGFscmVhZHkgaGF2ZSwnIGhlIHNheXMuICdXYXNuJ3Qgc2VhbGVkIGZvciBtZSB0byByZWFkIGFuZCBpdCBpc24ndCBzZWFsZWQgZm9yIHlvdSBlaXRoZXIuJwoKSGUgc2F5cyBpdCBraW5kbHkgZW5vdWdoIHRoYXQgaXQgZG9lc24ndCBzdGluZywgZXhhY3RseSwgbW9yZSBzZXR0bGUg4oCUIGEgcmVtaW5kZXIgdGhhdCBub3QgZXZlcnkgdGhyZWFkIG9uIHRoaXMgam91cm5leSBpcyB5b3VycyB0byBwdWxsLCBob3dldmVyIGludGVyZXN0aW5nIGl0IGxvb2tzIGZyb20gdGhlIG91dHNpZGUuIFlvdSBsZXQgaXQgZHJvcCwgbW9zdGx5LCBhbmQgZmluZCB0aGF0IG1vc3RseSBpcyBlbm91Z2gu',
            'ending' => true,
        ],
        '8_end_let_go' => [
            'prose'  => 'WW91IGxldCBpdCBnbyB3aXRob3V0IHByZXNzaW5nLCBhbmQgVmFvIHNlZW1zIHRvIGFwcHJlY2lhdGUgdGhhdCBtb3JlIHRoYW4gaGUnZCBldmVyIHNheSBkaXJlY3RseSDigJQgYSBzbWFsbCwgYXBwcm92aW5nIG5vZCwgdGhlcmUgYW5kIGdvbmUsIGJlZm9yZSBoZSdzIGJhY2sgdG8gaGVscGluZyB0aGUgQmFyb24gYXJndWUgYWJvdXQgc29tZXRoaW5nIGVudGlyZWx5IHVucmVsYXRlZC4KClRoZSBLxY10dWt1IGxpZnRzIG9mZiBvdmVyIFRvcHNpZGUncyBncmV5IHJhbmtzIG9mIHBpbm5hY2xlIHN0b25lLCB0aGUgY29hc3RhbCBncmVlbiByaW5nIHZpc2libGUgYWxsIGFyb3VuZCBpdCBsaWtlIGEgbmFycm93IGJvcmRlciBob2xkaW5nIHRoZSB3aG9sZSB3b3VuZCBpbiBwbGFjZSwgYW5kIHlvdSBmaW5kIHlvdXJzZWxmIHRoaW5raW5nLCBub3QgZm9yIHRoZSBmaXJzdCB0aW1lIHRoaXMgdHJpcCwgdGhhdCBzb21lIG9mIHdoYXQgeW91J3JlIGNhcnJ5aW5nIGhvbWUgaXNuJ3Qgc2VhIGdsYXNzIGF0IGFsbCwgYW5kIG5ldmVyIHdhcy4=',
            'ending' => true,
        ],
    ],
];
