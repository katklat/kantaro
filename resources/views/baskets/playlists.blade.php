@extends('layouts/app')
@section('content')

<main>
    <h4 class="m-3 inline">Results for "{{ $query }}": </h4>
    <div class="container">

        @foreach($baskets as $basket)
        <form method="POST" action=" {{route('songs.store')}}">
            @csrf
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="m-0">{{ $basket->name }} </br>by {{ $basket->owner->display_name }}</br>{{ $basket->tracks->total }} songs</p>
                    <input name="playlist_id" type="hidden" value="{{ $basket->id }}">
                </div>
                <div class="col-3">
                    <button class="btn btn_save ml-2" type="submit">add</button>
                </div>
            </div>
        </form>
        <hr>
        @endforeach
    </div>
</main>

@endsection