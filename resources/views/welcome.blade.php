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
    <p>A closer look at The Koru Ville</p>
    <button type="button" class="kv-link-arrow kv-gallery__visit" data-kv-open="enquiry">
      Book a Site Visit
      <i aria-hidden="true"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></i>
    </button>
  </div>
</section>

{{-- ============================================ LAYOUT & PRICING ============================================ --}}
<section class="kv-invest" id="layout-price" aria-labelledby="kvPricingTitle">
  <div class="kv-shell">
    <div class="kv-section-head" data-mv-group="90">
      <span class="kv-eyebrow" data-mv="fade">Site Layout &amp; Investment</span>
      <h2 class="kv-display" id="kvPricingTitle" data-mv="words">Layout Plan &amp; Pricing</h2>
    </div>

    @php
      $pricingDocuments = [
        ['key' => 'price', 'title' => 'Price List', 'description' => 'Get the current, plot-wise price breakup for residential and restaurant-themed plots.'],
        ['key' => 'layout', 'title' => 'Layout Plan', 'description' => 'Share a few details to unlock the full site layout and plot numbering for The Koru Ville.'],
      ];
    @endphp

    <div class="kv-unlock-grid" data-mv-group="110">
      @foreach($pricingDocuments as $document)
        <article class="kv-unlock" data-mv="scale">
          <div class="kv-unlock__preview" aria-hidden="true">
            <img src="{{ asset('assets/img/kv/unlock-'.$document['key'].'.webp') }}" alt="" loading="lazy" decoding="async">
          </div>
          <span class="kv-unlock__lock" aria-hidden="true">
            <svg width="24" height="32" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.4" fill="currentColor"/></svg>
          </span>
          <div class="kv-unlock__body">
            <h3>{{ $document['title'] }}</h3>
            <p>{{ $document['description'] }}</p>
            <button type="button" class="kv-btn kv-btn--outline kv-unlock__action" data-kv-open="unlock" data-unlock="{{ $document['key'] }}">
              Unlock {{ $document['title'] }}
            </button>
          </div>
        </article>
      @endforeach
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
@endphp
<div class="kv-blog-wrap" id="recent-posts" data-blog-slider>
<section class="kv-blog" id="blog" aria-labelledby="kvBlogTitle">
  <div class="kv-blog__bg" aria-hidden="true">
    @forelse($posts as $post)
      <img src="{{ $postImage($post) }}" alt="" loading="lazy" decoding="async" @class(['is-active' => $loop->first]) data-blog-bg-img>
    @empty
      <img src="{{ $postImage(null) }}" alt="" loading="lazy" class="is-active">
    @endforelse
  </div>

  <div class="kv-blog__label">
    <span class="kv-eyebrow">News &amp; Articles</span>
    <h2 class="kv-display" id="kvBlogTitle">Latest Blogs</h2>
    <p class="kv-blog__intro">Explore life near Jim Corbett, property insights and local news.</p>
    <a href="{{ route('posts.index') }}" class="kv-link-arrow kv-blog__all">
      View All Articles
      <i aria-hidden="true"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></i>
    </a>
  </div>

  <div class="kv-blog__inner">
    <div class="kv-blog__feature" data-mv="left" data-mv-delay="240" data-blog-feature>
      @if($featured)
        <h3 class="kv-blog__heading" data-blog-title aria-live="polite">{{ $featuredTitle }}</h3>
      @endif
      <p data-blog-copy>{{ $featuredCopy }}</p>
      @if($featured)
        <a href="{{ $featuredUrl }}" class="kv-btn kv-btn--outline kv-blog__cta" data-blog-cta>
          Read More
          <span class="kv-blog__cta-arrow" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </span>
        </a>
      @endif
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
             data-url="{{ url('/blog/'.$post->slug) }}">
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
              @if($post->updated_at)
                <time datetime="{{ $post->updated_at->format('Y-m-d') }}">{{ $post->updated_at->format('M Y') }}</time>
              @endif
            </div>
          </a>
        @endforeach
      </div>

      <button type="button" class="kv-blog__arrow kv-blog__arrow--next" data-next aria-label="Next article">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 5l7 7-7 7"/></svg>
      </button>

      <div class="kv-blog__dots" data-dots aria-hidden="true"></div>
    </div>
</section>
@endif
</div>

