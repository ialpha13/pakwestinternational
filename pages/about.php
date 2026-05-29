<?php
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'About Pakwest International | Himalayan Salt Exporter';
$pageDescription = 'Learn about Pakwest International, a Pakistan-based Himalayan salt manufacturer and exporter serving wholesale buyers since 2008.';
$pageKeywords = 'about Himalayan salt exporter, Pakistan salt manufacturer, bulk pink salt supplier company, FDA approved Himalayan salt factory';
$currentPage = 'about';
$forceSolid = true;
$canonicalUrl = full_url('about');
$ogImage = base_url('assets/images/hero/pages/about.webp');
$ogImageAlt = 'Pakwest International facility and Himalayan salt operations';
$breadcrumbItems = [
  ['name' => 'Home', 'url' => page_url('home')],
  ['name' => 'About', 'url' => page_url('about')]
];

$schemaGraphs = [
  [
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => $pageTitle,
    'description' => $pageDescription,
    'url' => $canonicalUrl
  ]
];

$styles = [
  'assets/css/components/navbar.css',
  'assets/css/components/footer.css',
  'assets/css/components/whatsapp-chat.css',
  'assets/css/pages/about.css'
];

$scripts = [
  'assets/js/components/navbar.js',
  'assets/js/components/footer.js',
  'assets/js/components/whatsapp-chat.js',
  'assets/js/pages/about.js'
];

$stats = [
  ['val' => '2008',  'label' => 'Established'],
  ['val' => '25+',   'label' => 'Countries Served'],
  ['val' => '34',    'label' => 'Product Varieties'],
  ['val' => '100%',  'label' => 'Export Focused'],
];

$values = [
  [
    'title' => 'Uncompromising Purity',
    'desc'  => 'Every product is lab-tested and batch-certified before shipment. Our Vacuum PVD refining achieves 99.9% NaCl purity, exceeding international benchmarks.',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
  ],
  [
    'title' => 'Competitive Pricing',
    'desc'  => 'Direct manufacturer with no middlemen. We offer the most competitive wholesale rates on all Himalayan salt products for bulk and recurring orders worldwide.',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
  ],
  [
    'title' => 'Custom Packaging & OEM',
    'desc'  => 'Full private-label and OEM services available, from 250g retail pouches to 50kg jumbo bags with customized branding, sizing, and materials to match your market.',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>',
  ],
  [
    'title' => 'Reliable Global Logistics',
    'desc'  => 'Shipping from Karachi Port and Port Qasim to 25+ countries, with full documentation, tracking, and compliance support delivered on time, every time.',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
  ],
];

$companyDetails = [
  ['label' => 'Business Type',     'value' => 'Manufacturer & Exporter'],
  ['label' => 'Year Established',  'value' => '2008'],
  ['label' => 'Main Products',     'value' => 'Himalayan Salt'],
  ['label' => 'Total Employees',   'value' => '11-50 People'],
  ['label' => 'Factory Size',      'value' => 'Below 1,000 sqm'],
  ['label' => 'Ports of Shipment', 'value' => 'Karachi & Port Qasim'],
];

$certifications = [
  ['abbr' => 'FDA',   'title' => 'FDA Approved',      'desc' => 'Registered manufacturer meeting U.S. Food & Drug Administration standards for salt products intended for human consumption.'],
  ['abbr' => 'FBR',   'title' => 'FBR Certified',     'desc' => 'Fully registered with Pakistan Federal Board of Revenue for NTN and GST as an authorized manufacturer and exporter.'],
  ['abbr' => 'APCEA', 'title' => 'APCEA Member',      'desc' => 'Registered member of All Pakistan Commercial Exporters Association, ensuring compliance with national export regulations.'],
  ['abbr' => 'PGJDC', 'title' => 'PGJDC Registered',  'desc' => 'Licensed by Pakistan Gems & Jewellery Development Corporation for the export of gems and mineral products.'],
];

