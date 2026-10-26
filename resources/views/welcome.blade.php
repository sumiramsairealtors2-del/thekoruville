@extends('layouts.kv')

@section('title', 'Residential Plots Near Jim Corbett | The Koru Ville')
@section('description', 'Discover residential freehold plots near Jim Corbett at The Koru Ville, Kilawali. Enjoy nature, excellent connectivity to Kashipur, and resort-style living.')
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
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What is The Koru Ville?",
    "acceptedAnswer": { "@type": "Answer", "text": "The Koru Ville is an upcoming resort-themed residential plotted township coming up in Kilawali, Uttarakhand, at the gateway to Jim Corbett National Park." }
  },{
    "@type": "Question",
    "name": "Where exactly is the project located?",
    "acceptedAnswer": { "@type": "Answer", "text": "The Koru Ville is located in Kilawali, Uttarakhand - 244712, along the Kashipur-Ramnagar highway corridor." }
  },{
    "@type": "Question",
    "name": "How far is the project from Jim Corbett National Park?",
    "acceptedAnswer": { "@type": "Answer", "text": "The Koru Ville is just 15 minutes by drive from Phato Gate, one of the few Jim Corbett safari gates open all year round, including through the monsoon season." }
  },{
    "@type": "Question",
    "name": "What plot sizes are available?",
    "acceptedAnswer": { "@type": "Answer", "text": "The Koru Ville plots are available starting from 111 sq. yd, with additional sizes at 125 sq. yd and 139 sq. yd." }
  },{
    "@type": "Question",
    "name": "Is Kilawali located inside Jim Corbett National Park?",
    "acceptedAnswer": { "@type": "Answer", "text": "No. The Koru Ville sits just outside the notified park boundary, along the highway corridor that serves as the gateway to the park." }
  }]
}
</script>
@endverbatim
@endsection

@section('content')

{{-- ==================================================== HERO ==================================================== --}}
<section class="kv-hero" id="home">
  <div class="kv-hero__frame">

    <div class="kv-hero__slide is-active" aria-hidden="false">
      <img src="{{ asset('assets/img/kv/hero-1920.webp') }}"
           srcset="{{ asset('assets/img/kv/hero-800.webp') }} 800w, {{ asset('assets/img/kv/hero-1280.webp') }} 1280w, {{ asset('assets/img/kv/hero-1920.webp') }} 1920w"
           sizes="100vw" width="1282" height="654"
           alt="The Koru Ville resort-themed township at Kilawali, Uttarakhand" fetchpriority="high">
    </div>
    <div class="kv-hero__slide" aria-hidden="true">
      <img src="{{ asset('assets/img/kv/about-1000.webp') }}"
           srcset="{{ asset('assets/img/kv/about-480.webp') }} 480w, {{ asset('assets/img/kv/about-760.webp') }} 760w, {{ asset('assets/img/kv/about-1000.webp') }} 1000w"
           sizes="100vw" width="614" height="768" alt="The Koru Ville at dusk" loading="lazy">
    </div>
    <div class="kv-hero__slide" aria-hidden="true">
      <img src="{{ asset('assets/img/kv/why-1040.webp') }}"
           srcset="{{ asset('assets/img/kv/why-520.webp') }} 520w, {{ asset('assets/img/kv/why-800.webp') }} 800w, {{ asset('assets/img/kv/why-1040.webp') }} 1040w"
           sizes="100vw" width="1054" height="1054" alt="The Koru Ville clubhouse and landscaped grounds" loading="lazy">
    </div>

    <div class="kv-hero__copy">
      <h1>The Koru Ville</h1>
      <p class="kv-hero__sub">Resort-Themed Plots at the Gateway to Jim Corbett</p>
      <p class="kv-hero__lede">An upcoming resort-themed plotted township where you build your own home, just 15 minutes by drive from Phato Gate, one of Jim Corbett's most sought-after safari entry points.</p>
      <div class="kv-hero__actions">
        <button type="button" class="kv-btn" data-kv-open="enquiry">Enquire About Plots</button>
        <button type="button" class="kv-btn" data-kv-open="brochure">Download Brochure</button>
      </div>
    </div>

    <div class="kv-hero__dots" role="tablist" aria-label="Hero images">
      <button type="button" aria-current="true" aria-label="Image 1"></button>
      <button type="button" aria-current="false" aria-label="Image 2"></button>
      <button type="button" aria-current="false" aria-label="Image 3"></button>
    </div>

  </div>

  <div class="kv-hero__nav">
    <button type="button" class="kv-hero__arrow kv-hero__arrow--prev" aria-label="Previous image">
      <svg class="kv-hero__arrow-shape" viewBox="0 0 320 63" preserveAspectRatio="none" aria-hidden="true" focusable="false"><use href="#kv-arrow-tab"/></svg>
      <svg class="kv-hero__arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button type="button" class="kv-hero__arrow kv-hero__arrow--next" aria-label="Next image">
      <svg class="kv-hero__arrow-shape" viewBox="0 0 320 63" preserveAspectRatio="none" aria-hidden="true" focusable="false"><use href="#kv-arrow-tab"/></svg>
      <svg class="kv-hero__arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 5l7 7-7 7"/></svg>
    </button>
  </div>
