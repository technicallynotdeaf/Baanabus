<?php
return [
    'id'    => 10,
    'title' => 'Watched, Instead of Just Looking',
    'color' => '#A08858',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFphZ3JvcyBNb3VudGFpbnMgZm9sZCBpbiBsb25nLCBkcnkgcmlkZ2VsaW5lcyBhY3Jvc3Mgd2VzdGVybiBJcmFuLCBhbmNpZW50IG1pZ3JhdGlvbiByb3V0ZXMgdGhyZWFkaW5nIHRocm91Z2ggcGFzc2VzIHRoYXQgbm9tYWRpYyBoZXJkaW5nIGZhbWlsaWVzIGhhdmUgZm9sbG93ZWQgdHdpY2UgYSB5ZWFyLCBnZW5lcmF0aW9uIGFmdGVyIGdlbmVyYXRpb24sIGZvciBsb25nZXIgdGhhbiBhbnlvbmUncyBib3RoZXJlZCBrZWVwaW5nIHdyaXR0ZW4gY291bnQuIEdyZXRhIG1vb3JzIHRoZSBDb250b3VyIG5lYXIgYSB0cmFpbGhlYWQgbWFya2VkIGJ5IG5vdGhpbmcgbW9yZSB0aGFuIGEgY2Fpcm4gYW5kIHRoZSBmcmVzaCBldmlkZW5jZSBvZiBhIGZsb2NrIGhhdmluZyBwYXNzZWQgdGhyb3VnaCByZWNlbnRseS4KClR3byB3YXlzIHRvIGZpbmQgdGhlIHJvdXRlLWtlZXBlciBwcmVzZW50IHRoZW1zZWx2ZXM6IGZvbGxvdyB0aGUgbWlncmF0aW9uIHRyYWlsIGl0c2VsZiwgaG9waW5nIHRvIGNhdGNoIHRoZSBmYW1pbHkgZ3JvdXAgaW4gdHJhbnNpdCwgb3Igc3RvcCBmaXJzdCBhdCBhIG1vdW50YWluIHZpbGxhZ2Ugd2hlcmUgc29tZW9uZSBtaWdodCBrbm93IGV4YWN0bHkgd2hlcmUgdGhleSd2ZSBjdXJyZW50bHkgbWFkZSBjYW1wLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBtaWdyYXRpb24gdHJhaWw=', 'next' => '2_trail'],
                ['text' => 'QXNrIGluIHRoZSB2aWxsYWdlIGZpcnN0', 'next' => '2_village'],
            ],
        ],
        '2_trail' => [
            'prose'  => 'Rm9sbG93aW5nIHRoZSB0cmFpbCBtZWFucyByZWFkaW5nIHRoZSBzYW1lIGdyb3VuZCB0aGUgaGVyZGVycyB0aGVtc2VsdmVzIHJlYWQg4oCUIGZsYXR0ZW5lZCBncmFzcywgZnJlc2ggZHJvcHBpbmdzLCB0aGUgcGFydGljdWxhciBwYXR0ZXJuIG9mIGRpc3R1cmJlZCBzdG9uZXMgdGhhdCBtYXJrcyBhIGxhcmdlIGZsb2NrJ3MgcmVjZW50IHBhc3NhZ2UuIEl0J3Mgc2xvd2VyIHRoYW4geW91IGV4cGVjdGVkLCBhbmQgY29uc2lkZXJhYmx5IG1vcmUgYWJzb3JiaW5nLCB5b3VyIGF0dGVudGlvbiBuYXJyb3dpbmcgbmF0dXJhbGx5IG9udG8gc21hbGwgc2lnbnMgeW91J2QgbmV2ZXIgaGF2ZSBub3RpY2VkIGEgd2VlayBhZ28uCgpZb3UgY2F0Y2ggdXAgdG8gdGhlIGZhbWlseSBncm91cCBieSBsYXRlIGFmdGVybm9vbiwgY2FtcGVkIGluIGEgc2hlbHRlcmVkIGZvbGQgb2YgdGhlIGhpbGxzLCBkb2dzIGFubm91bmNpbmcgeW91ciBhcnJpdmFsIHdlbGwgYmVmb3JlIGFueSBwZXJzb24gZG9lcy4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '2_village' => [
            'prose'  => 'VGhlIHZpbGxhZ2UgaXMgc21hbGwsIGRyeS1zdG9uZSwgd2VsY29taW5nIGluIHRoZSB1bmh1cnJpZWQgd2F5IG9mIHBsYWNlcyB0aGF0IHNlZSByZWxhdGl2ZWx5IGZldyBvdXRzaWRlIHZpc2l0b3JzLiBBbiBvbGQgbWFuLCBvbmNlIGhlIHVuZGVyc3RhbmRzIHlvdXIgZXJyYW5kLCBsYXVnaHMg4oCUIG5vdCB1bmtpbmRseSDigJQgYW5kIHNpbXBseSBwb2ludHMgdG93YXJkIHRoZSBoaWxscy4gJ1JveWEncyBncm91cC4gRm9sbG93IHRoZSByaWRnZSB0d28gdmFsbGV5cyBvdmVyLiBTaGUnbGwgZmluZCB5b3UgYmVmb3JlIHlvdSBmaW5kIGhlciwgbW9zdCBsaWtlbHkuJwoKSGUncyByaWdodC4gWW91J3JlIGJhcmVseSBwYXN0IHRoZSBzZWNvbmQgdmFsbGV5IHdoZW4gYSBkb2cgYXBwZWFycywgdGhlbiBhIHBlcnNvbiwgdGhlbiB0aGUgd2hvbGUgcXVpZXQgZmFjdCBvZiBoYXZpbmcgYmVlbiBub3RpY2VkIGZvciBzb21lIHRpbWUgYWxyZWFkeS4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGNhbXA=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'Um95YSwgdGhlIGZhbWlseSdzIHJvdXRlLWtlZXBlciwgaXMgc29tZXdoZXJlIGluIGhlciBmaWZ0aWVzLCB3ZWF0aGVyZWQsIGVudGlyZWx5IHVuaHVycmllZCBkZXNwaXRlIGNsZWFybHkgaGF2aW5nIGEgZ3JlYXQgZGVhbCBvZiBhY3R1YWwgd29yayB0byBkby4gU2hlIGtub3dzIEF1Z3VzdGluJ3MgbmFtZSDigJQgJ3RoZSBFbmdsaXNobWFuIHdobyB0aG91Z2h0IHBhcGVyIGNvdWxkIHJlYWQgd2VhdGhlciBiZXR0ZXIgdGhhbiBhIHByb3BlciBmbG9jayBjb3VsZCcg4oCUIHdpdGggdGhlIGZvbmQsIGZhaW50bHkgZXhhc3BlcmF0ZWQgdG9uZSBvZiBzb21lb25lIHJlbWVtYmVyaW5nIGFuIG9sZCBhcmd1bWVudC4KCidJJ3ZlIG5vdGhpbmcgb2YgaGlzIHRvIGdpdmUgeW91LCcgc2hlIHNheXMuICdIZSBuZXZlciBsZWZ0IGFueXRoaW5nIHBoeXNpY2FsIGhlcmUg4oCUIG9ubHkgZXZlciB3YW50ZWQgdG8gbGVhcm4gc29tZXRoaW5nLCBhbmQgbmV2ZXIgcXVpdGUgbWFuYWdlZCBpdCBwcm9wZXJseSBiZWZvcmUgaGUgbW92ZWQgb24uJyBTaGUgc3R1ZGllcyB5b3UuICdQZXJoYXBzIHlvdSdsbCBkbyBiZXR0ZXIuIFByb3ZlIHlvdSBjYW4gcmVhZCB3aGF0J3MgY29taW5nLCB0aGUgb2xkIHdheSwgbm8gaW5zdHJ1bWVudHMuIFRoZW4gd2UnbGwgc2VlLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QWNjZXB0IHRoZSB0ZXN0', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'UmVhZGluZyB3ZWF0aGVyIHRoZSBvbGQgd2F5LCBSb3lhIGV4cGxhaW5zLCBtZWFucyB3YXRjaGluZyB0aGUgd2hvbGUgd29ybGQgYXQgb25jZSByYXRoZXIgdGhhbiBhbnkgc2luZ2xlIGRpYWwgb3IgZ2F1Z2Ug4oCUIGhvdyB0aGUgZmxvY2sgaXRzZWxmIGJlaGF2ZXMsIHJlc3RsZXNzIG9yIHNldHRsZWQsIGFuZCBob3cgdGhlIHNreSBhbmQgd2luZCBjYXJyeSB0aGVpciBvd24gc2VwYXJhdGUsIG9sZGVyIGtpbmQgb2YgaW5mb3JtYXRpb24sIGlmIHlvdSdyZSBwYXRpZW50IGVub3VnaCB0byBhY3R1YWxseSB3YXRjaCBpbnN0ZWFkIG9mIGp1c3QgZ2xhbmNpbmcuCgonV2F0Y2ggdGhlIGFuaW1hbHMgYSB3aGlsZSwnIHNoZSBzYXlzLCAnb3Igd2F0Y2ggdGhlIHNreSBhIHdoaWxlLiBFaXRoZXIgdGVhY2hlcyB0aGUgc2FtZSBsZXNzb24sIGV2ZW50dWFsbHksIGlmIHlvdSBhY3R1YWxseSBwYXkgYXR0ZW50aW9uIHJhdGhlciB0aGFuIHBlcmZvcm1pbmcgYXR0ZW50aW9uLic=',
            'choices' => [
                ['text' => 'V2F0Y2ggaG93IHRoZSBmbG9jayBiZWhhdmVz', 'next' => '5_flock'],
                ['text' => 'V2F0Y2ggdGhlIHNreSBhbmQgd2luZCBkaXJlY3RseQ==', 'next' => '5_sky'],
            ],
        ],
        '5_flock' => [
            'prose'  => 'WW91IHNwZW5kIGEgbG9uZywgcXVpZXQgc3RyZXRjaCBzaW1wbHkgd2F0Y2hpbmcgdGhlIGZsb2NrIOKAlCBzaGVlcCBkcmlmdGluZyB0b3dhcmQgc2hlbHRlciBlYXJsaWVyIHRoYW4gdXN1YWwsIGEgcmVzdGxlc3NuZXNzIGluIHRoZSBkb2dzIHRoYXQgaGFzIG5vdGhpbmcgdG8gZG8gd2l0aCB5b3VyIHByZXNlbmNlLCBzbWFsbCBiZWhhdmlvdXJhbCBzaGlmdHMgdGhhdCBtZWFuIG5vdGhpbmcgb24gdGhlaXIgb3duIGJ1dCBhZGQgdXAsIGdyYWR1YWxseSwgaW50byBhIGNsZWFyIGFuZCBzcGVjaWZpYyBwYXR0ZXJuLgoKQnkgZXZlbmluZywgeW91J3JlIGZhaXJseSBjZXJ0YWluOiB3ZWF0aGVyJ3MgdHVybmluZyB3aXRoaW4gYSBkYXksIHdvcnNlIHRoYW4gdG9kYXksIHRob3VnaCBub3QgZGFuZ2Vyb3VzbHkgc28uIFJveWEsIHdhdGNoaW5nIHlvdSB3YXRjaCwgc2F5cyBub3RoaW5nIOKAlCB3aGljaCB5b3UncmUgc3RhcnRpbmcgdG8gcmVjb2duaXNlIGFzIGhlciBwYXJ0aWN1bGFyIGZvcm0gb2YgYXBwcm92YWwu',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgeW91ciByZWFkaW5n', 'next' => '6_shared'],
            ],
        ],
        '5_sky' => [
            'prose'  => 'WW91IHNwZW5kIGEgbG9uZywgcXVpZXQgc3RyZXRjaCB3YXRjaGluZyB0aGUgc2t5IGFuZCB3aW5kIGRpcmVjdGx5IGluc3RlYWQg4oCUIGNsb3VkIGJ1aWxkaW5nIGF0IGEgcGFydGljdWxhciBhbHRpdHVkZSwgd2luZCBzaGlmdGluZyBhIGZyYWN0aW9uIG1vcmUgd2VzdGVybHkgdGhhbiBpdCdzIGJlZW4gYWxsIGRheSwgc21hbGwgY2hhbmdlcyB0aGF0IG1lYW4gbm90aGluZyBpc29sYXRlZCBidXQgYWRkIHVwLCBncmFkdWFsbHksIGludG8gYSBjbGVhciBhbmQgc3BlY2lmaWMgcGF0dGVybi4KCkJ5IGV2ZW5pbmcsIHlvdSdyZSBmYWlybHkgY2VydGFpbjogd2VhdGhlcidzIHR1cm5pbmcgd2l0aGluIGEgZGF5LCB3b3JzZSB0aGFuIHRvZGF5LCB0aG91Z2ggbm90IGRhbmdlcm91c2x5IHNvLiBSb3lhLCB3YXRjaGluZyB5b3Ugd2F0Y2gsIHNheXMgbm90aGluZyDigJQgd2hpY2ggeW91J3JlIHN0YXJ0aW5nIHRvIHJlY29nbmlzZSBhcyBoZXIgcGFydGljdWxhciBmb3JtIG9mIGFwcHJvdmFsLg==',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgeW91ciByZWFkaW5n', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J0NvcnJlY3QsJyBSb3lhIHNheXMsIGFuZCB0aGlzIHRpbWUgdGhlcmUncyByZWFsIHdhcm10aCBpbiBpdC4gJ1lvdSBhY3R1YWxseSB3YXRjaGVkLCBpbnN0ZWFkIG9mIGp1c3QgbG9va2luZy4gVGhhdCdzIHRoZSB3aG9sZSB0cmljaywgYW5kIGl0J3MgdGhlIG9uZSB0aGluZyB5b3VyIGdyYW5kZmF0aGVyLCBmb3IgYWxsIGhpcyBjYXJlZnVsIGluc3RydW1lbnRzLCBuZXZlciBxdWl0ZSBtYW5hZ2VkIHRvIHByb3Blcmx5IGxlYXJuIGZyb20gbWUuJwoKVGhlcmUncyBub3RoaW5nIHBoeXNpY2FsIHRvIGhhbmQgb3ZlciDigJQgbm8gb2JqZWN0LCBubyBwaWVjZSBmb3IgdGhlIGNhc2Ug4oCUIGJ1dCBzaGUgbm9kcyBhdCB0aGUgY2hhcnQgaXRzZWxmLCB0dWNrZWQgaW4geW91ciBiYWcuICdXcml0ZSBpdCBkb3duIHByb3Blcmx5LCBpbiB0aGUgbWFyZ2luLCBpbiB5b3VyIG93biBoYW5kLiBUaGF0J3Mgd29ydGggbW9yZSB0aGFuIGFueXRoaW5nIEkgY291bGQgZ2l2ZSB5b3UgZnJvbSBhIHNoZWxmLic=',
            'choices' => [
                ['text' => 'V3JpdGUgaXQgZG93bg==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdyaXRlIGl0IGNhcmVmdWxseSBpbnRvIHRoZSBjaGFydCdzIG1hcmdpbiB0aGF0IGV2ZW5pbmcsIHRoZSB0ZWNobmlxdWUgaXRzZWxmIG5vdyByZWNvcmRlZCBpbiB5b3VyIG93biBoYW5kIHJhdGhlciB0aGFuIGhpcyDigJQgdGhlIGZpcnN0IGdlbnVpbmVseSBuZXcgYWRkaXRpb24gdG8gdGhlIHdob2xlIGRvY3VtZW50IHNpbmNlIEF1Z3VzdGluJ3MgaW5rIHN0b3BwZWQgbWlkLWxpbmUgYWxsIHRob3NlIG1vbnRocyBhZ28uCgpHcmV0YSByZWFkcyBpdCBvdmVyIHlvdXIgc2hvdWxkZXIgd2l0aCByZWFsIHNhdGlzZmFjdGlvbi4gJ1RoYXQncyBub3Qgbm90aGluZywgeW91IGtub3cuIFRoYXQncyB0aGUgaW5zdHJ1bWVudCBmaW5hbGx5IGxlYXJuaW5nIHNvbWV0aGluZyB0aGUgb2xkIG9uZSBuZXZlciBjb3VsZC4n',
            'choices' => [
                ['text' => 'QXNrIFJveWEgaWYgTWFyZ3Vlcml0ZSBldmVyIGNhbWUgdGhyb3VnaCBoZXJlIHRvbw==', 'next' => '8_end_ask'],
                ['text' => 'TGV0IHRoZSBldmVuaW5nIGNsb3NlIHdpdGhvdXQgYXNraW5n', 'next' => '8_end_close'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzaywgYmVmb3JlIHlvdSBsZWF2ZSwgd2hldGhlciBhbnlvbmUgbmFtZWQgTWFyZ3Vlcml0ZSBldmVyIHBhc3NlZCB0aHJvdWdoIHdpdGggQXVndXN0aW4sIGFsbCB0aG9zZSB5ZWFycyBhZ28uIFJveWEgY29uc2lkZXJzIGl0IGZvciBhIGxvbmcgbW9tZW50LiAnT25jZSwgSSB0aGluay4gQSB3b21hbiB3aG8gd2F0Y2hlZCB0aGUgd2F5IEkgZG8g4oCUIHByb3Blcmx5LCBwYXRpZW50bHkuIEhlIHNlZW1lZCBoYXBwaWVyLCB0aG9zZSB3ZWVrcywgdGhhbiBlaXRoZXIgYmVmb3JlIG9yIGFmdGVyLicgU2hlIHNocnVncy4gJ1RoZW4gc2hlIGxlZnQsIGFuZCBoZSBzdGF5ZWQgYSB3aGlsZSBsb25nZXIgYWxvbmUsIGFuZCBhZnRlciB0aGF0IGhlIG5ldmVyIGNhbWUgYmFjayBhdCBhbGwuJwoKSXQncyBub3QgbXVjaC4gQnV0IGl0J3MgYW5vdGhlciBzbWFsbCBwaWVjZSBvZiBhIHBpY3R1cmUgc2xvd2x5LCBncmFkdWFsbHksIGNvbWluZyBpbnRvIGZvY3VzLg==',
            'ending' => true,
        ],
        '8_end_close' => [
            'prose'  => 'WW91IGxldCB0aGUgZXZlbmluZyBjbG9zZSB3aXRob3V0IGFza2luZywgZGVjaWRpbmcgdGhlIGRheSdzIHJlYWwgZ2lmdCDigJQgdGhlIHRlY2huaXF1ZSBpdHNlbGYsIGZyZXNobHkgZWFybmVkIGFuZCBmcmVzaGx5IHdyaXR0ZW4gZG93biDigJQgaXMgZW5vdWdoIHRvIGNhcnJ5IHdpdGhvdXQgYWxzbyByZWFjaGluZyBmb3Igd2hhdGV2ZXIgZWxzZSBSb3lhIG1pZ2h0IGtub3cuCgpUaGUgQ29udG91ciBsaWZ0cyBvZmYgaW50byBhIHNreSB5b3UgY2FuIG5vdywgYSBsaXR0bGUsIGFjdHVhbGx5IHJlYWQgZm9yIHlvdXJzZWxmLCB0aGUgWmFncm9zIHJpZGdlbGluZXMgcm9sbGluZyBhd2F5IGJlbG93IGluIHRoZSBzYW1lIGRyeSwgYW5jaWVudCBmb2xkcyB0aGV5J3ZlIGhlbGQgZm9yIGFzIGxvbmcgYXMgYW55b25lJ3MgYmVlbiBtaWdyYXRpbmcgdGhyb3VnaCB0aGVtLiBZb3Ugd2F0Y2ggdGhlIGNsb3VkcyBhIHdoaWxlLCBqdXN0IHRvIHByYWN0aWNlLCBhbmQgZmluZCB5b3UgZ2VudWluZWx5IGVuam95IGl0Lg==',
            'ending' => true,
        ],
    ],
];
