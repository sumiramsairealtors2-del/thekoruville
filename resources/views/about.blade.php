@extends('layouts.kv')

@section('title', 'About The Koru Ville | Resort-Themed Plots Near Jim Corbett')
@section('description', 'The Koru Ville is a gated, resort-style plotted township in Kilawali, Udham Singh Nagar, on the Kashipur–Ramnagar road. It is about 15 minutes from Phato Gate, one of the Jim Corbett safari gates, and within walking distance of Tumaria Dam.')
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
        The Koru Ville is a gated, resort-style plotted township in Kilawali, Udham Singh Nagar, on the Kashipur–Ramnagar road. It is about 15 minutes from Phato Gate, one of the Jim Corbett safari gates, and within walking distance of Tumaria Dam.
      </p>

      <div class="kv-about-page__details">
        <div class="kv-about-page__topics" data-mv-group="90">
          <section class="kv-about-page__topic" data-mv="up">
            <h2>A Resort Style Community at the Gateway to Jim Corbett</h2>
            <p>Welcome to The Koru Ville Kilawali &mdash; an exclusive resort style community of plots and villas in Kashipur, Uttarakhand, just 15 minutes by drive from Phato Gate, one of the Jim Corbett safari gates.</p>
            <p>Choose one of three plot categories, 111, 125 or 139 sq. yd, and the Koru Ville team builds a duplex villa to that category’s fixed design within two years of purchase. Every villa design includes a private pool, and residents share a clubhouse and a common pool across the 3.5-acre township. Planned as a second home near Jim Corbett for families in Delhi NCR and other cities, it comes with owner stay days and a managed rental model, while the project team handles upkeep.</p>
            <p>Koru is a Māori word for the unfurling fern frond, a symbol of new beginnings.</p>
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
    </div>
  </section>

  <section class="kv-panel kv-panel--olive" id="kilawali">
    <div class="kv-split">
      <div class="kv-split__media" data-mv="scale">
        <img src="{{ asset('assets/img/koru_villa_1.webp') }}"
             width="1408" height="768"
             alt="Illustration of the hills and reservoir near Kilawali" loading="lazy" data-mv-parallax="36">
      </div>

      <div class="kv-split__body" data-mv-group="80">
        <div class="kv-loc-crown__slot">
          <button class="kv-loc-crown__btn" id="kvLocCrownBtn" type="button" aria-expanded="false" aria-controls="kvLocCrownPanel" aria-label="Explore nearby places">
            @include('partials.kv.crown', ['shapeClass' => 'kv-loc-crown__shape', 'shapeVariant' => 'tab-side'])
            <svg class="kv-loc-crown__arrow" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M11 4v10.17l-5.59-5.58L4 10l8 8 8-8-1.41-1.41L13 14.17V4z"/></svg>
          </button>
        </div>
        <span class="kv-eyebrow" data-mv="fade">Why This Location</span>
        <h2 class="kv-display kv-display--lg kv-display--light" data-mv="words">Kilawali: Close to the Forest, Connected to What Matters</h2>
        <p data-mv="blur">Kilawali offers a perfect balance of being close to the forest without feeling disconnected from everyday convenience. Existing at a prime location along the highway corridor, the beautiful village connects directly to the Phato Gate of Jim Corbett and allows access to Kashipur markets, hospitals, and the railway station. Unlike deeper forest belt locations where connectivity can become a compromise, or more established areas near Ramnagar where land is increasingly limited, Kilawali sits comfortably between nature, accessibility, and opportunity. Nainital, Bhimtal, Sattal and Mukteshwar are among the Kumaon hill stations near Kashipur that families can pair with a Corbett getaway.</p>
      </div>

      {{-- green take-over panel: sweeps in right → left over the whole split --}}
      <div class="kv-loc-crown__panel" id="kvLocCrownPanel" aria-hidden="true">
        <button class="kv-loc-crown__close" type="button" aria-label="Close location details">
          <svg viewBox="0 0 14 14" aria-hidden="true" focusable="false"><path d="M1 1l12 12M13 1L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/></svg>
        </button>
        <div class="kv-loc-crown__panel-inner">
          <div class="kv-legacy-grid">
            <article>
              <h3>Nature and wildlife</h3>
              <dl>
                <div>
                  <dt>Phato Gate (Phato safari zone, Jim Corbett)</dt>
                  <dd>about 15 minutes by drive</dd>
                </div>
                <div>
                  <dt>Tumaria Dam</dt>
                  <dd>Walking distance</dd>
                </div>
                <div>
                  <dt>Garjia Devi Temple</dt>
                  <dd>Short drive</dd>
                </div>
              </dl>
            </article>
            <article>
              <h3>Everyday Essentials</h3>
              <dl>
                <div>
                  <dt>Nearest School</dt>
                  <dd>about 15 minutes</dd>
                </div>
                <div>
                  <dt>AIIMS Hospital</dt>
                  <dd>about 34 minutes</dd>
                </div>
                <div>
                  <dt>Kashipur Town</dt>
                  <dd>about 22 km</dd>
                </div>
              </dl>
            </article>
            <article>
              <h3>Rail and Air</h3>
              <dl>
                <div>
                  <dt>Gaushala Railway Station</dt>
                  <dd>about 11 km</dd>
                </div>
                <div>
                  <dt>Kashipur Junction</dt>
                  <dd>about 20 km</dd>
                </div>
                <div>
                  <dt>Ramnagar Railway Station</dt>
                  <dd>about 23 km</dd>
                </div>
                <div>
                  <dt>Pantnagar Airport</dt>
                  <dd>about 66 km</dd>
                </div>
              </dl>
            </article>
            <article>
              <h3>Delhi NCR and Hill Stations Near Kashipur</h3>
              <dl>
                <div>
                  <dt>Delhi NCR</dt>
                  <dd>roughly 5&ndash;6 hrs by road</dd>
                </div>
                <div>
                  <dt>Kashipur&ndash;Ramnagar Highway</dt>
                  <dd>Direct corridor</dd>
                </div>
                <div>
                  <dt>Nainital</dt>
                  <dd>about 56 km</dd>
                </div>
              </dl>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="kv-panel kv-panel--cream kv-legacy-section" id="strategic-location">
    <div class="kv-shell">
      <div class="kv-section-head">
        <span class="kv-eyebrow">Strategic Location</span>
        <h2 class="kv-display kv-display--md">The Koru Ville's Strategic Location in Uttarakhand</h2>
        <p class="kv-lede">A location matters for any real estate purchase, and The Koru Ville sits on the Kashipur&ndash;Ramnagar corridor at the gateway to Jim Corbett, in Kilawali, Udham Singh Nagar district. Key places around the project include Phato Gate, a Jim Corbett safari entry point in the Phato safari zone that is listed as open through the year (please check current dates on the official booking portal); Tumaria Dam, within walking distance; and Kashipur town, about 20 km away, which gives residents access to daily necessities, healthcare facilities such as AIIMS, and other major amenities.</p>
      </div>
      <div class="kv-legacy-grid">
        <article>
          <h3>Photo Safari Gate</h3>
          <dl>
            <div>
              <dt>Safari zone</dt>
              <dd>Phato zone, listed as open through the year</dd>
            </div>
            <div>
              <dt>Dates</dt>
              <dd>Check the official booking portal</dd>
            </div>
          </dl>
        </article>
        <article>
          <h3>Tumaria Dam</h3>
          <dl>
            <div>
              <dt>Position</dt>
              <dd>Adjacent to the project</dd>
            </div>
          </dl>
        </article>
        <article>
          <h3>Kashipur Town</h3>
          <dl>
            <div>
              <dt>Distance</dt>
              <dd>~20 km</dd>
            </div>
            <div>
              <dt>Access to</dt>
              <dd>Markets, AIIMS &amp; healthcare</dd>
            </div>
          </dl>
        </article>
        <article>
          <h3>Sitabani Reserve Forest</h3>
          <dl>
            <div>
              <dt>Distance</dt>
              <dd>about 10 km from Ramnagar</dd>
            </div>
            <div>
              <dt>Access to</dt>
              <dd>Corbett Tiger Reserve, for walks and birdwatching</dd>
            </div>
          </dl>
        </article>
      </div>
    </div>
  </section>

  <section class="kv-panel kv-panel--cream kv-legacy-section" id="connectivity">
    <div class="kv-shell">
      <div class="kv-section-head">
        <span class="kv-eyebrow">Why Invest Here</span>
        <h2 class="kv-display kv-display--md">Why Invest in Residential Plots Near Jim Corbett & Kashipur?</h2>
        <p class="kv-lede">Kilawali already sits on a working road network. National highways link it to Delhi-NCR, Moradabad, Kashipur and Ramnagar, Ramnagar’s railway station gives it a direct rail connection to the capital, and Pantnagar Airport is a short drive away for domestic flights.</p>
        <p class="kv-lede">Rail connectivity has also improved. The Ramnagar–Dehradun Express, the first direct express between Ramnagar and Dehradun, was flagged off in July 2026 and halts at Kashipur, Roshanpur, Pipalsana, Moradabad, Najibabad and Haridwar, linking the Kumaon and Garhwal regions by rail. A road connectivity project through Moradabad, Kashipur and Ramnagar, and tourism infrastructure upgrades around Ramnagar, have also been proposed, and their timelines rest with the authorities concerned.</p>
      </div>
    </div>
  </section>

  <section class="kv-panel kv-panel--cream kv-legacy-section" id="why-invest">
    <div class="kv-shell">
      <div class="kv-section-head">
        <span class="kv-eyebrow">What's Ahead</span>
        <h2 class="kv-display kv-display--md">The Ramnagar Dehradun Express and Connectivity Around Ramnagar</h2>
        <p class="kv-lede">Kilawali already sits on a working road network &mdash; national highways link it to Delhi-NCR, Moradabad, Kashipur and Ramnagar, Ramnagar's railway station gives it a direct rail connection to the capital, and Pantnagar Airport is a short drive away for domestic flights.</p>
        <p class="kv-lede">Rail connectivity has also improved. The Ramnagar&ndash;Dehradun Express, the first direct express train between Ramnagar and Dehradun, was flagged off in July 2026 and halts at Kashipur, Moradabad, Najibabad and Haridwar, linking the Kumaon and Garhwal regions by rail. Kashipur Junction and Ramnagar are among the Uttarakhand stations being redeveloped. A road connectivity project to improve access from Delhi-NCR and western Uttar Pradesh through Moradabad, Kashipur and Ramnagar, and tourism infrastructure upgrades around Ramnagar, have also been proposed, and their timelines rest with the authorities concerned.</p>
        <p class="kv-lede">A planned expressway linking Ramnagar and Dehradun would open direct connectivity to the Kumaon and Garhwal regions, an upcoming road connectivity project aims to improve access from Delhi-NCR and western Uttar Pradesh through Moradabad, Kashipur and Ramnagar, and tourism infrastructure upgrades are proposed in and around Ramnagar to expand hospitality and convention facilities in the belt.</p>
      </div>
    </div>
  </section>

  <section class="kv-panel kv-panel--cream kv-legacy-section" id="who-invests">
    <div class="kv-shell">
      <div class="kv-section-head">
        <span class="kv-eyebrow">Who It Suits</span>
        <h2 class="kv-display kv-display--md">What Kind of Second Home Are You Looking For?</h2>
        <p class="kv-lede">A second home investment earns its value based on how you use your real estate asset on leisure days. Some families often visit to feel like guests in their holiday homes, while others prefer them for kids’ summer holidays, festivals, and long weekends. They do not need to worry about making packing lists and advance bookings. This resort-themed plotting project is one of the good places to invest in Uttarakhand real estate that is solely dedicated to villa owners.</p>
        <p class="kv-lede">From confirmation on the villa design to sharing common amenities with other residents, it creates a harmonious community in the heart of Uttarakhand. Once you agree to the terms and conditions, our sales team will describe to you the second home investment project that reflects your lifestyle and budget.</p>
      </div>
      <div class="kv-legacy-grid">
        <article>
          <h3>Weekend Home Seekers from Any City</h3>
          <p>Whether you live in Delhi-NCR, Mumbai, Bengaluru, Jaipur, Lucknow, or any other major city, The Koru Ville offers a weekend home near Jim Corbett in Uttarakhand.</p>
        </article>
        <article>
          <h3>Wildlife and nature enthusiasts</h3>
          <p>If you like wildlife adventures, a weekend home near Jim Corbett offers an opportunity for a jungle safari close to Phato Gate.</p>
        </article>
        <article>
          <h3>Retirees</h3>
          <p>Make your retirement plan memorable by booking a quiet, lush green villa with access to all daily essentials.</p>
        </article>
        <article>
          <h3>NRIs and outstation buyers</h3>
          <p>Diversify your real estate portfolio with a second home investment that is managed well, even if you’re settled abroad.</p>
        </article>
        <article>
          <h3>Multi-generation families</h3>
          <p>Book a property for sale in Uttarakhand for family gatherings that suits all generations. It is equipped with a play area, a jogging track, and a common pool on the site.</p>
        </article>
        <article>
          <h3>Patient, long-term buyers</h3>
          <p>If you are comfortable holding property with documented paperwork for years and plan to use it yourself, this project is perfectly suitable for you.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="kv-about-page__visit" aria-labelledby="about-visit-title">
    <div class="kv-shell">
      <div class="kv-about-page__visit-panel">
        <div data-mv="up">
          <p class="kv-about-page__label">Get In Touch</p>
          <h2 id="about-visit-title">Plan a Private Visit</h2>
          <p>Plots near Jim Corbett National Park are more than just an investment — Buyers and investors have a chance to build a luxury villa that reflects their lifestyle. The Koru Ville is a thoughtfully designed thematic township for those seeking a closer connection to nature and a welcome escape from the city’s hustle. Our team will help you explore suitable plots, experience the site personally, and understand the pricing clearly.</p>
          <button type="button" class="kv-btn kv-btn--olive" data-kv-open="enquiry">Book a Site Visit</button>
          <a href="{{ url('/amenities') }}" class="kv-btn kv-btn--gold">Explore Amenities <span aria-hidden="true">→</span></a>
        </div>

        <div class="kv-about-page__contact" data-mv="up" data-mv-delay="100">
          <p><strong>The Koru Ville</strong><br>Kilawali, Kashipur, Uttarakhand – 244712</p>
          <p><strong>Corporate Office</strong><br>G-192, Sector 63, Noida, Uttar Pradesh – 201301</p>
          <p><a href="mailto:info@thekoruville.com">info@thekoruville.com</a><br><a href="tel:+918377000300">+91 8377 000300</a></p>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
