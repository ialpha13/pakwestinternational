<?php
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'Himalayan Pink Salt Manufacturer & Exporter in Pakistan | Pakwest International';
$pageDescription = 'Pakwest International is a Pakistan-based Himalayan pink salt manufacturer and exporter for bulk importers, distributors, and private label brands worldwide.';
$pageKeywords = 'Himalayan pink salt manufacturer, Himalayan salt exporter Pakistan, bulk Himalayan salt supplier, wholesale pink salt, private label Himalayan salt';
$currentPage = 'home';
$forceSolid = false;
$canonicalUrl = full_url('home');
$ogImage = base_url('assets/images/hero/p5.webp');
$ogImageAlt = 'Pakwest International Himalayan salt wholesale export';
$breadcrumbItems = [
  ['name' => 'Home', 'url' => page_url('home')]
];

$schemaGraphs = [
  [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => $pageTitle,
    'description' => $pageDescription,
    'url' => $canonicalUrl
  ]
];

$styles = [
  'assets/css/components/navbar.css',
  'assets/css/components/footer.css',
  'assets/css/components/whatsapp-chat.css',
  'assets/css/pages/home.css'
];

$scripts = [
  'assets/js/components/navbar.js',
  'assets/js/components/footer.js',
  'assets/js/components/whatsapp-chat.js',
  'assets/js/pages/home.js'
];

// Load Featured Collections from JSON
$featuredCategories = [];
$catData = categories();
if (!empty($catData['categories'])) {
    $allCats = $catData['categories'];
    // Prioritize featured categories
    $featured = array_filter($allCats, function($c) { return !empty($c['featured']); });
    $others = array_filter($allCats, function($c) { return empty($c['featured']); });

    $featuredCategories = array_merge($featured, $others);
    $featuredCategories = array_slice($featuredCategories, 0, 3);
}

// Fallback if JSON fails
if (empty($featuredCategories)) {
    $featuredCategories = [
        ['id' => 'Decor', 'title' => 'Decor & Lamps', 'img' => 'assets/images/categories/decor.svg'],
        ['id' => 'Edible', 'title' => 'Gourmet Edible Salts', 'img' => 'assets/images/categories/edible.svg'],
        ['id' => 'Animal', 'title' => 'Animal Mineral Salt', 'img' => 'assets/images/categories/animal.svg']
    ];
}

$impactStats = [
  ['val' => '25+', 'label' => 'Countries Served'],
  ['val' => '84+', 'label' => 'Trace Minerals'],
  ['val' => '34', 'label' => 'Product Varieties'],
  ['val' => '100%', 'label' => 'Export Oriented']
];

$certifications = ['FDA APPROVED', 'FBR CERTIFIED', 'APCEA MEMBER', 'PGJDC REGISTERED', 'ISO 9001:2015'];

// Why Choose Us
$whyChooseUs = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
        'title' => 'FDA Approved',
        'desc' => 'All products are manufactured in FDA-approved facilities meeting the highest international food safety standards.'
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
        'title' => 'Competitive Pricing',
        'desc' => 'Direct from the source with no middlemen. We offer the most competitive wholesale rates for bulk Himalayan salt orders.'
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>',
        'title' => 'Custom Packaging',
        'desc' => 'Private labeling and custom packaging solutions tailored to your brand. From retail pouches to industrial bulk bags.'
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
        'title' => 'Worldwide Shipping',
        'desc' => 'Reliable logistics network spanning 25+ countries. Timely delivery with full shipment tracking and documentation.'
    ]
];

// Featured Products
$productsData = products();
$allProducts = $productsData['products'] ?? [];
$featuredProducts = [];
$seenCategories = [];

foreach ($allProducts as $product) {
    $category = $product['category'] ?? '';
    if ($category === '' || isset($seenCategories[$category])) {
        continue;
    }

    $featuredProducts[] = $product;
    $seenCategories[$category] = true;

    if (count($featuredProducts) >= 4) {
        break;
    }
}

if (count($featuredProducts) < 4) {
    foreach ($allProducts as $product) {
        if (count($featuredProducts) >= 4) {
            break;
        }

        if (in_array($product, $featuredProducts, true)) {
            continue;
        }

        $featuredProducts[] = $product;
    }
}

