<?php
return [
    'id'    => 'q7',
    'title' => 'The Crystal Chambers',
    'color' => '#6A5A7A',

    'pages' => [
        '1_start' => [
            'prose'   => 'U2xvdmVuaWEgYXJyaXZlcyBpbiBsaW1lc3RvbmUuIFRoZSBoaWxscyBhYm92ZSB0aGUgY2F2ZSBlbnRyYW5jZSBhcmUgd2hpdGUtZ3JleSBhbmQgcG9ja2VkIHdpdGggc2lua2hvbGVzLCBhbmQgdGhlIHZhbGxleSBiZWxvdyBob2xkcyBhIHRvd24gdGhhdCBoYXMgb3JnYW5pc2VkIGl0c2VsZiBlbnRpcmVseSBhcm91bmQgdGhlIHF1ZXN0aW9uIG9mIHdoYXQgbGl2ZXMgdW5kZXJncm91bmQuCgpGcmVkIGhhcyBiZWVuIGV4cGxhaW5pbmcgY2F2ZSBtb3NzIHNpbmNlIHRoZSByaWRnZSByb2FkLiBIZSBleHBsYWlucyBpdCB3aXRoIHNvbWUgaW50ZW5zaXR5IGJlY2F1c2UsIGhlIG5vdGVzLCBjYXZlIG1vc3MgaXMgdW5kZXJhcHByZWNpYXRlZCBpbiB3YXlzIHRoYXQgcmVmbGVjdCBwb29ybHkgb24gdGhlIGJvdGFuaWNhbCBjb21tdW5pdHkuCgpKYW1lcyBpcyBvbiB5b3VyIHNob3VsZGVyLCB3YXRjaGluZyB0aGUgY2F2ZSBlbnRyYW5jZSB3aXRoIHRoZSBhdHRlbnRpb24gaGUgZ2l2ZXMgdG8gZGFyayBwYXNzYWdlczogY29tcGxldGUsIGFuZCBlbnRpcmVseSB1bndvcnJpZWQuCgpUd28gd2F5cyBpbi4gVGhlIG1pbmVycyB3b3JrIGVhcmx5IHNoaWZ0cyBhbmQgdGFrZSBsYW1wcyBhbmQgcm9wZXMuIFRoZSB0b3VyaXN0IGNhdmVzIG9wZW4gYXQgbmluZSB3aXRoIGEgZ3VpZGUgYW5kIGEgZ3JvdXAgb2Ygc2Nob29sY2hpbGRyZW4u',
            'choices' => [
                ['text' => 'RmluZCB0aGUgbWluaW5nIGNyZXc=', 'next' => '2_miners'],
                ['text' => 'Sm9pbiB0aGUgdG91cmlzdCBncm91cA==', 'next' => '2_show'],
            ],
        ],
        '2_miners' => [
            'prose'   => 'VGhlIGxlYWQgbWluZXLigJlzIG5hbWUgaXMgSnVyaWouIEhlIGlzIHRoZSBzaXplIG9mIGEgc21hbGwgd2FyZHJvYmUgYW5kIGhhcyB0aGUgYWNjZW50IG9mIHNvbWVvbmUgd2hvIGhhcyBzcGVudCBzbyBtdWNoIG9mIGhpcyBsaWZlIHVuZGVyZ3JvdW5kIHRoYXQgdGhlIG91dGRvb3JzIGlzIGEgZm9ybWFsaXR5LiBIZSBsb29rcyBhdCBGcmVkIG9uY2UgYW5kIGRvZXMgbm90IGFwcGVhciB0byBmaW5kIGhpbSB1bnVzdWFsIGluIGFueSBmdXJ0aGVyIHdheS4KCllvdSBzaG93IGhpbSB0aGUgc2VhLWxhdmVuZGVyLiBGcmVkIGV4cGxhaW5zIOKAlCBiZWZvcmUgSnVyaWogY2FuIGFzayDigJQgdGhhdCB0aGUgbWluZXJhbCBzZWVwYWdlIHByb2ZpbGUgaGVyZSBtYXRjaGVzIGEgc3BlY2lmaWMgY29hc3RhbCBhcXVpZmVyLiBMaW1vbml1bSBncm93cyBvbmx5IGF0IHRoYXQgaW50ZXJzZWN0aW9uLiBKdXJpaiBzdHVkaWVzIHRoZSBkcmllZCBzdGVtcy4KCuKAnFdlIHdvbmRlcmVkIGFib3V0IHRoYXQs4oCdIGhlIHNheXMuIOKAnFRoZXJl4oCZcyBhIHBhc3NhZ2Ugb2ZmIHRoZSBtYWluIGdhbGxlcnkg4oCUIHNhbWUgbWluZXJhbCBzaWduYXR1cmUsIHRocmVlIHllYXJzIGFnby4gV2XigJl2ZSBiZWVuIG5vdGluZyBpdC7igJ0KCkhlIHNheXMgaXQgd2l0aCB0aGUgcmVzdHJhaW50IG9mIGEgbWFuIHdobyBoYXMgYmVlbiB3YWl0aW5nIHRocmVlIHllYXJzIGZvciBzb21lb25lIHRvIHVuZGVyc3RhbmQgd2h5IGl0IHdhcyBpbnRlcmVzdGluZy4=',
            'choices' => [
                ['text' => 'Rm9sbG93IEp1cmlqIGludG8gdGhlIG1pbmU=', 'next' => '3_mine_deep'],
            ],
        ],
        '2_show' => [
            'prose'   => 'QmVsYSBpcyBtaWQtc2VudGVuY2Ugd2hlbiB5b3UgYXJyaXZlIGF0IHRoZSBiYWNrIG9mIHRoZSBncm91cC4gU2hlIGRvZXMgbm90IHN0b3AuIFNoZSBpcyBleHBsYWluaW5nIHN0YWxhY3RpdGUgZm9ybWF0aW9uIHRvIGVsZXZlbiBzY2hvb2xjaGlsZHJlbiwgZWlnaHQgb2Ygd2hvbSBhcmUgbGlzdGVuaW5nIGFuZCB0aHJlZSBvZiB3aG9tIGFyZSBjYWxjdWxhdGluZyB3aGV0aGVyIHRoZSBjZWlsaW5nIGFib3ZlIHRoZSBzZWNvbmQgdmlld2luZyBwbGF0Zm9ybSBjb3VsZCBiZSBjbGltYmVkLgoKV2hlbiB5b3UgcHJvZHVjZSB0aGUgc2VhLWxhdmVuZGVyIHNoZSBzdG9wcyB0YWxraW5nIGFib3V0IHN0YWxhY3RpdGVzLgoK4oCcV2hlcmUgZGlkIHlvdSBnZXQgdGhpcz/igJ0gU2hlIGhvbGRzIGl0IHVwLiDigJxDaGlsZHJlbiDigJQgdGhpcyBwbGFudCBvbmx5IGdyb3dzIHdoZXJlIGEgc3BlY2lmaWMgbWluZXJhbCBzZWVwYWdlIG1lZXRzIGEgc3BlY2lmaWMgc2FsaW5pdHkuIFlvdSBrbm93IHdoYXQgdGhhdCBtZWFucz/igJ0gQSBwYXVzZS4g4oCcSXQgbWVhbnMgdGhpcyBjYXZlIGlzIGNvbm5lY3RlZCB0byB0aGUgc2VhLiBVbmRlcmdyb3VuZC4gQSBsaXF1aWQgdGhyZWFkLCBhbGwgdGhlIHdheS7igJ0KClNoZSBsb29rcyBhdCB5b3UuIOKAnEnigJl2ZSBiZWVuIGV4cGxhaW5pbmcgdGhhdCBmb3IgeWVhcnMgYW5kIG5vIG9uZSBoYXMgZXZlciBicm91Z2h0IG1lIHByb29mLuKAnQoKU2hlIGxldHMgeW91IHBhc3QgdGhlIHJvcGUgYmFycmllciB3aXRoIGEgZ2VzdHVyZSB0aGF0IHN1Z2dlc3RzIHlvdSBoYXZlIGVhcm5lZCBpdC4=',
            'choices' => [
                ['text' => 'Rm9sbG93IEJlbGEgZnVydGhlciBpbg==', 'next' => '3_show_led'],
            ],
        ],
        '3_mine_deep' => [
            'prose'   => 'VGhlIG1pbmVyc+KAmSBwYXNzYWdlIGlzIGEgZGlmZmVyZW50IGtpbmQgb2YgdW5kZXJncm91bmQg4oCUIGhlYWRsYW1wcywgaXJvbiBhbmQgc3RvbmUgZHVzdCwgdGhlIHNvdW5kIG9mIHdhdGVyIHJ1bm5pbmcgc29tZXdoZXJlIGRpc3RhbnQuIEp1cmlqIHdhbGtzIHdpdGggdGhlIGVhc2Ugb2Ygc29tZW9uZSB3aG8gaGFzIGxlYXJuZWQgbW9yZSBmbG9vcnMgdGhhbiBoZSBoYXMgbG9zdC4KCkZyZWQgaGFzIGlkZW50aWZpZWQgdGhyZWUgY2F2ZSBtb3NzIHNwZWNpZXMgYW5kIGlzIGtlZXBpbmcgbm90ZXMgYXQgYSB2b2x1bWUgc2xpZ2h0bHkgYmVsb3cgbm9ybWFsIGZvciBGcmVkLCB3aGljaCBpcyBzdGlsbCBhdWRpYmxlLgoKSW4gdGhlIGRlZXBlciBnYWxsZXJ5LCBCZWxhIGlzIGFscmVhZHkgdGhlcmUsIGluIGRpc2N1c3Npb24gd2l0aCBhIGp1bmlvciBndWlkZSBhYm91dCBkcmlsbCBhbmdsZXMuIFNoZSBsb29rcyB1cCB3aGVuIHlvdXIgZ3JvdXAgZW50ZXJzLgoK4oCcSSBrbm93IHlvdSzigJ0gc2hlIHNheXMsIHRvIHlvdS4g4oCcT3IgcmF0aGVyIOKAlCBJIGtub3cgdGhlIGxhdmVuZGVyLuKAnQoKU2hlIGhvbGRzIHVwIGhlciBvd24gc2FtcGxlLiBTYW1lIHNwZWNpZXMuIFNvbWVvbmUgYnJvdWdodCBpdCB0byBoZXIgd2Vla3MgYWdvLCBhc2tlZCBhYm91dCB0aGUgbWluZXJhbCBjb25uZWN0aW9uLCBhbmQgbGVmdCBiZWZvcmUgc2hlIGNvdWxkIGFzayB0aGVpciBuYW1lLiDigJxWZXJ5IHN1cmUgb2YgaGVyc2VsZizigJ0gQmVsYSBzYXlzLiDigJxEaWRu4oCZdCB3YW50IGd1aWRpbmcu4oCd',
            'choices' => [
                ['text' => 'QXNrIEJlbGEgYWJvdXQgdGhlIHRoaXJkIHJvdXRl', 'next' => '4_approach'],
            ],
        ],
        '3_show_led' => [
            'prose'   => 'UGFzdCB0aGUgcm9wZSBiYXJyaWVyIHRoZSBwYXNzYWdlIGNvbnRpbnVlcyBiZXlvbmQgdGhlIHRvdXJpc3QgY2lyY3VpdCDigJQgbm90IGRhbmdlcm91cywganVzdCB1bm1hcmtlZCwgbGl0IG9ubHkgYnkgQmVsYeKAmXMgbGFtcC4gVGhlIHNjaG9vbGNoaWxkcmVuIGFyZSBoYW5kZWQgdG8gYSBqdW5pb3IgZ3VpZGUuIEJlbGEgd2Fsa3Mgd2l0aG91dCBodXJyeWluZy4KCuKAnFRoZXJlIHdhcyBzb21lb25lIGVsc2Us4oCdIHNoZSBzYXlzLCB3aXRob3V0IHByZWFtYmxlLiDigJxXZWVrcyBhZ28uIFNhbWUgcGxhbnQsIGRpZmZlcmVudCBzb3VyY2UuIExvb2tpbmcgZm9yIHNvbWV0aGluZyBzcGVjaWZpYy7igJ0gU2hlIGdsYW5jZXMgYmFjay4g4oCcQXJlIHlvdSBhbHNvIGxvb2tpbmcgZm9yIHNvbWV0aGluZyBzcGVjaWZpYz/igJ0KClllcy4KCuKAnEkgdGhvdWdodCBzby7igJ0gU2hlIHN0b3BzIGF0IGEganVuY3Rpb24gbm90IG9uIGFueSBwb3N0ZWQgbWFwLiDigJxUaGVyZeKAmXMgYSBjaGFtYmVyIG9mZiB0aGUgZ2VvbG9naWNhbCBzdXJ2ZXkgcm91dGUuIEJvdGggb2ZmaWNpYWwgcm91dGVzIHBhc3MgaXQgYnkgYWJvdXQgZm9ydHkgbWV0cmVzLiBJ4oCZbSB0aGUgb25seSBndWlkZSB3aG8ga25vd3MgYWJvdXQgaXQu4oCdIFNoZSB0dXJucyBoZXIgbGFtcCB0byBhIG5hcnJvdyBsZWZ0LWhhbmQgcGFzc2FnZS4g4oCcSSB0YWtlIHBlb3BsZSB0aGVyZSBzb21ldGltZXMuIFdoZW4gSSB0aGluayB0aGV5IHNob3VsZCBzZWUgaXQu4oCd',
            'choices' => [
                ['text' => 'Rm9sbG93IEJlbGEgaW50byB0aGUgcGFzc2FnZQ==', 'next' => '4_approach'],
            ],
        ],
        '4_approach' => [
            'prose'   => 'VGhlIHBhc3NhZ2UgbmFycm93cyBmb3IgdHdlbnR5IG1ldHJlcyBhbmQgdGhlbiBvcGVucy4KCk5vdCBhbGwgdGhlIHdheSBvcGVuIOKAlCBjYXZlLW9wZW4sIHdoaWNoIGlzIGRpZmZlcmVudDogdGhlIGNlaWxpbmcgbGlmdHMgYW5kIHRoZSB3YWxscyBzcHJlYWQsIGFuZCB0aGUgZGFya25lc3MgYWJvdmUgYmVjb21lcyBhIGRhcmtuZXNzIHdpdGggZGVwdGggcmF0aGVyIHRoYW4gYSBkYXJrbmVzcyB3aXRoIHByZXNzdXJlLgoKVGhlIGxhbXAgc2hvd3MgY3J5c3RhbHMuIE5vdCBnZW1zdG9uZXMg4oCUIGNhbGNpdGUgZm9ybWF0aW9ucywgb3JkaW5hcnkgZ2VvbG9neSwgY292ZXJpbmcgdGhlIHdhbGxzIGFuZCBjZWlsaW5nIGluIHN0cnVjdHVyZXMgdGhhdCBjYXRjaCB0aGUgbGlnaHQgYW5kIGhvbGQgaXQ6IHdoaXRlLCBwYWxlIGdvbGQsIGZhaW50IGdyZXktYmx1ZSB3aGVyZSB0aGUgbWluZXJhbCBzZWVwcyB0aHJvdWdoLiBUaGUgdW5kZXJncm91bmQgc3RyZWFtIHJ1bnMgYWxvbmcgb25lIHdhbGwsIGRhcmsgYW5kIHZlcnkgY29sZCwgbWFraW5nIGEgc291bmQgdGhhdCBpcyBiYXJlbHkgc291bmQgYXQgYWxsLgoKRnJlZCBzdG9wcyB0YWxraW5nLiBUaGlzIGlzIHJhcmUgZW5vdWdoIHRvIG5vdGljZS4KCkphbWVzLCBvbiB5b3VyIHNob3VsZGVyLCByb3RhdGVzIGhpcyBoZWFkIHNsb3dseSBhbmQgdGFrZXMgaW4gdGhlIHdob2xlIHJvb20uIEhpcyBleHByZXNzaW9uLCB0byB0aGUgZXh0ZW50IHRoYXQgYSBsb3JpcyBoYXMgZXhwcmVzc2lvbnMsIGlzIHNvbWV0aGluZyBsaWtlIHJlY29nbml0aW9uLgoKQmVsYSwgYmVoaW5kIHlvdTog4oCcSSBrbm93LiBUYWtlIGEgbW9tZW50LuKAnQ==',
            'choices' => [
                ['text' => 'U3RlcCBmdWxseSBpbnRvIHRoZSBjaGFtYmVy', 'next' => '5_chamber'],
            ],
        ],
        '5_chamber' => [
            'prose'   => 'VGhlIGNoYW1iZXIgaGFzIGl0cyBvd24gdGVtcGVyYXR1cmUsIHNldmVyYWwgZGVncmVlcyBjb29sZXIgdGhhbiB0aGUgcGFzc2FnZS4gVGhlIGNyeXN0YWxzIG9uIHRoZSBjZWlsaW5nIGhhdmUgYmVlbiBmb3JtaW5nIGZvciBsb25nZXIgdGhhbiB0aGUgY2F2ZSBoYXMgaGFkIHZpc2l0b3JzLiBMb25nZXIgdGhhbiB0aGUgbWluaW5nIGNvbXBhbnkuIExvbmdlciB0aGFuIHRoZSB0b3duIGFib3ZlLgoKRnJlZCBoYXMgYmVndW4gY2F0YWxvZ3VpbmcgYXQgYSBtdXJtdXIuIEphbWVzIGlzIG1vdGlvbmxlc3Mgb24geW91ciBzaG91bGRlciwgd2F0Y2hpbmcgdGhlIGZhciBlbmQgb2YgdGhlIGNoYW1iZXIgd2hlcmUgdGhlIHN0cmVhbSBkaXNhcHBlYXJzIGludG8gdGhlIHdhbGwuCgpUaGVuOiBhIGxhbXAuIE5vdCBCZWxh4oCZcyDigJQgYW5vdGhlciBsYW1wLCBhcm91bmQgdGhlIGN1cnZlIG9mIHRoZSBjaGFtYmVyIHdhbGwsIGFuZCB0aGUgc291bmQgb2Ygc29tZW9uZSBtb3ZpbmcuIE5vdCBoaWRkZW4uIE5vdCBmdXJ0aXZlLiBTb21lb25lIHdobyB3YXMgaGVyZSBmaXJzdCBhbmQgaGFzIG5vdCB5ZXQgbG9va2VkIHVwLg==',
            'terminal' => true,
            'choices' => [
                ['text' => 'U2VlIHdobyBpcyBpbiB0aGUgY2hhbWJlcg==', 'next' => '6_petra'],
            ],
        ],
        '6_petra' => [
            'prose'   => 'U2hlIGxvb2tzIHVwIHdoZW4geW91ciBsYW1wIHJlYWNoZXMgaGVyLgoKU2hlIGlzIHNpdHRpbmcgd2l0aCBoZXIgYmFjayBhZ2FpbnN0IHRoZSBjYXZlIHdhbGwsIHNldmVyYWwgc3F1YXJlcyBsYWlkIG91dCBvbiBhIGNsb3RoIGluIGZyb250IG9mIGhlci4gU2hlIGhhcyBncmFuZG1vdGhlcuKAmXMgZXllcyDigJQgdGhlIHNoYXBlIG9mIHRoZW0sIHRoZSB3YXkgdGhleSBhc3Nlc3MuIFNoZSBkb2VzIG5vdCBsb29rIGZyaWdodGVuZWQuIFNoZSBsb29rcywgZm9yIGEgbW9tZW50LCBhcyB0aG91Z2ggc2hlIGlzIGRlY2lkaW5nIHNvbWV0aGluZy4KClRoZSBzcXVhcmVzIGFyZSBkaWZmZXJlbnQgdG8geW91cnMuIFRoZSBzYW1lIHNjZW5lcywgb3IgbmVhcmx5IOKAlCB0aGUgc2FtZSBzdWJqZWN0cywgc2xpZ2h0bHkgZGlmZmVyZW50IGFuZ2xlcy4gR3JhbmRtb3RoZXIgbWFkZSB0d28gc2V0cy4gVGhpcyBoYWQgbm90IG9jY3VycmVkIHRvIHlvdSB1bnRpbCBub3cuCgrigJxPaCzigJ0gc2hlIHNheXMuIFRoZSB3b3JkIGNvbnRhaW5zIGFib3V0IGVsZXZlbiBkaWZmZXJlbnQgdGhpbmdzLgoKWW91IGdpdmUgaGVyIHlvdXIgbmFtZS4gU2hlIGdpdmVzIHlvdSBoZXJzOiBncmFuZG1vdGhlcuKAmXMgc3lsbGFibGVzLCByZWFycmFuZ2VkLgoK4oCcUGV0cmEs4oCdIHNoZSBzYXlzLiDigJxJIGtub3cgd2hvIHlvdSBhcmUu4oCd',
            'choices' => [
                ['text' => 'V2F0Y2ggSmFtZXMgd2F0Y2hpbmcgaGVy', 'next' => '7_james'],
                ['text' => 'TG9vayBhdCB0aGUgc3F1YXJlIGJldHdlZW4geW91', 'next' => '7_square'],
            ],
        ],
        '7_james' => [
            'prose'   => 'SmFtZXMgaGFzIHR1cm5lZCBvbiB5b3VyIHNob3VsZGVyIGFuZCBpcyBsb29raW5nIGF0IFBldHJhIHdpdGggdGhlIGF0dGVudGlvbiBoZSBnaXZlcyB0byBzaWduaWZpY2FudCB0aGluZ3MuCgpIZSB3YXRjaGVzIGhlciB0aGUgd2F5IGhlIHdhdGNoZXMgdGhlIHNlYSBvciB0aGUgZmlyZSDigJQgbm90IGFzIGEgc3RyYW5nZXIsIG5vdCB3aXRoIGFzc2Vzc21lbnQgb2YgdGhyZWF0LiBBcyBzb21ldGhpbmcgaGUgYWxyZWFkeSBrbm93cyB0aGUgc2hhcGUgb2YuCgpQZXRyYSBub3RpY2VzLiBTaGUgbWVldHMgaGlzIGV5ZXMuIEhlIGNvbnRpbnVlcyBsb29raW5nLgoK4oCcWW91ciBsb3JpcyBpcyBzdGFyaW5nIGF0IG1lLOKAnSBzaGUgc2F5cy4KCuKAnEhlIGRvZXMgdGhhdCzigJ0geW91IHNheS4g4oCcSXTigJlzIGRpZmZlcmVudCB0byB0aGUgb3RoZXIgc3RhcmluZy7igJ0KClNvbWV0aGluZyBpbiBoZXIgZXhwcmVzc2lvbiBzaGlmdHMsIG1pbmltYWxseS4gVGhlIGF3a3dhcmRuZXNzIGRvZXNu4oCZdCBkaXNhcHBlYXIg4oCUIGl0IHdvdWxkbuKAmXQsIG5vdCB0b2RheSwgbm90IGluIHRoaXMgcm9vbSDigJQgYnV0IGl0IGdpdmVzIHNsaWdodGx5LCB0aGUgd2F5IGljZSBnaXZlcyBhdCB0aGUgZWRnZXMgYmVmb3JlIHRoZSB3aG9sZSBzaGVldCBtb3Zlcy4KCllvdSB0YWtlIFNxdWFyZSAjNyBmcm9tIHRoZSBjbG90aC4gU2hlIHRha2VzIHRoZSBub3RlIGluc2lkZSB0aGUgc3F1YXJlIGFuZCBwb2NrZXRzIGl0IHdpdGhvdXQgc2hvd2luZyBpdCB0byB5b3Uu',
            'choices' => [
                ['text' => 'SGVhZCBiYWNrIHRocm91Z2ggdGhlIHBhc3NhZ2U=', 'next' => '8_outside'],
            ],
        ],
        '7_square' => [
            'prose'   => 'VGhlIHNxdWFyZSBpcyBvbiB0aGUgY2xvdGggaW4gZnJvbnQgb2YgaGVyOiB1bmRlcmdyb3VuZCBjcnlzdGFscyBhbmQgZGFyayB3YXRlciwgZ3JhbmRtb3RoZXLigJlzIG5lZWRsZSwgZ3JhbmRtb3RoZXLigJlzIHRocmVhZCwgZ3JhbmRtb3RoZXLigJlzIGF0dGVudGlvbiB0byB0aGUgd2F5IGxpZ2h0IG1vdmVzIHRocm91Z2ggc29tZXRoaW5nIGNvbGQgYW5kIHN0aWxsLgoKWW91IHJlYWNoIGZvciBpdC4gU2hlIGRvZXNu4oCZdCBzdG9wIHlvdS4KCkluc2lkZTogYSBub3RlLCBmb2xkZWQgc21hbGwuIFNoZSBwaWNrcyBpdCB1cCBiZWZvcmUgeW91IGNhbiByZWFkIGl0IGFuZCBwdXRzIGl0IGluIGhlciBjb2F0IHBvY2tldC4gVGhpcyBpcyBkb25lIHdpdGggdGhlIGNhcmUgYW5kIGRpcmVjdG5lc3Mgb2Ygc29tZW9uZSB3aG8ga25vd3MgZXhhY3RseSB3aGF0IHRoZXnigJlyZSBkb2luZyBhbmQgaXMgbm90IGdvaW5nIHRvIGV4cGxhaW4gaXQuCgrigJxXZXJlIHlvdSBnb2luZyB0byB0YWtlIGl0P+KAnSB5b3UgYXNrLgoKU2hlIGNvbnNpZGVycyB0aGlzLiDigJxZZXMs4oCdIHNoZSBzYXlzLiDigJxBbmQgSSB3YXMgZ29pbmcgdG8gdGVsbCB5b3UgSeKAmWQgZm91bmQgaXQu4oCdCgpUaGlzIGlzLCB5b3UgcmVhbGlzZSwgYSBjb21wbGljYXRlZCBhbnN3ZXIuIFlvdSByZXNwZWN0IGl0Lg==',
            'choices' => [
                ['text' => 'V2FsayBvdXQgdG9nZXRoZXI=', 'next' => '8_outside'],
            ],
        ],
        '8_outside' => [
            'prose'   => 'VGhlIHBhc3NhZ2Ugb3V0IGlzIHR3ZW50eSBtZXRyZXMuIEJlbGEgd2Fsa3MgYWhlYWQgd2l0aCBoZXIgbGFtcC4gUGV0cmEgd2Fsa3MgYmVoaW5kIHlvdS4KCkZyZWQgaXMgYXQgdGhlIGNhdmUgZW50cmFuY2Ugd2l0aCBnaW5nZXIgdGVhIGFuZCBhbiBleHByZXNzaW9uIG9mIHVuY29uY2VybmVkIGludGVyZXN0LgoK4oCcT2gs4oCdIGhlIHNheXMuIOKAnFlvdSBmb3VuZCBzb21lb25lLiBJcyBzaGUgY29taW5nIHdpdGggdXM/4oCdCgpQZXRyYSBzYXlzOiDigJxBYnNvbHV0ZWx5IG5vdC7igJ0KCkZyZWQgc2F5czog4oCcUmlnaHQuIFdlbGwu4oCdIEhlIGV4dGVuZHMgYSBzZWNvbmQgdGluIGN1cCB0b3dhcmQgaGVyLiBUaGUgZ2luZ2VyIHRlYSBzdGVhbXMgZ2VudGx5IGluIHRoZSBjb29sIGNhdmUgZW50cmFuY2UgYWlyLiBBIHBhdXNlLgoKUGV0cmEgdGFrZXMgdGhlIGN1cC4KCkp1cmlqIGFwcGVhcnMgZnJvbSB0aGUgY2FudGVlbiBhbmQgcHJvZHVjZXMgZ2luZ2VyIGJlZXIgZnJvbSBhIGNyYXRlIOKAlCBjb2xkLCBmYWludGx5IHN3ZWV0LCB0YXN0aW5nIG9mIHRoZSBtaW5lcmFsIHdhdGVyIHVzZWQgdG8gY2hpbGwgaXQuIFlvdSBzdGFuZCBpbiB0aGUgY2F2ZSBtb3V0aCB3aGlsZSB0aGUgbGlnaHQgb3V0c2lkZSBpcyB3YXJtIGFuZCB0aGUgYWlyIGJlaGluZCB5b3UgaXMgc3RpbGwgY29vbCBvbiB0aGUgYmFjayBvZiB5b3VyIG5lY2suCgpGcmVkIGhhcyBhIGNhbGNpdGUgc2hhcmQgd3JhcHBlZCBpbiBjbG90aC4g4oCcRnJvbSB0aGUgY2hhbWJlciBmbG9vci4gVHJhY2UgbWluZXJhbCBpbmNsdXNpb25zLiBWZXJ5IHNwZWNpZmljIHNpZ25hdHVyZS7igJ0gSGUgaXMgYWxyZWFkeSB0aGlua2luZyBhYm91dCB0aGUgQ291bnTigJlzIGNvbGxlY3Rpb24u',
            'choices' => [
                ['text' => 'U3RheSB3aXRoIHRoZSB0aG91Z2h0IG9mIHRoZSBjaGFtYmVy', 'next' => '9_end_crystal'],
                ['text' => 'TG9vayBhY3Jvc3MgYXQgUGV0cmEgaW4gdGhlIGxpZ2h0', 'next' => '9_end_petra'],
            ],
        ],
        '9_end_crystal' => [
            'prose'   => 'VGhlIGNoYW1iZXIgd2FzIHRoZXJlIGJlZm9yZSBhbnlvbmUga25ldyBhYm91dCBpdC4gQmVmb3JlIHRoZSBtaW5pbmcgY29tcGFueSwgYmVmb3JlIHRoZSB0b3VyaXN0IHRyYWluLCBiZWZvcmUgQmVsYSwgYmVmb3JlIGdyYW5kbW90aGVyLiBUaGUgY3J5c3RhbHMgZ3JldyBhdCBhIHJhdGUgdGhhdCBtYWtlcyBjZW50dXJpZXMgYSB1bml0IHNvIHNtYWxsIGl0IGJhcmVseSByZWdpc3RlcnMuIFRoZSBzdHJlYW0gcmFuIGluIHRoZSBkYXJrIGFuZCBrZXB0IHJ1bm5pbmcuCgpHcmFuZG1vdGhlciBsZWZ0IGEgc3F1YXJlIHRoZXJlIGJlY2F1c2Ugc2hlIGhhZCBiZWVuIGluIHRoZSByb29tIGFuZCB1bmRlcnN0b29kIHdoYXQgaXQgd2FzOiBhIHRoaW5nIHRoYXQgZW5kdXJlZCB3aXRob3V0IHJlcXVpcmluZyB3aXRuZXNzLiBUaGUgc3F1YXJlIHdhcyB0aGUgd2l0bmVzcyBzaGUgc2VudCBpbnN0ZWFkIG9mIGhlcnNlbGYuCgpUaGUgY3J5c3RhbCBzaGFyZCBpcyBpbiBGcmVk4oCZcyBzcGVjaW1lbiBjbG90aCwgd2hpY2ggaXMgZWZmZWN0aXZlbHkgdGhlIHNhbWUgYXMgYmVpbmcgaW4geW91ciBwb2NrZXQuIEhlIHdpbGwgZXhwbGFpbiBpdCB3aGVuIHRoZXJlIGlzIGEgcmVsZXZhbnQgb2NjYXNpb24uIFRoZXJlIHdpbGwgYmUgb25lLgoKVGhlIHZpbGxhZ2UgaW5uIGlzIHdhcm0sIGFuZCB0aGVyZSBpcyBzb3VwLCBhbmQgUGV0cmEgaXMgYWNyb3NzIHRoZSB0YWJsZSBlYXRpbmcgd2l0aCB0aGUgZm9jdXNlZCBhdHRlbnRpb24gb2Ygc29tZW9uZSB3aG8gaGFzIGJlZW4gdW5kZXJncm91bmQgZm9yIG1vc3Qgb2YgdGhlIGRheS4gSmFtZXMgaXMgYXNsZWVwIGluIGhpcyBiYWcgYmVmb3JlIHRoZSBzb3VwIGFycml2ZXMuCgpGcmVkIGlzIGF0dGVtcHRpbmcgdG8gZXhwbGFpbiBjYWxjaXRlIGZvcm1hdGlvbiB0byB0aGUgcmV0aXJlZCBtaW5lciBhdCB0aGUgYmFyLiBUaGUgbWluZXIgbGlzdGVucyB3aXRoIHRoZSByZXNpZ25lZCBjb3VydGVzeSBvZiBhIG1hbiB3aG8gaGFzIG1hZGUgaGlzIHBlYWNlIHdpdGggcGFycm90cy4=',
            'ending'   => true,
        ],
        '9_end_petra' => [
            'prose'   => 'UGV0cmEgaXMgYWNyb3NzIHRoZSB0YWJsZSBhdCB0aGUgdmlsbGFnZSBpbm4sIGVhdGluZyBzb3VwIHdpdGggdGhlIGF0dGVudGlvbiBvZiBzb21lb25lIHdobyBoYXMgYmVlbiB1bmRlcmdyb3VuZCBmb3IgbW9zdCBvZiB0aGUgZGF5LgoKU2hlIGhhcyBncmFuZG1vdGhlcuKAmXMgZXllcy4gVGhlIHNhbWUgc2hhcGUsIHRoZSBzYW1lIHdheSBvZiBhc3Nlc3Npbmcg4oCUIG9mIGxvb2tpbmcgYXMgaWYgaXQgZXhwZWN0cyB0byBmaW5kIHNvbWV0aGluZyB3b3J0aCBmaW5kaW5nLiBZb3UgaGF2ZSBiZWVuIHRvbGQsIGFsbCB5b3VyIGxpZmUsIHRoYXQgeW91IGhhdmUgZ3JhbmRtb3RoZXLigJlzIGV5ZXMuIFlvdSBoYWQgbm90IHRob3VnaHQgYWJvdXQgd2hhdCB0aGF0IG1lYW50IHVudGlsIHRoaXMgYWZ0ZXJub29uLgoKU2hlIGlzIHRoZSBkYXVnaHRlciBvZiB0aGUgZXN0cmFuZ2VkIHNpc3Rlci4gU2hlIGdyZXcgdXAgd2l0aCBhIGRpZmZlcmVudCBhY2NvdW50IG9mIHdoeS4gU2hlIGNhbWUgdG8gdGhlc2UgY2F2ZXMgYWxvbmUsIHdpdGggaGVyIG93biBtYXAsIGluIG1vcmUgb2YgYSBodXJyeSwgYW5kIHNoZSBmb3VuZCB0aGVtLgoKRnJlZCByZWZpbGxzIGhlciBnaW5nZXIgdGVhIHdpdGhvdXQgYXNraW5nLiBTaGUgZG9lcyBub3QgY29tbWVudCBvbiB0aGlzLgoKSmFtZXMgb3BlbnMgb25lIGV5ZSwgbG9va3MgYXQgUGV0cmEgYWNyb3NzIHRoZSB0YWJsZSwgY2xvc2VzIGl0IGFnYWluLiBPdXRzaWRlLCB0aGUgZXZlbmluZyBsaWdodCBkb2VzIHNvbWV0aGluZyBzcGVjaWZpYyB0byB0aGUgd2hpdGUgbGltZXN0b25lIGhpbGxzLiBUaGUgY3J5c3RhbCBzaGFyZCBpcyB3cmFwcGVkIGluIGNsb3RoIGluIEZyZWTigJlzIGNhc2UuIEl0IHdpbGwgdGVsbCB0aGVtIHNvbWV0aGluZyBsYXRlci4gSXQgYWx3YXlzIGRvZXMu',
            'ending'   => true,
        ],
    ],
];
