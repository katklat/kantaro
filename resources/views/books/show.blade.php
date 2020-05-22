@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <div class="card my-3">
            <div class="card-body card-scroll text-left ">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">{{ $book->name }}</h4>
                    </div>
                    <div class="col-1 pl-1">
                        <a href="{{ route('tools', $book) }}">
                            <img src={{ asset('images/cloud.svg') }} class="filter-secondary" width="30" height="30" title="add" alt="">
                        </a>
                    </div>
                    <div class="col-1 mr-1">
                        <a href="{{ route('books.edit', $book) }}">
                            <img src={{ asset('images/pencil.svg') }} class="filter-secondary" width="28" height="28" title="add" alt="">
                        </a>
                    </div>
                </div>
                <h6 class="card-subtitle mb-2">{{ $book->month }} {{ $book->year }}@if ($book->location), {{ $book->location }} @endif</h6>
                <p class="card-text">{{ $book->entry }}</p>
            </div>
            <div class="card-footer p-0 justify-content-around">
                <span class="card-icon inline mr-1">{{ $book->emoji }}</span>
            </div>
        </div>

        @foreach ($songs as $song)
        <div class="card mb-4">
            <a href="{{ route('songs.show', $song) }}">
                <img class="card-img-top" src={{$song->imageUrl($song->image)}} alt="">
                <div class="card-body text-left">
                    <div class="row">
                        <div class="col-9">
                            <h4 class="card-title">{{ $song->title }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $song->artist }}</h6>
                        </div>
                        <div class="col-3">
                            <span class="card-icon">{{ $song->emoji }}</span>
                        </div>
                    </div>
                    <p class="card-text">{{ $song->entry }}</p>
                </div>
        </div>
        @endforeach

    </div>
</main>

@endsection