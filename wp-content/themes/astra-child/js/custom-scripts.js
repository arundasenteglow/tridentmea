// Navbar scroll
const navbar = document.getElementById('navbar');
if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });
}

// Stats counter
function animateCount(el, target) {
  let startTime = null;
  const duration = 1400;
  function step(timestamp) {
    if (!startTime) startTime = timestamp;
    const elapsed = timestamp - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const eased = 1 - Math.pow(1 - progress, 3);
    el.textContent = Math.floor(eased * target);
    if (progress < 1) requestAnimationFrame(step);
    else el.textContent = target;
  }
  requestAnimationFrame(step);
}

// Stats observer
const statsObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.querySelectorAll('[data-target]').forEach(item => {
        const target = parseInt(item.dataset.target);
        const countEl = item.querySelector('.count');
        if (countEl) animateCount(countEl, target);
      });
      statsObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.4 });

const statsSection = document.getElementById('stats');
if (statsSection) statsObserver.observe(statsSection);

// Scroll reveal
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// Capabilities scroll nav
(function() {
  var scroll   = document.getElementById('capScroll');
  var prevBtn  = document.getElementById('capPrev');
  var nextBtn  = document.getElementById('capNext');
  var fill     = document.getElementById('capProgressFill');
  var countEl  = document.getElementById('capProgressCount');
  if (!scroll) return;

  var TOTAL        = 7;
  var visibleCount = 3;   // how many cards are fully visible at rest; updated on first measure
  var currentRight = 3;   // rightmost visible card index (1-based); updated on click & swipe
  var initialized  = false;

  function getCardW() {
    var card = scroll.querySelector('.cap-card');
    if (!card) return 400;
    var gap = parseFloat(getComputedStyle(scroll).gap) || 20;
    return card.offsetWidth + gap;
  }

  function measureVisibleCount() {
    var rect  = scroll.getBoundingClientRect();
    var cards = scroll.querySelectorAll('.cap-card');
    var n = 0;
    cards.forEach(function(c) {
      var r = c.getBoundingClientRect();
      if ((r.left + r.right) / 2 >= rect.left && (r.left + r.right) / 2 <= rect.right) n++;
    });
    return Math.max(n, 1);
  }

  function render() {
    var pct = ((currentRight - visibleCount) / (TOTAL - visibleCount)) * 100;
    fill.style.width = Math.max(2, Math.min(pct, 100)) + '%';
    countEl.textContent = currentRight + ' / ' + TOTAL;
    if (prevBtn) prevBtn.style.opacity = currentRight <= visibleCount ? '0.35' : '1';
    if (nextBtn) nextBtn.style.opacity = currentRight >= TOTAL       ? '0.35' : '1';
  }

  function init() {
    if (initialized) return;
    scroll.scrollLeft = 0;           // reset to start
    visibleCount  = measureVisibleCount();
    currentRight  = visibleCount;
    initialized   = true;
    render();
  }

  var lastClickTime = 0;
  var CLICK_GUARD_MS = 520; // suppress scroll-sync during smooth scroll animation

  if (nextBtn) {
      nextBtn.addEventListener('click', function() {
        if (currentRight >= TOTAL) return;
        lastClickTime = Date.now();
        currentRight++;
        scroll.scrollBy({ left: getCardW(), behavior: 'smooth' });
        render();
      });
  }

  if (prevBtn) {
      prevBtn.addEventListener('click', function() {
        if (currentRight <= visibleCount) return;
        lastClickTime = Date.now();
        currentRight--;
        scroll.scrollBy({ left: -getCardW(), behavior: 'smooth' });
        render();
      });
  }

  // Sync counter when user drags/swipes manually (not during button-triggered animation)
  var swipeTimer = null;
  scroll.addEventListener('scroll', function() {
    if (Date.now() - lastClickTime < CLICK_GUARD_MS) return;
    clearTimeout(swipeTimer);
    swipeTimer = setTimeout(function() {
      var cardW    = getCardW();
      var leftCard = Math.round(scroll.scrollLeft / cardW);
      currentRight = Math.min(leftCard + visibleCount, TOTAL);
      render();
    }, 120);
  }, { passive: true });

  // Init once section enters viewport (ensures cards are laid out)
  var observer = new IntersectionObserver(function(entries) {
    if (entries[0].isIntersecting) { init(); observer.disconnect(); }
  }, { threshold: 0.15 });
  var sec = document.getElementById('capabilities');
  if (sec) observer.observe(sec); else init();
})();
