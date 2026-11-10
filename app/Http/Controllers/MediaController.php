<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MediaController extends Controller
{
    /**
     * Stream the gallery film from Laravel rather than from the static file.
     *
     * `php artisan serve` (used in production too) answers static files with a
     * plain 200 and no Accept-Ranges header, which makes browsers treat the
     * video as unseekable. BinaryFileResponse honours Range requests, so the
     * inline player's timeline can scrub forwards and backwards.
     */
    public function gallery(): BinaryFileResponse
    {
        $path = public_path('assets/video/gallery.mp4');

        abort_unless(is_file($path), 404);

        $response = response()->file($path, [
            'Content-Type' => 'video/mp4',
            'Cache-Control' => 'public, max-age=604800',
            'X-Content-Type-Options' => 'nosniff',
        ]);

        $response->setAutoEtag();

        return $response;
    }
}
