<?php
require_once __DIR__ . '/functions.php';

$pageTitle = $pageTitle ?? 'Pakwest International | Himalayan Salt Manufacturer & Global Exporter';
$pageDescription = $pageDescription ?? 'FDA approved manufacturer and exporter of premium Himalayan salt products: lamps, tiles, edible salts, and animal licking blocks. Serving USA, Europe, and worldwide.';
$pageKeywords = $pageKeywords ?? 'Himalayan salt exporter, industrial salt manufacturer, pink salt supplier, Pakistan salt exporter';
$styles = $styles ?? [];
$currentPage = $currentPage ?? 'home';
$ogImage = $ogImage ?? base_url('assets/images/logopakwest.webp');
$ogType = $ogType ?? 'website';
$metaRobots = $metaRobots ?? 'index, follow';
$headExtras = $headExtras ?? '';
$bodyClass = trim('bg-white text-gray-900 overflow-x-hidden page-' . preg_replace('/[^a-z0-9_-]/i', '', (string) $currentPage));
$canonicalUrl = $canonicalUrl ?? full_url($currentPage);
$twitterCard = $twitterCard ?? 'summary_large_image';
$ogImageAlt = $ogImageAlt ?? 'Pakwest International Himalayan salt products for global wholesale export';
$schemaGraphs = $schemaGraphs ?? [];
$breadcrumbItems = $breadcrumbItems ?? [];

$absoluteCanonicalUrl = preg_match('#^https?://#i', $canonicalUrl) ? $canonicalUrl : absolute_url($canonicalUrl);
$absoluteOgImage = absolute_url($ogImage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($pageTitle) ?></title>
    <meta name="description" content="<?= h($pageDescription) ?>">
    <meta name="keywords" content="<?= h($pageKeywords) ?>">
    <meta name="theme-color" content="#0f172a">
    <meta name="author" content="Pakwest International">
    <meta name="robots" content="<?= h($metaRobots) ?>">
    <link rel="canonical" href="<?= h($absoluteCanonicalUrl) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="<?= h($ogType) ?>">
    <meta property="og:title" content="<?= h($pageTitle) ?>">
    <meta property="og:description" content="<?= h($pageDescription) ?>">
    <meta property="og:url" content="<?= h($absoluteCanonicalUrl) ?>">
    <meta property="og:image" content="<?= h($absoluteOgImage) ?>">
    <meta property="og:image:alt" content="<?= h($ogImageAlt) ?>">
    <meta property="og:site_name" content="Pakwest International">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="<?= h($twitterCard) ?>">
    <meta name="twitter:title" content="<?= h($pageTitle) ?>">
    <meta name="twitter:description" content="<?= h($pageDescription) ?>">
    <meta name="twitter:image" content="<?= h($absoluteOgImage) ?>">
    <meta name="twitter:image:alt" content="<?= h($ogImageAlt) ?>">
    <link rel="alternate" hreflang="en" href="<?= h($absoluteCanonicalUrl) ?>">
    <link rel="alternate" hreflang="x-default" href="<?= h($absoluteCanonicalUrl) ?>">

    <meta name="base-url" content="<?= h(base_url('')) ?>">
    <base href="<?= h(base_url('')) ?>">

    <!-- Favicons -->
    <!-- Favicons -->
    <?php $faviconVersion = 'v=3'; ?>
    <link rel="shortcut icon" href="<?= h(absolute_url('favicon.ico?' . $faviconVersion)) ?>" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="<?= h(absolute_url('favicon.ico?' . $faviconVersion)) ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= h(absolute_url('assets/images/favicons/favicon-16x16.png?' . $faviconVersion)) ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= h(absolute_url('assets/images/favicons/favicon-32x32.png?' . $faviconVersion)) ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?= h(absolute_url('assets/images/favicons/favicon-48x48.png?' . $faviconVersion)) ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= h(absolute_url('assets/images/favicons/favicon-96x96.png?' . $faviconVersion)) ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= h(base_url('assets/images/favicons/apple-touch-icon-180x180.png')) ?>">
    <link rel="manifest" href="<?= h(base_url('assets/images/favicons/site.webmanifest')) ?>">
    <meta name="msapplication-config" content="<?= h(base_url('assets/images/favicons/browserconfig.xml')) ?>">
    <meta name="msapplication-TileColor" content="#0f172a">


    <!-- Fonts & CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="<?= h(base_url('assets/css/global.css')) ?>">
<?php foreach ($styles as $style): ?>
    <link rel="stylesheet" href="<?= h(base_url($style)) ?>">
<?php endforeach; ?>
<?php if ($headExtras !== ''): ?>
    <?= $headExtras . PHP_EOL ?>
<?php endif; ?>

    <!-- Structured Data -->
<?php
$baseSiteUrl = absolute_url('');
$baseLogoUrl = absolute_url('assets/images/logopakwest.webp');
$defaultSchemas = [
    [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Pakwest International',
        'description' => 'FDA approved manufacturer and exporter of premium Himalayan salt products.',
        'url' => $baseSiteUrl,
        'logo' => $baseLogoUrl,
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'email' => 'contact@pakwestinternational.com',
            'contactType' => 'sales',
            'telephone' => '+923335036125'
        ],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Karachi Port Trust Area, Suite 405 Business Hub',
            'addressLocality' => 'Karachi',
            'addressCountry' => 'PK'
        ],
        'sameAs' => [
            'https://wa.me/923335036125',
            'https://goo.gl/maps/KarachiPortTrust'
        ]
    ],
    [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'Pakwest International',
        'url' => $baseSiteUrl,
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => absolute_url('products?search={search_term_string}'),
            'query-input' => 'required name=search_term_string'
        ]
    ]
];
$allSchemas = array_merge($defaultSchemas, $schemaGraphs);

if (!empty($breadcrumbItems)) {
    $position = 1;
    $itemListElement = [];
    foreach ($breadcrumbItems as $item) {
        $name = trim((string) ($item['name'] ?? ''));
        if ($name === '') {
            continue;
        }
        $itemUrl = (string) ($item['url'] ?? '');
        $itemListElement[] = [
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => $name,
            'item' => $itemUrl !== '' ? absolute_url($itemUrl) : $absoluteCanonicalUrl,
        ];
    }
    if (!empty($itemListElement)) {
        $allSchemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemListElement,
        ];
    }
}

foreach ($allSchemas as $schema) {
    $script = json_ld_script($schema);
    if ($script !== '') {
        echo '    ' . $script . PHP_EOL;
    }
}
?>
</head>
<body class="<?= h($bodyClass) ?>">
    <a class="skip-link" href="#main-content">Skip to content</a>
