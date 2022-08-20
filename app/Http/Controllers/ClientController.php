<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ConstantHelpers;
use App\Models\Comment;

class ClientController extends Controller
{
    public function artisanList(){
        $users = User::where('type_profile', '=', ConstantHelpers::$ARTISANPROFILE)->get();
        $all = array();
        foreach($users as $user){
            if($user->abonnement){
                $last = $user->abonnement;
                $end = Carbon::parse($last->end);
                if($end->isAfter(now()) or $end == now()){
                    array_push($all, $user);
                }
            }
        }
        return view('client.artisanList', ['artisans' => $all]);

    }

    public function artisanDetail(User $user){
        if($user->type_profile == ConstantHelpers::$ARTISANPROFILE){
            if($user->abonnement){
                $last = $user->abonnement;
                $end = Carbon::parse($last->end);
                if($end->isAfter(now()) or $end == now()){
                    if($user->comments->count() > 0){
                        $moyenne = $user->name . 'a une note de ' . round(Comment::where('user_id', $user->id)->sum('note') / Comment::where('user_id', $user->id)->count(), 1) .'/10';
                    } else {
                        $moyenne = $user->name . ' n\'a pas été noté';
                    }
                    return view('client.artisanDetail', ['user' => $user, 'moyenne' => $moyenne]);
                }else{
                    return abort(404, 'artisan non abonné');
                }
            }else{
                return abort(404, 'artisan non abonné');
            }
        }else{
            return abort(404, 'artisan inexsistant');
        }
    }
}
