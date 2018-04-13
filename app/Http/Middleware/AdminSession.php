<?php

namespace App\Http\Middleware;

use Closure;

class AdminSession
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
        if($request->session()->has('admin') && $request->session()->has('adminEmail'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/admin');
        }
    }
}
