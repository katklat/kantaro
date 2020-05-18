@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">
        <h2 class="m-3">Remember?</h2>
        <div>
            <a href="{{ route('songs.show', $song->id) }}" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                @if ($song->image)
                <img class="img-fluid rounded-top mb-3" src={{$imgUrl}} />
                @endif
                <h4 class=" text-dark no-gutters">{{ $song->title }}</h4>
            </a>
        </div>
    </div>
</main>
@endsection