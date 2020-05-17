@extends('layouts/app')
@section('content')

<main>

    <section class="tools mt-3">

        <div class="tools__dropdown">

            <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
            <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('images/upload.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Upload list to Spotify</label>
            <div class="dropdown__hidden">
                <div class="dropdown__content">
                    <div class="form-group">
                        <label for="spotify_name">name your Spotify playlist</label>
                        <input type="text" class="form-control" id="spotify_name" placeholder="Enter name">
                        <p class="mt-3">This upload will create a new playlist within your Spotify account using the song titles. It will not share photos and other information from this app. </p>
                        <a class="btn btn_save" href="#">Upload</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="tools__dropdown">

            <input id="tools__dropdown2" class="dropdown__toggle" type="checkbox">
            <label for="tools__dropdown2" class="dropdown__label"><img src={{ asset('images/download.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Download playlist from Spotify</label>
            <div class="dropdown__hidden">
                <div class="dropdown__content">
                    <form method="POST" class="" action="{{ url("/baskets/search/playlist") }}">
                        <div class="input-group input-group-append input-group-sm">
                            @csrf
                            <input name="q" type="text" class="form-control mt-2" aria-label="Small" aria-describedby="inputGroup-sizing-md" placeholder="Search playlist with Spotify...">
                            <input name="basket" type="hidden" value="{{ $basket->id }}">
                            <button type="submit" class="btn">
                                <img src="{{ asset('images/search.svg') }}" class="filter-secondary mr-2" width="28" height="28" title="search" alt="">
                            </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <hr>
        <div class="tools__dropdown">

            <input id="tools__dropdown3" class="dropdown__toggle" type="checkbox">
            <label for="tools__dropdown3" class="dropdown__label"><img src={{ asset('images/star.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Get recommendations</label>
            <div class="dropdown__hidden">
                <div class="dropdown__content">
                    <div class="input-group input-group-append input-group-sm">
                        <p class="mt-3">Get recommended playlists depending on the location or occasion of this list. </p>
                        <a class="btn btn_save" href="#}">Show</a>
                    </div>
                </div>
            </div>

        </div>

    </section>



</main>

@endsection