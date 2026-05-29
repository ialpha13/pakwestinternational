(() => {
  const init = () => {
    // Hero Parallax Effect
    const heroSection = document.querySelector('.about-hero');
    const heroBg = document.querySelector('.about-hero-bg');
    
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

    // Scroll Animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
  };

  if (window.APP && typeof window.APP.onReady === 'function') window.APP.onReady(init);
  else document.addEventListener('DOMContentLoaded', init);
})();