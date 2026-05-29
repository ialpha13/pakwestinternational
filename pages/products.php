<?php
require_once __DIR__ . '/../includes/functions.php';

$currentPage = 'products';
$forceSolid = true;
$pageKeywords = 'Himalayan salt products, bulk pink salt supplier, wholesale Himalayan salt catalog, Pakistan salt exporter';

$styles = [
  'assets/css/components/navbar.css',
  'assets/css/components/footer.css',
  'assets/css/components/whatsapp-chat.css',
  'assets/css/pages/products.css'
];

$scripts = [
  'assets/js/components/navbar.js',
  'assets/js/components/footer.js',
  'assets/js/components/whatsapp-chat.js',
  'assets/js/pages/products.js'
];

$catalogCategories = catalog_categories();
$categoryParam = isset($_GET['category']) ? trim((string) $_GET['category']) : '';
$productParam = isset($_GET['product']) ? trim((string) $_GET['product']) : '';

$activeCategory = null;
if ($categoryParam !== '') {
  $activeCategory = find_category_by_identifier(rawurldecode($categoryParam));
}

$activeProduct = null;
if ($activeCategory !== null && $productParam !== '') {
  $activeProduct = find_product_in_category($activeCategory['slug'], slugify(rawurldecode($productParam)));
}

$view = 'catalog';
if ($categoryParam !== '') {
  $view = $activeCategory !== null ? 'category' : 'not-found';
}
if ($productParam !== '') {
  $view = ($activeCategory !== null && $activeProduct !== null) ? 'product' : 'not-found';
}
if ($view === 'not-found') {
  http_response_code(404);
}

$canonicalPath = products_url();
if ($view === 'category' && $activeCategory !== null) {
  $canonicalPath = category_products_url($activeCategory['slug']);
}
if ($view === 'product' && $activeCategory !== null && $activeProduct !== null) {
  $canonicalPath = product_detail_url($activeCategory['slug'], $activeProduct['slug']);
}
if ($view === 'not-found') {
  $canonicalPath = current_url();
}
$canonicalUrl = absolute_url($canonicalPath);

$breadcrumbItems = [
  ['name' => 'Home', 'url' => page_url('home')],
  ['name' => 'Products', 'url' => products_url()],
];
if ($view === 'category' && $activeCategory !== null) {
  $breadcrumbItems[] = [
    'name' => (string) ($activeCategory['title'] ?? 'Category'),
    'url' => category_products_url((string) ($activeCategory['slug'] ?? ''))
  ];
}
if ($view === 'product' && $activeCategory !== null && $activeProduct !== null) {
  $breadcrumbItems[] = [
    'name' => (string) ($activeCategory['title'] ?? 'Category'),
    'url' => category_products_url((string) ($activeCategory['slug'] ?? ''))
  ];
  $breadcrumbItems[] = [
    'name' => (string) ($activeProduct['title'] ?? 'Product'),
    'url' => product_detail_url((string) ($activeCategory['slug'] ?? ''), (string) ($activeProduct['slug'] ?? ''))
  ];
}
if ($view === 'not-found') {
  $breadcrumbItems[] = ['name' => 'Not Found', 'url' => products_url()];
}

$flatProducts = [];
foreach ($catalogCategories as $category) {
  foreach ($category['products'] as $product) {
    $product['category_title'] = $category['title'];
    $product['category_id'] = $category['id'];
    $flatProducts[] = $product;
  }
}

$pageTitle = 'Himalayan Salt Products & Sizes | Pakwest International';
$pageDescription = 'Explore wholesale Himalayan salt products by category, with complete size ranges and product variations for importers and distributors.';

if ($view === 'category' && $activeCategory !== null) {
  $pageTitle = $activeCategory['title'] . ' Wholesale Range | Pakwest International';
  $pageDescription = $activeCategory['desc'] ?: $pageDescription;
  $pageKeywords = strtolower($activeCategory['title']) . ', wholesale ' . strtolower($activeCategory['title']) . ', Himalayan salt exporter Pakistan';
}

if ($view === 'product' && $activeProduct !== null) {
  $pageTitle = $activeProduct['title'] . ' Sizes & Variations | Pakwest International';
  $pageDescription = 'Explore all available sizes and design variations for ' . $activeProduct['title'] . '.';
  $pageKeywords = strtolower($activeProduct['title']) . ', bulk ' . strtolower($activeProduct['title']) . ', wholesale Himalayan salt products';
}

$metaRobots = $view === 'not-found' ? 'noindex, follow' : 'index, follow';
$ogImage = base_url('assets/images/logopakwest.webp');
$ogImageAlt = 'Pakwest International Himalayan salt products';
if ($view === 'category' && $activeCategory !== null && !empty($activeCategory['img'])) {
  $ogImage = (string) $activeCategory['img'];
  $ogImageAlt = (string) ($activeCategory['title'] ?? 'Himalayan salt category');
}
if ($view === 'product' && $activeProduct !== null && !empty($activeProduct['image'])) {
  $ogImage = (string) $activeProduct['image'];
  $ogImageAlt = (string) ($activeProduct['title'] ?? 'Himalayan salt product');
}