{{-- ==================================================== MAP ==================================================== --}}
<section class="kv-panel kv-panel--cream2 kv-map" id="map" aria-labelledby="kvMapTitle">
  <div class="kv-shell">
    <div class="kv-map__header">
      <div>
        <span class="kv-eyebrow">Virtual Tour</span>
        <h2 class="kv-display" id="kvMapTitle">Walk the Site Before You Visit</h2>
        <p>Explore the project's prime location in Kilawali on the map below, or book a private site visit for a guided tour.</p>
      </div>
      <a href="https://maps.app.goo.gl/JKDBpER1bCGxZoM29" target="_blank" rel="noopener noreferrer" class="kv-link-arrow kv-map__directions">
        Open in Google Maps
        <i aria-hidden="true"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 18 18 6M8 6h10v10"/></svg></i>
      </a>
    </div>

    <div class="kv-map__frame">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.9305532452545!2d78.9545938!3d29.314656299999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6bbfe6b542d9f67f%3A0x79cc09e76313c64a!2sThe%20KoruVille!5e1!3m2!1sen!2sin!4v1783059642503!5m2!1sen!2sin"
              referrerpolicy="no-referrer-when-downgrade" title="The Koru Ville location map" allowfullscreen loading="lazy"></iframe>
      <ul class="kv-map__facts">
        <li><strong>15 Min Drive</strong> to Phato Gate</li>
        <li><strong>Walking Distance</strong> to Tumaria Dam</li>
        <li><strong>Guided Site Visits</strong> Daily</li>
      </ul>
    </div>
  </div>
</section>

{{-- ================================================== REVIEWS ================================================== --}}
<section class="kv-reviews" id="reviews" aria-labelledby="kvReviewsTitle">
  <div class="kv-shell">
    <div class="kv-reviews__head" data-mv="fade">
      <svg class="kv-reviews__g" viewBox="0 0 48 48" aria-hidden="true">
        <path fill="#4285F4" d="M45 24c0-1.6-.1-2.8-.4-4H24v7.6h12c-.2 2-1.5 5-4.4 7l6.7 5.2C42.7 36.1 45 30.6 45 24Z"/>
        <path fill="#34A853" d="M24 46c6.2 0 11.4-2 15.3-5.6l-6.7-5.2c-1.9 1.3-4.4 2.2-8.6 2.2-5.9 0-10.9-3.9-12.7-9.3l-7 5.4C8.3 41.1 15.5 46 24 46Z"/>
        <path fill="#FBBC05" d="M11.3 28.1A13.8 13.8 0 0 1 10.6 24c0-1.4.2-2.8.6-4.1l-7-5.4A21.7 21.7 0 0 0 2 24c0 3.5.8 6.8 2.3 9.5l7-5.4Z"/>
        <path fill="#EA4335" d="M24 10.2c3.3 0 6 .9 8.2 2.9l6-6C34.5 3.5 29.8 2 24 2 15.5 2 8.3 6.9 4.3 14.5l7 5.4C13.1 14.1 18.1 10.2 24 10.2Z"/>
      </svg>
      <h2 id="kvReviewsTitle">Google Reviews</h2>
      <span class="kv-reviews__score" aria-label="4.9 out of 5">4.9</span>
      <div class="kv-reviews__stars" aria-hidden="true">
        @for($i=0;$i<5;$i++)<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 2 3 6.6 7 .9-5.2 5 1.4 7L12 18l-6.2 3.5 1.4-7L2 9.5l7-.9L12 2Z"/></svg>@endfor
      </div>
    </div>

    <div class="kv-reviews__rail" data-mv="up" data-mv-delay="140" data-carousel>
      <div class="kv-reviews__track" data-track>
        @php
          $kvReviews = [
            ['name'=>'Aman Verma','text'=>'A well-planned, thematic township in a beautiful setting near Jim Corbett. The team was transparent about the layout and pricing, and the site visit was genuinely useful.'],
            ['name'=>'Priya Nair','text'=>'The location is genuinely close to the park boundary while still connected to Kashipur. Exactly what we were looking for — quiet, green and easy to reach.'],
            ['name'=>'Rahul Singh','text'=>'Visited the site in person — the resort-style layout and wide internal roads stood out. A good early-stage opportunity for anyone wanting land near Corbett.'],
          ];
        @endphp

        @foreach($kvReviews as $review)
          <article class="kv-review">
            <div class="kv-review__top">
              <div class="kv-review__avatar">{{ strtoupper(substr($review['name'],0,1)) }}</div>
              <div class="kv-review__who">
                <div>
                  <h3>{{ $review['name'] }}</h3>
                  <div class="kv-reviews__stars" aria-label="5 out of 5 stars">
                    @for($i=0;$i<5;$i++)<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 2 3 6.6 7 .9-5.2 5 1.4 7L12 18l-6.2 3.5 1.4-7L2 9.5l7-.9L12 2Z"/></svg>@endfor
                  </div>
                </div>
                <svg class="kv-review__google" viewBox="0 0 48 48" aria-hidden="true">
                  <path fill="#4285F4" d="M45 24c0-1.6-.1-2.8-.4-4H24v7.6h12c-.2 2-1.5 5-4.4 7l6.7 5.2C42.7 36.1 45 30.6 45 24Z"/>
                  <path fill="#34A853" d="M24 46c6.2 0 11.4-2 15.3-5.6l-6.7-5.2c-1.9 1.3-4.4 2.2-8.6 2.2-5.9 0-10.9-3.9-12.7-9.3l-7 5.4C8.3 41.1 15.5 46 24 46Z"/>
                  <path fill="#FBBC05" d="M11.3 28.1A13.8 13.8 0 0 1 10.6 24c0-1.4.2-2.8.6-4.1l-7-5.4A21.7 21.7 0 0 0 2 24c0 3.5.8 6.8 2.3 9.5l7-5.4Z"/>
                  <path fill="#EA4335" d="M24 10.2c3.3 0 6 .9 8.2 2.9l6-6C34.5 3.5 29.8 2 24 2 15.5 2 8.3 6.9 4.3 14.5l7 5.4C13.1 14.1 18.1 10.2 24 10.2Z"/>
                </svg>
              </div>
            </div>
            <p>{{ $review['text'] }}</p>
          </article>
        @endforeach
      </div>

      <div class="kv-reviews__arrows">
        <button type="button" data-prev aria-label="Previous reviews"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg></button>
        <button type="button" data-next aria-label="Next reviews"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></button>
      </div>
    </div>
  </div>