</section>

{{-- ==================================================== ABOUT ==================================================== --}}
<section class="kv-panel kv-panel--cream kv-about" id="about">
  <div class="kv-shell">
    <span class="kv-eyebrow">About Us</span>

    <div class="kv-about__grid">
      <div class="kv-stats kv-reveal">
        <div class="kv-stat">
          <b>3.5 Acres</b>
          <span>Resort-themed township</span>
        </div>
        <div class="kv-stat">
          <b>15 Min</b>
          <span>Drive to Phato Gate</span>
        </div>
      </div>

      <div class="kv-about__copy kv-reveal">
        <p>Spread across 3.5 acres, <strong>The Koru Ville</strong> is a resort-themed residential plotted township along the Kashipur–Ramnagar highway belt, just outside the notified <strong>Jim Corbett National Park</strong> boundary — close enough to feel the forest every day, without ever crossing into the reserve itself.</p>
        <p class="kv-about__note">111 / 125 / 139 sq.yd &nbsp;·&nbsp; Kilawali, Kashipur</p>
      </div>
    </div>
  </div>
</section>

{{-- ============================================ WHY THIS LOCATION ============================================ --}}
<section class="kv-panel kv-panel--olive" id="why-this-location">
  <div class="kv-split">
    <div class="kv-split__media">
      <img src="{{ asset('assets/img/kv/why-800.webp') }}"
           srcset="{{ asset('assets/img/kv/why-520.webp') }} 520w, {{ asset('assets/img/kv/why-800.webp') }} 800w, {{ asset('assets/img/kv/why-1040.webp') }} 1040w"
           sizes="(max-width:1024px) 100vw, 55vw" width="1054" height="1054"
           alt="Landscaped grounds at The Koru Ville, Kilawali" loading="lazy">
    </div>

    <div class="kv-split__body">
      <span class="kv-eyebrow">Why This Location</span>
      <h2 class="kv-display kv-display--light kv-display--lg">Kilawali, at the Gateway to Jim Corbett</h2>
      <p>Proximity without isolation — Kilawali sits along a working highway corridor that connects you to the park in one direction and Kashipur's markets, hospitals and rail link in the other.</p>

      <ul class="kv-split__list">
        <li><span>01</span><div><b>Nature &amp; wildlife</b><br>Phato Gate 15 min · Tumaria Dam walking distance · Garjia Devi Temple short drive</div></li>
        <li><span>02</span><div><b>Everyday essentials</b><br>Nearest school ~15 min · AIIMS Hospital ~34 min</div></li>
        <li><span>03</span><div><b>Rail &amp; air</b><br>Gaushala 11 km · Kashipur Junction 20 km · Ramnagar 23 km · Pantnagar Airport 66 km</div></li>
      </ul>
    </div>
  </div>
</section>

