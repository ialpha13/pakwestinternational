<?php
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'Himalayan Salt Categories for Wholesale | Pakwest International';
$pageDescription = 'Browse wholesale Himalayan salt categories including salt lamps, salt tiles, edible pink salt, black salt, and animal licking blocks for global export.';
$pageKeywords = 'Himalayan salt categories, wholesale salt lamps, edible pink salt bulk, salt tiles supplier, animal lick salt exporter';
$currentPage = 'categories';
$forceSolid = true;
$canonicalUrl = full_url('categories');
$ogImage = base_url('assets/images/categories/lamp.png');
$ogImageAlt = 'Himalayan salt product categories by Pakwest International';
$breadcrumbItems = [
  ['name' => 'Home', 'url' => page_url('home')],
  ['name' => 'Categories', 'url' => page_url('categories')]
];

$schemaGraphs = [
  [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => $pageTitle,
    'description' => $pageDescription,
    'url' => $canonicalUrl
  ]
];

$styles = [
  'assets/css/components/navbar.css',
  'assets/css/components/footer.css',
  'assets/css/components/whatsapp-chat.css',
  'assets/css/pages/categories.css'
];

$scripts = [
  'assets/js/components/navbar.js',
  'assets/js/components/footer.js',
  'assets/js/components/whatsapp-chat.js',
  'assets/js/pages/categories.js'
];

$segments = catalog_categories();

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../components/navbar.php';
?>
<main id="main-content" class="categories-page">
  <div class="categories-hero">
    <div class="categories-hero-bg"></div>
    <div class="categories-hero-content container mx-auto px-6">
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="<?= h(page_url('home')) ?>">Home</a>
        <span class="separator">/</span>
        <span class="current">Categories</span>
      </nav>
      <span class="categories-subtitle hero-animate delay-100">Our Expertise</span>
      <h1 class="categories-title hero-animate delay-200">Product Divisions</h1>
      <p class="categories-desc hero-animate delay-300">
        Specialized sectors delivering purity and precision across industries. From high-purity industrial compounds to hand-carved wellness accents, discover the division that fits your business needs.
      </p>
    </div>
  </div>

  <div class="categories-container">
    <div class="categories-grid">
      <?php if (empty($segments)): ?>
        <div class="col-span-full text-center py-20">
          <p class="text-gray-400 text-lg">Product divisions are currently being updated.</p>
        </div>
      <?php else: ?>
        <?php foreach ($segments as $cat): ?>
          <?php $isFeatured = !empty($cat['featured']); ?>
          <a href="<?= h(category_products_url($cat['slug'])) ?>" class="category-card group reveal-on-scroll <?= $isFeatured ? 'is-featured' : '' ?>">
            <div class="category-img-wrapper">
              <?php if ($isFeatured): ?>
                <span class="featured-badge">Featured</span>
              <?php endif; ?>
              <?php
                $imgPath = (string) ($cat['img'] ?? '');
                $imgSrc = strpos($imgPath, 'http') === 0 ? $imgPath : base_url($imgPath);
              ?>
              <img src="<?= h($imgSrc) ?>" class="category-img" alt="<?= h($cat['title']) ?>" loading="lazy" decoding="async">
              <div class="category-overlay"></div>
            </div>
            <div class="category-content">
              <span class="category-id"><?= h($cat['id']) ?></span>
              <span class="category-product-count"><?= (int) ($cat['product_count'] ?? 0) ?> Product Families</span>
              <h3 class="category-title"><?= h($cat['title']) ?></h3>
              <p class="category-desc"><?= h($cat['desc']) ?></p>
              <div class="category-link">
                <span class="category-link-text">Explore Division</span>
                <svg class="w-4 h-4 text-[#c5a059]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php
include __DIR__ . '/../components/whatsapp-chat.php';
include __DIR__ . '/../components/footer.php';
include __DIR__ . '/../includes/foot.php';
?>


