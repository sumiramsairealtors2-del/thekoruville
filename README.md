# The Koru Ville

Resort-themed residential plotted township in Kilawali, Uttarakhand, at the
gateway to Jim Corbett National Park. Developed by Sumiram Sai Realtors.

Laravel 11 application with a Blade front end, a blog (posts), and an admin
panel.

---

## Requirements

- PHP 8.2+
- Composer
- Node.js + npm
- MySQL

## Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan storage:link
npm run build          # or: npm run dev
php artisan serve
```

The web root is **`public/`** — point your virtual host / document root there.
Never serve the project root directly.

## Project layout

| Path | Purpose |
|------|---------|
| `app/` | Controllers, models, middleware, providers |
| `routes/web.php` | Public + blog + admin routes |
| `resources/views/` | Blade templates (public site, blog, admin, auth) |
| `public/` | Web root — `index.php`, assets, `robots.txt`, `llms.txt` |
| `storage/` | Logs, cache, uploaded files |

## Key routes

| Route | Description |
|-------|-------------|
| `/` | Homepage |
| `/blog` | Blog listing |
| `/blog/{slug}` | Single post |
| `/privacy-policy` | Privacy Policy |
| `/terms-and-conditions` | Terms & Conditions |
| `/sitemap.xml` | Dynamic sitemap |
| `/admin/posts` | Admin CRUD (auth + admin middleware) |

## Assets

Source CSS/JS live in `resources/` and are bundled by Vite into `public/build/`.
Static brand assets (favicons, images, video) live in `public/assets/`.
Uploaded blog images live in `storage/app/public/blog_images/` and are served
via the `public/storage` symlink.
