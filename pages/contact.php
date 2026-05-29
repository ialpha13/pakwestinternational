<?php
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'Contact Himalayan Salt Export Sales Team | Pakwest International';
$pageDescription = 'Request a bulk quote, sample, or private label consultation from Pakwest International for Himalayan salt export and wholesale supply.';
$pageKeywords = 'contact Himalayan salt exporter, bulk pink salt quote, private label Himalayan salt supplier, Pakistan wholesale salt contact';
$currentPage = 'contact';
$forceSolid = true;
$canonicalUrl = full_url('contact');
$ogImage = base_url('assets/images/hero/pages/products.webp');
$ogImageAlt = 'Contact Pakwest International for wholesale Himalayan salt inquiries';
$breadcrumbItems = [
  ['name' => 'Home', 'url' => page_url('home')],
  ['name' => 'Contact', 'url' => page_url('contact')]
];

$styles = [
  'assets/css/components/navbar.css',
  'assets/css/components/footer.css',
  'assets/css/components/whatsapp-chat.css',
  'assets/css/pages/contact.css'
];

$scripts = [
  'assets/js/components/navbar.js',
  'assets/js/components/footer.js',
  'assets/js/components/whatsapp-chat.js',
  'assets/js/pages/contact.js'
];

$faqs = [
  [
    'q' => 'What is the minimum order quantity (MOQ)?',
    'a' => 'For industrial grades, our MOQ is typically one 20ft container (approx. 25 MT). For retail packs and smaller trial orders, we can discuss LCL (Less than Container Load) options depending on the destination.'
  ],
  [
    'q' => 'Do you offer private labeling (OEM)?',
    'a' => 'Yes, we provide full OEM services. We can customize packaging materials, branding, and sizes, from 250g retail pouches to 50kg jumbo bags, according to your specifications.'
  ],
  [
    'q' => 'Which ports do you ship from?',
    'a' => 'We primarily ship from Karachi Port (KGPT) and Port Qasim (KPCT). These deep-water ports allow us to efficiently connect with major shipping lines for global delivery.'
  ],
  [
    'q' => 'Can I request product samples?',
    'a' => 'Absolutely. We can arrange samples for lab analysis or physical evaluation. Please provide your courier account details and specific grade requirements in the contact form.'
  ],
  [
    'q' => 'What payment methods do you accept?',
    'a' => 'We accept Wire Transfer (T/T), Letter of Credit (L/C), and Western Union. Payment terms are negotiable based on order volume and the nature of the relationship.'
  ],
  [
    'q' => 'What certifications do you hold?',
    'a' => 'We are FDA Approved, FBR Certified (NTN & GST), APCEA member, PGJDC registered for gems and mineral export, and operate under ISO 9001:2015 quality management frameworks.'
  ],
];

