(() => {
  const init = () => {
    // Trigger hero animations
    setTimeout(() => {
      document.querySelectorAll('.hero-animate').forEach(el => el.classList.add('is-visible'));
    }, 100);

    // Scroll reveal
    const revealEls = document.querySelectorAll('.reveal-on-scroll');
    if (!revealEls.length) return;

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    revealEls.forEach(el => observer.observe(el));

    // Stat counter animation
    const statVals = document.querySelectorAll('.quality-stat-val');
    const statObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          statObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    statVals.forEach(el => statObserver.observe(el));
  };

  if (window.APP && typeof window.APP.onReady === 'function') {
    window.APP.onReady(init);
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }
})();
