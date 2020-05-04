@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <h2 class="m-3 inline">My Lists</h2>

        <div>
            <a href="" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                <img class="img-fluid rounded-top mb-3" src="{{ asset('images/landscape.jpg') }}" />
                <h4 class="text-dark  no-gutters ">some list</h4>
            </a>
        </div>
        <div>
            <a href="" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                <img class="img-fluid rounded-top mb-3" src="{{ asset('images/mare.jpg') }}" />
                <h4 class="text-dark  no-gutters ">some other list</h4>
            </a>
        </div>
        <div>
            <a href="" class="d-block rounded-lg mb-4 pb-1 bg-light text-decoration-none">
                <img class="img-fluid rounded-top mb-3" src="{{ asset('images/portrait.jpg') }}" />
                <h4 class="text-dark  no-gutters ">some song</h4>
            </a>
        </div>
    </div>
</main>

@endsection