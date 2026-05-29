<?php
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'Himalayan Salt Quality Standards | Pakwest International';
$pageDescription = 'Review Pakwest quality standards including 99.9% NaCl purity, Vacuum PVD refining, ISO 9001:2015 systems, and batch-level traceability.';
$pageKeywords = 'Himalayan salt quality standards, 99.9 NaCl purity, ISO 9001 Himalayan salt factory, FDA approved salt exporter Pakistan';
$currentPage = 'quality';
$forceSolid = true;
$canonicalUrl = full_url('quality');
$ogImage = base_url('assets/images/hero/pages/quality.webp');
$ogImageAlt = 'Himalayan salt quality and testing standards at Pakwest International';
$breadcrumbItems = [
  ['name' => 'Home', 'url' => page_url('home')],
  ['name' => 'Quality', 'url' => page_url('quality')]
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
  'assets/css/pages/quality.css'
];

$scripts = [
  'assets/js/components/navbar.js',
  'assets/js/components/footer.js',
  'assets/js/components/whatsapp-chat.js',
  'assets/js/pages/quality.js'
];

$purityStats = [
  ['val' => '99.9%', 'label' => 'NaCl Purity'],
  ['val' => '84+',   'label' => 'Trace Minerals'],
  ['val' => '4',     'label' => 'Stage Refining'],
  ['val' => '100%',  'label' => 'Batch Tested'],
];

$features = [
  [
    't'    => 'Multi-Stage Refining',
    'd'    => 'Removing every trace of magnesium and calcium ions across four sequential refining stages to consistently achieve 99.9% NaCl purity.',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>'
  ],
  [
    't'    => 'Batch Traceability',
    'd'    => 'Every jumbo bag carries a unique serial code traceable to its specific batch lab report, offering full transparency from mine to manifest.',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>'
  ],
  [
    't'    => 'ISO 9001:2015',
    'd'    => 'Operating under ISO 9001:2015 quality management frameworks to guarantee service consistency, process control, and continuous improvement.',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>'
  ],
  [
    't'    => 'Lab Testing',
    'd'    => 'Every production batch undergoes rigorous chemical, microbiological, and heavy-metal testing before any shipment leaves our facility.',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
  ],
  [
    't'    => 'Food-Grade Packaging',
    'd'    => 'Moisture-resistant, food-grade packaging preserves mineral integrity during global transit, from 250g retail pouches to 50kg jumbo bags.',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>'
  ],
  [
    't'    => 'Mineral Purity Analysis',
    'd'    => 'Advanced spectroscopy and titration methods verify mineral composition meets international food-grade and industrial standards before dispatch.',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>'
  ],
];

$certifications = [
  [
    'name'  => 'FDA',
    'title' => 'FDA Approved',
    'desc'  => 'Registered manufacturer meeting U.S. Food & Drug Administration standards for salt products intended for human consumption.',
    'color' => '#c5a059',
  ],
  [
    'name'  => 'FBR',
    'title' => 'FBR Certified',
    'desc'  => 'Fully registered with the Pakistan Federal Board of Revenue for NTN and GST as an authorized manufacturer and exporter.',
    'color' => '#c5a059',
  ],
  [
    'name'  => 'APCEA',
    'title' => 'APCEA Member',
    'desc'  => 'Registered member of All Pakistan Commercial Exporters Association, ensuring compliance with national export regulations.',
    'color' => '#c5a059',
  ],
  [
    'name'  => 'PGJDC',
    'title' => 'PGJDC Registered',
    'desc'  => 'Licensed by Pakistan Gems & Jewellery Development Corporation for the export of gems and mineral products internationally.',
    'color' => '#c5a059',
  ],
];

$processSteps = [
  [
    'step'  => '01',
    'title' => 'Mining & Extraction',
    'desc'  => 'Salt is carefully extracted from deep Himalayan mines in the Khewra region using traditional and modern techniques that preserve natural mineral composition.',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
  ],
  [
    'step'  => '02',
    'title' => 'Washing & Sorting',
    'desc'  => 'Raw blocks are washed to remove surface impurities, then sorted by color grade, mineral density, and intended product application.',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>',
  ],
  [
    'step'  => '03',
    'title' => 'Vacuum Crystallization',
    'desc'  => 'Our PVD process operates at elevated temperature and reduced pressure, producing uniform crystals of verified 99.9% NaCl in a closed-loop, contamination-free environment.',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
  ],
  [
    'step'  => '04',
    'title' => 'QC & Packaging',
    'desc'  => 'Final products pass lab testing, batch documentation, and are sealed in food-grade, moisture-resistant packaging ready for international shipment.',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>',
  ],
];

