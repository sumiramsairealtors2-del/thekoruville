@extends('layouts.kv')

@section('title', 'Amenities | The Koru Ville, Kilawali')
@section('description', 'Explore The Koru Ville’s resort-style amenities near Jim Corbett, including a shared swimming pool, signature clubhouse, landscaped lawns and private plunge pools.')
@section('hero', '1')

@section('content')

@php
  $amenityZones = [
    [
      'id' => 'pool-and-lawns',
      'title' => 'Pool & Landscaped Grounds',
      'image' => 'assets/img/kv/plot-1-860.webp',
      'features' => [
        'Swimming Pool' => 'A shared resort-style pool for owners and guests.',
        'Landscaped Lawns' => 'Open greens and tree-lined paths for a quiet walk.',
      ],
    ],
    [
      'id' => 'clubhouse-and-dining',
      'title' => 'Clubhouse & Dining',
      'image' => 'assets/img/kv/about-1000.webp',
      'features' => [
        'The Signature Clubhouse' => 'A shared space for recreation, relaxation and gatherings.',
        'The Retreat Restaurant' => 'Alfresco dining with warm timber finishes.',
      ],
    ],
    [
      'id' => 'community',
      'title' => 'A Gated Community',
      'image' => 'assets/img/kv/why-800.webp',
      'features' => [
        'Gated Security' => 'A gated entrance and round-the-clock CCTV monitoring.',
        'Internal Roads' => 'Wide roads connect the residential plots and shared spaces.',
      ],
    ],
  ];
  $amenityGallery = [
    ['image' => 'assets/img/Sunset Villa Overlooking a Tropical Valley.png', 'title' => 'Poolside at Sunset'],
    ['image' => 'assets/img/kv/gallery-1440.webp', 'title' => 'Villas & Landscaped Grounds'],
    ['image' => 'assets/img/kv/why-1040.webp', 'title' => 'A Villa Among the Hills'],
  ];
@endphp