{{-- ==================================================== PLOTS ==================================================== --}}
<section class="kv-panel kv-panel--cream kv-plots" id="plots">
  <div class="kv-shell">
    <div class="kv-section-head kv-reveal">
      <span class="kv-eyebrow">What's Coming</span>
      <h2 class="kv-display kv-display--lg">Plot Options Built Around How You Live</h2>
      <p class="kv-lede">From a compact weekend retreat to a larger family home, every plot sits inside a resort-themed layout — not a plain residential grid.</p>
    </div>

    <div class="kv-cards">

      <article class="kv-plot kv-reveal">
        <div class="kv-plot__media">
          <span class="kv-plot__badge">Starting size</span>
          <img src="{{ asset('assets/img/kv/plot-1-860.webp') }}"
               srcset="{{ asset('assets/img/kv/plot-1-420.webp') }} 420w, {{ asset('assets/img/kv/plot-1-640.webp') }} 640w, {{ asset('assets/img/kv/plot-1-860.webp') }} 860w"
               sizes="(max-width:720px) 90vw, 33vw" width="574" height="766"
               alt="111 sq.yd residential plot at The Koru Ville" loading="lazy">
        </div>
        <div class="kv-plot__body">
          <svg class="kv-plot__crown" viewBox="0 0 320 93" preserveAspectRatio="none" aria-hidden="true" focusable="false"><use href="#kv-crown-shape"/></svg>
          <span class="kv-plot__emblem" aria-hidden="true">
            <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.15"><circle cx="24" cy="24" r="21" opacity=".5"/><path d="M25.4 24 L25.7 24.6 L25.7 25.5 L25.2 26.3 L24.4 27 L23.2 27.4 L21.8 27.2 L20.5 26.5 L19.4 25.2 L18.9 23.4 L19.1 21.5 L20 19.6 L21.7 18.1 L23.9 17.2 L26.4 17.2 L29 18.2 L31 20.1 L32.4 22.8 L32.7 25.9 L31.8 29.1 L29.7 31.8 L26.7 33.8 L23 34.5 L19.2 33.8 L15.7 31.8 L13.1 28.5 L11.8 24.4 L12.1 19.9 L14 15.7 L17.3 12.3 L21.8 10.3 L26.9 10 L31.9 11.6 L36.1 14.9 L38.9 19.7 L39.9 25.2 L38.8 31 L35.7 36 L30.8 39.8 L24.8 41.6 L18.4 41.1"/></svg>
          </span>
          <h3>111 sq.yd</h3>
          <p>The starter plot — a compact retreat inside the resort-themed layout.</p>
          <div class="kv-plot__meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/></svg>Residential</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M4 10h16M10 4v16"/></svg>111 sq.yd</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 22s7-6.4 7-12a7 7 0 1 0-14 0c0 5.6 7 12 7 12Z"/><circle cx="12" cy="10" r="2.4"/></svg>Freehold</span>
          </div>
          <button type="button" class="kv-btn kv-btn--outline" data-kv-open="enquiry">Explore Now</button>
        </div>
      </article>

      <article class="kv-plot kv-reveal">
        <div class="kv-plot__media">
          <span class="kv-plot__badge">Most popular</span>
          <img src="{{ asset('assets/img/kv/plot-2-860.webp') }}"
               srcset="{{ asset('assets/img/kv/plot-2-420.webp') }} 420w, {{ asset('assets/img/kv/plot-2-640.webp') }} 640w, {{ asset('assets/img/kv/plot-2-860.webp') }} 860w"
               sizes="(max-width:720px) 90vw, 33vw" width="857" height="1143"
               alt="125 sq.yd residential plot at The Koru Ville" loading="lazy">
        </div>
        <div class="kv-plot__body">
          <svg class="kv-plot__crown" viewBox="0 0 320 93" preserveAspectRatio="none" aria-hidden="true" focusable="false"><use href="#kv-crown-shape"/></svg>
          <span class="kv-plot__emblem" aria-hidden="true">
            <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.15"><circle cx="24" cy="24" r="21" opacity=".5"/><path d="M25.4 24 L25.7 24.6 L25.7 25.5 L25.2 26.3 L24.4 27 L23.2 27.4 L21.8 27.2 L20.5 26.5 L19.4 25.2 L18.9 23.4 L19.1 21.5 L20 19.6 L21.7 18.1 L23.9 17.2 L26.4 17.2 L29 18.2 L31 20.1 L32.4 22.8 L32.7 25.9 L31.8 29.1 L29.7 31.8 L26.7 33.8 L23 34.5 L19.2 33.8 L15.7 31.8 L13.1 28.5 L11.8 24.4 L12.1 19.9 L14 15.7 L17.3 12.3 L21.8 10.3 L26.9 10 L31.9 11.6 L36.1 14.9 L38.9 19.7 L39.9 25.2 L38.8 31 L35.7 36 L30.8 39.8 L24.8 41.6 L18.4 41.1"/></svg>
          </span>
          <h3>125 sq.yd</h3>
          <p>A little more room — ideal for a family home with outdoor space.</p>
          <div class="kv-plot__meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/></svg>Residential</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M4 10h16M10 4v16"/></svg>125 sq.yd</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 22s7-6.4 7-12a7 7 0 1 0-14 0c0 5.6 7 12 7 12Z"/><circle cx="12" cy="10" r="2.4"/></svg>Freehold</span>
          </div>
          <button type="button" class="kv-btn kv-btn--outline" data-kv-open="enquiry">Explore Now</button>
        </div>
      </article>

      <article class="kv-plot kv-reveal">
        <div class="kv-plot__media">
          <span class="kv-plot__badge">Largest layout</span>
          <img src="{{ asset('assets/img/kv/plot-3-860.webp') }}"
               srcset="{{ asset('assets/img/kv/plot-3-420.webp') }} 420w, {{ asset('assets/img/kv/plot-3-640.webp') }} 640w, {{ asset('assets/img/kv/plot-3-860.webp') }} 860w"
               sizes="(max-width:720px) 90vw, 33vw" width="576" height="768"
               alt="139 sq.yd residential plot at The Koru Ville" loading="lazy">
        </div>
        <div class="kv-plot__body">
          <svg class="kv-plot__crown" viewBox="0 0 320 93" preserveAspectRatio="none" aria-hidden="true" focusable="false"><use href="#kv-crown-shape"/></svg>
          <span class="kv-plot__emblem" aria-hidden="true">
            <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.15"><circle cx="24" cy="24" r="21" opacity=".5"/><path d="M25.4 24 L25.7 24.6 L25.7 25.5 L25.2 26.3 L24.4 27 L23.2 27.4 L21.8 27.2 L20.5 26.5 L19.4 25.2 L18.9 23.4 L19.1 21.5 L20 19.6 L21.7 18.1 L23.9 17.2 L26.4 17.2 L29 18.2 L31 20.1 L32.4 22.8 L32.7 25.9 L31.8 29.1 L29.7 31.8 L26.7 33.8 L23 34.5 L19.2 33.8 L15.7 31.8 L13.1 28.5 L11.8 24.4 L12.1 19.9 L14 15.7 L17.3 12.3 L21.8 10.3 L26.9 10 L31.9 11.6 L36.1 14.9 L38.9 19.7 L39.9 25.2 L38.8 31 L35.7 36 L30.8 39.8 L24.8 41.6 L18.4 41.1"/></svg>
          </span>
          <h3>139 sq.yd</h3>
          <p>The largest layout — generous space for a full family residence.</p>
          <div class="kv-plot__meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/></svg>Residential</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M4 10h16M10 4v16"/></svg>139 sq.yd</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 22s7-6.4 7-12a7 7 0 1 0-14 0c0 5.6 7 12 7 12Z"/><circle cx="12" cy="10" r="2.4"/></svg>Freehold</span>
          </div>
          <button type="button" class="kv-btn kv-btn--outline" data-kv-open="enquiry">Explore Now</button>
        </div>
      </article>

    </div>
  </div>
