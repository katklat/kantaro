@extends('layouts/app')
@section('content')

<main>
    <h4 class="m-3 inline">Results for "{{ $query }}": </h4>
    <div class="container">

        @foreach($songs as $song)
        <form method="POST" action=" {{route('songs.store')}}">
            @csrf
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="m-0">{{ $song->name }} </br>by {{ $song->artists[0]->name }}</p>
                    <input name="title" type="hidden" value="{{ $song->name }}">
                    <input name="artist" type="hidden" value="{{ $song->artists[0]->name }}">
                    <input name="track_id" type="hidden" value="{{ $song->id }}">
                    <input name="artist_id" type="hidden" value="{{ $song->artists[0]->id }}">
                </div>
                <div class="col-3">
                    <button class="btn btn_save ml-2" type="submit">add</button>
                </div>
            </div>
        </form>
        <hr>
        @endforeach

        <div class="tools__dropdown mt-2">
            <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
            <label for="tools__dropdown1" class="dropdown__label dropdown__label--underlined">Not found? </br>Enter title and artist manually</label>
            <div class="dropdown__hidden">
                <div class="dropdown__content">
                    <div class="form-group">
                        <label class="control-label">enter title*</label>
                        <input type="text" class="form-control" name="title" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="artist">enter artist*</label>
                        <input type="text" class="form-control" name="artist" placeholder="">
                    </div>
                    <div>
                        <button class="btn btn_save pull-right" type="submit">add song</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection