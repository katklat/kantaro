@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <h2 class="m-3 inline">My Songs</h2>

        <div class="card mb-4">
            <a href="{{ route('songs.show') }}">
                <img class="card-img-top" src="{{ asset('images/landscape.jpg') }}" alt="">
                <div class="card-body text-left">
                    <div class="row">
                        <div class="col-9">
                            <h4 class="card-title ">Some song</h4>
                            <h6 class="card-subtitle mb-2 text-muted">by someone</h6>
                        </div>
                        <div class="col-3">
                            <span class="card-icon">🍔</span>
                        </div>
                    </div>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, iusto. </p>
                </div>
            </a>
        </div>

        <div class="card mb-4">
            <a href="{{ route('songs.show') }}">
                <img class="card-img-top" src="{{ asset('images/portrait.jpg') }}" alt="">
                <div class="card-body text-left">
                    <div class="row">
                        <div class="col-9">
                            <h4 class="card-title">Some song with a long title</h4>
                            <h6 class="card-subtitle mb-2 text-muted">by someone</h6>
                        </div>
                        <div class="col-3">
                            <span class="card-icon">🧶</span>
                        </div>
                    </div>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, iusto. </p>
                </div>
            </a>
        </div>

        <div class="card mb-4">
            <a href="{{ route('songs.show') }}">
                <img class="card-img-top" src="{{ asset('images/mare.jpg') }}" alt="">
                <div class="card-body text-left">
                    <div class="row">
                        <div class="col-9">
                            <h4 class="card-title">Just another song</h4>
                            <h6 class="card-subtitle mb-2 text-muted">by someone</h6>
                        </div>
                        <div class="col-3">
                            <span class="card-icon">🐍</span>
                        </div>
                    </div>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, iusto. </p>
                </div>
            </a>
        </div>

    </div>
</main>

@endsection