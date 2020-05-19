@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <h2 class="m-3 inline">My {{ $selectedFilter ?? $selectedFilter}} lists</h2>
        <div class="container d-flex justify-content-between mb-3">
            @if($selectedFilter)
            <a class="py-2 d-md-inline-block text-white filter__link" href="{{ url('baskets') }}">all</a>
            @endif
            @foreach($filters as $filter)
            @if($filter !== $selectedFilter)
            <a class="py-2  d-md-inline-block text-white filter__link" href="{{ url("baskets/show/{$filter}") }}">{{ $filter }}</a>
            @endif
            @endforeach
        </div>

        @foreach ($baskets as $basket)
        <div>
            <a href="{{ route('baskets.show', $basket) }}" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                @if ($basket->image)
                <img class="img-fluid rounded-top mb-3" src={{$basket->imageUrl($basket->image)}} />
                @endif
                <h4 class="text-dark  no-gutters ">{{ $basket->name }}</h4>
            </a>
        </div>
        @endforeach
    </div>
</main>

@endsection