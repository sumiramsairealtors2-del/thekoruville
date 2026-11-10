{{--
  One source of truth for every crown / shoulder silhouette (header, plot cards,
  gallery label, location tab, hero arrows).

  Always an inline <path>, never a <symbol> + <use> pair: a symbol viewBox compounds
  with the outer svg viewBox in Chrome and shears the shape off its slot.

  Each silhouette is authored with tangent-continuous cubics — the shoulders leave
  the flat edge and land on the plateau horizontally, exactly like the header
  crown's logo curve, so there is no kink or faceted sampling anywhere.

  Every path is drawn in the aspect its slot actually renders at, so the fluid
  width in kv.css scales the curve uniformly at any viewport width.

  Usage:
    @include('partials.kv.crown', ['shapeClass' => 'kv-plot__crown', 'shapeVariant' => 'crown'])
--}}
@php
    $crownShapes = [
        // Header: the logo's own traced curve (native frame 185.19 27.72 522 70.74).
        'header' => [
            '185.19 27.72 522 70.74',
            'M707.17,27.73H185.19v11.83h96.82c19.03,1.18,34.56,12.92,45.28,31.17,9.19,15.67,25.07,27.62,42.02,27.63l145.93.1c18.41.01,33.57-13.18,43.27-30.25,9.54-16.79,24.76-28.18,42.47-28.66h106.2v-11.83Z',
        ],
        // Card crown (plot / post): top band + centred tab, 320 x 53.
        'crown' => [
            '0 0 320 53',
            'M0 0H320V17C304.09 17.72 291.09 24.92 282.11 36.08C274.44 45.69 261.16 53 247 53H73C58.84 53 45.56 45.69 37.89 36.08C28.91 24.92 15.91 17.72 0 17V0Z',
        ],
        // Hanging tab (gallery label / hero arrows): 320 x 91.
        'tab' => [
            '0 0 320 91',
            'M0 0H320C301.62 0 286.62 20.02 276.24 48.23C267.39 72.53 252.05 91 235.7 91H84.3C67.95 91 52.61 72.53 43.76 48.23C33.38 20.02 18.38 0 0 0Z',
        ],
        // Side spine tab (location crown, rendered 280 x 68 before its 90° turn).
        'tab-side' => [
            '0 0 320 78',
            'M0 0H320C301.62 0 286.62 17.16 276.24 41.34C267.39 62.17 252.05 78 235.7 78H84.3C67.95 78 52.61 62.17 43.76 41.34C33.38 17.16 18.38 0 0 0Z',
        ],
    ];
    $crownShape = $crownShapes[$shapeVariant ?? 'crown'];
@endphp
<svg class="{{ $shapeClass }}" viewBox="{{ $crownShape[0] }}" preserveAspectRatio="none" aria-hidden="true" focusable="false"><path d="{{ $crownShape[1] }}"/></svg>
