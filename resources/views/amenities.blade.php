@extends('layouts.kv')

@section('title', 'Amenities | The Koru Ville, Kilawali')
@section('description', 'Choose one of three plot categories, 111, 125 or 139 sq. yd, and the Koru Ville team builds a duplex villa to that category’s fixed design within two years of purchase. Every villa design includes a private pool, and residents share a clubhouse and a common pool across the 3.5-acre township. Planned as a second home near Jim Corbett for families in Delhi NCR and other cities, it comes with owner stay days and a managed rental model, while the project team handles upkeep.')
@section('hero', '1')

@section('content')

@php
  $amenityZones = [
    [
      'id' => 'pool-and-lawns',
      'title' => 'Multi-generation families',
      'image' => 'assets/img/kv/plot-1-860.webp',
      'copy' => 'Book a property for sale in Uttarakhand for family gatherings that suits all generations. It is equipped with a play area, a jogging track, and a common pool on the site.',
    ],
    [
      'id' => 'clubhouse-and-dining',
      'title' => 'Restaurant-Themed Plot Cluster',
      'image' => 'assets/img/kv/about-1000.webp',
      'copy' => 'A dedicated cluster of restaurant-themed plots is planned around open dining areas and shared gathering spots for owners who think of their home as somewhere to host as much as somewhere to live.',
    ],
    [
      'id' => 'community',
      'title' => 'Gated, Resort-Style Infrastructure',
      'image' => 'assets/img/kv/why-800.webp',
      'copy' => 'Wide internal roads, a secured boundary wall, clearly marked plot divisions, and shared resort-style common areas define the layout — built around green, open surroundings.',
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
        <p data-mv="up" data-mv-delay="100">A resort-themed plotted community designed for the way you want to live, gather and build.</p>
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
        <span class="kv-eyebrow">About The Koru Ville</span>
        <h2 id="amenities-heading" class="kv-display kv-display--md">A Resort Style Community at the Gateway to Jim Corbett</h2>
        <p>Choose one of three plot categories, 111, 125 or 139 sq. yd, and the Koru Ville team builds a duplex villa to that category’s fixed design within two years of purchase. Every villa design includes a private pool, and residents share a clubhouse and a common pool across the 3.5-acre township. Planned as a second home near Jim Corbett for families in Delhi NCR and other cities, it comes with owner stay days and a managed rental model, while the project team handles upkeep.</p>
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
                <p>{{ $zone['copy'] }}</p>
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
        <span class="kv-eyebrow">Plot Categories & Villa Designs</span>
        <h2 id="villa-amenities-heading" class="kv-display kv-display--md">Residential Plots Near Jim Corbett: Mayoora, Mriga & Simha</h2>
        <dl class="kv-amenities-page__features">
          <div><dt>Mayoora: 111 sq. yd</dt><dd>Mayoora is the most compact size of these three designs. It has a green lawn and a front porch, and each floor has a living area, a bedroom, a dresser and a washroom. The balcony on the first floor looks down onto the private plunge pool (8' x 8').</dd></div>
          <div><dt>Mriga: 125 sq. yd</dt><dd>Mriga keeps the same duplex plan with a little more space, giving you a bigger living area and bedroom on both floors. It has a green lawn and a private plunge pool (9’ x 7’). The first-floor balcony is framed by greenery and faces the surrounding hills and forest.</dd></div>
          <div><dt>Simha: 139 sq. yd</dt><dd>Simha is the largest category. The ground floor has two bedrooms and two washrooms. Upstairs there is a third bedroom, another washroom and a large open terrace (13'-2" x 20'-7"). Simha is also the only category with a full private swimming pool (10' x 7') instead of a plunge pool.</dd></div>
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

  <section class="kv-panel kv-panel--cream kv-legacy-section" id="how-to-book">
    <div class="kv-shell">
      <div class="kv-section-head">
        <span class="kv-eyebrow">A Managed Second Home</span>
        <h2 class="kv-display kv-display--md">A Weekend Home Near Jim Corbett, Looked After While You Are Away</h2>
        <p class="kv-lede">A weekend home near Jim Corbett works best when it stays well maintained between visits. The Koru Ville is a planned community, so every villa is looked after by the project team while you are away. Terms for stay days and rental are shared in full at the time of booking.</p>
      </div>
      <div class="kv-legacy-grid">
        <article>
          <h3>Dedicated Stay Privileges</h3>
          <p>Enjoy ownership when you stay at your villa each year, which gives you the freedom to unwind and reconnect with nature at your own retreat.</p>
        </article>
        <article>
          <h3>Year-around Maintenance</h3>
          <p>The Koru Ville team handles maintenance, security, and management of community villas.</p>
        </article>
        <article>
          <h3>Guest Bookings When You Are Away</h3>
          <p>The villa can be offered for holidays, weekend getaways, events and leisure stays.</p>
        </article>
        <article>
          <h3>Rental Payout Per Agreed Terms</h3>
          <p>The team pays a fixed rental payout as per the agreement. Rental income and occupancy are not guaranteed beyond what the agreement states.</p>
        </article>
        <article>
          <h3>Share Your Retreat In Your Absence</h3>
          <p>The villa can be booked for special occasions, weekend holidays, corporate events, and leisure stays.</p>
        </article>
        <article>
          <h3>Clear Ownership Details</h3>
          <p>Everything you find clearly in the agreement, including stay days, rental payout, and management responsibilities.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="kv-panel kv-panel--cream kv-legacy-section" id="second-home-advantages">
    <div class="kv-shell">
      <div class="kv-section-head">
        <span class="kv-eyebrow">Second Homes in Kilawali</span>
        <h2 class="kv-display kv-display--md">Advantages of a Second Home and Weekend Home in Kilawali</h2>
        <p class="kv-lede">Kilawali is a serene, small village near Jim Corbett National Park. Here's what a holiday home here gives a family that a city home can't.</p>
      </div>
      <div class="kv-legacy-grid">
        <article>
          <h3>Access to Nature</h3>
          <p>Trees, gardens and fresh air to enjoy every single day.</p>
        </article>
        <article>
          <h3>Near Jim Corbett National Park</h3>
          <p>Spend family time visiting the park and seeing its wildlife, birds and forests up close.</p>
        </article>
        <article>
          <h3>A Serene Environment</h3>
          <p>A hushed, peaceful place to relax and unwind.</p>
        </article>
        <article>
          <h3>An Ideal Holiday Destination</h3>
          <p>A ready base to return to for holidays and weekends.</p>
        </article>
        <article>
          <h3>Fresh, Clean Air</h3>
          <p>Far less pollution than the city, for a genuinely healthy environment.</p>
        </article>
        <article>
          <h3>Plenty to Explore Nearby</h3>
          <p>Jim Corbett National Park, Garjiya Devi Temple, Corbett Falls, the Kosi River and Tumaria Dam are all within easy reach for quality family time.</p>
        </article>
        <article>
          <h3>Easy Access</h3>
          <p>Well-connected roads to Ramnagar and Kashipur keep the peaceful setting within easy driving distance.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="kv-subsection kv-subsection--olive kv-amenities-page__visit" aria-labelledby="amenities-visit-heading">
    <div class="kv-shell kv-cta-row" data-mv="up">
      <div>
        <h2 id="amenities-visit-heading" class="kv-display kv-display--md">Plan a Private Visit</h2>
        <p>Plots near Jim Corbett National Park are more than just an investment — Buyers and investors have a chance to build a luxury villa that reflects their lifestyle. The Koru Ville is a thoughtfully designed thematic township for those seeking a closer connection to nature and a welcome escape from the city’s hustle. Our team will help you explore suitable plots, experience the site personally, and understand the pricing clearly.</p>
      </div>
      <button type="button" class="kv-btn kv-btn--gold" data-kv-open="enquiry">Enquire about a visit</button>
    </div>
  </section>
</div>

@endsection
