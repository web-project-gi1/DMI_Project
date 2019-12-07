<?php

namespace App\Http\Middleware;

use Closure;

class Prof_middleware
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
        if($request->user() && $request->user()->role!='prof'){
            return new Response(view('unauthorized')->with('role', 'PROF'));
        }
        return $next($request);
    }
}
