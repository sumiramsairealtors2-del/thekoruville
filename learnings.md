# THE KORU VILLE — Complete Project Learnings & File System Guide

> **Purpose:** This document is for developers who do NOT know Laravel and do NOT have AI assistance. It covers the entire project from basic to advanced, so you can debug manually and understand how everything fits together.

---

## TABLE OF CONTENTS

1. [Project Overview](#project-overview)
2. [What is Laravel (5-minute primer)](#what-is-laravel)
3. [All Methods, Functions & Features Used](#all-methods-functions-features)
4. [File System — Complete Map](#file-system-complete-map)
5. [Directory-by-Directory Breakdown](#directory-by-directory-breakdown)
6. [Key File: What Each Contains & What It Does](#key-file-what-each-contains)
7. [How a Request Flows Through the App](#how-a-request-flows)
8. [Blade Templates Explained](#blade-templates-explained)
9. [Database, Models & Migrations](#database-models-migrations)
10. [JavaScript — kv.js Breakdown](#javascript-kvjs-breakdown)
11. [CSS — kv.css Breakdown](#css-kvcss-breakdown)
12. [Common Bugs & How to Debug Manually](#common-bugs-debugging)
13. [Laravel Commands Cheat Sheet](#laravel-commands-cheat-sheet)
14. [Configuration Reference](#configuration-reference)
15. [Quick Reference — Data Flow for Each Page](#quick-reference-data-flow)

---

## PROJECT OVERVIEW

**Project Name:** The Koru Ville  
**Type:** Real estate plotted township website (residential plots near Jim Corbett, Uttarakhand, India)  
**Framework:** Laravel 12 (PHP 8.2+)  
**Frontend:** Vanilla JavaScript (no framework), custom CSS (no Tailwind in kv.css), Vite build tool  
**Database:** SQLite (`database/database.sqlite`)  
**Templating:** Laravel Blade  
**Key Features:** Home page with hero carousel, plot options, blog carousel, amenities, enquiry modal, blog system with admin panel, user authentication, profile management

---

## WHAT IS LARAVEL (5-MINUTE PRIMER)

Laravel is a PHP framework that follows the **MVC pattern**:

```
M = Model   (talks to database, e.g., Post.php, User.php)
V = View    (HTML templates, e.g., welcome.blade.php)
C = Controller (logic between Model and View, e.g., PostController.php)
```

**How a web request works in Laravel:**

1. Browser requests a URL (e.g., `/blog/my-post`)
2. `routes/web.php` matches the URL to a controller method
3. Controller fetches data from Model (database)
4. Controller passes data to a View (Blade template)
5. View renders HTML and sends it back to the browser

**Key Laravel concepts you'll see in this project:**

| Concept | What it means | Example in this project |
|---------|--------------|------------------------|
| Route | Maps a URL to code | `Route::get('/', ...)` in `routes/web.php` |
| Controller | PHP class with methods that handle requests | `PostController.php` |
| Model | Represents a database table | `Post.php` → `posts` table |
| Migration | PHP file that creates/alter database tables | `database/migrations/` |
| Seeder | PHP file that inserts dummy/real data | `database/seeders/` |
| Blade | HTML templating engine with `{{ }}` and `@` directives | `welcome.blade.php` |
| View | The rendered HTML sent to browser | `resources/views/` |
| Middleware | Code that runs before/after a request | `AdminMiddleware.php` |
| Artisan | Command-line tool (`php artisan ...`) | `php artisan migrate`, `php artisan serve` |

---

## ALL METHODS, FUNCTIONS & FEATURES USED

### PHP / Laravel Methods & Functions

**Global Laravel helpers** (available everywhere):
- `view('name')` — renders a Blade view
- `url('/path')` — generates a full URL
- `route('name')` — generates a URL by route name
- `asset('path')` — generates URL to public asset (e.g., `asset('assets/img/logo.png')`)
- `now()` — returns current date/time
- `abort(404)` — throws a 404 error
- `redirect()->route('name')` — redirects to a named route
- `compact('var1', 'var2')` — creates an array from variables
- `Str::slug('text')` — converts text to URL-friendly slug
- `auth()->check()` — checks if user is logged in
- `auth()->user()` — gets the logged-in user
- `Storage::disk('public')->exists()` / `->delete()` / `->store()` — file storage operations

**Eloquent (database) methods used:**
- `Post::where('is_published', true)->latest('updated_at')->take(5)->get()` — get 5 latest published posts
- `Post::where('is_published', true)->latest()->paginate(9)` — paginated posts
- `Post::find($id)` / `Post::first()` — get single record
- `Post::create([...])` — insert new record
- `$post->update([...])` — update existing record
- `$post->delete()` — delete record
- `$posts->isEmpty()` — check if collection is empty
- `$posts->first()` — get first item
- `$posts->slice(1)->values()` — get all items except first
- `$post->image` — access model attribute

**Controller methods in this project:**

| File | Method | HTTP Verb | Route | Purpose |
|------|--------|-----------|-------|---------|
| `PostController.php` | `index()` | GET | `/blog` | List all published posts (paginated) |
| `PostController.php` | `show(Post $post)` | GET | `/blog/{slug}` | Show single post |
| `AdminPostController.php` | `index()` | GET | `/admin/posts` | List all posts (admin) |
| `AdminPostController.php` | `create()` | GET | `/admin/posts/create` | Show create form |
| `AdminPostController.php` | `store(Request $request)` | POST | `/admin/posts` | Save new post |
| `AdminPostController.php` | `show(Post $post)` | GET | `/admin/posts/{id}` | View post (admin) |
| `AdminPostController.php` | `edit(Post $post)` | GET | `/admin/posts/{id}/edit` | Show edit form |
| `AdminPostController.php` | `update(Request $request, Post $post)` | PUT/PATCH | `/admin/posts/{id}` | Update post |
| `AdminPostController.php` | `destroy(Post $post)` | DELETE | `/admin/posts/{id}` | Delete post |
| `MediaController.php` | `gallery()` | GET | `/media/gallery-film` | Serve video file with range requests |
| `ProfileController.php` | `edit(Request $request)` | GET | `/profile` | Show profile form |
| `ProfileController.php` | `update(ProfileUpdateRequest $request)` | PATCH | `/profile` | Update profile |
| `ProfileController.php` | `destroy(Request $request)` | DELETE | `/profile` | Delete account |

**Private/helper methods in PostController:**
- `prepareContent(string $html)` — processes post content HTML: adds IDs to H2 headings, builds table of contents, wraps tables for scrollability

### JavaScript Functions & Features (kv.js)

| Function | What it does | Lines |
|----------|-------------|-------|
| `$(sel, ctx)` | Shortcut for `document.querySelector` | 14 |
| `$$(sel, ctx)` | Shortcut for `document.querySelectorAll` returning array | 15 |
| `openDrawer()` / `closeDrawer()` | Mobile navigation drawer open/close | 21-49 |
| `showSlide(i)` | Hero carousel: show slide at index | 57-67 |
| `nextSlide(step)` | Hero carousel: move by step | 68-71 |
| `restartHero()` | Hero carousel: restart auto-play timer | 72-76 |
| `openModal(key)` | Open any modal by ID (`kvModal-{key}`) | 110-121 |
| `closeModal(modal)` | Close any modal | 122-129 |
| `setStatus(form, type, text)` | Show success/error status under form | 186-191 |
| `fieldError(input, message)` | Show/hide field validation error | 193-200 |
| `validate(form)` | Validate enquiry form fields | 202-213 |
| `toggle()` | Gallery film play/pause | 523-537 |
| `setOpen(next)` | Location crown panel open/close | 593-610 |
| `updateReadbar()` | Reading progress bar update | 640-645 |

**JavaScript Features implemented:**
- Hero image carousel with auto-play (7 second interval)
- Modal open/close with Escape key support
- Enquiry form with client-side validation and CRM submission via `fetch()`
- Auto-open enquiry modal after 5 seconds (once per session)
- Blog featured carousel with background image sync
- FAQ accordion (click to expand)
- Carousel component with prev/next dots
- Review expand/collapse ("Read more"/"Read less")
- Gallery lightbox (click image to enlarge)
- Gallery film player with seek bar and play/pause
- Location crown toggle panel with position sync
- Reading progress bar on blog pages
- Table of contents with active highlighting via IntersectionObserver
- Clipboard copy button

### Blade Directives Used

| Directive | Meaning | Example |
|-----------|---------|---------|
| `@extends('layouts.kv')` | Use a layout file as parent | `welcome.blade.php:1` |
| `@section('title', '...')` | Define a section of content | `welcome.blade.php:3` |
| `@yield('content')` | Render a section from child view | `kv.blade.php:79` |
| `@include('partials.kv.header')` | Include a partial view | `kv.blade.php:76` |
| `@if(...)` / `@endif` | Conditional in Blade | `kv.blade.php:78` |
| `@foreach(...)` / `@endforeach` | Loop in Blade | `welcome.blade.php:483` |
| `@forelse(...)` / `@empty` / `@endforelse` | Loop with empty fallback | `welcome.blade.php:483-512` |
| `@php ... @endphp` | Run PHP code inside Blade | `welcome.blade.php:425-443` |
| `@verbatim ... @endverbatim` | Escape Blade rendering (for JSON-LD) | `welcome.blade.php:8-73` |
| `@stack('scripts')` | Stack scripts to be rendered in layout | `kv.blade.php:191` |
| `{{ $variable }}` | Echo escaped variable | Everywhere |
| `{!! $variable !!}` | Echo unescaped (raw) HTML | `public.blade.php:49` |
| `@auth` / `@endauth` | Check if authenticated | Various auth views |
| `@guest` / `@endguest` | Check if guest (not authenticated) | Various auth views |

---

## FILE SYSTEM — COMPLETE MAP

```
thekoruville/                          ← Project root
├── artisan                            ← Laravel CLI tool (run: php artisan ...)
├── composer.json                      ← PHP dependencies & scripts
├── composer.lock                      ← Locked PHP dependency versions
├── package.json                       → NPM scripts (build, dev)
├── package-lock.json                  ← Locked NPM dependency versions
├── vite.config.js                     ← Vite build config
├── tailwind.config.js                 ← Tailwind config (used by app.css)
├── postcss.config.js                  ← PostCSS config
├── phpunit.xml                        ← PHP test config
├── .env                               ← Environment variables (DB, APP_KEY, etc.)
├── .env.example                       ← Example env file
├── .gitignore                         ← Files ignored by git
├── Dockerfile                         ← Docker container config
├── render.yaml                        ← Render.com deploy config
├── README.md                          ← Basic readme
├── README-REDESIGN.md                 ← Redesign notes
├── ARCHITECTURE.md                    ← Architecture docs
├── learnings.md                       ← THIS FILE
│
├── app/                               ← PHP application code (MVC)
│   ├── Http/
│   │   ├── Controllers/               ← Request handlers
│   │   │   ├── Controller.php         ← Base controller
│   │   │   ├── PostController.php     ← Blog: list, show posts
│   │   │   ├── ProfileController.php  ← User profile: edit, update, delete
│   │   │   ├── MediaController.php    ← Serve video files
│   │   │   ├── Admin/
│   │   │   │   └── AdminPostController.php  ← Admin: CRUD blog posts
│   │   │   └── Auth/                  ← Laravel Breeze auth controllers
│   │   ├── Middleware/
│   │   │   └── AdminMiddleware.php    ← Admin-only access check
│   │   └── Requests/
│   │       └── ProfileUpdateRequest.php  ← Profile form validation
│   ├── Models/
│   │   ├── Post.php                   ← Blog post model (posts table)
│   │   └── User.php                   ← User model (users table)
│   ├── Providers/
│   │   └── AppServiceProvider.php     ← App service binding
│   └── View/
│       └── Components/                ← Blade components (buttons, inputs, etc.)
│
├── bootstrap/                         ← Laravel bootstrap files
│   └── app.php                        ← App bootstrap
│
├── config/                            ← Laravel config files
│   ├── app.php                        ← App name, timezone, debug, URL
│   ├── auth.php                       ← Authentication config
│   ├── cache.php                      ← Cache driver config
│   ├── database.php                   ← Database connections
│   ├── filesystems.php                ← File storage disks (local, public, s3)
│   ├── logging.php                    ← Log channels
│   ├── mail.php                       ← Mail config
│   ├── queue.php                      ← Queue config
│   ├── services.php                   ← Third-party service keys
│   ├── session.php                    ← Session config
│   └── view.php                       ← View paths
│
├── database/                          ← Database files
│   ├── database.sqlite                ← SQLite database file (actual data)
│   ├── .gitignore                     ← Ignore sqlite in git
│   ├── data/
│   │   ├── real-posts.json            ← 7 real blog posts (JSON data)
│   │   └── posts-before-real-import.sql ← SQL backup before import
│   ├── factories/
│   │   ├── PostFactory.php            ← Fake post generator for testing
│   │   └── UserFactory.php            ← Fake user generator for testing
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2026_08_03_093829_create_posts_table.php
│   │   └── 2026_08_03_105247_add_is_admin_to_users_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php         ← Main seeder runner
│       ├── PostSeeder.php             ← Seed posts
│       └── RealPostSeeder.php         ← Import real posts from JSON
│
├── routes/                            ← URL routing
│   ├── web.php                        ← Main web routes (home, blog, admin, auth)
│   ├── auth.php                       ← Authentication routes (login, register, etc.)
│   └── console.php                    ← Artisan command routes
│
├── resources/                         ← Frontend assets (uncompiled)
│   ├── css/
│   │   ├── app.css                    ← Main app CSS (Tailwind-based)
│   │   ├── blog.css                   ← Blog-specific styles
│   │   └── kv.css                     ← Main redesign CSS (design system)
│   ├── js/
│   │   ├── app.js                     ← Main app JS entry
│   │   ├── bootstrap.js               ← Bootstrap/axios setup
│   │   ├── kv.js                      ← Main interactions (modals, carousels, forms)
│   │   ├── kv-motion.js               ← Scroll reveal animations
│   │   └── blog.js                    ← Blog sidebar enquiry form
│   └── views/                         ← Blade templates
│       ├── welcome.blade.php          ← Home page
│       ├── about.blade.php            ← About page
│       ├── amenities.blade.php        ← Amenities page
│       ├── pricing.blade.php          ← Pricing page
│       ├── pp.blade.php               ← Privacy policy
│       ├── tc.blade.php               ← Terms & conditions
│       ├── dashboard.blade.php        ← User dashboard
│       ├── errors/
│       │   └── 404.blade.php          ← 404 error page
│       ├── layouts/
│       │   ├── kv.blade.php           ← Main layout (used by redesign pages)
│       │   ├── app.blade.php          ← Auth layout
│       │   ├── guest.blade.php        ← Guest layout
│       │   ├── navigation.blade.php   ← Navigation partial
│       │   └── public.blade.php       ← Legacy static page layout
│       ├── partials/
│       │   └── kv/                    ← Redesign partials (header, footer, rail, etc.)
│       ├── components/                ← Blade components
│       ├── admin/
│       │   └── posts/                 ← Admin blog post views
│       ├── posts/
│       │   ├── index.blade.php        ← Blog listing page
│       │   └── show.blade.php         ← Single blog post page
│       ├── auth/                      ← Login, register, password reset
│       └── profile/                   ← Profile edit
│
├── public/                            ← Publicly accessible files (compiled assets)
│   ├── index.php                      ← Laravel front controller (entry point)
│   ├── .htaccess                      ← Apache config
│   ├── assets/                        ← Images, videos, fonts
│   │   ├── img/                       ← Images (hero, plots, blog, etc.)
│   │   ├── video/                     ← Video files
│   │   ├── favicon.svg                ← Site favicon
│   │   └── ...                        ← Other static assets
│   ├── build/                         ← Compiled CSS/JS (Vite output)
│   │   ├── app-CPfjVtVs.css           ← Compiled app CSS
│   │   ├── kv-*.css                   ← Compiled kv CSS
│   │   ├── app-*.js                   ← Compiled app JS
│   │   └── manifest.json              ← Asset manifest (hash mapping)
│   └── storage/                       ← Symlink to storage/app/public (user uploads)
│       └── blog_images/               ← Uploaded blog post images
│
├── storage/                           ← Laravel storage (logs, cache, uploads)
│   ├── app/
│   │   └── public/                    ← Public uploads (blog images)
│   ├── framework/
│   │   ├── cache/                     ← Cache files
│   │   ├── sessions/                  ← Session files
│   │   └── views/                     ← Compiled Blade views
│   └── logs/
│       └── laravel.log                ← Laravel error log (DEBUG HERE!)
│
├── tests/                             ← PHP tests
│   └── ...
│
├── tools/                             ← Misc tools
│   └── ...
│
└── vendor/                            ← Composer PHP dependencies (do not edit)
```

---

## DIRECTORY-BY-DIRECTORY BREAKDOWN

### 1. `app/` — PHP Application Code

This is where your PHP logic lives. Follows MVC pattern.

**`app/Models/`** — Database table representations:
- `Post.php` → maps to `posts` table. Has fillable fields: title, slug, content, image, is_published, etc.
- `User.php` → maps to `users` table. Has fillable: name, email, password, is_admin

**`app/Http/Controllers/`** — Request handlers:
Each method handles one HTTP request. Returns a view, redirect, or response.

**`app/Http/Middleware/`** — Filters that run before/after requests:
- `AdminMiddleware.php` — checks `auth()->check() && auth()->user()->is_admin`. If not admin, aborts with 403.

**`app/Http/Requests/`** — Form request validation:
- `ProfileUpdateRequest.php` — validation rules for profile updates.

### 2. `routes/` — URL Definitions

**`routes/web.php`** — This is the most important file for understanding page URLs.

Key routes:
```php
Route::get('/', fn() => view('welcome'));                                    // Home page
Route::get('/about', fn() => view('about'))->name('about');                 // About
Route::get('/amenities', fn() => view('amenities'))->name('amenities');     // Amenities
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');  // Blog list
Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show'); // Single post
Route::middleware(['auth','admin'])->prefix('admin')->group(fn() => {
    Route::resource('posts', AdminPostController::class);                    // Admin CRUD
});
```

**How to read a route:**
- `Route::get('/blog', ...)` — When someone visits `/blog`, run the closure/controller
- `->name('posts.index')` — Gives this route a name so you can use `route('posts.index')` in Blade
- `[PostController::class, 'index']` — Run the `index()` method on `PostController`

### 3. `resources/views/` — Blade Templates

These are HTML files with PHP-like directives. Extension: `.blade.php`

**Layout files** (wrappers used by multiple pages):
- `layouts/kv.blade.php` — Main layout for redesign pages. Contains `<head>`, header, footer, modals, and `@yield('content')` where page content goes.
- `layouts/public.blade.php` — Legacy layout for older static pages.
- `layouts/app.blade.php` — Auth layout (login/register).

**Page files** (extend a layout):
- `welcome.blade.php` — Home page (most complex — hero, plots, blogs, map, etc.)
- `about.blade.php`, `amenities.blade.php`, `pricing.blade.php`, `pp.blade.php`, `tc.blade.php`
- `posts/index.blade.php` — Blog listing
- `posts/show.blade.php` — Single blog post
- `admin/posts/*.blade.php` — Admin blog management
- `auth/*.blade.php` — Login, register, password reset
- `profile/edit.blade.php` — Profile edit

### 4. `resources/css/` — Stylesheets

- `kv.css` — Main redesign CSS (2000+ lines). Contains CSS variables (tokens) at the top, then component styles.
- `blog.css` — Blog-specific styles.
- `app.css` — Tailwind-based app CSS.

### 5. `resources/js/` — JavaScript

- `kv.js` — Main interactions file (700+ lines). Handles modals, carousels, forms, lightbox, etc.
- `kv-motion.js` — Scroll reveal animations.
- `blog.js` — Blog page sidebar form.
- `app.js` — App entry point.
- `bootstrap.js` — Sets up axios and other globals.

### 6. `database/` — Database Files

- `database.sqlite` — The actual SQLite database file.
- `migrations/*.php` — PHP files that create/modify database tables. Run with `php artisan migrate`.
- `seeders/*.php` — PHP files that insert data. Run with `php artisan db:seed`.
- `data/real-posts.json` — JSON file with 7 real blog posts used for seeding.

### 7. `public/` — Publicly Accessible Files

- `index.php` — Laravel's front controller. Every web request goes through here first.
- `assets/` — Images, videos, favicons.
- `build/` — Compiled CSS and JS from Vite. Files have hash names (e.g., `kv-xxx.css`).
- `storage/` — Symlink to `storage/app/public/`. User-uploaded files (blog images) live here.

### 8. `storage/` — Laravel Internal Storage

- `logs/laravel.log` — **ERROR LOG**. If something breaks on the server, check here first.
- `framework/views/` — Compiled Blade views (cached PHP).
- `framework/cache/` — Cache files.
- `app/public/` — Where uploaded files are stored (symlinked to `public/storage`).

---

## KEY FILE: WHAT EACH CONTAINS & WHAT IT DOES

### `resources/views/layouts/kv.blade.php` — THE MASTER LAYOUT

This is the skeleton every redesign page uses. Key parts:

```html
<!DOCTYPE html>
<html>
<head>
  <!-- Meta tags, fonts, favicons -->
  @vite(['resources/css/kv.css', 'resources/js/kv.js'])  <!-- Loads CSS & JS -->
  @yield('head')  <!-- Child views inject extra head content here -->
</head>
<body class="kv">
  @include('partials.kv.topbar')      <!-- Top bar -->
  @include('partials.kv.header', [...])  <!-- Navigation header -->
  
  <main id="main">
    @yield('content')  <!-- PAGE CONTENT GOES HERE -->
  </main>
  
  @include('partials.kv.rail')        <!-- Floating enquiry button -->
  @include('partials.kv.footer')      <!-- Footer -->
  @include('partials.kv.drawer')      <!-- Mobile drawer -->
  
  <!-- Modals (enquiry, unlock, brochure, lightbox) -->
  <div class="kv-modal" id="kvModal-enquiry">...</div>
  <div class="kv-modal" id="kvModal-unlock">...</div>
  
  @stack('scripts')  <!-- Child views inject scripts here -->
</body>
</html>
```

**To add a new page using this layout:**
1. Create a new `.blade.php` file in `resources/views/`
2. Start it with `@extends('layouts.kv')`
3. Define `@section('title')`, `@section('description')`, `@section('content')`
4. Add a route in `routes/web.php`

### `resources/views/welcome.blade.php` — HOME PAGE

The most complex view. Contains:
- JSON-LD schema markup (SEO) in `@section('head')`
- Hero section with 3+ image slides
- Plot options section (111, 125, 139 sq. yd cards)
- Blog section with featured post + carousel
- Map section with Google Maps iframe
- Reviews section
- Contact section

The blog data is prepared inline with `@php`:
```php
$posts = \App\Models\Post::where('is_published', true)->latest('updated_at')->take(5)->get();
$featured = $posts->first();
$cards = $posts->slice(1)->values();
```

### `app/Http/Controllers/PostController.php` — BLOG LOGIC

- `index()`: Gets 9 published posts per page, returns `posts.index` view
- `show(Post $post)`: Route model binding — Laravel automatically finds the post by slug. If not published, aborts 404. Prepares content (adds heading IDs, builds table of contents), finds prev/next posts, finds 3 related posts.

### `resources/js/kv.js` — FRONTEND INTERACTIONS

Loaded on every page via `@vite`. Key sections:
1. **Helpers** — `$(sel)` and `$$(sel)` shortcuts
2. **Drawer** — Mobile menu open/close
3. **Hero carousel** — Auto-rotating hero images
4. **Reveal** — IntersectionObserver scroll animations
5. **Modals** — `openModal(key)`, `closeModal(modal)`, auto-open enquiry after 5s
6. **Forms** — Enquiry form validation + `fetch()` POST to CRM endpoint
7. **FAQ** — Accordion toggle
8. **Carousels** — Generic carousel with prev/next/dots
9. **Blog slider** — Featured blog with background image sync
10. **Review expand** — Read more/less
11. **Gallery lightbox** — Click to enlarge images
12. **Gallery film** — Video player with seek bar
13. **Location crown** — Toggle panel with position sync
14. **Reading progress bar** — Scroll progress on blog pages
15. **Table of contents** — Active heading highlighting
16. **Clipboard copy** — Copy link to clipboard

### `resources/css/kv.css` — DESIGN SYSTEM

**CSS Variables (tokens) at top:**
```css
:root {
  --kv-olive: #313922;          /* Primary green */
  --kv-cream: #ebe4cc;          /* Background cream */
  --kv-gold: #c0a42a;           /* Accent gold */
  --kv-ink: #232b1b;            /* Text dark */
  --kv-font-display: 'Poppins', sans-serif;  /* Only font used */
  --kv-shadow: 0 24px 60px rgba(20,26,16,.22);
}
```

**Key component classes:**
- `.kv-modal` — Modal overlay (fixed, inset:0, z-index:120)
- `.kv-modal__box` — Modal content box
- `.kv-modal--opening` — Animation class (added by JS on open)
- `.kv-rail` — Floating enquiry button
- `.kv-hero` — Hero section
- `.kv-plot__crown` — Crown shape on plot cards
- `.kv-post__crown` — Crown shape on blog post cards
- `.kv-btn` — Button style

---

## HOW A REQUEST FLOWS THROUGH THE APP

**Example: User visits `/blog/best-places-for-second-home-in-india`**

1. **Browser** sends HTTP GET request to `/blog/best-places-for-second-home-in-india`
2. **`public/index.php`** (Laravel front controller) receives the request
3. **`routes/web.php`** matches: `Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show')`
4. **Route Model Binding**: Laravel automatically queries `Post` where `slug = 'best-places-for-second-home-in-india'` and injects the `$post` object into the controller method
5. **`PostController::show()`** runs:
   - Checks `$post->is_published` — if false, `abort(404)`
   - Calls `$this->prepareContent($post->content)` — adds IDs to H2s, builds table of contents
   - Calculates read time
   - Finds prev/next posts and related posts
   - Returns `view('posts.show', compact('post', 'content', 'toc', ...))`
6. **`resources/views/posts/show.blade.php`** renders the HTML using the layout
7. **Browser** receives complete HTML page

**Example: User visits `/` (home page)**

1. **`routes/web.php`** matches: `Route::get('/', fn() => view('welcome'))`
2. **`welcome.blade.php`** extends `layouts.kv`
3. Inside `@section('content')`, there's inline `@php` that queries posts:
   ```php
   $posts = \App\Models\Post::where('is_published', true)->latest('updated_at')->take(5)->get();
   ```
4. If database is unavailable, this will throw a 500 error (see debugging section)
5. The full page HTML (hero, plots, blogs, map, etc.) is rendered and sent

---

## BLADE TEMPLATES EXPLAINED (FOR NON-LARAVEL DEVS)

Blade is Laravel's templating engine. It looks like HTML but has special directives:

### Basic Syntax

```blade
{{ $variable }}          <!-- Echo escaped HTML (safe) -->
{!! $variable !!}        <!-- Echo raw HTML (dangerous if user input) -->
@if($condition)          <!-- PHP if -->
  <p>Yes</p>
@else
  <p>No</p>
@endif

@foreach($items as $item)  <!-- PHP foreach -->
  <li>{{ $item->name }}</li>
@endforeach

@forelse($items as $item)  <!-- Loop with empty fallback -->
  <li>{{ $item->name }}</li>
@empty
  <p>No items found.</p>
@endforelse

@include('partials.name')  <!-- Include another Blade file -->
@extends('layouts.name')   <!-- Use a layout as parent -->
@section('content')        <!-- Define a section -->
  <h1>Page Content</h1>
@endsection
@yield('content')          <!-- Render a section from child view -->
```

### In `welcome.blade.php`, the `@php` block runs raw PHP:

```blade
@php
  $posts = \App\Models\Post::where('is_published', true)->latest('updated_at')->take(5)->get();
  $featured = $posts->first();
  $cards = $posts->slice(1)->values();
@endphp
```

This queries the database directly inside the view. **This is not best practice** (logic should be in a controller), but it's how this project works.

---

## DATABASE, MODELS & MIGRATIONS

### Database: SQLite

File: `database/database.sqlite`  
No separate database server needed. The `.sqlite` file contains all data.

### Migrations (create tables)

Migration files are in `database/migrations/`. Each has `up()` (create/modify) and `down()` (rollback).

**`2026_08_03_093829_create_posts_table.php`** creates:
```php
$table->id();                          // auto-increment ID
$table->string('title');               // post title
$table->string('slug')->unique();      // URL-friendly slug (unique)
$table->text('meta_description')->nullable();
$table->longText('content');           // post body HTML
$table->string('image')->nullable();   // image path
$table->boolean('is_published')->default(false);
$table->timestamps();                  // created_at, updated_at
```

**`2026_08_03_105247_add_is_admin_to_users_table.php`** adds:
```php
$table->boolean('is_admin')->default(false);
```

### Models

**`Post.php`** (`app/Models/Post.php`):
```php
protected $fillable = ['title', 'slug', 'content', 'image', 'is_published', ...];
protected $casts = ['is_published' => 'boolean'];
public function getRouteKeyName(): string { return 'slug'; }  // URL uses slug, not ID
```

**`User.php`** (`app/Models/User.php`):
```php
protected $fillable = ['name', 'email', 'password', 'is_admin'];
protected $hidden = ['password', 'remember_token'];
protected function casts() { return ['email_verified_at' => 'datetime', 'password' => 'hashed', 'is_admin' => 'boolean']; }
```

### Running Database Commands

| Command | What it does |
|---------|-------------|
| `php artisan migrate` | Run all pending migrations (create tables) |
| `php artisan migrate:rollback` | Undo last migration |
| `php artisan migrate:fresh` | Drop all tables and re-run migrations |
| `php artisan db:seed` | Run seeders (insert data) |
| `php artisan make:model Post` | Create a new model |
| `php artisan make:migration create_posts_table` | Create a new migration |

---

## JAVASCRIPT — kv.js BREAKDOWN

File: `resources/js/kv.js` (713 lines, vanilla JS, no frameworks)

### Entry Point
The file is wrapped in an IIFE `(function(){ 'use strict'; ... })();` so variables don't leak globally.

### Key Sections

**1. Helpers (lines 14-15)**
```js
function $(sel, ctx) { return (ctx || document).querySelector(sel); }
function $$(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }
```
`$()` = `querySelector` (single element)  
`$$()` = `querySelectorAll` (returns array of elements)

**2. Modals (lines 107-129)**
```js
function openModal(key) {
  var modal = $('#kvModal-' + key);  // finds <div id="kvModal-enquiry">
  modal.classList.add('is-open');    // CSS shows it
  modal.removeAttribute('aria-hidden');
  document.body.classList.add('is-locked');  // stops background scroll
  modal.classList.add('kv-modal--opening');  // triggers pop animation
  setTimeout(function() { modal.classList.remove('kv-modal--opening'); }, 500);
}
function closeModal(modal) {
  modal.classList.remove('is-open');
  modal.setAttribute('aria-hidden', 'true');
  if (modal.id === 'kvModal-enquiry') enquiryDismissed = true;
}
```

**3. Auto-open enquiry (lines 131-138)**
```js
var enquiryDismissed = false;
(function autoOpenEnquiry() {
  if (enquiryDismissed) return;
  setTimeout(function() { openModal('enquiry'); }, 5000);  // 5 seconds
})();
```
- Shows enquiry modal 5 seconds after page load
- If user closes it, `enquiryDismissed = true` and it won't show again on that page
- **Resets on page reload** (variable is in memory, not localStorage)

**4. Form submission (lines 215-257)**
```js
$$('form[data-kv-form]').forEach(function (form) {
  form.addEventListener('submit', function (e) {
    e.preventDefault();  // Stop normal form submission
    if (!validate(form)) return;  // Client-side validation
    
    var data = new FormData();  // Collect form fields
    data.append('name', ...);
    data.append('email', ...);
    data.append('mobile', ...);
    data.append('message', ...);
    data.append('source', ...);
    
    fetch(CRM_ENDPOINT, {  // Send to external CRM
      method: 'POST',
      body: data,
      headers: { Accept: 'application/json' }
    })
    .then(function(res) { /* success */ })
    .catch(function() { /* error */ });
  });
});
```

**5. Carousel system (lines 277-317)**
Generic carousel with `data-carousel` attribute. Handles prev/next buttons, dots, scroll sync, and disabled states at edges.

**6. Blog slider (lines 320-445)**
Specialized carousel for blog section. Syncs featured content (title, copy, URL) with background image changes.

**7. Gallery film (lines 489-562)**
Inline video player with play/pause, seek bar, time display, and keyboard/mouse controls.

---

## CSS — kv.css BREAKDOWN

File: `resources/css/kv.css` (2071 lines)

### Structure
1. **CSS Variables** (lines 7-36) — Design tokens
2. **Base styles** (lines 38-50) — Reset, body, typography
3. **Component styles** — Hero, plots, blog, amenities, modal, etc.
4. **Media queries** — Responsive styles at `max-width: 1180px`, `1024px`, `720px`, `420px`, `400px`

### Key Classes & Their Purpose

| Class | Element | Purpose |
|-------|---------|---------|
| `.kv-modal` | Overlay | Fixed full-screen background, z-index:120 |
| `.kv-modal__box` | Content box | Cream background, rounded, shadow |
| `.kv-modal--opening` | Animation state | Added by JS, triggers pop keyframe |
| `.kv-rail` | Floating button | Fixed position enquiry button |
| `.kv-hero` | Hero section | Full-width hero with slides |
| `.kv-plot__crown` | Crown shape | Decorative crown on plot cards |
| `.kv-post__crown` | Crown shape | Decorative crown on blog cards |
| `.kv-btn` | Button | Olive/dark button style |
| `.kv-plot` | Plot card | Individual plot option card |

### How to Modify Colors

Change the variables at the top of `kv.css`:
```css
:root {
  --kv-olive: #313922;       /* Primary green - change this for brand color */
  --kv-cream: #ebe4cc;       /* Background */
  --kv-gold: #c0a42a;        /* Accent */
}
```

### Responsive Breakpoints

| Max Width | What changes |
|-----------|-------------|
| 1180px | Container padding |
| 1024px | Grid columns reduce |
| 720px | Mobile layout (stacked, single column) |
| 420px | Extra small screens |
| 400px | Tiny screens |

---

## COMMON BUGS & HOW TO DEBUG MANUALLY

### Bug 1: 500 Error on Home Page (Database not available)

**Symptom:** White screen or 500 error when visiting `/`

**Cause:** `welcome.blade.php` runs `$posts = \App\Models\Post::where(...)->get()` which requires a database connection. If the database isn't set up, it crashes.

**Fix:**
1. Check `storage/logs/laravel.log` for the exact error
2. Run `php artisan migrate` to create tables
3. Run `php artisan db:seed` to insert data
4. Or wrap the query in try/catch (as was done temporarily)

**Manual debug steps:**
```bash
# Check if database file exists
ls -la database/database.sqlite

# Check the error log
tail -50 storage/logs/laravel.log

# Try running migrations
php artisan migrate --force

# Seed data
php artisan db:seed --class=RealPostSeeder
```

### Bug 2: Images Not Loading

**Symptom:** Broken image icons on production/static hosting

**Cause:** Images stored in `storage/app/public/` but `public/storage` symlink doesn't exist on static hosting.

**Fix:**
1. Check if `public/storage` is a symlink: `ls -la public/storage`
2. If not, create it: `ln -s ../storage/app/public public/storage`
3. Or use images directly from `public/assets/img/` instead of `storage/`

### Bug 3: Modal Not Opening

**Symptom:** Clicking enquiry button does nothing

**Debug steps:**
1. Open browser DevTools (F12) → Console tab
2. Check for JavaScript errors
3. Verify `data-kv-open="enquiry"` attribute exists on the button
4. Verify `kvModal-enquiry` ID exists in the HTML
5. Check if `kv.js` is loaded (Network tab → look for `kv-*.js`)
6. Add `console.log('clicked')` temporarily in the click handler to confirm it fires

### Bug 4: CSS Changes Not Showing

**Symptom:** Edited `kv.css` but website looks the same

**Cause:** Vite compiles CSS to `public/build/kv-*.css` with hash names. The browser loads the compiled file, not the source.

**Fix:**
1. Run `npm run build` to recompile
2. Or run `npm run dev` for auto-rebuild during development
3. Clear browser cache (Ctrl+F5 or Cmd+Shift+R)

### Bug 5: Route Not Found (404)

**Symptom:** Page not found when visiting a URL

**Debug steps:**
1. Check `routes/web.php` — does the route exist?
2. Run `php artisan route:list` to see all registered routes
3. Check if the route name matches what's used in Blade (`route('name')`)
4. Check if middleware is blocking access (e.g., `auth`, `admin`)

### Bug 6: Blog Posts Not Showing

**Symptom:** Blog section empty or showing only fallback card

**Cause:** No published posts in database, or `is_published` is false.

**Fix:**
1. Check database: `php artisan tinker` → `App\Models\Post::where('is_published', true)->count()`
2. Seed posts: `php artisan db:seed --class=RealPostSeeder`
3. Check the `@forelse` / `@empty` block in `welcome.blade.php` lines 483-512

---

## LARAVEL COMMANDS CHEAT SHEET

| Command | Purpose |
|---------|---------|
| `php artisan serve` | Start development server (http://localhost:8000) |
| `php artisan migrate` | Run database migrations |
| `php artisan migrate:refresh` | Rollback and re-run all migrations |
| `php artisan db:seed` | Run database seeders |
| `php artisan route:list` | List all registered routes |
| `php artisan tinker` | Interactive PHP shell (try database queries) |
| `php artisan make:controller NameController` | Create a controller |
| `php artisan make:model Name` | Create a model |
| `php artisan make:migration create_table_name` | Create a migration |
| `php artisan config:cache` | Cache config for production |
| `php artisan view:cache` | Cache Blade views for production |
| `npm run dev` | Start Vite dev server (auto-rebuild CSS/JS) |
| `npm run build` | Build CSS/JS for production |
| `tail -f storage/logs/laravel.log` | Watch error log in real-time |

---

## CONFIGURATION REFERENCE

### `.env` — Environment Variables
Critical settings in `.env`:
```
APP_NAME="The Koru Ville"
APP_ENV=production
APP_DEBUG=false          ← Set to true to see detailed errors
APP_URL=https://thekoruville.com

DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database/database.sqlite
```

**To see detailed error messages:** Set `APP_DEBUG=true` in `.env`

### `config/database.php`
Uses SQLite by default. Connection named `sqlite` points to `database/database.sqlite`.

### `config/app.php`
- `timezone` — Set to `'Asia/Kolkata'` for Indian time
- `locale` — `'en'`
- `debug` — Comes from `APP_DEBUG` env var

---

## QUICK REFERENCE — DATA FLOW FOR EACH PAGE

### Home Page (`/`)
1. Route: `Route::get('/', fn() => view('welcome'))`
2. View: `resources/views/welcome.blade.php` extends `layouts.kv`
3. Data: Inline `@php` queries `Post` model directly
4. Layout: `resources/views/layouts/kv.blade.php` renders header, content, footer, modals

### Blog Listing (`/blog`)
1. Route: `Route::get('/blog', [PostController::class, 'index'])`
2. Controller: `PostController::index()` → paginates 9 posts
3. View: `resources/views/posts/index.blade.php`

### Single Blog Post (`/blog/{slug}`)
1. Route: `Route::get('/blog/{post}', [PostController::class, 'show'])`
2. Route model binding: Laravel finds Post by slug automatically
3. Controller: `PostController::show()` → prepares content, finds prev/next/related
4. View: `resources/views/posts/show.blade.php`

### Admin Blog CRUD (`/admin/posts/*`)
1. Route group with `auth` + `admin` middleware
2. Controller: `AdminPostController` — 7 RESTful methods
3. Views: `resources/views/admin/posts/*.blade.php`

### Static Pages (`/about`, `/amenities`, `/pricing`, etc.)
1. Route: `Route::get('/about', fn() => view('about'))->name('about')`
2. View: `resources/views/about.blade.php` extends `layouts.kv`

---

## HOW TO DEBUG WITHOUT AI (STEP-BY-STEP)

### Step 1: Check the Error Log
```bash
tail -100 storage/logs/laravel.log
```
This tells you exactly what file, line, and error occurred.

### Step 2: Enable Detailed Errors
Edit `.env`:
```
APP_DEBUG=true
```
Then refresh the page — Laravel will show a detailed error screen.

### Step 3: Check the Browser Console
Press F12 → Console tab. Look for red JavaScript errors.

### Step 4: Check Network Tab
Press F12 → Network tab. Refresh. Look for failed requests (red rows).

### Step 5: Verify Routes
```bash
php artisan route:list
```
Confirms your URL matches a defined route.

### Step 6: Verify Database
```bash
php artisan tinker
>>> App\Models\Post::where('is_published', true)->count()
>>> exit
```

### Step 7: Clear Caches
```bash
php artisan config:clear
php artisan view:clear
php artisan route:clear
npm run build  # Rebuild CSS/JS
```

### Step 8: Check File Permissions
```bash
chmod -R 777 storage/  # If on Linux server
```

---

## IMPORTANT FILES TO REMEMBER

| File | Why it matters |
|------|---------------|
| `routes/web.php` | All URLs defined here — first place to check for routing issues |
| `resources/views/layouts/kv.blade.php` | Master layout — contains modals, header, footer, JS/CSS loading |
| `resources/views/welcome.blade.php` | Home page — most complex view |
| `resources/js/kv.js` | All frontend interactions — modals, forms, carousels |
| `resources/css/kv.css` | All styling — change colors, spacing, responsive behavior here |
| `app/Models/Post.php` | Blog post database model |
| `app/Http/Controllers/PostController.php` | Blog controller logic |
| `storage/logs/laravel.log` | Error log — check first when something breaks |
| `.env` | Environment configuration — APP_DEBUG, DB connection |
| `composer.json` | PHP dependencies |
| `package.json` | NPM dependencies and build scripts |

---

## FINAL TIPS FOR MANUAL DEBUGGING

1. **Always check `storage/logs/laravel.log` first** — it tells you the exact error
2. **Set `APP_DEBUG=true` in `.env`** when developing to see detailed errors
3. **Run `npm run build` after CSS/JS changes** — source files aren't served directly
4. **Run `php artisan route:list`** to verify your URLs are registered
5. **Use `php artisan tinker`** to test database queries interactively
6. **Blade views are cached** — run `php artisan view:clear` if template changes don't show
7. **The `public/storage` symlink** must exist for uploaded images to work on production
8. **SQLite database file** is at `database/database.sqlite` — if missing, run migrations

---

*End of learnings.md — Keep this file in the project root for reference.*
