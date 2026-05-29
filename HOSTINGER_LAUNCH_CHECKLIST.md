# Hostinger Launch Checklist (Pakwest International)

## 1) Domain + SSL
- Point domain DNS to Hostinger hosting.
- Enable SSL in Hostinger panel.
- Confirm `https://yourdomain.com` loads without certificate warnings.
- Confirm non-HTTPS redirects to HTTPS.

## 2) Upload + PHP
- Upload full project to `public_html`.
- Use PHP `8.1+` in Hostinger.
- Ensure file permissions are standard (`644` files, `755` folders).

## 3) Contact form mail (critical)
- In Hostinger Email, create mailbox: `contact@yourdomain.com`.
- Set environment values in hosting panel:
  - `CONTACT_TO_EMAIL=contact@yourdomain.com`
  - `CONTACT_FROM_EMAIL=no-reply@yourdomain.com`
- Submit a live test from `/contact`.
- Verify:
  - mail arrives in inbox
  - reply-to is user email
  - fallback log is not filling (`tmp/contact-inquiries.log`)

## 4) SEO launch
- Keep `robots.txt` and `sitemap.xml` public.
- Submit sitemap in Google Search Console:
  - `https://yourdomain.com/sitemap.xml`
- Inspect and request indexing for:
  - home
  - one category page
  - one product detail page
  - contact page

## 5) Core Web Vitals quick checks
- Run PageSpeed Insights for mobile + desktop.
- Prioritize:
  - LCP image compression
  - reduce JS blocking time
  - image dimensions for CLS stability
- Current code already adds lazy loading/decoding and high-priority hero loading.

## 6) Final smoke test
- Test all routes:
  - `/`
  - `/about`
  - `/categories`
  - `/products`
  - `/products/{category}`
  - `/products/{category}/{product}`
  - `/quality`
  - `/contact`
- Test WhatsApp button and quote flow.
- Test 404 page by opening an invalid URL.
