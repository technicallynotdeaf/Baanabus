<?php
return [
    'id'    => 19,
    'title' => 'Properly Earned',
    'color' => '#6A9AA8',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEFsdGlwbGFubyBzdHJldGNoZXMgdmFzdCBhbmQgaW1wb3NzaWJseSBoaWdoLCB0aGluIGNvbGQgYWlyIGFuZCBlbm9ybW91cyBvcGVuIHNreSBtZWV0aW5nIGEgbGFuZHNjYXBlIG9mIHNjYXR0ZXJlZCBsbGFtYSBoZXJkcyBhbmQgdGVycmFjZWQgZmllbGRzIHRoYXQgc29tZWhvdyB0aHJpdmUgYXQgYW4gYWx0aXR1ZGUgdGhhdCBsZWF2ZXMgeW91IGJyZWF0aGxlc3MganVzdCBzdGFuZGluZyBzdGlsbC4gR3JldGEgbW9vcnMgdGhlIENvbnRvdXIgbmVhciBhIHNtYWxsIHNldHRsZW1lbnQsIExha2UgVGl0aWNhY2EncyBkaXN0YW50IHNpbHZlciBnbGVhbSB2aXNpYmxlIG9uIHRoZSBob3Jpem9uLgoKVHdvIHJvdXRlcyB0b3dhcmQgdGhlIHN1cnZleSBjb29wZXJhdGl2ZSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRoZSBkaXJlY3QgcGxhdGVhdSBjcm9zc2luZywgZmFzdGVyIGJ1dCBnZW51aW5lbHkgZGVtYW5kaW5nIGF0IHRoaXMgYWx0aXR1ZGUsIG9yIGEgbG9uZ2VyIHJvdXRlIGZvbGxvd2luZyBhbiBvbGQgdHJhZGUgcGF0aCB0aGF0IHdpbmRzIGdlbnRseSB0aHJvdWdoIHNldmVyYWwgc21hbGwgY29tbXVuaXRpZXMgZmlyc3Qu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZGlyZWN0IHBsYXRlYXUgY3Jvc3Npbmc=', 'next' => '2_direct'],
                ['text' => 'Rm9sbG93IHRoZSBvbGQgdHJhZGUgcGF0aA==', 'next' => '2_trade'],
            ],
        ],
        '2_direct' => [
            'prose'  => 'VGhlIGRpcmVjdCBjcm9zc2luZyB0ZXN0cyB5b3VyIGx1bmdzIHByb3Blcmx5LCB0aGluIGFpciBtYWtpbmcgZXZlcnkgc3RlcCBhIHNtYWxsIG5lZ290aWF0aW9uIHdpdGggeW91ciBvd24gYm9keSdzIGxpbWl0cy4gR3JldGEgcGFjZXMgeW91IGNhcmVmdWxseSwgaGF2aW5nIGNsZWFybHkgZG9uZSB0aGlzIGFsdGl0dWRlIGJlZm9yZSwgYW5kIHlvdSBhcnJpdmUgYXQgdGhlIGNvb3BlcmF0aXZlJ3Mgb2ZmaWNlIHdpbmRlZCBidXQgY29uc2lkZXJhYmx5IGZhc3RlciB0aGFuIHRoZSBhbHRlcm5hdGl2ZSB3b3VsZCBoYXZlIG1hbmFnZWQuCgonU3VtYXEsJyBhIHdvbWFuIHdvcmtpbmcgb3V0c2lkZSBzYXlzIGJ5IHdheSBvZiBncmVldGluZyDigJQgZ29vZCwgd2VsbCBkb25lIOKAlCBub3RpbmcgeW91ciBvYnZpb3VzIGVmZm9ydCB3aXRoIHJlYWwsIHVuc2VudGltZW50YWwgcmVzcGVjdC4=',
            'choices' => [
                ['text' => 'RXhwbGFpbiB5b3VyIGVycmFuZA==', 'next' => '3_shared'],
            ],
        ],
        '2_trade' => [
            'prose'  => 'VGhlIHRyYWRlIHBhdGggd2luZHMgZ2VudGx5IGJldHdlZW4gc21hbGwgY29tbXVuaXRpZXMsIGdpdmluZyB5b3VyIGJvZHkgcmVhbCB0aW1lIHRvIGFkanVzdCB0byB0aGUgYWx0aXR1ZGUgcHJvcGVybHksIHdvbWVuIGluIHRyYWRpdGlvbmFsIHdvdmVuIHNraXJ0cyBhbmQgaGF0cyB0ZW5kaW5nIGxsYW1hIGhlcmRzIGFsb25nIHRoZSB3YXkgd2l0aCBlYXN5LCBwcmFjdGlzZWQgY29uZmlkZW5jZS4gU2V2ZXJhbCBwZW9wbGUgb2ZmZXIgY29jYSBsZWF2ZXMgdG8gaGVscCB3aXRoIHRoZSB0aGluIGFpciwgYSBnZW51aW5lLCBsb25nc3RhbmRpbmcgbG9jYWwgcmVtZWR5IHJhdGhlciB0aGFuIGEgdG91cmlzdCBnZXN0dXJlLgoKWW91IGFycml2ZSBhdCB0aGUgY29vcGVyYXRpdmUncyBvZmZpY2UgY29uc2lkZXJhYmx5IG1vcmUgY29tZm9ydGFibGUgdGhhbiB0aGUgZGlyZWN0IHJvdXRlIHdvdWxkIGhhdmUgbGVmdCB5b3Uu',
            'choices' => [
                ['text' => 'RXhwbGFpbiB5b3VyIGVycmFuZA==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHN1cnZleSBjb29wZXJhdGl2ZSdzIGRpcmVjdG9yLCBZb2xhbmRhLCBsaXN0ZW5zIHRvIHlvdXIgZXhwbGFuYXRpb24gd2l0aCByZWFsIHByb2Zlc3Npb25hbCBpbnRlcmVzdCDigJQgdGhlIG9yZ2FuaXNhdGlvbiwgaXQgdHVybnMgb3V0LCBoYXMgYmVlbiBkb2luZyBnZW51aW5lLCBjYXJlZnVsIHN1cnZleSB3b3JrIGFjcm9zcyB0aGlzIHdob2xlIHBsYXRlYXUgZm9yIGRlY2FkZXMsIHRyYWluaW5nIGFuZCBlcXVpcHBpbmcgbG9jYWwgc3VydmV5b3JzIHByb3Blcmx5IHJhdGhlciB0aGFuIHJlbHlpbmcgb24gb3V0c2lkZSBleHBlcnRpc2UuCgonV2UgaGF2ZSB0aGUgZGVjbGluYXRpb24gbmVlZGxlLCcgc2hlIGNvbmZpcm1zLiAnVHJhZGVkIHRvIHVzIGZhaXJseSwgeWVhcnMgYmFjaywgZm9yIHJlYWwgc3VydmV5IHdvcmsgeW91ciBncmFuZGZhdGhlciBoZWxwZWQgdGVhY2ggb3VyIGZvdW5kZXJzLiBXZSBkb24ndCBzaW1wbHkgZ2l2ZSBhd2F5IHNvbWV0aGluZyB0aGF0IHdhcyBwcm9wZXJseSBlYXJuZWQsIHRob3VnaC4gWW91J2xsIG5lZWQgdG8gdHJhZGUgZm9yIGl0IGZhaXJseSB0b28sIHNhbWUgYXMgaGUgZGlkLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQncyBmYWly', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGNvb3BlcmF0aXZlIG5lZWRzIHR3byB0aGluZ3MsIFlvbGFuZGEgZXhwbGFpbnM6IHByb3BlciBkb2N1bWVudGF0aW9uIG9mIGEgc3BlY2lmaWMgb2xkIHN1cnZleSBtYXJrZXIgd2hvc2UgcmVjb3JkcyB3ZXJlIGxvc3QgaW4gYSBmaXJlIHllYXJzIGJhY2ssIHJlcXVpcmluZyBjYXJlZnVsIGZpZWxkd29yayB0byByZWxvY2F0ZSBhbmQgcmUtcmVjb3JkIGl0LCBvciBnZW51aW5lIHRlYWNoaW5nIOKAlCBhbiBhZnRlcm5vb24gc3BlbnQgcGFzc2luZyBvbiB3aGF0ZXZlciBzcGVjaWZpYyB0ZWNobmlxdWUgb3Iga25vd2xlZGdlIHlvdSd2ZSBwaWNrZWQgdXAgb24gdGhpcyB3aG9sZSBsb25nIGpvdXJuZXkgdG8gdGhlIGNvb3BlcmF0aXZlJ3MgbmV3ZXN0IHRyYWluZWVzLgoKJ0VpdGhlcidzIHJlYWwgdmFsdWUsJyBzaGUgc2F5cy4gJ0tub3dsZWRnZSBnaXZlbiBwcm9wZXJseSBpcyBuZXZlciB3YXN0ZWQsIHdoaWNoZXZlciBkaXJlY3Rpb24gaXQgZmxvd3MuJw==',
            'choices' => [
                ['text' => 'SGVscCByZWxvY2F0ZSB0aGUgbG9zdCBzdXJ2ZXkgbWFya2Vy', 'next' => '5_marker'],
                ['text' => 'VGVhY2ggdGhlIHRyYWluZWVzIHNvbWV0aGluZyB5b3UndmUgbGVhcm5lZA==', 'next' => '5_teach'],
            ],
        ],
        '5_marker' => [
            'prose'  => 'UmVsb2NhdGluZyBhIGxvc3Qgc3VydmV5IG1hcmtlciBtZWFucyByZWFsIGZpZWxkd29yayDigJQgY3Jvc3MtcmVmZXJlbmNpbmcgb2xkLCBpbmNvbXBsZXRlIGRlc2NyaXB0aW9ucyBhZ2FpbnN0IHRoZSBhY3R1YWwgdGVycmFpbiwgdGVzdGluZyBwYXRpZW5jZSBhZ2FpbnN0IHRoaW4gYWlyIGFuZCBpbXByZWNpc2UgZGVjYWRlcy1vbGQgbm90ZXMuIEl0IHRha2VzIG1vc3Qgb2YgYSBkYXksIGJ1dCB5b3UgZmluZCBpdCBldmVudHVhbGx5LCBleGFjdGx5IHdoZXJlIGNhcmVmdWwgdHJpYW5ndWxhdGlvbiBmaW5hbGx5IHBsYWNlcyBpdC4KCllvbGFuZGEncyB0ZWFtIHByb3Blcmx5IHJlLXJlY29yZHMgaXQsIGdlbnVpbmVseSBwbGVhc2VkIHRvIGhhdmUgdGhlIGdhcCBpbiB0aGVpciByZWNvcmRzIGNsb3NlZCBhdCBsYXN0Lg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgWW9sYW5kYSBkZWNpZGVz', 'next' => '6_shared'],
            ],
        ],
        '5_teach' => [
            'prose'  => 'VGVhY2hpbmcgdGhlIHRyYWluZWVzIG1lYW5zIGFjdHVhbGx5IG9yZ2FuaXNpbmcgZXZlcnl0aGluZyB5b3UndmUgcGlja2VkIHVwIHRoaXMgd2hvbGUgdHJpcCBpbnRvIHNvbWV0aGluZyBjb2hlcmVudCBlbm91Z2ggdG8gcGFzcyBvbiDigJQgUm95YSdzIHdlYXRoZXItcmVhZGluZywgS2FyaW0ncyBpbnNpc3RlbmNlIG9uIGhvbmVzdHksIHRoZSBkb3plbiBzbWFsbCB0ZWNobmljYWwgbGVzc29ucyBzY2F0dGVyZWQgYWNyb3NzIGEgZG96ZW4gbW91bnRhaW4gcmFuZ2VzLiBJdCdzIGhhcmRlciB0aGFuIHlvdSBleHBlY3RlZCwgYW5kIG1vcmUgc2F0aXNmeWluZyB0b28uCgpUaGUgdHJhaW5lZXMsIHNoYXJwIGFuZCBnZW51aW5lbHkgZW5nYWdlZCwgYXNrIGJldHRlciBxdWVzdGlvbnMgdGhhbiB5b3UncmUgZnVsbHkgcHJlcGFyZWQgdG8gYW5zd2VyLCB3aGljaCBZb2xhbmRhIHdhdGNoZXMgd2l0aCBvcGVuLCBkZWxpZ2h0ZWQgcHJpZGUu',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgWW9sYW5kYSBkZWNpZGVz', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW9sYW5kYSwgc2F0aXNmaWVkIGVpdGhlciB3YXksIGJyaW5ncyBvdXQgdGhlIGRlY2xpbmF0aW9uIG5lZWRsZSBoZXJzZWxmIOKAlCBjYXJlZnVsbHkgbWFpbnRhaW5lZCwgZ2VudWluZWx5IHdlbGwtdXNlZCwgdGhlIGNvb3BlcmF0aXZlJ3Mgb3duIGRlY2FkZXMgb2YgY2FyZWZ1bCBzdGV3YXJkc2hpcCBldmlkZW50IGluIGl0cyBjb25kaXRpb24uICdZb3VyIGdyYW5kZmF0aGVyIHRhdWdodCBmYWlybHksJyBzaGUgc2F5cy4gJ1lvdSd2ZSB0cmFkZWQgZmFpcmx5IHRvby4gVGhhdCBtYXR0ZXJzIG1vcmUgaGVyZSB0aGFuIGFsbW9zdCBhbnl0aGluZyBlbHNlIGNvdWxkLicKClNoZSBzdHVkaWVzIHlvdSBhIG1vbWVudCBsb25nZXIuICdXaGF0ZXZlciB5b3UncmUgYnVpbGRpbmcgdG93YXJkIHdpdGggdGhpcyDigJQgZmluaXNoIGl0IHRoZSB3YXkgaGUgdGF1Z2h0IHVzIHRvIHN1cnZleS4gUHJvcGVybHkuIE5vIHNob3J0Y3V0cyB0aGF0IGNvc3Qgc29tZW9uZSBlbHNlIHNvbWV0aGluZyByZWFsLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgQ29udG91ciB3aXRoIHRoZSBkZWNsaW5hdGlvbiBuZWVkbGUgc2VjdXJlIGluIHRoZSBjYXNlLCBhIHNpeHRlZW50aCBwaWVjZSwgdGhlIEFsdGlwbGFubydzIHZhc3QgdGhpbi1haXJlZCBvcGVubmVzcyBzdHJldGNoaW5nIGluIGV2ZXJ5IGRpcmVjdGlvbiBhcyB5b3UgbGlmdCBvZmYsIExha2UgVGl0aWNhY2EncyBzaWx2ZXIgZ2xlYW0gY2F0Y2hpbmcgdGhlIGRheSdzIGZhZGluZyBsaWdodCBvbiB0aGUgaG9yaXpvbi4KCkdyZXRhLCBjaGVja2luZyB0aGUgbmVlZGxlJ3MgZml0LCBsb29rcyB0aG91Z2h0ZnVsbHkgYXQgdGhlIHdob2xlIG5lYXJseS1jb21wbGV0ZSBhc3NlbWJseS4gJ0dldHRpbmcgcHJvcGVybHkgY2xvc2Ugbm93LiBZb3UgY2FuIHNlZSB0aGUgc2hhcGUgb2YgdGhlIHdob2xlIHRoaW5nLCBmaW5hbGx5LCBub3QganVzdCB0aGUgZ2Fwcy4n',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBhbG1vc3QgYWZyYWlkIG9mIGZpbmlzaGluZyBpdA==', 'next' => '8_end_afraid'],
                ['text' => 'U2F5IHlvdSBjYW4ndCB3YWl0IHRvIGZpbmlzaCBpdA==', 'next' => '8_end_cant_wait'],
            ],
        ],
        '8_end_afraid' => [
            'prose'  => 'J0knbSBhbG1vc3QgYWZyYWlkIG9mIGZpbmlzaGluZyBpdCwgaG9uZXN0bHksJyB5b3UgYWRtaXQsIHN1cnByaXNpbmcgeW91cnNlbGYgd2l0aCBob3cgdHJ1ZSBpdCBmZWVscyBvbmNlIHNhaWQgYWxvdWQuICdUaGlzIHdob2xlIHRyaXAncyBiZWVuIHRoZSBjbG9zZXN0IEkndmUgZmVsdCB0byBoaW0gc2luY2UgaGUgZGllZC4gRmluaXNoaW5nIG1lYW5zIGl0J3MgYWN0dWFsbHkgb3Zlci4nCgpHcmV0YSBkb2Vzbid0IHJ1c2ggdG8gcmVhc3N1cmUgeW91LiBTaGUganVzdCBub2RzLCBzbG93bHksIGxldHRpbmcgdGhlIGZlYXIgc2l0IGluIHRoZSBvcGVuIGFpciBiZXR3ZWVuIHlvdSByYXRoZXIgdGhhbiBwYXBlcmluZyBvdmVyIGl0LiAnVGhhdCdzIGhvbmVzdC4gU2l0IHdpdGggaXQgYSB3aGlsZS4gTm8gbmVlZCB0byByZXNvbHZlIGl0IGJlZm9yZSB3ZSd2ZSBldmVuIGxhbmRlZCBwcm9wZXJseS4n',
            'ending' => true,
        ],
        '8_end_cant_wait' => [
            'prose'  => 'J0kgY2FuJ3Qgd2FpdCB0byBmaW5pc2ggaXQsJyB5b3Ugc2F5LCBhbmQgbWVhbiBpdCB0b28sIGluIGEgZGlmZmVyZW50IHdheSB0aGFuIHRoZSBmZWFyIG1pZ2h0IGhhdmUgYW5zd2VyZWQg4oCUIGEgZ2VudWluZSwgZm9yd2FyZC1sb29raW5nIGVhZ2VybmVzcyB0byBhY3R1YWxseSBjb21wbGV0ZSBzb21ldGhpbmcsIHByb3Blcmx5LCBhZnRlciBtb250aHMgb2YgY2FyZWZ1bCwgcGF0aWVudCBhY2N1bXVsYXRpb24uCgpHcmV0YSBncmlucywgZ2VudWluZWx5IHBsZWFzZWQuICdHb29kLiBUaGF0J3MgdGhlIHNwaXJpdCB0aGF0IGdldHMgdGhlIGxhc3Qgc3RyZXRjaCBkb25lIHByb3Blcmx5LCByYXRoZXIgdGhhbiBkcmFnZ2VkIG91dCBieSBpdHMgb3duIHNlbnRpbWVudC4nIFRoZSBDb250b3VyIGNsaW1icyBpbnRvIHRoZSB0aGluLCBlbm9ybW91cyBza3ksIHRoZSBsYXN0IGZldyBuYW1lcyBvbiB0aGUgbGlzdCBmZWVsaW5nLCBmb3IgdGhlIGZpcnN0IHRpbWUsIGdlbnVpbmVseSBjbG9zZSByYXRoZXIgdGhhbiBpbXBvc3NpYmx5IGRpc3RhbnQu',
            'ending' => true,
        ],
    ],
];
