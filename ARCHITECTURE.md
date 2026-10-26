# The Koru Ville — v2 Architecture & Developer Onboarding

A **Laravel 12** marketing site for a residential plot development near Jim Corbett
(Kilawali, Kashipur, Uttarakhand). It serves a public marketing site plus a small
blog and an admin CRUD panel.

`v2/` is an isolated rebuild of the live `thekoruville.com` app, using a **local
MySQL copy** of the production content — edits here never reach the live site.
The Laravel app root is **not** the web root — only `public/` is served.

---

## 0. Quick briefing

### What it is

A **Laravel 12** marketing site for The Koru Ville (residential plots near Jim
Corbett), plus a blog and a small admin CRUD panel. `v2/` is an isolated rebuild
of the live site — same MySQL database, new design. The Laravel app root is
**not** the web root; only `public/` is served.

### Structure at a glance

```
v2/                        ← app root (never web-served)
├── app/Http/Controllers/   PostController, Admin/AdminPostController, Breeze auth
├── app/Http/Middleware/    AdminMiddleware (is_admin gate)
├── app/Models/             Post (slug binding), User (+is_admin)
├── routes/web.php          public pages, sitemap, admin, auth include
├── resources/css/kv.css    ★ 1,465-line public design system
├── resources/js/kv.js      ★ 548-line vanilla JS (sliders, modals, forms→CRM)
├── resources/views/
│   ├── layouts/kv.blade.php    ★ public shell: SEO head, header, footer, modals
│   ├── partials/kv/            topbar, header (crown nav), rail, footer, drawer
│   ├── welcome.blade.php       ★ homepage, 13 sections
│   ├── posts/index|show        blog listing + article
│   ├── admin/posts/*           admin CRUD (Tailwind CDN, standalone)
│   └── auth/ profile/ components/   Breeze
├── public/                 ← DOCUMENT ROOT: index.php, .htaccess, assets/, build/, storage→
├── database/               migrations, seeders (admin user + real posts), data/real-posts.json
└── vite.config.js          inputs: app.css/app.js + kv.css/kv.js
```

### The five things to explain

1. **Two front-end worlds.** Public site = hand-written `kv.css` + vanilla
   `kv.js` (no framework, `kv-` BEM prefixes, colours as `:root` tokens).
   Auth/profile = Breeze/Tailwind. Admin = Tailwind CDN, no build step.

2. **Pages are mostly controller-less.** `/`, legal pages, and `/sitemap.xml` are
   closures in `routes/web.php` returning views. Only the blog has controllers.
   The homepage even queries `Post` inside an `@php` block in
   `welcome.blade.php` (line ~364) to feed its blog slider — the one obvious
   refactor target.

3. **Blog subsystem.** `posts` table (title, slug, meta, content HTML, image,
   tags, schema, is_published) → `PostController` paginates published posts and,
   for articles, injects `id`s into every `<h2>`, builds a table of contents,
   computes read time, prev/next and related posts. Admin auto-generates slug +
   canonical URL and stores uploads on the `public` disk
   (`storage/app/public/blog_images/`, needs the `public/storage` symlink).

4. **Leads never touch Laravel.** Every form (contact, enquiry, unlock, brochure)
   validates in JS and `fetch`es JSON to a hard-coded external CRM:
   `sumiramsairealtors.in/public/c/the-koruville-0b3hk/submit`. No mail, no DB write.

5. **Deployment shape.** Point the vhost at `v2/public/`, run
   `composer install --no-dev`, `npm ci && npm run build`,
   `php artisan storage:link`, then cache config/routes/views. `.env` points at
   a **local** MySQL (`127.0.0.1`) holding a copy of the production posts, with
   isolated `koruville_v2_*` session/cache prefixes.

### Gotchas to flag before they clone

- `public/storage` is an **absolute** symlink to this machine's path → re-run
  `php artisan storage:link`.
- `public/hot` exists (Vite dev marker) — delete before a production build or
  assets point at `:5173`.
- Dead code: `layouts/public.blade.php` (2,697 lines, unused), `blog.css`/`blog.js`
  (not in Vite), empty `layouts/navigation.blade.php`.
