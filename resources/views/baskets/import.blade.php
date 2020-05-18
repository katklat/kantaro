@extends('layouts/app')
@section('content')

<main>
    <h4 class="m-3 inline">Playlist cotent: </h4>
    <div class="container">
        <form method="POST" action=" {{ route('import', $basket) }}">
            @csrf
            @method("PUT")
            @foreach($songs as $song)

            <div class="row align-items-center">
                <div class="col-9">
                    <p class="m-0">{{ $song->track->name }} </br>by {{ $song->track->artists[0]->name }}</p>
                    <input name="basket" type="hidden" value="{{ $basket }}">
                </div>
                <div class="col-3">
                    <label class="container__checkboxes">
                        <input type="checkbox" name="track_ids[]" value="{{ $song->track->id }}" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <hr>
            @endforeach

            <div class="mt-6">
                <a class="btn btn_cancel" href="{{ route('baskets.index') }}">Cancel</a>
                <button type="submit" class="btn ml-2 btn_save">Import </button>
            </div>
        </form>
    </div>
</main>

@endsection