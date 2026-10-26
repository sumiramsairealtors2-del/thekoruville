@extends('layouts.kv')

@section('title', 'Page not found | The Koru Ville')
@section('description', 'The page you are looking for could not be found. Explore The Koru Ville plots, blog and contact details.')

@section('content')

<section class="kv-404">
  <div class="kv-shell">
    <div class="kv-404__box">
      <p class="kv-404__code">404</p>
      <h1>This path leads nowhere</h1>
      <p>The page you are looking for has moved or never existed. Head back to the township, browse the journal, or call our team for plot details.</p>
      <div class="kv-404__actions">
        <a class="kv-btn kv-btn--gold" href="{{ url('/') }}">Back to Home</a>
        <a class="kv-btn kv-btn--outline" href="{{ url('/blog') }}">Read the Blog</a>
        <button type="button" class="kv-btn kv-btn--outline" data-kv-open="enquiry">Enquire Now</button>
      </div>
    </div>
  </div>
</section>

@endsection
