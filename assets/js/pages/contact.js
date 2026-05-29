(() => {
  const init = () => {
    const form = document.querySelector('.contact-form');
    const successMsg = document.querySelector('.contact-success');
    const faqItems = document.querySelectorAll('.faq-item');

    if (successMsg && successMsg.classList.contains('is-visible')) {
      successMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // FAQ Accordion
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');
      const answer = item.querySelector('.faq-answer');

      question.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        
        // Close all others
        faqItems.forEach(other => {
          other.classList.remove('active');
          other.querySelector('.faq-answer').style.maxHeight = null;
        });

        // Toggle current
        if (!isActive) {
          item.classList.add('active');
          answer.style.maxHeight = answer.scrollHeight + 'px';
        }
      });
    });

    // Hero Parallax Effect
    const heroSection = document.querySelector('.contact-hero');
    const heroBg = document.querySelector('.contact-hero-bg');
    
    if (heroSection && heroBg) {
      heroSection.addEventListener('mousemove', (e) => {
        const rect = heroSection.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width - 0.5;
        const y = (e.clientY - rect.top) / rect.height - 0.5;
        
        // Move background slightly opposite to mouse direction
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
  };

  if (window.APP && typeof window.APP.onReady === 'function') {
    window.APP.onReady(init);
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }
})();
