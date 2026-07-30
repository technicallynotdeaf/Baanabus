<?php
return [
    'id'    => 9,
    'title' => 'Load-Bearing',
    'color' => '#7A6A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIFVyYWwgTW91bnRhaW5zIHJpc2UgbG93IGFuZCBvbGQgY29tcGFyZWQgdG8gdGhlIHBlYWtzIHlvdSd2ZSBncm93biB1c2VkIHRvLCB3b3JuIGJ5IHRpbWUgaW50byBzb21ldGhpbmcgbW9yZSBsaWtlIGVub3Jtb3VzIGhpbGxzIHRoYW4gcHJvcGVyIG1vdW50YWlucyDigJQgYW5kIHRocmVhZGVkLCB0aGlzIHN0cmV0Y2ggb2YgdGhlbSwgd2l0aCBtaW5lIHNoYWZ0cyB0aGF0IGhhdmUgYmVlbiB3b3JrZWQgZm9yIGxvbmdlciB0aGFuIG1vc3Qgb2YgdGhlIHN1cnJvdW5kaW5nIHRvd24ncyBidWlsZGluZ3MgaGF2ZSBzdG9vZC4gR3JldGEgbW9vcnMgdGhlIENvbnRvdXIgb24gdGhlIGVkZ2Ugb2YgdG93biwgZXllaW5nIHRoZSBtaW5lIGhlYWQtZnJhbWVzIHdpdGggb3BlbiBjdXJpb3NpdHkuCgpUd28gd2F5cyB0byBhcHByb2FjaCB0aGUgbWluZSBwcmVzZW50IHRoZW1zZWx2ZXM6IGNhdGNoaW5nIHRoZSBkYXkgc2hpZnQsIHdoZW4gdGhlIGZvcmVtYW4ncyBlYXNpZXN0IHRvIGFjdHVhbGx5IGZpbmQgYW5kIHRhbGsgdG8sIG9yIHRoZSBuaWdodCBzaGlmdCwgcXVpZXRlciwgd2hlbiB0aGUgbWFjaGluZXJ5IGl0c2VsZiBpcyBlYXNpZXIgdG8gcHJvcGVybHkgZXhhbWluZSB3aXRob3V0IGdldHRpbmcgaW4gYW55b25lJ3Mgd2F5Lg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggZHVyaW5nIHRoZSBkYXkgc2hpZnQ=', 'next' => '2_day'],
                ['text' => 'QXBwcm9hY2ggZHVyaW5nIHRoZSBuaWdodCBzaGlmdA==', 'next' => '2_night'],
            ],
        ],
        '2_day' => [
            'prose'  => 'VGhlIGRheSBzaGlmdCBpcyBsb3VkLCBidXN5LCBmdWxsIG9mIHB1cnBvc2VmdWwgbW92ZW1lbnQgeW91IGhhdmUgdG8gYWN0aXZlbHkgd29yayBub3QgdG8gZ2V0IGluIHRoZSB3YXkgb2YuIFlvdSBmaW5kIHRoZSBmb3JlbWFuIGV2ZW50dWFsbHksIGEgYnJvYWQsIHNvb3Qtc3RyZWFrZWQgd29tYW4gbmFtZWQgWWVsZW5hLCBtaWQtYXJndW1lbnQgd2l0aCBhIHN1cHBsaWVyIG92ZXIgYSBkZWxheWVkIHBhcnRzIHNoaXBtZW50LCBhbmQgd2FpdCwgcGF0aWVudGx5LCBmb3IgYSBnYXAgdG8gYWN0dWFsbHkgc3BlYWsuCgpTaGUgbGlzdGVucyB0byB5b3VyIGV4cGxhbmF0aW9uIHdpdGggdGhlIGRpc3RyYWN0ZWQgZWZmaWNpZW5jeSBvZiBzb21lb25lIG1hbmFnaW5nIHNpeCBwcm9ibGVtcyBhdCBvbmNlLCBidXQgc2hlIGRvZXMgbGlzdGVuIHByb3Blcmx5Lg==',
            'choices' => [
                ['text' => 'RXhwbGFpbiB3aGF0IHlvdSdyZSBsb29raW5nIGZvcg==', 'next' => '3_shared'],
            ],
        ],
        '2_night' => [
            'prose'  => 'VGhlIG5pZ2h0IHNoaWZ0IGlzIHF1aWV0ZXIsIHRoZSBtYWNoaW5lcnkncyByaHl0aG1zIG1vcmUgYXVkaWJsZSB3aXRob3V0IHRoZSBkYXkncyBjb25zdGFudCBodW1hbiBub2lzZSBsYXllcmVkIG92ZXIgdGhlbSDigJQgYSBzdGVhZHkgY2xhbmsgYW5kIGdyaW5kIHlvdSBldmVudHVhbGx5IHJlYWxpc2UgaXMgY29taW5nIGZyb20gZGVlcCBpbiB0aGUgbWluZSdzIHdpbmRpbmcgZ2VhciBpdHNlbGYuIFllbGVuYSwgdGhlIGZvcmVtYW4sIGlzIGRvaW5nIGhlciBvd24gcm91bmRzLCBjaGVja2luZyBlcXVpcG1lbnQgYnkgbGFtcGxpZ2h0IHdpdGggcmVhbCBhdHRlbnRpb24uCgpTaGUncyBsZXNzIGRpc3RyYWN0ZWQgaGVyZSwgbW9yZSB3aWxsaW5nIHRvIGFjdHVhbGx5IHN0b3AgYW5kIHByb3Blcmx5IGV4YW1pbmUgd2hhdCB5b3UndmUgYnJvdWdodCB0byBzaG93IGhlci4=',
            'choices' => [
                ['text' => 'RXhwbGFpbiB3aGF0IHlvdSdyZSBsb29raW5nIGZvcg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'WWVsZW5hIGxpc3RlbnMgdG8gdGhlIHdob2xlIHN0b3J5LCB0aGVuIHdhbGtzIHlvdSB0byB0aGUgd2luZGluZyBnZWFyIGl0c2VsZiwgd2hlcmUg4oCUIHN1cmUgZW5vdWdoIOKAlCBhIHNtYWxsLCBvZGRseSBvcm5hdGUgYnJhc3Mga2V5IHNpdHMgZml0dGVkIGludG8gYSBtZWNoYW5pc20gdGhhdCBjbGVhcmx5IHdhc24ndCBvcmlnaW5hbGx5IGRlc2lnbmVkIGZvciBpdCwgZGVjYWRlcyBvZiBncmVhc2UgYW5kIHdlYXIgbWFraW5nIGl0IGxvb2sgYWxtb3N0IG5hdGl2ZSB0byB0aGUgbWFjaGluZS4KCidDYW4ndCBqdXN0IHB1bGwgaXQsJyBzaGUgc2F5cy4gJ0l0J3MgbG9hZC1iZWFyaW5nIG5vdywgbW9yZSBvciBsZXNzIOKAlCBob2xkcyB0aGUgdGVuc2lvbiByaWdodCBvbiB0aGF0IGdlYXIuIFlvdSB3YW50IGl0IGJhY2ssIHlvdSdsbCBuZWVkIHRvIGFjdHVhbGx5IHNvbHZlIHRoZSBwcm9ibGVtIHByb3Blcmx5LCBub3QganVzdCB0YWtlIHdoYXQncyB5b3VycyBhbmQgbGVhdmUgdXMgd2l0aCBhIGJyb2tlbiB3aW5jaC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdyB0byBzb2x2ZSBpdA==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlcmUgYXJlIHR3byBob25lc3Qgd2F5cyB0byByZXBsYWNlIHRoZSBrZXkncyBmdW5jdGlvbiBwcm9wZXJseSwgWWVsZW5hIHNheXM6IGZvcmdlIGEgcHJvcGVyIGZpdHRlZCByZXBsYWNlbWVudCBmcm9tIHNjcmF0Y2ggd2l0aCB0aGUgdG93bidzIGJsYWNrc21pdGgsIG1hdGNoZWQgZXhhY3RseSB0byB0aGUgZ2VhcidzIHNwZWNpZmljYXRpb25zLCBvciBzZWFyY2ggdGhlIG1pbmUncyBvd24gc3RvcmUgb2YgZGVjb21taXNzaW9uZWQgZXF1aXBtZW50IGZvciBhIHNhbHZhZ2VhYmxlIHBhcnQgdGhhdCBjb3VsZCBiZSBhZGFwdGVkIHRvIGRvIHRoZSBzYW1lIGpvYi4KCidFaXRoZXIgd29ya3MsIGlmIGl0J3MgZG9uZSByaWdodCwnIHNoZSBzYXlzLiAnV3JvbmcsIGFuZCB5b3UndmUgY29zdCB1cyBhIHNoaWZ0IG9yIHdvcnNlLiBZb3VyIGNhbGwsIGJ1dCB0YWtlIGl0IHNlcmlvdXNseS4n',
            'choices' => [
                ['text' => 'Rm9yZ2UgYSByZXBsYWNlbWVudCB3aXRoIHRoZSBibGFja3NtaXRo', 'next' => '5_forge'],
                ['text' => 'U2VhcmNoIGRlY29tbWlzc2lvbmVkIGVxdWlwbWVudCBmb3IgYSBwYXJ0', 'next' => '5_search'],
            ],
        ],
        '5_forge' => [
            'prose'  => 'VGhlIGJsYWNrc21pdGgsIGFuIGVub3Jtb3VzLCBxdWlldCBtYW4gbmFtZWQgUGF2ZWwsIHRha2VzIHlvdXIgbWVhc3VyZW1lbnRzIHR3aWNlIGJlZm9yZSBoZSdsbCBldmVuIGxpZ2h0IHRoZSBmb3JnZSwgbXV0dGVyaW5nIHVuZGVyIGhpcyBicmVhdGggYWJvdXQgdGhlIGNvc3Qgb2YgZ2V0dGluZyB0aGlzIHNwZWNpZmljIGtpbmQgb2Ygd29yayB3cm9uZy4gVGhlIGZvcmdpbmcgaXRzZWxmIGlzIGxvdWQsIGhvdCwgZ2VudWluZWx5IGRpZmZpY3VsdCBsYWJvdXIsIGFuZCB5b3UncmUgbW9zdGx5IGluIHRoZSB3YXkgcmF0aGVyIHRoYW4gcHJvcGVybHkgdXNlZnVsLCB0aG91Z2ggUGF2ZWwgc2VlbXMgdG8gYXBwcmVjaWF0ZSB0aGUgZWZmb3J0IHJlZ2FyZGxlc3MuCgpCeSB0aGUgdGltZSB0aGUgcmVwbGFjZW1lbnQgZml0dGluZyBjb29scywgaXQncyBhIG5lYXItcGVyZmVjdCBtYXRjaCDigJQgbm90IGlkZW50aWNhbCwgYnV0IGNsb3NlIGVub3VnaCB0aGF0IFllbGVuYSwgdGVzdGluZyBpdCwgZ2l2ZXMgYSBzYXRpc2ZpZWQgZ3J1bnQgcmF0aGVyIHRoYW4gYW55IGNvbXBsYWludC4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSB3aW5kaW5nIGtleSBmcmVlZA==', 'next' => '6_shared'],
            ],
        ],
        '5_search' => [
            'prose'  => 'VGhlIHN0b3JlIG9mIGRlY29tbWlzc2lvbmVkIGVxdWlwbWVudCBpcyBhIGdlbnVpbmUgbWF6ZSBvZiBydXN0ZWQsIGhhbGYtZm9yZ290dGVuIG1hY2hpbmVyeSwgYW5kIGZpbmRpbmcgYSBwYXJ0IHRoYXQgbWlnaHQgYWN0dWFsbHkgZml0IHRha2VzIGhvdXJzIG9mIHBhdGllbnQsIGR1c3R5IHNlYXJjaGluZyBiZWZvcmUgeW91IHR1cm4gdXAgc29tZXRoaW5nIGNsb3NlIOKAlCBhbiBvbGQgZml0dGluZyBmcm9tIGEgcmV0aXJlZCB3aW5jaCwgc2ltaWxhciBlbm91Z2ggaW4gZGltZW5zaW9uIHRvIGJlIHdvcnRoIGEgcHJvcGVyIHRyeS4KClllbGVuYSdzIGVuZ2luZWVyIGZpdHMgaXQgd2l0aCB2aXNpYmxlIHNrZXB0aWNpc20gdGhhdCB0dXJucywgZ3JhZHVhbGx5LCBpbnRvIGdydWRnaW5nIGFwcHJvdmFsIGFzIHRoZSB0ZW5zaW9uIGhvbGRzIHByb3Blcmx5IHVuZGVyIHRlc3Rpbmcu',
            'choices' => [
                ['text' => 'U2VlIHRoZSB3aW5kaW5nIGtleSBmcmVlZA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2l0aCB0aGUgcmVwbGFjZW1lbnQgcHJvcGVybHkgaW5zdGFsbGVkIGFuZCB0ZXN0ZWQsIFllbGVuYSB3b3JrcyB0aGUgb3JpZ2luYWwgd2luZGluZyBrZXkgZnJlZSBoZXJzZWxmLCBjbGVhbmluZyBkZWNhZGVzIG9mIGdyZWFzZSBvZmYgaXQgd2l0aCByZWFsIGNhcmUgYmVmb3JlIGhhbmRpbmcgaXQgb3Zlci4gJ0dvb2QgaW5zdHJ1bWVudCwgd2hhdGV2ZXIgaXQncyBmcm9tLCcgc2hlIHNheXMuICdEZXNlcnZlcyBiZXR0ZXIgdGhhbiBiZWluZyBncm91bmQgZG93biBpbnNpZGUgbXkgbWFjaGluZXJ5IGZvciBhbm90aGVyIHRoaXJ0eSB5ZWFycy4nCgpTaGUgc3R1ZGllcyB5b3UgZm9yIGEgbW9tZW50LiAnV2hvZXZlciB5b3UncmUgZG9pbmcgdGhpcyBmb3Ig4oCUIGZpbmlzaCBpdCBwcm9wZXJseS4gSGFsZi1maW5pc2hlZCB3b3JrIGp1c3QgYmVjb21lcyBzb21lb25lIGVsc2UncyBwcm9ibGVtIGV2ZW50dWFsbHkuIEknZCBrbm93Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayB0byB0aGUgQ29udG91ciB3aXRoIHRoZSB3aW5kaW5nIGtleSBzZWN1cmUgaW4gdGhlIGNhc2UsIGEgc2V2ZW50aCBwaWVjZSByZWNvdmVyZWQsIHRoZSBsb3cgd29ybiBzaGFwZXMgb2YgdGhlIFVyYWxzIHNldHRsaW5nIGludG8gZXZlbmluZyBhcm91bmQgdGhlIG1pbmUncyBzdGlsbC13b3JraW5nIGhlYWQtZnJhbWVzLiBUaGUga2V5IGl0c2VsZiwgY2xlYW5lZCB1cCwgdHVybnMgb3V0IHRvIGJlIGdlbnVpbmVseSBiZWF1dGlmdWwgdW5kZXIgYWxsIHRoYXQgcmVtb3ZlZCBncmltZSDigJQgZmluZSBlbmdyYXZpbmcgeW91J2QgbmV2ZXIgaGF2ZSBndWVzc2VkIHdhcyB1bmRlciB0aGVyZS4KCkdyZXRhIHN0dWRpZXMgdGhlIGVuZ3JhdmluZyB3aXRoIHJlYWwgaW50ZXJlc3QuICdUaGF0J3Mgbm90IHN0YW5kYXJkIHN1cnZleS1pc3N1ZSB3b3JrLiBUaGF0J3MgcGVyc29uYWwuIEN1c3RvbS1tYWRlLCBwcm9iYWJseSBmb3Igc29tZW9uZSBzcGVjaWZpYy4n',
            'choices' => [
                ['text' => 'V29uZGVyIGFsb3VkIGlmIGl0IHdhcyBtYWRlIGZvciBNYXJndWVyaXRl', 'next' => '8_end_wonder'],
                ['text' => 'S2VlcCB0aGUgdGhvdWdodCB0byB5b3Vyc2VsZg==', 'next' => '8_end_keep'],
            ],
        ],
        '8_end_wonder' => [
            'prose'  => 'WW91IHNheSBpdCBiZWZvcmUgeW91J3ZlIGZ1bGx5IGRlY2lkZWQgdG8g4oCUIHdvbmRlcmluZyBhbG91ZCB3aGV0aGVyIHRoZSBrZXkncyBmaW5lLCBwZXJzb25hbCBlbmdyYXZpbmcgbWlnaHQgaGF2ZSBiZWVuIG1hZGUgZm9yIE1hcmd1ZXJpdGUsIHRoZSBzYW1lIHdheSB0aGUgbGV0dGVyIHdhcyBhZGRyZXNzZWQgdG8gaGVyLiBHcmV0YSBnb2VzIHF1aWV0LCB0dXJuaW5nIHRoZSBrZXkgb3ZlciBzbG93bHkgaW4gaGVyIG93biBoYW5kcy4KCidDb3VsZCBiZSwnIHNoZSBzYXlzIGZpbmFsbHkuICdPciBjb3VsZCBqdXN0IGJlIGEgbWFuIHdobyBsaWtlZCBmaW5lIHRoaW5ncyBhbmQgaGFkIHRoZSBtZWFucyB0byBjb21taXNzaW9uIHRoZW0uJyBTaGUgaGFuZHMgaXQgYmFjay4gJ0VpdGhlciB3YXksIGl0J3MgeW91cnMgdG8gY2Fycnkgbm93LiBNYXliZSB0aGUgYW5zd2VyJ3MgZnVydGhlciB1cCB0aGUgcm9hZC4n',
            'ending' => true,
        ],
        '8_end_keep' => [
            'prose'  => 'WW91IGtlZXAgdGhlIHRob3VnaHQgdG8geW91cnNlbGYsIHR1cm5pbmcgdGhlIGJlYXV0aWZ1bGx5IGVuZ3JhdmVkIGtleSBvdmVyIHByaXZhdGVseSBhcyB0aGUgQ29udG91ciBsaWZ0cyBvZmYsIHRoZSBVcmFscycgd29ybiBvbGQgc2hhcGVzIGZhbGxpbmcgYXdheSBiZWxvdyBpbnRvIHRoZSBiZWdpbm5pbmcgb2YgdHJ1ZSBldmVuaW5nLgoKU29tZSBxdWVzdGlvbnMsIHlvdSdyZSBsZWFybmluZywgZG9uJ3QgbmVlZCB2b2ljaW5nIHRoZSBpbnN0YW50IHRoZXkgb2NjdXIgdG8geW91LiBUaGlzIG9uZSwgeW91IGRlY2lkZSwgY2FuIHdhaXQgZm9yIG1vcmUgZXZpZGVuY2UgYmVmb3JlIGl0J3Mgd29ydGggc2F5aW5nIG91dCBsb3VkIHRvIGFueW9uZSwgZXZlbiBHcmV0YS4=',
            'ending' => true,
        ],
    ],
];
