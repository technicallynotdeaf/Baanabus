<?php
return [
    'id'    => 21,
    'title' => 'Different Ocean Entirely',
    'color' => '#7A8A3A',

    'pages' => [
        '1_start' => [
            'prose'  => 'QWdhbGVnYSBpcyBzbWFsbGVyIGFuZCBxdWlldGVyIGV2ZW4gdGhhbiBSb2RyaWd1ZXMsIHR3byBsb3csIHBhbG0tdGhpY2sgaXNsYW5kcyBzdHJ1bmcgdG9nZXRoZXIgYnkgYSBuYXJyb3cgc3BpdCwgdGhlIGVudGlyZSBlY29ub215IGFwcGFyZW50bHkgcnVubmluZyBvbiBjb2NvbnV0IGluIG9uZSBmb3JtIG9yIGFub3RoZXIg4oCUIGNvcHJhIGRyeWluZyBpbiB0aGUgc3VuLCBvaWwgcmVuZGVyaW5nIGluIG9wZW4gcGFucywgcm9wZSB0d2lzdGVkIGZyb20gaHVzayBmaWJyZSBieSBoYW5kcyB0aGF0IGhhdmUgY2xlYXJseSBkb25lIGl0IHRlbiB0aG91c2FuZCB0aW1lcyBiZWZvcmUuCgpUd28gcGxhbnRhdGlvbiB0cmFja3MgbGVhZCB0b3dhcmQgdGhlIHNldHRsZW1lbnQgZnJvbSB0aGUgYW5jaG9yYWdlLCBvbmUgcnVubmluZyBjbG9zZSBhbG9uZyB0aGUgc2hvcmUsIG9uZSBjdXR0aW5nIHN0cmFpZ2h0IHRocm91Z2ggdGhlIHBhbG0gcm93cyB0aGVtc2VsdmVzLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBzaG9yZSB0cmFjaw==', 'next' => '2_shore'],
                ['text' => 'Q3V0IHRocm91Z2ggdGhlIHBhbG0gcm93cw==', 'next' => '2_palms'],
            ],
        ],
        '2_shore' => [
            'prose'  => 'VGhlIHNob3JlIHRyYWNrIGlzIGVhc3kgd2Fsa2luZywgd2F2ZXMgbGFwcGluZyBjbG9zZSBvbiBvbmUgc2lkZSwgcGFsbXMgbGVhbmluZyBwZXJtYW5lbnRseSBvdXQgb3ZlciB0aGUgc2FuZCBvbiB0aGUgb3RoZXIsIGNvY29udXQgaHVza3MgcGlsZWQgYXQgaW50ZXJ2YWxzIHdhaXRpbmcgZm9yIHdoaWNoZXZlciBwcm9jZXNzIGNvbWVzIG5leHQgaW4gdGhlIGlzbGFuZCdzIHdob2xlIHVuaHVycmllZCBlY29ub215LgoKQSB3b21hbiBzb3J0aW5nIGh1c2tzIGJ5IHNpemUgZG9lc24ndCBsb29rIHVwIGZyb20gaGVyIHdvcmssIGJ1dCBkb2VzIG1lbnRpb24sIGVudGlyZWx5IHdpdGhvdXQgc3VycHJpc2UsIHRoYXQgJ3RoZSB2aXNpdG9yJyBpcyBhbHJlYWR5IGRvd24gYXQgdGhlIHNvYXAgaG91c2UsIGFzIHRob3VnaCB2aXNpdG9ycyBoZXJlIHdlcmUgYW4gZXhwZWN0ZWQgd2Vla2x5IGRlbGl2ZXJ5IHJhdGhlciB0aGFuIGFuIGV2ZW50Lg==',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHNvYXAgaG91c2U=', 'next' => '3_shared'],
            ],
        ],
        '2_palms' => [
            'prose'  => 'Q3V0dGluZyB0aHJvdWdoIHRoZSBwYWxtIHJvd3MgbWVhbnMgd2Fsa2luZyB1bmRlciBjb25zdGFudCwgY2xvc2UtcGFja2VkIHNoYWRlLCB0aGUgd2hvbGUgcGxhbnRhdGlvbiBodW1taW5nIHdpdGggdGhlIGxvdywgc3RlYWR5IHdvcmsgb2YgYW4gZWNvbm9teSB0aGF0IG5ldmVyIHJlYWxseSBzdG9wcyDigJQgZHJ5aW5nLCBwcmVzc2luZywgdHdpc3RpbmcsIHJlbmRlcmluZywgZXZlcnkgc3RhZ2UgaGFwcGVuaW5nIHNvbWV3aGVyZSB3aXRoaW4gZWFyc2hvdCBvZiBldmVyeSBvdGhlciBzdGFnZS4KCkEgbWFuIGhhdWxpbmcgYSBzYWNrIG9mIGRyaWVkIGh1c2sgZmlicmUgZG9lc24ndCBsb29rIHVwIGVpdGhlciwgYnV0IGplcmtzIGhpcyBjaGluIHRvd2FyZCB0aGUgc2V0dGxlbWVudC4gJ1Zpc2l0b3IncyBhdCB0aGUgc29hcCBob3VzZS4gQmVlbiB0aGVyZSBhIHdoaWxlLiBPZGQgZmVsbG93LiBHb29kIGhhbmRzLCB0aG91Z2guJw==',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIHNvYXAgaG91c2U=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WW91IGZpbmQgVmFvIGV4YWN0bHkgd2hlcmUgYm90aCBkaXJlY3Rpb25zIHByb21pc2VkLCBlbGJvdy1kZWVwIGluIGEgdmF0IG9mIGNvY29udXQgb2lsIGF0IHRoZSBzb2FwIGhvdXNlLCBlbnRpcmVseSB1bnN1cnByaXNlZCB0byBzZWUgeW91LCBleGFjdGx5IGFzIHVuc3VycHJpc2VkIGFzIGhlJ3MgYmVlbiBvbiBldmVyeSBzaW5nbGUgb2NlYW4gdGhpcyBqb3VybmV5IGhhcyBjcm9zc2VkIHNvIGZhci4KCidGb3VydGggdGltZSwnIHRoZSBCYXJvbiBhbm5vdW5jZXMsIHdpdGggdGhlIHBhcnRpY3VsYXIgc2F0aXNmYWN0aW9uIG9mIHNvbWVvbmUgd2hvIGhhcyBiZWVuIGtlZXBpbmcgYW4gaW5jcmVhc2luZ2x5IGltcGxhdXNpYmxlIHRhbGx5LiAnRGlmZmVyZW50IG9jZWFuIGVudGlyZWx5LiBIb3cgZG9lcyBoZSBtYW5hZ2UgdGhhdC4nIFZhbyBkb2Vzbid0IGFuc3dlciwgc2FtZSBhcyBhbHdheXMsIGp1c3QgaGFuZHMgeW91IGJvdGggYW4gYXByb24gYW5kIG5vZHMgYXQgdGhlIHZhdCwgd2hpY2ggaXMgYXBwYXJlbnRseSBpbnN0cnVjdGlvbiBlbm91Z2ggcmVnYXJkbGVzcyBvZiB3aGljaCBzZWEgeW91J3JlIHN0YW5kaW5nIGJlc2lkZS4=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgbmVlZHMgZG9pbmc=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIHNvYXAgaG91c2Ugd2FudHMgdHdvIHRoaW5ncyBmaW5pc2hlZCBiZWZvcmUgdGhlIGJhdGNoIHNldHM6IHRoZSBvaWwgaXRzZWxmLCByZW5kZXJlZCBzbG93IG92ZXIgbG93IGhlYXQgYW5kIHdhdGNoZWQgY29uc3RhbnRseSBzbyBpdCBkb2Vzbid0IHNjb3JjaCwgb3IgdGhlIGNvaXIgcm9wZSBkcnlpbmcgcmFja3Mgb3V0c2lkZSwgd2hpY2ggbmVlZCB0dXJuaW5nIGFuZCBjaGVja2luZyBmb3IgZXZlbiBjdXJlIGluIHRoZSBzdW4uICdXaGljaGV2ZXIsJyBWYW8gc2F5cy4gJ0JvdGggbWF0dGVyLiBOZWl0aGVyJ3MgaGFyZC4gSnVzdCBkb24ndCBydXNoIGVpdGhlciBvbmUuJw==',
            'choices' => [
                ['text' => 'V2F0Y2ggdGhlIG9pbCByZW5kZXI=', 'next' => '5_oil'],
                ['text' => 'VHVybiB0aGUgY29pciByb3BlIHJhY2tz', 'next' => '5_rope'],
            ],
        ],
        '5_oil' => [
            'prose'  => 'V2F0Y2hpbmcgb2lsIHJlbmRlciBwcm9wZXJseSBpcyBzbG93ZXIgdGhhbiBpdCBzb3VuZHMgYW5kIG1vcmUgZGVtYW5kaW5nIHRoYW4gaXQgbG9va3MsIHRoZSBkaWZmZXJlbmNlIGJldHdlZW4gZ29vZCBzb2FwIGFuZCBzY29yY2hlZCB3YXN0ZSBzaXR0aW5nIGluIGEgbWFyZ2luIG9mIG1pbnV0ZXMgeW91IG9ubHkgbGVhcm4gdG8gc3BvdCBieSBuZWFybHkgbWlzc2luZyBpdCBvbmNlLiBWYW8gY29ycmVjdHMgeW91ciBoZWF0IG9uY2UsIHdvcmRsZXNzbHksIHNsaWRpbmcgdGhlIHBhbiBhIGZldyBpbmNoZXMgb2ZmIHRoZSBkaXJlY3QgZmxhbWUgd2l0aG91dCBjb21tZW50LgoKQnkgdGhlIHRpbWUgdGhlIGJhdGNoIGlzIHJlYWR5IHRvIHNldCwgeW91J3ZlIGRldmVsb3BlZCBhIGdlbnVpbmUsIGhhcmQtd29uIHJlc3BlY3QgZm9yIHNvbWV0aGluZyB5b3Ugd2Fsa2VkIGluIGFzc3VtaW5nIHdhcyBzaW1wbGUu',
            'choices' => [
                ['text' => 'U2VlIGl0IGZpbmlzaGVk', 'next' => '6_shared'],
            ],
        ],
        '5_rope' => [
            'prose'  => 'VHVybmluZyBhbmQgY2hlY2tpbmcgdGhlIGNvaXIgcmFja3MgaXMgc3RyYWlnaHRmb3J3YXJkLCBzdW4td2FybWVkIHdvcmssIHJvcGUgZmlicmUgZ29pbmcgZnJvbSByb3VnaCBodXNrIHRvIHNvbWV0aGluZyBnZW51aW5lbHkgdXNlZnVsIHVuZGVyIG5vdGhpbmcgbW9yZSBjb21wbGljYXRlZCB0aGFuIHBhdGllbmNlIGFuZCBzdGVhZHkgc3VuLiBWYW8gd29ya3MgYWxvbmdzaWRlIHlvdSBpbiBoaXMgdXN1YWwgbmVhci10b3RhbCBzaWxlbmNlLCBvY2Nhc2lvbmFsbHkgYWRqdXN0aW5nIGEgcmFjaydzIGFuZ2xlIHdpdGggdGhlIHVuYm90aGVyZWQgY29tcGV0ZW5jZSBoZSBicmluZ3MgdG8gYWJzb2x1dGVseSBldmVyeXRoaW5nLgoKQnkgdGhlIGVuZCwgYSBmdWxsIGNvaWwgb2YgZ29vZCwgc3Ryb25nIGNvaXIgcm9wZSBzaXRzIHJlYWR5LCBzbWVsbGluZyBmYWludGx5IG9mIHN1biBhbmQgc2FsdCBhbmQgc29tZXRoaW5nIHN3ZWV0bHkgdmVnZXRhbCB1bmRlcm5lYXRoIGJvdGgu',
            'choices' => [
                ['text' => 'U2VlIGl0IGZpbmlzaGVk', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VmFvIHdyYXBzIHVwIHRoZSBmaW5pc2hlZCBnb29kcyDigJQgYSBiYXIgb2YgdGhlIHNldCBzb2FwLCBvciBhIGxlbmd0aCBvZiB0aGUgY3VyZWQgcm9wZSwgd2hpY2hldmVyIGhhbGYgb2YgdGhlIHdvcmsgeW91IGRpZCDigJQgd2l0aCBoaXMgdXN1YWwgZWNvbm9teSBvZiBtb3Rpb24gYW5kIG5vIGNlcmVtb255IHdoYXRzb2V2ZXIuICdGb3IgZnVydGhlciBvbiwnIGhlIHNheXMsIHNhbWUgd29yZHMgYXMgRnV0dW5hLCBzYW1lIHdvcmRzIHByb2JhYmx5IGFzIGV2ZXJ5d2hlcmUgZWxzZSBoZSdzIGV2ZXIgaGFuZGVkIGFueW9uZSBhbnl0aGluZy4KCidZb3UgdGllIHRoZSBQYWNpZmljIHRvIHRoaXMgb2NlYW4gc29tZWhvdywnIHlvdSBzYXksIGhhbGYgYSBxdWVzdGlvbiwgbW9zdGx5IGp1c3QgYW4gb2JzZXJ2YXRpb24geW91IGNhbid0IHF1aXRlIGxldCBnbyB1bnJlbWFya2VkLiBWYW8ncyBvbmx5IGFuc3dlciBpcyB0aGUgc21hbGxlc3QsIG1vc3QgaW5mdXJpYXRpbmcgc2hydWcgeW91J3ZlIGV2ZXIgc2VlbiBhIGdyb3duIG1hbiBwcm9kdWNlLg==',
            'choices' => [
                ['text' => 'TGV0IHRoZSBteXN0ZXJ5IGJl', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayBkb3duIHdoaWNoZXZlciB0cmFjayB5b3UgZGlkbid0IHRha2Ugb24gdGhlIHdheSBpbiwgdGhlIHdob2xlIGlzbGFuZCdzIHNsb3cgY29jb251dCBlY29ub215IGh1bW1pbmcgb24gYXJvdW5kIHlvdSBleGFjdGx5IGFzIGl0IHdpbGwgdG9tb3Jyb3cgYW5kIHRoZSBkYXkgYWZ0ZXIsIGVudGlyZWx5IGluZGlmZmVyZW50IHRvIGhvdyBtYW55IG9jZWFucyBvbmUgcGFydGljdWxhciBtYW4gc2VlbXMgYWJsZSB0byBiZSBzdGFuZGluZyBiZXNpZGUgYXQgb25jZS4KClNvbGFuZ2UsIHdhaXRpbmcgYXQgdGhlIGFuY2hvcmFnZSwgdGFrZXMgb25lIGxvb2sgYXQgVmFvIGFscmVhZHkgdGhlcmUgYWhlYWQgb2YgeW91IOKAlCBhZ2Fpbiwgc29tZWhvdyDigJQgYW5kIHNpbXBseSBzaGFrZXMgaGVyIGhlYWQsIGxvbmcgcGFzdCBib3RoZXJpbmcgdG8gYXNrIGhvdy4=',
            'choices' => [
                ['text' => 'QXNrIFZhbyB0byBzdGF5IGZvciB0aGUgY3Jvc3Npbmc=', 'next' => '8_end_ask'],
                ['text' => 'TGV0IGhpbSB2YW5pc2ggdGhlIHdheSBoZSBhbHdheXMgZG9lcw==', 'next' => '8_end_vanish'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzaywgbW9yZSBvdXQgb2YgaGFiaXQgdGhhbiBleHBlY3RhdGlvbiBhdCB0aGlzIHBvaW50LiBWYW8gYWN0dWFsbHkgY29uc2lkZXJzIGl0LCBmb3Igb25jZSwgbG9uZ2VyIHRoYW4gaGlzIHVzdWFsIGluc3RhbnQgbm8g4oCUIGFuZCB0aGVuIHNoYWtlcyBoaXMgaGVhZCBhbnl3YXksIGdlbnRseS4gJ05vdCB0aGlzIGxlZywnIGhlIHNheXMuICdZb3UnbGwgbWFuYWdlIHRoZSByZXN0IGZpbmUgd2l0aG91dCBtZS4gWW91IG1vc3RseSBhbHdheXMgaGF2ZS4nCgpIZSdzIGdvbmUgYnkgdGhlIHRpbWUgeW91J3ZlIHByb3Blcmx5IHJlZ2lzdGVyZWQgdGhlIGFuc3dlciwgc2FtZSBhcyBhbHdheXMsIGxlYXZpbmcgeW91IHdpdGggcm9wZSBvciBzb2FwIGluIHlvdXIgaGFuZHMgYW5kIGFuIGVudGlyZWx5IHVucmVzb2x2ZWQgcXVlc3Rpb24gYWJvdXQgZ2VvZ3JhcGh5IHlvdSBzdXNwZWN0IHlvdSdyZSBuZXZlciBhY3R1YWxseSBtZWFudCB0byBzb2x2ZS4=',
            'ending' => true,
        ],
        '8_end_vanish' => [
            'prose'  => 'WW91IGRvbid0IGFzayB0aGlzIHRpbWUsIG1hdGNoaW5nIGhpcyBvd24gZWNvbm9teSB3aXRoIHNvbWUgb2YgeW91ciBvd24sIGFuZCBWYW8gc2VlbXMgdG8gYXBwcmVjaWF0ZSBpdCBpbiBoaXMgdXN1YWwgd29yZGxlc3Mgd2F5IOKAlCBhIG5vZCwgdGhlcmUgYW5kIGdvbmUsIGJlZm9yZSBoZSdzIHNsaXBwZWQgb2ZmIHRvd2FyZCB0aGUgcGFsbXMgYW5kIG91dCBvZiBzaWdodCBlbnRpcmVseS4KClRoZSBLxY10dWt1IGxpZnRzIG9mZiBBZ2FsZWdhJ3MgbG93IGdyZWVuIHNwaXQgaW50byBvcGVuIG9jZWFuIG9uY2UgbW9yZSwgY29pciByb3BlIG9yIHNvYXAgYmFyIHJpZGluZyBzYWZlIGluIHRoZSBzYXRjaGVsLCBhbmQgeW91IGZpbmQgeW91cnNlbGYsIG5vdCBmb3IgdGhlIGZpcnN0IHRpbWUsIGRlY2lkaW5nIHRoYXQgc29tZSBteXN0ZXJpZXMgYXJlIGJldHRlciBjYXJyaWVkIHVuc29sdmVkIHRoYW4gY2hhc2VkIGRvd24gYW5kIHJ1aW5lZCBieSBhbiBhY3R1YWwgYW5zd2VyLg==',
            'ending' => true,
        ],
    ],
];
