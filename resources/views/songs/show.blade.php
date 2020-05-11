@extends('layouts/app')
@section('content')

<main>
    <div class="container text-left">
        <div class="card my-4 ">
            <div class="row">
                <div class="col-10 ml-1">
                    <h4 class="card-title ml-2 mt-1">{{ $song->title }}</h4>
                </div>
                <div class="col-1  p-1">
                    <a href="{{ route('songs.edit', $song) }}">
                        <img src={{ asset('images/pencil.svg') }} class="filter-secondary" width="28" height="28" title="add" alt="edit">
                    </a>
                </div>
                <h6 class="card-subtitle text-muted pl-4 pb-2">{{ $song->artist }}</h6>
            </div>
            <img class="card-img-top" src={{$song->imageUrl($song->image)}}>
            <p class="card-text card-scroll">{{ $song->entry }}
            </p>

            <div class="card-footer text-center p-0">
                <span class="card-icon">{{ $song->emoji }}</span>
            </div>
        </div>
    </div>
</main>text-muted