</section>

{{-- ==================================================== FAQ ==================================================== --}}
<section class="kv-panel kv-panel--cream kv-faq" id="faq" aria-labelledby="kvFaqTitle">
  <div class="kv-shell kv-faq__grid">
    <div class="kv-faq__heading">
      <span class="kv-eyebrow">Common Questions</span>
      <h2 class="kv-display" id="kvFaqTitle">Frequently Asked Questions</h2>
    </div>

    <div class="kv-faq__box">
      @foreach($faqs as $faq)
        @if($loop->index === 5)
          <details class="kv-faq__more">
            <summary><span>Read More FAQs</span><span>Show Less</span></summary>
        @endif
        <div class="kv-faq__item">
          <button type="button" class="kv-faq__q" aria-expanded="false" aria-controls="kvFaqAnswer{{ $loop->iteration }}">
            <span>{{ $faq[0] }}</span><i aria-hidden="true">+</i>
          </button>
          <div class="kv-faq__a" id="kvFaqAnswer{{ $loop->iteration }}" aria-hidden="true">
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
<section class="kv-panel kv-panel--cream2 kv-contact" id="contact" aria-labelledby="kvContactTitle">
  <div class="kv-shell">
    <div class="kv-contact__grid">
      <div class="kv-contact__intro" data-mv="up">
        <span class="kv-eyebrow">Get In Touch</span>
        <h2 class="kv-display" id="kvContactTitle">Plan a Private Visit</h2>
        <p>Plots near Jim Corbett National Park are more than just an investment — Buyers and investors have a chance to build a luxury villa that reflects their lifestyle. The Koru Ville is a thoughtfully designed thematic township for those seeking a closer connection to nature and a welcome escape from the city’s hustle. Our team will help you explore suitable plots, experience the site personally, and understand the pricing clearly.</p>

        <div class="kv-contact__rows">
          <div class="kv-contact__row">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.9 2.3Z"/></svg>
            <div><b>Office</b><a href="tel:+918377000300">+91 8377 000300</a></div>
          </div>
          <div class="kv-contact__row">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
            <div><b>Email</b><a href="mailto:info@thekoruville.com">info@thekoruville.com</a></div>
          </div>
          <div class="kv-contact__row">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 22s7-6.4 7-12a7 7 0 1 0-14 0c0 5.6 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/></svg>
            <div><b>Corporate Office</b><span>G-192, Sector 63, Noida, Uttar Pradesh – 201301</span></div>
          </div>
          <div class="kv-contact__row">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 22s7-6.4 7-12a7 7 0 1 0-14 0c0 5.6 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/></svg>
            <div><b>Site Address</b><a href="https://maps.app.goo.gl/JKDBpER1bCGxZoM29" target="_blank" rel="noopener noreferrer">The Koru Ville, Kilawali, Kashipur, Uttarakhand – 244712</a></div>
          </div>
        </div>
      </div>

      <div class="kv-form" data-mv="up" data-mv-delay="100">
        <form data-kv-form data-source="The Koru Ville Website — Contact Section" data-success="Thank You. We've received your enquiry. Our team will call you within 24 hours." novalidate>
          <div class="kv-field">
            <label for="cName">Full Name</label>
            <input type="text" id="cName" name="name" autocomplete="name" aria-describedby="cNameError" required>
            <p class="kv-form__error" id="cNameError"></p>
          </div>
          <div class="kv-field">
            <label for="cEmail">Email</label>
            <input type="email" id="cEmail" name="email" autocomplete="email" aria-describedby="cEmailError" required>
            <p class="kv-form__error" id="cEmailError"></p>
          </div>
          <div class="kv-field">
            <label for="cPhone">Phone</label>
            <input type="tel" id="cPhone" name="mobile" autocomplete="tel" inputmode="tel" aria-describedby="cPhoneError" required>
            <p class="kv-form__error" id="cPhoneError"></p>
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
