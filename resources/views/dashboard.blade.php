@extends('layouts.master2')
@section('content')

@if(auth()->user()->type_profile == App\Http\Controllers\ConstantHelpers::$ARTISANPROFILE)

    @include('artisan.artisanDashbord')

@endif

@endsection
