<?php
return [
    'id'    => 'q12',
    'title' => 'The Midsummer Fair',
    'color' => '#B89020',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIGNyb3Nzcm9hZHMgdG93biBoYXMgdHVybmVkIGl0c2VsZiBpbnNpZGUgb3V0IGZvciBtaWRzdW1tZXIg4oCUIGJ1bnRpbmcgc3RydW5nIGJldHdlZW4gZXZlcnkgd2luZG93IHRoYXQgb3ducyBvbmUsIHN0YWxscyB0aHJlZSBkZWVwIGFsb25nIHRoZSBtYWluIHN0cmVldCwgYSBmaWRkbGUgZ29pbmcgc29tZXdoZXJlIHlvdSBjYW4ndCB5ZXQgc2VlLiBGcmVkIGhhcyBvcGluaW9ucyBhYm91dCB0aGUgZmxvd2VyIHN0YWxscyBhbHJlYWR5LCBmcm9tIGEgZGlzdGFuY2UsIGJlZm9yZSB5b3UndmUgZXZlbiBwcm9wZXJseSBhcnJpdmVkLgoKVGhlIHByZXNzZWQgd2lsZGZsb3dlciByaWRlcyBpbiB0aGUgYm90YW5pY2FsIGJvb2sgYWdhaW5zdCBoaXMgY2hlc3QsIHdyYXBwZWQgdHdpY2UgbW9yZSB0aGFuIGl0IHN0cmljdGx5IG5lZWRzIHRvIGJlLiBIZSBoYXMgbm90IHN0b3BwZWQgdGFsa2luZyBhYm91dCBpdCBzaW5jZSBZb3Jrc2hpcmUuCgpUd28gdGhyZWFkcyBwdWxsIGF0IHlvdSBhcyB5b3UgY29tZSBpbnRvIHRoZSBzcXVhcmUuIEEgYmFubmVyIG92ZXIgYnkgdGhlIGNodXJjaCBoYWxsIHJlYWRzIEJPVEFOSUNBTCBTT0NJRVRZIOKAlCBBTk5VQUwgRVhISUJJVCwgYW5kIEZyZWQgaXMgYWxyZWFkeSBsZWFuaW5nIHRoYXQgZGlyZWN0aW9uIHdpdGggaGlzIHdob2xlIGJvZHkuIEFuZCBwYXN0IHRoZSBmaWRkbGVyLCBuZWFyIGEgc3RyaXBlZCB0ZW50IGh1bmcgd2l0aCBxdWlsdGVkIHNxdWFyZXMsIGEgZmFtaWxpYXIgZGFyayBoZWFkIGlzIHZpc2libGUgZm9yIGV4YWN0bHkgYXMgbG9uZyBhcyBpdCB0YWtlcyB0byBiZSBzdXJlLCB0aGVuIGdvbmUgaW50byB0aGUgY3Jvd2Qu',
            'choices' => [
                ['text' => 'Rm9sbG93IEZyZWQgdG8gdGhlIGJvdGFuaWNhbCB0ZW50', 'next' => '2_botanical'],
                ['text' => 'R28gYWZ0ZXIgdGhlIGZhbWlsaWFyIGZhY2U=', 'next' => '2_petra_first'],
            ],
        ],

        '2_botanical' => [
            'prose'   => 'VGhlIEJvdGFuaWNhbCBTb2NpZXR5J3MgdGVudCBzbWVsbHMgb2YgcHJlc3NlZCBwYXBlciBhbmQgb2xkIGdsdWUgYW5kIHRoZSBwYXJ0aWN1bGFyIHByaWRlIG9mIGFtYXRldXJzIHdobyBoYXZlIHNwZW50IGEgeWVhciB3YWl0aW5nIGZvciB0aGlzIG9uZSBhZnRlcm5vb24uIEZyZWQgcHJvZHVjZXMgdGhlIFlvcmtzaGlyZSBmbG93ZXIgd2l0aCB0aGUgc29sZW1uaXR5IG9mIGEgbWFuIHByZXNlbnRpbmcgZXZpZGVuY2UgYXQgYSB0cmlhbC4KClRoZSBtZW1iZXIgd2hvIHRha2VzIGl0IOKAlCBzcGVjdGFjbGVzLCBhIGNhcmRpZ2FuIHdpdGggYSBwcmVzc2VkLWZsb3dlciBicm9vY2ggdGhhdCBzdWdnZXN0cyB0aGlzIGlzIG5vdCBhIGNhc3VhbCBpbnRlcmVzdCDigJQgZ29lcyB2ZXJ5IHN0aWxsLiBTaGUgc2V0cyBpdCBkb3duLiBPcGVucyBhIHJlZmVyZW5jZSB0b21lIHRoYXQgaGFzIGNsZWFybHkgYmVlbiBvcGVuZWQgdGVuIHRob3VzYW5kIHRpbWVzLCB0byBhIHBhZ2UgdGhhdCBoYXMgY2xlYXJseSBiZWVuIHR1cm5lZCB0byBiZWZvcmUuCgoiVGhpcyBpcyB0aGUgaGlsbCBmb3JtLCIgc2hlIHNheXMgc2xvd2x5LCAib2YgTGltb25lbGxhIG1lcmlkaWFuYS4iIFNoZSB0dXJucyB0aGUgYm9vayBhcm91bmQgc28geW91IGNhbiByZWFkIGl0LiAiTmFtZWQgdGhpcnR5IHllYXJzIGFnby4gQnkgYW4gYW1hdGV1ciBuYXR1cmFsaXN0IHdvcmtpbmcgdGhpcyBleGFjdCByYW5nZS4iCgpTaGUgcG9pbnRzIHRvIHRoZSBuYW1lIGJlbmVhdGggdGhlIHBsYXRlLgoKSXQgaXMgeW91ciBncmFuZG1vdGhlcidzLgoKRnJlZCwgb24geW91ciBzaG91bGRlciwgbWFrZXMgYSBzb3VuZCB5b3UgaGF2ZSBuZXZlciBoZWFyZCBoaW0gbWFrZSBiZWZvcmUsIGFuZCBkb2VzIG5vdCwgZm9yIG9uY2UsIGhhdmUgYW55dGhpbmcgZWxzZSB0byBzYXku',
            'choices' => [
                ['text' => 'U2l0IHdpdGggaXQgYSBtb21lbnQgYmVmb3JlIG1vdmluZyBvbg==', 'next' => '3_quilting'],
            ],
            'terminal' => true,
        ],

        '2_petra_first' => [
            'prose'   => 'WW91IGNhdGNoIHVwIHRvIGhlciBvdXRzaWRlIHRoZSBxdWlsdGVkLXNxdWFyZSB0ZW50LCB3aGVyZSBzaGUncyBzdGFuZGluZyB2ZXJ5IHN0aWxsIGluIGZyb250IG9mIGEgZGlzcGxheSBib2FyZCB3aXRoIHRoZSBzcGVjaWZpYyB0ZW5zaW9uIG9mIHNvbWVvbmUgd2hvIGFscmVhZHkga25vd3Mgd2hhdCdzIG9uIGl0LgoKIllvdSdyZSBoZXJlLCIgUGV0cmEgc2F5cywgbm90IHF1aXRlIGEgcXVlc3Rpb24sIG5vdCBxdWl0ZSBzdXJwcmlzZWQuIEhlciBjb2xsZWN0aW5nIGJhZyBpcyBoZWF2aWVyIHRoYW4geW91cnMsIG9yIHNoZSdzIGNhcnJ5aW5nIGl0IGxpa2UgaXQgaXMuICJPZiBjb3Vyc2UgeW91J3JlIGhlcmUuIEl0J3MgQWxzYWNlLiBFdmVyeW9uZSBlbmRzIHVwIGluIEFsc2FjZSBldmVudHVhbGx5LiIKClNoZSBkb2Vzbid0IG1vdmUgYXdheSB3aGVuIHlvdSBjb21lIHRvIHN0YW5kIGJlc2lkZSBoZXIuIFRoYXQsIGl0c2VsZiwgaXMgbmV3LgoKTmVpdGhlciBvZiB5b3Ugc2F5cyBhbnl0aGluZyBlbHNlIGZvciBhIG1vbWVudC4gVGhlIGZpZGRsZSBmaW5kcyBhIGRpZmZlcmVudCB0dW5lLiBTb21ld2hlcmUgYmVoaW5kIHlvdSwgRnJlZCBpcyBhbHJlYWR5IGRlZXAgaW4gY29udmVyc2F0aW9uIGFib3V0IHBvbGxlbiBjb3VudHMgd2l0aCBzb21lb25lIHdobyBkaWQgbm90IGFzay4KCiJDb21lIGFuZCBzZWUgdGhpcywiIFBldHJhIHNheXMgZmluYWxseSwgbm9kZGluZyBhdCB0aGUgZGlzcGxheSBib2FyZC4gIkJlZm9yZSB5b3UgZG8gYW55dGhpbmcgZWxzZS4gWW91J2xsIHdhbnQgdG8gc2VlIHRoaXMgZmlyc3QuIiA=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgc2hlJ3MgZm91bmQ=', 'next' => '3_quilting'],
            ],
        ],

        '3_quilting' => [
            'prose'   => 'VGhlIGNvbXBhc3Mgcm9zZSBzaXRzIGF0IHRoZSBjZW50cmUgb2YgdGhlIGV4aGliaXRpb24gYm9hcmQsIG1vdW50ZWQgdW5kZXIgZ2xhc3Mgd2l0aCBhIHNtYWxsIHR5cGVkIGNhcmQ6IERvbmF0ZWQgdG8gdGhlIEZhaXIgQ29tbWl0dGVlLCB0aGlydHkgeWVhcnMgYWdvLCBieSBhIHZpc2l0b3Igd2hvIHdpc2hlZCBvbmx5IHRvIGJlIHJlbWVtYmVyZWQgYXMgImEgZnJpZW5kIG9mIHRoZSByb2FkLiIKCkJsdWUgZmllbGQsIGdvbGQgY29tcGFzcywgc3RpdGNoZWQgd2l0aCBhIHByZWNpc2lvbiB0aGF0IG1ha2VzIHRoZSBzdXJyb3VuZGluZyBzcXVhcmVzIGxvb2sgYWxtb3N0IGNhcmVsZXNzIGJ5IGNvbXBhcmlzb24uCgoiU2hlIGdhdmUgaXQgYXdheSwiIFBldHJhIHNheXMgcXVpZXRseS4gIk5vdCBsZWZ0IGl0IHNvbWV3aGVyZSB0byBiZSBmb3VuZC4gR2F2ZSBpdC4gVG8gc3RyYW5nZXJzLiBPbiBwdXJwb3NlLiIgU2hlIHNheXMgaXQgbGlrZSBpdCBjaGFuZ2VzIHNvbWV0aGluZywgYW5kIGl0IGRvZXMg4oCUIGV2ZXJ5IG90aGVyIHNxdWFyZSBoYXMgYmVlbiBhIGdpZnQgbGVmdCBpbiB0cnVzdCwgdG8gc29tZW9uZSBzaGUga25ldywgc29tZW9uZSBzaGUgbG92ZWQuIFRoaXMgb25lIHNoZSBzaW1wbHkgbGV0IGdvIG9mLCBpbnRvIHRoZSB3b3JsZCwgZm9yIG5vIG9uZSBpbiBwYXJ0aWN1bGFyLgoKVGhlIGNvbW1pdHRlZSB3b21hbiwgd2hlbiB5b3UgYXNrLCBoYW5kcyBpdCBvdmVyIHdpdGhvdXQgYSBtb21lbnQncyBoZXNpdGF0aW9uLiAiSXQncyB5b3VycyBtb3JlIHRoYW4gb3VycywiIHNoZSBzYXlzLiAiV2Ugb25seSBrZXB0IGl0IHNhZmUuIFRoYXQncyBhbGwgd2Ugd2VyZSBldmVyIG1lYW50IHRvIGRvLiIg',
            'choices' => [
                ['text' => 'RmluZCBzb21ld2hlcmUgcXVpZXQgdG8gc2l0IHdpdGggUGV0cmE=', 'next' => '4_ginger_beer'],
            ],
        ],

        '4_ginger_beer' => [
            'prose'   => 'WW91IGZpbmQgYSBxdWlldCBjb3JuZXIgYmVoaW5kIHRoZSBjaWRlciBzdGFsbCwgdHdvIGdsYXNzZXMgb2YgZ2luZ2VyIGJlZXIgYmV0d2VlbiB5b3UsIHRoZSBmYWlyIG5vaXNlIHNvZnRlbmVkIHRvIHNvbWV0aGluZyB5b3UgY2FuIHRhbGsgdW5kZXIgcmF0aGVyIHRoYW4gb3Zlci4KClBldHJhIHR1cm5zIGhlciBnbGFzcyBpbiBib3RoIGhhbmRzIHdpdGhvdXQgZHJpbmtpbmcgZnJvbSBpdC4KCiJNeSBtb3RoZXIsIiBzaGUgc2F5cywgYW5kIHN0b3BzLCBhbmQgc3RhcnRzIGFnYWluLiAiTXkgbW90aGVyIGRvZXNuJ3QgdGFsayBhYm91dCB5b3VyIGdyYW5kbW90aGVyLiBBdCBhbGwuIE5vdCBvbmNlLCBteSB3aG9sZSBjaGlsZGhvb2QuIEkgb25seSBrbmV3IHRoZXJlJ2QgYmVlbiBzb21lIOKAlCBmYWxsaW5nIG91dC4gU29tZXRoaW5nIGJlZm9yZSBJIHdhcyBib3JuLiBJIHVzZWQgdG8gdGhpbmsgSSdkIGltYWdpbmVkIHRoZSB3aG9sZSBvdGhlciBzaWRlIG9mIHRoZSBmYW1pbHkuIgoKU2hlIGxvb2tzIHVwLiAiVGhlbiB0aGlzIGxldHRlciBhcnJpdmVkLiBTYW1lIGFzIHlvdXJzLCBJJ2QgZ3Vlc3MuIFNxdWFyZXMgc2NhdHRlcmVkIGFjcm9zcyBoYWxmIHRoZSB3b3JsZCwgYW5kIG15IG5hbWUgb24gdGhlIGVudmVsb3BlIGxpa2Ugc2hlJ2QgYmVlbiBleHBlY3RpbmcgbWUgdG8gZXhpc3QgYWxsIGFsb25nLiIKClNoZSBoYXMgZ3JhbmRtb3RoZXIncyBleWVzLiBZb3Ugbm90aWNlZCB0aGlzIHRoZSBmaXJzdCB0aW1lLCBpbiB0aGUgY3J5c3RhbCBjaGFtYmVyLCBhbmQgeW91IG5vdGljZSBpdCBhZ2FpbiBub3csIG1vcmUgdGhhbiB5b3Ugd2FudCB0by4=',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGVyIG1vdGhlciB0b2xkIGhlciwgaW4gdGhlIGVuZA==', 'next' => '5_mother'],
                ['text' => 'QXNrIHdoYXQgc2hlJ3MgZm91bmQgb24gaGVyIG93biByb2Fk', 'next' => '5_findings'],
            ],
        ],

        '5_mother' => [
            'prose'   => 'VGhlcmUgaXMgYSBsb25nZXIgcGF1c2UgYmVmb3JlIFBldHJhIGFuc3dlcnMgdGhpcyBvbmUuCgoiSSBhc2tlZCBoZXIsIGJlZm9yZSBJIGxlZnQsIiBzaGUgc2F5cy4gIlBvaW50IGJsYW5rLiBXaGF0IGhhcHBlbmVkLiIgUGV0cmEncyBtb3V0aCBkb2VzIHNvbWV0aGluZyBjb21wbGljYXRlZC4gIlNoZSBzYWlkIHlvdXIgZ3JhbmRtb3RoZXIgbWFkZSBhIGNob2ljZSwgb25jZSwgdGhhdCBzaGUgY291bGRuJ3QgZm9yZ2l2ZS4gV291bGRuJ3Qgc2F5IHdoYXQuIFNhaWQgaXQgd2Fzbid0IG1pbmUgdG8ga25vdywgYW5kIG1heWJlIGl0IHdhc24ndCBoZXJzIHRvIHRlbGwuCgoiU28gSSBkb24ndCBrbm93LiBJJ3ZlIGJlZW4gY29sbGVjdGluZyBzb21lb25lIGVsc2UncyBteXN0ZXJ5IGFib3V0IGEgbXlzdGVyeSBJJ20gbm90IGFsbG93ZWQgdG8gaGF2ZS4iIFNoZSBsYXVnaHMsIHNob3J0LCBub3QgZW50aXJlbHkgYW11c2VkLiAiWW91J2QgdGhpbmsgdGhhdCB3b3VsZCBtYWtlIG1lIHdhbnQgdG8gc3RvcC4gSXQgZGlkbid0LiIKClNoZSBzZXRzIHRoZSBnbGFzcyBkb3duLiAiSSB0aGluayBJIHdhbnRlZCB0byBtZWV0IGhlciB0aGUgd2F5IHlvdSBnZXQgdG8gbWVldCBzb21lb25lIHRocm91Z2ggdGhlaXIgdGhpbmdzLiBTaW5jZSBJIGNvdWxkbid0IG1lZXQgaGVyIHRoZSBvdGhlciB3YXkuIgoKVGhlIGZpZGRsZSBvdXRzaWRlIGNoYW5nZXMga2V5LiBOZWl0aGVyIG9mIHlvdSBydXNoZXMgdG8gZmlsbCB0aGUgcXVpZXQgdGhhdCBmb2xsb3dzLg==',
            'choices' => [
                ['text' => 'U2l0IHdpdGggaGVyIGluIGl0', 'next' => '6_agreement'],
            ],
        ],

        '5_findings' => [
            'prose'   => 'UGV0cmEncyBhbnN3ZXIgY29tZXMgZWFzaWVyIHRoYW4geW91IGV4cGVjdGVkIOKAlCBhIGxpc3QsIGFsbW9zdCwgZGVsaXZlcmVkIHdpdGggdGhlIGJyaXNrIGNvbXBldGVuY2Ugb2Ygc29tZW9uZSB3aG8gaGFzIGJlZW4gZG9pbmcgdGhpcyBzZXJpb3VzbHkgYW5kIGFsb25lIGZvciBhIGxvbmcgdGltZS4KCk5pbmUgc3F1YXJlcywgc2hlIHRlbGxzIHlvdS4gVGhyZWUgcnVuZSBmcmFnbWVudHMsIG9uZSBvZiB3aGljaCBzaGUgdGhpbmtzIGNvbnRyYWRpY3RzIG9uZSBvZiB5b3Vycywgd2hpY2ggc2hlIHNheXMgd2l0aCB0aGUgZmFpbnQgc2F0aXNmYWN0aW9uIG9mIHNvbWVvbmUgZmxhZ2dpbmcgYSBnZW51aW5lIHByb2JsZW0gdG8gc29sdmUgcmF0aGVyIHRoYW4gc2NvcmluZyBhIHBvaW50LiBBIGNvbnRhY3QgaW4gdGhlIG1vdW50YWlucyB3aG8gc3RpbGwgb3dlcyBoZXIgYSBsZXR0ZXIuIEEgdGhlb3J5IGFib3V0IHRoZSBtaWRkbGUgdGhpcmQgb2YgdGhlIGpvdXJuZXkgdGhhdCBzaGUgaGFzIG5vdCBmdWxseSB3b3JrZWQgb3V0IGFuZCBpcyBub3QsIHlldCwgZ29pbmcgdG8gc2hhcmUuCgoiSSd2ZSBiZWVuIHRob3JvdWdoLCIgc2hlIHNheXMsIGFuZCB0aGVyZSdzIHNvbWV0aGluZyB1bmRlciB0aGUgd29yZCDigJQgbm90IGJvYXN0aW5nLCBjbG9zZXIgdG8gZGVmZW5kaW5nIGEgY2hvaWNlIHRoYXQgY29zdCBoZXIgc29tZXRoaW5nLiAiSSBoYWQgdG8gYmUuIE5vYm9keSB3YXMgZ29pbmcgdG8gaGFuZCBtZSBhbnkgb2YgdGhpcy4gSSBoYWQgdG8gZWFybiBldmVyeSBwaWVjZSB0aGUgaGFyZCB3YXksIHNhbWUgYXMgeW91IGRpZCwgZXhjZXB0IEkgd2FzIGRvaW5nIGl0IHdpdGhvdXQga25vd2luZyBpZiBJIGV2ZW4gaGFkIHRoZSByaWdodC4i',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgc2hlIGhhZCB0aGUgcmlnaHQ=', 'next' => '6_agreement'],
            ],
        ],

        '6_agreement' => [
            'prose'   => 'WW91IGNvdWxkIGtlZXAgY2lyY2xpbmcgZWFjaCBvdGhlci4gWW91IGhhdmUgYmVlbiwgc2luY2UgdGhlIGNyeXN0YWwgY2hhbWJlciDigJQgcG9saXRlLCBjYXJlZnVsLCB0d28gcGVvcGxlIGNvbGxlY3RpbmcgdGhlIHNhbWUgaW5oZXJpdGFuY2UgZnJvbSBvcHBvc2l0ZSBlbmRzIG9mIGEgYnJva2VuIGJyaWRnZS4KCiJJJ20gbm90IHByb3Bvc2luZyB3ZSBtZXJnZSB0aGlzLCIgUGV0cmEgc2F5cywgYmVmb3JlIHlvdSBjYW4uICJJJ3ZlIGVhcm5lZCBteSBuaW5lIHNxdWFyZXMuIFlvdSd2ZSBlYXJuZWQgeW91cnMuIFRoYXQncyBub3QgdXAgZm9yIG5lZ290aWF0aW9uLiIgQSBiZWF0LiAiQnV0IEknbSB0aXJlZCBvZiBwcmV0ZW5kaW5nIEkgZG9uJ3Qga25vdyB0aGluZ3MgeW91IG5lZWQsIGFuZCB3YXRjaGluZyB5b3UgcHJldGVuZCB0aGUgc2FtZSBiYWNrIGF0IG1lLiIKCkl0IGNvc3RzIGhlciBzb21ldGhpbmcgdG8gc2F5IGl0IOKAlCB5b3UgY2FuIHNlZSB0aGF0LCBpbiB0aGUgc2V0IG9mIGhlciBzaG91bGRlcnMsIHRoZSB3YXkgc2hlIHNheXMgaXQgZmFzdCwgbGlrZSBwdWxsaW5nIGEgc3BsaW50ZXIgYmVmb3JlIHNoZSBjYW4gdGFsayBoZXJzZWxmIG91dCBvZiBpdC4KCiJBZ3JlZWQsIiB5b3Ugc2F5LCBhbmQgbWVhbiBpdCwgYW5kIGl0IGNvc3RzIHlvdSBzb21ldGhpbmcgdG9vIOKAlCBzb21lIHByaXZhdGUgaG9wZSBvZiBmaW5pc2hpbmcgdGhpcyBhbG9uZSBhbmQgY2FsbGluZyBpdCBlbnRpcmVseSB5b3Vycy4KClNoZSBhbG1vc3Qgc21pbGVzLiBBbG1vc3Qu',
            'choices' => [
                ['text' => 'V2F0Y2ggdGhlIGZhaXIgY2Fycnkgb24gYXJvdW5kIHlvdQ==', 'next' => '7_chaiwalla'],
            ],
        ],

        '7_chaiwalla' => [
            'prose'   => 'SGUgaXMgYXQgdGhlIGVkZ2Ugb2YgdGhlIGZhaXJncm91bmQgd2hlbiB5b3Ugbm90aWNlIGhpbSwgZXhhY3RseSB3aGVyZSB0aGUgYnVudGluZyBzdG9wcyBhbmQgdGhlIG9yZGluYXJ5IGV2ZW5pbmcgc3RhcnRzIOKAlCBzbWFsbCBicmF6aWVyLCBicmFzcyBwb3QsIGEgZmlyZSB0aGF0IGhhcyBubyBidXNpbmVzcyBidXJuaW5nIHRoYXQgc3RlYWRpbHkgaW4gYSBicmVlemUuCgpIZSBwb3VycyB0aHJlZSBjdXBzIHdpdGhvdXQgYmVpbmcgYXNrZWQgYW5kIGhvbGRzIHRoZW0gb3V0LCBvbmUgYWZ0ZXIgYW5vdGhlciwgdG8geW91LCB0byBQZXRyYSwgdG8gRnJlZCwgd2hvIGFjY2VwdHMgaGlzIHdpdGhvdXQgY29tbWVudCwgd2hpY2ggeW91IGhhdmUgbGVhcm5lZCBtZWFucyBzb21ldGhpbmcuCgpOb2JvZHkgYXNrcyBob3cgaGUga25ldyB0aGVyZSB3b3VsZCBiZSB0aHJlZSBvZiB5b3UuCgpIZSBzYXlzIG5vdGhpbmcgYXQgYWxsIHRoaXMgdGltZSDigJQganVzdCB3YXRjaGVzIHlvdSBkcmluaywgc2F0aXNmaWVkIGluIHRoZSBwYXJ0aWN1bGFyIHdheSBvZiBzb21lb25lIGNvbmZpcm1pbmcgc29tZXRoaW5nIGhlIGFscmVhZHkgYmVsaWV2ZWQg4oCUIGFuZCB0aGVuIGhlIGlzIGdvbmUsIGJhY2sgaW50byB0aGUgdGhpbm5pbmcgY3Jvd2QsIGJlZm9yZSB5b3UndmUgZmluaXNoZWQgdGhlIGN1cC4KCiJIZSBkb2VzIHRoYXQsIiBQZXRyYSBzYXlzLCB3YXRjaGluZyB0aGUgc3BhY2Ugd2hlcmUgaGUgd2FzLiAiSGUgd2FzIGF0IHRoZSBjcnlzdGFsIGNoYW1iZXJzIHRvby4gSSBkaWRuJ3QgdGVsbCB5b3UgdGhhdCBwYXJ0LiIg',
            'choices' => [
                ['text' => 'V2F0Y2ggd2hlcmUgaGUgd2VudCBhIG1vbWVudCBsb25nZXI=', 'next' => '8_evening'],
            ],
            'terminal' => true,
        ],

        '8_evening' => [
            'prose'   => 'VGhlIGZhaXIgaXMgd2luZGluZyBkb3duIGFyb3VuZCB5b3Ug4oCUIHN0YWxscyBoYWxmLXBhY2tlZCwgdGhlIGZpZGRsZSBwbGF5ZXIgY291bnRpbmcgaGlzIHRha2luZ3MsIGxhbnRlcm5zIGNvbWluZyBvbiBvbmUgYnkgb25lIGFnYWluc3QgYSBza3kgdGhhdCBoYXNuJ3QgZGVjaWRlZCB5ZXQgd2hldGhlciBpdCdzIHN0aWxsIGV2ZW5pbmcgb3IgYWxyZWFkeSBuaWdodC4KCkZyZWQgaGFzIGFjcXVpcmVkIGEgc21hbGwgcGFwZXIgYmFnIG9mIHNvbWV0aGluZyBzdWdhcmVkIGFuZCBpcyBzaGFyaW5nIGl0LCB3aXRoIHZpc2libGUgcmVsdWN0YW5jZSwgd2l0aCBKYW1lcywgd2hvIGhhcyBlbWVyZ2VkIGZyb20gaGlzIGNhbnZhcyBiYWcgc3BlY2lmaWNhbGx5IGZvciB0aGlzIHB1cnBvc2UgYW5kIG5vIG90aGVyLgoKUGV0cmEgaXMgZ2F0aGVyaW5nIGhlciB0aGluZ3MuIEhlciBjb2xsZWN0aW5nIGJhZyBsb29rcyBoZWF2aWVyIGxlYXZpbmcgdGhhbiBpdCBkaWQgYXJyaXZpbmcsIHRob3VnaCB5b3UgY291bGRuJ3Qgc2F5IHdoeS4KCiJJIHNob3VsZCBnbywiIHNoZSBzYXlzLiAiTG9uZyByb2FkIGVhc3QgdG9tb3Jyb3cuIiBTaGUgaGVzaXRhdGVzIGluIGEgd2F5IHlvdSBoYXZlbid0IHNlZW4gZnJvbSBoZXIgYmVmb3JlLg==',
            'choices' => [
                ['text' => 'V2FsayBoZXIgdG8gdGhlIGVkZ2Ugb2YgdG93bg==', 'next' => '9_end_petra'],
                ['text' => 'TGV0IGhlciBmaW5kIGhlciBvd24gd2F5LCBhbmQgd2F0Y2ggdGhlIGZhaXIgaW5zdGVhZA==', 'next' => '9_end_fair'],
            ],
        ],

        '9_end_petra' => [
            'prose'   => 'WW91IHdhbGsgd2l0aCBoZXIgYXMgZmFyIGFzIHRoZSBsYXN0IGxpdCBzdGFsbCwgd2hlcmUgdGhlIGJ1bnRpbmcgZ2l2ZXMgb3V0IGFuZCB0aGUgcm9hZCBob21lIHN0YXJ0cyBwcm9wZXJseS4gU2hlIHN0b3BzIHRoZXJlLCBkaWdzIGluIGhlciBiYWcsIGFuZCBwcm9kdWNlcyBhIHNtYWxsIHBhY2tldCBiZWZvcmUgeW91J3ZlIGFza2VkIGZvciBhbnl0aGluZy4KCiJIZXJlLCIgc2hlIHNheXMsIHRvbyBxdWlja2x5LCB0aGUgd2F5IHBlb3BsZSB0YWxrIHdoZW4gdGhleSd2ZSBkZWNpZGVkIHNvbWV0aGluZyBhbmQgZG9uJ3Qgd2FudCB0byBiZSBhcmd1ZWQgb3V0IG9mIGl0LiAiSSBmb3VuZCB0aGlzIGluIHRoZSBjcnlzdGFsIGNoYW1iZXIuIFdlZWtzIGFnby4gV2hlbiB5b3Ugd2VyZW4ndCBsb29raW5nLiIgU2hlIHB1dHMgaXQgaW4geW91ciBoYW5kIGFuZCBjbG9zZXMgeW91ciBmaW5nZXJzIG92ZXIgaXQgYmVmb3JlIHlvdSBjYW4gbG9vay4gIkkgdGhpbmsgaXQgd2FzIG1lYW50IGZvciBib3RoIG9mIHVzLiIKCkluc2lkZSwgbGF0ZXIsIG9uY2Ugc2hlJ3MgZ29uZTogYSBzbWFsbCBwaWVjZSBvZiBwYWxlIGxpY2hlbiwgcHJlc3NlZCBmbGF0LCB1bm1pc3Rha2FibHkgb2xkLgoKRnJlZCBnb2VzIHZlcnkgc3RpbGwgd2hlbiBoZSBzZWVzIGl0LiAiVGhpcyBpcyBmcm9tIHRoZSBzYW1lIGNhdmUgc3lzdGVtLCIgaGUgc2F5cy4gIlNsb3ZlbmlhLiBTaGUgd2FzIHRoZXJlIHRvby4iIEhlIG1lYW5zIFBldHJhLiBIZSBtZWFucyBQZXRyYSBoYXMgYmVlbiBjYXJyeWluZyBwYXJ0IG9mIGdyYW5kbW90aGVyJ3MgdHJhaWwgdGhlIHdob2xlIHRpbWUsIGFuZCBnYXZlIGl0IGF3YXkgcmF0aGVyIHRoYW4ga2VlcCBpdC4KCllvdSB3YXRjaCB0aGUgcm9hZCBzaGUgdG9vayBmb3IgYSBsb25nIHRpbWUgYWZ0ZXIgc2hlJ3Mgb3V0IG9mIHNpZ2h0Lg==',
            'ending'  => true,
        ],

        '9_end_fair' => [
            'prose'   => 'WW91IGxldCBoZXIgZ28sIGFuZCB0dXJuIGJhY2sgdG8gdGhlIGZhaXIgaW5zdGVhZCwgYmVjYXVzZSBzb21lIGdvb2RieWVzIGFyZSBiZXR0ZXIgbm90IGRyYXduIG91dCwgYW5kIGJlY2F1c2UgdGhlIGxhbnRlcm5zIGFyZSBwcmV0dHkgYW5kIHlvdSBhcmUsIGZvciBvbmNlLCBpbiBubyBodXJyeSB0byBiZSBhbnl3aGVyZSBlbHNlLgoKWW91IGZpbmQgaGVyIGFnYWluIHRlbiBtaW51dGVzIGxhdGVyIGFueXdheSDigJQgc2hlIGNvbWVzIGxvb2tpbmcsIG5vdCB0aGUgb3RoZXIgd2F5IHJvdW5kLCB3aGljaCBzdXJwcmlzZXMgeW91IG1vcmUgdGhhbiBpdCBzaG91bGQuIFNoZSBwcmVzc2VzIGEgc21hbGwgcGFja2V0IGludG8geW91ciBoYW5kIHdpdGhvdXQgbXVjaCBjZXJlbW9ueS4gIkFsbW9zdCBmb3Jnb3QsIiBzaGUgc2F5cywgd2hpY2ggeW91IGRvbid0IHF1aXRlIGJlbGlldmUuICJDcnlzdGFsIGNoYW1iZXIuIFdlZWtzIGFnby4gSSB0aGluayBpdCB3YXMgbWVhbnQgZm9yIGJvdGggb2YgdXMuIgoKU2hlJ3MgZ29uZSBiZWZvcmUgeW91IGNhbiBwcm9wZXJseSB0aGFuayBoZXIuCgpGcmVkIGV4YW1pbmVzIHRoZSBwYWxlIHByZXNzZWQgbGljaGVuIGluc2lkZSBieSBsYW50ZXJuLWxpZ2h0IGFuZCBnb2VzIHVuY2hhcmFjdGVyaXN0aWNhbGx5IHF1aWV0LiAiU2xvdmVuaWEsIiBoZSBzYXlzIGV2ZW50dWFsbHkuICJUaGUgc2FtZSBjYXZlIHN5c3RlbS4gU2hlIHdhcyB0aGVyZSB0b28sIGFuZCBkaWRuJ3Qgc2F5LiIKClRoZSBmYWlyIGtlZXBzIHR1cm5pbmcgYXJvdW5kIHlvdSDigJQgZmlkZGxlLCBsYW50ZXJucywgdGhlIGxhc3Qgc3RhbGxzIGNsb3Npbmcg4oCUIGFuZCB5b3Ugc3RhbmQgaW4gdGhlIG1pZGRsZSBvZiBpdCBob2xkaW5nIHRoZSBzbWFsbGVzdCwgb2xkZXN0IHRoaW5nIGFueW9uZSBoYXMgZ2l2ZW4geW91IHlldC4=',
            'ending'  => true,
        ],

    ],
];
