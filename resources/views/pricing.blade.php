@extends('layouts.kv')

@section('title', 'Layout Plan & Pricing | The Koru Ville')
@section('description', 'The Koru Ville\'s layout sets out defined residential plots, including a restaurant-themed cluster, within one gated boundary connected by wide internal roads. Rates vary by plot size and position within the resort-themed layout.')
@section('hero', '1')

@section('head')
<style>
  .pricing-page {
    --pricing-paper: var(--kv-cream-3);
    --pricing-line: #31392255;
    --pricing-padding: clamp(18px, 4vw, 60px);
    margin: var(--kv-frame-top) var(--kv-frame) 0;
    padding-top: max(0px, calc(var(--kv-header) + 16px - var(--kv-frame-top)));
    border-radius: var(--kv-radius) var(--kv-radius) 0 0;
    background: var(--pricing-paper);
    color: var(--kv-ink);
    line-height: 1.6;
  }

  .pricing-page :is(h1, h2, h3, p) { margin: 0; }
  .pricing-page :is(h1, h2, h3) { line-height: 1.13; letter-spacing: -.045em; font-weight: 500; }
  .pricing-page h2 { font-size: clamp(1.75rem, 3.25vw, 3.4rem); }
  .pricing-page h3 { font-size: clamp(1.1rem, 1.6vw, 1.45rem); }
  .pricing-page p { color: var(--kv-body); }
  .pricing-page .pricing-label {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: var(--kv-olive);
    font-size: .875rem;
    letter-spacing: .12em;
    text-transform: uppercase;
  }

  .pricing-page .kv-btn {
    min-height: 46px;
    width: fit-content;
    max-width: 100%;
    padding: 8px 18px;
    border-width: 1px;
    border-radius: 0;
    font-size: .875rem;
    letter-spacing: .06em;
    text-align: center;
    white-space: normal;
  }

  .pricing-page .pricing-section { padding: clamp(26px, 4vw, 60px) var(--pricing-padding); border-bottom: 1px solid var(--pricing-line); scroll-margin-top: calc(var(--kv-header) + 20px); }
  .pricing-page .pricing-shell { width: 100%; max-width: 1340px; margin-inline: auto; }
  .pricing-page .pricing-heading { max-width: 65ch; margin-bottom: 22px; }
  .pricing-page .pricing-heading p { margin-top: 12px; }
  .pricing-page .pricing-villas,
  .pricing-page .pricing-features,
  .pricing-page .pricing-documents { display: grid; }
  .pricing-page .pricing-villas { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: clamp(14px, 2vw, 28px); }
  .pricing-page .pricing-villa-section .pricing-heading {
    display: flex;
    flex-wrap: wrap;
    align-items: baseline;
    justify-content: space-between;
    gap: 8px 20px;
    max-width: none;
  }

  .pricing-page .pricing-villa-section { background: var(--kv-cream); }
  .pricing-page .pricing-villa-section .pricing-heading a { display: inline-flex; align-items: center; min-height: 44px; color: var(--kv-olive); text-decoration: underline; text-underline-offset: 4px; }
  .pricing-page .pricing-villas article {
    display: grid;
    grid-template-rows: auto 1fr;
    min-width: 0;
  }

  .pricing-page .pricing-villa-title {
    align-self: end;
    z-index: 1;
    padding: 42px clamp(14px, 2vw, 24px) 16px;
    background: linear-gradient(transparent, #181d14f5);
    color: var(--kv-cream-3);
  }

  .pricing-page .pricing-villa-title .pricing-label { color: inherit; }
  .pricing-page .pricing-villa-title h3 { margin-top: 5px; font-size: clamp(1.2rem, 2vw, 1.85rem); }
  .pricing-page .pricing-villa-image {
    display: grid;
    grid-template: minmax(0, 1fr) / minmax(0, 1fr);
    aspect-ratio: 1;
    overflow: hidden;
    border-radius: 24px;
    background: var(--kv-cream-2);
  }

  .pricing-page .pricing-villas img { width: 100%; height: 100%; object-fit: contain; }
  .pricing-page .pricing-villa-image > * { grid-area: 1 / 1; }
  .pricing-page .pricing-villa-copy {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
    padding: 18px 0 0;
  }

  .pricing-page .pricing-villa-areas {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px 14px;
    width: 100%;
    margin: 0;
    padding-bottom: 14px;
    border-bottom: 1px solid var(--pricing-line);
    font-size: .875rem;
  }

  .pricing-page .pricing-villa-areas dt { color: var(--kv-body); }
  .pricing-page .pricing-villa-areas dd { margin: 2px 0 0; font-weight: 600; font-variant-numeric: tabular-nums; }
  .pricing-page .pricing-villa-copy .kv-btn { margin-top: auto; border-radius: 999px; }
  .pricing-page .pricing-comparison { background: var(--pricing-paper); }
  .pricing-page .pricing-comparison-intro {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1.12fr);
    align-items: center;
    gap: clamp(22px, 4vw, 60px);
    margin-bottom: clamp(24px, 4vw, 42px);
  }

  .pricing-page .pricing-comparison-intro img {
    width: 100%;
    height: auto;
    border-radius: 24px;
  }

  .pricing-page .pricing-comparison-intro .pricing-heading { margin: 0; }
  .pricing-page .pricing-range {
    display: inline-flex;
    flex-wrap: wrap;
    align-items: baseline;
    gap: 0 8px;
    padding: 6px 14px;
    border-radius: 999px;
    background: var(--kv-cream);
    font-size: .9rem;
  }

  .pricing-page .pricing-range strong { color: var(--kv-olive); }
  .pricing-page .pricing-table {
    overflow: hidden;
    border: 1px solid var(--pricing-line);
    border-radius: 18px;
    background: #f8f5ea;
  }

  .pricing-page .pricing-table :is(th, td) {
    padding: clamp(12px, 1.5vw, 22px);
    vertical-align: top;
    line-height: 1.45;
    font-variant-numeric: tabular-nums;
  }

  .pricing-page .pricing-table thead th { background: var(--kv-olive); color: var(--kv-cream-3); font-size: .8rem; letter-spacing: .06em; }
  .pricing-page .pricing-table th[scope="row"] { color: var(--kv-ink); font-size: 1rem; letter-spacing: 0; text-transform: none; background: none; }
  .pricing-page .pricing-table tbody tr:nth-child(even) { background: #31392208; }
  .pricing-page .pricing-table tbody tr:last-child th { border-bottom: 0; }
  .pricing-page .pricing-table small { display: block; color: var(--kv-body); font-weight: 400; }
  .pricing-page .kv-table-note { margin-top: 12px; }
  .pricing-page .pricing-feature-section { background: var(--kv-cream); }
  .pricing-page .pricing-feature-section .pricing-heading { margin-inline: auto; text-align: center; }
  .pricing-page .pricing-resources .pricing-shell {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
    align-items: start;
    gap: clamp(20px, 4vw, 60px);
  }

  .pricing-page .pricing-resources .pricing-heading { margin: 0; }
  .pricing-page .pricing-features {
    grid-template-columns: repeat(12, minmax(0, 1fr));
    gap: 8px;
    padding: clamp(8px, 1.5vw, 20px);
    border-radius: 18px;
    /* background: #e4e7d8; */
  }

  .pricing-page .pricing-features article {
    grid-column: span 4;
    display: grid;
    grid-template-rows: clamp(135px, 17vw, 238px) auto auto;
    align-items: start;
    border-radius: 10px;
    overflow: hidden;
    background: var(--pricing-paper);
  }

  .pricing-page .pricing-features article:is(:first-child, :last-child) { grid-column: span 5; }
  .pricing-page .pricing-features article:is(:nth-child(3), :nth-child(4)) { grid-column: span 3; }
  .pricing-page .pricing-features img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .pricing-page .pricing-features h3 { padding: 14px clamp(12px, 1.5vw, 22px); }
  .pricing-page .pricing-feature-copy p { padding: 0 clamp(12px, 1.5vw, 22px) 16px; }

  @media (hover: hover) and (pointer: fine) {
    .pricing-page .pricing-features { align-items: start; }
    .pricing-page .pricing-feature-copy {
      display: grid;
      grid-template-rows: 0fr;
      opacity: 0;
      transition: grid-template-rows .3s ease, opacity .25s ease;
    }

    .pricing-page .pricing-feature-copy > div { overflow: hidden; }
    .pricing-page .pricing-features article:is(:hover, :focus-within) .pricing-feature-copy {
      grid-template-rows: 1fr;
      opacity: 1;
    }
  }

  @media (prefers-reduced-motion: reduce) {
    .pricing-page .pricing-feature-copy { transition: none; }
  }
  .pricing-page .pricing-resources { background: var(--kv-olive); color: var(--kv-cream-3); }
  .pricing-page .pricing-resources .pricing-heading p { color: inherit; }
  .pricing-page .pricing-documents { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: clamp(12px, 2vw, 24px); }
  .pricing-page .pricing-documents article {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
    padding: clamp(16px, 2.5vw, 30px);
    border-radius: 20px;
    background: var(--pricing-paper);
    color: var(--kv-ink);
  }

  .pricing-page .pricing-documents h3 { font-size: clamp(1.25rem, 2vw, 1.65rem); }
  .pricing-page .pricing-starting-price { font-size: clamp(1.2rem, 2.1vw, 1.65rem); font-variant-numeric: tabular-nums; }
  .pricing-page .pricing-starting-price strong { display: block; font-size: .875rem; }
  .pricing-page .pricing-document-meta { width: 100%; padding-top: 10px; border-top: 1px solid var(--pricing-line); font-size: .875rem; }
  .pricing-page .pricing-documents .kv-btn { margin-top: auto; border-radius: 999px; }

  @media (max-width: 900px) {
    .pricing-page .pricing-resources .pricing-shell { grid-template-columns: 1fr; }
    .pricing-page .pricing-features { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .pricing-page .pricing-features article:nth-child(n) { grid-column: span 1; }
  }

  @media (max-width: 720px) {
    .pricing-page :is(.pricing-villas, .pricing-comparison-intro) { grid-template-columns: 1fr; }
    .pricing-page .pricing-villas { gap: 28px; }
  }

  @media (max-width: 480px) {
    .pricing-page :is(.pricing-features, .pricing-documents) { grid-template-columns: 1fr; }
    .pricing-page .pricing-features article { grid-template-rows: clamp(130px, 45vw, 200px) auto auto; }
    .pricing-page .pricing-table :is(th, td) { padding: 10px 4px; font-size: .75rem; letter-spacing: 0; overflow-wrap: anywhere; }
    .pricing-page .pricing-table th[scope="row"] { font-size: .8rem; }
  }
</style>
@include('partials.kv.diagonal-hero-styles')
@endsection

@section('content')

@php
    $plots = [
        ['type' => 'A', 'bedrooms' => 2, 'pool' => 'Plunge pool', 'image' => 'plot-1-860.webp', 'villa' => 'Mayoora', 'heading' => 'Mayoora: 111 sq. yd', 'built_area' => '1,390.3', 'depth' => 40, 'count' => 35, 'summary' => 'Mayoora is the most compact size of these three designs. It has a green lawn and a front porch, and each floor has a living area, a bedroom, a dresser and a washroom. The balcony on the first floor looks down onto the private plunge pool (8\' x 8\').'],
        ['type' => 'B', 'bedrooms' => 2, 'pool' => 'Plunge pool', 'image' => 'plot-2-860.webp', 'villa' => 'Mriga', 'heading' => 'Mriga: 125 sq. yd', 'built_area' => '1,426.8', 'depth' => 45, 'count' => 16, 'summary' => 'Mriga keeps the same duplex plan with a little more space, giving you a bigger living area and bedroom on both floors. It has a green lawn and a private plunge pool (9’ x 7’). The first-floor balcony is framed by greenery and faces the surrounding hills and forest.'],
        ['type' => 'C', 'bedrooms' => 3, 'pool' => 'Swimming pool', 'image' => 'plot-3-860.webp', 'villa' => 'Simha', 'heading' => 'Simha: 139 sq. yd', 'built_area' => '1,589.5', 'depth' => 50, 'count' => 16, 'summary' => 'Simha is the largest category. The ground floor has two bedrooms and two washrooms. Upstairs there is a third bedroom, another washroom and a large open terrace (13\'-2" x 20\'-7"). Simha is also the only category with a full private swimming pool (10\' x 7\') instead of a plunge pool.'],
    ];
@endphp

<div class="pricing-page">
  <section class="pricing-hero kv-diagonal-hero" aria-labelledby="pricing-title">
    <div class="kv-diagonal-hero-copy">
      <span class="kv-diagonal-hero-label">Site Layout &amp; Investment</span>
      <h1 id="pricing-title">Layout Plan <span>&amp; Pricing</span></h1>
      <p>The Koru Ville's layout sets out defined residential plots, including a restaurant-themed cluster, within one gated boundary connected by wide internal roads. Rates vary by plot size and position within the resort-themed layout.</p>
      <nav class="kv-diagonal-hero-actions" aria-label="Explore layout and pricing">
        <a href="#plot-sizes" class="kv-btn kv-btn--olive">Plot sizes</a>
        <a href="#pricing-documents">Price list &amp; layout</a>
        <a href="#villa-floor-plans">Villa floor plans</a>
      </nav>
    </div>
    <img class="pricing-hero-image kv-diagonal-hero-image" src="{{ asset('assets/img/kv/kr2.webp') }}"
         width="1282" height="766" alt="Architectural rendering of The Koru Ville villas and pools"
         fetchpriority="high">
  </section>

  <section id="villa-floor-plans" class="pricing-section pricing-villa-section" aria-labelledby="villa-floor-plans-title">
    <div class="pricing-shell">
      <div class="pricing-heading">
        <h2 id="villa-floor-plans-title">Villa Floor Plans</h2>
        <a href="#plot-sizes">Compare plot sizes</a>
      </div>
      <div class="pricing-villas">
        @foreach ($plots as $plot)
          <article>
            <div class="pricing-villa-image">
              <div class="pricing-villa-title">
                <span class="pricing-label">Villa Type {{ $plot['type'] }}</span>
                <h3>{{ $plot['heading'] }}</h3>
              </div>
              <img src="{{ asset('assets/img/kv/'.$plot['image']) }}"
                   alt="Architectural illustration for the {{ $plot['villa'] }} plot option"
                   loading="lazy" decoding="async">
            </div>
            <div class="pricing-villa-copy">
              <dl class="pricing-villa-areas">
                <div><dt>Plot area</dt><dd>{{ number_format(25 * $plot['depth']) }} sq. ft</dd></div>
                <div><dt>Built-up area</dt><dd>{{ $plot['built_area'] }} sq. ft</dd></div>
                <div><dt>Bedrooms</dt><dd>{{ $plot['bedrooms'] }}</dd></div>
                <div><dt>Private pool</dt><dd>{{ $plot['pool'] }}</dd></div>
              </dl>
              <p>{{ $plot['summary'] }}</p>
              <a href="mailto:info@thekoruville.com?subject={{ rawurlencode($plot['villa'].' floor plan request') }}" class="kv-btn kv-btn--olive" aria-label="Request the {{ $plot['villa'] }} floor plan by email">Request by email</a>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  <section id="plot-sizes" class="pricing-section pricing-comparison" aria-labelledby="plot-sizes-title">
    <div class="pricing-shell">
      <div class="pricing-comparison-intro">
        <div class="pricing-heading">
          <h2 id="plot-sizes-title">Residential Plots Near Jim Corbett: Mayoora, Mriga & Simha</h2>
          <p class="pricing-range"><strong>(111-139) sq.yd</strong> Plots Onwards</p>
          <p>Every villa at The Koru Ville is a ground-floor + first-floor duplex with its own private pool. You choose the category that fits your plot size and the number of people who will stay. The Koru Ville team then builds it to that category’s fixed design, so all three sit in the same resort-style layout. To learn about residential plot prices near Jim Corbett, don’t hesitate to connect with our dedicated team.</p>
        </div>
        <img src="{{ asset('assets/img/kv/gallery-1920.webp') }}" width="1920" height="816"
             alt="Illustrated site layout for The Koru Ville" loading="lazy" decoding="async">
      </div>
      <div class="pricing-table">
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

  <section class="pricing-section pricing-feature-section" aria-labelledby="pricing-plots-title" id="plots">
    <div class="pricing-shell">
      <div class="pricing-heading">
        <h2 id="pricing-plots-title">Resort-Themed Residential Plots in Kashipur, Uttarakhand</h2>
        <p>A resort-themed plotted community designed for the way you want to live, gather and build.</p>
      </div>
      <div class="pricing-features">
        <article tabindex="0">
          <img src="{{ asset('assets/img/kv/gallery-1920.webp') }}" alt="" loading="lazy" decoding="async">
          <h3>Resort-Themed Residential Plots in Kashipur</h3>
          <div class="pricing-feature-copy">
            <div><p>Choose from plots starting at 111 sq. yd., with 125 and 139 sq. yd. options, all planned within a resort-inspired layout rather than a conventional residential grid.</p></div>
          </div>
        </article>
        <article tabindex="0">
          <img src="{{ asset('assets/img/kv/why-1040.webp') }}" alt="" loading="lazy" decoding="async">
          <h3>Restaurant-Themed Plot Cluster</h3>
          <div class="pricing-feature-copy">
            <div><p>A dedicated cluster of restaurant-themed plots is planned around open dining areas and shared gathering spots for owners who think of their home as somewhere to host as much as somewhere to live.</p></div>
          </div>
        </article>
        <article tabindex="0">
          <img src="{{ asset('assets/img/kv/kr2.webp') }}" alt="" loading="lazy" decoding="async">
          <h3>Gated, Resort-Style Infrastructure</h3>
          <div class="pricing-feature-copy">
            <div><p>Wide internal roads, a secured boundary wall, clearly marked plot divisions, and shared resort-style common areas define the layout — built around green, open surroundings.</p></div>
          </div>
        </article>
        <article tabindex="0">
          <img src="{{ asset('assets/img/kv/plot-1-860.webp') }}" alt="" loading="lazy" decoding="async">
          <h3>Build It Around Your Life</h3>
          <div class="pricing-feature-copy">
            <div><p>Give a shape to your plot into a luxury villa through three resort-themed designs: Simha, Mrigha, and Mayoora.</p></div>
          </div>
        </article>
        <article tabindex="0">
          <img src="{{ asset('assets/img/kv/why-800.webp') }}" alt="" loading="lazy" decoding="async">
          <h3>A Destination That Pauses Fast-Paced Life</h3>
          <div class="pricing-feature-copy">
            <div><p>Jim Corbett has been a central attraction for wildlife enthusiasts and travellers for generations. Its forests, open landscapes, and slower pace offer a natural escape from the constant rush of city life.</p></div>
          </div>
        </article>
        <article tabindex="0">
          <img src="{{ asset('assets/img/kv/gallery-900.webp') }}" alt="" loading="lazy" decoding="async">
          <h3>A Destination in Its Early Chapter</h3>
          <div class="pricing-feature-copy">
            <div><p>Compared to established hill stations like Nainital or Mussoorie, the Kashipur–Ramnagar corridor is still developing, with rail connectivity such as the new Ramnagar–Dehradun Express taking shape around it.</p></div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section id="pricing-documents" class="pricing-section pricing-resources" aria-labelledby="pricing-documents-title">
    <div class="pricing-shell">
      <div class="pricing-heading">
        <h2 id="pricing-documents-title">Price List &amp; Site Layout</h2>
        <p>*Pricing shared only after unlock &mdash; illustrative rates are not published.</p>
      </div>
      <div class="pricing-documents">
        <article>
          <h3>Price List</h3>
          <p class="pricing-starting-price"><strong>Starting Price</strong> 34,990*/Sq.Yd</p>
          <p>Get the current, plot-wise price breakup for residential and restaurant-themed plots.</p>
          <p class="pricing-document-meta">Residential Plots · Restaurant-Themed Cluster</p>
          <button type="button" class="kv-btn kv-btn--olive" data-kv-open="unlock" data-unlock="price" data-document-request>Request price list</button>
        </article>
        <article>
          <h3>Layout Plan</h3>
          <p>Share a few details to unlock the full site layout and plot numbering for The Koru Ville.</p>
          <p class="pricing-document-meta">Kilawali, Kashipur · 111 / 125 / 139 sq.yd · Gated Boundary</p>
          <button type="button" class="kv-btn kv-btn--olive" data-kv-open="unlock" data-unlock="layout" data-document-request>Request site layout</button>
        </article>
      </div>
    </div>
  </section>

</div>

@endsection
