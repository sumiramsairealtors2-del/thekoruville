{{-- Header: olive crown + centred logo plaque, links float over the hero --}}
<header class="kv-header{{ !empty($solid) ? ' kv-header--solid' : '' }}" id="kvHeader">


  <div class="kv-crown" aria-hidden="false">
    {{-- Inline path (NOT a <use>): symbol+viewBox compounds transforms twice in Chrome.
         viewBox covers the path's native frame; the plaque's flat band is the shape's top. --}}
    <svg class="kv-crown__shape" viewBox="185.19 27.72 522 70.74" preserveAspectRatio="none" aria-hidden="true" focusable="false">
      <path d="M707.17,27.73H185.19v11.83h96.82c19.03,1.18,34.56,12.92,45.28,31.17,9.19,15.67,25.07,27.62,42.02,27.63l145.93.1c18.41.01,33.57-13.18,43.27-30.25,9.54-16.79,24.76-28.18,42.47-28.66h106.2v-11.83Z"/>
    </svg>

    <a class="kv-crown__tab" href="{{ url('/') }}" aria-label="The Koru Ville — home">
      <img src="{{ asset('assets/img/Logo.webp') }}" alt="The Koru Ville" width="1093" height="589">
    </a>
  </div>

  <nav class="kv-nav kv-nav--left" aria-label="Primary">
    <a href="{{ url('/') }}" @if(request()->is('/')) aria-current="page" @endif>Home</a>
    <a href="{{ url('/amenities') }}" @if(request()->is('amenities')) aria-current="page" @endif>Amenities</a>
    <a href="{{ url('/pricing') }}" @if(request()->is('pricing')) aria-current="page" @endif>Layout &amp; Price</a>
    <a href="{{ url('/blog') }}">Blog</a>
  </nav>

  <nav class="kv-nav kv-nav--right" aria-label="Secondary">
    <a href="{{ url('/') }}#contact">Contact</a>
    <a href="{{ url('/about') }}" @if(request()->is('about')) aria-current="page" @endif>About</a>
    <a class="kv-phone-pill" href="tel:+918377000300">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.9 2.3Z"/></svg>
      +91 – 8377 000 300
    </a>
    <button class="kv-burger" id="kvBurger" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="kvDrawer">
      <span></span><span></span><span></span>
    </button>
  </nav>

  {{-- phone shortcut shown next to the burger on tablets/phones --}}
  <a class="kv-phone-pill kv-header__mobile-phone" href="tel:+918377000300" aria-label="Call +91 8377 000300">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.9 2.3Z"/></svg>
    <span class="kv-phone-label">+91 8377 000300</span>
  </a>
</header>
