<?php
return [
    'id'    => 23,
    'title' => 'They Walked Off This Island Free',
    'color' => '#2A6A5A',

    'pages' => [
        '1_start' => [
            'prose'  => 'VHJvbWVsaW4gaXMgZmxhdCwgbG93LCBlbnRpcmVseSB3aXRob3V0IHRoZSBzaGVsdGVyIG9mIGhpZ2hlciBncm91bmQsIGRpc3B1dGVkIGJ5IG1vcmUgdGhhbiBvbmUgZ292ZXJubWVudCBhbmQgaW5oYWJpdGVkIGJ5IG5vIG9uZSBhdCBhbGwgZXhjZXB0IGEgc21hbGwgcm90YXRpbmcgY3JldyB3aG8ga2VlcCB0aGUgd2VhdGhlciBzdGF0aW9uIHJ1bm5pbmcgdGhyb3VnaCBhIHBvc3RpbmcgbW9zdCBwZW9wbGUgd291bGQgZmluZCB1bmJlYXJhYmx5IGxvbmVseS4gVGhlIEvFjXR1a3UgbW9vcnMgaW4gb3BlbiB3YXRlciwgbm8gcHJvcGVyIGFuY2hvcmFnZSB0byBzcGVhayBvZiwgdGhlIGlzbGFuZCBpdHNlbGYgYmFyZWx5IHJpc2luZyBhYm92ZSB0aGUgd2F2ZXMgdGhhdCBzdXJyb3VuZCBpdCBvbiBldmVyeSBzaWRlLgoKU29sYW5nZSBpcyBxdWlldGVyIHRoYW4gdXN1YWwgb24gdGhlIGFwcHJvYWNoLCB0aGUgcGFydGljdWxhciBxdWlldCBvZiBzb21lb25lIHdobyBrbm93cyB3aGF0IGhhcHBlbmVkIGhlcmUgYW5kIGlzbid0IGdvaW5nIHRvIHByZXRlbmQgb3RoZXJ3aXNlLiBUd28gd2F5cyB0b3dhcmQgdGhlIG9sZCB3cmVjayBzaXRlIHByZXNlbnQgdGhlbXNlbHZlczogYWxvbmcgdGhlIGV4cG9zZWQgb3V0ZXIgcmVlZiwgY2xvc2VzdCB0byBvcGVuIHdhdGVyLCBvciB0aHJvdWdoIHRoZSBsb3cgc2NydWIgd2hlcmUgdGhlIGFiYW5kb25lZCBzdXJ2aXZvcnMgb25jZSBidWlsdCB0aGVpciBsb25nLCBwYXRpZW50IGNhbXAu',
            'choices' => [
                ['text' => 'Rm9sbG93IHRoZSBvdXRlciByZWVm', 'next' => '2_reef'],
                ['text' => 'R28gYnkgd2F5IG9mIHRoZSBvbGQgY2FtcCBzaXRl', 'next' => '2_camp'],
            ],
        ],
        '2_reef' => [
            'prose'  => 'VGhlIHJlZWYgaXMgc3RhcmssIHdpbmQtc2NvdXJlZCwgd2F2ZXMgd29ya2luZyBjb25zdGFudGx5IGFnYWluc3QgY29yYWwgdGhhdCdzIGNsYWltZWQgbW9yZSB0aGFuIG9uZSBzaGlwIG92ZXIgdGhlIGNlbnR1cmllcywgdGhpcyBzdHJldGNoIG9mIHdhdGVyIGNhcnJ5aW5nIHJlYWwsIHNwZWNpZmljIHdlaWdodCBiZW5lYXRoIGl0cyBvcmRpbmFyeSB0cm9waWNhbCBibHVlLgoKT25lIG9mIHRoZSB3ZWF0aGVyLXN0YXRpb24gY3Jldywgb3V0IGNoZWNraW5nIGVxdWlwbWVudCwgc3RyYWlnaHRlbnMgYW5kIHdhdmVzIHlvdSBvdmVyLCBhbHJlYWR5IGd1ZXNzaW5nIHlvdXIgcmVhc29uIGZvciBiZWluZyBoZXJlLiAnTW9zdCBwZW9wbGUgZ28gdGhlIHJlZWYgd2F5IGZpcnN0LCcgc2hlIHNheXMuICdTZWUgd2hlcmUgaXQgaGFwcGVuZWQgYmVmb3JlIHRoZXkgc2VlIHdoZXJlIHBlb3BsZSBzdXJ2aXZlZCBpdC4gVW5kZXJzdGFuZGFibGUsIEkgc3VwcG9zZS4gVGhpcyB3YXkuJw==',
            'choices' => [
                ['text' => 'Rm9sbG93IGhlciBpbg==', 'next' => '3_shared'],
            ],
        ],
        '2_camp' => [
            'prose'  => 'VGhlIG9sZCBjYW1wIHNpdGUgaXMgbWFya2VkLCBxdWlldGx5IGFuZCB3aXRob3V0IGZhbmZhcmUsIGJ5IGEgZmV3IGxvdyBzdG9uZSBmb3VuZGF0aW9ucyBoYWxmLXN3YWxsb3dlZCBieSBzY3J1YiDigJQgd2hhdCdzIGxlZnQgb2Ygc2hlbHRlcnMgYnVpbHQgYW5kIHJlYnVpbHQgb3ZlciBmaWZ0ZWVuIGxvbmcgeWVhcnMgYnkgcGVvcGxlIGEgc2hpcCdzIGNyZXcgc2FpbGVkIGF3YXkgZnJvbSBhbmQgZGlkIG5vdCBjb21lIGJhY2sgZm9yIGFzIHByb21pc2VkLgoKT25lIG9mIHRoZSB3ZWF0aGVyLXN0YXRpb24gY3Jldywga25lZWxpbmcgbmVhcmJ5IGNsZWFyaW5nIGdyb3d0aCBmcm9tIGEgbG93IG1hcmtlciBzdG9uZSwgbG9va3MgdXAgYW5kIG5vZHMgeW91IGZ1cnRoZXIgaW4gd2l0aG91dCBuZWVkaW5nIG11Y2ggZXhwbGFuYXRpb24uICdGaWd1cmVkIHNvbWVvbmUgd291bGQgY29tZSB0aGlzIHdheSBldmVudHVhbGx5LiBNb3N0IHBlb3BsZSBkbywgb25jZSB0aGV5IGtub3cgdGhlIGNhbXAncyBoZXJlLic=',
            'choices' => [
                ['text' => 'Rm9sbG93IGhpbSBpbg==', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'V2hpY2hldmVyIHdheSB5b3UgY2FtZSwgeW91IGVuZCB1cCB0b2dldGhlciBhdCB0aGUgc21hbGwgc3RhdGlvbiwgd2hlcmUgdGhlIGNyZXcg4oCUIHRocmVlIG9mIHRoZW0sIHRoaXMgc2Vhc29uLCBjaGVlcmZ1bGx5IGNhbGxpbmcgdGhlaXIgd2hvbGUgdGlueSB3b3JsZCAndGhlIHJvY2snIOKAlCB0ZWxsIHlvdSB0aGUgaGlzdG9yeSBwbGFpbmx5LCB3aXRob3V0IGVpdGhlciBmbGluY2hpbmcgZnJvbSBpdCBvciBtYWtpbmcgYSBwZXJmb3JtYW5jZSBvZiB0aGUgdGVsbGluZy4gQSBzbGF2ZSBzaGlwIHdyZWNrZWQgaGVyZSBpbiAxNzYxLiBJdHMgY3JldyBidWlsdCBhIGJvYXQgZnJvbSB0aGUgd3JlY2thZ2UsIHNhaWxlZCBmb3IgaGVscCwgYW5kIGxlZnQgYmVoaW5kIGRvemVucyBvZiB0aGUgZW5zbGF2ZWQgcGVvcGxlIHRoZXknZCBiZWVuIGNhcnJ5aW5nLCBwcm9taXNpbmcgdG8gcmV0dXJuLgoKJ05vYm9keSBjYW1lIGJhY2sgZm9yIGZpZnRlZW4geWVhcnMsJyB0aGUgc2VuaW9yIG9mIHRoZSB0aHJlZSBzYXlzLiAnQW5kIHdoZW4gYSBzaGlwIGZpbmFsbHkgZGlkLCB0aGVyZSB3ZXJlIHN0aWxsIHBlb3BsZSBoZXJlLiBTdXJ2aXZvcnMuIE1vc3RseSB3b21lbiwgYnkgdGhlbi4gQnVpbHQgc2hlbHRlciwga2VwdCBmaXJlIGdvaW5nIHNvbWVob3csIG1hZGUgYSBsaWZlIG91dCBvZiBub3RoaW5nIGJ1dCByZWVmIGFuZCBncml0IGFuZCBlYWNoIG90aGVyLCBmb3IgZmlmdGVlbiB5ZWFycywgb24gYSBzcGl0IG9mIHNhbmQgc21hbGxlciB0aGFuIG1vc3QgZmFybXMuJyBIZSBsb29rcyBvdXQgYXQgdGhlIGZsYXQsIGxvdyBob3Jpem9uLiAnVGhleSB3YWxrZWQgb2ZmIHRoaXMgaXNsYW5kIGZyZWUuIFRoYXQgcGFydCBtYXR0ZXJzIGFzIG11Y2ggYXMgdGhlIHdyZWNrIGRvZXMuIE1vcmUsIGhvbmVzdGx5Lic=',
            'terminal' => true,
            'choices' => [
                ['text' => 'QXNrIGhvdyB5b3UgY2FuIGhlbHA=', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIHN0YXRpb24gYWx3YXlzIG5lZWRzIHByYWN0aWNhbCBoYW5kcyDigJQgdGhlIHdlYXRoZXIgaW5zdHJ1bWVudHMgd2FudCBjaGVja2luZyBhbmQgcmVjYWxpYnJhdGluZywgZmlkZGx5LCBwcmVjaXNlIHdvcmssIG9yIHRoZSBzbWFsbCBtZW1vcmlhbCBtYXJrZXIgYXQgdGhlIG9sZCBjYW1wIHNpdGUgd2FudHMgaXRzIHBsYXF1ZSBjbGVhbmVkIGFuZCBpdHMgc3RvbmV3b3JrIHByb3Blcmx5IHRlbmRlZCwgYSBxdWlldCBhY3Qgb2Ygb25nb2luZyByZXNwZWN0IHRoZSByb3RhdGluZyBjcmV3cyBoYXZlIGtlcHQgdXAgZm9yIHllYXJzIHdpdGhvdXQgYW55b25lIHJlcXVpcmluZyBpdCBvZiB0aGVtLgoKJ0JvdGggbWF0dGVyLCcgdGhlIHNlbmlvciBjcmV3IG1lbWJlciBzYXlzLiAnT25lIGtlZXBzIHNoaXBzIHNhZmVyIHRvZGF5LiBUaGUgb3RoZXIga2VlcHMgc29tZXRoaW5nIGZyb20ganVzdCBiZWluZyBmb3Jnb3R0ZW4uIFBpY2sgd2hpY2hldmVyIGZlZWxzIHJpZ2h0IHRvIHlvdXIgaGFuZHMuJw==',
            'choices' => [
                ['text' => 'SGVscCByZWNhbGlicmF0ZSB0aGUgd2VhdGhlciBpbnN0cnVtZW50cw==', 'next' => '5_weather'],
                ['text' => 'SGVscCB0ZW5kIHRoZSBtZW1vcmlhbCBtYXJrZXI=', 'next' => '5_marker'],
            ],
        ],
        '5_weather' => [
            'prose'  => 'UmVjYWxpYnJhdGluZyB0aGUgaW5zdHJ1bWVudHMgaXMgZmlkZGx5LCBleGFjdGluZywgZW50aXJlbHkgdW5nbGFtb3JvdXMgd29yaywgY2hlY2tlZCBhbmQgcmVjaGVja2VkIGFnYWluc3QgcmVhZGluZ3MgdGhhdCBtYXR0ZXIgdG8gc2hpcHMgYW5kIGZvcmVjYXN0cyBodW5kcmVkcyBvZiBtaWxlcyBmcm9tIHRoaXMgZmxhdCBzcGl0IG9mIHNhbmQuIEl0J3MgYSBzdHJhbmdlLCBxdWlldCBwcml2aWxlZ2UsIGhlbHBpbmcga2VlcCBzb21ldGhpbmcgcnVubmluZyB0aGF0IGV4aXN0cyBwdXJlbHkgc28gZmV3ZXIgcGVvcGxlIGV2ZXIgaGF2ZSB0byBsZWFybiB0aGlzIHJlZWYncyBsZXNzb24gdGhlIGhhcmQgd2F5IGFnYWluLgoKVGhlIGNyZXcgd29ya3MgYWxvbmdzaWRlIHlvdSB3aXRoIHRoZSBlYXN5IGNvbXBldGVuY2Ugb2YgcGVvcGxlIHdobyd2ZSBkb25lIHRoaXMgam9iIGluIGdlbnVpbmUgaXNvbGF0aW9uIGxvbmcgZW5vdWdoIHRvIGhhdmUgc3RvcHBlZCBuZWVkaW5nIHRvIHRhbGsgdGhyb3VnaCBldmVyeSBzdGVwLg==',
            'choices' => [
                ['text' => 'SGVhZCB0byB0aGUgd3JlY2sgc2l0ZSB0b2dldGhlcg==', 'next' => '6_shared'],
            ],
        ],
        '5_marker' => [
            'prose'  => 'VGVuZGluZyB0aGUgbWVtb3JpYWwgbWFya2VyIGlzIHNsb3csIGNhcmVmdWwsIHF1aWV0IHdvcmsg4oCUIGNsZWFyaW5nIGdyb3d0aCwgY2xlYW5pbmcgdGhlIHBsYXF1ZSdzIHNpbXBsZSBlbmdyYXZlZCBuYW1lcyBhbmQgZGF0ZXMsIHJlc2V0dGluZyBhIGJvcmRlciBzdG9uZSB0aGF0J3Mgc2x1bXBlZCB3aXRoIHdlYXRoZXIgYW5kIHRpbWUuIE5vYm9keSB0YWxrcyBtdWNoIHdoaWxlIHlvdSB3b3JrLiBJdCBkb2Vzbid0IGZlZWwgbGlrZSBpdCB3YW50cyB0YWxraW5nLgoKQnkgdGhlIGVuZCwgdGhlIG1hcmtlciBzdGFuZHMgY2xlYXIgYW5kIGxlZ2libGUgYWdhaW4sIGEgc21hbGwsIGRlbGliZXJhdGUgYWN0IG9mIG5vdC1mb3JnZXR0aW5nIGtlcHQgYWxpdmUgYnkgcGVvcGxlIHdobyBuZXZlciBrbmV3IHRoZSBzdXJ2aXZvcnMgcGVyc29uYWxseSBhbmQgdGVuZCBpdCBhbnl3YXksIGZhaXRoZnVsbHksIHNlYXNvbiBhZnRlciByb3RhdGluZyBzZWFzb24u',
            'choices' => [
                ['text' => 'SGVhZCB0byB0aGUgd3JlY2sgc2l0ZSB0b2dldGhlcg==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'RG93biBhdCB0aGUgcmVlZidzIGVkZ2UsIHdoZXJlIHRoZSBvbGQgd3JlY2sgc3RpbGwgb2NjYXNpb25hbGx5IGdpdmVzIHVwIGEgZnJhZ21lbnQgYWZ0ZXIgYSBoYXJkIHN3ZWxsLCB0aGUgY3JldyBoZWxwcyB5b3UgZmluZCB3aGF0IHlvdSBjYW1lIGZvciDigJQgYSBzaW5nbGUgc2hhcmQgb2Ygb2xkLCBzZWEtd29ybiBnbGFzcywgdGhpY2sgYW5kIGJvdHRsZS1ncmVlbiwgdHVtYmxlZCBzbW9vdGggYnkgdHdvIGFuZCBhIGhhbGYgY2VudHVyaWVzIG9mIGV4YWN0bHkgdGhpcyBzYW1lIHJlbGVudGxlc3Mgc3VyZi4KCidGcm9tIHRoZSBzaGlwLCBtb3N0IGxpa2VseSwnIHRoZSBzZW5pb3IgY3JldyBtZW1iZXIgc2F5cywgdHVybmluZyBpdCBvdmVyIG9uY2UgYmVmb3JlIGhhbmRpbmcgaXQgYWNyb3NzLiAnT3IgbmVhciBlbm91Z2ggbm90IHRvIG1hdHRlciB3aGljaC4gV2hhdGV2ZXIgaXQgaXMsIGl0IHN1cnZpdmVkIHRoaXMgcmVlZiBhIGxvdCBsb25nZXIgdGhhbiBtb3N0IHRoaW5ncyBkby4gRmVlbHMgbGlrZSBpdCBlYXJuZWQgd2hlcmV2ZXIgaXQgZW5kcyB1cCBuZXh0Lic=',
            'choices' => [
                ['text' => 'VGhhbmsgdGhlbSBhbmQgaGVhZCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayB0byB0aGUgYW5jaG9yYWdlIGFjcm9zcyB0aGUgZmxhdCwgbG93IGlzbGFuZCwgdGhlIHdlYXRoZXIgc3RhdGlvbidzIHNtYWxsIHNpbGhvdWV0dGUgYW5kIHRoZSBvbGQgY2FtcCdzIHF1aWV0IHN0b25lIG1hcmtlcnMgYm90aCByZWNlZGluZyB0b2dldGhlciBiZWhpbmQgeW91LCB0aGlzIHdob2xlIHN0YXJrLCByZW1vdGUgcGxhY2UgaG9sZGluZyBpdHMgdHdvIGNlbnR1cmllcyBvZiBoaXN0b3J5IHdpdGggbW9yZSBncmFjZSB0aGFuIG1vc3QgbW9udW1lbnRzIG1hbmFnZS4KClNvbGFuZ2UsIHdhaXRpbmcgYXQgdGhlIHdhdGVyJ3MgZWRnZSwgdGFrZXMgdGhlIGdsYXNzIHNoYXJkIGZyb20geW91IHdpdGggdW51c3VhbCBnZW50bGVuZXNzLiAnT25lIG1vcmUgbGVnIGFmdGVyIHRoaXMsJyBzaGUgc2F5cy4gJ1RoZW4gaG9tZS4nIFNoZSBkb2Vzbid0IHNheSBhbnl0aGluZyBlbHNlIGZvciBhIHdoaWxlLCBhbmQgeW91IGZpbmQgeW91IGRvbid0IG5lZWQgaGVyIHRvLg==',
            'choices' => [
                ['text' => 'U2l0IHdpdGggdGhlIHdlaWdodCBvZiB0aGUgZGF5IGJlZm9yZSB5b3UgbGlmdCBvZmY=', 'next' => '8_end_sit'],
                ['text' => 'TGV0IHRoZSBjcm9zc2luZyBob21lIGJlZ2luIHN0cmFpZ2h0IGF3YXk=', 'next' => '8_end_begin'],
            ],
        ],
        '8_end_sit' => [
            'prose'  => 'WW91IHNpdCB3aXRoIGl0IGEgd2hpbGUgYmVmb3JlIHRoZSBLxY10dWt1IGxpZnRzIOKAlCBub3QgZ3JpbSwgZXhhY3RseSwganVzdCBwcm9wZXJseSB3ZWlnaHRlZCwgdGhlIHdheSBhIHBsYWNlIGxpa2UgdGhpcyBkZXNlcnZlcyBiZWZvcmUgeW91IGxldCBpdCByZWNlZGUgaW50byBqdXN0IGFub3RoZXIgc3RvcCBvbiBhIGxvbmcgaXRpbmVyYXJ5LiBUaGUgQmFyb24sIHVudXN1YWxseSwgc2F5cyBub3RoaW5nIGF0IGFsbCwgd2hpY2ggZnJvbSBoaW0gaXMgaXRzIG93biBmb3JtIG9mIHJlc3BlY3QuCgpXaGVuIHlvdSBmaW5hbGx5IGxpZnQgb2ZmLCBUcm9tZWxpbiBmbGF0dGVuaW5nIGZhc3QgaW50byB0aGUgdmFzdCBzdXJyb3VuZGluZyBibHVlLCB5b3UgZmluZCB0aGUgc2hhcmQgcmlkZXMgZGlmZmVyZW50bHkgaW4gdGhlIHNhdGNoZWwgdGhhbiBhbnl0aGluZyBlbHNlIHlvdSd2ZSBjYXJyaWVkIOKAlCBoZWF2aWVyLCBzb21laG93LCBpbiBhIHdheSB0aGF0IGhhcyBub3RoaW5nIHRvIGRvIHdpdGggZ2xhc3Mu',
            'ending' => true,
        ],
        '8_end_begin' => [
            'prose'  => 'WW91IGxldCB0aGUgY3Jvc3NpbmcgaG9tZSBiZWdpbiBzdHJhaWdodCBhd2F5LCBkZWNpZGluZyB0aGUgYmVzdCByZXNwZWN0IHlvdSBjYW4gcGF5IGEgcGxhY2UgbGlrZSB0aGlzIGlzIHNpbXBseSB0byBjYXJyeSB3aGF0IGl0IGdhdmUgeW91IHByb3Blcmx5LCByYXRoZXIgdGhhbiBzaXR0aW5nIGluIHBlcmZvcm1hdGl2ZSB3ZWlnaHQgeW91IGRpZG4ndCBlYXJuIGFuZCB0aGV5IGRvbid0IG5lZWQgZnJvbSB5b3UuCgpUaGUgS8WNdHVrdSBsaWZ0cyBvZmYgVHJvbWVsaW4ncyBmbGF0LCBzdGFyayBzaWxob3VldHRlLCB0aGUgbGFzdCBsZWcgb2YgYSB2ZXJ5IGxvbmcgam91cm5leSBvcGVuaW5nIG91dCBhaGVhZCBvZiB5b3UsIGFuZCB0aGUgZ2xhc3Mgc2hhcmQgcmlkZXMgcXVpZXQgaW4gdGhlIHNhdGNoZWwg4oCUIG5vdCB0aGUgaGVhdmllc3QgdGhpbmcgeW91J3ZlIGNhcnJpZWQgdGhpcyB3aG9sZSB0cmlwLCBwZXJoYXBzLCBidXQgY2VydGFpbmx5IHRoZSBvbmUgdGhhdCBhc2tzIHRoZSBtb3N0IG9mIHlvdSBpbiByZXR1cm4gZm9yIGNhcnJ5aW5nIGl0IHdlbGwu',
            'ending' => true,
        ],
    ],
];
