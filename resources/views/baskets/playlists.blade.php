@extends('layouts/app')
@section('content')

<main>
    <h4 class="m-3 inline">Results for "{{ $query }}": </h4>
    <div class="container">

        @foreach($lists as $list)
        <form method="GET" action=" {{route('getPlaylist')}}">
            @csrf
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="m-0">{{ $list->name }} </br>by {{ $list->owner->display_name }}</br>{{ $list->tracks->total }} songs</p>
                    <input name="playlist_id" type="hidden" value="{{ $list->id }}">
                    <input name="basket" type="hidden" value="{{ $basket }}">
                </div>
                <div class="col-3">
                    <button class="btn btn_save ml-2" type="submit">add</button>
                </div>
            </div>
        </form>
        <hr>
        @endforeach
    </div>
    <div class="mt-6">
        <a class="btn btn_cancel ml-2 " href="{{ route('baskets.show',$basket) }}">Cancel</a>
    </div>

</main>

@endsection