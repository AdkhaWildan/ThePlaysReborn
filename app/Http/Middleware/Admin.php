<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next)
    {
        if ($request->routeIs('dashboard')) {
            return $next($request);
        }

        if (Auth()->user()->usertype == "admin") {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'Unauthorized Access');
    }
}