</section>

{{-- ================================================== GALLERY ================================================== --}}
<section class="kv-gallery kv-reveal" id="gallery">
  <div class="kv-gallery__media">
    <img src="{{ asset('assets/img/kv/gallery-tiger-1440.webp') }}"
         srcset="{{ asset('assets/img/kv/gallery-tiger-900.webp') }} 900w, {{ asset('assets/img/kv/gallery-tiger-1440.webp') }} 1440w"
         sizes="100vw" width="941" height="400"
         alt="Wildlife near Jim Corbett National Park" loading="lazy">

    <div class="kv-gallery__label" aria-hidden="true">
      <svg class="kv-gallery__shape" viewBox="0 0 260 74" preserveAspectRatio="none" focusable="false"><path d="M0 0C20 2 38 14 45 44C45 62 57 74 75 74H185C203 74 215 62 215 44C222 14 240 2 260 0Z"/></svg>
      <span>Gallery</span>
    </div>

    <button type="button" class="kv-gallery__play"
            data-lightbox="{{ asset('assets/img/kv/gallery-1440.webp') }}"
            data-alt="The Koru Ville grounds at dusk"
            aria-label="Open gallery">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M9 4H4v5M15 4h5v5M9 20H4v-5M20 15v5h-5"/></svg>
    </button>

    <span class="kv-gallery__caption">The Koru Ville · Kilawali</span>
  </div>
