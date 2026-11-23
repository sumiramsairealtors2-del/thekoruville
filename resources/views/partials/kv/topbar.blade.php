{{-- Announcement marquee --}}
<div class="kv-topbar" aria-label="Announcements">
  <div class="kv-topbar__track">
    @php
      $kvTicker = [
        '🌿 BOOKINGS OPEN',
        '🏠 The Koru Ville – Resort-Themed Residential Township',
        '📍 Kilawali, Uttarakhand',
        '🐅 Just 15 Minutes from Phato Gate, Jim Corbett',
        '💧 Near Tumaria Dam',
        '📢 RERA Registration: UKREP10260000768',
        '🚀 Enquire Now for Pricing & Layout',
      ];
    @endphp
    @foreach($kvTicker as $item)
      <span>{{ $item }}</span>
    @endforeach
    @foreach($kvTicker as $item)
      <span aria-hidden="true">{{ $item }}</span>
    @endforeach
  </div>
</div>
