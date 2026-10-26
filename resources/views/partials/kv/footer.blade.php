{{-- Footer --}}
<footer class="kv-footer">
  <div class="kv-shell">
    <div class="kv-footer__grid">

      <div class="kv-footer__brand">
        <img src="{{ asset('assets/img/Logo.webp') }}" alt="The Koru Ville" width="1093" height="589" loading="lazy">
        <p><a href="{{ url('/') }}">The Koru Ville</a> is the sole official website for The Koru Ville, developed by Sumiram Sai Realtors Group. Any third-party website, landing page, or listing is not authorized and does not represent The Koru Ville.</p>

        <div class="kv-social">
          <a href="https://www.youtube.com/@TheKoruVilleOfficial" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.6 7.2c-.2-1-1-1.8-2-2C17.7 4.8 12 4.8 12 4.8s-5.7 0-7.6.4c-1 .2-1.8 1-2 2C2 9.1 2 12 2 12s0 2.9.4 4.8c.2 1 1 1.8 2 2 1.9.4 7.6.4 7.6.4s5.7 0 7.6-.4c1-.2 1.8-1 2-2 .4-1.9.4-4.8.4-4.8s0-2.9-.4-4.8ZM10 15.2V8.8l5.2 3.2-5.2 3.2Z"/></svg>
          </a>
          <a href="https://www.linkedin.com/company/the-koru-ville" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9h4v12H3V9Zm6.5 0h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05C21 8.65 22 10.7 22 14v7h-4v-6.2c0-1.5-.03-3.4-2.07-3.4-2.07 0-2.38 1.6-2.38 3.3V21h-4V9Z"/></svg>
          </a>
          <a href="https://www.facebook.com/TheKoruVille" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 21v-7h2.4l.4-3H14V9.2c0-.9.3-1.5 1.6-1.5H17V5.1c-.3 0-1.3-.1-2.4-.1-2.4 0-4 1.4-4 4.1V11H8v3h2.6v7H14Z"/></svg>
          </a>
          <a href="https://www.instagram.com/thekoruville/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.3" cy="6.7" r="1" fill="currentColor" stroke="none"/></svg>
          </a>
          <a href="https://in.pinterest.com/thekoruville/" target="_blank" rel="noopener noreferrer" aria-label="Pinterest">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-3.6 19.3c-.1-.8-.2-2 0-2.9l1.2-5s-.3-.6-.3-1.5c0-1.4.8-2.4 1.8-2.4.9 0 1.3.6 1.3 1.4 0 .9-.6 2.2-.9 3.4-.2 1 .5 1.9 1.6 1.9 1.9 0 3.3-2 3.3-4.9 0-2.5-1.8-4.3-4.4-4.3-3 0-4.8 2.3-4.8 4.6 0 .9.4 1.9.8 2.4.1.1.1.2.1.3l-.3 1.2c0 .2-.2.3-.4.2-1.3-.6-2.1-2.5-2.1-4 0-3.3 2.4-6.3 6.9-6.3 3.6 0 6.4 2.6 6.4 6 0 3.6-2.3 6.5-5.4 6.5-1.1 0-2.1-.6-2.4-1.2l-.7 2.5c-.2.9-.8 2-1.2 2.7A10 10 0 1 0 12 2Z"/></svg>
          </a>
        </div>
      </div>

      <div>
        <h4>Explore</h4>
        <ul>
          <li><a href="{{ url('/') }}#about">About</a></li>
          <li><a href="{{ url('/blog') }}">Blogs</a></li>
          <li><a href="{{ url('/') }}#amenities">Amenities</a></li>
          <li><a href="{{ url('/') }}#why-this-location">Why This Location</a></li>
          <li><a href="{{ url('/') }}#layout-price">Layout &amp; Price</a></li>
        </ul>
      </div>

      <div>
        <h4>Connect</h4>
        <ul>
          <li><a href="{{ url('/') }}#map">Map</a></li>
          <li><a href="{{ url('/') }}#faq">FAQ</a></li>
          <li><a href="{{ url('/') }}#contact">Contact Us</a></li>
          <li><a href="#" data-kv-open="brochure">Download Brochure</a></li>
        </ul>
      </div>

      <div class="kv-footer__legal-group">
        <div>
          <h4>Legal</h4>
          <ul>
            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="{{ url('/terms-and-conditions') }}">Terms &amp; Conditions</a></li>
          </ul>
        </div>

        {{-- Compact RERA details, sitting to the right of Legal --}}
        <div class="kv-footer__rera" id="rera-details">
          <div class="kv-footer__rera-info">
            <h4>RERA Details</h4>

            <a class="kv-footer__rera-no"
               href="https://up-rera.in/projects"
               target="_blank"
               rel="noopener noreferrer">
              UPRERAPRJ622344/11/2025
            </a>

            <p class="kv-footer__rera-meta">Launch 04-11-2025</p>
            <p class="kv-footer__rera-meta">
              KOTAK MAHINDRA BANK<br>
              A/C 9150397619<br>
              IFSC KKBK0005028
            </p>
          </div>

          <div class="kv-footer__rera-qr">
            <img src="{{ asset('assets/img/rera-qr.png') }}"
                 alt="QR code linking to the UP-RERA project registration"
                 width="84" height="84" loading="lazy">
            <span>Scan to verify</span>
          </div>
        </div>
      </div>

    </div>

    <div class="kv-footer__bottom">
      <span>&copy; {{ date('Y') }} The Koru Ville. All rights reserved. — Land of New Beginnings.</span>
      <span>RERA Reg. No. — UPRERAPRJ622344/11/2025</span>
    </div>
  </div>
</footer>
