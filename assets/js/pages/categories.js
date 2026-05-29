(() => {
  const init = () => {
    // Hero Parallax Effect
    const heroSection = document.querySelector('.categories-hero');
    const heroBg = document.querySelector('.categories-hero-bg');
    
    if (heroSection && heroBg) {
      heroSection.addEventListener('mousemove', (e) => {
        const rect = heroSection.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width - 0.5;
        const y = (e.clientY - rect.top) / rect.height - 0.5;
        
        heroBg.style.transform = `scale(1.1) translate(${x * -20}px, ${y * -20}px)`;
      });
      
      heroSection.addEventListener('mouseleave', () => {
        heroBg.style.transform = 'scale(1.1) translate(0, 0)';
      });
    }

    // Trigger Hero Animations
    setTimeout(() => {
      document.querySelectorAll('.hero-animate').forEach(el => el.classList.add('is-visible'));
    }, 100);

    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    document.querySelectorAll('.reveal-on-scroll').forEach((el, index) => {
      el.style.transitionDelay = `${index * 100}ms`;
      observer.observe(el);
    });
  };

  if (window.APP && typeof window.APP.onReady === 'function') {
    window.APP.onReady(init);
  } else {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', init);
    } else {
      init();
    }
  }
})();