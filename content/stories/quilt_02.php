<?php
return [
    'id'    => 2,
    'title' => 'The Chaiwalla\'s Corner',
    'color' => '#8B5E3C',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIG1hcmtldCB0b3duIGF0IHRoZSBjcm9zc3JvYWRzIHdha2VzIGJlZm9yZSB5b3UgZG8uIEJ5IHRoZSB0aW1lIHlvdSBhcmUgZHJlc3NlZCwgdGhlIGNvYmJsZXN0b25lcyBhcmUgYWxyZWFkeSBiZWluZyBob3NlZCBkb3duLCBhd25pbmdzIGNyYW5rZWQgb3V0IHN0YWxsIGJ5IHN0YWxsLCB0aGUgZmlyc3QgYXJndW1lbnQgb2YgdGhlIGRheSB1bmRlcndheSBzb21ld2hlcmUgbmVhciB0aGUgY2hlZXNlLiBUaGUgZ2luZ2VyIHJvb3QgaXMgaW4geW91ciBwb2NrZXQsIHdyYXBwZWQgaW4gdGhlIHBhcGVyIEZyZWQgZ2F2ZSB5b3UuIFlvdSBjYW4gc21lbGwgaXQgZmFpbnRseSB0aHJvdWdoIHRoZSBjbG90aC4KCkZyZWQgaXMgYWxyZWFkeSBhd2FrZSBhbmQgYWxyZWFkeSBoYXMgb3BpbmlvbnMgYWJvdXQgdGhlIG1hcmtldCBsYXlvdXQu',
            'choices' => [
                ['text' => 'WW91IGFycml2ZWQgbGFzdCBuaWdodCBhdCB0aGUgaW5u', 'next' => '2_inn'],
                ['text' => 'VGhlIGZlcnJ5IGJyb3VnaHQgeW91IGluIGF0IGRhd24=', 'next' => '2_ferry'],
            ],
        ],
        '2_inn' => [
            'prose'   => 'VGhlIGlubiB3YXMgdGhlIGtpbmQgb2YgcGxhY2UgdGhhdCBoYXMgYmVlbiBhbiBpbm4gZm9yIGEgbG9uZyB0aW1lIGFuZCBkb2Vzbid0IG5lZWQgdG8gdHJ5LiBUaGUgYmVkIHdhcyBnb29kLiBUaGUgd29tYW4gYXQgdGhlIGRlc2sgZ2F2ZSB5b3UgYSByb29tIGtleSBhbmQgYSBsb29rIHRoYXQgc2FpZCBzaGUgaGFkIHNlZW4gdGlyZWQgdHJhdmVsbGVycyBiZWZvcmUgYW5kIHdhcyBub3QgYWxhcm1lZCBieSB5b3Vycy4KCllvdSBzbGVwdCB3aXRob3V0IGRyZWFtaW5nIGFuZCB3b2tlIHRvIGJlbGxzIHRoYXQgcmFuZyBzZXZlbiB0aW1lcyBhbmQgdGhlbiBhIHBhdXNlIGFuZCB0aGVuIG9uZSBtb3JlLCB3aGljaCBGcmVkIHRvbGQgeW91IG92ZXIgYnJlYWtmYXN0IG1lYW50IHNvbWV0aGluZyBpbiB0aGUgbG9jYWwgcmVja29uaW5nLCB0aG91Z2ggaGUgd2FzIHVuY2xlYXIgd2hhdC4gSGUgaGFkIGJlZW4gYXdha2Ugc2luY2UgYmVmb3JlIHRoZSBiZWxscy4=',
            'choices' => [
                ['text' => 'R28gZG93biBpbnRvIHRoZSBtYXJrZXQ=', 'next' => '3_market'],
            ],
        ],
        '2_ferry' => [
            'prose'   => 'VGhlIGZlcnJ5IGZyb20gdGhlIGNvYXN0IGNhbWUgaW4gYXQgZmlyc3QgbGlnaHQsIHRoZSByaXZlciBicm9hZCBhbmQgc2xvdyBhbmQgc21lbGxpbmcgb2YgY2xheSBhbmQgc29tZXdoZXJlIGRpc3RhbnQuIFRoZSBtYXJrZXQgd2FzIGFscmVhZHkgdmlzaWJsZSBmcm9tIHRoZSB3YXRlciDigJQgY2xvdGggYXduaW5ncyBpbiB5ZWxsb3cgYW5kIHJ1c3QgYW5kIGdyZWVuLCB0aGUgbm9pc2Ugb2YgaXQgcmVhY2hpbmcgeW91IGFjcm9zcyB0aGUgc3VyZmFjZSBiZWZvcmUgdGhlIHNtZWxsIGRpZC4KCkZyZWQgaGFkIGFwcG9pbnRlZCBoaW1zZWxmIGJvdyBsb29rb3V0IGZvciB0aGUgZW50aXJlIGNyb3NzaW5nIGFuZCBoYWQgaWRlbnRpZmllZCwgaW4gdGhlIHJpdmVyc2lkZSB2ZWdldGF0aW9uIGFsb25lLCB0d28gc3BlY2llcyBoZSBoYWQgbm90IHNlZW4gdGhpcyBmYXIgd2VzdC4gVGhlIGZlcnJ5bWFuIGZvdW5kIHRoaXMgaW50ZXJlc3RpbmcuIEZyZWQgZm91bmQgdGhlIGZlcnJ5bWFuJ3MgaW50ZXJlc3QgZ3JhdGlmeWluZy4gWW91IGZvdW5kIHRoZSBnaW5nZXIgdGVhIEZyZWQgYnJld2VkIGluIHRoZSBjcm9zc2luZydzIGZpbmFsIHRlbiBtaW51dGVzIGV4Y2VsbGVudCwgdGhvdWdoIHNsaWdodGx5IHJ1c2hlZC4=',
            'choices' => [
                ['text' => 'U3RlcCBpbnRvIHRoZSBtYXJrZXQ=', 'next' => '3_market'],
            ],
        ],
        '3_market' => [
            'prose'   => 'VGhlIG1hcmtldCBoYXMgYmVlbiBydW5uaW5nIGF0IHRoaXMgY3Jvc3Nyb2FkcyBmb3IgbG9uZ2VyIHRoYW4gdGhlIHRvd24gaGFzIGhhZCBpdHMgbmFtZS4gWW91IGNhbiBmZWVsIGl0IGluIHRoZSBjb2JibGVzdG9uZXMg4oCUIHRoZSBwYXRocyBwZW9wbGUgd2FsayBldmVyeSBkYXkgd29ybiBzbW9vdGggYW5kIGJyaWdodCwgdGhlIGNvcm5lcnMgc3RpbGwgcm91Z2guIEFuIGlyb24gbmVlZGxlIHNlbGxlciB3aXRoIGEgY2FzZSBsaW5lZCBpbiByZWQgdmVsdmV0LiBBIG1hbiB3aXRoIGEgY2FydCBvZiBzZWNvbmRoYW5kIGJvb2tzIHRoYXQgaGF2ZSBiZWVuIHNlY29uZGhhbmQgZm9yIGEgY2VudHVyeSBhdCBsZWFzdC4gVGhlIHNtZWxsIGlzIGNvbXBsZXg6IG51dG1lZywgdGFsbG93LCBhbmQgdW5kZXJuZWF0aCBib3RoIG9mIHRoZW0gc29tZXRoaW5nIGRhcmtlciBhbmQgc3dlZXRlciB0aGF0IHlvdSBjYW4ndCBxdWl0ZSBwbGFjZS4KCkZyZWQgc3RvcHMgd2Fsa2luZy4gSGlzIGhlYWQgY29tZXMgdXAuCgonQ2hhaSwnIGhlIHNheXMuICdHb29kIGNoYWkuIEZvbGxvdyBtZS4n',
            'choices' => [
                ['text' => 'Rm9sbG93IEZyZWQ=', 'next' => '4_corner'],
            ],
        ],
        '4_corner' => [
            'prose'   => 'VGhlIGNvcm5lciBpcyB3aGVyZSB0aGUgc3BpY2Ugc3RhbGxzIGVuZCBhbmQgYSBzaG9ydCBhbGxleSBiZWdpbnMuIEEgbG93IGJyYXppZXIgd2l0aCBhIGZpcmUgdGhhdCBoYXMgY2xlYXJseSBiZWVuIGJ1cm5pbmcgc2luY2UgYmVmb3JlIHRoZSBtYXJrZXQgb3BlbmVkIOKAlCB0aGUgY29hbHMgdGhlIGRlZXAgb3JhbmdlIG9mIGEgZmlyZSB0aGF0IGtub3dzIHdoYXQgaXQgaXMgZG9pbmcuIEEgYnJhc3MgcG90IGFib3ZlIGl0LCBibGFja2VuZWQgYXQgdGhlIGJhc2UsIHN0ZWFtIHR1cm5pbmcgYXQgdGhlIGxpZC4gQSBtYW4gb24gYSBmb2xkaW5nIHN0b29sIHdpdGggdGhlIHBhdGllbmNlIG9mIHNvbWVvbmUgd2hvIGhhcyBiZWVuIHdhdGNoaW5nIG1hcmtldHMgZnJvbSBjb3JuZXJzIGZvciBhIGxvbmcgdGltZSBhbmQgaGFzIG9ic2VydmVkIHRoYXQgc3RpbGxuZXNzIGlzIGl0cyBvd24ga2luZCBvZiBjb252ZXJzYXRpb24uCgpIZSBoYXNuJ3QgbG9va2VkIGF0IHlvdSB5ZXQu',
            'choices' => [
                ['text' => 'V2FsayBzdHJhaWdodCB0b3dhcmQgaGlt', 'next' => '5_approach'],
                ['text' => 'V2FpdCBuZWFyIHRoZSBzcGljZSBzdGFsbHM=', 'next' => '5_wait'],
            ],
        ],
        '5_approach' => [
            'prose'   => 'WW91IGNyb3NzIHRoZSBjb2JibGVzdG9uZXMgYW5kIHN0b3AgYXQgdGhlIGVkZ2Ugb2YgdGhlIGJyYXppZXIncyB3YXJtdGguIFRoZSBtYW4gZG9lc24ndCBsb29rIHVwIGltbWVkaWF0ZWx5IOKAlCBoZSBpcyB3YXRjaGluZyBzb21ldGhpbmcgYWNyb3NzIHRoZSBtYXJrZXQsIGEgdHJhbnNhY3Rpb24gb3Igbm90aGluZyBpbiBwYXJ0aWN1bGFyLiBUaGVuLCBpbiB0aGUgc2FtZSB3YXkgeW91J2QgY29tcGxldGUgYSBzZW50ZW5jZSBzdGFydGVkIGVhcmxpZXI6IGhlIGxvb2tzIHVwLgoKSGlzIGV5ZXMgYXJlIGNhbG0gYW5kIGRpcmVjdCBhbmQgbm90IGF0IGFsbCBzdXJwcmlzZWQuCgpGcmVkLCBvbiB5b3VyIHNob3VsZGVyLCBoYXMgZ29uZSB2ZXJ5IHF1aWV0LiBZb3UgY2FuIHNtZWxsIHRoZSBjaGFpIGZyb20gaGVyZS4gSXQgaXMsIGRlbW9uc3RyYWJseSwgdmVyeSBnb29kIGNoYWku',
            'choices' => [
                ['text' => 'VGFrZSBvdXQgdGhlIGdpbmdlciByb290', 'next' => '6_ginger'],
            ],
        ],
        '5_wait' => [
            'prose'   => 'WW91IHN0b3AgYXQgdGhlIG5lYXJlc3Qgc3BpY2Ugc3RhbGwgYW5kIHByZXRlbmQgdG8gZXhhbWluZSBkcmllZCBsYXZlbmRlci4gVGhlIG1hbiBhdCB0aGUgYnJhemllciBkb2Vzbid0IG1vdmUsIGJ1dCBzb21ldGhpbmcgaW4gdGhlIHF1YWxpdHkgb2YgaGlzIHN0aWxsbmVzcyBzaGlmdHMuIEFjcm9zcyB0d2VudHkgZmVldCBvZiBjb2JibGVzdG9uZXMsIHlvdSBiZWNvbWUgYXdhcmUgdGhhdCBoZSBoYXMgc2VlbiB5b3Ug4oCUIG5vdCBiZWNhdXNlIGhlIHR1cm5lZCBoaXMgaGVhZCwgYmVjYXVzZSBoZSBkaWRuJ3QsIGJ1dCBiZWNhdXNlIGhpcyBhdHRlbnRpb24gaXMgbm93IHVubWlzdGFrYWJseSBpbiB5b3VyIGRpcmVjdGlvbi4KCkZyZWQsIG9uIHlvdXIgc2hvdWxkZXIsIHNheXMgcXVpZXRseTogJ0hlIGFscmVhZHkga25vd3Mgd2UncmUgaGVyZS4nCgpBbmQgdGhlbjogJ1RoZSBjaGFpIHNtZWxscyBjb3JyZWN0Lic=',
            'choices' => [
                ['text' => 'VGFrZSBvdXQgdGhlIGdpbmdlciByb290', 'next' => '6_ginger'],
            ],
        ],
        '6_ginger' => [
            'prose'   => 'WW91IHJlYWNoIGludG8geW91ciBwb2NrZXQgYW5kIHNldCB0aGUgZ2luZ2VyIHJvb3QgcGFja2V0IG9uIHRoZSBlZGdlIG9mIHRoZSBicmF6aWVyLiBZb3UncmUgbm90IHN1cmUgd2h5LiBJdCBzZWVtcyBsaWtlIHRoZSByaWdodCB0aGluZyB0byBkbyB3aXRoIHlvdXIgaGFuZHMuCgpUaGUgbWFuIGxlYW5zIGZvcndhcmQsIGp1c3Qgc2xpZ2h0bHksIGFuZCBpbmhhbGVzLgoKJ1dobyBtYWRlIHRoaXMgYmxlbmQ/JyBoZSBzYXlzLgoKRnJlZCB0dXJucyBmcm9tIGhpcyBwb3NpdGlvbiBvbiB5b3VyIHNob3VsZGVyLiAnSSBkaWQsJyBoZSBzYXlzLgoKVGhlIGNoYWl3YWxsYSBsb29rcyBhdCBGcmVkIGZvciBhIGxvbmcgbW9tZW50LiBJdCBpcyBub3QgdW5mcmllbmRseS4gSXQgaXMgdGhlIGxvb2sgb2Ygc29tZW9uZSBjb25maXJtaW5nIHNvbWV0aGluZyB0aGV5IGhhZCBoYWxmLWtub3duLgoKJ1llcywnIGhlIHNheXMuICdTaGUgbWVudGlvbmVkIGEgcGFycm90LicKCkZyZWQgZ29lcyB2ZXJ5IHN0aWxsLiBOb3QgYWxhcm1lZCDigJQgbW9yZSBhcyB0aG91Z2ggc29tZXRoaW5nIGhhcyBhcnJpdmVkIHRoYXQgaGFzbid0IGZpbmlzaGVkIGFycml2aW5nIHlldC4KCidTaGUsJyB5b3Ugc2F5LgoKJ1llcywnIHNheXMgdGhlIGNoYWl3YWxsYS4gSGUgbGlmdHMgdGhlIGxpZCBvZiB0aGUgYnJhc3MgcG90LiBUaGUgc21lbGwgb2YgY2FyZGFtb20gcmlzZXMsIGFuZCBiZW5lYXRoIGl0IHNvbWV0aGluZyBlbHNlIOKAlCBvbGRlciwgZGFya2VyIOKAlCB0aGF0IHlvdSBkb24ndCBoYXZlIGEgbmFtZSBmb3IuCgonU2l0IGRvd24sJyBoZSBzYXlzLiAnVGhyZWUgbWludXRlcy4n',
            'choices' => [
                ['text' => 'U2l0IGRvd24gYW5kIHdhaXQ=', 'next' => '7_known'],
            ],
        ],
        '7_known' => [
            'prose'   => 'VGhlIGNoYWkgaXMgaGVhdmllciB0aGFuIEZyZWQncyDigJQgbW9yZSBjYXJkYW1vbSwgYW5kIHRoYXQgb3RoZXIgdGhpbmcgYmVuZWF0aCBpdCwgYW5kIHRoZSBjdXAgd2FybSBpbiB5b3VyIGhhbmRzIGJlZm9yZSB5b3UndmUgYXNrZWQgZm9yIGl0LiBUaGUgY2hhaXdhbGxhIHdhdGNoZXMgeW91IGJvdGggd2l0aCBhIHN0aWxsbmVzcyB0aGF0IGlzIG5vdCBpbmRpZmZlcmVuY2UuIEl0IGlzIHRoZSBzdGlsbG5lc3Mgb2YgYSBwZXJzb24gd2hvIGhhcyBiZWVuIHdhaXRpbmcgZm9yIGEgc3BlY2lmaWMgdGhpbmcgYW5kIGhhcyBhcnJpdmVkIGF0IHRoZSB3YWl0aW5nIHdpdGhvdXQgY29tcGxhaW50LgoKJ1NoZSB0b2xkIG1lIHNvbWVvbmUgd291bGQgY29tZSwnIGhlIHNheXMuICdTaGUgc2FpZCB0byB0ZWxsIHlvdTogdGhlIHN0b25lcyB0YWxrLCBpZiB5b3UgZ28gc2xvdyBlbm91Z2ggdG8gbGlzdGVuLicKCkhlIGRvZXNuJ3QgZXhwbGFpbiB3aGljaCBzaGUuIEhlIGRvZXNuJ3QgZXhwbGFpbiB3aG8gaGUgaXMuCgpGcmVkIGlzIGhvbGRpbmcgaGlzIGN1cCBpbiBib3RoIHdpbmdzIGFuZCBub3QgbG9va2luZyBhdCBhbnl0aGluZyBpbiBwYXJ0aWN1bGFyLgoKWW91IHVuZGVyc3RhbmQsIGZvciB0aGUgZmlyc3QgdGltZSwgdGhhdCB0aGlzIHdhcyBwbGFubmVkIGFsbCB0aGUgd2F5IGRvd24uIE5vdCB0aGUgcXVlc3Qg4oCUIHRoZSBxdWVzdCB5b3Uga25ldy4gQnV0IHRoZSBwZW9wbGUgd2FpdGluZyBpbiBpdC4=',
            'terminal' => true,
            'choices' => [
                ['text' => 'RmluZCB0aGUgY2xvdGggbWVyY2hhbnQ=', 'next' => '8_stall'],
            ],
        ],
        '8_stall' => [
            'prose'   => 'SGFsZndheSBkb3duIHRoZSB0ZXh0aWxlIHJvdywgd2hlcmUgbGlnaHQgZnJvbSBhIGdhcCBpbiB0aGUgYXduaW5ncyBmYWxscyB3YXJtIG9uIHRoZSBjb2JibGVzdG9uZXMsIGEgd29tYW4gaXMgZG9pbmcgdGhyZWUgdGhpbmdzIHNpbXVsdGFuZW91c2x5OiBmb2xkaW5nIGNsb3RoLCBzZXR0bGluZyBhIHByaWNlIGRpc3B1dGUgYWJvdXQgaW5kaWdvLCBhbmQgd2F0Y2hpbmcgdGhlIHJvdyB3aXRoIHRoZSBwZXJpcGhlcmFsIGF0dGVudGlvbiBvZiBzb21lb25lIHdobyBoYXMgcnVuIGEgbWFya2V0IHN0YWxsIGxvbmcgZW5vdWdoIHRoYXQgdGhlIHN0YWxsIGhhcyBiZWNvbWUgYW4gZXh0ZW5zaW9uIG9mIGhlciBvd24gc2Vuc2VzLgoKV2hlbiBzaGUgZmluaXNoZXMgdGhlIHRyYW5zYWN0aW9uLCBzaGUgbG9va3MgYXQgeW91IGRpcmVjdGx5LgoKQWJvdmUgdGhlIGF3bmluZyBmcmFtZSwgY3V0IGludG8gdGhlIHdvb2Qgb2YgdGhlIGxpbnRlbDogbWFya3MsIGRlZXAgYW5kIGRlbGliZXJhdGUsIHRoZSB3b29kIGFyb3VuZCB0aGVtIGRhcmtlbmVkIHdpdGggeWVhcnMuIFNvbWVvbmUgY2FydmVkIHRoZW0gdGhlcmUgYW5kIHRoZSBzdGFsbCBncmV3IHVwIGFyb3VuZCB0aGVtLg==',
            'choices' => [
                ['text' => 'QXNrIGFib3V0IHRoZSBtYXJrcyBpbiB0aGUgbGludGVs', 'next' => '9_rune'],
                ['text' => 'QXNrIGlmIHNoZSBrbmV3IGhlcg==', 'next' => '9_cloth'],
            ],
        ],
        '9_rune' => [
            'prose'   => 'J015IG1vdGhlciBhbHdheXMgY2FsbGVkIHRoZW0gaGVyIGludml0YXRpb24sJyBEZWxpbGFoIHNheXMuIFNoZSBsb29rcyB1cCBhdCB0aGUgbGludGVsIGFzIGlmIHNlZWluZyBpdCBmcmVzaC4gJ0Egd29tYW4gY2FydmVkIHRoZW0gYmVmb3JlIEkgd2FzIGJvcm4uIE15IG1vdGhlciB3YXMgdGhlcmUuIFNoZSBzYWlkIHRoZSB3b21hbiB3b3JrZWQgYSBmdWxsIGFmdGVybm9vbiwgY2FyZWZ1bCBhcyBhIGpld2VsbGVyLiBQYWlkIHdpdGggc2VhLWdyZWVuIGxpbmVuIOKAlCBhIHdob2xlIGJvbHQuIE15IG1vdGhlciBrZXB0IGEgeWFyZCBvZiBpdC4nCgpTaGUgcHJvZHVjZXMgYSBzY3JhcCBvZiBwYXBlciBmcm9tIGhlciBhcHJvbiBwb2NrZXQsIGFuIG9sZCBpbnZvaWNlIHR1cm5lZCBvdmVyLCBhbmQgY29waWVzIHRoZSBtYXJrcyBoZXJzZWxmLiBRdWlja2x5LiBXaXRoIHRoZSBjZXJ0YWludHkgb2Ygc29tZW9uZSB3aG8gaGFzIGRvbmUgaXQgYmVmb3JlLgoKJ0luIGNhc2UsJyBzaGUgc2F5cywgYW5kIGhhbmRzIGl0IHRvIHlvdS4KCllvdSBmb2xkIGl0IGJlc2lkZSB0aGUgbWFwLiBUaGUgc2FtZSBraW5kIG9mIHRoaW5nLCB5b3UgdGhpbmsuIEJvdGggcGllY2VzIG9mIHNvbWV0aGluZyBsYXJnZXIgdGhhbiB0aGV5IGxvb2su',
            'choices' => [
                ['text' => 'TG9vayBhdCB3aGF0IHNoZSBpcyB3cmFwcGluZw==', 'next' => '10_given'],
            ],
        ],
        '9_cloth' => [
            'prose'   => 'RGVsaWxhaCBpcyBxdWlldCBmb3IgYSBtb21lbnQuIFRoZW46ICdUaGUgV2Vsc2h3b21hbi4nIFNoZSBzYXlzIGl0IHRoZSB3YXkgeW91J2Qgc2F5IHRoZSB0aWRlIOKAlCBhcyBhIHNwZWNpZmljIHRoaW5nIHRoYXQgdmlzaXRzLCB3aXRoIGl0cyBvd24gc2Vhc29uLiAnU2hlIGNhbWUgdHdpY2UuIE9uY2Ugd2l0aCBteSBtb3RoZXI7IG9uY2UgYWxvbmUsIHRvIGxlYXZlIHRoZSBzcXVhcmUuIFNoZSBzYWlkIHNoZSB3YXMgbWFraW5nIHNvbWV0aGluZyBmb3IgaGVyIGdyYW5kY2hpbGRyZW4uJyBBIHBhdXNlLiAnTXkgbW90aGVyIGFzc3VtZWQgc2hlIG1lYW50IGEgYmxhbmtldC4nCgpTaGUgcmVhY2hlcyBiZW5lYXRoIHRoZSBjb3VudGVyIHdpdGhvdXQgYmVpbmcgYXNrZWQuCgonTXkgbW90aGVyIGtlcHQgdGhlIGNsb3RoIHdyYXBwZWQgaW4gdGhlIHJpZ2h0IGJvbHQuIEFsbCB0aGVzZSB5ZWFycy4gU2hlIHNhaWQgdGhlIHJpZ2h0IHBlcnNvbiB3b3VsZCBjb21lIGFuZCBhc2suJyBTaGUgbG9va3MgYXQgeW91IHN0ZWFkaWx5LiAnWW91J3JlIGFza2luZy4n',
            'choices' => [
                ['text' => 'TG9vayBhdCB3aGF0IHNoZSBoYXMga2VwdA==', 'next' => '10_given'],
            ],
        ],
        '10_given' => [
            'prose'   => 'VGhlIHNxdWFyZSBjb21lcyBvdXQgb2YgYSBmb2xkIG9mIGNsb3RoIHRoYXQgRGVsaWxhaCBvcGVucyBsaWtlIGEgYm9vayDigJQgbWFya2V0IHN0YWxscyBpbiBjb2xvdXJlZCB0aHJlYWQsIGFidW5kYW5jZSBzdGl0Y2hlZCB3aXRoIGNhcmUsIHRoZSBraW5kIG9mIHRoaW5nIHRoYXQgdG9vayBzb21lb25lIGEgbG9uZyB0aW1lIGFuZCB3YXMgZG9uZSBhbnl3YXkuIFNoZSBob2xkcyBpdCBmb3IgYSBtb21lbnQgYmVmb3JlIGdpdmluZyBpdCB0byB5b3UuIE5vdCByZWx1Y3RhbnQuIEp1c3Qgbm90aWNpbmcgaXQgZ29pbmcuCgonU2hlIG1hZGUgdGhlIGZpcnN0IHN0aXRjaCByaWdodCB0aGVyZSwnIERlbGlsYWggc2F5cywgYW5kIHBvaW50cyB0byBhIHNwb3QgYmV0d2VlbiB0aGUgc3RhbGxzIHdoZXJlIGEgc2hhZnQgb2YgbGlnaHQgaGl0cyB0aGUgY29iYmxlc3RvbmVzLiAnTXkgbW90aGVyIHdhdGNoZWQuIFNoZSBjYW1lIGJhY2sgdGhlIGZvbGxvd2luZyBkYXkgdG8gZmluaXNoIGl0IGFuZCBsZWZ0IGl0IHdpdGggdXMgdGhlbi4nCgpUaGUgc3F1YXJlIGdvZXMgaW50byB5b3VyIHBhY2sgYmVzaWRlIHRoZSBnaW5nZXIgcm9vdCBwYWNrZXQuIFR3byB0aGluZ3MgdGhhdCBoYXZlIGJlZW4gd2FpdGluZyBpbiB0aGUgc2FtZSBkaXJlY3Rpb24u',
            'choices' => [
                ['text' => 'VHVybiB0byBsZWF2ZQ==', 'next' => '11_pouch'],
            ],
        ],
        '11_pouch' => [
            'prose'   => 'RGVsaWxhaCBzdG9wcyB5b3UgYmVmb3JlIHlvdSd2ZSBnb25lIHR3byBzdGVwcy4gJ1dhaXQuJyBTaGUgcHJvZHVjZXMgYSBzbWFsbCBjbG90aCBiYWcgZnJvbSB1bmRlciB0aGUgY291bnRlciDigJQgZGVuc2UsIGZyYWdyYW50LCB0aWVkIHdpdGggY29yZC4gJ0ZvciB0aGUgcm9hZC4gRHJpZWQgaGVyYnMgYW5kIGJvdGFuaWNhbCBkeWVzLiBUaGUgcHVycGxlIGNvbWVzIGZyb20gd2VsZC4gVmVyeSBvbGQgcmVjaXBlLiBLZWVwIGl0IGRyeS4nCgpZb3UgdGFrZSBpdC4gSXQgc21lbGxzIG9mIHNvbWV0aGluZyBkYXJrIGFuZCBzd2VldCBhbmQgc2xpZ2h0bHkgYml0dGVyLCB0aHJlZSB0aGluZ3MgYXQgb25jZS4KCkZyZWQgaGFzIGJlZW4gcXVpZXQgZm9yIHRoZSBsYXN0IHRocmVlIHN0YWxscy4gSGUgaXMgcXVpZXQgbm8gbG9uZ2VyLgoKJ1dlbGQsJyBoZSBzYXlzLCB3aXRoIHRoZSBwYXJ0aWN1bGFyIHByZWNpc2lvbiB0aGF0IG1lYW5zIGhlIGlzIHRyeWluZyBub3QgdG8gc2F5IHRvbyBtdWNoIGF0IG9uY2UuICdSZXNlZGEgbHV0ZW9sYS4gQSBkeWVyJ3MgcGxhbnQg4oCUIGluIHVzZSBvbiB0aGlzIGNvYXN0IHNpbmNlIHRoZSBCcm9uemUgQWdlLiBHcm93cyBvbiBkaXN0dXJiZWQgZ3JvdW5kLicgSGUgdHVybnMgdG8gRGVsaWxhaC4gJ0FyZSB0aGVyZSBvdGhlciBwbGFudHMgaW4gdGhpcyBwb3VjaD8nCgonWWVzLCcgc2F5cyBEZWxpbGFoLiBTaGUgZG9lc24ndCBlbGFib3JhdGUuCgpGcmVkIGZpbmRzIHRoaXMgYWNjZXB0YWJsZSBhbmQgc29tZXdoYXQgZmFzY2luYXRpbmcu',
            'choices' => [
                ['text' => 'TGVhdmUgdGhyb3VnaCB0aGUgbWFya2V0', 'next' => '12_end_road'],
                ['text' => 'R28gYmFjayB0byB0aGUgY2hhaXdhbGxhIGZpcnN0', 'next' => '12_end_return'],
            ],
        ],
        '12_end_road' => [
            'prose'   => 'VGhlIG1hcmtldCBjbG9zZXMgYmVoaW5kIHlvdSBpbiB0aGUgd2F5IHRoYXQgYWZ0ZXJub29uIGNvbWVzIOKAlCBvbmUgc3RhbGwgYXQgYSB0aW1lLCB3aXRob3V0IGFubm91bmNlbWVudC4gWW91IGFyZSBvbiB0aGUgZWFzdCByb2FkIGJlZm9yZSB0aGUgZmFicmljIHNlbGxlcnMgc3RhcnQgZm9sZGluZy4KClRoZSBzcXVhcmUgaXMgaW4geW91ciBwYWNrLiBUaGUgcnVuZSBjb3B5IGlzIGZvbGRlZCBiZXNpZGUgdGhlIG1hcCwgdHdvIGZyYWdtZW50cyBvZiB0aGUgc2FtZSBsYXJnZXIgdGhpbmcuIFRoZSBzcGljZSBwb3VjaCBpcyB0aGVyZSB0b28sIHNtZWxsaW5nIG9mIHdlbGQgYW5kIHdoYXQgeW91IHN0aWxsIGNhbid0IG5hbWUuCgpGcmVkIGlzIG9uIHlvdXIgc2hvdWxkZXIgYW5kIHRoaW5raW5nLiBIZSBoYXMgbm90IHlldCBzYWlkIHdoYXQgaGUgaXMgdGhpbmtpbmcsIHdoaWNoIG1lYW5zIGl0IGlzIG5vdCBmaW5pc2hlZCB5ZXQuCgpZb3Uga25vdyB0d28gdGhpbmdzIHlvdSBkaWQgbm90IGtub3cgdGhpcyBtb3JuaW5nOiB0aGF0IHlvdXIgZ3JhbmRtb3RoZXIncyBxdWVzdCB3YXMgcGxhbm5lZCBieSBtb3JlIHRoYW4gb25lIHBlcnNvbiwgYW5kIHRoYXQgc29tZXdoZXJlIHRoZXJlIGlzIGEgcGFycm90IHdobyB3YXMgbWVudGlvbmVkIGJlZm9yZSBoZSBrbmV3IGhlIHdhcyBwYXJ0IG9mIHRoaXMuCgpGcmVkIGtub3dzIHRoZSBzZWNvbmQgb25lIHRvby4gSGUgaGFzbid0IHNhaWQgc28geWV0LgoKVGhlIHNlY29uZCBtYXJrIG9uIHRoZSBtYXAgaXMgdGhyZWUgZGF5cyBlYXN0Lg==',
            'ending'  => true,
        ],
        '12_end_return' => [
            'prose'   => 'WW91IGdvIGJhY2sgdG8gdGhlIGNvcm5lciBiZWZvcmUgeW91IGxlYXZlLgoKVGhlIGNoYWl3YWxsYSBpcyBzdGlsbCB0aGVyZS4gVGhlIGJyYXppZXIgaXMgbG93IGJ1dCBub3Qgb3V0LiBIZSBoYXMgcG91cmVkIGEgZnJlc2ggY3VwIOKAlCBub3QgZm9yIHlvdSwganVzdCBmb3IgdGhlIG1vbWVudCDigJQgYW5kIHNsaWRlcyBpdCBhY3Jvc3MgdGhlIGVkZ2Ugb2YgdGhlIGJyYXppZXIgd2hlbiBoZSBzZWVzIHlvdSBjb21pbmcsIHdpdGhvdXQgYmVpbmcgYXNrZWQuCgpZb3Ugc2hvdyBoaW0gdGhlIHNxdWFyZS4gSGUgbG9va3MgYXQgaXQgZm9yIGEgbG9uZyB0aW1lLgoKJ0dvb2QsJyBoZSBzYXlzLgoKVGhlIGNhcmRhbW9tIGlzIGhlYXZ5IGFuZCB0aGUgdGhpbmcgdW5kZXJuZWF0aCBpcyBzdGlsbCBzb21ldGhpbmcgeW91IGRvbid0IGhhdmUgYSBuYW1lIGZvci4gRnJlZCBpcyBzdGlsbCBmb3Igb25jZSwgaGlzIGN1cCBoZWxkIGluIGJvdGggd2luZ3MuIFNvbWV3aGVyZSBpbiB0aGUgbWFya2V0LCBhIG1lcmNoYW50IGxhdWdocyBhdCBzb21ldGhpbmcgYW5kIHRoZSBzb3VuZCBjYXJyaWVzIGFjcm9zcyB0aGUgY29iYmxlc3RvbmVzLgoKJ1NoZSB3b3VsZCBiZSBnbGFkLCcgdGhlIGNoYWl3YWxsYSBzYXlzLgoKSGUgZG9lc24ndCBzYXkgaGUgd2lsbCBiZSBoZXJlIGlmIHlvdSBuZWVkIGhpbSBhZ2Fpbi4gWW91IGxlYXZlIHRoZSBjdXAgaGFsZi1mdWxsIGFuZCBzdGVwIGJhY2sgaW50byB0aGUgbWFya2V0LCB0aGUgcG91Y2ggb2Ygd2VsZCBhbmQgb2xkIHJlY2lwZXMgaW4geW91ciBwb2NrZXQsIHRoZSByb2FkIGJlZ2lubmluZyBvbiB0aGUgb3RoZXIgc2lkZSBvZiB0aGUgc3RhbGxzLg==',
            'ending'  => true,
        ],
    ],
];
