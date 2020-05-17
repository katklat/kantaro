@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <h2 class="m-3 inline">My Songs</h2>

        @foreach ($songs as $song)
        <div class="card mb-4">
            <a href="{{ route('songs.show', $song) }}">
                @if ($song->image)
                <img class="card-img-top" src={{$song->imageUrl($song->image)}}>
                @endif
                <div class="card-body text-left">
                    <div class="row">
                        <div class="col-9">
                            <h4 class="card-title">{{ $song->title }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{$song->artist}}</h6>
                        </div>
                        <div class="col-3">
                            <span class="card-icon">{{ $song->emoji }}</span>
                        </div>
                    </div>
                    <p class="card-text">{{ $song->entry }} </p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</main>

@endsection