- Post content is rendered unescaped — trusted admins only.
- No tests for posts/sitemap/admin; Breeze defaults only.
- Seeded admin is `admin@thekoruville.com` / `password` — change before going live;
  public registration is also enabled.

---

## 1. Stack

| Layer | Choice |
|---|---|
| Framework | Laravel 12, PHP ^8.2 |
| Templating | Blade |
| Auth scaffold | Laravel Breeze (session auth) |
| CSS | Hand-written design system (`kv.css`), no framework for the public site |
| JS | Vanilla, single IIFE (`kv.js`), no framework, no Alpine on public pages |
| Bundler | Vite 7 + laravel-vite-plugin |
| DB | MySQL (`koruvilla_blog`) |
| Admin panel | Standalone Blade pages using the Tailwind CDN |

Two independent front-end worlds exist:
- **Public site** → `kv.css` / `kv.js` / `layouts/kv.blade.php`
- **Auth + profile** → Breeze's `app.css` / `app.js` / `layouts/app.blade.php`
- **Admin** → no build step at all; Tailwind loaded from CDN inside each view

---

## 2. File structure

```
v2/                              ← Laravel app root (NEVER web-served)
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── PostController.php            blog index + article (TOC, prev/next, related)
│   │   │   ├── Admin/AdminPostController.php full CRUD, slug + canonical + image upload
│   │   │   ├── ProfileController.php         Breeze
│   │   │   ├── Controller.php                base
│   │   │   └── Auth/…                       9 Breeze auth controllers
│   │   ├── Middleware/AdminMiddleware.php    is_admin gate
│   │   └── Requests/                         LoginRequest, ProfileUpdateRequest
│   ├── Models/
│   │   ├── Post.php                          slug route binding, casts
│   │   └── User.php                          + is_admin flag
│   ├── Providers/AppServiceProvider.php      empty
│   └── View/Components/                      Breeze AppLayout / GuestLayout
│
├── bootstrap/app.php              Laravel 12 fluent config; registers `admin` alias
│
├── config/                        app, auth, cache, database, filesystems,
│                                  logging, mail, queue, services, session
│
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_…_create_users_table.php
│   │   ├── 0001_01_01_…_create_cache_table.php
│   │   ├── 0001_01_01_…_create_jobs_table.php
│   │   ├── 2026_08_03_093829_create_posts_table.php
│   │   └── 2026_08_03_105247_add_is_admin_to_users_table.php
│   ├── seeders/                   DatabaseSeeder (admin user), RealPostSeeder, PostSeeder
│   ├── factories/                 UserFactory, PostFactory
│   └── data/                      real-posts.json + legacy SQL dump (import source)
│
├── public/                        ← DOCUMENT ROOT
│   ├── index.php                  front controller
│   ├── .htaccess                  standard Laravel rewrites
│   ├── assets/                    41 files: img/, img/kv/ (responsive WebP),
│   │                              favicons, site.webmanifest, RERA QR
│   ├── build/                     Vite output (gitignored, regenerate with npm run build)
│   ├── storage → ../storage/app/public     symlink (regenerate on new machine)
│   ├── robots.txt                 disallows /admin /login /dashboard …
│   └── llms.txt                   LLM-oriented site summary
│
├── resources/
│   ├── css/
│   │   ├── kv.css                 ★ 1,465-line public design system
│   │   ├── app.css                Breeze (3 lines, imports Tailwind)
│   │   └── blog.css               unused legacy copy
│   ├── js/
│   │   ├── kv.js                  ★ 548-line public behaviour
│   │   ├── app.js / bootstrap.js  Breeze
│   │   └── blog.js                unused legacy copy
│   └── views/
│       ├── layouts/
│       │   ├── kv.blade.php       ★ public shell: <head>/SEO, header, footer,
│       │   │                        3 enquiry modals, lightbox (180 lines)
│       │   ├── app.blade.php      Breeze shell (auth/profile)
│       │   ├── guest.blade.php    Breeze auth shell
│       │   ├── navigation.blade.php   EMPTY (0 bytes)
│       │   └── public.blade.php   2,697-line legacy layout — UNUSED
│       ├── partials/kv/           topbar, header (crown nav), rail,
│       │                          footer (RERA block), drawer (mobile menu)
│       ├── welcome.blade.php      ★ homepage, 637 lines, 13 <section>s
│       ├── posts/index.blade.php  blog listing (paginated, 9/page)
│       ├── posts/show.blade.php   article: hero, TOC, prose, prev/next, related
│       ├── pp.blade.php           privacy policy
│       ├── tc.blade.php           terms & conditions
│       ├── errors/404.blade.php   branded 404
│       ├── dashboard.blade.php    minimal Breeze dashboard
│       ├── admin/posts/           index, create, edit, show (Tailwind CDN)
│       ├── auth/                  6 Breeze auth screens
│       ├── profile/               edit + 3 partials
│       ├── components/            11 Breeze Blade components
│       └── pagination/kv.blade.php  custom Prev/Next paginator
│
├── routes/
│   ├── web.php                    all public + admin routes (~330 lines, sitemap inline)
│   ├── auth.php                   Breeze auth routes
│   └── console.php                artisan commands
│
├── storage/                       app/public/blog_images, framework cache/views/sessions, logs
├── tests/                         Breeze defaults only — no Post/admin coverage
├── vendor/ · node_modules/        gitignored
├── .env · .env.example            .env holds the real DB credentials
├── composer.json · package.json
├── vite.config.js                 entries: app.css, app.js, kv.css, kv.js
├── tailwind.config.js · postcss.config.js
└── README.md · README-REDESIGN.md · ARCHITECTURE.md
```

