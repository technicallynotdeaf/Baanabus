<?php
return [
    'id'    => 1,
    'title' => 'The Unfinished Chart',
    'color' => '#8A6A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIGhvdXNlIHN0aWxsIHNtZWxscyBsaWtlIGhpbSwgZmFpbnRseSwgdW5kZXIgdGhlIGR1c3Qgc2hlZXRzIGFuZCB0aGUgY29sZCDigJQgcGlwZSB0b2JhY2NvIGFuZCBtYWNoaW5lIG9pbCwgdGhlIHBhcnRpY3VsYXIgbXVzdGluZXNzIG9mIGEgc3R1ZHkgbm9ib2R5J3MgcHJvcGVybHkgYWlyZWQgc2luY2UgdGhlIGZ1bmVyYWwuIFlvdSd2ZSBwdXQgb2ZmIHNvcnRpbmcgaGlzIGRlc2sgZm9yIHRocmVlIG1vbnRocy4gVGhlIHNvbGljaXRvcidzIGxldHRlciBvbiB0aGUgaGFsbCB0YWJsZSwgdW5vcGVuZWQgdHdpY2UsIGhhcyBmaW5hbGx5IG1hZGUgZnVydGhlciBwdXR0aW5nLW9mZiBpbXBvc3NpYmxlLgoKVHdvIHRoaW5ncyB3YWl0IG9uIHRoZSBkZXNrIGV4YWN0bHkgd2hlcmUgaGUgbGVmdCB0aGVtOiBhIGJhdHRlcmVkIGluc3RydW1lbnQgY2FzZSwgaXRzIHZlbHZldCBsaW5pbmcgdG9ybiBhd2F5IGZyb20gbW9zdCBvZiBpdHMgY3V0b3V0cywgYW5kIGEgY2hhcnQsIGhhbGYtZmluaXNoZWQsIHRoZSBpbmsgc3RvcHBpbmcgbWlkLWxpbmUgcGFydHdheSBhY3Jvc3MgYW4gdW5uYW1lZCBtb3VudGFpbiBwYXNzIOKAlCBhcyB0aG91Z2ggaGUnZCBzaW1wbHkgc2V0IHRoZSBwZW4gZG93biBvbmUgYWZ0ZXJub29uIGFuZCBuZXZlciBwaWNrZWQgaXQgdXAgYWdhaW4uCgpZb3UgY291bGQgc3RhcnQgd2l0aCBlaXRoZXIu',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgdW5maW5pc2hlZCBjaGFydCBmaXJzdA==', 'next' => '2_chart'],
                ['text' => 'T3BlbiB0aGUgaW5zdHJ1bWVudCBjYXNlIGZpcnN0', 'next' => '2_box'],
            ],
        ],
        '2_chart' => [
            'prose'  => 'VGhlIGNoYXJ0IGlzIGhpcyBoYW5kIGV4YWN0bHkg4oCUIHNtYWxsLCBwcmVjaXNlLCBhIGNhcnRvZ3JhcGhlcidzIGVjb25vbXkgaW4gZXZlcnkgbGluZSDigJQgcmlnaHQgdXAgdW50aWwgaXQgaXNuJ3QuIFRoZSBzaWdodC1saW5lcyBzaW1wbHkgc3RvcCwgbWlkLWNhbGN1bGF0aW9uLCBhIG1hcmdpbiBub3RlIHNjcmF3bGVkIGluIGEgZGlmZmVyZW50LCBmYXN0ZXIgaGFuZCB0aGFuIHRoZSByZXN0OiAqdGVsbCBoZXIgSSdtIHNvcnJ5IGl0IHRvb2sgdGhpcyBsb25nLioKCkhlIG5ldmVyIHRvbGQgeW91IHdobyAnaGVyJyB3YXMuIFlvdSdyZSBub3Qgc3VyZSwgcmVhZGluZyBpdCBub3csIHRoYXQgaGUgZXZlciB0b2xkIGFueW9uZS4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQncyBhY3R1YWxseSBtaXNzaW5nIGZyb20gdGhlIGluc3RydW1lbnQ=', 'next' => '3_shared'],
            ],
        ],
        '2_box' => [
            'prose'  => 'VGhlIGNhc2UgaXMgd29yc2UgdGhhbiB5b3UgZXhwZWN0ZWQg4oCUIG1vc3Qgb2YgaXRzIHZlbHZldCBjdXRvdXRzIGVtcHR5LCBhIHNjYXR0ZXIgb2YgbG9vc2Ugc2NyZXdzIGFuZCBvbmUgbG9uZWx5IGJyYXNzIG1pcnJvciByYXR0bGluZyBpbiB0aGUgYm90dG9tIGxpa2UgdGhlIGxhc3QgdG9vdGggaW4gYW4gb2xkIGphdy4gV2hhdGV2ZXIgdGhpcyBpbnN0cnVtZW50IG9uY2Ugd2FzLCBpdCdzIGJlZW4gY29taW5nIGFwYXJ0IGZvciBhIHZlcnkgbG9uZyB0aW1lLCBwaWVjZSBieSBwaWVjZSwgbG9uZyBiZWZvcmUgaGUgZGllZC4KClR1Y2tlZCB1bmRlciB0aGUgbWlycm9yLCBhIHNjcmFwIG9mIHBhcGVyIGluIGhpcyBoYW5kOiBhIGxpc3Qgb2YgbmFtZXMgYW5kIHBsYWNlcywgaGFsZiBvZiB0aGVtIGNyb3NzZWQgb3V0LCBub25lIG9mIHRoZW0gZXhwbGFpbmVkLg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIHVuZmluaXNoZWQgY2hhcnQgc2F5cw==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgY2FtZSB0byBpdCwgdGhlIHNoYXBlIG9mIHRoZSB0aGluZyBpcyB0aGUgc2FtZTogYW4gaW5zdHJ1bWVudCBpbiBwaWVjZXMsIGEgbWFwIHRoYXQgbmV2ZXIgZ290IGZpbmlzaGVkLCBhbmQgYSBsaXN0IG9mIG5hbWVzIHNjYXR0ZXJlZCBoYWxmd2F5IHJvdW5kIHRoZSB3b3JsZCwgZWFjaCBvbmUgcHJlc3VtYWJseSBob2xkaW5nIHNvbWUgcGFydCBvZiB3aGF0J3MgbWlzc2luZy4gVGhpcnR5IHllYXJzIG9mIGhpcyBsaWZlLCBieSB0aGUgbG9vayBvZiBpdCwgYW5kIG5vbmUgb2YgaXQgZXZlciBwcm9wZXJseSBjbG9zZWQgb3V0LgoKWW91J3JlIHN0aWxsIHR1cm5pbmcgdGhlIGxpc3Qgb3ZlciBpbiB5b3VyIGhhbmRzLCBhZGRpbmcgdXAgZXhhY3RseSBob3cgbGFyZ2UgYSB0YXNrIHRoaXMgYWN0dWFsbHkgaXMsIHdoZW4gYW4gZW5naW5lIOKAlCB1bm1pc3Rha2FibHkgYW4gZW5naW5lLCBub3Qgd2luZCwgbm90IHdlYXRoZXIg4oCUIHN0YXJ0cyB1cCBzb21ld2hlcmUgY2xvc2Ugb3V0c2lkZSB0aGUgd2luZG93Lg==',
            'terminal' => true,
            'choices' => [
                ['text' => 'R28gYW5kIHNlZSB3aGF0IHRoYXQgaXM=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'V2hhdCB0aGF0IGlzLCBpcyBhbiBhaXJzaGlwIOKAlCBwYXRjaGVkLCBwcmFjdGljYWwsIG1vcmUgZ29uZG9sYSB0aGFuIGdsYW1vdXIg4oCUIHNldHRsaW5nIGludG8gdGhlIHBhZGRvY2sgbGlrZSBpdCdzIGRvbmUgdGhpcyBleGFjdCBtYW5vZXV2cmUgYSBodW5kcmVkIHRpbWVzIGJlZm9yZSwgd2hpY2gsIHlvdSdsbCBsZWFybiwgaXQgaGFzLiBBIHdvbWFuIGNsaW1icyBkb3duIGJlZm9yZSB0aGUgbW9vcmluZyBsaW5lcyBhcmUgZXZlbiBwcm9wZXJseSBzZWN1cmVkLCBhbHJlYWR5IHRhbGtpbmcuCgonTWFyZ2FyZXRoZSBWb3NzIOKAlCBubyByZWxhdGlvbiwgYmVmb3JlIHlvdSBhc2ssIGV2ZXJ5b25lIGFza3MsJyBzaGUgc2F5cywgb2ZmZXJpbmcgYSBoYW5kIHRoYXQncyBtb3JlIGNhbGx1cyB0aGFuIG1hbmljdXJlLiAnSSBmbGV3IHN1cnZleSByb3V0ZXMgd2l0aCB5b3VyIGdyYW5kZmF0aGVyJ3Mgb2xkIGNvcnJlc3BvbmRlbmNlIHRhcGVkIGFib3ZlIG15IGluc3RydW1lbnQgcGFuZWwgZm9yIHNpeCB5ZWFycyBiZWZvcmUgSSB3b3JrZWQgdXAgdGhlIG5lcnZlIHRvIGFjdHVhbGx5IGNvbWUgaGVyZS4gSSdtIG5vdCBzZWxsaW5nIGFueXRoaW5nLiBJJ20gb2ZmZXJpbmcgdG8gZmluaXNoIHNvbWV0aGluZy4n',
            'choices' => [
                ['text' => 'SGVhciBoZXIgb3V0IHByb3Blcmx5', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'U2hlJ3MgYWxyZWFkeSB0YWxraW5nIHNwZWNpZmljcyDigJQgcmFuZ2VzLCBuYW1lcyBoYWxmLW1hdGNoaW5nIHRoZSBsaXN0IGluIHlvdXIgaGFuZCwgdGhlIGV4YWN0IHVuZmluaXNoZWQgcGFzcyBmcm9tIHRoZSBjaGFydCDigJQgd2hlbiBzb21ldGhpbmcgc21hbGwgYW5kIGJsYWNrIGRyb3BzIG91dCBvZiB0aGUgYWlyc2hpcCdzIHJpZ2dpbmcgYW5kIGxhbmRzIG9uIHRoZSBkZXNrLCBkaXJlY3RseSBvbiB0b3Agb2YgdGhlIGxvb3NlIGJyYXNzIG1pcnJvciwgYW5kIHBpY2tzIGl0IHVwIGluIGl0cyBiZWFrIHdpdGggdGhlIHVuYm90aGVyZWQgY29uZmlkZW5jZSBvZiBhIGNyZWF0dXJlIGVudGlyZWx5IHVzZWQgdG8gZ2V0dGluZyBhd2F5IHdpdGggdGhpcy4KCidDb3JiaWUsJyBHcmV0YSBzYXlzLCBub3QgZXZlbiBsb29raW5nLiAnUHV0IGl0IGJhY2suJyBDb3JiaWUsIGFuIGFscGluZSBjaG91Z2ggd2l0aCBzdHJvbmcgcGVyc29uYWwgb3BpbmlvbnMgYWJvdXQgYW55dGhpbmcgdGhhdCBzaGluZXMsIGRvZXMgbm90IHB1dCBpdCBiYWNrLiAnSGUgZG9lcyB0aGF0LCcgc2hlIGFkZHMsIGJ5IHdheSBvZiBjb21wbGV0ZSBleHBsYW5hdGlvbiwgYWxyZWFkeSByZWFjaGluZyB0byByZXRyaWV2ZSBpdCBoZXJzZWxmLg==',
            'choices' => [
                ['text' => 'RGVjaWRlIHdoYXQgdG8gZG8gbmV4dA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SXQncyBub3QgcmVhbGx5IGEgc21hbGwgZGVjaXNpb24sIHdoYXRldmVyIEdyZXRhJ3MgYnJpc2sgbWFubmVyIG1ha2VzIGl0IGZlZWwgbGlrZS4gVGhpcnR5IHllYXJzIG9mIGhpcyB1bmZpbmlzaGVkIHdvcmssIGEgbGlzdCBvZiBuYW1lcyBzY2F0dGVyZWQgYWNyb3NzIGhhbGYgdGhlIG1vdW50YWluIHJhbmdlcyBvbiBFYXJ0aCwgYSB3b21hbiBhbmQgYSBiaXJkIGFuZCBhIHBhdGNoZWQgYWlyc2hpcCBvZmZlcmluZyB0byBoZWxwIGZpbmlzaCBpdCBwcm9wZXJseSBpbnN0ZWFkIG9mIGxlYXZpbmcgaXQsIGxpa2UgZXZlcnl0aGluZyBlbHNlIGFib3V0IGhpbSwgaGFsZi1leHBsYWluZWQuCgpZb3UgY291bGQgZ28gdG9kYXksIHdoaWxlIHRoZSBuZXJ2ZSBob2xkcy4gT3IgeW91IGNvdWxkIGdpdmUgdGhlIGhvdXNlIG9uZSBtb3JlIG5pZ2h0LCBwcm9wZXJseSwgYmVmb3JlIHlvdSBsZWF2ZSBpdCBmb3IgaG93ZXZlciBsb25nIHRoaXMgYWN0dWFsbHkgdGFrZXMu',
            'choices' => [
                ['text' => 'UGFjayBsaWdodCBhbmQgbGVhdmUgdG9kYXk=', 'next' => '7_end_now'],
                ['text' => 'R2l2ZSB0aGUgaG91c2Ugb25lIG1vcmUgbmlnaHQgZmlyc3Q=', 'next' => '7_end_goodbye'],
            ],
        ],
        '7_end_now' => [
            'prose'  => 'WW91IHBhY2sgbGlnaHQgYW5kIGxlYXZlIHRoZSBzYW1lIGFmdGVybm9vbiwgdGhlIG5lcnZlIGZvciBpdCB0b28gZnJhZ2lsZSB0byB0cnVzdCBvdmVybmlnaHQuIEdyZXRhIGRvZXNuJ3QgcnVzaCB5b3UsIGV4YWN0bHksIGJ1dCBzaGUgZG9lc24ndCBzbG93IGRvd24gZWl0aGVyIOKAlCB0aGUgQ29udG91cidzIGVuZ2luZSBpcyBhbHJlYWR5IHdhcm1pbmcgYnkgdGhlIHRpbWUgeW91J3ZlIGdvdCB0aGUgY2FzZSwgdGhlIGNoYXJ0LCBhbmQgdGhlIGxpc3Qgb2YgbmFtZXMgcHJvcGVybHkgc3Rvd2VkLgoKVGhlIGhvdXNlIHNocmlua3MgYmVsb3cgeW91IGZhc3QsIHRoZSBDYWlybmdvcm1zIHJpc2luZyBncmVlbi1icm93biBhbmQgZW5vcm1vdXMgYWxsIGFyb3VuZCBpdCwgYW5kIHlvdSBmaW5kIHlvdXJzZWxmIG5vdCBsb29raW5nIGJhY2sgc28gbXVjaCBhcyBsb29raW5nIGZvcndhcmQsIGhhcmQsIGF0IGEgbGlzdCBvZiBuYW1lcyB5b3UncmUgYWxyZWFkeSBzdGFydGluZyB0byBtZW1vcmlzZS4gV2hhdGV2ZXIgdGhpcyB0dXJucyBvdXQgdG8gY29zdCwgeW91J3ZlIGRlY2lkZWQsIGF0IGxlYXN0LCB0byBhY3R1YWxseSBmaW5pc2ggaXQu',
            'ending' => true,
        ],
        '7_end_goodbye' => [
            'prose'  => 'WW91IGFzayBmb3Igb25lIG1vcmUgbmlnaHQsIGFuZCBHcmV0YSwgdG8gaGVyIGNyZWRpdCwgZG9lc24ndCBhcmd1ZSDigJQganVzdCBtb29ycyB0aGUgQ29udG91ciBwcm9wZXJseSBhbmQgbGV0cyBDb3JiaWUgdGVycm9yaXNlIHRoZSBwYWRkb2NrJ3Mgc2hlZXAgd2hpbGUgeW91IHdhbGsgdGhlIGhvdXNlIG9uZSBsYXN0IHRpbWUsIHJvb20gYnkgcm9vbSwgdGhlIHdheSB5b3UgbmV2ZXIgcXVpdGUgbWFuYWdlZCB0byBkdXJpbmcgdGhlIGZ1bmVyYWwgaXRzZWxmLgoKWW91IGxlYXZlIGluIHRoZSBtb3JuaW5nIHdpdGggdGhlIGNhc2UsIHRoZSBjaGFydCwgYW5kIHRoZSBsaXN0IG9mIG5hbWVzIOKAlCBhbmQgd2l0aCB0aGUgaG91c2UgcHJvcGVybHkgc2FpZCBnb29kYnllIHRvLCBmb3IgdGhlIGZpcnN0IHRpbWUsIHJhdGhlciB0aGFuIHNpbXBseSBhYmFuZG9uZWQuIFRoZSBDYWlybmdvcm1zIGZhbGwgYXdheSBiZWxvdyB0aGUgQ29udG91ciBpbiB0aGUgc2FtZSBncmVlbi1icm93biBlbm9ybWl0eSBlaXRoZXIgd2F5LiBCdXQgeW91IG5vdGljZSwgdGhpcyB0aW1lLCB0aGF0IHlvdSdyZSBjYXJyeWluZyB0aGUgbGVhdmluZyBpdHNlbGYgYSBsaXR0bGUgbW9yZSBsaWdodGx5IHRoYW4geW91IGV4cGVjdGVkIHRvLg==',
            'ending' => true,
        ],
    ],
];
