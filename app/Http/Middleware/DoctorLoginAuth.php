<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DoctorLoginAuth
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
        if(!$request->session()->has('DOC_SESSION_ID')){
            return redirect('/');
        }
        
        return $next($request);
    }
}
