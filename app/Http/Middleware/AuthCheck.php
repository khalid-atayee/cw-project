<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()){
            
            if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('organizer') || Auth::user()->hasRole('mentor')|| Auth::user()->hasRole('chapter')){
                return $next($request);

            }
        return redirect()->back();

        }
        return redirect()->back();
    }
}
