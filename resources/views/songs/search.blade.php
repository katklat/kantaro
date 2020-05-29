@extends('layouts/app')
@section('content')

<main>

    <section class="tools mt-3">

        <div class="tools__dropdown">
            @if(session('empty'))
            <p class="message ml-3"> {{ session('empty',' ')}} </p>
            @endif
            <div class="dropdown__content">
                <div class="form-group">
                    <form method="POST" class="form-inline" action="{{ url("/songs/search/track") }}">
                        @csrf
                        <div class="input-group input-group-append input-group-sm">
                            <input name='q' type="text" size="500" autofocus class="form-control input__query ml-3" aria-label="Small" aria-describedby="inputGroup-sizing-md" placeholder="Search with Spotify...">
                            <button type="submit" class="btn">
                                <img src="{{ asset('images/search.svg') }}" class="filter-secondary mr-2" width="28" height="28" title="search" alt="">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <form method="POST" action="{{ route('songs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="tools__dropdown mt-2">
                    <input id="tools__dropdown6" class="dropdown__toggle" type="checkbox">
                    <label for="tools__dropdown6" class="dropdown__label dropdown__label--underlined">Enter title and artist manually</label>
                    <div class="dropdown__hidden">
                        <div class="dropdown__content">
                            <div class="form-group">
                                <label class="control-label">add title*</label>
                                <input type="text" class="form-control" name="title" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="artist">add artist*</label>
                                <input type="text" class="form-control" name="artist" placeholder="">
                            </div>
                            <div>
                                <button class="btn btn_save pull-right" type="submit">add song</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection