<?php
return [
    'id'    => 'q10',
    'title' => "Fred's Canal Boat",
    'color' => '#4A6B8A',

    'pages' => [

        '1_start' => [
            'prose'   => 'VGhlIGNhbmFsIGNpdHkgYW5ub3VuY2VzIGl0c2VsZiBncmFkdWFsbHkg4oCUIHRoZSBzbWVsbCBvZiB3YXRlciBhbmQgd29vZC1zbW9rZSwgdGhlbiB0aGUgZmlyc3QgYnJpZGdlLCB0aGVuIHRoZSBuZXR3b3JrIG9mIHdhdGVyd2F5cyBvcGVuaW5nIGluIHBhcmFsbGVsIGxpa2UgYSBkaWFncmFtIHRoYXQgdG9vayBjZW50dXJpZXMgdG8gcmVmaW5lLgoKWW91IGhhdmUgdGhlIGJvdGFuaWNhbCBib29rLCB0aGUgc3F1YXJlIGZyb20gdGhlIEFlZ2VhbiBoYXJib3VyLCBhbmQgYSBqYXIgb2Ygd2lsZCB0aHltZSBob25leSB0aGF0IEZyZWQgdG9sZCB5b3Ugd291bGQgdGVsbCB5b3Ugc29tZXRoaW5nIGxhdGVyLgoKRnJlZCB3YXMgdGhyZWUgd2Vla3MgYWhlYWQgb2YgeW91IGF0IGxhc3QgY291bnRpbmcsIHNvbWV3aGVyZSBpbiB0aGlzIGNpdHkgaWRlbnRpZnlpbmcgY2FuYWwgcGxhbnRzLiBIZSBoYXMgb3BpbmlvbnMgYWJvdXQgZXZlcnl0aGluZy4gSGUgd2lsbCBoYXZlIG9waW5pb25zIGFib3V0IHRoaXMgY2l0eS4KClR3byB3YXlzIGludG8gdGhlIHNwaWNlIGRpc3RyaWN0Lg==',
            'choices' => [
                ['text' => 'VGFrZSBhIHBhc3NhZ2Ugb24gdGhlIGZsb3dlciBtYXJrZXQgY2FuYWw=', 'next' => '2_canal'],
                ['text' => 'RW50ZXIgYnkgdGhlIGxhbmQgZ2F0ZSBvbiBmb290',                 'next' => '2_foot'],
            ],
        ],

        '2_canal' => [
            'prose'   => 'VGhlIGNhbmFsIHBhc3NhZ2UgY29zdHMgdGhyZWUgY29pbnMgYW5kIGRlcG9zaXRzIHlvdSBhdCB0aGUgZmxvd2VyIG1hcmtldCdzIHNvdXRoIGRvY2ssIHdoZXJlIGV2ZXJ5IGJvYXQgaXMgcGFpbnRlZCBpbiBhIHBhcnRpY3VsYXIgc2VxdWVuY2Ugb2YgY29sb3VycyDigJQgcmVkIG9yIGJsdWUgb3IgYSBncmVlbiB0aGF0IEZyZWQgd291bGQgaWRlbnRpZnkgYnkgcGlnbWVudCBmYW1pbHksIGdpdmVuIHRoZSBjaGFuY2UuCgpZb3UgcHJvZHVjZSB0aGUgaG9uZXkgamFyIGF0IGEgbWFya2V0IHN0YWxsIG1pZC1tb3JuaW5nIGFuZCBhc2sgd2hldGhlciBhbnlvbmUga25vd3MgdGhpcyB0aHltZSBwb2xsZW4uIFRoZSBob25leSBtZXJjaGFudCB0YWtlcyBpdCB3aXRob3V0IGNlcmVtb255LCBob2xkcyBpdCB0byB0aGUgbGlnaHQsIHRpbHRzIGl0LiAiVGh5bXVzIGNhcGl0YXR1cy4gU291dGhlcm4gQWVnZWFuIGxpbWVzdG9uZS4gU3BlY2lmaWMuIiBTaGUgbmFtZXMgYSBkaXN0cmljdC4gWW91IHJlY29nbmlzZSB0aGUgZGlyZWN0aW9uLiAiVGhlcmUncyBhIHNwaWNlIHRyYWRlciB0aGVyZSB3aG8gdGFrZXMgdGhhdCByb3V0ZS4gVGhpcmQgYnJpZGdlLCBsZWZ0IG9uIHRoZSBjYW5hbC4gUmVkIGRvb3IuIgoKRnJlZCBpcyBzdGFuZGluZyBpbiBmcm9udCBvZiB0aGUgcmVkIGRvb3Iu',
            'choices' => [
                ['text' => 'RmluZCBvdXQgd2h5IEZyZWQgaXMgYXQgdGhlIHJlZCBkb29y', 'next' => '3_quay'],
            ],
        ],

        '2_foot' => [
            'prose'   => 'VGhlIGxhbmQgZ2F0ZSBvcGVucyBvbnRvIGEgc3RyZWV0IHRoYXQgbmFycm93cyB0byBhIGNhbmFsIHdpdGhpbiBmaWZ0eSBtZXRyZXMsIHdoaWNoIHNlZW1zIGludGVudGlvbmFsLiBUaGUgc21lbGwgb2YgZmVudWdyZWVrIGFuZCBzb21ldGhpbmcgc2xvdy1yb2FzdGluZyBsZWFkcyB5b3UgZWFzdCB0aHJvdWdoIHR3byBicmlkZ2VzIGFuZCBhIG1hcmtldCB3aGVyZSBzb21lb25lIGlzIHNlbGxpbmcgY2hlZXNlIGluIHdoZWVscyB0aGUgc2l6ZSBvZiBwYXZpbmcgc3RvbmVzLgoKWW91IGdpdmUgdGhlIGhvbmV5IGphciB0byBhIG1hcmtldCB2ZW5kb3IgYXMgYSB0YXN0aW5nIHNhbXBsZS4gU2hlIG9wZW5zIGl0LCB0aXBzIGl0LCBob2xkcyBpdCB0byB0aGUgbGlnaHQuICJUaGF0IHRoeW1lIG9ubHkgZ3Jvd3Mgb24gb25lIHN0cmV0Y2ggb2YgY29hc3QuIFRoZSB0cmFkZXJzIGZyb20gdGhlcmUgY29tZSB0aHJvdWdoIGV2ZXJ5IFR1ZXNkYXkuIFRoaXJkIGJyaWRnZSwgdGhlIHJlZCBkb29yLiIgU2hlIHJldHVybnMgdGhlIGphci4gIkFzayBOYXRoYWxpZS4iCgpGcmVkIGlzIHN0YW5kaW5nIGF0IHRoZSByZWQgZG9vci4=',
            'choices' => [
                ['text' => 'RmluZCBvdXQgd2hhdCBGcmVkIGlzIGRvaW5nIGF0IHRoZSByZWQgZG9vcg==', 'next' => '3_quay'],
            ],
        ],

        '3_quay' => [
            'prose'   => 'SGUgaXMgbWlkLXNlbnRlbmNlIHdoZW4gaGUgc2VlcyB5b3UuIEhlIGZpbmlzaGVzIHRoZSBzZW50ZW5jZSDigJQgc29tZXRoaW5nIGFib3V0IE1lbnRoYSBhcXVhdGljYSBhbmQgaXRzIHRvbGVyYW5jZSBmb3IgYnJhY2tpc2ggY29uZGl0aW9ucyDigJQgYW5kIHRoZW4gcmVnYXJkcyB5b3Ugd2l0aCB0aGUgZXhwcmVzc2lvbiBvZiBzb21lb25lIHdobyBoYXMgYmVlbiBpbmRlcGVuZGVudGx5IHJlYWNoaW5nIHRoZSBzYW1lIGRlc3RpbmF0aW9uIGFuZCBpcyBtaWxkbHkgcGxlYXNlZCB0byBoYXZlIGNvbXBhbnkuCgpUaHJlZSB3ZWVrcyBpbiBBbXN0ZXJkYW0sIGhlIHRlbGxzIHlvdS4gQ2FuYWwtc2lkZSBwbGFudHMuIEZvdXJ0ZWVuIHNwZWNpZXMgY2F0YWxvZ3VlZCwgb25lIHByb2JhYmxlIGh5YnJpZC4gSGUgaGFzIGEgY2FuYWwgYm9hdCDigJQgaGUgd2F2ZXMgdGhpcyBhd2F5IHdoZW4geW91IGFzayDigJQgbW9vcmVkIHR3byBicmlkZ2VzIGVhc3QuIEhlIGFkZHJlc3NlcyBKYW1lcyBpbW1lZGlhdGVseSwgYnkgbmFtZSwgYW5kIGluZm9ybXMgaGltIHRoZXJlIGlzIGEgY2FudmFzIGJhZyBzdWl0YWJsZSBmb3IgYSBsb3JpcyBvbiB0aGUgcm9vZiBiZWFtLgoKSmFtZXMncyBlYXJzIGRvIG5vdCBtb3ZlLiBKYW1lcydzIGVhcnMgdmVyeSByYXJlbHkgbW92ZSB3aGVuIEZyZWQgaXMgdGFsa2luZy4=',
            'choices' => [
                ['text' => 'Rm9sbG93IEZyZWQgdG8gdGhlIGNhbmFsIGJvYXQ=', 'next' => '4_boat'],
            ],
        ],

        '4_boat' => [
            'prose'    => 'VGhlIGNhbmFsIGJvYXQgaXMgbmFycm93ZXIgdGhhbiBpdCBsb29rcyBmcm9tIHRoZSBiYW5rIGFuZCBzaWduaWZpY2FudGx5IG1vcmUgb2NjdXBpZWQuIFNwZWNpbWVuIGphcnMgbGluZSBib3RoIHNoZWx2ZXMuIFRoZSBzaW5nbGUtYnVybmVyIHN0b3ZlIGhhcyBzb21ldGhpbmcgb24gaXQgdGhhdCBtYXkgaGF2ZSBzdGFydGVkIGFzIHNvdXAuIEEgY2FudmFzIGJhZyBoYW5ncyBmcm9tIHRoZSByb29mIGJlYW0gYXQgZXhhY3RseSBsb3JpcyBoZWlnaHQuCgpKYW1lcyB0cmFuc2ZlcnMgZnJvbSB5b3VyIHNob3VsZGVyIHRvIHRoZSBiYWcgd2l0aG91dCBhIHdvcmQuIEhlIGRvZXMgbm90IGVtZXJnZSBhZ2Fpbi4KCkZyZWQgbWFrZXMgZ2luZ2VyIHRlYSB3aGlsZSB5b3UgZmluZCBzb21ld2hlcmUgdG8gc2l0IHRoYXQgaXMgbm90IG9jY3VwaWVkIGJ5IGEgcHJlc3NlZCBwbGFudCBzcGVjaW1lbi4gVGhyZWUgbWludXRlcywgaGUgc2F5cy4gTm90IHR3by4gSGUgaGFzIGEgY3JhdGUgb2YgZ2luZ2VyIGJlZXIgdW5kZXIgdGhlIHN0YXJib2FyZCBidW5rLiBIZSBvcGVucyB0d28gYm90dGxlcyB3aGlsZSB0aGUgdGVhIHN0ZWVwcy4KClRoZXJlIGlzIGEgZHJpZWQgZmxvd2VyIHBpbm5lZCBhYm92ZSB0aGUgc3BlY2ltZW4gc2hlbGYuIFRoZSBsYWJlbCBpcyBub3QgaW4gRnJlZCdzIGhhbmR3cml0aW5nLg==',
            'terminal' => true,
            'choices'  => [
                ['text' => 'QXNrIEZyZWQgYWJvdXQgdGhlIGZsb3dlcg==', 'next' => '5_flower'],
            ],
        ],

        '5_flower' => [
            'prose'   => 'IlR3byB3ZWVrcyBhZ28sIiBoZSBzYXlzLiBIZSB0YWtlcyBpdCBkb3duIHdpdGggb25lIGNhcmVmdWwgY2xhdy4gVGhlIGZsb3dlciBpcyBvbGQg4oCUIFJhbnVuY3VsdXMgYXF1YXRpbGlzLCBjYW5hbCB3YXRlci1jcm93Zm9vdCDigJQgYW5kIHRoZSBsYWJlbCBpcyBpbiBhIHNtYWxsLCBjYXJlZnVsIGhhbmQ6IGEgbm90ZSBhYm91dCB3aGVyZSBpdCB3YXMgZm91bmQsIHRoaXMgY2FuYWwsIHRoaXMgY2l0eSwgdGhlIHllYXIgb2YgdGhlIGxvbmcgbm9ydGhlcm4gc3VtbWVyLgoKSGUgaGFzIGJlZW4gY2FycnlpbmcgaXQgc2luY2UgdGhlIHNlY29uZC1oYW5kIGJvb2sgbWFya2V0LCBoZSB0ZWxscyB5b3UuIFBpbm5lZCB0aGVyZSBiZWNhdXNlIHRoZSBoYW5kd3JpdGluZyB3YXMgd29ydGgga2VlcGluZy4KCkZyZWQgaXMgYnJpZWZseSBhbmQgc3BlY3RhY3VsYXJseSBmdXJpb3VzIGF0IGhpbXNlbGYuIEhlIGhhcyB0aGUgYm90YW5pY2FsIGJvb2suIEhlIGhhcyBsb29rZWQgYXQgaGVyIGhhbmR3cml0aW5nIGEgaHVuZHJlZCB0aW1lcy4gSGUgc2hvdWxkIGhhdmUga25vd24gaW1tZWRpYXRlbHkuCgpIZSByZXBpbnMgdGhlIGZsb3dlciBvbiB0aGUgd2FsbCBhbmQgZHJpbmtzIGhpcyBnaW5nZXIgYmVlci4gSGUgaXMgbm8gbG9uZ2VyIGZ1cmlvdXMuIEhlIGlzIHNvbWV0aGluZyB0aGF0IGxvb2tzLCBpbiBhIHBhcnJvdCwgbGlrZSBzYXRpc2ZhY3Rpb24u',
            'choices' => [
                ['text' => 'TGV0IEZyZWQgc2l0IHdpdGggaXQgYSBtb21lbnQ=',            'next' => '5a_sit'],
                ['text' => 'QXNrIHdoYXQgaGUga25vd3MgYWJvdXQgdGhlIHNwaWNlIHRyYWRlcg==', 'next' => '5b_spice'],
            ],
        ],

        '5a_sit' => [
            'prose'   => 'RnJlZCBzaXRzIHdpdGggaGlzIGdpbmdlciBiZWVyIGFuZCBpcyBxdWlldCwgd2hpY2ggaXMgcmFyZS4gSmFtZXMsIGZyb20gaGlzIGNhbnZhcyBiYWcsIHdhdGNoZXMgd2l0aCB0aGUgc3BlY2lmaWMgYXR0ZW50aW9uIGhlIHJlc2VydmVzIGZvciB0aGluZ3MgdGhhdCBhY3R1YWxseSBtYXR0ZXIuCgoiU2hlIHdhcyBoZXJlLCIgRnJlZCBzYXlzLCBhZnRlciBhIHdoaWxlLiBOb3QgZGlzY292ZXJ5IOKAlCBjb25maXJtYXRpb24uIFRoZSBib3RhbmljYWwgYm9vayBoYXMgYmVlbiBwbGFjaW5nIGhlciBpbiBjaXRpZXMgYW5kIGNvYXN0bGluZXMgYW5kIGhpZ2ggcGFzc2VzIGZvciB3ZWVrcy4gQnV0IGEgY2FuYWwgd2F0ZXItY3Jvd2Zvb3QgaW4gYSBzZWNvbmQtaGFuZCBib29rIHR3byBicmlkZ2VzIGZyb20gd2hlcmUgeW91IGFyZSBzaXR0aW5nLCBsYWJlbGxlZCBpbiBoZXIgaGFuZCB3aXRoIHRoZSB5ZWFyIOKAlCB0aGlzIGlzIGRpZmZlcmVudC4gU2hlIHdhcyBoZXJlIHdpdGggdGhpcyBmbG93ZXIgaW4gdGhpcyBjYW5hbCwgaW4gYSBzdW1tZXIgdGhhdCBleGlzdGVkIGJlZm9yZSB5b3UgZGlkLgoKIlRoZSBzcGljZSB0cmFkZXIsIiBoZSBzYXlzIGZpbmFsbHksIGNvbGxlY3RpbmcgaGltc2VsZi4gIkhlciBuYW1lIGlzIE5hdGhhbGllLiBJJ3ZlIGJlZW4gdGhyZWUgdGltZXMuIEkgdGhvdWdodCBJIHNob3VsZCB3YWl0LiI=',
            'choices' => [
                ['text' => 'Rm9sbG93IEZyZWQgdG8gdGhlIHJlZCBkb29y', 'next' => '6_daughter'],
            ],
        ],

        '5b_spice' => [
            'prose'   => 'RnJlZCBrbmV3IGFib3V0IE5hdGhhbGllIGJlZm9yZSB5b3UgYXJyaXZlZC4gSGUgd2VudCB0byB0aGUgcmVkIGRvb3IgdGhyZWUgdGltZXMsIGhlIHNheXMsIHdpdGggdGhlIGFpciBvZiBzb21lb25lIHdobyBtYWRlIGEgcHJpbmNpcGxlZCBkZWNpc2lvbiBlYWNoIHRpbWUuCgoiSGVyIGZhdGhlcidzIGxlZGdlci4gQWNjb3VudCBib29rLCBvbGQuIFlvdXIgZ3JhbmRtb3RoZXIgcGFpZCBhIGRlYnQgd2l0aCBhIHBsYW50IGd1aWRlIHNoZSdkIGFubm90YXRlZC4iIEhlIGNsZWFycyBhIHNwZWNpbWVuIGphciB0byBtYWtlIHJvb20gb24gdGhlIHRhYmxlLiAiSW5zaWRlIHRoZSBwbGFudCBndWlkZSwgc29tZXRoaW5nIHdyYXBwZWQgaW4gcGFwZXIuIE5hdGhhbGllIGhhcyBiZWVuIGtlZXBpbmcgaXQgZm9yIHllYXJzIHdpdGhvdXQga25vd2luZyB3aGF0IGl0IHdhcy4iCgpIZSBoYXMgYWxzbywgaGUgYWRkcywgbWV0IEphc3BlciB0aGUgZmVycnltYW4g4oCUIGJ5IGxldHRlci4gSGUgaGFzIG9waW5pb25zIGFib3V0IEphc3Blci4gSGUgc2F5cyBoZSB3aWxsIHNoYXJlIHRoZW0gYXQgc29tZSBwb2ludC4KCkphbWVzIGhhcyBlbWVyZ2VkIGZyb20gdGhlIGNhbnZhcyBiYWcgYW5kIGlzIHNpdHRpbmcgb24gRnJlZCdzIGhlYWQuIEZyZWQgYXBwZWFycyBub3QgdG8gaGF2ZSBub3RpY2VkLg==',
            'choices' => [
                ['text' => 'Rm9sbG93IEZyZWQgdG8gdGhlIHJlZCBkb29y', 'next' => '6_daughter'],
            ],
        ],

        '6_daughter' => [
            'prose'   => 'TmF0aGFsaWUgaGFzIHRoZSBsZWRnZXIgb24gdGhlIGNvdW50ZXIgd2hlbiB5b3UgYXJyaXZlLCBhcyB0aG91Z2ggc2hlIGtuZXcgdGhlIG1vcm5pbmcgd2FzIGZvciB0aGlzLgoKVGhlIGJvb2sgaXMgb2xkIOKAlCBoZXIgZmF0aGVyJ3MgYWNjb3VudHMsIGZvdXIgZGVjYWRlcyBvZiBzcGljZSB0cmFkZSwgZ3JhbmRtb3RoZXIncyBuYW1lIGFwcGVhcmluZyBhdCBpbnRlcnZhbHMgb24gcGFnZXMgbWFya2VkIHdpdGggYSBwYXJ0aWN1bGFyIHllbGxvdyB0aHJlYWQuIEF0IHNvbWUgcG9pbnQgYSBkZWJ0IHdhcyBzZXR0bGVkIG5vdCBpbiBjb2luIGJ1dCBpbiBhIHBsYW50IGd1aWRlOiBhbm5vdGF0ZWQsIGxhYmVsbGVkIGluIGEgY2FyZWZ1bCBoYW5kLCBsZWZ0IGluIGxpZXUsIHdoaWNoIGhlciBmYXRoZXIgaGFkIGNvbnNpZGVyZWQgZWl0aGVyIGEgam9rZSBvciBhIGdpZnQgZGVwZW5kaW5nIG9uIGhpcyBtb29kLgoKSW5zaWRlIHRoZSBwbGFudCBndWlkZTogYSBzcXVhcmUgb2YgY2xvdGgsIGZvbGRlZCBvbmNlLCB3cmFwcGVkIGluIHBhcGVyLCBzZWFsZWQgd2l0aCBzb21ldGhpbmcgYW1iZXIgYW5kIHJlc2lub3VzIHRoYXQgRnJlZCBleGFtaW5lcyB3aXRob3V0IHRvdWNoaW5nLgoKIkkgdGhvdWdodCBpdCB3YXMgYSBib29rbWFyaywiIE5hdGhhbGllIHNheXMuICJUaGVuIEkgb3BlbmVkIHRoZSBzZWFsLiI=',
            'choices' => [
                ['text' => 'UmVhZCB0aGUgbm90ZSB3cmFwcGVkIHdpdGggdGhlIHNxdWFyZQ==', 'next' => '7a_note'],
                ['text' => 'T3BlbiB0aGUgc3F1YXJlIGNhcmVmdWxseQ==',                  'next' => '7b_open'],
            ],
        ],

        '7a_note' => [
            'prose'   => 'VGhlIG5vdGUgaXMgc2hvcnQgYW5kIGluIGdyYW5kbW90aGVyJ3MgaGFuZHdyaXRpbmc6IFRoaXMgY2l0eSBpcyBtYWRlIG9mIHRoaW5ncyB0aGF0IHBhc3NlZCB0aHJvdWdoIGl0LiBJIGhhdmUgYmVlbiBoZXJlIHRocmVlIHRpbWVzIGFuZCBJIHVuZGVyc3RhbmQgaXQgYmV0dGVyIGVhY2ggdGltZS4gVGhlIGNhbmFsIGlzIHRoZSBzYW1lIGNhbmFsLiBUaGUgYnJpZGdlIGlzIGEgZGlmZmVyZW50IGJyaWRnZS4gTGVhdmUgdGhpcyB3aXRoIHdob2V2ZXIgaGFzIGJlZW4gcGF0aWVudC4KCkZyZWQgcmVhZHMgaXQgb3ZlciB5b3VyIHNob3VsZGVyIGFuZCBpcyBxdWlldCBmb3IgYSBtb21lbnQuCgoiU2hlIHVuZGVyc3Rvb2QgdGhlIHdhdGVyd2F5cywiIGhlIHNheXMuICJTYW1lIGN1cnJlbnQsIGRpZmZlcmVudCBjYXJnby4gVGhhdCdzIHdoYXQgc2hlIG1lYW5zLiIgSGUgcGF1c2VzLiAiU2hlIHdhcyByaWdodCBhYm91dCB0aGUgcGF0aWVuY2UuIgoKTmF0aGFsaWUsIHdobyBoYXMgYXBwYXJlbnRseSBiZWVuIHByZXNlbnQgZm9yIHNwZWVjaGVzIGxpa2UgdGhpcyBiZWZvcmUsIGlzIGFscmVhZHkgcmVhY2hpbmcgYmVoaW5kIHRoZSBjb3VudGVyLg==',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB3aGF0IE5hdGhhbGllIGhhcyBrZXB0', 'next' => '8_seeds'],
            ],
        ],

        '7b_open' => [
            'prose'   => 'VGhlIHNxdWFyZSBpcyBzbWFsbCBhbmQgZmluZWx5IHdvcmtlZDogYSBjYW5hbCBjaXR5IHNlZW4gZnJvbSB0aGUgaGVpZ2h0IG9mIGEgbG93IGJyaWRnZSwgYm9hdHMgbGFkZW4gd2l0aCBnb29kcywgdGhlaXIgcmVmbGVjdGlvbnMgZG91YmxlZCBpbiB0aGUgd2F0ZXIgYmVsb3cuIFRoZSBzdGl0Y2hpbmcgaXMgZGVuc2UgaW4gcGxhY2VzIGFuZCBkZWxpYmVyYXRlbHkgc3BhcmUgaW4gb3RoZXJzIOKAlCBzb21lb25lIHdobyBrbmV3IHRoaXMgdmlldyBjaG9zZSB3aGF0IGNhcnJpZWQgaXQgYW5kIHdoYXQgZGlkbid0LgoKIlNoZSBrbmV3IHdoaWNoIGRpcmVjdGlvbiB0aGUgbGlnaHQgY2FtZSBmcm9tLCIgRnJlZCBzYXlzLiBIZSBleGFtaW5lcyB0aGUgc3RpdGNod29yayB3aXRoIG9uZSBjbGF3IHJhaXNlZC4gVGhpcyBpcywgZnJvbSBGcmVkLCBoaWdoIHByYWlzZS4KCk5hdGhhbGllIGlzIHNtaWxpbmcgc2xpZ2h0bHkuICJTaGUgc3RheWVkIGhlcmUgb25lIHN1bW1lci4gTXkgZmF0aGVyIHNhaWQgc2hlIGtuZXcgdGhlIGNhbmFsIHRyYWRlIGJldHRlciB0aGFuIHRoZSB0cmFkZXJzLiIKClNoZSByZWFjaGVzIGJlaGluZCB0aGUgY291bnRlci4=',
            'choices' => [
                ['text' => 'UmVjZWl2ZSB3aGF0IE5hdGhhbGllIGhhcyBrZXB0', 'next' => '8_seeds'],
            ],
        ],

        '8_seeds' => [
            'prose'   => 'VGhlIHBhY2tldCBpcyBzbWFsbCDigJQgZm9sZGVkIHBhcGVyLCB0aWVkIHdpdGggc3RyaW5nLiBOYXRoYWxpZSdzIGZhdGhlcidzIGhhbmR3cml0aW5nIG9uIHRoZSBsYWJlbDogRm9yIEFsb3lzaXVzJ3MgcGFycm90LCBpZiBoZSBldmVyIGNvbWVzLiBIZSdsbCBrbm93IHdoYXQgdGhlc2UgYXJlLgoKRnJlZCBvcGVucyBpdCB2ZXJ5IGNhcmVmdWxseS4gSGUgdGlwcyBvbmUgc2VlZCBpbnRvIGhpcyBwYWxtLCBob2xkcyBpdCBjbG9zZSwgYW5kIGdvZXMgY29tcGxldGVseSBzdGlsbC4KCiJOaWdlbGxhIHNhdGl2YSwiIGhlIHNheXMuIEhlIHNheXMgbm90aGluZyBlbHNlIGZvciBhIG1vbWVudC4gIkkgaGF2ZSBiZWVuIHRyeWluZyB0byB0cmFjZSB0aGlzIHNwZWNpZmljIGN1bHRpdmFyIHRvIGl0cyBvcmlnaW4gbWFya2V0IGZvciBlbGV2ZW4geWVhcnMuIiBIZSBzdG9wcy4gIlRoYW5rIHlvdSwiIGhlIHNheXMgdG8gTmF0aGFsaWUuIFNoZSBhY2NlcHRzIHRoaXMgd2l0aCB0aGUgY2FsbSBvZiBzb21lb25lIHdobyBoYXMgYmVlbiBrZWVwaW5nIGEgc3RyYW5nZXIncyB0cmVhc3VyZSBmb3IgYSBsb25nIHRpbWUgYW5kIGlzIGdsYWQgdG8gaGF2ZSBwbGFjZWQgaXQgd2VsbC4KClRoZSBzcXVhcmUgaXMgaW4geW91ciBoYW5kcyDigJQgdGhlIGNhbmFsIGNpdHkgaW4gZ3JhbmRtb3RoZXIncyB0aHJlYWQsIHRoZSBib2F0cyBhbmQgdGhlaXIgcmVmbGVjdGlvbnMuIFlvdSBmb2xkIGl0IGFuZCBwdXQgaXQgd2l0aCB0aGUgb3RoZXJzLg==',
            'choices' => [
                ['text' => 'SGVhZCBiYWNrIHRvIHRoZSBjYW5hbCBib2F0', 'next' => '8_evening'],
            ],
        ],

        '8_evening' => [
            'prose'   => 'VGhlIGxpZ2h0IGlzIGRvaW5nIHNvbWV0aGluZyBwYXJ0aWN1bGFyIHRvIHRoZSBjYW5hbCBjaXR5IOKAlCB0dXJuaW5nIHRoZSBwYWludGVkIGJvYXRzIGNvcHBlciwgdGhlIHdhdGVyIGEgZGVlcCBicm93bi1ncmVlbiwgdGhlIGJyaWRnZXMgaW50byBzaGFwZXMgdGhhdCBoYXZlIGV4aXN0ZWQgZm9yZXZlciBhbmQgd2lsbCBleGlzdCBhZnRlciB5b3UgbGVhdmUuCgpGcmVkJ3MgY2FuYWwgYm9hdCByb2NrcyBnZW50bHkgYXQgaXRzIG1vb3JpbmcuIEphbWVzIGlzIG9uIHRoZSByb29mIHdpdGggdGhlIG5vY3R1cm5hbCBhdHRlbnRpb24gaGUgYnJpbmdzIHRvIGFsbCB3YXRlciBhdCBkdXNrLiBUaGUgZHJpZWQgd2F0ZXItY3Jvd2Zvb3QgaXMgc3RpbGwgcGlubmVkIGFib3ZlIHRoZSBzcGVjaW1lbiBzaGVsZi4KCkZyZWQgb3BlbnMgdHdvIG1vcmUgZ2luZ2VyIGJlZXJzIGFuZCBtYWtlcyByb29tIG9uIHRoZSBib3cgdGh3YXJ0LgoKIkknbSBnb2luZyBlYXN0IGluIHR3byB3ZWVrcywiIGhlIHNheXMuICJZb3Jrc2hpcmUsIGV2ZW50dWFsbHkuIFlvdSdkIGJlIHdlbGNvbWUgdG8gdGhlIGJ1bmsuIgoKSGUgZG9lcyBub3QgcHVzaCBpdCBmdXJ0aGVyLiBIZSBvcGVucyBoaXMgbm90ZWJvb2suIEphbWVzIHdhdGNoZXMgYSBiYXJnZSBwYXNzIGluIHRoZSBkaXJlY3Rpb24gb2YgdGhlIHNlYS4=',
            'choices' => [
                ['text' => 'U3RheSB0aGUgbmlnaHQgb24gRnJlZCdzIGNhbmFsIGJvYXQ=', 'next' => '9_end_boat'],
                ['text' => 'V2FsayB0aGUgY2FuYWwgYmVmb3JlIGRhcms=',               'next' => '9_end_water'],
            ],
        ],

        '9_end_boat' => [
            'prose'  => 'VGhlIGJ1bmsgaXMgbmFycm93IGFuZCB0aGUgc3BlY2ltZW4gamFycyBjbGluayBzb2Z0bHkgd2hlbiBhIGJvYXQgcGFzc2VzLCBidXQgdGhlIGJsYW5rZXQgaXMgdGhpY2sgd29vbCBhbmQgdGhlIHN0b3ZlIGlzIHN0aWxsIHdhcm0uIEphbWVzIHNldHRsZXMgb24gdGhlIHJvb2YgYmVhbSwgd3JhcHBpbmcgaGlzIHNtYWxsIGhhbmRzIGFyb3VuZCB0aGUgZWRnZSBvZiB0aGUgY2FudmFzIGJhZywgYW5kIGlzIGFzbGVlcCBiZWZvcmUgdGhlIGNhbmFsIGdvZXMgZGFyay4KCkZyZWQsIGluIHRoZSBzdGVybiwgaGFzIHRoZSBzZWVkIHBhY2tldCBvcGVuLiBIZSBpcyBtYWtpbmcgbm90ZXMgYnkgbGFtcGxpZ2h0IOKAlCBzbWFsbCBhbmQgY2FyZWZ1bCwgdGhlIHNhbWUgd2F5IGdyYW5kbW90aGVyJ3MgbGFiZWxzIGFyZSBzbWFsbCBhbmQgY2FyZWZ1bC4gSGUgaGFzIG5vdCBub3RpY2VkIHRoZSByZXNlbWJsYW5jZS4gT3IgaGUgaGFzLCBhbmQgaXMgbm90IHJlYWR5IHRvIHNheSBzby4KClRoZSBjYW5hbCBib2F0IHJvY2tzIGdlbnRseS4gT3V0c2lkZTogdGhlIGNpdHkgYXQgbmlnaHQsIHRoZSBicmlkZ2VzIGxpdCBmcm9tIGJlbG93LCBib2F0cyBtb3ZpbmcgdG93YXJkIHdoZXJldmVyIHRoZXkgYXJlIGdvaW5nLgoKVGhlIHNxdWFyZSBpcyBpbiB5b3VyIGJhZy4gVGhlIGhvbmV5IGphciB0b28sIGVtcHR5IG5vdywgc21lbGxpbmcgZmFpbnRseSBvZiB0aHltZS4=',
            'ending' => true,
        ],

        '9_end_water' => [
            'prose'  => 'VGhlIGNhbmFsIHBhdGggaXMgY29iYmxlc3RvbmUgYW5kIGxpdCBhdCBpbnRlcnZhbHMgYnkgbGFudGVybnMgaHVuZyBmcm9tIGlyb24gYnJhY2tldHMgYWJvdmUgdGhlIHdhdGVyLiBCb2F0cyBzbGlkZSBwYXN0IGluIGJvdGggZGlyZWN0aW9ucywgbGFkZW4gYW5kIHF1aWV0LiBUaGUgYnJpZGdlIGF0IHRoZSB0aGlyZCBjcm9zc2luZyBoYXMgYSBncm9vdmUgaW4gdGhlIHN0b25lIHdoZXJlIHRoZSB0b3ctcm9wZSB1c2VkIHRvIHJ1bi4KCkphbWVzIHNpdHMgb24geW91ciBzaG91bGRlciBhbmQgd2F0Y2hlcyB0aGUgd2F0ZXIgd2l0aCB0aGUgdW5jb21wbGljYXRlZCBhdHRlbnRpb24gaGUgZ2l2ZXMgdG8gYWxsIHdhdGVyIGF0IG5pZ2h0LgoKVGhlIHNxdWFyZSBpcyBpbiB5b3VyIGJhZywgYW5kIGJlc2lkZSBpdCB0aGUgc2VlZHMg4oCUIGZvbGRlZCBpbiBwYXBlciwgbGFiZWxsZWQgZm9yIGEgcGFycm90IHdobyBoYWQgYmVlbiBsb29raW5nIGZvciB0aGVtIGZvciBlbGV2ZW4geWVhcnMgYW5kIGZvdW5kIHRoZW0gdHdvIGJyaWRnZXMgZnJvbSBoZXJlLCBpbiBhbiBvbGQgbWFuJ3MgbGVkZ2VyLgoKU29tZSB0aGluZ3Mgd2FpdCBmb3IgdGhlIHJpZ2h0IHBlcnNvbi4gR3JhbmRtb3RoZXIgdW5kZXJzdG9vZCB0aGlzLiBTaGUgbGVmdCB0aGUgaG9uZXkgaW4gdGhlIGhhcmJvdXIgdG8gdGVsbCB5b3Ugd2hpY2ggZGlyZWN0aW9uIHRvIGdvLCBhbmQgaXQgZGlkLg==',
            'ending' => true,
        ],

    ],
];
