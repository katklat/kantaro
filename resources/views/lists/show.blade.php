@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">

        <div class="card my-3">
            <div class="card-body card-scroll text-left ">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">Some List<h4>
                    </div>
                    <div class="col-1 pl-1">
                        <a href="{{ route('lists.tools') }}">
                            <img src={{ asset('images/cloud.svg') }} class="filter-secondary" width="30" height="30" title="add" alt="">
                        </a>
                    </div>
                    <div class="col-1 mr-1">
                        <a href="{{ route('lists.edit') }}">
                            <img src={{ asset('images/pencil.svg') }} class="filter-secondary" width="28" height="28" title="add" alt="">
                        </a>
                    </div>
                </div>



                <h6 class="card-subtitle mb-2">May 2020, Hamburg</h6>
                <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque aliquam suscipit nobis odio error saepe, et ipsam labore, delectus asperiores quas sint quidem deserunt placeat consequatur quos, voluptate illum architecto?
                </p>
            </div>
            <div class="card-footer p-0 justify-content-around">
                <span class="card-icon">🔥</span>
                <span class="card-icon">🦊</span>
            </div>
        </div>

        <div class="card mb-4">
            <img class="card-img-top" src="{{ asset('images/landscape.jpg') }}" alt="">
            <div class="card-body text-left">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">Some song</h4>
                        <h6 class="card-subtitle mb-2 text-muted">by someone</h6>
                    </div>
                    <div class="col-3">
                        <span class="card-icon">☕️</span>
                    </div>
                </div>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, iusto. </p>
            </div>
        </div>

        <div class="card mb-4">
            <img class="card-img-top" src="{{ asset('images/portrait.jpg') }}" alt="">
            <div class="card-body text-left">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">Some song with a long title</h4>
                        <h6 class="card-subtitle mb-2 text-muted">by someone</h6>
                    </div>
                    <div class="col-3">
                        <span class="card-icon">🍯</span>
                    </div>
                </div>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, iusto. </p>
            </div>
        </div>

        <div class="card mb-4">
            <img class="card-img-top" src="{{ asset('images/mare.jpg') }}" alt="">
            <div class="card-body text-left">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">Just another song</h4>
                        <h6 class="card-subtitle mb-2 text-muted">by someone</h6>
                    </div>
                    <div class="col-3">
                        <span class="card-icon">🦠</span>
                    </div>
                </div>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, iusto. </p>
            </div>
        </div>

    </div>
</main>

@endsection