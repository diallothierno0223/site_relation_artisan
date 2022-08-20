@extends('layouts.master2')

@section('content')
    <div class="bg-gray-100 ">
        <div class="mx-52  grid justify-items-center">
             {{-- start form   --}}
        <h1 class="my-3 text-black-600 text-2xl">Completé votre inscription</h1>

        <div class="my-3 block p-6 rounded-lg shadow-lg bg-white w-full">
            <form method="post" action="{{ route('artisan.completProfile.store') }}" class="" enctype="multipart/form-data"> @csrf
              <div class="form-group mb-6">
                <label for="entreprise_name" class="form-label inline-block mb-2 text-gray-700">Nom entreprise</label>
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('entreprise_name') border-2 border-rose-600 @enderror " id="entreprise_name" placeholder="nom entreprise" name="entreprise_name" value="{{ old('entreprise_name') }}" >
                @error('entreprise_name')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="photo" class="form-label inline-block mb-2 text-gray-700">photo de profil</label>
                <input accept="image/png, image/jpeg, image/jpg" type="file" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('photo') border-2 border-rose-600 @enderror" id="photo" value="{{ old('photo') }}" name="photo">
                @error('photo')
                    <small class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="date_naissance" class="form-label inline-block mb-2 text-gray-700">Date de naissance</label>
                <input type="date" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('date_naissance') border-2 border-rose-600 @enderror " id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}">
                @error('date_naissance')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="" class="form-label inline-block mb-2 text-gray-700">genre</label>
                <div class="flex @error('sexe') border-2 border-rose-600 @enderror">
                    <div class="">
                        <input type="radio" name="sexe" class="" id="homme" value="homme" {{ old('sexe') == 'homme' ? 'checked' : '' }}/>
                        <label for="homme" class="">homme</label>
                    </div>
                    <div class="mx-3">
                        <input type="radio" name="sexe" class="" id="femme" value="femme" {{ old('sexe') == 'femme' ? 'checked' : '' }}/>
                        <label for="femme" class="">femme</label>
                    </div>
                </div>
                @error('sexe')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="numero" class="form-label inline-block mb-2 text-gray-700">Numero</label>
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('numero') border-2 border-rose-600 @enderror " id="numero" placeholder="+2250102030405" name="numero" value="{{ old('numero') }}">
                @error('numero')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="numero_piece_identite" class="form-label inline-block mb-2 text-gray-700">numero piece identite</label>
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('numero_piece_identite') border-2 border-rose-600 @enderror " id="numero_piece_identite" placeholder="numero de la piece d'identité" name="numero_piece_identite" value="{{ old('numero_piece_identite') }}">
                @error('numero_piece_identite')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="photo_piece_identite" class="form-label inline-block mb-2 text-gray-700">photo piece identite</label>
                <input accept="image/png, image/jpeg, image/jpg" type="file" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('photo_piece_identite') border-2 border-rose-600 @enderror" id="photo_piece_identite" value="{{ old('photo_piece_identite') }}" name="photo_piece_identite">
                @error('photo_piece_identite')
                    <small class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="pays" class="form-label inline-block mb-2 text-gray-700">pays</label>
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('pays') border-2 border-rose-600 @enderror " id="pays" placeholder="cote d'ivoire" name="pays" value="{{ old('pays') }}">
                @error('pays')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="ville" class="form-label inline-block mb-2 text-gray-700">ville</label>
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('ville') border-2 border-rose-600 @enderror " id="ville" placeholder="Abidjan" name="ville" value="{{ old('ville') }}">
                @error('ville')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="commune" class="form-label inline-block mb-2 text-gray-700">commune</label>
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('commune') border-2 border-rose-600 @enderror " id="commune" placeholder="cocody" name="commune" value="{{ old('commune') }}">
                @error('commune')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="rue" class="form-label inline-block mb-2 text-gray-700">rue</label>
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('rue') border-2 border-rose-600 @enderror " id="rue" placeholder="D4" name="rue" value="{{ old('rue') }}">
                @error('rue')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="job" class="form-label inline-block mb-2 text-gray-700">job</label>
                <select class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('job') border-2 border-rose-600 @enderror " id="job" name="job_id">
                    <option value="">veuillez selectionner un job</option>
                    @foreach($jobs as $job)
                        <option value="{{$job->id}}" {{ old('job_id') == $job->id ? 'selected' : '' }}>{{$job->labelle}}</option>
                    @endforeach
                </select>
                @error('job')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-6">
                <label for="description" class="form-label inline-block mb-2 text-gray-700">description</label>
                <textarea rows=5 type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('description') border-2 border-rose-600 @enderror " id="description" placeholder="detail de vos service" name="description" value="{{ old('description') }}"></textarea>
                @error('description')
                    <small  class="block mt-1 text-md text-red-500"> {{ $message }}</small>
                @enderror
              </div>
              <button type="submit" class="
                px-6
                py-2.5
                bg-blue-600
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-blue-700 hover:shadow-lg
                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-blue-800 active:shadow-lg
                transition
                duration-150
                ease-in-out">Enregistrer</button>
            </form>
          </div>

        {{-- end form --}}
        </div>
    </div>
@endsection