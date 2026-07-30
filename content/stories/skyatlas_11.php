<?php
return [
    'id'    => 11,
    'title' => 'Not Simply Hand It Over',
    'color' => '#3A5A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFRpYmV0YW4gUGxhdGVhdSByaXNlcyBpbnRvIHRoaW4sIGltcG9zc2libHkgY2xlYXIgYWlyLCB0aGUgd29ybGQncyBoaWdoZXN0IGxhcmdlIGxhbmRtYXNzIG9mZmVyaW5nIGEgc2t5IHNvIGRlbnNlIHdpdGggc3RhcnMgaXQgbG9va3MgYWxtb3N0IGFydGlmaWNpYWwuIFByaXlhIGxhbmRzIGNhcmVmdWxseSwgY2hlY2tpbmcgYWx0aXR1ZGUgcmVhZG91dHMgd2l0aCByZWFsIGNhdXRpb24uICdFeHRyZW1lIGFsdGl0dWRlLCBleHRyZW1lIGNsYXJpdHksJyBzaGUgc2F5cy4gJ0Fsc28g4oCUIHNvbWVvbmUncyBhbHJlYWR5IGhlcmUuIFRoYXQncyBub3Qgb3VyIGdsaWRlciBwYXJrZWQgb3ZlciB0aGVyZS4nCgpUd28gcGxhdGVhdSByb3V0ZXMgdG93YXJkIHRoZSB3YWl0aW5nIGZpZ3VyZSBwcmVzZW50IHRoZW1zZWx2ZXM6IHRoZSBzaG9ydGVyLCBleHBvc2VkIHJpZGdlIHBhdGgsIG9yIHRoZSBsb25nZXIsIG1vcmUgc2hlbHRlcmVkIHZhbGxleSByb3V0ZS4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgZXhwb3NlZCByaWRnZSBwYXRo', 'next' => '2_ridge'],
                ['text' => 'Rm9sbG93IHRoZSBzaGVsdGVyZWQgdmFsbGV5IHJvdXRl', 'next' => '2_valley'],
            ],
        ],
        '2_ridge' => [
            'prose'  => 'VGhlIGV4cG9zZWQgcmlkZ2UgcGF0aCBpcyBoYXJkIGdvaW5nIGluIHRoZSB0aGluIGFpciwgd2luZCBjdXR0aW5nIHNoYXJwIGFjcm9zcyBiYXJlIHJvY2ssIGJ1dCBpdCdzIHRoZSBmYXN0ZXN0IHdheSB0byB3aG9ldmVyJ3Mgd2FpdGluZy4gWW91IGFycml2ZSBicmVhdGhsZXNzLCB0aGUgcGxhdGVhdSdzIGVub3Jtb3VzIHNreSBhbHJlYWR5IGRlZXBlbmluZyB0b3dhcmQgaXRzIGZhbW91cyBjbGFyaXR5Lg==',
            'choices' => [
                ['text' => 'U2VlIHdobyBpdCBpcw==', 'next' => '3_shared'],
            ],
        ],
        '2_valley' => [
            'prose'  => 'VGhlIHNoZWx0ZXJlZCB2YWxsZXkgcm91dGUgdGFrZXMgbG9uZ2VyIGJ1dCBzcGFyZXMgeW91IHRoZSB3b3JzdCBvZiB0aGUgcmlkZ2UncyBicnV0YWwgd2luZCwgdGhlIHBsYXRlYXUncyBzY2FsZSBzdGlsbCBwcmVzc2luZyBpbiBmcm9tIGV2ZXJ5IGRpcmVjdGlvbiByZWdhcmRsZXNzLiBZb3UgYXJyaXZlIGEgbGl0dGxlIGxhdGVyLCBoYXZpbmcgY2F1Z2h0IHlvdXIgYnJlYXRoIHByb3Blcmx5IGFsb25nIHRoZSB3YXku',
            'choices' => [
                ['text' => 'U2VlIHdobyBpdCBpcw==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIGZpZ3VyZSB0dXJucyBvdXQgdG8gYmUgYSBzaGFycGx5IGRyZXNzZWQgbWFuLCBlbnRpcmVseSBvdXQgb2YgcGxhY2UgYWdhaW5zdCB0aGUgcGxhdGVhdSdzIHJhdyBzY2FsZSwgYSBsZWF0aGVyIHNhdGNoZWwgb2YgYWNhZGVtaWMgcGFwZXJzIHVuZGVyIG9uZSBhcm0uICdEci4gQWxkcmljIFZvc3MsJyBoZSBpbnRyb2R1Y2VzIGhpbXNlbGYgY3Jpc3BseS4gJ0FzdHJvbm9taWNhbCBoaXN0b3JpYW4uIEkndmUgYmVlbiB0cmFja2luZyB5b3VyIHJvdXRlIGZvciBzb21lIHRpbWUgbm93IOKAlCB0aGF0IGF0bGFzIGJlbG9uZ3MgaW4gYSBwcm9wZXIgdW5pdmVyc2l0eSBjb2xsZWN0aW9uLCBub3Qgc2NhdHRlcmVkIGFjcm9zcyBhIGRvemVuIHJlbW90ZSBlbmNhbXBtZW50cy4nCgpIZSBzdHVkaWVzIHlvdSBjb29sbHkuICdJIGRvbid0IHN1cHBvc2UgeW91J2xsIHNpbXBseSBoYW5kIGl0IG92ZXIuJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'RGVjaWRlIGhvdyB0byByZXNwb25k', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WW91IGNvdWxkIHJlZnVzZSBoaW0gcGxhaW5seSBhbmQgaW1tZWRpYXRlbHksIG1ha2luZyBjbGVhciB0aGUgYXRsYXMgaXNuJ3QgYW4gYXJ0aWZhY3QgZm9yIGFjcXVpc2l0aW9uLCBvciB5b3UgY291bGQgaGVhciBvdXQgaGlzIGFjdHVhbCBhY2FkZW1pYyBhcmd1bWVudCBmaXJzdCwgdW5kZXJzdGFuZGluZyBleGFjdGx5IHdoYXQgaGUgdGhpbmtzIHRoZSBhdGxhcyByZXByZXNlbnRzIGJlZm9yZSBkaXNtaXNzaW5nIGl0LgoKJ0VpdGhlciB3YXksJyBWb3NzIHNheXMgZHJ5bHksICdJIGRvdWJ0IHRoaXMgZW5kcyB3aXRoIHlvdSBzaW1wbHkgaGFuZGluZyBpdCBvdmVyIHRvZGF5LiBCdXQgSSdtIGN1cmlvdXMgd2hpY2gga2luZCBvZiBzdHViYm9ybm5lc3MgSSdtIGRlYWxpbmcgd2l0aC4n',
            'choices' => [
                ['text' => 'UmVmdXNlIGhpbSBwbGFpbmx5LCBpbW1lZGlhdGVseQ==', 'next' => '5_refuse'],
                ['text' => 'SGVhciBvdXQgaGlzIGFjYWRlbWljIGFyZ3VtZW50IGZpcnN0', 'next' => '5_hear'],
            ],
        ],
        '5_refuse' => [
            'prose'  => 'WW91IHJlZnVzZSBoaW0gcGxhaW5seSwgaW1tZWRpYXRlbHksIG1ha2luZyBjbGVhciB0aGUgYXRsYXMgaXMgYSBmYW1pbHkgaW5oZXJpdGFuY2UsIG5vdCBhbiBhY3F1aXNpdGlvbiB0YXJnZXQsIHdoYXRldmVyIGFjYWRlbWljIHZhbHVlIGhlIHRoaW5rcyBpdCBob2xkcy4gVm9zcydzIGV4cHJlc3Npb24gY29vbHMgZnVydGhlciwgdGhvdWdoIHNvbWV0aGluZyBpbiBoaXMgZXllcyBzdWdnZXN0cyBoZSBleHBlY3RlZCBleGFjdGx5IHRoaXMgcmVzcG9uc2UuCgonU2VudGltZW50IG92ZXIgc2Nob2xhcnNoaXAsJyBoZSBzYXlzLCBjbGVhcmx5IHVuaW1wcmVzc2VkLiAnV2UnbGwgc2VlIGhvdyBsb25nIHRoYXQgaG9sZHMsIHRoaXMgZmFyIGludG8gdGhpbmdzLic=',
            'choices' => [
                ['text' => 'UHJvY2VlZCB0byB0aGUgcmlkZGxlIHJlZ2FyZGxlc3M=', 'next' => '6_shared'],
            ],
        ],
        '5_hear' => [
            'prose'  => 'WW91IGhlYXIgb3V0IGhpcyBhcmd1bWVudCwgd2hpY2ggaXMgZ2VudWluZWx5IHN1YnN0YW50aWFsIOKAlCB0aGUgYXRsYXMgYXMgYSByYXJlIGRvY3VtZW50IG9mIGxpdmluZyBza3ktdHJhZGl0aW9ucywgZGVzZXJ2aW5nIGNhcmVmdWwgcHJlc2VydmF0aW9uIGFuZCBwcm9wZXIgYWNhZGVtaWMgc3R1ZHkgYmVmb3JlIGl0J3MgbG9zdCB0byB0aW1lIG9yIHNjYXR0ZXJlZCBpcnJldHJpZXZhYmx5IGFjcm9zcyBhIGZhbWlseSdzIHByaXZhdGUgc2hlbGYuCgpJdCdzIG5vdCBhIGZvb2xpc2ggYXJndW1lbnQuIEl0J3Mgc2ltcGx5IG5vdCB0aGUgb25lIHRoYXQgbWF0dGVycyBtb3N0IHRvIHlvdSwgYW5kIHlvdSB0ZWxsIGhpbSBzby4=',
            'choices' => [
                ['text' => 'UHJvY2VlZCB0byB0aGUgcmlkZGxlIHJlZ2FyZGxlc3M=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB0aGUgZXhjaGFuZ2Ugd2VudCwgVm9zcyBkb2Vzbid0IGxlYXZlIOKAlCBpbnN0ZWFkLCB1bmhhcHBpbHksIGhlIGZvbGxvd3MgYXQgYSBkaXN0YW5jZSBhcyB5b3UgbG9jYXRlIHRoZSBsb2NhbCBlbGRlciBob2xkaW5nIHRoaXMgcGF0Y2gncyByaWRkbGUsIHdhdGNoaW5nIHRoZSB3aG9sZSB0ZWxsaW5nIHdpdGggdmlzaWJsZSBhY2FkZW1pYyBodW5nZXIgYW5kIGVxdWFsbHkgdmlzaWJsZSBmcnVzdHJhdGlvbiBhdCBub3QgYmVpbmcgdGhlIG9uZSBpdCdzIGFjdHVhbGx5IG9mZmVyZWQgdG8uCgpZb3UgZHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcyBwcm9wZXJseSwgVm9zcydzIHdhdGNoZnVsIHByZXNlbmNlIGFuIHVuY29tZm9ydGFibGUgc2hhZG93IG92ZXIgdGhlIHdob2xlIHByb2Nlc3Mu',
            'choices' => [
                ['text' => 'RmluaXNoIHRoZSBwYWdlIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0b3dhcmQgdGhlIFF1aWV0IEhvdXIgd2l0aCB0aGUgcGFnZSBmaW5pc2hlZCwgVm9zcyBzdGlsbCB0cmFpbGluZyBhdCBhIGNvb2wsIHVuaGFwcHkgZGlzdGFuY2UgYmVoaW5kLiBQcml5YSB3YXRjaGVzIGhpbSBnbyB3aXRoIHJlYWwgZGlzdGFzdGUuICdIZSdzIHBlcnNpc3RlbnQsJyBzaGUgc2F5cy4gJ0ZvbGxvd2VkIENvcndpbidzIG9sZCB0cmFpbCBmb3IgbW9udGhzIG9uY2UsIGFwcGFyZW50bHksIGJlZm9yZSBnaXZpbmcgdXAuIERvbid0IGV4cGVjdCBoaW0gdG8gc3RvcCBqdXN0IGJlY2F1c2UgeW91IHRvbGQgaGltIG5vLicKClN1bGkgaGlzc2VzIHNvZnRseSBhdCBWb3NzJ3MgcmV0cmVhdGluZyBmaWd1cmUgZnJvbSB0aGUgc2FmZXR5IG9mIHRoZSBub3NlIGNvbmUu',
            'choices' => [
                ['text' => 'U2F5IHlvdSdyZSBub3Qgd29ycmllZCBhYm91dCBoaW0=', 'next' => '8_end_unworried'],
                ['text' => 'U2F5IGhpcyBwZXJzaXN0ZW5jZSBhY3R1YWxseSB1bnNldHRsZXMgeW91IGEgbGl0dGxl', 'next' => '8_end_unsettled'],
            ],
        ],
        '8_end_unworried' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gbm90IHdvcnJpZWQgYWJvdXQgaGltLCcgeW91IHNheSwgd2F0Y2hpbmcgVm9zcydzIGRpc3RhbnQgZmlndXJlIGZpbmFsbHkgdHVybiBhd2F5LiAnSGUgY2FuIGZvbGxvdyBhbGwgaGUgbGlrZXMuIFRoaXMgYXRsYXMgaXNuJ3QgaGlzIHRvIHRha2UsIHdoYXRldmVyIGFyZ3VtZW50IGhlIG1ha2VzIGZvciBpdC4nCgpQcml5YSBub2RzIGFwcHJvdmluZ2x5LCB0aG91Z2ggaGVyIGV5ZXMgc3RheSBvbiB0aGUgaG9yaXpvbiBhIG1vbWVudCBsb25nZXIgdGhhbiBzdHJpY3RseSBuZWNlc3NhcnkuICdHb29kLiBKdXN0IOKAlCBrZWVwIHlvdXIgZ3VhcmQgdXAgcmVnYXJkbGVzcy4gUGVyc2lzdGVudCBwZW9wbGUgbGlrZSBoaW0gZG9uJ3QgdXN1YWxseSBnaXZlIHVwIG9uIHRoZSBmaXJzdCBuby4n',
            'ending' => true,
        ],
        '8_end_unsettled' => [
            'prose'  => 'J0hvbmVzdGx5LCBoaXMgcGVyc2lzdGVuY2UgdW5zZXR0bGVzIG1lIGEgbGl0dGxlLCcgeW91IGFkbWl0LCB3YXRjaGluZyBWb3NzJ3MgZmlndXJlIGZpbmFsbHkgcmVjZWRlIGludG8gdGhlIHBsYXRlYXUncyB2YXN0LCB0aGluLWFpcmVkIGRpc3RhbmNlLiAnRmVlbHMgbGlrZSB0aGlzIGpvdXJuZXkganVzdCBwaWNrZWQgdXAgYSBzaGFkb3cgaXQgZGlkbid0IGhhdmUgYmVmb3JlLicKClByaXlhIGRvZXNuJ3QgZGlzbWlzcyB0aGUgd29ycnkuICdGYWlyLiBIZSdzIG5vdCBkYW5nZXJvdXMsIGZhciBhcyBJIGtub3cg4oCUIGp1c3QgcmVsZW50bGVzcy4gS2VlcCB5b3VyIHdpdHMgYWJvdXQgeW91LCBhbmQgd2UnbGwgbWFuYWdlIGhpbSBzYW1lIGFzIHdlIG1hbmFnZSBldmVyeXRoaW5nIGVsc2UuJyBUaGUgcGxhdGVhdSdzIGltcG9zc2libHkgY2xlYXIgc2t5IHdoZWVscyBvdmVyaGVhZCBhcyB0aGUgUXVpZXQgSG91ciBsaWZ0cyBjYXJlZnVsbHkgYXdheSBpbnRvIHRoZSB0aGluLCBjb2xkIGFpci4=',
            'ending' => true,
        ],
    ],
];
