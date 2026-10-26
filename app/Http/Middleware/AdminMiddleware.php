<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in AND is an admin
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized access. Admins only.');
        }

        return $next($request);
    }
}