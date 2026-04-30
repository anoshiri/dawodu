<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteByApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // list of tokens
        $tokens = config('dawodu.tokens');

        // check if request is from an authorized source
        if (!in_array($request->bearerToken(), array_keys($tokens))) {
            return response()->json(['error' => 'Unauthorized'], 403); 
        }
 
        // set domain_token
        session(['domain' => $tokens[$request->bearerToken()] ]);
        return $next($request);
    }
}
