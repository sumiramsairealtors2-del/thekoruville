@extends('layouts.kv')

@php
  $published = $post->created_at ?? $post->updated_at;
  $excerpt = $post->meta_description ?: Str::limit(strip_tags($post->content ?? ''), 190);
  /*
    Blog cover dummies (fallback when a post has no usable image) — replace these
    three files with real uploads at the SAME dimensions:
      desktop  2000x1000  (2:1)   ->  public/assets/img/kv/art-hero/hero-desktop-2000x1000.jpg
      tablet   1600x1200  (4:3)   ->  public/assets/img/kv/art-hero/hero-tablet-1600x1200.jpg
      mobile   1080x1200  (9:10)  ->  public/assets/img/kv/art-hero/hero-mobile-1080x1200.jpg

    If the post HAS an image, we read its real pixel dimensions and set
    --kv-hero-ratio on the hero frame, so the frame matches the image exactly:
    no cropping, no blank bars — any upload dimension renders correctly.
  */
  $heroImageDesktop = asset('assets/img/kv/art-hero/hero-desktop-2000x1000.jpg');
  $heroImageTablet  = asset('assets/img/kv/art-hero/hero-tablet-1600x1200.jpg');
  $heroImageMobile  = asset('assets/img/kv/art-hero/hero-mobile-1080x1200.jpg');
  $heroImage = $heroImageDesktop;
  $heroRatio = null; // only set when a real uploaded image is used
  $heroImgW = null;
  $heroImgH = null;
  if (!empty($post->image)) {
      $heroPath = public_path('storage/'.$post->image);
      if (is_file($heroPath)) {
          $dims = @getimagesize($heroPath);
          if ($dims) {
              $heroImgW = $dims[0];
              $heroImgH = $dims[1];
              $heroRatio = round($heroImgW / $heroImgH, 4);
              $heroImageDesktop = $heroImageTablet = $heroImageMobile = asset('storage/'.$post->image);
              $heroImage = $heroImageDesktop;
          }
      }
  }
  $pageUrl = url()->current();
  $canonical = $post->canonical_url ?: $pageUrl;
  $shareUrl = rawurlencode($pageUrl);
  $shareTitle = rawurlencode($post->title);
@endphp

@section('title', $post->meta_title ?? $post->title)
@section('description', $post->meta_description ?? Str::limit(strip_tags($post->content ?? ''), 160))
@section('hero', '1')

@section('head')
<meta property="og:type" content="article">
<meta property="og:title" content="{{ $post->meta_title ?? $post->title }}">
<meta property="og:description" content="{{ $post->meta_description ?? Str::limit(strip_tags($post->content ?? ''), 160) }}">
<meta property="og:url" content="{{ $canonical }}">
@if($published)
<meta property="article:published_time" content="{{ $published->toAtomString() }}">
@endif
@if($post->updated_at)
<meta property="article:modified_time" content="{{ $post->updated_at->toAtomString() }}">
@endif
<meta property="article:section" content="Land · Location · Living">
@if($post->image)
<meta property="og:image" content="{{ $heroImage }}">
@endif
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BlogPosting",
  "headline": @json($post->title),
  "description": @json($post->meta_description ?? Str::limit(strip_tags($post->content ?? ''), 160)),
  "datePublished": @json(optional($published)->toAtomString()),
  "dateModified": @json(optional($post->updated_at)->toAtomString()),
  "mainEntityOfPage": @json($canonical),
  "author": {"@type": "Organization", "name": "The Koru Ville"},
  "publisher": {"@type": "Organization", "name": "The Koru Ville", "logo": {"@type": "ImageObject", "url": "{{ asset('assets/img/Logo.webp') }}"}}
  @if($post->image)
  ,"image": "{{ $heroImage }}"
  @endif
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}"},
    {"@type": "ListItem", "position": 2, "name": "Journal", "item": "{{ url('/blog') }}"},
    {"@type": "ListItem", "position": 3, "name": @json($post->title), "item": @json($canonical)}
  ]
}
</script>
@endsection

@section('content')

<div class="kv-art-progress" aria-hidden="true"><span data-kv-progress></span></div>

