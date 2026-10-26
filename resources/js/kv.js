/* ==========================================================================
   THE KORU VILLE — redesign (v2) interactions
   Vanilla, no dependencies. Loaded by layouts/kv.blade.php.
   ========================================================================== */
(function () {
  'use strict';

  var CRM_ENDPOINT = 'https://sumiramsairealtors.in/public/c/the-koruville-0b3hk/submit';
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ------------------------------------------------------------ helpers */
  function $(sel, ctx) { return (ctx || document).querySelector(sel); }
  function $$(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }

  /* ------------------------------------------------------------- drawer */
  var drawer = $('#kvDrawer');
  var burger = $('#kvBurger');

  function openDrawer() {
    if (!drawer) return;
    drawer.classList.add('is-open');
    drawer.removeAttribute('aria-hidden');
    if (burger) burger.setAttribute('aria-expanded', 'true');
    document.body.classList.add('is-locked');
    var first = drawer.querySelector('a, button');
    if (first) first.focus();
  }
  function closeDrawer() {
    if (!drawer) return;
    drawer.classList.remove('is-open');
    drawer.setAttribute('aria-hidden', 'true');
    if (burger) {
      burger.setAttribute('aria-expanded', 'false');
      burger.focus();
    }
    document.body.classList.remove('is-locked');
  }
  if (burger) {
    burger.addEventListener('click', function () {
      if (drawer.classList.contains('is-open')) closeDrawer(); else openDrawer();
    });
  }
  if (drawer) {
    drawer.addEventListener('click', function (e) {
      if (e.target.closest('[data-kv-close]') || e.target.closest('a')) closeDrawer();
    });
  }

  /* --------------------------------------------------------------- hero */
  var slides = $$('.kv-hero__slide');
  var dots = $$('.kv-hero__dots button');
  var heroIndex = 0;
  var heroTimer = null;

  function showSlide(i) {
    if (!slides.length) return;
    heroIndex = (i + slides.length) % slides.length;
    slides.forEach(function (s, k) {
      s.classList.toggle('is-active', k === heroIndex);
      s.setAttribute('aria-hidden', k === heroIndex ? 'false' : 'true');
    });
    dots.forEach(function (d, k) {
      d.setAttribute('aria-current', k === heroIndex ? 'true' : 'false');
    });
  }
  function nextSlide(step) {
    showSlide(heroIndex + step);
    restartHero();
  }
  function restartHero() {
    if (heroTimer) clearInterval(heroTimer);
    if (reduceMotion || slides.length < 2) return;
    heroTimer = setInterval(function () { showSlide(heroIndex + 1); }, 7000);
  }
  var prevBtn = $('.kv-hero__arrow--prev');
  var nextBtn = $('.kv-hero__arrow--next');
  if (prevBtn) prevBtn.addEventListener('click', function () { nextSlide(-1); });
  if (nextBtn) nextBtn.addEventListener('click', function () { nextSlide(1); });
  dots.forEach(function (d, k) { d.addEventListener('click', function () { showSlide(k); restartHero(); }); });
  var heroFrame = $('.kv-hero__frame');
  if (heroFrame) {
    heroFrame.addEventListener('mouseenter', function () { if (heroTimer) clearInterval(heroTimer); });
    heroFrame.addEventListener('mouseleave', restartHero);
  }
  restartHero();

  /* ------------------------------------------------------------- reveal */
  var reveals = $$('.kv-reveal');
  if (reveals.length) {
    if ('IntersectionObserver' in window && !reduceMotion) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-in');
            io.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
      reveals.forEach(function (el) { io.observe(el); });
    } else {
      reveals.forEach(function (el) { el.classList.add('is-in'); });
    }
  }

  /* ------------------------------------------------------------- modals */
  var lastFocus = null;

  function openModal(key) {
    var modal = $('#kvModal-' + key);
    if (!modal) return;
    lastFocus = document.activeElement;
    modal.classList.add('is-open');
    modal.removeAttribute('aria-hidden');
    document.body.classList.add('is-locked');
    var focusable = modal.querySelector('input, button, a');
    if (focusable) focusable.focus();
  }
  function closeModal(modal) {
    if (!modal) return;
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    if (!document.querySelector('.kv-modal.is-open')) document.body.classList.remove('is-locked');
    if (lastFocus) lastFocus.focus();
  }

  document.addEventListener('click', function (e) {
    var opener = e.target.closest('[data-kv-open]');
    if (opener) {
      e.preventDefault();
      var key = opener.getAttribute('data-kv-open');
      if (key === 'unlock') {
        var target = opener.getAttribute('data-unlock') || 'layout';
        var title = $('#kvUnlockTitle');
        var message = $('#kvUnlockMessage');
        var field = $('#kvUnlockTarget');
        if (title) title.textContent = target === 'price' ? 'Unlock Price List' : 'Unlock Layout Plan';
        if (message) {
          message.textContent = target === 'price'
            ? 'Share a few details to unlock the current, plot-wise price breakup.'
            : 'Share a few details to unlock the full site layout and plot numbering.';
        }
        if (field) field.value = target;
      }
      openModal(key);
      return;
    }
    var closer = e.target.closest('[data-kv-close-modal]');
    if (closer) { closeModal(closer.closest('.kv-modal')); return; }
    if (e.target.classList.contains('kv-modal')) closeModal(e.target);
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      var open = document.querySelector('.kv-modal.is-open');
      if (open) { closeModal(open); return; }
      if (drawer && drawer.classList.contains('is-open')) closeDrawer();
    }
    if (e.key === 'Tab') {
      var modal = document.querySelector('.kv-modal.is-open');
      if (!modal) return;
      var focusables = $$('a[href], button:not([disabled]), input, textarea, select', modal);
      if (!focusables.length) return;
      var first = focusables[0];
      var last = focusables[focusables.length - 1];
      if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
      else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
    }
  });

  /* --------------------------------------------------------------- forms */
  function setStatus(form, type, text) {
    var status = form.querySelector('.kv-form__status');
    if (!status) return;
    status.className = 'kv-form__status ' + (type === 'ok' ? 'is-ok' : 'is-bad');
    status.textContent = text;
  }

  function fieldError(input, message) {
    var wrap = input.closest('.kv-field');
    if (!wrap) return;
    wrap.classList.toggle('has-error', !!message);
    var err = wrap.querySelector('.kv-form__error');
    if (err && message) err.textContent = message;
    input.setAttribute('aria-invalid', message ? 'true' : 'false');
  }

  function validate(form) {
    var ok = true;
    var name = form.querySelector('[name="name"]');
    var email = form.querySelector('[name="email"]');
    var phone = form.querySelector('[name="mobile"]');

    if (name && !name.value.trim()) { fieldError(name, 'Please enter your name.'); ok = false; } else if (name) fieldError(name, '');
    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email.value.trim())) { fieldError(email, 'Please enter a valid email.'); ok = false; } else if (email) fieldError(email, '');
    if (phone && !/^[0-9+\-\s()]{7,16}$/.test(phone.value.trim())) { fieldError(phone, 'Please enter a valid phone number.'); ok = false; } else if (phone) fieldError(phone, '');

    return ok;
  }

  $$('form[data-kv-form]').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!validate(form)) {
        var bad = form.querySelector('.has-error input, .has-error textarea');
        if (bad) bad.focus();
        return;
      }

      var button = form.querySelector('button[type="submit"]');
      var original = button ? button.textContent : '';
      if (button) { button.disabled = true; button.textContent = 'Sending…'; }
      setStatus(form, 'ok', '');

      var data = new FormData();
      data.append('name', (form.querySelector('[name="name"]') || {}).value || '');
      data.append('email', (form.querySelector('[name="email"]') || {}).value || '');
      data.append('mobile', (form.querySelector('[name="mobile"]') || {}).value || '');
      data.append('message', (form.querySelector('[name="message"]') || {}).value || form.getAttribute('data-message') || 'Website enquiry');
      data.append('source', form.getAttribute('data-source') || 'The Koru Ville Website');
      var targetField = form.querySelector('[name="unlock_target"]');
      if (targetField && targetField.value) data.append('interest', targetField.value);

      fetch(CRM_ENDPOINT, {
        method: 'POST',
        body: data,
        headers: { Accept: 'application/json' }
      })
        .then(function (res) {
          if (!res.ok) throw new Error('HTTP ' + res.status);
          form.reset();
          setStatus(form, 'ok', 'Thank you — our team will contact you shortly.');
          var modal = form.closest('.kv-modal');
          if (modal) setTimeout(function () { closeModal(modal); }, 1200);
        })
        .catch(function () {
          setStatus(form, 'bad', 'Sorry, we could not send this just now. Please call +91 8377 000300.');
        })
        .finally(function () {
          if (button) { button.disabled = false; button.textContent = original; }
        });
    });
  });

  /* ----------------------------------------------------------------- faq */
  $$('.kv-faq__q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.kv-faq__item');
      var open = item.classList.contains('is-open');
      $$('.kv-faq__item', item.parentElement).forEach(function (other) {
        other.classList.remove('is-open');
        var q = other.querySelector('.kv-faq__q');
        if (q) q.setAttribute('aria-expanded', 'false');
      });
      if (!open) {
        item.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ---------------------------------------------------------- carousels */
  $$('[data-carousel]').forEach(function (group) {
    var track = group.querySelector('[data-track]');
    if (!track) return;
    var prev = group.querySelector('[data-prev]');
    var next = group.querySelector('[data-next]');
    var dotsWrap = group.querySelector('[data-dots]');
    var dots = [];

    function gap() { return parseFloat(getComputedStyle(track).columnGap) || 20; }
    function stepWidth() {
      var card = track.firstElementChild;
      return card ? card.getBoundingClientRect().width + gap() : track.clientWidth * 0.8;
    }

    function step(dir) {
      track.scrollBy({ left: dir * stepWidth(), behavior: reduceMotion ? 'auto' : 'smooth' });
    }
    if (prev) prev.addEventListener('click', function () { step(-1); });
    if (next) next.addEventListener('click', function () { step(1); });

    if (dotsWrap) {
      Array.prototype.forEach.call(track.children, function () {
        var dot = document.createElement('span');
        dotsWrap.appendChild(dot);
        dots.push(dot);
      });
    }

    function sync() {
      var max = track.scrollWidth - track.clientWidth - 2;
      if (prev) prev.disabled = track.scrollLeft <= 2;
      if (next) next.disabled = track.scrollLeft >= max;
      if (dots.length) {
        var active = Math.round(track.scrollLeft / stepWidth());
        dots.forEach(function (dot, i) { dot.classList.toggle('is-active', i === active); });
      }
    }
    track.addEventListener('scroll', sync, { passive: true });
    window.addEventListener('resize', sync);
    sync();
  });

  /* --------------------------------------------- blog featured carousel */
  $$('[data-blog-slider]').forEach(function (section) {
    var track = section.querySelector('[data-track]');
    var feature = section.querySelector('[data-blog-feature]');
    if (!track || !feature) return;

    var titleEl = feature.querySelector('[data-blog-title]');
    var copyEl = feature.querySelector('[data-blog-copy]');
    var cta = feature.querySelector('[data-blog-cta]');
    var prev = section.querySelector('[data-prev]');
    var next = section.querySelector('[data-next]');
    var dotsWrap = section.querySelector('[data-dots]');
    var layers = $$('[data-blog-bg-img]', section);
    var cards = $$('[data-slide]', track);
    var slides = [{
      title: feature.getAttribute('data-title') || '',
      copy: feature.getAttribute('data-copy') || '',
      url: feature.getAttribute('data-url') || '',
      image: feature.getAttribute('data-image') || ''
    }];

    cards.forEach(function (card) {
      slides.push({
        title: card.getAttribute('data-title') || '',
        copy: card.getAttribute('data-copy') || '',
        url: card.getAttribute('data-url') || '',
        image: card.getAttribute('data-image') || ''
      });
    });

    var active = 0;
    var activeLayer = 0;
    var bgRequest = 0;
    var swapTimer = null;
    var dots = [];

    if (dotsWrap) {
      slides.forEach(function () {
        var dot = document.createElement('span');
        dotsWrap.appendChild(dot);
        dots.push(dot);
      });
    }

    function setBackground(src) {
      if (!src || !layers.length) return;
      var current = layers[activeLayer];
      if (current && current.getAttribute('src') === src) return;

      if (layers.length < 2) {
        if (current) current.src = src;
        return;
      }

      var nextLayer = layers[1 - activeLayer];
      if (!nextLayer) return;
      var request = ++bgRequest;
      var preload = new Image();
      preload.onload = function () {
        if (request !== bgRequest) return;
        nextLayer.src = src;
        nextLayer.classList.add('is-active');
        if (current) current.classList.remove('is-active');
        activeLayer = 1 - activeLayer;
      };
      preload.src = src;
    }

    function scrollRail(index) {
      var behavior = reduceMotion ? 'auto' : 'smooth';
      if (index <= 0) {
        track.scrollTo({ left: 0, behavior: behavior });
        return;
      }
      var card = track.children[index - 1];
      if (!card) return;
      var left = track.scrollLeft + card.getBoundingClientRect().left - track.getBoundingClientRect().left;
      var max = track.scrollWidth - track.clientWidth;
      track.scrollTo({ left: Math.max(0, Math.min(left, max)), behavior: behavior });
    }

    function render(index, animate) {
      var slide = slides[index];
      if (!slide) return;
      active = index;

      if (cta) cta.href = slide.url;

      if (animate) {
        clearTimeout(swapTimer);
        feature.classList.add('is-swapping');
        swapTimer = setTimeout(function () {
          titleEl.textContent = slide.title;
          copyEl.textContent = slide.copy;
          feature.classList.remove('is-swapping');
        }, 160);
      } else {
        titleEl.textContent = slide.title;
        copyEl.textContent = slide.copy;
      }

      setBackground(slide.image);
      scrollRail(index);

      cards.forEach(function (card, i) {
        card.classList.toggle('is-active', i === index - 1);
      });
      dots.forEach(function (dot, i) {
        dot.classList.toggle('is-active', i === index);
      });
      if (prev) prev.disabled = index === 0;
      if (next) next.disabled = index === slides.length - 1;
    }

    if (prev) {
      prev.addEventListener('click', function () {
        if (active > 0) render(active - 1, true);
      });
    }
    if (next) {
      next.addEventListener('click', function () {
        if (active < slides.length - 1) render(active + 1, true);
      });
    }

    render(0, false);
  });

  /* ------------------------------------------------------ review expand */
  $$('[data-review-more]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var card = btn.closest('.kv-review');
      var text = card.querySelector('p');
      var open = card.classList.toggle('is-open');
      text.classList.toggle('is-clamped', !open);
      btn.textContent = open ? 'Read less' : 'Read more';
    });
  });

  /* ---------------------------------------------------- gallery lightbox */
  var lightbox = $('#kvLightbox');
  var lightboxImg = $('#kvLightboxImg');
  var galleryItems = $$('[data-lightbox]');

  galleryItems.forEach(function (item) {
    item.addEventListener('click', function () {
      if (!lightbox || !lightboxImg) return;
      lightboxImg.src = item.getAttribute('data-lightbox');
      lightboxImg.alt = item.getAttribute('data-alt') || 'The Koru Ville gallery image';
      lightbox.classList.add('is-open');
      lightbox.removeAttribute('aria-hidden');
      document.body.classList.add('is-locked');
      var close = lightbox.querySelector('button');
      if (close) close.focus();
    });
  });
  if (lightbox) {
    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox || e.target.closest('button')) {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('is-locked');
      }
    });
  }

  /* ------------------------------------------------------- article page */
  var readbar = $('[data-kv-progress]');

  if (readbar) {
    var updateReadbar = function () {
      var doc = document.documentElement;
      var max = doc.scrollHeight - window.innerHeight;
      var pct = max > 0 ? (window.scrollY / max) * 100 : 0;
      readbar.style.width = Math.max(0, Math.min(100, pct)) + '%';
    };
    updateReadbar();
    window.addEventListener('scroll', updateReadbar, { passive: true });
    window.addEventListener('resize', updateReadbar);
  }

  var toc = $('[data-kv-toc]');
  var tocLinks = $$('[data-kv-toc-link]');

  if (toc) {
    if (window.matchMedia('(max-width: 1100px)').matches) toc.removeAttribute('open');

    toc.addEventListener('click', function (e) {
      var link = e.target.closest('[data-kv-toc-link]');
      if (link && window.matchMedia('(max-width: 1100px)').matches) toc.removeAttribute('open');
    });
  }

  if (tocLinks.length && 'IntersectionObserver' in window) {
    var headings = tocLinks
      .map(function (link) {
        var id = (link.getAttribute('href') || '').replace('#', '');
        return id ? document.getElementById(id) : null;
      })
      .filter(Boolean);

    if (headings.length) {
      var tocObserver = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            tocLinks.forEach(function (link) {
              link.classList.toggle('is-active', link.getAttribute('href') === '#' + entry.target.id);
            });
          });
        },
        { rootMargin: '-16% 0px -68% 0px', threshold: 0 }
      );
      headings.forEach(function (heading) { tocObserver.observe(heading); });
    }
  }

  $$('[data-kv-copy]').forEach(function (button) {
    button.addEventListener('click', function () {
      var value = button.getAttribute('data-kv-copy');
      var status = $('[data-kv-copy-status]');

      var confirm = function () {
        if (!status) return;
        status.textContent = 'Link copied';
        setTimeout(function () { status.textContent = ''; }, 2200);
      };

      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(value).then(confirm).catch(function () {});
        return;
      }

      var tmp = document.createElement('textarea');
      tmp.value = value;
      tmp.setAttribute('readonly', '');
      tmp.style.position = 'fixed';
      tmp.style.opacity = '0';
      document.body.appendChild(tmp);
      tmp.select();
      try { document.execCommand('copy'); confirm(); } catch (err) {}
      document.body.removeChild(tmp);
    });
  });
})();