---

## 3. Route map

| Method | URI | Handler | Notes |
|---|---|---|---|
| GET | `/` | closure → `welcome` | homepage |
| GET | `/blog` | `PostController@index` | published only, `latest()`, 9/page |
| GET | `/blog/{post}` | `PostController@show` | bound by **slug**, 404 if unpublished |
| GET | `/privacy-policy` | closure → `pp` | |
| GET | `/terms-and-conditions` | closure → `tc` | |
| GET | `/sitemap.xml` | closure | built inline in `web.php` |
| GET | `/dashboard` | closure | `auth`, `verified` |
| GET/PATCH/DELETE | `/profile` | `ProfileController` | `auth` |
| resource | `/admin/posts` | `AdminPostController` | `auth` + `admin` |
| — | `/login`, `/register`, `/forgot-password`, … | Breeze | `routes/auth.php` |
| GET | `/up` | framework health check | |

---

## 4. Request flow

**Public page (no controller):**

```
GET /  →  routes/web.php closure  →  view('welcome')
       →  layouts.kv (head, SEO, header/footer, modals)
       →  welcome sections + inline Post:: query for the blog slider
```

The homepage deliberately skips a controller: `welcome.blade.php` runs
`Post::where('is_published', true)->latest('updated_at')->take(5)->get()`
inside an `@php` block (line ~364) to feed the blog slider. This is the one
place worth refactoring into a controller or view composer if the page grows.

**Blog:** `PostController@index` paginates published posts →
`posts/index.blade.php`. `@show` takes the slug-bound model, aborts 404 when
unpublished, post-processes the stored HTML (adds stable `id`s to every `<h2>`,
builds a table of contents, wraps tables in a scroll container), computes read
time, previous/next, and three related posts.

**Admin:** `/admin/posts` → `auth` + `admin` middleware →
`AdminPostController`. Because `Post::getRouteKeyName()` returns `slug`,
admin edit/update/delete URLs use the slug, not the id.

---

## 5. The public design system (`kv.css` + `kv.js`)

**CSS** — one 1,465-line file, organised as tokens → base → layout → components.

Tokens at `:root` (`--kv-olive #313922`, `--kv-cream #ebe4cc`, `--kv-gold #c0a42a`,
fonts `Inter Tight` / `Jost` / `Cormorant Garamond`, shell width 1240px, frame radii).
Everything is prefixed `kv-`, BEM-ish (`kv-blog__track`, `kv-btn--olive`).
No utility classes; layout is hand-built grid/flex.