// Hero Slider Content
$heroContent = [
    [
        'subtitle' => 'FDA Approved Manufacturer & Exporter',
        'title' => 'Himalayan Salt <br> <span class="text-[#c5a059]">Global Export.</span>',
        'desc' => 'We offer competitive rates on premium Himalayan salt products with international standard packing. Serving wholesalers in the USA, Europe, and worldwide with customized orders.'
    ],
    [
        'subtitle' => 'Industrial Purity Standards',
        'title' => 'Precision <br> <span class="text-[#c5a059]">Refinement.</span>',
        'desc' => 'Delivering 99.9% pure sodium chloride for textile, pharmaceutical, and chemical industries. ISO 9001:2015 certified processes.'
    ],
    [
        'subtitle' => 'Sustainable Mining',
        'title' => 'Nature\'s <br> <span class="text-[#c5a059]">Finest Reserve.</span>',
        'desc' => 'Ethically sourced from the ancient salt ranges of Pakistan, preserving the natural mineral content for wellness and culinary excellence.'
    ]
];

// Hero Slider Images
$heroImages = [];
$heroDir = __DIR__ . '/../assets/images/hero';
if (is_dir($heroDir)) {
    $files = scandir($heroDir);
    foreach ($files as $file) {
        if (in_array($file, ['.', '..'])) continue;
        if (preg_match('/\.(jpg|jpeg|png|webp)$/i', $file)) {
            $heroImages[] = 'assets/images/hero/' . $file;
        }
    }
}
if (empty($heroImages)) {
    $heroImages[] = 'assets/images/hero/placeholder.jpg';
}

