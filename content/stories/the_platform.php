<?php
return [
    'id'    => 2,
    'title' => 'The Platform That Isn\'t',
    'color' => '#2A7FA8',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIGxldHRlciBoYXMgYmVlbiBpbiB5b3VyIGNvYXQgcG9ja2V0IGZvciBlbGV2ZW4gd2Vla3MuIFlvdSBjYW4gZmVlbCBpdCBub3cgdGhyb3VnaCB0aGUgd29vbCDigJQgdGhlIHBhcnRpY3VsYXIgd2VpZ2h0IG9mIHNvbWV0aGluZyB0aGF0IGJlbG9uZ3MgdG8gc29tZW9uZSBlbHNlLgoKQ2hhZHdpY2sgU3RhdGlvbiBpcyB0aGUgbGFyZ2VzdCBpbiB0aGUgcHJvdmluY2UuIEl0cyByb29mIGlzIGlyb24gYW5kIGdsYXNzLCBkYXJrIHdpdGggZm9ydHkgeWVhcnMgb2YgY29hbCBzbW9rZSwgYW5kIHRoZSBzb3VuZCBpbnNpZGUgaXMgYSBraW5kIG9mIGlyb24gd2VhdGhlcjogcGlzdG9ucywgd2hpc3RsZXMsIHRoZSBsb25nIHNxdWVhbCBvZiBicmFrZS1zaG9lcyBvbiB0aGUgZmFyIGxpbmVzLiBUaGUgZGVwYXJ0dXJlIGJvYXJkIHNob3dzIGVsZXZlbiBwbGF0Zm9ybXMuIFlvdSBoYXZlIGNvdW50ZWQgdGhlbSB0d2ljZS4KClRoZSB0aWNrZXQgaW4geW91ciBoYW5kIHNheXMgUGxhdGZvcm0gMTIuCgpIYW5uYWggc2FpZCB5b3Ugd291bGQgZmluZCBpdC4gU2hlIGRpZG4ndCBzYXkgaXQgd291bGQgYmUgb24gdGhlIGJvYXJkLg==',
            'choices' => [
                ['text' => 'QXNrIGF0IHRoZSBzdGF0aW9uIG1hc3RlcidzIG9mZmljZQ==', 'next' => '2_ask'],
                ['text' => 'V2F0Y2ggdGhlIGJvYXJkLiBXYWl0Lg==', 'next' => '2_watch'],
            ],
        ],
        '2_ask' => [
            'prose'   => 'VGhlIHN0YXRpb24gbWFzdGVyJ3Mgb2ZmaWNlIHNtZWxscyBvZiBtYWNoaW5lIG9pbCBhbmQgb2xkIHBhcGVyLiBUaGUgbWFuIGhpbXNlbGYgaXMgc21hbGwsIHByZWNpc2UsIGVudGlyZWx5IGF0IGhvbWUgaW4gaGlzIHVuaWZvcm0uIEhlIGxpc3RlbnMgdG8geW91ciBxdWVzdGlvbiB3aXRoIHRoZSBwYXRpZW50IGV4cHJlc3Npb24gb2Ygc29tZW9uZSB3aG8gaGFzIGV4cGxhaW5lZCB0aGlzIHBhcnRpY3VsYXIgdGhpbmcgYmVmb3JlLCBhbmQgdGhlbiBoZSBzYXlzOiB0aGVyZSBpcyBubyBQbGF0Zm9ybSAxMi4gVGhlcmUgaGFzIG5ldmVyIGJlZW4gYSBQbGF0Zm9ybSAxMi4gVGhlIE1lY2hhbmlzbSBkb2VzIG5vdCBpc3N1ZSB0aWNrZXRzIGZvciBwbGF0Zm9ybXMgdGhhdCBkb24ndCBleGlzdCwgYW5kIHNvIHRoZSB0aWNrZXQgbXVzdCBiZSBjb3VudGVyZmVpdCwgYW5kIGhlIGlzIHNvcnJ5LCBidXQgaGUgY2Fubm90IGhlbHAgeW91LgoKSGUgc2F5cyBpdCB3aXRob3V0IHVua2luZG5lc3MuIEhlIGJlbGlldmVzIGl0IGNvbXBsZXRlbHkuIEhlIGhhcyB0aGUgbG9vayBvZiBhIG1hbiB3aG8gdHJ1c3RzIFRoZSBNZWNoYW5pc20gdGhlIHdheSBvdGhlciBtZW4gdHJ1c3QgR29kIOKAlCBiZWNhdXNlIGl0IGhhcyBuZXZlciBsZXQgaGltIGRvd24sIGFuZCBiZWNhdXNlIGltYWdpbmluZyBpdCBtaWdodCBpcyBnZW51aW5lbHkgYmV5b25kIGhpbS4KCllvdSB0aGFuayBoaW0uIEhlIG5vZHMgYW5kIHJldHVybnMgdG8gaGlzIGxlZGdlci4=',
            'choices' => [
                ['text' => 'TGVhdmUgaGlzIG9mZmljZQ==', 'next' => '3_denied'],
            ],
        ],
        '2_watch' => [
            'prose'   => 'WW91IGZpbmQgYSBiZW5jaCB3aXRoIGEgY2xlYXIgdmlldyBvZiB0aGUgYm9hcmQgYW5kIHNpdC4gVGhlIGxldHRlciBpcyBpbiB5b3VyIGNvYXQgcG9ja2V0IOKAlCBIYW5uYWgncyBoYW5kd3JpdGluZyBvbiB0aGUgZW52ZWxvcGUsIGhlciBkYXVnaHRlcidzIG5hbWUgaW4gaW5rIHRoYXQgaGFzIHN0YXJ0ZWQgdG8gc211ZGdlIGF0IHRoZSBjb3JuZXJzIGZyb20gZWxldmVuIHdlZWtzIG9mIGhhbmRsaW5nLiBZb3UgYm91Z2h0IGEgY3VwIG9mIHRlYSBmcm9tIHRoZSB0cm9sbGV5LCB0b28gbXVjaCBtaWxrIGJ1dCB3YXJtLCBhbmQgeW91IHdhdGNoIHRoZSBib2FyZCBjbGljayB0aHJvdWdoIGl0cyBkZXBhcnR1cmVzLgoKQSBwb3J0ZXIgY3Jvc3NlcyB0aGUgaGFsbCB3aXRoIGFuIGVtcHR5IGx1Z2dhZ2UgY2FydC4gU21hbGwgYW5kIHF1aWNrLCBzaGUga25vd3MgZXZlcnkgaW5jaCBvZiB0aGlzIGZsb29yIOKAlCBoZXIgd2hlZWxzIGZpbmQgdGhlIHNtb290aCBsaW5lcyBiZXR3ZWVuIHRpbGVzIHdpdGhvdXQgaGVyIG5lZWRpbmcgdG8gbG9vay4gU2hlIGdsYW5jZXMgYXQgeW91IG9uY2UuIE5vdCB0aGUgZ2xhbmNlIG9mIHNvbWVvbmUgbG9va2luZyBmb3IgYSBmYXJlLiBUaGUgZ2xhbmNlIG9mIHNvbWVvbmUgd2hvIGhhcyBub3RpY2VkIHNvbWV0aGluZyBhbmQgaXMgd2FpdGluZyB0byBzZWUgd2hhdCB5b3UgZG8gbmV4dC4KClBsYXRmb3JtIDkuIFBsYXRmb3JtIDEwLiBQbGF0Zm9ybSAxMS4gVGhlIGJvYXJkIGN5Y2xlcyBhZ2Fpbi4=',
            'choices' => [
                ['text' => 'Q2hlY2sgdGhlIHJlc3Qgb2YgdGhlIHN0YXRpb24=', 'next' => '3_denied'],
            ],
        ],
        '3_denied' => [
            'prose'   => 'WW91J3ZlIG1hZGUgdGhlIHJvdW5kcy4gVGhlIHRpbWV0YWJsZSByb29tLiBUaGUgbG9zdCBwcm9wZXJ0eSBvZmZpY2UuIEFuIGluZm9ybWF0aW9uIGNsZXJrIHdobyBjb25zdWx0ZWQgYSBsZWRnZXIgdGhlIHNpemUgb2YgYSB3YXJkcm9iZS4gRWxldmVuIHBsYXRmb3Jtcy4gQWx3YXlzIGVsZXZlbi4gVGhlIE1lY2hhbmlzbSdzIHJlY29yZHMgZ28gYmFjayBmb3J0eSB5ZWFycyBhbmQgUGxhdGZvcm0gMTIgZG9lcyBub3QgYXBwZWFyIGluIGFueSBvZiB0aGVtLgoKTm8gb25lIHdhcyB1bmtpbmQuIFRoZXkgYmVsaWV2ZSB3aGF0IHRoZXkndmUgYmVlbiB0b2xkLCBhbmQgd2hhdCB0aGV5J3ZlIGJlZW4gdG9sZCBpcyB0cnVlIOKAlCBhcyBmYXIgYXMgaXQgZ29lcy4KCllvdSBzdGFuZCBpbiB0aGUgbWlkZGxlIG9mIHRoZSBoYWxsLiBUaGUgaXJvbiB3ZWF0aGVyIG1vdmVzIGFyb3VuZCB5b3UuIEEgY2hpbGQgaXMgY3J5aW5nIHNvbWV3aGVyZSBuZWFyIFBsYXRmb3JtIDMuIFRoZSBjbG9jayBhYm92ZSB0aGUgYm9hcmQgcmVhZHMgMTQ6MjIuCgpIYW5uYWggaGFkIG5vdCBzdHJ1Y2sgeW91IGFzIGEgd29tYW4gd2hvIG1hZGUgdGhpbmdzIHVwLg==',
            'choices' => [
                ['text' => 'TG9vayBmb3IgaXQgeW91cnNlbGY=', 'next' => '4_search'],
                ['text' => 'RmluZCB0aGUgcG9ydGVyIHdobyBrZWVwcyB3YXRjaGluZyB5b3U=', 'next' => '4_porter'],
            ],
        ],
        '4_search' => [
            'prose'   => 'UGxhdGZvcm0gMTEgZW5kcyBhdCBhIHJhaWxpbmcuIEJleW9uZCBpdCB0aGUgc3RhdGlvbiBvcGVucyBpbnRvIG1haW50ZW5hbmNlIHRlcnJpdG9yeSDigJQgc29ydGluZyBzaGVkcywgY29hbCBzdG9yYWdlLCBsb25nIHJlcGFpciBoYWxscyB0aGF0IHNtZWxsIG9mIHJ1c3QgYW5kIGhvdCBpcm9uLiBZb3UgZm9sbG93IHRoZSBzb3VuZCB1bnRpbCBpdCB0aGlucywgcGFzc2luZyB0aHJvdWdoIHNwYWNlcyB5b3UncmUgbGVzcyBhbmQgbGVzcyBjZXJ0YWluIHlvdSdyZSBtZWFudCB0byBiZSBpbiwgdW50aWwgdGhlIHBhc3NhZ2UgbmFycm93cyBhbmQgdGhlIHNvdW5kcyBkcm9wIGF3YXkuCgpBdCB0aGUgZmFyIGVuZDogYSBkb29yLiBOb3QgbGFiZWxsZWQuIFRoZSBraW5kIG9mIGRvb3IgdGhhdCBoYXMgYWx3YXlzIGJlZW4gdGhlcmUgYW5kIHdhcyBuZXZlciBvbiBhbnkgcGxhbi4KClRoZSBhaXIgY29taW5nIHRocm91Z2ggdGhlIGdhcCBhdCB0aGUgYm90dG9tIGlzIGNvbGRlciB0aGFuIGl0IHNob3VsZCBiZSwgYW5kIGl0IGNhcnJpZXMsIGltcG9zc2libHksIHRoZSBzbWVsbCBvZiByYWluIG9uIG9sZCBzdG9uZS4KCkEgd29tYW4ncyB2b2ljZSBiZWhpbmQgeW91IHNheXM6ICJJJ3ZlIGJlZW4gd2F0Y2hpbmcgeW91IHNpbmNlIHRoZSBpbmZvcm1hdGlvbiBkZXNrLiI=',
            'choices' => [
                ['text' => 'VHVybiB0byBmYWNlIGhlcg==', 'next' => '5_marguerite'],
            ],
        ],
        '4_porter' => [
            'prose'   => 'U2hlJ3MgbmVhciB0aGUgbmV3c3BhcGVyIHN0YW5kLiBTaGUgZG9lc24ndCBsb29rIGRpcmVjdGx5IGF0IHlvdSDigJQgc2hlJ3MgZXhhbWluaW5nIGEgc3RyYXAgb24gb25lIG9mIHRoZSBjYXNlcyBvbiBoZXIgY2FydCwgYnV0IGhlciBhdHRlbnRpb24gaXMgZW50aXJlbHkgeW91cnMuCgpXaGVuIHlvdSBhcHByb2FjaCBzaGUgc2F5cywgd2l0aG91dCBwcmVhbWJsZSwgdGhhdCBzaGUgc2F3IHRoZSBzdGF0aW9uIG1hc3RlcidzIGZhY2Ugd2hlbiB5b3UgbGVmdCBoaXMgb2ZmaWNlLiBTaGUgaGFzIHNlZW4gdGhhdCBleHByZXNzaW9uIHR3aWNlIGluIHRoaXJ0eS1vbmUgeWVhcnMuCgpIZXIgbmFtZSBpcyBNYXJndWVyaXRlLiBTaGUgYmVnaW5zIHdhbGtpbmcuCgpTaGUgZG9lc24ndCBleHBsYWluIGFueXRoaW5nIGVsc2UgeWV0LCB3aGljaCBpcyBob3cgeW91IGtub3cgc2hlIG1lYW5zIHRvIGV4cGxhaW4gaXQgZWxzZXdoZXJlLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IE1hcmd1ZXJpdGU=', 'next' => '5_marguerite'],
            ],
        ],
        '5_marguerite' => [
            'prose'   => 'SGVyIG5hbWUgaXMgTWFyZ3Vlcml0ZS4gVGhpcnR5LW9uZSB5ZWFycyBhdCBDaGFkd2ljayBTdGF0aW9uLiBTaGUgaGFzIHNlZW4gUGxhdGZvcm0gMTIgdHdpY2U6IG9uY2UgaW4gMTg4NyB3aGVuIGEgbWFuIGNhbWUgdGhyb3VnaCBsb29raW5nIGZvciBoaXMgc29uLCBhbmQgb25jZSBpbiAxOTAyIHdoZW4gc2hlIGhlcnNlbGYgbmVlZGVkIHRvIGdvIHNvbWV3aGVyZSBhbmQgZGlkbid0IGtub3cgd2hlcmUgaXQgd2FzIHVudGlsIHNoZSB3YXMgYWxyZWFkeSB0aGVyZS4gU2hlIGZvdW5kIHdoYXQgc2hlIG5lZWRlZCBvbiB0aGUgZmlyc3QgdmlzaXQuIFRoZSBzZWNvbmQgdGltZSB3YXMgZGlmZmVyZW50LCBhbmQgc2hlIGlzbid0IHRlbGxpbmcgeW91IGFib3V0IHRoYXQuCgoiVGhlIE1lY2hhbmlzbSBkb2Vzbid0IG1ha2UgdGhpbmdzIHVwLCIgc2hlIHNheXMuICJCdXQgaXQgZG9lc24ndCB3cml0ZSBldmVyeXRoaW5nIGRvd24gZWl0aGVyLiIKClNoZSBzdG9wcyBhdCBhIGRvb3IgYXQgdGhlIGZhciBlbmQgb2YgYSBwYXNzYWdlIGJlaGluZCB0aGUgY29hbCByb29tLiBJdCBvcGVucyB3aXRob3V0IGEga2V5LgoKQmV5b25kIGl0OiBzdG9uZSBzdGVwcy4gQ29sZCBhaXIuIFRoZSBzbWVsbCBvZiByYWluIG9uIGlyb24uIEFuZCBiZWxvdywgc29tZXdoZXJlIGluIHRoZSBkYXJrLCB0aGUgc291bmQgb2Ygc29tZXRoaW5nIGlkbGluZyBhdCBsb3cgcHJlc3N1cmUg4oCUIGEgdHJhaW4gdGhhdCBpcyBub3QgaW4gYW55IHNjaGVkdWxlLCBwYXRpZW50LCBub3QgZ29pbmcgYW55d2hlcmUgeWV0LgoKIllvdSdsbCBnbyB0aGUgcmVzdCBvZiB0aGUgd2F5IHdpdGhvdXQgbWUsIiBzaGUgc2F5cy4gIkl0IGRvZXNuJ3Qgd29yayBpZiBJIGNvbWUuIgoKU2hlIGRvZXNuJ3QgZXhwbGFpbiB3aGF0ICdpdCcgaXMu',
            'choices' => [
                ['text' => 'R28gZG93biB0byBQbGF0Zm9ybSAxMg==', 'next' => '6_platform'],
            ],
            'terminal' => true,
        ],
        '6_platform' => [
            'prose'   => 'VGhlIHBsYXRmb3JtIGlzIGxvbmcgYW5kIGxpdCBieSB0d28gbGFtcHMsIG9uZSBhdCBlYWNoIGVuZCDigJQgYmFyZWx5IGVub3VnaC4gQmV0d2VlbiB0aGVtOiBhIHRyYWluLiBTZXZlbiBjYXJyaWFnZXMsIGRhcmsgYmx1ZSwgbm8gbWFya2luZ3MgeW91IHJlY29nbmlzZS4gU3RlYW0gbGVha3MgZnJvbSBzb21ld2hlcmUgYmVuZWF0aCB0aGUgdGhpcmQgY2FycmlhZ2UgaW4gYSBzbG93LCBwYXRpZW50IHJpYmJvbiwgdGhlIHdheSB0aGluZ3MgbGVhayB3aGVuIHRoZXkndmUgYmVlbiB3YWl0aW5nIGEgd2hpbGUgYW5kIGhhdmUgbWFkZSB0aGVpciBwZWFjZSB3aXRoIGl0LgoKVGhlIHBsYXRmb3JtIGlzIGRyeS4gWW91IGRvbid0IGtub3cgaG93LiBJdCBoYXMgYmVlbiByYWluaW5nIGFib3ZlIGdyb3VuZCBhbGwgZGF5LgoKVGhyb3VnaCB0aGUgd2luZG93IG9mIHRoZSBzZWNvbmQgY2FycmlhZ2UsIGEgd29tYW4gc2l0cyBhdCBhIHNtYWxsIHRhYmxlIHdpdGggaGVyIGhhbmRzIGZvbGRlZC4gU2hlIGlzIG5vdCByZWFkaW5nLiBTaGUgaXMgd2FpdGluZyDigJQgaW4gdGhlIHBhcnRpY3VsYXIgd2F5IHRoYXQgcGVvcGxlIHdhaXQgd2hlbiB0aGV5J3ZlIHN0b3BwZWQgZXhwZWN0aW5nLCBhbmQgdGhlbiBzdGFydGVkIGFnYWluLg==',
            'choices' => [
                ['text' => 'Qm9hcmQgYXQgdGhlIG5lYXJlc3QgY2FycmlhZ2UgZG9vcg==', 'next' => '7_carriage'],
                ['text' => 'V2FsayB0b3dhcmQgdGhlIHdvbWFuIGluIHRoZSBzZWNvbmQgY2FycmlhZ2U=', 'next' => '7_figure'],
            ],
        ],
        '7_carriage' => [
            'prose'   => 'VGhlIGRvb3Igb3BlbnMgaW53YXJkIGFuZCBlYXNpbHksIHdoaWNoIHN1cnByaXNlcyB5b3Ug4oCUIHlvdSB3ZXJlIGJyYWNlZCBmb3IgcmVzaXN0YW5jZS4gSW5zaWRlIGl0IGlzIHdhcm1lciB0aGFuIHRoZSBwbGF0Zm9ybSwgbGFtcC1saXQsIHRoZSBzZWF0cyBjb3ZlcmVkIGluIHZlbHZldCB0aGF0IHdhcyBvbmNlIHZlcnkgZ29vZCBhbmQgaXMgbm93IHZlcnkgd29ybi4gQSBjb25kdWN0b3IgYXBwZWFycyBmcm9tIHRoZSBmYXIgZW5kLCBzbWFsbCBhbmQgdW5odXJyaWVkLCB3aXRoIHRoZSBsb29rIG9mIHNvbWVvbmUgd2hvIGV4cGVjdGVkIHlvdS4KCiJUaGUgbGFkeSBpbiBjYXJyaWFnZSB0d28sIiBoZSBzYXlzLCAiaGFzIGJlZW4gd2FpdGluZyBzb21lIHRpbWUuIgoKSGUgZG9lc24ndCBhc2sgZm9yIHlvdXIgdGlja2V0LiBZb3UgZm9sbG93IGhpbS4=',
            'choices' => [
                ['text' => 'U3RlcCBpbnRvIHRoZSBzZWNvbmQgY2FycmlhZ2U=', 'next' => '8_eleanor'],
            ],
        ],
        '7_figure' => [
            'prose'   => 'U2hlIHNlZXMgeW91IGJlZm9yZSB5b3UgcmVhY2ggdGhlIHdpbmRvdy4gU2hlIGRvZXNuJ3QgbW92ZSDigJQganVzdCB3YXRjaGVzIHlvdSBhcHByb2FjaCB3aXRoIHRoZSBwYXJ0aWN1bGFyIHN0aWxsbmVzcyBvZiBzb21lb25lIHdobyBoYXMgbGVhcm5lZCB0byBob2xkIGhlcnNlbGYgdG9nZXRoZXIgYnkgaG9sZGluZyB2ZXJ5IHN0aWxsLgoKV2hlbiB5b3UgcmVhY2ggaGVyIGNhcnJpYWdlIGRvb3IsIHNoZSBvcGVucyBpdCBmcm9tIHRoZSBpbnNpZGUuCgpIZXIgZXllcyBhcmUgaGVyIG1vdGhlcidzIGV5ZXMuIFlvdSBrbm93IHRoaXMgYmVjYXVzZSB5b3Uga25ldyBoZXIgbW90aGVyLCBhbmQgYmVjYXVzZSBzb21lIHRoaW5ncyBhcmUgY2FycmllZCBpbiB0aGUgZmFjZSBhY3Jvc3MgYW4gZW50aXJlIGxpZmUgd2l0aG91dCBlaXRoZXIgcGVyc29uIGludGVuZGluZyBpdC4=',
            'choices' => [
                ['text' => 'U3RlcCBpbnNpZGU=', 'next' => '8_eleanor'],
            ],
        ],
        '8_eleanor' => [
            'prose'   => 'SGVyIG5hbWUgaXMgRWxlYW5vci4gVGhlcmUncyBhIGN1cCBvZiB0ZWEgb24gdGhlIHRhYmxlIOKAlCBsb25nIGNvbGQsIG9yZGVyZWQgYXQgc29tZSBwb2ludCBzaGUgY2FuJ3QgcmVtZW1iZXIg4oCUIHRoYXQgc2hlJ3MgYmVlbiB1c2luZyBhcyBzb21ldGhpbmcgdG8gbG9vayBhdC4gU2hlIGRvZXNuJ3Qga25vdyBob3cgbG9uZyBzaGUncyBiZWVuIGhlcmUuIFNoZSBjYW1lIHRvZGF5IGJlY2F1c2Ugc2hlIGZlbHQgc2hlIG5lZWRlZCB0bywgd2hpY2ggaXMgd2hhdCBzaGUgYWx3YXlzIHRlbGxzIGhlcnNlbGYgd2hlbiBzaGUgY2FuJ3QgZXhwbGFpbiBzb21ldGhpbmcgbW9yZSBwcmVjaXNlbHkgdGhhbiB0aGF0LgoKU2hlIGFza3MgaG93IHlvdSBrbmV3IGhlci4KCllvdSB0ZWxsIGhlcjogeW91IGRpZG4ndCwgbm90IHJlYWxseS4gWW91IGtuZXcgaGVyIG1vdGhlci4gSGFubmFoLgoKRWxlYW5vcidzIGhhbmRzLCBhbHJlYWR5IHN0aWxsLCBnbyB2ZXJ5IHN0aWxsLgoKWW91IHRha2UgdGhlIGxldHRlciBmcm9tIHlvdXIgY29hdCBwb2NrZXQgYW5kIHNldCBpdCBvbiB0aGUgdGFibGUgYmV0d2VlbiB5b3UuIEhhbm5haCdzIGhhbmR3cml0aW5nLiBUaGUgZW52ZWxvcGUgd29ybiBhdCB0aGUgY29ybmVycyBmcm9tIGVsZXZlbiB3ZWVrcyBvZiBiZWluZyBjYXJyaWVkLiBFbGVhbm9yIGxvb2tzIGF0IGl0IGZvciBhIGxvbmcgdGltZSB3aXRob3V0IHRvdWNoaW5nIGl0Lg==',
            'choices' => [
                ['text' => 'U2xpZGUgaXQgdG93YXJkIGhlcg==', 'next' => '9_give'],
                ['text' => 'V2FpdCDigJQgYXNrIGhlciBvbmUgcXVlc3Rpb24gZmlyc3Q=', 'next' => '9_keep'],
            ],
        ],
        '9_give' => [
            'prose'   => 'WW91IHB1c2ggaXQgYWNyb3NzIHRoZSB0YWJsZSBhbmQgc2F5IG5vdGhpbmcuCgpTaGUgb3BlbnMgaXQgY2FyZWZ1bGx5IOKAlCBub3QgdGVhcmluZywgbm90IGh1cnJ5aW5nLiBUaGUgaGFuZHdyaXRpbmcgaW5zaWRlIGlzIHNtYWxsZXIgdGhhbiBvbiB0aGUgZW52ZWxvcGUsIG1vcmUgY29tcHJlc3NlZCwgdGhlIHdheSB3cml0aW5nIGdldHMgd2hlbiBzb21lb25lIGhhcyBhIGdyZWF0IGRlYWwgdG8gc2F5IGFuZCBpcyBtZWFzdXJpbmcgd2hhdCdzIGxlZnQgb2YgdGhlIHBhZ2UuCgpTaGUgcmVhZHMgZm9yIGEgbG9uZyB0aW1lLiBPbmNlIHNoZSBzdG9wcyBhbmQgcHJlc3NlcyBib3RoIHBhbG1zIGZsYXQgYWdhaW5zdCB0aGUgdGFibGUsIGFzIGlmIHRoZSB0YWJsZSBuZWVkcyB0byBzdGF5IHdoZXJlIGl0IGlzLgoKWW91IGxvb2sgb3V0IHRoZSB3aW5kb3cuIFRoZSBsYW1wIGF0IHRoZSBmYXIgZW5kIG9mIHRoZSBwbGF0Zm9ybSByZWZsZWN0cyBpbiB0aGUgZ2xhc3MuIE5vdGhpbmcgZWxzZSBpcyB2aXNpYmxlLgoKV2hlbiBzaGUgZmluaXNoZXMgc2hlIGZvbGRzIHRoZSBsZXR0ZXIgYmFjayB0aGUgd2F5IGl0IGNhbWUuIFNoZSBkb2Vzbid0IHRlbGwgeW91IHdoYXQgd2FzIGluIGl0LiBTaGUgc2F5cywgaW5zdGVhZDogIlNoZSBhbHdheXMgdHJ1c3RlZCB0aGUgb25lcyB3aG8gZGlkbid0IG5lZWQgdG8gYmUgdG9sZCB3aHkuIg==',
            'choices' => [
                ['text' => 'V2FpdCBmb3IgaGVyIG5leHQgd29yZA==', 'next' => '10_truth'],
            ],
        ],
        '9_keep' => [
            'prose'   => 'WW91IGtlZXAgeW91ciBoYW5kIG9uIHRoZSBlbnZlbG9wZS4gWW91IGFzazogaG93IGRpZCBzaGUga25vdyB0byBjb21lIHRvZGF5PyBXaGF0IGlzIFBsYXRmb3JtIDEyPyBXaHkgZGlkIEhhbm5haCBzZW5kIGEgc3RyYW5nZXIgd2l0aCBhIGxldHRlciBzaGUgY291bGQgaGF2ZSBwb3N0ZWQ/CgpFbGVhbm9yIHBpY2tzIHVwIHRoZSBjb2xkIGN1cCBvZiB0ZWEgYW5kIHNldHMgaXQgZG93biBhZ2Fpbi4gU2hlIGlzIGFzc2Vzc2luZyB5b3Ug4oCUIG5vdCB1bmtpbmRseSwgYnV0IGNhcmVmdWxseS4KClRoZW4gc2hlIHNheXM6ICJNeSBtb3RoZXIgc2VudCB5b3UgYmVjYXVzZSBzaGUgdHJ1c3RlZCB5b3UuIFNoZSB0cnVzdGVkIHlvdSBiZWNhdXNlIHNoZSBrbmV3IHlvdSdkIGdldCB0aGlzIGZhci4iIFNoZSBub2RzIGF0IHRoZSBlbnZlbG9wZS4gIkFuZCBzaGUga25ldyB3aGF0IHlvdSdkIGRvIG9uY2UgeW91IGRpZC4iCgpBIHBhdXNlLiBUaGUgc3RlYW0gc2hpZnRzIHNvbWV3aGVyZSBiZWxvdy4KCiJBc2sgbWUgYWZ0ZXIgeW91J3ZlIGdpdmVuIGl0IHRvIG1lLCIgc2hlIHNheXMuCgpZb3UgZ2l2ZSBoZXIgdGhlIGxldHRlci4gU2hlIHJlYWRzLg==',
            'choices' => [
                ['text' => 'V2FpdCBmb3IgaGVyIHRvIGZpbmlzaA==', 'next' => '10_truth'],
            ],
        ],
        '10_truth' => [
            'prose'   => 'U2hlIHRlbGxzIHlvdSB0aGUgc2hhcGUgb2YgaXQg4oCUIG5vdCBhbGwgb2YgaXQsIGJ1dCB0aGUgc2hhcGUuCgpUaGUgbGV0dGVyIHdhcyBpbnN0cnVjdGlvbnMuIEhlciBtb3RoZXIgaGFkIGJlZW4ga2VlcGluZyBzb21ldGhpbmcgc2FmZSB0aGF0IG5lZWRlZCB0byBnbyBzb21ld2hlcmUgZWxzZSwgYW5kIEVsZWFub3IgaXMgdGhlIG9uZSB3aG8ga25vd3Mgd2hlcmUuIFBsYXRmb3JtIDEyIGlzIHRoZSBvbmx5IHBsYXRmb3JtIHRoYXQgZ29lcyB0aGVyZSDigJQgVGhlIE1lY2hhbmlzbSBkb2Vzbid0IHNlcnZpY2UgdGhhdCByb3V0ZSBiZWNhdXNlIFRoZSBNZWNoYW5pc20gZGlkbid0IGJ1aWxkIGl0LgoKIlNoZSBjb3VsZG4ndCBzZW5kIGl0IGJ5IHBvc3QsIiBFbGVhbm9yIHNheXMuICJPciBieSB0ZWxlZ3JhbS4gRXZlcnl0aGluZyByb3V0ZXMgdGhyb3VnaCBUaGUgTWVjaGFuaXNtIGV2ZW50dWFsbHkuIEV2ZXJ5dGhpbmcgZ2V0cyByZWFkIGV2ZW50dWFsbHkuIFNoZSBuZWVkZWQgc29tZW9uZSB3aG8gd291bGQgY2FycnkgaXQgd2l0aG91dCBsb29raW5nLiIKClNoZSBmb2xkcyB0aGUgbGV0dGVyIGludG8gaGVyIGNvYXQuCgpBdCB0aGUgZmFyIGVuZCBvZiB0aGUgY2FycmlhZ2UsIHRoZSBjb25kdWN0b3IgYXBwZWFycy4gIldlJ3JlIHJlYWR5LCIgaGUgc2F5cy4gSGUgc2F5cyBpdCB0byBib3RoIG9mIHlvdS4KClRoZSB0cmFpbiBleGhhbGVzIGJlbmVhdGggeW91LiBUaGUgbGFtcCBvbiB0aGUgcGxhdGZvcm0gc3dheXMgb25jZS4=',
            'choices' => [
                ['text' => 'U3RlcCBkb3duIG9udG8gdGhlIHBsYXRmb3Jt', 'next' => '11_end_stay'],
                ['text' => 'U3RheSBpbiB5b3VyIHNlYXQ=', 'next' => '11_end_go'],
            ],
        ],
        '11_end_stay' => [
            'prose'   => 'WW91IHN0YW5kIGF0IHRoZSBjYXJyaWFnZSBkb29yLiBFbGVhbm9yIGlzIGFscmVhZHkgbG9va2luZyBhaGVhZCDigJQgbm90IGRpc21pc3NpbmcgeW91LCBidXQgeW91IGNhbiBzZWUgc2hlIGhhcyBzb21ld2hlcmUgdG8gYmUgYW5kIHRoYXQgdGhlIHNvbWV3aGVyZSBpcyByZWFsIGFuZCB3aWxsIGNvc3QgaGVyIHNvbWV0aGluZy4KCiJUaGFuayB5b3UsIiBzaGUgc2F5cy4gSXQgaXMgbm90IGEgc21hbGwgdGhhbmsteW91LiBUaGVyZSBpcyBubyByb29tIGxlZnQgaW4gaXQgZm9yIHNheWluZyB5b3UncmUgd2VsY29tZS4KCllvdSBzdGVwIGRvd24gb250byBQbGF0Zm9ybSAxMi4gVGhlIGRvb3IgY2xvc2VzIGJlaGluZCB5b3UsIHF1aWV0bHksIHRoZSB3YXkgYSBnb29kIGRvb3IgY2xvc2VzLiBUaGUgdHJhaW4gZ2F0aGVycyBpdHNlbGYg4oCUIG5vIHdoaXN0bGUsIG5vIGFubm91bmNlbWVudCDigJQgYW5kIHRoZW4gaXQgaXMgc2ltcGx5IGdvbmUuIFRoZSBmYXIgbGFtcCBpcyBzdGlsbCBidXJuaW5nLiBUaGUgc3RlYW0gZGlzc2lwYXRlcy4gVGhlIHBsYXRmb3JtIGlzIGRyeSBhbmQgc3RpbGwuCgpZb3UgY2FycmllZCB0aGUgbGV0dGVyIGZvciBlbGV2ZW4gd2Vla3MuIFlvdSBmb3VuZCB0aGUgcGxhdGZvcm0uIFlvdSBmb3VuZCBFbGVhbm9yLiBZb3UgcHV0IHdoYXQgbmVlZGVkIHRvIGJlIGluIGhlciBoYW5kcyBpbnRvIGhlciBoYW5kcy4KCllvdSBkb24ndCBrbm93IHdoYXQgd2FzIGluIHRoZSBsZXR0ZXIuIFlvdSBkb24ndCBrbm93IHdoZXJlIHRoZSB0cmFpbiB3ZW50LiBZb3Uga25vdyBpdCB3ZW50IHdoZXJlIGl0IG5lZWRlZCB0byBnbywgYW5kIHRoYXQgdGhlIHdvbWFuIG9uIGl0IGtub3dzIHdoYXQgc2hlJ3MgZG9pbmcuCgpZb3UgZ28gYmFjayB1cCB0aGUgc3RvbmUgc3RlcHMgdG8gQ2hhZHdpY2sgU3RhdGlvbiwgd2hlcmUgdGhlIGJvYXJkIHNob3dzIGVsZXZlbiBwbGF0Zm9ybXMgYW5kIHRoZSAxNjozMCB0byBBbGRlcm1vb3IgZGVwYXJ0cyBpbiBzaXggbWludXRlcy4gTWFyZ3Vlcml0ZSBpcyBub3QgYXQgaGVyIGNhcnQuIFlvdSBkb24ndCBleHBlY3Qgc2hlIHdpbGwgYmUu',
            'ending'  => true,
        ],
        '11_end_go' => [
            'prose'   => 'WW91IGRvbid0IHN0YW5kLiBZb3UgZG9uJ3QgcmVhY2ggZm9yIHlvdXIgY29hdC4gVGhlIGNvbmR1Y3RvciBnbGFuY2VzIGF0IHlvdSwgdGhlbiBhdCBFbGVhbm9yLCB0aGVuIGNvbnN1bHRzIGhpcyB3YXRjaCB3aXRoIHRoZSBleHByZXNzaW9uIG9mIGEgbWFuIHdobyBleHBlY3RlZCB0aHJlZSBwYXNzZW5nZXJzIGFuZCBpcyBjb250ZW50LgoKVGhlIGRvb3IgY2xvc2VzLiBUaGUgdHJhaW4gZ2F0aGVycyBpdHNlbGYgYmVuZWF0aCB5b3UuCgpZb3UgaGF2ZSBubyBsdWdnYWdlLiBObyByZXR1cm4gdGlja2V0LiBFbGVhbm9yIGxvb2tzIGF0IHlvdSBzaWRld2F5cyDigJQgcmVjYWxpYnJhdGluZywgYnV0IG5vdCBhbGFybWVkLiAiV2VsbCwiIHNoZSBzYXlzLCBhZnRlciBhIG1vbWVudC4KClRoZSBsYW1wIG9uIFBsYXRmb3JtIDEyIHNsaWRlcyBwYXN0IHRoZSB3aW5kb3cuIFRoZW4gc3RvbmUgYW5kIGRhcmssIGFuZCB0aGVuIHNvbWV0aGluZyB0aGF0IGlzbid0IHF1aXRlIGRhcmsg4oCUIHRoZSBwYXJ0aWN1bGFyIHF1YWxpdHkgb2YgdGhlIHNwYWNlIGJldHdlZW4gb25lIHBsYWNlIGFuZCB3aGVyZXZlciB0aGlzIHRyYWluIGhhcyBhbHdheXMgYmVlbiBnb2luZy4KClRoZSBjb25kdWN0b3IgcmV0dXJucyB3aXRoIHR3byBjdXBzIG9mIHRlYS4gVGhleSdyZSBob3QuIEhlIHNldHMgdGhlbSBkb3duIHdpdGhvdXQgc3BpbGxpbmcgYSBkcm9wLCB3aGljaCBzZWVtcyBpbXBvc3NpYmxlIGdpdmVuIHRoZSBtb3Rpb24sIGFuZCBtb3ZlcyBvbiB3aXRob3V0IGNvbW1lbnQsIGluIHRoZSBtYW5uZXIgb2YgY29uZHVjdG9ycyB3aG8gaGF2ZSBzZWVuIHN0cmFuZ2VyIHRoaW5ncyB0aGFuIGEgcGFzc2VuZ2VyIHdpdGhvdXQgYSBkZXN0aW5hdGlvbi4KCllvdSB3cmFwIGJvdGggaGFuZHMgYXJvdW5kIHlvdXJzIGFuZCBsZXQgdGhlIHdhcm10aCBtb3ZlIHRocm91Z2guCgpUaGVyZSdzIGEgbG9uZyB3YXkgdG8gZ28uIEl0IHR1cm5zIG91dCB5b3Ugd2VyZSBhbHdheXMgZ29pbmcgdG8gZ28gaXQu',
            'ending'  => true,
        ],
    ],
];