**JS** — one IIFE, feature blocks in order:

1. mobile drawer open/close + focus/scroll lock
2. hero slider (autoplay 7s, dots, prev/next, pause on hover)
3. scroll-reveal via `IntersectionObserver` (respects `prefers-reduced-motion`)
4. modal system (`data-kv-open="enquiry|unlock|brochure"`)
5. **form handling** — validates, then `fetch` POSTs to an external CRM
6. FAQ accordion
7. generic carousels (`[data-carousel]`, scroll-snap + dots)
8. homepage blog slider (crossfades card/bg, dots, arrows)
9. gallery lightbox (`[data-lightbox]`)

**Form endpoint (hard-coded):**
`https://sumiramsairealtors.in/public/c/the-koruville-0b3hk/submit`
All forms (contact, enquiry modal, unlock, brochure) post JSON there with a
`data-source` label. There is **no Laravel mail/DB write** for leads — the CRM
is the system of record. Change that constant to point at a different CRM.

Layout composition: `layouts/kv.blade.php` includes
`partials/kv/topbar`, `header` (olive "crown" nav with logo tab), `rail`,
`footer`, `drawer`, then defines the three modals + lightbox globally.

Homepage sections in order: hero, about, why-this-location, plots, gallery,
amenities, layout-price (gated by the unlock form), blog, map, reviews, faq,
contact.

---

## 6. Blog data model

`posts` table:

| column | type | notes |
|---|---|---|
| id | bigint PK | |
| title | string | |
| slug | string unique | route key, auto-generated from title in admin |
| meta_title / meta_description | string / text | SEO |
| canonical_url | string | auto-set to `/blog/{slug}` on save |
| content | longText | raw HTML from the editor |
| image | string | path on the `public` disk under `blog_images/` |
| category_id | unsignedBigInteger nullable | legacy; admin treats it as text |
| tags | text | comma-separated |
| schema | text | per-post JSON-LD |
| is_published | boolean | default false |
| timestamps | | `updated_at` drives sitemap + blog ordering |

Uploaded images live in `storage/app/public/blog_images/` and are reached via
`asset('storage/'.$post->image)` — this depends on the `public/storage` symlink.

Seeding: `DatabaseSeeder` creates `admin@thekoruville.com` / `password` with
`is_admin = true`, then imports the real posts from `database/data/real-posts.json`
through `RealPostSeeder`.

---

## 7. Auth & authorisation

Breeze session auth on top of the standard `users` table plus an `is_admin`
boolean (second migration). `AdminMiddleware` (aliased as `admin` in
`bootstrap/app.php`) aborts 403 unless `auth()->user()->is_admin`. There are no
roles/policies beyond this single flag. Public registration is enabled by the
Breeze routes — relevant if the site goes live (consider disabling it).

---

## 8. SEO / marketing plumbing

- `layouts/kv.blade.php`: title + description per view via `@section`, canonical
  (`url()->current()`), robots, Google & Bing verification meta, theme colour,
  Open Graph + Twitter cards, GTM `GTM-P769HDDG`.
- `welcome.blade.php` head: JSON-LD `Organization`, `RealEstateAgent`, `FAQPage`.
- `posts/index.blade.php`: `Blog` JSON-LD; `posts/show.blade.php`: article schema
  and its own meta/canonical.
- `/sitemap.xml` route assembles the XML manually: home, /blog, legal pages, and
  every post ordered by `updated_at`.
- `public/robots.txt` blocks admin/auth paths and references the sitemap.
- Branded `errors/404.blade.php`.

---

## 9. Local setup

```bash
cd v2
composer install
cp .env.example .env && php artisan key:generate   # then set DB_* to the MySQL instance
npm install
php artisan storage:link
php artisan migrate --seed      # admin user + real posts
npm run dev                     # or: npm run build
php artisan serve --port=8001   # http://127.0.0.1:8001
```

