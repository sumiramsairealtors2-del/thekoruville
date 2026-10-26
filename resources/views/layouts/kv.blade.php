<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="robots" content="index, follow">
<meta name="msvalidate.01" content="629DA6236EFBD3CFE9B3F874F77B5D4B" />
<meta name="google-site-verification" content="NTbewVqKnoXRAyOncXeBZtJkTpbRBiqv84wcSpli99M" />
<meta name="theme-color" content="#313922">

{{-- Google Tag Manager --}}
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P769HDDG');</script>

{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Inter+Tight:wght@400;500;600;700&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">

{{-- Icons / favicons --}}
<link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicon.svg') }}" />
<link rel="icon" type="image/png" href="{{ asset('assets/favicon-96x96.png') }}" sizes="96x96" />
<link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/apple-touch-icon.png') }}" />
<link rel="manifest" href="{{ asset('assets/site.webmanifest') }}" />

{{-- Redesign design system (Vite) --}}
@vite(['resources/css/kv.css', 'resources/js/kv.js'])

@yield('head')

{{-- Open Graph / Twitter --}}
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ asset('assets/img/thekoruville.jpg') }}" />
<meta property="og:locale" content="en_IN" />
<meta property="og:site_name" content="The Koru Ville" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
<meta name="twitter:image" content="{{ asset('assets/img/thekoruville.jpg') }}" />
</head>
<body class="kv">

{{-- Reusable silhouettes (crown / rail) --}}
<svg class="kv-sprite" aria-hidden="true" focusable="false" width="0" height="0">
  <symbol id="kv-crown-shape" viewBox="0 0 320 93">
    <path d="M0 0H320V30C285.57 39.37 282.51 84.88 247 93H73C37.49 84.88 34.43 39.37 0 30Z"/>
  </symbol>
  {{-- Hero arrow tab: lower half of the crown, with tangent shoulders (no corner where it meets the band or plaque). --}}
  <symbol id="kv-arrow-tab" viewBox="0 0 320 63">
    <path d="M0 0H320C300 0 282.51 63 247 63H73C37.49 63 20 0 0 0Z"/>
  </symbol>
  <symbol id="kv-rail-shape" viewBox="0 0 62 319">
    <path d="M62 0C61.8 0.7 61.7 1.7 60.8 4.0C59.9 6.3 58.5 10.7 56.8 14.0C55.0 17.3 53.1 20.7 50.3 24.0C47.5 27.3 44.2 30.7 40.1 34.0C36.0 37.3 29.8 40.7 25.4 44.0C21.0 47.3 17.1 50.7 13.9 54.0C10.7 57.3 8.4 60.7 6.4 64.0C4.4 67.3 3.0 70.7 2.0 74.0C0.9 77.3 0.4 82.3 0.1 84.0V244C0.3 245.7 0.9 250.7 2.0 254.0C3.1 257.3 4.6 260.7 6.7 264.0C8.8 267.3 11.2 270.7 14.5 274.0C17.8 277.3 22.1 280.7 26.7 284.0C31.2 287.3 37.6 290.7 41.8 294.0C46.0 297.3 49.2 301.0 51.8 304.0C54.4 307.0 55.5 309.5 57.2 312.0C58.9 314.5 61.2 317.8 62.0 319.0Z"/>
  </symbol>
</svg>

<a class="kv-skip" href="#main">Skip to content</a>

@include('partials.kv.topbar')
@include('partials.kv.header', ['solid' => !View::hasSection('home') && !View::hasSection('hero')])

<main id="main"@if(View::hasSection('home')) class="kv-home"@endif>
  @yield('content')
</main>

@include('partials.kv.rail')

@include('partials.kv.footer')

@include('partials.kv.drawer')