<article class="kv-art">

  {{-- ============================================================== cover --}}
  <section class="kv-art-hero" aria-label="Article cover">
    <div class="kv-art-hero__frame"@if($heroRatio) style="--kv-hero-ratio: {{ $heroRatio }}"@endif>
      <div class="kv-art-hero__media">
        <picture>
          <source media="(max-width:720px)" srcset="{{ $heroImageMobile }}"@if($heroImgW) width="{{ $heroImgW }}" height="{{ $heroImgH }}"@endif>
          <source media="(min-width:721px) and (max-width:1100px)" srcset="{{ $heroImageTablet }}"@if($heroImgW) width="{{ $heroImgW }}" height="{{ $heroImgH }}"@endif>
          <img src="{{ $heroImageDesktop }}" alt="{{ $post->title }}"@if($heroImgW) width="{{ $heroImgW }}" height="{{ $heroImgH }}"@else width="2000" height="1000"@endif fetchpriority="high">
        </picture>
      </div>
      <div class="kv-art-hero__shade" aria-hidden="true"></div>

      {{-- <div class="kv-art-hero__content">
        <div class="kv-art-hero__top">
          <span class="kv-eyebrow">The Koru Ville · Journal</span>
          <a class="kv-art-back" href="{{ url('/blog') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6"/></svg>
            All articles
          </a>
        </div>
      </div> --}}

    </div>
  </section>

  {{-- ================================================================ body --}}
  <div class="kv-art-body">
    <div class="kv-shell">
      <div class="kv-art-grid">

        <div class="kv-art-main">
          <div class="kv-art-meta">
            <div class="kv-art-byline">
              <span class="kv-art-avatar" aria-hidden="true">KV</span>
              <span class="kv-art-byline__text">
                <b>The Koru Ville Editorial</b>
                <em>Kilawali · Jim Corbett</em>
              </span>
            </div>

            <dl class="kv-art-meta__stats">
              @if($published)
                <div>
                  <dt>Published</dt>
                  <dd><time datetime="{{ $published->toDateString() }}">{{ $published->format('M d, Y') }}</time></dd>
                </div>
              @endif
              <div>
                <dt>Reading time</dt>
                <dd>{{ $readMinutes }} min read</dd>
              </div>
              {{-- <div>
                <dt>Filed under</dt>
                <dd>Land · Location · Living</dd>
              </div> --}}
            </dl>
          </div>

          {{-- mobile-only inline copy of "In this article" (sidebar TOC is desktop/tablet) --}}
          @if(count($toc))
            <details class="kv-toc kv-toc--inline" data-kv-toc>
              <summary>
                In this article
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
              </summary>
              <ol>
                @foreach($toc as $index => $item)
                  <li>
                    <a href="#{{ $item['id'] }}" data-kv-toc-link>
                      <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                      {{ $item['text'] }}
                    </a>
                  </li>
                @endforeach
              </ol>
            </details>
          @endif

          <div class="kv-art-hero__main">
            <h1 class="kv-art-title">{{ $post->title }}</h1>

            @if($excerpt)
              <p class="kv-art-lede">{{ $excerpt }}</p>
            @endif

          </div>

          <div class="kv-prose kv-art-prose">
            {!! $content !!}
          </div>

          {{-- share --}}
          <div class="kv-art-share">
            <span class="kv-art-share__label">Share this story</span>
            <div class="kv-art-share__links">
              <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank" rel="noopener noreferrer">WhatsApp</a>
              <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&amp;url={{ $shareUrl }}" target="_blank" rel="noopener noreferrer">X</a>
              <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank" rel="noopener noreferrer">LinkedIn</a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener noreferrer">Facebook</a>
              <button type="button" data-kv-copy="{{ $pageUrl }}">Copy link</button>
            </div>
            <span class="kv-art-share__status" data-kv-copy-status role="status" aria-live="polite"></span>
          </div>

          {{-- author --}}
          <div class="kv-art-author">
            <span class="kv-art-author__mark" aria-hidden="true">KV</span>
            <div class="kv-art-author__body">
              <b>The Koru Ville Editorial</b>
              <p>Field notes on land, location and living around Jim Corbett — written by the team behind The Koru Ville, Kilawali.</p>
            </div>
            <a class="kv-link-arrow" href="{{ url('/blog') }}">
              All stories
              <i><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></i>
            </a>
          </div>

          {{-- previous / next --}}
          @if($prevPost || $nextPost)
            <nav class="kv-art-pager" aria-label="Article navigation">
              @if($prevPost)
                <a href="{{ route('posts.show', $prevPost) }}" class="kv-art-pager__link">
                  <span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6"/></svg>
                    Previous story
                  </span>
                  <b>{{ $prevPost->title }}</b>
                </a>
              @endif

              @if($nextPost)
                <a href="{{ route('posts.show', $nextPost) }}" class="kv-art-pager__link kv-art-pager__link--next">
                  <span>
                    Next story
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                  </span>
                  <b>{{ $nextPost->title }}</b>
                </a>
              @endif
            </nav>
          @endif

        </div>

        {{-- sidebar --}}
        <aside class="kv-art-aside">

          @if(count($toc))
            <details class="kv-toc" data-kv-toc open>
              <summary>
                In this article
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
              </summary>
              <ol>
                @foreach($toc as $index => $item)
                  <li>
                    <a href="#{{ $item['id'] }}" data-kv-toc-link>
                      <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                      {{ $item['text'] }}
                    </a>
                  </li>
                @endforeach
              </ol>
            </details>
          @endif

          <div class="kv-art-aside-cta">
            <span class="kv-eyebrow">The Koru Ville</span>
            <h2>Walk the land before you decide</h2>
            <p>RERA-approved residential plots at Kilawali, fifteen minutes from the Phato gate of Jim Corbett.</p>
            <button type="button" class="kv-btn kv-btn--gold kv-btn--sm kv-btn--block" data-kv-open="enquiry">Book a site visit</button>
            <a class="kv-art-aside-cta__phone" href="tel:+918377000300">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.9 2.3Z"/></svg>
              +91 8377 000300
            </a>
          </div>

        </aside>

      </div>
    </div>
  </div>

  {{-- ========================================================= keep reading --}}
  @if($related->isNotEmpty())
    <section class="kv-subsection kv-art-more">
      <div class="kv-shell">
        <div class="kv-art-more__head">
          <div>
            <span class="kv-eyebrow">Keep reading</span>
            <h2 class="kv-display kv-display--md">More from the journal</h2>
          </div>
          <a class="kv-btn kv-btn--ghost kv-btn--sm" href="{{ url('/blog') }}">All articles</a>
        </div>

        <div class="kv-bloggrid">
          @foreach($related as $relatedPost)
            <article class="kv-postcard">
              <a href="{{ route('posts.show', $relatedPost) }}" class="kv-postcard__media" tabindex="-1" aria-hidden="true">
                @if($relatedPost->image)
                  <img src="{{ asset('storage/'.$relatedPost->image) }}" alt="{{ $relatedPost->title }}" loading="lazy">
                @else
                  <img src="{{ asset('assets/img/kv/gallery-900.webp') }}" alt="" loading="lazy">
                @endif
              </a>
              <div class="kv-postcard__body">
                <span class="kv-postcard__date">{{ ($relatedPost->created_at ?? $relatedPost->updated_at)?->format('M d, Y') }}</span>
                <h3><a href="{{ route('posts.show', $relatedPost) }}">{{ $relatedPost->title }}</a></h3>
                <p>{{ $relatedPost->meta_description ?: Str::limit(strip_tags($relatedPost->content), 130) }}</p>
                <a href="{{ route('posts.show', $relatedPost) }}" class="kv-postcard__more">
                  Read More
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- ================================================================= cta --}}
  <section class="kv-subsection kv-subsection--olive kv-art-cta">
    <div class="kv-shell">
      <div class="kv-cta-row">
        <div>
          <span class="kv-eyebrow">Ready to see it in person?</span>
          <h2 class="kv-display">Plots at the gateway to Jim Corbett</h2>
          <p class="kv-lede" style="color:rgba(235,228,204,.72);max-width:52ch;">Share your details and our team will call with availability, pricing and a site-visit slot.</p>
        </div>
        <div class="kv-cta-row__actions">
          <button type="button" class="kv-btn kv-btn--gold" data-kv-open="enquiry">Enquire About Plots</button>
          <a class="kv-btn kv-btn--outline" href="{{ url('/blog') }}">Back to the Blog</a>
        </div>
      </div>
    </div>
  </section>

</article>

@endsection
