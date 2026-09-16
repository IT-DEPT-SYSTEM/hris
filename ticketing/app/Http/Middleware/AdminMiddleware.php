<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        /*
        |--------------------------------------------------------------------------
        | CHECK LOGIN
        |--------------------------------------------------------------------------
        */

        if (!auth()->check()) {
            return redirect()->route('login');
        }


        /*
        |--------------------------------------------------------------------------
        | CHECK ADMIN ROLE
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access.');
        }


        /*
        |--------------------------------------------------------------------------
        | ALLOW ADMIN
        |--------------------------------------------------------------------------
        */

        return $next($request);
    }
}