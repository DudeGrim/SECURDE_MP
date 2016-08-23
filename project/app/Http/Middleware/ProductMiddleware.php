<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProductMiddleware
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
      if(!Auth::check())
        return redirect(url('/'));
      if(Auth::check() && Auth::user()->accountType != 2){
        if(Auth::user()->accountType == 1)
          return redirect(url('/'));
        if(Auth::user()->accountType == 3)
          return  redirect(url('sales'));
        if(Auth::user()->accountType == 4)
          return  redirect(url('admin'));
      }
      if(Auth::user()->accountType == 2){
        // UNCOMMENT IF CHANGE PASSWORD PAGE IS UP
        // if(Auth::user()->created_at == Auth::user()->updated_at)
        //   return redirect(url('changePassword'));
        // else
        return $next($request);
      }
    }
}
