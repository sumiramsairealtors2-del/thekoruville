@extends('layouts.kv')

@section('title', 'About The Koru Ville | Resort-Themed Plots Near Jim Corbett')
@section('description', 'The Koru Ville is a gated community of plots with a resort-themed concept at the gateway to Jim Corbett National Park, Kilawali, Kashipur, Uttarakhand.')
@section('hero', '1')

@section('content')

<div class="kv-about-page">
  <section class="kv-about-page__story" aria-labelledby="about-title">
    <div class="kv-shell">
      <h1 id="about-title" class="kv-about-page__title" data-mv="words">About The Koru Ville</h1>

      <figure class="kv-about-page__image kv-about-page__image--hero" data-mv="scale">
        <img src="{{ asset('assets/img/kv/gallery-1440.webp') }}"
             srcset="{{ asset('assets/img/kv/gallery-900.webp') }} 900w, {{ asset('assets/img/kv/gallery-1440.webp') }} 1440w, {{ asset('assets/img/kv/gallery-1920.webp') }} 1920w"
             sizes="(max-width: 1240px) calc(100vw - 60px), 1180px"
             width="1440" height="612" fetchpriority="high"
             alt="Architectural rendering of The Koru Ville villas and landscaped grounds">
      </figure>

      <p class="kv-about-page__intro" data-mv="up">
        Nestled amidst the pristine beauty of the Jim Corbett region, The Koru Ville is designed for those who seek serenity without compromising on modern comforts. Every element reflects elegance, exclusivity, and a deep connection with nature — creating a destination that inspires peaceful living and lasting memories.
      </p>

      <div class="kv-about-page__details">
        <div class="kv-about-page__topics" data-mv-group="90">
          <section class="kv-about-page__topic" data-mv="up">
            <p class="kv-about-page__label">Our Concept</p>
            <h2>Where Nature Inspires Every Luxury</h2>
            <p>At The Koru Ville, every detail is thoughtfully designed to create a harmonious blend of luxury, nature, and timeless living. Nestled amidst the pristine landscapes of Kilawali, near the enchanting wilderness of Jim Corbett, the community offers an exclusive collection of villas surrounded by lush greenery, tranquil water features, tree-lined pathways, and beautifully landscaped open spaces.</p>
          </section>

          <section class="kv-about-page__topic" data-mv="up">
            <p class="kv-about-page__label">Location Highlights</p>
            <h2>At the Gateway to Jim Corbett</h2>
            <p>Just 15 minutes by drive from Phato Gate — frame your finest moments at one of Jim Corbett's most sought-after safari entry points. Tumaria Dam offers calm waters and endless views, just a walk away. Wild trails are a 15-minute drive from your doorstep.</p>
          </section>
        </div>

        <figure class="kv-about-page__image kv-about-page__image--detail" data-mv="scale">
          <img src="{{ asset('assets/img/kv/why-800.webp') }}"
               srcset="{{ asset('assets/img/kv/why-520.webp') }} 520w, {{ asset('assets/img/kv/why-800.webp') }} 800w, {{ asset('assets/img/kv/why-1040.webp') }} 1040w"
               sizes="(max-width: 800px) calc(100vw - 60px), 40vw"
               width="1040" height="1040" loading="lazy" decoding="async"
               alt="Architectural rendering of a villa against the wooded hills near Jim Corbett">
        </figure>
      </div>

      <div class="kv-about-page__topics kv-about-page__topics--closing" data-mv-group="90">
        <section class="kv-about-page__topic" data-mv="up">
          <p class="kv-about-page__label">Connectivity</p>
          <h2>Easy Access from Every Direction</h2>
          <p>5 hrs from Indira Gandhi International Airport · 1.5 hrs from Pantnagar Airport. Connectivity from all major railway stations through Kashipur &amp; Moradabad. 30 min drive from Kashipur · 4 hrs drive from New Delhi.</p>
        </section>

        <section class="kv-about-page__topic" data-mv="up">
          <p class="kv-about-page__label">The Promise</p>
          <h2>Beyond a Home. A Life Surrounded by Nature.</h2>
          <p>More than just a destination, The Koru Ville is a lifestyle defined by elegance, privacy, and timeless living. Every villa blends contemporary architecture with the serenity of its natural surroundings — a sanctuary where every sunrise feels refreshing and every moment feels extraordinary.</p>
        </section>
      </div>
    </div>
  </section>

  <section class="kv-about-page__visit" aria-labelledby="about-visit-title">
    <div class="kv-shell">
      <div class="kv-about-page__visit-panel">
        <div data-mv="up">
          <p class="kv-about-page__label">Get in Touch</p>
          <h2 id="about-visit-title">Plan Your Private Visit</h2>
          <p>Plots near Jim Corbett are more than an investment — they're land you shape into a home on your own terms. Our team will help you shortlist a plot, walk the site and understand pricing — no pressure, just information.</p>
          <a href="{{ url('/amenities') }}" class="kv-btn kv-btn--gold">Explore Amenities <span aria-hidden="true">→</span></a>
        </div>

        <div class="kv-about-page__contact" data-mv="up" data-mv-delay="100">
          <p><strong>The Koru Ville</strong><br>Kilawali, Kashipur, Uttarakhand – 244712</p>
          <p><strong>Corporate Office</strong><br>G-192 Sector 63 Noida, Uttar Pradesh 201301</p>
          <p><a href="mailto:info@thekoruville.com">info@thekoruville.com</a><br><a href="tel:+918377000300">+91-8377000300</a></p>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
