@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($artisans as $artisan)
        {{-- {{dd($artisan)}} --}}
            <div class="col-sm-12 col-md-4 p-2">
                <div class="card bg-light">
                    <div class="card-header bg-primary"><h5 style="color:aliceblue;">{{$artisan->completedProfile->entreprise_name}}</h5></div>
                    <img src="{{ asset('storage/'.$artisan->completedProfile->photo) }}" alt="{{$artisan->completedProfile->entreprise_name}}" class="card-img-top thumbnail" height="310px">
                    <div class="card-body ">
                        <h6 class="card-title italic">{{$artisan->completedProfile->job->labelle}}</h6>
                        <p class="card-text">{{ substr($artisan->completedProfile->description, 0, 100)}}...</p>
                        <a href="{{ route('artisan.detail', ['user' => $artisan->id]) }}" class="btn btn-primary">voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection