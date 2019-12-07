<?php

namespace App\Http\Middleware;

use Closure;

class Chef_dep_middleware
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
        if($request->user() && $request->user()->role!='chef_dep'){
            return new Response(view('unauthorized')->with('role', 'CHEF_DEP'));
        }
        return $next($request);    }
}
