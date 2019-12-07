<?php

namespace App\Http\Middleware;

use Closure;

class Chef_fil_middleware
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
        if($request->user() && $request->user()->role!='chef_fil'){
            return new Response(view('unauthorized')->with('role', 'CHEF_FIL'));
        }
        return $next($request);
    }
}
