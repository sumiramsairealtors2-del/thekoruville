@extends('layouts.kv')

@section('title', 'Residential Plots Near Jim Corbett | The Koru Ville')
@section('description', 'Looking for plots near Jim Corbett? The Koru Ville offers resort-style residential plots in Kilawali, Kashipur. 15 mins from Phato Gate. Enquire now!')
@section('home', '1')

@section('head')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "The Koru Ville",
  "url": "https://thekoruville.com/",
  "logo": "https://thekoruville.com/assets/img/Logo.webp"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "RealEstateAgent",
  "name": "The Koru Ville",
  "image": "https://thekoruville.com/assets/img/Logo.webp",
  "url": "https://thekoruville.com/",
  "telephone": "+91 8377000300",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "The Koru Ville, Kilawali, Kashipur",
    "addressLocality": "Uttarakhand",
    "postalCode": "244712",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 29.314020180157865,
    "longitude": 78.95526974788109
  },
  "openingHoursSpecification": [{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
    "opens": "10:00",
    "closes": "19:00"
  }]
}
</script>
@endverbatim
@php
  $faqs = [
    ['What is The Koru Ville?', 'The Koru Ville is a resort-style community of plots and villas in Kilawali, Kashipur, Uttarakhand, spread across 3.5 acres. Buyers choose from three plot categories — Mayoora, Mriga or Simha — each built to a fixed design by the project team. The township also includes a clubhouse, a common pool and a restaurant-themed plot cluster. Bookings are now open.'],
    ['Where are The Koru Ville plots in Kashipur Uttarakhand located?', 'The Koru Ville plots are in Kilawali, Kashipur, Uttarakhand – 244712, along the Kashipur–Ramnagar highway corridor in Udham Singh Nagar district. The project sits just outside the notified boundary of Jim Corbett National Park, at the park\'s gateway.'],
    ['How far is the project from Jim Corbett National Park?', 'The Koru Ville is just 15 minutes by drive from Phato Gate, one of the few Jim Corbett safari gates open all year round, including through the monsoon season.'],
    ['What plot sizes are available?', 'The Koru Ville plots are available starting from 111 sq. yd, with additional sizes at 125 sq. yd and 139 sq. yd.'],
    ['Is Kilawali located inside Jim Corbett National Park?', 'No. The Koru Ville is located just outside the notified boundary of Jim Corbett National Park, along the highway corridor that serves as the gateway to the park — not inside the reserve itself.'],
    ['Is the project suitable for full-time living or only weekend stays?', 'Both. With a school roughly 15 minutes away and a hospital around 34 minutes out, along with nearby rail and highway access, The Koru Ville Kilawali is designed to support full-time residents as well as weekend and holiday owners.'],
    ['How large is the township?', 'The township spans 3.5 acres of thoughtfully planned, resort-themed residential plots.'],
    ['When will the project officially launch?', 'The project is now launched and bookings are open. Final pricing, the allotment process, and site visit scheduling are shared with buyers at the time of enquiry — contact our team for the latest details.'],
    ['What makes residential plots in Jim Corbett different from plots elsewhere in Uttarakhand?', 'Plots in the Jim Corbett belt sit in the Terai region, where sal forests, seasonal rivers, and proximity to India\'s oldest national park create a cooler climate and a different pace of life compared to plains-based townships elsewhere in the state. The draw here isn\'t just land — it\'s direct access to a wildlife corridor that has attracted visitors for close to a century, along with the highway and market infrastructure that has grown up around it.'],
    ['What should buyers verify before purchasing residential plots in Jim Corbett?', 'As with any land purchase near an eco-sensitive zone, buyers should confirm clear land title, check zoning status with a local advocate, and verify that the project has the necessary regulatory approvals before booking. It\'s also worth visiting the site in person to confirm access roads and terrain match what\'s shown in marketing material, rather than relying on photos alone.'],
    ['What can owners of residential plots in Jim Corbett actually do in the area?', 'Beyond the safari itself, the region around Jim Corbett is suited to birdwatching, riverside walks near the dam, and short treks through the surrounding forest belt. For owners who visit periodically rather than living full-time, this gives the plot a purpose even outside of construction — a base for repeat visits tied to the park\'s activities and seasons.'],
    ['What is the official website for The Koru Ville?', 'The official website for The Koru Ville is www.thekoruville.com. The Koru Ville is a resort-themed residential plotted township located in Kilawali, Uttarakhand, at the gateway to Jim Corbett National Park. Any other website, landing page, or listing claiming to represent The Koru Ville is not authorized.'],
    ['What is the RERA status of The Koru Ville?', 'The Koru Ville is registered with RERA. The registration number is UKREP10260000768.'],
    ['Can The Koru Ville be used as a weekend home near Jim Corbett?', 'Yes. The Koru Ville is planned as a second home or holiday retreat, with villas that have private pools and a project team that looks after the community between visits. Delhi NCR is roughly 5–6 hours by road. Owner stay days and rental terms are shared in full at the time of booking.'],
    ['What are the Jim Corbett safari zones?', 'Jim Corbett\'s safari zones include Dhikala, Bijrani, Jhirna, Dhela, Durga Devi, Garjia and Phato, and some operators also list Sitabani, Pakhro and Sonanadi. Opening dates differ by zone and season, so check the Uttarakhand Forest Department\'s official booking portal before planning. Phato Gate, the nearest gate to The Koru Ville, is about 15 minutes by drive.'],
    ['Which is the best gate for a Jim Corbett safari?', 'No single gate is best for everyone; it depends on the season and what you want to see. Sources list Jhirna and Dhela as open through the year, while Dhikala and Bijrani run in the cooler months. Phato Gate is the most convenient from The Koru Ville, about 15 minutes by drive.'],
    ['Which hill stations are near Kashipur?', 'Kumaon hill stations such as Nainital, Bhimtal, Sattal, Mukteshwar and Ranikhet are popular trips from the Kashipur–Ramnagar belt. Travel times depend on the route and season, so check them on a map before planning a visit.'],
    ['What is the Ramnagar Dehradun Express?', 'The Ramnagar–Dehradun Express is the first direct express train between Ramnagar and Dehradun, flagged off on 18 July 2026. It runs on Wednesdays and Fridays (trains 15310 and 15309) and halts at Kashipur, Roshanpur, Pipalsana, Moradabad, Najibabad and Haridwar. Please check the current timetable on IRCTC or National Train Enquiry System before travelling.'],
    ['Does The Koru Ville offer properties in Jim Corbett?', 'offers residential plots with fixed villa designs at the gateway to Jim Corbett, in Kilawali, Kashipur, just outside the notified boundary of Jim Corbett National Park. As with any land purchase, buyers should confirm the title, zoning and approvals before booking.'],
    ['Looking for plots near me in the Kashipur–Ramnagar area?', 'The Koru Ville\'s plots are in Kilawali on the Kashipur–Ramnagar corridor. You can find the site on the map in the contact section and book a private site visit through the enquiry form or by phone.'],
  ];

  $faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(fn ($faq) => [
      '@type' => 'Question',
      'name' => $faq[0],
      'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]],
    ], $faqs),
  ];
