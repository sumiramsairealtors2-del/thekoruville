{{-- Header: olive crown + centred logo plaque, links float over the hero --}}
<header class="kv-header" id="kvHeader">


  <div class="kv-crown" aria-hidden="false">
    <svg class="kv-crown__shape" viewBox="0 0 320 93" preserveAspectRatio="none" aria-hidden="true" focusable="false">
      <use href="#kv-crown-shape"/>
    </svg>

    <a class="kv-crown__tab" href="{{ url('/') }}" aria-label="The Koru Ville — home">
      <img src="{{ asset('assets/img/Logo.webp') }}" alt="The Koru Ville" width="1093" height="589">
    </a>
  </div>

  <nav class="kv-nav kv-nav--left" aria-label="Primary">
    <a href="{{ url('/') }}" @if(request()->is('/')) aria-current="page" @endif>Home</a>
    <a href="{{ url('/') }}#amenities">Amenities</a>
    <a href="{{ url('/') }}#layout-price">Layout &amp; Price</a>
    <a href="{{ url('/blog') }}">Blog</a>
  </nav>

  <nav class="kv-nav kv-nav--right" aria-label="Secondary">
    <a href="{{ url('/') }}#contact">Contact</a>
    <a href="{{ url('/') }}#about">About</a>
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
