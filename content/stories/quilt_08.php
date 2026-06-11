<?php
return [
    'id'    => 'q8',
    'title' => 'The Grumpy Count',
    'color' => '#7A4A3A',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIHJvYWQgaW50byBUcmFuc3lsdmFuaWEgZGVzY2VuZHMgdGhyb3VnaCBwaW5lIGZvcmVzdHMgdGhhdCBoYXZlIGJlZW4gd2F0Y2hpbmcgcm9hZHMgZnJvbSBhcHByb3hpbWF0ZWx5IHRoaXMgYW5nbGUgc2luY2UgYmVmb3JlIHRoZXJlIHdlcmUgcm9hZHMuIFRoZSB2aWxsYWdlcyBiZWxvdyBhcnJpdmUgYXQgaW50ZXJ2YWxzOiB3ZWxsLWJ1aWx0LCBzZXR0bGVkIGluIHRoZSB3YXkgb2YgcGxhY2VzIHRoYXQgZGVjaWRlZCBvbiB0aGVpciBsb2NhdGlvbiBhIGxvbmcgdGltZSBhZ28gYW5kIGhhdmUgbm90IHJlY29uc2lkZXJlZC4KCkZyZWQgaXMgZGVzY3JpYmluZyB0aGUgQ2FycGF0aGlhbiBwaW5lIHN0YW5kcyB3aXRoIHRoZSBmb2N1cyBoZSBicmluZ3MgdG8gYW55dGhpbmcgY29udGV4dHVhbGx5IHVudXN1YWwuIEhlIGhhcyBzdHJvbmcgb3BpbmlvbnMgYWJvdXQgYWx0aXR1ZGUtbWl4ZWQgZm9yZXN0IGFuZCBpcyBzaGFyaW5nIHRoZW0gY29udGludW91c2x5LgoKSmFtZXMgd2F0Y2hlcyB0aGUgdmFsbGV5IHdpdGggdGhlIGRpcmVjdGlvbmFsIGF0dGVudGlvbiBvZiBzb21ldGhpbmcgZmluZGluZyBpdHMgYmVhcmluZ3MgaW4gbmV3IHRlcnJpdG9yeS4KClRoZSBjYXN0bGUgaXMgb24gdGhlIGhpbGwgYWJvdmUgdGhlIHZpbGxhZ2U6IG9sZCBzdG9uZSwgYSB0b3dlciBzdGlsbCBzdGFuZGluZywgYSByb29mIGdhcmRlbiB2aXNpYmxlIGV2ZW4gZnJvbSB0aGUgcm9hZC4gVGhlcmUgaXMgYSBDb3VudC4gVGhlIHZpbGxhZ2Ugc2VlbXMgdG8gaGF2ZSBhIGNhdXRpb3VzbHkgbmV1dHJhbCByZWxhdGlvbnNoaXAgd2l0aCB0aGlzIGZhY3QuCgpUd28gYXBwcm9hY2hlczogdGhlIG9sZCBSb21hbiByb2FkIHJ1bnMgc3RyYWlnaHQgdGhyb3VnaCB0aGUgdmFsbGV5OyB0aGUgc2hlcGhlcmQncyB0cmFpbCBydW5zIGFib3ZlLCBhbG9uZyB0aGUgcmlkZ2Uu',
            'choices' => [
                ['text' => 'VGFrZSB0aGUgUm9tYW4gcm9hZA==', 'next' => '2_roman'],
                ['text' => 'VGFrZSB0aGUgc2hlcGhlcmQncyB0cmFpbA==', 'next' => '2_trail'],
            ],
        ],
        '2_roman' => [
            'prose'   => 'VGhlIFJvbWFuIHJvYWQgaXMgY29iYmxlZCBmb3IgdGhlIGZpcnN0IGhhbGYgYW5kIHRoZW4gc2Vuc2libHkgbm90IGNvYmJsZWQgZm9yIHRoZSBzZWNvbmQsIGJlY2F1c2Ugd2hvZXZlciBsYWlkIGl0IG1hZGUgdGhlaXIgcGVhY2Ugd2l0aCB0aGUgdGVycmFpbiBhdCBzb21lIHBvaW50IGFuZCB0aGUgdGVycmFpbiB3b24uCgpBIHZpbGxhZ2UgdHJhZGVyLCB3aGVuIHRoZSBjcnlzdGFsIHNoYXJkIGNvbWVzIHVwIGluIGNvbnZlcnNhdGlvbiDigJQgeW91IG1lbnRpb24geW91J3ZlIGNvbWUgZnJvbSBTbG92ZW5pYSDigJQgdGFrZXMgaXQgYW5kIHR1cm5zIGl0IGluIGhpcyBmaW5nZXJzLgoK4oCcU2xvdmVuaWFuIGNhbGNpdGUs4oCdIGhlIHNheXMuIOKAnFdpdGggdGhlIGluY2x1c2lvbnMuIFRoZSBDb3VudCBjb2xsZWN0cyBtaW5lcmFscy4gSGFzIGZvciBmaWZ0eSB5ZWFycy4gSGUgaGFzIHNpeCBwaWVjZXMgbGlrZSB0aGlzIGJ1dCB3aXRob3V0IHRoZSBpbmNsdXNpb25zIOKAlCBuZXZlciBmb3VuZCBhIHByb3BlciBleGFtcGxlLuKAnSBIZSBoYW5kcyBpdCBiYWNrIGNhcmVmdWxseS4g4oCcSGUgd291bGQgdmVyeSBtdWNoIGxpa2UgdG8gbWVldCB5b3Uu4oCdCgpUaGlzIGlzLCB5b3UgcmVhbGlzZSwgYSBzaWduaWZpY2FudGx5IGJldHRlciBwb3NpdGlvbiB0aGFuIHlvdSBhcnJpdmVkIHdpdGguCgpGcmVkIGlkZW50aWZpZXMgdGhlIGNyeXN0YWxsaW5lIHN0cnVjdHVyZSBvZiBhIHJvYWRzaWRlIHN0b25lIHdhbGwgYW5kIHNoYXJlcyBoaXMgZmluZGluZ3MuIFRoZSB0cmFkZXIgbGlzdGVucyBwb2xpdGVseS4=',
            'choices' => [
                ['text' => 'SGVhZCBpbnRvIHRoZSB2aWxsYWdl', 'next' => '3_bogdan'],
            ],
        ],
        '2_trail' => [
            'prose'   => 'VGhlIHNoZXBoZXJkJ3MgdHJhaWwgcnVucyBhYm92ZSB0aGUgdmFsbGV5IGFsb25nIHRoZSByaWRnZSwgYW5kIHRoZSB2aWV3IGlzLCBhcyBhZHZlcnRpc2VkLCBzcGVjdGFjdWxhci4gVGhlIGZvcmVzdCBoZXJlIGlzIHNwcnVjZSBhbmQgYmVlY2ggaW4gYW4gYWx0aXR1ZGUtbWl4ZWQgc3RhbmQgdGhhdCBGcmVkIG5lZWRzIGEgYmV0dGVyIGxvb2sgYXQgYW5kIGdldHMgaW1tZWRpYXRlbHkuCgpUaGVuIEZyZWQgZ29lcyBzdGlsbC4gSGUgaXMgbG9va2luZyBhdCB0aGUgY2FzdGxlIHJvb2YuCgrigJxUaG9zZSBhcmUgYm90YW5pY2FsIHNwZWNpbWVucyzigJ0gaGUgc2F5cy4g4oCcT24gdGhlIGNhc3RsZSByb29mLiBJbiBwcm9wZXIgZnJhbWVzLiBUaGF0IENvdW50IGlzIGEgYm90YW5pc3Qu4oCdIEEgcGF1c2UuIOKAnFdoeSBkb2VzIG5vIG9uZSBrbm93IGFib3V0IHRoaXM/4oCdCgpIZSBjb250aW51ZXMgdG8gbG9vayBhdCB0aGUgcm9vZiBnYXJkZW4gd2l0aCB0aGUgZXhwcmVzc2lvbiBvZiBzb21lb25lIHJlY29uc2lkZXJpbmcgdGhlIHdob2xlIGl0aW5lcmFyeS4KCkphbWVzLCBvbiB5b3VyIHNob3VsZGVyLCB3YXRjaGVzIHRoZSBjYXN0bGUgd2l0aCB0aGUgc2FtZSBhdHRlbnRpb24gYnV0IG5vIGFwcGFyZW50IG9waW5pb24gYWJvdXQgaXRzIGJvdGFuaWNhbCBjcmVkZW50aWFscy4KCkJlbG93OiBhIHZpbGxhZ2UsIHNtb2tlIGZyb20gY2hpbW5leXMsIHRoZSBzbWVsbCBvZiB3b29kIGZpcmUgYW5kIHNvbWV0aGluZyBjb29raW5nLg==',
            'choices' => [
                ['text' => 'Q29tZSBkb3duIHRvIHRoZSB2aWxsYWdl', 'next' => '3_bogdan'],
            ],
        ],
        '3_bogdan' => [
            'prose'   => 'Qm9nZGFuIGlzIHRoZSB2aWxsYWdlIGVsZGVyLiBIZSBpcyBhbHNvLCBhcHBhcmVudGx5LCB0aGUgdmlsbGFnZSdzIGZpcnN0IHBvaW50IG9mIGNvbnRhY3QgZm9yIGFycml2YWxzIG9mIGFueSBraW5kLCBhbmQgaGlzIGZpcnN0IGFjdGlvbiB3aXRoIGFycml2YWxzIG9mIGFueSBraW5kIGlzIHNvdXAuCgpUaGUgc291cCBpcyBwbGFjZWQgaW4gZnJvbnQgb2YgeW91IGJlZm9yZSB5b3UgaGF2ZSBleHBsYWluZWQgd2hvIHlvdSBhcmUuIEJyZWFkIGZvbGxvd3MuIEZyZWQgZ2V0cyBhIHBpZWNlIG9mIGJyZWFkIG9uIHRoZSB0YWJsZSBiZXNpZGUgaGltLCB3aGljaCBoZSBhY2NlcHRzIHdpdGhvdXQgc3VycHJpc2UsIGFzIHRob3VnaCBoZSBoYXMgZ2l2ZW4gdXAgZXhwZWN0aW5nIGFueXRoaW5nIGVsc2UuCgrigJxUaGUgQ291bnQs4oCdIEJvZ2RhbiBzYXlzLCB3aGVuIHlvdSd2ZSBlYXRlbiBlbm91Z2guIOKAnFlvdSdsbCB3YW50IHRvIHNlZSBoaW0u4oCdIEhlIHNheXMgdGhpcyBhcyB0aG91Z2ggaXQgaXMgb2J2aW91cy4g4oCcSGUncyBkaWZmaWN1bHQuIEV4dHJlbWVseSBwYXJ0aWN1bGFyLiBIYXMgc3Ryb25nIG9waW5pb25zIGFib3V0IGV2ZXJ5dGhpbmcsIGluY2x1ZGluZyB0aGluZ3MgdGhhdCBkb24ndCByZXF1aXJlIG9waW5pb25zLuKAnSBBIHBhdXNlLiDigJxIZSB3YXMgdmVyeSBmb25kIG9mIHlvdXIgZ3JhbmRtb3RoZXIsIGluIGhpcyB3YXku4oCdCgpKYW1lcyBoYXMgZm91bmQgQm9nZGFuJ3Mgd2luZG93c2lsbCBhbmQgaXMgd2F0Y2hpbmcgdGhlIGNhc3RsZSB3aXRoIHRoZSBjYXJlZnVsIGF0dGVudGlvbiBoZSBnaXZlcyB0byB0aGluZ3Mgd29ydGggd2F0Y2hpbmcuCgrigJxIZSdsbCBpbnZpdGUgeW91IGV2ZW50dWFsbHks4oCdIEJvZ2RhbiBzYXlzLiDigJxIZSBhbHdheXMgZG9lcy7igJ0=',
            'choices' => [
                ['text' => 'R28gdXAgdG8gdGhlIGNhc3RsZSBnYXRl', 'next' => '4_gate'],
            ],
        ],
        '4_gate' => [
            'prose'   => 'VGhlIGNhc3RsZSBnYXRlIGlzIG9wZW5lZCBieSBhIGhvdXNla2VlcGVyIHdobyBsb29rcyBleGFjdGx5IGFzIHRob3VnaCBzaGUgaGFzIGJlZW4gYW5zd2VyaW5nIHRoaXMgZ2F0ZSBmb3IgdGhpcnR5IHllYXJzIGFuZCBleHBlY3RzIHRvIGJlIGRvaW5nIHNvIGZvciB0aGlydHkgbW9yZS4KCkluc2lkZTogYSBjb3VydHlhcmQsIGEgcm9zZSBnYXJkZW4gcGFzdCBpdHMgYmVzdCBzZWFzb24gYnV0IHN0aWxsIHJlY29nbmlzYWJsZSBhcyBzb21lb25lJ3MgY29uc2lkZXJlZCBwcm9qZWN0LCBhbmQsIGluIHRoZSBzZWNvbmQgd2luZG93IG9mIHRoZSBtYWluIGJ1aWxkaW5nLCBhIHRoaW4gZWxkZXJseSBtYW4gd2F0Y2hpbmcgeW91ciBhcHByb2FjaCB3aXRoIHRoZSBleHByZXNzaW9uIG9mIHNvbWVvbmUgd2hvIGhhcyBiZWVuIHdhdGNoaW5nIHBlb3BsZSBhcHByb2FjaCBhbmQgZmluZGluZyB0aGVtIGluYWRlcXVhdGUgZm9yIGEgdmVyeSBsb25nIHRpbWUuCgpGcmVkIHNwb3RzIHRoZSBtaW5lcmFsb2d5IHNoZWx2ZXMgdGhyb3VnaCB0aGUgZ3JvdW5kLWZsb29yIHdpbmRvdyBhbmQgaGlzIG9waW5pb25zIHZpc2libHkgcmVvcmdhbmlzZSB0aGVtc2VsdmVzLgoKVGhlIGhvdXNla2VlcGVyIHNheXM6IOKAnEhlJ2xsIHNlZSB5b3Ugbm93LuKAnSBUaGVuOiDigJxIZSBoYXMgY29uZGl0aW9ucy7igJ0=',
            'terminal' => true,
            'choices' => [
                ['text' => 'RmluZCBvdXQgd2hhdCB0aGUgY29uZGl0aW9ucyBhcmU=', 'next' => '5_count'],
            ],
        ],
        '5_count' => [
            'prose'   => 'Q291bnQgVmFyaXMgaXMgaW4gYSBoaWdoLWJhY2tlZCBjaGFpciwgd3JhcHBlZCBpbiBhIGNvYXQgb2Ygc29tZSBjb21wbGV4aXR5IGRlc3BpdGUgdGhlIHdhcm10aCBvZiB0aGUgcm9vbS4gSGUgaXMgYXJ0aHJpdGljIGFuZCBzb21ld2hlcmUgaW4gaGlzIG5pbmV0aWVzIGFuZCBoYXMgdGhlIHByZWNpc2UsIHBhcnRpY3VsYXIgbWFubmVycyBvZiBzb21lb25lIHdobyBkZWNpZGVkIGxvbmcgYWdvIHdoYXQgc3RhbmRhcmQgb2YgYXR0ZW50aW9uIGEgY29udmVyc2F0aW9uIHJlcXVpcmVzIGFuZCBoYXMgbmV2ZXIgbG93ZXJlZCBpdC4KCkhlIGxvb2tzIGF0IHRoZSBjcnlzdGFsIHNoYXJkIGJlZm9yZSB5b3UgaGF2ZSBmaW5pc2hlZCBleHBsYWluaW5nLiBIZSB0dXJucyBpdCBpbiBoaXMgZmluZ2Vycy4gSGUgaXMgc2lsZW50IGZvciBsb25nZXIgdGhhbiBjb21mb3J0IGRpY3RhdGVzLgoK4oCcU2xvdmVuaWFuIGNhbGNpdGUgd2l0aCB0cmFjZSBpbmNsdXNpb25zLOKAnSBoZSBzYXlzLiDigJxJIGhhdmUgYmVlbiBsb29raW5nIGZvciBhIHBpZWNlIGxpa2UgdGhpcyBmb3Ig4oCUIOKAnSBhIHBhdXNlIOKAlCDigJxkZWNhZGVzLuKAnQoKSGUgcHV0cyBpdCBvbiB0aGUgdGFibGUuIEhlIGRvZXMgbm90IGdpdmUgaXQgYmFjay4KCuKAnFRoZSBzcXVhcmUgaXMgb24gdGhlIGVhc3Qgd2FsbC4gSSd2ZSBoYWQgaXQgZnJhbWVkLuKAnSBIZSBsb29rcyBvdmVyIGhpcyBnbGFzc2VzLiDigJxZb3VyIGxldHRlci4gQ29weSBpdCBvdXQuIEJ5IGhhbmQuIEkgd2FudCBhIHJlY29yZC7igJ0gSGUgcHJvZHVjZXMgcGFwZXIgYW5kIGEgcGVuIGZyb20gYSBkcmF3ZXIuIEhlIGhhcyBwbGFubmVkIHRvIGRvIHRoaXMu',
            'choices' => [
                ['text' => 'Q29weSB0aGUgbGV0dGVyIHN0cmFpZ2h0IGF3YXk=', 'next' => '6_copy'],
                ['text' => 'QXNrIHRvIHNlZSB0aGUgc3F1YXJlIGZpcnN0', 'next' => '6_wait'],
            ],
        ],
        '6_copy' => [
            'prose'   => 'VGhlIGxldHRlciB0YWtlcyBhbiBob3VyLiBIZSByZWFkcyBpdCB3aGlsZSB5b3Ugd3JpdGUg4oCUIG92ZXIgeW91ciBzaG91bGRlciBhdCBmaXJzdCwgdGhlbiBmcm9tIGhpcyBjaGFpciBhcyB0aGUgcGFnZXMgYWNjdW11bGF0ZS4KCuKAnFlvdSdyZSBodXJyeWluZyB0aGUgdGhpcmQgcGFyYWdyYXBoLOKAnSBoZSBzYXlzLiDigJxUaGUgaGFuZHdyaXRpbmcgc2hvd3Mu4oCdIEhlIHdhaXRzIHdoaWxlIHlvdSB0YWtlIGEgYnJlYXRoIGFuZCB3cml0ZSBtb3JlIGRlbGliZXJhdGVseS4g4oCcQmV0dGVyLuKAnQoKSGlzIG93biBoYW5kd3JpdGluZywgdmlzaWJsZSBpbiB0aGUgbWFyZ2luIG5vdGVzIG9mIHRoZSBib29rcyBiZWhpbmQgaGltLCB3b3VsZCBzdG9wIGEgY2FsbGlncmFwaGVyIGluIGl0cyB0cmFja3MuIEhlIGtub3dzIHRoaXMgYW5kIGRvZXNuJ3QgY29tbWVudCBvbiBpdC4KCkZyZWQgaGFzIGJlZW4gYmVzaWRlIHRoZSBib3RhbmljYWwgaWxsdXN0cmF0aW9uIGNhc2Ugb24gdGhlIHNvdXRoIHdhbGwgZm9yIHNvbWUgdGltZS4gSGUgaGFzIG5vdCBhc2tlZCB0byBvcGVuIGl0LiBUaGUgZWZmb3J0IG9mIG5vdCBhc2tpbmcgaXMgZW50aXJlbHkgdmlzaWJsZS4KCkphbWVzIGhhcyBjbGFpbWVkIHRoZSB3aW5kb3dzaWxsLiBUaGUgQ291bnQgaGFzIGxvb2tlZCBhdCBoaW0gdHdpY2UgYW5kIHNhaWQgbm90aGluZy4gVGhlIGhvdXNla2VlcGVyLCBwYXNzaW5nIHRoZSBkb29yLCBub3RpY2VzIHRoaXMgYW5kIGZpbmRzIGl0IHZlcnkgaW50ZXJlc3Rpbmcu',
            'choices' => [
                ['text' => 'RmluaXNoIHRoZSBsZXR0ZXIgYW5kIHdhaXQ=', 'next' => '7_trade'],
            ],
        ],
        '6_wait' => [
            'prose'   => 'SGUgcmVnYXJkcyB5b3UgZm9yIGEgbW9tZW50IHdoZW4geW91IGFzay4KCuKAnENvcHkgaXQgZmlyc3Qs4oCdIGhlIHNheXMuCgpUaGUgd3JpdGluZyB0YWtlcyBhbiBob3VyLiBIZSByZWFkcyBvdmVyIHlvdXIgc2hvdWxkZXIsIHdoaWNoIGlzIGEgc3BlY2lmaWMga2luZCBvZiBhdHRlbnRpb246IGNvbXBsZXRlLCB1bmludml0ZWQsIGFuZCBjb3JyZWN0LiBUd2ljZSBoZSBub3RlcyBzb21ldGhpbmcgYWJvdXQgaGFuZHdyaXRpbmcuIEhlIGlzLCBpdCBlbWVyZ2VzLCB0aGUga2luZCBvZiBwZXJzb24gd2hvIHRyZWF0cyBoYW5kd3JpdGluZyBhcyBhIG1vcmFsIGNhdGVnb3J5LgoKV2hlbiB5b3UgcmVhY2ggdGhlIGVuZCBoZSBzYXlzOiDigJxOb3cgSSdsbCBzaG93IHlvdSB0aGUgc3F1YXJlLuKAnSBIZSBkb2VzIG5vdCBtZW50aW9uIHRoYXQgdGhpcyB3YXMgd2hhdCB5b3UgYXNrZWQgZm9yIGVhcmxpZXIuIEl0IGlzLCBhcHBhcmVudGx5LCBoaXMgaWRlYSBub3cuCgpGcmVkIGhhcyBwb3NpdGlvbmVkIGhpbXNlbGYgYmVzaWRlIHRoZSBib3RhbmljYWwgaWxsdXN0cmF0aW9uIGNhc2Ugb24gdGhlIHNvdXRoIHdhbGwgd2l0aCB0aGUgZGVtZWFub3VyIG9mIHNvbWVvbmUgd2hvIGhhcyBmb3VuZCBhbiBleGNlbGxlbnQgbXVzZXVtIGV4aGliaXQgYW5kIGlzIGJlaGF2aW5nIGltcGVjY2FibHkuCgpKYW1lcyBpcyBvbiB0aGUgd2luZG93c2lsbCwgd2F0Y2hpbmcgdGhlIGNvdXJ0eWFyZC4gVGhlIENvdW50IGhhcyBub3QgcmVtb3ZlZCBoaW0uIEhlIHNlZW1zLCBpbiBzb21lIHF1aWV0IHdheSwgdG8gYXBwcm92ZS4=',
            'choices' => [
                ['text' => 'U2VlIHRoZSBzcXVhcmUgb24gdGhlIGVhc3Qgd2FsbA==', 'next' => '7_trade'],
            ],
        ],
        '7_trade' => [
            'prose'   => 'VGhlIHNxdWFyZSBpcyBmcmFtZWQgaW4gZGFyayB3b29kIG9uIHRoZSBlYXN0IHdhbGw6IGEgY2FzdGxlIG9uIGEgaGlsbCBhdCBzdW5zZXQsIGVtYnJvaWRlcmVkIGluIHRocmVhZCB0aGUgY29sb3VyIG9mIG9sZCBzdG9uZSBhbmQgd2FybSBsaWdodC4gSXQgaXMgdGhlIG1vc3QgZGVsaWJlcmF0ZWx5IGRpc3BsYXllZCBvZiBhbnkgc3F1YXJlIHlvdSd2ZSBmb3VuZC4gVGhlIENvdW50IGh1bmcgdGhpcyBiZWNhdXNlIGhlIHdhbnRlZCB0byBrZWVwIGxvb2tpbmcgYXQgaXQuCgpIZSBsaWZ0cyBpdCBmcm9tIHRoZSB3YWxsIGhpbXNlbGYuCgrigJxBbmQgdGhlIGlsbHVzdHJhdGlvbiBjYXNlLOKAnSBoZSBzYXlzLiDigJxZb3VyIHBhcnJvdCBoYXMgYmVlbiBzdGFyaW5nIGF0IGl0IHNpbmNlIGhlIGFycml2ZWQuIEkgZmluZCB0aGlzIGlycml0YXRpbmcu4oCdIEEgcGF1c2UuIOKAnEkgbWVhbiB0aGF0IGFzIGEgY29tcGxpbWVudC4gSSdsbCBnaXZlIGl0IHRvIHNvbWVvbmUgd2hvIHVuZGVyc3RhbmRzIHdoYXQncyBpbiBpdC7igJ0KCkhlIHBvY2tldHMgdGhlIGNyeXN0YWwgc2hhcmQuIEhlIGhhbmRzIG92ZXIgdGhlIHNxdWFyZSBhbmQsIGZyb20gdGhlIHNvdXRoIHdhbGwsIHRoZSBjYXNlLgoK4oCcU2hlIHN0YXllZCBoZXJlIG9uZSB3aW50ZXIs4oCdIGhlIHNheXMuIOKAnFNoZSBmaXhlZCBteSBsaWJyYXJ5LiBTaGUgd2FzIHRob3JvdWdoLuKAnSBIZSBzdHJhaWdodGVucyBoaXMgY29hdC4g4oCcSSBuZXZlciB1bmRlcnN0b29kIHdoeSBzaGUgbGVmdCB0aGF0IHBpZWNlIG9mIGNsb3RoLiBCdXQgSSBhbHdheXMga25ldyBpdCB3YXMgaW1wb3J0YW50LuKAnQ==',
            'choices' => [
                ['text' => 'T3BlbiB0aGUgaWxsdXN0cmF0aW9uIGNhc2U=', 'next' => '8_book'],
            ],
        ],
        '8_book' => [
            'prose'   => 'RnJlZCBoYXMgZ29uZSBzdGlsbC4KCkhlIGlzIGhvbGRpbmcgb25lIG1vdW50ZWQgc3BlY2ltZW4gdXAgdG93YXJkIHRoZSB3aW5kb3cgbGlnaHQuIEphbWVzIHdhdGNoZXMgaGltIGZyb20gdGhlIGFybSBvZiBhIGNoYWlyLgoK4oCcU2hlIHByZXNzZWQgdGhlc2UgaGVyc2VsZizigJ0gRnJlZCBzYXlzLiBIaXMgdm9pY2UgaXMgcXVpZXQgaW4gYSB3YXkgaXQgYWxtb3N0IG5ldmVyIGlzLiDigJxUaGUgbGFiZWxzIGFyZSBoZXIgaGFuZHdyaXRpbmcu4oCdIEhlIGhvbGRzIHVwIGFub3RoZXIuIOKAnFRoaXMgc3BlY2llcyB3YXMgcmVjb3JkZWQgaW4gdGhlIERhbnViZSBkZWx0YS4gVGhpcyBvbmUg4oCUIHRoaXMgaXMgZnJvbSB0aGUgbW91bnRhaW4gcmVnaW9uLuKAnSBIZSBzZXRzIGl0IGRvd24uIOKAnFNoZSB3YXMgY2F0YWxvZ3Vpbmcgb24gZXZlcnkgam91cm5leS7igJ0KCkEgcGF1c2UgdGhhdCBpcyBsb25nZXIgdGhhbiBjb21mb3J0YWJsZS4KCuKAnFNoZSBoYWQgYSBwcm9wZXIgbm90YXRpb24gc3lzdGVtLOKAnSBoZSBzYXlzLiDigJxTaGUgd2FzIGlkZW50aWZ5aW5nIG5ldyBzcGVjaWVzLuKAnQoKSGUgaXMgcXVpZXQgZm9yIGEgbW9tZW50LgoK4oCcSSBkaWRuJ3Qga25vdyzigJ0gaGUgc2F5cy4gSXQgaXMgbm90LCBmcm9tIEZyZWQsIGEgc21hbGwgYWRtaXNzaW9uLg==',
            'choices' => [
                ['text' => 'R28gZmluZCB0aGUgY2hhaXdhbGxh', 'next' => '9_end_chaiwalla'],
                ['text' => 'U2l0IHdpdGggRnJlZCBhIG1vbWVudA==', 'next' => '9_end_fred'],
            ],
        ],
        '9_end_chaiwalla' => [
            'prose'   => 'VGhlIGNoYWl3YWxsYSBpcyBvdXRzaWRlIHRoZSB2aWxsYWdlIGlubi4gTm90IGluc2lkZSBpdCDigJQgb3V0c2lkZSwgd2l0aCBoaXMgc21hbGwgYnJhemllciBhbmQgaGlzIGJyYXNzIHBvdCwgaW4gdGhlIGxhc3Qgb2YgdGhlIGFmdGVybm9vbiBsaWdodCwgYXMgdGhvdWdoIGhlIGhhcyBzaW1wbHkgZm91bmQgdGhlIHJpZ2h0IHNwb3QuIEhlIGlzIHNlcnZpbmcgY2hhaSB0byB0aGUgQ291bnQncyBob3VzZWtlZXBlciwgd2hvIGhhcyBjb21lIG91dCBmb3IgdGhpcyB3aXRoIHRoZSBwdXJwb3NlZnVsIGFpciBvZiBhIHdvbWFuIHdobyBrbm93cyBhIGdvb2QgdGhpbmcgYW5kIGFjdHMgb24gaXQuCgpIZSBsb29rcyB1cCB3aGVuIHlvdSBhcnJpdmUgYW5kIHBvdXJzIGEgY3VwIHdpdGhvdXQgYmVpbmcgYXNrZWQuCgpUaGUgaWxsdXN0cmF0aW9uIGNhc2UgaXMgdW5kZXIgeW91ciBhcm0uIFRoZSBzcXVhcmUgaXMgaW4geW91ciBiYWcuIFNvbWV3aGVyZSBpbiB0aGUgY2FzdGxlIGFib3ZlLCBDb3VudCBWYXJpcyBpcyBleGFtaW5pbmcgYSBTbG92ZW5pYW4gY2FsY2l0ZSBjcnlzdGFsIHdpdGggdHJhY2UgbWluZXJhbCBpbmNsdXNpb25zIGFuZCwgYnkgdGhlIHF1YWxpdHkgb2YgaGlzIHNpbGVuY2Ugd2hlbiB5b3UgbGVmdCwgZmluZGluZyBpdCBldmVyeXRoaW5nIGhlIHdhbnRlZC4KClRoZSBob3VzZWtlZXBlciBzYXlzLCB0byB0aGUgY2hhaXdhbGxhOiDigJxJIGRvbid0IGtub3cgd2hvIHlvdSBhcmUgZWl0aGVyLiBCdXQgdGhlIGNoYWkgaXMgdmVyeSBnb29kLuKAnQoKVGhlIGNoYWl3YWxsYSBkb2VzIG5vdCBhcHBlYXIgdG8gZmluZCB0aGlzIGNvbnZlcnNhdGlvbiBzdXJwcmlzaW5nLgoKSmFtZXMgaXMgYXNsZWVwIGluIGhpcyBiYWcsIGFscmVhZHkuIEhlIGFsd2F5cyBrbm93cyB3aGVuIHRoZSBkYXkncyB3b3JrIGlzIGRvbmUu',
            'ending'   => true,
        ],
        '9_end_fred' => [
            'prose'   => 'RnJlZCBzaXRzIHdpdGggdGhlIGlsbHVzdHJhdGlvbiBjYXNlIGZvciB0aGUgcmVzdCBvZiB0aGUgYWZ0ZXJub29uLgoKSGUgZG9lc24ndCBjYXRhbG9ndWUgb3IgYW5ub3RhdGUgb3IgZXhwbGFpbi4gSGUgcmVhZHMuIEhlIHR1cm5zIGVhY2ggbW91bnRlZCBzcGVjaW1lbiBvdmVyIGFuZCBzdHVkaWVzIHRoZSByZXZlcnNlIHdoZXJlIGdyYW5kbW90aGVyJ3Mgbm90YXRpb24gcnVucyBpbiBzbWFsbCBkZW5zZSByb3dzLiBIZSBpcyB2ZXJ5IHF1aWV0LgoKSmFtZXMgbW92ZXMgZnJvbSB0aGUgYXJtIG9mIHRoZSBjaGFpciB0byB0aGUgdGFibGUgYmVzaWRlIGhpbSwgYnkgZGVncmVlcywgZXZlbnR1YWxseSBzaXR0aW5nIGNsb3NlIGVub3VnaCB0byBiZSBwcmVzZW50IHdpdGhvdXQgYmVpbmcgYXNrZWQuCgpUaGUgQ291bnQsIHBhc3NpbmcgdGhyb3VnaCBvbmNlLCBwYXVzZXMuIEhlIGxvb2tzIGF0IEZyZWQgZm9yIGEgbW9tZW50LiDigJxTaGUgd2FzIGJldHRlciB0aGFuIHNoZSBsZXQgcGVvcGxlIGtub3cs4oCdIGhlIHNheXMuIEhlIGRvZXNuJ3Qgc3RvcCB3YWxraW5nLgoKT3V0c2lkZSwgdGhlIGV2ZW5pbmcgbGlnaHQgZG9lcyBzb21ldGhpbmcgdG8gdGhlIGNhc3RsZSBzdG9uZSB0aGF0IHRoZSBzdW5zZXQgc3F1YXJlIHdhcyBtYWRlIGZvci4gRnJlZCBsb29rcyB1cCBvbmNlLCBhdCB0aGUgd2luZG93LCBhbmQgdGhlbiByZXR1cm5zIHRvIHRoZSBjYXNlLiBIZSBoYXMgYSBsb25nIHdheSB0byByZWFkIGFuZCBoZSBpbnRlbmRzIHRvIGRvIGl0IHByb3Blcmx5Lg==',
            'ending'   => true,
        ],
    ],
];
