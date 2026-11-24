<style>
  .kv-diagonal-hero {
    position: relative;
    isolation: isolate;
    display: grid;
    align-items: center;
    min-height: clamp(490px, 45vw, 670px);
  }

  .kv-diagonal-hero .kv-diagonal-hero-copy {
    width: 46%;
    min-width: 0;
    padding: clamp(30px, 6vw, 90px) clamp(18px, 4vw, 60px);
  }

  .kv-diagonal-hero .kv-diagonal-hero-label {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: var(--kv-olive);
    font-size: .875rem;
    letter-spacing: .12em;
    text-transform: uppercase;
  }

  .kv-diagonal-hero-label::before {
    content: "";
    width: 30px;
    border-top: 1px solid currentColor;
  }

  .kv-diagonal-hero h1 {
    margin-block: 20px;
    font-size: var(--kv-diagonal-heading-size, clamp(3rem, 6.6vw, 7rem));
    line-height: .99;
  }

  .kv-diagonal-hero h1 span { display: block; color: #53603b; }
  .kv-diagonal-hero p { max-width: 40ch; }

  .kv-diagonal-hero .kv-diagonal-hero-image {
    --kv-diagonal-cut: 31%;
    --kv-diagonal-round: 18px;
    position: absolute;
    z-index: -1;
    inset: 0 0 0 auto;
    width: 56%;
    height: 100%;
    object-fit: cover;
    object-position: var(--kv-diagonal-image-position, 63% center);
    border-top-left-radius: var(--kv-diagonal-round);
    clip-path: polygon(var(--kv-diagonal-cut) 0, 100% 0, 100% 100%, 0 100%);
    clip-path: shape(from calc(var(--kv-diagonal-cut) + var(--kv-diagonal-round)) 0, line to 100% 0,
      line to 100% 100%, line to 0 100%, line to calc(var(--kv-diagonal-cut) - 5px) 12px,
      curve to calc(var(--kv-diagonal-cut) + var(--kv-diagonal-round)) 0 with var(--kv-diagonal-cut) 0, close);
  }

  .kv-diagonal-hero .kv-diagonal-hero-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 12px 20px;
    margin-top: 26px;
  }

  .kv-diagonal-hero-actions a:not(.kv-btn) { font-size: .9rem; text-decoration: underline; text-underline-offset: 4px; }

  .kv-diagonal-hero .kv-diagonal-hero-actions .kv-btn {
    min-height: 46px;
    padding: 8px 18px;
    border-width: 1px;
    border-radius: 0;
    font-size: .875rem;
    letter-spacing: .06em;
    text-align: center;
    white-space: normal;
  }

  @media (max-width: 900px) {
    .kv-diagonal-hero .kv-diagonal-hero-copy { width: 51%; }
    .kv-diagonal-hero .kv-diagonal-hero-image { width: 50%; }
  }

  @media (max-width: 720px) {
    .kv-diagonal-hero { min-height: 0; }
    .kv-diagonal-hero .kv-diagonal-hero-copy { width: 100%; padding-block: 26px 20px; }
    .kv-diagonal-hero .kv-diagonal-hero-image {
      --kv-diagonal-cut: 8%;
      --kv-diagonal-round: 12px;
      position: static;
      width: 100%;
      height: clamp(200px, 65vw, 380px);
    }
  }
</style>
