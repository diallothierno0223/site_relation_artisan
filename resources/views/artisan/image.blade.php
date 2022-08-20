@extends('layouts.master')

@section('extra_css_js')
<link rel="stylesheet" href="{{ asset('js_and_css/app.css') }}" >

@endsection

@section('content')

<div class="bg-light">
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success mt-3" role="alert">
                <p class="">{{ Session::get('success')}}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-inline p-3 row" method="post" action="{{ route('artisan.image.store') }}" enctype="multipart/form-data"> @csrf
            <input type="file" accept="image/png, image/jpeg, image/jpg" class="col-sm-12 col-md form-control-file mb-2 mr-sm-2" name="path" >

            <input type="text" name="title" class="col-sm-12 col-md form-control mb-2 mr-sm-2" name="path" placeholder="donner un titre a votre imagege">
            
            <button type="submit" class="col-sm-12 col-md btn btn-primary mb-2">ajouter</button>
        </form>
    </div>

    <div class="row justify-content-center bg-light">
        <!-- Trigger the Modal -->

            @foreach ($images as $image)
                <div class="justify-content-center">
                    <img class="zoom myImg m-4 img-thumbnail" id="myImg" alt="{{$image->title}}" src="{{asset('storage/'.$image->path)}}" style="width:auto;height:200px;">
                    <p class="text-center">{{ $image->title }}</p>
                </div>
            @endforeach

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close ">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" style="" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
            
   </div>
</div>

<script>
    // Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementsByClassName("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
Array.from(img).forEach((element) => {
    element.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}
</script>
@endsection