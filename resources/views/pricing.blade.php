@extends('layouts.kv')

@section('title', 'Layout Plan & Pricing | The Koru Ville')
@section('description', 'The Koru Ville\'s layout sets out defined residential plots, including a restaurant-themed cluster, within one gated boundary connected by wide internal roads. Rates vary by plot size and position within the resort-themed layout.')
@section('hero', '1')

@section('content')

@php
    $plots = [
        ['type' => 'A', 'villa' => 'Mayoora', 'heading' => 'Mayoora: 111 sq. yd', 'area' => 'Plot area: 1,000 sq. ft | Built-up area: 1,390.3 sq. ft', 'depth' => 40, 'count' => 35, 'summary' => 'Mayoora is the most compact size of these three designs. It has a green lawn and a front porch, and each floor has a living area, a bedroom, a dresser and a washroom. The balcony on the first floor looks down onto the private plunge pool (8\' x 8\').'],
        ['type' => 'B', 'villa' => 'Mriga', 'heading' => 'Mriga: 125 sq. yd', 'area' => 'Plot area: 1,125 sq. ft | Built-up area: 1,426.8 sq. ft', 'depth' => 45, 'count' => 16, 'summary' => 'Mriga keeps the same duplex plan with a little more space, giving you a bigger living area and bedroom on both floors. It has a green lawn and a private plunge pool (9’ x 7’). The first-floor balcony is framed by greenery and faces the surrounding hills and forest.'],
        ['type' => 'C', 'villa' => 'Simha', 'heading' => 'Simha: 139 sq. yd', 'area' => 'Plot area: 1,250 sq. ft | Built-up area: 1,589.5 sq. ft', 'depth' => 50, 'count' => 16, 'summary' => 'Simha is the largest category. The ground floor has two bedrooms and two washrooms. Upstairs there is a third bedroom, another washroom and a large open terrace (13\'-2" x 20\'-7"). Simha is also the only category with a full private swimming pool (10\' x 7\') instead of a plunge pool.'],
    ];
@endphp

