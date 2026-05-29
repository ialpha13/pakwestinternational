<?php
require_once __DIR__ . '/../includes/functions.php';

$currentPage = $currentPage ?? 'home';
$forceSolid = $forceSolid ?? false;
$navItems = nav_items();
$catalogCategories = catalog_categories();
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
?>
<a href="#main-content" class="skip-to-content">Skip to content</a>
<nav class="js-navbar navbar <?= $forceSolid ? 'navbar--solid' : '' ?>" data-force-solid="<?= $forceSolid ? 'true' : 'false' ?>" role="navigation" aria-label="Primary">
  <div class="navbar-container">
    <a href="<?= h(page_url('home')) ?>" class="nav-logo" aria-label="Pakwest International - Home">
      <img src="<?= h(base_url('assets/images/logopakwest.webp')) ?>" alt="Pakwest International" class="nav-logo-img" width="140" height="56">
    </a>

    <div class="nav-center">
      <?php foreach ($navItems as $item):
        $isActive = ($item['id'] ?? '') === $currentPage;
        $itemId = $item['id'] ?? '';
      ?>
        <?php if ($itemId === 'products'): ?>
          <div class="nav-dropdown">
            <a
              href="<?= h(products_url()) ?>"
              class="nav-link nav-link-with-caret <?= $isActive ? 'is-active' : '' ?>"
              <?= $isActive ? 'aria-current="page"' : '' ?>
            >
              <?= h($item['label'] ?? '') ?>
              <svg class="nav-caret" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"/></svg>
              <span class="nav-underline <?= $isActive ? 'is-active' : '' ?>"></span>
            </a>
            <?php if (!empty($catalogCategories)): ?>
              <div class="products-dropdown-menu" role="menu" aria-label="Products categories">
                <div class="products-dropdown-grid">
                  <?php foreach ($catalogCategories as $category): ?>
                    <div class="products-dropdown-column">
                      <a class="products-dropdown-category" href="<?= h(category_products_url($category['slug'])) ?>">
                        <?= h($category['title']) ?>
                        <span class="products-dropdown-count"><?= (int) ($category['product_count'] ?? 0) ?></span>
                      </a>
                      <ul class="products-dropdown-list">
                        <?php
                        $productLinks = $category['products'] ?? [];
                        $productLinks = array_slice($productLinks, 0, 5);
                        foreach ($productLinks as $product):
                        ?>
                          <li>
                            <a class="products-dropdown-item" href="<?= h(product_detail_url($category['slug'], $product['slug'])) ?>">
                              <?= h($product['title']) ?>
                            </a>
                          </li>
                        <?php endforeach; ?>
                        <li>
                          <a class="products-dropdown-view-all" href="<?= h(category_products_url($category['slug'])) ?>">
                            View all
                          </a>
                        </li>
                      </ul>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <a
            href="<?= h(page_url($itemId)) ?>"
            class="nav-link <?= $isActive ? 'is-active' : '' ?>"
            <?= $isActive ? 'aria-current="page"' : '' ?>
          >
            <?= h($item['label'] ?? '') ?>
            <span class="nav-underline <?= $isActive ? 'is-active' : '' ?>"></span>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <div class="nav-right">
      <a
        href="<?= h(page_url('contact')) ?>"
        class="nav-cta"
      >
        Get Quote
        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>

    <button
      type="button"
      class="nav-toggle js-mobile-toggle"
      aria-label="Open navigation menu"
      aria-expanded="false"
      aria-controls="mobile-menu"
    >
      <span class="nav-toggle-icon" aria-hidden="true">
        <span class="nav-toggle-bar"></span>
        <span class="nav-toggle-bar"></span>
        <span class="nav-toggle-bar"></span>
      </span>
    </button>
  </div>

  <div class="js-mobile-menu mobile-menu" id="mobile-menu" aria-hidden="true">
    <div class="mobile-overlay js-mobile-overlay"></div>
    <div class="mobile-drawer">
      <div class="mobile-drawer-glow" aria-hidden="true"></div>
      <div class="mobile-drawer-header">
        <a href="<?= h(page_url('home')) ?>" class="mobile-logo" aria-label="Pakwest International - Home">
          <img src="<?= h(base_url('assets/images/logopakwest.webp')) ?>" alt="Pakwest International" class="mobile-logo-img" width="120" height="48">
        </a>
      </div>

      <nav class="mobile-drawer-nav">
        <ul class="mobile-nav-list">
          <?php foreach ($navItems as $index => $item):
            $isActive = ($item['id'] ?? '') === $currentPage;
            $num = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            $itemId = $item['id'] ?? '';
          ?>
            <li class="mobile-nav-item" data-stagger-index="<?= $index ?>">
              <?php if ($itemId === 'products'): ?>
                <button
                  type="button"
                  class="mobile-link mobile-link-toggle <?= $isActive ? 'is-active' : '' ?>"
                  data-mobile-products-toggle
                  aria-expanded="false"
                  aria-controls="mobile-products-menu"
                >
                  <span class="mobile-link-num"><?= $num ?></span>
                  <span><?= h($item['label'] ?? '') ?></span>
                  <svg class="mobile-submenu-caret" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="mobile-products-submenu" id="mobile-products-menu" aria-hidden="true">
                  <a data-nav-link href="<?= h(products_url()) ?>" class="mobile-submenu-top-link">All Products</a>
                  <?php foreach ($catalogCategories as $category): ?>
                    <div class="mobile-submenu-group">
                      <a data-nav-link href="<?= h(category_products_url($category['slug'])) ?>" class="mobile-submenu-category-link">
                        <?= h($category['title']) ?>
                      </a>
                      <ul class="mobile-submenu-list">
                        <?php
                        $mobileProducts = $category['products'] ?? [];
                        $mobileProducts = array_slice($mobileProducts, 0, 4);
                        foreach ($mobileProducts as $product):
                        ?>
                          <li>
                            <a data-nav-link href="<?= h(product_detail_url($category['slug'], $product['slug'])) ?>" class="mobile-submenu-link">
                              <?= h($product['title']) ?>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php else: ?>
                <a
                  data-nav-link
                  href="<?= h(page_url($itemId)) ?>"
                  class="mobile-link <?= $isActive ? 'is-active' : '' ?>"
                  <?= $isActive ? 'aria-current="page"' : '' ?>
                >
                  <span class="mobile-link-num"><?= $num ?></span>
                  <?= h($item['label'] ?? '') ?>
                </a>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>

      <div class="mobile-drawer-footer">
        <p class="mobile-kicker">Premium Himalayan Salt Exporter</p>
        <a
          data-nav-link
          href="<?= h(page_url('contact')) ?>"
          class="mobile-cta"
        >
          Get Expert Quote
          <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
        <div class="mobile-contact">
          <a href="mailto:contact@pakwestinternational.com" class="mobile-contact-link">contact@pakwestinternational.com</a>
                        <a href="tel:+923335036125" class="mobile-contact-link">+92 333 5036125</a>
        </div>
      </div>
    </div>
  </div>
</nav>
<div id="main-content"></div>
