<?php
return [
    'id'    => 11,
    'title' => 'One Thin Ring of Land',
    'color' => '#2A6A8A',

    'pages' => [
        '1_start' => [
            'prose'  => 'T250b25nIEphdmEgZG9lc24ndCBsb29rIHJlYWwgZnJvbSB0aGUgYWlyIOKAlCBhIHRoaW4gcmluZyBvZiBtb3R1IHNjYXR0ZXJlZCBhcm91bmQgYSBsYWdvb24gc28gd2lkZSB0aGUgZmFyIHNpZGUgbmV2ZXIgcXVpdGUgY29tZXMgaW50byB2aWV3LCBvbmUgb2YgdGhlIGxhcmdlc3QgYXRvbGxzIG9uIEVhcnRoIHdyYXBwZWQgYXJvdW5kIHdhdGVyIHRoYXQgY291bGQgc3dhbGxvdyBhIHNtYWxsIGNvdW50cnkuIFNvbGFuZ2UgZXhwbGFpbnMsIG9uIHRoZSBhcHByb2FjaCwgdGhhdCB0aGUgcGVvcGxlIGhlcmUgc3BlYWsgYSBQb2x5bmVzaWFuIGxhbmd1YWdlIGZvdW5kIG5vd2hlcmUgZWxzZSBpbiB0aGUgU29sb21vbnMsIGFuIGlzbGFuZCBvZiBvbmUgb2NlYW4ncyBjdWx0dXJlIHdhc2hlZCB1cCBkZWVwIGluc2lkZSBhbm90aGVyJ3MsIGFuZCBoYXZlIGJlZW4gd2VhdmluZyBhIHBhcnRpY3VsYXIgc3R5bGUgb2Ygc2FpbC1tYXQgc2luY2UgbG9uZyBiZWZvcmUgYW55b25lIHdhcyB3cml0aW5nIGFueSBvZiBpdCBkb3duLgoKVHdvIHdheXMgYWNyb3NzIHRoZSBsYWdvb24gdG93YXJkIHRoZSBtYWluIHNldHRsZW1lbnQgcHJlc2VudCB0aGVtc2VsdmVzOiBwYWRkbGluZyB0aGUgZGlyZWN0IGxpbmUgaW4gYSBib3Jyb3dlZCBvdXRyaWdnZXIsIG9yIHdhbGtpbmcgdGhlIHJlZWYgZmxhdCBhdCBsb3cgdGlkZSwgbW90dSB0byBtb3R1LCB0aGUgbG9uZyB3YXkgcm91bmQu',
            'choices' => [
                ['text' => 'UGFkZGxlIHRoZSBkaXJlY3QgbGluZQ==', 'next' => '2_paddle'],
                ['text' => 'V2FsayB0aGUgcmVlZiBmbGF0', 'next' => '2_reef'],
            ],
        ],
        '2_paddle' => [
            'prose'  => 'VGhlIGRpcmVjdCBjcm9zc2luZyBpcyBmYXN0IGFuZCBleHBvc2VkLCB0aGUgbGFnb29uJ3Mgd2luZCBwaWNraW5nIHVwIHN0ZWFkaWx5IGFzIHRoZSBtb3JuaW5nIGdvZXMgb24gdW50aWwgdGhlIG91dHJpZ2dlcidzIHNsYXBwaW5nIGEgcmh5dGhtIGFnYWluc3QgdGhlIGNob3AgdGhhdCBrZWVwcyBjb252ZXJzYXRpb24gdG8gc2hvdXRlZCBmcmFnbWVudHMuIFNvbGFuZ2UgaGFuZGxlcyB0aGUgbGl0dGxlIGNhbm9lIHdpdGggdGhlIHNhbWUgdW5ib3RoZXJlZCBjb21wZXRlbmNlIHNoZSBicmluZ3MgdG8gdGhlIEvFjXR1a3UsIHJlYWRpbmcgdGhlIHdhdGVyIHRoZSB3YXkgc2hlIHJlYWRzIHdlYXRoZXIuCgpZb3UgcmVhY2ggdGhlIHNldHRsZW1lbnQgd2luZC1zY291cmVkIGFuZCBzYWx0LWNydXN0ZWQsIHRoZSB3aG9sZSBjcm9zc2luZyBoYXZpbmcgdGFrZW4gYmFyZWx5IGFuIGhvdXIsIGFuZCBhcmUgZ3JlZXRlZCBhdCB0aGUgbGFuZGluZyBieSBhIHdvbWFuIG1lbmRpbmcgYSBsZW5ndGggb2Ygd292ZW4gbWF0dGluZyB3aG8gbG9va3MgZW50aXJlbHkgdW5zdXJwcmlzZWQgdGhhdCBhbnlvbmUgd291bGQgYXJyaXZlIGxvb2tpbmcgbGlrZSB0aGF0Lg==',
            'choices' => [
                ['text' => 'SW50cm9kdWNlIHlvdXJzZWx2ZXM=', 'next' => '3_shared'],
            ],
        ],
        '2_reef' => [
            'prose'  => 'VGhlIHJlZWYtZmxhdCByb3V0ZSB0YWtlcyBtb3N0IG9mIHRoZSBsb3cgdGlkZSB3aW5kb3csIG1vdHUgdG8gbW90dSBhY3Jvc3MgY29yYWwgaGFyZHBhbiBhbmQgc2hhbGxvdyBwb29scyBhbGl2ZSB3aXRoIHRoaW5ncyB0aGF0IGRhcnQgYXdheSBmcm9tIGV2ZXJ5IGZvb3RzdGVwLCB0aGUgbGFnb29uIHN0cmV0Y2hpbmcgZmxhdCBhbmQgZW5vcm1vdXMgb24gb25lIHNpZGUgdGhlIHdob2xlIHdheS4gSXQncyBzbG93ZXIsIHN1bi1zY291cmVkIHJhdGhlciB0aGFuIHdpbmQtc2NvdXJlZCwgYW5kIGdpdmVzIHlvdSB0aW1lIHRvIGFjdHVhbGx5IHRha2UgaW4gdGhlIHNjYWxlIG9mIHRoZSBwbGFjZSwgcmluZyBhZnRlciByaW5nIG9mIGxvdyBncmVlbiBpc2xldHMgd2l0aCBub3RoaW5nIGJ1dCB3YXRlciBiZXR3ZWVuIHRoZW0gYW5kIHRoZSBob3Jpem9uLgoKWW91IHJlYWNoIHRoZSBzZXR0bGVtZW50IGp1c3QgYXMgdGhlIHRpZGUgc3RhcnRzIHRvIHR1cm4sIGFuZCBhIHdvbWFuIG1lbmRpbmcgYSBsZW5ndGggb2Ygd292ZW4gbWF0dGluZyBhdCB0aGUgc2hvcmUncyBlZGdlIGxvb2tzIHVwLCBlbnRpcmVseSB1bnN1cnByaXNlZCwgYXMgdGhvdWdoIHNoZSdkIGJlZW4gd2F0Y2hpbmcgeW91ciBzbG93IHByb2dyZXNzIGFjcm9zcyBoYWxmIHRoZSBsYWdvb24gdGhlIHdob2xlIHdheS4=',
            'choices' => [
                ['text' => 'SW50cm9kdWNlIHlvdXJzZWx2ZXM=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'U2hlIGtub3dzIEF1bnRpZSdzIG5hbWUgdGhlIHdheSBldmVyeW9uZSBvbiB0aGlzIHdob2xlIG9jZWFuIHNlZW1zIHRvIOKAlCBpbW1lZGlhdGVseSwgd2FybWx5LCB3aXRoIGEgc21hbGwgcHJpdmF0ZSBsb29rIHRoYXQgc2F5cyB0aGVyZSdzIGhpc3RvcnkgaGVyZSBzaGUgaXNuJ3QgcmVxdWlyZWQgdG8gZXhwbGFpbiB0byB5b3UgdG9kYXkuICdTaGUgc2FpbGVkIHdpdGggYSBtYXQgSSBtYWRlIGhlciwnIHRoZSB3b21hbiBzYXlzLiAnR29vZCBzYWlsLiBMYXN0ZWQgeWVhcnMsIHNoZSB0b2xkIG1lLCBpbiBhIGxldHRlciBJIHN0aWxsIGhhdmUgc29tZXdoZXJlLicKClNoZSBob2xkcyB1cCB0aGUgaGFsZi1maW5pc2hlZCBtYXR0aW5nIGluIGhlciBsYXAuICdUaGlzIG9uZSdzIG5vdCBmb3Igc2FpbGluZyB5ZXQuIE5lZWRzIG1vcmUgaGFuZHMgdGhhbiBtaW5lLCBpZiB5b3Ugd2FudCBpdCBmaW5pc2hlZCBiZWZvcmUgeW91IGhhdmUgdG8gZ28uJw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'T2ZmZXIgdG8gaGVscA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIHdvcmsgc3BsaXRzIG5hdHVyYWxseSBpbiB0d286IHNvbWVvbmUgbmVlZHMgdG8ga2VlcCBzdHJpcHBpbmcgYW5kIHByZXBhcmluZyBmcmVzaCBwYW5kYW51cyBsZWFmIGZvciB3ZWF2aW5nLCBhbmQgc29tZW9uZSBuZWVkcyB0byBhY3R1YWxseSBzaXQgd2l0aCBoZXIgYW5kIGxlYXJuIHRoZSB3ZWF2ZSBpdHNlbGYsIHdoaWNoIHNoZSdzIGNsZWFybHkgcmVsdWN0YW50IHRvIHRydXN0IHRvIHVucHJhY3Rpc2VkIGhhbmRzIHdpdGhvdXQgc3VwZXJ2aXNpb24uCgonV2hpY2hldmVyIHN1aXRzIHlvdSwnIHNoZSBzYXlzLCBhbHJlYWR5IHNvcnRpbmcgbGVhdmVzIHdpdGhvdXQgd2FpdGluZyBmb3IgYW4gYW5zd2VyLiAnQm90aCBnZXQgZG9uZSBlaXRoZXIgd2F5LiBKdXN0IGRlcGVuZHMgd2hpY2ggb25lIHlvdSBsZWFybiBzb21ldGhpbmcgYWJvdXQuJw==',
            'choices' => [
                ['text' => 'UHJlcGFyZSB0aGUgcGFuZGFudXMgbGVhZg==', 'next' => '5_prep'],
                ['text' => 'TGVhcm4gdGhlIHdlYXZlIGl0c2VsZg==', 'next' => '5_weave'],
            ],
        ],
        '5_prep' => [
            'prose'  => 'U3RyaXBwaW5nIHBhbmRhbnVzIGxlYWYgdG8gdGhlIHJpZ2h0IHdpZHRoIGFuZCBzb2Z0bmVzcyB0dXJucyBvdXQgdG8gYmUgaXRzIG93biBzbWFsbCBkaXNjaXBsaW5lLCB0aGUgbGVhZiBlaXRoZXIgc3BsaXR0aW5nIGNsZWFuIG9yIHRlYXJpbmcgcmFnZ2VkIGRlcGVuZGluZyBvbiBhbiBhbmdsZSB5b3Ugb25seSBmaW5kIGJ5IGdldHRpbmcgaXQgd3JvbmcgYSBkb3plbiB0aW1lcyBmaXJzdC4gVGhlIHdvbWFuIGNoZWNrcyB5b3VyIHBpbGUgcGVyaW9kaWNhbGx5IHdpdGhvdXQgY29tbWVudCwgd2hpY2ggeW91IGV2ZW50dWFsbHkgZGVjaWRlIG1lYW5zIHlvdSdyZSBkb2luZyBpdCBhY2NlcHRhYmx5LgoKVGhlIEJhcm9uLCBwZXJjaGVkIG5lYXJieSwgb2ZmZXJzIGluY3JlYXNpbmdseSBlbGFib3JhdGUgdGhlb3JpZXMgYWJvdXQgcGFuZGFudXMgbGVhZiBxdWFsaXR5IHRoYXQgdGhlIHdvbWFuIGxpc3RlbnMgdG8gd2l0aCB0aGUgcGF0aWVudCwgZmFpbnRseSBhbXVzZWQgYXR0ZW50aW9uIG9mIHNvbWVvbmUgaHVtb3VyaW5nIGEgdmVyeSBjb25maWRlbnQgY2hpbGQu',
            'choices' => [
                ['text' => 'V2F0Y2ggdGhlIG1hdCBjb21lIHRvZ2V0aGVy', 'next' => '6_shared'],
            ],
        ],
        '5_weave' => [
            'prose'  => 'VGhlIHdlYXZlIGl0c2VsZiBpcyBmYXN0IHVuZGVyIGhlciBoYW5kcyBhbmQgcGFpbmZ1bGx5IHNsb3cgdW5kZXIgeW91cnMsIHRoZSBwYXR0ZXJuIGxvY2tpbmcgdG9nZXRoZXIgaW4gYSByaHl0aG0gc2hlIGRvZXNuJ3Qgc2VlbSB0byB0aGluayBhYm91dCBhdCBhbGwgYW5kIHlvdSBoYXZlIHRvIHRoaW5rIGFib3V0IGNvbnN0YW50bHkuIFNoZSBjb3JyZWN0cyB5b3UgdHdpY2UsIGdlbnRseSwgYnkgc2ltcGx5IHVuZG9pbmcgYSByb3cgYW5kIGhhdmluZyB5b3UgcmVkbyBpdCwgbm8gY29tbWVudCBhdHRhY2hlZCBiZXlvbmQgdGhlIGNvcnJlY3Rpb24gaXRzZWxmLgoKQnkgdGhlIHRoaXJkIHJvdyB5b3UndmUgbW9zdGx5IHN0b3BwZWQgbWFraW5nIHRoZSBzYW1lIG1pc3Rha2UsIHdoaWNoIHNoZSBhY2tub3dsZWRnZXMgd2l0aCB0aGUgc21hbGxlc3QgcG9zc2libGUgbm9kLCB0aGUgd2VhdmVyJ3MgZXF1aXZhbGVudCwgeW91IHN1c3BlY3QsIG9mIGdlbnVpbmUgcHJhaXNlLg==',
            'choices' => [
                ['text' => 'V2F0Y2ggdGhlIG1hdCBjb21lIHRvZ2V0aGVy', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QmV0d2VlbiB0aGUgbGVhZiB5b3UgcHJlcGFyZWQgYW5kIHRoZSByb3dzIHlvdSBoZWxwZWQgd2VhdmUsIHRoZSBtYXQgY29tZXMgdG9nZXRoZXIgZmFzdGVyIHRoYW4gc2hlIGV4cGVjdGVkLCBmaW5pc2hlZCB3ZWxsIGJlZm9yZSB0aGUgdGlkZSdzIGZ1bGx5IHR1cm5lZC4gU2hlIGhvbGRzIGl0IHVwIHRvIHRoZSBsaWdodCwgY2hlY2tpbmcgaXQgdGhlIHdheSBhbnlvbmUgY2hlY2tzIHRoZWlyIG93biB3b3JrIGF0IHRoZSBlbmQsIHRoZW4gZm9sZHMgaXQgYW5kIGhhbmRzIGl0IG92ZXIgd2l0aG91dCBjZXJlbW9ueS4KCidTYWlsIHBhdGNoLCBpZiB5b3UgZXZlciBuZWVkIG9uZSBvdXQgdGhlcmUsJyBzaGUgc2F5cy4gJ1doaWNoIHlvdSB3aWxsLCBldmVudHVhbGx5LCBldmVyeW9uZSBkb2VzLiBCZXR0ZXIgdG8gaGF2ZSBpdCBhbmQgbm90IG5lZWQgaXQuJyBTaGUgc2F5cyBpdCBsaWtlIGFkdmljZSBzaGUncyBnaXZlbiBiZWZvcmUsIHRvIHNvbWVvbmUgZWxzZSwgYSBsb25nIHRpbWUgYWdvLCBhbmQgbWVhbnMgZXZlcnkgd29yZCBvZiBpdCBmcmVzaCByZWdhcmRsZXNzLg==',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIHByb3Blcmx5', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHRoYW5rIGhlciB0aGUgd2F5IHNoZSBzZWVtcyB0byBhY3R1YWxseSB3YW50IHRvIGJlIHRoYW5rZWQg4oCUIHBsYWlubHksIHdpdGhvdXQgZXhjZXNzLCB0aGUgd2F5IHlvdSdkIHRoYW5rIHNvbWVvbmUgZm9yIHNvbWV0aGluZyBvcmRpbmFyeSBhbmQgZXNzZW50aWFsIHJhdGhlciB0aGFuIHNvbWV0aGluZyByYXJlLiBTaGUgYWNjZXB0cyBpdCB0aGUgc2FtZSB3YXksIGEgc2hvcnQgbm9kLCBhbHJlYWR5IHR1cm5pbmcgYmFjayB0byBoZXIgb3duIHVuZmluaXNoZWQgd29yayBiZWZvcmUgeW91J3ZlIGZ1bGx5IHR1cm5lZCB0byBnby4KClRoZSB3YWxrLCBvciB0aGUgcGFkZGxlLCBiYWNrIGFjcm9zcyB0aGUgbGFnb29uIGZlZWxzIHNob3J0ZXIgdGhhbiB0aGUgb25lIHRoYXQgYnJvdWdodCB5b3UgaGVyZSwgdGhlIG1hdCByaWRpbmcgZm9sZGVkIGluIHRoZSBzYXRjaGVsIG5leHQgdG8gdGhlIGZvc3NpbCBjaHVuaywgdHdvIHZlcnkgZGlmZmVyZW50IGtpbmRzIG9mIG9sZCBzaXR0aW5nIHNpZGUgYnkgc2lkZS4=',
            'choices' => [
                ['text' => 'TG9vayBiYWNrIGF0IHRoZSBzZXR0bGVtZW50IHVudGlsIGl0J3Mgb3V0IG9mIHNpZ2h0', 'next' => '8_end_look'],
                ['text' => 'RmFjZSBmb3J3YXJkIHRvd2FyZCB0aGUgbmV4dCBob3Jpem9u', 'next' => '8_end_forward'],
            ],
        ],
        '8_end_look' => [
            'prose'  => 'WW91IGxvb2sgYmFjayB0aGUgd2hvbGUgd2F5LCB0aGUgc2V0dGxlbWVudCBhbmQgaXRzIHJpbmcgb2YgbW90dSBzaHJpbmtpbmcgc2xvd2x5IGJlaGluZCB5b3UgdW50aWwgdGhlIGxhZ29vbiBzd2FsbG93cyB0aGUgZGV0YWlsIGFuZCBsZWF2ZXMgb25seSBhIGdyZWVuIHNtdWRnZSBhZ2FpbnN0IGJsdWUgb24gYmx1ZSBvbiBibHVlLiBUaGVyZSdzIHNvbWV0aGluZyBpbiBPbnRvbmcgSmF2YSdzIHNjYWxlIOKAlCBhbGwgdGhhdCB3YXRlciwgdGhhdCBvbmUgdGhpbiByaW5nIG9mIGxhbmQgaG9sZGluZyBvbiBhcm91bmQgdGhlIGVkZ2Ugb2YgaXQg4oCUIHRoYXQgZmVlbHMgd29ydGggd2F0Y2hpbmcgZm9yIGFzIGxvbmcgYXMgaXQgc3RheXMgdmlzaWJsZS4KClRoZSBCYXJvbiwgdW51c3VhbGx5LCB3YXRjaGVzIHdpdGggeW91IGluIHNpbGVuY2UsIGZvciBvbmNlIGVudGlyZWx5IHdpdGhvdXQgY29tbWVudGFyeSwgYXMgdGhvdWdoIGV2ZW4gaGUgdW5kZXJzdGFuZHMgdGhhdCBzb21lIHZpZXdzIGRvbid0IG5lZWQgbmFycmF0aW5nLg==',
            'ending' => true,
        ],
        '8_end_forward' => [
            'prose'  => 'WW91IGRvbid0IGxvb2sgYmFjaywgbm90IG91dCBvZiBpbmRpZmZlcmVuY2UgYnV0IGJlY2F1c2UgdGhlIGhvcml6b24gYWhlYWQgaGFzIGl0cyBvd24gcHVsbCB0b2RheSwgYW5kIE9udG9uZyBKYXZhLCBoYXZpbmcgZ2l2ZW4gd2hhdCBpdCBoYWQgdG8gZ2l2ZSwgZG9lc24ndCBuZWVkIHlvdSB3YXRjaGluZyBpdCByZWNlZGUgdG8ga25vdyBpdCBtYXR0ZXJlZC4KClRoZSBLxY10dWt1IG5vc2VzIG91dCBvdmVyIG9wZW4gd2F0ZXIsIGxhZ29vbiBhbmQgcmVlZiBhbmQgcmluZyBvZiBtb3R1IGFscmVhZHkgYmVoaW5kIGFuZCBhbHJlYWR5LCBpbiB0aGUgcGFydGljdWxhciB3YXkgb2YgdGhpcyB3aG9sZSBsb25nIGpvdXJuZXksIGJlY29taW5nIGEgcGxhY2UgeW91IGNhcnJ5IHJhdGhlciB0aGFuIGEgcGxhY2UgeW91J3JlIHN0aWxsIHN0YW5kaW5nIGluLiBTb2xhbmdlIHBvdXJzIGhlciBydW0gdGhhdCBldmVuaW5nIGFuZCBzYXlzLCBhcHJvcG9zIG9mIG5vdGhpbmcsICdHb29kIG1hdCwgdGhhdC4nIEl0J3MgdGhlIG9ubHkgcmV2aWV3IHRoZSB3aG9sZSBzdG9wIGdldHMsIGFuZCBpdCdzIGVudGlyZWx5IHN1ZmZpY2llbnQu',
            'ending' => true,
        ],
    ],
];
