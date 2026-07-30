<?php
return [
    'id'    => 24,
    'title' => 'A Meal, Made, And Shared',
    'color' => '#D4762A',

    'pages' => [
        '1_start' => [
            'prose'  => 'TmFwbGVzIHJpc2VzIGFyb3VuZCB0aGUgYmF5IGV4YWN0bHkgYXMgaXQgYWx3YXlzIGhhcywgSXJpcydzIG9sZCBraXRjaGVuIHdhaXRpbmcgYXQgdGhlIGVuZCBvZiBhIHN0cmVldCB5b3UgY291bGQgcHJvYmFibHkgd2FsayBibGluZGZvbGRlZCBieSBub3csIGV2ZXJ5IHNwaWNlIHRoaXMgd2hvbGUgam91cm5leSBkZW1hbmRlZCBmaW5hbGx5IGdhdGhlcmVkIGFuZCBjYXJyaWVkIGhvbWUuIEJydW5vIGhvdmVycyBhdCB0aGUgZG9vciBhIG1vbWVudCBiZWZvcmUgYWN0dWFsbHkgZ29pbmcgaW4sIG9kZGx5IG5lcnZvdXMgZm9yIHRoZSBmaXJzdCB0aW1lIHNpbmNlIHlvdSBzdGFydGVkLgoKJ0ZlZWxzIGRpZmZlcmVudCwgd2Fsa2luZyBiYWNrIGluIHdpdGggZXZlcnl0aGluZyBhY3R1YWxseSBmaW5pc2hlZCwnIGhlIGFkbWl0cy4gJ1NoYWxsIHdlPyc=',
            'choices' => [
                ['text' => 'R28gaW5zaWRlIHRvZ2V0aGVy', 'next' => '2_shared'],
            ],
        ],
        '2_shared' => [
            'prose'  => 'VGhlIGtpdGNoZW4gaXMgZXhhY3RseSBhcyBpdCdzIGFsd2F5cyBiZWVuIOKAlCB3b3JuIGNvdW50ZXJ0b3BzLCB0aGUgc3BpY2UgYm94IGl0c2VsZiBzaXR0aW5nIGluIGl0cyBvbGQgcGxhY2UsIFBpbSB3YWRkbGluZyBvdmVyIHdpdGggdGhlIHNhbWUgb3BpbmlvbmF0ZWQgaW5kaWduYXRpb24gaGUncyBzaG93biB0aGUgZW50aXJlIHRyaXAsIGFzIGlmIHBlcnNvbmFsbHkgb2ZmZW5kZWQgaXQgdG9vayB5b3UgdGhpcyBsb25nIHRvIGdldCBiYWNrLiBZb3Ugc2V0IGV2ZXJ5IGdhdGhlcmVkIHNwaWNlIG91dCBvbiB0aGUgY291bnRlciwgb25lIGFmdGVyIGFub3RoZXIsIHRoZSB3aG9sZSBzY2F0dGVyZWQgbWFwIG9mIHRoZSBsYXN0IG1vbnRocyBmaW5hbGx5IGFzc2VtYmxlZCBpbiBvbmUgcGxhY2UuCgpCcnVubyBsb29rcyBhdCB0aGUgZnVsbCBzcHJlYWQgZm9yIGEgbG9uZywgcXVpZXQgbW9tZW50LiAnVGhhdCdzIGV2ZXJ5dGhpbmcuIEV2ZXJ5IHNpbmdsZSBwaWVjZS4n',
            'choices' => [
                ['text' => 'QmVnaW4gY29va2luZw==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WW91IGJlZ2luIGNvb2tpbmcgcHJvcGVybHksIHRoZSByZWNpcGUgY2FyZCBwcm9wcGVkIG9wZW4gYmVzaWRlIHlvdSwgZXZlcnkgc3BpY2UgbWVhc3VyZWQgb3V0IGluIHRoZSBvcmRlciB0aGUgd2hvbGUgam91cm5leSB0YXVnaHQgeW91LCBldmVyeSB0ZWNobmlxdWUg4oCUIHRoZSByZXN0aW5nIHRpbWUsIHRoZSBwYXRpZW5jZSwgdGhlIGV4YWN0IHJhdGlvcyDigJQgZmluYWxseSBicm91Z2h0IHRvZ2V0aGVyIGluIElyaXMncyBvd24ga2l0Y2hlbiBmb3IgdGhlIGZpcnN0IHRpbWUgaW4gYSBnZW5lcmF0aW9uLiBCcnVubyB3b3JrcyBhbG9uZ3NpZGUgeW91IHdpdGhvdXQgYmVpbmcgYXNrZWQsIGNob3BwaW5nLCBzdGlycmluZywgcHJlc2VudCBpbiBhIHdheSB0aGF0IGZlZWxzIGxpa2UgbW9yZSB0aGFuIGp1c3QgaGVscC4KClRoZSBraXRjaGVuIGZpbGxzIHNsb3dseSB3aXRoIGEgc21lbGwgdGhhdCBmZWVscywgdW5taXN0YWthYmx5LCBsaWtlIGNvbWluZyBob21lLg==',
            'terminal' => true,
            'choices' => [
                ['text' => 'TGV0IHRoZSBkaXNoIGZpbmlzaCBwcm9wZXJseQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGRpc2ggcmVzdHMgZXhhY3RseSBhcyBsb25nIGFzIGl0IG5lZWRzIHRvLCBPZGlsZSdzIGxlc3NvbiBmaW5hbGx5IHBheWluZyBvdXQgaW4gZnVsbCwgdGhlIHdob2xlIGtpdGNoZW4gaG9sZGluZyBpdHMgYnJlYXRoIHRoZSB3YXkgYSBraXRjaGVuIGRvZXMgcmlnaHQgYmVmb3JlIHNvbWV0aGluZyBpbXBvcnRhbnQgaXMgZmluYWxseSwgcHJvcGVybHkgcmVhZHkuIFdoZW4geW91IGZpbmFsbHkgdGFzdGUgaXQsIHNwb29uIHRyZW1ibGluZyBzbGlnaHRseSBpbiB5b3VyIG93biBoYW5kLCBpdCdzIGV4YWN0bHkgcmlnaHQg4oCUIGV2ZXJ5IHNwaWNlIGVhcm5lZCwgZXZlcnkgZmFtaWx5IHdobyB0YXVnaHQgeW91IHNvbWV0aGluZyBmb2xkZWQgcXVpZXRseSBpbnRvIHRoZSBvbmUgZGlzaC4KCkJydW5vIHRhc3RlcyBpdCB0b28sIGFuZCBnb2VzIHZlcnkgc3RpbGwu',
            'choices' => [
                ['text' => 'V2F0Y2ggaGlzIHJlYWN0aW9u', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'J1RoYXQncyBpdCwnIGhlIHNheXMgcXVpZXRseSwgZXllcyBicmlnaHQuICdUaGF0J3MgZXhhY3RseSBpdC4gSSBoYXZlbid0IHRhc3RlZCB0aGF0IHNpbmNlIHNoZSB3YXMgc3RpbGwgc3RhbmRpbmcgcmlnaHQgd2hlcmUgeW91IGFyZSBub3cuJyBIZSBkb2Vzbid0IHRyeSB0byBoaWRlIGhvdyBtdWNoIGl0J3MgbW92ZWQgaGltLCBhbmQgeW91IGRvbid0IGFzayBoaW0gdG8uIFBpbSwgZW50aXJlbHkgdW5ib3RoZXJlZCBieSB0aGUgZW1vdGlvbiwgc2ltcGx5IGRlbWFuZHMgaGlzIG93biBzaGFyZSB3aXRoIGNoYXJhY3RlcmlzdGljIGJsdW50bmVzcy4KCllvdSBzZXJ2ZSBoaW0gYSBzbWFsbCBwb3J0aW9uLCB3aGljaCBoZSBhY2NlcHRzIHdpdGggaW1tZWRpYXRlLCBncnVkZ2luZyBhcHByb3ZhbC4=',
            'choices' => [
                ['text' => 'U2V0IHRoZSB0YWJsZSBwcm9wZXJseQ==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IHNldCB0aGUgdGFibGUgdGhlIHdheSBJcmlzIGFsd2F5cyBkaWQsIHBsYXRlcyB0aGF0IGhhdmVuJ3QgYmVlbiB1c2VkIHRvZ2V0aGVyIGluIHRoaXMgZXhhY3QgY29tYmluYXRpb24gZm9yIHllYXJzLCB0aGUgd2hvbGUga2l0Y2hlbiBhcnJhbmdlZCBmb3IgYSBtZWFsIG1lYW50IHRvIGFjdHVhbGx5IGJlIHNoYXJlZCByYXRoZXIgdGhhbiBlYXRlbiBhbG9uZSBvdmVyIGEgY291bnRlci4gQnJ1bm8gc2l0cyBhY3Jvc3MgZnJvbSB5b3UsIGFuZCBmb3IgYSBtb21lbnQgbmVpdGhlciBvZiB5b3Ugc2F5cyBhbnl0aGluZyBhdCBhbGwsIGxldHRpbmcgdGhlIGRpc2ggYW5kIHRoZSByb29tIGFuZCB0aGUgd2hvbGUgZmluaXNoZWQgam91cm5leSBzaW1wbHkgZXhpc3QgdG9nZXRoZXIuCgonU2hlJ2QgYmUgc28gZ2xhZCwnIEJydW5vIGZpbmFsbHkgc2F5cy4gJ05vdCBqdXN0IHRoYXQgeW91IGZpbmlzaGVkIGl0LiBUaGF0IHlvdSBicm91Z2h0IGl0IGJhY2sgaGVyZSwgdG8gYWN0dWFsbHkgYmUgZWF0ZW4uIFRoYXQgd2FzIGFsd2F5cyB0aGUgcG9pbnQsIEkgdGhpbmsuIE5vdCB0aGUgY29sbGVjdGluZy4gVGhpcy4n',
            'choices' => [
                ['text' => 'RWF0IHRvZ2V0aGVyIHByb3Blcmx5', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGVhdCB0b2dldGhlciBwcm9wZXJseSwgc2xvd2x5LCB0aGUgbWVhbCB0aGF0J3MgdGFrZW4gYW4gZW50aXJlIGpvdXJuZXkgdG8gYXNzZW1ibGUgZmluYWxseSBkb2luZyB0aGUgb25lIHRoaW5nIGl0IHdhcyBhbHdheXMgbWVhbnQgdG8gZG8g4oCUIGZlZWRpbmcgdGhlIHBlb3BsZSBpdCB3YXMgYWN0dWFsbHkgbWVhbnQgdG8gZmVlZCwgaW4gdGhlIGtpdGNoZW4gaXQgd2FzIGFsd2F5cyBtZWFudCB0byBiZSBlYXRlbiBpbi4gTm90aGluZyBmdXJ0aGVyIG5lZWRzIHRvIGJlIHRha2VuIG9yIGdhdGhlcmVkIG9yIGVhcm5lZCB0b25pZ2h0LiBKdXN0IHRoaXM6IGEgbWVhbCwgbWFkZSwgYW5kIHNoYXJlZC4KCkJydW5vIHNldHMgZG93biBoaXMgZm9yayBldmVudHVhbGx5LCBsb29raW5nIGFyb3VuZCB0aGUga2l0Y2hlbiB3aXRoIHNvbWV0aGluZyBsaWtlIHF1aWV0IHdvbmRlci4gJ1doYXQgaGFwcGVucyBub3csIGRvIHlvdSB0aGluaz8gQWZ0ZXIgYWxsIHRoaXM/Jw==',
            'choices' => [
                ['text' => 'U2F5IHRoZSBraXRjaGVuIGRvZXNuJ3QgaGF2ZSB0byBzdGF5IGVtcHR5IGFueW1vcmU=', 'next' => '8_end_full'],
                ['text' => 'U2F5IHlvdSdyZSBub3Qgc3VyZSwgYW5kIHRoYXQgZmVlbHMgb2theSBmb3Igb25jZQ==', 'next' => '8_end_open'],
            ],
        ],
        '8_end_full' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIHRoaW5rIHRoZSBraXRjaGVuIGRvZXNuJ3QgaGF2ZSB0byBzdGF5IGVtcHR5IGFueW1vcmUsJyB5b3Ugc2F5LCBsb29raW5nIGFyb3VuZCBhdCB0aGUgY291bnRlcnMgYW5kIHRoZSBzcGljZSBib3ggYW5kIFBpbSBhbHJlYWR5IGFuZ2xpbmcgZm9yIHNlY29uZHMuICdGZWVscyBsaWtlIGl0J3MgYWN0dWFsbHkgZ290IGEgcmVhc29uIHRvIGJlIHVzZWQgYWdhaW4uIFJlZ3VsYXJseS4gUHJvcGVybHkuIE5vdCBqdXN0IGZvciBvbmUgZW5vcm1vdXMsIG9uY2Utb2ZmIG1lYWwuJwoKQnJ1bm8gc21pbGVzLCB3aWRlIGFuZCB1bmd1YXJkZWQgaW4gYSB3YXkgeW91IGhhdmVuJ3QgcXVpdGUgc2VlbiBmcm9tIGhpbSBiZWZvcmUuICdJJ2QgbGlrZSB0aGF0LiBWZXJ5IG11Y2guIEZlZWxzIGxpa2UgZXhhY3RseSB0aGUgZW5kaW5nIHNoZSdkIGhhdmUgd2FudGVkIOKAlCBub3QgYW4gZW5kaW5nIGF0IGFsbCwgcmVhbGx5LiBKdXN0IGEga2l0Y2hlbiwgcHJvcGVybHksIGZpbmFsbHksIGFsaXZlIGFnYWluLicgT3V0c2lkZSwgTmFwbGVzIHNldHRsZXMgaW50byBldmVuaW5nIGFyb3VuZCB0aGUgYmF5LCB0aGUgd2hvbGUgbG9uZyBqb3VybmV5IGZvbGRpbmcgcXVpZXRseSwgY29tcGxldGVseSwgaW50byB0aGlzIG9uZSBmdWxsLCBzaGFyZWQgdGFibGUu',
            'ending' => true,
        ],
        '8_end_open' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ20gbm90IHN1cmUgd2hhdCBoYXBwZW5zIG5vdywnIHlvdSBhZG1pdCwgdHVybmluZyB5b3VyIGZvcmsgc2xvd2x5LCAnYW5kIGZvciBvbmNlIHRoYXQgZmVlbHMgb2theSByYXRoZXIgdGhhbiBmcmlnaHRlbmluZy4gRXZlcnl0aGluZyBiZWZvcmUgdGhpcyBoYWQgYSBkZXN0aW5hdGlvbi4gTWF5YmUgdGhpcyBwYXJ0IGRvZXNuJ3QgbmVlZCBvbmUgc3RyYWlnaHQgYXdheS4nCgpCcnVubyBjb25zaWRlcnMgdGhhdCwgdGhlbiBub2RzIHNsb3dseS4gJ0ZhaXIgZW5vdWdoLiBNYXliZSB0aGUgbm90LWtub3dpbmcgaXMgYWxsb3dlZCB0byBqdXN0IHNpdCBoZXJlIGEgd2hpbGUsIHNhbWUgYXMgd2UgYXJlLicgSGUgbG9va3MgYXJvdW5kIHRoZSBraXRjaGVuIG9uY2UgbW9yZSwgd2FybSBhbmQgdW5odXJyaWVkLiAnV2hhdGV2ZXIgY29tZXMgbmV4dCwgdGhpcyBwYXJ0IOKAlCB0b25pZ2h0LCB0aGlzIHRhYmxlIOKAlCB0aGlzIHBhcnQgd2FzIGFsd2F5cyBnb2luZyB0byBiZSBlbm91Z2ggb24gaXRzIG93bi4nIE91dHNpZGUsIE5hcGxlcyBzZXR0bGVzIGludG8gZXZlbmluZyBhcm91bmQgdGhlIGJheSwgdGhlIHdob2xlIGxvbmcgam91cm5leSBmb2xkaW5nIHF1aWV0bHkgaW50byB0aGlzIG9uZSBzaGFyZWQsIHVuZmluaXNoZWQsIGVudGlyZWx5IHN1ZmZpY2llbnQgbW9tZW50Lg==',
            'ending' => true,
        ],
    ],
];