{{-- ============ ENQUIRY MODAL ============ --}}
<div class="kv-modal" id="kvModal-enquiry" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="kvEnquiryTitle">
  <div class="kv-modal__box">
    <button type="button" class="kv-modal__close" data-kv-close-modal aria-label="Close"></button>
    <span class="kv-eyebrow">Get In Touch</span>
    <h2 id="kvEnquiryTitle">Enquire About Plots</h2>
    <p>Share your details and our team will call you with the latest availability and pricing.</p>
    <form data-kv-form data-source="The Koru Ville Website — Enquiry" novalidate>
      <div class="kv-field">
        <label for="enqName">Full Name</label>
        <input type="text" id="enqName" name="name" autocomplete="name" required>
        <p class="kv-form__error"></p>
      </div>
      <div class="kv-field">
        <label for="enqEmail">Email</label>
        <input type="email" id="enqEmail" name="email" autocomplete="email" required>
        <p class="kv-form__error"></p>
      </div>
      <div class="kv-field">
        <label for="enqPhone">Phone</label>
        <input type="tel" id="enqPhone" name="mobile" autocomplete="tel" required>
        <p class="kv-form__error"></p>
      </div>
      <button type="submit" class="kv-btn kv-btn--olive kv-btn--block">Send Enquiry</button>
      <p class="kv-form__status" role="status" aria-live="polite"></p>
    </form>
  </div>
</div>

{{-- ============ UNLOCK MODAL ============ --}}
<div class="kv-modal" id="kvModal-unlock" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="kvUnlockTitle">
  <div class="kv-modal__box">
    <button type="button" class="kv-modal__close" data-kv-close-modal aria-label="Close"></button>
    <span class="kv-eyebrow">Unlock Content</span>
    <h2 id="kvUnlockTitle">Unlock Layout Plan</h2>
    <p id="kvUnlockMessage">Share a few details to unlock the full site layout and plot numbering.</p>
    <form data-kv-form data-source="The Koru Ville Website — Unlock" novalidate>
      <input type="hidden" name="unlock_target" id="kvUnlockTarget" value="layout">
      <div class="kv-field">
        <label for="unlName">Full Name</label>
        <input type="text" id="unlName" name="name" autocomplete="name" required>
        <p class="kv-form__error"></p>
      </div>
      <div class="kv-field">
        <label for="unlEmail">Email</label>
        <input type="email" id="unlEmail" name="email" autocomplete="email" required>
        <p class="kv-form__error"></p>
      </div>
      <div class="kv-field">
        <label for="unlPhone">Phone</label>
        <input type="tel" id="unlPhone" name="mobile" autocomplete="tel" required>
        <p class="kv-form__error"></p>
      </div>
      <button type="submit" class="kv-btn kv-btn--olive kv-btn--block">Unlock Now</button>
      <p class="kv-form__status" role="status" aria-live="polite"></p>
    </form>
  </div>
</div>

{{-- ============ BROCHURE MODAL ============ --}}
<div class="kv-modal" id="kvModal-brochure" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="kvBrochureTitle">
  <div class="kv-modal__box">
    <button type="button" class="kv-modal__close" data-kv-close-modal aria-label="Close"></button>
    <span class="kv-eyebrow">Download</span>
    <h2 id="kvBrochureTitle">Get The Brochure</h2>
    <p>Enter your details and we will send the brochure straight away.</p>
    <form data-kv-form data-source="The Koru Ville Website — Brochure" novalidate>
      <div class="kv-field">
        <label for="broName">Full Name</label>
        <input type="text" id="broName" name="name" autocomplete="name" required>
        <p class="kv-form__error"></p>
      </div>
      <div class="kv-field">
        <label for="broEmail">Email</label>
        <input type="email" id="broEmail" name="email" autocomplete="email" required>
        <p class="kv-form__error"></p>
      </div>
      <div class="kv-field">
        <label for="broPhone">Phone</label>
        <input type="tel" id="broPhone" name="mobile" autocomplete="tel" required>
        <p class="kv-form__error"></p>
      </div>
      <button type="submit" class="kv-btn kv-btn--olive kv-btn--block">Download Brochure</button>
      <p class="kv-form__status" role="status" aria-live="polite"></p>
    </form>
  </div>
</div>

{{-- ============ LIGHTBOX ============ --}}
<div class="kv-modal" id="kvLightbox" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Gallery image">
  <div style="width:100%;max-width:1100px;position:relative;">
    <button type="button" class="kv-modal__close" aria-label="Close gallery" style="top:-8px;right:0;background:rgba(235,228,204,.9)"></button>
    <img id="kvLightboxImg" src="" alt="" style="width:100%;height:auto;max-height:82vh;object-fit:contain;border-radius:12px;">
  </div>
</div>

@stack('scripts')
</body>
</html>