$formValues = [
  'fullName' => '',
  'email' => '',
  'phone' => '',
  'inquiryType' => '',
  'productInterest' => '',
  'quantity' => '',
  'destinationPort' => '',
  'message' => '',
];
$formErrors = [];
$formSuccess = false;
$formFeedback = '';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
  $formValues = [
    'fullName' => trim((string) ($_POST['fullName'] ?? '')),
    'email' => trim((string) ($_POST['email'] ?? '')),
    'phone' => trim((string) ($_POST['phone'] ?? '')),
    'inquiryType' => trim((string) ($_POST['inquiryType'] ?? '')),
    'productInterest' => trim((string) ($_POST['productInterest'] ?? '')),
    'quantity' => trim((string) ($_POST['quantity'] ?? '')),
    'destinationPort' => trim((string) ($_POST['destinationPort'] ?? '')),
    'message' => trim((string) ($_POST['message'] ?? '')),
  ];

  $honeypot = trim((string) ($_POST['website'] ?? ''));
  if ($honeypot !== '') {
    $formErrors['general'] = 'Unable to submit right now. Please try again.';
  }

  if ($formValues['fullName'] === '') {
    $formErrors['fullName'] = 'Full name is required.';
  } elseif (mb_strlen($formValues['fullName']) < 2) {
    $formErrors['fullName'] = 'Please enter a valid full name.';
  }

  if ($formValues['email'] === '') {
    $formErrors['email'] = 'Email is required.';
  } elseif (!filter_var($formValues['email'], FILTER_VALIDATE_EMAIL)) {
    $formErrors['email'] = 'Please enter a valid email address.';
  }

  if ($formValues['phone'] === '') {
    $formErrors['phone'] = 'Phone / WhatsApp is required.';
  }

  if ($formValues['inquiryType'] === '') {
    $formErrors['inquiryType'] = 'Please select inquiry type.';
  }

  if ($formValues['quantity'] === '') {
    $formErrors['quantity'] = 'Please enter estimated quantity.';
  }

  if ($formValues['destinationPort'] === '') {
    $formErrors['destinationPort'] = 'Destination country/port is required.';
  }

  if ($formValues['productInterest'] === '') {
    $formErrors['productInterest'] = 'Please mention product interest.';
  }

  if ($formValues['message'] === '') {
    $formErrors['message'] = 'Message is required.';
  } elseif (mb_strlen($formValues['message']) < 15) {
    $formErrors['message'] = 'Please provide a bit more detail (minimum 15 characters).';
  }

  if (empty($formErrors)) {
    $to = CONTACT_TO_EMAIL;
    $mailSubjectRaw = 'Pakwest Website Inquiry: ' . $formValues['inquiryType'];
    $mailSubject = str_replace(["\r", "\n"], ' ', $mailSubjectRaw);
    $host = (string) ($_SERVER['HTTP_HOST'] ?? 'pakwestinternational.com');
    $host = strtolower(preg_replace('/:\d+$/', '', $host));
    $fromDomain = preg_match('/^[a-z0-9.-]+\.[a-z]{2,}$/i', $host) ? $host : 'pakwestinternational.com';
    $fromEmail = CONTACT_FROM_EMAIL !== '' ? CONTACT_FROM_EMAIL : ('no-reply@' . $fromDomain);
    $mailBody =
      "Name: {$formValues['fullName']}\n" .
      "Email: {$formValues['email']}\n" .
      "Phone / WhatsApp: {$formValues['phone']}\n" .
      "Inquiry Type: {$formValues['inquiryType']}\n" .
      "Product Interest: {$formValues['productInterest']}\n" .
      "Estimated Quantity: {$formValues['quantity']}\n" .
      "Destination Port/Country: {$formValues['destinationPort']}\n" .
      "\n" .
      "Message:\n{$formValues['message']}\n";
    $headers = [
      'From: Pakwest Website <' . $fromEmail . '>',
      'Reply-To: ' . $formValues['email'],
      'MIME-Version: 1.0',
      'Content-Type: text/plain; charset=UTF-8',
      'X-Mailer: PHP/' . phpversion()
    ];

    $mailSent = @mail($to, $mailSubject, $mailBody, implode("\r\n", $headers));

    if (!$mailSent) {
      $logDir = SITE_ROOT . '/tmp';
      if (!is_dir($logDir)) {
        @mkdir($logDir, 0775, true);
      }
      $logLine = '[' . date('Y-m-d H:i:s') . '] ' . str_replace(["\r", "\n"], ' ', $mailBody) . PHP_EOL;
      @file_put_contents($logDir . '/contact-inquiries.log', $logLine, FILE_APPEND);
    }

    $formSuccess = true;
    $formFeedback = $mailSent
      ? 'Thank you. A trade specialist will review your inquiry and contact you shortly.'
      : 'Thank you. Your inquiry is received and queued for review.';

    $formValues = [
      'fullName' => '',
      'email' => '',
      'phone' => '',
      'inquiryType' => '',
      'productInterest' => '',
      'quantity' => '',
      'destinationPort' => '',
      'message' => '',
    ];
  }
}

