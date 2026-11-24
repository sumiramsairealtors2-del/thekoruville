@extends('layouts.kv')

@section('title', 'Amenities | The Koru Ville, Kilawali')
@section('description', 'Choose one of three plot categories, 111, 125 or 139 sq. yd, and the Koru Ville team builds a duplex villa to that category’s fixed design within two years of purchase. Every villa design includes a private pool, and residents share a clubhouse and a common pool across the 3.5-acre township. Planned as a second home near Jim Corbett for families in Delhi NCR and other cities, it comes with owner stay days and a managed rental model, while the project team handles upkeep.')
@section('hero', '1')

@section('head')
<style>
  .amenities-page {
    --amenities-paper: var(--kv-cream-3);
    --amenities-line: #31392245;
    --amenities-padding: clamp(16px, 4vw, 60px);
    --amenities-gap: clamp(14px, 2.2vw, 30px);
    margin: var(--kv-frame-top) var(--kv-frame) 0;
    padding-top: max(0px, calc(var(--kv-header) + 16px - var(--kv-frame-top)));
    border-radius: var(--kv-radius) var(--kv-radius) 0 0;
    background: var(--amenities-paper);
    color: var(--kv-ink);
    line-height: 1.6;
  }

  .amenities-page :is(h1, h2, h3, p) { margin: 0; }
  .amenities-page :is(h1, h2, h3) { font-weight: 500; line-height: 1.14; letter-spacing: -.045em; }
  .amenities-page h2 { font-size: clamp(1.65rem, 3.1vw, 3.4rem); }
  .amenities-page h3 { font-size: clamp(1.1rem, 1.6vw, 1.55rem); }
  .amenities-page p { color: var(--kv-body); }
  .amenities-page :is(section[id], article[id]) { scroll-margin-top: calc(var(--kv-header) + 18px); }

  .amenities-page .amenities-label {
    display: block;
    margin-bottom: 10px;
    color: var(--kv-olive);
    font-size: .875rem;
    letter-spacing: .12em;
    text-transform: uppercase;
  }

  .amenities-page .amenities-hero { --kv-diagonal-image-position: center 63%; }

  .amenities-page .kv-btn { min-height: 46px; padding: 8px 18px; border-width: 1px; font-size: .875rem; letter-spacing: .04em; white-space: normal; text-align: center; }
  .amenities-page .amenities-section { padding: clamp(32px, 5vw, 74px) var(--amenities-padding); border-bottom: 1px solid var(--amenities-line); }
  .amenities-page .amenities-shell { width: 100%; max-width: 1340px; margin-inline: auto; }
  .amenities-page .amenities-intro { max-width: 74ch; margin: 0 auto clamp(20px, 3vw, 38px); text-align: center; }
  .amenities-page :is(.amenities-intro, .amenities-section-heading) p { margin-top: 14px; }

  .amenities-page .amenities-zones {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: var(--amenities-gap);
  }

  .amenities-page .amenities-zones article { display: grid; grid-template-rows: auto 1fr; overflow: hidden; border-radius: 18px; background: var(--kv-cream); }
  .amenities-page .amenities-zones img { width: 100%; aspect-ratio: 1.45; object-fit: cover; object-position: center 62%; }
  .amenities-page .amenities-zone-copy { padding: clamp(15px, 2vw, 26px); }
  .amenities-page .amenities-zone-copy p { margin-top: 10px; }
  .amenities-page .amenities-caption { margin-top: 12px; font-size: .875rem; }

  .amenities-page .amenities-villa-section { background: var(--kv-cream); }
  .amenities-page .amenities-villa { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.2fr); align-items: center; gap: clamp(18px, 4vw, 58px); }
  .amenities-page .amenities-villa > img { width: 100%; height: auto; aspect-ratio: 1.05; object-fit: cover; object-position: 64% center; border-radius: 24px; }
  .amenities-page .amenities-villa-features { margin: 18px 0; }
  .amenities-page .amenities-villa-features > div { padding: 12px 0; border-top: 1px solid var(--amenities-line); }
  .amenities-page .amenities-villa-features dt { font-weight: 600; }
  .amenities-page .amenities-villa-features dd { margin: 4px 0 0; color: var(--kv-body); }

  .amenities-page .amenities-gallery .amenities-shell { padding: clamp(12px, 2vw, 26px); border-radius: 24px;}
  .amenities-page .amenities-gallery-heading { margin-bottom: 16px; text-align: center; }
  .amenities-page .amenities-gallery-heading p { margin-top: 8px; }
  .amenities-page .amenities-gallery-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.7fr) minmax(0, 1fr);
    grid-template-rows: repeat(2, minmax(0, 1fr));
    gap: 8px;
    height: clamp(340px, 43vw, 570px);
  }

  .amenities-page .amenities-gallery-grid figure {
    position: relative;
    min-height: 0;
    margin: 0;
    overflow: hidden;
    border-radius: 12px;
    background: var(--kv-olive);
    color: var(--kv-cream-3);
  }

  .amenities-page .amenities-gallery-grid figure:first-child { grid-row: span 2; }
  .amenities-page .amenities-gallery-grid img { width: 100%; height: 100%; object-fit: cover; }
  .amenities-page .amenities-gallery-grid figcaption {
    position: absolute;
    inset: auto 0 0;
    padding: 30px clamp(10px, 1.5vw, 22px) 12px;
    background: linear-gradient(transparent, #161c12f5);
    font-size: .9rem;
    line-height: 1.35;
  }

  .amenities-page .amenities-managed { background: var(--kv-cream); }
  .amenities-page .amenities-managed .amenities-section-heading {
    display: grid;
    grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr);
    overflow: hidden;
    border-radius: 24px;
    background: var(--kv-olive);
    color: var(--kv-cream-3);
  }

  .amenities-page .amenities-managed-lead { align-self: center; padding: clamp(20px, 4vw, 56px); }
  .amenities-page .amenities-managed-lead :is(.amenities-label, p) { color: inherit; }
  .amenities-page .amenities-managed .amenities-section-heading img {
    width: 100%;
    height: 100%;
    min-height: 300px;
    object-fit: cover;
    object-position: 60% center;
  }

  .amenities-page .amenities-benefits { display: grid; gap: var(--amenities-gap); }
  .amenities-page .amenities-benefits p { margin-top: 8px; }
  .amenities-page .amenities-managed .amenities-benefits {
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0 clamp(18px, 3.5vw, 48px);
    margin-top: clamp(16px, 3vw, 34px);
  }

  .amenities-page .amenities-managed .amenities-benefits article {
    padding: 16px 0;
    border-top: 1px solid var(--amenities-line);
  }

  .amenities-page .amenities-story-stage { display: none; }

  @media (min-width: 901px) and (min-height: 650px) and (prefers-reduced-motion: no-preference) {
    .amenities-page .amenities-story.is-scroll-linked {
      --story-top: calc(var(--kv-header) + 20px);
      --story-height: clamp(405px, 65svh, 590px);
      --story-step: clamp(210px, 36svh, 360px);
      position: relative;
      min-height: calc(var(--story-height) + var(--story-step) * var(--story-steps));
    }

    .amenities-page .amenities-story.is-scroll-linked .amenities-story-source {
      position: absolute;
      width: 1px;
      height: 1px;
      overflow: hidden;
      clip-path: inset(50%);
    }

    .amenities-page .is-scroll-linked .amenities-story-stage {
      position: sticky;
      top: var(--story-top);
      display: grid;
      grid-template: minmax(0, 1fr) / minmax(0, 1fr);
      height: var(--story-height);
      overflow: hidden;
      isolation: isolate;
      border-radius: 24px;
      background: var(--kv-olive);
      color: var(--kv-cream-3);
    }

    .amenities-page .amenities-story-slide {
      grid-area: 1 / 1;
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(0, 1.1fr);
      opacity: 0;
      transition: opacity .35s ease;
    }

    .amenities-page .amenities-story-slide.is-active { z-index: 1; opacity: 1; }
    .amenities-page .amenities-story-copy { align-self: center; padding: clamp(22px, 3.6vw, 52px); }
    .amenities-page .amenities-story-copy h3 { font-size: clamp(1.9rem, 3.5vw, 3.75rem); }
    .amenities-page .amenities-story-copy :is(.amenities-label, p) { color: inherit; }
    .amenities-page .amenities-story-copy p { margin-top: 14px; }
    .amenities-page .amenities-story-slide img { width: 100%; height: 100%; min-height: 0; object-fit: cover; }
  }

  .amenities-page .amenities-advantages .amenities-shell {
    display: grid;
    grid-template-columns: minmax(0, .8fr) minmax(0, 1.2fr);
    align-items: start;
    gap: clamp(24px, 5vw, 68px);
  }

  .amenities-page .amenities-advantages-image {
    width: 100%;
    aspect-ratio: .85;
    object-fit: cover;
    object-position: center 65%;
    border-radius: 110px 24px 24px 24px;
  }

  .amenities-page .amenities-advantages .amenities-benefits {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 0 clamp(12px, 2vw, 26px);
    margin-top: 22px;
  }

  .amenities-page .amenities-advantages .amenities-benefits article {
    padding: 14px 0;
    border-top: 1px solid var(--amenities-line);
  }

  .amenities-page .amenities-visit {
    background: linear-gradient(90deg, #1c2417f5, #27311ca6), url("{{ asset('assets/img/kv/gallery-1440.webp') }}") center 57% / cover;
    color: var(--kv-cream-3);
  }
  .amenities-page .amenities-visit-content { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: var(--amenities-gap); }
  .amenities-page .amenities-visit p { max-width: 70ch; margin-top: 12px; color: inherit; }

  @media (max-width: 900px) {
    .amenities-page .amenities-managed .amenities-benefits { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  }

  @media (max-width: 720px) {
    .amenities-page :is(.amenities-zones, .amenities-villa) { grid-template-columns: 1fr; }
    .amenities-page .amenities-villa > img { grid-row: 2; aspect-ratio: 1.5; }
    .amenities-page .amenities-gallery-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      grid-template-rows: clamp(180px, 53vw, 330px) clamp(120px, 32vw, 200px);
      height: auto;
    }
    .amenities-page .amenities-gallery-grid figure:first-child { grid-row: 1; grid-column: 1 / -1; }
    .amenities-page .amenities-managed .amenities-section-heading,
    .amenities-page .amenities-advantages .amenities-shell { grid-template-columns: 1fr; }
    .amenities-page .amenities-managed .amenities-section-heading img {
      height: clamp(180px, 50vw, 325px);
      min-height: 0;
    }
    .amenities-page .amenities-advantages-image { aspect-ratio: 1.55; border-top-left-radius: 65px; }
  }

  @media (max-width: 480px) {
    .amenities-page :is(.amenities-managed, .amenities-advantages) .amenities-benefits { grid-template-columns: 1fr; }
  }
</style>
@include('partials.kv.diagonal-hero-styles')
@endsection

@section('content')

@php
  $amenityZones = [
    [
      'id' => 'pool-and-lawns',
      'title' => 'Multi-generation families',
      'image' => 'assets/img/kv/why-1040.webp',
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
      'image' => 'assets/img/kv/kr2.webp',
      'copy' => 'Wide internal roads, a secured boundary wall, clearly marked plot divisions, and shared resort-style common areas define the layout — built around green, open surroundings.',
    ],
  ];
  $amenityGallery = [
    ['image' => 'assets/img/Sunset Villa Overlooking a Tropical Valley.png', 'title' => 'Poolside at Sunset'],
    ['image' => 'assets/img/kv/gallery-1440.webp', 'title' => 'Villas & Landscaped Grounds'],
    ['image' => 'assets/img/kv/why-800.webp', 'title' => 'A Villa Among the Hills'],
  ];
@endphp

<div class="amenities-page">
  <section class="amenities-hero kv-diagonal-hero" aria-labelledby="amenities-title">
    <div class="kv-diagonal-hero-copy">
      <span class="kv-diagonal-hero-label">The Koru Ville · Kilawali</span>
      <h1 id="amenities-title">Amenities</h1>
      <p>A resort-themed plotted community designed for the way you want to live, gather and build.</p>
      <nav class="kv-diagonal-hero-actions" aria-label="Explore amenities">
        <a href="#pool-and-lawns" class="kv-btn kv-btn--olive">Pool &amp; grounds</a>
        <a href="#clubhouse-and-dining">Clubhouse &amp; dining</a>
        <a href="#community">Gated community</a>
        <a href="#villa-amenities">Private villas</a>
      </nav>
    </div>
    <img class="kv-diagonal-hero-image" src="{{ asset('assets/img/kv/why-1040.webp') }}" width="1040" height="1040"
         alt="Architectural illustration of the clubhouse, pool and landscaped grounds" fetchpriority="high">
  </section>

  <section id="amenities" class="amenities-section amenities-showcase" aria-labelledby="amenities-heading">
    <div class="amenities-shell">
      <div class="amenities-intro">
        <span class="amenities-label">About The Koru Ville</span>
        <h2 id="amenities-heading">A Resort Style Community at the Gateway to Jim Corbett</h2>
        <p>Choose one of three plot categories, 111, 125 or 139 sq. yd, and the Koru Ville team builds a duplex villa to that category’s fixed design within two years of purchase. Every villa design includes a private pool, and residents share a clubhouse and a common pool across the 3.5-acre township. Planned as a second home near Jim Corbett for families in Delhi NCR and other cities, it comes with owner stay days and a managed rental model, while the project team handles upkeep.</p>
      </div>

      <div class="amenities-zones">
        @foreach ($amenityZones as $zone)
          <article id="{{ $zone['id'] }}">
            <img src="{{ asset($zone['image']) }}" alt="" loading="lazy" decoding="async">
            <div class="amenities-zone-copy">
              <h3>{{ $zone['title'] }}</h3>
              <p>{{ $zone['copy'] }}</p>
            </div>
          </article>
        @endforeach
      </div>
      <p class="amenities-caption">Architectural illustrations of The Koru Ville.</p>
    </div>
  </section>

  <section id="villa-amenities" class="amenities-section amenities-villa-section" aria-labelledby="villa-amenities-heading">
    <div class="amenities-shell amenities-villa">
      <img src="{{ asset('assets/img/kv/gallery-1440.webp') }}" width="1440" height="612"
           alt="Architectural rendering of villas set among landscaped gardens" loading="lazy" decoding="async">
      <div>
        <span class="amenities-label">Plot Categories & Villa Designs</span>
        <h2 id="villa-amenities-heading">Residential Plots Near Jim Corbett: Mayoora, Mriga & Simha</h2>
        <dl class="amenities-villa-features">
          <div><dt>Mayoora: 111 sq. yd</dt><dd>Mayoora is the most compact size of these three designs. It has a green lawn and a front porch, and each floor has a living area, a bedroom, a dresser and a washroom. The balcony on the first floor looks down onto the private plunge pool (8' x 8').</dd></div>
          <div><dt>Mriga: 125 sq. yd</dt><dd>Mriga keeps the same duplex plan with a little more space, giving you a bigger living area and bedroom on both floors. It has a green lawn and a private plunge pool (9’ x 7’). The first-floor balcony is framed by greenery and faces the surrounding hills and forest.</dd></div>
          <div><dt>Simha: 139 sq. yd</dt><dd>Simha is the largest category. The ground floor has two bedrooms and two washrooms. Upstairs there is a third bedroom, another washroom and a large open terrace (13'-2" x 20'-7"). Simha is also the only category with a full private swimming pool (10' x 7') instead of a plunge pool.</dd></div>
        </dl>
        <a href="{{ url('/pricing') }}" class="kv-btn kv-btn--olive">View layout & price</a>
      </div>
    </div>
  </section>

  <section class="amenities-section amenities-gallery" aria-labelledby="amenities-gallery-title">
    <div class="amenities-shell">
      <div class="amenities-gallery-heading">
        <h2 id="amenities-gallery-title">Amenities Gallery</h2>
        <p>Architectural illustrations of the poolside, grounds and villas.</p>
      </div>

      <div class="amenities-gallery-grid">
        @foreach ($amenityGallery as $photo)
          <figure>
            <img src="{{ asset($photo['image']) }}" alt="" loading="lazy" decoding="async">
            <figcaption>{{ $photo['title'] }}</figcaption>
          </figure>
        @endforeach
      </div>
    </div>
  </section>

  <section class="amenities-section amenities-managed" id="how-to-book" aria-labelledby="amenities-managed-title">
    <div class="amenities-shell amenities-story">
      <div class="amenities-story-stage" aria-hidden="true"></div>
      <div class="amenities-story-source">
        <div class="amenities-section-heading">
          <div class="amenities-managed-lead">
            <span class="amenities-label">A Managed Second Home</span>
            <h2 id="amenities-managed-title">A Weekend Home Near Jim Corbett, Looked After While You Are Away</h2>
            <p>A weekend home near Jim Corbett works best when it stays well maintained between visits. The Koru Ville is a planned community, so every villa is looked after by the project team while you are away. Terms for stay days and rental are shared in full at the time of booking.</p>
          </div>
          <img src="{{ asset('assets/img/kv/about-1000.webp') }}" alt="Architectural rendering of a villa and landscaped garden at dusk"
               width="1000" height="1000" loading="lazy" decoding="async">
        </div>
        <div class="amenities-benefits">
          <article data-story-image="{{ asset('assets/img/kv/plot-1-860.webp') }}">
            <h3>Dedicated Stay Privileges</h3>
            <p>Enjoy ownership when you stay at your villa each year, which gives you the freedom to unwind and reconnect with nature at your own retreat.</p>
          </article>
          <article data-story-image="{{ asset('assets/img/kv/kr2.webp') }}">
            <h3>Year-around Maintenance</h3>
            <p>The Koru Ville team handles maintenance, security, and management of community villas.</p>
          </article>
          <article data-story-image="{{ asset('assets/img/kv/why-1040.webp') }}">
            <h3>Guest Bookings When You Are Away</h3>
            <p>The villa can be offered for holidays, weekend getaways, events and leisure stays.</p>
          </article>
          <article data-story-image="{{ asset('assets/img/kv/gallery-1440.webp') }}">
            <h3>Rental Payout Per Agreed Terms</h3>
            <p>The team pays a fixed rental payout as per the agreement. Rental income and occupancy are not guaranteed beyond what the agreement states.</p>
          </article>
          <article data-story-image="{{ asset('assets/img/kv/plot-2-860.webp') }}">
            <h3>Share Your Retreat In Your Absence</h3>
            <p>The villa can be booked for special occasions, weekend holidays, corporate events, and leisure stays.</p>
          </article>
          <article data-story-image="{{ asset('assets/img/kv/gallery-1920.webp') }}">
            <h3>Clear Ownership Details</h3>
            <p>Everything you find clearly in the agreement, including stay days, rental payout, and management responsibilities.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="amenities-section amenities-advantages" id="second-home-advantages" aria-labelledby="amenities-advantages-title">
    <div class="amenities-shell">
      <img class="amenities-advantages-image" src="{{ asset('assets/img/kv/why-800.webp') }}"
           alt="Architectural rendering of a villa set against wooded hills" loading="lazy" decoding="async">
      <div>
        <div class="amenities-section-heading">
          <span class="amenities-label">Second Homes in Kilawali</span>
          <h2 id="amenities-advantages-title">Advantages of a Second Home and Weekend Home in Kilawali</h2>
          <p>Kilawali is a serene, small village near Jim Corbett National Park. Here's what a holiday home here gives a family that a city home can't.</p>
        </div>
        <div class="amenities-benefits">
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
    </div>
  </section>

  <section class="amenities-section amenities-visit" aria-labelledby="amenities-visit-heading">
    <div class="amenities-shell amenities-visit-content">
      <div>
        <h2 id="amenities-visit-heading">Plan a Private Visit</h2>
        <p>Plots near Jim Corbett National Park are more than just an investment — Buyers and investors have a chance to build a luxury villa that reflects their lifestyle. The Koru Ville is a thoughtfully designed thematic township for those seeking a closer connection to nature and a welcome escape from the city’s hustle. Our team will help you explore suitable plots, experience the site personally, and understand the pricing clearly.</p>
      </div>
      <button type="button" class="kv-btn kv-btn--light" data-kv-open="enquiry">Enquire about a visit</button>
    </div>
  </section>
</div>

@endsection

@push('scripts')
<script>
  (() => {
    const story = document.querySelector('.amenities-story');
    const stage = story.querySelector('.amenities-story-stage');
    const intro = story.querySelector('.amenities-managed-lead');
    const chapters = [...story.querySelectorAll('[data-story-image]')];
    const desktop = window.matchMedia('(min-width: 901px) and (min-height: 650px) and (prefers-reduced-motion: no-preference)');
    let slides = [];
    let active = -1;
    let frame = 0;

    function update() {
      frame = 0;
      if (!desktop.matches) return;

      const top = Number.parseFloat(getComputedStyle(stage).top);
      const distance = story.offsetHeight - stage.offsetHeight;
      const progress = (top - story.getBoundingClientRect().top) / distance;
      const next = Math.max(0, Math.min(slides.length - 1, Math.floor(progress * slides.length)));
      if (active === next) return;

      slides[active]?.classList.remove('is-active');
      slides[next].classList.add('is-active');
      active = next;
    }

    function schedule() {
      if (!frame) frame = requestAnimationFrame(update);
    }

    function configure() {
      if (desktop.matches && !slides.length) {
        slides = [intro, ...chapters].map((source) => {
          const slide = document.createElement('div');
          slide.className = 'amenities-story-slide';
          const copy = source.cloneNode(true);
          copy.className = 'amenities-story-copy';
          copy.removeAttribute('data-story-image');
          copy.querySelector('[id]')?.removeAttribute('id');
          const image = new Image();
          image.alt = '';
          image.loading = 'lazy';
          image.decoding = 'async';
          image.src = source.dataset.storyImage || story.querySelector('.amenities-section-heading img').src;
          slide.append(copy, image);
          return slide;
        });
        stage.append(...slides);
        story.style.setProperty('--story-steps', slides.length - 1);
      }
      story.classList.toggle('is-scroll-linked', desktop.matches);
      schedule();
    }

    window.addEventListener('scroll', schedule, { passive: true });
    window.addEventListener('resize', schedule);
    desktop.addEventListener('change', configure);
    configure();
  })();
</script>
@endpush