$schemaGraphs = [
  [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => $pageTitle,
    'description' => $pageDescription,
    'url' => $canonicalUrl
  ]
];

if ($view === 'catalog') {
  $itemListElements = [];
  $position = 1;
  foreach ($flatProducts as $product) {
    if ($position > 24) {
      break;
    }
    $itemListElements[] = [
      '@type' => 'ListItem',
      'position' => $position++,
      'url' => absolute_url(product_detail_url((string) ($product['category_slug'] ?? ''), (string) ($product['slug'] ?? ''))),
      'name' => (string) ($product['title'] ?? '')
    ];
  }
  if (!empty($itemListElements)) {
    $schemaGraphs[] = [
      '@context' => 'https://schema.org',
      '@type' => 'ItemList',
      'name' => 'Himalayan Salt Product Families',
      'itemListElement' => $itemListElements
    ];
  }
}

if ($view === 'category' && $activeCategory !== null) {
  $itemListElements = [];
  $position = 1;
  foreach ($activeCategory['products'] as $product) {
    $itemListElements[] = [
      '@type' => 'ListItem',
      'position' => $position++,
      'url' => absolute_url(product_detail_url((string) $activeCategory['slug'], (string) ($product['slug'] ?? ''))),
      'name' => (string) ($product['title'] ?? '')
    ];
  }
  if (!empty($itemListElements)) {
    $schemaGraphs[] = [
      '@context' => 'https://schema.org',
      '@type' => 'ItemList',
      'name' => (string) ($activeCategory['title'] ?? 'Category products'),
      'itemListElement' => $itemListElements
    ];
  }
}

if ($view === 'product' && $activeProduct !== null) {
  $primaryImage = (string) ($activeProduct['image'] ?? 'assets/images/logopakwest.webp');
  $variationNames = [];
  foreach (($activeProduct['variations'] ?? []) as $variation) {
    $variationNames[] = (string) ($variation['title'] ?? '');
  }
  $schemaGraphs[] = [
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $activeProduct['title'],
    'description' => $pageDescription,
    'category' => $activeCategory['title'] ?? '',
    'url' => $canonicalUrl,
    'brand' => [
      '@type' => 'Brand',
      'name' => 'Pakwest International'
    ],
    'image' => absolute_url($primaryImage),
    'additionalProperty' => [
      [
        '@type' => 'PropertyValue',
        'name' => 'Available Variations',
        'value' => implode(', ', $variationNames)
      ],
      [
        '@type' => 'PropertyValue',
        'name' => 'Order Type',
        'value' => 'Bulk Wholesale'
      ]
    ]
  ];
}

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../components/navbar.php';
?>