$standards = [
  ['label' => 'NaCl Purity',        'value' => '≥ 99.9%',    'note' => 'Industrial & food grade'],
  ['label' => 'Moisture Content',   'value' => '≤ 0.1%',     'note' => 'After vacuum refining'],
  ['label' => 'Calcium (Ca)',       'value' => '< 10 ppm',   'note' => 'Electrolysis grade'],
  ['label' => 'Magnesium (Mg)',     'value' => '< 5 ppm',    'note' => 'Pharmaceutical grade'],
  ['label' => 'Sulphate (SO₄)',     'value' => '< 20 ppm',   'note' => 'All grades'],
  ['label' => 'Heavy Metals',       'value' => 'Non-detect', 'note' => 'FDA standard'],
];

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../components/navbar.php';
?>
<main id="main-content" class="quality-page">

  <!-- Hero -->
  <div class="quality-hero">
    <div class="quality-hero-bg"></div>
    <div class="quality-hero-content container mx-auto px-6 lg:px-12">
      <span class="quality-subtitle hero-animate delay-100">Uncompromising Standards</span>
      <h1 class="quality-title hero-animate delay-200">The Science of <span>Pure.</span></h1>
      <p class="quality-desc hero-animate delay-300">
        From mine to manifest, every stage of our production is governed by rigorous quality controls,
        lab-verified purity testing, and international compliance frameworks.
      </p>
      <div class="quality-hero-ctas hero-animate delay-300">
        <a href="<?= h(page_url('contact')) ?>" class="quality-btn-primary">Request Lab Report</a>
        <a href="#process" class="quality-btn-outline">See Our Process</a>
      </div>
      <p class="quality-desc hero-animate delay-300" style="margin-top:0.9rem;">
        Explore related products:
        <a href="<?= h(product_detail_url('wellness-tiles', 'salt-tiles')) ?>">Salt Tiles</a>,
        <a href="<?= h(product_detail_url('edible-food', 'black-salt')) ?>">Black Salt</a>,
        <a href="<?= h(product_detail_url('decor-lamps', 'himalayan-salt-lamp')) ?>">Himalayan Salt Lamp</a>.
      </p>
    </div>
  </div>

  <!-- Purity Stats Bar -->
  <div class="quality-stats-bar">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="quality-stats-grid">
        <?php foreach ($purityStats as $stat): ?>
          <div class="quality-stat-item reveal-on-scroll">
            <span class="quality-stat-val"><?= h($stat['val']) ?></span>
            <span class="quality-stat-label"><?= h($stat['label']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Quality Features -->
  <div class="quality-section">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="quality-section-header">
        <span class="quality-label">Our Standards</span>
        <h2 class="quality-heading">Quality at Every Stage</h2>
        <p class="quality-subtext">Six pillars that define how we maintain consistency, purity, and trust across every shipment we send worldwide.</p>
      </div>
      <div class="quality-features-grid">
        <?php foreach ($features as $feat): ?>
          <div class="quality-feature-card reveal-on-scroll">
            <div class="quality-feature-icon-wrap">
              <?= $feat['icon'] ?>
            </div>
            <h4 class="quality-feature-title"><?= h($feat['t']) ?></h4>
            <p class="quality-feature-desc"><?= h($feat['d']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Purity Specifications Table -->
  <div class="quality-specs-section">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="quality-specs-inner reveal-on-scroll">
        <div class="quality-specs-text">
          <span class="quality-label">Technical Specifications</span>
          <h2 class="quality-heading" style="color: white;">Verified Purity <br>Parameters</h2>
          <p class="quality-vacuum-text">
            Our Vacuum PVD process delivers salt that exceeds international benchmarks for both industrial and food-grade applications.
            Each parameter below is verified per batch via third-party lab analysis.
          </p>
          <a href="<?= h(page_url('contact')) ?>" class="quality-cta">Request Full CoA</a>
        </div>
        <div class="quality-specs-table-wrap">
          <table class="quality-specs-table">
            <thead>
              <tr>
                <th>Parameter</th>
                <th>Specification</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($standards as $s): ?>
                <tr>
                  <td><?= h($s['label']) ?></td>
                  <td class="spec-value"><?= h($s['value']) ?></td>
                  <td class="spec-note"><?= h($s['note']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Vacuum Crystallization Technology -->
  <div class="quality-section">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="quality-vacuum-block reveal-on-scroll">
        <div class="quality-vacuum-badge">Core Technology</div>
        <div class="quality-vacuum-grid">
          <div class="quality-vacuum-content">
            <h2 class="quality-vacuum-title">Vacuum PVD <br>Crystallization</h2>
            <p class="quality-vacuum-text">
              Our Vacuum Physical Vapour Deposition process operates at elevated temperature and reduced pressure,
              creating perfectly uniform salt crystals with zero environmental exposure. This closed-loop system
              ensures no external contaminants enter the crystallization chamber.
            </p>
            <p class="quality-vacuum-text">
              The result is a verified 99.9% NaCl purity that exceeds international benchmarks for
              high-precision electrolysis, pharmaceutical compounding, and premium food applications.
            </p>
            <ul class="quality-vacuum-list">
              <li>Zero open-air contamination</li>
              <li>Uniform crystal structure</li>
              <li>Consistent batch-to-batch purity</li>
              <li>Preferred for electrolysis & pharma</li>
            </ul>
          </div>
          <div class="quality-vacuum-stats">
            <div class="quality-vstat-card">
              <span class="quality-vstat-val">99.9%</span>
              <span class="quality-vstat-label">NaCl Purity</span>
            </div>
            <div class="quality-vstat-card">
              <span class="quality-vstat-val">0</span>
              <span class="quality-vstat-label">Open-Air Exposure</span>
            </div>
            <div class="quality-vstat-card">
              <span class="quality-vstat-val">4</span>
              <span class="quality-vstat-label">Refining Stages</span>
            </div>
            <div class="quality-vstat-card">
              <span class="quality-vstat-val">100%</span>
              <span class="quality-vstat-label">Batch Certified</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Process -->
  <div id="process" class="quality-section quality-process-section">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="quality-section-header">
        <span class="quality-label">From Mine to Market</span>
        <h2 class="quality-heading">Our 4-Stage Process</h2>
        <p class="quality-subtext">A transparent look at the four critical stages that transform raw Himalayan salt into export-ready, lab-certified products.</p>
      </div>
      <div class="quality-process-grid">
        <?php foreach ($processSteps as $proc): ?>
          <div class="quality-process-card reveal-on-scroll">
            <div class="quality-process-icon"><?= $proc['icon'] ?></div>
            <span class="quality-process-step"><?= h($proc['step']) ?></span>
            <h4 class="quality-process-title"><?= h($proc['title']) ?></h4>
            <p class="quality-process-desc"><?= h($proc['desc']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Certifications -->
  <div class="quality-section quality-certs-section">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="quality-section-header">
        <span class="quality-label">Verified Trust</span>
        <h2 class="quality-heading">Certifications & Accreditations</h2>
        <p class="quality-subtext">Internationally recognized credentials that validate our manufacturing processes, export capabilities, and commitment to compliance.</p>
      </div>
      <div class="quality-certs-grid">
        <?php foreach ($certifications as $cert): ?>
          <div class="quality-cert-card reveal-on-scroll">
            <span class="quality-cert-badge"><?= h($cert['name']) ?></span>
            <h4 class="quality-cert-title"><?= h($cert['title']) ?></h4>
            <p class="quality-cert-desc"><?= h($cert['desc']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- CTA -->
  <div class="quality-cta-section">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="quality-cta-inner reveal-on-scroll">
        <div class="quality-cta-text">
          <span class="quality-label" style="color: #c5a059;">Ready to Verify?</span>
          <h2 class="quality-cta-heading">Request a Full Lab Analysis Report</h2>
          <p class="quality-cta-desc">Our trade specialists will provide a Certificate of Analysis, product specifications, and sample arrangements within 24 hours.</p>
        </div>
        <div class="quality-cta-actions">
          <a href="<?= h(page_url('contact')) ?>" class="quality-btn-primary">Contact Trade Desk</a>
          <a href="mailto:contact@pakwestinternational.com" class="quality-btn-ghost">Email Directly</a>
        </div>
      </div>
    </div>
  </div>

</main>

<?php
include __DIR__ . '/../components/whatsapp-chat.php';
include __DIR__ . '/../components/footer.php';
include __DIR__ . '/../includes/foot.php';
?>


