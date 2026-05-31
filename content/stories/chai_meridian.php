<?php
// The Chai Meridian -- CYOA story pages
// Node keys: "{page_number}_{branch}"
// Prose and choice texts are base64-encoded.
return [
    'id'    => 1,
    'title' => 'The Chai Meridian',
    'color' => '#C8813A',

    'pages' => [

        '1_start' => [
            'prose' => 'VGhlIG1hcCBpcyB3cml0dGVuIG9uIHRoZSBiYWNrIG9mIGEgcHJheWVyIGZsYWcsIGdyYW5kbW90aGVyJ3MgaGFuZHdyaXRpbmcgZmFkZWQgYnV0IHN0aWxsIGxlZ2libGUuIFlvdSdyZSBzaXR0aW5nIGluIGEgdGVhIGhvdXNlIGF0IHRoZSBlZGdlIG9mIENoYW5kcmFwdXIsIHNpeCBkYXlzJyB3YWxrIGFib3ZlIHRoZSB2YWxsZXkgZmxvb3IsIGFuZCB0aGUgd29tYW4gYWNyb3NzIHRoZSB0YWJsZSBoYXMgYmVlbiB3YXRjaGluZyB5b3Ugc2luY2UgeW91IHNhdCBkb3duLgoKVGhlIGJsYWRlIGlzIHR1Y2tlZCBpbnNpZGUgeW91ciBjb2F0IOKAlCBub3QgZ3JhbmRtb3RoZXIncyBibGFkZSwgdGhhdCBvbmUgaXMgbG9ja2VkIGluIHRoZSBjb2xsZWN0b3IncyBob3VzZSBpbiBEZWxoaSwgd2hpY2ggaXMgd2h5IHlvdSBib3Jyb3dlZCB0aGlzIG9uZSBmcm9tIGhpcyBraXRjaGVuLiBUaGUgbWVyaWRpYW4gaXMgc29tZXdoZXJlIGFib3ZlIHRoZSBzbm93bGluZS4gQWNjb3JkaW5nIHRvIHRoZSBtYXAsIHlvdSdsbCBrbm93IGl0IHdoZW4geW91IHNlZSBpdC4KClRoZSB3b21hbiBzdGFuZHMu',
            'choices' => [
                ['text' => 'Rm9sZCB0aGUgbWFwIGJlZm9yZSBzaGUgY2FuIHNlZSBpdA==', 'next' => '2_fold'],
                ['text' => 'TGV0IGhlciBhcHByb2FjaA==', 'next' => '2_approach'],
            ],
        ],

        '2_fold' => [
            'prose' => 'WW91IGZvbGQgdGhlIHByYXllciBmbGFnIHR3aWNlLCB0dWNrIGl0IGF3YXksIGFuZCBhcmUgb3V0IHRoZSBkb29yIGJlZm9yZSBzaGUgcmVhY2hlcyB5b3VyIHRhYmxlLiBUaGUgc3RyZWV0cyBvZiBDaGFuZHJhcHVyIHdpbmQgdXB3YXJkLiBUaGluIGFpci4gQSBkb2cgd2F0Y2hlcyB5b3UgZnJvbSBhIGRvb3J3YXkuCgpBdCB0aGUgbm9ydGggZ2F0ZSwgYSBib3kgaXMgc2VsbGluZyBjYXJkYW1vbSBmcm9tIGEgc2FjaywgYW5kIGhlIGxvb2tzIGF0IHlvdSB0aGUgc2FtZSB3YXkgdGhlIHdvbWFuIGRpZCDigJQgbGlrZSBoZSdzIGJlZW4gdG9sZCB0byBleHBlY3QgeW91Lg==',
            'choices' => [
                ['text' => 'QnV5IGEgaGFuZGZ1bCBhbmQgYXNrIHdoYXQgaGUga25vd3M=', 'next' => '3_cardamom'],
                ['text' => 'V2FsayB0aHJvdWdoIHRoZSBnYXRlIHdpdGhvdXQgc3RvcHBpbmc=', 'next' => '3_gate'],
            ],
        ],

        '2_approach' => [
            'prose' => 'SGVyIG5hbWUgaXMgTWlyaWFtLiBTaGUgc2F5cyBpdCBtYXR0ZXItb2YtZmFjdGx5LCBsaWtlIHNoZSdzIGJlZW4gcmVoZWFyc2luZy4gU2hlIHNpdHMgYWNyb3NzIGZyb20geW91IGFuZCBvcmRlcnMgdHdvIGNoYWlzIHdpdGhvdXQgYXNraW5nLiBTaGUgc3BlYWtzIGdvb2QgSGluZGksIGJldHRlciBOZXBhbGkuCgpTaGUgc2F5cyBzaGUncyBiZWVuIHRvIHRoZSBtZXJpZGlhbiBhbmQgY29tZSBiYWNrLCB3aGljaCBhbG1vc3Qgbm9ib2R5IGRvZXMuIFNoZSBzYXlzIHRoZSBwYXRoIGlzIHRlY2huaWNhbGx5IGVhc3kgYnV0IGdlb2dyYXBoaWNhbGx5IHVua2luZC4=',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgc2hlIG1lYW5zIGJ5IHVua2luZA==', 'next' => '3_unkind'],
                ['text' => 'QXNrIGlmIHNoZSB3aWxsIHRha2UgeW91IHRoZXJl', 'next' => '3_guide'],
            ],
        ],

        '3_cardamom' => [
            'prose' => 'VGhlIGJveSdzIG5hbWUgaXMgQmFidS4gSGUgZG9lc24ndCBrbm93IG11Y2ggYWJvdXQgdGhlIG1lcmlkaWFuIHNwZWNpZmljYWxseSwgYnV0IGhlIGtub3dzIGFib3V0IHRoZSBpY2UgY2F2ZSBhdCB0aGUgdGhpcmQgZmFsc2UgcGVhayDigJQgZXZlcnlvbmUgbG9jYWwgZG9lcy4gSGUgc2F5cyBpdCdzIG5vdCBhIGNhdmUsIHJlYWxseS4gTW9yZSBvZiBhIHRocmVzaG9sZC4KCkhlIGRyYXdzIGEgbWFyayBpbiB0aGUgZHVzdCB3aXRoIGhpcyBoZWVsIHRoYXQgbWF0Y2hlcyBzb21ldGhpbmcgaW4gdGhlIGNvcm5lciBvZiBncmFuZG1vdGhlcidzIG1hcC4gWW91IGdpdmUgaGltIG1vcmUgY2FyZGFtb20gbW9uZXkgdGhhbiB0aGUgaGFuZGZ1bCBjb3N0Lg==',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gdGhlIGdsYWNpZXI=', 'next' => '4_glacier'],
            ],
        ],

        '3_gate' => [
            'prose' => 'VGhlIG5vcnRoIGdhdGUgZ3VhcmQgaXMgYSB3b21hbiB3aXRoIGEgdGhlcm1vcyBvZiBzb21ldGhpbmcgdGhhdCBpc24ndCB0ZWEuIFNoZSBkb2Vzbid0IHN0b3AgeW91LCBidXQgc2hlIHN0YW1wcyBhIGNoaXQgeW91IGRpZG4ndCBrbm93IHlvdSBuZWVkZWQsIHdoaWNoIG1lYW5zIHNvbWVvbmUgbm93IGhhcyBhIHJlY29yZCBvZiB5b3UgZ29pbmcgdXAuCgpZb3UncmUgdGhyZWUgaG91cnMgYWJvdmUgdGhlIHRvd24gYmVmb3JlIHlvdSBzdG9wIHRoaW5raW5nIGFib3V0IHRoYXQu',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gdGhlIGdsYWNpZXI=', 'next' => '4_glacier'],
            ],
        ],

        '3_unkind' => [
            'prose' => 'TWlyaWFtIHNheXM6IHRoZSBwYXRoIGlzIGVhc3kgdG8gZm9sbG93LCBkaWZmaWN1bHQgdG8gZmluaXNoLiBUaGUgZ2xhY2llciBzcGVha3MuIFNoZSBtZWFucyBpdCBsaXRlcmFsbHkg4oCUIHRoZXJlIGFyZSBzb3VuZHMsIGNyYWNrcywgbW92ZW1lbnRzIHRoYXQgaGF2ZSBubyBtZXRlb3JvbG9naWNhbCBjYXVzZS4KClRoZSBzdG9uZSBhdCB0aGUgdG9wIGlzIG1hcmtlZCBpbiBhIGxhbmd1YWdlIHRoYXQgaXNuJ3QgU2Fuc2tyaXQgb3IgVGliZXRhbi4gU2hlJ3MgaGFkIGEgbGluZ3Vpc3QgbG9vayBhdCBwaG90b2dyYXBocy4gVGhlIGxpbmd1aXN0IGhhZCBxdWVzdGlvbnMgdGhhdCBNaXJpYW0gd2Fzbid0IHByZXBhcmVkIHRvIGFuc3dlci4=',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gdGhlIGdsYWNpZXI=', 'next' => '4_glacier'],
            ],
        ],

        '3_guide' => [
            'prose' => 'U2hlIHNheXMgbm8gaW1tZWRpYXRlbHksIGJ1dCB0aGVuIGFza3Mgd2h5IHlvdSdyZSBnb2luZy4gWW91IHRlbGwgaGVyIGFib3V0IGdyYW5kbW90aGVyLiBTaGUgYXNrcyBpZiB5b3Uga25vdyB3aGF0IHRoZSBibGFkZSB1bmxvY2tzLgoKWW91IGRvbid0LgoKU2hlIHNheXMgdGhhdCdzIGhvbmVzdCwgYW5kIHRoYXQgaG9uZXN0IHBlb3BsZSBoYXZlIGEgYmV0dGVyIHRpbWUgYXQgdGhlIG1lcmlkaWFuIHRoYW4gY2xldmVyIG9uZXMuIFNoZSBnaXZlcyB5b3UgdGhlIG5hbWUgb2YgYSBsb2RnZSBrZWVwZXIgbmVhciB0aGUgc25vd2xpbmUgYW5kIHdyaXRlcyBpdCBpbiBoZXIgb3duIGhhbmR3cml0aW5nLCB3aGljaCBpcyBkaWZmZXJlbnQgZnJvbSBncmFuZG1vdGhlcidzIGJ1dCBub3QgZW50aXJlbHkgdW5saWtlIGl0Lg==',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gdGhlIGdsYWNpZXI=', 'next' => '4_glacier'],
            ],
        ],

        '4_glacier' => [
            'prose' => 'VGhlIGdsYWNpZXIgaXMgc3RlZWwtY29sb3VyZWQgdW5kZXIgYSBoaWdoIHRoaW4gc2t5LiBZb3UgY2FuIHNlZSB0aGUgZmFsc2UgcGVha3MgZnJvbSBoZXJlIOKAlCB0aHJlZSBvZiB0aGVtLCBhcnJhbmdlZCBsaWtlIGEgcXVlc3Rpb24gbWFyay4gVGhlIHBhdGggaXMgb2J2aW91cyBpbiB0aGUgbW9ybmluZzogZGFya2VyIHJvY2sgYmVuZWF0aCB0aGUgaWNlLiBCeSBhZnRlcm5vb24gaXQgd2lsbCBiZSBjYW1vdWZsYWdlZC4KClRoZSBtYXAgc3VnZ2VzdHMgdGhlIHN0YW5kaW5nIHN0b25lIGlzIGJleW9uZCB0aGUgdGhpcmQgcGVhaywgYnV0IHRoZSBtYXAgaXMgZmlmdHkgeWVhcnMgb2xkIGFuZCBnbGFjaWVycyBtb3ZlLiBUaGUgYmxhZGUgaXMgc3RpbGwgd2FybSBpbnNpZGUgeW91ciBjb2F0LCB3aGljaCBpcyBzdHJhbmdlLCBiZWNhdXNlIHlvdSd2ZSBiZWVuIHdhbGtpbmcgaW4gc2luZ2xlIGRpZ2l0cyBmb3IgaG91cnMu',
            'choices' => [
                ['text' => 'UHVzaCBmb3IgdGhlIGZpcnN0IHBlYWsgYmVmb3JlIG1ha2luZyBjYW1w', 'next' => '5_push'],
                ['text' => 'Q2FtcCBoZXJlIGFuZCB0YWtlIHRoZSBmaXJzdCBwZWFrIGluIG1vcm5pbmcgbGlnaHQ=', 'next' => '5_camp'],
            ],
        ],

        '5_push' => [
            'prose' => 'WW91IHJlYWNoIHRoZSBmaXJzdCBwZWFrIHdpdGggYW4gaG91ciBvZiBsaWdodCBsZWZ0LiBUaGUgdmlldyBpcyBzdGFnZ2VyaW5nIOKAlCBmb3VyIGNvdW50cmllcywgYWxsZWdlZGx5LiBUaGUgc2Vjb25kIHBlYWsgaXMgY2xvc2VyIHRoYW4gdGhlIG1hcCBzdWdnZXN0ZWQsIHdoaWNoIG1lYW5zIHRoZSB0aGlyZCBpcyB0b28uCgpUaGUgYmxhZGUgaXMgd2FybSBhZ2FpbnN0IHlvdXIgcmlicy4gWW91IHRha2UgaXQgb3V0IGFuZCBpdCBjYXRjaGVzIHRoZSBsYXN0IG9mIHRoZSBsaWdodCBpbiBhIHdheSB0aGF0IG1ldGFsIHVzdWFsbHkgZG9lc24ndC4=',
            'choices' => [
                ['text' => 'UHVzaCBmb3IgdGhlIHNlY29uZCBwZWFrIGJlZm9yZSBkYXJr', 'next' => '6_second_peak'],
                ['text' => 'Q2FtcCBoZXJlIOKAlCB0aGUgc2Vjb25kIHBlYWsgaW4gdGhlIG1vcm5pbmc=', 'next' => '6_second_peak'],
            ],
        ],

        '5_camp' => [
            'prose' => 'VGhlIG5pZ2h0IG9uIHRoZSBnbGFjaWVyIGlzIHNwZWN0YWN1bGFyIGFuZCBjb2xkLiBZb3UncmUgd29rZW4gdHdpY2U6IG9uY2UgYnkgYSBzb3VuZCBsaWtlIGEgZG9vciBvcGVuaW5nIHNvbWV3aGVyZSBiZW5lYXRoIHRoZSBpY2UsIG9uY2UgYnkgbm90aGluZyB5b3UgY2FuIG5hbWUuCgpJbiB0aGUgbW9ybmluZyB0aGUgYWlyIGlzIHN0aWxsIGFuZCB0aGUgZmlyc3QgcGVhayBpcyBsaXQgZ29sZCBiZWZvcmUgdGhlIHJlc3Qgb2YgdGhlIG1vdW50YWluLiBZb3UgZWF0IHRoZSBsYXN0IG9mIHRoZSBjYXJkYW1vbSBicmVhZCBhbmQgc3RhcnQgY2xpbWJpbmcsIGFuZCB0aGUgYmxhZGUgaXMgd2FybSBhZ2FpbnN0IHlvdXIgcmlicyBpbiBhIHdheSB0aGF0IGhhcyBub3RoaW5nIHRvIGRvIHdpdGggYm9keSBoZWF0Lg==',
            'choices' => [
                ['text' => 'Q29udGludWUgdG93YXJkIHRoZSBzZWNvbmQgcGVhaw==', 'next' => '6_second_peak'],
            ],
        ],

        '6_second_peak' => [
            'prose' => 'VGhlIHNlY29uZCBwZWFrIGlzIGRpZmZlcmVudCBmcm9tIHRoZSBmaXJzdC4gVGhlIHBhdGggbmFycm93cyBoZXJlIOKAlCBub3QgZGlmZmljdWx0LCBqdXN0IGRlbGliZXJhdGUsIGxpa2UgaXQgd2FzIG1hZGUgbmFycm93ZXIgb24gcHVycG9zZS4gVGhlIGljZSBvbiBlaXRoZXIgc2lkZSBpcyBvbGRlciwgYmx1ZS13aGl0ZSBhbmQgY29tcHJlc3NlZCwgYW5kIHRoZSBzb3VuZHMgTWlyaWFtIG1lbnRpb25lZCBoYXZlIHN0YXJ0ZWQ6IG5vdCB3aW5kLCBub3QgaWNlIHNldHRsaW5nLiBTb21ldGhpbmcgYmVsb3cgdGhlIHN1cmZhY2UsIHJoeXRobWljLgoKVGhlIGJsYWRlIGlzIHNvIHdhcm0geW91J3ZlIHVuYnV0dG9uZWQgeW91ciBjb2F0Lg==',
            'choices' => [
                ['text' => 'U3RvcCBhbmQgbGlzdGVuIHRvIHRoZSByaHl0aG0=', 'next' => '7_listen'],
                ['text' => 'S2VlcCBtb3Zpbmcg4oCUIGRvbid0IGdpdmUgaXQgdGhlIGF0dGVudGlvbg==', 'next' => '7_keep_moving'],
            ],
        ],

        '7_listen' => [
            'prose' => 'VGhyZWUgYmVhdHMsIHBhdXNlLCB0aHJlZSBiZWF0cy4gWW91IHN0YW5kIHN0aWxsIGxvbmcgZW5vdWdoIHRvIGJlIGNlcnRhaW4gb2YgdGhlIHBhdHRlcm4uIFRoZW4geW91IHRha2Ugb25lIHN0ZXAgZm9yd2FyZCBhbmQgaXQgY2hhbmdlczogZm91ciBiZWF0cywgcGF1c2UsIG9uZS4KCkxpa2UgaXQgbm90aWNlZCB5b3UuCgpZb3Ugc3RhbmQgdGhlcmUgYSB3aGlsZSBsb25nZXIuIFRoZSBwYXR0ZXJuIGRvZXNuJ3QgY2hhbmdlIGFnYWluLiBXaGF0ZXZlciBpcyBkb3duIHRoZXJlIGhhcyBzYWlkIHdoYXQgaXQgd2FudGVkIHRvIHNheS4=',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gdGhlIHRoaXJkIHBlYWs=', 'next' => '8_third_peak'],
            ],
        ],

        '7_keep_moving' => [
            'prose' => 'V2hhdGV2ZXIgaXMgYmVsb3cgdGhlIGljZSBrbm93cyB5b3UncmUgdGhlcmUuIFlvdSBjYW4gdGVsbCBiZWNhdXNlIHdoZW4geW91IHN0b3AsIHRoZSBzb3VuZCBzdG9wcyB0b28g4oCUIGFuZCB3aGVuIHlvdSBtb3ZlLCBpdCBtYXRjaGVzIHlvdXIgcGFjZSBmb3IgdGhpcnR5IHNlY29uZHMgYmVmb3JlIGZhbGxpbmcgYmFjayBpbnRvIGl0cyBvd24gcmh5dGhtLgoKRWFzaWVyIG5vdCB0byB0ZXN0IGl0LiBZb3UgcmVhY2ggdGhlIHRvcCBvZiB0aGUgc2Vjb25kIHBlYWsgYmVmb3JlIG5vb24gYW5kIGRvIG5vdCBsb29rIGJhY2sgYXQgdGhlIHBhdGggeW91IGNhbWUgdXAu',
            'choices' => [
                ['text' => 'Q29udGludWUgdG8gdGhlIHRoaXJkIHBlYWs=', 'next' => '8_third_peak'],
            ],
        ],

        '8_third_peak' => [
            'prose' => 'VGhlIHN0YW5kaW5nIHN0b25lIGlzIHZpc2libGUgZnJvbSB0aGUgdGhpcmQgcGVhayDigJQgc21hbGxlciB0aGFuIHlvdSBleHBlY3RlZCwgYW5kIGRhcmtlci4gQmxhY2sgYmFzYWx0LCBncmFuZG1vdGhlcidzIG1hcCBzYWlkLiBGcm9tIGhlcmUgeW91IGNhbiBzZWUgc29tZXRoaW5nIGF0IGl0cyBiYXNlIHRoYXQgY2F0Y2hlcyB0aGUgbGlnaHQgdGhlIHNhbWUgd2F5IHRoZSBibGFkZSBkb2VzLgoKQXJvdW5kIHRoZSBzdG9uZSB0aGUgaWNlIGlzIG9sZGVzdDogY29tcHJlc3NlZCBvdmVyIGNlbnR1cmllcywgYWxtb3N0IGdyZXkuIFRoZSBwYXRoIHRvIGl0IGNyb3NzZXMgdGhpcnR5IG1ldHJlcyBvZiBvcGVuIGdsYWNpZXIgd2l0aCBubyBjb3ZlciwgYW5kIHRoZSB3aW5kIGhhcyBwaWNrZWQgdXAu',
            'choices' => [
                ['text' => 'Q3Jvc3MgZGlyZWN0bHkg4oCUIGl0J3MgdGhpcnR5IG1ldHJlcw==', 'next' => '9_cross_direct'],
                ['text' => 'Q2lyY2xlIHRoZSBsb25nIHdheSBhbmQgZmluZCBhIHN0YWJsZSBsaW5l', 'next' => '9_circle'],
            ],
        ],

        '9_cross_direct' => [
            'prose' => 'VGhlIGljZSBob2xkcy4gSGFsZndheSBhY3Jvc3MsIHRoZSBibGFkZSB2aWJyYXRlcyBvbmNlIOKAlCBhIHNpbmdsZSBwdWxzZSwgZmVsdCBtb3JlIHRoYW4gaGVhcmQsIGxpa2UgYSBzdHJ1Y2sgYmVsbCBoZWFyZCB0aHJvdWdoIHdhdGVyLiBZb3Ugc3RvcC4gTm90aGluZyBlbHNlIGhhcHBlbnMuIFlvdSBrZWVwIHdhbGtpbmcuCgpUaGUgc3RvbmUgaXMgd2Fpc3QtaGlnaCwgYXMgZGVzY3JpYmVkLiBHcmFuZG1vdGhlcidzIGluaXRpYWxzIGFyZSBjdXQgaW50byB0aGUgYmFzZSwgZXhhY3RseSB3aGVyZSB0aGUgbWFwIHNhaWQuIEJlbG93IHRoZW06IGEgc21hbGwgYnJhc3MgZG9vciwgc2V0IGZsdXNoIGludG8gdGhlIGJhc2FsdCwgc28gZmx1c2ggeW91J2QgbWlzcyBpdCB3aXRob3V0IGtub3dpbmcgdG8gbG9vay4=',
            'choices' => [
                ['text' => 'VHJ5IHRoZSBibGFkZSBpbiB0aGUgbG9jaw==', 'next' => '10_the_door'],
            ],
        ],

        '9_circle' => [
            'prose' => 'VGhlIGxvbmcgcm91dGUgdGFrZXMgZm9ydHkgbWludXRlcyBhbmQgaXMgYmV0dGVyIGljZSDigJQgb2xkZXIsIG1vcmUgc3RhYmxlLiBZb3UgcmVhY2ggdGhlIHN0b25lIGZyb20gdGhlIG5vcnRoIHNpZGUsIHdoaWNoIGlzbid0IHNob3duIG9uIHRoZSBtYXAsIGFuZCBmaW5kIHNvbWV0aGluZyB0aGUgbWFwIGRvZXNuJ3QgbWFyazogYSBzZWNvbmQgc2V0IG9mIGluaXRpYWxzIGN1dCBzaGFsbG93ZXIsIGluIGEgZGlmZmVyZW50IGhhbmQsIGluIGEgc2NyaXB0IHlvdSBkb24ndCByZWNvZ25pc2UuCgpZb3UgdGFrZSBhIHBob3RvZ3JhcGguIFRoZW4geW91IHdhbGsgYXJvdW5kIHRvIHRoZSBzb3V0aCBmYWNlIHdoZXJlIGdyYW5kbW90aGVyJ3MgaW5pdGlhbHMgYXJlLCBhbmQgYmVsb3cgdGhlbSB0aGUgc21hbGwgYnJhc3MgZG9vciwgc2V0IHNvIGZsdXNoIGludG8gdGhlIGJhc2FsdCB0aGF0IHlvdSBmZWVsIGl0IGJlZm9yZSB5b3Ugc2VlIGl0Lg==',
            'choices' => [
                ['text' => 'VHJ5IHRoZSBibGFkZSBpbiB0aGUgbG9jaw==', 'next' => '10_the_door'],
            ],
        ],

        '10_the_door' => [
            'prose' => 'VGhlIGJsYWRlIGZpdHMgdGhlIGtleWhvbGUg4oCUIG5vdCBwZXJmZWN0bHksIGJ1dCBpdCB3YXMgbmV2ZXIgcXVpdGUgbWVhbnQgZm9yIHRoaXMsIHdoaWNoIGlzIHBlcmhhcHMgdGhlIHBvaW50LiBZb3UgZmVlbCB0d28gY2F0Y2hlcywgdGhlbiBhIHRoaXJkLiBTb21ldGhpbmcgaW5zaWRlIHRoZSBzdG9uZSBtb3ZlcywgZGVsaWJlcmF0ZSBhbmQgdW5odXJyaWVkLCBsaWtlIGl0J3MgYmVlbiB3YWl0aW5nIHRvIGJlIHBvbGl0ZSBhYm91dCB0aGlzLgoKVGhlIGRvb3Igb3BlbnMgaW53YXJkLiBCZWhpbmQgaXQ6IGEgcmVjZXNzIGFib3V0IHRoZSBzaXplIG9mIGEgc2hvZWJveCwgZHJ5IGRlc3BpdGUgZXZlcnl0aGluZy4gSW5zaWRlIHRoZSByZWNlc3MsIGEgdGluIGJveCwgZGVudGVkLCBzZWFsZWQgd2l0aCB3YXgu',
            'choices' => [
                ['text' => 'T3BlbiBpdA==', 'next' => '11_open'],
                ['text' => 'U2l0IHdpdGggaXQgYSBtb21lbnQgZmlyc3Q=', 'next' => '11_wait'],
            ],
        ],

        '11_open' => [
            'prose' => 'SW5zaWRlIHRoZSB0aW46IGEgbGV0dGVyLCBmb2xkZWQgdHdpY2UsIGluIGdyYW5kbW90aGVyJ3MgaGFuZHdyaXRpbmcuCgpOb3QgaGVyIG9sZCBoYW5kd3JpdGluZy4gSGVyIGhhbmR3cml0aW5nIGZyb20gdGhyZWUgeWVhcnMgYWdvIOKAlCB0aGUgY2FyZWZ1bCwgc2xpZ2h0bHkgY29tcHJlc3NlZCBzY3JpcHQgc2hlIHVzZWQgYWZ0ZXIgaGVyIGhhbmRzIHN0YXJ0ZWQgdHJvdWJsaW5nIGhlci4gV2hpY2ggaXMgaW1wb3NzaWJsZSwgYmVjYXVzZSBncmFuZG1vdGhlciBkaWVkIGZvdXIgeWVhcnMgYWdvLgoKVGhlIGxldHRlciBiZWdpbnM6CgpJIGtuZXcgeW91J2QgYmUgcXVpY2sgYWJvdXQgaXQuIFRoYXQgd2FzIGFsd2F5cyB5b3VyIHdheS4gU2l0IGRvd24uIFRoZSBpY2Ugd2lsbCBob2xkLg==',
            'choices' => [
                ['text' => 'UmVhZCBvbg==', 'next' => '12_the_letter'],
            ],
        ],

        '11_wait' => [
            'prose' => 'WW91IHNpdCBvbiB0aGUgaWNlIHdpdGggdGhlIHRpbiBpbiB5b3VyIGxhcCBmb3IgdGVuIG1pbnV0ZXMuIFRoZSBnbGFjaWVyIGlzIHF1aWV0LiBXaGF0ZXZlciB3YXMgYmVsb3cgdGhlIHN1cmZhY2UgaGFzIHN0b3BwZWQuIFRoZSB3aW5kIGhhcyBkcm9wcGVkIHRvIG5vdGhpbmcsIHdoaWNoIGF0IHRoaXMgYWx0aXR1ZGUgbWVhbnMgc29tZXRoaW5nIGJ1dCB5b3UncmUgbm90IHN1cmUgd2hhdC4KClRoZW4geW91IG9wZW4gaXQuIEluc2lkZTogYSBsZXR0ZXIsIGZvbGRlZCB0d2ljZSwgaW4gZ3JhbmRtb3RoZXIncyBoYW5kd3JpdGluZyDigJQgbm90IGhlciBvbGQgaGFuZHdyaXRpbmcgYnV0IHRoZSBjYXJlZnVsLCBjb21wcmVzc2VkIHNjcmlwdCBzaGUgdXNlZCBpbiBoZXIgbGFzdCB5ZWFycy4gV2hpY2ggaXMgaW1wb3NzaWJsZSBiZWNhdXNlIGdyYW5kbW90aGVyIGRpZWQgZm91ciB5ZWFycyBhZ28uCgpUaGUgbGV0dGVyIGJlZ2luczoKCkkga25ldyB5b3UnZCB0YWtlIHlvdXIgdGltZS4gR29vZC4gWW91J2xsIG5lZWQgdGhhdCBwYXRpZW5jZS4=',
            'choices' => [
                ['text' => 'UmVhZCBvbg==', 'next' => '12_the_letter'],
            ],
        ],

        '12_the_letter' => [
            'prose' => 'VGhlIGxldHRlciBpcyBmb3VyIHBhZ2VzLCBncmFuZG1vdGhlcidzIGNhcmVmdWwgbGF0ZSBoYW5kd3JpdGluZy4gU2hlIGhhcyBudW1iZXJlZCB0aGVtLgoKU2hlIHNheXMgc2hlIHdhcyBhdCB0aGUgbWVyaWRpYW4gdGhpcnR5IHllYXJzIGJlZm9yZSBzaGUgbWFkZSB0aGUgbWFwIC0tIHdpdGggc29tZW9uZSBzaGUgZG9lc24ndCBuYW1lLCBmb3IgcmVhc29ucyBzaGUgZG9lc24ndCBleHBsYWluLiBTaGUgc2F5cyBzaGUgbGVmdCB0aGUgdGluIHRoZW4sIGFuZCB0aGUgbGV0dGVyIGluc2lkZSBpdCBpcyBub3QgdGhlIGxldHRlciBzaGUgbGVmdC4gU2hlIHNheXMgdGhhdCBzZW50ZW5jZSB3aWxsIHRha2UgYSBtb21lbnQgdG8gcGFyc2UsIGFuZCBzaGUncyBzb3JyeSBmb3IgaXQuCgpTaGUgc2F5cyB5b3VyIG5hbWUgaXMgY2FydmVkIGludG8gdGhlIHNvdXRoIGZhY2Ugb2YgdGhlIHN0b25lLiBIYXMgYmVlbiBmb3IgbG9uZ2VyIHRoYW4gZWl0aGVyIG9mIHlvdSBoYXMgYmVlbiBhbGl2ZS4gU2hlIGRvZXNuJ3Qga25vdyB3aGF0IHRvIGRvIHdpdGggdGhhdCBlaXRoZXIuCgpUaGUgYmxhZGUsIHNoZSB3cml0ZXMsIG9wZW5zIG90aGVyIHRoaW5ncyBiZXNpZGVzIGRvb3JzLiBTaGUgY2hvc2Ugbm90IHRvIGZpbmQgb3V0IHdoYXQuIFNoZSBpcyBhc2tpbmcgLS0gbm90IGluc3RydWN0aW5nLCBzaGUgdW5kZXJsaW5lcyB0aGlzIC0tIGFza2luZyB0aGF0IHlvdSBub3QgZmluZCBvdXQgZWl0aGVyLiBTaGUgd3JpdGVzOiBJIGFtIGFza2luZyBiZWNhdXNlIEkgY291bGRuJ3QsIGFuZCB0aGF0IGlzIG5vdCB0aGUgc2FtZSB0aGluZyBhcyBiZWNhdXNlIHlvdSBzaG91bGRuJ3QuCgpUaGUgbGFzdCBwYWdlIHNheXM6IFRoZXJlIGlzIGEgc2Vjb25kIGRvb3IuIFlvdSdsbCBmZWVsIGl0IGluIHRoZSBpY2Ugd2hlbiB0aGUgYmxhZGUgd2FybXMgYWdhaW4uIFBsZWFzZSBsZWF2ZSBpdC4gQ29tZSBob21lLiBUaGVyZSBhcmUgdGhpbmdzIG9uIHRoZSBtYW50ZWxwaWVjZSB0aGF0IG5lZWQgZXhwbGFpbmluZyBhbmQgSSBhbSBydW5uaW5nIG91dCBvZiB0aW1lIHRvIHdyaXRlIHRoZW0gZG93bi4=',
            'choices' => [
                ['text' => 'U2VhbCB0aGUgZG9vciBhbmQgaGVhZCBkb3du', 'next' => '13_seal'],
                ['text' => 'TG9vayBmb3IgdGhlIHNlY29uZCBkb29y', 'next' => '13_second_door'],
            ],
        ],

        '13_seal' => [
            'prose' => 'VGhlIGRvb3IgY2xvc2VzIHdpdGggYSByZXNpc3RhbmNlIHRoYXQgaXNuJ3QgcXVpdGUgbWVjaGFuaWNhbCAtLSB0d28gY2F0Y2hlcywgdGhlbiB0aGUgdGhpcmQsIHRoZW4gc29tZXRoaW5nIHRoYXQgZmVlbHMgbGlrZSB0aGUgc3RvbmUgZXhoYWxpbmcuIFRoZSBibGFkZSBpcyBjb2xkIG5vdywgcHJvcGVybHkgY29sZC4KClRoZSBkZXNjZW50IHRha2VzIHRocmVlIGRheXMuIFRoZSBnbGFjaWVyIGlzIHF1aWV0LiBObyBzb3VuZHMgYmVuZWF0aCB0aGUgc3VyZmFjZSwgbm8gcmh5dGhtLCBubyByZXNwb25zZS4gRWl0aGVyIGl0IGRvZXNuJ3Qga25vdyB5b3UncmUgbGVhdmluZyBvciBpdCBoYXMgZGVjaWRlZCBub3QgdG8gc2F5LgoKT24gdGhlIHRoaXJkIGV2ZW5pbmcsIGF0IHRoZSBub3J0aCBnYXRlIG9mIENoYW5kcmFwdXIsIHRoZXJlIGlzIGEgd29tYW4gbGVhbmluZyBhZ2FpbnN0IHRoZSB3YWxsIHdobyBkb2Vzbid0IGxvb2sgbGlrZSBhIGd1YXJkLiBTaGUgbG9va3MgYXQgeW91IHRoZSB3YXkgcGVvcGxlIGxvb2sgd2hlbiB0aGV5IGV4cGVjdGVkIHlvdSB0byBhcnJpdmUsIGFuZCBoYWQgYmVlbiB3b25kZXJpbmcgaG93IGxvbmcgaXQgd291bGQgdGFrZS4=',
            'choices' => [
                ['text' => 'QXNrIGhlciBuYW1l', 'next' => '14_ask_name'],
                ['text' => 'V2FsayBwYXN0IHdpdGhvdXQgc3BlYWtpbmc=', 'next' => '14_walk_past'],
            ],
        ],

        '13_second_door' => [
            'prose' => 'VGhlIGJsYWRlIHdhcm1zIGFnYWluIC0tIG5vdCBzbG93bHksIG5vdCBncmFkdWFsbHkuIE9uZSBtb21lbnQgY29sZCwgdGhlIG5leHQgbm90LiBZb3Ugd2FsayB0aGUgaWNlIGFyb3VuZCB0aGUgc3RvbmUuCgpPbiB0aGUgd2VzdCBzaWRlIHRoZSBzdXJmYWNlIGlzIGRpZmZlcmVudDogc21vb3RoZXIsIG1vcmUgb3BhcXVlLCBsaWtlIHNvbWV0aGluZyB3YXMgcHJlc2VydmVkIGluIGl0IHJhdGhlciB0aGFuIGZyb3plbiBieSBpdC4gV2hlbiB5b3UgcHJlc3MgYSBwYWxtIGZsYXQgYWdhaW5zdCB0aGUgc3VyZmFjZSwgdGhlIGJsYWRlIHZpYnJhdGVzIG9uY2UuIE5vdCBhIHNvdW5kLiBTb21ldGhpbmcgdGhhdCB0cmF2ZWxzIHVwIHlvdXIgYXJtIGluc3RlYWQgb2YgdGhyb3VnaCB0aGUgYWlyLgoKVGhlcmUgaXMgYSBoYW5kbGUgYmVsb3cgdGhlIHN1cmZhY2UuIFlvdSBjYW4ndCBzZWUgaXQgYnV0IHlvdSBjYW4gZmVlbCBpdCB0aHJvdWdoIHRoZSBpY2UgLS0gdGhlIHNoYXBlIGFuZCB0ZW1wZXJhdHVyZSBvZiBhIHRoaW5nIHRoYXQgaGFzIGJlZW4gd2FpdGluZy4=',
            'choices' => [
                ['text' => 'UHVsbCB0aGUgaGFuZGxl', 'next' => '14_pull_handle'],
                ['text' => 'TGVhdmUgaXQgYWxvbmUgLS0gZ3JhbmRtb3RoZXIgd2FzIGNsZWFy', 'next' => '14_leave_it'],
            ],
        ],

        '14_ask_name' => [
            'prose' => 'U2hlIHNheXM6ICdZb3UgY2FuIGNhbGwgbWUgd2hhdCB5b3VyIGdyYW5kbW90aGVyIGRpZC4gU2hlIGNhbGxlZCBtZSBFbGVuaS4nCgpFbGVuaSB3YXMgZ3JhbmRtb3RoZXIncyBtaWRkbGUgbmFtZS4gTm90IGhlciBnaXZlbiBuYW1lLCBub3QgYSBmYW1pbHkgbmFtZSAtLSB0aGUgbmFtZSBzaGUgYXNrZWQgcGVvcGxlIHRvIHVzZSB3aGVuIHNoZSBuZWVkZWQgdG8gYmUgc29tZXdoZXJlIG90aGVyIHRoYW4gaGVyc2VsZi4gU2hlIHRvbGQgeW91IHRoYXQgb25jZSwgeWVhcnMgYWdvLCBhbmQgeW91IGhhZCBmb3Jnb3R0ZW4gdW50aWwgbm93LgoKVGhlIHdvbWFuIGhhcyBncmFuZG1vdGhlcidzIGV5ZXMsIG9yIHNvbWV0aGluZyB0aGF0IGluaGFiaXRzIHRoZSBzYW1lIHNwYWNlIGJlaGluZCB0aGVtLiBTaGUgZG9lc24ndCBleHBsYWluIHRoaXMuIFNoZSBhc2tzIGlmIHlvdSdyZSBzdGF5aW5nIGluIENoYW5kcmFwdXIgdG9uaWdodC4KClNoZSBzYXlzOiAnVGhlcmUncyBzb21ldGhpbmcgZWxzZSB0aGF0IG5lZWRzIHJldHVybmluZy4gQnV0IGl0IGNhbiB3YWl0IHVudGlsIG1vcm5pbmcuJw==',
            'choices' => [],
            'terminal' => true,
        ],

        '14_walk_past' => [
            'prose' => 'WW91IHdhbGsgcGFzdCB3aXRob3V0IHNwZWFraW5nLgoKU2hlIHNheXMsIGJlaGluZCB5b3U6ICdTaGUgc2FpZCB5b3UgbWlnaHQuJwoKTm90aGluZyBhZnRlciB0aGF0LiBZb3UgZG9uJ3QgbG9vayBiYWNrLgoKVGhyZWUgaG91cnMgYmVsb3cgdGhlIGdhdGUsIHdoZW4geW91IHN0b3AgdG8gcmVzdCwgeW91IGZpbmQgYSBmb2xkZWQgcGllY2Ugb2YgcGFwZXIgdHVja2VkIGluc2lkZSB0aGUgYmxhZGUncyBjbG90aCBzaGVhdGggLS0gbm90IGluIHlvdXIgcG9ja2V0LCBpbnNpZGUgdGhlIHNoZWF0aCwgd2hpY2ggd2FzIHJvbGxlZCBhbmQgdGllZCB3aGVuIHlvdSBsZWZ0IHRoZSBtZXJpZGlhbi4gVGhlIGhhbmR3cml0aW5nIGlzIG5laXRoZXIgZ3JhbmRtb3RoZXIncyBub3IgTWlyaWFtJ3MuIFRoZSBwYXBlciBpcyBkcnkgYW5kIHdhcm0gYW5kIHNtZWxscyBmYWludGx5IG9mIGNhcmRhbW9tLiBZb3UgZG9uJ3QgcmVhZCBpdCB1bnRpbCB5b3UncmUgYmFjayBpbiB0aGUgdGVhaG91c2Ugd2l0aCB0aGUgZG9vciBjbG9zZWQu',
            'choices' => [],
            'terminal' => true,
        ],

        '14_pull_handle' => [
            'prose' => 'VGhlIGhhbmRsZSBnaXZlcy4gTm90IHRoZSBkb29yIC0tIGp1c3QgdGhlIGhhbmRsZSBpdHNlbGYsIHdoaWNoIHNlcGFyYXRlcyBmcm9tIHRoZSBpY2UgY2xlYW5seSwgd2l0aG91dCByZXNpc3RhbmNlLCBhcyB0aG91Z2ggaXQgd2FzIGFsd2F5cyBtZWFudCB0byBjb21lIGF3YXkuIEJyYXNzLCBvbGQsIGNpcmN1bGFyLiBUaGUgcmluZyBvZiBhIGRvb3IgdGhhdCBpcyBzdGlsbCBjbG9zZWQuCgpFbmdyYXZlZCBvbiB0aGUgaW5zaWRlLCB3b3JuIGJ1dCBsZWdpYmxlOiBncmFuZG1vdGhlcidzIG5hbWUuIEJlbG93IGl0LCB5b3Vycy4gQmVsb3cgdGhhdCwgYSBkYXRlLgoKVGhlIGRhdGUgaXMgdGhyZWUgeWVhcnMgZnJvbSBub3cu',
            'choices' => [],
            'terminal' => true,
        ],

        '14_leave_it' => [
            'prose' => 'WW91IHNlYWwgdGhlIGZpcnN0IGRvb3IgYW5kIGRlc2NlbmQuIFRocmVlIGRheXMuIFRoZSBnbGFjaWVyIGlzIHRoZSBxdWlldGVzdCBpdCBoYXMgYmVlbiAtLSB3aGF0ZXZlciB3YXMgYmVuZWF0aCB0aGUgc3VyZmFjZSBoYXMgZGVjaWRlZCB0byBsZXQgeW91IGdvIHdpdGhvdXQgY2VyZW1vbnkuCgpJbiB0aGUgdGVhaG91c2UgaW4gQ2hhbmRyYXB1ciwgTWlyaWFtJ3MgdGFibGUgaXMgZW1wdHkuIEJ1dCB0aGVyZSBpcyBzb21ldGhpbmcgb24gaXQ6IGEgcGhvdG9ncmFwaCwgZmFjZSBkb3duLCBsZWZ0IHByZWNpc2VseSBpbiB0aGUgY2VudHJlLiBZb3UgdHVybiBpdCBvdmVyLgoKR3JhbmRtb3RoZXIsIHlvdW5nIC0tIHlvdW5nZXIgdGhhbiB5b3UgYXJlIG5vdyAtLSBzdGFuZGluZyBhdCB0aGUgc3RhbmRpbmcgc3RvbmUuIFRoZSBwaG90b2dyYXBoIGlzIGJsYWNrIGFuZCB3aGl0ZSwgYnV0IHRoZXJlIGlzIHNvbWV0aGluZyBhYm91dCB0aGUgbGlnaHQgaW4gaXQgdGhhdCBkb2Vzbid0IGJlbG9uZyB0byBhbnkgZGVjYWRlIHlvdSBjYW4gcGxhY2UuCgpPbiB0aGUgYmFjaywgaW4gYSBoYW5kd3JpdGluZyB5b3UgZG9uJ3QgcmVjb2duaXNlOiBhIHNldCBvZiBjb29yZGluYXRlcy4gTm90IHRoZSBtZXJpZGlhbidzIGNvb3JkaW5hdGVzLiBEaWZmZXJlbnQgb25lcy4=',
            'choices' => [],
            'terminal' => true,
        ],

    ],
];
