<?php

namespace App\Http\Middleware;

use Closure;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

         $acceptHeader = $request->header('Accept');
        if ($acceptHeader != 'application/json') {
            return response()->json([], 400);
        }

        return $next($request);
    }
}
