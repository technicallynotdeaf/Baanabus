<?php
return [
    'id'    => 1,
    'title' => 'Left Blank On Purpose',
    'color' => '#2A3A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'Q29yd2luJ3Mgb2xkIG9ic2VydmF0b3J5IHNoZWQgc2l0cyBleGFjdGx5IHdoZXJlIGl0IGFsd2F5cyBoYXMsIG91dCBwYXN0IHRoZSBsYXN0IHBhZGRvY2sgYXQgQW9yYWtpIE1hY2tlbnppZSwgaXRzIGNvcnJ1Z2F0ZWQgcm9vZiBydXN0ZWQgYnV0IGl0cyBsaXR0bGUgcm9sbGluZyBoYXRjaCBzdGlsbCBzd2luZ2luZyBmcmVlIHdoZW4geW91IGZpbmFsbHkgd29yayB1cCB0aGUgbmVydmUgdG8gb3BlbiBpdCBwcm9wZXJseSwgd2Vla3MgYWZ0ZXIgaGlzIGZ1bmVyYWwuIEluc2lkZSwgZHVzdCBhbmQgb2xkIHN0YXIgY2hhcnRzIGFuZCB0aGUgcGFydGljdWxhciBzbWVsbCBvZiBhIHJvb20gdGhhdCdzIHNwZW50IGRlY2FkZXMgcG9pbnRlZCBhdCB0aGUgc2t5LgoKVHdvIHRoaW5ncyB3YWl0IG9uIGhpcyBjbHV0dGVyZWQgd29ya2JlbmNoLCBzaWRlIGJ5IHNpZGU6IGEgdGhpY2ssIGhhbmQtYm91bmQgYXRsYXMsIGl0cyBsZWF0aGVyIGNvdmVyIHdvcm4gc29mdCwgYW5kIGEgc21hbGwgYnJhc3Mgc3B5Z2xhc3MsIHRhcm5pc2hlZCB3aXRoIGFnZS4=',
            'choices' => [
                ['text' => 'T3BlbiB0aGUgYXRsYXMgZmlyc3Q=', 'next' => '2_atlas'],
                ['text' => 'RXhhbWluZSB0aGUgc3B5Z2xhc3MgZmlyc3Q=', 'next' => '2_spyglass'],
            ],
        ],
        '2_atlas' => [
            'prose'  => 'VGhlIGF0bGFzIGlzIENvcndpbidzIG93biB3b3JrLCBwYWdlIGFmdGVyIHBhZ2Ugb2YgbWV0aWN1bG91c2x5IGhhbmQtZHJhd24gc3RhciBjaGFydHMgaW4gaGlzIGNhcmVmdWwsIG5hdmlnYXRvcidzIGhhbmQg4oCUIGV4Y2VwdCB0aGF0IHNjYXR0ZXJlZCB0aHJvdWdoIGl0LCBzZWVtaW5nbHkgYXQgcmFuZG9tLCB3aG9sZSBwYXRjaGVzIHNpdCBkZWxpYmVyYXRlbHksIHVubWlzdGFrYWJseSBibGFuay4gTm90IHVuZmluaXNoZWQuIEJsYW5rIG9uIHB1cnBvc2UsIHJ1bGVkIGJvcmRlcnMgZHJhd24gbmVhdGx5IGFyb3VuZCBlbXB0eSBzcGFjZSB3aGVyZSBhIGNvbnN0ZWxsYXRpb24gc2hvdWxkIGJlLgoKQSBub3RlIHR1Y2tlZCBpbnRvIHRoZSBmcm9udCBjb3ZlciwgaW4gdGhlIHNhbWUgaGFuZDogKlNvbWUgdGhpbmdzIHlvdSBjYW4gb25seSBsZWFybiBwcm9wZXJseSBieSBnb2luZyBhbmQgbGlzdGVuaW5nIGZvciB0aGVtLio=',
            'choices' => [
                ['text' => 'U2VlIHdoYXQgdGhlIHNweWdsYXNzIHNob3dz', 'next' => '3_shared'],
            ],
        ],
        '2_spyglass' => [
            'prose'  => 'VGhlIHNweWdsYXNzIGlzIHNtYWxsLCB3ZWxsLXVzZWQsIGEgc2luZ2xlIHNjcmF0Y2hlZCBpbml0aWFsIOKAlCBDIOKAlCBldGNoZWQgbmVhciB0aGUgZXllcGllY2UuIExvb2tpbmcgdGhyb3VnaCBpdCBhdCB0aGUgc2hlZCdzIGR1c3R5IHdpbmRvdyBzaG93cyBub3RoaW5nIGJ1dCBkaXN0b3J0ZWQgZGF5bGlnaHQsIGNsZWFybHkgbWVhbnQgZm9yIGRhcmtlciBob3VycyB0aGFuIHRoaXMuIFR1Y2tlZCBiZW5lYXRoIGl0LCBoYWxmLWhpZGRlbiwgc2l0cyBhIHRoaWNrLCBoYW5kLWJvdW5kIGF0bGFzLCBpdHMgbGVhdGhlciBjb3ZlciB3b3JuIHNvZnQgd2l0aCBkZWNhZGVzIG9mIGhhbmRsaW5nLgoKQSBub3RlIHR1Y2tlZCBpbnRvIGl0cyBmcm9udCBjb3ZlciwgaW4gQ29yd2luJ3Mgb3duIGNhcmVmdWwgaGFuZDogKlNvbWUgdGhpbmdzIHlvdSBjYW4gb25seSBsZWFybiBwcm9wZXJseSBieSBnb2luZyBhbmQgbGlzdGVuaW5nIGZvciB0aGVtLio=',
            'choices' => [
                ['text' => 'TG9vayB0aHJvdWdoIHRoZSBhdGxhcyBwcm9wZXJseQ==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgY2FtZSB0byBpdCwgdGhlIHNoYXBlIG9mIHRoZSB0aGluZyBpcyB0aGUgc2FtZTogcGFnZSBhZnRlciBwYWdlIG9mIENvcndpbidzIG93biBjYXJlZnVsIHN0YXIgY2hhcnRzLCBhbmQgc2NhdHRlcmVkIGFtb25nIHRoZW0sIHdob2xlIHBhdGNoZXMgbGVmdCBkZWxpYmVyYXRlbHksIHVubWlzdGFrYWJseSBibGFuayDigJQgbm90IG1pc3NpbmcgcGFnZXMsIG5vdCBtaXN0YWtlcywgYnV0IGVtcHR5IHNwYWNlIGJvcmRlcmVkIGFzIGNhcmVmdWxseSBhcyBldmVyeXRoaW5nIGhlIGFjdHVhbGx5IGZpbmlzaGVkLiBZb3UncmUgc3RpbGwgdHVybmluZyBvbmUgc3VjaCBibGFuayBwYXRjaCBvdmVyIGluIHlvdXIgaGFuZHMsIHRyeWluZyB0byBtYWtlIHNlbnNlIG9mIGl0LCB3aGVuIGFuIGVuZ2luZSBodW1zIGxvdyBvdXRzaWRlLCB0aGVuIGN1dHMgdG8gcXVpZXQuCgpBIHdvbWFuJ3Mgdm9pY2UgY2FsbHMgZnJvbSB0aGUgZG9vcndheSwgdW5odXJyaWVkIGFuZCBlbnRpcmVseSB1bnN1cnByaXNlZC4gJ0kgZGlkIHdvbmRlciBob3cgbG9uZyBpdCdkIHRha2Ugc29tZW9uZSB0byBmaW5hbGx5IG9wZW4gdGhhdCBzaGVkIHByb3Blcmx5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'R28gb3V0IGFuZCBtZWV0IGhlcg==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'T3V0c2lkZSB3YWl0cyBhIHNsZWVrLCBzb2xhci13aW5nZWQgZ2xpZGVyLXNoaXAsIHBhdGNoZWQgcGFuZWxzIGNhdGNoaW5nIHRoZSBhZnRlcm5vb24gc3VuLCBhbmQgYSB3b21hbiBpbiBoZXIgbGF0ZSB0d2VudGllcyBsZWFuaW5nIGFnYWluc3QgaXRzIGh1bGwgd2l0aCB0aGUgZWFzeSBjb25maWRlbmNlIG9mIHNvbWVvbmUgd2hvJ3MgY2xlYXJseSBmbG93biBpdCBhIGdyZWF0IG1hbnkgdGltZXMuICdQcml5YSBOYW5kYWt1bWFyLCcgc2hlIHNheXMsIG9mZmVyaW5nIGEgaGFuZC4gJ0kga25ldyB5b3VyIGdyZWF0LXVuY2xlLiBGbGV3IGZvciBoaW0sIGFjdHVhbGx5LCB0aGUgbGFzdCBmZXcgeWVhcnMgYmVmb3JlIGhlIHN0b3BwZWQgZ29pbmcgb3V0IHByb3Blcmx5LiBJJ3ZlIGJlZW4gaGFsZi1leHBlY3RpbmcgdGhhdCBhdGxhcyB0byBzdXJmYWNlIGV2ZW50dWFsbHkuJwoKU29tZXRoaW5nIHNtYWxsIGFuZCBmZW5uZWMtZWFyZWQgcG9rZXMgaXRzIGhlYWQgb3V0IG9mIHRoZSBnbGlkZXIncyBub3NlIGNvbmUsIGVhcnMgc3dpdmVsbGluZyB0b3dhcmQgeW91IHdpdGggc2hhcnAsIGltbWVkaWF0ZSBpbnRlcmVzdC4=',
            'choices' => [
                ['text' => 'QXNrIGFib3V0IHRoZSBsaXR0bGUgZm94', 'next' => '5_shared'],
            ],
        ],
        '5_shared' => [
            'prose'  => 'J1RoYXQncyBTdWxpLCcgUHJpeWEgc2F5cywgZm9uZGx5IGV4YXNwZXJhdGVkLiAnVHJhdmVscyB3aXRoIHRoZSBzaGlwLiBIYXMgYW4gdW5jYW5ueSBrbmFjayBmb3Iga25vd2luZyBleGFjdGx5IHdoaWNoIGJpdCBvZiBza3kgaXMgYWN0dWFsbHkgbWlzc2luZyBiZWZvcmUgYW55b25lIHRlbGxzIGhlciDigJQgZG9uJ3QgYXNrIG1lIGhvdywgbm9ib2R5J3MgZXZlciBwcm9wZXJseSBleHBsYWluZWQgaXQuJyBTdWxpIHJlZ2FyZHMgdGhlIGJsYW5rIGF0bGFzIHBhZ2UgaW4geW91ciBoYW5kcyB3aXRoIHdoYXQgbG9va3MsIHVubWlzdGFrYWJseSwgbGlrZSByZWNvZ25pdGlvbi4KClByaXlhJ3MgZ2F6ZSBkcm9wcyB0byB0aGUgc2FtZSBwYWdlLCBhbmQgaGVyIGVhc3kgbWFubmVyIHNoYXJwZW5zIGludG8gc29tZXRoaW5nIG1vcmUgc2VyaW91cy4gJ0hlIGxlZnQgdGhvc2UgZ2FwcyBvbiBwdXJwb3NlLCB5b3Uga25vdy4gRXZlcnkgb25lIG9mIHRoZW0uIE5ldmVyIHRvbGQgbWUgd2h5LCBleGFjdGx5IOKAlCBqdXN0IHRoYXQgd2hvZXZlciBmaW5hbGx5IG9wZW5lZCB0aGF0IHNoZWQgd291bGQgbmVlZCB0byBnbyBhbmQgZmluZCBvdXQgcHJvcGVybHksIGluIHBlcnNvbiwgcGxhY2UgYnkgcGxhY2UuJw==',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGFwcGVucyBuZXh0', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'J1doYXQgaGFwcGVucyBuZXh0IGlzIHlvdSBkZWNpZGUsJyBQcml5YSBzYXlzIHBsYWlubHkuICdUaGUgUXVpZXQgSG91cidzIGZ1ZWxsZWQsIGNoYXJnZWQsIHJlYWR5IHRvIGZseS4gSSBjYW4gdGFrZSB5b3UgdG8gdGhlIGZpcnN0IGJsYW5rIHBhdGNoJ3MgYW5zd2VyIG15c2VsZiwgaWYgeW91J3JlIHdpbGxpbmcgdG8gYWN0dWFsbHkgZ28gbG9va2luZy4gT3IgeW91IGtlZXAgdGhlIGF0bGFzIGhlcmUsIHNhZmUsIGFuZCBsZXQgaXQgc3RheSBleGFjdGx5IGFzIGJsYW5rIGFzIGhlIGxlZnQgaXQuJwoKU3VsaSdzIGVhcnMgc3RheSBmaXhlZCBvbiB5b3UsIHBhdGllbnQgYW5kIGV4cGVjdGFudCwgYXMgdGhvdWdoIHRoZSBhbnN3ZXIncyBhbHJlYWR5IG9idmlvdXMgdG8gaGVyLg==',
            'choices' => [
                ['text' => 'QWdyZWUgdG8gZ28gbG9va2luZywgcHJvcGVybHk=', 'next' => '7_end_go'],
                ['text' => 'U2F5IHlvdSBuZWVkIGEgbGl0dGxlIG1vcmUgdGltZSB0byBkZWNpZGU=', 'next' => '7_end_wait'],
            ],
        ],
        '7_end_go' => [
            'prose'  => 'J0kgd2FudCB0byBnbyBsb29raW5nLCBwcm9wZXJseSwnIHlvdSBzYXksIHN1cnByaXNpbmcgeW91cnNlbGYgc2xpZ2h0bHkgd2l0aCBob3cgcXVpY2tseSB0aGUgZGVjaXNpb24gYWN0dWFsbHkgYXJyaXZlcy4gUHJpeWEncyBhbnN3ZXJpbmcgc21pbGUgaXMgcmVhbCwgdW5ndWFyZGVkLCB0aGUgZmlyc3QgZ2VudWluZSB3YXJtdGggc2hlJ3Mgc2hvd24gc2luY2UgbGFuZGluZy4gJ0dvb2QsJyBzaGUgc2F5cy4gJ1Rob3VnaHQgeW91IG1pZ2h0IHNheSB0aGF0LiBGaXJzdCBzdG9wJ3MgYSBsb25nIGZsaWdodCBmcm9tIGhlcmUg4oCUIGJlc3Qgd2UgZ2V0IG1vdmluZyB3aGlsZSB0aGUgbGlnaHQgaG9sZHMuJwoKU3VsaSBjaGlycnVwcyBzb21ldGhpbmcgdGhhdCBzb3VuZHMsIGFic3VyZGx5LCBsaWtlIGFwcHJvdmFsLCBhbmQgdGhlIFF1aWV0IEhvdXIncyBzb2xhciB3aW5ncyBjYXRjaCB0aGUgYWZ0ZXJub29uIHN1biBhcyB5b3UgY2xpbWIgYWJvYXJkIGZvciB0aGUgZmlyc3QgdGltZSwgQ29yd2luJ3MgYXRsYXMg4oCUIGFuZCBpdHMgdmVyeSBmaXJzdCBibGFuayBwYWdlLCBmaW5hbGx5LCBwcm9wZXJseSBzZWVuIGZvciB3aGF0IGl0IGlzIOKAlCBzYWZlbHkgc3Rvd2VkIGFsb25nc2lkZSB5b3Uu',
            'ending' => true,
        ],
        '7_end_wait' => [
            'prose'  => 'J0hvbmVzdGx5LCBJIG5lZWQgYSBsaXR0bGUgbW9yZSB0aW1lIHRvIGRlY2lkZSwnIHlvdSBhZG1pdCwgdGhlIHdlaWdodCBvZiB0aGUgYXRsYXMgYW5kIGl0cyBzY2F0dGVyZWQgYmxhbmsgcGF0Y2hlcyBzdGlsbCBzZXR0bGluZyBpbiBwcm9wZXJseS4gUHJpeWEgZG9lc24ndCBwdXNoLiAnRmFpciBlbm91Z2gsJyBzaGUgc2F5cy4gJ0l0IHdhaXRlZCB0aGlzIGxvbmcgYWxyZWFkeS4gQSBmZXcgbW9yZSBkYXlzIHdvbid0IGh1cnQgaXQuJyBTaGUgbGVhdmVzIHlvdSBoZXIgY29udGFjdCBkZXRhaWxzIGJlZm9yZSBmbHlpbmcgb2ZmLCBTdWxpJ3Mgc21hbGwgZmFjZSB3YXRjaGluZyB5b3UgZnJvbSB0aGUgbm9zZSBjb25lIHVudGlsIHRoZSBnbGlkZXIgYmFua3Mgb3V0IG9mIHNpZ2h0LgoKWW91IHNwZW5kIHRoZSBuZXh0IHNldmVyYWwgZGF5cyB3aXRoIHRoZSBhdGxhcyBzcHJlYWQgb3BlbiBvbiBDb3J3aW4ncyBvbGQgd29ya2JlbmNoLCB0cmFjaW5nIGVhY2ggYmxhbmsgcGF0Y2ggd2l0aCB5b3VyIGZpbmdlciwgZmVlbGluZyB0aGUgc2hhcGUgb2YgdGhlIHF1ZXN0aW9uIHRoZXkncmUgZWFjaCBxdWlldGx5LCBwYXRpZW50bHkgYXNraW5nIG9mIHlvdS4=',
            'ending' => true,
        ],
    ],
];
