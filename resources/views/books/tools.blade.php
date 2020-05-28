@extends('layouts/app')
@section('content')

<main>

    <section class="tools mt-3">
        @if(session('export'))
        <p class="message ml-3"> {{ session('export',' ')}} </p>
        @endif
        <div class="tools__dropdown">

            <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
            <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('images/upload.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Export book to Spotify</label>
            <div class="dropdown__hidden">
                <div class="dropdown__content">
                    <form method="POST" class="" action="{{ route('export',  $book) }}">
                        @csrf
                        <div class="form-group">
                            <label for="spotify_name">name your Spotify playlist</label>
                            <input type="text" class="form-control" name="spotify_name" placeholder="Enter name" value="{{ old('name') ?? $book->name }}">
                            @error('spotify_name')<p>{{ $errors->first('spotify_name') }}</p>@enderror
                            <p class="mt-3">This upload will create a new private playlist within your Spotify account using the song titles. It will not share photos and other information from this app. </p>
                            <a class="btn btn_cancel" href="{{ route('books.index') }}">Cancel</a>
                            <button type="submit" class="btn  btn_save">Create playlist</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="tools__dropdown">

            <input id="tools__dropdown2" class="dropdown__toggle" type="checkbox">
            <label for="tools__dropdown2" class="dropdown__label"><img src={{ asset('images/download.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Import playlist from Spotify</label>
            <div class="dropdown__hidden">
                <div class="dropdown__content">
                    <form method="POST" class="" action="{{ url("/books/search/playlist") }}">
                        <div class="input-group input-group-append input-group-sm">
                            @csrf
                            <input name="q" type="text" class="form-control mt-2" aria-label="Small" aria-describedby="inputGroup-sizing-md" placeholder="Search playlist with Spotify...">
                            <input type="hidden" name="book" value="{{ $book->id }}">
                            <button type="submit" class="btn">
                                <img src="{{ asset('images/search.svg') }}" class="filter-secondary mr-2" width="28" height="28" title="search" alt="">
                            </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <hr>

    </section>
</main> @endsection