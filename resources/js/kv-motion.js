/* ==========================================================================
   THE KORU VILLE — motion layer (v2)
   Framer-Motion-style choreography in ~vanilla JS: spring easings, staggered
   reveals, word-by-word headings, scroll-linked parallax, pointer spotlight,
   3D tilt, magnetic buttons, counters, icon draw, reading progress.
   Zero dependencies — imported by kv.js, opt-in per element via data-mv*.
   ========================================================================== */
(function () {
  'use strict';

  var root = document.documentElement;
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Tells the inline <head> fallback that the module booted.
  window.__kvMotion = true;

  if (reduced) {
    root.classList.remove('mv-js');
    return;
  }

  /* ---------------------------------------------------------------- helpers */
  function $(sel, ctx) { return (ctx || document).querySelector(sel); }
  function $$(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }
  function clamp(v, min, max) { return Math.min(max, Math.max(min, v)); }

  var fine = window.matchMedia('(hover:hover) and (pointer:fine)').matches;

  /* --------------------------------------------- split headings into words */
  function splitWords(el) {
    var source = el.textContent.replace(/\s+/g, ' ').trim();
    if (!source || source.length > 240) return;

    var step = parseFloat(el.getAttribute('data-mv-word-delay')) || 55;
    el.setAttribute('aria-label', source);
    el.textContent = '';

    var frag = document.createDocumentFragment();
    source.split(' ').forEach(function (word, i) {
      var outer = document.createElement('span');
      outer.className = 'mv-word';
      outer.setAttribute('aria-hidden', 'true');

      var inner = document.createElement('span');
      inner.textContent = word;
      inner.style.setProperty('--mv-delay', (i * step) + 'ms');

      outer.appendChild(inner);
      frag.appendChild(outer);
      frag.appendChild(document.createTextNode(' '));
    });
    el.appendChild(frag);
  }
  $$('[data-mv="words"]').forEach(splitWords);

  /* ------------------------------------------------------- explicit delays */
  $$('[data-mv][data-mv-delay]').forEach(function (el) {
    el.style.transitionDelay = el.getAttribute('data-mv-delay') + 'ms';
  });

  /* --------------------------------------------------------- stagger groups */
  $$('[data-mv-group]').forEach(function (group) {
    var step = parseFloat(group.getAttribute('data-mv-group')) || 90;

    $$('[data-mv]', group)
      .filter(function (el) {
        // only direct members, so nested groups own their own timing
        return el.closest('[data-mv-group]') === group;
      })
      .forEach(function (el, i) {
        if (el.hasAttribute('data-mv-delay')) return;
        if (el.getAttribute('data-mv') === 'words') return;
        el.style.transitionDelay = Math.min(i * step, 720) + 'ms';
      });
  });

  /* ------------------------------------------------------- counters + draw */
  function countUp(el) {
    if (el.dataset.mvDone) return;
    el.dataset.mvDone = '1';

    var target = parseFloat(el.getAttribute('data-mv-count'));
    if (isNaN(target)) return;

    var dec = parseInt(el.getAttribute('data-mv-decimals') || '0', 10);
    var duration = 1500;
    var started = null;

    function tick(now) {
      if (started === null) started = now;
      var p = clamp((now - started) / duration, 0, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      el.textContent = (target * eased).toFixed(dec);
      if (p < 1) requestAnimationFrame(tick);
      else el.textContent = target.toFixed(dec);
    }
    requestAnimationFrame(tick);
  }

  function drawIcons(scope) {
    $$('svg', scope).forEach(function (svg) {
      $$('path,circle,rect,line,polyline,ellipse', svg).forEach(function (shape, i) {
        var len = 0;
        try { len = shape.getTotalLength ? shape.getTotalLength() : 0; } catch (e) { len = 0; }
        if (!len) return;

        shape.style.strokeDasharray = len + ' ' + len;
        shape.style.strokeDashoffset = len;

        shape.animate(
          [{ strokeDashoffset: len }, { strokeDashoffset: 0 }],
          { duration: 1000, delay: i * 70, easing: 'cubic-bezier(.16,1,.3,1)', fill: 'forwards' }
        );
      });
    });
  }

  /* ---------------------------------------------------------------- reveal */
  function activate(el) {
    el.classList.add('is-in');
    if (el.hasAttribute('data-mv-count-group')) {
      $$('[data-mv-count]', el).forEach(countUp);
    }
    if (el.hasAttribute('data-mv-draw')) drawIcons(el);
  }

  var targets = [];
  $$('[data-mv], [data-mv-count-group], [data-mv-draw]').forEach(function (el) {
    if (targets.indexOf(el) === -1) targets.push(el);
  });

  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        io.unobserve(entry.target);
        activate(entry.target);
      });
    }, { threshold: 0.05, rootMargin: '0px 0px -8% 0px' });

    targets.forEach(function (el) { io.observe(el); });
  } else {
    targets.forEach(activate);
  }

  /* --------------------------------------------- counters that never enter */
  // If a counter group is already on screen at boot, IO fires immediately.
  // Counters inside clipped carousels get a nudge when their group is shown.

  /* -------------------------------------- parallax / progress / hero depth */
  var layers = $$('[data-mv-parallax]').map(function (el) {
    return { el: el, speed: parseFloat(el.getAttribute('data-mv-parallax')) || 30 };
  });
  var heroCopy = $('.kv-hero__copy');
  var hero = $('.kv-hero');
  var progress = $('[data-mv-progress]');
  var queued = false;

  function render() {
    queued = false;
    var vh = window.innerHeight;
    var y = window.pageYOffset || document.documentElement.scrollTop;

    // ---- read phase (never interleave reads and writes) ----
    var updates = [];
    for (var i = 0; i < layers.length; i++) {
      var rect = layers[i].el.getBoundingClientRect();
      if (rect.bottom < -200 || rect.top > vh + 200) continue;
      // -1 (below viewport) .. 1 (above viewport)
      var p = (rect.top + rect.height / 2 - vh / 2) / vh;
      updates.push({ el: layers[i].el, value: p * layers[i].speed });
    }

    var heroProgress = null;
    var heroVisible = false;
    if (heroCopy && hero) {
      var hr = hero.getBoundingClientRect();
      heroVisible = hr.bottom > 0;
      heroProgress = clamp(-hr.top / (hr.height || 1), 0, 1);
    }

    var progressValue = null;
    if (progress) {
      var max = document.documentElement.scrollHeight - vh;
      progressValue = max > 0 ? clamp(y / max, 0, 1) : 0;
    }

    // ---- write phase ----
    if (progressValue !== null) {
      progress.style.transform = 'scaleX(' + progressValue.toFixed(4) + ')';
    }

    for (var j = 0; j < updates.length; j++) {
      updates[j].el.style.setProperty('--mv-p', updates[j].value.toFixed(2) + 'px');
    }

    if (heroProgress !== null) {
      if (heroVisible) {
        heroCopy.style.transform = 'translate3d(0,' + (heroProgress * 80).toFixed(1) + 'px,0)';
        heroCopy.style.opacity = (1 - heroProgress * 0.9).toFixed(3);
      } else {
        heroCopy.style.opacity = '0';
      }
    }
  }

  function queueRender() {
    if (queued) return;
    queued = true;
    requestAnimationFrame(render);
  }
  window.addEventListener('scroll', queueRender, { passive: true });
  window.addEventListener('resize', queueRender);
  render();

  /* ------------------------------------------------------- pointer effects */
  function tilt(el) {
    var max = parseFloat(el.getAttribute('data-mv-tilt')) || 4;
    var nx = 0, ny = 0, raf = null;

    function paint() {
      raf = null;
      el.style.setProperty('--mv-rx', (-ny * max).toFixed(2) + 'deg');
      el.style.setProperty('--mv-ry', (nx * max).toFixed(2) + 'deg');
    }

    el.addEventListener('pointermove', function (e) {
      var r = el.getBoundingClientRect();
      nx = (e.clientX - r.left) / r.width - 0.5;
      ny = (e.clientY - r.top) / r.height - 0.5;

      el.classList.add('is-tilting');
      if (!raf) raf = requestAnimationFrame(paint);
    }, { passive: true });

    el.addEventListener('pointerleave', function () {
      nx = 0;
      ny = 0;
      el.classList.remove('is-tilting');
      el.style.setProperty('--mv-rx', '0deg');
      el.style.setProperty('--mv-ry', '0deg');
    });
  }

  function magnet(el) {
    var strength = parseFloat(el.getAttribute('data-mv-magnet')) || 7;

    el.addEventListener('pointermove', function (e) {
      var r = el.getBoundingClientRect();
      var x = (e.clientX - r.left - r.width / 2) / (r.width / 2);
      var y = (e.clientY - r.top - r.height / 2) / (r.height / 2);

      el.style.setProperty('--mv-mx', (clamp(x, -1, 1) * strength).toFixed(2) + 'px');
      el.style.setProperty('--mv-my', (clamp(y, -1, 1) * strength * 0.6).toFixed(2) + 'px');
    }, { passive: true });

    el.addEventListener('pointerleave', function () {
      el.style.setProperty('--mv-mx', '0px');
      el.style.setProperty('--mv-my', '0px');
    });
  }

  if (fine) {
    $$('[data-mv-tilt]').forEach(tilt);
    $$('[data-mv-magnet]').forEach(magnet);
    $$('[data-mv-magnet]').forEach(function (el) { el.classList.add('mv-magnet'); });
  }
})();
