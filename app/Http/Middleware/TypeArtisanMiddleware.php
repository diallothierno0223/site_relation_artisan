<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ConstantHelpers;
use Closure;
use Illuminate\Http\Request;

class TypeArtisanMiddleware
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
        if(auth()->user()->type_profile == ConstantHelpers::$ARTISANPROFILE)
        {
            return $next($request);
        }

        abort(403, 'acces non autorisé');
    }
}
