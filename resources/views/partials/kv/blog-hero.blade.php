<div class="blog-hero-frame">
  <section class="blog-hero kv-diagonal-hero" aria-labelledby="blog-hero-title">
    <div class="kv-diagonal-hero-copy">
      <span class="kv-diagonal-hero-label">The Koru Ville · Journal</span>
      <h1 id="blog-hero-title">{{ $heading }}</h1>
      <nav aria-label="Breadcrumb" class="blog-crumbs">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          @if($isArticle)
            <li><a href="{{ route('posts.index') }}">Blog</a></li>
            <li aria-current="page">{{ $heading }}</li>
          @else
            <li aria-current="page">Blog</li>
          @endif
        </ol>
      </nav>
    </div>
    <img class="kv-diagonal-hero-image" src="{{ $image }}" alt="" fetchpriority="high">
  </section>
</div>
