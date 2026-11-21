{{-- Header: olive crown + centred logo plaque, links float over the hero --}}
<header class="kv-header{{ !empty($solid) ? ' kv-header--solid' : '' }}{{ !empty($light) ? ' kv-header--light' : '' }}{{ !empty($errorPage) ? ' kv-header--error' : '' }}" id="kvHeader">


  <div class="kv-crown" aria-hidden="false">
    {{-- Inline crown path: sized by width + aspect-ratio, so the sweep never distorts. --}}
    @include('partials.kv.crown', ['shapeClass' => 'kv-crown__shape', 'shapeVariant' => 'header'])

    <a class="kv-crown__tab" href="{{ url('/') }}" aria-label="The Koru Ville — home"></a>
  </div>

  <nav class="kv-nav kv-nav--left" aria-label="Primary">
    <a class="kv-nav-link" href="{{ url('/') }}" @if(request()->is('/')) aria-current="page" @endif data-label="Home">
      <svg class="kv-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      <span class="kv-nav-label">Home</span>
    </a>
    <a class="kv-nav-link" href="{{ url('/amenities') }}" @if(request()->is('amenities')) aria-current="page" @endif data-label="Amenities">
      <svg class="kv-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
      <span class="kv-nav-label">Amenities</span>
    </a>
    <a class="kv-nav-link" href="{{ url('/pricing') }}" @if(request()->is('pricing')) aria-current="page" @endif data-label="Layout &amp; Price">
      <svg class="kv-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
      <span class="kv-nav-label">Layout &amp; Price</span>
    </a>
    <a class="kv-nav-link" href="{{ url('/blog') }}" data-label="Blog">
      <svg class="kv-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
      <span class="kv-nav-label">Blog</span>
    </a>
  </nav>

  <div class="kv-header__logo" aria-label="The Koru Ville — home">
    <a href="{{ url('/') }}">
      <img src="{{ asset('assets/img/website.png') }}" alt="The Koru Ville" loading="lazy">
    </a>
  </div>

  <nav class="kv-nav kv-nav--right" aria-label="Secondary">
    <a class="kv-nav-link" href="{{ url('/') }}#contact" data-label="Contact">
      <svg class="kv-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22 6 12 13 2 6"/></svg>
      <span class="kv-nav-label">Contact</span>
    </a>
    <a class="kv-nav-link" href="{{ url('/about') }}" @if(request()->is('about')) aria-current="page" @endif data-label="About">
      <svg class="kv-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      <span class="kv-nav-label">About</span>
    </a>
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
