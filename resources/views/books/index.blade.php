@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <h2 class="m-3 inline">My @if ($selectedFilter !== 'all') {{ $selectedFilter }} @endif books</h2>

        <ul class="filter__list d-flex flex-row justify-content-between">
            @foreach($filters as $filter)
            <li class=filter__item>
                <a class="btn @if($filter==$selectedFilter){{'btn__filter--selected' }}@endif" role="button" href="{{ url("books/show/{$filter}") }}">{{ $filter }}</a>
            </li>
            @endforeach
        </ul>

        @foreach ($books as $book)
        <div>
            <a href="{{ route('books.show', $book) }}" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                @if($book->image)
                <img class="img-fluid rounded-top mb-3" src={{$book->imageUrl($book->image)}} />
                @elseif($book->imageUrl($book->image))
                <img class="img-fluid rounded-top mb-3" src={{$book->imageUrl($book->image)}} />
                @endif <h4 class="text-dark  no-gutters ">{{ $book->name }}</h4>
            </a>
        </div>
        @endforeach

    </div>
</main>

@endsection