@endphp
<script type="application/ld+json">@json($faqSchema)</script>
@endsection

@section('content')

<div class="mv-progress" aria-hidden="true"><span data-mv-progress></span></div>

{{-- ==================================================== HERO ==================================================== --}}
<section class="kv-hero" id="home">
  <div class="kv-hero__frame">
    @php
      $heroImages = [
        ['image' => 'kv/kr2.webp', 'mobile' => 'kv/plot-1-860.webp', 'width' => 1282, 'height' => 766, 'alt' => 'Architectural rendering of The Koru Ville in Kilawali'],
        ['image' => 'kv/gallery-1920.webp', 'mobile' => 'kv/about-1000.webp', 'width' => 1920, 'height' => 816, 'alt' => 'Architectural rendering of The Koru Ville at dusk'],
        ['image' => 'kv/why-1040.webp', 'mobile' => 'kv/plot-2-860.webp', 'width' => 1040, 'height' => 1040, 'alt' => 'Architectural rendering of a villa overlooking wooded hills'],
      ];
    @endphp

    @foreach ($heroImages as $heroImage)
      <div @class(['kv-hero__slide', 'is-active' => $loop->first])
           aria-hidden="{{ $loop->first ? 'false' : 'true' }}" data-mv-parallax="-30">
        <picture>
          <source media="(max-width: 720px)" srcset="{{ asset('assets/img/'.$heroImage['mobile']) }}">
          <img src="{{ asset('assets/img/'.$heroImage['image']) }}"
               width="{{ $heroImage['width'] }}" height="{{ $heroImage['height'] }}" alt="{{ $heroImage['alt'] }}"
               @if($loop->first) fetchpriority="high" @else loading="lazy" @endif>
        </picture>
      </div>
    @endforeach

    <div class="kv-hero__copy">
      <span class="kv-eyebrow">The Koru Ville &middot; Kilawali, Uttarakhand</span>
      <h1 data-mv="words" data-mv-word-delay="45">The Koru Ville</h1>
      <p class="kv-hero__sub" data-mv="blur" data-mv-delay="180">Resort-Themed Plots at the Gateway to Jim Corbett</p>
      <div class="kv-hero__actions" data-mv="fade" data-mv-delay="300">
        <button type="button" class="kv-btn" data-kv-open="enquiry" data-mv-magnet="8">Enquire About Plots</button>
        <button type="button" class="kv-btn" data-kv-open="brochure" data-mv-magnet="8">Download Brochure</button>
      </div>
    </div>

    <div class="kv-hero__dots" role="group" aria-label="Hero images">
      <button type="button" class="kv-hero__arrow kv-hero__arrow--prev" aria-label="Previous image">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M15 19l-7-7 7-7"/></svg>
      </button>
      <button type="button" aria-current="true" aria-label="Image 1"></button>
      <button type="button" aria-current="false" aria-label="Image 2"></button>
      <button type="button" aria-current="false" aria-label="Image 3"></button>
      <button type="button" class="kv-hero__arrow kv-hero__arrow--next" aria-label="Next image">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 5l7 7-7 7"/></svg>
      </button>
      <button type="button" class="kv-hero__rotation" data-hero-rotation aria-label="Pause slideshow" hidden>
        <span aria-hidden="true">Ⅱ</span>
      </button>
    </div>
  </div>