`.env` currently targets the **local** MySQL `koruvilla_blog` on `127.0.0.1`
(a Homebrew instance on this Mac) that holds a **copy** of the production posts.
Writes here do not affect the live site. Sessions/cache use the isolated
`koruville_v2_*` namespace so they never collide with anything else.

Deployment: point the vhost document root at `v2/public/`, run
`composer install --no-dev`, `npm ci && npm run build`,
`php artisan storage:link`, `config:cache`, `route:cache`, `view:cache`.

---

## 10. Gotchas / known cleanup items

1. **Absolute symlink** — `public/storage` points at
   `/Users/developer/Downloads/public_html 2/v2/storage/app/public`. Re-run
   `php artisan storage:link` after cloning or images 404.
2. **`public/hot`** — leftover Vite dev-server marker. Delete it before
   building for production, otherwise Blade keeps pointing at `:5173`.
3. **Dead files** — `layouts/public.blade.php` (2,697 lines, referenced nowhere),
   `resources/css/blog.css` + `resources/js/blog.js` (not in the Vite config),
   empty `layouts/navigation.blade.php` (included by Breeze's `app.blade.php`,
   so the auth pages render without nav). Safe to delete/fix.
4. **Two design languages** — public uses `kv.css`; admin uses the Tailwind CDN
   and Breeze pages use compiled Tailwind. A redesign to the public site does
   not affect admin/auth.
5. **Raw HTML content** — `posts.content` is rendered unescaped in
   `posts/show.blade.php`; only trusted admins can write it. Do not open the
   admin to lower-trust users without sanitisation.
6. **No lead persistence** — all forms go straight to the external CRM; nothing
   is stored locally, so offline/dev submissions are lost.
7. **Tests** — only Breeze's auth/profile tests exist; posts, sitemap and admin
   have no coverage.
8. **`category_id`** — declared `unsignedBigInteger` but handled as a string in
   the admin controller. Harmless now, inconsistent schema.
9. **Hard-coded brand data** — phone number, address, RERA number, social links
   and the GTM ID are inline in Blade, not config.
10. **Seeded admin password** — `password` in `DatabaseSeeder`; change before
    any public deployment.

---

## 11. Where to change what

| Task | File(s) |
|---|---|
| Homepage copy/sections | `resources/views/welcome.blade.php` |
| Global header/footer/nav | `resources/views/partials/kv/*.blade.php` |
| Modals, lightbox, `<head>`/SEO | `resources/views/layouts/kv.blade.php` |
| Look & feel (colour, spacing, type) | `resources/css/kv.css` (`:root` tokens first) |
| Interactions / CRM endpoint | `resources/js/kv.js` |
| Blog listing / article design | `resources/views/posts/*.blade.php` |
| Blog logic (TOC, prev/next, related) | `app/Http/Controllers/PostController.php` |
| Admin blog CRUD | `app/Http/Controllers/Admin/AdminPostController.php` + `resources/views/admin/posts/*` |
| Routes / sitemap | `routes/web.php` |
| Images | `public/assets/img/` (use the responsive `img/kv/` sets) |

---

## 12. Running on another machine (Vite assets)

### How Vite integrates with Blade

`@vite([...])` in `layouts/kv.blade.php` (public site) and
`layouts/app.blade.php` / `guest.blade.php` (Breeze pages) does **not** build
anything at request time. It only prints `<link>` / `<script>` tags, and it
decides which URLs to print based on two things:

| File present | Mode | What `@vite` emits |
|---|---|---|
| `public/hot` | dev | `<script src="http://127.0.0.1:5173/…">` + HMR client |
| `public/build/manifest.json` | build | hashed URLs from `public/build/assets/…` |
| neither | — | `ViteManifestNotFoundException` ("Vite manifest not found") |

- `npm run dev` starts the Vite dev server on port 5173 and writes `public/hot`
  with its URL. Blade changes reload automatically (`refresh: true` in
  `vite.config.js`); CSS/JS are hot-swapped. **Both processes must run**:
  `npm run dev` in one terminal and `php artisan serve` in another.
