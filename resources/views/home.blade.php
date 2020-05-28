@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">
        @guest
        <h1>guest</h1>
        @endguest

        @if(session('empty'))
        <p class="message ml-3 mt-3"> {{ session('empty',' ')}} </p>
        <a class="btn btn_save" href="{{ route('songs.create') }}">Add a song</a>
        @else
        <h2 class="m-3">Remember?</h2>
        <div>
            <a href="{{ route('songs.show', $song->id) }}" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                @if ($song->image)
                <img class="img-fluid rounded-top mb-3" src={{$imgUrl}} />
                @endif
                <h4 class=" text-dark no-gutters">{{ $song->title }}</h4>
            </a>
        </div>
        @endif
    </div>
</main>

@endsection