</section>

{{-- ==================================================== ABOUT ==================================================== --}}
<section class="kv-panel kv-panel--cream kv-about" id="about">
  <div class="kv-shell">
    <div class="kv-about__grid" data-mv-group="110">
      <div class="kv-stats" data-mv="right" data-mv-count-group>
        <div class="kv-stat">
          <b><span data-mv-count="3.5" data-mv-decimals="1">3.5</span> Acres</b>
          <span>Resort-Themed Township</span>
        </div>
        <div class="kv-stat">
          <b><span data-mv-count="15">15</span> Min</b>
          <span>Drive to Phato Gate</span>
        </div>
        <a href="{{ route('about') }}" class="kv-link-arrow kv-about__link">
          About The Koru Ville
          <i aria-hidden="true"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></i>
        </a>
      </div>

      <div class="kv-about__copy" data-mv="left">
        <p>Welcome to The Koru Ville Kilawali &mdash; an exclusive resort style community of plots and villas in Kashipur, Uttarakhand, just 15 minutes by drive from Phato Gate, one of the Jim Corbett safari gates.</p>
        <ul class="kv-about__figures">
          <li><strong>(111-139) sq.yd</strong> Plots Onwards</li>
          <li><strong>Starting Price</strong> 34,990*/Sq.Yd</li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- ============================================ WHY THIS LOCATION ============================================ --}}
