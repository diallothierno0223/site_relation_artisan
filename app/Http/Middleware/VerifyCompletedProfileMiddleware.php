<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\ConstantHelpers;

class VerifyCompletedProfileMiddleware
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
        // dd(auth()->user());
        if(auth()->user()->type_profile == ConstantHelpers::$ARTISANPROFILE){
            if(auth()->user()->completed_profil == 0)
            {
                return redirect()->route('artisan.completProfile');
            }
        }

        
        return $next($request);
        
    }
}
