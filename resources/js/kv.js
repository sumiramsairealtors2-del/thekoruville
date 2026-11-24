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
    if (!header || header.classList.contains('kv-header--error')) return;
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
  var hero = $('#home.kv-hero');
  var slides = hero ? $$('.kv-hero__slide', hero) : [];
  var dots = hero ? $$('.kv-hero__dots [aria-current]', hero) : [];
  var rotation = hero && $('[data-hero-rotation]', hero);
  var motionPreference = window.matchMedia('(prefers-reduced-motion: reduce)');
  var heroIndex = 0;
  var heroTimer = null;
  var heroPaused = false;
  var heroVisible = hero && hero.getBoundingClientRect().bottom > 0;

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
    clearInterval(heroTimer);
    if (motionPreference.matches || slides.length < 2 || heroPaused ||
        !heroVisible || document.hidden || hero.querySelector(':focus-visible')) return;
    heroTimer = setInterval(function () { showSlide(heroIndex + 1); }, 14000);
  }
  var prevBtn = hero && $('.kv-hero__arrow--prev', hero);
  var nextBtn = hero && $('.kv-hero__arrow--next', hero);
  if (prevBtn) prevBtn.addEventListener('click', function () { nextSlide(-1); });
  if (nextBtn) nextBtn.addEventListener('click', function () { nextSlide(1); });
  dots.forEach(function (d, k) { d.addEventListener('click', function () { showSlide(k); restartHero(); }); });
  if (hero && slides.length > 1) {
    hero.addEventListener('focusin', restartHero);
    hero.addEventListener('focusout', function () { requestAnimationFrame(restartHero); });
    document.addEventListener('visibilitychange', restartHero);
    if ('IntersectionObserver' in window) {
      new IntersectionObserver(function (entries) {
        heroVisible = entries[0].isIntersecting;
        hero.classList.toggle('is-offscreen', !heroVisible);
        restartHero();
      }).observe(hero);
    }
    if (rotation) {
      rotation.hidden = motionPreference.matches;
      rotation.addEventListener('click', function () {
        heroPaused = !heroPaused;
        hero.classList.toggle('is-paused', heroPaused);
        rotation.setAttribute('aria-label', heroPaused ? 'Resume slideshow' : 'Pause slideshow');
        $('span', rotation).textContent = heroPaused ? '▶' : 'Ⅱ';
        restartHero();
      });
      motionPreference.addEventListener('change', function () {
        rotation.hidden = motionPreference.matches;
        restartHero();
      });
    }
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
    setTimeout(function () {
      var videoActive = $('.kv-gallery__media:is(.is-playing,.is-floating)');
      if (!enquiryDismissed && !videoActive && !$('.kv-modal.is-open')) openModal('enquiry');
    }, 5000);
  })();


  document.addEventListener('click', function (e) {
    var opener = e.target.closest('[data-kv-open]');
    if (opener) {
      e.preventDefault();
      var key = opener.getAttribute('data-kv-open');
      if (key === 'unlock') {
        var target = opener.getAttribute('data-unlock') || 'layout';
        var isRequest = opener.hasAttribute('data-document-request');
        var documentName = target === 'price' ? 'Price List' : 'Site Layout Plan';
        var title = $('#kvUnlockTitle');
        var message = $('#kvUnlockMessage');
        var field = $('#kvUnlockTarget');
        var eyebrow = $('#kvModal-unlock .kv-eyebrow');
        var submit = $('#kvModal-unlock button[type="submit"]');
        if (title) title.textContent = isRequest ? 'Request ' + documentName : (target === 'price' ? 'Unlock Price List' : 'Unlock Layout Plan');
        if (message) {
          if (isRequest) {
            message.textContent = 'Share your contact details and our team will follow up with the ' + documentName.toLowerCase() + '.';
          } else {
            message.textContent = target === 'price'
              ? 'Share a few details to unlock the current, plot-wise price breakup.'
              : 'Share a few details to unlock the full site layout and plot numbering.';
          }
        }
        if (eyebrow) eyebrow.textContent = isRequest ? 'The Koru Ville' : 'Unlock Content';
        if (submit) submit.textContent = isRequest ? 'Send Request' : 'Unlock Now';
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
          setStatus(form, 'ok', form.dataset.success || 'Thank you — our team will contact you shortly.');
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
      $$('.kv-faq__item', item.closest('.kv-faq__box')).forEach(function (other) {
        other.classList.remove('is-open');
        var q = other.querySelector('.kv-faq__q');
        if (q) q.setAttribute('aria-expanded', 'false');
        $('.kv-faq__a', other).setAttribute('aria-hidden', 'true');
      });
      if (!open) {
        item.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');
        $('.kv-faq__a', item).setAttribute('aria-hidden', 'false');
      }
    });
  });

  /* ---------------------------------------------------------- carousels */
  function initCarousel(group, cards, scaleProperty, onSelect) {
    var track = $('[data-track]', group);
    var previous = $('[data-prev]', group);
    var next = $('[data-next]', group);
    if (cards.length < 2) {
      if (previous) previous.hidden = true;
      if (next) next.hidden = true;
      if (cards.length && onSelect) onSelect(0);
      return;
    }

    var count = cards.length;
    var copies = count;
    var before = document.createDocumentFragment();
    var after = document.createDocumentFragment();

    function clone(card) {
      var copy = card.cloneNode(true);
      copy.setAttribute('aria-hidden', 'true');
      [copy].concat($$('a, button, [tabindex]', copy)).forEach(function (element) {
        element.tabIndex = -1;
      });
      return copy;
    }

    cards.forEach(function (card, index) {
      card.dataset.carouselIndex = index;
      after.appendChild(clone(card));
      before.appendChild(clone(card));
    });
    track.prepend(before);
    track.append(after);

    var items = Array.from(track.children);
    var centres = [];
    var active = 0;
    var requested = null;
    var frame = 0;
    var settleTimer;
    var trackWidth;

    function scrollToItem(index, animate) {
      track.scrollTo({
        left: centres[index] - track.clientWidth / 2,
        behavior: animate && !motionPreference.matches ? 'smooth' : 'instant',
      });
    }

    function nearestItem() {
      var position = track.scrollLeft + track.clientWidth / 2;
      return centres.reduce(function (nearest, centre, index) {
        return Math.abs(centre - position) < Math.abs(centres[nearest] - position) ? index : nearest;
      }, 0);
    }

    function updateScale(scrollLeft = track.scrollLeft) {
      cancelAnimationFrame(frame);
      frame = 0;
      var position = scrollLeft + track.clientWidth / 2;
      var range = (centres[1] - centres[0]) * 1.6;
      var cycle = centres[copies + count] - centres[copies];
      items.forEach(function (item, index) {
        var distance = centres[index] - position;
        if (cycle) distance -= Math.round(distance / cycle) * cycle;
        var weight = range ? Math.max(0, 1 - Math.abs(distance) / range) : 1;
        var scale = motionPreference.matches ? 1 : 0.82 + 0.18 * weight * weight * (3 - 2 * weight);
        item.style.setProperty(scaleProperty, scale.toFixed(3));
      });
    }

    function rebase(from, to) {
      var left = track.scrollLeft + centres[to] - centres[from];
      track.scrollTo({ left: left, behavior: 'instant' });
      // The compositor can commit the scroll after this task. Paint scales for the destination now.
      updateScale(left);
    }

    function select(index) {
      var realIndex = (index - copies + count) % count;
      if (realIndex === active) return;
      active = realIndex;
      if (onSelect) onSelect(active);
    }

    function settle() {
      var index = nearestItem();
      var realIndex = (index - copies + count) % count;
      var target = centres[index] - track.clientWidth / 2;
      requested = null;
      // Finish centering the visible copy before exchanging it for the identical real card.
      if (target < 0 || target > track.scrollWidth - track.clientWidth) {
        scrollToItem(copies + realIndex, false);
        return;
      }
      if (Math.abs(track.scrollLeft - target) > 1) {
        scrollToItem(index, true);
        return;
      }
      if (index !== copies + realIndex) {
        rebase(index, copies + realIndex);
      }
      select(index);
    }

    function onScroll() {
      if (!frame) frame = requestAnimationFrame(function () {
        updateScale();
        if (onSelect) {
          var index = nearestItem();
          var position = track.scrollLeft + track.clientWidth / 2;
          if (Math.abs(centres[index] - position) <= 1) select(index);
        }
      });
      clearTimeout(settleTimer);
      settleTimer = setTimeout(settle, 140);
    }

    function move(direction) {
      var from = requested === null ? nearestItem() : requested;
      var target = from + direction;
      if (target < 0 || target >= items.length) {
        var real = copies + (from - copies + count) % count;
        rebase(from, real);
        from = real;
        target = from + direction;
      }
      requested = target;
      scrollToItem(target, true);
    }

    function measure() {
      clearTimeout(settleTimer);
      requested = null;
      centres = items.map(function (item) { return item.offsetLeft + item.offsetWidth / 2; });
      trackWidth = track.clientWidth;
      scrollToItem(copies + active, false);
      updateScale(centres[copies + active] - trackWidth / 2);
    }

    if (previous) previous.addEventListener('click', function () { move(-1); });
    if (next) next.addEventListener('click', function () { move(1); });
    track.addEventListener('scroll', onScroll, { passive: true });
    track.addEventListener('pointerdown', function () { requested = null; }, { passive: true });
    window.addEventListener('resize', measure, { passive: true });
    if ('ResizeObserver' in window) {
      new ResizeObserver(function () {
        if (track.clientWidth !== trackWidth) measure();
      }).observe(track);
    }
    motionPreference.addEventListener('change', measure);
    measure();
    if (onSelect) onSelect(0);
  }

  $$('[data-carousel]').forEach(function (group) {
    var track = $('[data-track]', group);
    if (track) initCarousel(group, Array.from(track.children), '--kv-review-scale');
  });

  $$('[data-blog-slider]').forEach(function (section) {
    var track = $('[data-track]', section);
    var feature = $('[data-blog-feature]', section);
    if (!track || !feature) return;

    var title = $('[data-blog-title]', feature);
    var copy = $('[data-blog-copy]', feature);
    var link = $('[data-blog-cta]', feature);
    var layers = $$('[data-blog-bg-img]', section);
    var dotsWrap = $('[data-dots]', section);
    var cards = $$('[data-slide]', track);
    var dots = cards.map(function () {
      var dot = document.createElement('span');
      if (dotsWrap && cards.length > 1) dotsWrap.appendChild(dot);
      return dot;
    });

    initCarousel(section, cards, '--kv-blog-scale', function (index) {
      var card = cards[index];
      title.textContent = card.dataset.title;
      copy.textContent = card.dataset.copy;
      link.href = card.dataset.url;
      layers.forEach(function (layer, position) { layer.classList.toggle('is-active', position === index); });

      $$('[data-slide]', track).forEach(function (item) {
        item.classList.toggle('is-active', Number(item.dataset.carouselIndex || 0) === index);
      });
      dots.forEach(function (dot, position) { dot.classList.toggle('is-active', position === index); });
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

  /* --------------------------------------------------------- gallery film */
  (function () {
    var media = $('#kvGalleryMedia');
    var video = $('#kvGalleryVideo');
    var btn = $('#kvGalleryPlay');
    var toggleBtn = $('#kvGalleryToggle');
    var dismissBtn = $('#kvGalleryDismiss');
    var seek = $('#kvGallerySeek');
    var time = $('#kvGalleryTime');
    var error = $('#kvGalleryError');
    if (!media || !video || !btn) return;

    // Observe the gallery slot, which stays in place while the same player floats.
    function refreshFloating() {
      var bounds = media.getBoundingClientRect();
      var outside = bounds.bottom <= 0 || bounds.top >= document.documentElement.clientHeight;
      var wasFloating = media.classList.contains('is-floating');
      var floating = outside && media.classList.contains('is-video') && !video.ended &&
        (!video.paused || wasFloating);
      media.classList.toggle('is-floating', floating);
      if (wasFloating && !floating && document.activeElement === dismissBtn && toggleBtn) {
        toggleBtn.focus({ preventScroll: true });
      }
    }

    if ('IntersectionObserver' in window) {
      new IntersectionObserver(refreshFloating).observe(media);
    } else {
      window.addEventListener('scroll', refreshFloating, { passive: true });
      window.addEventListener('resize', refreshFloating);
    }

    function clock(sec) {
      sec = isFinite(sec) && sec > 0 ? sec : 0;
      var m = Math.floor(sec / 60);
      var s = Math.floor(sec % 60);
      return m + ':' + (s < 10 ? '0' : '') + s;
    }

    function reflect(playing) {
      media.classList.toggle('is-playing', playing);
      if (!toggleBtn) return;
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
      if (error) error.hidden = true;
      var started = video.play();
      if (started && started.catch) {
        started.catch(function (failure) {
          if (failure.name === 'AbortError') return;
          if (error) error.hidden = false;
          media.classList.remove('is-video', 'is-floating');
          reflect(false);
          if (document.activeElement === toggleBtn) btn.focus({ preventScroll: true });
        });
      }
    }

    btn.addEventListener('click', toggle);
    if (toggleBtn) toggleBtn.addEventListener('click', toggle);
    if (dismissBtn) dismissBtn.addEventListener('click', function () {
      video.pause();
      media.classList.remove('is-floating');
    });
    video.addEventListener('click', toggle);
    video.addEventListener('play', function () {
      var moveFocus = document.activeElement === btn;
      media.classList.add('is-video');
      reflect(true);
      refreshFloating();
      if (moveFocus && toggleBtn) toggleBtn.focus({ preventScroll: true });
    });
    video.addEventListener('pause', function () { reflect(false); });
    video.addEventListener('ended', function () {
      reflect(false);
      refreshFloating();
    });
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

    function setOpen(next) {
      syncRide();
      open = next;
      split.classList.toggle('is-loc-open', open);
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      btn.setAttribute('aria-label', open ? 'Hide nearby places' : 'Explore nearby places');
      panel.setAttribute('aria-hidden', open ? 'false' : 'true');
    }

    btn.addEventListener('click', function () { setOpen(!open); });
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

/* Wipe each pinned image away as the next amenity chapter comes into view. */
(function () {
  const zones = document.querySelector('[data-amenity-zones]');
  if (!zones) return;

  const media = window.matchMedia('(min-width: 901px) and (min-height: 600px) and (prefers-reduced-motion: no-preference)');
  const nextChapters = [...zones.querySelectorAll('.kv-amenities-page__chapter-copy')].slice(1);
  const images = [...zones.querySelectorAll('.kv-amenities-page__media img')];
  let frame = 0;

  images.forEach((image, index) => {
    image.style.zIndex = images.length - index;
  });

  function syncImage() {
    frame = 0;
    const start = window.innerHeight * 0.9;
    const end = window.innerHeight * 0.2;
    const insets = nextChapters.map((chapter) => {
      const progress = (start - chapter.getBoundingClientRect().top) / (start - end);
      return Math.min(1, Math.max(0, progress)) * 100;
    });
    insets.forEach((inset, index) => {
      images[index].style.setProperty('--amenity-image-inset', `${inset}%`);
    });
  }

  function scheduleSync() {
    if (!frame) frame = window.requestAnimationFrame(syncImage);
  }

  function configure() {
    zones.classList.toggle('is-scroll-linked', media.matches);
    if (media.matches) {
      window.addEventListener('scroll', scheduleSync, { passive: true });
      window.addEventListener('resize', scheduleSync);
      scheduleSync();
    } else {
      window.removeEventListener('scroll', scheduleSync);
      window.removeEventListener('resize', scheduleSync);
      window.cancelAnimationFrame(frame);
      frame = 0;
    }
  }

  media.addEventListener('change', configure);
  configure();
})();

/* Native scrolling keeps the amenities gallery swipeable and keyboard accessible. */
(function () {
  const gallery = document.querySelector('[data-amenities-gallery]');
  if (!gallery) return;

  const track = gallery.querySelector('#amenities-gallery-track');
  const controls = gallery.querySelector('[data-gallery-controls]');
  const previous = gallery.querySelector('[data-gallery-prev]');
  const next = gallery.querySelector('[data-gallery-next]');
  const thumbnails = [...gallery.querySelectorAll('[data-gallery-slide]')];
  const motion = window.matchMedia('(prefers-reduced-motion: reduce)');

  function activeIndex() {
    return Math.round(track.scrollLeft / track.clientWidth);
  }

  function updateControls() {
    const index = activeIndex();
    previous.setAttribute('aria-disabled', String(index === 0));
    next.setAttribute('aria-disabled', String(index === thumbnails.length - 1));
    thumbnails.forEach((thumbnail, position) => {
      thumbnail.setAttribute('aria-current', String(index === position));
    });
  }

  function showSlide(index) {
    if (index < 0 || index >= thumbnails.length) return;
    track.scrollTo({
      left: index * track.clientWidth,
      behavior: motion.matches ? 'instant' : 'smooth',
    });
  }

  previous.addEventListener('click', () => showSlide(activeIndex() - 1));
  next.addEventListener('click', () => showSlide(activeIndex() + 1));
  thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => showSlide(index));
  });
  track.addEventListener('scroll', updateControls, { passive: true });
  window.addEventListener('resize', updateControls, { passive: true });
  track.classList.add('is-enhanced');
  controls.hidden = false;
  updateControls();
})();