<section class="kv-panel kv-panel--olive kv-location" id="why-this-location" aria-labelledby="kvLocationTitle">
  <figure class="kv-location__media" data-mv="fade">
    <img src="{{ asset('assets/img/koru_villa_1.webp') }}"
         width="1408" height="768"
         alt="Illustration of the hills and reservoir near Kilawali" loading="lazy">
    <figcaption>Kilawali, Uttarakhand</figcaption>
  </figure>

  <div class="kv-location__body" data-mv-group="80">
    <div>
      <span class="kv-eyebrow" data-mv="fade">Why This Location</span>
      <h2 id="kvLocationTitle" class="kv-display" data-mv="words">Kilawali: Close to the Forest, Connected to What Matters</h2>
    </div>
    <a href="{{ route('about') }}#kilawali" class="kv-link-arrow kv-location-link">
      Explore the Location
      <i aria-hidden="true"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></i>
    </a>
  </div>
</section>

{{-- ==================================================== PLOTS ==================================================== --}}
<section class="kv-panel kv-panel--cream kv-plots" id="stand-out">
  <div class="kv-shell" id="plots">
    <div class="kv-section-head" data-mv-group="90">
      <span class="kv-eyebrow" data-mv="fade">Plot Categories & Villa Designs</span>
      <h2 class="kv-display kv-display--lg" data-mv="words">Residential Plots Near Jim Corbett: Mayoora, Mriga & Simha</h2>
    </div>

    <div class="kv-cards">

      <article class="kv-plot" data-mv="plot">
        <div class="kv-plot__media">
          <img src="{{ asset('assets/img/kv/plot-1-860.webp') }}"
               width="860" height="1148"
               alt="Architectural illustration for the 111 sq yd plot option" loading="lazy" decoding="async">
        </div>
        <div class="kv-plot__body">
          @include('partials.kv.crown', ['shapeClass' => 'kv-plot__crown', 'shapeVariant' => 'plot'])
          <span class="kv-plot__emblem" aria-hidden="true">
            @include('partials.kv.plot-mayoora-emblem')
          </span>
          <h3>Mayoora</h3>
          <p>Cosy duplex, plunge pool</p>
          <div class="kv-plot__meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/></svg>2BHK</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M4 10h16M10 4v16"/></svg>1,000 sq.ft</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M3 15c2 0 2-2 4.5-2s2.5 2 4.5 2 2-2 4.5-2 2.5 2 4.5 2M3 20c2 0 2-2 4.5-2s2.5 2 4.5 2 2-2 4.5-2 2.5 2 4.5 2M9 12V5a2 2 0 0 0-4 0m9 8V5a2 2 0 0 0-4 0"/></svg>Private Pool</span>
          </div>
          <button type="button" class="kv-link-arrow kv-plot__enquire" data-kv-open="enquiry" aria-label="Enquiry Now for the 111 sq yd plot">
            Enquiry Now
            <i aria-hidden="true"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></i>
          </button>
        </div>
      </article>

      <article class="kv-plot kv-plot--featured" data-mv="plot">
        <div class="kv-plot__media">
          <span class="kv-plot__badge">Largest plot</span>
          <img src="{{ asset('assets/img/kv/plot-3-860.webp') }}"
               width="860" height="1147"
               alt="Architectural illustration for the 139 sq yd plot option" loading="lazy" decoding="async">
        </div>
        <div class="kv-plot__body">
          @include('partials.kv.crown', ['shapeClass' => 'kv-plot__crown', 'shapeVariant' => 'plot'])
          <span class="kv-plot__emblem" aria-hidden="true">
            @include('partials.kv.plot-simha-emblem')
          </span>
          <h3>Simha</h3>
          <p>Most space, private pool.</p>
          <div class="kv-plot__meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/></svg>3BHK</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M4 10h16M10 4v16"/></svg>1,250 sq.ft</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M3 15c2 0 2-2 4.5-2s2.5 2 4.5 2 2-2 4.5-2 2.5 2 4.5 2M3 20c2 0 2-2 4.5-2s2.5 2 4.5 2 2-2 4.5-2 2.5 2 4.5 2M9 12V5a2 2 0 0 0-4 0m9 8V5a2 2 0 0 0-4 0"/></svg>Private Pool</span>
          </div>
          <button type="button" class="kv-link-arrow kv-plot__enquire" data-kv-open="enquiry" aria-label="Enquiry Now for the 139 sq yd plot">
            Enquiry Now
            <i aria-hidden="true"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></i>
          </button>
        </div>
      </article>

      <article class="kv-plot" data-mv="plot">
        <div class="kv-plot__media">
          <img src="{{ asset('assets/img/kv/plot-2-860.webp') }}"
               width="860" height="1147"
               alt="Architectural illustration for the 125 sq yd plot option" loading="lazy" decoding="async">
        </div>
        <div class="kv-plot__body">
          @include('partials.kv.crown', ['shapeClass' => 'kv-plot__crown', 'shapeVariant' => 'plot'])
          <span class="kv-plot__emblem" aria-hidden="true">
            @include('partials.kv.plot-mriga-emblem')
          </span>
          <h3>Mriga</h3>
          <p>Room to relax, hill views.</p>
          <div class="kv-plot__meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/></svg>2BHK</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M4 10h16M10 4v16"/></svg>1,125 sq.ft</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M3 15c2 0 2-2 4.5-2s2.5 2 4.5 2 2-2 4.5-2 2.5 2 4.5 2M3 20c2 0 2-2 4.5-2s2.5 2 4.5 2 2-2 4.5-2 2.5 2 4.5 2M9 12V5a2 2 0 0 0-4 0m9 8V5a2 2 0 0 0-4 0"/></svg>Private Pool</span>
          </div>
          <button type="button" class="kv-link-arrow kv-plot__enquire" data-kv-open="enquiry" aria-label="Enquiry Now for the 125 sq yd plot">
            Enquiry Now
            <i aria-hidden="true"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></i>
          </button>
        </div>
      </article>

    </div>

    <div class="kv-home__section-link">
      <a href="{{ route('pricing') }}#villa-floor-plans" class="kv-link-arrow">
        View Plot Sizes and Villa Floor Plans
        <i aria-hidden="true"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></i>
      </a>
    </div>
  </div>
