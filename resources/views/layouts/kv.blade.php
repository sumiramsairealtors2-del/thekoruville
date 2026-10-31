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

{{-- Motion layer opt-in: hidden states only apply once JS is alive --}}
<script>
  document.documentElement.classList.add('mv-js');
  window.setTimeout(function () {
    if (!window.__kvMotion) document.documentElement.classList.remove('mv-js');
  }, 3000);
</script>

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
  {{-- Header crown: the "Enquiry Now" tab's own outline, turned 90° and fitted to the plaque.
       The tab's flat edge is flush with the screen; here it is flush with the *bottom* of the
       olive band, so the tab's long tangent shoulder flows straight out of the bar with no corner.
       Same curve data as #kv-rail-shape — only rotated and scaled. --}}
  <symbol id="kv-crown-header" viewBox="0 0 320 93">
    <path d="M0 31C0.7 31.2 1.71 31.3 4.01 32.2C6.32 33.1 10.73 34.5 14.04 36.2C17.35 38 20.76 39.9 24.08 42.7C27.39 45.5 30.8 48.8 34.11 52.9C37.42 57 40.83 63.2 44.14 67.6C47.45 72 50.86 75.9 54.17 79.1C57.48 82.3 60.89 84.6 64.2 86.6C67.51 88.6 70.92 90 74.23 91C77.54 92.1 82.56 92.6 84.26 92.9L244.76 92.9C246.47 92.7 251.49 92.1 254.8 91C258.11 89.9 261.52 88.4 264.83 86.3C268.14 84.2 271.55 81.8 274.86 78.5C278.17 75.2 281.58 70.9 284.89 66.3C288.2 61.8 291.61 55.4 294.92 51.2C298.23 47 301.94 43.8 304.95 41.2C307.96 38.6 310.47 37.5 312.98 35.8C315.49 34.1 318.8 31.8 320 31Z"/>
  </symbol>
  {{-- Plot card crowns: same tab curve again, flat edge on the card body's top edge (the
       shape is flipped with scaleY(-1) in CSS, so the flat edge lands at the bottom). --}}
  <symbol id="kv-crown-plot" viewBox="0 0 320 93">
    <path d="M0 0C0.7 0.3 1.71 0.45 4.01 1.8C6.32 3.15 10.73 5.25 14.04 7.8C17.35 10.5 20.76 13.35 24.08 17.55C27.39 21.75 30.8 26.7 34.11 32.85C37.42 39 40.83 48.3 44.14 54.9C47.45 61.5 50.86 67.35 54.17 72.15C57.48 76.95 60.89 80.4 64.2 83.4C67.51 86.4 70.92 88.5 74.23 90C77.54 91.65 82.56 92.4 84.26 92.85L244.76 92.85C246.47 92.55 251.49 91.65 254.8 90C258.11 88.35 261.52 86.1 264.83 82.95C268.14 79.8 271.55 76.2 274.86 71.25C278.17 66.3 281.58 59.85 284.89 52.95C288.2 46.2 291.61 36.6 294.92 30.3C298.23 24 301.94 19.2 304.95 15.3C307.96 11.4 310.47 9.75 312.98 7.2C315.49 4.65 318.8 1.2 320 0Z"/>
  </symbol>
  {{-- Hero prev/next tab: the "Enquiry Now" tab's own outline, turned 90° and fitted to the
       arrow tab — same curve data as #kv-crown-header and #kv-rail-shape, with the flat edge
       on the hero's edge so the shoulder flows out of the frame with no corner. --}}
  <symbol id="kv-arrow-tab" viewBox="0 0 320 63">
    <path d="M0 0C0.7 0.2 1.71 0.3 4.01 1.22C6.32 2.13 10.73 3.56 14.04 5.28C17.35 7.11 20.76 9.04 24.08 11.89C27.39 14.73 30.8 18.09 34.11 22.25C37.42 26.42 40.83 32.72 44.14 37.19C47.45 41.66 50.86 45.62 54.17 48.88C57.48 52.13 60.89 54.46 64.2 56.5C67.51 58.53 70.92 59.95 74.23 60.97C77.54 62.09 82.56 62.59 84.26 62.9L244.76 62.9C246.47 62.7 251.49 62.09 254.8 60.97C258.11 59.85 261.52 58.33 264.83 56.19C268.14 54.06 271.55 51.62 274.86 48.27C278.17 44.91 281.58 40.54 284.89 35.87C288.2 31.3 291.61 24.79 294.92 20.53C298.23 16.26 301.94 13.01 304.95 10.36C307.96 7.72 310.47 6.6 312.98 4.88C315.49 3.15 318.8 0.81 320 0Z"/>
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
