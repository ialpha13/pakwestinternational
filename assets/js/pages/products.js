(() => {
  const init = () => {
    document.querySelectorAll('.hero-animate').forEach((el) => el.classList.add('is-visible'));

    const page = document.querySelector('.products-page');
    if (!page) {
      return;
    }

    const switcher = document.querySelector('[data-variation-switcher]');
    if (switcher) {
      const chips = Array.from(switcher.querySelectorAll('[data-variation-chip]'));
      const previewImage = switcher.querySelector('[data-variation-preview-image]');
      const previewMedia = switcher.querySelector('.variation-focus-media');
      const previewContent = switcher.querySelector('.variation-focus-content');
      const previewLabel = switcher.querySelector('[data-variation-preview-label]');
      const previewTitle = switcher.querySelector('[data-variation-preview-title]');
      const previewDescription = switcher.querySelector('[data-variation-preview-description]');

      const updatePreviewMediaSize = () => {
        if (!previewImage || !previewMedia || !previewContent) return;
        if (window.matchMedia('(max-width: 767px)').matches) {
          previewMedia.style.removeProperty('--preview-media-width');
          previewMedia.style.removeProperty('--preview-media-height');
          previewContent.style.removeProperty('--preview-content-reserved');
          return;
        }

        const naturalWidth = previewImage.naturalWidth;
        const naturalHeight = previewImage.naturalHeight;
        if (!naturalWidth || !naturalHeight) return;

        const ratio = naturalWidth / naturalHeight;
        const mediaHeight = 136;
        let mediaWidth = Math.round(mediaHeight * ratio);
        mediaWidth = Math.max(148, Math.min(270, mediaWidth));

        previewMedia.style.setProperty('--preview-media-width', `${mediaWidth}px`);
        previewMedia.style.setProperty('--preview-media-height', `${mediaHeight}px`);
        previewContent.style.setProperty('--preview-content-reserved', `${mediaWidth + 28}px`);
      };

      const setActiveChip = (chip) => {
        chips.forEach((item) => {
          const isActive = item === chip;
          item.classList.toggle('is-active', isActive);
          item.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        if (previewImage) {
          previewImage.src = chip.getAttribute('data-variation-image') || previewImage.src;
          previewImage.alt = chip.getAttribute('data-variation-title') || previewImage.alt;
          if (previewImage.complete) {
            updatePreviewMediaSize();
          } else {
            previewImage.addEventListener('load', updatePreviewMediaSize, { once: true });
          }
        }
        if (previewLabel) {
          previewLabel.textContent = chip.getAttribute('data-variation-label') || '';
        }
        if (previewTitle) {
          previewTitle.textContent = chip.getAttribute('data-variation-title') || '';
        }
        if (previewDescription) {
          previewDescription.textContent = chip.getAttribute('data-variation-description') || '';
        }
      };

      chips.forEach((chip) => {
        chip.addEventListener('click', () => setActiveChip(chip));
      });

      if (previewImage) {
        if (previewImage.complete) {
          updatePreviewMediaSize();
        } else {
          previewImage.addEventListener('load', updatePreviewMediaSize, { once: true });
        }
        window.addEventListener('resize', updatePreviewMediaSize);
      }
    }

    if (page.getAttribute('data-page-view') !== 'catalog') {
      return;
    }

    const cards = Array.from(document.querySelectorAll('.product-card'));
    const filterButtons = Array.from(document.querySelectorAll('.products-filter'));
    const searchInput = document.getElementById('product-search');
    const emptyState = document.getElementById('products-empty');

    if (!cards.length) {
      return;
    }

    let activeFilter = 'all';
    let query = '';

    const runFilter = () => {
      let visibleCount = 0;

      cards.forEach((card) => {
        const cardCategory = card.getAttribute('data-category') || '';
        const cardText = (card.textContent || '').toLowerCase();
        const matchesCategory = activeFilter === 'all' || cardCategory === activeFilter;
        const matchesSearch = query === '' || cardText.includes(query);
        const show = matchesCategory && matchesSearch;

        card.classList.toggle('is-hidden', !show);
        if (show) {
          visibleCount += 1;
        }
      });

      if (emptyState) {
        emptyState.classList.toggle('is-hidden', visibleCount !== 0);
      }
    };

    filterButtons.forEach((button) => {
      button.addEventListener('click', () => {
        filterButtons.forEach((btn) => btn.classList.remove('is-selected'));
        button.classList.add('is-selected');
        activeFilter = button.getAttribute('data-filter') || 'all';
        runFilter();
      });
    });

    if (searchInput) {
      searchInput.addEventListener('input', (event) => {
        query = String(event.target.value || '').trim().toLowerCase();
        runFilter();
      });
    }

    runFilter();
  };

  if (window.APP && typeof window.APP.onReady === 'function') {
    window.APP.onReady(init);
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }
})();