</section>

{{-- ================================================= AMENITIES ================================================= --}}
<section class="kv-amenities" id="amenities">
  <div class="kv-shell">
    <div class="kv-amenities__head kv-reveal">
      <div>
        <span class="kv-eyebrow">World-Class Amenities</span>
        <h2 class="kv-display kv-display--md">A Resort-Style Community</h2>
      </div>
      <p class="kv-lede">Even though owners build their own individual homes, the surrounding community is designed to already feel like a retreat.</p>
    </div>

    <div class="kv-amenities__grid">
      <div class="kv-amenity kv-reveal">
        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M12 20V10a3 3 0 0 1 6 0v18"/><path d="M12 16h6M12 22h6"/><path d="M16 28v8"/><path d="M26 30c0-2 2-3 4-3s4 1 4 3"/><path d="M7 36c2 2 4 2 6 0s4-2 6 0 4 2 6 0 4-2 6 0 4 2 6 0"/></svg>
        <h3>Swimming Pool</h3>
        <p>A resort-themed pool for owners and guests.</p>
      </div>
      <div class="kv-amenity kv-reveal">
        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M6 32c4-6 10-9 18-9s14 3 18 9"/><path d="M24 23V8"/><path d="M24 12c-5 0-9-2-11-5 5-1 9 1 11 5Z"/><path d="M24 16c5 0 9-2 11-5-5-1-9 1-11 5Z"/><path d="M4 38h40"/></svg>
        <h3>Landscaped Lawns</h3>
        <p>Green, open surroundings woven through the layout.</p>
      </div>
      <div class="kv-amenity kv-reveal">
        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M16 8v14M12 8v6a4 4 0 0 0 8 0V8"/><path d="M16 22v18"/><path d="M32 8c3 0 5 3 5 7s-2 7-5 7v18"/></svg>
        <h3>Dining Cluster</h3>
        <p>A dedicated cluster around shared dining spaces.</p>
      </div>
      <div class="kv-amenity kv-reveal">
        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M24 4l16 6v12c0 10-7 17-16 22C15 39 8 32 8 22V10l16-6Z"/><path d="M17 23l5 5 10-11"/></svg>
        <h3>Gated Security</h3>
        <p>Round-the-clock, CCTV-monitored gated security.</p>
      </div>
      <div class="kv-amenity kv-reveal">
        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" aria-hidden="true"><path d="M6 42h36"/><path d="M10 42V20l14-9 14 9v22"/><path d="M18 42V30h12v12"/><path d="M20 21h8"/></svg>
        <h3>Clubhouse</h3>
        <p>A shared resort-style clubhouse at the heart of it all.</p>
      </div>
    </div>
  </div>
