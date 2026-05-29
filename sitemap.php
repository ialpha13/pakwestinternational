<?php
require_once __DIR__ . '/includes/functions.php';

header('Content-Type: application/xml; charset=UTF-8');

$pageDate = static function (string $relativePath): string {
    $fullPath = SITE_ROOT . '/' . ltrim($relativePath, '/');
    $mtime = is_file($fullPath) ? (int) filemtime($fullPath) : time();
    return gmdate('Y-m-d', $mtime);
};

$dataDate = static function (): string {
    $paths = [
        SITE_ROOT . '/assets/data/products.json',
        SITE_ROOT . '/assets/data/categories.json',
    ];
    $latest = 0;
    foreach ($paths as $path) {
        if (is_file($path)) {
            $latest = max($latest, (int) filemtime($path));
        }
    }
    return gmdate('Y-m-d', $latest > 0 ? $latest : time());
};

$catalogLastmod = $dataDate();

$urls = [
    ['loc' => absolute_url(''), 'changefreq' => 'weekly', 'priority' => '1.0', 'lastmod' => $pageDate('pages/home.php')],
    ['loc' => absolute_url('about'), 'changefreq' => 'monthly', 'priority' => '0.8', 'lastmod' => $pageDate('pages/about.php')],
    ['loc' => absolute_url('categories'), 'changefreq' => 'weekly', 'priority' => '0.9', 'lastmod' => $pageDate('pages/categories.php')],
    ['loc' => absolute_url('products'), 'changefreq' => 'weekly', 'priority' => '0.9', 'lastmod' => $pageDate('pages/products.php')],
    ['loc' => absolute_url('quality'), 'changefreq' => 'monthly', 'priority' => '0.8', 'lastmod' => $pageDate('pages/quality.php')],
    ['loc' => absolute_url('contact'), 'changefreq' => 'weekly', 'priority' => '0.9', 'lastmod' => $pageDate('pages/contact.php')],
];

foreach (catalog_categories() as $category) {
    $categorySlug = (string) ($category['slug'] ?? '');
    if ($categorySlug === '') {
        continue;
    }
    $urls[] = [
        'loc' => absolute_url(category_products_url($categorySlug)),
        'changefreq' => 'weekly',
        'priority' => '0.8',
        'lastmod' => $catalogLastmod,
    ];

    foreach (($category['products'] ?? []) as $product) {
        $productSlug = (string) ($product['slug'] ?? '');
        if ($productSlug === '') {
            continue;
        }
        $urls[] = [
            'loc' => absolute_url(product_detail_url($categorySlug, $productSlug)),
            'changefreq' => 'weekly',
            'priority' => '0.7',
            'lastmod' => $catalogLastmod,
        ];
    }
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
foreach ($urls as $url) {
    echo '  <url>' . PHP_EOL;
    echo '    <loc>' . h($url['loc']) . '</loc>' . PHP_EOL;
    echo '    <changefreq>' . h($url['changefreq']) . '</changefreq>' . PHP_EOL;
    echo '    <priority>' . h($url['priority']) . '</priority>' . PHP_EOL;
    if (!empty($url['lastmod'])) {
        echo '    <lastmod>' . h((string) $url['lastmod']) . '</lastmod>' . PHP_EOL;
    }
    echo '  </url>' . PHP_EOL;
}
echo '</urlset>' . PHP_EOL;
