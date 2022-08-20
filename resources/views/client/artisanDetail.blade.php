@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @if (Session::has('note_success'))
            <div class="col-sm-12 m-2 alert alert-success">
                {{ Session::get('note_success')}}
            </div>
        @endif
        <div class="col"></div>
    </div>
    <div class="row">
        {{-- ----------------------------------------------- --}}
        <div class="container">
            @if (Session::has("success"))
                <div class="alert alert-success">
                    <p>{{Session::get("success")}}</p>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7 col-sm-12 mb-2 m-1">
                    <div class="card shadow-xl">
                        <div class="card-header bg-info">
                            Profile
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <img src="{{asset('storage/'.$user->completedProfile->photo)}}" width="200" height="200" class="img img-circle thumbnail profile-img" alt="profile-image" />
                            </div><hr>
                            <div class="row m-1">
                                <div class="col-md-6 col-sm-12">
                                    <p><strong>Nom et Prenom: </strong> {{$user->name}}</p>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <p><strong>Job : </strong> {{$user->completedProfile->job->labelle}}</p>
                                </div>
                            </div>
                            
                            <div class="row m-1">
                                <div class="col-md-8">
                                    <p><strong>email : </strong> {{$user->email}}</p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <p><strong>pays : </strong> {{$user->completedProfile->pays}}</p>
                                </div>
                            </div>
                            <div class="row m-1">
                                <div class="col-md-12">
                                    <p><strong>numero : </strong> {{$user->completedProfile->numero}}</p>
                                </div>
                            </div>
                            <div class="row m-1">
                                
                                <div class="col-md-4 col-sm-12">
                                    <p><strong>ville : </strong> {{$user->completedProfile->ville}}</p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <p><strong>ville : </strong> {{$user->completedProfile->commune}}</p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <p><strong>rue : </strong> {{$user->completedProfile->rue}}</p>
                                </div>
                            </div>
                            <div class="row m-1 ">
                                <div class="col-md-12 col-sm-12">
                                    <p class="h6 italic text-info"> {{$moyenne }}</p>
                                </div>
                            </div>
                            <div class="row m-1 justify-content-center">
                                <div class="col-md-3 col-sm-12 ">
                                    <strong>description</strong>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p> {{$user->completedProfile->description}}</p>
                                </div>
                            </div><hr>
                            <div class="row justify-content-between">
                                <div class="col-md-6 col-sm-12">
                                    <h6>les Commentaires</h6>
                                    @foreach($user->comments->reverse() as $comment)
                                        <div class="card m-2 shadow-lg bg-white rounded">
                                            <div class="card-body">
                                                <p>{{$comment->comment}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4 col-sm-12 m-1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card bg-white shadow-lg rounded">
                                <div class="card-header bg-primary">
                                    <h3 class="italic h4">contacter moi ici</h3>
                                </div>
                                <div class="card-body">
                                    <a href="https://wa.me/{{$user->completedProfile->numero
                                    }}?text=je%20suis%20intéressé%20par%20vos%20service" class="btn btn-success rounded_pill m-1 col">WhatsApp</a>
                                    <a href="sms:{{$user->completedProfile->numero}}" class="btn btn-outline-primary rounded-pill m-1 col">envoyer un sms</a>
                                    <a href="mailto:{{$user->email}}" class="btn btn-outline-danger rounded-pill m-1 col">envoyer un email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(auth()->user())
                            @if(auth()->user()->type_profile != App\Http\Controllers\ConstantHelpers::$ARTISANPROFILE)
                                <div class="col-sm-12">
                                    <div class="card bg-white shadow-lg rounded my-2">
                                        <div class="card-header bg-primary">
                                            <h3 class="italic h4">laisser une note</h3>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{route('artisan.note', [ 'user' => $user->id ])}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="note">Note /10 </label>
                                                    <input type="number" min="0" max="10" class="form-control" name="note" id="note" placeholder="xx/10" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">Commentaire</label>
                                                    <textarea  rows="3" class="form-control" name="comment" id="comment" placeholder="donner un avis sur l'artisan" ></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary rounded">Envoyer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-danger m-2">
                                    vous devez etre un client pour noter un artisan
                                </div>
                            @endif
                        @else
                            <div class="alert alert-danger m-2">
                                veuillez vous connecter pour noter l'utilisateur :) <br>
                                <a href="{{route('login')}}">connecter vous !</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- -------------------------------------------------- --}}
    </div>
</div>

@endsection