</section>

{{-- ============================================ LAYOUT & PRICING ============================================ --}}
<section class="kv-invest" id="layout-price">
  <div class="kv-shell">
    <div class="kv-section-head kv-reveal">
      <span class="kv-eyebrow">Site Layout &amp; Investment</span>
      <h2 class="kv-display kv-display--lg">Layout Plan &amp; Pricing</h2>
      <p class="kv-lede">The layout sets out defined residential plots, including a restaurant-themed cluster, within one gated boundary connected by wide internal roads.</p>
    </div>

    <div class="kv-unlock-grid">
      <div class="kv-unlock kv-reveal">
        <div class="kv-unlock__bg"><img src="{{ asset('assets/img/kv/unlock-price.webp') }}" alt="" aria-hidden="true" loading="lazy"></div>
        <svg class="lock" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.6" fill="currentColor"/></svg>
        <div>
          <h3>Unlock Price List</h3>
          <p>Share a few details to unlock the current, plot-wise price breakup.</p>
          <button type="button" class="kv-btn" data-kv-open="unlock" data-unlock="price">Unlock Now</button>
        </div>
      </div>

      <div class="kv-unlock kv-reveal">
        <div class="kv-unlock__bg"><img src="{{ asset('assets/img/kv/unlock-layout.webp') }}" alt="" aria-hidden="true" loading="lazy"></div>
        <svg class="lock" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.6" fill="currentColor"/></svg>
        <div>
          <h3>Unlock Layout Plan</h3>
          <p>Share a few details to unlock the full site layout and plot numbering.</p>
          <button type="button" class="kv-btn" data-kv-open="unlock" data-unlock="layout">Unlock Now</button>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ==================================================== BLOG ==================================================== --}}
@php
  $posts = \App\Models\Post::where('is_published', true)->latest('updated_at')->take(5)->get();
  $featured = $posts->first();
  $cards = $posts->slice(1)->values();
  if ($cards->count() < 3) { $cards = $posts->take(3); }

  $postSummary = function ($post) {
      $text = $post->meta_description ?: strip_tags($post->content ?? '');
      return \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', $text)), 150, '…');
  };
  $postImage = function ($post, $fallback = 'assets/img/kv/gallery-1440.webp') {
      return $post && $post->image ? asset('storage/'.$post->image) : asset($fallback);
  };

  $featuredTitle = $featured ? $featured->title : 'Notes from the Koru Ville';
  $featuredCopy = $featured ? $postSummary($featured) : 'Guides and location intelligence on residential plots near Jim Corbett, Kilawali and Kashipur.';
  $featuredUrl = $featured ? url('/blog/'.$featured->slug) : url('/blog');
  $featuredImage = $postImage($featured);
