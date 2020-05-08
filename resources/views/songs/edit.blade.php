@extends('layouts/app')
@section('content')

<main>
    <h1 class="edit__h1">{{ $song->title }}</h1>
    <h2 class="edit__h2">by {{ $song->artist }}</h2>
    <section class="tools mt-3">

        <form>
            <div class="tools__dropdown">
                <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('images/text.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Edit entry</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" type="text" name="entry" value="">{{ old('entry') ?? $song->entry }}</textarea>

                        </div>

                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown2" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown2" class="dropdown__label"><img src={{ asset('images/image.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Choose song picture</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="input-group" id="group2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon2"><i class="far fa-file-image"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file2" aria-describedby="addon2">
                                <label class="custom-file-label" for="file2">choose file</label>
                            </div>
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
                            <label for="group3">add upto six emojis</label>
                            <div class="input-group" id="group2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon2"><i class="far fa-file-image"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file2" aria-describedby="addon2">
                                    <label class="custom-file-label" for="file2">choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tools__dropdown">
                <input id="tools__dropdown4" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown4" class="dropdown__label"><img src={{ asset('images/delete.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Delete song</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group text-right">
                            <a class="btn ml-2 btn_delete" href="{{ route('songs.index') }}">Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="mt-6">
            <a class="btn btn_cancel ml-2 " href="{{ route('songs.show',$song) }}">Cancel</a>
            <a class="btn btn_save ml-2" href="{{ route('songs.show',$song) }}">Save</a>
        </div>
    </section>
</main>

@endsection