- `npm run build` compiles `resources/css/kv.css`, `resources/js/kv.js`,
  `resources/css/app.css`, `resources/js/app.js` into hashed files under
  `public/build/assets/`, writes `public/build/manifest.json`, and removes
  `public/hot`. After that **Node is not needed at runtime**.

### What is and isn't in the GitHub repo

| Item | Committed? | Consequence on a fresh clone |
|---|---|---|
| `resources/css/`, `resources/js/`, `resources/views/` | yes | sources are there |
| `package.json`, `package-lock.json` | yes | `npm ci` reproduces exact deps |
| `vite.config.js`, `tailwind.config.js` | yes | build config is there |
| `composer.json`, `composer.lock` | yes | `composer install` is reproducible |
| `node_modules/` | **no** | must run `npm ci` |
| `vendor/` | **no** | must run `composer install` |
| `public/build/` | **no** (`.gitignore`) | must run `npm run build`, or `npm run dev` |
| `public/hot` | **no** (`.gitignore`) | correct — a cloned dev marker would point at `:5173` |
| `public/storage` symlink | **no** (`.gitignore`) | must run `php artisan storage:link` |
| `.env` | **no** (`.gitignore`) | must copy `.env.example` and fill in DB credentials |
| `storage/app/public/blog_images/*` | **no** (`storage/app/public/.gitignore` ignores `*`) | blog images 404 until copied/synced |

### Setup on a fresh computer

Prerequisites: PHP 8.2+, Composer 2, Node **20.19+ or 22.12+** (Vite 7
requirement), npm, and network access to the MySQL host.

```bash
git clone https://github.com/<user>/thekoruville.git koruville
cd koruville

# PHP side
composer install
cp .env.example .env
php artisan key:generate
# edit .env: APP_URL, DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD
php artisan storage:link

# Front-end deps (lockfile is committed, so use ci)
npm ci
```

Then pick one mode:

**A. Development (hot reload)** — two terminals:

```bash
npm run dev        # terminal 1 — writes public/hot, serves :5173
php artisan serve --port=8001   # terminal 2
# http://127.0.0.1:8001
```

**B. Production-like (built assets)** — no Node afterwards:

```bash
npm run build
php artisan serve --port=8001
```

For an actual server, additionally:

```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

and point the vhost document root at `public/` (not the repo root).

### Copying the uploaded blog images

`storage/app/public/.gitignore` contains `*`, so nothing under
`storage/app/public/` is versioned — including the 20+ WebP files in
`blog_images/`. On the new machine the `posts.image` rows (from the shared DB)
will point at files that do not exist. Either:

```bash
# from the original machine
rsync -av "public_html 2/v2/storage/app/public/blog_images/" user@newhost:/path/koruville/storage/app/public/blog_images/

