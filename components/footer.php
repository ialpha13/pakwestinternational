<?php
require_once __DIR__ . '/../includes/functions.php';

$navItems = nav_items();
if (empty($navItems)) {
  $navItems = [
    ['id' => 'home', 'label' => 'Home'],
    ['id' => 'products', 'label' => 'Products'],
    ['id' => 'categories', 'label' => 'Categories'],
    ['id' => 'quality', 'label' => 'Quality'],
    ['id' => 'about', 'label' => 'About'],
    ['id' => 'contact', 'label' => 'Contact'],
  ];
}

$catData = categories();
$footerCategories = $catData['categories'] ?? [];
?>
<footer class="footer" role="contentinfo">
  <div class="footer-container">
    <div class="footer-top">
      <div class="footer-brand-col">
        <a href="<?= h(page_url('home')) ?>" class="footer-logo" aria-label="Pakwest International Home">
          <img src="<?= h(base_url('assets/images/logopakwest.webp')) ?>" alt="Pakwest International" class="footer-logo-img" width="160" height="64">
        </a>
        <p class="footer-desc">
          FDA approved manufacturer and exporter of premium Himalayan salt products. Serving wholesalers in the USA, Europe, and worldwide since 2008.
        </p>
        <div class="footer-contact-info">
          <a href="mailto:contact@pakwestinternational.com" class="footer-contact-link">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            contact@pakwestinternational.com
          </a>
          <a href="https://wa.me/923335036125" target="_blank" rel="noopener" class="footer-contact-link">
            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.555 4.122 1.527 5.855L.058 23.708l5.988-1.57A11.934 11.934 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.797a9.78 9.78 0 01-5.197-1.488l-.372-.221-3.862 1.013 1.03-3.77-.244-.386A9.776 9.776 0 012.203 12c0-5.406 4.39-9.797 9.797-9.797 5.407 0 9.797 4.39 9.797 9.797 0 5.406-4.39 9.797-9.797 9.797z"/></svg>
            +92 333 5036125
          </a>
        </div>
      </div>

      <div class="footer-links-grid">
        <div class="footer-col">
          <span class="footer-heading">Quick Links</span>
          <?php foreach ($navItems as $item): ?>
            <a href="<?= h(page_url($item['id'])) ?>" class="footer-link"><?= h($item['label'] ?? '') ?></a>
          <?php endforeach; ?>
        </div>

        <div class="footer-col">
          <span class="footer-heading">Top Categories</span>
          <?php foreach (array_slice($footerCategories, 0, 6) as $cat): ?>
            <a href="<?= h(products_url($cat['id'] ?? '')) ?>" class="footer-link"><?= h($cat['title'] ?? $cat['id'] ?? '') ?></a>
          <?php endforeach; ?>
        </div>

        <div class="footer-col">
          <span class="footer-heading">Head Office</span>
          <p class="footer-address">
            Karachi Port Trust Area,<br>
            Suite 405 Business Hub,<br>
            Karachi, Pakistan
          </p>
          <a href="<?= h(page_url('contact')) ?>" class="footer-mini-cta">Request a Quote</a>
        </div>
      </div>
    </div>

    <div class="footer-certs-list">
      <span class="footer-cert-item">FDA Approved</span>
      <span class="footer-cert-item">FBR Certified</span>
      <span class="footer-cert-item">ISO 9001:2015</span>
      <span class="footer-cert-item">APCEA Member</span>
      <span class="footer-cert-item">PGJDC Registered</span>
    </div>

    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> Pakwest International. All rights reserved.</p>
      <div class="footer-bottom-links">
        <a href="<?= h(page_url('quality')) ?>">Quality Standards</a>
        <a href="<?= h(page_url('products')) ?>">Products</a>
        <a href="<?= h(page_url('contact')) ?>">Contact</a>
      </div>
    </div>
  </div>
</footer>