</section>

{{-- ================================================== GALLERY ================================================== --}}
<section class="kv-gallery" id="gallery" aria-labelledby="kvGalleryTitle">
  <div class="kv-gallery__media" id="kvGalleryMedia">
    <h2 class="kv-gallery__label" id="kvGalleryTitle">
      @include('partials.kv.crown', ['shapeClass' => 'kv-gallery__shape', 'shapeVariant' => 'tab'])
      <span>Gallery</span>
    </h2>
    <picture>
      <source media="(max-width: 720px)" srcset="{{ asset('assets/img/kv/about-1000.webp') }}">
      <img src="{{ asset('assets/img/kv/gallery-1920.webp') }}"
           width="1920" height="816"
           alt="Architectural rendering of The Koru Ville at dusk" loading="lazy">
    </picture>
    <button type="button" class="kv-gallery__play" id="kvGalleryPlay" aria-label="Play the site film">
      <svg viewBox="0 0 24 24" fill="white" aria-hidden="true"><path d="M8 5.2v13.6L19 12Z"/></svg>
    </button>
    <p class="kv-gallery__error" id="kvGalleryError" role="status" hidden>The site film couldn’t play. Try again.</p>

    <div class="kv-gallery__player">
      <video class="kv-gallery__video" id="kvGalleryVideo"
             playsinline preload="metadata"
             poster="{{ asset('assets/img/kv/gallery-1920.webp') }}"
             aria-label="The Koru Ville site film">
        <source src="{{ route('media.gallery') }}?v={{ @filemtime(public_path('assets/video/The-Koru-Ville-Teaser.mp4')) ?: 1 }}" type="video/mp4">
      </video>

      <button type="button" class="kv-gallery__dismiss" id="kvGalleryDismiss" aria-label="Close floating video">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="white" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="m2 2 10 10M12 2 2 12"/></svg>
      </button>

      <div class="kv-gallery__controls">
        <button type="button" class="kv-gallery__toggle" id="kvGalleryToggle" aria-label="Pause the site film">
          <svg class="kv-gallery__icon--play" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5.2v13.6L19 12Z"/></svg>
          <svg class="kv-gallery__icon--pause" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><rect x="7" y="5" width="3.6" height="14" rx="1"/><rect x="13.4" y="5" width="3.6" height="14" rx="1"/></svg>
        </button>
        <input type="range" class="kv-gallery__seek" id="kvGallerySeek"
               min="0" max="1000" step="1" value="0" aria-label="Seek through the site film">
        <span class="kv-gallery__time" id="kvGalleryTime">0:00 / 0:00</span>
      </div>
    </div>
  </div>
  <div class="kv-gallery__footer">
    <p>The Koru Ville · Kilawali</p>
    <a href="{{ route('amenities') }}" class="kv-link-arrow">
      Explore Amenities
      <i aria-hidden="true"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></i>
    </a>
  </div>
