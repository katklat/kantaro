@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <h2 class="m-3 inline">My Lists</h2>
        @foreach ($baskets as $basket)
        <div>
            <a href="{{ route('baskets.show', $basket) }}" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                <img class="img-fluid rounded-top mb-3" src={{$basket->imageUrl($basket->image)}} />
                <h4 class="text-dark  no-gutters ">{{ $basket->name }}</h4>
            </a>
        </div>
        @endforeach
    </div>
</main>

@endsection