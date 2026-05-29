<?php


$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? ''));
$siteRoot = str_replace('\\', '/', realpath(__DIR__ . '/..'));

$baseUrl = '/';
if ($docRoot && $siteRoot && strpos($siteRoot, $docRoot) === 0) {
    $baseUrl = '/' . trim(str_replace($docRoot, '', $siteRoot), '/');
}
if ($baseUrl === '') {
    $baseUrl = '/';
}

define('SITE_ROOT', $siteRoot);
define('BASE_URL', rtrim($baseUrl, '/') . '/');

define('APP_NAME', 'Pakwest International');
define('USE_PRETTY_URLS', true);

define('CONTACT_TO_EMAIL', getenv('CONTACT_TO_EMAIL') ?: 'contact@pakwestinternational.com');
define('CONTACT_FROM_EMAIL', getenv('CONTACT_FROM_EMAIL') ?: '');
