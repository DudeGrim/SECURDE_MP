<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SaleMiddleware
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
      if(Auth::check() && Auth::user()->accountType != 3){
        if(Auth::user()->accountType == 1)
          return redirect(url('/'));
        if(Auth::user()->accountType == 2)
          return  redirect(url('products'));
        if(Auth::user()->accountType == 4)
          return  redirect(url('admin'));
      }
      if(Auth::user()->accountType == 3){
        if(Auth::user()->created_at == Auth::user()->updated_at)
          return redirect(url('changePassword'));
        return $next($request);
      }
    }
}
