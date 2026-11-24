@extends('layouts.kv')

@section('title', 'About The Koru Ville | Resort-Themed Plots Near Jim Corbett')
@section('description', 'The Koru Ville is a gated, resort-style plotted township in Kilawali, Udham Singh Nagar, on the Kashipur–Ramnagar road. It is about 15 minutes from Phato Gate, one of the Jim Corbett safari gates, and within walking distance of Tumaria Dam.')
@section('hero', '1')

@section('head')
<style>
  .kv-about-page {
    --paper: var(--kv-cream);
    --ink: #282b20;
    --olive: #4e572e;
    --inset: clamp(18px, 3.8vw, 54px);
    --gap: clamp(10px, 1.25vw, 18px);
    --radius: 16px;
    margin: var(--kv-frame-top) var(--kv-frame) 0;
    padding: max(0px, calc(var(--kv-header) + 16px - var(--kv-frame-top))) 0 40px;
    border-radius: var(--kv-radius) var(--kv-radius) 0 0;
    background: var(--paper);
    color: var(--ink);
    font: 400 1rem/1.55 var(--kv-font-display);
  }

  .kv-about-page .about-shell { max-width: 1320px; margin-inline: auto; padding-inline: max(0px, calc(clamp(12px, 3vw, 44px) - var(--kv-frame))); }
  .kv-about-page .about-body { padding: 0 var(--inset); }
  .kv-about-page section[id] { scroll-margin-top: 100px; }
  .kv-about-page :is(h1, h2, h3, p, figure) { margin: 0; }
  .kv-about-page :is(h1, h2, h3) {
    font-weight: 500;
    letter-spacing: -.035em;
    line-height: .97;
    text-transform: none;
  }

  .kv-about-page h2 { font-size: clamp(2.2rem, 4vw, 4.1rem); }
  .kv-about-page h2 + p { margin-top: 16px; }
  .kv-about-page img { display: block; width: 100%; height: 100%; object-fit: cover; }
  .kv-about-page .about-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: fit-content;
    min-height: 44px;
    padding: 8px 21px;
    border: 1px solid currentColor;
    border-radius: 999px;
    color: inherit;
    font: 600 .9rem/1.25 var(--kv-font-display);
    text-decoration: none;
    transition: background-color .2s, color .2s;
  }

  .kv-about-page .about-button:hover { background: var(--paper); color: var(--ink); }
  .kv-about-page :focus-visible { outline: 2px solid currentColor; outline-offset: 4px; }

  .kv-about-page .about-feature {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    border-radius: var(--radius);
    background: #24271c;
    color: #fffaf0;
  }

  .kv-about-page .about-backdrop,
  .kv-about-page .about-feature::after {
    position: absolute;
    inset: 0;
    z-index: -1;
  }

  .kv-about-page .about-feature::after { content: ""; }
  .kv-about-page .about-hero { --kv-diagonal-heading-size: clamp(2rem, 4.35vw, 4.7rem); }

  .kv-about-page .about-intro {
    display: grid;
    grid-template-columns: minmax(0, 1.85fr) minmax(0, 1fr);
    align-items: center;
    gap: clamp(22px, 4vw, 56px);
    padding-block: clamp(24px, 3vw, 42px) clamp(34px, 4vw, 58px);
  }

  .kv-about-page .about-cards { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: var(--gap); }
  .kv-about-page .about-card { position: relative; overflow: hidden; aspect-ratio: .91; border-radius: 12px; background: var(--olive); }
  .kv-about-page .about-card figcaption {
    position: absolute;
    inset: auto 0 0;
    padding: 28px 13px 13px;
    background: linear-gradient(transparent, #11160ef5);
    color: #fffaf0;
    font-weight: 600;
    line-height: 1.25;
  }

  .kv-about-page .about-intro h2 { font-size: clamp(2.1rem, 3.2vw, 3.4rem); }
  .kv-about-page .about-vision {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 2.65fr);
    align-items: center;
    gap: clamp(20px, 3vw, 42px);
    padding-top: clamp(26px, 3vw, 44px);
    border-top: 1px solid #dedacf;
  }

  .kv-about-page .about-vision h2 { font-size: clamp(2.1rem, 3.3vw, 3.4rem); }
  .kv-about-page .about-vision h2::after { content: ""; display: block; width: 55px; margin-top: 14px; border-bottom: 2px solid var(--olive); }
  .kv-about-page .about-photos { display: grid; grid-template-columns: 1.55fr 1fr .65fr; gap: var(--gap); height: clamp(230px, 27vw, 360px); }
  .kv-about-page .about-photos figure { overflow: hidden; border-radius: 12px; }
  .kv-about-page .about-feature {
    display: grid;
    grid-template-columns: minmax(215px, 1fr) minmax(0, 1.7fr);
    grid-template-areas: "facts heading" "description description";
    align-items: center;
    gap: clamp(20px, 3vw, 38px) clamp(24px, 5vw, 74px);
    margin-top: clamp(22px, 3vw, 40px);
    padding: clamp(18px, 3vw, 42px);
  }

  .kv-about-page .about-feature::after { background: linear-gradient(90deg, #15180f68, #17180fd4 58%, #18180f89); }
  .kv-about-page .about-facts { grid-area: facts; padding: clamp(15px, 2vw, 26px); border-radius: 12px; background: var(--paper); color: var(--ink); }
  .kv-about-page .about-facts img { height: clamp(100px, 12vw, 155px); border-radius: 8px; margin-bottom: 14px; }
  .kv-about-page .about-facts h3 { font-size: 1.8rem; }
  .kv-about-page .about-facts dl { margin: 12px 0 0; }
  .kv-about-page .about-facts dl div { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 3px 14px; padding-block: 7px; border-top: 1px solid #dedacf; font-size: .875rem; }
  .kv-about-page .about-facts dd { margin: 0; font-weight: 600; }
  .kv-about-page .about-feature-copy { grid-area: heading; }
  .kv-about-page .about-feature-description {
    grid-area: description;
    display: grid;
    grid-template-columns: minmax(0, 1.5fr) minmax(0, 1fr);
    gap: 14px clamp(20px, 4vw, 56px);
    padding: clamp(16px, 2.5vw, 30px);
    border: 1px solid #fffaf033;
    border-radius: 12px;
    background: #181b13eb;
  }
  .kv-about-page .about-feature .about-button { margin-top: 22px; }

  .kv-about-page .about-values {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1.45fr);
    align-items: start;
    gap: clamp(24px, 7vw, 104px);
    margin-block: clamp(32px, 5vw, 66px);
  }

  .kv-about-page .about-values figure { width: min(100%, 280px); aspect-ratio: 2.05; margin-top: 18px; overflow: hidden; border-radius: 10px; }
  .kv-about-page .about-values figure + p { max-width: 34ch; margin-top: 12px; }
  .kv-about-page .about-values details { border-bottom: 1px solid #bcbdb0; }
  .kv-about-page .about-values summary {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 14px 2px;
    cursor: pointer;
    list-style: none;
    font-weight: 600;
  }

  .kv-about-page summary::-webkit-details-marker { display: none; }
  .kv-about-page .about-values summary::after {
    content: "+";
    display: grid;
    flex: 0 0 25px;
    height: 25px;
    place-items: center;
    border: 1px solid #a4a692;
    border-radius: 50%;
    line-height: 1;
  }

  .kv-about-page .about-values details[open] summary::after { content: "−"; }
  .kv-about-page .about-values details p { max-width: 54ch; padding: 0 14px 16px 2px; }

  .kv-about-page .about-gallery { padding: clamp(14px, 2vw, 26px); border-radius: var(--radius); background: #e4e7d8; }
  .kv-about-page .about-gallery h2 { margin-bottom: 14px; text-align: center; }
  .kv-about-page .about-mosaic {
    display: grid;
    grid-template-columns: minmax(0, .85fr) minmax(0, 1.1fr) minmax(0, 1fr) minmax(0, .7fr);
    grid-template-rows: repeat(2, minmax(0, 1fr));
    gap: clamp(5px, .65vw, 9px);
    height: clamp(180px, 32vw, 390px);
  }

  .kv-about-page .about-mosaic figure { overflow: hidden; border-radius: 8px; }
  .kv-about-page .about-mosaic figure:first-child { grid-row: span 2; }
  .kv-about-page .about-mosaic figure:nth-child(3),
  .kv-about-page .about-mosaic figure:nth-child(4) { grid-column: span 2; }
  .kv-about-page .about-gallery-footer { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 8px 16px; margin-top: 12px; }

  @media (max-width: 900px) {
    .kv-about-page .about-intro { grid-template-columns: 1fr; }
    .kv-about-page .about-card { aspect-ratio: 1.25; }
  }

  @media (max-width: 640px) {
    .kv-about-page { --inset: 8px; }
    .kv-about-page .about-card { aspect-ratio: .78; }
    .kv-about-page .about-card figcaption { padding-inline: 7px; font-size: .875rem; }
    .kv-about-page :is(.about-vision, .about-feature, .about-values) { grid-template-columns: 1fr; }
    .kv-about-page .about-photos { height: clamp(155px, 48vw, 255px); }
    .kv-about-page .about-feature::after { background: #16180f9e; }
    .kv-about-page .about-feature { grid-template-areas: "heading" "description" "facts"; }
    .kv-about-page .about-feature-description { grid-template-columns: 1fr; }
    .kv-about-page .about-mosaic { height: clamp(160px, 55vw, 270px); }
    .kv-about-page .about-gallery-footer { justify-content: center; text-align: center; }
  }
</style>
@include('partials.kv.diagonal-hero-styles')
@endsection

@section('content')
@php
  $imagePath = 'assets/img/kv/';
  $cards = [
    ['why-1040.webp', 'Landscaped clubhouse and pool', 'In Harmony with Nature'],
    ['kr2.webp', 'Architectural rendering of the planned villas', 'Thoughtfully Planned'],
    ['about-1000.webp', 'Villa set among trees at dusk', 'A Quieter Way to Live'],
  ];
  $gallery = [
    ['plot-1-860.webp', 'Villa and its landscaped entrance'],
    ['why-1040.webp', 'Clubhouse pool surrounded by greenery'],
    ['gallery-1920.webp', 'Aerial rendering of the township masterplan'],
    ['gallery-1440.webp', 'Villa and gardens at dusk'],
    ['plot-2-860.webp', 'A villa framed by forested hills'],
  ];
@endphp

<div class="kv-about-page">
  <section class="about-hero kv-diagonal-hero" aria-labelledby="about-title">
    <div class="kv-diagonal-hero-copy">
      <span class="kv-diagonal-hero-label">About The Koru Ville</span>
      <h1 id="about-title">A Resort Style Community <span>at the Gateway to Jim Corbett</span></h1>
      <p>The Koru Ville is a gated, resort-style plotted township in Kilawali, Udham Singh Nagar, on the Kashipur–Ramnagar road. It is about 15 minutes from Phato Gate, one of the Jim Corbett safari gates, and within walking distance of Tumaria Dam.</p>
      <div class="kv-diagonal-hero-actions">
        <a class="kv-btn kv-btn--olive" href="#identity">Explore The Koru Ville</a>
      </div>
    </div>
    <img class="kv-diagonal-hero-image" src="{{ asset($imagePath.'gallery-1440.webp') }}"
         srcset="{{ asset($imagePath.'gallery-900.webp') }} 900w, {{ asset($imagePath.'gallery-1440.webp') }} 1440w"
         sizes="(max-width: 720px) 100vw, 56vw" width="1440" height="612"
         alt="Architectural rendering of a villa among landscaped grounds" fetchpriority="high">
  </section>

  <div class="about-shell">
    <div class="about-body">
      <section class="about-intro" id="identity" aria-labelledby="about-intro-title">
        <div class="about-cards">
          @foreach ($cards as [$file, $alt, $caption])
            <figure class="about-card">
              <img src="{{ asset($imagePath.$file) }}" alt="{{ $alt }}" loading="lazy" decoding="async">
              <figcaption>{{ $caption }}</figcaption>
            </figure>
          @endforeach
        </div>
        <div>
          <h2 id="about-intro-title">The meaning of Koru.</h2>
          <p>Koru is a Māori word for the unfurling fern frond, a symbol of new beginnings.</p>
        </div>
      </section>

      <section class="about-vision" aria-labelledby="about-vision-title">
        <div>
          <h2 id="about-vision-title">Discover life at a slower pace.</h2>
          <p>The township sits on the Kashipur–Ramnagar road, within walking distance of Tumaria Dam.</p>
        </div>
        <div class="about-photos">
          <figure><img src="{{ asset($imagePath.'plot-1-860.webp') }}" alt="Villa and garden in the morning light" loading="lazy" decoding="async"></figure>
          <figure><img src="{{ asset($imagePath.'why-1040.webp') }}" alt="Clubhouse and pool rendering" loading="lazy" decoding="async"></figure>
          <figure><img src="{{ asset($imagePath.'plot-2-860.webp') }}" alt="Forested hills behind a villa" loading="lazy" decoding="async"></figure>
        </div>
      </section>

      <section class="about-feature" aria-labelledby="about-feature-title">
        <img class="about-backdrop" src="{{ asset($imagePath.'gallery-1440.webp') }}" alt="" loading="lazy" decoding="async">
        <div class="about-feature-copy">
          <h2 id="about-feature-title">A place to belong.<br>A life to rediscover.</h2>
          <a class="about-button" href="{{ route('amenities') }}">Explore the amenities</a>
        </div>
        <p class="about-feature-description">
          <span>Choose one of three plot categories, 111, 125 or 139 sq. yd, and the Koru Ville team builds a duplex villa to that category’s fixed design within two years of purchase. Every villa design includes a private pool, and residents share a clubhouse and a common pool across the 3.5-acre township.</span>
          <span>Planned as a second home near Jim Corbett for families in Delhi NCR and other cities, it comes with owner stay days and a managed rental model, while the project team handles upkeep.</span>
        </p>
        <div class="about-facts">
          <img src="{{ asset($imagePath.'gallery-1920.webp') }}" alt="Aerial rendering of the township" loading="lazy" decoding="async">
          <h3>The project at a glance</h3>
          <dl>
            <div><dt>Location</dt><dd>Kilawali, Uttarakhand</dd></div>
            <div><dt>Township</dt><dd>3.5 acres</dd></div>
            <div><dt>Phato Gate</dt><dd>About 15 minutes away</dd></div>
          </dl>
        </div>
      </section>

      <section class="about-values" aria-labelledby="about-values-title">
        <div>
          <h2 id="about-values-title">Thoughtful spaces.<br>Natural connections.</h2>
          <figure><img src="{{ asset($imagePath.'why-1040.webp') }}" alt="Landscaping around the clubhouse and pool" loading="lazy" decoding="async"></figure>
          <p>Space for quiet mornings, time outdoors and weekends with family.</p>
        </div>
        <div>
          <details name="about-values" open>
            <summary>How does the plan make room for nature?</summary>
            <p>Landscaped open spaces and wide internal roads connect homes with the township’s green surroundings.</p>
          </details>
          <details name="about-values">
            <summary>What kinds of plots are planned?</summary>
            <p>The gated township offers plots of 111, 125 or 139 sq. yd, each with a fixed duplex-villa design.</p>
          </details>
          <details name="about-values">
            <summary>What amenities are planned?</summary>
            <p>Each villa design has a private pool. Residents share a clubhouse and common pool.</p>
          </details>
          <details name="about-values">
            <summary>Where is The Koru Ville located?</summary>
            <p>The township sits in Kilawali on the Kashipur–Ramnagar road, within walking distance of Tumaria Dam and about 15 minutes from Phato Gate.</p>
          </details>
        </div>
      </section>

      <section class="about-gallery" aria-labelledby="about-gallery-title">
        <h2 id="about-gallery-title">Gallery</h2>
        <div class="about-mosaic">
          @foreach ($gallery as [$file, $alt])
            <figure><img src="{{ asset($imagePath.$file) }}" alt="{{ $alt }}" loading="lazy" decoding="async"></figure>
          @endforeach
        </div>
        <div class="about-gallery-footer">
          <p>A look at the villas, landscape and planned community spaces.</p>
          <a class="about-button" href="{{ url('/') }}#gallery">View the full gallery</a>
        </div>
      </section>
    </div>
  </div>

</div>
@endsection
