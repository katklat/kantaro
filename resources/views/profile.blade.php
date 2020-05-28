@extends('layouts/app')
@section('content')

<main>

    <div class="tools__dropdown mt-3">
        @if(session('defaultImage'))
        <p class="message mt-3"> {{ session('defaultImage',' ')}} </p>
        @endif
        <form method="POST" action="{{ route('defaultImage') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input id="tools__image" class="dropdown__toggle" type="checkbox">
            <label for="tools__image" class="dropdown__label"><img src="{{ asset('images/image.svg') }}" class="filter-secondary inline mr-2" width="28" height="28" title="picture" alt="">Default image for books and songs</label>
            <div class="dropdown__hidden">
                <div class="dropdown__content">
                    <div class="input-group">
                        <input onChange="checkFile()" name="defaultImage" id="inputFile" type="file" accept=".png, .jpg, .jpeg, .gif, .svg" class="custom-file-input" aria-describedby="inputGroupImage">
                        <label class="custom-file-label" for="inputFile">Choose image file</label>
                    </div>
                    <div class="mt-4 ">
                        <a onClick="removeFile()" class="btn btn_cancel ml-2 " href="">Cancel</a>
                        <button class="btn btn_save ml-2" type="submit">Upload</button>
                        <button name='delete' onClick="removeFile()" class="btn btn_delete ml-2" type="submit">Remove</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="tools__dropdown">
        <input id="tools__1" class="dropdown__toggle" type="checkbox">
        <label for="tools__1" class="dropdown__label"><img src="{{ asset('images/spotify.svg') }}" class="filter-secondary inline mr-2" width="28" height="28" title="picture" alt="">Link my Spotify account</label>
        <div class="dropdown__hidden">
            <div class="dropdown__content">
                <div class="mt-4 ">
                    <label for="now">Click here to get more information about the Spotify access.</label>
                    <a class="btn btn_save mb-4" id="now" href="{{ route('auth') }}">Grant access now</a>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn_delete mt-5"><i class="fa fa-sign-out fa-lg"></i> Logout</button>
    </form>


</main>
@endsection