</section>

{{-- ============================================ LAYOUT & PRICING ============================================ --}}
<section class="kv-invest" id="layout-price">
  <div class="kv-shell">
    <div class="kv-section-head" data-mv-group="90">
      <span class="kv-eyebrow" data-mv="fade">Site Layout &amp; Investment</span>
      <h2 class="kv-display kv-display--lg" data-mv="words">Layout Plan &amp; Pricing</h2>
    </div>

    <div class="kv-unlock-grid" data-mv-group="120">
      <div class="kv-unlock" data-mv="scale">
        <div class="kv-unlock__bg"><img src="{{ asset('assets/img/kv/unlock-price.webp') }}" alt="" aria-hidden="true" loading="lazy" data-mv-parallax="24"></div>
        <svg class="lock" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.6" fill="currentColor"/></svg>
        <div>
          <h3>Price List</h3>
          <p>Get the current, plot-wise price breakup for residential and restaurant-themed plots.</p>
          <button type="button" class="kv-btn" data-kv-open="unlock" data-unlock="price">Unlock Price List</button>
        </div>
      </div>

      <div class="kv-unlock" data-mv="scale">
        <div class="kv-unlock__bg"><img src="{{ asset('assets/img/kv/unlock-layout.webp') }}" alt="" aria-hidden="true" loading="lazy" data-mv-parallax="24"></div>
        <svg class="lock" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.6" fill="currentColor"/></svg>
        <div>
          <h3>Layout Plan</h3>
          <p>Share a few details to unlock the full site layout and plot numbering for The Koru Ville.</p>
          <button type="button" class="kv-btn" data-kv-open="unlock" data-unlock="layout">Unlock Layout Plan</button>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ==================================================== BLOG ==================================================== --}}
@php
  $posts = \App\Models\Post::publishedForWebsite()->latest()->take(3)->get();
  $featured = $posts->first();

  $postSummary = function ($post) {
      return $post->meta_description ?? \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 100);
  };
  $postImage = function ($post, $fallback = 'assets/img/kv/gallery-1440.webp') {
      return $post && $post->image ? $post->imageUrl() : asset($fallback);
  };

  $featuredTitle = $featured?->title ?? '';
  $featuredCopy = $featured ? $postSummary($featured) : 'No recent articles found. Please publish a blog post in your admin panel.';
  $featuredUrl = $featured ? url('/blog/'.$featured->slug) : url('/blog');
  $featuredImage = $postImage($featured);
@endphp
<div class="kv-blog-wrap" id="recent-posts" data-blog-slider>
<section class="kv-blog" id="blog">
  <div class="kv-blog__bg" data-blog-bg>
    <img src="{{ $featuredImage }}" alt="" aria-hidden="true" loading="lazy" class="is-active" data-blog-bg-img>
    <img alt="" aria-hidden="true" loading="lazy" data-blog-bg-img>
  </div>

  <div class="kv-blog__label" data-mv="fade">
    <span class="kv-eyebrow">News &amp; Articles</span>
    <h2 class="kv-display" data-mv="words" data-mv-word-delay="70">Latest Insights from The Koru Ville</h2>
    <p class="kv-blog__intro">Discover more about living near Jim Corbett, investment opportunities, and local developments in Kilawali.</p>
  </div>

  <div class="kv-blog__inner">
    <div class="kv-blog__feature" data-mv="left" data-mv-delay="240" data-blog-feature>
      @if($featured)
        <h3 class="kv-blog__heading" data-blog-title aria-live="polite">{{ $featuredTitle }}</h3>
      @endif
      <p data-blog-copy>{{ $featuredCopy }}</p>
      <a href="{{ $featuredUrl }}" class="kv-btn kv-btn--outline kv-blog__cta" data-blog-cta>
        {{ $featured ? 'Read More' : 'View All Articles' }}
        <span class="kv-blog__cta-arrow" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </span>
      </a>
    </div>
  </div>
