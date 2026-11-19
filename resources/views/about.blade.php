@extends('layouts.kv')

@section('title', 'About The Koru Ville | Resort-Themed Plots Near Jim Corbett')
@section('description', 'The Koru Ville is a gated community of plots with a resort-themed concept at the gateway to Jim Corbett National Park, Kilawali, Kashipur, Uttarakhand.')
@section('hero', '1')

@section('content')

<div class="kv-subpage">

  {{-- ABOUT HERO + INTRO (image design pattern) --}}
  <section class="kv-about-hero">
    <div class="kv-shell">
      <h1 class="kv-about-hero__title" data-mv="words">About The Koru Ville</h1>
      <img src="{{ asset('assets/img/slots/hero-02-desktop-1920x1080.webp') }}"
           alt="The Koru Ville resort-themed township at Kilawali"
           class="kv-about-hero__image"
           loading="lazy"
           data-mv-parallax="20">

      <p class="kv-about-hero__lede" data-mv="blur">
        Nestled amidst the pristine beauty of the Jim Corbett region, The Koru Ville is designed for those who seek serenity without compromising on modern comforts. Every element reflects elegance, exclusivity, and a deep connection with nature — creating a destination that inspires peaceful living and lasting memories.
      </p>
    </div>
  </section>

  {{-- GRID SECTIONS (What we do / Our Vehicles / Accessibility / Our team pattern) --}}
  <section class="kv-panel kv-panel--cream kv-about-grid-section">
    <div class="kv-shell">
      <div class="kv-about-grid" data-mv-group="140">

        <div class="kv-about-card" data-mv="up">
          <span class="kv-about-card__label">Our Concept</span>
          <h3 class="kv-about-card__title">Where Nature Inspires Every Luxury</h3>
          <p class="kv-about-card__body">
            At The Koru Ville, every detail is thoughtfully designed to create a harmonious blend of luxury, nature, and timeless living. Nestled amidst the pristine landscapes of Kilawali, near the enchanting wilderness of Jim Corbett, the community offers an exclusive collection of villas surrounded by lush greenery, tranquil water features, tree-lined pathways, and beautifully landscaped open spaces.
          </p>
        </div>

        <div class="kv-about-card" data-mv="up">
          <span class="kv-about-card__label">Location Highlights</span>
          <h3 class="kv-about-card__title">At the Gateway to Jim Corbett</h3>
          <p class="kv-about-card__body">
            Just 15 minutes by drive from Phato Gate — frame your finest moments at one of Jim Corbett's most sought-after safari entry points. Tumaria Dam offers calm waters and endless views, just a walk away. Wild trails are a 15-minute drive from your doorstep.
          </p>
        </div>

        <div class="kv-about-card" data-mv="up">
          <span class="kv-about-card__label">Connectivity</span>
          <h3 class="kv-about-card__title">Easy Access from Every Direction</h3>
          <p class="kv-about-card__body">
            5 hrs from Indira Gandhi International Airport · 1.5 hrs from Pantnagar Airport. Connectivity from all major railway stations through Kashipur &amp; Moradabad. 30 min drive from Kashipur · 4 hrs drive from New Delhi.
          </p>
        </div>

        <div class="kv-about-card" data-mv="up">
          <span class="kv-about-card__label">The Promise</span>
          <h3 class="kv-about-card__title">Beyond a Home. A Life Surrounded by Nature.</h3>
          <p class="kv-about-card__body">
            More than just a destination, The Koru Ville is a lifestyle defined by elegance, privacy, and timeless living. Every villa blends contemporary architecture with the serenity of its natural surroundings — a sanctuary where every sunrise feels refreshing and every moment feels extraordinary.
          </p>
        </div>

      </div>
    </div>
  </section>

  {{-- BOTTOM CTA (bottom banner pattern) --}}
  <section class="kv-panel kv-about-cta">
    <div class="kv-shell">
      <div class="kv-about-cta__inner" data-mv-group="120">
        <div class="kv-about-cta__copy" data-mv="left">
          <span class="kv-about-cta__label">Get in Touch</span>
          <h2 class="kv-about-cta__title" data-mv="words">Plan Your Private Visit</h2>
          <p class="kv-about-cta__lede" data-mv="blur">
            Plots near Jim Corbett are more than an investment — they're land you shape into a home on your own terms. Our team will help you shortlist a plot, walk the site and understand pricing — no pressure, just information.
          </p>
          <div class="kv-about-cta__meta" data-mv="fade" data-mv-delay="100">
            <p><strong>The Koru Ville</strong>, Kilawali, Kashipur, Uttarakhand – 244712</p>
            <p>Corporate Office: G-192 Sector 63 Noida, Uttar Pradesh 201301</p>
            <p><a href="mailto:info@thekoruville.com">info@thekoruville.com</a> &nbsp;·&nbsp; <a href="tel:+918377000300">+91-8377000300</a></p>
          </div>
        </div>
        <div class="kv-about-cta__action" data-mv="right" data-mv-delay="160" data-mv-magnet="10">
          <a href="{{ url('/amenities') }}" class="kv-btn kv-btn--olive kv-btn--block">Explore Amenities <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </div>
  </section>

</div>

@endsection
