<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\ConstantHelpers;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type_profile' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if(!in_array($data['type_profile'], [ConstantHelpers::$ARTISANPROFILE, ConstantHelpers::$CLIENTPROFILE])){
            return redirect()->back();
        }
        // dd($data);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type_profile' => $request->type_profile,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect()->route('artisan.completProfile');
        // return redirect(RouteServiceProvider::HOME);
    }
}
