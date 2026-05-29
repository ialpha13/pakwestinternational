# PakWest International

A PHP-based website for PakWest International, including product, category, contact, and informational pages.

## Overview

This project is built as a simple PHP website with static JSON-driven content and reusable layout components.

### Key features

- PHP template includes for `head`, `footer`, `navbar`, and chat components
- JSON data files for navigation, product listings, and categories
- Clean asset structure for CSS, JavaScript, and images
- Responsive page layouts for home, about, contact, categories, products, and quality pages

## Repository structure

- `index.php` - main entry point
- `api/` - backend API endpoints
- `assets/` - CSS, JS, images, and data files
- `components/` - shared PHP components
- `includes/` - PHP includes and utility functions
- `pages/` - page-specific PHP endpoints
- `tmp/` - temporary/generated content

## Local setup

1. Install and run a local PHP server such as WAMP, XAMPP, or the built-in PHP server.
2. Place the repository in your web root, or use `php -S localhost:8000` from the project folder.
3. Open the site in your browser at `http://localhost/` or `http://localhost:8000`.

## Deployment

This repository requires a PHP-enabled web host. Recommended deployment options:

- Shared hosting or VPS with Apache/Nginx and PHP support
- WAMP/XAMPP for local testing and development
- Managed PHP hosting providers

To deploy:

1. Copy the repository files to your web server document root.
2. Ensure the server is configured to serve `.php` files.
3. Point your domain or subdomain to the host and verify the site loads.

## GitHub

After creating the repository on GitHub, run:

```powershell
cd c:\wamp64\www\pakwestinternational
git branch -M main
git remote add origin https://github.com/ialpha13/pakwestinternational.git
git push -u origin main
```

If your GitHub repo uses a different name, update the remote URL accordingly.

## Notes

- Keep `assets/data/*.json` in sync with site content.
- Update `includes/config.php` if any environment-specific settings are required.
- Exclude local temp files and editor settings from commits with `.gitignore`.

## License

This project is licensed under the MIT License. See `LICENSE` for details.
