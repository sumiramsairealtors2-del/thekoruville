@extends('layouts.kv')

@section('title', 'Page not found | The Koru Ville')
@section('description', 'The page you are looking for could not be found. Explore The Koru Ville plots, blog and contact details.')
@section('errorPage', 'true')

@section('content')

<section class="kv-404" aria-labelledby="kv-404-title">
  <div class="kv-shell kv-404__shell">
    <div class="kv-404__box">
      <p class="kv-404__code">Error 404</p>
      <h1 id="kv-404-title">Page not found</h1>
      <p class="kv-404__message">This page may have moved. You can return to the homepage or explore the blog.</p>
      <div class="kv-404__actions">
        <a class="kv-btn kv-btn--olive" href="{{ url('/') }}">Back to home</a>
        <a class="kv-btn kv-btn--ghost" href="{{ route('posts.index') }}">Read the blog</a>
      </div>
      <button type="button" class="kv-404__enquiry" data-kv-open="enquiry">Enquire about plots</button>
    </div>
    <img class="kv-404__image" src="{{ asset('assets/img/kv/why-800.webp') }}"
         srcset="{{ asset('assets/img/kv/why-520.webp') }} 520w, {{ asset('assets/img/kv/why-800.webp') }} 800w"
         sizes="(max-width: 720px) calc(100vw - 48px), (max-width: 1120px) 45vw, 480px"
         width="800" height="800" alt="">
  </div>
</section>

@endsection
