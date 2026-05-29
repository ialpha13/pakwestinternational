(() => {
  const initNavbar = () => {
    const nav = document.querySelector('.js-navbar');
    if (!nav) return;

    // --- Scroll-based solid navbar logic (unchanged) ---
    const forceSolid = nav.getAttribute('data-force-solid') === 'true';
    const toggleSolid = () => {
      if (forceSolid || window.scrollY > 50) {
        nav.classList.add('navbar--solid');
      } else {
        nav.classList.remove('navbar--solid');
      }
    };

    toggleSolid();
    window.addEventListener('scroll', toggleSolid, { passive: true });

    // --- Mobile menu logic ---
    const toggleBtn = nav.querySelector('.js-mobile-toggle');
    const menu = nav.querySelector('.js-mobile-menu');
    if (!toggleBtn || !menu) return;

    const overlay = menu.querySelector('.js-mobile-overlay');
    const allLinks = menu.querySelectorAll('[data-nav-link]');
    const productsToggle = menu.querySelector('[data-mobile-products-toggle]');
    const productsMenu = menu.querySelector('#mobile-products-menu');

    /**
     * Get all focusable elements inside the menu for focus trapping
     */
    const getFocusableElements = () => {
      return menu.querySelectorAll(
        'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'
      );
    };

    /**
     * Open or close the mobile menu
     */
    const setMenuState = (isOpen) => {
      menu.classList.toggle('is-open', isOpen);
      document.body.classList.toggle('menu-open', isOpen);
      toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      toggleBtn.setAttribute('aria-label', isOpen ? 'Close navigation menu' : 'Open navigation menu');
      menu.setAttribute('aria-hidden', isOpen ? 'false' : 'true');

      if (isOpen) {
        // Prevent background scrolling
        document.body.style.overflow = 'hidden';

        // Keep focus on the existing toggle so it acts as both open/close control
        requestAnimationFrame(() => {
          toggleBtn.focus();
        });
      } else {
        document.body.style.overflow = '';
        if (productsToggle && productsMenu) {
          productsToggle.setAttribute('aria-expanded', 'false');
          productsMenu.classList.remove('is-open');
          productsMenu.setAttribute('aria-hidden', 'true');
        }

        // Return focus to the toggle button
        toggleBtn.focus();
      }
    };

    /**
     * Focus trap handler - keeps Tab cycling within the menu
     */
    const handleFocusTrap = (e) => {
      if (e.key !== 'Tab') return;
      if (!menu.classList.contains('is-open')) return;

      const focusable = getFocusableElements();
      if (focusable.length === 0) return;

      const firstFocusable = focusable[0];
      const lastFocusable = focusable[focusable.length - 1];

      if (e.shiftKey) {
        // Shift+Tab: if on first element, wrap to last
        if (document.activeElement === firstFocusable) {
          e.preventDefault();
          lastFocusable.focus();
        }
      } else {
        // Tab: if on last element, wrap to first
        if (document.activeElement === lastFocusable) {
          e.preventDefault();
          firstFocusable.focus();
        }
      }
    };

    // Toggle button click
    toggleBtn.addEventListener('click', () => {
      setMenuState(!menu.classList.contains('is-open'));
    });

    if (productsToggle && productsMenu) {
      productsToggle.addEventListener('click', () => {
        const isOpen = productsToggle.getAttribute('aria-expanded') === 'true';
        productsToggle.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
        productsMenu.classList.toggle('is-open', !isOpen);
        productsMenu.setAttribute('aria-hidden', isOpen ? 'true' : 'false');
      });
    }

    if (overlay) {
      overlay.addEventListener('click', () => setMenuState(false));
    }

    // Close when clicking a nav link
    allLinks.forEach((link) => {
      link.addEventListener('click', () => setMenuState(false));
    });

    // Escape key close
    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && menu.classList.contains('is-open')) {
        setMenuState(false);
      }
    });

    // Focus trap
    menu.addEventListener('keydown', handleFocusTrap);

    // Close on resize past breakpoint
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        setMenuState(false);
      }
    });
  };

  if (window.APP && typeof window.APP.onReady === 'function') {
    window.APP.onReady(initNavbar);
  } else {
    document.addEventListener('DOMContentLoaded', initNavbar);
  }
})();