@endphp
<section class="kv-blog" id="blog" data-blog-slider>
  <div class="kv-blog__bg" data-blog-bg>
    <img src="{{ $featuredImage }}" alt="" aria-hidden="true" loading="lazy" class="is-active" data-blog-bg-img>
    <img alt="" aria-hidden="true" loading="lazy" data-blog-bg-img>
  </div>

  <div class="kv-blog__label kv-reveal">
    <span class="kv-eyebrow">Blog</span>
    <h2 class="kv-display">Explore the Blog</h2>
  </div>

  <div class="kv-blog__inner">
    <div class="kv-blog__feature kv-reveal" data-blog-feature
         data-title="{{ $featuredTitle }}"
         data-copy="{{ $featuredCopy }}"
         data-url="{{ $featuredUrl }}"
         data-image="{{ $featuredImage }}">
      <h3 class="kv-blog__heading" data-blog-title aria-live="polite">{{ $featuredTitle }}</h3>
      <p data-blog-copy>{{ $featuredCopy }}</p>
      <a href="{{ $featuredUrl }}" class="kv-btn kv-btn--outline kv-blog__cta" data-blog-cta>
        Read More
        <span class="kv-blog__cta-arrow" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </span>
      </a>
    </div>

    <div class="kv-blog__rail kv-reveal">
      <button type="button" class="kv-blog__arrow kv-blog__arrow--prev" data-prev aria-label="Previous article">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 19l-7-7 7-7"/></svg>
      </button>

      <div class="kv-blog__track" data-track>
        @forelse($cards as $post)
          <a class="kv-post" href="{{ url('/blog/'.$post->slug) }}"
             data-slide
             data-title="{{ $post->title }}"
             data-copy="{{ $postSummary($post) }}"
             data-url="{{ url('/blog/'.$post->slug) }}"
             data-image="{{ $postImage($post) }}">
            <div class="kv-post__media">
              @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" loading="lazy">
              @else
                <img src="{{ asset('assets/img/kv/gallery-900.webp') }}" alt="{{ $post->title }}" loading="lazy">
              @endif
            </div>
            <div class="kv-post__body">
              <svg class="kv-post__crown" viewBox="0 0 320 93" preserveAspectRatio="none" aria-hidden="true" focusable="false"><use href="#kv-crown-shape"/></svg>
              <h3>{{ \Illuminate\Support\Str::limit($post->title, 48) }}</h3>
              <span>{{ $post->updated_at?->format('M Y') }}</span>
            </div>
          </a>
        @empty
          <a class="kv-post" href="{{ url('/blog') }}">
            <div class="kv-post__media"><img src="{{ asset('assets/img/kv/gallery-900.webp') }}" alt="The Koru Ville blog" loading="lazy"></div>
            <div class="kv-post__body">
              <svg class="kv-post__crown" viewBox="0 0 320 93" preserveAspectRatio="none" aria-hidden="true" focusable="false"><use href="#kv-crown-shape"/></svg>
              <h3>Why Residential Plots Near Jim Corbett Hold Their Value</h3>
              <span>Insights</span>
            </div>
          </a>
        @endforelse
      </div>

      <button type="button" class="kv-blog__arrow kv-blog__arrow--next" data-next aria-label="Next article">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 5l7 7-7 7"/></svg>
      </button>

      <div class="kv-blog__dots" data-dots aria-hidden="true"></div>
    </div>
  </div>
</section>

{{-- ==================================================== MAP ==================================================== --}}
<section class="kv-panel kv-panel--cream2 kv-map" id="map">
  <div class="kv-shell">
    <div class="kv-section-head kv-reveal">
      <span class="kv-eyebrow">Virtual Tour</span>
      <h2 class="kv-display kv-display--lg">Walk the Site Before You Visit</h2>
      <p class="kv-lede">Explore the project's prime location in Kilawali on the map below, or book a private site visit for a guided tour.</p>
    </div>

    <div class="kv-reveal">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.9305532452545!2d78.9545938!3d29.314656299999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6bbfe6b542d9f67f%3A0x79cc09e76313c64a!2sThe%20KoruVille!5e1!3m2!1sen!2sin!4v1783059642503!5m2!1sen!2sin"
              referrerpolicy="no-referrer-when-downgrade" title="The Koru Ville location map" allowfullscreen loading="lazy"></iframe>
    </div>

    <div class="kv-map__link">
      <a href="https://maps.app.goo.gl/JKDBpER1bCGxZoM29" target="_blank" rel="noopener noreferrer" class="kv-link-arrow">
        Open in Google Maps
        <i><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></i>
      </a>
    </div>

    <div class="kv-map__chips">
      <span class="kv-chip">15 min drive to Phato Gate</span>
      <span class="kv-chip">Walking distance to Tumaria Dam</span>
      <span class="kv-chip">Guided site visits daily</span>
    </div>
  </div>
</section>

