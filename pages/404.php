<?php
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'Page Not Found | Pakwest International';
$pageDescription = 'The page you are looking for could not be found.';
$pageKeywords = '404, page not found';
$currentPage = '';
$forceSolid = true;
$metaRobots = 'noindex, follow';
$canonicalUrl = current_url();

$styles = [
  'assets/css/components/navbar.css',
  'assets/css/components/footer.css',
  'assets/css/components/whatsapp-chat.css'
];

$scripts = [
  'assets/js/components/navbar.js',
  'assets/js/components/footer.js',
  'assets/js/components/whatsapp-chat.js'
];

http_response_code(404);

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../components/navbar.php';
?>

<main id="main-content" class="min-h-[70vh] flex items-center justify-center px-6" style="padding-top: 8rem; padding-bottom: 6rem;">
  <div class="text-center max-w-lg">
    <span class="text-[11px] font-black uppercase tracking-[0.5em] text-[#c5a059] mb-6 block">Error 404</span>
    <h1 class="text-6xl md:text-8xl font-serif font-black text-[#0f172a] mb-6 leading-none">
      Page <span class="text-[#c5a059]">Lost.</span>
    </h1>
    <p class="text-lg text-gray-500 mb-10 leading-relaxed">
      The page you're looking for doesn't exist or has been moved. Let's get you back on track.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="<?= h(page_url('home')) ?>" class="px-8 py-4 bg-[#c5a059] text-white font-black text-[10px] uppercase tracking-widest hover:bg-[#0f172a] transition-all">
        Back to Home
      </a>
      <a href="<?= h(page_url('products')) ?>" class="px-8 py-4 border border-gray-200 text-[#0f172a] font-black text-[10px] uppercase tracking-widest hover:border-[#c5a059] hover:text-[#c5a059] transition-all">
        Browse Products
      </a>
    </div>
  </div>
</main>

<?php
include __DIR__ . '/../components/whatsapp-chat.php';
include __DIR__ . '/../components/footer.php';
include __DIR__ . '/../includes/foot.php';
?>

