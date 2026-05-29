(() => {
  const doc = document;
  const baseMeta = doc.querySelector('meta[name="base-url"]');
  const baseFromMeta = baseMeta ? baseMeta.getAttribute('content') : '/';
  const base = (window.APP_BASE_URL || baseFromMeta || '/').replace(/\/+$/, '/') + '';

  window.APP = window.APP || {};
  window.APP.baseUrl = base;
  window.APP.buildUrl = (path = '') => base.replace(/\/+$/, '/') + String(path).replace(/^\//, '');
  window.APP.onReady = (fn) => {
    if (doc.readyState === 'loading') {
      doc.addEventListener('DOMContentLoaded', fn);
    } else {
      fn();
    }
  };

  // Throttle utility for performance-sensitive events
  window.APP.throttle = (fn, delay) => {
    let lastCall = 0;
    return (...args) => {
      const now = Date.now();
      if (now - lastCall >= delay) {
        lastCall = now;
        fn(...args);
      }
    };
  };
})();
