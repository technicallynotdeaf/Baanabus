<?php
return [
    'id'    => 16,
    'title' => 'An Object Wants Its Purpose',
    'color' => '#4A6A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIEphcGFuZXNlIEFscHMgcmlzZSBzdGVlcCBhbmQgZm9yZXN0ZWQsIG1pc3QgY29sbGVjdGluZyBpbiB0aGUgdmFsbGV5cyBtb3N0IG1vcm5pbmdzIHJlZ2FyZGxlc3Mgb2Ygc2Vhc29uLCBzbWFsbCBzaHJpbmVzIHR1Y2tlZCBpbnRvIHRoZSBtb3VudGFpbnNpZGUgYXQgaW50ZXJ2YWxzIHRoYXQgc2VlbSB0byBtYXJrIHNvbWV0aGluZyBtb3JlIHRoYW4gc2ltcGxlIGNvbnZlbmllbmNlLiBHcmV0YSBtb29ycyB0aGUgQ29udG91ciBuZWFyIGEgdG9yaWkgZ2F0ZSwgdGhlIHdvb2RlbiBhcmNod2F5IG1hcmtpbmcgdGhlIGJvdW5kYXJ5IGJldHdlZW4gb3JkaW5hcnkgZ3JvdW5kIGFuZCBzb21ldGhpbmcgdGhlIGxvY2FsIHRyYWRpdGlvbiBjbGVhcmx5IHRyZWF0cyBhcyBnZW51aW5lbHkgc2FjcmVkLgoKVHdvIHBhdGhzIHRvd2FyZCB0aGUgbW91bnRhaW4gc2hyaW5lIHByZXNlbnQgdGhlbXNlbHZlczogdGhlIG1haW4gcGlsZ3JpbSByb3V0ZSwgbWFya2VkIGFuZCBtYWludGFpbmVkLCBvciBhIHF1aWV0ZXIgc2lkZSB0cmFpbCBmYXZvdXJlZCBieSBsb2NhbHMgcmF0aGVyIHRoYW4gdmlzaXRvcnMu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgbWFpbiBwaWxncmltIHJvdXRl', 'next' => '2_main'],
                ['text' => 'VGFrZSB0aGUgcXVpZXQgc2lkZSB0cmFpbA==', 'next' => '2_side'],
            ],
        ],
        '2_main' => [
            'prose'  => 'VGhlIHBpbGdyaW0gcm91dGUgY2xpbWJzIGluIGVhc3ksIHdlbGwtbWFpbnRhaW5lZCBzdGFnZXMsIHN0b25lIGxhbnRlcm5zIG1hcmtpbmcgZGlzdGFuY2UgYXQgcmVndWxhciBpbnRlcnZhbHMsIG90aGVyIHZpc2l0b3JzIHBhc3Npbmcgb2NjYXNpb25hbGx5IHdpdGggdGhlIHF1aWV0LCByZXNwZWN0ZnVsIG5vZHMgb2YgcGVvcGxlIHNoYXJpbmcgYSBnZW51aW5lbHkgbWVhbmluZ2Z1bCBzcGFjZS4gSXQncyBhIGdlbnRsZSBjbGltYiwgdW5odXJyaWVkLCBnaXZpbmcgeW91IHJlYWwgdGltZSB0byBub3RpY2UgdGhlIG1vdW50YWluJ3MgcGFydGljdWxhciBzdGlsbG5lc3MuCgpZb3UgYXJyaXZlIGF0IHRoZSBzaHJpbmUgaXRzZWxmIGZlZWxpbmcgcHJvcGVybHksIGdyYWR1YWxseSBwcmVwYXJlZCBmb3IgaXQsIHJhdGhlciB0aGFuIHNpbXBseSBhcnJpdmluZy4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHNocmluZQ==', 'next' => '3_shared'],
            ],
        ],
        '2_side' => [
            'prose'  => 'VGhlIHNpZGUgdHJhaWwgaXMgc3RlZXBlciwgcXVpZXRlciwgZW50aXJlbHkgd2l0aG91dCB0aGUgcGlsZ3JpbSByb3V0ZSdzIGNhcmVmdWwgd2F5bWFya2luZywgd2luZGluZyB0aHJvdWdoIGZvcmVzdCBzbyBzdGlsbCB5b3UgY2FuIGhlYXIgaW5kaXZpZHVhbCBsZWF2ZXMgc2V0dGxpbmcuIEl0IGZlZWxzLCBzb21laG93LCBtb3JlIHByaXZhdGUg4oCUIGEgcGF0aCB1c2VkIGJ5IHBlb3BsZSB3aG8gYWxyZWFkeSBrbm93IGV4YWN0bHkgd2hlcmUgdGhleSdyZSBnb2luZyByYXRoZXIgdGhhbiBiZWluZyBndWlkZWQgdGhlcmUuCgpZb3UgYXJyaXZlIGF0IHRoZSBzaHJpbmUgc2xpZ2h0bHkgd2luZGVkIGFuZCBjb25zaWRlcmFibHkgbW9yZSBhd2FyZSBvZiB0aGUgbW91bnRhaW4ncyBvd24gcGFydGljdWxhciBzaWxlbmNlLg==',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIHNocmluZQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'VGhlIHNocmluZSdzIGNhcmV0YWtlciwgYW4gb2xkZXIgbWFuIG5hbWVkIEhpcm9zaGksIGdyZWV0cyB5b3Ugd2l0aCBjYXJlZnVsLCB1bmh1cnJpZWQgY291cnRlc3ksIGFuZCBsaXN0ZW5zIHRvIHlvdXIgZXhwbGFuYXRpb24gd2l0aCByZWFsIGF0dGVudGlvbiBiZWZvcmUgbGVhZGluZyB5b3UgdG8gYSBzbWFsbCBzaWRlIGJ1aWxkaW5nLiBUaGVyZSwga2VwdCBvbiBhIG1vZGVzdCBhbHRhciBhbG9uZ3NpZGUgb2ZmZXJpbmdzIG9mIHJpY2UgYW5kIGZvbGRlZCBwYXBlciwgc2l0cyB0aGUgaW5zdHJ1bWVudCdzIGZvbGRpbmcgc3RhbmQuCgonQSB2aXNpdG9yIGxlZnQgaXQgaGVyZSwgbWFueSB5ZWFycyBhZ28sJyBIaXJvc2hpIHNheXMuICdXZSBkaWRuJ3Qga25vdyBpdHMgcHVycG9zZSwgb25seSB0aGF0IGhlIHNlZW1lZCB0byBjb25zaWRlciBpdCBpbXBvcnRhbnQsIGFuZCB0aGF0IGl0IGRlc2VydmVkIGNhcmVmdWwga2VlcGluZy4gU28gd2Uga2VwdCBpdCwgYXMgd2Uga2VlcCBhbnl0aGluZyBsZWZ0IGhlcmUgaW4gdGhhdCBzcGlyaXQg4oCUIHJlc3BlY3RmdWxseSwgd2l0aG91dCBmdWxseSB1bmRlcnN0YW5kaW5nLCB0cnVzdGluZyB0aGUgbWVhbmluZyB3b3VsZCBtYXR0ZXIgdG8gc29tZW9uZSBldmVudHVhbGx5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'RXhwbGFpbiB3aGF0IGl0IGFjdHVhbGx5IGlz', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SGlyb3NoaSBsaXN0ZW5zIHRvIHRoZSBmdWxsIGV4cGxhbmF0aW9uIHdpdGggZ2VudWluZSBpbnRlcmVzdCwgdGhlbiBvZmZlcnMgdHdvIHdheXMgZm9yd2FyZDogaGVscCB3aXRoIHRoZSBzaHJpbmUncyBvbmdvaW5nIG1haW50ZW5hbmNlLCBzd2VlcGluZyBhbmQgdGVuZGluZyB0aGUgZ3JvdW5kcyB0aGUgd2F5IGl0J3MgYmVlbiB0ZW5kZWQgZm9yIGdlbmVyYXRpb25zLCBvciBwcm9wZXJseSBwYXJ0aWNpcGF0ZSBpbiB0aGUgc2hyaW5lJ3Mgc2ltcGxlIHB1cmlmaWNhdGlvbiByaXR1YWwgYmVmb3JlIG1ha2luZyB5b3VyIHJlcXVlc3QgZm9ybWFsbHksIHJhdGhlciB0aGFuIHNpbXBseSBhc2tpbmcgYXMgYSBzdHJhbmdlciBtaWdodC4KCidFaXRoZXIgc2hvd3MgcmVhbCByZXNwZWN0LCcgaGUgc2F5cy4gJ1RoZSBtb3VudGFpbiBkb2Vzbid0IG11Y2ggY2FyZSB3aGljaCwgb25seSB0aGF0IGl0J3MgZ2VudWluZS4n',
            'choices' => [
                ['text' => 'SGVscCBtYWludGFpbiB0aGUgc2hyaW5lIGdyb3VuZHM=', 'next' => '5_maintain'],
                ['text' => 'UGFydGljaXBhdGUgaW4gdGhlIHB1cmlmaWNhdGlvbiByaXR1YWw=', 'next' => '5_ritual'],
            ],
        ],
        '5_maintain' => [
            'prose'  => 'U3dlZXBpbmcgYW5kIHRlbmRpbmcgdGhlIHNocmluZSBncm91bmRzIGlzIHNpbXBsZSwgcmVwZXRpdGl2ZSwgcXVpZXRseSBtZWRpdGF0aXZlIHdvcmssIHRoZSBwYXJ0aWN1bGFyIHJoeXRobSBvZiB0aGUgYnJvb20gYWdhaW5zdCBzdG9uZSBzZXR0bGluZyBzb21ldGhpbmcgaW4geW91IHRoYXQgdGhlIHdob2xlIGpvdXJuZXkncyBjb25zdGFudCBtb3Rpb24gaGFzbid0IHF1aXRlIG1hbmFnZWQgdG8gc2V0dGxlIGJlZm9yZSBub3cuIEhpcm9zaGkgd29ya3MgYWxvbmdzaWRlIHlvdSB3aXRob3V0IG11Y2ggY29udmVyc2F0aW9uLCBjb3JyZWN0aW5nIG5vdGhpbmcsIHNpbXBseSBwcmVzZW50LgoKQnkgdGhlIGVuZCwgdGhlIGdyb3VuZHMgYXJlIHByb3Blcmx5LCB2aXNpYmx5IGNhcmVkIGZvciwgYW5kIHNvbWV0aGluZyBpbiB0aGUgc2hhcmVkIHF1aWV0IGxhYm91ciBoYXMgc2FpZCBtb3JlIHRoYW4gYW55IGFtb3VudCBvZiBleHBsYW5hdGlvbiBjb3VsZCBoYXZlLg==',
            'choices' => [
                ['text' => 'U2VlIEhpcm9zaGkncyBkZWNpc2lvbg==', 'next' => '6_shared'],
            ],
        ],
        '5_ritual' => [
            'prose'  => 'VGhlIHB1cmlmaWNhdGlvbiByaXR1YWwgaXMgc2ltcGxlLCBwcmVjaXNlLCBwZXJmb3JtZWQgZXhhY3RseSBhcyBIaXJvc2hpIGRlbW9uc3RyYXRlcyB3aXRob3V0IG11Y2ggdmVyYmFsIGV4cGxhbmF0aW9uIOKAlCB3YXRlciwgY2FyZWZ1bCBtb3ZlbWVudCwgYSBzcGVjaWZpYyB1bmh1cnJpZWQgYXR0ZW50aXZlbmVzcyB0aGF0IGFza3MgeW91IHRvIGFjdHVhbGx5IHNsb3cgZG93biByYXRoZXIgdGhhbiBzaW1wbHkgZ28gdGhyb3VnaCBtb3Rpb25zLgoKQnkgdGhlIGVuZCwgeW91IHVuZGVyc3RhbmQsIGF0IGxlYXN0IGEgbGl0dGxlLCB3aHkgYSBwbGFjZSBsaWtlIHRoaXMgYXNrcyBmb3IgdGhpcyBwYXJ0aWN1bGFyIGtpbmQgb2YgY2FyZWZ1bCBhdHRlbnRpb24gYmVmb3JlIGFueXRoaW5nIGVsc2Ug4oCUIGEgZ2VudWluZSwgZW1ib2RpZWQgcmVxdWVzdCByYXRoZXIgdGhhbiBtZXJlIHdvcmRzLg==',
            'choices' => [
                ['text' => 'U2VlIEhpcm9zaGkncyBkZWNpc2lvbg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SGlyb3NoaSBicmluZ3MgdGhlIGZvbGRpbmcgc3RhbmQgZG93biBmcm9tIHRoZSBhbHRhciBoaW1zZWxmLCB3cmFwcGluZyBpdCB3aXRoIHJlYWwgY2FyZSBpbiBmcmVzaCBjbG90aCBiZWZvcmUgcGxhY2luZyBpdCBpbiB5b3VyIGhhbmRzLiAnSXQgaGFzIGJlZW4gaG9ub3VyZWQgaGVyZSwnIGhlIHNheXMuICdOb3cgaXQgY29udGludWVzIGJlaW5nIGhvbm91cmVkLCBkaWZmZXJlbnRseSwgYnkgYWN0dWFsbHkgYmVpbmcgdXNlZCBmb3Igd2hhdCBpdCB3YXMgbWFkZSBmb3IuIFRoYXQgc2VlbXMgcmlnaHQuIEFuIG9iamVjdCB3YW50cyBpdHMgcHVycG9zZSwgdGhlIHNhbWUgYXMgYW55dGhpbmcgbGl2aW5nIGRvZXMuJw==',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGhlYWQgYmFjayBkb3duIHdoaWNoZXZlciBwYXRoIHlvdSBkaWRuJ3QgdGFrZSBvbiB0aGUgd2F5IHVwLCBtaXN0IGJlZ2lubmluZyB0byBnYXRoZXIgYWdhaW4gaW4gdGhlIHZhbGxleXMgYmVsb3cgYXMgYWZ0ZXJub29uIHdlYXJzIHRvd2FyZCBldmVuaW5nLCB0aGUgZm9sZGluZyBzdGFuZCBzZWN1cmUgaW4gdGhlIGNhc2Ug4oCUIGEgdGhpcnRlZW50aCBwaWVjZSwgbW9yZSB0aGFuIGhhbGYgdGhlIHdob2xlIGluc3RydW1lbnQgbm93IGdlbnVpbmVseSByZXN0b3JlZC4KCkdyZXRhIHN0dWRpZXMgdGhlIHN0YW5kJ3MgY2FyZWZ1bCBvbGQgd3JhcHBpbmcgY2xvdGgsIGEgc21hbGwgaGFuZHdyaXR0ZW4gbm90ZSB0dWNrZWQgaW5zaWRlIGl0IHRoYXQgSGlyb3NoaSBpbmNsdWRlZCB3aXRob3V0IGNvbW1lbnQuICdIZSB3cm90ZSBzb21ldGhpbmcuIEluIHlvdXIgZ3JhbmRmYXRoZXIncyBsYW5ndWFnZSwgbm90IG91cnMuJw==',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgbm90ZSBhbG91ZA==', 'next' => '8_end_read'],
                ['text' => 'U2F2ZSBpdCBmb3Igc29tZXdoZXJlIHF1aWV0ZXI=', 'next' => '8_end_save'],
            ],
        ],
        '8_end_read' => [
            'prose'  => 'WW91IHJlYWQgaXQgdGhlcmUsIG9uIHRoZSBtb3VudGFpbnNpZGUsIG1pc3QgY3VybGluZyBhcm91bmQgeW91ciBib290cy4gSXQncyBzaG9ydDogKkxlZnQgdGhpcyB3aXRoIHBlb3BsZSB3aG8nZCBhY3R1YWxseSBrZWVwIGl0IHByb3Blcmx5LCByYXRoZXIgdGhhbiBzaW1wbHkga2VlcCBpdC4gVGhhdCdzIHRoZSBvbmx5IGtpbmQgb2Yga2VlcGluZyB3b3J0aCBhbnl0aGluZy4qIE5vIHNpZ25hdHVyZSBiZXlvbmQgaGlzIGluaXRpYWwsIGJ1dCB0aGUgaGFuZHdyaXRpbmcgaXMgdW5taXN0YWthYmx5IGhpcy4KCkl0J3Mgbm90IG5ldyBpbmZvcm1hdGlvbiwgZXhhY3RseS4gQnV0IGhlYXJpbmcgaGlzIG93biB2b2ljZSBhZ2FpbiwgaG93ZXZlciBicmllZmx5LCBmZWVscyBsaWtlIGl0cyBvd24gc21hbGwsIGdlbnVpbmUgZ2lmdC4=',
            'ending' => true,
        ],
        '8_end_save' => [
            'prose'  => 'WW91IGZvbGQgdGhlIG5vdGUgYXdheSB1bnJlYWQgZm9yIG5vdywgZGVjaWRpbmcgdGhlIG1vdW50YWluJ3MgbWlzdCBhbmQgdGhlIGRheSdzIGxvbmcgY2xpbWIgaGF2ZSBlYXJuZWQgYSBxdWlldGVyIG1vbWVudCB0aGFuIHRoaXMgZm9yIHdoYXRldmVyIGhlIHdyb3RlLgoKVGhlIENvbnRvdXIgbGlmdHMgb2ZmIHRoZSBzaHJpbmUncyBjYXJlZnVsIHN0aWxsbmVzcywgdG9yaWkgZ2F0ZSBhbmQgc3RvbmUgbGFudGVybnMgcmVjZWRpbmcgaW50byBtaXN0IGJlbG93LCBhbmQgeW91IGZpbmQgeW91cnNlbGYgZ2xhZCwgdGhpcyB0aW1lLCB0byBiZSBjYXJyeWluZyBzb21ldGhpbmcgZm9yd2FyZCByYXRoZXIgdGhhbiBuZWVkaW5nIHRvIGltbWVkaWF0ZWx5IHVucGFjayBpdC4=',
            'ending' => true,
        ],
    ],
];
