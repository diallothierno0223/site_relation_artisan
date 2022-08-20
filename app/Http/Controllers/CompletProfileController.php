<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Rules\JobRule;
use Illuminate\Http\Request;
use App\Models\CompletedProfile;

class CompletProfileController extends Controller
{

        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->completed_profil == 1){
            return redirect()->route('dashboard');
        }
        $jobs = Job::all();
        return view('artisan/complet_profile', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->completed_profil == 1){
            return redirect()->route('dashboard');
        }

        $data = $request->validate([
            "job_id" => ["required", new JobRule()],
            "entreprise_name" => ["required"],
            "description" => "required|min:20",
            "photo" => ["required", 'image'],
            "date_naissance" => ["required"],
            "sexe" => ["required"],
            "numero" => ["required"],
            "numero_piece_identite" => ["required"],
            "photo_piece_identite" => ["required", 'image'],
            "pays" => ["required"],
            "ville" => "required",
            "commune" => ["required"],
            "rue" => ["required"],
        ]);

        $photoProfile = $request->file('photo')->store('entreprises');
        $photoPieceIdentite = $request->file('photo_piece_identite')->store('pieceIdentites');

        $data["user_id"] = auth()->user()->id;
        $data["photo"] = $photoProfile;
        $data["photo_piece_identite"] = $photoPieceIdentite;
        
        $complet = CompletedProfile::create($data);
        $user = User::findOrFail(auth()->user()->id);
        $user->completed_profil = 1;
        $user->save();
        return redirect()->route('dashboard');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $jobs = Job::all();
        return view('artisan/update_profile', ['jobs' => $jobs]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->job_id);

        $data = $request->validate([
            "job_id" => ["required", new JobRule()],
            "entreprise_name" => ["required"],
            "description" => "required|min:20",
            "date_naissance" => ["required"],
            "sexe" => ["required"],
            "numero" => ["required"],
            "numero_piece_identite" => ["required"],
            "pays" => ["required"],
            "ville" => "required",
            "commune" => ["required"],
            "rue" => ["required"],
        ]);

        if($request->photo){
            $photoProfile = $request->file('photo')->store('entreprises');
            $data["photo"] = $photoProfile;
        }

        if($request->photo_piece_identite){
            $photoPieceIdentite = $request->file('photo_piece_identite')->store('pieceIdentites');
            $data["photo_piece_identite"] = $photoPieceIdentite;
        }


        $complet = CompletedProfile::where('user_id', '=', auth()->user()->id)->first();
        $complet->update($data);
        return redirect()->route('dashboard');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
