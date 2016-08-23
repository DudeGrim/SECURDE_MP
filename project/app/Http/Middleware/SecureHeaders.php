<?php

namespace App\Http\Middleware;

use Closure;

class SecureHeaders
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
           $response = $next($request);

           $response->header('Strict-Transport-Security', 'max-age=31536000, includeSubDomains')
                    ->header('X-Frame-Options','DENY')
                    ->header('X-XSS-Protection','1')
                    ->header('X-Content-Type-Options','nosniff');

           return $response;
       }
}
