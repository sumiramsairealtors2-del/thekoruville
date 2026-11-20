@extends('layouts.kv')

@section('title', 'Layout Plan & Pricing | The Koru Ville')
@section('description', 'Compare plot dimensions and villa types at The Koru Ville in Kilawali near Jim Corbett. Request current plot pricing, the site layout or villa floor plans.')
@section('hero', '1')

@section('content')

@php
    $plots = [
        ['type' => 'A', 'villa' => 'Mayoora', 'depth' => 40, 'count' => 35, 'summary' => 'A compact layout for a weekend retreat.'],
        ['type' => 'B', 'villa' => 'Mriga', 'depth' => 45, 'count' => 16, 'summary' => 'A family layout with more room outdoors.'],
        ['type' => 'C', 'villa' => 'Simha', 'depth' => 50, 'count' => 16, 'summary' => 'The largest plot option for a family villa.'],
    ];
@endphp

<div class="kv-subpage kv-pricing-page">
  <section class="kv-page-masthead" aria-labelledby="pricing-title">
    <div class="kv-shell">
      <div class="kv-page-masthead__grid">
        <div data-mv="up">
          <span class="kv-eyebrow">The Koru Ville · Kilawali</span>
          <h1 id="pricing-title">Layout &amp; Price</h1>
        </div>
        <p data-mv="up" data-mv-delay="100">Compare the three plot sizes, then request the current price list or site layout.</p>
      </div>
      <nav class="kv-page-masthead__links" aria-label="Explore layout and pricing" data-mv="up">
        <a href="#plot-sizes">Plot sizes <span aria-hidden="true">↓</span></a>
        <a href="#pricing-documents">Price list &amp; layout <span aria-hidden="true">↓</span></a>
        <a href="#villa-floor-plans">Villa floor plans <span aria-hidden="true">↓</span></a>
      </nav>
    </div>
  </section>

  <section id="plot-sizes" class="kv-subsection kv-pricing-page__comparison" aria-labelledby="plot-sizes-title">
    <div class="kv-shell">
      <div class="kv-pricing-page__heading" data-mv="up">
        <h2 id="plot-sizes-title" class="kv-display kv-display--md">Compare Plot Sizes</h2>
        <p>Three plot sizes within one gated layout, connected by wide internal roads.</p>
      </div>
      <div class="kv-table-wrap kv-pricing-page__table" data-mv="up">
        <table class="kv-area-table" aria-labelledby="plot-sizes-title" aria-describedby="plot-size-note">
          <thead>
            <tr>
              <th scope="col">Villa type</th>
              <th scope="col">Dimensions</th>
              <th scope="col">Plot area</th>
              <th scope="col">Plots in layout</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($plots as $plot)
              @php($area = 25 * $plot['depth'])
              <tr>
                <th scope="row">{{ $plot['villa'] }} <small>Type {{ $plot['type'] }}</small></th>
                <td>25 × {{ $plot['depth'] }} ft</td>
                <td>{{ number_format($area) }} sq ft <small>Approx. {{ round($area / 9) }} sq yd</small></td>
                <td>{{ $plot['count'] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <p id="plot-size-note" class="kv-table-note">Areas are based on the listed plot dimensions. Plot counts describe the site layout. Ask the team about current availability.</p>
    </div>
  </section>

  <section id="pricing-documents" class="kv-subsection kv-subsection--cream2" aria-labelledby="pricing-documents-title">
    <div class="kv-shell">
      <div class="kv-pricing-page__heading" data-mv="up">
        <h2 id="pricing-documents-title" class="kv-display kv-display--md">Price List &amp; Site Layout</h2>
        <p>Share your details and the team will follow up with the information you request.</p>
      </div>
      <div class="kv-pricing-page__documents">
        <article data-mv="up">
          <h3>Plot Price List</h3>
          <p>Ask for the latest plot-wise pricing and check which plots are available.</p>
          <button type="button" class="kv-btn kv-btn--gold" data-kv-open="unlock" data-unlock="price" data-document-request>Request price list</button>
        </article>
        <article data-mv="up" data-mv-delay="100">
          <h3>Site Layout Plan</h3>
          <p>Request the master plan to see plot numbering, internal roads and the restaurant-themed cluster.</p>
          <button type="button" class="kv-btn kv-btn--gold" data-kv-open="unlock" data-unlock="layout" data-document-request>Request site layout</button>
        </article>
      </div>
    </div>
  </section>

  <section id="villa-floor-plans" class="kv-subsection" aria-labelledby="villa-floor-plans-title">
    <div class="kv-shell">
      <div class="kv-pricing-page__heading" data-mv="up">
        <h2 id="villa-floor-plans-title" class="kv-display kv-display--md">Villa Floor Plans</h2>
        <p>Request the ground- and first-floor drawings for the villa you’re considering.</p>
      </div>
      <div class="kv-pricing-page__villas">
        @foreach ($plots as $plot)
          <article data-mv="up">
            <span class="kv-eyebrow">Villa Type {{ $plot['type'] }}</span>
            <h3>{{ $plot['villa'] }}</h3>
            <p>{{ $plot['summary'] }}</p>
            <a href="mailto:info@thekoruville.com?subject={{ rawurlencode($plot['villa'].' floor plan request') }}" class="kv-btn kv-btn--olive" aria-label="Request the {{ $plot['villa'] }} floor plan by email">Request by email</a>
          </article>
        @endforeach
      </div>
    </div>
  </section>
</div>

@endsection
