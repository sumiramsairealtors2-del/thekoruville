/* ==========================================================================
   THE KORU VILLE — redesign (v2) interactions
   Vanilla, no dependencies. Loaded by layouts/kv.blade.php.
   ========================================================================== */
import './kv-motion.js';

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

  /* ------------------------------------------------------------ scroll navbar pill */
  (function scrollNavbar() {
    var header = $('#kvHeader');
    if (!header) return;
    var lastScrollY = window.scrollY;
    var ticking = false;
    var threshold = 60;
    var wasScrolled = false;

    function update() {
      var currentScrollY = window.scrollY;
      var shouldBeScrolled = currentScrollY > threshold;

      if (shouldBeScrolled && !wasScrolled) {
        header.classList.add('kv-header--scrolled');
        header.style.top = '-160px';
        window.requestAnimationFrame(function () {
          header.style.top = '';
        });
      } else if (!shouldBeScrolled && wasScrolled) {
        header.classList.remove('kv-header--scrolled');
      }

      wasScrolled = shouldBeScrolled;
      lastScrollY = currentScrollY;
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(update);
        ticking = true;
      }
    }, { passive: true });
  })();

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
    modal.classList.add('kv-modal--opening');
    setTimeout(function () { modal.classList.remove('kv-modal--opening'); }, 500);
    var focusable = modal.querySelector('input, button, a');
    if (focusable) focusable.focus();
  }
  function closeModal(modal) {
    if (!modal) return;
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    if (!document.querySelector('.kv-modal.is-open')) document.body.classList.remove('is-locked');
    if (lastFocus) lastFocus.focus();
    if (modal.id === 'kvModal-enquiry') enquiryDismissed = true;
  }

  /* ------------------------------------------------------------ enquiry auto-open */
  var enquiryDismissed = false;
  (function autoOpenEnquiry() {
    if (enquiryDismissed) return;
    var modal = $('#kvModal-enquiry');
    if (!modal) return;
    setTimeout(function () { openModal('enquiry'); }, 5000);
  })();


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

  /* ---------------------------------------------------------- carousels (centre-focused, infinite) */
  $$('[data-carousel]').forEach(function (group) {
    var track = group.querySelector('[data-track]');
    if (!track) return;
    var prev = group.querySelector('[data-prev]');
    var next = group.querySelector('[data-next]');
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var MIN_SCALE = 0.82;
    var CLONES = 3;

    var cards = Array.prototype.slice.call(track.children);
    var count = cards.length;
    if (count === 0) return;

    var allItems = [];
    var realCentres = [];
    var STEP = 0;
    var MIN_SCROLL = 0;
    var MAX_SCROLL = 0;
    var scaleTimer = null;
    var snapTimer = null;
    var scrolling = false;
    var active = 0;

    /* --------------------------------------------------- layout measure */
    function measure() {
      var head = document.createDocumentFragment();
      var tail = document.createDocumentFragment();
      for (var i = count - CLONES; i < count; i++) head.appendChild(cards[i].cloneNode(true));
      for (var i = 0; i < CLONES; i++) tail.appendChild(cards[i].cloneNode(true));
      track.insertBefore(head, track.firstChild);
      track.appendChild(tail);
      allItems = Array.prototype.slice.call(track.children);
      realCentres = allItems.slice(CLONES, CLONES + count).map(function (it) {
        return it.offsetLeft + it.offsetWidth / 2;
      });
      if (count > 1) STEP = realCentres[1] - realCentres[0];
      else STEP = cards[0] ? cards[0].offsetWidth : 0;
      var half = track.clientWidth / 2;
      MIN_SCROLL = realCentres[0] - half;
      MAX_SCROLL = realCentres[count - 1] - half;
    }

    /* --------------------------------------------------- centre scaling */
    function applyScales() {
      if (STEP === 0) return;
      var tc = track.scrollLeft + track.clientWidth / 2;
      allItems.forEach(function (it) {
        var centre = it.offsetLeft + it.offsetWidth / 2;
        var d = centre - tc;
        var steps = d / (STEP * 1.6);
        var t = Math.max(0, Math.min(1, 1 - Math.abs(steps)));
        var ease = t * t * (3 - 2 * t);
        var scale = MIN_SCALE + (1 - MIN_SCALE) * ease;
        it.style.setProperty('--kv-review-scale', scale.toFixed(3));
      });
    }

    function scheduleScale() {
      if (scaleTimer) return;
      scaleTimer = requestAnimationFrame(function () {
        scaleTimer = null;
        applyScales();
      });
    }

    /* --------------------------------------------------- infinite wrap */
    function handleWrap() {
      var sl = track.scrollLeft;
      var moved = false;
      if (sl < MIN_SCROLL) {
        track.scrollLeft = sl + count * STEP;
        moved = true;
      } else if (sl > MAX_SCROLL) {
        track.scrollLeft = sl - count * STEP;
        moved = true;
      }
      return moved;
    }

    /* --------------------------------------------------- scroll to index */
    function scrollToIndex(index, animate) {
      if (index < 0) index = count - 1;
      if (index >= count) index = 0;
      if (index === active) return;
      var target = realCentres[index] - track.clientWidth / 2;
      scrolling = true;
      track.scrollTo({ left: target, behavior: (animate && !reduceMotion) ? 'smooth' : 'auto' });
      active = index;
      scheduleScale();
      setTimeout(function () { scrolling = false; }, 400);
    }

    function nearestIndex() {
      var sl = track.scrollLeft + track.clientWidth / 2;
      var best = 0;
      var bestDist = Math.abs(realCentres[0] - sl);
      for (var i = 1; i < count; i++) {
        var dist = Math.abs(realCentres[i] - sl);
        if (dist < bestDist) { bestDist = dist; best = i; }
      }
      return best;
    }

    /* prev / next */
    if (prev) {
      prev.addEventListener('click', function () { scrollToIndex(active - 1, true); });
    }
    if (next) {
      next.addEventListener('click', function () { scrollToIndex(active + 1, true); });
    }

    /* scroll: continuous scale + wrap + snap to centre on end */
    track.addEventListener('scroll', function () {
      if (scrolling) { scheduleScale(); return; }
      scheduleScale();
      if (handleWrap()) { scheduleScale(); return; }
      if (snapTimer) clearTimeout(snapTimer);
      snapTimer = setTimeout(function () {
        var idx = nearestIndex();
        if (idx !== active) scrollToIndex(idx, true);
      }, 160);
    }, { passive: true });

    measure();
    track.scrollLeft = MIN_SCROLL;
    applyScales();
    active = 0;

    window.addEventListener('resize', function () {
      measure();
      track.scrollLeft = MIN_SCROLL + active * STEP;
      applyScales();
    }, { passive: true });
  });

  /* --------------------------------------------- blog featured carousel (centre-focused, infinite) */
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
    var count = cards.length;
    if (count === 0) return;

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var MIN_SCALE = 0.82;
    var CLONES = count > 1 ? Math.min(3, count) : 0;
    var USE_LOOP = count > 1;

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

    var activeLayer = 0;
    var bgRequest = 0;
    var swapTimer = null;
    var dots = [];
    var scaleTimer = null;
    var snapTimer = null;
    var scrolling = false;
    var active = 0;

    var allItems = [];
    var realCentres = [];
    var STEP = 0;
    var MIN_SCROLL = 0;
    var MAX_SCROLL = 0;

    if (dotsWrap) {
      slides.slice(1).forEach(function () {
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

    /* --------------------------------------------------- layout measure */
    function measure() {
      allItems = $$('[data-slide]', track);
      if (USE_LOOP && CLONES > 0) {
        var head = document.createDocumentFragment();
        var tail = document.createDocumentFragment();
        for (var i = count - CLONES; i < count; i++) head.appendChild(cards[i].cloneNode(true));
        for (var i = 0; i < CLONES; i++) tail.appendChild(cards[i].cloneNode(true));
        track.insertBefore(head, track.firstChild);
        track.appendChild(tail);
        allItems = $$('[data-slide]', track);
      }
      realCentres = allItems.slice(CLONES, CLONES + count).map(function (it) {
        return it.offsetLeft + it.offsetWidth / 2;
      });
      if (count > 1) STEP = realCentres[1] - realCentres[0];
      else STEP = cards[0] ? cards[0].offsetWidth : 0;
      var half = track.clientWidth / 2;
      MIN_SCROLL = realCentres[0] - half;
      MAX_SCROLL = realCentres[count - 1] - half;
    }

    /* --------------------------------------------------- centre scaling */
    function applyScales() {
      if (STEP === 0) return;
      var tc = track.scrollLeft + track.clientWidth / 2;
      allItems.forEach(function (it) {
        var centre = it.offsetLeft + it.offsetWidth / 2;
        var d = centre - tc;
        var steps = d / (STEP * 1.6);
        var t = Math.max(0, Math.min(1, 1 - Math.abs(steps)));
        var ease = t * t * (3 - 2 * t);
        var scale = MIN_SCALE + (1 - MIN_SCALE) * ease;
        it.style.setProperty('--kv-blog-scale', scale.toFixed(3));
      });
    }

    function scheduleScale() {
      if (scaleTimer) return;
      scaleTimer = requestAnimationFrame(function () {
        scaleTimer = null;
        applyScales();
      });
    }

    /* --------------------------------------------------- infinite wrap */
    function handleWrap() {
      if (!USE_LOOP) return false;
      var sl = track.scrollLeft;
      var moved = false;
      if (sl < MIN_SCROLL) {
        track.scrollLeft = sl + count * STEP;
        moved = true;
      } else if (sl > MAX_SCROLL) {
        track.scrollLeft = sl - count * STEP;
        moved = true;
      }
      return moved;
    }

    /* --------------------------------------------------- render ui */
    function renderUI(index) {
      active = index;
      var slide = slides[index + 1];
      if (!slide) return;
      if (cta) cta.href = slide.url;
      if (swapTimer) clearTimeout(swapTimer);
      feature.classList.add('is-swapping');
      swapTimer = setTimeout(function () {
        titleEl.textContent = slide.title;
        copyEl.textContent = slide.copy;
        feature.classList.remove('is-swapping');
      }, 160);
      setBackground(slide.image);
      cards.forEach(function (card, i) {
        card.classList.toggle('is-active', i === index);
      });
      dots.forEach(function (dot, i) {
        dot.classList.toggle('is-active', i === index);
      });
    }

    function scrollToIndex(index, animate) {
      if (index < 0) index = count - 1;
      if (index >= count) index = 0;
      if (index === active) return;
      var target = realCentres[index] - track.clientWidth / 2;
      scrolling = true;
      track.scrollTo({ left: target, behavior: (animate && !reduceMotion) ? 'smooth' : 'auto' });
      renderUI(index);
      scheduleScale();
      setTimeout(function () { scrolling = false; }, 400);
    }

    /* nearest real card index for current scrollLeft */
    function nearestIndex() {
      var sl = track.scrollLeft + track.clientWidth / 2;
      var best = 0;
      var bestDist = Math.abs(realCentres[0] - sl);
      for (var i = 1; i < count; i++) {
        var dist = Math.abs(realCentres[i] - sl);
        if (dist < bestDist) { bestDist = dist; best = i; }
      }
      return best;
    }

    /* prev / next */
    if (prev) {
      prev.addEventListener('click', function () { scrollToIndex(active - 1, true); });
    }
    if (next) {
      next.addEventListener('click', function () { scrollToIndex(active + 1, true); });
    }

    /* scroll: continuous scale + wrap + snap to centre on end */
    track.addEventListener('scroll', function () {
      if (scrolling) { scheduleScale(); return; }
      scheduleScale();
      if (handleWrap()) { scheduleScale(); return; }
      if (snapTimer) clearTimeout(snapTimer);
      snapTimer = setTimeout(function () {
        var idx = nearestIndex();
        if (idx !== active) scrollToIndex(idx, true);
      }, 160);
    }, { passive: true });

    measure();
    track.scrollLeft = MIN_SCROLL;
    applyScales();
    renderUI(0);

    window.addEventListener('resize', function () {
      measure();
      track.scrollLeft = MIN_SCROLL + active * STEP;
      applyScales();
    }, { passive: true });
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

  /* ------------------------------------------------- gallery film (inline) */
  /* #kvGalleryPlay starts the film in the section itself — no lightbox/modal.
     Once started it stays on screen as the play/pause control, and the video
     keeps its last frame when paused. */
  (function () {
    var media = $('#kvGalleryMedia');
    var video = $('#kvGalleryVideo');
    var btn = $('#kvGalleryPlay');
    var toggleBtn = $('#kvGalleryToggle');
    var seek = $('#kvGallerySeek');
    var time = $('#kvGalleryTime');
    if (!media || !video || !btn) return;

    function clock(sec) {
      sec = isFinite(sec) && sec > 0 ? sec : 0;
      var m = Math.floor(sec / 60);
      var s = Math.floor(sec % 60);
      return m + ':' + (s < 10 ? '0' : '') + s;
    }

    function reflect(playing) {
      media.classList.toggle('is-playing', playing);
      if (!toggleBtn) return;
      toggleBtn.setAttribute('aria-pressed', playing ? 'true' : 'false');
      toggleBtn.setAttribute('aria-label', playing ? 'Pause the site film' : 'Play the site film');
    }

    function sync() {
      var dur = video.duration || 0;
      var cur = video.currentTime || 0;
      var pct = dur ? Math.min(100, (cur / dur) * 100) : 0;
      if (time) time.textContent = clock(cur) + ' / ' + clock(dur);
      if (seek) {
        seek.value = Math.round(pct * 10);
        seek.style.setProperty('--kv-seek', pct.toFixed(2) + '%');
      }
    }

    function toggle() {
      if (!video.paused) {
        video.pause();
        return;
      }
      media.classList.add('is-video');
      var started = video.play();
      if (started && started.catch) {
        started.catch(function () {
          // no playable source yet — stay on the still with the play icon
          media.classList.remove('is-video');
          reflect(false);
        });
      }
    }

    btn.addEventListener('click', toggle);
    if (toggleBtn) toggleBtn.addEventListener('click', toggle);
    video.addEventListener('click', toggle);
    video.addEventListener('play', function () {
      media.classList.add('is-video');
      reflect(true);
    });
    video.addEventListener('pause', function () { reflect(false); });
    video.addEventListener('ended', function () { reflect(false); });
    video.addEventListener('timeupdate', sync);
    video.addEventListener('loadedmetadata', sync);
    video.addEventListener('durationchange', sync);

    /* the timeline scrubs both ways: dragging writes the new time straight
       onto the video, so it works while playing and while paused */
    if (seek) {
      seek.addEventListener('input', function () {
        if (!video.duration) return;
        video.currentTime = (seek.value / 1000) * video.duration;
        sync();
      });
    }
    sync();
  })();

  /* --------------------------------------------------- location crown tab */
  /* #kvLocCrownBtn (part of .kv-split__body) toggles the green take-over
     panel #kvLocCrownPanel, which is positioned pure-CSS over the split.
     No measuring needed — resize stays automatic. */
  (function () {
    var btn = $('#kvLocCrownBtn');
    var panel = $('#kvLocCrownPanel');
    if (!btn || !panel) return;
    var split = btn.closest('.kv-split');
    var closer = $('.kv-loc-crown__close', panel);

    /* the wave's landmarks for parking the tab exactly: the seam→panel-top
       distance (media-h), the wave's 10% stop edge (stop-x) and the seam's
       own position (seam-x, the close retreat's terminal) */
    function syncRide() {
      var bodyEl = btn.closest('.kv-split__body');
      if (!bodyEl) return;
      var sr = split.getBoundingClientRect();
      var br = bodyEl.getBoundingClientRect();
      split.style.setProperty('--kv-loc-media-h', (br.top - sr.top).toFixed(2) + 'px');
      split.style.setProperty('--kv-loc-stop-x', (sr.width * 0.1 + sr.left - br.left).toFixed(2) + 'px');
      split.style.setProperty('--kv-loc-seam-x', (br.left - sr.left).toFixed(2) + 'px');
    }
    syncRide();
    window.addEventListener('resize', syncRide);

    var open = false;
    var closeTimer = 0;

    function setOpen(next) {
      if (next) syncRide();
      open = !!next;
      if (split) split.classList.toggle('is-loc-open', open);
      /* the close ride is an animation, gated so it never plays on page load */
      clearTimeout(closeTimer);
      if (split) {
        if (open) {
          split.classList.remove('kv-loc-closing');
        } else {
          split.classList.add('kv-loc-closing');
          closeTimer = setTimeout(function () { split.classList.remove('kv-loc-closing'); }, 900);
        }
      }
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      btn.setAttribute('aria-label', open ? 'Hide the full location content' : 'Show the full location content');
      panel.setAttribute('aria-hidden', open ? 'false' : 'true');
    }

    btn.addEventListener('click', function () {
      setOpen(!open);
      if (open && closer) {
        /* wait for the wipe to make the panel focusable */
        setTimeout(function () { if (open && closer) closer.focus({ preventScroll: true }); }, 380);
      }
    });
    if (closer) closer.addEventListener('click', function () {
      setOpen(false);
      btn.focus({ preventScroll: true });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && open) {
        setOpen(false);
        btn.focus({ preventScroll: true });
      }
    });

    document.addEventListener('click', function (e) {
      if (open && !panel.contains(e.target) && !btn.contains(e.target)) setOpen(false);
    });
  })();

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

  $$('[data-kv-toc]').forEach(function (toc) {
    if (window.matchMedia('(max-width: 1100px)').matches) toc.removeAttribute('open');

    toc.addEventListener('click', function (e) {
      var link = e.target.closest('[data-kv-toc-link]');
      if (link && window.matchMedia('(max-width: 1100px)').matches) toc.removeAttribute('open');
    });
  });

  var tocLinks = $$('[data-kv-toc-link]');

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

/* ==========================================================================
   THE KORU VILLE — dock-style navbar magnification
   Apple macOS Dock proximity effect for the left and right nav groups.
   Vanilla JS, spring physics, requestAnimationFrame. Zero dependencies.
   ========================================================================== */
(function () {
  'use strict';

  var MAGNIFICATION = 1.28;
  var DISTANCE = 150;
  var STIFFNESS = 260;
  var DAMPING = 26;

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var desktop = window.matchMedia('(min-width: 1025px) and (hover: hover) and (pointer: fine)');

  function $(sel, ctx) { return (ctx || document).querySelector(sel); }
  function $$(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }

  function clamp(v, mn, mx) { return Math.min(mx, Math.max(mn, v)); }

  function smoothstep(t) { return t * t * (3 - 2 * t); }

  /* Build an independent controller for one nav group. */
  function createDock(group) {
    var links = $$('.kv-nav-link', group);
    if (!links.length) return null;

    var items = links.map(function (el) {
      return { el: el, scale: 1, velocity: 0, target: 1, rect: null };
    });

    function measure() {
      items.forEach(function (it) {
        it.rect = it.el.getBoundingClientRect();
      });
    }
    measure();

    var raf = null;
    var last = null;
    var mouse = null; // {x, y} or null when no active pointer

    function targetScaleFor(it) {
      if (!mouse) return 1;
      var cx = it.rect.left + it.rect.width / 2;
      var cy = it.rect.top + it.rect.height / 2;
      var dx = mouse.x - cx;
      var dy = mouse.y - cy;
      var dist = Math.sqrt(dx * dx + dy * dy);
      var t = clamp(1 - dist / DISTANCE, 0, 1);
      return 1 + (MAGNIFICATION - 1) * smoothstep(t);
    }

    function update(now) {
      raf = null;
      var dt = last ? clamp((now - last) / 1000, 0, 0.1) : 0.016;
      last = now;
      var changed = false;
      items.forEach(function (it) {
        var target = targetScaleFor(it);
        var force = STIFFNESS * (target - it.scale);
        var accel = force - DAMPING * it.velocity;
        it.velocity += accel * dt;
        it.scale += it.velocity * dt;
        if (Math.abs(it.scale - 1) > 0.001 || Math.abs(it.velocity) > 0.001) changed = true;
        it.el.style.setProperty('--kv-nav-dock-scale', it.scale.toFixed(4));
      });
      if (changed) raf = requestAnimationFrame(update);
      else { raf = null; last = null; }
    }

    function start() { if (!raf) { last = null; raf = requestAnimationFrame(update); } }

    function setMouse(x, y) {
      if (!mouse) mouse = {};
      mouse.x = x; mouse.y = y;
      start();
    }

    function clearMouse() {
      mouse = null;
      start();
    }

    group.addEventListener('pointermove', function (e) { setMouse(e.clientX, e.clientY); }, { passive: true });
    group.addEventListener('pointerleave', clearMouse, { passive: true });

    var measureRaf = null;
    function scheduleMeasure() {
      if (measureRaf) return;
      measureRaf = requestAnimationFrame(function () {
        measureRaf = null;
        measure();
      });
    }
    window.addEventListener('resize', scheduleMeasure, { passive: true });
    window.addEventListener('scroll', scheduleMeasure, { passive: true });

    return { destroy: function () {
      group.removeEventListener('pointermove', setMouse);
      group.removeEventListener('pointerleave', clearMouse);
      window.removeEventListener('resize', scheduleMeasure);
      window.removeEventListener('scroll', scheduleMeasure);
      if (raf) cancelAnimationFrame(raf);
      items.forEach(function (it) { it.el.style.removeProperty('--kv-nav-dock-scale'); });
    }};
  }

  function init() {
    if (reduceMotion) return;
    if (!desktop.matches) return;
    $$('.kv-nav--left, .kv-nav--right').forEach(createDock);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