</section>

{{-- The post carousel is its own section: side rail on desktop, a separate
     block under the featured panel on phones and tablets. --}}
@if($posts->isNotEmpty())
<section class="kv-blog__posts" aria-label="More articles">
    <div class="kv-blog__rail" data-mv="right" data-mv-delay="320">
      <button type="button" class="kv-blog__arrow kv-blog__arrow--prev" data-prev aria-label="Previous article">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 19l-7-7 7-7"/></svg>
      </button>

      <div class="kv-blog__track" data-track>
        @foreach($posts as $post)
          <a class="kv-post" href="{{ url('/blog/'.$post->slug) }}"
             data-slide
             data-title="{{ $post->title }}"
             data-copy="{{ $postSummary($post) }}"
             data-url="{{ url('/blog/'.$post->slug) }}"
             data-image="{{ $postImage($post) }}">
            <div class="kv-post__media">
              @if($post->image)
                <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" loading="lazy">
              @else
                <img src="{{ asset('assets/img/kv/gallery-900.webp') }}" alt="{{ $post->title }}" loading="lazy">
              @endif
            </div>
            <div class="kv-post__body">
              @include('partials.kv.crown', ['shapeClass' => 'kv-post__crown', 'shapeVariant' => 'crown'])
              <h3>{{ $post->title }}</h3>
              <span>{{ $post->updated_at?->format('M Y') }}</span>
            </div>
          </a>
        @endforeach
      </div>

      <button type="button" class="kv-blog__arrow kv-blog__arrow--next" data-next aria-label="Next article">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 5l7 7-7 7"/></svg>
      </button>

      <div class="kv-blog__dots" data-dots aria-hidden="true"></div>
    </div>
  <a href="{{ route('posts.index') }}" class="kv-btn kv-btn--olive kv-blog__all">View All Articles</a>
</section>
@endif
</div>

{{-- ==================================================== MAP ==================================================== --}}
<section class="kv-panel kv-panel--cream2 kv-map" id="map">
  <div class="kv-shell">
    <div class="kv-section-head" data-mv-group="90">
      <span class="kv-eyebrow" data-mv="fade">Virtual Tour</span>
      <h2 class="kv-display kv-display--lg" data-mv="words">Walk the Site Before You Visit</h2>
      <p class="kv-lede" data-mv="blur">Explore the project's prime location in Kilawali on the map below, or book a private site visit for a guided tour.</p>
    </div>

    <div data-mv="scale">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.9305532452545!2d78.9545938!3d29.314656299999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6bbfe6b542d9f67f%3A0x79cc09e76313c64a!2sThe%20KoruVille!5e1!3m2!1sen!2sin!4v1783059642503!5m2!1sen!2sin"
              referrerpolicy="no-referrer-when-downgrade" title="The Koru Ville location map" allowfullscreen loading="lazy"></iframe>
    </div>

    <div class="kv-map__link">
      <a href="https://maps.app.goo.gl/JKDBpER1bCGxZoM29" target="_blank" rel="noopener noreferrer" class="kv-link-arrow">
        Open in Google Maps
        <i><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></i>
      </a>
    </div>

    <div class="kv-map__chips" data-mv-group="70">
      <span class="kv-chip" data-mv="fade">15 Min Drive to Phato Gate</span>
      <span class="kv-chip" data-mv="fade">Walking Distance to Tumaria Dam</span>
      <span class="kv-chip" data-mv="fade">Guided Site Visits Daily</span>
    </div>
  </div>
</section>

