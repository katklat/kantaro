@extends('layouts/app')
@section('content')

<main>

    <div class="container song__container text-left">
        <div class="card my-4 ">
            <div class="row song__title ">
                <div class="col-10 ml-1">
                    <h4 class="card-title ml-2 mt-1">The robot who lost its head<h4>
                </div>
                <div class="col-1  p-1">
                    <a href="{{ route('songs.edit') }}">
                        <img src={{ asset('images/pencil.svg') }} class="filter-secondary" width="28" height="28" title="add" alt="">
                    </a>
                </div>

                <h6 class="card-subtitle text-muted pl-4 pb-2">by Buckethead</h6>


            </div>
            <img class="card-img-top song__image" src="{{ asset('images/landscape.jpg') }}" alt="">
            <p class="card-text card-scroll song_text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat sapiente voluptatem et eos tenetur! Nobis laudantium recusandae voluptatibus tempora. Consequatur culpa facilis incidunt. Nobis provident voluptate, modi eaque accusamus culpa exercitationem voluptas, earum quia ipsa error harum quam tempore assumenda rerum labore, odit porro expedita illo fugit maiores odio? Eos!
            </p>

            <div class="card-footer text-center p-0">
                <span class="card-icon">🤖</span>
            </div>
        </div>
    </div>
</main>text-muted