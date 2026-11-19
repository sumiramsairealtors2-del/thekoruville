@extends('layouts.kv')

@section('title', 'Layout Plan & Pricing | The Koru Ville')
@section('description', 'Plot-wise pricing and the full site layout plan for The Koru Ville, a resort-themed plotted township in Kilawali near Jim Corbett. Plot sizes from 25\'-0"X40\'-0" to 25\'-0"X50\'-0".')
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

  {{-- UNLOCK CARDS --}}
  <section class="kv-panel kv-invest">
    <div class="kv-shell">
      <div class="kv-section-head" data-mv-group="100">
        <span class="kv-eyebrow" data-mv="fade">Site Layout &amp; Investment</span>
        <h2 class="kv-display kv-display--lg" data-mv="words">Layout Plan &amp; Pricing</h2>
        <p class="kv-lede" data-mv="blur">The layout sets out defined residential plots, including a restaurant-themed cluster, within one gated boundary connected by wide internal roads.</p>
      </div>

      <div class="kv-unlock-grid" data-mv-group="140">
        <div class="kv-unlock" data-mv="scale" data-mv-tilt="6">
          <div class="kv-unlock__bg"><img src="{{ asset('assets/img/kv/unlock-price.webp') }}" alt="" aria-hidden="true" loading="lazy" data-mv-parallax="24"></div>
          <svg class="lock" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.6" fill="currentColor"/></svg>
          <div>
            <h3>Unlock Price List</h3>
            <p>Share a few details to unlock the current, plot-wise price breakup.</p>
            <button type="button" class="kv-btn kv-btn--olive" data-kv-open="unlock" data-unlock="price" data-mv-magnet="10">Unlock Now <span aria-hidden="true">→</span></button>
          </div>
        </div>

        <div class="kv-unlock" data-mv="scale" data-mv-tilt="6">
          <div class="kv-unlock__bg"><img src="{{ asset('assets/img/kv/unlock-layout.webp') }}" alt="" aria-hidden="true" loading="lazy" data-mv-parallax="24"></div>
          <svg class="lock" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="4" y="13" width="16" height="15" rx="1.5"/><path d="M8 13V9a4 4 0 0 1 8 0v4"/><circle cx="12" cy="20" r="1.6" fill="currentColor"/></svg>
          <div>
            <h3>Unlock Layout Plan</h3>
            <p>Share a few details to unlock the full site layout and plot numbering.</p>
            <button type="button" class="kv-btn kv-btn--olive" data-kv-open="unlock" data-unlock="layout" data-mv-magnet="10">Unlock Now <span aria-hidden="true">→</span></button>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- AREA ANALYSIS TABLE --}}
  <section class="kv-panel kv-panel--cream">
    <div class="kv-shell">
      <div class="kv-section-head" data-mv-group="100">
        <span class="kv-eyebrow" data-mv="fade">Area Analysis</span>
        <h2 class="kv-display kv-display--md" data-mv="words">Plot Types &amp; Sizes</h2>
      </div>

      <div class="kv-table-wrap" data-mv="up" data-mv-tilt="4">
        <table class="kv-area-table">
          <thead>
            <tr>
              <th>Unit Type</th>
              <th>Plot Size</th>
              <th>Plot Area</th>
              <th>Covered Area (Ground Fl.)</th>
              <th>Covered Area (First Fl.)</th>
              <th>No. of Plots</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Unit-A</td>
              <td>25'-0" X 40'-0"</td>
              <td>1,000 Sq.Yd</td>
              <td>704.8 Sq.Ft</td>
              <td>1,110 Sq.Ft</td>
              <td>35</td>
            </tr>
            <tr>
              <td>Unit-B</td>
              <td>25'-0" X 45'-0"</td>
              <td>1,125 Sq.Yd</td>
              <td>871.3 Sq.Ft</td>
              <td>1,380 Sq.Ft</td>
              <td>16</td>
            </tr>
            <tr>
              <td>Unit-C</td>
              <td>25'-0" X 50'-0"</td>
              <td>1,390.3 Sq.Yd</td>
              <td>725.6 / 685.5 Sq.Ft</td>
              <td>1,426.8 / 1,589.5 Sq.Ft</td>
              <td>16</td>
            </tr>
          </tbody>
        </table>
        <p class="kv-table-note">Plot areas and covered areas as per the project area analysis. Final square footage confirmed at the time of booking.</p>
      </div>
    </div>
  </section>

  {{-- FLOOR PLANS --}}
  <section class="kv-panel kv-panel--cream">
    <div class="kv-shell">
      <div class="kv-section-head" data-mv-group="100">
        <span class="kv-eyebrow" data-mv="fade">Villa Floor Plans</span>
        <h2 class="kv-display kv-display--md" data-mv="words">Ground &amp; First Floor Layouts</h2>
      </div>

      <div class="kv-floor-grid" data-mv-group="140">
        <article class="kv-floor-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-floor__badge">Villa Type A</div>
          <h3>Mayoora</h3>
          <p>Ground floor and first floor layout — compact retreat within the resort-themed layout.</p>
          <div class="kv-floor__preview" aria-hidden="true">
            <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="6" y="6" width="36" height="36" rx="2"/><path d="M6 24h36M24 6v36"/></svg>
          </div>
          <a href="#" class="kv-btn kv-btn--outline kv-floor__cta">View Plan <span aria-hidden="true">→</span></a>
        </article>

        <article class="kv-floor-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-floor__badge">Villa Type B</div>
          <h3>Mriga</h3>
          <p>Ground floor and first floor layout — ideal for a family home with outdoor space.</p>
          <div class="kv-floor__preview" aria-hidden="true">
            <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="6" y="6" width="36" height="36" rx="2"/><path d="M6 24h36M24 6v36"/></svg>
          </div>
          <a href="#" class="kv-btn kv-btn--outline kv-floor__cta">View Plan <span aria-hidden="true">→</span></a>
        </article>

        <article class="kv-floor-card" data-mv="up" data-mv-tilt="6">
          <div class="kv-floor__badge">Villa Type C</div>
          <h3>Simha</h3>
          <p>Ground floor and first floor layout — generous space for a full family residence.</p>
          <div class="kv-floor__preview" aria-hidden="true">
            <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="6" y="6" width="36" height="36" rx="2"/><path d="M6 24h36M24 6v36"/></svg>
          </div>
          <a href="#" class="kv-btn kv-btn--outline kv-floor__cta">View Plan <span aria-hidden="true">→</span></a>
        </article>
      </div>

      <p class="kv-lede" data-mv="blur" style="text-align:center;margin-top:30px">Plot Plan and Site Plan available on request — unlock the layout plan for full plot numbering.</p>
    </div>
  </section>

</div>

@endsection
