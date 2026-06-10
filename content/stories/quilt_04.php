<?php
return [
    'id'    => 'q4',
    'title' => 'The Ferryman Knows',
    'color' => '#4A7AA0',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIHJlZWQgYmVkcyBiZWdpbiB3aGVyZSB0aGUgcm9hZCBlbmRzIOKAlCBhIHN1ZGRlbiBzdG9wLCBhcyBpZiB0aGUgYnVpbGRlciBzaW1wbHkgbG9zdCBpbnRlcmVzdC4gQWhlYWQsIHRoZSBEYW51YmUgc3ByZWFkcyBpdHNlbGYgaW50byBhIGh1bmRyZWQgY2hhbm5lbHMgYW5kIHRoZSBob3Jpem9uIGJlY29tZXMgc3VnZ2VzdGlvbnMuIFlvdeKAmXZlIGJlZW4gaGVyZSB0aHJlZSBob3VycywgYW5kIHRoZSBhaXIgc3RpbGwgdGFzdGVzIGxpa2Ugc29tZXdoZXJlIGVsc2U6IGdyZWVuIGFuZCBoZWF2eSBhbmQgc2xpZ2h0bHkgYW5pbWFsLgoKSmFtZXMgc2l0cyBvbiB5b3VyIHNob3VsZGVyIGluIHRoZSBwYXJ0aWN1bGFyIHdheSBoZSBzaXRzIHdoZW4gaGXigJlzIGRlY2lkZWQgc29tZXRoaW5nIGlzIHlvdXIgcHJvYmxlbSwgbm90IGhpcy4gRnJlZCBoYXMgYmVlbiBxdWlldCBzaW5jZSB0aGUgY3Jvc3Nyb2Fkcywgd2hpY2ggbWVhbnMgaGXigJlzIHRoaW5raW5nLgoK4oCcU2V2ZXJhbCByb3V0ZXMs4oCdIEZyZWQgc2F5cy4g4oCcVGhlIHB1bnQgbWVuIGhpcmUgb3V0IGZyb20gdGhlIGRvY2suIE9yIHRoZXJl4oCZcyBhIHBhdGggYWxvbmcgdGhlIG1hcnNoIGVkZ2Ug4oCUIGRyaWVyIHRoYW4gaXQgbG9va3MsIEnigJlkIGltYWdpbmUu4oCdCgpIZSBwYXVzZXMuIOKAnE1hcmdpbmFsbHkgZHJpZXIu4oCd',
            'choices' => [
                ['text' => 'SGlyZSBhIHB1bnQgdXAgdGhlIGRlbHRh', 'next' => '2_punt'],
                ['text' => 'VGFrZSB0aGUgbWFyc2ggcGF0aA==', 'next' => '2_marsh'],
            ],
        ],
        '2_punt' => [
            'prose'   => 'VGhlIGRvY2sgaXMgdGhyZWUgbWVuIGFuZCBhIGRvZyBhbmQgYW4gYXJndW1lbnQgdGhhdCBoYXMgY2xlYXJseSBiZWVuIGdvaW5nIG9uIHNpbmNlIGJlZm9yZSBicmVha2Zhc3QuIFlvdSBmaW5kIEx1Y2EgYXQgdGhlIGVuZCBvZiB0aGUgcGllciwgbWVuZGluZyBhIG5ldCB3aXRoIHRoZSBtZXRob2RpY2FsIHBhdGllbmNlIG9mIHNvbWVvbmUgd2hvIGhhcyBnaXZlbiB1cCBleHBlY3RpbmcgdGhlIGRheSB0byBzdXJwcmlzZSBoaW0uIEhpcyBwdW50IGlzIG9sZCBidXQgd2VsbC1rZXB0LiBIZSBuYW1lcyBhIHByaWNlLiBZb3UgcGF5IGl0LgoK4oCcTG9va2luZyBmb3Igc29tZXRoaW5nP+KAnSBoZSBhc2tzLCBhbHJlYWR5IHB1c2hpbmcgb2ZmLgoKWW91IGRlc2NyaWJlIHRoZSBxdWlsdCBzcXVhcmUgd2l0aG91dCBkZXNjcmliaW5nIHRvbyBtdWNoLgoKTHVjYSB3YXRjaGVzIHRoZSByZWVkIGJlZHMgc2xpZGUgcGFzdC4g4oCcUGVvcGxlIGNvbWUgbG9va2luZyzigJ0gaGUgc2F5cywgYWZ0ZXIgYSB3aGlsZS4g4oCcTm90IG1hbnkuIEJ1dCBzb21lLuKAnQoKRnJlZCwgcGVyY2hlZCBvbiB0aGUgYm93LCBpcyBjYXRhbG9ndWluZyB0aGUgc2VkZ2VzLg==',
            'choices' => [
                ['text' => 'V2FpdCBhcyB0aGUgcHVudCBtb3ZlcyBkZWVwZXIgaW50byB0aGUgY2hhbm5lbHM=', 'next' => '3_punt_resin'],
            ],
        ],
        '2_marsh' => [
            'prose'   => 'VGhlIHBhdGggcnVucyBhbG9uZyB0aGUgZWRnZSBvZiB0aGUgcmVlZCBiZWRzLCBuYXJyb3cgYW5kIHVuY2VydGFpbi4gWW91ciBib290cyBhcmUgd2V0IHdpdGhpbiBmb3VyIG1pbnV0ZXMg4oCUIEZyZWQgd2FzIGNoYXJhY3RlcmlzdGljYWxseSBvcHRpbWlzdGljIOKAlCBidXQgdGhlIGdyb3VuZCBob2xkcywgYW5kIHRoZSBsaWdodCBhY3Jvc3MgdGhlIGRlbHRhIGF0IG1pZC1tb3JuaW5nIGlzIHRoZSBraW5kIG9mIGxpZ2h0IHRoYXQgbWFrZXMgeW91IGZlZWwgYnJpZWZseSBmb3J0dW5hdGUuCgpKYW1lcyBoYXMgbW92ZWQgdG8geW91ciBjb2xsYXIsIHdoaWNoIG1lYW5zIGhlIGZpbmRzIHRoZSBwYXRoIGFjY2VwdGFibGUuIEZyZWQgd2Fsa3MgYmVzaWRlIHlvdSBvbiB0aGUgd2lkZXIgc2VjdGlvbnMsIHJlY2l0aW5nIG1hcnNoIGZsb3JhIHdpdGggdGhlIGFpciBvZiBzb21lb25lIGRlbGl2ZXJpbmcgZXhjZWxsZW50IG5ld3MuCgrigJxHbHljZXJpYSBtYXhpbWEs4oCdIGhlIHNheXMuIOKAnENvbW1vbnBsYWNlLCBidXQgZXNzZW50aWFsLiBBbmQgdGhlcmUg4oCUIHRoYXTigJlzIGludGVyZXN0aW5nLuKAnQoKWW91IGRvbuKAmXQgYXNrIHdoYXTigJlzIGludGVyZXN0aW5nLiBZb3XigJl2ZSBsZWFybmVkLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBwYXRoIGZ1cnRoZXIgaW50byB0aGUgbWFyc2g=', 'next' => '3_marsh_resin'],
            ],
        ],
        '3_punt_resin' => [
            'prose'   => 'VHdlbnR5IG1pbnV0ZXMgb3V0LCBMdWNhIG1ha2VzIGEgc21hbGwgc291bmQgYW5kIHlvdSBsb29rIGRvd24uIEEgaGFpcmxpbmUgc2VhbSBuZWFyIHRoZSBzdGVybiBpcyBsZXR0aW5nIGluIHdhdGVyLiBOb3QgZHJhbWF0aWNhbGx5IOKAlCBub3QgeWV0IOKAlCBidXQgdGhlIHB1bnQgZmxvb3IgaXMgZGFtcCBhbmQgZ2V0dGluZyBkYW1wZXIuCgpZb3UgaGF2ZSB0aGUgdmlhbCBvZiBvYWsgcmVzaW4uIE1pcmEgc2FpZCBpdCB3b3VsZCBiZSB1c2VmdWwgaW4gZGFtcCBjb25kaXRpb25zLgoKWW91IHdvcmsgaXQgaW50byB0aGUgc2VhbSB3aXRoIHlvdXIgdGh1bWIsIGFuZCB0aGUgcmVzaW4gZG9lcyB3aGF0IHJlc2luIGRvZXM6IGl0IHN0aWZmZW5zLCBpdCBob2xkcy4gVGhlIHdhdGVyIHN0b3BzLgoKTHVjYSB3YXRjaGVzIHRoaXMgd2l0aCBhbiBleHByZXNzaW9uIHlvdSBjYW7igJl0IHF1aXRlIHJlYWQuIOKAnEdvb2QgdG8gYmUgcHJlcGFyZWQs4oCdIGhlIHNheXMsIGZpbmFsbHkuIFRoZSBkb2csIHdobyBoYWQgbW92ZWQgdG8gdGhlIGJvdyB3aXRoIHRoZSBpbnN0aW5jdCBvZiBhbmltYWxzIG9uIHNpbmtpbmcgdmVzc2VscywgcmV0dXJucyB0byB0aGUgbWlkZGxlIG9mIHRoZSBib2F0Lg==',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gSmFzcGVy4oCZcyBsYW5kaW5n', 'next' => '4_water'],
            ],
        ],
        '3_marsh_resin' => [
            'prose'   => 'WW91ciBtYXAgaXMgYSBjYXJlZnVsIGNvcHksIG1hZGUgaW4gZ29vZCBpbmssIGJ1dCBnb29kIGluayBoYXMgbGltaXRzLiBUaGUgcGF0aCBjcm9zc2VzIGEgc2hhbGxvdyBkcmFpbmFnZSBjaGFubmVsIOKAlCBrbmVlLWRlZXAsIHVuYXZvaWRhYmxlIOKAlCBhbmQgd2hlbiB5b3XigJlyZSB0aHJvdWdoLCB0aGUgbG93ZXIgaGFsZiBvZiB0aGUgcGFnZSBoYXMgZ29uZSB0byB3YXRlcmNvbG91ci4KCkZyZWQgbG9va3MgYXQgaXQuIOKAnFRoZSByZXNpbizigJ0gaGUgc2F5cy4gSXQgaXNu4oCZdCBhIHF1ZXN0aW9uLgoKWW91IGNvYXQgdGhlIHJlbWFpbmluZyBzZWN0aW9ucyBiZWZvcmUgdGhlIG5leHQgY2hhbm5lbC4gVGhlIHJlc2luIHNlYWxzIGFnYWluc3QgbW9pc3R1cmUgb24gY29udGFjdCDigJQgRnJlZCBzYXlzIHNvbWV0aGluZyBhYm91dCBwb2x5bWVyIGNyb3NzLWxpbmtpbmcgdGhhdCB5b3UgZG9u4oCZdCBmb2xsb3cgYnV0IG5vZCBhdCDigJQgYW5kIHdoZW4gdGhlIHRoaXJkIGNoYW5uZWwgY29tZXMsIHRoZSBpbmsgaG9sZHMgY2xlYW4uCgrigJxJIHRob3VnaHQgc28s4oCdIHNheXMgRnJlZCwgd2l0aCBkZWVwIHNhdGlzZmFjdGlvbi4=',
            'choices' => [
                ['text' => 'UHJlc3Mgb24gdG8gdGhlIGZlcnJ5IGxhbmRpbmc=', 'next' => '4_land'],
            ],
        ],
        '4_water' => [
            'prose'   => 'VGhlIGRlbHRhIG9wZW5zIGFoZWFkLCBhbmQgZm9yIGEgbW9tZW50IHlvdSB1bmRlcnN0YW5kIHdoeSBwZW9wbGUgY2FtZSBoZXJlIGluIHRoZSBmaXJzdCBwbGFjZSDigJQgbm90IHRvIGZpbmQgc29tZXRoaW5nLCBidXQgYmVjYXVzZSB0aGlzIGlzIHRoZSBraW5kIG9mIHBsYWNlIHlvdSBjb21lIHRvIHdoZW4gZXZlcnl0aGluZyBlbHNlIGhhcyBzdGFydGVkIHRvIGZlZWwgbWFuYWdlZC4gVGhlIGNoYW5uZWxzIHNwbGl0IGFuZCByZWpvaW4uIEVncmV0cyBzdGFuZCBpbiB0aGUgc2hhbGxvd3Mgd2l0aCB0aGUgY29tcG9zdXJlIG9mIG9sZCBzY2hvbGFycy4gVGhlIHNreSBpcyB2ZXJ5IGxhcmdlLgoKTHVjYSBsYW5kcyB5b3UgYXQgYSB3b29kZW4gamV0dHkgd2l0aCBhIHBhaW50ZWQgcG9zdC4g4oCcSmFzcGVy4oCZcyzigJ0gaGUgc2F5cy4g4oCcSWYgYW55b25lIGtub3dzIGFueXRoaW5nIGFib3V0IHNxdWFyZXMgYW5kIG9sZCBwaWVjZXMgb2YgY2xvdGgsIGl04oCZcyBKYXNwZXIu4oCdCgpIZSBkb2VzbuKAmXQgd2FpdCB0byB3YXRjaCB5b3UgZ28u',
            'choices' => [
                ['text' => 'V2FsayB1cCB0byB0aGUgbGFuZGluZw==', 'next' => '5_jasper'],
            ],
        ],
        '4_land' => [
            'prose'   => 'VGhlIG1hcnNoIHBhdGggZGVsaXZlcnMgeW91LCBldmVudHVhbGx5LCB0byBhIHdpZGVyIGNoYW5uZWwgYW5kIGEgcGFpbnRlZCBwb3N0IGF0IHRoZSBlZGdlIG9mIGEgd29vZGVuIGpldHR5LiBUaGUgc2V0dGxlbWVudCBpcyBzbWFsbDogYSBoYW5kZnVsIG9mIGhvdXNlcywgYSByZWVkLXJvb2ZlZCBzaGVkIHRoYXQgbWlnaHQgYmUgYSBib2F0aG91c2UsIGEgZG9nIHNsZWVwaW5nIGluIHRoZSBzdW4gd2l0aCBubyBhcHBhcmVudCBpbnRlbnRpb24gb2YgbW92aW5nLgoKSmFtZXMgaGFzIGJlZW4gd2F0Y2hpbmcgdGhlIGhlcm9ucy4gT25lIG9mIHRoZW0gd2F0Y2hlcyBoaW0gYmFjayB3aXRoIGFuIGV4cHJlc3Npb24gb2Ygc3VwcmVtZSBkaXNyZWdhcmQuCgpBbiBvbGQgbWFuIHNpdHMgYXQgdGhlIGVuZCBvZiB0aGUgamV0dHkgd2l0aCBhIGZpc2hpbmcgbGluZSBhbmQgbm8gYXBwYXJlbnQgaHVycnkgYWJvdXQgZWl0aGVyIGNhdGNoaW5nIG9yIG5vdCBjYXRjaGluZy4gSGUgd2F0Y2hlcyB5b3VyIGFwcHJvYWNoIHRoZSB3YXkgcGVvcGxlIGRvIHdoZW4gdGhleeKAmXZlIGJlZW4gZXhwZWN0aW5nIHNvbWVvbmUu',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIG1hbiBhdCB0aGUgZW5kIG9mIHRoZSBqZXR0eQ==', 'next' => '5_jasper'],
            ],
        ],
        '5_jasper' => [
            'prose'   => 'SGlzIG5hbWUgaXMgSmFzcGVyLiBIZSBoYXMgYmVlbiBhdCB0aGlzIGxhbmRpbmcgZm9yIGZvcnR5IHllYXJzLiBIZSBrbm93cyB0aGUgZmlzaGVybWVuIGJ5IHRoZWlyIGJvYXRzIGFuZCB0aGUgYmlyZHMgYnkgdGhlaXIgY2FsbHMgYW5kLCBpdCBiZWNvbWVzIGNsZWFyIG92ZXIgdGhlIG5leHQgZmV3IG1pbnV0ZXMsIGhlIGtuZXcgc29tZW9uZSBlbHNlIGhhZCBiZWVuIGhlcmUgYXNraW5nIGFib3V0IHRoZSBxdWlsdCBzcXVhcmVzLgoKSGUgZG9lc27igJl0IHNheSB0aGlzIHlldC4gSGUgc2F5czog4oCcWW914oCZbGwgd2FudCBhIGdpbmdlciBiZWVyLiBNeSBjb3VzaW4ga2VlcHMgdGhlIGlubi4gVGVsbCBoZXIgSmFzcGVyIHNlbnQgeW91IGFuZCBzaGUgd29u4oCZdCB3YXRlciBpdCBkb3duLuKAnQoKSmFtZXMgbG9va3MgYXQgeW91IGZyb20geW91ciBzaG91bGRlci4KCkZyZWQgaXMgc29tZXdoZXJlIGluIHRoZSByZWVkIGJlZHMgdG8geW91ciBsZWZ0LCBhbmQgeW91IGNhbiBoZWFyIGhpbSBtdXR0ZXJpbmcuIFRocmVlIHNwZWNpZXMsIGF0IGxlYXN0LiBQb3NzaWJseSBmb3VyLg==',
            'terminal' => true,
            'choices' => [
                ['text' => 'RmluZCBvdXQgd2hhdCBKYXNwZXIga25vd3M=', 'next' => '6_inn'],
            ],
        ],
        '6_inn' => [
            'prose'   => 'VGhlIGNvdXNpbuKAmXMgbmFtZSBpcyBSYWRhLCBhbmQgc2hlIGRvZXMgbm90IHdhdGVyIGl0IGRvd24uIFRoZSBnaW5nZXIgYmVlciBhcnJpdmVzIHdpdGggYSBwaWVjZSBvZiBicmVhZCBhbmQgb2lsIHRoYXQgeW91IGRpZG7igJl0IGFzayBmb3IsIGFuZCB0aGUgdGFibGUgaXMgaW4gdGhlIHNoYWRlLCBhbmQgZm9yIGEgZmV3IG1pbnV0ZXMgeW91IHNpbXBseSBzaXQuCgpKYXNwZXIgc2V0dGxlcyBhY3Jvc3MgZnJvbSB5b3Ugd2l0aCB0aGUgZWFzZSBvZiBhIG1hbiB3aG8gaGFzIG5vd2hlcmUgYmV0dGVyIHRvIGJlLiBIZSBiZWdpbnMgdGFsa2luZyBhYm91dCB0aGUgZGVsdGEg4oCUIHRoZSBzZWFzb24sIHRoZSBiaXJkcywgdGhlIHdheSB0aGUgY2hhbm5lbHMgc2hpZnQgeWVhciB0byB5ZWFyLiBIZeKAmXMgYnVpbGRpbmcgdXAgdG8gc29tZXRoaW5nLiBZb3UgY2FuIGZlZWwgaXQgaW4gdGhlIHBhdXNlcy4KClRoZW4gaGUgc2F5czog4oCcWW914oCZcmUgbm90IHRoZSBmaXJzdCBwZXJzb24gdG8gY29tZSBsb29raW5nIGZvciB0aGUgc3F1YXJlcy4gSnVzdCBzbyB5b3Uga25vdy7igJ0KCkZyZWQgaGFzIGFwcGVhcmVkIGF0IHRoZSB3aW5kb3cuIEhlIGlzIHZlcnkgc3RpbGwu',
            'choices' => [
                ['text' => 'QXNrIHdobyBjYW1lIGJlZm9yZSB5b3U=', 'next' => '7_visitor'],
                ['text' => 'QXNrIHdoZXJlIHRoZSBzcXVhcmUgaXMgbm93', 'next' => '7_square'],
            ],
        ],
        '7_visitor' => [
            'prose'   => 'QSB5b3VuZyB3b21hbiwgSmFzcGVyIHNheXMuIE1vbnRocyBhZ28g4oCUIGxhdGUgYXV0dW1uLCB0aGUgcmVlZHMgd2VyZSBkb3duLiBTaGUgY2FtZSBieSBib2F0LCBubyBwdW50IGhpcmVkLCB3aGljaCBtZWFudCBzaGUgaGFkIGhlciBvd24gd2F5IG9mIGdldHRpbmcgYXJvdW5kLiBTaGUgd2FzIHBvbGl0ZSBidXQgZGlkbuKAmXQgc3RheS4gQXNrZWQgYWJvdXQgdGhlIHNxdWFyZXMsIGdvdCB0aGUgbmFtZSBzaGUgbmVlZGVkLCBsZWZ0LgoK4oCcU2hlIHNlZW1lZCBsaWtlIHNoZSB3YXMgaW4gbW9yZSBvZiBhIGh1cnJ5IHRoYW4geW91LOKAnSBoZSBzYXlzLiDigJxOb3QgaW1wYXRpZW50LiBKdXN0IOKAlCBwdXJwb3NlZnVsLuKAnQoKSGUgdGFrZXMgYSBsb25nIGRyaW5rIG9mIGhpcyBiZWVyLiDigJxJIHdvbmRlcmVkIGF0IHRoZSB0aW1lIGlmIHNoZeKAmWQgZmluZCB3aGF0IHNoZSB3YXMgbG9va2luZyBmb3IuIEkgYXNzdW1lIHNoZSBkaWQu4oCdIEhlIGxvb2tzIGF0IHlvdSBzdGVhZGlseS4g4oCcSSBhc3N1bWUgeW91IHdpbGwgdG9vLuKAnQoKSGUgZ2l2ZXMgeW91IHRoZSBuYW1lOiB0aGUgTXVudGVhbnUgZmFtaWx5LCBkb3duc3RyZWFtIGhhbGYgYW4gaG91ciwgbG9vayBmb3IgdGhlIGJsdWUgYm9hdC4=',
            'choices' => [
                ['text' => 'RmluZCB0aGUgTXVudGVhbnUgZmFtaWx5', 'next' => '8_munteanu'],
            ],
        ],
        '7_square' => [
            'prose'   => 'SmFzcGVyIG5vZHMgYXMgaWYgaGUgZXhwZWN0ZWQgdGhpcy4gVGhlIE11bnRlYW51IGZhbWlseSwgaGUgc2F5cyDigJQgaGFsZiBhbiBob3VyIGRvd25zdHJlYW0sIGxvb2sgZm9yIHRoZSBibHVlIGJvYXQuIFRoZXnigJl2ZSBrZXB0IHRoZSBzcXVhcmUgc2luY2UgaGlzIGdyYW5kbW90aGVy4oCZcyB0aW1lLCBvciBzbyB0aGUgc3RvcnkgZ29lcy4gV29ydGggYXNraW5nIHBvbGl0ZWx5LgoK4oCcT25lIG90aGVyIHRoaW5nLOKAnSBoZSBhZGRzLCBzZXR0aW5nIGRvd24gaGlzIGdsYXNzLiDigJxZb3XigJlyZSBub3QgdGhlIGZpcnN0LiBTb21lb25lIGVsc2UgY2FtZSBhc2tpbmcsIG1vbnRocyBiYWNrLiBZb3VuZyB3b21hbi4gU2hlIHNlZW1lZCBpbiBtb3JlIG9mIGEgaHVycnkgdGhhbiB5b3Uu4oCdCgpIZSBzYXlzIGl0IHdpdGhvdXQgcGFydGljdWxhciBzaWduaWZpY2FuY2UsIGFzIGlmIGl04oCZcyBzaW1wbHkgaW5mb3JtYXRpb24geW91IHNob3VsZCBoYXZlLgoKRnJlZCwgYXQgdGhlIHdpbmRvdywgaXMgcHJldGVuZGluZyB0byBleGFtaW5lIGEgcnVzaC4gSGUgaXMgbm90IGV4YW1pbmluZyB0aGUgcnVzaC4=',
            'choices' => [
                ['text' => 'RmluZCB0aGUgTXVudGVhbnUgZmFtaWx5', 'next' => '8_munteanu'],
            ],
        ],
        '8_munteanu' => [
            'prose'   => 'VGhlIGJsdWUgYm9hdCBpcyB3aGVyZSBKYXNwZXIgc2FpZCBpdCB3b3VsZCBiZS4gVGhlIGZhbWlseSDigJQgZ3JhbmRtb3RoZXIsIHR3byBncm93biBjaGlsZHJlbiwgYSBoYW5kZnVsIG9mIG90aGVycyBpbiBhbmQgb3V0IG9mIHRoZSBkb29yd2F5IOKAlCByZWNlaXZlIHlvdSB3aXRoIHRoZSB3YXRjaGZ1bCBjb3VydGVzeSBvZiBwZW9wbGUgd2hvIGhhdmUgaGFkIHN0cmFuZ2VycyBhcnJpdmUgYmVmb3JlLgoKVGhlIGdyYW5kbW90aGVyIGJyaW5ncyBvdXQgdGhlIHNxdWFyZSB3aXRob3V0IGJlaW5nIGFza2VkLgoKSXTigJlzIHNtYWxsZXIgdGhhbiB0aGUgb3RoZXJzOiBib2F0cyBvbiBhIHdpZGUgcml2ZXIgYXQgZGF3biwgcmVuZGVyZWQgaW4gZmFkZWQgYmx1ZXMgYW5kIGEgcGFydGljdWxhciBnb2xkIHRoYXQgdGhlIGxpZ2h0IGFsbW9zdCBtYWtlcyB3YXJtLiBUaGUgdGhyZWFkIGNvdW50IGlzIGV4dHJhb3JkaW5hcnkuIFlvdSBob2xkIGl0IGZvciBhIG1vbWVudCBiZWZvcmUgc2hlIGFza3MgaWYgeW914oCZZCBsaWtlIHRlYS4KCllvdSB3b3VsZC4gSmFtZXMgc2l0cyBvbiB0aGUgd2luZG93c2lsbCBhbmQgd2F0Y2hlcyB0aGUgcml2ZXIu',
            'terminal' => true,
            'choices' => [
                ['text' => 'SGVhZCBiYWNrIHRvIEphc3BlcuKAmXMgbGFuZGluZw==', 'next' => '9_rushes'],
            ],
        ],
        '9_rushes' => [
            'prose'   => 'RnJlZCBpcyB3YWl0aW5nIGF0IHRoZSBsYW5kaW5nIHdpdGggYW4gYXJtZnVsIG9mIGRyaWVkIHJ1c2hlcyBhbmQgYW4gZXhwcmVzc2lvbiBvZiBwcm9mb3VuZCB2aW5kaWNhdGlvbi4KCuKAnFNjaG9lbm9wbGVjdHVzIGxhY3VzdHJpcyzigJ0gaGUgYW5ub3VuY2VzLiDigJxBbmQgdHdvIHZhcmlldGllcyBvZiBQaHJhZ21pdGVzIHRoYXQgSeKAmWQgbmVlZCBhIG1pY3Jvc2NvcGUgdG8gYmUgY2VydGFpbiBhYm91dCwgYnV0IEnigJltIGZhaXJseSBjb25maWRlbnQuIE9oLCBhbmQgQm9sYm9zY2hvZW51cyBtYXJpdGltdXMsIHdoaWNoIGlzIGxlc3MgaW50ZXJlc3RpbmcgYnV0IHdvcnRoIG5vdGluZy7igJ0KCkphc3BlciB3YXRjaGVzIGhpbSBmcm9tIHRoZSBqZXR0eSB3aXRoIHRoZSBleHByZXNzaW9uIG9mIGEgbWFuIHdobyBoYXMgc2VlbiBzdHJhbmdlciB0aGluZ3MsIGJ1dCBub3QgcmVjZW50bHkuCgrigJxUaGUgb3RoZXIgb25lIGRpZG7igJl0IGhhdmUgYSBwYXJyb3Qs4oCdIGhlIG9mZmVycywgYXMgYSBraW5kIG9mIGV4cGxhbmF0aW9uIHRvIGhpbXNlbGYuCgpGcmVkIGJ1bmRsZXMgdGhlIHJ1c2hlcyB3aXRoIGEgbGVuZ3RoIG9mIGNvcmQgYW5kIHR1Y2tzIHRoZW0gdW5kZXIgeW91ciBhcm0uIOKAnFRoZXnigJlsbCB0ZWxsIHlvdSBzb21ldGhpbmcgdXNlZnVsIGxhdGVyLOKAnSBoZSBzYXlzLCB3aXRoIHRoZSBhYnNvbHV0ZSBjb25maWRlbmNlIG9mIHNvbWVvbmUgd2hvIGhhcyBuZXZlciBiZWVuIHdyb25nIGFib3V0IGEgcnVzaC4=',
            'choices' => [
                ['text' => 'U3RheSB1bnRpbCB0aGUgbGlnaHQgZ29lcw==', 'next' => '10_end_river'],
                ['text' => 'VGhpbmsgYWJvdXQgd2hvIGNhbWUgYmVmb3JlIHlvdQ==', 'next' => '10_end_petra'],
            ],
        ],
        '10_end_river' => [
            'prose'   => 'WW91IHN0YXkgdW50aWwgdGhlIHN1biBkcm9wcyBiZWhpbmQgdGhlIHJlZWQgYmVkcyBhbmQgdGhlIHJpdmVyIGdvZXMgdGhlIGNvbG91ciBvZiBvbGQgY29wcGVyLiBKYXNwZXIgZ29lcyBpbnNpZGUuIFJhZGEgYnJpbmdzIG91dCBicmVhZCBhbmQgb2lsIGFnYWluIHdpdGhvdXQgYmVpbmcgYXNrZWQuCgpGcmVkIGFycmFuZ2VzIHRoZSBydXNoZXMgb24gdGhlIGpldHR5IHBsYW5raW5nIGFuZCBuYW1lcyB0aGVtIGFnYWluIGluIExhdGluLCBhcyBpZiB0aGV5IG1pZ2h0IGhhdmUgY2hhbmdlZCB3aGlsZSBoZSB3YXNu4oCZdCB3YXRjaGluZy4gSmFtZXMgc2l0cyBiZXNpZGUgaGltIOKAlCBkb2luZyB0aGUgdGhpbmcgaGUgZG9lcywgc2l0dGluZyB2ZXJ5IHN0aWxsIGFuZCBiZWluZyBtb3JlIHByZXNlbnQgdGhhbiBtb3N0IHBlb3BsZSBtYW5hZ2Ugd2hlbiB0aGV54oCZcmUgYWN0dWFsbHkgdHJ5aW5nLgoKVGhlIHNxdWFyZSBpcyBpbiB5b3VyIGJhZy4gRm91ciBub3cuIFRoZSBncmFuZG1vdGhlciBoYWQgcHJlc3NlZCB5b3VyIGhhbmQgd2hlbiB5b3UgbGVmdC4KCllvdSB0aGluazogdGhlIHRocmVhZCBjb3VudCBpcyBleHRyYW9yZGluYXJ5LiBZb3UgdGhpbms6IHNvbWVvbmUgZWxzZSBoYXMgYmVlbiBoZXJlLiBZb3UgdGhpbms6IHRoZSBkZWx0YSBhdCBkdXNrIGlzIHRoZSBraW5kIG9mIHRoaW5nIHlvdSBzaG91bGQgcHJvYmFibHkgdGVsbCBzb21lb25lIGFib3V0LgoKRnJlZCB0dXJucyBhIHJ1c2ggc3RlbSBvdmVyIGluIGhpcyBjbGF3cy4g4oCcU2V2ZW4gc3BlY2llcyzigJ0gaGUgc2F5cyBxdWlldGx5LCBhcyBpZiBjb3JyZWN0aW5nIGFuIGVhcmxpZXIsIHByaXZhdGUgZXN0aW1hdGUuIOKAnE5vdCBmb3VyLuKAnQoKSGUgc291bmRzIHNhdGlzZmllZC4gWW91IGZlZWwgc29tZXRoaW5nIHNpbWlsYXIu',
            'ending'   => true,
        ],
        '10_end_petra' => [
            'prose'   => 'T24gdGhlIHdhdGVyIGJhY2ssIHlvdSB0aGluayBhYm91dCBoZXIuIFlvdW5nIHdvbWFuLiBQdXJwb3NlZnVsLiBIZXIgb3duIGJvYXQuCgpTaGUgd2FzbuKAmXQgZm9sbG93aW5nIHRoZSBzYW1lIG1hcCDigJQgc2hlIGNvdWxkbuKAmXQgaGF2ZSBiZWVuLCBiZWNhdXNlIHlvdXIgY29weSBvZiB0aGUgbGV0dGVyIGRpZG7igJl0IHN1cmZhY2UgdW50aWwgeW91IGZvdW5kIGl0LiBTbyBzaGUgaGFkIGRpZmZlcmVudCBpbmZvcm1hdGlvbiBhbmQgYXJyaXZlZCBhdCB0aGUgc2FtZSBwbGFjZXMuIFNoZSBpcyBzb21ld2hlcmUgYWhlYWQgb2YgeW91LCBvciBwYXJhbGxlbC4gSW4gbW9yZSBvZiBhIGh1cnJ5LgoKRnJlZCBpcyBleGFtaW5pbmcgdGhlIHJ1c2hlcyBpbiB0aGUgZmFpbGluZyBsaWdodC4g4oCcVGhlIGJ1bmRsZSBpcyBpbXBvcnRhbnQs4oCdIGhlIHNheXMsIGFwcm9wb3Mgb2Ygbm90aGluZy4g4oCcSeKAmW0gbm90IGNlcnRhaW4gd2h5IHlldC4gQnV0IGl0IGlzLuKAnQoKSmFtZXMgaXMgd2F0Y2hpbmcgdGhlIHJlZWQgYmVkcyBzbGlkZSBwYXN0IHdpdGggdGhlIHBhcnRpY3VsYXIgYXR0ZW50aW9uIGhlIHJlc2VydmVzIGZvciB0aGluZ3MgdGhhdCBhcmUgYWJvdXQgdG8gbWF0dGVyLgoKRm91ciBzcXVhcmVzLiBBIGdyYW5kbW90aGVyIHdobyBwcmVzc2VkIHlvdXIgaGFuZC4gQSBmZXJyeW1hbiB3aG8gbm90aWNlZCBldmVyeXRoaW5nIGFuZCBzYWlkIGxpdHRsZS4gQW5kIHNvbWV3aGVyZSBvdXQgdGhlcmUsIHNvbWVvbmUgZWxzZSBsb29raW5nIOKAlCB3aXRoIG1vcmUgdXJnZW5jeSB0aGFuIHlvdSwgYW5kIHByb2JhYmx5IGEgaGVhZCBzdGFydC4KCllvdSBmZWVsLCBpbiBhIHdheSB5b3UgZGlkbuKAmXQgdGhpcyBtb3JuaW5nLCB0aGF0IHlvdSBhcmUgaW4gYSByYWNlLg==',
            'ending'   => true,
        ],
    ],
];
