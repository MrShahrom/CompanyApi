<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTechnolog
{
    public function handle(Request $request, Closure $next)
    {
        // We can assume that the user is authenticated here,
        // as it is already checked by the 'jwt.auth' middleware in the route group

        if (auth()->user()->role !== 'technolog' && auth()->user()->role !== 'admin') {
            return response("You don't have access", 403);
        }

        return $next($request);
    }
}
