<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role) 
    {
        if (!$request->user() || $request->user()->role!==$role){
            abort(403, 'Unauthorized');
        }
        // if (!Auth::check() || Auth::user()->role !== $role) {
        //     abort(403);
        // }

        return $next($request);
    }
}
