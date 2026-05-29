<?php
$scripts = $scripts ?? [];
?>
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scroll-progress"></div>

    <script>
      window.APP_BASE_URL = "<?= h(base_url('')) ?>";
    </script>
    <script src="<?= h(base_url('assets/js/global.js')) ?>"></script>
<?php foreach ($scripts as $script): ?>
    <script src="<?= h(base_url($script)) ?>"></script>
<?php endforeach; ?>

    <script>
    // Scroll progress bar
    (function() {
      const bar = document.getElementById('scroll-progress');
      if (!bar) return;

      function updateScroll() {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        if (docHeight > 0) {
          bar.style.width = (scrollTop / docHeight * 100) + '%';
        }
      }

      window.addEventListener('scroll', updateScroll, { passive: true });
      updateScroll();

      // Lazy image loading fallback
      document.querySelectorAll('img[loading="lazy"]').forEach(function(img) {
        if (img.complete) img.classList.add('loaded');
        else img.addEventListener('load', function() { img.classList.add('loaded'); });
      });
    })();
    </script>
</body>
</html>
