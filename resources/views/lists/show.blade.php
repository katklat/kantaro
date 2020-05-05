@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">


        <div class="card my-4">
            <div class="card-body card-scroll text-left ">
                <h4 class="card-title">Some List<h4>
                        <h6 class="card-subtitle mb-2">May 2020, Hamburg</h6>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque aliquam suscipit nobis odio error saepe, et ipsam labore, delectus asperiores quas sint quidem deserunt placeat consequatur quos, voluptate illum architecto?
                        </p>
            </div>
            <div class="card-footer p-0 justify-content-around">
                <span class="card-icon">&#9749;</span>
                <span class="card-icon">&#9748;</span>
                <span class="card-icon">&#9784;</span>
                <span class="card-icon">&#9785;</span>
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
                        <span class="card-icon">&#x266c;</span>
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
                        <span class="card-icon">&#9000;</span>
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
                        <span class="card-icon">&#9999;</span>
                    </div>
                </div>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, iusto. </p>
            </div>
        </div>

    </div>
</main>

@endsection