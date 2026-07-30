<?php
return [
    'id'    => 19,
    'title' => 'Never Mine To Make',
    'color' => '#4A4A7A',

    'pages' => [
        '1_start' => [
            'prose'  => 'V2VzdGhhdmVsbGFuZCdzIGZsYXQgR2VybWFuIGNvdW50cnlzaWRlIHN0cmV0Y2hlcyBvdXQgYmVuZWF0aCBvbmUgb2YgRXVyb3BlJ3Mgb2xkZXN0IGRlc2lnbmF0ZWQgZGFyay1za3kgcmVzZXJ2ZXMsIHF1aWV0IGZpZWxkcyBnaXZpbmcgd2F5IHRvIHByb3Blcmx5IGRlZXAgZGFya25lc3MgYXMgdGhlIFF1aWV0IEhvdXIgZGVzY2VuZHMgdG93YXJkIGEgc21hbGwgY2x1c3RlciBvZiBidWlsZGluZ3MuIFByaXlhIGNoZWNrcyBoZXIgaW5zdHJ1bWVudHMsIHRoZW4gZ2xhbmNlcyBhdCB5b3Ugc2VyaW91c2x5LiAnVm9zcyBpcyBoZXJlIGFnYWluLCcgc2hlIHNheXMuICdCdXQgc28gaXMgc29tZW9uZSBlbHNlIOKAlCBhIHdvbWFuIGhlJ3MgYXBwYXJlbnRseSBiZWVuIHRyeWluZyB0byB0cmFjayBkb3duIGZvciB3ZWVrcy4nCgpUd28gcm91dGVzIHRvd2FyZCB0aGUgYnVpbGRpbmdzIHByZXNlbnQgdGhlbXNlbHZlczogcGFzdCBhIHJvdyBvZiBvbGQgd2luZG1pbGxzLCBvciBhbG9uZyBhIHN0cmFpZ2h0IGZhcm0gdHJhY2su',
            'choices' => [
                ['text' => 'V2FsayBwYXN0IHRoZSBvbGQgd2luZG1pbGxz', 'next' => '2_windmills'],
                ['text' => 'VGFrZSB0aGUgc3RyYWlnaHQgZmFybSB0cmFjaw==', 'next' => '2_farmtrack'],
            ],
        ],
        '2_windmills' => [
            'prose'  => 'VGhlIHJvdyBvZiBvbGQgd2luZG1pbGxzIHN0YW5kcyBkYXJrIGFuZCBzdGlsbCBhZ2FpbnN0IHRoZSBkZWVwZW5pbmcgc2t5LCB0aGVpciBzbG93LCBoaXN0b3JpYyBzaWxob3VldHRlcyBvZGRseSBwZWFjZWZ1bCBhZ2FpbnN0IHRoZSByZXNlcnZlJ3MgZmFtb3VzIGRhcmtuZXNzLiBZb3Ugd2FsayBwYXN0IHRoZW0gYXQgYW4gZWFzeSBwYWNlLCB2b2ljZXMgYXVkaWJsZSBhaGVhZCBuZWFyIHRoZSBjbHVzdGVyIG9mIGJ1aWxkaW5ncy4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGJ1aWxkaW5ncw==', 'next' => '3_shared'],
            ],
        ],
        '2_farmtrack' => [
            'prose'  => 'VGhlIHN0cmFpZ2h0IGZhcm0gdHJhY2sgY3V0cyBkaXJlY3RseSBhY3Jvc3MgZmxhdCwgcXVpZXQgZmllbGRzLCB0aGUgcmVzZXJ2ZSdzIGRhcmtuZXNzIHNldHRsaW5nIGluIHByb3Blcmx5IHdpdGggZXZlcnkgc3RlcCBhd2F5IGZyb20gYW55IHN0cmF5IGxpZ2h0LiBZb3UgcmVhY2ggdGhlIGJ1aWxkaW5ncyBwcm9tcHRseSwgdm9pY2VzIGNhcnJ5aW5nIGNsZWFybHkgYWNyb3NzIHRoZSBzdGlsbCBldmVuaW5nIGFpci4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggdGhlIGJ1aWxkaW5ncw==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SW5zaWRlLCB5b3UgZmluZCBWb3NzIHNlYXRlZCBhY3Jvc3MgZnJvbSBhbiBvbGRlciB3b21hbiwgbGlzdGVuaW5nIHdpdGggYW4gaW50ZW5zaXR5IHlvdSd2ZSBuZXZlciBvbmNlIHNlZW4gZnJvbSBoaW0gYmVmb3JlLiBTaGUgaW50cm9kdWNlcyBoZXJzZWxmIGFzIEdyZXRhLCBvbmUgb2YgQ29yd2luJ3MgYWN0dWFsIHNreS1yaWRkbGUgc3R1ZGVudHMsIGRlY2FkZXMgYWdvLCBub3cgZ3Jvd24gYW5kIHN0aWxsIGNhcnJ5aW5nIGhpcyBsZXNzb25zIGZvcndhcmQuIFZvc3MgbG9va3MgdXAgYXMgeW91IGVudGVyLCBzb21ldGhpbmcgaW4gaGlzIGZhY2UgZW50aXJlbHkgdW5saWtlIGhpcyB1c3VhbCBjb21wb3NlZCBjZXJ0YWludHkuCgonU2hlJ3MganVzdCBleHBsYWluZWQgc29tZXRoaW5nIHRvIG1lLCcgaGUgc2F5cyBxdWlldGx5LiAnUHJvcGVybHkuIEZvciB0aGUgZmlyc3QgdGltZSwgSSB0aGluayBJIGFjdHVhbGx5IHVuZGVyc3RhbmQgd2hhdCBJJ3ZlIGJlZW4gY2hhc2luZy4n',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIHdoYXQgR3JldGEgdG9sZCBoaW0=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'R3JldGEgZXhwbGFpbnMgcGxhaW5seSwgZm9yIHlvdXIgYmVuZWZpdCB0b286IENvcndpbiBkaWRuJ3QgbGVhdmUgdGhvc2UgYmxhbmsgcGF0Y2hlcyBhcyBhbiBhY2FkZW1pYyBwdXp6bGUgb3IgYSB2YWx1YWJsZSBhcnRpZmFjdC1pbi13YWl0aW5nLiBIZSBsZWZ0IHRoZW0gYXMgYW4gaW52aXRhdGlvbiDigJQgbWVhbnQgZm9yIGZhbWlseSwgbWVhbnQgdG8gYmUgZWFybmVkIHRocm91Z2ggbGlzdGVuaW5nLCBtZWFudCB0byBlbmQgc29tZXdoZXJlIHNwZWNpZmljIGFuZCBwZXJzb25hbCwgbm90IGluIGEgdW5pdmVyc2l0eSBhcmNoaXZlIGdhdGhlcmluZyBzY2hvbGFybHkgYXR0ZW50aW9uLgoKJ0kgdG9sZCBoaW0gdGhlIHNhbWUgdGhpbmcgSSd2ZSBqdXN0IHRvbGQgeW91LCcgc2hlIHNheXMgdG8gVm9zcy4gJ0FuIG9iamVjdCBjYW4gYmUgc3R1ZGllZC4gQSBtZXNzYWdlIGNhbid0IGJlLCBub3QgcHJvcGVybHkuIE5vdCB3aXRob3V0IG1pc3NpbmcgdGhlIGVudGlyZSBwb2ludCBvZiBpdC4n',
            'choices' => [
                ['text' => 'V2F0Y2ggaG93IFZvc3MgcmVjZWl2ZXMgdGhpcw==', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'Vm9zcyBzaXRzIHdpdGggdGhhdCBmb3IgYSBsb25nLCBxdWlldCBtb21lbnQsIHNvbWV0aGluZyB2aXNpYmx5IHNldHRsaW5nIGluIGhpbSB0aGF0J3MgYmVlbiByZXNpc3Rpbmcgc2V0dGxpbmcgZm9yIHRoZSBlbnRpcmUgam91cm5leSBzbyBmYXIuICdJJ3ZlIHNwZW50IG1vbnRocyB0cmVhdGluZyB0aGlzIGFzIGEgZG9jdW1lbnQgdG8gYWNxdWlyZSwnIGhlIGZpbmFsbHkgc2F5cywgbW9zdGx5IHRvIGhpbXNlbGYuICdOZXZlciBvbmNlIGFza2VkIHdoYXQgaXQgd2FzIGFjdHVhbGx5IGZvci4gVGhhdCdzIGEgcmF0aGVyIHNpZ25pZmljYW50IGZhaWx1cmUgb2Ygc2Nob2xhcnNoaXAsIG5vdyB0aGF0IEkgcHJvcGVybHkgdGhpbmsgYWJvdXQgaXQuJwoKSGUgbG9va3MgdXAgYXQgeW91IGRpcmVjdGx5LiAnSSdtIHdpdGhkcmF3aW5nIG15IGNsYWltLiBGb3JtYWxseS4gSXQgd2FzIG5ldmVyIG1pbmUgdG8gbWFrZS4n',
            'choices' => [
                ['text' => 'QWNjZXB0IGhpcyB3aXRoZHJhd2Fs', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'WW91IGFjY2VwdCBpdCBwbGFpbmx5LCBhbmQgc29tZXRoaW5nIGluIHRoZSByb29tJ3Mgd2hvbGUgdGVuc2lvbiBmaW5hbGx5LCBwcm9wZXJseSByZWxlYXNlcy4gR3JldGEgd2F0Y2hlcyB0aGUgZXhjaGFuZ2Ugd2l0aCBxdWlldCBzYXRpc2ZhY3Rpb24sIGNsZWFybHkgZ2xhZCB0byBoYXZlIGZpbmFsbHkgZ290dGVuIHRocm91Z2ggdG8gaGltIHdoZXJlIG1vbnRocyBvZiB5b3VyIG93biByZXNpc3RhbmNlIGhhZG4ndCBxdWl0ZSBtYW5hZ2VkIGl0IGFsb25lLiBWb3NzIGRvZXNuJ3QgYXNrIHRvIGpvaW4geW91IG9uIHRoZSByZXN0IG9mIHRoZSBqb3VybmV5IOKAlCB0aGF0IHdhcyBuZXZlciByZWFsbHkgdGhlIG9mZmVyIOKAlCBidXQgdGhlIGFkdmVyc2FyaWFsIHdlaWdodCBoZSdzIGNhcnJpZWQgc2luY2UgdGhlIFRpYmV0YW4gUGxhdGVhdSB2aXNpYmx5LCBnZW51aW5lbHkgbGlmdHMuCgpHcmV0YSB0dXJucyB0byB0aGUgYWN0dWFsIHJpZGRsZSB0aGVuLCBzaGFyaW5nIHRoaXMgcGF0Y2gncyBjb25zdGVsbGF0aW9uIHdpdGggdGhlIHNhbWUgY2FyZWZ1bCB3YXJtdGggc2hlIGNsZWFybHkgbGVhcm5lZCBmcm9tIENvcndpbiBoaW1zZWxmLg==',
            'choices' => [
                ['text' => 'RHJhdyB0aGUgY29uc3RlbGxhdGlvbiBpbnRvIHRoZSBhdGxhcw==', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IGRyYXcgdGhlIGNvbnN0ZWxsYXRpb24gaW50byB0aGUgYXRsYXMgcHJvcGVybHksIFZvc3Mgd2F0Y2hpbmcgZnJvbSBhIHJlc3BlY3RmdWwgZGlzdGFuY2Ugbm93IHJhdGhlciB0aGFuIGEgaHVuZ3J5IG9uZSwgc29tZXRoaW5nIHNldHRsZWQgYW5kIGFsbW9zdCBwZWFjZWZ1bCBpbiBoaXMgZXhwcmVzc2lvbiB0aGF0J3MgYmVlbiBlbnRpcmVseSBhYnNlbnQgZXZlcnkgcHJldmlvdXMgZW5jb3VudGVyLiBHcmV0YSBhZGRzIGhlciBvd24gbm90ZSBiZXNpZGUgdGhlIGZpbmlzaGVkIHBhZ2UsIHRoZW4gb2ZmZXJzIHlvdSBhIHNtYWxsLCB3YXJtIG5vZCBvZiBoZXIgb3duLgoKJ1lvdXIgZ3JlYXQtdW5jbGUgd291bGQgYmUgZ2xhZCwnIHNoZSBzYXlzLiAnTm90IGp1c3QgYWJvdXQgdGhlIHBhZ2UuIEFib3V0IGFsbCBvZiB0aGlzLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGVyIGFuZCBzdGFydCBiYWNr', 'next' => '8_shared'],
            ],
        ],
        '8_shared' => [
            'prose'  => 'WW91IHN0ZXAgYmFjayBvdXQgaW50byBXZXN0aGF2ZWxsYW5kJ3MgZmFtb3VzIGRhcmtuZXNzLCB0aGUgcmVzZXJ2ZSdzIG9sZCB3aW5kbWlsbHMgc3RhbmRpbmcgc2lsZW50IGFnYWluc3QgYSBza3kgdGhpY2sgd2l0aCBzdGFycywgVm9zcydzIHF1aWV0LCBjaGFuZ2VkIHByZXNlbmNlIHN0aWxsIGZhaW50bHkgdW5zZXR0bGluZyBiZWhpbmQgeW91IGluIHRoZSBiZXN0IHBvc3NpYmxlIHdheS4gUHJpeWEncyB3YWl0aW5nIHdpdGggdGhlIHRoZXJtb3MsIGhhdmluZyBjbGVhcmx5IGhlYXJkIGF0IGxlYXN0IHNvbWUgb2Ygd2hhdCBoYXBwZW5lZCBpbnNpZGUuCgonSGUgYWN0dWFsbHkgd2l0aGRyZXc/JyBzaGUgYXNrcywgc3RpbGwgZmFpbnRseSBkaXNiZWxpZXZpbmcu',
            'choices' => [
                ['text' => 'U2F5IHlvdSBnZW51aW5lbHkgYmVsaWV2ZSB0aGUgY2hhbmdlIGlzIHJlYWwgdGhpcyB0aW1l', 'next' => '9_end_believe'],
                ['text' => 'U2F5IHlvdSdsbCBzdGlsbCB3YXRjaCB5b3VyIGJhY2sgcmVnYXJkbGVzcw==', 'next' => '9_end_cautious'],
            ],
        ],
        '9_end_believe' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIGdlbnVpbmVseSBiZWxpZXZlIHRoZSBjaGFuZ2UgaXMgcmVhbCB0aGlzIHRpbWUsJyB5b3Ugc2F5LCB0aGlua2luZyBvZiBWb3NzJ3MgcXVpZXQsIHVuZ3VhcmRlZCBleHByZXNzaW9uLCBzbyB1bmxpa2UgZXZlcnkgcHJldmlvdXMgZW5jb3VudGVyLiAnR3JldGEgZ290IHRocm91Z2ggdG8gaGltIHByb3Blcmx5LiBGZWVscyBsaWtlIHNvbWV0aGluZyBhY3R1YWxseSBzaGlmdGVkLCBub3QganVzdCBzb2Z0ZW5lZCBmb3Igc2hvdy4nCgpQcml5YSBub2RzIHNsb3dseSwgc29tZXRoaW5nIGxpa2UgcmVsaWVmIGluIGl0LiAnR29vZC4gT25lIGxlc3MgdGhpbmcgdG8gd2F0Y2ggZm9yLCB0aGUgcmVzdCBvZiB0aGUgd2F5LiBOaWNlLCBhY3R1YWxseSwgc2VlaW5nIHNvbWVvbmUgY2hhbmdlIHByb3Blcmx5IG1pZC1qb3VybmV5IGxpa2UgdGhhdC4n',
            'ending' => true,
        ],
        '9_end_cautious' => [
            'prose'  => 'J0hvbmVzdGx5LCBJJ2xsIHN0aWxsIHdhdGNoIG15IGJhY2sgcmVnYXJkbGVzcywnIHlvdSBhZG1pdCwgdGhpbmtpbmcgb2YgbW9udGhzIG9mIGhpcyBjb29sLCBwZXJzaXN0ZW50IHB1cnN1aXQgYmVmb3JlIHRvbmlnaHQuICdPbmUgcXVpZXQgY29udmVyc2F0aW9uIGlzIGEgZ29vZCBzaWduLiBJdCdzIG5vdCBxdWl0ZSB0aGUgc2FtZSBhcyBtb250aHMgb2YgcHJvb2YuJwoKUHJpeWEgZG9lc24ndCBhcmd1ZSB0aGUgY2F1dGlvbi4gJ0ZhaXIgZW5vdWdoLiBCZWxpZXZlIGl0IHdoZW4gaXQgaG9sZHMuIERvZXNuJ3QgY29zdCB1cyBhbnl0aGluZyB0byBzdGF5IGNhcmVmdWwgYSB3aGlsZSBsb25nZXIuJyBUaGUgUXVpZXQgSG91ciBsaWZ0cyBnZW50bHkgb2ZmIFdlc3RoYXZlbGxhbmQncyBmbGF0LCBzdGFyLXRoaWNrIGNvdW50cnlzaWRlLCBvbGQgd2luZG1pbGxzIHNocmlua2luZyBpbnRvIHRoZSBkZWVwLCBxdWlldCBkYXJrIGJlaGluZCB5b3Uu',
            'ending' => true,
        ],
    ],
];
