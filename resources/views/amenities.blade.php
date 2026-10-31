@extends('layouts.kv')

@section('title', 'Amenities | The Koru Ville, Kilawali')
@section('description', 'Swimming pool, landscaped lawns, dining cluster, clubhouse and round-the-clock gated security at The Koru Ville, a resort-style community near Jim Corbett.')
@section('hero', '1')

@section('content')

<div class="kv-subpage">

  @include('partials.kv.pagehero', [
    'eyebrow' => 'World-Class Amenities',
    'title' => 'Amenities',
    'lede' => 'Shared spaces designed to make the township feel like a retreat from the day you move in.',
    'image' => 'assets/img/slots/gallery-desktop-1920x820.webp',
    'imageMobile' => 'assets/img/slots/gallery-mobile-900x1125.webp',
    'imageWidth' => 1920,
    'imageHeight' => 820,
    'alt' => 'The Koru Ville community grounds at Kilawali',
  ])

  <section class="kv-panel kv-amenities">
    <div class="kv-shell">
      <div class="kv-amenities__head" data-mv-group="90">
        <div>
          <span class="kv-eyebrow" data-mv="fade">World-Class Amenities</span>
          <h2 class="kv-display kv-display--md" data-mv="words">A Resort-Style Community</h2>
        </div>
        <p class="kv-lede" data-mv="blur">Even though owners build their own individual homes, the surrounding community is designed to already feel like a retreat.</p>
      </div>

      <div class="kv-amenities__grid" data-mv-group="90" data-mv-draw>
        <div class="kv-amenity" data-mv="up">
          <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M12 20V10a3 3 0 0 1 6 0v18"/><path d="M12 16h6M12 22h6"/><path d="M16 28v8"/><path d="M26 30c0-2 2-3 4-3s4 1 4 3"/><path d="M7 36c2 2 4 2 6 0s4-2 6 0 4 2 6 0 4-2 6 0 4 2 6 0"/></svg>
          <h3>Swimming Pool</h3>
          <p>A resort-themed pool for owners and guests.</p>
        </div>
        <div class="kv-amenity" data-mv="up">
          <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M6 32c4-6 10-9 18-9s14 3 18 9"/><path d="M24 23V8"/><path d="M24 12c-5 0-9-2-11-5 5-1 9 1 11 5Z"/><path d="M24 16c5 0 9-2 11-5-5-1-9 1-11 5Z"/><path d="M4 38h40"/></svg>
          <h3>Landscaped Lawns</h3>
          <p>Green, open surroundings woven through the layout.</p>
        </div>
        <div class="kv-amenity" data-mv="up">
          <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M16 8v14M12 8v6a4 4 0 0 0 8 0V8"/><path d="M16 22v18"/><path d="M32 8c3 0 5 3 5 7s-2 7-5 7v18"/></svg>
          <h3>Dining Cluster</h3>
          <p>A dedicated cluster around shared dining spaces.</p>
        </div>
        <div class="kv-amenity" data-mv="up">
          <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M24 4l16 6v12c0 10-7 17-16 22C15 39 8 32 8 22V10l16-6Z"/><path d="M17 23l5 5 10-11"/></svg>
          <h3>Gated Security</h3>
          <p>Round-the-clock, CCTV-monitored gated security.</p>
        </div>
        <div class="kv-amenity" data-mv="up">
          <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M6 42h36"/><path d="M10 42V20l14-9 14 9v22"/><path d="M18 42V30h12v12"/><path d="M20 21h8"/></svg>
          <h3>Clubhouse</h3>
          <p>A shared resort-style clubhouse at the heart of it all.</p>
        </div>
      </div>
    </div>
  </section>

</div>

@endsection