$products = [
  'Himalayan Salt Lamps (Pink & White)',
  'Salt Tiles & Cooking Slabs',
  'Edible Salts (Light Pink, Dark Pink, Black)',
  'Salt Massage Stones & Deodorant Bars',
  'Horse & Animal Licking Blocks',
  'Natural Salt Candle Holders',
  'Industrial Vacuum-Refined Salt',
  'Custom OEM & Private Label',
];

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../components/navbar.php';
?>
<main id="main-content" class="about-page">

  <!-- Hero -->
  <section class="about-hero">
    <div class="about-hero-bg-wrapper">
      <img src="<?= h(base_url('assets/images/hero/pages/about.webp')) ?>" class="about-hero-bg" alt="Pakwest Salt Facility" loading="eager" fetchpriority="high" decoding="async">
      <div class="about-hero-overlay"></div>
    </div>
    <div class="about-hero-content container mx-auto px-6 lg:px-12">
      <span class="about-subtitle hero-animate delay-100">Est. 2008 · Karachi, Pakistan</span>
      <h1 class="about-title hero-animate delay-200">Heritage <br><span>Refined.</span></h1>
      <p class="about-hero-desc hero-animate delay-300">
        A decade-and-a-half of manufacturing excellence, delivering the world's finest Himalayan salt to wholesalers, retailers, and industries across 25+ countries.
      </p>
    </div>
  </section>

  <!-- Stats Bar -->
  <div class="about-stats-bar">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="about-stats-grid">
        <?php foreach ($stats as $stat): ?>
          <div class="about-stat-item reveal-on-scroll">
            <span class="about-stat-val"><?= h($stat['val']) ?></span>
            <span class="about-stat-label"><?= h($stat['label']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Who We Are -->
  <section class="about-section">
    <div class="about-container">
      <div class="about-intro-grid">
        <div class="reveal-on-scroll">
          <span class="about-label">Who We Are</span>
          <h2 class="about-heading">Pakistan's Premier <br><span>Salt Exporter.</span></h2>
          <p class="about-text">
            Pakwest International is a dedicated Himalayan salt manufacturer and exporter, serving large wholesalers and industries in the USA, Europe, and across the globe. We are an export-focused company built on one principle: delivering the highest quality salt at the most competitive rates.
          </p>
          <p class="about-text">
            We offer international-standard packing, customized orders, and full OEM capability. As a direct manufacturer, we eliminate intermediaries and pass the savings directly to our trade partners.
          </p>
          <div class="about-intro-ctas">
            <a href="<?= h(page_url('contact')) ?>" class="about-btn-primary">Get a Quote</a>
            <a href="<?= h(page_url('quality')) ?>" class="about-btn-outline">Our Quality Standards</a>
          </div>
          <p class="about-text">
            Popular products:
            <a href="<?= h(product_detail_url('decor-lamps', 'himalayan-salt-lamp')) ?>">Himalayan Salt Lamp</a>,
            <a href="<?= h(product_detail_url('wellness-tiles', 'salt-tiles')) ?>">Salt Tiles</a>,
            <a href="<?= h(product_detail_url('edible-food', 'light-pink-salt')) ?>">Light Pink Salt</a>.
          </p>
        </div>
        <div class="reveal-on-scroll delay-200">
          <div class="about-img-wrapper">
            <img src="<?= h(base_url('assets/images/hero/p5.webp')) ?>" alt="Pakwest Salt Production Facility" loading="lazy" decoding="async">
            <div class="about-img-badge">
              <span class="about-img-badge-val">99.9%</span>
              <span class="about-img-badge-label">NaCl Purity</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Values -->
  <section class="about-values-section">
    <div class="about-container">
      <div class="about-section-header reveal-on-scroll">
        <span class="about-label">What Drives Us</span>
        <h2 class="about-heading">Why Partners Choose <span>Pakwest.</span></h2>
        <p class="about-subtext">Four pillars that shape every partnership, every shipment, and every product we deliver worldwide.</p>
      </div>
      <div class="about-values-grid">
        <?php foreach ($values as $val): ?>
          <div class="about-value-card reveal-on-scroll">
            <div class="about-value-icon"><?= $val['icon'] ?></div>
            <h3 class="about-value-title"><?= h($val['title']) ?></h3>
            <p class="about-value-desc"><?= h($val['desc']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Company Details -->
  <section class="about-details-section">
    <div class="about-container">
      <div class="about-section-header reveal-on-scroll">
        <span class="about-label">Operational Overview</span>
        <h2 class="about-heading">Company <span>Profile.</span></h2>
        <p class="about-subtext">A transparent look at our operational scale, giving you a clear picture of our manufacturing capabilities and trade credentials.</p>
      </div>
      <div class="about-details-grid">
        <?php foreach ($companyDetails as $detail): ?>
          <div class="about-detail-card reveal-on-scroll">
            <span class="about-detail-label"><?= h($detail['label']) ?></span>
            <span class="about-detail-value"><?= h($detail['value']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Certifications -->
  <section class="about-certs-section">
    <div class="about-container">
      <div class="about-section-header reveal-on-scroll">
        <span class="about-label">Our Credentials</span>
        <h2 class="about-heading">Accreditations & <span>Memberships.</span></h2>
        <p class="about-subtext">Internationally recognized certifications that validate our manufacturing quality, export compliance, and trade standing.</p>
      </div>
      <div class="about-certs-grid">
        <?php foreach ($certifications as $cert): ?>
          <div class="about-cert-card reveal-on-scroll">
            <span class="about-cert-badge"><?= h($cert['abbr']) ?></span>
            <h4 class="about-cert-title"><?= h($cert['title']) ?></h4>
            <p class="about-cert-desc"><?= h($cert['desc']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Product Portfolio -->
  <section class="about-section about-portfolio-section">
    <div class="about-container">
      <div class="about-portfolio-inner reveal-on-scroll">
        <div class="about-portfolio-text">
          <span class="about-label" style="color: #c5a059;">Product Portfolio</span>
          <h2 class="about-portfolio-title">Crafted for <br>Excellence.</h2>
          <p class="about-portfolio-desc">
            From raw extraction to finished retail-ready goods, we specialize in high-volume production across the full Himalayan salt product range, all available with custom OEM packaging.
          </p>
          <a href="<?= h(page_url('products')) ?>" class="about-btn-primary">View Full Catalog</a>
        </div>
        <ul class="about-product-list">
          <?php foreach ($products as $product): ?>
            <li class="about-product-item">
              <span class="about-product-bullet"></span>
              <?= h($product) ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="about-cta-section">
    <div class="about-container">
      <div class="about-cta-inner reveal-on-scroll">
        <div class="about-cta-text">
          <span class="about-label" style="color: #c5a059;">Ready to Partner?</span>
          <h2 class="about-cta-heading">Start a Conversation with Our Trade Desk</h2>
          <p class="about-cta-desc">Join global wholesalers and industrial buyers who depend on Pakwest for consistent quality, competitive pricing, and reliable delivery.</p>
        </div>
        <div class="about-cta-actions">
          <a href="<?= h(page_url('contact')) ?>" class="about-btn-primary">Contact Us</a>
          <a href="<?= h(page_url('products')) ?>" class="about-btn-ghost">Browse Products</a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php
include __DIR__ . '/../components/whatsapp-chat.php';
include __DIR__ . '/../components/footer.php';
include __DIR__ . '/../includes/foot.php';
?>
