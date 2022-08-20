<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = auth()->user()->images->reverse();
        $data = ['images' => $images];
        return view('artisan.image', $data);
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'path' => 'required|image'
        ]);
        $image = $request->file('path')->store('images');
        $data['path'] = $image;
        $image = Image::create($data);
        $image->users()->attach(auth()->user()->id);
        return redirect()->back()->with('success', 'image a bien été ajouter a votre catalogue');
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
