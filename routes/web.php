<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Models\Post;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| STATIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/privacy-policy', function () {
    return view('pp');
});

Route::get('/terms-and-conditions', function () {
    return view('tc');
});


/*
|--------------------------------------------------------------------------
| SITEMAP.XML
|--------------------------------------------------------------------------
|
| Automatically generates:
|
| /
| /blog
| /privacy-policy
| /terms-and-conditions
| /blog/{post}
|
*/

Route::get('/sitemap.xml', function () {

    /*
    |--------------------------------------------------------------------------
    | Get Blog Posts
    |--------------------------------------------------------------------------
    */

    $posts = Post::query()
        ->orderByDesc('updated_at')
        ->get();


    /*
    |--------------------------------------------------------------------------
    | XML START
    |--------------------------------------------------------------------------
    */

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

    $xml .= '<urlset ';
    $xml .= 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
    $xml .= '>' . "\n";


    /*
    |--------------------------------------------------------------------------
    | HOME PAGE
    |--------------------------------------------------------------------------
    */

    $xml .= "    <url>\n";

    $xml .= '        <loc>'
        . htmlspecialchars(
            url('/'),
            ENT_XML1,
            'UTF-8'
        )
        . "</loc>\n";

    $xml .= '        <lastmod>'
        . now()->toAtomString()
        . "</lastmod>\n";

    $xml .= "        <changefreq>daily</changefreq>\n";

    $xml .= "        <priority>1.0000</priority>\n";

    $xml .= "    </url>\n";


    /*
    |--------------------------------------------------------------------------
    | BLOG PAGE
    |--------------------------------------------------------------------------
    */

    $xml .= "    <url>\n";

    $xml .= '        <loc>'
        . htmlspecialchars(
            url('/blog'),
            ENT_XML1,
            'UTF-8'
        )
        . "</loc>\n";

    $xml .= '        <lastmod>'
        . now()->toAtomString()
        . "</lastmod>\n";

    $xml .= "        <changefreq>daily</changefreq>\n";

    $xml .= "        <priority>0.8000</priority>\n";

    $xml .= "    </url>\n";


    /*
    |--------------------------------------------------------------------------
    | PRIVACY POLICY
    |--------------------------------------------------------------------------
    */

    $xml .= "    <url>\n";

    $xml .= '        <loc>'
        . htmlspecialchars(
            url('/privacy-policy'),
            ENT_XML1,
            'UTF-8'
        )
        . "</loc>\n";

    $xml .= '        <lastmod>'
        . now()->toAtomString()
        . "</lastmod>\n";

    $xml .= "        <changefreq>monthly</changefreq>\n";

    $xml .= "        <priority>0.5000</priority>\n";

    $xml .= "    </url>\n";


    /*
    |--------------------------------------------------------------------------
    | TERMS & CONDITIONS
    |--------------------------------------------------------------------------
    */

    $xml .= "    <url>\n";

    $xml .= '        <loc>'
        . htmlspecialchars(
            url('/terms-and-conditions'),
            ENT_XML1,
            'UTF-8'
        )
        . "</loc>\n";

    $xml .= '        <lastmod>'
        . now()->toAtomString()
        . "</lastmod>\n";

    $xml .= "        <changefreq>monthly</changefreq>\n";

    $xml .= "        <priority>0.5000</priority>\n";

    $xml .= "    </url>\n";


    /*
    |--------------------------------------------------------------------------
    | DYNAMIC BLOG POSTS
    |--------------------------------------------------------------------------
    */

    foreach ($posts as $post) {

        /*
        | Generate blog URL
        */
        $postUrl = route('posts.show', $post);


        /*
        | Get post modification date
        */
        $lastModified = $post->updated_at
            ?? $post->created_at
            ?? now();


        /*
        | Start URL
        */
        $xml .= "    <url>\n";


        /*
        | URL
        */
        $xml .= '        <loc>'
            . htmlspecialchars(
                $postUrl,
                ENT_XML1,
                'UTF-8'
            )
            . "</loc>\n";


        /*
        | Last Modified
        */
        $xml .= '        <lastmod>'
            . $lastModified->toAtomString()
            . "</lastmod>\n";


        /*
        | Change Frequency
        */
        $xml .= "        <changefreq>weekly</changefreq>\n";


        /*
        | Priority
        */
        $xml .= "        <priority>0.7000</priority>\n";


        /*
        | Close URL
        */
        $xml .= "    </url>\n";
    }


    /*
    |--------------------------------------------------------------------------
    | CLOSE XML
    |--------------------------------------------------------------------------
    */

    $xml .= '</urlset>';


    /*
    |--------------------------------------------------------------------------
    | RETURN XML
    |--------------------------------------------------------------------------
    */

    return response(
        $xml,
        200,
        [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'X-Content-Type-Options' => 'nosniff'
        ]
    );
});


/*
|--------------------------------------------------------------------------
| BLOG
|--------------------------------------------------------------------------
*/

Route::get('/blog', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/blog/{post}', [PostController::class, 'show'])
    ->name('posts.show');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('posts', AdminPostController::class);

    });


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
