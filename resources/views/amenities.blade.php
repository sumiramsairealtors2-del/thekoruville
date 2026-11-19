@extends('layouts.kv')

@section('title', 'Amenities | The Koru Ville, Kilawali')
@section('description', 'Resort-style amenities at The Koru Ville: open plunge pool, retreat restaurant, signature clubhouse, landscaped lawns, gated security, modern washrooms and bedrooms near Jim Corbett.')
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

  {{-- INTRO --}}
  <section class="kv-panel kv-panel--cream">
    <div class="kv-shell">
      <div class="kv-amenity-intro" data-mv-group="100">
        <div class="kv-amenity-intro__copy" data-mv="left">
          <span class="kv-eyebrow" data-mv="fade">Designed for Retreat Living</span>
          <h2 class="kv-display kv-display--md" data-mv="words">A Resort-Style Community</h2>
          <p class="kv-lede" data-mv="blur">Even though owners build their own individual homes, the surrounding community is designed to already feel like a resort — from private plunge pools to a signature clubhouse.</p>
        </div>
        <div class="kv-amenity-intro__figure" data-mv="right" data-mv-tilt="6">
          <div class="kv-figure-wrap">
            <div class="kv-figure__ring"></div>
            <img src="{{ asset('assets/img/slots/gallery-desktop-1920x820.webp') }}"
                 alt="Resort amenities at The Koru Ville" loading="lazy"
                 data-mv-parallax="24">
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- AMENITY GRID --}}
  <section class="kv-panel kv-panel--cream kv-amenities">
    <div class="kv-shell">
      <div class="kv-amenities__head" data-mv-group="100">
        <div>
          <span class="kv-eyebrow" data-mv="fade">Shared Spaces</span>
          <h2 class="kv-display kv-display--md" data-mv="words">Every Detail, A Resort Moment</h2>
        </div>
        <p class="kv-lede" data-mv="blur">Thoughtfully designed amenities woven through landscaped lawns and tree-lined avenues.</p>
      </div>

      <div class="kv-amenity-grid" data-mv-group="140" data-mv-draw>
        <article class="kv-amenity-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-amenity__wrap">
            <div class="kv-amenity__icon">
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20V10a3 3 0 0 1 6 0v18"/><path d="M12 16h6M12 22h6"/><path d="M16 28v8"/><path d="M26 30c0-2 2-3 4-3s4 1 4 3"/><path d="M7 36c2 2 4 2 6 0s4-2 6 0 4 2 6 0 4-2 6 0 4 2 6 0"/></svg>
            </div>
            <div class="kv-amenity__body">
              <h3>Swimming Pool</h3>
              <p>A resort-themed pool for owners and guests, set within lush tropical landscapes.</p>
              <a href="#" class="kv-amenity__link">Discover <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="kv-amenity-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-amenity__wrap">
            <div class="kv-amenity__icon">
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 32c4-6 10-9 18-9s14 3 18 9"/><path d="M24 23V8"/><path d="M24 12c-5 0-9-2-11-5 5-1 9 1 11 5Z"/><path d="M24 16c5 0 9-2 11-5-5-1-9 1-11 5Z"/><path d="M4 38h40"/></svg>
            </div>
            <div class="kv-amenity__body">
              <h3>Landscaped Lawns</h3>
              <p>Green, open surroundings woven through the layout for quiet strolls and morning light.</p>
              <a href="#" class="kv-amenity__link">Discover <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="kv-amenity-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-amenity__wrap">
            <div class="kv-amenity__icon">
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8v14M12 8v6a4 4 0 0 0 8 0V8"/><path d="M16 22v18"/><path d="M32 8c3 0 5 3 5 7s-2 7-5 7v18"/></svg>
            </div>
            <div class="kv-amenity__body">
              <h3>The Retreat Restaurant</h3>
              <p>A sophisticated alfresco dining destination with premium design and warm wooden finishes.</p>
              <a href="#" class="kv-amenity__link">Discover <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="kv-amenity-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-amenity__wrap">
            <div class="kv-amenity__icon">
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M24 4l16 6v12c0 10-7 17-16 22C15 39 8 32 8 22V10l16-6Z"/><path d="M17 23l5 5 10-11"/></svg>
            </div>
            <div class="kv-amenity__body">
              <h3>Gated Security</h3>
              <p>Round-the-clock, CCTV-monitored gated security for complete peace of mind.</p>
              <a href="#" class="kv-amenity__link">Discover <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="kv-amenity-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-amenity__wrap">
            <div class="kv-amenity__icon">
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 42h36"/><path d="M10 42V20l14-9 14 9v22"/><path d="M18 42V30h12v12"/><path d="M20 21h8"/></svg>
            </div>
            <div class="kv-amenity__body">
              <h3>The Signature Clubhouse</h3>
              <p>A contemporary sanctuary for recreation, relaxation, and social gatherings.</p>
              <a href="#" class="kv-amenity__link">Discover <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="kv-amenity-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-amenity__wrap">
            <div class="kv-amenity__icon">
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 40V16M36 40V16M24 40V16"/><path d="M12 16h24"/><path d="M12 28h6M30 28h6"/></svg>
            </div>
            <div class="kv-amenity__body">
              <h3>Open Plunge Pool</h3>
              <p>A private plunge pool nestled amidst lush tropical landscapes for resort-inspired living.</p>
              <a href="#" class="kv-amenity__link">Discover <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="kv-amenity-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-amenity__wrap">
            <div class="kv-amenity__icon">
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M24 8V44M20 12h8M20 24h8M20 36h8"/><path d="M24 44c4 0 8-4 8-8s-4-8-8-8-8 4-8 8 4 8 8 8Z"/></svg>
            </div>
            <div class="kv-amenity__body">
              <h3>Modern Style Washroom</h3>
              <p>A refined wellness retreat with minimalist architecture and premium materials.</p>
              <a href="#" class="kv-amenity__link">Discover <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="kv-amenity-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-amenity__wrap">
            <div class="kv-amenity__icon">
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 8v32M36 8v32M24 40V8M24 24V8M24 24V40"/><path d="M12 16h24M12 32h24"/></svg>
            </div>
            <div class="kv-amenity__body">
              <h3>Bedroom &amp; Living Area</h3>
              <p>Tranquil havens overlooking beautifully landscaped gardens with refined craftsmanship.</p>
              <a href="#" class="kv-amenity__link">Discover <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

</div>

@endsection
