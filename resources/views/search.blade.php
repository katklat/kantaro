@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">
        <h4 class="m-3 inline">Books matching the search "{{ $query }}": </h4>
        @forelse($books as $book)

        <div>
            <a href="{{ route('books.show', $book) }}" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                <img class="img-fluid rounded-top mb-3" src={{$book->imageUrl($book->image)}} />
                <h4 class="text-dark  no-gutters ">{{ $book->name }}</h4>
            </a>
        </div>

        @empty
        <h4>none</h4>
        @endforelse

        <h4 class="m-3 inline">Songs matching the search "{{ $query }}" </h4>
        @forelse ($songs as $song)
        <div class="card mb-4">
            <a href="{{ route('songs.show', $song) }}">
                <img class="card-img-top" src={{$song->imageUrl($song->image)}}>
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

        @empty
        <h4>none</h4>
        @endforelse

    </div>
</main>

@endsection