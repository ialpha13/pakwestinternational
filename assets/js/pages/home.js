(() => {
  const init = () => {
    // Hero carousel
    const slides = document.querySelectorAll('.hero-slide');
    const textSlides = document.querySelectorAll('.hero-text-slide');

    if (slides.length > 1) {
      let current = 0;
      const interval = 5000;

      slides[0].classList.add('active');
      if (textSlides.length > 0) textSlides[0].classList.add('active');

      const heroInterval = setInterval(() => {
        const next = (current + 1) % slides.length;

        slides[current].classList.remove('active');
        slides[current].classList.add('last-active');

        if (textSlides[current]) {
          textSlides[current].classList.remove('active');
          textSlides[current].classList.add('last-active');
        }

        slides[next].classList.remove('last-active');
        slides[next].classList.add('active');

        if (textSlides[next]) {
          textSlides[next].classList.remove('last-active');
          textSlides[next].classList.add('active');
        }

        slides.forEach((slide, index) => {
          if (index !== current && index !== next) {
            slide.classList.remove('active', 'last-active');
          }
        });

        textSlides.forEach((slide, index) => {
          if (index !== current && index !== next) {
            slide.classList.remove('active', 'last-active');
          }
        });

        current = next;
      }, interval);

      // Clean up interval on page unload
      window.addEventListener('beforeunload', () => clearInterval(heroInterval));
    }

    // Scroll-triggered reveal animations
    const revealElements = document.querySelectorAll('.reveal-on-scroll');
    if (revealElements.length > 0 && 'IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

      revealElements.forEach((el) => observer.observe(el));
    }

    // Animated counter for stats
    const statVals = document.querySelectorAll('.stat-val[data-count]');
    if (statVals.length > 0 && 'IntersectionObserver' in window) {
      const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const el = entry.target;
            const target = parseInt(el.getAttribute('data-count'), 10);
            const suffix = el.getAttribute('data-suffix') || '';
            let count = 0;
            const duration = 1500;
            const step = Math.max(1, Math.floor(target / (duration / 30)));
            const timer = setInterval(() => {
              count += step;
              if (count >= target) {
                count = target;
                clearInterval(timer);
              }
              el.textContent = count + suffix;
            }, 30);
            counterObserver.unobserve(el);
          }
        });
      }, { threshold: 0.5 });

      statVals.forEach((el) => counterObserver.observe(el));
    }
  };

  if (window.APP && typeof window.APP.onReady === 'function') {
    window.APP.onReady(init);
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }
})();
