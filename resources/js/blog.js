/* ============================================================
   BLOG PAGE — scroll reveal + sidebar enquiry form
   ============================================================ */

/* TODO: point this at your real Laravel route, e.g. route('blog.enquiry') */
var BLOG_FORM_ENDPOINT = '/blog/enquiry';

(function () {
  document.addEventListener('DOMContentLoaded', function () {
    initScrollReveal();
    initEnquiryForm();
  });

  /* ---------- scroll reveal for hero, filter bar, cards, pagination, form ---------- */
  function initScrollReveal() {
    var revealEls = document.querySelectorAll('.reveal');
    if (!revealEls.length) return;

    // stagger the card grid slightly so cards don't all pop at once
    var cards = document.querySelectorAll('.blog-card.reveal');
    cards.forEach(function (card, i) {
      card.style.transitionDelay = Math.min(i * 60, 360) + 'ms';
    });

    if (!('IntersectionObserver' in window)) {
      revealEls.forEach(function (el) { el.classList.add('in'); });
      return;
    }

    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('in');
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );

    revealEls.forEach(function (el) { io.observe(el); });
  }

  /* ---------- sidebar enquiry form: validate -> progress -> submit -> success ---------- */
  function isValidEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test((v || '').trim()); }
  function isValidPhone(v) { return /^[0-9+\-\s()]{7,15}$/.test((v || '').trim()); }

  function setError(input, errEl, hasError) {
    if (!input) return;
    input.classList.toggle('error', !!hasError);
    if (errEl) errEl.classList.toggle('show', !!hasError);
  }

  function initEnquiryForm() {
    var form = document.getElementById('blogEnquiryForm');
    if (!form) return;

    var progress = document.getElementById('blogFormProgress');
    var success = document.getElementById('blogFormSuccess');
    var fill = document.getElementById('blogProgressFill');
    var status = document.getElementById('blogProgressStatus');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var name = document.getElementById('bgName');
      var email = document.getElementById('bgEmail');
      var phone = document.getElementById('bgPhone');
      var message = document.getElementById('bgMessage');

      var valid = true;

      setError(name, document.getElementById('bgNameErr'), !name.value.trim());
      if (!name.value.trim()) valid = false;

      setError(email, document.getElementById('bgEmailErr'), !isValidEmail(email.value));
      if (!isValidEmail(email.value)) valid = false;

      setError(phone, document.getElementById('bgPhoneErr'), !isValidPhone(phone.value));
      if (!isValidPhone(phone.value)) valid = false;

      if (!valid) return;

      var formData = new FormData();
      formData.append('name', name.value.trim());
      formData.append('email', email.value.trim());
      formData.append('mobile', phone.value.trim());
      formData.append('message', message.value.trim() || 'General enquiry via blog sidebar form.');
      formData.append('source', 'Blog Page — Sidebar Form');

      var csrfMeta = document.querySelector('meta[name="csrf-token"]');
      if (csrfMeta) formData.append('_token', csrfMeta.getAttribute('content'));

      form.style.display = 'none';
      progress.style.display = 'block';

      var statuses = [
        { at: 0, msg: 'Verifying your details…' },
        { at: 30, msg: 'Submitting your enquiry…' },
        { at: 70, msg: 'Almost there…' },
      ];
      function updateStatus(v) {
        var matched = statuses.filter(function (s) { return v >= s.at; }).pop();
        if (matched && status) status.textContent = matched.msg;
      }

      var pct = 0;
      var interval = setInterval(function () {
        if (pct < 90) {
          pct += (90 - pct) * 0.06;
          if (fill) fill.style.width = pct + '%';
          updateStatus(Math.floor(pct));
        }
      }, 60);

      fetch(BLOG_FORM_ENDPOINT, {
        method: 'POST',
        body: formData,
        headers: { 'Accept': 'application/json' }
      })
        .catch(function () { /* fail silently — always complete the flow for the user */ })
        .finally(function () {
          clearInterval(interval);
          if (fill) { fill.style.width = '100%'; fill.style.background = 'var(--c-moss-green)'; }
          if (status) status.textContent = 'Done!';
          setTimeout(function () {
            progress.style.display = 'none';
            success.style.display = 'block';
          }, 500);
        });
    });
  }
})();