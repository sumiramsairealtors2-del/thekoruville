{{-- Mobile drawer --}}
<div class="kv-drawer" id="kvDrawer" aria-hidden="true" aria-label="Menu">
  <div class="kv-drawer__top">
    <img src="{{ asset('assets/img/Logo.webp') }}" alt="The Koru Ville" width="1093" height="589">
    <button type="button" class="kv-drawer__close" data-kv-close aria-label="Close menu"></button>
  </div>

  <nav aria-label="Mobile">
    <a href="{{ url('/') }}">Home <span>01</span></a>
    <a href="{{ url('/about') }}">About <span>02</span></a>
    <a href="{{ url('/amenities') }}">Amenities <span>03</span></a>
    <a href="{{ url('/pricing') }}">Layout &amp; Price <span>04</span></a>
    <a href="{{ url('/') }}#why-this-location">Why This Location <span>05</span></a>
    <a href="{{ url('/') }}#map">Map <span>06</span></a>
    <a href="{{ url('/blog') }}">Blog <span>07</span></a>
    <a href="{{ url('/') }}#faq">FAQ <span>08</span></a>
    <a href="{{ url('/') }}#contact">Contact <span>09</span></a>
  </nav>

  <div class="kv-drawer__foot">
    <a href="tel:+918377000300">Office — +91 8377 000300</a>
    <a href="mailto:info@thekoruville.com">info@thekoruville.com</a>
    <button type="button" class="kv-btn kv-btn--light" data-kv-open="enquiry">Enquire Now</button>
  </div>
</div>
