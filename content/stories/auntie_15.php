<?php
return [
    'id'    => 15,
    'title' => 'The Recognition Piece',
    'color' => '#5A4A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UmFwYSBOdWkgc2l0cyBmdXJ0aGVyIGZyb20gYW55d2hlcmUgdGhhbiBhbG1vc3QgYW55IG90aGVyIGluaGFiaXRlZCBwbGFjZSBvbiBFYXJ0aCwgYSBsb25lbHkgZ3JlZW4gdHJpYW5nbGUgb2Ygdm9sY2FuaWMgcm9jayB3aXRoIHN0b25lIGdpYW50cyBzdGFuZGluZyBhbG9uZyBpdHMgY29hc3QsIGJhY2tzIHRvIHRoZSBzZWEsIGZhY2VzIHR1cm5lZCBpbmxhbmQgdG93YXJkIHRoZSBwZW9wbGUgd2hvIHJhaXNlZCB0aGVtLiBTb2xhbmdlLCB1bmNoYXJhY3RlcmlzdGljYWxseSBxdWlldCBvbiB0aGUgYXBwcm9hY2gsIGFkbWl0cyB0aGlzIGlzIG9uZSBvZiB0aGUgZmV3IHBsYWNlcyBldmVuIHNoZSBmaW5kcyBwcm9wZXJseSBodW1ibGluZy4KClR3byB3YXlzIHRvd2FyZCB0aGUgc2V0dGxlbWVudCBwcmVzZW50IHRoZW1zZWx2ZXM6IGFsb25nIHRoZSBjb2FzdCwgcGFzdCB0aGUgc3RhbmRpbmcgYWh1IHBsYXRmb3JtcyBhbmQgdGhlaXIgd2F0Y2hpbmcgbW9haSwgb3IgaW5sYW5kIHRvIFJhbm8gUmFyYWt1LCB0aGUgb2xkIHF1YXJyeSBjcmF0ZXIgd2hlcmUgZG96ZW5zIG9mIHVuZmluaXNoZWQgZmlndXJlcyBzdGlsbCBzaXQgZXhhY3RseSB3aGVyZSB0aGUgd29yayBzdG9wcGVkLCBjZW50dXJpZXMgYWdvLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBjb2FzdCBwYXN0IHRoZSBzdGFuZGluZyBtb2Fp', 'next' => '2_ahu'],
                ['text' => 'SGVhZCBpbmxhbmQgdG8gdGhlIHF1YXJyeQ==', 'next' => '2_quarry'],
            ],
        ],
        '2_ahu' => [
            'prose'  => 'VGhlIGNvYXN0YWwgcm91dGUgdGFrZXMgeW91IHBhc3QgYWh1IGFmdGVyIGFodSwgcmVzdG9yZWQgcGxhdGZvcm1zIGhvbGRpbmcgdGhlaXIgc3RvbmUgZmlndXJlcyB1cHJpZ2h0IGFnYWluIGFmdGVyIGdlbmVyYXRpb25zIG9mIHNvbWUgaGF2aW5nIGZhbGxlbiwgdGhlIG1vYWkncyBiYWNrcyB0byB0aGUgcG91bmRpbmcgc3VyZiBhbmQgdGhlaXIgbG9uZywgc3RpbGwgZmFjZXMgdHVybmVkIHRvd2FyZCB0aGUgaXNsYW5kJ3MgaW50ZXJpb3IgYXMgdGhvdWdoIHdhdGNoaW5nIG92ZXIgc29tZXRoaW5nIG9ubHkgdGhleSBjYW4gc2VlLgoKQW4gb2xkIG1hbiB0ZW5kaW5nIGEgc21hbGwgc2hyaW5lIG5lYXIgb25lIHBsYXRmb3JtIHN0cmFpZ2h0ZW5zIGFzIHlvdSBwYXNzLCByZWNvZ25pc2luZyBBdW50aWUncyBuYW1lIHdpdGggYSBzbG93IG5vZCByYXRoZXIgdGhhbiBzdXJwcmlzZS4gJ1RoZSBjYXJ2ZXIncyB1cCBwYXN0IHRoZSBxdWFycnksJyBoZSBzYXlzLiAnWW91J2xsIHdhbnQgaGltLiBGb2xsb3cgdGhlIG9sZCBxdWFycnkgcm9hZC4n',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHF1YXJyeSByb2Fk', 'next' => '3_shared'],
            ],
        ],
        '2_quarry' => [
            'prose'  => 'UmFubyBSYXJha3UgaXMgc3RyYW5nZXIgdXAgY2xvc2UgdGhhbiBhbnkgcGhvdG9ncmFwaCBwcmVwYXJlcyB5b3UgZm9yIOKAlCBtb2FpIGluIGV2ZXJ5IHN0YWdlIG9mIHVuZmluaXNoZWQgZXhpc3RlbmNlLCBzb21lIGJhcmVseSBlbWVyZ2VkIGZyb20gdGhlIHJvY2ssIHNvbWUgc3RhbmRpbmcgYnVyaWVkIHRvIHRoZSBzaG91bGRlcnMgaW4gY2VudHVyaWVzIG9mIHNldHRsZWQgc29pbCwgdGhlIHdob2xlIGNyYXRlciBhIGZyb3plbiBtb21lbnQgaW4gdGhlIG1pZGRsZSBvZiBhbiBlbm9ybW91cywgYWJhbmRvbmVkIGVmZm9ydC4KCkEgd29tYW4gc2tldGNoaW5nIG9uZSBvZiB0aGUgYnVyaWVkIGZpZ3VyZXMgbG9va3MgdXAgYXMgeW91IHBhc3MsIHVuc3VycHJpc2VkLCBhbmQgcG9pbnRzIGZ1cnRoZXIgcm91bmQgdGhlIGNyYXRlcidzIHJpbS4gJ0NhcnZlcidzIHdvcmtzaG9wIGlzIHBhc3QgaGVyZS4gSGUnbGwga25vdyB3aHkgeW91J3ZlIGNvbWUgYmVmb3JlIHlvdSBzYXkgaXQsIHByb2JhYmx5Lic=',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHdvcmtzaG9w', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGNhcnZlcidzIHdvcmtzaG9wIHNpdHMgYXQgdGhlIHF1YXJyeSdzIGVkZ2UsIGhhbGYgY2F2ZSBhbmQgaGFsZiBvcGVuIGFpciwgdG9vbHMgYW5kIGhhbGYtZmluaXNoZWQgc3RvbmUgc2NhdHRlcmVkIHdpdGggdGhlIHBhcnRpY3VsYXIgb3JnYW5pc2VkIGNoYW9zIG9mIHNvbWVvbmUgd2hvIGtub3dzIGV4YWN0bHkgd2hlcmUgZXZlcnl0aGluZyBpcyBkZXNwaXRlIGFsbCBhcHBlYXJhbmNlcyB0byB0aGUgY29udHJhcnkuIEhlIGtub3dzIEF1bnRpZSdzIG5hbWUgaW1tZWRpYXRlbHksIHNldHRpbmcgZG93biBoaXMgY2hpc2VsIHdpdGggcmVhbCBjYXJlLgoKJ1NoZSBzYXQgcmlnaHQgaGVyZSwnIGhlIHNheXMsICdhbmQgYXNrZWQgdG8gbGVhcm4gaW5zdGVhZCBvZiBqdXN0IHRvIGxvb2ssIHdoaWNoIGlzIHJhcmVyIHRoYW4geW91J2QgdGhpbmsuJyBIZSBzdHVkaWVzIHlvdSBmb3IgYSBsb25nIG1vbWVudC4gJ1NhbWUgcXVlc3Rpb24gZm9yIHlvdSwgdGhlbi4gTGVhcm4sIG9yIGp1c3QgbG9vaz8n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHRvIGxlYXJu', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SGUgb2ZmZXJzIHR3byB0aGluZ3Mgd29ydGggbGVhcm5pbmcsIGJvdGggcHJhY3RpY2FsLCBib3RoIG9sZDogd29ya2luZyBvYnNpZGlhbiBpbnRvIGEgcHJvcGVyIG1hdGEnYSBibGFkZSBlZGdlLCBzaGFycCBlbm91Z2ggdG8gbWF0dGVyLCBvciBjYXJ2aW5nIGEgbWluaWF0dXJlIG1vYWkgdG9rZW4gZnJvbSBhIHNvZnQgc2NyYXAgb2Ygdm9sY2FuaWMgc3RvbmUsIHNtYWxsIGVub3VnaCB0byBmaXQgYSBjbG9zZWQgaGFuZC4gJ0JvdGggdGFrZSBwYXRpZW5jZS4gT25seSBvbmUgdGFrZXMgYmxvb2QgaWYgeW91IGdldCBpdCB3cm9uZywnIGhlIGFkZHMsIGVudGlyZWx5IGRlYWRwYW4sIGFuZCBkb2Vzbid0IGNsYXJpZnkgZnVydGhlciB3aGljaC4KClRoZSBCYXJvbiwgdW5oZWxwZnVsbHksIGZpbmRzIHRoaXMgZW5vcm1vdXNseSBmdW5ueS4=',
            'choices' => [
                ['text' => 'TGVhcm4gdG8ga25hcCBvYnNpZGlhbg==', 'next' => '5_obsidian'],
                ['text' => 'TGVhcm4gdG8gY2FydmUgdGhlIHRva2Vu', 'next' => '5_carve'],
            ],
        ],
        '5_obsidian' => [
            'prose'  => 'V29ya2luZyBvYnNpZGlhbiBpcyBmYXN0ZXIgYW5kIGZhciBsZXNzIGZvcmdpdmluZyB0aGFuIHlvdSBleHBlY3QsIGVhY2ggc3RyaWtlIGVpdGhlciBwcm9kdWNpbmcgYSBjbGVhbiwgd2lja2VkbHkgc2hhcnAgZmxha2Ugb3Igc2hhdHRlcmluZyB0aGUgd2hvbGUgcGllY2UgYmFjayB0byBydWJibGUgd2l0aCBub3RoaW5nIGluIGJldHdlZW4uIFRoZSBjYXJ2ZXIgY29ycmVjdHMgeW91ciBhbmdsZSBvbmNlLCBzaGFycGx5LCBtb21lbnRzIGJlZm9yZSB5b3UnZCBoYXZlIHByb3ZlbiBoaXMgZWFybGllciB3YXJuaW5nIHRydWUgdGhlIGhhcmQgd2F5LgoKQnkgdGhlIHRpbWUgeW91J3ZlIGdvdCBhIGZsYWtlIGhlJ3Mgc2F0aXNmaWVkIHdpdGgsIHlvdXIga251Y2tsZXMgYXJlIG5pY2tlZCB0d2ljZSBhbmQgeW91ciByZXNwZWN0IGZvciB0aGUgd2hvbGUgY3JhZnQgaGFzIGdvbmUgdXAgY29uc2lkZXJhYmx5Lg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgZ2l2ZXMgeW91', 'next' => '6_shared'],
            ],
        ],
        '5_carve' => [
            'prose'  => 'Q2FydmluZyB0aGUgbGl0dGxlIG1vYWkgdG9rZW4gaXMgc2xvd2VyLCBxdWlldGVyIHdvcmssIHZvbGNhbmljIHN0b25lIGdpdmluZyB3YXkgcmVsdWN0YW50bHkgYW5kIG9ubHkgdG8gcmVhbCBwYXRpZW5jZSwgdGhlIHByb3BvcnRpb25zIG9mIGV2ZW4gYSBwYWxtLXNpemVkIGZpZ3VyZSBtYXR0ZXJpbmcgYXMgbXVjaCBhcyB0aGUgcHJvcG9ydGlvbnMgb2YgdGhlIHJlYWwgc3RhbmRpbmcgZ2lhbnRzIG91dHNpZGUuIFRoZSBjYXJ2ZXIgY29ycmVjdHMgeW91ciBleWVsaW5lIHR3aWNlLCBnZW50bHksIGJ5IHNpbXBseSB0dXJuaW5nIHRoZSBwaWVjZSBpbiB5b3VyIGhhbmRzIHRvIGEgYmV0dGVyIGFuZ2xlLgoKQnkgdGhlIHRpbWUgaXQncyBmaW5pc2hlZCwgc21hbGwgYW5kIHJvdWdoIGFuZCB1bm1pc3Rha2FibHkgYSBtb2FpIGRlc3BpdGUgaXRzIHNpemUsIHNvbWV0aGluZyBpbiB5b3VyIG93biBoYW5kcyBmZWVscyBsaWtlIGl0J3MgbGVhcm5lZCBhIGdlbnVpbmVseSBuZXcgdGhpbmcu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgaGUgZ2l2ZXMgeW91', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHlvdSBtYWRlLCB0aGUgY2FydmVyIHN0dWRpZXMgaXQgd2l0aCByZWFsIHByb2Zlc3Npb25hbCBhdHRlbnRpb24gYmVmb3JlIHNldHRpbmcgaXQgYmVzaWRlIGl0cyBvd24gd29ya2VkIG9iamVjdCDigJQgb2JzaWRpYW4gZmxha2Ugb3IgY2FydmVkIHRva2VuLCBlaXRoZXIgb25lIHNtYWxsIGVub3VnaCB0byBjbG9zZSBhIGZpc3QgYXJvdW5kIOKAlCBhbmQgcHVzaGVzIGl0IGFjcm9zcyB0byB5b3UuICdSZWNvZ25pdGlvbiBwaWVjZSwnIGhlIHNheXMuICdTaG93IGl0LCBmdXJ0aGVyIG9uLCB0byBzb21lb25lIHdobyBrbm93cyB3aGF0IGl0IG1lYW5zLCBhbmQgdGhleSdsbCBrbm93IHlvdSBjYW1lIHRocm91Z2ggaGVyZSBwcm9wZXJseSwgbm90IGp1c3QgcGFzc2luZyB0aHJvdWdoIHdpdGggYSBjYW1lcmEuJwoKSGUgZG9lc24ndCBleHBsYWluIHdobywgZXhhY3RseSwgZnVydGhlciBvbiBtZWFucy4gWW91IGdldCB0aGUgZGlzdGluY3QgaW1wcmVzc2lvbiBoZSBuZXZlciBleHBsYWlucyB0aGF0IHBhcnQgdG8gYW55b25lLg==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayBhbG9uZyB3aGljaGV2ZXIgcm91dGUgeW91IGRpZG4ndCB0YWtlIG9uIHRoZSB3YXkgaW4sIHRoZSBtb2FpIHN0YW5kaW5nIHRoZWlyIGxvbmcgcGF0aWVudCB3YXRjaCBhbG9uZyB0aGUgY29hc3Qgb3Igc2l0dGluZyBoYWxmLWJ1cmllZCBpbiB0aGUgcXVhcnJ5J3Mgc2V0dGxlZCBzb2lsLCBlbnRpcmVseSB1bm1vdmVkIGJ5IHlvdXIgYXJyaXZhbCBvciB5b3VyIGxlYXZpbmcsIHRoZSB3YXkgdGhleSd2ZSBiZWVuIHVubW92ZWQgYnkgZXZlcnkgYXJyaXZhbCBhbmQgbGVhdmluZyBmb3IgY2VudHVyaWVzIGJlZm9yZSB5b3UuCgpTb2xhbmdlIHN0dWRpZXMgdGhlIHJlY29nbml0aW9uIHBpZWNlIHdpdGggcmVhbCBpbnRlcmVzdCBiZWZvcmUgeW91IHN0b3cgaXQuICdTb21lb25lLCBzb21ld2hlcmUsIGZ1cnRoZXIgYWxvbmcsIGlzIGdvaW5nIHRvIGJlIGdsYWQgeW91IGhhdmUgdGhhdCwnIHNoZSBzYXlzLiAnTm8gaWRlYSB3aG8uIEJ1dCBzb21lb25lLic=',
            'choices' => [
                ['text' => 'QXNrIHRoZSBjYXJ2ZXIncyBuYW1lIGJlZm9yZSB5b3UgbGVhdmUgdGhlIGlzbGFuZA==', 'next' => '8_end_ask'],
                ['text' => 'TGV0IHRoZSBpc2xhbmQga2VlcCB0aGF0IG9uZSBkZXRhaWw=', 'next' => '8_end_keep'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGdvIGJhY2ssIG9uY2UsIGJlZm9yZSB0aGUgS8WNdHVrdSBsaWZ0cywganVzdCB0byBhc2suIEhlIGxvb2tzIGZhaW50bHkgYW11c2VkLCB0aGUgd2F5IFBldGVsbyBkaWQgYmFjayBhdCBXYWxsaXMsIGF0IHNvbWVvbmUgYm90aGVyaW5nIHRvIGNpcmNsZSBiYWNrIGZvciBhIG5hbWUuCgonTWFyYW1hLCcgaGUgc2F5cywgYW5kIHJldHVybnMgdG8gaGlzIGNoaXNlbCB3aXRob3V0IGFub3RoZXIgd29yZCwgdGhlIGNvbnZlcnNhdGlvbiBhbHJlYWR5IG92ZXIgb24gaGlzIGVuZC4gSXQncyBub3QgbXVjaC4gQnV0IHlvdSBjYXJyeSBpdCBhbnl3YXksIGFsb25nc2lkZSB0aGUgbGl0dGxlIHdvcmtlZCBzdG9uZSwgYm90aCBvZiB0aGVtIHByb29mIHRoYXQgdGhpcyB3aG9sZSByZW1vdGUgYW5kIGltcHJvYmFibGUgaXNsYW5kIGhhcyByZWFsIHBlb3BsZSBpbiBpdCwgbm90IGp1c3QgZ2lhbnRzLg==',
            'ending' => true,
        ],
        '8_end_keep' => [
            'prose'  => 'WW91IGRvbid0IGdvIGJhY2sgdG8gYXNrLiBTb21lIGlzbGFuZHMsIHlvdSdyZSBzdGFydGluZyB0byBmZWVsLCBhcmUgYWxsb3dlZCB0byBrZWVwIGEgZmV3IG9mIHRoZWlyIGRldGFpbHMgZW50aXJlbHkgdG8gdGhlbXNlbHZlcywgYW5kIGEgY2FydmVyJ3MgbmFtZSwgZnJlZWx5IG9mZmVyZWQgb3Igbm90LCBmZWVscyBsaWtlIGV4YWN0bHkgdGhlIGtpbmQgb2YgdGhpbmcgdGhhdCBkb2Vzbid0IG5lZWQgY2hhc2luZy4KClRoZSBLxY10dWt1IGxpZnRzIG9mZiBSYXBhIE51aSBpbiB0aGUgZGF5J3MgbGFzdCBsaWdodCwgdGhlIG1vYWkgYmVsb3cgaG9sZGluZyB0aGVpciBsb25nIHdhdGNoIGFzIHRoZSB3aG9sZSBncmVlbiB0cmlhbmdsZSBvZiB0aGUgaXNsYW5kIHNocmlua3MgZmFzdCBhZ2FpbnN0IGFsbCB0aGF0IGVtcHR5IG9jZWFuLCBhbmQgeW91IGZpbmQgdGhlIHJlY29nbml0aW9uIHBpZWNlIHJpZGVzIGVhc2llciBpbiB0aGUgc2F0Y2hlbCBmb3IgaGF2aW5nIGJlZW4gZWFybmVkIHJhdGhlciB0aGFuIG1lcmVseSBjb2xsZWN0ZWQu',
            'ending' => true,
        ],
    ],
];
