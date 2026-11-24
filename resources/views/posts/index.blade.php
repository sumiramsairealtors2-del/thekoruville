@extends('layouts.kv')

@section('title', 'Blog | Residential Plots News & Guides – The Koru Ville')
@section('description', 'Read guides and updates on residential plots near Jim Corbett, Kilawali and Kashipur — insights from the team at The Koru Ville on land, location and living.')
@section('hero', '1')

@section('head')
@vite('resources/css/blog.css')
@include('partials.kv.diagonal-hero-styles')
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

<div class="blog-page blog-index">
  @include('partials.kv.blog-hero', [
    'heading' => 'The Koru Ville Blog',
    'image' => asset('assets/img/kv/kr2.webp'),
    'isArticle' => false,
  ])

  <section class="blog-shell blog-listing" aria-labelledby="blog-listing-title">
    <div class="blog-listing-heading">
      <span class="kv-eyebrow">Latest Articles</span>
      <h2 id="blog-listing-title">Insights on land, location &amp; living</h2>
      <p>Guides, location intelligence and honest answers for anyone evaluating residential plots near Jim Corbett — written by the team behind The Koru Ville in Kilawali, Uttarakhand.</p>
    </div>

    <div class="blog-layout">
      <aside class="blog-sidebar" aria-label="Explore the blog">
        <div class="blog-sidebar-search">
          <h3>Search</h3>
          <form action="{{ route('posts.index') }}" method="GET" class="blog-search-form" role="search">
            <label class="sr-only" for="blog-search">Search blog</label>
            <input type="search" name="q" id="blog-search" placeholder="Search articles…" value="{{ $query }}" autocomplete="off">
            <button type="submit" aria-label="Search">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            </button>
          </form>
        </div>

        @if($recentPosts->isNotEmpty())
          <div class="blog-recent">
            <h3>Recent Posts</h3>
            <ul>
              @foreach($recentPosts as $entry)
                <li>
                  <a href="{{ route('posts.show', $entry) }}">
                    <img src="{{ $entry->image ? $entry->imageUrl() : asset('assets/img/kv/gallery-900.webp') }}"
                         alt="" loading="lazy" decoding="async">
                    <span>
                      @if($date = $entry->created_at ?? $entry->updated_at)
                        <time datetime="{{ $date->toDateString() }}">{{ $date->format('M d, Y') }}</time>
                      @endif
                      <strong>{{ $entry->title }}</strong>
                    </span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif
      </aside>

      <div class="blog-results">
        <p id="blog-search-status" role="status" class="sr-only"></p>
        <div id="blog-search-results">
          @fragment('blog-results')
            <div class="kv-bloggrid" data-result-count="{{ $posts->total().' '.Str::plural('article', $posts->total()) }}">
              @forelse($posts as $post)
                @include('partials.kv.blog-card', ['entry' => $post, 'level' => 'h3'])
              @empty
                <div class="kv-empty">
                  @if($query !== '')
                    No articles found for “{{ $query }}”.
                  @else
                    No articles published yet. Check back soon.
                  @endif
                </div>
              @endforelse
            </div>

            @if($posts->hasPages())
              <div class="kv-pagination">
                {{ $posts->onEachSide(1)->links('pagination.kv') }}
              </div>
            @endif
          @endfragment
        </div>
      </div>
    </div>
  </section>
</div>

<section class="kv-subsection kv-subsection--olive blog-cta">
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

@push('scripts')
<script>
  (() => {
    const input = document.getElementById('blog-search');
    const form = input.form;
    const results = document.getElementById('blog-search-results');
    const status = document.getElementById('blog-search-status');
    let timer;
    let pending;
    function scheduleSearch(delay) {
      clearTimeout(timer);
      pending?.abort();
      status.classList.add('sr-only');
      status.textContent = 'Searching…';
      results.setAttribute('aria-busy', 'true');
      timer = setTimeout(updateResults, delay);
    }
    async function updateResults() {
      const query = input.value.trim();
      const url = new URL(form.action);
      if (query) url.searchParams.set('q', query);
      const endpoint = new URL(url);
      endpoint.searchParams.set('_results', '1');
      const request = new AbortController();
      pending = request;
      try {
        const response = await fetch(endpoint, { signal: request.signal });
        if (!response.ok) throw new Error('Blog search failed');
        const fragment = document.createElement('template');
        fragment.innerHTML = await response.text();
        if (request.signal.aborted) return;
        const grid = fragment.content.querySelector('[data-result-count]');
        if (!grid) throw new Error('Missing search results');
        results.replaceChildren(fragment.content);
        status.textContent = `${grid.dataset.resultCount} found.`;
        window.history.replaceState(window.history.state, '', url);
      } catch {
        if (request.signal.aborted) return;
        status.classList.remove('sr-only');
        status.textContent = 'Search results could not be updated. Try again.';
      } finally {
        if (!request.signal.aborted) results.removeAttribute('aria-busy');
      }
    }
    input.addEventListener('input', (event) => {
      if (!event.isComposing) scheduleSearch(250);
    });
    input.addEventListener('compositionend', () => scheduleSearch(250));
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      scheduleSearch(0);
    });
  })();
</script>
@endpush