# or re-import posts + images from database/data/real-posts.json
php artisan db:seed --class=RealPostSeeder
```

### If the target machine has no Node (shared hosting / cPanel)

Build before pushing and commit the output:

1. Remove `/public/build` from `v2/.gitignore` (keep `/public/hot` ignored).
2. Delete `public/hot` if present.
3. Run `npm run build`.
4. Commit `public/build/` (manifest + all hashed asset files).

The clone then renders correctly with only PHP + Composer, because `@vite`
finds `public/build/manifest.json`. Trade-off: every CSS/JS change requires a
rebuild **and** a commit of new hashed filenames, which makes diffs noisy.

A cleaner alternative is a GitHub Actions workflow that runs `npm ci && npm run
build` on push and deploys the `public/build` folder with the release, keeping
the artifacts out of git.

### Common failure modes

| Symptom | Cause / fix |
|---|---|
| `Vite manifest not found at …/public/build/manifest.json` | neither `public/build` nor `public/hot` exists → `npm run build` (or start `npm run dev`) |
| Page loads but CSS/JS 404, URLs contain `:5173` | stale `public/hot` → delete it, then `npm run build` |
| `npm run build` fails with an engine error | Node too old → use Node 20.19+/22.12+ (`nvm use 22`) |
| Fonts/icons 404 on a fresh clone | `php artisan storage:link` not run, or `blog_images/` not copied |
| `npm run dev` works locally but visitors get unstyled pages | dev server only serves your machine — use `npm run build` for anything shared |
| Styles missing after `git pull` | rebuild (`npm run build`) — hashed asset filenames change on every build |

---

## 13. Pointing v2 at the live database (read-only)

Goal: browse the redesign against real production content **without the live
database being modified**. Three things make that safe:

1. `APP_READ_ONLY=true` — a guard in `AppServiceProvider` throws on every
   `INSERT / UPDATE / DELETE / REPLACE / ALTER / DROP / TRUNCATE / CREATE /
   RENAME / GRANT / REVOKE / LOCK` statement before it reaches MySQL.
2. `SESSION_DRIVER=file` and `CACHE_STORE=file` — otherwise Laravel writes
   session and cache rows into the live database on every request.
3. No `migrate`, `seed`, or admin edits.

### 13.1 Status on this machine

- The live `.env` was read over SFTP (`ssr@thekoruville.com@68.178.170.72`).
  Its DB credentials are the same as the local ones: `koruvilla_blog` /
  `koruvilla_blog`, with `DB_HOST=localhost` (server-local).
- **SSH is not usable**: port 22 answers, but password auth is refused for
  `koruvilla`, `ssr` and `ssr@thekoruville.com` (key-only or different account).
- **Direct remote MySQL is blocked at the grant level**:
  `ERROR 1130 (HY000): Host '49.36.144.102' is not allowed to connect to this
  MySQL server`. Port 3306 is reachable, so this is a host allowlist, not a
  firewall issue.
- A ready-to-use **`.env.live`** exists in this folder (gitignored) with
  `APP_READ_ONLY=true`, `DB_HOST=68.178.170.72`, `SESSION_DRIVER=file`,
  `CACHE_STORE=file`. `v2/.env` still points at the local DB, so the app keeps
  working until the allowlist is added.

### 13.2 Enable remote MySQL (one-time, cPanel)

cPanel → **Remote MySQL** → *Add Access Host* → `49.36.144.102`
(that is this network's current public IPv4; check with `curl -4
ifconfig.me`, and re-add if the ISP rotates it). Alternatively, if cPanel
shows an SSH user/password under *SSH Access*, use the tunnel instead:

```bash
ssh -N -L 3307:127.0.0.1:3306 <ssh-user>@68.178.170.72
```

and set `DB_HOST=127.0.0.1`, `DB_PORT=3307`.

### 13.3 Activate and verify

```bash
cd v2
cp .env.live .env
php artisan config:clear
php artisan tinker --execute='echo App\Models\Post::count();'   # expect 17
```

If it prints 17, `v2` is reading the live database. Load `/` and `/blog`.
Any attempted write throws
`Read-only mode (APP_READ_ONLY=true) blocked a write query`.

If you get `1130 ... not allowed`, the allowlist step above has not applied yet
(or the IP changed). If you get `1045 Access denied`, the DB password differs
from the one in the live `.env`.

### 13.4 What still behaves differently

- **Admin panel** — you can log in and view lists, but saving/deleting throws.
  Image uploads may still land in your local `storage/` before the DB insert
  fails; harmless, just clean them up.
- **New live posts** — their featured images live on the server. Copy
  `storage/app/public/blog_images/` over SFTP, or expect 404 thumbnails.
- **Speed** — every query crosses the network; the homepage runs a post query
  inside `welcome.blade.php`, so first paint will be noticeably slower.
- **Sessions** — now file-based, so logins are local to this machine and do not
  create rows in the live `sessions` table.

### 13.5 Reverting to the local DB

```bash
cp .env.local-backup .env      # snapshot of the local-DB config
php artisan config:clear
```

Or set `APP_READ_ONLY=false` if you only want to keep the live connection but
allow writes (not recommended).

Both `.env.live` and `.env.local-backup` are covered by the `.env.*` rule in
`.gitignore`, so they never get pushed.

> If the host allows creating SQL users, a DB-level `GRANT SELECT` is an even
> stronger guarantee than the app guard — but cPanel's UI normally grants ALL
> privileges on a database, which is why the guard exists.
