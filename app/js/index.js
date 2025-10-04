/* js/index.js — animations via anime.js only */

/* Helper: set initial state (opacity 0) */
function preset(el, props = {}) {
  const defaults = { opacity: 0, translateY: 16 };
  Object.assign(el.style, {
    opacity: (props.opacity ?? defaults.opacity),
    transform: `translateY(${props.translateY ?? defaults.translateY}px)`
  });
}

/* ===== HERO on load ===== */
document.addEventListener('DOMContentLoaded', () => {
  const heroTitle = document.querySelector('.js-hero-title');
  const heroSearch = document.querySelector('.js-hero-search');
  const heroChipsWrap = document.querySelector('.js-hero-chips');
  const chips = heroChipsWrap ? heroChipsWrap.querySelectorAll('.ci-chip') : [];

  if (heroTitle) preset(heroTitle, { translateY: 24 });
  if (heroSearch) preset(heroSearch, { translateY: 20 });
  chips.forEach(c => preset(c, { translateY: 12 }));

  const tl = anime.timeline({ easing: 'easeOutQuad', duration: 520 });
  if (heroTitle) {
    tl.add({ targets: heroTitle, opacity: [0, 1], translateY: [24, 0] });
  }
  if (heroSearch) {
    tl.add({ targets: heroSearch, opacity: [0, 1], translateY: [20, 0] }, '-=240');
  }
  if (chips.length) {
    tl.add({
      targets: chips,
      opacity: [0, 1],
      translateY: [12, 0],
      delay: anime.stagger(60)
    }, '-=200');
  }
});

/* ===== On Scroll (cats, cards, cta) ===== */
const io = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting) return;
    const block = entry.target.dataset.anim;

    if (block === 'cats') {
      const items = entry.target.querySelectorAll('.js-cat');
      items.forEach(el => preset(el, { translateY: 14 }));
      anime({
        targets: items,
        opacity: [0, 1],
        translateY: [14, 0],
        duration: 450,
        easing: 'easeOutQuad',
        delay: anime.stagger(50)
      });
    }

    if (block === 'cards') {
      const cards = entry.target.querySelectorAll('.js-card');
      cards.forEach(el => preset(el, { translateY: 18 }));
      anime({
        targets: cards,
        opacity: [0, 1],
        translateY: [18, 0],
        duration: 520,
        easing: 'easeOutQuart',
        delay: anime.stagger(80)
      });
    }

    if (block === 'cta') {
      preset(entry.target, { translateY: 20 });
      anime({
        targets: entry.target,
        opacity: [0, 1],
        translateY: [20, 0],
        duration: 600,
        easing: 'easeOutCubic'
      });
    }

    io.unobserve(entry.target); // animate once
  });
}, { threshold: 0.2 });

document.querySelectorAll('.js-observe').forEach(el => {
  // Optional: hide before observed
  if (el.dataset.anim !== 'cta') {
    el.style.opacity = 0;
  }
  io.observe(el);
});
