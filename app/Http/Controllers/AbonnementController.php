<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\ConstantHelpers;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artisan.abonnement');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'formule' => 'required|max:1|in:1,2,3'
        ]);

        /*
        |
        |ici: procedez au payment avnt de continuer :
        |
        */

        $days = intval($data['formule'])*30;
        $amount = ConstantHelpers::$PRICE[$data['formule']];

        if(auth()->user()->abonnement){
            $amount = auth()->user()->abonnement->amount + $amount;
            $end = \Carbon\Carbon::parse(auth()->user()->abonnement->end);
            $abonnement = auth()->user()->abonnement;
            if($end->isAfter(now()) or $end == now()){
                $abonnement->update([
                    'end' => \Carbon\Carbon::parse($end)->add($days, 'day'),
                    'amount' => $amount
                ]);
                return redirect()->route('dashboard')->with('success_pay', 'le payment aété effectuer avec succes');
            } else {
                $abonnement->update([
                    'end' => \Carbon\Carbon::parse(now())->add($days, 'day'),
                    'amount' => $amount
                ]);
                return redirect()->route('dashboard')->with('success_pay', 'le payment aété effectuer avec succes');
            }
        } else {
            $abonnement = Abonnement::create([
                'user_id' => auth()->user()->id,
                'start' => now(),
                'end' => \Carbon\Carbon::parse(now())->add($days, 'day'),
                'amount' => $amount,
            ]);
            return redirect()->route('dashboard')->with('success_pay', 'le payment aété effectuer avec succes');
        }
        dd($data);
    }

    
}
