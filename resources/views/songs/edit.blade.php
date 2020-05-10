@extends('layouts/app')
@section('content')

<!-- issue: chosen file/emoji is not shown in input -->
<!-- ToDo: add basket selection -->
<main>
    <h1 class="edit__h1">{{ $song->title }}</h1>
    <h2 class="edit__h2">by {{ $song->artist }}</h2>
    <section class="tools mt-3">

        <form method="POST" action="{{ route('songs.update', $song->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="tools__dropdown">
                <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('storage/search.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Edit entry</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="entry">{{ old('entry') ?? $song->entry }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown2" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown2" class="dropdown__label"><img src={{ asset('images/image.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Choose song picture</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="input-group">
                            <input name="image" type="file" class="custom-file-input" id="inputGroupImage" aria-describedby="inputGroupImage">
                            <label class="custom-file-label" for="inputGroupImage">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown3" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown3" class="dropdown__label"><img src={{ asset('images/emoji.svg') }} class="filter-secondary inline mr-1" width="28" height="28" title="add" alt="">Add emojis</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <input type="text" class="form-control" name="emoji">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <a class="btn btn_cancel ml-2 " href="{{ route('songs.show',$song) }}">Cancel</a>
                <button class="btn btn_save ml-2" type="submit">Save</button>
            </div>
        </form>
        <div class="tools__dropdown mt-4">
            <form method='POST' action="{{ route('songs.destroy', $song->id) }}">
                @csrf
                @method('DELETE')
                <input id="tools__dropdown4" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown4" class="dropdown__label"><img src={{ asset('images/delete.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Delete song</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group text-right">
                            <button class="btn ml-2 btn_delete" type="submit">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

@endsection