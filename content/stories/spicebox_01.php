<?php
return [
    'id'    => 1,
    'title' => 'Add the Last —',
    'color' => '#8A4A2A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VGhlIGtpdGNoZW4gc3RpbGwgc21lbGxzIGxpa2UgaGVyLCBmYWludGx5LCB1bmRlciB0aGUgZHVzdCBzaGVldHMgYW5kIHRoZSBjb2xkIOKAlCByb3NlbWFyeSBhbmQgYnJvd25lZCBidXR0ZXIsIHRoZSBwYXJ0aWN1bGFyIHdhcm10aCBvZiBhIHJvb20gdGhhdCBoYXNuJ3QgcHJvcGVybHkgYmVlbiBjb29rZWQgaW4gc2luY2UgdGhlIGZ1bmVyYWwuIFlvdSd2ZSBwdXQgb2ZmIGNsZWFyaW5nIGhlciBjdXBib2FyZHMgZm9yIHRocmVlIG1vbnRocy4gVGhlIGxhd3llcidzIGZpbmFsIGxldHRlciBhYm91dCB0aGUgaG91c2UsIHVub3BlbmVkIHR3aWNlLCBoYXMgZmluYWxseSBtYWRlIGZ1cnRoZXIgcHV0dGluZy1vZmYgaW1wb3NzaWJsZS4KClR3byB0aGluZ3Mgd2FpdCBvbiB0aGUgY291bnRlciBleGFjdGx5IHdoZXJlIHNoZSBsZWZ0IHRoZW06IGEgc21hbGwsIGNvbXBhcnRtZW50ZWQgd29vZGVuIHNwaWNlIGJveCwgbW9zdCBvZiBpdHMgd2VsbHMgZW1wdHksIGFuZCBhIGhhbmR3cml0dGVuIHJlY2lwZSBjYXJkLCBpbmsgZmFkZWQsIG9uZSB3aG9sZSBzZWN0aW9uIHRyYWlsaW5nIG9mZiBtaWQtc2VudGVuY2Ug4oCUIGFzIHRob3VnaCBzaGUnZCBzaW1wbHkgc2V0IHRoZSBwZW4gZG93biBvbmUgYWZ0ZXJub29uIGFuZCBuZXZlciBmaW5pc2hlZCB0aGUgdGhvdWdodC4KCllvdSBjb3VsZCBzdGFydCB3aXRoIGVpdGhlci4=',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgdW5maW5pc2hlZCByZWNpcGUgY2FyZCBmaXJzdA==', 'next' => '2_card'],
                ['text' => 'T3BlbiB0aGUgc3BpY2UgYm94IGZpcnN0', 'next' => '2_box'],
            ],
        ],
        '2_card' => [
            'prose'  => 'VGhlIHJlY2lwZSBpcyBoZXIgaGFuZCBleGFjdGx5IOKAlCBjYXJlZnVsLCBsb29waW5nLCB0aGUgaGFuZHdyaXRpbmcgb2Ygc29tZW9uZSB3aG8gd3JvdGUgb3V0IGEgdGhvdXNhbmQgc2hvcHBpbmcgbGlzdHMgYW5kIG9ubHkgb2NjYXNpb25hbGx5IGFueXRoaW5nIG1lYW50IHRvIGxhc3QuIEl0IHJlYWRzIGNsZWFybHkgZW5vdWdoIHVudGlsIGl0IGRvZXNuJ3Q6IGluZ3JlZGllbnRzLCBtZXRob2QsIGFuZCB0aGVuLCBhYnJ1cHRseSwgbm90aGluZy4gKkFkZCB0aGUgbGFzdCDigJQqIHRoZSBzZW50ZW5jZSBzaW1wbHkgc3RvcHMuCgpTaGUgbmV2ZXIgdG9sZCB5b3Ugd2hhdCAndGhlIGxhc3QnIHdhcyBzdXBwb3NlZCB0byBiZS4gWW91J3JlIG5vdCBzdXJlLCByZWFkaW5nIGl0IG5vdywgdGhhdCBzaGUgZXZlciBmaW5pc2hlZCBkZWNpZGluZy4=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQncyBhY3R1YWxseSBtaXNzaW5nIGZyb20gdGhlIGJveA==', 'next' => '3_shared'],
            ],
        ],
        '2_box' => [
            'prose'  => 'VGhlIGJveCBpcyB3b3JzZSB0aGFuIHlvdSBleHBlY3RlZCDigJQgYSBkb3plbiBzbWFsbCBjb21wYXJ0bWVudHMsIG1vc3Qgb2YgdGhlbSBiYXJlLCBhIGZldyBob2xkaW5nIHNwaWNlcyBzbyBvbGQgdGhleSd2ZSBsb3N0IHdoYXRldmVyIHNjZW50IHRoZXkgb25jZSBoYWQuIFdoYXRldmVyIGRpc2ggdGhpcyBib3ggd2FzIGJ1aWx0IHRvIHNlYXNvbiwgaXQncyBiZWVuIGluY29tcGxldGUgZm9yIGEgdmVyeSBsb25nIHRpbWUsIG9uZSBlbXB0eSB3ZWxsIGF0IGEgdGltZSwgbG9uZyBiZWZvcmUgc2hlIGRpZWQuCgpUdWNrZWQgdW5kZXIgdGhlIG9uZSBmdWxsIGNvbXBhcnRtZW50LCBhIHNjcmFwIG9mIHBhcGVyIGluIGhlciBoYW5kOiBhIGxpc3Qgb2YgcGxhY2VzIGFuZCBuYW1lcywgaGFsZiBvZiB0aGVtIGNyb3NzZWQgb3V0LCBub25lIG9mIHRoZW0gZXhwbGFpbmVkLg==',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIHVuZmluaXNoZWQgcmVjaXBlIHNheXM=', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgY2FtZSB0byBpdCwgdGhlIHNoYXBlIG9mIHRoZSB0aGluZyBpcyB0aGUgc2FtZTogYSBzcGljZSBib3ggbW9zdGx5IGVtcHR5LCBhIHJlY2lwZSB0aGF0IG5ldmVyIGdvdCBmaW5pc2hlZCwgYW5kIGEgbGlzdCBvZiBwbGFjZXMgc2NhdHRlcmVkIGhhbGZ3YXkgcm91bmQgdGhlIHdvcmxkLCBlYWNoIG9uZSBwcmVzdW1hYmx5IGhvbGRpbmcgc29tZSBwYXJ0IG9mIHdoYXQncyBtaXNzaW5nLiBUaGlydHkgeWVhcnMgb2YgU3VuZGF5IHN1cHBlcnMsIGJ5IHRoZSBsb29rIG9mIGl0LCBhbmQgb25lIGRpc2ggbmV2ZXIgcXVpdGUgY29tcGxldGVkLgoKWW91J3JlIHN0aWxsIHR1cm5pbmcgdGhlIGxpc3Qgb3ZlciBpbiB5b3VyIGhhbmRzLCBhZGRpbmcgdXAgZXhhY3RseSBob3cgbGFyZ2UgYSB0YXNrIHRoaXMgYWN0dWFsbHkgaXMsIHdoZW4gc29tZW9uZSBrbm9ja3MgYXQgdGhlIGRvb3Ig4oCUIHRocmVlIHRpbWVzLCB1bmh1cnJpZWQsIHRoZSBrbm9jayBvZiBzb21lb25lIHdobydzIGNsZWFybHkgc3Rvb2Qgb24gdGhpcyBleGFjdCBzdGVwIG1hbnkgdGltZXMgYmVmb3JlLg==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2VlIHdobyBpdCBpcw==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'SXQncyBCcnVubyBDYWx2aSwgYW4gb2xkIGZhbWlseSBmcmllbmQgd2VsbCBpbnRvIGhpcyBzaXh0aWVzLCBsb29raW5nIHNvbWV3aGVyZSBiZXR3ZWVuIGd1aWx0eSBhbmQgZGV0ZXJtaW5lZC4gJ0kgc2hvdWxkIGhhdmUgY29tZSB0aGUgd2VlayBvZiB0aGUgZnVuZXJhbCwnIGhlIHNheXMsIGJlZm9yZSB5b3UndmUgZXZlbiBzYWlkIGhlbGxvLiAnSSBhcHByZW50aWNlZCB1bmRlciB5b3VyIGdyYW5kbW90aGVyLCB5ZWFycyBhZ28g4oCUIGJhZGx5LCBhbmQgbm90IGZvciBsb25nIGVub3VnaC4gSSd2ZSBiZWVuIG1lYW5pbmcgdG8gY29tZSBiYWNrIGFuZCBhY3R1YWxseSBmaW5pc2ggbGVhcm5pbmcgZnJvbSBoZXIgZXZlciBzaW5jZS4gQml0IGxhdGUgZm9yIHRoYXQgbm93LiBCdXQgbWF5YmUgbm90IHRvbyBsYXRlIGZvciB0aGlzLicKCkhlIG5vZHMgYXQgdGhlIGJveCBpbiB5b3VyIGhhbmRzIGxpa2UgaGUgYWxyZWFkeSBrbm93cyBleGFjdGx5IHdoYXQgaXQgaXMu',
            'choices' => [
                ['text' => 'SGVhciBoaW0gb3V0IHByb3Blcmx5', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'SGUncyBhbHJlYWR5IHRhbGtpbmcgc3BlY2lmaWNzIOKAlCBtYXJrZXRzLCBncm93ZXJzLCB0aGUgZXhhY3QgaGFsZi1mb3Jnb3R0ZW4gc2hhcGUgb2YgSXJpcydzIHdob2xlIG1ldGhvZCDigJQgd2hlbiBzb21ldGhpbmcgd2FkZGxlcyBpbiB0aHJvdWdoIHRoZSBkb29yIGhlIGxlZnQgYWphciBhbmQgaGVscHMgaXRzZWxmLCB3aXRoIHJlYWwgY29uZmlkZW5jZSwgdG8gYSBwaWVjZSBvZiBzdGFsZSBicmVhZCBvbiB0aGUgY291bnRlci4KCidQaW0sJyBCcnVubyBzYXlzLCBub3QgZXZlbiBsb29raW5nLiAnTGVhdmUgdGhhdC4nIFBpbSwgYSBkdWNrIHdpdGggc3Ryb25nIHBlcnNvbmFsIG9waW5pb25zIGFib3V0IGFueXRoaW5nIHJlbW90ZWx5IGVkaWJsZSwgZG9lcyBub3QgbGVhdmUgdGhhdC4gJ0hlIGRvZXMgdGhpcywnIEJydW5vIGFkZHMsIGJ5IHdheSBvZiBjb21wbGV0ZSBleHBsYW5hdGlvbiwgYWxyZWFkeSBtb3ZpbmcgdG8gcmV0cmlldmUgdGhlIGJyZWFkIGhpbXNlbGYu',
            'choices' => [
                ['text' => 'RGVjaWRlIHdoYXQgdG8gZG8gbmV4dA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'SXQncyBub3QgcmVhbGx5IGEgc21hbGwgZGVjaXNpb24sIHdoYXRldmVyIEJydW5vJ3MgZWFzeSBtYW5uZXIgbWFrZXMgaXQgZmVlbCBsaWtlLiBUaGlydHkgeWVhcnMgb2YgYW4gdW5maW5pc2hlZCByZWNpcGUsIGEgbGlzdCBvZiBwbGFjZXMgc2NhdHRlcmVkIGFjcm9zcyBoYWxmIHRoZSB3b3JsZCwgYSBtYW4gYW5kIGEgZHVjayBvZmZlcmluZyB0byBoZWxwIGZpbmlzaCBwcm9wZXJseSB3aGF0J3Mgc2F0IGFiYW5kb25lZCBzaW5jZSB0aGUgZnVuZXJhbC4KCllvdSBjb3VsZCBzdGFydCB0b2RheSwgd2hpbGUgdGhlIHJlc29sdmUgaG9sZHMuIE9yIHlvdSBjb3VsZCBnaXZlIHRoZSBraXRjaGVuIG9uZSBtb3JlIGV2ZW5pbmcsIHF1aWV0bHksIGJlZm9yZSBjbG9zaW5nIGl0IHVwIGZvciBob3dldmVyIGxvbmcgdGhpcyBhY3R1YWxseSB0YWtlcy4=',
            'choices' => [
                ['text' => 'U3RhcnQgdG9kYXk=', 'next' => '7_end_today'],
                ['text' => 'R2l2ZSB0aGUga2l0Y2hlbiBvbmUgbW9yZSBldmVuaW5nIGZpcnN0', 'next' => '7_end_evening'],
            ],
        ],
        '7_end_today' => [
            'prose'  => 'WW91IGRlY2lkZSB0byBzdGFydCB0b2RheSwgdGhlIG5lcnZlIGZvciBpdCB0b28gZnJhZ2lsZSB0byB0cnVzdCBvdmVybmlnaHQuIEJydW5vIGRvZXNuJ3QgcnVzaCB5b3UgZXhhY3RseSwgYnV0IGhlIGRvZXNuJ3Qgc2xvdyBkb3duIGVpdGhlciDigJQgYnkgdGhlIHRpbWUgeW91J3ZlIHBhY2tlZCB0aGUgYm94LCB0aGUgY2FyZCwgYW5kIHRoZSBsaXN0IHByb3Blcmx5LCBoZSdzIGFscmVhZHkgY2hlY2tpbmcgdHJhaW4gdGltZXMgYXQgdGhlIGtpdGNoZW4gdGFibGUuCgpUaGUgaG91c2UgZmVlbHMgZGlmZmVyZW50IGxlYXZpbmcgaXQgdGhpcyB0aW1lIOKAlCBub3QgYWJhbmRvbmVkLCBidXQgcHJvcGVybHksIGRlbGliZXJhdGVseSBjbG9zaW5nIGZvciBhIHdoaWxlLCBvbiBpdHMgd2F5IHRvIGJlaW5nIHJlb3BlbmVkIHdpdGggc29tZXRoaW5nIGZpbmlzaGVkIGF0IGxhc3Qu',
            'ending' => true,
        ],
        '7_end_evening' => [
            'prose'  => 'WW91IGFzayBmb3Igb25lIG1vcmUgZXZlbmluZywgYW5kIEJydW5vLCB0byBoaXMgY3JlZGl0LCBkb2Vzbid0IGFyZ3VlIOKAlCBqdXN0IHNheXMgaGUnbGwgYmUgYmFjayBhdCBmaXJzdCBsaWdodCwgYW5kIGxlYXZlcyB5b3UgYWxvbmUgd2l0aCB0aGUga2l0Y2hlbiBvbmUgbGFzdCB0aW1lLCBzdGFuZGluZyBpbiBpdCBwcm9wZXJseSB0aGUgd2F5IHlvdSBuZXZlciBxdWl0ZSBtYW5hZ2VkIHRvIGR1cmluZyB0aGUgZnVuZXJhbCBpdHNlbGYuCgpZb3UgbGVhdmUgaW4gdGhlIG1vcm5pbmcgd2l0aCB0aGUgYm94LCB0aGUgY2FyZCwgYW5kIHRoZSBsaXN0IOKAlCBhbmQgd2l0aCB0aGUga2l0Y2hlbiBwcm9wZXJseSBzYWlkIGdvb2RieWUgdG8sIGZvciB0aGUgZmlyc3QgdGltZSwgcmF0aGVyIHRoYW4gc2ltcGx5IGxlZnQgc3RhbmRpbmcgZW1wdHku',
            'ending' => true,
        ],
    ],
];
