<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NurseLoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('NRS_SESSION_ID')){
            return redirect('/');
        }
        
        return $next($request);
    }
}
