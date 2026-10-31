@extends('layouts.kv')

@section('title', 'About The Koru Ville | Resort-Themed Plots Near Jim Corbett')
@section('description', 'The Koru Ville is a 3.5-acre resort-themed residential plotted township in Kilawali, Kashipur, just outside the Jim Corbett National Park boundary.')
@section('hero', '1')

@section('content')

<div class="kv-subpage">

  @include('partials.kv.pagehero', [
    'eyebrow' => 'About Us',
    'title' => 'About The Koru Ville',
    'lede' => 'A resort-themed residential plotted township along the Kashipur–Ramnagar highway belt, built around the forest rather than over it.',
    'image' => 'assets/img/slots/hero-02-desktop-1920x1080.webp',
    'imageMobile' => 'assets/img/slots/hero-02-mobile-900x1600.webp',
    'imageWidth' => 1920,
    'imageHeight' => 1080,
    'alt' => 'The Koru Ville at dusk',
  ])

  <section class="kv-panel kv-panel--cream kv-about">
    <div class="kv-shell">
      <div class="kv-about__grid" data-mv-group="110">
        <div class="kv-stats" data-mv="right" data-mv-count-group>
          <div class="kv-stat">
            <b><span data-mv-count="3.5" data-mv-decimals="1">3.5</span> Acres</b>
            <span>Resort-themed township</span>
          </div>
          <div class="kv-stat">
            <b><span data-mv-count="15">15</span> Min</b>
            <span>Drive to Phato Gate</span>
          </div>
        </div>

        <div class="kv-about__copy" data-mv="left">
          <p>Spread across 3.5 acres, <strong>The Koru Ville</strong> is a resort-themed residential plotted township along the Kashipur–Ramnagar highway belt, just outside the notified <strong>Jim Corbett National Park</strong> boundary — close enough to feel the forest every day, without ever crossing into the reserve itself.</p>
          <p class="kv-about__note">111 / 125 / 139 sq.yd &nbsp;·&nbsp; Kilawali, Kashipur</p>
        </div>
      </div>
    </div>
  </section>

</div>

@endsection
