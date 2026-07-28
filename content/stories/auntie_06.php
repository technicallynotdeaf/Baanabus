<?php
return [
    'id'    => 6,
    'title' => 'The Man at Neither Door',
    'color' => '#4A6B3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'RnV0dW5hIHJpc2VzIG91dCBvZiBibHVlIHdhdGVyIGluIG9uZSBzdGVlcCBncmVlbiBtYXNzLCB2b2xjYW5pYyBhbmQgZm9sZGVkLCB3aXRoIGEgd2hpdGUgYmFzaWxpY2Egcm9vZiBjYXRjaGluZyB0aGUgbGlnaHQgZnJvbSB0aGUgc2hvcmVsaW5lIOKAlCB0aGUgc2hyaW5lIGF0IFBvaSwgU29sYW5nZSB0ZWxscyB5b3UsIGJ1aWx0IGZvciBhIG1pc3Npb25hcnkga2lsbGVkIGhlcmUgdHdvIGNlbnR1cmllcyBhZ28gYW5kIG1hZGUgYSBzYWludCBmb3IgaXQsIHRob3VnaCB0aGUgaXNsYW5kJ3Mgb2xkZXIgd2F5cyBuZXZlciBhY3R1YWxseSBsZWZ0OyB0aGV5IGp1c3QgbGVhcm5lZCB0byBzaXQgbmV4dCB0byB0aGUgbmV3IG9uZXMgd2l0aG91dCBtdWNoIGZ1c3MuCgpUaGUgS8WNdHVrdSBtb29ycyBpbiB0aGUgbGVlIG9mIHRoZSBwb2ludCwgYW5kIHRoZSBCYXJvbiwgdW5jaGFyYWN0ZXJpc3RpY2FsbHkgZGlwbG9tYXRpYywgc3VnZ2VzdHMgeW91IOKAmHJlYWQgdGhlIHJvb23igJkgYmVmb3JlIGRvaW5nIGFueXRoaW5nIGVsc2Ug4oCUIGFkdmljZSB5b3UncmUgZmFpcmx5IHN1cmUgaGUncyBuZXZlciBvbmNlIHRha2VuIGhpbXNlbGYuCgpUd28gd2F5cyB1cCBmcm9tIHRoZSBhbmNob3JhZ2UgcHJlc2VudCB0aGVtc2VsdmVzOiB0aGUgbWlzc2lvbiByb2FkIHRvd2FyZCBQb2ksIG9yIGEgdHJhY2sgdGhhdCBjbGltYnMgcGFzdCB0aGUgdGFybyB0ZXJyYWNlcyB0byB0aGUgb2xkZXIgdmlsbGFnZSBvbiB0aGUgcmlkZ2Uu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWlzc2lvbiByb2Fk', 'next' => '2_mission'],
                ['text' => 'Q2xpbWIgdGhlIHRlcnJhY2UgdHJhY2s=', 'next' => '2_village'],
            ],
        ],
        '2_mission' => [
            'prose'  => 'VGhlIG1pc3Npb24gcm9hZCBpcyB3ZWxsIGtlcHQsIHNoYWRlZCwgYW5kIGxlYWRzIHlvdSBwYXN0IHRoZSBiYXNpbGljYSBpdHNlbGYg4oCUIGNvb2wgc3RvbmUsIHF1aWV0LCBhIGhhbmRmdWwgb2YgY2FuZGxlcyBndXR0ZXJpbmcgaW4gdGhlIHNlYSBhaXIuIEEgcHJpZXN0LCBlbGRlcmx5IGFuZCB1bmh1cnJpZWQsIGZpbmRzIHlvdSBiZWZvcmUgeW91IGZpbmQgaGltLCB0aGUgd2F5IHBlb3BsZSB3aG8ndmUgbGl2ZWQgc29tZXdoZXJlIGxvbmcgZW5vdWdoIGFsd2F5cyBzZWVtIHRvLgoKSGUga25vd3MgQXVudGllJ3MgbmFtZSBiZWZvcmUgeW91J3ZlIGZpbmlzaGVkIHNheWluZyBpdC4g4oCYU2hlIHNlbnQgZmxvd2VycyBvbmNlLCBmb3IgdGhlIHNocmluZS4gRnJhbmdpcGFuaSwgSSB0aGluaywgdGhvdWdoIGl0IGhhZCBiZWVuIGRyaWVkIHNvIGxvbmcgaXQgaGFkIGdvbmUgdGhlIGNvbG91ciBvZiB0ZWEu4oCZIEhlIGNvbnNpZGVycyB5b3UgZm9yIGEgbW9tZW50LiDigJhUaGUgbWFuIHlvdSBsaWtlbHkgd2FudCBpc24ndCBoZXJlIHRvZGF5LiBTb21lb25lIHNhaWQgaGUgd2FzIHVwIGF0IHRoZSB0ZXJyYWNlcyB0aGlzIG1vcm5pbmcsIGFza2luZyBhZnRlciB0YXJvIGN1dHRpbmdzLCBvZiBhbGwgdGhpbmdzLuKAmQoKSGUgc2F5cyBpdCBsaWtlIGl0IGV4cGxhaW5zIHNvbWV0aGluZywgdGhvdWdoIGl0IGV4cGxhaW5zIG5vdGhpbmcgYXQgYWxsLg==',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHRlcnJhY2VzIGFmdGVyIGFsbA==', 'next' => '3_shared'],
            ],
        ],
        '2_village' => [
            'prose'  => 'VGhlIHRlcnJhY2UgdHJhY2sgaXMgc3RlZXBlciB0aGFuIGl0IGxvb2tzIGFuZCByZXdhcmRzIHlvdSB3aXRoIGEgdmlldyB3b3J0aCB0aGUgY2FsdmVzIGl0IGNvc3RzIOKAlCBncmVlbiBzaGVsdmVzIG9mIHRhcm8gc3RlcHBpbmcgZG93biB0b3dhcmQgdGhlIHdhdGVyLCB3b3JrZWQgYnkgcGVvcGxlIHdobyBub2Qgd2l0aG91dCBzdG9wcGluZyB3aGF0IHRoZXkncmUgZG9pbmcuCgpBbiBvbGRlciB3b21hbiByZXN0aW5nIGluIHRoZSBzaGFkZSBvZiBhIGJyZWFkZnJ1aXQgdHJlZSByZWNvZ25pc2VzIEF1bnRpZSdzIG5hbWUgdGhlIHdheSBwZW9wbGUgdXAgYW5kIGRvd24gdGhpcyB3aG9sZSBvY2VhbiBzZWVtIHRvLCB3aXRoIGEgc21hbGwgcHJpdmF0ZSBzbWlsZSB0aGF0IHRlbGxzIHlvdSBub3RoaW5nIGFuZCBldmVyeXRoaW5nIGF0IG9uY2UuIOKAmFNoZSB1c2VkIHRvIHdhbGsgcmlnaHQgdXAgaGVyZSBoZXJzZWxmLCBubyBmdXNzIGFib3V0IGl0LuKAmSBBIHBhdXNlLiDigJhZb3Ugd2FudCB0aGUgbWFuIHdobydzIGJlZW4gYXNraW5nIGFib3V0IHNtb2tpbmcgZmlyZXMuIEhlIHdlbnQgZG93biB0b3dhcmQgUG9pIHRoaXMgbW9ybmluZyDigJQgc2FpZCBzb21ldGhpbmcgYWJvdXQgY2FuZGxlcy7igJkKClNoZSBzaHJ1Z3MsIHVuYm90aGVyZWQgYnkgdGhlIGNvbnRyYWRpY3Rpb24sIGFzIHRob3VnaCBldmVyeW9uZSBldmVudHVhbGx5IGdvZXMgd2hlcmV2ZXIgdGhleSdyZSBhY3R1YWxseSBuZWVkZWQgcmVnYXJkbGVzcyBvZiB3aGF0IHRoZXkgc2FpZCBmaXJzdC4=',
            'choices' => [
                ['text' => 'SGVhZCBkb3duIHRvd2FyZCB0aGUgbWlzc2lvbiBhZnRlciBhbGw=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB5b3UgY2FtZSwgdGhlIHN0b3J5J3MgdGhlIHNhbWUgaW4gcmV2ZXJzZTogdGhlIG1pc3Npb24gc2VuZHMgeW91IHRvIHRoZSB0ZXJyYWNlcywgdGhlIHRlcnJhY2VzIHNlbmQgeW91IHRvIHRoZSBtaXNzaW9uLCBhbmQgbmVpdGhlciwgYXBwYXJlbnRseSwgaXMgd2hlcmUgdGhlIG1hbiBpbiBxdWVzdGlvbiBjdXJyZW50bHkgc3RhbmRzLgoKU29sYW5nZSwgd2hvIGhhcyBjbGVhcmx5IHNlZW4gdGhpcyBwYXJ0aWN1bGFyIHJ1bmFyb3VuZCBiZWZvcmUsIGRvZXNuJ3QgbG9vayByZW1vdGVseSBzdXJwcmlzZWQuIOKAmEhlIGRvZXMgdGhpcyzigJkgc2hlIHNheXMuIOKAmFNlbmRzIGV2ZXJ5b25lIGNoYXNpbmcgaGltIGluIGEgY2lyY2xlIGFuZCBlbmRzIHVwIHdoZXJldmVyIHRoZSBhY3R1YWwgd29yayBpcy7igJkgU2hlIG5vZHMgdG93YXJkIGEgdGhyZWFkIG9mIHBhbGUgc21va2UgcmlzaW5nIGZyb20gdGhlIHNob3JlIGJlbG93LCB0dWNrZWQgYmV0d2VlbiB0d28gaG91c2VzIHlvdSBoYWRuJ3Qgbm90aWNlZC4g4oCYU21va2Vob3VzZS4gVHJ5IHRoZXJlLuKAmQ==',
            'terminal' => true,
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBzbW9rZQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIHNtb2tlaG91c2UgaXMgYSBsb3csIGJsYWNrZW5lZCBsZWFuLXRvIGF0IHRoZSB0aWRlIGxpbmUsIGFuZCB0aGUgbWFuIGNyb3VjaGVkIGluc2lkZSBpdCwgdGVuZGluZyBhIGZpcmUgdGhhdCdzIG1vcmUgc21va2UgdGhhbiBmbGFtZSwgaXMgVmFvIOKAlCBzbGVldmVzIHJvbGxlZCwgdW5ib3RoZXJlZCwgZXhhY3RseSBhcyB1bnN1cnByaXNlZCB0byBzZWUgeW91IGFzIGV2ZXJ5b25lIGtlZXBzIHdhcm5pbmcgeW91IGhlJ2xsIGJlLgoK4oCYQWgs4oCZIGhlIHNheXMsIHdpdGhvdXQgbG9va2luZyB1cC4g4oCYR29vZC4gSGFuZHMu4oCZCgpOb2JvZHkgaGFzIGV4cGxhaW5lZCBob3cgaGUgZ290IGhlcmUsIG9yIHdoZW4sIG9yIHdoeSB0d28gc2VwYXJhdGUgdmlsbGFnZXMgc2VudCB5b3UgbG9va2luZyBmb3IgaGltIGV2ZXJ5d2hlcmUgZXhjZXB0IHRoZSBvbmUgcGxhY2UgaGUgYWN0dWFsbHkgd2FzLiBOb2JvZHksIHlvdSdyZSBzdGFydGluZyB0byB1bmRlcnN0YW5kLCBldmVyIGRvZXMuCgpUaGUgQmFyb24gbGFuZHMgb24gdGhlIGxlYW4tdG8ncyByaWRnZXBvbGUgYW5kIHN0dWRpZXMgdGhlIG9wZXJhdGlvbiB3aXRoIHRoZSBhaXIgb2YgYSBzcGVjaWFsaXN0IGNhbGxlZCBpbiB0byBjb25zdWx0LCB0aG91Z2ggbm9ib2R5IGFza2VkIGhpbSB0by4g4oCYRmlzaCBhbmQgYnJlYWRmcnVpdCzigJkgaGUgYW5ub3VuY2VzLiDigJhTbW9rZWQgcHJvcGVybHksIHRoaXMnbGwgdHJhdmVsLiBXYWxsaXMgd2lsbCBiZSBnbGFkIG9mIGl0LuKAmQoKVmFvIGRvZXNuJ3QgYXJndWUuIEhlIGp1c3QgaGFuZHMgeW91IGEgZmFuIG9mIHdvdmVuIGxlYXZlcyBhbmQgbm9kcyBhdCB0aGUgZmlyZSwgd2hpY2ggaXMgYXBwYXJlbnRseSBpbnN0cnVjdGlvbiBlbm91Z2gu',
            'choices' => [
                ['text' => 'VGVuZCB0aGUgZmlyZQ==', 'next' => '5_fire'],
                ['text' => 'UHJlcCBtb3JlIGZpc2ggZm9yIHRoZSBzbW9rZQ==', 'next' => '5_prep'],
            ],
        ],
        '5_fire' => [
            'prose'  => 'S2VlcGluZyBhIHNtb2tpbmcgZmlyZSBsb3cgYW5kIHN0ZWFkeSB0dXJucyBvdXQgdG8gYmUgaXRzIG93biBkaXNjaXBsaW5lIOKAlCB0b28gbXVjaCBoZWF0IGFuZCB5b3UndmUgY29va2VkIGluc3RlYWQgb2YgY3VyZWQsIHRvbyBsaXR0bGUgYW5kIHlvdSdyZSBqdXN0IG1ha2luZyBldmVyeW9uZSdzIGV5ZXMgd2F0ZXIgZm9yIG5vdGhpbmcuIFZhbyBjb3JyZWN0cyB5b3VyIGZhbm5pbmcgdGVjaG5pcXVlIG9uY2UsIHdvcmRsZXNzbHksIGJ5IHRha2luZyB0aGUgZmFuIGFuZCBzaG93aW5nIHlvdSByYXRoZXIgdGhhbiB0ZWxsaW5nIHlvdSwgdGhlbiBoYW5kaW5nIGl0IGJhY2suCgpTb2xhbmdlLCBhcm1zIGZvbGRlZCBpbiB0aGUgZG9vcndheSwgd2F0Y2hlcyB3aXRoIHRoZSBwYXJ0aWN1bGFyIHNhdGlzZmFjdGlvbiBvZiBzb21lb25lIHdobyB2YWx1ZXMgYSBqb2IgZG9uZSBzbG93bHkgYW5kIHByb3Blcmx5LiBUaGUgQmFyb24gbmFycmF0ZXMgdGhlIGZpcmUncyBwcm9ncmVzcyB0byBubyBvbmUgaW4gcGFydGljdWxhciwgb2NjYXNpb25hbGx5IG9mZmVyaW5nIHdpbGRseSBzcGVjaWZpYyB0ZW1wZXJhdHVyZSBvcGluaW9ucyBub2JvZHkgY2FuIHZlcmlmeS4=',
            'choices' => [
                ['text' => 'U2VlIGl0IHRocm91Z2ggdG8gdGhlIGVuZA==', 'next' => '6_shared'],
            ],
        ],
        '5_prep' => [
            'prose'  => 'R3V0dGluZyBhbmQgc3BsaXR0aW5nIGZpc2ggZm9yIHRoZSBzbW9rZSBpcyB1bmdsYW1vcm91cywgcXVpY2sgd29yaywgYW5kIHlvdSdyZSBwYXNzYWJsZSBhdCBpdCB3aXRoaW4gdGhlIGZpcnN0IGZldywgY29tcGV0ZW50IGJ5IHRoZSBsYXN0IOKAlCBWYW8ncyBlY29ub215IG9mIG1vdmVtZW50IHJ1YmJpbmcgb2ZmIHRoZSB3YXkgY29tcGV0ZW5jZSBhcm91bmQgYSBmaXJlIHRlbmRzIHRvLgoKSGUgZG9lc24ndCBvZmZlciBpbnN0cnVjdGlvbiBzbyBtdWNoIGFzIGRlbW9uc3RyYXRlIGl0IG9uY2UgYW5kIHRydXN0IHlvdSB0byBjYXRjaCB1cCwgd2hpY2ggeW91IG1vc3RseSBkby4gVGhlIEJhcm9uIHN1cGVydmlzZXMgZnJvbSB0aGUgcmlkZ2Vwb2xlLCBkZWVwbHkgaW52ZXN0ZWQgaW4gYSBwcm9jZXNzIGhlIGlzIGNvbnRyaWJ1dGluZyBub3RoaW5nIHRvLg==',
            'choices' => [
                ['text' => 'U2VlIGl0IHRocm91Z2ggdG8gdGhlIGVuZA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'QnkgdGhlIHRpbWUgdGhlIHNtb2tlJ3MgZG9uZSBpdHMgd29yaywgdGhlIGxpZ2h0J3MgZ29uZSBnb2xkIGFuZCBsb3cgb3ZlciB0aGUgd2F0ZXIsIGFuZCBWYW8gaXMgd3JhcHBpbmcgdGhlIGZpbmlzaGVkIHBhcmNlbCBpbiBmcmVzaCBsZWF2ZXMgd2l0aCB0aGUgc2FtZSB1bmh1cnJpZWQgY29tcGV0ZW5jZSBoZSdzIGJyb3VnaHQgdG8gZXZlcnl0aGluZyBlbHNlLgoK4oCYRm9yIHRoZSBuZXh0IHN0b3As4oCZIGhlIHNheXMsIHR5aW5nIGl0IG9mZi4g4oCYV2FsbGlzIHdpbGwgZmVlZCB5b3UgcmVnYXJkbGVzcy4gVGhpcyBqdXN0IG1lYW5zIHlvdSdyZSBub3QgYXJyaXZpbmcgZW1wdHktaGFuZGVkLuKAmQoKSGUgbG9va3MgYXQgeW91IHByb3Blcmx5IGZvciB0aGUgZmlyc3QgdGltZSBzaW5jZSB5b3UgYXJyaXZlZCDigJQgYSBicmllZiwgYXNzZXNzaW5nIGxvb2ssIHRoZXJlIGFuZCBnb25lLiDigJhZb3UncmUgZnVydGhlciBhbG9uZyB0aGFuIHRoZSBsYXN0IG9uZSB3aG8gY2FtZSB0aHJvdWdoIGhlcmUuIERpZmZlcmVudCByZWFzb25zIGZvciBnb2luZywgYnV0IGZ1cnRoZXIgYWxvbmcu4oCZCgpIZSBkb2Vzbid0IGV4cGxhaW4gd2hvIHRoZSBsYXN0IG9uZSB3YXMsIG9yIHdoaWNoIHJlYXNvbnMuIEhlIGhhbmRzIHlvdSB0aGUgcGFyY2VsIGluc3RlYWQsIGFuZCB0aGUgbm90LWV4cGxhaW5pbmcgZmVlbHMsIHNvbWVob3csIGxpa2UgdGhlIHdob2xlIHBvaW50Lg==',
            'choices' => [
                ['text' => 'V2FsayBiYWNrIGRvd24gdG8gdGhlIGFuY2hvcmFnZQ==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayBkb3duIHRvIHRoZSBhbmNob3JhZ2Ugd2l0aCB0aGUgcGFyY2VsIHdhcm0gYW5kIGZyYWdyYW50IGluIHRoZSBzYXRjaGVsLCBQb2kncyB3aGl0ZSByb29mIGFuZCB0aGUgdGVycmFjZSB2aWxsYWdlIGJvdGggdmlzaWJsZSBhdCBvbmNlIGZyb20gcGFydHdheSBkb3duIHRoZSB0cmFjayDigJQgdGhlIHR3byBkaXJlY3Rpb25zIHRoYXQgc3BlbnQgYWxsIGFmdGVybm9vbiBzZW5kaW5nIHlvdSB0b3dhcmQgZWFjaCBvdGhlciwgYW5kIG5ldmVyIG9uY2UgdG93YXJkIGV4YWN0bHkgd2hlcmUgeW91IG5lZWRlZCB0byBiZS4KClZhbyBkb2Vzbid0IHdhbGsgeW91IGFsbCB0aGUgd2F5IGRvd24uIEhlIHBlZWxzIG9mZiBhdCB0aGUgdHJlZWxpbmUgd2l0aCB0aGUgc2FtZSBsYWNrIG9mIGNlcmVtb255IGhlIGFycml2ZWQgd2l0aCwgYWxyZWFkeSBkaXNjdXNzaW5nIHNvbWV0aGluZyB3aXRoIHRoZSBCYXJvbiB0aGF0IG5laXRoZXIgb2YgdGhlbSB3aWxsIHJlcGVhdCB0byB5b3UuCgrigJhIZSdsbCBiZSBnb25lIGJlZm9yZSB3ZSBsaWZ0IG9mZizigJkgU29sYW5nZSBzYXlzLCBub3QgYSBxdWVzdGlvbi4g4oCYSGUgYWx3YXlzIGlzLuKAmQ==',
            'choices' => [
                ['text' => 'QXNrIGhpbSB0byBzdGF5IGZvciB0aGUgZXZlbmluZyBydW0=', 'next' => '8_end_ask'],
                ['text' => 'TGV0IGhpbSBnbyB0aGUgd2F5IGhlIGNhbWU=', 'next' => '8_end_let'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzayBhbnl3YXksIGJlY2F1c2UgaXQgY29zdHMgbm90aGluZyBhbmQgYmVjYXVzZSBzb21lIHBhcnQgb2YgeW91IHdvdWxkIHJhdGhlciBiZSB0b2xkIG5vIHRoYW4gbm90IHRyeS4gVmFvIGFjdHVhbGx5IHBhdXNlcyBhdCB0aGF0IOKAlCBwcm9wZXJseSBwYXVzZXMsIG1pZC1zdHJpZGUg4oCUIGFuZCBmb3IgYSBzZWNvbmQgbG9va3MgbGlrZSBoZSdzIGNvbnNpZGVyaW5nIGl0LgoKVGhlbiBoZSBzaGFrZXMgaGlzIGhlYWQsIGJ1dCBnZW50bHkuIOKAmEFub3RoZXIgbmlnaHQuIFRoZXJlJ3MgYWx3YXlzIGFub3RoZXIgbmlnaHQsIHdpdGggdGhpcyBvY2Vhbi7igJkgSGUgbm9kcyBhdCB0aGUgcGFyY2VsIHVuZGVyIHlvdXIgYXJtLiDigJhFYXQgd2VsbCBhdCBXYWxsaXMuIFRlbGwgdGhlbSB0aGUgc21va2Ugd2FzIG1pbmUu4oCZCgpIZSdzIGdvbmUgaW50byB0aGUgdHJlZXMgYmVmb3JlIHlvdSBjYW4gYW5zd2VyLiBTb2xhbmdlLCBiZXNpZGUgeW91LCBoYXMgdGhlIHNwZWNpZmljIGxvb2sgb2Ygc29tZW9uZSB3aG8gdHJpZWQgdGhlIGV4YWN0IHNhbWUgdGhpbmcgb25jZSwgeWVhcnMgYWdvLCBhbmQgZ290IHRoZSBleGFjdCBzYW1lIGFuc3dlci4KClRoYXQgZXZlbmluZywgYXQgYW5jaG9yLCBzaGUgcG91cnMgaGVyIHJ1bSBhbmQg4oCUIGZvciBvbmNlIOKAlCBwb3VycyBhIHNlY29uZCwgc21hbGxlciBtZWFzdXJlIGludG8gYSBzcGFyZSBjdXAsIGFuZCBsZWF2ZXMgaXQgc2l0dGluZyB1bnRvdWNoZWQgb24gdGhlIHJhaWwgdW50aWwgdGhlIGxpZ2h0J3MgZnVsbHkgZ29uZS4gTmVpdGhlciBvZiB5b3UgbWVudGlvbnMgaXQuIFNvbWUgaW52aXRhdGlvbnMgZ2V0IGxlZnQgb3V0IGFueXdheSwgd2hldGhlciBvciBub3QgYW55b25lJ3MgdGhlcmUgdG8gdGFrZSB0aGVtLg==',
            'ending' => true,
        ],
        '8_end_let' => [
            'prose'  => 'WW91IGxldCBoaW0gZ28gd2l0aG91dCBhc2tpbmcuIFNvbWUgcGVvcGxlLCB5b3UncmUgc3RhcnRpbmcgdG8gdW5kZXJzdGFuZCwgYXJlIGJldHRlciBsb3ZlZCBieSBub3QgYmVpbmcgY2hhc2VkIOKAlCBWYW8gbGVhc3Qgb2YgYWxsLCBhIG1hbiB3aG8ncyBzcGVudCBoaXMgd2hvbGUgbGlmZSBhcnJpdmluZyBleGFjdGx5IHdoZW4gaGUgbWVhbnMgdG8gYW5kIGxlYXZpbmcgdGhlIHNhbWUgd2F5LgoKVGhlIEvFjXR1a3UgbGlmdHMgb2ZmIGludG8gYSBza3kgZ29uZSB0aGUgY29sb3VyIG9mIHRoZSBzbW9rZWQgZmlzaCBzdGlsbCB3YXJtIGluIHRoZSBzYXRjaGVsLCBQb2kncyBiYXNpbGljYSByb29mIGNhdGNoaW5nIHRoZSBsYXN0IGxpZ2h0IGJlbG93IHlvdSwgdGhlIHRlcnJhY2UgdmlsbGFnZSBhbHJlYWR5IGxvc3QgaW4gdGhlIHJpZGdlJ3Mgc2hhZG93LgoKU29sYW5nZSBwb3VycyBoZXIgcnVtIGF0IGFuY2hvciB0aGF0IG5pZ2h0LCBzYW1lIGFzIGFsd2F5cywgYW5kIHNheXMgbm90aGluZyBhYm91dCBWYW8gYXQgYWxsIOKAlCB3aGljaCB5b3UndmUgbGVhcm5lZCwgYnkgbm93LCBpcyBpdHMgb3duIGtpbmQgb2Ygc2F5aW5nIHNvbWV0aGluZy4gWW91IGVhdCBhIHN0cmlwIG9mIHRoZSBzbW9rZWQgZmlzaCBvbiBkZWNrLCBzaGFyaW5nIGl0IHRocmVlIHdheXMgd2l0aG91dCBiZWluZyBhc2tlZCB0bywgYW5kIGl0IHRhc3RlcywgZmFpbnRseSBhbmQgdW5taXN0YWthYmx5LCBsaWtlIHRoZSB3aG9sZSBzdHJhbmdlIGFmdGVybm9vbiB0aGF0IG1hZGUgaXQu',
            'ending' => true,
        ],
    ],
];
