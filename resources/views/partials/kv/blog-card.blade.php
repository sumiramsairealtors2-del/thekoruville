<article class="kv-postcard blog-post">
  <a href="{{ route('posts.show', $entry) }}" class="kv-postcard__media" tabindex="-1" aria-hidden="true">
    <img src="{{ $entry->image ? $entry->imageUrl() : asset('assets/img/kv/gallery-900.webp') }}"
         alt="" loading="lazy" decoding="async">
  </a>
  <div class="kv-postcard__body">
    @if($date = $entry->created_at ?? $entry->updated_at)
      <time class="kv-postcard__date" datetime="{{ $date->toDateString() }}">{{ $date->format('M d, Y') }}</time>
    @endif
    <{{ $level }}><a href="{{ route('posts.show', $entry) }}">{{ $entry->title }}</a></{{ $level }}>
    <p>{{ $entry->meta_description ?: Str::limit(strip_tags($entry->content), 130) }}</p>
    <a href="{{ route('posts.show', $entry) }}" class="kv-postcard__more" aria-label="Read more about {{ $entry->title }}">Read More</a>
  </div>
</article>
