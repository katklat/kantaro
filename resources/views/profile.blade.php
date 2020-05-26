@extends('layouts/app')
@section('content')

<main>

    <div class="tools__dropdown">
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
                        <input onChange="checkFile()" name="defaultImage" type="file" accept=".png, .jpg, .jpeg, .gif, .svg" class="custom-file-input" id="inputFile" aria-describedby="inputGroupImage">
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
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn_save ml-2"><i class="fa fa-sign-out fa-lg"></i> Logout</button>
        </form>

    </div>
</main>
@endsection