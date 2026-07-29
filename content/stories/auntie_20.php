<?php
return [
    'id'    => 20,
    'title' => 'Smaller Than Either of Us Thought',
    'color' => '#A08A4A',

    'pages' => [
        '1_start' => [
            'prose'  => 'Um9kcmlndWVzIHJpc2VzIGdyZWVuIGFuZCB2b2xjYW5pYyBvdXQgb2Ygd2F0ZXIgc28gY2xlYXIgaXQgYmFyZWx5IHNlZW1zIHRvIHF1YWxpZnkgYXMgb2NlYW4sIGdpYW50IHRvcnRvaXNlcyBncmF6aW5nIHBsYWNpZGx5IGluIGEgc2FuY3R1YXJ5IG5lYXIgdGhlIHNob3JlIGxpa2Ugc29tZXRoaW5nIG91dCBvZiBhbiBvbGRlciwgc2xvd2VyIHZlcnNpb24gb2YgdGhlIHdvcmxkLiBTb2xhbmdlIGhhcyBiZWVuIHF1aWV0IHRoZSBlbnRpcmUgYXBwcm9hY2gsIHF1aWV0ZXIgdGhhbiB5b3UndmUgZXZlciBrbm93biBoZXIsIGNoZWNraW5nIGluc3RydW1lbnRzIHRoYXQgZG9uJ3QgbmVlZCBjaGVja2luZy4KCidHcmV3IHVwIGhlcmUsJyBzaGUgc2F5cyBldmVudHVhbGx5LCBub3QgcXVpdGUgbWVldGluZyBhbnlvbmUncyBleWUuICdIYXZlbid0IGJlZW4gYmFjayBpbiBsb25nZXIgdGhhbiBJIGdlbmVyYWxseSBhZG1pdCB0by4nIFR3byB3YXlzIGludG8gdGhlIGlzbGFuZCBwcmVzZW50IHRoZW1zZWx2ZXM6IHN0cmFpZ2h0IGludG8gUG9ydCBNYXRodXJpbidzIHNtYWxsIGhhcmJvdXIgdG93biwgb3Igcm91bmQgdG8gYSBxdWlldGVyIGNvYXN0YWwgdmlsbGFnZSBTb2xhbmdlLCBhZnRlciBhIHBhdXNlLCBtZW50aW9ucyBieSBuYW1lIHdpdGhvdXQgYmVpbmcgYXNrZWQu',
            'choices' => [
                ['text' => 'SGVhZCBpbnRvIFBvcnQgTWF0aHVyaW4=', 'next' => '2_town'],
                ['text' => 'R28gdG8gdGhlIHZpbGxhZ2UgU29sYW5nZSBuYW1lZA==', 'next' => '2_village'],
            ],
        ],
        '2_town' => [
            'prose'  => 'UG9ydCBNYXRodXJpbiBpcyBzbWFsbCwgY29sb3VyZnVsLCB1bmh1cnJpZWQsIG1hcmtldCBzdGFsbHMgYW5kIENyZW9sZSBjb252ZXJzYXRpb24gc3BpbGxpbmcgaW50byBuYXJyb3cgc3RyZWV0cyB0aGF0IGNsZWFybHkgaGF2ZW4ndCBjaGFuZ2VkIHRoZWlyIGJhc2ljIHNoYXBlIGluIGdlbmVyYXRpb25zLiBTb2xhbmdlIG5hdmlnYXRlcyBpdCB3aXRoIHRoZSBzcGVjaWZpYywgY2FyZWZ1bCBmbHVlbmN5IG9mIHNvbWVvbmUgd2hvIHVzZWQgdG8ga25vdyBldmVyeSBjb3JuZXIgYW5kIGlzIHF1aWV0bHkgY2hlY2tpbmcgaG93IG11Y2ggb2YgdGhhdCdzIHN0aWxsIHRydWUuCgpBbiBvbGRlciBtYW4gc2VsbGluZyBmaXNoIGxvb2tzIHVwLCBkb2VzIGEgZ2VudWluZSBkb3VibGUtdGFrZSwgYW5kIGNhbGxzIFNvbGFuZ2UncyBuYW1lIGFjcm9zcyB0aGUgc3RyZWV0IHdpdGggcmVhbCwgdW5ndWFyZGVkIGRlbGlnaHQgYmVmb3JlIHNoZSdzIHNhaWQgYSBzaW5nbGUgd29yZC4=',
            'choices' => [
                ['text' => 'U2VlIHdobyBpdCBpcw==', 'next' => '3_shared'],
            ],
        ],
        '2_village' => [
            'prose'  => 'VGhlIGNvYXN0YWwgdmlsbGFnZSBpcyBzbWFsbGVyLCBxdWlldGVyLCBmaXNoaW5nIGJvYXRzIGRyYXduIHVwIG5lYXQgb24gdGhlIHNhbmQsIGFuZCBTb2xhbmdlIGxlYWRzIHRoZSB3YXkgaGVyc2VsZiBmb3Igb25jZSBpbnN0ZWFkIG9mIGxldHRpbmcgdGhlIGNyZXcgZmluZCBpdHMgb3duIHBhdGgsIGNsZWFybHkgd2Fsa2luZyBhIHJvdXRlIHNoZSBoYXNuJ3QgZm9yZ290dGVuIGRlc3BpdGUgZXZlcnl0aGluZy4KCk91dHNpZGUgYSBtb2Rlc3QgaG91c2UgbmVhciB0aGUgc2hvcmUsIGFuIG9sZGVyIG1hbiBtZW5kaW5nIGEgbmV0IGxvb2tzIHVwLCBkb2VzIGEgZ2VudWluZSBkb3VibGUtdGFrZSwgYW5kIGNhbGxzIFNvbGFuZ2UncyBuYW1lIGFjcm9zcyB0aGUgeWFyZCB3aXRoIHJlYWwsIHVuZ3VhcmRlZCBkZWxpZ2h0IGJlZm9yZSBzaGUncyBzYWlkIGEgc2luZ2xlIHdvcmQu',
            'choices' => [
                ['text' => 'U2VlIHdobyBpdCBpcw==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SGUgdHVybnMgb3V0IHRvIGJlIEFudG9pbmUsIGFuIG9sZCBmcmllbmQgZnJvbSB3ZWxsIGJlZm9yZSBTb2xhbmdlIGV2ZXIgbGVmdCB0aGUgaXNsYW5kLCBhbmQgdGhlIHR3byBvZiB0aGVtIGZhbGwgaW50byBhbiBlbWJyYWNlIHRoYXQgc2F5cyBtb3JlIHRoYW4gZWl0aGVyIG9mIHRoZWlyIGZhY2VzIGFyZSBsZXR0aW5nIG9uLiAnVGhvdWdodCB5b3UnZCBuZXZlciBjb21lIGJhY2ssJyBoZSBzYXlzLCBob2xkaW5nIGhlciBhdCBhcm0ncyBsZW5ndGggdG8gbG9vayBhdCBoZXIgcHJvcGVybHkuICdIZWFyZCBhYm91dCB0aGUgbG9zcywgeWVhcnMgYmFjay4gV2Fzbid0IHN1cmUgeW91J2Qgd2FudCB0aGlzIHBsYWNlIGFmdGVyIHRoYXQuJwoKU29sYW5nZSdzIGZhY2UgZG9lcyBzb21ldGhpbmcgY29tcGxpY2F0ZWQgYW5kIGJyaWVmLCB0aGVyZSBhbmQgZ29uZS4gJ0RpZG4ndCwgZm9yIGEgbG9uZyB0aW1lLCcgc2hlIHNheXMuICdUdXJucyBvdXQgdGhlIG9jZWFuJ3Mgc21hbGxlciB0aGFuIGVpdGhlciBvZiB1cyB0aG91Z2h0LCB0aG91Z2guIEtlZXBzIGJyaW5naW5nIG1lIGJhY2sgdG8gdGhpbmdzLicgU2hlIGRvZXNuJ3QgZWxhYm9yYXRlIGZ1cnRoZXIsIGFuZCBBbnRvaW5lLCByZWFkaW5nIGhlciBleGFjdGx5IHJpZ2h0LCBkb2Vzbid0IHB1c2gu',
            'terminal' => true,
            'choices' => [
                ['text' => 'R2l2ZSB0aGVtIGEgbGl0dGxlIHNwYWNl', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'QW50b2luZSBtZW50aW9ucywgb25jZSB0aGUgcmV1bmlvbidzIHNldHRsZWQgaW50byBzb21ldGhpbmcgY2FsbWVyLCB0aGF0IHRoZSBzYW5jdHVhcnkgdXAgdGhlIHNob3JlIGFsd2F5cyBuZWVkcyBoYW5kcyBmZWVkaW5nIGFuZCBjaGVja2luZyBvbiB0aGUgZ2lhbnQgdG9ydG9pc2VzLCBvciB0aGF0IGhpcyBvd24gYm9hdCBjb3VsZCB1c2UgYSBoYW5kIG1lbmRpbmcgdGhlIG5ldCBoZSB3YXMgd29ya2luZyBvbiB3aGVuIHlvdSBhcnJpdmVkLiBFaXRoZXIgam9iLCBoZSBzYXlzLCB3b3VsZCBsZXQgU29sYW5nZSBhbmQgaGltIGFjdHVhbGx5IHRhbGsgcHJvcGVybHkgZm9yIGEgd2hpbGUgd2l0aG91dCBhbiBhdWRpZW5jZS4KCidHbyBvbiwnIFNvbGFuZ2Ugc2F5cywgd2F2aW5nIHlvdSBvZmYgd2l0aCBtb3JlIHdhcm10aCB0aGFuIGhlciB1c3VhbCBicmlzayBlY29ub215IGFsbG93cy4gJ0knbGwgY2F0Y2ggdXAuIExpdGVyYWxseS4n',
            'choices' => [
                ['text' => 'SGVscCBhdCB0aGUgdG9ydG9pc2Ugc2FuY3R1YXJ5', 'next' => '5_tortoise'],
                ['text' => 'SGVscCBtZW5kIEFudG9pbmUncyBuZXQ=', 'next' => '5_net'],
            ],
        ],
        '5_tortoise' => [
            'prose'  => 'RmVlZGluZyBhbmQgY2hlY2tpbmcgb24gZ2lhbnQgdG9ydG9pc2VzIHR1cm5zIG91dCB0byBiZSBzbG93LCBvZGRseSBjb21wYW5pb25hYmxlIHdvcmssIHRoZSBhbmltYWxzIGVudGlyZWx5IHVuaHVycmllZCBpbiBhIHdheSB0aGF0IHB1dHMgdGhlIHdob2xlIG1vcm5pbmcncyBlbW90aW9uYWwgd2VpZ2h0IGludG8gYSBnZW50bGVyIHBlcnNwZWN0aXZlLiBUaGUgQmFyb24sIGRlbGlnaHRlZCwgc3BlbmRzIHRoZSB3aG9sZSB0aW1lIGF0dGVtcHRpbmcgYW5kIGZhaWxpbmcgdG8gaW1wcmVzcyBvbmUgcGFydGljdWxhciBlbm9ybW91cyB0b3J0b2lzZSB3aG8gcmVtYWlucyBtYWduaWZpY2VudGx5IHVuaW1wcmVzc2VkLgoKQnkgdGhlIHRpbWUgeW91J3JlIGRvbmUsIFNvbGFuZ2UgYW5kIEFudG9pbmUgYXJlIHN0aWxsIHRhbGtpbmcsIHF1aWV0ZXIgbm93LCBoZWFkcyBjbG9zZSB0b2dldGhlciBvdmVyIHNvbWV0aGluZyB0aGF0IGxvb2tzIGxpa2UgYW4gb2xkIHBob3RvZ3JhcGgu',
            'choices' => [
                ['text' => 'UmVqb2luIHRoZW0=', 'next' => '6_shared'],
            ],
        ],
        '5_net' => [
            'prose'  => 'TWVuZGluZyBBbnRvaW5lJ3MgbmV0IGlzIGZpZGRseSwgZmFtaWxpYXIgd29yayDigJQgbm90IHNvIGRpZmZlcmVudCBmcm9tIHRoZSBzYWlsLW1hdCBwYXRjaCB5b3UgaGVscGVkIHdlYXZlIGEgbGlmZXRpbWUgb2YgaXNsYW5kcyBiYWNrIOKAlCBrbm90cyBjaGVja2VkIGFuZCByZWtub3R0ZWQgdW50aWwgdGhlIHdob2xlIHRoaW5nIGhvbGRzIHByb3Blcmx5IGFnYWluLiBJdCdzIHNhdGlzZnlpbmcsIHN0cmFpZ2h0Zm9yd2FyZCBsYWJvdXIsIGV4YWN0bHkgdGhlIGtpbmQgdGhhdCBsZXRzIHlvdXIgbWluZCBzaXQgcXVpZXRseSB3aXRoIHdoYXQgeW91IGp1c3Qgd2l0bmVzc2VkIGluc3RlYWQgb2YgbmVlZGluZyB0byBkaXNjdXNzIGl0LgoKQnkgdGhlIHRpbWUgeW91J3JlIGRvbmUsIFNvbGFuZ2UgYW5kIEFudG9pbmUgYXJlIHN0aWxsIHRhbGtpbmcsIHF1aWV0ZXIgbm93LCBoZWFkcyBjbG9zZSB0b2dldGhlciBvdmVyIHNvbWV0aGluZyB0aGF0IGxvb2tzIGxpa2UgYW4gb2xkIHBob3RvZ3JhcGgu',
            'choices' => [
                ['text' => 'UmVqb2luIHRoZW0=', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'V2hlbiB5b3UgcmVqb2luIHRoZW0sIEFudG9pbmUgcHJlc3NlcyBzb21ldGhpbmcgaW50byB5b3VyIGhhbmRzIHJhdGhlciB0aGFuIFNvbGFuZ2UncyDigJQgYSBjYXJ2ZWQgd29vZGVuIGNhcmkgY2FyaSwgYW4gb2xkIGZpc2hpbmcgdG9vbCwgd29ybiBzbW9vdGggd2l0aCByZWFsIHVzZS4gJ1NoZSB3b24ndCB0YWtlIGEgZ2lmdCBmcm9tIG1lLCcgaGUgc2F5cywgYW11c2VkLCBmb25kLiAnTmV2ZXIgaGFzLiBZb3UsIHRob3VnaCDigJQgeW91IGNhbiBjYXJyeSBpdCBmb3IgaGVyLiBTYW1lIGRpZmZlcmVuY2UsIGluIHRoZSBlbmQuJwoKU29sYW5nZSBkb2Vzbid0IGFyZ3VlIHRoZSBwb2ludCwgd2hpY2ggaXMsIGZyb20gaGVyLCBjbG9zZSB0byBhbiBhZG1pc3Npb24gb2YgZXhhY3RseSBob3cgdGhlIGdpZnQgaXMgbWVhbnQu',
            'choices' => [
                ['text' => 'SGVhZCBiYWNrIHRvIHRoZSBhbmNob3JhZ2UgdG9nZXRoZXI=', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0byB0aGUgS8WNdHVrdSB0b2dldGhlciwgU29sYW5nZSBxdWlldGVyIHRoYW4gdXN1YWwgYnV0IG5vdCB1bmhhcHBpbHkgc28sIHRoZSBwYXJ0aWN1bGFyIHF1aWV0IG9mIHNvbWVvbmUgd2hvJ3MganVzdCBzZXQgc29tZXRoaW5nIGRvd24gdGhleSd2ZSBiZWVuIGNhcnJ5aW5nIGEgbG9uZyB3YXkgd2l0aG91dCBtZWFuaW5nIHRvIHB1dCBpdCBkb3duIGhlcmUgc3BlY2lmaWNhbGx5LgoKU2hlIGRvZXNuJ3QgZXhwbGFpbiB0aGUgbG9zcyBBbnRvaW5lIG1lbnRpb25lZCwgYW5kIHlvdSBkb24ndCBhc2suIFNvbWUgdGhpbmdzLCB5b3UndmUgbGVhcm5lZCBieSBub3csIGdldCBvZmZlcmVkIHdoZW4gdGhleSdyZSByZWFkeSBhbmQgbm90IGEgbW9tZW50IHNvb25lciDigJQgdG9kYXkgd2Fzbid0IHRoYXQgbW9tZW50LCBhbmQgdGhhdCdzIGVudGlyZWx5IGFsbCByaWdodC4=',
            'choices' => [
                ['text' => 'VGVsbCBoZXIgeW91J3JlIGdsYWQgc2hlIGNhbWUgYmFjaw==', 'next' => '8_end_glad'],
                ['text' => 'SnVzdCBsZXQgdGhlIGRheSBjbG9zZSBxdWlldGx5LCB1bnJlbWFya2Vk', 'next' => '8_end_quiet'],
            ],
        ],
        '8_end_glad' => [
            'prose'  => 'WW91IHRlbGwgaGVyLCBzaW1wbHksIHRoYXQgeW91J3JlIGdsYWQgc2hlIGNhbWUgYmFjayDigJQgbm90IHB1c2hpbmcgZm9yIGFueXRoaW5nIG1vcmUgdGhhbiB0aGF0IG9uZSBwbGFpbiBmYWN0LiBTb2xhbmdlIGdvZXMgc3RpbGwgZm9yIGEgc2Vjb25kLCB0aGVuIGdpdmVzIHlvdSB0aGUgc21hbGxlc3QsIHJlYWxlc3Qgc21pbGUgeW91J3ZlIHNlZW4gZnJvbSBoZXIgdGhlIHdob2xlIHRyaXAuCgonU28gYW0gSSwnIHNoZSBzYXlzLiAnRGlkbid0IGV4cGVjdCB0byBiZS4gT2NlYW4gaGFkIG90aGVyIHBsYW5zLCBhcHBhcmVudGx5LicgU2hlIHBvdXJzIGhlciBydW0gdGhhdCBldmVuaW5nIGF0IGFuY2hvciwgc2FtZSByaXR1YWwgYXMgYWx3YXlzLCBleGNlcHQgdGhpcyB0aW1lLCBmb3IgdGhlIGxlbmd0aCBvZiBvbmUgd2hvbGUgc2xvdyBnbGFzcywgc2hlIGFjdHVhbGx5IGxvb2tzIGVudGlyZWx5IGF0IHBlYWNlIGRvaW5nIGl0Lg==',
            'ending' => true,
        ],
        '8_end_quiet' => [
            'prose'  => 'WW91IGxldCB0aGUgZGF5IGNsb3NlIHF1aWV0bHksIHVucmVtYXJrZWQsIG1hdGNoaW5nIHRoZSBwYXJ0aWN1bGFyIGdyYWNlIG9mIHNvbWVvbmUgd2hvJ3MganVzdCBiZWVuIGdpdmVuIGEgbGFyZ2UgbW9tZW50IGFuZCBkb2Vzbid0IHdhbnQgaXQgdHVybmVkIGludG8gYSBiaWdnZXIgcHJvZHVjdGlvbiB0aGFuIGl0IGFscmVhZHkgd2FzLgoKVGhlIEvFjXR1a3UgbGlmdHMgb2ZmIFJvZHJpZ3VlcyBhdCBkdXNrLCBnaWFudCB0b3J0b2lzZXMgc3RpbGwgZ3JhemluZyBwbGFjaWRseSBiZWxvdyBhcyB0aG91Z2ggbm90aGluZyBhYm91dCB0aGUgZGF5IGhhZCBiZWVuIHJlbWFya2FibGUgYXQgYWxsLCBhbmQgU29sYW5nZSwgY2hlY2tpbmcgdGhlIGluc3RydW1lbnRzIG9uZSBsYXN0IHRpbWUgYmVmb3JlIHNldHRsaW5nIGluIGZvciB0aGUgY3Jvc3NpbmcsIGh1bXMgc29tZXRoaW5nIHVuZGVyIGhlciBicmVhdGggeW91IGRvbid0IHJlY29nbmlzZSDigJQgYW4gb2xkIGlzbGFuZCB0dW5lLCB5b3UnZCBndWVzcywgZnJvbSBhIHZlcnkgbG9uZyB0aW1lIGJlZm9yZSBhbnkgb2YgeW91IGtuZXcgaGVyLg==',
            'ending' => true,
        ],
    ],
];
