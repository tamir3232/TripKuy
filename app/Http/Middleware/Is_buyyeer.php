<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// RouteServiceProvider
class Is_buyyeer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect(RouteServiceProvider::LOGIN);
        }
        if (auth()->user()->role != 1) {
            return redirect(RouteServiceProvider::HOMEADMIN);
        }
        return $next($request);
    }
}
