<?php
return [
    'id'    => 8,
    'title' => 'What the Mountain Doesn\'t Mind',
    'color' => '#7A3A28',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGFubmEgYW5ub3VuY2VzIGl0c2VsZiBiZWZvcmUgeW91IHNlZSBpdCDigJQgYSByZWQgZ2xvdyBhZ2FpbnN0IGxvdyBjbG91ZCwgdmlzaWJsZSBldmVuIGluIGRheWxpZ2h0LCBNb3VudCBZYXN1ciBicmVhdGhpbmcgc29tZXdoZXJlIGFib3ZlIHRoZSB0cmVlbGluZSB0aGUgd2F5IGl0J3MgYXBwYXJlbnRseSBkb25lLCBtb3JlIG9yIGxlc3MgY29udGludW91c2x5LCBmb3IgbG9uZ2VyIHRoYW4gYW55b25lIGhlcmUgaGFzIGJvdGhlcmVkIGNvdW50aW5nLgoKU29sYW5nZSBtb29ycyB3ZWxsIGNsZWFyIG9mIHRoZSBhc2ggcGx1bWUncyB1c3VhbCBkcmlmdCBhbmQgY29uc3VsdHMgYSBoYW5kLWRyYXduIG1hcCBzbyBvbGQgaXRzIGNyZWFzZXMgaGF2ZSB3b3JuIHNvZnQuIFR3byB3YXlzIGluIHByZXNlbnQgdGhlbXNlbHZlczogdXAgYWxvbmcgdGhlIHZvbGNhbm8ncyByaW0sIHdoZXJlIGEgZ3VpZGUgaXMgc2FpZCB0byB3YWl0IGZvciBhbnlvbmUgc2VyaW91cyBhYm91dCBhcHByb2FjaGluZyBZYXN1ciBwcm9wZXJseSwgb3IgYWxvbmcgdGhlIGNvYXN0IHRvIHRoZSBuYWthbWFsIOKAlCB0aGUgdmlsbGFnZSdzIGthdmEtZHJpbmtpbmcgZ3JvdW5kIOKAlCB3aGVyZSB0aGUgZXZlbmluZydzIGJ1c2luZXNzIGFwcGFyZW50bHkgYWxyZWFkeSBzdGFydHMu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgcmltIHBhdGg=', 'next' => '2_volcano'],
                ['text' => 'Rm9sbG93IHRoZSBjb2FzdCB0byB0aGUgbmFrYW1hbA==', 'next' => '2_coastal'],
            ],
        ],
        '2_volcano' => [
            'prose'  => 'VGhlIHJpbSBwYXRoIGNsaW1icyB0aHJvdWdoIGFzaC1ibGFjayBzY3J1YiB0aGF0IHRoaW5zIHdpdGggYWx0aXR1ZGUgdW50aWwgdGhlcmUncyBub3RoaW5nIGxlZnQgYnV0IGJhcmUgY2luZGVyIGFuZCB0aGUgbW91bnRhaW4ncyBvd24gc3RlYWR5LCB1bmh1cnJpZWQgcm9hciwgZmVsdCBpbiB0aGUgY2hlc3QgYmVmb3JlIGl0J3MgcHJvcGVybHkgaGVhcmQuIFRoZSBndWlkZSBtZWV0cyB5b3UgZXhhY3RseSB3aGVyZSB0aGUgbWFwIHNhaWQgaGUgd291bGQsIGVudGlyZWx5IHVuYm90aGVyZWQgYnkgYSBtb3VudGFpbiBtb3N0IHBlb3BsZSB3b3VsZCBjb25zaWRlciByZWFzb24gZW5vdWdoIHRvIGxlYXZlLgoKSGUgd2F0Y2hlcyBZYXN1ciB0aHJvdyBhIGZyZXNoIHNwcmF5IG9mIGdsb3dpbmcgcm9jayBza3l3YXJkIHdpdGggdGhlIGZsYXQsIGZhbWlsaWFyIGludGVyZXN0IG9mIHNvbWVvbmUgd2F0Y2hpbmcgd2VhdGhlci4gJ1NoZSdzIGNhbG0gdG9uaWdodCwnIGhlIHNheXMsIHdoaWNoIGRvZXMgbm90IG1hdGNoIHlvdXIgb3duIHByaXZhdGUgYXNzZXNzbWVudCBvZiBjYWxtIGF0IGFsbC4gJ0thdmEncyBkb3duIGF0IHRoZSBuYWthbWFsLiBZb3UnbGwgd2FudCB0byBiZSB0aGVyZSBiZWZvcmUgZGFyazsgc29tZSB0aGluZ3MgZ28gYmV0dGVyIGluIHRoZSBsaWdodCBhbmQgc29tZSB0aGluZ3MgbmVlZCBpdCB0byBlbmQgZmlyc3QuJw==',
            'choices' => [
                ['text' => 'SGVhZCBkb3duIGZvciB0aGUgbmFrYW1hbA==', 'next' => '3_shared'],
            ],
        ],
        '2_coastal' => [
            'prose'  => 'VGhlIGNvYXN0YWwgcGF0aCB0aHJlYWRzIGJldHdlZW4gZ2FyZGVucyBhbmQgc21hbGwgY2xlYXJpbmdzIHdoZXJlIGEgZmxhZyBmbGllcyBvbiBhIGJhcmUgcG9sZSBvdXRzaWRlIG9uZSBob3VzZSwgZmFkZWQgYnV0IGNhcmVmdWxseSBtYWludGFpbmVkLCB0ZW5kZWQgd2l0aCB0aGUgc2FtZSBxdWlldCByZWd1bGFyaXR5IGFzIGEgaG91c2Vob2xkIHNocmluZSBhbnl3aGVyZSBlbHNlIGluIHRoZSB3b3JsZCDigJQgYmVsaWVmIGtlcHQgYWxpdmUgaGVyZSBvbiBpdHMgb3duIHRlcm1zLCBub3QgeW91cnMgdG8gY29tbWVudCBvbiwgb25seSB0byBub3RpY2UgYW5kIHJlc3BlY3QuCgpBbiBvbGRlciBtYW4gd2VlZGluZyBuZWFyYnkgc3RyYWlnaHRlbnMgdG8gZ3JlZXQgeW91IHdpdGhvdXQgc3VycHJpc2UsIGFzIHRob3VnaCB2aXNpdG9ycyB3ZXJlIGFuIGV4cGVjdGVkIHdlYXRoZXIgcGF0dGVybiByYXRoZXIgdGhhbiBhbiBldmVudC4gSGUgcG9pbnRzIHlvdSBmdXJ0aGVyIGFsb25nLCBwYXN0IHRoZSBnYXJkZW5zLCB0byB3aGVyZSBzbW9rZSBhbmQgdm9pY2VzIGFscmVhZHkgc3VnZ2VzdCB0aGUgZXZlbmluZydzIGthdmEgaXMgZ2F0aGVyaW5nLg==',
            'choices' => [
                ['text' => 'SGVhZCBmb3IgdGhlIG5ha2FtYWw=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIG5ha2FtYWwgaXMgYSBiYXJlLCBwYWNrZWQtZWFydGggY2xlYXJpbmcgdW5kZXIgb2xkIGJhbnlhbiByb290cyB0aGF0IGhhdmUgZ3Jvd24gaW50byBzb21ldGhpbmcgY2xvc2VyIHRvIGFyY2hpdGVjdHVyZSB0aGFuIHRyZWUsIGFuZCB0aGUgbWFuIHdobyBydW5zIHRoZSBldmVuaW5nJ3Mga2F2YSDigJQgYnJvYWQsIHVuaHVycmllZCwgbWlzc2luZyBleGFjdGx5IG9uZSBmcm9udCB0b290aCBpbiBhIHdheSB0aGF0IHNlZW1zIHRvIGltcHJvdmUgaGlzIHNtaWxlIHJhdGhlciB0aGFuIGRpbWluaXNoIGl0IOKAlCBncmVldHMgeW91IGxpa2UgaGUncyBiZWVuIHRvbGQgdG8gZXhwZWN0IHlvdSBhbmQgaXNuJ3QgaW4gdGhlIGxlYXN0IHN1cnByaXNlZCB5b3UncmUgbGF0ZS4KCidTaXQsJyBoZSBzYXlzLCB0aGUgdW5pdmVyc2FsIGluc3RydWN0aW9uIG9mIHRoaXMgd2hvbGUgb2NlYW4sIGFwcGFyZW50bHkuICdUaGUgYm93bCdzIG5vdCBmaW5pc2hlZC4gWW91IGNhbiB3YWl0IGZvciBpdCwgb3IgeW91IGNhbiBoZWxwIGZpbmlzaCBpdC4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdyB5b3UgY2FuIGhlbHA=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIGJvd2wg4oCUIGEgdGFub2EsIHdpZGUgYW5kIHNoYWxsb3csIGNhcnZlZCBmcm9tIGEgc2luZ2xlIHBpZWNlIG9mIHdvb2Qg4oCUIHdhbnRzIGl0cyBmaW5hbCBwb2xpc2gsIGFuZCB0aGUga2F2YSBpdHNlbGYgd2FudHMgcG91bmRpbmcsIHR3byBzZXBhcmF0ZSBqb2JzIHRoYXQgYm90aCBuZWVkIGRvaW5nIGJlZm9yZSB0aGUgZ3JvdW5kIGNhbiBwcm9wZXJseSBzdGFydCBkcmlua2luZy4gJ1doaWNoZXZlciB5b3UncmUgYmV0dGVyIHN1aXRlZCB0bywnIHRoZSBob3N0IHNheXMsIGhhbmRpbmcgeW91IGEgY2hvaWNlIHJhdGhlciB0aGFuIGFuIGFzc2lnbm1lbnQuCgpUaGUgQmFyb24gZXhhbWluZXMgdGhlIHVuZmluaXNoZWQgdGFub2Egd2l0aCBwcm9wcmlldGFyeSBpbnRlcmVzdCwgb2ZmZXJpbmcgYW4gdW5zb2xpY2l0ZWQgb3BpbmlvbiBvbiBncmFpbiBkaXJlY3Rpb24gdGhhdCBub2JvZHkgYXNrZWQgZm9yIGFuZCBldmVyeWJvZHksIGV2ZW50dWFsbHksIHF1aWV0bHkgZm9sbG93cy4=',
            'choices' => [
                ['text' => 'SGVscCBwb3VuZCB0aGUga2F2YSByb290', 'next' => '5_pound'],
                ['text' => 'SGVscCBmaW5pc2ggdGhlIGJvd2wncyBwb2xpc2g=', 'next' => '5_polish'],
            ],
        ],
        '5_pound' => [
            'prose'  => 'UG91bmRpbmcga2F2YSByb290IGlzIHJoeXRobWljLCByZXBldGl0aXZlIHdvcmssIGRvbmUgaW4gYSBncm91cCB3aXRoIGEgYmVhdCB0aGF0IHN0YXJ0cyByYWdnZWQgYW5kIGZpbmRzIGl0c2VsZiB3aXRoaW4gYSBmZXcgbWludXRlcywgZXZlcnlvbmUncyBzdHJpa2VzIGZhbGxpbmcgaW50byB0aGUgc2FtZSB1bmh1cnJpZWQgcGF0dGVybiB3aXRob3V0IGFueW9uZSBjYWxsaW5nIGl0IG91dCBsb3VkLiBZb3VyIHNob3VsZGVycyBjb21wbGFpbiBiZWZvcmUgeW91ciBoYW5kcyBkby4KClRoZSBob3N0IG5vZHMgYWxvbmcsIHNhdGlzZmllZCwgdGhlIHdheSBhbnlvbmUgaXMgc2F0aXNmaWVkIHdhdGNoaW5nIGEgam9iIGdldCBkb25lIHByb3Blcmx5IGJ5IHBlb3BsZSB3aG8gZGlkbid0IG5lZWQgdG8gYmUgdG9sZCB0d2ljZS4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBib3dsIGZpbmlzaGVk', 'next' => '6_shared'],
            ],
        ],
        '5_polish' => [
            'prose'  => 'UG9saXNoaW5nIHRoZSB0YW5vYSBpcyBxdWlldGVyLCBtb3JlIGV4YWN0aW5nIHdvcmsg4oCUIGZpbmUgc2FuZCwgcGF0aWVudCBjaXJjbGVzLCBjaGVja2luZyB0aGUgZ3JhaW4gYnkgZmVlbCBhcyBtdWNoIGFzIGJ5IGV5ZS4gVGhlIGhvc3QgY29ycmVjdHMgeW91ciBncmlwIG9uY2UsIGdlbnRseSwgdGhlbiBsZWF2ZXMgeW91IHRvIGl0LCB3aGljaCB5b3UgdGFrZSwgY29ycmVjdGx5LCBhcyBhIGZvcm0gb2YgdHJ1c3QuCgpCeSB0aGUgdGltZSB5b3UncmUgZG9uZSwgdGhlIGJvd2wncyBzdXJmYWNlIGhhcyB0aGUgZGVlcCwgd29ybiBnbGVhbSBvZiBzb21ldGhpbmcgYnVpbHQgdG8gb3V0bGFzdCBzZXZlcmFsIGthdmEgc2Vhc29ucyBhbmQgc2V2ZXJhbCBvd25lcnMgYmVzaWRlcy4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBib3dsIGZpbmlzaGVk', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIGthdmEsIG9uY2UgcG91cmVkLCBnb2VzIGRvd24gZmFzdCBhbmQgYml0dGVyIGFuZCBudW1icyB5b3VyIGxpcHMgYmVmb3JlIGl0IGRvZXMgYW55dGhpbmcgZWxzZSwgYW5kIHRoZSB3aG9sZSBjbGVhcmluZyBzZXR0bGVzIGludG8gdGhlIHBhcnRpY3VsYXIsIGNvbXBhbmlvbmFibGUgcXVpZXQgdGhhdCBzZWVtcyB0byBmb2xsb3cga2F2YSB0aGUgd2F5IGxhdWdodGVyIGZvbGxvd3MgYSBnb29kIGpva2UgZWxzZXdoZXJlIOKAlCBub3Qgc2lsZW5jZSBleGFjdGx5LCBqdXN0IGZld2VyIHdvcmRzIG5lZWRlZCB0byBmaWxsIHRoZSBzYW1lIHNwYWNlLgoKTGF0ZXIsIHdoZW4gdGhlIG51bWJuZXNzIGhhcyBmYWRlZCBhbmQgdGhlIGZpcmUncyBidXJuZWQgbG93LCB0aGUgaG9zdCBwcmVzc2VzIHRoZSBmaW5pc2hlZCB0YW5vYSBpbnRvIHlvdXIgaGFuZHMgd2l0aG91dCBjZXJlbW9ueS4gJ1lvdXJzIG5vdy4gVXNlIGl0IHByb3Blcmx5IOKAlCBzaGFyZWQgYm93bCwgc2hhcmVkIHRhbGssIG5vYm9keSBkcmlua2luZyBhbG9uZSBpbiB0aGUgY29ybmVyLicgSGUgc2F5cyBpdCBsaWtlIGEgcnVsZSBhbmQgbWVhbnMgaXQgbGlrZSBvbmUuCgpZYXN1ciwgdXAgYmVoaW5kIHRoZSB0cmVlbGluZSwgdGhyb3dzIG9uZSBtb3JlIHNwcmF5IG9mIGxpZ2h0IGludG8gdGhlIGRhcmssIGJyaWVmbHksIGFzIGlmIHVuZGVybGluaW5nIHRoZSBwb2ludC4=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGNhcnJ5IHRoZSB0YW5vYSBiYWNrIHRvIHRoZSBhbmNob3JhZ2UgY3JhZGxlZCBhZ2FpbnN0IHlvdXIgY2hlc3QsIGNhcmVmdWwgb2YgdGhlIHBvbGlzaCwgY2FyZWZ1bCBvZiB0aGUgd2hvbGUgZXZlbmluZydzIHdvcnRoIG9mIHRydXN0IHRoYXQgc2VlbXMgdG8gaGF2ZSBiZWVuIGZvbGRlZCBpbnRvIG9uZSB3aWRlIHdvb2RlbiBib3dsLiBZYXN1cidzIGdsb3cgZm9sbG93cyB5b3UgdGhlIHdob2xlIHdhbGsgZG93biwgcGF0aWVudCwgaW5kaWZmZXJlbnQsIGVudGlyZWx5IHVuaW1wcmVzc2VkIGJ5IGFueXRoaW5nIHlvdSd2ZSBkb25lIHRvZGF5LgoKU29sYW5nZSBjaGVja3MgdGhlIGJvd2wgb3ZlciBvbmNlIHdpdGggcmVhbCBhcHByZWNpYXRpb24g4oCUICdnb29kIGdyYWluLCB0aGF0JyDigJQgYmVmb3JlIHN0b3dpbmcgaXQgcHJvcGVybHksIHRoZSBhZHplIGFuZCB0aGUgdGFub2EgcmlkaW5nIHNpZGUgYnkgc2lkZSBub3csIHN0b25lIGFuZCB3b29kLCBib3RoIG1lYW50IGZvciBoYW5kcywgbmVpdGhlciBtZWFudCBmb3IgYSBzaGVsZi4=',
            'choices' => [
                ['text' => 'U2l0IHVwIG9uIGRlY2sgYSB3aGlsZSBiZWZvcmUgeW91IGdv', 'next' => '8_end_watch'],
                ['text' => 'VHVybiBpbiBlYXJseSwgdGlyZWQgZnJvbSB0aGUgZGF5', 'next' => '8_end_sleep'],
            ],
        ],
        '8_end_watch' => [
            'prose'  => 'WW91IHNpdCB1cCB0b3AgYSB3aGlsZSBiZWZvcmUgdGhlIEvFjXR1a3UgbGlmdHMsIHdhdGNoaW5nIFlhc3VyJ3MgZ2xvdyBwdWxzZSBhZ2FpbnN0IHRoZSBsb3cgY2xvdWQgdGhlIHdheSBpdCBwcmVzdW1hYmx5IGhhcyBldmVyeSBuaWdodCBmb3IgY2VudHVyaWVzLCBlbnRpcmVseSB1bmNvbmNlcm5lZCB3aXRoIHlvdXIgc2NoZWR1bGUgb3IgYW55b25lIGVsc2Uncy4gVGhlIEJhcm9uIHNldHRsZXMgYmVzaWRlIHlvdSwgZm9yIG9uY2Ugbm90IG5hcnJhdGluZyBhbnl0aGluZywgYXBwYXJlbnRseSBhcyBjb250ZW50IGFzIHlvdSBhcmUgdG8ganVzdCB3YXRjaCBhIG1vdW50YWluIGJlIGEgbW91bnRhaW4uCgonU2hlJ2xsIHN0aWxsIGJlIGRvaW5nIHRoYXQsJyBTb2xhbmdlIHNheXMgZnJvbSB0aGUgaGF0Y2gsIG5vdCBxdWl0ZSBhIHF1ZXN0aW9uLCAnbG9uZyBhZnRlciB3ZSdyZSBib3RoIGdvbmUuJyBTaGUgZG9lc24ndCBzb3VuZCB0cm91YmxlZCBieSBpdC4gSWYgYW55dGhpbmcsIHRoZXJlJ3Mgc29tZXRoaW5nIGFsbW9zdCBjb21mb3J0aW5nIGluIGEgdGhpbmcgdGhpcyBvbGQgYW5kIHRoaXMgY29uc3RhbnQsIGdvaW5nIG9uIGV4YWN0bHkgdGhlIHNhbWUgd2hldGhlciBvciBub3QgeW91J3JlIHRoZXJlIHRvIHNlZSBpdC4gWW91IHdhdGNoIGEgbGl0dGxlIGxvbmdlciBiZWZvcmUgeW91IGZpbmFsbHkgZ28gYmVsb3cu',
            'ending' => true,
        ],
        '8_end_sleep' => [
            'prose'  => 'WW91IHR1cm4gaW4gZWFybHksIHdvcm4gb3V0IGluIHRoZSBnb29kLCBjb21wbGV0ZSB3YXkgYSBsb25nIGRheSBvZiByZWFsIHdvcmsgbGVhdmVzIHlvdSwgYW5kIHNsZWVwIHN0cmFpZ2h0IHRocm91Z2ggdGhlIHNob3J0IGxpZnQtb2ZmIGFuZCB0aGUgZmlyc3QgaG91ciBvZiBvcGVuIHdhdGVyIHdpdGhvdXQgc3RpcnJpbmcgb25jZS4KCllvdSB3YWtlIHRvIFNvbGFuZ2UncyBydW0gcml0dWFsIGFscmVhZHkgZmluaXNoZWQgYW5kIHRoZSB0YW5vYSBzaXR0aW5nIGV4YWN0bHkgd2hlcmUgaXQgd2FzIHN0b3dlZCwgY2F0Y2hpbmcgdGhlIGNhYmluIGxpZ2h0IGFsb25nIGl0cyBwb2xpc2hlZCByaW0uIFdoYXRldmVyIFlhc3VyIGRpZCBsYXN0IG5pZ2h0LCBnbG93aW5nIG9yIHF1aWV0LCB5b3UgbWlzc2VkIGFsbCBvZiBpdCDigJQgYW5kIGZpbmQsIGEgbGl0dGxlIHRvIHlvdXIgb3duIHN1cnByaXNlLCB0aGF0IHlvdSBkb24ndCBtaW5kLiBTb21lIHRoaW5ncyBnZXQgY2FycmllZCBmb3J3YXJkIHdoZXRoZXIgb3Igbm90IHlvdSBzdG9vZCB3YXRjaCBmb3IgdGhlbSwgYW5kIHRoaXMgd2FzIG5ldmVyIGdvaW5nIHRvIGJlIHRoZSBsYXN0IG1vdW50YWluIG9uIHRoaXMgdHJpcCB3b3J0aCBzZWVpbmcu',
            'ending' => true,
        ],
    ],
];
