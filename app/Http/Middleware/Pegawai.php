<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Pegawai
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
        if(( auth()->guard('pegawais')->user() ) 
            || (Auth::check() && Auth::user()->isAdmin()=='1') ){
            return $next($request);
        }
        return redirect('/pegawai/login');
    }
}
