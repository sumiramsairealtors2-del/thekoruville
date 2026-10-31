{{--
  Static page hero — same frame, overlay and copy treatment as the homepage hero,
  so the floating crown header sits over an image on every page.

  Pass: eyebrow, title, lede, image, imageMobile, imageWidth, imageHeight, alt, meta[], id
--}}
@php
  $heroImage       = $image ?? 'assets/img/slots/hero-02-desktop-1920x1080.webp';
  $heroImageMobile = $imageMobile ?? null;
  $heroWidth       = $imageWidth ?? 1920;
  $heroHeight      = $imageHeight ?? 1080;
@endphp
<section class="kv-hero kv-pagehero"@if(!empty($id)) id="{{ $id }}"@endif>
  <div class="kv-hero__frame">

    <div class="kv-hero__slide is-active" aria-hidden="false">
      <picture>
        @if($heroImageMobile)
          <source media="(max-width: 720px)" srcset="{{ asset($heroImageMobile) }}">
        @endif
        <img src="{{ asset($heroImage) }}"
             width="{{ $heroWidth }}" height="{{ $heroHeight }}"
             alt="{{ $alt ?? strip_tags($title ?? '') }}" fetchpriority="high">
      </picture>
    </div>

    <div class="kv-hero__copy">
      @if(!empty($eyebrow))
        <span class="kv-eyebrow">{{ $eyebrow }}</span>
      @endif
      <h1>{{ $title }}</h1>
      @if(!empty($lede))
        <p class="kv-pagehero__lede">{{ $lede }}</p>
      @endif
      @if(!empty($meta))
        <div class="kv-pagehero__meta">
          @foreach($meta as $item)
            <span>{{ $item }}</span>
          @endforeach
        </div>
      @endif
    </div>

  </div>
</section>
