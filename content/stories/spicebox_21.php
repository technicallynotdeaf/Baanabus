<?php
return [
    'id'    => 21,
    'title' => 'Closer To Home Than You Realise',
    'color' => '#A85A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'SmVydXNhbGVtJ3Mgb2xkIG1hcmtldHMgcHJlc3MgaW4gY2xvc2UgYW5kIGFuY2llbnQsIHN0b25lIHdvcm4gc21vb3RoIGJ5IGNlbnR1cmllcyBvZiBleGFjdGx5IHRoaXMgc2FtZSBmb290IHRyYWZmaWMsIHNwaWNlIHN0YWxscyBzdGFja2VkIGRlZXAgd2l0aCBjaW5uYW1vbiBiYXJrIGFuZCBibGFjayBwZXBwZXIgYW5kIGNhcmRhbW9tIHBvZHMgYmVzaWRlIGNvbmVzIG9mIGEgd2FybSwgcmVkZGlzaC1icm93biBibGVuZCBCcnVubyBpZGVudGlmaWVzIGltbWVkaWF0ZWx5IGFzIGJhaGFyYXQuIEl0J3MgdGhlIGxhc3QgbWFqb3Igc3BpY2UgdGhlIHJlY2lwZSBzdGlsbCBuZWVkcy4KClR3byBtYXJrZXQtcXVhcnRlciByb3V0ZXMgdG93YXJkIHRoZSByaWdodCBzdGFsbCBwcmVzZW50IHRoZW1zZWx2ZXM6IHRocm91Z2ggdGhlIGJ1c2llciBjZW50cmFsIGxhbmVzLCBvciBhbG9uZyBhIHF1aWV0ZXIgcm93IGZhdm91cmVkIG1vc3RseSBieSBsb2NhbCBjb29rcyByYXRoZXIgdGhhbiB2aXNpdG9ycy4=',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgYnVzaWVyIGNlbnRyYWwgbGFuZXM=', 'next' => '2_central'],
                ['text' => 'Rm9sbG93IHRoZSBxdWlldGVyIGxvY2FsIHJvdw==', 'next' => '2_local'],
            ],
        ],
        '2_central' => [
            'prose'  => 'VGhlIGNlbnRyYWwgbGFuZXMgYXJlIHRoaWNrIHdpdGggbW92ZW1lbnQsIHZlbmRvcnMgY2FsbGluZyBwcmljZXMsIHRoZSBzbWVsbCBvZiByb2FzdGluZyBudXRzIG1peGluZyB3aXRoIGZyZXNoIGJyZWFkIGZyb20gc29tZXdoZXJlIGNsb3NlIGJ5LiBZb3UgbmF2aWdhdGUgdGhlIGNyb3dkIHN0ZWFkaWx5LCB0aGUgcmlnaHQgc3RhbGwgZmluYWxseSBhcHBlYXJpbmcgYXQgYSBxdWlldGVyIGZvcmsgbmVhciB0aGUgYmFjay4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHN0YWxs', 'next' => '3_shared'],
            ],
        ],
        '2_local' => [
            'prose'  => 'VGhlIHF1aWV0ZXIgbG9jYWwgcm93IGlzIGZhdm91cmVkIGJ5IGNvb2tzIHdobyBjbGVhcmx5IGtub3cgZXhhY3RseSB3aGljaCBzdGFsbHMgaG9sZCB0aGUgcmVhbCBxdWFsaXR5LCB1bmh1cnJpZWQgYW5kIGNvbnNpZGVyYWJseSBlYXNpZXIgdG8gbW92ZSB0aHJvdWdoIHRoYW4gdGhlIGNlbnRyYWwgbGFuZXMuIFlvdSByZWFjaCB0aGUgcmlnaHQgc3RhbGwgZGlyZWN0bHksIG5vIHdhc3RlZCBuYXZpZ2F0aW9uIGF0IGFsbC4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHN0YWxs', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHN0YWxsaG9sZGVyLCBhbiBvbGRlciBtYW4gbmFtZWQgWXVzdWYgd2hvJ3MgY2xlYXJseSB3b3JrZWQgdGhpcyBleGFjdCBzcG90IGZvciBkZWNhZGVzLCByZWNvZ25pc2VzIHRoZSByZWNpcGUgY2FyZCdzIGJhaGFyYXQgbm90ZSB0aGUgbW9tZW50IHlvdSBzaG93IGl0IHRvIGhpbS4gJ0xhc3QgbWFqb3IgcGllY2Ugb2YgeW91ciBwdXp6bGUsIEknZCBndWVzcywnIGhlIHNheXMsIHN0dWR5aW5nIHRoZSBjYXJkJ3Mgd29ybiBoYW5kd3JpdGluZyB3aXRoIHJlYWwgaW50ZXJlc3QuICdFdmVyeSBmYW1pbHkncyBiYWhhcmF0IGlzIHNsaWdodGx5IGRpZmZlcmVudCDigJQgdGhpcyBpcyBhIGdvb2Qgb25lLiBXaG9ldmVyIHdyb3RlIHRoaXMgdW5kZXJzdG9vZCBwcm9wb3J0aW9uIHByb3Blcmx5LicKCkhlIHN0dWRpZXMgeW91LiAnSSBjYW4gbWVhc3VyZSB5b3UgYSBzdGFuZGFyZCBiYXRjaCBxdWlja2x5LCBvciBJIGNhbiBzaG93IHlvdSBwcm9wZXJseSBob3cgdGhlIHJhdGlvJ3MgYnVpbHQsIHBpZWNlIGJ5IHBpZWNlLCB0aGUgd2F5IEkgd2FzIHRhdWdodCBhcyBhIGJveS4gVGFrZXMgbG9uZ2VyLCBidXQgeW91J2xsIGFjdHVhbGx5IHVuZGVyc3RhbmQgaXQgcmF0aGVyIHRoYW4ganVzdCBjYXJyeWluZyBpdCBob21lIGluIGEgYmFnLic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHRvIHVuZGVyc3RhbmQgaXQgcHJvcGVybHk=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'WXVzdWYgb2ZmZXJzIHR3byB3YXlzIHRvIHByb3Blcmx5IGxlYXJuIHRoZSBibGVuZCdzIGNvbnN0cnVjdGlvbjogd2F0Y2ggaGltIGJ1aWxkIGFuIGVudGlyZSBiYXRjaCBmcm9tIGJhc2Ugc3BpY2VzIHVwd2FyZCwgbmFycmF0aW5nIGVhY2ggYWRkaXRpb24gYW5kIGl0cyBwdXJwb3NlIGFzIGhlIGdvZXMsIG9yIGhhbmRsZSBlYWNoIGluZGl2aWR1YWwgc3BpY2UgeW91cnNlbGYgZmlyc3Qg4oCUIHNtZWxsaW5nLCB0YXN0aW5nLCB1bmRlcnN0YW5kaW5nIGVhY2ggcGllY2UgYWxvbmUg4oCUIGJlZm9yZSB3YXRjaGluZyBob3cgdGhleSBjb21iaW5lLgoKJ0VpdGhlciBnZXRzIHlvdSB0aGVyZSBwcm9wZXJseSwnIGhlIHNheXMuICdXYXRjaCB0aGUgd2hvbGUgYnVpbGQsIG9yIGtub3cgZWFjaCBwaWVjZSBmaXJzdC4gWW91ciBjaG9pY2UuJw==',
            'choices' => [
                ['text' => 'V2F0Y2ggaGltIGJ1aWxkIHRoZSB3aG9sZSBiYXRjaA==', 'next' => '5_watch'],
                ['text' => 'TGVhcm4gZWFjaCBzcGljZSBpbmRpdmlkdWFsbHkgZmlyc3Q=', 'next' => '5_individual'],
            ],
        ],
        '5_watch' => [
            'prose'  => 'V2F0Y2hpbmcgWXVzdWYgYnVpbGQgYW4gZW50aXJlIGJhdGNoIGZyb20gdGhlIGJhc2UgdXB3YXJkIGlzIGdlbnVpbmVseSBpbnN0cnVjdGl2ZSwgZWFjaCBzcGljZSBhZGRlZCBpbiBjYXJlZnVsIHNlcXVlbmNlLCBoaXMgcnVubmluZyBjb21tZW50YXJ5IGV4cGxhaW5pbmcgZXhhY3RseSB3aHkgYmxhY2sgcGVwcGVyIGNvbWVzIGJlZm9yZSBjYXJkYW1vbSwgd2h5IHRoZSBjaW5uYW1vbiBnb2VzIGluIGxhc3QgdG8gcHJlc2VydmUgaXRzIGFyb21hIHByb3Blcmx5LgoKQnkgdGhlIGVuZCwgeW91IHVuZGVyc3RhbmQgdGhlIHdob2xlIGFyY2hpdGVjdHVyZSBvZiB0aGUgYmxlbmQsIHRvcCB0byBib3R0b20u',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUgZmluaXNoZWQgYmFoYXJhdA==', 'next' => '6_shared'],
            ],
        ],
        '5_individual' => [
            'prose'  => 'TGVhcm5pbmcgZWFjaCBzcGljZSBpbmRpdmlkdWFsbHkgZmlyc3QgbWVhbnMgc21lbGxpbmcgYW5kIHRhc3RpbmcgY2lubmFtb24sIGNhcmRhbW9tLCBwZXBwZXIsIGFuZCB0aGUgcmVzdCBvbmUgYXQgYSB0aW1lLCB1bmRlcnN0YW5kaW5nIGVhY2ggcGllY2UncyBvd24gcGFydGljdWxhciBjaGFyYWN0ZXIgYmVmb3JlIFl1c3VmIGZpbmFsbHkgc2hvd3MgeW91IGhvdyB0aGV5IGNvbWJpbmUgaW50byBzb21ldGhpbmcgZ3JlYXRlciB0aGFuIGFueSBzaW5nbGUgcGFydC4KCkJ5IHRoZSBlbmQsIHlvdSBrbm93IHRoZSBibGVuZCBmcm9tIHRoZSBncm91bmQgdXAsIHBpZWNlIGJ5IGVhcm5lZCBwaWVjZS4=',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB0aGUgZmluaXNoZWQgYmFoYXJhdA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WXVzdWYgcGFja2FnZXMgYSBnZW5lcm91cyBtZWFzdXJlIG9mIGJhaGFyYXQsIHN0aWxsIHdhcm0gd2l0aCBpdHMgb3duIHBhcnRpY3VsYXIgZnJhZ3JhbmNlLiAnVGhhdCdzIHlvdXIgbGFzdCBtYWpvciBzcGljZSwgaWYgSSd2ZSBjb3VudGVkIHlvdXIgY2FyZCBjb3JyZWN0bHksJyBoZSBzYXlzLCBzdHVkeWluZyB0aGUgcmVjaXBlJ3MgY2FyZWZ1bCwgd29ybiBoYW5kd3JpdGluZyBvbmNlIG1vcmUuICdXaGF0ZXZlcidzIGxlZnQgYWZ0ZXIgdGhpcyBpcyB0ZWNobmlxdWUsIG5vdCBpbmdyZWRpZW50LCBpZiBJIGhhZCB0byBndWVzcy4gWW91J3JlIGNsb3NlciB0byBob21lIHRoYW4geW91IHByb2JhYmx5IHJlYWxpc2UuJwoKSGUgd2F2ZXMgb2ZmIHBheW1lbnQgd2l0aCBhIHNtYWxsLCBrbm93aW5nIHNtaWxlLiAnTGFzdCBwaWVjZSBvZiBhIHB1enpsZSBsaWtlIHRoaXMgc2hvdWxkbid0IGNvc3QgYW55dGhpbmcuIEp1c3QgYW4gaG9ub3VyIHRvIGJlIHBhcnQgb2YgaXQuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHN0ZXAgYmFjayBvdXQgaW50byB0aGUgb2xkIG1hcmtldCdzIHdvcm4gc3RvbmUgbGFuZXMgd2l0aCB0aGUgYmFoYXJhdCBzZWN1cmUgaW4gaXRzIHdyYXAsIHRoZSB3ZWlnaHQgb2YgWXVzdWYncyBvYnNlcnZhdGlvbiBzZXR0bGluZyBpbiBzbG93bHkgYXMgeW91IHdhbGsuIEJydW5vLCB1bmNoYXJhY3RlcmlzdGljYWxseSBxdWlldCwgZmluYWxseSBzcGVha3Mgb25jZSB0aGUgbWFya2V0IG5vaXNlIHRoaW5zIGJlaGluZCB5b3UuCgonTGFzdCBzcGljZSwnIGhlIHNheXMgc29mdGx5LiAnRmVlbHMgc3RyYW5nZSwgZG9lc24ndCBpdC4gQWxsIHRoaXMgdGltZSBjb2xsZWN0aW5nLCBhbmQgc3VkZGVubHkgdGhlcmUncyBhbiBlbmQgaW4gc2lnaHQuJw==',
            'choices' => [
                ['text' => 'U2F5IGl0IGZlZWxzIGxpa2UgcmVsaWVm', 'next' => '8_end_relief'],
                ['text' => 'U2F5IGl0IGZlZWxzIGxpa2Ugc29tZXRoaW5nIHlvdSdyZSBub3QgcmVhZHkgdG8gbGV0IGdvIG9mIHlldA==', 'next' => '8_end_notready'],
            ],
        ],
        '8_end_relief' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBmZWVscyBsaWtlIHJlbGllZiwnIHlvdSBhZG1pdCwgdHVybmluZyB0aGUgYmFoYXJhdCBvdmVyIGdlbnRseSBpbiB5b3VyIGhhbmRzLiAnTm90IGJlY2F1c2UgSSB3YW50IHRoZSB0cmlwIHRvIGVuZCwgZXhhY3RseS4gSnVzdCDigJQgZ29vZCB0byBrbm93IHRoZSByZWNpcGUncyBhY3R1YWxseSBuZWFybHkgd2hvbGUuIFRoYXQgdGhlIHdvcmsncyBhY3R1YWxseSBsYW5kaW5nIHNvbWV3aGVyZS4nCgpCcnVubyBub2RzIHNsb3dseS4gJ0ZhaXIuIFJlbGllZidzIGEgZ29vZCwgaG9uZXN0IHdvcmQgZm9yIGl0LiBEb2Vzbid0IG1lYW4gdGhlIGVuZGluZyB3b24ndCBzdGlsbCBjYXRjaCB5b3Ugc2lkZXdheXMgd2hlbiBpdCBhY3R1YWxseSBhcnJpdmVzLic=',
            'ending' => true,
        ],
        '8_end_notready' => [
            'prose'  => 'J0hvbmVzdGx5LCBpdCBmZWVscyBsaWtlIHNvbWV0aGluZyBJJ20gbm90IHJlYWR5IHRvIGxldCBnbyBvZiB5ZXQsJyB5b3UgYWRtaXQsIHN1cnByaXNpbmcgeW91cnNlbGYgc2xpZ2h0bHkgd2l0aCBob3cgbXVjaCB0aGUgdGhvdWdodCB1bnNldHRsZXMgeW91LiAnVGhpcyBjb2xsZWN0aW5nIGhhcyBiZWVuIGl0cyBvd24gc3RyYW5nZSBraW5kIG9mIGhvbWUuIE5vdCBzdXJlIHdoYXQgaGFwcGVucyB0byB0aGF0IGZlZWxpbmcgb25jZSB0aGUgcmVjaXBlJ3MgYWN0dWFsbHkgZmluaXNoZWQuJwoKQnJ1bm8gZG9lc24ndCBydXNoIHRvIHJlYXNzdXJlIHlvdS4gJ01pZ2h0IGJlIHdvcnRoIHNpdHRpbmcgd2l0aCB0aGF0IGEgd2hpbGUsJyBoZSBzYXlzIGluc3RlYWQuICdObyBuZWVkIHRvIHNvbHZlIGl0IHRvZGF5LiBQcm92ZW5jZSBhbmQgU2ljaWx5IGFyZSBzdGlsbCBhaGVhZCBvZiB1cyB5ZXQuJyBUaGUgb2xkIG1hcmtldCdzIHdvcm4gbGFuZXMgc3RyZXRjaCBvbiBxdWlldGx5IHRvd2FyZCBldmVuaW5nIGFzIHlvdSBjb250aW51ZSBvbi4=',
            'ending' => true,
        ],
    ],
];