$headExtras = '';
if (!empty($heroImages[0])) {
    $headExtras = '<link rel="preload" as="image" href="' . h(base_url($heroImages[0])) . '">';
}

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../components/navbar.php';
?>
<main id="main-content" class="home-page-shell">
  <div class="home-hero-stage">
    <div class="home-hero-media" aria-hidden="true">
      <?php foreach ($heroImages as $index => $img): ?>
        <?php $imgSrc = strpos($img, 'http') === 0 ? $img : base_url($img); ?>
        <img
          src="<?= h($imgSrc) ?>"
          alt=""
          class="hero-slide absolute inset-0 w-full h-full object-cover <?= $index === 0 ? 'active' : '' ?>"
          <?= $index !== 0 ? 'loading="lazy"' : 'loading="eager" fetchpriority="high"' ?>
          decoding="async"
        />
      <?php endforeach; ?>
      <div class="hero-overlay-blur"></div>
      <div class="hero-overlay-gradient"></div>
    </div>

    <section class="hero-section">
    <div class="container mx-auto hero-content">
      <div class="grid grid-cols-1 place-items-center">
        <?php foreach ($heroImages as $index => $img): ?>
          <?php $txt = $heroContent[$index % count($heroContent)]; ?>
          <div class="hero-text-slide col-start-1 row-start-1 max-w-3xl mx-auto <?= $index === 0 ? 'active' : '' ?>">
            <span class="hero-subtitle">
              <?= h($txt['subtitle']) ?>
            </span>

            <h1 class="hero-title">
              <?= $txt['title'] ?>
            </h1>

            <p class="hero-desc">
              <?= h($txt['desc']) ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="hero-btn-group">
        <a
          href="<?= h(page_url('categories')) ?>"
          class="btn-hero btn-hero-primary"
        >
          Explore Collections
        </a>
        <a
          href="<?= h(page_url('about')) ?>"
          class="btn-hero btn-hero-outline"
        >
          Our Heritage
        </a>
      </div>
    </div>
    </section>
  </div>

  <section class="section-collections">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="section-header">
        <div class="max-w-2xl">
          <span class="section-subtitle">Featured Collections</span>
          <h2 class="section-title">
            Excellence Across <br><span class="italic text-[#c5a059]">Every Sector.</span>
          </h2>
        </div>
        <a
          href="<?= h(page_url('categories')) ?>"
          class="link-view-all group"
        >
          View All Categories
          <div class="link-line"></div>
        </a>
      </div>

      <div class="collections-grid">
        <?php foreach ($featuredCategories as $item): ?>
          <a
            href="<?= h(products_url($item['id'])) ?>"
            class="collection-card group"
          >
            <?php $imgSrc = strpos($item['img'], 'http') === 0 ? $item['img'] : base_url($item['img']); ?>
            <img src="<?= h($imgSrc) ?>" class="collection-img" alt="<?= h($item['title']) ?>" loading="lazy">
            <div class="collection-overlay"></div>
            <div class="collection-content">
              <span class="collection-cat"><?= h($item['id']) ?></span>
              <h3 class="collection-title"><?= h($item['title']) ?></h3>
              <div class="collection-link">
                <span class="text-[10px] font-black uppercase tracking-widest">Explore</span>
                <svg class="w-5 h-5 text-[#c5a059]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section-why-choose-us">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="text-center mb-16">
        <span class="section-subtitle">Why Partner With Us</span>
        <h2 class="section-title">
          Why Choose <br><span class="italic text-[#c5a059]">Pakwest.</span>
        </h2>
      </div>

      <div class="why-choose-grid">
        <?php foreach ($whyChooseUs as $card): ?>
          <div class="why-choose-card">
            <div class="why-choose-icon">
              <?= $card['icon'] ?>
            </div>
            <h3 class="why-choose-title"><?= h($card['title']) ?></h3>
            <p class="why-choose-desc"><?= h($card['desc']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section-impact">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="impact-grid">
        <div class="impact-text-col">
          <div>
            <span class="section-subtitle">Global Export Reach</span>
            <h2 class="section-title text-white mb-8">Serving the <br><span class="text-[#c5a059]">World's Markets.</span></h2>
            <p class="impact-desc">
              We are a dedicated Himalayan salt manufacturer and exporter, serving major wholesalers in the USA, Europe, and globally. We offer competitive rates and international standard packing for all your bulk requirements.
            </p>
          </div>

          <div class="impact-stats-grid">
            <?php foreach ($impactStats as $stat): ?>
              <div class="stat-item">
                <h4 class="stat-val"><?= h($stat['val']) ?></h4>
                <p class="stat-label"><?= h($stat['label']) ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="impact-img-container">
          <img
            src="<?= h(base_url('assets/images/hero/p5.webp')) ?>"
            class="impact-img"
            alt="Pakwest International global export logistics network"
            loading="lazy"
            decoding="async"
          />
          <div class="absolute inset-0 flex items-center justify-center">
            <div class="impact-pulse-circle">
              <span class="text-[#c5a059] text-[10px] font-black uppercase tracking-widest">HQ Karachi</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-featured-products">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="section-header">
        <div class="max-w-2xl">
          <span class="section-subtitle">Our Products</span>
          <h2 class="section-title">
            Featured <br><span class="italic text-[#c5a059]">Products.</span>
          </h2>
        </div>
        <a
          href="<?= h(page_url('products')) ?>"
          class="link-view-all group"
        >
          View All Products
          <div class="link-line"></div>
        </a>
      </div>

      <div class="featured-products-grid">
        <?php foreach ($featuredProducts as $product): ?>
          <?php
            $productCategory = (string) ($product['category'] ?? '');
            $productCtaUrl = products_url($productCategory !== '' ? $productCategory : null);
            $categoryData = $productCategory !== '' ? find_category_by_identifier($productCategory) : null;
            if ($categoryData !== null) {
              $titleParts = split_product_title((string) ($product['title'] ?? ''));
              $productSlug = slugify((string) ($titleParts['base_title'] ?? ''));
              if ($productSlug !== '') {
                $detailUrl = product_detail_url((string) ($categoryData['slug'] ?? ''), $productSlug);
                if ($detailUrl !== '') {
                  $productCtaUrl = $detailUrl;
                }
              }
            }
          ?>
          <article class="featured-product-card">
            <a href="<?= h($productCtaUrl) ?>" class="featured-product-card-hit" aria-label="View <?= h($product['title']) ?>">
            <div class="featured-product-img-wrap">
              <?php $pImgSrc = strpos($product['image'], 'http') === 0 ? $product['image'] : base_url($product['image']); ?>
              <img
                src="<?= h($pImgSrc) ?>"
                alt="<?= h($product['title']) ?>"
                class="featured-product-img"
                loading="lazy"
                decoding="async"
              />
              <span class="featured-product-pill">Export Grade</span>
            </div>
            <div class="featured-product-info">
              <span class="featured-product-category"><?= h($product['category']) ?></span>
              <h3 class="featured-product-title"><?= h($product['title']) ?></h3>
              <p class="featured-product-desc"><?= h($product['desc']) ?></p>
              <span class="featured-product-cta">View Product</span>
            </div>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section-certs">
    <div class="container mx-auto px-6">
      <div class="certs-container">
        <?php foreach ($certifications as $cert): ?>
          <span class="cert-item">
            <?= h($cert) ?>
          </span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section-cta">
    <div class="cta-bg"></div>
    <div class="container mx-auto px-6 cta-content">
      <h2 class="cta-title">Ready to Partner?</h2>
      <p class="cta-desc">Join the global network of industries relying on Pakwest purity. Get a customized quote for your bulk requirements today.</p>
      <a href="<?= h(page_url('contact')) ?>" class="btn-hero btn-hero-primary">Start Conversation</a>
    </div>
  </section>
</main>

<?php
include __DIR__ . '/../components/whatsapp-chat.php';
include __DIR__ . '/../components/footer.php';
include __DIR__ . '/../includes/foot.php';
?>
