<?php
return [
    'id'    => 10,
    'title' => 'The Other Half',
    'color' => '#8A8A6A',

    'pages' => [
        '1_start' => [
            'prose'  => 'UmVubmVsbCByaXNlcyBvdXQgb2YgdGhlIHNlYSBhcyBhIHNpbmdsZSByYWlzZWQgc2xhYiBvZiBhbmNpZW50IGNvcmFsLCBmbGF0LXRvcHBlZCBhbmQgY292ZXJlZCBpbiBkZW5zZSBmb3Jlc3QsIHdpdGggTGFrZSBUZWdhbm8gbHlpbmcgYXQgaXRzIGhlYXJ0IGxpa2Ugc29tZXRoaW5nIHRoYXQgc2hvdWxkbid0IGV4aXN0IGhlcmUg4oCUIGEgdmFzdCBib2R5IG9mIGJyYWNraXNoIHdhdGVyLCBzZWFsZWQgb2ZmIGZyb20gdGhlIHNlYSBmb3Igc28gbG9uZyBpdCdzIGdyb3duIGl0cyBvd24gcXVpZXRseSBzdHJhbmdlIHZlcnNpb24gb2YgZXZlcnl0aGluZzogaXRzIG93biBmaXNoLCBpdHMgb3duIHBhcnRpY3VsYXIgaHVzaC4KClNvbGFuZ2UgbW9vcnMgdGhlIEvFjXR1a3Ugb2ZmIHRoZSBsYWtlJ3MgZWRnZSByYXRoZXIgdGhhbiB0aGUgY29hc3QgcHJvcGVyLCBhbiBvcHRpb24gbm9uZSBvZiB0aGUgcHJldmlvdXMgc3RvcHMgb2ZmZXJlZC4gJ1dlIGNhbiB3YWxrIHRoZSBzaG9yZWxpbmUsJyBzaGUgc2F5cywgJ29yIGdvIHVwIG92ZXIgdGhlIGNsaWZmcyBhdCB0aGUgYXRvbGwncyByaW0uIEVpdGhlciB3YXkgaW4sIGJ1dCBub3QgdGhlIHNhbWUgd2FsayBhdCBhbGwuJw==',
            'choices' => [
                ['text' => 'V2FsayB0aGUgbGFrZXNob3Jl', 'next' => '2_lake'],
                ['text' => 'Q2xpbWIgdGhlIGNvYXN0YWwgY2xpZmZz', 'next' => '2_cliff'],
            ],
        ],
        '2_lake' => [
            'prose'  => 'VGhlIGxha2VzaG9yZSBwYXRoIGlzIGNsb3NlLCBodW1pZCwgdGhpY2sgd2l0aCB0aGUgY2FsbHMgb2YgYmlyZHMgdGhhdCBleGlzdCwgYXMgZmFyIGFzIHlvdSBjYW4gdGVsbCwgbm93aGVyZSBlbHNlIOKAlCB0aGUgbGFrZSBoYXZpbmcgc3BlbnQgc28gbG9uZyBjdXQgb2ZmIGZyb20gdGhlIG9wZW4gc2VhIHRoYXQgaXQncyBxdWlldGx5IGJlY29tZSBpdHMgb3duIHNtYWxsIHdvcmxkLCBpbmRpZmZlcmVudCB0byB3aGF0ZXZlcidzIGhhcHBlbmluZyBwYXN0IHRoZSBhdG9sbCdzIHJpbS4KCkEgZHVnb3V0IGNhbm9lIGdsaWRlcyBwYXN0IGNsb3NlIHRvIHNob3JlLCBpdHMgb2NjdXBhbnQgbGlmdGluZyBhIGhhbmQgaW4gZ3JlZXRpbmcgd2l0aG91dCBhbHRlcmluZyBjb3Vyc2UsIGFuZCBieSB0aGUgdGltZSB5b3UgcmVhY2ggdGhlIHNtYWxsIGxha2VzaWRlIHNldHRsZW1lbnQsIHdvcmQgb2YgeW91ciBhcnJpdmFsIGhhcyBjbGVhcmx5IGJlYXRlbiB5b3UgdGhlcmUuIEFuIG9sZGVyIG1hbiB3YWl0aW5nIGF0IHRoZSBsYW5kaW5nIGRvZXNuJ3QgbG9vayBzdXJwcmlzZWQgaW4gdGhlIHNsaWdodGVzdC4=',
            'choices' => [
                ['text' => 'QXBwcm9hY2ggaGlt', 'next' => '3_shared'],
            ],
        ],
        '2_cliff' => [
            'prose'  => 'VGhlIGNsaWZmIHJvdXRlIGNsaW1icyB0aGUgYXRvbGwncyByYWlzZWQgcmltLCBhIHdhbGwgb2YgYW5jaWVudCBjb3JhbCB0dXJuZWQgdG8gc29saWQgc3RvbmUsIHdvcm4gYW5kIHBpdHRlZCBpbiBhIHdheSB0aGF0IG1ha2VzIHlvdSBhY3V0ZWx5IGF3YXJlIHlvdSdyZSB3YWxraW5nIGFjcm9zcyB3aGF0IHVzZWQgdG8gYmUgYSByZWVmLCBsaWZ0ZWQgYm9kaWx5IG91dCBvZiB0aGUgc2VhIGJ5IGZvcmNlcyB0b28gc2xvdyBhbmQgdG9vIGxhcmdlIHRvIHByb3Blcmx5IHBpY3R1cmUuCgpUaGUgdmlldyBmcm9tIHRoZSB0b3AgaXMgd29ydGggdGhlIHNjcmFtYmxlIOKAlCB0aGUgd2hvbGUgbGFrZSBzcHJlYWQgb3V0IGJlbG93LCBkYXJrIGFuZCBzdGlsbCwgcmluZ2VkIGVudGlyZWx5IGJ5IGZvcmVzdCB3aXRoIG5vIGNsZWFyIGVkZ2Ugd2hlcmUgdGhlIHdhdGVyIHN0YXJ0cyBhbmQgdGhlIGxhbmQgZ2l2ZXMgdXAuIEEgc3RlZXAgdHJhY2sgbGVhZHMgZG93biB0aGUgaW5sYW5kIHNpZGUgdG93YXJkIGEgc21hbGwgc2V0dGxlbWVudCBhdCB0aGUgc2hvcmUsIHdoZXJlIHNvbWVvbmUncyBjbGVhcmx5IGFscmVhZHkgc3BvdHRlZCB5b3UgY29taW5nLg==',
            'choices' => [
                ['text' => 'SGVhZCBkb3duIHRvIHRoZSBzZXR0bGVtZW50', 'next' => '3_shared'],
            ],
        ],
        '3_shared' => [
            'prose'  => 'SG93ZXZlciB5b3UgYXJyaXZlZCwgdGhlIG1hbiBhdCB0aGUgbGFrZSdzIGVkZ2UgZ3JlZXRzIHlvdSB0aGUgc2FtZSB1bmh1cnJpZWQgd2F5LCBpbnRyb2R1Y2luZyBoaW1zZWxmIHNpbXBseSBhcyBzb21lb25lIHdobydzIG1pbmRlZCB0aGlzIHN0cmV0Y2ggb2Ygc2hvcmVsaW5lIGhpcyB3aG9sZSBsaWZlIGFuZCBoaXMgZmF0aGVyJ3Mgd2hvbGUgbGlmZSBiZWZvcmUgdGhhdC4gSGUga25vd3MgQXVudGllJ3MgbmFtZSBpbW1lZGlhdGVseSwgYW5kIHNvbWV0aGluZyBpbiBoaXMgZmFjZSBzaGlmdHMg4oCUIG5vdCBzdXJwcmlzZSwgbW9yZSBsaWtlIGEgZG9vciBoZSdkIGFzc3VtZWQgd2FzIHBlcm1hbmVudGx5IHNodXQgZWFzaW5nIG9wZW4gYSBjcmFjay4KCidTaGUgY2FtZSBoZXJlIG9uY2UsIGEgbG9uZyB0aW1lIGJhY2ssIGxvb2tpbmcgZm9yIHNvbWV0aGluZyBpbiB0aGUgb2xkIGNvcmFsIHVwIHBhc3QgdGhlIHRyZWVsaW5lLCcgaGUgc2F5cy4gJ0ZvdW5kIGl0IHRvby4gTGVmdCBoYWxmIG9mIGl0IGJlaGluZCBmb3Igd2hvZXZlciBjYW1lIGxvb2tpbmcgcHJvcGVybHkgbmV4dC4nIEhlIGxvb2tzIGF0IHlvdSBsaWtlIHlvdSBtaWdodCBiZSB0aGF0IHBlcnNvbi4gJ1dlbGwuIEFyZSB5b3U/Jw==',
            'terminal' => true,
            'choices' => [
                ['text' => 'VGVsbCBoaW0geW91IGFyZQ==', 'next' => '4_shared'],
            ],
        ],
        '4_shared' => [
            'prose'  => 'VGhlIG91dGNyb3Agc2hlIG1lYW5zIHNpdHMgd2VsbCBiYWNrIGZyb20gdGhlIGxha2UsIHVwIGEgc2xvcGUgdGhpY2sgd2l0aCByb290cyBhbmQgb2xkIGZhbGxlbiBjb3JhbCwgZW1iZWRkZWQgd2l0aCB0aGUgcGFsZSBnaG9zdC1zaGFwZXMgb2YgdGhpbmdzIHRoYXQgbGl2ZWQgaW4gYW4gb2NlYW4gbG9uZyBiZWZvcmUgdGhpcyBwYXJ0aWN1bGFyIGNodW5rIG9mIGl0IGV2ZXIgcm9zZSBvdXQgb2YgdGhlIHdhdGVyLiBHZXR0aW5nIHRvIGl0IG1lYW5zIGVpdGhlciBwYWRkbGluZyB0aGUgbGFrZSdzIGVkZ2UgdG8gdGhlIG5lYXJlc3QgbGFuZGluZyBwb2ludCwgb3Igd29ya2luZyBzdHJhaWdodCB1cCB0aHJvdWdoIHRoZSBmb3Jlc3Qgb24gZm9vdCDigJQgc2xvd2VyLCBidXQgd2l0aCBubyByaXNrIG9mIHRoZSBhZnRlcm5vb24gc3F1YWxsIGN1cnJlbnRseSBidWlsZGluZyBvdmVyIHRoZSBsYWtlIGNhdGNoaW5nIHlvdSBvdXQgb24gb3BlbiB3YXRlci4KClRoZSBtYW4gc2hydWdzLCBlbnRpcmVseSBuZXV0cmFsIGFib3V0IHRoZSBjaG9pY2UuICdMYWtlJ3MgZmFzdGVyIGlmIHRoZSB3ZWF0aGVyIGhvbGRzLiBGb3Jlc3QncyBzdXJlciBpZiBpdCBkb2Vzbid0LiBZb3VyIGNhbGwuJw==',
            'choices' => [
                ['text' => 'UGFkZGxlIGFjcm9zcw==', 'next' => '5_paddle'],
                ['text' => 'R28gdGhyb3VnaCB0aGUgZm9yZXN0', 'next' => '5_forest'],
            ],
        ],
        '5_paddle' => [
            'prose'  => 'WW91IG1ha2UgdGhlIGNyb3NzaW5nIGZhc3QsIGxvdyBpbiBhIGJvcnJvd2VkIGR1Z291dCwgdGhlIGxha2UncyBkYXJrIHdhdGVyIGJhcmVseSByaXBwbGluZyB1bmRlciB0aGUgcGFkZGxlIGFuZCB0aGUgc3F1YWxsIGJ1aWxkaW5nIHZpc2libHkgYXQgeW91ciBiYWNrIHRoZSB3aG9sZSB3YXkuIFlvdSBiZWF0IGl0IHRvIHRoZSBsYW5kaW5nIGJ5IG1pbnV0ZXMsIHB1bGxpbmcgdGhlIGNhbm9lIHVwIGp1c3QgYXMgdGhlIGZpcnN0IHJlYWwgZ3VzdHMgc3RhcnQgY29tYmluZyB0aGUgd2F0ZXIncyBzdXJmYWNlIGludG8gd2hpdGVjYXBzIGJlaGluZCB5b3UuCgpUaGUgbWFuIGxhdWdocywgZGVsaWdodGVkIHJhdGhlciB0aGFuIGFsYXJtZWQsIHdhdGNoaW5nIHRoZSB3ZWF0aGVyIGhlIHByZWRpY3RlZCBhcnJpdmUgZXhhY3RseSBvbiBzY2hlZHVsZS4gJ0dvb2QgdGltaW5nLiBPciBnb29kIGx1Y2suIENvbWVzIG91dCB0aGUgc2FtZSwgbW9zdGx5Lic=',
            'choices' => [
                ['text' => 'SGVhZCB1cCB0byB0aGUgb3V0Y3JvcA==', 'next' => '6_shared'],
            ],
        ],
        '5_forest' => [
            'prose'  => 'VGhlIGZvcmVzdCByb3V0ZSBpcyBzbG93ZXIgYW5kIHN0ZWFkaWVyLCByb290cyBhbmQgb2xkIGZhbGxlbiBjb3JhbCBtYWtpbmcgZXZlcnkgc3RlcCBhIHNtYWxsIG5lZ290aWF0aW9uLCB0aGUgc3F1YWxsJ3MgZmlyc3QgcmFpbiByZWFjaGluZyB5b3UgYXMgbm8gbW9yZSB0aGFuIGEgY2hhbmdlIGluIHRoZSBsaWdodCBmaWx0ZXJpbmcgZG93biB0aHJvdWdoIHRoZSBjYW5vcHkg4oCUIGhlYXJkIHdlbGwgYmVmb3JlIGl0J3MgZmVsdCwgYW5kIG5ldmVyIGZlbHQgd2l0aCBhbnkgcmVhbCBmb3JjZSBhdCBhbGwgdW5kZXIgdGhpcyBtdWNoIGNvdmVyLgoKQnkgdGhlIHRpbWUgeW91IHJlYWNoIHRoZSBvdXRjcm9wLCB0aGUgd29yc3Qgb2YgdGhlIHdlYXRoZXIgaGFzIGFscmVhZHkgc3BlbnQgaXRzZWxmIG91dCBvdmVyIHRoZSBvcGVuIGxha2UgYmVoaW5kIHlvdSwgYW5kIHRoZSBtYW4sIHdhaXRpbmcgdW5kZXIgYSBkcmlwcGluZyB0cmVlLCBsb29rcyBlbnRpcmVseSB1bnN1cnByaXNlZCB0aGF0IHRoZSBmb3Jlc3Qga2VwdCB5b3UgZHJ5Lg==',
            'choices' => [
                ['text' => 'SGVhZCB1cCB0byB0aGUgb3V0Y3JvcA==', 'next' => '6_shared'],
            ],
        ],
        '6_shared' => [
            'prose'  => 'VGhlIG91dGNyb3AgaXRzZWxmIGlzIHN0YXJ0bGluZyB1cCBjbG9zZSDigJQgYW5jaWVudCBjb3JhbCB0dXJuZWQgdG8gc3RvbmUsIHN0dWRkZWQgd2l0aCBmb3NzaWwgc2hlbGxzIGFuZCB0aGUgcGFsZSBvdXRsaW5lcyBvZiB0aGluZ3Mgd2l0aCBubyBsaXZpbmcgcmVsYXRpdmVzIGxlZnQgaW4gdGhpcyBvY2VhbiBvciBhbnkgb3RoZXIsIGEgd2hvbGUgdmFuaXNoZWQgcmVlZiBob2xkaW5nIGl0cyBzaGFwZSBpbiByb2NrIGxvbmcgYWZ0ZXIgdGhlIHNlYSB0aGF0IGJ1aWx0IGl0IG1vdmVkIG9uLgoKVGhlIG1hbiBzaG93cyB5b3UgZXhhY3RseSB3aGVyZSB0byB3b3JrLCBhIHNwb3QgYWxyZWFkeSBoYWxmLXF1YXJyaWVkIGZyb20gc29tZSBwcmV2aW91cyB2aXNpdCBkZWNhZGVzIGJhY2ssIGFuZCB0b2dldGhlciB5b3UgZnJlZSBhIGZpc3Qtc2l6ZWQgY2h1bmsgZGVuc2Ugd2l0aCBmb3NzaWwgc2hlbGwsIGNvb2wgYW5kIHVuZXhwZWN0ZWRseSBoZWF2eSBpbiB5b3VyIHBhbG0uICdHb29kIGJhbGxhc3QsJyBoZSBzYXlzLCBtYXR0ZXItb2YtZmFjdC4gJ0dvb2QgaGlzdG9yeSB0b28sIGlmIHlvdSB3YW50IHRvIHRoaW5rIG9mIGl0IHRoYXQgd2F5LiBEb2Vzbid0IGhhdmUgdG8gYmUgb25seSBvbmUgb3IgdGhlIG90aGVyLic=',
            'choices' => [
                ['text' => 'VGhhbmsgaGltIGFuZCBzdGFydCBiYWNr', 'next' => '7_shared'],
            ],
        ],
        '7_shared' => [
            'prose'  => 'WW91IHdhbGsgYmFjayBkb3duIHRvIHRoZSBsYWtlJ3MgZWRnZSB0b2dldGhlciwgdGhlIHNxdWFsbCB3ZWxsIHBhc3Qgbm93IGFuZCB0aGUgbGlnaHQgdHVybmluZyB0aGUgcGFydGljdWxhciBnb2xkIHRoYXQgY29tZXMgYWZ0ZXIgcmVhbCByYWluIGFueXdoZXJlIGluIHRoZSB3b3JsZC4gVGhlIG1hbiBkb2Vzbid0IGNvbWUgYWxsIHRoZSB3YXkgdG8gdGhlIGFuY2hvcmFnZSDigJQgJ1RoaXMgaXMgYXMgZmFyIGFzIEkgZ28sIHRoZXNlIGRheXMnIOKAlCBidXQgaGUgd2F0Y2hlcyB5b3UgdGhlIHdob2xlIHdheSBkb3duLCBhcm1zIGZvbGRlZCwgdW50aWwgdGhlIHRyZWVzIGNsb3NlIHRoZSB2aWV3LgoKVGhlIEJhcm9uLCBleGFtaW5pbmcgdGhlIGZvc3NpbCBjaHVuayB3aXRoIHJlYWwgc2Nob2xhcmx5IGludGVyZXN0IGZvciBvbmNlIHJhdGhlciB0aGFuIGhpcyB1c3VhbCBtYWdwaWUgZmFzY2luYXRpb24sIHByb25vdW5jZXMgaXQgJ3Byb3Blcmx5IG9sZC4gT2xkZXIgdGhhbiB0aGUgbW91bnRhaW4gYmFjayBhdCBUYW5uYSwgcHJvYmFibHkuIE9sZGVyIHRoYW4gbW9zdCB0aGluZ3MuJw==',
            'choices' => [
                ['text' => 'QXNrIHdoYXQgaGFwcGVuZWQgdG8gdGhlIG90aGVyIGhhbGYgQXVudGllIGxlZnQgYmVoaW5k', 'next' => '8_end_ask'],
                ['text' => 'TGV0IHRoYXQgcXVlc3Rpb24gc3RheSB1bmFza2Vk', 'next' => '8_end_unasked'],
            ],
        ],
        '8_end_ask' => [
            'prose'  => 'WW91IGFzaywgYmVmb3JlIHlvdSdyZSBmdWxseSBiYWNrIGF0IHRoZSB3YXRlciDigJQgd2hhdCBoYXBwZW5lZCB0byB0aGUgb3RoZXIgaGFsZiwgdGhlIHBpZWNlIHNoZSBkaWRuJ3QgdGFrZS4gVGhlIG1hbiBjb25zaWRlcnMgdGhlIHF1ZXN0aW9uIGZvciBhIHdoaWxlLCBsb25nIGVub3VnaCB0aGF0IHlvdSdyZSBub3Qgc3VyZSBoZSdsbCBhbnN3ZXIgaXQgYXQgYWxsLgoKJ1N0aWxsIHVwIHRoZXJlLCcgaGUgc2F5cyBldmVudHVhbGx5LiAnU29tZSB0aGluZ3MgYXJlbid0IHlvdXJzIHRvIHJlbW92ZSBqdXN0IGJlY2F1c2UgeW91IGZvdW5kIHRoZW0uIFNoZSB1bmRlcnN0b29kIHRoYXQuIExlZnQgaGFsZiBmb3Igd2hvZXZlciBjYW1lIG5leHQsIGFuZCBsZWZ0IHRoZSByZXN0IGV4YWN0bHkgd2hlcmUgdGhlIHNlYSBwdXQgaXQsIG91dCBvZiByZXNwZWN0IGZvciB0aGUgc2VhJ3Mgb3duIHdvcmsuJyBIZSBub2RzIG9uY2UsIGxpa2UgdGhhdCBzZXR0bGVzIHNvbWV0aGluZy4gJ1lvdSdsbCB1bmRlcnN0YW5kIGl0IHRvbywgZXZlbnR1YWxseS4gT3IgeW91IHdvbid0LiBFaXRoZXIgd2F5LCBpdCBzdGF5cy4nCgpZb3UgY2FycnkgdGhlIHBpZWNlIHlvdSB3ZXJlIGdpdmVuIGJhY2sgdG8gdGhlIEvFjXR1a3UsIGFuZCBmaW5kIHlvdSBkb24ndCBtaW5kLCBpbiB0aGUgZW5kLCB0aGF0IHNvbWUgb2YgaXQgd2FzIG5ldmVyIG1lYW50IHRvIGxlYXZlLg==',
            'ending' => true,
        ],
        '8_end_unasked' => [
            'prose'  => 'WW91IGRvbid0IGFzay4gVGhlcmUncyBzb21ldGhpbmcgaW4gdGhlIHdheSBoZSBzYWlkICdsZWZ0IGhhbGYgYmVoaW5kJyB0aGF0IHN1Z2dlc3RzIHRoZSBvdGhlciBoYWxmIGlzbid0IHJlYWxseSBhIHF1ZXN0aW9uIHRoYXQgd2FudHMgYW5zd2VyaW5nIGJ5IGEgc3RyYW5nZXIgcGFzc2luZyB0aHJvdWdoLCBob3dldmVyIHBvbGl0ZWx5IGN1cmlvdXMuCgpUaGUgS8WNdHVrdSBsaWZ0cyBvZmYgb3ZlciB0aGUgbGFrZSBhcyB0aGUgbGFzdCBvZiB0aGUgc3F1YWxsIGNsZWFycyBlbnRpcmVseSwgTGFrZSBUZWdhbm8ncyBkYXJrIHdhdGVyIGNhdGNoaW5nIHRoZSBsYXRlIGxpZ2h0IGluIGEgd2F5IG5vIG9yZGluYXJ5IHNlYSBldmVyIHF1aXRlIG1hbmFnZXMsIHJpbmdlZCBieSBmb3Jlc3QgdGhhdCBnaXZlcyBubyBoaW50LCBmcm9tIHVwIGhlcmUsIG9mIHRoZSB2YW5pc2hlZCByZWVmIHNsZWVwaW5nIGluIHN0b25lIGJlbmVhdGggaXQuCgpTb2xhbmdlIHRha2VzIHRoZSBmb3NzaWwgY2h1bmsgZnJvbSB5b3UgdG8gc3RvdyBpdCBwcm9wZXJseSBhbmQgdHVybnMgaXQgb3ZlciBvbmNlIGluIGhlciBoYW5kcyBiZWZvcmUgc2hlIGRvZXMsIHRodW1iIHRyYWNpbmcgdGhlIHBhbGUgZm9zc2lsIHNoYXBlcyB3aXRob3V0IGNvbW1lbnQg4oCUIG5vdCBpbmRpZmZlcmVudCwganVzdCB0aGUgcGFydGljdWxhciBxdWlldCBvZiBzb21lb25lIHdobydzIGxlYXJuZWQgdGhhdCBub3QgZXZlcnkgZ29vZCB0aGluZyBuZWVkcyBuYXJyYXRpbmcu',
            'ending' => true,
        ],
    ],
];
