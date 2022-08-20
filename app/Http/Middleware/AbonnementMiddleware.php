<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\ConstantHelpers;

class AbonnementMiddleware
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
        if(auth()->user()->type_profile == ConstantHelpers::$ARTISANPROFILE){
            if(auth()->user()->abonnement){
                $last = auth()->user()->abonnement;
                $end = Carbon::parse($last->end);
                if($end->isAfter(now()) or $end == now()){
                    return $next($request);
                }
    
                return redirect()->route('artisan.abonnement.index')->with('suscribe_expired', 'votre abonnement a expirer depuis le '. date_format(date_create(auth()->user()->abonnement->end), "d M Y")  .', vous devez le renouveler pour continuer');
            }
            return redirect()->route('artisan.abonnement.index')->with('not_suscribe', 'vous n\'êtes pas abonné, vous devez vous abonné pour continuer');
        }
        return $next($request);
    }
}
