@extends('layouts.kv')

@section('title', 'Blog | Residential Plots News & Guides – The Koru Ville')
@section('description', 'Read guides and updates on residential plots near Jim Corbett, Kilawali and Kashipur — insights from the team at The Koru Ville on land, location and living.')
@section('hero', '1')

@section('head')
@vite('resources/css/blog.css')
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

@include('partials.kv.pagehero', [
  'id' => 'blog',
  'eyebrow' => 'The Koru Ville · Journal',
  'title' => 'The Koru Ville Blog',
  'lede' => 'Guides, location intelligence and honest answers for anyone evaluating residential plots near Jim Corbett — written by the team behind The Koru Ville in Kilawali, Uttarakhand.',
  'image' => 'assets/img/Sunset Villa Overlooking a Tropical Valley.png',
  'imageWidth' => 1920,
  'imageHeight' => 1080,
  'alt' => 'Sunset villa overlooking a tropical valley near Jim Corbett',
  'meta' => [$posts->total().' '.Str::plural('article', $posts->total()), 'Land · Location · Living'],
])



<section class="kv-subsection">
  <div class="kv-shell">
    <div class="kv-section-head" >
      <span class="kv-eyebrow">Latest Articles</span>
      <h2 class="kv-display">Insights on land, location &amp; living</h2>
    </div>

    <div class="blog-filter-bar">
      <form action="{{ route('posts.index') }}" method="GET" class="blog-search-form" role="search">
        <label class="sr-only" for="blog-search">Search blog</label>
        <input type="search" name="q" id="blog-search" class="blog-search-input" placeholder="Search articles…" value="{{ $query }}" autocomplete="off">
        <button type="submit" class="blog-search-btn" aria-label="Search">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        </button>
      </form>
    </div>

    <p id="blog-search-status" role="status" class="sr-only"></p>
    <div id="blog-search-results">
    @fragment('blog-results')
    <div class="kv-bloggrid" data-result-count="{{ $posts->total().' '.Str::plural('article', $posts->total()) }}">
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

    <script>
      (() => {
        const input = document.getElementById('blog-search');
        const form = input.form;
        const button = form.querySelector('.blog-search-btn');
        const results = document.getElementById('blog-search-results');
        const status = document.getElementById('blog-search-status');
        const articleCount = document.querySelector('#blog .kv-pagehero__meta span');
        let timer;
        let pending;

        function setExpanded(expanded) {
          form.classList.toggle('is-collapsed', !expanded);
          input.inert = !expanded;
          button.type = expanded ? 'submit' : 'button';
          button.setAttribute('aria-expanded', String(expanded));
          button.setAttribute('aria-label', expanded ? 'Search' : 'Open blog search');
        }

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
            grid.querySelectorAll('.kv-reveal').forEach((card) => card.classList.add('is-in'));
            results.replaceChildren(fragment.content);
            if (articleCount) articleCount.textContent = grid.dataset.resultCount;
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

        button.setAttribute('aria-controls', input.id);
        setExpanded(input.value.trim() !== '');

        button.addEventListener('click', (event) => {
          if (!input.inert) return;
          event.preventDefault();
          setExpanded(true);
          input.focus({ preventScroll: true });
        });

        input.addEventListener('input', (event) => {
          if (!event.isComposing) scheduleSearch(250);
        });
        input.addEventListener('compositionend', () => scheduleSearch(250));

        form.addEventListener('submit', (event) => {
          event.preventDefault();
          scheduleSearch(0);
        });

        form.addEventListener('keydown', (event) => {
          if (event.key !== 'Escape' || event.isComposing || input.inert) return;
          event.preventDefault();
          button.focus();
          setExpanded(false);
        });

        document.addEventListener('click', (event) => {
          if (!input.inert && !form.contains(event.target)) setExpanded(false);
        });
      })();
    </script>
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
