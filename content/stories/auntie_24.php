<?php
return [
    'id'    => 24,
    'title' => 'There It Is',
    'color' => '#B8963A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UGFsbWVyc3RvbiByaXNlcyBvdXQgb2YgdGhlIHdhdGVyIGV4YWN0bHkgYXMgaXQgZGlkIG9uIHRoZSBkYXkgeW91IGxlZnQsIHNtYWxsIGFuZCBncmVlbiBhbmQgdXR0ZXJseSB1bmltcHJlc3NlZCBieSBob3cgZmFyIHlvdSd2ZSBiZWVuIHNpbmNlIOKAlCB0d2VudHktdGhyZWUgaXNsYW5kcywgdHdvIG9jZWFucywgbW9yZSBzZWEgZ2xhc3Mgbm93IHJpZGluZyBpbiB0aGUgc2F0Y2hlbCB0aGFuIHlvdSBldmVyIHF1aXRlIGJlbGlldmVkIHlvdSdkIGFjdHVhbGx5IGdhdGhlciB3aGVuIEF1bnRpZSBmaXJzdCBsYWlkIG91dCB0aGUgd2hvbGUgaW1wcm9iYWJsZSB0YXNrIGZyb20gaGVyIGNoYWlyIGJ5IHRoZSB3aW5kb3cuCgpTb2xhbmdlIGJyaW5ncyB0aGUgS8WNdHVrdSBkb3duIHNsb3cgYW5kIGNhcmVmdWwsIG5vbmUgb2YgaGVyIHVzdWFsIGJyaXNrIGVmZmljaWVuY3ksIGFzIHRob3VnaCBldmVuIHNoZSB3YW50cyB0aGlzIHBhcnRpY3VsYXIgbGFuZGluZyB0byB0YWtlIGV4YWN0bHkgYXMgbG9uZyBhcyBpdCBkZXNlcnZlcyB0by4=',
            'choices' => [
                ['text' => 'R28gdXAgdG8gdGhlIGhvdXNl', 'next' => '2_house'],
            ],
        ],
        '2_house' => [
            'prose'  => 'VGhlIGhvdXNlIGxvb2tzIGV4YWN0bHkgYXMgaXQgZGlkLCBhbmQgZW50aXJlbHkgZGlmZmVyZW50LCBpbiB0aGUgd2F5IGEgcGxhY2UgYWx3YXlzIGRvZXMgb25jZSB5b3UndmUgYmVlbiBjaGFuZ2VkIGJ5IGV2ZXJ5d2hlcmUgeW91IHdlbnQgaW4gYmV0d2VlbiBsZWF2aW5nIGl0IGFuZCBjb21pbmcgYmFjay4gQXVudGllIGlzIGluIGhlciBjaGFpciBieSB0aGUgd2luZG93LCBvZiBjb3Vyc2UsIGFuZCBkb2Vzbid0IGdldCB1cCwgYnV0IGhlciBleWVzIHRyYWNrIHlvdSB0aGUgd2hvbGUgd2F5IGFjcm9zcyB0aGUgcm9vbSB3aXRoIGFuIGF0dGVudGlvbiB0aGF0IG1pc3NlcyBub3RoaW5nLgoKQSBoYW5kZnVsIG9mIG5laWdoYm91cnMgaGF2ZSBnYXRoZXJlZCB0b28sIHF1aWV0bHksIHdvcmQgaGF2aW5nIGNsZWFybHkgdHJhdmVsbGVkIHRoYXQgdG9kYXkgd2FzIHRoZSBkYXksIGV2ZXJ5b25lIGdpdmluZyB0aGUgbW9tZW50IHJvb20gd2l0aG91dCBjcm93ZGluZyBpdC4=',
            'choices' => [
                ['text' => 'TGF5IG91dCBldmVyeXRoaW5nIHlvdSd2ZSBnYXRoZXJlZA==', 'next' => '3_layout'],
            ],
        ],
        '3_layout' => [
            'prose'  => 'WW91IGxheSBpdCBhbGwgb3V0IG9uIHRoZSB0YWJsZSBpbiBmcm9udCBvZiBoZXIsIG9uZSBwaWVjZSBhdCBhIHRpbWUg4oCUIHRoZSB3aG9sZSBzdHJhbmdlLCBzcGVjaWZpYyBhY2N1bXVsYXRpb24gb2YgYSB2ZXJ5IGxvbmcgam91cm5leS4gU2VhIGdsYXNzIGluIGV2ZXJ5IGNvbG91ciB0aGUgb2NlYW4gYXBwYXJlbnRseSBtYWtlcy4gQSBwYW5kYW51cyBzYXRjaGVsIHdvcm4gc29mdCB3aXRoIHVzZS4gQWR6ZSBhbmQgdGFub2EgYW5kIG5hbC1uYWwuIEEgZm9zc2lsIGNodW5rLCBhIHNhaWwtbWF0IHNhbXBsZSwgYSBwaG9zcGhhdGUgcm9jayB3aXRoIGl0cyBicml0dGxlIGxlZGdlciBwYWdlLiBUaW50ZWQgc3BlY3RhY2xlcywgYSBzdGFyLWNvbXBhc3MgY2FyZCwgYSBwcmVzZXJ2ZWQgZmVhdGhlci4gU3RvbmUgZnJvbSBhIGhpbGx0b3AgcMSBLiBCb3VudHkgdGltYmVyLCBwaW5lIGNvbmVzLCBhIHBhdWEgc2hlbGwgY2F0Y2hpbmcgdGhlIGxpZ2h0LiBDYXJpIGNhcmksIGNvaXIgcm9wZSwgYSBtZW5kZWQgbmV0LiBBIHNpbmdsZSBzaGFyZCBvZiB2ZXJ5IG9sZCBzaGlwJ3MgZ2xhc3MsIGNhcnJpZWQgdGhlIHdob2xlIHdheSBmcm9tIHRoZSBsb25lbGllc3QgaXNsYW5kIG9mIHRoZSBlbnRpcmUgcm91dGUuCgpBdW50aWUgbG9va3MgYXQgZXZlcnkgc2luZ2xlIHBpZWNlLCBpbiBvcmRlciwgaW4gY29tcGxldGUgc2lsZW5jZSwgYW5kIHNheXMgbm90aGluZyBhdCBhbGwgdW50aWwgdGhlIHZlcnkgbGFzdCBvbmUgaXMgc2V0IGRvd24u',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2VlIHdobyBlbHNlIGhhcyBjb21l', 'next' => '4_vao'],
            ],
        ],
        '4_vao' => [
            'prose'  => 'VmFvIGlzIGF0IHRoZSBkb29yIGJlZm9yZSB5b3UndmUgcHJvcGVybHkgcmVnaXN0ZXJlZCBoaW0gYXJyaXZpbmcsIHNhbWUgYXMgZXZlcnkgc2luZ2xlIHRpbWUsIG9uIGV2ZXJ5IHNpbmdsZSBvY2VhbiwgZm9yIHRoZSB3aG9sZSBvZiB0aGlzIHJpZGljdWxvdXMsIGltcHJvYmFibGUgam91cm5leS4gSGUgZG9lc24ndCBleHBsYWluIGhvdyBoZSBnb3QgaGVyZSBlaXRoZXIsIHNhbWUgYXMgYWx3YXlzLCB0aG91Z2ggZm9yIG9uY2UgeW91IGRvbid0IGFzayDigJQgc29tZSBxdWVzdGlvbnMsIHlvdSd2ZSBkZWNpZGVkIHNvbWV3aGVyZSBhcm91bmQgQWdhbGVnYSwgYXJlIGJldHRlciBsZWZ0IGV4YWN0bHkgYXMgdW5zb2x2ZWQgYXMgaGUgY2xlYXJseSB3YW50cyB0aGVtLgoKSGUgbm9kcyBvbmNlIGF0IEF1bnRpZSwgYW4gb2xkLCBlYXN5IGZhbWlsaWFyaXR5IGJldHdlZW4gdGhlIHR3byBvZiB0aGVtIHRoYXQgbmVlZHMgbm8gZnVydGhlciBjb21tZW50LCBhbmQgc2ltcGx5IHN0YW5kcyBuZWFyIHRoZSBkb29yLCB3YXRjaGluZywgdGhlIHdheSBoZSdzIHdhdGNoZWQgZnJvbSBhIGRvemVuIGRvb3J3YXlzIGFuZCBiZWFjaGVzIGFuZCB3b3Jrc2hvcHMgd2l0aG91dCBldmVyIG9uY2UgZXhwbGFpbmluZyB3aHkgaGUgd2FzIGFscmVhZHkgdGhlcmUgZmlyc3Qu',
            'choices' => [
                ['text' => 'QmVnaW4gcGxhY2luZyB0aGUgcGllY2Vz', 'next' => '5_placing'],
            ],
        ],
        '5_placing' => [
            'prose'  => 'QXVudGllIGRpcmVjdHMgdGhlIHBsYWNpbmcgaGVyc2VsZiwgZnJvbSBoZXIgY2hhaXIsIG5hbWluZyBlYWNoIGdhcCBpbiB0aGUgd2luZG93IGJlZm9yZSB5b3UgZmlsbCBpdCwgdGhlIHBhdHRlcm4gdGhhdCBvbmx5IGV2ZXIgbWFkZSBzZW5zZSBmcm9tIGV4YWN0bHkgb25lIHNlYXQgaW4gdGhlIHdob2xlIGhvdXNlIGZpbmFsbHkgY2xvc2luZywgcGllY2UgYnkgcGllY2UsIGludG8gc29tZXRoaW5nIHdob2xlLiBBbWJlci1icm93biBiZXNpZGUgY29iYWx0IGJlc2lkZSBhIGZyYWdtZW50IG9mIG9ic2lkaWFuLWRhcmsgZ2xhc3MgdGhhdCBjYXRjaGVzIG5vIGxpZ2h0IGF0IGFsbCB1bnRpbCB5b3UgdHVybiBpdCBleGFjdGx5IHJpZ2h0LgoKT25lIGdhcCwgbmVhciB0aGUgd2luZG93J3MgY2VudHJlLCB5b3UgZmlsbCBsYXN0IG9mIGFsbCDigJQgdGhlIG9sZCBzaGlwd3JlY2sgc2hhcmQgZnJvbSB0aGUgbG9uZWxpZXN0LCBmbGF0dGVzdCBpc2xhbmQgb2YgdGhlIHdob2xlIGpvdXJuZXksIHNldHRsaW5nIGludG8gaXRzIHBsYWNlIGxpa2UgaXQgaGFkIGFsd2F5cyBrbm93biBleGFjdGx5IHdoZXJlIGl0IHdhcyBoZWFkZWQuCgpUaGVyZSdzIGEgZ2FwLCB0b28sIHdoZXJlIGEgbmFtZSBhbG1vc3QgYmVsb25ncyBhbmQgZG9lc24ndCBxdWl0ZSDigJQgdGhlIHJpdmFsLCB3aG9zZSBvd24gcm9hZCB0b29rIHRoZW0gc29tZXdoZXJlIGVsc2UgZW50aXJlbHksIHNvbWV3aGVyZSB0aGlzIHdpbmRvdyB3YXMgbmV2ZXIgZ29pbmcgdG8gYmUgdGhlaXIgZW5kaW5nLiBOb2JvZHkgbWVudGlvbnMgaXQgZGlyZWN0bHkuIEF1bnRpZSdzIGV5ZXMgcmVzdCBvbiB0aGF0IG9uZSBzcG90IGZvciBhIG1vbWVudCBsb25nZXIgdGhhbiB0aGUgb3RoZXJzLCBhbmQgdGhlbiBtb3ZlIG9uLCBhbmQgdGhlIG1vdmluZyBvbiBzYXlzIGV2ZXJ5dGhpbmcgdGhhdCBuZWVkcyBzYXlpbmcu',
            'choices' => [
                ['text' => 'U3RlcCBiYWNrIGFuZCBzZWUgdGhlIHdob2xlIHdpbmRvdw==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIGxhc3QgcGllY2Ugc2V0dGxlcyBpbnRvIHBsYWNlLCBhbmQgdGhlIHdpbmRvdywgbGl0IGZyb20gYmVoaW5kIGJ5IHRoZSBsb3cgYWZ0ZXJub29uIHN1biwgZG9lcyBzb21ldGhpbmcgeW91IHdlcmVuJ3QgcXVpdGUgcHJlcGFyZWQgZm9yIOKAlCB0d2VudHktZm91ciBmcmFnbWVudHMgb2YgZ2xhc3MgZnJvbSB0d2VudHktZm91ciBpbXBvc3NpYmxlIHBsYWNlcywgYWxsIGF0IG9uY2UsIHByb3Blcmx5LCBmaW5hbGx5IHdob2xlLCB0aHJvd2luZyBjb2xvdXIgYWNyb3NzIHRoZSB3aG9sZSByb29tIGluIGEgcGF0dGVybiB0aGF0IG9ubHkgZXZlciBtYWRlIHNlbnNlIGZyb20gZXhhY3RseSB0aGUgY2hhaXIgQXVudGllIGlzIHNpdHRpbmcgaW4gcmlnaHQgbm93LgoKU2hlIGxvb2tzIGF0IGl0IGEgbG9uZyBtb21lbnQuIFRoZW4gYXQgeW91LiAnV2VsbCwnIHNoZSBzYXlzLCBpbiB0aGUgc2FtZSB2b2ljZSBzaGUgdXNlZCB0aGUgdmVyeSBmaXJzdCBkYXksIGxpa2UgdGhpcyB3YXMgYWx3YXlzIHNpbXBseSBhIGZhY3QgeW91J2QgZ2V0IGFyb3VuZCB0byBub3RpY2luZyBldmVudHVhbGx5LiAnVGhlcmUgaXQgaXMuJw==',
            'choices' => [
                ['text' => 'U2l0IHdpdGggaGVyIGluIHRoZSBnb29kIGNoYWlyLCBwcm9wZXJseSwgdGhpcyB0aW1l', 'next' => '7_end_sit'],
                ['text' => 'TGV0IHRoZSB3aG9sZSByb29tIGNlbGVicmF0ZSBhcm91bmQgeW91IGluc3RlYWQ=', 'next' => '7_end_celebrate'],
            ],
        ],
        '7_end_sit' => [
            'prose'  => 'WW91IHNpdCwgdGhpcyB0aW1lIHByb3Blcmx5IGludml0ZWQgcmF0aGVyIHRoYW4gd2F2ZWQgdG93YXJkIHRoZSBmbG9vciwgaW4gdGhlIGdvb2QgY2hhaXIgYmVzaWRlIGhlciwgdGhlIHR3byBvZiB5b3UgbG9va2luZyBvdXQgYXQgYSB3aW5kb3cgdGhhdCB0b29rIGEgbGlmZXRpbWUgdG8gZmlsbCBhbmQgYSBzaW5nbGUgaW1wb3NzaWJsZSBqb3VybmV5IHRvIGZpbmlzaC4gU29sYW5nZSwgdGhlIEJhcm9uLCBWYW8sIHRoZSBnYXRoZXJlZCBuZWlnaGJvdXJzIOKAlCB0aGUgd2hvbGUgcm9vbSBnb2VzIG9uIGFyb3VuZCB5b3UsIHdhcm0gYW5kIGxvdWQgYW5kIGVudGlyZWx5IHVuYm90aGVyZWQgYnkgdGhlIHF1aWV0IHRoZSB0d28gb2YgeW91IGFyZSBrZWVwaW5nIGJldHdlZW4geW91cnNlbHZlcy4KCidIb3VzZSBpcyB5b3VycyBub3csJyBBdW50aWUgc2F5cyBldmVudHVhbGx5LCBub3QgbWFraW5nIGEgY2VyZW1vbnkgb2YgaXQsIGV4YWN0bHkgdGhlIHdheSBzaGUgZG9lc24ndCBtYWtlIGEgY2VyZW1vbnkgb2YgYW55dGhpbmcuICdOb3QgYmVjYXVzZSB5b3Ugd29uIGEgcmFjZS4gQmVjYXVzZSB5b3UgZmluaXNoZWQgYSB0aGluZyBwcm9wZXJseSwgYWxsIHRoZSB3YXkgdGhyb3VnaCwgdGhlIHdheSBpdCBkZXNlcnZlZC4nIE91dHNpZGUsIHRoZSBsaWdodCBrZWVwcyBtb3ZpbmcgdGhyb3VnaCB0d2VudHktZm91ciBjb2xvdXJzIG9mIGdsYXNzLCBhbmQgc29tZXRoaW5nIGluIHRoZSByb29tLCBhbmQgaW4geW91LCBmaW5hbGx5LCBlbnRpcmVseSwgc2V0dGxlcy4=',
            'ending' => true,
        ],
        '7_end_celebrate' => [
            'prose'  => 'WW91IGxldCB0aGUgcm9vbSBjZWxlYnJhdGUgYXJvdW5kIHlvdSBpbnN0ZWFkLCBTb2xhbmdlIGFscmVhZHkgZGVlcCBpbnRvIGEgc3RvcnkgdGhhdCdzIHNvbWVob3cgYmVjb21pbmcgbW9yZSBoZXJvaWMgd2l0aCBldmVyeSByZXRlbGxpbmcsIHRoZSBCYXJvbiBob2xkaW5nIGNvdXJ0IGFib3V0IGhpcyBvd24gaW5kaXNwZW5zYWJsZSBjb250cmlidXRpb25zIHRvIGF0IGxlYXN0IGVsZXZlbiBvZiB0aGUgdHdlbnR5LWZvdXIgaXNsYW5kcywgdGhlIGdhdGhlcmVkIG5laWdoYm91cnMgbGF1Z2hpbmcgaW4gZXhhY3RseSB0aGUgdW5ndWFyZGVkIHdheSBwZW9wbGUgbGF1Z2ggd2hlbiBzb21ldGhpbmcgZ2VudWluZWx5IGdvb2QgaGFzIGp1c3QgcHJvcGVybHkgZmluaXNoZWQuCgpBdW50aWUgd2F0Y2hlcyBhbGwgb2YgaXQgZnJvbSBoZXIgY2hhaXIsIHNheWluZyBsaXR0bGUsIGVudGlyZWx5IGNvbnRlbnQsIHRoZSB3aW5kb3cgYmVoaW5kIGhlciB0aHJvd2luZyBpdHMgd2hvbGUgaGFyZC13b24gcGF0dGVybiBvZiBjb2xvdXIgYWNyb3NzIGEgcm9vbSBmaW5hbGx5IGZ1bGwgZW5vdWdoIHRvIGRlc2VydmUgaXQuIFlvdSBjYXRjaCBoZXIgZXllIG9uY2UsIGFjcm9zcyBhbGwgdGhlIG5vaXNlLCBhbmQgc2hlIGdpdmVzIHlvdSB0aGUgc21hbGxlc3QgcG9zc2libGUgbm9kIOKAlCBub3QgYSB0aGFuayB5b3UgZXhhY3RseSwganVzdCBhbiBhY2tub3dsZWRnbWVudCwgcXVpZXQgYW5kIGNvbXBsZXRlLCB0aGF0IHRoZSB0aGluZyBhc2tlZCBvZiB5b3UgYXQgdGhlIHZlcnkgc3RhcnQgb2YgYWxsIHRoaXMgaGFzLCBhdCBsb25nIGxhc3QsIHByb3Blcmx5IGFuZCBlbnRpcmVseSwgYmVlbiBkb25lLg==',
            'ending' => true,
        ],
    ],
];
