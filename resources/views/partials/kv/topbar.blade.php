{{-- Announcement marquee --}}
<div class="kv-topbar" aria-label="Announcements">
  <div class="kv-topbar__track">
    @php
      $kvTicker = [
        'Resort-themed plots from 111 sq.yd',
        '15 minutes from Phato Gate, Jim Corbett',
        '3.5 acres at Kilawali, Kashipur',
        'RERA Reg. No.: UKREP10260000768',
        'Book your private site visit',
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