<div class="kv-subpage kv-pricing-page">
  <section class="kv-page-masthead" aria-labelledby="pricing-title">
    <div class="kv-shell">
      <div class="kv-page-masthead__grid">
        <div data-mv="up">
          <span class="kv-eyebrow">Site Layout &amp; Investment</span>
          <h1 id="pricing-title">Layout Plan &amp; Pricing</h1>
        </div>
        <p data-mv="up" data-mv-delay="100">The Koru Ville's layout sets out defined residential plots, including a restaurant-themed cluster, within one gated boundary connected by wide internal roads. Rates vary by plot size and position within the resort-themed layout.</p>
      </div>
      <nav class="kv-page-masthead__links" aria-label="Explore layout and pricing" data-mv="up">
        <a href="#plot-sizes">Plot sizes <span aria-hidden="true">↓</span></a>
        <a href="#pricing-documents">Price list &amp; layout <span aria-hidden="true">↓</span></a>
        <a href="#villa-floor-plans">Villa floor plans <span aria-hidden="true">↓</span></a>
      </nav>
    </div>
  </section>

  <section class="kv-panel kv-panel--cream kv-legacy-section" id="plots">
    <div class="kv-shell">
      <div class="kv-section-head">
        <h2 class="kv-display kv-display--md">Resort-Themed Residential Plots in Kashipur, Uttarakhand</h2>
        <p class="kv-lede">A resort-themed plotted community designed for the way you want to live, gather and build.</p>
      </div>
      <div class="kv-legacy-grid">
        <article>
          <h3>Resort-Themed Residential Plots in Kashipur</h3>
          <p>Choose from plots starting at 111 sq. yd., with 125 and 139 sq. yd. options, all planned within a resort-inspired layout rather than a conventional residential grid.</p>
        </article>
        <article>
          <h3>Restaurant-Themed Plot Cluster</h3>
          <p>A dedicated cluster of restaurant-themed plots is planned around open dining areas and shared gathering spots for owners who think of their home as somewhere to host as much as somewhere to live.</p>
        </article>
        <article>
          <h3>Gated, Resort-Style Infrastructure</h3>
          <p>Wide internal roads, a secured boundary wall, clearly marked plot divisions, and shared resort-style common areas define the layout — built around green, open surroundings.</p>
        </article>
        <article>
          <h3>Build It Around Your Life</h3>
          <p>Give a shape to your plot into a luxury villa through three resort-themed designs: Simha, Mrigha, and Mayoora.</p>
        </article>
        <article>
          <h3>A Destination That Pauses Fast-Paced Life</h3>
          <p>Jim Corbett has been a central attraction for wildlife enthusiasts and travellers for generations. Its forests, open landscapes, and slower pace offer a natural escape from the constant rush of city life.</p>
        </article>
        <article>
          <h3>A Destination in Its Early Chapter</h3>
          <p>Compared to established hill stations like Nainital or Mussoorie, the Kashipur–Ramnagar corridor is still developing, with rail connectivity such as the new Ramnagar–Dehradun Express taking shape around it.</p>
        </article>
      </div>
    </div>
  </section>

  <section id="plot-sizes" class="kv-subsection kv-pricing-page__comparison" aria-labelledby="plot-sizes-title">
    <div class="kv-shell">
      <div class="kv-pricing-page__heading" data-mv="up">
        <h2 id="plot-sizes-title" class="kv-display kv-display--md">Residential Plots Near Jim Corbett: Mayoora, Mriga & Simha</h2>
        <p><strong>(111-139) sq.yd</strong> Plots Onwards</p>
        <p>Every villa at The Koru Ville is a ground-floor + first-floor duplex with its own private pool. You choose the category that fits your plot size and the number of people who will stay. The Koru Ville team then builds it to that category’s fixed design, so all three sit in the same resort-style layout. To learn about residential plot prices near Jim Corbett, don’t hesitate to connect with our dedicated team.</p>
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
        <p>*Pricing shared only after unlock &mdash; illustrative rates are not published.</p>
      </div>
      <div class="kv-pricing-page__documents">
        <article data-mv="up">
          <h3>Price List</h3>
          <p><strong>Starting Price</strong> 34,990*/Sq.Yd</p>
          <p>Get the current, plot-wise price breakup for residential and restaurant-themed plots.</p>
          <p>Residential Plots · Restaurant-Themed Cluster</p>
          <button type="button" class="kv-btn kv-btn--gold" data-kv-open="unlock" data-unlock="price" data-document-request>Request price list</button>
        </article>
        <article data-mv="up" data-mv-delay="100">
          <h3>Layout Plan</h3>
          <p>Share a few details to unlock the full site layout and plot numbering for The Koru Ville.</p>
          <p>Kilawali, Kashipur · 111 / 125 / 139 sq.yd · Gated Boundary</p>
          <button type="button" class="kv-btn kv-btn--gold" data-kv-open="unlock" data-unlock="layout" data-document-request>Request site layout</button>
        </article>
      </div>
    </div>
  </section>

  <section id="villa-floor-plans" class="kv-subsection" aria-labelledby="villa-floor-plans-title">
    <div class="kv-shell">
      <div class="kv-pricing-page__heading" data-mv="up">
        <h2 id="villa-floor-plans-title" class="kv-display kv-display--md">Villa Floor Plans</h2>
      </div>
      <div class="kv-pricing-page__villas">
        @foreach ($plots as $plot)
          <article data-mv="up">
            <span class="kv-eyebrow">Villa Type {{ $plot['type'] }}</span>
            <h3>{{ $plot['heading'] }}</h3>
            <p><strong>{{ $plot['area'] }}</strong></p>
            <p>{{ $plot['summary'] }}</p>
            <a href="mailto:info@thekoruville.com?subject={{ rawurlencode($plot['villa'].' floor plan request') }}" class="kv-btn kv-btn--olive" aria-label="Request the {{ $plot['villa'] }} floor plan by email">Request by email</a>
          </article>
        @endforeach
      </div>
    </div>
  </section>
</div>

@endsection
