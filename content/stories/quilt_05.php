<?php
return [
    'id'    => 'q5',
    'title' => 'The Mountain Shrine',
    'color' => '#7A6B5A',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIENhcnBhdGhpYW5zIGFycml2ZSB3aXRob3V0IGFubm91bmNlbWVudC4gVGhlIHZhbGxleSByb2FkIHR1cm5zIGEgY29ybmVyIGFuZCB0aGVyZSB0aGV5IGFyZSDigJQgZ3JleSBhbmQgZW5vcm1vdXMsIGR1c3RlZCBhYm92ZSB0aGUgdHJlZWxpbmUgd2l0aCBzb21ldGhpbmcgdGhhdCBtaWdodCBiZSBzbm93IG9yIG1pZ2h0IGJlIGNsb3VkLgoKVGhlIHZpbGxhZ2UgYXQgdGhlIGZvb3Qgc2VsbHMgYnJlYWQgZnJvbSBhIHdvb2RlbiBjb3VudGVyLiBGcmVkIGFwcGVhcmVkIHRocmVlIG1pbnV0ZXMgYWdvIGZyb20gdGhlIGRpcmVjdGlvbiBvZiBhIGZpZWxkIGJvdW5kYXJ5LCBtaWQtc2VudGVuY2UgYWJvdXQgYSBzZWRnZS4gSGUgaXMgbm93IHdhbGtpbmcgYmVzaWRlIHlvdSBhcyB0aG91Z2ggdGhpcyB3YXMgYWx3YXlzIHBsYW5uZWQuCgpKYW1lcywgb24geW91ciBzaG91bGRlciwgc3R1ZGllcyB0aGUgbW91bnRhaW5zIHdpdGggYSBzdGlsbG5lc3MgdGhhdCBtZWFucyBoZSBoYXMgYXNzZXNzZWQgdGhlIHNpdHVhdGlvbiBhbmQgaXMgcHJlcGFyZWQgZm9yIGl0IHRvIHRha2UgYSB3aGlsZS4KCuKAnFR3byB3YXlzIHVwLOKAnSBGcmVkIHNheXMuIEhlIGFwcGVhcnMgdG8gaGF2ZSBhY3F1aXJlZCBhIHJvdXRlIHNrZXRjaCBmcm9tIHNvbWV3aGVyZS4g4oCcVGhlIHJpZGdlIHJvYWQg4oCUIGNvbGQsIGdvb2Qgdmlld3MsIGV4cG9zZWQuIE9yIHRoZSBzaGVwaGVyZOKAmXMgcGF0aCB0aHJvdWdoIHRoZSBsb3dlciBwYXN0dXJlcy4gRWl0aGVyIHdheSwgdGhlIHN1bW1pdC7igJ0KCkhlIHR1Y2tzIHRoZSBza2V0Y2ggaW50byBoaXMgZmVhdGhlcnMuIEhlIHNheXMgdGhpcyBpbiB0aGUgbWFubmVyIG9mIHNvbWVvbmUgd2hvIGhhcyBhbHJlYWR5IGRlY2lkZWQu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgaGlnaCByaWRnZSByb2Fk', 'next' => '2_high'],
                ['text' => 'Rm9sbG93IHRoZSBwYXN0dXJlIHBhdGg=', 'next' => '2_shepherd'],
            ],
        ],
        '2_high' => [
            'prose'   => 'VGhlIHJpZGdlIHJvYWQgdGFrZXMgYWx0aXR1ZGUgZGlyZWN0bHkuIEJ5IHRoZSBmaXJzdCBob3VyIHRoZSB2YWxsZXkgaXMgYSBzdWdnZXN0aW9uIGJlbG93IGFuZCB0aGUgY29sZCBoYXMgc2V0dGxlZCBpbiDigJQgbm90IGFnZ3Jlc3NpdmUsIHNpbXBseSBwcmVzZW50LCB0aGUgd2F5IHN0b25lIGlzIHByZXNlbnQuCgpGcmVkIGlkZW50aWZpZXMgdGhyZWUgbGljaGVuIHNwZWNpZXMgb24gdGhlIHJvY2sgZmFjZSBhbmQgZXhwbGFpbnMgdGhlaXIgYWdlIHJhbmdlcyB3aXRoIHRoZSBjYWxtIG9mIHNvbWVvbmUgZm9yIHdob20gY2VudHVyaWVzIGFyZSBhIHJlYXNvbmFibGUgdW5pdC4gSmFtZXMgcHV0cyBoaXMgaGVhZCBvdXQgb2YgaGlzIGNhcnJ5aW5nIGJhZywgY29uc2lkZXJzIHRoZSB3aW5kLCBhbmQgcmV0cmVhdHMuCgpUaGUgc3VtbWl0IGFwcGVhcnMgYXQgaW50ZXJ2YWxzIGJldHdlZW4gcmlkZ2VsaW5lczogZ3JleSwgYmFyZSwgY29tcGxldGVseSBob25lc3QgYWJvdXQgd2hhdCBpdCBpcy4KCuKAnEdlbnRpYW5hIG5pdmFsaXMs4oCdIEZyZWQgc2F5cywgcG9pbnRpbmcgYXQgc29tZXRoaW5nIHNtYWxsIGFuZCBibHVlIGF0IHRoZSBwYXRo4oCZcyBlZGdlLiDigJxBbmQgdGhlcmUg4oCUIERyeWFzIG9jdG9wZXRhbGEsIHdoaWNoIG1lYW5zIHdl4oCZcmUgYXQgdGhlIHJpZ2h0IGFsdGl0dWRlLuKAnSBIZSBzb3VuZHMgcGxlYXNlZCwgYXMgdGhvdWdoIHRoZSBtb3VudGFpbiBoYXMgcGFzc2VkIHNvbWUga2luZCBvZiBhc3Nlc3NtZW50LgoKWW91ciBmaW5nZXJzIGFyZSBjb2xkIGRlc3BpdGUgdGhlIGdsb3Zlcy4gRnJlZOKAmXMgY29tbWVudGFyeSBpcywgdW5leHBlY3RlZGx5LCBhIGZvcm0gb2Ygd2FybXRoLg==',
            'choices' => [
                ['text' => 'Q29udGludWUgdXAgdGhlIHJpZGdl', 'next' => '3_rush'],
            ],
        ],
        '2_shepherd' => [
            'prose'   => 'VGhlIHBhc3R1cmUgcGF0aCBydW5zIHRocm91Z2ggZ3Jhc3Mga2VwdCBjbG9zZSBieSBzaGVlcCBhbmQgc2Vhc29uLiBUaGUgc2hlZXAgd2F0Y2ggd2l0aCB0aGUgY29uc2lkZXJlZCBpbmRpZmZlcmVuY2Ugb2YgYW5pbWFscyB0aGF0IGhhdmUgcmVnaXN0ZXJlZCB5b3UgYXMgbm90IHRocmVhdGVuaW5nIGFuZCBub3QgdXNlZnVsLgoKRnJlZCBpZGVudGlmaWVzIHBsYW50cyBhdCB0aGUgdXN1YWwgZnJlcXVlbmN5LiBIZSBpcyBwYXJ0aWN1bGFybHkgaW50ZXJlc3RlZCBpbiBhIHNlZGdlIHRoYXQgc2VlbXMgb3V0IG9mIHJhbmdlIGFuZCB0YWtlcyBhIGNsaXBwaW5nLCB3cmFwcGluZyBpdCBpbiBjbG90aCB3aXRoIHRoZSBjYXJlIG9mIHNvbWVvbmUgcHJlc2VydmluZyBldmlkZW5jZS4KCkphbWVzIG1vdmVzIGZyb20geW91ciBzaG91bGRlciB0byB5b3VyIGNvbGxhciwgd2hpY2ggbWVhbnMgaGUgZmluZHMgdGhlIHRlcnJhaW4gYWNjZXB0YWJsZS4KClRoZSBwYXRoIGhhcyB0aGUgcXVhbGl0eSBvZiBsb25nIHVzZSDigJQgd29ybiBpbiB0aGUgd2F5IHRoYXQgbWVhbnMgYSBodW5kcmVkIHllYXJzIG9mIGZlZXQsIG5vdCBhIHRob3VzYW5kLiBJdCBsZWFkcyB1cCBieSBkZWdyZWVzIHRocm91Z2ggcGFzdHVyZSB0aGF0IGdyYWR1YWxseSBiZWNvbWVzIGhpbGxzaWRlLiBBdCB0aGUgZmFyIGVkZ2Ugb2YgdGhlIGZpZWxkLCBhIG1hbiBpcyByZXBhaXJpbmcgYSBzdG9uZSB3YWxsIHdpdGggdGhlIHBhdGllbnQgcGVyc2lzdGVuY2Ugb2Ygc29tZW9uZSB3aG8gaGFzIG1hZGUgaGlzIHBlYWNlIHdpdGggdGhlIHBlcm1hbmVuY2Ugb2YgdGhlIHdvcmsuCgpIZSBsb29rcyB1cCBhcyB5b3UgYXBwcm9hY2guIEhlIHdhaXRzLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIG1hbiBhdCB0aGUgd2FsbA==', 'next' => '3_herd'],
            ],
        ],
        '3_rush' => [
            'prose'   => 'TmVhciB0aGUgc3VtbWl0IGFwcHJvYWNoLCB0aGUgcGF0aCBjdXJ2ZXMgYXJvdW5kIGEgcm9jayBvdXRjcm9wLCBhbmQgRnJlZCBzdG9wcy4KCkhlIGdvZXMgc3RpbGwgdGhlIHNwZWNpZmljIHdheSBoZSBnb2VzIHN0aWxsIHdoZW4gc29tZXRoaW5nIGJvdGFuaWNhbCBtYXR0ZXJzLiBZb3UgZm9sbG93IGhpcyBsaW5lIG9mIHNpZ2h0IHRvIHRoZSBzaGFkb3cgYmVsb3cgdGhlIHJvY2s6IGEgY2x1c3RlciBvZiBydXNoZXMuIFRoZSBzYW1lIHNwZWNpZXMgYXMgdGhlIGJ1bmRsZSBpbiB5b3VyIHBhY2ssIGdyb3dpbmcgYXQgYWx0aXR1ZGUsIGluIHRoaW4gc29pbCwgYWdhaW5zdCBhbGwgZXhwZWN0YXRpb24uCgrigJxVbmRlcmdyb3VuZCB3YXRlcizigJ0gRnJlZCBzYXlzLiDigJxIZXJlLiBDbG9zZS7igJ0gSGUgbW92ZXMgdG8gdGhlIG91dGNyb3AgZmFjZSBhbmQgcHJlc3NlcyBhbG9uZyB0aGUgYmFzZSB1bnRpbCBoaXMgY2xhdyBmaW5kcyB0aGUgY3JhY2suIFRoZSBzcHJpbmcgaXMgdGhlcmU6IGEgdGhpbiB0aHJlYWQgb2Ygd2F0ZXIsIGNvbGQgYXMgaXJvbiwgcnVubmluZyBmcm9tIHRoZSBzdG9uZS4KCkFib3ZlIGl0LCB3b3JuIGJ1dCBsZWdpYmxlOiBhIHNtYWxsIGFycm93LCBzY3JhdGNoZWQgaW50byB0aGUgcm9jay4gUG9pbnRpbmcgaGlnaGVyLgoKRnJlZCBzdHVkaWVzIGl0IGZvciBhIGxvbmcgbW9tZW50LgoK4oCcU2hlIGxlZnQgYSBtYXJrLOKAnSBoZSBzYXlzLiBRdWlldGx5LCBub3QgcXVpdGUgdG8geW91LiBQcm9jZXNzaW5nLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBhcnJvdyB1cCB0byB0aGUgc2hyaW5l', 'next' => '4_hut'],
            ],
        ],
        '3_herd' => [
            'prose'   => 'VGhlIG1hbiBzZXRzIGRvd24gaGlzIG1hbGxldCB3aGVuIHlvdeKAmXJlIGNsb3NlIGVub3VnaCB0byBzcGVhay4gSGUgd2FpdHMuCgpZb3UgcHJvZHVjZSB0aGUgcnVzaCBidW5kbGUuCgpIaXMgZXhwcmVzc2lvbiBzaGlmdHMg4oCUIG5vdCBzdXNwaWNpb24gYnV0IHRoZSBxdWlja2VyIHJlY29nbml0aW9uIG9mIHNvbWVvbmUgc2VlaW5nIGEgdGhpbmcgaW4gdGhlIHdyb25nIHBsYWNlLiDigJxWYWxsZXkgcnVzaGVzIGF0IGFsdGl0dWRlLOKAnSBoZSBzYXlzLiDigJxXaGVyZSBkaWQgdGhvc2UgY29tZSBmcm9tP+KAnQoKWW91IGV4cGxhaW4sIHJvdWdobHkuCgpIZSBub2RzLiDigJxTYW1lIHBsYW50IGdyb3dzIG5lYXIgb3VyIGhpZ2ggc3ByaW5nLiBGb2xsb3dzIHRoZSB1bmRlcmdyb3VuZCB3YXRlci4gVGhlIHNwcmluZ+KAmXMgYWJvdmUgaGVyZSwgbmVhciB0aGUgb2xkIHNocmluZSDigJQgcm9jayBvdXRjcm9wLCBjcmFjayBpbiB0aGUgZmFjZS4gU29tZW9uZSBjYXJ2ZWQgYW4gYXJyb3cgYWJvdmUgaXQgbG9uZyBhZ28sIGJlZm9yZSBteSBncmFuZGZhdGhlcuKAmXMgdGltZS7igJ0gSGUgcGlja3MgdXAgaGlzIG1hbGxldC4g4oCcUG9pbnRzIHRvIHdoZXJlIHlvdeKAmXJlIGdvaW5nLuKAnQoKSGUgc2F5cyBub3RoaW5nIGVsc2UuIEl0IGlzIHRoZSBleGFjdCByaWdodCBhbW91bnQgb2YgaW5mb3JtYXRpb24u',
            'choices' => [
                ['text' => 'SGVhZCB1cCB0b3dhcmQgdGhlIHNwcmluZyBhbmQgc2hyaW5l', 'next' => '4_hut'],
            ],
        ],
        '4_hut' => [
            'prose'   => 'VGhlIGh1dCBwYXJ0d2F5IHVwIGV4aXN0cyBiZWNhdXNlIG1vdW50YWlucyByZXF1aXJlIHRoZW06IHNtYWxsLCB3YXJtLCBzbW9rZS1ibGFja2VuZWQgYWJvdmUgdGhlIGZpcmUsIHN0dXJkeSBpbiB0aGUgd2F5IHRoaW5ncyBhcmUgc3R1cmR5IHdoZW4gdGhleSBoYXZlIGJlZW4gdGVzdGVkIHJlcGVhdGVkbHkuCgpUaGUgc2hlcGhlcmQg4oCUIHdoZXRoZXIgdGhlIHNhbWUgbWFuIGZyb20gdGhlIHdhbGwgb3IgaGlzIGNvdXNpbjsgbW91bnRhaW4gZmFtaWxpZXMgb2NjdXB5IGEgbGFuZHNjYXBlIHRoZSB3YXkgc3RvbmUgZG9lcywgd2l0aCBwZXJtYW5lbmNlIOKAlCBzZXRzIGRvd24gc291cCB3aXRob3V0IGJlaW5nIGFza2VkLgoKSmFtZXMgY2xpbWJzIGZyb20geW91ciBzaG91bGRlciBhbmQgc2l0cyBuZWFyIHRoZSBmaXJlIHdpdGggdGhlIHBhcnRpY3VsYXIgc2F0aXNmYWN0aW9uIG9mIHNvbWV0aGluZyB0aGF0IGhhcyBiZWVuIGNvbGQgZm9yIGxvbmdlciB0aGFuIGNvbWZvcnRhYmxlLiBUaGUgc2hlcGhlcmQgcGxhY2VzIGEgcGllY2Ugb2YgYnJlYWQgb24gdGhlIGZsYWdzdG9uZSBhdCBoaXMgbGV2ZWwsIHdpdGhvdXQgbG9va2luZyBhdCBoaW0uIEphbWVzIGFjY2VwdHMgaXQuCgpGcmVkIGRlc2NyaWJlcyB0aGUgYWx0aXR1ZGUtYWRhcHRlZCBzcGVjaWVzIGhlIGZvdW5kIG9uIHRoZSB3YXkgdXAuIFRoZSBzaGVwaGVyZCBsaXN0ZW5zIGFzIHRob3VnaCB0aGlzIGNvbmZpcm1zIHRoaW5ncyBoZSBhbHJlYWR5IGtuZXcgYWJvdXQgaGlzIG93biBtb3VudGFpbi4KCkFib3ZlOiBiYXJlIHJvY2ssIHRoZSBjYWlybiwgYW5kIHdoYXRldmVyIGlzIGluc2lkZSBpdC4=',
            'terminal' => true,
            'choices' => [
                ['text' => 'SGVhZCB1cCB0byB0aGUgc3VtbWl0IHNocmluZQ==', 'next' => '5_summit'],
            ],
        ],
        '5_summit' => [
            'prose'   => 'VGhlIGZpbmFsIGNsaW1iIGlzIGNvbGQgYW5kIGRpcmVjdC4KCkZyZWQgdHVja3MgY2xvc2VyIHRvIHlvdXIgbmVjaywgd2hpY2ggaXMgaGlzIHdheSBvZiBjb25zZXJ2aW5nIGhlYXQgd2hpbGUgc3RpbGwgaWRlbnRpZnlpbmcgcGxhbnRzIGF0IGEgcmVkdWNlZCB2b2x1bWUuIEphbWVzIHN0YXlzIGluIGhpcyBiYWcsIGV5ZXMganVzdCB2aXNpYmxlLCB3YXRjaGluZyB0aGUgc3VtbWl0IGFwcHJvYWNoIHdpdGggaGlzIGZ1bGwgYXR0ZW50aW9uLgoKVGhlIHN1bW1pdCBpcyBiYXJlIHN0b25lIGFuZCBhIHNreSB5b3UgYXJlIG11Y2ggY2xvc2VyIHRvIHRoYW4gdXN1YWwuIFRoZSBjYWlybiBpcyB0aGVyZTogYSBsb3cgcGlsZSBvZiBzdG9uZXMsIGVhY2ggb25lIHNldHRsZWQgaW50byB0aGUgbmV4dCB0aGUgd2F5IHRoaW5ncyBzZXR0bGUgd2hlbiBubyBvbmUgaGFzIG1vdmVkIHRoZW0gaW4gYSBsb25nIHRpbWUuIEJlc2lkZSBpdDogYW4gYWxjb3ZlIGluIHRoZSByb2NrIGZhY2UsIHNoZWx0ZXJlZCBmcm9tIHRoZSB3aW5kLgoKSW5zaWRlOiBhIHdvb2RlbiBjaGVzdC4gT2xkLCBidXQgc291bmQg4oCUIHRoZSB3b29kIGRhcmsgd2l0aCBvaWwgb3IgcmVzaW4sIHNlYWxlZCBhZ2FpbnN0IGRlY2FkZXMgb2Ygd2VhdGhlci4gTm8ga2V5aG9sZS4gSXRzIGxhdGNoIGlzIGEgc2VyaWVzIG9mIHNtYWxsIGludGVybG9ja2VkIHNsaWRpbmcgcGllY2VzLCBlYWNoIGNvbm5lY3RlZCB0byB0aGUgbmV4dDogYSBwdXp6bGUuIE5vdCBhIGtleS4gQSBtZWNoYW5pc20gcmVxdWlyaW5nIHBhdGllbmNlLgoKSmFtZXMgc3RlcHMgZnJvbSB5b3VyIHNob3VsZGVyIG9udG8gdGhlIGxpZCBvZiB0aGUgY2hlc3QgYW5kIHNpdHMgZG93bi4gSGUgd2VpZ2hzIGFsbW9zdCBub3RoaW5nLiBIaXMgc2l0dGluZyB0aGVyZSBmZWVscywgc29tZWhvdywgc3BlY2lmaWMu',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2l0IHdpdGggdGhlIHB1enpsZSB1bnRpbCBpdCB5aWVsZHM=', 'next' => '6_inside'],
            ],
        ],
        '6_inside' => [
            'prose'   => 'VGhlIGxhdGNoIHJlc29sdmVzIGFsbCBhdCBvbmNlIOKAlCBub3Qgd2l0aCBmb3JjZSwgYnV0IHdpdGggdGhlIHBhcnRpY3VsYXIgY2xpY2sgb2Ygc29tZXRoaW5nIHRoYXQgd2FzIGFsd2F5cyBnb2luZyB0byBvcGVuLCBqdXN0IG5vdCB5ZXQuCgpJbnNpZGU6IFNxdWFyZSAjNS4gU25vdy1jYXBwZWQgcGVha3MgYWJvdmUgY2xvdWQsIGluIGdyZXkgdGhyZWFkIG9uIHdoaXRlIHNpbGssIGFuZCB0aGUgdGhyZWFkIGNhdGNoZXMgdGhlIGxpZ2h0IGluIGEgd2F5IHlvdSBkaWRu4oCZdCBleHBlY3QuIE5vdCBwYWludGVkIHNreSBidXQgZW1icm9pZGVyZWQgc2t5LCBhbmQgdGhleSBhcmUgZGlmZmVyZW50IHRoaW5ncy4KCk9uIHRoZSBpbnRlcmlvciBsaWQ6IGEgcnVuZSwgY2FydmVkIGRlZXAuIEEgc2luZ2xlIGNoYXJhY3Rlci4gRGVsaWJlcmF0ZSwgdW5odXJyaWVkIOKAlCBncmFuZG1vdGhlcuKAmXMgaGFuZC4gWW91IGRvbuKAmXQga25vdyB3aGF0IGl0IG1lYW5zLiBKYW1lcyBsb29rcyBhdCBpdCB3aXRoIHRoZSBhdHRlbnRpb24gaGUgdXN1YWxseSByZXNlcnZlcyBmb3IgYW5pbWFscyBoZSBoYXNu4oCZdCBkZWNpZGVkIGFib3V0IHlldC4KCkZyZWQgZXhhbWluZXMgdGhlIG5lZWRsZXdvcmsgd2l0aCBvbmUgZXllIGNsb3NlZC4g4oCcRXhjZWxsZW50IHRlbnNpb24s4oCdIGhlIHNheXMgYWRtaXJpbmdseS4g4oCcU2hlIGtuZXcgd2hhdCBzaGUgd2FzIGRvaW5nLuKAnSBIZSBub3RpY2VzIHRoZSBydW5lLiBIZSBnb2VzIHF1aWV0LCB3aGljaCBpcyBtb3JlIHVudXN1YWwgdGhhbiB0aGUgY29tcGxpbWVudC4=',
            'choices' => [
                ['text' => 'U3RheSB1bnRpbCBkYXJrIGFuZCByZS1yZWFkIHRoZSBsZXR0ZXI=', 'next' => '7_night'],
            ],
        ],
        '7_night' => [
            'prose'   => 'VGhlIHNoZWx0ZXIgaXMgd2hlcmV2ZXIgdGhlIG1vdW50YWluIHByb3ZpZGVzIGl0OiBsb3ctcm9vZmVkLCBkcnksIGRlZXBlciBpbnRvIHRoZSByb2NrIHRoYW4gaXQgbG9va3MgZnJvbSBvdXRzaWRlLiBUaGUgd2luZCwgYmV5b25kIHRoZSBkb29yLCBkb2VzIHNvbWV0aGluZyBjb25zdGFudCBhbmQgcHJlY2lzZS4gSW5zaWRlOiBjb2xkIHlvdSBjYW4gbWFuYWdlLCB0aGUgc21lbGwgb2Ygc3RvbmUsIGFuZCBzb21ldGhpbmcgcmVzaW5vdXMgZnJvbSB0aGUgd29vZC4KCllvdSByZS1yZWFkIHRoZSBsZXR0ZXIuIFRoZSB3b3JkcyBoYXZlbuKAmXQgY2hhbmdlZCBzaW5jZSB0aGUgYXR0aWMsIGJ1dCBzb21ldGhpbmcgaGFzIOKAlCB0aGUgd2VpZ2h0IGJlaGluZCB0aGVtLCBvciB5b3VyIGFiaWxpdHkgdG8gZmVlbCBpdC4gU2hlIHdyb3RlIGtub3dpbmcgc29tZW9uZSB3b3VsZCBiZSBoZXJlLCBleGFjdGx5IGhlcmUsIGluIHRoZSBjb2xkIGFuZCB0aGUgZGFyay4gU2hlIHdyb3RlIGFzc3VtaW5nIHBhdGllbmNlLgoKVGhlIG1vdW50YWluIGlzIHZlcnkgbGFyZ2UuIFlvdSBoYWQgdGhvdWdodCwgc29tZXdoZXJlIGJldHdlZW4gdGhlIGZpcnN0IHNxdWFyZSBhbmQgdGhpcyBvbmUsIHRoYXQgeW91IHVuZGVyc3Rvb2Qgd2hhdCB5b3Ugd2VyZSBkb2luZy4KCllvdSBhcmUgbGVzcyBjZXJ0YWluIG5vdywgYW5kIGluIGEgd2F5IHRoYXQgaXMgbm90IGZyaWdodGVuaW5nIGJ1dCBpcyBub3QgY29tZm9ydGFibGUgZWl0aGVyLgoKSmFtZXMgaXMgYXNsZWVwLiBGcmVkIGlzIHN0aWxsLiBUaGUgd2luZCBkb2VzIG5vdCBzdG9wLg==',
            'choices' => [
                ['text' => 'RGVzY2VuZCBpbiB0aGUgbW9ybmluZw==', 'next' => '8_descent'],
            ],
        ],
        '8_descent' => [
            'prose'   => 'VGhlIGRlc2NlbnQgdGFrZXMgaGFsZiB0aGUgdGltZSB0aGUgYXNjZW50IGRpZC4gTGVncyBrbm93IHRoZSB3YXkgZG93biBiZWZvcmUgdGhlIG1pbmQgZG9lcy4KClRoZSB3YXlzdGF0aW9uIG9uIHRoZSBsb3dlciBzbG9wZSBpcyBrZXB0IGJ5IGEgd29tYW4gd2hvIHNwZWFrcyB0aHJlZSBsYW5ndWFnZXMgYW5kIGFwcGVhcnMgdG8gaGF2ZSBvcGluaW9ucyBhYm91dCBhbGwgb2YgdGhlbS4gU2hlIHB1dHMgc29tZXRoaW5nIHdhcm1pbmcgaW4gYSBjbGF5IGN1cCBhbmQgc2V0cyBhIGJvd2wgb2Ygc291cCBiZXNpZGUgaXQuCgpUaGUgc2hlcGhlcmQgYXJyaXZlcyBzaG9ydGx5IGFmdGVyIHlvdSBkby4gSGUgc2l0cyBhY3Jvc3MgdGhlIHRhYmxlIGFuZCBwcm9kdWNlcyBhIHNtYWxsIGxlYXRoZXIgcG91Y2ggZnJvbSBoaXMgY29hdC4KCuKAnE1vdW50YWluIHNhbHQs4oCdIGhlIHNheXMuIOKAnEdvb2QgZm9yIGV2ZXJ5dGhpbmcu4oCdIEhlIHNldHMgaXQgZG93biBpbiBmcm9udCBvZiB5b3Ugd2l0aG91dCBmdXJ0aGVyIGV4cGxhbmF0aW9uLgoKRnJlZCBvcGVucyB0aGUgcG91Y2ggaW1tZWRpYXRlbHkuIOKAnE1pbmVyYWwtcmljaCBldmFwb3JpdGUs4oCdIGhlIHNheXMuIOKAnFNwZWNpZmljIGdlb2xvZ2ljYWwgc2lnbmF0dXJlIOKAlCBlYXN0ZXJuLWZhY2luZyBkZXBvc2l0LCBmcm9tIHRoZSBsYXllciBiZWxvdyB0aGUgc2hyaW5lLuKAnSBIZSBwYXVzZXMuIOKAnFNoZSB3b3VsZCBoYXZlIGNvbGxlY3RlZCBhIHNhbXBsZS4gU2hlIHdvdWxkIGhhdmUga25vd24gZXhhY3RseSB3aGF0IHRoaXMgd2FzLuKAnQoKSmFtZXMgaGFzIGJlZW4gYXNsZWVwIHNpbmNlIHRoZSBkZXNjZW50LiBIZSBkb2VzIG5vdCB3ZWlnaCBpbi4=',
            'choices' => [
                ['text' => 'VGhpbmsgYWJvdXQgd2hhdCBsZWQgdG8gdGhlIGxhdGNoIG9wZW5pbmc=', 'next' => '9_end_salt'],
                ['text' => 'VGhpbmsgYWJvdXQgdGhlIHJ1bmUgb24gdGhlIGxpZA==', 'next' => '9_end_rune'],
            ],
        ],
        '9_end_salt' => [
            'prose'   => 'VGhlIHJ1c2hlcyBsZWQgdG8gdGhlIHNwcmluZy4gVGhlIHNwcmluZyBsZWQgdG8gdGhlIGFycm93LiBUaGUgYXJyb3cgbGVkIHRvIHRoZSBzaHJpbmUuIFRoZSBzaHJpbmUgaGFkIHRoZSBjaGVzdC4gVGhlIGNoZXN0IG9wZW5lZCDigJQgbm90IHdpdGggZm9yY2UsIGJ1dCB3aXRoIHRoZSBwYXRpZW5jZSB0aGUgbWVjaGFuaXNtIHdhcyBidWlsdCBmb3IuCgpTaGUgbGVmdCBhIHRyYWlsIGZvciB3aG9ldmVyIGNhbWUgd2l0aCB0aGUgcmlnaHQgb2JqZWN0cywgdGhlIHJpZ2h0IGF0dGVudGl2ZW5lc3MsIHRoZSByaWdodCBwYXJyb3QuIEZyZWQgaXMgbGFiZWxsaW5nIHRoZSBzYWx0IGNyeXN0YWxzIGluIGhpcyBub3RlYm9vayB3aXRoIGEgY2FyZWZ1bCBub3RhdGlvbiB0aGF0IHlvdSByZWNvZ25pc2UsIGFmdGVyIGEgbW9tZW50LCBhcyB0aGUgc2FtZSBzeXN0ZW0gYXMgZ3JhbmRtb3RoZXLigJlzIGJvdGFuaWNhbCBsYWJlbHMuIEhlIGRvZXNu4oCZdCBhcHBlYXIgdG8gaGF2ZSBub3RpY2VkIHRoaXMuIFlvdSBkb27igJl0IG1lbnRpb24gaXQuCgpUaGUgbW91bnRhaW4gc2FsdCBzaXRzIGluIHlvdXIgcGFjay4gSXQgaXMgaGVhdmllciB0aGFuIHNhbHQgb3VnaHQgdG8gYmUsIGluIHRoZSB3YXkgdGhhdCB1c2VmdWwgdGhpbmdzIGFyZSDigJQgdGhpbmdzIHRoYXQgY2FycnkgZm9yd2FyZC4KCkphbWVzIG9wZW5zIGhpcyBleWVzIGFuZCBsb29rcyBhdCB0aGUgbW91bnRhaW4gdGhyb3VnaCB0aGUgd2F5c3RhdGlvbiB3aW5kb3cuIFRoZSBtb3VudGFpbiBsb29rcyBiYWNrIGluIHRoZSB3YXkgbW91bnRhaW5zIGRvOiB3aXRob3V0IGFja25vd2xlZGdtZW50LCB3aXRob3V0IGluZGlmZmVyZW5jZS4gSnVzdCBwcmVzZW5jZS4=',
            'ending'   => true,
        ],
        '9_end_rune' => [
            'prose'   => 'VGhlIHJ1bmUgb24gdGhlIGxpZCBpcyBhIHNpbmdsZSBjaGFyYWN0ZXIsIGdyYW5kbW90aGVy4oCZcyBoYW5kLCBjYXJ2ZWQgYmVmb3JlIHRoZSBjaGVzdCB3YXMgc2VhbGVkLiBTaGUgcHV0IGl0IHRoZXJlIGtub3dpbmcgdGhlIHBlcnNvbiB3aG8gZm91bmQgdGhlIHNxdWFyZSB3b3VsZCBhbHNvIGZpbmQgdGhlIHdhcm5pbmcuCgpGcmVkIGhhcyBiZWVuIHF1aWV0IHNpbmNlIHlvdSBzaG93ZWQgaXQgdG8gaGltLiBIZSBoYXMgc2VlbiBpdCBiZWZvcmUsIGluIGEgYm9vayB3aG9zZSB0aXRsZSBoZSBjYW7igJl0IHJlY2FsbC4gVGhpcyBpcyB0aGUgZmlyc3QgdGhpbmcgb24gdGhlIHdob2xlIGpvdXJuZXkgaGUgaGFzIG5vdCBiZWVuIGFibGUgdG8gcmVzb2x2ZSBieSB0YWxraW5nLCBhbmQgc28gaGUgaXMgcmVzb2x2aW5nIGl0IHRoZSBvbmx5IG90aGVyIHdheSBhdmFpbGFibGU6IGJ5IGJlaW5nIHN0aWxsIGFuZCB3YWl0aW5nLgoKSmFtZXMsIHNpbmNlIHRoZSBkZXNjZW50LCBoYXMgYmVlbiB3YXRjaGluZyBhaGVhZC4gTm90IHRoZSBtb3VudGFpbiBiZWhpbmQgeW91IOKAlCB0aGUgZGlyZWN0aW9uIG9mIHRyYXZlbC4KClRoZSBzYWx0IGlzIGluIHlvdXIgcGFjay4gVGhlIHNxdWFyZSBpcyBpbiB5b3VyIGJhZy4gVGhlIHJ1bmUgaXMgaW4geW91ciBtZW1vcnkuCgpTb21ldGhpbmcgZ3JhbmRtb3RoZXIgd2FudGVkIHRvIHdhcm4geW91IGFib3V0IGlzIGFoZWFkIG9mIHlvdSwgb3IgcnVubmluZyBwYXJhbGxlbC4gSXQgaGFzIGEgc2hhcGUgbm93IHRoYXQgaXQgZGlkbuKAmXQgaGF2ZSB0aGlzIG1vcm5pbmcuIFRoYXQgaXMgZW5vdWdoIHRvIGtub3cgZm9yIHRoZSBtb21lbnQu',
            'ending'   => true,
        ],
    ],
];
