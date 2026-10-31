@extends('layouts.kv')

@section('title', 'Layout Plan & Pricing | The Koru Ville')
@section('description', 'Unlock the plot-wise price list and the full site layout plan for The Koru Ville, a resort-themed plotted township in Kilawali near Jim Corbett.')
@section('hero', '1')

@section('content')

<div class="kv-subpage">

  @include('partials.kv.pagehero', [
    'eyebrow' => 'Site Layout & Investment',
    'title' => 'Pricing',
    'lede' => 'Plot-wise pricing and the full site layout for The Koru Ville, shared once you send a few details.',
    'image' => 'assets/img/slots/hero-03-desktop-1920x1080.webp',
    'imageMobile' => 'assets/img/slots/hero-03-mobile-900x1600.webp',
    'imageWidth' => 1920,
    'imageHeight' => 1080,
    'alt' => 'The Koru Ville clubhouse and landscaped grounds at Kilawali',
  ])

  <section class="kv-panel kv-invest">
    <div class="kv-shell">
      <div class="kv-section-head" data-mv-group="90">
        <span class="kv-eyebrow" data-mv="fade">Site Layout &amp; Investment</span>
        <h2 class="kv-display kv-display--lg" data-mv="words">Layout Plan &amp; Pricing</h2>
        <p class="kv-lede" data-mv="blur">The layout sets out defined residential plots, including a restaurant-themed cluster, within one gated boundary connected by wide internal roads.</p>
      </div>

      <div class="kv-unlock-grid" data-mv-group="120">
        <div class="kv-unlock" data-mv="scale">
          <div class="kv-unlock__bg"><img src="{{ asset('assets/img/kv/unlock-price.webp') }}" alt="" aria-hidden="true" loading="lazy" data-mv-parallax="24"></div>
          <svg class="lock" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.6" fill="currentColor"/></svg>
          <div>
            <h3>Unlock Price List</h3>
            <p>Share a few details to unlock the current, plot-wise price breakup.</p>
            <button type="button" class="kv-btn" data-kv-open="unlock" data-unlock="price">Unlock Now</button>
          </div>
        </div>

        <div class="kv-unlock" data-mv="scale">
          <div class="kv-unlock__bg"><img src="{{ asset('assets/img/kv/unlock-layout.webp') }}" alt="" aria-hidden="true" loading="lazy" data-mv-parallax="24"></div>
          <svg class="lock" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.6" fill="currentColor"/></svg>
          <div>
            <h3>Unlock Layout Plan</h3>
            <p>Share a few details to unlock the full site layout and plot numbering.</p>
            <button type="button" class="kv-btn" data-kv-open="unlock" data-unlock="layout">Unlock Now</button>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

@endsection
