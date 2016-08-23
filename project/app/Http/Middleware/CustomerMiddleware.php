<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CustomerMiddleware
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
      // if(!Auth::check())
      //   return redirect(url('/'));
      if(Auth::check() && Auth::user()->accountType != 1){
        if(Auth::user()->accountType == 3)
          return redirect(url('sales'));
        if(Auth::user()->accountType == 2)
          return  redirect(url('products'));
        if(Auth::user()->accountType == 4)
          return  redirect(url('admin'));
      }
        return $next($request);

    }
}
