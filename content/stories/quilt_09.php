<?php
return [
    'id'    => 'q9',
    'title' => 'The Harbour Dispute',
    'color' => '#3A7A8A',

    'pages' => [
        '1_start' => [
            'prose'   => 'VGhlIEFlZ2VhbiBpcyB0aGUgY29sb3VyIG9mIGNvcHBlciBhdCB0aGlzIGhvdXIsIHRoZSBmaXNoaW5nIGJvYXRzIHB1bGxpbmcgYmFjayB0b3dhcmQgdGhlIGhhcmJvdXIgaW4gYSBsb25nIGxpbmUuCgpUaGUgdG93biBpcyBiZWxvdzogd2FybSBzdG9uZSwgdGVycmFjb3R0YSByb29mcywgYSBoYXJib3VyIHdhbGwsIGEgbGlnaHRob3VzZSBhdCB0aGUgZW5kIG9mIHRoZSBtb2xlLiBGcmVkIGlzIHN0dWR5aW5nIHNlYS1waW5rcyBvbiB0aGUgY2xpZmZ0b3AgYW5kIGhhcyBiZWVuIGZvciBzb21lIHRpbWUuIEphbWVzIHdhdGNoZXMgYSBwZWxpY2FuIHdpdGggdGhlIGNhbGlicmF0ZWQgYXR0ZW50aW9uIG9mIHNvbWV0aGluZyB0aGF0IGhhcyBiZWVuIGluIG1hbnkgcGxhY2VzIGFuZCBmb3VuZCBwZWxpY2FucyB3b3J0aCB3YXRjaGluZy4KCllvdSBoYXZlIHRoZSBib3RhbmljYWwgYm9vayBmcm9tIHRoZSBDb3VudCdzIGxpYnJhcnkuIFNvbWV3aGVyZSBpbiB0aGF0IGhhcmJvdXIsIGEgaGFyYm91ciBtYXN0ZXIgaGFzIGEgcXVpbHQgc3F1YXJlIGluIGEgc2FmZS4KClR3byB3YXlzIGRvd24gdG8gdGhlIHdhdGVyLg==',
            'choices' => [
                ['text' => 'VGFrZSBwYXNzYWdlIG9uIHRoZSB0cmFkaW5nIHZlc3NlbA==', 'next' => '2_sea'],
                ['text' => 'V2FsayB0aGUgY29hc3RhbCByb2FkIGludG8gdG93bg==', 'next' => '2_road'],
            ],
        ],
        '2_sea' => [
            'prose'   => 'VGhlIHRyYWRpbmcgdmVzc2VsIGlzIGEgd29ya2luZyBtZXJjaGFudCDigJQgdGhlIGNhcHRhaW4gZWZmaWNpZW50IGFuZCBub3QgcGFydGljdWxhcmx5IGludGVyZXN0ZWQgaW4gY29udmVyc2F0aW9uLCB3aGljaCBzdWl0cyB0aGUgZWFybHkgaG91ci4gRnJlZCBzdHVkaWVzIHNlYWdyYXNzIGZyb20gdGhlIGJvdy4gSmFtZXMgd2F0Y2hlcyBhIHBlbGljYW4uCgpUaGUgaGFyYm91ciBpcyB3YXJtIHdoZW4gdGhlIGJvYXQgdGllcyB1cDogc2FsdCBhbmQgZmlzaCBhbmQgc29tZXRoaW5nIGZyeWluZyBmcm9tIHRoZSBtYXJrZXQuIFRoZSBjaGFpd2FsbGEgaXMgYXQgdGhlIGVuZCBvZiB0aGUgZG9jayB3aXRoIGhpcyBicmFzcyBwb3QsIGFzIHRob3VnaCB0aGUgdGlkZSBoYXMgYnJvdWdodCB5b3UgYm90aC4KCiJHb29kIG1vcm5pbmcsIiBoZSBzYXlzLCB3aXRoIHRoZSBwYXJ0aWN1bGFyIHRvbmUgb2Ygc29tZW9uZSB3aG8gZXhwZWN0ZWQgeW91LgoKSGUgcG91cnMgdHdvIGN1cHMuIEZyZWQsIHN0ZXBwaW5nIG9mZiB0aGUgYm93LCBhY2NlcHRzIGhpcyB3aXRob3V0IHNsb3dpbmcgZG93bi4gSmFtZXMgc2l0cyBvbiBhIGRvY2sgYm9sbGFyZCBhbmQgd2F0Y2hlcyB0aGUgY2hhaXdhbGxhIHdpdGggdGhlIGNhcmVmdWwgYXR0ZW50aW9uIGhlIHJlc2VydmVzIGZvciB0aGluZ3Mgd29ydGggdW5kZXJzdGFuZGluZy4KCiJUaGUgaGFyYm91ciBtYXN0ZXIgaGFzIHdoYXQgeW91J3JlIGxvb2tpbmcgZm9yLCIgdGhlIGNoYWl3YWxsYSBzYXlzLiAiSGlzIGJyb3RoZXIiIOKAlCBhIHBhdXNlIOKAlCAiYWxzbyBoYXMgb3BpbmlvbnMgYWJvdXQgaXQuIg==',
            'choices' => [
                ['text' => 'RmluZCB0aGUgaGFyYm91ciBtYXN0ZXIncyBvZmZpY2U=', 'next' => '3_harbour'],
            ],
        ],
        '2_road' => [
            'prose'   => 'VGhlIGNvYXN0YWwgcm9hZCBwYXNzZXMgbGVtb24gZ3JvdmVzIOKAlCByZXNpbm91cyBoZWF0LCB0aGUgbGVhdmVzIGhlYXZ5IHdpdGggYWZ0ZXJub29uIOKAlCBhbmQgYSBsb25nIHN0cmV0Y2ggb2YgbWFzdGljIHRyZWVzIHRoYXQgRnJlZCBoYXMgYmVlbiBpbiBjb252ZXJzYXRpb24gd2l0aCBzaW5jZSBtb3JuaW5nLiBIZSBoYXMgaWRlbnRpZmllZCBmaXZlIHNwZWNpZXMgYW5kIG9uZSBwcm9iYWJsZSBoeWJyaWQuIEhlIGlzIHN0aWxsIHRhbGtpbmcgYWJvdXQgdGhlIGh5YnJpZC4KClRoZSBjaGFpd2FsbGEgaXMgYXQgdGhlIHRvd24gZ2F0ZS4gVGhpcyBpcyBzdHJhbmdlIOKAlCB0aGUgaGFyYm91ciBpcyBhIHF1YXJ0ZXItbWlsZSBmdXJ0aGVyLCBhbmQgdGhlIGNoYWl3YWxsYSBpcyBoZXJlIGF0IHRoZSBnYXRlLCB3aXRoIGhpcyBicmFzcyBwb3Qgc2V0IHVwIG9uIGEgbG93IHdhbGwgYXMgdGhvdWdoIHRoaXMgaXMgd2hlcmUgaGUgaW50ZW5kZWQgdG8gYmUuCgpGcmVkIHNheXM6ICJZb3Ugd2VyZSBpbiBUcmFuc3lsdmFuaWEuIgoKVGhlIGNoYWl3YWxsYSBzYXlzOiAiWWVzLiIKCkZyZWQgY29uc2lkZXJzIHRoaXMgYW5kIHJldHVybnMgdG8gdGhlIG1hc3RpYyBoeWJyaWQuCgpUaGUgY2hhaSBpcyB3YXJtLiBUaGUgY2hhaXdhbGxhIHBvdXJzIHdpdGhvdXQgYmVpbmcgYXNrZWQuICJUaGUgaGFyYm91ciBtYXN0ZXIgaGFzIHdoYXQgeW91J3JlIGxvb2tpbmcgZm9yLCIgaGUgc2F5cy4gIkhpcyBicm90aGVyIG1heSBiZSB0aGVyZS4gR28gaW4gZ29vZCBmYWl0aC4i',
            'choices' => [
                ['text' => 'V2FsayBkb3duIHRvIHRoZSBoYXJib3Vy', 'next' => '3_harbour'],
            ],
        ],
        '3_harbour' => [
            'prose'    => 'VGhlIGhhcmJvdXIgbWFzdGVyJ3Mgb2ZmaWNlIGhhcyBhIHZpZXcgb2YgdGhlIGRvY2sgYW5kIHNtZWxscyBvZiBwYXBlcndvcmsgYW5kIHNhbHQgaW4gYSBjb21iaW5hdGlvbiB0aGF0IHN1Z2dlc3RzIGRlY2FkZXMgb2YgY29leGlzdGVuY2UuIERpbWl0cmkgaXMgYSBjYXJlZnVsIG1hbiB3aXRoIGEgbGVkZ2VyIG9wZW4gb24gdGhlIGRlc2sgYW5kIHdoYXQgYXBwZWFycyB0byBiZSBhIHF1aWx0IHNxdWFyZSBpbiBhIHNlYWxlZCB0aW4gb24gdGhlIHNoZWxmIGJlaGluZCBoaW0uCgoiTXkgdW5jbGUgbGVmdCBpbnN0cnVjdGlvbnMsIiBoZSBzYXlzLCB3aGVuIHlvdSBleHBsYWluLiAiR2l2ZSBpdCB0byB3aG9ldmVyIGNvbWVzIGFza2luZyBpbiBnb29kIGZhaXRoLiIgSGUgaXMgYWxyZWFkeSByZWFjaGluZyBmb3IgdGhlIHRpbi4KClRoZW4gdGhlIGRvb3Igb3BlbnMuCgpUaGUgYnJvdGhlciBoYXMgdGhlIGxvb2sgb2YgYSBtYW4gd2hvIGhhcyBwcmVwYXJlZCBoaXMgcG9zaXRpb24gY2FyZWZ1bGx5IGFuZCBpbnRlbmRzIHRvIHJlcHJlc2VudCBpdCBhY2N1cmF0ZWx5LiAiVGhlIHVuY2xlIGdhdmUgdGhhdCB0byBvdXIgZmFtaWx5LCIgaGUgc2F5cy4gIk5vdCB0byBhIHN0cmFuZ2VyLiIKCkRpbWl0cmkgY2xvc2VzIGhpcyBleWVzIGJyaWVmbHkuCgpUaGUgdGluIGlzIG9uIHRoZSBkZXNrIGJldHdlZW4gYWxsIHRocmVlIG9mIHlvdS4=',
            'terminal' => true,
            'choices'  => [
                ['text' => 'V2FpdCB0byBoZWFyIHRoZSB3aG9sZSBhcmd1bWVudA==', 'next' => '4_dispute'],
            ],
        ],
        '4_dispute' => [
            'prose'   => 'VGhlIGRpc3B1dGUgaGFzIGJlZW4gb25nb2luZyBzaW5jZSB0aGUgdW5jbGUgZGllZC4gSGUgd2FzIGEgaGVyYiBtZXJjaGFudC4gVGhlIHNxdWFyZSBhcnJpdmVkIGF0IHRoZSBzdGFsbCB3aXRoIGluc3RydWN0aW9ucyB0aGF0IERpbWl0cmkgdG9vayB0byBiZSBjbGVhciBhbmQgaGlzIGJyb3RoZXIgdG9vayB0byBiZSBjb25kaXRpb25hbC4KClRoZSBicm90aGVyJ3MgcG9zaXRpb24gaXMgbm90IHVucmVhc29uYWJsZTogdGhlIHVuY2xlIGdhdmUgaXQgdG8gdGhlIGZhbWlseSBpbiB0cnVzdDsgYSBzdHJhbmdlciBjbGFpbWluZyBpdCBmdWxmaWxzIHRoZSBsZXR0ZXIgb2YgdGhlIGluc3RydWN0aW9ucywgbm90IHRoZSBzcGlyaXQuIERpbWl0cmkncyBwb3NpdGlvbiBpcyBhbHNvIG5vdCB1bnJlYXNvbmFibGUuCgpUaGV5IGJvdGggbG9vayBhdCB5b3UuCgpZb3UgaGF2ZSB0aGUgYm90YW5pY2FsIGJvb2suIE5lYXIgdGhlIGJhY2sgaXMgYSBwYWdlIHdpdGggYSBwcmVzc2VkIGNvYXN0YWwgaGVyYiDigJQgc3RpbGwgZmFpbnRseSBncmVlbiBhZnRlciBtYW55IHllYXJzLCB0aGUgbGVhdmVzIHBhcGVyeSB0aGluIOKAlCBhbmQgZ3JhbmRtb3RoZXIncyBoYW5kd3JpdGluZyBvbiB0aGUgbGFiZWwsIGFuZCBhIG5vdGUgYWJvdXQgd2hlcmUgc2hlIGJvdWdodCBpdC4gRnJvbSBE4oCUJ3MgdW5jbGUsIGF0IHRoZSBoYXJib3VyIG1hcmtldC4gVGhlIHN1bW1lciBvZiB0aGUgbG9uZyBjcm9zc2luZy4=',
            'choices' => [
                ['text' => 'VGVsbCBoaW0gYWJvdXQgdGhlIG5vdGUgaW4gdGhlIG1hcmdpbg==', 'next' => '5_tell'],
                ['text' => 'T3BlbiB0aGUgYm9vayBhbmQgbGV0IGhpbSByZWFkIGl0', 'next' => '5_show'],
            ],
        ],
        '5_tell' => [
            'prose'   => 'Ik15IGdyYW5kbW90aGVyIGJvdWdodCBhbiBoZXJiIGZyb20geW91ciB1bmNsZSwiIHlvdSBzYXkuICJEcmllZCBjb2FzdGFsIHRoeW1lLiBTaGUgY2FtZSB0byB0aGUgc3RhbGwgdGhyZWUgbW9ybmluZ3MgaW4gYSByb3cuIFNoZSBrZXB0IGEgcHJlc3NlZCBzcGVjaW1lbiBvZiBldmVyeXRoaW5nIHNoZSBmb3VuZCDigJQgdGhlIGxhYmVsIHNheXMgd2hlcmUgc2hlIGJvdWdodCBpdC4gRnJvbSBE4oCUJ3MgdW5jbGUsIGhhcmJvdXIgbWFya2V0LCB0aGUgc3VtbWVyIG9mIHRoZSBsb25nIGNyb3NzaW5nLiIKClRoZSBicm90aGVyIGlzIHN0aWxsLgoKIlNoZSBsZWZ0IHRoZSBzcXVhcmUgYXMgYSB0aGFuay15b3UgZm9yIGhpcyBnZW5lcm9zaXR5LiBUaGUgYm9vayBpcyB0aGUgcmVjb3JkLiIKCllvdSBzZXQgdGhlIGJvb2sgb24gdGhlIGRlc2sgYW5kIGZpbmQgdGhlIHBhZ2UuCgpEaW1pdHJpIGxlYW5zIGZvcndhcmQuIFRoZSBicm90aGVyIHJlYWRzIHRoZSBsYWJlbCBzbG93bHkg4oCUIGluIGhpcyBncmFuZG1vdGhlcidzIOKAlCBubywgaW4geW91ciBncmFuZG1vdGhlcidzIOKAlCBzbWFsbCwgcGFydGljdWxhciBoYW5kd3JpdGluZy4=',
            'choices' => [
                ['text' => 'V2FpdCBmb3IgaGltIHRvIGZpbmlzaCByZWFkaW5n', 'next' => '6_resolved'],
            ],
        ],
        '5_show' => [
            'prose'   => 'WW91IG9wZW4gdGhlIGJvb2sgdG8gdGhlIHBhZ2Ugd2l0aG91dCBleHBsYW5hdGlvbi4KClRoZSBjb2FzdGFsIGhlcmIgaXMgcHJlc3NlZCBmbGF0IOKAlCBzdGlsbCBmYWludGx5IGdyZXktZ3JlZW4sIHRoZSBsZWF2ZXMgcGFwZXJ5IHRoaW4uIEdyYW5kbW90aGVyJ3MgaGFuZHdyaXRpbmcgb24gdGhlIGxhYmVsOiBUaHltdXMgY2FwaXRhdHVzLCBhbmQgYmVsb3cgaXQsIGluIHNtYWxsZXIgc2NyaXB0LCBhIG5vdGUgYWJvdXQgd2hlcmUgc2hlIGJvdWdodCBpdC4KClRoZSBicm90aGVyIHJlYWRzIGl0LgoKSGUgcmVhZHMgaXQgYWdhaW4uIEhpcyBoYW5kIG9uIHRoZSBkZXNrIGlzIHN0aWxsLiBEaW1pdHJpIHJlYWRzIG92ZXIgaGlzIHNob3VsZGVyIGFuZCBzYXlzIG5vdGhpbmcuCgpUaGUgbm90ZTogZnJvbSBE4oCUJ3MgdW5jbGUsIGhhcmJvdXIgbWFya2V0LCB0aGUgc3VtbWVyIG9mIHRoZSBsb25nIGNyb3NzaW5nLiBTaGUgY2FtZSB0byB0aGUgc3RhbGwgdGhyZWUgbW9ybmluZ3MgaW4gYSByb3cuIEhlIG5ldmVyIGtuZXcgd2hhdCBzaGUgbWFkZSB3aXRoIGl0LiBTaGUgbGVmdCB0aGUgc3F1YXJlIGFzIGEgdGhhbmsteW91IOKAlCBoaXMgZ2VuZXJvc2l0eSwgaGVyIGdpZnQgaW4gcmV0dXJuLg==',
            'choices' => [
                ['text' => 'V2FpdCBmb3IgaGltIHRvIGRlY2lkZQ==', 'next' => '6_resolved'],
            ],
        ],
        '6_resolved' => [
            'prose'   => 'VGhlIGJyb3RoZXIgaG9sZHMgdGhlIHNxdWFyZSBpbiBib3RoIGhhbmRzIGZvciBhIG1vbWVudC4gSGUgaXMgbG9va2luZyBhdCB0aGUgaGFyYm91ciB0aHJvdWdoIHRoZSB3aW5kb3cuCgoiSGUgdGFsa2VkIGFib3V0IHRoYXQgc3VtbWVyLCIgaGUgc2F5cy4gIlRoZSB3b21hbiB3aG8gY2FtZSBldmVyeSBtb3JuaW5nIGZvciB0aGUgdGh5bWUuIEhlIHNhaWQgc2hlIGtuZXcgZXhhY3RseSB3aGF0IHNoZSB3YW50ZWQuIiBBIHBhdXNlLiAiSSBkaWRuJ3Qga25vdyB0aGVyZSB3YXMgYSBzcXVhcmUgaW52b2x2ZWQuIEkgdGhvdWdodCBpdCB3YXMganVzdCBhIHBvc3Nlc3Npb24uIgoKIlRha2UgaXQuIgoKSGUgbGVhdmVzIHdpdGhvdXQgY2VyZW1vbnkuIERpbWl0cmkgd2F0Y2hlcyBoaW0gZ28uCgoiSGUncyBiZWVuIGhvbGRpbmcgdGhhdCBzaW5jZSB0aGUgdW5jbGUgZGllZCwiIERpbWl0cmkgc2F5cyBxdWlldGx5LiAiSXQgd2FzIG5ldmVyIGFib3V0IHRoZSBzcXVhcmUuIgoKSGUgcHVzaGVzIHRoZSB0aW4gdG93YXJkIHlvdS4gSW5zaWRlOiBncmFuZG1vdGhlcidzIHNxdWFyZSwgd3JhcHBlZCBpbiBvaWxza2luLiBBIGhhcmJvdXIgYXQgc3Vuc2V0LCBpbiBoZXIgdGhyZWFkLgoKT3V0c2lkZSB0aGUgd2luZG93OiB0aGUgaGFyYm91ciB3YWxsLCBhbmQgb24gdGhlIHN0b25lLCBqdXN0IHZpc2libGUgZnJvbSBoZXJlLCBhIHNtYWxsIGJyb256ZSBwbGFxdWUu',
            'choices' => [
                ['text' => 'R28gYW5kIHJlYWQgdGhlIHBsYXF1ZQ==', 'next' => '7_plaque'],
            ],
        ],
        '7_plaque' => [
            'prose'    => 'VGhlIHBsYXF1ZSBpcyBzbWFsbCBhbmQgYnJvbnplLCBzZXQgYXQgc2hvdWxkZXIgaGVpZ2h0IGluIHRoZSBoYXJib3VyIHdhbGwuIFRoZSBzdG9uZSBhcm91bmQgaXQgaXMgb2xkLiBXaG9ldmVyIGNob3NlIHRoaXMgc3BvdCBjaG9zZSBpdCBmb3IgdGhlIHZpZXc6IHRoZSB3aG9sZSBoYXJib3VyIG1vdXRoIGlzIHZpc2libGUgZnJvbSBoZXJlLCB0aGUgc2VhIGJleW9uZCwgdGhlIGxpZ2h0IG1vdmluZyBvbiB0aGUgd2F0ZXIuCgpUaGUgdGV4dCByZWFkczogVG8gYWxsIHdobyB3YWl0IGZvciB0aGUgdGlkZS4KClRoZSBjaGFpd2FsbGEgaXMgYmVzaWRlIHlvdS4gSGUgYXJyaXZlZCBxdWlldGx5LCBhcyBoZSBkb2VzLiBIZSBpcyBsb29raW5nIGF0IHRoZSBwbGFxdWUgd2l0aCB0aGUgZXhwcmVzc2lvbiBvZiBzb21lb25lIHdobyBjYW1lIGhlcmUgZm9yIGEgc3BlY2lmaWMgcmVhc29uIGFuZCBpcyBub3cgZnVsZmlsbGluZyBpdC4KCkZyZWQgc2F5czogIlRoYXQgaXMgYWxzbyBhIHByZWNpc2UgZGVzY3JpcHRpb24gb2YgdGlkYWwgcGxhbnQgYmlvbG9neS4iCgpObyBvbmUgcmVzcG9uZHMgdG8gdGhpcy4KClRoZSBjaGFpd2FsbGEgc2F5cywgc3RpbGwgbG9va2luZyBhdCB0aGUgaGFyYm91cjogIlNoZSB3cm90ZSB0aGF0IGZvciBtZS4iCgpIZSBzYXlzIG5vdGhpbmcgbW9yZS4gSmFtZXMsIG9uIHlvdXIgc2hvdWxkZXIsIHR1cm5zIGhpcyB3aG9sZSBoZWFkIHRvIGxvb2sgYXQgdGhlIGNoYWl3YWxsYS4=',
            'terminal' => true,
            'choices'  => [
                ['text' => 'U3RheSB1bnRpbCB0aGUgZXZlbmluZyBsaWdodCBjaGFuZ2Vz', 'next' => '8_after'],
            ],
        ],
        '8_after' => [
            'prose'   => 'VGhlIGxpZ2h0IGdvZXMgc2xvd2x5IG9uIHRoZSBBZWdlYW4g4oCUIGNvcHBlciB0byBwaW5rIHRvIGEgZ3JleS1ibHVlIHRoYXQgRnJlZCBpcyBzdHVkeWluZyB3aXRoIHRoZSBmb2N1cyBoZSBicmluZ3MgdG8gdGhpbmdzIGhlIGludGVuZHMgdG8gZG9jdW1lbnQuIEphbWVzIHdhdGNoZXMgdGhlIGZpc2hpbmcgYm9hdHMgY29tZSBpbi4KCkRpbWl0cmkncyBicm90aGVyIGNhbWUgYmFjayBicmllZmx5LiBIZSB3YW50ZWQgdG8gc2F5IHRoYXQgdGhlIHVuY2xlIHNwb2tlIG9mIHRoYXQgc3VtbWVyIG1vcmUgdGhhbiBvbmNlIGFuZCB0aGF0IGl0IGhhZCBiZWVuIGEgZ29vZCBvbmUuIEhlIGRpZG4ndCBlbGFib3JhdGUuIEhlIGRpZG4ndCBzZWVtIHRvIG5lZWQgdG8uCgpUaGUgY2hhaXdhbGxhIHdhcyBhdCB0aGUgaGFyYm91ciB3YWxsIGEgd2hpbGUgYWdvLiBXaGV0aGVyIGhlIGlzIHN0aWxsIHRoZXJlIGlzIGhhcmRlciB0byBkZXRlcm1pbmUuIEhpcyBicmF6aWVyIGlzIGRvd24gdG8gY29hbHMuIFRoZSBjaGFpIG9uIHRoZSBiZW5jaCBpcyBzdGlsbCB3YXJtLgoKVGhlIHNxdWFyZSBpcyBpbiB5b3VyIGJhZywgYW5kIHRoZSBib3RhbmljYWwgYm9vaywgYW5kIGFuIGV2ZW5pbmcgdGhhdCBzdGlsbCBzbWVsbHMgb2Ygc2FsdCBhbmQgbGVtb24gYW5kIHRoZSB0aHltZSBmcm9tIHRoZSBoYXJib3VyIG1hcmtldC4=',
            'choices' => [
                ['text' => 'R2luZ2VyIGJlZXIgYXQgdGhlIHdhdGVyZnJvbnQgdGF2ZXJu', 'next' => '9_end_tavern'],
                ['text' => 'U2l0IGF0IHRoZSBoYXJib3VyIHdhbGwgdW50aWwgZGFyaw==', 'next' => '9_end_harbour'],
            ],
        ],
        '9_end_tavern' => [
            'prose'  => 'VGhlIHRhdmVybiBpcyB0aHJlZSB0YWJsZXMgd2lkZSBhbmQgbG91ZCB3aXRoIGZpc2hlcm1lbiBhbmQgc29tZXRoaW5nIHJvYXN0aW5nIGluIHRoZSBiYWNrIHRoYXQgc21lbGxzIG9mIG9yZWdhbm8uIEZyZWQgaGFzIGEgZ2luZ2VyIGJlZXIgYW5kIGlzIGV4cGxhaW5pbmcgdG8gdGhlIG5leHQgdGFibGUgdGhlIGNvcnJlY3QgTGF0aW4gbmFtZSBmb3IgY29hc3RhbCB0aHltZSBhbmQgd2h5IHRoZSBjb21tb24gbmFtZSBpcyB0ZWNobmljYWxseSBpbXByZWNpc2UuIFRoZXkgYXBwZWFyIHRvIGZpbmQgdGhpcyBpbnRlcmVzdGluZy4KCkRpbWl0cmkncyBicm90aGVyIHNlbnQgdGhlIGhvbmV5IGphciB3aXRoIHRoZSB0YXZlcm5rZWVwZXIg4oCUIGFuIGVtYmFycmFzc2VkIHBlYWNlIG9mZmVyaW5nLCBzaGUgc2FpZCwgd2l0aG91dCBmdXJ0aGVyIGNvbW1lbnQsIGFzIHRob3VnaCB0aGlzIGhhcHBlbmVkIHJlZ3VsYXJseS4KCkZyZWQgb3BlbnMgdGhlIGphci4KCiJUaHltdXMgY2FwaXRhdHVzLCIgaGUgc2F5cy4gIkNvYXN0YWwgbGltZXN0b25lIGhhYml0YXQsIHNwZWNpZmljIHNhbGluaXR5IHJhbmdlLiBUaGF0IHBvbGxlbiBpcyBhIGdlb2dyYXBoaWMgZmluZ2VycHJpbnQuIiBIZSBjbG9zZXMgdGhlIGphci4gIktlZXAgaXQuIEl0IHdpbGwgdGVsbCB5b3Ugc29tZXRoaW5nIGxhdGVyLiIKCkphbWVzIGlzIG9uIHRoZSB3aW5kb3dzaWxsLiBUaGUgaGFyYm91ciBpcyBkYXJrIG91dHNpZGUuIFRoZSBzcXVhcmUgaXMgaW4geW91ciBiYWcsIGFuZCB0aGUgYm9vaywgYW5kIHRoZSBob25leS4KCkJlZm9yZSBGcmVkIHJlcGxhY2VkIHRoZSBsaWQsIGp1c3QgZm9yIGEgbW9tZW50LCB0aGUgdGh5bWUgc21lbGwgcmVhY2hlZCB5b3U6IHdhcm0gYW5kIHNwZWNpZmljLCB0aGUgcGFydGljdWxhciBzbWVsbCBvZiB0aGlzIGNvYXN0IGF0IHRoZSBlbmQgb2YgYSBnb29kIGRheS4=',
            'ending' => true,
        ],
        '9_end_harbour' => [
            'prose'  => 'VGhlIGhhcmJvdXIgd2FsbCBnb2VzIHF1aWV0IGFmdGVyIGRhcmsuIFRoZSBicmF6aWVyIGlzIGRvd24gdG8gY29hbHMgYW5kIHRoZSBjaGFpd2FsbGEsIGlmIGhlIHdhcyBzdGlsbCBoZXJlLCBoYXMgZ29uZSDigJQgdGhvdWdoIHRoZSB3YXJtdGggcmVtYWlucy4KClRoZSBob25leSBqYXIgYXJyaXZlZCBhdCBzb21lIHBvaW50LCBsZWZ0IG9uIHRoZSB3YWxsIHdpdGhvdXQgY2VyZW1vbnkuIERpbWl0cmkncyBicm90aGVyIHNlbnQgaXQsIHRoZSB0YXZlcm5rZWVwZXIgc2FpZCB3aGVuIHNoZSBwYXNzZWQg4oCUIGFuIGVtYmFycmFzc2VkIHBlYWNlIG9mZmVyaW5nLgoKRnJlZCBvcGVucyBpdCBjYXJlZnVsbHkuCgoiVGh5bXVzIGNhcGl0YXR1cywiIGhlIHNheXMuICJTcGVjaWZpYyBjb2FzdGFsIGxpbWVzdG9uZSwgc3BlY2lmaWMgc2FsaW5pdHkgcmFuZ2UuIFRoZSBwb2xsZW4gaXMgYSBnZW9ncmFwaGljIGZpbmdlcnByaW50LiIgSGUgcmVwbGFjZXMgdGhlIGxpZCB3aXRoIHByZWNpc2lvbi4gIktlZXAgaXQuIEl0IHdpbGwgdGVsbCB5b3Ugc29tZXRoaW5nIGxhdGVyLiIKCkphbWVzIGlzIHdhdGNoaW5nIHRoZSBkYXJrIHdhdGVyIHdpdGggdGhlIHVuY29tcGxpY2F0ZWQgYXR0ZW50aW9uIGhlIGdpdmVzIHRvIGFsbCB3YXRlciBhdCBuaWdodC4gVGhlIHNxdWFyZSBpcyBpbiB5b3VyIGJhZywgYW5kIGJlc2lkZSBpdCB0aGUgYm9vayB3aXRoIHRoZSBjb2FzdGFsIGhlcmIgcHJlc3NlZCBpbnRvIHRoZSBwYWdlcywgdGhlIGxhYmVsIGluIGdyYW5kbW90aGVyJ3MgaGFuZHdyaXRpbmcsIHRoZSBub3RlIGFib3V0IHRoZSBzdW1tZXIgb2YgdGhlIGxvbmcgY3Jvc3NpbmcuCgpUaGUgcGxhcXVlIGlzIGp1c3QgdmlzaWJsZSBpbiB0aGUgZGFyazogVG8gYWxsIHdobyB3YWl0IGZvciB0aGUgdGlkZS4KClRoZSBmaXNoaW5nIGJvYXRzIGFyZSBpbi4gVGhlIGhhcmJvdXIgaXMgc3RpbGwu',
            'ending' => true,
        ],
    ],
];