<div class="kv-subpage kv-amenities-page">
  <section class="kv-page-masthead" aria-labelledby="amenities-title">
    <div class="kv-shell">
      <div class="kv-page-masthead__grid">
        <div data-mv="up">
          <span class="kv-eyebrow">The Koru Ville · Kilawali</span>
          <h1 id="amenities-title">Amenities</h1>
        </div>
        <p data-mv="up" data-mv-delay="100">Resort-style spaces for slow mornings, time outdoors and evenings together.</p>
      </div>

      <nav class="kv-page-masthead__links" aria-label="Explore amenities" data-mv="up">
        <a href="#pool-and-lawns">Pool &amp; grounds <span aria-hidden="true">↓</span></a>
        <a href="#clubhouse-and-dining">Clubhouse &amp; dining <span aria-hidden="true">↓</span></a>
        <a href="#community">Gated community <span aria-hidden="true">↓</span></a>
        <a href="#villa-amenities">Private villas <span aria-hidden="true">↓</span></a>
      </nav>
    </div>
  </section>

  <section id="amenities" class="kv-subsection kv-amenities-page__showcase" aria-labelledby="amenities-heading">
    <div class="kv-shell">
      <div class="kv-amenities-page__intro" data-mv="up">
        <span class="kv-eyebrow">Around the township</span>
        <h2 id="amenities-heading" class="kv-display kv-display--md">Resort-Style Living</h2>
        <p>Explore the shared spaces that connect daily life at The Koru Ville, from the landscaped grounds to the clubhouse.</p>
      </div>

      <div class="kv-amenities-page__zones" data-amenity-zones>
        <div class="kv-amenities-page__media" aria-hidden="true">
          @foreach ($amenityZones as $zone)
            <img src="{{ asset($zone['image']) }}" alt="" loading="lazy" decoding="async">
          @endforeach
        </div>

        <div class="kv-amenities-page__chapters">
          @foreach ($amenityZones as $zone)
            <article id="{{ $zone['id'] }}" class="kv-amenities-page__chapter">
              <img class="kv-amenities-page__inline-image" src="{{ asset($zone['image']) }}"
                   alt="" loading="lazy" decoding="async">
              <div class="kv-amenities-page__chapter-copy" data-mv="up">
                <h3>{{ $zone['title'] }}</h3>
                <dl class="kv-amenities-page__features">
                  @foreach ($zone['features'] as $feature => $description)
                    <div>
                      <dt>{{ $feature }}</dt>
                      <dd>{{ $description }}</dd>
                    </div>
                  @endforeach
                </dl>
              </div>
            </article>
          @endforeach
        </div>
      </div>
      <p class="kv-amenities-page__caption">Architectural illustrations of The Koru Ville.</p>
    </div>
  </section>

  <section id="villa-amenities" class="kv-subsection kv-subsection--cream2" aria-labelledby="villa-amenities-heading">
    <div class="kv-shell kv-amenities-page__villa">
      <img src="{{ asset('assets/img/kv/gallery-1440.webp') }}" width="1440" height="612"
           alt="Architectural rendering of villas set among landscaped gardens" loading="lazy" decoding="async"
           data-mv="scale">
      <div data-mv="up">
        <span class="kv-eyebrow">At home</span>
        <h2 id="villa-amenities-heading" class="kv-display kv-display--md">Private Villa Features</h2>
        <dl class="kv-amenities-page__features">
          <div><dt>Private Plunge Pool</dt><dd>Step out to your own open-air pool.</dd></div>
          <div><dt>Bedrooms & Living Areas</dt><dd>Quiet interiors with views of the landscaped gardens.</dd></div>
          <div><dt>Modern Washrooms</dt><dd>Minimalist finishes and a clean, practical layout.</dd></div>
        </dl>
        <a href="{{ url('/pricing') }}" class="kv-btn kv-btn--olive">View layout & price</a>
      </div>
    </div>
  </section>

  <section class="kv-subsection kv-amenities-gallery" aria-labelledby="amenities-gallery-title">
    <div class="kv-shell" data-amenities-gallery>
      <div class="kv-amenities-gallery__head" data-mv="up">
        <h2 id="amenities-gallery-title" class="kv-display kv-display--md">Amenities Gallery</h2>
        <p>Architectural illustrations of the poolside, grounds and villas.</p>
      </div>

      <ul id="amenities-gallery-track" class="kv-amenities-gallery__track" tabindex="0" aria-labelledby="amenities-gallery-title">
        @foreach ($amenityGallery as $slide)
          <li>
            <figure>
              <img src="{{ asset($slide['image']) }}" alt="" loading="lazy" decoding="async">
              <figcaption>{{ $slide['title'] }}</figcaption>
            </figure>
          </li>
        @endforeach
      </ul>

      <div class="kv-amenities-gallery__controls" data-gallery-controls hidden>
        <button type="button" class="kv-amenities-gallery__arrow" data-gallery-prev aria-label="Previous image" aria-controls="amenities-gallery-track">←</button>
        <div class="kv-amenities-gallery__thumbnails" role="group" aria-label="Choose a gallery image">
          @foreach ($amenityGallery as $slide)
            <button type="button" data-gallery-slide aria-label="{{ $slide['title'] }}" aria-controls="amenities-gallery-track">
              <img src="{{ asset($slide['image']) }}" alt="" loading="lazy" decoding="async">
            </button>
          @endforeach
        </div>
        <button type="button" class="kv-amenities-gallery__arrow" data-gallery-next aria-label="Next image" aria-controls="amenities-gallery-track">→</button>
      </div>
    </div>
  </section>

  <section class="kv-subsection kv-subsection--olive kv-amenities-page__visit" aria-labelledby="amenities-visit-heading">
    <div class="kv-shell kv-cta-row" data-mv="up">
      <div>
        <h2 id="amenities-visit-heading" class="kv-display kv-display--md">Plan a Visit</h2>
        <p>Walk the site in Kilawali and ask our team about the planned amenities and villa layouts.</p>
      </div>
      <button type="button" class="kv-btn kv-btn--gold" data-kv-open="enquiry">Enquire about a visit</button>
    </div>
  </section>
</div>

@endsection