{{-- ================================================== REVIEWS ================================================== --}}
<section class="kv-reviews">
  <div class="kv-shell">
    <div class="kv-reviews__head kv-reveal">
      <svg class="kv-reviews__g" viewBox="0 0 48 48" aria-hidden="true">
        <path fill="#4285F4" d="M45 24c0-1.6-.1-2.8-.4-4H24v7.6h12c-.2 2-1.5 5-4.4 7l6.7 5.2C42.7 36.1 45 30.6 45 24Z"/>
        <path fill="#34A853" d="M24 46c6.2 0 11.4-2 15.3-5.6l-6.7-5.2c-1.9 1.3-4.4 2.2-8.6 2.2-5.9 0-10.9-3.9-12.7-9.3l-7 5.4C8.3 41.1 15.5 46 24 46Z"/>
        <path fill="#FBBC05" d="M11.3 28.1A13.8 13.8 0 0 1 10.6 24c0-1.4.2-2.8.6-4.1l-7-5.4A21.7 21.7 0 0 0 2 24c0 3.5.8 6.8 2.3 9.5l7-5.4Z"/>
        <path fill="#EA4335" d="M24 10.2c3.3 0 6 .9 8.2 2.9l6-6C34.5 3.5 29.8 2 24 2 15.5 2 8.3 6.9 4.3 14.5l7 5.4C13.1 14.1 18.1 10.2 24 10.2Z"/>
      </svg>
      <h2>Google Reviews</h2>
      <span class="kv-reviews__score">4.9</span>
      <div class="kv-reviews__stars" aria-label="5 out of 5 stars">
        @for($i=0;$i<5;$i++)<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 2 3 6.6 7 .9-5.2 5 1.4 7L12 18l-6.2 3.5 1.4-7L2 9.5l7-.9L12 2Z"/></svg>@endfor
      </div>
    </div>

    <div class="kv-reviews__rail kv-reveal" data-carousel>
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
            <p class="is-clamped">{{ $review['text'] }}</p>
            <button type="button" class="kv-review__more" data-review-more>Read more</button>
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
<section class="kv-panel kv-panel--cream kv-faq" id="faq">
  <div class="kv-shell">
    <div class="kv-section-head kv-reveal">
      <span class="kv-eyebrow">Common Questions</span>
      <h2 class="kv-display kv-display--lg">Frequently Asked Questions</h2>
    </div>

    <div class="kv-faq__box kv-reveal">
      @php
        $faqs = [
          ['What is The Koru Ville?', 'The Koru Ville is an upcoming resort-themed residential plotted township coming up in Kilawali, Uttarakhand, at the gateway to Jim Corbett National Park.'],
          ['Where exactly is the project located?', 'The Koru Ville is located in Kilawali, Uttarakhand — 244712, along the Kashipur–Ramnagar highway corridor.'],
          ['How far is the project from Jim Corbett National Park?', 'The Koru Ville is just 15 minutes by drive from Phato Gate, one of the few Jim Corbett safari gates open all year round, including through the monsoon season.'],
          ['What plot sizes are available?', 'The Koru Ville plots are available starting from 111 sq. yd, with additional sizes at 125 sq. yd and 139 sq. yd.'],
          ['Is the project suitable for full-time living or only weekend stays?', 'Both. With a school roughly 15 minutes away and a hospital around 34 minutes out, along with nearby rail and highway access, The Koru Ville is designed to support full-time residents as well as weekend and holiday owners.'],
        ];
      @endphp

      @foreach($faqs as $faq)
        <div class="kv-faq__item">
          <button type="button" class="kv-faq__q" aria-expanded="false">
            <span>{{ $faq[0] }}</span><i>+</i>
          </button>
          <div class="kv-faq__a">
            <div><p>{{ $faq[1] }}</p></div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ================================================== CONTACT ================================================== --}}
<section class="kv-panel kv-panel--cream2 kv-contact" id="contact">
  <div class="kv-shell">
    <div class="kv-contact__grid">
      <div class="kv-reveal">
        <span class="kv-eyebrow">Get In Touch</span>
        <h2>Plan a Private Visit</h2>
        <p>Plots near Jim Corbett are more than an investment — they're land you shape into a home on your own terms. Our team will help you shortlist a plot, walk the site and understand pricing — no pressure, just information.</p>

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

      <div class="kv-form kv-reveal">
        <form data-kv-form data-source="The Koru Ville Website — Contact Section" novalidate>
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