$faqEntities = array_map(static function ($faq) {
  return [
    '@type' => 'Question',
    'name' => (string) ($faq['q'] ?? ''),
    'acceptedAnswer' => [
      '@type' => 'Answer',
      'text' => (string) ($faq['a'] ?? '')
    ]
  ];
}, $faqs);

$schemaGraphs = [
  [
    '@context' => 'https://schema.org',
    '@type' => 'ContactPage',
    'name' => $pageTitle,
    'description' => $pageDescription,
    'url' => $canonicalUrl
  ],
  [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $faqEntities
  ]
];

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../components/navbar.php';
?>
<main id="main-content" class="contact-page">

  <!-- Hero -->
  <div class="contact-hero">
    <div class="contact-hero-bg"></div>
    <div class="contact-hero-content container mx-auto px-6 lg:px-12">
      <span class="contact-subtitle hero-animate delay-100">Global Export Desk</span>
      <h1 class="contact-title hero-animate delay-200">Start the <span>Conversation.</span></h1>
      <p class="contact-desc hero-animate delay-300">
        Whether you need a bulk quote, sample request, or have questions about our refining process,
        our trade specialists respond within 24 hours.
      </p>
    </div>
  </div>

  <!-- Quick Contact Strip -->
  <div class="contact-quick-strip">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="contact-quick-grid">
        <a href="mailto:contact@pakwestinternational.com" class="contact-quick-item">
          <div class="contact-quick-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </div>
          <div>
            <span class="contact-quick-label">Email Us</span>
            <span class="contact-quick-value">contact@pakwestinternational.com</span>
          </div>
        </a>
          <a href="https://wa.me/923335036125" target="_blank" rel="noopener" class="contact-quick-item">
          <div class="contact-quick-icon contact-quick-icon--green">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.555 4.122 1.527 5.855L.058 23.708l5.988-1.57A11.934 11.934 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.797a9.78 9.78 0 01-5.197-1.488l-.372-.221-3.862 1.013 1.03-3.77-.244-.386A9.776 9.776 0 012.203 12c0-5.406 4.39-9.797 9.797-9.797 5.407 0 9.797 4.39 9.797 9.797 0 5.406-4.39 9.797-9.797 9.797z"/></svg>
          </div>
          <div>
            <span class="contact-quick-label">WhatsApp</span>
            <span class="contact-quick-value">+92 333 5036125</span>
          </div>
        </a>
        <div class="contact-quick-item contact-quick-item--static">
          <div class="contact-quick-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          </div>
          <div>
            <span class="contact-quick-label">Headquarters</span>
            <span class="contact-quick-value">Karachi, Pakistan</span>
          </div>
        </div>
        <div class="contact-quick-item contact-quick-item--static">
          <div class="contact-quick-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div>
            <span class="contact-quick-label">Response Time</span>
            <span class="contact-quick-value">Within 24 hours</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Contact Grid -->
  <div class="contact-main-section">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="contact-grid">

        <!-- Left: Info Panel -->
        <div class="contact-info-panel">
          <div class="contact-info-header">
            <span class="contact-info-label">Get in Touch</span>
            <h2 class="contact-info-title">Let's Build a Partnership</h2>
            <p class="contact-info-desc">Join global wholesalers and industrial buyers who trust Pakwest for consistent quality and reliable supply.</p>
          </div>

          <div class="contact-info-items">
            <div class="contact-info-block">
              <div class="contact-info-block-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              </div>
              <div>
                <span class="contact-info-block-label">Headquarters</span>
                <p class="contact-info-block-value">Karachi Port Trust Area,<br>Suite 405 Business Hub,<br>Karachi, Pakistan</p>
              </div>
            </div>

            <div class="contact-info-block">
              <div class="contact-info-block-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </div>
              <div>
                <span class="contact-info-block-label">Email</span>
                <a href="mailto:contact@pakwestinternational.com" class="contact-info-block-link">contact@pakwestinternational.com</a>
              </div>
            </div>

            <div class="contact-info-block">
              <div class="contact-info-block-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              </div>
              <div>
                <span class="contact-info-block-label">Phone / WhatsApp</span>
                <a href="tel:+923335036125" class="contact-info-block-link">+92 333 5036125</a>
              </div>
            </div>
          </div>

          <!-- Certifications badge strip -->
          <div class="contact-cert-strip">
            <span class="contact-cert-tag">FDA Approved</span>
            <span class="contact-cert-tag">ISO 9001:2015</span>
            <span class="contact-cert-tag">FBR Certified</span>
            <span class="contact-cert-tag">APCEA Member</span>
          </div>

          <!-- Map -->
          <div class="contact-map-wrapper">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14481.783182769352!2d66.9952874!3d24.8485212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e06651d4bbf%3A0x9cf92f44555a0c23!2sKarachi%20Port%20Trust!5e0!3m2!1sen!2s!4v1647856789012!5m2!1sen!2s"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="Pakwest International Location"></iframe>
            <a href="https://goo.gl/maps/KarachiPortTrust" target="_blank" rel="noopener" class="map-overlay-btn">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              Open in Maps
            </a>
          </div>
        </div>

        <!-- Right: Form Panel -->
        <div class="contact-form-panel">
          <div class="contact-form-header">
            <h2 class="contact-form-title">Send a Message</h2>
            <p class="contact-form-desc">Fill in the details below and a trade specialist will respond within 24 hours.</p>
          </div>

          <div class="contact-success <?= $formSuccess ? 'is-visible' : '' ?>" id="contact-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <h4>Message Received</h4>
            <p><?= h($formFeedback !== '' ? $formFeedback : 'Thank you. A trade specialist will review your inquiry and contact you shortly.') ?></p>
          </div>

          <?php if (!empty($formErrors['general'])): ?>
            <div class="contact-error-banner"><?= h($formErrors['general']) ?></div>
          <?php endif; ?>

          <form class="contact-form" id="contact-form" method="post" action="<?= h(page_url('contact')) ?>" novalidate>
            <input type="text" name="website" tabindex="-1" autocomplete="off" class="contact-honeypot" aria-hidden="true">
            <div class="contact-form-row">
              <div class="form-group floating-group">
                <input type="text" name="fullName" id="fullName" required class="form-input <?= !empty($formErrors['fullName']) ? 'is-invalid' : '' ?>" value="<?= h($formValues['fullName']) ?>" placeholder=" ">
                <label for="fullName" class="floating-label">Full Name *</label>
                <?php if (!empty($formErrors['fullName'])): ?><span class="form-error"><?= h($formErrors['fullName']) ?></span><?php endif; ?>
              </div>
              <div class="form-group floating-group">
                <input type="email" name="email" id="email" required class="form-input <?= !empty($formErrors['email']) ? 'is-invalid' : '' ?>" value="<?= h($formValues['email']) ?>" placeholder=" ">
                <label for="email" class="floating-label">Email Address *</label>
                <?php if (!empty($formErrors['email'])): ?><span class="form-error"><?= h($formErrors['email']) ?></span><?php endif; ?>
              </div>
            </div>
            <div class="contact-form-row">
              <div class="form-group floating-group">
                <input type="text" name="phone" id="phone" required class="form-input <?= !empty($formErrors['phone']) ? 'is-invalid' : '' ?>" value="<?= h($formValues['phone']) ?>" placeholder=" ">
                <label for="phone" class="floating-label">Phone / WhatsApp *</label>
                <?php if (!empty($formErrors['phone'])): ?><span class="form-error"><?= h($formErrors['phone']) ?></span><?php endif; ?>
              </div>
              <div class="form-group floating-group">
                <input type="text" name="productInterest" id="productInterest" required class="form-input <?= !empty($formErrors['productInterest']) ? 'is-invalid' : '' ?>" value="<?= h($formValues['productInterest']) ?>" placeholder=" ">
                <label for="productInterest" class="floating-label">Product Interest *</label>
                <?php if (!empty($formErrors['productInterest'])): ?><span class="form-error"><?= h($formErrors['productInterest']) ?></span><?php endif; ?>
              </div>
            </div>
            <div class="contact-form-row">
              <div class="form-group">
                <label for="inquiryType" class="form-static-label">Inquiry Type *</label>
                <select name="inquiryType" id="inquiryType" class="form-input form-select <?= !empty($formErrors['inquiryType']) ? 'is-invalid' : '' ?>" required>
                  <option value="">Select inquiry type</option>
                  <option value="Bulk Order Quote" <?= $formValues['inquiryType'] === 'Bulk Order Quote' ? 'selected' : '' ?>>Bulk Order Quote</option>
                  <option value="Sample Request" <?= $formValues['inquiryType'] === 'Sample Request' ? 'selected' : '' ?>>Sample Request</option>
                  <option value="Private Label / OEM" <?= $formValues['inquiryType'] === 'Private Label / OEM' ? 'selected' : '' ?>>Private Label / OEM</option>
                  <option value="Distributor Partnership" <?= $formValues['inquiryType'] === 'Distributor Partnership' ? 'selected' : '' ?>>Distributor Partnership</option>
                </select>
                <?php if (!empty($formErrors['inquiryType'])): ?><span class="form-error"><?= h($formErrors['inquiryType']) ?></span><?php endif; ?>
              </div>
            </div>
            <div class="contact-form-row">
              <div class="form-group floating-group">
                <input type="text" name="quantity" id="quantity" required class="form-input <?= !empty($formErrors['quantity']) ? 'is-invalid' : '' ?>" value="<?= h($formValues['quantity']) ?>" placeholder=" ">
                <label for="quantity" class="floating-label">Estimated Quantity *</label>
                <?php if (!empty($formErrors['quantity'])): ?><span class="form-error"><?= h($formErrors['quantity']) ?></span><?php endif; ?>
              </div>
              <div class="form-group floating-group">
                <input type="text" name="destinationPort" id="destinationPort" required class="form-input <?= !empty($formErrors['destinationPort']) ? 'is-invalid' : '' ?>" value="<?= h($formValues['destinationPort']) ?>" placeholder=" ">
                <label for="destinationPort" class="floating-label">Destination Country / Port *</label>
                <?php if (!empty($formErrors['destinationPort'])): ?><span class="form-error"><?= h($formErrors['destinationPort']) ?></span><?php endif; ?>
              </div>
            </div>
            <div class="form-group floating-group">
              <textarea name="message" id="message" required class="form-input form-textarea <?= !empty($formErrors['message']) ? 'is-invalid' : '' ?>" placeholder=" "><?= h($formValues['message']) ?></textarea>
              <label for="message" class="floating-label">Message *</label>
              <?php if (!empty($formErrors['message'])): ?><span class="form-error"><?= h($formErrors['message']) ?></span><?php endif; ?>
            </div>
            <button type="submit" class="form-submit">
              <span>Send Message</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- FAQ Section -->
  <div class="faq-section">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="faq-header">
        <span class="faq-label">Common Inquiries</span>
        <h2 class="faq-title">Frequently Asked Questions</h2>
        <p class="faq-desc">Answers to the most common questions from our global trade partners.</p>
      </div>
      <div class="faq-grid">
        <?php foreach ($faqs as $faq): ?>
          <div class="faq-item">
            <button class="faq-question" type="button">
              <span><?= h($faq['q']) ?></span>
              <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="faq-answer">
              <p><?= h($faq['a']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</main>

<?php
include __DIR__ . '/../components/whatsapp-chat.php';
include __DIR__ . '/../components/footer.php';
include __DIR__ . '/../includes/foot.php';
?>