<main id="main-content" class="products-page" data-page-view="<?= h($view) ?>">
  <?php if ($view === 'catalog'): ?>
    <section class="products-hero products-hero--catalog">
      <div class="container mx-auto px-6 lg:px-12">
        <nav class="breadcrumbs" aria-label="Breadcrumb">
          <a href="<?= h(page_url('home')) ?>">Home</a>
          <span class="separator">/</span>
          <span class="current">Products</span>
        </nav>
        <span class="products-kicker hero-animate delay-100">Global Export Catalog</span>
        <h1 class="products-title hero-animate delay-200">Product Families</h1>
        <p class="products-copy hero-animate delay-300">Browse all categories and open each product page to view complete size and design variation ranges.</p>
      </div>
    </section>

    <section class="products-body container mx-auto px-6 lg:px-12">
      <div class="products-toolbar">
        <div class="products-toolbar-row">
          <div>
            <span class="products-toolbar-kicker">Quick Finder</span>
            <h2 class="products-toolbar-title">Find the exact product family</h2>
          </div>
          <input id="product-search" class="products-search" type="text" placeholder="Search by product name">
        </div>

        <div class="products-filters">
          <button type="button" class="products-filter is-selected" data-filter="all">All</button>
          <?php foreach ($catalogCategories as $category): ?>
            <button type="button" class="products-filter" data-filter="<?= h($category['slug']) ?>">
              <?= h($category['title']) ?>
              <span class="products-filter-count"><?= (int) ($category['product_count'] ?? 0) ?></span>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="products-grid" id="products-grid">
        <?php foreach ($flatProducts as $product): ?>
          <?php
            $imgPath = $product['image'] ?: (($product['variations'][0]['image'] ?? '') ?: '');
            $imgSrc = strpos($imgPath, 'http') === 0 ? $imgPath : base_url($imgPath);
          ?>
          <article class="product-card" data-category="<?= h($product['category_slug']) ?>">
            <a class="product-card-hit" href="<?= h(product_detail_url($product['category_slug'], $product['slug'])) ?>" aria-label="View <?= h($product['title']) ?>">
              <div class="product-card-image-wrap">
                <img class="product-card-image" src="<?= h($imgSrc) ?>" alt="<?= h($product['title']) ?>" loading="lazy" decoding="async">
              </div>
              <div class="product-card-body">
                <p class="product-card-meta"><?= h($product['category_title']) ?></p>
                <h3 class="product-card-title"><?= h($product['title']) ?></h3>
                <p class="product-card-desc"><?= h($product['summary']) ?></p>
                <div class="product-card-footer">
                  <span class="product-card-variations"><?= count($product['variations']) ?> Variations</span>
                  <span class="product-card-link product-card-link--icon" aria-hidden="true">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H9M17 7V15"/></svg>
                  </span>
                </div>
              </div>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
      <div class="products-empty is-hidden" id="products-empty">No product family matched your search or selected category.</div>
    </section>
  <?php elseif ($view === 'category' && $activeCategory !== null): ?>
    <section class="products-hero products-hero--category">
      <div class="container mx-auto px-6 lg:px-12">
        <nav class="breadcrumbs" aria-label="Breadcrumb">
          <a href="<?= h(page_url('home')) ?>">Home</a>
          <span class="separator">/</span>
          <a href="<?= h(products_url()) ?>">Products</a>
          <span class="separator">/</span>
          <span class="current"><?= h($activeCategory['title']) ?></span>
        </nav>
        <span class="products-kicker hero-animate delay-100">Category</span>
        <h1 class="products-title hero-animate delay-200"><?= h($activeCategory['title']) ?></h1>
        <p class="products-copy hero-animate delay-300"><?= h($activeCategory['desc']) ?></p>
      </div>
    </section>

    <section class="products-body container mx-auto px-6 lg:px-12">
      <div class="products-grid">
        <?php foreach ($activeCategory['products'] as $product): ?>
          <?php
            $imgPath = $product['image'] ?: (($product['variations'][0]['image'] ?? '') ?: '');
            $imgSrc = strpos($imgPath, 'http') === 0 ? $imgPath : base_url($imgPath);
          ?>
          <article class="product-card">
            <a class="product-card-hit" href="<?= h(product_detail_url($activeCategory['slug'], $product['slug'])) ?>" aria-label="View <?= h($product['title']) ?> variations">
              <div class="product-card-image-wrap">
                <img class="product-card-image" src="<?= h($imgSrc) ?>" alt="<?= h($product['title']) ?>" loading="lazy" decoding="async">
              </div>
              <div class="product-card-body">
                <p class="product-card-meta"><?= h($activeCategory['title']) ?></p>
                <h2 class="product-card-title"><?= h($product['title']) ?></h2>
                <p class="product-card-desc"><?= h($product['summary']) ?></p>
                <div class="product-card-footer">
                  <span class="product-card-variations"><?= count($product['variations']) ?> Variations</span>
                  <span class="product-card-link product-card-link--icon" aria-hidden="true">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H9M17 7V15"/></svg>
                  </span>
                </div>
              </div>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
    </section>
  <?php elseif ($view === 'product' && $activeCategory !== null && $activeProduct !== null): ?>
    <?php
      $heroImagePath = $activeProduct['image'] ?: (($activeProduct['variations'][0]['image'] ?? '') ?: '');
      $heroImageSrc = strpos($heroImagePath, 'http') === 0 ? $heroImagePath : base_url($heroImagePath);

      $variationBackgroundImageSrc = '';
      $variationImageMap = [
        'himalayan-salt-lamp' => 'HimalayanSaltLamp.webp',
        'himalayan-white-lamp' => 'HimalayanWhiteSaltLamp.webp',
        'salt-tiles' => 'SaltTiles.webp',
        'salt-massage-stones' => 'SaltMassageStones.webp',
        'light-pink-salt' => 'LightPinkSalt.webp',
        'dark-pink-salt' => 'DarkPinkSalt.webp',
        'rough-rocks' => 'RoughSaltrocks.webp',
        'horse-licking-block' => 'HorseLickingSalt.webp',
        'black-salt' => 'BlackSalt.webp',
        'natural-candles' => 'SaltCandles.webp',
      ];
      $productSlug = (string) ($activeProduct['slug'] ?? '');
      $variationDir = SITE_ROOT . '/assets/images/products/variations/';
      $candidateFiles = [];

      if (isset($variationImageMap[$productSlug])) {
        $candidateFiles[] = $variationImageMap[$productSlug];
      }

      $generatedFromTitle = preg_replace('/[^A-Za-z0-9]/', '', (string) ($activeProduct['title'] ?? ''));
      if ($generatedFromTitle !== '') {
        $candidateFiles[] = $generatedFromTitle . '.webp';
      }

      foreach ($candidateFiles as $candidateFile) {
        $candidatePath = $variationDir . $candidateFile;
        if (is_file($candidatePath)) {
          $variationBackgroundImageSrc = base_url('assets/images/products/variations/' . $candidateFile);
          break;
        }
      }

      if ($variationBackgroundImageSrc === '') {
        $variationBackgroundImageSrc = $heroImageSrc;
      }
      $productDetailImageSrc = $variationBackgroundImageSrc;
    ?>
    <section class="products-hero products-hero--product">
      <div class="container mx-auto px-6 lg:px-12">
        <nav class="breadcrumbs" aria-label="Breadcrumb">
          <a href="<?= h(page_url('home')) ?>">Home</a>
          <span class="separator">/</span>
          <a href="<?= h(products_url()) ?>">Products</a>
          <span class="separator">/</span>
          <a href="<?= h(category_products_url($activeCategory['slug'])) ?>"><?= h($activeCategory['title']) ?></a>
          <span class="separator">/</span>
          <span class="current"><?= h($activeProduct['title']) ?></span>
        </nav>
        <span class="products-kicker hero-animate delay-100"><?= h($activeCategory['title']) ?></span>
        <h1 class="products-title hero-animate delay-200"><?= h($activeProduct['title']) ?></h1>
        <p class="products-copy hero-animate delay-300">All available sizes and design variations are listed below for wholesale inquiry and custom packaging requests.</p>
      </div>
    </section>

    <section class="product-detail container mx-auto px-6 lg:px-12">
      <div class="product-detail-layout">
        <div class="product-detail-media">
          <img src="<?= h($productDetailImageSrc) ?>" alt="<?= h($activeProduct['title']) ?>" loading="lazy" decoding="async">
        </div>
        <div class="product-detail-summary has-bg" style="--overview-bg-image: url('<?= h($variationBackgroundImageSrc) ?>');">
          <h2>Product Overview</h2>
          <p><?= h($activeProduct['summary']) ?></p>
          <div class="product-detail-stats">
            <div class="product-stat">
              <span class="product-stat-label">Category</span>
              <strong><?= h($activeCategory['title']) ?></strong>
            </div>
            <div class="product-stat">
              <span class="product-stat-label">Variations</span>
              <strong><?= count($activeProduct['variations']) ?> Options</strong>
            </div>
          </div>
          <a class="product-detail-cta" href="<?= h(page_url('contact')) ?>">Request Wholesale Quote</a>
        </div>
      </div>

      <h2 class="variations-title">Available Variations</h2>
      <div class="variation-visuals" role="list" aria-label="Available variations">
        <?php foreach ($activeProduct['variations'] as $variation): ?>
          <?php
            $variationImagePath = $variation['image'] ?: $heroImagePath;
            $variationImageSrc = strpos($variationImagePath, 'http') === 0 ? $variationImagePath : base_url($variationImagePath);
          ?>
          <article class="variation-visual" role="listitem">
            <img src="<?= h($variationImageSrc) ?>" alt="<?= h($variation['title']) ?>" loading="lazy" decoding="async">
            <div class="variation-visual-name">
              <?= h($variation['title']) ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      <?php
        $relatedProducts = array_values(array_filter($activeCategory['products'], static function ($product) use ($activeProduct) {
          return (string) ($product['slug'] ?? '') !== (string) ($activeProduct['slug'] ?? '');
        }));
      ?>
      <?php if (!empty($relatedProducts)): ?>
        <div class="product-detail-summary" style="margin-top:1.5rem;">
          <h2>Related Products</h2>
          <p>Explore more from <?= h($activeCategory['title']) ?>.</p>
          <div class="product-detail-stats">
            <?php foreach (array_slice($relatedProducts, 0, 3) as $relatedProduct): ?>
              <div class="product-stat">
                <span class="product-stat-label">Product</span>
                <strong><a href="<?= h(product_detail_url($activeCategory['slug'], (string) ($relatedProduct['slug'] ?? ''))) ?>"><?= h($relatedProduct['title']) ?></a></strong>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </section>
  <?php else: ?>
    <section class="products-hero products-hero--notfound">
      <div class="container mx-auto px-6 lg:px-12">
        <h1 class="products-title">Product Not Found</h1>
        <p class="products-copy">The requested category or product does not exist.</p>
        <a class="product-detail-cta" href="<?= h(products_url()) ?>">Back to Products</a>
      </div>
    </section>
  <?php endif; ?>
</main>

<?php
include __DIR__ . '/../components/whatsapp-chat.php';
include __DIR__ . '/../components/footer.php';
include __DIR__ . '/../includes/foot.php';
?>


