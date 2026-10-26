@extends('layouts.kv')

@section('title', 'Blog | Residential Plots News & Guides – The Koru Ville')
@section('description', 'Read guides and updates on residential plots near Jim Corbett, Kilawali and Kashipur — insights from the team at The Koru Ville on land, location and living.')

@section('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Blog",
  "name": "The Koru Ville Blog",
  "description": "Guides and location intelligence on residential plots near Jim Corbett, Kilawali and Kashipur.",
  "url": "{{ url('/blog') }}",
  "publisher": {
    "@type": "Organization",
    "name": "Sumiram Sai Realtors",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "G-192, Sector 63",
      "addressLocality": "Noida",
      "addressRegion": "Uttar Pradesh",
      "addressCountry": "IN"
    }
  }
}
</script>
@endsection

@section('content')

<section class="kv-pagehead" id="blog">
  <div class="kv-shell">
    <span class="kv-eyebrow">The Koru Ville · Journal</span>
    <h1>The Koru Ville Blog</h1>
    <p class="kv-lede">Guides, location intelligence and honest answers for anyone evaluating residential plots near Jim Corbett — written by the team behind The Koru Ville in Kilawali, Uttarakhand.</p>
    <div class="kv-pagehead__meta">
      <span>{{ $posts->total() }} {{ Str::plural('article', $posts->total()) }}</span>
      <span>Land · Location · Living</span>
    </div>
  </div>
</section>

<section class="kv-subsection">
  <div class="kv-shell">
    <div class="kv-section-head" style="margin-bottom:32px;">
      <span class="kv-eyebrow">Latest Articles</span>
      <h2 class="kv-display">Insights on land, location &amp; living</h2>
    </div>

    <div class="kv-bloggrid">
      @forelse($posts as $post)
        <article class="kv-postcard kv-reveal">
          <a href="{{ route('posts.show', $post) }}" class="kv-postcard__media" tabindex="-1" aria-hidden="true">
            @if($post->image)
              <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" loading="lazy">
            @else
              <img src="{{ asset('assets/img/kv/gallery-900.webp') }}" alt="" loading="lazy">
            @endif
          </a>
          <div class="kv-postcard__body">
            <span class="kv-postcard__date">{{ ($post->created_at ?? $post->updated_at)?->format('M d, Y') }}</span>
            <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->meta_description ?: Str::limit(strip_tags($post->content), 130) }}</p>
            <a href="{{ route('posts.show', $post) }}" class="kv-postcard__more">
              Read More
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </div>
        </article>
      @empty
        <div class="kv-empty">No articles published yet. Check back soon.</div>
      @endforelse
    </div>

    @if($posts->hasPages())
      <div class="kv-pagination">
        {{ $posts->onEachSide(1)->links('pagination.kv') }}
      </div>
    @endif
  </div>
</section>

<section class="kv-subsection kv-subsection--olive">
  <div class="kv-shell">
    <div class="kv-cta-row">
      <div>
        <span class="kv-eyebrow">Plan a visit</span>
        <h2 class="kv-display">See the plots for yourself</h2>
        <p class="kv-lede" style="color:rgba(235,228,204,.72);max-width:52ch;">Walk the site with our team, understand the layout and get the current price list — no pressure, just information.</p>
      </div>
      <div class="kv-cta-row__actions">
        <button type="button" class="kv-btn kv-btn--gold" data-kv-open="enquiry">Enquire About Plots</button>
        <a class="kv-btn kv-btn--outline" href="{{ url('/') }}#layout-price">View Layout &amp; Price</a>
      </div>
    </div>
  </div>
</section>

@endsection
