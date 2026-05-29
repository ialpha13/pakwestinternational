<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=UTF-8');

$raw = file_get_contents('php://input');
$payload = json_decode($raw ?? '', true);
$message = '';
if (is_array($payload) && isset($payload['message'])) {
    $message = trim((string) $payload['message']);
}

$lower = strtolower($message);
$reply = 'Thank you for contacting Pakwest International. Please share your required product, quantity, and destination so we can prepare a quote. You can also email us at contact@pakwestinternational.com';

if ($lower !== '') {
    if (strpos($lower, 'price') !== false || strpos($lower, 'quote') !== false || strpos($lower, 'cost') !== false || strpos($lower, 'rate') !== false) {
        $reply = 'For pricing, please share the product type (e.g. salt lamps, edible salt, tiles), required quantity, packing preference (25kg/50kg/jumbo bags), and destination port. Our rates are highly competitive for bulk orders.';
    } elseif (strpos($lower, 'moq') !== false || strpos($lower, 'minimum') !== false || strpos($lower, 'order') !== false) {
        $reply = 'Our standard MOQ is one 20ft container (~25 MT) for bulk orders. For smaller trial orders, we offer LCL (Less than Container Load) options. The exact MOQ varies by product — tell us what you need and we\'ll work out the best arrangement.';
    } elseif (strpos($lower, 'ship') !== false || strpos($lower, 'port') !== false || strpos($lower, 'delivery') !== false || strpos($lower, 'freight') !== false) {
        $reply = 'We ship from Karachi Port (KGPT) and Port Qasim (KPCT) with FOB and CFR terms available. Typical lead time is 15-25 days depending on destination. Share your port and we\'ll get you a freight estimate.';
    } elseif (strpos($lower, 'sample') !== false) {
        $reply = 'We can arrange product samples for evaluation. Please share the specific products you\'re interested in and your shipping address. Sample costs are typically adjusted against the first bulk order.';
    } elseif (strpos($lower, 'lamp') !== false) {
        $reply = 'We manufacture Himalayan salt lamps in all sizes from 1 kg to 10+ kg, in both pink and rare white crystal varieties. All lamps come with wooden base and UL-certified electrical fitting. Available for bulk export.';
    } elseif (strpos($lower, 'tile') !== false || strpos($lower, 'brick') !== false || strpos($lower, 'slab') !== false) {
        $reply = 'We produce salt tiles and bricks in multiple dimensions — 20x10cm, 20x20cm, and 30x20cm with thickness from 2cm to 5cm. Ideal for cooking, spa walls, and halotherapy rooms. Custom sizes available for large orders.';
    } elseif (strpos($lower, 'edible') !== false || strpos($lower, 'pink salt') !== false || strpos($lower, 'food') !== false || strpos($lower, 'cooking') !== false) {
        $reply = 'Our edible salt range includes Light Pink and Dark Pink Himalayan salt in coarse (3-5mm), medium (1-2mm), and fine (0.1-0.2mm) grades. Also available: Black Salt (Kala Namak) for specialty cuisine. All food-grade and FDA approved.';
    } elseif (strpos($lower, 'horse') !== false || strpos($lower, 'lick') !== false || strpos($lower, 'animal') !== false || strpos($lower, 'livestock') !== false) {
        $reply = 'Our animal licking salt blocks are 100% natural Himalayan rock salt with 84+ trace minerals. Available in 1-2 kg, 2-3 kg, 3-4 kg, and 4-5 kg sizes. With or without rope. Perfect for horses, cattle, and goats.';
    } elseif (strpos($lower, 'certif') !== false || strpos($lower, 'fda') !== false || strpos($lower, 'iso') !== false || strpos($lower, 'halal') !== false) {
        $reply = 'Pakwest International is FDA Approved, FBR Certified (NTN & GST), APCEA member, PGJDC registered, and operates under ISO 9001:2015 quality frameworks. We can provide certificates upon request.';
    } elseif (strpos($lower, 'hello') !== false || strpos($lower, 'hi') !== false || strpos($lower, 'hey') !== false) {
        $reply = 'Hello! Welcome to Pakwest International. How can we help you today? You can ask about our products, pricing, MOQ, shipping, or samples.';
    } elseif (strpos($lower, 'payment') !== false || strpos($lower, 'pay') !== false) {
        $reply = 'We accept Wire Transfer (T/T), Letter of Credit (L/C), and Western Union. Payment terms can be negotiated based on order volume and business relationship. Typically 30% advance, 70% against B/L.';
    } elseif (strpos($lower, 'custom') !== false || strpos($lower, 'private label') !== false || strpos($lower, 'oem') !== false || strpos($lower, 'packaging') !== false) {
        $reply = 'Yes, we offer full OEM/private labeling services. We can customize packaging from 250g retail pouches to 50kg industrial bags with your branding. Minimum order for custom packaging is typically 1 container.';
    }
}

echo json_encode([
    'ok' => true,
    'reply' => $reply
]);
