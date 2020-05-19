@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <h2 class="m-3 inline">My {{ $selectedFilter ?? $selectedFilter}} books</h2>
        <div class="container d-flex justify-content-between mb-3">
            @if($selectedFilter)
            <a class="py-2 d-md-inline-block text-white filter__link" href="{{ url('books') }}">all</a>
            @endif
            @foreach($filters as $filter)
            @if($filter !== $selectedFilter)
            <a class="py-2  d-md-inline-block text-white filter__link" href="{{ url("books/show/{$filter}") }}">{{ $filter }}</a>
            @endif
            @endforeach
        </div>

        @foreach ($books as $book)
        <div>
            <a href="{{ route('books.show', $book) }}" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                @if ($book->image)
                <img class="img-fluid rounded-top mb-3" src={{$book->imageUrl($book->image)}} />
                @endif
                <h4 class="text-dark  no-gutters ">{{ $book->name }}</h4>
            </a>
        </div>
        @endforeach

    </div>
</main>

@endsection