{{-- ==================================================== FAQ ==================================================== --}}
<section class="kv-panel kv-panel--cream kv-faq" id="faq">
  <div class="kv-shell">
    <div class="kv-section-head" data-mv-group="90">
      <span class="kv-eyebrow" data-mv="fade">Common Questions</span>
      <h2 class="kv-display kv-display--lg" data-mv="words">Frequently Asked Questions</h2>
    </div>

    <div class="kv-faq__box" data-mv="up" data-mv-group="60">
      @foreach($faqs as $faq)
        @if($loop->index === 5)
          <details class="kv-faq__more">
            <summary><span>Read More FAQs</span><span>Show Less</span></summary>
        @endif
        <div class="kv-faq__item" data-mv="fade">
          <button type="button" class="kv-faq__q" aria-expanded="false">
            <span>{{ $faq[0] }}</span><i>+</i>
          </button>
          <div class="kv-faq__a">
            <div><p>{{ $faq[1] }}</p></div>
          </div>
        </div>
        @if($loop->last)
          </details>
        @endif
      @endforeach
    </div>
  </div>
</section>

{{-- ================================================== CONTACT ================================================== --}}
<section class="kv-panel kv-panel--cream2 kv-contact" id="contact">
  <div class="kv-shell">
    <div class="kv-contact__grid">
      <div data-mv="left" data-mv-group="80">
        <span class="kv-eyebrow" data-mv="fade">Get In Touch</span>
        <h2 data-mv="words" data-mv-word-delay="50">Plan a Private Visit</h2>
        <p data-mv="blur">Plots near Jim Corbett National Park are more than just an investment — Buyers and investors have a chance to build a luxury villa that reflects their lifestyle. The Koru Ville is a thoughtfully designed thematic township for those seeking a closer connection to nature and a welcome escape from the city’s hustle. Our team will help you explore suitable plots, experience the site personally, and understand the pricing clearly.</p>

        <div class="kv-contact__rows" data-mv-group="60">
          <div class="kv-contact__row" data-mv="fade">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.9 2.3Z"/></svg>
            <div><b>Office</b><a href="tel:+918377000300">+91 8377 000300</a></div>
          </div>
          <div class="kv-contact__row" data-mv="fade">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
            <div><b>Email</b><a href="mailto:info@thekoruville.com">info@thekoruville.com</a></div>
          </div>
          <div class="kv-contact__row" data-mv="fade">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 22s7-6.4 7-12a7 7 0 1 0-14 0c0 5.6 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/></svg>
            <div><b>Corporate Office</b><span>G-192, Sector 63, Noida, Uttar Pradesh – 201301</span></div>
          </div>
          <div class="kv-contact__row" data-mv="fade">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 22s7-6.4 7-12a7 7 0 1 0-14 0c0 5.6 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/></svg>
            <div><b>Site Address</b><a href="https://maps.app.goo.gl/JKDBpER1bCGxZoM29" target="_blank" rel="noopener noreferrer">The Koru Ville, Kilawali, Kashipur, Uttarakhand – 244712</a></div>
          </div>
        </div>
      </div>

      <div class="kv-form" data-mv="right" data-mv-delay="120">
        <form data-kv-form data-source="The Koru Ville Website — Contact Section" data-success="Thank You. We've received your enquiry. Our team will call you within 24 hours." novalidate>
          <div class="kv-field">
            <label for="cName">Full Name</label>
            <input type="text" id="cName" name="name" autocomplete="name" required>
            <p class="kv-form__error"></p>
          </div>
          <div class="kv-field">
            <label for="cEmail">Email</label>
            <input type="email" id="cEmail" name="email" autocomplete="email" required>
            <p class="kv-form__error"></p>
          </div>
          <div class="kv-field">
            <label for="cPhone">Phone</label>
            <input type="tel" id="cPhone" name="mobile" autocomplete="tel" required>
            <p class="kv-form__error"></p>
          </div>
          <div class="kv-field">
            <label for="cMessage">Message</label>
            <textarea id="cMessage" name="message" rows="4" placeholder="Tell us what you're looking for..."></textarea>
          </div>
          <button type="submit" class="kv-btn kv-btn--olive kv-btn--block">Send Enquiry</button>
          <p class="kv-form__status" role="status" aria-live="polite"></p>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
